-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 30, 2021 lúc 09:31 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`) VALUES
(1, 'test', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `customerid`, `productid`, `date`, `content`, `status`) VALUES
(1, 1, 1, '2021-05-05 12:01:00', 'dsgds', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phonenumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `fullname`, `phonenumber`, `email`, `address`, `status`) VALUES
(1, 'test', 'e10adc3949ba59abbe56e057f20f883e', 'random', '0123456789', '', '', 1),
(2, 'test2', 'e10adc3949ba59abbe56e057f20f883e', 'test', '0123456789', 'viet.nh.945@aptechlearning.edu.vn', '73 ÄÆ°á»ng SÆ°Æ¡ng Nguyá»‡t Anh, PhÆ°á»ng Pháº¡m NgÅ© LÃ£o, Quáº­n 1, ThÃ nh phá»‘ Há»“ ChÃ­ Minh, Viá»‡t Nam', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `productid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`productid`, `orderid`, `number`, `price`) VALUES
(1, 1, 2, 40000),
(4, 1, 4, 50000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ordermethod`
--

CREATE TABLE `ordermethod` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ordermethod`
--

INSERT INTO `ordermethod` (`id`, `name`, `status`) VALUES
(1, 'Trực tiếp cho người giao hàng', 1),
(2, 'Chuyển khoản', 1),
(3, 'Thanh toán tại shop', 1),
(4, 'Paypal', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `ordermethodid` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `orderdate` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1: Chưa xử lí\r\n2: Đang xử lí\r\n3: Đã xử lí\r\n4:Hủy',
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `ordermethodid`, `memberid`, `orderdate`, `status`, `name`, `address`, `mobile`, `email`, `note`) VALUES
(1, 1, 1, '2021-05-07 16:50:08', 1, 'test', 'Hà Nội', '0124523532', NULL, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `producttypeid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `image`, `description`, `producttypeid`, `status`) VALUES
(1, 'Cam Sấy Khô 1kg', 40000, 'c1-247x300.jpg', '<h1>Cam Sấy Kh&ocirc; 1 kg</h1>\r\n\r\n<p><del>350,000&nbsp;VNĐ</del>&nbsp;<ins>250,000&nbsp;VNĐ</ins></p>\r\n\r\n<p>Cam sấy kh&ocirc; 1 kg chỉ 250k.&nbsp;Việc sử dụng cam sấy kh&ocirc; thường xuy&ecirc;n kh&ocirc;ng chỉ gi&uacute;p bạn tăng cường thể lực, miễn dịch m&agrave; c&ograve;n nhiều t&aacute;c dụng kh&aacute;c. Cam được th&aacute;i l&aacute;t mỏng v&agrave; được sấy kh&ocirc;, k&iacute;ch thước đều, vị ngọt thanh, m&agrave;u cam v&agrave;ng thơm.</p>\r\n', 4, 1),
(2, '[Quả]Đậu Hà Lan', 30000, 'dau-ha-lan-1-247x300.jpg', '<h1>[ QUẢ&nbsp;] ĐẬU H&Agrave; LAN</h1>\r\n\r\n<p>40,000&nbsp;VNĐ</p>\r\n\r\n<table style=\"width:520px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Xuất xứ</td>\r\n			<td><strong>MARU DRY FRUIT</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Th&agrave;nh Phần</td>\r\n			<td><strong>Đậu&nbsp;h&agrave; lan, muối, dầu thực vật.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&aacute;ch d&ugrave;ng</td>\r\n			<td><strong>D&ugrave;ng sản phẩm trực tiếp.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bảo quản</td>\r\n			<td><strong>Nơi tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp. Khi sửa dụng c&oacute; thể kh&ocirc;ng sử dụng hết, cần bảo quản trong tủ lạnh để giữ nguy&ecirc;n chất lượng sản phẩm.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hạn d&ugrave;ng</td>\r\n			<td><strong>3&nbsp;th&aacute;ng kể từ ng&agrave;y sản xuất. V&igrave; sản phẩm ho&agrave;n to&agrave;n kh&ocirc;ng c&oacute; chất bảo quản.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 3, 1),
(3, '[Quả]Chuối Sấy', 250000, 'DSC_4101-1-247x300.jpg', '<h1>[QUẢ]CHUỐI SẤY</h1>\r\n	<table>\r\n<tbody>\r\n<tr>\r\n<td>Xuất xứ</td>\r\n<td><strong>MARU DRY FRUITS</strong></td>\r\n</tr>\r\n<tr>\r\n<td>Thành Phần</td>\r\n<td><strong>Chuối, dầu thực vật.</strong></td>\r\n</tr>\r\n<tr>\r\n<td>Cách dùng</td>\r\n<td><strong>Dùng sản phẩm trực tiếp.</strong></td>\r\n</tr>\r\n<tr>\r\n<td>Bảo quản</td>\r\n<td><strong>Nơi thoáng mát, tránh ánh nắng trực tiếp. Khi sửa dụng có thể không sử dụng hết, cần bảo quản trong tủ lạnh để giữ nguyên chất lượng sản phẩm.</strong></td>\r\n</tr>\r\n<tr>\r\n<td>Hạn dùng</td>\r\n<td><strong>3 tháng kể từ ngày sản xuất. Vì sản phẩm hoàn toàn không có chất bảo quản.</strong></td>\r\n</tr>\r\n<tr>\r\n<td>Khối lượng</td>\r\n<td><strong>500G</strong></td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 1),
(4, 'Mít Sấy 500g', 50000, 'mit-say-247x300.jpg', '<h1>MÍT SẤY</h1>\r\n<p>30,000&nbsp;VNĐ</p>\r\n\r\n<table style=\"width:520px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Xuất xứ</td>\r\n			<td><strong>MARU DRY FRUITS</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Th&agrave;nh Phần</td>\r\n			<td><strong>M&iacute;t 99%, dầu cọ 1%.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&aacute;ch d&ugrave;ng</td>\r\n			<td><strong>D&ugrave;ng sản phẩm trực tiếp.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bảo quản</td>\r\n			<td><strong>Nơi tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp. Khi sửa dụng c&oacute; thể kh&ocirc;ng sử dụng hết, cần bảo quản trong tủ lạnh để giữ nguy&ecirc;n chất lượng sản phẩm.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hạn d&ugrave;ng</td>\r\n			<td><strong>3&nbsp;th&aacute;ng kể từ ng&agrave;y sản xuất. V&igrave; sản phẩm ho&agrave;n to&agrave;n kh&ocirc;ng c&oacute; chất bảo quản.</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 1),
(5, 'Đậu Phộng Da Cá Cốt Dừa', 45000, 'dau-da-ca-1-247x300.png', '<h1>ĐẬU PHỘNG DA CÁ CỐT DỪA</h1>\r\n<p>45,000&nbsp;VNĐ</p>\r\n\r\n<table style=\"width:520px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Xuất xứ</td>\r\n			<td><strong>MARU DRY FRUITS</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Th&agrave;nh Phần</td>\r\n			<td><strong>Đậu phộng, bột mỳ, nước cốt dừa, dầu cọ.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&aacute;ch d&ugrave;ng</td>\r\n			<td><strong>D&ugrave;ng sản phẩm trực tiếp.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bảo quản</td>\r\n			<td><strong>Nơi tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp. Khi sửa dụng c&oacute; thể kh&ocirc;ng sử dụng hết, cần bảo quản trong tủ lạnh để giữ nguy&ecirc;n chất lượng sản phẩm.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hạn d&ugrave;ng</td>\r\n			<td><strong>3&nbsp;th&aacute;ng kể từ ng&agrave;y sản xuất. V&igrave; sản phẩm ho&agrave;n to&agrave;n kh&ocirc;ng c&oacute; chất bảo quản.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khối lượng</td>\r\n			<td><strong>250G</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 3, 1),
(6, 'Khoai lang vàng 500g', 80000, 'fffffffff-247x300.jpg', '<h1>KHOAI LANG VÀNG 500g</h1>\r\n<p><del>85,000&nbsp;VNĐ</del>&nbsp;<ins>80,000&nbsp;VNĐ</ins></p>\r\n\r\n<table style=\"width:520px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Xuất xứ</td>\r\n			<td><strong>MARU DRY FRUITS</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Th&agrave;nh Phần</td>\r\n			<td><strong>Khoai lang v&agrave;ng, dầu thực vật.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&aacute;ch d&ugrave;ng</td>\r\n			<td><strong>D&ugrave;ng sản phẩm trực tiếp.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bảo quản</td>\r\n			<td><strong>Nơi tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp. Khi sửa dụng c&oacute; thể kh&ocirc;ng sử dụng hết, cần bảo quản trong tủ lạnh để giữ nguy&ecirc;n chất lượng sản phẩm.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hạn d&ugrave;ng</td>\r\n			<td><strong>3&nbsp;th&aacute;ng kể từ ng&agrave;y sản xuất. V&igrave; sản phẩm ho&agrave;n to&agrave;n kh&ocirc;ng c&oacute; chất bảo quản.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khối lượng</td>\r\n			<td><strong>500G</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 1),
(7, 'Dứa (Thơm) Sấy Khô', 230000, 'duasay2-copy-247x300.jpg', '<h1>DỨA (THƠM) SẤY KHÔ</h1>\r\n<p><del>250,000&nbsp;VNĐ</del>&nbsp;<ins>230,000&nbsp;VNĐ</ins></p>\r\n', 4, 1),
(8, 'Khoai Môn Sấy 500g', 90000, 'DSC_4088-247x300.jpg', '<h1>KHOAI M&Ocirc;N SẤY 500G</h1>\r\n\r\n<p>90,000&nbsp;VNĐ</p>\r\n\r\n<table style=\"width:520px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Xuất xứ</td>\r\n			<td><strong>MARU DRY FRUITS</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Th&agrave;nh Phần</td>\r\n			<td><strong>Khoai m&ocirc;n,&nbsp;dầu thực vật.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&aacute;ch d&ugrave;ng</td>\r\n			<td><strong>D&ugrave;ng sản phẩm trực tiếp.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bảo quản</td>\r\n			<td><strong>Nơi tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp. Khi sửa dụng c&oacute; thể kh&ocirc;ng sử dụng hết, cần bảo quản trong tủ lạnh để giữ nguy&ecirc;n chất lượng sản phẩm.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hạn d&ugrave;ng</td>\r\n			<td><strong>3&nbsp;th&aacute;ng kể từ ng&agrave;y sản xuất. V&igrave; sản phẩm ho&agrave;n to&agrave;n kh&ocirc;ng c&oacute; chất bảo quản.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khối lượng</td>\r\n			<td><strong>500G</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 1),
(9, 'Khoai Lang TÍm 500g', 80000, 'DSC_4126-247x300.jpg', '<h1>KHOAI LANG T&Iacute;M 500G</h1>\r\n\r\n<p><del>85,000&nbsp;VNĐ</del>&nbsp;<ins>80,000&nbsp;VNĐ</ins></p>\r\n\r\n<table style=\"width:520px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Xuất xứ</td>\r\n			<td><strong>MARU DRY FRUITS</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Th&agrave;nh Phần</td>\r\n			<td><strong>Khoai lang t&iacute;m, dầu thực vật.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&aacute;ch d&ugrave;ng</td>\r\n			<td><strong>D&ugrave;ng sản phẩm trực tiếp.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bảo quản</td>\r\n			<td><strong>Nơi tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp. Khi sửa dụng c&oacute; thể kh&ocirc;ng sử dụng hết, cần bảo quản trong tủ lạnh để giữ nguy&ecirc;n chất lượng sản phẩm.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hạn d&ugrave;ng</td>\r\n			<td><strong>3&nbsp;th&aacute;ng kể từ ng&agrave;y sản xuất. V&igrave; sản phẩm ho&agrave;n to&agrave;n kh&ocirc;ng c&oacute; chất bảo quản.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khối lượng</td>\r\n			<td><strong>500G</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 1),
(10, 'Khoai Sấy 500g', 85000, 'DSC_4079-1-247x300.jpg', '<h1>KHOAI SẤY 500G</h1>\r\n\r\n<p>85,000&nbsp;VNĐ</p>\r\n\r\n<table style=\"width:520px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Xuất xứ</td>\r\n			<td><strong>MARU DRY FRUITS</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Th&agrave;nh Phần</td>\r\n			<td><strong>Khoai lang t&iacute;m, khoai lang v&agrave;ng, khoai m&ocirc;n, dầu thực vật.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&aacute;ch d&ugrave;ng</td>\r\n			<td><strong>D&ugrave;ng sản phẩm trực tiếp.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bảo quản</td>\r\n			<td><strong>Nơi tho&aacute;ng m&aacute;t, tr&aacute;nh &aacute;nh nắng trực tiếp. Khi sửa dụng c&oacute; thể kh&ocirc;ng sử dụng hết, cần bảo quản trong tủ lạnh để giữ nguy&ecirc;n chất lượng sản phẩm.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Hạn d&ugrave;ng</td>\r\n			<td><strong>3&nbsp;th&aacute;ng kể từ ng&agrave;y sản xuất. V&igrave; sản phẩm ho&agrave;n to&agrave;n kh&ocirc;ng c&oacute; chất bảo quản.</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td>Khối lượng</td>\r\n			<td><strong>500G</strong></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `producttype`
--

CREATE TABLE `producttype` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `producttype`
--

INSERT INTO `producttype` (`id`, `name`, `status`) VALUES
(1, 'Hoa quả sấy giòn', 1),
(2, 'Hoa quả sấy dẻo', 1),
(3, 'Hạt sấy', 1),
(4, 'Trà thảo mộc', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_ibfk_1` (`productid`),
  ADD KEY `customerid` (`customerid`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`number`),
  ADD KEY `productid` (`productid`),
  ADD KEY `orderid` (`orderid`);

--
-- Chỉ mục cho bảng `ordermethod`
--
ALTER TABLE `ordermethod`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producttypeid` (`producttypeid`);

--
-- Chỉ mục cho bảng `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `ordermethod`
--
ALTER TABLE `ordermethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `producttype`
--
ALTER TABLE `producttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`customerid`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`producttypeid`) REFERENCES `producttype` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
