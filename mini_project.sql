-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 29, 2021 at 08:46 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_data`
--

CREATE TABLE `login_data` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_data`
--

INSERT INTO `login_data` (`username`, `password`) VALUES
('Admin_22', 'YWRtaW4='),
('Omkar_21J', 'aGlyYW9ta2Fy');

-- --------------------------------------------------------

--
-- Table structure for table `match_data`
--

CREATE TABLE `match_data` (
  `mid` int(11) NOT NULL,
  `mdate` date NOT NULL,
  `stadium` varchar(50) NOT NULL,
  `team1` varchar(25) NOT NULL,
  `team2` varchar(25) NOT NULL,
  `mtype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `match_data`
--

INSERT INTO `match_data` (`mid`, `mdate`, `stadium`, `team1`, `team2`, `mtype`) VALUES
(1, '2021-02-05', 'chennai', 'India', 'England', 'Test'),
(2, '2021-02-13', 'chennai', 'India', 'England', 'Test'),
(3, '2021-02-24', 'ahmedabad', 'India', 'England', 'Test'),
(4, '2021-03-04', 'ahmedabad', 'India', 'England', 'Test'),
(5, '2021-03-12', 'ahmedabad', 'India', 'England', 'T20'),
(6, '2021-03-14', 'ahmedabad', 'India', 'England', 'T20'),
(7, '2021-03-16', 'ahmedabad', 'India', 'England', 'T20'),
(8, '2021-03-18', 'ahmedabad', 'India', 'England', 'T20'),
(9, '2021-03-20', 'ahmedabad', 'India', 'England', 'T20'),
(10, '2021-03-23', 'pune', 'India', 'England', 'ODI'),
(11, '2021-03-26', 'pune', 'India', 'England', 'ODI'),
(12, '2021-03-28', 'pune', 'India', 'England', 'ODI');

-- --------------------------------------------------------

--
-- Table structure for table `registration_data`
--

CREATE TABLE `registration_data` (
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration_data`
--

INSERT INTO `registration_data` (`name`, `username`, `password`, `email`, `phone`, `city`) VALUES
('Admin', 'Admin_22', 'YWRtaW4=', 'admin@gmail.com', '9876543210', 'Visakhapatnam'),
('Omkar', 'Omkar_21J', 'aGlyYW9ta2Fy', 'omkar@gmail.com', '9988776655', 'Sydney');

-- --------------------------------------------------------

--
-- Table structure for table `stadium_data`
--

CREATE TABLE `stadium_data` (
  `sname` varchar(30) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `capacity` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `pitchtype` varchar(10) NOT NULL,
  `imagesrc` varchar(50) NOT NULL,
  `owner` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stadium_data`
--

INSERT INTO `stadium_data` (`sname`, `cname`, `capacity`, `address`, `pitchtype`, `imagesrc`, `owner`) VALUES
('Chidambaram', 'Chennai', 50000, 'Wallajah Road, Chepauk, Chennai', 'Slow Pitch', 'images/chennai.jpg', 'Tamil Nadu Cricket Association'),
('Chinnaswamy', 'Bangalore', 40000, 'Cubbon Rd, Shivaji Nagar, Bengaluru', 'Flat Pitch', 'images/bangalore.jpg', 'Karnataka Cricket Association'),
('MCA', 'Pune', 37000, 'NH48 Road, Gahunje, Pune', 'Flat Pitch', 'images/pune.jpg', 'Maharashtra Cricket Association'),
('Motera', 'Ahmedabad', 110000, 'Motera Stadium Rd, Motera, Ahmedabad', 'Dry Pitch', 'images/ahmedabad.jpg', 'Gujarat Cricket Association'),
('Wankhede', 'Mumbai', 33108, 'Vinoo Mankad Rd, Churchgate, Mumbai', 'Flat Pitch', 'images/mumbai.jpg', 'Mumbai Cricket Association');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_data`
--

CREATE TABLE `ticket_data` (
  `tid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mdate` date NOT NULL,
  `stadium` varchar(50) NOT NULL,
  `tictype` varchar(50) NOT NULL,
  `quantity` int(2) NOT NULL,
  `bdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_data`
--

INSERT INTO `ticket_data` (`tid`, `username`, `mdate`, `stadium`, `tictype`, `quantity`, `bdate`) VALUES
(8, 'Admin_22', '2021-02-05', 'chennai', 'vip', 1, '2021-01-29'),
(9, 'Omkar_21J', '2021-02-05', 'chennai', 'upper', 2, '2021-01-29'),
(10, 'Omkar_21J', '2021-02-13', 'chennai', 'lower', 3, '2021-01-29'),
(11, 'Admin_22', '2021-02-13', 'chennai', 'vip', 1, '2021-01-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_data`
--
ALTER TABLE `login_data`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `match_data`
--
ALTER TABLE `match_data`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `registration_data`
--
ALTER TABLE `registration_data`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `stadium_data`
--
ALTER TABLE `stadium_data`
  ADD PRIMARY KEY (`sname`);

--
-- Indexes for table `ticket_data`
--
ALTER TABLE `ticket_data`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `match_data`
--
ALTER TABLE `match_data`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ticket_data`
--
ALTER TABLE `ticket_data`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
