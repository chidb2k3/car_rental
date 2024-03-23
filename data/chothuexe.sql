-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 23, 2024 lúc 02:18 PM
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
(26, 20, 30, 'Xe đẹp thế', 5, '2024-03-23 14:14:04');

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
(30, 'BMS', 'B1', 7, 8, 10000, 'Chevrolet'),
(31, 'MK', 'MK001', 4, 12, 30000, 'Ford'),
(32, 'MA', 'MA013', 7, 10, 900, 'Honda'),
(33, 'IG', 'LP0', 13, 11, 100, 'Hyundai'),
(34, 'MD', 'LP02', 9, 2, 1000, 'Isuzu'),
(35, 'FT', 'LP1', 4, 12, 500, 'Kia'),
(36, 'LP', 'KI8', 7, 12, 1567, 'Lexus'),
(37, 'FL', 'LH7', 4, 15, 500, 'Mazda'),
(38, 'LR', 'KY6', 4, 12, 1777, 'Nissan'),
(39, 'KD', 'LO1', 7, 10, 10000, 'Suzuki'),
(40, 'FF', 'LF01', 13, 12, 12444, 'Suzuki'),
(41, 'LL', 'LW1', 9, 2, 1233, 'Hyundai'),
(42, 'JJK', 'LO01', 7, 12, 10000, 'Honda'),
(43, 'PLD', 'K0', 7, 12, 1500, 'Lexus'),
(44, 'KP', 'KP1', 13, 15, 1000, 'Toyota');

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
(24, 42, 30, '2024-03-23 20:14:00', '2024-03-31 20:14:00', 0, 2);

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
(28, 'Chevrolet'),
(29, 'Ford'),
(30, 'Honda'),
(31, 'Hyundai'),
(32, 'Isuzu'),
(34, 'Kia'),
(35, 'Lexus'),
(36, 'Mazda'),
(37, 'Nissan'),
(33, 'Suzuki'),
(27, 'Toyota');

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
(42, 20, '2024-03-23 14:14:28', 3840000, 0);

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
(14, 'Admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 1234567890, 1),
(20, 'Hiếu', 'hieu@gmail.com', '202cb962ac59075b964b07152d234b70', 1234567809, 0);

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
  MODIFY `idbinhluan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `cars`
--
ALTER TABLE `cars`
  MODIFY `idcar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `idchitiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `company`
--
ALTER TABLE `company`
  MODIFY `idcompany` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `idhoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
