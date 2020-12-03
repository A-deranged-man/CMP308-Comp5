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

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `ano` int(10) NOT NULL,
  `qno` int(10) NOT NULL,
  `answer` varchar(400) NOT NULL,
  `userid` int(6) NOT NULL,
  `ddtm` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`ano`, `qno`, `answer`, `userid`, `ddtm`) VALUES
(2, 11, 'You can use include("header.php"); or require("../controller/DBController.php"); ', 12, '2020-11-08 02:29:35'),
(4, 13, 'Yes, you can use py2exe to do this.', 10, '2020-11-08 02:49:37'),
(5, 12, 'You do this using requests.get(URL)', 12, '2020-11-08 02:51:47'),
(6, 10, 'You could do something like $query    = "INSERT into `table` (data1, data2, data3, data4) VALUES (''$variable1'', ''$variable2'', ''$variable3'',''$variable4'')";', 12, '2020-11-08 02:53:54'),
(8, 13, 'I found you can also use pyinstaller for this', 12, '2020-12-02 22:05:30'),
(9, 11, 'I found you can also use "require_once" if you only use it once', 12, '2020-12-02 22:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `qno` int(10) NOT NULL,
  `question` varchar(500) NOT NULL,
  `userid` int(6) NOT NULL,
  `ddtm` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`qno`, `question`, `userid`, `ddtm`) VALUES
(5, 'Test 5', 10, '2020-11-06 06:10:21'),
(7, 'uuuuuuuuuuuu', 10, '2020-11-06 06:10:32'),
(8, 'How do I declare a variable in PHP?', 12, '2020-11-08 02:25:12'),
(9, 'What language are you using for CMP307?', 12, '2020-11-08 02:25:36'),
(10, 'How to you put an SQL statement into a PHP variable?', 10, '2020-11-08 02:26:50'),
(11, 'How do you include another file in PHP?', 10, '2020-11-08 02:27:31'),
(12, 'How do you download information from a website in Python?', 10, '2020-11-08 02:27:56'),
(13, 'Can you compile a Python script into an executable for Windows?', 12, '2020-11-08 02:28:56');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(6) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `email`, `password`, `create_datetime`) VALUES
(10, 'Dylan', 'dylanbaker200@hotmail.co.uk', '$2y$10$kMhItdHxrmqidzuweXFLm.PmauO/7lX.FCx7iqkazAaQjPwgm99ka', '2020-11-05 05:37:05'),
(11, '123', '123@123.123', '$2y$10$PR8abisj/Bklfvpc/410ieLFdHgi2R7BFKynrrS8CiHeMxSJCFVNS', '2020-11-05 14:12:34'),
(12, 'Greg', 'Greg@greg.com', '$2y$10$qrAp6XFxZGWs8qGrTRQuA.tbQSCipMT8X8WEzvgpoDO8UTz7zPmme', '2020-11-08 02:24:32'),
(13, 'testing', 'testing@testing.com', '$2y$10$wOa8XDgy5tBndjE59rYWr.nQ2GPG1uWwcAaVAHhfEPc.bKMfkijAy', '2020-12-03 01:39:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`ano`),
  ADD KEY `answer` (`answer`),
  ADD KEY `qno` (`qno`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qno`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `ano` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `qno` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`qno`) REFERENCES `question` (`qno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
