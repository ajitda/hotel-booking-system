-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2016 at 06:03 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

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
(9, 'Afsana', 'Ahmed', 'afsana.ahmed1000@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Chittagong', 'c5972dea30920119dde4ea0adfc4f2df', 'No'),
(10, 'Jit', 'Das', 'vedu@9me.site', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Chittagong', 'a82a0bf4c7425018bbb8c972e624403c', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `booking_info`
--

CREATE TABLE `booking_info` (
  `customer_name` varchar(200) NOT NULL,
  `package_info` varchar(100) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `rooms` int(100) NOT NULL,
  `adult` int(100) NOT NULL,
  `children` int(100) NOT NULL,
  `person` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `is_deleted` varchar(11) NOT NULL DEFAULT 'No',
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_info`
--

INSERT INTO `booking_info` (`customer_name`, `package_info`, `check_in`, `check_out`, `rooms`, `adult`, `children`, `person`, `price`, `is_deleted`, `id`) VALUES
('tusharbd@gmail.com', 'Family', '2016-12-09', '2016-12-10', 1, 1, 0, 1, 500, '2016-12-13 ', 5),
('tusharbd@gmail.com', 'Family', '0000-00-00', '0000-00-00', 1, 1, 0, 1, 5000, '2016-12-13 ', 8),
('tusharbd@gmail.com', 'B104', '0000-00-00', '0000-00-00', 1, 1, 0, 1, 5000, '2016-12-13 ', 9),
('tusharbd@gmail.com', 'B104', '0000-00-00', '0000-00-00', 1, 1, 0, 1, 5000, '2016-12-13 ', 10),
('tusharbd@gmail.com', 'B104', '0000-00-00', '0000-00-00', 1, 1, 0, 1, 5000, '2016-12-13 ', 11),
('tusharbd@gmail.com', 'B105', '2016-12-11', '2016-12-13', 1, 1, 0, 1, 7500, '2016-12-13 ', 58),
('tusharbd@gmail.com', 'B104', '0000-00-00', '0000-00-00', 1, 1, 0, 1, 5000, '2016-12-13 ', 59),
('flexibledesign01@gmail.com', 'B105', '2016-12-11', '2016-12-12', 1, 1, 1, 1, 7500, '2016-12-15 ', 60),
('flexibledesign01@gmail.com', 'B105', '0000-00-00', '0000-00-00', 1, 1, 0, 1, 7500, '2016-12-13 ', 61),
('flexibledesign01@gmail.com', 'B104', '0000-00-00', '0000-00-00', 1, 1, 0, 1, 5000, '2016-12-13 ', 62),
('flexibledesign01@gmail.com', 'B104', '2016-12-12', '2016-12-13', 1, 1, 0, 1, 5000, 'No', 63),
('flexibledesign01@gmail.com', 'B104', '0000-00-00', '0000-00-00', 1, 1, 0, 1, 5000, 'No', 64),
('flexibledesign01@gmail.com', 'B104', '2016-12-12', '2016-12-13', 1, 1, 0, 1, 5000, 'No', 68),
('flexibledesign01@gmail.com', 'B105', '0000-00-00', '0000-00-00', 1, 1, 0, 1, 7500, '2016-12-15 ', 69),
('flexibledesign01@gmail.com', 'B105', '0000-00-00', '0000-00-00', 1, 1, 0, 1, 7500, 'No', 70),
('flexibledesign01@gmail.com', 'B104', '0000-00-00', '0000-00-00', 1, 1, 0, 1, 5000, '2016-12-13 ', 71),
('flexibledesign01@gmail.com', 'B105', '0000-00-00', '0000-00-00', 1, 1, 0, 1, 7500, '2016-12-16 ', 72),
('flexibledesign01@gmail.com', 'B104', '0000-00-00', '0000-00-00', 1, 1, 0, 1, 5000, '2016-12-24 ', 73);

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
(4, 'B104', 'Honeymoon', '1920*850', 2, 5000, 'it is a delux rooms it is a delux rooms  it is a delux rooms it is a delux rooms it is a delux rooms it is a delux rooms', '14805690291480523791images.jpg', 'No'),
(5, 'C205', 'Deluxe Room', '2500 * 160', 2, 5000, 'Amader Room Gula onek sundar & Aram Daiok', '14805770251480502304download (1).jpg', '2016-12-01 13:37:00'),
(6, 'B105', 'Honeymoon', '135*2687', 2, 7500, 'it is a delux rooms it is a delux rooms  it is a Honemoon rooms it is a delux rooms it is a delux rooms it is a delux rooms', '1481397363page2_img3.jpg', 'No'),
(7, 'C504', 'Air - Condition', '1200*1300', 2, 3500, 'Well organized room', '1481903824img4.jpg', 'No');

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
(18, 'Php', 'Coder', 'tusharbd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '5235', 'dfgdg', 'Yes', '', '', '', '', '0'),
(19, 'asfds', 'sdfgs', 'x@y.z', '202cb962ac59075b964b07152d234b70', '4545', 'sfsj', '4ae15d1c46f25be8db9d07061463c5f0', '', '', '', '', '0'),
(20, 'Ajit', 'Das', 'dasajit1988@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'dfsfsdfsdfsdfsd', '627864a96934e66f279dfae868f2b525', 'male', 'Dhaka', 'Bangladesh', 'Bangladeshi', '3242342343243255'),
(21, 'Ajit', 'Das', 'vedu@9me.site', '202cb962ac59075b964b07152d234b70', '646465465465456', 'dsfsdfsdfsdf', 'bc52f31ff173ace021ac5c2a78e153ce', '', 'Dhaka', 'Bangladesh', 'Bangladeshi', '894161631331'),
(22, 'Ajits', 'Das', 'ajit.das_anu@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'sdfsafsfdsf', '737695f76673f2eba28ff9b05658e82d', 'male', 'Dhaka', 'Bangladesh', 'Bangladeshi', '894161631331'),
(24, 'Sayed7', 'dsjfk', 'ajitdas2900@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'dksafldksjflaskd', '50bc8c4de077648380a6aa26bd604c39', 'male', 'Dhaka', 'Bangladesh', 'Bangladeshi', '894161631331'),
(25, 'Alex', 'Das', 'bitmajit@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '018552266', 'this is second', '6641246937fe2da2ff8bad7c1b0dfafc', 'male', 'Dhaka', 'Bangladesh', 'Bangladeshi', '894161631331'),
(26, 'Flexible ', 'IT', 'flexibledesign01@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'dfsfslkadflsjf', 'Yes', 'male', 'Dhaka', 'Bangladesh', 'Bangladeshi', '894161631331');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_info`
--
ALTER TABLE `booking_info`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `booking_info`
--
ALTER TABLE `booking_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
