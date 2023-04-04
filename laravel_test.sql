-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2023 at 06:22 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_test`
--

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
-- Table structure for table `forms_tables`
--

CREATE TABLE `forms_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms_tables`
--

INSERT INTO `forms_tables` (`id`, `user_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '2023-04-04 05:44:44', '2023-04-04 05:44:44');

-- --------------------------------------------------------

--
-- Table structure for table `form_detail_tables`
--

CREATE TABLE `form_detail_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `form_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `other_name` varchar(255) DEFAULT NULL,
  `other_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_detail_tables`
--

INSERT INTO `form_detail_tables` (`id`, `form_id`, `product_id`, `description`, `type`, `other_name`, `other_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ขอแผ่นรองเม้า', 1, NULL, NULL, '2023-04-04 05:44:44', '2023-04-04 05:44:44'),
(2, 1, 5, 'ขอบลูสวิช', 1, NULL, NULL, '2023-04-04 05:44:44', '2023-04-04 05:44:44'),
(3, 1, 9, 'ขอจอ IPS', 1, NULL, NULL, '2023-04-04 05:44:44', '2023-04-04 05:44:44'),
(4, 1, 10, 'ขอ Hz เยอะๆ', 1, NULL, NULL, '2023-04-04 05:44:44', '2023-04-04 05:44:44'),
(5, 1, NULL, 'ขอยี่ห้อง LG', 2, 'จอเล่นเกม 144Hz', '5600.00', '2023-04-04 05:44:44', '2023-04-04 05:44:44');

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
(5, '2023_04_03_074906_create_product_category_tables_table', 1),
(6, '2023_04_03_074914_create_products_tables_table', 1),
(7, '2023_04_03_074929_create_forms_tables_table', 1),
(8, '2023_04_03_074938_create_form_detail_tables_table', 1);

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
-- Table structure for table `products_tables`
--

CREATE TABLE `products_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `ProductPrice` decimal(10,2) NOT NULL,
  `ProductStatus` int(11) NOT NULL DEFAULT 1,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_tables`
--

INSERT INTO `products_tables` (`id`, `ProductName`, `ProductPrice`, `ProductStatus`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'เมาส์ Logitech Wired Mouse M100R USB (Box)', '199.00', 1, 1, NULL, NULL),
(2, 'เมาส์ไร้สาย Logitech Bluetooth Mouse MX Master 3S Graphite', '4190.00', 0, 1, NULL, NULL),
(3, 'เมาส์ไร้สาย Logitech Bluetooth Vertical Mouse Lift Black', '2190.00', 0, 1, NULL, NULL),
(4, 'เมาส์ไร้สาย Logitech Signature M650 Graphite', '1090.00', 1, 1, NULL, NULL),
(5, 'คีย์บอร์ด Logitech Bluetooth Keyboard MX Keys', '4490.00', 0, 2, NULL, NULL),
(6, 'คีย์บอร์ด Logitech Bluetooth Keyboard Multi-Device', '1299.00', 0, 2, NULL, NULL),
(7, 'คีย์บอร์ดไร้สาย Logitech Bluetooth Keyboard POP', '3690.00', 1, 2, NULL, NULL),
(8, 'คีย์บอร์ดเกมมิ่ง Logitech Gaming Keyboard G Pro', '4190.00', 1, 2, NULL, NULL),
(9, 'LG TV OLED55C1PTB', '69990.00', 0, 3, NULL, NULL),
(10, 'SAMSUNG TV UHD 4K UA65AU8100KXXT 65 inch', '26990.00', 0, 3, NULL, NULL),
(11, 'LG TV NanoCell 4K 43NANO75TPA 43 inch', '8990.00', 1, 3, NULL, NULL),
(12, 'Xiaomi Mi TV P1 32 inch Black', '4990.00', 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_category_tables`
--

CREATE TABLE `product_category_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `CategoryMaxRequest` int(11) NOT NULL DEFAULT 1,
  `CategoryStatus` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category_tables`
--

INSERT INTO `product_category_tables` (`id`, `CategoryName`, `CategoryMaxRequest`, `CategoryStatus`, `created_at`, `updated_at`) VALUES
(1, 'เมาส์', 2, 1, NULL, '2023-04-04 07:41:19'),
(2, 'คีย์บอร์ด', 1, 1, NULL, NULL),
(3, 'จอมอนิเตอร์', -1, 1, NULL, NULL),
(4, 'หูฟัง', 1, 0, NULL, NULL),
(5, 'โต๊ะ', 1, 0, NULL, NULL),
(6, 'เก้าอี้', 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', '2023-04-04 05:40:17', '$2y$10$T.HpxO0kHORAoYzPlCuePu/OFJTC7BDf4KaTdmJALho807LRlyK4S', 'KGps3DytXyRrWjQCco2HK0mn5CU7emeP0o2Iawr8sqo2uhjZAAAhVHyfy8QW', '2023-04-04 05:40:17', '2023-04-04 05:40:17'),
(2, 0, 'Prof. Ronaldo Sanford IV', 'evalyn65@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7zF5rvFqky', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(3, 0, 'Jamir Connelly DDS', 'amara44@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uREe7jq3cX', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(4, 0, 'Prof. Kali Kling', 'albert87@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'E7urudlrqp', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(5, 0, 'Autumn Jacobi', 'yasmin.kozey@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Q3cDIRsXNR', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(6, 0, 'Elnora Lebsack', 'bahringer.lottie@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8iwdxvgl1X', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(7, 0, 'Dewayne Swift V', 'bradly41@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WCxCQyl1Cd', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(8, 0, 'Dr. Werner Fritsch', 'mbarrows@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hxX8gmnEpi', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(9, 0, 'Mr. Mackenzie Auer DDS', 'brendon.eichmann@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9Kr98gK0AX', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(10, 0, 'Elmore O\'Connell I', 'mfranecki@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jNnedBj90l', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(11, 0, 'Sophie Jones', 'demarcus98@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'D4NN4qWjGR', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(12, 0, 'Dr. Federico Balistreri I', 'hilario.fritsch@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'f7Y3T7qFmq', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(13, 0, 'Dorris Kshlerin', 'rico.zemlak@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'E2F5tZnxxb', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(14, 0, 'Dr. Enrique Price', 'aufderhar.kacie@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uhH1Di8wXr', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(15, 0, 'Antwon Hansen', 'adrianna93@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YELZ4RhdFu', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(16, 0, 'Yasmine Von', 'ernestine.pfannerstill@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gcEmGDBYa4', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(17, 0, 'Domenick West', 'dahlia65@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'I8v8wdUHa7', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(18, 0, 'Dr. Jakob Nitzsche III', 'neil46@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vGq4zBXjg0', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(19, 0, 'Burdette Kreiger', 'gottlieb.lexie@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gdXF6Q6Tsu', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(20, 0, 'Janet Brekke', 'brice.thompson@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'n5hnPmr9r9', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(21, 0, 'Dr. Markus Wunsch', 'nickolas45@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7XmE1X9Zcm', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(22, 0, 'Raina Ortiz', 'leilani80@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'maQ38B3VR6', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(23, 0, 'Anabel Green', 'jorge.bartell@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4fEoRwru3U', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(24, 0, 'Abagail Lowe Jr.', 'mcarroll@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PBHxF4cxiT', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(25, 0, 'Webster Conroy', 'kunde.rasheed@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6DXSHafg0C', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(26, 0, 'Destin Lebsack Sr.', 'stone.kuhn@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'lSEjge1k2Z', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(27, 0, 'Meagan Veum PhD', 'santiago12@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SDkM7AeeAC', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(28, 0, 'Prof. Elbert Wunsch', 'ymorissette@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WD6JqoWPV7', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(29, 0, 'Brad O\'Reilly IV', 'howell.rachel@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GmywtNpULp', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(30, 0, 'Bud Pouros', 'aschoen@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PawOH19MCM', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(31, 0, 'Dana Hilpert', 'nona65@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'riEyNOCXaW', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(32, 0, 'Estrella Wisozk', 'schulist.monique@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Xw8Pnct9Bt', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(33, 0, 'Eliane Hahn MD', 'xhamill@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'aHFqAJtJX2', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(34, 0, 'Antonio Glover', 'jessyca.donnelly@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AvXFrsJNTa', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(35, 0, 'Donny Leffler', 'ceasar45@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jkg6s5R5aw', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(36, 0, 'Brianne Hoppe', 'stephanie64@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6VSOD9znAp', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(37, 0, 'Zachariah Sporer DDS', 'kassandra29@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9QVUqxwdjI', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(38, 0, 'Cassandra Casper', 'qbradtke@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KyCdXPYxTJ', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(39, 0, 'Prof. Gregorio Denesik', 'fmacejkovic@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pKqzK2yngC', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(40, 0, 'Abraham Heller', 'wlebsack@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BOCQoTLPHq', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(41, 0, 'D\'angelo Sipes', 'qziemann@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bg2jYQGCqe', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(42, 0, 'Naomi Sauer IV', 'leannon.orpha@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MzGYzwppdv', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(43, 0, 'Gail Kulas', 'charity39@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'etqZxbK8is', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(44, 0, 'Dr. Brenna Lesch', 'orie.walsh@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xBDJuDuqfo', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(45, 0, 'Cayla Streich', 'kennedi.watsica@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zcVY4P3r40', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(46, 0, 'Coy Hirthe III', 'rick.jaskolski@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'x9ijDXAdQK', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(47, 0, 'Wyman Smitham', 'elissa.okon@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'POMy2HAM6Z', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(48, 0, 'Lina Hettinger II', 'luella33@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'IJ9Zm3SLHK', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(49, 0, 'Kolby Collins II', 'pablo17@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cDAJXtS4HJ', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(50, 0, 'Cassandra Mayert', 'leffler.brenna@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ADeHqkA3T8', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(51, 0, 'Oral Hodkiewicz', 'scarlett.mcglynn@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8oGrCIIdpT', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(52, 0, 'Prof. Cydney Huels', 'krice@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pOsiPupXWx', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(53, 0, 'Anne Okuneva', 'swift.darion@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bJBzGA2qvn', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(54, 0, 'Angel Harris', 'xmohr@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'E4w34rRA8y', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(55, 0, 'Pierre Cruickshank', 'bstoltenberg@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vqbC4NdxSC', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(56, 0, 'Ms. Alia Feeney DVM', 'stefanie.okuneva@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'en1nEzxHyj', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(57, 0, 'Crystal Armstrong', 'ellie09@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xkMO2Ekyy9', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(58, 0, 'Adah Hintz', 'fwindler@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'fdJ0y2vIBP', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(59, 0, 'Cecil Stehr', 'ihowe@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QIau6dMPSb', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(60, 0, 'Jovany Abbott', 'deckow.adonis@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YXqjSkJGY8', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(61, 0, 'Forest Deckow', 'shanahan.marcel@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XDJsxHE1Ah', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(62, 0, 'Lucious Zemlak', 'caesar63@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3YZ4PjinZn', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(63, 0, 'Miss Chasity Osinski II', 'skiles.meta@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '08KNsACfjQ', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(64, 0, 'Alexzander Hagenes', 'heathcote.arthur@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4OhZtgFMjN', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(65, 0, 'Fernando Halvorson', 'marjory81@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8jWvn3sh6S', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(66, 0, 'Sofia Rosenbaum', 'brett19@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'i5E0s1USOc', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(67, 0, 'Prof. Verner Lemke', 'kreiger.angeline@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YpG3PPSRxi', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(68, 0, 'Emmitt Rempel', 'obalistreri@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'zuH6Fzuyma', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(69, 0, 'Raphaelle Schroeder', 'donnelly.sean@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dWOX1GjmBw', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(70, 0, 'Meggie Vandervort', 'jocelyn23@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AJdPYJAyLo', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(71, 0, 'Maryam Sporer', 'cara53@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TioHplu1qw', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(72, 0, 'Isai Runolfsson', 'ohara.demarco@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'F3Teu4dwoB', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(73, 0, 'Jaunita Schimmel', 'micaela.flatley@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uMkr3H0gDE', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(74, 0, 'Terrence Hessel MD', 'jada.green@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FmYc8CP43H', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(75, 0, 'Macie Dicki', 'clare74@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cZUhumGl2T', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(76, 0, 'Frank Schmeler', 'stracke.elian@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xbv7VxiGit', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(77, 0, 'Jena Dare', 'beer.karli@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VaUZ869mJe', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(78, 0, 'Elwyn Kuhic', 'favian66@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'eixAJjXiol', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(79, 0, 'Cooper Olson', 'flatley.robyn@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BzPBjDbQ76', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(80, 0, 'Emil Ledner', 'shuels@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JiCQVPSKwe', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(81, 0, 'Magnus Pfannerstill', 'eileen.hirthe@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'QMSUPaQqcc', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(82, 0, 'Abe Leuschke', 'melisa.corkery@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ZYWIlLojTv', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(83, 0, 'Blanca Beahan IV', 'slang@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '49HUrzAQrx', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(84, 0, 'Onie Padberg', 'zelda.hermiston@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KmKBky8F8o', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(85, 0, 'Emelie Kuhlman', 'sandy.fay@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'enwbTJc7iO', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(86, 0, 'Wilton Walsh III', 'fbahringer@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ty8CW5ka1Q', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(87, 0, 'Prof. Harry Kreiger', 'mfarrell@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SaKEKgrTbl', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(88, 0, 'Minnie Hansen', 'ozella.waters@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'So9Xm7t1sD', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(89, 0, 'Prof. Alize Bauch', 'luz.mueller@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ikmHJ2yHdP', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(90, 0, 'Bernadette Deckow', 'christopher.bosco@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mbBETNno5L', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(91, 0, 'Sadye Lindgren', 'jett39@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'eJjXIMg4gb', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(92, 0, 'Mrs. Bonnie Reichel', 'kianna.collins@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rug0GH3O63', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(93, 0, 'Ms. Julia Swaniawski I', 'keenan17@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cEAcbZHpyJ', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(94, 0, 'Efren Bahringer', 'rosanna56@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cwe4Tj3W9l', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(95, 0, 'Quinton Little', 'kessler.caleb@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3ltzIE4CPu', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(96, 0, 'Miss Suzanne Wisoky', 'abins@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8HufmO48Vp', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(97, 0, 'Carolina Leannon II', 'brandi28@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NhhxDSAIzD', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(98, 0, 'Moriah Zieme', 'jessika59@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3xe9KnslUr', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(99, 0, 'Amari Champlin', 'jlockman@example.com', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jeJOj8BIxz', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(100, 0, 'Mrs. Verlie Keebler IV', 'htorphy@example.net', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PjtTZunWdF', '2023-04-04 05:40:18', '2023-04-04 05:40:18'),
(101, 0, 'Hazel Bosco MD', 'pwaelchi@example.org', '2023-04-04 05:40:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Xqb126DYOl', '2023-04-04 05:40:18', '2023-04-04 05:40:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `forms_tables`
--
ALTER TABLE `forms_tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forms_tables_user_id_foreign` (`user_id`);

--
-- Indexes for table `form_detail_tables`
--
ALTER TABLE `form_detail_tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_detail_tables_form_id_foreign` (`form_id`),
  ADD KEY `form_detail_tables_product_id_foreign` (`product_id`);

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
-- Indexes for table `products_tables`
--
ALTER TABLE `products_tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_tables_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_category_tables`
--
ALTER TABLE `product_category_tables`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms_tables`
--
ALTER TABLE `forms_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_detail_tables`
--
ALTER TABLE `form_detail_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products_tables`
--
ALTER TABLE `products_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_category_tables`
--
ALTER TABLE `product_category_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forms_tables`
--
ALTER TABLE `forms_tables`
  ADD CONSTRAINT `forms_tables_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `form_detail_tables`
--
ALTER TABLE `form_detail_tables`
  ADD CONSTRAINT `form_detail_tables_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms_tables` (`id`),
  ADD CONSTRAINT `form_detail_tables_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products_tables` (`id`);

--
-- Constraints for table `products_tables`
--
ALTER TABLE `products_tables`
  ADD CONSTRAINT `products_tables_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_category_tables` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
