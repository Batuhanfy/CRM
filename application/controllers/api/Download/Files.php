<?php

/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 29.09.2024
 * ⏰ Time: 00:18
 * 📄 File: files.php
 -->
 */

class files extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        rateLimit();
        $this->api_auth->needLogin();

    }

    public function download_file_get($file_id)
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }
        $query = $this->db->get_where('files', array('id' => $file_id));
        $file = $query->row();
        if ($file) {
            loge("GET Project Files Downloaded.");
            $this->load->helper('download');
            force_download($file->file_path, NULL);
        } else {
            res('not_found', 'File not found!');
        }
    }
}