-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2023 at 10:24 AM
-- Server version: 10.6.12-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intan_net`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `log` text DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `log`, `name`, `created_at`, `updated_at`) VALUES
(15, 'AndiR', 'Menambah data Provider', 'Indihome', '2023-11-18 05:36:40', '2023-11-18 05:36:40'),
(18, 'AndiR', 'Menambah data Service', 'Residential 10Mbps', '2023-11-18 05:55:11', '2023-11-18 05:55:11'),
(27, 'AndiR', 'Mengubah status customer Andi tes2 menjadi', 'active', '2023-11-18 11:20:58', '2023-11-18 11:20:58'),
(29, 'AndiR', 'Mengubah service customer Andi tes2 menjadi', 'Residential 5Mbps', '2023-11-18 11:28:21', '2023-11-18 11:28:21'),
(30, 'AndiR', 'Mengubah status customer Andi tes2 menjadi', 'block_access', '2023-11-18 11:28:51', '2023-11-18 11:28:51'),
(37, 'AndiR', 'Mengubah data Infrastructure', 'Mikrotik Bungku', '2023-11-18 12:23:47', '2023-11-18 12:23:47'),
(38, 'AndiR', 'Mengubah data Infrastructure', 'Mikrotik Bungku', '2023-11-18 12:24:44', '2023-11-18 12:24:44'),
(41, 'AndiR', 'Mengubah data infrastructure', 'Mikrotik Bungku', '2023-11-18 12:31:24', '2023-11-18 12:31:24'),
(42, 'AndiR', 'Menghapus data Provider', 'Indihome', '2023-11-18 15:35:07', '2023-11-18 15:35:07'),
(43, 'AndiR', 'Menambah data Provider', 'Indihome', '2023-11-18 15:38:40', '2023-11-18 15:38:40'),
(44, 'AndiR', 'Menghapus customer', 'Andi tes2', '2023-11-18 15:39:40', '2023-11-18 15:39:40'),
(45, 'AndiR', 'Menambah data Customer', 'Andi tes', '2023-11-18 15:41:09', '2023-11-18 15:41:09'),
(46, 'AndiR', 'Menambah data Provider', 'Indihome', '2023-11-18 15:47:49', '2023-11-18 15:47:49'),
(47, 'AndiR', 'Mengubah data Provider', 'Indihome', '2023-11-18 15:49:30', '2023-11-18 15:49:30'),
(48, 'AndiR', 'Menambah data Provider', 'Indihome', '2023-11-18 15:49:55', '2023-11-18 15:49:55'),
(49, 'AndiR', 'Menghapus data Provider', 'Indihome', '2023-11-18 15:53:53', '2023-11-18 15:53:53'),
(50, 'AndiR', 'Mengubah data Provider', 'Indihome', '2023-11-18 15:56:58', '2023-11-18 15:56:58'),
(51, 'AndiR', 'Mengubah data service', 'Residential 5Mbps', '2023-11-18 16:08:07', '2023-11-18 16:08:07'),
(52, 'AndiR', 'Menghapus data service', 'Corporate 10Mbps', '2023-11-18 16:14:28', '2023-11-18 16:14:28'),
(54, 'AndiR', 'Mengubah data BTS/Tower', 'tes', '2023-11-18 16:40:53', '2023-11-18 16:40:53'),
(55, 'AndiR', 'Menghapus data Provider', 'Indihome', '2023-11-18 16:41:11', '2023-11-18 16:41:11'),
(56, 'AndiR', 'Menghapus data BTS/Tower', 'tes', '2023-11-18 16:41:24', '2023-11-18 16:41:24'),
(57, 'AndiR', 'Mengubah status customer Andi tes menjadi', 'Block_access', '2023-11-18 16:45:09', '2023-11-18 16:45:09'),
(58, 'AndiR', 'Mengubah status customer Andi tes menjadi', 'Active', '2023-11-19 03:54:33', '2023-11-19 03:54:33'),
(59, 'AndiR', 'Menambah data Customer', 'sdd', '2023-11-19 09:46:54', '2023-11-19 09:46:54'),
(60, 'AndiR', 'Menghapus customer', 'sdd', '2023-11-19 09:47:59', '2023-11-19 09:47:59');

-- --------------------------------------------------------

--
-- Table structure for table `bts`
--

CREATE TABLE `bts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bts`
--

INSERT INTO `bts` (`id`, `name`, `alamat`, `telepon`, `pic`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'Tower Bungku', 'Bahomohoni, Bungku Tengah, Morowali Sulawesi Tengah', '0', '-', '-2.4720073', '121.9299893', '2023-11-15 03:05:53', '2023-11-15 03:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_customer` varchar(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `service` bigint(20) UNSIGNED NOT NULL,
  `alamat` text NOT NULL,
  `pic` varchar(255) NOT NULL DEFAULT 'None',
  `phone` varchar(255) NOT NULL DEFAULT 'None',
  `tower` bigint(20) UNSIGNED NOT NULL,
  `media` varchar(20) NOT NULL,
  `access_point` varchar(255) NOT NULL,
  `radio` varchar(255) NOT NULL,
  `ip_address_radio` varchar(255) NOT NULL,
  `username_radio` varchar(255) NOT NULL,
  `password_radio` varchar(255) NOT NULL,
  `router` varchar(255) NOT NULL,
  `ip_address_router` varchar(255) NOT NULL,
  `username_router` varchar(255) NOT NULL,
  `password_router` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `id_customer`, `name`, `status`, `service`, `alamat`, `pic`, `phone`, `tower`, `media`, `access_point`, `radio`, `ip_address_radio`, `username_radio`, `password_radio`, `router`, `ip_address_router`, `username_router`, `password_router`, `created_at`, `updated_at`) VALUES
(35, '202300001', 'Andi tes', 'Active', 2, 'Jl. Swadaya', 'Andi tes', '082154195491', 1, 'FO', '172.16.1.2', 'Powerbeam M5', '172.16.1.3', 'admin123', 'admin123', 'TP-Link', '10.10.10.254', 'admin123', 'admin123', '2023-11-18 15:41:09', '2023-11-19 03:54:32');

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
-- Table structure for table `infrastrukturs`
--

CREATE TABLE `infrastrukturs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hostname` varchar(255) NOT NULL,
  `device_type` varchar(255) NOT NULL,
  `sn` varchar(255) NOT NULL,
  `location` bigint(20) UNSIGNED NOT NULL,
  `model` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `infrastrukturs`
--

INSERT INTO `infrastrukturs` (`id`, `hostname`, `device_type`, `sn`, `location`, `model`, `ip_address`, `username`, `password`, `created_at`, `updated_at`) VALUES
(2, 'Mikrotik Bungku', 'Router', 'None', 1, 'RB 750gr3', '192.168.1.2', 'admin123', 'admin123', '2023-11-15 07:59:35', '2023-11-18 12:31:24');

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
(5, '2023_11_12_053112_create_roles_table', 1),
(6, '2023_11_12_053355_add_role_id_column_to_users_table', 2),
(7, '2023_11_12_155004_create_service_table', 3),
(8, '2023_11_15_080821_create_bts_table', 4),
(9, '2023_11_15_111112_create_infrastruktur_table', 5),
(10, '2023_11_16_043139_create_customers_table', 6),
(11, '2023_11_17_054547_create_providers_table', 7),
(12, '2023_11_17_153607_create_activity_logs_table', 8);

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
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `name`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(18, 'Indihome', '188', 'customercare@telkom.co.id', '2023-11-18 15:38:40', '2023-11-18 15:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'guest', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `upload` varchar(255) NOT NULL,
  `download` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `group`, `upload`, `download`, `created_at`, `updated_at`) VALUES
(2, 'Corporate 5Mbps', 'Corporate', '5', '5', '2023-11-14 23:54:47', '2023-11-14 23:54:47'),
(3, 'Residential 5Mbps', 'SMB', '5', '3', '2023-11-16 21:36:09', '2023-11-18 16:08:07'),
(9, 'Residential 10Mbps', 'Residential', '10', '3', '2023-11-18 05:55:11', '2023-11-18 05:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'inactive',
  `last_seen` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `status`, `last_seen`) VALUES
(1, 'AndiR', 'andirahmanirahim@gmail.com', NULL, '$2y$12$OBXws7QKeJ1EHCJdDKz.iu8kLNyVtAqojbM9P8L1Or4HZUGzXkSY6', NULL, '2023-11-12 01:14:45', '2023-11-19 13:25:15', 1, 'active', '2023-11-19 13:25:15'),
(7, 'Guest', 'guest@gmail.com', NULL, '$2y$12$d9SF5LNrkaTC6fnmrM2HgeuAmKm6V.6WNga1Mi/XULsTSNq0p6GOO', NULL, '2023-11-19 11:38:37', '2023-11-19 12:35:53', 2, 'active', '2023-11-19 12:35:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bts`
--
ALTER TABLE `bts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_service_foreign` (`service`),
  ADD KEY `customers_tower_foreign` (`tower`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `infrastrukturs`
--
ALTER TABLE `infrastrukturs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infrastruktur_location_foreign` (`location`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `bts`
--
ALTER TABLE `bts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infrastrukturs`
--
ALTER TABLE `infrastrukturs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_service_foreign` FOREIGN KEY (`service`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `customers_tower_foreign` FOREIGN KEY (`tower`) REFERENCES `bts` (`id`);

--
-- Constraints for table `infrastrukturs`
--
ALTER TABLE `infrastrukturs`
  ADD CONSTRAINT `infrastruktur_location_foreign` FOREIGN KEY (`location`) REFERENCES `bts` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
