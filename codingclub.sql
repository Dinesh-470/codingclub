-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 08:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codingclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `control`
--

CREATE TABLE `control` (
  `id` int(11) NOT NULL,
  `rollno` varchar(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `year` int(11) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `designation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `control`
--

INSERT INTO `control` (`id`, `rollno`, `name`, `password`, `year`, `branch`, `designation`) VALUES
(1, '21U11A6729', 'Paidi Dineshreddy', 'reddydinesh', 3, 'CSE-DS', 'president');

-- --------------------------------------------------------

--
-- Table structure for table `honeypot`
--

CREATE TABLE `honeypot` (
  `id` int(11) NOT NULL,
  `rollno` varchar(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(11) NOT NULL,
  `year` int(11) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `image` text NOT NULL,
  `designation` varchar(20) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `rollno` varchar(15) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `rollno`, `password`) VALUES
(2, '21U11A6729', '$2y$10$I/g6v86//PIEeT1PcKS6fu6XLciTGunAO5qNwZ7UUCTRac5W4D/GS');

-- --------------------------------------------------------

--
-- Table structure for table `rejected_details`
--

CREATE TABLE `rejected_details` (
  `id` int(11) NOT NULL,
  `rollno` varchar(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(11) NOT NULL,
  `year` int(11) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `id` int(11) NOT NULL,
  `rollno` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `number` varchar(11) NOT NULL,
  `year` int(11) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `image` text NOT NULL,
  `designation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `rollno`, `name`, `email`, `number`, `year`, `branch`, `image`, `designation`) VALUES
(2, '21U11A6729', 'Paidi Dineshreddy', 'dineshreddypaidi470@gmail.com', '8465006180', 3, 'CSE-DS', '/codingclub/assets/student_images/21U11A6729.png', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`id`,`rollno`);

--
-- Indexes for table `honeypot`
--
ALTER TABLE `honeypot`
  ADD PRIMARY KEY (`id`,`rollno`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`,`rollno`);

--
-- Indexes for table `rejected_details`
--
ALTER TABLE `rejected_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`id`,`rollno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `control`
--
ALTER TABLE `control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `honeypot`
--
ALTER TABLE `honeypot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rejected_details`
--
ALTER TABLE `rejected_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
