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


-- Dumping structure for table ume_school_db.tbl_teacher
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ume_school_db.tbl_teacher: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_teacher` DISABLE KEYS */;
INSERT INTO `tbl_teacher` (`tea_id`, `tbl_staff_sta_id`, `tbl_majors_maj_id`, `tea_created`, `tbl_classes_cla_id`, `tea_year`, `tea_semester`, `tea_academic_year`) VALUES
	(1, 6, 3, '2014-09-20 14:19:39', 2, 1, 1, '2014-2015'),
	(2, 3, 4, '2014-09-20 23:08:53', 1, 1, 1, '2014-2015');
/*!40000 ALTER TABLE `tbl_teacher` ENABLE KEYS */;


-- Dumping structure for table ume_school_db.tbl_teacher_record
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ume_school_db.tbl_teacher_record: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_teacher_record` DISABLE KEYS */;
INSERT INTO `tbl_teacher_record` (`rec_id`, `tbl_teacher_tea_id`, `rec_date`, `rec_time`, `rec_desc`, `rec_other`, `rec_student`, `rec_absent`) VALUES
	(3, 1, '1', '1', '1', '1', 1, 1),
	(4, 1, '2', '2', '2', '2', 2, 2),
	(5, 1, '3', '3', '3', '3', 3, 3),
	(6, 2, '2014-09-22', '', '', '', 0, 0),
	(7, 2, '2014-09-27', '', '', '', 0, 0);
/*!40000 ALTER TABLE `tbl_teacher_record` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
