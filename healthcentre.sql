-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2017 at 10:20 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcentre`
--

-- --------------------------------------------------------

--
-- Table structure for table `hc_appts`
--

CREATE TABLE `hc_appts` (
  `id` int(11) NOT NULL,
  `patientid` int(11) NOT NULL,
  `date` varchar(25) NOT NULL,
  `time` varchar(20) NOT NULL,
  `doctorid` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hc_appts`
--

INSERT INTO `hc_appts` (`id`, `patientid`, `date`, `time`, `doctorid`, `status`) VALUES
(35, 1, '01-01-2017', '09:00', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hc_practitioner`
--

CREATE TABLE `hc_practitioner` (
  `id` int(11) NOT NULL,
  `userid` int(11) UNSIGNED NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hc_practitioner`
--

INSERT INTO `hc_practitioner` (`id`, `userid`, `fname`, `lname`) VALUES
(2, 1, 'Professor', 'Gumptav'),
(15, 33, 'Jonathon', 'Maguire');

-- --------------------------------------------------------

--
-- Table structure for table `hc_profiles`
--

CREATE TABLE `hc_profiles` (
  `id` int(11) NOT NULL,
  `practitioner` int(11) DEFAULT NULL,
  `dob` varchar(25) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `sex` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hc_profiles`
--

INSERT INTO `hc_profiles` (`id`, `practitioner`, `dob`, `name`, `userid`, `address`, `phone`, `sex`) VALUES
(4, 2, '1991-03-12', 'Jonathon Maguire', 1, '72 edge avenue<br>\r\nThornhill', '07471168995', 'male'),
(5, NULL, '1991-03-12', 'Jon', 33, '5 dudley crescent', '07471168995', 'male'),
(9, NULL, '2017-03-09', 'Jonny M', 37, '17', '0122222222', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `hc_records`
--

CREATE TABLE `hc_records` (
  `id` int(11) NOT NULL,
  `patientid` int(11) NOT NULL,
  `appt` varchar(25) NOT NULL,
  `diagnosis` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `doctor` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hc_records`
--

INSERT INTO `hc_records` (`id`, `patientid`, `appt`, `diagnosis`, `date`, `doctor`) VALUES
(1, 1, '10.30', 'Constant sickness reported', '25/25/2017', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Jonathon Maguire', 'jonathonmaguire@g.com', '$2y$10$BWbINKU6zzQjvn0nUhtFb.8J2SKl7VULDIGpcChxg6vPjsbPeaIRK', 1),
(33, 'Jon', 'j2@g2.com', 'testings', 2),
(37, 'Jonny M', 'j@j.com', '$2y$10$pej/YnlLTuJC.NKBsR/XQ.0A4fd7cFl8j9c8sWHtRsL5IWDxjpgoK', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hc_appts`
--
ALTER TABLE `hc_appts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patientid` (`patientid`),
  ADD KEY `doctorid` (`doctorid`);

--
-- Indexes for table `hc_practitioner`
--
ALTER TABLE `hc_practitioner`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `hc_profiles`
--
ALTER TABLE `hc_profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `userid_2` (`userid`),
  ADD KEY `name` (`name`),
  ADD KEY `practitioner` (`practitioner`);

--
-- Indexes for table `hc_records`
--
ALTER TABLE `hc_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patientid` (`patientid`),
  ADD KEY `doctorid` (`doctor`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `name_3` (`name`),
  ADD KEY `doctor` (`role`),
  ADD KEY `name` (`name`),
  ADD KEY `name_2` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hc_appts`
--
ALTER TABLE `hc_appts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `hc_practitioner`
--
ALTER TABLE `hc_practitioner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `hc_profiles`
--
ALTER TABLE `hc_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `hc_records`
--
ALTER TABLE `hc_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hc_appts`
--
ALTER TABLE `hc_appts`
  ADD CONSTRAINT `doctorid` FOREIGN KEY (`doctorid`) REFERENCES `hc_practitioner` (`id`);

--
-- Constraints for table `hc_practitioner`
--
ALTER TABLE `hc_practitioner`
  ADD CONSTRAINT `user` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `hc_profiles`
--
ALTER TABLE `hc_profiles`
  ADD CONSTRAINT `doctor` FOREIGN KEY (`practitioner`) REFERENCES `hc_practitioner` (`id`),
  ADD CONSTRAINT `id` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `name` FOREIGN KEY (`name`) REFERENCES `users` (`name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
