-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2020 at 03:24 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usd-inr`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(2) PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'tiger', 'tiger.78@kimfy.co.in', 'tigerding', '25d55ad283aa400af464c76d713c07ad'),
(2, 'aligator', 'aligator.90@gmail.com', 'alialigator', '25d55ad283aa400af464c76d713c07ad'),
(3, 'parrot', 'parrot.79@gmail.com', 'parrotron', '25d55ad283aa400af464c76d713c07ad'),
(4, 'crow', 'crow.45@gmail.com', 'cowcrow', '25d55ad283aa400af464c76d713c07ad'),
(5, 'cow', 'cowtown.90@gmail.com', 'cow-12', '25d55ad283aa400af464c76d713c07ad'),
(6, 'sparrow', 'sparrow.78@gmail.com', 'sparr', '25d55ad283aa400af464c76d713c07ad'),
(7, 'giraffe', 'giraffe.89@gmail.com', 'giraffy', '25d55ad283aa400af464c76d713c07ad'),
(8, 'kangaroo', 'kangaroo.98@gmail.com', 'kangarooton', '25d55ad283aa400af464c76d713c07ad'),
(9, 'kitten', 'kitty.909@gmail.com', 'kitty-ses', '25d55ad283aa400af464c76d713c07ad');

--