-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2020 lúc 06:01 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `gym`
--
CREATE DATABASE IF NOT EXISTS `gym` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gym`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `BILL_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `DATE_PAYMENT` date NOT NULL,
  `PAYMENT` bit(1) NOT NULL DEFAULT b'0',
  `COURSE_ID` int(11) NOT NULL,
  `DISCOUNT` int(11) DEFAULT 0,
  `FEE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`BILL_ID`, `USER_ID`, `DATE_PAYMENT`, `PAYMENT`, `COURSE_ID`, `DISCOUNT`, `FEE`) VALUES
(1, 2, '2020-11-29', 1, 1, 0, 250000),
(2, 1, '2020-11-11', 0, 2, 20, 1500000),
(3, 3, '2020-09-15', 1, 1, 20, 200000),
(4, 3, '2020-10-15', 1, 1, 0, 250000),
(5, 3, '2020-10-15', 1, 2, 0, 1500000),
(6, 3, '2020-11-18', 1, 3, 0, 500000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `COURSE_ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `DESCRIPTION` varchar(1000) NOT NULL,
  `DATE` varchar(100) NOT NULL,
  `START_TIME` time(6) NOT NULL,
  `END_TIME` time(6) NOT NULL,
  `PLACE` varchar(100) NOT NULL,
  `AVAILABLE` int(11) NOT NULL,
  `SLOT` int(11) NOT NULL DEFAULT 0,
  `PAYMENT` bit(11) NOT NULL DEFAULT b'0',
  `PRICE` int(11) NOT NULL,
  `DISCOUNT` int(11) NOT NULL,
  `PT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`COURSE_ID`, `NAME`, `DESCRIPTION`, `DATE`, `START_TIME`, `END_TIME`, `PLACE`, `AVAILABLE`, `SLOT`, `PAYMENT`, `PRICE`, `DISCOUNT`, `PT_ID`) VALUES
(1, 'Yoga', 'af af af asfy 6tf y7yarf y8q7ty tq r iuehf qr  qeruh jer tuq jheg uq', '2-3-4', '18:00:00.000000', '20:00:00.000000', 'B209', 25, 5, b'00000000000', 250000, 0, 1),
(2, 'Gym', 'ad af a qr qw qw qriu qerigq iuq ru quirwhfiu hqquwriu hwue iuwhf iuwhf whef iuqhweiufh wiue', '3-4-5', '06:00:00.000000', '08:00:00.000000', 'C502', 5, 5, b'00000000000', 1500000, 0, 2),
(3, 'Fitness', 'qr q qeru fqueirgh uiergbje hibvi webgiuq ehrih hfq uohweu hq ', '2-4-6', '13:00:00.000000', '15:00:00.000000', 'G502', 50, 35, b'00000000000', 500000, 20, 3),
(4, 'Gym', 'af  yg uiguh wegy f j nveb jgqurih qu qgtqge qeb', '3-5-7', '09:00:00.000000', '11:00:00.000000', 'B545', 45, 5, b'00000000000', 1200000, 10, 4),
(5, 'Cardio Dance', 'af  yg uiguh wegy f j nveb jgqurih qu qgtqge qeb', '2-4-6', '18:00:00.000000', '20:00:00.000000', 'B401', 20, 1, b'00000000000', 350000, 0, 1);
-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `join_course`
--

CREATE TABLE `join_course` (
  `USER_ID` int(11) NOT NULL,
  `COURSE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `join_course`
--

INSERT INTO `join_course` (`USER_ID`, `COURSE_ID`) VALUES
(1, 2),
(1, 1),
(2, 2),
(3, 1),
(3, 2),
(3, 3),
(2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `STAFF_ID` int(11) NOT NULL,
  `ROLE` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `EMAIL` varchar(1000) NOT NULL,
  `PHONE` varchar(100) NOT NULL,
  `NATION` varchar(100) NOT NULL,
  `BIRTH` date NOT NULL,
  `IMAGE` varchar(1000) NOT NULL,
  `DESCRIPTION` varchar(1000) DEFAULT NULL,
  `PASSWORD` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`STAFF_ID`, `ROLE`, `NAME`, `EMAIL`, `PHONE`, `NATION`, `BIRTH`, `IMAGE`, `DESCRIPTION`,`PASSWORD`) VALUES
(1, 2, 'Lê Văn Mạnh', 'lvmanh@gmail.com', '511514145', 'Việt Nam', '1998-07-05', 'asset/images/staffs/1.svg', 'lorem isum lorem isum lorem isum lorem isum','e10adc3949ba59abbe56e057f20f883e'),
(2, 2, 'Nguyễn Thu Thủy', 'ntthuy@gmail.com', '4856975369', 'Việt Nam', '2000-11-04', 'asset/images/staffs/2.svg', 'lorem isum lorem isum lorem isum lorem isum','e10adc3949ba59abbe56e057f20f883e'),
(3, 2, 'Nguyễn Thu Hương', 'ntthuong@gmail.com', '4895768996', 'Việt Nam', '1998-08-07', 'asset/images/staffs/3.svg', 'loreaiuhf aif a jfb qtuq  jwb qug asdnfb  qwtb awef qw','e10adc3949ba59abbe56e057f20f883e'),
(4, 2, 'Cường Kiến Quốc', 'ckquoc@gmail.com', '485791352', 'Việt Nam', '1986-08-09', 'asset/images/staffs/4.svg', 'ads as r ert tr  owieh qeur uiqre  qwuh iqure qerhgh qeruhg uqierg qre','e10adc3949ba59abbe56e057f20f883e'),
(5, 3, 'Võ Tấn Sang', 'vtsang@gmail.com', '589657486', 'Việt Nam', '2000-11-23', 'asset/images/staffs/5.svg', 'asdfa adf asf a sdf  afa sdf','e10adc3949ba59abbe56e057f20f883e'),
(6, 5, 'Trương Thế Văn', 'ttvan@gmail.com', '49858942656', 'Việt Nam', '1985-08-09', 'asset/images/staffs/7.svg', NULL,'e10adc3949ba59abbe56e057f20f883e'),
(7, 1, 'Nguyện Nhật Cường', 'nncuong@gmail.com', '46499656587', 'Việt Nam', '2020-11-13', 'asset/images/staffs/8.svg', NULL,'e10adc3949ba59abbe56e057f20f883e'),
(8, 1, 'Đoàn Đức', 'dduc@gmail.com', '78956546816', 'Việt Nam', '1985-08-09', 'asset/images/staffs/9.svg', NULL,'e10adc3949ba59abbe56e057f20f883e'),
(9, 4, 'Nguyễn Ánh', 'nanh@gmail.com', '4869746454868', 'Việt Nam', '1955-07-09', 'asset/images/staffs/10.svg', NULL,'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PHONE` varchar(20) NOT NULL,
  `NATION` varchar(100) NOT NULL,
  `BIRTH` date NOT NULL,
  `IMAGE` varchar(1000) DEFAULT NULL,
  `PASSWORD` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`USER_ID`, `USERNAME`, `NAME`, `EMAIL`, `PHONE`, `NATION`, `BIRTH`, `IMAGE`, `PASSWORD`) VALUES
(1, 'nnanh', 'Nguyễn Ngọc Ánh', 'nnanh@gmail.com', '0908981211', 'Việt Nam', '1990-11-24', 'asset/images/customers/1.svg','e10adc3949ba59abbe56e057f20f883e'),
(2, 'nmhung', 'Nguyễn Mạnh Hùng', 'nmhung@gmail.com', '0908089814', 'Việt Nam', '1995-11-06', NULL,'e10adc3949ba59abbe56e057f20f883e'),
(3, 'ngthhang', 'Nguyễn Thuý Hằng', 'ngthhang@gmail.com', '0908089811', 'Việt Nam', '2000-10-09', 'asset/images/customers/3.svg','e10adc3949ba59abbe56e057f20f883e');
--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`BILL_ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `COURSE_ID` (`COURSE_ID`);

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`COURSE_ID`),
  ADD KEY `PT_ID` (`PT_ID`);

--
-- Chỉ mục cho bảng `join_course`
--
ALTER TABLE `join_course`
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `COURSE_ID` (`COURSE_ID`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`STAFF_ID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `BILL_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `COURSE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `STAFF_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `FK_ID1` FOREIGN KEY (`COURSE_ID`) REFERENCES `course` (`COURSE_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID2` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `FK_ID6` FOREIGN KEY (`PT_ID`) REFERENCES `staff` (`STAFF_ID`);

--
-- Các ràng buộc cho bảng `join_course`
--
ALTER TABLE `join_course`
  ADD CONSTRAINT `FK_ID4` FOREIGN KEY (`COURSE_ID`) REFERENCES `course` (`COURSE_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ID5` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
