-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2022 at 07:35 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_phpsamples`
--

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `short_text` varchar(32) NOT NULL,
  `number` decimal(10,2) NOT NULL,
  `long_text` text NOT NULL,
  `select_option` varchar(32) NOT NULL,
  `radio` varchar(32) NOT NULL,
  `checkbox` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `short_text`, `number`, `long_text`, `select_option`, `radio`, `checkbox`, `file`, `created_on`) VALUES
(3, 'New Red Apple', '15.00', 'This is an a new red apple', 'sid-5', 'rid-1', 'a:3:{i:0;s:5:\"cid-1\";i:1;s:5:\"cid-2\";i:2;s:5:\"cid-3\";}', '1659677487_apple.jpg', '2022-07-29 05:07:45'),
(4, 'Banana', '10.00', 'This is banana', 'sid-1', 'rid-2', 'a:2:{i:0;s:5:\"cid-1\";i:1;s:5:\"cid-3\";}', '1659071318_banana.jpg', '2022-07-29 05:08:38'),
(9, 'This is a cat', '10.00', 'Cat for sales', 'sid-3', 'rid-2', 'a:3:{i:0;s:5:\"cid-1\";i:1;s:5:\"cid-2\";i:2;s:5:\"cid-3\";}', '1659677591_cat.png', '2022-08-05 05:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(32) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `created_on`) VALUES
(1, 'user@test.com', 'cc03e747a6afbbcbf8be7668acfebee5', '', '2022-07-15 05:39:41'),
(2, 'admin@test.com', 'cc03e747a6afbbcbf8be7668acfebee5', 'admin', '2022-07-15 05:41:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
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
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
