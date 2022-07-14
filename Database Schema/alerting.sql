-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 14, 2022 at 09:03 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alerting`
--

-- --------------------------------------------------------

--
-- Table structure for table `chaos`
--

CREATE TABLE `chaos` (
  `test_id` int(100) NOT NULL,
  `testname` varchar(255) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




-- --------------------------------------------------------

--
-- Table structure for table `errors500`
--

CREATE TABLE `errors500` (
  `alertid` int(100) NOT NULL,
  `timestamp` datetime(6) DEFAULT NULL,
  `backend` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `url` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `errors504`
--

CREATE TABLE `errors504` (
  `alertid` int(100) NOT NULL,
  `timestamp` datetime(6) DEFAULT NULL,
  `backend` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `url` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




-- --------------------------------------------------------

--
-- Table structure for table `slowquery`
--

CREATE TABLE `slowquery` (
  `id` int(100) NOT NULL,
  `user` varchar(255) NOT NULL,
  `count` int(100) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`timestamp`) VALUES
('2022-06-15 22:05:09'),
('2022-06-15 22:05:12');


ALTER TABLE `chaos`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `errors500`
--
ALTER TABLE `errors500`
  ADD PRIMARY KEY (`alertid`);

--
-- Indexes for table `errors504`
--
ALTER TABLE `errors504`
  ADD PRIMARY KEY (`alertid`);

--
-- Indexes for table `slowquery`
--
ALTER TABLE `slowquery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chaos`
--
ALTER TABLE `chaos`
  MODIFY `test_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `errors500`
--
ALTER TABLE `errors500`
  MODIFY `alertid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=804;

--
-- AUTO_INCREMENT for table `errors504`
--
ALTER TABLE `errors504`
  MODIFY `alertid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `slowquery`
--
ALTER TABLE `slowquery`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
