<?php

/*
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 8.10.2024
 * ⏰ Time: 21:33
 * 📄 File: Auth.php
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

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        checkSessionLoginAndGo();
        if ($this->input->post()) {
            // Kullanıcı giriş kontrolü
            $login = checkLogin(); // checkLogin() fonksiyonu veritabanından kullanıcıyı doğrulayan bir fonksiyon olmalıdır.
            $email = $this->input->post("email");
            if ($login != -1) {
                // Oturum başlatma
                $userid = $this->General_Model->get('users', ['email' => $email], '*')->id;
                $session_data = [
                    'user_id' => $userid,  // Kullanıcının veritabanındaki ID'si
                    'email' => $email, // Kullanıcının emaili
                    'logged_in' => TRUE         // Oturum açıldı olarak işaretle
                ];
                // Oturum verilerini kaydet
                $this->session->set_userdata($session_data);
                // Oturum güvenliği için oturum ID'sini yenile
                $this->session->sess_regenerate(TRUE);
                $ip_address = $this->input->ip_address();
                // User-Agent bilgisi (tarayıcı ve cihaz bilgisi)
                $user_agent = $this->input->user_agent();
                // Cihaz adını ve lokasyon bilgisini ekle
                $device_name = get_device_name($user_agent);
                $location = get_location_by_ip($ip_address);
                $login_time = date('Y-m-d H:i:s');
                $data = array(
                    'user_id' => $userid,
                    'device_name' => $device_name,
                    'location' => $location,
                    'login_time' => $login_time,
                    'ip_address' => $ip_address,
                    'user_agent' => $user_agent
                );
                loge(" Login  ");
                $this->General_Model->insert('login_history', $data);
                $account_mail_access = $this->General_Model->checkTwoFields("users", "email", $email, 'IsActive', '1');
                if ($account_mail_access != false) {
                    redirect('dashboard');
                } else {
                    $data['redirect'] = 'twostep';
                    $data['ileti'] = array('email' => $email, 'submitRegister' => true);
                    $this->load->view('layout/_loginLayout', $data);
                }
                log_message('info', "POST User Login Successfully.");

            } else {
                // Hatalı giriş
                $this->session->set_flashdata('error', 'Kullanıcı adı veya şifre hatalı.');
                redirect('auth/login');  // Giriş sayfasına geri dön
            }
        } else {
            $data['redirect'] = 'login';
            $this->load->view('layout/_loginLayout', $data);
        }
    }

    public function logout()
    {
        nonCheckSessionLoginAndGo();
        $data['redirect'] = 'logout';
        $this->load->view('layout/_loginLayout', $data);
    }

    public function passchange()
    {
        checkSessionLoginAndGo();
        $data['redirect'] = 'passchange';
//         $data['ileti']=array('message'=>'example');
        $this->load->view('layout/_loginLayout', $data);
    }

    public function success()
    {
        $data['redirect'] = 'success';
        $this->load->view('layout/_loginLayout', $data);
    }

    public function register()
    {
        checkSessionLoginAndGo();
        if ($this->input->post()) {
            $fields = [
                'email' => '',
                'password' => '',
                'first_name' => '',
                'last_name' => '',
                'phone' => '',
                'address' => ''
            ];
            $postData = get_post_data($fields);
            $email = $postData['email'];
            $password = $postData['password'];
            $first_name = $postData['first_name'];
            $last_name = $postData['last_name'];
            $phone = $postData['phone'];
            $address = $postData['address'];
            $profile_pictures  = [
                'assets/images/users/avatar-1.jpg',
                'assets/images/users/avatar-2.jpg',
                'assets/images/users/avatar-3.jpg',
                'assets/images/users/avatar-4.jpg',
                'assets/images/users/avatar-5.jpg',
                'assets/images/users/avatar-6.jpg',
                'assets/images/users/avatar-7.jpg',
                'assets/images/users/avatar-8.jpg',
                'assets/images/users/avatar-9.jpg',
                'assets/images/users/avatar-10.jpg',
                'assets/images/users/avatar-32.jpg'
            ];
            $profile_picture = $profile_pictures[array_rand($profile_pictures)];
                // Form validation
                $this->form_validation->set_rules('email', 'Mail', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run()) {
                // Şifreyi hash'le
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                // Veritabanına kayıt edilecek veriler
                $data = array(
                    "email" => $email,
                    "password" => $hashed_password, // Şifre artık hashlenmiş
                    "first_name" => $first_name,
                    "last_name" => $last_name,
                    "phone" => $phone,
                    "address" => $address,
                    "profile_picture" => $profile_picture
                );
                // Kullanıcı kaydı için modeli çağır
                $run_register = $this->api_model->registerUser($data);
                // $run_register model response types
                //  1 -> Successfully registered.
                //  0 -> User is already registered.
                // -1 -> Database model has catch(exception) error.
                if ($run_register == 1) {


                    $userid = $this->General_Model->get('users', ['email' => $email], '*')->id;
                    $session_data = [
                        'user_id' => $userid,
                        'email' => $email,
                        'logged_in' => TRUE
                    ];
                    // Oturum verilerini kaydet
                    $this->session->set_userdata($session_data);
                    // Oturum güvenliği için oturum ID'sini yenile
                    $this->session->sess_regenerate(TRUE);

                    $random_code = substr(bin2hex(random_bytes(2)), 0, 4);
                    $codeGenerate = $this->General_Model->update("users", ["mailCode" => $random_code], ["email" => $email]);
                    if ($codeGenerate == true) {
                        send_email($email, 'Register Activation Code', ("It's great to see you among us :) Thank you for registering. Your activation code is : " . $random_code));
                        $this->session->set_flashdata('success', 'Tebrikler! Kayıt başarılı.');
                        $data['redirect'] = 'twostep';
                        $data['ileti'] = array('mail' => $email, 'submitRegister' => true);
                        $this->session->set_flashdata('sifresi', ($random_code));
                        $this->load->view('layout/_loginLayout', $data);
                    } else {
                        redirect("main/servererror");
                    }
                } else if ($run_register == 0) {
                    $this->session->set_flashdata('error', 'Böyle bir kullanıcı zaten mevcut.');
                } else if ($run_register == -1) {
                    redirect("main/servererror");
                }
            } else {
                $this->session->set_flashdata('error', 'Bilgilerinizi gözden geçiriniz. Eksik bilgi var.');
            }
        } else {
            $data['redirect'] = 'register';
            $this->load->view('layout/_loginLayout', $data);
        }
    }

    public function lockscreen()
    {
        nonCheckSessionLoginAndGo();

        $email = $this->session->userdata("email");
        $lock_the_profile = $this->General_Model->update('users', ['locked' => '1'], ['email' => $email]);
        if ($lock_the_profile == true) {
            loge(" Lock Screen ");
            $data['redirect'] = 'lockscreen';
            $this->load->view('layout/_loginLayout', $data);
        } else {
            $data['redirect'] = 'lockscreen';
            $this->load->view('layout/_loginLayout', $data);
        }
    }

    public function openlock()
    {
        nonCheckSessionLoginAndGo();
        $email = $this->session->userdata("email");
        $user = $this->General_Model->get('users', ['email' => $email], '*');
        $password = $this->input->post('password');
        if (password_verify($password, $user->password)) {
            $lock_the_profile = $this->General_Model->update('users', ['locked' => '0'], ['email' => $email]);
            if ($lock_the_profile == true) {
                redirect('/');
            } else {
                $this->session->set_flashdata('error', 'Kilidiniz açılamadı, yöneticinizle görüşün..');
                $data['redirect'] = 'lockscreen';
                $this->load->view('layout/_loginLayout', $data);
            }
        } else {
            $this->session->set_flashdata('error', 'Şifrenizi hatalı girdiniz.');
            $data['redirect'] = 'lockscreen';
            $this->load->view('layout/_loginLayout', $data);
        }
    }

    public function passreset()
    {
        checkSessionLoginAndGo();

        $data['redirect'] = 'passreset';
        $this->load->view('layout/_loginLayout', $data);
    }

    public function resend()
    {
        $this->session->unset_userdata('error');
        if ($this->input->post()) {
            $email = $this->session->userdata('email');
            if ($email == null) {
                $this->session->set_flashdata('error', 'Kodu tekrar gönderemiyoruz. Tarayıcınızı temizleyip, oturumu yenileyin.');
            } else {
                $lastUpdateDate = $this->General_Model->get("users", ["email" => $email], "updated_at")->updated_at;
                date_default_timezone_set('UTC');
                $currentTime = new DateTime("now", new DateTimeZone('UTC'));
                $updated_at_date = new DateTime($lastUpdateDate, new DateTimeZone('UTC'));
                $fark = $updated_at_date->diff($currentTime);
                $minutes_passed = ($fark->days * 24 * 60) + ($fark->h * 60) + $fark->i;
                $data['ileti'] = array('email' => $email, 'submitRegister' => true);
//                 print_r("fark: ".$minutes_passed);
//                 print_r("şuanki : ".$currentTime->format("Y-m-d H:i:s"));
//                 print_r("veritabanı : ".$updated_at_date-*format("Y-m-d H:i:s"));
                // Bu fonksiyonda biraz uğraştım, aadaki saat farkını 3 saat gecikmeli veriyor sistemde (localhost'da). O yüzden 3 saat farkı da göz önüne alarak
                // 20 dakika geçmesini istediğim için 20 dk (+180dk) sunucu farkıyla beraber koydum koşulu.
                // Şuan 20 dakikada bir isteyebiliyor
                if ($minutes_passed <= 200) {
                    $this->session->set_flashdata('error', 'Doğrulama kodunu tekrar alabilmek için aradan en az 20 dakika geçmeli.');
                    $data['redirect'] = 'twostep';
                    $this->load->view('layout/_loginLayout', $data);
                } else {
                    $random_code = substr(bin2hex(random_bytes(2)), 0, 4); // 4 haneli rastgele kod üret
                    $send_code_to_mail = send_email($email, 'Register Activation Code', ("It's great to see you among us :) Thank you for registering. Your activation code is : " . $random_code));
                    if ($send_code_to_mail == false) {
                        $this->session->set_flashdata('error', 'Mail gönderme işlemleri şuan kapalıdır. Yöneticiyle görüşebilirsiniz.');
                        $data['redirect'] = 'twostep';
                        $this->load->view('layout/_loginLayout', $data);
                    } else {
                        // Eğer 20 dakikadan fazla geçtiyse
                        $codeGenerate = $this->General_Model->update("users", ["mailCode" => $random_code], ["email" => $email]);
                        $this->session->set_flashdata('again', 'Doğrulama kodunuz tekrardan mail adresinize gönderilmiştir. Kısa sürede ulaşacaktır.');
                        $data['redirect'] = 'twostep';
                        $this->load->view('layout/_loginLayout', $data);
                    }
                }
            }
        } else {
            redirect("/panel");
        }
    }

    public function twostep()
    {


        if ($this->input->post()) {
            $email = $this->session->userdata('email');
            $data['ileti'] = array('email' => $email, 'submitRegister' => true);


            $getcode = $this->input->post("i1") . "" . $this->input->post("i2") . "" . $this->input->post("i3") . "" . $this->input->post("i4");
            $code = trim($getcode);

            $account_mail_access = $this->General_Model->checkTwoFields("users", "email", $email, 'mailCode', $code);
            if ($account_mail_access == true) {
                $accountverify = $this->General_Model->update('users', ['IsActive' => '1'], ['email' => $email]);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Doğrulama kodu hatalıdır.');
                $data['redirect'] = 'twostep';
                $this->load->view('layout/_loginLayout', $data);
            }
        } else {
            $data['redirect'] = 'twostep';
            $this->load->view('layout/_loginLayout', $data);
        }
    }
}
