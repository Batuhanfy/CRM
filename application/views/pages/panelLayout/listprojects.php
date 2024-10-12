
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 11.10.2024
 * ⏰ Time: 16:42
 * 📄 File: listprojects.php
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
<?php

?>
    <div class="page-content">
        <div class="container-fluid">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Projeler</li>
                </ol>
            </nav>
<div class="table-responsive">
    <!-- warning Alert -->
    <div class="alert alert-warning material-shadow" role="alert">
        <strong> Projeleriniz ile ilgili </strong> her türlü soru için <b>bize ulaşıp </b> bilgi alabilirsiniz.
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
    <!-- Table Head -->
    <table class="table align-middle table-nowrap mb-0">

        <thead class="table-light">
        <tr>
            <th scope="col">Proje Adı</th>
            <th scope="col">Başlangıç Tarihi</th>
            <th scope="col">Tahmini Bitiş Tarihi</th>
            <th scope="col">Açıklama</th>
            <th scope="col">Durum</th>
            <th scope="col">Proje</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach($projects as $proje){?>
            <tr>
                <td><?php print_r($proje->project_name); ?></td>
                <td><?php print_r($proje->start_date); ?></td>
                <td><?php print_r($proje->end_date); ?></td>
                <td><?php print_r($proje->description); ?></td>
                <?php
                if($proje->status=="completed"){
                    ?>
                    <td>

                        <div class="progress progress-sm">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </td>
                    <td><a href="javascript:void(0);" class="link-success">Tamamlandı</a></td>

                    <?php
                }else {
                ?>
                    <td>
                        <div class="progress progress-sm">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </td>
                    <td><a href="javascript:void(0);" class="link-warning">Devam Ediyor</a></td>
                <?php }?>
            </tr>
        <?php }

        ?>

        </tbody>
    </table>
    <?php
    if($projects == null){
        print_r("<br/><h3>Proje bulunamadı.</h3>");
    }
    ?>
    <!-- end table -->
</div>
<!-- end table responsive -->
        </div>  </div>  </div>