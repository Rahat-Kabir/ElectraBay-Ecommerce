-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 12:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(2, 'rahat', '$2y$10$DxK2NsVJHR5/IzOOyAcHzeK7kl2o7414tUONRjvHJH5quWqI9cRKa'),
(3, 'rahat', '123'),
(4, 'admin', 'admin123'),
(5, 'rahat', '123'),
(6, 'rahat1', '1234'),
(7, 'rahat1', '1234'),
(8, 'rahat1', '1234'),
(9, 'rahat1', '1234'),
(10, 'rahat1', '1234'),
(11, 'rahat1', '1234'),
(12, 'rahat1', '1234'),
(13, 'rahat', '1111'),
(14, 'rahat', '1111'),
(15, 'rahat', '1111'),
(16, 'rahat1', '1234'),
(17, 'rahat1', '1234'),
(18, 'rahat1', '1234'),
(19, 'rahat1', '1234'),
(20, 'rahat1', '1234'),
(21, 'rahat1', '1234'),
(22, 'rahatkabir', '11111');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `productid` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `productid`, `user`, `created_at`) VALUES
(28, '10', '2', '2020-12-09 18:52:32'),
(29, '11', '2', '2020-12-09 18:52:33'),
(42, '66', '4', '2024-01-11 11:05:44'),
(43, '1', '4', '2024-01-11 11:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `oid` varchar(50) NOT NULL,
  `ptitle` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `oid`, `ptitle`, `price`) VALUES
(1, '1', 'Casual Style ', '500'),
(2, '2', 'Casual Style ', '500'),
(3, '3', 'White Formal Suit', '1500'),
(4, '4', '5 Smart Formal Outfit', '1000'),
(5, '4', 'Designer Kurta', '850'),
(6, '5', 'Designer Kurta', '850'),
(7, '5', 'Plain Round Neck Casual', '430'),
(8, '6', 'Designer Kurtis', '750'),
(9, '6', 'White Formal Suit', '1500'),
(10, '7', 'Party Wear Dhoti Sherwani', '999'),
(11, '7', 'Long Anarkali Suit ', '3000'),
(12, '7', 'Casual Style ', '500');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user`, `address`, `created_at`) VALUES
(1, '2', 'ttttrtrtret', '2020-12-09 18:40:05'),
(2, '2', 'ttttrtrtret', '2020-12-09 18:44:09'),
(3, '4', '234535636', '2024-01-09 09:30:46'),
(4, '4', 'dcghxfhfh', '2024-01-09 10:13:01'),
(5, '5', '35643563', '2024-01-09 12:46:45'),
(6, '4', '35643563', '2024-01-09 21:00:41'),
(7, '4', 'bashumdhara', '2024-01-09 21:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `img`, `category`, `created_at`) VALUES
(1, 'Iphone', '760000', 'iphone2.jpg', 'phone', '2024-01-10 18:53:01'),
(63, 'Iphone', '4000', 'iphone1.jpg', 'mens', '2024-01-10 18:39:28'),
(66, 'Computer 24 inc', '300000', 'computer1.jpg', 'computer', '2024-01-10 21:12:14'),
(67, 'Laptop Asus', '30000', 'computer2.jpg', 'computer', '2024-01-10 21:15:27'),
(68, 'Mac 3404', '50400', 'computer3.jpg', 'computer', '2024-01-10 21:18:22'),
(69, 'Black Laptop', '35000', 'computer4.jpg', 'computer', '2024-01-10 21:18:49'),
(70, 'Dell Laptop', '25000', 'computer5.jpg', 'computer', '2024-01-10 21:19:12'),
(71, 'Samsung Galaxy S23', '70000', 'phone3.jpg', 'phone', '2024-01-10 21:49:33'),
(72, 'Samsung Galaxy S11', '60000', 'phone4.jpg', 'phone', '2024-01-10 21:50:55'),
(73, 'Iphone SE', '55000', 'phone5.jpg', 'phone', '2024-01-10 21:52:05'),
(74, 'Fan Gadget', '3000', 'electronics1.jpg', 'electronics', '2024-01-10 22:00:42'),
(75, 'Yeti Microphone', '2000', 'electronics2.jpg', 'electronics', '2024-01-10 22:02:46'),
(76, 'Ring Light', '2000', 'electronics3.jpg', 'electronics', '2024-01-10 22:03:58'),
(77, 'Apple Black Watch', '26000', 'watch1.jpg', 'watch', '2024-01-10 22:21:15'),
(78, 'apple Watch', '32000', 'watch2.jpg', 'watch', '2024-01-10 22:47:36'),
(79, 'Women Smart Watch', '35000', 'watch3.jpg', 'watch', '2024-01-10 22:50:01'),
(80, 'Apple Series 8 watch', '25000', 'watch4.jpg', 'watch', '2024-01-10 22:55:38'),
(81, 'JBL Headphone', '14000', 'electronics4.jpg', 'electronics', '2024-01-10 22:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `created_at`) VALUES
(3, 'Rahat Kabir', 'rahatkabir1010@gmail.com', '043543', '544c524548645636cc8aa7ee8ad63b75', '2024-01-09 09:27:46'),
(4, 'Rahat Kabir', 'rahatkabir0101@gmail.com', '043543', '827ccb0eea8a706c4c34a16891f84e7b', '2024-01-09 09:28:32'),
(5, 'rahat', 'rahatkabir0101@gmail.com', '56747', '81dc9bdb52d04dc20036dbd8313ed055', '2024-01-09 12:44:17'),
(6, 'Eshan', 'rahatkabir0101@gmail.com', '0234545', 'f27264dc1a2250c61c87b548cea343e7', '2024-01-09 20:57:56'),
(7, 'eshan', 'rahatkabir0101@gmail.com', '3463456', '827ccb0eea8a706c4c34a16891f84e7b', '2024-01-09 21:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
