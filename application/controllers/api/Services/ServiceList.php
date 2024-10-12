<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 27.09.2024
 * ⏰ Time: 01:35
 * 📄 File: list.php
 -->
 */

class serviceList extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        rateLimit();
        $this->api_auth->needLogin();
        $this->api_auth->needAccess();

        admin_activite("Service List","Service List Görüntülendi.");
    }

    function index()
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }
        loge('GET Service List Viewd');
        $services = $this->services_model->getServices();
        res('ok', null, $services);
    }
}