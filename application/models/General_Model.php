<?php
/*
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 29.09.2024
 * ⏰ Time: 22:51
 * 📄 File: General_Model.php
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

class General_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Belirli bir tablo ve alanda kayıt var mı kontrol et
    public function exists($table, $field, $value)
    {
        return $this->db->where($field, $value)->count_all_results($table) > 0;
    }

    // Belirli bir tablo ve alandan tek bir kayıt al
    public function get($table, $where = [], $select = '*')
    {
        return $this->db->select($select)
            ->from($table)
            ->where($where)
            ->get()
            ->row(); // Tek bir sonuç döner
    }

    // Belirli bir tablo ve alandan tüm kayıtları al
    public function getAll($table, $where = [], $select = '*', $limit = null, $offset = 0, $orderBy = 'id', $orderDirection = 'DESC')
    {
        // Sorguyu oluştur
        $this->db->select($select)
            ->from($table)
            ->where($where)
            ->order_by($orderBy, $orderDirection); // Sıralama ekle

        // Limit ve offset ekle
        if ($limit !== null) {
            $this->db->limit($limit, $offset);
        }

        // Sonuçları döndür
        return $this->db->get()->result();
    }


    // Yeni bir kayıt ekle
    public function insert($table, $data)
    {
        return $this->db->insert($table, $data) ? $this->db->insert_id() : false; // Ekleme başarılıysa son ID'yi döner
    }

    // Var olan bir kaydı güncelle
    public function update($table, $data, $where)
    {
        return $this->db->update($table, $data, $where); // Güncelleme işlemi başarılıysa true döner
    }

    // Var olan bir kaydı sil
    public function delete($table, $where)
    {
        return $this->db->delete($table, $where); // Silme işlemi başarılıysa true döner
    }

    // Belirli bir tablo ve alanda kayıt sayısını al
    public function count($table, $where = [])
    {
        return $this->db->where($where)->count_all_results($table); // Kayıt sayısını döner
    }

    // Belirli bir tablo ve alanda bir değerin eşitliğini kontrol et
    public function checkValue($table, $field, $value)
    {
        $this->db->where($field, $value);
        $query = $this->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->result(); // Bulunan sonuçları döndür
        } else {
            return false; // Sonuç yoksa false döner
        }
    }

    // İki alanın değerinin eşit olup olmadığını kontrol et
    public function checkTwoFields($table, $field1, $value1, $field2, $value2)
    {
        // İlk iki alana göre filtrele
        $this->db->where($field1, $value1);
        $this->db->where($field2, $value2);
        // Sonuçları al
        $query = $this->db->get($table);
        // Eğer sonuç varsa
        if ($query->num_rows() > 0) {
            return $query->result(); // Bulunan sonuçları döndür
        } else {
            return false; // Sonuç yoksa false döner
        }
    }
}
