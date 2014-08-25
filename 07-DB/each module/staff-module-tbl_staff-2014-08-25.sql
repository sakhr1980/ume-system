-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2014 at 10:59 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ume_school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE IF NOT EXISTS `tbl_staff` (
  `sta_id` int(11) NOT NULL AUTO_INCREMENT,
  `sta_card_id` char(5) NOT NULL,
  `sta_name` varchar(45) DEFAULT NULL,
  `sta_name_kh` varchar(50) NOT NULL,
  `sta_status` bit(1) DEFAULT b'0',
  `sta_position` varchar(150) DEFAULT NULL,
  `sta_job_type` int(11) NOT NULL,
  `sta_start_date` timestamp NOT NULL,
  `sta_email` varchar(45) DEFAULT NULL,
  `sta_phone` varchar(30) DEFAULT NULL,
  `sta_sex` char(1) NOT NULL,
  `sta_address` varchar(200) DEFAULT NULL,
  `sta_created` timestamp NULL DEFAULT NULL,
  `sta_modified` timestamp NULL DEFAULT NULL,
  `tbl_users_use_id` int(11) NOT NULL,
  PRIMARY KEY (`sta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_job_type`
--

CREATE TABLE IF NOT EXISTS `tbl_staff_job_type` (
  `sta_job_id` int(11) NOT NULL AUTO_INCREMENT,
  `sta_job_title` varchar(50) NOT NULL,
  `sta_job_title_kh` varchar(50) DEFAULT NULL,
  `sta_job_description` varchar(250) DEFAULT NULL,
  `sta_job_status` bit(1) NOT NULL DEFAULT b'1',
  `sta_job_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sta_job_modified` timestamp NULL DEFAULT NULL,
  `tbl_users_use_id` int(11) NOT NULL,
  PRIMARY KEY (`sta_job_id`),
  UNIQUE KEY `job_title` (`sta_job_title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_position`
--

CREATE TABLE IF NOT EXISTS `tbl_staff_position` (
  `sta_pos_id` int(11) NOT NULL AUTO_INCREMENT,
  `sta_pos_title` varchar(50) NOT NULL,
  `sta_pos_title_kh` varchar(50) NOT NULL,
  `sta_pos_description` varchar(250) DEFAULT NULL,
  `sta_pos_status` bit(1) NOT NULL DEFAULT b'1',
  `sta_pos_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sta_pos_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `tbl_users_use_id` int(11) NOT NULL,
  PRIMARY KEY (`sta_pos_id`),
  UNIQUE KEY `title` (`sta_pos_title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
