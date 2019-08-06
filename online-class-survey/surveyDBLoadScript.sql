 -- ITEC325
 -- Team persistance project
 -- Radford University
 -- Spring 2017
 -- SQL load table script for database component 
 -- of "Brenneman 120 Survey" project 
 
INSERT INTO categories (category_name) VALUES ('Study');
INSERT INTO categories (category_name) VALUES ('Motivation');
INSERT INTO categories (category_name) VALUES ('Lecture');
INSERT INTO categories (category_name) VALUES ('Lab');
INSERT INTO categories (category_name) VALUES ('Coding');
INSERT INTO categories (category_name) VALUES ('TestPrep');
INSERT INTO categories (category_name) VALUES ('TimeMgmt');

 
INSERT INTO questions (question, category) VALUES ('I read the textbook.  (Choose N/A if you don''t have a textbook.)','Study');
INSERT INTO questions (question, category) VALUES ('I re-read passages in the textbook.','Study');
INSERT INTO questions (question, category) VALUES ('I refer to the textbook when I code.','Study');
INSERT INTO questions (question, category) VALUES ('I watch the videos posted on the reading assignments.','Study');
INSERT INTO questions (question, category) VALUES ('I am aware of the week''s learning objective (posted on D2L).','Study');
INSERT INTO questions (question, category) VALUES ('I have quiet location where I typically study.','Study');
INSERT INTO questions (question, category) VALUES ('I put away my phone when I study.','Study');
INSERT INTO questions (question, category) VALUES ('I turn off any video when I study.','Study');
INSERT INTO questions (question, category) VALUES ('I have regular times when I study.','Study');
INSERT INTO questions (question, category) VALUES ('I am able to self assess – know when I''ve learned a concept.','Study');
INSERT INTO questions (question, category) VALUES ('I am able to focus for a period of time.','Study');
INSERT INTO questions (question, category) VALUES ('I find it easy to get started on a programming project.','Motivation');
INSERT INTO questions (question, category) VALUES ('If I don''t feel like programming, I find if I just get started, I get involved and interested in the problem."','Motivation');
INSERT INTO questions (question, category) VALUES ('I am more concerned with understanding the concepts than turning in code for a grade.','Motivation');
INSERT INTO questions (question, category) VALUES ('I like the challenge of a good problem.','Motivation');
INSERT INTO questions (question, category) VALUES ('I enjoy the process of coding.','Motivation');
INSERT INTO questions (question, category) VALUES ('When I am really involved in working on a hard problem, I lose track of time."','Motivation');
INSERT INTO questions (question, category) VALUES ('I have a feeling of accomplishment when I get a program or method to work.','Motivation');
INSERT INTO questions (question, category) VALUES ('Once I get involved in a problem, I don''t like to be interupted."','Motivation');
INSERT INTO questions (question, category) VALUES ('I love getting a program to work well.','Motivation');
INSERT INTO questions (question, category) VALUES ('I have a feeling of satisfation at a job well done.','Motivation');
INSERT INTO questions (question, category) VALUES ('I attend lecture.','Lecture');
INSERT INTO questions (question, category) VALUES ('I arrive to lecture on time.','Lecture');
INSERT INTO questions (question, category) VALUES ('I find it easy to pay attention during lecture.','Lecture');
INSERT INTO questions (question, category) VALUES ('I take good notes during lecture.','Lecture');
INSERT INTO questions (question, category) VALUES ('I re-read my notes after lecture.','Lecture');
INSERT INTO questions (question, category) VALUES ('I do the reading assignment before lecture.','Lecture');
INSERT INTO questions (question, category) VALUES ('I do the reading quiz assigned before each lecture.','Lecture');
INSERT INTO questions (question, category) VALUES ('I follow up on things I did not understand in lecture.','Lecture');
INSERT INTO questions (question, category) VALUES ('I attend lab.','Lab');
INSERT INTO questions (question, category) VALUES ('I read the lab assignment before coming to lab.','Lab');
INSERT INTO questions (question, category) VALUES ('I start the lab assignement before coming to lab.','Lab');
INSERT INTO questions (question, category) VALUES ('I finish the lab assignment before lab.','Lab');
INSERT INTO questions (question, category) VALUES ('I have a question for the instructor or peer instructor during lab.','Lab');
INSERT INTO questions (question, category) VALUES ('I read the feedback given to me on submitted labs.','Lab');
INSERT INTO questions (question, category) VALUES ('If I didn''t understand something in a lab assignment, I follow up and find out what was wrong."','Lab');
INSERT INTO questions (question, category) VALUES ('I seek help from a peer instructor outside of my scheduled lab time.','Lab');
INSERT INTO questions (question, category) VALUES ('After I complete a lab, I re-read the lab assignment and make sure I understand the point of the lab."','Lab');
INSERT INTO questions (question, category) VALUES ('I complete homework assignements on time.','Coding');
INSERT INTO questions (question, category) VALUES ('I complete lab assignements on time.','Coding');
INSERT INTO questions (question, category) VALUES ('I test my code thoroughly.','Coding');
INSERT INTO questions (question, category) VALUES ('I code ''extra credit'' and ''optional'' problems presented on various assignments.','Coding');
INSERT INTO questions (question, category) VALUES ('I code problems presented in lecture.','Coding');
INSERT INTO questions (question, category) VALUES ('I code problems just to ''see what happens'' when I''m curious about how something works."','Coding');
INSERT INTO questions (question, category) VALUES ('I work on coding my own projects outside of class.','Coding');
INSERT INTO questions (question, category) VALUES ('I solve problems on Coding Bat or a similar coding practice tool.','Coding');
INSERT INTO questions (question, category) VALUES ('I can understand the compiler erorr messages.','Coding');
INSERT INTO questions (question, category) VALUES ('I''m becoming a faster typer.','Coding');
INSERT INTO questions (question, category) VALUES ('I''ve customized my coding environment.','Coding');
INSERT INTO questions (question, category) VALUES ('I go back and rewrite bits of code when I think of a better way to do it.','Coding');
INSERT INTO questions (question, category) VALUES ('I take the SuperQuizzes.','TestPrep');
INSERT INTO questions (question, category) VALUES ('I re-take the SuperQuizzes.','TestPrep');
INSERT INTO questions (question, category) VALUES ('When I take the SuperQuiz, I''m trying to understand the concept instead of just getting it right."','TestPrep');
INSERT INTO questions (question, category) VALUES ('If I miss a problem on the SuperQuiz, I follow up and find out why I missed it."','TestPrep');
INSERT INTO questions (question, category) VALUES ('I re-read my lecture notes.','TestPrep');
INSERT INTO questions (question, category) VALUES ('I answer my own questions by coding them.','TestPrep');
INSERT INTO questions (question, category) VALUES ('I seek help from my instructors or peer instructors when I have a question.','TestPrep');
INSERT INTO questions (question, category) VALUES ('I keep track of my unanswered questions so I can follow up.','TestPrep');
INSERT INTO questions (question, category) VALUES ('I try to anticipate what will be on an exam.','TestPrep');
INSERT INTO questions (question, category) VALUES ('I re-read the labs when preparing for an exam.','TestPrep');
INSERT INTO questions (question, category) VALUES ('I re-read the reading assignements when preparing for an exam.','TestPrep');
INSERT INTO questions (question, category) VALUES ('I have a system to keep track of my due dates.','TimeMgmt');
INSERT INTO questions (question, category) VALUES ('I am able to balance the demands of all my classes.','TimeMgmt');
INSERT INTO questions (question, category) VALUES ('I work ahead in some classes when I have projects due or exams in other classes.','TimeMgmt');
INSERT INTO questions (question, category) VALUES ('I have set times when I study.','TimeMgmt');
INSERT INTO questions (question, category) VALUES ('I am able to start programming projects early.','TimeMgmt');
INSERT INTO questions (question, category) VALUES ('I get a good night''s sleep.','TimeMgmt');
INSERT INTO questions (question, category) VALUES ('I go to sleep and get up around the same time each day.','TimeMgmt');


INSERT INTO scores (answer_int,	pts) VALUES (1, 1);
INSERT INTO scores (answer_int,	pts) VALUES (2, 2);
INSERT INTO scores (answer_int,	pts) VALUES (3, 3);
INSERT INTO scores (answer_int,	pts) VALUES (4, 4);
INSERT INTO scores (answer_int,	pts) VALUES (5, 5);
INSERT INTO scores (answer_int,	pts) VALUES (6, 6);
INSERT INTO scores (answer_int,	pts) VALUES (7, 7);
INSERT INTO scores (answer_int,	pts) VALUES (8, 8);

