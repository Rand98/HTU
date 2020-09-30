-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 02:14 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `htu project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(4) NOT NULL,
  `admin_email` text NOT NULL,
  `admin_pass` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_pass`, `fullname`) VALUES
(1, 'rand.fwd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Rand Awad'),
(2, 'farah@gmail.com', 'b5e50dc6642a7fce5f623c097de86fa1', 'farah hammad');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(6) NOT NULL,
  `cat_name` varchar(70) NOT NULL,
  `cat_image` varchar(1000) NOT NULL,
  `cat_desc` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`, `cat_desc`) VALUES
(1, 'women', 'banner-01.jpg', 'clotheees jhjhj 5555555'),
(3, 'men', 'banner-05.jpg', 'pants ghghhj'),
(4, 'watches and acsessories', 'banner-07.jpg', 'kkjkjk test'),
(5, 'pjamas', 'Capture555.PNG', 'jhjhj'),
(6, 'shoses', 'Capture777.PNG', 'sssssssssssssss'),
(11, 'kids', 'download.jpg', 'all for kids');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(6) NOT NULL,
  `cun_name` varchar(70) NOT NULL,
  `cus_email` varchar(70) NOT NULL,
  `cus_pass` varchar(50) NOT NULL,
  `mobile` int(10) NOT NULL,
  `addresss` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cun_name`, `cus_email`, `cus_pass`, `mobile`, `addresss`) VALUES
(1, 'hala', 'hala@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 79792222, 'amman '),
(15, 'marah', 'marah@gmail.com', '0dd4f2526c7c874d06f19523264f6552', 797901756, 'amman'),
(21, 'renad', 'renad@gmail.com', '202cb962ac59075b964b07152d234b70', 797901756, 'amman'),
(25, 'alia', 'alia@gmail.com', '8d5e957f297893487bd98fa830fa6413', 797901756, 'Mahis'),
(26, 'laith', 'laithawaf30@gmail.com', '202cb962ac59075b964b07152d234b70', 797901756, 'amman'),
(28, 'noor', 'noor@gmail.com', '698d51a19d8a121ce581499d7b701668', 797901756, 'Mahis'),
(29, 'ola', 'ola@gmail.com', '202cb962ac59075b964b07152d234b70', 797901756, 'Mahis'),
(30, 'mai', 'mai@gmail.com', '5878a7ab84fb43402106c575658472fa', 797901756, 'amman');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(6) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cus_id` int(6) NOT NULL,
  `product_id` varchar(9) NOT NULL,
  `qty` int(100) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_date`, `cus_id`, `product_id`, `qty`, `payment_method`, `total`) VALUES
(863, '2020-09-30 08:24:04', 30, '66,60,59', 1, 'cash', 90),
(864, '2020-09-30 08:24:59', 30, '66,60,59,', 1, 'cash', 160),
(865, '2020-09-30 08:28:26', 30, '66,60,59,', 1, 'cash', 175),
(866, '2020-09-30 08:37:10', 30, '26,72', 1, 'cash', 30);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(9) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_image` varchar(1000) NOT NULL,
  `product_price` int(3) NOT NULL,
  `product_desc` text NOT NULL,
  `cat_id` int(6) NOT NULL,
  `sub_id` int(10) NOT NULL,
  `vendor_id` int(6) NOT NULL,
  `qty` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `statuss` varchar(20) NOT NULL,
  `feature` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `product_price`, `product_desc`, `cat_id`, `sub_id`, `vendor_id`, `qty`, `date`, `statuss`, `feature`) VALUES
(11, 'Green - Checkered - Point', 'item-cart-01.jpg', 20, 'Collar - Acrylic - - Blouses', 1, 0, 4, 50, '2020-09-12 07:05:01', 'blocked', ''),
(12, 't-shirt', 'product-08.jpg', 50, 'hggggggggggg ', 1, 0, 4, 30, '2020-09-12 07:05:03', 'blocked', ''),
(13, 't-shirt', 'product-10.jpg', 10, 'jhjhjhj', 1, 1, 4, 10, '2020-09-21 08:03:05', 'blocked', ''),
(14, 't-shirt', 'product-13.jpg', 20, '20', 1, 1, 4, 10, '2020-09-14 17:48:10', 'allowed', ''),
(15, 't-shirt', 'product-03.jpg', 10, 'jhjhj hjhj', 3, 0, 4, 10, '2020-09-10 20:25:17', 'allowed', ''),
(17, 'watch', 'item-cart-03.jpg', 50, 'jhjhj jhjhj h jh jhjh hjhj hjhj ', 4, 1, 4, 2, '2020-09-17 10:28:49', 'blocked', ''),
(19, 'pjama coton2', 'gallery-01.jpg', 50, '55jhjkhjhhhhuuuuuuuuuu', 1, 0, 3, 30, '2020-09-21 08:03:21', 'blocked', ''),
(20, 'randddd', 'bbbbb.jpg', 22, 'jjjjjjjjjjjjj', 3, 0, 4, 22, '2020-09-22 06:44:13', 'blocked', ''),
(23, 'njkjjjkjk', 'jjjk.jpg', 45, 'fff', 3, 0, 4, 1212, '2020-09-22 06:44:21', 'blocked', ''),
(24, 'watch11', 'banner-07.jpg', 50, 'jhjh jhjhj jhjhj', 4, 7, 3, 4, '2020-09-17 10:45:24', 'allowed', ''),
(25, 'pjama1', 'yelow.jpg', 10, 'jhjhhhjjj', 5, 0, 4, 10, '2020-09-20 22:15:47', 'allowed', ''),
(26, 'pjama coton', 'u.jpg', 10, 'jhhhh', 5, 0, 4, 10, '2020-09-20 22:23:18', 'allowed', ''),
(27, 'pjama coton', '4.jpg', 11, 'mmmmmmmmmmm', 5, 0, 4, 11, '2020-09-20 22:23:26', 'allowed', ''),
(28, 'pjama coton', 'download.jpg', 11, 'jhhhhhhhh', 5, 0, 4, 55, '2020-09-20 22:23:32', 'allowed', ''),
(29, 'pjama coton', 'll.jpg', 50, 'jknn', 5, 0, 4, 55, '2020-09-20 22:23:45', 'allowed', ''),
(30, 'pjama coton', '2.jpg', 22, 'l,,,,,,,,,,', 5, 0, 4, 325, '2020-09-20 22:23:49', 'allowed', ''),
(31, 'pjama coton', '4.jpg', 44, 'bbbbbbbbbbb', 5, 0, 4, 11, '2020-09-29 16:53:37', 'blocked', ''),
(32, 'pjama coton', '7.jpg', 4, 'mmmmm', 5, 0, 4, 12, '2020-09-20 22:24:46', 'allowed', ''),
(33, 'pjama coton', '1.jpg', 22, 'kkkkkk', 5, 0, 4, 10, '2020-09-20 22:24:50', 'allowed', ''),
(34, 'pjama coton', '6.jpg', 12, 'jjjjjjjjjjj', 5, 0, 4, 12, '2020-09-20 22:24:53', 'allowed', ''),
(35, 'pjama coton', '3.jpg', 20, 'njnjjjjjjjjj', 5, 0, 4, 12, '2020-09-20 22:24:56', 'allowed', ''),
(36, 'pjama coton', 'njhj.jpg', 20, 'jjjjjjj', 5, 0, 4, 20, '2020-09-20 22:24:59', 'allowed', ''),
(37, 't-shirt', 'Captur25e.PNG', 20, 'jhjjjjjjj', 1, 6, 13, 20, '2020-09-21 08:03:25', 'blocked', ''),
(38, 'try', 'Capture57.PNG', 11, 'hhhhhhhhhh', 1, 0, 13, 20, '2020-09-20 22:25:37', 'allowed', ''),
(39, 'Navy Blue - Acrylic - Wool', 'Capture885.PNG', 19, 'Product Details: 1731866\r\n\r\nReturn within \"14 days\". For detailed information, Click.\r\n\r\nFabric Info: 30% Wool, 70% Acrylic\r\n\r\nItems included in price: Belt\r\n\r\nSize of the item on the image: Size: 38, Waist: 80 cm, Hips: 86 cm, Front Size: 97 cm\r\n\r\nThere is approximately \"4 cm\" difference between sizes.Size Chart\r\n\r\nDelivery: This item will be dispatched in 24 hours', 1, 9, 3, 20, '2020-09-20 17:12:25', 'allowed', ''),
(40, 'White - Ecru - Pants', 'Capture444.PNG', 20, 'Return within \"14 days\". For detailed information, Click.\r\n\r\nFabric Info: 60% Polyester, 35% Cotton, 5% Lycra\r\n\r\nSize of the item on the image: Size: 38, Height: 107 cm, Waist: 80 cm, Hips: 90 cm\r\n\r\nThere is approximately \"4 cm\" difference between sizes.Size Chart\r\n\r\nDelivery: This item will be dispatched in 24 hours', 1, 9, 3, 20, '2020-09-20 17:15:20', 'allowed', ''),
(43, 'Blue - Denim - - Pants', 'Capture5555.PNG', 53, 'Fabric Info: 100% Cotton\r\n\r\nSize of the model: Size: 36, Height: 175 cm, Bust: 85 cm, Waist: 64 cm, Hips: 90 cm\r\n\r\nSize of the item on the image: Size: 36, Waist: 70 cm, Hips: 90 cm, Front Size: 97 cm\r\n\r\nThere is approximately \"4 cm\" difference between sizes.Size Chart\r\n\r\nDelivery: This item will be dispatched in 24 hours', 1, 9, 3, 35, '2020-09-20 17:20:45', 'allowed', ''),
(44, 'Black - Pants', 'Capture121.PNG', 12, 'Fabric Info: 86% Polyester, 14% Elastane\r\n\r\nSize of the model: Size: 36, Height: 176 cm, Bust: 89 cm, Waist: 66 cm, Hips: 96 cm\r\n\r\nSize of the item on the image: Size: 38, Waist: 76 cm, Hips: 90 cm, Front Size: 108 cm\r\n\r\nThere is approximately \"4 cm\" difference between sizes.Size Chart\r\n\r\nDelivery: This item will be dispatched in 24 hours', 1, 9, 3, 50, '2020-09-20 17:21:41', 'allowed', ''),
(45, 'Ecru - Pants', 'Capture88.PNG', 15, 'Fabric Info: 86% Polyester, 14% Elastane\r\n\r\nSize of the model: Size: 36, Height: 176 cm, Bust: 89 cm, Waist: 66 cm, Hips: 96 cm\r\n\r\nSize of the item on the image: Size: 38, Waist: 76 cm, Hips: 90 cm, Front Size: 108 cm\r\n\r\nThere is approximately \"4 cm\" difference between sizes.Size Chart\r\n\r\nDelivery: This item will be dispatched in 24 hours', 1, 9, 3, 50, '2020-09-20 17:23:21', 'allowed', ''),
(46, 'Navy Blue - - Pants', 'Capturehh.PNG', 20, 'Fabric Info: 33% Polyester, 67% Cotton\r\n\r\nSize of the item on the image: Size: 38, Waist: 76 cm, Hips: 88 cm, Front Size: 95 cm\r\n\r\nThere is approximately \"4 cm\" difference between sizes.Size Chart\r\n\r\nDelivery: This item will be dispatched in 24 hours', 1, 9, 3, 30, '2020-09-20 17:25:21', 'allowed', ''),
(47, 'Gray - Denim - Pants', 'Capture45h5.PNG', 30, 'Fabric Info: 100% Bamboo fabric\r\n\r\nSize of the item on the image: Size: 38, Height: 105 cm, Waist: 64 cm, Hips: 104 cm\r\n\r\nThere is approximately \"4 cm\" difference between sizes.Size Chart\r\n\r\nDelivery: This item will be dispatched in 24 hours', 1, 9, 3, 50, '2020-09-20 17:27:28', 'allowed', ''),
(49, 'blue-dark pant', '4545.jpg', 31, 'Fabric Info: 100% Bamboo fabric\r\n\r\nSize of the item on the image: Size: 38, Height: 105 cm, Waist: 64 cm, Hips: 104 cm\r\n\r\nThere is approximately \"4 cm\" difference between sizes.Size Chart\r\n\r\nDelivery: This item will be dispatched in 24 hours', 1, 9, 3, 22, '2020-09-20 17:30:21', 'allowed', ''),
(51, 'red-pant', '44.jpg', 20, 'Fabric Info: 100% Bamboo fabric Size of the item on the image: Size: 38, Height: 105 cm, Waist: 64 cm, Hips: 104 cm There is approximately \"4 cm\" difference between sizes.Size Chart Delivery: This item will be dispatched in 24 hours', 1, 9, 3, 200, '2020-09-20 17:34:41', 'allowed', ''),
(52, 'Emerald - Crew neck - Unlined', '45455.PNG', 24, 'Fabric Info: Elasticity of the material enables strength and durability. Light weight of the fabric keeps the condition better for longer use.\r\n\r\nPolyester, Unlined\r\n\r\nSize of the item on the image: Size: 38, Bust: 100 cm, Waist: 70 cm, Hips: 100 cm, Front Size: 142 cm\r\n\r\nThere is approximately \"4 cm\" difference between sizes.Size Chart\r\n\r\nDelivery: This item will be dispatched in 24 hours', 1, 3, 5, 30, '2020-09-20 21:43:53', 'allowed', ''),
(53, 'Dusty Rose - Dusty Rose - Crew neck - Unlined - Dress', '7888.PNG', 60, 'Fabric Info: Elasticity of the material enables strength and durability. Light weight of the fabric keeps the condition better for longer use.\r\n\r\nPolyester, Unlined\r\n\r\nSize of the item on the image: Size: 38, Bust: 100 cm, Waist: 70 cm, Hips: 100 cm, Front Size: 142 cm\r\n\r\nThere is approximately \"4 cm\" difference between sizes.Size Chart\r\n\r\nDelivery: This item will be dispatched in 24 hours', 1, 3, 5, 22, '2020-09-20 21:45:11', 'allowed', ''),
(54, 'dress', '4444.PNG', 50, 'Fabric Info: Elasticity of the material enables strength and durability. Light weight of the fabric keeps the condition better for longer use. Polyester, Unlined Size of the item on the image: Size: 38, Bust: 100 cm, Waist: 70 cm, Hips:', 1, 3, 5, 50, '2020-09-20 21:46:26', 'allowed', ''),
(55, 'gggg', '1545478.PNG', 80, 'Fabric Info: Elasticity of the material enables strength and durability. Light weight of the fabric keeps the condition better for longer use. Polyester, Unlined Size of the item on the image: Size: 38, Bust: 100 cm, Waist: 70 cm, Hips:', 1, 3, 5, 130, '2020-09-20 21:47:08', 'allowed', ''),
(56, 'green - dress', 'Captu4545re.PNG', 30, 'Fabric Info: Elasticity of the material enables strength and durability. Light weight of the fabric keeps the condition better for longer use. Polyester, Unlined Size of the item on the image: Size: 38, Bust: 100 cm, Waist: 70 cm, Hips:', 1, 3, 5, 120, '2020-09-20 21:47:56', 'allowed', ''),
(57, 'ooo', '545.jpg', 30, 'Fabric Info: Elasticity of the material enables strength and durability. Light weight of the fabric keeps the condition better for longer use. Polyester, Unlined Size of the item on the image: Size: 38, Bust: 100 cm, Waist: 70 cm, Hips:', 1, 3, 5, 320, '2020-09-20 21:50:53', 'allowed', ''),
(58, 'dress- flower', '888.jpg', 40, 'Fabric Info: Elasticity of the material enables strength and durability. Light weight of the fabric keeps the condition better for longer use. Polyester, Unlined Size of the item on the image: Size: 38, Bust: 100 cm, Waist: 70 cm, Hips:', 1, 3, 5, 40, '2020-09-20 21:51:25', 'allowed', ''),
(59, 'dfdf', 'Capture545.PNG', 10, 'Fabric Info: Elasticity of the material enables strength and durability. Light weight of the fabric keeps the condition better for longer use. Polyester, Unlined Size of the item on the image: Size: 38, Bust: 100 cm, Waist: 70 cm, Hips:', 6, 11, 5, 30, '2020-09-20 22:01:11', 'allowed', ''),
(60, 'bnbnbn', 'Capture59.PNG', 50, 'Fabric Info: Elasticity of the material enables strength and durability. Light weight of the fabric keeps the condition better for longer use. Polyester, Unlined Size of the item on the image: Size: 38, Bust: 100 cm, Waist: 70 cm, Hips:', 6, 11, 5, 111, '2020-09-20 22:01:49', 'allowed', ''),
(61, 'nnnnn', 'Capture554.PNG', 60, 'Fabric Info: Elasticity of the material enables strength and durability. Light weight of the fabric keeps the condition better for longer use. Polyester, Unlined Size of the item on the image: Size: 38, Bust: 100 cm, Waist: 70 cm, Hips:', 6, 11, 5, 10, '2020-09-20 22:02:28', 'allowed', ''),
(62, 'bhh', 'Capture557.PNG', 80, 'Fabric Info: Elasticity of the material enables strength and durability. Light weight of the fabric keeps the condition better for longer use. Polyester, Unlined Size of the item on the image: Size: 38, Bust: 100 cm, Waist: 70 cm, Hips:', 6, 11, 5, 30, '2020-09-20 22:03:06', 'allowed', ''),
(63, 'Mink - Crossbody - Satchel - Shoulder Bags', 'Capture78.PNG', 20, 'Mink - Crossbody - Satchel - Shoulder Bags', 6, 12, 5, 20, '2020-09-20 22:05:03', 'allowed', ''),
(64, 'Mink - Crossbody - Satchel - Shoulder Bags-black', 'Capture589.PNG', 10, 'Mink - Crossbody - Satchel - Shoulder Bags', 6, 12, 5, 20, '2020-09-20 22:05:39', 'allowed', ''),
(65, 'Mink - Crossbody - Satchel - blue', 'Capture5545.PNG', 50, 'Mink - Crossbody - Satchel - Shoulder Bags', 6, 12, 5, 10, '2020-09-20 22:06:25', 'allowed', ''),
(66, 'Mink - Crossbody - Satchel - purple', 'Capturejkjk.PNG', 30, 'Mink - Crossbody - Satchel - Shoulder Bags', 6, 12, 5, 40, '2020-09-20 22:07:03', 'allowed', ''),
(67, 't-shirt-blue', 'product-03.jpg', 10, 't-shirt-blue', 3, 6, 5, 20, '2020-09-20 22:30:04', 'allowed', ''),
(68, 't-shirt-black', 'product-11.jpg', 30, 't-shirt-black', 3, 6, 5, 20, '2020-09-20 22:31:05', 'allowed', ''),
(69, 'shirt-black', '8878.jpg', 20, 'shirt-black', 1, 4, 13, 20, '2020-09-20 22:35:52', 'allowed', ''),
(70, 'shirt-black-cloum', '86656.jpg', 30, 'shirt-black', 1, 4, 13, 30, '2020-09-20 22:36:29', 'allowed', ''),
(71, 'shirt-red', 'Capture14.PNG', 60, 'shirt-red', 1, 4, 13, 20, '2020-09-20 22:37:13', 'allowed', ''),
(72, 'shirt-black', '555.jpg', 20, 'shirt-black', 1, 4, 13, 100, '2020-09-20 22:38:02', 'allowed', ''),
(73, 'shirt-green-22', '1454.jpg', 30, 'shirt-green', 1, 4, 13, 50, '2020-09-20 22:38:44', 'allowed', ''),
(74, 'shirt 364-', '454557.jpg', 30, 'shirt-black', 1, 4, 13, 10, '2020-09-20 22:39:30', 'allowed', ''),
(75, 'bag-12', 'Capturejhj.PNG', 36, 'beauty bag', 6, 12, 4, 50, '2020-09-22 07:13:11', 'allowed', 'Yes'),
(77, 'dress kids', 'images.jpg', 20, 'beauty dress for kids age 5-8 years', 11, 17, 5, 20, '2020-09-29 09:49:00', 'allowed', 'No'),
(78, 'kid', '44.jpg', 20, 'beauty dress for kids age 5-8 years', 11, 17, 5, 30, '2020-09-29 09:49:49', 'allowed', 'No'),
(79, 'doted dress', '5545.jpg', 20, 'beauty dress for kids age 5-8 years', 11, 17, 5, 30, '2020-09-29 09:50:52', 'allowed', 'Yes'),
(80, 'browen bag11', '5551.jpg', 20, 'lethar  browen bag', 6, 12, 4, 122, '2020-09-29 17:00:14', 'allowed', 'Yes'),
(81, 'Red Watche', 'ii.jpg', 20, 'Beauty red watch  ', 4, 8, 3, 60, '2020-09-30 11:19:51', 'allowed', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_id` int(10) NOT NULL,
  `cat_id` int(6) NOT NULL,
  `cat_name` varchar(70) NOT NULL,
  `sub_cat_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_id`, `cat_id`, `cat_name`, `sub_cat_name`) VALUES
(2, 3, 'men', 'pants'),
(3, 1, 'women', 'dresses'),
(4, 1, 'women', 'shirts'),
(6, 3, 'men', 'T-Shirts'),
(7, 4, 'watches and acsessories', 'watches'),
(8, 4, 'watches and acsessories', 'assechories'),
(9, 1, 'women', 'pants'),
(10, 3, 'men', 'pants'),
(11, 6, 'shoses', 'shoses'),
(12, 6, 'shoses', 'bages'),
(17, 11, 'kids', 'dresses');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(10) NOT NULL,
  `vendor_email` varchar(50) NOT NULL,
  `vendor_pass` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_email`, `vendor_pass`, `fullname`) VALUES
(3, 'alaa12@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'alaa'),
(4, 'omar@gmail.com', 'b3ba8f1bee1238a2f37603d90b58898d', 'omar'),
(5, 'hala@gmail.com', '05da33eab200f4c5b5ba3ed05beb2ec5', 'hala ali'),
(13, 'ola@gmail.com', 'd1f491a404d6854880943e5c3cd9ca25', ' ola');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=909;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
