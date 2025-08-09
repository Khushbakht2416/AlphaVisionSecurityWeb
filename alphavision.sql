-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2025 at 03:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alphavision`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'null',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `profile_image` varchar(255) NOT NULL DEFAULT 'frontend/muqaddas.png',
  `about` varchar(255) NOT NULL DEFAULT 'null',
  `company` varchar(255) NOT NULL DEFAULT 'null',
  `job` varchar(255) NOT NULL DEFAULT 'null',
  `country` varchar(255) NOT NULL DEFAULT 'null',
  `address` varchar(255) NOT NULL DEFAULT 'null',
  `phone` varchar(255) NOT NULL DEFAULT 'null',
  `twitter` varchar(255) NOT NULL DEFAULT 'null',
  `facebook` varchar(255) NOT NULL DEFAULT 'null',
  `instagram` varchar(255) NOT NULL DEFAULT 'null',
  `linkedin` varchar(255) NOT NULL DEFAULT 'null',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `admin_id`, `profile_image`, `about`, `company`, `job`, `country`, `address`, `phone`, `twitter`, `facebook`, `instagram`, `linkedin`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'info@alphavisionsecurity.com.au', 'fatima', 1, 'frontend/img/profile_upload_1741973433.png', 'Security Company', 'AlphaVisionSecurity', 'Designer', 'Australia', '123', '+61 2 7229 6438', 'null', 'null', 'null', 'null', NULL, '2025-03-15 03:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT 'null',
  `email` varchar(100) NOT NULL DEFAULT 'null',
  `subject` varchar(100) NOT NULL DEFAULT 'null',
  `message` varchar(2000) NOT NULL DEFAULT 'null',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL DEFAULT 'none',
  `phone_number` varchar(25) NOT NULL DEFAULT 'none',
  `password` varchar(255) NOT NULL,
  `raw_password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference` varchar(100) NOT NULL DEFAULT 'null',
  `username` varchar(100) NOT NULL DEFAULT 'null',
  `email` varchar(200) NOT NULL DEFAULT 'null',
  `password` varchar(200) NOT NULL DEFAULT 'null',
  `securepassword` varchar(200) NOT NULL DEFAULT 'null',
  `tokenkey` varchar(200) NOT NULL DEFAULT 'null',
  `ipaddress` varchar(200) NOT NULL DEFAULT 'null',
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `reference`, `username`, `email`, `password`, `securepassword`, `tokenkey`, `ipaddress`, `status`, `created_at`, `updated_at`) VALUES
(1, '20250314_00000001', 'admin', 'khushbakhtf43@gmail.com', 'admin123', '0192023a7bbd73250516f069df18b500', 'null', '127.0.0.1', 1, NULL, '2025-03-14 12:31:16');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_14_052935_create_contact_table', 1),
(5, '2025_03_14_155440_create_login_table', 2),
(6, '2025_03_14_161034_create_admin_table', 3),
(7, '2025_03_15_064917_create_quote_table', 4),
(8, '2025_04_03_074845_create_customers_table', 5),
(9, '2025_04_03_084720_create_customers_table', 6),
(10, '2025_04_04_113053_create_sites_table', 7),
(11, '2025_04_04_173319_create_reports_table', 8),
(12, '2025_04_04_175620_create_notifications_table', 9),
(13, '2025_04_05_211850_create_customers_table', 10),
(14, '2025_04_20_061731_create_sites_table', 11),
(15, '2025_04_20_062255_create_site_emergency_contacts_table', 11),
(16, '2025_04_20_125605_create_sites_table', 12),
(17, '2025_04_20_125657_create_site_timing_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `notification_type` enum('hourly','incident') NOT NULL,
  `message` text NOT NULL,
  `notification_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('unread','read') NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT 'null',
  `email` varchar(100) NOT NULL DEFAULT 'null',
  `message` varchar(2000) NOT NULL DEFAULT 'null',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(4, 'Muhammad Sarwar', 'khushbakhtf43@gmail.com', 'qrefdsgsdgdgsdg', '2025-03-15 04:01:27', '2025-03-15 04:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `report_date` datetime NOT NULL,
  `report_type` enum('hourly','incident') NOT NULL,
  `description` text DEFAULT NULL,
  `token` varchar(50) NOT NULL DEFAULT 'none',
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `report_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`report_images`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6eoG7Wx49dBUVe6Lhqw7xXe6OnqR4yIIWa1SXcnU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YToxMDp7czo2OiJfdG9rZW4iO3M6NDA6InoyWnM1ZkFwVnRGc2l5YXNMS2lsam5POEc2cmo2Mk5wTVV2T2lRbFQiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMyOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY29udGFjdC11cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MjoiaWQiO2k6MTtzOjg6InVzZXJuYW1lIjtzOjU6IkFkbWluIjtzOjU6ImVtYWlsIjtzOjIzOiJraHVzaGJha2h0ZjQzQGdtYWlsLmNvbSI7czozOiJqb2IiO3M6ODoiRGVzaWduZXIiO3M6NToiaW1hZ2UiO3M6NDI6ImZyb250ZW5kL2ltZy9wcm9maWxlX3VwbG9hZF8xNzQxOTczNDMzLnBuZyI7czoxMDoiYWN0aXZlX3RhYiI7czo3OiJkZXRhaWxzIjtzOjg6ImN1c3RvbWVyIjtPOjMzOiJBcHBcTW9kZWxzXGZyb250ZW5kXEN1c3RvbWVyTW9kZWwiOjMyOntzOjEzOiIAKgBjb25uZWN0aW9uIjtzOjU6Im15c3FsIjtzOjg6IgAqAHRhYmxlIjtzOjk6ImN1c3RvbWVycyI7czoxMzoiACoAcHJpbWFyeUtleSI7czoyOiJpZCI7czoxMDoiACoAa2V5VHlwZSI7czozOiJpbnQiO3M6MTI6ImluY3JlbWVudGluZyI7YjoxO3M6NzoiACoAd2l0aCI7YTowOnt9czoxMjoiACoAd2l0aENvdW50IjthOjA6e31zOjE5OiJwcmV2ZW50c0xhenlMb2FkaW5nIjtiOjA7czoxMDoiACoAcGVyUGFnZSI7aToxNTtzOjY6ImV4aXN0cyI7YjoxO3M6MTg6Indhc1JlY2VudGx5Q3JlYXRlZCI7YjowO3M6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDtzOjEzOiIAKgBhdHRyaWJ1dGVzIjthOjE3OntzOjI6ImlkIjtpOjY7czo5OiJmdWxsX25hbWUiO3M6MTQ6Ik1VSEFNTUFEIFVTTUFOIjtzOjU6ImVtYWlsIjtzOjM5OiJmYTIxLWJjcy0wMjBAc3R1ZGVudHMuY3Vpc2FoaXdhbC5lZHUucGsiO3M6MTI6ImNvbXBhbnlfbmFtZSI7czoxNToiSHVzbmFpbiBDb21wYW55IjtzOjEyOiJwaG9uZV9udW1iZXIiO3M6MTE6IjAzMDc1OTk1MDc4IjtzOjg6InBhc3N3b3JkIjtzOjYwOiIkMnkkMTIkSlhKS3l0aFUyckdiaXpTaVFkLi5BT096M21SMi9IVzFNdkZKSTBZMVNpSDAydG1HUlJ0bGEiO3M6MTI6InJhd19wYXNzd29yZCI7czoxMjoiMTEyMjMzNDQ1NTY2IjtzOjc6ImFkZHJlc3MiO3M6Mzc6Ikdob3VzaWEgY2hvd2sgYWRkYSBnYW1iZXIgb2thcmEgY2FudHQiO3M6NDoiY2l0eSI7TjtzOjU6InN0YXRlIjtOO3M6ODoiemlwX2NvZGUiO047czo3OiJjb3VudHJ5IjtOO3M6MTM6InByb2ZpbGVfaW1hZ2UiO3M6MzU6ImxvZ2lucG9ydGFsL2Fzc2V0cy9pbWFnZXMvdXNlcjIucG5nIjtzOjk6ImlzX2FjdGl2ZSI7aToxO3M6MTQ6InJlbWVtYmVyX3Rva2VuIjtOO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjUtMDQtMTkgMTc6MzU6MTQiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjUtMDQtMTkgMTc6MzU6MTQiO31zOjExOiIAKgBvcmlnaW5hbCI7YToxNzp7czoyOiJpZCI7aTo2O3M6OToiZnVsbF9uYW1lIjtzOjE0OiJNVUhBTU1BRCBVU01BTiI7czo1OiJlbWFpbCI7czozOToiZmEyMS1iY3MtMDIwQHN0dWRlbnRzLmN1aXNhaGl3YWwuZWR1LnBrIjtzOjEyOiJjb21wYW55X25hbWUiO3M6MTU6Ikh1c25haW4gQ29tcGFueSI7czoxMjoicGhvbmVfbnVtYmVyIjtzOjExOiIwMzA3NTk5NTA3OCI7czo4OiJwYXNzd29yZCI7czo2MDoiJDJ5JDEyJEpYSkt5dGhVMnJHYml6U2lRZC4uQU9PejNtUjIvSFcxTXZGSkkwWTFTaUgwMnRtR1JSdGxhIjtzOjEyOiJyYXdfcGFzc3dvcmQiO3M6MTI6IjExMjIzMzQ0NTU2NiI7czo3OiJhZGRyZXNzIjtzOjM3OiJHaG91c2lhIGNob3drIGFkZGEgZ2FtYmVyIG9rYXJhIGNhbnR0IjtzOjQ6ImNpdHkiO047czo1OiJzdGF0ZSI7TjtzOjg6InppcF9jb2RlIjtOO3M6NzoiY291bnRyeSI7TjtzOjEzOiJwcm9maWxlX2ltYWdlIjtzOjM1OiJsb2dpbnBvcnRhbC9hc3NldHMvaW1hZ2VzL3VzZXIyLnBuZyI7czo5OiJpc19hY3RpdmUiO2k6MTtzOjE0OiJyZW1lbWJlcl90b2tlbiI7TjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI1LTA0LTE5IDE3OjM1OjE0IjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDI1LTA0LTE5IDE3OjM1OjE0Ijt9czoxMDoiACoAY2hhbmdlcyI7YTowOnt9czo4OiIAKgBjYXN0cyI7YTowOnt9czoxNzoiACoAY2xhc3NDYXN0Q2FjaGUiO2E6MDp7fXM6MjE6IgAqAGF0dHJpYnV0ZUNhc3RDYWNoZSI7YTowOnt9czoxMzoiACoAZGF0ZUZvcm1hdCI7TjtzOjEwOiIAKgBhcHBlbmRzIjthOjA6e31zOjE5OiIAKgBkaXNwYXRjaGVzRXZlbnRzIjthOjA6e31zOjE0OiIAKgBvYnNlcnZhYmxlcyI7YTowOnt9czoxMjoiACoAcmVsYXRpb25zIjthOjA6e31zOjEwOiIAKgB0b3VjaGVzIjthOjA6e31zOjEwOiJ0aW1lc3RhbXBzIjtiOjE7czoxMzoidXNlc1VuaXF1ZUlkcyI7YjowO3M6OToiACoAaGlkZGVuIjthOjE6e2k6MDtzOjg6InBhc3N3b3JkIjt9czoxMDoiACoAdmlzaWJsZSI7YTowOnt9czoxMToiACoAZmlsbGFibGUiO2E6MTM6e2k6MDtzOjk6ImZ1bGxfbmFtZSI7aToxO3M6NToiZW1haWwiO2k6MjtzOjg6InBhc3N3b3JkIjtpOjM7czoxMjoicmF3X3Bhc3N3b3JkIjtpOjQ7czoxMjoicGhvbmVfbnVtYmVyIjtpOjU7czo3OiJhZGRyZXNzIjtpOjY7czoxMjoiY29tcGFueV9uYW1lIjtpOjc7czo0OiJjaXR5IjtpOjg7czo1OiJzdGF0ZSI7aTo5O3M6ODoiemlwX2NvZGUiO2k6MTA7czo3OiJjb3VudHJ5IjtpOjExO3M6OToiaXNfYWN0aXZlIjtpOjEyO3M6MTM6InByb2ZpbGVfaW1hZ2UiO31zOjEwOiIAKgBndWFyZGVkIjthOjE6e2k6MDtzOjE6IioiO31zOjE5OiIAKgBhdXRoUGFzc3dvcmROYW1lIjtzOjg6InBhc3N3b3JkIjtzOjIwOiIAKgByZW1lbWJlclRva2VuTmFtZSI7czoxNDoicmVtZW1iZXJfdG9rZW4iO319', 1745239060),
('M7fbB1F8xWQwZWY3BzQv4SOrtGyAzM65j9izdQp4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoibnFvUk1PbXlVelV0YWx5bUowQ1VmVkN0WWI5M3g0TjQ5MUdtQlRadSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jdXN0b21lcnBvcnRhbC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MjoiaWQiO2k6MTtzOjg6InVzZXJuYW1lIjtzOjU6IkFkbWluIjtzOjU6ImVtYWlsIjtzOjIzOiJraHVzaGJha2h0ZjQzQGdtYWlsLmNvbSI7czozOiJqb2IiO3M6ODoiRGVzaWduZXIiO3M6NToiaW1hZ2UiO3M6NDI6ImZyb250ZW5kL2ltZy9wcm9maWxlX3VwbG9hZF8xNzQxOTczNDMzLnBuZyI7fQ==', 1745231755),
('OdMGK4Q6UnBYZxZa2LN9lZ1s4XTlfTr1szqFrd8x', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoib1ViblUyU3BwdWJlWElzd0FLMXA4b1d5TVZHOFZRNThCc3pEclZYciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jdXN0b21lcnBvcnRhbC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MjoiaWQiO2k6MTtzOjg6InVzZXJuYW1lIjtzOjU6IkFkbWluIjtzOjU6ImVtYWlsIjtzOjIzOiJraHVzaGJha2h0ZjQzQGdtYWlsLmNvbSI7czozOiJqb2IiO3M6ODoiRGVzaWduZXIiO3M6NToiaW1hZ2UiO3M6NDI6ImZyb250ZW5kL2ltZy9wcm9maWxlX3VwbG9hZF8xNzQxOTczNDMzLnBuZyI7czoxMDoiYWN0aXZlX3RhYiI7czo3OiJkZXRhaWxzIjt9', 1745234444);

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `emergency_protocol` text DEFAULT NULL,
  `no_of_cameras` int(11) DEFAULT NULL,
  `camera_software` varchar(255) DEFAULT NULL,
  `software_credentials` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_emergency_contacts`
--

CREATE TABLE `site_emergency_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `emergency_phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_timing`
--

CREATE TABLE `site_timing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_id` bigint(20) UNSIGNED NOT NULL,
  `day` enum('mon','tue','wed','thu','fri','sat','sun') NOT NULL,
  `is_24_hours` tinyint(1) NOT NULL DEFAULT 0,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`),
  ADD UNIQUE KEY `admin_admin_id_unique` (`admin_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_site_id_foreign` (`site_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sites_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `site_emergency_contacts`
--
ALTER TABLE `site_emergency_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `site_emergency_contacts_site_id_foreign` (`site_id`);

--
-- Indexes for table `site_timing`
--
ALTER TABLE `site_timing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `site_timing_site_id_foreign` (`site_id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_emergency_contacts`
--
ALTER TABLE `site_emergency_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_timing`
--
ALTER TABLE `site_timing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sites`
--
ALTER TABLE `sites`
  ADD CONSTRAINT `sites_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `site_emergency_contacts`
--
ALTER TABLE `site_emergency_contacts`
  ADD CONSTRAINT `site_emergency_contacts_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `site_timing`
--
ALTER TABLE `site_timing`
  ADD CONSTRAINT `site_timing_site_id_foreign` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
