<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 27.09.2024
 * ⏰ Time: 04:26
 * 📄 File: status.php
 -->
 */

class status extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->api_auth->needLogin();
        loge("GET Quote Status");
    }

    public function info($id)
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
                res('not_found');
            } else {
                loge('GET Quote status');
                res('ok', null, null, ['status' => $quote_bilgi['status']]);
            }
        } else {
          res('wrong_entity','ID error');
        }
    }
}
