<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

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
                            <a href="<?php echo base_url('index.html'); ?>" class="d-inline-block auth-logo">
                                <img src="<?php echo base_url('assets/images/logo-light.png'); ?>" alt="" height="60">
                            </a>
                        </div>
                        <p class="mt-3 fs-15 fw-medium">CRM Yönetim ve Dashboard Şablonu</p>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4 card-bg-fill">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Tekrar Hoşgeldiniz!</h5>
                                <p class="text-muted">Devam etmek için giriş yapın.</p>
                            </div>
                            <div class="p-2 mt-4">
                                <?php if ($this->session->flashdata('error')): ?>
                                    <div class="alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show material-shadow" role="alert">
                                        <i class="ri-error-warning-line label-icon"></i><strong>Dikkat!</strong> - <?php echo $this->session->flashdata('error'); ?>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>

                                <form id="loginForm" action="<?php echo base_url("/auth/login");?>" method="post" onsubmit="return validateForm()">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Kullanıcı Adı</label>
                                        <input type="text" class="form-control" id="username" name="email" placeholder="Kullanıcı adınızı girin">
                                        <div id="username-error" class="text-danger" style="display:none;">Lütfen kullanıcı adınızı giriniz.</div>
                                    </div>

                                    <div class="mb-3">
                                        
                                        <label class="form-label" for="password-input">Şifre</label>
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            <input type="password" name="password" class="form-control pe-5 password-input" placeholder="Şifrenizi girin" id="password-input">
                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                        </div>
                                        <div id="password-error" class="text-danger" style="display:none;">Lütfen şifrenizi giriniz.</div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="auth-remember-check">
                                        <label class="form-check-label" for="auth-remember-check">Beni Hatırla</label>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Giriş Yap</button>
                                    </div>


                                </form>
                            </div>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->

                    <div class="mt-4 text-center">
                        <p class="mb-0">Hesabınız yok mu?  <a href="<?php echo base_url('/auth/register'); ?>" class="fw-semibold text-primary text-decoration-underline"> Kayıt Olun </a> </p>
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
                            <script>document.write(new Date().getFullYear())</script> Batuhan K. <i class="mdi mdi-heart text-danger"></i> ile Tasarlandı.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>

<script>
    function validateForm() {
        let isValid = true;

        // Kullanıcı adı kontrolü
        const username = document.getElementById("username");
        const usernameError = document.getElementById("username-error");
        if (username.value.trim() === "") {
            usernameError.style.display = "block";
            isValid = false;
        } else {
            usernameError.style.display = "none";
        }

        // Şifre kontrolü
        const password = document.getElementById("password-input");
        const passwordError = document.getElementById("password-error");
        if (password.value.trim() === "") {
            passwordError.style.display = "block";
            isValid = false;
        } else {
            passwordError.style.display = "none";
        }

        return isValid;
    }
</script>
