-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 28, 2021 at 09:44 PM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `nrc`
--

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int NOT NULL,
  `Work_Type` text,
  `Code` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `nagarsevak`
--

CREATE TABLE `nagarsevak` (
  `id` int NOT NULL,
  `Prabhag_No` varchar(3) DEFAULT NULL,
  `Nagarsevak_Name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Codes` varchar(3) DEFAULT NULL,
  `Url` varchar(48) DEFAULT NULL,
  `Prabhag_Name` varchar(41) DEFAULT NULL,
  `Ward_ofc` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Party` varchar(20) DEFAULT NULL,
  `Total_Questions` int NOT NULL DEFAULT '0',
  `Avg_Attendance` float NOT NULL DEFAULT '0',
  `Criminal_Records` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Csv_Link` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Municipal_Committee` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `wardoffice`
--

CREATE TABLE `wardoffice` (
  `id` int NOT NULL,
  `Ward_ofc` varchar(22) DEFAULT NULL,
  `Prabhag_No` int DEFAULT NULL,
  `Prabhag_Name` varchar(41) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `work_details`
--

CREATE TABLE `work_details` (
  `id` int NOT NULL,
  `Year` varchar(11) DEFAULT NULL,
  `Details_Of_Work` text,
  `Amount` decimal(15,2) DEFAULT NULL,
  `Code` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `Prabhag_No` varchar(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nagarsevak`
--
ALTER TABLE `nagarsevak`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wardoffice`
--
ALTER TABLE `wardoffice`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_details`
--
ALTER TABLE `work_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;


CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip_data` varchar(100) NOT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `updated_on` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;