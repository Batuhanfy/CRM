<?php
/*
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 12.10.2024
 * ⏰ Time: 17:47
 * 📄 File: Admin.php
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


class Admin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        nonCheckSessionLoginAndGo();
        $email = $this->session->userdata("email");
        $isLocked = $this->General_Model->count('users', ['email' => $email, 'locked' => '1']);
        if ($isLocked > 0) {
            redirect('auth/lockscreen');
        }

        $user_email = $this->session->userdata('email');
        $user = $this->General_Model->get('users', ['email' => $user_email], '*');
        $isAdmin = $this->General_Model->checkTwoFields('user_roles','user_id',$user->id,'role_id','1');
        if($isAdmin == false){
            redirect('/');
        }


    }


    public function users(){
        $data['redirect']='users';
        $this->load->view('layout/_adminLayout',$data);
    }


    public function projects(){
        $data['redirect']='projects';
        $this->load->view('layout/_adminLayout',$data);
    }
    public function nextprojects(){
        $data['redirect']='nextprojects';
        $this->load->view('layout/_adminLayout',$data);
    }

    public function requestpayment(){
        if($this->input->post()){
           $projectid=  $this->input->post("projectid");
           $balance= $this->input->post("amount");
           $end_date= $this->input->post("tarih");
            if($projectid == null || $balance == null || $end_date == null){
                $this->session->set_flashdata('error', 'Eksik bilgi.');
                $data['redirect']='requestpayment';
                $this->load->view('layout/_adminLayout',$data);
            }else{
            $project = $this->General_Model->get('projects',['id'=>$projectid],'*');
            if($project == null){
                $this->session->set_flashdata('error', 'Proje Bulunamadı');
                $data['redirect']='requestpayment';
                $this->load->view('layout/_adminLayout',$data);
            }else{
                if (!is_numeric($balance)) {
                    $this->session->set_flashdata('error', 'Girdiğiniz ücret sayısal değerde gözükmüyor.');
                    $data['redirect']='requestpayment';
                    $this->load->view('layout/_adminLayout',$data);
                }else{
                    if (preg_match("/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/", $end_date)) {
                        $projedenemail = $this->General_Model->get('projects',['id'=>$projectid],'*');
                        $projenin_useri = $this->General_Model->get('users',['id'=>$projedenemail->user_id],'*');
                        $data_payment['project_id']=$projectid;
                        $data_payment['amount']=$balance;
                        $data_payment['payment_date']=$end_date;
                        $data_payment['user_id']=$projenin_useri->id;
                        $data_payment['status']='pending';


                        $new_payment= $this->General_Model->insert('payments',$data_payment);

                        if($new_payment == false){
                            $this->session->set_flashdata('error', 'Maalesef eklenemedi.');
                            $data['redirect']='requestpayment';
                            $this->load->view('layout/_adminLayout',$data);
                        }else {
                            $this->session->set_flashdata('success', 'Ödeme başarıyla eklendi.');
                            $data['redirect']='requestpayment';
                            $this->load->view('layout/_adminLayout',$data);
                        }
                    } else {
                        $this->session->set_flashdata('error', 'Girdiğiniz tarih formatı hatalıdır. 12/12/2024 şeklinde GG/AA/YYYY giriniz.');
                        $data['redirect']='requestpayment';
                        $this->load->view('layout/_adminLayout',$data);
                    }


                }
            }
            }
        }else{
            $data['redirect']='requestpayment';
            $this->load->view('layout/_adminLayout',$data);
        }
    }
    public function requestok(){
        if($this->input->post()){
            if($this->input->post('requestid') !==null ){
                $request_id=$this->input->post('requestid');
                $offersdata['status']='ok';
                $update= $this->General_Model->update('offers',$offersdata,['id'=>$request_id]);
                if($update == null){
                    $this->session->set_flashdata('error', 'Güncellenemedi.');
                    $data['redirect']='listquoterequests';
                    $this->load->view('layout/_adminLayout',$data);
                }else {
                    $this->session->set_flashdata('success', 'Başarıyla güncellendi..');
                    $data['redirect']='listquoterequests';
                    $this->load->view('layout/_adminLayout',$data);
                }
            }else{
                $this->session->set_flashdata('error', 'Form hatası.');
                $data['redirect']='listquoterequests';
                $this->load->view('layout/_adminLayout',$data);
            }
        }else{
            $data['redirect']='listquoterequests';
            $this->load->view('layout/_adminLayout',$data);
        }
    }

    public function files(){
        $data['redirect']='files';
        $this->load->view('layout/_adminLayout',$data);
    }
    public function uploadfiles(){
        if ($this->input->post()) {
            $project_id = $this->input->post('projectid');
            $project_description = $this->input->post('desc');
            $project_user_id = $this->General_Model->get('projects',['id'=>$project_id],'*');
            // Yükleme ayarları
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx|rar|zip|exe|txt';
            $config['max_size'] = 2048;  // 2MB
            $config['file_name'] = 'file_' . time();  // Dosyaya zaman damgası ekle

            // Upload kütüphanesini yükleme
            $this->load->library('upload', $config);

            // Dosyayı yükleme
            if (!$this->upload->do_upload('userfile')) {
                // Hata durumunda mesaj gösterme
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', 'Dosya yüklenemedi: ' . $error);
                redirect('admin/uploadfiles');
            } else {
                // Başarılı yükleme durumunda dosya bilgilerini al
                $data = $this->upload->data();


                // Başarı mesajı ve yönlendirme


                $datafile['file_name']=$data['file_name'];
                $datafile['file_path']=$data['file_path'];
                $datafile['full_path']=$data['full_path'];
                $datafile['file_size']=$data['file_size'];
                $datafile['file_type']=$data['file_type'];
                $datafile['project_id']=$project_id;
                $datafile['proje_user_id']=$project_user_id->user_id;
                $datafile['upload_from_user_id']=$this->session->userdata('user_id');
                $datafile['description']=$project_description;

                $savefile= $this->General_Model->insert('files',$datafile);

                if($savefile == false){
                    $this->session->set_flashdata('error', 'Dosya yüklenemedi ' . $data['file_name']);

                }else{
                    $this->session->set_flashdata('success', 'Dosya başarıyla yüklendi: ' . $data['file_name']);
                }
                redirect('admin/uploadfiles');
            }
        } else {
            // Sayfa yükleme işlemi
            $data['redirect'] = 'uploadfiles';
            $this->load->view('layout/_adminLayout', $data);
        }
    }
    public function listquoterequests(){
        $data['redirect']='listquoterequests';
        $this->load->view('layout/_adminLayout',$data);
    }
    public function nextgoproject(){
        if($this->input->post()){
            if($this->input->post('projectid') != null){
                $data['status']='ongoing';
                $guncelle=$this->General_Model->update('projects',$data,['id'=>$this->input->post('projectid')]);
                if($guncelle != false){
                    $this->session->set_flashdata('success', 'Proje durumu tekrardan yapım aşamasına çekildi. Kolaylıklar dileriz');
                    $data['redirect'] = 'projects';
                    $this->load->view('layout/_adminLayout',$data);
                }else{
                    $this->session->set_flashdata('error', 'Proje durumu güncellenemedi.');
                    $data['redirect'] = 'projects';
                    $this->load->view('layout/_adminLayout',$data);
                }
            }
        }else{
            $data['redirect']='projects';
            $this->load->view('layout/_adminLayout',$data);
        }
    }
    public function finishproject(){
        if($this->input->post()){
        if($this->input->post('projectid') != null){
            $data['status']='completed';
        $guncelle=$this->General_Model->update('projects',$data,['id'=>$this->input->post('projectid')]);
        if($guncelle != false){
            $this->session->set_flashdata('success', 'Projeniz bitirildi olarak güncellendi. Diğer projelerde kolaylıklar!');
            $data['redirect'] = 'projects';
            $this->load->view('layout/_adminLayout',$data);
        }else{
            $this->session->set_flashdata('error', 'Proje durumu güncellenemedi.');
            $data['redirect'] = 'projects';
            $this->load->view('layout/_adminLayout',$data);
        }
        }
        }else{
            $data['redirect']='projects';
            $this->load->view('layout/_adminLayout',$data);
        }

    }

    public function completedprojects(){
        $data['redirect']='completedprojects';
        $this->load->view('layout/_adminLayout',$data);
    }

    public function payments(){
        $data['redirect']='payments';
        $this->load->view('layout/_adminLayout',$data);
    }


}