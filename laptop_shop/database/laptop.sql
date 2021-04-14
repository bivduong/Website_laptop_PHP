-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2021 at 07:05 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `User` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Matk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `name`, `address`, `country`, `phone`, `email`, `User`, `password`, `Matk`) VALUES
(1, 'Duong Van Bi', 'Khoa CNTT va Truyen Thong, DHDN', 'Đà Nẵng', '0329203026', 'dvbi.19it5@vku.udn.vn', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 'Bi Smarck', 'KHOA CNTT VA TRUYEN THONG, DHDN', 'Đà Nẵng', '02392138283', 'azuratoska109@gmail.com', 'azuratoska', 'e10adc3949ba59abbe56e057f20f883e', 3),
(7, 'e49f001', 'KHOA CNTT VA TRUYEN THONG, DHDN', 'Đà Nẵng', '02392138283', 'azuratoska10911@gmail.com', 'azuratoska1', 'e10adc3949ba59abbe56e057f20f883e', 3),
(8, 'hfgh', 'KHOA CNTT VA TRUYEN THONG, DHDN', 'Đà Nẵng', '0924234', 'azuratoska@gmail.com', 'bismarck', 'e10adc3949ba59abbe56e057f20f883e', 2);

-- --------------------------------------------------------

--
-- Table structure for table `account type`
--

CREATE TABLE `account type` (
  `Matk` int(11) NOT NULL,
  `Ten_loai_tai_khoan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account type`
--

INSERT INTO `account type` (`Matk`, `Ten_loai_tai_khoan`) VALUES
(1, 'Admin'),
(2, 'Nhân viên'),
(3, 'Khách hàng');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `brandName`) VALUES
(2, 'DELL'),
(3, 'ASUS'),
(4, 'Lenovo'),
(5, 'MacBook'),
(7, 'HP');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_remain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `productId`, `sId`, `productName`, `price`, `quantity`, `image`, `product_remain`) VALUES
(125, 12, 'cqhh4jci3dled3kt8reqe4st1p', 'Laptop Asus ViVobook A512FA-EJ202T Bạc', '16000000', 1, '52c6ef1208.jpg', 0),
(199, 8, 'qs2okitq7hvp3414afi3shabff', 'Laptop Asus Zenbook UX333FA-A41812T ĐỎ', '35000000', 1, '55c62f52d4.png', 0),
(200, 8, 'qs2okitq7hvp3414afi3shabff', 'Laptop Asus Zenbook UX333FA-A41812T ĐỎ', '35000000', 1, '55c62f52d4.png', 0),
(201, 7, 'ov2ljebgfjvv4747ibbjah428t', 'Laptop Asus UX334FAC-A4059T Blue', '46000000', 1, '34854d78d3.jpg', 0),
(202, 8, '878189fnerglv88dg04g5ba4ip', 'Laptop Asus Zenbook UX333FA-A41812T ĐỎ', '35000000', 1, '55c62f52d4.png', 0),
(203, 7, '20ob7r9jjgdorpp8om2r26996t', 'Laptop Asus UX334FAC-A4059T Blue', '46000000', 1, '34854d78d3.jpg', 0),
(209, 11, '7n67d5iir4cauj1vofqh7vhcnm', 'Laptop Apple Macbook Pro 2020 MWP42SA', '50000000', 1, 'c92f9f4153.jpg', 0),
(213, 9, '69r7v6eoju2uc1644vna3jl857', 'Laptop Asus A512FA-EJ1281T Bạc', '12000000', 1, 'e027348a7a.jpg', 0),
(217, 8, '3e9m6hqbc10eosvuv72uqiapj6', 'Laptop Asus Zenbook UX333FA-A41812T ĐỎ', '35000000', 1, '55c62f52d4.png', 0),
(227, 8, 'ggjsk8ti0tnfb5rkc965sgbedb', 'Laptop Asus Zenbook UX333FA-A41812T ĐỎ', '35000000', 3, '55c62f52d4.png', 0),
(228, 8, 'ggjsk8ti0tnfb5rkc965sgbedb', 'Laptop Asus Zenbook UX333FA-A41812T ĐỎ', '35000000', 1, '55c62f52d4.png', 0),
(229, 32, 'feu75jf57r4nial2bv9i8vbd35', 'Laptop Asus VivoBook X509JA i3 1005G1/4GB/256GB/Win10 (EJ480T)', '10690000', 1, 'f0c0cb1bf4.jpg', 0),
(230, 22, 'feu75jf57r4nial2bv9i8vbd35', 'Laptop Dell Inspiron 14 7490-6RKVN1 Bạc', '40000000', 1, '82d08d53ba.png', 0),
(231, 15, 'feu75jf57r4nial2bv9i8vbd35', 'Laptop Apple Macbook Air 2017', '20990000', 1, '1277e2812c.jpg', 0),
(232, 22, 'feu75jf57r4nial2bv9i8vbd35', 'Laptop Dell Inspiron 14 7490-6RKVN1 Bạc', '40000000', 1, '82d08d53ba.png', 0),
(233, 32, 'feu75jf57r4nial2bv9i8vbd35', 'Laptop Asus VivoBook X509JA i3 1005G1/4GB/256GB/Win10 (EJ480T)', '10690000', 1, 'f0c0cb1bf4.jpg', 0),
(234, 32, 'feu75jf57r4nial2bv9i8vbd35', 'Laptop Asus VivoBook X509JA i3 1005G1/4GB/256GB/Win10 (EJ480T)', '10690000', 1, 'f0c0cb1bf4.jpg', 0),
(235, 14, 'feu75jf57r4nial2bv9i8vbd35', 'Laptop Dell Inspiron 7590 -(N7590)', '35000000', 1, 'ee868cdb0f.jpg', 0),
(236, 15, 'feu75jf57r4nial2bv9i8vbd35', 'Laptop Apple Macbook Air 2017', '20990000', 2, '1277e2812c.jpg', 25);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catID` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catID`, `catName`) VALUES
(1, 'LapTop ACER'),
(2, 'LapTop ASUS'),
(6, 'LapTop Lenovo'),
(9, 'Laptop Macbook'),
(10, 'HP');

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

CREATE TABLE `compare` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `customer_id`, `title`, `content`, `date_time`) VALUES
(3, 2, 'gf', 'dfgd', '2020-12-30 16:17:19'),
(4, 2, 'fgd', 'hf', '2021-01-13 14:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `item_rating`
--

CREATE TABLE `item_rating` (
  `ratingId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `ratingNumber` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Block, 0 = Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_rating`
--

INSERT INTO `item_rating` (`ratingId`, `productId`, `userId`, `ratingNumber`, `title`, `comments`, `created`, `modified`, `status`) VALUES
(1, 12345678, 1234567, 1, 'Bi', 'Quá đẹp', '2020-12-01 19:26:58', '2020-12-01 19:26:58', 1),
(2, 8, 1234567, 5, 'Smarck', 'ok', '2020-12-22 19:28:29', '2020-12-22 19:28:29', 1),
(3, 11, 1234567, 5, 'One rain', 'g', '2020-12-22 19:34:50', '2020-12-22 19:34:50', 1),
(4, 14, 1234567, 5, 'dasndasg', 'gdfgdfgd', '2020-12-23 08:29:51', '2020-12-23 08:29:51', 1),
(5, 14, 1234567, 4, 'ter', 'tert', '2020-12-23 08:55:30', '2020-12-23 08:55:30', 1),
(6, 14, 1234567, 5, 'hfhf', 'drergdf', '2020-12-23 08:55:44', '2020-12-23 08:55:44', 1),
(7, 14, 1234567, 4, 'gfgd', 'hghghjhjgh', '2020-12-23 08:56:00', '2020-12-23 08:56:00', 1),
(8, 8, 0, 4, 'gf', 'ff', '2020-12-23 13:13:33', '2020-12-23 13:13:33', 1),
(9, 8, 0, 5, 'One rain', 'gdfg', '2020-12-23 13:17:06', '2020-12-23 13:17:06', 1),
(10, 11, 0, 5, 'hfhf', 'hfghfh', '2020-12-23 13:21:54', '2020-12-23 13:21:54', 1),
(11, 11, 1, 5, 'dasndasg', 'f', '2020-12-23 13:24:50', '2020-12-23 13:24:50', 1),
(12, 8, 1, 1, 'ghj', 'jgj', '2020-12-23 14:49:21', '2020-12-23 14:49:21', 1),
(13, 8, 1, 5, 'fg', 'jghj', '2020-12-24 06:09:55', '2020-12-24 06:09:55', 1),
(14, 8, 7, 5, 'ok', 'o', '2020-12-29 10:30:21', '2020-12-29 10:30:21', 1),
(15, 8, 7, 5, 'Smarck', 'ooooo', '2020-12-29 10:31:20', '2020-12-29 10:31:20', 1),
(16, 8, 2, 5, 'Toska', 'Ok', '2020-12-30 17:16:17', '2020-12-30 17:16:17', 1),
(20, 12, 7, 4, 'dg', 'hf', '2021-01-07 21:52:36', '2021-01-07 21:52:36', 1),
(23, 10, 7, 5, 'dg', 'fs', '2021-01-08 16:01:14', '2021-01-08 16:01:14', 1),
(24, 10, 7, 5, 'ádas', 'gghfhf', '2021-01-08 16:01:33', '2021-01-08 16:01:33', 1),
(25, 10, 7, 4, 'a', 'fghfhf', '2021-01-08 16:02:40', '2021-01-08 16:02:40', 1),
(26, 18, 7, 5, 'a', 'jjh', '2021-01-08 16:12:47', '2021-01-08 16:12:47', 1),
(27, 11, 7, 1, 'a', 'jjjj', '2021-01-08 16:13:32', '2021-01-08 16:13:32', 1),
(28, 11, 7, 5, 'okok', 'ok', '2021-01-08 16:14:44', '2021-01-08 16:14:44', 1),
(29, 21, 7, 5, 'jjjj', 'jjjj', '2021-01-08 16:17:26', '2021-01-08 16:17:26', 1),
(30, 21, 7, 5, 'aaa', 'aaaa', '2021-01-08 16:17:44', '2021-01-08 16:17:44', 1),
(31, 7, 7, 5, 's', 'hg', '2021-01-08 16:27:40', '2021-01-08 16:27:40', 1),
(32, 7, 7, 5, 'dfg', 'hfff', '2021-01-08 16:27:54', '2021-01-08 16:27:54', 1),
(33, 7, 7, 5, 'gf', 'đ', '2021-01-08 16:28:50', '2021-01-08 16:28:50', 1),
(34, 22, 7, 5, 'aa', 'ggg', '2021-01-08 16:33:49', '2021-01-08 16:33:49', 1),
(35, 22, 7, 4, 'fff', 'hhh', '2021-01-08 16:34:04', '2021-01-08 16:34:04', 1),
(40, 22, 2, 5, 'nam', 'hay', '2021-01-11 03:00:58', '2021-01-11 03:00:58', 1),
(41, 33, 2, 5, 'tuteej', 'fd', '2021-01-13 15:14:58', '2021-01-13 15:14:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhap_hang`
--

CREATE TABLE `nhap_hang` (
  `id` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `sl_nhap` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhap_hang`
--

INSERT INTO `nhap_hang` (`id`, `id_sanpham`, `sl_nhap`, `date_time`) VALUES
(1, 22, 1, '2020-12-22 18:55:19'),
(2, 22, 5, '2020-12-23 08:02:49'),
(3, 22, 5, '2020-12-23 13:38:34'),
(4, 13, 5, '2020-12-23 13:41:30'),
(5, 22, 5, '2020-12-23 13:42:03'),
(6, 22, 10, '2020-12-23 13:47:14'),
(7, 15, 5, '2020-12-23 15:57:01'),
(8, 22, 5, '2020-12-30 16:31:31'),
(9, 12, 5, '2020-12-30 16:33:20'),
(10, 18, 5, '2020-12-30 17:49:36'),
(11, 33, 1, '2021-01-13 15:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `order_cus`
--

CREATE TABLE `order_cus` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_cus`
--

INSERT INTO `order_cus` (`id`, `productId`, `productName`, `customer_id`, `quantity`, `price`, `image`, `status`, `date_order`) VALUES
(2, 9, 'Laptop Asus A512FA-EJ1281T Bạc', 1, 1, '1200000', 'e027348a7a.jpg', 1, '2020-11-20 15:39:51'),
(3, 9, 'Laptop Asus A512FA-EJ1281T Bạc', 1, 1, '1200000', 'e027348a7a.jpg', 1, '2020-11-20 15:40:12'),
(4, 11, 'Laptop Apple Macbook Pro 2020 MWP42SA', 1, 1, '50000000', 'c92f9f4153.jpg', 0, '2020-11-21 09:22:11'),
(5, 8, 'Laptop Asus Zenbook UX333FA-A41812T ĐỎ', 1, 1, '35000000', '55c62f52d4.png', 0, '2020-12-23 01:30:15'),
(6, 22, 'Laptop Dell Inspiron 14 7490-6RKVN1 Bạc', 1, 1, '40000000', '82d08d53ba.png', 1, '2020-12-23 01:57:52'),
(7, 8, 'Laptop Asus Zenbook UX333FA-A41812T ĐỎ', 1, 1, '35000000', '55c62f52d4.png', 2, '2020-12-23 14:57:53'),
(8, 22, 'Laptop Dell Inspiron 14 7490-6RKVN1 Bạc', 1, 42, '1680000000', '82d08d53ba.png', 1, '2020-12-23 20:46:20'),
(9, 8, 'Laptop Asus Zenbook UX333FA-A41812T ĐỎ', 1, 1, '35000000', '55c62f52d4.png', 0, '2020-12-24 11:35:21'),
(10, 12, 'Laptop Asus ViVobook A512FA-EJ202T Bạc', 1, 1, '16000000', '52c6ef1208.jpg', 0, '2020-12-24 11:35:51'),
(11, 11, 'Laptop Apple Macbook Pro 2020 MWP42SA', 1, 1, '50000000', 'c92f9f4153.jpg', 1, '2020-12-24 11:36:30'),
(12, 12, 'Laptop Asus ViVobook A512FA-EJ202T Bạc', 1, 1, '16000000', '52c6ef1208.jpg', 0, '2020-12-24 11:37:40'),
(13, 8, 'Laptop Asus Zenbook UX333FA-A41812T ĐỎ', 1, 1, '35000000', '55c62f52d4.png', 0, '2020-12-24 12:10:20'),
(14, 9, 'Laptop Asus A512FA-EJ1281T Bạc', 1, 1, '1200000', 'e027348a7a.jpg', 0, '2020-12-24 12:11:10'),
(16, 22, 'Laptop Dell Inspiron 14 7490-6RKVN1 Bạc', 2, 1, '40000000', '82d08d53ba.png', 0, '2021-01-10 22:02:34'),
(17, 21, 'Laptop Dell Alienware 14 I7-4700MQ / RAM 8GB/ SSD 240GB/ GTX 765M/ 14 INCH FHD', 2, 1, '13000000', '5cdbbe5b6c.jpg', 2, '2021-01-10 22:06:43'),
(18, 8, 'Laptop Asus Zenbook UX333FA-A41812T ĐỎ', 2, 1, '35000000', '55c62f52d4.png', 2, '2021-01-11 01:04:13'),
(19, 32, 'Laptop Asus VivoBook X509JA i3 1005G1/4GB/256GB/Win10 (EJ480T)', 2, 1, '10690000', 'f0c0cb1bf4.jpg', 2, '2021-01-13 20:26:35'),
(20, 33, 'Laptop HP Envy 13 aq1057TX i7 10510U/8GB/512GB/2GB MX250/Win10 (8XS68PA)', 2, 1, '29490000', 'eaca9de9ac.jpg', 2, '2021-01-13 21:37:56'),
(21, 32, 'Laptop Asus VivoBook X509JA i3 1005G1/4GB/256GB/Win10 (EJ480T)', 2, 2, '21380000', 'f0c0cb1bf4.jpg', 2, '2021-01-13 21:37:56'),
(22, 32, 'Laptop Asus VivoBook X509JA i3 1005G1/4GB/256GB/Win10 (EJ480T)', 2, 1, '10690000', 'f0c0cb1bf4.jpg', 1, '2021-01-13 21:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `customer_id`, `Name`, `adress`, `quantity`, `total`, `date_time`) VALUES
(2, 1, 'Dương Văn Bi', 'Khoa CNTT va Truyen thong,Dai hoc Da Nang', 1, 35030000, '2020-12-22 18:32:13'),
(3, 1, 'Dương Văn Bi', 'Khoa CNTT va Truyen thong,Dai hoc Da Nang', 1, 40030000, '2020-12-22 18:57:50'),
(4, 1, 'Dương Văn Bi', 'Khoa CNTT va Truyen thong,Dai hoc Da Nang', 1, 35030000, '2020-12-23 07:57:49'),
(5, 1, 'Dương Văn Bi', 'Khoa CNTT va Truyen thong,Dai hoc Da Nang', 42, 1680030000, '2020-12-23 13:46:18'),
(6, 1, 'Dương Văn Bi', 'Khoa CNTT va Truyen thong,Dai hoc Da Nang', 1, 35030000, '2020-12-24 04:35:12'),
(7, 1, 'Dương Văn Bi', 'Khoa CNTT va Truyen thong,Dai hoc Da Nang', 1, 16030000, '2020-12-24 04:35:49'),
(8, 1, 'Dương Văn Bi', 'Khoa CNTT va Truyen thong,Dai hoc Da Nang', 1, 50030000, '2020-12-24 04:36:29'),
(9, 1, 'Dương Văn Bi', 'Khoa CNTT va Truyen thong,Dai hoc Da Nang', 1, 16030000, '2020-12-24 04:37:38'),
(10, 1, 'Dương Văn Bi', 'Khoa CNTT va Truyen thong,Dai hoc Da Nang', 1, 35030000, '2020-12-24 05:10:14'),
(11, 1, 'Dương Văn Bi', 'Khoa CNTT va Truyen thong,Dai hoc Da Nang', 1, 1230000, '2020-12-24 05:11:08'),
(12, 2, 'Bi Smarck', 'KHOA CNTT VA TRUYEN THONG, DHDN', 1, 35030000, '2020-12-30 16:36:03'),
(13, 2, 'Bi Smarck', 'KHOA CNTT VA TRUYEN THONG, DHDN', 1, 40030000, '2021-01-10 15:02:32'),
(14, 2, 'Bi Smarck', 'KHOA CNTT VA TRUYEN THONG, DHDN', 1, 13030000, '2021-01-10 15:06:40'),
(15, 2, 'Bi Smarck', 'KHOA CNTT VA TRUYEN THONG, DHDN', 1, 35030000, '2021-01-10 18:04:11'),
(16, 2, 'Bi Smarck', 'KHOA CNTT VA TRUYEN THONG, DHDN', 4, 61590000, '2021-01-13 14:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `productQuantity` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_soldout` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `product_remain` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `product_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image3` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `product_code`, `productQuantity`, `product_soldout`, `product_remain`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`, `image1`, `image2`, `image3`) VALUES
(10, 'Laptop Asus Zenbook UX333FA-A4181T ĐỎ', 'UX333FA', '20', '0', '20', 2, 2, '<p>gdgdgd</p>', 1, '26000000', 'cc2b517c21.jpg', 'cc2b517c210.png', 'cc2b517c2104.jpg', 'cc2b517c21048.jpg'),
(11, 'Laptop Apple Macbook Pro 2020 MWP42SA', 'MWP42SA', '20', '1', '19', 9, 5, '<p>Day la loai san pham cao cap va hien tai so luong co han</p>', 0, '50000000', '00bbcb6bb5.jpg', '00bbcb6bb5a.jpg', '00bbcb6bb5a6.jpg', '00bbcb6bb5a67.jpg'),
(12, 'Laptop Asus ViVobook A512FA-EJ202T Bạc', 'A512FA', '20', '0', '25', 2, 3, '<p>Loai san pham gia re danh cho tan sinh vien</p>', 1, '16000000', 'e4543cfb11.jpg', 'e4543cfb11f.jpg', 'e4543cfb11f3.jpg', 'e4543cfb11f3f.jpg'),
(13, 'Laptop Lenovo Thinkpad T470S-20HGA0GEVA', 'T470S', '20', '0', '20', 6, 4, '<p>Gia re, binh dan</p>', 0, '15000000', 'a73bc373e8.jpg', 'a73bc373e8e.jpg', 'a73bc373e8e7.jpg', 'a73bc373e8e77.jpg'),
(14, 'Laptop Dell Inspiron 7590 -(N7590)', 'N7590', '20', '0', '35', 1, 4, '<p>Sản phẩm c&oacute; hạn</p>\r\n<p><span style=\"text-decoration: underline;\"><strong>Ram:16g</strong></span></p>\r\n<p><span style=\"text-decoration: underline;\">Rom:512g</span></p>\r\n<p>&nbsp;</p>', 1, '35000000', '7d9528f6ac.jpg', '7d9528f6ac5.jpg', '7d9528f6ac57.jpg', '7d9528f6ac57f.jpg'),
(15, 'Laptop Apple Macbook Air 2017', 'MAR20', '20', '0', '25', 9, 5, '<ul class=\"parameter \">\r\n<li class=\"p106875 g92_94_93\">gfgdfg</li>\r\n<li class=\"p106875 g92_94_93\">fdfs</li>\r\n<li class=\"p106875 g92_94_93\">da</li>\r\n</ul>', 1, '20990000', '0467f07616.jpg', '0467f076167.jpg', '0467f0761675.jpg', '0467f07616751.jpg'),
(18, 'Laptop MacBook Pro Touch 16 inch 2019 i7 2.6GHz/16GB/512GB/4GB Radeon Pro 5300M (MVVJ2SA/A)', 'MVVJ2SA', '20', '0', '25', 0, 5, '<p>d</p>', 0, '59999000', '154ee30652.jpg', '154ee306521.jpg', '154ee3065211.jpg', '154ee30652117.jpg'),
(21, 'Laptop Dell Alienware 14 I7-4700MQ / RAM 8GB/ SSD 240GB/ GTX 765M/ 14 INCH FHD', '4700MQ ', '20', '1', '0', 1, 2, '<p>p</p>', 0, '13000000', 'c11c1311ce.jpg', 'c11c1311ce4.jpg', 'c11c1311ce43.jpg', 'c11c1311ce434.jpg'),
(22, 'Laptop Dell Inspiron 14 7490-6RKVN1 Bạc', '6RKVN1', '20', '43', '30', 2, 2, '<p>đẹp, tinh tế , sang trọng</p>', 1, '40000000', '597d5c9df7.png', '597d5c9df70.png', '597d5c9df70f.jpg', '597d5c9df70f2.png'),
(32, 'Laptop Asus VivoBook X509JA i3 1005G1/4GB/256GB/Win10 (EJ480T)', 'X509JA', '30', '5', '25', 2, 3, '<p>gdfgfd</p>', 1, '10690000', 'f0c0cb1bf4.jpg', 'f0c0cb1bf4f.jpg', 'f0c0cb1bf4fd.jpg', 'f0c0cb1bf4fdc.'),
(33, 'Laptop HP Envy 13 aq1057TX i7 10510U/8GB/512GB/2GB MX250/Win10 (8XS68PA)', '8XS68PA', '10', '1', '10', 10, 7, '<p>Laptop <a title=\"Xem th&ecirc;m c&aacute;c sản phẩm Hp Envy đang b&aacute;n tại Dienmayxanh.com\" href=\"https://www.dienmayxanh.com/laptop-hp-compaq-envy\" target=\"_blank\" rel=\"noopener\" type=\"Xem th&ecirc;m c&aacute;c sản phẩm Hp Envy đang b&aacute;n tại Dienmayxanh.com\">HP Envy</a> 13 aq1057TX c&oacute; thiết kế mỏng nhẹ, cơ động được l&agrave;m từ kim loại nguy&ecirc;n khối. Phần k&ecirc; tay c&oacute; họa tiết v&acirc;n gỗ độc đ&aacute;o đem đến c&aacute;i nh&igrave;n sang trọng hơn cho Envy 13.</p>\r\n<p>Th&acirc;n m&aacute;y mỏng chỉ <strong>14.7 mm</strong>, c&acirc;n nặng <strong>1.17 kg </strong>dễ d&agrave;ng đem theo b&ecirc;n m&igrave;nh đến bất cứ đ&acirc;u.</p>\r\n<p><img class=\"lazy\" style=\"display: block; opacity: 1;\" title=\"Laptop HP Envy 13 aq1057TX c&oacute; thiết kế mỏng nhẹ\" src=\"https://cdn.tgdd.vn/Products/Images/44/220503/hp-envy-13-i7-8xs68pa-thie%CC%82%CC%81tke%CC%82%CC%81.jpg\" alt=\"Laptop HP Envy 13 aq1057TX c&oacute; thiết kế mỏng nhẹ\" data-src=\"https://cdn.tgdd.vn/Products/Images/44/220503/hp-envy-13-i7-8xs68pa-thiếtkế.jpg\" /></p>', 1, '29490000', 'eaca9de9ac.jpg', 'eaca9de9aca.jpg', 'eaca9de9aca2.jpg', 'eaca9de9aca25.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sliderName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_contact` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `productId`, `sliderName`, `slider_contact`, `slider_image`, `type`) VALUES
(2, 9, 'Laptop ASUS', 'Sản phẩm phù hợp với học sinh, sinh viên', '3b3e073006.png', 1),
(3, 0, 'slide 2', '', '6c412e1a87.png', 1),
(4, 0, 'slide 3', '', '5c806b93e1.png', 1),
(5, 0, 'slide 4', '', 'd6fae2da4b.jpg', 1),
(7, 10, 'Macbook Tinh tế', 'Sản phẩm phù hợp cho dân công nghệ thông tin', '8bdb439c65.jpg', 1),
(8, 12, 'gd', 'dfg', '941ca701b0.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `customer_id`, `productId`, `productName`, `price`, `image`) VALUES
(2, 1, 7, 'Laptop Asus UX334FAC-A4059T Blue', '46000000', '34854d78d3.jpg'),
(3, 1, 8, 'Laptop Asus Zenbook UX333FA-A41812T ĐỎ', '35000000', '55c62f52d4.png'),
(5, 1, 12, 'Laptop Asus ViVobook A512FA-EJ202T Bạc', '16000000', '52c6ef1208.jpg'),
(7, 2, 10, 'Laptop Asus Zenbook UX333FA-A4181T ĐỎ', '26000000', 'e990df5883.jpg'),
(8, 2, 32, 'Laptop Asus VivoBook X509JA i3 1005G1/4GB/256GB/Win10 (EJ480T)', '10690000', 'f0c0cb1bf4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account type`
--
ALTER TABLE `account type`
  ADD PRIMARY KEY (`Matk`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catID`);

--
-- Indexes for table `compare`
--
ALTER TABLE `compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `item_rating`
--
ALTER TABLE `item_rating`
  ADD PRIMARY KEY (`ratingId`);

--
-- Indexes for table `nhap_hang`
--
ALTER TABLE `nhap_hang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_cus`
--
ALTER TABLE `order_cus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `account type`
--
ALTER TABLE `account type`
  MODIFY `Matk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `compare`
--
ALTER TABLE `compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item_rating`
--
ALTER TABLE `item_rating`
  MODIFY `ratingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `nhap_hang`
--
ALTER TABLE `nhap_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_cus`
--
ALTER TABLE `order_cus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
