-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 22, 2024 lúc 05:38 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `chothuexe`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `idbinhluan` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idcar` int(11) NOT NULL,
  `noidung` varchar(200) NOT NULL,
  `danhgia` int(10) NOT NULL,
  `thoigian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`idbinhluan`, `iduser`, `idcar`, `noidung`, `danhgia`, `thoigian`) VALUES
(4, 14, 15, 'Xe ok lắm', 4, '2024-03-20 05:12:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cars`
--

CREATE TABLE `cars` (
  `idcar` int(11) NOT NULL,
  `namecar` varchar(30) NOT NULL,
  `bienso` varchar(30) NOT NULL,
  `soghe` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `namecompany` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cars`
--

INSERT INTO `cars` (`idcar`, `namecar`, `bienso`, `soghe`, `quantity`, `price`, `namecompany`) VALUES
(15, 'Xe001                         ', 'BS3232', 9, 0, 10000, 'VNV'),
(17, 'bbb', 'bc11', 4, 44, 1111, 'Vinfact'),
(18, 'mmmm', 'bv', 7, 4, 11111, 'Honda'),
(19, 'VV', 'vv44', 9, 112, 1000, 'Vinfact'),
(25, 'm', 'bs12', 7, 2, 122, 'Vinfact'),
(26, 'bbbb                          ', 'bs1', 7, 4, 1000, 'Honda'),
(27, 'AS', 'BSA', 4, 2, 11111, 'Update');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `idchitiet` int(11) NOT NULL,
  `idhoadon` int(11) NOT NULL,
  `idcar` int(11) NOT NULL,
  `ngaygiothue` datetime NOT NULL,
  `ngaygiotra` datetime NOT NULL,
  `traxe` int(1) NOT NULL,
  `ghichu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`idchitiet`, `idhoadon`, `idcar`, `ngaygiothue`, `ngaygiotra`, `traxe`, `ghichu`) VALUES
(1, 2, 15, '2024-03-21 19:19:15', '2024-03-21 19:19:15', 0, 0),
(4, 3, 15, '2024-03-20 02:12:25', '2024-03-21 20:12:25', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `company`
--

CREATE TABLE `company` (
  `idcompany` int(11) NOT NULL,
  `namecompany` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `company`
--

INSERT INTO `company` (`idcompany`, `namecompany`) VALUES
(20, 'ABC'),
(21, 'adsf'),
(23, 'adsfads'),
(25, 'dsa'),
(9, 'Honda'),
(26, 'N'),
(11, 'Update'),
(1, 'Vinfact'),
(22, 'VNV');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `idhoadon` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `thoigian` datetime NOT NULL,
  `tongtien` int(11) NOT NULL,
  `thanhtoan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`idhoadon`, `iduser`, `thoigian`, `tongtien`, `thanhtoan`) VALUES
(2, 14, '2024-03-12 23:48:40', 10000, 1),
(3, 15, '2024-03-21 19:00:51', 2000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `sdt` int(10) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`iduser`, `fullname`, `email`, `password`, `sdt`, `role`) VALUES
(14, 'Đặng Bá Chí', 'chidb.21it@vku.udn.vn', '202cb962ac59075b964b07152d234b70', 1234567890, 1),
(15, 'Hồ Sỹ Vinh', 'vinh@gmail.com', '202cb962ac59075b964b07152d234b70', 1123333333, 0),
(16, 'A', 'a@gmail.com', '202cb962ac59075b964b07152d234b70', 1234567890, 0),
(17, 'B', 'b@gmail.com', '202cb962ac59075b964b07152d234b70', 1234567890, 0),
(18, 'C', 'c@gmail.com', '202cb962ac59075b964b07152d234b70', 1234567890, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`idbinhluan`),
  ADD KEY `iduser` (`iduser`),
  ADD KEY `idcar` (`idcar`);

--
-- Chỉ mục cho bảng `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`idcar`),
  ADD KEY `namecompany` (`namecompany`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`idchitiet`),
  ADD KEY `idhoadon` (`idhoadon`),
  ADD KEY `idcar` (`idcar`);

--
-- Chỉ mục cho bảng `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`idcompany`),
  ADD KEY `namecompany` (`namecompany`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`idhoadon`),
  ADD KEY `iduser` (`iduser`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `idbinhluan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cars`
--
ALTER TABLE `cars`
  MODIFY `idcar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `idchitiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `company`
--
ALTER TABLE `company`
  MODIFY `idcompany` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `idhoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_2` FOREIGN KEY (`idcar`) REFERENCES `cars` (`idcar`),
  ADD CONSTRAINT `binhluan_ibfk_3` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);

--
-- Các ràng buộc cho bảng `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`namecompany`) REFERENCES `company` (`namecompany`);

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`idhoadon`) REFERENCES `hoadon` (`idhoadon`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`idcar`) REFERENCES `cars` (`idcar`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
