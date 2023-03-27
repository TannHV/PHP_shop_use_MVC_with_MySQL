-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 21, 2023 lúc 07:47 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `mabl` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaybl` datetime NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`mabl`, `mahh`, `makh`, `ngaybl`, `noidung`) VALUES
(1, 1, 1, '2023-03-13 04:04:00', 'tdsada'),
(2, 1, 1, '2023-03-13 04:04:05', 'sdadsa'),
(3, 43, 3, '2023-03-13 04:11:22', 'dsa'),
(4, 43, 3, '2023-03-13 04:11:26', 'sdada');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `creditcard`
--

CREATE TABLE `creditcard` (
  `IdCard` int(11) NOT NULL,
  `NameOnCard` varchar(50) NOT NULL,
  `CardNumber` varchar(16) NOT NULL,
  `CVV` varchar(6) NOT NULL,
  `Balance` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `creditcard`
--

INSERT INTO `creditcard` (`IdCard`, `NameOnCard`, `CardNumber`, `CVV`, `Balance`) VALUES
(1, 'HA DUC TAM', '1234567890123456', '123456', 22053000),
(2, 'DO LONG VU', '9876543210987654', '654321', 13706000),
(3, 'NG PHAN VAN HUY', '9876543210123456', '987654', 18500000),
(4, 'NG QUOC THANH', '1234567890987654', '456789', 17500000),
(5, 'PAY WITHOUT LOGIN', '1111111111111111', '111111', 80048000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `masohd` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `thoihan` varchar(20) NOT NULL,
  `thanhtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`masohd`, `mahh`, `soluongmua`, `thoihan`, `thanhtien`) VALUES
(1, 10, 1, '1 năm', 1000000),
(1, 16, 1, '1 tháng', 25000),
(1, 39, 1, 'Vĩnh viễn Win 10', 2500000),
(2, 13, 1, '1 năm', 199000),
(2, 45, 1, '1 tháng', 99000),
(3, 4, 1, 'Gia hạn 6 tháng', 159000),
(3, 37, 1, 'Vĩnh viễn Win 10', 290000),
(4, 18, 1, '1 năm', 190000),
(4, 20, 1, '15 ngày', 40000),
(4, 23, 1, 'Vĩnh viễn', 70000),
(5, 9, 1, '1 tháng', 119000),
(5, 15, 1, 'Vĩnh viễn', 199000),
(6, 21, 1, '1 năm', 490000),
(6, 47, 1, '1 tháng', 359000),
(6, 53, 1, 'Vĩnh viễn 200', 170000),
(6, 54, 1, 'Vĩnh viễn 10$', 275000),
(7, 43, 1, 'Gia hạn 1 năm', 299000),
(8, 9, 1, '1 tháng', 119000),
(9, 1, 1, '1 tháng', 29000),
(10, 3, 1, '1 tháng', 19000),
(11, 30, 1, 'Vĩnh viễn', 70000),
(11, 59, 1, 'Vĩnh viễn 50$', 1250000),
(12, 6, 1, '6 tháng', 259000),
(12, 27, 1, 'Vĩnh viễn', 188000),
(13, 16, 1, '1 tháng', 25000),
(13, 32, 1, 'Vĩnh viễn', 519000),
(14, 39, 3, 'Vĩnh viễn Win 10', 7500000),
(15, 1, 1, '1 tháng', 29000),
(16, 13, 1, '1 năm', 199000),
(17, 17, 1, 'gia hạn 1 năm', 490000),
(18, 1, 1, '1 tháng', 29000),
(18, 3, 1, '1 tháng', 19000),
(18, 8, 2, '2  tháng', 720000),
(19, 40, 3, 'Vĩnh viễn Win 11', 7500000),
(20, 3, 1, '1 tháng', 19000),
(21, 4, 1, 'Gia hạn 6 tháng', 159000),
(22, 7, 1, '1 tháng', 210000),
(23, 3, 1, '1 tháng', 19000),
(24, 5, 1, '1 tháng', 29000),
(25, 4, 1, 'Gia hạn 6 tháng', 159000),
(26, 3, 1, '1 tháng', 19000),
(27, 3, 1, '1 tháng', 19000),
(28, 21, 1, '1 năm', 490000),
(30, 3, 2, '1 tháng', 38000),
(30, 4, 1, 'Gia hạn 6 tháng', 159000),
(30, 8, 1, '2  tháng', 360000),
(31, 1, 1, '   1 tháng', 29000),
(32, 1, 50, '   1 tháng', 1450000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon_temp`
--

CREATE TABLE `cthoadon_temp` (
  `masohd` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `thoihan` varchar(20) NOT NULL,
  `thanhtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cthoadon_temp`
--

INSERT INTO `cthoadon_temp` (`masohd`, `mahh`, `soluongmua`, `thoihan`, `thanhtien`) VALUES
(12, 3, 1, '1 tháng', 19000),
(12, 7, 1, '1 tháng', 210000),
(12, 11, 1, 'Vĩnh viễn Standard', 599000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `madg` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaydg` date NOT NULL,
  `rate` int(10) NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`madg`, `mahh`, `makh`, `ngaydg`, `rate`, `noidung`) VALUES
(3, 43, 3, '2023-03-13', 5, 'very good\r\n'),
(4, 21, 2, '2023-03-13', 5, ''),
(5, 9, 2, '2023-03-13', 5, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `mahh` int(11) NOT NULL,
  `tenhh` varchar(60) NOT NULL,
  `dongia` float NOT NULL,
  `giamgia` float NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `maloai` int(11) NOT NULL,
  `dacbiet` bit(1) NOT NULL,
  `soluotxem` int(11) NOT NULL,
  `ngaylap` date NOT NULL,
  `mota` varchar(2000) NOT NULL,
  `soluongton` int(11) NOT NULL,
  `thoihan` varchar(20) NOT NULL,
  `rate` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`mahh`, `tenhh`, `dongia`, `giamgia`, `hinh`, `maloai`, `dacbiet`, `soluotxem`, `ngaylap`, `mota`, `soluongton`, `thoihan`, `rate`) VALUES
(1, 'Tài Khoản Netflix Premium', 280000, 29000, 'Netflix-1u-1tg.jpg', 1, b'1', 59, '2022-12-10', 'Xem phim chất lượng 4k và Full HD', 50, '    1 tháng', 0),
(2, 'Tài Khoản Netflix Premium', 1560000, 539000, 'Netflix-1u-6tg.jpg', 1, b'1', 20, '2022-12-10', 'Xem phim chất lượng 4k và Full HD', 0, '6 tháng', 0),
(3, 'Tài khoản nghe nhạc Spotify Premium', 59000, 19000, 'Spotify-1-Thang.jpg', 2, b'1', 31, '2022-12-10', 'Chất lượng nhạc của Spotify luôn đạt mức cao và tốc độ tải dữ liệu nhanh.', 48, '1 tháng', 0),
(4, 'Gói gia hạn Spotify Premium', 590000, 159000, 'Spotify-6-Thang.jpg', 2, b'1', 35, '2022-12-10', 'Chất lượng nhạc của Spotify luôn đạt mức cao và tốc độ tải dữ liệu nhanh.', 49, 'Gia hạn 6 tháng', 0),
(5, 'Gia hạn YouTube Premium', 280000, 29000, 'YOUTUBE NO ADS 1 THANG.png', 3, b'1', 15, '2022-12-10', 'Bạn có thể xem hàng triệu video không có quảng cáo', 50, '1 tháng', 0),
(6, 'Gia hạn YouTube Premium', 3360000, 259000, 'YOUTUBE NO ADS 6 THANG.png', 3, b'1', 22, '2022-12-10', 'Bạn có thể xem hàng triệu video không có quảng cáo', 50, '6 tháng', 0),
(7, 'Nâng cấp Tài khoản Zoom Pro', 350000, 210000, 'Zoom-Pro-1-thang.jpg', 4, b'1', 9, '2022-12-10', ' Zoom có những tính năng vượt trội so với các phần mềm khác.', 50, '1 tháng', 0),
(8, 'Nâng cấp Tài khoản Zoom Pro', 700000, 360000, 'Zoom-Pro-2-thang.jpg', 4, b'1', 8, '2022-12-10', ' Zoom có những tính năng vượt trội so với các phần mềm khác.', 49, '2  tháng', 0),
(9, 'Discord Nitro', 250000, 119000, 'Nitro-1-Thang.jpg', 5, b'1', 29, '2022-12-10', 'gói nâng cấp của Discord cho phép bạn được hưởng nhiều lợi ích hấp hẫn từ Discord', 50, '1 tháng', 5),
(10, 'Discord Nitro', 3000000, 1000000, 'Nitro-1-Nam.jpg', 5, b'1', 9, '2022-12-10', 'gói nâng cấp của Discord cho phép bạn được hưởng nhiều lợi ích hấp hẫn từ Discord', 50, '1 năm', 0),
(11, 'Tài khoản Doodly Standard vĩnh viễn', 4800000, 599000, 'Doodly-Standard-Vinh-Vien.png', 6, b'1', 9, '2022-12-10', 'phần mềm làm video hoạt hình được nhiệt liệt đề cử cho những người chưa có kinh nghiệm', 50, 'Vĩnh viễn Standard', 0),
(12, 'Tài khoản Doodly Enterprise vĩnh viễn', 6800000, 990000, 'Doodly Enterprise.png', 6, b'1', 5, '2022-12-10', 'phần mềm làm video hoạt hình được nhiệt liệt đề cử cho những người chưa có kinh nghiệm', 50, 'Vĩnh viễn Enterprise', 0),
(13, 'Tài khoản Wondershare Filmora 11', 900000, 199000, 'Filmora-1-Nam.jpg', 7, b'1', 6, '2022-12-10', 'có ưu điểm lớn đó là tạo nên những hướng dẫn đơn giản và dễ bắt chước, và người dùng không cần phải tích lũy nhiều kiến thức', 50, '1 năm', 0),
(14, 'Tài khoản Wondershare Filmora 11', 2500000, 390000, 'Filmora-Vinh-Vien.jpg', 7, b'1', 5, '2022-12-10', 'có ưu điểm lớn đó là tạo nên những hướng dẫn đơn giản và dễ bắt chước, và người dùng không cần phải tích lũy nhiều kiến thức', 50, 'Vĩnh viễn', 0),
(15, 'Tài khoản GitHub Student Developer Pack', 500000, 199000, 'GitHub Student Developer Pack.jpg', 8, b'1', 16, '2022-12-10', 'cho bạn rất nhiều lợi ích đến từ các partners của GitHub như VS Code, Microsoft Azure, Heroku, MongoDB...', 50, 'Vĩnh viễn', 0),
(16, 'Tài khoản Canva', 150000, 25000, 'Canvas 1 thang.png', 9, b'1', 5, '2022-12-10', ' chứa đầy đủ tài nguyên thiết kế miễn phí mà bạn có thể sử dụng ngay từ bên trong ứng dụng', 50, '1 tháng', 0),
(17, 'Gói gia hạn Canva', 3000000, 490000, 'Canva-1-Nam.png', 9, b'1', 6, '2022-12-10', ' chứa đầy đủ tài nguyên thiết kế miễn phí mà bạn có thể sử dụng ngay từ bên trong ứng dụng', 50, 'gia hạn 1 năm', 0),
(18, 'Tài khoản học ngoại ngữ Duolingo', 1800000, 190000, 'Duolingo-Gia Han-1nam.jpg', 10, b'1', 5, '2022-12-10', 'Với tài khoản Duolingo Plus, bạn sẽ không gặp quảng cáo khi học.', 50, '1 năm', 0),
(19, 'Gói gia hạn Duolingo', 1800000, 490000, 'Duolingo-1-Nam.jpg', 10, b'1', 5, '2022-12-10', 'Với tài khoản Duolingo Plus, bạn sẽ không gặp quảng cáo khi học.', 50, 'Gia hạn 1 năm', 0),
(20, 'Tài khoản Grammarly Premium', 40000, 0, 'Grammarly Premium 15 ngay.png', 11, b'0', 15, '2022-12-10', 'một công cụ hỗ trợ kiểm tra ngữ pháp tiếng Anh, giúp người viết tiếng Anh tự tin viết tiếng Anh ', 50, '15 ngày', 0),
(21, 'Tài khoản Grammarly Premium', 1500000, 490000, 'Grammarly-Premium-1-Nam.png', 11, b'1', 15, '2022-12-10', 'một công cụ hỗ trợ kiểm tra ngữ pháp tiếng Anh, giúp người viết tiếng Anh tự tin viết tiếng Anh ', 50, '1 năm', 5),
(22, 'Khóa học Coursera', 150000, 0, 'Coursera.jpg', 12, b'0', 5, '2022-12-10', 'Một nền tảng học tập tốt và chất lượng chắc chắn là những lý do khiến bạn đưa ra quyết định sở hữu nhanh hơn.', 50, 'Vĩnh viễn', 0),
(23, 'Agrou', 70000, 0, 'Agrou.jpg', 13, b'0', 53, '2022-12-10', 'Là một tựa game Indie mới được ra mắt trong thời gian gần đây', 50, '  Vĩnh viễn', 0),
(24, 'Borderlands 2', 334000, 0, 'Borderlands 2.jpg', 14, b'0', 5, '2022-12-10', 'tựa game hành động bắn súng góc nhìn thứ nhất được phát triển bởi Gearbox Software và phát hành bởi 2K Games', 50, 'Vĩnh viễn', 0),
(25, 'Grand Theft Auto V - GTA V', 456000, 227000, 'Grand Theft Auto V.jpg', 15, b'1', 15, '2022-12-10', 'là trò chơi video được phát triển bởi Rockstar North thuộc hãng Rockstar Games.', 50, 'Vĩnh viễn', 0),
(26, 'Dying Light Enhanced Edition', 329000, 0, 'Dying Light Enhanced Edition.jpg', 16, b'0', 5, '2022-12-10', 'Trò chơi là một tựa game sinh tồn lấy đề tài zombie cực kỳ ấn tượng của Techland,', 50, 'Vĩnh viễn', 0),
(27, 'Slime Rancher', 188000, 0, 'SlimeRancher.jpg', 17, b'0', 5, '2022-12-10', 'Vào vai Beatrix LeBeau: một chủ trang trại trẻ tuổi, may mắn, người bắt đầu cuộc sống cách xa Trái đất một nghìn năm ánh sáng trên ‘Far, Far Range.’', 50, 'Vĩnh viễn', 0),
(28, 'Wallpaper Engine', 70000, 0, 'Wallpaper-engine.jpg', 18, b'0', 25, '2022-12-10', 'Làm cho hình nền của bạn sống động hơn với đồ họa thực tế, videos, ứng dụng hoặc websites.', 50, 'Vĩnh viễn', 0),
(29, 'Rust', 510000, 0, 'Rust.jpg', 19, b'0', 5, '2022-12-10', 'một game sinh tồn chỉ có chế độ multiplayer, “Rust” là sản phẩm sẽ quẳng bạn vào một môi trường tự nhiên với một nhiệm vụ duy nhất là làm sao để sống sót được lâu', 50, 'Vĩnh viễn', 0),
(30, 'Ori and the Blind Forest: Definitive Edition', 70000, 0, 'Ori and the Blind Forest.jpg', 20, b'0', 30, '2022-12-10', 'Bản tình ca Ori and the Blind Forest kể về một đứa trẻ mồ côi được định sẵn cho các anh hùng, thông qua một Action-Platformer trực quan tuyệt đẹp được chế tạo bởi Moon Studios', 50, 'Vĩnh viễn', 0),
(31, 'Battlefield 1 Revolution', 1000000, 0, 'bf1.jpg', 21, b'0', 5, '2022-12-10', 'Là tựa game bắn súng góc nhìn thứ nhất được phát triển bởi EA DICE và được phát hành bởi Electronic Arts.', 50, 'Vĩnh viễn', 0),
(32, 'Battlefield 3', 519000, 0, 'bf3.jpg', 22, b'0', 5, '2022-12-10', 'Battlefield 3 bao gồm cả chiến dịch chơi đơn và hợp tác và có tính năng chơi nhiều người chơi tương tự như Battlefield 2 cổ điển', 50, 'Vĩnh viễn', 0),
(33, 'Battlefield 4 - Origin', 500000, 0, 'bf4.jpg', 23, b'0', 25, '2022-12-10', 'Với Engine đồ họa Frostbite, Battlefield 4 sẽ khoác lên mình một lớp áo hào nhoáng với những hiệu ứng vật lí như va chạm, cháy nổ cũng như hình ảnh chân thực', 50, 'Vĩnh viễn', 0),
(34, 'Battlefield 5 - Origin', 950000, 99000, 'bf5.jpg', 24, b'1', 5, '2022-12-10', 'Battlefield V là phiên bản thứ 16 trong series game Battlefield.', 50, 'Vĩnh viễn', 0),
(35, 'Titanfall™ 2 Ultimate Edition', 790000, 0, 'ttf2.jpg', 25, b'0', 5, '2022-12-10', 'Titanfall 2 được xây dựng trên một nền tảng đầy vững chắc, trong đó là một hệ thống di chuyển tự do đầy mượt mà và chỉn chu', 50, 'Vĩnh viễn', 0),
(36, 'It Takes Two (Origin)', 750000, 0, 'ittake2.jpg', 26, b'0', 51, '2022-12-10', 'Hãy bắt đầu và tham gia vào cuộc hành trình điên rồ nhất trong cuộc đời mà bạn có thể tưởng tượng được trong It Takes Two', 50, ' Vĩnh viễn', 0),
(37, 'Windows 10 Professional CD Key', 400000, 290000, 'windows-10-pro.jpg', 27, b'1', 5, '2022-12-10', 'key Retail bản quyền cho Windows 10 ', 50, 'Vĩnh viễn Win 10', 0),
(38, 'Windows 11 Professional CD Key', 400000, 290000, 'Windows-11-Pro.jpg', 27, b'1', 5, '2022-12-10', 'key Retail bản quyền cho Windows 11 ', 50, 'Vĩnh viễn  Win 11', 0),
(39, 'Windows 10 Professional DSP OEI DVD (Full VAT)', 4000000, 2500000, 'Windows-10-Professional-Full-VAT.jpg', 28, b'1', 31, '2022-12-10', 'Đĩa DVD Windows 10 Professional - Chính hãng Microsoft', 50, 'Vĩnh viễn Win 10', 0),
(40, 'Windows 11 Professional DSP OEI DVD (Full VAT)', 4000000, 2500000, 'Windows-11-Professional-Full-VAT.jpg', 28, b'1', 6, '2022-12-10', 'Đĩa DVD Windows 11 Professional - Chính hãng Microsoft', 50, 'Vĩnh viễn Win 11', 0),
(41, 'Microsoft Office 2019 Professional Plus', 9500000, 290000, 'Microsoft-Office-2019-Professional-Plus.jpg', 29, b'1', 15, '2022-12-10', 'Microsoft Office là bộ sưu tập phần mềm dùng để phục vụ các công việc văn phòng', 50, 'Vĩnh viễn 2019', 0),
(42, 'Microsoft Office 2021 Professional Plus', 11500000, 349000, 'Microsoft-Office-2021-Professional-Plus.jpg', 29, b'1', 5, '2022-12-10', 'Microsoft Office là bộ sưu tập phần mềm dùng để phục vụ các công việc văn phòng', 50, 'Vĩnh viễn 2021', 0),
(43, 'Gói gia hạn Google One 100GB - 5 thành viên', 450000, 299000, 'Google One 100gb-1nam.png', 30, b'1', 29, '2022-12-10', 'Google One là dịch vụ cung cấp bộ nhớ lưu trữ đám mây mà bạn phải trả phí hàng tháng và bạn có thể mở rộng sử dụng trên Google Drive, Gmail và Google Photos', 50, 'Gia hạn 1 năm', 5),
(44, 'Gói gia hạn Google One 400GB - 1 thành viên', 1380000, 390000, 'Google One 400gb-1nam.png', 30, b'1', 5, '2022-12-10', 'Google One là dịch vụ cung cấp bộ nhớ lưu trữ đám mây mà bạn phải trả phí hàng tháng và bạn có thể mở rộng sử dụng trên Google Drive, Gmail và Google Photos', 50, 'Gia hạn 1 năm ', 0),
(45, 'Tài khoản Google Drive 100GB', 980000, 99000, 'Google Drive 100gb-vv.png', 31, b'1', 5, '2022-12-10', 'Với tài khoản Google Drive tại Divine Shop khách hàng được cung cấp dung lượng sử dụng lớn với mức phí ưu đãi', 50, '1 tháng', 0),
(46, 'Tài khoản Google Drive 200GB', 1380000, 169000, 'Google Drive 200gb-vv.png', 31, b'1', 5, '2022-12-10', 'Với tài khoản Google Drive tại Divine Shop khách hàng được cung cấp dung lượng sử dụng lớn với mức phí ưu đãi', 50, '1 tháng', 0),
(47, 'Tài khoản Google Drive 500GB', 3450000, 359000, 'Google Drive 500gb-vv.png', 31, b'1', 7, '2022-12-10', 'Với tài khoản Google Drive tại Divine Shop khách hàng được cung cấp dung lượng sử dụng lớn với mức phí ưu đãi', 50, '1 tháng', 4),
(48, 'Steam Wallet Code 100 TWD', 355000, 0, 'STEAM 100 HKD.png', 32, b'0', 5, '2022-12-10', 'Steam Wallet Code là dạng mã thẻ Steam Wallet dưới dạng code online dùng để nạp tiền mua game Steam', 50, 'Vĩnh viễn 100', 0),
(49, 'Steam Wallet Code 200 TWD', 655000, 0, 'STEAM 200 HKD.png', 32, b'0', 5, '2022-12-10', 'Steam Wallet Code là dạng mã thẻ Steam Wallet dưới dạng code online dùng để nạp tiền mua game Steam', 50, 'Vĩnh viễn 200', 0),
(50, 'Steam Wallet Code 300 TWD', 990000, 0, 'STEAM 300 HKD.png', 32, b'0', 5, '2022-12-10', 'Steam Wallet Code là dạng mã thẻ Steam Wallet dưới dạng code online dùng để nạp tiền mua game Steam', 50, 'Vĩnh viễn 300', 0),
(51, 'Steam Wallet Code 400 TWD', 1300000, 0, 'STEAM 400 HKD.png', 32, b'0', 5, '2022-12-10', 'Steam Wallet Code là dạng mã thẻ Steam Wallet dưới dạng code online dùng để nạp tiền mua game Steam', 50, 'Vĩnh viễn  400', 0),
(52, 'Steam Wallet Code 100 TWD', 89000, 0, 'STEAM 100 TWD.png', 33, b'0', 30, '2022-12-10', 'Steam Wallet Code là dạng mã thẻ Steam Wallet dưới dạng code online dùng để nạp tiền mua game Steam', 50, 'Vĩnh viễn  100', 0),
(53, 'Steam Wallet Code 200 TWD', 170000, 0, 'STEAM 200 TWD.png', 33, b'0', 5, '2022-12-10', 'Steam Wallet Code là dạng mã thẻ Steam Wallet dưới dạng code online dùng để nạp tiền mua game Steam', 50, 'Vĩnh viễn 200', 0),
(54, 'iTunes Gift Card 10 USD', 275000, 0, 'iTunes 10.png', 34, b'0', 25, '2022-12-10', 'iTune Gift Card là một loại card trả trước của Apple (như thẻ điện thoại) dùng để nạp vào tài khoản iTunes', 50, 'Vĩnh viễn 10$', 0),
(55, 'iTunes Gift Card 25 USD', 670000, 0, 'iTunes 25.png', 34, b'0', 5, '2022-12-10', 'iTune Gift Card là một loại card trả trước của Apple (như thẻ điện thoại) dùng để nạp vào tài khoản iTunes', 50, 'Vĩnh viễn 25$', 0),
(56, 'iTunes Gift Card 50 USD', 1300000, 0, 'iTunes 50.png', 34, b'0', 5, '2022-12-10', 'iTune Gift Card là một loại card trả trước của Apple (như thẻ điện thoại) dùng để nạp vào tài khoản iTunes', 50, 'Vĩnh viễn 50$', 0),
(57, 'XBox - Microsoft Gift Card 10$', 250000, 0, 'XBox 10.png', 35, b'0', 6, '2022-12-10', 'bạn có thể dùng để thanh toán trên Window Store, Window phone Store....', 50, 'Vĩnh viễn 10$', 0),
(58, 'XBox - Microsoft Gift Card 25$', 625000, 0, 'XBox 25.png', 35, b'0', 5, '2022-12-10', 'bạn có thể dùng để thanh toán trên Window Store, Window phone Store....', 50, 'Vĩnh viễn 25$', 0),
(59, 'XBox - Microsoft Gift Card 50$', 1250000, 0, 'XBox 50.png', 35, b'0', 5, '2022-12-10', 'bạn có thể dùng để thanh toán trên Window Store, Window phone Store....', 50, 'Vĩnh viễn 50$', 0),
(60, 'Gia hạn YouTube Premium', 6700000, 490000, 'YOUTUBE NO ADS 12 THANG.png', 3, b'1', 62, '2022-12-14', 'Với YouTube Premium, bạn có thể xem hàng triệu video không có quảng cáo. Quảng cáo bao gồm cả quảng cáo trước và trong video cũng như quảng cáo biểu ngữ, quảng cáo đi kèm kết quả tìm kiếm và quảng cáo lớp phủ trên video. Bạn vẫn có thể xem quảng cáo hoặc thương hiệu nhúng trong nội dung của người sáng tạo mà YouTube không kiểm soát.', 0, '1 năm', 0),
(61, 'XBox - Microsoft Gift Card 5$', 130000, 0, 'XBox 5.png', 35, b'0', 0, '2023-02-27', 'This is a new product.', 25, 'Vĩnh viễn 5$', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `masohd` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaydat` datetime NOT NULL,
  `tongtien` int(11) NOT NULL,
  `tinhtrang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`masohd`, `makh`, `ngaydat`, `tongtien`, `tinhtrang`) VALUES
(1, 1, '2023-01-27 10:08:54', 3525000, 'Success'),
(2, 1, '2023-01-27 17:20:15', 298000, 'Paid'),
(3, 1, '2023-01-27 17:33:48', 449000, 'Paid'),
(4, 1, '2023-01-27 17:34:21', 300000, 'Paid'),
(5, 2, '2023-01-28 02:39:31', 318000, 'Paid'),
(6, 2, '2023-01-28 02:42:59', 1294000, 'Paid'),
(7, 3, '2023-01-28 02:49:38', 299000, 'Paid'),
(8, 1, '2023-01-28 07:07:03', 119000, 'Paid'),
(9, 6, '2023-01-28 16:28:44', 344000, 'Paid'),
(10, 6, '2023-01-28 16:52:29', 538000, 'Paid'),
(11, 1, '2023-01-29 08:01:40', 1320000, 'Paid'),
(12, 1, '2023-01-29 08:02:16', 447000, 'Paid'),
(13, 1, '2023-01-29 09:03:17', 544000, 'Paid'),
(14, 1, '2023-01-29 09:04:00', 7500000, 'Paid'),
(15, 1, '2023-02-01 12:30:21', 29000, 'Paid'),
(16, 1, '2023-02-01 12:46:40', 199000, 'Paid'),
(17, 1, '2023-02-01 12:47:24', 490000, 'Paid'),
(18, 1, '2023-02-06 01:22:12', 768000, 'Paid'),
(19, 1, '2023-02-06 04:07:22', 7500000, 'Paid'),
(20, 1, '2023-02-06 04:07:32', 19000, 'Paid'),
(21, 7, '2023-01-29 08:20:28', 899000, 'Paid'),
(22, 7, '2023-02-06 04:09:24', 210000, 'Paid'),
(23, 8, '2023-01-28 16:19:30', 184000, 'Paid'),
(24, 8, '2023-01-28 16:22:28', 1099000, 'Paid'),
(25, 8, '2023-01-29 08:03:10', 159000, 'Paid'),
(26, 8, '2023-01-29 08:13:50', 108000, 'Paid'),
(27, 8, '2023-01-29 09:01:04', 19000, 'Paid'),
(28, 8, '2023-02-06 01:12:35', 490000, 'Paid'),
(30, 1, '2023-03-13 02:30:25', 557000, 'Paid'),
(31, 3, '2023-03-13 04:10:40', 29000, 'Paid'),
(32, 1, '2023-03-13 04:18:19', 1450000, 'Paid');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon_temp`
--

CREATE TABLE `hoadon_temp` (
  `masohd` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaydat` datetime NOT NULL,
  `tongtien` int(11) NOT NULL,
  `tinhtrang` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon_temp`
--

INSERT INTO `hoadon_temp` (`masohd`, `makh`, `ngaydat`, `tongtien`, `tinhtrang`) VALUES
(12, 4, '2023-03-04 18:36:01', 828000, 'Success');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` int(11) NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi` text NOT NULL,
  `sodu` int(20) NOT NULL,
  `sodienthoai` varchar(12) NOT NULL,
  `vaitro` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `matkhau`, `email`, `diachi`, `sodu`, `sodienthoai`, `vaitro`) VALUES
(1, 'Hà Đức Tâm', '325a2cc052914ceeb8c19016c091d2ac', 'dtam3002@gmail.com', '15 Trịnh Đình Thảo, Hòa Thạnh, Tân Phú, TP.HCM', 4679000, '0961597025', 1),
(2, 'Long Vũ', '325a2cc052914ceeb8c19016c091d2ac', 'LongVu@gmail.vn', '12 Trịnh Đình Thảo, Hòa Thạnh, Tân Phú, TP.HCM', 1182000, '0987654321', 1),
(3, 'Văn Huy', 'a80349f984f2c2e432f953f6f6eca1f8', 'VanHuy123@gmai.vn', '12 Trịnh Đình Thảo, Hòa Thạnh, Tân Phú, TP.HCM', 1172000, '0962137604', 0),
(4, 'Quốc Thành', 'a80349f984f2c2e432f953f6f6eca1f8', 'quocthanh@mail.vn', '12 Trịnh Đình Thảo, Hòa Thạnh, Tân Phú, TP.HCM', 0, '0933847902', 0),
(5, 'Thái Vinh', '325a2cc052914ceeb8c19016c091d2ac', 'thaivinh@qibu.jp', '12 Trịnh Đình Thảo, Hòa Thạnh, Tân Phú, TP.HCM', 0, '0976543218', 0),
(6, 'Phước Thọ', 'a80349f984f2c2e432f953f6f6eca1f8', 'phuoctho@it.fl.com', '12 Trịnh Đình Thảo, Hòa Thạnh, Tân Phú, TP.HCM', 0, '0988664488', 0),
(7, 'Minh Trường', '3e6c7d141e32189c917761138b026b74', 'truong@sln.com', '12 Trịnh Đình Thảo, Hòa Thạnh, Tân Phú, TP.HCM', 0, '0966884488', 0),
(8, 'Lữ Tiến Đạt ', 'a80349f984f2c2e432f953f6f6eca1f8', 'tiendat123@gmail.vn', '12 Trịnh Đình Thảo, Hòa Thạnh, Tân Phú, TP.HCM', 0, '0962134555', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang_temp`
--

CREATE TABLE `khachhang_temp` (
  `makh` int(11) NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi` text NOT NULL,
  `sodienthoai` varchar(12) NOT NULL,
  `solanmua` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang_temp`
--

INSERT INTO `khachhang_temp` (`makh`, `tenkh`, `email`, `diachi`, `sodienthoai`, `solanmua`) VALUES
(4, 'Test', 'test1234@gmail.vn', '12 Trịnh Đình Thảo, Hòa Thạnh, Tân Phú, TP.HCM', '09572130000', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(50) NOT NULL,
  `idmenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`, `idmenu`) VALUES
(1, 'Netflix', 2),
(2, 'Spotify', 2),
(3, 'Youtube', 2),
(4, 'Zoom', 3),
(5, 'Discord', 3),
(6, 'Doodly', 3),
(7, 'Filmora', 3),
(8, 'GitHub', 3),
(9, 'Canva', 3),
(10, 'Duolingo', 4),
(11, 'Grammarly', 4),
(12, 'Coursera', 4),
(13, 'Agrou', 5),
(14, 'Borderlands2', 5),
(15, 'GTAV', 5),
(16, 'DyingLight', 5),
(17, 'SlimeRancher', 5),
(18, 'Wallpaper-engine', 5),
(19, 'Rust', 5),
(20, 'OriandtheBlind ', 5),
(21, 'btf1', 6),
(22, 'btf3', 6),
(23, 'btf4', 6),
(24, 'btf5', 6),
(25, 'ttf2', 6),
(26, 'ittaketwo', 6),
(27, 'CDKey', 7),
(28, 'DVDFullVAT', 7),
(29, 'Office', 7),
(30, 'GiaHan', 8),
(31, 'VinhVien', 8),
(32, 'HKD', 9),
(33, 'TWD', 9),
(34, 'iTunes', 10),
(35, 'XBox', 10),
(37, 'Test1', 2),
(38, 'Test2', 2),
(39, 'Test3', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `idmenu` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `link` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`idmenu`, `name`, `link`) VALUES
(1, 'Trang Chủ', 'index.php'),
(2, 'Entertainment', 'View/Entertainment.php'),
(3, 'Work', 'View/Work.php'),
(4, 'Learn', 'View/Learn.php'),
(5, 'Game Steam', 'View/GameSteam.php'),
(6, 'Origin', 'View/Origin.php'),
(7, 'Windows', 'View/Windows.php'),
(8, 'Drive', 'View/Drive.php'),
(9, 'Wallet', 'View/Wallet.php'),
(10, 'iTunes', 'View/iTunes.php'),
(11, 'Liên Hệ', 'View/lienhe.php'),
(12, 'Tài Khoản', 'View/gioithieu.php');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `spyeuthich`
--

CREATE TABLE `spyeuthich` (
  `makh` int(11) NOT NULL,
  `mahh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `spyeuthich`
--

INSERT INTO `spyeuthich` (`makh`, `mahh`) VALUES
(3, 9),
(3, 7),
(2, 3),
(2, 6);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`mabl`),
  ADD KEY `fk_bl_mahh` (`mahh`),
  ADD KEY `fk_bl_kh` (`makh`);

--
-- Chỉ mục cho bảng `creditcard`
--
ALTER TABLE `creditcard`
  ADD PRIMARY KEY (`IdCard`);

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`masohd`,`mahh`),
  ADD KEY `fk_cthd_mahh` (`mahh`);

--
-- Chỉ mục cho bảng `cthoadon_temp`
--
ALTER TABLE `cthoadon_temp`
  ADD PRIMARY KEY (`masohd`,`mahh`),
  ADD KEY `mahh` (`mahh`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`madg`),
  ADD KEY `dg_fk_mahh` (`mahh`),
  ADD KEY `dg_fk_makh` (`makh`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`mahh`),
  ADD KEY `FK_hanghoa_maloai` (`maloai`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`masohd`),
  ADD KEY `fk_hoadon_kh` (`makh`);

--
-- Chỉ mục cho bảng `hoadon_temp`
--
ALTER TABLE `hoadon_temp`
  ADD PRIMARY KEY (`masohd`),
  ADD KEY `makh` (`makh`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `khachhang_temp`
--
ALTER TABLE `khachhang_temp`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`),
  ADD KEY `FK_loai_menu` (`idmenu`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Chỉ mục cho bảng `spyeuthich`
--
ALTER TABLE `spyeuthich`
  ADD KEY `makh` (`makh`),
  ADD KEY `mahh` (`mahh`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `mabl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `creditcard`
--
ALTER TABLE `creditcard`
  MODIFY `IdCard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `madg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `mahh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `masohd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `hoadon_temp`
--
ALTER TABLE `hoadon_temp`
  MODIFY `masohd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `khachhang_temp`
--
ALTER TABLE `khachhang_temp`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `fk_bl_kh` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_bl_mahh` FOREIGN KEY (`mahh`) REFERENCES `hanghoa` (`mahh`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD CONSTRAINT `fk_cthd_mahd` FOREIGN KEY (`masohd`) REFERENCES `hoadon` (`masohd`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_cthd_mahh` FOREIGN KEY (`mahh`) REFERENCES `hanghoa` (`mahh`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `cthoadon_temp`
--
ALTER TABLE `cthoadon_temp`
  ADD CONSTRAINT `mahh` FOREIGN KEY (`mahh`) REFERENCES `hanghoa` (`mahh`) ON DELETE CASCADE,
  ADD CONSTRAINT `masohd` FOREIGN KEY (`masohd`) REFERENCES `hoadon_temp` (`masohd`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `dg_fk_mahh` FOREIGN KEY (`mahh`) REFERENCES `hanghoa` (`mahh`) ON DELETE CASCADE,
  ADD CONSTRAINT `dg_fk_makh` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD CONSTRAINT `FK_hanghoa_maloai` FOREIGN KEY (`maloai`) REFERENCES `loai` (`maloai`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_hoadon_kh` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `hoadon_temp`
--
ALTER TABLE `hoadon_temp`
  ADD CONSTRAINT `makh` FOREIGN KEY (`makh`) REFERENCES `khachhang_temp` (`makh`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `loai`
--
ALTER TABLE `loai`
  ADD CONSTRAINT `FK_loai_menu` FOREIGN KEY (`idmenu`) REFERENCES `menu` (`idmenu`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `spyeuthich`
--
ALTER TABLE `spyeuthich`
  ADD CONSTRAINT `spyeuthich_ibfk_1` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE,
  ADD CONSTRAINT `spyeuthich_ibfk_2` FOREIGN KEY (`mahh`) REFERENCES `hanghoa` (`mahh`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
