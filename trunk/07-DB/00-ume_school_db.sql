# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.53-community-log
# Server OS:                    Win64
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2014-06-06 15:35:23
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping database structure for ume_school_db
DROP DATABASE IF EXISTS `ume_school_db`;
CREATE DATABASE IF NOT EXISTS `ume_school_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ume_school_db`;


# Dumping structure for table ume_school_db.tbl_caricular
DROP TABLE IF EXISTS `tbl_caricular`;
CREATE TABLE IF NOT EXISTS `tbl_caricular` (
  `car_id` int(11) NOT NULL,
  `car_name` varchar(45) DEFAULT NULL,
  `car_status` bit(1) DEFAULT NULL,
  `cur_create_date` date DEFAULT NULL,
  `cur_moditied_date` date DEFAULT NULL,
  `mar_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`car_id`),
  KEY `fk_tbl_caricular_tbl_marjor1` (`mar_id`),
  CONSTRAINT `fk_tbl_caricular_tbl_marjor1` FOREIGN KEY (`mar_id`) REFERENCES `tbl_marjor` (`mar_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_caricular: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_caricular` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_caricular` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_class
DROP TABLE IF EXISTS `tbl_class`;
CREATE TABLE IF NOT EXISTS `tbl_class` (
  `cla_id` int(11) NOT NULL,
  `cla_name` varchar(45) DEFAULT NULL,
  `cla_shi_id` int(11) DEFAULT NULL,
  `cla_copasity` int(11) DEFAULT NULL,
  `maj_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cla_id`),
  KEY `fk_tbl_class_tbl_marjor1` (`maj_id`),
  CONSTRAINT `fk_tbl_class_tbl_marjor1` FOREIGN KEY (`maj_id`) REFERENCES `tbl_marjor` (`mar_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_class: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_class` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_class` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_cur_sub
DROP TABLE IF EXISTS `tbl_cur_sub`;
CREATE TABLE IF NOT EXISTS `tbl_cur_sub` (
  `cur_sub_id` int(11) NOT NULL,
  `cur_id` int(11) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `cur_sub_hours` int(11) DEFAULT NULL,
  `cur_sub_create_date` date DEFAULT NULL,
  `cur_sub_modified_date` date DEFAULT NULL,
  PRIMARY KEY (`cur_sub_id`),
  KEY `fk_tbl_cur_sub_tbl_subject1` (`sub_id`),
  KEY `fk_tbl_cur_sub_tbl_caricular1` (`cur_id`),
  CONSTRAINT `fk_tbl_cur_sub_tbl_subject1` FOREIGN KEY (`sub_id`) REFERENCES `tbl_subject` (`sub_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_cur_sub_tbl_caricular1` FOREIGN KEY (`cur_id`) REFERENCES `tbl_caricular` (`car_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_cur_sub: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_cur_sub` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cur_sub` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_group_access_leval
DROP TABLE IF EXISTS `tbl_group_access_leval`;
CREATE TABLE IF NOT EXISTS `tbl_group_access_leval` (
  `gro_id` int(11) NOT NULL,
  `gro_name` varchar(45) DEFAULT NULL,
  `gro_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`gro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_group_access_leval: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_group_access_leval` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_group_access_leval` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_group_task
DROP TABLE IF EXISTS `tbl_group_task`;
CREATE TABLE IF NOT EXISTS `tbl_group_task` (
  `gro_tas_id` int(11) NOT NULL,
  `gro_id` int(11) DEFAULT NULL,
  `tas_id` int(11) DEFAULT NULL,
  `gro_tas_status` bit(1) DEFAULT NULL,
  `tbl_module_mod_id` int(11) NOT NULL,
  PRIMARY KEY (`gro_tas_id`,`tbl_module_mod_id`),
  KEY `fk_tbl_group_task_tbl_group_access_leval1` (`gro_id`),
  KEY `fk_tbl_group_task_tbl_task1` (`tas_id`),
  KEY `fk_tbl_group_task_tbl_module1` (`tbl_module_mod_id`),
  CONSTRAINT `fk_tbl_group_task_tbl_group_access_leval1` FOREIGN KEY (`gro_id`) REFERENCES `tbl_group_access_leval` (`gro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_group_task_tbl_task1` FOREIGN KEY (`tas_id`) REFERENCES `tbl_task` (`tas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_group_task_tbl_module1` FOREIGN KEY (`tbl_module_mod_id`) REFERENCES `tbl_module` (`mod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_group_task: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_group_task` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_group_task` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_marjor
DROP TABLE IF EXISTS `tbl_marjor`;
CREATE TABLE IF NOT EXISTS `tbl_marjor` (
  `mar_id` int(11) NOT NULL,
  `mar_name` varchar(45) DEFAULT NULL,
  `mar_status` bit(1) DEFAULT NULL,
  `mar_fac_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`mar_id`),
  KEY `fk_tbl_marjor_tbl_marjor_facuty1` (`mar_fac_id`),
  CONSTRAINT `fk_tbl_marjor_tbl_marjor_facuty1` FOREIGN KEY (`mar_fac_id`) REFERENCES `tbl_marjor_facuty` (`mar_fac_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_marjor: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_marjor` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_marjor` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_marjor_facuty
DROP TABLE IF EXISTS `tbl_marjor_facuty`;
CREATE TABLE IF NOT EXISTS `tbl_marjor_facuty` (
  `mar_fac_id` int(11) NOT NULL,
  `mar_fac_name` varchar(45) DEFAULT NULL,
  `mar_fac_status` bit(1) DEFAULT NULL,
  `mar_fac_description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`mar_fac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_marjor_facuty: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_marjor_facuty` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_marjor_facuty` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_module
DROP TABLE IF EXISTS `tbl_module`;
CREATE TABLE IF NOT EXISTS `tbl_module` (
  `mod_id` int(11) NOT NULL,
  `mod_name` varchar(45) DEFAULT NULL,
  `mod_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`mod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_module: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_module` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_module` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_student
DROP TABLE IF EXISTS `tbl_student`;
CREATE TABLE IF NOT EXISTS `tbl_student` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(45) DEFAULT NULL,
  `stu_kh_name` varchar(45) DEFAULT NULL,
  `stu_dob` date DEFAULT NULL,
  `stu_address` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_student: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_student` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_student` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_student_class
DROP TABLE IF EXISTS `tbl_student_class`;
CREATE TABLE IF NOT EXISTS `tbl_student_class` (
  `stu_cla_id` int(11) NOT NULL,
  `stu_id` int(11) DEFAULT NULL,
  `cla_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`stu_cla_id`),
  KEY `fk_tbl_student_class_tbl_student1` (`stu_id`),
  KEY `fk_tbl_student_class_tbl_class1` (`cla_id`),
  CONSTRAINT `fk_tbl_student_class_tbl_student1` FOREIGN KEY (`stu_id`) REFERENCES `tbl_student` (`stu_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_student_class_tbl_class1` FOREIGN KEY (`cla_id`) REFERENCES `tbl_class` (`cla_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_student_class: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_student_class` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_student_class` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_subject
DROP TABLE IF EXISTS `tbl_subject`;
CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(45) DEFAULT NULL,
  `sub_description` varchar(200) DEFAULT NULL,
  `sub_hours` int(11) DEFAULT NULL,
  `sub_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_subject: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_subject` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_subject` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_task
DROP TABLE IF EXISTS `tbl_task`;
CREATE TABLE IF NOT EXISTS `tbl_task` (
  `tas_id` int(11) NOT NULL,
  `tas_name` varchar(45) DEFAULT NULL,
  `tas_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`tas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_task: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_task` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_task` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_user
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `use_id` int(11) NOT NULL,
  `use_name` varchar(45) DEFAULT NULL,
  `gro_id` int(11) DEFAULT NULL,
  `use_pass` varchar(100) DEFAULT NULL,
  `use_status` bit(1) DEFAULT NULL,
  PRIMARY KEY (`use_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;


# Dumping structure for table ume_school_db.tbl_user_group
DROP TABLE IF EXISTS `tbl_user_group`;
CREATE TABLE IF NOT EXISTS `tbl_user_group` (
  `use_gro_id` int(11) NOT NULL,
  `use_id` int(11) DEFAULT NULL,
  `gro_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`use_gro_id`),
  KEY `fk_tbl_user_group_tbl_user1` (`use_id`),
  KEY `fk_tbl_user_group_tbl_group_access_leval1` (`gro_id`),
  CONSTRAINT `fk_tbl_user_group_tbl_user1` FOREIGN KEY (`use_id`) REFERENCES `tbl_user` (`use_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_user_group_tbl_group_access_leval1` FOREIGN KEY (`gro_id`) REFERENCES `tbl_group_access_leval` (`gro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  KEY `fk_tbl_user_task_tbl_task1` (`tas_id`),
  CONSTRAINT `fk_tbl_user_task_tbl_user1` FOREIGN KEY (`use_id`) REFERENCES `tbl_user` (`use_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_user_task_tbl_task1` FOREIGN KEY (`tas_id`) REFERENCES `tbl_task` (`tas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Dumping data for table ume_school_db.tbl_user_task: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_user_task` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user_task` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
