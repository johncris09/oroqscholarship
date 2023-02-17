-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 06:35 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oroqscholarshipdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`id`, `user_id`, `group`, `created_at`) VALUES
(42, 72, 'superadmin', '2023-01-15 19:52:31'),
(43, 73, 'superadmin', '2023-01-15 20:19:05'),
(44, 74, 'superadmin', '2023-02-03 00:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `auth_identities`
--

CREATE TABLE `auth_identities` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `secret` varchar(255) NOT NULL,
  `secret2` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text DEFAULT NULL,
  `force_reset` tinyint(1) NOT NULL DEFAULT 0,
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_identities`
--

INSERT INTO `auth_identities` (`id`, `user_id`, `type`, `name`, `secret`, `secret2`, `expires`, `extra`, `force_reset`, `last_used_at`, `created_at`, `updated_at`) VALUES
(58, 72, 'email_password', NULL, 'manabojc@gmail.com', '$2y$10$dbKbUV0TBqb/Vo1klCxayO6MBCQ.hDjwMtVT6uGLNPFLi1xCFOyYa', NULL, NULL, 0, NULL, '2023-01-15 19:52:31', '2023-01-15 19:52:31'),
(61, 73, 'email_password', NULL, 'test@gmail.com', '$2y$10$eHwmRpYOVI3pqsJlkTJf6OtjZikh5BtB658DKSaogJtzrDhPxPNJe', NULL, NULL, 0, '2023-02-15 23:31:47', '2023-01-15 20:19:04', '2023-02-15 23:32:13'),
(62, 74, 'email_password', NULL, 'user@gmail.com', '$2y$10$6JPgGriX8hVWRBboblJkPeeNDRi4AE2uX75M8UF.g4bMb0A10nXXW', NULL, NULL, 0, '2023-02-03 00:34:27', '2023-02-03 00:34:09', '2023-02-03 00:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `user_agent`, `id_type`, `identifier`, `user_id`, `date`, `success`) VALUES
(56, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'manabojc@gmail.com', NULL, '2023-01-15 19:52:00', 0),
(57, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-01-15 20:19:35', 1),
(58, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', NULL, '2023-01-16 18:33:06', 0),
(59, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-01-16 18:33:31', 1),
(60, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', NULL, '2023-01-17 20:10:50', 0),
(61, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-01-17 20:10:58', 1),
(62, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-01-30 00:26:10', 1),
(63, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-01-30 18:07:08', 1),
(64, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-01-30 23:38:51', 1),
(65, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-01-31 18:09:09', 1),
(66, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-01 18:16:04', 1),
(67, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-02 18:14:14', 1),
(68, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-03 00:02:20', 1),
(69, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-03 00:33:27', 1),
(70, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'user@gmail.com', 74, '2023-02-03 00:34:27', 1),
(71, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-05 18:09:59', 1),
(72, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-06 19:13:19', 1),
(73, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-06 21:28:34', 1),
(74, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-07 18:54:40', 1),
(75, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-08 23:24:00', 1),
(76, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-09 01:34:22', 1),
(77, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-09 18:05:01', 1),
(78, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-09 21:30:28', 1),
(79, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-09 22:27:12', 1),
(80, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-10 00:25:38', 1),
(81, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-10 02:02:01', 1),
(82, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-12 23:27:32', 1),
(83, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-13 01:28:55', 1),
(84, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-13 18:11:16', 1),
(85, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-13 20:47:12', 1),
(86, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-13 22:58:52', 1),
(87, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-15 18:16:03', 1),
(88, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-15 20:43:37', 1),
(89, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-15 22:52:20', 1),
(90, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-15 23:03:23', 1),
(91, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', NULL, '2023-02-15 23:31:37', 0),
(92, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', NULL, '2023-02-15 23:31:42', 0),
(93, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', NULL, '2023-02-15 23:31:43', 0),
(94, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', NULL, '2023-02-15 23:31:43', 0),
(95, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'email_password', 'test@gmail.com', 73, '2023-02-15 23:31:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions_users`
--

CREATE TABLE `auth_permissions_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_remember_tokens`
--

CREATE TABLE `auth_remember_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_token_logins`
--

CREATE TABLE `auth_token_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `semester_closed` tinyint(1) NOT NULL,
  `current_year` year(4) NOT NULL,
  `current_sy` varchar(100) NOT NULL,
  `current_sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `semester_closed`, `current_year`, `current_sy`, `current_sem`) VALUES
(1, 0, 2023, 'SY: 2022-2023', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(9) NOT NULL,
  `class` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(31) NOT NULL DEFAULT 'string',
  `context` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sys_sequence`
--

CREATE TABLE `sys_sequence` (
  `Sys_ID` int(50) NOT NULL,
  `seq_name` varchar(50) NOT NULL,
  `seq_year` int(50) NOT NULL,
  `seq_sem` int(50) NOT NULL,
  `seq_appno` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sys_sequence`
--

INSERT INTO `sys_sequence` (`Sys_ID`, `seq_name`, `seq_year`, `seq_sem`, `seq_appno`) VALUES
(1, 'shs_appno', 2022, 1, 850),
(2, 'college_appno', 2022, 1, 1490),
(3, 'tvet_appno', 2021, 1, 63);

-- --------------------------------------------------------

--
-- Table structure for table `table_colcourse`
--

CREATE TABLE `table_colcourse` (
  `ID` int(50) NOT NULL,
  `colCourse` varchar(50) NOT NULL,
  `colManager` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_colcourse`
--

INSERT INTO `table_colcourse` (`ID`, `colCourse`, `colManager`) VALUES
(1, 'BS Accounting Tech.', 'Active'),
(2, 'BSED - English', 'Active'),
(3, 'BEED', 'Active'),
(4, 'BSED - TLE', 'Active'),
(5, 'BSED', 'Active'),
(6, 'BS Accountancy', 'Active'),
(7, 'BS-IT', 'Active'),
(8, 'BSBA', 'Active'),
(9, 'BS Criminology', 'Active'),
(10, 'AB-English', 'Active'),
(11, 'BEED-ECE', 'Active'),
(12, 'BSE-TLE', 'Active'),
(13, 'BTLEd-ICT', 'Active'),
(14, 'BSMT', 'Active'),
(15, 'BS Mechanical Engineering', 'Active'),
(16, 'BSME', 'Active'),
(17, 'HM', 'Active'),
(18, 'EIM', 'Active'),
(19, 'Driving', 'Active'),
(20, 'Massage Therapy', 'Active'),
(21, 'BTLEd-HE', 'Active'),
(22, 'BSHM', 'Active'),
(23, 'BS-Biology', 'Active'),
(24, 'BTLEd-IA', 'Active'),
(25, 'IET', 'Active'),
(26, 'BS-MARE', 'Active'),
(27, 'BS HRM', 'Active'),
(28, 'BS Civil Engineering', 'Active'),
(29, 'BS MB', 'Active'),
(30, 'BS Nursing', 'Active'),
(31, 'BSCS', 'Active'),
(32, 'BS Chemistry', 'Active'),
(33, 'BSTM', 'Active'),
(34, 'BS Chemical Engineering', 'Active'),
(35, 'BS ECE', 'Active'),
(36, 'BSHM', 'Active'),
(37, 'BET-MMT', 'Active'),
(38, 'DAT', 'Active'),
(39, 'BS IS', 'Active'),
(40, 'BS IA', 'Active'),
(41, 'BS HM', 'Active'),
(42, 'BS Math', 'Active'),
(43, 'BET-ELET', 'Active'),
(44, 'BS Architecture', 'Active'),
(45, 'BSAIS', 'Active'),
(46, 'BS COE', 'Active'),
(47, 'BS STAT', 'Active'),
(48, 'BS TM', 'Active'),
(49, 'BS MB', 'Active'),
(50, 'BS SW', 'Active'),
(51, 'BSIT-Civil Tech.', 'Active'),
(52, 'BS CE', 'Active'),
(53, 'BS Economics', 'Active'),
(54, 'BS Agriculture', 'Active'),
(55, 'BS PE', 'Active'),
(56, 'BSED Filipino', 'Active'),
(57, 'BTLEd-HE', 'Active'),
(58, 'BTLEd-IA', 'Active'),
(59, 'BS EE', 'Active'),
(60, 'BS ME', 'Active'),
(61, 'SMAW', 'Active'),
(62, 'BSMA', 'Active'),
(63, 'BS AM', 'Active'),
(64, 'BA-English', 'Active'),
(65, 'nc1111', 'Active'),
(66, 'casdfasd', 'Active'),
(67, '123', 'Active'),
(68, 'asdfasd', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `table_collegeapp`
--

CREATE TABLE `table_collegeapp` (
  `ID` int(50) NOT NULL,
  `colAppNoYear` int(10) NOT NULL,
  `colAppNoID` int(10) NOT NULL,
  `colAppNoSem` int(10) NOT NULL,
  `colAppStat` varchar(50) NOT NULL,
  `colFirstName` varchar(50) DEFAULT NULL,
  `colLastName` varchar(50) NOT NULL,
  `colMI` varchar(50) DEFAULT NULL,
  `colSuffix` varchar(50) DEFAULT NULL,
  `colAddress` varchar(200) NOT NULL,
  `colDOB` varchar(50) NOT NULL,
  `colAge` varchar(50) NOT NULL,
  `colCivilStat` varchar(50) NOT NULL,
  `colGender` varchar(50) NOT NULL,
  `colContactNo` varchar(50) NOT NULL,
  `colCTC` varchar(50) NOT NULL,
  `colEmailAdd` varchar(50) DEFAULT NULL,
  `colAvailment` varchar(50) NOT NULL,
  `colSchool` varchar(200) NOT NULL,
  `colSchoolAddress` varchar(200) DEFAULT NULL,
  `colCourse` varchar(200) NOT NULL,
  `colYearLevel` varchar(50) NOT NULL,
  `colSem` varchar(50) NOT NULL,
  `colSY` varchar(50) NOT NULL,
  `colFathersName` varchar(50) NOT NULL,
  `colFatherOccu` varchar(50) NOT NULL,
  `colMothersName` varchar(50) NOT NULL,
  `colMotherOccu` varchar(50) NOT NULL,
  `colManager` varchar(50) NOT NULL,
  `colUnits` varchar(50) NOT NULL,
  `colImage` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_collegeapp`
--

INSERT INTO `table_collegeapp` (`ID`, `colAppNoYear`, `colAppNoID`, `colAppNoSem`, `colAppStat`, `colFirstName`, `colLastName`, `colMI`, `colSuffix`, `colAddress`, `colDOB`, `colAge`, `colCivilStat`, `colGender`, `colContactNo`, `colCTC`, `colEmailAdd`, `colAvailment`, `colSchool`, `colSchoolAddress`, `colCourse`, `colYearLevel`, `colSem`, `colSY`, `colFathersName`, `colFatherOccu`, `colMothersName`, `colMotherOccu`, `colManager`, `colUnits`, `colImage`) VALUES
(1, 2023, 1, 1, 'Approved', 'asdasdasdf ', 'asdfasdf ', 'b', '', 'Binuangan', '2000-02-14', '22', 'WIDOWED', 'Male', '09501271511', 'asdf', 'asdf@ hasdfasd', '1', 'USTP', 'School address asjkd asdf', 'BEED-ECE', 'I', '1st', 'SY: 2022-2023', 'father name oasdja', 'Father occipationasdf', 'Mother name asdhfkasd', 'Mother oocpation', 'Active', '1', 0x75706c6f61642f70686f746f2f313637353330323937312e706e67),
(2, 2022, 1, 1, 'Approved', 'asdasd', 'asd', '', '', 'Bolibol', '2023-02-08', '0', 'SINGLE', 'Male', '', '1', '', '1', 'USTP (Oroquieta City)', '', 'BSED - English', 'I', '1st', 'SY: 2022-2023', 'asd', 'fasd', 'as', 'dfasdf', 'Active', '1', ''),
(3, 2023, 2, 1, 'Pending', 'asdf', 'asdf', '', '', 'Binuangan', '2023-02-08', '0', 'SINGLE', 'Male', '', '1', '', '1', 'SVC', '', 'BEED', 'II', '2nd', 'SY: 2021-2022', '', '', '', '', 'Active', '1', ''),
(4, 2023, 3, 1, 'Pending', 'Fasdf asdf', 'Asd', '', '', 'Buenavista', '2023-02-02', '0', 'MARRIED', 'Male', '', '1', '', '1', 'USTP (Oroquieta City)', '', 'BSED - English', 'I', '1st', 'SY: 2022-2023', '', '', '', '', 'Active', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_colonlineapplication`
--

CREATE TABLE `table_colonlineapplication` (
  `ID` int(50) NOT NULL,
  `TimeStamp` varchar(50) NOT NULL,
  `EmailAddress` varchar(50) NOT NULL,
  `Availment` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `Barangay` varchar(50) NOT NULL,
  `Purok` varchar(50) DEFAULT NULL,
  `Street` varchar(50) DEFAULT NULL,
  `DateOfBirth` varchar(50) NOT NULL,
  `ContactNumber` varchar(50) NOT NULL,
  `CivilStatus` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `NameOfSchool` varchar(100) NOT NULL,
  `Semester` varchar(50) NOT NULL,
  `SchoolYear` varchar(50) NOT NULL,
  `SchoolAddress` varchar(100) NOT NULL,
  `YearLevel` varchar(50) NOT NULL,
  `Course` varchar(100) NOT NULL,
  `Units` varchar(50) NOT NULL,
  `FathersName` varchar(50) NOT NULL,
  `FathersOccupation` varchar(50) NOT NULL,
  `MothersName` varchar(50) NOT NULL,
  `MothersOccupation` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table_colschool`
--

CREATE TABLE `table_colschool` (
  `ID` int(50) NOT NULL,
  `colSchoolName` varchar(50) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `colManager` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_colschool`
--

INSERT INTO `table_colschool` (`ID`, `colSchoolName`, `address`, `colManager`) VALUES
(1, '', '', 'Active'),
(2, 'SAINT VINCENTS COLLEGE', '', 'Active'),
(3, 'USTP (Oroquieta City)', 'Mobod, Oroquieta City', 'Active'),
(4, 'SVC', '', 'Active'),
(5, 'MU (Oroquieta City)', 'Poblacion 1, Oroquieta City', 'Active'),
(6, 'SMC', '', 'Active'),
(7, 'DSUMC', '', 'Active'),
(8, 'SCC', '', 'Active'),
(9, 'MIT', '', 'Active'),
(10, 'PHINMA-Cagayan de Oro College', '', 'Active'),
(11, 'MFC', '', 'Active'),
(12, 'DDAST', '', 'Active'),
(13, 'OAIS', '', 'Active'),
(14, 'OLT', '', 'Active'),
(15, 'St. Columban College', '', 'Active'),
(16, 'NMSC', '', 'Active'),
(17, 'USTP', '', 'Active'),
(18, 'MSU-MSAT', '', 'Active'),
(19, 'JRMSU', '', 'Active'),
(20, 'SPC', '', 'Active'),
(21, 'DMMA CSP', '', 'Active'),
(22, 'MSU-IIT', '', 'Active'),
(23, 'MU (Oroquieta City)', '', 'Active'),
(24, 'LSU', '', 'Active'),
(25, 'DMCCFI', '', 'Active'),
(26, 'NOSU', '', 'Active'),
(27, 'AMCC', '', 'Active'),
(28, 'CMU', '', 'Active'),
(29, 'MSU-Marawi', '', 'Active'),
(30, 'NMSCST', '', 'Active'),
(31, 'MU (Ozamiz City)', '', 'Active'),
(32, 'WMSU', '', 'Active'),
(33, 'SHCCI', '', 'Active'),
(34, 'Liceo DCU', '', 'Active'),
(35, 'CPC', '', 'Active'),
(36, 'this is another college school', '', 'Active'),
(37, 'asdfasdf', '', 'Active'),
(38, 'asdfasdg asdfasdf', '', 'Active'),
(39, 'asd 1`2321', '', 'Active'),
(41, 'This Is College School', 'This Is College School Address', 'Active'),
(42, 'A', 'A A A', 'Active'),
(43, 'Hi', 'Consmole', 'Active'),
(44, 'Asd Asdfasdf', 'Asd Asdfasd', 'Active'),
(45, 'Tvet School', 'Tvet School Asddres', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `table_login`
--

CREATE TABLE `table_login` (
  `ID` int(5) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MidIn` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `ConfirmPassword` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `table_scholarregistration`
--

CREATE TABLE `table_scholarregistration` (
  `ID` int(50) NOT NULL,
  `AppNoYear` int(4) DEFAULT NULL,
  `AppNoID` int(50) DEFAULT NULL,
  `AppNoSem` int(2) DEFAULT NULL,
  `AppStatus` varchar(50) NOT NULL,
  `AppFirstName` varchar(50) DEFAULT NULL,
  `AppMidIn` varchar(50) DEFAULT NULL,
  `AppLastName` varchar(50) DEFAULT NULL,
  `AppSuffix` varchar(50) DEFAULT NULL,
  `AppAddress` varchar(100) DEFAULT NULL,
  `AppDOB` varchar(50) DEFAULT NULL,
  `AppAge` int(5) DEFAULT NULL,
  `AppCivilStat` varchar(50) DEFAULT NULL,
  `AppGender` varchar(50) DEFAULT NULL,
  `AppContact` varchar(50) DEFAULT NULL,
  `AppCTC` varchar(50) DEFAULT NULL,
  `AppEmailAdd` varchar(50) DEFAULT NULL,
  `AppAvailment` int(5) DEFAULT NULL,
  `AppSchool` varchar(100) DEFAULT NULL,
  `AppCourse` varchar(50) DEFAULT NULL,
  `AppSchoolAddress` varchar(100) DEFAULT NULL,
  `AppYear` varchar(50) DEFAULT NULL,
  `AppSem` varchar(10) DEFAULT NULL,
  `AppSY` varchar(50) DEFAULT NULL,
  `AppFather` varchar(50) DEFAULT NULL,
  `AppFatherOccu` varchar(50) DEFAULT NULL,
  `AppMother` varchar(50) DEFAULT NULL,
  `AppMotherOccu` varchar(50) DEFAULT NULL,
  `AppManager` varchar(50) DEFAULT NULL,
  `AppImage` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_scholarregistration`
--

INSERT INTO `table_scholarregistration` (`ID`, `AppNoYear`, `AppNoID`, `AppNoSem`, `AppStatus`, `AppFirstName`, `AppMidIn`, `AppLastName`, `AppSuffix`, `AppAddress`, `AppDOB`, `AppAge`, `AppCivilStat`, `AppGender`, `AppContact`, `AppCTC`, `AppEmailAdd`, `AppAvailment`, `AppSchool`, `AppCourse`, `AppSchoolAddress`, `AppYear`, `AppSem`, `AppSY`, `AppFather`, `AppFatherOccu`, `AppMother`, `AppMotherOccu`, `AppManager`, `AppImage`) VALUES
(1, 2023, 1, 1, 'Additional Approved', 'asdfasdf', 'e is initially empty and the user then enters some', 'asdfasdf', '', 'Bolibol', '2023-02-09', 0, 'SINGLE', 'Female', '089203123', 'asdfasd fas', 'asdfasdf haksdfasd', 1, 'MIS', 'TVL', 'this is school address', 'Grade 12', '1st', 'SY: 2022-2023', 'asd', 'fasd', 'fasd', 'fasdfasdf', 'Active', 0x75706c6f61642f70686f746f2f313637353330353235352e706e67),
(2, 2023, 1, 2, 'Approved', 'fasdfa', 'zasdjlfasd', 'asd', '', 'Buenavista', '2023-02-14', 0, 'SINGLE', 'Female', '', '1', '', 1, 'MONHS', 'GAS', 'asdf', 'Grade 11', '2nd', 'SY: 2022-2023', 'asd', 'fasd', 'asd', 'fasdfasdf', 'Active', ''),
(3, 2023, 2, 1, 'Approved', 'asdf', '', 'aasd', '', 'Buenavista', '2023-02-02', 0, 'MARRIED', 'Female', '', 'asd', '', 1, 'MOSTHS', 'HUMSS', 'asd', 'Grade 12', '1st', 'SY: 2022-2023', 'asdf', 'asd', 'fasd', 'fasdfa', 'Active', ''),
(4, 2023, 2, 2, 'Pending', 'asdfasdf', '', 'asd', '', 'Bunga', '2023-02-02', 0, 'MARRIED', 'Male', 'asd', 'asdf', 'asd', 1, 'MOSTHS', 'TVL', 'asdf', 'Grade 12', '2nd', 'SY: 2022-2023', 'asd', 'fasd', 'fasd', 'fasdf', 'Active', ''),
(5, 2023, 3, 1, 'Pending', 'fasdfa', 'zadfasd', 'asd', '', 'Binuangan', '2023-02-09', 0, 'SINGLE', 'Male', '', 'asd', 'asdfasdfasdf', 1, 'MOSTHS', 'GAS', 'dfasdf', 'Grade 11', '1st', 'SY: 2022-2023', 'asd', 'fasd', 'fasd', 'fasdfas', 'Active', ''),
(6, 2023, 3, 2, 'Pending', 'asdf', '', 'asd', '', 'Binuangan', '2023-02-06', 0, 'SINGLE', 'Male', '', 'asd', '', 1, 'MIS', 'HUMSS', '', 'Grade 11', '2nd', 'SY: 2022-2023', 'asdfasdf', 'asd', 'as', 'dfasdf', 'Active', ''),
(7, 2023, 4, 2, 'Pending', 'asdf', '', 'asd', '', 'Bolibol', '2023-02-07', 0, 'MARRIED', 'Male', '', 'asd', '', 1, 'MONHS', 'HUMSS', '', 'Grade 11', '2nd', 'SY: 2022-2023', '', '', '', '', 'Active', ''),
(8, 2023, 5, 2, 'Pending', 'fasdf', '', 'asd', '', 'Buenavista', '2023-02-07', 0, 'SINGLE', 'Male', '', '1', '', 1, 'MIS', 'HUMSS', '', 'Grade 12', '2nd', 'SY: 2022-2023', '', '', '', '', 'Active', ''),
(9, 2023, 4, 1, 'Pending', 'asd', '', 'asd', '', 'Buenavista', '2023-02-09', 0, 'SINGLE', 'Male', '', 'asd', '', 1, 'MOSTHS', 'HUMSS', 'asd', 'Grade 11', '1st', 'SY: 2022-2023', '', '', '', '', 'Active', ''),
(10, 2022, 1, 1, 'Approved', 'Daniel', 'v', 'Escamilla', '', 'Binuangan', '2023-02-13', 0, 'SINGLE', 'Male', '0182 938 1927', '1', 'asdfasdf', 1, 'MIS', 'GAS', 'asd', 'Grade 11', '1st', 'SY: 2022-2023', '', '', '', '', 'Active', ''),
(11, 2022, 2, 1, 'Approved', 'Joshua', '', 'Callender', '', 'Apil', '2023-02-01', 0, 'SINGLE', 'Male', '', 'asd', '1', 1, 'MONHS', 'GAS', '', 'Grade 11', '1st', 'SY: 2022-2023', '', '', '', '', 'Active', ''),
(12, 2022, 3, 1, 'Approved', 'asdf', '', 'asd', '', 'Buenavista', '2023-02-14', 0, 'MARRIED', 'Female', '', '1', '', 1, 'MIS', 'TVL', '', 'Grade 11', '1st', 'SY: 2021-2022', '', '', '', '', 'Active', ''),
(13, 2023, 5, 1, 'Pending', 'FASDF', 'ASDF', 'ASD', 'A', 'Bolibol', '1990-02-04', 33, 'SINGLE', 'Male', '1231 241 2412', 'asd', 'asdfasd', 1, 'MIS', 'HUMSS', 'asdf', 'Grade 11', '1st', 'SY: 2022-2023', 'ASDASD ASDF', 'FASDASD FASD ASD FASDF', 'ASASDF', 'DFAS ASDF', 'Active', ''),
(14, 2023, 6, 1, 'Pending', 'Fasdfasdf', '', 'Asd', '', 'Buntawan', '2023-02-11', 0, 'SINGLE', 'Male', '', '1', '', 1, 'MIS', 'GAS', '', 'Grade 11', '1st', 'SY: 2021-2022', 'Asd', 'Fasdf', 'Asd', 'Fasdf', 'Active', ''),
(15, 2023, 7, 1, 'Pending', '1', '', '1', '', 'Bolibol', '2023-02-08', 0, 'SINGLE', 'Male', '', 'sadf', '', 1, 'MONHS', 'GAS', 'Ponlacion 1', 'Grade 11', '1st', 'SY: 2022-2023', '', '', '', '', 'Active', ''),
(16, 2023, 6, 2, 'Approved', 'John Cris', 'C.', 'Manabo', '', 'Tuyabang Bajo', '1990-02-07', 33, 'SINGLE', 'Male', '', 'dfasd', 'asd', 1, 'MIS', 'HUMSS', 'Mobod Integrated School', 'Grade 11', '2nd', 'SY: 2022-2023', 'Asd', 'Fas', 'Dfas', 'Dfasdf', 'Active', ''),
(17, 2023, 8, 1, 'Pending', 'Fasdf', 'Asdf', 'Asd', '', 'Buenavista', '2023-02-25', 0, 'MARRIED', 'Female', '', 'fasdf', '', 1, 'BNHS', 'TVL', '', 'Grade 11', '1st', 'SY: 2022-2023', 'Asddfasd', 'Fas', 'Asdf', 'Asdfasdf', 'Active', ''),
(18, 2023, 9, 1, 'Pending', 'Asdfa Asdf', '', 'Asdfasd', '', 'Bolibol', '2023-02-07', 0, 'MARRIED', 'Male', '', 'df', '', 1, 'MOSTHS', 'HUMSS', '', 'Grade 11', '1st', 'SY: 2022-2023', '', '', '', '', 'Active', ''),
(19, 2023, 10, 1, 'Pending', 'Asdf', '', 'Asdf', '', 'Buenavista', '2023-02-09', 0, 'MARRIED', 'Male', '', '1', '', 1, 'MIS', 'GAS', '', 'Grade 12', '1st', 'SY: 2022-2023', '', '', '', '', 'Active', ''),
(20, 2023, 11, 1, 'Pending', 'Asd', '', 'Asdf', '', 'Bolibol', '2023-02-10', 0, 'SINGLE', 'Male', '', '1', '', 1, 'MIS', 'HUMSS', '', 'Grade 11', '1st', 'SY: 2022-2023', '', '', '', '', 'Active', 0x7075626c69632f75706c6f61642f70686f746f2f313637363532353632322e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `table_schoolname`
--

CREATE TABLE `table_schoolname` (
  `ID` int(50) NOT NULL,
  `SchoolName` varchar(50) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `Manager` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_schoolname`
--

INSERT INTO `table_schoolname` (`ID`, `SchoolName`, `address`, `Manager`) VALUES
(1, '', NULL, 'Active'),
(34, 'MONHS', 'Ponlacion 1', 'Active'),
(35, 'MIS', 'Mobod Integrated School', 'Active'),
(36, 'MOSTHS', 'Oroquieta City, Misamis Occidental', 'Active'),
(37, 'BNHS', NULL, 'Active'),
(38, 'SNHS', 'Senote, Oroquieta City', 'Active'),
(39, 'TNHS', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `table_strand`
--

CREATE TABLE `table_strand` (
  `ID` int(50) NOT NULL,
  `Strand` varchar(50) NOT NULL,
  `Manager` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_strand`
--

INSERT INTO `table_strand` (`ID`, `Strand`, `Manager`) VALUES
(1, 'GAS', 'Active'),
(2, 'HUMSS', 'Active'),
(3, 'TVL', 'Active'),
(4, 'STEM', 'Active'),
(5, 'ABM', 'Active'),
(6, 'ICT', 'Active'),
(7, 'EIM', 'Active'),
(8, 'sdfgsdf', 'Active'),
(9, 'new strand', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `table_tvet`
--

CREATE TABLE `table_tvet` (
  `ID` int(50) NOT NULL,
  `colAppNoYear` int(10) NOT NULL,
  `colAppNoID` int(10) NOT NULL,
  `colAppNoSem` int(10) NOT NULL,
  `colAppStat` varchar(50) NOT NULL,
  `colFirstName` varchar(100) NOT NULL,
  `colLastName` varchar(100) NOT NULL,
  `colMI` varchar(100) NOT NULL,
  `colSuffix` varchar(50) NOT NULL,
  `colAddress` varchar(200) NOT NULL,
  `colDOB` varchar(50) NOT NULL,
  `colAge` varchar(50) NOT NULL,
  `colCivilStat` varchar(50) NOT NULL,
  `colGender` varchar(50) NOT NULL,
  `colContactNo` varchar(50) NOT NULL,
  `colCTC` varchar(50) NOT NULL,
  `colEmailAdd` varchar(50) NOT NULL,
  `colAvailment` varchar(50) NOT NULL,
  `colSchool` varchar(200) NOT NULL,
  `colSchoolAddress` varchar(200) NOT NULL,
  `colCourse` varchar(200) NOT NULL,
  `colYearLevel` varchar(50) NOT NULL,
  `colSem` varchar(50) NOT NULL,
  `colSY` varchar(50) NOT NULL,
  `colFathersName` varchar(500) NOT NULL,
  `colFatherOccu` varchar(500) NOT NULL,
  `colMothersName` varchar(500) NOT NULL,
  `colMotherOccu` varchar(500) NOT NULL,
  `colManager` varchar(50) NOT NULL,
  `colUnits` varchar(50) NOT NULL,
  `colImage` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_tvet`
--

INSERT INTO `table_tvet` (`ID`, `colAppNoYear`, `colAppNoID`, `colAppNoSem`, `colAppStat`, `colFirstName`, `colLastName`, `colMI`, `colSuffix`, `colAddress`, `colDOB`, `colAge`, `colCivilStat`, `colGender`, `colContactNo`, `colCTC`, `colEmailAdd`, `colAvailment`, `colSchool`, `colSchoolAddress`, `colCourse`, `colYearLevel`, `colSem`, `colSY`, `colFathersName`, `colFatherOccu`, `colMothersName`, `colMotherOccu`, `colManager`, `colUnits`, `colImage`) VALUES
(1, 2022, 1, 1, 'Approved', 'dasdf', 'as', '', '', 'Buenavista', '2023-02-10', '0', 'MARRIED', 'Female', '', '1', '', '1', 'St. Columban College', '', 'BTLEd-ICT', 'III', '1st', 'SY: 2020-2021', 'asd', 'asdf', 'asd', 'fasdf', 'Active', '1', ''),
(2, 2022, 2, 1, 'Approved', 'asd', 'asdf', '', '', 'Binuangan', '2023-02-08', '0', 'SINGLE', 'Female', '', '1', '', '1', 'SVC', '', 'BEED', 'I', '1st', 'SY: 2020-2021', 'as', 'dasd', 'asd', 'asdf', 'Active', '1', ''),
(3, 2023, 1, 1, 'Pending', 'Dasdf', 'As', '1', '', 'Buenavista', '2023-02-03', '0', 'MARRIED', 'Male', '', '1', '', '1', 'USTP (Oroquieta City)', '', 'BSED - English', 'I', '1st', 'SY: 2021-2022', 'Asd', 'Asd', 'Asdf', 'Asdf', 'Active', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `lastname`, `firstname`, `middlename`, `username`, `status`, `status_message`, `active`, `last_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(72, '', '', NULL, 'johncris09', NULL, NULL, 1, NULL, '2023-01-15 19:52:31', '2023-01-15 19:53:05', NULL),
(73, 'Test1', 'Test1', '', 'test12345', NULL, NULL, 0, NULL, '2023-01-15 20:19:04', '2023-01-15 20:19:04', NULL),
(74, 'user1', 'user1', 'user1', 'user12345', NULL, NULL, 0, NULL, '2023-02-03 00:34:08', '2023-02-03 00:34:08', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type_secret` (`type`,`secret`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_permissions_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `auth_remember_tokens_user_id_foreign` (`user_id`);

--
-- Indexes for table `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type_identifier` (`id_type`,`identifier`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_sequence`
--
ALTER TABLE `sys_sequence`
  ADD PRIMARY KEY (`Sys_ID`);

--
-- Indexes for table `table_colcourse`
--
ALTER TABLE `table_colcourse`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `table_collegeapp`
--
ALTER TABLE `table_collegeapp`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `table_colonlineapplication`
--
ALTER TABLE `table_colonlineapplication`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `table_colschool`
--
ALTER TABLE `table_colschool`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `table_login`
--
ALTER TABLE `table_login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `table_scholarregistration`
--
ALTER TABLE `table_scholarregistration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `table_schoolname`
--
ALTER TABLE `table_schoolname`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `table_strand`
--
ALTER TABLE `table_strand`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `table_tvet`
--
ALTER TABLE `table_tvet`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `auth_identities`
--
ALTER TABLE `auth_identities`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_token_logins`
--
ALTER TABLE `auth_token_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sys_sequence`
--
ALTER TABLE `sys_sequence`
  MODIFY `Sys_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `table_colcourse`
--
ALTER TABLE `table_colcourse`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `table_collegeapp`
--
ALTER TABLE `table_collegeapp`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_colonlineapplication`
--
ALTER TABLE `table_colonlineapplication`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2962;

--
-- AUTO_INCREMENT for table `table_colschool`
--
ALTER TABLE `table_colschool`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `table_login`
--
ALTER TABLE `table_login`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `table_scholarregistration`
--
ALTER TABLE `table_scholarregistration`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `table_schoolname`
--
ALTER TABLE `table_schoolname`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `table_strand`
--
ALTER TABLE `table_strand`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `table_tvet`
--
ALTER TABLE `table_tvet`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_identities`
--
ALTER TABLE `auth_identities`
  ADD CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_permissions_users`
--
ALTER TABLE `auth_permissions_users`
  ADD CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_remember_tokens`
--
ALTER TABLE `auth_remember_tokens`
  ADD CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;