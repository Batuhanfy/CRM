
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 8.10.2024
 * ⏰ Time: 21:47
 * 📄 File: 505.php
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

<div class="auth-page-wrapper py-5 d-flex justify-content-center align-items-center min-vh-100">

    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden p-0">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-4 text-center">
                    <div class="error-500 position-relative">
                        <img src="<?= base_url('assets/images/error500.png') ?>" alt="" class="img-fluid error-500-img error-img" />
                        <h1 class="title text-muted">500</h1>
                    </div>
                    <div>
                        <h4>Sunucu Hatası!</h4>
                        <p class="text-muted w-75 mx-auto">Sunucu Hatası 500. Tam olarak ne olduğunu bilmiyoruz, ancak sunucularımız bir sorun olduğunu söylüyor.</p>
                        <a href="<?= base_url('') ?>" class="btn btn-success"><i class="mdi mdi-home me-1"></i>Ana Sayfaya Dön</a>
                    </div>
                </div><!-- end col-->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth-page content -->
</div>
