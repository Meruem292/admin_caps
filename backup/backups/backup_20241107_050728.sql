DROP TABLE IF EXISTS `announcements`;
CREATE TABLE `announcements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `date_posted` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `announcements` (id,title,body,picture,date_posted) VALUES ('6','title','body','uploads/Gaming_5000x3125.jpg','2024-11-07 01:26:03');
INSERT INTO `announcements` (id,title,body,picture,date_posted) VALUES ('7','qwewqe','qweqwe','uploads/jm.png','2024-11-07 01:30:35');
INSERT INTO `announcements` (id,title,body,picture,date_posted) VALUES ('8','xp','xp','uploads/jm.png','2024-11-07 01:30:41');

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

INSERT INTO `applicants` (id,control_num,username,last_name,given_name,middle_name,email,password,address,sex,date_birth,age,birthplace,nationality,religion,contact_no,civil_status,course_id,height,weight,church_name,church_address,name_pastor,pastor_no,ministry_involved,high_school,high_year_graduated,college_school,college_course,college_year_graduated,vocational_school,vocational_course,vocational_year_graduated,other_school,other_school_course,other_year_graduated,TOR,pastor_reco,stud_image,form137,created_at) VALUES ('185','2012923','terd','chy','garfield','monarch','garfield@gmail.com','terd','block 55 lot 15','Male','2003-02-10','21','marikina','Filipino','Catholic','0982347893','Single','3','160.019997','60','Nazareno','Block 55 Lot 15','quiboloy','9283098234','Not Applicable','Holy Redeemer School','2014','KLD','BSIS','2025','Not Applicable','Not Applicable','Not Applicable','Not Applicable','Not Applicable','Not Applicable','Ok','Ok','Ok','Ok','2024-10-31 13:16:30');
INSERT INTO `applicants` (id,control_num,username,last_name,given_name,middle_name,email,password,address,sex,date_birth,age,birthplace,nationality,religion,contact_no,civil_status,course_id,height,weight,church_name,church_address,name_pastor,pastor_no,ministry_involved,high_school,high_year_graduated,college_school,college_course,college_year_graduated,vocational_school,vocational_course,vocational_year_graduated,other_school,other_school_course,other_year_graduated,TOR,pastor_reco,stud_image,form137,created_at) VALUES ('186','2198039','erd','Romero','Rachele Nazarene','Not Applicable','rachele@gmail.com','terd','block 55 lot 15','Female','2003-02-11','24','marikina','Filipino','Catholic','0982349892','Single','5','160.019997','60','Nazareno','Block 55 Lot 16','natoy','9283098234','Not Applicable','Holy Redeemer School','2015','KLD','BSIS','2025','TESDA','Programming','2016','Not Applicable','Not Applicable','2019','Ok','Ok','Ok','Ok','2024-10-31 13:16:30');
INSERT INTO `applicants` (id,control_num,username,last_name,given_name,middle_name,email,password,address,sex,date_birth,age,birthplace,nationality,religion,contact_no,civil_status,course_id,height,weight,church_name,church_address,name_pastor,pastor_no,ministry_involved,high_school,high_year_graduated,college_school,college_course,college_year_graduated,vocational_school,vocational_course,vocational_year_graduated,other_school,other_school_course,other_year_graduated,TOR,pastor_reco,stud_image,form137,created_at) VALUES ('187','239098','oreo','sige','nigger','white','nigger@gmail.com','terd','block 55 lot 15','Male','2003-02-12','25','marikina','Filipino','Catholic','0923843434','Single','3','160.019997','60','Nazareno','Block 55 Lot 17','botoy','9283098234','Not Applicable','Holy Redeemer School','2010','KLD','BSIS','2025','Not Applicable','Not Applicable','Not Applicable','Not Applicable','Not Applicable','Not Applicable','Ok','Ok','Ok','Ok','2024-10-31 13:16:30');
INSERT INTO `applicants` (id,control_num,username,last_name,given_name,middle_name,email,password,address,sex,date_birth,age,birthplace,nationality,religion,contact_no,civil_status,course_id,height,weight,church_name,church_address,name_pastor,pastor_no,ministry_involved,high_school,high_year_graduated,college_school,college_course,college_year_graduated,vocational_school,vocational_course,vocational_year_graduated,other_school,other_school_course,other_year_graduated,TOR,pastor_reco,stud_image,form137,created_at) VALUES ('191','20241301','gart','hellsing','Jerry May','Not Applicable','asdf@gmail.com','$2y$10$n3AVnncTQmjse5Phqbj6weA.th/fA3sBK3gC8q7SELbSAGAWPJNUq','block 55 lot 15 bautista property','Female','2003-03-10','21','Marikina','Filipino','catholic','09692348756','married','17','1.61544','50kg','asdf','block 55 lot 15 bautista property','quiboloy','2012','n/a','Holy Redeemer School','2012','asdf','asdf','2012','asdf','asdf','2012','asdfa','adf','2012','../uploads/2346d10e-27f5-4d76-a790-9e004e7177d2.jpg','../uploads/Screenshot 2024-09-28 205359.png','../uploads/2346d10e-27f5-4d76-a790-9e004e7177d2.jpg','../uploads/Screenshot 2024-09-28 205359.png','2024-11-03 15:43:46');
INSERT INTO `applicants` (id,control_num,username,last_name,given_name,middle_name,email,password,address,sex,date_birth,age,birthplace,nationality,religion,contact_no,civil_status,course_id,height,weight,church_name,church_address,name_pastor,pastor_no,ministry_involved,high_school,high_year_graduated,college_school,college_course,college_year_graduated,vocational_school,vocational_course,vocational_year_graduated,other_school,other_school_course,other_year_graduated,TOR,pastor_reco,stud_image,form137,created_at) VALUES ('192','20241302','fefe','Eustaquio III','asdf','Not Applicable','marc@asdsa.gmail.com','$2y$10$4odj77PZD.5gsBHq0gHUIuuEYCwpfI7liw4Fq8eHermu3FDNUuDFC','block 55 lot 15 bautista property','Male','2003-02-10','21','Marikina','Filipino','catholic','09692348756','married','2','1.61544','50','asdf','block 55 lot 15 bautista property','quiboloy','2012','n/a','asdf','2012','asdf','asdf','2012','asdf','asdf','2012','asd','N/A','2012','/uploads/8f5279cb77fc929deee15c144595faf2.jpg','../uploads/84acb8ffbc594a715de98cb02b98843a.jpg','../uploads/d0c98aae9afd580039fd91e4a758cadd.jpg','../uploads/komi.jpg','2024-11-03 16:53:20');
INSERT INTO `applicants` (id,control_num,username,last_name,given_name,middle_name,email,password,address,sex,date_birth,age,birthplace,nationality,religion,contact_no,civil_status,course_id,height,weight,church_name,church_address,name_pastor,pastor_no,ministry_involved,high_school,high_year_graduated,college_school,college_course,college_year_graduated,vocational_school,vocational_course,vocational_year_graduated,other_school,other_school_course,other_year_graduated,TOR,pastor_reco,stud_image,form137,created_at) VALUES ('193','20241303','banana','asdf','asdf','Not Applicable','marc@asdsa.gmail.com','$2y$10$QIm6dj8l.ZOf3.1F.qoZ0uvcr3IcPq3fY0MMJgAO4XycsePXa7yCe','block 55 lot 15 bautista property','Male','2003-02-01','21','Marikina','Filipino','catholic','09692348756','married','16','1.61544','50kg','asdf','block 55 lot 15 bautista property','quiboloy','2002','n/a','asdf','2012','asdf','df','2012','asdf','asdf','2012','N/A','2012','2012','/uploads/applicants.xlsx','../uploads/2346d10e-27f5-4d76-a790-9e004e7177d2.jpg','../uploads/1d0673df-0fb2-4f5a-889f-0166f333068e.jpg','../uploads/Screenshot 2024-09-28 205359.png','2024-11-03 18:49:06');
INSERT INTO `applicants` (id,control_num,username,last_name,given_name,middle_name,email,password,address,sex,date_birth,age,birthplace,nationality,religion,contact_no,civil_status,course_id,height,weight,church_name,church_address,name_pastor,pastor_no,ministry_involved,high_school,high_year_graduated,college_school,college_course,college_year_graduated,vocational_school,vocational_course,vocational_year_graduated,other_school,other_school_course,other_year_graduated,TOR,pastor_reco,stud_image,form137,created_at) VALUES ('194','20241304','niggar','Salcedo','Romeo','Not Applicable','mika@gmail.com','$2y$10$U3sbxFrZgciYq8N8EQ3ItOB95dItKPeL8.zoDfiklyogSjJVND4Fi','block 55 lot 15 bautista property','Male','2003-02-10','21','Marikina','Filipino','catholic','09692348756','married','16','1.61544','50','asdf','block 55 lot 15 bautista property','quiboloy','2012','n/a','asdf','2012','asdf','asdf','2012','asdf','asdf','2012','N/A','N/A','2012','/uploads/jm.png','../uploads/user_23.png','../uploads/user_2.png','../uploads/user_62.png','2024-11-03 22:52:00');

DROP TABLE IF EXISTS `calendar_event_master`;
CREATE TABLE `calendar_event_master` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(255) DEFAULT NULL,
  `event_start_date` date DEFAULT NULL,
  `event_end_date` date DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `calendar_event_master` (event_id,event_name,event_start_date,event_end_date) VALUES ('1','sige','2024-10-03','2024-10-04');
INSERT INTO `calendar_event_master` (event_id,event_name,event_start_date,event_end_date) VALUES ('2','terd','2024-10-03','2024-10-04');
INSERT INTO `calendar_event_master` (event_id,event_name,event_start_date,event_end_date) VALUES ('3','p','2024-10-04','2024-10-11');
INSERT INTO `calendar_event_master` (event_id,event_name,event_start_date,event_end_date) VALUES ('4','m','2024-10-13','2024-10-14');
INSERT INTO `calendar_event_master` (event_id,event_name,event_start_date,event_end_date) VALUES ('5','m','2024-10-13','2024-10-14');
INSERT INTO `calendar_event_master` (event_id,event_name,event_start_date,event_end_date) VALUES ('6','adsf','2024-10-16','2024-10-25');
INSERT INTO `calendar_event_master` (event_id,event_name,event_start_date,event_end_date) VALUES ('7','asdf','2024-10-13','2024-10-24');
INSERT INTO `calendar_event_master` (event_id,event_name,event_start_date,event_end_date) VALUES ('8','pogi ko','2024-09-29','2024-09-30');
INSERT INTO `calendar_event_master` (event_id,event_name,event_start_date,event_end_date) VALUES ('9','bano','2024-10-01','2024-10-02');
INSERT INTO `calendar_event_master` (event_id,event_name,event_start_date,event_end_date) VALUES ('10','ka','2024-10-11','2024-10-12');
INSERT INTO `calendar_event_master` (event_id,event_name,event_start_date,event_end_date) VALUES ('11','terd','2024-10-01','2024-10-02');
INSERT INTO `calendar_event_master` (event_id,event_name,event_start_date,event_end_date) VALUES ('12','asdf','2024-10-02','2024-10-03');
INSERT INTO `calendar_event_master` (event_id,event_name,event_start_date,event_end_date) VALUES ('13','sdfadsf','2024-10-08','2024-10-09');
INSERT INTO `calendar_event_master` (event_id,event_name,event_start_date,event_end_date) VALUES ('14','popaopokp','2024-10-05','2024-10-06');

DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(122) NOT NULL,
  `course_level` varchar(122) NOT NULL,
  `pre_requisite` varchar(122) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('1','certificate in Christian evangelism ','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('2','certificate in Christian ministry','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('3','certificate in ECE & SPED management','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('4','certificate in advance ministerial ','1','     ');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('5','certificate in associate theology','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('6','bachelor of theology','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('7','bachelor of theology major in pastoral ministry','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('8','bachelor of theology major in chaplaincy','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('9','bachelor of religious education','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('10','bachelor of Christian ministry major in human resources & community development','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('11','bachelor of Christian ministry major in Christian leadership','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('12','bachelor in mission major in cross culture','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('13','bachelor in Christian counselling','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('14','bachelor of Christian ministry in naturopathic medicine','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('15','master in theology ','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('16','master of divinity','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('17','master of religious education','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('18','master of Christian ministry in complementary and alternative medicine major in naturopathy','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('19','master of Christian ministry major in Christian leadership','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('20','master of arts & mission','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('21','master in Christian counseling','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('22','doctor of Christian ministry ','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('23','doctor of ministry in alternative medicine','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('24','doctor of theology ','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('25','doctor of religious education','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('26','doctor of philosophy major in Christian leadership and management','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('27','doctor of philosophy major in biblical studies','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('28','doctor of philosophy in theology','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('29','doctor of philosophy in Christian apologetics','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('30','doctor of philosophy in philosophy in religion','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('31','doctor of philosophy major in pastoral ministry','1','');
INSERT INTO `course` (course_id,course_name,course_level,pre_requisite) VALUES ('32','doctor of philosophy major in pastoral guidance and counseling','1','');

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(233) NOT NULL,
  `description` varchar(122) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `department` (department_id,department_name,description,dateCreated) VALUES ('25','terd','ter','2024-10-28 00:11:58');

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `instructors`;
CREATE TABLE `instructors` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(122) NOT NULL,
  `major` varchar(122) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `instructors` (emp_id,name,major,contact,email,birthday,civil_stats,portfolio,cv,transcripts,valid_id,cover_letter) VALUES ('1','noel','BSIS','0928304982334','noel@gmail.com','2024-11-12','Single','ok','ok','ok','ok','ok');

DROP TABLE IF EXISTS `schedule_list`;
CREATE TABLE `schedule_list` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `schedule_list` (id,title,description,start_datetime,end_datetime) VALUES ('1','Sample 101','This is a sample schedule only.','2022-01-10 10:30:00','2022-01-11 18:00:00');
INSERT INTO `schedule_list` (id,title,description,start_datetime,end_datetime) VALUES ('2','Sample 102','Sample Description 102','2022-01-08 09:30:00','2022-01-08 11:30:00');
INSERT INTO `schedule_list` (id,title,description,start_datetime,end_datetime) VALUES ('4','Sample 102','Sample Description','2022-01-12 14:00:00','2022-01-12 17:00:00');
INSERT INTO `schedule_list` (id,title,description,start_datetime,end_datetime) VALUES ('7','hahahatdog','walang kwinta','2024-11-05 11:06:00','2024-11-06 17:10:00');
INSERT INTO `schedule_list` (id,title,description,start_datetime,end_datetime) VALUES ('8','inuman session ','with daberkads','2024-10-31 22:35:00','2024-10-31 23:40:00');

DROP TABLE IF EXISTS `sections`;
CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `current_count` int(11) DEFAULT 0,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `sections` (section_id,name,current_count) VALUES ('1','Section A','1');
INSERT INTO `sections` (section_id,name,current_count) VALUES ('2','Section B','1');
INSERT INTO `sections` (section_id,name,current_count) VALUES ('3','Section C','0');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `students` (id,stud_id,username,last_name,given_name,middle_name,email,password,address,sex,date_birth,age,birthplace,nationality,religion,contact_no,civil_status,course_id,height,weight,church_name,church_address,name_pastor,pastor_no,ministry_involved,high_school,high_year_graduated,college_school,college_course,college_year_graduated,vocational_school,vocational_course,vocational_year_graduated,other_school,other_school_course,other_year_graduated,TOR,pastor_reco,stud_image,form137,application_status,created_at,section_id) VALUES ('73','20240004','erd','Romero','Rachele Nazarene','Not Applicable','rachele@gmail.com','terd','block 55 lot 15','Female','2003-02-11','24','marikina','Filipino','Catholic','982349892','Single','5','160.02','60.00','Nazareno','Block 55 Lot 16','natoy','2147483647','Not Applicable','Holy Redeemer School','2015','KLD','BSIS','2025','TESDA','Programming','2016','Not Applicable','Not Applicable','2019','Ok','Ok','Ok','Ok','pending','2024-10-28 15:11:41','0');
INSERT INTO `students` (id,stud_id,username,last_name,given_name,middle_name,email,password,address,sex,date_birth,age,birthplace,nationality,religion,contact_no,civil_status,course_id,height,weight,church_name,church_address,name_pastor,pastor_no,ministry_involved,high_school,high_year_graduated,college_school,college_course,college_year_graduated,vocational_school,vocational_course,vocational_year_graduated,other_school,other_school_course,other_year_graduated,TOR,pastor_reco,stud_image,form137,application_status,created_at,section_id) VALUES ('75','20240006','Mika','Salcedo','Jeriz Mikaela ','Not Applicable','mika@gmail.com','$2y$10$meCAfpy2ay7YAZT3KY5bG.LbefD906h.ed.Y0DSRLks5zKiToAlAe','block 55 lot 15 bautista property','Male','2003-02-10','21','Marikina','Filipino','catholic','2147483647','married','13','1.62','50.00','asdf','block 55 lot 15 bautista property','quiboloy','912332323','terd','Holy Redeemer School','2014','sdf','asdf','2014','asdf','asdf','2014','N/A','N/A','2021','../uploads/applicants.xlsx','../uploads/subjects.xlsx','../uploads/GEC9100-Module-4.pptx','../uploads/GEC9100-Module-2.pptx','pending','2024-10-31 16:49:59','0');
INSERT INTO `students` (id,stud_id,username,last_name,given_name,middle_name,email,password,address,sex,date_birth,age,birthplace,nationality,religion,contact_no,civil_status,course_id,height,weight,church_name,church_address,name_pastor,pastor_no,ministry_involved,high_school,high_year_graduated,college_school,college_course,college_year_graduated,vocational_school,vocational_course,vocational_year_graduated,other_school,other_school_course,other_year_graduated,TOR,pastor_reco,stud_image,form137,application_status,created_at,section_id) VALUES ('76','20240007','romeo','Eustaquio III','Romeo','Villaruel','romeov.eustaquioiii@gmail.com','terd','block 55 lot 16','Male','2003-02-13','21','marikina','Filipino','Catholic','923843435','Single','6','160.02','60.00','Nazareno','Block 55 Lot 18','botoy','2147483647','Not Applicable','Holy Redeemer School','2010','KLD','BSIS','2025','Not Applicable','Not Applicable','Not Applicable','Not Applicable','Not Applicable','Not Applicable','Ok','Ok','Ok','Ok','pending','2024-11-03 18:04:31','0');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `subjects` (subj_id,subj_code,subj_desc,unit,pre_requisite,course_id,semester) VALUES ('1','HMB101','niggary','2','Maass','3','First Year First Semester');
INSERT INTO `subjects` (subj_id,subj_code,subj_desc,unit,pre_requisite,course_id,semester) VALUES ('11','adsf','asdf','3',' asdfasdf asdfadsf','3','Second');
INSERT INTO `subjects` (subj_id,subj_code,subj_desc,unit,pre_requisite,course_id,semester) VALUES ('12','bulbul','fffff','2','iuboiub','2','First');

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

INSERT INTO `users` (id,name,username,password,role,dob,email,contact_num,address,profile,date_created) VALUES ('85','Marc G. Escobido','mark','$2y$10$v7GKk3rSQqIx9zi4wEmKPu6XlIoLNMYhbrunx2A1EHAKY8pT/vpVi','Administrator','2003-02-10','marcescobido@gmail.com','09182398993','block 55 lot 15 bautista property','user_85.jpg','2024-11-07 11:26:23');
INSERT INTO `users` (id,name,username,password,role,dob,email,contact_num,address,profile,date_created) VALUES ('87','Romeo V. Eustaquio III','terd','$2y$10$yvS0Udp2BE3ZT24lFnVqPu2ujOnxH2V3mz9XnEchB08EKEWhv6W9q','Administrator','2003-02-10','romeov.eustaquioiii@gmail.com','0980192384','block 55 lot 15 bautista property','user_87.png','2024-10-29 09:49:35');
INSERT INTO `users` (id,name,username,password,role,dob,email,contact_num,address,profile,date_created) VALUES ('88','jerry may romano','Jm','$2y$10$L1Xned9eqc6sLIOwVaoG1OM8KbmcV7yCYA1BLZTVC2kHiaZeIwpge','Administrator','2003-02-10','jr@gmail.com','09182398993','block 55 lot 15 bautista property','user_88.png','2024-10-30 15:14:50');

