<?php
/*
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 8.10.2024
 * ⏰ Time: 00:54
 * 📄 File: _loginLayout.php
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
$this->load->view('meta/loginLayout/header');


$data['layout'] = "login";

if(isset($ileti) && !empty($ileti)){
    foreach($ileti as $key => $value){
        $data[$key] = $value;
    }
}else{
    $ileti = "";
}

if($this->session->userdata('email') != null){
$data['email'] = $this->session->userdata('email');
$user = $this->General_Model->get('users',['email'=>$data['email']],'*');
$data['first_name'] = $user->first_name;
$data['last_name'] = $user->last_name;


}

if(!isset($redirect)){
redirect('/');
}


switch ($redirect) {
    case "register":
        $this->load->view('pages/loginLayout/register',$data);
        break;
    case "login":
        $this->load->view('pages/loginLayout/login',$data);
        break;
    case "twostep":
        $this->load->view('pages/loginLayout/twostep',$data);
        break;
    case "passreset":
        $this->load->view('pages/loginLayout/passreset',$data);
        break;
    case "notfound":
        $this->load->view('pages/error/404',$data);
        break;
    case "servererror":
        $this->load->view('pages/error/505',$data);
        break;
    case "lockscreen":
        $this->load->view('pages/loginLayout/lockscreen',$data);
        break;
    case "logout":
        $this->load->view('pages/loginLayout/logout',$data);
        break;
    case "passchange":
        $this->load->view('pages/loginLayout/passchange',$data);
        break;
    case "success":
        $this->load->view('pages/loginLayout/success',$data);
        break;
    default:
        $this->load->view('pages/error/404',$data);
        break;
}

$this->load->view('meta/loginLayout/footer');

