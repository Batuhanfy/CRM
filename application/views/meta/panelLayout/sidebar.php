<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 9.10.2024
 * ⏰ Time: 17:39
 * 📄 File: sidebar.php
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

<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="<?php echo base_url('/') ?>" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?php echo base_url('assets/images/logo-sm.png'); ?>" alt="" height="42">
                    </span>
            <span class="logo-lg">
                        <img src="<?php echo base_url('assets/images/logo-dark.png'); ?> alt="" height="47">
                    </span>
        </a>
        <!-- Light Logo-->
        <a href="<?php echo base_url('/') ?>" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?php echo base_url('assets/images/logo-sm.png'); ?>" alt="" height="42">
                    </span>
            <span class="logo-lg">
                        <img src="<?php echo base_url('assets/images/logo-light.png'); ?>" alt="" height="47">
                    </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div class="dropdown sidebar-user m-1 rounded">
        <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                    <span class="d-flex align-items-center gap-2">
                        <img class="rounded header-profile-user"
                             src="<?php echo base_url('assets/images/users/avatar-1.jpg'); ?> alt=" Header Avatar">
                        <span class="text-start">
                            <span class="d-block fw-medium sidebar-user-name-text">Anna Adame</span>
                            <span class="d-block fs-14 sidebar-user-name-sub-text"><i
                                        class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span
                                        class="align-middle">Online</span></span>
                        </span>
                    </span>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <h6 class="dropdown-header">Welcome Anna!</h6>
            <a class="dropdown-item" href="pages-profile.html"><i
                        class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span
                        class="align-middle">Profile</span></a>
            <a class="dropdown-item" href="apps-chat.html"><i
                        class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span
                        class="align-middle">Messages</span></a>
            <a class="dropdown-item" href="apps-tasks-kanban.html"><i
                        class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span
                        class="align-middle">Taskboard</span></a>
            <a class="dropdown-item" href="pages-faqs.html"><i
                        class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span
                        class="align-middle">Help</span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="pages-profile.html"><i
                        class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Balance : <b>$5971.67</b></span></a>
            <a class="dropdown-item" href="pages-profile-settings.html"><span
                        class="badge bg-success-subtle text-success mt-1 float-end">New</span><i
                        class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
            <a class="dropdown-item" href="auth-lockscreen-basic.html"><i
                        class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock screen</span></a>
            <a class="dropdown-item" href="auth-logout-basic.html"><i
                        class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle"
                                                                                             data-key="t-logout">Logout</span></a>
        </div>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">


            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboard Paneli</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php echo base_url('/'); ?>" class="nav-link" data-key="t-analytics">
                                    Anasayfa </a>
                            </li>

                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Hizmetler</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php echo base_url('dashboard/listservice'); ?>" class="nav-link"
                                   data-key="t-chat"> Tüm Hizmetlerimiz </a>
                            </li>


                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-folder-2-line"></i> <span data-key="t-layouts">Projeler</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <form method="post" action="<?php echo base_url('dashboard/listprojects'); ?>">
                                    <input type="hidden" name="type" value="all"/>
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                           value="<?php echo $this->security->get_csrf_hash(); ?>"/>
                                    <button href="<?php echo base_url('dashboard/listprojects'); ?>" class="nav-link"
                                            data-key="t-chat"> Tüm Projeleriniz
                                    </button>
                                </form>
                            </li>
                            <li class="nav-item">
                                <form method="post" action="<?php echo base_url('dashboard/listprojects'); ?>">
                                    <input type="hidden" name="type" value="pending"/>
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                           value="<?php echo $this->security->get_csrf_hash(); ?>"/>
                                    <button href="<?php echo base_url('dashboard/listprojects'); ?>" class="nav-link"
                                            data-key="t-chat"> Devam Eden Projeleriniz
                                    </button>
                                </form>
                            </li>
                            <li class="nav-item">
                                <form method="post" action="<?php echo base_url('dashboard/listprojects'); ?>">
                                    <input type="hidden" name="type" value="finished"/>
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                           value="<?php echo $this->security->get_csrf_hash(); ?>"/>
                                    <button href="<?php echo base_url('dashboard/listprojects'); ?>" class="nav-link"
                                            data-key="t-chat"> Biten Projeleriniz
                                    </button>
                                </form>
                            </li>

                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Teklif Menüsü</span></li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPages" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarPages">
                        <i class="ri-pages-line"></i> <span data-key="t-pages">Teklifler</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPages">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php echo base_url('dashboard/requestquote'); ?>" class="nav-link"
                                   data-key="t-faqs"> Yeni Teklif İste </a>
                            </li>
                            <li class="nav-item">
                                <form method="post" action="<?php echo base_url('dashboard/listquotes'); ?>">
                                    <input type="hidden" name="type" value="all"/>
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                           value="<?php echo $this->security->get_csrf_hash(); ?>"/>
                                    <button class="nav-link" data-key="t-chat"> Tüm Teklifler</button>
                                </form>
                            </li>
                            <li class="nav-item">
                                <form method="post" action="<?php echo base_url('dashboard/listquotes'); ?>">
                                    <input type="hidden" name="type" value="pending"/>
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                           value="<?php echo $this->security->get_csrf_hash(); ?>"/>
                                    <button class="nav-link" data-key="t-chat"> Bekleyen Teklifler</button>
                                </form>
                            </li>
                            <li class="nav-item">
                                <form method="post" action="<?php echo base_url('dashboard/listquotes'); ?>">
                                    <input type="hidden" name="type" value="approved"/>
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                           value="<?php echo $this->security->get_csrf_hash(); ?>"/>
                                    <button class="nav-link" data-key="t-chat"> Kabul Ettiğim Teklifler</button>
                                </form>
                            </li>
                            <li class="nav-item">
                                <form method="post" action="<?php echo base_url('dashboard/listquotes'); ?>">
                                    <input type="hidden" name="type" value="rejected"/>
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                           value="<?php echo $this->security->get_csrf_hash(); ?>"/>
                                    <button class="nav-link" data-key="t-chat"> Red Ettiğim Teklifler</button>
                                </form>
                            </li>

                        </ul>
                    </div>
                </li>


                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Ödeme Menüsü</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarPayments" data-bs-toggle="collapse" role="button"
                       aria-expanded="false" aria-controls="sidebarPages">
                        <i class="ri-bank-card-2-line"></i> <span data-key="t-pages">Ödemeler</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPayments">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?php echo base_url('dashboard/wallet'); ?>" class="nav-link"
                                   data-key="t-faqs"> Cüzdan </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('dashboard/payments'); ?>" class="nav-link"
                                   data-key="t-faqs"> Tüm Ödemelerim </a>
                            </li>


                        </ul>
                    </div>
                </li>


                <?php if ($isAdmin) {
                    ?>
                    <li class="menu-title"><i class="ri-more-fill"></i> <span
                                data-key="t-components">Admin Menüsü</span></li>

                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarUsers" data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="sidebarPages">
                            <i class=" ri-admin-fill"></i> <span data-key="t-pages">Kullanıcılar</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarUsers">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/users'); ?>" class="nav-link"
                                       data-key="t-faqs"> Tüm Kullanıcılar </a>
                                </li>


                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarAprojects" data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="sidebarPages">
                            <i class="ri-file-zip-fill"></i> <span data-key="t-pages">Projeler</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarAprojects">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/projects'); ?>" class="nav-link"
                                       data-key="t-faqs"> Tüm Projeler </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/nextprojects'); ?>" class="nav-link"
                                       data-key="t-faqs"> Devam Eden Projeler </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/completedprojects'); ?>" class="nav-link"
                                       data-key="t-faqs"> Tamamlanan Projeler </a>
                                </li>


                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarApayment" data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="sidebarPages">
                            <i class=" ri-bank-card-fill"></i> <span data-key="t-pages">Ödeme Paneli</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarApayment">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/requestpayment'); ?>" class="nav-link"
                                       data-key="t-faqs"> Yeni Ödeme İste </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/payments'); ?>" class="nav-link"
                                       data-key="t-faqs"> Tüm Ödemeler </a>
                                </li>


                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarAquote" data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="sidebarPages">
                            <i class=" ri-survey-fill"></i> <span data-key="t-pages">Teklif Yönetimi</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarAquote">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/listquoterequests'); ?>" class="nav-link"
                                       data-key="t-faqs"> Teklif İstekleri </a>
                                </li>




                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarAquote" data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="sidebarPages">
                            <i class=" ri-file-copy-2-fill"></i> <span data-key="t-pages">Dosya Yönetimi</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarAquote">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/uploadfiles'); ?>" class="nav-link"
                                       data-key="t-faqs"> Projeye Dosya Yükle </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url('admin/files'); ?>" class="nav-link"
                                       data-key="t-faqs"> Tüm Dosyalar </a>
                                </li>



                            </ul>
                        </div>
                    </li>

                <?php } ?>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
