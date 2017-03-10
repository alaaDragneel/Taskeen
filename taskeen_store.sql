-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2017 at 07:15 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

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
  `num_rooms` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `city_id` int(10) NOT NULL,
  `area_id` int(10) NOT NULL,
  `subarea_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `categoury_id` int(10) NOT NULL,
  `subcategoury_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(2, 'Cairo'),
(1, 'Giza');

-- --------------------------------------------------------

--
-- Table structure for table `lands`
--

CREATE TABLE `lands` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `square` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `describtion` text NOT NULL,
  `user_id` int(10) NOT NULL,
  `city_id` int(10) NOT NULL,
  `area_id` int(10) NOT NULL,
  `subarea_id` int(10) NOT NULL,
  `categoury_id` int(10) NOT NULL,
  `subcategoury_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `square` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `city_id` int(10) NOT NULL,
  `area_id` int(10) NOT NULL,
  `subarea_id` int(10) NOT NULL,
  `categoury_id` int(10) NOT NULL,
  `subcategoury_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'Mohamed Zayed Mohamed', 'mohamedzayed709@yahoo.com', '01127946754', 'AinShams', 'https://www.facebook.com/', '601f1889667efaebb33b8c12572835da3f027f78', 1);

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
-- Indexes for table `lands`
--
ALTER TABLE `lands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`city_id`,`area_id`,`subarea_id`,`categoury_id`,`subcategoury_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `area_id` (`area_id`),
  ADD KEY `subarea_id` (`subarea_id`),
  ADD KEY `categoury_id` (`categoury_id`),
  ADD KEY `subcategoury_id` (`subcategoury_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`city_id`,`area_id`,`subarea_id`,`categoury_id`,`subcategoury_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `area_id` (`area_id`),
  ADD KEY `subarea_id` (`subarea_id`),
  ADD KEY `categoury_id` (`categoury_id`),
  ADD KEY `subcategoury_id` (`subcategoury_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categouries`
--
ALTER TABLE `categouries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `lands`
--
ALTER TABLE `lands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_area`
--
ALTER TABLE `sub_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sub_categouries`
--
ALTER TABLE `sub_categouries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
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
-- Constraints for table `lands`
--
ALTER TABLE `lands`
  ADD CONSTRAINT `lands_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lands_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lands_ibfk_3` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lands_ibfk_4` FOREIGN KEY (`subarea_id`) REFERENCES `sub_area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lands_ibfk_5` FOREIGN KEY (`categoury_id`) REFERENCES `categouries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lands_ibfk_6` FOREIGN KEY (`subcategoury_id`) REFERENCES `sub_categouries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shops_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shops_ibfk_3` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shops_ibfk_4` FOREIGN KEY (`subarea_id`) REFERENCES `sub_area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shops_ibfk_5` FOREIGN KEY (`categoury_id`) REFERENCES `categouries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shops_ibfk_6` FOREIGN KEY (`subcategoury_id`) REFERENCES `sub_categouries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
