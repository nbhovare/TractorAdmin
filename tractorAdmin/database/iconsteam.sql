-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 04, 2023 at 07:08 AM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u674077754_iconsteam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` text NOT NULL,
  `admin_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(2, 'Jitendra Chandrakar', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `assigndata`
--

CREATE TABLE `assigndata` (
  `assign_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `pincode_list` varchar(100) NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `createdtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assigndata`
--

INSERT INTO `assigndata` (`assign_id`, `user_id`, `pincode_list`, `createdby`, `createdtime`) VALUES
(1, 2, '1,3,2,2', '', '2023-04-22 14:46:06'),
(10, 1, '3,2,3', '', '2023-04-22 15:28:19'),
(11, 3, '1', '', '2023-04-23 03:24:08'),
(12, 7, '8, 7', '', '2023-05-04 06:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `datatable`
--

CREATE TABLE `datatable` (
  `did` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `phone_no` bigint(12) NOT NULL,
  `gender` varchar(2) DEFAULT NULL,
  `ele_cus_id` varchar(15) NOT NULL,
  `city_name` varchar(10) NOT NULL,
  `pin_code` bigint(6) NOT NULL,
  `full_address` text NOT NULL,
  `createdtime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `datatable`
--

INSERT INTO `datatable` (`did`, `full_name`, `phone_no`, `gender`, `ele_cus_id`, `city_name`, `pin_code`, `full_address`, `createdtime`) VALUES
(1, 'Jitendra Kumar Chandrakar', 8719952417, 'M', 'BTCA458754', 'Raipur', 2, 'Near Aquainn water plant bhattagaon Raipur', '2023-04-11 00:32:48'),
(2, 'Anil Chandrakar', 8817786000, 'M', 'BODCOS45815', 'Raipue', 2, 'Near Aquainn water plant bhattagaon', '2023-04-11 00:32:48'),
(3, 'Raja Chandrakar', 8839810283, '', 'BODPC3319CDS', 'Mahasamund', 3, 'Imali bhatta mahasamund', '2023-04-11 00:32:48'),
(4, 'Raja', 8745123695, '', 'asdihg', 'Raipur', 1, 'sgraert afg  wetqwer wer ', '2023-04-22 19:07:10'),
(6, 'Jitendra Kumar Chandrakar', 8719952417, '', 'JIH545454SF', 'Raipur', 2, 'Near Aquainn water plant bhattagaon Raipur', '2023-04-22 19:18:56'),
(8, 'Jitendra Kumar Chandrakar', 8719952417, '', 'RAKS212KDU', 'Raipur', 2, 'Near Aquainn water plant bhattagaon Raipur', '2023-04-22 19:21:16'),
(9, 'Demo 1', 7845124578, '', '4454JITEND', 'RAK', 6, 'sdfasdf adf', '2023-04-23 09:37:05'),
(10, 'DMEO ', 4578457845, '', 'JITEBK7845', 'Raipur sdf', 7, 'Near Aquainn water plant bhattagaon Raipur', '2023-04-23 09:40:08'),
(11, 'raja Chandrakar', 8719952417, '', 'JKD32489 JDSJ', 'Raipur', 8, 'Near Aquainn water plant bhattagaon Raipur', '2023-04-23 09:41:48'),
(12, 'Abhinav', 8605808768, '', '452388723', 'Latur', 0, 'Shivaji Maharaj Nagar, Latur', '2023-05-04 06:25:08'),
(13, 'RJ', 8839810283, '', 'JIETGB68w457', 'Bagabahara', 0, '34/2 Ward No 10 Vill-Hathigarh Post-Sukharidabari', '2023-05-04 06:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `pincodetable`
--

CREATE TABLE `pincodetable` (
  `pincode_id` int(11) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `createdby` bigint(20) NOT NULL,
  `createdtime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pincodetable`
--

INSERT INTO `pincodetable` (`pincode_id`, `pincode`, `createdby`, `createdtime`) VALUES
(1, '456123', 1, '2023-04-22 13:37:10'),
(2, '492001', 1, '2023-04-22 13:38:21'),
(3, '443449', 1, '2023-04-22 13:38:21'),
(6, '458745', 1, '2023-04-23 04:07:05'),
(7, '451245', 1, '2023-04-23 04:10:08'),
(8, '415942', 1, '2023-04-23 04:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `userstable`
--

CREATE TABLE `userstable` (
  `user_id` int(11) NOT NULL,
  `user_full_name` varchar(50) NOT NULL,
  `user_mobile_no` bigint(12) NOT NULL,
  `user_email_id` text NOT NULL,
  `username` text NOT NULL,
  `user_password` text NOT NULL,
  `user_delete` enum('N','Y') NOT NULL DEFAULT 'N',
  `user_status` enum('0','1') NOT NULL DEFAULT '0',
  `createdtime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userstable`
--

INSERT INTO `userstable` (`user_id`, `user_full_name`, `user_mobile_no`, `user_email_id`, `username`, `user_password`, `user_delete`, `user_status`, `createdtime`) VALUES
(1, 'Jitendra Chadrakar', 8719952417, 'rjcybrary@gmaill.com', 'rjcybrary', '25f9e794323b453885f5181f1b624d0b', 'N', '1', '2023-04-11 00:37:52'),
(2, 'Sandeep Khatik', 9548784581, 'sandeep@gmail.com', 'sandeep', '202cb962ac59075b964b07152d234b70', 'N', '0', '2023-04-11 12:29:06'),
(3, 'Raja Bro', 784523659, 'freelanceplayer@gmail.com', 'rjbro', '202cb962ac59075b964b07152d234b70', 'N', '1', '2023-04-22 21:11:34'),
(4, 'JITENDRA KUMAR CHANDRAKAR', 8839810283, 'jtd.jitendra.3099@gmail.com', 'JJJJj', '202cb962ac59075b964b07152d234b70', 'N', '1', '2023-05-03 08:08:03'),
(5, 'Abhinav', 8605808768, 'abhinavtondchirkar646@gmail.com', 'abhinav', 'e10adc3949ba59abbe56e057f20f883e', 'Y', '1', '2023-05-04 06:25:58'),
(6, 'Abhinav', 8605808768, 'abhinavtondchirkar646@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', 'Y', '1', '2023-05-04 06:27:54'),
(7, 'Abhinav', 8605808768, 'abhinavtondchirkar646@gmail.com', 'abhinav', 'e10adc3949ba59abbe56e057f20f883e', 'N', '1', '2023-05-04 06:29:39'),
(8, 'Rjyec', 8839810283, 'jtd.jitendra.3099@gmail.com', 'JJJ', 'e10adc3949ba59abbe56e057f20f883e', 'N', '0', '2023-05-04 06:36:53'),
(9, 'Naved', 9923470472, 'abc@gmail.com', 'nd9', 'fcea920f7412b5da7be0cf42b8c93759', 'N', '0', '2023-05-04 06:39:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `assigndata`
--
ALTER TABLE `assigndata`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `datatable`
--
ALTER TABLE `datatable`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `pincodetable`
--
ALTER TABLE `pincodetable`
  ADD PRIMARY KEY (`pincode_id`);

--
-- Indexes for table `userstable`
--
ALTER TABLE `userstable`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assigndata`
--
ALTER TABLE `assigndata`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `datatable`
--
ALTER TABLE `datatable`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pincodetable`
--
ALTER TABLE `pincodetable`
  MODIFY `pincode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userstable`
--
ALTER TABLE `userstable`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
