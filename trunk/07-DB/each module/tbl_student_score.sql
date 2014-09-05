-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2014 at 12:42 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ume_school_db`
--

-- --------------------------------------------------------

ALTER TABLE `tbl_students` ADD `stu_score_status` BIT(1) NULL DEFAULT b'0' ;

--
-- Table structure for table `tbl_student_score`
--

CREATE TABLE IF NOT EXISTS `tbl_student_score` (
  `stu_sco_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_generation_gen_id` int(11) NOT NULL DEFAULT '0',
  `tbl_majors_maj_id` int(11) NOT NULL DEFAULT '0',
  `tbl_shift_shi_id` int(11) NOT NULL DEFAULT '0',
  `tbl_classes_cla_id` int(11) NOT NULL DEFAULT '0',
  `tbl_students_stu_id` int(11) NOT NULL DEFAULT '0',
  `stu_sco_attendance` double(5,2) DEFAULT '0.00' COMMENT 'Attendance 10%',
  `stu_sco_homework` double(5,2) DEFAULT '0.00' COMMENT 'Homework, Quiz, and Assignment 15%',
  `stu_sco_midterm_exam` double(5,2) DEFAULT '0.00' COMMENT 'Midterm exam 25%',
  `stu_sco_final_exam` double(5,2) DEFAULT '0.00' COMMENT 'Final exam 50%',
  `stu_sco_average` double(5,2) DEFAULT '0.00' COMMENT 'Total average of all scores type',
  `stu_sco_rank` int(11) DEFAULT '0',
  `stu_sco_mention` char(1) DEFAULT NULL,
  `stu_sco_gpa` double(5,2) DEFAULT '0.00',
  `stu_sco_created` date NOT NULL,
  `stu_sco_modified` date DEFAULT NULL,
  PRIMARY KEY (`stu_sco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
