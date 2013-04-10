-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2013 at 02:11 PM
-- Server version: 5.5.29-0ubuntu1
-- PHP Version: 5.4.9-4ubuntu2

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(3000) NOT NULL,
  `match_answer` varchar(5000) NOT NULL,
  `is_correct` bit(1) NOT NULL DEFAULT b'0',
  `question_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `percent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_answers` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=368 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `match_answer`, `is_correct`, `question_id`, `date_created`, `percent`) VALUES
(17, '1', '', b'1', 20, '2013-01-15 18:26:23', 0),
(18, '2', '', b'1', 20, '2013-01-15 18:26:23', 0),
(19, '3', '', b'1', 20, '2013-01-15 18:26:23', 0),
(20, '4', '', b'1', 20, '2013-01-15 18:26:23', 0),
(21, '1', '', b'1', 21, '2013-01-15 18:26:23', 0),
(22, '2', '', b'1', 21, '2013-01-15 18:26:23', 0),
(23, '3', '', b'1', 21, '2013-01-15 18:26:23', 0),
(24, '4', '', b'1', 21, '2013-01-15 18:26:23', 0),
(25, '', '', b'1', 22, '2013-01-15 18:26:23', 0),
(26, '1', '1', b'1', 23, '2013-01-15 18:26:23', 0),
(27, '2', '2', b'1', 23, '2013-01-15 18:26:23', 0),
(28, '3', '3', b'1', 23, '2013-01-15 18:26:23', 0),
(29, '4', '4', b'1', 23, '2013-01-15 18:26:23', 0),
(30, '1', '', b'1', 24, '2013-01-15 18:26:24', 0),
(31, '2', '', b'1', 24, '2013-01-15 18:26:24', 0),
(32, '3', '', b'1', 24, '2013-01-15 18:26:24', 0),
(33, '4', '', b'1', 24, '2013-01-15 18:26:24', 0),
(114, '', '', b'1', 50, '2013-02-13 07:37:53', 0),
(115, 'Smarty', '', b'1', 51, '2013-02-13 07:37:53', 0),
(116, 'HTML', '', b'1', 51, '2013-02-13 07:37:53', 0),
(117, 'CSS', '', b'1', 51, '2013-02-13 07:37:53', 0),
(118, 'Jquery', '', b'1', 51, '2013-02-13 07:37:53', 0),
(119, 'eval', '', b'1', 52, '2013-02-13 07:37:53', 0),
(120, 'wel', '', b'1', 52, '2013-02-13 07:37:53', 0),
(121, 'echo', '', b'1', 52, '2013-02-13 07:37:53', 0),
(122, 'system.out.println', '', b'1', 52, '2013-02-13 07:37:53', 0),
(123, 'PHP server scripts are surrounded by ', 'A\n', b'1', 53, '2013-02-13 07:37:54', 0),
(124, 'write "Hello World" in PHP\n', 'B', b'1', 53, '2013-02-13 07:37:54', 0),
(125, 'variables in PHP start with', 'C', b'1', 53, '2013-02-13 07:37:54', 0),
(126, 'correct way to end a PHP statement', 'D\n', b'1', 53, '2013-02-13 07:37:54', 0),
(127, 'A', '', b'1', 54, '2013-02-13 07:37:54', 0),
(128, 'B', '', b'1', 54, '2013-02-13 07:37:54', 0),
(129, 'C', '', b'1', 54, '2013-02-13 07:37:54', 0),
(130, 'Aple', '', b'1', 55, '2013-02-21 07:19:22', 0),
(131, 'Appl', '', b'1', 55, '2013-02-21 07:19:22', 0),
(132, 'Applae', '', b'1', 55, '2013-02-21 07:19:22', 0),
(133, 'Apple', '', b'1', 55, '2013-02-21 07:19:22', 0),
(134, 'Finding bugs', '', b'1', 56, '2013-02-21 07:19:22', 0),
(135, 'Testing Application', '', b'1', 56, '2013-02-21 07:19:22', 0),
(136, 'verifying whether application meeting customer requirements or not', '', b'1', 56, '2013-02-21 07:19:22', 0),
(137, 'Releasing the application without bugs.', '', b'1', 56, '2013-02-21 07:19:23', 0),
(138, 'New, Open, Fixed, Closed', '', b'1', 57, '2013-02-21 07:19:23', 0),
(139, 'New, Asign, Open, Fixed, Reopen/Closed', '', b'1', 57, '2013-02-21 07:19:23', 0),
(140, 'New, Asign, Open, Fixed, Reopen', '', b'1', 57, '2013-02-21 07:19:23', 0),
(141, 'New, Open, Fixed, Closed', '', b'1', 57, '2013-02-21 07:19:23', 0),
(142, '', '', b'1', 58, '2013-02-21 07:19:23', 0),
(143, 'Developper', '', b'1', 59, '2013-02-21 07:26:39', 0),
(144, 'Tester', '', b'1', 59, '2013-02-21 07:26:39', 0),
(145, 'Admin', '', b'1', 59, '2013-02-21 07:26:39', 0),
(146, 'HR', '', b'1', 59, '2013-02-21 07:26:39', 0),
(147, '', '', b'1', 60, '2013-02-21 07:26:39', 0),
(148, 'tester is a tester', '', b'1', 61, '2013-02-21 07:26:39', 0),
(149, 'he is developer', '', b'1', 61, '2013-02-21 07:26:39', 0),
(150, 'he is man', '', b'1', 61, '2013-02-21 07:26:39', 0),
(151, '', '', b'1', 62, '2013-02-21 07:26:39', 0),
(152, 'who never leave the bugs', '', b'1', 63, '2013-02-21 07:46:20', 0),
(153, 'who leave the bugs', '', b'1', 63, '2013-02-21 07:46:20', 0),
(154, 'who will not test properly', '', b'1', 63, '2013-02-21 07:46:20', 0),
(155, 'who will test all customer requirements', '', b'1', 63, '2013-02-21 07:46:20', 0),
(156, '', '', b'1', 64, '2013-02-21 07:46:20', 0),
(157, '', '', b'1', 65, '2013-02-21 07:46:20', 0),
(158, 'Requirements, Planning, estimation, coading, testing, implement, Maintenance  ', '', b'1', 66, '2013-02-21 07:46:20', 0),
(159, 'Requirements, planning, estimation, desing, coading, testing', '', b'1', 66, '2013-02-21 07:46:20', 0),
(160, 'requirement, planning, design, coading, testing, maintenance', '', b'1', 66, '2013-02-21 07:46:20', 0),
(161, 'Finding bugs', '', b'1', 67, '2013-02-21 10:58:43', 0),
(162, 'creating scenarios', '', b'1', 67, '2013-02-21 10:58:43', 0),
(163, 'verifying application', '', b'1', 67, '2013-02-21 10:58:43', 0),
(164, 'New, Open, Fix, Close', '', b'1', 68, '2013-02-21 10:58:43', 0),
(165, 'New, Asign, Open, Fix, Reopen/Close', '', b'1', 68, '2013-02-21 10:58:43', 0),
(166, 'New, fix, Close', '', b'1', 68, '2013-02-21 10:58:43', 0),
(167, 'Test the application', '', b'1', 69, '2013-02-21 10:58:43', 0),
(168, 'He will do coading', '', b'1', 69, '2013-02-21 10:58:43', 0),
(169, 'He will do desing', '', b'1', 69, '2013-02-21 10:58:43', 0),
(170, 'asd', '', b'1', 70, '2013-03-22 13:59:08', 0),
(171, '23', '', b'1', 70, '2013-03-22 13:59:09', 0),
(198, '1', '', b'1', 81, '2013-04-04 13:22:14', 0),
(199, '2', '', b'1', 81, '2013-04-04 13:22:14', 0),
(200, '3', '', b'1', 81, '2013-04-04 13:22:14', 0),
(201, '4', '', b'1', 81, '2013-04-04 13:22:14', 0),
(202, '1', '', b'1', 82, '2013-04-04 13:22:14', 0),
(203, '2', '', b'1', 82, '2013-04-04 13:22:14', 0),
(204, '3', '', b'1', 82, '2013-04-04 13:22:14', 0),
(205, 'R1', '', b'1', 83, '2013-04-04 13:22:15', 0),
(206, 'R2', '', b'1', 83, '2013-04-04 13:22:15', 0),
(207, 'R3', '', b'1', 83, '2013-04-04 13:22:15', 0),
(208, '1', 'A', b'1', 84, '2013-04-04 13:22:15', 0),
(209, '2', 'B', b'1', 84, '2013-04-04 13:22:15', 0),
(210, '3', 'C', b'1', 84, '2013-04-04 13:22:15', 0),
(211, '12', '', b'1', 85, '2013-04-04 13:22:15', 0),
(212, '13', '', b'1', 85, '2013-04-04 13:22:15', 0),
(213, '14', '', b'1', 85, '2013-04-04 13:22:15', 0),
(232, '1', '', b'1', 91, '2013-04-05 07:46:23', 0),
(233, '2', '', b'1', 91, '2013-04-05 07:46:23', 0),
(234, '3', '', b'1', 91, '2013-04-05 07:46:23', 0),
(235, '4', '', b'1', 91, '2013-04-05 07:46:23', 0),
(236, '3', '', b'1', 92, '2013-04-05 07:46:24', 0),
(237, '4', '', b'1', 92, '2013-04-05 07:46:24', 0),
(238, '5', '', b'1', 92, '2013-04-05 07:46:24', 0),
(239, '2', '', b'1', 92, '2013-04-05 07:46:24', 0),
(240, '3', 'Three', b'1', 93, '2013-04-05 07:46:24', 0),
(241, '4', 'four', b'1', 93, '2013-04-05 07:46:24', 0),
(242, '5', 'five', b'1', 93, '2013-04-05 07:46:24', 0),
(243, '4', '', b'1', 94, '2013-04-05 07:46:24', 0),
(244, '5', '', b'1', 94, '2013-04-05 07:46:24', 0),
(245, '6', '', b'1', 94, '2013-04-05 07:46:24', 0),
(246, '6', '', b'1', 95, '2013-04-05 07:46:24', 0),
(247, '5', '', b'1', 95, '2013-04-05 07:46:24', 0),
(248, '8', '', b'1', 95, '2013-04-05 07:46:24', 0),
(249, '9', '', b'1', 95, '2013-04-05 07:46:24', 0),
(250, '2', '', b'1', 96, '2013-04-05 11:22:22', 0),
(251, '1', '', b'1', 96, '2013-04-05 11:22:22', 0),
(252, '3', '', b'1', 96, '2013-04-05 11:22:22', 0),
(253, '4', '', b'1', 96, '2013-04-05 11:22:22', 0),
(254, '2', '', b'1', 97, '2013-04-05 11:22:23', 0),
(255, '3', '', b'1', 97, '2013-04-05 11:22:23', 0),
(256, '2', '', b'1', 97, '2013-04-05 11:22:23', 0),
(257, '5', '', b'1', 97, '2013-04-05 11:22:23', 0),
(258, '3', 'Three', b'1', 98, '2013-04-05 11:22:23', 0),
(259, '4', 'four', b'1', 98, '2013-04-05 11:22:23', 0),
(260, '5', 'five', b'1', 98, '2013-04-05 11:22:23', 0),
(261, '1', '', b'1', 99, '2013-04-05 11:22:23', 0),
(262, '2', '', b'1', 99, '2013-04-05 11:22:23', 0),
(263, '3', '', b'1', 99, '2013-04-05 11:22:23', 0),
(264, '4', '', b'1', 99, '2013-04-05 11:22:23', 0),
(265, '1', '', b'1', 100, '2013-04-06 08:15:02', 0),
(266, '2', '', b'1', 100, '2013-04-06 08:15:02', 0),
(267, '3', '', b'1', 100, '2013-04-06 08:15:02', 0),
(268, '4', '', b'1', 100, '2013-04-06 08:15:02', 0),
(269, '1', '', b'1', 101, '2013-04-06 08:15:02', 0),
(270, '2', '', b'1', 101, '2013-04-06 08:15:02', 0),
(271, '3', '', b'1', 101, '2013-04-06 08:15:02', 0),
(272, '4', '', b'1', 101, '2013-04-06 08:15:03', 0),
(273, '', '', b'1', 102, '2013-04-06 08:15:03', 0),
(274, '1', 'A', b'1', 103, '2013-04-06 08:15:03', 0),
(275, '2', 'B', b'1', 103, '2013-04-06 08:15:03', 0),
(276, '3', 'C', b'1', 103, '2013-04-06 08:15:03', 0),
(277, '4', 'D', b'1', 103, '2013-04-06 08:15:03', 0),
(278, '1', '', b'1', 104, '2013-04-06 08:15:03', 0),
(279, '2', '', b'1', 104, '2013-04-06 08:15:03', 0),
(280, '3', '', b'1', 104, '2013-04-06 08:15:03', 0),
(281, '4', '', b'1', 104, '2013-04-06 08:15:03', 0),
(301, 'two', '', b'1', 110, '2013-04-08 09:08:37', 0),
(302, 'three', '', b'1', 110, '2013-04-08 09:08:37', 0),
(303, 'one', '', b'1', 110, '2013-04-08 09:08:37', 0),
(304, 'five', '', b'1', 110, '2013-04-08 09:08:37', 0),
(305, 'three', '', b'1', 111, '2013-04-08 09:08:37', 0),
(306, 'two', '', b'1', 111, '2013-04-08 09:08:37', 0),
(307, 'five', '', b'1', 111, '2013-04-08 09:08:37', 0),
(308, 'two', '', b'1', 111, '2013-04-08 09:08:38', 0),
(309, 'one', '1', b'1', 112, '2013-04-08 09:08:38', 0),
(310, 'two', '2', b'1', 112, '2013-04-08 09:08:38', 0),
(311, 'three', '3', b'1', 112, '2013-04-08 09:08:38', 0),
(312, 'three', '', b'1', 113, '2013-04-08 09:08:38', 0),
(313, 'four', '', b'1', 113, '2013-04-08 09:08:38', 0),
(314, 'five', '', b'1', 113, '2013-04-08 09:08:38', 0),
(315, 'six', '', b'1', 113, '2013-04-08 09:08:38', 0),
(316, '2', 'two', b'1', 114, '2013-04-08 09:08:38', 0),
(317, '3', 'three', b'1', 114, '2013-04-08 09:08:38', 0),
(318, '4', 'four', b'1', 114, '2013-04-08 09:08:38', 0),
(319, '5', 'five', b'1', 114, '2013-04-08 09:08:38', 0),
(320, 'two', '', b'1', 115, '2013-04-08 09:10:30', 0),
(321, 'three', '', b'1', 115, '2013-04-08 09:10:30', 0),
(322, 'one', '', b'1', 115, '2013-04-08 09:10:30', 0),
(323, 'five', '', b'1', 115, '2013-04-08 09:10:30', 0),
(324, 'three', '', b'1', 116, '2013-04-08 09:10:30', 0),
(325, 'two', '', b'1', 116, '2013-04-08 09:10:30', 0),
(326, 'five', '', b'1', 116, '2013-04-08 09:10:30', 0),
(327, 'two', '', b'1', 116, '2013-04-08 09:10:30', 0),
(328, 'one', '1', b'1', 117, '2013-04-08 09:10:31', 0),
(329, 'two', '2', b'1', 117, '2013-04-08 09:10:31', 0),
(330, 'three', '3', b'1', 117, '2013-04-08 09:10:31', 0),
(331, 'three', '', b'1', 118, '2013-04-08 09:10:31', 0),
(332, 'four', '', b'1', 118, '2013-04-08 09:10:31', 0),
(333, 'five', '', b'1', 118, '2013-04-08 09:10:31', 0),
(334, 'six', '', b'1', 118, '2013-04-08 09:10:31', 0),
(335, '2', 'two', b'1', 119, '2013-04-08 09:10:31', 0),
(336, '3', 'three', b'1', 119, '2013-04-08 09:10:31', 0),
(337, '4', 'four', b'1', 119, '2013-04-08 09:10:31', 0),
(338, '5', 'five', b'1', 119, '2013-04-08 09:10:31', 0),
(339, '1', '', b'1', 120, '2013-04-08 12:16:41', 0),
(340, '2', '', b'1', 120, '2013-04-08 12:16:41', 0),
(341, '3', '', b'1', 120, '2013-04-08 12:16:41', 0),
(342, '4', '', b'1', 120, '2013-04-08 12:16:41', 0),
(343, '4', '', b'1', 121, '2013-04-09 06:38:02', 0),
(344, '3', '', b'1', 121, '2013-04-09 06:38:02', 0),
(345, '2', '', b'1', 121, '2013-04-09 06:38:02', 0),
(346, '1', '', b'1', 121, '2013-04-09 06:38:02', 0),
(347, '2', '', b'1', 122, '2013-04-09 06:38:03', 0),
(348, '3', '', b'1', 122, '2013-04-09 06:38:03', 0),
(349, '2', '', b'1', 122, '2013-04-09 06:38:03', 0),
(350, '4', '', b'1', 122, '2013-04-09 06:38:03', 0),
(351, '1', 'One', b'1', 123, '2013-04-09 06:38:03', 0),
(352, '2', 'Two', b'1', 123, '2013-04-09 06:38:03', 0),
(353, '3', 'Three', b'1', 123, '2013-04-09 06:38:03', 0),
(354, '4', 'Four', b'1', 123, '2013-04-09 06:38:03', 0),
(355, '1', '', b'1', 124, '2013-04-09 06:38:03', 0),
(356, '2', '', b'1', 124, '2013-04-09 06:38:03', 0),
(357, '3', '', b'1', 124, '2013-04-09 06:38:03', 0),
(358, '4', '', b'1', 124, '2013-04-09 06:38:03', 0),
(359, '5', '', b'1', 125, '2013-04-09 06:38:03', 0),
(360, '4', '', b'1', 125, '2013-04-09 06:38:03', 0),
(361, '3', '', b'1', 125, '2013-04-09 06:38:03', 0),
(362, '2', '', b'1', 125, '2013-04-09 06:38:04', 0),
(363, '1', '', b'1', 125, '2013-04-09 06:38:04', 0),
(364, '2', '', b'1', 126, '2013-04-09 07:06:38', 0),
(365, '3', '', b'1', 126, '2013-04-09 07:06:38', 0),
(366, '2', '', b'1', 126, '2013-04-09 07:06:38', 0),
(367, '4', '', b'1', 126, '2013-04-09 07:06:38', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `code`, `logo`, `date_created`, `status`) VALUES
(2, 'PHP', 'php', '', '2012-11-22 16:58:55', 0),
(11, 'PHP', 'php', '', '2012-11-22 16:58:55', 0),
(12, 'xml', '1', '', '2013-04-02 08:03:17', 1),
(13, 'HTML', '2', '', '2013-04-02 08:14:58', 1),
(14, 'satya', '88881111', '', '2013-04-02 10:07:59', 1),
(15, 'Testing', 'Testing', '', '2013-04-02 10:20:52', 1),
(16, 'Java', 'java1', '', '2013-04-04 06:39:02', 1),
(17, 'Css', 'css1', '', '2013-04-04 06:45:52', 0),
(18, 'Bootstrap', 'boot1', '', '2013-04-04 06:46:05', 1),
(19, 'Jquery', 'jquery1', '', '2013-04-04 06:46:19', 1),
(20, 'JS', 'js1', '', '2013-04-04 06:46:47', 1),
(21, 'Oracle', 'ora1', '', '2013-04-04 06:47:22', 1),
(22, 'Dot net', 'dot1', '', '2013-04-04 06:48:24', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=287 ;

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
(153, '010ESHUAYLUYZYZH', 13, 1, 2, '1'),
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
(236, 'HTM4G1T6G8QT3GGT', 13, 3, NULL, '1'),
(237, 'YMPKPAWUTD459MS5', 16, 1, NULL, '1'),
(238, 'YMPKPAWUTD459MS5', 16, 2, NULL, '1'),
(239, 'YMPKPAWUTD459MS5', 16, 3, NULL, '1'),
(240, 'HM3D5CY6055ARVR9', 16, 1, NULL, '1'),
(241, 'HM3D5CY6055ARVR9', 16, 2, NULL, '1'),
(242, 'HM3D5CY6055ARVR9', 16, 3, NULL, '1'),
(243, 'KHFKSVLM4ZPEYFC7', 16, 1, NULL, '1'),
(244, 'KHFKSVLM4ZPEYFC7', 16, 2, NULL, '1'),
(245, 'KHFKSVLM4ZPEYFC7', 16, 3, NULL, '1'),
(246, 'HU9SJFL6F4D3DD0O', 16, 1, NULL, '1'),
(247, 'HU9SJFL6F4D3DD0O', 16, 2, NULL, '1'),
(248, 'HU9SJFL6F4D3DD0O', 16, 3, NULL, '1'),
(249, 'S4RKK1HGID1SF6', 16, 1, NULL, '1'),
(250, 'S4RKK1HGID1SF6', 16, 2, NULL, '1'),
(251, 'S4RKK1HGID1SF6', 16, 3, NULL, '1'),
(252, 'OWOIKZ527Y2OWQ89', 16, 1, NULL, '1'),
(253, 'OWOIKZ527Y2OWQ89', 16, 2, NULL, '1'),
(254, 'OWOIKZ527Y2OWQ89', 16, 3, NULL, '1'),
(255, '59NSHERHYSI161KI', 16, 1, NULL, '1'),
(256, '59NSHERHYSI161KI', 16, 2, NULL, '1'),
(257, '59NSHERHYSI161KI', 16, 3, NULL, '1'),
(258, 'E57RAZBE3VS65B6P', 16, 1, NULL, '1'),
(259, 'E57RAZBE3VS65B6P', 16, 2, NULL, '1'),
(260, 'E57RAZBE3VS65B6P', 16, 3, NULL, '1'),
(261, 'JRG8CBH5PU9HY67', 16, 1, NULL, '1'),
(262, 'JRG8CBH5PU9HY67', 16, 2, NULL, '1'),
(263, 'JRG8CBH5PU9HY67', 16, 3, NULL, '1'),
(264, 'MYGT82ZL69LYD38S', 16, 1, NULL, '1'),
(265, 'MYGT82ZL69LYD38S', 16, 2, NULL, '1'),
(266, 'MYGT82ZL69LYD38S', 16, 3, NULL, '1'),
(267, 'RGN79Q0K6IQKEICV', 17, 1, NULL, '1'),
(268, 'FEZHAC0NK7BF6HM4', 17, 1, NULL, '1'),
(269, 'PMPNPXA6DL5LAAA', 17, 1, NULL, '1'),
(270, 'IB53MJ4GLZQRAGBU', 17, 1, NULL, '1'),
(271, '7J94YS7VGDH98X7N', 17, 1, NULL, '1'),
(272, 'CEWD11W0NFF8K5HD', 17, 1, NULL, '1'),
(273, 'UZABDR00FZNB9VA', 17, 1, NULL, '1'),
(274, '6DPZ9XJMB93UYZN', 17, 1, NULL, '1'),
(275, 'LVGDQY1UK8XAS1N', 17, 1, NULL, '1'),
(276, 'VGOQZW18XVJMIG1', 18, 3, NULL, '1'),
(277, 'UQ54X2UXGEG8EDP', 17, 3, NULL, '1'),
(278, 'CDIF1YNZWTJKT6N', 22, 1, 2, '0'),
(279, 'MQXOT5BQCOYMPZEM', 22, 1, NULL, '1'),
(280, 'RF6G5AQOUM33T4D', 22, 1, NULL, '1'),
(281, 'S7AH12I3BTTVXO4G', 22, 1, NULL, '1'),
(282, 'WC83954T61J1O', 22, 1, 3, '0'),
(283, '5SSJC0VOI5SSKVE', 25, 1, NULL, '1'),
(284, 'LEN2OXAUCWJBXJM', 26, 1, NULL, '1'),
(285, 'NQC7RUCYA1Y68XG', 26, 1, NULL, '1'),
(286, 'SCVH4IC2PQ5NEW', 29, 1, NULL, '1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `test_id`, `question_type`, `level_id`, `date_created`, `status`, `question`) VALUES
(1, 13, 0, 1, '2012-11-24 17:26:59', 0, 'is_array is a function in PHP'),
(3, 14, 0, 1, '2012-11-24 17:27:41', 0, 'is_array is a function in PHP'),
(4, 14, 0, 1, '2012-11-24 17:27:41', 0, 'Template Frameworks for PHP'),
(20, 16, 0, 1, '2013-01-15 18:26:22', 0, 'MC'),
(21, 16, 1, 1, '2013-01-15 18:26:23', 0, 'MR'),
(22, 16, 2, 1, '2013-01-15 18:26:23', 0, 'TF'),
(23, 16, 4, 1, '2013-01-15 18:26:23', 0, 'Ma'),
(24, 16, 5, 1, '2013-01-15 18:26:24', 0, 'Seq'),
(50, 15, 2, 1, '2013-02-13 07:37:53', 0, 'c'),
(51, 15, 0, 1, '2013-02-13 07:37:53', 0, 'Template Frameworks for PHP'),
(52, 15, 1, 1, '2013-02-13 07:37:53', 0, 'Functions available in PHP'),
(53, 15, 4, 1, '2013-02-13 07:37:53', 0, 'Match the following'),
(54, 15, 5, 1, '2013-02-13 07:37:54', 0, 'Sequencing'),
(55, 17, 0, 1, '2013-02-21 07:19:21', 0, 'Apple spelling'),
(56, 17, 0, 1, '2013-02-21 07:19:22', 0, 'what is software testing?'),
(57, 17, 0, 1, '2013-02-21 07:19:23', 0, 'What is Bug life cycle'),
(58, 17, 2, 1, '2013-02-21 07:19:23', 0, 'Smoke testing is nothing but, testing the primary functionality of the application'),
(59, 18, 0, 1, '2013-02-21 07:26:39', 0, 'Who will test the application?'),
(60, 18, 2, 1, '2013-02-21 07:26:39', 0, 'Developer will not test the application'),
(61, 18, 0, 1, '2013-02-21 07:26:39', 0, 'who is tester'),
(62, 18, 2, 1, '2013-02-21 07:26:39', 0, 'developer will test the application'),
(63, 19, 0, 1, '2013-02-21 07:46:20', 0, 'Who is good tester'),
(64, 19, 2, 1, '2013-02-21 07:46:20', 0, 'tester will test application only, he will not involve into coading'),
(65, 19, 2, 1, '2013-02-21 07:46:20', 0, 'Testing means finding bugs'),
(66, 19, 1, 1, '2013-02-21 07:46:20', 0, 'SDLC Phases'),
(67, 20, 0, 1, '2013-02-21 10:58:43', 0, 'Testing is what?'),
(68, 20, 0, 1, '2013-02-21 10:58:43', 0, 'Bug life cycle'),
(69, 20, 0, 1, '2013-02-21 10:58:43', 0, 'what tester will do?'),
(70, 21, 0, 1, '2013-03-22 13:59:08', 0, 'Welcome'),
(81, 24, 1, 1, '2013-04-04 13:22:14', 0, 'Welcome'),
(82, 24, 0, 1, '2013-04-04 13:22:14', 0, 'MC'),
(83, 24, 1, 1, '2013-04-04 13:22:14', 0, 'MR'),
(84, 24, 4, 1, '2013-04-04 13:22:15', 0, 'match'),
(85, 24, 5, 1, '2013-04-04 13:22:15', 0, 'S'),
(91, 25, 0, 1, '2013-04-05 07:46:23', 0, 'One'),
(92, 25, 0, 1, '2013-04-05 07:46:23', 0, 'Two'),
(93, 25, 4, 1, '2013-04-05 07:46:24', 0, 'Three'),
(94, 25, 5, 1, '2013-04-05 07:46:24', 0, 'four'),
(95, 25, 0, 1, '2013-04-05 07:46:24', 0, 'Five'),
(96, 26, 0, 1, '2013-04-05 11:22:22', 0, 'one'),
(97, 26, 1, 1, '2013-04-05 11:22:23', 0, 'two'),
(98, 26, 4, 1, '2013-04-05 11:22:23', 0, 'three'),
(99, 26, 5, 1, '2013-04-05 11:22:23', 0, 'four'),
(100, 27, 0, 1, '2013-04-06 08:15:02', 0, 'MC'),
(101, 27, 1, 1, '2013-04-06 08:15:02', 0, 'MR'),
(102, 27, 2, 1, '2013-04-06 08:15:03', 0, 'TF'),
(103, 27, 4, 1, '2013-04-06 08:15:03', 0, 'Match'),
(104, 27, 5, 1, '2013-04-06 08:15:03', 0, 'Seq'),
(110, 29, 0, 1, '2013-04-08 09:08:37', 0, '1'),
(111, 29, 1, 1, '2013-04-08 09:08:37', 0, '2'),
(112, 29, 4, 1, '2013-04-08 09:08:38', 0, '3'),
(113, 29, 5, 1, '2013-04-08 09:08:38', 0, '4'),
(114, 29, 4, 1, '2013-04-08 09:08:38', 0, '5'),
(115, 28, 0, 1, '2013-04-08 09:10:30', 0, '1'),
(116, 28, 1, 1, '2013-04-08 09:10:30', 0, '2'),
(117, 28, 4, 1, '2013-04-08 09:10:31', 0, '3'),
(118, 28, 5, 1, '2013-04-08 09:10:31', 0, '4'),
(119, 28, 4, 1, '2013-04-08 09:10:31', 0, '5'),
(120, 30, 0, 1, '2013-04-08 12:16:41', 0, 'MC'),
(121, 31, 0, 1, '2013-04-09 06:38:02', 0, 'One'),
(122, 31, 1, 1, '2013-04-09 06:38:02', 0, 'Two'),
(123, 31, 4, 1, '2013-04-09 06:38:03', 0, 'Three'),
(124, 31, 5, 1, '2013-04-09 06:38:03', 0, 'four'),
(125, 31, 5, 1, '2013-04-09 06:38:03', 0, 'Five'),
(126, 32, 1, 1, '2013-04-09 07:06:38', 0, 'two');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `score` decimal(10,0) NOT NULL,
  `test_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `test_time` int(11) NOT NULL DEFAULT '0',
  `total_questions` int(11) NOT NULL DEFAULT '0',
  `correct_answers` int(11) NOT NULL DEFAULT '0',
  `status` char(1) DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_scores` (`test_id`),
  KEY `idx_scores_0` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `score`, `test_id`, `user_id`, `test_time`, `total_questions`, `correct_answers`, `status`, `add_date`) VALUES
(2, 9, 15, 1, 0, 5, 4, '1', '2013-01-15 06:57:49'),
(3, 0, 17, 1, 0, 4, 0, '1', '2013-02-21 07:47:48'),
(4, 0, 18, 1, 0, 4, 0, '1', '2013-02-21 07:48:49'),
(5, 1, 19, 1, 0, 4, 1, '1', '2013-02-21 07:50:16'),
(6, 2, 20, 1, 0, 3, 2, '1', '2013-02-21 10:59:36'),
(7, 7, 24, 1, 44, 5, 5, '1', '2013-04-04 13:02:31'),
(8, 5, 25, 1, 137, 5, 3, '1', '2013-04-05 07:43:29'),
(9, 1, 13, 2, 4, 1, 1, '1', '2013-04-05 10:51:55'),
(10, 5, 26, 1, 38, 4, 2, '1', '2013-04-05 11:25:23'),
(11, 8, 27, 1, 74, 5, 5, '1', '2013-04-08 09:02:53'),
(12, 7, 28, 1, 49, 5, 3, '1', '2013-04-08 09:11:45'),
(13, 1, 30, 1, 3, 1, 1, '1', '2013-04-08 12:17:02'),
(14, 10, 31, 1, 56, 5, 3, '1', '2013-04-09 06:38:58'),
(15, 1, 32, 1, 6, 1, 1, '1', '2013-04-09 07:06:52');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `test_details`
--

INSERT INTO `test_details` (`id`, `category`, `name`, `description`, `instruction`, `logo`, `time_taken`, `date_created`, `created_by`, `last_modified`, `valid_from`, `valid_to`, `allow_correction`, `sharing`, `status`) VALUES
(3, 11, 'Sample test', 'Description for test', NULL, '', 15, '2012-11-22 16:59:26', 1, '2013-04-04 18:30:00', '0000-00-00', '0000-00-00', 0, 0, 0),
(13, 2, 'Basic', 'Basic test', NULL, '', 30, '2012-11-24 17:26:59', 1, '2013-04-04 18:30:00', '0000-00-00', '0000-00-00', 0, 0, 0),
(14, 2, 'Basic', 'Basic test', NULL, '', 30, '2012-11-24 17:27:41', 1, '2013-04-04 18:30:00', '0000-00-00', '0000-00-00', 0, 0, 0),
(15, 2, 'Basic', 'Basic test', NULL, '', 30, '2012-11-24 17:28:23', 1, '2013-04-04 18:30:00', '2013-11-30', '2013-01-10', 0, 0, 0),
(16, 2, 'Basic clone', '<br>asd<br>asd<br>asd<br>asd<br>asd<br>asd<br>sd', NULL, '', 10, '2013-01-14 18:30:00', 1, '2013-04-04 18:30:00', '2013-01-15', '2013-01-15', 0, 0, 0),
(17, 2, 'Test One', 'It is a good test', NULL, '', 10, '2013-02-20 18:30:00', 1, '2013-04-04 18:30:00', '2013-02-21', '2013-02-21', 0, 0, 0),
(18, 2, 'Test Two', 'Ok', NULL, '', 10, '2013-02-20 18:30:00', 1, '2013-04-04 18:30:00', '2013-02-21', '2013-02-21', 0, 0, 0),
(19, 2, 'Test Three', 'Ok', NULL, '', 10, '2013-02-20 18:30:00', 1, '2013-04-04 18:30:00', '2013-02-21', '2013-02-21', 0, 0, 0),
(20, 2, 'Test Four', 'Ok', NULL, '', 10, '2013-02-20 18:30:00', 1, '2013-04-04 18:30:00', '2013-02-21', '2013-02-21', 0, 0, 0),
(21, 11, 'Basic', '', NULL, '', 0, '2013-03-21 18:30:00', 1, '2013-04-04 18:30:00', '2013-03-22', '2013-03-22', 0, 0, 0),
(22, 15, 'My Test', 'Ok', NULL, '', 10, '2013-04-01 18:30:00', 1, '2013-04-03 18:30:00', '2013-04-02', '2013-04-02', 0, 1, 0),
(23, 11, 'Sample test', 'Description for test', NULL, '', 15, '2013-04-02 18:30:00', 1, '2013-04-04 18:30:00', '0000-00-00', '0000-00-00', 0, 0, 0),
(24, 2, 'Basicasd', 'asadasd', NULL, '', 2, '2013-04-03 18:30:00', 1, '2013-04-04 18:30:00', '2013-04-04', '2013-04-04', 0, 0, 0),
(25, 15, 'Satya5413', '<b>ok</b>', NULL, '', 3, '2013-04-04 18:30:00', 1, '2013-04-04 18:30:00', '2013-04-05', '2013-04-05', 0, 0, 0),
(26, 14, 'Satya5413', 'ok', NULL, '', 2, '2013-04-04 18:30:00', 1, '0000-00-00 00:00:00', '2013-04-05', '2013-04-05', 0, 1, 1),
(27, 15, 'Sundar Test', 'Test Sample', NULL, '', 15, '2013-04-05 18:30:00', 1, '0000-00-00 00:00:00', '2013-04-06', '2013-04-06', 0, 0, 1),
(28, 13, 'satya8413', 'Ok', NULL, '', 2, '2013-04-07 18:30:00', 1, '2013-04-07 18:30:00', '2013-04-08', '2013-04-08', 0, 0, 1),
(29, 13, 'satya8413', 'Ok', NULL, '', 2, '2013-04-07 18:30:00', 1, '2013-04-07 18:30:00', '2013-04-08', '2013-04-08', 0, 1, 0),
(30, 12, 'PHP', 'asdasdasd', NULL, '', 15, '2013-04-07 18:30:00', 1, '0000-00-00 00:00:00', '2013-04-08', '2013-04-08', 0, 0, 1),
(31, 13, 'satya9413', 'Ok Proceed', NULL, '', 2, '2013-04-08 18:30:00', 1, '0000-00-00 00:00:00', '2013-04-09', '2013-04-09', 0, 1, 1),
(32, 13, 'satya9413/2', 'ok', NULL, '', 2, '2013-04-08 18:30:00', 1, '2013-04-08 18:30:00', '2013-04-09', '2013-04-09', 0, 0, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `__users`
--

INSERT INTO `__users` (`id`, `name`, `emp_code`, `email`, `phone`, `user_type`, `username`, `password`) VALUES
(1, 'Sundar', '001', 'meenakshi.sun20@gmail.com', '9841673880', 1, 'admin', '0192023a7bbd73250516f069df18b500'),
(2, 'Satyam', '1120', 'sdonthi@sphata.com', '9994426636', 2, 'satyam', '0f2cdafc6b1adf94892b17f355bd9110'),
(3, 'Jithendra', '1142', 'jpuchareddy@sphata.com', '9543079409', 2, 'jithu', 'da7299d750f16fc62f6c4abd7c3af8e7');

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
