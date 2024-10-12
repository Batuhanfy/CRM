<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 8.10.2024
 * ⏰ Time: 00:55
 * 📄 File: _panelLayout.php
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
<?php
$data['layout'] = "login";
if (isset($ileti) && !empty($ileti)) {
    foreach ($ileti as $key => $value) {
        $data[$key] = $value;
    }
} else {
    $ileti = "";
}
if (!isset($redirect)) {
    $redirect = "home";
}


$user_email = $this->session->userdata('email');
$user = $this->General_Model->get('users', ['email' => $user_email], '*');
$data['first_name'] = $user->first_name;
$data['last_name'] = $user->last_name;
$data['full_name'] = $user->first_name." ".$user->last_name;
$data['userid'] = $user->id;
$data['title'] = $user->title;
$data['balance'] = $user->balance;
$data['company_name'] = $user->company_name;
$data['job_description'] = $user->job_description;
$data['job_start_date'] = $user->job_start_date;
$data['job_end_date'] = $user->job_end_date;
$data['company_name'] = $user->company_name;
$data['linkedin_url'] = $user->linkedin_url;
$data['github_account'] = $user->github_account;
$data['twitter_url'] = $user->twitter_url;
$data['instagram_url'] = $user->instagram_url;
$data['address'] = $user->address;
$data['city'] = $user->city;
$data['country'] = $user->country;
$data['zipcode'] = $user->zipcode;
$data['hobi'] = $user->hobi;
$data['website'] = $user->website;
$data['description'] = $user->description;
$data['phone'] = $user->phone;
$data['mail'] = $user->email;
$data['email'] = $user->email;
$data['katilmatarihi'] = $user->created_at;
$data['profile_picture'] = $user->profile_picture;


$isAdmin = $this->General_Model->checkTwoFields('user_roles','user_id',$user->id,'role_id','1');
if($isAdmin == false){
    $data['isAdmin'] = "0";
}else{
    $data['isAdmin'] = "1";
}

$profilefilled = 20;

if ($data['title'] != null) {
    $profilefilled += 5;
}
if ($data['linkedin_url'] != null) {
    $profilefilled += 5;
}
if ($data['github_account'] != null) {
    $profilefilled += 5;
}
if ($data['twitter_url'] != null) {
    $profilefilled += 5;
}
if ($data['instagram_url'] != null) {
    $profilefilled += 5;
}
if ($data['address'] != null) {
    $profilefilled += 5;
}
if ($data['city'] != null) {
    $profilefilled += 5;
}
if ($data['country'] != null) {
    $profilefilled += 5;
}
if ($data['hobi'] != null) {
    $profilefilled += 5;
}
if ($data['website'] != null) {
    $profilefilled += 5;
}
if ($data['description'] != null) {
    $profilefilled += 10;
}
if ($data['company_name'] != null) {
    $profilefilled += 10;
}
if ($data['job_start_date'] != null) {
    $profilefilled += 10;
}
$data['profilefilled'] = $profilefilled;
$userskils = $this->General_Model->getAll('user_skils', ['user_id' => $user->id], '*');
$data['skils'] = $userskils;
$userprojects = $this->General_Model->getAll('projects', ['user_id' => $user->id], '*');
$data['userprojects'] = $userprojects;
$payments = $this->General_Model->getAll('payments', ['user_id' => $user->id], '*');
$data['payments'] = $payments;
$userposts = $this->General_Model->getAll('posts', ['user_id' => $user->id], '*');
$data['userposts'] = $userposts;
$userfriends = $this->General_Model->getAll('friends', ['user_id' => $user->id], '*');
$data['friends'] = $userfriends;
$followerscount = $this->General_Model->count('followers', ['user_id' => $user->id], '*');
$data['follower_count'] = $followerscount;
$followcount = $this->General_Model->count('followers', ['follower_id' => $user->id], '*');
$data['follow_count'] = $followcount;
$project_count = $this->General_Model->count('projects', ['user_id' => $user->id], '*');
$data['project_count'] = $project_count;
$ongoing_project_count = $this->General_Model->count('projects', ['user_id' => $user->id, 'status' => 'ongoing'], '*');
$data['ongoing_project_count'] = $ongoing_project_count;
$completed_project_count = $this->General_Model->count('projects', ['user_id' => $user->id, 'status' => 'completed'], '*');
$data['completed_project_count'] = $completed_project_count;
$request_count = $this->General_Model->count('requests', ['user_id' => $user->id, 'status' => 'completed'], '*');
$data['request_count'] = $request_count;
$revisions_count = $this->General_Model->count('revisions', ['user_id' => $user->id, 'status' => 'completed'], '*');
$data['revisions_count'] = $revisions_count;
$this->load->view('meta/panelLayout/header');
$this->load->view('meta/panelLayout/navbar', $data);
$this->load->view('meta/panelLayout/sidebar');
switch ($redirect) {
    case "home":
        $this->load->view('pages/panelLayout/home', $data);
        break;
    case "profile":
        $this->load->view('pages/panelLayout/profile', $data);
        break;
    case "addfriend":
        $this->load->view('pages/panelLayout/addfriend', $data);
        break;
    case "addyetenek":
        $this->load->view('pages/panelLayout/addyetenek', $data);
        break;
    case "requestquote":
        $this->load->view('pages/panelLayout/requestquote', $data);
        break;

    case "payments":
        $this->load->view('pages/panelLayout/payments', $data);
        break;
    case "wallet":
        $this->load->view('pages/panelLayout/wallet', $data);
        break;
    case "addmember":
        $this->load->view('pages/panelLayout/addmember', $data);
        break;
    case "editprofile":
        $this->load->view('pages/panelLayout/editprofile', $data);
        break;
    case "listquotes":
        $this->load->view('pages/panelLayout/listquotes', $data);
        break;
    case "newpost":
        $this->load->view('pages/panelLayout/newpost', $data);
        break;
    case "listservices":
        $this->load->view('pages/panelLayout/listservices', $data);
        break;
    case "listprojects":
        $this->load->view('pages/panelLayout/listprojects', $data);
        break;
    default:
        $this->load->view('pages/error/404', $data);
        break;
}
$this->load->view('meta/panelLayout/backtotop');
$this->load->view('meta/panelLayout/preloader');
$this->load->view('meta/panelLayout/footer');
?>