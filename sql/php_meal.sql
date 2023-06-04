-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 02:56 AM
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
(1, 1, 5, 2, '2023-06-04', 1, '2023-06-04 06:43:37'),
(2, 2, 5, 3.5, '2023-06-04', 1, '2023-06-04 06:43:37'),
(3, 3, 5, 2, '2023-06-04', 1, '2023-06-04 06:43:37'),
(4, 1, 5, 2.5, '2023-06-05', 1, '2023-06-04 06:52:56'),
(5, 2, 5, 1.5, '2023-06-05', 1, '2023-06-04 06:52:56'),
(6, 3, 5, 2, '2023-06-05', 1, '2023-06-04 06:52:56');

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
(5, 'Bachelor', 'Dhaka, Mirpur-11', 'Boys', '2023-05-31 00:47:37');

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
(1, 'Md.Ashanaur Rahman', 'Monitor', '01866936562', 'ashanour009@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 5),
(2, 'Md Rasel ahamed', 'Member', '01866936587', 'rasel@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 5),
(3, 'dami', 'Manager', '01866936562', 'dami@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`meal_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mess_id` (`mess_id`);

--
-- Indexes for table `mess`
--
ALTER TABLE `mess`
  ADD PRIMARY KEY (`mess_id`);

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
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `meal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mess`
--
ALTER TABLE `mess`
  MODIFY `mess_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `meals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `meals_ibfk_2` FOREIGN KEY (`mess_id`) REFERENCES `mess` (`mess_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`mess_id`) REFERENCES `mess` (`mess_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
