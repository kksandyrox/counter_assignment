-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2018 at 10:31 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `name`, `user_id`, `created`, `modified`) VALUES
(1, 'Dota 2', 1, '2018-09-15 21:27:59', '2018-09-15 18:03:19'),
(2, 'Beers', 1, '2018-09-15 22:10:43', '2018-09-15 22:10:43'),
(3, 'beans', 1, '2018-09-15 16:43:31', '2018-09-15 16:43:31'),
(5, 'Narcos', 1, '2018-09-15 16:59:44', '2018-09-15 16:59:44'),
(6, 'Leage Of Legends', 1, '2018-09-15 17:16:41', '2018-09-15 17:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_custom` tinyint(3) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `is_custom`, `user_id`, `created`, `modified`) VALUES
(1, 'Kilograms', 0, NULL, '2018-09-15 15:02:42', '2018-09-15 15:02:42'),
(2, 'Hours', 0, NULL, '2018-09-15 15:03:10', '2018-09-15 15:03:10'),
(3, 'Kilometers', 0, NULL, '2018-09-15 15:03:53', '2018-09-15 15:03:53'),
(4, 'games', 1, 1, '2018-09-15 16:58:44', '2018-09-15 16:58:44'),
(5, 'Episodes', 1, 1, '2018-09-15 16:59:44', '2018-09-15 16:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created`, `modified`) VALUES
(1, 'Sandeep', 'Kumar', 'kksandyrox@gmail.com', '$2y$10$8lg.hON3gww84E8jlH6a6O9m.7OVvlDm3UdzC7zKVQCFdLi3f0kB2', '2018-09-15 13:32:37', '2018-09-15 13:32:37'),
(2, 'Mohan', 'Kumar', 'kavilmohan@gmail.com', '$2y$10$ajzOr1WE0ZQL4FWXoACcpuNzP7Nw/LlH4les5MKttK7i7YDJpwa.2', '2018-09-15 18:29:55', '2018-09-15 18:29:55'),
(3, 'Sandeep', '             ', 'asdas@asd.com', '$2y$10$d4alfABuUC9.oQlugf6CYuI/DwuiPqUSHeVMCNjqJr7Vw8cYBNqCS', '2018-09-15 18:45:01', '2018-09-15 18:45:01'),
(4, 'Sobha', 'Mohan', 'sobhamohan@gmail.com', '$2y$10$NhtOVRspO2o8GPXD0fkkcuv0St8HWut/m8T33gpIxuaJXGt3QbEaS', '2018-09-15 19:07:53', '2018-09-15 19:07:53'),
(5, '      Prashob', 'Kumar', 'prash@gmail.com', '$2y$10$G5Va7O/aiiaJayTb5pZIZemJZrE6O7FwCdBfl8VxAXwOncRmz08bO', '2018-09-15 19:16:58', '2018-09-15 19:16:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_counters`
--

CREATE TABLE `user_counters` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `counter_id` int(10) UNSIGNED NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_counters`
--

INSERT INTO `user_counters` (`id`, `user_id`, `counter_id`, `unit_id`, `quantity`, `created`, `modified`) VALUES
(5, 1, 6, 4, 6, '2018-09-16 07:31:13', '2018-09-16 20:27:21'),
(7, 1, 1, 2, 3, '2018-09-16 07:32:41', '2018-09-16 20:27:38'),
(8, 1, 1, 2, 2, '2018-09-15 07:33:27', '2018-09-16 07:33:27'),
(10, 1, 1, 2, 2, '2018-09-16 07:34:34', '2018-09-16 07:34:34'),
(11, 1, 1, 2, 2, '2018-09-16 07:34:59', '2018-09-16 07:34:59'),
(12, 1, 1, 2, 2, '2018-09-08 07:35:07', '2018-09-16 07:35:07'),
(13, 2, 2, 1, 1, '2018-09-16 08:46:09', '2018-09-16 08:46:09'),
(14, 2, 2, 1, 5, '2018-09-16 08:46:21', '2018-09-16 08:46:21'),
(15, 2, 2, 5, 2, '2018-09-16 08:49:13', '2018-09-16 08:49:13'),
(16, 1, 3, 1, 5, '2018-09-16 09:06:15', '2018-09-16 09:06:15'),
(17, 2, 1, 2, 1, '2018-09-16 09:08:07', '2018-09-16 09:08:07'),
(18, 1, 1, 2, 10, '2018-10-16 11:06:41', '2018-09-16 11:06:41'),
(19, 1, 1, 2, 4, '2018-09-16 17:07:14', '2018-09-16 17:07:14'),
(20, 1, 6, 4, 3, '2018-09-16 18:44:29', '2018-09-16 18:44:29'),
(21, 1, 1, 4, 5, '2018-09-16 19:50:19', '2018-09-16 19:50:19'),
(22, 1, 1, 2, 2, '2018-09-16 20:28:40', '2018-09-16 20:28:40'),
(23, 1, 6, 4, 4, '2018-09-16 20:29:45', '2018-09-16 20:31:13'),
(24, 1, 2, 5, 11, '2018-09-16 20:30:12', '2018-09-16 20:30:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_counters`
--
ALTER TABLE `user_counters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_counters`
--
ALTER TABLE `user_counters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
