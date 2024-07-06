-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 06, 2024 at 05:26 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_hewan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Staff') NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `name`, `avatar`, `email`, `password`, `role`, `is_active`, `created_at`) VALUES
(3, 'Site Administrator', '1608357080619.png', 'admin@mail.com', '$2y$10$DsJvLX1WH3TzONzf9xYYz.JXJnY/WXwhqEbHgIuZdbD0uPphzLgqe', 'Admin', 1, '2020-12-19 05:51:51'),
(6, 'Raafi Hilmi', 'default.jpg', 'raafi@mail.com', '$2y$10$1kSpkS8ur5Yta/cLGAFx3eyzO5DpUBMu/p8fPzK57G.Dx2FI5840a', 'Admin', 1, '2024-05-26 09:50:16'),
(7, 'Ihsan Ramadhan', 'default.jpg', 'ihsan@mail.com', '$2y$10$YLpd5pd7jpmT6ojHa1FAk.hJRvYCZdH9iYQMsf71QKWSLJJDWRak6', 'Admin', 1, '2024-05-26 09:52:10'),
(8, 'Dedi Murphy', 'default.jpg', 'dedi@mail.com', '$2y$10$5JBEd/pzBAxTOn4OMbJoue0W910S.CDwaiDoxQMrg3uZyckMKIUq.', 'Staff', 1, '2024-05-26 09:52:38'),
(9, 'Trio', 'default.jpg', 'trio@mail.com', '$2y$10$qdb.so.MCAznu.C4zMvL3.vOeV7tj35YRbkLO2akJhOp31yBIX7pS', 'Admin', 1, '2024-07-02 04:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tokens`
--

CREATE TABLE `admin_tokens` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tokens`
--

INSERT INTO `admin_tokens` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'admin@mail.com', 'cTD/674X/GsnRCpDEYqIP8C5uz/mbEkKoQMKbg6uEQM=', 1624113403);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `phone` char(15) NOT NULL,
  `address` text,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `avatar`, `phone`, `address`, `email`, `password`, `is_active`, `created_at`) VALUES
(8, 'Rama', 'default.jpg', '0808696969', 'Jl.Berantas', 'ihsan@gmail.com', '$2y$10$qTokr.iLm4R.pg3aPbn2nONAJud0CWaAatfuXX33QS9.GKM9AXl0a', 0, '2024-07-06 02:54:31'),
(9, 'Ihsan Ramadhan', 'default.jpg', '0821767672', 'Jl. USBI', 'san@gmail.com', '$2y$10$b7jncRL2FC8lfDtEz6Lx/eEKSUUAEYDkcnMh86uFMj0Gig8hWXPbK', 1, '2024-05-29 06:53:18'),
(18, 'Raafi', 'default.jpg', '0808080', 'Jl.BSD', 'raafi@gmail.com', '$2y$10$GORbWNt8WlU2BX6Qks58uOjox4TfSVl3Q20NvZT6iKuLSXY8aZmH2', 0, '2024-07-02 04:11:50'),
(20, 'Thariq', 'default.jpg', '89098098900', 'Jl. Haji Miun', 'thariq@gmail.com', '$2y$10$pJOU2PpYWdYmqJY8ZxMbxu1w49fN.33Q1P9utJXfvxc5XlQOaSSMi', 1, '2024-07-05 16:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `groomings`
--

CREATE TABLE `groomings` (
  `grooming_id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(128) NOT NULL,
  `customer_phone` char(15) NOT NULL,
  `customer_address` text NOT NULL,
  `pet_type` enum('Kucing','Anjing') NOT NULL,
  `package_id` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_finished` date NOT NULL,
  `notes` text NOT NULL,
  `status_code` char(3) NOT NULL,
  `payment_type` varchar(128) NOT NULL,
  `bank` varchar(128) DEFAULT NULL,
  `va_number` varchar(128) DEFAULT NULL,
  `transaction_time` varchar(128) NOT NULL,
  `grooming_status` enum('Didaftarkan','Dikerjakan','Selesai') NOT NULL,
  `pdf_url` text,
  `kuota` enum('Pet Boarding Tersedia','Pet Boarding Penuh') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groomings`
--

INSERT INTO `groomings` (`grooming_id`, `order_id`, `customer_id`, `customer_name`, `customer_phone`, `customer_address`, `pet_type`, `package_id`, `date_created`, `date_finished`, `notes`, `status_code`, `payment_type`, `bank`, `va_number`, `transaction_time`, `grooming_status`, `pdf_url`, `kuota`) VALUES
(78, '761454495', 8, 'Rama', '0808696969', 'Jl.GGWP', 'Anjing', 13, '2024-07-12', '2024-07-31', 'ooo', '201', 'bank_transfer', 'bca', '68487288766', '2024-07-01 16:35:35', 'Selesai', 'https://app.sandbox.midtrans.com/snap/v1/transactions/2c02b978-02ae-4d50-902d-a1317529f493/pdf', 'Pet Boarding Tersedia'),
(79, '467928', 8, 'Rama', '0808696969', 'Jl.GGWP', 'Kucing', 14, '2024-07-27', '2024-08-10', 'yang bersih yaa!', '200', 'bank_transfer', 'bca', '68487799697', '2024-07-01 19:49:22', 'Selesai', 'https://app.sandbox.midtrans.com/snap/v1/transactions/52b4d555-fb91-477b-af1c-5cecc5182738/pdf', 'Pet Boarding Tersedia'),
(80, '1363951466', 8, 'Rama', '0808696969', 'Jl.GGWP', 'Kucing', 15, '2024-07-26', '2024-08-08', 'qq', '200', 'qris', NULL, NULL, '2024-07-01 20:36:09', 'Dikerjakan', NULL, 'Pet Boarding Tersedia'),
(81, '331211436', 8, 'Rama', '0808696969', 'Jl.GGWP', 'Kucing', 13, '2024-07-06', '2024-08-10', 'qq', '201', 'bank_transfer', 'bca', '68487633907', '2024-07-01 20:58:38', 'Selesai', 'https://app.sandbox.midtrans.com/snap/v1/transactions/4c27f962-712b-47ec-ba99-c0d60e6b5939/pdf', 'Pet Boarding Tersedia'),
(82, '971509035', 18, 'Raafi', '0808080', 'Jl.BSD', 'Kucing', 12, '2024-06-04', '2024-06-06', 'Urus dengan baik, soalnya ada alergi dingin brrrr', '200', 'bank_transfer', 'bca', '68487942274', '2024-07-02 11:05:14', 'Selesai', 'https://app.sandbox.midtrans.com/snap/v1/transactions/62f3517a-37dc-4892-8bf0-ce1552dbe481/pdf', 'Pet Boarding Tersedia'),
(83, '1034250716', 8, 'Rama', '0808696969', 'Jl.GGWP', 'Anjing', 17, '2024-06-03', '2024-06-06', 'mandiin yang wangi!', '200', 'bank_transfer', 'bca', '68487887898', '2024-07-02 11:23:32', 'Didaftarkan', 'https://app.sandbox.midtrans.com/snap/v1/transactions/fd114591-9aa6-4b79-ba51-9d9429d6581d/pdf', 'Pet Boarding Tersedia'),
(84, '1901352933', 20, 'Thariq', '89098098900', 'Jl. Haji Miun', 'Anjing', 13, '2024-07-09', '2024-07-25', '', '200', 'bank_transfer', 'bca', '68487116921', '2024-07-06 00:07:58', 'Didaftarkan', 'https://app.sandbox.midtrans.com/snap/v1/transactions/7da319e5-55c9-47cc-a4e4-f5a9aed2062a/pdf', 'Pet Boarding Tersedia'),
(85, '214308020', 8, 'Rama', '0808696969', 'Jl.Berantas', 'Kucing', 13, '2024-07-07', '2024-07-15', 'ww', '200', 'bank_transfer', 'bca', '68487243261', '2024-07-06 09:46:41', 'Didaftarkan', 'https://app.sandbox.midtrans.com/snap/v1/transactions/11f650fa-3ea0-4d04-b1c2-8b1fb02e0041/pdf', 'Pet Boarding Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `kuota_pet_boarding`
--

CREATE TABLE `kuota_pet_boarding` (
  `id` int(11) NOT NULL,
  `kuota` int(11) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuota_pet_boarding`
--

INSERT INTO `kuota_pet_boarding` (`id`, `kuota`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `cost_for_cat` float NOT NULL,
  `cost_for_dog` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `name`, `slug`, `description`, `cost_for_cat`, `cost_for_dog`, `created_at`) VALUES
(12, 'Mandi Lengkap + Food', 'mandi-lengkap', '', 50000, 80000, '2024-05-28 14:57:26'),
(13, 'Mandi Hewan Berjamur + Food', 'mandi-hewan-berjamur', '', 60000, 85000, '2024-05-28 14:57:37'),
(14, 'Mandi Biasa + Food', 'mandi-biasa', '', 40000, 60000, '2024-05-28 14:57:42'),
(15, 'Mandi Hewan aja lah + Food % $ &amp; id = 13', 'mandi-hewan-aja-lah-+-food-%-$-&amp;-id-=-13', 'ini', 68000, 75000, '2024-07-02 04:16:50'),
(17, 'Mandi Kembang + Minuman', 'mandi-kembang-+-minuman', '', 90000, 100000, '2024-07-02 04:19:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_tokens`
--
ALTER TABLE `admin_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `groomings`
--
ALTER TABLE `groomings`
  ADD PRIMARY KEY (`grooming_id`),
  ADD KEY `type_id` (`package_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `kuota_pet_boarding`
--
ALTER TABLE `kuota_pet_boarding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin_tokens`
--
ALTER TABLE `admin_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `groomings`
--
ALTER TABLE `groomings`
  MODIFY `grooming_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `kuota_pet_boarding`
--
ALTER TABLE `kuota_pet_boarding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `groomings`
--
ALTER TABLE `groomings`
  ADD CONSTRAINT `groomings_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groomings_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
