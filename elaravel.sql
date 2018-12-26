-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2018 at 04:07 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(4, 'Panjabi wala', 'Panjabi dsfsd', NULL, NULL, NULL),
(5, 'Women', 'Women shopiing', 1, NULL, NULL),
(6, 'kids', 'kids shoping', 1, NULL, NULL),
(7, 'Electronics', 'This is Electronics', 1, NULL, NULL),
(8, 'Laptop', 'This islaptop', 1, NULL, NULL),
(9, 'Bike', 'this is bike', 1, NULL, NULL),
(10, 'Mobile', 'this is mobile', 1, NULL, NULL),
(11, 'Furniture', 'This is furniture', 1, NULL, NULL),
(12, 'Jewlary', 'Jewlary', 1, NULL, NULL),
(13, 'Shoe', 'Shoe', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_08_022110_create_tbl_admin_table', 2),
(4, '2018_10_09_023453_create_category_table', 3),
(5, '2018_10_10_023041_create_tbl_brand_table', 4),
(6, '2018_10_14_135702_create_tbl_products_table', 5),
(7, '2018_10_18_174843_create_tbl_slider_table', 6),
(8, '2018_10_19_104906_create_tbl_customer_table', 7),
(9, '2018_10_19_122510_create_tbl_shipping_table', 8),
(10, '2018_10_19_142325_create_tbl_payment_table', 9),
(11, '2018_10_19_142642_create_tbl_order_table', 9),
(12, '2018_10_19_142707_create_tbl_order_detail_table', 9),
(13, '2018_10_19_143659_create_tbl_order_table', 10),
(14, '2018_10_19_143820_create_tbl_order_detail_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_phone`, `admin_password`, `created_at`, `updated_at`) VALUES
(1, 'ruhul', 'ruhul@g.com', '01749769449', '827ccb0eea8a706c4c34a16891f84e7b', '2018-10-07 18:00:00', '2018-10-07 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(9, 'Samsung', 'Samsung Mobile', 1, NULL, NULL),
(10, 'Mi', 'mi mobile', 1, NULL, NULL),
(11, 'Nokia', 'Nokia Mobile', 1, NULL, NULL),
(12, 'Dell', 'Dell Computer', 1, NULL, NULL),
(13, 'LG', 'LG refgirarator', 1, NULL, NULL),
(14, 'Walton', 'Walton mobile', 1, NULL, NULL),
(15, 'Easy', 'Easy Fashion', 1, NULL, NULL),
(16, 'Bata', 'Bata Shoe', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_cell_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_cell_no`, `customer_password`, `created_at`, `updated_at`) VALUES
(1, 'Md.Ruhul Amin', 'ruhul11bd@gmail.com', '01749769449', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL),
(2, 'Mumu Meri jan', 'mumu@gmail.com', '01749769449', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` int(11) NOT NULL,
  `order_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `payment_id`, `shipping_id`, `order_total`, `order_status`, `order_date_time`, `created_at`, `updated_at`) VALUES
(5, 1, 9, 3, '4323.9', 1, '2018-10-19 18:13:17', NULL, NULL),
(7, 1, 11, 5, '3248', 0, '2018-10-19 15:49:10', NULL, NULL),
(8, 1, 12, 6, '791.7', 0, '2018-10-19 15:52:04', NULL, NULL),
(9, 1, 13, 7, '3552.5', 1, '2018-10-19 17:25:41', NULL, NULL),
(11, 1, 15, 8, '1928.5', 1, '2018-10-19 17:25:39', NULL, NULL),
(12, 2, 16, 9, '5460.7', 0, '2018-10-19 18:27:41', NULL, NULL),
(13, 2, 17, 10, '1928.5', 0, '2018-10-28 15:10:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `order_detail_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`order_detail_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 'Nokia Charger', '780', '6', NULL, NULL),
(2, 1, 4, 'Nokia 6 Android', '750', '2', NULL, NULL),
(3, 2, 11, 'Nokia Charger', '780', '6', NULL, NULL),
(4, 2, 4, 'Nokia 6 Android', '750', '2', NULL, NULL),
(5, 3, 11, 'Nokia Charger', '780', '6', NULL, NULL),
(6, 3, 4, 'Nokia 6 Android', '750', '2', NULL, NULL),
(7, 4, 11, 'Nokia Charger', '780', '6', NULL, NULL),
(8, 4, 4, 'Nokia 6 Android', '750', '2', NULL, NULL),
(9, 5, 11, 'Nokia Charger', '780', '2', NULL, NULL),
(10, 5, 6, 'Pulser 314', '900', '3', NULL, NULL),
(11, 6, 9, 'Bata Converts', '1000', '4', NULL, NULL),
(12, 6, 6, 'Pulser 314', '900', '6', NULL, NULL),
(13, 7, 8, 'Ear Ring', '500', '2', NULL, NULL),
(14, 7, 10, 'Dhakai Sari', '1100', '2', NULL, NULL),
(15, 8, 11, 'Nokia Charger', '780', '1', NULL, NULL),
(16, 9, 10, 'Dhakai Sari', '1100', '1', NULL, NULL),
(17, 9, 5, 'Hp 3695', '800', '3', NULL, NULL),
(18, 10, 5, 'Hp 3695', '800', '1', NULL, NULL),
(19, 11, 6, 'Pulser 314', '900', '1', NULL, NULL),
(20, 11, 9, 'Bata Converts', '1000', '1', NULL, NULL),
(21, 12, 5, 'Hp 3695', '800', '2', NULL, NULL),
(22, 12, 8, 'Ear Ring', '500', '2', NULL, NULL),
(23, 12, 6, 'Pulser 314', '900', '1', NULL, NULL),
(24, 12, 11, 'Nokia Charger', '780', '1', NULL, NULL),
(25, 12, 10, 'Dhakai Sari', '1100', '1', NULL, NULL),
(26, 13, 7, 'Dining Table', '950', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` int(11) NOT NULL,
  `payment_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `payment_date_time`, `created_at`, `updated_at`) VALUES
(1, 'hand_cash', 0, '2018-10-19 15:20:22', NULL, NULL),
(2, 'hand_cash', 0, '2018-10-19 15:20:51', NULL, NULL),
(3, 'hand_cash', 0, '2018-10-19 15:23:17', NULL, NULL),
(4, 'hand_cash', 0, '2018-10-19 15:24:15', NULL, NULL),
(6, 'hand_cash', 0, '2018-10-19 15:25:47', NULL, NULL),
(7, 'bkash', 0, '2018-10-19 15:25:52', NULL, NULL),
(8, 'bkash', 0, '2018-10-19 15:35:41', NULL, NULL),
(9, 'master_card', 0, '2018-10-19 15:38:10', NULL, NULL),
(11, 'paypal', 0, '2018-10-19 15:49:10', NULL, NULL),
(12, 'master_card', 0, '2018-10-19 15:52:04', NULL, NULL),
(13, 'hand_cash', 0, '2018-10-19 16:34:56', NULL, NULL),
(14, 'hand_cash', 0, '2018-10-19 16:39:50', NULL, NULL),
(15, 'paypal', 0, '2018-10-19 16:40:58', NULL, NULL),
(16, 'bkash', 0, '2018-10-19 18:27:41', NULL, NULL),
(17, 'hand_cash', 0, '2018-10-28 15:10:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_brand` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_short_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double NOT NULL,
  `product_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_category`, `product_brand`, `product_name`, `product_short_desc`, `product_long_desc`, `product_price`, `product_image`, `product_color`, `product_size`, `product_status`, `created_at`, `updated_at`) VALUES
(2, 10, 10, 'Mi Mobile', 'dasfds2', 'dssdgs2', 700, 'public/images/products/QGL3wY9HtOIBoVItNQrT.jpg', 'fsdfsdfsd2', 'fsfsdf2', 1, NULL, NULL),
(3, 6, 9, 'Kids Shoe', 'fdsfsd', 'fdsfds', 850, 'public/images/products/f4yFQQq9XpDkXnnthlBy.jpg', 'fsdfsdfsd', 'fsfsdf', 1, NULL, NULL),
(4, 7, 11, 'Nokia 6 Android', 'fdsfsd', 'fsdfds', 750, 'public/images/products/0rGVmstwHv6rdmf2L7dq.jpg', 'fdsfsd', 'fdsfsd', 1, NULL, NULL),
(5, 8, 12, 'Hp 3695', 'fgdfg', 'gdgdgd', 800, 'public/images/products/rBNkhbtk4rOteiahxZkv.jpg', 'fsdfds', 'fdsfsdfdsfs', 1, NULL, NULL),
(6, 9, 13, 'Pulser 314', 'edsfgdfg', 'gdgdfg', 900, 'public/images/products/rflkQ8oEhRsGqoYuIg81.jpg', 'gdgdf', 'gfdgdfg', 1, NULL, NULL),
(7, 11, 14, 'Dining Table', 'fddfgfd', 'ggdfgdfgd', 950, 'public/images/products/sPor2sxqAjmCDvUcaTNs.jpg', 'gfdgdfg', 'gfdgdfg', 1, NULL, NULL),
(8, 12, 15, 'Ear Ring', 'fsfs', 'gsgfg', 500, 'public/images/products/DYMzH1tKTBDEyjqOjV2O.jpg', 'gdgd', 'gfgdgd', 1, NULL, NULL),
(9, 13, 16, 'Bata Converts', 'gfdgdfg', 'fdgdfgfdg', 1000, 'public/images/products/uAjcj5HGmMFljPH7D1Cd.jpg', 'gfdgfd', 'fgdfgdf', 1, NULL, NULL),
(10, 5, 9, 'Dhakai Sari', 'fssdfsdf', 'fsdfsdfd', 1100, 'public/images/products/Yg1XtzhWXN6VffdC6Zly.jpg', 'fsdfdsf', 'fsdfds', 1, NULL, NULL),
(11, 6, 11, 'Nokia Charger', 'dhggf', 'hgfhf', 780, 'public/images/products/iufvbirsJQmJ1csL5Ou2.jpg', 'gdhgjdh', 'fddhdhg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shiping_id` int(10) UNSIGNED NOT NULL,
  `shipping_first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shiping_id`, `shipping_first_name`, `shipping_last_name`, `shipping_email`, `shipping_address`, `shipping_contact_no`, `shipping_city`, `created_at`, `updated_at`) VALUES
(3, 'Md.Ruhul', 'Amin', 'ruhul11bd@gmail.com', '26/1 South Komlapur', '01749769449', 'Dhaka', NULL, NULL),
(5, 'Md.Ruhul', 'Amin', 'ruhul11bd@gmail.com', '26/1 South Komlapur', '01749769449', 'Dhaka', NULL, NULL),
(6, 'Md.Ruhul', 'Amin', 'ruhul11bd@gmail.com', '26/1 South Komlapur', '01749769449', 'Dhaka', NULL, NULL),
(7, 'Md.Ruhul', 'Amin', 'ruhul11bd@gmail.com', '26/1 South Komlapur', '01749769449', 'Dhaka', NULL, NULL),
(8, 'Md.Ruhul', 'Amin', 'ruhul11bd@gmail.com', '26/1 South Komlapur', '01749769449', 'Dhaka', NULL, NULL),
(9, 'Md.Ruhul', 'Amin', 'ruhul11bd@gmail.com', '26/1 South Komlapur', '01749769449', 'Dhaka', NULL, NULL),
(10, 'Md.Ruhul', 'Amin', 'ruhul11bd@gmail.com', '26/1 South Komlapur', '01749769449', 'Dhaka', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(10) UNSIGNED NOT NULL,
  `slider_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_title`, `slider_image`, `slider_status`, `created_at`, `updated_at`) VALUES
(1, 'kisu', 'public/images/slider/01v6w95Kb1RTOLVEd6gI.jpg', 1, NULL, NULL),
(2, 'kisu', 'public/images/slider/3A9VANwZWZ2jAgSZXbc0.jpg', 1, NULL, NULL),
(4, 'kisu', 'public/images/slider/TeWgKUROrPsT78dSpsiL.jpg', 1, NULL, NULL),
(5, 'kisu', 'public/images/slider/W3IJAfeEcOIYc0XUeyDi.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shiping_id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `order_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shiping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
