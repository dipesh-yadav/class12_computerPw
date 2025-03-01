-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2025 at 08:16 PM
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
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `seller` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_name`, `image`, `seller`, `price`, `description`, `quantity`) VALUES
(3, 5, 'SINGLE SHAFT BO-GEAR MOTOR', 'single shaft bo motor.jpg', 'MOTOR Hub Sellers Pvt. Ltd.', 945.99, 'Single Shaft BO-Gear Motor with High Torque, Low Power Consumption, and Smooth Performance.', 3),
(38, 1, 'SILICON WIRE 3 FEET', 'silicon wire 3ft.jpg', 'WIRE Hub Sellers Pvt. Ltd.', 200.99, 'Premium-Quality 3-Foot Silicone Wire with High Flexibility, Heat Resistance, and Low Electrical Resistance.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Dipesh', 'yuvraj5456op@gmail.com', '$2y$10$F0ah64BsdGDrA8waPac5mOl/Foo9VNvQNxAbgxjcq4S5TnDTrS2Ai', '2025-03-01 08:18:41'),
(2, 'Yuvraj', 'yuvrajdon@gmail.com', '$2y$10$0Bgibs2RsACKRjtqkg8lfeb9DR.z3/O/96I4qE.zpzgPtFDQmBJky', '2025-03-01 09:49:05'),
(4, 'fsdfsd', 'yuvraj54@gmail.com', '$2y$10$6rwDtOXOglKMKcw4bIOQsOnGrRoJ/QJEBCbzwqwqp6JYJA96s368W', '2025-03-01 09:51:52'),
(5, 'Dips', 'don@gmail.com', '$2y$10$zJRiSQUbEiNtCsr/Pp03bOM5OnqS9OLMdDmIKrDKRL8fa/Whwrk5G', '2025-03-01 11:45:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
