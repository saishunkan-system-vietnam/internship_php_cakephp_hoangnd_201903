-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 11, 2019 lúc 12:35 PM
-- Phiên bản máy phục vụ: 10.1.25-MariaDB
-- Phiên bản PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopdienthoai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
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
-- Cấu trúc bảng cho bảng `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(5, 'Mới');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `name`) VALUES
(69, '654621118929618272647262095539.jpg'),
(70, '773925296036416140289248461405.jpeg'),
(71, '909348864593263590891610789141.jpg'),
(72, '048669324098506065408840847982.jpg'),
(73, '014630749878335682634889460304.jpg'),
(78, '456387057561361926208900588905.png'),
(79, '756328757533243167510962128325.jpg'),
(80, '719357767694980000712379369247.jpg'),
(81, '240350809085411591005035262736.jpg'),
(82, '698481920510381218165564513045.jpg'),
(83, '625772214943402703604234731964.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `status` int(11) NOT NULL COMMENT '0-chưa xac nhan,1-đã xac nhân,2-da thanh toan, 3-Huy',
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `subaddress_id` int(11) NOT NULL,
  `customer_note` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `date_time`, `status`, `note`, `subaddress_id`, `customer_note`) VALUES
(4, '2019-04-01 09:57:48', 3, 'Không xác nhận được khách hàng', 13, ''),
(6, '2019-04-02 04:08:26', 1, 'hàng đang được vận chuyển', 15, ''),
(7, '2019-04-02 07:47:58', 3, 'không liên hệ được', 18, ''),
(8, '2019-04-03 07:44:51', 0, 'hàng đã được thanh toán', 19, ''),
(9, '2019-04-04 08:58:47', 0, '', 20, ''),
(10, '2019-04-04 10:22:10', 0, '', 21, ''),
(11, '2019-04-05 09:57:54', 0, '', 23, ''),
(12, '2019-04-05 09:58:51', 0, '', 24, ''),
(13, '2019-04-05 10:05:05', 0, '', 25, ''),
(14, '2019-04-05 10:06:34', 0, '', 26, ''),
(15, '2019-04-05 10:07:01', 0, '', 27, ''),
(16, '2019-04-05 10:11:52', 0, '', 28, ''),
(17, '2019-04-08 02:48:41', 0, '', 29, ''),
(30, '2019-04-08 04:10:16', 0, '', 45, ''),
(31, '2019-04-08 04:10:52', 0, '', 45, ''),
(32, '2019-04-08 04:11:20', 0, '', 46, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `products_id`, `orders_id`, `quantity`) VALUES
(4, 1, 4, 1),
(5, 1, 6, 1),
(6, 1, 7, 5),
(7, 1, 8, 8),
(8, 1, 9, 1),
(9, 1, 10, 2),
(10, 3, 10, 1),
(11, 4, 10, 1),
(12, 1, 11, 2),
(13, 1, 12, 2),
(14, 1, 13, 2),
(15, 1, 14, 2),
(16, 1, 15, 3),
(17, 3, 16, 3),
(18, 1, 17, 3),
(29, 1, 30, 1),
(30, 3, 31, 1),
(31, 1, 32, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
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
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `status`, `description`, `categories_id`) VALUES
(1, 'Điện thoại OPPO A3s 32GB', 4000000, 111, 1, '<h2>Đặc điểm nổi bật của OPPO A3s 32GB</h2>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/183994/Slider/-oppo-a3s-32gb-thiet-ke.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/tin-tuc/bao-mat-khuon-mat-se-thanh-tieu-chuan-moi-tren-smartphone-1066760\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/cong-nghe-selfie-ai-beauty-la-gi-1049958\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/he-dieu-hanh-coloros-tren-oppo-la-ma-quen-1073718\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p>Bộ sản phẩm chuẩn: Hộp, Sạc, S&aacute;ch hướng dẫn, C&aacute;p, C&acirc;y lấy sim, Ốp lưng</p>\r\n\r\n<h2><a href=\"https://www.thegioididong.com/dtdd/oppo-a3s-32gb\" target=\"_blank\">OPPO A3s 32GB</a>&nbsp;l&agrave; một chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\">smartphone</a>&nbsp;mới của OPPO sở hữu gi&aacute; rẻ hiếm hoi nhưng vẫn được trang bị m&agrave;n h&igrave;nh tai thỏ v&agrave; camera k&eacute;p xu thế của năm 2018.</h2>\r\n\r\n<h3>Thiết kế thời trang với m&agrave;u sắc sang trọng</h3>\r\n\r\n<p>OPPO A3s sở hữu cho m&igrave;nh vẻ bề ngo&agrave;i sang trọng v&agrave; tinh tế kh&ocirc;ng k&eacute;m g&igrave; c&aacute;c thiết bị cao cấp.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C&aacute;c g&oacute;c cạnh của m&aacute;y cũng được bo cong mềm mại đem lại cho người d&ugrave;ng cảm gi&aacute;c cầm nắm kh&aacute; thoải m&aacute;i c&ugrave;ng phần viền m&agrave;n h&igrave;nh được ho&agrave;n thiện cong 2.5D mang lại trải nghiệm sử dụng tốt hơn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>M&agrave;n h&igrave;nh tai thỏ cao cấp</h3>\r\n\r\n<p>Điểm ấn tượng đầu ti&ecirc;n tr&ecirc;n&nbsp;chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd-oppo\" target=\"_blank\">điện thoại OPPO</a>&nbsp;n&agrave;y&nbsp;ch&iacute;nh l&agrave; phần&nbsp;phần tai thỏ b&ecirc;n tr&ecirc;n m&agrave;n h&igrave;nh tương tự như chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-x-64gb\" target=\"_blank\">iPhone X</a>&nbsp;tới từ Apple.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>OPPO A3s c&oacute; m&agrave;n h&igrave;nh 6.2 inch độ ph&acirc;n giải HD+, tỷ lệ m&agrave;n h&igrave;nh đạt 88.8% mang lại kh&ocirc;ng gian lớn cho l&agrave;m việc v&agrave; giải tr&iacute;.</p>\r\n\r\n<p>Tấm nền IPS cho m&agrave;u sắc trung thực, hiển thị h&igrave;nh ảnh sắc n&eacute;t, độ tương phản cao. Bao phủ mặt trước l&agrave; k&iacute;nh cường lực Corning Gorilla Glass 3 chống chịu va đập, trầy xước vượt trội.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/183657/oppo-a3s-3-1.jpg\" onclick=\"return false;\"><img alt=\"Màn hình tai thỏ điện thoại OPPO A3s\" src=\"https://cdn.tgdd.vn/Products/Images/42/183657/oppo-a3s-3-1.jpg\" style=\"width:100%\" /></a></p>\r\n\r\n<h3>Camera k&eacute;p xo&aacute; ph&ocirc;ng chất lượng</h3>\r\n\r\n<p><a href=\"https://www.thegioididong.com/dtdd-oppo\" target=\"_blank\">OPPO</a>&nbsp;A3s 32GB sở hữu hệ thống camera k&eacute;p độc đ&aacute;o với độ ph&acirc;n giải của hai camera lần lượt l&agrave;&nbsp;13 MP (ống k&iacute;nh ch&iacute;nh) v&agrave; 2 MP (ống k&iacute;nh phụ).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Trong điều kiện &aacute;nh s&aacute;ng đầy đủ m&aacute;y cho những bức ảnh x&oacute;a ph&ocirc;ng ở mức kh&aacute;, m&agrave;u sắc h&agrave;i h&ograve;a rất ph&ugrave; hợp cho c&aacute;c bạn đăng facebook &quot;sống ảo&quot;.</p>\r\n\r\n<p>Camera trước của m&aacute;y cũng c&oacute; độ ph&acirc;n giải l&ecirc;n tới 8 MP, hỗ trợ selfie g&oacute;c rộng, được trang bị sẵn c&aacute;c chế độ l&agrave;m đẹp hứa hẹn sẽ kh&ocirc;ng l&agrave;m phụ l&ograve;ng những bạn trẻ th&iacute;ch tự sướng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Hiệu năng đủ để giải tr&iacute; đơn giản</h3>\r\n\r\n<p>OPPO A3s 32GB được trang bị vi xử l&yacute;&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/qualcomm-snapdragon-450-ra-mat-sieu-tiet-kiem-pin-ho-tro-camera-kep-quick-charge-3-0-997437\" target=\"_blank\">Snapdragon 450 với 8 nh&acirc;n</a>&nbsp;đảm bảo thỏa m&atilde;n đa số nhu cầu sử dụng hằng ng&agrave;y v&agrave; chơi game th&ocirc;ng dụng ở mức cấu h&igrave;nh thấp.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/183657/oppo-a3s-1-1.jpg\" onclick=\"return false;\"><img alt=\"Chơi game trên điện thoại OPPO A3s\" src=\"https://cdn.tgdd.vn/Products/Images/42/183657/oppo-a3s-1-1.jpg\" style=\"width:100%\" /></a></p>\r\n\r\n<p>RAM 3 GB kết hợp với bộ nhớ trong 32 GB c&oacute; thể mở rộng th&ecirc;m qua thẻ nhớ tối đa 256 GB cho bạn thoải m&aacute;i lưu trữ dữ liệu.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>M&aacute;y chạy tr&ecirc;n giao diện ColorOS 5.1 được t&ugrave;y biến tr&ecirc;n Android 8.1 c&oacute; nhiều t&iacute;nh năng thuận tiện gi&uacute;p bạn sử dụng hiệu quả hơn.</p>\r\n\r\n<h3>Thiết kế thời trang với m&agrave;u sắc sang trọng</h3>\r\n\r\n<p>OPPO A3s sở hữu cho m&igrave;nh vẻ bề ngo&agrave;i sang trọng v&agrave; tinh tế kh&ocirc;ng k&eacute;m g&igrave; c&aacute;c thiết bị cao cấp.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>C&aacute;c g&oacute;c cạnh của m&aacute;y cũng được bo cong mềm mại đem lại cho người d&ugrave;ng cảm gi&aacute;c cầm nắm kh&aacute; thoải m&aacute;i c&ugrave;ng phần viền m&agrave;n h&igrave;nh được ho&agrave;n thiện cong 2.5D mang lại trải nghiệm sử dụng tốt hơn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Dung lượng pin tốt</h3>\r\n\r\n<p>Vi&ecirc;n pin c&oacute; dung lượng&nbsp;4230 mAh gi&uacute;p bạn sử dụng m&aacute;y kh&aacute; thoải m&aacute;i trong khoảng hơn một ng&agrave;y.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tr&ecirc;n&nbsp;OPPO A3s th&igrave; OPPO cũng loại bỏ đi cảm biến v&acirc;n tay v&agrave; bạn c&oacute; thể mở kh&oacute;a với khu&ocirc;n mặt cũng c&oacute; tốc độ rất ấn tượng.</p>\r\n', 6),
(3, 'Điện thoại iPhone 6s Plus 32GB', 1000000, 12, 0, '<h2>Đặc điểm nổi bật của iPhone 6s Plus 32GB</h2>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/87846/Slider/vi-vn-1-thietke.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/huong-dan-su-dung-3d-touch-738113\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/thiet-lap-van-tay-moi-tren-iphone-920010\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p>Bộ sản phẩm chuẩn: Hộp, Sạc, Tai nghe, S&aacute;ch hướng dẫn, C&aacute;p, C&acirc;y lấy sim</p>\r\n\r\n<h2><a href=\"https://www.thegioididong.com/dtdd/iphone-6s-plus-32gb\" target=\"_blank\">iPhone 6s Plus 32 GB</a>&nbsp;l&agrave;&nbsp;phi&ecirc;n bản&nbsp;n&acirc;ng cấp ho&agrave;n hảo từ&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-6-plus-32gb\" target=\"_blank\">iPhone 6 Plus</a>&nbsp;với nhiều t&iacute;nh năng mới hấp dẫn.</h2>\r\n\r\n<h3>Camera được cải tiến</h3>\r\n\r\n<p><a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\">Điện thoại</a>&nbsp;iPhone 6s Plus 32 GB được n&acirc;ng cấp độ ph&acirc;n giải camera sau l&ecirc;n 12 MP (thay v&igrave; 8 MP như tr&ecirc;n&nbsp;iPhone 6 Plus), camera cho tốc độ lấy n&eacute;t v&agrave; chụp nhanh, thao t&aacute;c chạm để chụp nhẹ nh&agrave;ng. Chất lượng ảnh trong c&aacute;c điều kiện chụp kh&aacute;c nhau tốt.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/71770/iphone-6s-plus2-1.jpg\" style=\"width:50%\" /><img src=\"https://cdn.tgdd.vn/Products/Images/42/71770/iphone-6s-plus1-1.jpg\" style=\"width:50%\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>M&agrave;u s&aacute;ng hơn hẳn so với iPhone 6 Plus</em></p>\r\n\r\n<p>Camera trước với độ ph&acirc;n giải 5 MP cho h&igrave;nh ảnh với độ chi tiết r&otilde; n&eacute;t, đặc biệt m&aacute;y c&ograve;n c&oacute; t&iacute;nh năng Retina Flash, sẽ gi&uacute;p m&agrave;n h&igrave;nh s&aacute;ng l&ecirc;n như đ&egrave;n Flash để bức ảnh khi bạn chụp trong trời tối được tốt hơn.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Để bật t&iacute;nh năng Retina Flash, tại camera trước bạn bật đ&egrave;n Flash l&ecirc;n</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/71770/iphone-6s-plus1-2.jpg\" style=\"width:50%\" /><img src=\"https://cdn.tgdd.vn/Products/Images/42/71770/iphone-6s-plus2-2.jpg\" style=\"width:50%\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Đ&egrave;n Flash gi&uacute;p ảnh được s&aacute;ng hơn</em></p>\r\n\r\n<h3>Th&iacute;ch th&uacute; hơn với m&agrave;n h&igrave;nh rộng</h3>\r\n\r\n<p>M&agrave;n h&igrave;nh lớn c&ugrave;ng&nbsp;m&agrave;u sắc tươi tắn, độ n&eacute;t cao&nbsp;sẽ mang đến nhiều&nbsp;th&iacute;ch th&uacute; khi lướt web, xem phim hay l&agrave;m việc.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>M&agrave;n h&igrave;nh lớn 5.5 inch thoải m&aacute;i để l&agrave;m việc v&agrave; giải tr&iacute;</em></p>\r\n\r\n<h3>Cảm ứng 3D Touch độc đ&aacute;o</h3>\r\n\r\n<p>3D Touch l&agrave; t&iacute;nh năng ho&agrave;n to&agrave;n mới tr&ecirc;n iPhone 6s Plus 32 GB, cho ph&eacute;p người d&ugrave;ng xem trước được c&aacute;c t&ugrave;y chọn nhanh dựa v&agrave;o lực nhấn mạnh hay nhẹ m&agrave; kh&ocirc;ng cần phải nhấp v&agrave;o ứng dụng.</p>\r\n\r\n<p>Để sử dụng, bạn chỉ cần nhấn v&agrave;o m&agrave;n h&igrave;nh hoặc ứng dụng 1 lực mạnh đến khi m&aacute;y rung nhẹ l&agrave; c&oacute; thể xem được.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Chọn nhanh c&aacute;c lựa chọn tr&ecirc;n camera của m&aacute;y</em></p>\r\n\r\n<p>Đ&aacute;ng tiếc t&iacute;nh năng 3D Touch n&agrave;y chỉ mới được &aacute;p dụng tr&ecirc;n c&aacute;c&nbsp;ứng dụng tr&ecirc;n d&ograve;ng&nbsp;<a href=\"https://www.thegioididong.com/dtdd-apple-iphone\" target=\"_blank\">điện thoại iPhone</a>&nbsp;như: danh bạ, camera, mail, m&aacute;y ảnh ...&nbsp;</p>\r\n\r\n<p>Bạn c&oacute; thể t&igrave;m hiểu th&ecirc;m t&iacute;nh năng 3D Touch&nbsp;<strong><a href=\"https://www.thegioididong.com/tin-tuc/tong-hop-tat-ca-nhung-tien-ich-3d-touch-dem-den-cho-nguoi-dung-714800\" target=\"_blank\">tại đ&acirc;y</a></strong>.</p>\r\n\r\n<h3>Sức mạnh của bộ vi xử l&yacute; A9 mới nhất</h3>\r\n\r\n<p>iPhone 6s Plus 32 GB sử dụng&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/chip-xu-ly-apple-a9-tren-iphone-6s-va-6s-plus-733695\" target=\"_blank\">vi xử l&yacute; A9</a>&nbsp;tốc độ 1.8 GHz (iPhone 6 Plus chỉ với 1.4 GHz), gi&uacute;p m&aacute;y chạy c&ugrave;ng l&uacute;c nhiều ứng dụng mượt m&agrave;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Bạn sẽ thực sự cảm nhận được sức mạnh của iPhone 6s Plus 32 GB khi chiến c&aacute;c game c&oacute; đồ họa nặng như&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/modern-combat-5-blackout-game-bom-tan-do-bo-len-ca-556327\" target=\"_blank\">Modern Combat 5</a>&nbsp;hay&nbsp;Warhammer 40.000</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Người trợ l&yacute; ảo rất hữu dụng tr&ecirc;n c&aacute;c d&ograve;ng m&aacute;y iPhone (Nguồn: Youtube)</em></p>\r\n\r\n<p>Vi&ecirc;n pin chỉ c&oacute; dung lượng 2750 mAh kh&aacute; thấp, tuy nhi&ecirc;n bạn vẫn c&oacute; thể an t&acirc;m sử dụng m&aacute;y trong một ng&agrave;y.</p>\r\n\r\n<p>Một chiếc điện thoại vừa thể hiện đẳng cấp của bạn vừa mang lại những n&acirc;ng cấp tốt hơn như camera, hiệu năng hoạt động mạnh mẽ hơn, t&iacute;nh năng 3D Touch độc đ&aacute;o, tất cả sẽ l&agrave; trải nghiệm mới mẻ cho bạn khi chọn mua iPhone 6s Plus 32 GB.</p>\r\n', 11),
(4, 'Điện thoại Samsung Galaxy S10+ (512GB)', 28990000, 10, 1, '<h2>Đặc điểm nổi bật của Samsung Galaxy S10+ (512GB)</h2>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/198986/Slider/-samsung-galaxy-s10-plus-512gb-thietke.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/khau-do-la-gi-tai-sao-khau-do-lai-quan-trong-vo-1098341\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/cong-nghe-quet-van-tay-song-sieu-am-la-gi-912419\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/tin-tuc/tinh-nang-powershare-tren-galaxy-s10-la-gi-lam-sao-de-su-dung-no-1151089\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/chong-nuoc-va-chong-bui-tren-smart-phone-771130\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/tin-tuc/samsung-exynos-9820-ra-mat-chip-8-nm-npu-gpu-tot-hon-40--1131269\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/tong-hop-cac-loai-man-hinh-vo-cuc-moi-tren-dien-th-1150900#infinity-o\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/ar-stickers-la-gi-vi-sao-hang-nao-cung-ap-dung-ar-1096228\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/cong-nghe-dolby-atmos-tren-smartphone-772074\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/tin-tuc/samsung-bixby-la-gi-lieu-bixby-co-giup-samsung-lam-chu-cuoc-dua-ai--963386\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p>Bộ sản phẩm chuẩn: Hộp, Pin, Sạc, Tai nghe</p>\r\n\r\n<h2><a href=\"https://www.thegioididong.com/dtdd/samsung-galaxy-s10-plus-512gb\" title=\"Tham khảo điện thoại Samsung Galaxy S10+ (512GB) chính hãng\">Samsung Galaxy S10+ (512GB)</a>&nbsp;- phi&ecirc;n bản kỷ niệm 10 năm chiếc Galaxy S đầu ti&ecirc;n ra mắt, l&agrave; một chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" title=\"Tham khảo các dòng điện thoại chính hãng\">smartphone</a>&nbsp;hội tủ đủ c&aacute;c yếu tối m&agrave; bạn cần ở một chiếc m&aacute;y cao cấp trong năm 2019.</h2>\r\n\r\n<h3>Kh&aacute;c biệt tới từ m&agrave;n h&igrave;nh&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/tong-hop-cac-loai-man-hinh-vo-cuc-moi-tren-dien-th-1150900#infinity-o\" target=\"_blank\" title=\"Tìm hiểu công nghệ màn hình Infinity-O trên điện thoại Samsung\" type=\"Tìm hiểu công nghệ màn hình Infinity-O trên điện thoại Samsung\">Infinity-O</a></h3>\r\n\r\n<p>Samsung Galaxy S10+ (512GB) đi theo kiểu thiết kế m&agrave;n h&igrave;nh&nbsp;Infinity-O với phần camera được đặt ph&iacute;a trong m&agrave;n h&igrave;nh rất độc đ&aacute;o.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kiểu thiết kế mới n&agrave;y mang lại phần&nbsp;viền m&agrave;n h&igrave;nh mỏng ở tất cả c&aacute;ch cạnh, từ đ&oacute; khiến tổng thể m&aacute;y kh&ocirc;ng qu&aacute; lớn so với k&iacute;ch thước m&agrave;n h&igrave;nh.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/198986/samsung-galaxy-s10-plus-512gb-white-10.jpg\" onclick=\"return false;\"><img alt=\"Mặt trước điện thoại Samsung Galaxy S10+ 512GB chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/198986/samsung-galaxy-s10-plus-512gb-white-10.jpg\" style=\"width:100%\" title=\"Mặt trước điện thoại Samsung Galaxy S10+ 512GB chính hãng\" /></a></p>\r\n\r\n<p>M&agrave;n h&igrave;nh của m&aacute;y c&oacute; k&iacute;ch thước 6.4 inch c&ugrave;ng độ ph&acirc;n giải khủng 2K+ cho bạn thưởng thức những bộ phim hay xem những h&igrave;nh ảnh sắc n&eacute;t.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/tin-tuc/hdr10-la-gi-vi-sao-no-lam-cho-man-hinh-galaxy-s10-dep-hon--1151189\" target=\"_blank\" title=\"Tìm hiểu công nghệ HDR10+\" type=\"Tìm hiểu công nghệ HDR10+\">C&ocirc;ng nghệ HDR10+</a>&nbsp;ti&ecirc;n tiến nhất hiện nay cho bạn một trải nghiệm h&igrave;nh ảnh thực sự kh&aacute;c biệt so với phần c&ograve;n lại của thế giới smartphone.</p>\r\n\r\n<h3>Camera được n&acirc;ng l&ecirc;n tầm cao mới</h3>\r\n\r\n<p>Những chiếc Galaxy S tới từ&nbsp;<a href=\"https://www.thegioididong.com/dtdd-samsung\" target=\"_blank\" title=\"Tham khảo các dòng điện thoại Samsung chính hãng\">Samsung</a>&nbsp;lu&ocirc;n được người d&ugrave;ng đ&aacute;nh gi&aacute; cao về camera v&agrave; với&nbsp;Samsung Galaxy S10+ (512GB) cũng kh&ocirc;ng phải l&agrave; một ngoại lệ.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/198986/samsung-galaxy-s10-plus-512gb-white-11.jpg\" onclick=\"return false;\"><img alt=\"Giao diện camera điện thoại Samsung Galaxy S10+ 512GB chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/198986/samsung-galaxy-s10-plus-512gb-white-11.jpg\" style=\"width:100%\" title=\"Giao diện camera điện thoại Samsung Galaxy S10+ 512GB chính hãng\" /></a></p>\r\n\r\n<p>M&aacute;y sở hữu&nbsp;3 camera với c&aacute;c th&ocirc;ng số lần lượt l&agrave;: ống k&iacute;nh ch&iacute;nh g&oacute;c rộng (77 độ) 12 MP (khẩu độ f/1.5), ống k&iacute;nh phụ tele 12 MP (khẩu độ f/2.4) v&agrave; ống k&iacute;nh phụ g&oacute;c si&ecirc;u rộng (123 độ, f/2.2) 16 MP.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Trang c&ocirc;ng nghệ&nbsp;DxOMark - trang chuy&ecirc;n đ&aacute;nh gi&aacute; về camera cũng đ&atilde; đưa ra nhận x&eacute;t về Galaxy S10+ l&agrave; một trong những chiếc m&aacute;y c&oacute; camera tốt nhất tr&ecirc;n thị trường nhờ khả năng chụp si&ecirc;u rộng cũng như h&igrave;nh ảnh sắc n&eacute;t, m&agrave;u sắc rực rỡ.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/198986/sieu-pham-galaxy-s-moi-2-512gb10.jpg\" onclick=\"return false;\"><img alt=\"Camera trước selfie của điện thoại Samsung Galaxy S10+ (512GB) chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/198986/sieu-pham-galaxy-s-moi-2-512gb10.jpg\" style=\"width:100%\" title=\"Camera trước selfie của điện thoại Samsung Galaxy S10+ (512GB) chính hãng\" /></a></p>\r\n\r\n<p>Camera trước của m&aacute;y cũng l&agrave; cụm camera k&eacute;p với chiếc ống k&iacute;nh ch&iacute;nh 10 MP v&agrave; ống k&iacute;nh phụ 8 MP hỗ trợ chụp ảnh ch&acirc;n dung v&agrave; quay phim với độ ph&acirc;n giải 4K.</p>\r\n\r\n<h3>Sở hữu con chip mạnh mẽ nhất năm 2019</h3>\r\n\r\n<p>Con chip&nbsp;Exynos 9820 kết hợp với 8 GB RAM đủ sức cho bạn c&oacute; thể sử dụng tất cả game v&agrave; ứng dụng nặng nhất hiện nay một c&aacute;ch mượt m&agrave;, bất kể l&agrave; Li&ecirc;n Qu&acirc;n Mobile, Free Fire hay PUBG.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/198986/samsung-galaxy-s10-plus-512gb-white-8.jpg\" onclick=\"return false;\"><img alt=\"Android trên điện thoại Samsung Galaxy S10+ 512GB chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/198986/samsung-galaxy-s10-plus-512gb-white-8.jpg\" style=\"width:100%\" title=\"Android trên điện thoại Samsung Galaxy S10+ 512GB chính hãng\" /></a></p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute; th&igrave; với 512 GB bộ nhớ trong th&igrave; bạn sẽ c&oacute; một kh&ocirc;ng gian &quot;cực kỳ thoải m&aacute;i&quot; để tải ứng dụng hay lưu trữ dữ liệu c&aacute; nh&acirc;n.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Samsung Galaxy S10+ cũng được tối ưu về&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/samsung-ra-mat-giao-dien-moi--one-ui-1129869\" target=\"_blank\" title=\"Tìm hiểu về giao diện OneUI trên smartphone Samsung\" type=\"Tìm hiểu về giao diện OneUI trên smartphone Samsung\">giao diện OneUI</a>&nbsp;mới hứa hẹn sẽ gi&uacute;p m&aacute;y c&oacute; được khả năng hoạt động l&acirc;u d&agrave;i hơn c&aacute;c phi&ecirc;n bản tiền nhiệm trước đ&acirc;y.</p>\r\n\r\n<h3>Nhiều t&iacute;nh năng cao cấp kh&aacute;c</h3>\r\n\r\n<p>Tr&ecirc;n&nbsp;Samsung Galaxy S10+ c&ograve;n c&oacute; một t&iacute;nh năng mới được rất nhiều người y&ecirc;u th&iacute;ch đ&oacute; ch&iacute;nh l&agrave; khả năng sạc ngược kh&ocirc;ng d&acirc;y cho smartphone kh&aacute;c (PowerShare).</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/198986/samsung-galaxy-s10-plus-512gb-powershare.jpg\" onclick=\"return false;\"><img alt=\"Tính năng PowerShare trên Galaxy S10+\" src=\"https://cdn.tgdd.vn/Products/Images/42/198986/samsung-galaxy-s10-plus-512gb-powershare.jpg\" style=\"width:100%\" title=\"Tính năng PowerShare trên Galaxy S10+\" /></a></p>\r\n\r\n<p>Điều n&agrave;y c&oacute; thể gi&uacute;p bạn biến chiếc smartphone của m&igrave;nh th&agrave;nh một cục sạc kh&ocirc;ng d&acirc;y di động trong những trường hợp khẩn cấp.</p>\r\n\r\n<p><em>Xem th&ecirc;m:&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/tinh-nang-powershare-tren-galaxy-s10-la-gi-lam-sao-de-su-dung-no-1151089\" target=\"_blank\" title=\"Tính năng PowerShare trên Galaxy S10 là gì? Làm sao để sử dụng nó?\" type=\"Tính năng PowerShare trên Galaxy S10 là gì? Làm sao để sử dụng nó?\">T&iacute;nh năng PowerShare tr&ecirc;n Galaxy S10 l&agrave; g&igrave;? L&agrave;m sao để sử dụng n&oacute;?</a></em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Ngo&agrave;i ra ti&ecirc;u chuẩn kh&aacute;ng nước v&agrave; bụi bẩn IP68 cao cấp nhất hiện nay vẫn xuất hiện tr&ecirc;n m&aacute;y đảm bảo bạn c&oacute; thể sử dụng dưới c&aacute;c điều kiện khắc nghiệt m&agrave; m&aacute;y kh&ocirc;ng gặp vấn đề g&igrave;.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/cong-nghe-quet-van-tay-song-sieu-am-la-gi-912419\" target=\"_blank\" title=\"Tìm hiểu tính năng vân tay siêu âm \" type=\"Tìm hiểu tính năng vân tay siêu âm \">V&acirc;n tay si&ecirc;u &acirc;m</a>&nbsp;hiện đại v&agrave; ti&ecirc;n tiến cũng l&agrave; 1 t&iacute;nh năng hấp dẫn tr&ecirc;n S10+ gi&uacute;p mở kho&aacute; m&aacute;y nhanh ch&oacute;ng v&agrave; đẳng cấp.</p>\r\n', 14),
(5, 'Điện thoại Samsung Galaxy Note 9 512GB', 23450000, 15, 1, '<h2>Đặc điểm nổi bật của Samsung Galaxy Note 9 512GB</h2>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/183507/Slider/vi-vn-samsung-galaxy-note-9-thietke.gif\" style=\"width:100%\" /><a href=\"https://www.thegioididong.com/tin-tuc/tren-tay-danh-gia-nhanh-galaxy-note-9-spen-bluetooth-1108117\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/but-s-pen-tren-galaxy-note-9-la-dot-pha-chua-tung-1110578\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/khau-do-la-gi-tai-sao-khau-do-lai-quan-trong-vo-1098341\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/cung-tim-hieu-ve-he-thong-tan-nhiet-nuoc-carbon-1110403\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p>Bộ sản phẩm chuẩn: Hộp, Sạc, Tai nghe, S&aacute;ch hướng dẫn, B&uacute;t cảm ứng, C&acirc;y lấy sim, Ốp lưng</p>\r\n\r\n<h2>Sau th&agrave;nh c&ocirc;ng vang dội của&nbsp;<a href=\"https://www.thegioididong.com/dtdd/samsung-galaxy-note8\" target=\"_blank\" title=\"Tham khảo điện thoại Samsung Galaxy Note 8 tại Thegioididong.com\" type=\"Tham khảo điện thoại Samsung Galaxy Note 8 tại Thegioididong.com\">Galaxy Note 8</a>&nbsp;th&igrave; Samsung ch&iacute;nh thức giới thiệu phi&ecirc;n bản tiếp theo tới người d&ugrave;ng c&aacute;i t&ecirc;n&nbsp;<a href=\"https://www.thegioididong.com/dtdd/samsung-galaxy-note-9-512gb\" target=\"_blank\" title=\"Tham khảo điện thoại Samsung Galaxy Note 9 bản 512GB\" type=\"Tham khảo điện thoại Samsung Galaxy Note 9 bản 512GB\">Samsung Galaxy Note 9</a>&nbsp;mang trong m&igrave;nh h&agrave;ng hoạt c&aacute;c thay đổi đột ph&aacute; với điểm nhấn đặc biệt đến từ chiếc b&uacute;t S-Pen thần th&aacute;nh c&ugrave;ng một vi&ecirc;n pin dung lượng khổng lồ tới 4.000 mAh.</h2>\r\n\r\n<h3>B&uacute;t S-Pen cải tiến đến vi diệu</h3>\r\n\r\n<p>Một sự thay đổi khiến bạn phải th&iacute;ch th&uacute; c&oacute; lẽ l&agrave; chiếc b&uacute;t S-Pen đi k&egrave;m theo&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" title=\"Tham khảo các dòng điện thoại tại Thegioididong.com\" type=\"Tham khảo các dòng điện thoại tại Thegioididong.com\">điện thoại</a>&nbsp;với nhiều m&agrave;u sắc nổi bật.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/154897/samsung-galaxy-note-9-13.jpg\" onclick=\"return false;\"><img alt=\"Bút S Pen trên điện thoại Samsung Galaxy Note 9\" src=\"https://cdn.tgdd.vn/Products/Images/42/154897/samsung-galaxy-note-9-13.jpg\" style=\"width:100%\" title=\"Bút S Pen trên điện thoại Samsung Galaxy Note 9\" /></a></p>\r\n\r\n<p>Chưa dừng ở đ&oacute;, chiếc b&uacute;t n&agrave;y c&ograve;n được trang bị khả năng đặc biệt gi&uacute;p điều khiển Note 9 dễ d&agrave;ng th&ocirc;ng qua Bluetooth.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Cụ thể hơn, chỉ với một thao t&aacute;c nhấn đơn giản l&agrave; bạn c&oacute; thể dễ d&agrave;ng chụp ảnh selfie, tr&igrave;nh chiếu b&agrave;i thuyết tr&igrave;nh, ngưng/ph&aacute;t video c&ugrave;ng nhiều c&ocirc;ng năng kh&aacute;c nữa.</p>\r\n\r\n<h3>Hiệu năng lu&ocirc;n ở đỉnh cao</h3>\r\n\r\n<p>L&agrave; một flagship cao cấp n&ecirc;n những g&igrave; mạnh mẽ nhất đều được hội tụ tr&ecirc;n&nbsp;Galaxy Note 9 với con chip&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/chip-snapdragon-845-manh-hon-25-tap-trung-ai-bao-mat-cao-1048166\" target=\"_blank\" title=\"Tìm hiểu về chip Snapdragon 845\" type=\"Tìm hiểu về chip Snapdragon 845\">Snapdragon 845</a>&nbsp;hoặc&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/samsung-trinh-lang-vi-xu-ly-exynos-9810-danh-cho-galaxy-s9-1040294\" target=\"_blank\" title=\"Tìm hiểu về chip Exynos 9810\" type=\"Tìm hiểu về chip Exynos 9810\">Exynos 9810</a>&nbsp;t&ugrave;y v&agrave;o từng thị trường kh&aacute;c nhau.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Đi k&egrave;m theo đ&oacute; l&agrave; bộ nhớ RAM l&ecirc;n đến 8 GB đ&atilde; gi&uacute;p&nbsp;Note 9 trở th&agrave;nh một trong những smartphone mạnh mẽ nhất hiện nay&nbsp;đủ để chiến mọi thể loại game nặng nhất.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/154897/samsung-galaxy-note-9-gaming-3.gif\" onclick=\"return false;\"><img alt=\"Chơi game trên điện thoại Samsung Galaxy Note 9\" src=\"https://cdn.tgdd.vn/Products/Images/42/154897/samsung-galaxy-note-9-gaming-3.gif\" style=\"width:100%\" title=\"Chơi game trên điện thoại Samsung Galaxy Note 9\" /></a></p>\r\n\r\n<p>Hơn nữa, một sự n&acirc;ng cấp v&ocirc; c&ugrave;ng mạnh mẽ kh&aacute;c ch&iacute;nh l&agrave; bộ nhớ trong của m&aacute;y đ&atilde; được n&acirc;ng l&ecirc;n tới 512 GB cho phi&ecirc;n bản cao cấp nhất.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/183507/galaxy-note-9-6.jpg\" onclick=\"return false;\"><img alt=\"Giao diện Android điện thoại Samsung Galaxy Note 9\" src=\"https://cdn.tgdd.vn/Products/Images/42/183507/galaxy-note-9-6.jpg\" style=\"width:100%\" title=\"Giao diện Android điện thoại Samsung Galaxy Note 9\" /></a></p>\r\n\r\n<p>Đ&aacute;ng tiếc m&aacute;y vẫn chỉ được sẵn&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/co-gi-dac-biet-o-android-81-oreo-1073208\" target=\"_blank\" title=\"Tìm hiểu về hệ điều hành Android 8.1 Oreo\" type=\"Tìm hiểu về hệ điều hành Android 8.1 Oreo\">Android 8.1 (Oreo)</a>&nbsp;v&agrave; hứa hẹn trong thời gian tới sẽ được cập nhật nhanh ch&oacute;ng l&ecirc;n phi&ecirc;n bản Android mới nhất với nhiều t&iacute;nh năng mới mẻ.</p>\r\n\r\n<p>Camera thay đổi&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/khau-do-la-gi-tai-sao-khau-do-lai-quan-trong-vo-1098341\" target=\"_blank\" title=\"Tìm hiểu về khẩu độ\" type=\"Tìm hiểu về khẩu độ\">khẩu độ</a>&nbsp;dễ d&agrave;ng v&agrave; t&iacute;ch hợp AI</p>\r\n\r\n<p>Galaxy Note 9 sở hữu bộ đ&ocirc;i camera k&eacute;p với c&ugrave;ng độ ph&acirc;n giải 12 MP c&oacute; khả năng thay đổi khẩu độ như&nbsp;<a href=\"https://www.thegioididong.com/dtdd/samsung-galaxy-s9-plus\" target=\"_blank\" title=\"Tham khảo điện thoại Galaxy S9+ tại Thegioididong.com\" type=\"Tham khảo điện thoại Galaxy S9+ tại Thegioididong.com\">Galaxy S9+</a>&nbsp;v&agrave; được t&iacute;ch hợp th&ecirc;m c&ocirc;ng nghệ AI gi&uacute;p chất lượng ảnh chụp đẹp hơn đ&aacute;ng kể.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Theo như những g&igrave; m&agrave; Samsung giới thiệu th&igrave; AI tr&ecirc;n Note 9 c&oacute; khả năng ph&acirc;n loại nhiều đối tượng, tự động điều chỉnh m&agrave;u sắc, độ tương phản v&agrave; độ s&aacute;ng trong bối cảnh chụp ảnh kh&aacute;c nhau.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Chất lượng ảnh chụp của m&aacute;y v&ocirc; c&ugrave;ng ấn tượng với c&aacute;c chi tiết được thể hiện r&otilde; r&agrave;ng, m&agrave;u sắc c&acirc;n đối v&agrave; độ tương phản cao.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Cũng như tr&ecirc;n Galaxy S9+ th&igrave; Note 9 cũng được trang bị khả năng quay phim&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/super-slow-motion-960fps-la-gi-956676\" target=\"_blank\" title=\"Tìm hiểu về quay phim Super Slow Motion\" type=\"Tìm hiểu về quay phim Super Slow Motion\">Super Slow Motion</a>&nbsp;gi&uacute;p bạn ghi lại những khoảnh khắc đ&aacute;ng nhớ trong cuộc sống.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Dung lượng pin được cải tiến</h3>\r\n\r\n<p>Sau những g&igrave; m&agrave; người d&ugrave;ng mong mỏi th&igrave; nay&nbsp;Note 9 đ&atilde; c&oacute; một vi&ecirc;n pin to hơn, mạnh mẽ v&agrave; bền bỉ hơn với dung lượng l&ecirc;n đến 4000 mAh.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tuy kh&ocirc;ng thuộc dạng khủng nhất nhưng từng đ&oacute; cũng đủ để bạn c&oacute; thể h&agrave;i l&ograve;ng với c&aacute;c trải nghiệm hằng ng&agrave;y một c&aacute;ch trọn vẹn.</p>\r\n\r\n<p>Hơi thất vọng nhẹ khi m&aacute;y vẫn chỉ được trang bị c&ocirc;ng nghệ sạc nhanh&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/su-loi-hai-cua-tinh-nang-sac-nhanh-quick-charge-2--625393\" target=\"_blank\" title=\"Tìm hiểu về công nghệ Quick Charge 2.0\" type=\"Tìm hiểu về công nghệ Quick Charge 2.0\">Quick Charge 2.0</a>&nbsp;n&ecirc;n thời gian sạc vẫn chưa được tối ưu nhất.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/183507/galaxy-note-9-20.jpg\" onclick=\"return false;\"><img alt=\"Cổng sạc trên điện thoại Samsung Galaxy Note 9\" src=\"https://cdn.tgdd.vn/Products/Images/42/183507/galaxy-note-9-20.jpg\" style=\"width:100%\" title=\"Cổng sạc trên điện thoại Samsung Galaxy Note 9\" /></a></p>\r\n\r\n<p>Một ch&uacute;t thay đổi trong thiết kế</p>\r\n\r\n<p>Chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd-samsung\" target=\"_blank\" title=\"Tham khảo các dòng điện thoại Samsung tại Thegioididong.com\" type=\"Tham khảo các dòng điện thoại Samsung tại Thegioididong.com\">điện thoại Samsung</a>&nbsp;mới vẫn thừa hưởng lối thiết kế v&ocirc; c&ugrave;ng quyến rũ từ đ&agrave;n anh của m&igrave;nh với th&acirc;n h&igrave;nh mạnh mẽ v&agrave; được c&aacute;ch điệu bởi những đường cong mềm mại.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Điểm thay đổi đ&aacute;ng ch&uacute; &yacute; phải kể đến mặt lưng khi m&agrave;&nbsp;<a href=\"https://www.thegioididong.com/hoi-dap/cam-bien-van-tay-tren-smartphone-la-gi-908163\" target=\"_blank\" title=\"Tìm hiểu cảm biến vân tay trên điện thoại\" type=\"Tìm hiểu cảm biến vân tay trên điện thoại\">cảm biến v&acirc;n tay</a>&nbsp;của m&aacute;y đ&atilde; được đặt dưới cụm&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/cung-tim-hieu-ve-cac-loai-camera-kep-hien-co-tren-smartphone-1079186\" target=\"_blank\" title=\"Tìm hiểu các loại camera kép trên điện thoại\" type=\"Tìm hiểu các loại camera kép trên điện thoại\">camera k&eacute;p</a>&nbsp;với một vị tr&iacute; thuận lợi để bạn c&oacute; thể mở kh&oacute;a m&aacute;y một c&aacute;ch dễ d&agrave;ng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute; Samsung đ&atilde; tối giản cạnh viền tr&ecirc;n dưới để mang lại cho bạn một trải nghiệm tuyệt vời hơn nữa với một m&agrave;n h&igrave;nh c&oacute; k&iacute;ch thước khủng l&ecirc;n đến 6.4 inch.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/154897/samsung-galaxy-note-9-1-2.jpg\" onclick=\"return false;\"><img alt=\"Màn hình điện thoại Samsung Galaxy Note 9\" src=\"https://cdn.tgdd.vn/Products/Images/42/154897/samsung-galaxy-note-9-1-2.jpg\" style=\"width:100%\" title=\"Màn hình điện thoại Samsung Galaxy Note 9\" /></a></p>\r\n\r\n<p>Nh&igrave;n chung với chỉ một ch&uacute;t thay đổi nhỏ trong thiết kế cũng đủ để gi&uacute;p&nbsp;Galaxy Note 9 trở n&ecirc;n nổi bật v&agrave; quyến rũ, cũng như khắc phục được những thiếu s&oacute;t từ đ&agrave;n anh Note 8.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>❝</strong>Đ&atilde; mua v&agrave; cảm thấy rất h&agrave;i l&ograve;ng về m&aacute;y. Cấu h&igrave;nh ngon cộng th&ecirc;m camera rất đẹp. Pin x&agrave;i tương đối ổn, cảm biến v&acirc;n tay nhạy. N&oacute;i chung l&agrave; si&ecirc;u phẩm n&ecirc;n kh&ocirc;ng c&oacute; g&igrave; phải ph&agrave;n n&agrave;n.<strong>❞</strong></p>\r\n', 15),
(6, 'Điện thoại Nokia 8.1', 7990000, 111, 1, '<h2>Đặc điểm nổi bật của Nokia 8.1</h2>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/194917/Slider/vi-vn-nokia-81-thietke.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/che-do-chong-rung-quang-hoc-ois-chup-anh-tren-sm-906416\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/tin-tuc/android-one-la-gi-vi-sao-android-one-se-giup-google-giau-to--1019332\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p>Bộ sản phẩm chuẩn: Sạc, Tai nghe, C&aacute;p, C&acirc;y lấy sim</p>\r\n\r\n<h2><a href=\"https://www.thegioididong.com/dtdd/nokia-81\" target=\"_blank\" title=\"Tham khảo chi tiết điện thoại Nokia 7.1 Plus tại Thegioididong.com\" type=\"Tham khảo chi tiết điện thoại Nokia 7.1 Plus tại Thegioididong.com\">Nokia 8.1</a>&nbsp;(l&agrave; phi&ecirc;n bản quốc tế của Nokia X7),&nbsp;chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" title=\"Tham khảo các dòng điện thoại chính hãng, giá tốt đang kinh doanh tại Thegioididong.com\" type=\"Tham khảo các dòng điện thoại chính hãng, giá tốt đang kinh doanh tại Thegioididong.com\">smartphone</a>&nbsp;trong ph&acirc;n kh&uacute;c cận cao cấp vừa được tr&igrave;nh l&agrave;ng, sở hữu một cấu h&igrave;nh cao cấp k&egrave;m theo đ&oacute; l&agrave; sự n&acirc;ng cấp mạnh mẽ về hệ thống camera với h&agrave;ng loạt c&aacute;c t&iacute;nh năng chụp ảnh hiện đại.</h2>\r\n\r\n<h3>Thiết kế mạnh mẽ, sang trọng</h3>\r\n\r\n<p>Chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd-nokia\" target=\"_blank\" title=\"Tham khảo các dòng điện thoại Nokia chính hãng, giá tốt đang kinh doanh tại Thegioididong.com\" type=\"Tham khảo các dòng điện thoại Nokia chính hãng, giá tốt đang kinh doanh tại Thegioididong.com\">điện thoại Nokia</a>&nbsp;mới sở hữu cho m&igrave;nh lối thiết kế quen thuộc nhưng vẫn đậm chất của h&atilde;ng trong sự kết hợp giữa khung kim loại c&ugrave;ng 2 mặt k&iacute;nh cao cấp.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/194917/nokia-81-4-1.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế điện thoại Nokia 8.1 (Nokia X7) chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/194917/nokia-81-4-1.jpg\" style=\"width:100%\" title=\"Thiết kế điện thoại Nokia 8.1 (Nokia X7) chính hãng\" /></a></p>\r\n\r\n<p>Đi theo tr&agrave;o lưu mới n&ecirc;n việc được trang bị một chiếc tai thỏ ở kh&ocirc;ng gian mặt trước sẽ l&agrave; lựa chọn th&ocirc;ng minh để thu h&uacute;t người d&ugrave;ng.</p>\r\n\r\n<p>Cảm gi&aacute;c cầm nắm m&agrave;&nbsp;Nokia 8.1 mang lại vẫn v&ocirc; c&ugrave;ng chắc chắn v&agrave; thoải m&aacute;i nhờ m&aacute;y được bo cong mềm mại ở c&aacute;c g&oacute;c.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/194917/nokia-81-6-1.jpg\" onclick=\"return false;\"><img alt=\"Màn hình điện thoại Nokia 8.1 (Nokia X7) chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/194917/nokia-81-6-1.jpg\" style=\"width:100%\" title=\"Màn hình điện thoại Nokia 8.1 (Nokia X7) chính hãng\" /></a></p>\r\n\r\n<p>Một điểm nhấn nhẹ ở mặt lưng khi m&agrave; cụm camera k&eacute;p, cảm biến v&acirc;n tay v&agrave; logo Nokia được bố tr&iacute; thẳng h&agrave;ng với nhau tr&ocirc;ng cực k&igrave; tinh tế.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/194917/nokia-81-8-1.jpg\" onclick=\"return false;\"><img alt=\"Cảm biến vân tay điện thoại Nokia 8.1 (Nokia X7) chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/194917/nokia-81-8-1.jpg\" style=\"width:100%\" title=\"Cảm biến vân tay điện thoại Nokia 8.1 (Nokia X7) chính hãng\" /></a></p>\r\n\r\n<p>Về kh&ocirc;ng gian Nokia 8.1 đem đến cho bạn một m&agrave;n h&igrave;nh rộng r&atilde;i với k&iacute;ch thước l&ecirc;n đến 6.18 inch đi k&egrave;m độ ph&acirc;n giải Full HD+ c&ugrave;ng 81% diện t&iacute;ch trải nghiệm.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/194917/nokia-81-1-2.jpg\" onclick=\"return false;\"><img alt=\"Màn hình điện thoại Nokia 8.1 (Nokia X7) chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/194917/nokia-81-1-2.jpg\" style=\"width:100%\" title=\"Màn hình điện thoại Nokia 8.1 (Nokia X7) chính hãng\" /></a></p>\r\n\r\n<p>Đồng thời, nhờ c&ocirc;ng nghệ PureDisplay,&nbsp;bạn sẽ xem được video chất lượng HDR10 đầy kh&aacute;c biệt. Hơn nữa, m&agrave;n h&igrave;nh sẽ tự động điều chỉnh để mang lại cho bạn trải nghiệm xem tốt nhất theo từng điều kiện &aacute;nh s&aacute;ng cụ thể.</p>\r\n\r\n<p>Nhờ vậy m&agrave; c&aacute;c hoạt động giải tr&iacute; như: xem phim, lướt web hay chơi game tr&ecirc;n m&agrave;n h&igrave;nh n&agrave;y sẽ trở n&ecirc;n tối ưu v&agrave; thoải m&aacute;i hơn rất nhiều.</p>\r\n\r\n<h3>Mượt m&agrave; với hệ điều h&agrave;nh&nbsp;Android 9 Pie&nbsp;(<a href=\"https://www.thegioididong.com/tin-tuc/android-one-la-gi-vi-sao-android-one-se-giup-google-giau-to--1019332\" target=\"_blank\" title=\"Tìm hiểu hệ điều hành Android One\" type=\"Tìm hiểu hệ điều hành Android One\">Android One</a>)</h3>\r\n\r\n<p>Sức mạnh tr&ecirc;n&nbsp;Nokia 8.1 được thể hiện qua con chip&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/snapdragon-710-se-la-vi-xu-ly-dau-tien-thuoc-series-700-1079732\" target=\"_blank\" title=\"Tìm hiểu chip Snapdragon 710\" type=\"Tìm hiểu chip Snapdragon 710\">Snapdragon 710</a>&nbsp;đi k&egrave;m 4 GB RAM c&ugrave;ng 64 GB bộ nhớ trong.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; con chip thế hệ mới trong ph&acirc;n kh&uacute;c cận cao cấp c&oacute; hiệu năng mạnh mẽ v&agrave; ổn định để bạn c&oacute; thể chiến c&aacute;c tựa game khủng nhất hiện nay một c&aacute;ch mượt m&agrave; như Li&ecirc;n Qu&acirc;n hay PUBG ở cấu h&igrave;nh cao.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/194917/nokia-81-1-1.jpg\" onclick=\"return false;\"><img alt=\"Chơi game trên điện thoại Nokia 8.1 chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/194917/nokia-81-1-1.jpg\" style=\"width:100%\" title=\"Chơi game trên điện thoại Nokia 8.1 chính hãng\" /></a></p>\r\n\r\n<p>Chưa hết,&nbsp;Nokia 8.1 c&ograve;n được tiếp th&ecirc;m sức mạnh nhờ hệ điều h&agrave;nh Android One &iacute;t sự t&ugrave;y biến gi&uacute;p m&aacute;y hoạt động mượt m&agrave; hơn cũng như được hỗ trợ cập nhật l&acirc;u d&agrave;i.</p>\r\n', 10),
(7, 'Điện thoại iPhone Xs 256GB', 33000000, 111, 1, '<h2>Đặc điểm nổi bật của iPhone Xs 256GB</h2>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/190324/Slider/-iphone-xs-thiet-ke-1.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/tin-tuc/chi-tiet-chip-apple-a12-bionic-ben-trong-iphone-xs-xs-max-1116982\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p>Bộ sản phẩm chuẩn: Hộp, Sạc, Tai nghe, S&aacute;ch hướng dẫn, C&aacute;p, C&acirc;y lấy sim</p>\r\n\r\n<h2>Chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd-apple-iphone\" target=\"_blank\" title=\"Tham khảo các dòng điện thoại iPhone\" type=\"Tham khảo các dòng điện thoại iPhone\">điện thoại iPhone</a>&nbsp;mới đ&atilde; ch&iacute;nh thức được ra mắt v&agrave;o đ&ecirc;m 12/9 theo giờ Việt Nam, trong đ&oacute; c&oacute; phi&ecirc;n bản&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-xs-256gb\" target=\"_blank\" title=\"Chi tiết điện thoại iPhone XS 256GB\" type=\"Chi tiết điện thoại iPhone XS 256GB\">iPhone Xs 256GB</a>&nbsp;với bộ nhớ khủng, cấu h&igrave;nh mạnh mẽ với chip Apple A12 v&agrave; những t&iacute;nh năng đẳng cấp kh&aacute;c.</h2>\r\n\r\n<h3>T&iacute;ch hợp&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/chi-tiet-chip-apple-a12-bionic-ben-trong-iphone-xs-xs-max-1116982\" target=\"_blank\" title=\"Tìm hiểu chip Apple A12\" type=\"Tìm hiểu chip Apple A12\">chip Apple A12</a>&nbsp;hiệu năng mạnh mẽ bậc nhất</h3>\r\n\r\n<p>iPhone Xs t&iacute;ch hợp con chip mới của Apple với những hiệu năng mạnh mẽ đến vượt trội.</p>\r\n\r\n<p>Apple A12 Bionic được x&acirc;y dựng tr&ecirc;n tiến tr&igrave;nh 7nm đầu ti&ecirc;n của h&atilde;ng với 6 nh&acirc;n gi&uacute;p&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" title=\"Tham khảo các dòng điện thoại tại Thegioididong.com\" type=\"Tham khảo các dòng điện thoại tại Thegioididong.com\">điện thoại</a>&nbsp;iPhone Xs c&oacute; thể chiến được mọi loại game cũng như thao t&aacute;c thường ng&agrave;y với khả năng tiết kiệm điện so với thế hệ trước.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/190324/iphone-xs-256gb-1.jpg\" onclick=\"return false;\"><img alt=\"Chip A12 trên điện thoại iPhone Xs chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/190324/iphone-xs-256gb-1.jpg\" style=\"width:100%\" title=\"Chip A12 trên điện thoại iPhone Xs chính hãng\" /></a></p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, bộ xử l&yacute; đồ họa của m&aacute;y cũng được Apple thiết kế lại gi&uacute;p việc chơi game hay dựng h&igrave;nh mượt m&agrave; v&agrave; nhanh ch&oacute;ng hơn gấp nhiều lần.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/190324/iphone-xs-256gb-8.jpg\" onclick=\"return false;\"><img alt=\"Trải nghiệm điện thoại iPhone Xs chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/190324/iphone-xs-256gb-8.jpg\" style=\"width:100%\" title=\"Trải nghiệm điện thoại iPhone Xs chính hãng\" /></a></p>\r\n\r\n<p>Chưa dừng lại ở đ&oacute;, iPhone Xs c&ograve;n được t&iacute;ch hợp th&ecirc;m tr&iacute; th&ocirc;ng minh nh&acirc;n tạo gi&uacute;p tối ưu phần cứng để bạn c&oacute; thể xử l&yacute; c&aacute;c t&aacute;c vụ một c&aacute;ch đơn giản nhất.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/190324/iphone-xs-256gb-7.jpg\" onclick=\"return false;\"><img alt=\"iOS trên điện thoại iPhone Xs chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/190324/iphone-xs-256gb-7.jpg\" style=\"width:100%\" title=\"iOS trên điện thoại iPhone Xs chính hãng\" /></a></p>\r\n\r\n<p>Kết hợp với phần cứng mạnh mẽ l&agrave; hệ điều h&agrave;nh iOS 12 si&ecirc;u mượt, hứa hẹn iPhone Xs sẽ trở th&agrave;nh một con qu&aacute;i th&uacute; trong l&agrave;ng smartphone hiện nay.</p>\r\n', 10),
(8, 'Điện thoại iPhone 8 Plus 256GB', 25700000, 1111, 1, '<h2 style=\"text-align:justify\">Đặc điểm nổi bật của iPhone 8 Plus 256GB</h2>\r\n\r\n<p style=\"text-align:justify\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/114114/Slider/-1-thietke.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://www.thegioididong.com/tin-tuc/chi-tiet-a11-bionic-chip-co-nhieu-thanh-phan-apple-tu-trong-nhat-tu-truoc-den-nay-1021653\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://www.thegioididong.com/hoi-dap/mo-khoa-bang-dau-van-tay-645010\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://www.thegioididong.com/hoi-dap/cong-nghe-sac-khong-day-761328\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p style=\"text-align:justify\">Bộ sản phẩm chuẩn: Hộp, Pin, Sạc, Tai nghe, S&aacute;ch hướng dẫn, C&aacute;p, C&acirc;y lấy sim</p>\r\n\r\n<h2 style=\"text-align:justify\"><a href=\"https://www.thegioididong.com/dtdd/iphone-8-plus-256gb\" target=\"_blank\" title=\"Chi tiết điện thoại iPhone 8 Plus 256GB\" type=\"Chi tiết điện thoại iPhone 8 Plus 256GB\">iPhone 8 Plus</a>&nbsp;l&agrave; bản n&acirc;ng cấp nhẹ của chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-7-plus-256gb\" target=\"_blank\" title=\"Chi tiết điện thoại iPhone 7 Plus\" type=\"Chi tiết điện thoại iPhone 7 Plus\">iPhone 7 Plus</a>&nbsp;đ&atilde; ra mắt trước đ&oacute; với cấu h&igrave;nh mạnh mẽ c&ugrave;ng camera c&oacute; nhiều cải tiến.</h2>\r\n\r\n<h3 style=\"text-align:justify\">Thiết kế quen thuộc vốn c&oacute; của d&ograve;ng&nbsp;<a href=\"https://www.thegioididong.com/dtdd-apple-iphone\" target=\"_blank\" title=\"Tham khảo các dòng điện thoại Apple iPhone tại Thegioididong.com\" type=\"Tham khảo các dòng điện thoại Apple iPhone tại Thegioididong.com\">iPhone Apple</a></h3>\r\n\r\n<p style=\"text-align:justify\">Về ngoại h&igrave;nh&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" title=\"Tham khảo các dòng điện thoại tại Thegioididong.com\" type=\"Tham khảo các dòng điện thoại tại Thegioididong.com\">điện thoại</a>&nbsp;iPhone 8 Plus kh&ocirc;ng c&oacute; qu&aacute; nhiều kh&aacute;c biệt so với người đ&agrave;n anh đi trước.</p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://www.thegioididong.com/images/42/114114/iphone-8-plus-256gb2-1.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế điện thoại iPhone 8 Plus\" src=\"https://cdn.tgdd.vn/Products/Images/42/114114/iphone-8-plus-256gb2-1.jpg\" style=\"width:100%\" title=\"Thiết kế điện thoại iPhone 8 Plus\" /></a></p>\r\n\r\n<p style=\"text-align:justify\">Thay đổi lớn nhất ch&iacute;nh l&agrave; Apple đ&atilde; chuyển từ thiết kế kim loại nguy&ecirc;n khối sang mặt lưng k&iacute;nh nhằm mang t&iacute;nh năng sạc kh&ocirc;ng d&acirc;y l&ecirc;n 8 Plus.</p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://www.thegioididong.com/images/42/114114/iphone-8-plus-256gb-h1-1.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế điện thoại iPhone 8 Plus\" src=\"https://cdn.tgdd.vn/Products/Images/42/114114/iphone-8-plus-256gb-h1-1.jpg\" style=\"width:100%\" title=\"Thiết kế điện thoại iPhone 8 Plus\" /></a></p>\r\n\r\n<h3 style=\"text-align:justify\">M&agrave;n h&igrave;nh rộng v&agrave; sắc n&eacute;t</h3>\r\n\r\n<p style=\"text-align:justify\">iPhone 8 Plus sở hữu m&agrave;n h&igrave;nh k&iacute;ch thước 5.5 inch độ ph&acirc;n giải&nbsp;<a href=\"https://www.thegioididong.com/tin-tuc/do-phan-giai-man-hinh-qhd-hd-fullhd-2k-4k-la-gi--592178#hd\" target=\"_blank\" title=\"Tìm hiểu độ phân giải Full HD (1080 x 1920 pixels)\">Full HD (1080 x 1920 pixels)</a>&nbsp;đem lại khả năng hiển thị sắc n&eacute;t.</p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://www.thegioididong.com/images/42/114114/iphone-8-plus-256gb-h3.jpg\" onclick=\"return false;\"><img alt=\"Màn hình điện thoại iPhone 8 Plus\" src=\"https://cdn.tgdd.vn/Products/Images/42/114114/iphone-8-plus-256gb-h3.jpg\" style=\"width:100%\" title=\"Màn hình điện thoại iPhone 8 Plus\" /></a></p>\r\n\r\n<p style=\"text-align:justify\">M&aacute;y vẫn sử dụng tấm nền&nbsp;LED-backlit IPS LCD kết hợp với c&ocirc;ng nghệ True Tone gi&uacute;p bạn dễ d&agrave;ng quan s&aacute;t với nhiều điều kiện kh&aacute;c nhau.</p>\r\n', 10);
INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `status`, `description`, `categories_id`) VALUES
(9, 'Điện thoại OPPO R17 Pro', 14000000, 122, 1, '<h2 style=\"text-align:justify\">Đặc điểm nổi bật của OPPO R17 Pro</h2>\r\n\r\n<p style=\"text-align:justify\"><img src=\"https://cdn.tgdd.vn/Products/Images/42/186395/Slider/vi-vn-oppo-r17-pro-thietke.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://www.thegioididong.com/tin-tuc/tren-tay-oppo-r17-pro-chip-snapdragon-710-camera-3d-1127832\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://www.thegioididong.com/hoi-dap/cong-nghe-quet-van-tay-song-sieu-am-la-gi-912419\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://www.thegioididong.com/hoi-dap/man-hinh-giot-nuoc-moi-cua-oppo-co-gi-dac-biet-1107721\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://www.thegioididong.com/hoi-dap/tim-hieu-ve-cong-nghe-sac-nhanh-vooc-cua-oppo-918283\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://www.thegioididong.com/tin-tuc/test-hieu-nang-snapdragon-710-chip-moi-nay-manh-co-nao-1101930\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p style=\"text-align:justify\">Bộ sản phẩm chuẩn: Hộp, Tai nghe, S&aacute;ch hướng dẫn, Dock sạc, C&aacute;p, C&acirc;y lấy sim, Ốp lưng</p>\r\n\r\n<h2 style=\"text-align:justify\"><a href=\"https://www.thegioididong.com/dtdd/oppo-r17-pro\" target=\"_blank\" title=\"Chi tiết điện thoại OPPO R17 Pro\" type=\"Chi tiết điện thoại OPPO R17 Pro\">OPPO R17 Pro</a>&nbsp;được xem l&agrave; chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" title=\"Tham khảo smartphone tại Thegioididong.com\" type=\"Tham khảo smartphone tại Thegioididong.com\">smartphone</a>&nbsp;sự hiện th&acirc;n của c&aacute;i đẹp khi được kho&aacute;c l&ecirc;n m&igrave;nh một thiết kế trẻ trung v&agrave; hiện đại, c&ugrave;ng với đ&oacute; l&agrave; h&agrave;ng loạt c&aacute;c trang bị cao cấp đi từ cấu h&igrave;nh cho đến camera.</h2>\r\n\r\n<h3 style=\"text-align:justify\">Thiết kế thời trang, ph&aacute; c&aacute;ch</h3>\r\n\r\n<p style=\"text-align:justify\">OPPO R17 Pro sở hữu cho m&igrave;nh lối thiết kế mới sẽ khiến bạn phải m&ecirc; mẩn đến từ chiếc tai thỏ h&igrave;nh giọt nước v&ocirc; c&ugrave;ng quyến rũ.</p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://www.thegioididong.com/images/42/186395/oppo-r17-pro-6-3.jpg\" onclick=\"return false;\"><img alt=\"Màn hình điện thoại OPPO R17 Pro chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/186395/oppo-r17-pro-6-3.jpg\" style=\"width:100%\" title=\"Màn hình điện thoại OPPO R17 Pro chính hãng\" /></a></p>\r\n\r\n<p style=\"text-align:justify\">Th&acirc;n h&igrave;nh uyển chuyển với c&aacute;c đường cong mềm mại v&agrave; cực k&igrave; thu h&uacute;t khi m&agrave;n h&igrave;nh của m&aacute;y gần như chiếm trọn mặt trước.</p>\r\n\r\n<p style=\"text-align:justify\"><a href=\"https://www.thegioididong.com/images/42/186395/oppo-r17-pro-9-1.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế điện thoại OPPO R17 Pro chính hãng\" src=\"https://cdn.tgdd.vn/Products/Images/42/186395/oppo-r17-pro-9-1.jpg\" style=\"width:100%\" title=\"Thiết kế điện thoại OPPO R17 Pro chính hãng\" /></a></p>\r\n\r\n<p style=\"text-align:justify\">Ấn tượng hơn với mặt lưng k&iacute;nh, trong sự kết hợp h&agrave;i h&ograve;a giữa m&agrave;u xanh v&agrave; t&iacute;m tạo n&ecirc;n hiệu ứng gradient đa sắc độ khi bạn ngắm nh&igrave;n ở c&aacute;c g&oacute;c nghi&ecirc;ng kh&aacute;c nhau.</p>\r\n', 10),
(10, 'Điện thoại OPPO F7', 6000000, 125, 1, '<h2>Đặc điểm nổi bật của OPPO F7</h2>\r\n\r\n<p><img src=\"https://cdn.tgdd.vn/Products/Images/42/155261/Slider/vi-vn-1-thietke-oppo-f7.jpg\" style=\"width:100%\" /></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/hoi-dap/cong-nghe-selfie-ai-beauty-la-gi-1049958\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/tin-tuc/do-phan-giai-man-hinh-qhd-hd-fullhd-2k-4k-la-gi--592178\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/tin-tuc/mediatek-gioi-thieu-helio-p60-tai-mwc-2018-tap-trung-ai-va-hieu-suat-1069899\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/tin-tuc/bao-mat-khuon-mat-se-thanh-tieu-chuan-moi-tren-smartphone-1066760\" target=\"_blank\">T&igrave;m hiểu th&ecirc;m</a></p>\r\n\r\n<p>Bộ sản phẩm chuẩn: Hộp, Sạc, Tai nghe, C&aacute;p, C&acirc;y lấy sim, Ốp lưng</p>\r\n\r\n<h2>Tiếp nối sự th&agrave;nh c&ocirc;ng của&nbsp;<a href=\"https://www.thegioididong.com/dtdd/oppo-f5-6gb\" target=\"_blank\" title=\"Chi tiết điện thoại OPPO F5\" type=\"Chi tiết điện thoại OPPO F5\">OPPO F5</a>&nbsp;th&igrave; OPPO tiếp tục tung ra&nbsp;<a href=\"https://www.thegioididong.com/dtdd/oppo-f7\" target=\"_blank\" title=\"Chi tiết điện thoại OPPO F7\" type=\"Chi tiết điện thoại OPPO F7\">OPPO F7</a>&nbsp;với điểm nhấn vẫn l&agrave; camera selfie v&agrave; thiết kế &quot;tai thỏ độc đ&aacute;o&quot;.</h2>\r\n\r\n<h3>Thiết kế tai thỏ độc đ&aacute;o</h3>\r\n\r\n<p>OPPO F7 vẫn đi theo thiết kế &quot;tai thỏ&quot; m&agrave;&nbsp;<a href=\"https://www.thegioididong.com/dtdd-apple-iphone\" target=\"_blank\" title=\"Tham khảo các dòng điện thoại Apple iPhone\" type=\"Tham khảo các dòng điện thoại Apple iPhone\">Apple</a>&nbsp;đ&atilde; từng l&agrave;m tr&ecirc;n&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-x-64gb-gray\" target=\"_blank\" title=\"Chi tiết điện thoại iPhone X 64GB Gray\" type=\"Chi tiết điện thoại iPhone X 64GB Gray\">iPhone X</a>.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/155261/oppo-f71.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế điện thoại OPPO F7\" src=\"https://cdn.tgdd.vn/Products/Images/42/155261/oppo-f71.jpg\" style=\"width:100%\" title=\"Thiết kế điện thoại OPPO F7\" /></a></p>\r\n\r\n<p><em>OPPO F7 với thiết kế &quot;tai thỏ&quot;</em></p>\r\n\r\n<p>M&aacute;y sẽ sở hữu m&agrave;n h&igrave;nh c&oacute; k&iacute;ch thước&nbsp;6.23 inch với độ ph&acirc;n giải Full HD+.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/155261/oppo-f76.jpg\" onclick=\"return false;\"><img alt=\"Thiết kế điện thoại OPPO F7\" src=\"https://cdn.tgdd.vn/Products/Images/42/155261/oppo-f76.jpg\" style=\"width:100%\" title=\"Thiết kế điện thoại OPPO F7\" /></a></p>\r\n\r\n<p><em>M&agrave;n h&igrave;nh tỉ lệ 19:9</em></p>\r\n\r\n<p>Diện t&iacute;ch m&agrave;n h&igrave;nh của m&aacute;y chiếm tới&nbsp;89.09% gi&uacute;p tổng thể m&aacute;y kh&ocirc;ng qu&aacute; lớn so với c&aacute;c thiết bị c&ugrave;ng k&iacute;ch cỡ m&agrave;n h&igrave;nh.</p>\r\n\r\n<p>Mặt lưng với c&aacute;c g&oacute;c cạnh được bo cong cũng sẽ gi&uacute;p cho m&aacute;y &ocirc;m tay khi sử dụng.</p>\r\n\r\n<h3>Camera độ ph&acirc;n giải cao</h3>\r\n\r\n<p><a href=\"https://www.thegioididong.com/dtdd\" target=\"_blank\" title=\"Tham khảo các dòng điện thoại tại Thegioididong.com\" type=\"Tham khảo các dòng điện thoại tại Thegioididong.com\">Điện thoại</a>&nbsp;OPPO F7 sẽ sở hữu một m&aacute;y ảnh ph&iacute;a trước độ ph&acirc;n giải 25 MP.</p>\r\n\r\n<p><a href=\"https://www.thegioididong.com/images/42/155261/oppo-f72.jpg\" onclick=\"return false;\"><img alt=\"Cụm camera selfie của điện thoại OPPO F7\" src=\"https://cdn.tgdd.vn/Products/Images/42/155261/oppo-f72.jpg\" style=\"width:100%\" title=\"Cụm camera selfie của điện thoại OPPO F7\" /></a></p>\r\n\r\n<p><em>Camera selfie vẫn l&agrave; lợi thế của m&aacute;y</em></p>\r\n\r\n<p>OPPO lu&ocirc;n tiếp thị sản phẩm của họ l&agrave; chuy&ecirc;n gia selfie, v&agrave; với F7 cũng kh&ocirc;ng phải l&agrave; ngoại lệ.</p>\r\n\r\n<p>T&iacute;nh năng l&agrave;m đẹp bằng tr&iacute; tuệ th&ocirc;ng minh nh&acirc;n tạo AI vốn đ&atilde; xuất hiện tr&ecirc;n&nbsp;<a href=\"https://www.thegioididong.com/dtdd-oppo\" target=\"_blank\" title=\"Các dòng điện thoại OPPO tại Thegioididong.com\" type=\"Các dòng điện thoại OPPO tại Thegioididong.com\">điện thoại OPPO</a>&nbsp;d&ograve;ng cũ, nay t&iacute;ch hợp ở F7 hứa hẹn cũng sẽ được cải tiến đem lại chất lượng tốt hơn.</p>\r\n\r\n<p>C&aacute;c t&iacute;nh năng bổ sung kh&aacute;c của thiết bị bao gồm chụp ảnh HDR thời gian thực, chế độ l&agrave;m đẹp n&acirc;ng cao v&agrave; nh&atilde;n d&aacute;n AR.</p>\r\n', 10),
(29, 'Samsungg', 0, 1, 1, '<p>d</p>\r\n', 10),
(31, 'b', 0, 1, 1, '<p>b</p>\r\n', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_groups`
--

CREATE TABLE `product_groups` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `groups_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `images_id` int(11) NOT NULL,
  `avatar` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `products_id`, `images_id`, `avatar`, `status`) VALUES
(57, 1, 69, 1, 1),
(58, 3, 70, 1, 1),
(59, 3, 71, 0, 1),
(60, 4, 72, 1, 1),
(61, 5, 73, 1, 1),
(66, 6, 78, 1, 1),
(67, 7, 79, 1, 1),
(68, 8, 80, 1, 1),
(69, 9, 81, 1, 1),
(70, 10, 82, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_specifications`
--

CREATE TABLE `product_specifications` (
  `id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `specifications_id` int(11) NOT NULL,
  `options` int(11) NOT NULL,
  `price_option` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_specifications`
--

INSERT INTO `product_specifications` (`id`, `products_id`, `specifications_id`, `options`, `price_option`) VALUES
(204, 29, 13, 0, 90000),
(205, 29, 19, 0, 90000),
(206, 29, 23, 0, 90000),
(207, 29, 28, 0, 90000),
(208, 29, 45, 0, 90000),
(209, 29, 44, 0, 90000),
(210, 29, 43, 0, 90000),
(211, 29, 41, 0, 90000),
(212, 29, 38, 0, 90000),
(215, 31, 13, 0, 100000),
(217, 31, 14, 2, 80000),
(218, 31, 19, 0, 100000),
(220, 31, 20, 2, 80000),
(221, 31, 23, 0, 100000),
(223, 31, 24, 2, 80000),
(224, 31, 27, 0, 100000),
(226, 31, 28, 2, 80000),
(227, 31, 45, 0, 100000),
(229, 31, 45, 2, 80000),
(230, 31, 44, 0, 100000),
(232, 31, 44, 2, 80000),
(233, 31, 43, 0, 100000),
(235, 31, 43, 2, 80000),
(236, 31, 41, 0, 100000),
(238, 31, 42, 2, 80000),
(239, 31, 38, 0, 100000),
(241, 31, 39, 2, 80000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_details_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `role_details_id`, `users_id`) VALUES
(8, 0, 1),
(11, 2, 1),
(13, 1, 32),
(14, 1, 56);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_details`
--

CREATE TABLE `role_details` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_details`
--

INSERT INTO `role_details` (`id`, `name`) VALUES
(0, 'Administrator'),
(1, 'User'),
(2, 'system');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `specifications`
--

CREATE TABLE `specifications` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `specifications`
--

INSERT INTO `specifications` (`id`, `name`, `parent_id`) VALUES
(3, 'Screen', 0),
(13, '15 inch', 3),
(14, '11 inch', 3),
(15, '12 inch', 3),
(16, '13 inch', 3),
(18, 'OS', 0),
(19, 'Android', 18),
(20, 'IOS', 18),
(21, 'Ram', 0),
(22, 'Rom', 0),
(23, '6gb', 21),
(24, '3gb', 21),
(25, '2gb', 21),
(26, '1gb', 21),
(27, '8gb', 22),
(28, '16gb', 22),
(29, '32gb', 22),
(30, '64gb', 22),
(31, '128gb', 22),
(32, 'battery', 0),
(33, 'cpu', 0),
(35, 'weight', 0),
(36, 'Rear camera', 0),
(37, 'Front camera', 0),
(38, '15MP', 37),
(39, '8MP', 37),
(40, '13MP', 37),
(41, '5MP', 36),
(42, '2MP', 36),
(43, '100', 35),
(44, 'Qualcomm Snapdragon 450 8 nhân 64-bit', 33),
(45, '3000', 32);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subaddress`
--

CREATE TABLE `subaddress` (
  `id` int(11) NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `default_address` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subaddress`
--

INSERT INTO `subaddress` (`id`, `address`, `users_id`, `default_address`) VALUES
(13, 'Hà Nội', 28, 0),
(15, 'Hà Nội', 32, 1),
(16, 'Quốc Oai', 32, 0),
(17, 'quốc Oai', 32, 0),
(18, 'Quốc Oai- Hà Nội', 33, 0),
(19, 'Hà Nội', 34, 0),
(20, 'ha noi', 35, 0),
(21, 'Quốc Oai-Hà Nội', 36, 0),
(22, 'ha noi', 37, 0),
(23, 'ha noi', 38, 0),
(24, 'ha noi', 39, 0),
(25, 'ha noi', 40, 0),
(26, 'ha noi', 41, 0),
(27, 'ha noi', 42, 0),
(28, 'ha noi', 43, 0),
(29, 'ha noi', 44, 0),
(30, 'ha noi', 45, 0),
(31, 'ha noi', 46, 0),
(32, 'ha noi', 47, 0),
(33, 'ha noi', 48, 0),
(34, 'ha noi', 49, 0),
(35, 'ha noi', 50, 0),
(36, 'ha noi', 51, 0),
(37, 'ha noi', 52, 0),
(38, 'ha noi', 53, 0),
(39, 'ha noi', 54, 0),
(40, 'ha noi', 55, 0),
(42, 'Hà Nội', 56, 1),
(45, 'Thạch thất', 56, 0),
(46, 'Thạch thất', 57, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `sex`, `birthday`, `phonenumber`, `address`) VALUES
(1, 'hoangnguyenit98@gmail.com', '202cb962ac59075b964b07152d234b70', 'Nguyễn Đình Hoàng', 0, '1998-09-03', '984554856', 'Hà Nội'),
(28, '', '', 'Nguyễn Đình Hoàng', 0, '0000-00-00', '0981056713', ''),
(32, 'ng.hoang9898@gmail.com', '202cb962ac59075b964b07152d234b70', 'Nguyễn Đình Hoàng', 1, '1998-09-03', '0981056713', ''),
(33, '', '', 'Hoang ND', 0, '0000-00-00', '0984554856', ''),
(34, '', '', 'Hoang Nguyễn đình', 0, '0000-00-00', '0981056713', ''),
(35, '', '', 'hoang nd', 0, '0000-00-00', '0984554856', ''),
(36, '', '', 'Hoàng Nguyến', 0, '0000-00-00', '0984554856', ''),
(37, '', '', 'HoangND', 0, '0000-00-00', '0984554856', ''),
(38, '', '', 'HoangND', 0, '0000-00-00', '0984554856', ''),
(39, '', '', 'HoangND', 0, '0000-00-00', '0984554856', ''),
(40, '', '', 'HoangND', 0, '0000-00-00', '0984554856', ''),
(41, '', '', 'HoangND', 0, '0000-00-00', '0984554856', ''),
(42, '', '', 'HoangND', 0, '0000-00-00', '0984554856', ''),
(43, '', '', 'HoangND', 0, '0000-00-00', '0984554856', ''),
(44, '', '', 'HoangND', 0, '0000-00-00', '0984554856', ''),
(45, '', '', 'HoangND', 0, '0000-00-00', '0984554856', ''),
(46, '', '', 'HoangND', 0, '0000-00-00', '0984554856', ''),
(47, '', '', 'HoangND', 0, '0000-00-00', '0984554856', ''),
(48, '', '', 'HoangND', 0, '0000-00-00', '0984554856', ''),
(49, '', '', 'hoang nd', 0, '0000-00-00', '0984554856', ''),
(50, '', '', 'HoangND', 0, '0000-00-00', '0984554856', ''),
(51, '', '', 'HoangND', 0, '0000-00-00', '0984554856', ''),
(52, '', '', 'HoangND', 0, '0000-00-00', '0984554856', ''),
(53, '', '', 'HoangND', 0, '0000-00-00', '0984554856', ''),
(54, '', '', 'HoangND', 0, '0000-00-00', '0984554856', ''),
(55, '', '', 'HoangND', 0, '0000-00-00', '0984554856', ''),
(56, 'hoangnguyen@gmail.com', '202cb962ac59075b964b07152d234b70', 'Hoàng', 1, '1998-09-03', '0981056713', ''),
(57, '', '', 'Hoàng', 0, '0000-00-00', '0981056713', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`subaddress_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orderdetails_ordersid` (`orders_id`),
  ADD KEY `fk_orderdetails_productsid` (`products_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categries_id` (`categories_id`);

--
-- Chỉ mục cho bảng `product_groups`
--
ALTER TABLE `product_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`products_id`),
  ADD KEY `fk_productgroups_groupsid` (`groups_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id` (`products_id`),
  ADD KEY `images_id` (`images_id`);

--
-- Chỉ mục cho bảng `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_specifications_specificationsid` (`specifications_id`),
  ADD KEY `fk_product_specifications_productsid` (`products_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_details_id` (`role_details_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Chỉ mục cho bảng `role_details`
--
ALTER TABLE `role_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `specifications`
--
ALTER TABLE `specifications`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subaddress`
--
ALTER TABLE `subaddress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT cho bảng `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT cho bảng `product_groups`
--
ALTER TABLE `product_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT cho bảng `product_specifications`
--
ALTER TABLE `product_specifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT cho bảng `specifications`
--
ALTER TABLE `specifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT cho bảng `subaddress`
--
ALTER TABLE `subaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_subaddress_id` FOREIGN KEY (`subaddress_id`) REFERENCES `subaddress` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_orderdetails_ordersid` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orderdetails_productsid` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categoriesid` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_groups`
--
ALTER TABLE `product_groups`
  ADD CONSTRAINT `fk_productgroups_groupsid` FOREIGN KEY (`groups_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_productgroups_productsid` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `fk_productimages_imagesid` FOREIGN KEY (`images_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_productimages_productsid` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_specifications`
--
ALTER TABLE `product_specifications`
  ADD CONSTRAINT `fk_product_specifications_productsid` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_product_specifications_specificationsid` FOREIGN KEY (`specifications_id`) REFERENCES `specifications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `fk_roles_role_details_id` FOREIGN KEY (`role_details_id`) REFERENCES `role_details` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_roles_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `subaddress`
--
ALTER TABLE `subaddress`
  ADD CONSTRAINT `fk_subadress_usersid` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
