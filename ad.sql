-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 10, 2021 at 10:27 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

DROP TABLE IF EXISTS `admin_info`;
CREATE TABLE IF NOT EXISTS `admin_info` (
  `email` varchar(255) NOT NULL,
  `id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`email`, `id`) VALUES
('admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `bookreciver`
--

DROP TABLE IF EXISTS `bookreciver`;
CREATE TABLE IF NOT EXISTS `bookreciver` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `BookId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'pending',
  `entrydate` datetime DEFAULT CURRENT_TIMESTAMP,
  `ismeetingdone` tinyint(1) NOT NULL DEFAULT '0',
  `date` varchar(50) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `meetingtype` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookreciver`
--

INSERT INTO `bookreciver` (`Id`, `BookId`, `UserId`, `Status`, `entrydate`, `ismeetingdone`, `date`, `time`, `meetingtype`) VALUES
(1, 18, 3, 'progress', '2021-07-09 18:14:48', 0, '2021-07-30', '00:19', 'meeting'),
(11, 24, 3, 'progress', '2021-07-10 01:43:51', 0, '2021-07-11', '05:00', 'call');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `bookn` varchar(255) NOT NULL,
  `entrydate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Id`, `UserId`, `category`, `class`, `bookn`, `entrydate`, `status`) VALUES
(18, 3, 'Hindi', 'II', 'Test', '2021-07-08 16:04:51', 'Pending'),
(19, 3, 'Mathematics', 'Graduation', 'B', '2021-07-08 16:05:06', 'Pending'),
(20, 3, 'Hindi', 'I', 'Test Book', '2021-07-08 23:17:44', 'Pending'),
(21, 3, 'English', 'V', 'English Textbook', '2021-07-08 23:18:06', 'Pending'),
(22, 3, 'Geography', 'Graduation', 'B', '2021-07-08 23:18:19', 'Pending'),
(23, 3, 'History', 'II', 'C', '2021-07-08 23:18:33', 'Pending'),
(24, 3, 'Hindi', '12', 'Hindi kavya', '2021-07-10 01:38:04', 'Pending'),
(25, 3, 'English', '12', 'Textbook', '2021-07-10 01:38:45', 'Pending'),
(26, 3, 'Mathematics', '11', 'Maths', '2021-07-10 01:38:57', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `clothes`
--

DROP TABLE IF EXISTS `clothes`;
CREATE TABLE IF NOT EXISTS `clothes` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `items` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `entrydate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(50) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clothreciver`
--

DROP TABLE IF EXISTS `clothreciver`;
CREATE TABLE IF NOT EXISTS `clothreciver` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `BookId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `entrydate` datetime DEFAULT CURRENT_TIMESTAMP,
  `ismeetingdone` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
CREATE TABLE IF NOT EXISTS `food` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `meals` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `entrydate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Id`, `meals`, `category`, `entrydate`, `status`) VALUES
(1, '5', '', '2021-07-10 00:51:40', 'pending'),
(2, '5', '', '2021-07-10 00:51:40', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `foodreciver`
--

DROP TABLE IF EXISTS `foodreciver`;
CREATE TABLE IF NOT EXISTS `foodreciver` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `BookId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `entrydate` datetime DEFAULT CURRENT_TIMESTAMP,
  `ismeetingdone` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ngo`
--

DROP TABLE IF EXISTS `ngo`;
CREATE TABLE IF NOT EXISTS `ngo` (
  `NgoId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `sector` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `UniqueId` varchar(255) NOT NULL,
  `Approved` tinyint(1) NOT NULL DEFAULT '0',
  `entrydate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`NgoId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngo`
--

INSERT INTO `ngo` (`NgoId`, `name`, `email`, `password`, `phone`, `address`, `city`, `state`, `sector`, `type`, `UniqueId`, `Approved`, `entrydate`) VALUES
(5, 'Test', 'mzaifquraishi@gmail.com', '123456', '7897856894', 'Tes', 'Lucknow', 'Uttar Pradesh', 'Agriculture', 'Private Sector Companies (Sec 8/25)', '3358398578', 0, '2021-07-09 01:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `profile_pic`
--

DROP TABLE IF EXISTS `profile_pic`;
CREATE TABLE IF NOT EXISTS `profile_pic` (
  `email` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_pic`
--

INSERT INTO `profile_pic` (`email`, `image`) VALUES
('siddharthtandon96@gmail.com', 'Screenshot (234).png'),
('devika.tondon@gmail.com', 'Screenshot (234).png'),
('ayushidixitme@gmail.com', 'Screenshot (234).png'),
('amandixit@gmail.com', 'Screenshot (234).png');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

DROP TABLE IF EXISTS `signup`;
CREATE TABLE IF NOT EXISTS `signup` (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(100) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`UserId`, `fname`, `lname`, `email`, `password`, `gender`, `age`, `phone`, `address`, `city`, `state`) VALUES
(1, 'Siddharth', 'Tandon', 'siddharthtandon96@gmail.com', '123456', 'Male', 24, '2323238773', 'Rajendra Nagar', 'Luc', 'Uttar Pradesh'),
(2, 'Devika', 'Tandon', 'devika.tondon@gmail.com', '123456', 'Female', 21, '5677676654', 'Ram Nagar', 'Lucknow', 'Uttar Pradesh'),
(3, 'Ayushi', 'Dixit', 'mzaifquraishi@gmail.com', '123456', 'Female', 20, '6564343437', 'Rajajipuram', 'Lucknow', 'Uttar Pradesh');

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

DROP TABLE IF EXISTS `story`;
CREATE TABLE IF NOT EXISTS `story` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `story` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`name`, `email`, `story`) VALUES
('Siddharth', 'siddharthtandon96@gmail.com', 'Evonate helped me to donate for a good cause'),
('Devika Tandon', 'devika.tondon@gmail.com', 'Good experience');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
