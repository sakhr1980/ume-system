-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 31, 2014 at 01:32 PM
-- Server version: 5.5.37-0ubuntu0.13.10.1
-- PHP Version: 5.4.13

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
-- Table structure for table `tbl_caricular`
--

CREATE TABLE IF NOT EXISTS `tbl_caricular` (
  `car_id` int(11) NOT NULL,
  `car_name` varchar(45) DEFAULT NULL,
  `car_status` bit(1) DEFAULT NULL,
  `cur_create_date` date DEFAULT NULL,
  `cur_moditied_date` date DEFAULT NULL,
  `mar_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`car_id`),
  KEY `fk_tbl_caricular_tbl_marjor1` (`mar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE IF NOT EXISTS `tbl_class` (
  `cla_id` int(11) NOT NULL,
  `cla_name` varchar(45) DEFAULT NULL,
  `cla_shi_id` int(11) DEFAULT NULL,
  `cla_copasity` int(11) DEFAULT NULL,
  `maj_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cla_id`),
  KEY `fk_tbl_class_tbl_marjor1` (`maj_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cur_sub`
--

CREATE TABLE IF NOT EXISTS `tbl_cur_sub` (
  `cur_sub_id` int(11) NOT NULL,
  `cur_id` int(11) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `cur_sub_hours` int(11) DEFAULT NULL,
  `cur_sub_create_date` date DEFAULT NULL,
  `cur_sub_modified_date` date DEFAULT NULL,
  PRIMARY KEY (`cur_sub_id`),
  KEY `fk_tbl_cur_sub_tbl_subject1` (`sub_id`),
  KEY `fk_tbl_cur_sub_tbl_caricular1` (`cur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_access_leval`
--

CREATE TABLE IF NOT EXISTS `tbl_group_access_leval` (
  `gro_id` int(11) NOT NULL,
  `gro_name` varchar(45) DEFAULT NULL,
  `gro_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`gro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_task`
--

CREATE TABLE IF NOT EXISTS `tbl_group_task` (
  `gro_tas_id` int(11) NOT NULL,
  `gro_id` int(11) DEFAULT NULL,
  `tas_id` int(11) DEFAULT NULL,
  `gro_tas_status` bit(1) DEFAULT NULL,
  `tbl_module_mod_id` int(11) NOT NULL,
  PRIMARY KEY (`gro_tas_id`,`tbl_module_mod_id`),
  KEY `fk_tbl_group_task_tbl_group_access_leval1` (`gro_id`),
  KEY `fk_tbl_group_task_tbl_task1` (`tas_id`),
  KEY `fk_tbl_group_task_tbl_module1` (`tbl_module_mod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marjor`
--

CREATE TABLE IF NOT EXISTS `tbl_marjor` (
  `mar_id` int(11) NOT NULL,
  `mar_name` varchar(45) DEFAULT NULL,
  `mar_status` bit(1) DEFAULT NULL,
  `mar_fac_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`mar_id`),
  KEY `fk_tbl_marjor_tbl_marjor_facuty1` (`mar_fac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marjor_facuty`
--

CREATE TABLE IF NOT EXISTS `tbl_marjor_facuty` (
  `mar_fac_id` int(11) NOT NULL,
  `mar_fac_name` varchar(45) DEFAULT NULL,
  `mar_fac_status` bit(1) DEFAULT NULL,
  `mar_fac_description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`mar_fac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module`
--

CREATE TABLE IF NOT EXISTS `tbl_module` (
  `mod_id` int(11) NOT NULL,
  `mod_name` varchar(45) DEFAULT NULL,
  `mod_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`mod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE IF NOT EXISTS `tbl_staff` (
  `sta_id` int(11) NOT NULL AUTO_INCREMENT,
  `sta_card_id` char(5) NOT NULL,
  `sta_name` varchar(45) DEFAULT NULL,
  `sta_name_kh` varchar(50) CHARACTER SET utf8 NOT NULL,
  `sta_status` bit(1) DEFAULT b'0',
  `sta_position` varchar(150) DEFAULT NULL,
  `sta_email` varchar(45) DEFAULT NULL,
  `sta_sex` char(1) NOT NULL,
  `sta_address` varchar(200) DEFAULT NULL,
  `sta_created` timestamp NULL DEFAULT NULL,
  `sta_modified` timestamp NULL DEFAULT NULL,
  `tbl_users_use_id` int(11) NOT NULL,
  PRIMARY KEY (`sta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_job_type`
--

CREATE TABLE IF NOT EXISTS `tbl_staff_job_type` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `job_status` bit(1) NOT NULL DEFAULT b'1',
  `job_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `job_modifed` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`job_id`),
  UNIQUE KEY `job_title` (`job_title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_position`
--

CREATE TABLE IF NOT EXISTS `tbl_staff_position` (
  `pos_id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_title` varchar(50) CHARACTER SET utf8 NOT NULL,
  `pos_status` bit(1) NOT NULL DEFAULT b'1',
  `pos_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pos_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`pos_id`),
  UNIQUE KEY `title` (`pos_title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE IF NOT EXISTS `tbl_student` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(45) DEFAULT NULL,
  `stu_kh_name` varchar(45) DEFAULT NULL,
  `stu_dob` date DEFAULT NULL,
  `stu_address` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_class`
--

CREATE TABLE IF NOT EXISTS `tbl_student_class` (
  `stu_cla_id` int(11) NOT NULL,
  `stu_id` int(11) DEFAULT NULL,
  `cla_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`stu_cla_id`),
  KEY `fk_tbl_student_class_tbl_student1` (`stu_id`),
  KEY `fk_tbl_student_class_tbl_class1` (`cla_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(45) DEFAULT NULL,
  `sub_description` varchar(200) DEFAULT NULL,
  `sub_hours` int(11) DEFAULT NULL,
  `sub_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE IF NOT EXISTS `tbl_task` (
  `tas_id` int(11) NOT NULL,
  `tas_name` varchar(45) DEFAULT NULL,
  `tas_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`tas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `use_id` int(11) NOT NULL,
  `use_name` varchar(45) DEFAULT NULL,
  `gro_id` int(11) DEFAULT NULL,
  `use_pass` varchar(100) DEFAULT NULL,
  `use_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`use_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_group`
--

CREATE TABLE IF NOT EXISTS `tbl_user_group` (
  `use_gro_id` int(11) NOT NULL,
  `use_id` int(11) DEFAULT NULL,
  `gro_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`use_gro_id`),
  KEY `fk_tbl_user_group_tbl_user1` (`use_id`),
  KEY `fk_tbl_user_group_tbl_group_access_leval1` (`gro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_task`
--

CREATE TABLE IF NOT EXISTS `tbl_user_task` (
  `use_tas_id` int(11) NOT NULL,
  `use_id` int(11) DEFAULT NULL,
  `tas_id` int(11) DEFAULT NULL,
  `use_tas_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`use_tas_id`),
  KEY `fk_tbl_user_task_tbl_user1` (`use_id`),
  KEY `fk_tbl_user_task_tbl_task1` (`tas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_caricular`
--
ALTER TABLE `tbl_caricular`
  ADD CONSTRAINT `fk_tbl_caricular_tbl_marjor1` FOREIGN KEY (`mar_id`) REFERENCES `tbl_marjor` (`mar_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD CONSTRAINT `fk_tbl_class_tbl_marjor1` FOREIGN KEY (`maj_id`) REFERENCES `tbl_marjor` (`mar_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_cur_sub`
--
ALTER TABLE `tbl_cur_sub`
  ADD CONSTRAINT `fk_tbl_cur_sub_tbl_caricular1` FOREIGN KEY (`cur_id`) REFERENCES `tbl_caricular` (`car_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_cur_sub_tbl_subject1` FOREIGN KEY (`sub_id`) REFERENCES `tbl_subject` (`sub_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_group_task`
--
ALTER TABLE `tbl_group_task`
  ADD CONSTRAINT `fk_tbl_group_task_tbl_group_access_leval1` FOREIGN KEY (`gro_id`) REFERENCES `tbl_group_access_leval` (`gro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_group_task_tbl_module1` FOREIGN KEY (`tbl_module_mod_id`) REFERENCES `tbl_module` (`mod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_group_task_tbl_task1` FOREIGN KEY (`tas_id`) REFERENCES `tbl_task` (`tas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_marjor`
--
ALTER TABLE `tbl_marjor`
  ADD CONSTRAINT `fk_tbl_marjor_tbl_marjor_facuty1` FOREIGN KEY (`mar_fac_id`) REFERENCES `tbl_marjor_facuty` (`mar_fac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_student_class`
--
ALTER TABLE `tbl_student_class`
  ADD CONSTRAINT `fk_tbl_student_class_tbl_class1` FOREIGN KEY (`cla_id`) REFERENCES `tbl_class` (`cla_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_student_class_tbl_student1` FOREIGN KEY (`stu_id`) REFERENCES `tbl_student` (`stu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_user_group`
--
ALTER TABLE `tbl_user_group`
  ADD CONSTRAINT `fk_tbl_user_group_tbl_group_access_leval1` FOREIGN KEY (`gro_id`) REFERENCES `tbl_group_access_leval` (`gro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_user_group_tbl_user1` FOREIGN KEY (`use_id`) REFERENCES `tbl_user` (`use_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_user_task`
--
ALTER TABLE `tbl_user_task`
  ADD CONSTRAINT `fk_tbl_user_task_tbl_task1` FOREIGN KEY (`tas_id`) REFERENCES `tbl_task` (`tas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_user_task_tbl_user1` FOREIGN KEY (`use_id`) REFERENCES `tbl_user` (`use_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
