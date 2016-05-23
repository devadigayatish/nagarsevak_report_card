-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2016 at 02:29 PM
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
  `Party` varchar(3) DEFAULT NULL,
  `Avg_Questions` float NOT NULL,
  `Avg_Attendance` float NOT NULL,
  `Criminal_Records` varchar(10) NOT NULL,
  `Original_RTI_Link` varchar(100) NOT NULL,
  `Spreadsheet_Link` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
