<?php
/*
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 26.09.2024
 * ⏰ Time: 23:47
 * 📄 File: ProfileUpdate_Model.php
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

class Profileupdate_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }


    function changeProfile($data, $userid){

        try {
            // Kullanıcının id'sine göre filtreleme
            $this->db->where('id', $userid);

            // Veritabanında güncelleme işlemi
            $this->db->update('users', $data);

            return true;
        }
        catch (Exception $e) {
         return false;
        }
    }

}