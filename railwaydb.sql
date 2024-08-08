-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2024 at 11:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `railwaydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbacktb`
--

CREATE TABLE `feedbacktb` (
  `fdbackid` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `feedbackDate` date NOT NULL DEFAULT current_timestamp(),
  `subject` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `flighttb`
--

CREATE TABLE `flighttb` (
  `fid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `fsource` varchar(255) NOT NULL,
  `fdest` varchar(255) NOT NULL,
  `business_seat_capacity` int(11) NOT NULL,
  `business_price` int(11) NOT NULL,
  `firstclass_seat_capacity` int(11) NOT NULL,
  `firstclass_price` int(11) NOT NULL,
  `economy_seat_capacity` int(11) NOT NULL,
  `economy_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flighttb`
--

INSERT INTO `flighttb` (`fid`, `fname`, `fsource`, `fdest`, `business_seat_capacity`, `business_price`, `firstclass_seat_capacity`, `firstclass_price`, `economy_seat_capacity`, `economy_price`) VALUES
(1, 'Express1', 'Surat', 'Gandhinagar', 5, 1000, 5, 2000, 5, 750),
(2, 'Express2', 'New Delhi', 'Lucknow', 5, 5000, 5, 6000, 5, 4000),
(3, 'Express3', 'Jaipur', 'Jodhpur', 5, 2000, 5, 3000, 5, 1000),
(4, 'Express4', 'Pune', 'Bangalore', 5, 5000, 5, 6500, 5, 4500),
(5, 'Express5', 'Amritsar', 'Kolkata', 5, 6400, 5, 6500, 5, 4000),
(6, 'Express6', 'Mumbai ', 'Surat', 5, 4500, 5, 5600, 5, 4000),
(9, 'Express7', 'Surat', 'Bangalore', 5, 5000, 5, 7000, 5, 4000),
(10, 'Express8', 'Gorakhpur', 'Lokmanyatilak', 5, 7000, 5, 8500, 5, 5600),
(11, 'Express9', 'Hyderabad', 'Visakhapatnam', 5, 6000, 5, 7000, 5, 3200),
(12, 'Express10', 'Ahmedabad', 'Delhi', 5, 6500, 5, 7550, 5, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `passengertb`
--

CREATE TABLE `passengertb` (
  `pid` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `bdate` date NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passengertb`
--

INSERT INTO `passengertb` (`pid`, `fname`, `lname`, `bdate`, `mobile`, `gender`, `email`, `pass`) VALUES
(2, 'Janvi', 'Mangukiya', '2003-08-17', '9635754203', 'Female', 'janvimangukiya1708@gmail.com', 'Janvi123'),
(3, 'Arshit', 'Mangukiya', '2001-01-05', '9865241750', 'Male', 'arshit0501@gmail.com', 'Arshit123');

-- --------------------------------------------------------

--
-- Table structure for table `tickettb`
--

CREATE TABLE `tickettb` (
  `tid` int(255) NOT NULL,
  `pid` int(255) NOT NULL,
  `fid` int(255) NOT NULL,
  `pamt` int(255) NOT NULL,
  `pdate` date NOT NULL DEFAULT current_timestamp(),
  `Departure_Date` date NOT NULL DEFAULT current_timestamp(),
  `classtype` varchar(255) NOT NULL,
  `foodtype` varchar(255) NOT NULL,
  `pymt_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flighttb`
--
ALTER TABLE `flighttb`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `passengertb`
--
ALTER TABLE `passengertb`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flighttb`
--
ALTER TABLE `flighttb`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `passengertb`
--
ALTER TABLE `passengertb`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
