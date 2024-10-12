<?php
/*
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 1.10.2024
 * ⏰ Time: 03:49
 * 📄 File: helperfiles_helper.php
 * 📧 Contact: iletisim@batuhankorkmaz.com | bthnkkz@yahoo.com
 * 💼 LinkedIn: https://www.linkedin.com/in/batuhan-korkmaz-180ab4318/
 * 💻 GitHub: https://github.com/Batuhanfy 
 * ============================================================
 * 💡 Description: 
 * This code has been crafted with precision and a strong
 * emphasis on clean coding principles. Every effort has been
 * made to ensure reliability, performance, and maintainability.
 * 
 * If you encounter any issues or have suggestions, please don't 
 * hesitate to reach out via the contact information provided above.
 * ============================================================
 -->
 */
defined('BASEPATH') or exit('No direct script access allowed');
if (!function_exists('complete_project')) {
    function complete_project($project_id)
    {
        $CI =& get_instance();
        $CI->load->model('General_Model');
        $CI->General_Model->update('projects', ['status' => 'completed'], ['id' => $project_id]);
    }
}
if (!function_exists('isvalidDate')) {
    function isValidFutureDate($date)
    {
        // GG/AA/YYYY formatını kontrol eden bir düzenli ifade
        $pattern = '/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/';
        // Düzenli ifadeyle eşleşip eşleşmediğini kontrol et
        if (preg_match($pattern, $date)) {
            // Tarihi GG/AA/YYYY şeklinde parçalar
            list($day, $month, $year) = explode('/', $date);
            // Tarih geçerli mi diye kontrol et
            if (checkdate($month, $day, $year)) {
                // Şu anki tarih ile karşılaştırma için strtotime kullanıyoruz
                $inputDate = strtotime("$year-$month-$day");
                $currentDate = strtotime(date("Y-m-d")); // Bugünün tarihi
                // Eğer verilen tarih bugünden ileri bir tarihse
                if ($inputDate > $currentDate) {
                    return true; // Geçerli bir gelecek tarih
                } else {
                    return false; // Geçmiş bir tarih
                }
            }
        }
        return false;
    }
}
function send_email($to, $subject, $message)
{
    $CI =& get_instance();
    // SMTP ayarları
    $config = array(
        'protocol' => 'smtp',
        'smtp_host' => 'mail.batuhankorkmaz.com',
        'smtp_port' => '587',
        'smtp_user' => 'crmproject@batuhankorkmaz.com',
        'smtp_pass' => 'crmproject55',
        'mailtype' => 'html',
        'charset' => 'iso-8859-1',
        'wordwrap' => TRUE
    );
    $CI->load->library('email', $config);
    $CI->email->set_newline("\r\n");
    $CI->email->from('crmproject@batuhankorkmaz.com', 'CRM Project Panel');
    $CI->email->to($to);
    $CI->email->subject($subject);
    $CI->email->message($message);
    if ($CI->email->send()) {
        return true;
    } else {
        return false;
    }
}

function get_post_data($fields)
{
    $CI =& get_instance();
    $data = [];
    foreach ($fields as $field => $default) {
        $data[$field] = $CI->input->post($field) !== null ? $CI->input->post($field) : $default;
    }
    return $data;
}

function loge($message)
{
    $CI =& get_instance();
    $CI->load->library('api_auth');
    $CI->load->model('General_Model');


        $user_id = $CI->session->userdata('user_id');
        $user_name = $CI->General_Model->get('users', ['id' => $user_id], '*')->email;
        $ip_address =
        $data = array(
            'log' => $message,
            'user' => $user_id,
            'user_name' => $user_name,
            'ip' => getUserIP()
        );
        $CI->General_Model->insert('logs', $data);

}
function admin_activite($activity_type,$message)
{
    $CI =& get_instance();
    $CI->load->library('api_auth');
    $CI->load->model('General_Model');
    if (!$CI->api_auth->isNotAuthenticated()) {
        $user_id = $CI->api_auth->getUserId();
        $user_name = $CI->General_Model->get('users', ['id' => $user_id], 'email')->email;
        $data = array(
            'admin_id' => $user_id,
            'activity_type' => $activity_type,
            'activity_description' => $message,
        );
        $CI->General_Model->insert('admin_activities', $data);
    }
}

function getUserIP()
{
    if (isset($_SERVER['HTTP_CLIENT_IP']) && !empty($_SERVER['HTTP_CLIENT_IP'])) {
        // Proxy sunucusu üzerinden bağlantı
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // Proxy veya load balancer kullanıyor olabilir, IP listesinin ilkini al
        $ipList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        return trim($ipList[0]); // Gerçek IP'yi al
    } else {
        // Direkt bağlantı
        return $_SERVER['REMOTE_ADDR'];
    }
}

function maskValue($value)
{
    // Eğer değer 2 karakterden az ise, '*' işareti ile tamamen gizle
    if (strlen($value) <= 2) {
        return str_repeat('*', strlen($value));
    }
    // Değerin uzunluğu kadar '*' işareti koyup, son iki karakteri ekle
    $maskedValue = str_repeat('*', strlen($value) - 2) . substr($value, -2);
    return $maskedValue;
}

function needAccess()
{
    $CI =& get_instance();
    $CI->load->model('General_Model', 'general_model');
    $CI->needLogin();
    $userid = $CI->getUserId(); // Kullanıcı ID'sini al
    if ($CI->general_model->checkTwoFields('user_roles', 'user_id', $userid, 'role_id', '1') == false) {
        res('unauthorized', 'You have no access to this page.');
    }
}

function rateLimit()
{
    $CI =& get_instance();
    // 1 saat içerisinde maksimum 500 istek sınırı
    // genel fonksiyonlar için bruteforce tarzı istekler veya saldırılarda koruması amaçlı.
    $CI->load->library('RateLimiter', ['max_requests' => 200, 'time_frame' => 3600]);
    if ($CI->ratelimiter->isAllowed()) {
        // no problem
    } else {
        // İstek sayısı aşıldı
        res('forbidden', 'Rate limit exceeded. Try again later.');
    }
}

function rateLimitDanger()
{
    $CI =& get_instance();
    //1 saat içerisinde maksimum 25 istek sınırı
    //çok önemli fonksiyonlar için koruma amaçlı eklendi (şifre sıfırlama maili gönderimi, kayıt olmak..)
    $CI->load->library('RateLimiter', ['max_requests' => 25, 'time_frame' => 3600]);
    if ($CI->ratelimiter->isAllowed()) {
        // no problem
    } else {
        // İstek sayısı aşıldı
        res('forbidden', 'Rate limit exceeded. Try again later.');
    }
}

function res($code, $smessage = null, $data = null, $newpromp = null)
{
    // HTTP durum kodları ve mesajları
    //Yaygın HTTP Durum Kodları ve Anlamları
//1xx: Bilgilendirme (Informational)
//100 Continue: İstemci, isteğin bir bölümünü başarıyla gönderdi ve devam edebileceğini belirtiyor.
//101 Switching Protocols: İstemcinin protokol değiştirme isteği sunucu tarafından kabul edildi.
//2xx: Başarılı (Success)
//200 OK: İstek başarıyla tamamlandı.
//201 Created: Yeni bir kaynak başarıyla oluşturuldu.
//202 Accepted: İstek kabul edildi ancak henüz işlenmedi.
//204 No Content: İstek başarıyla tamamlandı ancak geri dönecek veri yok.
//3xx: Yönlendirme (Redirection)
//301 Moved Permanently: Kaynak kalıcı olarak taşındı, yeni konumu döndürülüyor.
//302 Found: Kaynak geçici olarak başka bir yere taşındı.
//304 Not Modified: Kaynakta değişiklik yapılmadı, önbellekteki versiyon kullanılabilir.
//4xx: İstemci Hataları (Client Errors)
//400 Bad Request: Geçersiz istek, sunucu isteği anlayamadı.
//401 Unauthorized: Kimlik doğrulama gerekli, oturum açılmadı.
//403 Forbidden: İstek anlaşıldı, ancak yetki verilmedi.
//404 Not Found: İstenen kaynak bulunamadı.
//405 Method Not Allowed: İstek yöntemi sunucu tarafından desteklenmiyor.
//422 Unprocessable Entity: İstek işlenemiyor çünkü veri geçersiz.
//5xx: Sunucu Hataları (Server Errors)
//500 Internal Server Error: Sunucuda genel bir hata meydana geldi.
//501 Not Implemented: Sunucu istenen işlevselliği desteklemiyor.
//503 Service Unavailable: Sunucu geçici olarak çalışmıyor veya aşırı yüklenmiş.
    $http_codes = [
        'ok' => [200, 'OK'],
        'created' => [201, 'Resource Created Successfully'],
        'accepted' => [202, 'Request Accepted'],
        'no_content' => [204, 'No Content'],
        'bad_request' => [400, 'Bad Request'],
        'unauthorized' => [401, 'Unauthorized'],
        'forbidden' => [403, 'Forbidden'],
        'not_found' => [404, 'Not Found'],
        'method_not_allowed' => [405, 'Method Not Allowed'],
        'conflict' => [409, 'Conflict'],
        'wrong_entity' => [422, 'Unprocessable Entity'],
        'server_error' => [500, 'Internal Server Error'],
        'service_unavailable' => [503, 'Service Unavailable']
    ];
    if (is_string($code) && isset($http_codes[$code])) {
        $http_code = $http_codes[$code][0];
        $message = $http_codes[$code][1];
    } else {
        $http_code = 500;
        $message = "Undefined error";
    }
    $response = [
        'status' => ($http_code >= 200 && $http_code < 300), // 2xx başarıyı ifade eder
        'message' => $message,
    ];
    if ($smessage != null) {
        $response['info'] = $smessage;
    }
    if ($newpromp != null) {
        foreach ($newpromp as $key => $value) {
            if ($key != null && $value != null) {
                $response[$key] = $value;
            }
        }
    }
    if ($data != null) {
//            foreach ($data as $key => $value) {
//                if ($key != null && $value != null) {
//                    $response['data'][$key] = $value;
//                }
//            }
        $response['data'] = $data;
    }
    $CI =& get_instance();
    $CI->output
        ->set_status_header($http_code)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES))
        ->_display();
    exit();
}
function checkSessionLoginAndGo(){
    $CI =& get_instance();
    if ($CI->session->userdata('logged_in')) {
    redirect("/");
    }
}
function nonCheckSessionLoginAndGo(){
    $CI =& get_instance();
    if (!$CI->session->userdata('logged_in')) {
        redirect("/");
    }
}

function checkLogin()
{
    $CI =& get_instance();
    $email = $CI->input->post("email");
    $password = $CI->input->post("password");

    // Form validation
    $CI->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $CI->form_validation->set_rules('password', 'Password', 'required');

    if (!($CI->form_validation->run())) {
        return -1;
    }

    $CI->load->model('General_Model');

    // Kullanıcının bilgilerini email ile alıyoruz
    $user = $CI->General_Model->get('users', ['email'=>$email]);

    if ($user != false) {
        // Şifre karşılaştırması: Veritabanındaki şifre hash'lenmişse, karşılaştırmak için password_verify() kullanılır.
        if (password_verify($password, $user->password)) {
            $id = $user->id;
            return $id;
        } else {
           return -1;
        }
    } else {
        return -1; // email or password wrong
    }
}

function get_device_name($user_agent) {
    if (strpos($user_agent, 'iPhone') !== false) {
        return 'iPhone';
    } elseif (strpos($user_agent, 'iPad') !== false) {
        return 'iPad';
    } elseif (strpos($user_agent, 'Android') !== false) {
        return 'Android';
    } elseif (strpos($user_agent, 'Windows') !== false) {
        return 'Windows PC';
    } else {
        return 'Unknown Device';
    }
}

// IP adresine göre lokasyon almak için (API kullanabilirsiniz)
function get_location_by_ip($ip_address) {
    // IP tabanlı coğrafi konum servisi kullanılabilir (örneğin ip-api.com)
    $url = "http://ip-api.com/json/{$ip_address}";
    $response = file_get_contents($url);
    $data = json_decode($response);
    if ($data->status == "success") {
        return "{$data->city}, {$data->country}";
    } else {
        return "Unknown Location";
    }
}