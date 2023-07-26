-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2023 at 09:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `churchdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `church`
--

CREATE TABLE `church` (
  `Church_ID` int(11) NOT NULL,
  `Church_Name` varchar(20) NOT NULL,
  `Contact_number` bigint(20) NOT NULL,
  `Priest_Name` varchar(20) NOT NULL,
  `Area` varchar(10) NOT NULL,
  `City` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `church`
--

INSERT INTO `church` (`Church_ID`, `Church_Name`, `Contact_number`, `Priest_Name`, `Area`, `City`) VALUES
(1001, 'IC church', 7896654123, 'Fr. Joe Pinto', 'Camp', 'Belgaum'),
(1002, 'St. Anthony', 8877442211, 'Fr. Nelson Pinto', 'Camp', 'Belgaum'),
(1003, 'Fatima Cathedral', 7412589632, 'Fr. Peter M', 'Camp', 'Belgaum'),
(1004, 'St. Mary\'s', 9632587412, 'Fr. Joachim P', 'Vadagon', 'Belgaum'),
(1005, 'Mount Carmel Church', 8745963215, 'Fr. Salvadar P', 'Shahpur', 'Belgaum');

-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE `committee` (
  `Committee_ID` int(11) NOT NULL,
  `Committee_Name` varchar(20) NOT NULL,
  `Church_ID` int(11) NOT NULL,
  `Chairman` varchar(20) NOT NULL,
  `Number_of_members` int(11) NOT NULL,
  `Objective` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`Committee_ID`, `Committee_Name`, `Church_ID`, `Chairman`, `Number_of_members`, `Objective`) VALUES
(1101, 'Youth Community', 1005, 'Johnson', 20, 'To unite the youth and conduct fun activities.'),
(1102, 'Apostles Committee', 1001, 'Allan', 17, 'To conduct prayer meetings'),
(1103, 'Pascal Commitee', 1004, 'George', 11, 'A committee that helps the old and aged parishioners. '),
(1104, 'Choir Committee', 1001, 'Savio', 12, 'A committee of all the choir members ');

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE `family` (
  `Family_ID` int(11) NOT NULL,
  `Head_of_family` varchar(20) DEFAULT NULL,
  `Church_support` int(11) DEFAULT NULL,
  `Cemetry_support` int(11) DEFAULT NULL,
  `House_No` varchar(20) DEFAULT NULL,
  `Zonal_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`Family_ID`, `Head_of_family`, `Church_support`, `Cemetry_support`, `House_No`, `Zonal_ID`) VALUES
(18, 'Trevor Dsa ', 18000, 19000, '2635', 26),
(19, 'Wilson Noronha', 25000, 30000, '2910', 25),
(20, 'James Dsouza', 15000, 20000, '7895', 23),
(21, 'Kostas Norang', 30000, 26000, '4125', 26),
(22, 'Baptist Fernandes', 17500, 22100, '9632', 23),
(24, 'Shreyas Salimath', 454, 46464, '965', 25);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `Family_ID` int(11) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Date_of_Birth` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Contact_Number` bigint(20) NOT NULL,
  `Occupation` varchar(20) NOT NULL,
  `Role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`Family_ID`, `First_Name`, `Last_Name`, `Date_of_Birth`, `Gender`, `Contact_Number`, `Occupation`, `Role`) VALUES
(19, 'Wilson', 'Noronha', '04/12/1962', 'Male', 9342442008, 'Private Service', 'Father'),
(19, 'Anita', 'Noronha', '11/07/1974', 'Female', 9620329212, 'Housewife', 'Mother'),
(19, 'Steven', 'Noronha', '11/06/2002', 'Male', 8095918461, 'Student', 'Son'),
(19, 'Elvina', 'Noronha', '04/05/1997', 'Female', 9632221455, 'Job', 'Daughter'),
(19, 'Shirley', 'Noronha', '10/11/1999', 'Female', 8310867255, 'Fashion Designe', 'Daughter'),
(21, 'Kostas', 'Norang', '14/12/1950', 'Male', 9900968824, 'Lawyer', 'Father'),
(21, 'Alice', 'Norang', '16/10/1964', 'Female', 9285632155, 'Teacher', 'Mother'),
(21, 'Kyle', 'Norang', '15/10/1995', 'Male', 7896541235, 'Job', 'Son');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `username`, `password`) VALUES
(1, 'steven', 'steven'),
(2, 'shirley', 'shirley');

-- --------------------------------------------------------

--
-- Table structure for table `zone`
--

CREATE TABLE `zone` (
  `Zonal_ID` int(11) NOT NULL,
  `Zone_Name` varchar(20) NOT NULL,
  `Zonal_Leader` varchar(20) NOT NULL,
  `Pincode` int(11) NOT NULL,
  `Church_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zone`
--

INSERT INTO `zone` (`Zonal_ID`, `Zone_Name`, `Zonal_Leader`, `Pincode`, `Church_ID`) VALUES
(22, 'Sadashiv Nagar', 'Joseph', 590002, 1004),
(23, 'Vaibhav Nagar', 'Ropin', 590004, 1001),
(24, 'Hanuman Nagar', 'Kevin', 590003, 1002),
(25, 'BhagyaNagar', 'Leon', 590001, 1003),
(26, 'KumarSwamy Layout', 'Nelson Pinto', 590010, 1002),
(27, 'Nanawadi', 'Tyler', 590006, 1002);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `church`
--
ALTER TABLE `church`
  ADD PRIMARY KEY (`Church_ID`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
  ADD PRIMARY KEY (`Committee_ID`),
  ADD KEY `Church_ID` (`Church_ID`);

--
-- Indexes for table `family`
--
ALTER TABLE `family`
  ADD PRIMARY KEY (`Family_ID`),
  ADD KEY `Zonal_ID` (`Zonal_ID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD KEY `Family_ID` (`Family_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`Zonal_ID`),
  ADD KEY `Church_ID` (`Church_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `family`
--
ALTER TABLE `family`
  MODIFY `Family_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `committee`
--
ALTER TABLE `committee`
  ADD CONSTRAINT `committee_ibfk_1` FOREIGN KEY (`Church_ID`) REFERENCES `church` (`Church_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `family`
--
ALTER TABLE `family`
  ADD CONSTRAINT `family_ibfk_1` FOREIGN KEY (`Zonal_ID`) REFERENCES `zone` (`Zonal_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `person_ibfk_1` FOREIGN KEY (`Family_ID`) REFERENCES `family` (`Family_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `zone`
--
ALTER TABLE `zone`
  ADD CONSTRAINT `zone_ibfk_1` FOREIGN KEY (`Church_ID`) REFERENCES `church` (`Church_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
