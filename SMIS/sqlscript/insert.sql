/*data insertion in employee table */

insert into employee values(1821,'Dr.Muhmmad Ibrahim',500000,1821,'HOD','D.G.KHAN',03417889364,36203-4943177-5,'i131821@nu.edu.pk');
insert into employee values(1822,'Dr.Zeeshan Fareed',25000,1821,'EMPLOYEE','D.G.KHAN',03417889364,36203-4943177-5,'i131822@nu.edu.pk');
insert into employee values(1823,'Dr.Irtiza Ali',10000,1823,'EMPLOYEE','SINDH-SANGHAR',03417889364,36203-4943177-5,'i131823@nu.edu.pk');
insert into employee values(1824,'Dr.Zain Ali Zubair',35000,1821,'EMPLOYEE','MULTAN',03417889364,36203-4943177-5,'i131824@nu.edu.pk');
insert into employee values(1825,'Dr.Hassan Latif',45000,1821,'EMPLOYEE','MULTAN',03417889364,36203-4943177-5,'i131825@nu.edu.pk');
insert into employee values(1826,'Dr.Irshad Babar',55000,1821,'EMPLOYEE','BAHAWAL-NAGAR',03417889364,36203-4943177-5,'i131826@nu.edu.pk');
insert into employee values(1827,'Dr.Muhmmad Yameen',500000,1821,'EMPLOYEE','D.G.KHAN',03417889364,36203-4943177-5,'i131827@nu.edu.pk');
insert into employee values(1828,'Dr.Muhmmad Idress',500000,1821,'EMPLOYEE','D.G.KHAN',03417889364,36203-4943177-5,'i131828@nu.edu.pk');
insert into employee values(1829,'Dr.Hussain Haider',500000,1821,'EMPLOYEE','D.G.KHAN',03417889364,36203-4943177-5,'i131829@nu.edu.pk');
insert into employee values(1820,'Dr.Azam Gill',500000,1821,'EMPLOYEE','MULTAN',03417889364,36203-4943177-5,'i131820@nu.edu.pk');
insert into employee values(1811,'Dr.Ahmad Ali',500000,1821,'INSTRUCTOR','ISLAMABAD',03417889364,36203-4943177-5,'i131811@nu.edu.pk');
insert into employee values(1810,'Dr.Ejaz Ahmad',500000,1821,'INSTRUCTOR','ISLAMABAD',03417889364,36203-4943177-5,'i131810@nu.edu.pk');
insert into employee values(1812,'Dr.Usama Bin Laden',500000,1821,'INSTRUCTOR','KHURASAN-AFGHANISTAN',03417889364,36203-4943177-5,'i131812@nu.edu.pk');
insert into employee values(1813,'Dr.Abdullah Azam',500000,1821,'INSTRUCTOR','PESHAWAR',03417889364,36203-4943177-5,'i131813@nu.edu.pk');

/*insertion in the department table*/
insert into department values(01,'CS','H-11, ISLAMABAD',1821,'01-jan-2001'); 
insert into department values(02,'EE','H-11, ISLAMABAD',1821,'01-jan-2001'); 

/*insertion in the course table*/
insert into course values('CS201','INTRODUCTION TO PROGRAMMING',01,3,'SUBJECT',NULL);
insert into course values('CS202','COMPUTER PROGRAMMIG',01,3,'SUBJECT','CS201');
insert into course values('CS203','OPERATING SYSTEM',01,3,'SUBJECT','CS202');
insert into course values('CS204','DTABASE SYSTEMS',01,3,'SUBJECT','CS203');
insert into course values('CS205','ASSEBMLY LANGUAGE',01,3,'SUBJECT','CS202');
insert into course values('CS206','OPERATING SYSTEM LAB',01,1,'LAB','CS203');
insert into course values('CS207','DTABASE SYSTEMS LAB',01,1,'LAB','CS203');
insert into course values('CS208','ASSEBMLY LANGUAGE LAB',01,1,'LAB','CS202');
insert into course values('EE201','COMPUTER PROGRAMMING 1',02,3,'SUBJECT','CS201');
insert into course values('EE202','AUTOCADE',02,3,'SUBJECT','CS201');
insert into course values('EE203','CIRCUIT ANALYSIS',02,3,'SUBJECT','CS201');
insert into course values('EE204','PHYSICS FOR ENGINEERS',02,3,'SUBJECT','CS201');
insert into course values('EE205','ELECTRIC CIRCUITS DESIGNS',02,3,'SUBJECT','CS201');
insert into course values('EE206','CIRCUIT ANALYSIS LAB',02,1,'LAB','EE201');
insert into course values('EE207','PHYSICS FOR ENGINEERS LAB',02,1,'LAB','EE201');
insert into course values('EE208','ELECTRIC CIRCUITS DESIGNS LAB',02,1,'LAB','EE201');

/*insertion in the semester table*/
INSERT INTO semester VALUES('S13','SPRING 2013','01-AUG-2013','01-JAN-2014',2500000,400000);
INSERT INTO semester VALUES('F14','FALL 2014','15-JAN-2014','15-JUL-2014',2500000,400000);
INSERT INTO semester VALUES('S15','SPRING 2015','01-AUG-2015','01-JAN-2016',2500000,400000);

/*insertion in the section table*/
INSERT INTO section VALUES('A','SECTION A',60); 
INSERT INTO section VALUES('B','SECTION B',60); 
INSERT INTO section VALUES('C','SECTION C',60); 
INSERT INTO section VALUES('D','SECTION D',60); 
INSERT INTO section VALUES('E','SECTION E',60); 

/*insertion in the student table*/
INSERT INTO student VALUES('i131821','MUHMAMMAD IBRAHIM','MUHMMAD YASEEN','D.G.KHAN',03417889364,'i13821@nu.edu.pk','36203-4943177-5');
INSERT INTO student VALUES('i131822','MUHAMMAD YAMEEN','MUHMMAD YASEEN','D.G.KHAN',03417889362,'i13822@nu.edu.pk','36203-4943177-0');
INSERT INTO student VALUES('i131823','MUHMMAD IDREES','MUHMMAD YASEEN','D.G.KHAN',03417889363,'i13823@nu.edu.pk','36203-4943177-1');
INSERT INTO student VALUES('i131824','ZAIN ALI ZUBAIR','ZUBAIR AHMAD','MULTAN',03417889361,'i13824@nu.edu.pk','36203-4943177-2');
INSERT INTO student VALUES('i131825','HASSAN LATIF','ABDUL-LATIF','MULTAN',03417889365,'i13825@nu.edu.pk','36203-4943177-3');
INSERT INTO student VALUES('i131826','IRSHAD BABAR','MUHAMMAD BABAR','BAHAWAL-NAGAR',03417889366,'i13826@nu.edu.pk','36203-4943177-4');
INSERT INTO student VALUES('i131827','AZAM GILL','MUHMMAD MUMTAZ','D.G.KHAN',03417889367,'i13827@nu.edu.pk','36203-4943177-9');
INSERT INTO student VALUES('i131828','IRTIZA ALI','MURTAZA ALI','SANGHAR',03417889368,'i13828@nu.edu.pk','36203-4943177-6');
INSERT INTO student VALUES('i131829','ZEESHAN FAREED','FAREED AHMAD','D.G.KHAN',03417889369,'i13829@nu.edu.pk','36203-4943177-7');
INSERT INTO student VALUES('i131820','HUNAIN BIN SAJID','MUHAMMAD MUMTAZ','D.G.KHAN',03417889360,'i13820@nu.edu.pk','36203-4943177-8');

/*insertion in the COURSE_OFFER table;*/
INSERT INTO course_offer VALUES('CS201','S13','A',1821,1823,'01-AUG-2013','NULL');
INSERT INTO course_offer VALUES('CS202','S13','A',1821,1825,'01-AUG-2013','NULL');
INSERT INTO course_offer VALUES('CS203','S13','A',1821,1822,'01-AUG-2013','NULL');
INSERT INTO course_offer VALUES('CS204','F14','B',1821,1821,'15-JAN-2014','NULL');
INSERT INTO course_offer VALUES('CS205','F14','B',1821,1829,'15-JAN-2014','NULL');

/*insertion in the STU_REG table;*/
INSERT INTO stu_reg VALUES('CS201','S13','A','i131821','A','01-AUG-2013');
INSERT INTO stu_reg VALUES('CS202','S13','A','i131821','F','01-AUG-2013');
INSERT INTO stu_reg VALUES('CS203','S13','A','i131821','NULL','01-AUG-2013');
INSERT INTO stu_reg VALUES('CS204','F14','B','i131822','D','01-AUG-2013');
INSERT INTO stu_reg VALUES('CS205','F14','B','i131822','F','01-AUG-2013');

/*insertion in the FEE_SUB table*/
INSERT INTO fee_sub VALUES('i131821','S13',85000,85000,85000,0);
INSERT INTO fee_sub VALUES('i131822','F14',85000,85000,85000,0);

/*insertion in the  ASS table*/
INSERT INTO assignment VALUES(1,'CS201','S13','A',10,2,'01-SEP-2013','05-SEP-2013','FORK');
INSERT INTO assignment VALUES(2,'CS201','S13','A',10,2,'06-SEP-2013','10-SEP-2013','THREADS');
INSERT INTO assignment VALUES(3,'CS201','S13','A',10,2,'11-SEP-2013','15-SEP-2013','DEADLOCKS');
INSERT INTO assignment VALUES(1,'CS204','F14','B',10,2,'01-FEB-2014','05-FEB-2014','MODELING');
INSERT INTO assignment VALUES(2,'CS204','F14','B',10,2,'06-FEB-2014','10-FEB-2014','DESIGNING');

/*insertion in the semester table*/
INSERT INTO c_project VALUES(1,10,5,'01-SEP-2013','05-SEP-2013','FORK','CS201','S13','A');
INSERT INTO c_project VALUES(1,10,5,'01-SEP-2013','05-SEP-2013','FORK','CS202','S13','A')
INSERT INTO c_project VALUES(1,10,5,'01-FEB-2014','05-FEB-2014','MODELING','CS204','F14','B');

/*insertion in the semester table*/
INSERT INTO exam VALUES(1,40,20,'01-SEP-2013','CS201','S13','A');
INSERT INTO exam VALUES(2,40,20,'06-SEP-2013','CS201','S13','A');
INSERT INTO exam VALUES(3,60,30,'11-SEP-2013','CS201','S13','A');
INSERT INTO exam VALUES(1,40,20,'01-FEB-2014','CS204','F14','B');
INSERT INTO exam VALUES(2,40,20,'06-FEB-2014','CS204','F14','B');

/*insertion in the semester table*/
insert into stu_ass values(1,'CS201','S13','A','i131821',10,2);
insert into stu_ass values(2,'CS201','S13','A','i131821',5,1);
insert into stu_ass values(3,'CS201','S13','A','i131821',10,2);
insert into stu_ass values(1,'CS204','F14','B','i131822',10,2);
insert into stu_ass values(2,'CS204','F14','B','i131822',10,2);

/*insertion in the semester table*/
INSERT INTO quiz VALUES(1,'CS201','S13','A',10,2,'01-SEP-2013');
INSERT INTO quiz VALUES(2,'CS201','S13','A',10,2,'06-SEP-2013');
INSERT INTO quiz VALUES(3,'CS201','S13','A',10,2,'11-SEP-2013');
INSERT INTO quiz VALUES(1,'CS204','F14','B',10,2,'01-FEB-2014');
INSERT INTO quiz VALUES(2,'CS204','F14','B',10,2,'06-FEB-2014');

INSERT INTO stu_quiz VALUES(1,'CS201','S13','A','i131821',6,1);
INSERT INTO stu_quiz VALUES(2,'CS201','S13','A','i131821',10,2);
INSERT INTO stu_quiz VALUES(3,'CS201','S13','A','i131821',9,1.9);
INSERT INTO stu_quiz VALUES(1,'CS204','F14','B','i131822',10,2);
INSERT INTO stu_quiz VALUES(2,'CS204','F14','B','i131822',5,1);

INSERT INTO stu_exam VALUES('i131821',1,'CS201','S13','A',40,20);
INSERT INTO stu_exam VALUES('i131821',2,'CS201','S13','A',20,10);
INSERT INTO stu_exam VALUES('i131821',3,'CS201','S13','A',30,15);
INSERT INTO stu_exam VALUES('i131821',1,'CS204','F14','B',40,20);
INSERT INTO stu_exam VALUES('i131821',2,'CS204','F14','B',40,20);

INSERT INTO stu_proj VALUES('i131821',1,'CS201','S13','A',10,10);
INSERT INTO stu_proj VALUES('i131821',1,'CS202','S13','A',10,9);
INSERT INTO stu_proj VALUES('i131822',1,'CS204','F14','B',10,10);

INSERT INTO stu_attendance VALUES('CS201','S13','A','i131821',45,3,95);
INSERT INTO stu_attendance VALUES('CS202','S13','A','i131821',44,4,93);
INSERT INTO stu_attendance VALUES('CS204','F14','B','i131822',40,8,80);

INSERT INTO stu_users VALUES('i131821','tiger');
INSERT INTO stu_users VALUES('i131822','tiger');
INSERT INTO stu_users VALUES('i131823','tiger');
INSERT INTO stu_users VALUES('i131824','tiger');

INSERT INTO emp_users VALUES('1821','tiger');
INSERT INTO emp_users VALUES('1824','tiger');
INSERT INTO emp_users VALUES('1823','tiger');
INSERT INTO emp_users VALUES('1829','tiger');
INSERT INTO emp_users VALUES('1810','tiger');
INSERT INTO emp_users VALUES('1812','tiger');
