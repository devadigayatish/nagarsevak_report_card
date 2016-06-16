-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2016 at 11:42 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csv_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `Prabhag_No` varchar(3) DEFAULT NULL,
  `Year` varchar(11) DEFAULT NULL,
  `Questions` int(3) DEFAULT NULL,
  `GB_Attendance` int(4) DEFAULT NULL,
  `GB_Meetings` int(4) DEFAULT NULL,
  `Atendance_Percentage` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

DROP TABLE IF EXISTS `codes`;
CREATE TABLE IF NOT EXISTS `codes` (
  `Work_Type` varchar(39) DEFAULT NULL,
  `Code` varchar(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `csv_data`
--

DROP TABLE IF EXISTS `csv_data`;
CREATE TABLE IF NOT EXISTS `csv_data` (
  `Year` varchar(30) DEFAULT NULL,
  `Details_Of_Work` varchar(100) DEFAULT NULL,
  `Amount` decimal(15,2) DEFAULT NULL,
  `Code` varchar(30) DEFAULT NULL,
  `Prabhag_No` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nagarsevak`
--

DROP TABLE IF EXISTS `nagarsevak`;
CREATE TABLE IF NOT EXISTS `nagarsevak` (
  `Prabhag_No` varchar(3) DEFAULT NULL,
  `Nagarsevak_Name` varchar(43) DEFAULT NULL,
  `Codes` varchar(3) DEFAULT NULL,
  `Url` varchar(48) DEFAULT NULL,
  `Prabhag_Name` varchar(41) DEFAULT NULL,
  `Ward_ofc` varchar(21) DEFAULT NULL,
  `Party` varchar(10) DEFAULT NULL,
  `Total_Questions` int(11) NOT NULL,
  `Avg_Attendance` float NOT NULL,
  `Criminal_Records` varchar(10) NOT NULL,
  `Original_RTI_Link` varchar(100) NOT NULL,
  `Csv_Link` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prabhagname`
--

DROP TABLE IF EXISTS `prabhagname`;
CREATE TABLE IF NOT EXISTS `prabhagname` (
  `Ward_ofc` varchar(22) DEFAULT NULL,
  `Prabhag_No` int(2) DEFAULT NULL,
  `Prabhag_Name` varchar(41) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wardoffice`
--

DROP TABLE IF EXISTS `wardoffice`;
CREATE TABLE IF NOT EXISTS `wardoffice` (
  `Ward_ofc` varchar(22) DEFAULT NULL,
  `Prabhag_No` int(3) DEFAULT NULL,
  `Prabhag_Name` varchar(41) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `work_details`
--

DROP TABLE IF EXISTS `work_details`;
CREATE TABLE IF NOT EXISTS `work_details` (
  `Year` varchar(11) DEFAULT NULL,
  `Details_Of_Work` varchar(100) DEFAULT NULL,
  `Amount` decimal(15,2) DEFAULT NULL,
  `Code` varchar(7) DEFAULT NULL,
  `Prabhag_No` varchar(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
