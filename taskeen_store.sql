-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2017 at 11:26 PM
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
(1, 'imbaba', 1),
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
  `price` float NOT NULL,
  `num_pr` varchar(255) NOT NULL,
  `num_kit` varchar(255) NOT NULL,
  `num_rooms` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `city_id` int(10) DEFAULT NULL,
  `area_id` int(10) DEFAULT NULL,
  `subarea_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `categoury_id` int(10) DEFAULT NULL,
  `subcategoury_id` int(10) DEFAULT NULL,
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
(2, 'test 2`', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'test address 2', 1, '22', '32', '42', 2, 0, 2, 1, 4, 1, 1, 1, 'images/bullding_image/17-03-14-07-44-34_f50112e1a66318535df4d36e9c7521a5de42e340.jpg', '01', '2017', 1, '2017-03-14 18:44:34', '2017-03-23 00:25:14'),
(3, 'test3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'test address3', 1, '2', '3', '4', 1, 0, 2, 1, 4, 1, 1, 1, 'images/bullding_image/17-03-14-11-59-07_0d76c634444a843f3c1ef7dee1663b2353541da2.jpg', '04', '2017', 1, '2017-03-14 18:02:55', '2017-03-23 00:25:05'),
(6, 'test 6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor', 'test address 6', 12, '22', '32', '42', 2, 2, 1, 8, 5, 1, 1, 1, 'images/bullding_image/17-03-14-11-57-45_ddaf6890dc9a1054168c10ae4a8f9fe2ee154d79.jpg', '06', '2017', 1, '2017-03-14 18:44:34', '2017-03-23 20:49:38'),
(7, 'test3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'test address3', 1, '2', '3', '4', 1, 0, 2, 1, 4, 1, 1, 1, 'images/bullding_image/17-03-14-11-57-27_0bba3e5fc28ab4a35224462517daf1f2902cdb2f.jpg', '06', '2017', 1, '2017-03-14 18:02:55', '2017-03-23 00:24:56'),
(8, 'test 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'test address 4', 12, '22', '32', '42', 2, 0, 2, 1, 4, 1, 3, 1, 'images/bullding_image/17-03-14-11-57-07_5255041a51a1ee4ec1633d2007f39595ef06b260.jpg', '07', '2017', 1, '2017-03-14 18:44:34', '2017-03-23 00:24:47'),
(9, 'test', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'test address', 1, '2', '3', '4', 1, 0, 2, 1, 4, 1, 1, 1, 'images/bullding_image/17-03-14-11-56-51_5075b05af4eccac0ed2724f6fe7722a768fba606.jpg', '07', '2017', 0, '2017-03-14 18:02:55', '2017-03-23 00:24:43'),
(10, 'test 2`', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'test address 2', 12, '22', '32', '42', 2, 0, 2, 1, 4, 1, 1, 1, 'images/bullding_image/17-03-14-11-56-37_38681ffdc30422ea1f7491c11a289ad0e16bee06.jpg', '07', '2017', 1, '2017-03-14 18:44:34', '2017-03-23 00:24:38'),
(11, 'test3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'test address3', 1, '2', '3', '4', 1, 0, 2, 1, 4, 1, 1, 1, 'images/bullding_image/17-03-14-11-56-23_f53c27ca0ca249e9d1799f300921b7a38183816f.jpg', '07', '2017', 1, '2017-03-14 18:02:55', '2017-03-23 00:24:34'),
(12, 'test 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'test address 4', 12, '22', '32', '42', 2, 0, 2, 1, 4, 1, 1, 1, 'images/bullding_image/17-03-15-12-02-51_7bceb24ed92a001eb33eabc26768328bbab3c7ab.jpg', '08', '2017', 0, '2017-03-14 18:44:34', '2017-03-23 00:24:29'),
(14, 'test 6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'test address 6', 12, '22', '32', '42', 2, 0, 2, 1, 4, 1, 1, 1, 'images/bullding_image/17-03-14-11-55-11_2bb70922ab645166835bc497e8e25469d8323c06.jpg', '01', '2018', 0, '2017-03-14 18:44:34', '2017-03-23 00:24:24'),
(15, 'test3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'test address3', 1, '2', '3', '4', 1, 0, 2, 1, 4, 1, 1, 1, 'images/bullding_image/17-03-14-11-55-00_93085df1d86ea712757e561382c45be7dabb4901.jpg', '02', '2018', 1, '2017-03-14 18:02:55', '2017-03-23 00:24:20'),
(16, 'test 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'test address 4', 140000, '3', '2', '5', 2, 0, 2, 7, 4, 1, 1, 1, 'images/bullding_image/17-03-15-07-01-35_c3b6081b37a87ce3e3817285af771261a17eda9a.jpeg', '03', '2018', 1, '2017-03-14 18:44:34', '2017-03-23 00:24:15'),
(17, 'test 6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'test address 6', 300, '2', '3', '5', 2, 0, 2, 7, 4, 1, 1, 1, 'images/bullding_image/17-03-14-11-54-22_54d5283fc6edf0678cacad7e074a6af7ea43c7b9.jpg', '04', '2018', 1, '2017-03-14 18:44:34', '2017-03-23 00:24:09'),
(19, 'test 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'test address 4', 100000, '12', '4', '3', 2, 0, 2, 7, 4, 1, 1, 1, 'images/bullding_image/17-03-14-11-53-46_14396d974ba72e8f8be162ae3cb5b43a22bd6ca2.jpg', '04', '2018', 1, '2017-03-14 18:44:34', '2017-03-23 00:23:59'),
(20, 'test 6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'test address 6', 50000, '22', '32', '42', 2, 0, 1, 8, 2, 1, 1, 1, 'images/bullding_image/17-03-14-11-53-29_bb7fa0e572fb18477bb620702bc165f669c3bf0e.jpg', '06', '2018', 1, '2017-03-14 18:44:34', '2017-03-23 00:23:49'),
(21, 'test3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'test address3', 100, '2', '3', '4', 1, 0, 1, 1, 4, 1, 1, 1, 'images/bullding_image/17-03-15-12-02-05_d1cd89f8c33bc6056e73d934ff060bc32a40bfde.jpg', '07', '2018', 1, '2017-03-14 18:02:55', '2017-03-23 00:23:52'),
(22, 'test 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'test address 4', 1200, '22', '32', '42', 2, 0, 1, 1, 4, 1, 1, 1, 'images/bullding_image/17-03-14-11-52-42_f798c5b46ab407d1e842e37bba8d99165d46a5ad.jpg', '07', '2018', 1, '2017-03-14 18:44:34', '2017-03-23 00:23:39'),
(23, 'test title', 'test description', 'test address', 100, '2', '2', '2', 1, 0, 1, 1, 4, 14, 1, 1, 'images/bullding_image/17-03-23-01-38-50_c02acf3c73d5f4cc31632c1fb1be85bb182db507.jpg', '03', '2017', 1, '2017-03-22 23:45:23', '2017-03-23 00:38:50'),
(25, 'bulding test image', 'bulding test imagebulding test imagebulding test image', 'bulding test image', 20, '1', '4', '3', 2, 3, 1, 8, 2, 1, 1, 1, 'images/bullding_image/17-03-23-01-30-05_f50112e1a66318535df4d36e9c7521a5de42e340.jpg', '05', '2017', 1, '2017-03-23 00:30:05', '2017-03-23 01:09:56'),
(26, 'bulding test image', 'bulding test image', 'bulding test image', 2, '12', '3', '5', 2, 0, 1, 1, 4, 1, 1, 1, 'images/bullding_image/avatar/avatar.jpg', '05', '2017', 0, '2017-03-23 00:31:15', '2017-03-23 01:09:36'),
(27, 'new bullding', 'test description', 'imbaba', 200, '2', '1', '3', 2, 2, 1, 1, 4, 1, 1, 1, 'images/bullding_image/17-03-23-10-55-06_0d95e15525b2d6fb3343e505b1ff14d09488332e.png', '03', '2017', 1, '2017-03-23 21:55:06', '2017-03-23 21:55:06');

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
(3, 'howek');

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
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`) VALUES
(2, 'Mohamed Zayed Mohamed', 'mohamedzayed709@yahoo.com', '01096901954', 'this is the test of the message'),
(4, 'moa', 'test@test.com', '010929255', '''Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.''');

-- --------------------------------------------------------

--
-- Table structure for table `sitesetting`
--

CREATE TABLE `sitesetting` (
  `id` int(11) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `nameSetting` varchar(50) NOT NULL,
  `value` text NOT NULL,
  `type` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sitesetting`
--

INSERT INTO `sitesetting` (`id`, `slug`, `nameSetting`, `value`, `type`, `created_at`, `updated_at`) VALUES
(1, 'site name', 'siteName', 'Taskeen Bullding Site', 0, '0000-00-00 00:00:00', '2016-11-09 10:09:24'),
(2, 'facebook', 'facebook', 'https://www.facebook.com/', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'site phone', 'sitePhone', '00000000000000', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'site Description', 'siteDesc', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\n    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\n    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\n    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\n    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\n    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'address', 'address', 'egypt', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'email', 'email', 'test@test.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'twitter', 'twitter', 'https://twitter.com/', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'linkedin', 'linkedin', 'https://www.linkedin.com/', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'google', 'google', 'https://plus.google.com/', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Site Copyright', 'copyright', 'Taskeen Programming', 0, '0000-00-00 00:00:00', '2017-02-03 14:49:36'),
(13, 'instgram', 'instgram', 'https://www.instagram.com/', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(4, 'test2', 2, 1),
(5, 'nnnnnn', 1, 8);

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
(1, 'Mohamed Zayed Mohamed', 'mohamedzayed709@yahoo.com', '1127946754', 'AinShams', 'https://www.facebook.com/', '601f1889667efaebb33b8c12572835da3f027f78', 1),
(14, 'moa', 'moaalaa16@gmail.com', '01096901954', 'imbaba, giza', 'https://www.facebook.com', '601f1889667efaebb33b8c12572835da3f027f78', 0);

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
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitesetting`
--
ALTER TABLE `sitesetting`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sitesetting`
--
ALTER TABLE `sitesetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sub_area`
--
ALTER TABLE `sub_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sub_categouries`
--
ALTER TABLE `sub_categouries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
