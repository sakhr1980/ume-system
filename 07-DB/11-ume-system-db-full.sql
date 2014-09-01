# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.53-community-log
# Server OS:                    Win64
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2014-08-31 09:41:41
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
  `cla_capacity` int(11) DEFAULT NULL,
  `cla_maj_id` int(11) NOT NULL,
  `cla_status` int(11) DEFAULT '1',
  `tbl_shift_shi_id` int(11) NOT NULL,
  `cla_modified_date` date NOT NULL,
  `gen_id` int(11) NOT NULL,
  `cla_create_date` date NOT NULL,
  `tbl_schadule_sch_id` int(11) DEFAULT NULL,
  `tbl_generation_gen_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cla_id`,`tbl_shift_shi_id`),
  KEY `fk_tbl_classes_tbl_shift1` (`tbl_shift_shi_id`),
  KEY `fk_tbl_classes_tbl_marjor1_idx` (`cla_maj_id`),
  KEY `fk_tbl_classes_tbl_schadule1` (`tbl_schadule_sch_id`),
  KEY `fk_tbl_classes_tbl_generation1` (`tbl_generation_gen_id`),
  KEY `cla_id` (`cla_id`),
  CONSTRAINT `fk_tbl_classes_tbl_generation1` FOREIGN KEY (`tbl_generation_gen_id`) REFERENCES `tbl_generation` (`gen_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_classes_tbl_schadule1` FOREIGN KEY (`tbl_schadule_sch_id`) REFERENCES `tbl_schadule` (`sch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_classes_tbl_shift1` FOREIGN KEY (`tbl_shift_shi_id`) REFERENCES `tbl_shift` (`shi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_classes: ~21 rows (approximately)
/*!40000 ALTER TABLE `tbl_classes` DISABLE KEYS */;
INSERT INTO `tbl_classes` (`cla_id`, `cla_name`, `cla_capacity`, `cla_maj_id`, `cla_status`, `tbl_shift_shi_id`, `cla_modified_date`, `gen_id`, `cla_create_date`, `tbl_schadule_sch_id`, `tbl_generation_gen_id`) VALUES
	(2, 'E01', 25, 4, 1, 1, '0000-00-00', 0, '0000-00-00', NULL, 1),
	(3, 'M01', 25, 3, 1, 1, '0000-00-00', 0, '0000-00-00', NULL, 1),
	(4, 'R1', 30, 4, 1, 2, '0000-00-00', 0, '0000-00-00', 2, 1),
	(5, 'FHM1', 34, 3, 1, 1, '0000-00-00', 0, '0000-00-00', NULL, 1),
	(5, 'A220', 25, 3, 1, 3, '0000-00-00', 0, '0000-00-00', NULL, 1),
	(6, 'FTA1', 34, 8, 1, 2, '0000-00-00', 0, '0000-00-00', NULL, 1),
	(7, 'FCE1', 25, 15, 1, 3, '0000-00-00', 0, '0000-00-00', NULL, 1),
	(8, 'FHM2', 25, 3, 1, 1, '0000-00-00', 0, '0000-00-00', NULL, 1),
	(9, 'FHM3', 25, 3, 1, 1, '0000-00-00', 0, '0000-00-00', NULL, 1),
	(10, 'FHM4', 34, 3, 1, 1, '0000-00-00', 0, '0000-00-00', NULL, 1),
	(11, 'FCA1', 34, 15, 1, 2, '0000-00-00', 0, '0000-00-00', NULL, NULL),
	(12, 'FCA2', 25, 5, 1, 4, '2014-08-30', 1, '0000-00-00', NULL, NULL),
	(13, 'FHM12', 25, 4, 0, 2, '2014-08-30', 1, '0000-00-00', NULL, NULL),
	(14, 'FHM13', 34, 3, 1, 1, '2014-08-30', 1, '0000-00-00', NULL, NULL),
	(15, 'FHM19', 25, 3, 1, 1, '2014-08-30', 1, '2014-08-30', NULL, NULL),
	(16, 'FHM1', 25, 17, 0, 1, '2014-08-31', 1, '2014-08-30', NULL, NULL),
	(17, 'FHM14', 34, 3, 1, 1, '0000-00-00', 2, '2014-08-30', NULL, NULL),
	(18, 'FHM15', 34, 3, 1, 1, '0000-00-00', 0, '2014-08-30', NULL, 2),
	(19, 'FHM19', 25, 15, 1, 1, '0000-00-00', 2, '2014-08-30', NULL, NULL),
	(20, 'E023', 25, 3, 1, 2, '0000-00-00', 0, '2014-08-30', NULL, 1),
	(21, 'W01', 25, 15, 1, 4, '2014-08-31', 0, '2014-08-31', NULL, 1);
/*!40000 ALTER TABLE `tbl_classes` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_experiences: ~34 rows (approximately)
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
	(34, '', '', NULL, '', '', 33);
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
  `gen_title` varchar(45) DEFAULT NULL,
  `gen_year` varchar(45) DEFAULT NULL,
  `gen_created` datetime DEFAULT NULL,
  `gen_modifyd` datetime DEFAULT NULL,
  `gen_status` int(1) DEFAULT NULL,
  PRIMARY KEY (`gen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_generation: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_generation` DISABLE KEYS */;
INSERT INTO `tbl_generation` (`gen_id`, `gen_title`, `gen_year`, `gen_created`, `gen_modifyd`, `gen_status`) VALUES
	(1, '2014-2015', '1', '2014-08-30 00:41:25', '2014-08-30 00:41:27', 1),
	(2, '2015-2015', '2', '2014-08-30 12:56:20', '2014-08-30 12:56:22', 1);
/*!40000 ALTER TABLE `tbl_generation` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_groups
DROP TABLE IF EXISTS `tbl_groups`;
CREATE TABLE IF NOT EXISTS `tbl_groups` (
  `gro_id` int(11) NOT NULL AUTO_INCREMENT,
  `gro_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gro_status` bit(1) DEFAULT NULL,
  `gro_created` timestamp NULL DEFAULT NULL,
  `gro_modified` timestamp NULL DEFAULT NULL,
  `gro_description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`gro_id`),
  KEY `index2` (`gro_id`,`gro_name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_groups: 3 rows
/*!40000 ALTER TABLE `tbl_groups` DISABLE KEYS */;
INSERT INTO `tbl_groups` (`gro_id`, `gro_name`, `gro_status`, `gro_created`, `gro_modified`, `gro_description`) VALUES
	(1, 'HR', '', '2014-08-27 14:27:37', NULL, ''),
	(2, 'Admin', '', '2014-08-27 14:27:46', NULL, ''),
	(3, 'Teacher', '', '2014-08-27 14:28:00', NULL, '');
/*!40000 ALTER TABLE `tbl_groups` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_group_access_leval
DROP TABLE IF EXISTS `tbl_group_access_leval`;
CREATE TABLE IF NOT EXISTS `tbl_group_access_leval` (
  `gro_id` int(11) NOT NULL,
  `gro_name` varchar(45) DEFAULT NULL,
  `gro_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`gro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table ume_school_db.tbl_group_access_leval: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_group_access_leval` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_group_access_leval` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_group_task
DROP TABLE IF EXISTS `tbl_group_task`;
CREATE TABLE IF NOT EXISTS `tbl_group_task` (
  `gro_tas_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_groups_gro_id` int(11) NOT NULL,
  `tbl_tasks_tas_id` int(11) NOT NULL,
  PRIMARY KEY (`gro_tas_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_group_task: 0 rows
/*!40000 ALTER TABLE `tbl_group_task` DISABLE KEYS */;
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
  `mod_status` bit(1) DEFAULT NULL,
  `mod_controllername` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mod_created` timestamp NULL DEFAULT NULL,
  `mod_modified` timestamp NULL DEFAULT NULL,
  `mod_foldername` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`mod_id`),
  KEY `index2` (`mod_id`,`mod_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_modules: 0 rows
/*!40000 ALTER TABLE `tbl_modules` DISABLE KEYS */;
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

# Dumping data for table ume_school_db.tbl_room: ~4 rows (approximately)
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

# Dumping data for table ume_school_db.tbl_room_type: ~3 rows (approximately)
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
  `sch_title` varchar(45) DEFAULT NULL,
  `sch_created` datetime DEFAULT NULL,
  `sch_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tbl_majors_maj_id` int(11) DEFAULT NULL,
  `tbl_shift_shi_id` int(11) DEFAULT NULL,
  `sch_academic_year` varchar(45) DEFAULT NULL,
  `sch_semester` int(11) DEFAULT NULL,
  `sch_year_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`sch_id`),
  KEY `fk_tbl_schadule_tbl_majors1` (`tbl_majors_maj_id`),
  KEY `fk_tbl_schadule_tbl_shift1` (`tbl_shift_shi_id`),
  CONSTRAINT `fk_tbl_schadule_tbl_majors1` FOREIGN KEY (`tbl_majors_maj_id`) REFERENCES `tbl_majors` (`maj_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_schadule_tbl_shift1` FOREIGN KEY (`tbl_shift_shi_id`) REFERENCES `tbl_shift` (`shi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_schadule: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_schadule` DISABLE KEYS */;
INSERT INTO `tbl_schadule` (`sch_id`, `sch_title`, `sch_created`, `sch_modified`, `tbl_majors_maj_id`, `tbl_shift_shi_id`, `sch_academic_year`, `sch_semester`, `sch_year_number`) VALUES
	(13, 'b1', '2014-08-30 11:50:25', '2014-08-30 16:50:25', 11, 2, '2014-2015', 1, 2),
	(14, 'E4', '2014-08-30 11:17:05', '2014-08-30 18:17:05', 3, 1, '2012-2013', 1, 1),
	(15, 'E4', '2014-08-31 02:18:55', '2014-08-31 09:18:55', 3, 4, '2014-2015', 1, 1);
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
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_schadule_detail: ~30 rows (approximately)
/*!40000 ALTER TABLE `tbl_schadule_detail` DISABLE KEYS */;
INSERT INTO `tbl_schadule_detail` (`scd_id`, `tbl_schadule_sch_id`, `tbl_staffs_sta_id`, `scd_time`, `scd_day`, `scd_section`, `tbl_room_rom_id`, `tbl_subject_sub_id`) VALUES
	(1, 13, 2, '7:30-9:00', 1, 1, 3, 1),
	(2, 13, NULL, '7:30-9:00', 2, 1, NULL, NULL),
	(3, 13, NULL, '7:30-9:00', 3, 1, NULL, NULL),
	(4, 13, NULL, '7:30-9:00', 4, 1, NULL, NULL),
	(5, 13, NULL, '7:30-9:00', 5, 1, NULL, NULL),
	(6, 13, NULL, '9:15-10:45', 1, 2, NULL, NULL),
	(7, 13, NULL, '9:15-10:45', 2, 2, NULL, NULL),
	(8, 13, NULL, '9:15-10:45', 3, 2, NULL, NULL),
	(9, 13, NULL, '9:15-10:45', 4, 2, NULL, NULL),
	(10, 13, NULL, '9:15-10:45', 5, 2, NULL, NULL),
	(11, 13, NULL, '', 1, 3, NULL, NULL),
	(12, 13, NULL, '', 2, 3, NULL, NULL),
	(13, 13, NULL, '', 3, 3, NULL, NULL),
	(14, 13, NULL, '', 4, 3, NULL, NULL),
	(15, 13, NULL, '', 5, 3, NULL, NULL),
	(16, 14, NULL, '', 1, 1, NULL, NULL),
	(17, 14, NULL, '', 2, 1, NULL, NULL),
	(18, 14, NULL, '', 3, 1, NULL, NULL),
	(19, 14, NULL, '', 4, 1, NULL, NULL),
	(20, 14, NULL, '', 5, 1, NULL, NULL),
	(21, 14, NULL, '', 1, 2, NULL, NULL),
	(22, 14, NULL, '', 2, 2, NULL, NULL),
	(23, 14, NULL, '', 3, 2, NULL, NULL),
	(24, 14, NULL, '', 4, 2, NULL, NULL),
	(25, 14, NULL, '', 5, 2, NULL, NULL),
	(26, 14, NULL, '', 1, 3, NULL, NULL),
	(27, 14, NULL, '', 2, 3, NULL, NULL),
	(28, 14, NULL, '', 3, 3, NULL, NULL),
	(29, 14, NULL, '', 4, 3, NULL, NULL),
	(30, 14, NULL, '', 5, 3, NULL, NULL),
	(31, 15, 4, '', 1, 1, 4, 2),
	(32, 15, 3, '', 2, 1, NULL, NULL),
	(33, 15, NULL, '', 3, 1, NULL, NULL),
	(34, 15, NULL, '', 4, 1, NULL, NULL),
	(35, 15, NULL, '', 5, 1, NULL, NULL),
	(36, 15, 2, '', 1, 2, 5, 6),
	(37, 15, NULL, '', 2, 2, NULL, NULL),
	(38, 15, NULL, '', 3, 2, NULL, NULL),
	(39, 15, NULL, '', 4, 2, NULL, NULL),
	(40, 15, NULL, '', 5, 2, NULL, NULL),
	(41, 15, NULL, '', 1, 3, NULL, NULL),
	(42, 15, NULL, '', 2, 3, NULL, NULL),
	(43, 15, NULL, '', 3, 3, NULL, NULL),
	(44, 15, NULL, '', 4, 3, NULL, NULL),
	(45, 15, NULL, '', 5, 3, NULL, NULL);
/*!40000 ALTER TABLE `tbl_schadule_detail` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_shift
DROP TABLE IF EXISTS `tbl_shift`;
CREATE TABLE IF NOT EXISTS `tbl_shift` (
  `shi_id` int(11) NOT NULL AUTO_INCREMENT,
  `shi_name` varchar(45) DEFAULT NULL,
  `shi_status` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`shi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_shift: ~6 rows (approximately)
/*!40000 ALTER TABLE `tbl_shift` DISABLE KEYS */;
INSERT INTO `tbl_shift` (`shi_id`, `shi_name`, `shi_status`) VALUES
	(1, 'Moning', 1),
	(2, 'Afternoon', 1),
	(3, 'Everning', 1),
	(4, 'Weeken', 1),
	(5, '????????', 0),
	(6, '???????', 0);
/*!40000 ALTER TABLE `tbl_shift` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_staff
DROP TABLE IF EXISTS `tbl_staff`;
CREATE TABLE IF NOT EXISTS `tbl_staff` (
  `sta_id` int(11) NOT NULL AUTO_INCREMENT,
  `sta_card_id` char(5) NOT NULL,
  `sta_name` varchar(45) DEFAULT NULL,
  `sta_name_kh` varchar(50) NOT NULL,
  `sta_status` bit(1) DEFAULT b'0',
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

# Dumping data for table ume_school_db.tbl_staff: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_staff` DISABLE KEYS */;
INSERT INTO `tbl_staff` (`sta_id`, `sta_card_id`, `sta_name`, `sta_name_kh`, `sta_status`, `sta_position`, `sta_job_type`, `sta_start_date`, `sta_email`, `sta_phone`, `sta_sex`, `sta_address`, `sta_created`, `sta_modified`, `tbl_users_use_id`) VALUES
	(2, '03392', 'borin', 'បូរិន', '', '5', 4, '2014-08-29 00:00:00', '', '', 'f', '', '2014-08-27 01:01:26', NULL, 1),
	(3, '43434', '4rrwer', 'erwer', '', 'Teacher', 0, '2014-08-31 08:57:03', 'souophea@gmail.com', NULL, 'm', '', '2014-08-29 22:30:27', '2014-08-31 08:57:03', 1),
	(4, '43439', 'sophea', 'សុភា', '', 'Teacher', 0, '2014-08-31 08:56:33', 'fsd@fsdf.sdf', NULL, 'f', 'Phnom Penh', '2014-08-31 08:50:14', '2014-08-31 08:56:33', 1);
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
	(4, 'Full time', 'ពេញម៉ោង', '', '', '2014-08-27 01:00:09', NULL, 1),
	(5, 'Part time', 'កន្លះថ្ងៃ', '', '', '2014-08-27 01:00:46', NULL, 1);
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
	(5, 'Trainer', 'គ្រូបង្រោៀន', '', '', '2014-08-27 00:58:43', '0000-00-00 00:00:00', 1),
	(6, 'HR', 'រដ្ថបាល', '', '', '2014-08-27 00:59:31', '0000-00-00 00:00:00', 1),
	(7, 'HR35', 'គ្រូបង្រោៀន3', '', '', '2014-08-29 21:51:28', '2014-08-29 21:51:28', 1);
/*!40000 ALTER TABLE `tbl_staff_position` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_students
DROP TABLE IF EXISTS `tbl_students`;
CREATE TABLE IF NOT EXISTS `tbl_students` (
  `stu_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_en_firstname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_card_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_en_lastname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_dob` date DEFAULT NULL,
  `stu_current_address` text COLLATE utf8_unicode_ci,
  `stu_kh_firstname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_kh_lastname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `stu_job` varchar(250) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_students: 31 rows
/*!40000 ALTER TABLE `tbl_students` DISABLE KEYS */;
INSERT INTO `tbl_students` (`stu_id`, `stu_en_firstname`, `stu_card_id`, `stu_en_lastname`, `stu_dob`, `stu_current_address`, `stu_kh_firstname`, `stu_kh_lastname`, `stu_pob`, `stu_gender`, `stu_nationality`, `stu_marital_status`, `stu_tel`, `stu_email`, `stu_fax`, `stu_father_name`, `stu_father_occupation`, `stu_mother_name`, `stu_mother_occupation`, `stu_father_tel`, `stu_mother_tel`, `stu_father_email`, `stu_mother_email`, `stu_father_fax`, `stu_mother_faxl`, `stu_father_current_address`, `stu_highschool_name`, `stu_highschool_year`, `stu_highschool_degree`, `stu_highschool_bacii_province`, `stu_highschool_bacii_office`, `stu_highschool_bacii_room`, `stu_highschool_bacii_table`, `stu_highschool_bacii_date`, `stu_job`) VALUES
	(1, '22', NULL, '22', '0000-00-00', '', '22', '22', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', 'មានការងារធ្វើ'),
	(30, 'dfd', NULL, 'Bora', '0000-00-00', '', 'dfd', 'vong', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', 'មានការងារធ្វើ'),
	(3, 'Sochy', NULL, 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', 'Male', 'Khmer', 'Single', '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត'),
	(4, 'សុជី', NULL, 'Choeun', '0000-00-00', '', 'សុជី', 'សុជី', '', 'Male', '', 'Single', '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', 'មានការងារធ្វើ'),
	(31, 'as', NULL, 'as', '0000-00-00', '', 'as', 'dasd', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'មានការងារធ្វើ'),
	(32, 'as', NULL, 'as', '0000-00-00', '', 'as', 'dasd', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', 'មានការងារធ្វើ'),
	(5, 'Sochy', NULL, 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', NULL, 'Khmer', NULL, '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត'),
	(6, 'Sochy', NULL, 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', NULL, 'Khmer', NULL, '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត'),
	(7, 'Sochy', NULL, 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', NULL, 'Khmer', NULL, '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត'),
	(8, 'Sochy', NULL, 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', NULL, 'Khmer', NULL, '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត'),
	(9, 'Sochy', NULL, 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', 'Male', 'Khmer', 'Single', '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត'),
	(10, 'Sochy', NULL, 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', 'Male', 'Khmer', 'Single', '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត'),
	(11, 'Sochy', NULL, 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', 'Male', 'Khmer', 'Single', '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត'),
	(12, 'Sochy', NULL, 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', 'Others', 'Khmer', 'Married', '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត'),
	(13, 'Sochy', NULL, 'Choeun', '1988-11-08', '', 'សុជី', 'ជឿន', 'OdorMeanChey', 'Male', 'Khmer', 'Single', '097173656373', 'sochy.choeun@gmail.com', '', 'Chham Mouy', 'Farmer', 'Prom Chouen', 'Solier', NULL, '0998766525552', NULL, '', NULL, '', '', 'Name of School/Institution/University', '2009', 'Bac II', 'Banteay MeanChey', 'Khlar Kon', '', '', '', 'ជានិស្សិត'),
	(14, 'fadf', NULL, 'fadsf', '0000-00-00', '', 'fasdf', 'fadf', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', ''),
	(15, 'fadf', NULL, 'fadsf', '0000-00-00', '', 'fasdf', 'fadf', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', ''),
	(16, 'fasdf', NULL, 'fadf', '0000-00-00', '', 'fadf', 'fsa', '', 'Female', 'dfad', 'Single', 'fadf', 'fla', '', 'fasdf', 'lj', 'lj', 'ljl', NULL, 'lj', NULL, 'kkljl', NULL, 'jl', 'lkj', 'lkj', 'f', 'lj', 'kjljkl', 'ljkjl', 'ljljl', 'jkjljk', 'jkljk', 'ជានិស្សិត'),
	(17, 'fsadfadsf', NULL, 'fasdf', '0000-00-00', '', 'fadfadf', 'fsdafasdf', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', 'មានការងារធ្វើ'),
	(18, 'fadsf', NULL, 'fdf', '0000-00-00', '', 'fadfadf', 'fdadf', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', ''),
	(19, 'fadsf', NULL, 'fadf', '0000-00-00', '', 'fadf', 'dfadf', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', ''),
	(20, 'fadsf', NULL, 'fadf', '0000-00-00', '', 'fadf', 'dfadf', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', ''),
	(21, 'fadsf', NULL, 'fadf', '0000-00-00', '', 'fadf', 'dfadf', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', ''),
	(22, 'fadsf', NULL, 'fadf', '0000-00-00', '', 'fadf', 'dfadf', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', ''),
	(23, 'fsdafdasd', NULL, 'fsdf', '0000-00-00', '', 'fasdf', 'dfasdf', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', ''),
	(24, 'ljkljl', NULL, 'ljj', '0000-00-00', '', 'ljkjl', 'fsdf', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', ''),
	(25, 'fasdfasd', NULL, 'fsdfsdf', '0000-00-00', '', 'fadf', 'fsf', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', ''),
	(26, 'fasdfasd', NULL, 'fsadfa', '0000-00-00', '', 'fadfa', 'fadf', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', ''),
	(28, 'klj', NULL, 'hhkjh', '0000-00-00', '', 'klj', 'klj', '', 'Male', '', 'Married', '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', 'មានការងារធ្វើ'),
	(29, '111', NULL, '111', '0000-00-00', '', '111', '111', '', 'Others', '', 'Single', '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', 'ជានិស្សិត'),
	(33, 'fasdfasdf', NULL, 'dfads', '0000-00-00', '', 'adfasdf', 'dfsd', '', NULL, '', NULL, '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', '', '', '', '', '', '', '', 'មានការងារធ្វើ');
/*!40000 ALTER TABLE `tbl_students` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_student_class
DROP TABLE IF EXISTS `tbl_student_class`;
CREATE TABLE IF NOT EXISTS `tbl_student_class` (
  `stu_cla_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_students_stu_id` int(11) NOT NULL,
  `tbl_class_cla_id` int(11) NOT NULL,
  PRIMARY KEY (`stu_cla_id`),
  KEY `fk_tbl_student_class_tbl_students1_idx` (`tbl_students_stu_id`),
  KEY `fk_tbl_student_class_tbl_class1_idx` (`tbl_class_cla_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_student_class: ~18 rows (approximately)
/*!40000 ALTER TABLE `tbl_student_class` DISABLE KEYS */;
INSERT INTO `tbl_student_class` (`stu_cla_id`, `tbl_students_stu_id`, `tbl_class_cla_id`) VALUES
	(7, 1, 2),
	(8, 2, 2),
	(9, 3, 3),
	(10, 4, 3),
	(11, 5, 2),
	(12, 8, 3),
	(13, 9, 2),
	(14, 6, 4),
	(15, 22, 0),
	(16, 23, 0),
	(17, 24, 0),
	(18, 26, 20),
	(19, 27, 3),
	(20, 28, 3),
	(21, 29, 3),
	(22, 30, 21),
	(23, 32, 3),
	(24, 33, 3);
/*!40000 ALTER TABLE `tbl_student_class` ENABLE KEYS */;


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

# Dumping data for table ume_school_db.tbl_subject: ~5 rows (approximately)
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
  `tas_status` bit(1) DEFAULT NULL,
  `tas_functionname` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tas_created` timestamp NULL DEFAULT NULL,
  `tas_modified` timestamp NULL DEFAULT NULL,
  `tbl_modules_mod_id` int(11) NOT NULL,
  PRIMARY KEY (`tas_id`),
  KEY `index3` (`tas_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_tasks: 0 rows
/*!40000 ALTER TABLE `tbl_tasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tasks` ENABLE KEYS */;


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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_users: 2 rows
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`use_id`, `use_name`, `use_pass`, `use_status`, `use_created`, `use_modified`, `use_email`) VALUES
	(3, 'admin', '7ce639c93e1b24614df0ffcd640221a58eacbbd0', '', '2014-08-27 14:28:45', NULL, 'admin@gmail.com'),
	(4, 'hr_lina', 'c22cea1d4f65ac6e9d78fbee08093a051182aac8', '', '2014-08-27 14:29:24', NULL, 'lina@gmail.com');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_user_group
DROP TABLE IF EXISTS `tbl_user_group`;
CREATE TABLE IF NOT EXISTS `tbl_user_group` (
  `use_gro_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_users_use_id` int(11) NOT NULL,
  `tbl_groups_gro_id` int(11) NOT NULL,
  PRIMARY KEY (`use_gro_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_user_group: 2 rows
/*!40000 ALTER TABLE `tbl_user_group` DISABLE KEYS */;
INSERT INTO `tbl_user_group` (`use_gro_id`, `tbl_users_use_id`, `tbl_groups_gro_id`) VALUES
	(1, 3, 2),
	(2, 4, 1);
/*!40000 ALTER TABLE `tbl_user_group` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
