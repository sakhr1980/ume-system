# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.53-community-log
# Server OS:                    Win64
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2014-10-01 09:45:09
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping database structure for ume_school_db
CREATE DATABASE IF NOT EXISTS `ume_school_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ume_school_db`;


# Dumping structure for table ume_school_db.tbl_cariculars
DROP TABLE IF EXISTS `tbl_cariculars`;
CREATE TABLE IF NOT EXISTS `tbl_cariculars` (
  `car_id` int(11) NOT NULL,
  `car_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `car_status` bit(1) DEFAULT NULL,
  `cur_create_date` date DEFAULT NULL,
  `cur_moditied_date` date DEFAULT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_cariculars: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_cariculars` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cariculars` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_classes
DROP TABLE IF EXISTS `tbl_classes`;
CREATE TABLE IF NOT EXISTS `tbl_classes` (
  `cla_id` int(11) NOT NULL AUTO_INCREMENT,
  `cla_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cla_promotion` int(10) DEFAULT NULL,
  `cla_capacity` int(11) DEFAULT NULL,
  `cla_status` int(11) DEFAULT '1',
  `tbl_shift_shi_id` int(11) NOT NULL,
  `cla_maj_id` int(11) NOT NULL,
  `tbl_generation_gen_id` int(11) NOT NULL,
  `cla_create_date` date DEFAULT NULL,
  `cla_modified_date` date DEFAULT NULL,
  `cla_academic_year` int(11) DEFAULT NULL,
  PRIMARY KEY (`cla_id`,`tbl_shift_shi_id`),
  KEY `fk_tbl_classes_tbl_shift1` (`tbl_shift_shi_id`),
  KEY `fk_tbl_classes_tbl_majors1` (`cla_maj_id`),
  KEY `fk_tbl_classes_tbl_generation1` (`tbl_generation_gen_id`),
  KEY `cla_generation_number` (`cla_promotion`),
  CONSTRAINT `fk_tbl_classes_tbl_generation1` FOREIGN KEY (`tbl_generation_gen_id`) REFERENCES `tbl_generation` (`gen_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_classes_tbl_majors1` FOREIGN KEY (`cla_maj_id`) REFERENCES `tbl_majors` (`maj_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_classes_tbl_shift1` FOREIGN KEY (`tbl_shift_shi_id`) REFERENCES `tbl_shift` (`shi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_classes: ~8 rows (approximately)
/*!40000 ALTER TABLE `tbl_classes` DISABLE KEYS */;
INSERT INTO `tbl_classes` (`cla_id`, `cla_name`, `cla_promotion`, `cla_capacity`, `cla_status`, `tbl_shift_shi_id`, `cla_maj_id`, `tbl_generation_gen_id`, `cla_create_date`, `cla_modified_date`, `cla_academic_year`) VALUES
	(1, 'MM1', 1, 25, 0, 1, 4, 1, '2014-09-02', '2014-09-06', NULL),
	(2, 'HM44', 1, 30, 1, 1, 3, 1, '2014-09-03', '2014-09-06', NULL),
	(3, 'E04', 1, 25, 0, 4, 3, 1, '2014-09-05', '2014-09-06', NULL),
	(4, 'M01', 1, 25, 1, 1, 3, 2, '2014-09-06', NULL, NULL),
	(5, 'M02', 1, 30, 1, 1, 15, 2, '2014-09-06', NULL, NULL),
	(6, 'W01', 1, 25, 1, 4, 15, 1, '2014-09-06', NULL, NULL),
	(7, 'FHM12', 1, 25, 1, 2, 5, 2, '2014-09-20', '2014-09-25', NULL),
	(8, 'W01', NULL, 25, 1, 2, 4, 2, '2014-09-25', '2014-09-25', NULL);
/*!40000 ALTER TABLE `tbl_classes` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_controllers
DROP TABLE IF EXISTS `tbl_controllers`;
CREATE TABLE IF NOT EXISTS `tbl_controllers` (
  `con_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `con_name` varchar(50) DEFAULT NULL,
  `con_controllername` varchar(50) DEFAULT NULL,
  `con_description` text,
  `con_created` timestamp NULL DEFAULT NULL,
  `con_modified` timestamp NULL DEFAULT NULL,
  `con_moduleid` int(11) DEFAULT NULL,
  `con_status` int(1) DEFAULT '1',
  PRIMARY KEY (`con_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

# Dumping data for table ume_school_db.tbl_controllers: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_controllers` DISABLE KEYS */;
INSERT INTO `tbl_controllers` (`con_id`, `con_name`, `con_controllername`, `con_description`, `con_created`, `con_modified`, `con_moduleid`, `con_status`) VALUES
	(1, 'Manage Groups', 'groups', '', '2014-09-25 12:02:15', NULL, 1, 1),
	(3, 'Manage Controllers', 'controllers', '', '2014-09-25 12:05:12', NULL, 1, 1),
	(4, 'Manage Module', 'module', '', '2014-09-25 12:05:37', NULL, 1, 1),
	(5, 'Manage Functions', 'functions', '', '2014-09-25 12:06:04', NULL, 1, 1),
	(6, 'Manage User', 'accounts', '', '2014-09-27 09:12:20', NULL, 1, 1);
/*!40000 ALTER TABLE `tbl_controllers` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_cur_sub
DROP TABLE IF EXISTS `tbl_cur_sub`;
CREATE TABLE IF NOT EXISTS `tbl_cur_sub` (
  `cur_sub_id` int(11) NOT NULL,
  `cur_sub_hours` int(11) DEFAULT NULL,
  `cur_sub_create_date` date DEFAULT NULL,
  `cur_sub_modified_date` date DEFAULT NULL,
  `tbl_cariculars_car_id` int(11) NOT NULL,
  `tbl_subjects_sub_id` int(11) NOT NULL,
  PRIMARY KEY (`cur_sub_id`),
  KEY `fk_tbl_cur_sub_tbl_cariculars1_idx` (`tbl_cariculars_car_id`),
  KEY `fk_tbl_cur_sub_tbl_subjects1_idx` (`tbl_subjects_sub_id`),
  CONSTRAINT `fk_tbl_cur_sub_tbl_cariculars1` FOREIGN KEY (`tbl_cariculars_car_id`) REFERENCES `tbl_cariculars` (`car_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_cur_sub_tbl_subjects1` FOREIGN KEY (`tbl_subjects_sub_id`) REFERENCES `tbl_subjects` (`sub_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_cur_sub: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_cur_sub` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cur_sub` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_experiences
DROP TABLE IF EXISTS `tbl_experiences`;
CREATE TABLE IF NOT EXISTS `tbl_experiences` (
  `exp_id` int(11) NOT NULL AUTO_INCREMENT,
  `exp_date` varchar(45) DEFAULT NULL,
  `exp_position` varchar(45) DEFAULT NULL,
  `exp_shift` tinyint(4) DEFAULT NULL,
  `exp_employer_tel` varchar(45) DEFAULT NULL,
  `exp_responsibility` text,
  `exp_stu_id` int(11) NOT NULL,
  PRIMARY KEY (`exp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_experiences: ~56 rows (approximately)
/*!40000 ALTER TABLE `tbl_experiences` DISABLE KEYS */;
INSERT INTO `tbl_experiences` (`exp_id`, `exp_date`, `exp_position`, `exp_shift`, `exp_employer_tel`, `exp_responsibility`, `exp_stu_id`) VALUES
	(1, '2011 - Present', 'Programming Trainer', 0, '', '', 0),
	(2, '2011 - Present', 'Programming Trainer', 0, '', '', 0),
	(3, '2011 - Present', '', 0, '', '', 0),
	(4, '2011 - Present', '', 0, '', '', 0),
	(5, '2011 - Present', 'Programming Trainer', 0, '', '', 13),
	(6, '2011 - Present', 'Programming Trainer', 0, '', '', 13),
	(7, '', '', NULL, '', '', 15),
	(8, '', '', NULL, '', '', 15),
	(9, 'lj', 'ljlj', 0, 'ljlkj', 'kjljl', 16),
	(10, 'lj', 'ljlj', 0, 'ljlkj', 'kjljl', 16),
	(11, '', '', NULL, '', '', 17),
	(12, '', '', NULL, '', '', 17),
	(13, '', '', NULL, '', '', 18),
	(14, '', '', NULL, '', '', 18),
	(15, '', '', NULL, '', '', 22),
	(16, '', '', NULL, '', '', 22),
	(17, '', '', NULL, '', '', 23),
	(18, '', '', NULL, '', '', 23),
	(19, '', '', NULL, '', '', 24),
	(20, '', '', NULL, '', '', 24),
	(21, '', '', NULL, '', '', 26),
	(22, '', '', NULL, '', '', 26),
	(23, '', '', NULL, '', '', 27),
	(24, '', '', NULL, '', '', 27),
	(25, '', '', NULL, '', '', 28),
	(26, '', '', NULL, '', '', 28),
	(27, '', '', NULL, '', '', 29),
	(28, '', '', NULL, '', '', 29),
	(29, '', '', NULL, '', '', 30),
	(30, '', '', NULL, '', '', 30),
	(31, '', '', NULL, '', '', 32),
	(32, '', '', NULL, '', '', 32),
	(33, '', '', NULL, '', '', 33),
	(34, '', '', NULL, '', '', 33),
	(35, '', '', NULL, '', '', 34),
	(36, '', '', NULL, '', '', 34),
	(37, '', '', NULL, '', '', 35),
	(38, '', '', NULL, '', '', 35),
	(39, '', '', NULL, '', '', 36),
	(40, '', '', NULL, '', '', 36),
	(41, '', '', NULL, '', '', 37),
	(42, '', '', NULL, '', '', 37),
	(43, '', '', 0, '', '', 38),
	(44, '', '', 0, '', '', 38),
	(45, '', '', 0, '', '', 39),
	(46, '', '', 0, '', '', 39),
	(47, '', '', 0, '', '', 41),
	(48, '', '', 0, '', '', 41),
	(49, '', '', NULL, '', '', 44),
	(50, '', '', NULL, '', '', 44),
	(51, '', '', NULL, '', '', 45),
	(52, '', '', NULL, '', '', 45),
	(53, '', '', NULL, '', '', 46),
	(54, '', '', NULL, '', '', 46),
	(55, '', '', NULL, '', '', 47),
	(56, '', '', NULL, '', '', 47);
/*!40000 ALTER TABLE `tbl_experiences` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_faculties
DROP TABLE IF EXISTS `tbl_faculties`;
CREATE TABLE IF NOT EXISTS `tbl_faculties` (
  `fac_id` int(11) NOT NULL AUTO_INCREMENT,
  `fac_name` varchar(45) DEFAULT NULL,
  `fac_kh_name` varchar(300) DEFAULT NULL,
  `fac_abbriviation` varchar(5) DEFAULT NULL,
  `fac_status` bit(1) NOT NULL DEFAULT b'1',
  `fac_description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`fac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_faculties: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_faculties` DISABLE KEYS */;
INSERT INTO `tbl_faculties` (`fac_id`, `fac_name`, `fac_kh_name`, `fac_abbriviation`, `fac_status`, `fac_description`) VALUES
	(1, 'Faculty of Business Administration & Tourism', NULL, 'BAT', '', NULL),
	(2, 'Faculty of Art, Human and Foreign Languages', NULL, 'AHF', '', NULL),
	(3, 'Faculty of Science and Technology', NULL, 'ST', '', NULL),
	(4, 'Faculty of Laws and Economics', NULL, 'LE', '', NULL),
	(5, 'Faculty of Agriculture and Rural Development', NULL, 'AR', '', NULL);
/*!40000 ALTER TABLE `tbl_faculties` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_generation
DROP TABLE IF EXISTS `tbl_generation`;
CREATE TABLE IF NOT EXISTS `tbl_generation` (
  `gen_id` int(11) NOT NULL AUTO_INCREMENT,
  `gen_title` varchar(45) CHARACTER SET ucs2 DEFAULT NULL,
  `gen_start_year` year(4) DEFAULT NULL,
  `gen_end_year` year(4) DEFAULT NULL,
  `gen_created` datetime DEFAULT NULL,
  `gen_modifyd` datetime DEFAULT NULL,
  `gen_status` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`gen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

# Dumping data for table ume_school_db.tbl_generation: ~7 rows (approximately)
/*!40000 ALTER TABLE `tbl_generation` DISABLE KEYS */;
INSERT INTO `tbl_generation` (`gen_id`, `gen_title`, `gen_start_year`, `gen_end_year`, `gen_created`, `gen_modifyd`, `gen_status`) VALUES
	(1, '2012-2013', '2012', '2013', '2014-09-02 22:14:35', '2014-09-02 22:14:37', ''),
	(2, '2013-2014', '2013', '2014', '2014-09-05 08:50:33', NULL, ''),
	(3, '2014-2015', '2014', '2015', NULL, NULL, ''),
	(4, '2015-2016', '2015', '2016', NULL, NULL, ''),
	(5, '2016-2017', '2016', '2017', NULL, NULL, ''),
	(6, '2017-2018', '2017', '2018', NULL, NULL, ''),
	(7, '2017-2018', '2017', '2018', NULL, NULL, '');
/*!40000 ALTER TABLE `tbl_generation` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_groups
DROP TABLE IF EXISTS `tbl_groups`;
CREATE TABLE IF NOT EXISTS `tbl_groups` (
  `gro_id` int(11) NOT NULL AUTO_INCREMENT,
  `gro_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gro_status` int(1) DEFAULT NULL,
  `gro_created` timestamp NULL DEFAULT NULL,
  `gro_modified` timestamp NULL DEFAULT NULL,
  `gro_description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`gro_id`),
  KEY `index2` (`gro_id`,`gro_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_groups: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_groups` DISABLE KEYS */;
INSERT INTO `tbl_groups` (`gro_id`, `gro_name`, `gro_status`, `gro_created`, `gro_modified`, `gro_description`) VALUES
	(1, 'super', 1, '2014-09-27 09:32:43', '2014-09-27 05:16:03', 'Admin group'),
	(2, 'HR', 1, '2014-09-27 07:24:32', '2014-09-27 05:14:40', 'Test group'),
	(3, 'Teacher', 1, '2014-09-27 07:24:32', '2014-09-27 05:14:47', 'Test group'),
	(5, 'Test', 1, '2014-09-27 08:02:04', NULL, 'Test group');
/*!40000 ALTER TABLE `tbl_groups` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_group_task
DROP TABLE IF EXISTS `tbl_group_task`;
CREATE TABLE IF NOT EXISTS `tbl_group_task` (
  `grotas_id` int(11) NOT NULL AUTO_INCREMENT,
  `grotas_groupid` int(11) NOT NULL,
  `grotas_taskid` int(11) NOT NULL,
  PRIMARY KEY (`grotas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_group_task: ~25 rows (approximately)
/*!40000 ALTER TABLE `tbl_group_task` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `tbl_group_task` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_majors
DROP TABLE IF EXISTS `tbl_majors`;
CREATE TABLE IF NOT EXISTS `tbl_majors` (
  `maj_id` int(11) NOT NULL,
  `maj_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maj_kh_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maj_status` bit(1) DEFAULT b'1',
  `maj_abbriviation` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maj_fac_id` int(11) NOT NULL,
  PRIMARY KEY (`maj_id`),
  KEY `fk_tbl_majors_tbl_faculties1` (`maj_fac_id`),
  CONSTRAINT `fk_tbl_majors_tbl_faculties1` FOREIGN KEY (`maj_fac_id`) REFERENCES `tbl_faculties` (`fac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_majors: ~16 rows (approximately)
/*!40000 ALTER TABLE `tbl_majors` DISABLE KEYS */;
INSERT INTO `tbl_majors` (`maj_id`, `maj_name`, `maj_kh_name`, `maj_status`, `maj_abbriviation`, `maj_fac_id`) VALUES
	(3, ' Human Resource Management', '', '', 'HR', 1),
	(4, 'Marketing Management', '', '', 'MM', 1),
	(5, 'International Business Management', '', '', 'IB', 1),
	(6, 'Accounting & Finance', '', '', 'AC', 1),
	(7, 'Banking and Finance', '', '', 'BF', 1),
	(8, 'Tourism and Hospitality', '', '', 'TH', 1),
	(10, 'Tourism Guide', '', '', 'TG', 1),
	(11, 'Project Management', '', '', 'PM', 1),
	(12, 'English Translation', '', '', 'ENT', 2),
	(13, 'English Teaching', '', '', 'EN', 2),
	(14, 'English Communication', '', '', 'ENC', 2),
	(15, 'Computer Science (Programming, Networking & M', '', '', 'CS', 3),
	(16, 'Laws', '', '', 'LA', 4),
	(17, 'Economics', '', '', 'EC', 4),
	(18, 'Agronomy', '', '', 'AG', 5),
	(19, 'Rural Development', '', '', 'RD', 5);
/*!40000 ALTER TABLE `tbl_majors` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_modules
DROP TABLE IF EXISTS `tbl_modules`;
CREATE TABLE IF NOT EXISTS `tbl_modules` (
  `mod_id` int(11) NOT NULL AUTO_INCREMENT,
  `mod_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_foldername` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_status` int(1) DEFAULT '1',
  `mod_created` timestamp NULL DEFAULT NULL,
  `mod_modified` timestamp NULL DEFAULT NULL,
  `mod_description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`mod_id`),
  KEY `index2` (`mod_id`,`mod_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_modules: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_modules` DISABLE KEYS */;
INSERT INTO `tbl_modules` (`mod_id`, `mod_name`, `mod_foldername`, `mod_status`, `mod_created`, `mod_modified`, `mod_description`) VALUES
	(1, 'User Management', 'users', 1, '2014-09-25 12:01:38', NULL, '');
/*!40000 ALTER TABLE `tbl_modules` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_room
DROP TABLE IF EXISTS `tbl_room`;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

# Dumping data for table ume_school_db.tbl_room: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_room` DISABLE KEYS */;
INSERT INTO `tbl_room` (`rom_id`, `tbl_room_type_rom_typ_id`, `rom_name`, `rom_building`, `rom_floor`, `rom_available_people`, `rom_status`, `rom_created`, `rom_modified`) VALUES
	(3, 5, 'A20', 'BC', 2, 25, '', '2014-08-16', '2014-08-16'),
	(4, 5, 'A02', 'BC', 2, 25, '', '2014-08-30', '2014-08-31'),
	(5, 6, 'A03', 'C', 1, 45, '', '2014-08-30', NULL),
	(6, 5, 'A04', 'BC', 2, 25, '', '2014-08-30', NULL),
	(7, 7, 'A09', 'BC', 2, 25, '', '2014-08-31', NULL);
/*!40000 ALTER TABLE `tbl_room` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_room_type
DROP TABLE IF EXISTS `tbl_room_type`;
CREATE TABLE IF NOT EXISTS `tbl_room_type` (
  `rom_typ_id` int(11) NOT NULL AUTO_INCREMENT,
  `rom_typ_name` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `rom_typ_description` varchar(250) CHARACTER SET utf8 DEFAULT NULL,
  `rom_typ_status` bit(1) NOT NULL DEFAULT b'1',
  `rom_typ_created` date NOT NULL,
  `rom_typ_modified` date DEFAULT NULL,
  PRIMARY KEY (`rom_typ_id`),
  UNIQUE KEY `rom_typ_name` (`rom_typ_name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_room_type: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_room_type` DISABLE KEYS */;
INSERT INTO `tbl_room_type` (`rom_typ_id`, `rom_typ_name`, `rom_typ_description`, `rom_typ_status`, `rom_typ_created`, `rom_typ_modified`) VALUES
	(4, 'Lab Computer', 'For student IT practice', '', '2014-08-16', NULL),
	(5, 'Normal Room', '', '', '2014-08-16', NULL),
	(6, 'Big Room', '', '', '2014-08-16', NULL),
	(7, 'Big Room 1', 'For student IT practice', '', '2014-08-31', NULL);
/*!40000 ALTER TABLE `tbl_room_type` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_schadule
DROP TABLE IF EXISTS `tbl_schadule`;
CREATE TABLE IF NOT EXISTS `tbl_schadule` (
  `sch_id` int(11) NOT NULL AUTO_INCREMENT,
  `sch_created` datetime DEFAULT NULL,
  `sch_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tbl_classes_cla_id` int(11) DEFAULT NULL,
  `sch_academic_year` varchar(45) DEFAULT NULL,
  `sch_semester` int(11) DEFAULT NULL,
  `sch_year_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`sch_id`),
  KEY `fk_tbl_schadule_tbl_majors1` (`tbl_classes_cla_id`),
  CONSTRAINT `fk_tbl_schadule_tbl_classes1` FOREIGN KEY (`tbl_classes_cla_id`) REFERENCES `tbl_classes` (`cla_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_schadule: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_schadule` DISABLE KEYS */;
INSERT INTO `tbl_schadule` (`sch_id`, `sch_created`, `sch_modified`, `tbl_classes_cla_id`, `sch_academic_year`, `sch_semester`, `sch_year_number`) VALUES
	(7, '2014-09-07 04:17:06', '2014-09-06 08:43:54', 4, '2013-2014', 1, 1),
	(8, '2014-09-07 04:16:12', '2014-09-07 04:15:22', 5, '2013-2014', 1, 1);
/*!40000 ALTER TABLE `tbl_schadule` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_schadule_detail
DROP TABLE IF EXISTS `tbl_schadule_detail`;
CREATE TABLE IF NOT EXISTS `tbl_schadule_detail` (
  `scd_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_schadule_sch_id` int(11) DEFAULT NULL,
  `tbl_staffs_sta_id` int(11) DEFAULT NULL,
  `scd_time` varchar(50) DEFAULT NULL,
  `scd_day` int(11) DEFAULT NULL,
  `scd_section` int(11) DEFAULT NULL,
  `tbl_room_rom_id` int(11) DEFAULT NULL,
  `tbl_subject_sub_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`scd_id`),
  KEY `fk_tbl_schadule_detail_tbl_schadule1` (`tbl_schadule_sch_id`),
  KEY `fk_tbl_schadule_detail_tbl_staffs1` (`tbl_staffs_sta_id`),
  KEY `fk_tbl_schadule_detail_tbl_room1` (`tbl_room_rom_id`),
  KEY `fk_tbl_schadule_detail_tbl_subject1` (`tbl_subject_sub_id`),
  CONSTRAINT `fk_tbl_schadule_detail_tbl_room1` FOREIGN KEY (`tbl_room_rom_id`) REFERENCES `tbl_room` (`rom_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_schadule_detail_tbl_schadule1` FOREIGN KEY (`tbl_schadule_sch_id`) REFERENCES `tbl_schadule` (`sch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_schadule_detail_tbl_staff1` FOREIGN KEY (`tbl_staffs_sta_id`) REFERENCES `tbl_staff` (`sta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_schadule_detail_tbl_subject1` FOREIGN KEY (`tbl_subject_sub_id`) REFERENCES `tbl_subject` (`sub_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_schadule_detail: ~25 rows (approximately)
/*!40000 ALTER TABLE `tbl_schadule_detail` DISABLE KEYS */;
INSERT INTO `tbl_schadule_detail` (`scd_id`, `tbl_schadule_sch_id`, `tbl_staffs_sta_id`, `scd_time`, `scd_day`, `scd_section`, `tbl_room_rom_id`, `tbl_subject_sub_id`) VALUES
	(186, 8, 7, '7:30-9:30', 1, 1, 4, 6),
	(187, 8, NULL, '7:30-9:30', 2, 1, NULL, NULL),
	(188, 8, NULL, '7:30-9:30', 3, 1, NULL, NULL),
	(189, 8, NULL, '7:30-9:30', 4, 1, NULL, NULL),
	(190, 8, NULL, '7:30-9:30', 5, 1, NULL, NULL),
	(191, 8, 6, '9:30-10:30', 1, 2, 3, 5),
	(192, 8, NULL, '9:30-10:30', 2, 2, NULL, NULL),
	(193, 8, NULL, '9:30-10:30', 3, 2, NULL, NULL),
	(194, 8, NULL, '9:30-10:30', 4, 2, NULL, NULL),
	(195, 8, NULL, '9:30-10:30', 5, 2, NULL, NULL),
	(196, 7, 4, '7:30-9:30', 1, 1, 3, 1),
	(197, 7, NULL, '7:30-9:30', 2, 1, NULL, NULL),
	(198, 7, NULL, '7:30-9:30', 3, 1, NULL, NULL),
	(199, 7, NULL, '7:30-9:30', 4, 1, NULL, NULL),
	(200, 7, NULL, '7:30-9:30', 5, 1, NULL, NULL),
	(201, 7, 7, '9:30-10:30', 1, 2, 5, 6),
	(202, 7, NULL, '9:30-10:30', 2, 2, NULL, NULL),
	(203, 7, NULL, '9:30-10:30', 3, 2, NULL, NULL),
	(204, 7, NULL, '9:30-10:30', 4, 2, NULL, NULL),
	(205, 7, NULL, '9:30-10:30', 5, 2, NULL, NULL),
	(206, 7, 7, '10:45-12:00', 1, 3, 3, 6),
	(207, 7, 4, '10:45-12:00', 2, 3, 3, 5),
	(208, 7, NULL, '10:45-12:00', 3, 3, 5, 6),
	(209, 7, NULL, '10:45-12:00', 4, 3, NULL, NULL),
	(210, 7, NULL, '10:45-12:00', 5, 3, NULL, NULL);
/*!40000 ALTER TABLE `tbl_schadule_detail` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_shift
DROP TABLE IF EXISTS `tbl_shift`;
CREATE TABLE IF NOT EXISTS `tbl_shift` (
  `shi_id` int(11) NOT NULL AUTO_INCREMENT,
  `shi_name` varchar(45) DEFAULT NULL,
  `shi_status` bigint(20) DEFAULT NULL,
  `shi_abbriviation` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`shi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_shift: ~6 rows (approximately)
/*!40000 ALTER TABLE `tbl_shift` DISABLE KEYS */;
INSERT INTO `tbl_shift` (`shi_id`, `shi_name`, `shi_status`, `shi_abbriviation`) VALUES
	(1, 'Moning', 1, 'M'),
	(2, 'Afternoon', 1, 'A'),
	(3, 'Everning', 1, 'E'),
	(4, 'Weeken', 1, 'W'),
	(5, '????????', 0, NULL),
	(6, '???????', 0, NULL);
/*!40000 ALTER TABLE `tbl_shift` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_staff
DROP TABLE IF EXISTS `tbl_staff`;
CREATE TABLE IF NOT EXISTS `tbl_staff` (
  `sta_id` int(11) NOT NULL AUTO_INCREMENT,
  `sta_card_id` char(5) NOT NULL,
  `sta_name` varchar(45) DEFAULT NULL,
  `sta_name_kh` varchar(50) NOT NULL,
  `sta_status` bit(1) DEFAULT b'1',
  `sta_position` varchar(150) DEFAULT NULL,
  `sta_job_type` int(11) NOT NULL,
  `sta_start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sta_email` varchar(45) DEFAULT NULL,
  `sta_phone` varchar(30) DEFAULT NULL,
  `sta_sex` char(1) NOT NULL,
  `sta_address` varchar(200) DEFAULT NULL,
  `sta_created` timestamp NULL DEFAULT NULL,
  `sta_modified` timestamp NULL DEFAULT NULL,
  `tbl_users_use_id` int(11) NOT NULL,
  PRIMARY KEY (`sta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

# Dumping data for table ume_school_db.tbl_staff: ~8 rows (approximately)
/*!40000 ALTER TABLE `tbl_staff` DISABLE KEYS */;
INSERT INTO `tbl_staff` (`sta_id`, `sta_card_id`, `sta_name`, `sta_name_kh`, `sta_status`, `sta_position`, `sta_job_type`, `sta_start_date`, `sta_email`, `sta_phone`, `sta_sex`, `sta_address`, `sta_created`, `sta_modified`, `tbl_users_use_id`) VALUES
	(2, '03392', 'borin', 'បូរិន', '', '5', 4, '2014-08-28 17:00:00', '', '', 'f', '', '2014-08-26 18:01:26', NULL, 1),
	(3, '43434', '4rrwer', 'erwer', '', 'Teacher', 0, '2014-08-31 01:57:03', 'souophea@gmail.com', NULL, 'm', '', '2014-08-29 15:30:27', '2014-08-31 01:57:03', 1),
	(4, '43439', 'sophea', 'សុភា', '', 'Teacher', 0, '2014-08-31 01:56:33', 'fsd@fsdf.sdf', NULL, 'f', 'Phnom Penh', '2014-08-31 01:50:14', '2014-08-31 01:56:33', 1),
	(5, '53453', '434', 'សុភា', '', '5', 4, '0000-00-00 00:00:00', '', '', 'm', '', '2014-09-01 16:44:27', '2014-09-06 11:26:48', 1),
	(6, '03390', 'borin', 'បូរិន', '', 'Teacher', 0, '2014-09-05 01:28:38', 'boring@gmail.com', NULL, 'm', 'Phnom Penh', '2014-09-05 01:28:38', NULL, 1),
	(7, '03329', 'Chana', 'ចាន់ណា', '', 'Teacher', 0, '2014-09-06 05:31:18', 'chana@gmail.com', NULL, 'm', 'Phnom Penh', '2014-09-06 05:31:18', NULL, 1),
	(8, '43435', 'FASDFA', 'FASDFA', '', '6', 4, '2014-08-31 17:00:00', 'souopheDa@gmail.com', '4344234234', 'f', 'FSDFSDF', '2014-09-06 11:57:37', '2014-09-06 11:57:45', 1),
	(9, '43423', 'LJLKJ', 'JLKJ', '', '5', 4, '2014-09-08 17:00:00', 'souopheFSDa@gmail.com', '8797897979', 'm', '', '2014-09-06 11:58:29', NULL, 1);
/*!40000 ALTER TABLE `tbl_staff` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_staff_evaluation
DROP TABLE IF EXISTS `tbl_staff_evaluation`;
CREATE TABLE IF NOT EXISTS `tbl_staff_evaluation` (
  `sta_eva_id` int(10) NOT NULL AUTO_INCREMENT,
  `sta_eva_ability_a` float NOT NULL DEFAULT '0',
  `sta_eva_ability_b` float NOT NULL DEFAULT '0',
  `sta_eva_ability_c` float NOT NULL DEFAULT '0',
  `sta_eva_ability_d` float NOT NULL DEFAULT '0',
  `sta_eva_ability_e` float NOT NULL DEFAULT '0',
  `sta_eva_characteristic_a` float NOT NULL DEFAULT '0',
  `sta_eva_characteristic_b` float NOT NULL DEFAULT '0',
  `sta_eva_characteristic_c` float NOT NULL DEFAULT '0',
  `sta_eva_characteristic_d` float NOT NULL DEFAULT '0',
  `sta_eva_characteristic_e` float NOT NULL DEFAULT '0',
  `sta_eva_attendant_a` float NOT NULL DEFAULT '0',
  `sta_eva_attendant_b` float NOT NULL DEFAULT '0',
  `sta_eva_attendant_c` float NOT NULL DEFAULT '0',
  `sta_eva_attendant_d` float NOT NULL DEFAULT '0',
  `sta_eva_attendant_e` float NOT NULL DEFAULT '0',
  `sta_eva_idea_a` float NOT NULL DEFAULT '0',
  `sta_eva_idea_b` float NOT NULL DEFAULT '0',
  `sta_eva_idea_c` float NOT NULL DEFAULT '0',
  `sta_eva_idea_d` float NOT NULL DEFAULT '0',
  `sta_eva_idea_e` float NOT NULL DEFAULT '0',
  `sta_eva_created` datetime DEFAULT NULL,
  `sta_eva_modified` datetime DEFAULT NULL,
  `sta_id` int(10) DEFAULT NULL,
  `user_process` int(10) DEFAULT NULL,
  PRIMARY KEY (`sta_eva_id`),
  KEY `sta_id` (`sta_id`),
  KEY `user_process` (`user_process`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_staff_evaluation: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_staff_evaluation` DISABLE KEYS */;
INSERT INTO `tbl_staff_evaluation` (`sta_eva_id`, `sta_eva_ability_a`, `sta_eva_ability_b`, `sta_eva_ability_c`, `sta_eva_ability_d`, `sta_eva_ability_e`, `sta_eva_characteristic_a`, `sta_eva_characteristic_b`, `sta_eva_characteristic_c`, `sta_eva_characteristic_d`, `sta_eva_characteristic_e`, `sta_eva_attendant_a`, `sta_eva_attendant_b`, `sta_eva_attendant_c`, `sta_eva_attendant_d`, `sta_eva_attendant_e`, `sta_eva_idea_a`, `sta_eva_idea_b`, `sta_eva_idea_c`, `sta_eva_idea_d`, `sta_eva_idea_e`, `sta_eva_created`, `sta_eva_modified`, `sta_id`, `user_process`) VALUES
	(1, 9, 9, 9, 9, 99, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, '2014-08-30 21:07:55', NULL, 2, 1);
/*!40000 ALTER TABLE `tbl_staff_evaluation` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_staff_job_type
DROP TABLE IF EXISTS `tbl_staff_job_type`;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

# Dumping data for table ume_school_db.tbl_staff_job_type: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_staff_job_type` DISABLE KEYS */;
INSERT INTO `tbl_staff_job_type` (`sta_job_id`, `sta_job_title`, `sta_job_title_kh`, `sta_job_description`, `sta_job_status`, `sta_job_created`, `sta_job_modified`, `tbl_users_use_id`) VALUES
	(4, 'Full time', 'ពេញម៉ោង', '', '', '2014-08-26 18:00:09', NULL, 1),
	(5, 'Part time', 'កន្លះថ្ងៃ', '', '', '2014-08-26 18:00:46', NULL, 1);
/*!40000 ALTER TABLE `tbl_staff_job_type` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_staff_position
DROP TABLE IF EXISTS `tbl_staff_position`;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

# Dumping data for table ume_school_db.tbl_staff_position: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_staff_position` DISABLE KEYS */;
INSERT INTO `tbl_staff_position` (`sta_pos_id`, `sta_pos_title`, `sta_pos_title_kh`, `sta_pos_description`, `sta_pos_status`, `sta_pos_created`, `sta_pos_modified`, `tbl_users_use_id`) VALUES
	(5, 'Trainer', 'គ្រូបង្រោៀន', '', '', '2014-08-26 17:58:43', '0000-00-00 00:00:00', 1),
	(6, 'HR', 'រដ្ថបាល', '', '', '2014-08-26 17:59:31', '0000-00-00 00:00:00', 1),
	(7, 'HR35', 'គ្រូបង្រោៀន3', '', '', '2014-08-29 14:51:28', '2014-08-29 14:51:28', 1);
/*!40000 ALTER TABLE `tbl_staff_position` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_students
DROP TABLE IF EXISTS `tbl_students`;
CREATE TABLE IF NOT EXISTS `tbl_students` (
  `stu_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_en_firstname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_number` int(11) DEFAULT NULL,
  `stu_en_lastname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_kh_firstname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_kh_lastname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_card_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_counter_number` int(11) DEFAULT NULL,
  `stu_dob` date DEFAULT NULL,
  `stu_current_address` text COLLATE utf8_unicode_ci,
  `stu_pob` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_nationality` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
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
  `stu_study_type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_descount` int(11) DEFAULT NULL,
  `stu_job` varchar(250) CHARACTER SET utf8 NOT NULL,
  `stu_degree` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stu_score_status` bit(1) DEFAULT b'0',
  PRIMARY KEY (`stu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_students: 40 rows
/*!40000 ALTER TABLE `tbl_students` DISABLE KEYS */;
INSERT INTO `tbl_students` (`stu_id`, `stu_en_firstname`, `stu_number`, `stu_en_lastname`, `stu_kh_firstname`, `stu_kh_lastname`, `stu_card_id`, `stu_counter_number`, `stu_dob`, `stu_current_address`, `stu_pob`, `stu_gender`, `stu_nationality`, `stu_marital_status`, `stu_tel`, `stu_email`, `stu_fax`, `stu_father_name`, `stu_father_occupation`, `stu_mother_name`, `stu_mother_occupation`, `stu_father_tel`, `stu_mother_tel`, `stu_father_email`, `stu_mother_email`, `stu_father_fax`, `stu_mother_faxl`, `stu_father_current_address`, `stu_highschool_name`, `stu_highschool_year`, `stu_highschool_degree`, `stu_highschool_bacii_province`, `stu_highschool_bacii_office`, `stu_highschool_bacii_room`, `stu_highschool_bacii_table`, `stu_highschool_bacii_date`, `stu_study_type`, `stu_descount`, `stu_job`, `stu_degree`, `stu_score_status`) VALUES
	(1, '22', NULL, '22', '22', '22', NULL, NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'មានការងារធ្វើ', '', ''),
	(30, 'dfd', NULL, 'Bora', 'dfd', 'vong', NULL, NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'មានការងារធ្វើ', '', ''),
	(3, 'Sochy', NULL, 'Choeun', 'សុជី', 'ជឿន', NULL, NULL, '1988-11-08', '', 'OdorMeanChey', 'Male', 'Khmer', 'Single', '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', NULL, NULL, 'ជានិស្សិត', '', ''),
	(4, 'សុជី', NULL, 'Choeun', 'សុជី', 'សុជី', NULL, NULL, '0000-00-00', '', '', 'Male', '', 'Single', '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'មានការងារធ្វើ', '', ''),
	(31, 'as', NULL, 'as', 'as', 'dasd', NULL, NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'មានការងារធ្វើ', '', ''),
	(32, 'as', NULL, 'as', 'as', 'dasd', NULL, NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'មានការងារធ្វើ', '', ''),
	(5, 'Sochy', NULL, 'Choeun', 'សុជី', 'ជឿន', NULL, NULL, '1988-11-08', '', 'OdorMeanChey', NULL, 'Khmer', NULL, '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', NULL, NULL, 'ជានិស្សិត', '', ''),
	(6, 'Sochy', NULL, 'Choeun', 'សុជី', 'ជឿន', NULL, NULL, '1988-11-08', '', 'OdorMeanChey', NULL, 'Khmer', NULL, '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', NULL, NULL, 'ជានិស្សិត', '', ''),
	(7, 'Sochy', NULL, 'Choeun', 'សុជី', 'ជឿន', NULL, NULL, '1988-11-08', '', 'OdorMeanChey', NULL, 'Khmer', NULL, '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', NULL, NULL, 'ជានិស្សិត', '', ''),
	(8, 'Sochy', NULL, 'Choeun', 'សុជី', 'ជឿន', NULL, NULL, '1988-11-08', '', 'OdorMeanChey', NULL, 'Khmer', NULL, '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', NULL, NULL, 'ជានិស្សិត', '', ''),
	(9, 'Sochy', NULL, 'Choeun', 'សុជី', 'ជឿន', NULL, NULL, '1988-11-08', '', 'OdorMeanChey', 'Male', 'Khmer', 'Single', '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', NULL, NULL, 'ជានិស្សិត', '', ''),
	(10, 'Sochy', NULL, 'Choeun', 'សុជី', 'ជឿន', NULL, NULL, '1988-11-08', '', 'OdorMeanChey', 'Male', 'Khmer', 'Single', '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', NULL, NULL, 'ជានិស្សិត', '', ''),
	(11, 'Sochy', NULL, 'Choeun', 'សុជី', 'ជឿន', NULL, NULL, '1988-11-08', '', 'OdorMeanChey', 'Male', 'Khmer', 'Single', '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', NULL, NULL, 'ជានិស្សិត', '', ''),
	(12, 'Sochy', NULL, 'Choeun', 'សុជី', 'ជឿន', NULL, NULL, '1988-11-08', '', 'OdorMeanChey', 'Others', 'Khmer', 'Married', '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', NULL, NULL, 'ជានិស្សិត', '', ''),
	(13, 'Sochy', NULL, 'Choeun', 'សុជី', 'ជឿន', NULL, NULL, '1988-11-08', '', 'OdorMeanChey', 'Male', 'Khmer', 'Single', '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', NULL, NULL, 'ជានិស្សិត', '', ''),
	(14, 'fadf', NULL, 'fadsf', 'fasdf', 'fadf', NULL, NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', ''),
	(15, 'fadf', NULL, 'fadsf', 'fasdf', 'fadf', NULL, NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', ''),
	(16, 'fasdf', NULL, 'fadf', 'fadf', 'fsa', NULL, NULL, '0000-00-00', '', '', 'Female', 'dfad', 'Single', 'fadf', 'fla', '', 'fasdf', 'lj', 'lj', 'ljl', NULL, 'lj', NULL, 'kkljl', NULL, 'jl', 'lkj', 'lkj', 'f', 'lj', 'kjljkl', 'ljkjl', 'ljljl', 'jkjljk', 'jkljk', NULL, NULL, 'ជានិស្សិត', '', ''),
	(17, 'fsadfadsf', NULL, 'fasdf', 'fadfadf', 'fsdafasdf', NULL, NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'មានការងារធ្វើ', '', ''),
	(18, 'fadsf', NULL, 'fdf', ' អ៊ូ', 'ពន្លីរស្មីសុភា', NULL, NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', ''),
	(19, 'fadsf', NULL, 'fadf', 'fadf', 'dfadf', NULL, NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', ''),
	(20, 'fadsf', NULL, 'fadf', 'fadf', 'dfadf', NULL, NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', ''),
	(21, 'fadsf', NULL, 'fadf', 'fadf', 'dfadf', NULL, NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', ''),
	(22, 'fadsf', NULL, 'fadf', 'fadf', 'dfadf', NULL, NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', ''),
	(23, 'fsdafdasd', NULL, 'fsdf', 'fasdf', 'dfasdf', NULL, NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', ''),
	(24, 'ljkljl', NULL, 'ljj', 'ljkjl', 'fsdf', NULL, NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', ''),
	(25, 'fasdfasd', NULL, 'fsdfsdf', 'fadf', 'fsf', NULL, NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', ''),
	(26, 'fasdfasd', NULL, 'fsadfa', 'fadfa', 'fadf', NULL, NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', ''),
	(28, 'klj', NULL, 'hhkjh', 'klj', 'klj', NULL, NULL, '0000-00-00', '', '', 'Male', '', 'Married', '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'មានការងារធ្វើ', '', ''),
	(29, '111', NULL, '111', '111', '111', NULL, NULL, '0000-00-00', '', '', 'Others', '', 'Single', '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'ជានិស្សិត', '', ''),
	(33, 'fasdfasdf', NULL, 'dfads', 'adfasdf', 'dfsd', NULL, NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'មានការងារធ្វើ', '', ''),
	(44, 'អ៊ូ', NULL, 'aaa', 'អ៊ូ', 'អ៊ូ', '3', NULL, '0000-00-00', '', '', NULL, '', NULL, '2', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'មានការងារធ្វើ', '', ''),
	(45, 'fsfs', NULL, 'bb', 'hfghf', 'fsfs', 'M-HR-1-004', NULL, '0000-00-00', '', '', 'Male', '', NULL, '2', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'មានការងារធ្វើ', '', ''),
	(36, 'ou', NULL, 'sophea', 'ou', 'ou', 'M-HR-1-017', NULL, '0000-00-00', '', '', NULL, '', NULL, '2', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'មានការងារធ្វើ', '', ''),
	(37, 'hfghg', NULL, 'hfghf', 'hfghf', 'hfghg', 'M-MM-1-005', NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'មានការងារធ្វើ', '', ''),
	(40, 'fadf', NULL, 'fadf', '', '', '--1-001', NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'មានការងារធ្វើ', '', ''),
	(42, 'fadf ', NULL, 'fadf', '', '', 'M-TG-1-001', NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'មានការងារធ្វើ', '', ''),
	(43, 'fadf ', NULL, 'fadf', '', '', '--1-001', NULL, '0000-00-00', '', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'មានការងារធ្វើ', '', ''),
	(46, 'ddd', NULL, 'ddd', '', 'ddd', 'W-PM-3-009', NULL, '0000-00-00', '', '', 'Male', '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'ជានិស្សិត', '', ''),
	(47, 'dddsss', NULL, 'aa', '', 'dddsss', 'M-HR-2-019', NULL, '0000-00-00', '', '', 'Male', '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', NULL, NULL, 'មានការងារធ្វើ', '', '');
/*!40000 ALTER TABLE `tbl_students` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_student_class
DROP TABLE IF EXISTS `tbl_student_class`;
CREATE TABLE IF NOT EXISTS `tbl_student_class` (
  `stu_cla_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_students_stu_id` int(11) NOT NULL,
  `tbl_class_cla_id` int(11) NOT NULL,
  `stucla_year_study` int(10) DEFAULT NULL,
  `stucla_degree` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stucla_fee` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stucla_description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stucla_id_card` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stucla_percentage` int(11) DEFAULT NULL,
  PRIMARY KEY (`stu_cla_id`),
  KEY `fk_tbl_student_class_tbl_students1_idx` (`tbl_students_stu_id`),
  KEY `fk_tbl_student_class_tbl_class1_idx` (`tbl_class_cla_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_student_class: ~11 rows (approximately)
/*!40000 ALTER TABLE `tbl_student_class` DISABLE KEYS */;
INSERT INTO `tbl_student_class` (`stu_cla_id`, `tbl_students_stu_id`, `tbl_class_cla_id`, `stucla_year_study`, `stucla_degree`, `stucla_fee`, `stucla_description`, `stucla_id_card`, `stucla_percentage`) VALUES
	(1, 34, 2, 1, 'BB', NULL, NULL, NULL, NULL),
	(2, 35, 2, 1, 'BB', NULL, NULL, NULL, NULL),
	(3, 36, 2, 1, 'MS', NULL, NULL, NULL, NULL),
	(4, 37, 1, 4, 'BB', NULL, NULL, NULL, NULL),
	(5, 38, 2, 1, 'BB', NULL, NULL, NULL, NULL),
	(6, 39, 2, 1, 'BB', NULL, NULL, NULL, NULL),
	(7, 41, 2, 1, 'BB', NULL, NULL, NULL, NULL),
	(8, 44, 2, 4, 'BB', NULL, NULL, NULL, NULL),
	(9, 45, 2, 4, 'BB', NULL, NULL, NULL, NULL),
	(10, 46, 8, 5, 'MS', NULL, NULL, NULL, NULL),
	(11, 47, 2, 2, 'MS', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `tbl_student_class` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_student_payments
DROP TABLE IF EXISTS `tbl_student_payments`;
CREATE TABLE IF NOT EXISTS `tbl_student_payments` (
  `sp_id` int(11) NOT NULL AUTO_INCREMENT,
  `sp_stu_id` int(11) DEFAULT NULL,
  `tbl_users_id` int(11) DEFAULT NULL,
  `sp_cla_id` int(11) DEFAULT NULL,
  `sp_sdate` date DEFAULT NULL,
  `sp_edate` date DEFAULT NULL,
  `sp_year` int(11) DEFAULT NULL,
  `sp_balance` int(11) DEFAULT NULL,
  `sp_status` int(11) DEFAULT NULL,
  `sp_fee` int(11) DEFAULT NULL,
  `sp_comment` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_student_payments: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_student_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_student_payments` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_student_score
DROP TABLE IF EXISTS `tbl_student_score`;
CREATE TABLE IF NOT EXISTS `tbl_student_score` (
  `stu_sco_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_generation_gen_id` int(11) NOT NULL DEFAULT '0',
  `tbl_majors_maj_id` int(11) NOT NULL DEFAULT '0',
  `tbl_shift_shi_id` int(11) NOT NULL DEFAULT '0',
  `tbl_classes_cla_id` int(11) NOT NULL DEFAULT '0',
  `tbl_students_stu_id` int(11) NOT NULL DEFAULT '0',
  `stu_sco_attendance` double(5,2) DEFAULT '0.00' COMMENT 'Attendance 10%',
  `stu_sco_homework` double(5,2) DEFAULT '0.00' COMMENT 'Homework, Quiz, and Assignment 15%',
  `stu_sco_midterm_exam` double(5,2) DEFAULT '0.00' COMMENT 'Midterm exam 25%',
  `stu_sco_final_exam` double(5,2) DEFAULT '0.00' COMMENT 'Final exam 50%',
  `stu_sco_average` double(5,2) DEFAULT '0.00' COMMENT 'Total average of all scores type',
  `stu_sco_rank` int(11) DEFAULT '0',
  `stu_sco_mention` char(1) DEFAULT NULL,
  `stu_sco_gpa` double(5,2) DEFAULT '0.00',
  `stu_sco_created` date NOT NULL,
  `stu_sco_modified` date DEFAULT NULL,
  `stu_sco_semester` int(11) DEFAULT NULL,
  PRIMARY KEY (`stu_sco_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

# Dumping data for table ume_school_db.tbl_student_score: ~8 rows (approximately)
/*!40000 ALTER TABLE `tbl_student_score` DISABLE KEYS */;
INSERT INTO `tbl_student_score` (`stu_sco_id`, `tbl_generation_gen_id`, `tbl_majors_maj_id`, `tbl_shift_shi_id`, `tbl_classes_cla_id`, `tbl_students_stu_id`, `stu_sco_attendance`, `stu_sco_homework`, `stu_sco_midterm_exam`, `stu_sco_final_exam`, `stu_sco_average`, `stu_sco_rank`, `stu_sco_mention`, `stu_sco_gpa`, `stu_sco_created`, `stu_sco_modified`, `stu_sco_semester`) VALUES
	(2, 1, 3, 1, 2, 34, 0.00, 0.00, 0.00, 0.00, 0.00, 0, NULL, 0.00, '2014-09-06', NULL, NULL),
	(3, 1, 3, 1, 2, 35, 0.00, 0.00, 0.00, 0.00, 0.00, 0, NULL, 0.00, '2014-09-13', NULL, NULL),
	(4, 1, 3, 1, 2, 36, 0.00, 0.00, 0.00, 0.00, 0.00, 0, NULL, 0.00, '2014-09-13', NULL, NULL),
	(5, 1, 4, 1, 1, 37, 0.00, 0.00, 0.00, 0.00, 0.00, 0, NULL, 0.00, '2014-09-13', NULL, NULL),
	(6, 1, 3, 1, 2, 44, 0.00, 0.00, 0.00, 0.00, 0.00, 0, NULL, 0.00, '2014-09-25', NULL, 1),
	(7, 1, 3, 1, 2, 44, 0.00, 0.00, 0.00, 0.00, 0.00, 0, NULL, 0.00, '0000-00-00', NULL, 2),
	(8, 1, 3, 1, 2, 45, 0.00, 0.00, 0.00, 0.00, 0.00, 0, NULL, 0.00, '2014-09-25', NULL, 1),
	(9, 1, 3, 1, 2, 45, 0.00, 0.00, 0.00, 0.00, 0.00, 0, NULL, 0.00, '0000-00-00', NULL, 2);
/*!40000 ALTER TABLE `tbl_student_score` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_stu_payment_detail
DROP TABLE IF EXISTS `tbl_stu_payment_detail`;
CREATE TABLE IF NOT EXISTS `tbl_stu_payment_detail` (
  `spd_id` int(10) NOT NULL AUTO_INCREMENT,
  `spd_sp_id` int(10) DEFAULT NULL,
  `spd_cdate` date DEFAULT NULL,
  `spd_mdate` date DEFAULT NULL,
  `spd_amount` int(11) DEFAULT NULL,
  `spd_comment` varchar(50) DEFAULT NULL,
  `spd_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`spd_id`),
  KEY `FK_tbl_stu_payment_detail_tbl_student_payments` (`spd_sp_id`),
  CONSTRAINT `FK_tbl_stu_payment_detail_tbl_student_payments` FOREIGN KEY (`spd_sp_id`) REFERENCES `tbl_student_payments` (`sp_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_stu_payment_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_stu_payment_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_stu_payment_detail` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_subject
DROP TABLE IF EXISTS `tbl_subject`;
CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(45) DEFAULT NULL,
  `sub_description` varchar(200) DEFAULT NULL,
  `sub_hours` int(11) DEFAULT NULL,
  `sub_status` bit(1) DEFAULT NULL,
  `sub_typ_id` int(11) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

# Dumping data for table ume_school_db.tbl_subject: ~6 rows (approximately)
/*!40000 ALTER TABLE `tbl_subject` DISABLE KEYS */;
INSERT INTO `tbl_subject` (`sub_id`, `sub_name`, `sub_description`, `sub_hours`, `sub_status`, `sub_typ_id`) VALUES
	(1, 'English Speaking', 'ggdg', 30, '', 1),
	(2, 'Management of HR', 'Manager are really need it', 32, '', 3),
	(3, 'WEP', 'Web Programning', 200, '', 2),
	(4, 'English Speaking5', 'rrrer', 200, '', 1),
	(5, 'IT3', 'ffdf', 30, '', 2),
	(6, 'English Speaking 9', 'yyty', 40, '', 1);
/*!40000 ALTER TABLE `tbl_subject` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_subject_type
DROP TABLE IF EXISTS `tbl_subject_type`;
CREATE TABLE IF NOT EXISTS `tbl_subject_type` (
  `sub_typ_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_typ_title` varchar(50) NOT NULL,
  `sub_typ_description` text NOT NULL,
  `sub_typ_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`sub_typ_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_subject_type: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_subject_type` DISABLE KEYS */;
INSERT INTO `tbl_subject_type` (`sub_typ_id`, `sub_typ_title`, `sub_typ_description`, `sub_typ_status`) VALUES
	(1, 'English', 'English for lab', 1),
	(2, 'IT', 'Information Technology', 1),
	(3, 'HR', 'Human Resource', 1);
/*!40000 ALTER TABLE `tbl_subject_type` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_tasks
DROP TABLE IF EXISTS `tbl_tasks`;
CREATE TABLE IF NOT EXISTS `tbl_tasks` (
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_tasks: ~22 rows (approximately)
/*!40000 ALTER TABLE `tbl_tasks` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `tbl_tasks` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_teacher
DROP TABLE IF EXISTS `tbl_teacher`;
CREATE TABLE IF NOT EXISTS `tbl_teacher` (
  `tea_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_staff_sta_id` int(11) DEFAULT NULL,
  `tbl_majors_maj_id` int(11) DEFAULT NULL,
  `tea_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tbl_classes_cla_id` int(11) DEFAULT NULL,
  `tea_year` int(11) NOT NULL,
  `tea_semester` int(11) NOT NULL,
  `tea_academic_year` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`tea_id`),
  KEY `fk_tbl_teacher_tbl_staff` (`tbl_staff_sta_id`),
  KEY `fk_tbl_teacher_tbl_classes` (`tbl_classes_cla_id`),
  KEY `fk_tbl_teacher_tbl_majors` (`tbl_majors_maj_id`),
  CONSTRAINT `fk_tbl_teacher_tbl_classes` FOREIGN KEY (`tbl_classes_cla_id`) REFERENCES `tbl_classes` (`cla_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_teacher_tbl_majors` FOREIGN KEY (`tbl_majors_maj_id`) REFERENCES `tbl_majors` (`maj_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_teacher_tbl_staff` FOREIGN KEY (`tbl_staff_sta_id`) REFERENCES `tbl_staff` (`sta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_teacher: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_teacher` DISABLE KEYS */;
INSERT INTO `tbl_teacher` (`tea_id`, `tbl_staff_sta_id`, `tbl_majors_maj_id`, `tea_created`, `tbl_classes_cla_id`, `tea_year`, `tea_semester`, `tea_academic_year`) VALUES
	(1, 6, 3, '2014-09-20 07:19:39', 2, 1, 1, '2014-2015'),
	(2, 3, 4, '2014-09-20 16:08:53', 1, 1, 1, '2014-2015'),
	(3, 7, 4, '2014-09-23 07:36:39', 4, 2, 1, '2014'),
	(4, 7, 3, '2014-09-23 07:46:34', 2, 1, 1, '2014');
/*!40000 ALTER TABLE `tbl_teacher` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_teacher_record
DROP TABLE IF EXISTS `tbl_teacher_record`;
CREATE TABLE IF NOT EXISTS `tbl_teacher_record` (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_teacher_tea_id` int(11) DEFAULT NULL,
  `rec_date` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rec_time` varchar(50) COLLATE utf8_unicode_ci DEFAULT '1',
  `rec_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `rec_other` text COLLATE utf8_unicode_ci NOT NULL,
  `rec_student` int(11) NOT NULL,
  `rec_absent` int(11) NOT NULL,
  PRIMARY KEY (`rec_id`),
  KEY `fk_tbl_teacher_record_teacher` (`tbl_teacher_tea_id`),
  CONSTRAINT `fk_tbl_teacher_record_teacher` FOREIGN KEY (`tbl_teacher_tea_id`) REFERENCES `tbl_teacher` (`tea_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_teacher_record: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbl_teacher_record` DISABLE KEYS */;
INSERT INTO `tbl_teacher_record` (`rec_id`, `tbl_teacher_tea_id`, `rec_date`, `rec_time`, `rec_desc`, `rec_other`, `rec_student`, `rec_absent`) VALUES
	(3, 1, '1', '1', '1', '1', 1, 1),
	(4, 1, '2', '2', '2', '2', 2, 2),
	(5, 1, '3', '3', '3', '3', 3, 3),
	(6, 2, '2014-09-22', '', '', '', 0, 0),
	(7, 2, '2014-09-27', '', '', '', 0, 0),
	(8, 3, '2014-09-01', '7:30-9:30', '', '', 23, 2),
	(9, 3, '2014-09-01', '9:30-11:30', '', '', 23, 1),
	(10, 4, '2014-09-22', '7:30-9:30', '', '', 23, 2),
	(11, 4, '2014-09-24', '9:30-11:30', '', '', 23, 1);
/*!40000 ALTER TABLE `tbl_teacher_record` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_users
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `use_id` int(11) NOT NULL AUTO_INCREMENT,
  `use_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_pass` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_status` bit(1) DEFAULT b'0',
  `use_created` timestamp NULL DEFAULT NULL,
  `use_modified` timestamp NULL DEFAULT NULL,
  `use_email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`use_id`),
  KEY `index2` (`use_id`,`use_name`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_users: 7 rows
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`use_id`, `use_name`, `use_pass`, `use_status`, `use_created`, `use_modified`, `use_email`) VALUES
	(8, 'admin', '04784d8d20a3b0d6f261ec781b9b2626a1398f26', '', '2014-09-06 19:05:32', '2014-09-14 15:31:39', 'sochy.choeun@gmail.com'),
	(9, 'administrator', 'afdbaf5ceb8039d876f21a22a88054ea8728e336', '', '2014-09-08 15:32:20', '2014-09-26 16:37:52', 'test@gmail.com'),
	(10, 'manager', 'ca00316558d249e085b2bd9f446f6af4156ce61c', '', '2014-09-24 06:08:02', NULL, 'manager@gmail.com'),
	(11, 'hr', '5ab400f04675b87423cd5860bb58470847c12c96', '', NULL, '2014-09-25 08:27:56', NULL),
	(12, 'academic', '5ab400f04675b87423cd5860bb58470847c12c96', '', NULL, '2014-09-25 08:28:11', NULL),
	(13, 'finance', '5ab400f04675b87423cd5860bb58470847c12c96', '', '2014-09-25 17:01:43', NULL, 'Finance@gmail.com'),
	(14, 'sina.sin', 'afdbaf5ceb8039d876f21a22a88054ea8728e336', '', '2014-09-26 04:26:20', '2014-09-26 04:26:52', 'sin.sina@ume-kpc.edu.kh');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_user_group
DROP TABLE IF EXISTS `tbl_user_group`;
CREATE TABLE IF NOT EXISTS `tbl_user_group` (
  `usegro_id` int(11) NOT NULL AUTO_INCREMENT,
  `usegro_userid` int(11) NOT NULL,
  `usegro_groupid` int(11) NOT NULL,
  PRIMARY KEY (`usegro_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_user_group: 8 rows
/*!40000 ALTER TABLE `tbl_user_group` DISABLE KEYS */;
INSERT INTO `tbl_user_group` (`usegro_id`, `usegro_userid`, `usegro_groupid`) VALUES
	(34, 13, 6),
	(27, 8, 2),
	(36, 9, 1),
	(26, 8, 1),
	(30, 10, 4),
	(31, 11, 3),
	(32, 12, 5),
	(35, 14, 5);
/*!40000 ALTER TABLE `tbl_user_group` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
