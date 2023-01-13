-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 11:43 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs_depart`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_point`
--

CREATE TABLE IF NOT EXISTS `a_point` (
`id` int(11) NOT NULL,
  `level` varchar(20) NOT NULL,
  `programme` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `day` varchar(15) NOT NULL,
  `hall` varchar(50) NOT NULL,
  `strtime` varchar(20) NOT NULL,
  `endtime` varchar(20) NOT NULL,
  `lecturer_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chatuser`
--

CREATE TABLE IF NOT EXISTS `chatuser` (
  `user_id` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `give_assign`
--

CREATE TABLE IF NOT EXISTS `give_assign` (
`id` int(11) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  `programme` varchar(15) NOT NULL,
  `assign_name` varchar(20) NOT NULL,
  `deadline` varchar(30) NOT NULL,
  `upload` varchar(200) NOT NULL,
  `date_given` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
`id` int(11) NOT NULL,
  `level` varchar(10) NOT NULL,
  `programme` varchar(20) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `inf` text NOT NULL,
  `datemm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lecturer_name` text NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `level`, `programme`, `semester`, `inf`, `datemm`, `lecturer_name`, `pic`) VALUES
(18, 'HND2', 'MORNING', 'Second Semester', 'am here', '2021-04-15 14:48:20', 'Dr Oladimeji', 'pdf/chickens-Copy.jpg'),
(30, 'HND2', 'MORNING', 'Second Semester', '&lt;p&gt;&lt;b&gt;&lt;u&gt;General meeting&lt;/u&gt;&lt;/b&gt;&lt;/p&gt;&lt;p&gt;There will be a general meeting today&lt;/p&gt;', '2021-04-16 10:41:36', 'Dr Oladimeji', 'pdf/');

-- --------------------------------------------------------

--
-- Table structure for table `lect_rer`
--

CREATE TABLE IF NOT EXISTS `lect_rer` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `course_code` varchar(15) NOT NULL,
  `course_tit` text NOT NULL,
  `semester` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lect_rer`
--

INSERT INTO `lect_rer` (`id`, `name`, `course_code`, `course_tit`, `semester`, `username`, `password`) VALUES
(5, 'Dr Oladimeji', 'HND2', 'MORNING', 'Second Semester', 'ola', 'ola55');

-- --------------------------------------------------------

--
-- Table structure for table `livechat`
--

CREATE TABLE IF NOT EXISTS `livechat` (
`id` int(100) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `reciever` varchar(100) NOT NULL DEFAULT 'admin',
  `message` varchar(1000) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'unread',
  `reply` varchar(50) NOT NULL DEFAULT 'not replied'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `st`
--

CREATE TABLE IF NOT EXISTS `st` (
`id` int(11) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `reg_num` varchar(20) NOT NULL,
  `Name` text NOT NULL,
  `level` text NOT NULL,
  `programme` text NOT NULL,
  `semester` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `assign_num` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass_w` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `st`
--

INSERT INTO `st` (`id`, `student_id`, `reg_num`, `Name`, `level`, `programme`, `semester`, `picture`, `status`, `assign_num`, `email`, `pass_w`, `phone`, `gender`) VALUES
(6, 'HND2/2021/4682059', '18/0002/CS', 'Okoro Chika', 'HND2', 'MORNING', 'Second Semester', 'students/chika@gmail.com/britney-spears-wallpaper-3.jpg', '', '', 'chika@gmail.com', 'chika55', '081678735637', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `submit_ted`
--

CREATE TABLE IF NOT EXISTS `submit_ted` (
`id` int(11) NOT NULL,
  `sname` text NOT NULL,
  `assign_name` varchar(100) NOT NULL,
  `upload` varchar(10000) NOT NULL,
  `programme` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  `semester` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL,
  `status` varchar(15) NOT NULL,
  `score` varchar(10000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submit_ted`
--

INSERT INTO `submit_ted` (`id`, `sname`, `assign_name`, `upload`, `programme`, `level`, `semester`, `date`, `student_id`, `status`, `score`) VALUES
(1, 'Okoro Chika', 'Result', 'Sir please when will our result be out.', 'MORNING', 'HND2', 'Second Semester', '20/Apr/2021 12:42:56pm', 'HND2/2021/4682059', 'No Reply', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_point`
--
ALTER TABLE `a_point`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `give_assign`
--
ALTER TABLE `give_assign`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lect_rer`
--
ALTER TABLE `lect_rer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livechat`
--
ALTER TABLE `livechat`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `st`
--
ALTER TABLE `st`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submit_ted`
--
ALTER TABLE `submit_ted`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_point`
--
ALTER TABLE `a_point`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `give_assign`
--
ALTER TABLE `give_assign`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `lect_rer`
--
ALTER TABLE `lect_rer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `livechat`
--
ALTER TABLE `livechat`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `st`
--
ALTER TABLE `st`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `submit_ted`
--
ALTER TABLE `submit_ted`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
