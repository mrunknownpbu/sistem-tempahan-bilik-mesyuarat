-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2017 at 01:36 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `useracc`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `unit` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `place` varchar(30) NOT NULL,
  `member` varchar(50) NOT NULL,
  `foodorder` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`unit`, `name`, `date`, `place`, `member`, `foodorder`) VALUES
('Tanah', 'test 1', '0000-00-00', 'Bunga Raya', '15', 'Set A');

-- --------------------------------------------------------

--
-- Table structure for table `useracc`
--

CREATE TABLE IF NOT EXISTS `useracc` (
`id` int(40) NOT NULL,
  `usertype` varchar(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useracc`
--

INSERT INTO `useracc` (`id`, `usertype`, `username`, `password`) VALUES
(1, 'admin', 'admin01', 'admin01'),
(2, 'user', 'user01', 'user01'),
(3, 'admin', 'aku', 'abc123'),
(6, 'admin', 'badrul', 'abc123'),
(7, 'user', 'ika', 'abc123'),
(8, 'user', 'niya', 'abc123'),
(9, 'admin', 'yati', 'abc123'),
(10, 'admin', 'azrul', 'abc123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
 ADD PRIMARY KEY (`unit`);

--
-- Indexes for table `useracc`
--
ALTER TABLE `useracc`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `useracc`
--
ALTER TABLE `useracc`
MODIFY `id` int(40) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
