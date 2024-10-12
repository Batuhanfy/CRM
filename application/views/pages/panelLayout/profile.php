<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <div class="profile-foreground position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg">
                    <img src="<?= base_url('assets/images/profile-bg.jpg') ?>" alt="" class="profile-wid-img"/>
                </div>
            </div>

            <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
                <div class="row g-4">
                    <div class="col-auto">
                        <div class="avatar-lg">
                            <img src="<?= base_url($profile_picture) ?>" alt="kullanıcı-img"
                                 class="img-thumbnail rounded-circle"/>
                        </div>
                    </div>

                    <div class="col">
                        <div class="p-2">
                            <h3 class="text-white mb-1"><?php print_r($first_name . " " . $last_name); ?></h3>
                            <p class="text-white text-opacity-75"><?php echo $title; ?></p>
                            <div class="hstack text-white-50 gap-1">
                                <div class="me-2"><i
                                            class="ri-map-pin-user-line me-1 text-white text-opacity-75 fs-16 align-middle"></i>
                                    <?php
                                    if (isset($address)) {
                                        print_r($address);
                                    } else {
                                        print_r("Türkiye");
                                    }
                                    ?>
                                </div>
                                <div>
                                    <i class="ri-building-line me-1 text-white text-opacity-75 fs-16 align-middle"></i>Şahıs
                                    Hesabı
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-auto order-last order-lg-0">
                        <div class="row text text-white-50 text-center">
                            <div class="col-lg-6 col-4">
                                <div class="p-2">
                                    <h4 class="text-white mb-1"><?php print_r($follower_count); ?></h4>
                                    <p class="fs-14 mb-0">Takipçi</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-4">
                                <div class="p-2">
                                    <h4 class="text-white mb-1"><?php print_r($follow_count); ?></h4>
                                    <p class="fs-14 mb-0">Takip Edilen</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <div class="d-flex profile-wrapper">

                            <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1"
                                role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#overview-tab"
                                       role="tab">
                                        <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                                class="d-none d-md-inline-block">Genel Bakış</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link fs-14" data-bs-toggle="tab" href="#projects" role="tab">
                                        <i class="ri-price-tag-line d-inline-block d-md-none"></i> <span
                                                class="d-none d-md-inline-block">Projeler</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link fs-14" data-bs-toggle="tab" href="#documents" role="tab">
                                        <i class="ri-folder-4-line d-inline-block d-md-none"></i> <span
                                                class="d-none d-md-inline-block">Belgeler</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="flex-shrink-0">
                                <a href="<?= base_url('dashboard/editprofile') ?>" class="btn btn-success">
                                    <i class="ri-edit-box-line align-bottom"></i> Profili Düzenle
                                </a>
                            </div>
                        </div>


                        <div class="tab-content pt-4 text-muted">

                            <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                <div class="row">
                                    <div class="col-xxl-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-5">Profilinizi Tamamlayın</h5>
                                                <div class="progress animated-progress custom-progress progress-label">
                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                         style="width: <?php echo $profilefilled; ?>%"
                                                         aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                                        <div class="label"><?php echo $profilefilled; ?>%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">Bilgiler</h5>
                                                <div class="table-responsive">
                                                    <table class="table table-borderless mb-0">
                                                        <tbody>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Tam Ad :</th>
                                                            <td class="text-muted"><?php print_r($first_name . " " . $last_name); ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Cep Telefonu :</th>
                                                            <td class="text-muted"><?php echo $phone; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">E-posta :</th>
                                                            <td class="text-muted"><?php echo $mail; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Konum :</th>
                                                            <td class="text-muted"><?php echo $address ? $address : "Adres bilgisi girilmemiş."; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="ps-0" scope="row">Katılım Tarihi :</th>
                                                            <td class="text-muted"><?php echo $katilmatarihi; ?></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">
                                                    Yetenekler
                                                    <a href="<?php echo base_url('dashboard/addyetenek'); ?>"
                                                       class="btn btn-sm ms-3 btn-outline-secondary custom-toggle">
                                                        <span class="icon-on"><i
                                                                    class="ri-add-line align-bottom me-1"></i> Ekle</span>
                                                        <span class="icon-off"><i
                                                                    class="ri-user-unfollow-line align-bottom me-1"></i> Talep Alındı</span>
                                                    </a></h5>


                                                <div class="d-flex flex-wrap gap-2 fs-15">
                                                    <?php
                                                    if ($skils == null) {
                                                        ?>

                                                        <div class="alert alert-dark material-shadow" role="alert">
                                                            <strong> Herhangi bir, </strong> yetenek kaydınız
                                                            <b>yok.</b>
                                                        </div>
                                                        <?php
                                                    }
                                                    foreach ($skils as $skil) { ?>
                                                        <a href="javascript:void(0);"
                                                           class="badge bg-primary-subtle text-primary"><?php print_r($skil->title);
                                                            ?></a>

                                                    <?php }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-4">
                                                    <div class="flex-grow-1">
                                                        <h5 class="card-title mb-0">
                                                            Arkadaşlar

                                                            <a href="<?php echo base_url('dashboard/addfriend'); ?>"
                                                               class="btn btn-sm ms-3 btn-outline-secondary custom-toggle">
                                                                <span class="icon-on"><i
                                                                            class="ri-add-line align-bottom me-1"></i> Ekle</span>
                                                                <span class="icon-off"><i
                                                                            class="ri-user-unfollow-line align-bottom me-1"></i> Talep Alındı</span>

                                                            </a>
                                                        </h5>
                                                        </h5>


                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="dropdown">
                                                            <a href="#" role="button" id="dropdownMenuLink2"
                                                               data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-2-fill fs-14"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="dropdownMenuLink2">
                                                                <li><a class="dropdown-item" href="#">Görüntüle</a></li>
                                                                <li><a class="dropdown-item" href="#">Düzenle</a></li>
                                                                <li><a class="dropdown-item" href="#">Sil</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>

                                                    <?php
                                                    if ($friends == null) {
                                                        ?>
                                                        <div class="alert alert-dark material-shadow" role="alert">
                                                            <strong> Herhangi bir, </strong> arkadaş <b>eklemediniz.</b>
                                                        </div>
                                                        <?php
                                                    }
                                                    foreach ($friends as $friend) {
                                                        $friend_data = $this->General_Model->get("users", ['id' => $friend->friend_id], '*');
                                                        ?>

                                                        <div class="d-flex align-items-center py-3">
                                                            <div class="avatar-xs flex-shrink-0 me-3">
                                                                <img src="<?= base_url($friend_data->profile_picture) ?>"
                                                                     alt=""
                                                                     class="img-fluid rounded-circle material-shadow"/>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <div>
                                                                    <h5 class="fs-14 mb-1"><?php print_r($friend_data->first_name . " " . $friend_data->last_name); ?></h5>
                                                                    <p class="fs-13 text-muted mb-0"><?php print_r($friend_data->title); ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="flex-shrink-0 ms-2">
                                                                <button type="button"
                                                                        class="btn btn-sm btn-outline-success material-shadow-none">
                                                                    <i class="ri-user-add-line align-middle"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                    <?php }
                                                    ?>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center mb-4">
                                                    <div class="flex-grow-1">
                                                        <h5 class="card-title mb-0">
                                                            Gönderileriniz
                                                            <a href="<?php echo base_url('dashboard/newpost'); ?>"
                                                               class="btn btn-sm ms-3 btn-outline-secondary custom-toggle">
                                                                <span class="icon-on"><i
                                                                            class="ri-add-line align-bottom me-1"></i> Yeni</span>
                                                                <span class="icon-off"><i
                                                                            class="ri-user-unfollow-line align-bottom me-1"></i> Talep Alındı</span>

                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div class="dropdown">
                                                            <a href="#" role="button" id="dropdownMenuLink1"
                                                               data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="ri-more-2-fill fs-14"></i>
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu-end"
                                                                aria-labelledby="dropdownMenuLink1">
                                                                <li><a class="dropdown-item" href="#">Görüntüle</a></li>
                                                                <li><a class="dropdown-item" href="#">Düzenle</a></li>
                                                                <li><a class="dropdown-item" href="#">Sil</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                                if ($userposts == null) {
                                                    ?>
                                                    <div class="alert alert-dark material-shadow" role="alert">
                                                        <strong> Herhangi bir, </strong> gönderi <b>yayınlamadınız.</b>
                                                    </div>
                                                    <?php
                                                }
                                                foreach ($userposts as $post) {
                                                    ?>
                                                    <div class="d-flex mb-4">
                                                        <div class="flex-shrink-0">
                                                            <img src="<?= base_url('assets/images/small/img-4.jpg') ?>"
                                                                 alt="" height="50" class="rounded material-shadow"/>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3 overflow-hidden">
                                                            <a href="javascript:void(0);">
                                                                <h6 class="text-truncate fs-14"><?php echo $post->title; ?></h6>
                                                            </a>
                                                            <p class="text-muted mb-0"><?php echo $post->created_at; ?></p>
                                                        </div>
                                                    </div>
                                                <?php } ?>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-xxl-9">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title mb-3">Hakkınızda</h5>
                                                <?php
                                                if ($description == null) {
                                                    ?>
                                                    <div class="alert alert-dark material-shadow" role="alert">
                                                        <strong> Hakkınızda kısmını, </strong> doldurmadınız.
                                                    </div>

                                                <?php } else {
                                                    print_r($description);
                                                } ?>
                                                <div class="row">
                                                    <div class="col-6 col-md-4">
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary material-shadow">
                                                                    <i class="ri-user-2-fill"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <p class="mb-1">Pozisyon :</p>
                                                                <h6 class="text-truncate mb-0">

                                                                    <?php print_r($title); ?>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-md-4">
                                                        <div class="d-flex mt-4">
                                                            <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                                <div class="avatar-title bg-light rounded-circle fs-16 text-primary material-shadow">
                                                                    <i class="ri-global-line"></i>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <p class="mb-1">Telefonun :</p>
                                                                <a href="#"
                                                                   class="fw-semibold">+90 <?php print_r($phone); ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header align-items-center d-flex">
                                                        <h4 class="card-title mb-0 me-2">Son Aktivite</h4>
                                                        <div class="flex-shrink-0 ms-auto">
                                                            <ul class="nav justify-content-end nav-tabs-custom rounded card-header-tabs border-bottom-0"
                                                                role="tablist">
                                                                <li class="nav-item">
                                                                    <a class="nav-link active" data-bs-toggle="tab"
                                                                       href="#today" role="tab">En Yeni</a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="tab-content text-muted">
                                                            <div class="tab-pane active" id="today" role="tabpanel">
                                                                <div class="profile-timeline">
                                                                    <div class="accordion accordion-flush"
                                                                         id="todayExample">
                                                                        <div class="accordion-item border-0">
                                                                            <div class="accordion-header"
                                                                                 id="headingOne">
                                                                                <?php
                                                                                $get_user_id = $this->session->userdata('user_id');
                                                                                $get_user_activites = $this->General_Model->getAll('logs', ['user' => $get_user_id], '*', '5');
                                                                                $get_user_meta = $this->General_Model->get('users', ['id' => $get_user_id], '*');
                                                                                foreach ($get_user_activites as $log) {
                                                                                    ?>

                                                                                    <a class="accordion-button p-2 shadow-none">
                                                                                        <div class="d-flex">
                                                                                            <div class="flex-shrink-0">
                                                                                                <img src="<?php echo base_url($get_user_meta->profile_picture); ?>"
                                                                                                     alt=""
                                                                                                     class="avatar-xs rounded-circle material-shadow"/>
                                                                                            </div>
                                                                                            <div class="flex-grow-1 ms-3">
                                                                                                <h6 class="fs-14 mb-1">
                                                                                                    <?php print_r($first_name . " " . $last_name); ?></h6>
                                                                                                <small class="text-muted">
                                                                                                    <?php echo $log->log; ?>
                                                                                                    özelliğini kullandı
                                                                                                    -
                                                                                                    <?php echo $log->date; ?></small>
                                                                                            </div>
                                                                                        </div>
                                                                                    </a>
                                                                                <?php }
                                                                                ?>
                                                                            </div>

                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Projeleriniz</h5>
                                                <div class="swiper project-swiper mt-n4">
                                                    <div class="d-flex justify-content-end gap-2 mb-2">
                                                        <div class="slider-button-prev">
                                                            <div class="avatar-title fs-18 rounded px-1 material-shadow">
                                                                <i class="ri-arrow-left-s-line"></i>
                                                            </div>
                                                        </div>
                                                        <div class="slider-button-next">
                                                            <div class="avatar-title fs-18 rounded px-1 material-shadow">
                                                                <i class="ri-arrow-right-s-line"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <?php
                                                            if (empty($userprojects)) {
                                                                ?>
                                                                <div class="alert alert-warning alert-dismissible alert-additional fade show mb-0 material-shadow"
                                                                     role="alert">
                                                                    <div class="alert-body">
                                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                                                aria-label="Close"></button>
                                                                        <div class="d-flex">
                                                                            <div class="flex-shrink-0 me-3">
                                                                                <i class="ri-alert-line fs-16 align-middle"></i>
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="alert-heading">Maalesef, projeniz
                                                                                    bulunmamakta!</h5>
                                                                                <p class="mb-0">Yeni bir projeye başlangıç yaptığınızda,
                                                                                    burada projenizi listeleyeceğiz! </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="alert-content">
                                                                        <p class="mb-0">Hizmet almak için size gönderilen teklifleri
                                                                            kabul ettiğinizde projeye dönüştürülür.</p>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            } else {
                                                                foreach ($userprojects as $project) {
                                                                    ?>
                                                                    <div class="col-xxl-3 col-sm-6">
                                                                        <div class="card profile-project-card shadow-none profile-project-warning material-shadow">
                                                                            <div class="card-body p-4">
                                                                                <div class="d-flex">
                                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                                        <h5 class="fs-14 text-truncate">
                                                                                            <a href="#" class="text-body">
                                                                                                <?php echo htmlspecialchars($project->project_name); ?>
                                                                                            </a>
                                                                                        </h5>
                                                                                        <p class="text-muted text-truncate mb-0"> Son
                                                                                            Güncelleme :
                                                                                            <span class="fw-semibold text-body">
                                    <?php echo htmlspecialchars($project->updated_at); ?>
                                </span>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="flex-shrink-0 ms-2">
                                                                                        <?php if ($project->status == "ongoing") { ?>
                                                                                            <div class="badge bg-warning-subtle text-warning fs-10">
                                                                                                Devam Ediyor
                                                                                            </div>
                                                                                        <?php } else { ?>
                                                                                            <div class="badge bg-success-subtle text-success fs-10">
                                                                                                Tamamlandı
                                                                                            </div>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="d-flex mt-4">
                                                                                    <div class="flex-grow-1">
                                                                                        <div class="d-flex align-items-center gap-2">
                                                                                            <div>
                                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                                    Üyeler :</h5>
                                                                                            </div>
                                                                                            <div class="avatar-group">
                                                                                                <?php
                                                                                                $uyeler = $this->General_Model->getAll('project_members', ['project_id' => $project->id], '*');
                                                                                                if ($uyeler != null) {
                                                                                                    foreach ($uyeler as $uye) {
                                                                                                        $uyenin_bilgisi = $this->General_Model->get('users', ['id' => $uye->user_id], '*');
                                                                                                        ?>
                                                                                                        <div class="avatar-group-item material-shadow">
                                                                                                            <div class="avatar-xs">
                                                                                                                <img src="<?= base_url($uyenin_bilgisi->profile_picture) ?>"
                                                                                                                     alt=""
                                                                                                                     class="rounded-circle img-fluid"/>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <?php
                                                                                                    }
                                                                                                }
                                                                                                ?>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                    <form method="post"
                                                                                          action="<?php echo base_url('dashboard/addmember'); ?>">
                                                                                        <input type="hidden"
                                                                                               name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                                                                               value="<?php echo $this->security->get_csrf_hash(); ?>"/>
                                                                                        <input type="hidden" name="project_id"
                                                                                               value="<?php echo intval($project->id); ?>"/>
                                                                                        <button type="submit" name="button"
                                                                                                class="btn btn-primary btn-sm">Üye Davet
                                                                                            Et
                                                                                        </button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="activities" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Aktiviteler</h5>
                                        <div class="acitivity-timeline">
                                            <div class="acitivity-item d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="<?= base_url('assets/images/users/avatar-1.jpg') ?>"
                                                         alt=""
                                                         class="avatar-xs rounded-circle acitivity-avatar material-shadow"/>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Oliver Phillips <span
                                                                class="badge bg-primary-subtle text-primary align-middle">Yeni</span>
                                                    </h6>
                                                    <p class="text-muted mb-2">LinkedIn üzerinden bir proje hakkında
                                                        konuştuk.</p>
                                                    <small class="mb-0 text-muted">Bugün</small>
                                                </div>
                                            </div>
                                            <div class="acitivity-item py-3 d-flex">
                                                <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                                    <div class="avatar-title bg-success-subtle text-success rounded-circle material-shadow">
                                                        N
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Nancy Martino <span
                                                                class="badge bg-secondary-subtle text-secondary align-middle">Devam Ediyor</span>
                                                    </h6>
                                                    <p class="text-muted mb-2"><i
                                                                class="ri-file-text-line align-middle ms-2"></i> Yeni
                                                        bir proje oluşturuluyor</p>
                                                    <div class="avatar-group mb-2">
                                                        <a href="javascript: void(0);"
                                                           class="avatar-group-item material-shadow"
                                                           data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                           data-bs-original-title="Christi">
                                                            <img src="<?= base_url('assets/images/users/avatar-4.jpg') ?>"
                                                                 alt="" class="rounded-circle avatar-xs"/>
                                                        </a>
                                                        <a href="javascript: void(0);"
                                                           class="avatar-group-item material-shadow"
                                                           data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                           data-bs-original-title="Frank Hook">
                                                            <img src="<?= base_url('assets/images/users/avatar-3.jpg') ?>"
                                                                 alt="" class="rounded-circle avatar-xs"/>
                                                        </a>
                                                        <a href="javascript: void(0);"
                                                           class="avatar-group-item material-shadow"
                                                           data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                           data-bs-original-title="Ruby">
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title rounded-circle bg-light text-primary material-shadow">
                                                                    R
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <a href="javascript: void(0);"
                                                           class="avatar-group-item material-shadow"
                                                           data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                                           data-bs-original-title="Daha fazla">
                                                            <div class="avatar-xs">
                                                                <div class="avatar-title rounded-circle">
                                                                    2+
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <small class="mb-0 text-muted">Dün</small>
                                                </div>
                                            </div>
                                            <div class="acitivity-item py-3 d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="<?= base_url('assets/images/users/avatar-2.jpg') ?>"
                                                         alt=""
                                                         class="avatar-xs rounded-circle acitivity-avatar material-shadow"/>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Natasha Carey <span
                                                                class="badge bg-success-subtle text-success align-middle">Tamamlandı</span>
                                                    </h6>
                                                    <p class="text-muted mb-2">Ek dosyalar ile yeni bir etkinlik
                                                        ekledi</p>
                                                    <div class="row">
                                                        <div class="col-xxl-4">
                                                            <div class="row border border-dashed gx-2 p-2 mb-2">
                                                                <div class="col-4">
                                                                    <img src="<?= base_url('assets/images/small/img-2.jpg') ?>"
                                                                         alt=""
                                                                         class="img-fluid rounded material-shadow"/>
                                                                </div>
                                                                <div class="col-4">
                                                                    <img src="<?= base_url('assets/images/small/img-3.jpg') ?>"
                                                                         alt=""
                                                                         class="img-fluid rounded material-shadow"/>
                                                                </div>
                                                                <div class="col-4">
                                                                    <img src="<?= base_url('assets/images/small/img-4.jpg') ?>"
                                                                         alt=""
                                                                         class="img-fluid rounded material-shadow"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <small class="mb-0 text-muted">25 Kasım</small>
                                                </div>
                                            </div>
                                            <div class="acitivity-item py-3 d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="<?= base_url('assets/images/users/avatar-6.jpg') ?>"
                                                         alt=""
                                                         class="avatar-xs rounded-circle acitivity-avatar material-shadow"/>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Bethany Johnson</h6>
                                                    <p class="text-muted mb-2">Velzon yönetim paneline yeni bir üye
                                                        ekledi</p>
                                                    <small class="mb-0 text-muted">19 Kasım</small>
                                                </div>
                                            </div>
                                            <div class="acitivity-item py-3 d-flex">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-xs acitivity-avatar">
                                                        <div class="avatar-title rounded-circle bg-danger-subtle text-danger material-shadow">
                                                            <i class="ri-shopping-bag-line"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Siparişiniz Verildi <span
                                                                class="badge bg-danger-subtle text-danger align-middle ms-1">Teslimatta</span>
                                                    </h6>
                                                    <p class="text-muted mb-2">Bu müşteriler siparişlerinin
                                                        verildiğinden emin olabilirler.</p>
                                                    <small class="mb-0 text-muted">16 Kasım</small>
                                                </div>
                                            </div>
                                            <div class="acitivity-item py-3 d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="<?= base_url('assets/images/users/avatar-7.jpg') ?>"
                                                         alt=""
                                                         class="avatar-xs rounded-circle acitivity-avatar material-shadow"/>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Lewis Pratt</h6>
                                                    <p class="text-muted mb-2">Sayfanın üzerindeki kelimelerden
                                                        fazlasını söyleyecek bir şeyleri var. Bu kelimeler gayri resmi
                                                        ya da nötr, egzotik ya da grafik olabilir.</p>
                                                    <small class="mb-0 text-muted">22 Ekim</small>
                                                </div>
                                            </div>
                                            <div class="acitivity-item py-3 d-flex">
                                                <div class="flex-shrink-0">
                                                    <div class="avatar-xs acitivity-avatar">
                                                        <div class="avatar-title rounded-circle bg-info-subtle text-info material-shadow">
                                                            <i class="ri-line-chart-line"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Aylık Satış Raporu</h6>
                                                    <p class="text-muted mb-2"><span
                                                                class="text-danger">2 gün kaldı</span> aylık satış
                                                        raporunu göndermek için. <a href="javascript:void(0);"
                                                                                    class="link-warning text-decoration-underline">Rapor
                                                            Oluşturucu</a></p>
                                                    <small class="mb-0 text-muted">15 Ekim</small>
                                                </div>
                                            </div>
                                            <div class="acitivity-item d-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="<?= base_url('assets/images/users/avatar-8.jpg') ?>"
                                                         alt=""
                                                         class="avatar-xs rounded-circle acitivity-avatar material-shadow"/>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1">Yeni Talep Alındı <span
                                                                class="badge bg-success-subtle text-success align-middle">Tamamlandı</span>
                                                    </h6>
                                                    <p class="text-muted mb-2">Kullanıcı <span class="text-secondary">Erica245</span>
                                                        bir talep gönderdi.</p>
                                                    <small class="mb-0 text-muted">26 Ağustos</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="projects" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">


                                            <?php
                                            if (empty($userprojects)) {
                                                ?>
                                                <div class="alert alert-warning alert-dismissible alert-additional fade show mb-0 material-shadow"
                                                     role="alert">
                                                    <div class="alert-body">
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                                aria-label="Close"></button>
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0 me-3">
                                                                <i class="ri-alert-line fs-16 align-middle"></i>
                                                            </div>
                                                            <div class="flex-grow-1">
                                                                <h5 class="alert-heading">Maalesef, projeniz
                                                                    bulunmamakta!</h5>
                                                                <p class="mb-0">Yeni bir projeye başlangıç yaptığınızda,
                                                                    burada projenizi listeleyeceğiz! </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="alert-content">
                                                        <p class="mb-0">Hizmet almak için size gönderilen teklifleri
                                                            kabul ettiğinizde projeye dönüştürülür.</p>
                                                    </div>
                                                </div>
                                                <?php
                                            } else {
                                                foreach ($userprojects as $project) {
                                                    ?>
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <div class="card profile-project-card shadow-none profile-project-warning material-shadow">
                                                            <div class="card-body p-4">
                                                                <div class="d-flex">
                                                                    <div class="flex-grow-1 text-muted overflow-hidden">
                                                                        <h5 class="fs-14 text-truncate">
                                                                            <a href="#" class="text-body">
                                                                                <?php echo htmlspecialchars($project->project_name); ?>
                                                                            </a>
                                                                        </h5>
                                                                        <p class="text-muted text-truncate mb-0"> Son
                                                                            Güncelleme :
                                                                            <span class="fw-semibold text-body">
                                    <?php echo htmlspecialchars($project->updated_at); ?>
                                </span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="flex-shrink-0 ms-2">
                                                                        <?php if ($project->status == "ongoing") { ?>
                                                                            <div class="badge bg-warning-subtle text-warning fs-10">
                                                                                Devam Ediyor
                                                                            </div>
                                                                        <?php } else { ?>
                                                                            <div class="badge bg-success-subtle text-success fs-10">
                                                                                Tamamlandı
                                                                            </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>

                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-grow-1">
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <div>
                                                                                <h5 class="fs-12 text-muted mb-0">
                                                                                    Üyeler :</h5>
                                                                            </div>
                                                                            <div class="avatar-group">
                                                                                <?php
                                                                                $uyeler = $this->General_Model->getAll('project_members', ['project_id' => $project->id], '*');
                                                                                if ($uyeler != null) {
                                                                                    foreach ($uyeler as $uye) {
                                                                                        $uyenin_bilgisi = $this->General_Model->get('users', ['id' => $uye->user_id], '*');
                                                                                        ?>
                                                                                        <div class="avatar-group-item material-shadow">
                                                                                            <div class="avatar-xs">
                                                                                                <img src="<?= base_url($uyenin_bilgisi->profile_picture) ?>"
                                                                                                     alt=""
                                                                                                     class="rounded-circle img-fluid"/>
                                                                                            </div>
                                                                                        </div>
                                                                                        <?php
                                                                                    }
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <form method="post"
                                                                          action="<?php echo base_url('dashboard/addmember'); ?>">
                                                                        <input type="hidden"
                                                                               name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                                                               value="<?php echo $this->security->get_csrf_hash(); ?>"/>
                                                                        <input type="hidden" name="project_id"
                                                                               value="<?php echo intval($project->id); ?>"/>
                                                                        <button type="submit" name="button"
                                                                                class="btn btn-primary btn-sm">Üye Davet
                                                                            Et
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>


                                        <div class="col-lg-12">

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="tab-pane fade" id="documents" role="tabpanel">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-4">
                                        <h5 class="card-title flex-grow-1 mb-0"> Projelerinize Ait Yüklenmiş Belgeler</h5>
                                    <span>Proje dosyalarınız tamamlandığında, projelerinize ait dosyalar buradan görüntülenebilir.</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-borderless align-middle mb-0">
                                                    <thead class="table-light">
                                                    <tr>
                                                        <th scope="col"> Dosya Adı</th>
                                                        <th scope="col"> Tür</th>
                                                        <th scope="col"> Boyut</th>
                                                        <th scope="col"> Yükleme Tarihi</th>
                                                        <th scope="col"> İşlem</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $userid = $this->session->userdata('user_id');
                                                    $files = $this->General_Model->getAll('files',['proje_user_id'=>$userid],'*');
                                                    if ($files != null) {
                                                  foreach($files as $file){
                                                        ?>

                                                    <tr>

                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar-sm">
                                                                    <div class="avatar-title bg-primary-subtle text-primary rounded fs-20 material-shadow">
                                                                        <i class="ri-file-zip-fill"></i>
                                                                    </div>
                                                                </div>
                                                                <div class="ms-3 flex-grow-1">
                                                                    <h6 class="fs-15 mb-0"><a href="javascript:void(0)">
                                                            <?php echo $file->file_name; ?></a>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td> Proje Dosyası </td>
                                                        <td> < 100 MB</td>
                                                        <td> <?php echo $file->createdAt; ?></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a href="javascript:void(0);"
                                                                   class="btn btn-light btn-icon"
                                                                   id="dropdownMenuLink15" data-bs-toggle="dropdown"
                                                                   aria-expanded="true">
                                                                    <i class="ri-equalizer-fill"></i>
                                                                </a>
                                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink15">
                                                                    <li>
                                                                        <!-- Linkler problemli olabilir. Projede güncelleme atıp proje süresi yeteri kadarken düzeltilebilir -->
                                                                        <a class="dropdown-item" href="<?= base_url($file->file_path); ?>" target="_blank">
                                                                            <i class="ri-eye-fill me-2 align-middle text-muted"></i> Görüntüle
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item" href="<?= base_url($file->file_path); ?>" download>
                                                                            <i class="ri-download-2-fill me-2 align-middle text-muted"></i> İndir
                                                                        </a>
                                                                    </li>
                                                                </ul>

                                                            </div>
                                                        </td>
                                                    </tr>

                                                        <?php
                                                  }
                                                    }else{
                                                        print_r("<h3>Proje Dosyanız Bulunamadı</h3>");
                                                    }
                                                    ?>


                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>


    </div>
</div>


</div>



