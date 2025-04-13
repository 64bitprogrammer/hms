-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2025 at 04:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_restaurant_report`
--

CREATE TABLE `daily_restaurant_report` (
  `id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `sale_amount` float NOT NULL,
  `purchase_amount` float NOT NULL,
  `voucher_amount` float NOT NULL,
  `credit_bill_amount` float NOT NULL,
  `security_deposit_collected_amount` float NOT NULL,
  `security_deposit_refunded_amount` float NOT NULL,
  `upi_collection_amount` float NOT NULL,
  `swipe_collection_amount` float NOT NULL,
  `petty_cash_amount` float NOT NULL,
  `cash_in_hand_amount` int(11) NOT NULL,
  `opening_reserve_cash_amount` float NOT NULL,
  `closing_reserve_cash_amount` float NOT NULL,
  `cash_in_hand_shortage` float NOT NULL,
  `reserve_cash_shortage` float NOT NULL,
  `note` varchar(150) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Records daily sales report for the restaurant';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_restaurant_report`
--
ALTER TABLE `daily_restaurant_report`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `report date is unique` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daily_restaurant_report`
--
ALTER TABLE `daily_restaurant_report`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
