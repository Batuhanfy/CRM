<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 26.09.2024
 * ⏰ Time: 17:46
 * 📄 File: forgotpassword.php
 -->
 */

class forgotPassword extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        rateLimitDanger();
    }

    function reset()
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }

        $email = $this->input->post("email");
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run()) {
            $user = $this->api_model->getUserByEmail($email);
            if ($user) {
                // 1 saat geçerli bir token oluşturuyoruz.
                $token = random_int(100000000, 9999999999);
                $expiration = date("Y-m-d H:i:s", strtotime('+1 hour'));
                // Veritabanındaki kullanıcılar tablosunda, kullanıcının şifre yenileme tokenini yenile.
                $this->api_model->setPasswordResetToken($user->id, $token, $expiration);
                // Şifre sıfırlama linki gönder
                $resetLink = base_url("auth/forgotpassword/token/" . $token);
                if (send_email($email, 'Reset Password Link', "Hello, click to reset your password: \r\n" . $resetLink)) {

                    res("ok", 'Reset link sent to your email address.');
                } else {
                    res("server_error", 'SMTP Server Error. Could not send the email.');
                }
            } else {
                res("not_found", "User not found");
            }
        } else {
            res("wrong_entity", 'Email has wrong syntax');
        }
    }

    public function token($token)
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }

        $user = $this->api_model->verifyResetToken($token);
        if ($user) {
            // Token geçerli, şifresini yenile.
            $newPassword = bin2hex(random_bytes(4));
            $this->api_model->updatePassword($user->id, $this->encryption->encrypt($newPassword));
            if (send_email($user->email, 'Your New Password', "Hello, your password has been reset. Your new password is: " . $newPassword)) {
                print_r('Your new password has been sent to your email address!');
            } else {
                print_r('Error! Could not send the email.');
            }
        } else {
            echo 'This link has expired or is not valid.';
        }
    }
}