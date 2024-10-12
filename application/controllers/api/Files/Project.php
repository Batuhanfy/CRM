<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 29.09.2024
 * ⏰ Time: 00:25
 * 📄 File: project.php
 -->
 */

class project extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        rateLimit();
        $this->api_auth->needLogin();


    }

    function getFiles($id)
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }
        $files = $this->General_Model->getAll('files', ['project_id' => $id, 'IsActive' => '1']);
        $filesCount = $this->General_Model->count('files', ['project_id' => $id, 'IsActive' => '1']);
        $project_is = $this->project_model->getProject($id);
        if ($project_is == false) {
            res('not_found', 'Project not found');
        }
        if ($filesCount == 0) {
            res('not_found', 'Project files not found');
        }

        loge("GET Project Files Listing.");
        res('ok', null, $files);
    }
}