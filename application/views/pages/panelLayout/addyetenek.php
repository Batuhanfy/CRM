
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 10.10.2024
 * ⏰ Time: 18:34
 * 📄 File: addyetenek.php
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

 
<div class="container-fluid" style="margin-top: 140px">
    <!-- start page title -->
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">



            <div class="alert alert-secondary material-shadow text-center" role="alert">
                <strong> Yetenek ekleme panelinden </strong> istediğin bir yeteneği <b> ekleyebilirsin.</b>
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
            <form method="post" action="<?php base_url('dashboard/addyetenek');?>" class="row g-3">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

                <div class="col-md-12">
                    <label for="fullnameInput" class="form-label">Yetenek:</label>
                    <input type="text" class="form-control" name="yetenek" placeholder="Yetenek Title Giriniz. Örnek: Web Tasarım">
                </div>

                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary">Yetenek Ekle</button>
                </div>
            </form>
        </div>
    </div>
</div>
