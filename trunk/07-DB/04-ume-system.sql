# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.53-community-log
# Server OS:                    Win64
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2014-08-20 13:17:54
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
  PRIMARY KEY (`cla_id`,`tbl_shift_shi_id`),
  KEY `fk_tbl_classes_tbl_marjor1_idx` (`cla_maj_id`),
  KEY `fk_tbl_classes_tbl_shift1` (`tbl_shift_shi_id`),
  CONSTRAINT `fk_tbl_classes_tbl_majors1` FOREIGN KEY (`cla_maj_id`) REFERENCES `tbl_majors` (`maj_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_classes_tbl_shift1` FOREIGN KEY (`tbl_shift_shi_id`) REFERENCES `tbl_shift` (`shi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_classes: ~10 rows (approximately)
/*!40000 ALTER TABLE `tbl_classes` DISABLE KEYS */;
INSERT INTO `tbl_classes` (`cla_id`, `cla_name`, `cla_capacity`, `cla_maj_id`, `cla_status`, `tbl_shift_shi_id`) VALUES
	(4, 'M0013', 253, 3, 1, 1),
	(5, 'M0059edddss', 13, 4, 1, 1),
	(6, 'M00332', 8, 3, 1, 1),
	(7, '333', 3, 4, 1, 1),
	(8, '3333', 33, 3, 1, 1),
	(9, 'M00332', 25, 3, 1, 2),
	(10, 'M22', 25, 4, 1, 1),
	(11, 'M23', 30, 3, 1, 2),
	(12, 'M24', 30, 15, 1, 2),
	(13, 'E04', 24, 5, 1, 3);
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


# Dumping structure for table ume_school_db.tbl_faculties
DROP TABLE IF EXISTS `tbl_faculties`;
CREATE TABLE IF NOT EXISTS `tbl_faculties` (
  `fac_id` int(11) NOT NULL AUTO_INCREMENT,
  `fac_name` varchar(45) DEFAULT NULL,
  `fac_status` bit(1) NOT NULL DEFAULT b'1',
  `fac_description` varchar(200) DEFAULT NULL,
  `fac_kh_name` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`fac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_faculties: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_faculties` DISABLE KEYS */;
INSERT INTO `tbl_faculties` (`fac_id`, `fac_name`, `fac_status`, `fac_description`, `fac_kh_name`) VALUES
	(1, 'Faculty of Business Administration & Tourism', '', NULL, NULL),
	(2, 'Faculty of Art, Human and Foreign Languages', '', NULL, NULL),
	(3, 'Faculty of Science and Technology', '', NULL, NULL),
	(4, 'Faculty of Laws and Economics', '', NULL, NULL),
	(5, 'Faculty of Agriculture and Rural Development', '', NULL, NULL);
/*!40000 ALTER TABLE `tbl_faculties` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_groups: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_groups` DISABLE KEYS */;
INSERT INTO `tbl_groups` (`gro_id`, `gro_name`, `gro_status`, `gro_created`, `gro_modified`, `gro_description`) VALUES
	(1, 'admin2', '', '2014-06-28 23:20:48', '2014-06-29 00:19:25', ''),
	(2, 'ssssrrr', '', '2014-06-29 00:16:30', '2014-06-29 00:17:08', ''),
	(3, 'cccc', '', '2014-06-29 00:16:37', NULL, ''),
	(4, 'zzz', '', '2014-06-29 00:16:47', NULL, '');
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
  PRIMARY KEY (`gro_tas_id`),
  KEY `fk_tbl_group_task_tbl_groups1_idx` (`tbl_groups_gro_id`),
  KEY `fk_tbl_group_task_tbl_tasks1_idx` (`tbl_tasks_tas_id`),
  CONSTRAINT `fk_tbl_group_task_tbl_groups1` FOREIGN KEY (`tbl_groups_gro_id`) REFERENCES `tbl_groups` (`gro_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_tbl_group_task_tbl_tasks1` FOREIGN KEY (`tbl_tasks_tas_id`) REFERENCES `tbl_tasks` (`tas_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_group_task: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_group_task` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_group_task` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_majors
DROP TABLE IF EXISTS `tbl_majors`;
CREATE TABLE IF NOT EXISTS `tbl_majors` (
  `maj_id` int(11) NOT NULL,
  `maj_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maj_status` bit(1) DEFAULT b'1',
  `maj_kh_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `maj_fac_id` int(11) NOT NULL,
  PRIMARY KEY (`maj_id`),
  KEY `fk_tbl_majors_tbl_faculties1` (`maj_fac_id`),
  CONSTRAINT `fk_tbl_majors_tbl_faculties1` FOREIGN KEY (`maj_fac_id`) REFERENCES `tbl_faculties` (`fac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_majors: ~16 rows (approximately)
/*!40000 ALTER TABLE `tbl_majors` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `tbl_majors` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_marjor_facuty
DROP TABLE IF EXISTS `tbl_marjor_facuty`;
CREATE TABLE IF NOT EXISTS `tbl_marjor_facuty` (
  `mar_fac_id` int(11) NOT NULL,
  `mar_fac_name` varchar(45) DEFAULT NULL,
  `mar_fac_status` bit(1) DEFAULT NULL,
  `mar_fac_description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`mar_fac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table ume_school_db.tbl_marjor_facuty: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_marjor_facuty` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_marjor_facuty` ENABLE KEYS */;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_modules: ~0 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

# Dumping data for table ume_school_db.tbl_room: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_room` DISABLE KEYS */;
INSERT INTO `tbl_room` (`rom_id`, `tbl_room_type_rom_typ_id`, `rom_name`, `rom_building`, `rom_floor`, `rom_available_people`, `rom_status`, `rom_created`, `rom_modified`) VALUES
	(3, 5, 'A20', 'BC', 2, 25, '', '2014-08-16', '2014-08-16');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_room_type: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_room_type` DISABLE KEYS */;
INSERT INTO `tbl_room_type` (`rom_typ_id`, `rom_typ_name`, `rom_typ_description`, `rom_typ_status`, `rom_typ_created`, `rom_typ_modified`) VALUES
	(4, 'Lab Computer', 'For student IT practice', '', '2014-08-16', NULL),
	(5, 'Normal Room', '', '', '2014-08-16', NULL),
	(6, 'Big Room', '', '', '2014-08-16', NULL);
/*!40000 ALTER TABLE `tbl_room_type` ENABLE KEYS */;


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


# Dumping structure for table ume_school_db.tbl_staffs
DROP TABLE IF EXISTS `tbl_staffs`;
CREATE TABLE IF NOT EXISTS `tbl_staffs` (
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_staffs: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbl_staffs` DISABLE KEYS */;
INSERT INTO `tbl_staffs` (`sta_id`, `sta_card_id`, `sta_name`, `sta_name_kh`, `sta_email`, `sta_address`, `sta_status`, `sta_created`, `sta_modified`, `sta_sex`, `sta_position`, `tbl_users_use_id`, `sta_start_date`) VALUES
	(1, '20334', 'Chantha', NULL, 'chantha@gmail.com', 'Phnom Penh', '', '2014-06-29', NULL, NULL, NULL, NULL, NULL),
	(2, '03392', 'Chantha', '??????', 'chantha2@gmail.com', 'Phnom Penh', '', '2014-07-08', NULL, 'm', 'Teacher', NULL, NULL),
	(3, '03393', 'borin', 'បូរិន', 'boring@gmail.com', 'Phnom Penh', '', '2014-07-08', '2014-07-09', 'm', 'Teacher', NULL, NULL),
	(4, '03395', 'Chanthae', 'បូរិន', 'boringw@gmail.com', 'Phnom Penh', '', '2014-07-17', NULL, 'f', 'Teacher', 1, '2014-07-18'),
	(5, '03399', 'Chanthaew', 'បូរិន', 'borineg@gmail.com', '', '', '2014-07-17', NULL, 'm', '', 1, '0000-00-00'),
	(6, '03388', 'Chanthae2', 'បូរិន2', 'boring4@gmail.com', 'ppooooooooooo', '', '2014-08-15', NULL, 'm', 'Teacher', 1, NULL),
	(7, '09999', 'Chanthae44', 'បូរិន44', 'borineg8@gmail.com', 'Phnom Penh', '', '2014-08-15', NULL, 'm', 'Teacher', 1, NULL),
	(8, '02222', 'Chanthae22', 'បូរិន222', 'borineg22@gmail.com', 'Phnom Penh', '', '2014-08-15', NULL, 'm', 'Teacher', 1, '2014-08-08'),
	(9, '03377', 'Chanthae11', 'បូរិន1', 'borineg21@gmail.com', 'Phnom Penh', '', '2014-08-15', NULL, 'm', 'Teacher', 1, '2014-07-30');
/*!40000 ALTER TABLE `tbl_staffs` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_staff_job_type
DROP TABLE IF EXISTS `tbl_staff_job_type`;
CREATE TABLE IF NOT EXISTS `tbl_staff_job_type` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(50) NOT NULL,
  `job_status` bit(1) NOT NULL DEFAULT b'1',
  `job_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `job_modifed` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`job_id`),
  UNIQUE KEY `job_title` (`job_title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table ume_school_db.tbl_staff_job_type: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_staff_job_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_staff_job_type` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_staff_position
DROP TABLE IF EXISTS `tbl_staff_position`;
CREATE TABLE IF NOT EXISTS `tbl_staff_position` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

# Dumping data for table ume_school_db.tbl_staff_position: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_staff_position` DISABLE KEYS */;
INSERT INTO `tbl_staff_position` (`pos_id`, `pos_title_kh`, `tbl_users_use_id`, `pos_description`, `pos_status`, `pos_created`, `pos_modified`, `pos_title_en`) VALUES
	(1, 'គ្រុរបង្រឿន', 1, '', '', '2014-08-15 00:45:25', '0000-00-00 00:00:00', 'Trainer'),
	(2, 'រដ្ខបាល', 1, '', '', '2014-08-16 11:08:40', '0000-00-00 00:00:00', 'Admin'),
	(3, '', 1, '', '', '2014-08-17 08:25:16', '0000-00-00 00:00:00', 'dara');
/*!40000 ALTER TABLE `tbl_staff_position` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_students
DROP TABLE IF EXISTS `tbl_students`;
CREATE TABLE IF NOT EXISTS `tbl_students` (
  `stu_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_kh_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stu_dob` date DEFAULT NULL,
  `stu_address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_students: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_students` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_students` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_student_class
DROP TABLE IF EXISTS `tbl_student_class`;
CREATE TABLE IF NOT EXISTS `tbl_student_class` (
  `stu_cla_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_students_stu_id` int(11) NOT NULL,
  `tbl_class_cla_id` int(11) NOT NULL,
  PRIMARY KEY (`stu_cla_id`),
  KEY `fk_tbl_student_class_tbl_students1_idx` (`tbl_students_stu_id`),
  KEY `fk_tbl_student_class_tbl_class1_idx` (`tbl_class_cla_id`),
  CONSTRAINT `fk_tbl_student_class_tbl_class1` FOREIGN KEY (`tbl_class_cla_id`) REFERENCES `tbl_classes` (`cla_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_student_class_tbl_students1` FOREIGN KEY (`tbl_students_stu_id`) REFERENCES `tbl_students` (`stu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_student_class: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_student_class` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_student_class` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_subjects
DROP TABLE IF EXISTS `tbl_subjects`;
CREATE TABLE IF NOT EXISTS `tbl_subjects` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sub_hours` int(11) DEFAULT NULL,
  `sub_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_subjects: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_subjects` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_subjects` ENABLE KEYS */;


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
  KEY `fk_tbl_tasks_tbl_modules1_idx` (`tbl_modules_mod_id`),
  KEY `index3` (`tas_id`),
  CONSTRAINT `fk_tbl_tasks_tbl_modules1` FOREIGN KEY (`tbl_modules_mod_id`) REFERENCES `tbl_modules` (`mod_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_tasks: ~0 rows (approximately)
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_user_group
DROP TABLE IF EXISTS `tbl_user_group`;
CREATE TABLE IF NOT EXISTS `tbl_user_group` (
  `use_gro_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_users_use_id` int(11) NOT NULL,
  `tbl_groups_gro_id` int(11) NOT NULL,
  PRIMARY KEY (`use_gro_id`),
  KEY `fk_tbl_user_group_tbl_users1_idx` (`tbl_users_use_id`),
  KEY `fk_tbl_user_group_tbl_groups1_idx` (`tbl_groups_gro_id`),
  CONSTRAINT `fk_tbl_user_group_tbl_groups1` FOREIGN KEY (`tbl_groups_gro_id`) REFERENCES `tbl_groups` (`gro_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_tbl_user_group_tbl_users1` FOREIGN KEY (`tbl_users_use_id`) REFERENCES `tbl_users` (`use_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Dumping data for table ume_school_db.tbl_user_group: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_user_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user_group` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_user_task
DROP TABLE IF EXISTS `tbl_user_task`;
CREATE TABLE IF NOT EXISTS `tbl_user_task` (
  `use_tas_id` int(11) NOT NULL,
  `use_id` int(11) DEFAULT NULL,
  `tas_id` int(11) DEFAULT NULL,
  `use_tas_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`use_tas_id`),
  KEY `fk_tbl_user_task_tbl_user1` (`use_id`),
  KEY `fk_tbl_user_task_tbl_task1` (`tas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table ume_school_db.tbl_user_task: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_user_task` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user_task` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
