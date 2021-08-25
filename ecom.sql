-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2021 at 08:45 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `id` int(30) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_pass` varchar(72) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlog`
--

INSERT INTO `adminlog` (`id`, `admin_email`, `admin_pass`) VALUES
(2, 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `ctg_id` int(11) NOT NULL,
  `ctg_name` varchar(50) NOT NULL,
  `ctg_des` varchar(200) NOT NULL,
  `ctg_status` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`ctg_id`, `ctg_name`, `ctg_des`, `ctg_status`) VALUES
(1, 'Fresh Fruits', 'Lorem ipsum Dolar Sumit propose to develop Ecommerce.', 1),
(12, 'Vegetables', 'Lorem ipsum Dolar Sumit propose to develop Ecommerce.', 1),
(13, 'Fresh Foods', 'Lorem ipsum Dolar Sumit propose to develop Ecommerce.', 1),
(16, 'Dairy', 'Lorem ipsum Dolar Sumit propose to develop Ecommerce.', 1),
(18, 'Junk', 'Lorem ipsum Dolar Sumit propose to develop Ecommerce.', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `pdt_ctg_info`
-- (See below for the actual view)
--
CREATE TABLE `pdt_ctg_info` (
`pdt_id` int(255)
,`pdt_name` varchar(255)
,`pdt_des` varchar(255)
,`pdt_price` int(50)
,`pdt_file` varchar(255)
,`pdt_status` tinyint(5)
,`ctg_id` int(11)
,`ctg_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pdt_id` int(255) NOT NULL,
  `pdt_name` varchar(255) NOT NULL,
  `pdt_des` varchar(255) NOT NULL,
  `pdt_price` int(50) NOT NULL,
  `pdt_catagory` int(255) NOT NULL,
  `pdt_file` varchar(255) NOT NULL,
  `pdt_status` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pdt_id`, `pdt_name`, `pdt_des`, `pdt_price`, `pdt_catagory`, `pdt_file`, `pdt_status`) VALUES
(4, 'Apple', 'Lorem ipsum Dolar Sumit propose to develop Ecommerce.', 160, 12, 'p-01.jpg', 1),
(7, 'Avocado', 'Lorem ipsum Dolar Sumit propose to develop Ecommerce.', 400, 16, 'p-02.jpg', 1),
(9, 'Vegitable', 'Lorem ipsum Dolar Sumit propose to develop Ecommerce.', 120, 13, 'p-03.jpg', 1),
(12, 'Salad', 'Lorem ipsum Dolar Sumit propose to develop Ecommerce.', 320, 12, 'p-28.jpg', 1),
(13, 'Orange', 'Lorem ipsum Dolar Sumit propose to develop Ecommerce.', 220, 1, 'p-06.jpg', 1),
(14, 'Banana', 'Lorem ipsum Dolar Sumit propose to develop Ecommerce.', 380, 13, 'p-07.jpg', 1),
(15, 'Pineapple ', 'Lorem ipsum Dolar Sumit propose to develop Ecommerce.', 210, 16, 'p-09.jpg', 1),
(16, 'Hot-Chilis', 'Lorem ipsum Dolar Sumit propose to develop Ecommerce.', 440, 18, 'p-12.jpg', 1),
(17, 'Passover ', 'Lorem ipsum Dolar Sumit propose to develop Ecommerce.', 120, 13, 'p-05.jpg', 1),
(18, 'Pumpkins', 'Lorem ipsum Dolar Sumit propose to develop Ecommerce.', 260, 13, 'p-22.jpg', 1),
(19, 'Lemon', 'Lorem ipsum Dolar Sumit propose to develop Ecommerce.', 340, 13, 'p-23.jpg', 1),
(20, 'Packham\'s', 'Lorem ipsum Dolar Sumit propose to develop Ecommerce.', 280, 1, 'p-24.jpg', 1),
(21, 'Cherry', 'Lorem ipsum Dolar Sumit propose to develop Ecommerce.', 360, 1, 'p-26.jpg', 1),
(22, 'Junk', 'Lorem ipsum Dolar Sumit propose to develop Ecommerce.', 240, 18, 'p-20.jpg', 1),
(23, 'Mango', 'Lorem Ipsaum Doller Sumit Provide Ecommerce Development.', 440, 1, 'p-27.jpg', 1),
(24, 'Persimmon', 'Lorem ipsum Dolar Sumit propose to develop Ecommerce.', 340, 12, 'p-21.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(6) NOT NULL,
  `user_name` varchar(16) NOT NULL,
  `user_firstname` text NOT NULL,
  `user_lastname` text NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_mobile` int(11) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` tinyint(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_firstname`, `user_lastname`, `user_email`, `user_mobile`, `user_password`, `user_role`) VALUES
(1, 'golamMahmud', 'Golam', 'Mahmud', 'golammahmud@gmail.com', 1557728550, '81dc9bdb52d04dc20036dbd8313ed055', 5),
(24, 'NilufaYasmin', 'Nilufa', 'Yasmin', 'nilufa@gmail.com', 1762901854, '81dc9bdb52d04dc20036dbd8313ed055', 5);

-- --------------------------------------------------------

--
-- Structure for view `pdt_ctg_info`
--
DROP TABLE IF EXISTS `pdt_ctg_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pdt_ctg_info`  AS SELECT `product`.`pdt_id` AS `pdt_id`, `product`.`pdt_name` AS `pdt_name`, `product`.`pdt_des` AS `pdt_des`, `product`.`pdt_price` AS `pdt_price`, `product`.`pdt_file` AS `pdt_file`, `product`.`pdt_status` AS `pdt_status`, `catagory`.`ctg_id` AS `ctg_id`, `catagory`.`ctg_name` AS `ctg_name` FROM (`product` join `catagory`) WHERE `product`.`pdt_catagory` = `catagory`.`ctg_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlog`
--
ALTER TABLE `adminlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`ctg_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pdt_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlog`
--
ALTER TABLE `adminlog`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `ctg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pdt_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
