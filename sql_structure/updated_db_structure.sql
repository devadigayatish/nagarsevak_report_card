-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2021 at 08:48 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `nrc`
--

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `Work_Type` text,
  `Code` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nagarsevak`
--

CREATE TABLE `nagarsevak` (
  `id` int(11) NOT NULL,
  `Prabhag_No` varchar(3) DEFAULT NULL,
  `Nagarsevak_Name` varchar(43) DEFAULT NULL,
  `Codes` varchar(3) DEFAULT NULL,
  `Url` varchar(48) DEFAULT NULL,
  `Prabhag_Name` varchar(41) DEFAULT NULL,
  `Ward_ofc` varchar(21) DEFAULT NULL,
  `Party` varchar(20) DEFAULT NULL,
  `Total_Questions` int(11) NOT NULL,
  `Avg_Attendance` float NOT NULL,
  `Criminal_Records` varchar(10) NOT NULL,
  `Csv_Link` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Municipal_Committee` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `wardoffice`
--

CREATE TABLE `wardoffice` (
  `id` int(11) NOT NULL,
  `Ward_ofc` varchar(22) DEFAULT NULL,
  `Prabhag_No` int(3) DEFAULT NULL,
  `Prabhag_Name` varchar(41) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `work_details`
--

CREATE TABLE `work_details` (
  `id` int(11) NOT NULL,
  `Year` varchar(11) DEFAULT NULL,
  `Details_Of_Work` text,
  `Amount` decimal(15,2) DEFAULT NULL,
  `Code` varchar(1000) DEFAULT NULL,
  `Prabhag_No` varchar(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nagarsevak`
--
ALTER TABLE `nagarsevak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wardoffice`
--
ALTER TABLE `wardoffice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_details`
--
ALTER TABLE `work_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `nagarsevak`
--
ALTER TABLE `nagarsevak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;
--
-- AUTO_INCREMENT for table `wardoffice`
--
ALTER TABLE `wardoffice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `work_details`
--
ALTER TABLE `work_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5192;