<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 27.09.2024
 * ⏰ Time: 22:45
 * 📄 File: details.php
 -->
 */

class details extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        rateLimit();
        $this->api_auth->needLogin();
        $this->api_auth->needAccess();
        loge('GET Project Details');
    }

    function gets($id)
    {
        $project = $this->project_model->getProject($id);
        if ($project == false) {
            res('not_found', 'Project not found');
        } else {
            res('ok', null, $project);
        }
    }

    function all_list()
    {

        // Tüm projeleri listele
        $projects = $this->project_model->getProjects();
        if ($projects == false) {
            res('not_found', 'Project not found');
        } else {
            res('ok', null, $projects);
        }
    }

    function mylist()
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }
        $userid = $this->api_auth->getUserId();
        $projects = $this->project_model->getMyProjects($userid);
        if ($projects == false) {
            res('not_found', 'Project not found by user');
        } else {
            res('ok', null, $projects);
        }
    }

    function userlist($id)
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }
        $this->api_auth->needAccess();
        $projects = $this->project_model->getUserProject($id);
        if ($projects == false) {
            res('not_found', 'Project not found by user');
        } else {
            loge(" GET Project Details.");
            res('ok', null, $projects);
        }
    }
}