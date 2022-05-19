-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.29 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table votesys-mluc.colleges_models
CREATE TABLE IF NOT EXISTS `colleges_models` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `coll_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `initials` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `initials` (`initials`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table votesys-mluc.colleges_models: ~8 rows (approximately)
INSERT INTO `colleges_models` (`id`, `coll_name`, `initials`) VALUES
	(1, 'College of Information Technology', 'CIT'),
	(2, 'College of Technical Education', 'CTED'),
	(3, 'College of Technology', 'COT'),
	(4, 'College of Engineering', 'COE'),
	(5, 'College of Management', 'COM'),
	(6, 'Institute of Criminal Justice Education', 'ICJE'),
	(7, 'College of Arts And Sciences', 'CAS'),
	(8, 'College of Law', 'CLAW');

-- Dumping structure for table votesys-mluc.position_models
CREATE TABLE IF NOT EXISTS `position_models` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pos_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table votesys-mluc.position_models: ~8 rows (approximately)
INSERT INTO `position_models` (`id`, `pos_name`, `created_at`, `updated_at`) VALUES
	(41, 'Governor', '2022-05-18 12:30:41', '2022-05-18 12:30:41'),
	(42, 'Vice Governor', '2022-05-18 12:30:50', '2022-05-18 12:30:50'),
	(43, 'Secretary', '2022-05-18 12:31:01', '2022-05-18 12:31:01'),
	(44, 'Treasurer', '2022-05-18 12:31:22', '2022-05-18 12:31:22'),
	(45, 'P.R.O.', '2022-05-18 12:32:06', '2022-05-18 12:32:06'),
	(46, 'Auditor', '2022-05-18 12:33:14', '2022-05-18 12:33:14'),
	(47, 'Business Manager', '2022-05-18 12:33:50', '2022-05-18 12:33:50'),
	(48, 'Peace Officers', '2022-05-18 12:34:04', '2022-05-18 12:34:04');

-- Dumping structure for table votesys-mluc.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'user.png',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table votesys-mluc.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `image`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
	(6, 'SU Admin', 'user.png', 'su@email.com', NULL, '$2a$10$Y6QL4rCbFBoLE5QF2ZiI5e5g0szpkqDYmglx2lBjwBmcuUDk7c6ZW', 'superadmin', NULL, '2022-05-18 09:22:03', '2022-05-18 09:22:04'),
	(7, 'Admin Name', 'user.png', 'admin@email.com', NULL, '$2a$10$Y6QL4rCbFBoLE5QF2ZiI5e5g0szpkqDYmglx2lBjwBmcuUDk7c6ZW', 'admin', NULL, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
