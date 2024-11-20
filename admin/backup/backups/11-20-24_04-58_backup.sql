DROP TABLE IF EXISTS `announcements`;
CREATE TABLE `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `date_posted` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `applicants`;
CREATE TABLE `applicants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `control_num` varchar(122) NOT NULL,
  `username` varchar(122) NOT NULL,
  `last_name` varchar(122) NOT NULL,
  `given_name` varchar(122) NOT NULL,
  `middle_name` varchar(144) NOT NULL,
  `email` varchar(144) NOT NULL,
  `password` varchar(122) NOT NULL,
  `address` varchar(122) NOT NULL,
  `sex` varchar(144) NOT NULL,
  `date_birth` date NOT NULL,
  `age` int(11) NOT NULL,
  `birthplace` varchar(122) NOT NULL,
  `nationality` varchar(122) NOT NULL,
  `religion` varchar(122) NOT NULL,
  `contact_no` varchar(111) NOT NULL,
  `civil_status` varchar(122) NOT NULL,
  `course_id` int(11) NOT NULL,
  `height` varchar(211) NOT NULL,
  `weight` varchar(122) NOT NULL,
  `church_name` varchar(122) NOT NULL,
  `church_address` varchar(122) NOT NULL,
  `name_pastor` varchar(122) NOT NULL,
  `pastor_no` varchar(111) NOT NULL,
  `ministry_involved` varchar(122) NOT NULL,
  `high_school` varchar(122) NOT NULL,
  `high_year_graduated` year(4) NOT NULL,
  `college_school` varchar(122) NOT NULL,
  `college_course` varchar(122) NOT NULL,
  `college_year_graduated` int(11) NOT NULL,
  `vocational_school` varchar(122) NOT NULL,
  `vocational_course` varchar(122) NOT NULL,
  `vocational_year_graduated` varchar(112) NOT NULL,
  `other_school` varchar(122) NOT NULL,
  `other_school_course` varchar(122) NOT NULL,
  `other_year_graduated` varchar(112) NOT NULL,
  `TOR` varchar(122) NOT NULL,
  `pastor_reco` varchar(122) NOT NULL,
  `stud_image` varchar(122) NOT NULL,
  `form137` varchar(122) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `calendar_event_master`;
CREATE TABLE `calendar_event_master` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) DEFAULT NULL,
  `event_start_date` date DEFAULT NULL,
  `event_end_date` date DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `calendar_event_master` (event_id, event_name, event_start_date, event_end_date) VALUES ('1', 'sige', '2024-10-03', '2024-10-04');
INSERT INTO `calendar_event_master` (event_id, event_name, event_start_date, event_end_date) VALUES ('2', 'terd', '2024-10-03', '2024-10-04');
INSERT INTO `calendar_event_master` (event_id, event_name, event_start_date, event_end_date) VALUES ('3', 'p', '2024-10-04', '2024-10-11');
INSERT INTO `calendar_event_master` (event_id, event_name, event_start_date, event_end_date) VALUES ('4', 'm', '2024-10-13', '2024-10-14');
INSERT INTO `calendar_event_master` (event_id, event_name, event_start_date, event_end_date) VALUES ('5', 'm', '2024-10-13', '2024-10-14');
INSERT INTO `calendar_event_master` (event_id, event_name, event_start_date, event_end_date) VALUES ('6', 'adsf', '2024-10-16', '2024-10-25');
INSERT INTO `calendar_event_master` (event_id, event_name, event_start_date, event_end_date) VALUES ('7', 'asdf', '2024-10-13', '2024-10-24');
INSERT INTO `calendar_event_master` (event_id, event_name, event_start_date, event_end_date) VALUES ('8', 'pogi ko', '2024-09-29', '2024-09-30');
INSERT INTO `calendar_event_master` (event_id, event_name, event_start_date, event_end_date) VALUES ('9', 'bano', '2024-10-01', '2024-10-02');
INSERT INTO `calendar_event_master` (event_id, event_name, event_start_date, event_end_date) VALUES ('10', 'ka', '2024-10-11', '2024-10-12');
INSERT INTO `calendar_event_master` (event_id, event_name, event_start_date, event_end_date) VALUES ('11', 'terd', '2024-10-01', '2024-10-02');
INSERT INTO `calendar_event_master` (event_id, event_name, event_start_date, event_end_date) VALUES ('12', 'asdf', '2024-10-02', '2024-10-03');
INSERT INTO `calendar_event_master` (event_id, event_name, event_start_date, event_end_date) VALUES ('13', 'sdfadsf', '2024-10-08', '2024-10-09');
INSERT INTO `calendar_event_master` (event_id, event_name, event_start_date, event_end_date) VALUES ('14', 'popaopokp', '2024-10-05', '2024-10-06');

DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(122) NOT NULL,
  `course_level` varchar(122) NOT NULL,
  `pre_requisite` varchar(122) NOT NULL,
  `program_id` int(255) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('1', 'certificate in Christian evangelism ', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('2', 'certificate in Christian ministry', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('3', 'certificate in ECE & SPED management', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('4', 'certificate in advance ministerial ', '1', '     ', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('5', 'certificate in associate theology', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('6', 'bachelor of theology', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('7', 'bachelor of theology major in pastoral ministry', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('8', 'bachelor of theology major in chaplaincy', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('9', 'bachelor of religious education', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('10', 'bachelor of Christian ministry major in human resources & community development', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('11', 'bachelor of Christian ministry major in Christian leadership', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('12', 'bachelor in mission major in cross culture', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('13', 'bachelor in Christian counselling', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('14', 'bachelor of Christian ministry in naturopathic medicine', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('15', 'master in theology ', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('16', 'master of divinity', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('17', 'master of religious education', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('18', 'master of Christian ministry in complementary and alternative medicine major in naturopathy', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('19', 'master of Christian ministry major in Christian leadership', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('20', 'master of arts & mission', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('21', 'master in Christian counseling', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('22', 'doctor of Christian ministry ', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('23', 'doctor of ministry in alternative medicine', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('24', 'doctor of theology ', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('25', 'doctor of religious education', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('26', 'doctor of philosophy major in Christian leadership and management', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('27', 'doctor of philosophy major in biblical studies', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('28', 'doctor of philosophy in theology', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('29', 'doctor of philosophy in Christian apologetics', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('30', 'doctor of philosophy in philosophy in religion', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('31', 'doctor of philosophy major in pastoral ministry', '1', '', '0');
INSERT INTO `course` (course_id, course_name, course_level, pre_requisite, program_id) VALUES ('32', 'doctor of philosophy major in pastoral guidance and counseling', '1', '', '0');

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(233) NOT NULL,
  `description` varchar(122) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `department` (department_id, department_name, description, dateCreated) VALUES ('25', 'terd', 'ter', '2024-10-28 00:11:58');

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `events` (id, title, description, start, end, picture, author) VALUES ('24', 'qwe1', 'qwe', '2024-11-14 09:09:00', '2024-11-14 09:13:00', '1731575227_Gaming_5000x3125.jpg', 'qwe');

DROP TABLE IF EXISTS `handled_subject_section`;
CREATE TABLE `handled_subject_section` (
  `handled_subject_section_id` int(11) NOT NULL AUTO_INCREMENT,
  `instructor_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `year_level_id` int(11) DEFAULT NULL,
  `semester` varchar(20) DEFAULT NULL,
  `academic_year` varchar(10) DEFAULT NULL,
  `start_datetime` datetime DEFAULT NULL,
  `end_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`handled_subject_section_id`),
  KEY `instructor_id` (`instructor_id`),
  KEY `subject_id` (`subject_id`),
  KEY `section_id` (`section_id`),
  KEY `year_level_id` (`year_level_id`),
  CONSTRAINT `handled_subject_section_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`emp_id`),
  CONSTRAINT `handled_subject_section_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subj_id`),
  CONSTRAINT `handled_subject_section_ibfk_3` FOREIGN KEY (`section_id`) REFERENCES `sections` (`section_id`),
  CONSTRAINT `handled_subject_section_ibfk_4` FOREIGN KEY (`year_level_id`) REFERENCES `year_level` (`year_level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `handled_subject_section` (handled_subject_section_id, instructor_id, subject_id, section_id, year_level_id, semester, academic_year, start_datetime, end_datetime) VALUES ('17', '1', '1', '1', '1', '1', '2023-2024', '2024-11-09 14:20:00', '2024-11-09 14:20:00');
INSERT INTO `handled_subject_section` (handled_subject_section_id, instructor_id, subject_id, section_id, year_level_id, semester, academic_year, start_datetime, end_datetime) VALUES ('18', '1', '11', '2', '2', '1', '2023-2024', '2024-11-09 14:20:00', '2024-11-09 14:20:00');
INSERT INTO `handled_subject_section` (handled_subject_section_id, instructor_id, subject_id, section_id, year_level_id, semester, academic_year, start_datetime, end_datetime) VALUES ('19', '1', '11', '2', '2', '2', '2023-2024', '2024-11-09 14:20:00', '2024-11-09 14:20:00');
INSERT INTO `handled_subject_section` (handled_subject_section_id, instructor_id, subject_id, section_id, year_level_id, semester, academic_year, start_datetime, end_datetime) VALUES ('20', '3', '12', '2', '3', '2', '2023-2024', '2024-11-09 14:20:00', '2024-11-09 14:20:00');
INSERT INTO `handled_subject_section` (handled_subject_section_id, instructor_id, subject_id, section_id, year_level_id, semester, academic_year, start_datetime, end_datetime) VALUES ('21', '2', '12', '3', '4', '2', '2023-2024', '2024-11-09 14:20:00', '2024-11-09 14:20:00');
INSERT INTO `handled_subject_section` (handled_subject_section_id, instructor_id, subject_id, section_id, year_level_id, semester, academic_year, start_datetime, end_datetime) VALUES ('22', '1', '1', '1', '2', '2', '2023-2024', '2024-11-09 15:24:00', '2024-11-09 15:27:00');
INSERT INTO `handled_subject_section` (handled_subject_section_id, instructor_id, subject_id, section_id, year_level_id, semester, academic_year, start_datetime, end_datetime) VALUES ('23', '3', '1', '1', '1', '2', '2023-2024', '2024-11-15 19:29:00', '2024-11-09 15:30:00');
INSERT INTO `handled_subject_section` (handled_subject_section_id, instructor_id, subject_id, section_id, year_level_id, semester, academic_year, start_datetime, end_datetime) VALUES ('24', '1', '1', '2', '2', '2', '2023-2024', '2024-11-09 19:38:00', '2024-11-09 19:38:00');
INSERT INTO `handled_subject_section` (handled_subject_section_id, instructor_id, subject_id, section_id, year_level_id, semester, academic_year, start_datetime, end_datetime) VALUES ('25', '1', '1', '2', '2', '2', '2023-2024', '2024-11-09 19:38:00', '2024-11-09 19:38:00');
INSERT INTO `handled_subject_section` (handled_subject_section_id, instructor_id, subject_id, section_id, year_level_id, semester, academic_year, start_datetime, end_datetime) VALUES ('26', '1', '1', '2', '2', '2', '2023-2024', '2024-11-09 19:38:00', '2024-11-09 19:38:00');
INSERT INTO `handled_subject_section` (handled_subject_section_id, instructor_id, subject_id, section_id, year_level_id, semester, academic_year, start_datetime, end_datetime) VALUES ('27', '1', '1', '2', '2', '2', '2023-2024', '2024-11-09 19:38:00', '2024-11-09 19:38:00');
INSERT INTO `handled_subject_section` (handled_subject_section_id, instructor_id, subject_id, section_id, year_level_id, semester, academic_year, start_datetime, end_datetime) VALUES ('28', '1', '1', '1', '1', '2', '2023-2024', '2024-11-10 00:26:00', '2024-11-10 00:25:00');
INSERT INTO `handled_subject_section` (handled_subject_section_id, instructor_id, subject_id, section_id, year_level_id, semester, academic_year, start_datetime, end_datetime) VALUES ('29', '1', '1', '1', '1', '1', '2023-2024', '2024-11-11 17:24:00', '2024-11-11 17:25:00');
INSERT INTO `handled_subject_section` (handled_subject_section_id, instructor_id, subject_id, section_id, year_level_id, semester, academic_year, start_datetime, end_datetime) VALUES ('30', '4', '12', '3', '3', '2', '2023-2024', '2024-11-11 17:49:00', '2024-11-11 17:49:00');

DROP TABLE IF EXISTS `instructors`;
CREATE TABLE `instructors` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(122) NOT NULL,
  `major` varchar(122) NOT NULL,
  `department_id` int(255) NOT NULL,
  `contact` varchar(122) NOT NULL,
  `email` varchar(122) NOT NULL,
  `birthday` date NOT NULL,
  `civil_stats` varchar(122) NOT NULL,
  `portfolio` varchar(122) NOT NULL,
  `cv` varchar(122) NOT NULL,
  `transcripts` varchar(122) NOT NULL,
  `valid_id` varchar(122) NOT NULL,
  `cover_letter` varchar(122) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `instructors` (emp_id, name, major, department_id, contact, email, birthday, civil_stats, portfolio, cv, transcripts, valid_id, cover_letter) VALUES ('1', 'noel', 'BSIS', '0', '0928304982334', 'noel@gmail.com', '2024-11-12', 'Single', 'ok', 'ok', 'ok', 'ok', 'ok');
INSERT INTO `instructors` (emp_id, name, major, department_id, contact, email, birthday, civil_stats, portfolio, cv, transcripts, valid_id, cover_letter) VALUES ('2', 'qwe', 'qwe', '0', '09553545482', 'newroskoto@gmail.com', '2024-11-08', 'single', 'Gaming_5000x3125.jpg', 'Gaming_5000x3125.jpg', 'Gaming_5000x3125.jpg', 'Gaming_5000x3125.jpg', 'Gaming_5000x3125.jpg');
INSERT INTO `instructors` (emp_id, name, major, department_id, contact, email, birthday, civil_stats, portfolio, cv, transcripts, valid_id, cover_letter) VALUES ('3', 'instructor1', 'IT', '0', '123123123123', 'newroskoto@gmail.com', '2024-11-09', 'single', 'Gaming_5000x3125.jpg', 'Gaming_5000x3125.jpg', 'Gaming_5000x3125.jpg', 'Gaming_5000x3125.jpg', 'Gaming_5000x3125.jpg');
INSERT INTO `instructors` (emp_id, name, major, department_id, contact, email, birthday, civil_stats, portfolio, cv, transcripts, valid_id, cover_letter) VALUES ('4', 'ens', 'IT', '0', '123123123123', 'newroskoto@gmail.com', '2024-11-09', 'single', 'Gaming_5000x3125.jpg', 'Gaming_5000x3125.jpg', 'Gaming_5000x3125.jpg', 'Gaming_5000x3125.jpg', 'Gaming_5000x3125.jpg');

DROP TABLE IF EXISTS `program`;
CREATE TABLE `program` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `program_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `schedule_list`;
CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `schedule_list` (id, title, description, start_datetime, end_datetime) VALUES ('1', 'Sample 101', 'This is a sample schedule only.', '2022-01-10 10:30:00', '2022-01-11 18:00:00');
INSERT INTO `schedule_list` (id, title, description, start_datetime, end_datetime) VALUES ('2', 'Sample 102', 'Sample Description 102', '2022-01-08 09:30:00', '2022-01-08 11:30:00');
INSERT INTO `schedule_list` (id, title, description, start_datetime, end_datetime) VALUES ('4', 'Sample 102', 'Sample Description', '2022-01-12 14:00:00', '2022-01-12 17:00:00');
INSERT INTO `schedule_list` (id, title, description, start_datetime, end_datetime) VALUES ('8', 'inuman session ', 'with daberkads', '2024-10-31 22:35:00', '2024-10-31 23:40:00');

DROP TABLE IF EXISTS `sections`;
CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `current_count` int(11) DEFAULT 0,
  `year_level_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `sections` (section_id, name, current_count, year_level_id) VALUES ('1', 'Section A', '1', '0');
INSERT INTO `sections` (section_id, name, current_count, year_level_id) VALUES ('2', 'Section B', '1', '0');
INSERT INTO `sections` (section_id, name, current_count, year_level_id) VALUES ('3', 'Section C', '0', '0');

DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stud_id` varchar(122) NOT NULL,
  `username` varchar(122) NOT NULL,
  `last_name` varchar(122) NOT NULL,
  `given_name` varchar(122) NOT NULL,
  `middle_name` varchar(144) NOT NULL,
  `email` varchar(144) NOT NULL,
  `password` varchar(122) NOT NULL,
  `address` varchar(122) NOT NULL,
  `sex` varchar(144) NOT NULL,
  `date_birth` date NOT NULL,
  `age` int(11) NOT NULL,
  `birthplace` varchar(122) NOT NULL,
  `nationality` varchar(122) NOT NULL,
  `religion` varchar(122) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `civil_status` varchar(122) NOT NULL,
  `course_id` int(11) NOT NULL,
  `height` decimal(5,2) NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `church_name` varchar(122) NOT NULL,
  `church_address` varchar(122) NOT NULL,
  `name_pastor` varchar(122) NOT NULL,
  `pastor_no` int(11) NOT NULL,
  `ministry_involved` varchar(122) NOT NULL,
  `high_school` varchar(122) NOT NULL,
  `high_year_graduated` year(4) NOT NULL,
  `college_school` varchar(122) NOT NULL,
  `college_course` varchar(122) NOT NULL,
  `college_year_graduated` int(11) NOT NULL,
  `vocational_school` varchar(122) NOT NULL,
  `vocational_course` varchar(122) NOT NULL,
  `vocational_year_graduated` varchar(111) NOT NULL,
  `other_school` varchar(122) NOT NULL,
  `other_school_course` varchar(122) NOT NULL,
  `other_year_graduated` varchar(111) NOT NULL,
  `TOR` varchar(122) NOT NULL,
  `pastor_reco` varchar(122) NOT NULL,
  `stud_image` varchar(122) NOT NULL,
  `form137` varchar(122) NOT NULL,
  `application_status` enum('pending','confirmed','rejected') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `section_id` int(11) DEFAULT NULL,
  `year_level_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_year_level` (`year_level_id`),
  CONSTRAINT `fk_year_level` FOREIGN KEY (`year_level_id`) REFERENCES `year_level` (`year_level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `students` (id, stud_id, username, last_name, given_name, middle_name, email, password, address, sex, date_birth, age, birthplace, nationality, religion, contact_no, civil_status, course_id, height, weight, church_name, church_address, name_pastor, pastor_no, ministry_involved, high_school, high_year_graduated, college_school, college_course, college_year_graduated, vocational_school, vocational_course, vocational_year_graduated, other_school, other_school_course, other_year_graduated, TOR, pastor_reco, stud_image, form137, application_status, created_at, section_id, year_level_id) VALUES ('73', '20240004', 'erd', 'Romero', 'Rachele Nazarene', 'Not Applicable', 'rachele@gmail.com', 'terd', 'block 55 lot 15', 'Female', '2003-02-11', '24', 'marikina', 'Filipino', 'Catholic', '982349892', 'Single', '5', '160.02', '60.00', 'Nazareno', 'Block 55 Lot 16', 'natoy', '2147483647', 'Not Applicable', 'Holy Redeemer School', '2015', 'KLD', 'BSIS', '2025', 'TESDA', 'Programming', '2016', 'Not Applicable', 'Not Applicable', '2019', 'Ok', 'Ok', 'Ok', 'Ok', 'pending', '2024-10-28 15:11:41', '1', '2');
INSERT INTO `students` (id, stud_id, username, last_name, given_name, middle_name, email, password, address, sex, date_birth, age, birthplace, nationality, religion, contact_no, civil_status, course_id, height, weight, church_name, church_address, name_pastor, pastor_no, ministry_involved, high_school, high_year_graduated, college_school, college_course, college_year_graduated, vocational_school, vocational_course, vocational_year_graduated, other_school, other_school_course, other_year_graduated, TOR, pastor_reco, stud_image, form137, application_status, created_at, section_id, year_level_id) VALUES ('75', '20240006', 'Mika', 'Salcedo', 'Jeriz Mikaela ', 'Not Applicable', 'mika@gmail.com', '$2y$10$meCAfpy2ay7YAZT3KY5bG.LbefD906h.ed.Y0DSRLks5zKiToAlAe', 'block 55 lot 15 bautista property', 'Male', '2003-02-10', '21', 'Marikina', 'Filipino', 'catholic', '2147483647', 'married', '13', '1.62', '50.00', 'asdf', 'block 55 lot 15 bautista property', 'quiboloy', '912332323', 'terd', 'Holy Redeemer School', '2014', 'sdf', 'asdf', '2014', 'asdf', 'asdf', '2014', 'N/A', 'N/A', '2021', '../uploads/applicants.xlsx', '../uploads/subjects.xlsx', '../uploads/GEC9100-Module-4.pptx', '../uploads/GEC9100-Module-2.pptx', 'pending', '2024-10-31 16:49:59', '1', '1');
INSERT INTO `students` (id, stud_id, username, last_name, given_name, middle_name, email, password, address, sex, date_birth, age, birthplace, nationality, religion, contact_no, civil_status, course_id, height, weight, church_name, church_address, name_pastor, pastor_no, ministry_involved, high_school, high_year_graduated, college_school, college_course, college_year_graduated, vocational_school, vocational_course, vocational_year_graduated, other_school, other_school_course, other_year_graduated, TOR, pastor_reco, stud_image, form137, application_status, created_at, section_id, year_level_id) VALUES ('76', '20240007', 'romeossss', 'Eustaquio III', 'Romeo', 'Villaruel', 'romeov.eustaquioiii@gmail.com', 'terd', 'block 55 lot 16', 'Male', '2003-02-13', '21', 'marikina', 'Filipino', 'Catholic', '923843435', 'Single', '6', '160.02', '60.00', 'Nazareno', 'Block 55 Lot 18', 'botoy', '2147483647', 'Not Applicable', 'Holy Redeemer School', '2010', 'KLD', 'BSIS', '2025', 'Not Applicable', 'Not Applicable', 'Not Applicable', 'Not Applicable', 'Not Applicable', 'Not Applicable', 'Ok', 'Ok', 'Ok', 'Ok', 'pending', '2024-11-03 18:04:31', '1', '1');

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `subj_id` int(11) NOT NULL AUTO_INCREMENT,
  `subj_code` varchar(122) NOT NULL,
  `subj_desc` varchar(122) NOT NULL,
  `unit` int(11) NOT NULL,
  `pre_requisite` varchar(122) NOT NULL,
  `course_id` int(11) NOT NULL,
  `semester` varchar(122) NOT NULL,
  PRIMARY KEY (`subj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `subjects` (subj_id, subj_code, subj_desc, unit, pre_requisite, course_id, semester) VALUES ('1', 'HMB101', 'niggary', '2', 'Maass', '3', 'First Year First Semester');
INSERT INTO `subjects` (subj_id, subj_code, subj_desc, unit, pre_requisite, course_id, semester) VALUES ('11', 'adsf', 'asdf', '3', ' asdfasdf asdfadsf', '3', 'Second');
INSERT INTO `subjects` (subj_id, subj_code, subj_desc, unit, pre_requisite, course_id, semester) VALUES ('12', 'new', 'fffff', '2', 'iuboiub', '2', 'First');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(122) NOT NULL,
  `username` varchar(122) NOT NULL,
  `password` varchar(122) NOT NULL,
  `role` varchar(122) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(144) NOT NULL,
  `contact_num` varchar(11) NOT NULL,
  `address` varchar(122) NOT NULL,
  `profile` varchar(122) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (id, name, username, password, role, dob, email, contact_num, address, profile, date_created) VALUES ('85', 'Marc G. Escobido', 'marc', '$2y$10$v7GKk3rSQqIx9zi4wEmKPu6XlIoLNMYhbrunx2A1EHAKY8pT/vpVi', 'Administrator', '2003-02-10', 'marcescobido@gmail.com', '09182398993', 'block 55 lot 15 bautista property', 'user_85.jpg', '2024-10-29 13:03:37');
INSERT INTO `users` (id, name, username, password, role, dob, email, contact_num, address, profile, date_created) VALUES ('87', 'Romeo V. Eustaquio III', 'terd', '$2y$10$yvS0Udp2BE3ZT24lFnVqPu2ujOnxH2V3mz9XnEchB08EKEWhv6W9q', 'Administrator', '2003-02-10', 'romeov.eustaquioiii@gmail.com', '0980192384', 'block 55 lot 15 bautista property', 'user_87.png', '2024-10-29 09:49:35');
INSERT INTO `users` (id, name, username, password, role, dob, email, contact_num, address, profile, date_created) VALUES ('88', 'jerry may romano', 'Jm', '$2y$10$L1Xned9eqc6sLIOwVaoG1OM8KbmcV7yCYA1BLZTVC2kHiaZeIwpge', 'Administrator', '2003-02-10', 'jr@gmail.com', '09182398993', 'block 55 lot 15 bautista property', 'user_88.png', '2024-10-30 15:14:50');

DROP TABLE IF EXISTS `year_level`;
CREATE TABLE `year_level` (
  `year_level_id` int(11) NOT NULL AUTO_INCREMENT,
  `year_level_name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`year_level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `year_level` (year_level_id, year_level_name, description) VALUES ('1', 'Freshman', 'First year in college');
INSERT INTO `year_level` (year_level_id, year_level_name, description) VALUES ('2', 'Sophomore', 'Second year in college');
INSERT INTO `year_level` (year_level_id, year_level_name, description) VALUES ('3', 'Junior', 'Third year in college');
INSERT INTO `year_level` (year_level_id, year_level_name, description) VALUES ('4', 'Senior', 'Fourth year in college');

