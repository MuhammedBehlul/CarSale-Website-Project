-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2024 at 10:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group4`
--

-- --------------------------------------------------------

--
-- Table structure for table `purchased_cars`
--

CREATE TABLE `purchased_cars` (
  `purchaseid` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `purchasedate` timestamp NOT NULL DEFAULT current_timestamp(),
  `brand` varchar(10) NOT NULL,
  `model` varchar(10) NOT NULL,
  `color` varchar(10) NOT NULL,
  `engine` varchar(10) NOT NULL,
  `seat` varchar(10) NOT NULL DEFAULT '"standard"',
  `carbonfiber` varchar(10) NOT NULL DEFAULT '"standard"',
  `wheels` varchar(10) NOT NULL DEFAULT '"standard'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchased_cars`
--

INSERT INTO `purchased_cars` (`purchaseid`, `username`, `purchasedate`, `brand`, `model`, `color`, `engine`, `seat`, `carbonfiber`, `wheels`) VALUES
(1, 'asd', '2024-05-26 19:14:35', 'BMW', 'i5', 'blue', 'v6', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'asd', 'asdasdasd', 'asd@gmail.com'),
(2, 'asd1', 'asdasdasd', 'asd@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `purchased_cars`
--
ALTER TABLE `purchased_cars`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchased_cars`
--
ALTER TABLE `purchased_cars`
  MODIFY `purchaseid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
