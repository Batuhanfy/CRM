
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 12.10.2024
 * ⏰ Time: 18:45
 * 📄 File: payments.php
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
                    <li class="breadcrumb-item active" aria-current="page">Ödemeler</li>
                </ol>
            </nav>
            <!-- Secondary Alert -->
            <div class="alert border-0 alert-secondary material-shadow" role="alert">
                <strong> Admin paneline hoşgeldiniz. </strong> bu sayfadan sistemdeki tüm ödemeleri görüntüleyebilirsiniz.
            </div>


            <!-- Striped Rows --><div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Proje Adı</th>
                        <th scope="col">Kullanıcı Mail</th>
                        <th scope="col">Miktar</th>
                        <th scope="col">Ödeme Vade Günü</th>
                        <th scope="col">Durum</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $payments = $this->General_Model->getAll('payments');
                    foreach($payments as $payment){
                    $user_p=$this->General_Model->get('users',['id'=>$payment->user_id],'*');
                    $proje_p=$this->General_Model->get('projects',['id'=>$payment->project_id],'*');
                        ?>
                        <tr>
                            <td><?php print_r($payment->id);?></td>
                            <td><?php print_r($proje_p->project_name);?></td>
                            <td><?php print_r($user_p->email);?></td>
                            <td><?php print_r($payment->amount);?></td>
                            <td><?php print_r($payment->payment_date);?></td>
                            <td><?php echo $payment->status=='completed'? '<span class="badge bg-success">Ödendi</span>':'<span class="badge bg-danger">Ödeme Bekliyor</span>'; ?></td>
                        </tr>

                        <?php
                    }
                    ?>

                    </tbody>
                </table>

            </div></div></div></div>