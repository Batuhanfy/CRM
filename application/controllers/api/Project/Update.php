<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 28.09.2024
 * ⏰ Time: 02:47
 * 📄 File: update.php
 -->
 */

class Update extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        rateLimit();
        $this->api_auth->needLogin();
        $this->api_auth->needAccess();

    }

    function projectid($id)
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }

        $exist = $this->project_model->getProject($id);
        if (!$exist) {
            res('not_found');
        }
        $name = $this->input->post('name') ? $this->input->post('name') : null;
        $desc = $this->input->post('description') ? $this->input->post('description') : null;
        $end_date = $this->input->post('end_date') ? $this->input->post('end_date') : null;
        $status = $this->input->post('status') ? $this->input->post('status') : null;
        $active = $this->input->post('active') ? $this->input->post('active') : null;
        if ($end_date) {
            $date_format = DateTime::createFromFormat('d/m/Y', $end_date);
            if ($date_format && $date_format->format('d/m/Y') === $end_date) {
            } else {
                res('forbidden', 'Date syntax must be like -> 12/12/2024');
            }
        }
        if ($active !== 1 && $active !== 0 && $active !== "1" && $active !== "0" && $active !== null) {
            res('forbidden', '"Active" must be 1 or 0');
        }
        $data = array(
            'project_name' => $name,
            'description' => $desc,
            'end_date' => $end_date,
            'status' => $status,
            'IsActive' => $active
        );
        $updatearray = array();
        foreach ($data as $key => $value) {
            if ($value != null) {
                $updatearray[$key] = $value;
            }
        }
        if ($updatearray == null) {
            res('not_found', 'No found any changes.');
        }
        $guncelleme_istegi = $this->project_model->updateProject($id, $updatearray);
        if ($guncelleme_istegi == false) {
            res('server_error');
        } else {
            loge(" POST Project Uptaded.");
            admin_activite("Project Update","Proje dosyası güncellendi.");
            res('ok');

        }
    }
}