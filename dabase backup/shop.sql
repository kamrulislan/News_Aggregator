-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 11, 2022 at 06:46 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `p_id` int(6) UNSIGNED NOT NULL,
  `p_name` varchar(300) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_cat` varchar(400) NOT NULL,
  `p_img` varchar(800) NOT NULL,
  `p_imgone` varchar(800) NOT NULL,
  `p_imgthree` varchar(800) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `p_imgfour` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`p_id`, `p_name`, `p_price`, `p_cat`, `p_img`, `p_imgone`, `p_imgthree`, `p_imgfour`) VALUES
(21, 'Amazon echo show', 456, 'Accessories', 'Amazon echo show 8-5.jpg', 'Amazon echo show 8-4.jpg', 'Amazon echo show 8-2.jpg', 'Amazon echo show 8.jpg'),
(22, 'iPhone 13 pro max', 599, 'Smartphone', 'iphpne13.png', 'pro1.jpg', 'pro2.jpg', 'pro11.jpg'),
(23, 'iPhone 13 pro cover', 99, 'Offers', 'pro11.jpg', 'pro4.jpg', 'pro3.jpg', 'pro2.jpg'),
(24, 'iPhone 13 pro cover', 99, 'Offers', 'pro11.jpg', 'pro4.jpg', 'pro3.jpg', 'pro2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item_number` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `item_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `item_price_currency` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `paid_amount_currency` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `checkout_session_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `item_number`, `item_name`, `item_price`, `item_price_currency`, `paid_amount`, `paid_amount_currency`, `txn_id`, `checkout_session_id`, `payment_status`, `created`, `modified`) VALUES
(1, 'test', 'test@gmail.com', '1', 'HP Pavilion Laptop', 2.00, 'USD', 2.00, 'usd', 'pi_3JvaOFIuhitIP6cR0FEnom0H', 'cs_test_a1TndHS3IhW2KTTT06PTXLrsz0eU9qC1XvrFn5pCLATtSN30VNRyOlozsd', 'succeeded', '2021-11-14 10:03:12', '2021-11-14 10:03:12'),
(2, 'test', 'test@gmail.com', '1', 'HP Pavilion Laptop', 2.00, 'USD', 2.00, 'usd', 'pi_3JvahlIuhitIP6cR0Ti7w6lW', 'cs_test_a1o7uV7nVT1RCz9TNxoaMyk3wFrhPuSb6cdUusaau1zZzoPSt9aZ4JahhD', 'succeeded', '2021-11-14 10:23:14', '2021-11-14 10:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(300) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_description` text NOT NULL,
  `p_img` varchar(600) NOT NULL,
  `p_cat` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_price`, `p_description`, `p_img`, `p_cat`) VALUES
(41, 'AirPods Max', 300, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'AirPods Max.jpg', 'Apple Store'),
(42, 'Apple AirPods Pro', 500, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'Apple AirPods Pro.jpg', 'Apple Store'),
(43, 'Apple iPhone 11 - 64 GB', 700, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'Apple iPhone 11 - 64 GB - White - unlocked - (CDMA-GSM).jpg', 'Apple Store'),
(44, 'Apple Watch Series 6 -40mm-GPS', 650, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'Apple Watch Series 6 -40mm-GPS- Space gray (2).jpg', 'Smart Watch'),
(45, 'ASUS ROG Strix Scar 15 (2020) Gaming Laptop', 1200, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'ASUS ROG Strix Scar 15 (2020) Gaming Laptop.jpg', 'Laptop'),
(46, 'ASUS ROG Zephyrus G15 GA502IU-ES76 15.6″', 1245, 'Unlock a world creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'ASUSRO~4.JPG', 'Laptop'),
(47, 'Fujifilm GFX 50R Medium Format Mirrorless', 344, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'Fujifilm GFX 50R Medium Format Mirrorless Camera Body.jpg', 'Camera'),
(48, 'Google - Pixel 5 5G 128GB (Unlocked)', 699, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'Google - Pixel 5 5G 128GB (Unlocked) - Just Black.jpg', 'Smartphone'),
(49, 'Grand Theft Auto V, Rockstar Games (ps4 edition)', 200, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'Grand Theft Auto V, Rockstar Games (ps4 edition and xbox one edition).jpg', 'Games'),
(50, 'Logitech Circle View Network Camera - Weatherproof', 120, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'Logitech Circle View Network Camera - Weatherproof - 1080p - DayNight.jpg', 'Webcam'),
(51, 'AAXA BP1 Speaker Projector.', 199, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes', 'AAXA BP1 Speaker Projector.jpg', 'Accessories'),
(56, 'CANON EOS 90D 32.5 Megapixel, 4K UHD Video', 567, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'CANON EOS 90D 32.5 Megapixel, 4K UHD Video DSLR Camera Body.jpg', 'Camera'),
(57, 'Canon PowerShot G7 X Mark III', 789, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'Canon PowerShot G7 X Mark III.jpg', 'Camera'),
(59, 'Canon EOS M6 Mark II', 879, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'Canon EOS M6 Mark II.jpg', 'Camera'),
(60, 'Thin Case Midnight Blue', 100, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'pro1.jpg', 'Accessories'),
(61, 'iPhone 13 | 13 Pro Spicy Orange', 99, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'pro2.jpg', 'Accessories'),
(62, 'Case iPhone 12 | 12 Pro Virid', 99, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'pro3.jpg', 'Accessories'),
(63, 'iPhone SE Silicone Case - red', 102, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'pro4.jpg', 'Accessories'),
(64, 'Fujifilm GFX 50R Medium Format Mirrorless', 344, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'Fujifilm GFX 50R Medium Format Mirrorless Camera Body.jpg', 'topselling'),
(65, 'Apple iPhone 11 - 64 GB', 700, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'Apple iPhone 11 - 64 GB - White - unlocked - (CDMA-GSM).jpg', 'topselling'),
(66, 'Apple Watch Series 6 -40mm-GPS', 650, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'Apple Watch Series 6 -40mm-GPS- Space gray (2).jpg', 'topselling'),
(67, 'Nylon Apple Watch', 899, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'pro7.jpg', 'Smart Watch'),
(68, 'Apple Watch Series 7 20mm', 799, 'Montes erat risus adipiscing ut a a malesuada dui platea a venenatis vestibulum suscipit eros a diam hac hac nibh condimentum primis at a pretium. A consectetur nec aliquet adipiscing maecenas ac tempor viverra a a morbi molestie ac tristique ad', 'pro10.jpg', 'Smart Watch'),
(69, 'Aquamarine Marble Design', 99, 'Montes erat risus adipiscing ut a a malesuada dui platea a venenatis vestibulum suscipit eros a diam hac hac nibh condimentum primis at a pretium. A consectetur nec aliquet adipiscing maecenas ac tempor viverra a a morbi molestie ac tristique ad.', 'pro11.jpg', 'topselling'),
(70, 'Samsung Galaxy Note20 Ultra 5G', 1111, 'The power to work. The power to play. The Samsung Galaxy Note20 Ultra 5G has a beautiful 6.9” WQHD+ curved display, pro-grade cameras with a 108MP main lens and optic 5X Space Zoom, 8K video capabilities, and a powerful battery.', 'note 20.jpg', 'Smartphone'),
(71, 'Apple iPhone 13 Pro Max', 1299, 'As part of our efforts to reach carbon neutrality by 2030, iPhone 13 Pro and iPhone 13 Pro Max do not include a power adapter or EarPods. Included in the box is a USB‑C to Lightning Cable that supports fast charging and is compatible with USB‑C power adapters and computer ports.', 'iphpne13.png', 'Smartphone'),
(72, 'Apple iPhone 11 - 64 GB', 700, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'Apple iPhone 11 - 64 GB - White - unlocked - (CDMA-GSM).jpg', 'Smartphone'),
(74, 'AirPods Max', 59, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'AirPods Max.jpg', 'offer'),
(75, 'Fujifilm GFX 50R Medium Format Mirrorless', 199, 'Unlock a world of creative possibilities with a pocket 360 action camera that shoots, stabilizes and edits 5.7K 360 video for you. No extra gear needed.', 'Fujifilm GFX 50R Medium Format Mirrorless Camera Body.jpg', 'offer'),
(76, 'Apple Watch Series 7 20mm', 599, 'Montes erat risus adipiscing ut a a malesuada dui platea a venenatis vestibulum suscipit eros a diam hac hac nibh condimentum primis at a pretium. A consectetur nec aliquet adipiscing maecenas ac tempor viverra a a morbi molestie ac tristique ad', 'pro10.jpg', 'offer'),
(77, 'Samsung Galaxy Note20 Ultra 5G', 599, 'The power to work. The power to play. The Samsung Galaxy Note20 Ultra 5G has a beautiful 6.9” WQHD+ curved display, pro-grade cameras with a 108MP main lens and optic 5X Space Zoom, 8K video capabilities, and a powerful battery.', 'note 20.jpg', 'offer'),
(78, 'Apple iPhone 13 Pro Max', 1299, 'As part of our efforts to reach carbon neutrality by 2030, iPhone 13 Pro and iPhone 13 Pro Max do not include a power adapter or EarPods. Included in the box is a USB‑C to Lightning Cable that supports fast charging and is compatible with USB‑C power adapters and computer ports.', 'iphpne13.png', 'Apple Store');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `currency` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(400) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`user_id`, `user_name`, `user_pass`, `user_email`) VALUES
(1, 'kayes', '1234', 'kayes834@gmail.com'),
(2, 'ABDUL KHALID', 'kayes.bdu@gmail.com', '234');

-- --------------------------------------------------------

--
-- Table structure for table `subs_list`
--

CREATE TABLE `subs_list` (
  `subs_id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subs_list`
--

INSERT INTO `subs_list` (`subs_id`, `email`) VALUES
(3, 'kayes834@gmail.com'),
(4, 'kayes.bdu@gmail.com'),
(5, 'agenceywork@gmail.com'),
(10, 'agenceywork@gmail.com'),
(11, 'demo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `temp_cart`
--

CREATE TABLE `temp_cart` (
  `cp_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `cp_price` int(10) NOT NULL,
  `cu_id` varchar(100) NOT NULL,
  `cp_product_id` int(10) NOT NULL,
  `cp_name` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temp_cart`
--

INSERT INTO `temp_cart` (`cp_id`, `qty`, `cp_price`, `cu_id`, `cp_product_id`, `cp_name`) VALUES
(92, 6, 300, '::1', 41, 'AirPods Max'),
(94, 4, 1245, '::1', 46, 'ASUS ROG Zephyrus G15 GA502IU-ES76 15.6″');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `subs_list`
--
ALTER TABLE `subs_list`
  ADD PRIMARY KEY (`subs_id`);

--
-- Indexes for table `temp_cart`
--
ALTER TABLE `temp_cart`
  ADD PRIMARY KEY (`cp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `p_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subs_list`
--
ALTER TABLE `subs_list`
  MODIFY `subs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `temp_cart`
--
ALTER TABLE `temp_cart`
  MODIFY `cp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
