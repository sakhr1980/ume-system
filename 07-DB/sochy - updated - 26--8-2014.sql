-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Aug 26, 2014 at 04:08 PM
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
  `cla_create_date` date NOT NULL,
  `cla_modified_date` date NOT NULL,
  PRIMARY KEY (`cla_id`,`tbl_shift_shi_id`),
  KEY `fk_tbl_classes_tbl_marjor1_idx` (`cla_maj_id`),
  KEY `fk_tbl_classes_tbl_shift1` (`tbl_shift_shi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_classes`
--

INSERT INTO `tbl_classes` (`cla_id`, `cla_name`, `cla_capacity`, `cla_maj_id`, `cla_status`, `tbl_shift_shi_id`, `cla_create_date`, `cla_modified_date`) VALUES
(4, 'M555', 253, 5, 1, 3, '2014-08-22', '2014-08-23'),
(5, 'M0059edddss', 13, 4, 1, 1, '2014-08-22', '2014-08-22'),
(6, 'M00332', 8, 3, 1, 1, '2014-08-22', '2014-08-22'),
(7, '333', 3, 4, 0, 1, '2014-08-22', '2014-08-23'),
(8, '3333', 33, 3, 0, 1, '2014-08-22', '2014-08-23'),
(9, 'M00332', 25, 3, 1, 2, '2014-08-22', '2014-08-22'),
(10, 'M22', 25, 4, 1, 1, '2014-08-22', '2014-08-22'),
(11, 'M23', 30, 3, 1, 2, '2014-08-22', '2014-08-22'),
(12, 'M24', 30, 15, 1, 2, '2014-08-22', '2014-08-22'),
(13, 'E04', 24, 5, 1, 3, '2014-08-22', '2014-08-22'),
(14, 'M44', 25, 5, 1, 3, '0000-00-00', '2014-08-23'),
(15, 'ee2', 30, 5, 1, 3, '0000-00-00', '0000-00-00'),
(16, 'M09', 30, 3, 1, 3, '0000-00-00', '0000-00-00'),
(17, 'E02', 30, 15, 1, 3, '0000-00-00', '0000-00-00'),
(18, 'M555', 25, 5, 0, 3, '0000-00-00', '2014-08-23');

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
  `exp_responsibility` text,
  `exp_stu_id` int(11) NOT NULL,
  PRIMARY KEY (`exp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_experiences`
--

INSERT INTO `tbl_experiences` (`exp_id`, `exp_date`, `exp_position`, `exp_shift`, `exp_employer_tel`, `exp_responsibility`, `exp_stu_id`) VALUES
(1, '2011 - Present', 'Programming Trainer', 0, '', '', 0),
(2, '2011 - Present', 'Programming Trainer', 0, '', '', 0),
(3, '2011 - Present', '', 0, '', '', 0),
(4, '2011 - Present', '', 0, '', '', 0),
(5, '2011 - Present', 'Programming Trainer', 0, '', '', 13),
(6, '2011 - Present', 'Programming Trainer', 0, '', '', 13);

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

--
-- Dumping data for table `tbl_faculties`
--

INSERT INTO `tbl_faculties` (`fac_id`, `fac_name`, `fac_status`, `fac_description`, `fac_kh_name`) VALUES
(1, 'Faculty of Business Administration & Tourism', '', NULL, NULL),
(2, 'Faculty of Art, Human and Foreign Languages', '', NULL, NULL),
(3, 'Faculty of Science and Technology', '', NULL, NULL),
(4, 'Faculty of Laws and Economics', '', NULL, NULL),
(5, 'Faculty of Agriculture and Rural Development', '', NULL, NULL);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_access_leval`
--

CREATE TABLE `tbl_group_access_leval` (
  `gro_id` int(11) NOT NULL,
  `gro_name` varchar(45) DEFAULT NULL,
  `gro_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`gro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_task`
--

CREATE TABLE `tbl_group_task` (
  `gro_tas_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_groups_gro_id` int(11) NOT NULL,
  `tbl_tasks_tas_id` int(11) NOT NULL,
  PRIMARY KEY (`gro_tas_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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

--
-- Dumping data for table `tbl_majors`
--

INSERT INTO `tbl_majors` (`maj_id`, `maj_name`, `maj_status`, `maj_kh_name`, `maj_fac_id`) VALUES
(3, ' Human Resource Management', '', '', 1),
(4, 'Marketing Management', '', '', 1),
(5, 'International Business Management', '', '', 1),
(6, 'Accounting & Finance', '', '', 1),
(7, 'Banking and Finance', '', '', 1),
(8, 'Tourism and Hospitality', '', '', 1),
(10, 'Tourism Guide', '', '', 1),
(11, 'Project Management', '', '', 1),
(12, 'English Translation', '', '', 2),
(13, 'English Teaching', '', '', 2),
(14, 'English Communication', '', '', 2),
(15, 'Computer Science (Programming, Networking & M', '', '', 3),
(16, 'Laws', '', '', 4),
(17, 'Economics', '', '', 4),
(18, 'Agronomy', '', '', 5),
(19, 'Rural Development', '', '', 5);

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`rom_id`, `tbl_room_type_rom_typ_id`, `rom_name`, `rom_building`, `rom_floor`, `rom_available_people`, `rom_status`, `rom_created`, `rom_modified`) VALUES
(3, 5, 'A20', 'BC', 2, 25, '', '2014-08-16', '2014-08-16');

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

--
-- Dumping data for table `tbl_room_type`
--

INSERT INTO `tbl_room_type` (`rom_typ_id`, `rom_typ_name`, `rom_typ_description`, `rom_typ_status`, `rom_typ_created`, `rom_typ_modified`) VALUES
(4, 'Lab Computer', 'For student IT practice', '', '2014-08-16', NULL),
(5, 'Normal Room', '', '', '2014-08-16', NULL),
(6, 'Big Room', '', '', '2014-08-16', NULL);

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

--
-- Dumping data for table `tbl_shift`
--

INSERT INTO `tbl_shift` (`shi_id`, `shi_name`, `shi_status`) VALUES
(1, 'Moning', 1),
(2, 'Afternoon', 1),
(3, 'Everning', 1),
(4, 'Weeken', 1),
(5, '????????', 0),
(6, '???????', 0);

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

--
-- Dumping data for table `tbl_staffs`
--

INSERT INTO `tbl_staffs` (`sta_id`, `sta_card_id`, `sta_name`, `sta_name_kh`, `sta_email`, `sta_address`, `sta_status`, `sta_created`, `sta_modified`, `sta_sex`, `sta_position`, `tbl_users_use_id`, `sta_start_date`) VALUES
(1, '20334', 'Chantha', NULL, 'chantha@gmail.com', 'Phnom Penh', '', '2014-06-29', NULL, NULL, NULL, NULL, NULL),
(2, '03392', 'Chantha', '??????', 'chantha2@gmail.com', 'Phnom Penh', '', '2014-07-08', NULL, 'm', 'Teacher', NULL, NULL),
(3, '03393', 'borin', 'បូរិន', 'boring@gmail.com', 'Phnom Penh', '\0', '2014-07-08', '2014-07-09', 'm', 'Teacher', NULL, NULL),
(4, '03395', 'Chanthae', 'បូរិន', 'boringw@gmail.com', 'Phnom Penh', '', '2014-07-17', NULL, 'f', 'Teacher', 1, '2014-07-18'),
(5, '03399', 'Chanthaew', 'បូរិន 2', 'borineg@gmail.com', '', '', '2014-07-17', '2014-08-23', 'm', '', 1, '0000-00-00'),
(6, '03388', 'Chanthae2', 'បូរិន2', 'boring4@gmail.com', 'ppooooooooooo', '', '2014-08-15', NULL, 'm', 'Teacher', 1, NULL),
(7, '09999', 'Chanthae44', 'បូរិន44', 'borineg8@gmail.com', 'Phnom Penh', '', '2014-08-15', NULL, 'm', 'Teacher', 1, NULL),
(8, '02222', 'Chanthae22', 'បូរិន222', 'borineg22@gmail.com', 'Phnom Penh', '', '2014-08-15', NULL, 'm', 'Teacher', 1, '2014-08-08'),
(9, '03377', 'Chanthae11', 'បូរិន1', 'borineg21@gmail.com', 'Phnom Penh', '', '2014-08-15', NULL, 'm', 'Teacher', 1, '2014-07-30');

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
  `pos_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pos_modified` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `pos_title_en` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pos_id`),
  UNIQUE KEY `title` (`pos_title_kh`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_staff_position`
--

INSERT INTO `tbl_staff_position` (`pos_id`, `pos_title_kh`, `tbl_users_use_id`, `pos_description`, `pos_status`, `pos_created`, `pos_modified`, `pos_title_en`) VALUES
(1, 'គ្រុរបង្រឿន', 1, '', '', '2014-08-14 17:45:25', '0000-00-00 00:00:00', 'Trainer'),
(2, 'រដ្ខបាល', 1, '', '', '2014-08-16 04:08:40', '0000-00-00 00:00:00', 'Admin'),
(3, '', 1, '', '', '2014-08-17 01:25:16', '0000-00-00 00:00:00', 'dara');

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
  `stu_mother_tel` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_father_email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_mother_email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_father_fax` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_mother_faxl` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_father_current_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_highschool_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_highschool_year` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_highschool_degree` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_highschool_bacii_province` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_highschool_bacii_office` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_highschool_bacii_room` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_highschool_bacii_table` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_highschool_bacii_date` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_job` varchar(250) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`stu_id`, `stu_en_firstname`, `stu_en_lastname`, `stu_dob`, `stu_current_address`, `stu_kh_firstname`, `stu_kh_lastname`, `stu_pob`, `stu_gender`, `stu_nationality`, `stu_marital_status`, `stu_tel`, `stu_email`, `stu_fax`, `stu_father_name`, `stu_father_occupation`, `stu_mother_name`, `stu_mother_occupation`, `stu_father_tel`, `stu_mother_tel`, `stu_father_email`, `stu_mother_email`, `stu_father_fax`, `stu_mother_faxl`, `stu_father_current_address`, `stu_highschool_name`, `stu_highschool_year`, `stu_highschool_degree`, `stu_highschool_bacii_province`, `stu_highschool_bacii_office`, `stu_highschool_bacii_room`, `stu_highschool_bacii_table`, `stu_highschool_bacii_date`, `stu_job`) VALUES
(1, 'jdasdasda', 'jdasdasd', '0000-00-00', 'j', 'jdasdasd', 'adada', 'j', NULL, 'j', NULL, 'j', 'j', 'jjj', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', ''),
(2, 'rwer', 'rwe', '0000-00-00', '', 'erwer', 'erw', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', ''),
(3, 'Sochy', 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', 'Male', 'Khmer', 'Single', '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត'),
(4, 'Sochy', 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', 'Male', 'Khmer', 'Single', '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត'),
(5, 'Sochy', 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', NULL, 'Khmer', NULL, '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត'),
(6, 'Sochy', 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', NULL, 'Khmer', NULL, '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត'),
(7, 'Sochy', 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', NULL, 'Khmer', NULL, '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត'),
(8, 'Sochy', 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', NULL, 'Khmer', NULL, '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត'),
(9, 'Sochy', 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', 'Male', 'Khmer', 'Single', '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត'),
(10, 'Sochy', 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', 'Male', 'Khmer', 'Single', '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត'),
(11, 'Sochy', 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', 'Male', 'Khmer', 'Single', '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត'),
(12, 'Sochy', 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', 'Others', 'Khmer', 'Married', '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត'),
(13, 'Sochy', 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', 'Male', 'Khmer', 'Single', '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_class`
--

CREATE TABLE `tbl_student_class` (
  `stu_cla_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_students_stu_id` int(11) NOT NULL,
  `tbl_class_cla_id` int(11) NOT NULL,
  PRIMARY KEY (`stu_cla_id`),
  KEY `fk_tbl_student_class_tbl_students1_idx` (`tbl_students_stu_id`),
  KEY `fk_tbl_student_class_tbl_class1_idx` (`tbl_class_cla_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(45) DEFAULT NULL,
  `sub_description` varchar(200) DEFAULT NULL,
  `sub_hours` int(11) DEFAULT NULL,
  `sub_status` bit(1) DEFAULT NULL,
  `sub_typ_id` int(11) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`sub_id`, `sub_name`, `sub_description`, `sub_hours`, `sub_status`, `sub_typ_id`) VALUES
(0, 'English Speaking', 'ggdg', 30, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject_type`
--

CREATE TABLE `tbl_subject_type` (
  `sub_typ_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_typ_title` varchar(50) NOT NULL,
  `sub_typ_description` text NOT NULL,
  `sub_typ_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`sub_typ_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_subject_type`
--

INSERT INTO `tbl_subject_type` (`sub_typ_id`, `sub_typ_title`, `sub_typ_description`, `sub_typ_status`) VALUES
(1, 'English', 'English for lab', 1),
(2, 'IT', 'Information Technology', 1);

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
  KEY `index3` (`tas_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_group`
--

CREATE TABLE `tbl_user_group` (
  `use_gro_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_users_use_id` int(11) NOT NULL,
  `tbl_groups_gro_id` int(11) NOT NULL,
  PRIMARY KEY (`use_gro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
-- Constraints for table `tbl_majors`
--
ALTER TABLE `tbl_majors`
  ADD CONSTRAINT `fk_tbl_majors_tbl_faculties1` FOREIGN KEY (`maj_fac_id`) REFERENCES `tbl_faculties` (`fac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_student_class`
--
ALTER TABLE `tbl_student_class`
  ADD CONSTRAINT `fk_tbl_student_class_tbl_class1` FOREIGN KEY (`tbl_class_cla_id`) REFERENCES `tbl_classes` (`cla_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_student_class_tbl_students1` FOREIGN KEY (`tbl_students_stu_id`) REFERENCES `tbl_students` (`stu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
