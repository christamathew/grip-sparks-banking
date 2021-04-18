-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 18, 2021 at 10:59 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spx_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` char(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `account_no` int(11) NOT NULL,
  `ifsc` varchar(11) NOT NULL,
  `balance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `account_no`, `ifsc`, `balance`) VALUES
(10123, 'Ashwin A', 'ashwin@zmail.com', 2049698378, 'SPXB0003467', 45500),
(10157, 'Shreeya Anand', 'shreeya.a@ymail.com', 1357869086, 'SPXG0003890', 182450),
(12345, 'Christa', 'chris.m@ymail.com', 1234567890, 'SPXB0001233', 12050),
(18907, 'Stefy Luke', 'stefy@ymail.com', 1456789203, 'SPXB0003488', 50000),
(134576, 'Riyaz', 'riyaz.r@gmail.com', 456798978, 'SPXG0003590', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `sender_name` char(20) NOT NULL,
  `sender_ac_no` int(11) NOT NULL,
  `receiver_name` char(20) NOT NULL,
  `receiver_ac_no` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`sender_name`, `sender_ac_no`, `receiver_name`, `receiver_ac_no`, `amount`, `date_time`) VALUES
('Ashwin A', 2049698378, 'Shreeya Anand', 1357869086, 800, '2021-04-17 15:21:01'),
('Ashwin A', 2049698378, 'Christa', 1234567890, 500, '2021-04-18 00:52:22'),
('Ashwin A', 2049698378, 'Shreeya Anand', 1357869086, 600, '2021-04-18 01:40:56'),
('Ashwin A', 2049698378, 'Christa', 1234567890, 500, '2021-04-18 01:42:01'),
('Ashwin A', 2049698378, 'Christa', 1234567890, 400, '2021-04-18 11:29:52'),
('Ashwin A', 2049698378, 'Christa', 1234567890, 100, '2021-04-18 13:38:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
