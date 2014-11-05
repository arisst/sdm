-- phpMyAdmin SQL Dump
-- version 4.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 04, 2014 at 10:15 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sdm`
--

-- --------------------------------------------------------

--
-- Table structure for table `agreements`
--

CREATE TABLE IF NOT EXISTS `agreements` (
`id` int(11) NOT NULL,
  `permit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `agreements`
--

INSERT INTO `agreements` (`id`, `permit_id`, `user_id`, `status`, `created_at`) VALUES
(13, 24, 3, 1, '2014-09-19 04:07:49'),
(15, 25, 3, 2, '2014-09-19 04:29:53'),
(16, 27, 3, 1, '2014-09-26 10:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE IF NOT EXISTS `divisions` (
`id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`) VALUES
(1, 'Divisi Reformasi Hukum dan Kebijakan'),
(2, 'Divisi Pemantauan'),
(3, 'Divisi Pendidikan'),
(4, 'Divisi Pemulihan'),
(5, 'Divisi Partisipasi Masyarakat'),
(6, 'Gugus Kerja Pekerja Migran (GK PM)'),
(7, 'Gugus Kerja Papua (GK Papua)'),
(8, 'Gugus Kerja Perempuan dalam Konstitusi dan Hukum Nasional (GK PKHN)'),
(9, 'Resources Center'),
(10, 'Bidang Perencanaan, Monitoring dan Evaluasi (PME)'),
(11, 'Bidang Keuangan dan Akuntansi'),
(12, 'Bidang Umum'),
(13, 'Bidang SDM');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
`id` int(10) unsigned NOT NULL,
  `uid` int(11) NOT NULL,
  `masuk_kerja` date DEFAULT NULL,
  `periode` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nilai` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_nilai` int(11) NOT NULL,
  `comments` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kelebihan` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `peningkatan` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rencana_peningkatan` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `voter_comments` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `voter_uid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `uid`, `masuk_kerja`, `periode`, `nilai`, `jumlah_nilai`, `comments`, `kelebihan`, `peningkatan`, `note`, `rencana_peningkatan`, `voter_comments`, `voter_uid`, `created_at`, `updated_at`) VALUES
(3, 3, '2014-09-09', '2014', 'a:8:{i:0;s:2:"10";i:1;s:2:"10";i:2;s:1:"7";i:3;s:2:"10";i:4;s:1:"4";i:5;s:1:"7";i:6;s:1:"9";i:7;s:1:"6";}', 8, 'a:8:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";}', '', '', '', '', 'asdas', 4, '2014-09-22 09:59:16', '2014-09-22 10:12:01'),
(4, 3, '2014-09-22', '2014', 'a:8:{i:0;s:1:"4";i:1;s:2:"10";i:2;s:1:"4";i:3;s:2:"10";i:4;s:1:"4";i:5;s:2:"10";i:6;s:1:"4";i:7;s:2:"10";}', 7, 'a:8:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";}', '', '', '', '', NULL, 12, '2014-09-22 10:18:13', '2014-09-22 10:18:13'),
(5, 1, '2014-09-24', '2011', 'a:8:{i:0;s:2:"10";i:1;s:2:"10";i:2;s:2:"10";i:3;s:2:"10";i:4;s:2:"10";i:5;s:2:"10";i:6;s:2:"10";i:7;s:2:"10";}', 10, 'a:8:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";}', '', '', '', '', NULL, 2, '2014-09-24 06:54:26', '2014-09-24 06:54:26'),
(6, 1, '2014-08-28', '2014', 'a:8:{i:0;s:1:"9";i:1;s:1:"8";i:2;s:1:"8";i:3;s:1:"6";i:4;s:1:"6";i:5;s:1:"8";i:6;s:1:"7";i:7;s:1:"6";}', 8, 'a:8:{i:0;s:0:"";i:1;s:0:"";i:2;s:0:"";i:3;s:0:"";i:4;s:0:"";i:5;s:0:"";i:6;s:0:"";i:7;s:0:"";}', 'dfv', 'sdfsd', 'fsdfs', 'dfsdf', NULL, 2, '2014-10-01 04:38:45', '2014-10-01 04:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `logevents`
--

CREATE TABLE IF NOT EXISTS `logevents` (
`id` int(10) unsigned NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `ip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_action` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_value` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=301 ;

--
-- Dumping data for table `logevents`
--

INSERT INTO `logevents` (`id`, `uid`, `ip`, `object_type`, `object_action`, `object_id`, `object_value`, `status`, `created_at`) VALUES
(1, 0, '::1', 'anonimous', 'login', NULL, NULL, 'failed', '2014-08-29 09:48:49'),
(2, 0, '::1', 'anonimous', 'login', NULL, NULL, 'failed', '2014-08-29 09:49:13'),
(3, 0, '::1', 'anonimous', 'login', NULL, NULL, 'failed', '2014-08-29 09:49:16'),
(4, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-08-29 09:51:32'),
(5, 1, '::1', 'penilaian', 'create', NULL, '1', 'success', '2014-08-29 09:52:07'),
(6, 1, '::1', 'user', 'login', NULL, NULL, 'failed', '2014-08-30 12:53:45'),
(7, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-08-30 12:53:51'),
(8, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-01 02:48:59'),
(9, 1, '::1', 'penilaian', 'edit', NULL, '1', 'success', '2014-09-01 04:17:47'),
(10, 1, '::1', 'penilaian', 'create', NULL, '2', 'success', '2014-09-01 04:18:32'),
(11, 1, '::1', 'penilaian', 'edit', NULL, '2', 'success', '2014-09-01 04:18:41'),
(12, 1, '::1', 'penilaian', 'delete', NULL, '2', 'success', '2014-09-01 06:15:58'),
(13, 1, '::1', 'lembur', 'create', NULL, '16', 'success', '2014-09-01 06:16:48'),
(14, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-01 06:36:01'),
(15, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-01 06:36:14'),
(16, 1, '::1', 'user', 'edit', NULL, '1', 'success', '2014-09-01 06:36:54'),
(17, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-01 06:42:37'),
(18, 5, '::1', 'user', 'editprofile', NULL, '5', 'success', '2014-09-01 06:42:59'),
(19, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-01 06:43:39'),
(20, 1, '::1', 'user', 'edit', NULL, '5', 'success', '2014-09-01 06:43:58'),
(21, 1, '::1', 'user', 'editprofile', NULL, '1', 'success', '2014-09-01 06:45:34'),
(22, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-01 06:45:47'),
(23, 5, '::1', 'user', 'editprofile', NULL, '5', 'success', '2014-09-01 06:45:50'),
(24, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-01 07:03:48'),
(25, 1, '::1', 'division', 'create', NULL, '1', 'success', '2014-09-01 07:32:59'),
(26, 1, '::1', 'division', 'edit', NULL, '1', 'success', '2014-09-01 07:33:07'),
(27, 1, '::1', 'division', 'create', NULL, '2', 'success', '2014-09-01 07:33:37'),
(28, 1, '::1', 'division', 'create', NULL, '3', 'success', '2014-09-01 07:33:45'),
(29, 1, '::1', 'division', 'create', NULL, '4', 'success', '2014-09-01 07:33:54'),
(30, 1, '::1', 'division', 'create', NULL, '5', 'success', '2014-09-01 07:34:02'),
(31, 1, '127.0.0.1', 'division', 'create', NULL, '6', 'success', '2014-09-01 07:34:10'),
(32, 1, '::1', 'division', 'create', NULL, '7', 'success', '2014-09-01 07:34:39'),
(33, 1, '::1', 'division', 'create', NULL, '8', 'success', '2014-09-01 07:34:48'),
(34, 1, '::1', 'division', 'create', NULL, '9', 'success', '2014-09-01 07:34:56'),
(35, 1, '::1', 'division', 'create', NULL, '10', 'success', '2014-09-01 07:35:04'),
(36, 1, '::1', 'division', 'create', NULL, '11', 'success', '2014-09-01 07:35:12'),
(37, 1, '::1', 'division', 'create', NULL, '12', 'success', '2014-09-01 07:35:18'),
(38, 1, '::1', 'division', 'create', NULL, '13', 'success', '2014-09-01 07:35:24'),
(39, 1, '::1', 'division', 'edit', NULL, '1', 'success', '2014-09-01 07:38:31'),
(40, 1, '::1', 'division', 'edit', NULL, '1', 'success', '2014-09-01 07:38:39'),
(41, 1, '::1', 'user', 'edit', NULL, '20', 'success', '2014-09-01 07:57:00'),
(42, 1, '::1', 'user', 'edit', NULL, '3', 'success', '2014-09-01 08:02:23'),
(43, 1, '::1', 'user', 'edit', NULL, '5', 'success', '2014-09-01 08:02:37'),
(44, 1, '::1', 'user', 'edit', NULL, '6', 'success', '2014-09-01 08:02:50'),
(45, 1, '::1', 'user', 'edit', NULL, '10', 'success', '2014-09-01 08:03:04'),
(46, 1, '::1', 'user', 'edit', NULL, '22', 'success', '2014-09-01 08:03:18'),
(47, 1, '::1', 'user', 'edit', NULL, '21', 'success', '2014-09-01 08:03:29'),
(48, 1, '::1', 'user', 'edit', NULL, '2', 'success', '2014-09-01 08:08:44'),
(49, 1, '::1', 'user', 'edit', NULL, '4', 'success', '2014-09-01 08:08:59'),
(50, 1, '::1', 'user', 'edit', NULL, '7', 'success', '2014-09-01 08:09:08'),
(51, 1, '::1', 'user', 'edit', NULL, '8', 'success', '2014-09-01 08:09:17'),
(52, 1, '::1', 'user', 'edit', NULL, '9', 'success', '2014-09-01 08:09:41'),
(53, 1, '::1', 'user', 'edit', NULL, '11', 'success', '2014-09-01 08:09:54'),
(54, 1, '::1', 'user', 'edit', NULL, '12', 'success', '2014-09-01 08:10:10'),
(55, 1, '::1', 'user', 'create', NULL, '23', 'success', '2014-09-01 08:51:04'),
(56, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 02:55:49'),
(57, 1, '::1', 'penilaian', 'edit', NULL, '1', 'success', '2014-09-02 03:54:45'),
(58, 1, '::1', 'penilaian', 'edit', NULL, '1', 'success', '2014-09-02 04:06:04'),
(59, 1, '::1', 'penilaian', 'edit', NULL, '1', 'success', '2014-09-02 04:26:47'),
(60, 1, '::1', 'penilaian', 'edit', NULL, '1', 'success', '2014-09-02 04:35:45'),
(61, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 07:29:58'),
(62, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 07:30:09'),
(63, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 07:55:24'),
(64, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 08:07:05'),
(65, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 08:15:28'),
(66, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 08:15:57'),
(67, 1, '::1', 'user', 'editprofile', NULL, '1', 'success', '2014-09-02 08:20:48'),
(68, 1, '::1', 'user', 'editprofile', NULL, '1', 'success', '2014-09-02 08:21:00'),
(69, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 08:32:36'),
(70, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 08:32:43'),
(71, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 08:34:24'),
(72, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 08:34:35'),
(73, 4, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 09:20:52'),
(74, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 09:35:18'),
(75, 4, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 09:40:58'),
(76, 4, '::1', 'cuti', 'create', NULL, '17', 'success', '2014-09-02 09:41:55'),
(77, 4, '::1', 'cuti', 'create', NULL, '18', 'success', '2014-09-02 09:42:56'),
(78, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 09:46:41'),
(79, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 10:26:13'),
(80, 12, '::1', 'cuti', 'create', NULL, '19', 'success', '2014-09-02 10:26:34'),
(81, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 10:26:56'),
(82, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 10:27:49'),
(83, 12, '::1', 'cuti', 'create', NULL, '20', 'success', '2014-09-02 10:28:08'),
(84, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 10:30:44'),
(85, 4, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 10:33:52'),
(86, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-02 10:34:19'),
(87, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-03 02:56:59'),
(88, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-03 03:03:21'),
(89, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-03 03:36:58'),
(90, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-03 03:45:52'),
(91, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-03 03:49:19'),
(92, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-03 03:57:14'),
(93, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-03 04:34:20'),
(94, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-03 04:51:13'),
(95, 5, '::1', 'cuti', 'create', NULL, '21', 'success', '2014-09-03 04:51:51'),
(96, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-03 04:52:21'),
(97, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-04 02:36:03'),
(98, 1, '::1', 'penilaian', 'create', NULL, '2', 'success', '2014-09-04 03:41:10'),
(99, 4, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-04 03:41:24'),
(100, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-04 03:43:11'),
(101, 4, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-04 03:45:42'),
(102, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-04 03:46:13'),
(103, 4, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-04 03:49:40'),
(104, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-04 03:50:25'),
(105, 4, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-04 04:03:14'),
(106, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-04 04:15:48'),
(107, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-04 07:37:14'),
(108, 4, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-04 08:28:29'),
(109, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-04 08:30:47'),
(110, 4, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-04 08:31:06'),
(111, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-04 08:33:21'),
(112, 4, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-04 08:59:53'),
(113, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-04 09:01:26'),
(114, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-04 09:03:10'),
(115, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-05 03:19:22'),
(116, 4, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-05 03:54:56'),
(117, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-05 03:55:05'),
(118, 3, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-05 03:55:25'),
(119, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-09 02:04:39'),
(120, 10, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-09 02:05:21'),
(121, 4, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-09 02:06:13'),
(122, 4, '::1', 'penilaian', 'feedback', NULL, '2', 'success', '2014-09-09 02:23:49'),
(123, 4, '::1', 'penilaian', 'feedback', NULL, '2', 'success', '2014-09-09 02:25:05'),
(124, 4, '::1', 'penilaian', 'feedback', NULL, '2', 'success', '2014-09-09 02:26:04'),
(125, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-09 02:52:22'),
(126, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-09 02:52:34'),
(127, 1, '::1', 'penilaian', 'edit', NULL, '2', 'success', '2014-09-09 02:53:52'),
(128, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-09 08:26:59'),
(129, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-10 04:31:06'),
(130, 4, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-10 06:03:07'),
(131, 4, '::1', 'penilaian', 'feedback', NULL, '2', 'success', '2014-09-10 06:03:27'),
(132, 1, '192.168.1.173', 'user', 'login', NULL, NULL, 'success', '2014-09-11 05:07:51'),
(133, 1, '127.0.0.1', 'user', 'login', NULL, NULL, 'success', '2014-09-11 06:29:21'),
(134, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-12 03:29:23'),
(135, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-12 03:45:27'),
(136, 0, '::1', 'anonimous', 'login', NULL, NULL, 'failed', '2014-09-12 03:45:44'),
(137, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-12 03:45:50'),
(138, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-12 06:26:45'),
(139, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-12 07:45:35'),
(140, 3, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-12 08:20:46'),
(141, 0, '::1', 'anonimous', 'login', NULL, NULL, 'failed', '2014-09-12 09:50:42'),
(142, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-12 09:50:47'),
(143, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-12 09:51:02'),
(144, 3, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-12 09:52:16'),
(145, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-12 10:09:12'),
(146, 4, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-12 10:09:31'),
(147, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-12 10:09:56'),
(148, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-12 10:10:04'),
(149, 3, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-12 10:10:15'),
(150, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-12 10:11:43'),
(151, 4, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-12 10:12:05'),
(152, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-12 10:12:16'),
(153, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-15 03:29:42'),
(154, 1, '::1', 'agreement', 'set', NULL, '3', 'success', '2014-09-15 07:32:50'),
(155, 1, '::1', 'agreement', 'set', NULL, '4', 'success', '2014-09-15 07:34:13'),
(156, 1, '::1', 'agreement', 'set', NULL, '5', 'success', '2014-09-15 07:34:28'),
(157, 1, '::1', 'agreement', 'set', NULL, '6', 'success', '2014-09-15 07:34:50'),
(158, 1, '::1', 'agreement', 'set', NULL, '7', 'success', '2014-09-15 07:36:51'),
(159, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-15 08:08:46'),
(160, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-15 08:10:25'),
(161, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-15 08:11:30'),
(162, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-15 08:11:54'),
(163, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-15 08:18:41'),
(164, 1, '::1', 'user', 'login', NULL, NULL, 'failed', '2014-09-15 08:21:13'),
(165, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-16 02:37:51'),
(166, 1, '::1', 'agreement', 'set', NULL, '8', 'success', '2014-09-16 03:18:48'),
(167, 1, '::1', 'agreement', 'set', NULL, '9', 'success', '2014-09-16 03:32:24'),
(168, 1, '::1', 'agreement', 'set', NULL, '10', 'success', '2014-09-16 03:34:04'),
(169, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-16 03:34:39'),
(170, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-16 03:36:37'),
(171, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-16 03:39:41'),
(172, 1, '::1', 'agreement', 'set', NULL, '11', 'success', '2014-09-16 03:55:38'),
(173, 10, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-16 03:55:50'),
(174, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-16 04:22:30'),
(175, 1, '192.168.1.188', 'user', 'login', NULL, NULL, 'success', '2014-09-16 04:22:57'),
(176, 1, '192.168.1.188', 'user', 'edit', NULL, '2', 'success', '2014-09-16 04:27:48'),
(177, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-16 04:32:03'),
(178, 5, '192.168.1.188', 'user', 'login', NULL, NULL, 'success', '2014-09-16 04:32:31'),
(179, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-16 04:33:28'),
(180, 1, '::1', 'user', 'login', NULL, '', 'success', '2014-09-16 04:47:50'),
(181, 0, '::1', 'anonimous', 'login', NULL, NULL, 'failed', '2014-09-16 04:51:51'),
(182, 0, '192.168.1.14', 'anonimous', 'login', NULL, NULL, 'failed', '2014-09-16 04:52:43'),
(183, 12, '192.168.1.14', 'user', 'login', NULL, NULL, 'success', '2014-09-16 04:52:52'),
(184, 0, '::1', 'anonimous', 'login', NULL, NULL, 'failed', '2014-09-16 05:04:52'),
(185, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-16 05:04:56'),
(186, 1, '192.168.1.188', 'user', 'login', NULL, NULL, 'success', '2014-09-16 06:34:41'),
(187, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-16 06:34:56'),
(188, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-17 03:39:15'),
(189, 5, '192.168.1.188', 'user', 'login', NULL, NULL, 'success', '2014-09-17 03:47:02'),
(190, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-17 03:50:07'),
(191, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-17 03:50:48'),
(192, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-17 04:00:30'),
(193, 0, '192.168.1.150', 'anonimous', 'login', NULL, NULL, 'failed', '2014-09-17 12:59:19'),
(194, 0, '192.168.1.150', 'anonimous', 'login', NULL, NULL, 'failed', '2014-09-17 12:59:26'),
(195, 1, '192.168.1.150', 'user', 'login', NULL, NULL, 'success', '2014-09-17 12:59:33'),
(196, 12, '192.168.1.150', 'user', 'login', NULL, NULL, 'success', '2014-09-17 13:04:07'),
(197, 5, '192.168.1.150', 'user', 'login', NULL, NULL, 'success', '2014-09-17 13:07:42'),
(198, 1, '192.168.1.150', 'user', 'login', NULL, NULL, 'success', '2014-09-17 15:08:23'),
(199, 5, '192.168.1.150', 'user', 'login', NULL, NULL, 'success', '2014-09-17 15:11:05'),
(200, 1, '192.168.1.150', 'user', 'login', NULL, NULL, 'success', '2014-09-17 15:11:16'),
(201, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-17 15:11:50'),
(202, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-18 04:02:14'),
(203, 1, '192.168.1.150', 'user', 'login', NULL, NULL, 'success', '2014-09-18 06:05:03'),
(204, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-18 07:19:15'),
(205, 12, '192.168.1.150', 'user', 'login', NULL, NULL, 'success', '2014-09-18 09:09:11'),
(206, 3, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-18 09:09:36'),
(207, 12, '192.168.1.150', 'cuti', 'create', NULL, '22', 'success', '2014-09-18 09:11:42'),
(208, 3, '::1', 'agreement', 'set', NULL, '12', 'success', '2014-09-18 09:12:10'),
(209, 12, '192.168.1.150', 'libur', 'create', NULL, '23', 'success', '2014-09-18 09:13:08'),
(210, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-18 09:15:53'),
(211, 3, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-18 09:17:44'),
(212, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-19 03:25:03'),
(213, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-19 03:38:08'),
(214, 12, '192.168.1.188', 'user', 'login', NULL, NULL, 'success', '2014-09-19 03:41:34'),
(215, 1, '::1', 'cuti', 'delete', NULL, '19', 'success', '2014-09-19 04:03:15'),
(216, 1, '::1', 'cuti', 'delete', NULL, '22', 'success', '2014-09-19 04:03:18'),
(217, 1, '::1', 'cuti', 'delete', NULL, '21', 'success', '2014-09-19 04:03:21'),
(218, 1, '::1', 'cuti', 'delete', NULL, '20', 'success', '2014-09-19 04:03:23'),
(219, 1, '::1', 'cuti', 'delete', NULL, '1', 'success', '2014-09-19 04:04:16'),
(220, 1, '::1', 'cuti', 'delete', NULL, '3', 'success', '2014-09-19 04:04:18'),
(221, 1, '::1', 'cuti', 'delete', NULL, '4', 'success', '2014-09-19 04:04:21'),
(222, 1, '::1', 'cuti', 'delete', NULL, '6', 'success', '2014-09-19 04:04:23'),
(223, 1, '::1', 'cuti', 'delete', NULL, '18', 'success', '2014-09-19 04:04:25'),
(224, 12, '192.168.1.188', 'cuti', 'create', NULL, '24', 'success', '2014-09-19 04:05:11'),
(225, 3, '192.168.1.188', 'user', 'login', NULL, NULL, 'success', '2014-09-19 04:06:52'),
(226, 3, '192.168.1.188', 'agreement', 'set', NULL, '13', 'success', '2014-09-19 04:07:49'),
(227, 12, '192.168.1.188', 'user', 'login', NULL, NULL, 'success', '2014-09-19 04:08:11'),
(228, 1, '::1', 'libur', 'delete', NULL, '14', 'success', '2014-09-19 04:21:51'),
(229, 1, '::1', 'libur', 'delete', NULL, '23', 'success', '2014-09-19 04:21:53'),
(230, 12, '192.168.1.188', 'libur', 'create', NULL, '25', 'success', '2014-09-19 04:22:50'),
(231, 3, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-19 04:23:48'),
(232, 3, '::1', 'agreement', 'set', NULL, '14', 'success', '2014-09-19 04:24:06'),
(233, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-19 04:25:20'),
(234, 3, '192.168.1.188', 'user', 'login', NULL, NULL, 'success', '2014-09-19 04:29:42'),
(235, 3, '192.168.1.188', 'agreement', 'set', NULL, '15', 'success', '2014-09-19 04:29:53'),
(236, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-22 04:36:03'),
(237, 1, '192.168.1.150', 'user', 'login', NULL, NULL, 'success', '2014-09-22 07:46:49'),
(238, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-22 08:15:35'),
(239, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-22 08:23:15'),
(240, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-22 08:48:23'),
(241, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-22 09:17:39'),
(242, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-22 09:38:23'),
(243, 1, '::1', 'user', 'edit', NULL, '23', 'success', '2014-09-22 09:39:59'),
(244, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-22 09:40:44'),
(245, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-22 09:45:38'),
(246, 4, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-22 09:46:48'),
(247, 10, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-22 09:46:58'),
(248, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-22 09:56:58'),
(249, 12, '::1', 'user', 'login', NULL, NULL, 'failed', '2014-09-22 09:57:09'),
(250, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-22 09:57:14'),
(251, 3, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-22 09:57:43'),
(252, 4, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-22 09:57:52'),
(253, 3, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-22 09:58:00'),
(254, 3, '::1', 'penilaian', 'delete', NULL, '1', 'success', '2014-09-22 09:58:11'),
(255, 3, '::1', 'penilaian', 'delete', NULL, '2', 'success', '2014-09-22 09:58:14'),
(256, 3, '::1', 'penilaian', 'create', NULL, '3', 'success', '2014-09-22 09:59:16'),
(257, 4, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-22 09:59:25'),
(258, 4, '::1', 'penilaian', 'feedback', NULL, '3', 'success', '2014-09-22 10:12:01'),
(259, 3, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-22 10:17:29'),
(260, 3, '::1', 'penilaian', 'create', NULL, '4', 'success', '2014-09-22 10:18:13'),
(261, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-22 10:18:21'),
(262, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-24 03:14:31'),
(263, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-24 03:24:28'),
(264, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-24 03:43:05'),
(265, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-24 03:56:58'),
(266, 2, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-24 04:18:29'),
(267, 2, '::1', 'cuti', 'create', NULL, '26', 'success', '2014-09-24 04:18:59'),
(268, 5, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-24 04:19:10'),
(269, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-24 04:26:09'),
(270, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-24 05:01:49'),
(271, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-24 06:26:54'),
(272, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-24 06:38:28'),
(273, 1, '::1', 'penilaian', 'create', NULL, '5', 'success', '2014-09-24 06:54:26'),
(274, 1, '192.168.1.150', 'user', 'login', NULL, NULL, 'success', '2014-09-24 08:52:50'),
(275, 1, '192.168.1.150', 'user', 'login', NULL, NULL, 'success', '2014-09-24 08:52:59'),
(276, 0, '192.168.1.150', 'anonimous', 'login', NULL, NULL, 'failed', '2014-09-24 08:53:05'),
(277, 1, '192.168.1.150', 'user', 'login', NULL, NULL, 'failed', '2014-09-24 08:53:11'),
(278, 1, '192.168.1.150', 'user', 'login', NULL, NULL, 'failed', '2014-09-24 08:53:16'),
(279, 1, '192.168.1.150', 'user', 'login', NULL, NULL, 'failed', '2014-09-24 09:25:28'),
(280, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-25 02:06:31'),
(281, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-25 02:28:15'),
(282, 1, '192.168.1.150', 'user', 'login', NULL, NULL, 'success', '2014-09-25 03:31:58'),
(283, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-25 06:49:09'),
(284, 1, '192.168.1.150', 'user', 'login', NULL, NULL, 'success', '2014-09-25 11:16:31'),
(285, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-26 03:53:54'),
(286, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-26 10:02:24'),
(287, 1, '127.0.0.1', 'user', 'login', NULL, NULL, 'success', '2014-09-26 10:03:12'),
(288, 12, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-26 10:04:58'),
(289, 12, '::1', 'cuti', 'create', NULL, '27', 'success', '2014-09-26 10:07:27'),
(290, 3, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-26 10:08:41'),
(291, 3, '::1', 'agreement', 'set', NULL, '16', 'success', '2014-09-26 10:09:32'),
(292, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-26 10:13:15'),
(293, 10, '::1', 'user', 'login', NULL, NULL, 'success', '2014-09-26 10:31:34'),
(294, 12, '127.0.0.1', 'user', 'login', NULL, NULL, 'success', '2014-09-26 10:31:48'),
(295, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-10-01 04:38:15'),
(296, 1, '::1', 'penilaian', 'create', NULL, '6', 'success', '2014-10-01 04:38:45'),
(297, 0, '::1', 'anonimous', 'login', NULL, NULL, 'failed', '2014-10-12 12:28:54'),
(298, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-10-12 12:29:00'),
(299, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-10-13 13:45:46'),
(300, 1, '::1', 'user', 'login', NULL, NULL, 'success', '2014-11-04 09:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_07_08_150636_permits', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
`id` int(10) unsigned NOT NULL,
  `recepient_id` int(11) DEFAULT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `activity` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_id` int(11) DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `recepient_id`, `sender_id`, `activity`, `object`, `object_id`, `status`, `created_at`) VALUES
(11, 3, 12, 'mengajukan', 'libur', 23, 0, '2014-09-18 09:13:08'),
(12, 3, 12, 'mengajukan', 'cuti', 24, 0, '2014-09-19 04:05:11'),
(13, 12, 3, 'menyetujui', 'cuti', 24, 0, '2014-09-19 04:07:49'),
(14, 3, 12, 'mengajukan', 'libur', 25, 0, '2014-09-19 04:22:50'),
(16, 12, 3, 'menolak', 'libur', 25, 0, '2014-09-19 04:29:53'),
(17, 4, 3, 'memberi', 'penilaian', 3, 0, '2014-09-22 09:59:16'),
(18, 12, 3, 'memberi', 'penilaian', 4, 0, '2014-09-22 10:18:13'),
(19, 5, 2, 'mengajukan', 'cuti', 26, 0, '2014-09-24 04:18:59'),
(20, 2, 1, 'memberi', 'penilaian', 5, 1, '2014-09-24 06:54:26'),
(21, 3, 12, 'mengajukan', 'cuti', 27, 0, '2014-09-26 10:07:27'),
(22, 12, 3, 'menyetujui', 'cuti', 27, 0, '2014-09-26 10:09:32'),
(23, 2, 1, 'memberi', 'penilaian', 6, 1, '2014-10-01 04:38:45');

-- --------------------------------------------------------

--
-- Table structure for table `permits`
--

CREATE TABLE IF NOT EXISTS `permits` (
`id` int(10) unsigned NOT NULL,
  `types` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `uid` int(11) NOT NULL,
  `propose_uid` int(11) DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `finish_date` datetime DEFAULT NULL,
  `task` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `venue` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_uid` int(11) DEFAULT NULL,
  `address` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hak_cuti` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sisa_cuti` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_work` date DEFAULT NULL,
  `transportasi` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `makan` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lintas_divisi` tinyint(1) DEFAULT NULL,
  `auth_task` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `permits`
--

INSERT INTO `permits` (`id`, `types`, `uid`, `propose_uid`, `start_date`, `finish_date`, `task`, `venue`, `note`, `auth_uid`, `address`, `hak_cuti`, `sisa_cuti`, `start_work`, `transportasi`, `makan`, `lintas_divisi`, `auth_task`, `created_at`, `updated_at`) VALUES
(8, 'lembur', 1, 10, '2014-08-18 17:00:00', '2014-08-18 20:00:00', 'Ngoding', 'Jakarta', '', NULL, 'Menyelesaikan E-Goverment', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-08-18 00:32:54', '2014-08-18 00:32:54'),
(10, 'lembur', 12, 2, '2014-08-20 17:30:00', '2014-08-20 20:00:00', 'Input Data', 'Ruang kerja', '', NULL, 'Menginput data semua karyawan ke dalam system', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-08-18 01:09:50', '2014-08-18 01:09:50'),
(12, 'dinas', 1, 10, '2014-08-19 10:35:00', '2014-08-19 17:00:00', 'Migrasi JIMS', 'Jakarta, JIMS School', NULL, 11, 'Melakukan migrasi operating system ke open source', NULL, NULL, NULL, NULL, NULL, NULL, 'Re-design website ictforhumanity.or.id', '2014-08-18 20:37:12', '2014-08-18 20:37:12'),
(15, 'cuti', 13, NULL, '2014-08-19 00:00:00', '2014-08-19 00:00:00', 'Kematian orang tua, mertua, saudara kandung & ipar pekerja (3 hari)', NULL, 'dfasa', 1, 'alamattdsfasda', NULL, NULL, '2014-08-19', NULL, NULL, NULL, NULL, '2014-08-18 22:29:58', '2014-08-18 22:29:58'),
(16, 'lembur', 1, 22, '2014-09-01 13:16:00', '2014-09-01 13:16:00', 'wfds', 'sdfsdf', 'dfsd', NULL, 'sdfsd', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2014-09-01 06:16:48', '2014-09-01 06:16:48'),
(24, 'cuti', 12, NULL, '2014-09-19 00:00:00', '2014-09-19 00:00:00', 'other', NULL, 'zzcdsfa', 4, 'dzdz', NULL, NULL, '2014-09-19', NULL, NULL, NULL, NULL, '2014-09-19 04:05:11', '2014-09-19 04:05:11'),
(25, 'libur', 12, NULL, '2014-09-19 00:00:00', NULL, 'liburan ke lombok', 'Lombok', '', 2, 'ambon', NULL, NULL, '2014-09-19', '5 Minggu', NULL, NULL, NULL, '2014-09-19 04:22:50', '2014-09-19 04:22:50'),
(26, 'cuti', 2, NULL, '2014-09-24 00:00:00', '2014-09-24 00:00:00', 'Khitanan / baptis anak pekerja (2 hari)', NULL, 'asda', 4, 'asds', NULL, NULL, '2014-08-08', NULL, NULL, NULL, NULL, '2014-09-24 04:18:59', '2014-09-24 04:18:59'),
(27, 'cuti', 12, NULL, '2014-05-13 00:00:00', '2014-12-10 00:00:00', 'Pernikahan saudara / ipar kandung pekerja (1 hari)', NULL, '', 10, 'alamat', NULL, NULL, '2014-05-06', NULL, NULL, NULL, NULL, '2014-09-26 10:07:27', '2014-09-26 10:07:27');

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE IF NOT EXISTS `rules` (
`id` int(10) unsigned NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `parent_uid` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=72 ;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `uid`, `parent_uid`) VALUES
(58, 20, 5),
(59, 5, 3),
(60, 21, 10),
(62, 4, 3),
(63, 4, 5),
(64, 7, 6),
(65, 8, 6),
(66, 9, 3),
(67, 9, 5),
(68, 11, 10),
(69, 11, 21),
(70, 12, 3),
(71, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `division_id` int(11) NOT NULL,
  `position` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` smallint(6) NOT NULL,
  `status` smallint(6) NOT NULL,
  `parent_uid` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `child_uid` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activate_key` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone`, `division_id`, `position`, `level`, `status`, `parent_uid`, `child_uid`, `password`, `remember_token`, `activate_key`, `created_at`, `updated_at`) VALUES
(1, 'Aris Setyono', 'aris', 'me@arisst.com', '085259838599', 0, 'Administrator', 1, 1, NULL, NULL, '$2y$10$FdABYNeRXArfYYumXMfL6eKvUkrAwsOIKyq/V42DLLpR336lWj.yG', 'oEkA9SlYse3jiu8Igj7EKlwSRcT7N829RFcYFfM0G0dEVq2mfWnuluMUOKPW', NULL, '2014-07-15 21:55:41', '2014-10-13 13:46:07'),
(2, 'Budi', 'budi', 'budi@ko.id', '080910022', 1, 'Staff', 3, 1, NULL, NULL, '$2y$10$rKmE/fvjbx.HefJOiiDRWOAuF9YTr7FQqyyYa4EjHTpSkDBoVc6HO', 'aDqzGerpqubwA8dzN0qPb0dI0uxYdkWriCxg8IRR4ULLWV4KqWupStHfnvKu', NULL, '2014-08-07 19:50:44', '2014-09-24 04:19:06'),
(3, 'Candra', 'candra', 'candra@ko.id', '0123321', 1, 'Koordinator', 2, 1, NULL, NULL, '$2y$10$McmQQdJz37pwLSLD9EOhgeqQ9.x991sG7RrwhD7wQ4ybQ.qNEm3Zu', 'fiiVP91N3GsjaIVeaVx2UWKONjinOX1foksG6G1MkJzOEpiPrvZKS0EmTRZO', NULL, '2014-08-07 19:51:29', '2014-09-26 10:31:26'),
(4, 'Deni', 'deni', 'deni@ko.id', '090234', 1, 'Staff', 3, 1, NULL, NULL, '$2y$10$mZAVHeYb6DYnTQ9XcBLgMuUKRvXtOvmXdjz4cfXs8VIxLeirhOUZq', 'DULXXUrUDUT8WrqZFHrFz9EQ9ERKyDxSZgFTEGI3PyQF5Vt3UPUDs5HUC6IT', NULL, '2014-08-07 19:52:02', '2014-09-22 10:17:24'),
(5, 'Erna', 'erna', 'erna@ko.id', '01239999', 1, 'Asisen Koordinator', 4, 1, NULL, NULL, '$2y$10$gg5VxKSniuKHnCP2A2ZQfuc8CWOkrt0Rpa.Bl/nF1h//vJdxsHzXu', 'c8E2fHqL3TCzEmJCo0RyMUHxnJPixiExgxfUzvlq93YsCUnIwPePbP0eaQnk', NULL, '2014-08-07 19:52:40', '2014-09-24 04:26:04'),
(6, 'Fatimah', 'fatimah', 'fat@ko.id', '012123142', 8, 'Koordinator', 2, 1, NULL, NULL, '$2y$10$kzc58Ls0sQLpVVSTSbo2F.VxBKduH.WVnGmhyoPo0Ewbkrla00yxC', NULL, NULL, '2014-08-07 19:53:23', '2014-09-01 08:02:50'),
(7, 'Galih', 'galih', 'galih@ko.id', '0843212312', 8, 'Staff', 3, 1, NULL, NULL, '$2y$10$X5u2eG2zzUQ1ZLAVumAl6.vk4rQGf6gpelPcrdZxHmIy6YAh55sGm', NULL, NULL, '2014-08-07 19:53:57', '2014-09-01 08:09:08'),
(8, 'Hatta Rajasa', 'hatta', 'hatta@ko.id', '095603242', 8, 'Staff', 3, 1, NULL, NULL, '$2y$10$rJZjRnIhfWw/SCOjxXOmA.z7ZNpal0pen255nRMzmNVKQwqb7Tja6', NULL, NULL, '2014-08-07 19:55:59', '2014-09-01 08:09:17'),
(9, 'Iriana', 'iriana', 'iriana@ko.id', '234000241', 1, 'Staff', 3, 1, NULL, NULL, '$2y$10$kGOqMX4mTSmgT4ufy.mdWu5yI6ursLWr/Wc41nSDl3lZy04x8BbYy', 'NA3aT8fvKDB69EZlO27P8YEfPHMEfnOcGw2Hj87oFTyxnF8VJFqhCWSGDPle', NULL, '2014-08-07 19:56:36', '2014-09-01 08:09:41'),
(10, 'Joko Widodo', 'joko', 'joko@wi.net', '0123321', 9, 'Koordinator', 2, 1, NULL, NULL, '$2y$10$p/Z4Q7VTTgfqCJcWEV6nGugLhnkuEe8FT1PBURPJPTfLx4a6e09Sa', 'qr1f0MKAG0d2KuEbUZu6QrrunDvN0fZHzHr9GxDUiYdoHIYCPtaldYs9ztuc', NULL, '2014-08-07 19:58:11', '2014-09-26 10:31:38'),
(11, 'Khusnul', 'khusnul', 'khu@sn.ul', '02342323', 9, 'Staff', 3, 1, NULL, NULL, '$2y$10$mmPOYoyDsek32Vhx1fzk3OO4F/OYmiWcySFuvre78dEPAOD.hFHqS', NULL, NULL, '2014-08-07 19:59:16', '2014-09-01 08:09:54'),
(12, 'Lontong Sulapar', 'lontong', 'lon@to.ng', '080910033', 1, 'Staff', 3, 1, NULL, NULL, '$2y$10$qImM8tZDmvCXeIO.B0cwDuYsGeCNG1GpnEePkG7uxcKQ6ZrOafLLq', 'Ige7GItFanTLmNvu1wzQsbc9myeEWyrB6NOjj2ph8dxGnIrTSNwPhcmR8NWg', NULL, '2014-08-17 20:14:54', '2014-09-26 10:13:09'),
(20, 'Basuki', 'basuki', 'basuki@gmail.com', '6285259838599', 13, 'Staff', 3, 1, NULL, NULL, '$2y$10$8v27fW.OKp7yM6dFU3gah.M6ceCQbCoLgY4/Fe2JlK4As4894CojS', NULL, NULL, '2014-08-20 00:48:09', '2014-09-01 07:57:00'),
(21, 'Marzuki', 'marzuki', 'marzuk@gmail.com', '02342561', 9, 'Asisen Koordinator', 4, 1, NULL, NULL, '$2y$10$EQXIFjwtbVkNLu5t2RWM0uMtGXP5u7c.msTsqlo/mYHGtwR0O1nfy', NULL, NULL, '2014-08-20 00:53:27', '2014-09-01 08:03:29'),
(22, 'Nanang Suyatno', 'nanang', 'n@na.ng', '430123', 13, 'Koordinator', 2, 1, NULL, NULL, '$2y$10$ZechwHhuO9Lr4giWCT3a1.oLoKPjUOE/Gfji6ql.HHsgNQvj2JDGS', NULL, NULL, '2014-08-26 00:56:48', '2014-09-01 08:03:18'),
(23, 'Agus Sunaryo', 'agus', 'agus@asdas.cd', '923423', 11, 'Koordinator', 2, 1, NULL, NULL, '$2y$10$9zddE28geTBUVj6nZodKpe.9PKpSz4UvQHmiDoVH1uaqnEFJqyrg2', NULL, NULL, '2014-09-01 08:51:04', '2014-09-01 08:51:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agreements`
--
ALTER TABLE `agreements`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logevents`
--
ALTER TABLE `logevents`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permits`
--
ALTER TABLE `permits`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_username_unique` (`username`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agreements`
--
ALTER TABLE `agreements`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `logevents`
--
ALTER TABLE `logevents`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=301;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `permits`
--
ALTER TABLE `permits`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
