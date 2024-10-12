<?php

class Api_Auth
{

    protected $CI; // CodeIgniter instance'ı için değişken

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->model('General_Model');
    }

    /* Simple token based API authentication library docs for 'crm_project'
 * ============================================================
 * 🚀 Project: CRM Api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 26.09.2024
 * ⏰ Time: 15:20
 * 📄 File: Api_auth.php
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

    */
    private $encryptKey = 'afdsfdsf4fsefashgfjhgbdvdsc34asdd5tyhesfrj43asd'; // SECRET KEY (random generated)
    private $secretIV = 'asd45214mtgbtnfgnjhgnfkm43563ef38wcn22024035334asda'; //random generated initialization vector
    private $isTokenExpire = true;     // set true for token expiry, false for never expire (Token Zaman Ayarı)
    private $tokenExpriryInHours = 24; // token expiry time in Hours (Token Geçerlilik Süresi)
    private $encryptionMethod = "AES-256-CBC";
    private $output = null;

    public function encrypt($string)
    {
        $key = hash('sha256', $this->encryptKey);
        $iv = substr(hash('sha256', $this->secretIV), 0, 16);
        $encryptedText = openssl_encrypt($string, $this->encryptionMethod, $key, 0, $iv);
        return $encryptedText;
    }

    public function decrypt($string)
    {
        $key = hash('sha256', $this->encryptKey);
        $iv = substr(hash('sha256', $this->secretIV), 0, 16);
        $decryptedText = openssl_decrypt($string, $this->encryptionMethod, $key, 0, $iv);
        return $decryptedText;
    }

    public function generateToken($userId)
    {
        $tokenString = base64_encode(random_bytes(64));
        $token = strtr($tokenString, '+/', '-_');
        $mainToken = hash('sha256', $token);
        $this->storeTokenInAuthTokens($userId, $mainToken);
        $bearerToken = $mainToken . '.' . $this->encrypt($userId);
        return $bearerToken;
    }

    /* check user authentication */
    public function isNotAuthenticated()
    {
        $mainToken = $this->getMainToken();
        //var_dump($mainToken);exit;
        if ($mainToken != false) {
            $userId = $this->getUserId();
            $authStatus = $this->checkTokenFromUserTable($userId, $mainToken);
            if ($authStatus == true) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    public function needLogin()
    {
        $isLogin = $this->isNotAuthenticated();
        if ($isLogin == true) {
            res('unauthorized', 'Please log-in.');
        }
    }

    public function needAccess() {
        $userid = $this->getUserId();
        $isHasPermission = $this->CI->General_Model->checkTwoFields('user_roles', 'user_id', $userid, 'role_id', '1');

        if ($isHasPermission == false) {
            res('unauthorized', 'You have no access to this page.'); // Yetkisiz erişim yanıtı
        }




    }

    /* get User Id */
    public function getUserId()
    {
        if ($this->getTokenParts() != false) {
            $tokenPart = $this->getTokenParts();
            //print_r($tokenPart);exit;
            $userIdToken = $tokenPart[1];
            $userId = $this->decrypt($userIdToken);
            return $userId;
        } else {
            echo 'Token parts Error!';
            exit;
        }
    }

    /* get Token parts */
    public function getTokenParts()
    {
        $bearerToken = $this->getBearerToken();
        if ($bearerToken == null) {
            $err = array(
                'status' => false,
                'message' => 'Token not found',
            );
            return json_encode($err);
            exit;
        } else {
            $tokenChunks = explode(".", $bearerToken);
            return $tokenChunks;
        }
    }

    /* Get Main Token */
    public function getMainToken()
    {
        if ($this->getTokenParts() != false) {
            $tokenPart = $this->getTokenParts();
            $mainToken = $tokenPart[0];
            return $mainToken;
        } else {
            return false;
        }
    }

    /**
     * Get header Authorization
     * */
    function getAuthorizationHeader()
    {
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        } else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            //print_r($requestHeaders);
            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
        return $headers;
    }

    /**
     * get access token from header
     * */
    function getBearerToken()
    {
        $headers = $this->getAuthorizationHeader();
        // HEADER: Get the access token from the header
        if (!empty($headers)) {
            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
                return $matches[1];
            }
        }
        return null;
    }

    /* create auth_tokens table by using this Schema
    "CREATE TABLE `auth_tokens` ( `id` INT NOT NULL AUTO_INCREMENT ,
    `user_id` INT(11) NOT NULL , `token` VARCHAR(255) NOT NULL ,
    `expiry_date` VARCHAR(50) NOT NULL ,
    `created_at` VARCHAR(50) NOT NULL ,
     PRIMARY KEY (`id`)) ENGINE = InnoDB;"
    */
    function checkTokenFromUserTable($userId, $mainToken)
    {
        $CI = &get_instance();  //Store instance in a variable.
        $CI->load->database();
        $CI->db->select('*');
        $CI->db->from('auth_tokens');
        $CI->db->where(['user_id' => $userId, 'token' => $mainToken]);
        if ($this->isTokenExpire) {
            $expiryDate = date('Y-m-d H:i:s');
            $CI->db->where('expiry_date >=', $expiryDate);
        }
        $query = $CI->db->get();
        //echo $query->num_rows();exit;
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function storeTokenInAuthTokens($userId, $token)
    {
        $expirtyDate = $this->getTimeAfterHours($this->tokenExpriryInHours);
        $CI = &get_instance();  //Store instance in a variable.
        $CI->load->database();
        if ($CI->db->query("SELECT * FROM auth_tokens WHERE user_id='$userId'")->num_rows() > 0) {
            $CI->db->where('user_id', $userId);
            $CI->db->update('auth_tokens', ['expiry_date' => $expirtyDate, 'user_id' => $userId, 'token' => $token, 'created_at' => date('Y-m-d H:i')]);
        } else {
            $CI->db->insert('auth_tokens', ['expiry_date' => $expirtyDate, 'user_id' => $userId, 'token' => $token, 'created_at' => date('Y-m-d H:i')]);
        }
    }

    function getTimeAfterHours($hours)
    {
        if ($hours != null || $hours != 0) {
            return date('Y-m-d H:i:s', strtotime($hours . ' hour'));
        } else {
            $hours = 24; //setting default time
            return date('Y-m-d H:i:s', strtotime($hours . ' hour'));
        }
    }
}

