<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 1.10.2024
 * ⏰ Time: 00:37
 * 📄 File: Send.php
 -->
 */

class Send extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        rateLimit();
        $this->api_auth->needLogin();
        $this->api_auth->needAccess();
    }

    public function mail()
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }
        $to = $this->input->post('to');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        if ($to == null || $to == "" || $subject == null || $message == null) {
            res('wrong_entity');
        }
        send_email($to, $subject, $message);
        loge(" POST Notification Sent.");
        res('ok');
        admin_activite("Notification Send","Bildirim gönderildi.");
    }
}