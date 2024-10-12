<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 28.09.2024
 * ⏰ Time: 16:05
 * 📄 File: new.php
 -->
 */

class newSuggestion extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        rateLimit();
        $this->api_auth->needLogin();
        loge("POST New Suggestion");
    }

    // api/suggest/newsuggestion/project
    function project()
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }
        $id = $this->input->post('id') ? $this->input->post('id') : null;
        $suggest = $this->input->post('suggest') ? $this->input->post('suggest') : null;
        $project_exist = $this->project_model->getProject($id);
        if ($project_exist == false) {
            res('not_found');
        }
        $project_suggest_exist = $this->suggest_model->getSuggest($id);
        if ($project_suggest_exist != false) {
            res('forbidden', 'this project has a suggestion');
        }
        if (strlen($suggest) < 5) {
            res('forbidden', 'your suggest less than 5 words');
        }
        $userid = $this->api_auth->getUserId();
        $newSuggestion = $this->suggest_model->newSuggest($id, $userid, $suggest);
        if ($newSuggestion == false) {
            res('server_error');
        } else {
            loge('GET New Suggestion Added');
            res('ok');
        }
    }
}

