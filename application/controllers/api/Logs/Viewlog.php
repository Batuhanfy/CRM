<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 1.10.2024
 * ⏰ Time: 00:16
 * 📄 File: log.php
 -->
 */

class viewlog extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        rateLimit();
        $this->api_auth->needLogin();
        $this->api_auth->needAccess();

    }

    public function index()
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }
        $user = $this->input->post("user_id");
        if ($user != null) {
            $all_logs = $this->General_Model->getAll('logs', ['user' => $user], '*', 500);
        } else {
            $all_logs = $this->General_Model->getAll('logs');
        }
        res('ok', null, $all_logs);
    }
}