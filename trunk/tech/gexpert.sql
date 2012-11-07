-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 07, 2012 at 02:03 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


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
  `answer_hint` varchar(5000) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  `question_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `percent` int(11) NOT NULL,
  UNIQUE KEY `pk_answers` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--


-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `code` varchar(150) NOT NULL,
  `logo` varchar(1500) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `code`, `logo`, `date_created`, `status`) VALUES
(2, 'G.M.Sundar', 'INR', '', '2012-11-07 11:59:12', 1),
(3, 'G.M.Sundar', 'INR', '', '2012-11-07 12:10:31', 1),
(4, 'G.M.Sundar', 'INR', '', '2012-11-07 12:10:56', 1),
(5, 'G.M.Sundar', 'INR', '', '2012-11-07 12:14:20', 1),
(6, 'Sundar', 'USD', '', '2012-11-07 15:05:14', 1),
(7, 'Sundar', 'USD', '', '2012-11-07 15:23:07', 1),
(8, 'Sundar', 'USD', '', '2012-11-07 15:49:58', 1),
(9, 'G.M.Sundar', 'asdasd', '', '2012-11-07 15:50:06', 1),
(10, 'G.M.Sundar', 'asdasd', '', '2012-11-07 15:50:34', 1),
(11, 'G.M.Sundar', 'asdasd', '', '2012-11-07 15:51:16', 1),
(12, 'Sundar', 'asdasd', '', '2012-11-07 15:54:42', 1),
(13, 'JAVA', 'Java', '', '2012-11-07 15:54:49', 1),
(14, 'JAVA', 'asdasd', '', '2012-11-07 15:55:27', 1),
(15, 'JAVA', 'asdasd', '', '2012-11-07 15:56:35', 1),
(16, 'JAVA', 'asdasd', '', '2012-11-07 15:56:49', 1),
(17, 'JAVA', 'asdasd', '', '2012-11-07 15:57:15', 1),
(18, 'JAVA', 'asdasd', '', '2012-11-07 15:58:03', 1),
(19, 'JAVA', 'asdasd', '', '2012-11-07 15:58:20', 1),
(20, 'JAVA', 'asdasd', '', '2012-11-07 15:58:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `question_type` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `question` varchar(1500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pk_questions_0` (`test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `questions`
--


-- --------------------------------------------------------

--
-- Table structure for table `test_details`
--

CREATE TABLE IF NOT EXISTS `test_details` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category` (`category`),
  UNIQUE KEY `created_by` (`created_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_details`
--


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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `__login`
--


-- --------------------------------------------------------

--
-- Table structure for table `__users`
--

CREATE TABLE IF NOT EXISTS `__users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `emp_code` varchar(150) NOT NULL,
  `email` varchar(500) NOT NULL,
  `login` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `__users`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `__users`
--
ALTER TABLE `__users`
  ADD CONSTRAINT `__users_ibfk_1` FOREIGN KEY (`id`) REFERENCES `__login` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
