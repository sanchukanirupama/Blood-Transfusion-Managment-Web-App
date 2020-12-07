-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2020 at 08:31 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(255) NOT NULL,
  `hospital_name` text NOT NULL,
  `district` varchar(100) NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `req_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Discription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `hospital_name`, `district`, `bloodgroup`, `req_time`, `Discription`) VALUES
(45, 'colombo hospital', 'Colombo', 'A-', '', 'Need as soon as possible'),
(46, 'Hemas hospital', 'Gampaha', 'B-', 'December 5, 2020, 3:52 pm', 'Vegitarian'),
(47, 'ragama hospital', 'Gampaha', 'B-', 'December 5, 2020, 3:55 pm', ''),
(48, 'ragama hospital', 'Gampaha', 'B+', 'December 5, 2020, 4:06 pm', 'Need as soon as possible'),
(49, 'kaluthara hospital', 'Kaluthara', 'AB+', 'December 6, 2020, 2:01 pm', ''),
(50, 'ragama hospital', 'Gampaha', 'O+', 'December 7, 2020, 4:51 am', ''),
(51, 'ragama hospital', 'Gampaha', 'B+', 'December 7, 2020, 8:25 am', '');

-- --------------------------------------------------------

--
-- Table structure for table `donators`
--

CREATE TABLE `donators` (
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `district` text NOT NULL,
  `bloodgroup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `donators`
--

INSERT INTO `donators` (`name`, `password`, `email`, `gender`, `district`, `bloodgroup`) VALUES
('nash', 'f45731e3d39a1b2330bbf93e9b3de59e', 'nash@gmai.com', 'Male', 'Colombo', 'A+'),
('root', '81dc9bdb52d04dc20036dbd8313ed055', 'root@gmail.com', 'Female', 'Colombo', 'AB+'),
('Sanchuka Nirupama', '81dc9bdb52d04dc20036dbd8313ed055', 'sanchukanirupama@gmail.com', 'Male', 'Gampaha', 'B+'),
('yohann', '6074c6aa3488f3c2dddff2a7ca821aab', 'yohan@gmail.com', 'Male', 'Colombo', 'A+'),
('yohann', '81dc9bdb52d04dc20036dbd8313ed055', 'yohan555@gmail.com', 'Female', 'Galle', 'B+');

-- --------------------------------------------------------

--
-- Table structure for table `hospitle`
--

CREATE TABLE `hospitle` (
  `hospitalemail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hospitalpass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hospitle`
--

INSERT INTO `hospitle` (`hospitalemail`, `hospitalpass`) VALUES
('colombohospital@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('ragamahospital@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donators`
--
ALTER TABLE `donators`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `hospitle`
--
ALTER TABLE `hospitle`
  ADD PRIMARY KEY (`hospitalemail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
