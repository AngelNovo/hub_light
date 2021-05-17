-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2021 at 05:26 PM
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
(2, 2, 6, 0, 26, '2021-05-17 10:01:48', '2021-05-17 15:25:25');

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
(25, 4, 1, '1', '2021-05-14 15:11:38', '2021-05-14 15:11:45'),
(26, 4, 2, '1', '2021-05-14 15:12:09', '2021-05-14 15:12:12'),
(27, 4, 1, '1', '2021-05-15 07:30:46', '2021-05-15 07:31:17'),
(28, 5, 2, '1', '2021-05-15 07:30:49', '2021-05-15 07:31:28'),
(29, 4, 2, '1', '2021-05-15 07:31:59', '2021-05-15 07:32:02'),
(30, 4, 1, '1', '2021-05-15 07:36:20', '2021-05-15 07:36:26'),
(31, 4, 2, '1', '2021-05-15 07:36:22', '2021-05-15 07:36:25'),
(32, 4, 1, '1', '2021-05-15 07:39:43', '2021-05-15 07:39:49'),
(33, 4, 2, '1', '2021-05-15 07:39:46', '2021-05-15 07:39:48'),
(34, 4, 1, '1', '2021-05-15 07:40:44', '2021-05-15 07:40:50'),
(35, 4, 2, '1', '2021-05-15 07:40:46', '2021-05-15 07:40:49'),
(36, 4, 1, '1', '2021-05-15 07:41:26', '2021-05-15 07:41:31'),
(37, 5, 2, '1', '2021-05-15 07:41:28', '2021-05-15 07:41:30'),
(38, 5, 1, '1', '2021-05-15 07:41:53', '2021-05-15 07:41:55'),
(39, 4, 1, '1', '2021-05-15 07:43:36', '2021-05-15 07:43:43'),
(40, 4, 2, '1', '2021-05-15 07:43:39', '2021-05-15 07:43:42'),
(41, 4, 1, '1', '2021-05-15 07:46:23', '2021-05-15 07:46:30'),
(42, 4, 2, '1', '2021-05-15 07:46:25', '2021-05-15 07:46:30'),
(43, 4, 1, '1', '2021-05-15 07:48:04', '2021-05-15 07:48:14'),
(44, 4, 2, '1', '2021-05-15 07:48:07', '2021-05-15 07:48:12'),
(45, 4, 1, '1', '2021-05-15 07:49:25', '2021-05-15 07:49:37'),
(46, 4, 2, '1', '2021-05-15 07:49:28', '2021-05-15 07:49:37'),
(47, 4, 1, '1', '2021-05-15 07:51:22', '2021-05-15 07:51:28'),
(48, 4, 2, '1', '2021-05-15 07:51:25', '2021-05-15 07:51:28'),
(49, 4, 1, '1', '2021-05-15 07:56:12', '2021-05-15 07:56:28'),
(51, 4, 2, '1', '2021-05-15 07:56:25', '2021-05-15 07:56:27'),
(52, 11, 1, '1', '2021-05-15 07:57:08', '2021-05-15 07:57:14'),
(53, 11, 2, '1', '2021-05-15 07:57:11', '2021-05-15 07:57:14'),
(54, 4, 1, '1', '2021-05-15 07:58:32', '2021-05-15 07:58:38'),
(55, 4, 2, '1', '2021-05-15 07:58:35', '2021-05-15 07:58:37'),
(56, 1, 1, '1', '2021-05-15 08:09:12', '2021-05-15 08:09:17'),
(57, 1, 2, '1', '2021-05-15 08:09:14', '2021-05-15 08:09:17'),
(58, 4, 1, '1', '2021-05-15 12:35:17', '2021-05-15 12:35:24'),
(59, 4, 2, '1', '2021-05-15 12:35:20', '2021-05-15 12:35:22'),
(60, 4, 2, '1', '2021-05-15 12:36:06', '2021-05-15 12:36:09'),
(61, 4, 1, '1', '2021-05-15 12:40:06', '2021-05-15 12:40:16'),
(62, 4, 2, '1', '2021-05-15 12:40:08', '2021-05-15 12:40:20'),
(63, 4, 2, '1', '2021-05-15 12:40:11', '2021-05-15 12:40:14'),
(64, 10, 1, '1', '2021-05-15 12:41:15', '2021-05-15 12:41:27'),
(65, 10, 2, '1', '2021-05-15 12:41:18', '2021-05-15 12:41:30'),
(66, 10, 2, '1', '2021-05-15 12:41:20', '2021-05-15 12:41:26'),
(67, 4, 1, '1', '2021-05-15 12:42:59', '2021-05-15 12:43:04'),
(68, 4, 2, '1', '2021-05-15 12:43:01', '2021-05-15 12:43:03'),
(69, 4, 1, '1', '2021-05-15 12:44:56', '2021-05-15 12:45:11'),
(70, 4, 2, '1', '2021-05-15 12:44:58', '2021-05-15 12:45:16'),
(71, 4, 2, '1', '2021-05-15 12:45:01', '2021-05-15 12:45:10'),
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
(88, 1, 2, '1', '2021-05-15 13:01:34', '2021-05-15 13:01:36');

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
  `estadistica` int(10) UNSIGNED DEFAULT NULL,
  `propietari` int(10) UNSIGNED NOT NULL,
  `tipus_contingut` int(10) UNSIGNED NOT NULL,
  `drets_autor` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contingut`
--

INSERT INTO `contingut` (`id`, `titulo`, `portada`, `link_copyright`, `url`, `descripcio`, `majoria_edat`, `reportat`, `estadistica`, `propietari`, `tipus_contingut`, `drets_autor`, `created_at`, `updated_at`) VALUES
(45, 'Mona China', NULL, NULL, '1621188864-Llabreso.jpg', NULL, 0, 0, 75, 5, 1, 2, '2021-05-16 16:14:24', '2021-05-16 16:14:24'),
(46, 'Montañas de Albacete', NULL, NULL, '1621189209-Llabreso.jpg', 'Es la sierra de albacete', 0, 0, 76, 5, 1, 2, '2021-05-16 16:20:09', '2021-05-16 16:20:09'),
(47, 'Deberes Accesibilitat', '1621189571-Llabreso.jpg', NULL, '1621189571-Llabreso.pdf', 'Son mis deberes', 1, 0, 77, 5, 2, 2, '2021-05-16 16:26:11', '2021-05-16 16:26:11'),
(48, 'Spoiler', '1621190182-Llabreso.png', NULL, '1621190182-Llabreso.mp3', NULL, 0, 0, 78, 5, 3, 2, '2021-05-16 16:36:22', '2021-05-16 16:36:22'),
(49, 'Berserku', NULL, NULL, '1621200193-Llabreso.jpg', NULL, 1, 0, 79, 5, 1, 2, '2021-05-16 19:23:13', '2021-05-16 19:23:13'),
(50, NULL, NULL, NULL, '1621200205-Llabreso.jpg', NULL, 0, 0, 80, 5, 1, 2, '2021-05-16 19:23:25', '2021-05-16 19:23:25'),
(51, NULL, NULL, NULL, '1621200213-Llabreso.jpg', NULL, 0, 0, 81, 5, 1, 2, '2021-05-16 19:23:33', '2021-05-16 19:23:33'),
(52, NULL, NULL, NULL, '1621200221-Llabreso.jpg', NULL, 0, 0, 82, 5, 1, 2, '2021-05-16 19:23:41', '2021-05-16 19:23:41'),
(53, NULL, NULL, NULL, '1621200254-Llabreso.jpg', NULL, 0, 0, 83, 5, 1, 2, '2021-05-16 19:24:14', '2021-05-16 19:24:14'),
(54, NULL, NULL, NULL, '1621200269-Llabreso.png', NULL, 1, 0, 84, 5, 1, 2, '2021-05-16 19:24:29', '2021-05-16 19:24:29'),
(55, NULL, NULL, NULL, '1621200279-Llabreso.png', NULL, 0, 0, 85, 5, 1, 2, '2021-05-16 19:24:39', '2021-05-16 19:24:39'),
(56, 'Meme Ibai', '1621201782-Llabreso.webp', NULL, '1621201782-Llabreso.mp4', NULL, 0, 0, 86, 5, 4, 2, '2021-05-16 19:49:42', '2021-05-16 19:49:42'),
(57, 'Zips', '1621202125-Llabreso.png', NULL, '1621202125-Llabreso.zip', NULL, 0, 0, 87, 5, 5, 2, '2021-05-16 19:55:25', '2021-05-16 19:55:25'),
(58, NULL, NULL, NULL, '1621266209-Llabreso.jpg', NULL, 0, 0, 88, 5, 1, 2, '2021-05-17 13:43:29', '2021-05-17 13:43:29'),
(59, 'Monkey Flip', '1621266876-Llabreso.jpg', NULL, '1621266876-Llabreso.mp4', NULL, 0, 0, 89, 5, 4, 2, '2021-05-17 13:54:36', '2021-05-17 13:54:36'),
(60, 'Cute Guardiana', NULL, NULL, '1621267519-Llabreso.png', NULL, 0, 0, 90, 5, 1, 2, '2021-05-17 14:05:19', '2021-05-17 14:05:19'),
(61, NULL, NULL, NULL, '1621272042-AngelNovo2.jpg', NULL, 0, 0, 91, 14, 1, 2, '2021-05-17 15:20:42', '2021-05-17 15:20:42'),
(63, 'Igor', NULL, NULL, '1621272207-AngelNovo2.jpg', 'Just igor', 1, 0, 93, 14, 1, 2, '2021-05-17 15:23:27', '2021-05-17 15:23:27'),
(64, 'thor', NULL, NULL, '1621272325-AngelNovo2.jpg', 'Just thor', 1, 0, 94, 14, 1, 2, '2021-05-17 15:25:25', '2021-05-17 15:25:25');

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
(45, 44, '2021-05-16 16:14:24', '2021-05-16 16:14:24'),
(45, 45, '2021-05-16 16:14:24', '2021-05-16 16:14:24'),
(45, 46, '2021-05-16 16:14:24', '2021-05-16 16:14:24'),
(45, 47, '2021-05-16 16:14:24', '2021-05-16 16:14:24'),
(46, 1, '2021-05-16 16:20:09', '2021-05-16 16:20:09'),
(46, 37, '2021-05-16 16:20:09', '2021-05-16 16:20:09'),
(46, 40, '2021-05-16 16:20:09', '2021-05-16 16:20:09'),
(46, 48, '2021-05-16 16:20:09', '2021-05-16 16:20:09'),
(46, 49, '2021-05-16 16:20:09', '2021-05-16 16:20:09'),
(47, 50, '2021-05-16 16:26:11', '2021-05-16 16:26:11'),
(48, 51, '2021-05-16 16:36:22', '2021-05-16 16:36:22'),
(49, 52, '2021-05-16 19:23:13', '2021-05-16 19:23:13'),
(56, 54, '2021-05-16 19:49:42', '2021-05-16 19:49:42'),
(59, 55, '2021-05-17 13:54:36', '2021-05-17 13:54:36'),
(60, 56, '2021-05-17 14:05:19', '2021-05-17 14:05:19'),
(60, 57, '2021-05-17 14:05:19', '2021-05-17 14:05:19'),
(60, 58, '2021-05-17 14:05:19', '2021-05-17 14:05:19'),
(60, 59, '2021-05-17 14:05:19', '2021-05-17 14:05:19'),
(64, 61, '2021-05-17 15:25:25', '2021-05-17 15:25:25'),
(64, 62, '2021-05-17 15:25:25', '2021-05-17 15:25:25');

-- --------------------------------------------------------

--
-- Table structure for table `dret_autor`
--

CREATE TABLE `dret_autor` (
  `id_dret` int(10) UNSIGNED NOT NULL,
  `tipus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icona` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(4, 0, 0, 0, 0, 0, 0, '2021-05-01 13:51:23', '2021-05-01 13:51:23'),
(5, 0, 0, 0, 0, 0, 0, '2021-05-01 13:51:49', '2021-05-01 13:51:49'),
(6, 0, 0, 0, 0, 0, 0, '2021-05-01 14:21:53', '2021-05-01 14:21:53'),
(7, 0, 0, 0, 0, 0, 0, '2021-05-01 14:59:09', '2021-05-01 14:59:09'),
(8, 0, 0, 0, 0, 0, 0, '2021-05-01 14:59:48', '2021-05-01 14:59:48'),
(9, 0, 0, 0, 0, 0, 0, '2021-05-02 17:00:38', '2021-05-02 17:00:38'),
(10, 0, 0, 0, 0, 0, 0, '2021-05-03 06:56:01', '2021-05-03 06:56:01'),
(11, 0, 0, 0, 0, 0, 0, '2021-05-05 19:06:19', '2021-05-05 19:06:19'),
(12, 0, 0, 0, 0, 0, 0, '2021-05-13 13:03:56', '2021-05-13 13:03:56'),
(13, 0, 0, 0, 0, 0, 0, '2021-05-13 13:04:14', '2021-05-13 13:04:14'),
(14, 0, 0, 0, 0, 0, 0, '2021-05-14 07:33:00', '2021-05-14 07:33:00'),
(15, 0, 0, 0, 0, 0, 0, '2021-05-14 07:34:27', '2021-05-14 07:34:27'),
(16, 0, 0, 0, 0, 0, 0, '2021-05-14 07:34:56', '2021-05-14 07:34:56'),
(17, 0, 0, 0, 0, 0, 0, '2021-05-14 07:35:27', '2021-05-14 07:35:27'),
(18, 0, 0, 0, 0, 0, 0, '2021-05-14 07:36:03', '2021-05-14 07:36:03'),
(19, 0, 0, 0, 0, 0, 0, '2021-05-14 07:37:13', '2021-05-14 07:37:13'),
(20, 0, 0, 0, 0, 0, 0, '2021-05-14 07:38:17', '2021-05-14 07:38:17'),
(21, 0, 0, 0, 0, 0, 0, '2021-05-14 07:40:06', '2021-05-14 07:40:06'),
(22, 0, 0, 0, 0, 0, 0, '2021-05-14 07:57:58', '2021-05-14 07:57:58'),
(23, 0, 0, 0, 0, 0, 0, '2021-05-14 07:59:24', '2021-05-14 07:59:24'),
(24, 0, 0, 0, 0, 0, 0, '2021-05-14 11:37:49', '2021-05-14 11:37:49'),
(25, 0, 0, 0, 0, 0, 0, '2021-05-14 15:07:25', '2021-05-14 15:07:25');

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

--
-- Dumping data for table `estadistiques_contingut`
--

INSERT INTO `estadistiques_contingut` (`id_estadistica`, `q_comentaris`, `q_likes`, `created_at`, `updated_at`) VALUES
(73, 0, 0, '2021-05-16 16:07:55', '2021-05-16 16:07:55'),
(74, 0, 0, '2021-05-16 16:09:28', '2021-05-16 16:09:28'),
(75, 0, 0, '2021-05-16 16:14:24', '2021-05-16 16:14:24'),
(76, 0, 0, '2021-05-16 16:20:09', '2021-05-16 16:20:09'),
(77, 0, 0, '2021-05-16 16:26:11', '2021-05-16 16:26:11'),
(78, 0, 0, '2021-05-16 16:36:22', '2021-05-16 16:36:22'),
(79, 0, 0, '2021-05-16 19:23:13', '2021-05-16 19:23:13'),
(80, 0, 0, '2021-05-16 19:23:25', '2021-05-16 19:23:25'),
(81, 0, 0, '2021-05-16 19:23:33', '2021-05-16 19:23:33'),
(82, 0, 0, '2021-05-16 19:23:41', '2021-05-16 19:23:41'),
(83, 0, 0, '2021-05-16 19:24:14', '2021-05-16 19:24:14'),
(84, 0, 0, '2021-05-16 19:24:29', '2021-05-16 19:24:29'),
(85, 0, 0, '2021-05-16 19:24:39', '2021-05-16 19:24:39'),
(86, 0, 0, '2021-05-16 19:49:42', '2021-05-16 19:49:42'),
(87, 0, 0, '2021-05-16 19:55:25', '2021-05-16 19:55:25'),
(88, 0, 0, '2021-05-17 13:43:29', '2021-05-17 13:43:29'),
(89, 0, 0, '2021-05-17 13:54:36', '2021-05-17 13:54:36'),
(90, 0, 0, '2021-05-17 14:05:19', '2021-05-17 14:05:19'),
(91, 0, 0, '2021-05-17 15:20:42', '2021-05-17 15:20:42'),
(92, 0, 0, '2021-05-17 15:22:11', '2021-05-17 15:22:11'),
(93, 0, 0, '2021-05-17 15:23:27', '2021-05-17 15:23:27'),
(94, 0, 0, '2021-05-17 15:25:25', '2021-05-17 15:25:25');

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
  `id` int(10) UNSIGNED NOT NULL,
  `id_Usuari` int(10) UNSIGNED NOT NULL,
  `id_Contingut` int(10) UNSIGNED NOT NULL,
  `Guardat` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

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
  `id_usuari` int(10) UNSIGNED NOT NULL,
  `id_seguit` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'paisaje', '2021-05-16 17:13:06', '2021-05-16 17:13:06'),
(37, 'colorido', '2021-05-16 17:34:35', '2021-05-16 17:34:35'),
(38, 'test', '2021-05-16 15:35:37', '2021-05-16 15:35:37'),
(40, 'montañas', '2021-05-16 15:39:37', '2021-05-16 15:39:37'),
(42, 'monas chinas', '2021-05-16 16:07:55', '2021-05-16 16:07:55'),
(44, 'animu', '2021-05-16 16:14:24', '2021-05-16 16:14:24'),
(45, 'gatos demonios', '2021-05-16 16:14:24', '2021-05-16 16:14:24'),
(46, 'explosion', '2021-05-16 16:14:24', '2021-05-16 16:14:24'),
(47, 'megumin', '2021-05-16 16:14:24', '2021-05-16 16:14:24'),
(48, 'sierra de albacete', '2021-05-16 16:20:09', '2021-05-16 16:20:09'),
(49, 'noche', '2021-05-16 16:20:09', '2021-05-16 16:20:09'),
(50, 'diw', '2021-05-16 16:26:11', '2021-05-16 16:26:11'),
(51, 'soundtrack', '2021-05-16 16:36:22', '2021-05-16 16:36:22'),
(52, 'berserku', '2021-05-16 19:23:13', '2021-05-16 19:23:13'),
(54, 'ibai', '2021-05-16 19:49:42', '2021-05-16 19:49:42'),
(55, 'divertido', '2021-05-17 13:54:36', '2021-05-17 13:54:36'),
(56, 'dark souls', '2021-05-17 14:05:19', '2021-05-17 14:05:19'),
(57, 'cute', '2021-05-17 14:05:19', '2021-05-17 14:05:19'),
(58, 'mono', '2021-05-17 14:05:19', '2021-05-17 14:05:19'),
(59, 'kawai', '2021-05-17 14:05:19', '2021-05-17 14:05:19'),
(60, 'igor', '2021-05-17 15:23:27', '2021-05-17 15:23:27'),
(61, 'thor', '2021-05-17 15:25:25', '2021-05-17 15:25:25'),
(62, 'rosa', '2021-05-17 15:25:25', '2021-05-17 15:25:25');

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
  `recomendat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estadistica` int(10) UNSIGNED NOT NULL,
  `tipus` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fondo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fondoDefault.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `email_verified_at`, `alies`, `foto`, `link`, `data_naixement`, `data-registre`, `actiu`, `deshabilitat`, `suspes`, `es_admin`, `nivell_gravetat`, `grups_disponibles`, `recomendat`, `estadistica`, `tipus`, `remember_token`, `created_at`, `updated_at`, `fondo`) VALUES
(1, 'test', '$2y$10$n4EJbYTalgXFW9.kiPo6FeyAk9qApu5OS3UDqWoz3.yPGpMRTfDvW', 'test@test', NULL, NULL, 'avatar.jpg', NULL, NULL, NULL, 0, 0, 0, 0, 10, 0, NULL, 5, 1, NULL, '2021-05-01 13:51:49', '2021-05-15 13:01:48', 'fondoDefault.jpg'),
(4, 'AngelAdmin', 'cec9339cba6eddfc14afc2764e027512', 'angelnovo15@gmail.com', NULL, 'Angel', '1620910738-AngelAdmin.jpg', NULL, NULL, NULL, 1, 0, 1, 1, 0, 0, NULL, 10, 1, NULL, '2021-05-03 06:56:01', '2021-05-15 12:45:16', '1620910738-AngelAdmin.png'),
(5, 'Llabreso', '$2y$10$7wlUoNiTN6Dk9sYzGDUWZunTvDlnaZNMEguXynjErf3YYC0A2p.8K', 'joanllabresoliver@gmail.com', '2021-05-08 09:30:50', 'Llabreso', '1620757944-.jpg', NULL, '2001-09-12 08:54:48', NULL, 1, 0, 0, 1, 10, 0, NULL, 11, 1, NULL, '2021-05-05 19:06:19', '2021-05-17 13:40:52', '1620757917-Llabreso.jpg'),
(10, 'asdasda', '$2y$10$fMjp/4HvAjHrptsLmeL3huizotI2B96dMHbCc/NNf8eNewr3hJff.', 'asdasd@sdfbkj', NULL, NULL, 'avatar.jpg', NULL, NULL, NULL, 0, 0, 0, 0, 10, 0, NULL, 21, 1, NULL, '2021-05-14 07:40:06', '2021-05-15 12:48:51', 'fondoDefault.jpg'),
(11, 'jndbasjkhidbsakj', '$2y$10$sBLApHMMlhvvh0mzKYsi8OYP9ZslU.twnUdwZeIz7.VLGjngQZQZi', 'kjasdfnasf@aseknfbnksf', NULL, NULL, 'avatar.jpg', NULL, NULL, NULL, 0, 0, 0, 0, 10, 0, NULL, 22, 1, NULL, '2021-05-14 07:57:58', '2021-05-15 07:57:27', 'fondoDefault.jpg'),
(12, 'lkjmasdkjasb', '$2y$10$7wElszXdDGzBHz53jlYz2OQsxFy8QaEb3Ir5B1ygiiO9V5dMoJ0kS', 'kjasbdjk@skjdnfkj', NULL, NULL, 'avatar.jpg', NULL, NULL, NULL, 0, 0, 0, 0, 10, 0, NULL, 23, 1, NULL, '2021-05-14 07:59:24', '2021-05-15 07:56:07', 'fondoDefault.jpg'),
(13, 'ertrrdfdf', '$2y$10$vxsq2QJpCkvNUHSt5YKer.7sQfDvHVWJmK0tON9Qx733peZwfA6au', 'hhfdhfdfdh@sdfdsfdfs', NULL, NULL, 'avatar.jpg', NULL, NULL, NULL, 0, 0, 1, 0, 0, 0, NULL, 24, 1, NULL, '2021-05-14 11:37:49', '2021-05-15 12:40:00', 'fondoDefault.jpg'),
(14, 'AngelNovo2', '$2y$10$qATldsDOxR90RKnlQjprreqZN4d9CJoDpjH1WPHMjlM2ccngDsFwe', 'angelnovo@gmail.com', NULL, NULL, 'avatar.jpg', NULL, NULL, NULL, 1, 0, 0, 1, 10, 0, 'images;video;css;animacion', 25, 3, NULL, '2021-05-14 15:07:26', '2021-05-16 15:37:17', 'fondoDefault.jpg');

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
  ADD KEY `contingut_estadistica_foreign` (`estadistica`),
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
  ADD KEY `usuari_interaccio` (`id_Usuari`),
  ADD KEY `contingut_interaccio` (`id_Contingut`);

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
  ADD KEY `users_estadistica_foreign` (`estadistica`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `avis_usuari`
--
ALTER TABLE `avis_usuari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `contingut`
--
ALTER TABLE `contingut`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `dret_autor`
--
ALTER TABLE `dret_autor`
  MODIFY `id_dret` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `estadistiques`
--
ALTER TABLE `estadistiques`
  MODIFY `id_estadistica` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `estadistiques_contingut`
--
ALTER TABLE `estadistiques_contingut`
  MODIFY `id_estadistica` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  ADD CONSTRAINT `contingut_estadistica_foreign` FOREIGN KEY (`estadistica`) REFERENCES `estadistiques_contingut` (`id_estadistica`) ON DELETE CASCADE,
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
  ADD CONSTRAINT `contingut_interaccio` FOREIGN KEY (`id_Contingut`) REFERENCES `contingut` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuari_interaccio` FOREIGN KEY (`id_Usuari`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `users_estadistica_foreign` FOREIGN KEY (`estadistica`) REFERENCES `estadistiques` (`id_estadistica`) ON DELETE CASCADE,
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
