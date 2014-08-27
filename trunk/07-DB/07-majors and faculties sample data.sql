# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.53-community-log
# Server OS:                    Win64
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2014-08-24 13:56:42
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping database structure for ume_school_db
CREATE DATABASE IF NOT EXISTS `ume_school_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ume_school_db`;


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
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
