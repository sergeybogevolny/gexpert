-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2014 at 01:18 PM
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(3000) NOT NULL,
  `match_answer` varchar(5000) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT '0',
  `question_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `percent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pk_answers` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `match_answer`, `is_correct`, `question_id`, `date_created`, `percent`) VALUES
(51, 'Private Home Page', '', 0, 838, '2014-02-19 12:15:33', 0),
(52, 'Hypertext Preprocessor', '', 1, 838, '2014-02-19 12:15:33', 0),
(53, 'Personal Hypertext Processor', '', 0, 838, '2014-02-19 12:15:33', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `code`, `logo`, `date_created`, `status`) VALUES
(33, 'PHP Basic Test', 'php001', '', '2014-02-19 09:17:45', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=839 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `test_id`, `question_type`, `level_id`, `date_created`, `status`, `question`) VALUES
(838, 59, 0, 1, '2014-02-19 12:15:33', 0, 'What does PHP stand for?');

-- --------------------------------------------------------

--
-- Table structure for table `responses`
--

CREATE TABLE IF NOT EXISTS `responses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(15000) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `answers` text NOT NULL,
  `status` char(1) DEFAULT '1',
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_scores` (`test_id`),
  KEY `idx_scores_0` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `score`, `test_id`, `user_id`, `test_time`, `total_questions`, `correct_answers`, `answers`, `status`, `add_date`) VALUES
(1, 1, 58, 1, 6, 1, 1, '{"817":{"question":"What does PHP stand for?","score":1,"answers":{"PHP: Hypertext Preprocessor":true}}}', '1', '2014-02-19 09:20:16'),
(2, 1, 59, 1, 5, 1, 1, '{"838":{"question":"What does PHP stand for?","score":1,"answers":{"Hypertext Preprocessor":true}}}', '1', '2014-02-19 10:19:28');

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
  `total_marks` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `test_details`
--

INSERT INTO `test_details` (`id`, `category`, `name`, `description`, `instruction`, `logo`, `time_taken`, `date_created`, `created_by`, `last_modified`, `valid_from`, `valid_to`, `allow_correction`, `sharing`, `total_marks`, `status`) VALUES
(58, 33, 'PHP Basic Test', 'You can test your&nbsp;PHP&nbsp;skills with this&nbsp;Quiz. The test contains 20 questions', NULL, '', 20, '2014-02-18 18:30:00', 1, '2014-02-18 18:30:00', '2014-02-19', '2014-02-19', 0, 0, 1, 0),
(59, 33, 'PHP Basic Test', 'You can test your&nbsp;PHP&nbsp;skills with this&nbsp;Quiz. The test contains 20 questions', NULL, '', 20, '2014-02-18 18:30:00', 1, '2014-02-18 18:30:00', '2014-02-19', '2014-02-19', 0, 0, 1, 1),
(60, 33, 'PHP Basic Test', 'You can test your&nbsp;PHP&nbsp;skills with this&nbsp;Quiz. The test contains 20 questions', NULL, '', 20, '2014-02-18 18:30:00', 1, '2014-02-18 18:30:00', '2014-02-19', '2014-02-19', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `test_type`
--

CREATE TABLE IF NOT EXISTS `test_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `test_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `__companies`
--

CREATE TABLE IF NOT EXISTS `__companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `primary_user` int(11) NOT NULL,
  `add_date` date NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `primary_user` (`primary_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `__companies`
--

INSERT INTO `__companies` (`id`, `name`, `primary_user`, `add_date`, `status`) VALUES
(1, 'Megam Technologies', 1, '2013-05-23', '1');

-- --------------------------------------------------------

--
-- Table structure for table `__modules`
--

CREATE TABLE IF NOT EXISTS `__modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` varchar(250) NOT NULL,
  `add_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `__modules`
--

INSERT INTO `__modules` (`id`, `code`, `name`, `add_date`) VALUES
(1, 'user management', 'User Management', '2013-05-23'),
(2, 'testmanager', 'Test Manager', '2013-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `__permissions`
--

CREATE TABLE IF NOT EXISTS `__permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `c` int(11) NOT NULL,
  `r` int(11) NOT NULL,
  `u` int(11) NOT NULL,
  `d` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `__permissions`
--

INSERT INTO `__permissions` (`id`, `c`, `r`, `u`, `d`) VALUES
(1, 0, 0, 0, 0),
(5, 0, 1, 0, 0),
(6, 0, 1, 0, 1),
(7, 0, 1, 1, 0),
(8, 0, 1, 1, 1),
(13, 1, 1, 0, 0),
(14, 1, 1, 0, 1),
(15, 1, 1, 1, 0),
(16, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `__sessions`
--

CREATE TABLE IF NOT EXISTS `__sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_name` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `__sessions`
--

INSERT INTO `__sessions` (`id`, `session_name`, `user_id`, `add_date`) VALUES
(2, '', 1, '2013-05-20 18:32:52'),
(3, '', 1, '2013-05-20 18:33:11'),
(4, '', 1, '2013-05-20 18:34:19'),
(5, '', 1, '2013-05-20 18:35:24'),
(6, '', 1, '2013-05-20 18:59:26'),
(7, '', 1, '2013-05-20 18:59:28'),
(8, '', 1, '2013-05-20 18:59:30'),
(9, '', 1, '2013-05-20 19:00:12'),
(10, 'cef14d574ee127180c708a3811a6ea67', 1, '2013-05-21 06:39:29'),
(11, 'b0999c913b591ba455279c96369d60fb', 1, '2013-05-23 10:14:18'),
(12, '08ac253b601a312e7ea0489d01b11555', 1, '2013-05-23 10:40:25'),
(13, 'e72bd0d017420a194aa1f6087b18ca25', 1, '2013-05-23 10:43:57'),
(14, '505a8fe97e2d3069a2cc4e7bf2f75e7e', 1, '2013-05-23 12:08:39'),
(15, '89121f8566babf1a857dc3431934c90e', 1, '2013-05-23 12:09:34'),
(16, 'bacabef9e707b87c7a067ad0ba05fa35', 1, '2013-05-23 12:29:30'),
(17, 'f1e4d353fbf1b652ef6f19738de83a65', 1, '2013-05-23 12:30:18'),
(18, '2cb5b623d68b93f922bdca3d58b3fbdd', 1, '2013-05-23 12:31:26'),
(19, '01550463de4f0d8eed90069de6c2f3ad', 1, '2013-05-23 12:32:51'),
(20, 'fb6564234276c2c0ef300900e2a3d09c', 1, '2013-05-23 12:33:59'),
(21, 'e247cfe6e92fd0b0f92e530c865da3d8', 1, '2013-05-23 12:34:59'),
(22, '3cbdddf5a2ec36bd3460b8c85f28f674', 1, '2013-05-23 12:37:01'),
(23, '9cbd9b1d43a820766beb0b2f0c1eaf4a', 1, '2013-05-23 12:41:55'),
(24, '255e7c5766f4c22a238bef8f801c589e', 1, '2013-05-23 12:42:55'),
(25, 'f93ae65b3e6c21a70d5fcd001756bdbe', 1, '2013-05-23 12:46:25'),
(26, 'bb67d0e5377416af5895039a87a2f6c7', 1, '2013-05-23 12:46:55'),
(27, '013d500eeeb3a4c490b093262a703f64', 1, '2013-05-23 12:51:02'),
(28, 'cd7a0f723cbbf158bd4a41b8b05e8810', 1, '2013-05-23 12:52:23'),
(29, '616e45cb09e98f5d3fa824c3897dae39', 1, '2013-05-23 17:00:40'),
(30, '62c66ed8af571ece26694b67d273fd49', 1, '2013-05-24 07:45:18'),
(31, 'a4fc17a66f1e13dbbf4f1578efc882b3', 1, '2013-05-24 11:51:40'),
(32, 'b008ee1d49c92b829f6744c27e4653ac', 1, '2013-05-24 13:14:10'),
(33, '8fb96a73efd9c1b874d4c9fa57ddc321', 1, '2013-05-25 13:10:22'),
(34, 'c4f187d1176f683fa699e2238bc3bd0c', 1, '2013-05-31 07:13:06'),
(35, 'c66fae73fc8321facee4a754277cf559', 1, '2013-05-31 09:58:08'),
(36, '0085abcbb4ab2253bb422112297fd3ab', 1, '2013-05-31 11:37:05'),
(37, 'a314d61a759f08979b48741e270fdaca', 1, '2013-06-03 06:58:48'),
(38, 'ca05827e0b4b58f131f222bb4fccd27c', 1, '2013-06-03 09:25:18'),
(39, 'cfa14782714c04c87d6aca17af664d9d', 1, '2013-06-10 05:42:36'),
(40, 'ab01e41601d37c33d3c2a08b15da1b87', 1, '2013-06-10 08:31:17'),
(41, '95fc8948011c4d208b6927a07d636ce5', 1, '2013-06-10 09:18:57'),
(42, 'b112cdbdae73ca559696aab6012b2af3', 1, '2013-06-10 09:20:47'),
(43, '27458fc52e1b5c514b1f994b916ddb45', 1, '2013-06-10 09:22:24'),
(44, '8fc9d080bb7b5744244e5c8d38713a66', 1, '2013-06-10 09:23:25'),
(45, 'b5589b346d67b951c3d7ee56faf32dc6', 1, '2013-06-10 13:54:24'),
(46, 'ea0374920f41139c3acf9a75ae8633bf', 1, '2013-06-11 08:00:58'),
(47, '93499f3e7f4e6ee35145f59c39cd38fe', 1, '2013-06-11 12:08:24'),
(48, '9def9b744ab7cd45d5a3932ba1bba798', 1, '2013-07-06 13:42:26'),
(49, 'b1c50b6bb770acddd67ecfec5ee1f557', 1, '2013-07-08 06:10:10'),
(50, 'a64578c8665aa0195c3630ef7bb87dee', 1, '2013-10-17 09:28:40'),
(51, 'ddfb415051024b4e47a949ed8d1b408c', 1, '2013-10-21 06:19:29'),
(52, 'd791de7083805f21d40d4b4671b24ac5', 1, '2013-10-22 06:28:43'),
(53, '1f2c52d33072df1a910083cce29c1948', 1, '2013-10-23 07:02:47'),
(54, '70d69d923dbdf8e41b3e4e20af4473fd', 1, '2013-10-30 11:08:58'),
(55, '7496f40c9f3cd527cbba5c546efb5333', 1, '2014-01-08 12:54:11'),
(56, 'a8acccd9a76e75fc185102522b4080b1', 1, '2014-01-08 14:19:28'),
(57, '7776ebbac7728e65e4c507bc6026d181', 1, '2014-02-11 06:17:05'),
(58, 'b59cd20d3e1ea3ad4955a925b8be2afe', 1, '2014-02-14 05:15:36'),
(59, '6f7d72f01bc9954acf9454bd0e20d048', 1, '2014-02-14 10:05:03'),
(60, '03fade73bc3956ea88f0b70e05f3f293', 1, '2014-02-17 06:33:00'),
(61, '98037ab980b388ba411cdf8859795c75', 1, '2014-02-17 12:09:29'),
(62, '5326673f745d710caa7f9ef5c46c9ec9', 1, '2014-02-18 07:06:50'),
(63, 'b2136b9dbc1c1b82be903b4fd7bb098a', 1, '2014-02-19 05:57:27'),
(64, 'b65e4a0c9b8ff3d57a29b6ae2fa4d0e2', 1, '2014-02-19 09:24:38');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `__users`
--

INSERT INTO `__users` (`id`, `name`, `emp_code`, `email`, `phone`, `user_type`, `username`, `password`) VALUES
(1, 'Sundar', '001', 'meenakshi.sun20@gmail.com', '9841673880', -1, 'admin', '0192023a7bbd73250516f069df18b500'),
(2, 'Satyam', '1120', 'sdonthi@sphata.com', '9994426636', 1, 'satyam', '0192023a7bbd73250516f069df18b500'),
(3, 'Jithendra', '1142', 'jpuchareddy@sphata.com', '9543079409', 1, 'jithu', 'da7299d750f16fc62f6c4abd7c3af8e7'),
(4, 'user', '1109', 'user.user@gm.com', '9898398323', 2, 'user', '6ad14ba9986e3615423dfca256d04e3f'),
(5, 'user1', '1111', 'aaa.aaaa@gm.com', '8989897656', 2, 'user1', '6ad14ba9986e3615423dfca256d04e3f'),
(6, 'Satya', '0017', 'aaa.ccc@gvs.com', '898976564', 2, 'satya.donti', 'bcdaa8973a9542fea8771cc57838300f'),
(7, 'Sathish Kumar', '101', 'asksathishkumar@gmail.com', '919962512280', 2, 'sathish', '1c5edc4bbb547c49570f4dce082f8333'),
(8, 'Sathish Kumar', '1002', 'ssk_indian@yahoo.com', '919962512280', 2, 'sathish', '202cb962ac59075b964b07152d234b70'),
(9, 'ramesh', '0054', 'ramesh@malladi.co.in', '9940637655', 2, 'ramesh', '3d2d73252a546471c67243a97458371b'),
(10, 'karnaraj v', 'H003', 'karnaraj@malladi,co,in', '9790841376', 2, 'karnaraj', '81d2ea490826251c2526564bb8e36249'),
(11, 'Nory Sriker', '100019', 'sriker@malladi.co.in', '9940637628', 2, 'nsriker', 'b58caa62d6227060d606bfbb733e6ee5'),
(12, 'ylnrao', 'mdplho0030', 'ylnrao@malladi.co.in', '398769937', 2, 'ylnrao', 'd1d1777930a3f967acc2d44f173fdb5f'),
(13, 'M S Pavan', '', 'pawan@malladi.co.in', '9840108000', 2, 'pavan', 'ae048e94152f35f71301cbb6f6d8c571'),
(14, 'M.Hariharasuthan', 'MH0109', 'hariharan@mallladi..co.in', '919940655890', 2, 'hariharan', 'dda790dc583c1dfdfc18f3c67a5c9dff'),
(15, 'V.VISWANATHAN', '0006', 'viswanathan@malladi.co.in', '9840390777', 2, 'viswanathan', 'e5988de50f841aacf46b7d151a2f27d7'),
(16, 'Ramajayan', 'MDPLHO0056', 'rama@malladi.co.in', '9940637640', 2, 'ramajayan', '2b9cdebb444dbb2fe8380860104f0573'),
(17, 'S.Ganesh', 'MDPLHO0017', 'ganesh@malladi.co.in', '9940637634', 2, 'Ganesh', 'e6d59f0958ff38f261f4b6b6fde0b763'),
(18, 'JAYAKUMAR', 'MDPLHO0081', 'jayakumar.k@malladi.co.in', '9791042051', 2, 'jayakumar.k', '8878007de462f981acef268943c9a829'),
(19, 'Ramajayan', 'MDPLHO0056', 'ramajayan@gmail.com', '9940637640', 2, 'ramajayan', '827ccb0eea8a706c4c34a16891f84e7b'),
(20, 'JAYAKUMAR', 'MDPLHO0081', 'jayakumar_ski@hotmail.com', '9791042051', 2, 'jayakumar.k', '5e26bd3a9e144f9f5455313988df3634'),
(21, 'saravanan', 'MDPLHO0096', 'saravanan@malladi.co.in', '9789999447', 2, 'saran077', '4712304bc6671809b032410c43cd8f95'),
(22, 'Gopalakrishnan.S', 'MDPLHO0079', 'gopal.s@malladi.co.in', '9789999445', 2, 'gopal', '0461c6f14e38a863bb08cd14f7191815'),
(23, 'T.Swaminathan', 'MDPLHO0012', 'tswaminathan@malladi.co.in', '09940637636', 2, 'tswami', '259dda0279f5229b531881349e4f219a'),
(24, 's.swaminathan', 'MDPLHO0048', 'sswaminathan@malladi.co.in', '9940637635', 2, 'sswaminathan', '994a6be17a2ad13f329ff56406aaac97'),
(25, 'DEBABRATA PATI', 'MDPLHO0106', 'pati@malladi.co.in', '9003056432', 2, 'pati', '1a715d422dbc1e399c325e68d667e37a'),
(26, 'Sathya Prasad Musunuri', 'MDPLHO0108', 'prasad@malladi.co.in', '9003056431', 2, 'prasad', 'dd81b75f42570b6017c728fc8ae113c9'),
(27, 'Prabhakaran', 'MDPLHO0035', 'prabhakaran@malladi.co.in', '9790915390', 2, 'prabha1964', '841be52020172844864ad71ef0061ef6'),
(28, 'N.Radhakrishnan', 'MDPLH00107', 'radhakrishnan@malladi.co.in', '9940637664', 2, 'Radhakrishnan', '8ec0c8286dee5b99f2425706299c6957'),
(29, 'Manmath Patnaik', 'MSL', 'manmathpatnaik@malladi.co.in', '9500069947', 2, 'manmath', 'bb2d3d72dcf2b7e5916380de8c5023d8'),
(30, 'S. NARAYANAN', 'MDLHO0082', 'narayanan.s@malladi.co.in', '9791042039', 2, 'Narayanan', '518d5f3401534f5c6c21977f12f60989'),
(31, 's.mohan', 'MDPLHO0025', 'smohan@malladi.co.in', '9940327101', 2, 'mohan', '685d3aa495c429ea24bc015e25089c1c'),
(32, 'S.GOPALAKRISHNAN', 'MDPLHO0038', 'sgopalakrishnan@malladi.co.in', '9940637637', 2, 'gk', '9c9f1c65b1dc1f79498c9f09eb610e1a'),
(33, 'GANGESWARI', 'MDPLRD0094', 'gangeswari@malladi.co.in', '9940633357', 2, 'gangeswari', 'cdd743a508742dc4a9463f605adcace4'),
(34, 'ch raghu', 'MDPLHO0021', 'raghu@malladi.co.in', '9444787531', 2, 'raghu', 'cec8c14a210bc139bc2fe821273a59b5'),
(35, 'Shesachalam H', 'MDPLHO0110', 'Shesachalam@malladi.co.in', '9789745631', 2, 'shesachalam', 'da7009c83b87c5ae29965e46650b6069'),
(36, 'sumangalameenakshi', 'MDPLHO0076', 'meenakshi@malladi.co.in', '9940637627', 2, 'meenakshi', '00fc591ad01eac82128be37b29fd871c'),
(37, 'swathi', 'swathi', 'swathisivaraman@hotmail.com', '7893966187', 2, 'swathi', '46eafc3f1b688c52837ef0c7fa2018f9'),
(38, 'sunil upadhyay', 'mslhoo6', 'sunil@malladi.co.in', '9176252194', 2, 'sunil', '329a0f7d9837b2ff239ec97fca1f9134'),
(39, 'r. Sivakumar', 'MDPLHO0031', 'yamuna.k@buildhr.co.in', '9176062056', 2, 'sivakumar', 'c413590edef76860e752cce1f7c2cbfc'),
(40, 'Prabakaran', 'HO0040', 'prabha@malladi.co.in', '9500069945', 2, 'rprabha', '1327a71aeeef17500851d23af9c6b87b'),
(41, 'Amsavel', 'MDPLHO0111', 'amsavel@malladi.co.in', '9840087188', 2, 'amsavel', '0b030cf8e5b1414cc6e56c9d727d0a95'),
(42, 'andrew', 'MDPLHO0063', 'andrewsxl@gmail.com', '9003056437', 2, 'andrew', 'ff8c03d32c0bec6fcd0795fa771bc4ef'),
(43, 'Jagan', 'HO0016', 'jagan@malladi.co.in', '9940637629', 2, 'jagan', '45298a8884660b6099e1f35966e004b2'),
(44, 'krishnan', 'MDPLHO0060', 'rkrishnaN@malladi.co.in', '9940645882', 2, 'rkrishnan', '7ca6b296519daa9d8f618ba7f6047202'),
(45, 'rkrishnan', 'MDPLHO0060', 'krishn60@yahoo.com', '9940645882', 2, 'rkrishnan', '7ca6b296519daa9d8f618ba7f6047202'),
(46, 'Satya', '001120', 'vc.ac@gmail.com', '9876789867', 2, 'satyatest', 'bcdaa8973a9542fea8771cc57838300f');

-- --------------------------------------------------------

--
-- Table structure for table `__user_types`
--

CREATE TABLE IF NOT EXISTS `__user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `add_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `__user_types`
--

INSERT INTO `__user_types` (`id`, `code`, `name`, `add_date`) VALUES
(-1, 'superadm', 'Super Admin', '2013-05-23'),
(1, 'adm', 'Admin', '2013-05-23');

-- --------------------------------------------------------

--
-- Table structure for table `__user_type_permissions`
--

CREATE TABLE IF NOT EXISTS `__user_type_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `permission_given_by` int(11) NOT NULL,
  `add_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_id` (`permission_id`),
  KEY `permission_given_by` (`permission_given_by`),
  KEY `module_id` (`module_id`),
  KEY `user_type_id` (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `__user_type_permissions`
--

INSERT INTO `__user_type_permissions` (`id`, `module_id`, `user_type_id`, `permission_id`, `permission_given_by`, `add_date`) VALUES
(1, 1, -1, 16, 1, '2013-05-23'),
(2, 2, -1, 16, 1, '2013-05-23');

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
-- Constraints for table `responses`
--
ALTER TABLE `responses`
  ADD CONSTRAINT `responses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `__users` (`id`),
  ADD CONSTRAINT `responses_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

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

--
-- Constraints for table `__companies`
--
ALTER TABLE `__companies`
  ADD CONSTRAINT `__companies_ibfk_1` FOREIGN KEY (`primary_user`) REFERENCES `__users` (`id`);

--
-- Constraints for table `__user_type_permissions`
--
ALTER TABLE `__user_type_permissions`
  ADD CONSTRAINT `__user_type_permissions_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `__modules` (`id`),
  ADD CONSTRAINT `__user_type_permissions_ibfk_3` FOREIGN KEY (`permission_id`) REFERENCES `__permissions` (`id`),
  ADD CONSTRAINT `__user_type_permissions_ibfk_4` FOREIGN KEY (`user_type_id`) REFERENCES `__user_types` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
