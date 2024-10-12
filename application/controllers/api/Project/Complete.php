<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 30.09.2024
 * ⏰ Time: 23:04
 * 📄 File: Complete.php
 -->
 */

class Complete extends MY_Controller
{
    function __construct()
    {
        parent:: __construct();
        rateLimit();
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

        $project_id = $this->input->post('project_id');
        if ($project_id == null) {
            res('wrong_entity');
        }
        if ($this->project_model->getProject($project_id) != null) {
            complete_project($project_id);
            loge(" POST A Project Completed.");
            res('ok');
        } else {
            res('not_found');
        }
    }
}
