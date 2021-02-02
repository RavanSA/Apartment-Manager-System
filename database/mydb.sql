-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2021 at 07:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `email`, `gender`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'revan.sadiqli99@gmail.com', 'male'),
('melih', 'a8cce4049210ef623f61d5efd811ed21', 'melihgunay@mail.com', 'male'),
('ravan', '7d9e209ccdbca70724a5e77062740422', 'revan.sadiqli99@gmail.com', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `username` varchar(255) DEFAULT NULL,
  `announcementid` int(40) NOT NULL,
  `message` mediumtext NOT NULL,
  `sentto` varchar(255) NOT NULL DEFAULT 'everyone',
  `createddate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`username`, `announcementid`, `message`, `sentto`, `createddate`) VALUES
('NULL', 45, 'pay your due', 'everyone', '2021-01-31'),
('admin', 65, 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd', 'user bir', '2021-01-31'),
('admin', 66, 'asdasdasdasdadasdasd', 'user bir', '2021-01-31'),
('admin', 67, 'new message', 'user bir', '2021-01-31'),
('admin', 68, 'asdasdasasdasdadasasdasdasasdasdadasasdasdasasdasdadasasdasdasasdasdadasasdasdasasdasdadasasdasdasasdasdadasasdasdasasdasdadas', 'user bir', '2021-01-31'),
('admin', 69, 'dasdasdasddasdasdasddasdasdasddasdasdasddasdasdasddasdasdasddasdasdasddasdasdasd', 'user bir', '2021-01-31'),
('NULL', 72, 'pay your due', 'everyone', '2021-01-31'),
('admin', 73, 'ı have a problem', 'user iki', '2021-01-31'),
('user yedi', 74, 'pay your due', 'private', '2021-01-31'),
('user uc', 75, 'pay yourafsadfsadf', 'private', '2021-01-31'),
('user iki', 76, 'asasdasd', 'private', '2021-01-31'),
('admin', 77, 'asfsdafsadfsadf', 'user bir', '2021-01-31'),
('NULL', 78, 'dassdasdasdasd', 'everyone', '2021-01-31'),
('NULL', 79, 'hjhjhjhhjh', 'everyone', '2021-02-01'),
('admin', 81, 'mkjkjkjkjkk', 'user bir', '2021-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `msgid` int(32) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `submitdate` date NOT NULL,
  `seenby` varchar(255) NOT NULL DEFAULT 'ravan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`msgid`, `firstname`, `lastname`, `phonenumber`, `subject`, `submitdate`, `seenby`) VALUES
(2, 'John', 'Doe', '+994474567891', 'contact me', '2020-12-26', 'admin'),
(4, 'John', 'DOE', '+994474567891', 'contact me\r\n', '2020-12-26', 'admin'),
(5, 'Testfirstname', 'Testlastname', '+9011111111111', 'testtesttesttesttesttesttesttesttesttesttest\r\ntesttesttesttesttesttesttesttesttest\r\ntesttesttesttesttesttesttesttest\r\ntesttesttesttesttesttesttesttest\r\ntesttesttesttesttesttesttest\r\ntesttesttesttesttesttesttest\r\ntesttesttesttest', '2021-01-03', 'admin'),
(6, 'test1', 'test2', '+912345678901', 'adsadfdsafadsadfdsafadsadfdsafadsadfdsaf\r\nadsadfdsaf\r\nadsadfdsafadsadfdsafadsadfdsafadsadfdsafadsadfdsaf\r\nadsadfdsaf', '2021-01-03', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `expensedetails`
--

CREATE TABLE `expensedetails` (
  `expenseid` int(11) NOT NULL,
  `details` varchar(30) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `addedby` varchar(255) NOT NULL,
  `expensesdate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expensedetails`
--

INSERT INTO `expensedetails` (`expenseid`, `details`, `amount`, `addedby`, `expensesdate`) VALUES
(14, 'cleaning entrancecle', '100 ', 'ravan', '2021-01-01'),
(15, 'hghjgg', '200', 'ravan', '2020-01-01'),
(16, 'sadfsadf', '500', 'ravan', '2021-01-01'),
(17, 'asasdad', '100', 'ravan', '2020-01-01'),
(18, 'adwqef', '100', 'ravan', '2021-01-01'),
(19, 'asdasd', '300', 'ravan', '2021-01-01'),
(20, 'asdasd', '600', 'ravan', '2021-01-01'),
(21, 'asdasd', '700', 'ravan', '2021-01-01'),
(22, 'asdasd', '100', 'ravan', '2021-02-01'),
(23, 'qassd', '100', 'ravan', '2021-02-01'),
(24, 'asdasd', '100', 'ravan', '2021-02-01'),
(25, 'asdasd', '100', 'ravan', '2021-02-01'),
(26, 'asdadsd', '100', 'ravan', '2021-02-01'),
(40, 'same', '100', 'ravan', '2021-01-01'),
(41, 'same', '100', 'ravan', '2021-01-01'),
(42, 'asfasdasdasdasda', '300', 'ravan', '2021-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `feestransaction`
--

CREATE TABLE `feestransaction` (
  `feeid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `monthlydue` varchar(255) NOT NULL,
  `paidamount` varchar(255) NOT NULL DEFAULT '0',
  `submitdate` date NOT NULL,
  `ispay` varchar(255) NOT NULL DEFAULT 'NOT PAID',
  `paiddate` date DEFAULT NULL,
  `feedescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feestransaction`
--

INSERT INTO `feestransaction` (`feeid`, `userid`, `monthlydue`, `paidamount`, `submitdate`, `ispay`, `paiddate`, `feedescription`) VALUES
(195, 17, '0', '300', '2021-01-01', 'PAID', '2021-01-28', 'monthly due'),
(196, 18, '0', '300', '2021-01-01', 'PAID', '2021-01-30', 'monthly due'),
(197, 19, '0', '300', '2021-01-01', 'PAID', '2021-01-31', 'monthly due'),
(198, 20, '300', '0', '2021-01-01', 'NOT PAID', NULL, 'monthly due'),
(199, 21, '300', '0', '2021-01-01', 'NOT PAID', NULL, 'monthly due'),
(240, 17, '0', '350', '2021-02-01', 'PAID', '2021-01-31', 'monthly due'),
(241, 18, '350', '0', '2021-02-01', 'NOT PAID', NULL, 'monthly due'),
(242, 19, '350', '0', '2021-02-01', 'NOT PAID', NULL, 'monthly due'),
(243, 21, '350', '0', '2021-02-01', 'NOT PAID', NULL, 'monthly due'),
(244, 17, '0', '300', '2021-03-01', 'PAID', '2021-01-31', 'monthly due'),
(245, 18, '300', '0', '2021-03-01', 'NOT PAID', NULL, 'monthly due'),
(246, 19, '300', '0', '2021-03-01', 'NOT PAID', NULL, 'monthly due'),
(247, 21, '300', '0', '2021-03-01', 'NOT PAID', NULL, 'monthly due');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `blocktype` varchar(255) NOT NULL,
  `apartmentnumber` varchar(255) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `dstart` varchar(255) DEFAULT NULL,
  `ifmoved` varchar(9) NOT NULL DEFAULT 'LIVING',
  `moveddate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `gender`, `phonenumber`, `blocktype`, `apartmentnumber`, `pic`, `dstart`, `ifmoved`, `moveddate`) VALUES
(17, 'user bir', 'fd40f43442b4fd0df64502265e4f5d2d', 'user1@mail.com', 'female', '+9942011111111', 'A', '10', 'profile.jpg', '2013-05-10', 'LIVING', NULL),
(18, 'user iki', '30fff78fc494f236d3424dc259fcecf1', 'user2@mail.com', 'male', '+994202222222', 'A', '15', 'profile2.jpg', '2014-12-12', 'LIVING', NULL),
(19, 'user uc', 'f62479257aa388d77ab36b079949a4fb', 'user3@mail.com', 'male', '+944203333333', 'A', '20', 'profile.jpg', '2019-05-07', 'LIVING', NULL),
(20, 'user dord', 'ededb7527da7e54237ecf41d30341b65', 'user4@mail.com', 'male', '+944204444444', 'A', '25', 'profile.jpg', '2016-06-12', 'LIVING', '2021-01-17'),
(21, 'user bes', 'b7c29cd5f7a7faf0aa02bbad4dc1fe0d', 'user5@mail.com', 'female', '+944205555555', 'A', '30', 'profile.jpg', '2015-06-05', 'LIVING', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcementid`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`msgid`),
  ADD KEY `seenby` (`seenby`);

--
-- Indexes for table `expensedetails`
--
ALTER TABLE `expensedetails`
  ADD PRIMARY KEY (`expenseid`),
  ADD KEY `addedby` (`addedby`);

--
-- Indexes for table `feestransaction`
--
ALTER TABLE `feestransaction`
  ADD PRIMARY KEY (`feeid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcementid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `msgid` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expensedetails`
--
ALTER TABLE `expensedetails`
  MODIFY `expenseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `feestransaction`
--
ALTER TABLE `feestransaction`
  MODIFY `feeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contactus`
--
ALTER TABLE `contactus`
  ADD CONSTRAINT `contactus_ibfk_1` FOREIGN KEY (`seenby`) REFERENCES `admin` (`username`);

--
-- Constraints for table `expensedetails`
--
ALTER TABLE `expensedetails`
  ADD CONSTRAINT `expensedetails_ibfk_1` FOREIGN KEY (`addedby`) REFERENCES `admin` (`username`);

--
-- Constraints for table `feestransaction`
--
ALTER TABLE `feestransaction`
  ADD CONSTRAINT `feestransaction_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
