-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.12-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             8.0.0.4396
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table ume_school_db.tbl_staff_evaluation
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
