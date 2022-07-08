-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 02:41 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esa`
--

-- --------------------------------------------------------

--
-- Table structure for table `astronaut`
--

CREATE TABLE `astronaut` (
  `ASTRONAUT_ID` int(11) NOT NULL,
  `ASTRONAUT_NAME` varchar(50) NOT NULL,
  `NO_OF_MISSION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `astronaut`
--

INSERT INTO `astronaut` (`ASTRONAUT_ID`, `ASTRONAUT_NAME`, `NO_OF_MISSION`) VALUES
(98, 'Kathleen', 13),
(100, 'cfyycd', 9);

-- --------------------------------------------------------

--
-- Table structure for table `mission`
--

CREATE TABLE `mission` (
  `MISSION_ID` int(11) NOT NULL,
  `MISSION_NAME` varchar(50) NOT NULL,
  `LAUNCH_DATE` date NOT NULL,
  `END_DATE` date NOT NULL,
  `MISSION_TYPE` varchar(50) NOT NULL,
  `CREW_SIZE` int(11) NOT NULL,
  `TARGET_ID` int(11) NOT NULL,
  `ASTRONAUT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mission`
--

INSERT INTO `mission` (`MISSION_ID`, `MISSION_NAME`, `LAUNCH_DATE`, `END_DATE`, `MISSION_TYPE`, `CREW_SIZE`, `TARGET_ID`, `ASTRONAUT_ID`) VALUES
(51, 'A968', '2022-07-07', '2022-07-13', 'week mission', 3, 53, 98);

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE `target` (
  `TARGET_ID` int(11) NOT NULL,
  `TARGET_NAME` varchar(50) NOT NULL,
  `FIRST_MISSION` date NOT NULL,
  `TARGET_TYPE` varchar(50) NOT NULL,
  `NO_OF_MISSION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`TARGET_ID`, `TARGET_NAME`, `FIRST_MISSION`, `TARGET_TYPE`, `NO_OF_MISSION`) VALUES
(53, 'moon', '2022-07-08', 'simple', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `astronaut`
--
ALTER TABLE `astronaut`
  ADD PRIMARY KEY (`ASTRONAUT_ID`);

--
-- Indexes for table `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`MISSION_ID`),
  ADD KEY `target id` (`TARGET_ID`),
  ADD KEY `ASTRONAUT_ID` (`ASTRONAUT_ID`);

--
-- Indexes for table `target`
--
ALTER TABLE `target`
  ADD PRIMARY KEY (`TARGET_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `astronaut`
--
ALTER TABLE `astronaut`
  MODIFY `ASTRONAUT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `mission`
--
ALTER TABLE `mission`
  MODIFY `MISSION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `target`
--
ALTER TABLE `target`
  MODIFY `TARGET_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mission`
--
ALTER TABLE `mission`
  ADD CONSTRAINT `mission_ibfk_2` FOREIGN KEY (`TARGET_ID`) REFERENCES `target` (`TARGET_ID`),
  ADD CONSTRAINT `mission_ibfk_3` FOREIGN KEY (`ASTRONAUT_ID`) REFERENCES `astronaut` (`ASTRONAUT_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
