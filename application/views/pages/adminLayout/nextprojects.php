
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 12.10.2024
 * ⏰ Time: 18:01
 * 📄 File: nextprojects.php
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
                    <li class="breadcrumb-item active" aria-current="page">Devam Eden Projeler</li>
                </ol>
            </nav>
            <!-- Secondary Alert -->
            <div class="alert border-0 alert-secondary material-shadow" role="alert">
                <strong> Admin paneline hoşgeldiniz. </strong> bu sayfadan devam eden projeleri görüntüleyebilirsiniz.
            </div>


            <!-- Striped Rows --><div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Teklif Id</th>
                        <th scope="col">Kullanıcı Id</th>
                        <th scope="col">Proje Adı</th>
                        <th scope="col">Başlangıç Tarihi</th>
                        <th scope="col">Bitiş Tarihi</th>
                        <th scope="col">Açıklama</th>
                        <th scope="col">Durumu</th>
                        <th scope="col">Aktiflik</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $projects = $this->General_Model->getAll('projects',['status'=>'ongoing']);
                    foreach($projects as $project){


                        ?>
                        <tr>
                            <td><?php print_r($project->id);?></td>
                            <td><?php print_r($project->quote_id);?></td>
                            <td><?php print_r($project->user_id);?></td>
                            <td><?php print_r($project->project_name);?></td>
                            <td><?php print_r($project->start_date);?></td>
                            <td><?php print_r($project->end_date);?></td>
                            <td><?php print_r($project->description);?></td>
                            <td><?php echo $project->status=='completed'? '<span class="badge bg-success">Tamamlandı</span>':'<span class="badge bg-danger">Devam Ediyor</span>'; ?></td>
                            <td><?php echo $project->IsActive=='1'? '<span class="badge bg-success">Aktif</span>':'<span class="badge bg-danger">Onay Bekliyor</span>'; ?></td>
                        </tr>

                        <?php
                    }
                    ?>

                    </tbody>
                </table>

            </div></div></div></div>