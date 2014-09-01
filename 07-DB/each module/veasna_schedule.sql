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




-- Dumping structure for table ume_school_db.tbl_schadule
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table ume_school_db.tbl_schadule: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_schadule` DISABLE KEYS */;
INSERT INTO `tbl_schadule` (`sch_id`, `sch_title`, `sch_created`, `sch_modified`, `tbl_majors_maj_id`, `tbl_shift_shi_id`, `sch_academic_year`, `sch_semester`, `sch_year_number`) VALUES
	(13, 'b1', '2014-08-30 11:50:25', '2014-08-30 16:50:25', 11, 2, '2014-2015', 1, 2);
/*!40000 ALTER TABLE `tbl_schadule` ENABLE KEYS */;


-- Dumping structure for table ume_school_db.tbl_schadule_detail
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table ume_school_db.tbl_schadule_detail: ~15 rows (approximately)
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
	(15, 13, NULL, '', 5, 3, NULL, NULL);
/*!40000 ALTER TABLE `tbl_schadule_detail` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
