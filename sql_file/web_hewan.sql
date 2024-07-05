-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 03, 2024 at 09:03 AM
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
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `bank_id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `name` varchar(128) NOT NULL,
  `number` varchar(20) NOT NULL,
  `holder` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`bank_id`, `logo`, `name`, `number`, `holder`) VALUES
(3, '1622336131728.jpg', 'Bank Syariah Indonesia', '823627863', 'IHSAN RAMADHAN');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `slug`, `image`) VALUES
(37, 'Makanan', 'makanan', '1605481281645.jpg'),
(38, 'Kandang', 'kandang', '1605481292032.jpg'),
(40, 'Peliharaan', 'peliharaan', '1605483254673.jpg'),
(42, 'Aksesoris', 'aksesoris', '1606404043004.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `phone` char(15) NOT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `avatar`, `phone`, `address`, `email`, `password`, `is_active`, `created_at`) VALUES
(6, 'Site Customer', '1608357453866.png', '081939448487', 'Jl. Bunga Matahari, No.11 Gomong Lama, Mataram', 'customer@mail.com', '$2y$10$heyAPdEKex5I3SPZ5RA92OCP8cNqpapPFRWkuF/LPFqLZeuPOVC0m', 1, '2020-12-20 10:31:12'),
(8, 'Rama', 'default.jpg', '0808696969', 'Jl.GGWP', 'ihsan@gmail.com', '$2y$10$qTokr.iLm4R.pg3aPbn2nONAJud0CWaAatfuXX33QS9.GKM9AXl0a', 1, '2024-06-30 08:03:22'),
(9, 'Ihsan Ramadhan', 'default.jpg', '0821767672', 'Jl. USBI', 'san@gmail.com', '$2y$10$b7jncRL2FC8lfDtEz6Lx/eEKSUUAEYDkcnMh86uFMj0Gig8hWXPbK', 1, '2024-05-29 06:53:18'),
(18, 'Raafi', 'default.jpg', '0808080', 'Jl.BSD', 'raafi@gmail.com', '$2y$10$GORbWNt8WlU2BX6Qks58uOjox4TfSVl3Q20NvZT6iKuLSXY8aZmH2', 0, '2024-07-02 04:11:50');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tokens`
--

CREATE TABLE `customer_tokens` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `grooming_status` enum('Didaftarkan','Diterima','Dikerjakan','Selesai') NOT NULL,
  `pdf_url` text,
  `kuota` enum('Pet Boarding Tersedia','Pet Boarding Penuh') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groomings`
--

INSERT INTO `groomings` (`grooming_id`, `order_id`, `customer_id`, `customer_name`, `customer_phone`, `customer_address`, `pet_type`, `package_id`, `date_created`, `date_finished`, `notes`, `status_code`, `payment_type`, `bank`, `va_number`, `transaction_time`, `grooming_status`, `pdf_url`, `kuota`) VALUES
(78, '761454495', 8, 'Rama', '0808696969', 'Jl.GGWP', 'Anjing', 13, '2024-07-12', '2024-07-31', 'ooo', '201', 'bank_transfer', 'bca', '68487288766', '2024-07-01 16:35:35', 'Dikerjakan', 'https://app.sandbox.midtrans.com/snap/v1/transactions/2c02b978-02ae-4d50-902d-a1317529f493/pdf', 'Pet Boarding Tersedia'),
(79, '467928', 8, 'Rama', '0808696969', 'Jl.GGWP', 'Kucing', 14, '2024-07-27', '2024-08-10', 'yang bersih yaa!', '200', 'bank_transfer', 'bca', '68487799697', '2024-07-01 19:49:22', 'Selesai', 'https://app.sandbox.midtrans.com/snap/v1/transactions/52b4d555-fb91-477b-af1c-5cecc5182738/pdf', 'Pet Boarding Tersedia'),
(80, '1363951466', 8, 'Rama', '0808696969', 'Jl.GGWP', 'Kucing', 15, '2024-07-26', '2024-08-08', 'qq', '200', 'qris', NULL, NULL, '2024-07-01 20:36:09', 'Didaftarkan', NULL, 'Pet Boarding Tersedia'),
(81, '331211436', 8, 'Rama', '0808696969', 'Jl.GGWP', 'Kucing', 13, '2024-07-06', '2024-08-10', 'qq', '201', 'bank_transfer', 'bca', '68487633907', '2024-07-01 20:58:38', 'Didaftarkan', 'https://app.sandbox.midtrans.com/snap/v1/transactions/4c27f962-712b-47ec-ba99-c0d60e6b5939/pdf', 'Pet Boarding Tersedia'),
(82, '971509035', 18, 'Raafi', '0808080', 'Jl.BSD', 'Kucing', 12, '2024-06-04', '2024-06-06', 'Urus dengan baik, soalnya ada alergi dingin brrrr', '200', 'bank_transfer', 'bca', '68487942274', '2024-07-02 11:05:14', 'Selesai', 'https://app.sandbox.midtrans.com/snap/v1/transactions/62f3517a-37dc-4892-8bf0-ce1552dbe481/pdf', 'Pet Boarding Tersedia'),
(83, '1034250716', 8, 'Rama', '0808696969', 'Jl.GGWP', 'Anjing', 17, '2024-06-03', '2024-06-06', 'mandiin yang wangi!', '200', 'bank_transfer', 'bca', '68487887898', '2024-07-02 11:23:32', 'Didaftarkan', 'https://app.sandbox.midtrans.com/snap/v1/transactions/fd114591-9aa6-4b79-ba51-9d9429d6581d/pdf', 'Pet Boarding Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `images` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `name`, `slug`, `images`, `stock`, `price`, `description`, `category_id`, `created_at`) VALUES
(3, 'Kandang Kucing model minimalis', 'kandang-kucing-model-minimalis', '1702271292919.png', 6, 150000, 'Langsung dari pengrajin ????, Menggunakan kayu solid buka serbuk kayu sehingga tidak mudah lapuk dan awet ????, ✅ Seluruh foto di sini ASLI milik kami', 38, '2024-05-26 19:22:26'),
(5, 'Jual Kucing persia anakan umur 2 bulan', 'jual-kucing-persia-anakan-umur-2-bulan', '1605519915190.jpg', -3, 750000, 'kucing persia anakang umur 2 bulan. kucing persia anakang umur 2 bulan order sepasang harga 800rb', 40, '2024-05-26 18:43:34'),
(6, 'Bolt 1Kg Tuna Ikan - Makanan Kucing Murah', 'bolt-1kg-tuna-ikan---makanan-kucing-murah', '1605520083844.jpg', 0, 19700, 'Jual Bolt 1Kg Tuna Ikan - Makanan Kucing Murah - Repack - Cat Food dengan harga Rp19.700 dari toko online', 37, '2021-05-29 22:38:35'),
(7, 'Tokopedia Jual Pakan Kucing Me-o Meo Tuna 1.2 Kg', 'tokopedia-jual-pakan-kucing-me-o-meo-tuna-1.2-kg', '1605520258517.jpg', 76, 54000, 'Jual Pakan Kucing Me-o Meo Tuna 1.2 Kg dengan harga Rp54.000 . termurah', 37, '2024-05-26 19:18:38'),
(12, 'Felibite makanan kucing bentuk ikan kemasan 1 kg', 'felibite-makanan-kucing-bentuk-ikan-kemasan-1-kg', '1605565403891.jpeg', 86, 67000, 'Belanja Felibite Bentuk IKAN Makanan Kucing Kemasan 1kg indonesia Murah - Belanja Makanan Kering di Lazada. FREE ONGKIR &amp; Bisa COD', 37, '2024-05-26 19:18:38'),
(13, 'Jual kucing bar bar', 'jual-kucing-bar-bar', '1605565534933.jpg', -1, 290000, 'Jual kucing bar bar, sangat lincah. alasan jual karena mukanya ngeselin, pengen ngajak gelud tiap liat mukanya', 40, '2024-05-26 18:43:34'),
(16, 'Kalung Kucing Murah meriah', 'kalung-kucing-murah-meriah', '1608357774815.jpg', 48, 35000, '&lt;p&gt;Kalung kucing dengan harga murah dan terjangkau&lt;/p&gt;', 42, '2024-05-26 19:18:38');

-- --------------------------------------------------------

--
-- Table structure for table `kuota_pet_boarding`
--

CREATE TABLE `kuota_pet_boarding` (
  `id` int(11) NOT NULL,
  `kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuota_pet_boarding`
--

INSERT INTO `kuota_pet_boarding` (`id`, `kuota`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `receipent_name` varchar(128) NOT NULL,
  `receipent_phone` char(15) NOT NULL,
  `receipent_address` text NOT NULL,
  `payment_method` enum('cod','transfer') NOT NULL,
  `payment_slip` varchar(128) DEFAULT NULL,
  `total_payment` float NOT NULL,
  `order_status` enum('Masuk','Diproses','Diantar','Diterima') NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `info` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `receipent_name`, `receipent_phone`, `receipent_address`, `payment_method`, `payment_slip`, `total_payment`, `order_status`, `order_date`, `info`) VALUES
(58, 6, 'Site Customer', '081939448487', 'Jl. Bunga Matahari, No.11 Gomong Lama, Mataram', 'transfer', '1622267634513.PNG', 600000, 'Diproses', '2021-05-29 15:24:26', 'Lunas'),
(59, 6, 'Site Customer', '081939448487', 'Jl. Bunga Matahari, No.11 Gomong Lama, Mataram', 'cod', '', 54000, 'Diterima', '2021-05-29 15:24:37', 'Bayar Ditempat'),
(60, 6, 'Muhammad Kuswari', '081939448487', 'Jl. Bunga Matahari, No.11 Gomong Lama, Mataram', 'transfer', '1622327754617.jpg', 2014700, 'Masuk', '2021-05-29 22:35:54', 'Lunas'),
(61, 6, 'Site Customer', '081939448487', 'Jl. Bunga Matahari, No.11 Gomong Lama, Mataram', 'cod', '', 827400, 'Diproses', '2021-05-29 22:42:18', 'Bayar Ditempat'),
(62, 8, 'Ihsan', '08086969', 'Jl.GGWP', 'cod', '', 204000, 'Diterima', '2024-05-26 09:48:35', 'Bayar Ditempat'),
(63, 8, 'Ihsan', '08086969', 'Jl.GGWP', 'cod', '', 785000, 'Masuk', '2024-05-26 14:32:47', 'Bayar Ditempat'),
(67, 8, 'Ihsan', '08086969', 'Jl.GGWP', 'transfer', 'naruto.jpeg', 1040000, 'Masuk', '2024-05-26 18:43:34', 'Lunas'),
(68, 8, 'Ihsan', '08086969', 'Jl.GGWP', 'transfer', 'aot.jpeg', 150000, 'Masuk', '2024-05-26 19:08:24', 'Lunas'),
(69, 8, 'Ihsan', '08086969', 'Jl.GGWP', 'transfer', 'WhatsApp Image 2023-09-01 at 22.00.20.jpeg', 306000, 'Masuk', '2024-05-26 19:18:38', 'Lunas'),
(70, 8, 'Ihsan', '08086969', 'Jl.GGWP', 'transfer', 'IMG_0306.MOV', 150000, 'Masuk', '2024-05-26 19:22:26', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `orders_midtrans`
--

CREATE TABLE `orders_midtrans` (
  `order_id` char(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `gross_amount` int(128) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `transaction_time` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `va_number` varchar(50) NOT NULL,
  `pdf_url` text NOT NULL,
  `status_code` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `oder_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` float NOT NULL,
  `total_price` float NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`oder_details_id`, `order_id`, `item_id`, `qty`, `total_price`, `date_order`) VALUES
(36, 58, 3, 4, 600000, '2021-05-29 05:53:54'),
(37, 59, 7, 1, 54000, '2021-05-29 06:02:00'),
(39, 60, 6, 51, 1004700, '2021-05-29 22:35:54'),
(40, 60, 16, 1, 35000, '2021-05-29 22:35:54'),
(41, 61, 6, 42, 827400, '2021-05-29 22:38:35'),
(42, 62, 3, 1, 150000, '2024-05-25 18:07:25'),
(43, 62, 7, 1, 54000, '2024-05-25 18:07:25'),
(44, 63, 5, 1, 750000, '2024-05-26 14:32:47'),
(45, 63, 16, 1, 35000, '2024-05-26 14:32:47'),
(50, 67, 5, 1, 750000, '2024-05-26 18:43:34'),
(51, 67, 13, 1, 290000, '2024-05-26 18:43:34'),
(52, 68, 3, 1, 150000, '2024-05-26 19:08:24'),
(53, 69, 3, 1, 150000, '2024-05-26 19:18:38'),
(54, 69, 16, 1, 35000, '2024-05-26 19:18:38'),
(55, 69, 7, 1, 54000, '2024-05-26 19:18:38'),
(56, 69, 12, 1, 67000, '2024-05-26 19:18:38'),
(57, 70, 3, 1, 150000, '2024-05-26 19:22:26');

--
-- Triggers `order_details`
--
DELIMITER $$
CREATE TRIGGER `trigger_qty` AFTER INSERT ON `order_details` FOR EACH ROW BEGIN
	UPDATE items SET stock = stock-NEW.qty
    WHERE item_id = NEW.item_id;
END
$$
DELIMITER ;

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

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `gross_amount` decimal(10,2) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `transaction_time` datetime NOT NULL,
  `transaction_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_tokens`
--
ALTER TABLE `customer_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groomings`
--
ALTER TABLE `groomings`
  ADD PRIMARY KEY (`grooming_id`),
  ADD KEY `type_id` (`package_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `kuota_pet_boarding`
--
ALTER TABLE `kuota_pet_boarding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`customer_id`);

--
-- Indexes for table `orders_midtrans`
--
ALTER TABLE `orders_midtrans`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`oder_details_id`),
  ADD KEY `oder_id` (`order_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer_tokens`
--
ALTER TABLE `customer_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groomings`
--
ALTER TABLE `groomings`
  MODIFY `grooming_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kuota_pet_boarding`
--
ALTER TABLE `kuota_pet_boarding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `oder_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groomings`
--
ALTER TABLE `groomings`
  ADD CONSTRAINT `groomings_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `packages` (`package_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `groomings_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
