<?php
/*
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 28.09.2024
 * ⏰ Time: 00:22
 * 📄 File: Cors.php
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


defined('BASEPATH') OR exit('No direct script access allowed');

class Cors {
    public function setHeaders() {
        header("Access-Control-Allow-Origin: http://localhost:5173"); // Frontend URL
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // İzin verilen HTTP yöntemleri
        header("Access-Control-Allow-Headers: Content-Type, Authorization"); // İzin verilen başlıklar

        // OPTIONS isteği geldiğinde çıkış yap
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            exit;
        }
    }
}