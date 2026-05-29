-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: May 29, 2026 at 07:36 AM
=======
-- Generation Time: May 28, 2026 at 12:44 PM
>>>>>>> ad41644c963c8ba3fb6447fe73c956d3a3962376
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
-- Database: `college_management`
--

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `pin` varchar(20) DEFAULT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `branch` varchar(20) DEFAULT NULL,
  `year` varchar(20) DEFAULT NULL,
  `phone_no` int(11) DEFAULT NULL,
  `total_fee` int(11) DEFAULT NULL,
  `paid_fee` int(11) DEFAULT NULL,
  `balance_fee` int(11) DEFAULT NULL,
  `due_date` varchar(20) DEFAULT NULL
=======
-- Table structure for table `admin1`
--

CREATE TABLE `admin1` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin1`
--

INSERT INTO `admin1` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$QGKcPwQgwWoy7Vi8Zv4JUuC2iHXWvrAvPiC8sAFZP4O0XPsHGt/.u');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `student_pin` varchar(50) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
>>>>>>> ad41644c963c8ba3fb6447fe73c956d3a3962376
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Table structure for table `studs`
--

CREATE TABLE `studs` (
  `id` int(11) NOT NULL,
  `pin_no` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `year` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `total_fee` int(11) NOT NULL,
  `paid_fee` int(11) DEFAULT NULL,
  `due_date` date NOT NULL,
  `balance_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studs`
--

INSERT INTO `studs` (`id`, `pin_no`, `name`, `branch`, `year`, `phone`, `total_fee`, `paid_fee`, `due_date`, `balance_fee`) VALUES
(1, '24173-CM-001', 'Keerthi', 'CME', '2nd', '9876543210', 5000, 2000, '2026-05-25', 3000),
(4, '24173-CM-002', 'suzy', 'ECE', '2nd', '9876543210', 5000, 2000, '2026-05-30', 3000),
(9, '24173-CM-004', 'suzya', 'CME', '1st Year', '6304320238', 4700, 3000, '2026-12-20', 1700);
=======
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `role` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `pin_no` varchar(20) DEFAULT NULL,
  `dept` varchar(50) DEFAULT NULL,
  `year_of_join` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `role`, `name`, `pin_no`, `dept`, `year_of_join`, `dob`, `phone`, `address`, `profile_pic`, `created_at`) VALUES
(1, 'Student', 'Jyothisha Appikonda', '24173-CM-001', 'CME', 2024, '2008-05-26', '8520022850', 'Bandigadi Street,Gandhi market, Ankapalli', 'uploads/profile_24173001_1779963495.jpeg', '2026-05-28 10:00:41');
>>>>>>> ad41644c963c8ba3fb6447fe73c956d3a3962376

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `pin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `pin`) VALUES
(1, 'admin', 'admin', 'admin123', ''),
(2, 'student', 'keerthi', 'keerthi', '24173-cm-001'),
(3, 'student', 'deepthi', 'deepthi', '24173-cm-002');
=======
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `pin` varchar(30) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `username`, `email`, `password`, `pin`, `name`, `attendance`, `cgpa`, `fees`, `maths`, `physics`, `chemistry`, `english`, `cs`) VALUES
(1, 'jyothisha appikonda', 'jyothishaappikonda7@gmail.com', '$2y$10$dt5nCzNhkcTqo8hVGGYtO.OYs2EHfgPGAUiieNT7gTGBPnmE9wXiq', '24173-CM-001', 'jyothisha appikonda', 0, 0, 0, 0, 0, 0, 0, 0);
>>>>>>> ad41644c963c8ba3fb6447fe73c956d3a3962376

--
-- Indexes for dumped tables
--

--
<<<<<<< HEAD
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studs`
--
ALTER TABLE `studs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
=======
-- Indexes for table `admin1`
--
ALTER TABLE `admin1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
>>>>>>> ad41644c963c8ba3fb6447fe73c956d3a3962376
-- AUTO_INCREMENT for dumped tables
--

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `studs`
--
ALTER TABLE `studs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
=======
-- AUTO_INCREMENT for table `admin1`
--
ALTER TABLE `admin1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
>>>>>>> ad41644c963c8ba3fb6447fe73c956d3a3962376
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
