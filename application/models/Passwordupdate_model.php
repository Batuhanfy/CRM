<?php
/*
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 27.09.2024
 * ⏰ Time: 00:32
 * 📄 File: PasswordUpdate_Model.php
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

class Passwordupdate_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function checkPassword($password, $userid)
    {
        $query = $this->db->select('password')->where('id', $userid)->get('users');
        if ($query->num_rows() > 0) {
            $userpassword = $query->row()->password;
            if (sha1($password) == $userpassword) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function changePassword($password, $userid)
    {
        try {
            $data = array(
                'password' => sha1($password)
            );
            $this->db->where('id', $userid);
            $this->db->update('users', $data);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}