<?php
/*
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 2.10.2024
 * ⏰ Time: 01:57
 * 📄 File: Balance.php
 * 📧 Contact: iletisim@batuhankorkmaz.com | bthnkkz@yahoo.com
 * 💼 LinkedIn: https://www.linkedin.com/in/batuhan-korkmaz-180ab4318/
 * 💻 GitHub: https://github.com/Batuhanfy 
 * ============================================================
 * 💡 Description: 
 * This code has been crafted with precision and a strong
 * emphasis on clean coding principles. Every effort has been
 * made to ensure reliability, performance, and maintainability.
 * 
 * If you encounter any issues or have suggestions, please don't 
 * hesitate to reach out via the contact information provided above.
 * ============================================================
 -->
 */

class Balance extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->api_auth->needLogin();

    }

    function index()
    {

        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }

        $user_id = $this->api_auth->getUserId();
        $user_balance = $this->General_Model->get('users', ['id' => $user_id], 'balance');

        loge(" GET User Money Viewed");
        res('ok', null, null, $user_balance);

    }

    function add()
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }

        $this->api_auth->needAccess();
        $price = trim($this->input->post('price'));
        $user_id = $this->input->post('user_id');
        if (!is_numeric($price) || $price <= 0) {
            res('wrong_entity', 'Invalid price format. Must be a positive number');
            return;
        }
        $price = floatval($price);
        $currently_balance = $this->General_Model->get('users', ['id' => $user_id], 'balance');
        $currently_balance = floatval($currently_balance->balance);
        $new_balance = $currently_balance + $price;
        $user_balance = $this->General_Model->update('users', ['balance' => $new_balance], ['id' => $user_id]);
        if ($user_balance !== false) {
            loge(" POST User Money Deposit.");
            res('ok', null, null);
        } else {
            res('forbidden', 'Could not be updated. Please try again later');
        }
    }

    function update()
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }

        $this->api_auth->needAccess();
        $price = trim($this->input->post('price'));
        $user_id = $this->input->post('user_id');
        if (!is_numeric($price) || $price <= 0) {
            res('wrong_entity', 'Invalid price format. Must be a positive number');
            return;
        }
        $price = floatval($price);
        $new_balance = $price;
        $user_balance = $this->General_Model->update('users', ['balance' => $new_balance], ['id' => $user_id]);
        if ($user_balance !== false) {
            loge(" POST User Money Uptaded. (User ID: {$user_id}) ");
            res('ok', null, null);
        } else {
            res('forbidden', 'Could not be updated. Please try again later');
        }
    }
}