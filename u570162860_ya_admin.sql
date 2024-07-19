-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 19, 2024 at 06:39 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u570162860_ya_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `cust_details`
--

DROP TABLE IF EXISTS `cust_details`;
CREATE TABLE IF NOT EXISTS `cust_details` (
  `cust_id` int NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `cust_mobile` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `cust_address` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `cust_email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `createdBy` int NOT NULL,
  `activeStatus` varchar(1) COLLATE utf8mb4_general_ci NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cust_id`),
  UNIQUE KEY `cust_email` (`cust_email`,`cust_mobile`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cust_details`
--

INSERT INTO `cust_details` (`cust_id`, `cust_name`, `cust_mobile`, `cust_address`, `cust_email`, `createdBy`, `activeStatus`, `create_date`) VALUES
(1, 'Jitendra', '9191919008', 'At Post Raigad, Chattisgarh,\nAt Post Raigad, Chattisgarh', 'jitendra@gmail.com', 0, 'Y', '2024-06-23 15:35:45'),
(8, 'culture', '9165525067', '12', 'gmail.gmai;.com', 1, 'Y', '2024-06-23 16:25:12'),
(4, 'Piyush', '7887392513', '12121212', 'admin@gmail.com', 1, 'Y', '2024-06-23 16:02:38'),
(5, 'Piyush Patil Nim', '12121212', '12', '12', 1, 'Y', '2024-06-23 16:03:56'),
(6, 'kali churnnsnsnsn', '1616213', '12', '12', 1, 'Y', '2024-06-23 16:04:19'),
(7, '12', '12', '12', '12', 1, 'Y', '2024-06-23 16:07:07'),
(9, 'e', '12', 'e', 'e', 1, 'Y', '2024-06-23 16:42:52'),
(10, '33', '33', '33', '33', 1, 'Y', '2024-06-23 16:43:51'),
(11, '', '', '', '', 1, 'Y', '2024-07-06 02:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `cust_id` int NOT NULL,
  `date` date DEFAULT NULL,
  `payment_terms` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `notes` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int NOT NULL,
  `status` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `cust_id`, `date`, `payment_terms`, `due_date`, `notes`, `create_date`, `created_by`, `status`) VALUES
('368395010748', 1, NULL, NULL, NULL, NULL, '2024-07-18 01:19:10', 0, 'D'),
('984093010741', 1, NULL, NULL, NULL, NULL, '2024-07-18 01:14:13', 0, 'D'),
('642738010706', 1, '2024-07-18', 'Monthly', '2024-07-18', '', '2024-07-18 01:13:14', 0, 'F'),
('944308010732', 1, NULL, NULL, NULL, NULL, '2024-07-18 01:09:48', 0, 'D'),
('225922120754', 1, NULL, NULL, NULL, NULL, '2024-07-18 00:59:25', 0, 'D'),
('975544120751', 1, NULL, NULL, NULL, NULL, '2024-07-18 00:57:06', 0, 'D'),
('620367120741', 1, NULL, NULL, NULL, NULL, '2024-07-18 00:42:51', 0, 'D'),
('777324120758', 1, '2024-07-18', 'Monthly', '2024-07-18', '', '2024-07-18 00:34:06', 0, 'F'),
('588006120700', 1, NULL, NULL, NULL, NULL, '2024-07-18 00:32:13', 0, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_sub`
--

DROP TABLE IF EXISTS `invoice_sub`;
CREATE TABLE IF NOT EXISTS `invoice_sub` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sub_invoice_id` int NOT NULL,
  `invoice_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `cust_id` int NOT NULL,
  `product_type_id` int NOT NULL,
  `product_id` int NOT NULL,
  `model_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `total_cost` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `amt_net` decimal(10,2) NOT NULL,
  `status` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=138 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice_sub`
--

INSERT INTO `invoice_sub` (`id`, `sub_invoice_id`, `invoice_id`, `cust_id`, `product_type_id`, `product_id`, `model_id`, `quantity`, `total_cost`, `discount`, `amt_net`, `status`, `date`) VALUES
(135, 0, '642738010706', 1, 6, 24, 'Y121', 13, 800.00, 0.00, 10400.00, 'F', '2024-07-18 01:13:14');

--
-- Triggers `invoice_sub`
--
DROP TRIGGER IF EXISTS `update_mstocktable_after_invoice_update`;
DELIMITER $$
CREATE TRIGGER `update_mstocktable_after_invoice_update` AFTER UPDATE ON `invoice_sub` FOR EACH ROW BEGIN
    -- Check if the status is updated to 'F'
    IF NEW.status = 'F' THEN
        UPDATE mstocktable
        SET quantity = quantity - NEW.quantity
        WHERE name = NEW.product_id AND model_id = NEW.model_id;
    END IF;
    
    IF NEW.status = 'R' THEN
        UPDATE mstocktable
        SET quantity = quantity + NEW.quantity
        WHERE name = NEW.product_id AND model_id = NEW.model_id;
   	END IF;
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `khushcustomertable`
--

DROP TABLE IF EXISTS `khushcustomertable`;
CREATE TABLE IF NOT EXISTS `khushcustomertable` (
  `cus_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `address_1` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `address_2` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` bigint NOT NULL,
  `model_id` int NOT NULL,
  `product_type_id` int NOT NULL,
  `buy_date` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `imageUrl` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `activeStatus` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `createdBy` int NOT NULL,
  `createdTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cus_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `machinecompanytable`
--

DROP TABLE IF EXISTS `machinecompanytable`;
CREATE TABLE IF NOT EXISTS `machinecompanytable` (
  `company_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `activeStatus` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `createdTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `createdBy` bigint NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `machinecompanytable`
--

INSERT INTO `machinecompanytable` (`company_id`, `name`, `activeStatus`, `createdTime`, `createdBy`) VALUES
(18, 'Mahindra', 'Y', '2024-06-03 12:11:50', 1),
(19, 'Texter', 'Y', '2024-07-13 07:54:06', 1),
(20, 'Pylo', 'Y', '2024-07-15 19:06:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `malik`
--

DROP TABLE IF EXISTS `malik`;
CREATE TABLE IF NOT EXISTS `malik` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` text NOT NULL,
  `admin_password` text NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `malik`
--

INSERT INTO `malik` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(3, 'Jitendra Kumar Chandrakar', 'jitendra@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'Admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `mhp_table`
--

DROP TABLE IF EXISTS `mhp_table`;
CREATE TABLE IF NOT EXISTS `mhp_table` (
  `hp_id` int NOT NULL AUTO_INCREMENT,
  `hp_name` varchar(100) NOT NULL,
  `activeStatus` char(1) NOT NULL,
  `createdBy` int NOT NULL,
  `createdTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`hp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhp_table`
--

INSERT INTO `mhp_table` (`hp_id`, `hp_name`, `activeStatus`, `createdBy`, `createdTime`) VALUES
(10, '500', 'Y', 1, '2024-06-01 21:01:02'),
(11, '5000', 'Y', 1, '2024-07-13 07:54:16'),
(12, '300', 'Y', 1, '2024-07-13 07:54:19'),
(13, '3000', 'Y', 1, '2024-07-13 07:54:21'),
(14, '30000', 'Y', 1, '2024-07-13 07:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `mmodeltable`
--

DROP TABLE IF EXISTS `mmodeltable`;
CREATE TABLE IF NOT EXISTS `mmodeltable` (
  `model_id` int NOT NULL AUTO_INCREMENT,
  `company_id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `activeStatus` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `createdBy` int NOT NULL,
  `cratedTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modeltable`
--

DROP TABLE IF EXISTS `modeltable`;
CREATE TABLE IF NOT EXISTS `modeltable` (
  `model_id` int NOT NULL AUTO_INCREMENT,
  `company_id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `activeStatus` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `createdBy` int NOT NULL,
  `cratedTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mproductddetailstable`
--

DROP TABLE IF EXISTS `mproductddetailstable`;
CREATE TABLE IF NOT EXISTS `mproductddetailstable` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_image` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `product_type_id` int NOT NULL,
  `hp_id` int NOT NULL,
  `company_id` int NOT NULL,
  `chassis_no` text COLLATE utf8mb4_general_ci NOT NULL,
  `engine_no` text COLLATE utf8mb4_general_ci NOT NULL,
  `key_no` text COLLATE utf8mb4_general_ci NOT NULL,
  `ex_showroom` bigint NOT NULL,
  `insurance` int NOT NULL,
  `regd` int NOT NULL,
  `hpa` int NOT NULL,
  `agreement` int NOT NULL,
  `access` int NOT NULL,
  `misc` int NOT NULL,
  `other_cost` int NOT NULL,
  `total_cost` int NOT NULL,
  `editor` text COLLATE utf8mb4_general_ci NOT NULL,
  `activeStatus` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `createdBy` int NOT NULL,
  `createdTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mproductddetailstable`
--

INSERT INTO `mproductddetailstable` (`product_id`, `product_image`, `name`, `product_type_id`, `hp_id`, `company_id`, `chassis_no`, `engine_no`, `key_no`, `ex_showroom`, `insurance`, `regd`, `hpa`, `agreement`, `access`, `misc`, `other_cost`, `total_cost`, `editor`, `activeStatus`, `createdBy`, `createdTime`) VALUES
(23, 'Screenshot 2024-06-19 153326.png', 'Mahindra NOVO', 6, 13, 18, '1232', '123353', '34', 12500, 1200, 1, 1, 1, 1, 1, 1, 800, '', 'Y', 1, '2024-07-13 11:14:59'),
(24, '2.png', 'Mahindra YUVRA', 6, 10, 18, '123213', '123353', '34', 12500, 1200, 1, 1, 1, 1, 1, 1, 800, '', 'Y', 1, '2024-07-15 20:48:54'),
(25, '2.png', 'Mahindra YUVRA', 6, 10, 18, '123213', '123353', '34', 12500, 1200, 1, 1, 1, 1, 1, 1, 800, '', 'Y', 1, '2024-07-15 20:48:54'),
(26, '2.png', 'TEXTER', 6, 10, 19, '123213', '123353', '34', 12500, 1200, 1, 1, 1, 1, 1, 1, 800, '', 'Y', 1, '2024-07-19 18:09:05'),
(27, '2.png', 'PYLO YUVRA', 6, 10, 20, '123213', '123353', '34', 12500, 1200, 1, 1, 1, 1, 1, 1, 800, '', 'Y', 1, '2024-07-19 18:09:34'),
(28, '2.png', 'PYLO YUVRA', 6, 10, 20, '123213', '123353', '34', 12500, 1200, 1, 1, 1, 1, 1, 1, 800, '', 'Y', 1, '2024-07-19 18:09:42');

-- --------------------------------------------------------

--
-- Table structure for table `mproducttypename`
--

DROP TABLE IF EXISTS `mproducttypename`;
CREATE TABLE IF NOT EXISTS `mproducttypename` (
  `product_type_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `activeStatus` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `createdBy` int NOT NULL,
  `createdTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mproducttypename`
--

INSERT INTO `mproducttypename` (`product_type_id`, `name`, `activeStatus`, `createdBy`, `createdTime`) VALUES
(6, 'Tractor', 'Y', 1, '2024-06-01 21:00:50'),
(7, 'Greenhouse Supplies', 'Y', 1, '2024-07-13 07:43:08'),
(8, 'Other Machinery', 'Y', 1, '2024-07-13 07:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `msaletypetable`
--

DROP TABLE IF EXISTS `msaletypetable`;
CREATE TABLE IF NOT EXISTS `msaletypetable` (
  `sale_type_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `activeStatus` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `createdBy` int NOT NULL,
  `createdTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sale_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mstocktable`
--

DROP TABLE IF EXISTS `mstocktable`;
CREATE TABLE IF NOT EXISTS `mstocktable` (
  `stock_id` int NOT NULL AUTO_INCREMENT,
  `company_id` int NOT NULL,
  `product_type_id` int NOT NULL,
  `name` int NOT NULL,
  `model_id` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int NOT NULL,
  `price` bigint NOT NULL,
  `saling_price` bigint NOT NULL,
  `editor` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `activeStatus` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdBy` int NOT NULL,
  `createdTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mstocktable`
--

INSERT INTO `mstocktable` (`stock_id`, `company_id`, `product_type_id`, `name`, `model_id`, `quantity`, `price`, `saling_price`, `editor`, `activeStatus`, `createdBy`, `createdTime`) VALUES
(31, 18, 6, 23, 'v1.1', 1, 1, 1, '', 'Y', 1, '2024-07-13 10:52:14'),
(32, 18, 6, 23, 'v1.2', 1, 1, 1, '', 'Y', 1, '2024-07-13 10:52:24'),
(33, 18, 6, 23, 'v1.3', 35, 12, 12153, '', 'Y', 1, '2024-07-13 10:52:34'),
(34, 18, 6, 24, 'Y121', 0, 12, 12, '', 'Y', 1, '2024-07-13 11:15:25'),
(35, 18, 6, 24, 'Y121s', 5, 5, 123455, '', 'Y', 1, '2024-07-13 11:15:54'),
(36, 18, 6, 24, 'Y121sa', 12223, 123466, 123455, '', 'Y', 1, '2024-07-13 11:22:13'),
(37, 18, 6, 24, 'Y121sa', 12223, 123466, 123455, '', 'Y', 1, '2024-07-13 11:22:13'),
(39, 18, 6, 24, 'v1.5', 74, 5500, 50000, '', 'Y', 1, '2024-07-15 18:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `mtestimonialtable`
--

DROP TABLE IF EXISTS `mtestimonialtable`;
CREATE TABLE IF NOT EXISTS `mtestimonialtable` (
  `test_id` int NOT NULL AUTO_INCREMENT,
  `test_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `test_phone` bigint NOT NULL,
  `test_position` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `test_rating` int NOT NULL,
  `test_date` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `test_message` text COLLATE utf8mb4_general_ci NOT NULL,
  `image_url` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `createdby` int NOT NULL,
  `createdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `querytable`
--

DROP TABLE IF EXISTS `querytable`;
CREATE TABLE IF NOT EXISTS `querytable` (
  `query_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` bigint NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `activeStatus` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `cratedTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modifiedBy` int NOT NULL,
  PRIMARY KEY (`query_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `querytable`
--

INSERT INTO `querytable` (`query_id`, `name`, `mobile`, `message`, `activeStatus`, `cratedTime`, `modifiedBy`) VALUES
(1, 'jITENDERA', 8719952417, 'tEXTNG', 'P', '2023-10-23 08:22:21', 0),
(2, 'Jitendra Kumar Chandrakar', 8719952417, 'aklsjdf f', 'P', '2023-10-23 09:37:14', 0),
(3, 'Nishant Sharma', 39, 'Hope you are doing well!\r\n\r\nI am Nishant,\r\n\r\nWe collaborate with startups, SMBs, and new domain owners to provide Website design - re-design and development services at modest rate.\r\n\r\nWe have a dedicated team of 45 professional designers and developers with over 8 plus years of experience and we thrive on the idea that design makes a difference.\r\n\r\nOur services at a glance: -\r\n\r\nWebsite Designing/Re-Designing\r\n\r\n#E-commerce development (Magento, Shopify, Woo Commerce etc.)\r\n\r\n#Graphic Designing', 'P', '2023-10-27 19:27:32', 0),
(4, 'TobiasWharT', 87892331974, 'Hi! yashasviagrotech.com \r\n \r\nDid you know that it is possible to send commercial offer legally? We providing a new way of sending letters through feedback forms. These feedback forms can be seen on a variety of webpages. \r\nWhen such messages are sent, no personal data is used, and they are securely sent to forms that have been specifically designed to receive messages and appeals. Because of their importance, messages sent via Feedback Forms are not labeled as spam. \r\nTaste our service for free', 'P', '2023-11-27 15:02:39', 0),
(5, 'Monarch Web', 23, 'Hi there,\r\n\r\nI just wanted to know if you require a better solution to manage SEO, SMO, SMM, PPC Campaigns, keyword research, Reporting etc. We are a leading Digital Marketing Agency, offering marketing solutions at affordable prices.\r\n\r\nWe can manage all as we have a 150+ expert team of professionals and help you save a hefty amount on hiring resources.\r\n\r\nInterested? Do write back to me, I’d love to chat.\r\n\r\nIf you are interested, then we can send you our past work details, client testimonials', 'P', '2023-12-08 07:11:46', 0),
(6, 'MichaelAerok', 81463582788, 'Hello, \r\n \r\nNew club music https://0daymusic.org \r\nDownload MP3/FLAC, Label, LIVESETS, Music Videos. \r\n \r\nPromo Music DJs', 'P', '2023-12-30 01:24:49', 0),
(7, 'puddwiqas', 85652982518, 'http://fjksldhyaodh.com/ - Omilar <a href=\"http://fjksldhyaodh.com/\">Axepxecim</a> qtm.nsvq.yashasviagrotech.com.vpo.ul http://fjksldhyaodh.com/', 'P', '2023-12-31 18:48:04', 0),
(8, 'puddwiqas', 81251597349, 'http://fjksldhyaodh.com/ - Omilar <a href=\"http://fjksldhyaodh.com/\">Axepxecim</a> qtm.nsvq.yashasviagrotech.com.vpo.ul http://fjksldhyaodh.com/', 'P', '2023-12-31 18:56:29', 0),
(9, 'yetexig', 86227723427, '<a href=http://fjksldhyaodh.com/>Ikikuaper</a> <a href=\"http://fjksldhyaodh.com/\">Okototo</a> hzv.sebq.yashasviagrotech.com.iua.zj http://fjksldhyaodh.com/', 'P', '2024-01-25 19:59:22', 0),
(10, 'yetexig', 87238454297, '<a href=http://fjksldhyaodh.com/>Ikikuaper</a> <a href=\"http://fjksldhyaodh.com/\">Okototo</a> hzv.sebq.yashasviagrotech.com.iua.zj http://fjksldhyaodh.com/', 'P', '2024-01-25 20:07:16', 0);

-- --------------------------------------------------------

--
-- Table structure for table `testimonialtable`
--

DROP TABLE IF EXISTS `testimonialtable`;
CREATE TABLE IF NOT EXISTS `testimonialtable` (
  `test_id` int NOT NULL AUTO_INCREMENT,
  `test_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `test_phone` bigint NOT NULL,
  `test_position` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `test_rating` int NOT NULL,
  `test_date` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `test_message` text COLLATE utf8mb4_general_ci NOT NULL,
  `image_url` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `createdby` int NOT NULL,
  `createdtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonialtable`
--

INSERT INTO `testimonialtable` (`test_id`, `test_name`, `test_phone`, `test_position`, `test_rating`, `test_date`, `test_message`, `image_url`, `createdby`, `createdtime`) VALUES
(3, 'Jitendra Chandrakar', 8839810283, 'Developer', 5, '2023-11-01', ' Good customer support.Delivered the product as per the order.Appreciate it', 'IMG-20231004-WA0021.jpg', 1, '2023-11-06 19:56:48'),
(5, 'jitendra', 784521245, 'Hhisdf ', 1, '2024-05-30', ' fg SDf SDf zsdfg dfg', 'photo_default.png', 1, '2024-05-20 18:05:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
