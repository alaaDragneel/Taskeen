-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2017 at 02:16 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskeen_store`
--
CREATE DATABASE IF NOT EXISTS `taskeen_store` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `taskeen_store`;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `name`, `city_id`) VALUES
(1, 'imbaba', 2),
(2, 'nasr city', 1),
(7, 'test area cairo', 2),
(8, 'test area giza', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buldings`
--

CREATE TABLE `buldings` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `num_pr` varchar(255) NOT NULL,
  `num_kit` varchar(255) NOT NULL,
  `num_rooms` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `city_id` int(10) NOT NULL,
  `area_id` int(10) NOT NULL,
  `subarea_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `categoury_id` int(10) NOT NULL,
  `subcategoury_id` int(10) NOT NULL,
  `image` varchar(300) NOT NULL,
  `month` varchar(3) NOT NULL,
  `year` varchar(4) NOT NULL,
  `isApproved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buldings`
--

INSERT INTO `buldings` (`id`, `title`, `description`, `address`, `price`, `num_pr`, `num_kit`, `num_rooms`, `status`, `type`, `city_id`, `area_id`, `subarea_id`, `user_id`, `categoury_id`, `subcategoury_id`, `image`, `month`, `year`, `isApproved`, `created_at`, `updated_at`) VALUES
(2, 'test 2`', 'test description 2', 'test address 2', '12', '22', '32', '42', 2, 0, 2, 1, 4, 1, 1, 1, 'layouts/images/bullding_image/17-03-14-07-44-34_f50112e1a66318535df4d36e9c7521a5de42e340.jpg', '03', '2017', 1, '2017-03-14 18:44:34', '2017-03-14 19:21:03'),
(3, 'test3', 'test desciption3', 'test address3', '1', '2', '3', '4', 1, 0, 2, 1, 4, 1, 1, 1, 'layouts/images/bullding_image/17-03-14-11-59-07_0d76c634444a843f3c1ef7dee1663b2353541da2.jpg', '04', '2017', 1, '2017-03-14 18:02:55', '2017-03-14 22:59:07'),
(5, 'test5', 'test desciption5', 'test address5', '1', '2', '3', '4', 1, 0, 2, 1, 4, 1, 1, 1, 'layouts/images/bullding_image/17-03-14-11-58-32_10fad5e66d64afe67e8e6a700e6385b6e7640c67.jpg', '06', '2017', 1, '2017-03-14 18:02:55', '2017-03-14 22:58:32'),
(6, 'test 6', 'test description 6', 'test address 6', '12', '22', '32', '42', 2, 0, 2, 1, 4, 1, 1, 1, 'layouts/images/bullding_image/17-03-14-11-57-45_ddaf6890dc9a1054168c10ae4a8f9fe2ee154d79.jpg', '06', '2017', 0, '2017-03-14 18:44:34', '2017-03-14 22:57:45'),
(7, 'test3', 'test desciption3', 'test address3', '1', '2', '3', '4', 1, 0, 2, 1, 4, 1, 1, 1, 'layouts/images/bullding_image/17-03-14-11-57-27_0bba3e5fc28ab4a35224462517daf1f2902cdb2f.jpg', '06', '2017', 1, '2017-03-14 18:02:55', '2017-03-14 22:57:27'),
(8, 'test 4', 'test description 4', 'test address 4', '12', '22', '32', '42', 2, 0, 2, 1, 4, 1, 1, 1, 'layouts/images/bullding_image/17-03-14-11-57-07_5255041a51a1ee4ec1633d2007f39595ef06b260.jpg', '07', '2017', 1, '2017-03-14 18:44:34', '2017-03-14 22:57:07'),
(9, 'test', 'test desciption', 'test address', '1', '2', '3', '4', 1, 0, 2, 1, 4, 1, 1, 1, 'layouts/images/bullding_image/17-03-14-11-56-51_5075b05af4eccac0ed2724f6fe7722a768fba606.jpg', '07', '2017', 0, '2017-03-14 18:02:55', '2017-03-14 22:56:51'),
(10, 'test 2`', 'test description 2', 'test address 2', '12', '22', '32', '42', 2, 0, 2, 1, 4, 1, 1, 1, 'layouts/images/bullding_image/17-03-14-11-56-37_38681ffdc30422ea1f7491c11a289ad0e16bee06.jpg', '07', '2017', 1, '2017-03-14 18:44:34', '2017-03-14 22:56:37'),
(11, 'test3', 'test desciption3', 'test address3', '1', '2', '3', '4', 1, 0, 2, 1, 4, 1, 1, 1, 'layouts/images/bullding_image/17-03-14-11-56-23_f53c27ca0ca249e9d1799f300921b7a38183816f.jpg', '07', '2017', 1, '2017-03-14 18:02:55', '2017-03-14 22:56:23'),
(12, 'test 4', 'test description 4', 'test address 4', '12', '22', '32', '42', 2, 0, 2, 1, 4, 1, 1, 1, 'layouts/images/bullding_image/17-03-15-12-02-51_7bceb24ed92a001eb33eabc26768328bbab3c7ab.jpg', '08', '2017', 0, '2017-03-14 18:44:34', '2017-03-14 23:02:51'),
(13, 'test5', 'test desciption5', 'test address5', '1', '2', '3', '4', 1, 0, 2, 1, 4, 1, 1, 1, 'layouts/images/bullding_image/17-03-14-11-55-40_9ca99065f59cfe1cdae1e9b316c90e75aaa3c48b.jpg', '08', '2017', 1, '2017-03-14 18:02:55', '2017-03-14 22:55:40'),
(14, 'test 6', 'test description 6', 'test address 6', '12', '22', '32', '42', 2, 0, 2, 1, 4, 1, 1, 1, 'layouts/images/bullding_image/17-03-14-11-55-11_2bb70922ab645166835bc497e8e25469d8323c06.jpg', '01', '2018', 0, '2017-03-14 18:44:34', '2017-03-14 22:55:11'),
(15, 'test3', 'test desciption3', 'test address3', '1', '2', '3', '4', 1, 0, 2, 1, 4, 1, 1, 1, 'layouts/images/bullding_image/17-03-14-11-55-00_93085df1d86ea712757e561382c45be7dabb4901.jpg', '02', '2018', 1, '2017-03-14 18:02:55', '2017-03-14 22:55:00'),
(16, 'test 4', 'test description 4', 'test address 4', '12', '22', '32', '42', 2, 0, 2, 1, 4, 1, 1, 1, 'layouts/images/bullding_image/17-03-14-11-54-46_dc1420e9b0d044dca593d43186e68f04ed59ef9b.jpg', '03', '2018', 1, '2017-03-14 18:44:34', '2017-03-14 22:54:46'),
(17, 'test 6', 'test description 6', 'test address 6', '12', '22', '32', '42', 2, 0, 2, 1, 4, 1, 1, 1, 'layouts/images/bullding_image/17-03-14-11-54-22_54d5283fc6edf0678cacad7e074a6af7ea43c7b9.jpg', '04', '2018', 0, '2017-03-14 18:44:34', '2017-03-14 22:54:22'),
(19, 'test 4', 'test description 4', 'test address 4', '12', '22', '32', '42', 2, 0, 2, 1, 4, 1, 1, 1, 'layouts/images/bullding_image/17-03-14-11-53-46_14396d974ba72e8f8be162ae3cb5b43a22bd6ca2.jpg', '04', '2018', 1, '2017-03-14 18:44:34', '2017-03-14 22:53:46'),
(20, 'test 6', 'test description 6', 'test address 6', '12', '22', '32', '42', 2, 0, 2, 1, 4, 1, 1, 1, 'layouts/images/bullding_image/17-03-14-11-53-29_bb7fa0e572fb18477bb620702bc165f669c3bf0e.jpg', '06', '2018', 0, '2017-03-14 18:44:34', '2017-03-14 22:53:29'),
(21, 'test3', 'test desciption3', 'test address3', '1', '2', '3', '4', 1, 0, 2, 1, 4, 1, 1, 1, 'layouts/images/bullding_image/17-03-15-12-02-05_d1cd89f8c33bc6056e73d934ff060bc32a40bfde.jpg', '07', '2018', 1, '2017-03-14 18:02:55', '2017-03-14 23:02:05'),
(22, 'test 4', 'test description 4', 'test address 4', '12', '22', '32', '42', 2, 0, 2, 1, 4, 1, 1, 1, 'layouts/images/bullding_image/17-03-14-11-52-42_f798c5b46ab407d1e842e37bba8d99165d46a5ad.jpg', '07', '2018', 1, '2017-03-14 18:44:34', '2017-03-14 22:52:42'),
(23, 'test 6', 'test description 6', 'test address 6', '12', '22', '32', '42', 2, 0, 2, 1, 4, 1, 1, 1, 'layouts/images/bullding_image/17-03-15-12-04-51_38681ffdc30422ea1f7491c11a289ad0e16bee06.jpg', '08', '2018', 0, '2017-03-14 18:44:34', '2017-03-14 23:04:51');

-- --------------------------------------------------------

--
-- Table structure for table `categouries`
--

CREATE TABLE `categouries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categouries`
--

INSERT INTO `categouries` (`id`, `name`) VALUES
(1, 'Shaleh'),
(3, 'howe');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(2, 'Cairo2'),
(1, 'Giza');

-- --------------------------------------------------------

--
-- Table structure for table `sub_area`
--

CREATE TABLE `sub_area` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city_id` int(10) NOT NULL,
  `area_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_area`
--

INSERT INTO `sub_area` (`id`, `name`, `city_id`, `area_id`) VALUES
(2, 'elkhlfawy', 1, 8),
(4, 'test2', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categouries`
--

CREATE TABLE `sub_categouries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `categoury_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_categouries`
--

INSERT INTO `sub_categouries` (`id`, `name`, `categoury_id`) VALUES
(1, 'test Shaleh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isadmin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `facebook`, `password`, `isadmin`) VALUES
(1, 'Mohamed Zayed Mohamed', 'mohamedzayed709@yahoo.com', '1096901954', 'AinShams', 'https://www.facebook.com/', '601f1889667efaebb33b8c12572835da3f027f78', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `buldings`
--
ALTER TABLE `buldings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoury_id` (`categoury_id`),
  ADD KEY `categoury_id_2` (`categoury_id`),
  ADD KEY `city_id` (`city_id`,`area_id`,`subarea_id`,`user_id`,`subcategoury_id`),
  ADD KEY `area_id` (`area_id`),
  ADD KEY `subarea_id` (`subarea_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `subcategoury_id` (`subcategoury_id`);

--
-- Indexes for table `categouries`
--
ALTER TABLE `categouries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sub_area`
--
ALTER TABLE `sub_area`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`,`area_id`),
  ADD KEY `area_id` (`area_id`);

--
-- Indexes for table `sub_categouries`
--
ALTER TABLE `sub_categouries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoury_id` (`categoury_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `buldings`
--
ALTER TABLE `buldings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `categouries`
--
ALTER TABLE `categouries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sub_area`
--
ALTER TABLE `sub_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sub_categouries`
--
ALTER TABLE `sub_categouries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buldings`
--
ALTER TABLE `buldings`
  ADD CONSTRAINT `buldings_ibfk_1` FOREIGN KEY (`categoury_id`) REFERENCES `categouries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buldings_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buldings_ibfk_3` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buldings_ibfk_4` FOREIGN KEY (`subarea_id`) REFERENCES `sub_area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buldings_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buldings_ibfk_6` FOREIGN KEY (`subcategoury_id`) REFERENCES `sub_categouries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_area`
--
ALTER TABLE `sub_area`
  ADD CONSTRAINT `sub_area_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_area_ibfk_2` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_categouries`
--
ALTER TABLE `sub_categouries`
  ADD CONSTRAINT `sub_categouries_ibfk_1` FOREIGN KEY (`categoury_id`) REFERENCES `categouries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
