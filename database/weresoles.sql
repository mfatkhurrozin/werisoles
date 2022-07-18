-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 09:22 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weresoles`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'superadmin', 'super user'),
(2, 'admin', 'admin'),
(3, 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 2),
(2, 3),
(3, 4),
(3, 5),
(3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'admin@gmail.com', 2, '2021-12-27 09:44:53', 1),
(2, '::1', 'admin@gmail.com', 2, '2021-12-27 09:48:16', 1),
(3, '::1', 'fatkhurrozin@gmail.com', 3, '2021-12-27 09:52:20', 1),
(4, '::1', 'rahadian@gmail.com', 4, '2021-12-27 09:54:19', 1),
(5, '::1', 'admin@gmail.com', 2, '2021-12-27 10:33:27', 1),
(6, '::1', 'admin@gmail.com', 2, '2021-12-27 10:34:23', 1),
(7, '::1', 'fatkhurrozin@gmail.com', 3, '2021-12-27 10:42:27', 1),
(8, '::1', 'admin', NULL, '2021-12-27 21:53:44', 0),
(9, '::1', 'admin@gmail.com', 2, '2021-12-27 21:53:49', 1),
(10, '::1', 'fatkhurrozin@gmail.com', 3, '2021-12-27 21:54:02', 1),
(11, '::1', 'fatkhurrozin@gmail.com', 3, '2021-12-28 02:44:21', 1),
(12, '::1', 'fatkhurrozin@gmail.com', 3, '2021-12-28 03:07:15', 1),
(13, '::1', 'rahadian@gmail.com', 4, '2021-12-28 03:07:40', 1),
(14, '::1', 'admin@gmail.com', 2, '2021-12-28 03:08:26', 1),
(15, '::1', 'fatkhurrozin@gmail.com', 3, '2021-12-29 20:37:17', 1),
(16, '::1', 'nizar@gmail.com', 5, '2021-12-29 22:14:09', 1),
(17, '::1', 'fatkhurrozin@gmail.com', 3, '2021-12-29 22:14:23', 1),
(18, '::1', 'guru', NULL, '2021-12-30 07:53:12', 0),
(19, '::1', 'fatkhurrozin@gmail.com', 3, '2021-12-30 07:53:19', 1),
(20, '::1', 'fatkhurrozin@gmail.com', 3, '2021-12-30 08:03:55', 1),
(21, '::1', 'nizar@gmail.com', 5, '2021-12-30 08:27:12', 1),
(22, '::1', 'fatkhurrozin@gmail.com', 3, '2021-12-30 09:05:10', 1),
(23, '::1', 'admin@gmail.com', 2, '2021-12-30 21:40:56', 1),
(24, '::1', 'fatkhurrozin@gmail.com', 3, '2021-12-30 21:41:19', 1),
(25, '::1', 'fatkhurrozin@gmail.com', 3, '2021-12-31 19:40:44', 1),
(26, '::1', 'nizar@gmail.com', 5, '2021-12-31 20:01:04', 1),
(27, '::1', 'fatkhurrozin@gmail.com', 3, '2021-12-31 20:03:42', 1),
(28, '::1', 'nizar@gmail.com', 5, '2021-12-31 20:04:16', 1),
(29, '::1', 'fatkhurrozin@gmail.com', 3, '2021-12-31 20:49:14', 1),
(30, '::1', 'nizar@gmail.com', 5, '2021-12-31 20:50:01', 1),
(31, '::1', 'fatkhurrozin@gmail.com', 3, '2021-12-31 20:54:08', 1),
(32, '::1', 'nizar@gmail.com', 5, '2021-12-31 21:30:42', 1),
(33, '::1', 'fatkhurrozin@gmail.com', 3, '2021-12-31 21:31:40', 1),
(34, '::1', 'fatkhurrozin@gmail.com', 3, '2021-12-31 23:14:50', 1),
(35, '::1', 'nizar@gmail.com', 5, '2022-01-01 00:41:00', 1),
(36, '::1', 'fatkhurrozin@gmail.com', 3, '2022-01-01 00:42:22', 1),
(37, '::1', 'nizar@gmail.com', 5, '2022-01-01 01:10:36', 1),
(38, '::1', 'fatkhurrozin@gmail.com', 3, '2022-01-01 01:17:20', 1),
(39, '::1', 'admin', NULL, '2022-01-01 01:28:08', 0),
(40, '::1', 'admin@gmail.com', 2, '2022-01-01 01:28:13', 1),
(41, '::1', 'fatkhurrozin@gmail.com', 3, '2022-01-01 01:29:05', 1),
(42, '::1', 'nizar@gmail.com', 5, '2022-01-01 01:48:53', 1),
(43, '::1', 'nizar@gmail.com', 5, '2022-01-01 02:34:09', 1),
(44, '::1', 'guru', NULL, '2022-01-01 19:07:50', 0),
(45, '::1', 'fatkhurrozin@gmail.com', 3, '2022-01-01 19:07:59', 1),
(46, '::1', 'nizar@gmail.com', 5, '2022-01-01 19:24:17', 1),
(47, '::1', 'fatkhurrozin@gmail.com', 3, '2022-01-01 19:26:07', 1),
(48, '::1', 'nizar@gmail.com', 5, '2022-01-01 19:50:29', 1),
(49, '::1', 'fatkhurrozin@gmail.com', 3, '2022-01-01 20:13:26', 1),
(50, '::1', 'nizar@gmail.com', 5, '2022-01-01 20:22:44', 1),
(51, '::1', 'rahadian@gmail.com', 4, '2022-01-01 20:48:16', 1),
(52, '::1', 'rahadian@gmail.com', 4, '2022-01-01 21:01:39', 1),
(53, '::1', 'rahad', NULL, '2022-01-02 02:49:41', 0),
(54, '::1', 'rahadian@gmail.com', 4, '2022-01-02 02:49:48', 1),
(55, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-09 06:36:38', 1),
(56, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-10 01:16:28', 1),
(57, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-10 01:29:31', 1),
(58, '::1', 'rahadian@gmail.com', 4, '2022-04-10 01:30:20', 1),
(59, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-10 01:44:10', 1),
(60, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-10 01:46:18', 1),
(61, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-10 01:49:46', 1),
(62, '::1', 'rahadian@gmail.com', 4, '2022-04-10 01:50:17', 1),
(63, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-10 02:45:32', 1),
(64, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-10 02:46:00', 1),
(65, '::1', 'rahadian@gmail.com', 4, '2022-04-10 02:46:34', 1),
(66, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-10 03:15:56', 1),
(67, '::1', 'rahad', NULL, '2022-04-10 03:16:41', 0),
(68, '::1', 'rahadian@gmail.com', 4, '2022-04-10 03:16:54', 1),
(69, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-10 03:18:26', 1),
(70, '::1', 'rahadian@gmail.com', 4, '2022-04-10 03:19:23', 1),
(71, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-10 03:24:01', 1),
(72, '::1', 'rahad', NULL, '2022-04-10 03:35:14', 0),
(73, '::1', 'rahadian@gmail.com', 4, '2022-04-10 03:35:23', 1),
(74, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-10 03:38:39', 1),
(75, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-10 03:54:07', 1),
(76, '::1', 'rahadian@gmail.com', 4, '2022-04-10 03:55:05', 1),
(77, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-10 03:56:23', 1),
(78, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-10 03:59:41', 1),
(79, '::1', 'rahadian@gmail.com', 4, '2022-04-10 04:00:18', 1),
(80, '::1', 'rahadian@gmail.com', 4, '2022-04-10 04:05:10', 1),
(81, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-10 04:08:55', 1),
(82, '::1', 'rahadian@gmail.com', 4, '2022-04-10 04:46:13', 1),
(83, '::1', 'rahadian@gmail.com', 4, '2022-04-10 10:05:45', 1),
(84, '::1', 'rahadian@gmail.com', 4, '2022-04-11 10:06:08', 1),
(85, '::1', 'rahadian@gmail.com', 4, '2022-04-11 16:21:12', 1),
(86, '::1', 'nizar@gmail.com', 5, '2022-04-11 16:35:04', 1),
(87, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-11 16:41:16', 1),
(88, '::1', 'rahadian@gmail.com', 4, '2022-04-11 16:53:02', 1),
(89, '::1', 'nizar@gmail.com', 5, '2022-04-11 17:09:05', 1),
(90, '::1', 'rahad', NULL, '2022-04-11 20:29:22', 0),
(91, '::1', 'rahadian@gmail.com', 4, '2022-04-11 20:29:29', 1),
(92, '::1', 'rahadian@gmail.com', 4, '2022-04-11 21:36:25', 1),
(93, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-11 22:02:31', 1),
(94, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-12 00:15:58', 1),
(95, '::1', 'rahadian@gmail.com', 4, '2022-04-12 03:38:58', 1),
(96, '::1', 'rozin', NULL, '2022-04-12 03:40:35', 0),
(97, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-12 03:40:43', 1),
(98, '::1', 'rahad', NULL, '2022-04-12 09:50:10', 0),
(99, '::1', 'rahadian@gmail.com', 4, '2022-04-12 09:59:10', 1),
(100, '::1', 'rahad', NULL, '2022-04-12 16:38:16', 0),
(101, '::1', 'rahadian@gmail.com', 4, '2022-04-12 16:38:28', 1),
(102, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-12 16:59:58', 1),
(103, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-20 11:45:32', 1),
(104, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-20 20:21:30', 1),
(105, '::1', 'rozin', NULL, '2022-04-20 23:33:54', 0),
(106, '::1', 'fatkhurrozin@gmail.com', 3, '2022-04-20 23:34:01', 1),
(107, '::1', 'fatkhurrozin@gmail.com', 3, '2022-05-14 04:36:14', 1),
(108, '::1', 'fatkhurrozin@gmail.com', 3, '2022-05-14 04:36:18', 1),
(109, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-04 09:06:38', 1),
(110, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-04 09:41:02', 1),
(111, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-04 09:48:24', 1),
(112, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-04 21:15:16', 1),
(113, '::1', 'rahadian@gmail.com', 4, '2022-06-04 21:35:38', 1),
(114, '::1', 'nizar@gmail.com', 5, '2022-06-04 21:37:04', 1),
(115, '::1', 'rozin', NULL, '2022-06-06 01:53:29', 0),
(116, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-06 01:53:37', 1),
(117, '::1', 'rahadian@gmail.com', 4, '2022-06-07 09:09:37', 1),
(118, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-07 09:10:27', 1),
(119, '::1', 'rahadian@gmail.com', 4, '2022-06-07 09:18:02', 1),
(120, '::1', 'rahadian@gmail.com', 4, '2022-06-07 09:33:09', 1),
(121, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-07 10:12:07', 1),
(122, '::1', 'rozin', NULL, '2022-06-07 22:12:26', 0),
(123, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-07 22:12:34', 1),
(124, '::1', 'rozin', NULL, '2022-06-08 21:14:08', 0),
(125, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-08 21:14:14', 1),
(126, '::1', 'rozin', NULL, '2019-06-09 04:02:19', 0),
(127, '::1', 'fatkhurrozin@gmail.com', 3, '2019-06-09 04:02:25', 1),
(128, '::1', 'rahadian@gmail.com', 4, '2019-06-09 17:07:49', 1),
(129, '::1', 'rahadian@gmail.com', 4, '2019-06-09 17:19:01', 1),
(130, '::1', 'fatkhurrozin@gmail.com', 3, '2019-06-09 17:28:25', 1),
(131, '::1', 'rahadian@gmail.com', 4, '2022-06-13 23:17:11', 1),
(132, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-14 04:46:41', 1),
(133, '::1', 'rahadian@gmail.com', 4, '2022-06-14 06:28:39', 1),
(134, '::1', 'rahad', NULL, '2022-06-14 09:32:15', 0),
(135, '::1', 'rahadian@gmail.com', 4, '2022-06-14 09:32:22', 1),
(136, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-14 10:38:51', 1),
(137, '::1', 'rahadian@gmail.com', 4, '2022-06-14 11:51:57', 1),
(138, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-14 11:53:35', 1),
(139, '::1', 'rahad', NULL, '2022-06-14 11:55:25', 0),
(140, '::1', 'rahadian@gmail.com', 4, '2022-06-14 11:55:30', 1),
(141, '::1', 'rozin', NULL, '2022-06-14 12:38:18', 0),
(142, '::1', 'rozin', NULL, '2022-06-14 12:38:30', 0),
(143, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-14 12:38:36', 1),
(144, '::1', 'rahadian@gmail.com', 4, '2022-06-14 12:47:01', 1),
(145, '::1', 'rahad', NULL, '2022-06-16 10:14:16', 0),
(146, '::1', 'rahadian@gmail.com', 4, '2022-06-16 10:14:24', 1),
(147, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-16 10:21:51', 1),
(148, '::1', 'rahadian@gmail.com', 4, '2022-06-16 10:31:21', 1),
(149, '::1', 'rahadian@gmail.com', 4, '2019-06-17 23:27:00', 1),
(150, '::1', 'fatkhurrozin@gmail.com', 3, '2019-06-18 00:26:31', 1),
(151, '::1', 'fatkhurrozin@gmail.com', 3, '2019-06-18 10:25:01', 1),
(152, '::1', 'rahadian@gmail.com', 4, '2022-06-18 11:28:07', 1),
(153, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-18 20:29:33', 1),
(154, '::1', 'rahadian@gmail.com', 4, '2022-06-18 22:15:04', 1),
(155, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-18 22:26:28', 1),
(156, '::1', 'nizar@gmail.com', 5, '2022-06-18 23:12:30', 1),
(157, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-18 23:13:27', 1),
(158, '::1', 'rahadian@gmail.com', 4, '2022-06-21 23:25:44', 1),
(159, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-22 03:51:09', 1),
(160, '::1', 'nizar@gmail.com', 5, '2022-06-22 04:39:20', 1),
(161, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-22 16:53:41', 1),
(162, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-22 16:53:44', 1),
(163, '::1', 'nizar@gmail.com', 5, '2022-06-22 18:19:10', 1),
(164, '::1', 'rahad', NULL, '2022-06-22 18:22:09', 0),
(165, '::1', 'rahadian@gmail.com', 4, '2022-06-22 18:22:15', 1),
(166, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-22 18:24:50', 1),
(167, '::1', 'rahadian@gmail.com', 4, '2022-06-22 20:12:57', 1),
(168, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-22 20:14:15', 1),
(169, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-22 22:14:20', 1),
(170, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-22 22:14:21', 1),
(171, '::1', 'rahadian@gmail.com', 4, '2022-06-22 22:23:24', 1),
(172, '::1', 'bagus@gmail.com', 6, '2022-06-22 22:24:22', 1),
(173, '::1', 'rozin', NULL, '2022-06-22 22:38:15', 0),
(174, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-22 22:38:21', 1),
(175, '::1', 'bagus@gmail.com', 6, '2022-06-22 22:49:41', 1),
(176, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-22 22:51:29', 1),
(177, '::1', 'bagus@gmail.com', 6, '2022-06-22 23:48:41', 1),
(178, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-23 02:37:43', 1),
(179, '::1', 'rahadian@gmail.com', 4, '2018-06-23 03:59:16', 1),
(180, '::1', 'rahadian@gmail.com', 4, '2022-06-23 11:21:03', 1),
(181, '::1', 'admin@gmail.com', 2, '2022-06-23 12:02:56', 1),
(182, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-23 12:03:21', 1),
(183, '::1', 'rozin', NULL, '2022-06-23 12:04:27', 0),
(184, '::1', 'rozin', NULL, '2022-06-23 12:04:27', 0),
(185, '::1', 'rozin', NULL, '2022-06-23 12:04:34', 0),
(186, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-23 12:04:41', 1),
(187, '::1', 'fatkhurrozin@gmail.com', 3, '2022-06-23 12:05:43', 1),
(188, '::1', 'rahadian@gmail.com', 4, '2022-06-23 17:35:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage-user', 'managing all users'),
(2, 'post-tugas', 'menambahkan tugas'),
(3, 'submit-tugas', 'mengirimkan tugas');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id_pesanan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` varchar(30) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1640619709, 1),
(2, '2021-12-27-182138', 'App\\Database\\Migrations\\Anggota', 'default', 'App', 1640629851, 2);

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `totalbayar` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `tgl`, `totalbayar`, `status`, `id_user`, `id_pelanggan`) VALUES
(1, '23-06-2022', 180000, 'Belum Dibayar', 4, 1),
(2, '23-06-2022', 210000, 'Belum Dibayar', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `hp`) VALUES
(1, 'Rozin', 'Batang', '081229545565'),
(2, 'dsa', 'asda', 'asda');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `id_nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` varchar(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `jumlah`, `total`, `id_menu`, `id_user`) VALUES
(1, 3, '90000', 2, 4),
(2, 3, '90000', 2, 4),
(3, 1, '30000', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_menu` int(50) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `harga` int(50) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_menu`, `nama_menu`, `detail`, `harga`, `gambar`) VALUES
(1, 'Risoles Ayam', 'Isi 10 Frozen Food', 30000, 'ayam.jpg'),
(2, 'Risoles Mayo', 'Isi 6 Frozen Food', 30000, 'mayo.jpg'),
(3, 'Risoles Sayur', 'Isi 12 Frozen food', 27000, 'sayur.jpg'),
(4, 'Risoles  Ragout Sayur', 'Coming Soon', 30000, 'ragoutsayur.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'default.svg',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `fullname`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'admin@gmail.com', 'admin', NULL, 'default.svg', '$2y$10$PSvXi5g5/KrbI6O22lltMecv8MqSQDiai4/NBcfglq.vpr4onJaAO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-12-27 09:44:43', '2021-12-27 09:44:43', NULL),
(3, 'fatkhurrozin@gmail.com', 'rozin', NULL, 'default.svg', '$2y$10$DpytWGBLaB3IxnT664NfVulXV.38Rl.XX0HGlBKc8RjuXX7gMA4ou', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-12-27 09:46:06', '2021-12-27 09:46:06', NULL),
(4, 'rahadian@gmail.com', 'rahad', NULL, 'default.svg', '$2y$10$mGbrrkzrkIldX1WVx8zNoeiw8GOCLlqkHQgG4c76n03PLnVe1xXtm', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-12-27 09:54:05', '2021-12-27 09:54:05', NULL),
(5, 'nizar@gmail.com', 'nizar', NULL, 'default.svg', '$2y$10$ok7K7HDknPcF3cXonS39Ie7MGZdoph9WfN2WtGvfprnd68Q60yROq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-12-27 10:34:15', '2021-12-27 10:34:15', NULL),
(6, 'bagus@gmail.com', 'bagus', NULL, 'default.svg', '$2y$10$nHGEpo5CVmzSdFkvSQcS5e7nQI951RLcsFF8n4EuBE2atilJ.gtk2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-06-22 22:24:11', '2022-06-22 22:24:11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pesanan` (`id_nota`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_menu` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
