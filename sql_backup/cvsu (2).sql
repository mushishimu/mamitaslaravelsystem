-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2024 at 08:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvsu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '$2y$12$2D2uvHs3gxVEw.5sawY1w.7zhMusPtj5K2/OQYn5N4k30iL0nZzP2', 'Admin', '2024-06-10 14:59:58', '2024-06-10 14:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `ticket`, `name`, `created_at`, `updated_at`) VALUES
(1, '1001', 'Jeric James', NULL, NULL),
(10, '1002', 'Dale', '2024-04-22 22:32:24', '2024-04-22 22:32:24'),
(11, '1003', 'Roy', '2024-04-22 23:26:09', '2024-04-22 23:26:09'),
(45, '1004', 'Mira', '2024-04-23 00:04:29', '2024-04-23 00:04:29'),
(46, '1005', 'Dale', '2024-04-23 00:06:24', '2024-04-23 00:06:24'),
(47, '1006', 'Gem', '2024-04-23 00:07:04', '2024-04-23 00:07:04'),
(48, '1007', 'jerald', '2024-04-23 00:09:09', '2024-04-23 00:09:09'),
(49, '1008', 'Krystle', '2024-04-23 00:10:58', '2024-04-23 00:10:58'),
(80, '1009', 'Olive', '2024-04-23 21:22:02', '2024-04-23 21:22:02'),
(81, '1010', 'Jerry', '2024-04-23 21:32:03', '2024-04-23 21:32:03'),
(82, '1011', 'Customer', '2024-04-23 22:43:01', '2024-04-23 22:43:01'),
(83, '1011', 'Customer', '2024-04-23 22:43:20', '2024-04-23 22:43:20'),
(84, '1012', 'Customer', '2024-04-28 07:57:32', '2024-04-28 07:57:32'),
(85, '1012', 'Customer', '2024-04-28 08:00:32', '2024-04-28 08:00:32'),
(86, '1013', 'Jeric Viernes', '2024-04-28 08:17:25', '2024-04-28 08:17:25'),
(87, '1014', 'Jeric Viernes', '2024-04-28 08:20:31', '2024-04-28 08:20:31'),
(88, '1015', 'Customer', '2024-04-28 08:20:51', '2024-04-28 08:20:51'),
(89, '1016', 'Andy', '2024-05-08 02:20:13', '2024-05-08 02:20:13'),
(90, '1017', 'Vicky', '2024-05-08 04:24:50', '2024-05-08 04:24:50'),
(91, '1018', 'Lorraine', '2024-05-08 04:26:03', '2024-05-08 04:26:03'),
(92, '1019', 'Lorraine', '2024-05-08 05:18:26', '2024-05-08 05:18:26'),
(93, '1020', 'Olive', '2024-05-09 13:04:14', '2024-05-09 13:04:14'),
(94, '1021', 'Pia', '2024-05-13 04:38:19', '2024-05-13 04:38:19'),
(95, '1021', 'Pia', '2024-05-13 04:40:57', '2024-05-13 04:40:57'),
(96, '1021', 'Pia', '2024-05-13 04:41:26', '2024-05-13 04:41:26'),
(97, '1021', 'Pia', '2024-05-13 04:42:36', '2024-05-13 04:42:36'),
(98, '1022', 'Pia', '2024-05-13 04:43:05', '2024-05-13 04:43:05'),
(99, '1021', 'Pia', '2024-05-13 04:50:22', '2024-05-13 04:50:22'),
(100, '1023', 'Lorraine', '2024-05-13 04:53:30', '2024-05-13 04:53:30'),
(101, '1024', 'Mira', '2024-05-13 04:56:42', '2024-05-13 04:56:42'),
(102, '1025', 'Customer', '2024-05-13 05:00:33', '2024-05-13 05:00:33'),
(103, '1026', 'Customer', '2024-05-13 05:25:55', '2024-05-13 05:25:55'),
(104, '1027', 'Dale', '2024-05-13 06:39:16', '2024-05-13 06:39:16'),
(105, '1028', 'Nick', '2024-05-15 14:35:01', '2024-05-15 14:35:01'),
(106, '1029', 'Nick', '2024-05-15 14:40:23', '2024-05-15 14:40:23'),
(107, '1029', 'Nick', '2024-05-15 14:41:59', '2024-05-15 14:41:59'),
(108, '1030', 'Nick', '2024-05-15 14:42:55', '2024-05-15 14:42:55'),
(109, '1031', 'Mike', '2024-05-15 14:43:26', '2024-05-15 14:43:26'),
(110, '1032', 'Luke', '2024-05-15 14:43:39', '2024-05-15 14:43:39'),
(111, '1033', 'Karina', '2024-05-15 14:43:54', '2024-05-15 14:43:54'),
(112, '1034', 'Customer', '2024-05-16 00:35:50', '2024-05-16 00:35:50'),
(113, '1035', 'Olive', '2024-05-16 01:26:44', '2024-05-16 01:26:44'),
(114, '1035', 'Olive', '2024-05-16 01:27:03', '2024-05-16 01:27:03'),
(115, '1036', 'Vicky', '2024-05-16 01:40:30', '2024-05-16 01:40:30'),
(116, '1037', 'Jeric', '2024-05-16 05:06:41', '2024-05-16 05:06:41'),
(117, '1038', 'Billy', '2024-05-16 12:16:53', '2024-05-16 12:16:53'),
(118, '1039', 'Alliah', '2024-05-16 12:24:09', '2024-05-16 12:24:09'),
(119, '1040', 'Mark', '2024-05-17 06:01:23', '2024-05-17 06:01:23'),
(120, '1041', 'Dale', '2024-05-17 06:07:52', '2024-05-17 06:07:52'),
(121, '1042', 'Mira', '2024-05-17 06:21:20', '2024-05-17 06:21:20'),
(122, '1043', 'Enid', '2024-05-17 07:27:09', '2024-05-17 07:27:09'),
(123, '1044', 'Lorraine', '2024-05-17 07:32:09', '2024-05-17 07:32:09'),
(124, '1045', 'Lorraine', '2024-05-17 09:15:35', '2024-05-17 09:15:35'),
(125, '1046', 'Vicky', '2024-05-17 09:22:46', '2024-05-17 09:22:46'),
(126, '1047', 'Job', '2024-05-18 04:51:03', '2024-05-18 04:51:03'),
(127, '1048', 'Nick', '2024-05-20 04:03:43', '2024-05-20 04:03:43'),
(128, '1049', 'Lorraine', '2024-05-20 04:22:54', '2024-05-20 04:22:54'),
(129, '1050', 'Pia', '2024-05-20 04:25:51', '2024-05-20 04:25:51'),
(130, '1051', 'Mira', '2024-05-20 04:29:19', '2024-05-20 04:29:19'),
(131, '1052', 'Vicky', '2024-05-20 04:30:28', '2024-05-20 04:30:28'),
(132, '1053', 'Mira', '2024-05-20 04:38:49', '2024-05-20 04:38:49'),
(133, '1054', 'Nick', '2024-05-20 04:46:00', '2024-05-20 04:46:00'),
(134, '1054', 'Nick', '2024-05-20 04:47:44', '2024-05-20 04:47:44'),
(135, '1055', 'Mira', '2024-05-20 05:11:41', '2024-05-20 05:11:41'),
(136, '1056', 'Roy', '2024-05-20 08:20:44', '2024-05-20 08:20:44'),
(137, '1057', 'Mira', '2024-05-21 05:14:35', '2024-05-21 05:14:35'),
(138, '1058', 'Customer', '2024-05-21 05:31:13', '2024-05-21 05:31:13'),
(139, '1059', 'Roy', '2024-05-21 05:32:07', '2024-05-21 05:32:07'),
(140, '1060', 'Customer', '2024-05-21 05:32:48', '2024-05-21 05:32:48'),
(141, '1061', 'Customer', '2024-05-21 05:35:58', '2024-05-21 05:35:58'),
(142, '1062', 'Customer', '2024-05-21 05:44:48', '2024-05-21 05:44:48'),
(143, '1063', 'Customer', '2024-05-21 05:45:47', '2024-05-21 05:45:47'),
(144, '1064', 'Olive', '2024-05-21 05:51:51', '2024-05-21 05:51:51'),
(145, '1065', 'Pia', '2024-05-21 05:52:04', '2024-05-21 05:52:04'),
(146, '1066', 'Vince', '2024-05-21 06:14:44', '2024-05-21 06:14:44'),
(147, '1067', 'Olive', '2024-05-21 06:15:13', '2024-05-21 06:15:13'),
(148, '1068', 'Olive', '2024-05-22 04:57:05', '2024-05-22 04:57:05'),
(149, '1069', 'Jeric', '2024-05-24 11:05:55', '2024-05-24 11:05:55'),
(150, '1070', 'Lorraine', '2024-05-24 15:08:00', '2024-05-24 15:08:00'),
(151, '1071', 'Vicky', '2024-05-24 15:08:31', '2024-05-24 15:08:31'),
(152, '1072', 'Patrick', '2024-05-25 02:29:28', '2024-05-25 02:29:28'),
(153, '1073', 'Olive', '2024-05-25 02:32:44', '2024-05-25 02:32:44'),
(154, '1074', 'Customer', '2024-05-26 12:33:21', '2024-05-26 12:33:21'),
(155, '1075', 'Olive', '2024-05-27 03:56:47', '2024-05-27 03:56:47'),
(156, '1076', 'Gem', '2024-05-29 10:30:57', '2024-05-29 10:30:57'),
(157, '1077', 'Customer', '2024-06-02 01:57:03', '2024-06-02 01:57:03'),
(158, '1078', 'Customer', '2024-06-02 01:58:50', '2024-06-02 01:58:50'),
(159, '1079', 'Customer', '2024-06-02 02:36:31', '2024-06-02 02:36:31'),
(160, '1080', 'Jana', '2024-06-03 04:13:14', '2024-06-03 04:13:14'),
(161, '1081', 'Lorraine', '2024-06-03 04:30:51', '2024-06-03 04:30:51'),
(162, '1082', 'Customer', '2024-06-03 05:23:29', '2024-06-03 05:23:29'),
(163, '1083', 'Customer', '2024-06-03 08:22:30', '2024-06-03 08:22:30'),
(164, '1084', 'Customer', '2024-06-03 14:49:43', '2024-06-03 14:49:43'),
(165, '1084', 'Customer', '2024-06-03 15:02:33', '2024-06-03 15:02:33'),
(166, '1084', 'Customer', '2024-06-03 15:03:25', '2024-06-03 15:03:25'),
(167, '1084', 'Customer', '2024-06-03 15:05:14', '2024-06-03 15:05:14'),
(168, '1084', 'Customer', '2024-06-03 15:05:47', '2024-06-03 15:05:47'),
(169, '1084', 'Customer', '2024-06-03 15:06:16', '2024-06-03 15:06:16'),
(170, '1084', 'Customer', '2024-06-03 15:07:29', '2024-06-03 15:07:29'),
(171, '1085', 'Customer', '2024-06-08 06:42:46', '2024-06-08 06:42:46'),
(172, '1086', 'Customer', '2024-06-10 09:36:37', '2024-06-10 09:36:37'),
(173, '1087', 'Customer', '2024-06-10 09:37:39', '2024-06-10 09:37:39'),
(174, '1088', 'Customer', '2024-06-10 15:44:33', '2024-06-10 15:44:33'),
(175, '1089', 'Customer', '2024-06-10 15:48:10', '2024-06-10 15:48:10'),
(176, '1089', 'Customer', '2024-06-10 15:48:56', '2024-06-10 15:48:56'),
(177, '1089', 'Customer', '2024-06-10 15:51:46', '2024-06-10 15:51:46'),
(178, '1090', 'Customer', '2024-06-10 15:53:31', '2024-06-10 15:53:31'),
(179, '1090', 'Customer', '2024-06-10 15:53:48', '2024-06-10 15:53:48'),
(180, '1090', 'Customer', '2024-06-10 15:54:08', '2024-06-10 15:54:08'),
(181, '1091', 'Customer', '2024-06-10 15:54:25', '2024-06-10 15:54:25'),
(182, '1092', 'Customer', '2024-06-10 15:55:40', '2024-06-10 15:55:40'),
(183, '1093', 'Customer', '2024-06-10 15:58:16', '2024-06-10 15:58:16'),
(184, '1094', 'Customer', '2024-06-10 15:58:47', '2024-06-10 15:58:47'),
(185, '1095', 'Customer', '2024-06-10 15:59:32', '2024-06-10 15:59:32'),
(186, '1096', 'Customer', '2024-06-10 16:02:53', '2024-06-10 16:02:53'),
(187, '1096', 'Customer', '2024-06-10 16:05:16', '2024-06-10 16:05:16'),
(188, '1096', 'Customer', '2024-06-10 16:06:31', '2024-06-10 16:06:31'),
(189, '1096', 'Customer', '2024-06-10 16:08:38', '2024-06-10 16:08:38'),
(190, '1096', 'Customer', '2024-06-10 16:09:36', '2024-06-10 16:09:36'),
(191, '1096', 'Customer', '2024-06-10 16:10:02', '2024-06-10 16:10:02'),
(192, '1097', 'Customer', '2024-06-10 16:10:41', '2024-06-10 16:10:41'),
(193, '1098', 'Customer', '2024-06-10 16:12:44', '2024-06-10 16:12:44'),
(194, '1099', 'Customer', '2024-06-10 16:13:45', '2024-06-10 16:13:45'),
(195, '1099', 'Customer', '2024-06-10 16:14:26', '2024-06-10 16:14:26'),
(196, '1100', 'Customer', '2024-06-10 16:14:44', '2024-06-10 16:14:44'),
(197, '1101', 'Lorraine', '2024-06-10 17:24:33', '2024-06-10 17:24:33'),
(198, '1102', 'Pia', '2024-06-10 17:45:58', '2024-06-10 17:45:58'),
(199, '1103', 'Customer', '2024-06-10 17:46:55', '2024-06-10 17:46:55'),
(200, '1103', 'Customer', '2024-06-10 17:47:06', '2024-06-10 17:47:06'),
(201, '1103', 'Customer', '2024-06-10 17:47:28', '2024-06-10 17:47:28'),
(202, '1103', 'Customer', '2024-06-10 17:47:51', '2024-06-10 17:47:51'),
(203, '1103', 'Customer', '2024-06-10 17:48:24', '2024-06-10 17:48:24'),
(204, '1103', 'Customer', '2024-06-10 17:49:00', '2024-06-10 17:49:00'),
(205, '1103', 'Customer', '2024-06-10 17:49:07', '2024-06-10 17:49:07'),
(206, '1104', 'Ton', '2024-06-11 05:41:35', '2024-06-11 05:41:35'),
(207, '1105', 'Alliah', '2024-06-11 06:04:18', '2024-06-11 06:04:18'),
(208, '1106', 'Olive4801010105107', '2024-06-11 06:06:31', '2024-06-11 06:06:31'),
(209, '1107', 'Mira', '2024-06-11 06:07:17', '2024-06-11 06:07:17');

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
(5, '2024_04_23_042453_create_sessions_table', 2),
(6, '2024_04_23_045809_create_tbl_menus', 3),
(8, '2024_04_23_041046_create_customers_table', 5),
(13, '2024_04_23_073859_create_tbl_history', 6),
(22, '2024_04_24_083018_create_tbl_shifts', 9),
(23, '2024_05_08_144552_create_stocks_table', 10),
(27, '2024_04_23_040954_create_tbl_cashiers', 13),
(28, '2024_06_10_174223_create_admins_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `ticket` varchar(255) NOT NULL,
  `food_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `ticket`, `food_name`, `created_at`, `updated_at`) VALUES
(1, '1014', 'Baked Macaroni', NULL, NULL),
(2, '1014', 'Palabok', NULL, NULL),
(3, '1015', 'Spaghetti', NULL, NULL),
(4, '1015', 'Palabok', NULL, NULL),
(5, '1016', 'Palabok', NULL, NULL),
(6, '1016', 'Spaghetti', NULL, NULL),
(7, '1017', 'Sopas', NULL, NULL),
(8, '1017', 'Spaghetti', NULL, NULL),
(9, '1017', 'Palabok', NULL, NULL),
(10, '1017', 'Baked Macaroni', NULL, NULL),
(11, '1018', 'Palabok', NULL, NULL),
(12, '1018', 'Baked Macaroni', NULL, NULL),
(13, '1018', 'Spaghetti', NULL, NULL),
(14, '1018', 'Sopas', NULL, NULL),
(15, '1018', 'Baked Macaroni', NULL, NULL),
(16, '1019', 'Baked Macaroni', NULL, NULL),
(17, '1019', 'Palabok', NULL, NULL),
(18, '1020', 'Palabok', NULL, NULL),
(19, '1020', 'Spaghetti', NULL, NULL),
(26, '1022', 'Rice', NULL, NULL),
(27, '1022', 'Nomu-nomu Lychee', NULL, NULL),
(28, '1021', 'Nomu-nomu Lychee', NULL, NULL),
(29, '1021', 'Rice', NULL, NULL),
(30, '1023', 'Pod\'s Pea Snack', NULL, NULL),
(31, '1023', 'Nomu-nomu Lychee', NULL, NULL),
(32, '1023', 'Rice', NULL, NULL),
(33, '1024', 'Pod\'s Pea Snack', NULL, NULL),
(34, '1024', 'Pod\'s Pea Snack', NULL, NULL),
(35, '1024', 'Nomu-nomu Lychee', NULL, NULL),
(36, '1025', 'Sopas', NULL, NULL),
(37, '1025', 'Pod\'s Pea Snack', NULL, NULL),
(38, '1025', 'Nomu-nomu Lychee', NULL, NULL),
(39, '1025', 'Rice', NULL, NULL),
(40, '1026', 'Pod\'s Pea Snack', NULL, NULL),
(41, '1026', 'Pod\'s Pea Snack', NULL, NULL),
(42, '1026', 'Pod\'s Pea Snack', NULL, NULL),
(43, '1026', 'Pod\'s Pea Snack', NULL, NULL),
(44, '1026', 'Nomu-nomu Lychee', NULL, NULL),
(45, '1026', 'Rice', NULL, NULL),
(46, '1026', 'Nomu-nomu Lychee', NULL, NULL),
(47, '1027', 'Rice', NULL, NULL),
(48, '1027', 'Nomu-nomu Lychee', NULL, NULL),
(52, '1029', 'Oishi Prawn Crackers Spicy Flavor 75g', NULL, NULL),
(53, '1029', 'Pilllows Ube 100g', NULL, NULL),
(54, '1029', 'Pillows Chocolate 100g', NULL, NULL),
(58, '1030', 'Oishi Prawn Crackers Spicy Flavor 75g', NULL, NULL),
(59, '1030', 'Pilllows Ube 100g', NULL, NULL),
(60, '1030', 'Pillows Chocolate 100g', NULL, NULL),
(61, '1031', 'Oishi Prawn Crackers Spicy Flavor 75g', NULL, NULL),
(62, '1031', 'Pod\'s Pea Snack', NULL, NULL),
(63, '1031', 'Pillows Chocolate 100g', NULL, NULL),
(64, '1032', 'Nomu-nomu Lychee', NULL, NULL),
(65, '1032', 'Pilllows Ube 100g', NULL, NULL),
(66, '1033', 'Oishi Prawn Crackers Spicy Flavor 75g', NULL, NULL),
(67, '1033', 'Oishi Prawn Crackers Spicy Flavor 75g', NULL, NULL),
(68, '1033', 'Pilllows Ube 100g', NULL, NULL),
(69, '1033', 'Nomu-nomu Lychee', NULL, NULL),
(70, '1034', 'Nomu-nomu Lychee', NULL, NULL),
(71, '1034', 'Nomu-nomu Lychee', NULL, NULL),
(72, '1034', 'Nomu-nomu Lychee', NULL, NULL),
(73, '1035', 'Oishi Prawn Crackers Spicy Flavor 75g', NULL, NULL),
(74, '1035', 'Pod\'s Pea Snack', NULL, NULL),
(75, '1035', 'Oishi Prawn Crackers Spicy Flavor 75g', NULL, NULL),
(76, '1036', 'Cheetos 75g', NULL, NULL),
(77, '1036', 'Cheetos 75g', NULL, NULL),
(78, '1036', 'Cheetos 75g', NULL, NULL),
(79, '1036', 'Cheetos 75g', NULL, NULL),
(80, '1036', 'Cheetos 75g', NULL, NULL),
(81, '1036', 'Cheetos 75g', NULL, NULL),
(82, '1036', 'Cheetos 75g', NULL, NULL),
(83, '1036', 'Cheetos 75g', NULL, NULL),
(84, '1036', 'Cheetos 75g', NULL, NULL),
(85, '1036', 'Cheetos 75g', NULL, NULL),
(86, '1037', 'Pocky Choco', NULL, NULL),
(87, '1037', 'Stick-O Chocolate 200G', NULL, NULL),
(88, '1037', 'Pocky Choco', NULL, NULL),
(89, '1037', 'Pocky Choco', NULL, NULL),
(90, '1038', 'Pocky Choco', NULL, NULL),
(91, '1038', 'Pilllows Ube 100g', NULL, NULL),
(92, '1038', 'Stick-O Chocolate 200G', NULL, NULL),
(93, '1038', 'Piattos Cheese Flavor 125g', NULL, NULL),
(94, '1039', 'Cheetos 75g', NULL, NULL),
(95, '1039', 'Cheetos 75g', NULL, NULL),
(96, '1040', 'Cheetos 75g', NULL, NULL),
(97, '1040', 'Pod\'s Pea Snack', NULL, NULL),
(98, '1041', 'Oishi Prawn Crackers Spicy Flavor 75g', NULL, NULL),
(99, '1041', 'Pocky Choco', NULL, NULL),
(100, '1042', 'Pillows Chocolate 100g', NULL, NULL),
(101, '1042', 'Pod\'s Pea Snack', NULL, NULL),
(102, '1042', 'Nomu-nomu Lychee', NULL, NULL),
(103, '1043', 'Cheetos 75g', NULL, NULL),
(104, '1043', 'Nomu-nomu Lychee', NULL, NULL),
(105, '1043', 'Pod\'s Pea Snack', NULL, NULL),
(106, '1044', 'Pocky Choco', NULL, NULL),
(107, '1045', 'Pocky Choco', NULL, NULL),
(108, '1045', 'Pilllows Ube 100g', NULL, NULL),
(109, '1046', 'Pillows Chocolate 100g', NULL, NULL),
(110, '1047', 'Pilllows Ube 100g', NULL, NULL),
(111, '1047', 'Pillows Chocolate 100g', NULL, NULL),
(112, '1047', 'Pod\'s Pea Snack', NULL, NULL),
(113, '1048', 'Rice per pack', NULL, NULL),
(114, '1049', 'Pilllows Ube 100g', NULL, NULL),
(115, '1049', 'Pocky Choco', NULL, NULL),
(116, '1049', 'Stick-O Chocolate 200G', NULL, NULL),
(117, '1050', 'Pocky Choco', NULL, NULL),
(118, '1050', 'Stick-O Chocolate 200G', NULL, NULL),
(119, '1051', 'Oishi Prawn Crackers Spicy Flavor 75g', NULL, NULL),
(120, '1052', 'Cheetos 75g', NULL, NULL),
(121, '1053', 'Sopas', NULL, NULL),
(122, '1053', 'Pillows Chocolate 100g', NULL, NULL),
(123, '1054', 'Cheetos 75g', NULL, NULL),
(124, '1054', 'Oishi Prawn Crackers Spicy Flavor 75g', NULL, NULL),
(125, '1054', 'Cheetos 75g', NULL, NULL),
(126, '1054', 'Oishi Prawn Crackers Spicy Flavor 75g', NULL, NULL),
(127, '1055', 'Pilllows Ube 100g', NULL, NULL),
(128, '1055', 'Nomu-nomu Lychee', NULL, NULL),
(129, '1056', 'Pillows Chocolate 100g', NULL, NULL),
(130, '1056', 'Pillows Chocolate 100g', NULL, NULL),
(131, '1056', 'Pillows Chocolate 100g', NULL, NULL),
(132, '1056', 'Pillows Chocolate 100g', NULL, NULL),
(133, '1056', 'Pillows Chocolate 100g', NULL, NULL),
(134, '1056', 'Pillows Chocolate 100g', NULL, NULL),
(135, '1056', 'Pillows Chocolate 100g', NULL, NULL),
(136, '1056', 'Stick-O Chocolate 200G', NULL, NULL),
(137, '1056', 'Piattos Cheese Flavor 125g', NULL, NULL),
(138, '1056', 'Piattos Cheese Flavor 125g', NULL, NULL),
(139, '1056', 'Stick-O Chocolate 200G', NULL, NULL),
(140, '1056', 'Stick-O Chocolate 200G', NULL, NULL),
(141, '1056', 'Pod\'s Pea Snack', NULL, NULL),
(142, '1057', 'Sopas', NULL, NULL),
(143, '1057', 'Piattos Cheese Flavor 125g', NULL, NULL),
(144, '1058', 'Rice per pack', NULL, NULL),
(145, '1058', 'Rice per pack', NULL, NULL),
(146, '1058', 'Rice per pack', NULL, NULL),
(147, '1058', 'Rice per pack', NULL, NULL),
(148, '1058', 'Rice per pack', NULL, NULL),
(149, '1058', 'Rice per pack', NULL, NULL),
(150, '1058', 'Rice per pack', NULL, NULL),
(151, '1058', 'Rice per pack', NULL, NULL),
(152, '1058', 'Rice per pack', NULL, NULL),
(153, '1058', 'Rice per pack', NULL, NULL),
(154, '1059', 'Rice per pack', NULL, NULL),
(155, '1059', 'Rice per pack', NULL, NULL),
(156, '1059', 'Rice per pack', NULL, NULL),
(157, '1059', 'Rice per pack', NULL, NULL),
(158, '1060', 'Rice per pack', NULL, NULL),
(159, '1060', 'Rice per pack', NULL, NULL),
(160, '1060', 'Rice per pack', NULL, NULL),
(161, '1060', 'Rice per pack', NULL, NULL),
(162, '1060', 'Nomu-nomu Lychee', NULL, NULL),
(163, '1061', 'Pod\'s Pea Snack', NULL, NULL),
(164, '1062', 'Pillows Chocolate 100g', NULL, NULL),
(165, '1062', 'Sopas', NULL, NULL),
(166, '1063', 'Stick-O Chocolate 200G', NULL, NULL),
(167, '1063', 'Pocky Choco', NULL, NULL),
(168, '1064', 'Oishi Prawn Crackers Spicy Flavor 75g', NULL, NULL),
(169, '1064', 'Pilllows Ube 100g', NULL, NULL),
(170, '1064', 'Stick-O Chocolate 200G', NULL, NULL),
(171, '1065', 'Pillows Chocolate 100g', NULL, NULL),
(172, '1065', 'Sopas', NULL, NULL),
(173, '1065', 'Stick-O Chocolate 200G', NULL, NULL),
(174, '1065', 'Piattos Cheese Flavor 125g', NULL, NULL),
(175, '1066', 'Sopas', NULL, NULL),
(176, '1066', 'Cheetos 75g', NULL, NULL),
(177, '1066', 'Oishi Prawn Crackers Spicy Flavor 75g', NULL, NULL),
(178, '1067', 'Pocky Choco', NULL, NULL),
(179, '1067', 'Pilllows Ube 100g', NULL, NULL),
(180, '1067', 'Oishi Prawn Crackers Spicy Flavor 75g', NULL, NULL),
(181, '1067', 'Cheetos 75g', NULL, NULL),
(182, '1067', 'Piattos Cheese Flavor 125g', NULL, NULL),
(183, '1067', 'Stick-O Chocolate 200G', NULL, NULL),
(184, '1068', 'Pillows Chocolate 100g', NULL, NULL),
(185, '1068', 'Sopas', NULL, NULL),
(186, '1068', 'Pod\'s Pea Snack', NULL, NULL),
(187, '1069', 'Stick-O Chocolate 200G', NULL, NULL),
(188, '1069', 'Piattos Cheese Flavor 125g', NULL, NULL),
(189, '1069', 'Cheetos 75g', NULL, NULL),
(190, '1070', 'Piattos Cheese Flavor 125g', NULL, NULL),
(191, '1070', 'Stick-O Chocolate 200G', NULL, NULL),
(192, '1070', 'Roller Coaster', NULL, NULL),
(193, '1071', 'Cheetos 75g', NULL, NULL),
(194, '1071', 'Roller Coaster', NULL, NULL),
(195, '1071', 'Pilllows Ube 100g', NULL, NULL),
(196, '1072', 'Piattos Cheese Flavor 125g', NULL, NULL),
(197, '1072', 'Pod\'s Pea Snack', NULL, NULL),
(198, '1072', 'Rice per pack', NULL, NULL),
(199, '1072', 'Nomu-nomu Lychee', NULL, NULL),
(200, '1073', 'Rice per pack', NULL, NULL),
(201, '1073', 'Rice per pack', NULL, NULL),
(202, '1073', 'Rice per pack', NULL, NULL),
(203, '1073', 'Rice per pack', NULL, NULL),
(204, '1073', 'Rice per pack', NULL, NULL),
(205, '1073', 'Rice per pack', NULL, NULL),
(206, '1073', 'Rice per pack', NULL, NULL),
(207, '1073', 'Rice per pack', NULL, NULL),
(208, '1073', 'Rice per pack', NULL, NULL),
(209, '1073', 'Rice per pack', NULL, NULL),
(210, '1073', 'Rice per pack', NULL, NULL),
(211, '1073', 'Rice per pack', NULL, NULL),
(212, '1073', 'Rice per pack', NULL, NULL),
(213, '1073', 'Rice per pack', NULL, NULL),
(214, '1073', 'Rice per pack', NULL, NULL),
(215, '1073', 'Rice per pack', NULL, NULL),
(216, '1073', 'Rice per pack', NULL, NULL),
(217, '1073', 'Rice per pack', NULL, NULL),
(218, '1073', 'Rice per pack', NULL, NULL),
(219, '1074', 'Piattos Cheese Flavor 125g', NULL, NULL),
(220, '1074', 'Cheetos 75g', NULL, NULL),
(221, '1074', 'Oishi Prawn Crackers Spicy Flavor 75g', NULL, NULL),
(222, '1074', 'Pilllows Ube 100g', NULL, NULL),
(223, '1075', 'Rice per pack', NULL, NULL),
(224, '1075', 'Rice per pack', NULL, NULL),
(225, '1075', 'Rice per pack', NULL, NULL),
(226, '1075', 'Rice per pack', NULL, NULL),
(227, '1075', 'Rice per pack', NULL, NULL),
(228, '1075', 'Rice per pack', NULL, NULL),
(229, '1075', 'Rice per pack', NULL, NULL),
(230, '1075', 'Rice per pack', NULL, NULL),
(231, '1075', 'Rice per pack', NULL, NULL),
(232, '1075', 'Rice per pack', NULL, NULL),
(233, '1075', 'Rice per pack', NULL, NULL),
(234, '1076', 'Souper', NULL, NULL),
(235, '1076', 'Souper', NULL, NULL),
(236, '1077', 'Nescafe Original', NULL, NULL),
(237, '1077', 'Nescafe Original', NULL, NULL),
(238, '1077', 'Sopas', NULL, NULL),
(239, '1077', 'Sopas', NULL, NULL),
(240, '1077', 'Sopas', NULL, NULL),
(241, '1077', 'Sopas', NULL, NULL),
(242, '1077', 'Sopas', NULL, NULL),
(243, '1077', 'Sopas', NULL, NULL),
(244, '1077', 'Nescafe Original', NULL, NULL),
(245, '1078', 'Pocky Choco', NULL, NULL),
(246, '1079', 'Piattos Cheese Flavor 125g', NULL, NULL),
(247, '1079', 'Pocky Choco', NULL, NULL),
(248, '1079', 'Sopas', NULL, NULL),
(249, '1079', 'Sopas', NULL, NULL),
(250, '1079', 'Sopas', NULL, NULL),
(251, '1079', 'Sopas', NULL, NULL),
(252, '1079', 'Sopas', NULL, NULL),
(253, '1079', 'Sopas', NULL, NULL),
(254, '1079', 'Sopas', NULL, NULL),
(255, '1079', 'Sopas', NULL, NULL),
(256, '1079', 'Sopas', NULL, NULL),
(257, '1079', 'Sopas', NULL, NULL),
(258, '1079', 'Sopas', NULL, NULL),
(259, '1080', 'Nescafe Original Twin Pack Sugar Free', NULL, NULL),
(260, '1080', 'Nestle Koko Krunch 15g', NULL, NULL),
(261, '1081', 'Nestle Koko Krunch 15g', '2024-06-03 04:30:51', '2024-06-03 04:30:51'),
(262, '1081', 'Nestle Koko Krunch 15g', '2024-06-03 04:30:51', '2024-06-03 04:30:51'),
(263, '1081', 'Nestle Koko Krunch 15g', '2024-06-03 04:30:51', '2024-06-03 04:30:51'),
(264, '1081', 'Nestle Koko Krunch 15g', '2024-06-03 04:30:51', '2024-06-03 04:30:51'),
(265, '1081', 'Nestle Koko Krunch 15g', '2024-06-03 04:30:51', '2024-06-03 04:30:51'),
(266, '1081', 'Nestle Koko Krunch 15g', '2024-06-03 04:30:51', '2024-06-03 04:30:51'),
(267, '1082', 'Nestle Koko Krunch 15g', '2024-06-03 05:23:29', '2024-06-03 05:23:29'),
(268, '1082', 'Oishi Prawn Crackers 24g', '2024-06-03 05:23:29', '2024-06-03 05:23:29'),
(269, '1082', 'Piattos Cheese Flavor 125g', '2024-06-03 05:23:29', '2024-06-03 05:23:29'),
(270, '1082', 'Roller Coaster', '2024-06-03 05:23:29', '2024-06-03 05:23:29'),
(271, '1082', 'Oishi Prawn Crackers 24g', '2024-06-03 05:23:29', '2024-06-03 05:23:29'),
(272, '1083', 'Nescafe Original Twin Pack Sugar Free', '2024-06-03 08:22:30', '2024-06-03 08:22:30'),
(273, '1083', 'Roller Coaster', '2024-06-03 08:22:30', '2024-06-03 08:22:30'),
(274, '1083', 'Oishi Prawn Crackers Spicy Flavor 75g', '2024-06-03 08:22:30', '2024-06-03 08:22:30'),
(275, '1083', 'Pod\'s Pea Snack', '2024-06-03 08:22:30', '2024-06-03 08:22:30'),
(276, '1083', 'Piattos Cheese Flavor 125g', '2024-06-03 08:22:30', '2024-06-03 08:22:30'),
(277, '1083', 'Nomu-nomu Lychee', '2024-06-03 08:22:30', '2024-06-03 08:22:30'),
(278, '1083', 'Nomu-nomu Lychee', '2024-06-03 08:22:30', '2024-06-03 08:22:30'),
(279, '1084', 'Sopas', '2024-06-03 14:49:43', '2024-06-03 14:49:43'),
(280, '1084', 'Stick-O Chocolate 200G', '2024-06-03 14:49:43', '2024-06-03 14:49:43'),
(281, '1084', 'Cheetos 75g', '2024-06-03 14:49:43', '2024-06-03 14:49:43'),
(282, '1084', 'Sopas', '2024-06-03 15:02:33', '2024-06-03 15:02:33'),
(283, '1084', 'Stick-O Chocolate 200G', '2024-06-03 15:02:33', '2024-06-03 15:02:33'),
(284, '1084', 'Cheetos 75g', '2024-06-03 15:02:33', '2024-06-03 15:02:33'),
(285, '1084', 'Sopas', '2024-06-03 15:03:25', '2024-06-03 15:03:25'),
(286, '1084', 'Stick-O Chocolate 200G', '2024-06-03 15:03:25', '2024-06-03 15:03:25'),
(287, '1084', 'Cheetos 75g', '2024-06-03 15:03:25', '2024-06-03 15:03:25'),
(288, '1084', 'Sopas', '2024-06-03 15:05:14', '2024-06-03 15:05:14'),
(289, '1084', 'Stick-O Chocolate 200G', '2024-06-03 15:05:14', '2024-06-03 15:05:14'),
(290, '1084', 'Cheetos 75g', '2024-06-03 15:05:14', '2024-06-03 15:05:14'),
(291, '1084', 'Sopas', '2024-06-03 15:05:47', '2024-06-03 15:05:47'),
(292, '1084', 'Stick-O Chocolate 200G', '2024-06-03 15:05:47', '2024-06-03 15:05:47'),
(293, '1084', 'Cheetos 75g', '2024-06-03 15:05:47', '2024-06-03 15:05:47'),
(294, '1084', 'Sopas', '2024-06-03 15:06:16', '2024-06-03 15:06:16'),
(295, '1084', 'Stick-O Chocolate 200G', '2024-06-03 15:06:16', '2024-06-03 15:06:16'),
(296, '1084', 'Cheetos 75g', '2024-06-03 15:06:16', '2024-06-03 15:06:16'),
(297, '1084', 'Sopas', '2024-06-03 15:07:29', '2024-06-03 15:07:29'),
(298, '1084', 'Stick-O Chocolate 200G', '2024-06-03 15:07:29', '2024-06-03 15:07:29'),
(299, '1084', 'Cheetos 75g', '2024-06-03 15:07:29', '2024-06-03 15:07:29'),
(300, '1085', 'Nescafe Original Twin Pack Sugar Free', '2024-06-08 06:42:46', '2024-06-08 06:42:46'),
(301, '1085', 'Roller Coaster', '2024-06-08 06:42:46', '2024-06-08 06:42:46'),
(302, '1086', 'Nescafe Original Twin Pack Sugar Free', '2024-06-10 09:36:37', '2024-06-10 09:36:37'),
(303, '1086', 'Nestle Koko Krunch 15g', '2024-06-10 09:36:37', '2024-06-10 09:36:37'),
(304, '1086', 'Oishi Crispy Patata Baked Potato Flavor 24g', '2024-06-10 09:36:37', '2024-06-10 09:36:37'),
(305, '1087', 'Stick-O Chocolate 200G', '2024-06-10 09:37:39', '2024-06-10 09:37:39'),
(306, '1087', 'Nestle Koko Krunch 15g', '2024-06-10 09:37:39', '2024-06-10 09:37:39'),
(307, '1088', 'Oishi Prawn Crackers 24g', '2024-06-10 15:44:33', '2024-06-10 15:44:33'),
(308, '1088', 'Oishi Crispy Patata Baked Potato Flavor 24g', '2024-06-10 15:44:33', '2024-06-10 15:44:33'),
(309, '1088', 'Pocky Choco', '2024-06-10 15:44:33', '2024-06-10 15:44:33'),
(310, '1088', 'Souper', '2024-06-10 15:44:33', '2024-06-10 15:44:33'),
(311, '1088', 'Roller Coaster', '2024-06-10 15:44:33', '2024-06-10 15:44:33'),
(312, '1088', 'Nescafe Original Twin Pack Sugar Free', '2024-06-10 15:44:33', '2024-06-10 15:44:33'),
(313, '1088', 'Nestle Koko Krunch 15g', '2024-06-10 15:44:33', '2024-06-10 15:44:33'),
(314, '1088', 'Stick-O Chocolate 200G', '2024-06-10 15:44:33', '2024-06-10 15:44:33'),
(315, '1088', 'Piattos Cheese Flavor 125g', '2024-06-10 15:44:33', '2024-06-10 15:44:33'),
(316, '1088', 'Cheetos 75g', '2024-06-10 15:44:33', '2024-06-10 15:44:33'),
(317, '1088', 'Oishi Prawn Crackers Spicy Flavor 75g', '2024-06-10 15:44:33', '2024-06-10 15:44:33'),
(318, '1088', 'Pilllows Ube 100g', '2024-06-10 15:44:33', '2024-06-10 15:44:33'),
(319, '1088', 'Nomu-nomu Lychee', '2024-06-10 15:44:33', '2024-06-10 15:44:33'),
(320, '1088', 'Rice per pack', '2024-06-10 15:44:33', '2024-06-10 15:44:33'),
(321, '1088', 'Pod\'s Pea Snack', '2024-06-10 15:44:33', '2024-06-10 15:44:33'),
(322, '1088', 'Sopas', '2024-06-10 15:44:33', '2024-06-10 15:44:33'),
(323, '1088', 'Pillows Chocolate 100g', '2024-06-10 15:44:33', '2024-06-10 15:44:33'),
(324, '1089', 'Nestle Koko Krunch 15g', '2024-06-10 15:48:10', '2024-06-10 15:48:10'),
(325, '1089', 'Nescafe Original Twin Pack Sugar Free', '2024-06-10 15:48:10', '2024-06-10 15:48:10'),
(326, '1089', 'Roller Coaster', '2024-06-10 15:48:10', '2024-06-10 15:48:10'),
(327, '1089', 'Souper', '2024-06-10 15:48:10', '2024-06-10 15:48:10'),
(328, '1089', 'Nestle Koko Krunch 15g', '2024-06-10 15:48:56', '2024-06-10 15:48:56'),
(329, '1089', 'Nescafe Original Twin Pack Sugar Free', '2024-06-10 15:48:56', '2024-06-10 15:48:56'),
(330, '1089', 'Roller Coaster', '2024-06-10 15:48:56', '2024-06-10 15:48:56'),
(331, '1089', 'Souper', '2024-06-10 15:48:56', '2024-06-10 15:48:56'),
(332, '1089', 'Nestle Koko Krunch 15g', '2024-06-10 15:51:46', '2024-06-10 15:51:46'),
(333, '1089', 'Nescafe Original Twin Pack Sugar Free', '2024-06-10 15:51:46', '2024-06-10 15:51:46'),
(334, '1089', 'Roller Coaster', '2024-06-10 15:51:46', '2024-06-10 15:51:46'),
(335, '1089', 'Souper', '2024-06-10 15:51:46', '2024-06-10 15:51:46'),
(336, '1090', 'Oishi Prawn Crackers Spicy Flavor 75g', '2024-06-10 15:53:31', '2024-06-10 15:53:31'),
(337, '1090', 'Cheetos 75g', '2024-06-10 15:53:31', '2024-06-10 15:53:31'),
(338, '1090', 'Oishi Prawn Crackers Spicy Flavor 75g', '2024-06-10 15:53:48', '2024-06-10 15:53:48'),
(339, '1090', 'Cheetos 75g', '2024-06-10 15:53:48', '2024-06-10 15:53:48'),
(340, '1090', 'Oishi Prawn Crackers Spicy Flavor 75g', '2024-06-10 15:54:08', '2024-06-10 15:54:08'),
(341, '1090', 'Cheetos 75g', '2024-06-10 15:54:08', '2024-06-10 15:54:08'),
(342, '1091', 'Oishi Prawn Crackers 24g', '2024-06-10 15:54:25', '2024-06-10 15:54:25'),
(343, '1092', 'Nestle Koko Krunch 15g', '2024-06-10 15:55:40', '2024-06-10 15:55:40'),
(344, '1092', 'Nescafe Original Twin Pack Sugar Free', '2024-06-10 15:55:40', '2024-06-10 15:55:40'),
(345, '1092', 'Roller Coaster', '2024-06-10 15:55:40', '2024-06-10 15:55:40'),
(346, '1093', 'Pilllows Ube 100g', '2024-06-10 15:58:16', '2024-06-10 15:58:16'),
(347, '1094', 'Nescafe Original Twin Pack Sugar Free', '2024-06-10 15:58:47', '2024-06-10 15:58:47'),
(348, '1094', 'Roller Coaster', '2024-06-10 15:58:47', '2024-06-10 15:58:47'),
(349, '1095', 'Roller Coaster', '2024-06-10 15:59:32', '2024-06-10 15:59:32'),
(350, '1096', 'Roller Coaster', '2024-06-10 16:02:53', '2024-06-10 16:02:53'),
(351, '1096', 'Souper', '2024-06-10 16:02:53', '2024-06-10 16:02:53'),
(352, '1096', 'Roller Coaster', '2024-06-10 16:05:16', '2024-06-10 16:05:16'),
(353, '1096', 'Souper', '2024-06-10 16:05:16', '2024-06-10 16:05:16'),
(354, '1096', 'Roller Coaster', '2024-06-10 16:06:31', '2024-06-10 16:06:31'),
(355, '1096', 'Souper', '2024-06-10 16:06:31', '2024-06-10 16:06:31'),
(356, '1096', 'Roller Coaster', '2024-06-10 16:08:38', '2024-06-10 16:08:38'),
(357, '1096', 'Souper', '2024-06-10 16:08:38', '2024-06-10 16:08:38'),
(358, '1096', 'Roller Coaster', '2024-06-10 16:09:36', '2024-06-10 16:09:36'),
(359, '1096', 'Souper', '2024-06-10 16:09:36', '2024-06-10 16:09:36'),
(360, '1096', 'Roller Coaster', '2024-06-10 16:10:02', '2024-06-10 16:10:02'),
(361, '1096', 'Souper', '2024-06-10 16:10:02', '2024-06-10 16:10:02'),
(362, '1097', 'Nescafe Original Twin Pack Sugar Free', '2024-06-10 16:10:41', '2024-06-10 16:10:41'),
(363, '1098', 'Nescafe Original Twin Pack Sugar Free', '2024-06-10 16:12:44', '2024-06-10 16:12:44'),
(364, '1098', 'Nestle Koko Krunch 15g', '2024-06-10 16:12:44', '2024-06-10 16:12:44'),
(365, '1099', 'Pod\'s Pea Snack', '2024-06-10 16:13:45', '2024-06-10 16:13:45'),
(366, '1099', 'Pod\'s Pea Snack', '2024-06-10 16:14:26', '2024-06-10 16:14:26'),
(367, '1100', 'Stick-O Chocolate 200G', '2024-06-10 16:14:44', '2024-06-10 16:14:44'),
(368, '1101', 'Nestle Koko Krunch 15g', '2024-06-10 17:24:33', '2024-06-10 17:24:33'),
(369, '1101', 'Nescafe Original Twin Pack Sugar Free', '2024-06-10 17:24:33', '2024-06-10 17:24:33'),
(370, '1102', 'Roller Coaster', '2024-06-10 17:45:58', '2024-06-10 17:45:58'),
(371, '1102', 'Souper', '2024-06-10 17:45:58', '2024-06-10 17:45:58'),
(372, '1102', 'Nescafe Original Twin Pack Sugar Free', '2024-06-10 17:45:58', '2024-06-10 17:45:58'),
(373, '1102', 'Nescafe Original Twin Pack Sugar Free', '2024-06-10 17:45:58', '2024-06-10 17:45:58'),
(374, '1102', 'Piattos Cheese Flavor 125g', '2024-06-10 17:45:58', '2024-06-10 17:45:58'),
(375, '1102', 'Cheetos 75g', '2024-06-10 17:45:58', '2024-06-10 17:45:58'),
(376, '1102', 'Oishi Prawn Crackers Spicy Flavor 75g', '2024-06-10 17:45:58', '2024-06-10 17:45:58'),
(377, '1103', 'Roller Coaster', '2024-06-10 17:46:55', '2024-06-10 17:46:55'),
(378, '1103', 'Roller Coaster', '2024-06-10 17:47:06', '2024-06-10 17:47:06'),
(379, '1103', 'Roller Coaster', '2024-06-10 17:47:28', '2024-06-10 17:47:28'),
(380, '1103', 'Roller Coaster', '2024-06-10 17:47:51', '2024-06-10 17:47:51'),
(381, '1103', 'Roller Coaster', '2024-06-10 17:48:24', '2024-06-10 17:48:24'),
(382, '1103', 'Roller Coaster', '2024-06-10 17:49:00', '2024-06-10 17:49:00'),
(383, '1103', 'Roller Coaster', '2024-06-10 17:49:07', '2024-06-10 17:49:07'),
(384, '1104', 'Pod\'s Pea Snack', '2024-06-11 05:41:35', '2024-06-11 05:41:35'),
(385, '1104', 'Piattos Cheese Flavor 125g', '2024-06-11 05:41:35', '2024-06-11 05:41:35'),
(386, '1104', 'Nescafe Original Twin Pack Sugar Free', '2024-06-11 05:41:35', '2024-06-11 05:41:35'),
(387, '1105', 'Johnsons Baby Powder', '2024-06-11 06:04:18', '2024-06-11 06:04:18'),
(388, '1105', 'Johnsons Baby Powder', '2024-06-11 06:04:18', '2024-06-11 06:04:18'),
(389, '1105', 'Johnsons Baby Powder', '2024-06-11 06:04:18', '2024-06-11 06:04:18'),
(390, '1105', 'Johnsons Baby Powder', '2024-06-11 06:04:18', '2024-06-11 06:04:18'),
(391, '1105', 'Johnsons Baby Powder', '2024-06-11 06:04:18', '2024-06-11 06:04:18'),
(392, '1105', 'Johnsons Baby Powder', '2024-06-11 06:04:18', '2024-06-11 06:04:18'),
(393, '1106', 'Pod\'s Pea Snack', '2024-06-11 06:06:31', '2024-06-11 06:06:31'),
(394, '1106', 'Nescafe Original Twin Pack Sugar Free', '2024-06-11 06:06:31', '2024-06-11 06:06:31'),
(395, '1106', 'Johnsons Baby Powder', '2024-06-11 06:06:31', '2024-06-11 06:06:31'),
(396, '1107', 'Johnsons Baby Powder', '2024-06-11 06:07:17', '2024-06-11 06:07:17');

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
('8xurZGYi5s8nQt4UmDUvTJxDVf2iSpCijX0eoNvh', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiSTc0bzBEaWFleE5USHptUzFQN2xxNHhTSFlXQW1tejRMTXNhcmxnWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYWNrLW9mZmljZS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTI6ImNhc2hpZXJfbmFtZSI7czo1OiJKZXJpYyI7czoxMDoicG9zX251bWJlciI7czo0OiJwb3MyIjtzOjEwOiJhZG1pbl9uYW1lIjtzOjU6IkFkbWluIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1718042522),
('nBaz4N8z319orP6xQWqhybFeLwOQzgNvXgGGCwjy', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOXFSUVc2Y094RnByRHRqcGRqMXo1VTNjMWVsWTRYOVp0OHNjQkU4cSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1718086367);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `sku` varchar(255) NOT NULL,
  `qr` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `retail` varchar(255) NOT NULL,
  `update_reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `item`, `category`, `description`, `sku`, `qr`, `quantity`, `cost`, `retail`, `update_reason`, `created_at`, `updated_at`) VALUES
(2, 'Nomu-nomu Lychee', 'Groceries', NULL, 'NMNM-001', 'Nomu-nomu Lychee', '116', '37', '45', 'Not included in previous inventory', '2024-05-22 09:13:59', '2024-06-10 15:44:42'),
(3, 'Rice per pack', 'Groceries', NULL, 'RICE-001', 'Rice (1 pack)', '67', '40', '51', NULL, '2024-05-22 09:14:49', '2024-06-10 15:44:42'),
(4, 'Pod\'s Pea Snack', 'Groceries', NULL, 'PODS-001', 'Pod\'s Pea Snack', '43', '19', '24', 'New stocks', '2024-05-22 09:15:19', '2024-06-11 06:07:04'),
(5, 'Sopas', 'Meals', NULL, 'SOPAS', 'Sopas', '81', '19', '24', NULL, '2024-05-22 09:15:40', '2024-06-10 15:44:42'),
(6, 'Pillows Chocolate 100g', 'Groceries', NULL, 'PLLWSCHOC100G-01', 'Pillows Chocolate 100g', '94', '20', '24', 'Expired', '2024-05-22 09:16:08', '2024-06-10 15:44:42'),
(7, 'Pilllows Ube 100g', 'Groceries', NULL, 'PLLWSUBE100G-01', 'Pilllows Ube 100g', '96', '20', '24', NULL, '2024-05-22 09:16:28', '2024-06-10 15:58:41'),
(8, 'Oishi Prawn Crackers Spicy Flavor 75g', 'Groceries', NULL, 'OISHISPCY75G-01', 'Oishi Prawn Crackers Spicy Flavor 75g', '93', '20', '25', 'Expired', '2024-05-22 09:16:54', '2024-06-10 17:46:33'),
(9, 'Cheetos 75g', 'Groceries', NULL, 'CHEETOS75G-01', 'Cheetos 75g', '85', '37', '45', NULL, '2024-05-22 09:17:31', '2024-06-10 17:46:33'),
(10, 'Piattos Cheese Flavor 125g', 'Groceries', NULL, 'PTTSCHSE125G', 'Piattos Cheese Flavor 125g', '90', '17', '20', NULL, '2024-05-22 09:18:05', '2024-06-11 05:42:17'),
(11, 'Stick-O Chocolate 200G', 'Groceries', NULL, 'STICKOCHOCO200G', 'Stick-O Chocolate 200G', '43', '55', '70', 'Expired', '2024-05-22 09:18:21', '2024-06-10 16:15:03'),
(12, 'Pocky Choco', 'Groceries', NULL, 'POCKYCHOCO-01', 'Pocky Choco', '2', '67', '77', 'Out of season', '2024-05-22 09:18:39', '2024-06-10 15:44:42'),
(13, 'Souper', 'Groceries', NULL, 'SOUPER-001', 'Souper', '2', '41', '49', 'New stocks', '2024-05-24 11:32:59', '2024-06-10 17:46:33'),
(14, 'Roller Coaster', 'Groceries', NULL, 'RLLRCSTR-001', 'Roller Coaster', '-16', '7', '10', 'New stocks', '2024-05-24 14:06:53', '2024-06-10 17:49:24'),
(15, 'Nescafe Original Twin Pack Sugar Free', 'Groceries', NULL, 'Nescafe Original Twin Pack Sugar Free', '4800361423601', '-7', '12', '14', 'New stocks', '2024-06-03 03:50:21', '2024-06-11 06:07:04'),
(16, 'Nestle Koko Krunch 15g', 'Groceries', NULL, 'Nestle Koko Krunch 15g', '4800361328463', '3', '6', '8', 'New stocks', '2024-06-03 04:09:43', '2024-06-10 17:24:43'),
(17, 'Oishi Crispy Patata Baked Potato Flavor 24g', 'Groceries', NULL, 'Oishi Crispy Patata Baked Potato Flavor', '4800194104869', '18', '7', '8', 'New stocks', '2024-06-03 04:32:26', '2024-06-10 15:44:42'),
(18, 'Oishi Prawn Crackers 24g', 'Groceries', NULL, 'Oishi Prawn Crackers 24g', '4891208040143', '16', '7', '8', 'New stocks', '2024-06-03 04:32:52', '2024-06-10 15:54:29'),
(19, 'Johnsons Baby Powder', 'Groceries', NULL, 'Johnsons Baby Powder', '4801010105107', '-8', '35', '45', NULL, '2024-06-11 06:00:04', '2024-06-11 06:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cashiers`
--

CREATE TABLE `tbl_cashiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_cashiers`
--

INSERT INTO `tbl_cashiers` (`id`, `name`, `password`, `role`, `created_at`, `updated_at`) VALUES
(3, 'Jeric', '$2y$12$4bfsKf10H9jvzZC0iBpm9urtHooOux0d3T7ke3M/r9eja8m0eLyim', 'Cashier', '2024-06-10 13:34:08', '2024-06-10 13:34:08'),
(5, 'Krystle', '$2y$12$QxddI4bi3aWsWlY7G4i5vO2cMkbAp6czdBykxm3JEN66n/eqh7lHq', 'Cashier', '2024-06-10 13:41:24', '2024-06-10 13:41:24'),
(16, 'Jeric', '$2y$12$vpIJG6GMfA/Th1Gne0vcmeRYKhnOEpqlqJkFbRiZvnDFhJJC53P7q', 'Admin', '2024-06-10 14:06:50', '2024-06-10 14:06:50'),
(17, 'Admin', '$2y$12$zw.x8R1Qeq7gfR9Su/eRcOOgEL4iLQkMRkyNbIaiPCFuEOQEoaMyi', 'Admin', '2024-06-10 14:20:22', '2024-06-10 14:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history`
--

CREATE TABLE `tbl_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket` int(11) NOT NULL,
  `cashier` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `sub_total` double NOT NULL,
  `tax` double NOT NULL,
  `cash` double NOT NULL,
  `total` double NOT NULL,
  `change` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_history`
--

INSERT INTO `tbl_history` (`id`, `ticket`, `cashier`, `customer`, `type`, `sub_total`, `tax`, `cash`, `total`, `change`, `created_at`, `updated_at`) VALUES
(1, 1012, 'Jeric', 'Jana', 'SALE', 17.6, 2.4, 50, 20, 30, '2024-04-23 00:15:37', '2024-04-23 00:15:37'),
(2, 1014, 'Jeric', 'Rod Francis', 'SALE', 17.6, 2.4, 50, 20, 30, '2024-04-23 03:35:01', '2024-04-23 03:35:01'),
(3, 1015, 'Jeric', 'Mark', 'SALE', 17.6, 2.4, 200, 20, 180, '2024-04-23 03:53:52', '2024-04-23 03:53:52'),
(5, 1010, 'Jeric', 'Jerry', 'SALE', 61.6, 8.4, 200, 70, 130, '2024-04-23 21:32:18', '2024-04-23 21:32:18'),
(6, 1011, 'Jeric', 'Customer', 'SALE', 39.6, 5.4, 50, 45, 5, '2024-04-23 22:43:26', '2024-04-23 22:43:26'),
(7, 1015, 'Jeric', 'Customer', 'SALE', 39.6, 5.4, 50, 45, 5, '2024-04-28 08:22:25', '2024-04-28 08:22:25'),
(8, 1016, 'Jeric', 'Andy', 'SALE', 39.6, 5.4, 50, 45, 5, '2024-05-08 02:20:18', '2024-05-08 02:20:18'),
(9, 1017, 'Jeric', 'Vicky', 'SALE', 79.2, 10.8, 100, 90, 10, '2024-05-08 04:24:55', '2024-05-08 04:24:55'),
(10, 1018, 'Jeric', 'Lorraine', 'SALE', 101.2, 13.8, 150, 115, 35, '2024-05-08 04:26:10', '2024-05-08 04:26:10'),
(11, 1020, 'Jeric', 'Olive', 'SALE', 39.6, 5.4, 50, 45, 5, '2024-05-09 13:04:20', '2024-05-09 13:04:20'),
(12, 1022, 'Jeric', 'Pia', 'SALE', 67.76, 9.24, 100, 77, 23, '2024-05-13 04:43:14', '2024-05-13 04:43:14'),
(13, 1023, 'Jeric', 'Lorraine', 'SALE', 88.88, 12.12, 105, 101, 4, '2024-05-13 04:54:03', '2024-05-13 04:54:03'),
(14, 1024, 'Jeric', 'Mira', 'SALE', 74.8, 10.2, 100, 85, 15, '2024-05-13 04:57:13', '2024-05-13 04:57:13'),
(15, 1025, 'Jeric', 'Customer', 'SALE', 88.88, 12.12, 200, 101, 99, '2024-05-13 05:00:50', '2024-05-13 05:00:50'),
(16, 1026, 'Jeric', 'Customer', 'SALE', 184.8, 25.2, 220, 210, 10, '2024-05-13 05:26:08', '2024-05-13 05:26:08'),
(17, 1027, 'Jeric', 'Dale', 'SALE', 67.76, 9.24, 100, 77, 23, '2024-05-13 06:39:22', '2024-05-13 06:39:22'),
(18, 1030, 'Jeric', 'Nick', 'SALE', 64.24, 8.76, 100, 73, 27, '2024-05-15 14:43:03', '2024-05-15 14:43:03'),
(19, 1031, 'Jeric', 'Mike', 'SALE', 64.24, 8.76, 100, 73, 27, '2024-05-15 14:43:30', '2024-05-15 14:43:30'),
(20, 1032, 'Jeric', 'Luke', 'SALE', 60.72, 8.28, 100, 69, 31, '2024-05-15 14:43:42', '2024-05-15 14:43:42'),
(21, 1033, 'Jeric', 'Karina', 'SALE', 104.72, 14.28, 120, 119, 1, '2024-05-15 14:44:00', '2024-05-15 14:44:00'),
(22, 1034, 'Jeric', 'Customer', 'SALE', 118.8, 16.2, 200, 135, 65, '2024-05-16 00:35:55', '2024-05-16 00:35:55'),
(23, 1035, 'Jeric', 'Olive', 'SALE', 65.12, 8.88, 100, 74, 26, '2024-05-16 01:27:08', '2024-05-16 01:27:08'),
(24, 1036, 'Jeric', 'Vicky', 'SALE', 396, 54, 500, 450, 50, '2024-05-16 01:40:34', '2024-05-16 01:40:34'),
(25, 1037, 'Jeric', 'Jeric', 'SALE', 242.88, 33.12, 300, 276, 24, '2024-05-16 05:06:51', '2024-05-16 05:06:51'),
(26, 1038, 'Jeric', 'Billy', 'SALE', 168.08, 22.92, 200, 191, 9, '2024-05-16 12:18:48', '2024-05-16 12:18:48'),
(27, 1039, 'Jeric', 'Alliah', 'SALE', 79.2, 10.8, 100, 90, 10, '2024-05-16 12:24:12', '2024-05-16 12:24:12'),
(28, 1040, 'Jeric', 'Mark', 'SALE', 60.72, 8.28, 100, 69, 31, '2024-05-17 06:01:42', '2024-05-17 06:01:42'),
(29, 1041, 'Jeric', 'Dale', 'SALE', 89.76, 12.24, 100, 102, -2, '2024-05-17 06:08:12', '2024-05-17 06:08:12'),
(30, 1042, 'Jeric', 'Mira', 'SALE', 81.84, 11.16, 95, 93, 2, '2024-05-17 06:21:30', '2024-05-17 06:21:30'),
(31, 1043, 'Jeric', 'Enid', 'SALE', 100.32, 13.68, 120, 114, 6, '2024-05-17 07:27:22', '2024-05-17 07:27:22'),
(32, 1044, 'Jeric', 'Lorraine', 'SALE', 67.76, 9.24, 100, 77, 23, '2024-05-17 07:32:11', '2024-05-17 07:32:11'),
(33, 1045, 'Jeric', 'Lorraine', 'SALE', 88.88, 12.12, 200, 101, 99, '2024-05-17 09:15:38', '2024-05-17 09:15:38'),
(34, 1046, 'Jeric', 'Vicky', 'SALE', 21.12, 2.88, 50, 24, 26, '2024-05-17 09:22:49', '2024-05-17 09:22:49'),
(35, 1047, 'Jeric', 'Job', 'SALE', 63.36, 8.64, 1000, 72, 928, '2024-05-18 04:51:31', '2024-05-18 04:51:31'),
(36, 1048, 'Jeric', 'Nick', 'SALE', 44.88, 6.12, 100, 51, 49, '2024-05-20 04:04:01', '2024-05-20 04:04:01'),
(37, 1049, 'Jeric', 'Lorraine', 'SALE', 150.48, 20.52, 200, 171, 29, '2024-05-20 04:23:01', '2024-05-20 04:23:01'),
(39, 1052, 'Jeric', 'Vicky', 'SALE', 39.6, 5.4, 50, 45, 5, '2024-05-20 04:30:36', '2024-05-20 04:30:36'),
(40, 1053, 'Jeric', 'Mira', 'SALE', 38.72, 5.28, 50, 44, 6, '2024-05-20 04:38:52', '2024-05-20 04:38:52'),
(41, 1054, 'Jeric', 'Nick', 'SALE', 123.2, 16.8, 200, 140, 60, '2024-05-20 05:11:00', '2024-05-20 05:11:00'),
(42, 1055, 'Jeric', 'Mira', 'SALE', 60.72, 8.28, 100, 69, 31, '2024-05-20 05:11:52', '2024-05-20 05:11:52'),
(43, 1056, 'Jeric', 'Roy', 'SALE', 388.96, 53.04, 500, 442, 58, '2024-05-20 08:20:57', '2024-05-20 08:20:57'),
(44, 1057, 'Jeric', 'Mira', 'SALE', 35.2, 4.8, 50, 40, 10, '2024-05-21 05:14:37', '2024-05-21 05:14:37'),
(45, 1058, 'Jeric', 'Customer', 'SALE', 448.8, 61.2, 520, 510, 10, '2024-05-21 05:31:31', '2024-05-21 05:31:31'),
(46, 1059, 'Jeric', 'Roy', 'SALE', 179.52, 24.48, 210, 204, 6, '2024-05-21 05:32:26', '2024-05-21 05:32:26'),
(47, 1060, 'Jeric', 'Customer', 'SALE', 219.12, 29.88, 250, 249, 1, '2024-05-21 05:33:02', '2024-05-21 05:33:02'),
(48, 1061, 'Jeric', 'Customer', 'SALE', 21.12, 2.88, 50, 24, 26, '2024-05-21 05:36:07', '2024-05-21 05:36:07'),
(49, 1062, 'Jeric', 'Customer', 'SALE', 38.72, 5.28, 50, 44, 6, '2024-05-21 05:44:55', '2024-05-21 05:44:55'),
(50, 1063, 'Jeric', 'Customer', 'SALE', 129.36, 17.64, 200, 147, 53, '2024-05-21 05:45:54', '2024-05-21 05:45:54'),
(51, 1064, 'Jeric', 'Olive', 'SALE', 104.72, 14.28, 120, 119, 1, '2024-05-21 05:51:57', '2024-05-21 05:51:57'),
(52, 1065, 'Jeric', 'Pia', 'SALE', 117.92, 16.08, 200, 134, 66, '2024-05-21 05:52:18', '2024-05-21 05:52:18'),
(53, 1066, 'Jeric', 'Vince', 'SALE', 79.2, 10.8, 100, 90, 10, '2024-05-21 06:14:55', '2024-05-21 06:14:55'),
(54, 1067, 'Jeric', 'Olive', 'SALE', 229.68, 31.32, 300, 261, 39, '2024-05-21 06:15:18', '2024-05-21 06:15:18'),
(55, 1068, 'Jeric', 'Olive', 'SALE', 59.84, 8.16, 100, 68, 32, '2024-05-22 04:57:08', '2024-05-22 04:57:08'),
(56, 1069, 'Krystle', 'Jeric', 'SALE', 118.8, 16.2, 200, 135, 65, '2024-05-24 11:05:57', '2024-05-24 11:05:57'),
(57, 1070, 'Krystle', 'Lorraine', 'SALE', 88, 12, 100, 100, 0, '2024-05-24 15:08:02', '2024-05-24 15:08:02'),
(58, 1071, 'Jeric', 'Vicky', 'SALE', 69.52, 9.48, 100, 79, 21, '2024-05-24 15:08:33', '2024-05-24 15:08:33'),
(59, 1072, 'Jeric', 'Patrick', 'SALE', 123.2, 16.8, 200, 140, 60, '2024-05-25 02:29:34', '2024-05-25 02:29:34'),
(60, 1073, 'Jeric', 'Olive', 'SALE', 852.72, 116.28, 1000, 969, 31, '2024-05-25 02:32:51', '2024-05-25 02:32:51'),
(61, 1074, 'Jeric', 'Customer', 'SALE', 100.32, 13.68, 200, 114, 86, '2024-05-26 12:33:34', '2024-05-26 12:33:34'),
(62, 1075, 'Jeric', 'Olive', 'SALE', 493.68, 67.32, 570, 561, 9, '2024-05-27 03:57:55', '2024-05-27 03:57:55'),
(63, 1076, 'Jeric', 'Gem', 'SALE', 86.24, 11.76, 100, 98, 2, '2024-05-29 10:31:03', '2024-05-29 10:31:03'),
(64, 1078, 'Jeric', 'Customer', 'SALE', 67.76, 9.24, 100, 77, 23, '2024-06-02 01:58:54', '2024-06-02 01:58:54'),
(65, 1079, 'Jeric', 'Customer', 'SALE', 317.68, 43.32, 370, 361, 9, '2024-06-02 02:36:40', '2024-06-02 02:36:40'),
(66, 1080, 'Jeric', 'Jana', 'SALE', 19.36, 2.64, 50, 22, 28, '2024-06-03 04:13:22', '2024-06-03 04:13:22'),
(67, 1081, 'Jeric', 'Lorraine', 'SALE', 42.24, 5.76, 50, 48, 2, '2024-06-03 04:30:52', '2024-06-03 04:30:52'),
(68, 1082, 'Jeric', 'Customer', 'SALE', 47.52, 6.48, 100, 54, 46, '2024-06-03 05:23:33', '2024-06-03 05:23:33'),
(69, 1083, 'Jeric', 'Customer', 'SALE', 161.04, 21.96, 200, 183, 17, '2024-06-03 08:22:44', '2024-06-03 08:22:44'),
(70, 1084, 'Jeric', 'Customer', 'SALE', 856.24, 116.76, 1000, 973, 27, '2024-06-03 15:07:38', '2024-06-03 15:07:38'),
(71, 1085, 'Jeric', 'Customer', 'SALE', 21.12, 2.88, 50, 24, 26, '2024-06-08 07:11:32', '2024-06-08 07:11:32'),
(72, 1086, 'Jeric', 'Customer', 'SALE', 26.4, 3.6, 100, 30, 70, '2024-06-10 09:36:49', '2024-06-10 09:36:49'),
(73, 1087, 'Jeric', 'Customer', 'SALE', 68.64, 9.36, 100, 78, 22, '2024-06-10 09:37:44', '2024-06-10 09:37:44'),
(74, 1088, 'Jeric', 'Customer', 'SALE', 462.88, 63.12, 600, 526, 74, '2024-06-10 15:44:42', '2024-06-10 15:44:42'),
(75, 1089, 'Jeric', 'Customer', 'SALE', 213.84, 29.16, 245, 243, 2, '2024-06-10 15:52:08', '2024-06-10 15:52:08'),
(76, 1090, 'Jeric', 'Customer', 'SALE', 184.8, 25.2, 220, 210, 10, '2024-06-10 15:54:16', '2024-06-10 15:54:16'),
(77, 1091, 'Jeric', 'Customer', 'SALE', 7.04, 0.96, 5, 8, -3, '2024-06-10 15:54:29', '2024-06-10 15:54:29'),
(78, 1092, 'Jeric', 'Customer', 'SALE', 28.16, 3.84, 50, 32, 18, '2024-06-10 15:56:27', '2024-06-10 15:56:27'),
(79, 1093, 'Jeric', 'Customer', 'SALE', 21.12, 2.88, 245, 24, 221, '2024-06-10 15:58:41', '2024-06-10 15:58:41'),
(80, 1094, 'Jeric', 'Customer', 'SALE', 21.12, 2.88, 24, 24, 0, '2024-06-10 15:58:54', '2024-06-10 15:58:54'),
(81, 1095, 'Jeric', 'Customer', 'SALE', 8.8, 1.2, 15, 10, 5, '2024-06-10 15:59:39', '2024-06-10 15:59:39'),
(82, 1096, 'Jeric', 'Customer', 'SALE', 311.52, 42.48, 500, 354, 146, '2024-06-10 16:10:38', '2024-06-10 16:10:38'),
(83, 1097, 'Jeric', 'Customer', 'SALE', 12.32, 1.68, 50, 14, 36, '2024-06-10 16:12:41', '2024-06-10 16:12:41'),
(84, 1098, 'Jeric', 'Customer', 'SALE', 19.36, 2.64, 50, 22, 28, '2024-06-10 16:12:48', '2024-06-10 16:12:48'),
(85, 1099, 'Jeric', 'Customer', 'SALE', 42.24, 5.76, 20, 48, -28, '2024-06-10 16:14:31', '2024-06-10 16:14:31'),
(86, 1100, 'Jeric', 'Customer', 'SALE', 61.6, 8.4, 70, 70, 0, '2024-06-10 16:15:03', '2024-06-10 16:15:03'),
(87, 1101, 'Jeric', 'Lorraine', 'SALE', 19.36, 2.64, 22, 22, 0, '2024-06-10 17:24:43', '2024-06-10 17:24:43'),
(88, 1102, 'Jeric', 'Pia', 'SALE', 155.76, 21.24, 200, 177, 23, '2024-06-10 17:46:33', '2024-06-10 17:46:33'),
(89, 1103, 'Jeric', 'Customer', 'SALE', 61.6, 8.4, 100, 70, 30, '2024-06-10 17:49:24', '2024-06-10 17:49:24'),
(90, 1104, 'Krystle', 'Ton', 'SALE', 51.04, 6.96, 58, 58, 0, '2024-06-11 05:42:17', '2024-06-11 05:42:17'),
(91, 1105, 'Krystle', 'Alliah', 'SALE', 237.6, 32.4, 270, 270, 0, '2024-06-11 06:04:29', '2024-06-11 06:04:29'),
(92, 1106, 'Krystle', 'Olive4801010105107', 'SALE', 73.04, 9.96, 100, 83, 17, '2024-06-11 06:07:04', '2024-06-11 06:07:04'),
(93, 1107, 'Krystle', 'Mira', 'SALE', 39.6, 5.4, 50, 45, 5, '2024-06-11 06:07:29', '2024-06-11 06:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menus`
--

CREATE TABLE `tbl_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_menus`
--

INSERT INTO `tbl_menus` (`id`, `food_name`, `image_name`, `price`, `category`) VALUES
(1, 'Sopas', 'sopas', '20', 'breakfast'),
(2, 'Spaghetti', 'spaghetti', '20', 'breakfast'),
(3, 'Palabok', 'palabok', '25', 'breakfast'),
(4, 'Baked Macaroni', 'baked-mac', '25', 'breakfast');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shifts`
--

CREATE TABLE `tbl_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cashier` varchar(255) NOT NULL,
  `POS_number` varchar(255) NOT NULL,
  `starting_cash` int(11) NOT NULL,
  `closing_cash` int(11) NOT NULL,
  `cash_in` int(11) DEFAULT NULL,
  `cash_out` int(11) DEFAULT NULL,
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
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cashiers`
--
ALTER TABLE `tbl_cashiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_history`
--
ALTER TABLE `tbl_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shifts`
--
ALTER TABLE `tbl_shifts`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=397;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_cashiers`
--
ALTER TABLE `tbl_cashiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_history`
--
ALTER TABLE `tbl_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `tbl_menus`
--
ALTER TABLE `tbl_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_shifts`
--
ALTER TABLE `tbl_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
