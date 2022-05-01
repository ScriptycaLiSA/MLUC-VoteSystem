-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table votesys-mluc.colleges_models
CREATE TABLE IF NOT EXISTS `colleges_models` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initials` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `initials` (`initials`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table votesys-mluc.colleges_models: ~10 rows (approximately)
DELETE FROM `colleges_models`;
/*!40000 ALTER TABLE `colleges_models` DISABLE KEYS */;
INSERT INTO `colleges_models` (`id`, `name`, `initials`) VALUES
	(8, 'Mid La Union Campus', 'MLUC'),
	(9, 'College of Information Technology', 'CIT'),
	(10, 'College of Technical Education', 'CTED'),
	(11, 'College of Technology', 'COT'),
	(12, 'College of Engineering', 'COE'),
	(13, 'College of Management', 'COM'),
	(14, 'Institute of Criminal Justice Education', 'ICJE'),
	(15, 'College of Arts And Sciences', 'CAS'),
	(16, 'College of Arts And Law', 'CLAW');
/*!40000 ALTER TABLE `colleges_models` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
