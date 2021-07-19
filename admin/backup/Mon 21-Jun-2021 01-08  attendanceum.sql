DROP TABLE absence;

CREATE TABLE `absence` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `course_code` varchar(20) NOT NULL,
  `occurence_code` varchar(20) NOT NULL,
  `lecturer_uname` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `week_no` varchar(10) NOT NULL,
  `student_uname` varchar(20) NOT NULL,
  `category` varchar(1000) NOT NULL,
  `reason` varchar(1000) NOT NULL,
  `supporting_doc` varchar(200) NOT NULL,
  `submit_date` varchar(20) NOT NULL,
  `status` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

INSERT INTO absence VALUES("6","WIF3001","K3","17122291","14/05/2021","5","wif180004","","","","","0");
INSERT INTO absence VALUES("7","WIF3002","K1","17122291","14/05/2021","5","wif180001","Medical Leave","Shan testing","77WIF3004 Assignment.pdf","2021-06-20","2");
INSERT INTO absence VALUES("8","WIF3001","K3","17122291","14/05/2021","5","wif180003","","","","","0");
INSERT INTO absence VALUES("9","WIF3003","K2","17122291","14/05/2021","5","wif180002","","","","","0");
INSERT INTO absence VALUES("11","WIF3003","K1","17122291","14/05/2021","5","wif180003","","","","","0");
INSERT INTO absence VALUES("12","WIF3003","K3","17122291","14/05/2021","5","wif180002","","","","","0");
INSERT INTO absence VALUES("21","WIF3002","K3","17122291","14/05/2021","5","wif180001","","","","","0");



DROP TABLE access;

CREATE TABLE `access` (
  `acc_id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_uname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `acc_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `acc_pass` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `acc_role` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `acc_fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`acc_id`),
  UNIQUE KEY `acc_uname` (`acc_uname`),
  UNIQUE KEY `acc_email` (`acc_email`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

INSERT INTO access VALUES("2","wif180002","wif180002@siswa.um.edu.my","0192023a7bbd73250516f069df18b500","1","THARVINASH A/L VISVANATHAN");
INSERT INTO access VALUES("3","wif180003","wif180003@siswa.um.edu.my","0192023a7bbd73250516f069df18b500","1","SHIVA A/L CHIVATHANNU @ SIDAMBARAM");
INSERT INTO access VALUES("4","wif180004","wif180004@siswa.um.edu.my","0192023a7bbd73250516f069df18b500","1","KISHEN A/L NAHINDRAN");
INSERT INTO access VALUES("5","wif180005","wif180005@siswa.um.edu.my","0192023a7bbd73250516f069df18b500","1","PRASANTH A/L MANIMARAN");
INSERT INTO access VALUES("6","wif180006","wif180006@siswa.um.edu.my","0192023a7bbd73250516f069df18b500","1","LOGAN A/L SATHIVELOO");
INSERT INTO access VALUES("7","wif180007","wif180007@siswa.um.edu.my","0192023a7bbd73250516f069df18b500","1","THINAGAAR A/L GANESAN");
INSERT INTO access VALUES("8","wif180008","wif180008@siswa.um.edu.my","0192023a7bbd73250516f069df18b500","1","KALAIARASAN A/L BALAN");
INSERT INTO access VALUES("10","17122292","tkchiew@um.edu.my","0192023a7bbd73250516f069df18b500","2","Dr.CHIEW THIAM KIAN");
INSERT INTO access VALUES("11","17122293","hema@um.edu.my","0192023a7bbd73250516f069df18b500","2","Dr.HEMA A/P SUBRAMANIAM");
INSERT INTO access VALUES("12","17122294","aznulqalid@um.edu.my","0192023a7bbd73250516f069df18b500","2","Dr.AZNUL QALID BIN MD SABRI");
INSERT INTO access VALUES("13","17122295","erma@um.edu.my","0192023a7bbd73250516f069df18b500","2","Dr.ERMA RAHAYU BINTI MOHD FAIZAL ABDULLAH");
INSERT INTO access VALUES("14","17122296","norjihan@um.edu.my","0192023a7bbd73250516f069df18b500","2","Dr.NORJIHAN BINTI ABDUL GHANI");
INSERT INTO access VALUES("15","17122297","badrul@um.edu.my","0192023a7bbd73250516f069df18b500","2","Dr.NOR BADRUL ANUAR BIN JUMA\'AT");
INSERT INTO access VALUES("16","17122298","ainuddin@um.edu.my","0192023a7bbd73250516f069df18b500","2","Dr.AINUDDIN WAHID BIN ABDUL WAHAB");
INSERT INTO access VALUES("17","ms1718001","jalal@um.edu.my","0192023a7bbd73250516f069df18b500","3","Dr.MOHD JALALUDDIN AHMAD");
INSERT INTO access VALUES("31","17122291","hazrina@um.edu.my","0192023a7bbd73250516f069df18b500","2","Dr.HAZRINA BINTI SOFIAN");
INSERT INTO access VALUES("34","wif180001","wif180001@siswa.um.edu.my","0192023a7bbd73250516f069df18b500","1","SHANMUGASUNDRAN A/L RAMACHANDRAN");



DROP TABLE backup;

CREATE TABLE `backup` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

INSERT INTO backup VALUES("14","Thu 27-May-2021 04-32","Thu 27-May","2021","04-32");
INSERT INTO backup VALUES("16","Fri 04-Jun-2021 07-58","Fri 04-Jun","2021","07-58");
INSERT INTO backup VALUES("42","Thu 10-Jun-2021 23-45","Thu 10-Jun","2021","23-45");
INSERT INTO backup VALUES("44","Sun 13-Jun-2021 20-11","Sun 13-Jun","2021","20-11");
INSERT INTO backup VALUES("45","Sun 13-Jun-2021 23-06","Sun 13-Jun","2021","23-06");



DROP TABLE course;

CREATE TABLE `course` (
  `courseid` int(255) NOT NULL,
  `CourseType` int(10) NOT NULL,
  `CourseCode` varchar(10) NOT NULL,
  `CourseName` varchar(255) DEFAULT NULL,
  `ClassDetail` varchar(255) DEFAULT NULL,
  `ClassDay` varchar(10) NOT NULL,
  `ClassTime` varchar(255) NOT NULL,
  PRIMARY KEY (`courseid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO course VALUES("1","1","WIX1002","Fundamentals of Programming","Lecture 1","Tuesday","9.00 AM - 11.00 AM");
INSERT INTO course VALUES("2","1","WIX1002","Fundamentals of Programming","Tutorial 1","Thursday","11.00 AM - 2.00 PM");
INSERT INTO course VALUES("3","1","WIX1003","Computer System and Organization","Lecture 1","Tuesday","3.00 PM - 6.00 PM");
INSERT INTO course VALUES("4","1","WIX2002","Project Management","Lecture 1","Tuesday","11.00 AM - 1.00 PM");
INSERT INTO course VALUES("5","1","WIX2002","Project Management","Tutorial 1","Thursday","11.00 AM - 12.00 PM");
INSERT INTO course VALUES("6","2","WIX3001","Soft Computing","Lecture 1","Wednesday ","4.00 PM - 6.00 PM");
INSERT INTO course VALUES("7","2","WIX3001","Soft Computing","Tutorial 1","Thursday","1.00 PM - 2.00 PM");
INSERT INTO course VALUES("8","2","WIX3001","Soft Computing","Tutorial 2","Friday","2.00 PM - 3.00 PM");
INSERT INTO course VALUES("9","2","WIX3005","Digital Cinematography","Lecture 1","Tuesday","12.00 PM - 3.00 PM");
INSERT INTO course VALUES("10","3","WIA1002","Data Structure","Lecture 1","Tuesday","9.00 AM - 11.00 AM");
INSERT INTO course VALUES("11","3","WIA1002","Data Structure","Tutorial 1","Tuesday","11.00 AM - 2.00 PM");
INSERT INTO course VALUES("12","3","WIA1002","Data Structure","Tutorial 2","Friday","2.00 PM - 5.00 PM");
INSERT INTO course VALUES("13","3","WIA1003","Computer System Architecture","Lecture 1","Monday","4.00 PM - 6.00 PM");
INSERT INTO course VALUES("14","3","WIA1003","Computer System Architecture","Tutorial 1","Wednesday","6.00 PM - 7.00 PM");
INSERT INTO course VALUES("15","3","WIA1003","Computer System Architecture","Tutorial 2","Thursday","3.00 PM - 4.00 PM");
INSERT INTO course VALUES("16","3","WIA1003","Computer System Architecture","Tutorial 3","Thursday","4.00 PM - 5.00 PM");
INSERT INTO course VALUES("17","3","WIA1004","Fundamental Artificial Intelligence","Lecture 1","Monday","9.00 AM - 11.00 AM");
INSERT INTO course VALUES("18","3","WIA1004","Fundamental Artificial Intelligence","Tutorial 1","Wednesday","3.00 PM - 4.00 PM");
INSERT INTO course VALUES("19","3","WIA1004","Fundamental Artificial Intelligence","Tutorial 2","Wednesday","4.00 PM - 5.00 PM");
INSERT INTO course VALUES("20","4","WIF3001","Software Testing","Lecture 1","Monday","11.00 AM - 1.00 PM");
INSERT INTO course VALUES("21","4","WIF3001","Software Testing","Tutorial 1","Friday","9.00 AM - 10.00 AM");
INSERT INTO course VALUES("22","4","WIF3001","Software Testing","Tutorial 2","Friday","10.00 AM - 11.00 AM");
INSERT INTO course VALUES("23","4","WIF3001","Software Testing","Tutorial 3","Friday","4.00 PM - 5.00 PM");
INSERT INTO course VALUES("24","4","WIF3002","Software Process and Quality","Lecture 1","Tuesday","3.00 PM - 5.00 PM");
INSERT INTO course VALUES("25","4","WIF3002","Software Process and Quality","Tutorial 1","Thursday","9.00 AM - 10.00 AM");
INSERT INTO course VALUES("26","4","WIF3002","Software Process and Quality","Tutorial 2","Thursday","10.00 AM - 11.00 AM");
INSERT INTO course VALUES("27","4","WIF3002","Software Process and Quality","Tutorial 3","Thursday","12.00 PM - 1.00 PM");
INSERT INTO course VALUES("28","4","WIF3003","Concurrent Programming","Lecture 1","Wednesday","2.00 PM - 4.00 PM");
INSERT INTO course VALUES("29","4","WIF3003","Concurrent Programming","Tutorial 1","Friday","9.00 AM - 10.00 AM");



DROP TABLE feedback;

CREATE TABLE `feedback` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `student_uname` varchar(15) NOT NULL,
  `lecturer_name` varchar(100) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `rating` int(10) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `feedback` varchar(1000) NOT NULL,
  `date` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8mb4;

INSERT INTO feedback VALUES("18","wif180001","Dr.HAZRINA BINTI SOFIAN","Accounting for Managers","4","Testing ","No issues","2021-May-10");
INSERT INTO feedback VALUES("21","wif180001","Dr.HAZRINA BINTI SOFIAN","Accounting for Managers","4","Testing ","No issues","2021-May-10");
INSERT INTO feedback VALUES("22","wif180001","Dr.HAZRINA BINTI SOFIAN","Business","5","Testing ","No issues","2021-May-10");



DROP TABLE lecturer_course;

CREATE TABLE `lecturer_course` (
  `register_id_lecturer` int(255) NOT NULL,
  `acc_uname` varchar(15) NOT NULL,
  `CourseCode` varchar(10) NOT NULL,
  `CourseName` varchar(255) NOT NULL,
  `ClassDetail` varchar(255) NOT NULL,
  `ClassDay` varchar(10) NOT NULL,
  `ClassTime` varchar(255) NOT NULL,
  PRIMARY KEY (`register_id_lecturer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO lecturer_course VALUES("4","wif180068","WIX2002","Project Management","Lecture 1","Tuesday","11.00 AM - 1.00 PM");



DROP TABLE lecturer_profile;

CREATE TABLE `lecturer_profile` (
  `acc_uname` varchar(15) NOT NULL,
  `acc_fullname` varchar(100) NOT NULL,
  `acc_email` varchar(100) NOT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `department` varchar(40) NOT NULL,
  `notes` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) NOT NULL,
  `mobile_office` varchar(15) NOT NULL,
  `location` varchar(100) NOT NULL,
  PRIMARY KEY (`acc_uname`),
  UNIQUE KEY `mobile` (`mobile`),
  UNIQUE KEY `acc_email` (`acc_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO lecturer_profile VALUES("17122291","Dr.HAZRINA BINTI SOFIAN","hazrina@um.edu.my","17122291_hazrina.JPG","Software Engineering","I love Teaching!","0105684572","0166302580","A21, Level 2, Block B, FSKTM");
INSERT INTO lecturer_profile VALUES("17122292","Dr.CHIEW THIAM KIAN","tkchiew@um.edu.my","17122292_tkchiew.jfif","Software Engineering","I Love Teaching!","0379676363","0379676363","A2, Level 2, Block B, FSKTM, UM");
INSERT INTO lecturer_profile VALUES("17122293","Dr.HEMA A/P SUBRAMANIAM","hema@um.edu.my","17122293_hema.jfif","Software Engineering","I Love Teaching!","","","A3, Level 2, Block B, FSKTM, UM");
INSERT INTO lecturer_profile VALUES("17122294","Dr.AZNUL QALID BIN MD SABRI","aznulqalid@um.edu.my","17122294_aznulqalid.jfif","Artificial Intelligence","I Love Teaching!","0379676308","0379676308","A4, Level 2, Block B, FSKTM, UM");
INSERT INTO lecturer_profile VALUES("17122295","Dr.ERMA RAHAYU BINTI MOHD FAIZAL ABDULLAH","erma@um.edu.my","17122295_erma.jfif","Artificial Intelligence","I Love Teaching!","0379672516","0379672516","A5, Level 2, Block B, FSKTM, UM");
INSERT INTO lecturer_profile VALUES("17122296","Dr.NORJIHAN BINTI ABDUL GHANI","norjihan@um.edu.my","17122296_norjihan.jfif","Information System","I Love Teaching!","0379676351","0379676351","A6, Level 2, Block B, FSKTM, UM");
INSERT INTO lecturer_profile VALUES("17122297","Dr.NOR BADRUL ANUAR BIN JUMA\'AT","badrul@um.edu.my","17122297_badrul.jfif","Computer System and Network","I Love Teaching!","0379676436","0379676436","A7, Level 2, Block B, FSKTM, UM");
INSERT INTO lecturer_profile VALUES("17122298","Dr.AINUDDIN WAHID BIN ABDUL WAHAB","ainuddin@um.edu.my","17122298_ainuddin.jfif","Multimedia","I Love Teaching!","0379676383","0379676383","A8, Level 2, Block B, FSKTM, UM");



DROP TABLE student_course;

CREATE TABLE `student_course` (
  `courseid` int(255) NOT NULL,
  `acc_uname` varchar(15) NOT NULL,
  `CourseCode` varchar(10) NOT NULL,
  `CourseName` varchar(255) NOT NULL,
  `ClassDetail` varchar(255) NOT NULL,
  `ClassDay` varchar(10) NOT NULL,
  `ClassTime` varchar(255) NOT NULL,
  PRIMARY KEY (`courseid`,`acc_uname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO student_course VALUES("1","17093605","WIX1002","Fundamentals of Programming","Lecture 1","Tuesday","9.00 AM - 11.00 AM");
INSERT INTO student_course VALUES("1","17122297","WIX1002","Fundamentals of Programming","Lecture 1","Tuesday","9.00 AM - 11.00 AM");
INSERT INTO student_course VALUES("1","wif180069","WIX1002","Fundamentals of Programming","Lecture 1","Tuesday","9.00 AM - 11.00 AM");
INSERT INTO student_course VALUES("6","17093605","WIX3001","Soft Computing","Lecture 1","Wednesday ","4.00 PM - 6.00 PM");
INSERT INTO student_course VALUES("6","17122297","WIX3001","Soft Computing","Lecture 1","Wednesday ","4.00 PM - 6.00 PM");
INSERT INTO student_course VALUES("6","wif180069","WIX3001","Soft Computing","Lecture 1","Wednesday ","4.00 PM - 6.00 PM");
INSERT INTO student_course VALUES("7","17093605","WIX3001","Soft Computing","Tutorial 1","Thursday","1.00 PM - 2.00 PM");
INSERT INTO student_course VALUES("7","17122297","WIX3001","Soft Computing","Tutorial 1","Thursday","1.00 PM - 2.00 PM");
INSERT INTO student_course VALUES("10","17093605","WIA1002","Data Structure","Lecture 1","Tuesday","9.00 AM - 11.00 AM");
INSERT INTO student_course VALUES("10","17122297","WIA1002","Data Structure","Lecture 1","Tuesday","9.00 AM - 11.00 AM");
INSERT INTO student_course VALUES("12","17093605","WIA1002","Data Structure","Tutorial 2","Friday","2.00 PM - 5.00 PM");



DROP TABLE student_profile;

CREATE TABLE `student_profile` (
  `acc_uname` varchar(15) NOT NULL,
  `acc_fullname` varchar(100) NOT NULL,
  `acc_email` varchar(100) NOT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `course` varchar(40) NOT NULL,
  `year_study` varchar(15) NOT NULL,
  `notes` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) NOT NULL,
  `priv_email` varchar(70) NOT NULL,
  `address` varchar(100) NOT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `parent_name` varchar(50) NOT NULL,
  `parent_mobile` varchar(15) NOT NULL,
  `parent_email` varchar(70) DEFAULT NULL,
  `parent_address` varchar(100) NOT NULL,
  `parent_postcode` varchar(10) NOT NULL,
  `parent_city` varchar(30) NOT NULL,
  `parent_state` varchar(30) NOT NULL,
  PRIMARY KEY (`acc_uname`),
  UNIQUE KEY `priv_email` (`priv_email`),
  UNIQUE KEY `mobile` (`mobile`),
  UNIQUE KEY `acc_email` (`acc_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO student_profile VALUES("wif180001","SHANMUGASUNDRAN A/L RAMACHANDRAN","wif180001@siswa.um.edu.my","wif180001_shan.jpg","Artificial Engineering","3","Work Hard, Rest and Work Harder","0166302589","shanmugasundran1@gmail.com","NO 78, PERSIARAN BLM 1,
BANDAR LAGUNA MERBOK","08000","SUNGAI PETANI","Kedah","Ramachandran","0103757131","kjora33@yahoo.com","NO 78, PERSIARAN BLM 1,
BANDAR LAGUNA MERBOK","08000","SUNGAI PETANI","Kedah");
INSERT INTO student_profile VALUES("wif180002","THARVINASH A/L VISVANATHAN","wif180002@siswa.um.edu.my","tharvinash.jpg","Software Engineering","3","I am Tharvin","0167644245","tharvin@gmail.com","Butterworth","12000","Butterworth","Penang","VISVANATHAN","0167644245","visvanathan@gmail.com","Butterworth","12000","Butterworth","Penang");
INSERT INTO student_profile VALUES("wif180003","SHIVA A/L CHIVATHANNU @ SIDAMBARAM","wif180003@siswa.um.edu.my","shiva.jpg","Software Engineering","3","I am Shiva","0105684572","shiva@gmail.com","Puchong Baru","41700","Puchong Baru","Selangor","CHIVATHANNU","0105684572","chivathannu@gmail.com","Puchong Baru","41700","Puchong Baru","Selangor");
INSERT INTO student_profile VALUES("wif180004","KISHEN A/L NAHINDRAN","wif180004@siswa.um.edu.my","kishen.jpg","Software Engineering","3","I am Kishen","0189724199","kishen@gmail.com","Johor Bharu","79100","Johor Bharu","Johor","NAHINDRAN","0189724199","nahindran@gmail.com","Johor Bharu","79100","Johor Bharu","Johor");
INSERT INTO student_profile VALUES("wif180005","PRASANTH A/L MANIMARAN","wif180005@siswa.um.edu.my","prasanth.jpg","Software Engineering","3","I am Pras","0146642285","pras@gmail.com","Petaling Jaya","40150","Petaling Jaya","Selangor","MANIMARAN","0146642285","manimaran@gmail.com","Petaling Jaya","40150","Petaling Jaya","Selangor");
INSERT INTO student_profile VALUES("wif180006","LOGAN A/L SATHIVELOO","wif180006@siswa.um.edu.my","logan.jpg","Software Engineering","3","I am Logan","0183714461","logan@gmail.com","Petaling Jaya","40150","Petaling Jaya","Selangor","SATHIVELOO","0183714461","sathiveloo@gmail.com","Petaling Jaya","40150","Petaling Jaya","Selangor");
INSERT INTO student_profile VALUES("wif180007","THINAGAAR A/L GANESAN","wif180007@siswa.um.edu.my","thinagaar.jpg","Software Engineering","3","I am Thina","0164474370","thina@gmail.com","Bedong","08100","Bedong","Kedah","GANESAN","0164474370","ganesan@gmail.com","Bedong","08100","Bedong","Kedah");
INSERT INTO student_profile VALUES("wif180008","KALAIARASAN A/L BALAN","wif180008@siswa.um.edu.my","kalaiarasan.jpg","Artificial Intelligence","3","I am Kalai","01111341338","kalai@gmail.com","Kulim","09000","Kulim","Kedah","BALAN","01111341338","balan@gmail.com","Kulim","09000","Kulim","Kedah");



DROP TABLE subjects;

CREATE TABLE `subjects` (
  `subject_code` varchar(100) NOT NULL,
  `subject_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO subjects VALUES("PBBA11A","Innovation and Entrepreneurship (Elective)");
INSERT INTO subjects VALUES("PBBA21A","International Business (Elective)");
INSERT INTO subjects VALUES("PBBA31A","Human Resources Development (Elective)");
INSERT INTO subjects VALUES("PBBA32A","Organizational Development (Elective)");
INSERT INTO subjects VALUES("PBBA33A","Security Analysis and Portfolio Management (Elective)");
INSERT INTO subjects VALUES("PBBA34A","Merchant Banking and Financial Services (Elective)");
INSERT INTO subjects VALUES("PBBA41A","Performance Management (Elective)");
INSERT INTO subjects VALUES("PBBA42A","Banking and Insurance (Elective)");
INSERT INTO subjects VALUES("PBBI21A","Internship");
INSERT INTO subjects VALUES("PBBM11A","Management Principles and Business Ethics");
INSERT INTO subjects VALUES("PBBM12A","Quantitative and Research Methods in Business");
INSERT INTO subjects VALUES("PBBM13A","Organisational Behaviour");
INSERT INTO subjects VALUES("PBBM14A","Accounting for Managers");
INSERT INTO subjects VALUES("PBBM15A","Managerial Economics");



DROP TABLE test;

CREATE TABLE `test` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO test VALUES("1","shanmuga.sundran@yahoo.com","admin123");



