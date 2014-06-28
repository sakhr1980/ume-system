
INSERT INTO `tbl_majors` (`maj_id`, `maj_kh_name`, `maj_name`, `maj_status`, `tbl_faculty_fac_id`) VALUES
	(3, '', ' Human Resource Management',1, 1),
	(4, '', 'Marketing Management', 1, 1),
	(5, '', 'International Business Management', '', 1),
	(6, '', 'Accounting & Finance', 1, 1),
	(7, '', 'Banking and Finance', 1, 1),
	(8, '', 'Tourism and Hospitality', '', 1),
	(10, '', 'Tourism Guide', 1, 1),
	(11, '', 'Project Management', 1, 1),
	(12, '', 'English Translation', 1, 2),
	(13, '', 'English Teaching', 1, 2),
	(14, '', 'English Communication', 1, 2),
	(15, '', 'Computer Science (Programming, Networking & MIS)', 1, 3),
	(16, '', 'Laws', 1, 4),
	(17, '', 'Economics', 1, 4),
	(18, '', 'Agronomy', 1, 5),
	(19, '', 'Rural Development',1, 5);
	
INSERT INTO `tbl_faculty` (`fac_id`, `fac_name`, `fac_status`, `fac_description`, `fac_kh_name`) VALUES
	(1, 'Faculty of Business Administration & Tourism', 1, NULL, NULL),
	(2, 'Faculty of Art, Human and Foreign Languages', 1, NULL, NULL),
	(3, 'Faculty of Science and Technology', 1, NULL, NULL),
	(4, 'Faculty of Laws and Economics', 1, NULL, NULL),
	(5, 'Faculty of Agriculture and Rural Development', 1, NULL, NULL);
