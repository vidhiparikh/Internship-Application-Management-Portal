-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2018 at 05:47 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `internado`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
`application_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  `internship_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `approval_status` varchar(255) NOT NULL,
  `apply_date` date NOT NULL,
  `approve_date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `deleted`, `internship_id`, `student_id`, `approval_status`, `apply_date`, `approve_date`) VALUES
(1, 0, 1, 1, 'approved', '2018-09-08', '2018-10-01'),
(2, 0, 1, 2, 'approved', '2018-09-12', '2018-09-19'),
(6, 0, 1, 3, 'approved', '2018-09-25', '2018-10-05'),
(7, 0, 2, 3, 'approved', '2018-10-01', '2018-10-05'),
(8, 0, 1, 7, 'approved', '2018-10-04', '2018-10-05'),
(9, 0, 1, 7, 'approved', '2018-10-12', '2018-10-05'),
(10, 0, 1, 7, 'approved', '2018-10-17', '2018-10-05'),
(11, 0, 2, 7, 'approved', '2018-10-23', '2018-10-05'),
(12, 0, 4, 7, 'approved', '2018-10-03', '2018-10-05'),
(13, 0, 5, 7, 'approved', '2018-10-03', '2018-10-05'),
(14, 0, 9, 7, 'approved', '2018-10-03', '2018-10-05'),
(15, 0, 4, 7, 'approved', '2018-10-03', '2018-10-05'),
(16, 0, 4, 4, 'approved', '2018-10-05', '2018-10-05'),
(17, 0, 8, 7, '', '2018-10-05', '0000-00-00'),
(18, 0, 4, 4, '', '2018-10-08', '0000-00-00'),
(19, 0, 5, 4, '', '2018-10-08', '0000-00-00'),
(20, 0, 8, 11, '', '2018-10-09', '0000-00-00'),
(21, 0, 12, 11, 'approved', '2018-10-09', '2018-10-09'),
(22, 0, 11, 12, 'approved', '2018-10-09', '2018-10-09'),
(23, 0, 11, 11, 'approved', '2018-10-09', '2018-10-09'),
(24, 0, 13, 13, 'approved', '2018-10-09', '2018-10-09'),
(25, 0, 7, 6, 'approved', '2018-12-14', '2018-12-14'),
(26, 0, 1, 15, '', '2018-12-14', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
`company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `user_id`, `company_name`) VALUES
(1, 6, 'JP Morgan Chase');

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE IF NOT EXISTS `coordinator` (
`coordinator_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`coordinator_id`, `user_id`, `firstname`, `lastname`) VALUES
(1, 1, 'Sandeep', 'Parmar');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `student_id` varchar(255) NOT NULL,
  `fid` varchar(255) NOT NULL,
  `internship_id` varchar(255) NOT NULL,
  `p1` varchar(255) NOT NULL,
  `p2` varchar(255) NOT NULL,
  `p3` varchar(255) NOT NULL,
  `p4` varchar(255) NOT NULL,
  `p5` varchar(255) NOT NULL,
  `satisfied` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `future` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE IF NOT EXISTS `guardian` (
`id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `proctor_id` int(11) NOT NULL,
  `hod_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`id`, `sid`, `parent_id`, `proctor_id`, `hod_id`) VALUES
(1, 1, 1, 2, 1),
(2, 2, 2, 2, 1),
(3, 3, 3, 1, 1),
(4, 4, 4, 2, 1),
(5, 5, 5, 1, 2),
(6, 6, 6, 1, 0),
(7, 7, 7, 2, 2),
(8, 8, 8, 1, 1),
(9, 8, 9, 1, 1),
(10, 8, 10, 1, 1),
(11, 8, 11, 1, 1),
(12, 8, 12, 1, 1),
(13, 8, 13, 1, 1),
(14, 8, 14, 1, 1),
(15, 8, 15, 1, 1),
(16, 8, 16, 1, 1),
(17, 8, 17, 2, 1),
(18, 8, 32, 1, 1),
(19, 8, 33, 1, 1),
(20, 8, 34, 1, 1),
(21, 8, 35, 1, 1),
(22, 8, 36, 1, 1),
(23, 8, 37, 1, 1),
(24, 8, 38, 1, 1),
(25, 9, 39, 1, 1),
(26, 9, 40, 1, 1),
(27, 10, 41, 1, 0),
(28, 11, 42, 1, 1),
(29, 12, 43, 1, 1),
(30, 13, 44, 1, 1),
(31, 14, 45, 1, 0),
(32, 15, 46, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE IF NOT EXISTS `hod` (
`hod_id` int(11) NOT NULL,
  `hod_email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`hod_id`, `hod_email`) VALUES
(1, 'vidhiparikh28@gmail.com'),
(2, 'vidhiparikh28@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `internship`
--

CREATE TABLE IF NOT EXISTS `internship` (
`internship_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `stipend` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `no_ofstudents` int(11) NOT NULL,
  `floated_on` date NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mail_status` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `internship`
--

INSERT INTO `internship` (`internship_id`, `user_id`, `name`, `duration`, `stipend`, `type`, `skills`, `no_ofstudents`, `floated_on`, `mobile`, `email`, `mail_status`, `status`) VALUES
(1, 6, 'jpmc', '4', '40000', 'company', 'java', 5, '0000-00-00', 0, '', '', ''),
(2, 6, 'accenture', '3', '5000', 'company', 'php', 3, '0000-00-00', 0, '', '', ''),
(3, 6, 'jpmc', '1', '1000', 'company', 'ml', 2, '0000-00-00', 0, '', '', ''),
(4, 6, 'morgan', '3', '5000', 'company', 'java', 3, '0000-00-00', 0, '', '', ''),
(5, 6, 'gh', '3', '5678', 'company', 'c', 3, '0000-00-00', 0, '', '', ''),
(6, 6, 'gh', '3', '5678', 'company', 'c', 3, '0000-00-00', 0, '', '', ''),
(7, 6, 'Accenture', '5', '700', 'company', 'Artificial Intelligence', 4, '0000-00-00', 0, '', '', ''),
(8, 6, 'IVP', '7', '70000', 'company', 'Machine Learning', 4, '0000-00-00', 0, '', '', ''),
(9, 6, 'Codenation', '2', '175000', 'company', 'ML', 5, '0000-00-00', 0, '', '', ''),
(10, 11, 'CodeNation', '7', '175000', 'company', 'ml', 2, '0000-00-00', 0, '', '', ''),
(11, 11, 'CodeNation', '6', '50000', 'company', 'Artificial Intelligence', 3, '0000-00-00', 0, '', '', ''),
(12, 6, 'kjsce', '1', '100', 'company', 'php', 2, '0000-00-00', 0, '', '', ''),
(13, 6, 'kjsce', '3', '5000', 'company', 'ml', 3, '0000-00-00', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE IF NOT EXISTS `parents` (
`pid` int(11) NOT NULL,
  `parent_first_name` varchar(255) NOT NULL,
  `parent_email` varchar(255) NOT NULL,
  `parent_gender` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`pid`, `parent_first_name`, `parent_email`, `parent_gender`) VALUES
(1, 'abc', 'vidhi.parikh@somaiya.edu', 'F'),
(2, 'def', 'vidhi.parikh@somaiya.edu', 'F'),
(3, 'vidhi.parikh@somaiya.edu', 'M', '2'),
(4, 'F', 'M', '1'),
(5, 'mno', 'vidhi.parikh@somaiya.edu', 'F'),
(6, 'M', 'M', '2'),
(7, 'Champa', 'champa@gmail.com', 'F'),
(8, 'Durlabh', 'durlabh@gmail.com', 'M'),
(9, 'Durlabh', 'durlabh@gmail.com', 'M'),
(10, 'Durlabh', 'durlabh@gmail.com', 'M'),
(11, 'Durlabh', 'durlabh@gmail.com', 'M'),
(12, 'Durlabh', 'durlabh@gmail.com', 'M'),
(13, 'Durlabh', 'durlabh@gmail.com', 'M'),
(14, 'Durlabh', 'durlabh@gmail.com', 'M'),
(15, 'cx', 'xc@xma.com', 'M'),
(16, 'sddc', 'cd@ma.co', 'M'),
(17, 'kfj', 'kf@mai.com', 'M'),
(18, 'kfj', 'kf@mai.com', 'M'),
(19, 'kfj', 'kf@mai.com', 'M'),
(20, 'kfj', 'kf@mai.com', 'M'),
(21, 'kfj', 'kf@mai.com', 'M'),
(22, 'kfj', 'kf@mai.com', 'M'),
(23, 'kfj', 'kf@mai.com', 'M'),
(24, 'kfj', 'kf@mai.com', 'M'),
(25, 'kfj', 'kf@mai.com', 'M'),
(26, 'kfj', 'kf@mai.com', 'M'),
(27, 'kfj', 'kf@mai.com', 'M'),
(28, 'kfj', 'kf@mai.com', 'M'),
(29, 'kfj', 'kf@mai.com', 'M'),
(30, 'kfj', 'kf@mai.com', 'M'),
(31, 'kfj', 'kf@mai.com', 'M'),
(32, 'Durlabh', 'durlabh@gmail.com', 'M'),
(33, 'Durlabh', 'durlabh@gmail.com', 'M'),
(34, 'Durlabh', 'durlabh@gmail.com', 'M'),
(35, 'Durlabh', 'durlabh@gmail.com', 'M'),
(36, 'Durlabh', 'durlabh@gmail.com', 'M'),
(37, 'latest_my_paremt', 'lets@mail.com', 'M'),
(38, 'Durlabh', 'durlabh@gmail.com', 'M'),
(39, 'Durlabhi', 'durlabhi@gmail.com', 'F'),
(40, 'Durlabh', 'durlabh@gmail.com', 'M'),
(41, 'tulika@gmail.com', 'F', '2'),
(42, 'bhavini', 'kavita1@gmail.com', 'F'),
(43, 'Shilpa', 'shilpa@gmail.com', 'F'),
(44, 'Durlabh', 'durlabh@gmail.com', 'M'),
(45, 'ajay_rathod@gmail.com', 'M', '1'),
(46, 'jrs', 'jrs@gmail.com', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `internship_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `proctor`
--

CREATE TABLE IF NOT EXISTS `proctor` (
`proctor_id` int(11) NOT NULL,
  `proctor_email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proctor`
--

INSERT INTO `proctor` (`proctor_id`, `proctor_email`) VALUES
(1, 'ganividhihani@rediffmail.com'),
(2, 'ganividhihani@rediffmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_first_name` varchar(255) NOT NULL,
  `student_last_name` varchar(255) NOT NULL,
  `student_contactno` text NOT NULL,
  `student_rollno` int(11) NOT NULL,
  `year_of_study` varchar(1) NOT NULL,
  `semester` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `branch` int(11) NOT NULL,
  `division` varchar(1) NOT NULL,
  `student_skills` varchar(255) NOT NULL,
  `student_cv` longtext NOT NULL,
  `first_login` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `user_id`, `student_first_name`, `student_last_name`, `student_contactno`, `student_rollno`, `year_of_study`, `semester`, `course`, `branch`, `division`, `student_skills`, `student_cv`, `first_login`) VALUES
(1, 3, 'Chitra', 'Agnihotri', '9619644878', 0, '2', 5, 'B Tech', 1, 'A', '', '', 1),
(2, 5, 'Dhruti', 'Patel', '9702884664', 0, '2', 5, 'B Tech', 1, 'A', '', '', 0),
(3, 7, 'V', 'P', '9920799310', 0, '1', 1, 'B Tech', 1, 'A', '', '', 1),
(4, 8, 'Swati', 'Parikh', '9920799310', 0, '1', 1, 'B Tech', 1, 'A', '', '', 1),
(5, 9, 'Agnes', 'Tiwade', '9898989898', 0, '1', 1, 'B Tech', 1, 'A', '', '', 0),
(6, 10, 'Aarvi', 'Parikh', '9702884664', 1721005, '3', 5, 'B Tech', 1, 'A', '', '', 1),
(7, 13, 'Jyotki', 'Mehta', '9769512575', 1721007, '3', 5, 'B Tech', 1, 'A', '', '', 1),
(8, 14, 'Manju', 'Mehta', '9702884664', 17212121, '1', 1, 'B Tech', 1, 'A', '', '', 1),
(9, 15, 'Vandana', 'Mehta', '9769512975', 1721092, '1', 1, 'B Tech', 1, 'A', '', '2018-07-26-17-25-36-255_1532606136255_XXXPP0107X_Acknowledgement.pdf', 1),
(10, 16, 'Animesh', 'Ghosh', '9876543210', 17210024, '4', 6, 'M Tech', 1, 'A', '', '2018-07-26-17-25-36-255_1532606136255_XXXPP0107X_Acknowledgement.pdf', 1),
(11, 17, 'kavita', 'agnihotri', '1452369874', 12, '1', 1, 'B Tech', 1, 'A', '', 'Radio.png', 1),
(12, 18, 'chiku', 'patel', '9552239993', 1721111, '1', 1, 'B Tech', 1, 'A', '', 'priority.png', 1),
(13, 19, 'Sarju', 'Parikh', '9922778891', 1721005, '1', 1, 'B Tech', 1, 'A', '', 'do_good.png', 1),
(14, 20, 'Yogita', 'Rathod', '9326624253', 1721012, '3', 5, 'B Tech', 1, 'A', '', 'functionality.docx', 1),
(15, 21, 'Jyoti', 'T', '9326624253', 1721001, '1', 1, 'B Tech', 1, 'A', '', '2018-07-26-17-25-36-255_1532606136255_XXXPP0107X_Acknowledgement.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_role`) VALUES
(1, 'tpo.comps@somaiya.edu', '$2y$04$TFK2P2HEGHJAb8KHOkih9uDPlKpvKzAh7biQOwkDnFwBo7Oni5Xhe', '1'),
(2, 'vidhi.parikh@somaiya.edu', 'abc123', '3'),
(3, 'chitra.a@somaiya.edu', '$2y$10$N8eUOBljKOkbWzxxPS6jI.4IyLNHVgbwjfXAKQerBgbdp.w3D8AoO', '3'),
(5, 'dhruti@gmail.com', '$2y$10$pr5SEc6/Z.cW.5JNrJCjzO27u7wNC6dqCux0F5wtzYGkue1Ij/SyW', '3'),
(6, 'intern@jpmc.com', 'abc123', '2'),
(7, 'vidhi@gmail.com', 'abc123', '3'),
(8, 'swati@gmail.com', 'abc123', '3'),
(9, 'agnes@gmail.com', 'abc123', '3'),
(10, 'aarvi@gmail.com', 'abc123', '3'),
(11, 'intern@cn.com', 'abc123', '2'),
(12, 'faculty@kjsce.in', 'abc123', '4'),
(13, 'jyoti@gmail.com', 'abc12345', '3'),
(14, 'manju@gmail.com', 'abc12345', '3'),
(15, 'vandu@gmail.com', 'abc12345', '3'),
(16, 'animesh@gmail.com', 'abc12345', '3'),
(17, 'kavita@gmail.com', 'abc12345', '3'),
(18, 'chiku123@gmail.com', 'chiku@123', '3'),
(19, 'sarju@gmail.com', 'abcd1234', '3'),
(20, 'yogita@gmail.com', 'abc12345', '3'),
(21, 'jyotit@gmail.com', 'abc12345', '3');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
`user_role_id` int(11) NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `user_role`) VALUES
(1, 'co-ordinator'),
(2, 'company'),
(3, 'student'),
(4, 'faculty\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
 ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
 ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `coordinator`
--
ALTER TABLE `coordinator`
 ADD PRIMARY KEY (`coordinator_id`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
 ADD PRIMARY KEY (`hod_id`);

--
-- Indexes for table `internship`
--
ALTER TABLE `internship`
 ADD PRIMARY KEY (`internship_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
 ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `proctor`
--
ALTER TABLE `proctor`
 ADD PRIMARY KEY (`proctor_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
 ADD PRIMARY KEY (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `coordinator`
--
ALTER TABLE `coordinator`
MODIFY `coordinator_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `guardian`
--
ALTER TABLE `guardian`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `hod`
--
ALTER TABLE `hod`
MODIFY `hod_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `internship`
--
ALTER TABLE `internship`
MODIFY `internship_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `proctor`
--
ALTER TABLE `proctor`
MODIFY `proctor_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
