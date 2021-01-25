-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 03, 2020 at 03:40 PM
-- Server version: 5.5.68-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql1901368`
--

-- -------------------------------------------------------
--
-- Table structure for table `311_user`
--

CREATE TABLE IF NOT EXISTS `311_user` (
  `userid` int(6) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `311_user`
--

INSERT INTO `311_user` (`userid`, `username`, `email`, `password`, `create_datetime`) VALUES
(10, 'Dylan', 'dylanbaker200@hotmail.co.uk', '$2y$10$kMhItdHxrmqidzuweXFLm.PmauO/7lX.FCx7iqkazAaQjPwgm99ka', '2020-11-05 05:37:05'),
(11, '123', '123@123.123', '$2y$10$PR8abisj/Bklfvpc/410ieLFdHgi2R7BFKynrrS8CiHeMxSJCFVNS', '2020-11-05 14:12:34'),
(12, 'Greg', 'Greg@greg.com', '$2y$10$qrAp6XFxZGWs8qGrTRQuA.tbQSCipMT8X8WEzvgpoDO8UTz7zPmme', '2020-11-08 02:24:32'),
(13, 'testing', 'testing@testing.com', '$2y$10$wOa8XDgy5tBndjE59rYWr.nQ2GPG1uWwcAaVAHhfEPc.bKMfkijAy', '2020-12-03 01:39:11');

--
-- Indexes for dumped table
-- Indexes for table `311_user`
--
ALTER TABLE `311_user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped t
-- AUTO_INCREMENT for table `311_user`
--
ALTER TABLE `311_user`
  MODIFY `userid` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
