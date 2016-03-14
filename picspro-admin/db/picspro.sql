-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2016 at 01:43 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `picspro`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `email_address` varchar(25) NOT NULL,
  `member_type` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `middlename` varchar(25) NOT NULL,
  `birthday` varchar(25) NOT NULL,
  `placeofbirth` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_address` varchar(100) NOT NULL,
  `position` varchar(25) NOT NULL,
  `residence_address` varchar(100) NOT NULL,
  `mobile_number` varchar(25) NOT NULL,
  `specialization` text NOT NULL,
  `membership_other` varchar(50) NOT NULL,
  `date_registration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`email_address`, `member_type`, `gender`, `lastname`, `firstname`, `middlename`, `birthday`, `placeofbirth`, `company_name`, `company_address`, `position`, `residence_address`, `mobile_number`, `specialization`, `membership_other`, `date_registration`) VALUES
('fr4nc1stein@gmail.com', 'new', 'Male', 'Victoriano', 'Francis', 'Alejandro', '2016-03-14', 'Tombokon Mem. Hospital', 'Marvericks', 'Lapaz', 'Senior Dev', 'Altavas Aklan', '9107224694', '1', '1', '2016-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fname`, `lname`, `user_type`) VALUES
(20, 'projectag', '44f1960d62388e0b67cf88b41e0879df42a6273db0d885ac44e08cf01afa3abfd992cb792dcee8803effd91f07ac4b534ba71b7bc1d17bd569a1911dffdf7714', 'Francis', 'Victoriano', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`email_address`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
