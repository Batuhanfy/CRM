
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 12.10.2024
 * ⏰ Time: 21:26
 * 📄 File: files.php
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
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Admin Paneli</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Proje Dosyaları</li>
                </ol>
            </nav>
            <!-- Secondary Alert -->
            <div class="alert border-0 alert-secondary material-shadow" role="alert">
                <strong> Admin paneline hoşgeldiniz. </strong> bu sayfadan projelere yüklenen tüm dosyaları görüntüleyebilirsiniz.
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


            <!-- Striped Rows --><div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Dosya Adı</th>
                        <th scope="col">Dosya Yolu</th>
                        <th scope="col">Proje Id</th>
                        <th scope="col">Projenin Müşterisi</th>
                        <th scope="col">Kim Yükledi</th>
                        <th scope="col">Açıklama</th>
                        <th scope="col">Oluşturulma Tarihi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    $files = $this->General_Model->getAll('files');
                    $user = $this->General_Model->get('users',['id'=>$userid],'*');
                    foreach($files as $file){

                        if($file->proje_user_id !== null) {
                            $musteri= $this->General_Model->get('users', ['id' => $file->proje_user_id]);
                            $musterisi_email =  $musteri->email;
                            }else{
                            $musterisi_email = "Belirtilmemiş";
                        }

                        ?>
                        <tr>
                            <td><?php print_r($file->id);?></td>
                            <td><?php print_r($file->file_name);?></td>
                            <td><?php print_r($file->file_path);?></td>
                            <td><?php print_r($file->project_id);?></td>
                            <td><?php print_r($musterisi_email);?></td>
                            <td><?php print_r($user->email);?></td>
                            <td><?php print_r($file->description);?></td>
                            <td><?php print_r($file->createdAt);?></td>



                        </tr>

                        <?php
                    }
                    ?>

                    </tbody>
                </table>

            </div></div></div></div>

