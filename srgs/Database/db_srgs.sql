-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2020 at 08:03 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_srgs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `nm_courseid` int(11) NOT NULL,
  `sz_coursename` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`nm_courseid`, `sz_coursename`) VALUES
(2, 'IMCA'),
(3, 'MBA'),
(4, 'bba'),
(5, 'MSC.IT');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result`
--

CREATE TABLE `tbl_result` (
  `nm_resultid` int(11) NOT NULL,
  `nm_studentid` int(11) NOT NULL,
  `nm_subid1` int(11) NOT NULL,
  `nm_subid2` int(11) NOT NULL,
  `nm_subid3` int(11) NOT NULL,
  `nm_subid4` int(11) NOT NULL,
  `nm_subid5` int(11) NOT NULL,
  `nm_sub1_mark` int(11) NOT NULL,
  `nm_sub2_mark` int(11) NOT NULL,
  `nm_sub3_mark` int(11) NOT NULL,
  `nm_sub4_mark` int(11) NOT NULL,
  `nm_sub5_mark` int(11) NOT NULL,
  `nm_total` int(11) NOT NULL,
  `nm_persantage` int(11) NOT NULL,
  `nm_result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_result`
--

INSERT INTO `tbl_result` (`nm_resultid`, `nm_studentid`, `nm_subid1`, `nm_subid2`, `nm_subid3`, `nm_subid4`, `nm_subid5`, `nm_sub1_mark`, `nm_sub2_mark`, `nm_sub3_mark`, `nm_sub4_mark`, `nm_sub5_mark`, `nm_total`, `nm_persantage`, `nm_result`) VALUES
(1, 1, 1, 5, 7, 4, 6, 70, 75, 65, 85, 80, 375, 75, 1),
(4, 3, 8, 9, 11, 12, 10, 70, 82, 56, 78, 91, 377, 75, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sem`
--

CREATE TABLE `tbl_sem` (
  `nm_semid` int(11) NOT NULL,
  `nm_courseid` int(11) NOT NULL,
  `nm_sem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sem`
--

INSERT INTO `tbl_sem` (`nm_semid`, `nm_courseid`, `nm_sem`) VALUES
(1, 2, 5),
(2, 2, 4),
(3, 2, 2),
(4, 4, 2),
(7, 4, 1),
(8, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `nm_studentid` int(11) NOT NULL,
  `sz_name` varchar(50) NOT NULL,
  `nm_semid` int(11) NOT NULL,
  `sz_email` varchar(50) NOT NULL,
  `nm_contact` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`nm_studentid`, `sz_name`, `nm_semid`, `sz_email`, `nm_contact`) VALUES
(1, 'Jigar Vakil', 1, 'gglisggl@gmail.com', 9824619885),
(3, 'Nitya Kansara', 8, 'nityakansara16@gmail.com', 7405551900);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `nm_subjectid` int(11) NOT NULL,
  `nm_semid` int(11) NOT NULL,
  `sz_subjectname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`nm_subjectid`, `nm_semid`, `sz_subjectname`) VALUES
(1, 1, 'Android'),
(4, 1, 'PHP'),
(5, 1, 'DS'),
(6, 1, 'SE'),
(7, 1, 'JAVA'),
(8, 8, 'Business Fundamentals'),
(9, 8, 'Business Growth'),
(10, 8, 'Organizational Behaviour'),
(11, 8, 'Financial Accounting'),
(12, 8, 'Marketing Management');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`nm_courseid`);

--
-- Indexes for table `tbl_result`
--
ALTER TABLE `tbl_result`
  ADD PRIMARY KEY (`nm_resultid`),
  ADD KEY `nm_studentid` (`nm_studentid`),
  ADD KEY `nm_subid1` (`nm_subid1`),
  ADD KEY `nm_subid2` (`nm_subid2`),
  ADD KEY `nm_subid3` (`nm_subid3`),
  ADD KEY `nm_subid4` (`nm_subid4`),
  ADD KEY `nm_subid5` (`nm_subid5`);

--
-- Indexes for table `tbl_sem`
--
ALTER TABLE `tbl_sem`
  ADD PRIMARY KEY (`nm_semid`),
  ADD KEY `nm_courseid` (`nm_courseid`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`nm_studentid`),
  ADD KEY `nm_semid` (`nm_semid`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`nm_subjectid`),
  ADD KEY `nm_semid` (`nm_semid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `nm_courseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_result`
--
ALTER TABLE `tbl_result`
  MODIFY `nm_resultid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_sem`
--
ALTER TABLE `tbl_sem`
  MODIFY `nm_semid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `nm_studentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `nm_subjectid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_result`
--
ALTER TABLE `tbl_result`
  ADD CONSTRAINT `r1` FOREIGN KEY (`nm_studentid`) REFERENCES `tbl_student` (`nm_studentid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `r2` FOREIGN KEY (`nm_subid1`) REFERENCES `tbl_subject` (`nm_subjectid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `r3` FOREIGN KEY (`nm_subid2`) REFERENCES `tbl_subject` (`nm_subjectid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `r4` FOREIGN KEY (`nm_subid3`) REFERENCES `tbl_subject` (`nm_subjectid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `r5` FOREIGN KEY (`nm_subid4`) REFERENCES `tbl_subject` (`nm_subjectid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `r6` FOREIGN KEY (`nm_subid5`) REFERENCES `tbl_subject` (`nm_subjectid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_sem`
--
ALTER TABLE `tbl_sem`
  ADD CONSTRAINT `a` FOREIGN KEY (`nm_courseid`) REFERENCES `tbl_course` (`nm_courseid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD CONSTRAINT `aaa` FOREIGN KEY (`nm_semid`) REFERENCES `tbl_sem` (`nm_semid`);

--
-- Constraints for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD CONSTRAINT `aa` FOREIGN KEY (`nm_semid`) REFERENCES `tbl_sem` (`nm_semid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
