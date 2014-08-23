-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Aug 23, 2014 at 01:33 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ume_school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cariculars`
--

CREATE TABLE `tbl_cariculars` (
  `car_id` int(11) NOT NULL,
  `car_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `car_status` bit(1) DEFAULT NULL,
  `cur_create_date` date DEFAULT NULL,
  `cur_moditied_date` date DEFAULT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classes`
--

CREATE TABLE `tbl_classes` (
  `cla_id` int(11) NOT NULL AUTO_INCREMENT,
  `cla_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cla_capacity` int(11) DEFAULT NULL,
  `cla_maj_id` int(11) NOT NULL,
  `cla_status` int(11) DEFAULT '1',
  `tbl_shift_shi_id` int(11) NOT NULL,
  PRIMARY KEY (`cla_id`,`tbl_shift_shi_id`),
  KEY `fk_tbl_classes_tbl_marjor1_idx` (`cla_maj_id`),
  KEY `fk_tbl_classes_tbl_shift1` (`tbl_shift_shi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cur_sub`
--

CREATE TABLE `tbl_cur_sub` (
  `cur_sub_id` int(11) NOT NULL,
  `cur_sub_hours` int(11) DEFAULT NULL,
  `cur_sub_create_date` date DEFAULT NULL,
  `cur_sub_modified_date` date DEFAULT NULL,
  `tbl_cariculars_car_id` int(11) NOT NULL,
  `tbl_subjects_sub_id` int(11) NOT NULL,
  PRIMARY KEY (`cur_sub_id`),
  KEY `fk_tbl_cur_sub_tbl_cariculars1_idx` (`tbl_cariculars_car_id`),
  KEY `fk_tbl_cur_sub_tbl_subjects1_idx` (`tbl_subjects_sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_experiences`
--

CREATE TABLE `tbl_experiences` (
  `exp_id` int(11) NOT NULL AUTO_INCREMENT,
  `exp_date` varchar(45) DEFAULT NULL,
  `exp_position` varchar(45) DEFAULT NULL,
  `exp_shift` tinyint(4) DEFAULT NULL,
  `exp_employer_tel` varchar(45) DEFAULT NULL,
  `exp_responsibilities` text,
  `exp_stu_id` int(11) NOT NULL,
  PRIMARY KEY (`exp_id`),
  KEY `fk_tbl_experiences_tbl_students1_idx` (`exp_stu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculties`
--

CREATE TABLE `tbl_faculties` (
  `fac_id` int(11) NOT NULL AUTO_INCREMENT,
  `fac_name` varchar(45) DEFAULT NULL,
  `fac_status` bit(1) NOT NULL DEFAULT b'1',
  `fac_description` varchar(200) DEFAULT NULL,
  `fac_kh_name` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`fac_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_groups`
--

INSERT INTO `tbl_groups` (`gro_id`, `gro_name`, `gro_status`, `gro_created`, `gro_modified`, `gro_description`) VALUES
(1, 'Admin', '', '2014-08-23 10:58:43', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_task`
--

CREATE TABLE `tbl_group_task` (
  `gro_tas_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_groups_gro_id` int(11) NOT NULL,
  `tbl_tasks_tas_id` int(11) NOT NULL,
  PRIMARY KEY (`gro_tas_id`),
  KEY `fk_tbl_group_task_tbl_groups1_idx` (`tbl_groups_gro_id`),
  KEY `fk_tbl_group_task_tbl_tasks1_idx` (`tbl_tasks_tas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_majors`
--

CREATE TABLE `tbl_majors` (
  `maj_id` int(11) NOT NULL,
  `maj_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maj_status` bit(1) DEFAULT b'1',
  `maj_kh_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maj_fac_id` int(11) NOT NULL,
  PRIMARY KEY (`maj_id`),
  KEY `fk_tbl_majors_tbl_faculties1` (`maj_fac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marjor_facuty`
--

CREATE TABLE `tbl_marjor_facuty` (
  `mar_fac_id` int(11) NOT NULL,
  `mar_fac_name` varchar(45) DEFAULT NULL,
  `mar_fac_status` bit(1) DEFAULT NULL,
  `mar_fac_description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`mar_fac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modules`
--

CREATE TABLE `tbl_modules` (
  `mod_id` int(11) NOT NULL AUTO_INCREMENT,
  `mod_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_status` bit(1) DEFAULT NULL,
  `mod_controllername` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_created` timestamp NULL DEFAULT NULL,
  `mod_modified` timestamp NULL DEFAULT NULL,
  `mod_foldername` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`mod_id`),
  KEY `index2` (`mod_id`,`mod_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room_type`
--

CREATE TABLE `tbl_room_type` (
  `rom_typ_id` int(11) NOT NULL AUTO_INCREMENT,
  `rom_typ_name` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `rom_typ_description` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `rom_typ_status` bit(1) NOT NULL DEFAULT b'1',
  `rom_typ_created` date NOT NULL,
  `rom_typ_modified` date DEFAULT NULL,
  PRIMARY KEY (`rom_typ_id`),
  UNIQUE KEY `rom_typ_name` (`rom_typ_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shift`
--

CREATE TABLE `tbl_shift` (
  `shi_id` int(11) NOT NULL AUTO_INCREMENT,
  `shi_name` varchar(45) DEFAULT NULL,
  `shi_status` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`shi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staffs`
--

CREATE TABLE `tbl_staffs` (
  `sta_id` int(11) NOT NULL AUTO_INCREMENT,
  `sta_card_id` char(5) NOT NULL,
  `sta_name` varchar(45) NOT NULL,
  `sta_name_kh` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sta_email` varchar(45) NOT NULL,
  `sta_address` varchar(200) DEFAULT NULL,
  `sta_status` bit(1) DEFAULT NULL,
  `sta_created` date DEFAULT NULL,
  `sta_modified` date DEFAULT NULL,
  `sta_sex` varchar(45) DEFAULT NULL,
  `sta_position` varchar(200) DEFAULT NULL,
  `tbl_users_use_id` int(11) DEFAULT NULL,
  `sta_start_date` date DEFAULT NULL,
  PRIMARY KEY (`sta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff_job_type`
--

CREATE TABLE `tbl_staff_job_type` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(50) NOT NULL,
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

CREATE TABLE `tbl_staff_position` (
  `pos_id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_title_kh` varchar(50) NOT NULL,
  `tbl_users_use_id` int(11) NOT NULL,
  `pos_description` varchar(500) NOT NULL,
  `pos_status` bit(1) NOT NULL DEFAULT b'1',
  `pos_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pos_modified` timestamp NULL DEFAULT NULL,
  `pos_title_en` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pos_id`),
  UNIQUE KEY `title` (`pos_title_kh`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `stu_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_en_firstname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_en_lastname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_dob` date DEFAULT NULL,
  `stu_current_address` text COLLATE utf8_unicode_ci,
  `stu_kh_firstname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_kh_lastname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_pob` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_nationality` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_marital_status` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_tel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_fax` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_father_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_father_occupation` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_mother_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_mother_occupation` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_father_tel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_father_email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_father_fax` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_father_current_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_highschool_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_highschool_year` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_highschool_degree` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_highschool_bacii_province` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_highschool_bacii_office` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_highschool_bacii_room` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_highschool_bacii_table` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_highschool_bacii_date` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_class`
--

CREATE TABLE `tbl_student_class` (
  `stu_cla_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_students_stu_id` int(11) NOT NULL,
  `tbl_class_cla_id` int(11) NOT NULL,
  PRIMARY KEY (`stu_cla_id`),
  KEY `fk_tbl_student_class_tbl_class1_idx` (`tbl_class_cla_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjects`
--

CREATE TABLE `tbl_subjects` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_hours` int(11) DEFAULT NULL,
  `sub_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tasks`
--

CREATE TABLE `tbl_tasks` (
  `tas_id` int(11) NOT NULL AUTO_INCREMENT,
  `tas_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tas_status` bit(1) DEFAULT NULL,
  `tas_functionname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tas_created` timestamp NULL DEFAULT NULL,
  `tas_modified` timestamp NULL DEFAULT NULL,
  `tbl_modules_mod_id` int(11) NOT NULL,
  PRIMARY KEY (`tas_id`),
  KEY `fk_tbl_tasks_tbl_modules1_idx` (`tbl_modules_mod_id`),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_group`
--

CREATE TABLE `tbl_user_group` (
  `use_gro_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_users_use_id` int(11) NOT NULL,
  `tbl_groups_gro_id` int(11) NOT NULL,
  PRIMARY KEY (`use_gro_id`),
  KEY `fk_tbl_user_group_tbl_users1_idx` (`tbl_users_use_id`),
  KEY `fk_tbl_user_group_tbl_groups1_idx` (`tbl_groups_gro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  ADD CONSTRAINT `fk_tbl_classes_tbl_majors1` FOREIGN KEY (`cla_maj_id`) REFERENCES `tbl_majors` (`maj_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_classes_tbl_shift1` FOREIGN KEY (`tbl_shift_shi_id`) REFERENCES `tbl_shift` (`shi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_cur_sub`
--
ALTER TABLE `tbl_cur_sub`
  ADD CONSTRAINT `fk_tbl_cur_sub_tbl_cariculars1` FOREIGN KEY (`tbl_cariculars_car_id`) REFERENCES `tbl_cariculars` (`car_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_cur_sub_tbl_subjects1` FOREIGN KEY (`tbl_subjects_sub_id`) REFERENCES `tbl_subjects` (`sub_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_experiences`
--
ALTER TABLE `tbl_experiences`
  ADD CONSTRAINT `fk_tbl_experiences_tbl_students2` FOREIGN KEY (`exp_stu_id`) REFERENCES `tbl_students` (`stu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_group_task`
--
ALTER TABLE `tbl_group_task`
  ADD CONSTRAINT `fk_tbl_group_task_tbl_tasks2` FOREIGN KEY (`tbl_tasks_tas_id`) REFERENCES `tbl_tasks` (`tbl_modules_mod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_group_task_tbl_groups2` FOREIGN KEY (`tbl_groups_gro_id`) REFERENCES `tbl_groups` (`gro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_majors`
--
ALTER TABLE `tbl_majors`
  ADD CONSTRAINT `fk_tbl_majors_tbl_faculties1` FOREIGN KEY (`maj_fac_id`) REFERENCES `tbl_faculties` (`fac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_modules`
--
ALTER TABLE `tbl_modules`
  ADD CONSTRAINT `fk_tbl_modules_tbl_tasks1` FOREIGN KEY (`mod_id`) REFERENCES `tbl_tasks` (`tbl_modules_mod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_student_class`
--
ALTER TABLE `tbl_student_class`
  ADD CONSTRAINT `fk_tbl_student_class_tbl_class1` FOREIGN KEY (`tbl_class_cla_id`) REFERENCES `tbl_classes` (`cla_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_student_class_tbl_students1` FOREIGN KEY (`tbl_class_cla_id`) REFERENCES `tbl_students` (`stu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_user_group`
--
ALTER TABLE `tbl_user_group`
  ADD CONSTRAINT `fk_tbl_user_group_tbl_groups2` FOREIGN KEY (`tbl_groups_gro_id`) REFERENCES `tbl_groups` (`gro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_user_group_tbl_users2` FOREIGN KEY (`tbl_users_use_id`) REFERENCES `tbl_users` (`use_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
