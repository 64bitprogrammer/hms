-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2023 at 08:02 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` bigint(20) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `lop_days` double(10,2) DEFAULT NULL,
  `period_for` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `branch_code` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `branch_name` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `branch_address` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `branch_gstin` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `is_deleted` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch_code`, `branch_name`, `company_id`, `branch_address`, `branch_gstin`, `is_deleted`) VALUES
(1, 'OLD UB', 'Uday Bhuvan', 1, 'Deshmukh Road', '29AAAFU2798R1Z4', 0),
(2, 'UB RK', 'UBs RK Lodge', 1, 'Khanapur Road', '29AAAFU2798R1Z4', 0),
(3, 'NUB', 'New Uday Bhuvan', 2, 'Khanapur Road', NULL, 0),
(4, 'UB Cafe', 'UBs Cafe', 3, 'Hindwadi Road', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_code` varchar(100) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `company_name` varchar(100) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT '-1',
  `is_deleted` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_code`, `company_name`, `created_on`, `created_by`, `is_deleted`) VALUES
(1, 'UB', 'Uday Bhuvan', '2023-07-17 18:50:45', -1, 0),
(2, 'NUB', 'New Uday Bhuvan', '2023-07-17 18:50:45', -1, 0),
(3, 'UBCAFE', 'UB Cafe', '2023-07-17 18:50:45', -1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL COMMENT 'Production, Development, Testing, IT Support',
  `department_short_name` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `designation_name` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL COMMENT 'Sr. Developer, Junior Developer, Intern, Tech Lead, HR Manager',
  `designation_short_name` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `pay_grade_id` int(11) DEFAULT NULL,
  `first_name` text COLLATE utf8_unicode_520_ci NOT NULL,
  `middle_name` text COLLATE utf8_unicode_520_ci,
  `last_name` text COLLATE utf8_unicode_520_ci NOT NULL,
  `given_name` text COLLATE utf8_unicode_520_ci,
  `dob` date DEFAULT NULL,
  `gender` char(1) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `pan` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `aadhar` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `payroll_onboarded_on` int(11) DEFAULT NULL,
  `uan` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `epfo_account_number` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `esic_number` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `joining_date` date DEFAULT '0000-00-00',
  `last_working_day` date DEFAULT '9999-12-31',
  `default_bank_account_id` bigint(20) DEFAULT NULL,
  `default_itr_scheme` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL COMMENT 'old regime/new regime',
  `is_active` smallint(6) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_bank_details`
--

CREATE TABLE `employee_bank_details` (
  `id` bigint(20) NOT NULL,
  `ifsc_code` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `swift_code` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employement_history`
--

CREATE TABLE `employement_history` (
  `id` int(11) NOT NULL,
  `employee_id` bigint(20) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `last_working_day` date DEFAULT NULL,
  `termincation_type` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL COMMENT 'resigned/fired/AWOL',
  `reasonFor_termination` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL COMMENT 'reasoning',
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` bigint(20) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `disbursal_date` date DEFAULT NULL,
  `mode` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL COMMENT 'cash/neft/cheque',
  `transaction_details` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL COMMENT 'utr number/ack',
  `amount` decimal(10,2) DEFAULT NULL,
  `emi` decimal(10,2) DEFAULT NULL,
  `emi_start_date` date DEFAULT NULL,
  `is_emi_active` int(11) DEFAULT NULL COMMENT 'disable emi in order to skip it or put on hold',
  `created_by` int(11) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_transactions`
--

CREATE TABLE `loan_transactions` (
  `id` bigint(20) NOT NULL,
  `loan_id` bigint(20) DEFAULT NULL,
  `txn_date` date DEFAULT NULL,
  `deducted_amount` decimal(10,0) DEFAULT NULL,
  `principal_balance` decimal(10,0) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paygrade`
--

CREATE TABLE `paygrade` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` bigint(20) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `basic` double(10,2) DEFAULT NULL,
  `da` double(10,2) DEFAULT NULL,
  `education_allowance` double(10,2) DEFAULT NULL,
  `hra` double(10,2) DEFAULT NULL,
  `food_deduction` double(10,2) DEFAULT NULL,
  `employee_esic_amount` double(10,2) DEFAULT NULL,
  `employer_esic_amount` double(10,2) DEFAULT NULL,
  `employee_epf_amount` double(10,2) DEFAULT NULL,
  `employer_epf_amount` double(10,2) DEFAULT NULL,
  `gross_salary` double(10,2) DEFAULT NULL,
  `net_salary` double(10,2) DEFAULT NULL,
  `gross_deductions` double(10,2) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `display_name` varchar(100) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_520_ci DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT '-1',
  `is_deleted` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_520_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `display_name`, `password`, `email`, `created_on`, `created_by`, `is_deleted`) VALUES
(1, 'shrikrishna', 'Shrikrishna', 'admin', 'shrikrishna.shanbhag@gmail.com', '2023-07-17 19:02:42', -1, 0),
(2, 'admin', 'Admin', 'Admin', 'admin@gmail.com', '2023-07-17 19:03:23', -1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branch_code` (`branch_code`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_code` (`company_code`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department_name` (`department_name`),
  ADD UNIQUE KEY `department_short_name` (`department_short_name`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designation_name` (`designation_name`),
  ADD UNIQUE KEY `designation_short_name` (`designation_short_name`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `employee_bank_details`
--
ALTER TABLE `employee_bank_details`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `unique_index` (`account_number`,`ifsc_code`);

--
-- Indexes for table `employement_history`
--
ALTER TABLE `employement_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_transactions`
--
ALTER TABLE `loan_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paygrade`
--
ALTER TABLE `paygrade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_bank_details`
--
ALTER TABLE `employee_bank_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employement_history`
--
ALTER TABLE `employement_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_transactions`
--
ALTER TABLE `loan_transactions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paygrade`
--
ALTER TABLE `paygrade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
