-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Sep 15, 2014 at 07:50 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ume_school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_controllers`
--

DROP TABLE IF EXISTS `tbl_controllers`;
CREATE TABLE `tbl_controllers` (
  `con_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `con_name` varchar(50) DEFAULT NULL,
  `con_controllername` varchar(50) DEFAULT NULL,
  `con_description` text,
  `con_created` timestamp NULL DEFAULT NULL,
  `con_modified` timestamp NULL DEFAULT NULL,
  `con_moduleid` int(11) DEFAULT NULL,
  PRIMARY KEY (`con_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_controllers`
--

INSERT INTO `tbl_controllers` (`con_id`, `con_name`, `con_controllername`, `con_description`, `con_created`, `con_modified`, `con_moduleid`) VALUES
(1, 'Users group', 'groups', 'User group controller inside the module of users', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_groups`
--

DROP TABLE IF EXISTS `tbl_groups`;
CREATE TABLE `tbl_groups` (
  `gro_id` int(11) NOT NULL AUTO_INCREMENT,
  `gro_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gro_status` bit(1) DEFAULT NULL,
  `gro_created` timestamp NULL DEFAULT NULL,
  `gro_modified` timestamp NULL DEFAULT NULL,
  `gro_description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`gro_id`),
  KEY `index2` (`gro_id`,`gro_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_groups`
--

INSERT INTO `tbl_groups` (`gro_id`, `gro_name`, `gro_status`, `gro_created`, `gro_modified`, `gro_description`) VALUES
(1, 'HR', '', '2014-08-27 07:27:37', NULL, ''),
(2, 'Admin', '', '2014-08-27 07:27:46', NULL, ''),
(3, 'Teacher', '', '2014-08-27 07:28:00', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_task`
--

DROP TABLE IF EXISTS `tbl_group_task`;
CREATE TABLE `tbl_group_task` (
  `grotas_id` int(11) NOT NULL AUTO_INCREMENT,
  `grotas_groupid` int(11) NOT NULL,
  `grotas_taskid` int(11) NOT NULL,
  PRIMARY KEY (`grotas_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_group_task`
--

INSERT INTO `tbl_group_task` (`grotas_id`, `grotas_groupid`, `grotas_taskid`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modules`
--

DROP TABLE IF EXISTS `tbl_modules`;
CREATE TABLE `tbl_modules` (
  `mod_id` int(11) NOT NULL AUTO_INCREMENT,
  `mod_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_foldername` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_status` bit(1) DEFAULT NULL,
  `mod_created` timestamp NULL DEFAULT NULL,
  `mod_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`mod_id`),
  KEY `index2` (`mod_id`,`mod_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_modules`
--

INSERT INTO `tbl_modules` (`mod_id`, `mod_name`, `mod_foldername`, `mod_status`, `mod_created`, `mod_modified`) VALUES
(1, 'Manage user', 'users', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tasks`
--

DROP TABLE IF EXISTS `tbl_tasks`;
CREATE TABLE `tbl_tasks` (
  `tas_id` int(11) NOT NULL AUTO_INCREMENT,
  `tas_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tas_controllerid` int(11) NOT NULL,
  `tas_functionname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tas_status` bit(1) DEFAULT NULL,
  `tas_created` timestamp NULL DEFAULT NULL,
  `tas_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tas_id`),
  KEY `index3` (`tas_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_tasks`
--

INSERT INTO `tbl_tasks` (`tas_id`, `tas_name`, `tas_controllerid`, `tas_functionname`, `tas_status`, `tas_created`, `tas_modified`) VALUES
(1, 'List user group or user group overview', 1, 'index', '', NULL, NULL),
(2, 'Crete user group', 1, 'add', '', NULL, NULL),
(3, 'View user group', 1, 'view', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `use_id` int(11) NOT NULL AUTO_INCREMENT,
  `use_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_pass` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_status` bit(1) DEFAULT b'0',
  `use_created` timestamp NULL DEFAULT NULL,
  `use_modified` timestamp NULL DEFAULT NULL,
  `use_email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`use_id`),
  KEY `index2` (`use_id`,`use_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`use_id`, `use_name`, `use_pass`, `use_status`, `use_created`, `use_modified`, `use_email`) VALUES
(8, 'admin', '04784d8d20a3b0d6f261ec781b9b2626a1398f26', '', '2014-09-06 19:05:32', '2014-09-14 15:31:39', 'sochy.choeun@gmail.com'),
(9, 'test', '04784d8d20a3b0d6f261ec781b9b2626a1398f26', '', '2014-09-08 15:32:20', NULL, 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_group`
--

DROP TABLE IF EXISTS `tbl_user_group`;
CREATE TABLE `tbl_user_group` (
  `usegro_id` int(11) NOT NULL AUTO_INCREMENT,
  `usegro_userid` int(11) NOT NULL,
  `usegro_groupid` int(11) NOT NULL,
  PRIMARY KEY (`usegro_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbl_user_group`
--

INSERT INTO `tbl_user_group` (`usegro_id`, `usegro_userid`, `usegro_groupid`) VALUES
(27, 8, 2),
(20, 9, 3),
(26, 8, 1);
