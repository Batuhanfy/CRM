<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 26.09.2024
 * ⏰ Time: 23:34
 * 📄 File: update.php
 -->
 */

class update extends MY_Controller
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
        $fields = [
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
        $select = array(
            "first_name" => $first_name,
            "last_name" => $last_name,
            "phone" => $phone,
            "address" => $address
        );
        $data = array();
        foreach ($select as $key => $value) {
            if ($value != null && strlen($value) > 3 && $value != null) {
                $data[$key] = $value;
            }
        }
        if (count($data) > 0) {
            // changes
            $userid = $this->api_auth->getUserId();
            $doupdate = $this->profileupdate_model->changeProfile($data, $userid);
            if ($doupdate == true) {
                loge(" POST User Profile Updated.");
                res('ok');
            } else {
                res('server_error');
            }
        } else {
            res('not_found', 'You did not submit a change.');
        }
    }
}