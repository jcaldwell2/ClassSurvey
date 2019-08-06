-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2017 at 07:20 PM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `proj4`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_name` varchar(20) NOT NULL,
  PRIMARY KEY (`category_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_name`) VALUES
('Coding'),
('Lab'),
('Lecture'),
('Motivation'),
('Study'),
('TestPrep'),
('TimeMgmt');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `crn` int(6) NOT NULL DEFAULT '0',
  `cyear` int(4) NOT NULL,
  `semester` varchar(15) NOT NULL,
  `section` int(2) NOT NULL,
  PRIMARY KEY (`crn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`crn`, `cyear`, `semester`, `section`) VALUES
(1, 1984, 'Spring', 11);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(4) NOT NULL AUTO_INCREMENT,
  `active` varchar(5) NOT NULL DEFAULT 'TRUE',
  `question` varchar(250) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`question_id`),
  KEY `questions` (`category`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `active`, `question`, `category`) VALUES
(1, 'TRUE', 'I read the textbook.  (Choose N/A if you don''t have a textbook.)', 'Study'),
(2, 'TRUE', 'I re-read passages in the textbook.', 'Study'),
(3, 'TRUE', 'I refer to the textbook when I code.', 'Study'),
(4, 'TRUE', 'I watch the videos posted on the reading assignments.', 'Study'),
(5, 'TRUE', 'I am aware of the week''s learning objective (posted on D2L).', 'Study'),
(6, 'TRUE', 'I have quiet location where I typically study.', 'Study'),
(7, 'TRUE', 'I put away my phone when I study.', 'Study'),
(8, 'TRUE', 'I turn off any video when I study.', 'Study'),
(9, 'TRUE', 'I have regular times when I study.', 'Study'),
(10, 'TRUE', 'I am able to self assess and know when I''ve learned a concept.', 'Study'),
(11, 'TRUE', 'I am able to focus for a period of time.', 'Study'),
(12, 'TRUE', 'I find it easy to get started on a programming project.', 'Motivation'),
(13, 'TRUE', 'If I don''t feel like programming, I find if I just get started, I get involved and interested in the problem.', 'Motivation'),
(14, 'TRUE', 'I am more concerned with understanding the concepts than turning in code for a grade.', 'Motivation'),
(15, 'TRUE', 'I like the challenge of a good problem.', 'Motivation'),
(16, 'TRUE', 'I enjoy the process of coding.', 'Motivation'),
(17, 'TRUE', 'When I am really involved in working on a hard problem, I lose track of time.', 'Motivation'),
(18, 'TRUE', 'I have a feeling of accomplishment when I get a program or method to work.', 'Motivation'),
(19, 'TRUE', 'Once I get involved in a problem, I don''t like to be interupted.', 'Motivation'),
(20, 'TRUE', 'I love getting a program to work well.', 'Motivation'),
(21, 'TRUE', 'I have a feeling of satisfation at a job well done.', 'Motivation'),
(22, 'TRUE', 'I attend lecture.', 'Lecture'),
(23, 'TRUE', 'I arrive to lecture on time.', 'Lecture'),
(24, 'TRUE', 'I find it easy to pay attention during lecture.', 'Lecture'),
(25, 'TRUE', 'I take good notes during lecture.', 'Lecture'),
(26, 'TRUE', 'I re-read my notes after lecture.', 'Lecture'),
(27, 'TRUE', 'I do the reading assignment before lecture.', 'Lecture'),
(28, 'TRUE', 'I do the reading quiz assigned before each lecture.', 'Lecture'),
(29, 'TRUE', 'I follow up on things I did not understand in lecture.', 'Lecture'),
(30, 'TRUE', 'I attend lab.', 'Lab'),
(31, 'TRUE', 'I read the lab assignment before coming to lab.', 'Lab'),
(32, 'TRUE', 'I start the lab assignment before coming to lab.', 'Lab'),
(33, 'TRUE', 'I finish the lab assignment before lab.', 'Lab'),
(34, 'TRUE', 'I have a question for the instructor or peer instructor during lab.', 'Lab'),
(35, 'TRUE', 'I read the feedback given to me on submitted labs.', 'Lab'),
(36, 'TRUE', 'If I didn''t understand something in a lab assignment, I follow up and find out what was wrong.', 'Lab'),
(37, 'TRUE', 'I seek help from a peer instructor outside of my scheduled lab time.', 'Lab'),
(38, 'TRUE', 'After I complete a lab, I re-read the lab assignment and make sure I understand the point of the lab.', 'Lab'),
(39, 'TRUE', 'I complete homework assignments on time.', 'Coding'),
(40, 'TRUE', 'I complete lab assignments on time.', 'Coding'),
(41, 'TRUE', 'I test my code thoroughly.', 'Coding'),
(42, 'TRUE', 'I code ''extra credit'' and ''optional'' problems presented on various assignments.', 'Coding'),
(43, 'TRUE', 'I code problems presented in lecture.', 'Coding'),
(44, 'TRUE', 'I code problems just to ''see what happens'' when I''m curious about how something works.', 'Coding'),
(45, 'TRUE', 'I work on coding my own projects outside of class.', 'Coding'),
(46, 'TRUE', 'I solve problems on Coding Bat or a similar coding practice tool.', 'Coding'),
(47, 'TRUE', 'I can understand the compiler error messages.', 'Coding'),
(48, 'TRUE', 'I''m becoming a faster typer.', 'Coding'),
(49, 'TRUE', 'I''ve customized my coding environment.', 'Coding'),
(50, 'TRUE', 'I go back and rewrite bits of code when I think of a better way to do it.', 'Coding'),
(51, 'TRUE', 'I take the SuperQuizzes.', 'TestPrep'),
(52, 'TRUE', 'I re-take the SuperQuizzes.', 'TestPrep'),
(53, 'TRUE', 'When I take the SuperQuiz, I''m trying to understand the concept instead of just getting it right.', 'TestPrep'),
(54, 'TRUE', 'If I miss a problem on the SuperQuiz, I follow up and find out why I missed it.', 'TestPrep'),
(55, 'TRUE', 'I re-read my lecture notes.', 'TestPrep'),
(56, 'TRUE', 'I answer my own questions by coding them.', 'TestPrep'),
(57, 'TRUE', 'I seek help from my instructors or peer instructors when I have a question.', 'TestPrep'),
(58, 'TRUE', 'I keep track of my unanswered questions so I can follow up.', 'TestPrep'),
(59, 'TRUE', 'I try to anticipate what will be on an exam.', 'TestPrep'),
(60, 'TRUE', 'I re-read the labs when preparing for an exam.', 'TestPrep'),
(61, 'TRUE', 'I re-read the reading assignments when preparing for an exam.', 'TestPrep'),
(62, 'TRUE', 'I have a system to keep track of my due dates.', 'TimeMgmt'),
(63, 'TRUE', 'I am able to balance the demands of all my classes.', 'TimeMgmt'),
(64, 'TRUE', 'I work ahead in some classes when I have projects due or exams in other classes.', 'TimeMgmt'),
(65, 'TRUE', 'I have set times when I study.', 'TimeMgmt'),
(66, 'TRUE', 'I am able to start programming projects early.', 'TimeMgmt'),
(67, 'TRUE', 'I get a good night''s sleep.', 'TimeMgmt'),
(68, 'TRUE', 'I go to sleep and get up around the same time each day.', 'TimeMgmt'),
(72, 'TRUE', 'I love Java because it is easy-------syke', 'Coding'),
(71, 'TRUE', 'TEEEEEEEEEEEEEEEEEEEEEEEEEST', 'Study'),

-- --------------------------------------------------------

--
-- Table structure for table `userAnswers`
--

CREATE TABLE IF NOT EXISTS `userAnswers` (
  `user_id` varchar(30) NOT NULL DEFAULT '',
  `crn` int(6) NOT NULL DEFAULT '1',
  `question_id` int(4) NOT NULL DEFAULT '0',
  `answer_int` int(1) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`crn`,`question_id`),
  KEY `fk_useranswers2` (`crn`),
  KEY `fk_useranswers3` (`question_id`),
  KEY `fk_useranswers4` (`answer_int`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` varchar(30) NOT NULL,
  `fname` varchar(25) DEFAULT NULL,
  `lname` varchar(35) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--
--Password for god@god.com is 777777

INSERT INTO `users` (`user_id`, `fname`, `lname`, `password`, `role`) VALUES
('god@god.com', 'god', 'god', '8c1cdb9cb4dbac6dbb6ebd118ec8f9523d22e4e4cb8cc9df5f7e1e499bba3c10', 'Admin');;

-- --------------------------------------------------------

--
-- Table structure for table `userScores`
--

CREATE TABLE IF NOT EXISTS `userScores` (
  `user_id` int(9) NOT NULL DEFAULT '0',
  `crn` int(6) NOT NULL DEFAULT '0',
  `category` varchar(20) DEFAULT NULL,
  `score` int(3) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`crn`),
  KEY `fk_useranswers2` (`crn`),
  KEY `fk_useranswers3` (`category`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
