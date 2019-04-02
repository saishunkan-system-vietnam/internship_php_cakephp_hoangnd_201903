-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2019 at 12:39 PM
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
(13, 'Iphone 7', 7),
(14, 'Samsung Galaxy S10', 1),
(15, 'Samsung Galaxy Note', 1);

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
(71, '909348864593263590891610789141.jpg'),
(72, '048669324098506065408840847982.jpg'),
(73, '014630749878335682634889460304.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `subaddress_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date_time`, `status`, `note`, `subaddress_id`) VALUES
(4, '2019-04-01 09:57:48', 0, '', 13),
(6, '2019-04-02 04:08:26', 0, '', 15),
(7, '2019-04-02 07:47:58', 0, '', 18);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `products_id`, `orders_id`, `quantity`) VALUES
(4, 1, 4, 1),
(5, 1, 6, 1),
(6, 1, 7, 5);

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
(3, 'Điện thoại iPhone 6s Plus 32GB', 1000000, 12, 0, '<h2>Đặc điểm nổi bật của iPhone 6s Plus 32GB</h2>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/87846/Slider/vi-vn-1-thietke.jpg\" /></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/huong-dan-su-dung-3d-touch-738113\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/thiet-lap-van-tay-moi-tren-iphone-920010\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p>Bộ sản phẩm chuẩn: Hộp, Sạc, Tai nghe, S&aacute;ch hướng dẫn, C&aacute;p, C&acirc;y lấy sim</p>\r\n\r\n<h2><a href=\"https://www.thegioididong.com/dtdd/iphone-6s-plus-32gb\" target=\"_blank\">iPhone 6s Plus 32 GB</a>&nbsp;l&agrave;&nbsp;phi&ecirc;n bản&nbsp;n&acirc;ng cấp ho&agrave;n hảo từ&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-6-plus-32gb\" target=\"_blank\">iPhone 6 Plus</a>&nbsp;với nhiều t&iacute;nh năng mới hấp dẫn.</h2>\r\n\r\n<h3>Camera được cải tiến</h3>\r\n\r\n<p><a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\">Điện thoại</a>&nbsp;iPhone 6s Plus 32 GB được n&acirc;ng cấp độ ph&acirc;n giải camera sau l&ecirc;n 12 MP (thay v&igrave; 8 MP như tr&ecirc;n&nbsp;iPhone 6 Plus), camera cho tốc độ lấy n&eacute;t v&agrave; chụp nhanh, thao t&aacute;c chạm để chụp nhẹ nh&agrave;ng. Chất lượng ảnh trong c&aacute;c điều kiện chụp kh&aacute;c nhau tốt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/71770/iphone-6s-plus2-1.jpg\" /><img src=\"https://cdn.tgdd.vn/Products/Images/42/71770/iphone-6s-plus1-1.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>M&agrave;u s&aacute;ng hơn hẳn so với iPhone 6 Plus</em></p>\r\n\r\n<p>Camera trước với độ ph&acirc;n giải 5 MP cho h&igrave;nh ảnh với độ chi tiết r&otilde; n&eacute;t, đặc biệt m&aacute;y c&ograve;n c&oacute; t&iacute;nh năng Retina Flash, sẽ gi&uacute;p m&agrave;n h&igrave;nh s&aacute;ng l&ecirc;n như đ&egrave;n Flash để bức ảnh khi bạn chụp trong trời tối được tốt hơn.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/71770/iphone-6s-plus213.gif\" onclick=\"return false;\"><img alt=\"Để bật tính năng Retina Flash, tại camera trước bạn bật đèn Flash lên\" src=\"https://cdn.tgdd.vn/Products/Images/42/71770/iphone-6s-plus213.gif\" /></a></p>\r\n\r\n<p><em>Để bật t&iacute;nh năng Retina Flash, tại camera trước bạn bật đ&egrave;n Flash l&ecirc;n</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/71770/iphone-6s-plus1-2.jpg\" /><img src=\"https://cdn.tgdd.vn/Products/Images/42/71770/iphone-6s-plus2-2.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Đ&egrave;n Flash gi&uacute;p ảnh được s&aacute;ng hơn</em></p>\r\n\r\n<h3>Th&iacute;ch th&uacute; hơn với m&agrave;n h&igrave;nh rộng</h3>\r\n\r\n<p>M&agrave;n h&igrave;nh lớn c&ugrave;ng&nbsp;m&agrave;u sắc tươi tắn, độ n&eacute;t cao&nbsp;sẽ mang đến nhiều&nbsp;th&iacute;ch th&uacute; khi lướt web, xem phim hay l&agrave;m việc.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/71770/iphone-6s-plus4-1.jpg\" onclick=\"return false;\"><img alt=\"Màn hình lớn 5.5 inch thoải mái để làm việc và giải trí\" src=\"https://cdn.tgdd.vn/Products/Images/42/71770/iphone-6s-plus4-1.jpg\" /></a></p>\r\n\r\n<p><em>M&agrave;n h&igrave;nh lớn 5.5 inch thoải m&aacute;i để l&agrave;m việc v&agrave; giải tr&iacute;</em></p>\r\n\r\n<h3>Cảm ứng 3D Touch độc đ&aacute;o</h3>\r\n\r\n<p>3D Touch l&agrave; t&iacute;nh năng ho&agrave;n to&agrave;n mới tr&ecirc;n iPhone 6s Plus 32 GB, cho ph&eacute;p người d&ugrave;ng xem trước được c&aacute;c t&ugrave;y chọn nhanh dựa v&agrave;o lực nhấn mạnh hay nhẹ m&agrave; kh&ocirc;ng cần phải nhấp v&agrave;o ứng dụng.</p>\r\n\r\n<p>Để sử dụng, bạn chỉ cần nhấn v&agrave;o m&agrave;n h&igrave;nh hoặc ứng dụng 1 lực mạnh đến khi m&aacute;y rung nhẹ l&agrave; c&oacute; thể xem được.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/71770/iphone-6s-plus342.gif\" onclick=\"return false;\"><img alt=\"Chọn nhanh các lựa chọn trên camera của máy\" src=\"https://cdn.tgdd.vn/Products/Images/42/71770/iphone-6s-plus342.gif\" /></a></p>\r\n\r\n<p><em>Chọn nhanh c&aacute;c lựa chọn tr&ecirc;n camera của m&aacute;y</em></p>\r\n\r\n<p>Đ&aacute;ng tiếc t&iacute;nh năng 3D Touch n&agrave;y chỉ mới được &aacute;p dụng tr&ecirc;n c&aacute;c&nbsp;ứng dụng tr&ecirc;n d&ograve;ng&nbsp;<a href=\"https://www.thegioididong.com/dtdd-apple-iphone\" target=\"_blank\">điện thoại iPhone</a>&nbsp;như: danh bạ, camera, mail, m&aacute;y ảnh ...&nbsp;</p>\r\n\r\n<p>Bạn c&oacute; thể t&igrave;m hiểu th&ecirc;m t&iacute;nh năng 3D Touch&nbsp;<strong><a href=\"https://www.thegioididong.com/tin-tuc/tong-hop-tat-ca-nhung-tien-ich-3d-touch-dem-den-cho-nguoi-dung-714800\" target=\"_blank\">tại đ&acirc;y</a></strong>.</p>\r\n\r\n<h3>Sức mạnh của bộ vi xử l&yacute; A9 mới nhất</h3>\r\n\r\n<p>iPhone 6s Plus 32 GB sử dụng&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/chip-xu-ly-apple-a9-tren-iphone-6s-va-6s-plus-733695\" target=\"_blank\">vi xử l&yacute; A9</a>&nbsp;tốc độ 1.8 GHz (iPhone 6 Plus chỉ với 1.4 GHz), gi&uacute;p m&aacute;y chạy c&ugrave;ng l&uacute;c nhiều ứng dụng mượt m&agrave;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Bạn sẽ thực sự cảm nhận được sức mạnh của iPhone 6s Plus 32 GB khi chiến c&aacute;c game c&oacute; đồ họa nặng như&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/modern-combat-5-blackout-game-bom-tan-do-bo-len-ca-556327\" target=\"_blank\">Modern Combat 5</a>&nbsp;hay&nbsp;Warhammer 40.000</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Người trợ l&yacute; ảo rất hữu dụng tr&ecirc;n c&aacute;c d&ograve;ng m&aacute;y iPhone (Nguồn: Youtube)</em></p>\r\n\r\n<p>Vi&ecirc;n pin chỉ c&oacute; dung lượng 2750 mAh kh&aacute; thấp, tuy nhi&ecirc;n bạn vẫn c&oacute; thể an t&acirc;m sử dụng m&aacute;y trong một ng&agrave;y.</p>\r\n\r\n<p>Một chiếc điện thoại vừa thể hiện đẳng cấp của bạn vừa mang lại những n&acirc;ng cấp tốt hơn như camera, hiệu năng hoạt động mạnh mẽ hơn, t&iacute;nh năng 3D Touch độc đ&aacute;o, tất cả sẽ l&agrave; trải nghiệm mới mẻ cho bạn khi chọn mua iPhone 6s Plus 32 GB.</p>\r\n', 11),
(4, 'Điện thoại Samsung Galaxy S10+ (512GB)', 28990000, 10, 1, '<h2>Đặc điểm nổi bật của Samsung Galaxy S10+ (512GB)</h2>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/198986/Slider/-samsung-galaxy-s10-plus-512gb-thietke.jpg\" /></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/khau-do-la-gi-tai-sao-khau-do-lai-quan-trong-vo-1098341\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/cong-nghe-quet-van-tay-song-sieu-am-la-gi-912419\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/tin-tuc/tinh-nang-powershare-tren-galaxy-s10-la-gi-lam-sao-de-su-dung-no-1151089\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/chong-nuoc-va-chong-bui-tren-smart-phone-771130\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/tin-tuc/samsung-exynos-9820-ra-mat-chip-8-nm-npu-gpu-tot-hon-40--1131269\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/tong-hop-cac-loai-man-hinh-vo-cuc-moi-tren-dien-th-1150900#infinity-o\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/ar-stickers-la-gi-vi-sao-hang-nao-cung-ap-dung-ar-1096228\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/cong-nghe-dolby-atmos-tren-smartphone-772074\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/tin-tuc/samsung-bixby-la-gi-lieu-bixby-co-giup-samsung-lam-chu-cuoc-dua-ai--963386\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p>Bộ sản phẩm chuẩn: Hộp, Pin, Sạc, Tai nghe</p>\r\n\r\n<h2><a href=\"https://www.thegioididong.com/dtdd/samsung-galaxy-s10-plus-512gb\" title=\"Tham khảo điện thoại Samsung Galaxy S10+ (512GB) chính hãng\">Samsung Galaxy S10+ (512GB)</a>&nbsp;- phi&ecirc;n bản kỷ niệm 10 năm chiếc Galaxy S đầu ti&ecirc;n ra mắt, l&agrave; một chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" title=\"Tham khảo các dòng điện thoại chính hãng\">smartphone</a>&nbsp;hội tủ đủ c&aacute;c yếu tối m&agrave; bạn cần ở một chiếc m&aacute;y cao cấp trong năm 2019.</h2>\r\n\r\n<h3>Kh&aacute;c biệt tới từ m&agrave;n h&igrave;nh&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tong-hop-cac-loai-man-hinh-vo-cuc-moi-tren-dien-th-1150900#infinity-o\" target=\"_blank\" title=\"Tìm hiểu công nghệ màn hình Infinity-O trên điện thoại Samsung\" type=\"Tìm hiểu công nghệ màn hình Infinity-O trên điện thoại Samsung\">Infinity-O</a></h3>\r\n\r\n<p>Samsung Galaxy S10+ (512GB) đi theo kiểu thiết kế m&agrave;n h&igrave;nh&nbsp;Infinity-O với phần camera được đặt ph&iacute;a trong m&agrave;n h&igrave;nh rất độc đ&aacute;o.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/198986/samsung-galaxy-s10-plus-512gb-white-1.jpg\" onclick=\"return false;\"><img alt=\"Màn hình điện thoại Samsung Galaxy S10+ 512GB chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/198986/samsung-galaxy-s10-plus-512gb-white-1.jpg\" title=\"Màn hình điện thoại Samsung Galaxy S10+ 512GB chính hãng\" /></a></p>\r\n\r\n<p>Kiểu thiết kế mới n&agrave;y mang lại phần&nbsp;viền m&agrave;n h&igrave;nh mỏng ở tất cả c&aacute;ch cạnh, từ đ&oacute; khiến tổng thể m&aacute;y kh&ocirc;ng qu&aacute; lớn so với k&iacute;ch thước m&agrave;n h&igrave;nh.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/198986/samsung-galaxy-s10-plus-512gb-white-10.jpg\" onclick=\"return false;\"><img alt=\"Mặt trước điện thoại Samsung Galaxy S10+ 512GB chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/198986/samsung-galaxy-s10-plus-512gb-white-10.jpg\" title=\"Mặt trước điện thoại Samsung Galaxy S10+ 512GB chính hãng\" /></a></p>\r\n\r\n<p>M&agrave;n h&igrave;nh của m&aacute;y c&oacute; k&iacute;ch thước 6.4 inch c&ugrave;ng độ ph&acirc;n giải khủng 2K+ cho bạn thưởng thức những bộ phim hay xem những h&igrave;nh ảnh sắc n&eacute;t.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/tin-tuc/hdr10-la-gi-vi-sao-no-lam-cho-man-hinh-galaxy-s10-dep-hon--1151189\" target=\"_blank\" title=\"Tìm hiểu công nghệ HDR10+\" type=\"Tìm hiểu công nghệ HDR10+\">C&ocirc;ng nghệ HDR10+</a>&nbsp;ti&ecirc;n tiến nhất hiện nay cho bạn một trải nghiệm h&igrave;nh ảnh thực sự kh&aacute;c biệt so với phần c&ograve;n lại của thế giới smartphone.</p>\r\n\r\n<h3>Camera được n&acirc;ng l&ecirc;n tầm cao mới</h3>\r\n\r\n<p>Những chiếc Galaxy S tới từ&nbsp;<a href=\"https://www.thegioididong.com/dtdd-samsung\" target=\"_blank\" title=\"Tham khảo các dòng điện thoại Samsung chính hãng\">Samsung</a>&nbsp;lu&ocirc;n được người d&ugrave;ng đ&aacute;nh gi&aacute; cao về camera v&agrave; với&nbsp;Samsung Galaxy S10+ (512GB) cũng kh&ocirc;ng phải l&agrave; một ngoại lệ.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/198986/samsung-galaxy-s10-plus-512gb-white-11.jpg\" onclick=\"return false;\"><img alt=\"Giao diện camera điện thoại Samsung Galaxy S10+ 512GB chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/198986/samsung-galaxy-s10-plus-512gb-white-11.jpg\" title=\"Giao diện camera điện thoại Samsung Galaxy S10+ 512GB chính hãng\" /></a></p>\r\n\r\n<p>M&aacute;y sở hữu&nbsp;3 camera với c&aacute;c th&ocirc;ng số lần lượt l&agrave;: ống k&iacute;nh ch&iacute;nh g&oacute;c rộng (77 độ) 12 MP (khẩu độ f/1.5), ống k&iacute;nh phụ tele 12 MP (khẩu độ f/2.4) v&agrave; ống k&iacute;nh phụ g&oacute;c si&ecirc;u rộng (123 độ, f/2.2) 16 MP.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/198986/sieu-pham-galaxy-s-moi-2-512gb11.jpg\" onclick=\"return false;\"><img alt=\"Ảnh chụp từ camera của điện thoại Samsung Galaxy S10+ (512GB) chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/198986/sieu-pham-galaxy-s-moi-2-512gb11.jpg\" title=\"Ảnh chụp từ camera của điện thoại Samsung Galaxy S10+ (512GB) chính hãng\" /></a></p>\r\n\r\n<p>Trang c&ocirc;ng nghệ&nbsp;DxOMark - trang chuy&ecirc;n đ&aacute;nh gi&aacute; về camera cũng đ&atilde; đưa ra nhận x&eacute;t về Galaxy S10+ l&agrave; một trong những chiếc m&aacute;y c&oacute; camera tốt nhất tr&ecirc;n thị trường nhờ khả năng chụp si&ecirc;u rộng cũng như h&igrave;nh ảnh sắc n&eacute;t, m&agrave;u sắc rực rỡ.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/198986/sieu-pham-galaxy-s-moi-2-512gb10.jpg\" onclick=\"return false;\"><img alt=\"Camera trước selfie của điện thoại Samsung Galaxy S10+ (512GB) chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/198986/sieu-pham-galaxy-s-moi-2-512gb10.jpg\" title=\"Camera trước selfie của điện thoại Samsung Galaxy S10+ (512GB) chính hãng\" /></a></p>\r\n\r\n<p>Camera trước của m&aacute;y cũng l&agrave; cụm camera k&eacute;p với chiếc ống k&iacute;nh ch&iacute;nh 10 MP v&agrave; ống k&iacute;nh phụ 8 MP hỗ trợ chụp ảnh ch&acirc;n dung v&agrave; quay phim với độ ph&acirc;n giải 4K.</p>\r\n\r\n<h3>Sở hữu con chip mạnh mẽ nhất năm 2019</h3>\r\n\r\n<p>Con chip&nbsp;Exynos 9820 kết hợp với 8 GB RAM đủ sức cho bạn c&oacute; thể sử dụng tất cả game v&agrave; ứng dụng nặng nhất hiện nay một c&aacute;ch mượt m&agrave;, bất kể l&agrave; Li&ecirc;n Qu&acirc;n Mobile, Free Fire hay PUBG.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/198986/samsung-galaxy-s10-plus-512gb-white-8.jpg\" onclick=\"return false;\"><img alt=\"Android trên điện thoại Samsung Galaxy S10+ 512GB chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/198986/samsung-galaxy-s10-plus-512gb-white-8.jpg\" title=\"Android trên điện thoại Samsung Galaxy S10+ 512GB chính hãng\" /></a></p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute; th&igrave; với 512 GB bộ nhớ trong th&igrave; bạn sẽ c&oacute; một kh&ocirc;ng gian &quot;cực kỳ thoải m&aacute;i&quot; để tải ứng dụng hay lưu trữ dữ liệu c&aacute; nh&acirc;n.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/198986/samsung-galaxy-s10-plus-512gb-white-12.jpg\" onclick=\"return false;\"><img alt=\"Chơi game trên điện thoại Samsung Galaxy S10+ 512GB chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/198986/samsung-galaxy-s10-plus-512gb-white-12.jpg\" title=\"Chơi game trên điện thoại Samsung Galaxy S10+ 512GB chính hãng\" /></a></p>\r\n\r\n<p>Samsung Galaxy S10+ cũng được tối ưu về&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/samsung-ra-mat-giao-dien-moi--one-ui-1129869\" target=\"_blank\" title=\"Tìm hiểu về giao diện OneUI trên smartphone Samsung\" type=\"Tìm hiểu về giao diện OneUI trên smartphone Samsung\">giao diện OneUI</a>&nbsp;mới hứa hẹn sẽ gi&uacute;p m&aacute;y c&oacute; được khả năng hoạt động l&acirc;u d&agrave;i hơn c&aacute;c phi&ecirc;n bản tiền nhiệm trước đ&acirc;y.</p>\r\n\r\n<h3>Nhiều t&iacute;nh năng cao cấp kh&aacute;c</h3>\r\n\r\n<p>Tr&ecirc;n&nbsp;Samsung Galaxy S10+ c&ograve;n c&oacute; một t&iacute;nh năng mới được rất nhiều người y&ecirc;u th&iacute;ch đ&oacute; ch&iacute;nh l&agrave; khả năng sạc ngược kh&ocirc;ng d&acirc;y cho smartphone kh&aacute;c (PowerShare).</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/198986/samsung-galaxy-s10-plus-512gb-powershare.jpg\" onclick=\"return false;\"><img alt=\"Tính năng PowerShare trên Galaxy S10+\" src=\"https://cdn.tgdd.vn/Products/Images/42/198986/samsung-galaxy-s10-plus-512gb-powershare.jpg\" title=\"Tính năng PowerShare trên Galaxy S10+\" /></a></p>\r\n\r\n<p>Điều n&agrave;y c&oacute; thể gi&uacute;p bạn biến chiếc smartphone của m&igrave;nh th&agrave;nh một cục sạc kh&ocirc;ng d&acirc;y di động trong những trường hợp khẩn cấp.</p>\r\n\r\n<p><em>Xem th&ecirc;m:&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/tinh-nang-powershare-tren-galaxy-s10-la-gi-lam-sao-de-su-dung-no-1151089\" target=\"_blank\" title=\"Tính năng PowerShare trên Galaxy S10 là gì? Làm sao để sử dụng nó?\" type=\"Tính năng PowerShare trên Galaxy S10 là gì? Làm sao để sử dụng nó?\">T&iacute;nh năng PowerShare tr&ecirc;n Galaxy S10 l&agrave; g&igrave;? L&agrave;m sao để sử dụng n&oacute;?</a></em></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/198986/samsung-galaxy-s10-plus-512gb-white-2.jpg\" onclick=\"return false;\"><img alt=\"Đánh giá điện thoại Samsung Galaxy S10+ 512GB chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/198986/samsung-galaxy-s10-plus-512gb-white-2.jpg\" title=\"Đánh giá điện thoại Samsung Galaxy S10+ 512GB chính hãng\" /></a></p>\r\n\r\n<p>Ngo&agrave;i ra ti&ecirc;u chuẩn kh&aacute;ng nước v&agrave; bụi bẩn IP68 cao cấp nhất hiện nay vẫn xuất hiện tr&ecirc;n m&aacute;y đảm bảo bạn c&oacute; thể sử dụng dưới c&aacute;c điều kiện khắc nghiệt m&agrave; m&aacute;y kh&ocirc;ng gặp vấn đề g&igrave;.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/198986/samsung-galaxy-s10-plus-512gb-white-6.jpg\" onclick=\"return false;\"><img alt=\"Vân tay trên điện thoại Samsung Galaxy S10+ 512GB chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/198986/samsung-galaxy-s10-plus-512gb-white-6.jpg\" title=\"Vân tay trên điện thoại Samsung Galaxy S10+ 512GB chính hãng\" /></a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/cong-nghe-quet-van-tay-song-sieu-am-la-gi-912419\" target=\"_blank\" title=\"Tìm hiểu tính năng vân tay siêu âm \" type=\"Tìm hiểu tính năng vân tay siêu âm \">V&acirc;n tay si&ecirc;u &acirc;m</a>&nbsp;hiện đại v&agrave; ti&ecirc;n tiến cũng l&agrave; 1 t&iacute;nh năng hấp dẫn tr&ecirc;n S10+ gi&uacute;p mở kho&aacute; m&aacute;y nhanh ch&oacute;ng v&agrave; đẳng cấp.</p>\r\n', 14),
(5, 'Điện thoại Samsung Galaxy Note 9 512GB', 23450000, 15, 1, '<h2>Đặc điểm nổi bật của Samsung Galaxy Note 9 512GB</h2>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/183507/Slider/vi-vn-samsung-galaxy-note-9-thietke.gif\" /><a href=\"https://www.thegioididong.com/tin-tuc/tren-tay-danh-gia-nhanh-galaxy-note-9-spen-bluetooth-1108117\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/but-s-pen-tren-galaxy-note-9-la-dot-pha-chua-tung-1110578\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/khau-do-la-gi-tai-sao-khau-do-lai-quan-trong-vo-1098341\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/cung-tim-hieu-ve-he-thong-tan-nhiet-nuoc-carbon-1110403\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p>Bộ sản phẩm chuẩn: Hộp, Sạc, Tai nghe, S&aacute;ch hướng dẫn, B&uacute;t cảm ứng, C&acirc;y lấy sim, Ốp lưng</p>\r\n\r\n<h2>Sau th&agrave;nh c&ocirc;ng vang dội của&nbsp;<a href=\"https://www.thegioididong.com/dtdd/samsung-galaxy-note8\" target=\"_blank\" title=\"Tham khảo điện thoại Samsung Galaxy Note 8 tại Thegioididong.com\" type=\"Tham khảo điện thoại Samsung Galaxy Note 8 tại Thegioididong.com\">Galaxy Note 8</a>&nbsp;th&igrave; Samsung ch&iacute;nh thức giới thiệu phi&ecirc;n bản tiếp theo tới người d&ugrave;ng c&aacute;i t&ecirc;n&nbsp;<a href=\"https://www.thegioididong.com/dtdd/samsung-galaxy-note-9-512gb\" target=\"_blank\" title=\"Tham khảo điện thoại Samsung Galaxy Note 9 bản 512GB\" type=\"Tham khảo điện thoại Samsung Galaxy Note 9 bản 512GB\">Samsung Galaxy Note 9</a>&nbsp;mang trong m&igrave;nh h&agrave;ng hoạt c&aacute;c thay đổi đột ph&aacute; với điểm nhấn đặc biệt đến từ chiếc b&uacute;t S-Pen thần th&aacute;nh c&ugrave;ng một vi&ecirc;n pin dung lượng khổng lồ tới 4.000 mAh.</h2>\r\n\r\n<h3>B&uacute;t S-Pen cải tiến đến vi diệu</h3>\r\n\r\n<p>Một sự thay đổi khiến bạn phải th&iacute;ch th&uacute; c&oacute; lẽ l&agrave; chiếc b&uacute;t S-Pen đi k&egrave;m theo&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" title=\"Tham khảo các dòng điện thoại tại Thegioididong.com\" type=\"Tham khảo các dòng điện thoại tại Thegioididong.com\">điện thoại</a>&nbsp;với nhiều m&agrave;u sắc nổi bật.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/154897/samsung-galaxy-note-9-13.jpg\" onclick=\"return false;\"><img alt=\"Bút S Pen trên điện thoại Samsung Galaxy Note 9\" src=\"https://cdn.tgdd.vn/Products/Images/42/154897/samsung-galaxy-note-9-13.jpg\" title=\"Bút S Pen trên điện thoại Samsung Galaxy Note 9\" /></a></p>\r\n\r\n<p>Chưa dừng ở đ&oacute;, chiếc b&uacute;t n&agrave;y c&ograve;n được trang bị khả năng đặc biệt gi&uacute;p điều khiển Note 9 dễ d&agrave;ng th&ocirc;ng qua Bluetooth.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/154897/samsung-galaxy-note-9-12-1.jpg\" onclick=\"return false;\"><img alt=\"Điều khiển bút S Pen trên điện thoại Samsung Galaxy Note 9\" src=\"https://cdn.tgdd.vn/Products/Images/42/154897/samsung-galaxy-note-9-12-1.jpg\" title=\"Điều khiển bút S Pen trên điện thoại Samsung Galaxy Note 9\" /></a></p>\r\n\r\n<p>Cụ thể hơn, chỉ với một thao t&aacute;c nhấn đơn giản l&agrave; bạn c&oacute; thể dễ d&agrave;ng chụp ảnh selfie, tr&igrave;nh chiếu b&agrave;i thuyết tr&igrave;nh, ngưng/ph&aacute;t video c&ugrave;ng nhiều c&ocirc;ng năng kh&aacute;c nữa.</p>\r\n\r\n<h3>Hiệu năng lu&ocirc;n ở đỉnh cao</h3>\r\n\r\n<p>L&agrave; một flagship cao cấp n&ecirc;n những g&igrave; mạnh mẽ nhất đều được hội tụ tr&ecirc;n&nbsp;Galaxy Note 9 với con chip&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/chip-snapdragon-845-manh-hon-25-tap-trung-ai-bao-mat-cao-1048166\" target=\"_blank\" title=\"Tìm hiểu về chip Snapdragon 845\" type=\"Tìm hiểu về chip Snapdragon 845\">Snapdragon 845</a>&nbsp;hoặc&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/samsung-trinh-lang-vi-xu-ly-exynos-9810-danh-cho-galaxy-s9-1040294\" target=\"_blank\" title=\"Tìm hiểu về chip Exynos 9810\" type=\"Tìm hiểu về chip Exynos 9810\">Exynos 9810</a>&nbsp;t&ugrave;y v&agrave;o từng thị trường kh&aacute;c nhau.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/154897/samsung-galaxy-note-9-gaming-2.gif\" onclick=\"return false;\"><img alt=\"Chơi game trên điện thoại Samsung Galaxy Note 9\" src=\"https://cdn.tgdd.vn/Products/Images/42/154897/samsung-galaxy-note-9-gaming-2.gif\" title=\"Chơi game trên điện thoại Samsung Galaxy Note 9\" /></a></p>\r\n\r\n<p>Đi k&egrave;m theo đ&oacute; l&agrave; bộ nhớ RAM l&ecirc;n đến 8 GB đ&atilde; gi&uacute;p&nbsp;Note 9 trở th&agrave;nh một trong những smartphone mạnh mẽ nhất hiện nay&nbsp;đủ để chiến mọi thể loại game nặng nhất.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/154897/samsung-galaxy-note-9-gaming-3.gif\" onclick=\"return false;\"><img alt=\"Chơi game trên điện thoại Samsung Galaxy Note 9\" src=\"https://cdn.tgdd.vn/Products/Images/42/154897/samsung-galaxy-note-9-gaming-3.gif\" title=\"Chơi game trên điện thoại Samsung Galaxy Note 9\" /></a></p>\r\n\r\n<p>Hơn nữa, một sự n&acirc;ng cấp v&ocirc; c&ugrave;ng mạnh mẽ kh&aacute;c ch&iacute;nh l&agrave; bộ nhớ trong của m&aacute;y đ&atilde; được n&acirc;ng l&ecirc;n tới 512 GB cho phi&ecirc;n bản cao cấp nhất.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/183507/galaxy-note-9-6.jpg\" onclick=\"return false;\"><img alt=\"Giao diện Android điện thoại Samsung Galaxy Note 9\" src=\"https://cdn.tgdd.vn/Products/Images/42/183507/galaxy-note-9-6.jpg\" title=\"Giao diện Android điện thoại Samsung Galaxy Note 9\" /></a></p>\r\n\r\n<p>Đ&aacute;ng tiếc m&aacute;y vẫn chỉ được sẵn&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/co-gi-dac-biet-o-android-81-oreo-1073208\" target=\"_blank\" title=\"Tìm hiểu về hệ điều hành Android 8.1 Oreo\" type=\"Tìm hiểu về hệ điều hành Android 8.1 Oreo\">Android 8.1 (Oreo)</a>&nbsp;v&agrave; hứa hẹn trong thời gian tới sẽ được cập nhật nhanh ch&oacute;ng l&ecirc;n phi&ecirc;n bản Android mới nhất với nhiều t&iacute;nh năng mới mẻ.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><iframe frameborder=\"0\" src=\"https://www.youtube.com/embed/vniaKXHpD8E?rel=0\"></iframe></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Camera thay đổi&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/khau-do-la-gi-tai-sao-khau-do-lai-quan-trong-vo-1098341\" target=\"_blank\" title=\"Tìm hiểu về khẩu độ\" type=\"Tìm hiểu về khẩu độ\">khẩu độ</a>&nbsp;dễ d&agrave;ng v&agrave; t&iacute;ch hợp AI</h3>\r\n\r\n<p>Galaxy Note 9 sở hữu bộ đ&ocirc;i camera k&eacute;p với c&ugrave;ng độ ph&acirc;n giải 12 MP c&oacute; khả năng thay đổi khẩu độ như&nbsp;<a href=\"https://www.thegioididong.com/dtdd/samsung-galaxy-s9-plus\" target=\"_blank\" title=\"Tham khảo điện thoại Galaxy S9+ tại Thegioididong.com\" type=\"Tham khảo điện thoại Galaxy S9+ tại Thegioididong.com\">Galaxy S9+</a>&nbsp;v&agrave; được t&iacute;ch hợp th&ecirc;m c&ocirc;ng nghệ AI gi&uacute;p chất lượng ảnh chụp đẹp hơn đ&aacute;ng kể.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/154897/samsung-galaxy-note-9-7-1.jpg\" onclick=\"return false;\"><img alt=\"Bút S Pen trên điện thoại Samsung Galaxy Note 9\" src=\"https://cdn.tgdd.vn/Products/Images/42/154897/samsung-galaxy-note-9-7-1.jpg\" title=\"Bút S Pen trên điện thoại Samsung Galaxy Note 9\" /></a></p>\r\n\r\n<p>Theo như những g&igrave; m&agrave; Samsung giới thiệu th&igrave; AI tr&ecirc;n Note 9 c&oacute; khả năng ph&acirc;n loại nhiều đối tượng, tự động điều chỉnh m&agrave;u sắc, độ tương phản v&agrave; độ s&aacute;ng trong bối cảnh chụp ảnh kh&aacute;c nhau.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/183507/galaxy-note-9-15.jpg\" onclick=\"return false;\"><img alt=\"Camera điện thoại Samsung Galaxy Note 9\" src=\"https://cdn.tgdd.vn/Products/Images/42/183507/galaxy-note-9-15.jpg\" title=\"Camera điện thoại Samsung Galaxy Note 9\" /></a></p>\r\n\r\n<p>Chất lượng ảnh chụp của m&aacute;y v&ocirc; c&ugrave;ng ấn tượng với c&aacute;c chi tiết được thể hiện r&otilde; r&agrave;ng, m&agrave;u sắc c&acirc;n đối v&agrave; độ tương phản cao.</p>\r\n\r\n<p><a href=\"https://cdn.tgdd.vn/Files/2018/08/09/1108117/galaxy-note-9-hands-on-47_800x450.jpg\" onclick=\"return false;\"><img alt=\"Giao diện camera điện thoại Samsung Galaxy Note 9\" src=\"https://cdn.tgdd.vn/Files/2018/08/09/1108117/galaxy-note-9-hands-on-47_800x450.jpg\" title=\"Giao diện camera điện thoại Samsung Galaxy Note 9\" /></a></p>\r\n\r\n<p>Cũng như tr&ecirc;n Galaxy S9+ th&igrave; Note 9 cũng được trang bị khả năng quay phim&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/super-slow-motion-960fps-la-gi-956676\" target=\"_blank\" title=\"Tìm hiểu về quay phim Super Slow Motion\" type=\"Tìm hiểu về quay phim Super Slow Motion\">Super Slow Motion</a>&nbsp;gi&uacute;p bạn ghi lại những khoảnh khắc đ&aacute;ng nhớ trong cuộc sống.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/183507/galaxy-note-9-17.jpg\" onclick=\"return false;\"><img alt=\"Samsung Galaxy Note 9\" src=\"https://cdn.tgdd.vn/Products/Images/42/183507/galaxy-note-9-17.jpg\" title=\"Samsung Galaxy Note 9\" /></a></p>\r\n\r\n<h3>Dung lượng pin được cải tiến</h3>\r\n\r\n<p>Sau những g&igrave; m&agrave; người d&ugrave;ng mong mỏi th&igrave; nay&nbsp;Note 9 đ&atilde; c&oacute; một vi&ecirc;n pin to hơn, mạnh mẽ v&agrave; bền bỉ hơn với dung lượng l&ecirc;n đến 4000 mAh.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/154897/samsung-galaxy-note-9-5-1.jpg\" onclick=\"return false;\"><img alt=\"Đánh giá điện thoại Samsung Galaxy Note 9\" src=\"https://cdn.tgdd.vn/Products/Images/42/154897/samsung-galaxy-note-9-5-1.jpg\" title=\"Đánh giá điện thoại Samsung Galaxy Note 9\" /></a></p>\r\n\r\n<p>Tuy kh&ocirc;ng thuộc dạng khủng nhất nhưng từng đ&oacute; cũng đủ để bạn c&oacute; thể h&agrave;i l&ograve;ng với c&aacute;c trải nghiệm hằng ng&agrave;y một c&aacute;ch trọn vẹn.</p>\r\n\r\n<p>Hơi thất vọng nhẹ khi m&aacute;y vẫn chỉ được trang bị c&ocirc;ng nghệ sạc nhanh&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/su-loi-hai-cua-tinh-nang-sac-nhanh-quick-charge-2--625393\" target=\"_blank\" title=\"Tìm hiểu về công nghệ Quick Charge 2.0\" type=\"Tìm hiểu về công nghệ Quick Charge 2.0\">Quick Charge 2.0</a>&nbsp;n&ecirc;n thời gian sạc vẫn chưa được tối ưu nhất.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/183507/galaxy-note-9-20.jpg\" onclick=\"return false;\"><img alt=\"Cổng sạc trên điện thoại Samsung Galaxy Note 9\" src=\"https://cdn.tgdd.vn/Products/Images/42/183507/galaxy-note-9-20.jpg\" title=\"Cổng sạc trên điện thoại Samsung Galaxy Note 9\" /></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><iframe frameborder=\"0\" src=\"https://www.youtube.com/embed/miurMkZzJfs?rel=0\"></iframe></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Một ch&uacute;t thay đổi trong thiết kế</h3>\r\n\r\n<p>Chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd-samsung\" target=\"_blank\" title=\"Tham khảo các dòng điện thoại Samsung tại Thegioididong.com\" type=\"Tham khảo các dòng điện thoại Samsung tại Thegioididong.com\">điện thoại Samsung</a>&nbsp;mới vẫn thừa hưởng lối thiết kế v&ocirc; c&ugrave;ng quyến rũ từ đ&agrave;n anh của m&igrave;nh với th&acirc;n h&igrave;nh mạnh mẽ v&agrave; được c&aacute;ch điệu bởi những đường cong mềm mại.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/154897/samsung-galaxy-note-9-6-1.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế điện thoại Samsung Galaxy Note 9\" src=\"https://cdn.tgdd.vn/Products/Images/42/154897/samsung-galaxy-note-9-6-1.jpg\" title=\"Thiết kế điện thoại Samsung Galaxy Note 9\" /></a></p>\r\n\r\n<p>Điểm thay đổi đ&aacute;ng ch&uacute; &yacute; phải kể đến mặt lưng khi m&agrave;&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cam-bien-van-tay-tren-smartphone-la-gi-908163\" target=\"_blank\" title=\"Tìm hiểu cảm biến vân tay trên điện thoại\" type=\"Tìm hiểu cảm biến vân tay trên điện thoại\">cảm biến v&acirc;n tay</a>&nbsp;của m&aacute;y đ&atilde; được đặt dưới cụm&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/cung-tim-hieu-ve-cac-loai-camera-kep-hien-co-tren-smartphone-1079186\" target=\"_blank\" title=\"Tìm hiểu các loại camera kép trên điện thoại\" type=\"Tìm hiểu các loại camera kép trên điện thoại\">camera k&eacute;p</a>&nbsp;với một vị tr&iacute; thuận lợi để bạn c&oacute; thể mở kh&oacute;a m&aacute;y một c&aacute;ch dễ d&agrave;ng.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/154897/samsung-galaxy-note-98-1.png\" onclick=\"return false;\"><img alt=\"Cảm biến vân tay trên điện thoại Samsung Galaxy Note 9\" src=\"https://cdn.tgdd.vn/Products/Images/42/154897/samsung-galaxy-note-98-1.png\" title=\"Cảm biến vân tay trên điện thoại Samsung Galaxy Note 9\" /></a></p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute; Samsung đ&atilde; tối giản cạnh viền tr&ecirc;n dưới để mang lại cho bạn một trải nghiệm tuyệt vời hơn nữa với một m&agrave;n h&igrave;nh c&oacute; k&iacute;ch thước khủng l&ecirc;n đến 6.4 inch.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/154897/samsung-galaxy-note-9-1-2.jpg\" onclick=\"return false;\"><img alt=\"Màn hình điện thoại Samsung Galaxy Note 9\" src=\"https://cdn.tgdd.vn/Products/Images/42/154897/samsung-galaxy-note-9-1-2.jpg\" title=\"Màn hình điện thoại Samsung Galaxy Note 9\" /></a></p>\r\n\r\n<p>Nh&igrave;n chung với chỉ một ch&uacute;t thay đổi nhỏ trong thiết kế cũng đủ để gi&uacute;p&nbsp;Galaxy Note 9 trở n&ecirc;n nổi bật v&agrave; quyến rũ, cũng như khắc phục được những thiếu s&oacute;t từ đ&agrave;n anh Note 8.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/154897/samsung-galaxy-note-9-3-1.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế điện thoại Samsung Galaxy Note 9\" src=\"https://cdn.tgdd.vn/Products/Images/42/154897/samsung-galaxy-note-9-3-1.jpg\" title=\"Thiết kế điện thoại Samsung Galaxy Note 9\" /></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>❝</strong>Đ&atilde; mua v&agrave; cảm thấy rất h&agrave;i l&ograve;ng về m&aacute;y. Cấu h&igrave;nh ngon cộng th&ecirc;m camera rất đẹp. Pin x&agrave;i tương đối ổn, cảm biến v&acirc;n tay nhạy. N&oacute;i chung l&agrave; si&ecirc;u phẩm n&ecirc;n kh&ocirc;ng c&oacute; g&igrave; phải ph&agrave;n n&agrave;n.<strong>❞</strong></p>\r\n', 15);

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
(58, 3, 70, 1, 1),
(59, 3, 71, 0, 1),
(60, 4, 72, 1, 1),
(61, 5, 73, 1, 1);

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
(11, 2, 1),
(13, 1, 32);

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
-- Table structure for table `subaddress`
--

CREATE TABLE `subaddress` (
  `id` int(11) NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `default_address` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subaddress`
--

INSERT INTO `subaddress` (`id`, `address`, `users_id`, `default_address`) VALUES
(13, 'Hà Nội', 28, 0),
(15, 'Hà Nội', 32, 1),
(16, 'Quốc Oai', 32, 0),
(17, 'quốc Oai', 32, 0),
(18, 'Quốc Oai- Hà Nội', 33, 0);

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
(28, '', '', 'Nguyễn Đình Hoàng', 0, '0000-00-00', '0981056713', ''),
(32, 'ng.hoang9898@gmail.com', '4297f44b13955235245b2497399d7a93', 'Nguyễn Đình Hoàng', 1, '1998-09-03', '0981056713', ''),
(33, '', '', 'Hoang ND', 0, '0000-00-00', '0984554856', '');

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`subaddress_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orderdetails_ordersid` (`orders_id`),
  ADD KEY `fk_orderdetails_productsid` (`products_id`);

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
-- Indexes for table `subaddress`
--
ALTER TABLE `subaddress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product_groups`
--
ALTER TABLE `product_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `product_specifications`
--
ALTER TABLE `product_specifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subaddress`
--
ALTER TABLE `subaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_subaddress_id` FOREIGN KEY (`subaddress_id`) REFERENCES `subaddress` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_orderdetails_ordersid` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orderdetails_productsid` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_roles_role_details_id` FOREIGN KEY (`role_details_id`) REFERENCES `role_details` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_roles_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `subaddress`
--
ALTER TABLE `subaddress`
  ADD CONSTRAINT `fk_subadress_usersid` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
