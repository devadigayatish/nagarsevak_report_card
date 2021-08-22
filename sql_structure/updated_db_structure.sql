-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2021 at 05:55 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nrc`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
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

CREATE TABLE `codes` (
  `Work_Type` text,
  `Code` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `csv_data`
--

CREATE TABLE `csv_data` (
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

CREATE TABLE `nagarsevak` (
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
  `Csv_Link` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prabhagname`
--

CREATE TABLE `prabhagname` (
  `Ward_ofc` varchar(22) DEFAULT NULL,
  `Prabhag_No` int(2) DEFAULT NULL,
  `Prabhag_Name` varchar(41) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wardoffice`
--

CREATE TABLE `wardoffice` (
  `Ward_ofc` varchar(22) DEFAULT NULL,
  `Prabhag_No` int(3) DEFAULT NULL,
  `Prabhag_Name` varchar(41) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `work_details`
--

CREATE TABLE `work_details` (
  `Year` varchar(11) DEFAULT NULL,
  `Details_Of_Work` text,
  `Amount` decimal(15,2) DEFAULT NULL,
  `Code` varchar(1000) DEFAULT NULL,
  `Prabhag_No` varchar(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
