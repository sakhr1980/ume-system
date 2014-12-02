CREATE TABLE `tbl_attendants` (
  `att_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `att_classid` int(11) NOT NULL,
  `att_genid` int(11) NOT NULL,
  `att_date` date NOT NULL,
  `att_creater` int(11) unsigned NOT NULL,
  PRIMARY KEY (`att_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

CREATE TABLE `tbl_attendant_detail` (
  `atd_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `atd_studentid` int(11) NOT NULL,
  `atd_attendant` int(1) NOT NULL DEFAULT '1',
  `atd_comment` text CHARACTER SET latin1 NOT NULL,
  `atd_attendantid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`atd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;