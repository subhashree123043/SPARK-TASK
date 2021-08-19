-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 17, 2021 at 11:47 AM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Scraps`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_email` varchar(50) NOT NULL,
  `cust_mob` bigint NOT NULL,
  `cust_addrs` varchar(255) NOT NULL,
  `cust_bank_ballance` double NOT NULL,
  `cust_acc` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_email`, `cust_mob`, `cust_addrs`, `cust_bank_ballance`, `cust_acc`) VALUES
(3, 'subhashree panda', 'subha123@gmail.com', 8079674534, 'india,odisha,bbsr', 21500, 50505568001),
(6, 'roja panda', 'roza123@gmail.com', 7867564534, 'india', 20000, 50505568002),
(7, 'Elie Panda', 'elie123@gmail.com', 8767343211, 'odisha', 10700, 50505568003),
(8, 'Raj Kumar rao', 'raj123@gmail.com', 9876544565, 'India', 327800, 50505568004),
(9, 'Shahrukh Khan', 'srk123@gmail.com', 7656453425, 'india', 400000, 50505568005),
(13, 'Rohit Sharma', 'rohit@gmail.com', 8978675434, 'india', 100000, 50505568006),
(14, 'Virat Koholi', 'virat@gmail.com', 7656894534, 'india', 340000, 50505568007),
(15, 'M.S Dhoni', 'dhoni@gmail.com', 9078675645, 'india', 700000, 50505568008),
(16, 'Anuska sharma', 'anu@gmail.com', 7678234567, 'india', 800000, 50505568009),
(17, 'Karina kapur', 'karina@gmail.com', 8567980900, 'india', 500000, 50505568010);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int NOT NULL,
  `account` bigint NOT NULL,
  `name` varchar(50) NOT NULL,
  `debit_amount` double NOT NULL,
  `credit_amount` double NOT NULL,
  `transfer_details` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `account`, `name`, `debit_amount`, `credit_amount`, `transfer_details`, `date`) VALUES
(4, 50505568001, 'subhashree panda', 0, 700, '700 paid to Elie Panda', '2021-08-16 12:41:08'),
(5, 50505568003, 'Elie Panda', 700, 0, '700 received from subhashree panda', '2021-08-16 12:41:08'),
(6, 50505568001, 'subhashree panda', 0, 7800, '7800 paid to Raj Kumar rao', '2021-08-16 13:25:18'),
(7, 50505568004, 'Raj Kumar rao', 7800, 0, '7800 received from subhashree panda', '2021-08-16 13:25:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
