<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 27.09.2024
 * ⏰ Time: 05:45
 * 📄 File: create_from_quote.php
 -->
 */

class createFromQuote extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        rateLimit();
        $this->api_auth->needLogin();
        $this->api_auth->needAccess();

    }

    function new($id)
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }
        $quote_is = $this->quote_model->isQuoteIsset($id);
        if ($quote_is == false) {
            res('not_found', 'Quote not found');
        } else {
            $newProjectIs = $this->quote_model->createproject($id);
            if ($newProjectIs == false) {
                res('server_error', 'Could not create project');
            } else {
                loge(" POST Created Project By Quote");
                res('ok');
            }
        }
    }
}
 
