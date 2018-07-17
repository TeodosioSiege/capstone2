-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2018 at 12:17 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `description`) VALUES
(1, 'Brass'),
(2, 'Keyboard'),
(3, 'Percussion'),
(4, 'Strings(Bowed)'),
(5, 'Strings(Plucked)'),
(6, 'Woodwind');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `product_name`, `price`, `category_id`, `image`, `product_desc`) VALUES
(1, 'Flugelhorn', 20000, 1, 'assets/img/brass/flugelhorn.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor '),
(2, 'French Horn', 30000, 1, 'assets/img/brass/frenchhorn.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor '),
(3, 'Horn', 25000, 1, 'assets/img/brass/horn.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor '),
(4, 'Trombone', 26000, 1, 'assets/img/brass/trombone.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor '),
(5, 'Trumpet', 19000, 1, 'assets/img/brass/trumpet.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\nconsequat. Duis aute irure dolor '),
(6, 'Electronic Keyboard', 30000, 2, 'assets/img/keyboard/elecKeyboard.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i'),
(7, 'Grand Piano', 150000, 2, 'assets/img/keyboard/grandPiano.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i'),
(8, 'Upright Piano Brown', 90000, 2, 'assets/img/keyboard/item10.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i'),
(9, 'Upright Piano Black', 95000, 2, 'assets/img/keyboard/upright_piano2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i'),
(10, 'Drum', 15000, 3, 'assets/img/percussion/item7.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i'),
(11, 'Snare Drum', 18000, 3, 'assets/img/percussion/item8.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i'),
(12, 'Cello', 70000, 4, 'assets/img/strings_bowed/cello.jpg', '\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure do'),
(13, 'Viola', 300000, 4, 'assets/img/strings_bowed/Viola.jpg', '\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure do'),
(14, 'Violin', 15000, 4, 'assets/img/strings_bowed/violin.jpg', '\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure do'),
(15, '2 Guitars', 90000, 5, 'assets/img/strings_plucked/item1.jpg', '\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure do');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_Number` int(11) NOT NULL,
  `Customer_Name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_Number`, `Customer_Name`, `Address`) VALUES
(19, 'Admin', 'abc def 65345'),
(20, 'Admin', 'def dfgbfx 3453355'),
(21, 'Admin', 'abc def 65345'),
(22, 'Admin', 'add city 12345'),
(23, 'Admin', 'pag asa qc 11011'),
(24, 'user1', '7 st qc 12345'),
(25, 'user1', 'sample sample 123454'),
(26, 'user1', 'abc def 65345'),
(27, 'user1', 'abc def 65345'),
(30, 'user1 non-admin', 'pag asa dfgbfx 11011'),
(31, 'user1 non-admin', 'sample city 98765'),
(32, 'user1 non-admin', 'sampling sampling 45678'),
(33, 'user1 non-admin', 'abc dfgbfx 12345');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `ordItemId` int(11) NOT NULL,
  `Order_Number` int(11) DEFAULT NULL,
  `Item` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`ordItemId`, `Order_Number`, `Item`, `Quantity`, `Status`) VALUES
(1, 19, 1, 1, 'Delivered'),
(2, 19, 7, 7, 'Delivered'),
(3, 19, 11, 3, 'Delivered'),
(4, 20, 1, 1, 'In Transit'),
(5, 21, 2, 2, 'In Progress'),
(6, 22, 11, 1, 'In Progress'),
(7, 23, 10, 1, 'In Progress'),
(8, 23, 7, 2, 'In Progress'),
(9, 23, 8, 3, 'In Progress'),
(10, 24, 7, 7, 'In Progress'),
(11, 24, 8, 3, 'In Progress'),
(12, 25, 4, 2, 'In Progress'),
(13, 25, 5, 3, 'In Progress'),
(14, 26, 4, 2, 'In Progress'),
(15, 26, 5, 3, 'In Progress'),
(16, 27, 1, 1, 'In Progress'),
(17, NULL, 2, 2, 'In Progress'),
(18, NULL, 4, 3, 'In Progress'),
(19, NULL, 4, 1, 'In Progress'),
(20, 30, 1, 0, 'Cancelled'),
(21, 31, 7, 2, 'In Progress'),
(22, 32, 4, 7, 'In Progress'),
(23, 32, 8, 2, 'In Progress'),
(24, 32, 3, 12, 'In Progress'),
(25, 33, 7, 2, 'Cancellation Requested'),
(26, 33, 11, 0, 'Cancelled'),
(27, 33, 9, 0, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `role`) VALUES
(1, 'admin@mail.com', 'b58e92fff5246645f772bfe7a60272f356c0151a', 'Admin', 'Admin'),
(2, 'Email', 'b58e92fff5246645f772bfe7a60272f356c0151a', 'una huli', 'User'),
(3, 'sample@email.com', '8151325dcdbae9e0ff95f9f9658432dbedfdb209', 'user1 non-admin', 'User'),
(4, 'email2', 'a1881c06eec96db9901c7bbfe41c42a3f08e9cb4', 'user2 user2', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_Number`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`ordItemId`),
  ADD KEY `Order_Number` (`Order_Number`),
  ADD KEY `Item` (`Item`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_Number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `ordItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`Order_Number`) REFERENCES `orders` (`Order_Number`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`Item`) REFERENCES `items` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
