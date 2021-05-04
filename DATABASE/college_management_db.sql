-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 05:45 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_management_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance_db`
--

CREATE TABLE `attendance_db` (
  `att_id` int(11) NOT NULL,
  `month1` int(11) NOT NULL,
  `month2` int(11) NOT NULL,
  `month3` int(11) NOT NULL,
  `month4` int(11) NOT NULL,
  `month5` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mark_db`
--

CREATE TABLE `mark_db` (
  `mark_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `emark` int(11) NOT NULL,
  `subj_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification_db`
--

CREATE TABLE `notification_db` (
  `notification_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role_db`
--

CREATE TABLE `role_db` (
  `role_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `sts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_db`
--

INSERT INTO `role_db` (`role_id`, `username`, `password`, `role`, `sts`) VALUES
(1, 'admin', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_db`
--

CREATE TABLE `student_db` (
  `student_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(150) NOT NULL,
  `year` varchar(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject_db`
--

CREATE TABLE `subject_db` (
  `sub_id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `sem` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance_db`
--
ALTER TABLE `attendance_db`
  ADD PRIMARY KEY (`att_id`);

--
-- Indexes for table `mark_db`
--
ALTER TABLE `mark_db`
  ADD PRIMARY KEY (`mark_id`);

--
-- Indexes for table `notification_db`
--
ALTER TABLE `notification_db`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `role_db`
--
ALTER TABLE `role_db`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `student_db`
--
ALTER TABLE `student_db`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject_db`
--
ALTER TABLE `subject_db`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance_db`
--
ALTER TABLE `attendance_db`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mark_db`
--
ALTER TABLE `mark_db`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification_db`
--
ALTER TABLE `notification_db`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_db`
--
ALTER TABLE `role_db`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_db`
--
ALTER TABLE `student_db`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject_db`
--
ALTER TABLE `subject_db`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
