-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2017 at 07:34 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkattendance`
--

CREATE TABLE `checkattendance` (
  `checkAttendanceID` int(11) NOT NULL,
  `studentID` varchar(255) NOT NULL,
  `subjectID` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `typeAttendanceID` int(11) NOT NULL,
  `attendanceDate` date NOT NULL,
  `attendanceTime` time NOT NULL,
  `attendanceNote` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `teacherID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkattendance`
--

INSERT INTO `checkattendance` (`checkAttendanceID`, `studentID`, `subjectID`, `typeAttendanceID`, `attendanceDate`, `attendanceTime`, `attendanceNote`, `teacherID`) VALUES
(50018, '06222', 'ท31101', 10002, '2017-08-15', '13:46:40', 'a', 40001),
(50017, '06215', 'ท31101', 10001, '2017-08-15', '13:41:57', 'a', 40001),
(50016, '06212', 'ท31101', 10001, '2017-08-15', '13:41:57', 'a', 40001);

-- --------------------------------------------------------

--
-- Table structure for table `checkinout`
--

CREATE TABLE `checkinout` (
  `studentID` varchar(255) NOT NULL,
  `typeCheckID` int(11) NOT NULL,
  `checkIn` time NOT NULL,
  `checkOut` time NOT NULL,
  `checkInOutID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classID` int(11) NOT NULL,
  `class` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classID`, `class`) VALUES
(101, '1/1'),
(102, '1/2'),
(103, '1/3'),
(104, '1/4'),
(105, '1/5'),
(106, '1/6'),
(201, '2/1'),
(202, '2/2'),
(203, '2/3'),
(204, '2/4'),
(205, '2/5'),
(206, '2/6'),
(301, '3/1'),
(302, '3/2'),
(303, '3/3'),
(304, '3/4'),
(305, '3/5'),
(306, '3/6'),
(401, '4/1'),
(402, '4/2'),
(403, '4/3'),
(404, '4/4'),
(405, '4/5'),
(501, '5/1'),
(502, '5/2'),
(503, '5/3'),
(504, '5/4'),
(505, '5/5'),
(601, '6/1'),
(602, '6/2'),
(603, '6/3'),
(604, '6/4'),
(605, '6/5');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` varchar(255) NOT NULL,
  `studentName` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `studentLastname` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `studentPhonenumber` varchar(10) NOT NULL,
  `classID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `studentName`, `studentLastname`, `studentPhonenumber`, `classID`) VALUES
('06215', 'ธนวัฒน์', 'มีชัย', '0810851004', 601),
('06212', 'ศรัณยู', 'พรมแสงรัตน์', '0987654321', 601),
('06219', 'ศรัณยู', 'พรมแสงรัตน์', '0987654321', 602),
('06222', 'เอ', 'บี', '0987654321', 303),
('06666', 'ซี', 'ดี', '0963926352', 103);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectID` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `class` varchar(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `update` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectID`, `subject`, `class`, `teacherID`, `update`) VALUES
('ท31101', 'ภาษาไทย', '1/12', 40001, '2017-08-15 14:08:37'),
('ท31101', 'ภาษาไทย', '1/12', 40001, '2017-08-15 14:08:37'),
('อ31101', 'ภาษาอังกฤษ', '6/1', 40001, '2017-08-15 13:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacherID` int(11) NOT NULL,
  `teacherName` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `teacherLastname` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `teacherPhone` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `classID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherID`, `teacherName`, `teacherLastname`, `teacherPhone`, `classID`, `userID`) VALUES
(40001, 'ธนวัฒน์', 'มีชัย', '0810851004', 401, 30002);

-- --------------------------------------------------------

--
-- Table structure for table `typeattendance`
--

CREATE TABLE `typeattendance` (
  `typeAttendanceID` int(11) NOT NULL,
  `typeAttendance` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typeattendance`
--

INSERT INTO `typeattendance` (`typeAttendanceID`, `typeAttendance`) VALUES
(10001, 'มา'),
(10002, 'ลาป่วย'),
(10003, 'ลากิจ'),
(10004, 'ขาด');

-- --------------------------------------------------------

--
-- Table structure for table `typecheckinout`
--

CREATE TABLE `typecheckinout` (
  `typeCheckInOutID` int(11) NOT NULL,
  `typeCheckInOut` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `typeUser` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `user`, `password`, `typeUser`) VALUES
(30001, 'admin', 'admin1234', 'ผู้ดูแลระบบ'),
(30002, 'gapom', 'Ga.pom1539', 'อาจารย์');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkattendance`
--
ALTER TABLE `checkattendance`
  ADD PRIMARY KEY (`checkAttendanceID`);

--
-- Indexes for table `checkinout`
--
ALTER TABLE `checkinout`
  ADD PRIMARY KEY (`checkInOutID`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherID`);

--
-- Indexes for table `typeattendance`
--
ALTER TABLE `typeattendance`
  ADD PRIMARY KEY (`typeAttendanceID`);

--
-- Indexes for table `typecheckinout`
--
ALTER TABLE `typecheckinout`
  ADD PRIMARY KEY (`typeCheckInOutID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkattendance`
--
ALTER TABLE `checkattendance`
  MODIFY `checkAttendanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50019;
--
-- AUTO_INCREMENT for table `checkinout`
--
ALTER TABLE `checkinout`
  MODIFY `checkInOutID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40002;
--
-- AUTO_INCREMENT for table `typeattendance`
--
ALTER TABLE `typeattendance`
  MODIFY `typeAttendanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10005;
--
-- AUTO_INCREMENT for table `typecheckinout`
--
ALTER TABLE `typecheckinout`
  MODIFY `typeCheckInOutID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30003;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
