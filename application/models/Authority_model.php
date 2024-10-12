<?php
/*
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 27.09.2024
 * ⏰ Time: 01:51
 * 📄 File: Authority.php
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
 */
 
class Authority_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('api_auth');
    }


// buraya bir fonksiyon açtın ya is user diye mesela bu burda değil helperda daha mantıklı ilk olarak sonrasında diyelim
//tek bir veri çekeceksin ne yapman gerekiyor this-db-where-db(table)-row() şeklinde burdaki table ve where değerlerini
    public function isUserAdmin()
    {
        // user_roles tablosunda kullanıcının id değeri 1 ile eşleşiyorsa admindir.

        $userid= $this->api_auth->getUserId();

        $this->db->where('user_id',$userid);
        $this->db->where('role_id',1);
        $count= $this->db->count_all_results('user_roles');

        if ($count != 0) {
            return true;
        } else {
            return false;
        }

    }


}