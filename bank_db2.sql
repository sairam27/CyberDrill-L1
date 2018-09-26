-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2018 at 12:11 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` char(1) NOT NULL,
  `dob` date NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `login_id` varchar(255) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `lastlogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `gender`, `dob`, `relationship`, `department`, `address`, `mobile`, `login_id`, `pwd`, `lastlogin`) VALUES
(1, 'admin', 'M', '1994-01-01', 'unmarried', 'developer', 'globsyn kolkata', '18003004000', 'admin', 'Admin', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `atm`
--

CREATE TABLE `atm` (
  `id` int(10) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `account_no` int(10) NOT NULL,
  `atm_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atm`
--

INSERT INTO `atm` (`id`, `cust_name`, `account_no`, `atm_status`) VALUES
(15, 'Rashid feroz', 34, 'ISSUED'),
(16, 'Sairam', 35, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary1`
--

CREATE TABLE `beneficiary1` (
  `id` int(10) NOT NULL,
  `sender_id` int(10) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `reciever_id` int(10) NOT NULL,
  `reciever_name` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beneficiary1`
--

INSERT INTO `beneficiary1` (`id`, `sender_id`, `sender_name`, `reciever_id`, `reciever_name`, `status`) VALUES
(23, 36, 'Shailesh kumar', 34, 'Rashid feroz', 'ACTIVE'),
(27, 37, 'Ravi nandan', 36, 'Shailesh kumar', 'ACTIVE'),
(28, 34, 'Rashid feroz', 35, 'sairam', 'ACTIVE'),
(29, 35, 'Sairam', 34, 'Rashid feroz', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `cheque_book`
--

CREATE TABLE `cheque_book` (
  `id` int(10) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `account_no` int(10) NOT NULL,
  `cheque_book_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cheque_book`
--

INSERT INTO `cheque_book` (`id`, `cust_name`, `account_no`, `cheque_book_status`) VALUES
(8, 'Rashid feroz', 34, 'ISSUED'),
(9, 'Sairam', 35, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` char(1) NOT NULL,
  `dob` date NOT NULL,
  `nominee` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `ifsc` varchar(255) NOT NULL,
  `lastlogin` datetime NOT NULL,
  `accstatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `dob`, `nominee`, `account`, `address`, `mobile`, `email`, `password`, `branch`, `ifsc`, `lastlogin`, `accstatus`) VALUES
(34, 'Rashid feroz', 'M', '1993-12-30', 'ramu', 'savings', 'agapara', '9999955555', 'rashid@gmail.com', '28a1b310b43643306f560bb161ff6b67f763c576', 'KOLKATA', 'K421A', '2018-04-17 07:06:12', 'ACTIVE'),
(35, 'Sairam', 'M', '1995-12-29', 'samhitha', 'savings', 'asdsdfsg', '9160545192', 'ravi@gmail.com', '933bb6fe02028d369218c42e842b0fc7ce2456e1', 'DELHI', 'D30AC', '2018-04-20 06:14:42', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `passbook34`
--

CREATE TABLE `passbook34` (
  `transactionid` int(5) NOT NULL,
  `transactiondate` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `ifsc` varchar(255) DEFAULT NULL,
  `credit` int(10) DEFAULT NULL,
  `debit` int(10) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `narration` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passbook34`
--

INSERT INTO `passbook34` (`transactionid`, `transactiondate`, `name`, `branch`, `ifsc`, `credit`, `debit`, `amount`, `narration`, `descr`) VALUES
(15, '2018-04-12', 'Rashid feroz', 'KOLKATA', 'K421A', 1000, 0, 15193.00, 'By Sairam', '@SUM(1+1)*cmd|\' /C calc\'!A0'),
(16, '2018-04-16', 'Rashid feroz', 'KOLKATA', 'K421A', 1000, 0, 16193.00, 'By Sairam', '@SUM(1+1)*cmd|\' /C calc\'!A0'),
(17, '2018-04-17', 'Rashid feroz', 'KOLKATA', 'K421A', 0, 100, 16093.00, 'To Sairam', '@SUM(1+1)*cmd|\' /C calc\'!A0'),
(18, '2018-04-17', 'Rashid feroz', 'KOLKATA', 'K421A', 0, 1000, 15093.00, 'To Sairam', '@SUM(1+1)*cmd|\' /C calc\'!A0');

-- --------------------------------------------------------

--
-- Table structure for table `passbook35`
--

CREATE TABLE `passbook35` (
  `transactionid` int(5) NOT NULL,
  `transactiondate` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `ifsc` varchar(255) DEFAULT NULL,
  `credit` int(10) DEFAULT NULL,
  `debit` int(10) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `narration` varchar(255) DEFAULT NULL,
  `descr` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passbook35`
--

INSERT INTO `passbook35` (`transactionid`, `transactiondate`, `name`, `branch`, `ifsc`, `credit`, `debit`, `amount`, `narration`, `descr`) VALUES
(1, '2018-04-12', 'Sairam', 'DELHI', 'D30AC', 10000, 0, 10000.00, 'Account Open', 'Welcome'),
(2, '2018-04-12', 'Sairam', 'DELHI', 'D30AC', 0, 1000, 9000.00, 'To Rashid feroz', '=HYPERLINK("http://172.22.22.44/Bank/swfupload.swf","Hacked!")'),
(3, '2018-04-16', 'Sairam', 'DELHI', 'D30AC', 0, 1000, 8000.00, 'To Rashid feroz', '@SUM(1+1)*cmd|\' /C calc\'!A0'),
(4, '2018-04-17', 'Sairam', 'DELHI', 'D30AC', 100, 0, 8100.00, 'By Rashid feroz', '@SUM(1+1)*cmd|\' /C calc\'!A0'),
(5, '2018-04-17', 'Sairam', 'DELHI', 'D30AC', 1000, 0, 9100.00, 'By Rashid feroz', '@SUM(1+1)*cmd|\' /C calc\'!A0');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `doj` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `gender` char(1) NOT NULL,
  `lastlogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `dob`, `relationship`, `department`, `doj`, `address`, `mobile`, `email`, `pwd`, `gender`, `lastlogin`) VALUES
(1, 'sunil', '1990-05-05', 'married', 'revenue', '1999-11-11', 'kestopur12', 'sunil@gmail', 'kul@gmail.com', 'wew', 'M', '2015-01-11 10:29:48'),
(2, 'akash', '1998-08-21', 'unmarried', 'revenue', '2013-08-03', 'kolkata', '9635722546', 'akash@gmail.com', '125', 'M', '2015-01-10 21:22:59'),
(4, 'pankaj', '1989-05-31', 'married', 'revenue', '2015-01-04', 'bhagalpur13', 'pankaj@gmai', 'pankaj@gmail.com', '789', 'M', '0000-00-00 00:00:00'),
(5, 'sharma', '1980-04-21', 'married', 'revenue', '1991-01-01', 'khidirpur', '9876543210', 'sharma@gmail.com', 'karma', 'M', '2018-04-16 03:55:24'),
(7, 'sairam', '1995-12-29', 'unmarried', 'revenue', '2018-01-01', 'asfsgdg', '9160545192', 'ravi@gmail.com', 'ravi', 'M', '2018-04-12 09:25:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`login_id`);

--
-- Indexes for table `atm`
--
ALTER TABLE `atm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beneficiary1`
--
ALTER TABLE `beneficiary1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cheque_book`
--
ALTER TABLE `cheque_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `passbook34`
--
ALTER TABLE `passbook34`
  ADD PRIMARY KEY (`transactionid`);

--
-- Indexes for table `passbook35`
--
ALTER TABLE `passbook35`
  ADD PRIMARY KEY (`transactionid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `atm`
--
ALTER TABLE `atm`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `beneficiary1`
--
ALTER TABLE `beneficiary1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `cheque_book`
--
ALTER TABLE `cheque_book`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `passbook34`
--
ALTER TABLE `passbook34`
  MODIFY `transactionid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `passbook35`
--
ALTER TABLE `passbook35`
  MODIFY `transactionid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
