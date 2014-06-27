# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.53-community-log
# Server OS:                    Win64
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2014-06-28 00:39:12
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
# Dumping data for table ume_school_db.tbl_marjors: ~16 rows (approximately)
/*!40000 ALTER TABLE `tbl_marjors` DISABLE KEYS */;
INSERT INTO `tbl_marjors` (`mar_id`, `mar_kh_name`, `mar_name`, `mar_status`, `tbl_marjor_facuty_mar_fac_id`) VALUES
	(3, '', ' Human Resource Management', '', 1),
	(4, '', 'Marketing Management', '', 1),
	(5, '', 'International Business Management', '', 1),
	(6, '', 'Accounting & Finance', '', 1),
	(7, '', 'Banking and Finance', '', 1),
	(8, '', 'Tourism and Hospitality', '', 1),
	(10, '', 'Tourism Guide', '', 1),
	(11, '', 'Project Management', '', 1),
	(12, '', 'English Translation', '', 2),
	(13, '', 'English Teaching', '', 2),
	(14, '', 'English Communication', '', 2),
	(15, '', 'Computer Science (Programming, Networking & MIS)', '', 3),
	(16, '', 'Laws', '', 4),
	(17, '', 'Economics', '', 4),
	(18, '', 'Agronomy', '', 5),
	(19, '', 'Rural Development', '', 5);
/*!40000 ALTER TABLE `tbl_marjors` ENABLE KEYS */;

# Dumping data for table ume_school_db.tbl_marjor_facuty: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_marjor_facuty` DISABLE KEYS */;
INSERT INTO `tbl_marjor_facuty` (`mar_fac_id`, `mar_fac_name`, `mar_fac_status`, `mar_fac_description`, `mar_fac_kh_name`) VALUES
	(1, 'Faculty of Business Administration & Tourism', '', NULL, NULL),
	(2, 'Faculty of Art, Human and Foreign Languages', '', NULL, NULL),
	(3, 'Faculty of Science and Technology', '', NULL, NULL),
	(4, 'Faculty of Laws and Economics', '', NULL, NULL),
	(5, 'Faculty of Agriculture and Rural Development', '', NULL, NULL);
/*!40000 ALTER TABLE `tbl_marjor_facuty` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
