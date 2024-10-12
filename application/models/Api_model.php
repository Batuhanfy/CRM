<?php /* <!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 26.09.2024
 * ⏰ Time: 02:49
 * 📄 File: Api_Model.php
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
 --> */
?>
<?php

class Api_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function registerUser($data)
    {
// artık ctrl+shift+ l yaptığında tüm tasarım düzelecek
        $this->db->where('email', $data['email']);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            // 0 Kullanıcı Zaten Kayıtlı
            return 0;
        }
        try {
            $this->db->insert('users', $data);
            return 1;
        } catch (Exception $e) {
            return -1;
        }
    }

    function checkLogin($data) //buda helper tarafında daha mantıklı
    {
        $this->db->where($data);
        $query = $this->db->get("users");
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    function getProfile($userId)
    {
        $this->db->select("first_name, last_name,email,phone,address,created_at");//eğer burda tüm verileri çekiyorsan böyle uzun uzun yazma
        $this->db->where(['id' => $userId]);
        $query = $this->db->get("users");
        return $query->row();
//       return $this->db->where('id', $userId)->get('users')->row(); (Password dahil)
    }

    public function updatePassword($userId, $newPassword)
    {
        $data = array(
            'password' => $this->encryption->encrypt($newPassword),
            'password_reset_token' => NULL,
            'token_expiration_time' => NULL
        );
        $this->db->where('id', $userId);
        $this->db->update('users', $data);
    }

    public function getUserByEmail($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row();
    }

    public function setPasswordResetToken($userId, $token, $expiration)
    {
        $data = array(
            'password_reset_token' => $token,
            'token_expiration_time' => $expiration
        );
        $this->db->where('id', $userId);
        return $this->db->update('users', $data);
    }

    public function verifyResetToken($token)
    {
        $this->db->where('password_reset_token', $token);
        $this->db->where('token_expiration_time >=', date("Y-m-d H:i:s"));
        return $this->db->get('users')->row();
    }
}