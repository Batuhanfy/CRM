
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 8.10.2024
 * ⏰ Time: 01:08
 * 📄 File: register.php
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
                        <p class="mt-3 fs-15 fw-medium">Gelişmiş Admin & Dashboard CRM Paneli</p>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4 card-bg-fill">

                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Yeni Hesap Oluştur</h5>
                                <p class="text-muted">Hemen ücretsiz hesabınızı edinin!</p>
                            </div>
                            <div class="p-2 mt-4">
                                <?php if ($this->session->flashdata('error')): ?>
                                    <div class="alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show material-shadow" role="alert">
                                        <i class="ri-error-warning-line label-icon"></i><strong>Dikkat!</strong> - <?php echo $this->session->flashdata('error'); ?>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <form class="needs-validation" novalidate action="<?php echo base_url('auth/register'); ?>" method="post">
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">E-Mail Adresi <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" name="email" id="useremail" placeholder="ornek@hotmail.com" required>
                                        <div class="invalid-feedback">
                                            Lütfen geçerli bir mail adresi giriniz.
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password-input">Şifre <span class="text-danger">*</span></label>
                                        <div class="position-relative auth-pass-inputgroup">
                                            <input type="password" name="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Güvenilir Bir Şifre Belirleyiniz" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            <div class="invalid-feedback">
                                                Lütfen geçerli bir şifre giriniz.
                                            </div>
                                        </div>
                                    </div>

                                    <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                                        <h5 class="fs-13">Şifreniz şu özellikleri içermelidir:</h5>
                                        <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 karakter</b></p>
                                        <p id="pass-lower" class="invalid fs-12 mb-2">En az bir <b>küçük harf</b> (a-z)</p>
                                        <p id="pass-upper" class="invalid fs-12 mb-2">En az bir <b>büyük harf</b> (A-Z)</p>
                                        <p id="pass-number" class="invalid fs-12 mb-0">En az bir <b>rakam</b> (0-9)</p>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="firstname-input">İsim <span class="text-danger">*</span></label>
                                        <div class="position-relative">
                                            <input type="text" name="first_name" class="form-control pe-5" onpaste="return false" placeholder="İsminiz" id="firstname-input" aria-describedby="firstnameinput" required>
                                            <div class="invalid-feedback">
                                                Lütfen isminizi giriniz.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="lastname-input">Soyisim <span class="text-danger">*</span></label>
                                        <div class="position-relative">
                                            <input type="text" name="last_name" class="form-control pe-5" onpaste="return false" placeholder="Soyisminiz" id="lastname-input" aria-describedby="lastnameinput" required>
                                            <div class="invalid-feedback">
                                                Lütfen soyisminizi giriniz.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="phone-input">Telefon Numarası (0'sız) <span class="text-danger">*</span></label>
                                        <input type="tel" name="phone" class="form-control" id="phone-input" placeholder="555 555 5555" pattern="[0-9]{10}" required>
                                        <div class="invalid-feedback">
                                            Lütfen geçerli bir telefon numarası giriniz.
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="address-input">Adres</label>
                                        <textarea class="form-control" name="address" id="address-input" placeholder="Adresinizi giriniz" rows="3"></textarea>
                                    </div>

                                    <div class="mb-4">
                                        <p class="mb-0 fs-12 text-muted fst-italic">Kaydolarak, <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">Kullanım Koşullarını</a> kabul etmiş oluyorsunuz.</p>
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">Kayıt Ol</button>
                                    </div>

                                </form>


                            </div>
                        </div>

                    </div>


                    <div class="mt-4 text-center">
                        <p class="mb-0">Hesabın zaten var mı ? <a href="<?php echo base_url('auth/login'); ?>" class="fw-semibold text-primary text-decoration-underline"> Giriş Yap </a> </p>
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
                            <script>document.write(new Date().getFullYear())</script> Batuhan K. Bu site <i class="mdi mdi-heart text-danger"></i> ile yapıldı!
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
</html>