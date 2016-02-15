-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2016 at 12:16 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bigbangl_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `mobile_phone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `register_as` int(11) NOT NULL,
  `id_card_type` varchar(100) NOT NULL,
  `id_no` varchar(20) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `address_by_id` text NOT NULL,
  `province_by_id` varchar(50) NOT NULL,
  `city_by_id` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `password`, `phone`, `mobile_phone`, `email`, `register_as`, `id_card_type`, `id_no`, `full_name`, `address_by_id`, `province_by_id`, `city_by_id`, `address`, `province`, `city`) VALUES
(1, '01-00001', 'Admin', '202cb962ac59075b964b07152d234b70', '-', '-', 'admin@local.net', 0, '', '12832057280572805', '', '-', '-', '-', '-', '-', '-'),
(9, '02-00001', 'safril22', '81dc9bdb52d04dc20036dbd8313ed055', '021-319213', '081212525542', 'safrilauliarahman@yahoo.com', 2, 'ktp', '12312', 'Safril Aulia Rahman', 'DEPOK', '32', '32', '', '', ''),
(10, '01-00002', 'safril23', '81dc9bdb52d04dc20036dbd8313ed055', '021-319213', '081212525542', 'safrilauliarahman@yahoo.com', 1, 'ktp', '213121', 'Safril Aulia Rahman', 'jL.Dempo 7 no.81', '32', '32', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
