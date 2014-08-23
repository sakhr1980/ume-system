-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2014 at 07:59 PM
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
-- Table structure for table `tbl_room`
--

CREATE TABLE IF NOT EXISTS `tbl_room` (
  `rom_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_room_type_rom_typ_id` smallint(4) NOT NULL DEFAULT '0',
  `rom_name` varchar(50) NOT NULL DEFAULT '',
  `rom_building` varchar(50) NOT NULL DEFAULT '',
  `rom_floor` smallint(4) NOT NULL DEFAULT '0',
  `rom_available_people` smallint(4) NOT NULL DEFAULT '0',
  `rom_status` bit(1) NOT NULL DEFAULT b'1',
  `rom_created` date NOT NULL,
  `rom_modified` date DEFAULT NULL,
  PRIMARY KEY (`rom_id`),
  UNIQUE KEY `rom_name` (`rom_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room_type`
--

CREATE TABLE IF NOT EXISTS `tbl_room_type` (
  `rom_typ_id` int(11) NOT NULL AUTO_INCREMENT,
  `rom_typ_name` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `rom_typ_description` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `rom_typ_status` bit(1) NOT NULL DEFAULT b'1',
  `rom_typ_created` date NOT NULL,
  `rom_typ_modified` date DEFAULT NULL,
  PRIMARY KEY (`rom_typ_id`),
  UNIQUE KEY `rom_typ_name` (`rom_typ_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
