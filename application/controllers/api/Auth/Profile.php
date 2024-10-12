<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 26.09.2024
 * ⏰ Time: 23:21
 * 📄 File: profile.php
 -->
 */

class Profile extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->api_auth->needLogin();

    }

    public function details()
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }

        $userid = $this->api_auth->getUserId();
        $profile = $this->api_model->getProfile($userid);
        if ($profile != null) {
            loge(" GET User Profile Viewed.");
            res('ok', null, $profile);
        } else {
            res('not_found');
        }
    }
}