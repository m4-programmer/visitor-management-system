-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2022 at 06:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visitor`
--

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `sign_in`
--

CREATE TABLE `sign_in` (
  `id` int(4) NOT NULL,
  `id_no` varchar(26) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `reasons` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `sign_in_time` varchar(50) NOT NULL DEFAULT current_timestamp(),
  `sign_out_time` varchar(50) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `signer` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `uname` varchar(256) DEFAULT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(50) NOT NULL,
  `ip` varchar(90) NOT NULL,
  `date` varchar(90) NOT NULL,
  `is_active` int(1) NOT NULL,
  `rank` int(1) NOT NULL,
  `img_profile` varchar(200) NOT NULL DEFAULT 'uploads_md5/avatar_profile.png',
  `img_background` varchar(200) NOT NULL,
  `profile_description` longtext NOT NULL,
  `last_update` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `uname`, `email`, `password`, `ip`, `date`, `is_active`, `rank`, `img_profile`, `img_background`, `profile_description`, `last_update`) VALUES
(1, 'admin', '', 'admin', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '::1', '2022-05-04 02:54:06 am', 1, 1, 'images/avatar_profile.png', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sign_in`
--
ALTER TABLE `sign_in`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_no` (`id_no`),
  ADD KEY `signer` (`signer`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--


--
-- AUTO_INCREMENT for table `sign_in`
--
ALTER TABLE `sign_in`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sign_in`
--
ALTER TABLE `sign_in`
  ADD CONSTRAINT `sign_in_ibfk_1` FOREIGN KEY (`signer`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
