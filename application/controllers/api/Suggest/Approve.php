<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 28.09.2024
 * ⏰ Time: 22:24
 * 📄 File: approve.php
 -->
 */

class approve extends MY_Controller
{
    function __construct()
    {

        parent::__construct();
        rateLimit();
        $this->api_auth->needLogin();
        $this->api_auth->needAccess();

    }

    function accept()
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }
        $id = $this->input->post('id') ? $this->input->post('id') : null;
        $project_exist = $this->project_model->getProject($id);
        if ($project_exist == false) {
            res('not_found');
        }
        $updatedata = array(
            'confirm' => '1'
        );
        $suggest_changed = $this->General_Model->update('change_suggestions', $updatedata, ['project_id' => $id]);
        if ($suggest_changed == false) {
            res('server_error');
        } else {
            loge('POST Approve for quote');
            res('ok');
        }
    }
}