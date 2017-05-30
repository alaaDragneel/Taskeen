-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2017 at 12:38 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- SET time_zone = "+00:00";


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
(1, 'Ain Shams', 1),
(2, 'Nasr City', 1),
(3, 'New Cairo', 1),
(4, 'Maadi', 1),
(5, 'Helmaya', 1),
(6, 'Badr City', 1),
(7, 'Imbaba', 2),
(8, 'Alhram', 2),
(9, '6 october', 2),
(10, 'dhb', 3),
(11, 'khaleeg ne3ma', 3),
(12, 'sant katreen', 3),
(13, 'el-hadba', 4),
(14, 'el-dahar', 4),
(15, 'el-saqala', 4);

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
(1, 'شقه لليجار في الف مسكن', 'شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل', 'عين شمس عند الف مسكن', 2500, '2', '1', '3', 1, 0, 1, 1, 7, 19, 3, 9, 'images/bullding_image/17-05-28-11-27-21_5379f0e0f0a60cd832ed6c0811a2186541e5d6ec.jpg', '05', '2017', 1, '2017-05-28 21:27:21', '2017-05-28 21:47:04'),
(2, 'شقه لليجار في الف مسكن', 'شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل ', 'عين شمس عند الف مسكن', 2500, '2', '1', '3', 1, 0, 1, 1, 7, 19, 3, 9, 'images/bullding_image/17-05-28-11-27-29_5379f0e0f0a60cd832ed6c0811a2186541e5d6ec.jpg', '05', '2017', 1, '2017-05-28 21:27:29', '2017-05-28 21:31:01'),
(3, 'شقه لليجار في الف مسكن', 'شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل ', 'عين شمس عند الف مسكن', 2500, '2', '1', '3', 1, 0, 1, 1, 7, 19, 3, 9, 'images/bullding_image/17-05-28-11-27-33_5379f0e0f0a60cd832ed6c0811a2186541e5d6ec.jpg', '05', '2017', 1, '2017-05-28 21:27:33', '2017-05-28 21:30:58'),
(4, 'شقه لليجار في الف مسكن', 'شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل ', 'عين شمس عند الف مسكن', 2500, '2', '1', '3', 1, 0, 1, 1, 7, 19, 3, 9, 'images/bullding_image/17-05-28-11-27-35_5379f0e0f0a60cd832ed6c0811a2186541e5d6ec.jpg', '05', '2017', 1, '2017-05-28 21:27:35', '2017-05-28 21:30:54'),
(5, 'شقه لليجار في الف مسكن', 'شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل', 'عين شمس عند الف مسكن', 2500, '2', '1', '6', 1, 0, 1, 1, 7, 19, 3, 9, 'images/bullding_image/17-05-28-11-27-39_5379f0e0f0a60cd832ed6c0811a2186541e5d6ec.jpg', '05', '2017', 1, '2017-05-28 21:27:39', '2017-05-28 22:22:32'),
(6, 'محل لليجار', 'شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل ', 'مدينه نصر مصطفي النحاس', 5000, '3', '1', '0', 1, 2, 1, 2, 15, 20, 3, 10, 'images/bullding_image/17-05-28-11-37-45_ac9d106401d25e9ddc780dcaee3bf2014a755b0b.jpg', '05', '2017', 0, '2017-05-28 21:37:45', '2017-05-28 21:37:45'),
(7, 'محل لليجار', 'شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل ', 'مدينه نصر مصطفي النحاس', 5000, '3', '1', '0', 1, 2, 1, 2, 15, 20, 3, 10, 'images/bullding_image/17-05-28-11-40-23_ac9d106401d25e9ddc780dcaee3bf2014a755b0b.jpg', '05', '2017', 0, '2017-05-28 21:40:23', '2017-05-28 21:40:23'),
(8, 'محل لليجار', 'شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل ', 'مدينه نصر مصطفي النحاس', 5000, '3', '1', '0', 1, 2, 1, 2, 15, 20, 3, 10, 'images/bullding_image/17-05-28-11-40-55_ac9d106401d25e9ddc780dcaee3bf2014a755b0b.jpg', '05', '2017', 0, '2017-05-28 21:40:55', '2017-05-28 21:40:55'),
(9, 'محل لليجار', 'شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل ', 'مدينه نصر مصطفي النحاس', 5000, '3', '1', '0', 1, 2, 1, 2, 15, 20, 3, 10, 'images/bullding_image/17-05-28-11-40-59_ac9d106401d25e9ddc780dcaee3bf2014a755b0b.jpg', '05', '2017', 0, '2017-05-28 21:40:59', '2017-05-28 21:40:59'),
(10, 'محل لليجار', 'شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل ', 'مدينه نصر مصطفي النحاس', 5000, '3', '1', '0', 1, 2, 1, 2, 15, 20, 3, 10, 'images/bullding_image/17-05-28-11-41-59_ac9d106401d25e9ddc780dcaee3bf2014a755b0b.jpg', '05', '2017', 0, '2017-05-28 21:41:59', '2017-05-28 21:41:59'),
(11, 'محل لليجار', 'شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل ', 'مدينه نصر مصطفي النحاس', 5000, '3', '1', '0', 1, 2, 1, 2, 15, 20, 3, 10, 'images/bullding_image/17-05-28-11-42-10_ac9d106401d25e9ddc780dcaee3bf2014a755b0b.jpg', '05', '2017', 0, '2017-05-28 21:42:10', '2017-05-28 21:42:10'),
(12, 'محل لليجار2', 'شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل', 'مدينه نصر مصطفي النحاس', 5000, '3', '1', '0', 1, 2, 1, 2, 15, 20, 3, 10, 'images/bullding_image/17-05-28-11-42-14_ac9d106401d25e9ddc780dcaee3bf2014a755b0b.jpg', '05', '2017', 0, '2017-05-28 21:42:14', '2017-05-28 21:44:51'),
(13, 'محل لليجار', 'شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل و مؤهله للسكن الفردي و الزوجي يفضل متزوجون او شركات مع تامين 5000شقه تشطيب كلمل', 'مدينه نصر مصطفي النحاس', 5000, '3', '1', '0', 1, 2, 1, 2, 15, 20, 3, 10, 'images/bullding_image/17-05-28-11-42-16_ac9d106401d25e9ddc780dcaee3bf2014a755b0b.jpg', '05', '2017', 0, '2017-05-28 21:42:16', '2017-05-29 00:45:13'),
(14, 'شقة للايجار', 'تشطيب سوبر لوكس فرش ممتاز تصلح لسكن الطلبة او المغتربين بشكل عام وتصلح للمتزوجين او الاسر بشكل عام', 'مدينة نصر الحي الثامن شارع حسين ذاكر', 3000, '2', '2', '4', 1, 0, 1, 2, 15, 21, 2, 1, 'images/bullding_image/17-05-29-12-26-06_7ef6851a8f666471934ed75eae9083616abd5843.jpg', '05', '2017', 1, '2017-05-28 22:26:06', '2017-05-29 00:32:40'),
(15, 'mHOAMED Zayed', 'this is good bulding this is good bulding this is good bulding this is good bulding this is good bulding this is good bulding this is good bulding this is good bulding this is good bulding this is good bulding this is good bulding this is good bulding thi', 'alhay al asher', 5000, '2', '2', '6', 1, 3, 1, 6, 13, 1, 3, 9, 'images/bullding_image/17-05-29-11-36-43_45bce586691c180bfb5b1ad249b7f48af28a5de6.jpg', '05', '2017', 1, '2017-05-29 21:36:43', '2017-05-29 21:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `bu_ser`
--

CREATE TABLE `bu_ser` (
  `bu_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bu_ser`
--

INSERT INTO `bu_ser` (`bu_id`, `service_id`) VALUES
(1, 1),
(1, 7),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(13, 9),
(14, 8),
(15, 10),
(15, 11);

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
(1, 'Sell & Buy'),
(2, 'Students & Employee''s'),
(3, 'Rent');

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
(1, 'Cairo'),
(2, 'Giza'),
(3, 'sharm el-shekh'),
(4, 'urghada');

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

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `describtion` text NOT NULL,
  `buid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `describtion`, `buid`) VALUES
(1, 'موصلات', ' موقف بيودي اي حته في مصر من التجمع لمدينه نصر', 1),
(2, 'موصلات', 'موقف بيودي اي حته في مصر من التجمع لمدينه نصر', 2),
(3, 'موصلات', 'موقف بيودي اي حته في مصر من التجمع لمدينه نصر', 3),
(4, 'موصلات', 'موقف بيودي اي حته في مصر من التجمع لمدينه نصر', 4),
(5, 'موصلات', ' موقف بيودي اي حته في مصر من التجمع لمدينه نصر', 5),
(7, 'مطاعم', 'يوجد العديد كم المطاعم', 1),
(8, 'المواصلات ', ' قريبة من جميع المواقف علي بعد 20 متر من الموقف الرئيسي ', 14),
(9, 'المستشفيات', 'مستشفي تخصصي بالجوار \r\n', 13),
(10, 'hti', ' this is good bulding this is good bulding this is good bulding this is good bulding this is good bulding this is good bulding this is good bulding this is good bulding this is good bulding this is good bulding this is good bulding ', 15),
(11, 'this is good bulding ', ' this is good bulding this is good bulding this is good bulding this is good bulding this is good bulding this is good bulding this is good bulding this is good bulding this is good bulding', 15);

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
(1, 'site name', 'siteName', 'Taskeen Bullding Site', 0, '0000-00-00 00:00:00', '2016-11-09 08:09:24'),
(2, 'facebook', 'facebook', 'https://www.facebook.com/', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'site phone', 'sitePhone', '1127946754', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'site Description', 'siteDesc', 'Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project Mostafa Nafeer Project ', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'address', 'address', 'egypt', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'email', 'email', 'test@test.com', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'twitter', 'twitter', 'https://twitter.com/', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'linkedin', 'linkedin', 'https://www.linkedin.com/', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'google', 'google', 'https://plus.google.com/', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Site Copyright', 'copyright', 'Taskeen Programming', 0, '0000-00-00 00:00:00', '2017-02-03 12:49:36'),
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
(1, 'Alhay 10', 1, 2),
(2, 'Alhay 7', 1, 2),
(3, 'kobry october', 2, 9),
(4, 'Elbeny', 2, 8),
(5, 'Tallat Harb', 2, 7),
(6, 'Elarbeen', 1, 1),
(7, 'Ahmed Esmat', 1, 1),
(8, 'Mohamed Mahmoud', 1, 5),
(9, 'Kornesh Eelnel', 1, 4),
(10, '9 street', 1, 4),
(11, 'Al Tgmo3 5', 1, 3),
(12, 'Al Tgmo3 3', 1, 3),
(13, 'down-town', 1, 6),
(14, 'el-momaiz', 1, 6),
(15, 'الحي الثامن', 1, 2),
(16, 'الحي السادس', 1, 2),
(17, 'الحي الاثني عشر', 2, 9),
(18, 'down town', 3, 10),
(19, 'beach', 3, 10),
(20, 'beach', 4, 13),
(21, 'down-town', 4, 14),
(22, 'down-town', 4, 14),
(23, 'down-town', 4, 15),
(24, 'down-town', 3, 11),
(25, 'down-town', 3, 12);

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
(1, 'شقق ايجار', 2),
(2, 'غرف مشاركة', 2),
(4, 'flat', 1),
(5, 'land', 1),
(6, 'villa', 1),
(7, 'shalleh', 1),
(8, 'shops', 1),
(9, 'flat', 3),
(10, 'shops', 3),
(12, 'shalleh', 3),
(13, 'villa', 3);

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
(1, 'Muostafa Nafeer', 'nafeer506@gmail.com', '1127946754', 'AinShams', 'http://facebook.com/mostafa_nafeer', '601f1889667efaebb33b8c12572835da3f027f78', 1),
(19, 'mohsen', 'mohsen@yahoo.com', '0123654789', 'cairo-nasrcity', 'http://www.facebook.com/mody', '601f1889667efaebb33b8c12572835da3f027f78', 0),
(20, 'Mohamed alaa', 'mohamddmed@yahoo.com', '01127946567', 'mohamed alaa street at naruto japan', 'http://facebook.com/mohamedalaa', '601f1889667efaebb33b8c12572835da3f027f78', 0),
(21, 'mmmm', 'momo@yahoo.com', '01236547', 'nasr-city', 'http://www.facebook.com/mody', '601f1889667efaebb33b8c12572835da3f027f78', 0);

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
-- Indexes for table `bu_ser`
--
ALTER TABLE `bu_ser`
  ADD PRIMARY KEY (`bu_id`,`service_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `bu_id` (`bu_id`);

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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buid` (`buid`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `buldings`
--
ALTER TABLE `buldings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `sitesetting`
--
ALTER TABLE `sitesetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sub_area`
--
ALTER TABLE `sub_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `sub_categouries`
--
ALTER TABLE `sub_categouries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
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
-- Constraints for table `bu_ser`
--
ALTER TABLE `bu_ser`
  ADD CONSTRAINT `bu_ser_ibfk_1` FOREIGN KEY (`bu_id`) REFERENCES `buldings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bu_ser_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`buid`) REFERENCES `buldings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
