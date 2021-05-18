-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2021 at 06:14 PM
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
-- Table structure for table `interaccio`
--

CREATE TABLE `interaccio` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_Usuari` int(10) UNSIGNED NOT NULL,
  `id_Contingut` int(10) UNSIGNED NOT NULL,
  `Guardat` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0',
  `megusta` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0',
  `comentario` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `interaccio`
--
ALTER TABLE `interaccio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuari_interaccio` (`id_Usuari`),
  ADD KEY `contingut_interaccio` (`id_Contingut`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `interaccio`
--
ALTER TABLE `interaccio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `interaccio`
--
ALTER TABLE `interaccio`
  ADD CONSTRAINT `contingut_interaccio` FOREIGN KEY (`id_Contingut`) REFERENCES `contingut` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuari_interaccio` FOREIGN KEY (`id_Usuari`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
