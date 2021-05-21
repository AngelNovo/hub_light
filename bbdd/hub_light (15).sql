-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 21, 2021 at 05:21 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hub_light`
--

-- --------------------------------------------------------

--
-- Table structure for table `analitiques_generals`
--

CREATE TABLE `analitiques_generals` (
  `id` int(11) NOT NULL,
  `usuaris_suspes` int(11) NOT NULL DEFAULT '0',
  `usuaris_actius` int(11) NOT NULL DEFAULT '0',
  `usuaris_enperill` int(11) NOT NULL DEFAULT '0',
  `contenido_total` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `analitiques_generals`
--

INSERT INTO `analitiques_generals` (`id`, `usuaris_suspes`, `usuaris_actius`, `usuaris_enperill`, `contenido_total`, `created_at`, `updated_at`) VALUES
(1, 2, 6, 0, 20, '2021-05-16 15:24:59', '2021-05-16 19:55:25'),
(2, 2, 6, 0, 26, '2021-05-17 10:01:48', '2021-05-17 15:25:25'),
(3, 2, 6, 0, 26, '2021-05-18 04:09:43', '2021-05-18 04:09:43'),
(4, 2, 5, 1, 27, '2021-05-19 04:07:42', '2021-05-19 06:12:58'),
(5, 2, 5, 1, 27, '2021-05-20 04:45:13', '2021-05-20 04:45:13'),
(6, 6, 2, 0, 28, '2021-05-21 04:54:14', '2021-05-21 10:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
  `id` int(10) UNSIGNED NOT NULL,
  `explicacio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gravetat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`id`, `explicacio`, `gravetat`, `created_at`, `updated_at`) VALUES
(1, 'Uno o varios comentarios ofensivos', '2', '2021-05-05 16:09:25', '2021-05-05 16:09:25'),
(2, 'Contenido inapropiado', '5', '2021-05-05 17:30:52', '2021-05-05 17:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `avis_usuari`
--

CREATE TABLE `avis_usuari` (
  `id` int(11) NOT NULL,
  `id_usuari` int(10) UNSIGNED NOT NULL,
  `id_avis` int(10) UNSIGNED NOT NULL,
  `acceptat` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `avis_usuari`
--

INSERT INTO `avis_usuari` (`id`, `id_usuari`, `id_avis`, `acceptat`, `created_at`, `updated_at`) VALUES
(1, 13, 1, '1', '2021-05-14 12:24:40', '2021-05-14 12:26:13'),
(2, 13, 2, '1', '2021-05-14 12:24:42', '2021-05-14 12:24:45'),
(3, 13, 1, '1', '2021-05-14 12:26:30', '2021-05-14 12:29:00'),
(4, 13, 2, '1', '2021-05-14 12:26:32', '2021-05-14 12:28:59'),
(5, 11, 1, '1', '2021-05-14 12:30:41', '2021-05-14 12:30:45'),
(6, 11, 2, '1', '2021-05-14 12:30:43', '2021-05-14 12:30:45'),
(7, 13, 1, '1', '2021-05-14 12:36:43', '2021-05-14 12:36:49'),
(8, 13, 2, '1', '2021-05-14 12:36:45', '2021-05-14 12:36:47'),
(9, 13, 1, '1', '2021-05-14 12:38:47', '2021-05-14 12:38:52'),
(10, 13, 2, '1', '2021-05-14 12:38:49', '2021-05-14 12:38:51'),
(11, 11, 1, '1', '2021-05-14 12:41:14', '2021-05-14 12:41:19'),
(12, 11, 2, '1', '2021-05-14 12:41:16', '2021-05-14 12:41:19'),
(13, 11, 2, '1', '2021-05-14 12:42:32', '2021-05-14 12:42:34'),
(14, 5, 1, '1', '2021-05-14 12:42:51', '2021-05-14 12:42:56'),
(15, 13, 1, '1', '2021-05-14 12:43:35', '2021-05-14 12:43:39'),
(16, 13, 2, '1', '2021-05-14 12:43:55', '2021-05-14 12:43:57'),
(17, 5, 1, '1', '2021-05-14 12:45:21', '2021-05-14 12:45:26'),
(18, 5, 2, '1', '2021-05-14 12:45:24', '2021-05-14 12:45:25'),
(19, 13, 1, '1', '2021-05-14 12:47:32', '2021-05-14 12:47:43'),
(20, 13, 2, '1', '2021-05-14 12:47:35', '2021-05-14 12:47:50'),
(21, 13, 1, '1', '2021-05-14 12:55:03', '2021-05-14 12:55:14'),
(22, 13, 2, '1', '2021-05-14 12:55:06', '2021-05-14 12:55:09'),
(23, 13, 1, '1', '2021-05-14 12:57:48', '2021-05-14 12:57:53'),
(24, 13, 2, '1', '2021-05-14 12:57:50', '2021-05-14 12:57:52'),
(28, 5, 2, '1', '2021-05-15 07:30:49', '2021-05-15 07:31:28'),
(37, 5, 2, '1', '2021-05-15 07:41:28', '2021-05-15 07:41:30'),
(38, 5, 1, '1', '2021-05-15 07:41:53', '2021-05-15 07:41:55'),
(52, 11, 1, '1', '2021-05-15 07:57:08', '2021-05-15 07:57:14'),
(53, 11, 2, '1', '2021-05-15 07:57:11', '2021-05-15 07:57:14'),
(56, 1, 1, '1', '2021-05-15 08:09:12', '2021-05-15 08:09:17'),
(57, 1, 2, '1', '2021-05-15 08:09:14', '2021-05-15 08:09:17'),
(64, 10, 1, '1', '2021-05-15 12:41:15', '2021-05-15 12:41:27'),
(65, 10, 2, '1', '2021-05-15 12:41:18', '2021-05-15 12:41:30'),
(66, 10, 2, '1', '2021-05-15 12:41:20', '2021-05-15 12:41:26'),
(72, 1, 1, '1', '2021-05-15 12:48:58', '2021-05-15 12:49:07'),
(73, 1, 2, '1', '2021-05-15 12:49:00', '2021-05-15 12:49:13'),
(74, 1, 2, '1', '2021-05-15 12:49:02', '2021-05-15 12:49:06'),
(75, 1, 1, '1', '2021-05-15 12:51:16', '2021-05-15 12:51:56'),
(76, 1, 1, '1', '2021-05-15 12:51:19', '2021-05-15 12:51:32'),
(77, 1, 2, '1', '2021-05-15 12:51:22', '2021-05-15 12:51:31'),
(78, 1, 1, '1', '2021-05-15 12:55:50', '2021-05-15 12:56:17'),
(79, 1, 1, '1', '2021-05-15 12:55:52', '2021-05-15 12:56:09'),
(80, 1, 2, '1', '2021-05-15 12:55:54', '2021-05-15 12:56:07'),
(81, 1, 1, '1', '2021-05-15 12:59:32', '2021-05-15 12:59:42'),
(82, 1, 2, '1', '2021-05-15 12:59:35', '2021-05-15 12:59:47'),
(83, 1, 2, '1', '2021-05-15 12:59:37', '2021-05-15 12:59:40'),
(84, 1, 1, '1', '2021-05-15 13:00:54', '2021-05-15 13:01:03'),
(85, 1, 2, '1', '2021-05-15 13:00:56', '2021-05-15 13:01:02'),
(86, 1, 2, '1', '2021-05-15 13:00:58', '2021-05-15 13:01:10'),
(87, 1, 1, '1', '2021-05-15 13:01:32', '2021-05-15 13:01:37'),
(88, 1, 2, '1', '2021-05-15 13:01:34', '2021-05-15 13:01:36'),
(89, 1, 1, '1', '2021-05-19 05:55:18', '2021-05-19 05:55:23'),
(90, 1, 2, '1', '2021-05-19 05:55:20', '2021-05-19 05:55:22'),
(91, 1, 1, '1', '2021-05-21 05:51:27', '2021-05-21 05:51:32'),
(114, 14, 1, '1', '2021-05-21 07:16:12', '2021-05-21 07:16:22'),
(115, 14, 1, '1', '2021-05-21 07:16:13', '2021-05-21 07:16:21'),
(116, 14, 2, '1', '2021-05-21 07:16:15', '2021-05-21 07:16:20'),
(117, 14, 1, '1', '2021-05-21 07:16:33', '2021-05-21 07:16:35'),
(140, 1, 1, '1', '2021-05-21 07:31:24', '2021-05-21 07:31:28'),
(141, 1, 2, '1', '2021-05-21 07:31:26', '2021-05-21 07:31:27'),
(142, 1, 1, '1', '2021-05-21 07:32:38', '2021-05-21 07:32:43'),
(143, 1, 2, '1', '2021-05-21 07:32:40', '2021-05-21 07:32:42'),
(144, 1, 2, '1', '2021-05-21 07:33:00', '2021-05-21 07:33:05'),
(145, 1, 2, '1', '2021-05-21 07:33:03', '2021-05-21 07:33:05'),
(146, 1, 1, '1', '2021-05-21 07:33:25', '2021-05-21 07:33:29'),
(147, 1, 2, '1', '2021-05-21 07:33:27', '2021-05-21 07:33:29'),
(181, 1, 1, '1', '2021-05-21 07:48:09', '2021-05-21 07:48:19'),
(182, 1, 2, '1', '2021-05-21 07:48:11', '2021-05-21 07:48:18'),
(183, 1, 2, '1', '2021-05-21 07:48:13', '2021-05-21 07:48:25'),
(184, 1, 1, '1', '2021-05-21 07:50:28', '2021-05-21 07:50:47'),
(185, 1, 2, '1', '2021-05-21 07:50:32', '2021-05-21 07:50:40'),
(186, 1, 2, '1', '2021-05-21 07:50:34', '2021-05-21 07:50:49'),
(187, 1, 1, '1', '2021-05-21 07:51:08', '2021-05-21 07:51:12'),
(188, 1, 2, '1', '2021-05-21 07:51:10', '2021-05-21 07:51:17'),
(189, 1, 1, '1', '2021-05-21 07:57:37', '2021-05-21 07:57:44'),
(190, 1, 2, '1', '2021-05-21 07:57:38', '2021-05-21 07:58:10'),
(191, 1, 2, '1', '2021-05-21 07:57:41', '2021-05-21 07:58:41'),
(192, 1, 2, '1', '2021-05-21 08:00:18', '2021-05-21 08:00:19'),
(193, 1, 2, '1', '2021-05-21 08:00:26', '2021-05-21 08:00:28'),
(194, 1, 2, '1', '2021-05-21 08:00:40', '2021-05-21 08:00:44'),
(195, 1, 1, '1', '2021-05-21 08:01:32', '2021-05-21 08:01:41'),
(196, 1, 2, '1', '2021-05-21 08:01:34', '2021-05-21 08:01:40'),
(197, 1, 2, '1', '2021-05-21 08:01:36', '2021-05-21 08:01:45'),
(198, 1, 1, '1', '2021-05-21 08:02:53', '2021-05-21 08:03:06'),
(199, 1, 2, '1', '2021-05-21 08:02:55', '2021-05-21 08:03:02'),
(200, 1, 2, '1', '2021-05-21 08:02:58', '2021-05-21 08:03:14'),
(201, 1, 1, '1', '2021-05-21 08:04:22', '2021-05-21 08:04:34'),
(202, 1, 2, '1', '2021-05-21 08:04:24', '2021-05-21 08:04:32'),
(203, 1, 2, '1', '2021-05-21 08:04:26', '2021-05-21 08:05:17'),
(204, 1, 1, '1', '2021-05-21 08:05:14', '2021-05-21 08:08:54'),
(205, 1, 1, '1', '2021-05-21 08:09:14', '2021-05-21 08:09:22'),
(206, 1, 2, '1', '2021-05-21 08:09:16', '2021-05-21 08:09:24'),
(207, 1, 2, '1', '2021-05-21 08:09:18', '2021-05-21 08:11:16'),
(208, 1, 1, '1', '2021-05-21 08:11:23', '2021-05-21 08:11:31'),
(209, 1, 2, '1', '2021-05-21 08:11:26', '2021-05-21 08:11:34'),
(210, 1, 2, '1', '2021-05-21 08:11:28', '2021-05-21 08:11:44'),
(211, 1, 1, '1', '2021-05-21 08:12:13', '2021-05-21 08:12:27'),
(212, 1, 2, '1', '2021-05-21 08:12:15', '2021-05-21 08:12:32'),
(213, 1, 2, '1', '2021-05-21 08:12:18', '2021-05-21 08:12:21'),
(214, 1, 1, '1', '2021-05-21 08:12:48', '2021-05-21 08:12:57'),
(215, 1, 2, '1', '2021-05-21 08:12:51', '2021-05-21 08:12:59'),
(216, 1, 2, '1', '2021-05-21 08:12:53', '2021-05-21 08:13:28'),
(217, 1, 1, '1', '2021-05-21 08:13:37', '2021-05-21 08:13:45'),
(218, 1, 2, '1', '2021-05-21 08:13:39', '2021-05-21 08:13:44'),
(219, 1, 2, '1', '2021-05-21 08:13:41', '2021-05-21 08:14:28'),
(220, 1, 1, '1', '2021-05-21 08:14:36', '2021-05-21 08:14:44'),
(221, 1, 2, '1', '2021-05-21 08:14:38', '2021-05-21 08:14:46'),
(222, 1, 2, '1', '2021-05-21 08:14:41', '2021-05-21 08:14:49'),
(223, 1, 1, '1', '2021-05-21 08:15:56', '2021-05-21 08:16:04'),
(224, 1, 2, '1', '2021-05-21 08:15:59', '2021-05-21 08:16:05'),
(225, 1, 2, '1', '2021-05-21 08:16:01', '2021-05-21 08:16:28'),
(226, 1, 1, '1', '2021-05-21 08:16:42', '2021-05-21 08:16:51'),
(227, 1, 2, '1', '2021-05-21 08:16:44', '2021-05-21 08:16:49'),
(228, 1, 2, '1', '2021-05-21 08:16:46', '2021-05-21 08:16:54'),
(229, 1, 1, '1', '2021-05-21 08:18:54', '2021-05-21 08:19:02'),
(230, 1, 2, '1', '2021-05-21 08:18:56', '2021-05-21 08:19:05'),
(231, 1, 2, '1', '2021-05-21 08:18:59', '2021-05-21 08:19:09'),
(232, 1, 1, '1', '2021-05-21 08:56:09', '2021-05-21 08:56:19'),
(233, 1, 2, '1', '2021-05-21 08:56:11', '2021-05-21 08:56:22'),
(234, 1, 2, '1', '2021-05-21 08:56:13', '2021-05-21 08:56:16'),
(235, 1, 1, '1', '2021-05-21 08:58:21', '2021-05-21 08:58:39'),
(236, 1, 2, '1', '2021-05-21 08:58:24', '2021-05-21 08:58:42'),
(237, 1, 2, '1', '2021-05-21 08:58:28', '2021-05-21 08:58:50'),
(239, 1, 2, '1', '2021-05-21 09:23:54', '2021-05-21 09:23:59'),
(241, 1, 1, '1', '2021-05-21 09:24:23', '2021-05-21 09:25:28'),
(242, 1, 2, '1', '2021-05-21 09:24:24', '2021-05-21 09:24:30'),
(243, 1, 2, '1', '2021-05-21 09:24:27', '2021-05-21 09:25:25'),
(244, 1, 2, '1', '2021-05-21 09:25:35', '2021-05-21 09:25:36'),
(245, 1, 1, '1', '2021-05-21 09:27:04', '2021-05-21 09:27:13'),
(246, 1, 2, '1', '2021-05-21 09:27:06', '2021-05-21 09:27:10'),
(247, 1, 2, '1', '2021-05-21 09:27:08', '2021-05-21 09:27:15'),
(248, 1, 1, '1', '2021-05-21 10:45:54', '2021-05-21 10:46:05'),
(249, 1, 2, '1', '2021-05-21 10:45:57', '2021-05-21 10:46:01'),
(250, 1, 2, '1', '2021-05-21 10:45:59', '2021-05-21 10:46:14'),
(251, 1, 1, '1', '2021-05-21 10:46:33', '2021-05-21 10:46:52'),
(252, 1, 2, '1', '2021-05-21 10:46:35', '2021-05-21 10:46:41'),
(253, 1, 2, '1', '2021-05-21 10:46:37', '2021-05-21 10:46:59'),
(254, 1, 1, '1', '2021-05-21 10:47:20', '2021-05-21 10:47:32'),
(255, 1, 2, '1', '2021-05-21 10:47:22', '2021-05-21 10:47:27'),
(256, 1, 2, '1', '2021-05-21 10:47:24', '2021-05-21 10:47:39'),
(257, 1, 1, '1', '2021-05-21 10:49:16', '2021-05-21 10:49:33'),
(258, 1, 2, '1', '2021-05-21 10:49:19', '2021-05-21 10:49:24'),
(259, 1, 2, '1', '2021-05-21 10:49:21', '2021-05-21 10:49:37'),
(260, 1, 2, '1', '2021-05-21 10:49:51', '2021-05-21 10:49:54'),
(261, 1, 1, '1', '2021-05-21 10:50:33', '2021-05-21 10:50:51'),
(262, 1, 2, '1', '2021-05-21 10:50:34', '2021-05-21 10:50:40'),
(263, 1, 2, '1', '2021-05-21 10:50:37', '2021-05-21 10:50:55'),
(264, 1, 1, '1', '2021-05-21 10:51:20', '2021-05-21 10:51:31'),
(265, 1, 2, '1', '2021-05-21 10:51:22', '2021-05-21 10:51:27'),
(266, 1, 2, '1', '2021-05-21 10:51:24', '2021-05-21 10:51:34'),
(267, 1, 2, '1', '2021-05-21 10:51:47', '2021-05-21 10:51:53'),
(268, 1, 1, '1', '2021-05-21 10:51:49', '2021-05-21 10:51:50'),
(269, 31, 1, '1', '2021-05-21 10:54:03', '2021-05-21 10:54:20'),
(270, 31, 2, '1', '2021-05-21 10:54:05', '2021-05-21 10:54:25'),
(271, 31, 2, '1', '2021-05-21 10:54:07', '2021-05-21 10:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `contingut`
--

CREATE TABLE `contingut` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portada` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `majoria_edat` tinyint(1) NOT NULL DEFAULT '0',
  `reportat` tinyint(1) NOT NULL DEFAULT '0',
  `propietari` int(10) UNSIGNED NOT NULL,
  `tipus_contingut` int(10) UNSIGNED NOT NULL,
  `drets_autor` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contingut`
--

INSERT INTO `contingut` (`id`, `titulo`, `portada`, `link_copyright`, `url`, `descripcio`, `majoria_edat`, `reportat`, `propietari`, `tipus_contingut`, `drets_autor`, `created_at`, `updated_at`) VALUES
(45, 'Mona China', NULL, NULL, '1621188864-Llabreso.jpg', NULL, 0, 0, 5, 1, 2, '2021-05-16 16:14:24', '2021-05-16 16:14:24'),
(46, 'Montañas de Albacete', NULL, NULL, '1621189209-Llabreso.jpg', 'Es la sierra de albacete', 0, 0, 5, 1, 2, '2021-05-16 16:20:09', '2021-05-16 16:20:09'),
(47, 'Deberes Accesibilitat', '1621189571-Llabreso.jpg', NULL, '1621189571-Llabreso.pdf', 'Son mis deberes', 1, 0, 5, 2, 2, '2021-05-16 16:26:11', '2021-05-16 16:26:11'),
(48, 'Spoiler', '1621190182-Llabreso.png', NULL, '1621190182-Llabreso.mp3', NULL, 0, 0, 5, 3, 2, '2021-05-16 16:36:22', '2021-05-21 05:51:42'),
(49, 'Berserku', NULL, NULL, '1621200193-Llabreso.jpg', NULL, 1, 0, 5, 1, 2, '2021-05-16 19:23:13', '2021-05-21 05:51:47'),
(50, NULL, NULL, NULL, '1621200205-Llabreso.jpg', NULL, 0, 0, 5, 1, 2, '2021-05-16 19:23:25', '2021-05-16 19:23:25'),
(51, NULL, NULL, NULL, '1621200213-Llabreso.jpg', NULL, 0, 0, 5, 1, 2, '2021-05-16 19:23:33', '2021-05-16 19:23:33'),
(52, NULL, NULL, NULL, '1621200221-Llabreso.jpg', NULL, 0, 0, 5, 1, 2, '2021-05-16 19:23:41', '2021-05-16 19:23:41'),
(53, NULL, NULL, NULL, '1621200254-Llabreso.jpg', NULL, 0, 0, 5, 1, 2, '2021-05-16 19:24:14', '2021-05-16 19:24:14'),
(54, NULL, NULL, NULL, '1621200269-Llabreso.png', NULL, 1, 0, 5, 1, 2, '2021-05-16 19:24:29', '2021-05-16 19:24:29'),
(55, NULL, NULL, NULL, '1621200279-Llabreso.png', NULL, 0, 0, 5, 1, 2, '2021-05-16 19:24:39', '2021-05-16 19:24:39'),
(56, 'Meme Ibai', '1621201782-Llabreso.webp', NULL, '1621201782-Llabreso.mp4', NULL, 0, 0, 5, 4, 2, '2021-05-16 19:49:42', '2021-05-16 19:49:42'),
(57, 'Zips', '1621202125-Llabreso.png', NULL, '1621202125-Llabreso.zip', NULL, 0, 0, 5, 5, 2, '2021-05-16 19:55:25', '2021-05-16 19:55:25'),
(58, NULL, NULL, NULL, '1621266209-Llabreso.jpg', NULL, 0, 0, 5, 1, 2, '2021-05-17 13:43:29', '2021-05-17 13:43:29'),
(59, 'Monkey Flip', '1621266876-Llabreso.jpg', NULL, '1621266876-Llabreso.mp4', NULL, 0, 0, 5, 4, 2, '2021-05-17 13:54:36', '2021-05-17 13:54:36'),
(60, 'Cute Guardiana', NULL, NULL, '1621267519-Llabreso.png', NULL, 0, 0, 5, 1, 2, '2021-05-17 14:05:19', '2021-05-17 14:05:19'),
(61, NULL, NULL, NULL, '1621272042-AngelNovo2.jpg', NULL, 0, 0, 14, 1, 2, '2021-05-17 15:20:42', '2021-05-17 15:20:42'),
(63, 'Igor', NULL, NULL, '1621272207-AngelNovo2.jpg', 'Just igor', 1, 0, 14, 1, 2, '2021-05-17 15:23:27', '2021-05-17 15:23:27'),
(64, 'thor', NULL, NULL, '1621272325-AngelNovo2.jpg', 'Just thor', 1, 0, 14, 1, 2, '2021-05-17 15:25:25', '2021-05-17 15:25:25'),
(65, 'Golden skull', NULL, NULL, '1621411977-AngelNovo2.jpg', 'Just a skull', 0, 0, 14, 1, 2, '2021-05-19 06:12:58', '2021-05-19 06:12:58'),
(66, 'er zuperman', NULL, NULL, '1621580079-AngelNovo2.jpg', 'Ojo que es rojo', 0, 0, 14, 1, 2, '2021-05-21 04:54:39', '2021-05-21 04:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `contingut_tag`
--

CREATE TABLE `contingut_tag` (
  `id_contingut` int(10) UNSIGNED NOT NULL,
  `id_tag` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contingut_tag`
--

INSERT INTO `contingut_tag` (`id_contingut`, `id_tag`, `created_at`, `updated_at`) VALUES
(45, 45, '2021-05-16 16:14:24', '2021-05-16 16:14:24'),
(45, 46, '2021-05-16 16:14:24', '2021-05-16 16:14:24'),
(45, 47, '2021-05-16 16:14:24', '2021-05-16 16:14:24'),
(60, 57, '2021-05-17 14:05:19', '2021-05-17 14:05:19'),
(60, 58, '2021-05-17 14:05:19', '2021-05-17 14:05:19'),
(60, 59, '2021-05-17 14:05:19', '2021-05-17 14:05:19'),
(65, 63, '2021-05-19 06:12:58', '2021-05-19 06:12:58'),
(65, 64, '2021-05-19 06:12:58', '2021-05-19 06:12:58'),
(66, 67, '2021-05-21 04:54:39', '2021-05-21 04:54:39'),
(66, 68, '2021-05-21 04:54:39', '2021-05-21 04:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `dret_autor`
--

CREATE TABLE `dret_autor` (
  `id_dret` int(10) UNSIGNED NOT NULL,
  `tipus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icona` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dret_autor`
--

INSERT INTO `dret_autor` (`id_dret`, `tipus`, `icona`, `created_at`, `updated_at`) VALUES
(1, 'All rights reserved', '', NULL, NULL),
(2, 'Creative commons zero', 'Licencia-Z.png', NULL, NULL),
(3, 'Creative Commons Attribution-NonCommercial', 'Licencia-AnC.png', NULL, NULL),
(4, 'Creative Commons Attribution-NonCommercial-ShareAlike', 'Licencia-AnCSA.png', NULL, NULL),
(5, 'Creative Commons Attribution-NonCommercial-NoDerivatives', 'Licencia-AnCnD.png', NULL, NULL),
(6, 'Creative Commons Attribution-NoDerivatives', 'Licencia-AnD.png', NULL, NULL),
(7, 'Creative Commons Attribution-ShareAlike', 'Licencia-AS.png', NULL, NULL),
(8, 'Creative Commons Attribution', 'Licencia-A.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `estadistiques`
--

CREATE TABLE `estadistiques` (
  `id_estadistica` int(10) UNSIGNED NOT NULL,
  `q_comentaris` int(11) NOT NULL DEFAULT '0',
  `q_likes` int(11) NOT NULL DEFAULT '0',
  `q_seguidors` int(11) NOT NULL DEFAULT '0',
  `q_seguits` int(11) NOT NULL DEFAULT '0',
  `q_likes_mensuals` int(11) NOT NULL DEFAULT '0',
  `q_comentaris_mensuals` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `estadistiques`
--

INSERT INTO `estadistiques` (`id_estadistica`, `q_comentaris`, `q_likes`, `q_seguidors`, `q_seguits`, `q_likes_mensuals`, `q_comentaris_mensuals`, `created_at`, `updated_at`) VALUES
(26, 0, 0, 0, 0, 0, 0, '2021-05-21 05:31:25', '2021-05-21 05:31:25'),
(27, 0, 0, 0, 0, 0, 0, '2021-05-21 05:31:41', '2021-05-21 05:31:41'),
(28, 0, 0, 0, 0, 0, 0, '2021-05-21 05:31:47', '2021-05-21 05:31:47'),
(29, 0, 0, 0, 0, 0, 0, '2021-05-21 05:32:03', '2021-05-21 05:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `estadistiques_contingut`
--

CREATE TABLE `estadistiques_contingut` (
  `id_estadistica` int(10) UNSIGNED NOT NULL,
  `q_comentaris` int(11) NOT NULL DEFAULT '0',
  `q_likes` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grup`
--

CREATE TABLE `grup` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suspes` tinyint(1) NOT NULL,
  `xat` int(10) UNSIGNED NOT NULL,
  `estadistica` int(10) UNSIGNED NOT NULL,
  `tipus_usuari` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grups_usuaris`
--

CREATE TABLE `grups_usuaris` (
  `id_usuari` int(10) UNSIGNED NOT NULL,
  `id_grup` int(10) UNSIGNED NOT NULL,
  `es_admin` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interaccio`
--

CREATE TABLE `interaccio` (
  `id` int(11) NOT NULL,
  `id_usuari` int(10) UNSIGNED NOT NULL,
  `id_contingut` int(10) UNSIGNED NOT NULL,
  `guardat` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0',
  `megusta` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0',
  `comentario` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `visto` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `interaccio`
--

INSERT INTO `interaccio` (`id`, `id_usuari`, `id_contingut`, `guardat`, `megusta`, `comentario`, `visto`, `created_at`, `updated_at`) VALUES
(7, 14, 53, '0', '0', 'asdasdasd', '0', '2021-05-20 05:18:22', '2021-05-20 05:18:22'),
(9, 14, 57, '0', '1', 'asdasd', '0', '2021-05-20 17:42:36', '2021-05-20 16:59:48'),
(10, 14, 64, '0', '0', 'asdsadf', '1', '2021-05-20 17:57:07', '2021-05-20 18:44:39'),
(11, 10, 64, '0', '0', 'asdasdasdasd', '1', '2021-05-20 18:07:58', '2021-05-20 18:44:39'),
(12, 10, 57, '0', '1', NULL, '0', '2021-05-20 20:23:18', '2021-05-20 20:23:18'),
(13, 14, 60, '0', '0', 'test', '0', '2021-05-20 18:41:23', '2021-05-20 18:58:34'),
(14, 10, 66, '0', '1', 'sdfsdfsdf', '1', '2021-05-21 06:55:14', '2021-05-21 04:57:57');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_04_22_201544_general', 1),
(4, '2021_04_22_205414_create_users_table', 1),
(5, '2021_04_22_212023_xat', 1),
(6, '2021_04_22_212230_avis', 1),
(7, '2021_04_22_212326_grup', 1),
(8, '2021_04_22_213724_contingut', 1),
(9, '2021_04_22_214435_missatge', 1),
(10, '2021_04_22_214918_nm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `missatge`
--

CREATE TABLE `missatge` (
  `id` int(10) UNSIGNED NOT NULL,
  `missatge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_enviat` timestamp NOT NULL,
  `id_xat` int(10) UNSIGNED NOT NULL,
  `id_usuari` int(10) UNSIGNED NOT NULL,
  `id_contingut` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('test@test2', '$2y$10$y0SgPNSH.dSNc0KgUCvsd.QNrRMY9aN3lmv.QsGKQM.TGccoAltjG', '2021-05-01 18:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `seguidors`
--

CREATE TABLE `seguidors` (
  `id` int(11) NOT NULL,
  `id_usuari` int(10) UNSIGNED NOT NULL,
  `id_seguit` int(10) UNSIGNED NOT NULL,
  `acceptat` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seguidors`
--

INSERT INTO `seguidors` (`id`, `id_usuari`, `id_seguit`, `acceptat`, `created_at`, `updated_at`) VALUES
(1, 5, 14, '0', NULL, NULL),
(2, 10, 14, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(42, 'monas chinas', '2021-05-16 16:07:55', '2021-05-16 16:07:55'),
(45, 'gatos demonios', '2021-05-16 16:14:24', '2021-05-16 16:14:24'),
(46, 'explosion', '2021-05-16 16:14:24', '2021-05-16 16:14:24'),
(47, 'megumin', '2021-05-16 16:14:24', '2021-05-16 16:14:24'),
(56, 'dark souls', '2021-05-17 14:05:19', '2021-05-17 14:05:19'),
(57, 'cute', '2021-05-17 14:05:19', '2021-05-17 14:05:19'),
(58, 'mono', '2021-05-17 14:05:19', '2021-05-17 14:05:19'),
(59, 'kawai', '2021-05-17 14:05:19', '2021-05-17 14:05:19'),
(63, 'skull', '2021-05-19 06:12:58', '2021-05-19 06:12:58'),
(64, 'statue', '2021-05-19 06:12:58', '2021-05-19 06:12:58'),
(65, 'pepitogrillo', '2021-05-20 05:55:31', '2021-05-20 05:55:31'),
(66, 'elpepe', '2021-05-20 05:56:14', '2021-05-20 05:56:14'),
(67, 'zuperman', '2021-05-21 04:54:39', '2021-05-21 04:54:39'),
(68, 'rojo', '2021-05-21 04:54:39', '2021-05-21 04:54:39');

-- --------------------------------------------------------

--
-- Table structure for table `tipus_contingut`
--

CREATE TABLE `tipus_contingut` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icona` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Descripcio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `espai` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipus_contingut`
--

INSERT INTO `tipus_contingut` (`id`, `tipus`, `icona`, `created_at`, `updated_at`, `Descripcio`, `espai`) VALUES
(1, 'Imagen', '', NULL, '2021-05-17 15:00:07', 'jpg gif png jpeg svg', '4096'),
(2, 'Documento de texto', '', NULL, '2021-05-17 15:00:12', 'pdf txt', '4096'),
(3, 'Música', '', NULL, '2021-05-17 15:00:16', 'mp3 ogg', '10000'),
(4, 'Video', '', NULL, '2021-05-17 15:00:18', 'mp4 ogg', '10000'),
(5, 'Otros', '', NULL, '2021-05-17 15:00:21', 'blend tga iris sgi rar zip gz tar.gz 7z css mng webp', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `tipus_usuari`
--

CREATE TABLE `tipus_usuari` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipus_usuari`
--

INSERT INTO `tipus_usuari` (`id`, `tipus`, `created_at`, `updated_at`) VALUES
(1, 'usuari', '2021-05-01 15:45:26', '2021-05-01 15:45:26'),
(2, 'administrador', '2021-05-13 11:01:07', '2021-05-13 11:01:07'),
(3, 'superadministrador', '2021-05-13 11:01:41', '2021-05-13 11:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `alies` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'avatar.jpg',
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_naixement` timestamp NULL DEFAULT NULL,
  `data-registre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actiu` tinyint(1) NOT NULL DEFAULT '0',
  `deshabilitat` tinyint(1) NOT NULL DEFAULT '0',
  `suspes` tinyint(1) NOT NULL DEFAULT '0',
  `es_admin` tinyint(1) NOT NULL DEFAULT '0',
  `nivell_gravetat` int(11) NOT NULL DEFAULT '10',
  `grups_disponibles` int(11) NOT NULL DEFAULT '0',
  `recomenat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipus` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fondo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fondoDefault.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `email_verified_at`, `alies`, `foto`, `link`, `data_naixement`, `data-registre`, `actiu`, `deshabilitat`, `suspes`, `es_admin`, `nivell_gravetat`, `grups_disponibles`, `recomenat`, `tipus`, `remember_token`, `created_at`, `updated_at`, `fondo`) VALUES
(1, 'test', '$2y$10$n4EJbYTalgXFW9.kiPo6FeyAk9qApu5OS3UDqWoz3.yPGpMRTfDvW', 'test@test', NULL, 'test', 'avatar.jpg', NULL, NULL, NULL, 0, 0, 0, 0, 10, 0, NULL, 1, NULL, '2021-05-01 13:51:49', '2021-05-21 10:52:00', 'fondoDefault.jpg'),
(5, 'Llabreso', '$2y$10$7wlUoNiTN6Dk9sYzGDUWZunTvDlnaZNMEguXynjErf3YYC0A2p.8K', 'joanllabresoliver@gmail.com', '2021-05-08 09:30:50', 'Llabreso', '1620757944-.jpg', NULL, '2001-09-12 08:54:48', NULL, 0, 0, 0, 1, 10, 0, NULL, 1, NULL, '2021-05-05 19:06:19', '2021-05-21 10:45:49', '1620757917-Llabreso.jpg'),
(10, 'asdasda', '$2y$10$fMjp/4HvAjHrptsLmeL3huizotI2B96dMHbCc/NNf8eNewr3hJff.', 'asdasd@sdfbkj', NULL, 'asdasda', 'avatar.jpg', NULL, NULL, NULL, 0, 0, 0, 0, 10, 0, NULL, 1, NULL, '2021-05-14 07:40:06', '2021-05-15 12:48:51', 'fondoDefault.jpg'),
(11, 'jndbasjkhidbsakj', '$2y$10$sBLApHMMlhvvh0mzKYsi8OYP9ZslU.twnUdwZeIz7.VLGjngQZQZi', 'kjasdfnasf@aseknfbnksf', NULL, 'jndbasjkhidbsakj', 'avatar.jpg', NULL, NULL, NULL, 0, 0, 0, 0, 10, 0, NULL, 1, NULL, '2021-05-14 07:57:58', '2021-05-15 07:57:27', 'fondoDefault.jpg'),
(12, 'lkjmasdkjasb', '$2y$10$7wElszXdDGzBHz53jlYz2OQsxFy8QaEb3Ir5B1ygiiO9V5dMoJ0kS', 'kjasbdjk@skjdnfkj', NULL, 'lkjmasdkjasb', 'avatar.jpg', NULL, NULL, NULL, 0, 0, 0, 0, 10, 0, NULL, 1, NULL, '2021-05-14 07:59:24', '2021-05-15 07:56:07', 'fondoDefault.jpg'),
(13, 'ertrrdfdf', '$2y$10$vxsq2QJpCkvNUHSt5YKer.7sQfDvHVWJmK0tON9Qx733peZwfA6au', 'hhfdhfdfdh@sdfdsfdfs', NULL, 'ertrrdfdf', 'avatar.jpg', NULL, NULL, NULL, 0, 0, 1, 0, 0, 0, NULL, 1, NULL, '2021-05-14 11:37:49', '2021-05-15 12:40:00', 'fondoDefault.jpg'),
(14, 'AngelNovo2', '$2y$10$qATldsDOxR90RKnlQjprreqZN4d9CJoDpjH1WPHMjlM2ccngDsFwe', 'angelnovo@gmail.com', NULL, 'AngelNovo2', '1621278389-AngelNovo2.jpg', NULL, NULL, NULL, 1, 0, 1, 1, 0, 0, 'images;video;css;animacion', 3, NULL, '2021-05-14 15:07:26', '2021-05-21 10:53:42', '1621278389-AngelNovo2.png'),
(31, 'Luis Novo Fernando', '$2y$10$gTIltGFykr8X03br3WiaIe9SazhaZo5t8uyDc3KfzvQe0qs6w1bhq', 'angelnovo15@gmail.com', '2021-05-21 10:53:17', NULL, 'avatar.jpg', NULL, NULL, NULL, 0, 0, 0, 0, 10, 0, NULL, 1, NULL, '2021-05-21 10:53:04', '2021-05-21 10:54:50', 'fondoDefault.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `xat`
--

CREATE TABLE `xat` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `xat_grup`
--

CREATE TABLE `xat_grup` (
  `id_xat` int(10) UNSIGNED NOT NULL,
  `id_grup` int(10) UNSIGNED NOT NULL,
  `es_admin` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `xat_usuaris`
--

CREATE TABLE `xat_usuaris` (
  `id_xat` int(10) UNSIGNED NOT NULL,
  `id_usuari` int(10) UNSIGNED NOT NULL,
  `es_admin` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analitiques_generals`
--
ALTER TABLE `analitiques_generals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avis_usuari`
--
ALTER TABLE `avis_usuari`
  ADD PRIMARY KEY (`id`),
  ADD KEY `avis_usuari_id_usuari_foreign` (`id_usuari`),
  ADD KEY `avis_usuari_id_avis_foreign` (`id_avis`);

--
-- Indexes for table `contingut`
--
ALTER TABLE `contingut`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contingut_tipus_contingut_foreign` (`tipus_contingut`),
  ADD KEY `contingut_drets_autor_foreign` (`drets_autor`),
  ADD KEY `contingut_propietari_foreign` (`propietari`);

--
-- Indexes for table `contingut_tag`
--
ALTER TABLE `contingut_tag`
  ADD PRIMARY KEY (`id_contingut`,`id_tag`),
  ADD KEY `tag_contingut_tag` (`id_tag`);

--
-- Indexes for table `dret_autor`
--
ALTER TABLE `dret_autor`
  ADD PRIMARY KEY (`id_dret`);

--
-- Indexes for table `estadistiques`
--
ALTER TABLE `estadistiques`
  ADD PRIMARY KEY (`id_estadistica`);

--
-- Indexes for table `estadistiques_contingut`
--
ALTER TABLE `estadistiques_contingut`
  ADD PRIMARY KEY (`id_estadistica`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grup_estadistica_foreign` (`estadistica`),
  ADD KEY `grup_tipus_usuari_foreign` (`tipus_usuari`),
  ADD KEY `grup_xat_foreign` (`xat`);

--
-- Indexes for table `grups_usuaris`
--
ALTER TABLE `grups_usuaris`
  ADD KEY `grups_usuaris_id_usuari_foreign` (`id_usuari`),
  ADD KEY `grups_usuaris_id_grup_foreign` (`id_grup`);

--
-- Indexes for table `interaccio`
--
ALTER TABLE `interaccio`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_usuari` (`id_usuari`,`id_contingut`),
  ADD KEY `usuari_interaccio` (`id_usuari`),
  ADD KEY `contingut_interaccio` (`id_contingut`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missatge`
--
ALTER TABLE `missatge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `missatge_id_xat_foreign` (`id_xat`),
  ADD KEY `missatge_id_usuari_foreign` (`id_usuari`),
  ADD KEY `missatge_id_contingut_foreign` (`id_contingut`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `seguidors`
--
ALTER TABLE `seguidors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seguidors_id_usuari_foreign` (`id_usuari`),
  ADD KEY `seguidors_id_seguit_foreign` (`id_seguit`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipus_contingut`
--
ALTER TABLE `tipus_contingut`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipus_usuari`
--
ALTER TABLE `tipus_usuari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_tipus_foreign` (`tipus`);

--
-- Indexes for table `xat`
--
ALTER TABLE `xat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xat_grup`
--
ALTER TABLE `xat_grup`
  ADD KEY `xat_grup_id_xat_foreign` (`id_xat`),
  ADD KEY `xat_grup_id_grup_foreign` (`id_grup`);

--
-- Indexes for table `xat_usuaris`
--
ALTER TABLE `xat_usuaris`
  ADD KEY `xat_usuaris_id_usuari_foreign` (`id_usuari`),
  ADD KEY `xat_usuaris_id_xat_foreign` (`id_xat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analitiques_generals`
--
ALTER TABLE `analitiques_generals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `avis_usuari`
--
ALTER TABLE `avis_usuari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;

--
-- AUTO_INCREMENT for table `contingut`
--
ALTER TABLE `contingut`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `dret_autor`
--
ALTER TABLE `dret_autor`
  MODIFY `id_dret` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `estadistiques`
--
ALTER TABLE `estadistiques`
  MODIFY `id_estadistica` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `estadistiques_contingut`
--
ALTER TABLE `estadistiques_contingut`
  MODIFY `id_estadistica` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grup`
--
ALTER TABLE `grup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interaccio`
--
ALTER TABLE `interaccio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `missatge`
--
ALTER TABLE `missatge`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seguidors`
--
ALTER TABLE `seguidors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tipus_contingut`
--
ALTER TABLE `tipus_contingut`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tipus_usuari`
--
ALTER TABLE `tipus_usuari`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `xat`
--
ALTER TABLE `xat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avis_usuari`
--
ALTER TABLE `avis_usuari`
  ADD CONSTRAINT `avis_usuari_id_avis_foreign` FOREIGN KEY (`id_avis`) REFERENCES `avis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `avis_usuari_id_usuari_foreign` FOREIGN KEY (`id_usuari`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contingut`
--
ALTER TABLE `contingut`
  ADD CONSTRAINT `contingut_drets_autor_foreign` FOREIGN KEY (`drets_autor`) REFERENCES `dret_autor` (`id_dret`) ON DELETE CASCADE,
  ADD CONSTRAINT `contingut_propietari_foreign` FOREIGN KEY (`propietari`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contingut_tipus_contingut_foreign` FOREIGN KEY (`tipus_contingut`) REFERENCES `tipus_contingut` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contingut_tag`
--
ALTER TABLE `contingut_tag`
  ADD CONSTRAINT `contingut_tag` FOREIGN KEY (`id_contingut`) REFERENCES `contingut` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tag_contingut_tag` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grup`
--
ALTER TABLE `grup`
  ADD CONSTRAINT `grup_estadistica_foreign` FOREIGN KEY (`estadistica`) REFERENCES `estadistiques` (`id_estadistica`) ON DELETE CASCADE,
  ADD CONSTRAINT `grup_tipus_usuari_foreign` FOREIGN KEY (`tipus_usuari`) REFERENCES `tipus_usuari` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `grup_xat_foreign` FOREIGN KEY (`xat`) REFERENCES `xat` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `grups_usuaris`
--
ALTER TABLE `grups_usuaris`
  ADD CONSTRAINT `grups_usuaris_id_grup_foreign` FOREIGN KEY (`id_grup`) REFERENCES `grup` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `grups_usuaris_id_usuari_foreign` FOREIGN KEY (`id_usuari`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `interaccio`
--
ALTER TABLE `interaccio`
  ADD CONSTRAINT `contingut_interaccio` FOREIGN KEY (`id_contingut`) REFERENCES `contingut` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuari_interaccio` FOREIGN KEY (`id_usuari`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `missatge`
--
ALTER TABLE `missatge`
  ADD CONSTRAINT `missatge_id_contingut_foreign` FOREIGN KEY (`id_contingut`) REFERENCES `contingut` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `missatge_id_usuari_foreign` FOREIGN KEY (`id_usuari`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `missatge_id_xat_foreign` FOREIGN KEY (`id_xat`) REFERENCES `xat` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seguidors`
--
ALTER TABLE `seguidors`
  ADD CONSTRAINT `seguidors_id_seguit_foreign` FOREIGN KEY (`id_seguit`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `seguidors_id_usuari_foreign` FOREIGN KEY (`id_usuari`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_tipus_foreign` FOREIGN KEY (`tipus`) REFERENCES `tipus_usuari` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `xat_grup`
--
ALTER TABLE `xat_grup`
  ADD CONSTRAINT `xat_grup_id_grup_foreign` FOREIGN KEY (`id_grup`) REFERENCES `grup` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `xat_grup_id_xat_foreign` FOREIGN KEY (`id_xat`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `xat_usuaris`
--
ALTER TABLE `xat_usuaris`
  ADD CONSTRAINT `xat_usuaris_id_usuari_foreign` FOREIGN KEY (`id_usuari`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `xat_usuaris_id_xat_foreign` FOREIGN KEY (`id_xat`) REFERENCES `xat` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
