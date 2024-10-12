<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 27.09.2024
 * ⏰ Time: 03:53
 * 📄 File: update.php
 -->
 */

class update extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        rateLimit();
        $this->api_auth->needLogin();
        $this->api_auth->needAccess();
        loge("POST Quote Update");
    }

    public function index()
    {
        $id_degeri = $this->input->post("id") ? $this->input->post("id") : null;
        if ($id_degeri != null) {
            $checkQuote = $this->quote_model->isQuoteIsset($id_degeri);
            if ($checkQuote == false) {
                res('not_found');
            } else {
                $user_id = $this->input->post("user_id") ? $this->input->post("user_id") : null;
                $quote_time = $this->input->post("quote_time") ? $this->input->post("quote_time") : null;
                $service_name = $this->input->post("service_name") ? $this->input->post("service_name") : null;
                $service_description = $this->input->post("service_description") ? $this->input->post("service_description") : null;
                $service_price = $this->input->post("service_price") ? $this->input->post("service_price") : null;
                $status = $this->input->post("service_price") ? $this->input->post("status") : null;
                $all_data = array(
                    'user_id' => $user_id,
                    'valid_until' => $quote_time,
                    'service_name' => $service_name,
                    'service_description' => $service_description,
                    'total_price' => $service_price,
                    'status' => $status,
                );
                $changed_types = array();
                foreach ($all_data as $key => $value) {
                    if ($value !== null && $value != "") {
                        $changed_types[$key] = $value;
                    }
                }
                if ($changed_types == null) {
                    res('forbidden', 'You did not submit a change.');
                } else {
                    // Değişiklikleri uygulamamız gerekiyor..
                    $changed = $this->quote_model->changeQuote($changed_types, $id_degeri);
                    if ($changed == false) {
                        res('server_error');
                    } else {
                        loge('POST Quote Uptaded');
                        res('ok', null, $changed_types);
                    }
                }
            }
        } else {
            res('forbidden', 'ID not provided.');
        }
    }
}