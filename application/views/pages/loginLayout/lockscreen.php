
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 8.10.2024
 * ⏰ Time: 21:52
 * 📄 File: lockscreen.php
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
if (!isset($email)){
    redirect('/');
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
                        <p class="mt-3 fs-15 fw-medium">CRM Yönetici & Dashboard Paneli</p>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4 card-bg-fill">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Ekranı Kilitle</h5>
                                <p class="text-muted">Ekranın kilidini açmak için şifrenizi girin!</p>
                            </div>
                            <div class="user-thumb text-center">
                                <img src="<?= base_url('assets/images/users/avatar-1.jpg') ?>" class="rounded-circle img-thumbnail avatar-lg material-shadow" alt="thumbnail">
                                <h5 class="font-size-15 mt-3"><?php print_r($first_name." ".$last_name); ?></h5>
                            </div>
                            <div class="p-2 mt-4">
                                <?php if ($this->session->flashdata('error')): ?>
                                    <div class="alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show material-shadow" role="alert">
                                        <i class="ri-error-warning-line label-icon"></i><strong>Dikkat!</strong> - <?php echo $this->session->flashdata('error'); ?>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <form method="post" action="<?php echo base_url('auth/openlock')?>">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Şifre</label>
                                        <input type="password"  name="password" class="form-control" id="userpassword" placeholder="Şifreyi girin" required>
                                    </div>
                                    <div class="mb-2 mt-4">
                                        <button class="btn btn-success w-100" type="submit">Kilidi Aç</button>
                                    </div>
                                </form><!-- end form -->
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="mt-4 text-center">
                        <p class="mb-0">Siz değil misiniz? Tekrar giriş yapın <a href="<?= base_url('auth/logout') ?>" class="fw-semibold text-primary text-decoration-underline"> Giriş Yapın </a></p>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer galaxy-border-none">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0 text-muted">&copy;
                            <script>document.write(new Date().getFullYear())</script> Batuhan K. tarafından <i class="mdi mdi-heart text-danger"></i> ile hazırlanmıştır.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
