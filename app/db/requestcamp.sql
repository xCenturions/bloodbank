-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2021 at 03:43 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `requestcamp`
--

CREATE TABLE `requestcamp` (
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `nic` varchar(100) DEFAULT NULL,
  `mobile` int(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nst_bank` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'unchecked',
  `date` date DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requestcamp`
--

INSERT INTO `requestcamp` (`id`, `name`, `nic`, `mobile`, `email`, `nst_bank`, `location`, `status`, `date`, `deleted`) VALUES
(1, 'Palle Arachchige Tharindu Maduranga', '973533576V', 762247830, 'maduranga.tharidu@gmail.com', 'Jaffna', 'Sri Palee College - Horana', 'unchecked', '2021-10-17', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requestcamp`
--
ALTER TABLE `requestcamp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requestcamp`
--
ALTER TABLE `requestcamp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
