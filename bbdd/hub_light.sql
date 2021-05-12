-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Temps de generació: 12-05-2021 a les 18:51:27
-- Versió del servidor: 5.7.24
-- Versió de PHP: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `hub_light`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `avis`
--

CREATE TABLE `avis` (
  `id` int(10) UNSIGNED NOT NULL,
  `explicacio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gravetat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `avis`
--

INSERT INTO `avis` (`id`, `explicacio`, `gravetat`, `created_at`, `updated_at`) VALUES
(1, 'Uno o varios comentarios ofensivos', '2', '2021-05-05 16:09:25', '2021-05-05 16:09:25'),
(2, 'Contenido inapropiado', '5', '2021-05-05 17:30:52', '2021-05-05 17:30:52');

-- --------------------------------------------------------

--
-- Estructura de la taula `avis_usuari`
--

CREATE TABLE `avis_usuari` (
  `id_usuari` int(10) UNSIGNED NOT NULL,
  `id_avis` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `contingut`
--

CREATE TABLE `contingut` (
  `id` int(10) UNSIGNED NOT NULL,
  `titol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portada` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_copyright` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `majoria_edat` tinyint(1) NOT NULL DEFAULT '0',
  `reportat` tinyint(1) NOT NULL DEFAULT '0',
  `estadistica` int(10) UNSIGNED NOT NULL,
  `propietari` int(10) UNSIGNED NOT NULL,
  `tipus_contingut` int(10) UNSIGNED NOT NULL,
  `drets_autor` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `dret_autor`
--

CREATE TABLE `dret_autor` (
  `id_dret` int(10) UNSIGNED NOT NULL,
  `tipus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icona` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `dret_autor`
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
-- Estructura de la taula `estadistiques`
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
-- Bolcament de dades per a la taula `estadistiques`
--

INSERT INTO `estadistiques` (`id_estadistica`, `q_comentaris`, `q_likes`, `q_seguidors`, `q_seguits`, `q_likes_mensuals`, `q_comentaris_mensuals`, `created_at`, `updated_at`) VALUES
(4, 0, 0, 0, 0, 0, 0, '2021-05-01 13:51:23', '2021-05-01 13:51:23'),
(5, 0, 0, 0, 0, 0, 0, '2021-05-01 13:51:49', '2021-05-01 13:51:49'),
(6, 0, 0, 0, 0, 0, 0, '2021-05-01 14:21:53', '2021-05-01 14:21:53'),
(7, 0, 0, 0, 0, 0, 0, '2021-05-01 14:59:09', '2021-05-01 14:59:09'),
(8, 0, 0, 0, 0, 0, 0, '2021-05-01 14:59:48', '2021-05-01 14:59:48'),
(9, 0, 0, 0, 0, 0, 0, '2021-05-02 17:00:38', '2021-05-02 17:00:38'),
(10, 0, 0, 0, 0, 0, 0, '2021-05-03 06:56:01', '2021-05-03 06:56:01'),
(11, 0, 0, 0, 0, 0, 0, '2021-05-05 19:06:19', '2021-05-05 19:06:19');

-- --------------------------------------------------------

--
-- Estructura de la taula `estadistiques_contingut`
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
-- Estructura de la taula `failed_jobs`
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
-- Estructura de la taula `grup`
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
-- Estructura de la taula `grups_usuaris`
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
-- Estructura de la taula `interaccio`
--

CREATE TABLE `interaccio` (
  `id` int(10) NOT NULL,
  `id_Usuari` int(10) NOT NULL,
  `id_Contingut` int(10) NOT NULL,
  `Guardat` char(1) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `migrations`
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
-- Estructura de la taula `missatge`
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
-- Estructura de la taula `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('test@test2', '$2y$10$y0SgPNSH.dSNc0KgUCvsd.QNrRMY9aN3lmv.QsGKQM.TGccoAltjG', '2021-05-01 18:53:03');

-- --------------------------------------------------------

--
-- Estructura de la taula `seguidors`
--

CREATE TABLE `seguidors` (
  `id_usuari` int(10) UNSIGNED NOT NULL,
  `id_seguit` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `tipus_contingut`
--

CREATE TABLE `tipus_contingut` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icona` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Descripcio` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `tipus_contingut`
--

INSERT INTO `tipus_contingut` (`id`, `tipus`, `icona`, `created_at`, `updated_at`, `Descripcio`) VALUES
(1, 'Imagen', '', NULL, NULL, '.jpg .gif .png .jpeg .svg'),
(2, 'Documento de texto', '', NULL, NULL, '.pdf .txt'),
(3, 'Música', '.mp3 .ogg', NULL, NULL, ''),
(4, 'Video', '', NULL, NULL, '.mp4 .ogg'),
(5, 'Otros', '', NULL, NULL, '.blend .tga .iris .sgi .rar .zip .gz.tar.gz .7z .css .mng .webp');

-- --------------------------------------------------------

--
-- Estructura de la taula `tipus_usuari`
--

CREATE TABLE `tipus_usuari` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `tipus_usuari`
--

INSERT INTO `tipus_usuari` (`id`, `tipus`, `created_at`, `updated_at`) VALUES
(1, 'usuari', '2021-05-01 15:45:26', '2021-05-01 15:45:26');

-- --------------------------------------------------------

--
-- Estructura de la taula `users`
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
-- Bolcament de dades per a la taula `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `email_verified_at`, `alies`, `foto`, `link`, `data_naixement`, `data-registre`, `actiu`, `deshabilitat`, `suspes`, `es_admin`, `nivell_gravetat`, `grups_disponibles`, `recomendat`, `estadistica`, `tipus`, `remember_token`, `created_at`, `updated_at`, `fondo`) VALUES
(1, 'test', '$2y$10$n4EJbYTalgXFW9.kiPo6FeyAk9qApu5OS3UDqWoz3.yPGpMRTfDvW', 'test@test', NULL, NULL, 'avatar.jpg', NULL, NULL, NULL, 0, 0, 1, 0, 10, 0, NULL, 5, 1, NULL, '2021-05-01 13:51:49', '2021-05-05 05:22:17', 'fondoDefault.jpg'),
(4, 'AngelAdmin', '$2y$10$1/7Tr4A2lKmXpE1JAbg9t.78HCEuBc1RzSU.5QajN.EpkDI6cQrtS', 'angelnovo15@gmail.com', NULL, NULL, 'avatar.jpg', NULL, NULL, NULL, 0, 0, 0, 1, 10, 0, NULL, 10, 1, NULL, '2021-05-03 06:56:01', '2021-05-05 18:32:17', 'fondoDefault.jpg'),
(5, 'Llabreso', '$2y$10$7wlUoNiTN6Dk9sYzGDUWZunTvDlnaZNMEguXynjErf3YYC0A2p.8K', 'joanllabresoliver@gmail.com', '2021-05-08 09:30:50', 'Llabreso', '1620757944-.jpg', NULL, '2001-09-12 08:54:48', NULL, 1, 0, 0, 1, 10, 0, NULL, 11, 1, NULL, '2021-05-05 19:06:19', '2021-05-11 18:50:14', '1620757917-Llabreso.jpg');

-- --------------------------------------------------------

--
-- Estructura de la taula `xat`
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
-- Estructura de la taula `xat_grup`
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
-- Estructura de la taula `xat_usuaris`
--

CREATE TABLE `xat_usuaris` (
  `id_xat` int(10) UNSIGNED NOT NULL,
  `id_usuari` int(10) UNSIGNED NOT NULL,
  `es_admin` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `avis_usuari`
--
ALTER TABLE `avis_usuari`
  ADD KEY `avis_usuari_id_usuari_foreign` (`id_usuari`),
  ADD KEY `avis_usuari_id_avis_foreign` (`id_avis`);

--
-- Índexs per a la taula `contingut`
--
ALTER TABLE `contingut`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contingut_estadistica_foreign` (`estadistica`),
  ADD KEY `contingut_tipus_contingut_foreign` (`tipus_contingut`),
  ADD KEY `contingut_drets_autor_foreign` (`drets_autor`),
  ADD KEY `contingut_propietari_foreign` (`propietari`);

--
-- Índexs per a la taula `dret_autor`
--
ALTER TABLE `dret_autor`
  ADD PRIMARY KEY (`id_dret`);

--
-- Índexs per a la taula `estadistiques`
--
ALTER TABLE `estadistiques`
  ADD PRIMARY KEY (`id_estadistica`);

--
-- Índexs per a la taula `estadistiques_contingut`
--
ALTER TABLE `estadistiques_contingut`
  ADD PRIMARY KEY (`id_estadistica`);

--
-- Índexs per a la taula `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índexs per a la taula `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grup_estadistica_foreign` (`estadistica`),
  ADD KEY `grup_tipus_usuari_foreign` (`tipus_usuari`),
  ADD KEY `grup_xat_foreign` (`xat`);

--
-- Índexs per a la taula `grups_usuaris`
--
ALTER TABLE `grups_usuaris`
  ADD KEY `grups_usuaris_id_usuari_foreign` (`id_usuari`),
  ADD KEY `grups_usuaris_id_grup_foreign` (`id_grup`);

--
-- Índexs per a la taula `interaccio`
--
ALTER TABLE `interaccio`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `missatge`
--
ALTER TABLE `missatge`
  ADD PRIMARY KEY (`id`),
  ADD KEY `missatge_id_xat_foreign` (`id_xat`),
  ADD KEY `missatge_id_usuari_foreign` (`id_usuari`),
  ADD KEY `missatge_id_contingut_foreign` (`id_contingut`);

--
-- Índexs per a la taula `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índexs per a la taula `seguidors`
--
ALTER TABLE `seguidors`
  ADD KEY `seguidors_id_usuari_foreign` (`id_usuari`),
  ADD KEY `seguidors_id_seguit_foreign` (`id_seguit`);

--
-- Índexs per a la taula `tipus_contingut`
--
ALTER TABLE `tipus_contingut`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `tipus_usuari`
--
ALTER TABLE `tipus_usuari`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_estadistica_foreign` (`estadistica`),
  ADD KEY `users_tipus_foreign` (`tipus`);

--
-- Índexs per a la taula `xat`
--
ALTER TABLE `xat`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `xat_grup`
--
ALTER TABLE `xat_grup`
  ADD KEY `xat_grup_id_xat_foreign` (`id_xat`),
  ADD KEY `xat_grup_id_grup_foreign` (`id_grup`);

--
-- Índexs per a la taula `xat_usuaris`
--
ALTER TABLE `xat_usuaris`
  ADD KEY `xat_usuaris_id_usuari_foreign` (`id_usuari`),
  ADD KEY `xat_usuaris_id_xat_foreign` (`id_xat`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la taula `contingut`
--
ALTER TABLE `contingut`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `dret_autor`
--
ALTER TABLE `dret_autor`
  MODIFY `id_dret` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la taula `estadistiques`
--
ALTER TABLE `estadistiques`
  MODIFY `id_estadistica` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la taula `estadistiques_contingut`
--
ALTER TABLE `estadistiques_contingut`
  MODIFY `id_estadistica` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `grup`
--
ALTER TABLE `grup`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `interaccio`
--
ALTER TABLE `interaccio`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la taula `missatge`
--
ALTER TABLE `missatge`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `tipus_contingut`
--
ALTER TABLE `tipus_contingut`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la taula `tipus_usuari`
--
ALTER TABLE `tipus_usuari`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la taula `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la taula `xat`
--
ALTER TABLE `xat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `avis_usuari`
--
ALTER TABLE `avis_usuari`
  ADD CONSTRAINT `avis_usuari_id_avis_foreign` FOREIGN KEY (`id_avis`) REFERENCES `avis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `avis_usuari_id_usuari_foreign` FOREIGN KEY (`id_usuari`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Restriccions per a la taula `contingut`
--
ALTER TABLE `contingut`
  ADD CONSTRAINT `contingut_drets_autor_foreign` FOREIGN KEY (`drets_autor`) REFERENCES `dret_autor` (`id_dret`) ON DELETE CASCADE,
  ADD CONSTRAINT `contingut_estadistica_foreign` FOREIGN KEY (`estadistica`) REFERENCES `estadistiques_contingut` (`id_estadistica`) ON DELETE CASCADE,
  ADD CONSTRAINT `contingut_propietari_foreign` FOREIGN KEY (`propietari`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contingut_tipus_contingut_foreign` FOREIGN KEY (`tipus_contingut`) REFERENCES `tipus_contingut` (`id`) ON DELETE CASCADE;

--
-- Restriccions per a la taula `grup`
--
ALTER TABLE `grup`
  ADD CONSTRAINT `grup_estadistica_foreign` FOREIGN KEY (`estadistica`) REFERENCES `estadistiques` (`id_estadistica`) ON DELETE CASCADE,
  ADD CONSTRAINT `grup_tipus_usuari_foreign` FOREIGN KEY (`tipus_usuari`) REFERENCES `tipus_usuari` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `grup_xat_foreign` FOREIGN KEY (`xat`) REFERENCES `xat` (`id`) ON DELETE CASCADE;

--
-- Restriccions per a la taula `grups_usuaris`
--
ALTER TABLE `grups_usuaris`
  ADD CONSTRAINT `grups_usuaris_id_grup_foreign` FOREIGN KEY (`id_grup`) REFERENCES `grup` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `grups_usuaris_id_usuari_foreign` FOREIGN KEY (`id_usuari`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Restriccions per a la taula `missatge`
--
ALTER TABLE `missatge`
  ADD CONSTRAINT `missatge_id_contingut_foreign` FOREIGN KEY (`id_contingut`) REFERENCES `contingut` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `missatge_id_usuari_foreign` FOREIGN KEY (`id_usuari`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `missatge_id_xat_foreign` FOREIGN KEY (`id_xat`) REFERENCES `xat` (`id`) ON DELETE CASCADE;

--
-- Restriccions per a la taula `seguidors`
--
ALTER TABLE `seguidors`
  ADD CONSTRAINT `seguidors_id_seguit_foreign` FOREIGN KEY (`id_seguit`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `seguidors_id_usuari_foreign` FOREIGN KEY (`id_usuari`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Restriccions per a la taula `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_estadistica_foreign` FOREIGN KEY (`estadistica`) REFERENCES `estadistiques` (`id_estadistica`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_tipus_foreign` FOREIGN KEY (`tipus`) REFERENCES `tipus_usuari` (`id`) ON DELETE CASCADE;

--
-- Restriccions per a la taula `xat_grup`
--
ALTER TABLE `xat_grup`
  ADD CONSTRAINT `xat_grup_id_grup_foreign` FOREIGN KEY (`id_grup`) REFERENCES `grup` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `xat_grup_id_xat_foreign` FOREIGN KEY (`id_xat`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Restriccions per a la taula `xat_usuaris`
--
ALTER TABLE `xat_usuaris`
  ADD CONSTRAINT `xat_usuaris_id_usuari_foreign` FOREIGN KEY (`id_usuari`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `xat_usuaris_id_xat_foreign` FOREIGN KEY (`id_xat`) REFERENCES `xat` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
