<?php
/*
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 28.09.2024
 * ⏰ Time: 16:23
 * 📄 File: Suggest_Model.php
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
 
class Suggest_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

function acceptproject($id,$data){

    try {
        $this->db->where('project_id', $id);
        $this->db->update('change_suggestions', $data);
        return true;
    }catch(Exception $e){
        return false;
    }


}

    function newSuggest($projectid,$userid,$suggestion){

        $data = array(
            'project_id'=>$projectid,
            'user_id'=>$userid,
            'suggestion'=>$suggestion
        );
try {
    $this->db->insert('change_suggestions', $data);
    return true;
}catch (Exception $e){
    return false;
}
    }

    function getSuggest($projectid){

        $this->db->where('project_id',$projectid);
        $this->db->where('confirm', '0');

        $query = $this->db->get('change_suggestions');

        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }




        return $projects->result();
    }


}