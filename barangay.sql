-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 06:04 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barangay`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `name`, `module`, `action`, `url`, `ip`, `agent`, `created_at`, `updated_at`) VALUES
(684238015, 684237976, 'Super Admin', 'User', 'User Login', 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '2023-05-16 11:53:34', '2023-05-16 11:53:34'),
(684238082, 684237976, 'Super Admin', 'Resident', 'Added new Resident - Berse, Jhon Ivan', 'http://127.0.0.1:8000/residents', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '2023-05-16 11:54:41', '2023-05-16 11:54:41'),
(684242875, 684237976, 'Super Admin', 'Resident', 'Added new Resident - Romanos, John Michael', 'http://127.0.0.1:8000/residents', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '2023-05-16 13:14:34', '2023-05-16 13:14:34'),
(684263656, 684237976, 'Super Admin', 'User', 'User Logout', 'http://127.0.0.1:8000/logout', '127.0.0.1', NULL, '2023-05-16 19:00:55', '2023-05-16 19:00:55'),
(684265431, 684237976, 'Super Admin', 'User', 'User Login', 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '2023-05-16 19:30:30', '2023-05-16 19:30:30'),
(684265439, 684237976, 'Super Admin', 'User', 'User Logout', 'http://127.0.0.1:8000/logout', '127.0.0.1', NULL, '2023-05-16 19:30:38', '2023-05-16 19:30:38'),
(684265449, 684237976, 'Super Admin', 'User', 'User Login', 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '2023-05-16 19:30:48', '2023-05-16 19:30:48'),
(684289184, 684237976, 'Super Admin', 'User', 'User Login', 'http://127.0.0.1:8000/login', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '2023-05-17 02:06:23', '2023-05-17 02:06:23'),
(684292882, 684237976, 'Super Admin', 'Resident', 'Update Resident Information - BERSE, JHON IVAN', 'http://127.0.0.1:8000/residents/1', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '2023-05-17 03:08:01', '2023-05-17 03:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `barangays`
--

CREATE TABLE `barangays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Kitaotao',
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Bukidnon',
  `postal_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '8709',
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_add` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangays`
--

INSERT INTO `barangays` (`id`, `barangay`, `municipality`, `province`, `postal_id`, `phone_number`, `email_add`, `image`, `created_at`, `updated_at`) VALUES
(1001, 'P-1', 'Kitaotao', 'Bukidnon', '2811', NULL, NULL, 'male.jpg', '2023-05-16 11:52:55', '2023-05-17 03:03:07'),
(1002, 'P-2', 'Kitaotao', 'Bukidnon', '2811', NULL, NULL, 'male.jpg', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(1003, 'P-3', 'Kitaotao', 'Bukidnon', '2811', NULL, NULL, 'male.jpg', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(1004, 'P-4', 'Kitaotao', 'Bukidnon', '2811', NULL, NULL, 'male.jpg', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(1005, 'P-5', 'Kitaotao', 'Bukidnon', '2811', NULL, NULL, 'male.jpg', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(1006, 'P-6', 'Kitaotao', 'Bukidnon', '2811', NULL, NULL, 'male.jpg', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(1007, 'P-7', 'Kitaotao', 'Bukidnon', '2811', NULL, NULL, 'male.jpg', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(1008, 'P-8', 'Kitaotao', 'Bukidnon', '2811', NULL, NULL, 'male.jpg', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(1009, 'P-12', 'Kitaotao', 'Bukidnon', '8709', NULL, NULL, NULL, '2023-05-17 02:56:01', '2023-05-17 03:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_officials`
--

CREATE TABLE `barangay_officials` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangay_officials`
--

INSERT INTO `barangay_officials` (`id`, `name`, `position`, `updated_at`, `created_at`) VALUES
(2, 'Sarah Duterte', 'Secretary', '2023-05-17', '0000-00-00'),
(4, 'Rodrigo Duterte', 'Barangay Captain', '2023-05-17', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_03_065304_create_activity_logs_table', 1),
(6, '2022_12_03_065327_create_barangays_table', 1),
(7, '2022_12_03_065343_create_barangay_officials_table', 1),
(8, '2022_12_03_065356_create_files_table', 1),
(9, '2022_12_03_065410_create_residents_table', 1),
(10, '2022_12_03_065423_create_resident_sectors_table', 1),
(11, '2022_12_03_065436_create_sectors_table', 1),
(12, '2022_12_14_130845_create_user_roles_table', 1),
(13, '2023_05_17_010016_create_settings_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE `residents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `household_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sitio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barangay_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `residents`
--

INSERT INTO `residents` (`id`, `household_no`, `firstname`, `middlename`, `lastname`, `suffix`, `birth_date`, `gender`, `phone_number`, `sitio`, `barangay_id`, `created_at`, `updated_at`, `status`) VALUES
(1, '1111', 'JHON IVAN', '', 'BERSE', '', '1999-02-16', 'M', NULL, '', 1001, '2023-05-16 11:54:41', '2023-05-17 03:08:01', 1),
(2, '2132', 'JOHN MICHAEL', '', 'ROMANOS', '', '1994-02-14', 'M', NULL, '', 1003, '2023-05-16 13:14:34', '2023-05-16 13:14:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `resident_sectors`
--

CREATE TABLE `resident_sectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resident_id` bigint(20) UNSIGNED NOT NULL,
  `sector_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resident_sectors`
--

INSERT INTO `resident_sectors` (`id`, `resident_id`, `sector_id`, `created_at`, `updated_at`) VALUES
(1, 1, 20220010, '2023-05-17 03:08:01', '2023-05-17 03:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sector` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`id`, `sector`, `created_at`, `updated_at`) VALUES
(20220001, 'FAMILY HEAD', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(20220002, 'FARMER', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(20220003, 'HOUSEHOLD HEAD', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(20220004, 'OFW', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(20220005, 'OUT OF SCHOOL YOUTH', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(20220006, 'PWD', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(20220007, 'SENIOR CITIZEN', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(20220008, 'SOLO PARENT', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(20220009, '4Ps', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(20220010, 'BUSINESS OWNER', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(20220011, 'CHILDREN', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(20220012, 'WOMEN', '2023-05-16 11:52:55', '2023-05-16 11:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Bolocaon', '/storage/logos/YqMqpCeG09tWL74UGUGpuPHblNq1CWJUAK7tcJAb.png', NULL, '2023-05-16 17:53:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `barangay`, `usertype`, `username`, `password`, `status`, `image`, `online`, `remember_token`, `created_at`, `updated_at`) VALUES
(684237976, 'Super Admin', NULL, 'admin', 'super-admin', '$2y$10$iBkaWBqRZXnap7BfyNcwPewLeRov1maKh92zpf/iBlQD/QxEepqvi', 1, 'male.jpg', 1, NULL, '2023-05-16 11:52:55', '2023-05-16 19:30:48'),
(684237977, 'Admin Admin', NULL, 'admin', 'admin', '$2y$10$rYjMirdb0O2/glEN2lEHL.RaOQUxeibLzvPcb9/J1vbeuFzaYmTTa', 1, 'male.jpg', 0, NULL, '2023-05-16 11:52:55', '2023-05-16 11:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `usertype`, `created_at`, `updated_at`) VALUES
(684237976, 'admin', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(684237977, 'department-mdrrmo', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(684237978, 'department-dswdo', '2023-05-16 11:52:55', '2023-05-16 11:52:55'),
(684237979, 'barangay', '2023-05-16 11:52:55', '2023-05-16 11:52:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `barangays`
--
ALTER TABLE `barangays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangay_officials`
--
ALTER TABLE `barangay_officials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `residents_barangay_id_foreign` (`barangay_id`);

--
-- Indexes for table `resident_sectors`
--
ALTER TABLE `resident_sectors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resident_sectors_resident_id_foreign` (`resident_id`),
  ADD KEY `resident_sectors_sector_id_foreign` (`sector_id`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=684292883;

--
-- AUTO_INCREMENT for table `barangays`
--
ALTER TABLE `barangays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1010;

--
-- AUTO_INCREMENT for table `barangay_officials`
--
ALTER TABLE `barangay_officials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resident_sectors`
--
ALTER TABLE `resident_sectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20220013;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=684237978;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=684237980;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `residents`
--
ALTER TABLE `residents`
  ADD CONSTRAINT `residents_barangay_id_foreign` FOREIGN KEY (`barangay_id`) REFERENCES `barangays` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `resident_sectors`
--
ALTER TABLE `resident_sectors`
  ADD CONSTRAINT `resident_sectors_resident_id_foreign` FOREIGN KEY (`resident_id`) REFERENCES `residents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resident_sectors_sector_id_foreign` FOREIGN KEY (`sector_id`) REFERENCES `sectors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
