<?php
/*
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 27.09.2024
 * ⏰ Time: 22:48
 * 📄 File: Project_Model.php
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

class Project_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getProjects()
    {
        $this->db->select('*');
        $this->db->where('IsActive', 1);
        $query = $this->db->get('projects'); //dediğimi burda yapabilirsin mesela :)
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
        return $projects->result(); //burda bir hata yokmu sence ? var hocam :D
    }

    public function getMyProjects($userId)
    {
        $this->db->where('user_id', $userId);
        $this->db->where('IsActive', 1);
        $query = $this->db->get('projects');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
        return $projects->result(); //aynısı buraya daha girmedin sanırım
    }

    public function getUserProject($userId)
    {
        $this->db->where('user_id', $userId);
        $this->db->where('IsActive', 1);
        $query = $this->db->get('projects');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
        return $projects->result();
    }

    public function getProject($id)
    {
        $this->db->where('id', $id);
        $this->db->where('IsActive', 1);
        $query = $this->db->get('projects');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
        return $projects->result();
    }


    function updateProject($id, $data)
    {
        try {
            $this->db->where('id', $id);
            $this->db->update('projects', $data);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
 
