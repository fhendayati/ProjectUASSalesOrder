-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2026 at 03:24 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sales_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `address`, `phone`, `created_at`) VALUES
(1, 'PT Sinar Abadi', 'Jl. Jendral Sudirman No. 55, Jakarta Pusat', '081234567890', '2026-05-27 10:45:06'),
(2, 'CV Maju Bersama', 'Jl. Diponegoro No. 25, Bandung', '082233445566', '2026-05-27 10:45:06'),
(3, 'Toko Elektronik Jaya', 'Jl. Gatot Subroto, Tangerang', '089988776655', '2026-05-27 10:45:06'),
(4, 'UD Abadi', 'Jl. Pegangsaan Timur No. 96, Jakarta Timur', '083245678876', '2026-06-04 15:40:54'),
(5, 'UD Sejuk Indonesia', 'Jl. Singgasana Raya, No. 67, Yogyakarta', '087865443212', '2026-06-20 06:02:31'),
(6, 'PT Global Institute', 'Jl. Aria Santika, Karawaci, Tangerang', '087655432345', '2026-06-20 11:14:47'),
(7, 'CV Harapan Bunda', 'Jl. Tutwuri Handayani, Bogor', '089755634543', '2026-06-20 11:16:12'),
(8, 'Toko Komputer Berkah ', 'Jl. Kuningan Barat, Depok', '082314567655', '2026-06-20 11:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` decimal(15,2) NOT NULL DEFAULT 0.00,
  `status` enum('draft','dikirim','selesai','dibatalkan') DEFAULT 'draft',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `customer_id`, `user_id`, `total_price`, `status`, `created_at`) VALUES
(7, '2026-05-08', 1, 2, '7600000.00', 'selesai', '2026-06-19 16:25:16'),
(8, '2026-05-12', 1, 5, '4900000.00', 'selesai', '2026-06-20 06:03:42'),
(9, '2026-05-15', 2, 2, '20400000.00', 'selesai', '2026-06-20 07:17:17'),
(10, '2026-05-25', 3, 2, '5500000.00', 'dikirim', '2026-06-20 12:06:21'),
(11, '2026-06-02', 4, 2, '2750000.00', 'draft', '2026-06-20 12:11:06'),
(12, '2026-06-10', 6, 2, '28050000.00', 'selesai', '2026-06-20 12:11:58'),
(13, '2026-06-17', 7, 2, '8500000.00', 'selesai', '2026-06-20 12:13:42'),
(14, '2026-06-19', 8, 2, '4050000.00', 'dikirim', '2026-06-20 12:14:11'),
(15, '2026-05-20', 2, 5, '9950000.00', 'dibatalkan', '2026-06-20 12:16:00'),
(16, '2026-06-05', 4, 5, '1950000.00', 'draft', '2026-06-20 12:16:28'),
(17, '2026-06-09', 3, 5, '5650000.00', 'selesai', '2026-06-20 12:17:46'),
(18, '2026-06-14', 7, 5, '5000000.00', 'dikirim', '2026-06-20 12:18:46'),
(19, '2026-06-18', 8, 5, '4100000.00', 'selesai', '2026-06-20 12:19:23'),
(20, '2026-05-18', 3, 4, '33550000.00', 'dikirim', '2026-06-20 13:32:27'),
(21, '2026-05-24', 4, 4, '4250000.00', 'selesai', '2026-06-20 13:33:10'),
(22, '2026-06-07', 1, 4, '9900000.00', 'selesai', '2026-06-20 13:34:08'),
(23, '2026-06-13', 5, 4, '3500000.00', 'dibatalkan', '2026-06-20 13:34:38'),
(24, '2026-06-19', 7, 4, '6000000.00', 'selesai', '2026-06-20 13:35:26'),
(25, '2026-05-10', 6, 6, '10700000.00', 'selesai', '2026-06-20 13:38:58'),
(26, '2026-05-21', 2, 6, '8050000.00', 'selesai', '2026-06-20 13:39:39'),
(27, '2026-05-29', 8, 6, '4500000.00', 'dikirim', '2026-06-20 13:40:57'),
(28, '2026-06-20', 1, 6, '43200000.00', 'draft', '2026-06-20 13:43:23'),
(29, '2026-06-08', 4, 6, '2650000.00', 'selesai', '2026-06-20 13:44:13'),
(30, '2026-06-16', 3, 6, '7700000.00', 'dikirim', '2026-06-20 13:44:57'),
(31, '2026-06-21', 1, 6, '5450000.00', 'selesai', '2026-06-20 13:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `price`, `subtotal`) VALUES
(11, 7, 3, 2, '2200000.00', '4400000.00'),
(12, 7, 8, 5, '250000.00', '1250000.00'),
(13, 7, 9, 3, '650000.00', '1950000.00'),
(17, 9, 1, 2, '8500000.00', '17000000.00'),
(18, 9, 14, 4, '850000.00', '3400000.00'),
(19, 10, 16, 2, '2750000.00', '5500000.00'),
(20, 11, 23, 2, '700000.00', '1400000.00'),
(21, 11, 7, 3, '450000.00', '1350000.00'),
(24, 12, 18, 5, '1450000.00', '7250000.00'),
(25, 12, 22, 4, '5200000.00', '20800000.00'),
(26, 13, 14, 5, '850000.00', '4250000.00'),
(27, 13, 10, 5, '350000.00', '1750000.00'),
(28, 13, 8, 10, '250000.00', '2500000.00'),
(29, 14, 16, 1, '2750000.00', '2750000.00'),
(30, 14, 9, 2, '650000.00', '1300000.00'),
(31, 8, 17, 1, '3200000.00', '3200000.00'),
(32, 8, 14, 2, '850000.00', '1700000.00'),
(33, 15, 2, 1, '9200000.00', '9200000.00'),
(34, 15, 8, 3, '250000.00', '750000.00'),
(35, 16, 10, 3, '350000.00', '1050000.00'),
(36, 16, 7, 2, '450000.00', '900000.00'),
(37, 17, 8, 8, '250000.00', '2000000.00'),
(38, 17, 9, 3, '650000.00', '1950000.00'),
(39, 17, 14, 2, '850000.00', '1700000.00'),
(40, 18, 23, 2, '700000.00', '1400000.00'),
(41, 18, 19, 8, '450000.00', '3600000.00'),
(42, 19, 5, 1, '3200000.00', '3200000.00'),
(43, 19, 7, 2, '450000.00', '900000.00'),
(44, 20, 14, 3, '850000.00', '2550000.00'),
(45, 20, 21, 5, '6200000.00', '31000000.00'),
(48, 21, 16, 1, '2750000.00', '2750000.00'),
(49, 21, 8, 6, '250000.00', '1500000.00'),
(50, 22, 1, 1, '8500000.00', '8500000.00'),
(51, 22, 23, 2, '700000.00', '1400000.00'),
(52, 23, 3, 1, '2200000.00', '2200000.00'),
(53, 23, 9, 2, '650000.00', '1300000.00'),
(54, 24, 7, 3, '450000.00', '1350000.00'),
(55, 24, 14, 4, '850000.00', '3400000.00'),
(56, 24, 8, 5, '250000.00', '1250000.00'),
(57, 25, 1, 1, '8500000.00', '8500000.00'),
(58, 25, 3, 1, '2200000.00', '2200000.00'),
(59, 26, 16, 2, '2750000.00', '5500000.00'),
(60, 26, 14, 3, '850000.00', '2550000.00'),
(61, 27, 23, 3, '700000.00', '2100000.00'),
(62, 27, 13, 20, '120000.00', '2400000.00'),
(63, 28, 17, 2, '3200000.00', '6400000.00'),
(64, 28, 2, 4, '9200000.00', '36800000.00'),
(65, 29, 10, 4, '350000.00', '1400000.00'),
(66, 29, 8, 5, '250000.00', '1250000.00'),
(67, 30, 9, 4, '650000.00', '2600000.00'),
(68, 30, 7, 4, '450000.00', '1800000.00'),
(69, 30, 15, 2, '1650000.00', '3300000.00'),
(70, 31, 3, 2, '2200000.00', '4400000.00'),
(71, 31, 10, 3, '350000.00', '1050000.00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(50) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` decimal(15,0) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `price`, `stock`, `created_at`) VALUES
(1, 'PRD001', 'Laptop ASUS Vivobook 14', '8500000', 8, '2026-05-27 10:38:24'),
(2, 'PRD002', 'Laptop Acer Aspire 5', '9200000', 10, '2026-05-27 10:38:24'),
(3, 'PRD003', 'Monitor Samsung 24 Inch', '2200000', 15, '2026-05-27 10:38:24'),
(5, 'PRD004', 'Monitor LG 27 Inch', '3200000', 14, '2026-06-04 15:14:48'),
(7, 'PRD005', 'Webcam Logitech C270', '450000', 25, '2026-06-19 16:12:01'),
(8, 'PRD006', 'Mouse Logitech M185', '250000', 11, '2026-06-20 05:57:34'),
(9, 'PRD007', 'Keyboard Mechanical Fantech MK853', '650000', 29, '2026-06-20 06:01:17'),
(10, 'PRD008', 'Headset Gaming Rexus', '350000', 33, '2026-06-20 11:04:17'),
(12, 'PRD009', 'Speaker Bluetooth JBL Go 3', '650000', 25, '2026-06-20 11:05:24'),
(13, 'PRD010', 'Mouse Pad Gaming XL', '120000', 25, '2026-06-20 11:06:05'),
(14, 'PRD011', 'SSD Kingston 500GB', '850000', 20, '2026-06-20 11:06:38'),
(15, 'PRD012', 'SSD Samsung 1TB', '1650000', 25, '2026-06-20 11:07:13'),
(16, 'PRD013', 'Printer Epson L3210', '2750000', 12, '2026-06-20 11:07:44'),
(17, 'PRD014', 'Printer Canon G3020', '3200000', 11, '2026-06-20 11:08:16'),
(18, 'PRD015', 'Scanner Canon LiDe 300', '1450000', 5, '2026-06-20 11:08:54'),
(19, 'PRD016', 'CCTV Hikvision 2MP', '450000', 20, '2026-06-20 11:09:27'),
(20, 'PRD017', 'DVR Hikvision 4 Channel', '1200000', 12, '2026-06-20 11:10:04'),
(21, 'PRD018', 'Proyektor Epson EB-E01', '6200000', 8, '2026-06-20 11:10:38'),
(22, 'PRD019', 'Smart TV Samsung 43 Inch', '5200000', 6, '2026-06-20 11:11:15'),
(23, 'PRD020', 'Router TP-Link Archer C6', '700000', 23, '2026-06-20 11:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Sales'),
(3, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `username`, `photo`, `password`, `created_at`, `last_login`) VALUES
(1, 1, 'Lee Ana', 'anaadmin', 'user_1_1781952082.jpeg', 'admin123', '2026-05-27 10:33:48', '2026-06-21 14:48:51'),
(2, 2, 'Lee Je-hoon', 'jehoonsales', 'user_2_1781951235.jpg', 'jehoon123', '2026-05-27 10:33:48', '2026-06-21 14:48:37'),
(3, 3, 'Fitriana Hendayati', 'ipitmanager', 'user_3_1781949984.jpeg', 'ipit123', '2026-05-27 10:33:48', '2026-06-22 08:09:01'),
(4, 2, 'Shin Eun Soo', 'eunsosales', 'user_4_1781951195.jpg', 'eunso123', '2026-06-18 14:26:53', '2026-06-20 20:28:20'),
(5, 2, 'Tasya Syakira', 'tasyasales', 'user_5_1781951438.jpg', 'tasya123', '2026-06-18 14:26:53', '2026-06-20 19:14:55'),
(6, 2, 'Byeon Woo-seok', 'seoksales', 'user_6_1781951867.jpg', 'seok123', '2026-06-20 10:24:14', '2026-06-20 20:37:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
