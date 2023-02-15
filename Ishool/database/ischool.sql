-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 15, 2023 at 08:11 AM
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
-- Database: `ischool`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tb`
--

CREATE TABLE `admin_tb` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(300) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_tb`
--

INSERT INTO `admin_tb` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `course_tb`
--

CREATE TABLE `course_tb` (
  `course_id` int NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_desc` text NOT NULL,
  `course_author` varchar(255) NOT NULL,
  `course_img` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `course_duration` varchar(255) NOT NULL,
  `course_price` int NOT NULL,
  `course_original_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course_tb`
--

INSERT INTO `course_tb` (`course_id`, `course_name`, `course_desc`, `course_author`, `course_img`, `course_duration`, `course_price`, `course_original_price`) VALUES
(1, 'Learn Guitar The Easy Way', 'This course is your free pass to learn guitar. It is the most direct and to the point complete online guitar course', 'arslan', '../images/upload/guitar.jpg', '15 days', 300, 3000),
(2, 'Learn Angular', 'Angular is one of the most popular frameworks for building clients apps with HTML and Css and TypeScript', 'arslan', '../images/upload/angular-JS.jpg', '1 month', 3000, 6000),
(4, 'Hands-on Artificial Intelligence', 'Learn And Master how Ai works and changing our lives in this Course lives in this Course ', 'arslan', '../images/upload/art.jpg', '3 months', 600, 6000),
(5, 'Learn Vue Js', 'The skill you will learn from this course is applicable to real world,so you can go ahead and build similar app ', 'arslan', '../images/upload/vue.jpg', '2 months', 500, 5000),
(6, 'Complete PHP Bootcamp', 'This course will help you get all the Object Oriented PHP,MYSQLI ending the course by building a CMS system ', 'arslan', '../images/upload/php.jpg', '6 months', 3000, 4500),
(7, 'Learn Python A to Z', 'This is the most comprehensive,yet straight-forword, course for the Python Programming Language', 'arslan', '../images/upload/python.jpg', '45 days', 900, 9000);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int NOT NULL,
  `f_content` varchar(244) NOT NULL,
  `stu_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_content`, `stu_id`) VALUES
(1, 'This is a feedback from salma. I learn many thing from this website course i appreciate it thank you.', 6),
(2, 'This is a feedback from Ali. My life at Ischool has made me strong and move forword to learn new things. I am thankful to all teacher who supported me in this mission. ', 1),
(3, 'This is a feedback from Hamza. I am grateful to Ischool where i have learn php course that made to lead a job in good company.', 2),
(4, 'This is feedback from Imran. Thank you Ischool for making me progress by learning these courses and i recommend others to learn and move forword in your life.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lesson_tb`
--

CREATE TABLE `lesson_tb` (
  `lesson_id` int NOT NULL,
  `lesson_name` text NOT NULL,
  `lesson_desc` text NOT NULL,
  `lesson_link` text NOT NULL,
  `course_id` int NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lesson_tb`
--

INSERT INTO `lesson_tb` (`lesson_id`, `lesson_name`, `lesson_desc`, `lesson_link`, `course_id`, `course_name`) VALUES
(1, 'Learn Guitar Introduction', 'Guitar is music instrument that can make you feel good when you are getting bored. 				', '../video/upload/guitar.mp4', 1, 'Learn Guitar The Easy Way'),
(2, 'Learn Angular Introduction', 'Angular is one of the most popular frameworks for building clients apps with HTML and Css and TypeScript			', '../video/upload/one.mp4', 2, 'Learn Angular'),
(3, 'Learn  Artificial Intelligence Introduction', 'Learn And Master how Ai works and changing our lives in this Course lives in this Course 	', '../video/upload/two.mp4', 4, 'Hands-on Artificial Intelligence'),
(4, 'Learn Vue Js Introduction', 'The skill you will learn from this course is applicable to real world,so you can go ahead and build similar app 					', '../video/upload/three.mp4', 5, 'Learn Vue Js'),
(5, 'Learn Complete PHP Introduction', 'This course will help you get all the Object Oriented PHP,MYSQLI ending the course by building a CMS system 					', '../video/upload/four.mp4', 6, 'Complete PHP Bootcamp'),
(6, 'Learn Python Introduction', 'This is the most comprehensive,yet straight-forword, course for the Python Programming Language						', '../video/upload/three.mp4', 7, 'Learn Python A to Z');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int NOT NULL,
  `stu_name` varchar(255) NOT NULL,
  `stu_email` varchar(255) NOT NULL,
  `stu_password` varchar(255) NOT NULL,
  `stu_occ` varchar(255) NOT NULL,
  `stu_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_name`, `stu_email`, `stu_password`, `stu_occ`, `stu_img`) VALUES
(1, 'Ali', 'ali@gmail.com', 'ali123', 'Web Developer', '../images/upload/profile/ali.jpg'),
(2, 'Hamza ', 'hamza@gmail.com', 'hamza123', 'Web Developer', '../images/upload/profile/hamza.jpg'),
(3, 'Imran', 'imran@gmail.com', 'imran123', 'Web Developer', '../images/upload/profile/imran.jpg'),
(6, 'salma', 'salma@gmail.com', 'salma123', 'SEO Developer', '../images/upload/profile/salma.jpg'),
(7, 'hashir', 'hashir@gmail.com', 'hashir123', 'Web Design', '../images/upload/profile/hashir.jpg'),
(8, 'usman', 'usman@gmail.com', 'usman123', 'Web Developer', '../images/upload/profile/usman.jpg'),
(9, 'Zaid', 'zaid@gmail.com', 'zaid123', 'developer', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `course_tb`
--
ALTER TABLE `course_tb`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `lesson_tb`
--
ALTER TABLE `lesson_tb`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_tb`
--
ALTER TABLE `course_tb`
  MODIFY `course_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lesson_tb`
--
ALTER TABLE `lesson_tb`
  MODIFY `lesson_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
