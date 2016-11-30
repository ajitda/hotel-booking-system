-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2016 at 08:58 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpcoder_finalproject_b35`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(111) NOT NULL,
  `last_name` varchar(111) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(300) NOT NULL,
  `email_verified` varchar(111) DEFAULT NULL,
  `is_deleted` varchar(11) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`, `email_verified`, `is_deleted`) VALUES
(2, 'Sayed', 'Md Ali jewel', 'mdali.iiuc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'ctg', 'Yes', 'No'),
(6, 'charles', 'howlader', 'bitm.b35.charles@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'Chittagong', '7f5cbc71b0f19d9a14135d152321f87c', 'No'),
(8, 'Ajit', 'Das', 'dasajit1988@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Chittagong', 'Yes', 'No'),
(9, 'Afsana', 'Ahmed', 'afsana.ahmed1000@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Chittagong', 'c5972dea30920119dde4ea0adfc4f2df', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE `booking_info` (
  `package_info` varchar(100) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `rooms` int(100) NOT NULL,
  `adult` int(100) NOT NULL,
  `children` int(100) NOT NULL,
  `person` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `is_verified` varchar(11) NOT NULL DEFAULT 'No',
  `id` int(100) NOT NULL,
  `booking_number` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`package_info`, `check_in`, `check_out`, `rooms`, `adult`, `children`, `person`, `price`, `is_verified`, `id`, `booking_number`) VALUES
('Family', '2016-11-01', '2016-11-02', 1, 1, 1, 1, 1, 'No', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `room_no` varchar(111) NOT NULL,
  `room_name` varchar(111) NOT NULL,
  `room_size` varchar(11) NOT NULL,
  `bed_no` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `file_path` varchar(200) NOT NULL,
  `is_deleted` varchar(200) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_no`, `room_name`, `room_size`, `bed_no`, `rate`, `description`, `file_path`, `is_deleted`) VALUES
(4, 'f1011', 'delux', '1920*850', 0, 5000, 'it is a delux room', '1480489364download.jpg', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(111) NOT NULL,
  `last_name` varchar(111) NOT NULL,
  `email` varchar(111) NOT NULL,
  `password` varchar(111) NOT NULL,
  `phone` varchar(111) NOT NULL,
  `address` varchar(333) NOT NULL,
  `email_verified` varchar(111) DEFAULT NULL,
  `gender` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `nid_birthcertificate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`, `email_verified`, `gender`, `city`, `country`, `nationality`, `nid_birthcertificate`) VALUES
(17, 'Test', 'User', 'tushar.chowdhury@gmail.com', '202cb962ac59075b964b07152d234b70', '01711111111', 'Chittagong', 'Yes', '', '', '', '', '0'),
(18, 'sdjf', 'lksdjf', 'tusharbd@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', '5235', 'dfgdg', 'Yes', '', '', '', '', '0'),
(19, 'asfds', 'sdfgs', 'x@y.z', '202cb962ac59075b964b07152d234b70', '4545', 'sfsj', '4ae15d1c46f25be8db9d07061463c5f0', '', '', '', '', '0'),
(20, 'Ajit', 'Das', 'dasajit1988@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'dfsfsdfsdfsdfsd', '627864a96934e66f279dfae868f2b525', 'male', 'Dhaka', 'Bangladesh', 'Bangladeshi', '3242342343243255');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
