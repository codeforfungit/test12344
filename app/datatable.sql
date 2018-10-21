-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2018 at 08:14 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datatable`
--

-- --------------------------------------------------------

--
-- Table structure for table `columns`
--

CREATE TABLE `columns` (
  `id` int(11) NOT NULL,
  `column_name` varchar(255) DEFAULT NULL,
  `column_type` varchar(255) DEFAULT NULL,
  `column_options` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `columns`
--

INSERT INTO `columns` (`id`, `column_name`, `column_type`, `column_options`, `created_at`, `updated_at`) VALUES
(1, 'id', NULL, NULL, NULL, NULL),
(2, 'username', 'link', NULL, NULL, NULL),
(3, 'created_at', 'date', NULL, NULL, NULL),
(4, 'updated_at', 'date', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `page_url` varchar(255) DEFAULT NULL,
  `parent_page_id` int(11) DEFAULT '0',
  `page_type` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `page_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `page_url`, `parent_page_id`, `page_type`, `created_at`, `updated_at`, `deleted_at`, `slug`, `page_order`) VALUES
(4, 'Page Details', '#', 0, '1', '2018-06-23 23:46:28', '2018-06-23 23:46:28', NULL, 'page_detail', 11),
(5, 'Add Page Detai', 'add-page-detail', 4, '1', '2018-06-23 23:46:47', '2018-06-23 23:46:47', NULL, NULL, NULL),
(8, 'Order Status Details', '#', 0, '1', '2018-06-23 23:47:27', '2018-06-23 23:47:27', NULL, 'order_status_detail', 8),
(9, 'Add Order Status Detail', 'add-order-status-detail', 8, '1', '2018-06-23 23:47:48', '2018-06-23 23:47:48', NULL, NULL, NULL),
(10, 'View Order Status Detail', 'list-order-status-detail', 8, '1', '2018-06-23 23:48:02', '2018-06-23 23:48:02', NULL, NULL, NULL),
(12, 'View Page Detail', 'list-page', 4, '1', '2018-06-23 23:47:03', '2018-06-23 23:47:03', NULL, NULL, NULL),
(20, 'Role Details', '#', 0, '1', '2018-06-24 01:58:41', '2018-06-24 01:58:41', NULL, NULL, 10),
(21, 'Add Role Detail', 'add-role', 20, '1', '2018-06-24 01:59:00', '2018-06-24 01:59:00', NULL, NULL, NULL),
(22, 'View Role Detail', 'list-role', 20, '1', '2018-06-24 01:59:15', '2018-06-24 01:59:15', NULL, NULL, NULL),
(23, 'User Details', '#', 0, '1', '2018-06-24 01:59:31', '2018-06-24 01:59:31', NULL, NULL, 9),
(24, 'Add User Detail', 'add-user-detail', 23, '1', '2018-06-24 01:59:48', '2018-06-24 01:59:48', NULL, NULL, NULL),
(25, 'View User Detail', 'list-user', 23, '1', '2018-06-24 02:00:12', '2018-06-24 02:00:12', NULL, NULL, NULL),
(29, 'Page Role', 'add-page-role', 4, '1', '2018-06-24 02:08:15', '2018-06-24 02:08:15', NULL, NULL, NULL),
(45, 'Retrieve All Role', 'retreiveAllRole', 20, '2', '2018-06-30 21:52:10', '2018-06-30 21:52:10', NULL, NULL, NULL),
(46, 'Retrieve All User', 'retreiveAllUser', 23, '2', '2018-06-30 21:53:07', '2018-06-30 21:53:07', NULL, NULL, NULL),
(51, 'Add Page Detail POST', 'add-page', 4, '2', '2018-06-30 23:18:14', '2018-06-30 23:18:14', NULL, NULL, NULL),
(52, 'Add Page Role', 'add-page-role', 4, '2', '2018-06-30 23:19:28', '2018-06-30 23:19:28', NULL, NULL, NULL),
(54, 'Add Order Status', 'add-order-status', 8, '2', '2018-06-30 23:22:54', '2018-06-30 23:22:54', NULL, NULL, NULL),
(66, 'Dashboard', 'dashboard', 0, '1', '2018-07-03 11:38:16', '2018-07-03 11:38:16', NULL, NULL, 1),
(67, 'Dashboard Total', 'dashboardTotal', 66, '2', '2018-07-04 04:06:38', '2018-07-04 04:06:38', NULL, NULL, NULL),
(70, 'Order Detail', '#', 0, '1', '2018-07-04 05:23:48', '2018-07-04 05:23:48', NULL, NULL, 2),
(71, 'Add Repair Order Detail', 'add-repair-order-detail', 70, '1', '2018-07-04 05:24:12', '2018-07-04 05:24:12', NULL, NULL, NULL),
(72, 'View Reapir Order Detail', 'view-repair-order-detail', 70, '1', '2018-07-04 05:25:19', '2018-07-04 05:25:19', NULL, NULL, NULL),
(73, 'Retrieve Repair Order Detail', 'retrieve-order-detail', 70, '2', '2018-07-04 05:25:59', '2018-07-04 05:25:59', NULL, NULL, NULL),
(74, 'Retrieve Single Repair Order Detail', 'single-order-list', 70, '2', '2018-07-04 05:26:23', '2018-07-04 05:26:23', NULL, NULL, NULL),
(75, 'Add Customer Detail', 'add-customer-detail', 70, '2', '2018-07-04 05:26:55', '2018-07-04 05:26:55', NULL, NULL, NULL),
(76, 'Get Customer Detail By Type', 'get-customer-detail-by-type', 70, '2', '2018-07-04 05:27:23', '2018-07-04 05:27:23', NULL, NULL, NULL),
(77, 'Get Status By Order No', 'getStatusByOrderNo', 70, '2', '2018-07-04 05:27:37', '2018-07-04 05:27:37', NULL, NULL, NULL),
(78, 'Update Order Status', 'update-order-status', 70, '2', '2018-07-04 05:27:55', '2018-07-04 05:27:55', NULL, NULL, NULL),
(79, 'Add Payment Modal', 'addPaymentModal', 70, '2', '2018-07-04 05:28:10', '2018-07-04 05:28:10', NULL, NULL, NULL),
(80, 'Update Order Payment', 'updateOrderPayment', 70, '2', '2018-07-04 05:28:29', '2018-07-04 05:28:29', NULL, NULL, NULL),
(81, 'Edit Payment Modal', 'editPaymentModal', 70, '2', '2018-07-04 05:28:41', '2018-07-04 05:28:41', NULL, NULL, NULL),
(82, 'Edit Update Payment', 'editUpdatePayment', 70, '2', '2018-07-04 05:28:56', '2018-07-04 05:28:56', NULL, NULL, NULL),
(83, 'Edit Mobile Detail Model', 'editMobileDetailModel', 70, '2', '2018-07-04 05:29:14', '2018-07-04 05:29:14', NULL, NULL, NULL),
(84, 'Retrieve All Order Status', 'retreiveAllOrderStatus', 8, '2', '2018-07-04 05:31:21', '2018-07-04 05:31:21', NULL, NULL, NULL),
(85, 'edit order status', 'edit-order-status', 8, '2', '2018-07-04 05:31:47', '2018-07-04 05:31:47', NULL, NULL, NULL),
(86, 'Customer detail', '#', 0, '1', '2018-07-04 05:34:41', '2018-07-04 05:34:41', NULL, NULL, 3),
(87, 'Add Customer', 'add-customer', 86, '1', '2018-07-04 05:34:52', '2018-07-04 05:34:52', NULL, NULL, NULL),
(88, 'View Customer', 'view-customer', 86, '1', '2018-07-04 05:35:07', '2018-07-04 05:35:07', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `report_name` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `report_name`, `created_at`, `updated_at`) VALUES
(1, 'dbs application', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `report_columns`
--

CREATE TABLE `report_columns` (
  `id` int(11) NOT NULL,
  `column_id` int(11) DEFAULT NULL,
  `report_id` int(11) DEFAULT NULL,
  `column_alias` varchar(255) DEFAULT NULL,
  `order_hierarchy` int(11) DEFAULT NULL,
  `auto_hide` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_columns`
--

INSERT INTO `report_columns` (`id`, `column_id`, `report_id`, `column_alias`, `order_hierarchy`, `auto_hide`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 1, NULL, NULL, NULL),
(2, 2, 1, 'my custom username', NULL, NULL, NULL, NULL),
(3, 3, 1, NULL, 1, NULL, NULL, NULL),
(4, 4, 1, 'my custom updated at', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `view_reports`
--

CREATE TABLE `view_reports` (
  `application_id` int(11) NOT NULL,
  `report_id` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `view_reports`
--

INSERT INTO `view_reports` (`application_id`, `report_id`, `id`, `username`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'kiran', '2018-10-14 14:09:22', '2018-10-14 14:09:22'),
(2, 1, 6, 'mahesh', '2018-10-04 14:09:22', '2018-10-13 14:09:22'),
(3, 1, 3, 'vijay', '2018-10-15 14:09:22', '2018-10-15 14:09:22'),
(4, 1, 4, 'manoj', '2018-10-16 14:09:22', '2018-10-16 14:09:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `columns`
--
ALTER TABLE `columns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_columns`
--
ALTER TABLE `report_columns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `view_reports`
--
ALTER TABLE `view_reports`
  ADD PRIMARY KEY (`application_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `columns`
--
ALTER TABLE `columns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `report_columns`
--
ALTER TABLE `report_columns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `view_reports`
--
ALTER TABLE `view_reports`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
