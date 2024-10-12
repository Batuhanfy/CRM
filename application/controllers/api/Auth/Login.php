<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 26.09.2024
 * ⏰ Time: 17:19
 * 📄 File: login.php
 -->
 */

class Login extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        rateLimit();
    }

    function user()
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }

        $login = checkLogin();
        if ($login != null) {
            $bearerToken = $this->api_auth->generateToken($login);
            loge("POST User Login Succesfully.");
            res("ok", null, null, ['token' => $bearerToken]);

        } else {
            res("not_found", 'Wrong email or password.');
        }
    }
}
