-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table votesys-mluc.admin_acct_models: ~2 rows (approximately)
DELETE FROM `admin_acct_models`;
/*!40000 ALTER TABLE `admin_acct_models` DISABLE KEYS */;
INSERT INTO `admin_acct_models` (`id`, `fname`, `lname`, `imageUrl`, `email`, `password`, `role`, `organization`, `canMngStd`, `canMngCand`, `canMngRtt`, `canVvto`, `canMngRtmt`, `canMngUsers`, `created_at`, `updated_at`) VALUES
	(1, 'Jake', 'Montizon', 'https://tinyurl.com/gikokomi', 'jake.montizon@dmmmsu.edu.ph', '$2y$10$U.Q/GlGTJGR0tJmZNU9.Luss9YDY/pUEP1YRIqBYeW6LW2IOZnsvC', 'Superadmin', 'SAS', 'true', 'true', 'true', 'true', 'true', 'true', '2022-03-18 06:38:19', '2022-03-18 06:38:19'),
	(2, 'mark jansen', 'Ballesteros', 'https://tinyurl.com/macmakagago', 'markjansen@gmail.com', '$2y$10$AFdMFCdCRVk7Rnt07YU/bur.bHiL7yOrsmL6fdy12Hmv0HD0zS6xy', 'superadmin', 'SBO Chairman-CIT', 'true', 'true', 'true', 'true', 'true', 'true', '2022-03-18 09:53:19', '2022-03-18 09:53:19');
/*!40000 ALTER TABLE `admin_acct_models` ENABLE KEYS */;

-- Dumping data for table votesys-mluc.candidate_models: ~0 rows (approximately)
DELETE FROM `candidate_models`;
/*!40000 ALTER TABLE `candidate_models` DISABLE KEYS */;
/*!40000 ALTER TABLE `candidate_models` ENABLE KEYS */;

-- Dumping data for table votesys-mluc.colleges: ~9 rows (approximately)
DELETE FROM `colleges`;
/*!40000 ALTER TABLE `colleges` DISABLE KEYS */;
INSERT INTO `colleges` (`id`, `name`, `initials`) VALUES
	(1, 'Campus Elections (MLUC)', 'MLUC'),
	(2, 'College of Information Technology', 'CIT'),
	(3, 'College of Technical Education', 'CTED'),
	(4, 'College of Technology', 'COT'),
	(5, 'College of Engineering', 'COE'),
	(6, 'College of Management', 'COM'),
	(7, 'Institute of Criminal Justice Education', 'ICJE'),
	(8, 'College of Arts and Sciences', 'CAS'),
	(9, 'College of Law', 'CLAW');
/*!40000 ALTER TABLE `colleges` ENABLE KEYS */;

-- Dumping data for table votesys-mluc.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping data for table votesys-mluc.migrations: ~9 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(19, '2014_10_12_000000_create_users_table', 1),
	(20, '2014_10_12_100000_create_password_resets_table', 1),
	(21, '2019_08_19_000000_create_failed_jobs_table', 1),
	(22, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(23, '2022_02_28_014056_create_voter_models_table', 1),
	(24, '2022_03_09_060701_create_admin_acct_models_table', 1),
	(25, '2022_03_12_040503_create_candidate_models_table', 1),
	(26, '2022_03_15_083230_create_sessions_table', 1),
	(27, '2022_03_17_024131_create_voter_acct_models_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping data for table votesys-mluc.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping data for table votesys-mluc.personal_access_tokens: ~10 rows (approximately)
DELETE FROM `personal_access_tokens`;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\AdminAcctModel', 1, 'main', '98f11fde014e797e4d0b9dc939616f116fed5c843ec310502a07bee383415300', '["*"]', NULL, '2022-03-18 06:38:19', '2022-03-18 06:38:19'),
	(2, 'App\\Models\\AdminAcctModel', 1, 'main', 'abc18a125924ba6a78143e1ae75814b61a87f175a9826183c775fa59587d227c', '["*"]', NULL, '2022-03-18 09:29:45', '2022-03-18 09:29:45'),
	(4, 'App\\Models\\AdminAcctModel', 1, 'main', '361554d2c1657de4b38319b80022546b91a62ec418b094eb04bc3b9cdffdb9a3', '["*"]', NULL, '2022-03-18 09:47:35', '2022-03-18 09:47:35'),
	(5, 'App\\Models\\AdminAcctModel', 2, 'main', '09ec349327b09b99be448a401458dc1341e24eb5609e60761cfafdf52ebb392f', '["*"]', NULL, '2022-03-18 09:53:19', '2022-03-18 09:53:19'),
	(8, 'App\\Models\\AdminAcctModel', 1, 'main', 'cc0b94459f082c2e9241eb241fabf4b2719515a3dd4ceadb0755417ef570657b', '["*"]', NULL, '2022-03-18 10:18:28', '2022-03-18 10:18:28'),
	(10, 'App\\Models\\AdminAcctModel', 2, 'main', 'e8a314e06ed5815d1ef046d3027b96a7c43cf2b4eeeb1f85d3dee17c86b4ef4f', '["*"]', NULL, '2022-03-18 12:25:13', '2022-03-18 12:25:13'),
	(11, 'App\\Models\\AdminAcctModel', 1, 'main', '290a728bef45cef8580a5844789708e6351108a2ff9ba2bb3f28eda685c23bd2', '["*"]', NULL, '2022-03-21 02:32:38', '2022-03-21 02:32:38'),
	(14, 'App\\Models\\AdminAcctModel', 1, 'main', '34e8188797a8004b998e3dd026f39024b4af0b393c312b1deb731e170ea8a5b7', '["*"]', NULL, '2022-03-21 04:48:42', '2022-03-21 04:48:42'),
	(28, 'App\\Models\\AdminAcctModel', 1, 'main', '0727b623501c11731d72ac65df9650e455775fff2451ee37e361a144bb266490', '["*"]', NULL, '2022-03-21 09:46:54', '2022-03-21 09:46:54'),
	(30, 'App\\Models\\AdminAcctModel', 2, 'main', 'f9222f29012ebbffcefe0ddbbec10a64dba0dd4f159b59d766921b3447b0d0f6', '["*"]', NULL, '2022-03-21 09:58:57', '2022-03-21 09:58:57'),
	(48, 'App\\Models\\AdminAcctModel', 1, 'main', 'fe44dba59dc242b473604fa9487704b978f1248f84a8953ed0e32d8d80f3e3e0', '["*"]', NULL, '2022-03-22 12:27:11', '2022-03-22 12:27:11');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping data for table votesys-mluc.sessions: ~0 rows (approximately)
DELETE FROM `sessions`;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;

-- Dumping data for table votesys-mluc.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping data for table votesys-mluc.voter_acct_models: ~2 rows (approximately)
DELETE FROM `voter_acct_models`;
/*!40000 ALTER TABLE `voter_acct_models` DISABLE KEYS */;
INSERT INTO `voter_acct_models` (`id`, `fname`, `lname`, `email`, `password`, `college`, `created_at`, `updated_at`) VALUES
	(1, 'Steven', 'Sevilla', 'steven.sevilla@student.dmmmsu.edu.ph', '$2y$10$x7JCY8EIvHfdHCRiB3l76Ox52zo3pr8rh0vTCIaK6G7l1puPx/vUa', 'College of Information Technology', '2022-03-22 04:47:44', '2022-03-22 04:47:44'),
	(2, 'Mark Jansen', 'Ballesteros', 'mark.jansen@student.dmmmsu.edu.ph', '$2y$10$iM2Uwsro7jeT6PFD4nYVrOo.C8bWvGrT2222XU/aiNDV8i2.DgAh2', 'College of Information Technology', '2022-03-22 07:44:54', '2022-03-22 07:44:54'),
	(3, 'Alflorence', 'Abuan', 'alflorence.abuan@student.dmmmsu.edu.ph', '$2y$10$6DcX4pkQ7Nts/6MWDtDBWeiulsZB/kS/1o4t4JhZ7zBdROamDRxgG', 'College of Information Technology', '2022-03-22 11:21:58', '2022-03-22 11:21:58');
/*!40000 ALTER TABLE `voter_acct_models` ENABLE KEYS */;

-- Dumping data for table votesys-mluc.voter_models: ~3 rows (approximately)
DELETE FROM `voter_models`;
/*!40000 ALTER TABLE `voter_models` DISABLE KEYS */;
INSERT INTO `voter_models` (`id`, `idNum`, `fname`, `lname`) VALUES
	(1, 18105452, 'Jake', 'Montizon'),
	(2, 18105552, 'Steven', 'Sevilla'),
	(3, 18119722, 'Mark Jansen', 'Ballesteros');
/*!40000 ALTER TABLE `voter_models` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
