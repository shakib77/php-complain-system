-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2021 at 05:24 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complain`
--

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id` int(150) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` text NOT NULL,
  `type` text NOT NULL,
  `ctext` text NOT NULL,
  `img` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `name`, `email`, `phone`, `type`, `ctext`, `img`) VALUES
(1, 'shaon', 'mike@gmail.com', '01974505357', 'df', 'dfdfd', ''),
(2, 'dfd', 'mikee@gmail.com', '+8801794505357', 'df', 'dfdfd', ''),
(3, 'shaon2', 'vejasisir00@gmail.com', '01974505357', 'df', 'dfdf', ''),
(4, 'jonny', 'shakibshaon777@gmail.com', '01794505357', 'df', 'dfdf', ''),
(5, 'df', 'shaakiboo@gmail.com', '01794195154', 'df', 'dfdfa', ''),
(6, 'shaon', 'mike@gmail.com', '01974505357', '', 'dfdfa', ''),
(7, 'shaon', 'mike@gmail.com', '01974505357', '', 'dfdfa', ''),
(8, 'shaon', 'mike@gmail.com', '01974505357', '', 'dfdfa', ''),
(9, 'shaon', 'mike@gmail.com', '01974505357', '', 'dfdfa', ''),
(10, 'shaon', 'mike@gmail.com', '01794505357', 'logistics', 'dfasdf', ''),
(11, 'df', 'mike@gmail.com', '01974505357', 'hr', 'dfdasf', ''),
(12, 'shaon', 'veged13401@jalcemail.net', '+8801794505', 'it', 'dfdasf', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
