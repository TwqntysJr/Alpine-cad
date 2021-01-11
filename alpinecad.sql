-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 12:15 PM
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
-- Database: `alpinecad`
--

-- --------------------------------------------------------

--
-- Table structure for table `caduserstatuses`
--

CREATE TABLE `caduserstatuses` (
  `uid` varchar(255) NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `civilians`
--

CREATE TABLE `civilians` (
  `UUID` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `DOB` date NOT NULL,
  `Residence` varchar(255) NOT NULL,
  `gender` text NOT NULL,
  `Origen` text NOT NULL,
  `Business-ID` int(255) DEFAULT NULL,
  `License-ID` int(255) DEFAULT NULL,
  `AdditionalLicenses-id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `ID` int(255) NOT NULL,
  `Color` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departmentusers`
--

CREATE TABLE `departmentusers` (
  `id` varchar(255) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `Department` text NOT NULL,
  `approved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `deppartments`
--

CREATE TABLE `deppartments` (
  `ID` varchar(255) NOT NULL,
  `depname` varchar(255) NOT NULL,
  `public` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `ID` int(255) NOT NULL,
  `Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `globalannouncements`
--

CREATE TABLE `globalannouncements` (
  `annID` int(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `identifiers`
--

CREATE TABLE `identifiers` (
  `UUID` int(255) NOT NULL,
  `UID` varchar(255) NOT NULL,
  `Identifier` varchar(255) NOT NULL,
  `Department` text NOT NULL,
  `Rank` text NOT NULL,
  `approved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `licenses`
--

CREATE TABLE `licenses` (
  `CIVID` int(255) NOT NULL,
  `LicenseType` varchar(255) NOT NULL,
  `LicenseStatus` varchar(255) NOT NULL,
  `InsuranceStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `race`
--

CREATE TABLE `race` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `ROLE` int(255) NOT NULL DEFAULT 0,
  `BANNED` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vehiclemakes`
--

CREATE TABLE `vehiclemakes` (
  `ID` int(255) NOT NULL,
  `VehicleMakeName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vehiclemodel`
--

CREATE TABLE `vehiclemodel` (
  `ID` int(255) NOT NULL,
  `VehicleModel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `CIVID` int(255) NOT NULL,
  `VehicleMake` varchar(255) NOT NULL,
  `VehicleModel` varchar(255) NOT NULL,
  `LicensePlate` varchar(255) NOT NULL,
  `Color` varchar(255) NOT NULL,
  `RegistrationStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `civilians`
--
ALTER TABLE `civilians`
  ADD PRIMARY KEY (`UUID`);

--
-- Indexes for table `globalannouncements`
--
ALTER TABLE `globalannouncements`
  ADD PRIMARY KEY (`annID`);

--
-- Indexes for table `licenses`
--
ALTER TABLE `licenses`
  ADD PRIMARY KEY (`CIVID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vehiclemakes`
--
ALTER TABLE `vehiclemakes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vehiclemodel`
--
ALTER TABLE `vehiclemodel`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `civilians`
--
ALTER TABLE `civilians`
  MODIFY `UUID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `globalannouncements`
--
ALTER TABLE `globalannouncements`
  MODIFY `annID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `licenses`
--
ALTER TABLE `licenses`
  MODIFY `CIVID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehiclemakes`
--
ALTER TABLE `vehiclemakes`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehiclemodel`
--
ALTER TABLE `vehiclemodel`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
