-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2019 at 05:48 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopdienthoai`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
(1, 'Samsung', 0),
(2, 'Oppo', 0),
(6, 'Oppo A3s', 2),
(7, 'Iphone', 0),
(9, 'Iphone 6s', 7),
(10, 'Iphone 6', 7),
(11, 'Iphone 6 plus', 7),
(12, 'Iphone 6s plus', 7),
(13, 'Iphone 7', 7);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'Mới'),
(2, 'Hot'),
(4, 'Mới 98%');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`) VALUES
(69, '654621118929618272647262095539.jpg'),
(70, '773925296036416140289248461405.jpeg'),
(71, '909348864593263590891610789141.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL COMMENT 'giá bán',
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `status` tinyint(1) NOT NULL COMMENT 'trạng thái hiển thị',
  `description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'miêu tả',
  `categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `status`, `description`, `categories_id`) VALUES
(1, 'Điện thoại OPPO A3s 32GB', 4000000, 111, 1, '<h2>Đặc điểm nổi bật của OPPO A3s 32GB</h2>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/183994/Slider/-oppo-a3s-32gb-thiet-ke.jpg\" /></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/tin-tuc/bao-mat-khuon-mat-se-thanh-tieu-chuan-moi-tren-smartphone-1066760\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/cong-nghe-selfie-ai-beauty-la-gi-1049958\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/he-dieu-hanh-coloros-tren-oppo-la-ma-quen-1073718\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p>Bộ sản phẩm chuẩn: Hộp, Sạc, S&aacute;ch hướng dẫn, C&aacute;p, C&acirc;y lấy sim, Ốp lưng</p>\r\n\r\n<h2><a href=\"https://www.thegioididong.com/dtdd/oppo-a3s-32gb\" target=\"_blank\">OPPO A3s 32GB</a>&nbsp;l&agrave; một chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\">smartphone</a>&nbsp;mới của OPPO sở hữu gi&aacute; rẻ hiếm hoi nhưng vẫn được trang bị m&agrave;n h&igrave;nh tai thỏ v&agrave; camera k&eacute;p xu thế của năm 2018.</h2>\r\n\r\n<h3>Thiết kế thời trang với m&agrave;u sắc sang trọng</h3>\r\n\r\n<p>OPPO A3s sở hữu cho m&igrave;nh vẻ bề ngo&agrave;i sang trọng v&agrave; tinh tế kh&ocirc;ng k&eacute;m g&igrave; c&aacute;c thiết bị cao cấp.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/183994/oppo-a3s-32gb-do-8-org-1.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế điện thoại OPPO A3s 32GB\" src=\"https://cdn.tgdd.vn/Products/Images/42/183994/oppo-a3s-32gb-do-8-org-1.jpg\" /></a></p>\r\n\r\n<p>C&aacute;c g&oacute;c cạnh của m&aacute;y cũng được bo cong mềm mại đem lại cho người d&ugrave;ng cảm gi&aacute;c cầm nắm kh&aacute; thoải m&aacute;i c&ugrave;ng phần viền m&agrave;n h&igrave;nh được ho&agrave;n thiện cong 2.5D mang lại trải nghiệm sử dụng tốt hơn.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/183994/oppo-a3s-32gb-do-7-org-1.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế điện thoại OPPO A3s 32GB\" src=\"https://cdn.tgdd.vn/Products/Images/42/183994/oppo-a3s-32gb-do-7-org-1.jpg\" /></a></p>\r\n\r\n<h3>M&agrave;n h&igrave;nh tai thỏ cao cấp</h3>\r\n\r\n<p>Điểm ấn tượng đầu ti&ecirc;n tr&ecirc;n&nbsp;chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd-oppo\" target=\"_blank\">điện thoại OPPO</a>&nbsp;n&agrave;y&nbsp;ch&iacute;nh l&agrave; phần&nbsp;phần tai thỏ b&ecirc;n tr&ecirc;n m&agrave;n h&igrave;nh tương tự như chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-x-64gb\" target=\"_blank\">iPhone X</a>&nbsp;tới từ Apple.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/183657/oppo-a3s-do-4-org-1.jpg\" onclick=\"return false;\"><img alt=\"Màn hình tai thỏ điện thoại OPPO A3s\" src=\"https://cdn.tgdd.vn/Products/Images/42/183657/oppo-a3s-do-4-org-1.jpg\" /></a></p>\r\n\r\n<p>OPPO A3s c&oacute; m&agrave;n h&igrave;nh 6.2 inch độ ph&acirc;n giải HD+, tỷ lệ m&agrave;n h&igrave;nh đạt 88.8% mang lại kh&ocirc;ng gian lớn cho l&agrave;m việc v&agrave; giải tr&iacute;.</p>\r\n\r\n<p>Tấm nền IPS cho m&agrave;u sắc trung thực, hiển thị h&igrave;nh ảnh sắc n&eacute;t, độ tương phản cao. Bao phủ mặt trước l&agrave; k&iacute;nh cường lực Corning Gorilla Glass 3 chống chịu va đập, trầy xước vượt trội.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/183657/oppo-a3s-3-1.jpg\" onclick=\"return false;\"><img alt=\"Màn hình tai thỏ điện thoại OPPO A3s\" src=\"https://cdn.tgdd.vn/Products/Images/42/183657/oppo-a3s-3-1.jpg\" /></a></p>\r\n\r\n<h3>Camera k&eacute;p xo&aacute; ph&ocirc;ng chất lượng</h3>\r\n\r\n<p><a href=\"https://www.thegioididong.com/dtdd-oppo\" target=\"_blank\">OPPO</a>&nbsp;A3s 32GB sở hữu hệ thống camera k&eacute;p độc đ&aacute;o với độ ph&acirc;n giải của hai camera lần lượt l&agrave;&nbsp;13 MP (ống k&iacute;nh ch&iacute;nh) v&agrave; 2 MP (ống k&iacute;nh phụ).</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/183657/oppo-a3s-do-10-org-1.jpg\" onclick=\"return false;\"><img alt=\"Camera điện thoại OPPO A3s\" src=\"https://cdn.tgdd.vn/Products/Images/42/183657/oppo-a3s-do-10-org-1.jpg\" /></a></p>\r\n\r\n<p>Trong điều kiện &aacute;nh s&aacute;ng đầy đủ m&aacute;y cho những bức ảnh x&oacute;a ph&ocirc;ng ở mức kh&aacute;, m&agrave;u sắc h&agrave;i h&ograve;a rất ph&ugrave; hợp cho c&aacute;c bạn đăng facebook &quot;sống ảo&quot;.</p>\r\n\r\n<p>Camera trước của m&aacute;y cũng c&oacute; độ ph&acirc;n giải l&ecirc;n tới 8 MP, hỗ trợ selfie g&oacute;c rộng, được trang bị sẵn c&aacute;c chế độ l&agrave;m đẹp hứa hẹn sẽ kh&ocirc;ng l&agrave;m phụ l&ograve;ng những bạn trẻ th&iacute;ch tự sướng.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/183657/oppo-a3s-5.jpg\" onclick=\"return false;\"><img alt=\"Hình selfie điện thoại OPPO A3s\" src=\"https://cdn.tgdd.vn/Products/Images/42/183657/oppo-a3s-5.jpg\" /></a></p>\r\n\r\n<h3>Hiệu năng đủ để giải tr&iacute; đơn giản</h3>\r\n\r\n<p>OPPO A3s 32GB được trang bị vi xử l&yacute;&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/qualcomm-snapdragon-450-ra-mat-sieu-tiet-kiem-pin-ho-tro-camera-kep-quick-charge-3-0-997437\" target=\"_blank\">Snapdragon 450 với 8 nh&acirc;n</a>&nbsp;đảm bảo thỏa m&atilde;n đa số nhu cầu sử dụng hằng ng&agrave;y v&agrave; chơi game th&ocirc;ng dụng ở mức cấu h&igrave;nh thấp.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/183657/oppo-a3s-1-1.jpg\" onclick=\"return false;\"><img alt=\"Chơi game trên điện thoại OPPO A3s\" src=\"https://cdn.tgdd.vn/Products/Images/42/183657/oppo-a3s-1-1.jpg\" /></a></p>\r\n\r\n<p>RAM 3 GB kết hợp với bộ nhớ trong 32 GB c&oacute; thể mở rộng th&ecirc;m qua thẻ nhớ tối đa 256 GB cho bạn thoải m&aacute;i lưu trữ dữ liệu.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>M&aacute;y chạy tr&ecirc;n giao diện ColorOS 5.1 được t&ugrave;y biến tr&ecirc;n Android 8.1 c&oacute; nhiều t&iacute;nh năng thuận tiện gi&uacute;p bạn sử dụng hiệu quả hơn.</p>\r\n\r\n<h3>Thiết kế thời trang với m&agrave;u sắc sang trọng</h3>\r\n\r\n<p>OPPO A3s sở hữu cho m&igrave;nh vẻ bề ngo&agrave;i sang trọng v&agrave; tinh tế kh&ocirc;ng k&eacute;m g&igrave; c&aacute;c thiết bị cao cấp.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/183994/oppo-a3s-32gb-do-8-org-1.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế điện thoại OPPO A3s 32GB\" src=\"https://cdn.tgdd.vn/Products/Images/42/183994/oppo-a3s-32gb-do-8-org-1.jpg\" /></a></p>\r\n\r\n<p>C&aacute;c g&oacute;c cạnh của m&aacute;y cũng được bo cong mềm mại đem lại cho người d&ugrave;ng cảm gi&aacute;c cầm nắm kh&aacute; thoải m&aacute;i c&ugrave;ng phần viền m&agrave;n h&igrave;nh được ho&agrave;n thiện cong 2.5D mang lại trải nghiệm sử dụng tốt hơn.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/183994/oppo-a3s-32gb-do-7-org-1.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế điện thoại OPPO A3s 32GB\" src=\"https://cdn.tgdd.vn/Products/Images/42/183994/oppo-a3s-32gb-do-7-org-1.jpg\" /></a></p>\r\n\r\n<h3>Dung lượng pin tốt</h3>\r\n\r\n<p>Vi&ecirc;n pin c&oacute; dung lượng&nbsp;4230 mAh gi&uacute;p bạn sử dụng m&aacute;y kh&aacute; thoải m&aacute;i trong khoảng hơn một ng&agrave;y.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/183657/oppo-a3s-do-9-org-1.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế điện thoại OPPO A3s\" src=\"https://cdn.tgdd.vn/Products/Images/42/183657/oppo-a3s-do-9-org-1.jpg\" /></a></p>\r\n\r\n<p>Tr&ecirc;n&nbsp;OPPO A3s th&igrave; OPPO cũng loại bỏ đi cảm biến v&acirc;n tay v&agrave; bạn c&oacute; thể mở kh&oacute;a với khu&ocirc;n mặt cũng c&oacute; tốc độ rất ấn tượng.</p>\r\n', 6),
(3, 'Điện thoại iPhone 6s Plus 32GB', 1000000, 12, 0, '<h2>Đặc điểm nổi bật của iPhone 6s Plus 32GB</h2>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/87846/Slider/vi-vn-1-thietke.jpg\" /></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/huong-dan-su-dung-3d-touch-738113\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/thiet-lap-van-tay-moi-tren-iphone-920010\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p>Bộ sản phẩm chuẩn: Hộp, Sạc, Tai nghe, S&aacute;ch hướng dẫn, C&aacute;p, C&acirc;y lấy sim</p>\r\n\r\n<h2><a href=\"https://www.thegioididong.com/dtdd/iphone-6s-plus-32gb\" target=\"_blank\">iPhone 6s Plus 32 GB</a>&nbsp;l&agrave;&nbsp;phi&ecirc;n bản&nbsp;n&acirc;ng cấp ho&agrave;n hảo từ&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-6-plus-32gb\" target=\"_blank\">iPhone 6 Plus</a>&nbsp;với nhiều t&iacute;nh năng mới hấp dẫn.</h2>\r\n\r\n<h3>Camera được cải tiến</h3>\r\n\r\n<p><a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\">Điện thoại</a>&nbsp;iPhone 6s Plus 32 GB được n&acirc;ng cấp độ ph&acirc;n giải camera sau l&ecirc;n 12 MP (thay v&igrave; 8 MP như tr&ecirc;n&nbsp;iPhone 6 Plus), camera cho tốc độ lấy n&eacute;t v&agrave; chụp nhanh, thao t&aacute;c chạm để chụp nhẹ nh&agrave;ng. Chất lượng ảnh trong c&aacute;c điều kiện chụp kh&aacute;c nhau tốt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/71770/iphone-6s-plus2-1.jpg\" /><img src=\"https://cdn.tgdd.vn/Products/Images/42/71770/iphone-6s-plus1-1.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>M&agrave;u s&aacute;ng hơn hẳn so với iPhone 6 Plus</em></p>\r\n\r\n<p>Camera trước với độ ph&acirc;n giải 5 MP cho h&igrave;nh ảnh với độ chi tiết r&otilde; n&eacute;t, đặc biệt m&aacute;y c&ograve;n c&oacute; t&iacute;nh năng Retina Flash, sẽ gi&uacute;p m&agrave;n h&igrave;nh s&aacute;ng l&ecirc;n như đ&egrave;n Flash để bức ảnh khi bạn chụp trong trời tối được tốt hơn.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/71770/iphone-6s-plus213.gif\" onclick=\"return false;\"><img alt=\"Để bật tính năng Retina Flash, tại camera trước bạn bật đèn Flash lên\" src=\"https://cdn.tgdd.vn/Products/Images/42/71770/iphone-6s-plus213.gif\" /></a></p>\r\n\r\n<p><em>Để bật t&iacute;nh năng Retina Flash, tại camera trước bạn bật đ&egrave;n Flash l&ecirc;n</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/71770/iphone-6s-plus1-2.jpg\" /><img src=\"https://cdn.tgdd.vn/Products/Images/42/71770/iphone-6s-plus2-2.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Đ&egrave;n Flash gi&uacute;p ảnh được s&aacute;ng hơn</em></p>\r\n\r\n<h3>Th&iacute;ch th&uacute; hơn với m&agrave;n h&igrave;nh rộng</h3>\r\n\r\n<p>M&agrave;n h&igrave;nh lớn c&ugrave;ng&nbsp;m&agrave;u sắc tươi tắn, độ n&eacute;t cao&nbsp;sẽ mang đến nhiều&nbsp;th&iacute;ch th&uacute; khi lướt web, xem phim hay l&agrave;m việc.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/71770/iphone-6s-plus4-1.jpg\" onclick=\"return false;\"><img alt=\"Màn hình lớn 5.5 inch thoải mái để làm việc và giải trí\" src=\"https://cdn.tgdd.vn/Products/Images/42/71770/iphone-6s-plus4-1.jpg\" /></a></p>\r\n\r\n<p><em>M&agrave;n h&igrave;nh lớn 5.5 inch thoải m&aacute;i để l&agrave;m việc v&agrave; giải tr&iacute;</em></p>\r\n\r\n<h3>Cảm ứng 3D Touch độc đ&aacute;o</h3>\r\n\r\n<p>3D Touch l&agrave; t&iacute;nh năng ho&agrave;n to&agrave;n mới tr&ecirc;n iPhone 6s Plus 32 GB, cho ph&eacute;p người d&ugrave;ng xem trước được c&aacute;c t&ugrave;y chọn nhanh dựa v&agrave;o lực nhấn mạnh hay nhẹ m&agrave; kh&ocirc;ng cần phải nhấp v&agrave;o ứng dụng.</p>\r\n\r\n<p>Để sử dụng, bạn chỉ cần nhấn v&agrave;o m&agrave;n h&igrave;nh hoặc ứng dụng 1 lực mạnh đến khi m&aacute;y rung nhẹ l&agrave; c&oacute; thể xem được.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/71770/iphone-6s-plus342.gif\" onclick=\"return false;\"><img alt=\"Chọn nhanh các lựa chọn trên camera của máy\" src=\"https://cdn.tgdd.vn/Products/Images/42/71770/iphone-6s-plus342.gif\" /></a></p>\r\n\r\n<p><em>Chọn nhanh c&aacute;c lựa chọn tr&ecirc;n camera của m&aacute;y</em></p>\r\n\r\n<p>Đ&aacute;ng tiếc t&iacute;nh năng 3D Touch n&agrave;y chỉ mới được &aacute;p dụng tr&ecirc;n c&aacute;c&nbsp;ứng dụng tr&ecirc;n d&ograve;ng&nbsp;<a href=\"https://www.thegioididong.com/dtdd-apple-iphone\" target=\"_blank\">điện thoại iPhone</a>&nbsp;như: danh bạ, camera, mail, m&aacute;y ảnh ...&nbsp;</p>\r\n\r\n<p>Bạn c&oacute; thể t&igrave;m hiểu th&ecirc;m t&iacute;nh năng 3D Touch&nbsp;<strong><a href=\"https://www.thegioididong.com/tin-tuc/tong-hop-tat-ca-nhung-tien-ich-3d-touch-dem-den-cho-nguoi-dung-714800\" target=\"_blank\">tại đ&acirc;y</a></strong>.</p>\r\n\r\n<h3>Sức mạnh của bộ vi xử l&yacute; A9 mới nhất</h3>\r\n\r\n<p>iPhone 6s Plus 32 GB sử dụng&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/chip-xu-ly-apple-a9-tren-iphone-6s-va-6s-plus-733695\" target=\"_blank\">vi xử l&yacute; A9</a>&nbsp;tốc độ 1.8 GHz (iPhone 6 Plus chỉ với 1.4 GHz), gi&uacute;p m&aacute;y chạy c&ugrave;ng l&uacute;c nhiều ứng dụng mượt m&agrave;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Bạn sẽ thực sự cảm nhận được sức mạnh của iPhone 6s Plus 32 GB khi chiến c&aacute;c game c&oacute; đồ họa nặng như&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/modern-combat-5-blackout-game-bom-tan-do-bo-len-ca-556327\" target=\"_blank\">Modern Combat 5</a>&nbsp;hay&nbsp;Warhammer 40.000</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Người trợ l&yacute; ảo rất hữu dụng tr&ecirc;n c&aacute;c d&ograve;ng m&aacute;y iPhone (Nguồn: Youtube)</em></p>\r\n\r\n<p>Vi&ecirc;n pin chỉ c&oacute; dung lượng 2750 mAh kh&aacute; thấp, tuy nhi&ecirc;n bạn vẫn c&oacute; thể an t&acirc;m sử dụng m&aacute;y trong một ng&agrave;y.</p>\r\n\r\n<p>Một chiếc điện thoại vừa thể hiện đẳng cấp của bạn vừa mang lại những n&acirc;ng cấp tốt hơn như camera, hiệu năng hoạt động mạnh mẽ hơn, t&iacute;nh năng 3D Touch độc đ&aacute;o, tất cả sẽ l&agrave; trải nghiệm mới mẻ cho bạn khi chọn mua iPhone 6s Plus 32 GB.</p>\r\n', 11);

-- --------------------------------------------------------

--
-- Table structure for table `product_groups`
--

CREATE TABLE `product_groups` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `groups_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `images_id` int(11) NOT NULL,
  `avatar` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `products_id`, `images_id`, `avatar`, `status`) VALUES
(57, 1, 69, 1, 1),
(58, 3, 70, 0, 1),
(59, 3, 71, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_specifications`
--

CREATE TABLE `product_specifications` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `os` int(11) NOT NULL COMMENT 'hệ điều hành',
  `cpu` int(11) NOT NULL,
  `rear_camera` int(11) NOT NULL COMMENT 'camera sau',
  `front_camera` int(11) NOT NULL COMMENT 'camera trước',
  `memory` int(11) NOT NULL COMMENT 'Ram',
  `storage` int(11) NOT NULL COMMENT 'Bộ nhớ trong',
  `weight` int(11) NOT NULL COMMENT 'Trọng lượng',
  `dimensions` int(11) NOT NULL COMMENT 'Kích thước',
  `screem` int(11) NOT NULL COMMENT 'màn hình',
  `color` int(11) NOT NULL,
  `battery` int(11) NOT NULL COMMENT 'dung lượng bin',
  `memory_card` int(11) NOT NULL COMMENT 'thẻ nhớ',
  `sim_card` int(11) NOT NULL COMMENT 'thẻ sim'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Table structure for table `specifications`
--

CREATE TABLE `specifications` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL
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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categries_id` (`categories_id`);

--
-- Indexes for table `product_groups`
--
ALTER TABLE `product_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`products_id`),
  ADD KEY `fk_productgroups_groupsid` (`groups_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id` (`products_id`),
  ADD KEY `images_id` (`images_id`);

--
-- Indexes for table `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id` (`products_id`),
  ADD KEY `os` (`os`),
  ADD KEY `cpu` (`cpu`),
  ADD KEY `rear_camera` (`rear_camera`),
  ADD KEY `front_camera` (`front_camera`),
  ADD KEY `memory` (`memory`),
  ADD KEY `storage` (`storage`),
  ADD KEY `weight` (`weight`),
  ADD KEY `dimensions` (`dimensions`),
  ADD KEY `screem` (`screem`),
  ADD KEY `color` (`color`),
  ADD KEY `battery` (`battery`),
  ADD KEY `memory_card` (`memory_card`),
  ADD KEY `sim_card` (`sim_card`);

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
-- Indexes for table `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_groups`
--
ALTER TABLE `product_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `product_specifications`
--
ALTER TABLE `product_specifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categoriesid` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `product_groups`
--
ALTER TABLE `product_groups`
  ADD CONSTRAINT `fk_productgroups_groupsid` FOREIGN KEY (`groups_id`) REFERENCES `groups` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_productgroups_productsid` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `fk_productimages_imagesid` FOREIGN KEY (`images_id`) REFERENCES `images` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_productimages_productsid` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD CONSTRAINT `fk_productspecifications_battery` FOREIGN KEY (`battery`) REFERENCES `specifications` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_productspecifications_color` FOREIGN KEY (`color`) REFERENCES `specifications` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_productspecifications_cpu` FOREIGN KEY (`cpu`) REFERENCES `specifications` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_productspecifications_dimensions` FOREIGN KEY (`dimensions`) REFERENCES `specifications` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_productspecifications_frontcamera` FOREIGN KEY (`front_camera`) REFERENCES `specifications` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_productspecifications_memory` FOREIGN KEY (`memory`) REFERENCES `specifications` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_productspecifications_memorycard` FOREIGN KEY (`memory_card`) REFERENCES `specifications` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_productspecifications_os` FOREIGN KEY (`os`) REFERENCES `specifications` (`id`),
  ADD CONSTRAINT `fk_productspecifications_productsid` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_productspecifications_rearcamera` FOREIGN KEY (`rear_camera`) REFERENCES `specifications` (`id`),
  ADD CONSTRAINT `fk_productspecifications_screem` FOREIGN KEY (`screem`) REFERENCES `specifications` (`id`),
  ADD CONSTRAINT `fk_productspecifications_simcard` FOREIGN KEY (`sim_card`) REFERENCES `specifications` (`id`),
  ADD CONSTRAINT `fk_productspecifications_storage` FOREIGN KEY (`storage`) REFERENCES `specifications` (`id`),
  ADD CONSTRAINT `fk_productspecifications_weight` FOREIGN KEY (`weight`) REFERENCES `specifications` (`id`);

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `fk_roles_role_details_id` FOREIGN KEY (`role_details_id`) REFERENCES `role_details` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
