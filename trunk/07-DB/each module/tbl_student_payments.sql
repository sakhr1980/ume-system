-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2014 at 06:07 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

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

--
-- Table structure for table `tbl_student_payments`
--

CREATE TABLE IF NOT EXISTS `tbl_student_payments` (
  `sp_id` int(11) NOT NULL AUTO_INCREMENT,
  `tbl_students_stu_id` int(11) DEFAULT NULL,
  `tbl_users_id` int(11) DEFAULT NULL,
  `tbl_subjects_sub_id` int(11) DEFAULT NULL,
  `sp_date_pay` varchar(50) DEFAULT NULL,
  `sp_year` int(11) DEFAULT NULL,
  `sp_amounce` float DEFAULT NULL,
  `sp_status` int(11) DEFAULT NULL,
  `tbl_majors_maj_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`sp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_student_payments`
--

INSERT INTO `tbl_student_payments` (`sp_id`, `tbl_students_stu_id`, `tbl_users_id`, `tbl_subjects_sub_id`, `sp_date_pay`, `sp_year`, `sp_amounce`, `sp_status`, `tbl_majors_maj_id`) VALUES
(3, 4, NULL, 4, '2014-09-03', 4, 189, 1, 10),
(4, 4, NULL, 4, '2014-09-03', 3, 189, 0, 3),
(5, 3, NULL, 4, '2014-09-05', 3, 189, 0, 3),
(6, 3, NULL, 2, '2014-09-04', 3, 200, 1, 5),
(7, 3, NULL, 2, '2014-09-03', 3, 189, 1, 6),
(8, 3, NULL, 3, '2014-09-05', 3, 200, 1, 6),
(9, 3, NULL, 6, '2014-09-04', 4, 200, 0, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
