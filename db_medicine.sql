-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2017 at 05:07 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_medicine1`
--

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
  `district_id` int(10) unsigned NOT NULL,
  `district_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`district_id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(10) unsigned NOT NULL,
  `seller_id` int(11) NOT NULL,
  `invoice_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `seller_id`, `invoice_id`, `created_at`, `updated_at`) VALUES
(1, 4, 'HQ1HVgFl5u', NULL, NULL),
(2, 4, 'kH69N4LU0Q', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2017_09_23_073748_create_tbl_admins_table', 1),
(12, '2017_09_23_092859_create_sellers_table', 1),
(13, '2017_09_23_160047_create_categories_table', 2),
(14, '2017_09_23_174044_create_suppliers_table', 3),
(15, '2017_09_23_205555_create_tbl__products_table', 4),
(20, '2017_09_26_185737_create_purchase_table', 5),
(21, '2017_09_26_200820_create_stock_table', 5),
(22, '2017_09_30_200925_create_districts_table', 6),
(23, '2017_09_30_201121_create_pstations_table', 6),
(25, '2017_10_04_165429_create_tbl_payment_table', 7),
(26, '2017_10_07_100739_create_tbl_warning_table', 8),
(29, '2017_11_13_170530_create_tbl__vouchers_table', 9),
(31, '2017_11_15_065652_create_tb_sales_table', 10),
(33, '2017_11_15_074131_create_invoices_table', 11),
(34, '2017_11_16_190209_create_tbl_registrations_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pstations`
--

CREATE TABLE IF NOT EXISTS `pstations` (
  `pstation_id` int(10) unsigned NOT NULL,
  `pstation_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pstations`
--

INSERT INTO `pstations` (`pstation_id`, `pstation_name`, `district_id`, `created_at`, `updated_at`) VALUES
(1, 'Dhanmondi', 1, NULL, NULL),
(2, 'Kolabagan', 1, NULL, NULL),
(3, 'Tejgaon', 1, NULL, NULL),
(4, 'Mirpur', 1, NULL, NULL),
(5, 'Gulshan', 1, NULL, NULL),
(6, 'Motijheel', 1, NULL, NULL),
(7, 'Badda', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `purchase_id` int(10) unsigned NOT NULL,
  `product_id` int(11) NOT NULL,
  `total_purchase_price` double(8,2) NOT NULL,
  `total_advance_price` double(8,2) NOT NULL,
  `total_due_price` double(8,2) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `paymet_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `product_id`, `total_purchase_price`, `total_advance_price`, `total_due_price`, `product_qty`, `supplier_id`, `seller_id`, `paymet_status`, `created_at`, `updated_at`) VALUES
(1, 6, 2500.00, 2500.00, 0.00, 500, 1, 1, NULL, '2017-11-23 18:00:00', NULL),
(2, 7, 51000.00, 50000.00, 1000.00, 300, 1, 1, NULL, '2017-11-23 18:00:00', NULL),
(3, 4, 400.00, 400.00, 0.00, 200, 3, 1, NULL, '2017-11-23 18:00:00', NULL),
(4, 5, 2500.00, 2000.00, 500.00, 50, 3, 1, NULL, '2017-11-23 18:00:00', NULL),
(5, 1, 200.00, 200.00, 0.00, 100, 4, 1, NULL, '2017-11-23 18:00:00', NULL),
(6, 2, 17500.00, 15000.00, 2500.00, 250, 4, 1, NULL, '2017-11-23 18:00:00', NULL),
(7, 3, 600.00, 500.00, 100.00, 200, 4, 1, NULL, '2017-11-23 18:00:00', NULL),
(8, 8, 4000.00, 4000.00, 0.00, 20, 5, 4, NULL, '2017-11-23 18:00:00', NULL),
(9, 9, 500.00, 300.00, 200.00, 100, 5, 4, NULL, '2017-11-23 18:00:00', NULL),
(10, 12, 300.00, 300.00, 0.00, 100, 6, 4, NULL, '2017-11-23 18:00:00', NULL),
(11, 10, 500.00, 400.00, 100.00, 50, 6, 4, NULL, '2017-11-23 18:00:00', NULL),
(12, 11, 1000.00, 800.00, 200.00, 200, 6, 4, NULL, '2017-11-23 18:00:00', NULL),
(13, 13, 1200.00, 1000.00, 200.00, 200, 7, 4, NULL, '2017-11-23 18:00:00', NULL),
(14, 15, 1000.00, 800.00, 200.00, 20, 8, 4, NULL, '2017-11-23 18:00:00', NULL),
(15, 14, 3250.00, 3250.00, 0.00, 50, 8, 4, NULL, '2017-11-23 18:00:00', NULL),
(16, 13, 300.00, 250.00, 50.00, 50, 7, 4, NULL, '2017-11-23 18:00:00', NULL),
(17, 33, 115.00, 115.00, 0.00, 5, 14, 5, NULL, '2017-11-23 18:00:00', NULL),
(18, 32, 500.00, 300.00, 200.00, 20, 14, 5, NULL, '2017-11-23 18:00:00', NULL),
(19, 31, 1000.00, 800.00, 200.00, 20, 14, 5, NULL, '2017-11-23 18:00:00', NULL),
(20, 27, 100.00, 100.00, 0.00, 100, 13, 5, NULL, '2017-11-23 18:00:00', NULL),
(21, 28, 2500.00, 2000.00, 500.00, 5, 13, 5, NULL, '2017-11-23 18:00:00', NULL),
(22, 26, 200.00, 150.00, 50.00, 50, 13, 5, NULL, '2017-11-23 18:00:00', NULL),
(23, 30, 1050.00, 600.00, 450.00, 30, 14, 5, NULL, '2017-11-23 18:00:00', NULL),
(24, 35, 1500.00, 1000.00, 500.00, 500, 5, 4, NULL, '2017-11-23 18:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE IF NOT EXISTS `sellers` (
  `seller_id` int(10) unsigned NOT NULL,
  `seller_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_address` text COLLATE utf8mb4_unicode_ci,
  `seller_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_policeStation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_label` tinyint(4) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`seller_id`, `seller_name`, `shop_name`, `seller_email`, `seller_picture`, `seller_address`, `seller_phone`, `seller_district`, `seller_policeStation`, `seller_label`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sajal Kundu', 'Sk Pharmacy', 'sajalkundu098@gmail.com', NULL, NULL, '01708034562', '1', '6', 0, '827ccb0eea8a706c4c34a16891f84e7b', NULL, '2017-11-24 01:16:29', NULL),
(2, 'Nazmul', 'Sheba Pharmcy', 'nazmuldiu8@gmail.com', NULL, NULL, '01713602527', '1', '2', 0, '827ccb0eea8a706c4c34a16891f84e7b', NULL, '2017-11-24 01:19:50', NULL),
(3, 'Mihir', 'Nupur Pharmechy', 'nupurdiu8@gmail.com', NULL, NULL, '01735477378', '1', '5', 0, '827ccb0eea8a706c4c34a16891f84e7b', NULL, '2017-11-24 01:22:38', NULL),
(4, 'Abdul Alim', 'Ma Pharmacy', 'alim.diu16@gmail.com', 'public/seller_picture/4HCGcHJYwFQ2G0X9AwhQ.png', NULL, '01675342612', '1', '3', 0, 'e10adc3949ba59abbe56e057f20f883e', NULL, '2017-11-24 01:24:24', '2017-11-24 00:20:09'),
(5, 'Solaiman Ahmed', 'Medicine Shop', 'solaiman.cse14@gmail.com', NULL, NULL, '01685695989', '1', '4', 0, 'd41d8cd98f00b204e9800998ecf8427e', NULL, '2017-11-24 01:26:36', '2017-11-24 00:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `stock_id` int(10) unsigned NOT NULL,
  `product_id` int(11) NOT NULL,
  `barcode` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `district_id` int(11) NOT NULL,
  `pstation_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `product_id`, `barcode`, `product_qty`, `supplier_id`, `seller_id`, `created_at`, `updated_at`, `district_id`, `pstation_id`) VALUES
(1, 6, '6-0', 500, 1, 1, '2017-11-23 18:00:00', NULL, 1, 6),
(2, 7, '7-0', 300, 1, 1, '2017-11-23 18:00:00', NULL, 1, 6),
(3, 4, '4-0', 200, 3, 1, '2017-11-23 18:00:00', NULL, 1, 6),
(4, 5, '5-0', 50, 3, 1, '2017-11-23 18:00:00', NULL, 1, 6),
(5, 1, '1-0', 100, 4, 1, '2017-11-23 18:00:00', NULL, 1, 6),
(6, 2, '2-0', 250, 4, 1, '2017-11-23 18:00:00', NULL, 1, 6),
(7, 3, '3-0', 200, 4, 1, '2017-11-23 18:00:00', NULL, 1, 6),
(8, 8, '8-0', 20, 5, 4, '2017-11-23 18:00:00', NULL, 1, 3),
(9, 9, '9-0', 100, 5, 4, '2017-11-23 18:00:00', NULL, 1, 3),
(10, 12, '12-0', 100, 6, 4, '2017-11-23 18:00:00', NULL, 1, 3),
(11, 10, '10-0', 50, 6, 4, '2017-11-23 18:00:00', NULL, 1, 3),
(12, 11, '11-0', 180, 6, 4, '2017-11-23 18:00:00', NULL, 1, 3),
(13, 13, '13-0', 200, 7, 4, '2017-11-23 18:00:00', NULL, 1, 3),
(14, 15, '15-0', 20, 8, 4, '2017-11-23 18:00:00', NULL, 1, 3),
(15, 14, '14-0', 50, 8, 4, '2017-11-23 18:00:00', NULL, 1, 3),
(16, 33, '33-0', 5, 14, 5, '2017-11-23 18:00:00', NULL, 1, 4),
(17, 32, '32-0', 20, 14, 5, '2017-11-23 18:00:00', NULL, 1, 4),
(18, 31, '31-0', 20, 14, 5, '2017-11-23 18:00:00', NULL, 1, 4),
(19, 27, '27-0', 100, 13, 5, '2017-11-23 18:00:00', NULL, 1, 4),
(20, 28, '28-0', 5, 13, 5, '2017-11-23 18:00:00', NULL, 1, 4),
(21, 26, '26-0', 50, 13, 5, '2017-11-23 18:00:00', NULL, 1, 4),
(22, 30, '30-0', 30, 14, 5, '2017-11-23 18:00:00', NULL, 1, 4),
(23, 35, '35-0', 500, 5, 4, '2017-11-23 18:00:00', NULL, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `supplier_id` int(10) unsigned NOT NULL,
  `supplier_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) DEFAULT NULL,
  `seller_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `supplier_description`, `supplier_phone`, `status`, `seller_id`, `created_at`, `updated_at`) VALUES
(1, 'Beximco', 'Today the BEXIMCO Group ("BEXIMCO" or the "Group") is the largest private sector group in Bangladesh.', '029854488', NULL, 1, '2017-11-24 01:30:22', NULL),
(2, 'Incepta', 'Incepta Pharmaceuticals Ltd. is a leading pharmaceutical company in Bangladesh established in the year 1999.', '028891190', NULL, 1, '2017-11-24 01:31:42', NULL),
(3, 'Square', 'SQUARE today symbolizes a name – a state of mind. But its journey to the growth and prosperity has been no bed of roses.', '029859007', NULL, 1, '2017-11-24 01:33:20', NULL),
(4, 'ACME', 'The ACME Laboratories Ltd. is a leading company for manufacturing world-class and top-quality pharmaceutical products in Bangladesh.', '01713426841', NULL, 1, '2017-11-24 01:35:50', NULL),
(5, 'Incepta', 'We produce and market over 300 Brands in the local and international market.', '01786543233', NULL, 4, '2017-11-24 02:55:33', NULL),
(6, 'Beximco', 'Bangladeshi Company.', '01675243546', NULL, 4, '2017-11-24 03:04:07', NULL),
(7, 'Acme', 'For Health and Happiness', '0155906732', NULL, 4, '2017-11-24 03:19:17', NULL),
(8, 'Square', 'Square Pharmaceuticals Limited, the flagship company of Square Group, is holding the strong leadership position in the pharmaceutical industry of Bangladesh since 1985 and is now on its way to becoming a high performance global player.', '01817563454', NULL, 4, '2017-11-23 21:55:23', NULL),
(9, 'Aci', 'In 1973, the UK based multinational pharmaceutical company.', '01919346723', NULL, 4, '2017-11-23 21:56:22', NULL),
(10, 'Square', 'Bangladeshi Pharmaceuticals  Company.', '01675235434', NULL, 2, '2017-11-23 22:14:41', NULL),
(11, 'Reneta', 'Bangladeshi Pharmaceuticals Company', '01679323465', NULL, 2, '2017-11-23 22:25:15', NULL),
(12, 'Aristopharma', 'Renowned BD Company.', '01672352435', NULL, 2, '2017-11-23 22:31:57', NULL),
(13, 'Beximco', 'Beximco Here For Life', '01911454545', NULL, 5, '2017-11-23 22:46:23', NULL),
(14, 'Square', 'Square Pharmaceuticals Limited.', '01922334455', NULL, 5, '2017-11-23 22:57:31', NULL),
(15, 'Incepta', 'Incepta produce and market over 300 Brands in the local and international market', '017223344455', NULL, 5, '2017-11-23 23:14:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admins`
--

CREATE TABLE IF NOT EXISTS `tbl_admins` (
  `admin_id` int(10) unsigned NOT NULL,
  `admin_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_label` tinyint(4) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admins`
--

INSERT INTO `tbl_admins` (`admin_id`, `admin_name`, `admin_email`, `admin_picture`, `admin_address`, `admin_phone`, `admin_label`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alim', 'alim.diu16@gmail.com', '', '', '0999999', 3, '827ccb0eea8a706c4c34a16891f84e7b', NULL, '2017-11-19 18:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_month`
--

CREATE TABLE IF NOT EXISTS `tbl_month` (
  `month_id` int(11) NOT NULL,
  `month_name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_month`
--

INSERT INTO `tbl_month` (`month_id`, `month_name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `payment_id` int(10) unsigned NOT NULL,
  `amount` int(50) DEFAULT NULL,
  `seller_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `transaction_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `warning_lavel` int(3) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `amount`, `seller_id`, `month`, `year`, `transaction_id`, `account_number`, `pay_method`, `created_at`, `updated_at`, `warning_lavel`) VALUES
(6, NULL, 1, 11, 2017, NULL, NULL, NULL, '2017-11-24 00:29:00', NULL, 1),
(7, NULL, 2, 11, 2017, NULL, NULL, NULL, '2017-11-24 00:29:00', NULL, 1),
(8, NULL, 3, 11, 2017, NULL, NULL, NULL, '2017-11-24 00:29:00', NULL, 1),
(9, NULL, 4, 11, 2017, NULL, NULL, NULL, '2017-11-24 00:29:00', NULL, 1),
(10, NULL, 5, 11, 2017, NULL, NULL, NULL, '2017-11-24 00:29:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registrations`
--

CREATE TABLE IF NOT EXISTS `tbl_registrations` (
  `seller_id` int(10) unsigned NOT NULL,
  `seller_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_phone` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `policestation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_registrations`
--

INSERT INTO `tbl_registrations` (`seller_id`, `seller_name`, `seller_email`, `seller_phone`, `district`, `policestation`, `shop_name`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Jitu Shahriar', 'aralim11@gmail.com', '01675424352', '1', '4', 'jitu Medicine', 'i want to be a seller.', '2017-11-23 23:55:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_warning`
--

CREATE TABLE IF NOT EXISTS `tbl_warning` (
  `warning_id` int(10) unsigned NOT NULL,
  `seller_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `warning_lavel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl__products`
--

CREATE TABLE IF NOT EXISTS `tbl__products` (
  `product_id` int(10) unsigned NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` double(8,2) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `retail_price` double(8,2) NOT NULL,
  `vat_tax` double(8,2) NOT NULL,
  `product_picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_mg` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` int(11) NOT NULL,
  `pstation_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl__products`
--

INSERT INTO `tbl__products` (`product_id`, `product_name`, `product_details`, `purchase_price`, `sale_price`, `retail_price`, `vat_tax`, `product_picture`, `supplier_id`, `seller_id`, `created_at`, `updated_at`, `product_mg`, `district_id`, `pstation_id`) VALUES
(1, 'A-Cal', 'For the prevention and/or treatment of osteoporosis, fractures, osteomalacia, rickets, tetany, pseudo-parathyroidism.', 2.00, 3, 4.00, 1.20, 'public/product_picture/YND7WV2WKXHC44BkU9iL.jpg', 4, 1, '2017-11-23 18:00:00', NULL, '500mg', 1, 6),
(2, 'Baby_Zink', 'For the treatment of diarrhoea with Oral Rehydration Salts (ORS) in children between 6 months and 5 years of age.', 70.00, 75, 60.00, 2.00, 'public/product_picture/jzVWv62igOe96i1aaQXC.jpg', 4, 1, '2017-11-23 18:00:00', NULL, '20 mg', 1, 6),
(3, 'Cinazin Plus', 'Use in the treatment of vertigo symptoms of various origins', 3.00, 4, 5.00, 0.50, 'public/product_picture/UbJmiA0zYbCTv8s5lm5e.jpg', 4, 1, '2017-11-23 18:00:00', NULL, '20 mg', 1, 6),
(4, 'Ace Plus', 'Fever, headache, migraine, muscle ache, backache, toothache & menstrual pain.', 2.00, 3, 4.00, 0.20, 'public/product_picture/AFFcHzJ7LfndlHfAyGjv.jpg', 3, 1, '2017-11-23 18:00:00', NULL, '500mg', 1, 6),
(5, 'Sedil Injection', 'Anxiety pain from apprehension and depression, acute and chronic stress of life, skeletal muscle spasm and strychnine poisoning.', 50.00, 55, 58.00, 3.00, 'public/product_picture/UckEXNIJjIuj3sXfAsG2.jpg', 3, 1, '2017-11-23 18:00:00', NULL, '30mg', 1, 6),
(6, 'Bexidal', 'There are no adequate and well controlled studies in pregnant women.', 5.00, 6, 7.00, 0.30, 'public/product_picture/FJh5uAlx2SVXjqxz0TSw.jpg', 1, 1, '2017-11-23 18:00:00', NULL, '50mg', 1, 6),
(7, 'Bextram Gold', 'Your body has shown hypersensitivity to any component of the preparation.', 170.00, 175, 178.00, 0.80, 'public/product_picture/rxq4g37QIXGaNouANYBX.jpg', 1, 1, '2017-11-23 18:00:00', NULL, '500mg', 1, 6),
(8, 'Adora', 'Adora 500 Capsule: Each capsule contains Cefadroxil Monohydrate USP equivalent to Cefadroxil 500 mg.Adora Powder for Suspension: When reconstituted each 5 ml of suspension contains Cefadroxil Monohydrate USP equivalent to Cefadroxil 125 mg.Adora Powder for Paediatric Drops: When reconstituted each 1.25 ml contains Cefadroxil Monohydrate USP equivalent to Cefadroxil 125 mg.', 200.00, 230, 180.00, 5.00, 'public/product_picture/LjBkzCIuuTHE2eexIkob.jpg', 5, 4, '2017-11-23 18:00:00', NULL, '500mg', 1, 3),
(9, 'Alestor', 'Allylestrenol is an orally active gestagen. Allylestrenol has a pronounced pregnancy maintaining action in castrated animals without producing hormonal side-effects. In the human, premature termination of pregnancy often follows a fall in the levels of placental hormones.', 5.00, 7, 4.00, 0.15, 'public/product_picture/iVZXIGSs5S3BJAZKPiIM.jpg', 5, 4, '2017-11-23 18:00:00', NULL, '5mg', 1, 3),
(10, 'Hemofix FZ', 'It is contraindicated in patients with haemolytic anaemia and in conditions with increased hypersensitivity to any of its components and increased body iron content.', 10.00, 14, 8.00, 1.00, 'public/product_picture/hMMs7gLTDTTJ9tXah3Ul.jpg', 6, 4, '2017-11-23 18:00:00', NULL, '100mg', 1, 3),
(11, 'Gastalfet', 'Gastalfet tablet contains 500 mg of Sucralfate (basic aluminium salt of sucrose octa sulphate).There are no known contraindications.The product should only be used with caution in patients with renal dysfunction.', 5.00, 7, 4.00, 0.10, 'public/product_picture/yDYA6Q9LtDGspdDrq1w0.jpg', 6, 4, '2017-11-23 18:00:00', NULL, '500mg', 1, 3),
(12, 'Acifix', 'Acifix® is prescription medicine in the class of proton pump inhibitors. It is indicated for faster relief from Acid Peptic Diseases. It works by reducing the amount of acid in stomach by inhibiting proton pump. It provides faster onset of action due to higher Pka value of Rabeprazole Sodium.', 3.00, 5, 4.00, 0.30, 'public/product_picture/cqY5FOJDkoMz9F4vhfcb.jpg', 6, 4, '2017-11-23 18:00:00', NULL, '20mg', 1, 3),
(13, 'BET-A', 'Suppression of inflammatory and allergic disorders including rheumatoid arthritis, rheumatoid carditis, severe hypersensitivity reactions, bronchial asthma, inflammatory skin disorders; congenital adrenal hyperplasia; ear, eye, nose and oral ulceration.', 6.00, 7, 5.00, 0.50, 'public/product_picture/4rWh2T0hHkZutMjrxYNU.jpg', 7, 4, '2017-11-23 18:00:00', NULL, '0.50mg', 1, 3),
(14, 'Afun', 'Dermatomycoses due to candida, trichophyton, moulds and other fungi, skin diseases showing superinfections with these fungi e.g. inter digital mycoses, paronychia, candida vulvitis, balanitis, pityriasis versicolor and erythrasma.', 65.00, 75, 70.00, 2.00, 'public/product_picture/ZhKFLY8NAHZNRMsz3qDd.jpg', 8, 4, '2017-11-23 18:00:00', NULL, '10mg', 1, 3),
(15, 'Ace', 'Fever, headache, toothache, earache, bodyache, myalgia, dysmenorrhoea, neuralgia and sprains. Pain of colic, back pain, chronic pain of cancer, inflammatory pain, and post-vaccination pain and fever of children. Rheumatism and osteoarthritic pain & stiffness of joints in fingers, hips, knees, wrists, elbows, feet, ankles and top & bottom of the spine.', 50.00, 70, 60.00, 0.30, 'public/product_picture/HG9g3FAk9otkVZTYSZje.jpg', 8, 4, '2017-11-23 18:00:00', NULL, '500mg', 1, 3),
(17, 'Elzer', 'Indicated for the treatment of mild to moderate dementia of the Alzheimer''s type.', 6.00, 8, 7.00, 0.13, 'public/product_picture/mXhbV9CnF7O9cS7wpVUy.jpg', 10, 2, '2017-11-23 18:00:00', NULL, '5mg', 1, 2),
(18, 'Calbo C', 'Indicated in - Increased demand for Calcium and Vitamin C, e.g. pregnancy, lactation, periods of rapid growth (childhood, adolescence), in old age; During infectious disease and convalescence; Treatment of calcium and vitamin C deficiency; Osteoporosis; Premenstrual syndrome; Postmenopausal problems; Adjuvant in colds and influenza.', 88.00, 95, 90.00, 7.00, 'public/product_picture/z2S9e1a5v9eqDQWk4z8x.jpg', 10, 2, '2017-11-23 18:00:00', NULL, '100ml', 1, 2),
(19, 'Algin', 'Anti - Spasmodic', 3.00, 5, 4.00, 0.10, 'public/product_picture/cwaqmfDEwaqmNm9mcNdG.jpg', 11, 2, '2017-11-23 18:00:00', NULL, '50mg', 1, 2),
(20, 'Calcin', 'Calcium Carbonate,Calcin', 8.00, 10, 9.00, 0.15, 'public/product_picture/lq97a9Ow4srl7Mvc0K7R.jpg', 11, 2, '2017-11-23 18:00:00', NULL, '500mg', 1, 2),
(21, 'Afix', 'Afix (Cefixime) is a broad spectrum 3rd generation cephalosporin antibiotic for oral administration. It is a bactericidal antibiotic and is stable to hydrolysis by many beta-lactamases. Cefixime kills bacteria by interfering the synthesis of the bacterial cell wall.', 45.00, 55, 50.00, 4.00, 'public/product_picture/8xduJTFwjFWvwivcS0x5.png', 12, 2, '2017-11-23 18:00:00', NULL, '400mg', 1, 2),
(22, 'Axim', 'Cefuroxime is a semi-synthetic, broad-spectrum 2nd generation cephalosporin antibiotic for oral & parenteral administration. Cefuroxime is active against a wide range of gram-positive & gram-negative bacteria including Staphylococcus aureus, Streptococcus pyogenes, Streptococcus pneumoniae, Neisseria spp, Haemophilus influenzae and many common gram- negative hospital pathogenes such as Escherichia coli, Klebsiella spp., Proteus mirabilis. Axim has noteworthy activity against beta-lactamase producing strains of Haemophilus influenzae and Neisseria gonorrhoeae, which are resistant to ampicillin and penicillin respectively', 400.00, 450, 430.00, 20.00, 'public/product_picture/fRdQa0tHjPW8LT2LwXwt.jpg', 12, 2, '2017-11-23 18:00:00', NULL, '250mg', 1, 2),
(23, 'Clinex', 'Clindamycin inhibits bacterial protein synthesis by binding to the 50S subunit of the ribosome. It is active against Gram-positive aerobes and anaerobes as well as the Gram-negative anaerobes. Clindamycin has been shown to be active against most of the isolates of the following microorganism', 3.00, 5, 4.00, 0.30, 'public/product_picture/HNLdLaQadM90Ci75fYZw.jpg', 12, 2, '2017-11-23 18:00:00', NULL, '25ml', 1, 2),
(24, 'Dextromethorphan', 'Dextromethorphan® is Syrup is a cherry flavoured liquid containing Dextromethorphan Hydrobromide which is an antitussive.\r\nDextromethorphan® is indicated for the symptomatic relief of dry cough.', 25.00, 30, 27.00, 0.20, 'public/product_picture/YRVQt59BXM5jlLSl69A6.jpg', 13, 5, '2017-11-23 18:00:00', NULL, '100ml', 1, 4),
(25, 'Betapro', 'Betapro® is the preparation of bisoprolol fumarate, a highly cardioselective beta1-selective adrenoceptor blocking agent. It is used for the management of hypertension', 3.00, 5, 4.00, 0.15, 'public/product_picture/PnBIqfxgSACDOm0kDbpC.jpg', 13, 5, '2017-11-23 18:00:00', NULL, '10mg', 1, 4),
(26, 'Filmet', 'Filmet is a sterile, pyrogen free, isotonic formulation for intravenous administration in susceptible life threatening infections. Each 100ml solution contains Metronidazole USP 500mg. Metronidazole is a nitroimidazole with antiprotozoal and antibacterial actions. It is highly effective against Trichomonas vaginalis, Entamoeba histolytica and Giardia lamblia. It has a bactericidal action against a wide range of pathogenic anaerobic microorganisms particularly species of Bacteroides, Fusobacteria, Clostridia, Eubacteria, Anaerobic Cocci and Gardnerella vaginalis.', 4.00, 6, 5.00, 0.14, 'public/product_picture/U9GjmawFCgGIxbr6DVew.jpg', 13, 5, '2017-11-23 18:00:00', NULL, '200mg', 1, 4),
(27, 'Napa', 'Napa® (Paracetamol) is a fast acting and safe analgesic with marked antipyretic property.\r\n\r\nIt is recommended for the treatment of most painful and febrile conditions, such as headache, toothache, backache, rheumatic and muscle pains, dysmenorrhoea, sore throat, and for relieving the fever, aches and pains of colds and flu.', 1.00, 3, 2.00, 0.14, 'public/product_picture/IQ1tvJBRBqowWNs0ZS67.jpg', 13, 5, '2017-11-23 18:00:00', NULL, '500mg', 1, 4),
(28, 'Koloride', 'Koloride is a sterile solution of Sodium Chloride, Potassium Chloride and Sodium Acetate. Koloride contains different electrolytes which are usually depleted in various conditions e.g. diarrhoea, vomiting, profuse sweating etc. So, Koloride is indicated in cholera, also in diarrhoea, vomiting, fluid loss, to replenish and restore the normal electrolyte balance of the body.', 500.00, 600, 550.00, 25.00, 'public/product_picture/VALOOi29rCdFl53J8OF2.jpg', 13, 5, '2017-11-23 18:00:00', NULL, '1000ml', 1, 4),
(29, 'Fortunate', 'It is type of organo-phosphorus insecticide having contract, stomach & systemic in action. It is highly effective against BPH of rice. Each kilogram content 750 gm Acephate as active ingredient', 20.00, 25, 22.00, 1.00, 'public/product_picture/NnQrT1Xe4DbEGiFTIKlh.png', 14, 5, '2017-11-23 18:00:00', NULL, '100mg', 1, 4),
(30, 'Fona', 'Acne.', 35.00, 50, 45.00, 3.00, 'public/product_picture/XJ0iE9GtxKAcMyVwWdqg.jpg', 14, 5, '2017-11-23 18:00:00', NULL, '10mg', 1, 4),
(31, 'Togent', 'Togent® cream is used to temporarily relieve pain and itching associated with: insect bites, minor burns, sunburn, minor skin irritations, minor cuts, scrapes, rashes due to poison ivy, poison oak, and poison sumac, dries the oozing and weeping of poison ivy, poison oak, and poison sumac.', 50.00, 60, 56.00, 4.00, 'public/product_picture/XOIo9FigPivE2X1yq7LH.jpg', 14, 5, '2017-11-23 18:00:00', NULL, '10mg', 1, 4),
(32, 'Xfin', 'Fungal infections of the skin caused by candida dermatophytes, candida Pityriasis versicolor.', 25.00, 35, 30.00, 3.00, 'public/product_picture/lrpqHliOFnh80bk5p6Sl.jpg', 14, 5, '2017-11-23 18:00:00', NULL, '5mg', 1, 4),
(33, 'Alatrol', 'Alatrol® is indicated for the relief of symptoms associated with seasonal allergic rhinitis due to allergen. Symptoms treated effectively include sneezing, rhinorrhea, pruritus, ocular pruritus, tearing and redness of the eyes. Alatrol® is indicated for the relief of symptoms associated with perennial allergic rhinitis due to allergens. Symptoms treated effectively include sneezing, rhinorrhea, post-nasal discharge, nasal pruritus, ocular pruritus and tearing. Alatrol® is indicated for the treatment of the uncomplicated skin manifestations of chronic idiopathic urticaria.', 23.00, 30, 27.00, 2.00, 'public/product_picture/kGWMi5Teb7Gci2xUcy6D.jpg', 14, 5, '2017-11-23 18:00:00', NULL, '15ml', 1, 4),
(34, 'Actidex', 'Each tablet contains Dexketoprofen Trometamol equivalent to Dexketoprofen INN 25 mg.', 3.00, 5, 4.00, 0.15, 'public/product_picture/rPjvD2YY2mPAx0w4Sig6.jpg', 15, 5, '2017-11-23 18:00:00', NULL, '25mg', 1, 4),
(35, 'Actidex', 'Each tablet contains Dexketoprofen Trometamol equivalent to Dexketoprofen INN 25 mg.', 3.00, 5, 4.00, 0.14, 'public/product_picture/O8fqL4JPOLT41GHGP4ff.jpg', 5, 4, '2017-11-23 18:00:00', NULL, '25 mg', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl__vouchers`
--

CREATE TABLE IF NOT EXISTS `tbl__vouchers` (
  `voucher_id` int(10) unsigned NOT NULL,
  `sale_qty` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total` float NOT NULL,
  `vat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sales`
--

CREATE TABLE IF NOT EXISTS `tb_sales` (
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_id` int(11) NOT NULL,
  `sale_price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `vat` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `salesid` int(11) NOT NULL,
  `invoice_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_sales`
--

INSERT INTO `tb_sales` (`product_name`, `seller_id`, `sale_price`, `quantity`, `vat`, `created_at`, `updated_at`, `salesid`, `invoice_id`, `total`) VALUES
('Gastalfet', 4, 7.00, 20, 0.10, '2017-11-23 18:00:00', NULL, 1, '1', 140),
('BET-A', 4, 7.00, 50, 0.50, '2017-11-23 18:00:00', NULL, 2, '2', 350);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pstations`
--
ALTER TABLE `pstations`
  ADD PRIMARY KEY (`pstation_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`seller_id`), ADD UNIQUE KEY `sellers_seller_email_unique` (`seller_email`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  ADD PRIMARY KEY (`admin_id`), ADD UNIQUE KEY `tbl_admins_admin_email_unique` (`admin_email`);

--
-- Indexes for table `tbl_month`
--
ALTER TABLE `tbl_month`
  ADD PRIMARY KEY (`month_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_registrations`
--
ALTER TABLE `tbl_registrations`
  ADD PRIMARY KEY (`seller_id`);

--
-- Indexes for table `tbl_warning`
--
ALTER TABLE `tbl_warning`
  ADD PRIMARY KEY (`warning_id`);

--
-- Indexes for table `tbl__products`
--
ALTER TABLE `tbl__products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl__vouchers`
--
ALTER TABLE `tbl__vouchers`
  ADD PRIMARY KEY (`voucher_id`);

--
-- Indexes for table `tb_sales`
--
ALTER TABLE `tb_sales`
  ADD PRIMARY KEY (`salesid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `district_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `pstations`
--
ALTER TABLE `pstations`
  MODIFY `pstation_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `seller_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  MODIFY `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_month`
--
ALTER TABLE `tbl_month`
  MODIFY `month_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_registrations`
--
ALTER TABLE `tbl_registrations`
  MODIFY `seller_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_warning`
--
ALTER TABLE `tbl_warning`
  MODIFY `warning_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl__products`
--
ALTER TABLE `tbl__products`
  MODIFY `product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tbl__vouchers`
--
ALTER TABLE `tbl__vouchers`
  MODIFY `voucher_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_sales`
--
ALTER TABLE `tb_sales`
  MODIFY `salesid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
