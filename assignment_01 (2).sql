-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 04:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment_01`
--

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

CREATE TABLE `advisor` (
  `student_ID` varchar(20) DEFAULT NULL,
  `Teacher_ID` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `advisor`
--

INSERT INTO `advisor` (`student_ID`, `Teacher_ID`) VALUES
('011221334', 'NaS'),
('011221331', 'NaS'),
('011221338', 'NaS'),
('011221427', 'SaIs');

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `building` varchar(20) NOT NULL,
  `room_num` varchar(20) NOT NULL,
  `capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`building`, `room_num`, `capacity`) VALUES
('Jamuna', '011C', 45),
('Karnaphuli', '011D', 45),
('Meghna', '011B', 45),
('Padma', '011A', 45);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(20) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `dept_name` varchar(20) NOT NULL,
  `credits` float(2,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `title`, `dept_name`, `credits`) VALUES
('BBA 1234', 'Fundamental Accounti', 'BBA', 3.0),
('CSE 1110', 'ICS', 'CSE', 1.0),
('CSE 1111', 'SPL', 'CSE', 3.0),
('EEE 2113', 'EC', 'EEE', 3.0);

-- --------------------------------------------------------

--
-- Table structure for table `depertment`
--

CREATE TABLE `depertment` (
  `dept_name` varchar(20) NOT NULL,
  `building` varchar(20) NOT NULL,
  `budget` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `depertment`
--

INSERT INTO `depertment` (`dept_name`, `building`, `budget`) VALUES
('BBA', 'Jamuna', '700000.00'),
('CSE', 'Padma', '870000.00'),
('DS', 'karnaphuli', '870000.00'),
('EEE', 'Meghna', '870000.00');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `ID` varchar(20) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `dept_name` varchar(20) NOT NULL,
  `salary` float(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`ID`, `name`, `dept_name`, `salary`) VALUES
('MnTA', 'Nafiz Tahmid', 'CSE', 45000.00),
('NaS', 'Nabila Shorna', 'CSE', 45000.00),
('SaAd', 'Sadman Aadeeb', 'CSE', 45000.00),
('SaIs', 'Sadia Islam', 'CSE', 45000.00);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `course_id` varchar(20) NOT NULL,
  `sec_id` varchar(20) NOT NULL,
  `semister` varchar(20) NOT NULL,
  `year` int(11) NOT NULL,
  `building` varchar(20) NOT NULL,
  `room_num` varchar(10) NOT NULL,
  `time_slot` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`course_id`, `sec_id`, `semister`, `year`, `building`, `room_num`, `time_slot`) VALUES
('BBA 1234', 'F', 'FALL', 2023, 'Jamuna', '011C', '9.51-11.10'),
('CSE 1110', 'A', 'FALL', 2023, 'Padma', '011A', '8.30-9.51'),
('CSE 1111', 'K', 'FALL', 2023, 'Padma', '011A', '9.51-11.10'),
('EEE 2113', 'J new', 'FALL', 2023, 'Meghna', '011B', '9.51-11.10');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `dept_name` varchar(20) NOT NULL,
  `tot_credit` float(4,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `name`, `dept_name`, `tot_credit`) VALUES
('011221331', 'Sharmin Sultana', 'CSE', 9.0),
('011221334', 'Musfiqur Rahman', 'CSE', 11.0),
('011221338', 'Noman', 'CSE', 11.0),
('011221427', 'Tashin', 'CSE', 13.0);

-- --------------------------------------------------------

--
-- Table structure for table `takings`
--

CREATE TABLE `takings` (
  `ID` varchar(20) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `sec_id` varchar(20) NOT NULL,
  `semister` varchar(20) NOT NULL,
  `year` int(11) NOT NULL,
  `grade` float(4,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `takings`
--

INSERT INTO `takings` (`ID`, `course_id`, `sec_id`, `semister`, `year`, `grade`) VALUES
('011221331', 'CSE 1110', 'A', 'Fall', 2023, 4.000),
('011221334', 'CSE 1111', 'K', 'Fall', 2023, 4.000),
('011221338', 'BBA 1234', 'F', 'Fall', 2023, 4.000),
('011221427', 'EEE 2113', 'J new', 'Fall', 2023, 4.000);

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `ID` varchar(20) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `sec_id` varchar(20) NOT NULL,
  `semister` varchar(20) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`ID`, `course_id`, `sec_id`, `semister`, `year`) VALUES
('MnTA', 'EEE 2113', 'J new', 'Fall', 2023),
('NaS', 'CSE 1111', 'K', 'Fall', 2023),
('SaAd', 'CSE 1110', 'A', 'Fall', 2023),
('SaIs', 'BBA 1234', 'F', 'Fall', 2023);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisor`
--
ALTER TABLE `advisor`
  ADD KEY `s_ID` (`student_ID`),
  ADD KEY `i_ID` (`Teacher_ID`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`building`,`room_num`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `dept_name` (`dept_name`);

--
-- Indexes for table `depertment`
--
ALTER TABLE `depertment`
  ADD PRIMARY KEY (`dept_name`),
  ADD KEY `building` (`building`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `dept_name` (`dept_name`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`course_id`,`sec_id`,`semister`,`year`),
  ADD KEY `building` (`building`,`room_num`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `dept_name` (`dept_name`);

--
-- Indexes for table `takings`
--
ALTER TABLE `takings`
  ADD PRIMARY KEY (`ID`,`course_id`,`sec_id`,`semister`,`year`),
  ADD KEY `course_id` (`course_id`,`sec_id`,`semister`,`year`);

--
-- Indexes for table `teaches`
--
ALTER TABLE `teaches`
  ADD PRIMARY KEY (`ID`,`course_id`,`sec_id`,`semister`,`year`),
  ADD KEY `course_id` (`course_id`,`sec_id`,`semister`,`year`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advisor`
--
ALTER TABLE `advisor`
  ADD CONSTRAINT `advisor_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `student` (`ID`),
  ADD CONSTRAINT `advisor_ibfk_2` FOREIGN KEY (`Teacher_ID`) REFERENCES `instructor` (`ID`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`dept_name`) REFERENCES `depertment` (`dept_name`);

--
-- Constraints for table `depertment`
--
ALTER TABLE `depertment`
  ADD CONSTRAINT `depertment_ibfk_1` FOREIGN KEY (`building`) REFERENCES `classroom` (`building`);

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`dept_name`) REFERENCES `depertment` (`dept_name`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `section_ibfk_2` FOREIGN KEY (`building`,`room_num`) REFERENCES `classroom` (`building`, `room_num`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`dept_name`) REFERENCES `depertment` (`dept_name`);

--
-- Constraints for table `takings`
--
ALTER TABLE `takings`
  ADD CONSTRAINT `takings_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `student` (`ID`),
  ADD CONSTRAINT `takings_ibfk_2` FOREIGN KEY (`course_id`,`sec_id`,`semister`,`year`) REFERENCES `section` (`course_id`, `sec_id`, `semister`, `year`);

--
-- Constraints for table `teaches`
--
ALTER TABLE `teaches`
  ADD CONSTRAINT `teaches_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `instructor` (`ID`),
  ADD CONSTRAINT `teaches_ibfk_2` FOREIGN KEY (`course_id`,`sec_id`,`semister`,`year`) REFERENCES `section` (`course_id`, `sec_id`, `semister`, `year`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
