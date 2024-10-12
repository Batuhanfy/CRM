
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 11.10.2024
 * ⏰ Time: 16:07
 * 📄 File: listservices.php
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
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Hizmetler</li>
                </ol>
            </nav>
            <!-- warning Alert -->
            <div class="alert alert-warning material-shadow" role="alert">
                <strong> Hizmetler Menüsünden </strong> bir hizmet seçerek <b>yeni bir hizmet talebi </b> oluşturabilirsiniz!
            </div>

<!-- Striped Rows --><div class="table-responsive">
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Hizmet Adı</th>
            <th scope="col">Hizmet Açıklaması</th>
            <th scope="col">Tahmini Ücreti</th>
            <th scope="col">Aktif Mi</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $get_services=$this->General_Model->getAll('services');
    foreach($get_services as $service){


    ?>
        <tr>
            <td><?php print_r("<br/>".$service->id);?></td>
            <td><?php print_r("<br/>".$service->service_name);?></td>
            <td><?php print_r("<br/>".$service->service_description);?></td>
            <td><?php print_r("<br/>".$service->service_price);?></td>
            <td><?php echo $service->IsActive=='1'? '<span class="badge bg-success">Aktif</span>':'<span class="badge bg-danger">Şuan Kullanılamıyor</span>'; ?></td>
        </tr>

    <?php
    }
    ?>

    </tbody>
</table>

            </div></div></div></div>