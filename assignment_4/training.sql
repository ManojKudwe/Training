-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2021 at 08:50 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `training`
--

-- --------------------------------------------------------

--
-- Table structure for table `cate`
--

CREATE TABLE `cate` (
  `srno` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `pimage` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cate`
--

INSERT INTO `cate` (`srno`, `category`, `pname`, `price`, `pimage`) VALUES
(65, 'Electronics', 'facebook', 250, 'pimage/blog_share_fb.jpg'),
(66, 'ncate', 'none', 150, ' pimage/contact_social_media.png '),
(71, 'toys', 'timeline', 100000, 'pimage/timeline_icon.png'),
(74, 'mobile', 'google', 9000, 'pimage/blog_share_gplus.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categ`
--

CREATE TABLE `categ` (
  `srno` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categ`
--

INSERT INTO `categ` (`srno`, `category`) VALUES
(8, 'mobile'),
(10, 'footwear'),
(11, 'toys'),
(25, 'ncate'),
(27, 'dele'),
(28, 'dele cate'),
(30, 'fdvvf fdf'),
(36, 'new category');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cate`
--
ALTER TABLE `cate`
  ADD PRIMARY KEY (`srno`);

--
-- Indexes for table `categ`
--
ALTER TABLE `categ`
  ADD PRIMARY KEY (`srno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cate`
--
ALTER TABLE `cate`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `categ`
--
ALTER TABLE `categ`
  MODIFY `srno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
