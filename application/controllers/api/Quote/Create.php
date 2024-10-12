<?php
/*
<!--
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 27.09.2024
 * ⏰ Time: 02:08
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

    public function isValidDate($date)
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }
        $d = DateTime::createFromFormat('d/m/Y', $date);
        return $d && $d->format('d/m/Y') === $date;
    }

    public function isValidFutureDate($date)
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }
        $d = DateTime::createFromFormat('d/m/Y', $date);
        if (!$d || $d->format('d/m/Y') !== $date) {
            return false;
        }
        $today = new DateTime();
        if ($d > $today) {
            return true; // Geçerli ve bugünden ileri tarih
        } else {
            return false; // Geçmiş bir tarih
        }
    }

    function index()
    {
        Header('Access-Control-Allow-Origin: *');
        Header('Access-Control-Allow-Headers: *');
        Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            $this->response([], 200);
        }
        // Eğer hizmet id girilmişse o hizmetin bilgileri çekilecek.
        // Ama girilmemiş ve manuel hizmet başlığı ve açıklaması girilmişse onlar alınacak.
        if($this->input->post()) {
            $service_id = $this->input->post("service_id") ? $this->input->post("service_id") : null;
            $user_id = $this->input->post("user_id") ? $this->input->post("user_id") : null;
            $quote_time = $this->input->post("quote_time") ? $this->input->post("quote_time") : null;
            $service_name = $this->input->post("service_name");
            $service_description = $this->input->post("service_description");
            $service_price = $this->input->post("service_price");
            if ($quote_time == null) {
                res('forbidden', 'Date did not entered');
            } else {
                if ($quote_time && $this->isValidDate($quote_time)) {
                    if ($this->isValidFutureDate($quote_time)) {
                        // ileri tarih
                    } else {
                        res('forbidden', 'Date must be future in time.');
                    }
                } else {
                    res('forbidden', 'invalid date syntax (must be like 12/12/2024)');
                }
            }
            if ($user_id == null) {
                res('forbidden', 'User id is required');
            } else {
                $isUserActive = $this->api_model->getProfile($user_id);
                if ($isUserActive == null) {
                    res('not_found', 'User not found');
                }
            }
            if ($service_id != null) {
                $isService = $this->quote_model->isServiceIsset($service_id);
                if ($isService == false) {
                    res('not_found', 'Service not found');
                } else {
                    $serviceName = $isService['service_name'];
                    $serviceDesc = $isService['service_description'];
                    $servicePrice = $isService['service_price'];
                    $newQuoteDetails = array(
                        'service_name' => $serviceName,
                        'service_description' => $serviceDesc,
                        'total_price' => $servicePrice,
                        'valid_until' => $quote_time,
                        'user_id' => $user_id,
                        'status' => 'pending'
                    );
                    $loadNewQuote = $this->quote_model->newQuote($newQuoteDetails);
                    if ($loadNewQuote == true) {
                        res('ok', null, null, $newQuoteDetails);
                    } else {
                        res('server_error', null, null, $newQuoteDetails);
                    }
                }
            } else {
                if ($service_name == null) {
                    res('not_found', 'Quote name is required');
                }
                if ($service_description == null) {
                    res('not_found', 'Quote description is required');
                }
                if ($service_price == null) {
                    res('not_found', 'Quote price is required');
                }
                $newQuoteDetails = array(
                    'service_name' => $service_name,
                    'service_description' => $service_description,
                    'total_price' => $service_price,
                    'valid_until' => $quote_time,
                    'user_id' => $user_id,
                    'status' => 'pending'
                );
                $loadNewQuote = $this->quote_model->newQuote($newQuoteDetails);
                if ($loadNewQuote == true) {
                    res('ok', null, null, $newQuoteDetails);
                    loge(" POST Quote Created.");
                } else {
                    res('server_error', null, null, $newQuoteDetails);
                }
            }
        }else{
            $data['page']="quotes/create_quote";
            $data['title']="teklif oluştur";
            $data['hazşr']=$this->db->get('services')->result();
            $this->load->view('index', $data);
        }
    }
}