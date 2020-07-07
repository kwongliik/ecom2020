-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 24, 2020 at 09:23 AM
-- Server version: 5.7.28
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `user_id` int(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `user_email`, `user_pass`) VALUES
(1, 'john@yahoo.com', 'john'),
(2, 'james@yahoo.com', 'james');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'Dell'),
(3, 'LG'),
(4, 'Samsung'),
(5, 'Sony'),
(6, 'Toshiba'),
(7, 'Apple'),
(8, 'Huawei'),
(10, 'Raspberrypi'),
(13, 'Arduino4');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Laptops'),
(2, 'Cameras'),
(3, 'Mobiles'),
(4, 'Computers'),
(5, 'iPads'),
(6, 'iPhones'),
(10, 'ipod');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`) VALUES
(5, '::1', 'david', 'david@yahoo.com', 'david', 'Malaysia', 'sibu', '4444', 'sg merah', 'david.jpg'),
(6, '::1', 'kwongliik', 'kwongliik@yahoo.com', 'sibu1234', 'Malaysia', 'kuching', '0134445555', 'Green Road', 'New Doc 2019-06-17.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `invoice_no`, `product_id`, `customer_id`, `order_date`, `qty`, `order_status`) VALUES
(5, 1325760671, 16, 5, '2019-12-24 08:20:41', 3, 'paid'),
(6, 1325760671, 17, 5, '2019-12-24 08:20:41', 1, 'paid'),
(7, 2109999810, 10, 5, '2019-12-24 13:43:50', 1, 'paid'),
(8, 2109999810, 14, 5, '2019-12-24 13:43:50', 1, 'paid'),
(9, 544114529, 10, 5, '2019-12-24 14:35:54', 1, 'paid'),
(10, 544114529, 11, 5, '2019-12-24 14:35:54', 2, 'paid'),
(11, 1861810480, 11, 5, '2019-12-24 15:57:25', 1, 'paid'),
(12, 401754698, 25, 5, '2019-12-24 16:00:03', 1, 'paid'),
(13, 1275604762, 10, 5, '2019-12-24 16:10:39', 2, 'paid'),
(14, 1275604762, 18, 5, '2019-12-24 16:10:39', 1, 'paid'),
(15, 1101192172, 12, 5, '2019-12-24 16:18:40', 1, 'paid'),
(16, 366180419, 18, 5, '2019-12-24 16:22:58', 1, 'paid'),
(17, 2143525050, 17, 5, '2019-12-28 08:40:23', 1, 'paid'),
(18, 2143525050, 20, 5, '2019-12-28 08:40:23', 2, 'paid'),
(19, 465409179, 14, 5, '2020-06-23 02:39:25', 1, 'paid'),
(20, 465409179, 19, 5, '2020-06-23 02:39:25', 2, 'paid'),
(21, 465409179, 23, 5, '2020-06-23 02:39:25', 1, 'paid'),
(22, 868445385, 12, 6, '2020-06-24 06:20:12', 1, 'paid'),
(23, 868445385, 13, 6, '2020-06-24 06:20:12', 2, 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(10, 1, 6, 'toshiba satellite laptop', 100, '<p>toshiba satellite laptop desc</p>', 'toshiba-satellite.jpg', 'toshiba, laptop, satellite'),
(11, 1, 5, 'sony vaio', 200, '<p>sony vaio desc</p>', 'sony-vaio-laptop.jpg', 'sony, laptop'),
(12, 2, 4, 'samsung galaxy camera', 300, '<p>samsung galaxy camera desc</p>', 'samsung-galaxy-camera.jpg', 'samsung, camera'),
(13, 1, 1, 'HP Corei5', 400, '<p>HP Corei5 desc</p>', 'HP-Corei5.jpg', 'HP, laptop'),
(14, 1, 4, 'samsung notebook 9', 500, '<p>samsung notebook 9 desc</p>', 'samsung-notebook9.jpg', 'samsung, laptop'),
(16, 1, 2, 'dell inspiron', 600, '<p>dell inspiron desc</p>', 'dell-inspiron.jpeg', 'dell, laptop'),
(17, 3, 5, 'sony xperia tablet', 700, '<p>sony xperia tablet</p>', 'Sony-Xperia-Tablet.jpg', 'sony, tablet'),
(18, 3, 3, 'LG phone', 800, '<p>LG phone</p>', 'LG-phone.jpg', 'LG, phone'),
(19, 5, 7, 'iPad', 900, '<p>iPad desc</p>', 'ipad.png', 'iPad, apple'),
(20, 6, 7, 'iPhone 11', 1000, '<p>iphone desc</p>', 'iphone-11.png', 'iPhone, Apple'),
(21, 4, 7, 'Mac Pro', 1100, '<p>a powerful computer from <strong>Apple</strong></p>', 'Apple_Mac_Pro.jpg', 'apple, computer, new'),
(23, 1, 7, 'macbook pro', 1400, '<p>new macbook pro 2019</p>', 'Apple_16-inch-MacBook-Pro.jpg', 'macbook pro'),
(25, 5, 7, 'ipad 10', 1200, '<p>new ipad 10</p>', 'ipad-10.jpg', 'iPad, Apple'),
(26, 10, 7, 'ipod touch', 1300, '<p>new ipod touch 2019</p>', 'ipod-touch-select-silver-2019.png', 'ipod, Apple'),
(42, 3, 4, 'samsung phone4', 2300, '<p>good phone4</p>', 'Samsung-Galaxy-X-2-2.jpg', 'new, samsung'),
(43, 3, 4, 'samsung phone5', 2400, '<p>good phone5</p>', 'samsung-s9-3.jpg', 'new, samsung'),
(44, 3, 4, 'samsung phone6', 2500, '<p>good phone6</p>', 'my-galaxy-a80-a805-sm-a805fzkdxme-frontblack-190347057.jpeg', 'new, samsung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD UNIQUE KEY `p_id` (`p_id`) USING BTREE;

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
