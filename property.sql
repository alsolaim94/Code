-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2018 at 07:35 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akari`
--

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `proprtyID` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `prooertyName` varchar(250) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `zipcode` varchar(15) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `type` varchar(15) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `bedroom` int(11) DEFAULT NULL,
  `bathroom` int(11) DEFAULT NULL,
  `extra` text,
  `lease` varchar(15) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `availability` date DEFAULT NULL,
  `contraction` year(4) DEFAULT NULL,
  `problem` text,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`proprtyID`, `email`, `prooertyName`, `country`, `address`, `city`, `state`, `zipcode`, `phone`, `type`, `size`, `bedroom`, `bathroom`, `extra`, `lease`, `price`, `availability`, `contraction`, `problem`, `note`) VALUES
(67, 'f.alsolaim@gmail.com', 'ttttttt', 'ttttt', 'ttttt', 'tttt', 'ttt', 'tt', '4567890', 'residential', 78, 87, 878, 'no', 'monthly', 45678, '2018-11-11', 2010, 'jj', NULL),
(68, 'f.alsolaim@gmail.com', 'ttttttt', 'ttttt', 'ttttt', 'tttt', 'ttt', 'tt', '4567890', 'residential', 78, 87, 878, 'no', 'monthly', 45678, '2018-11-11', 2010, 'jj', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`proprtyID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `proprtyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
