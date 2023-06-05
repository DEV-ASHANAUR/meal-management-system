-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 11:38 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_meal`
--

-- --------------------------------------------------------

--
-- Table structure for table `bazer_cost`
--

CREATE TABLE `bazer_cost` (
  `bazer_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mess_id` int(11) DEFAULT NULL,
  `bazer_amount` int(11) DEFAULT NULL,
  `bazer_description` longtext DEFAULT NULL,
  `bazer_date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `meal_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mess_id` int(11) DEFAULT NULL,
  `meal` double DEFAULT NULL,
  `meal_date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_money`
--

CREATE TABLE `member_money` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mess_id` int(11) DEFAULT NULL,
  `money` double NOT NULL,
  `pay_date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mess`
--

CREATE TABLE `mess` (
  `mess_id` int(11) NOT NULL,
  `mess_name` varchar(255) NOT NULL,
  `mess_address` varchar(255) NOT NULL,
  `mess_type` varchar(255) DEFAULT NULL,
  `mess_createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `month_details`
--

CREATE TABLE `month_details` (
  `month_id` int(11) NOT NULL,
  `mess_id` int(11) DEFAULT NULL,
  `month_name` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` int(11) DEFAULT 0 COMMENT 'complete = 1',
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `month_report`
--

CREATE TABLE `month_report` (
  `report_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `meal_rate` double DEFAULT NULL,
  `total_meal` double DEFAULT NULL,
  `total_cost` double DEFAULT NULL,
  `deposit_amount` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `month_id` int(11) DEFAULT NULL,
  `paid_status` int(11) NOT NULL DEFAULT 0 COMMENT 'paid = 1,unpaid = 0',
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_cost`
--

CREATE TABLE `other_cost` (
  `other_id` int(11) NOT NULL,
  `other_amount` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mess_id` int(11) DEFAULT NULL,
  `other_description` longtext DEFAULT NULL,
  `other_date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL DEFAULT 'member',
  `user_mobile` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) NOT NULL,
  `mess_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bazer_cost`
--
ALTER TABLE `bazer_cost`
  ADD PRIMARY KEY (`bazer_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mess_id` (`mess_id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`meal_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mess_id` (`mess_id`);

--
-- Indexes for table `member_money`
--
ALTER TABLE `member_money`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mess_id` (`mess_id`);

--
-- Indexes for table `mess`
--
ALTER TABLE `mess`
  ADD PRIMARY KEY (`mess_id`);

--
-- Indexes for table `month_details`
--
ALTER TABLE `month_details`
  ADD PRIMARY KEY (`month_id`),
  ADD KEY `mess_id` (`mess_id`);

--
-- Indexes for table `month_report`
--
ALTER TABLE `month_report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `month_id` (`month_id`);

--
-- Indexes for table `other_cost`
--
ALTER TABLE `other_cost`
  ADD PRIMARY KEY (`other_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mess_id` (`mess_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `mess_id` (`mess_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bazer_cost`
--
ALTER TABLE `bazer_cost`
  MODIFY `bazer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `meal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_money`
--
ALTER TABLE `member_money`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mess`
--
ALTER TABLE `mess`
  MODIFY `mess_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `month_details`
--
ALTER TABLE `month_details`
  MODIFY `month_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `month_report`
--
ALTER TABLE `month_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_cost`
--
ALTER TABLE `other_cost`
  MODIFY `other_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bazer_cost`
--
ALTER TABLE `bazer_cost`
  ADD CONSTRAINT `bazer_cost_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `bazer_cost_ibfk_2` FOREIGN KEY (`mess_id`) REFERENCES `mess` (`mess_id`);

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `meals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `meals_ibfk_2` FOREIGN KEY (`mess_id`) REFERENCES `mess` (`mess_id`);

--
-- Constraints for table `member_money`
--
ALTER TABLE `member_money`
  ADD CONSTRAINT `member_money_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `member_money_ibfk_2` FOREIGN KEY (`mess_id`) REFERENCES `mess` (`mess_id`);

--
-- Constraints for table `month_details`
--
ALTER TABLE `month_details`
  ADD CONSTRAINT `month_details_ibfk_1` FOREIGN KEY (`mess_id`) REFERENCES `mess` (`mess_id`);

--
-- Constraints for table `month_report`
--
ALTER TABLE `month_report`
  ADD CONSTRAINT `month_report_ibfk_1` FOREIGN KEY (`month_id`) REFERENCES `month_details` (`month_id`);

--
-- Constraints for table `other_cost`
--
ALTER TABLE `other_cost`
  ADD CONSTRAINT `other_cost_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `other_cost_ibfk_2` FOREIGN KEY (`mess_id`) REFERENCES `mess` (`mess_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`mess_id`) REFERENCES `mess` (`mess_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
