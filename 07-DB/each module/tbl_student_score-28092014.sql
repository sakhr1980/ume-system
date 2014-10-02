ALTER TABLE `tbl_student_score` CHANGE `stu_sco_gpa` `stu_sco_gpa_point` DOUBLE(5,2) NULL DEFAULT '0.00';
ALTER TABLE `tbl_student_score` ADD `stu_sco_gpa` CHAR(2) NULL DEFAULT '' AFTER `stu_sco_gpa_point`;
ALTER TABLE `tbl_staff` CHANGE `sta_start_date` `sta_start_date` DATE NOT NULL;