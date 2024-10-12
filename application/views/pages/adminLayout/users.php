
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 12.10.2024
 * ⏰ Time: 17:41
 * 📄 File: users.php
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
                    <li class="breadcrumb-item active" aria-current="page">Kullanıcılar</li>
                </ol>
            </nav>
            <!-- Secondary Alert -->
            <div class="alert border-0 alert-secondary material-shadow" role="alert">
                <strong> Admin paneline hoşgeldiniz. </strong> bu sayfadan kullanıcıları görüntüleyebilirsiniz.
            </div>


            <!-- Striped Rows --><div class="table-responsive">
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">İsim</th>
            <th scope="col">Soyisim</th>
            <th scope="col">E-Mail</th>
            <th scope="col">Unvan</th>
            <th scope="col">Şirket Adı</th>
            <th scope="col">Bakiyesi</th>
            <th scope="col">Telefon</th>
            <th scope="col">Adresi</th>
            <th scope="col">Mail Onayı</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $users = $this->General_Model->getAll('users');
    foreach($users as $user){


    ?>
        <tr>
            <td><?php print_r($user->id);?></td>
            <td><?php print_r($user->first_name);?></td>
            <td><?php print_r($user->last_name);?></td>
            <td><?php print_r($user->email);?></td>
            <td><?php print_r($user->title);?></td>
            <td><?php print_r($user->company_name);?></td>
            <td><?php print_r($user->balance);?></td>
            <td><?php print_r($user->phone);?></td>
            <td><?php print_r($user->address);?></td>
            <td><?php echo $user->IsActive=='1'? '<span class="badge bg-success">Aktif</span>':'<span class="badge bg-danger">Onay Bekliyor</span>'; ?></td>
        </tr>

    <?php
    }
    ?>

    </tbody>
</table>

            </div></div></div></div>