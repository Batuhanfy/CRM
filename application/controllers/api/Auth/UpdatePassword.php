<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 27.09.2024
 * ⏰ Time: 00:28
 * 📄 File: updatepassword.php
 -->
 */

class updatePassword extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->api_auth->needLogin();
        rateLimit();
    }

    function index()
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }
        $currentPassword = $this->input->post("cpassword");
        $this->input->post("npassword");
        $newPassword = $this->input->post("npassword_confirm");
        $this->form_validation->set_rules('cpassword', 'Currently Password', 'required');
        $this->form_validation->set_rules('npassword', 'New Password', 'required');
        $this->form_validation->set_rules('npassword_confirm', 'New Password Confirm', 'required|matches[npassword]');
        if ($this->form_validation->run()) {
            $userid = $this->api_auth->getUserId();
            $checkPassword = $this->passwordupdate_model->checkPassword($currentPassword, $userid);
            if ($checkPassword == true) {
                $change = $this->passwordupdate_model->changePassword($newPassword, $userid);
                if ($change == true) {
                    loge(" POST User Password Updated.");
                    res('ok');
                } else {
                    res('server_error');
                }
            } else {
                res('forbidden', 'Password is wrong.');
            }
        } else {
            res('forbidden', 'Password and Confirm Password must be same.');
        }
    }
}