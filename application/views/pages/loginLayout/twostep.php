

<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 8.10.2024
 * ⏰ Time: 20:59
 * 📄 File: twostep.php
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
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
<?php
if(!isset($email)){
    $email=$this->session->userdata('email');
    print_r($email);
    exit;
}
?>
<div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="<?= base_url('index.html') ?>" class="d-inline-block auth-logo">
                                <img src="<?= base_url('assets/images/logo-light.png') ?>" alt="" height="60">
                            </a>
                        </div>
                        <p class="mt-3 fs-15 fw-medium">CRM Admin & Dashboard Paneli</p>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4 card-bg-fill">

                        <div class="card-body p-4">
                            <div class="mb-4">
                                <div class="avatar-lg mx-auto">
                                    <div class="avatar-title bg-light text-primary display-5 rounded-circle">
                                        <i class="ri-mail-line"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="p-2 mt-4">
                                <div class="text-muted text-center mb-4 mx-lg-3">
                                    <h4>E-postanızı Doğrulayın</h4>
                                    <p>Lütfen <span class="fw-semibold"><?php echo $email; ?></span> adresine gönderilen 4 haneli kodu girin.</p>

                                    <?php if($this->session->flashdata('error')) { ?>

                                        <!-- Danger Alert -->
                                        <div class="alert alert-danger alert-dismissible fade show material-shadow" role="alert">
                                            <strong > Dikkat </strong > <?php echo $this->session->flashdata('error'); ?> </b > Kontrol ediniz.
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>

                                    <?php }else {
                                    ?>
                                    <?php if($this->session->flashdata('again')) { ?>

                                    <div class="alert alert-warning alert-dismissible fade show material-shadow" role = "alert" >
                                        <strong > Dikkat </strong > <?php echo $this->session->flashdata('again'); ?> </b > Kontrol ediniz.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" ></button>
                                    </div >
                                    <?php }else{  ?>
                                    <div class="alert border-0 alert-dark mb-0 material-shadow" role="alert">
                                        <strong> Lütfen </strong> mail için spam klasörünü <b>kontrol ediniz </b> , 5-10 dakika içerisinde gelecektir.
                                    </div>
                                    <?php }  }?>
                                </div>



                                <form autocomplete="off" action="<?php echo base_url('auth/twostep'); ?>" method="post">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

                                    <div class="row">
                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="digit1-input" class="visually-hidden">Rakam 1</label>
                                                <input type="text" name="i1" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(1, event)" maxLength="1" id="digit1-input">
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="digit2-input" class="visually-hidden">Rakam 2</label>
                                                <input type="text" name="i2" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(2, event)" maxLength="1" id="digit2-input">
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="digit3-input" class="visually-hidden">Rakam 3</label>
                                                <input type="text" name="i3" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(3, event)" maxLength="1" id="digit3-input">
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col-3">
                                            <div class="mb-3">
                                                <label for="digit4-input" class="visually-hidden">Rakam 4</label>
                                                <input type="text" name="i4" class="form-control form-control-lg bg-light border-light text-center" onkeyup="moveToNext(4, event)" maxLength="1" id="digit4-input">
                                            </div>
                                        </div><!-- end col -->
                                    </div>
                                <!-- end form -->

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-success w-100">Onayla</button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="mt-4 text-center">
                        <a class="mb-4" href="<?php echo base_url("auth/logout");?>"><button type="button" class="btn btn-soft-danger waves-effect waves-light material-shadow-none">Çıkış Yap</button></a>
                            <br/><br/>
                        <p class="mb-0">Kod gelmedi mi?
                        <form action="<?php echo base_url("auth/resend") ?>" method="post">
                           <input type="hidden" name="post"/>
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

                            <button type="submit" class="fw-semibold text-primary text-decoration-underline">Yeniden Gönder</button>

                        </form>


                       <?php if($this->session->flashdata('sifresi')) {  ?>
                        <div class="alert alert-secondary alert-dismissible fade show material-shadow" role="alert">
                            <strong> Test Modu  </strong> aktif! <b>Kodunuz: </b> <?php echo $this->session->flashdata('sifresi');   ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php } ?>

                        </p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0 text-muted">&copy;
                            <script>document.write(new Date().getFullYear())</script> Batuhan K. <i class="mdi mdi-heart text-danger"></i> ile hazırlanmıştır.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
