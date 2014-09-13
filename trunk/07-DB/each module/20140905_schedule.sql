-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.32 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for ume_school_db
CREATE DATABASE IF NOT EXISTS `ume_school_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ume_school_db`;


-- Dumping structure for table ume_school_db.tbl_schadule
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- Dumping data for table ume_school_db.tbl_schadule: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_schadule` DISABLE KEYS */;
INSERT INTO `tbl_schadule` (`sch_id`, `sch_created`, `sch_modified`, `tbl_classes_cla_id`, `sch_academic_year`, `sch_semester`, `sch_year_number`) VALUES
	(43, '2014-09-03 19:27:01', '2014-09-04 00:06:21', 4, '2014-2015', 1, 1),
	(44, '2014-09-04 19:16:15', '2014-09-05 00:16:15', 2, '2014-2015', 1, 1);
/*!40000 ALTER TABLE `tbl_schadule` ENABLE KEYS */;


-- Dumping structure for table ume_school_db.tbl_schadule_detail
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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

-- Dumping data for table ume_school_db.tbl_schadule_detail: ~20 rows (approximately)
/*!40000 ALTER TABLE `tbl_schadule_detail` DISABLE KEYS */;
INSERT INTO `tbl_schadule_detail` (`scd_id`, `tbl_schadule_sch_id`, `tbl_staffs_sta_id`, `scd_time`, `scd_day`, `scd_section`, `tbl_room_rom_id`, `tbl_subject_sub_id`) VALUES
	(41, 43, NULL, '7:30-9:00', 1, 1, NULL, NULL),
	(42, 43, NULL, '7:30-9:00', 2, 1, NULL, NULL),
	(43, 43, NULL, '7:30-9:00', 3, 1, NULL, NULL),
	(44, 43, NULL, '7:30-9:00', 4, 1, NULL, NULL),
	(45, 43, NULL, '7:30-9:00', 5, 1, NULL, NULL),
	(46, 43, NULL, '9:15-10:45', 1, 2, NULL, NULL),
	(47, 43, NULL, '9:15-10:45', 2, 2, NULL, NULL),
	(48, 43, NULL, '9:15-10:45', 3, 2, NULL, NULL),
	(49, 43, NULL, '9:15-10:45', 4, 2, NULL, NULL),
	(50, 43, NULL, '9:15-10:45', 5, 2, NULL, NULL),
	(51, 43, NULL, '11:00-12:00', 1, 3, NULL, NULL),
	(52, 43, NULL, '11:00-12:00', 2, 3, NULL, NULL),
	(53, 43, NULL, '11:00-12:00', 3, 3, NULL, NULL),
	(54, 43, NULL, '11:00-12:00', 4, 3, NULL, NULL),
	(55, 43, NULL, '11:00-12:00', 5, 3, NULL, NULL),
	(56, 44, 4, '7:30-9:00', 1, 1, 4, 1),
	(57, 44, NULL, '7:30-9:00', 2, 1, NULL, NULL),
	(58, 44, NULL, '7:30-9:00', 3, 1, NULL, NULL),
	(59, 44, NULL, '7:30-9:00', 4, 1, NULL, NULL),
	(60, 44, NULL, '7:30-9:00', 5, 1, NULL, NULL);
/*!40000 ALTER TABLE `tbl_schadule_detail` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
