<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 28.09.2024
 * ⏰ Time: 23:34
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
        $this->api_auth->needAccess();
    }

    public function upload_file()
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }
        $description = $this->input->post("description");
        $project_id = $this->input->post("project_id");
        $upload_from_userid = $this->api_auth->getUserId();
        if ($description == null || $project_id == null || strlen($description) < 1) {
            res('wrong_entity', 'id or description must be right syntax');
        }
        $project_is = $this->project_model->getProject($project_id);
        if ($project_is == false) {
            res('not_found');
        }
        if (!$this->upload->do_upload('file')) {
            // Yükleme başarısız olursa hata mesajı göster
            $error = array('error' => $this->upload->display_errors());
            res('server_error', null, null, $error);
        } else {
            // Başarılı yüklemede dosya bilgilerini veritabanına kaydet
            $data = array('upload_data' => $this->upload->data());
            // Dosya bilgilerini veritabanına kaydedebiliriz.
            $fileData = [
                'file_name' => $data['upload_data']['file_name'],
                'file_path' => $data['upload_data']['full_path'],
                'description' => $description,
                'project_id' => $project_id,
                'upload_from_user_id' => $upload_from_userid
            ];
            $this->db->insert('files', $fileData);
            admin_activite("File Upload", "Projeye dosya eklendi.");
            $project_user = $this->General_Model->get('projects', ['id' => $project_id], 'user_id')->user_id;
            $user_mail = $this->General_Model->get('users', ['id' => $project_user], 'email')->email;
            send_email($user_mail, 'Information', "Hello! A new file has been added to a project belonging to you in our CRM projects panel. You can access this file from the My Projects section.");
            loge('POST Proje Files Uploaded.');
            res('ok', null, $data);
        }
    }
}