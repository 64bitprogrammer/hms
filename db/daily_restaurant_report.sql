-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2025 at 09:17 AM
-- Server version: 8.2.0
-- PHP Version: 8.4.5

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
  `id` bigint NOT NULL,
  `date` date NOT NULL,
  `sale_amount` float NOT NULL,
  `purchase_amount` float NOT NULL,
  `voucher_amount` float NOT NULL,
  `credit_bill_amount` float NOT NULL,
  `advance_receipt_amount` float NOT NULL,
  `soiled_notes_amount` float NOT NULL,
  `security_deposit_collected_amount` float NOT NULL,
  `security_deposit_refunded_amount` float NOT NULL,
  `upi_collection_amount` float NOT NULL,
  `swipe_collection_amount` float NOT NULL,
  `petty_cash_amount` float NOT NULL,
  `cash_in_hand_amount` int NOT NULL,
  `opening_reserve_cash_amount` float NOT NULL,
  `closing_reserve_cash_amount` float NOT NULL,
  `cash_in_hand_shortage` float NOT NULL,
  `reserve_cash_shortage` float NOT NULL,
  `note` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Records daily sales report for the restaurant';

--
-- Dumping data for table `daily_restaurant_report`
--

INSERT INTO `daily_restaurant_report` (`id`, `date`, `sale_amount`, `purchase_amount`, `voucher_amount`, `credit_bill_amount`, `advance_receipt_amount`, `soiled_notes_amount`, `security_deposit_collected_amount`, `security_deposit_refunded_amount`, `upi_collection_amount`, `swipe_collection_amount`, `petty_cash_amount`, `cash_in_hand_amount`, `opening_reserve_cash_amount`, `closing_reserve_cash_amount`, `cash_in_hand_shortage`, `reserve_cash_shortage`, `note`, `timestamp`, `created_by_user`) VALUES
(17, '2025-03-31', 132731, 6609, 700, 0, 0, 0, 0, 0, 57439, 0, 8870, 69000, 24000, 22000, -1717, 0, '', '2025-04-14 08:32:45', 1),
(20, '2025-04-01', 106400, 4662, 1948, 0, 0, 0, 0, 0, 37915, 0, 11570, 62500, 20750, 19000, 3325, 1250, '', '2025-04-14 09:10:42', 1),
(22, '2025-04-02', 120479, 5530, 1405, 0, 0, 0, 0, 0, 46413, 0, 11360, 69000, 20000, 18000, 1659, -1000, '', '2025-04-14 09:13:37', 1);

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
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
