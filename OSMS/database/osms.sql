-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2023 at 10:21 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE `admin_tb` (
  `admin_id` int NOT NULL,
  `adminname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `adminemail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `adminpassword` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`admin_id`, `adminname`, `adminemail`, `adminpassword`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `assign_work`
--

CREATE TABLE `assign_work` (
  `assign_id` int NOT NULL,
  `request_id` int NOT NULL,
  `request_info` text NOT NULL,
  `request_desc` text NOT NULL,
  `request_name` varchar(200) NOT NULL,
  `request_address1` text NOT NULL,
  `request_address2` text NOT NULL,
  `request_city` varchar(50) NOT NULL,
  `request_state` varchar(50) NOT NULL,
  `request_zip` int NOT NULL,
  `request_email` varchar(50) NOT NULL,
  `request_mobile` bigint NOT NULL,
  `assign_technician` varchar(50) NOT NULL,
  `assign_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `assign_work`
--

INSERT INTO `assign_work` (`assign_id`, `request_id`, `request_info`, `request_desc`, `request_name`, `request_address1`, `request_address2`, `request_city`, `request_state`, `request_zip`, `request_email`, `request_mobile`, `assign_technician`, `assign_date`) VALUES
(1, 1, 'i want to repair my car', 'i want to repair my car that is not working properly.', 'arslan ', 'house no 1 ', 'shalimar link road lahore', 'lahore', 'lahore', 21453, 'arslan@gmail.com', 22555865, 'chacha g', '2023-01-09'),
(5, 3, 'i want to repair my tv', 'tv that is not working properly.', 'arslan ', 'house no 1 ', 'shalimar link road lahore', 'lahore', 'lahore', 222334, 'arslan@gmail.com', 22563278, 'chacha manna', '2023-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `login_tb`
--

CREATE TABLE `login_tb` (
  `u_id` int NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login_tb`
--

INSERT INTO `login_tb` (`u_id`, `u_name`, `u_email`, `u_password`) VALUES
(1, 'Arslan Khalid', 'arslan@gmail.com', 'arslan123'),
(2, 'Zaid ', 'Zaid@gmail.com', 'zaid123');

-- --------------------------------------------------------

--
-- Table structure for table `product_tb`
--

CREATE TABLE `product_tb` (
  `product_id` int NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_date` date NOT NULL,
  `available` int NOT NULL,
  `total` int NOT NULL,
  `original_cost` int NOT NULL,
  `selling_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product_tb`
--

INSERT INTO `product_tb` (`product_id`, `product_name`, `product_date`, `available`, `total`, `original_cost`, `selling_price`) VALUES
(1, 'keyboard ', '2023-01-13', 5, 6, 300, 450),
(2, 'Mouse ', '2023-01-13', 8, 10, 140, 200),
(3, 'Handfree', '2023-01-16', 5, 10, 150, 200);

-- --------------------------------------------------------

--
-- Table structure for table `sellproduct_tb`
--

CREATE TABLE `sellproduct_tb` (
  `sell_id` int NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` varchar(300) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `available` int NOT NULL,
  `quantity` int NOT NULL,
  `sell_each_product` bigint NOT NULL,
  `total_price` int NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sellproduct_tb`
--

INSERT INTO `sellproduct_tb` (`sell_id`, `customer_name`, `customer_address`, `product_name`, `available`, `quantity`, `sell_each_product`, `total_price`, `date`) VALUES
(1, 'Nouman', 'Shalimar link Road Lahore', 'Mouse ', 6, 3, 120, 360, '2023-01-15'),
(2, 'Nouman', 'Shalimar link Road Lahore', 'Mouse ', 6, 3, 120, 360, '2023-01-15'),
(3, 'hafeez', 'Shalimar link Road Lahore', 'Keyboard', 3, 1, 300, 300, '2023-01-15'),
(4, 'Ali', 'Shalimar link Road Lahore', 'Handfree', 3, 2, 150, 300, '2023-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `submit_request`
--

CREATE TABLE `submit_request` (
  `s_id` int NOT NULL,
  `s_information` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `s_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_address1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `s_address2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `s_city` varchar(50) NOT NULL,
  `s_state` varchar(50) NOT NULL,
  `s_zip` int NOT NULL,
  `s_email` varchar(100) NOT NULL,
  `s_mobile` bigint NOT NULL,
  `s_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `submit_request`
--

INSERT INTO `submit_request` (`s_id`, `s_information`, `s_description`, `s_name`, `s_address1`, `s_address2`, `s_city`, `s_state`, `s_zip`, `s_email`, `s_mobile`, `s_date`) VALUES
(12, 'demo request three', 'demo request three', 'arslan', 'house no 1 ', 'Shalimar link road Lahore', 'Lahore', 'Lahore', 21453, 'arslan@gmail.com', 22563278, '2023-01-04'),
(13, 'demo five', 'demo five description', 'arslan', 'house no.1', 'Data Colony ', 'Lahore', 'pakistan', 524662, 'arslan@gmail.com', 44433551, '2023-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `technician_tb`
--

CREATE TABLE `technician_tb` (
  `tech_id` int NOT NULL,
  `tech_name` varchar(100) NOT NULL,
  `tech_email` varchar(100) NOT NULL,
  `tech_city` varchar(100) NOT NULL,
  `tech_mobile` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `technician_tb`
--

INSERT INTO `technician_tb` (`tech_id`, `tech_name`, `tech_email`, `tech_city`, `tech_mobile`) VALUES
(1, 'chacha g', 'chacha@gmail.com', 'Lahore', 4345678),
(2, 'chacha manna ', 'chachamanna@gmail.com', 'Lahore', 3432487);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `assign_work`
--
ALTER TABLE `assign_work`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `login_tb`
--
ALTER TABLE `login_tb`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `product_tb`
--
ALTER TABLE `product_tb`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sellproduct_tb`
--
ALTER TABLE `sellproduct_tb`
  ADD PRIMARY KEY (`sell_id`);

--
-- Indexes for table `submit_request`
--
ALTER TABLE `submit_request`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `technician_tb`
--
ALTER TABLE `technician_tb`
  ADD PRIMARY KEY (`tech_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assign_work`
--
ALTER TABLE `assign_work`
  MODIFY `assign_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login_tb`
--
ALTER TABLE `login_tb`
  MODIFY `u_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_tb`
--
ALTER TABLE `product_tb`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sellproduct_tb`
--
ALTER TABLE `sellproduct_tb`
  MODIFY `sell_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `submit_request`
--
ALTER TABLE `submit_request`
  MODIFY `s_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `technician_tb`
--
ALTER TABLE `technician_tb`
  MODIFY `tech_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
