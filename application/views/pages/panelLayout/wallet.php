<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 12.10.2024
 * ⏰ Time: 13:14
 * 📄 File: wallet.php
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
                <!-- Info Alert -->
                <div class="alert alert-info material-shadow" role="alert">
                    <strong> (Developer) Test Modunda </strong> 5528790000000008 kart numarası <b>12 / 2030 ay bilgisiyle</b> CV : 123 yi örnek olarak kullanabilirsiniz.

                </div>

                <div class="col-xxl-4">

                    <div class="card card-height-100 ">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Bakiye Yükle - Kredi Kartı</h5>
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
                        <div class="card-body">
                            <div class="mx-auto" style="max-width: 350px">
                                <div class="text-bg-info bg-gradient p-4 rounded-3 mb-3">
                                    <div class="d-flex">
                                        <div class="flex-grow-1">
                                            <i class="bx bx-chip h1 text-warning"></i>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <i class="bx bxl-visa display-2 mt-n3"></i>
                                        </div>
                                    </div>
                                    <div class="card-number fs-20" id="card-num-elem">
                                        XXXX XXXX XXXX XXXX
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-4">
                                            <div>
                                                <div class="text-white-50">Card Holder</div>
                                                <div id="card-holder-elem" class="fw-medium fs-14">Full Name</div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="expiry">
                                                <div class="text-white-50">Expires</div>
                                                <div class="fw-medium fs-14">
                                                    <span id="expiry-month-elem">00</span>
                                                    /
                                                    <span id="expiry-year-elem">0000</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <div class="text-white-50">CVC</div>
                                                <div id="cvc-elem" class="fw-medium fs-14">---</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card div elem -->
                            </div>


                            <form id="custom-card-form" method="post" action="<?php echo base_url('dashboard/wallet');?>" autocomplete="off">

                                <input type="hidden"
                                       name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                       value="<?php echo $this->security->get_csrf_hash(); ?>"/>

                                <div class="mb-3">

                                    <label for="card-num-input" class="form-label">Kart Numarası</label>
                                    <input id="card-num-input" class="form-control" name="cardnumber" maxlength="19" placeholder="0000 0000 0000 0000" />
                                </div>

                                <div class="mb-3">
                                    <label for="card-holder-input" class="form-label">Üzerindeki İsim</label>
                                    <input type="text" class="form-control" name="isim" id="card-holder-input" placeholder="Enter holder name" />
                                </div>
                                <div class="mb-3">
                                    <label for="card-holder-input" class="form-label">Yatıracağınız Bakiye</label>
                                    <input type="text" class="form-control" name="miktar" id="card-holder-input" placeholder="Enter balance" />
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="expiry-month-input" class="form-label">Ay</label>
                                            <select class="form-select" name="ay" id="expiry-month-input">
                                                <option></option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-4">
                                        <div>
                                            <label for="expiry-year-input" class="form-label">Yıl</label>
                                            <select class="form-select" name="yil" id="expiry-year-input">
                                                <option></option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                                <option value="2030">2030</option>
                                                <option value="2031">2031</option>
                                                <option value="2032">2032</option>
                                                <option value="2033">2033</option>
                                                <option value="2034">2034</option>
                                                <option value="2035">2035</option>


                                            </select>
                                        </div>
                                    </div>
                                    <!-- end col -->

                                    <div class="col-lg-4">
                                        <div class="cvc">
                                            <label for="cvc-input" class="form-label">CVC</label>
                                            <input type="text" name="cvc" id="cvc-input" class="form-control" maxlength="3" />
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </div>
                                <!-- end row -->

                                <button class="btn btn-danger w-100 mt-3" type="submit">Pay Now</button>
                            </form>
                            <!-- end card form elem -->

                        </div>

                    </div>
                    <!-- end card -->

                </div>
                <div class="col-xxl-8">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <p class="text-uppercase fw-medium text-muted mb-0">Bakiyeniz</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <h5 class="text-muted fs-14 mb-0">
                                        -
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target="<?PHP echo $balance;?>">0</span> TL</h4>
                                    <a href="#" class="text-decoration-underline"></a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-primary-subtle rounded fs-3 material-shadow">
                                                <i class="bx bx-wallet text-primary"></i>
                                            </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->



                    <div class="card card-height-100">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Bakiye Geçmişiniz</h4>
                            <div class="flex-shrink-0">
                                <div class="dropdown card-header-dropdown">
                                    <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="text-muted fs-18"><i class="mdi mdi-dots-vertical"></i></span>
                                    </a>

                                </div>
                            </div>
                        </div><!-- end card header -->
                        <div class="card-body pt-0">
                            <ul class="list-group list-group-flush border-dashed">
                                <?PHP
                                $get_user_wallet_transactions = $this->General_Model->getAll('wallet_transactions',['user_id'=>$userid],'*');
                                foreach($get_user_wallet_transactions as $transaction){

                                    $originalDate = $transaction->transaction_date;
                                    $timestamp = strtotime($originalDate);

                                    $dayNumber = date('d', $timestamp);
                                    $dayName = date('D', $timestamp);
                                    $time = date('H:i', $timestamp);
                                    ?>
                                    <li class="list-group-item ps-0">
                                        <div class="row align-items-center g-3">
                                            <div class="col-auto">
                                                <div class="avatar-sm p-1 py-2 h-auto bg-light rounded-3 material-shadow">
                                                    <div class="text-center">
                                                        <h5 class="mb-0"><?php echo $dayNumber;?></h5>
                                                        <div class="text-muted"><?php echo $dayName;?></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h5 class="text-muted mt-0 mb-1 fs-13"><?php echo $time?> </h5>
                                                <a href="#" class="text-reset fs-14 mb-0"><?php echo $transaction->description?></a>
                                            </div>
                                            <div class="col-sm-auto">
                                                <h3><?php echo $transaction->amount;?> TL</h3>
                                            </div>
                                        </div>
                                        <!-- end row -->
                                    </li>
                                <?php
                                }
                                ?>


                            </ul><!-- end -->

                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->

            </div>
        </div>
    </div>
</div>



