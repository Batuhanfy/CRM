
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 10.10.2024
 * ⏰ Time: 18:59
 * 📄 File: newpost.php
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
                <strong> Yeni Yazı Yazma Panelimizden </strong> istediğin bir konuda <b> yazı yazabilirsiniz.</b>
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

  <form method="post" action="<?php echo base_url('dashboard/newpost');?>">
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

      <div>
                <label for="placeholderInput"  class="form-label">Konu Başlığı:</label>
                <input type="text" class="form-control mb-2" name="title" id="placeholderInput" placeholder="Konunuzun Başlığı">
                <label for="placeholderInput" class="form-label mt-2">Konu İçeriği:</label>

            </div>
      <textarea name="content" class="ckeditor-classic"></textarea>

            <!-- Soft Buttons -->
            <button type="submit" class="btn mx-auto w-75 btn-lg d-grid btn-soft-primary waves-effect waves-light material-shadow-none mt-4">Yayınla</button>
  </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('.ckeditor-classic'))
            .catch(error => {
                console.error(error);
            });
    });
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
