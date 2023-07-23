-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2023 at 04:28 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cocoskitchen`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_desc` varchar(20) NOT NULL,
  `cat_status` varchar(1) NOT NULL DEFAULT 'A' COMMENT 'A = Active / I = Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_desc`, `cat_status`) VALUES
(1, 'SIZZLING PLATE', 'A'),
(2, 'SILOG MEALS', 'A'),
(3, 'APPETIZERS', 'A'),
(4, 'EXTRA', 'A'),
(5, 'DRINKS', 'A'),
(6, 'SOUP', 'A'),
(7, 'SET PROMOS', 'A'),
(8, 'SHORT ORDERS', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_ref_number` varchar(24) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `date_ordered` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` char(1) NOT NULL DEFAULT 'P' COMMENT 'P = Pending / D = Delivered / O = Out for Delivery / C = Cancelled',
  `courier_user_id` int(11) NOT NULL,
  `date_delivered` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_ref_number`, `user_id`, `item_id`, `item_qty`, `date_ordered`, `order_status`, `courier_user_id`, `date_delivered`) VALUES
(68, '08L2X6V0Z1S0N', 28, 43, 1, '2023-05-07 02:52:43', 'D', 44, '2023-05-11 00:29:00'),
(69, '25R2P0A6B9L7M', 28, 43, 1, '2023-05-07 02:54:04', 'D', 44, '2023-05-11 00:25:38'),
(70, '25R2P0A6B9L7M', 28, 44, 1, '2023-05-07 02:54:04', 'D', 44, '2023-05-11 00:25:38'),
(71, '25R2P0A6B9L7M', 28, 45, 1, '2023-05-07 02:54:04', 'D', 44, '2023-05-11 00:25:38'),
(72, '43Q1W1E1C5Q1Y', 28, 44, 1, '2023-05-07 02:57:06', 'D', 44, '2023-05-11 00:29:47'),
(73, '43Q1W1E1C5Q1Y', 28, 47, 1, '2023-05-07 02:57:06', 'D', 44, '2023-05-11 00:29:47'),
(74, '28L5L5S6Y3J7S', 28, 44, 1, '2023-05-07 03:00:03', 'D', 44, '2023-05-11 00:29:47'),
(75, '28L5L5S6Y3J7S', 28, 50, 1, '2023-05-07 03:00:03', 'D', 44, '2023-05-11 00:29:47'),
(76, '88B7Y0P5Z5W1A', 45, 45, 1, '2023-05-08 11:47:32', 'D', 44, '2023-05-11 00:29:46'),
(77, '71Z3U5J0O9I0D', 45, 45, 2, '2023-05-08 11:47:51', 'D', 44, '2023-05-11 00:18:41'),
(78, '99K6R3Y3P2G9V', 28, 43, 1, '2023-05-08 12:00:07', 'D', 44, '2023-05-11 00:29:46'),
(79, '99K6R3Y3P2G9V', 28, 44, 1, '2023-05-08 12:00:07', 'D', 44, '2023-05-11 00:29:46'),
(80, '99K6R3Y3P2G9V', 28, 45, 1, '2023-05-08 12:00:07', 'D', 44, '2023-05-11 00:29:46'),
(81, '99K6R3Y3P2G9V', 28, 47, 1, '2023-05-08 12:00:07', 'D', 44, '2023-05-11 00:29:46'),
(82, '99K6R3Y3P2G9V', 28, 48, 1, '2023-05-08 12:00:07', 'D', 44, '2023-05-11 00:29:46'),
(83, '99K6R3Y3P2G9V', 28, 50, 1, '2023-05-08 12:00:07', 'D', 44, '2023-05-11 00:29:46'),
(84, '64U1Q4Y0R3V9M', 28, 43, 10, '2023-05-08 12:00:44', 'D', 44, '2023-05-11 00:29:46'),
(85, '64U1Q4Y0R3V9M', 28, 45, 5, '2023-05-08 12:00:44', 'D', 44, '2023-05-11 00:29:46'),
(86, '84T7F5H7V5K3C', 43, 45, 1, '2023-05-09 20:35:21', 'D', 44, '2023-05-11 00:29:45'),
(87, '42S6M2B4Q3E8Y', 30, 52, 1, '2023-05-11 00:26:36', 'D', 44, '2023-05-11 00:28:29'),
(90, '85R6D9H1V0A7I', 28, 42, 11, '2023-05-11 00:46:34', 'D', 44, '2023-05-13 06:09:11'),
(91, '85R6D9H1V0A7I', 28, 43, 12, '2023-05-11 00:46:34', 'D', 44, '2023-05-13 06:09:11'),
(92, '85R6D9H1V0A7I', 28, 45, 10, '2023-05-11 00:46:34', 'D', 44, '2023-05-13 06:09:11'),
(93, '85R6D9H1V0A7I', 28, 48, 11, '2023-05-11 00:46:34', 'D', 44, '2023-05-13 06:09:11'),
(94, '85R6D9H1V0A7I', 28, 50, 12, '2023-05-11 00:46:34', 'D', 44, '2023-05-13 06:09:11'),
(95, '85R6D9H1V0A7I', 28, 52, 5, '2023-05-11 00:46:34', 'D', 44, '2023-05-13 06:09:11'),
(96, '17H8P9G1M7O8N', 28, 44, 1, '2023-05-11 02:16:33', 'O', 0, NULL),
(97, '17H8P9G1M7O8N', 28, 45, 1, '2023-05-11 02:16:33', 'O', 0, NULL),
(98, '17H8P9G1M7O8N', 28, 48, 1, '2023-05-11 02:16:33', 'O', 0, NULL),
(99, '17H8P9G1M7O8N', 28, 50, 1, '2023-05-11 02:16:33', 'O', 0, NULL),
(100, '27H7X6V3I1L4E', 43, 44, 1, '2023-05-11 05:51:08', 'C', 0, NULL),
(101, '27H7X6V3I1L4E', 43, 45, 1, '2023-05-11 05:51:08', 'C', 0, NULL),
(102, '27H7X6V3I1L4E', 43, 46, 1, '2023-05-11 05:51:08', 'C', 0, NULL),
(103, '40E7R9Z2F8F5E', 43, 43, 1, '2023-05-11 05:51:27', 'O', 0, NULL),
(104, '40E7R9Z2F8F5E', 43, 48, 1, '2023-05-11 05:51:27', 'O', 0, NULL),
(105, '75R0P6G3Z9B1K', 28, 44, 1, '2023-05-13 06:03:51', 'C', 0, NULL),
(106, '75R0P6G3Z9B1K', 28, 45, 1, '2023-05-13 06:03:51', 'C', 0, NULL),
(107, '75R0P6G3Z9B1K', 28, 48, 2, '2023-05-13 06:03:51', 'C', 0, NULL),
(108, '75R0P6G3Z9B1K', 28, 49, 2, '2023-05-13 06:03:51', 'C', 0, NULL),
(109, '75R0P6G3Z9B1K', 28, 50, 2, '2023-05-13 06:03:51', 'C', 0, NULL),
(110, '64N6Y0T3X5M2N', 28, 44, 1, '2023-05-13 06:06:18', 'D', 44, '2023-05-13 06:09:09'),
(111, '64N6Y0T3X5M2N', 28, 45, 1, '2023-05-13 06:06:18', 'D', 44, '2023-05-13 06:09:09'),
(112, '64N6Y0T3X5M2N', 28, 48, 2, '2023-05-13 06:06:18', 'D', 44, '2023-05-13 06:09:09'),
(113, '64N6Y0T3X5M2N', 28, 49, 2, '2023-05-13 06:06:18', 'D', 44, '2023-05-13 06:09:09'),
(114, '64N6Y0T3X5M2N', 28, 50, 2, '2023-05-13 06:06:18', 'D', 44, '2023-05-13 06:09:09'),
(115, '78I0W1W3H0V9E', 49, 43, 1, '2023-05-13 07:08:59', 'P', 0, NULL),
(116, '78I0W1W3H0V9E', 49, 44, 1, '2023-05-13 07:08:59', 'P', 0, NULL),
(117, '78I0W1W3H0V9E', 49, 45, 1, '2023-05-13 07:08:59', 'P', 0, NULL),
(118, '87I6C3D7J6W2N', 28, 45, 1, '2023-05-13 07:09:36', 'P', 0, NULL),
(119, '31L0K3O1I3F4V', 45, 44, 2, '2023-05-17 01:25:00', 'D', 44, '2023-05-17 01:26:05'),
(120, '31L0K3O1I3F4V', 45, 45, 2, '2023-05-17 01:25:00', 'D', 44, '2023-05-17 01:26:05'),
(121, '31L0K3O1I3F4V', 45, 50, 4, '2023-05-17 01:25:00', 'D', 44, '2023-05-17 01:26:05'),
(122, '18R4N4D6E1L3W', 43, 44, 1, '2023-05-17 03:51:39', 'P', 0, NULL),
(123, '18R4N4D6E1L3W', 43, 45, 1, '2023-05-17 03:51:39', 'P', 0, NULL),
(124, '18R4N4D6E1L3W', 43, 50, 2, '2023-05-17 03:51:39', 'P', 0, NULL),
(125, '18R4N4D6E1L3W', 43, 52, 1, '2023-05-17 03:51:39', 'P', 0, NULL),
(126, '18R4N4D6E1L3W', 43, 53, 2, '2023-05-17 03:51:39', 'P', 0, NULL),
(127, '90L8X2K5G4T2Y', 28, 44, 1, '2023-05-17 10:01:04', 'P', 0, NULL),
(128, '90L8X2K5G4T2Y', 28, 45, 1, '2023-05-17 10:01:04', 'P', 0, NULL),
(129, '90L8X2K5G4T2Y', 28, 47, 1, '2023-05-17 10:01:04', 'P', 0, NULL),
(130, '90L8X2K5G4T2Y', 28, 48, 3, '2023-05-17 10:01:04', 'P', 0, NULL),
(131, '90L8X2K5G4T2Y', 28, 50, 3, '2023-05-17 10:01:04', 'P', 0, NULL),
(132, '90L8X2K5G4T2Y', 28, 52, 3, '2023-05-17 10:01:04', 'P', 0, NULL),
(133, '90L8X2K5G4T2Y', 28, 53, 3, '2023-05-17 10:01:04', 'P', 0, NULL),
(134, '85S7F1T4G5C4U', 28, 45, 1, '2023-05-19 05:34:18', 'P', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `item_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_desc` text NOT NULL,
  `item_file` varchar(255) NOT NULL,
  `item_status` char(1) NOT NULL DEFAULT 'A' COMMENT 'A = Active / I = Inactive',
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`item_id`, `cat_id`, `item_name`, `item_price`, `item_desc`, `item_file`, `item_status`, `date_added`) VALUES
(42, 8, 'Pansit w/ Egg', '25.00', 'Pansit na may Egg', 'pansitegg.png', 'A', '2023-04-04 10:15:33'),
(43, 2, 'SisigSilog', '85.00', 'silog na may sisig', 'sisigsilog.png', 'A', '2023-04-04 10:18:32'),
(44, 2, 'ChickenSilog', '85.00', 'Silog na may chiken', 'chickensilog.png', 'A', '2023-04-04 10:20:18'),
(45, 2, 'LongSilog', '85.00', 'Long silog na skinless', 'longsilogskinless.png', 'A', '2023-04-04 10:25:08'),
(46, 2, 'HotSilog', '75.00', 'Silog na may hotdog', 'hotsilog.png', 'A', '2023-04-04 10:25:30'),
(47, 2, 'HamSilog', '75.00', 'Silog na may Ham', 'hamsilog.png', 'A', '2023-04-04 10:28:18'),
(48, 5, 'Orange Juice', '20.00', 'orange juice na masarap', 'orange.jpg', 'A', '2023-04-04 10:28:38'),
(49, 6, 'Crab and Corn', '100.00', 'Sopas na masarap', 'orange.jpg', 'A', '2023-04-04 10:30:12'),
(50, 4, 'Java Rice', '20.00', 'rice na java', 'orange.jpg', 'A', '2023-04-04 10:31:00'),
(52, 7, 'yawa', '100.00', 'Yawa Talaga SheeSDASDA', 'Yawa.jpg', 'A', '2023-05-10 03:19:37'),
(53, 3, 'orange', '23.00', 'orang the cringe', '../img/orange.jpg', 'A', '2023-05-13 12:00:44'),
(54, 1, 'Sisig', '160.00', 'sisig na masiram', '../img/sisig.jpg', 'A', '2023-05-19 14:13:07'),
(55, 1, 'Tuna', '150.00', 'Tuna Fish na dish', '../img/tuna.jpg', 'A', '2023-05-19 14:17:56'),
(56, 1, 'Buttered Corn', '100.00', 'corn na may butter', '../img/butterdCorn.jpg', 'A', '2023-05-19 14:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_number` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_status` varchar(1) NOT NULL DEFAULT 'A' COMMENT 'A = Active / I - Inactive',
  `user_type` varchar(1) NOT NULL DEFAULT 'C' COMMENT 'C = Client, A = Admin, D = Delivery',
  `last_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `address`, `contact_number`, `email`, `username`, `password`, `user_status`, `user_type`, `last_update`) VALUES
(28, 'melvin', 'porcalla', 'guinobatan, albay', '09444333555', 'smurfmeru@gmail.com', 'melvin', '123', 'A', 'C', '2023-05-06 16:14:46'),
(29, 'sona', 'buvelle', 'guinobatan, albay', '09111222441', 'sona@gmail.com', 'sona', '12345', 'A', 'C', '2023-05-06 16:14:46'),
(30, 'kata', 'rina', 'legaspi, albay', '09111222441', 'katarina@gmail.com', 'kata', 'kata', 'A', 'C', '2023-05-06 16:14:46'),
(42, 'meru', 'vin', 'Guinobatan Albay', '09876543212', 'admin@gmail.com', 'admin', '123', 'A', 'A', '2023-05-06 17:03:57'),
(43, 'fi', 'so', 'naga city', '09876543212', 'asda@gmail.com', 'fiso', '123', 'A', 'C', '2023-05-07 05:17:45'),
(44, 'cour', 'ier', 'Camalig city', '09876543212', 'asd@gmail.com', 'courier', '123', 'A', 'D', '2023-05-07 05:24:12'),
(45, 'rizzly', 'bear', 'Guinobatan Albay', '09876543212', 'papamelvs@gmail.com', 'rizz', '123', 'A', 'C', '2023-05-08 17:45:53'),
(48, 'sample', 'ni melvs', 'Guinobatan Albay', '09867842532', 'sample@gmail.com', 'sample', '12345', 'A', 'C', '2023-05-11 03:03:30'),
(49, 'viking', 'lord', 'Guinobatan Albay', '09876543212', 'shebar@gmail.com', 'viking', 'lord123', 'A', 'C', '2023-05-13 13:07:45'),
(50, 'Melvin', 'Pogi', 'Guinobatan Albay', '09867842532', 'meru@gmail.com', 'meru', '123', 'A', 'A', '2023-05-13 13:15:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `courier_user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `item_id` FOREIGN KEY (`item_id`) REFERENCES `products` (`item_id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `cat_id` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
