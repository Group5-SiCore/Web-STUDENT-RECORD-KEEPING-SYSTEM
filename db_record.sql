-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 05:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_record`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '12345'),
(2, 'neovi', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_registration`
--

CREATE TABLE `tb_registration` (
  `registration_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course` varchar(20) NOT NULL,
  `school_year` varchar(20) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `year_level` varchar(10) NOT NULL,
  `section` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_registration`
--

INSERT INTO `tb_registration` (`registration_id`, `student_id`, `course`, `school_year`, `semester`, `year_level`, `section`) VALUES
(1, 757576, 'neovillyn ', '2004-2005', '2nd', '4th year', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_registration_subject`
--

CREATE TABLE `tb_registration_subject` (
  `registration_subject_id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `day` varchar(20) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_registration_subject`
--

INSERT INTO `tb_registration_subject` (`registration_subject_id`, `registration_id`, `subject_id`, `teacher_id`, `day`, `time_start`, `time_end`) VALUES
(1, 12345, 1544, 3415, '4', '00:01:34', '01:42:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_student`
--

CREATE TABLE `tb_student` (
  `student_id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `statuss` varchar(20) NOT NULL,
  `birthday` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_student`
--

INSERT INTO `tb_student` (`student_id`, `firstname`, `middlename`, `lastname`, `gender`, `email`, `phone_number`, `statuss`, `birthday`) VALUES
(1, 'neovillyn', 'leguira', '', 'fe', 'cadete@gamil.com', '09707985927', '', ''),
(2, 'neovillyn', 'leguira', 'cadete', 'fe', 'cadete@gamil.com', '09707985927', '', ''),
(3, 'neovillyn', 'leguira', 'cadete', 'fe', 'cadete@gamil.com', '09707985927', '', ''),
(69, 'cleir', 'lapapan', 'mecitas', 'female', 'cleir@gmail.com', '094567396', 'Single', 'april 04,2004');

-- --------------------------------------------------------

--
-- Table structure for table `tb_subject`
--

CREATE TABLE `tb_subject` (
  `subject_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subjectname` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_subject`
--

INSERT INTO `tb_subject` (`subject_id`, `course_id`, `subjectname`, `unit`) VALUES
(1, 74864, 'neovi', '23'),
(2, 22, 'networking', '23'),
(3, 6676, 'cadete', '23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_teacher`
--

CREATE TABLE `tb_teacher` (
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthday` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_teacher`
--

INSERT INTO `tb_teacher` (`teacher_id`, `student_id`, `firstname`, `middlename`, `lastname`, `age`, `gender`, `birthday`) VALUES
(1, 0, '', '', '', 0, '', ''),
(2, 0, 'neovillyn', 'leguira', 'cadete', 19, 'male', 'shj45678'),
(3, 0, '', '', '', 0, '', ''),
(4, 0, 'neovillyn', 'leguira', 'cadete', 19, 'female', 'april082004'),
(5, 0, 'neovillyn', 'leguira', 'cadete', 19, 'female', 'april082004'),
(6, 0, 'neovillyn', 'leguira', 'cadete', 19, 'female', 'april082004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_registration`
--
ALTER TABLE `tb_registration`
  ADD PRIMARY KEY (`registration_id`);

--
-- Indexes for table `tb_registration_subject`
--
ALTER TABLE `tb_registration_subject`
  ADD PRIMARY KEY (`registration_subject_id`);

--
-- Indexes for table `tb_student`
--
ALTER TABLE `tb_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tb_subject`
--
ALTER TABLE `tb_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tb_teacher`
--
ALTER TABLE `tb_teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_registration`
--
ALTER TABLE `tb_registration`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_registration_subject`
--
ALTER TABLE `tb_registration_subject`
  MODIFY `registration_subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_student`
--
ALTER TABLE `tb_student`
  MODIFY `student_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tb_subject`
--
ALTER TABLE `tb_subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_teacher`
--
ALTER TABLE `tb_teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
