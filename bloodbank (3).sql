-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 22, 2021 at 12:39 PM
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
-- Table structure for table `acceptreq`
--

CREATE TABLE `acceptreq` (
  `id` int(11) NOT NULL,
  `token` int(255) NOT NULL,
  `hospital_email` varchar(255) NOT NULL,
  `hospitalname` text NOT NULL,
  `bloodGroup` varchar(10) NOT NULL,
  `donorName` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `weight` int(255) NOT NULL,
  `Medic_con` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `donoremail` varchar(255) NOT NULL,
  `cr_date` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `acceptreq`
--

INSERT INTO `acceptreq` (`id`, `token`, `hospital_email`, `hospitalname`, `bloodGroup`, `donorName`, `gender`, `weight`, `Medic_con`, `telephone`, `donoremail`, `cr_date`, `status`) VALUES
(23, 79, 'sanchukanirupama@gmail.com', 'ragama hospital', 'B+', 'Sanchuka Nirupama', 'Male', 62, '', '0711790277', 'sanchukanirupama@gmail.com', '2021-02-18 02:40:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `id` int(255) NOT NULL,
  `hemail` varchar(255) NOT NULL,
  `hospital_name` text NOT NULL,
  `district` varchar(100) NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `req_time` varchar(255) NOT NULL,
  `Discription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `hemail`, `hospital_name`, `district`, `bloodgroup`, `req_time`, `Discription`) VALUES
(79, 'sanchukanirupama@gmail.com', 'ragama hospital', 'Gampaha', 'B+', 'February 18, 2021, 5:35 am', '');

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
('kaizer souze', '81dc9bdb52d04dc20036dbd8313ed055', 'kaizersouze@gmail.com', 'Male', 'Gampaha', 'B+'),
('mathakshi duthika', '81dc9bdb52d04dc20036dbd8313ed055', 'mathakshiduthica@gmail.com', 'Female', 'Gampaha', 'O-'),
('nash', 'f45731e3d39a1b2330bbf93e9b3de59e', 'nash@gmai.com', 'Male', 'Colombo', 'A+'),
('nirupama', '81dc9bdb52d04dc20036dbd8313ed055', 'nirupama@gmail.com', 'Male', 'Colombo', 'A+'),
('raju bhai', 'bc7316929fe1545bf0b98d114ee3ecb8', 'rajubhai@gmail.com', 'Male', 'Colombo', 'B+'),
('root', '81dc9bdb52d04dc20036dbd8313ed055', 'root@gmail.com', 'Female', 'Colombo', 'AB+'),
('Sanchuka Nirupama', '81dc9bdb52d04dc20036dbd8313ed055', 'sanchukanirupama@gmail.com', 'Male', 'Gampaha', 'B+'),
('sharuk khan', '289dff07669d7a23de0ef88d2f7129e7', 'sharukkhan@gmail.com', 'Male', 'Colombo', 'A+'),
('yohann', '6074c6aa3488f3c2dddff2a7ca821aab', 'yohan@gmail.com', 'Male', 'Colombo', 'A+'),
('yohann', '81dc9bdb52d04dc20036dbd8313ed055', 'yohan555@gmail.com', 'Female', 'Galle', 'B+');

-- --------------------------------------------------------

--
-- Table structure for table `hospitle`
--

CREATE TABLE `hospitle` (
  `hospital_name` varchar(100) NOT NULL,
  `hospitalemail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `district` varchar(100) NOT NULL,
  `hospitalpass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hospitle`
--

INSERT INTO `hospitle` (`hospital_name`, `hospitalemail`, `district`, `hospitalpass`) VALUES
('colombo hospital', 'colombohospital@gmail.com', 'colombo', '81dc9bdb52d04dc20036dbd8313ed055'),
('', 'ragamahospital@gmail.com', '', '81dc9bdb52d04dc20036dbd8313ed055'),
('ragama hospital', 'sanchukanirupama@gmail.com', 'gampaha', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acceptreq`
--
ALTER TABLE `acceptreq`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `acceptreq`
--
ALTER TABLE `acceptreq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
