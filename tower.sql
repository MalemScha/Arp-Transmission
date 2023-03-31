-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 01:34 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tower`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lines`
--

CREATE TABLE `lines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `start_location_id` bigint(20) UNSIGNED NOT NULL,
  `end_location_id` bigint(20) UNSIGNED NOT NULL,
  `line_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lines`
--

INSERT INTO `lines` (`id`, `user_id`, `start_location_id`, `end_location_id`, `line_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 4, 'TRN-L-1', 'papumpare', '2023-01-18 00:39:42', '2023-01-18 00:39:42'),
(5, 1, 3, 4, 'TRN-L-5', 'Line Itanagar', '2023-01-19 04:18:50', '2023-01-19 04:18:50'),
(9, 1, 14, 15, 'TRN-L-9', 'Imphal Line', '2023-01-19 22:13:32', '2023-01-19 22:13:32'),
(10, 1, 16, 17, 'TRN-L-10', 'anotherImphal Line', '2023-01-19 22:18:16', '2023-01-19 22:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `user_id`, `name`, `longitude`, `latitude`, `created_at`, `updated_at`) VALUES
(2, 1, 'malem', '23n', '67s', '2023-01-18 00:24:22', '2023-01-18 00:24:22'),
(3, 1, 'malem', '67n', '78s', '2023-01-18 00:39:42', '2023-01-18 00:39:42'),
(4, 1, 'ngamba', '14n', '98s', '2023-01-18 00:39:42', '2023-01-18 00:39:42'),
(5, 1, 'Tawang Tower', '-122.0840022', '37.4219903', '2023-01-19 04:18:48', '2023-01-19 04:18:48'),
(6, 1, 'Imphal', '-122.0840022', '37.4219903', '2023-01-19 12:07:25', '2023-01-19 12:07:25'),
(7, 1, 'Singjamei', '-122.0840022', '37.4219903', '2023-01-19 12:09:07', '2023-01-19 12:09:07'),
(14, 1, 'Imphal', '-122.0840022', '37.4219903', '2023-01-19 22:13:32', '2023-01-19 22:13:32'),
(15, 1, 'Swombung', '-122.0840022', '37.4219903', '2023-01-19 22:13:32', '2023-01-19 22:13:32'),
(16, 1, 'Another Imphal', '-122.0840022', '37.4219903', '2023-01-19 22:18:16', '2023-01-19 22:18:16'),
(17, 1, 'Another Swombung', '-122.0840022', '37.4219903', '2023-01-19 22:18:16', '2023-01-19 22:18:16');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_09_135529_create_permission_tables', 1),
(5, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(6, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(7, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(8, '2016_06_01_000004_create_oauth_clients_table', 2),
(9, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(10, '2023_01_18_043356_create_towers_table', 3),
(11, '2023_01_18_044033_create_lines_table', 3),
(13, '2023_01_18_045132_create_locations_table', 3),
(15, '2023_01_20_151725_create_questions_table', 4),
(18, '2023_01_18_044050_create_reports_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('171fd594d595c2eeb3871507487999279b453f6323d1810850a472f9bfb2d6e9c44f750e4852a94a', 1, 1, 'authToken', '[]', 0, '2023-01-18 21:41:08', '2023-01-18 21:41:08', '2024-01-19 03:11:08'),
('2278b7dbde6c04899cf5886cc267b73610fa9af2313763b26ffad83be377db89df21b99c56119340', 1, 1, 'authToken', '[]', 1, '2023-01-20 13:07:48', '2023-01-20 13:07:48', '2024-01-20 18:37:48'),
('49cb03892c6bfe50780a771c6475a3e87276fb336910b9b8e0e55f3dccd0c6ac9372886b4bac7eb1', 1, 1, 'authToken', '[]', 0, '2023-01-21 11:14:06', '2023-01-21 11:14:06', '2024-01-21 16:44:06'),
('b9ca2503487886f4233aa3603ffa3ceb03537da12f24752982c12a83859ef394f3947102136dc9d7', 1, 1, 'authToken', '[]', 1, '2023-01-18 14:45:07', '2023-01-18 14:45:07', '2024-01-18 20:15:07');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Themekit-Laravel-Admin-Panel Personal Access Client', 'UMWq3J9lINVBrWehpr7QJ9wOcoBp27o1PdJu5nN7', NULL, 'http://localhost', 1, 0, 0, '2020-05-09 15:21:41', '2020-05-09 15:21:41'),
(2, NULL, 'Themekit-Laravel-Admin-Panel Password Grant Client', 'A6CbTxyM5JHmF4Yk4BB2Bj23D4EnhEDac7TyuFCF', 'users', 'http://localhost', 0, 1, 0, '2020-05-09 15:21:41', '2020-05-09 15:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-05-09 15:21:41', '2020-05-09 15:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'manage_role', 'web', '2020-03-10 12:40:57', '2020-03-10 12:40:57'),
(3, 'manage_permission', 'web', '2020-03-10 12:41:09', '2020-03-10 12:41:09'),
(4, 'manage_user', 'web', '2020-03-10 12:41:41', '2020-03-10 12:41:41'),
(8, 'manage_tower', 'web', '2023-01-20 09:36:25', '2023-01-20 09:36:25'),
(9, 'manage_line', 'web', '2023-01-20 09:36:49', '2023-01-20 09:36:49');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `q3` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `q6` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `q11` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `q12` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `q13` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `q14` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `q15` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `q16` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `q17` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `q18` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `q19` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `q20` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `q1` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `q2` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `q4` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `q5` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `q7` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `q8` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `q9` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `q10` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `q3`, `q6`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `q20`, `q1`, `q2`, `q4`, `q5`, `q7`, `q8`, `q9`, `q10`, `created_at`, `updated_at`) VALUES
(1, 'Numbers of broken/damaged insulators in each string.', 'Numbers of missing/tilted/broken corona/grading ring.', 'Value of tower impedance.', 'Clearance between bottom conductor and vegetation in Row.', 'Side clearance of conductors \r\nfrom nearby tall objects (tree, small hills, building etc.) \r\nnear to ROW.', 'Vertical clearance between conductors at maximum sag.', 'Clearance between earth wire/OPGW and top conductor.', 'Minimum clearance of jumper from tower body.', 'The maximum value of jumper drop.', 'Clearance of bottom conductor from power line crossing (under crossing).', 'Clearance of top conductor from power line crossing (overhead crossing).', 'Result of PID scanning (If the transmission line is older than 10 years and has a history of flashovers/decapping).', 'Damaged/Missing counter poise earthing.', 'Presence of pilot insulators and counter weight on jumpers.', 'Deposition of pollutant (dirt, bird excreta/coastal etc.) on insulators.', 'Flashover marks on insulators.', 'The presence of foreign material on the tower near the conductor (cross arm, insulator, earth peak, etc.).', 'Missing/Disconnected copper bond/aluminium bond.', 'Loose/Hanging bird guards.', 'Loose/Missing/Hanging tower members.', '2023-01-20 15:41:27', '2023-01-20 15:41:27');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tower_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `q3` bigint(20) UNSIGNED NOT NULL,
  `q6` bigint(20) UNSIGNED NOT NULL,
  `q11` bigint(20) UNSIGNED DEFAULT NULL,
  `q12` bigint(20) UNSIGNED DEFAULT NULL,
  `q13` bigint(20) UNSIGNED DEFAULT NULL,
  `q14` bigint(20) UNSIGNED DEFAULT NULL,
  `q15` bigint(20) UNSIGNED DEFAULT NULL,
  `q16` bigint(20) UNSIGNED DEFAULT NULL,
  `q17` bigint(20) UNSIGNED DEFAULT NULL,
  `q18` bigint(20) UNSIGNED DEFAULT NULL,
  `q19` bigint(20) UNSIGNED DEFAULT NULL,
  `q20` bigint(20) UNSIGNED DEFAULT NULL,
  `q1` tinyint(1) NOT NULL,
  `q2` tinyint(1) NOT NULL,
  `q4` tinyint(1) NOT NULL,
  `q5` tinyint(1) NOT NULL,
  `q7` tinyint(1) NOT NULL,
  `q8` tinyint(1) NOT NULL,
  `q9` tinyint(1) NOT NULL,
  `q10` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `tower_id`, `user_id`, `image`, `location_id`, `q3`, `q6`, `q11`, `q12`, `q13`, `q14`, `q15`, `q16`, `q17`, `q18`, `q19`, `q20`, `q1`, `q2`, `q4`, `q5`, `q7`, `q8`, `q9`, `q10`, `created_at`, `updated_at`) VALUES
(3, 3, 1, 'default', 2, 0, 23, 500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, 0, 1, 1, 0, 0, 1, '2023-01-21 04:47:36', '2023-01-21 04:47:36'),
(4, 2, 1, 'default', 2, 12, 5, 1000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, 0, 1, '2023-01-21 05:27:49', '2023-01-21 05:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2020-03-10 12:10:47', '2020-03-10 12:10:47'),
(2, 'Admin', 'web', '2020-03-10 13:09:23', '2020-03-10 13:09:23'),
(10, 'Chief Engineer', 'web', '2023-01-20 09:32:19', '2023-01-20 09:32:19'),
(11, 'Superintending Engineer', 'web', '2023-01-20 09:33:23', '2023-01-20 09:33:23'),
(12, 'Executive Engineer', 'web', '2023-01-20 09:33:34', '2023-01-20 09:33:34'),
(13, 'Assistant Engineer', 'web', '2023-01-20 09:33:55', '2023-01-20 09:33:55'),
(14, 'Junior Engineer', 'web', '2023-01-20 09:34:17', '2023-01-20 09:34:17'),
(15, 'Department Patroller', 'web', '2023-01-20 09:35:17', '2023-01-20 09:35:17'),
(16, 'AMC Supervisor', 'web', '2023-01-20 09:35:29', '2023-01-20 09:35:29'),
(17, 'AMC Patroller', 'web', '2023-01-20 09:35:36', '2023-01-20 09:35:36');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `towers`
--

CREATE TABLE `towers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED NOT NULL,
  `line_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tower_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `towers`
--

INSERT INTO `towers` (`id`, `user_id`, `location_id`, `line_id`, `name`, `tower_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 'papumpare', 'TRN-T-1', '2023-01-18 00:24:22', '2023-01-18 00:24:22'),
(2, 1, 2, 1, 'Itanagar', 'TRN-T-2', '2023-01-18 13:40:15', '2023-01-18 13:40:15'),
(3, 1, 2, 5, 'Churachandpur', 'TRN-T-3', '2023-01-18 13:43:14', '2023-01-18 13:43:14'),
(4, 1, 2, 1, 'tsdfjgkjhkk', 'TRN-T-4', '2023-01-18 13:45:00', '2023-01-18 13:45:00'),
(5, 1, 2, 1, 'jkfgifuvuhkvkhjvb', 'TRN-T-5', '2023-01-18 13:45:00', '2023-01-18 13:45:00'),
(6, 1, 2, 1, 'tresetrdyitfuyoiyfudyxthdddft', 'TRN-T-6', '2023-01-18 13:46:26', '2023-01-18 13:46:26'),
(7, 1, 2, 1, 'rstdyftugyiuhilgkfghcjf', 'TRN-T-7', '2023-01-18 13:46:26', '2023-01-18 13:46:26'),
(8, 1, 2, 1, 'poiiuoyuiftydurfkglhu;j', 'TRN-T-8', '2023-01-18 13:47:44', '2023-01-18 13:47:44'),
(9, 1, 2, 1, 'poiutytydtshdfjkghlk', 'TRN-T-9', '2023-01-18 13:47:44', '2023-01-18 13:47:44'),
(10, 1, 2, 1, 'poiuytydtsdhfjgkh', 'TRN-T-10', '2023-01-18 13:49:00', '2023-01-18 13:49:00'),
(11, 1, 2, 1, 'aerwtsreytdrtiuyg', 'TRN-T-11', '2023-01-18 13:49:00', '2023-01-18 13:49:00'),
(12, 1, 2, 1, 'earseytdruyftukg', 'TRN-T-12', '2023-01-18 13:49:56', '2023-01-18 13:49:56'),
(13, 1, 2, 1, 'bjyurtysertdruyitfuyg', 'TRN-T-13', '2023-01-18 13:49:56', '2023-01-18 13:49:56'),
(14, 1, 5, 1, 'Tawang', 'TRN-T-14', '2023-01-19 04:18:48', '2023-01-19 04:18:48'),
(15, 1, 6, 5, 'New Tower', 'TRN-T-15', '2023-01-19 12:07:25', '2023-01-19 12:07:25'),
(16, 1, 7, 1, 'Another Tower', 'TRN-T-16', '2023-01-19 12:09:07', '2023-01-19 12:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@test.com', NULL, '$2y$10$40lQm5lnWgtElBwnko7ASuUr.Obu2CI.hPecZ8ZciGsYKkXw2Kf3.', NULL, NULL, '2020-05-10 05:09:49'),
(2, 'Project Manager', 'pm@test.com', NULL, '$2y$10$rm0yp.fuqPZevIkxlActtuBpMuTHLGwPRYFaNlA5TToZZqx.i7Tra', NULL, '2020-03-12 12:48:59', '2020-03-12 12:48:59'),
(3, 'Sales Manager', 'sm@test.com', NULL, '$2y$10$40lQm5lnWgtElBwnko7ASuUr.Obu2CI.hPecZ8ZciGsYKkXw2Kf3.', NULL, '2020-03-12 12:50:15', '2020-03-12 12:50:15'),
(4, 'HR', 'hr@test.com', NULL, '$2y$10$sFgFRrOZS4mzhRlAHbDIie.Kz.G3YSIYynnmcljjxVzyl0gkMQT6a', NULL, '2020-03-12 12:55:25', '2020-03-12 12:55:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lines`
--
ALTER TABLE `lines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lines_line_id_unique` (`line_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `towers`
--
ALTER TABLE `towers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `towers_tower_id_unique` (`tower_id`);

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
-- AUTO_INCREMENT for table `lines`
--
ALTER TABLE `lines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `towers`
--
ALTER TABLE `towers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
