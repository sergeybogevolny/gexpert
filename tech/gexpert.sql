-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2012 at 10:33 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

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
  `test_user_id` int(11) DEFAULT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `idx_product_key_test_users` (`test_user_id`),
  KEY `idx_product_key_test_users_0` (`test_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `product_key_test_users`
--

INSERT INTO `product_key_test_users` (`id`, `product_key`, `test_id`, `test_user_id`, `status`) VALUES
(7, 'RL6DL9CCPW2Z6XU3', 15, NULL, '1'),
(8, 'OZN9MWQFR8LOD4FV', 15, NULL, '1'),
(9, 'Y2BZ62ZEW1PON08F', 15, NULL, '1'),
(10, '6S2L3O1BARLBP86L', 15, NULL, '1'),
(11, 'KV2H4N6BMGWFDWQ9', 15, 11, '1'),
(12, 'IEL4DZ3B9Q13G4CB', 15, NULL, '1'),
(13, '2URKEFYM6KPYCUQX', 15, NULL, '1'),
(14, '9XPUR2ZBOPEPYF06', 15, NULL, '1'),
(15, 'WNDZI4ODF6I0EP5T', 15, NULL, '1'),
(16, 'DAYMU6A3BW0SWA2', 15, NULL, '1'),
(17, 'VP955MIZ1PIA2C1', 15, NULL, '1'),
(18, 'K8TTCEBMYVRUF7TT', 15, NULL, '1'),
(19, 'UO3EASQKPBO1ZDRR', 15, NULL, '1'),
(20, 'ZTFGOEGKCVVXD93', 15, NULL, '1'),
(21, 'VGXNPWV8C2T4N3OS', 15, NULL, '1'),
(22, '90K1BDX8M1XG2HW', 15, NULL, '1'),
(23, 'XSL7B8LM3J15PO41', 15, NULL, '1'),
(24, 'S8YF0WU9AZ02PT64', 15, NULL, '1'),
(25, '3UTRTOGDHNR6LLKF', 15, NULL, '1'),
(26, 'AW4JO0CAV3LZGQ5', 15, NULL, '1'),
(27, '07Y7W4DEJ8GOEK8A', 15, NULL, '1'),
(28, 'NXU5ICXX7EQRL3M1', 15, NULL, '1'),
(29, '25S4M100W77AIP0R', 15, NULL, '1'),
(30, 'IDQW6BUV0H26FL4', 3, NULL, '1'),
(31, 'R02ODRJVGP3VGJ1G', 3, NULL, '1'),
(32, 'Z3VSXBGEJK2G4DZ', 3, NULL, '1'),
(33, 'KJNXDYJ46GMSF5G', 3, NULL, '1'),
(34, '2B1S9JR2GIONH8LU', 3, NULL, '1'),
(35, '1Q4EQ8A526L1P9WI', 3, NULL, '1'),
(36, '113VI4GTDM7DTECE', 3, NULL, '1'),
(37, '93SV8BPXUOUZBOJ', 3, NULL, '1'),
(38, 'IT6FCARS80KG9SMY', 3, NULL, '1'),
(39, 'PY2GR4RBHLJDIWP8', 3, NULL, '1');

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
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `test_details`
--

INSERT INTO `test_details` (`id`, `category`, `name`, `description`, `instruction`, `logo`, `time_taken`, `date_created`, `created_by`, `last_modified`, `valid_from`, `valid_to`, `status`) VALUES
(3, 11, 'Sample test', 'Description for test', NULL, '', 15, '2012-11-22 16:59:26', 1, '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 0),
(13, 2, 'Basic', 'Basic test', NULL, '', 30, '2012-11-24 17:26:59', 1, '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 0),
(14, 2, 'Basic', 'Basic test', NULL, '', 30, '2012-11-24 17:27:41', 1, '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 0),
(15, 2, 'Basic', 'Basic test', NULL, '', 30, '2012-11-24 17:28:23', 1, '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 0),
(16, 2, '', '', NULL, '', 0, '2012-12-07 13:18:08', 1, '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `__users`
--

INSERT INTO `__users` (`id`, `name`, `emp_code`, `email`, `phone`, `user_type`, `username`, `password`) VALUES
(1, 'Sundar', '001', 'meenakshi.sun20@gmail.com', '9841673880', 1, 'test', '40be4e59b9a2a2b5dffb918c0e86b3d7'),
(11, 'Tamilarasan J', '00126', 'tamilarasanj@in.com', '09840176277', 1, 'tamil', '0937938b0449317df0ce0cb2bbcdad79');

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
