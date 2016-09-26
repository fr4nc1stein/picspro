-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2016 at 08:09 AM
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
('fr4nc1stein@gmail.com', 'new', 'Male', 'Victoriano', 'Francis', 'Alejandro', '2016-03-14', 'Tombokon Mem. Hospital', 'Marvericks', 'Lapaz', 'Senior Dev', 'Altavas Aklan', '9107224694', '1', '1', '2016-03-13'),
('icodexh@gmail.com', 'old', 'Male', 'Tein', 'Francis', 'Alejandro', '1992-07-15', 'Ginictan', 'Mavericks', 'General Luna', 'Sys Ad', 'Desin Street', '09107224695', 'Development', 'AG', '2016-09-21');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fname`, `lname`, `user_type`) VALUES
(20, 'projectag', 'b27ab5c5d0da9adf7f3a75c4d21959e59551d57a4ff17b47c41b793c689cad485a68304217fab305de77035015161d97afb3dea6027ce9c0d9f89d7eed50fd2c', 'Francis', 'Victoriano', ''),
(21, 'projectag', 'projectag', 'Francis', 'Victoriano', '');

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
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
