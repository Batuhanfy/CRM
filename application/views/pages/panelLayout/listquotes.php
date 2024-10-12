<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 11.10.2024
 * ⏰ Time: 20:26
 * 📄 File: listquotes.php
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
    if (!isset($quotes)) {
        redirect('/');
    }
    ?>
    <div class="page-content">
        <div class="container-fluid">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Teklifler</li>
                </ol>
            </nav>
            <div class="table-responsive">
                <!-- warning Alert -->
                <div class="alert alert-warning material-shadow" role="alert">
                    <strong> Teklifleriniz ile ilgili </strong> her türlü soru için <b>bize ulaşıp </b> bilgi
                    alabilirsiniz.
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
                        <th scope="col">Teklif/Hizmet Adı</th>
                        <th scope="col">Teklif Açıklaması</th>
                        <th scope="col">Tahmini Bitiş Tarihi</th>
                        <th scope="col">Yaklaşık Ücret</th>
                        <th scope="col">Teklifin Size Sunulduğu Tarih</th>
                        <th scope="col">Aksiyon</th>
                        <th scope="col">Durum</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($quotes as $quote) {
                        ?>
                        <tr>
                            <td><?php print_r($quote->service_name); ?></td>
                            <td><?php print_r($quote->service_description); ?></td>
                            <td><?php print_r($quote->valid_until); ?></td>
                            <td><?php print_r($quote->total_price); ?> TL</td>
                            <td><?php print_r($quote->created_at); ?></td>
                            <?php
                            if ($quote->status == "approved") {
                                ?>
                                <td>


                                    <p>Projeniz Oluşturuldu.</p>

                                </td>
                                <td><a href="javascript:void(0);" class="link-success">Kabul Ettiniz</a></td>

                                <?php
                            } else if ($quote->status == "rejected") {
                                ?>
                                <td style="height: 100%">

                                    <p>Proje Reddedildi.</p>

                                </td>
                                <td><a href="javascript:void(0);" class="link-warning">Reddettiniz.</a></td>
                            <?php } else { ?>


                                <td>
                                    <form method="post" action="<?php echo base_url('dashboard/quotesettings')?>">
                                        <input type="hidden"
                                               name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                               value="<?php echo $this->security->get_csrf_hash(); ?>"/>
                                        <input type="hidden"
                                               name="quote_id"
                                               value="<?php print_r($quote->id);?>"/>
                                        <button type="submit" name="approve"
                                                class="btn btn-soft-success waves-effect waves-light material-shadow-none">
                                            Onayla
                                        </button>
                                        <button type="submit" name="reject"
                                                class="btn btn-soft-danger waves-effect waves-light material-shadow-none">
                                            Reddet
                                        </button>
                                    </form>
                                </td>
                                <td><a href="javascript:void(0);" class="link-warning">Sizden Yanıt Bekleniyor.</a></td>

                            <?php } ?>
                        </tr>
                    <?php }
                    ?>

                    </tbody>
                </table>
                <?php
                if ($quotes == null) {
                    print_r("<br/><h3>Teklif bulunamadı.</h3>");
                }
                ?>
                <!-- end table -->
            </div>
            <!-- end table responsive -->
        </div>
    </div>
</div>
