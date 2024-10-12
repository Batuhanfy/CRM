<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 27.09.2024
 * ⏰ Time: 16:55
 * 📄 File: list.php
 -->
 */

class lists extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->api_auth->needLogin();
        loge("GET User's Quote List");
    }

    function my()
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }
        // kullanıcının kendi quotelerini görüntülemesi için.
        $user_id = $this->api_auth->getUserId();
        $list_my_quote = $this->quote_model->my($user_id);
        if ($list_my_quote == false) {
            res('not_found');
        } else {
            loge('GET Quote Lists Own');
            res('ok', null, $list_my_quote);
        }
    }
}