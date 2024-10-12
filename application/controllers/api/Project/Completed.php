<?php

/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 30.09.2024
 * ⏰ Time: 23:15
 * 📄 File: Completed.php
 -->
 */

class Completed extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->api_auth->needLogin();
        $this->api_auth->needAccess();

    }

    function index()
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }

        $completed_projects = $this->General_Model->getAll('projects', ['status' => 'completed']);
        if (!empty($completed_projects)) {
            loge(" GET Listing Completed Projects");
            res('ok', null, $completed_projects);
        } else {
            res('not_found');
        }
    }
}
 
