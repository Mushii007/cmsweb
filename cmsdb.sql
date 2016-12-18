-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2016 at 02:10 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `posttable`
--

CREATE TABLE `posttable` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `excerpt` varchar(50) NOT NULL,
  `feature_image` varchar(255) NOT NULL,
  `post_time` datetime NOT NULL,
  `author` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posttable`
--

INSERT INTO `posttable` (`id`, `title`, `content`, `excerpt`, `feature_image`, `post_time`, `author`) VALUES
(24, 'Post number ', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one sadsafdasdasdassadsadsadsd', '               Lorem ipsum dolor sit amet, consect', '020125CA362F16DD_2016-12-17.png', '2016-12-17 19:04:33', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `sku_no` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `prod_desc` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` int(11) NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sku_no`, `product_title`, `prod_desc`, `brand`, `category`, `quantity`, `price`, `featured_image`, `added_date`) VALUES
(2, 'PR002', 'Product 2', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'Gucci', 'Business', 80, 500, '9EB3FA984BF4C53C_2016-09-20.jpg', '2016-09-20 15:30:35'),
(3, 'PR002', 'Windows 10', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'Microsoft', 'IT', 0, 250, '1F1F9D7F14B606D7_2016-09-20.jpg', '2016-09-20 15:45:38'),
(4, 'PR005kk', 'Windows XP', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'Microsoft Deprtttt', 'IT sectiom', 80, 100, '8BB554539305F10C_2016-09-21.jpg', '2016-09-20 15:48:34'),
(5, 'PR005', 'Windows 8', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor ', 'Microsoft', 'IT', 80, 200, '2912919BFCF603FD_2016-09-20.jpg', '2016-09-20 15:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `slide_title` varchar(255) NOT NULL,
  `slide_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slide_title`, `slide_img`) VALUES
(19, 'sadsad', 'CCD45809B025DEC4_2016-09-19.jpg'),
(21, '', 'B365E7B7F95C385F_2016-09-21.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `add_date` datetime NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `phone`, `address`, `password`, `add_date`, `user_role`) VALUES
(1, 'Mustabshir', 'Khan', 'admin', 'mustabshir.ubitse@outlook.com', '03132430789', 'r-910/15 f.B area Karachi', '4b78e581bdaffa037a6b11d58bdc934a', '2016-09-22 20:54:32', 'admin'),
(2, 'demo', 'khan', 'demos', 'demo@GMAIL.COM', '03132430789', 'r-910/15 f.B area Karachi', 'b32bee798b61ce1eae6a9a2fc563bf69', '2016-09-22 21:20:30', 'Pending'),
(3, 'mustabshir', 'khan', 'admin123', 'mustabshir.ubitse@hotmail.com', '25126344852', 'slmsaldm', '4b78e581bdaffa037a6b11d58bdc934a', '2016-09-22 22:36:08', 'Pending'),
(4, 'Ibbi', 'khan', 'ibbiadmin', 'ali@demo.com', '03132430789', 'r-910/15 f.B area Karachi', '$2y$10$qYSo6vJwdIBbkM1dA2BOO.TDqlMWymODTTgNIWz10Z7xsNOk0kNcG', '2016-09-22 22:56:24', 'Pending'),
(5, 'Test', 'Khan', 'user', 'user@user.com', '031254555541', 'r-910/15 f.B area Karachi', '4b78e581bdaffa037a6b11d58bdc934a', '2016-09-22 23:18:15', 'Pending'),
(7, 'Mustabshir', 'Khan', 'mushii', 'mushii@gmail.com', '03132430789', 'r-910/15 f.B area Karachi', '$2y$10$lBpAq/4nEYVQBv5VfSw9f.l9RXXa/REenqqlsCsrhkDVLRTaeu2lq', '2016-09-22 23:24:15', 'Pending'),
(8, 'Mustabshir', 'Khan', 'mkdemo', 'mk@mkdemo@outlook.com', '012345261', 'r410/15', '4b78e581bdaffa037a6b11d58bdc934a', '2016-12-17 18:49:00', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posttable`
--
ALTER TABLE `posttable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posttable`
--
ALTER TABLE `posttable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
