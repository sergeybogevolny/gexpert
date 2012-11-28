-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2012 at 02:02 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `test_details`
--

INSERT INTO `test_details` (`id`, `category`, `name`, `description`, `instruction`, `logo`, `time_taken`, `date_created`, `created_by`, `last_modified`, `valid_from`, `valid_to`, `status`) VALUES
(3, 11, 'Sample test', 'Description for test', NULL, '', 15, '2012-11-22 16:59:26', 1, '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 0),
(13, 2, 'Basic', 'Basic test', NULL, '', 30, '2012-11-24 17:26:59', 1, '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 0),
(14, 2, 'Basic', 'Basic test', NULL, '', 30, '2012-11-24 17:27:41', 1, '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 0),
(15, 2, 'Basic', 'Basic test', NULL, '', 30, '2012-11-24 17:28:23', 1, '0000-00-00 00:00:00', '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `__login`
--

CREATE TABLE IF NOT EXISTS `__login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `last_login` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx___login` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `__users`
--

INSERT INTO `__users` (`id`, `name`, `emp_code`, `email`, `phone`) VALUES
(1, 'Sundar', '001', 'meenakshi.sun20@gmail.com', '9841673880');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `fk_answers` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_questions` FOREIGN KEY (`test_id`) REFERENCES `test_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `test_details`
--
ALTER TABLE `test_details`
  ADD CONSTRAINT `fk_test_details` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_test_details_0` FOREIGN KEY (`created_by`) REFERENCES `__users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `__login`
--
ALTER TABLE `__login`
  ADD CONSTRAINT `fk___login` FOREIGN KEY (`user_id`) REFERENCES `__users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
