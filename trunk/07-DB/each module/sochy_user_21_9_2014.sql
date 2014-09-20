-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Sep 20, 2014 at 05:28 PM
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

CREATE TABLE `tbl_controllers` (
  `con_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `con_name` varchar(50) DEFAULT NULL,
  `con_controllername` varchar(50) DEFAULT NULL,
  `con_description` text,
  `con_created` timestamp NULL DEFAULT NULL,
  `con_modified` timestamp NULL DEFAULT NULL,
  `con_moduleid` int(11) DEFAULT NULL,
  `con_status` int(1) DEFAULT '1',
  PRIMARY KEY (`con_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_groups`
--

CREATE TABLE `tbl_groups` (
  `gro_id` int(11) NOT NULL AUTO_INCREMENT,
  `gro_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gro_status` bit(1) DEFAULT NULL,
  `gro_created` timestamp NULL DEFAULT NULL,
  `gro_modified` timestamp NULL DEFAULT NULL,
  `gro_description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`gro_id`),
  KEY `index2` (`gro_id`,`gro_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

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

CREATE TABLE `tbl_group_task` (
  `grotas_id` int(11) NOT NULL AUTO_INCREMENT,
  `grotas_groupid` int(11) NOT NULL,
  `grotas_taskid` int(11) NOT NULL,
  PRIMARY KEY (`grotas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modules`
--

CREATE TABLE `tbl_modules` (
  `mod_id` int(11) NOT NULL AUTO_INCREMENT,
  `mod_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_foldername` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_status` int(1) DEFAULT '1',
  `mod_created` timestamp NULL DEFAULT NULL,
  `mod_modified` timestamp NULL DEFAULT NULL,
  `mod_description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`mod_id`),
  KEY `index2` (`mod_id`,`mod_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tasks`
--

CREATE TABLE `tbl_tasks` (
  `tas_id` int(11) NOT NULL AUTO_INCREMENT,
  `tas_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tas_controllerid` int(11) NOT NULL,
  `tas_functionname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tas_status` int(1) DEFAULT '1',
  `tas_created` timestamp NULL DEFAULT NULL,
  `tas_modified` timestamp NULL DEFAULT NULL,
  `tas_description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`tas_id`),
  KEY `index3` (`tas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`use_id`, `use_name`, `use_pass`, `use_status`, `use_created`, `use_modified`, `use_email`) VALUES
(8, 'admin', '04784d8d20a3b0d6f261ec781b9b2626a1398f26', '', '2014-09-06 19:05:32', '2014-09-14 15:31:39', 'sochy.choeun@gmail.com'),
(9, 'test', '04784d8d20a3b0d6f261ec781b9b2626a1398f26', '', '2014-09-08 15:32:20', '2014-09-17 13:54:04', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_group`
--

CREATE TABLE `tbl_user_group` (
  `usegro_id` int(11) NOT NULL AUTO_INCREMENT,
  `usegro_userid` int(11) NOT NULL,
  `usegro_groupid` int(11) NOT NULL,
  PRIMARY KEY (`usegro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tbl_user_group`
--

INSERT INTO `tbl_user_group` (`usegro_id`, `usegro_userid`, `usegro_groupid`) VALUES
(26, 8, 1),
(27, 8, 2),
(28, 9, 2),
(29, 9, 3);
