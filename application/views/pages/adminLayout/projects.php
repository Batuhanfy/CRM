
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 12.10.2024
 * ⏰ Time: 17:56
 * 📄 File: projects.php
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
                    <li class="breadcrumb-item active" aria-current="page">Projeler</li>
                </ol>
            </nav>
            <!-- Secondary Alert -->
            <div class="alert border-0 alert-secondary material-shadow" role="alert">
                <strong> Admin paneline hoşgeldiniz. </strong> bu sayfadan projeleri görüntüleyebilirsiniz.
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
                        <th scope="col">Teklif Id</th>
                        <th scope="col">Kullanıcı Mail</th>
                        <th scope="col">Proje Adı</th>
                        <th scope="col">Başlangıç Tarihi</th>
                        <th scope="col">Bitiş Tarihi</th>
                        <th scope="col">Açıklama</th>
                        <th scope="col">Durumu</th>
                        <th scope="col">İşlem</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $projects = $this->General_Model->getAll('projects');
                    $user = $this->General_Model->get('users',['id'=>$userid],'*');
                    foreach($projects as $project){


                        ?>
                        <tr>
                            <td><?php print_r($project->id);?></td>
                            <td><?php print_r($project->quote_id);?></td>
                            <td><?php print_r($user->email);?></td>
                            <td><?php print_r($project->project_name);?></td>
                            <td><?php print_r($project->start_date);?></td>
                            <td><?php print_r($project->end_date);?></td>
                            <td><?php print_r($project->description);?></td>
                            <td>
                                <?php echo $project->status=='completed'? '<span class="badge bg-success">Tamamlandı</span>':'<span class="badge bg-danger">Yapım Aşamasında</span>'; ?></td>

                            </td>
                            <td>
                                <?php
                                if($project->status=='completed'){
                                    ?>
                                    <form method="post" action="<?php echo base_url('admin/nextgoproject'); ?>">
                                          <input type="hidden" name="projectid" value="<?php echo $project->id; ?>"/>
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />

                                        <button class="btn btn-soft-warning btn-border">Devam Ettir</button>

                                        </form>
                                    <?php
                                }else{
                                    ?>
                                    <form method="post" action="<?php echo base_url('admin/finishproject'); ?>">
                                        <input type="hidden" name="projectid" value="<?php echo $project->id; ?>"/>
                                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" />
                                        <button class="btn btn-outline-secondary btn-border">Bitir</button>

                                        </form>

                                    <?php
                                }
                                ?>
                        </tr>

                        <?php
                    }
                    ?>

                    </tbody>
                </table>

            </div></div></div></div>