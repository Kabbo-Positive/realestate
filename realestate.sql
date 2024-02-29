-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2024 at 06:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amenities_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `amenities_name`, `created_at`, `updated_at`) VALUES
(1, 'Air conditioning', NULL, '2024-02-07 11:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_05_165434_create_property_types_table', 2),
(6, '2024_02_07_063523_create_amenities_table', 3),
(7, '2024_02_08_170310_create_permission_tables', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\Models\\User', 23),
(5, 'App\\Models\\User', 25);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'all.type', 'web', 'type', '2024-02-14 03:42:04', '2024-02-14 04:14:27'),
(2, 'add.type', 'web', 'type', '2024-02-14 03:42:44', '2024-02-14 03:42:44'),
(3, 'all.state', 'web', 'state', '2024-02-16 14:41:13', '2024-02-16 14:41:13'),
(4, 'add.state', 'web', 'state', '2024-02-16 14:41:13', '2024-02-16 14:41:13'),
(5, 'add.blog', 'web', 'blog post', '2024-02-16 15:16:06', '2024-02-16 15:16:06'),
(6, 'edit.blog', 'web', 'blog post', '2024-02-16 15:16:21', '2024-02-16 15:16:21'),
(7, 'delete.blog', 'web', 'blog post', '2024-02-16 15:16:39', '2024-02-16 15:16:39'),
(8, 'all.blog', 'web', 'blog post', '2024-02-16 15:16:57', '2024-02-16 15:16:57'),
(9, 'update.blog', 'web', 'blog post', '2024-02-16 15:17:20', '2024-02-16 15:17:20'),
(10, 'type.menu', 'web', 'type', '2024-02-21 07:29:05', '2024-02-21 07:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `type_icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `type_name`, `type_icon`, `created_at`, `updated_at`) VALUES
(1, 'Apartment', 'Icon-1', NULL, '2024-02-06 12:49:13'),
(2, 'Office', 'Icon-2', NULL, NULL),
(3, 'Floor', 'Icon-3', NULL, NULL),
(4, 'Duplex', 'Icon-4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2024-02-16 15:11:13', '2024-02-16 15:11:13'),
(2, 'Admin', 'web', '2024-02-16 15:12:57', '2024-02-16 15:12:57'),
(4, 'Manager', 'web', '2024-02-16 15:13:16', '2024-02-16 15:13:16'),
(5, 'Sales', 'web', '2024-02-18 11:50:02', '2024-02-18 11:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(3, 5),
(4, 1),
(4, 2),
(4, 5),
(5, 1),
(5, 2),
(5, 4),
(6, 1),
(6, 2),
(6, 4),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(8, 4),
(9, 1),
(9, 2),
(9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` enum('admin','agent','user') NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$12$H.mZExe73lYs5baSIGevq.ROQJ2an6Thh42wzw0Uavvb3BN063y/q', '202402031710profile-aafa5d9d-c032-4a5d-ba59-12ff61f1e281-2021-11-09.jpg', '01758696945', 'Dhaka,Mohammadpur', 'admin', 'active', NULL, NULL, '2024-02-05 03:23:32'),
(2, 'Agent', 'agent', 'agent@gmail.com', NULL, '$2y$12$/5ruGf70mWwvAaIJIo7U.ezdAmAN1ozsKW6gDhzhwidv/SYP9KxCy', NULL, NULL, NULL, 'agent', 'active', NULL, NULL, NULL),
(3, 'User', 'user', 'user@gmail.com', NULL, '$2y$12$HNRY.7yLnbJT0wTHxDFnN.GoymHKv.jcRdyAeQeZfDKMvppfefhRG', NULL, NULL, NULL, 'user', 'active', NULL, NULL, NULL),
(4, 'Dr. Marcelina Bode', 'manager', 'zparisian@example.com', '2024-02-02 04:43:50', '$2y$12$fwUPXm/NsAxHrdFBlIgfOursr7kqs35uUHOkZuQaXIsc12iQMWd26', 'https://via.placeholder.com/60x60.png/000055?text=illum', '+1.820.769.3780', '3629 Yundt Neck Suite 901\nCarrollmouth, MI 89923', 'user', 'active', 'tECJGVxvpC', '2024-02-02 04:43:51', '2024-02-02 04:43:51'),
(5, 'Dr. Rasheed Cremin', NULL, 'quigley.leonora@example.net', '2024-02-02 04:43:51', '$2y$12$fwUPXm/NsAxHrdFBlIgfOursr7kqs35uUHOkZuQaXIsc12iQMWd26', 'https://via.placeholder.com/60x60.png/000011?text=accusamus', '+1-938-346-9313', '65035 Cleora Points Suite 213\nEast Jovaniborough, NY 93100', 'admin', 'active', '6vsQh0uyuQ', '2024-02-02 04:43:51', '2024-02-02 04:43:51'),
(6, 'Rosemary Hintz III', NULL, 'dorthy.schumm@example.com', '2024-02-02 04:43:51', '$2y$12$fwUPXm/NsAxHrdFBlIgfOursr7kqs35uUHOkZuQaXIsc12iQMWd26', 'https://via.placeholder.com/60x60.png/00ff00?text=repellendus', '+1.812.436.0741', '350 Bryon Ports\nWest Brendan, AZ 47320-6470', 'admin', 'inactive', 'LFUuppTHQI', '2024-02-02 04:43:51', '2024-02-02 04:43:51'),
(7, 'Cory Hyatt', NULL, 'spencer.kub@example.com', '2024-02-02 04:43:51', '$2y$12$fwUPXm/NsAxHrdFBlIgfOursr7kqs35uUHOkZuQaXIsc12iQMWd26', 'https://via.placeholder.com/60x60.png/00ffcc?text=officiis', '(681) 602-1607', '40478 Buddy Ridge\nElishahaven, HI 05675-8615', 'admin', 'inactive', 'zEAHDneCgG', '2024-02-02 04:43:51', '2024-02-02 04:43:51'),
(8, 'Jackson Nikolaus', NULL, 'hklein@example.net', '2024-02-02 04:43:51', '$2y$12$fwUPXm/NsAxHrdFBlIgfOursr7kqs35uUHOkZuQaXIsc12iQMWd26', 'https://via.placeholder.com/60x60.png/00eeaa?text=repudiandae', '(662) 920-4478', '85687 Hollis Harbor Suite 031\nLake Mozelle, IL 02859-2181', 'admin', 'inactive', 'qPRbVOXtEO', '2024-02-02 04:43:51', '2024-02-02 04:43:51'),
(9, 'Corbin Prosacco', NULL, 'alfred79@example.com', '2024-02-02 04:43:51', '$2y$12$fwUPXm/NsAxHrdFBlIgfOursr7kqs35uUHOkZuQaXIsc12iQMWd26', 'https://via.placeholder.com/60x60.png/007733?text=architecto', '954.950.9203', '6656 Cassie Road\nWest Dannieville, OH 85705', 'user', 'active', 'wuH51bjulf', '2024-02-02 04:43:51', '2024-02-02 04:43:51'),
(10, 'Sibyl Kertzmann', NULL, 'leola.goyette@example.org', '2024-02-02 04:43:51', '$2y$12$fwUPXm/NsAxHrdFBlIgfOursr7kqs35uUHOkZuQaXIsc12iQMWd26', 'https://via.placeholder.com/60x60.png/003377?text=possimus', '(930) 515-3119', '3349 Deondre Circle\nNorth Brentburgh, OK 44395', 'agent', 'inactive', 'uHZ1bfIGXG', '2024-02-02 04:43:51', '2024-02-02 04:43:51'),
(11, 'Naomie Schroeder', NULL, 'ycarroll@example.net', '2024-02-02 04:43:51', '$2y$12$fwUPXm/NsAxHrdFBlIgfOursr7kqs35uUHOkZuQaXIsc12iQMWd26', 'https://via.placeholder.com/60x60.png/00bb22?text=ducimus', '+1.956.783.5022', '384 Reggie Dam\nNorth Rubiefort, NY 87966', 'user', 'active', '1K975l1AvR', '2024-02-02 04:43:51', '2024-02-02 04:43:51'),
(12, 'Ashlynn McDermott', NULL, 'cheyanne35@example.com', '2024-02-02 04:43:51', '$2y$12$fwUPXm/NsAxHrdFBlIgfOursr7kqs35uUHOkZuQaXIsc12iQMWd26', 'https://via.placeholder.com/60x60.png/00ccaa?text=dolor', '1-386-995-8690', '432 Reinger Trail\nBrianaville, UT 62541-9108', 'user', 'active', 'M7iRuxbJn0', '2024-02-02 04:43:51', '2024-02-02 04:43:51'),
(13, 'Leatha Schoen', NULL, 'tressa51@example.com', '2024-02-02 04:43:51', '$2y$12$fwUPXm/NsAxHrdFBlIgfOursr7kqs35uUHOkZuQaXIsc12iQMWd26', 'https://via.placeholder.com/60x60.png/0033dd?text=veritatis', '404-786-4546', '55250 Greenholt Stream\nLake Rowlandborough, CO 74899', 'admin', 'active', 'Dgg8coAof7', '2024-02-02 04:43:51', '2024-02-02 04:43:51'),
(23, 'Admin', 'Reza Vai', 'reza@gmail.com', NULL, '$2a$12$A873kcmv2FvFK5P6Dje7fe6iypvbwrdA0Mi7JUhy5GIe9bAQfVv/2', NULL, '0987654321', 'Dhaka', 'admin', 'active', NULL, '2024-02-21 02:48:24', '2024-02-21 04:12:17'),
(25, 'Mr. Sadik', 'Mr. Sadik', 'sadik@gmail.com', NULL, '$2y$12$nlwjRUOPbHFL4WA0MoUiHeicMG/vlH2W9YMlVBIzJAVT5ejomrCX2', NULL, '01920232323', 'Dhaka', 'admin', 'active', NULL, '2024-02-21 06:03:52', '2024-02-21 06:03:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
