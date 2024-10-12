<?php
/*
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 9.10.2024
 * ⏰ Time: 17:35
 * 📄 File: Dashboard.php
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

require_once APPPATH . '../vendor/autoload.php'; // Autoload ile SDK dahil
use Iyzipay\Model\Payment;
use Iyzipay\Model\PaymentCard;
use Iyzipay\Model\Buyer;
use Iyzipay\Model\Address;
use Iyzipay\Model\BasketItem;
use Iyzipay\Request\CreatePaymentRequest;
use Iyzipay\Options;

class Dashboard extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        nonCheckSessionLoginAndGo();


        $email = $this->session->userdata("email");
        $isLocked= $this->General_Model->count('users',['email'=>$email,'locked'=>'1']);
        if($isLocked > 0){
        redirect('auth/lockscreen');
        }
    }



public function index()
{
    $data['redirect']='home';
    $this->load->view('layout/_panelLayout',$data);

}

public function updatepass(){
        if($this->input->post()){
            $currentpassword = $this->input->post("currentpass");
            $newpassword = $this->input->post("newpass");
            $anewpassword = $this->input->post("anewpass");

            $email = $this->session->userdata("email");
            $user=$this->General_Model->get('users',['email'=>$email],'*');
            if (password_verify($currentpassword, $user->password)) {
                if($newpassword == $anewpassword){
                    $hashed_password = password_hash($newpassword, PASSWORD_BCRYPT);

                    $guncelle=$this->General_Model->update('users',['password'=>$hashed_password],['email'=>$email]);
                    loge(" Update Pass ");
                    $this->session->set_flashdata('error', null);
                    $this->session->set_flashdata('success', 'Şifreniz başarıyla güncellendi.');
                    $data['redirect'] = 'editprofile';
                    $this->load->view('layout/_panelLayout', $data);
                }else{
                    $this->session->set_flashdata('error', 'Yeni şifreniz ve doğrulaması aynı olmalıdır.');
                    $data['redirect'] = 'editprofile';
                    $this->load->view('layout/_panelLayout', $data);
                }
            }else{
                $this->session->set_flashdata('error', 'Şifrenizi hatalı girdiniz. Kontrol edip tekrar deneyin.');
                $data['redirect'] = 'editprofile';
                $this->load->view('layout/_panelLayout', $data);
            }

        }else{
            redirect('/');
        }
}

public function profile()
{
    $data['redirect']='profile';
    $this->load->view('layout/_panelLayout',$data);
}

public function newpost(){
        if($this->input->post()){
            if($this->input->post('content') == null ||$this->input->post('title') == null){
                $this->session->set_flashdata('error', 'Eksik bilgiler var. Gönderiniz onaylanmadı.');
                $data['redirect'] = 'newpost';
                $this->load->view('layout/_panelLayout', $data);
            }else{

                $content = $this->input->post('content');
                $title = $this->input->post('title');
                $useremail = $this->session->userdata('email');
                $user = $this->General_Model->get('users',['email'=>$useremail],'*');

                $checkAlready = $this->General_Model->checkTwoFields('posts','user_id',$user->id,'title',$title);
                if($checkAlready == false) {
                    $newblog = $this->General_Model->insert("posts", ['user_id' => $user->id, 'title' => $title,'content' => $content]);
                    if ($newblog == false) {
                        $this->session->set_flashdata('error', 'Yeni blog yazısı eklenemedi.');
                        $data['redirect'] = 'newpost';
                        $this->load->view('layout/_panelLayout', $data);
                    } else {
                        loge(" New Blog Creating ");
                        $this->session->set_flashdata('error', '');
                        $this->session->set_flashdata('success', 'Başarıyla eklendi..');
                        $data['redirect'] = 'newpost';
                        $this->load->view('layout/_panelLayout', $data);
                    }
                }else{
                    $this->session->set_flashdata('error', 'Zaten bu yazı yayınlandı.');
                    $data['redirect'] = 'newpost';
                    $this->load->view('layout/_panelLayout', $data);
                }

            }

        }else {
            $data['redirect'] = 'newpost';
            $this->load->view('layout/_panelLayout', $data);
        }
}

    public function addMember()
    {
        if($this->input->post()){


            if($this->input->post('project_id') != null){


                $proje_id=$this->input->post('project_id');
                $data['project_id']=$proje_id;

                if($this->input->post('membermail') != null){

                $addmail= $this->input->post('membermail');
                    $user = $this->General_Model->get('users',['email'=>$addmail],'*');
                    if($user == false){
                        $this->session->set_flashdata('error', 'Kullanıcı bulunamadı.');
                        $data['redirect'] = 'addmember';
                        $this->load->view('layout/_panelLayout', $data);
                    }else{
                        $checkAlready = $this->General_Model->checkTwoFields('project_members','user_id',$user->id,'project_id',$proje_id);
                        if($checkAlready == false) {

                            $add = $this->General_Model->insert("project_members", ['user_id' => $user->id, 'project_id' => $proje_id]);
                            if($add == false){
                                $this->session->set_flashdata('error', 'Kullanıcı eklenemedi maalesef.');
                                $data['redirect'] = 'addmember';
                                $this->load->view('layout/_panelLayout', $data);
                            }else{
                                loge(" New Member to Own Project ");
                                $this->session->set_flashdata('error', '');
                                $this->session->set_flashdata('success', 'Üye Başarıyla Yetkilendirildi.');
                                $data['redirect'] = 'addmember';
                                $this->load->view('layout/_panelLayout', $data);
                            }




                        }else {
                            $this->session->set_flashdata('error', 'Kullanıcı zaten ekli.');
                            $data['redirect'] = 'addmember';
                            $this->load->view('layout/_panelLayout', $data);
                        }
                    }

                } else {

                    $data['redirect'] = 'addmember';
                    $this->load->view('layout/_panelLayout', $data);
                }



            }
            else{
               redirect('/a');
            }


        }
        else{
           redirect('/b');
        }

    }

    public function editprofile()
    {
        $data['redirect'] = 'editprofile';

        $this->load->view('layout/_panelLayout', $data);
    }

    public function updateprofile()
    {
        if($this->input->post() && $this->input->post('socialmedia')){
            $useremail = $this->session->userdata('email');
            $user = $this->General_Model->get('users', ['email' => $useremail], '*');


            $githubaccount = $this->input->post("githubaccount");
            $instagramaccount = $this->input->post("instagramaccount");
            $twitteraccount = $this->input->post("twitteraccount");
            $linkedinaccount = $this->input->post("linkedinaccount");

            $updateData = [];


            $updateData['github_account'] = $githubaccount;
            $updateData['instagram_url'] = $instagramaccount;
            $updateData['linkedin_url'] = $linkedinaccount;
            $updateData['twitter_url'] = $twitteraccount;

            if (!empty($updateData)) {
                loge(" Update Profile ");
                $guncel = $this->General_Model->update('users', $updateData, ['email' => $useremail]);
                if($guncel != false ) {
                    $this->session->set_flashdata('error', '');

                    $this->session->set_flashdata('success', 'Değişiklikler kaydedildi.');
                    $data['redirect'] = 'editprofile';
                    $this->load->view('layout/_panelLayout', $data);
                }else{
                    $this->session->set_flashdata('success', '');

                    $this->session->set_flashdata('error', 'Form Kaydetme Hatası.');
                    $data['redirect'] = 'editprofile';
                    $this->load->view('layout/_panelLayout', $data);
                }
            }

        }else if($this->input->post() && $this->input->post('career')) {
            $useremail = $this->session->userdata('email');
            $user = $this->General_Model->get('users', ['email' => $useremail], '*');

            $title = $this->input->post('title');
            $company = $this->input->post('company');
            $experienceYear1 = $this->input->post('experienceYear');
            $experienceYear2 = $this->input->post('choices-single-default2');
            $job_description = $this->input->post('job_description');

            $updateData = [];
            $updateData['title'] = $title;
            $updateData['company_name'] = $company;
            $updateData['job_start_date'] = $experienceYear1;
            $updateData['job_end_date'] = $experienceYear2;
            $updateData['job_description'] = $job_description;


            if (!empty($updateData)) {
                $guncel = $this->General_Model->update('users', $updateData, ['email' => $useremail]);
                if($guncel != false ) {
                    $this->session->set_flashdata('error', '');

                    $this->session->set_flashdata('success', 'Değişiklikler kaydedildi.');
                    $data['redirect'] = 'editprofile';
                    $this->load->view('layout/_panelLayout', $data);
                }else{
                    $this->session->set_flashdata('success', '');

                    $this->session->set_flashdata('error', 'Form Kaydetme Hatası.');
                    $data['redirect'] = 'editprofile';
                    $this->load->view('layout/_panelLayout', $data);
                }
            }



        }else{
        if($this->input->post()){

            // Kullanıcının e-posta adresini session'dan alıyoruz
            $useremail = $this->session->userdata('email');
            $user = $this->General_Model->get('users', ['email' => $useremail], '*');


            $firstname = $this->input->post("firstname");
            $surname = $this->input->post("surname");
            $phone = $this->input->post("phone");
            $email = $this->input->post("email");
            $hobi = $this->input->post("hobi");
            $website = $this->input->post("website");
            $city = $this->input->post("city");
            $country = $this->input->post("country");
            $zipcode = $this->input->post("zipcode");
            $description = $this->input->post("description");


            $updateData = [];


                $updateData['first_name'] = $firstname;



                $updateData['last_name'] = $surname;



                $updateData['phone'] = $phone;




                $updateData['hobi'] = $hobi;



                $updateData['website'] = $website;


                $updateData['city'] = $city;


                $updateData['country'] = $country;


                $updateData['zipcode'] = $zipcode;


                $updateData['description'] = $description;



            if (!empty($updateData)) {
                $guncel = $this->General_Model->update('users', $updateData, ['email' => $useremail]);
                if($guncel != false ) {
                    $this->session->set_flashdata('error', '');

                    $this->session->set_flashdata('success', 'Değişiklikler kaydedildi.');
                    $data['redirect'] = 'editprofile';
                    $this->load->view('layout/_panelLayout', $data);
                }else{
                    $this->session->set_flashdata('success', '');

                    $this->session->set_flashdata('error', 'Form Kaydetme Hatası.');
                    $data['redirect'] = 'editprofile';
                    $this->load->view('layout/_panelLayout', $data);
                }
            }
        }else{
            $this->session->set_flashdata('error', 'Form Kaydetme Hatası.');
            $data['redirect'] = 'editprofile';
            $this->load->view('layout/_panelLayout', $data);
        }}

    }

    public function requestquote(){
        if($this->input->post()){
            if(($this->input->post('name') == null || $this->input->post('description') == null || $this->input->post('phone') == null)){
                $this->session->set_flashdata('error', 'Gerekli alanlardan alınamayan bilgiler var. Tüm alanları doldurmadıysanız doldurun.');
                $data['redirect'] = 'requestquote';
                $this->load->view('layout/_panelLayout', $data);
            }else{
                $name=$this->input->post('name');
                $description=$this->input->post('description');
                $phone=$this->input->post('phone');
                $user_id = $this->session->userdata('user_id');
                $offerData['service_name']=$name;
                $offerData['details']=$description;
                $offerData['contact_number']=$phone;
                $offerData['user_id']=$user_id;

                $save = $this->General_Model->insert('offers',$offerData);
                if($save == null){
                    $this->session->set_flashdata('error', 'Gönderilemedi. Tekrar deneyiniz.');
                    $data['redirect'] = 'requestquote';
                    $this->load->view('layout/_panelLayout', $data);
                }else{
                    $this->session->set_flashdata('success', 'Teklifiniz başarıyla alındı. En kısa zamanda teklifleriniz kısmına bir teklif eklenecektir.');
                    $data['redirect'] = 'requestquote';
                    $this->load->view('layout/_panelLayout', $data);
                }
            }
        }else {
            $data['redirect'] = 'requestquote';
            $this->load->view('layout/_panelLayout', $data);
        }
    }

    public function payments()
    {
        $data['redirect'] = 'payments';
        $this->load->view('layout/_panelLayout', $data);
    }

    public function wallet(){
        if($this->input->post()){
            $userid = $this->session->userdata('user_id');
            $user = $this->General_Model->get('users',['id'=>$userid],'*');
            $user_address= $user->address?$user->address:"Turkiye";
            $cardnumber = $this->input->post('cardnumber');
            $isim = $this->input->post('isim');
            $ay = $this->input->post('ay');
            $yil = $this->input->post('yil');
            $cvc = $this->input->post('cvc');
            $miktar = $this->input->post('miktar');
            if($cardnumber == null || $isim == null || $ay == null || $yil == null || $cvc == null || $miktar==null){
                $this->session->set_flashdata('error', 'Bilgiler eksik.');
                $data['redirect'] = 'wallet';
                $this->load->view('layout/_panelLayout', $data);

            }else{
                // İyzico API Ayarları
                $options = new Options();
                $options->setApiKey('sandbox-tY8uU30o7wfyn4iDU8Xl8ruvzn3EJ9RQ');  // Sandbox API Key
                $options->setSecretKey('sandbox-KTgNhHFhoSxhFhfbdPH5cB6A50Qbi36I');  // Sandbox Secret Key
                $options->setBaseUrl('https://sandbox-api.iyzipay.com');  // Sandbox URL

                // Ödeme isteği oluşturma
                $request = new CreatePaymentRequest();
                $request->setLocale('tr');
                $request->setConversationId('123456');
                $request->setPrice($miktar);
                $request->setPaidPrice($miktar);
                $request->setCurrency('TRY');
                $request->setInstallment(1);
                $request->setPaymentChannel('WEB');
                $request->setPaymentGroup('PRODUCT');

                // Kredi kartı bilgileri
                $paymentCard = new PaymentCard();
                $paymentCard->setCardHolderName($isim);
                $paymentCard->setCardNumber($cardnumber);
                $paymentCard->setExpireMonth($ay);
                $paymentCard->setExpireYear($yil);
                $paymentCard->setCvc($cvc);
                $paymentCard->setRegisterCard(0);
                $request->setPaymentCard($paymentCard);

                // Kullanıcı bilgileri
                $buyer = new Buyer();
                $buyer->setId($userid);
                $buyer->setName($user->first_name);
                $buyer->setSurname($user->last_name);
                $buyer->setEmail($user->email);
                $buyer->setIdentityNumber('11111111111');
                $buyer->setRegistrationAddress($user_address);
                $buyer->setCity('İstanbul');
                $buyer->setCountry('Turkey');
                $request->setBuyer($buyer);

                // Adres bilgileri
                $shippingAddress = new Address();
                $shippingAddress->setContactName($user->first_name);
                $shippingAddress->setCity('İstanbul');
                $shippingAddress->setCountry('Turkey');
                $shippingAddress->setAddress($user_address);
                $request->setShippingAddress($shippingAddress);
                $request->setBillingAddress($shippingAddress);

                // Sepet içeriği
                $basketItem = new BasketItem();
                $randomiddegeri= "CRM".rand(10000,49999);
                $basketItem->setId($randomiddegeri);
                $basketItem->setName('Bakiye Yükleme');
                $basketItem->setCategory1('Balance');
                $basketItem->setItemType('VIRTUAL');
                $basketItem->setPrice($miktar);
                $request->setBasketItems([$basketItem]);

                // Ödeme işlemi başlatma
                $payment = Payment::create($request, $options);

                // Ödeme sonucu kontrolü
                if ($payment->getStatus() == 'success') {
                    // Kullanıcı bilgilerini ve mevcut bakiyeyi alıyoruz
                    $user_id = $this->session->userdata('user_id');
                    $user_balance = $this->General_Model->get('users', ['id' => $user_id], 'balance');

                    // Mevcut bakiye üzerine yeni yüklenen miktarı ekliyoruz
                    $guncelBakiye = (float) $user_balance->balance + (float) $miktar;

                    // Yeni bakiyeyi güncelliyoruz
                    $this->General_Model->update('users', ['balance' => $guncelBakiye], ['id' => $user_id]);

                    // Başarılı ödeme mesajı ve yönlendirme
                    $this->session->set_flashdata('success', 'Ödeme başarılı, bakiyeniz güncellendi.');

                    $logdata['user_id'] = $user_id;
                    $logdata['transaction_type'] = "add";
                    $logdata['amount'] = $miktar;
                    $logdata['description'] = "Yeni bakiye yüklediniz.";

                    $logekle = $this->General_Model->insert('wallet_transactions',$logdata);

                    redirect('dashboard/wallet');
                } else {
                    // Hata durumunda hata mesajı ve yönlendirme
                    $this->session->set_flashdata('error', 'Ödeme başarısız: ' . $payment->getErrorMessage());
                    redirect('dashboard/wallet');
                }

            }

        }else{
            $data['redirect'] = 'wallet';
            $this->load->view('layout/_panelLayout', $data);
        }

    }

    public function addyetenek()
    {
        if($this->input->post()){
            if($this->input->post('yetenek') != null){
                if(strlen($this->input->post('yetenek')) > 20 || strlen($this->input->post('yetenek')) < 3){
                    $this->session->set_flashdata('error', 'Yetenek Bilgisi Uzunluk Hatası. Çok kısa veya uzun yazmayınız.');
                    $data['redirect'] = 'addyetenek';
                    $this->load->view('layout/_panelLayout', $data);
                }else{
                $yetenek= $this->input->post('yetenek');
                    $loginusermail = $this->session->userdata("email");
                    $loginuser = $this->General_Model->get('users', ['email' => $loginusermail], '*');

                    $checkAlready = $this->General_Model->checkTwoFields('user_skils','user_id',$loginuser->id,'title',$yetenek);
                    if($checkAlready == false) {
                        $yetenekekle = $this->General_Model->insert("user_skils", ['user_id' => $loginuser->id, 'title' => $yetenek]);
                        if ($yetenekekle == false) {
                            $this->session->set_flashdata('error', 'Yetenek Bilgisi Eklenemedi.');
                            $data['redirect'] = 'addyetenek';
                            $this->load->view('layout/_panelLayout', $data);
                        } else {
                            loge(" Add New Abilites ");
                            $this->session->set_flashdata('error', '');
                            $this->session->set_flashdata('success', 'Yetenek Başarıyla Eklendi.');
                            $data['redirect'] = 'addyetenek';
                            $this->load->view('layout/_panelLayout', $data);
                        }
                    }else{
                        $this->session->set_flashdata('error', 'Yetenek Bilgisi Eklenemedi..');
                        $data['redirect'] = 'addyetenek';
                        $this->load->view('layout/_panelLayout', $data);
                    }
                }
            }else{
                $this->session->set_flashdata('error', 'Yetenek Bilgisi Bulunamadı.');
                $data['redirect'] = 'addyetenek';
                $this->load->view('layout/_panelLayout', $data);
            }
        }else {
            $data['redirect']='addyetenek';
            $this->load->view('layout/_panelLayout',$data);
        }

    }

    public function listservice(){
        $data['redirect']='listservices';
        $this->load->view('layout/_panelLayout',$data);
    }


    public function listprojects(){
        $get_userid=$this->session->userdata('user_id');

        if($this->input->post()) {
            if ($this->input->post('type') == "all") {
                $get_project = $this->General_Model->getAll('projects', ['user_id' => $get_userid], '*');
                $data['projects'] = $get_project;
                $data['redirect'] = 'listprojects';
                $this->load->view('layout/_panelLayout', $data);
            } else if ($this->input->post('type') == "finished") {
                $get_project = $this->General_Model->getAll('projects', ['user_id' => $get_userid, 'status' => 'completed'], '*');
                $data['projects'] = $get_project;
                $data['redirect'] = 'listprojects';
                $this->load->view('layout/_panelLayout', $data);
            } else if ($this->input->post('type') == "pending") {
                $get_project = $this->General_Model->getAll('projects', ['user_id' => $get_userid, 'status' => 'ongoing'], '*');
                $data['projects'] = $get_project;
                $data['redirect'] = 'listprojects';
                $this->load->view('layout/_panelLayout', $data);
            }else{
                $get_project = $this->General_Model->getAll('projects',['user_id'=>$get_userid],'*');
                $data['projects']=$get_project;
                $data['redirect']='listprojects';
                $this->load->view('layout/_panelLayout',$data);
            }
        }
        else {
            $get_project = $this->General_Model->getAll('projects',['user_id'=>$get_userid],'*');
            $data['projects']=$get_project;
            $data['redirect']='listprojects';
            $this->load->view('layout/_panelLayout',$data);
        }


    }
    public function listquotes(){
        $get_userid=$this->session->userdata('user_id');

        if($this->input->post()) {
            if ($this->input->post('type') == "all") {
                $get_project = $this->General_Model->getAll('quotes', ['user_id' => $get_userid], '*');
                $data['quotes'] = $get_project;
                $data['redirect'] = 'listquotes';
                $this->load->view('layout/_panelLayout', $data);
            } else if ($this->input->post('type') == "approved") {
                $get_project = $this->General_Model->getAll('quotes', ['user_id' => $get_userid, 'status' => 'approved'], '*');
                $data['quotes'] = $get_project;
                $data['redirect'] = 'listquotes';
                $this->load->view('layout/_panelLayout', $data);
            } else if ($this->input->post('type') == "pending") {
                $get_project = $this->General_Model->getAll('quotes', ['user_id' => $get_userid, 'status' => 'pending','IsActive'=>'1'], '*');
                $data['quotes'] = $get_project;
                $data['redirect'] = 'listquotes';
                $this->load->view('layout/_panelLayout', $data);
            }else if($this->input->post('type') == "rejected") {
                $get_project = $this->General_Model->getAll('quotes',['user_id'=>$get_userid,'status' => 'rejected'],'*');
                $data['quotes']=$get_project;
                $data['redirect']='listquotes';
                $this->load->view('layout/_panelLayout',$data);
            }
        }
        else {
            $get_project = $this->General_Model->getAll('projects',['user_id'=>$get_userid],'*');
            $data['projects']=$get_project;
            $data['redirect']='listprojects';
            $this->load->view('layout/_panelLayout',$data);
        }


    }
    public function dopayment(){
        $get_userid=$this->session->userdata('user_id');

        if($this->input->post()){
            if($this->input->post('payment_id') != null && $this->input->post('amount') != ""){
                $get_payment = $this->General_Model->get('payments',['id'=>$this->input->post('payment_id')],'*');

                if($this->input->post('odeme') != null){


                    $user_id= $this->session->userdata('user_id');
                    $user_balance = $this->General_Model->get('users', ['id' => $user_id], 'balance');

                    $miktar = $this->input->post('amount');

                    $guncelBakiye = (float) $user_balance->balance - (float) $miktar;

                    if($guncelBakiye > 0){
                        // Yeni bakiyeyi güncelliyoruz
                        $this->General_Model->update('users', ['balance' => $guncelBakiye], ['id' => $user_id]);

                        // Başarılı ödeme mesajı ve yönlendirme
                        $this->session->set_flashdata('success', 'Ödeme başarılı. Teşekkür ederiz');

                        $logdata['user_id'] = $user_id;
                        $logdata['transaction_type'] = "spent";
                        $logdata['amount'] = $miktar;
                        $logdata['description'] = "Projeye ödeme yaptınız.";

                        $logekle = $this->General_Model->insert('wallet_transactions',$logdata);

                        $payment_data['status']="completed";
                        $payment_update = $this->General_Model->update('payments',$payment_data,['user_id'=>$user_id,'id'=>$this->input->post('payment_id')]);

                        $data['redirect'] = 'payments';
                        $this->load->view('layout/_panelLayout', $data);

                    }else {
                        $this->session->set_flashdata('error', 'Ödeme yapılamadı. Bakiye yetersiz');
                        $data['redirect'] = 'payments';
                        $this->load->view('layout/_panelLayout', $data);
                    }



                }else{
                    $this->session->set_flashdata('error', 'Ödeme yapılamadı.');
                    $data['redirect'] = 'payments';
                    $this->load->view('layout/_panelLayout', $data);
                }


            }else{
                redirect('/');
            }
        }else{
            redirect('/');
        }
    }
    public function quotesettings(){
        $get_userid=$this->session->userdata('user_id');

        if($this->input->post()){
            if($this->input->post('quote_id') != null){
                $get_quote = $this->General_Model->get('quotes',['id'=>$this->input->post('quote_id')],'*');
//                print_r("Quotenizin adı: ".$get_quote->service_name);
                $get_project = $this->General_Model->getAll('quotes', ['user_id' => $get_userid], '*');
                $data['quotes']=$get_project;
                // apide oluşturulan önceki modellerden kullanıldı

                $newProjectIs = $this->quote_model->createproject($get_quote->id);
                if ($newProjectIs == false) {
                    $this->session->set_flashdata('error', 'Bir hata oluştu ve teklif kabul edilemedi. Tekrar deneyiniz');
                    $data['redirect'] = 'listquotes';
                    $this->load->view('layout/_panelLayout', $data);
                } else {
                    loge(" Accept the Quote ");
                    $this->session->set_flashdata('success', 'Teklifiniz başarıyla kabul edildi ve proje olarak yüklendi.');
                    $get_project = $this->General_Model->getAll('projects', ['user_id' => $get_userid], '*');
                    $data['projects'] = $get_project;
                    $data['redirect'] = 'listprojects';
                    $this->load->view('layout/_panelLayout', $data);
                }


            }else{
                redirect('/');
            }
        }else{
            redirect('/');
        }
    }
public function addfriend()
{
    if($this->input->post()){
        if($this->input->post('email') != null){

            $userown = $this->session->userdata('email');
            $userown1=$this->General_Model->get('users',['email'=>$userown],'*');

            $email = $this->input->post('email');
            $user = $this->General_Model->get('users',['email'=>$email],'*');
            if($user == false){
                $this->session->set_flashdata('error', 'Kullanıcı Bilgisi Bulunamadı.');
                $data['redirect'] = 'addfriend';
                $this->load->view('layout/_panelLayout', $data);
            }else {
                $user_id = $user->id;
                $loginusermail = $this->session->userdata("email");
                $loginuserid = $this->General_Model->get('users',['email' => $loginusermail], '*');
                if ($loginusermail == $email) {
                    $this->session->set_flashdata('error', 'Kendinizi ekleyemezsiniz.');
                    $data['redirect'] = 'addfriend';
                    $this->load->view('layout/_panelLayout', $data);
                } else {
                    $checkAlready = $this->General_Model->checkTwoFields('friends','friend_id',$user_id,'user_id',$loginuserid->id);
                    if($checkAlready){
                        $this->session->set_flashdata('error', 'Kullanıcı Zaten Ekli.');
                        $data['redirect'] = 'addfriend';
                        $this->load->view('layout/_panelLayout', $data);
                    }else {
                        $ekle = $this->General_Model->insert('friends', ['friend_id' => $user_id, 'user_id' => $loginuserid->id]);
                        if ($ekle == false) {
                            $this->session->set_flashdata('error', 'Kullanıcı Eklenemedi.');
                            $data['redirect'] = 'addfriend';
                            $this->load->view('layout/_panelLayout', $data);
                        } else {
                            loge(" Add New Friend ");
                            $this->session->set_flashdata('error', '');
                            $this->session->set_flashdata('success', 'Kullanıcı Başarıyla Eklendi.');
                            $data['redirect'] = 'addfriend';
                            $this->load->view('layout/_panelLayout', $data);
                        }
                    }
                }
            }

        }else {
            $this->session->set_flashdata('error', 'Kullanıcı Bilgisi Bulunamadı.');
            $data['redirect'] = 'addfriend';
            $this->load->view('layout/_panelLayout', $data);
        }
    }else {
        $data['redirect'] = 'addfriend';
        $this->load->view('layout/_panelLayout', $data);
    }
}

}