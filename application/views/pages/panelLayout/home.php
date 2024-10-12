<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 9.10.2024
 * ⏰ Time: 17:34
 * 📄 File: home.php
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


            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
                        <h4 class="mb-sm-0">CRM</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('dashboards'); ?>">Gösterge
                                        Tabloları</a></li>
                                <li class="breadcrumb-item active">CRM</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- sayfa başlığı bitiş -->

            <?php
            $userid = $this->session->userdata('user_id');
            $user_project_count = $this->General_Model->count('projects', ['user_id' => $userid]);
            if ($user_project_count == 0) {
                ?>
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Success Alert -->
                        <div class="alert alert-success alert-dismissible alert-additional fade show material-shadow" role="alert">
                            <div class="alert-body">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="ri-emotion-laugh-line fs-16 align-middle"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="alert-heading">İlk projene adım atmak için harika bir zaman!</h5>
                                        <p class="mb-0">Görüyoruz ki henüz bir projeye sahip değilsin. Bir hizmet seçerek
                                        teklif talep edebilirsin! Talep ettiğin hizmete göre, sana proje için bir teklif göndereceğiz.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="alert-content">
                                <p class="mb-0">Hizmetler menüsüne giderek yeni bir hizmet talep et, projene başlayalım!

                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card crm-widget">
                        <div class="card-body p-0">
                            <div class="row row-cols-xxl-5 row-cols-md-3 row-cols-1 g-0">
                                <div class="col">
                                    <div class="py-4 px-3">
                                        <h5 class="text-muted text-uppercase fs-13">Anlaşmalarımız<i
                                                    class="ri-information-line text-success fs-18 float-end align-middle"></i>
                                        </h5>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="ri-service-line display-6 text-muted cfs-22"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h2 class="mb-0 cfs-22"><span class="counter-value"
                                                                              data-target="<?php echo $project_count;?>">0</span> Proje</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mt-3 mt-lg-0 py-4 px-3">
                                        <h5 class="text-muted text-uppercase fs-13">Devam Eden Projeleriniz <i
                                                    class="ri-arrow-down-circle-line text-danger fs-18 float-end align-middle"></i>
                                        </h5>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">

                                                <i class="ri-calendar-line display-6 text-muted cfs-22"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h2 class="mb-0 cfs-22"><span class="counter-value"
                                                                              data-target="<?php echo $ongoing_project_count;?>">0</span> Çalışma</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mt-3 mt-md-0 py-4 px-3">
                                        <h5 class="text-muted text-uppercase fs-13">Biten Projeniz <i
                                                    class="ri-information-line text-success fs-18 float-end align-middle"></i>
                                        </h5>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="ri-emotion-happy-line display-6 text-muted cfs-22"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h2 class="mb-0 cfs-22"><span class="counter-value"
                                                                              data-target="<?php echo $completed_project_count;?>">0</span> Harika Proje</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mt-3 mt-md-0 py-4 px-3">
                                        <h5 class="text-muted text-uppercase fs-13">Hizmet Talepleriniz<i
                                                    class="ri-information-line text-success fs-18 float-end align-middle"></i>
                                        </h5>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="ri-send-plane-line display-6 text-muted cfs-22"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h2 class="mb-0 cfs-22"><span class="counter-value"
                                                                              data-target="<?php echo $request_count;?>">0</span> Talep</h2>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="mt-3 mt-lg-0 py-4 px-3">
                                        <h5 class="text-muted text-uppercase fs-13">Bekleyen Revize <i
                                                    class="ri-loader-2-fill text-danger fs-18 float-end align-middle"></i>
                                        </h5>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="ri-loop-left-fill display-6 text-muted cfs-22"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h2 class="mb-0 cfs-22"><span class="counter-value"
                                                                              data-target="<?php echo $revisions_count;?>">0</span> Adet</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="fs-15 fw-semibold">Proje İnceleme Hizmetimiz</h5>
                            <p class="text-muted">Teklifler Sunulur</p>
                            <div class="d-flex flex-wrap justify-content-evenly">
                                <p class="text-muted mb-0">
                                    <i class="mdi mdi-numeric-1-circle text-success fs-18 align-middle me-2"></i>Fikrinizi Alırız
                                </p>
                                <p class="text-muted mb-0">
                                    <i class="mdi mdi-numeric-3-circle text-info fs-18 align-middle me-2"></i>Araştırırız
                                </p>
                                <p class="text-muted mb-0"><i class="mdi mdi-numeric-2-circle text-primary fs-18 align-middle me-2"></i>Gerçekleştiririz!</p>
                            </div>
                        </div>
                        <div class="progress animated-progress rounded-bottom rounded-0" style="height: 6px;">
                            <div class="progress-bar bg-success rounded-0" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-info rounded-0" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar rounded-0" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div><!-- end col -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="fs-15 fw-semibold">Proje Sonrası İşlemler</h5>
                            <p class="text-muted">Geri Dönüşlerinizde</p>
                            <div class="d-flex flex-wrap justify-content-evenly">
                                <p class="text-muted mb-0">
                                    <i class="mdi mdi-numeric-3-circle text-success fs-18 align-middle me-2"></i>Güncelleme Veririz
                                </p>
                                <p class="text-muted mb-0"><i class="mdi mdi-numeric-0-circle text-info fs-18 align-middle me-2"></i>Hatalar Çözülür</p>
                                <p class="text-muted mb-0"><i class="mdi mdi-numeric-8-circle text-primary fs-18 align-middle me-2"></i>Eklemeler Yapılır</p>
                            </div>
                        </div>
                        <div class="progress animated-progress rounded-bottom rounded-0" style="height: 6px;">
                            <div class="progress-bar bg-success rounded-0" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-info rounded-0" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar rounded-0" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div><!-- end col -->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="fs-15 fw-semibold">Destek İsteklerinize</h5>
                            <p class="text-muted">Her Zaman</p>
                            <div class="d-flex flex-wrap justify-content-evenly">
                                <p class="text-muted mb-0">
                                    <i class="mdi mdi-numeric-10-circle text-success fs-18 align-middle me-2"></i>Anında Çözümler
                                </p>
                                <p class="text-muted mb-0"><i class="mdi mdi-numeric-3-circle text-info fs-18 align-middle me-2"></i>Detaylı Araştırma</p>
                                <p class="text-muted mb-0"><i class="mdi mdi-numeric-2-circle text-primary fs-18 align-middle me-2"></i>Hızlı Anlaşma</p>
                            </div>
                        </div>
                        <div class="progress animated-progress rounded-bottom rounded-0" style="height: 6px;">
                            <div class="progress-bar bg-success rounded-0" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar bg-info rounded-0" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            <div class="progress-bar rounded-0" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div>

            <div class="row">
                <div class="col-xl-7">
                    <!-- Secondary Alert -->
                    <div class="alert alert-secondary alert-dismissible border-2 bg-body-secondary fade show material-shadow" role="alert">
                        <strong> Tüm projeleriniz </strong> burada listelenir. Yeni proje oluşturmak için teklif isteyebilirsiniz.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Projeleriniz</h4>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">


                                </div>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                                    <thead class="table-light">
                                    <tr class="text-muted">
                                        <th scope="col">Adı</th>
                                        <th scope="col" style="width: 20%;">Başlangıç Tarihi</th>
                                        <th scope="col">Proje Sahibi</th>
                                        <th scope="col" style="width: 16%;">Durum</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    $projects = $this->General_Model->getAll('projects',['user_id'=>$this->session->userdata('user_id')],'*');
                                    foreach($projects as $proje){  ?>
                                    <tr class="text-muted">
                                        <td><?php print_r($proje->project_name); ?></td>
                                        <td><?php print_r($proje->start_date); ?></td>
                                        <td><?php print_r($full_name); ?></td>
                                        <?php
                                        if($proje->status=="completed"){
                                            ?>

                                            <td><a href="javascript:void(0);" class="link-success">Tamamlandı</a></td>

                                            <?php
                                        }else {
                                            ?>

                                            <td><a href="javascript:void(0);" class="link-warning">Devam Ediyor</a></td>
                                        <?php }?>
                                    </tr>
                                    <?php } ?>


                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div><!-- end table responsive -->
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->

                <div class="col-xl-5">
                    <!-- Info Alert -->
                    <div class="alert alert-info alert-dismissible border-2 bg-body-secondary fade show material-shadow" role="alert">
                        <strong> Bu tablodan </strong> tüm ödemelernizi görüntüleyebilirsiniz.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Ödemeler</h4>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">


                                </div>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">

                            <div class="table-responsive table-card">
                                <table class="table table-borderless table-hover table-nowrap align-middle mb-0">
                                    <thead class="table-light">
                                    <tr>
                                        <th scope="col">Proje Adı</th>
                                        <th scope="col">Miktar</th>
                                        <th scope="col">En Geç Ödeme Tarihi</th>
                                        <th scope="col">Talep Oluşturulma Tarihi</th>
                                        <th scope="col">Durum</th>
                                        <th scope="col">İşlem</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php

                                    foreach($payments as $payment){
                                        $project_name = $this->General_Model->get('projects',['id'=>$payment->project_id])
                                        ?>

                                        <tr>
                                            <td><?php print_r($project_name->project_name); ?></td>
                                            <td><?php print_r($payment->amount); ?></td>
                                            <td><?php print_r($payment->payment_date); ?></td>
                                            <td><?php print_r($payment->created_at); ?></td>

                                            <?php
                                            if($payment->status=="completed"){
                                                ?>
                                                <td>

                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </td>
                                                <td><a href="javascript:void(0);" class="link-success">Ödediniz</a></td>

                                                <?php
                                            }else {
                                                ?>

                                                <td><a href="javascript:void(0);" class="link-warning">Ödemeniz Bekleniyor</a></td>
                                                <td>
                                                    <form method="post" action="<?php echo base_url('dashboard/dopayment')?>">
                                                        <input type="hidden"
                                                               name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                                               value="<?php echo $this->security->get_csrf_hash(); ?>"/>
                                                        <input type="hidden"
                                                               name="amount"
                                                               value="<?php print_r($payment->amount);?>"/>
                                                        <input type="hidden"
                                                               name="odeme"
                                                               value="yap"/>
                                                        <input type="hidden"
                                                               name="payment_id"
                                                               value="<?php print_r($payment->id);?>"/>
                                                        <button type="submit" name="approve"
                                                                class="btn btn-soft-success waves-effect waves-light material-shadow-none">
                                                            Ödeme Yap
                                                        </button>

                                                    </form>

                                                </td>
                                            <?php }?>
                                        </tr>
                                    <?php }

                                    ?>


                                    </tbody><!-- end tbody -->
                                </table><!-- end table -->
                            </div><!-- end table responsive -->
                        </div><!-- end card body -->
                    </div>
                </div><!-- end col -->
            </div>


        </div>
        <!-- container-fluid -->
    </div>
    <!-- Sayfa içeriği bitişi -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>document.write(new Date().getFullYear())</script>
                    Batuhan K.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                     
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>



