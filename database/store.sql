-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2020 at 04:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `quantity`, `price`, `image`) VALUES
(18, 'Kue Lapis', 100, 10000, '../img/Resep-kue-lapis-1-1200x720.jpg'),
(19, 'kue semprit', 12, 100000, '../img/cara-membuat-kue-semprit-om0qqnnbecg7yy6ae9rrj9qj2q0hmry6eqo35bf5p0.jpg'),
(24, 'kue keju', 1001, 15000, 'img/anders-jilden-uwbajDCODj4-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_num` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dates` date NOT NULL,
  `total` int(200) NOT NULL,
  `status` enum('unpaid','paid','approve','reject','delivery') NOT NULL,
  `paymentMethod` enum('bca','mandiri','bni','bri') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_num`, `user_id`, `dates`, `total`, `status`, `paymentMethod`) VALUES
(25, 'user13', 13, '2020-05-05', 10592, 'delivery', 'mandiri'),
(26, 'user14', 14, '2020-05-05', 100205, 'paid', 'mandiri'),
(27, 'user15', 15, '2020-05-06', 10324, 'unpaid', ''),
(28, 'user14', 14, '2020-05-06', 111326, 'paid', 'mandiri'),
(29, 'user16', 16, '2020-05-06', 300612, 'unpaid', 'bca'),
(30, 'user14', 14, '2020-05-06', 100602, 'delivery', 'bca');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `payment_id` int(11) NOT NULL,
  `receipt_id` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_rekening` int(11) NOT NULL,
  `transfer` int(11) NOT NULL,
  `bukti_trf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`payment_id`, `receipt_id`, `nama_lengkap`, `no_rekening`, `transfer`, `bukti_trf`) VALUES
(8, '25', 'qwdqwd', 12321312, 213123, 'img/bukti/anders-jilden-uwbajDCODj4-unsplash.jpg'),
(9, '14', 'adsad', 123213, 123213, 'img/bukti/anders-jilden-uwbajDCODj4-unsplash.jpg'),
(10, '17', 'asd', 123213, 12321, 'img/bukti/anders-jilden-uwbajDCODj4-unsplash.jpg'),
(11, '26', 'aadasd', 213213, 123213, 'img/bukti/anders-jilden-uwbajDCODj4-unsplash.jpg'),
(12, '28', 'asdsad', 123213, 121321, 'img/bukti/anders-jilden-uwbajDCODj4-unsplash.jpg'),
(13, '30', 'asdsa', 123231, 12312, 'img/bukti/anders-jilden-uwbajDCODj4-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `resi`
--

CREATE TABLE `resi` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `resi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resi`
--

INSERT INTO `resi` (`id`, `order_id`, `resi`) VALUES
(5, 25, '132213'),
(6, 30, '12321312');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` enum('buyer','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `city`, `address`, `role`) VALUES
(7, 'aasd', 'vasd@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'vads', 'vads', 'vads', 'buyer'),
(8, 'asdoj', 'l@gmail.com', 'f28090f9472414ad6bd3e7d179e34dd6', 'ads', 'asd', 'asd', 'buyer'),
(9, 'adsasd', 'asda@gmail.com', '550e1bafe077ff0b0b67f4e32f29d751', 'zasda', 'adsads', 'asd', 'buyer'),
(10, 'adsasd', 'jj@ggmail.com', '6ae88229d3932d79331eeccfefdd439d', 'sdsadsaa', 'dadsadsa', 'adssad', 'buyer'),
(11, 'asdasd', 'adsasd@gmasd.com', '8ed358a7da3cc760364909d4aaf7321e', 'asdads', 'asdsad', 'adasd', 'buyer'),
(13, 'admin', 'admin@gmail.com', '0c909a141f1f2c0a1cb602b0b2d7d050', '08123456743', 'Tangerang', 'Jl. Boulevard No 12, banten', 'admin'),
(14, 'vinson', 'vinson@gmail.com', 'c88eff5b533cec6a103d85abd1aa73bf', '0812364663', 'tangerang', 'jl pahlawan no 123', 'buyer'),
(15, 'Ammar', 'ammar@gmail.com', 'db4d10883dbd1bed40b9107d1411fad0', '08217367433', '', 'jl ammar no 123', 'buyer'),
(16, 'asddas', 'adsad@gmail.com', '458c580084cc38c044a9a07e5c9d77bd', 'a', 'a', 'Jl. Boulevard No 12', 'buyer'),
(17, 'khevin', 'k@gmail.com', 'cbedf22605bdade689e8383b7c9e9849', 'k', 'k', 'k', 'buyer');

-- --------------------------------------------------------

--
-- Table structure for table `users_items`
--

CREATE TABLE `users_items` (
  `id` int(11) NOT NULL,
  `order_num` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` enum('masuk keranjang','Confirmed') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_items`
--

INSERT INTO `users_items` (`id`, `order_num`, `user_id`, `item_id`, `quantity`, `status`) VALUES
(80, 'user13', 13, 18, 1, 'Confirmed'),
(82, 'user14', 14, 18, 1, 'Confirmed'),
(83, 'user15', 15, 18, 1, 'Confirmed'),
(85, 'user16', 16, 19, 3, 'Confirmed'),
(96, 'user13', 13, 18, 1, 'masuk keranjang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `resi`
--
ALTER TABLE `resi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_items`
--
ALTER TABLE `users_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `resi`
--
ALTER TABLE `resi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users_items`
--
ALTER TABLE `users_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
