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
  `tbl_subject_sub_id` int(11) DEFAULT NULL,
  `tea_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tbl_classes_cla_id` int(11) DEFAULT NULL,
  `tea_year` int(11) NOT NULL,
  `tea_semester` int(11) NOT NULL,
  `tea_academic_year` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`tea_id`),
  KEY `fk_tbl_teacher_tbl_staff` (`tbl_staff_sta_id`),
  KEY `fk_tbl_teacher_tbl_classes` (`tbl_classes_cla_id`),
  KEY `fk_tbl_teacher_tbl_subject` (`tbl_subject_sub_id`),
  CONSTRAINT `fk_tbl_teacher_tbl_classes` FOREIGN KEY (`tbl_classes_cla_id`) REFERENCES `tbl_classes` (`cla_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_teacher_tbl_staff` FOREIGN KEY (`tbl_staff_sta_id`) REFERENCES `tbl_staff` (`sta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_teacher_tbl_subject` FOREIGN KEY (`tbl_subject_sub_id`) REFERENCES `tbl_subject` (`sub_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ume_school_db.tbl_teacher: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_teacher` DISABLE KEYS */;
INSERT INTO `tbl_teacher` (`tea_id`, `tbl_staff_sta_id`, `tbl_subject_sub_id`, `tea_created`, `tbl_classes_cla_id`, `tea_year`, `tea_semester`, `tea_academic_year`) VALUES
	(1, 6, 3, '2014-09-20 14:19:39', 2, 1, 1, '2014-2015'),
	(2, 3, 4, '2014-09-20 23:08:53', 1, 1, 1, '2014-2015'),
	(3, 3, 2, '2014-09-27 12:42:58', 1, 2, 1, '2014-2015');
/*!40000 ALTER TABLE `tbl_teacher` ENABLE KEYS */;


-- Dumping structure for table ume_school_db.tbl_teacher_payment
CREATE TABLE IF NOT EXISTS `tbl_teacher_payment` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_staff_sta_id` int(11) DEFAULT NULL,
  `rate` double(11,2) DEFAULT NULL,
  `start_date` varchar(50) DEFAULT NULL,
  `end_date` varchar(50) DEFAULT NULL,
  `pay_status` int(11) DEFAULT '1',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pay_id`),
  KEY `fk_tbl_teacher_payment_staff` (`tbl_staff_sta_id`),
  CONSTRAINT `fk_tbl_teacher_payment_staff` FOREIGN KEY (`tbl_staff_sta_id`) REFERENCES `tbl_staff` (`sta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table ume_school_db.tbl_teacher_payment: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_teacher_payment` DISABLE KEYS */;
INSERT INTO `tbl_teacher_payment` (`pay_id`, `tbl_staff_sta_id`, `rate`, `start_date`, `end_date`, `pay_status`, `created`) VALUES
	(2, 3, 7.00, '2014-09-01', '2014-09-30', 1, NULL),
	(3, 6, 7.00, '2014-09-01', '2014-09-30', 0, '2014-10-01 23:57:13'),
	(4, 6, 7.00, '2014-09-01', '2014-09-30', 1, '2014-10-02 00:02:35');
/*!40000 ALTER TABLE `tbl_teacher_payment` ENABLE KEYS */;


-- Dumping structure for table ume_school_db.tbl_teacher_payment_record
CREATE TABLE IF NOT EXISTS `tbl_teacher_payment_record` (
  `pr_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_teacher_payment_pay_id` int(11) DEFAULT NULL,
  `tbl_subject_sub_id` int(11) DEFAULT NULL,
  `hours` double(10,2) DEFAULT NULL,
  `tbl_shift_shi_id` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `promotion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pr_id`),
  KEY `fk_tbl_teacher_payment_record_subject` (`tbl_subject_sub_id`),
  KEY `fk_tbl_teacher_payment_record_shift` (`tbl_shift_shi_id`),
  KEY `fk_tbl_teacher_payment_record_payment` (`tbl_teacher_payment_pay_id`),
  CONSTRAINT `fk_tbl_teacher_payment_record_payment` FOREIGN KEY (`tbl_teacher_payment_pay_id`) REFERENCES `tbl_teacher_payment` (`pay_id`),
  CONSTRAINT `fk_tbl_teacher_payment_record_shift` FOREIGN KEY (`tbl_shift_shi_id`) REFERENCES `tbl_shift` (`shi_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_teacher_payment_record_subject` FOREIGN KEY (`tbl_subject_sub_id`) REFERENCES `tbl_subject` (`sub_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table ume_school_db.tbl_teacher_payment_record: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_teacher_payment_record` DISABLE KEYS */;
INSERT INTO `tbl_teacher_payment_record` (`pr_id`, `tbl_teacher_payment_pay_id`, `tbl_subject_sub_id`, `hours`, `tbl_shift_shi_id`, `year`, `promotion`) VALUES
	(1, 2, 2, 1.00, 1, 2, '11'),
	(2, 2, 4, 2.00, 1, 1, '11'),
	(3, 3, 3, 3.00, 1, 1, '12'),
	(4, 4, 3, 3.00, 1, 1, '12');
/*!40000 ALTER TABLE `tbl_teacher_payment_record` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table ume_school_db.tbl_teacher_record: ~6 rows (approximately)
/*!40000 ALTER TABLE `tbl_teacher_record` DISABLE KEYS */;
INSERT INTO `tbl_teacher_record` (`rec_id`, `tbl_teacher_tea_id`, `rec_date`, `rec_time`, `rec_desc`, `rec_other`, `rec_student`, `rec_absent`) VALUES
	(6, 2, '2014-09-01', '', '', '', 0, 0),
	(7, 2, '2014-09-02', '', '', '', 0, 0),
	(8, 1, '2014-09-01', '1', '1', '1', 1, 1),
	(9, 1, '2014-09-02', '2', '2', '2', 2, 2),
	(10, 1, '2014-09-03', '3', '3', '3', 3, 3),
	(11, 3, '2014-09-03', '', '', '', 0, 0);
/*!40000 ALTER TABLE `tbl_teacher_record` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
