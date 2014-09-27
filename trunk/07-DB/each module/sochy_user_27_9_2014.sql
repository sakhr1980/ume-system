-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Sep 27, 2014 at 11:49 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_controllers`
--

INSERT INTO `tbl_controllers` (`con_id`, `con_name`, `con_controllername`, `con_description`, `con_created`, `con_modified`, `con_moduleid`, `con_status`) VALUES
(1, 'Manage Groups', 'groups', '', '2014-09-25 12:02:15', NULL, 1, 1),
(3, 'Manage Controllers', 'controllers', '', '2014-09-25 12:05:12', NULL, 1, 1),
(4, 'Manage Module', 'module', '', '2014-09-25 12:05:37', NULL, 1, 1),
(5, 'Manage Functions', 'functions', '', '2014-09-25 12:06:04', NULL, 1, 1),
(6, 'Manage User', 'accounts', '', '2014-09-27 09:12:20', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_groups`
--

CREATE TABLE `tbl_groups` (
  `gro_id` int(11) NOT NULL AUTO_INCREMENT,
  `gro_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gro_status` int(1) DEFAULT NULL,
  `gro_created` timestamp NULL DEFAULT NULL,
  `gro_modified` timestamp NULL DEFAULT NULL,
  `gro_description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`gro_id`),
  KEY `index2` (`gro_id`,`gro_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_groups`
--

INSERT INTO `tbl_groups` (`gro_id`, `gro_name`, `gro_status`, `gro_created`, `gro_modified`, `gro_description`) VALUES
(1, 'Admin', 1, '2014-09-27 09:32:43', '2014-09-27 05:16:03', 'Admin group'),
(2, 'HR', 1, '2014-09-27 07:24:32', '2014-09-27 05:14:40', 'Test group'),
(3, 'Teacher', 1, '2014-09-27 07:24:32', '2014-09-27 05:14:47', 'Test group'),
(5, 'Test', 1, '2014-09-27 08:02:04', NULL, 'Test group');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_task`
--

CREATE TABLE `tbl_group_task` (
  `grotas_id` int(11) NOT NULL AUTO_INCREMENT,
  `grotas_groupid` int(11) NOT NULL,
  `grotas_taskid` int(11) NOT NULL,
  PRIMARY KEY (`grotas_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=63 ;

--
-- Dumping data for table `tbl_group_task`
--

INSERT INTO `tbl_group_task` (`grotas_id`, `grotas_groupid`, `grotas_taskid`) VALUES
(26, 5, 2),
(27, 5, 4),
(28, 5, 3),
(41, 1, 18),
(42, 1, 23),
(43, 1, 20),
(44, 1, 19),
(45, 1, 17),
(46, 1, 22),
(47, 1, 21),
(48, 1, 10),
(49, 1, 12),
(50, 1, 11),
(51, 1, 14),
(52, 1, 16),
(53, 1, 15),
(54, 1, 13),
(55, 1, 2),
(56, 1, 4),
(57, 1, 3),
(58, 1, 1),
(59, 1, 6),
(60, 1, 7),
(61, 1, 9),
(62, 1, 8);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_modules`
--

INSERT INTO `tbl_modules` (`mod_id`, `mod_name`, `mod_foldername`, `mod_status`, `mod_created`, `mod_modified`, `mod_description`) VALUES
(1, 'User Management', 'users', 1, '2014-09-25 12:01:38', NULL, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_tasks`
--

INSERT INTO `tbl_tasks` (`tas_id`, `tas_name`, `tas_controllerid`, `tas_functionname`, `tas_status`, `tas_created`, `tas_modified`, `tas_description`) VALUES
(1, 'List groups', 1, 'index', 1, '2014-09-25 12:12:57', NULL, ''),
(2, 'Add new', 1, 'add', 1, '2014-09-25 12:13:23', NULL, ''),
(3, 'Edit group', 1, 'edit', 1, '2014-09-25 12:14:01', NULL, ''),
(4, 'Delete group', 1, 'delete', 1, '2014-09-25 12:14:23', NULL, ''),
(6, 'View group', 1, 'view', 1, '2014-09-25 12:22:34', '2014-09-25 13:50:27', ''),
(7, 'Add new', 4, 'add', 1, '2014-09-27 08:59:10', NULL, ''),
(8, 'Edit module', 4, 'edit', 1, '2014-09-27 08:59:43', NULL, ''),
(9, 'Delete module', 4, 'delete', 1, '2014-09-27 09:00:05', NULL, ''),
(10, 'Add new', 3, 'add', 1, '2014-09-27 09:06:18', NULL, ''),
(11, 'Edit controller', 3, 'edit', 1, '2014-09-27 09:06:45', NULL, ''),
(12, 'Delete controller', 3, 'delete', 1, '2014-09-27 09:07:07', NULL, ''),
(13, 'List functions', 5, 'index', 1, '2014-09-27 09:08:15', NULL, ''),
(14, 'Add new', 5, 'add', 1, '2014-09-27 09:08:31', NULL, ''),
(15, 'Edit function', 5, 'edit', 1, '2014-09-27 09:09:34', NULL, ''),
(16, 'Delete function', 5, 'delete', 1, '2014-09-27 09:09:51', NULL, ''),
(17, 'List users', 6, 'index', 1, '2014-09-27 09:14:29', NULL, ''),
(18, 'Add new', 6, 'add', 1, '2014-09-27 09:14:44', NULL, ''),
(19, 'Edit user', 6, 'edit', 1, '2014-09-27 09:15:26', NULL, ''),
(20, 'Delete user', 6, 'delete', 1, '2014-09-27 09:17:31', NULL, ''),
(21, 'View user', 6, 'view', 1, '2014-09-27 09:17:46', NULL, ''),
(22, 'Profile', 6, 'profile', 1, '2014-09-27 09:18:15', NULL, ''),
(23, 'Change password', 6, 'changepassword', 1, '2014-09-27 09:18:38', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `use_id` int(11) NOT NULL AUTO_INCREMENT,
  `use_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_pass` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_status` int(1) DEFAULT '0',
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
(8, 'admin', '04784d8d20a3b0d6f261ec781b9b2626a1398f26', 1, '2014-09-06 19:05:32', '2014-09-14 15:31:39', 'sochy.choeun@gmail.com'),
(9, 'test', '04784d8d20a3b0d6f261ec781b9b2626a1398f26', 0, '2014-09-08 15:32:20', '2014-09-27 05:17:48', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_group`
--

CREATE TABLE `tbl_user_group` (
  `usegro_id` int(11) NOT NULL AUTO_INCREMENT,
  `usegro_userid` int(11) NOT NULL,
  `usegro_groupid` int(11) NOT NULL,
  PRIMARY KEY (`usegro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `tbl_user_group`
--

INSERT INTO `tbl_user_group` (`usegro_id`, `usegro_userid`, `usegro_groupid`) VALUES
(26, 8, 1),
(27, 8, 2),
(30, 9, 2);
