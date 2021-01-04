-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2021 at 09:21 PM
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
CREATE DATABASE IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mydb`;

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
('ravan', '7d9e209ccdbca70724a5e77062740422', 'revan.sadiqli99@gmail.com', 'male'),
('melih', 'a8cce4049210ef623f61d5efd811ed21', 'melihgunay@mail.com', 'male'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'revan.sadiqli99@gmail.com', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `username` varchar(255) NOT NULL,
  `announcementid` int(40) NOT NULL,
  `message` mediumtext NOT NULL,
  `createddate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(32) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `submitdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `firstname`, `lastname`, `phonenumber`, `subject`, `submitdate`) VALUES
(2, 'John', 'Doe', '+994474567891', 'contact me', '2020-12-26'),
(4, 'John', 'DOE', '+994474567891', 'contact me\r\n', '2020-12-26'),
(5, 'Testfirstname', 'Testlastname', '+9011111111111', 'testtesttesttesttesttesttesttesttesttesttest\r\ntesttesttesttesttesttesttesttesttest\r\ntesttesttesttesttesttesttesttest\r\ntesttesttesttesttesttesttesttest\r\ntesttesttesttesttesttesttest\r\ntesttesttesttesttesttesttest\r\ntesttesttesttest', '2021-01-03'),
(6, 'test1', 'test2', '+912345678901', 'adsadfdsafadsadfdsafadsadfdsafadsadfdsaf\r\nadsadfdsaf\r\nadsadfdsafadsadfdsafadsadfdsafadsadfdsafadsadfdsaf\r\nadsadfdsaf', '2021-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `expensedetails`
--

CREATE TABLE `expensedetails` (
  `expenseid` int(11) NOT NULL,
  `details` text NOT NULL,
  `expenseamount` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expensedetails`
--

INSERT INTO `expensedetails` (`expenseid`, `details`, `expenseamount`, `date`) VALUES
(6, 'maintenance of the elevator', '200tl', '2020-08-10'),
(7, 'cleaning the building entrance', '300 tl', '2020-10-15'),
(8, 'gardening things', '600tl', '2020-11-26'),
(10, 'electricity bill', '400 tl', '2020-12-30'),
(11, 'restoration of some apartments', '15000tl', '2021-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `feestransaction`
--

CREATE TABLE `feestransaction` (
  `feeid` int(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `blocktype` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `apartmentnumber` varchar(255) NOT NULL,
  `totaldebt` int(20) DEFAULT NULL,
  `submitdate` varchar(255) NOT NULL,
  `feedescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feestransaction`
--

INSERT INTO `feestransaction` (`feeid`, `userid`, `username`, `email`, `blocktype`, `phonenumber`, `apartmentnumber`, `totaldebt`, `submitdate`, `feedescription`) VALUES
(37, 17, 'user bir', 'user1@mail.com', 'A', '+9942011111111', '10', 0, '2020-01-19', 'monthly fare'),
(39, 18, 'user iki', 'user2@mail.com', 'A', '+994202222222', '15', 0, '2020-01-19', 'monthly fare'),
(40, 19, 'user uc', 'user3@mail.com', 'A', '+994203333333', '20', 0, '2020-01-19', 'monthly fare'),
(41, 20, 'user dord', 'user4@mail.com', 'A', '+994204444444', '25', 0, '2020-01-19', 'monthly fare'),
(42, 21, 'user bes', 'user5@mail.com', 'A', '+994205555555', '30', 0, '2020-01-19', 'monthly fare'),
(43, 22, 'user alti', 'user6@mail.com', 'A', '+994206666666', '35', 0, '2020-01-19', 'monthly fare'),
(44, 23, 'user yedi', 'user7@mail.com', 'A', '+994207777777', '40', 2400, '2020-01-19', 'monthly fare'),
(48, 17, 'user bir', 'user1@mail.com', 'A', '+9942011111111', '10', 3300, '2021-01-02', 'monthly fare'),
(49, 18, 'user iki', 'user2@mail.com', 'A', '+994202222222', '15', 3300, '2021-01-02', 'monthly fare'),
(50, 19, 'user uc', 'user3@mail.com', 'A', '+994203333333', '20', 3600, '2021-01-02', 'monthly fare'),
(51, 20, 'user dord', 'user4@mail.com', 'A', '+994204444444', '25', 3600, '2021-01-02', 'monthly fare'),
(52, 21, 'user bes', 'user5@mail.com', 'A', '+994205555555', '30', 3600, '2021-01-02', 'monthly fare'),
(54, 22, 'user alti', 'user6@mail.com', 'A', '+994206666666', '35', 3600, '2021-01-02', 'monthly fare'),
(64, 30, 'user sekiz', 'user8@mail.com', 'A', '+994474567891', '13', 2700, '2021-01-12', 'monthly fare');

-- --------------------------------------------------------

--
-- Table structure for table `otherexpenses`
--

CREATE TABLE `otherexpenses` (
  `userid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `blocktype` varchar(255) NOT NULL,
  `apartmentnumber` varchar(255) NOT NULL,
  `totaldebt` varchar(255) NOT NULL,
  `submitdate` date NOT NULL,
  `feedescription` text NOT NULL,
  `feeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otherexpenses`
--

INSERT INTO `otherexpenses` (`userid`, `username`, `email`, `blocktype`, `apartmentnumber`, `totaldebt`, `submitdate`, `feedescription`, `feeid`) VALUES
('30', 'user sekiz', 'user8@mail.com', 'A', '13', '0', '2020-07-01', 'cleaning due', 2),
('30', 'user sekiz', 'user8@mail.com', 'A', 'A', '0', '2021-01-03', 'cleaning due', 3);

-- --------------------------------------------------------

--
-- Table structure for table `otherexpenseshistory`
--

CREATE TABLE `otherexpenseshistory` (
  `transactionid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `paidfee` varchar(255) NOT NULL,
  `submitdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `otherexpenseshistory`
--

INSERT INTO `otherexpenseshistory` (`transactionid`, `username`, `paidfee`, `submitdate`) VALUES
(5, 'user sekiz', '150', '2020-01-01'),
(7, 'user sekiz', '270', '2020-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `totaldebtyear`
--

CREATE TABLE `totaldebtyear` (
  `id` int(11) NOT NULL,
  `totaldebt` int(40) NOT NULL,
  `submitdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `totaldebtyear`
--

INSERT INTO `totaldebtyear` (`id`, `totaldebt`, `submitdate`) VALUES
(6, 2400, '2020-01-19'),
(7, 2400, '2020-01-19'),
(8, 2400, '2020-01-19'),
(9, 2400, '2020-01-19'),
(10, 2400, '2020-01-19'),
(11, 2400, '2020-01-19'),
(12, 2400, '2020-01-19'),
(13, 2400, '2020-01-19'),
(14, 2400, '2020-01-19'),
(15, 2400, '2020-01-19'),
(16, 2400, '2020-01-19'),
(17, 3600, '2021-01-02'),
(18, 3600, '2021-01-02'),
(19, 3600, '2021-01-02'),
(20, 3600, '2021-01-02'),
(21, 3600, '2021-01-02'),
(22, 3600, '2021-01-02'),
(23, 3600, '2021-01-02'),
(24, 3600, '2021-01-02'),
(25, 3600, '2021-01-02'),
(26, 3600, '2021-01-02'),
(27, 3600, '2021-01-02'),
(28, 0, '0000-00-00'),
(29, 0, '0000-00-00'),
(30, 0, '0000-00-00'),
(31, 0, '0000-00-00'),
(32, 2400, '2020-01-19'),
(33, 3600, '2020-01-12');

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
(17, 'user bir', 'fd40f43442b4fd0df64502265e4f5d2d', 'user1@mail.com', 'female', '+9942011111111', 'A', '10', 'profile.jpg', '2013-05-10', 'LIVING', '0000-00-00'),
(18, 'user iki', '30fff78fc494f236d3424dc259fcecf1', 'user2@mail.com', 'male', '+994202222222', 'A', '15', 'profile.jpg', '2014-12-12', 'LIVING', '0000-00-00'),
(19, 'user uc', 'f62479257aa388d77ab36b079949a4fb', 'user3@mail.com', 'male', '+944203333333', 'A', '20', 'profile.jpg', '2019-05-07', 'LIVING', '0000-00-00'),
(20, 'user dord', 'ededb7527da7e54237ecf41d30341b65', 'user4@mail.com', 'male', '+944204444444', 'A', '25', 'profile.jpg', '2016-06-12', 'LIVING', '0000-00-00'),
(21, 'user bes', 'b7c29cd5f7a7faf0aa02bbad4dc1fe0d', 'user5@mail.com', 'female', '+944205555555', 'A', '30', 'profile.jpg', '2015-06-05', 'LIVING', '0000-00-00'),
(22, 'user alti', '821db91996596c516368fdc1e41198ff', 'user6@mail.com', 'male', '+944206666666', 'A', '35', 'profile.jpg', '2013-05-09', 'LIVING', '0000-00-00'),
(28, 'user yedi', 'dfd95590f72459b733001ac51ad5305c', 'user7@mail.com', 'female', '+9944745123456', 'A', '40', 'profile.jpg', '2016-07-12', 'LIVING', '0000-00-00'),
(30, 'user sekiz', 'f4db088dc26b314ee5bb89f7e3aa55ce', 'user8@mail.com', 'male', '+994474567891', 'A', '13', 'profile.jpg', '2015-01-12', 'LIVING', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userhistory`
--

CREATE TABLE `userhistory` (
  `transactionid` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `paidfee` varchar(255) NOT NULL,
  `submitdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userhistory`
--

INSERT INTO `userhistory` (`transactionid`, `username`, `paidfee`, `submitdate`) VALUES
(40, 'user bir', '200', '2020-01-25'),
(41, 'user bir', '200', '2020-02-26'),
(42, 'user bir', '200', '2020-03-26'),
(43, 'user bir', '200', '2020-04-26'),
(44, 'user bir', '200', '2020-05-28'),
(45, 'user bir', '200', '2020-06-29'),
(46, 'user bir', '200', '2020-07-12'),
(47, 'user bir', '200', '2020-08-16'),
(48, 'user bir', '200', '2020-09-11'),
(49, 'user bir', '200', '2020-10-15'),
(60, 'user iki', '200', '2020-01-27'),
(61, 'user iki', '200', '2020-02-12'),
(62, 'user iki', '200', '2020-03-12'),
(63, 'user iki', '200', '2020-04-12'),
(64, 'user iki', '200', '2020-05-12'),
(65, 'user uc', '200', '2020-01-27'),
(66, 'user dord', '200', '2020-01-25'),
(67, 'user dord', '200', '2020-02-25'),
(68, 'user dord', '200', '2020-03-12'),
(69, 'user uc ', '200', '2020-02-12'),
(70, 'user uc ', '200', '2020-03-12'),
(71, 'user uc ', '200', '2020-04-12'),
(72, 'user uc ', '200', '2020-05-12'),
(73, 'user uc ', '200', '2020-06-12'),
(74, 'user bir', '200', '2020-11-12'),
(75, 'user bir', '200', '2020-12-12'),
(76, 'user iki', '200', '2020-06-12'),
(77, 'user iki', '200', '2020-07-14'),
(78, 'user iki', '200', '2020-08-16'),
(79, 'user iki', '200', '2020-09-13'),
(80, 'user iki', '200', '2020-10-12'),
(81, 'user iki', '200', '2020-11-19'),
(82, 'user iki', '200', '2020-12-30'),
(83, 'user uc', '200', '2020-07-12'),
(84, 'user uc', '200', '2020-07-16'),
(85, 'user uc', '200', '2020-09-13'),
(86, 'user uc', '200', '2020-10-10'),
(87, 'user uc', '200', '2020-11-19'),
(88, 'user uc', '200', '2020-12-13'),
(89, 'user dord', '200', '2020-04-12'),
(90, 'user dord', '200', '2020-05-12'),
(91, 'user dord', '200', '2020-06-16'),
(92, 'user dord', '200', '2020-07-12'),
(93, 'user dord', '200', '2020-08-10'),
(94, 'user dord', '200', '2020-09-16'),
(95, 'user dord', '200', '2020-10-13'),
(96, 'user dord', '200', '2020-11-29'),
(97, 'user dord', '200', '2020-12-13'),
(98, 'user bes', '200', '2020-01-25'),
(99, 'user bes', '200', '2020-02-26'),
(100, 'user bes', '200', '2020-03-15'),
(101, 'user bes', '200', '2020-04-19'),
(102, 'user bes', '200', '2020-05-13'),
(103, 'user bes', '200', '2020-06-23'),
(104, 'user bes', '200', '2020-07-29'),
(105, 'user bes', '200', '2020-08-12'),
(106, 'user bes', '200', '2020-09-19'),
(107, 'user bes', '200', '2020-10-09'),
(108, 'user bes', '200', '2020-11-28'),
(109, 'user bes', '200', '2020-12-29'),
(110, 'user alti', '200', '2020-01-25'),
(111, 'user alti', '200', '2020-02-29'),
(112, 'user alti', '200', '2020-03-31'),
(113, 'user alti', '200', '2020-04-17'),
(114, 'user alti', '200', '2020-05-09'),
(115, 'user alti', '200', '2020-07-12'),
(116, 'user alti', '200', '2020-08-16'),
(117, 'user alti', '200', '2020-08-23'),
(118, 'user alti', '200', '2020-09-13'),
(119, 'user alti', '200', '2020-10-10'),
(120, 'user alti', '200', '2020-11-19'),
(121, 'user alti', '200', '2020-12-25'),
(122, 'user iki', '300', '2021-01-01'),
(123, 'user bir', '300', '2021-01-01'),
(124, 'user sekiz', '300', '2020-01-20'),
(125, 'user sekiz', '300', '2020-02-12'),
(126, 'user sekiz', '300', '2020-01-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcementid`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expensedetails`
--
ALTER TABLE `expensedetails`
  ADD PRIMARY KEY (`expenseid`);

--
-- Indexes for table `feestransaction`
--
ALTER TABLE `feestransaction`
  ADD PRIMARY KEY (`feeid`);

--
-- Indexes for table `otherexpenses`
--
ALTER TABLE `otherexpenses`
  ADD PRIMARY KEY (`feeid`);

--
-- Indexes for table `otherexpenseshistory`
--
ALTER TABLE `otherexpenseshistory`
  ADD PRIMARY KEY (`transactionid`);

--
-- Indexes for table `totaldebtyear`
--
ALTER TABLE `totaldebtyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userhistory`
--
ALTER TABLE `userhistory`
  ADD PRIMARY KEY (`transactionid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcementid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expensedetails`
--
ALTER TABLE `expensedetails`
  MODIFY `expenseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `feestransaction`
--
ALTER TABLE `feestransaction`
  MODIFY `feeid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `otherexpenses`
--
ALTER TABLE `otherexpenses`
  MODIFY `feeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `otherexpenseshistory`
--
ALTER TABLE `otherexpenseshistory`
  MODIFY `transactionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `totaldebtyear`
--
ALTER TABLE `totaldebtyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `userhistory`
--
ALTER TABLE `userhistory`
  MODIFY `transactionid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
