

<!--
 * ============================================================
 * 🚀 Project: api
 * ============================================================
 * 👤 Author: Batuhan Korkmaz
 * 📅 Date: 8.10.2024
 * ⏰ Time: 00:57
 * 📄 File: header.php
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


<head>


        <meta charset="utf-8" />
        <title><?php echo isset($title) ? $title : 'Hoşgeldiniz! '; ?> | CRM Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo isset($meta_description) ? $meta_description : 'CRM Panel'; ?>" />
        <meta name="author" content="CRM Panel" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo isset($favicon) ? $favicon : base_url('assets/images/default_favicon.ico'); ?>">
        <!-- Layout config Js -->
        <script src="<?php echo base_url('assets/js/layout.js'); ?>"></script>
        <!-- Bootstrap Css -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo base_url('assets/css/icons.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url('assets/css/app.min.css'); ?>" rel="stylesheet" type="text/css" />
        <!-- Custom Css-->
        <link href="<?php echo base_url('assets/css/custom.min.css'); ?>" rel="stylesheet" type="text/css" />


</head>


