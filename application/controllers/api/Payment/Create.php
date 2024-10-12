<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 30.09.2024
 * ⏰ Time: 03:05
 * 📄 File: create.php
 -->
 */

class create extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        rateLimit();
        $this->api_auth->needLogin();
        $this->api_auth->needAccess();


    }

    function index()
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }
        $project_id = $this->input->post('project_id');
        $amount = $this->input->post('amount');
        $payment_date = $this->input->post('payment_date');
        if ($project_id == null || $amount == null || $payment_date == null) {
            res('forbidden', 'Please send project_id, amount and payment date');
        }
        if ($this->project_model->getProject($project_id) == null) {
            res('not_found', 'Project not found');
        }
        if (isValidFutureDate($payment_date) == false) {
            res('wrong_entity', 'Date has wrong format');
        }
        $data = array(
            'project_id' => $project_id,
            'amount' => $amount,
            'payment_date' => $payment_date
        );
        if ($this->General_Model->insert('payments', $data)) {

            $user_mail= $this->General_Model->get('users',['id'=>$project_user],'email')->email;
            send_email($user_mail, 'Information for Payment', "Hello, you need to make a payment in your CRM project. You can enter the payment request created on your behalf into the system and review it.");
            loge("POST Create Payment Success");
            admin_activite("Payment Create","Payment Oluşturuldu.");
            res('ok', null, $data);
        }
    }
}