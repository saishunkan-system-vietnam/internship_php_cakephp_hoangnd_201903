-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2019 at 11:57 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7d

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logincakephp`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietloaihang`
--

CREATE TABLE `chitietloaihang` (
  `id` int(11) NOT NULL,
  `tenchitietloaihang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `loaihang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietloaihang`
--

INSERT INTO `chitietloaihang` (`id`, `tenchitietloaihang`, `loaihang_id`) VALUES
(5, '6', 3),
(6, '6s', 3),
(7, '6s Plus', 3),
(8, '6 Plus', 3),
(9, 'f5', 1),
(10, 'f7', 1),
(11, 'f9', 1),
(12, 'a3s', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loaihang`
--

CREATE TABLE `loaihang` (
  `id` int(11) NOT NULL,
  `tenloaihang` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaihang`
--

INSERT INTO `loaihang` (`id`, `tenloaihang`) VALUES
(1, 'Oppo'),
(2, 'Samsung'),
(3, 'Iphone');

-- --------------------------------------------------------

--
-- Table structure for table `mathang`
--

CREATE TABLE `mathang` (
  `id` int(11) NOT NULL,
  `tenmathang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `giaban` bigint(20) NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hienthi` tinyint(1) NOT NULL,
  `chitietloaihang_id` int(11) NOT NULL,
  `nhomhang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mathang`
--

INSERT INTO `mathang` (`id`, `tenmathang`, `soluong`, `giaban`, `hinhanh`, `hienthi`, `chitietloaihang_id`, `nhomhang_id`) VALUES
(1, 'Điện thoại iPhone 6s Plus 32GB', 10, 9000000, 'ip6plus.jpeg', 1, 7, 3),
(2, 'Điện thoại iPhone 6 Plus 32GB', 70, 7000000, 'ip6plus.jpeg', 0, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `nhomhang`
--

CREATE TABLE `nhomhang` (
  `id` int(11) NOT NULL,
  `tennhomhang` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhomhang`
--

INSERT INTO `nhomhang` (`id`, `tennhomhang`) VALUES
(1, 'Hot'),
(2, 'mới'),
(3, 'bình thường');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_details_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_details_id`, `users_id`) VALUES
(8, 0, 1),
(9, 1, 2),
(10, 1, 3),
(11, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role_details`
--

CREATE TABLE `role_details` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_details`
--

INSERT INTO `role_details` (`id`, `name`) VALUES
(0, 'Administrator'),
(1, 'User'),
(2, 'system');

-- --------------------------------------------------------

--
-- Table structure for table `thongso`
--

CREATE TABLE `thongso` (
  `id` int(11) NOT NULL,
  `manhinh` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `hedieuhanh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `camerasau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cameratruoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cpu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ram` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `rom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `thenho` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `thesim` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `trongluong` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `kichthuoc` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mathang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `birthday` date NOT NULL,
  `phonenumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `sex`, `birthday`, `phonenumber`, `address`) VALUES
(1, 'hoangnguyenit98@gmail.com', '202cb962ac59075b964b07152d234b70', 'Nguyễn Đình Hoàng', 0, '1998-09-03', '984554856', 'Hà Nội'),
(2, 'hoangnguyen03091998@gmail.com', '202cb962ac59075b964b07152d234b70', 'Nguyễn Đinh Hoàng', 0, '1998-09-03', '984554856', 'Hà Nội'),
(3, 'ng.hoang9898@gmail.com', '202cb962ac59075b964b07152d234b70', 'Nguyễn Đình Hoàng', 0, '1998-09-03', '0981056713', 'Hà Nội');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietloaihang`
--
ALTER TABLE `chitietloaihang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chitietloaihang_loaihang_id` (`loaihang_id`);

--
-- Indexes for table `loaihang`
--
ALTER TABLE `loaihang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mathang`
--
ALTER TABLE `mathang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietloaihang_id` (`chitietloaihang_id`),
  ADD KEY `nhomhang_id` (`nhomhang_id`);

--
-- Indexes for table `nhomhang`
--
ALTER TABLE `nhomhang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_details_id` (`role_details_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `role_details`
--
ALTER TABLE `role_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thongso`
--
ALTER TABLE `thongso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mathang_id` (`mathang_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietloaihang`
--
ALTER TABLE `chitietloaihang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `loaihang`
--
ALTER TABLE `loaihang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mathang`
--
ALTER TABLE `mathang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `nhomhang`
--
ALTER TABLE `nhomhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role_details`
--
ALTER TABLE `role_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thongso`
--
ALTER TABLE `thongso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietloaihang`
--
ALTER TABLE `chitietloaihang`
  ADD CONSTRAINT `fk_chitietloaihang_loaihang_id` FOREIGN KEY (`loaihang_id`) REFERENCES `loaihang` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `mathang`
--
ALTER TABLE `mathang`
  ADD CONSTRAINT `fk_mathang_chitietloaihang_id` FOREIGN KEY (`chitietloaihang_id`) REFERENCES `chitietloaihang` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `fk_roles_role_details_id` FOREIGN KEY (`role_details_id`) REFERENCES `role_details` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_roles_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
