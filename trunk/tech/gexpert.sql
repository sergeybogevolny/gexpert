-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2012 at 11:01 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gexpert`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL,
  `answer` varchar(3000) NOT NULL,
  `match_answer` varchar(5000) NOT NULL,
  `is_correct` bit(1) NOT NULL DEFAULT b'0',
  `question_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `percent` int(11) NOT NULL,
  KEY `pk_answers` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `match_answer`, `is_correct`, `question_id`, `date_created`, `percent`) VALUES
(0, '', '', '1', 1, '2012-11-24 17:26:59', 0),
(0, '', '', '1', 3, '2012-11-24 17:27:41', 0),
(0, 'Smarty', '', '1', 4, '2012-11-24 17:27:41', 0),
(0, '', '', '1', 5, '2012-11-24 17:28:24', 0),
(1, 'Smarty', '', '1', 6, '2012-11-24 17:28:24', 0),
(2, 'HTML', '', '1', 6, '2012-11-24 17:28:24', 0),
(3, 'CSS', '', '1', 6, '2012-11-24 17:28:24', 0),
(4, 'Jquery', '', '1', 6, '2012-11-24 17:28:24', 0),
(5, 'eval', '', '1', 7, '2012-11-24 17:28:24', 0),
(6, 'wel', '', '1', 7, '2012-11-24 17:28:24', 0),
(7, 'echo', '', '1', 7, '2012-11-24 17:28:24', 0),
(8, 'system.out.println', '', '1', 7, '2012-11-24 17:28:24', 0),
(9, 'PHP server scripts are surrounded by ', '', '1', 8, '2012-11-24 17:28:24', 0),
(10, 'write "Hello World" in PHP\n', '', '1', 8, '2012-11-24 17:28:24', 0),
(11, 'variables in PHP start with', '', '1', 8, '2012-11-24 17:28:24', 0),
(12, 'correct way to end a PHP statement', '', '1', 8, '2012-11-24 17:28:24', 0),
(13, 'A', '', '1', 9, '2012-11-24 17:28:24', 0),
(14, 'B', '', '1', 9, '2012-11-24 17:28:24', 0),
(15, 'C', '', '1', 9, '2012-11-24 17:28:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `code` varchar(150) NOT NULL,
  `logo` varchar(1500) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `code`, `logo`, `date_created`, `status`) VALUES
(2, 'PHP', 'php', '', '2012-11-22 16:58:55', 0),
(11, 'PHP', 'php', '', '2012-11-22 16:58:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_key_test_users`
--

CREATE TABLE IF NOT EXISTS `product_key_test_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_key` varchar(50) NOT NULL,
  `test_id` int(11) NOT NULL,
  `test_type_id` int(11) NOT NULL,
  `test_user_id` int(11) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx_product_key_test_users` (`test_user_id`),
  KEY `idx_product_key_test_users_0` (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=237 ;

--
-- Dumping data for table `product_key_test_users`
--

INSERT INTO `product_key_test_users` (`id`, `product_key`, `test_id`, `test_type_id`, `test_user_id`, `status`) VALUES
(7, 'RL6DL9CCPW2Z6XU3', 15, 0, NULL, '1'),
(8, 'OZN9MWQFR8LOD4FV', 15, 0, NULL, '1'),
(9, 'Y2BZ62ZEW1PON08F', 15, 0, NULL, '1'),
(10, '6S2L3O1BARLBP86L', 15, 0, NULL, '1'),
(11, 'KV2H4N6BMGWFDWQ9', 15, 0, NULL, '1'),
(12, 'IEL4DZ3B9Q13G4CB', 15, 0, NULL, '1'),
(13, '2URKEFYM6KPYCUQX', 15, 0, NULL, '1'),
(14, '9XPUR2ZBOPEPYF06', 15, 0, NULL, '1'),
(15, 'WNDZI4ODF6I0EP5T', 15, 0, NULL, '1'),
(16, 'DAYMU6A3BW0SWA2', 15, 0, NULL, '1'),
(17, 'VP955MIZ1PIA2C1', 15, 0, NULL, '1'),
(18, 'K8TTCEBMYVRUF7TT', 15, 0, NULL, '1'),
(19, 'UO3EASQKPBO1ZDRR', 15, 0, NULL, '1'),
(20, 'ZTFGOEGKCVVXD93', 15, 0, NULL, '1'),
(21, 'VGXNPWV8C2T4N3OS', 15, 0, NULL, '1'),
(22, '90K1BDX8M1XG2HW', 15, 0, NULL, '1'),
(23, 'XSL7B8LM3J15PO41', 15, 0, NULL, '1'),
(24, 'S8YF0WU9AZ02PT64', 15, 0, NULL, '1'),
(25, '3UTRTOGDHNR6LLKF', 15, 0, NULL, '1'),
(26, 'AW4JO0CAV3LZGQ5', 15, 0, NULL, '1'),
(27, '07Y7W4DEJ8GOEK8A', 15, 0, NULL, '1'),
(28, 'NXU5ICXX7EQRL3M1', 15, 0, NULL, '1'),
(29, '25S4M100W77AIP0R', 15, 0, NULL, '1'),
(30, 'VQQH9VEQ1NUGFBF3', 13, 1, NULL, '1'),
(31, 'VQQH9VEQ1NUGFBF3', 13, 2, NULL, '1'),
(32, 'FEINSM0PDML4JX6', 3, 1, NULL, '1'),
(33, 'FEINSM0PDML4JX6', 3, 2, NULL, '1'),
(34, 'FV9A4OEBFCBY7ND9', 3, 1, NULL, '1'),
(35, 'FV9A4OEBFCBY7ND9', 3, 2, NULL, '1'),
(36, 'HV81GYQGUCQWZT', 3, 1, NULL, '1'),
(37, 'HV81GYQGUCQWZT', 3, 2, NULL, '1'),
(38, 'LSMV4IBDEAXPEPDI', 3, 1, NULL, '1'),
(39, 'LSMV4IBDEAXPEPDI', 3, 2, NULL, '1'),
(40, '48F85U4BBDORNGF1', 3, 1, NULL, '1'),
(41, '48F85U4BBDORNGF1', 3, 2, NULL, '1'),
(42, '304JZ281BE0ERZKG', 3, 1, NULL, '1'),
(43, '304JZ281BE0ERZKG', 3, 2, NULL, '1'),
(44, 'JWSEN0NK6D9OM7F', 3, 1, NULL, '1'),
(45, 'JWSEN0NK6D9OM7F', 3, 2, NULL, '1'),
(46, '8NGHLLTRW01WC7U3', 3, 1, NULL, '1'),
(47, '8NGHLLTRW01WC7U3', 3, 2, NULL, '1'),
(48, 'V575XKWN8YL6HLDZ', 3, 1, NULL, '1'),
(49, 'V575XKWN8YL6HLDZ', 3, 2, NULL, '1'),
(50, 'R3IXRY3ZT74FB4DD', 3, 1, NULL, '1'),
(51, 'R3IXRY3ZT74FB4DD', 3, 2, NULL, '1'),
(52, 'YH4A97QSSK9S2CB', 3, 1, NULL, '1'),
(53, 'YH4A97QSSK9S2CB', 3, 2, NULL, '1'),
(54, 'AVA3YJ2NV49UUH2Z', 3, 1, NULL, '1'),
(55, 'AVA3YJ2NV49UUH2Z', 3, 2, NULL, '1'),
(56, '5YY23E5H9LNUCPYW', 3, 1, NULL, '1'),
(57, '5YY23E5H9LNUCPYW', 3, 2, NULL, '1'),
(58, '3W7G4CTBEFHPVOS', 3, 1, NULL, '1'),
(59, '3W7G4CTBEFHPVOS', 3, 2, NULL, '1'),
(60, 'ASH2C6EWP0C0RZV', 3, 1, NULL, '1'),
(61, 'ASH2C6EWP0C0RZV', 3, 2, NULL, '1'),
(62, 'DOJIUHB4WJNRWN0', 3, 1, NULL, '1'),
(63, 'DOJIUHB4WJNRWN0', 3, 2, NULL, '1'),
(64, 'DOJIUHB4WJNRWN0', 3, 3, NULL, '1'),
(65, '5L37240BT4WSWG33', 3, 1, NULL, '1'),
(66, '5L37240BT4WSWG33', 3, 2, NULL, '1'),
(67, '5L37240BT4WSWG33', 3, 3, NULL, '1'),
(68, 'U3K8HFEL2A9GFMYG', 3, 1, NULL, '1'),
(69, 'U3K8HFEL2A9GFMYG', 3, 2, NULL, '1'),
(70, 'U3K8HFEL2A9GFMYG', 3, 3, NULL, '1'),
(71, 'Y5TVSKJIF3WZHIYC', 3, 1, NULL, '1'),
(72, 'Y5TVSKJIF3WZHIYC', 3, 2, NULL, '1'),
(73, 'Y5TVSKJIF3WZHIYC', 3, 3, NULL, '1'),
(74, '4NDS9YTJHXD6GHT8', 3, 1, NULL, '1'),
(75, '4NDS9YTJHXD6GHT8', 3, 2, NULL, '1'),
(76, '4NDS9YTJHXD6GHT8', 3, 3, NULL, '1'),
(77, '7UQZO0AWFES7KA91', 3, 1, NULL, '1'),
(78, '7UQZO0AWFES7KA91', 3, 2, NULL, '1'),
(79, '7UQZO0AWFES7KA91', 3, 3, NULL, '1'),
(80, 'W65RINJZ9KCLR4ED', 3, 1, NULL, '1'),
(81, 'W65RINJZ9KCLR4ED', 3, 2, NULL, '1'),
(82, 'W65RINJZ9KCLR4ED', 3, 3, NULL, '1'),
(83, '7Z0O9AYL0UASCT', 3, 1, NULL, '1'),
(84, '7Z0O9AYL0UASCT', 3, 2, NULL, '1'),
(85, '7Z0O9AYL0UASCT', 3, 3, NULL, '1'),
(86, '4HYTTMRZOW5P6OH', 3, 1, NULL, '1'),
(87, '4HYTTMRZOW5P6OH', 3, 2, NULL, '1'),
(88, '4HYTTMRZOW5P6OH', 3, 3, NULL, '1'),
(89, '2MOUY269JAUPYQ4K', 3, 1, NULL, '1'),
(90, '2MOUY269JAUPYQ4K', 3, 2, NULL, '1'),
(91, '2MOUY269JAUPYQ4K', 3, 3, NULL, '1'),
(92, 'JOI2V3QUKUE6NU', 3, 1, NULL, '1'),
(93, 'JOI2V3QUKUE6NU', 3, 2, NULL, '1'),
(94, 'JOI2V3QUKUE6NU', 3, 3, NULL, '1'),
(95, 'W94J10KFIBHOWYSB', 3, 1, NULL, '1'),
(96, 'W94J10KFIBHOWYSB', 3, 2, NULL, '1'),
(97, 'W94J10KFIBHOWYSB', 3, 3, NULL, '1'),
(98, '2VR4YKC4RM253AF', 3, 1, NULL, '1'),
(99, '2VR4YKC4RM253AF', 3, 2, NULL, '1'),
(100, '2VR4YKC4RM253AF', 3, 3, NULL, '1'),
(101, 'FNTLL51O3MCG6DZ', 3, 1, NULL, '1'),
(102, 'FNTLL51O3MCG6DZ', 3, 2, NULL, '1'),
(103, 'FNTLL51O3MCG6DZ', 3, 3, NULL, '1'),
(104, '7UO7LXZZ6UXJIT6D', 3, 1, NULL, '1'),
(105, '7UO7LXZZ6UXJIT6D', 3, 2, NULL, '1'),
(106, '7UO7LXZZ6UXJIT6D', 3, 3, NULL, '1'),
(107, 'S68KJO7TN56AUSR2', 13, 1, NULL, '1'),
(108, 'S68KJO7TN56AUSR2', 13, 2, NULL, '1'),
(109, '5ACLMXA6793I8WH', 13, 1, NULL, '1'),
(110, '5ACLMXA6793I8WH', 13, 2, NULL, '1'),
(111, 'MK1MN706KO96RVCJ', 13, 1, NULL, '1'),
(112, 'MK1MN706KO96RVCJ', 13, 2, NULL, '1'),
(113, 'P9H10H17BW0PG98M', 13, 1, NULL, '1'),
(114, 'P9H10H17BW0PG98M', 13, 2, NULL, '1'),
(115, '0BUPW7OK7G06UXRR', 13, 1, NULL, '1'),
(116, '0BUPW7OK7G06UXRR', 13, 2, NULL, '1'),
(117, 'NXKTHWL4VCOP0MW0', 13, 1, NULL, '1'),
(118, 'NXKTHWL4VCOP0MW0', 13, 2, NULL, '1'),
(119, 'GWHYZRA3ZIKL3WB', 13, 1, NULL, '1'),
(120, 'GWHYZRA3ZIKL3WB', 13, 2, NULL, '1'),
(121, 'NBFGUS6HJ1J17YYR', 13, 1, NULL, '1'),
(122, 'NBFGUS6HJ1J17YYR', 13, 2, NULL, '1'),
(123, 'F9U3RNFI0PA7O7JR', 13, 1, NULL, '1'),
(124, 'F9U3RNFI0PA7O7JR', 13, 2, NULL, '1'),
(125, '8FRLHF57T7RY07TE', 13, 1, NULL, '1'),
(126, '8FRLHF57T7RY07TE', 13, 2, NULL, '1'),
(127, 'HXK80NATOK1GHLW', 13, 1, NULL, '1'),
(128, 'HXK80NATOK1GHLW', 13, 2, NULL, '1'),
(129, '1T5U5JNAA4N6XF2', 13, 1, NULL, '1'),
(130, '1T5U5JNAA4N6XF2', 13, 2, NULL, '1'),
(131, '23PJU2ET7TNF63G', 13, 1, NULL, '1'),
(132, '23PJU2ET7TNF63G', 13, 2, NULL, '1'),
(133, 'DSSR39IGKT91LEMD', 13, 1, NULL, '1'),
(134, 'DSSR39IGKT91LEMD', 13, 2, NULL, '1'),
(135, 'GKD3JU2DELFR4JB', 13, 1, NULL, '1'),
(136, 'GKD3JU2DELFR4JB', 13, 2, NULL, '1'),
(137, 'KRJBK7D6JLKUQEVC', 13, 1, NULL, '1'),
(138, 'KRJBK7D6JLKUQEVC', 13, 2, NULL, '1'),
(139, 'ZWWRMIASGG59Y7D', 13, 1, NULL, '1'),
(140, 'ZWWRMIASGG59Y7D', 13, 2, NULL, '1'),
(141, '3LV1OFX4MI8H090', 13, 1, NULL, '1'),
(142, '3LV1OFX4MI8H090', 13, 2, NULL, '1'),
(143, '75TVZ8Z29FGEH7CC', 13, 1, NULL, '1'),
(144, '75TVZ8Z29FGEH7CC', 13, 2, NULL, '1'),
(145, '7SA3I3ABHHL5TWK', 13, 1, NULL, '1'),
(146, '7SA3I3ABHHL5TWK', 13, 2, NULL, '1'),
(147, 'W7YY63FW2NC6OX', 13, 1, NULL, '1'),
(148, 'W7YY63FW2NC6OX', 13, 2, NULL, '1'),
(149, 'W7YY63FW2NC6OX', 13, 3, NULL, '1'),
(150, 'GBEPHX6NYNV7Y0R', 13, 1, NULL, '1'),
(151, 'GBEPHX6NYNV7Y0R', 13, 2, NULL, '1'),
(152, 'GBEPHX6NYNV7Y0R', 13, 3, NULL, '1'),
(153, '010ESHUAYLUYZYZH', 13, 1, NULL, '1'),
(154, '010ESHUAYLUYZYZH', 13, 2, NULL, '1'),
(155, '010ESHUAYLUYZYZH', 13, 3, NULL, '1'),
(156, '3IT5C0OB4M9L717Y', 13, 1, NULL, '1'),
(157, '3IT5C0OB4M9L717Y', 13, 2, NULL, '1'),
(158, '3IT5C0OB4M9L717Y', 13, 3, NULL, '1'),
(159, 'N4B5CU1230TKUBWO', 13, 1, NULL, '1'),
(160, 'N4B5CU1230TKUBWO', 13, 2, NULL, '1'),
(161, 'N4B5CU1230TKUBWO', 13, 3, NULL, '1'),
(162, 'R3VG4MGHVP57P', 13, 1, NULL, '1'),
(163, 'R3VG4MGHVP57P', 13, 2, NULL, '1'),
(164, 'R3VG4MGHVP57P', 13, 3, NULL, '1'),
(165, 'VU9PA91JNEG8VA1S', 13, 1, NULL, '1'),
(166, 'VU9PA91JNEG8VA1S', 13, 2, NULL, '1'),
(167, 'VU9PA91JNEG8VA1S', 13, 3, NULL, '1'),
(168, '2J5O9WRH9398JQM', 13, 1, NULL, '1'),
(169, '2J5O9WRH9398JQM', 13, 2, NULL, '1'),
(170, '2J5O9WRH9398JQM', 13, 3, NULL, '1'),
(171, 'NKQ4TC4WHFYE8QFB', 13, 1, NULL, '1'),
(172, 'NKQ4TC4WHFYE8QFB', 13, 2, NULL, '1'),
(173, 'NKQ4TC4WHFYE8QFB', 13, 3, NULL, '1'),
(174, 'QYGUOZQCABTK84NT', 13, 1, NULL, '1'),
(175, 'QYGUOZQCABTK84NT', 13, 2, NULL, '1'),
(176, 'QYGUOZQCABTK84NT', 13, 3, NULL, '1'),
(177, 'ZQ90TW3BBS3HJEI7', 13, 1, NULL, '1'),
(178, 'ZQ90TW3BBS3HJEI7', 13, 2, NULL, '1'),
(179, 'ZQ90TW3BBS3HJEI7', 13, 3, NULL, '1'),
(180, '4ET708EG6UFAJMUZ', 13, 1, NULL, '1'),
(181, '4ET708EG6UFAJMUZ', 13, 2, NULL, '1'),
(182, '4ET708EG6UFAJMUZ', 13, 3, NULL, '1'),
(183, 'XMCV6IJ9FD5R2G1', 13, 1, NULL, '1'),
(184, 'XMCV6IJ9FD5R2G1', 13, 2, NULL, '1'),
(185, 'XMCV6IJ9FD5R2G1', 13, 3, NULL, '1'),
(186, 'TZ7RC4A7OHLFL6E', 13, 1, NULL, '1'),
(187, 'TZ7RC4A7OHLFL6E', 13, 2, NULL, '1'),
(188, 'TZ7RC4A7OHLFL6E', 13, 3, NULL, '1'),
(189, 'Z8KBYPE1AQR25KRN', 13, 1, NULL, '1'),
(190, 'Z8KBYPE1AQR25KRN', 13, 2, NULL, '1'),
(191, 'Z8KBYPE1AQR25KRN', 13, 3, NULL, '1'),
(192, '0W6L4LZ1H6UEUVSP', 13, 1, NULL, '1'),
(193, '0W6L4LZ1H6UEUVSP', 13, 2, NULL, '1'),
(194, '0W6L4LZ1H6UEUVSP', 13, 3, NULL, '1'),
(195, 'MIQDXYWBSLZYZB', 13, 1, NULL, '1'),
(196, 'MIQDXYWBSLZYZB', 13, 2, NULL, '1'),
(197, 'MIQDXYWBSLZYZB', 13, 3, NULL, '1'),
(198, 'TPKN408UQO956OO3', 13, 1, NULL, '1'),
(199, 'TPKN408UQO956OO3', 13, 2, NULL, '1'),
(200, 'TPKN408UQO956OO3', 13, 3, NULL, '1'),
(201, 'UFG831CB9ME5O1G5', 13, 1, NULL, '1'),
(202, 'UFG831CB9ME5O1G5', 13, 2, NULL, '1'),
(203, 'UFG831CB9ME5O1G5', 13, 3, NULL, '1'),
(204, '39M0U9TZIK8NUDTS', 13, 1, NULL, '1'),
(205, '39M0U9TZIK8NUDTS', 13, 2, NULL, '1'),
(206, '39M0U9TZIK8NUDTS', 13, 3, NULL, '1'),
(207, 'BY2TCEA9Z7EN7', 13, 1, NULL, '1'),
(208, 'BY2TCEA9Z7EN7', 13, 2, NULL, '1'),
(209, 'BY2TCEA9Z7EN7', 13, 3, NULL, '1'),
(210, '8XW4GNGLK7FASY', 13, 1, NULL, '1'),
(211, '8XW4GNGLK7FASY', 13, 2, NULL, '1'),
(212, '8XW4GNGLK7FASY', 13, 3, NULL, '1'),
(213, 'S1LCHR84D950VMO0', 13, 1, NULL, '1'),
(214, 'S1LCHR84D950VMO0', 13, 2, NULL, '1'),
(215, 'S1LCHR84D950VMO0', 13, 3, NULL, '1'),
(216, 'RWM4YYZAO5D7ZE5M', 13, 1, NULL, '1'),
(217, 'RWM4YYZAO5D7ZE5M', 13, 2, NULL, '1'),
(218, 'RWM4YYZAO5D7ZE5M', 13, 3, NULL, '1'),
(219, 'GNH1U72B1VDEEN3', 13, 1, NULL, '1'),
(220, 'GNH1U72B1VDEEN3', 13, 2, NULL, '1'),
(221, 'GNH1U72B1VDEEN3', 13, 3, NULL, '1'),
(222, 'LVNXIMMLUYOPT34B', 13, 1, NULL, '1'),
(223, 'LVNXIMMLUYOPT34B', 13, 2, NULL, '1'),
(224, 'LVNXIMMLUYOPT34B', 13, 3, NULL, '1'),
(225, 'R00IW8S6QTOC7DJB', 13, 1, NULL, '1'),
(226, 'R00IW8S6QTOC7DJB', 13, 2, NULL, '1'),
(227, 'R00IW8S6QTOC7DJB', 13, 3, NULL, '1'),
(228, 'LKELYXF4S5DESRW1', 13, 1, NULL, '1'),
(229, 'LKELYXF4S5DESRW1', 13, 2, NULL, '1'),
(230, 'LKELYXF4S5DESRW1', 13, 3, NULL, '1'),
(231, 'OS6124NYXDW8Y262', 13, 1, NULL, '1'),
(232, 'OS6124NYXDW8Y262', 13, 2, NULL, '1'),
(233, 'OS6124NYXDW8Y262', 13, 3, NULL, '1'),
(234, 'HTM4G1T6G8QT3GGT', 13, 1, NULL, '1'),
(235, 'HTM4G1T6G8QT3GGT', 13, 2, NULL, '1'),
(236, 'HTM4G1T6G8QT3GGT', 13, 3, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `question_type` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `question` varchar(1500) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_questions_0` (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `test_id`, `question_type`, `level_id`, `date_created`, `status`, `question`) VALUES
(1, 13, 0, 1, '2012-11-24 17:26:59', 0, 'is_array is a function in PHP'),
(3, 14, 0, 1, '2012-11-24 17:27:41', 0, 'is_array is a function in PHP'),
(4, 14, 0, 1, '2012-11-24 17:27:41', 0, 'Template Frameworks for PHP'),
(5, 15, 2, 1, '2012-11-24 17:28:24', 0, 'is_array is a function in PHP'),
(6, 15, 0, 1, '2012-11-24 17:28:24', 0, 'Template Frameworks for PHP'),
(7, 15, 1, 1, '2012-11-24 17:28:24', 0, 'Functions available in PHP'),
(8, 15, 4, 1, '2012-11-24 17:28:24', 0, 'Match the following'),
(9, 15, 5, 1, '2012-11-24 17:28:24', 0, 'Sequencing');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `score` decimal(10,0) NOT NULL,
  `test_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` char(1) DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_scores` (`test_id`),
  KEY `idx_scores_0` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `test_details`
--

CREATE TABLE IF NOT EXISTS `test_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `instruction` varchar(5000) DEFAULT NULL,
  `logo` varchar(500) NOT NULL,
  `time_taken` int(10) unsigned NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `valid_from` date NOT NULL,
  `valid_to` date NOT NULL,
  `allow_correction` tinyint(1) NOT NULL,
  `sharing` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `test_details`
--

INSERT INTO `test_details` (`id`, `category`, `name`, `description`, `instruction`, `logo`, `time_taken`, `date_created`, `created_by`, `last_modified`, `valid_from`, `valid_to`, `allow_correction`, `sharing`, `status`) VALUES
(3, 11, 'Sample test', 'Description for test', NULL, '', 15, '2012-11-22 16:59:26', 1, '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 0, 0, 0),
(13, 2, 'Basic', 'Basic test', NULL, '', 30, '2012-11-24 17:26:59', 1, '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 0, 0, 0),
(14, 2, 'Basic', 'Basic test', NULL, '', 30, '2012-11-24 17:27:41', 1, '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 0, 0, 0),
(15, 2, 'Basic', 'Basic test', NULL, '', 30, '2012-11-24 17:28:23', 1, '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `test_type`
--

CREATE TABLE IF NOT EXISTS `test_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `test_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `test_type`
--

INSERT INTO `test_type` (`id`, `code`, `test_name`) VALUES
(1, 'pretest', 'Pre-Test'),
(2, 'posttest', 'Post Test'),
(3, 'final', 'Final test');

-- --------------------------------------------------------

--
-- Table structure for table `__users`
--

CREATE TABLE IF NOT EXISTS `__users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `emp_code` varchar(150) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `user_type` int(11) DEFAULT '1',
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `__users`
--

INSERT INTO `__users` (`id`, `name`, `emp_code`, `email`, `phone`, `user_type`, `username`, `password`) VALUES
(1, 'Sundar', '001', 'meenakshi.sun20@gmail.com', '9841673880', 1, 'admin', '0192023a7bbd73250516f069df18b500');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `fk_answers` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_key_test_users`
--
ALTER TABLE `product_key_test_users`
  ADD CONSTRAINT `fk_product_key_test_users` FOREIGN KEY (`test_user_id`) REFERENCES `__users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_key_test_users_0` FOREIGN KEY (`test_id`) REFERENCES `test_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_questions` FOREIGN KEY (`test_id`) REFERENCES `test_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `fk_scores` FOREIGN KEY (`test_id`) REFERENCES `test_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_scores_0` FOREIGN KEY (`user_id`) REFERENCES `__users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `test_details`
--
ALTER TABLE `test_details`
  ADD CONSTRAINT `fk_test_details` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_test_details_0` FOREIGN KEY (`created_by`) REFERENCES `__users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
