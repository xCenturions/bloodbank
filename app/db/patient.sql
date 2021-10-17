-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2021 at 03:51 PM
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
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `pt_name` varchar(35) DEFAULT NULL,
  `pt_nic` varchar(15) DEFAULT NULL,
  `sex` varchar(13) DEFAULT NULL,
  `pt_bloodgroup` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pt_mobile` varchar(10) DEFAULT NULL,
  `pt_city` text DEFAULT NULL,
  `qty` int(5) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `pt_name`, `pt_nic`, `sex`, `pt_bloodgroup`, `dob`, `pt_mobile`, `pt_city`, `qty`, `date`, `location`, `deleted`) VALUES
(2, 'tharindu Madrunga', '97354476V', 'male', NULL, '2021-08-10', '0762247830', 'Horana', 1, NULL, NULL, 0),
(3, 'addggggg', '973544276V', 'female', NULL, '2021-09-28', '0762247830', 'Jaffna', 1, '2021-10-06', 'Jaffna', 0),
(4, 'sadasdas', '973524476V', 'male', NULL, '2021-09-29', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0),
(5, 'sadasdas', '973524476V', 'male', NULL, '2021-09-29', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0),
(6, 'addgggggs', '97354476V', 'female', NULL, '2021-10-05', '0762247830', 'Horana', 1, '2021-10-16', 'Jaffna', 0),
(7, 'gfgfggg', '97354476V', 'male', NULL, '2021-10-05', '0762247830', 'Horana', 1, '2021-10-16', 'Jaffna', 0),
(8, 'tharindu Madrunga', '97354476V', 'other', NULL, '2021-10-05', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0),
(9, 'addggggg', '973524476V', 'other', NULL, '2021-10-06', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0),
(10, 'addggggg', '973524476V', 'male', NULL, '2021-10-05', '0762247830', 'Horana', 1, '2021-10-16', 'Jaffna', 0),
(11, 'addggggg', '97354476V', 'female', NULL, '2021-10-13', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0),
(12, 'gfgfggg', '97354476V', 'male', 'B+', '2021-10-05', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0),
(13, 'gfgfggg', '97354476V', 'male', 'A+', '2021-10-05', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0),
(14, 'tharindu Madrunga', '97354476V', 'male', 'O-', '2021-10-12', '0762247830', 'Horana', 1, '2021-10-16', 'Jaffna', 0),
(15, 'tharindu Madrunga', '973524476V', 'male', 'A+', '2021-10-06', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0),
(16, 'gfgfggg', '973524476V', 'male', 'A+', '2021-10-05', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0),
(17, 'addggggg', '97354476V', 'male', 'A+', '2021-10-12', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0),
(18, 'addggggg', '97354476V', 'male', 'A+', '2021-10-12', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0),
(19, 'tharindu Madrunga', '97354476V', 'female', 'A+', '2021-10-05', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0),
(20, 'tharindu Madrunga', '973544276V', 'male', 'A+', '2021-10-05', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0),
(21, 'gfgfggg', '973524476V', 'female', 'A-', '2021-09-27', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0),
(22, 'addgggggs', '973524476V', 'male', 'A+', '2021-10-05', '0762247830', 'Horana', 1, '2021-10-16', 'Jaffna', 0),
(23, 'addgggggs', '973524476V', 'male', 'A+', '2021-10-05', '0762247830', 'Horana', 1, '2021-10-16', 'Jaffna', 0),
(24, 'addggggg', '973524476V', 'male', 'A+', '2021-10-06', '0762247830', 'Horana', 1, '2021-10-16', 'Jaffna', 0),
(25, 'gfgfggg', '97354476V', 'male', 'A+', '2021-10-05', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0),
(26, 'addgggggs', '973524476V', 'male', 'A+', '2021-10-07', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0),
(27, 'addgggggs', '97354476V', 'male', 'A+', '2021-10-12', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0),
(28, 'addgggggs', '97354476V', 'male', 'A+', '2021-10-12', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0),
(29, 'addggggg', '973524476V', 'male', 'A+', '2021-09-28', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0),
(30, 'gfgfggg', '973524476V', 'male', 'A+', '2021-10-05', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0),
(31, 'addggggg', '973524476V', 'female', 'A+', '2021-10-06', '0762247830', 'Jaffna', 1, '2021-10-16', 'Jaffna', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
