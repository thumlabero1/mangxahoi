-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 28, 2022 lúc 07:44 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mangxahoi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `id` int(11) NOT NULL,
  `tieude` varchar(255) NOT NULL,
  `ngaydang` datetime NOT NULL,
  `noidung` text NOT NULL,
  `hinhanh` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `ten` varchar(255) NOT NULL,
  `luotlike` int(11) NOT NULL,
  `luotbinhluan` int(11) NOT NULL,
  `luotchiase` int(11) NOT NULL,
  `anhdaidien` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`id`, `tieude`, `ngaydang`, `noidung`, `hinhanh`, `email`, `ten`, `luotlike`, `luotbinhluan`, `luotchiase`, `anhdaidien`) VALUES
(1, 'công nghệ', '2022-12-25 13:52:35', 'Cách vẽ trên Google Slides\r\nGoogle Slides là một công cụ thuyết trình dựa trên web cho phép bạn tạo và xuất bản các bài thuyết trình mà không cần cài đặt bất kỳ thứ gì trên máy tính. Google Slides đi kèm với nhiều tính năng tích hợp sẵn, bao gồm khả năng vẽ trên slide.\r\n\r\nSử dụng tính năng này, bạn có thể vẽ đồ họa của riêng mình trên các slide mà không cần phải rời khỏi Google Slides. Ngoài ra, nếu bạn đang muốn tạo các bản vẽ phức tạp, bạn cũng có thể vẽ trong Google Drawings, sau đó nhập tác phẩm từ Google Drawings vào Google Slides. Hãy đọc tiếp để tìm hiểu thêm về cách vẽ trong Google Slides!', 'congnghe1.jpg', 'phannhatlinh@gmail.com', 'Linh Phan', 79, 32, 47, 'linh.jpg'),
(2, 'đời sống', '2022-12-26 08:13:39', '“Còn trẻ không được đi học là còn dạy”\r\n\r\nLớp học tình thương Bình Thung được Đoàn phường Bình An chính thức thành lập vào năm 2005. Trải qua nhiều thăng trầm, có thời điểm phải giải tán nhưng lớp học đã duy trì được hơn 10 năm và cho chữ cho nhiều thế hệ học sinh.', 'doisong.jpg', 'trannhonhoa@gmail.com', 'Trần Nhơn Hòa', 43, 8, 30, 'nhonhoa.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ngaydang` datetime NOT NULL,
  `noidung` text NOT NULL,
  `baivietid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sodienthoai` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loai` tinyint(4) NOT NULL DEFAULT 3,
  `trangthai` tinyint(4) NOT NULL DEFAULT 1,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `email`, `sodienthoai`, `matkhau`, `hoten`, `loai`, `trangthai`, `hinhanh`) VALUES
(1, 'phamtay@gmail.com', '0988994683', '202cb962ac59075b964b07152d234b70', 'Phạm Điền Tây', 3, 1, 'Untitled.png'),
(2, 'tranykhoa@gmail.com', '0988994684', '202cb962ac59075b964b07152d234b70', 'Trần Y Khoa', 1, 1, NULL),
(3, 'tranvankhoa@gmail.com', '0988994685', '202cb962ac59075b964b07152d234b70', 'Trần Văn Khoa', 2, 1, NULL),
(4, 'trannhonhoa@gmail.com', '0988994686', '202cb962ac59075b964b07152d234b70', 'Trần Nhơn Hòa', 3, 1, NULL),
(5, 'nguyentruonggiang@gmail.com', '0988994687', '202cb962ac59075b964b07152d234b70', 'Nguyễn Trường Giang', 3, 1, NULL),
(6, 'trankhanhkha@gmail.com', '1234567890', '202cb962ac59075b964b07152d234b70', 'Trần Khánh kha', 3, 1, NULL),
(7, 'nguyenphucminh@gmail.com', '1234567891', '202cb962ac59075b964b07152d234b70', 'Nguyễn Phúc Minh', 3, 1, NULL),
(8, 'huynhvanhuy@gmail.com', '1234567892', '202cb962ac59075b964b07152d234b70', 'Huỳnh Văn Huy', 3, 1, NULL),
(9, 'phamtrieuvi@gmail.com', '1234567893', '202cb962ac59075b964b07152d234b70', 'Phạm Triệu Vĩ', 3, 1, NULL),
(10, 'huynhngockhanh@gmail.com', '1234567894', '202cb962ac59075b964b07152d234b70', 'Huỳnh Ngọc Khánh', 3, 1, NULL),
(11, 'phannhatlinh@gmail.com', '0333932506', '202cb962ac59075b964b07152d234b70', 'Phan Nhật Linh', 3, 1, 'linh.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `baivietid` (`baivietid`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`baivietid`) REFERENCES `binhluan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
