create table employee(
emp_id int,
emp_name varchar(20),
Sal number,
MGRID int,
emp_type varchar(20),
address varchar(30),
PHno int,
emp_CNICno varchar2(15),
emp_email varchar2(20),

constraint emp_pk PRIMARY KEY(emp_id),
constraint emp_mgr_fk FOREIGN KEY(MGRID) references employee(emp_id)
);

create table department(
dept_id int,
dept_name varchar(20),
dept_location varchar(20),
dept_HOD int,
Hodstartdate date,
constraint dept_pk PRIMARY KEY(dept_id),
constraint HOD_fk foreign key (dept_HOD) references employee(emp_id)
);



create table course(
course_id varchar(5),
course_name varchar(40),
course_dept number,
course_crdhrs number,
course_type varchar2(10),
course_prereq varchar2(5),
constraint course_pk PRIMARY KEY(course_id),
constraint course_dept_fk FOREIGN KEY(course_dept) references department(dept_id)
);


create table semester(
sem_id varchar2(6),
sem_name varchar2(15),
sem_st_date date,
sem_end_date date,
stu_fun_fee number,
stu_sport_fee number, 
constraint sem_pk primary key (sem_id)
) ;

create table section(
sec_name varchar2(10),
sec_desc varchar2(20),
max_stu number,
constraint sec_pk primary key (sec_name)
);

create table student(
stu_id varchar2(10),
stu_name varchar2(20),
stu_Father_name varchar2(20),
stu_address varchar2(20),
stu_phone_no number,
stu_mail varchar2(20),
stu_cnic varchar2(15),

constraint stu_pk primary key (stu_id) 
); 


create table course_offer(
course_id varchar2(5),
sem_id varchar2(6), 
sec_name varchar(10),
instructor_id int,
emp_id int,
offer_date date, 
approval varchar(10), 


constraint course_id_fk foreign key (course_id) references course(course_id),
constraint sem_id_fk foreign key (sem_id) references semester(sem_id),
constraint sec_name_fk foreign key (sec_name) references section(sec_name),
constraint instructor_id_fk foreign key (instructor_id) references employee(emp_id),
constraint emp_id_fk foreign key (emp_id) references employee(emp_id),
constraint course_offer_pk primary key (course_id, sem_id, sec_name)
);



create table stu_reg(
course_id varchar2(5),
sem_id varchar2(6),
sec_name varchar2(10),
stu_id varchar2(10),
grade varchar2(10),
reg_date date,

constraint stdreg_id_fk foreign key (course_id,sem_id,sec_name) references course_offer(course_id,sem_id,sec_name),
constraint stdreg_stu_fk foreign key (stu_id) references student(stu_id),
constraint stu_reg_pk primary key (course_id, sem_id, sec_name,stu_id)
);


create table fee_sub(
stu_id varchar(10),
sem_id varchar(10), 
tution_fee number,
total_fee number,
submitted_amount number,
remaining_amount number,
constraints stu_sem_fee_pk  primary key (stu_id,sem_id),
constraints stu_fee_fk foreign key(stu_id) references student(stu_id),
constraints sem_fee_fk foreign key(sem_id) references semester(sem_id)
);

create table assignment(
ass_id number,
course_id varchar2(20),
sem_id varchar2(10), 
sec_name varchar(10),
ass_marks number,
ass_wtg number,
ass_open_date date,
ass_due_date date,
ass_desc varchar2(10),

constraint ass_fk foreign key (course_id,sem_id,sec_name) references course_offer(course_id,sem_id,sec_name),
constraint ass_pk primary key (ass_id,course_id,sec_name,sem_id)
);



create table quiz(
quiz_id number,

course_id varchar2(20),
sem_id varchar2(10), 
sec_name varchar(10),
quiz_marks number,
quiz_wtg number,
quiz_date date,
constraint quiz_fk foreign key (course_id,sem_id,sec_name) references course_offer(course_id,sem_id,sec_name),
constraint quiz_pk primary key (quiz_id,course_id,sem_id,sec_name)
);


create table c_project(
proj_id number,
proj_marks number,
proj_wtg number,
proj_open_date date,
proj_due_date date,
proj_desc varchar2(10),
course_id varchar2(20),
sem_id varchar2(10), 
sec_name varchar(10),
constraint proj_fk foreign key (course_id,sem_id,sec_name) references course_offer(course_id,sem_id,sec_name),
constraint proj_pk primary key (proj_id,course_id,sec_name,sem_id)
);

create table exam(
exam_id number,
exam_marks number,
exam_wtg number,
exam_date date,
course_id varchar2(20),
sem_id varchar2(10), 
sec_name varchar(10),
constraint exam_fk foreign key (course_id,sem_id,sec_name) references course_offer(course_id,sem_id,sec_name),
constraint exam_pk primary key (exam_id,course_id,sec_name,sem_id)
);


  
create table stu_ass(

ass_id number,
course_id varchar2(20),
sem_id varchar2(10), 
sec_name varchar2(10),
stu_id  varchar2(10),
obtained_marks number,
obtained_weightage number,
constraint stu_ass_fk foreign key (ass_id,course_id,sem_id,sec_name) references assignment(ass_id,course_id,sem_id,sec_name),
constraint stu_ass_pk primary key (ass_id,course_id,sec_name,sem_id,stu_id)
);


create table stu_quiz(
quiz_id number,
course_id varchar2(20),
sem_id varchar2(10), 
sec_name varchar2(10),
stu_id VARCHAR2(10),
obtained_marks number,
obtained_weightage number,
constraint stu_quiz_fk foreign key (quiz_id,course_id,sem_id,sec_name) references quiz (quiz_id,course_id,sem_id,sec_name),
constraint stu_quiz_pk primary key (stu_id,quiz_id,course_id,sem_id,sec_name)
);

create table stu_exam(
stu_id VARCHAR2(10),
exam_id number,
course_id varchar2(20),
sem_id varchar2(10), 
sec_name varchar2(10),
obtained_marks number,
obtained_weightage number,
constraint stu_exam_fk foreign key (exam_id,course_id,sem_id,sec_name) references exam (exam_id,course_id,sem_id,sec_name),
constraint stu_exam_pk primary key (stu_id,exam_id,course_id,sem_id,sec_name)
);

create table stu_proj(
stu_id VARCHAR2(10),
proj_id number,
course_id varchar2(20),
sem_id varchar2(10), 
sec_name varchar(10),
obtained_marks number,
obtained_weightage number,
constraint stu_proj_fk foreign key (proj_id,course_id,sem_id,sec_name) references c_project (proj_id,course_id,sem_id,sec_name),
constraint stu_proj_pk primary key (stu_id,proj_id,course_id,sem_id,sec_name)
);

create table stu_attendance(
course_id varchar2(10),
sem_id varchar2(10),
sec_name varchar2(10),
stu_id varchar2(10),
total_presents INT,
total_absents int,
total_percentage number(4,2),
constraint stu_attendance_fk foreign key(course_id,sem_id,sec_name,stu_id) references stu_reg(course_id,sem_id,sec_name,stu_id),
constraints stu_attendance_pk primary key (course_id,sem_id,sec_name,stu_id)
);

create table stu_users(
usr_id varchar2(10),
passwd varchar2(20),
constraint usr_id_fk foreign key (usr_id)  references student(stu_id),
constraints sid_pk primary key (usr_id)
);

create table emp_users(
usr_id int,
passwd varchar2(20),
constraint usr_eid_fk foreign key (usr_id)  references employee(emp_id),
constraints eid_pk primary key (usr_id)
);


