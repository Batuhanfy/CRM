
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 8.10.2024
 * ⏰ Time: 21:38
 * 📄 File: 404.php
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
                    <div class="text-center pt-4">
                        <div class="">
                            <img src="<?= base_url('assets/images/error.svg') ?>" alt="" class="error-basic-img move-animation">
                        </div>
                        <div class="mt-n4">
                            <h1 class="display-1 fw-medium">404</h1>
                            <h3 class="text-uppercase">Üzgünüz, Sayfa Bulunamadı 😭</h3>
                            <p class="text-muted mb-4">Aradığınız sayfa mevcut değil!</p>
                            <a href="<?= base_url('') ?>" class="btn btn-success"><i class="mdi mdi-home me-1"></i>Ana Sayfaya Dön</a>
                        </div>
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
