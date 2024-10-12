<?php
/*
?>
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 26.09.2024
 * ⏰ Time: 15:56
 * 📄 File: register.php
 -->
 */

class Register extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        rateLimitDanger();
    }

    function NewAccount()
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }
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

        // Form validation
        $this->form_validation->set_rules('email', 'Mail', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run()) {
            // Şifreyi hash'le
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // Veritabanına kayıt edilecek veriler
            $data = array(
                "email" => $email,
                "password" =>  $hashed_password, // Şifre artık hashlenmiş
                "first_name" => $first_name,
                "last_name" => $last_name,
                "phone" => $phone,
                "address" => $address
            );

            // Kullanıcı kaydı için modeli çağır
            $run_register = $this->api_model->registerUser($data);

            // $run_register model response types
            //  1 -> Successfully registered.
            //  0 -> User is already registered.
            // -1 -> Database model has catch(exception) error.

            if ($run_register == 1) {
                send_email($email, 'Welcome to CRM Panel!', "It's great to see you among us :) Thank you for registering.");
                res('ok', 'Registered successfully.');
            } else if ($run_register == 0) {
                res('forbidden', 'This email is already registered!');
            } else if ($run_register == -1) {
                res('server_error', 'Database error. Contact the administrator');
            }
        } else {
            res('not_found', 'Required information is missing. Please provide email and password.');
        }
    }

}
