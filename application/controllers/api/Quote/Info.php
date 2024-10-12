<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 27.09.2024
 * ⏰ Time: 05:19
 * 📄 File: info.php
 -->
 */

class info extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->api_auth->needLogin();

    }

    public function get($id)
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }
        if (is_numeric($id)) {
            $quote_bilgi = $this->quote_model->isQuoteIsset($id);
            if ($quote_bilgi == false) {
                res('not_found', 'Qoute not found');
            } else {
                loge('GET Quote Info Viewed');
                res('ok', null, $quote_bilgi);
            }
        } else {
            res('not_found');
        }
    }
}