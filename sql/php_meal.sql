-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2023 at 03:07 PM
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

--
-- Dumping data for table `bazer_cost`
--

INSERT INTO `bazer_cost` (`bazer_id`, `user_id`, `mess_id`, `bazer_amount`, `bazer_description`, `bazer_date`, `created_by`, `created_at`) VALUES
(2, 9, 9, 1000, 'rice', '2023-06-04', 8, '2023-06-05 03:14:36');

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

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`meal_id`, `user_id`, `mess_id`, `meal`, `meal_date`, `created_by`, `created_at`) VALUES
(7, 8, 9, 1.5, '2023-06-04', 8, '2023-06-05 03:14:12'),
(8, 9, 9, 2, '2023-06-04', 8, '2023-06-05 03:14:12');

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

--
-- Dumping data for table `member_money`
--

INSERT INTO `member_money` (`id`, `user_id`, `mess_id`, `money`, `pay_date`, `created_by`, `created_at`) VALUES
(3, 8, 9, 1500, '2023-06-04', 8, '2023-06-05 03:14:53');

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

--
-- Dumping data for table `mess`
--

INSERT INTO `mess` (`mess_id`, `mess_name`, `mess_address`, `mess_type`, `mess_createdAt`) VALUES
(8, 'Team8', 'Dhaka,Mirpur-11', 'Boys', '2023-06-05 01:53:03'),
(9, 'Jakkas', 'Mirpur-10', 'Boys', '2023-06-05 03:08:25');

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

--
-- Dumping data for table `month_details`
--

INSERT INTO `month_details` (`month_id`, `mess_id`, `month_name`, `start_date`, `end_date`, `status`, `created_by`, `created_at`) VALUES
(1, 8, 'June', '2023-06-04', '2023-06-05', 1, 6, '2023-06-05 01:53:03'),
(2, 9, NULL, '2023-06-04', NULL, 0, 8, '2023-06-05 03:08:25'),
(6, 8, NULL, '2023-06-05', NULL, 0, 0, '2023-06-05 17:43:36');

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

--
-- Dumping data for table `month_report`
--

INSERT INTO `month_report` (`report_id`, `user_name`, `meal_rate`, `total_meal`, `total_cost`, `deposit_amount`, `balance`, `month_id`, `paid_status`, `created_by`, `created_at`) VALUES
(1, 'Md.Ashanaur Rahman', 75, 7.5, 562.5, 2500, 1937.5, 1, 1, 'Md.Ashanaur Rahman', '2023-06-05 17:43:36'),
(2, 'Md Rasel ahamed', 75, 8.5, 637.5, 2000, 1362.5, 1, 0, 'Md.Ashanaur Rahman', '2023-06-05 17:43:36');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_role`, `user_mobile`, `user_email`, `user_password`, `mess_id`) VALUES
(6, 'Md.Ashanaur Rahman', 'Monitor', '01866936562', 'ashanour009@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 8),
(7, 'Md Rasel ahamed', 'Manager', '01866936587', 'rasel@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 8),
(8, 'Md Sagor Mia', 'Monitor', '01866936500', 'sagor@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 9),
(9, 'Md Ruhul', 'Manager', '01866936511', 'ruhul@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 9);

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
  MODIFY `bazer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `meal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `member_money`
--
ALTER TABLE `member_money`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `other_cost`
--
ALTER TABLE `other_cost`
  MODIFY `other_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
