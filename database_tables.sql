-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 08, 2021 at 03:29 PM
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
-- Table structure for table `311_`
--

-- CREATE TABLE IF NOT EXISTS `questions` (
  
--   `qno` int(2) NOT NULL,
--   `ans1` varchar(100) NOT NULL,
--   `ans2` varchar(100) NOT NULL,
--   `ans3` varchar(100) NOT NULL,
--   `ans4` varchar(100) NOT NULL,
--   `question` varchar(100) NOT NULL,
--   `correct_ans` varchar(4) NOT NULL
-- ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `311_`
--

-- INSERT INTO `311_questions` (`question`, `qno`, `ans1`, `ans2`, `ans3`, `ans4`, `correct_ans`) VALUES
-- ('whats green', 1, 'blue', 'red', 'green', 'yellow', 'ans3');

-- --------------------------------------------------------

--
-- Table structure for table `311_test_join`
--

-- CREATE TABLE IF NOT EXISTS `test_questions` (
--   `test_id` int(2) NOT NULL,
--   `qno` varchar(200) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `311_test_join`
--

INSERT INTO `311_test_join` (`test_id`, `qno`) VALUES
(1, '1'),
(1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `311_test_meta`
--

CREATE TABLE IF NOT EXISTS `test` (
  `test_id` int(2) NOT NULL,
  `test_name` varchar(50) NOT NULL,
  `test_subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `311_test_meta`
--

-- INSERT INTO `311_test_meta` (`test_id`, `test_name`, `test_subject`) VALUES
-- (1, 'Stuff about colours', 'Colours');

-- --------------------------------------------------------

--
-- Table structure for table `311_user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(6) NOT NULL,
  `user_type` int(1) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `score` int(4) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `311_user`
--

-- INSERT INTO `311_user` (`userid`, `user_type`, `fname`, `lname`, `email`, `password`, `score`, `create_datetime`) VALUES
-- (10, 0, 'Dylan', 'Baker', 'dylanbaker200@hotmail.co.uk', '$2y$10$kMhItdHxrmqidzuweXFLm.PmauO/7lX.FCx7iqkazAaQjPwgm99ka', 0, '2020-11-05 05:37:05'),
-- (11, 0, '123', '123', '123@123.123', '$2y$10$PR8abisj/Bklfvpc/410ieLFdHgi2R7BFKynrrS8CiHeMxSJCFVNS', 0, '2020-11-05 14:12:34'),
-- (12, 0, 'Greg', 'Gregington', 'Greg@greg.com', '$2y$10$qrAp6XFxZGWs8qGrTRQuA.tbQSCipMT8X8WEzvgpoDO8UTz7zPmme', 0, '2020-11-08 02:24:32'),
-- (13, 0, 'Testing', 'Tester', 'testing@testing.com', '$2y$10$wOa8XDgy5tBndjE59rYWr.nQ2GPG1uWwcAaVAHhfEPc.bKMfkijAy', 0, '2020-12-03 01:39:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `311_questions`
--
ALTER TABLE `311_questions`
  ADD PRIMARY KEY (`qno`);

--
-- Indexes for table `311_test_meta`
--
ALTER TABLE `311_test_meta`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `311_user`
--
ALTER TABLE `311_user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `311_`
--
ALTER TABLE `311_questions`
  MODIFY `qno` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `311_user`
--
ALTER TABLE `311_user`
  MODIFY `userid` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
