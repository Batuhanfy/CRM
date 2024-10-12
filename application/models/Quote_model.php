<?php
/*
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 27.09.2024
 * ⏰ Time: 02:43
 * 📄 File: Quote_Model.php
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

class Quote_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function isServiceIsset($serviceId)
    {
        $this->db->where('id', $serviceId);
        $this->db->where('IsActive', 1);
        $query = $this->db->get('services');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    function createProject($quoteid)
    {
        try {
            $QuoteDetails = $this->isQuoteIsset($quoteid);
            $new_project = array(
                'quote_id' => $QuoteDetails['id'],
                'user_id' => $QuoteDetails['user_id'],
                'project_name' => $QuoteDetails['service_name'],
                'description' => $QuoteDetails['service_description'],
                'start_date' => date('d/m/Y'),
                'end_date' => $QuoteDetails['valid_until'],
                'status' => 'ongoing'
            );
            $this->db->insert('projects', $new_project);
            //  --------------------
            $data = array(
                'IsActive' => '0',
                'status' => 'approved'
            );
            $this->db->where('id', $quoteid);
            $this->db->update('quotes', $data);
            //  -----------------------
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    function my($userId)
    {
        $this->db->where('user_id', $userId);
        $this->db->where('IsActive', 1);
        $data = $this->db->get('quotes');
        if ($data->num_rows() > 0) {
            return $data->result_array();
        }
        {
            return false;
        }
    }

    function isQuoteIsset($quoteid)
    {
        $this->db->where('id', $quoteid);
        $this->db->where('IsActive', 1);
        $query = $this->db->get('quotes');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    function newQuote($quoteData)
    {
        try {
            $this->db->insert('quotes', $quoteData);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    function changeQuote($quoteData, $quoteId)
    {
        try {
            $this->db->where('id', $quoteId);
            $this->db->update('quotes', $quoteData);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
 
