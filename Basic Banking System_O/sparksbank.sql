-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 11:44 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparksbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cid` int(11) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `cmail` varchar(30) NOT NULL,
  `cbalance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cid`, `cname`, `cmail`, `cbalance`) VALUES
(1, 'Wilson', 'wilsong05@gmail.com', 9000),
(2, 'Boney', 'boney13@gmail.com', 10000),
(3, 'Hemanth Reddy', 'hemathreddy25@gmail.com', 20000),
(4, 'Aman', 'aman90@gmail.com', 5000),
(5, 'Pratap Reddy', 'prrtapreddy23@gmail.com', 5789.14),
(6, 'Raj Manish', 'rajmanish12@gmail.com', 5165.2),
(7, 'Bharath Kumar', 'bharathkumar@gmail.com', 5500),
(8, 'Sai Krishna', 'saikrishna11@gmail.com', 6590),
(9, 'John Paul', 'johnpaul44@gmail.com', 9200),
(10, 'Vivek Reddy', 'vivekreddy@gmail.com', 7079);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `sno` int(3) NOT NULL,
  `sender` varchar(30) NOT NULL,
  `receiver` varchar(30) NOT NULL,
  `amount` double NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sno`, `sender`, `receiver`, `amount`, `datetime`) VALUES
(1, 'Vivek Reddy', 'John Paul', 100, '2022-12-17 07:14:11'),
(2, 'Hemanth Reddy', 'Boney', 200, '2022-12-17 07:22:17'),
(3, 'Wilson', 'Bharath Kumar', 400, '2022-12-17 08:43:12'),
(4, 'Sai Krishna', 'Aman', 700, '2022-12-17 08:53:18'),
(5, 'Raj Manish', 'Pratap Reddy', 100, '2022-12-17 09:13:37'),
(6, 'Aman', 'Pratap Reddy', 600, '2022-12-17 10:28:14'),
(7, 'Boney', 'Sai Krishna', 400, '2022-12-17 10:39:28'),
(8, 'Bharath Kumar', 'Boney', 600, '2022-12-17 11:41:02'),
(9, 'Hemanth Reddy', 'Raj Manish', 4784, '2022-12-17 11:55:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
