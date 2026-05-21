-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2026 at 07:18 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_mangement`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `year` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `status` enum('Present','Absent') DEFAULT NULL,
  `present_days` int(11) DEFAULT '0',
  `total_days` int(11) DEFAULT '0',
  `percentage` decimal(5,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `student_id`, `student_name`, `dept`, `year`, `date`, `status`, `present_days`, `total_days`, `percentage`) VALUES
(1, 24173, '', 'CME', '2024-2027', '2008-07-14', 'Present', 0, 0, '0.00'),
(2, 24173, '', 'CME', '2024-2027', '2008-07-14', 'Present', 0, 0, '0.00'),
(3, 24173, '', 'CME', '2024-2027', '2008-07-14', 'Present', 0, 0, '0.00'),
(4, 24173, '', 'CME', '2024-2027', '2008-07-14', 'Present', 0, 0, '0.00'),
(5, 24173, '', 'CME', '2024-2027', '2008-07-14', 'Present', 0, 0, '0.00'),
(6, 24173, '', 'CME', '2024-2027', '2008-07-14', 'Present', 0, 0, '0.00'),
(7, 24173, '', 'CME', '2024-2027', '2008-07-14', 'Present', 0, 0, '0.00'),
(8, 24173, '', 'CME', '2024-2027', '2008-07-14', 'Present', 0, 0, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sno` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id` varchar(30) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `year` varchar(20) NOT NULL,
  `phno` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sno`, `name`, `id`, `dept`, `year`, `phno`) VALUES
(1, 'Appikonda.Jyothisha', '24173-cm-001', 'CME', '2024-2027', '8520022850'),
(2, 'Chinthala.Prasanna', '24173-cm-008', 'CME', '2024-2027', '9550233919'),
(3, 'Kandarpa.pranathi', '24173-cm-022', 'CME', '2024-2027', '8790835163'),
(4, 'Koribilli.Sarika', '24173-cm-027', 'CME', '2024-2027', '7780506996'),
(5, 'Korukonda.Jyotshna', '24173-cm-028', 'CME', '2024-2027', '9133858380'),
(6, 'Pukkala.Pavani', '24173-cm-046', 'CME', '2024-2027', '9392218058'),
(7, 'Somaji.Chaitra', '24173-cm-054', 'CME', '2024-2027', '6301941676'),
(8, 'Yallabilli.Kamakshi Venuka Keerthi', '24173-cm-059', 'CME', '2024-2027', '6304320238');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `qualification` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_id`, `name`, `dept`, `qualification`, `phone`, `email`, `password`) VALUES
(1, '1', 'BNM-B NARASIMHA MURTHY', 'CME', '', '', '', 'college'),
(2, '2', 'CHS-CH SAROJINI', 'CME', '', '', '', 'college'),
(3, '3', 'MT-MOHANA TIRUMULA', 'CME', '', '', '', 'college'),
(4, '4', 'GGR-G.GIRISH REDDY', 'CME', '', '', '', 'college'),
(5, '5', 'BS-B.SURESH', 'CME', '', '', '', 'college'),
(6, '6', 'MG-M.GAYATHRI', 'CME', '', '', '', 'college'),
(7, '7', 'RG-R.GANESH KUMAR', 'CME', '', '', '', 'college'),
(8, '8', 'BUM-B.UMA MAHESHWARI', 'CME', '', '', '', 'college'),
(10, '9', 'ysr-Y.Srinivas Rao', 'CME', '', '', '', 'college'),
(11, '10', 'K.Govinda Rao', 'CME', '', '', '', 'college');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendance`
--

CREATE TABLE `teacher_attendance` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(20) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `status` enum('Present','Absent') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_attendance`
--

INSERT INTO `teacher_attendance` (`id`, `teacher_id`, `teacher_name`, `dept`, `date`, `status`) VALUES
(1, '1', 'BNM-B NARASIMHA MURTHY', 'CME', '2026-08-05', 'Present'),
(2, '2', 'CHS-CH SAROJINI', 'CME', '2026-08-05', 'Present'),
(3, '3', 'MT-MOHANA TIRUMULA', 'CME', '2026-08-05', 'Present'),
(4, '4', 'GGR-G.GIRISH REDDY', 'CME', '2026-08-05', 'Present'),
(5, '5', 'BS-B.SURESH', 'CME', '2026-08-05', 'Present'),
(6, '6', 'MG-M.GAYATHRI', 'CME', '2026-08-05', 'Present'),
(7, '7', 'RG-R.GANESH KUMAR', 'CME', '2026-08-05', 'Present'),
(8, '8', 'BUM-B.UMA MAHESHWARI', 'CME', '2026-08-05', 'Present'),
(9, '9', 'ysr-Y.Srinivas Rao', 'CME', '2026-08-05', 'Present'),
(10, '10', 'K.Govinda Rao', 'CME', '2026-08-05', 'Present');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
