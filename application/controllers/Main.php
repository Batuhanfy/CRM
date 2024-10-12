<?php
/*
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 8.10.2024
 * ⏰ Time: 21:41
 * 📄 File: Main.php
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
 
class Main extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        if ($this->session->userdata('logged_in')) {

         $email = $this->session->userdata('email');
            $account_mail_access = $this->General_Model->checkTwoFields("users","email",$email,'IsActive','1');
            if($account_mail_access == true){


                redirect('dashboard');


            }else{
                $data['redirect']='twostep';
                $data['ileti']=array('mail'=>$email,'submitRegister'=>true);
                $this->load->view('layout/_loginLayout',$data);

            }

        }else{
            redirect('/auth/login');
        }

    }
    public function notfound(){
        $data['redirect']='notfound';
        $this->load->view('layout/_loginLayout',$data);
    }
    public function servererror(){
        $data['redirect']='servererror';
        $this->load->view('layout/_loginLayout',$data);
    }


}