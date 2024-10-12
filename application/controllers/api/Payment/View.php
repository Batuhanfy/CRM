<?php

/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 30.09.2024
 * ⏰ Time: 03:25
 * 📄 File: view.php
 -->
 */

class view extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->api_auth->needLogin();

    }

    function index()
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }

        $project_id = $this->input->post('project_id');
        if ($project_id == null) {
            res('wrong_entity', 'Please send project_id');
        }
        if ($this->project_model->getProject($project_id) == null) {
            res('not_found', 'Project not found');
        }
        $all_payments = $this->General_Model->getAll('payments', ['project_id' => $project_id]);
        loge(" GET Payments View");
        res('ok', null, $all_payments);
    }
}
 
