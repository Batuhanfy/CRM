<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 10.10.2024
 * ⏰ Time: 21:08
 * 📄 File: profilesettings.php
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

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg profile-setting-img">
                    <img src="assets/images/profile-bg.jpg" class="profile-wid-img" alt="">
                    <div class="overlay-content">
                        <div class="text-end p-3">
                            <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                                <input id="profile-foreground-img-file-input" type="file"
                                       class="profile-foreground-img-file-input">
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-3">
                    <div class="card mt-n5">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                    <img src="<?php echo base_url($profile_picture); ?>"
                                         class="rounded-circle avatar-xl img-thumbnail user-profile-image material-shadow"
                                         alt="user-profile-image">
                                    <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                        <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                        <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-light text-body material-shadow">
                                                        <i class="ri-camera-fill"></i>
                                                    </span>
                                        </label>
                                    </div>
                                </div>
                                <h5 class="fs-16 mb-1"><?php print_r($first_name . " " . $last_name); ?></h5>
                                <p class="text-muted mb-0"><?php print_r($title); ?></p>
                            </div>
                        </div>
                    </div>
                    <!--end card-->
                    <?php if($this->session->flashdata('success')) {  ?>

                        <div class="alert alert-secondary alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                            <i class="ri-check-double-line label-icon"></i>  <?php echo $this->session->flashdata('success');   ?>
                            <button type="button" class="btn-close" data-bs-dismiss=" alert" aria-label="Close"></button>
                        </div>

                    <?php }else{ ?>
                    <?php if ($this->session->flashdata('error')){ ?>
                        <div class="alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show material-shadow" role="alert">
                            <i class="ri-error-warning-line label-icon"></i><strong>Dikkat!</strong> - <?php echo $this->session->flashdata('error'); ?>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } } ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-5">
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-0">Profilinizin Doluluk Oranı</h5>
                                </div>

                            </div>
                            <div class="progress animated-progress custom-progress progress-label">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $profilefilled; ?>%"
                                     aria-valuenow="<?php echo $profilefilled; ?>" aria-valuemin="0"
                                     aria-valuemax="100">
                                    <div class="label"><?php echo $profilefilled; ?>%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <div class="flex-grow-1">
                                    <h5 class="card-title mb-0">Medya Hesaplarınız</h5>
                                </div>

                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <!-- Form Başlangıcı -->
                                <form action="<?php echo base_url('dashboard/updateprofile'); ?>" method="post" class="d-flex align-items-center w-100">
                                    <!-- CSRF Koruması -->
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                    <input type="hidden" name="socialmedia" value="accept"/>

                                    <div class="avatar-xs d-block flex-shrink-0 me-3">
                                            <span class="avatar-title rounded-circle fs-16 bg-body text-body material-shadow">
                                                <i class="ri-github-fill"></i>
                                            </span>
                                </div>
                                    <div class="flex-grow-1">
                                        <input type="text" name="githubaccount" class="form-control <?php if ($github_account != null) {echo 'border-primary';}?>" id="gitUsername"
                                               placeholder="Github Hesabınız"
                                               value="<?php echo ($github_account == null) ? '' : $github_account; ?>">
                                    </div>
                            </div>
                            <div class="mb-3 d-flex">
                                <div class="avatar-xs d-block flex-shrink-0 me-3">
                                            <span class="avatar-title rounded-circle fs-16 bg-primary material-shadow">
                                                <i class="ri-linkedin-fill"></i>

                                            </span>
                                </div>
                                <input type="text" name="linkedinaccount" class="form-control  <?php if ($linkedin_url != null) {echo ' border-primary';}?>" id="linkedinaccount"
                                       placeholder="Linkedin Hesabınız"
                                       value="<?php if ($linkedin_url == null) {
                                           print_r("");
                                       } else {
                                           print_r($linkedin_url);
                                       } ?>">

                            </div>
                            <div class="mb-3 d-flex">
                                <div class="avatar-xs d-block flex-shrink-0 me-3">
                                            <span class="avatar-title rounded-circle fs-16 bg-success material-shadow">
                        <i class="ri-instagram-fill"></i>
                                            </span>
                                </div>
                                <input type="text" name="instagramaccount" class="form-control <?php if ($instagram_url != null) {echo ' border-primary';}?>" id="instagramaccount"
                                       placeholder="İnstagram Hesabınız"
                                       value="<?php if ($instagram_url == null) {
                                           print_r("");
                                       } else {
                                           print_r($instagram_url);
                                       } ?>"></div>
                            <div class="d-flex">
                                <div class="avatar-xs d-block flex-shrink-0 me-3">
                                            <span class="avatar-title rounded-circle fs-16 bg-danger material-shadow">
<i class="ri-twitter-fill"></i>
                                            </span>
                                </div>
                                <input type="text" name="twitteraccount" class="form-control <?php if ($twitter_url != null) {echo ' border-primary';}?>" id="twitteraccount"
                                       placeholder="Twitter Hesabınız"
                                       value="<?php if ($twitter_url == null) {
                                           print_r("");
                                       } else {
                                           print_r($twitter_url);
                                       } ?>">
                            </div>
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end mt-3">
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                   <a href="<?php echo base_url('dashboard/profile');?>" class="btn btn-soft-success">İptal</a>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                        <i class="fas fa-home"></i> Hesap Bilgileriniz
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                        <i class="far fa-user"></i> Şifre Değiştir
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#experience" role="tab">
                                        <i class="far fa-envelope"></i> Kariyeriniz
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                    <form action="<?php echo base_url('dashboard/updateprofile');?>" method="post">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Adınız</label>
                                                    <input type="text" class="form-control" name="firstname" id="firstnameInput"
                                                           placeholder="Enter your firstname" value="<?php echo $first_name; ?>">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="lastnameInput" class="form-label">Soyadınız</label>
                                                    <input type="text" name="surname" class="form-control" id="lastnameInput"
                                                           placeholder="Enter your lastname" value="<?php echo $last_name; ?>">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="phonenumberInput" class="form-label">Telefon
                                                        Numaranız</label>
                                                    <input type="text" class="form-control" id="phonenumberInput"
                                                           placeholder="Enter your phone number" name="phone" value="<?php echo $phone; ?>">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="emailInput" class="form-label">Mail Adresiniz</label>
                                                    <input type="email" class="form-control" id="emailInput"
                                                           placeholder="Enter your email" name="email" value="<?php echo $email; ?>" readonly>
                                                </div>
                                            </div>

                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="skillsInput" class="form-label">Yetenekler</label>
                                                    <select class="form-control" name="skillsInput" data-choices
                                                            data-choices-text-unique-true multiple id="skillsInput">

                                                        <?php
                                                    foreach ($skils as $skil) { ?>
                                                        <option value="<?php echo $skil->title;?>"><?php echo $skil->title;?></option>

                                                    <?php }
                                                        ?>




                                                    </select>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="designationInput" class="form-label">Hobi</label>
                                                    <input type="text" class="form-control" name="hobi" id="hobiInput"
                                                           placeholder="En Sevdiğiniz Hobi" value="<?php echo $hobi; ?>">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="websiteInput1" class="form-label">Websiteniz</label>
                                                    <input type="text" class="form-control" name="website" id="websiteInput"
                                                           placeholder="Websitenizin Linki" value="<?php echo $website; ?>">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="cityInput" class="form-label">Şehir</label>
                                                    <input type="text" class="form-control" name="city" id="cityInput"
                                                           placeholder="Şehir" value="<?php echo $city; ?>">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="countryInput" class="form-label">Ülke</label>
                                                    <input type="text" class="form-control" name="country" id="countryInput"
                                                           placeholder="Ülke" value="<?php echo $country; ?>">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="zipcodeInput" class="form-label">Posta Kodu</label>
                                                    <input type="text" class="form-control" name="zipcode" id="zipcodeInput"
                                                           placeholder="Posta Kodunuz" value="<?php echo $zipcode; ?>">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3 pb-2">
                                                    <label for="exampleFormControlTextarea" class="form-label">Hakkınızda</label>
                                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea"
                                                              placeholder="Hakkınızda açıklama giriniz" rows="3"><?php echo $description; ?></textarea>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                                    <a href="<?php echo base_url('dashboard/profile');?>" class="btn btn-soft-success">İptal</a>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <!--end tab-pane-->
                                <div class="tab-pane" id="changePassword" role="tabpanel">
                                    <form action="<?php echo base_url('dashboard/updatepass')?>" method="post">
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

                                        <div class="row g-2">
                                            <div class="col-lg-4">
                                                <div>
                                                    <label for="oldpasswordInput" class="form-label">Mevcut Şifreniz*</label>
                                                    <input type="password" name="currentpass" class="form-control" id="oldpasswordInput"
                                                           placeholder="Lütfen şuanki şifrenizi giriniz.">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4">
                                                <div>
                                                    <label for="newpasswordInput" class="form-label">Yeni Şifre*</label>
                                                    <input type="password" name="newpass" class="form-control" id="newpasswordInput"
                                                           placeholder="Yeni şifre giriniz">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4">
                                                <div>
                                                    <label for="confirmpasswordInput" class="form-label">Yeni Şifreyi Tekrar Giriniz**</label>
                                                    <input type="password" name="anewpass" class="form-control"
                                                           id="confirmpasswordInput" placeholder="Yeni Şifrenizi Tekrar Girin">
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-success">Şifreyi Güncelle
                                                    </button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                    <div class="mt-4 mb-3 border-bottom pb-2">
                                        <div class="float-end">
                                        </div>
                                        <h5 class="card-title">Giriş Geçmişi</h5>
                                       <!-- <i class="ri-macbook-line"></i>
                                        <i class="ri-smartphone-line"></i>
                                       -->
                                    </div>
                                    <?php
                                    $user_id = $this->session->userdata('user_id');
                                    $histories = $this->General_Model->getAll('login_history',['user_id'=>$user_id],'*',5);
                                    foreach($histories as $history){ ?>
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="flex-shrink-0 avatar-sm">
                                                <div class="avatar-title bg-light text-primary rounded-3 fs-18 material-shadow">
                                                    <i class="ri-smartphone-line"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6><?php echo $history->device_name; ?></h6>
                                                <p class="text-muted mb-0"> <?php echo $history->login_time; ?></p>
                                            </div>
                                            <div>

                                            </div>
                                        </div>
                                    <?php }
                                    ?>

                                </div>
                                <!--end tab-pane-->
                                <div class="tab-pane" id="experience" role="tabpanel">
                                    <form method="post" action="<?php echo base_url('dashboard/updateprofile'); ?>">
                                        <input type="hidden" name="career" value="career"/>
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

                                        <div id="newlink">
                                            <div id="1">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="jobTitle" class="form-label">Unvanınız</label>
                                                            <input type="text" name="title" class="form-control" id="jobTitle"
                                                                   placeholder="Yazılım Geliştiricisi"
                                                                   value="<?php echo $title;?>">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="companyName" class="form-label">Şirket Adı</label>
                                                            <input type="text" name="company" class="form-control" id="companyName"
                                                                   placeholder="Çalıştığınız bir şirket varsa" value="<?php echo $company_name;?>">
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label for="experienceYear" class="form-label">Deneyim Yıllarınız
                                                                </label>
                                                            <div class="row">
                                                                <div class="col-lg-5">
                                                                    <select class="form-control"
                                                                            data-choices data-choices-search-false
                                                                            name="experienceYear" id="experienceYear">
                                                                        <option value="">Bir yıl seçiniz.</option>
                                                                        <?php

                                                                        for ($year = 2000; $year <= 2024; $year++) {

                                                                            $selected = ($year == $job_start_date) ? 'selected' : '';
                                                                            echo "<option value='{$year}' {$selected}>{$year}</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-auto align-self-center">
                                                                    to
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-lg-5">
                                                                    <select class="form-control" data-choices
                                                                            data-choices-search-false
                                                                            name="choices-single-default2">
                                                                        <option value="">Bir yıl seçiniz.</option>
                                                                        <?php

                                                                        for ($year = 2000; $year <= 2024; $year++) {

                                                                            $selected = ($year == $job_end_date) ? 'selected' : '';
                                                                            echo "<option value='{$year}' {$selected}>{$year}</option>";
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <!--end col-->
                                                            </div>
                                                            <!--end row-->
                                                        </div>
                                                    </div>
                                                    <!--end col-->
                                                    <div class="col-lg-12">
                                                        <div class="mb-3">
                                                            <label for="jobDescription" class="form-label">Meslek
                                                                Açıklaması</label>
                                                            <textarea class="form-control" id="jobDescription" rows="3"
                                                                     name="job_description" placeholder="Detaylı bilgi vermek isterseniz">
                                                             <?php echo $job_description; ?>

                                                            </textarea>
                                                        </div>
                                                    </div>
                                                    <!--end col-->

                                                </div>
                                                <!--end row-->
                                            </div>
                                        </div>
                                        <div id="newForm" style="display: none;">

                                        </div>
                                        <div class="col-lg-12">
                                            <div class="hstack gap-2">
                                                <button type="submit" class="btn btn-success">Güncelle</button>

                                            </div>
                                        </div>
                                        <!--end col-->
                                    </form>
                                </div>
                                <!--end tab-pane-->
                                <div class="tab-pane" id="privacy" role="tabpanel">
                                    <div class="mb-4 pb-2">
                                        <h5 class="card-title text-decoration-underline mb-3">Security:</h5>
                                        <div class="d-flex flex-column flex-sm-row mb-4 mb-sm-0">
                                            <div class="flex-grow-1">
                                                <h6 class="fs-14 mb-1">Two-factor Authentication</h6>
                                                <p class="text-muted">Two-factor authentication is an enhanced security
                                                    meansur. Once enabled, you'll be required to give two types of
                                                    identification when you log into Google Authentication and SMS are
                                                    Supported.</p>
                                            </div>
                                            <div class="flex-shrink-0 ms-sm-3">
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary">Enable
                                                    Two-facor Authentication</a>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column flex-sm-row mb-4 mb-sm-0 mt-2">
                                            <div class="flex-grow-1">
                                                <h6 class="fs-14 mb-1">Secondary Verification</h6>
                                                <p class="text-muted">The first factor is a password and the second
                                                    commonly includes a text with a code sent to your smartphone, or
                                                    biometrics using your fingerprint, face, or retina.</p>
                                            </div>
                                            <div class="flex-shrink-0 ms-sm-3">
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary">Set up
                                                    secondary method</a>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column flex-sm-row mb-4 mb-sm-0 mt-2">
                                            <div class="flex-grow-1">
                                                <h6 class="fs-14 mb-1">Backup Codes</h6>
                                                <p class="text-muted mb-sm-0">A backup code is automatically generated
                                                    for you when you turn on two-factor authentication through your iOS
                                                    or Android Twitter app. You can also generate a backup code on
                                                    twitter.com.</p>
                                            </div>
                                            <div class="flex-shrink-0 ms-sm-3">
                                                <a href="javascript:void(0);" class="btn btn-sm btn-primary">Generate
                                                    backup codes</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <h5 class="card-title text-decoration-underline mb-3">Application
                                            Notifications:</h5>
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex">
                                                <div class="flex-grow-1">
                                                    <label for="directMessage" class="form-check-label fs-14">Direct
                                                        messages</label>
                                                    <p class="text-muted">Messages from people you follow</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                               id="directMessage" checked/>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mt-2">
                                                <div class="flex-grow-1">
                                                    <label class="form-check-label fs-14" for="desktopNotification">
                                                        Show desktop notifications
                                                    </label>
                                                    <p class="text-muted">Choose the option you want as your default
                                                        setting. Block a site: Next to "Not allowed to send
                                                        notifications," click Add.</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                               id="desktopNotification" checked/>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mt-2">
                                                <div class="flex-grow-1">
                                                    <label class="form-check-label fs-14" for="emailNotification">
                                                        Show email notifications
                                                    </label>
                                                    <p class="text-muted"> Under Settings, choose Notifications. Under
                                                        Select an account, choose the account to enable notifications
                                                        for. </p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                               id="emailNotification"/>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mt-2">
                                                <div class="flex-grow-1">
                                                    <label class="form-check-label fs-14" for="chatNotification">
                                                        Show chat notifications
                                                    </label>
                                                    <p class="text-muted">To prevent duplicate mobile notifications from
                                                        the Gmail and Chat apps, in settings, turn off Chat
                                                        notifications.</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                               id="chatNotification"/>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="d-flex mt-2">
                                                <div class="flex-grow-1">
                                                    <label class="form-check-label fs-14" for="purchaesNotification">
                                                        Show purchase notifications
                                                    </label>
                                                    <p class="text-muted">Get real-time purchase alerts to protect
                                                        yourself from fraudulent charges.</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" role="switch"
                                                               id="purchaesNotification"/>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h5 class="card-title text-decoration-underline mb-3">Delete This Account:</h5>
                                        <p class="text-muted">Go to the Data & Privacy section of your profile Account.
                                            Scroll to "Your data & privacy options." Delete your Profile Account. Follow
                                            the instructions to delete your account :</p>
                                        <div>
                                            <input type="password" class="form-control" id="passwordInput"
                                                   placeholder="Enter your password" value="make@321654987"
                                                   style="max-width: 265px;">
                                        </div>
                                        <div class="hstack gap-2 mt-3">
                                            <a href="javascript:void(0);" class="btn btn-soft-danger">Close & Delete
                                                This Account</a>
                                            <a href="javascript:void(0);" class="btn btn-light">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div><!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script>
                    © Velzon.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
