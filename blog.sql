-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 27, 2021 at 09:13 PM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_ID` int NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_ID`, `cat_title`) VALUES
(16, 'جافا اسكربت'),
(17, 'بايثون'),
(18, 'دارت'),
(30, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_ID` int NOT NULL,
  `post_content` text NOT NULL,
  `post_date` varchar(255) NOT NULL,
  `post_image` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `post_title` varchar(255) NOT NULL,
  `post_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'unapproved',
  `post_tags` text NOT NULL,
  `user_id` int NOT NULL,
  `cat_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_ID`, `post_content`, `post_date`, `post_image`, `post_title`, `post_status`, `post_tags`, `user_id`, `cat_id`) VALUES
(40, 'تست كده', 'Sunday 27 June 2021', 'images/Screenshot from 2021-03-28 21-40-23.png', 'تجربة كده لمستخدم مختلف', 'approve', 'جافا,بايثون,نود', 5, 18),
(41, 'مقال جميلاتمني التوفيقكيفكم', 'Sunday 27 June 2021', 'images/Screenshot from 2021-03-26 11-30-00.png', 'مقال ثاني', 'approve', 'جافا,بايثون,نود', 5, 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `pic` text NOT NULL,
  `pio` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `is_active` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'unapproved',
  `post_id` int DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `name`, `email`, `password`, `pic`, `pio`, `is_active`, `post_id`, `role`) VALUES
(5, 'ابوبكر هلال', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'images/profile/3071742.jpg', ' front-end developer use last ', 'yes', NULL, '0'),
(7, 'محمد علي', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'images/profile/3302596.jpg', 'مبرمج تطبيقات', 'approve', NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_ID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_ID`),
  ADD KEY `cat_1` (`cat_id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `cat_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
