-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 13 Eki 2024, 20:04:36
-- Sunucu sürümü: 8.0.30-cll-lve
-- PHP Sürümü: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `hanktica_crm`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `expiry_date` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `created_at` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) COLLATE utf8mb4_turkish_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_turkish_ci NOT NULL,
  `timestamp` int UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `feedback`
--

CREATE TABLE `feedback` (
  `id` int UNSIGNED NOT NULL,
  `quote_id` int UNSIGNED NOT NULL,
  `feedback_text` text COLLATE utf8mb4_turkish_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `files`
--

CREATE TABLE `files` (
  `id` int UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `file_path` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `full_path` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `file_type` varchar(100) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `file_size` varchar(155) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `project_id` varchar(15) COLLATE utf8mb4_turkish_ci NOT NULL,
  `proje_user_id` int UNSIGNED DEFAULT NULL,
  `upload_from_user_id` varchar(15) COLLATE utf8mb4_turkish_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` enum('1','0') COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '1',
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `followers`
--

CREATE TABLE `followers` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `follower_id` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `forget_password_tokens`
--

CREATE TABLE `forget_password_tokens` (
  `id` int NOT NULL,
  `url` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `expiryTime` datetime NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `friends`
--

CREATE TABLE `friends` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `friend_id` int UNSIGNED NOT NULL,
  `status` enum('pending','accepted','blocked') COLLATE utf8mb4_turkish_ci DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `login_history`
--

CREATE TABLE `login_history` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `device_name` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_turkish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `logs`
--

CREATE TABLE `logs` (
  `id` int NOT NULL,
  `log` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` text COLLATE utf8mb4_turkish_ci,
  `user_name` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `ip` text COLLATE utf8mb4_turkish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notifications`
--

CREATE TABLE `notifications` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `notification_text` text COLLATE utf8mb4_turkish_ci,
  `sent_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `offers`
--

CREATE TABLE `offers` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `details` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `contact_number` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('waiting','ok') COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT 'waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `payments`
--

CREATE TABLE `payments` (
  `id` int UNSIGNED NOT NULL,
  `project_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `status` enum('pending','completed','failed') COLLATE utf8mb4_turkish_ci DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `content` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `projects`
--

CREATE TABLE `projects` (
  `id` int UNSIGNED NOT NULL,
  `quote_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `start_date` text COLLATE utf8mb4_turkish_ci,
  `end_date` text COLLATE utf8mb4_turkish_ci,
  `description` text COLLATE utf8mb4_turkish_ci,
  `status` enum('ongoing','completed','archived') COLLATE utf8mb4_turkish_ci DEFAULT 'ongoing',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `IsActive` enum('1','0') COLLATE utf8mb4_turkish_ci DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `project_members`
--

CREATE TABLE `project_members` (
  `id` int UNSIGNED NOT NULL,
  `project_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `quotes`
--

CREATE TABLE `quotes` (
  `id` int UNSIGNED NOT NULL,
  `service_name` varchar(200) COLLATE utf8mb4_turkish_ci NOT NULL,
  `service_description` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_turkish_ci DEFAULT 'pending',
  `total_price` decimal(10,2) NOT NULL,
  `valid_until` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `IsActive` enum('1','0') COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `requests`
--

CREATE TABLE `requests` (
  `request_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `service_id` int UNSIGNED NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` date NOT NULL,
  `status` enum('pending','accepted','rejected','') COLLATE utf8mb4_turkish_ci DEFAULT 'pending',
  `admin_note` varchar(155) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `revisions`
--

CREATE TABLE `revisions` (
  `revision_id` int UNSIGNED NOT NULL,
  `project_id` int UNSIGNED DEFAULT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_turkish_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT 'pending',
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roles`
--

CREATE TABLE `roles` (
  `id` int UNSIGNED NOT NULL,
  `role_name` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `description` text COLLATE utf8mb4_turkish_ci,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `services`
--

CREATE TABLE `services` (
  `id` int UNSIGNED NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `service_description` text COLLATE utf8mb4_turkish_ci,
  `service_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsActive` enum('1','0') COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '1',
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `skills`
--

CREATE TABLE `skills` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `skill_name` varchar(100) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_turkish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `title` varchar(35) COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT 'User',
  `description` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `company_name` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `job_description` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `job_start_date` varchar(4) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `job_end_date` varchar(4) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `balance` double NOT NULL DEFAULT '0',
  `phone` varchar(20) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `website` varchar(100) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_turkish_ci,
  `city` varchar(22) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `zipcode` varchar(22) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `country` varchar(22) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `IsActive` enum('1','0') COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '0',
  `mailCode` varchar(4) COLLATE utf8mb4_turkish_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `token_expiration_time` datetime DEFAULT NULL,
  `locked` enum('0','1') COLLATE utf8mb4_turkish_ci NOT NULL DEFAULT '0',
  `profile_picture` varchar(455) COLLATE utf8mb4_turkish_ci DEFAULT 'assets/images/users/avatar-3.jpg',
  `linkedin_url` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `github_account` varchar(150) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `hobi` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `title`, `description`, `company_name`, `job_description`, `job_start_date`, `job_end_date`, `balance`, `phone`, `website`, `address`, `city`, `zipcode`, `country`, `created_at`, `updated_at`, `IsActive`, `mailCode`, `password_reset_token`, `token_expiration_time`, `locked`, `profile_picture`, `linkedin_url`, `twitter_url`, `instagram_url`, `github_account`, `hobi`) VALUES
(1, 'Batuhan', 'Korkmaz', 'bthnkkz@yahoo.com', '$2y$10$R9wbQmZJf5lo6ObBLKuYJu4K.VNVEQlUnGDI25xVTJxQi1OhrxqO6', 'User', '', NULL, NULL, NULL, NULL, 0, '5530014733', NULL, 'İstanbul', NULL, NULL, NULL, '2024-10-12 20:17:16', '2024-10-12 20:24:01', '1', 'd645', NULL, NULL, '0', 'assets/images/users/avatar-8.jpg', NULL, NULL, NULL, NULL, NULL),
(2, 'Batuhan', 'Korkmaz', 'admin@hotmail.com', '$2y$10$sw63AEFcTTxyxaoSqFdixOl4h8kNB9WLtSVxxWGkJdtBn60zYEGlq', 'Yazılım Geliştiricisi', 'Ben bir yazılım geliştiricisiyim. Gitar çalmayı ve sanatla uğraşmayı da severim. Bu bir örnek kullanıcı profil açıklamasıdır.', 'Freelance', 'Freelance olarak yazılım geliştiriyorum. Bu bir örnek açıklama metnidir.', '2020', '2023', 2250, '5530014733', 'http://www.batuhankorkmaz.com', 'İstanbul / Arnavutköy', 'İstanbul', '34275', 'Türkiye', '2024-10-12 20:18:58', '2024-10-12 21:34:56', '1', '7cd8', NULL, NULL, '0', 'assets/images/users/avatar-9.jpg', 'https://www.linkedin.com/in/batuhanfy/', '', 'https://www.instagram.com/batuhanfy/', 'https://github.com/Batuhanfy', 'Gitar'),
(3, 'Batuhan', 'Korkmaz', 'test@hotmail.com', '$2y$10$ZUKR0TggwFGgDGdI9MuuI.8O4bdXw4Db7L.qOd4E0fZDdX32hcOi6', 'User', '', NULL, NULL, NULL, NULL, 0, '5530014733', NULL, 'Deneme', NULL, NULL, NULL, '2024-10-12 21:28:32', '2024-10-12 21:54:41', '1', '8069', NULL, NULL, '0', 'assets/images/users/avatar-10.jpg', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_notes`
--

CREATE TABLE `user_notes` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `admin_id` int UNSIGNED NOT NULL,
  `note` text COLLATE utf8mb4_turkish_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int UNSIGNED NOT NULL,
  `role_id` int UNSIGNED NOT NULL,
  `updatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`, `updatedAt`) VALUES
(2, 1, '2024-10-12 20:43:30');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_skils`
--

CREATE TABLE `user_skils` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `wallet_transactions`
--

CREATE TABLE `wallet_transactions` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `transaction_type` enum('add','spent') COLLATE utf8mb4_turkish_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Tablo için indeksler `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quote_id` (`quote_id`);

--
-- Tablo için indeksler `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `forget_password_tokens`
--
ALTER TABLE `forget_password_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `friend_id` (`friend_id`);

--
-- Tablo için indeksler `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`);

--
-- Tablo için indeksler `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quote_id` (`quote_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `project_members`
--
ALTER TABLE `project_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Tablo için indeksler `revisions`
--
ALTER TABLE `revisions`
  ADD PRIMARY KEY (`revision_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Tablo için indeksler `user_notes`
--
ALTER TABLE `user_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Tablo için indeksler `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Tablo için indeksler `user_skils`
--
ALTER TABLE `user_skils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `files`
--
ALTER TABLE `files`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `forget_password_tokens`
--
ALTER TABLE `forget_password_tokens`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `project_members`
--
ALTER TABLE `project_members`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `revisions`
--
ALTER TABLE `revisions`
  MODIFY `revision_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `services`
--
ALTER TABLE `services`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `user_notes`
--
ALTER TABLE `user_notes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `user_skils`
--
ALTER TABLE `user_skils`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
