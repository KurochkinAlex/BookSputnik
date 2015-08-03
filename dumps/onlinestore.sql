-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2015 at 04:11 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `onlinestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `eng_categories`
--

CREATE TABLE IF NOT EXISTS `eng_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `parent_id` tinyint(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eng_customers`
--

CREATE TABLE IF NOT EXISTS `eng_customers` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eng_delivery`
--

CREATE TABLE IF NOT EXISTS `eng_delivery` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eng_goods`
--

CREATE TABLE IF NOT EXISTS `eng_goods` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `goods_category_id` int(11) NOT NULL,
  `anons` text NOT NULL,
  `content` text NOT NULL,
  `visible` enum('0','1') NOT NULL DEFAULT '1',
  `hit` enum('0','1') NOT NULL DEFAULT '0',
  `new` enum('0','1') DEFAULT '0',
  `sale` enum('0','1') NOT NULL DEFAULT '0',
  `price` float NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eng_informers`
--

CREATE TABLE IF NOT EXISTS `eng_informers` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` int(5) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eng_links`
--

CREATE TABLE IF NOT EXISTS `eng_links` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_informer` int(5) unsigned NOT NULL,
  `link_position` int(5) unsigned NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eng_news`
--

CREATE TABLE IF NOT EXISTS `eng_news` (
`id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `anons` text NOT NULL,
  `full_text` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eng_ordered_goods`
--

CREATE TABLE IF NOT EXISTS `eng_ordered_goods` (
`id` int(11) unsigned NOT NULL,
  `order_id` int(11) unsigned NOT NULL,
  `goods_id` int(11) unsigned NOT NULL,
  `quantity` int(5) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eng_orders`
--

CREATE TABLE IF NOT EXISTS `eng_orders` (
`id` int(11) unsigned NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eng_pages`
--

CREATE TABLE IF NOT EXISTS `eng_pages` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `position` int(5) unsigned NOT NULL DEFAULT '0',
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eng_payment`
--

CREATE TABLE IF NOT EXISTS `eng_payment` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eng_customers`
--
ALTER TABLE `eng_customers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eng_delivery`
--
ALTER TABLE `eng_delivery`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eng_goods`
--
ALTER TABLE `eng_goods`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eng_informers`
--
ALTER TABLE `eng_informers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eng_links`
--
ALTER TABLE `eng_links`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eng_news`
--
ALTER TABLE `eng_news`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eng_ordered_goods`
--
ALTER TABLE `eng_ordered_goods`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eng_orders`
--
ALTER TABLE `eng_orders`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eng_pages`
--
ALTER TABLE `eng_pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eng_payment`
--
ALTER TABLE `eng_payment`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eng_customers`
--
ALTER TABLE `eng_customers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eng_delivery`
--
ALTER TABLE `eng_delivery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eng_goods`
--
ALTER TABLE `eng_goods`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eng_informers`
--
ALTER TABLE `eng_informers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eng_links`
--
ALTER TABLE `eng_links`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eng_news`
--
ALTER TABLE `eng_news`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eng_ordered_goods`
--
ALTER TABLE `eng_ordered_goods`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eng_orders`
--
ALTER TABLE `eng_orders`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eng_pages`
--
ALTER TABLE `eng_pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eng_payment`
--
ALTER TABLE `eng_payment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
