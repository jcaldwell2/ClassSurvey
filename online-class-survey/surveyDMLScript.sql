 -- ITEC325
 -- Team persistance project
 -- Radford University
 -- Spring 2017
 -- SQL table create script for database component 
 -- of "Brenneman 120 Survey" project 
 
DROP TABLE users;
DROP TABLE enrollments;
DROP TABLE questions;
DROP TABLE scores;
DROP TABLE userAnswers;
DROP TABLE userScores;
DROP TABLE categories;

CREATE TABLE users
( 
  user_id    INTEGER(9) PRIMARY KEY
, fname      VARCHAR(25)
, lname      VARCHAR(35)
, password   VARCHAR(16)
, role       VARCHAR(200)
);

CREATE TABLE enrollments
(
  user_id    INTEGER(9)
, crn        INTEGER(6)
, cyear      INTEGER(4)
, semester   VARCHAR(15)
, section    INTEGER(2)
, PRIMARY KEY (user_id , crn)
, CONSTRAINT fk_enrollments FOREIGN KEY (user_id)  REFERENCES users(user_id)
);

CREATE TABLE questions
(
   question_id INTEGER(4) AUTO_INCREMENT
,  question    VARCHAR(250)
,  category    VARCHAR(20)
,  PRIMARY KEY (question_id)
,  CONSTRAINT questions FOREIGN KEY (catagory)  REFERENCES categories(category_name)
);

CREATE TABLE scores
(
   answer_int INTEGER(1) PRIMARY KEY
,  valueStr   varchar(20)
,  points     INTEGER(1)
);

CREATE TABLE userAnswers
(
  user_id     INTEGER(9)
, crn         INTEGER(6)
, question_id INTEGER(4)
, answer_int  INTEGER(1)
, PRIMARY KEY (user_id , crn)
, CONSTRAINT fk_useranswers1 FOREIGN KEY (user_id)  REFERENCES enrollments(user_id)
, CONSTRAINT fk_useranswers2 FOREIGN KEY (crn)  REFERENCES enrollments(crn)
, CONSTRAINT fk_useranswers3 FOREIGN KEY (question_id)  REFERENCES questions(question_id)
, CONSTRAINT fk_useranswers4 FOREIGN KEY (answer_int)  REFERENCES scoress(answer_int)
);

CREATE TABLE userScores
(
  user_id            INTEGER(9)
, crn                INTEGER(6)
, catagory  		 VARCHAR(20)
, score				 INTEGER(3)
, PRIMARY KEY (user_id , crn)
, CONSTRAINT fk_useranswers1 FOREIGN KEY (user_id)  REFERENCES enrollments(user_id)
, CONSTRAINT fk_useranswers2 FOREIGN KEY (crn)  REFERENCES enrollments(crn)
, CONSTRAINT fk_useranswers3 FOREIGN KEY (catagory)  REFERENCES categories(category_name)
);

CREATE TABLE categories
(
  category_name
, PRIMARY KEY (catagory_name)
);

