-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 08:08 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci3_crud_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout_form`
--

CREATE TABLE `checkout_form` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `zipcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout_form`
--

INSERT INTO `checkout_form` (`id`, `name`, `number`, `address`, `zipcode`) VALUES
(1, 'anand', '919597656498', 'dada', '600053'),
(2, 'anand', '919597656498', 'dada', '600053'),
(3, 'anand', '919597656498', 'dada', '600053'),
(4, 'selva', '919597656498', 'qwrqerer', '600053'),
(5, 'selva', '919597656498', 'qwrqerer', '600053'),
(6, 'subash', '919597656498', 'dada', '600053'),
(7, 'subash', '919597656498', 'dada', '600053'),
(8, 'subash', '919597656498', 'dada', '600053'),
(9, 'anand1', '919597656498', 'dada', '600053'),
(10, 'anand1', '919597656498', 'dada', '600053'),
(11, 'anand', '919597656498', 'udhyfohkfgksdfg', '600053'),
(12, 'selva', '919597656498', 'fs', '600053'),
(13, 'anand0000001', '919597656498', 'qwrqerer', '600053'),
(14, 'anand002', '919597656498', 'qwrqerer', '600053'),
(15, 'subsh chandrs bosu', '919597656498', 'qwrqerer', '600053'),
(16, 'selva', '919597656498', 'qwrqerer', '600053'),
(17, 'anandddddddddddddddd', '919597656498', 'qwrqerer', '600053'),
(18, 'selva', '919597656498', 'qwrqerer', '600053'),
(19, 'selva', '919597656498', 'qwrqerer', '600053'),
(20, 'selva', '919597656498', 'qwrqerer', '600053'),
(21, 'selva', '919597656498', 'qwrqerer', '600053'),
(22, 'selva', '919597656498', 'qwrqerer', '600053'),
(23, 'selva', '919597656498', 'qwrqerer', '600053'),
(24, 'selva', '919597656498', 'qwrqerer', '600053'),
(25, 'selva', '919597656498', 'qwrqerer', '600053'),
(26, 'selva', '919597656498', 'qwrqerer', '600053'),
(27, 'selva', '919597656498', 'qwrqerer', '600053'),
(28, 'selva', '919597656498', 'qwrqerer', '600053'),
(29, 'subash', '919597656498', 'fs', '600053');

-- --------------------------------------------------------

--
-- Table structure for table `ci3_file`
--

CREATE TABLE `ci3_file` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci3_file`
--

INSERT INTO `ci3_file` (`id`, `title`, `description`, `file`) VALUES
(10, 'womens', 'dsfsfsdf', 'cart11.jpg'),
(11, 'womens', 'dasdadasd', 'cart2.jpg'),
(12, 'men', 'asasasas', 'cart12.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `customer_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `data`, `customer_id`) VALUES
(1, '2023-05-07', '1'),
(2, '2023-05-07', '1'),
(3, '2023-05-07', '1'),
(4, '2023-05-07', '11'),
(5, '2023-05-07', '12'),
(6, '2023-05-07', '13'),
(7, '2023-05-07', '14'),
(8, '2023-05-07', '15'),
(9, '2023-05-07', '16'),
(10, '2023-05-07', '17'),
(11, '2023-05-07', '18'),
(12, '2023-05-07', '19'),
(13, '2023-05-07', '20'),
(14, '2023-05-07', '21'),
(15, '2023-05-07', '22'),
(16, '2023-05-07', '23'),
(17, '2023-05-07', '24'),
(18, '2023-05-07', '25'),
(19, '2023-05-07', '26'),
(20, '2023-05-07', '27'),
(21, '2023-05-07', '28'),
(22, '2023-05-13', '29');

-- --------------------------------------------------------

--
-- Table structure for table `firebase`
--

CREATE TABLE `firebase` (
  `id` int(11) NOT NULL,
  `mobile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `firebase`
--

INSERT INTO `firebase` (`id`, `mobile`) VALUES
(1, '7338939037'),
(2, '7338939037'),
(3, '7338939037');

-- --------------------------------------------------------

--
-- Table structure for table `login_form`
--

CREATE TABLE `login_form` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `usermail` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_user`
--

CREATE TABLE `login_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `usermail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_user`
--

INSERT INTO `login_user` (`id`, `username`, `usermail`) VALUES
(1, 'anand', 'yanianand571@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `orderid` varchar(100) NOT NULL,
  `productid` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `orderid`, `productid`, `quantity`, `price`) VALUES
(1, '5', '10', '3', '39.95'),
(2, '6', '10', '2', '39.95'),
(3, '7', 'womens', '1', '39.95'),
(4, '8', 'womens', '10', '399.5'),
(5, '10', 'womens', '1', '39.95'),
(6, '10', 'womens', '1', '39.95'),
(7, '10', 'men', '1', '39.95'),
(8, '11', 'womens', '1', '39.95'),
(9, '13', 'womens', '1', '39.95'),
(10, '17', 'womens', '1', 'cart11.jpg'),
(11, '20', 'womens', '1', 'cart11.jpg'),
(12, '21', 'womens', '1', 'cart11.jpg'),
(13, '22', 'womens', '1', 'cart11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(11) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `subtotal` varchar(100) NOT NULL,
  `rowid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `qty`, `name`, `price`, `image`, `subtotal`, `rowid`) VALUES
(10, '1', 'womens', '39.95', 'cart11.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `response_msg` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `payment_id`, `name`, `amount`, `status`, `bank_name`, `order_id`, `response_msg`, `contact`, `email`) VALUES
(1, 'pay_Lw9k9nCjEnPBrh', 'anand', '555', 'captured', 'IDBI', 'order_Lw9jtgPhfaAjTf', 'Test Transaction', '+3456789878', 'anandd@gmail.com'),
(2, 'pay_LwXk05HK6fTusc', 'anand', '77', 'captured', '', 'order_LwXjVW6JZXGswZ', 'A Wild Sheep Chase is the third novel by Japanese author Haruki Murakami', '+1234567890', 'anandd@gmail.com'),
(3, 'pay_LwXtDN5QFe58Gd', '', '21', 'captured', '', 'order_LwXt0b8reZoxtd', 'A Wild Sheep Chase is the third novel by Japanese author Haruki Murakami', '+1234567890', 'anandd@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout_form`
--
ALTER TABLE `checkout_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci3_file`
--
ALTER TABLE `ci3_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `firebase`
--
ALTER TABLE `firebase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_form`
--
ALTER TABLE `login_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_user`
--
ALTER TABLE `login_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout_form`
--
ALTER TABLE `checkout_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ci3_file`
--
ALTER TABLE `ci3_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `firebase`
--
ALTER TABLE `firebase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_form`
--
ALTER TABLE `login_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_user`
--
ALTER TABLE `login_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
