<?php
/*
<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 29.09.2024
 * ⏰ Time: 22:31
 * 📄 File: upload.php
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
defined('BASEPATH') or exit('No direct script access allowed');
$config['upload_path'] = BASEPATH . '../application/uploads/';
$config['allowed_types'] = 'pdf|doc|docx|zip|rar|png|exe|jpg';
$config['max_size'] = 10000;