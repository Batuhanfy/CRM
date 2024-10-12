
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 12.10.2024
 * ⏰ Time: 12:34
 * 📄 File: requestquote.php
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
<div class="container-fluid" style="margin-top: 20px">
    <!-- start page title -->
    <div class="row justify-content-center">

        <div class="col-lg-6 col-md-8">


            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Yeni Teklif İste</li>
                </ol>
            </nav>
            <div class="alert alert-secondary material-shadow text-center" role="alert">
                <strong> Hoşgeldiniz! </strong> istediğin bir hizmetimizi <b> veya kendi fikirlerinizi yazarak bizden yeni teklif alabilirsiniz!</b>
            </div>
            <?php if($this->session->flashdata('success')) {  ?>

                <div class="alert alert-secondary alert-dismissible alert-label-icon label-arrow fade show material-shadow" role="alert">
                    <i class="ri-check-double-line label-icon"></i>  <?php echo $this->session->flashdata('success');   ?>
                    <button type="button" class="btn-close" data-bs-dismiss=" alert" aria-label="Close"></button>
                </div>

            <?php } ?>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible bg-danger text-white alert-label-icon fade show material-shadow" role="alert">
                    <i class="ri-error-warning-line label-icon"></i><strong>Dikkat!</strong> - <?php echo $this->session->flashdata('error'); ?>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <form method="post" action="<?php base_url('dashboard/requestquote');?>" class="row g-3">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

                <div class="col-md-12">
                    <label for="fullnameInput" class="form-label">Hizmet Adı:</label>
                    <input type="text" class="form-control" name="name" placeholder="Yetenek Title Giriniz. Örnek: Web Tasarım">
                </div>
                <div class="col-md-12">
                    <label for="fullnameInput" class="form-label">Detaylar:</label>
                    <input type="text" class="form-control" name="description" placeholder="Nasıl bir şey görmek istiyorsunuz?">
                </div>
                <div class="col-md-12">
                    <label for="fullnameInput" class="form-label">İletişim Numarası:</label>
                    <input type="text" class="form-control" name="phone" placeholder="0 555 555 55 55">
                </div>

                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary">Teklif İste</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>