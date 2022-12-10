-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Sam 10 Décembre 2022 à 12:00
-- Version du serveur: 5.0.51
-- Version de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `phongkham`
--

-- --------------------------------------------------------

--
-- Structure de la table `bacsi`
--

CREATE TABLE `bacsi` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `anh` varchar(255) collate utf8_unicode_ci NOT NULL,
  `tenbs` varchar(255) collate utf8_unicode_ci NOT NULL,
  `password` varchar(100) collate utf8_unicode_ci NOT NULL,
  `username` varchar(100) collate utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(255) collate utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `sdt` int(10) NOT NULL,
  `linhvuc` varchar(255) collate utf8_unicode_ci NOT NULL,
  `chucvu` varchar(255) collate utf8_unicode_ci NOT NULL,
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) collate utf8_unicode_ci NOT NULL,
  `idck` int(11) NOT NULL,
  `phanquyen` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idck` (`idck`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=48 ;

--
-- Contenu de la table `bacsi`
--

INSERT INTO `bacsi` (`id`, `anh`, `tenbs`, `password`, `username`, `gioitinh`, `ngaysinh`, `sdt`, `linhvuc`, `chucvu`, `email`, `diachi`, `idck`, `phanquyen`) VALUES
(2, '2.jpg', 'Trần Mạnh Hùng', '0', '', 'Nam', '1975-08-08', 324567897, 'Khám bệnh, chữa bệnh ', 'Bác sĩ', 'hung@gmail.com', '20 Tô Ngọc Vân, Thành phố Thủ Đức', 1, 2),
(3, '1.jpg', 'Hoàng Thị Cúc', '0', '', 'Nữ', '1980-09-12', 987654321, 'Khám bệnh, chữa bệnh chuyên khoa Nhi', 'Bác sĩ', 'cuc@gmail.com', '14 Tam Bình, Thủ Đức', 2, 2),
(4, '4.jpg', 'Nguyễn Anh Duy', '0', '', 'Nam', '1987-09-28', 345723787, 'Khám bệnh, chữa bệnh chuyên khoa Nhi', 'Bác sĩ', 'duy@gmail.com', '89 Lê Đức Thọ, Gò Vấp, Thành phố Hồ Chí Minh', 2, 2),
(5, '5.jpg', 'Lê Ánh Nguyệt', '0', '', 'Nữ', '1986-08-08', 987890987, 'Khám bệnh, chữa bệnh chuyên khoa Nhi', 'Bác sĩ', 'nguyet@gmail.com', '45 Phạm Văng Đồng, Thủ Đức', 2, 2),
(6, '6.jpg', 'Trần Tiến', '0', '', 'Nam', '1977-12-12', 453423134, 'Khám bệnh, chữa bệnh chuyen khoa Tai Mũi Họng', 'Bác sĩ', 'tien@gmail.com', '71 Lê Quang Đinh, Bình Thạnh', 3, 0),
(7, '7.jpg', 'Nguyễn Thanh Thúy', '0', '', 'Nữ', '1977-08-28', 987876567, 'Khám bệnh, chữa bệnh chuyên khoa Nội', 'Bác sĩ', 'thuy@gmail.com', '900 Lê Lợi', 4, 0),
(8, '8.jpg', 'Trần Thị Thu Hằng', '0', '', 'Nữ', '1975-08-12', 999090909, 'Khám bệnh, chữa bệnh chuyên khoa Nội', 'Bác sĩ', 'hang@gmail.com', '11 Lê Lợi, Gò Vấp, Thành phố Hồ Chí Minh', 4, 0),
(9, '9.jpg', 'Nguyễn Công Minh', '0', '', 'Nam', '1975-08-17', 324567676, 'Khám bệnh, chữa bệnh chuyên khoa Xquang  Siêu âm chẩn đoán', 'Bác sĩ', 'minh@gmail.com', '33 Xô Viết Nghệ Tĩnh, Bình Thạnh', 5, 0),
(10, '10.jpg', 'Đỗ Thị Thu Hương', '0', '', 'Nữ', '1980-09-30', 325787878, 'Chuyên khoa xét nghiệm: Sinh hóa, Huyết học, Miễn dịch', 'Bác sĩ', 'huong@gmail.com', '890 Trần Hưng Đạo', 6, 0),
(11, '11.jpg', 'Nguyễn Phúc Hưng', 'e10adc3949ba59abbe56e057f20f883e', 'hung', 'Nam', '1986-07-27', 324567876, 'Khám bệnh, chữa bệnh chuyên khoa Ngoại', 'Bác sĩ', 'hung@gmail.com', '78 Kha Vạn Cân, Thành phố Thủ Đức', 7, 2),
(12, '12.jpg', 'Phạm Minh Tú', '0', '', 'Nữ', '1975-11-18', 989809878, 'Khám bệnh, chữa bệnh CK Răng hàm mặt', 'Bác sĩ', 'tu@gmail.com', '22 Lý Thường Kiệt', 8, 0),
(13, '13.jpg', 'Nguyễn Thị Thanh Phượng ', '0', '', 'Nữ', '1977-01-12', 325789009, 'Khám bệnh, chữa bệnh Y học cổ truyền, PHCN – Vật lý trị liệu', 'Bác sĩ', 'phuongtt@gmail.com', '55 Phú Châu, Tam Bình, Thành phố Thủ Đức', 9, 0),
(14, '14.jpg', 'Bùi Thị Lan', '0', '', 'Nữ', '1977-12-22', 324543212, 'Khám thai; Khám phụ khoa; Siêu âm sản phụ khoa', 'Bác sĩ', 'lan@gmail.com', '13 Bạch Đằng', 10, 0),
(15, '15.jpg', 'Đoàn Văn Hậu', '0', '', 'Nữ', '1981-12-25', 345678909, 'Khám bệnh, chữa bệnh chuyên khoa Da liễu', 'Bác sĩ', 'hau@gmail.com', '269 Linh Đông, Thành phố Thủ Đức', 11, 0),
(45, '18.jpg', 'Huỳnh Thị Xuân Đào', '123123', 'phan', 'Nữ', '2000-05-10', 374389835, 'khám bệnh cho trẻ em', 'Bác sĩ', 'phan@gmail.com', 'TG', 3, 2),
(47, '17.jpg', 'Hồng Phấn', 'b59c67bf196a4758191e42f76670ceba', 'phan', 'Nữ', '1999-02-11', 374389835, 'Xương khớp', 'Bác sĩ', 'phannguyen2246@gmail.com', '492 Quang Trung Phường 10 Gò Vấp', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `benhan`
--

CREATE TABLE `benhan` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tenba` varchar(255) collate utf8_unicode_ci NOT NULL,
  `chuandoan` varchar(255) collate utf8_unicode_ci NOT NULL,
  `ngaykham` date NOT NULL,
  `kqdieutri` varchar(255) collate utf8_unicode_ci NOT NULL,
  `idbn` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idbn` (`idbn`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Contenu de la table `benhan`
--

INSERT INTO `benhan` (`id`, `tenba`, `chuandoan`, `ngaykham`, `kqdieutri`, `idbn`) VALUES
(1, ' Điều trị xương khớp', 'Triệu chứng đau cơ nhẹ phía tay trái', '2022-11-18', 'Hội chứng đau căn cơ', 4),
(7, ' Điều trị xương khớp', 'Xương bên chân phải đau, xưng to, bị bầm nhẹ', '2022-12-10', 'Gãy xương nhẹ không nguy hiểm ', 5);

-- --------------------------------------------------------

--
-- Structure de la table `benhnhan`
--

CREATE TABLE `benhnhan` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `anh` varchar(255) collate utf8_unicode_ci NOT NULL,
  `tenbn` varchar(255) collate utf8_unicode_ci NOT NULL,
  `username` varchar(255) collate utf8_unicode_ci NOT NULL,
  `password` varchar(255) collate utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(255) collate utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `sdt` int(10) NOT NULL,
  `diachi` varchar(255) collate utf8_unicode_ci NOT NULL,
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  `nghenghiep` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Contenu de la table `benhnhan`
--

INSERT INTO `benhnhan` (`id`, `anh`, `tenbn`, `username`, `password`, `gioitinh`, `ngaysinh`, `sdt`, `diachi`, `email`, `nghenghiep`) VALUES
(3, '', 'Nguyễn Thị Hồng Hạnh ', 'phanf@gmail.com', '123456', 'Nữ', '1999-10-04', 374389835, 'Nguyễn Văn Bảo phường 4 Gò Vấp', 'phanf@gmail.com', 'Luật sư'),
(4, '', 'Nguyen Van Bao', 'bao@gmail.com', '123456', 'Nam', '2000-10-10', 374389835, '42 Phạm Văn Đồng Phường 10 Bình Thạnh', 'bao@gmail.com', 'IT'),
(5, '', 'Nguyễn Thị Xuân', 'xuan@gmail.com', '123456', 'Nữ', '0000-00-00', 382389835, '42 Nguyễn Văn Bảo Phường 4 Gò Vấp', '', 'Văn phòng');

-- --------------------------------------------------------

--
-- Structure de la table `chitietdonthuoc`
--

CREATE TABLE `chitietdonthuoc` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `idloaithuoc` int(11) NOT NULL,
  `xuatxu` varchar(255) collate utf8_unicode_ci NOT NULL,
  `donvitinh` varchar(255) collate utf8_unicode_ci NOT NULL,
  `gia` float NOT NULL,
  `tenthuoc` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Contenu de la table `chitietdonthuoc`
--

INSERT INTO `chitietdonthuoc` (`id`, `idloaithuoc`, `xuatxu`, `donvitinh`, `gia`, `tenthuoc`) VALUES
(1, 1, 'VN', '50mg', 200000, 'Fentanyl (citrat)'),
(2, 1, 'VN', '30mg', 200000, 'Halothan'),
(3, 1, 'VN', '20mg', 100000, 'Ketamin (hydroclorid)'),
(4, 1, 'VN', '40mg', 100000, 'Thiopental (natri)'),
(5, 1, 'VN', '20mg', 100000, ' Procain hydroclorid'),
(6, 2, 'VN', '20mg', 100000, 'Diclofenac'),
(7, 2, 'VN', '20mg', 100000, '	 Meloxicam'),
(8, 2, 'VN', '20mg', 100000, 'Morphin Sulfat'),
(9, 3, 'VN', '30mg', 200000, 'Amitriptylin'),
(10, 3, 'VN', '40mg', 100000, '	 Diazepam'),
(11, 4, 'VN', '20mg', 100000, 'Propranolol hydroclorid'),
(12, 4, 'VN', '25mg', 100000, 'Acetylsalicylic acid '),
(13, 4, 'VN', '25mg', 100000, 'Ibuprofe'),
(14, 5, 'VN', '30mg', 200000, 'Azathioprin'),
(15, 5, 'VN', '25mg', 200000, 'Carboplatin'),
(16, 6, 'VN', '50mg', 200000, ' Atenolol'),
(17, 6, 'VN', '40mg', 200000, 'Amiodaron hydroclorid'),
(18, 6, 'VN', '50mg', 150000, 'Digoxin'),
(19, 7, 'VN', '40mg', 100000, 'Amlodipin'),
(20, 7, 'VN', '15mg', 200000, 'Enalapril'),
(21, 7, 'VN', '30mg', 200000, 'Nifedipin');

-- --------------------------------------------------------

--
-- Structure de la table `chuyenkhoa`
--

CREATE TABLE `chuyenkhoa` (
  `id` int(11) NOT NULL auto_increment,
  `tenck` varchar(255) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Contenu de la table `chuyenkhoa`
--

INSERT INTO `chuyenkhoa` (`id`, `tenck`) VALUES
(1, 'Chuyên khoa xương khớp'),
(2, 'Chuyên khoa Nhi'),
(3, 'Chuyên khoa Tai - Mũi -Họng'),
(4, 'Chuyên khoa Nội'),
(5, 'Chuyên khoa Chẩn đoán hình ảnh	'),
(6, 'Chuyên khoa xét nghiệm'),
(7, 'Chuyên khoa Ngoại'),
(8, 'Chuyên khoa Răng hàm mặt'),
(9, 'Chuyên khoa y học cổ truyền, phục hồi chức năng - ...'),
(10, 'Chuyên khoa sản phụ khoa'),
(11, 'Chuyên khoa Da liễu'),
(12, 'Chuyên khoa Mắt');

-- --------------------------------------------------------

--
-- Structure de la table `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `tenhd` varchar(255) collate utf8_unicode_ci NOT NULL,
  `ngay` date NOT NULL,
  `idctdonthuoc` int(11) NOT NULL,
  `idbn` int(11) NOT NULL,
  `slthuoc` tinyint(4) NOT NULL,
  `idba` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `hoadon`
--

INSERT INTO `hoadon` (`id`, `tenhd`, `ngay`, `idctdonthuoc`, `idbn`, `slthuoc`, `idba`) VALUES
(6, 'Hóa đơn bệnh máu', '2022-12-01', 1, 4, 2, 5),
(8, 'Khóa xương khớp', '2022-12-02', 1, 4, 1, 6),
(9, 'Điều trị xương khớp', '2022-12-10', 2, 5, 2, 7);

-- --------------------------------------------------------

--
-- Structure de la table `lichkham`
--

CREATE TABLE `lichkham` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `idbn` int(11) NOT NULL,
  `tenbs` varchar(100) collate utf8_unicode_ci NOT NULL,
  `lichngaykham` date NOT NULL,
  `soluongkham` int(11) NOT NULL,
  `idlt` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `lichkham`
--

INSERT INTO `lichkham` (`id`, `idbn`, `tenbs`, `lichngaykham`, `soluongkham`, `idlt`) VALUES
(2, 4, 'Hồng Phấn', '2022-10-31', 1, 15),
(4, 5, 'Hồng Phấn', '2022-12-09', 2, 20),
(6, 5, 'Hồng Phấn', '2022-12-10', 1, 22);

-- --------------------------------------------------------

--
-- Structure de la table `lichtrinh`
--

CREATE TABLE `lichtrinh` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `idck` int(255) NOT NULL,
  `tenbs` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `idbs` int(11) NOT NULL,
  `ngaykham` date NOT NULL,
  `giokham` time NOT NULL,
  `soluong` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `lichtrinh`
--

INSERT INTO `lichtrinh` (`id`, `idck`, `tenbs`, `idbs`, `ngaykham`, `giokham`, `soluong`) VALUES
(22, 1, 'Hồng Phấn', 0, '2022-12-10', '12:30:00', 5);

-- --------------------------------------------------------

--
-- Structure de la table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `anh` varchar(255) collate utf8_unicode_ci NOT NULL,
  `tennv` varchar(255) collate utf8_unicode_ci NOT NULL,
  `username` varchar(255) collate utf8_unicode_ci NOT NULL,
  `password` varchar(255) collate utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(255) collate utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `sdt` int(10) NOT NULL,
  `email` varchar(255) collate utf8_unicode_ci NOT NULL,
  `chucvu` varchar(255) collate utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) collate utf8_unicode_ci NOT NULL,
  `phanquyen` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `anh`, `tennv`, `username`, `password`, `gioitinh`, `ngaysinh`, `sdt`, `email`, `chucvu`, `diachi`, `phanquyen`) VALUES
(1, '', 'Phùng Thị Bích', '', '', 'Nữ', '1986-05-23', 345678765, 'bich@gmail.com', 'Nhân viên ', '', 3),
(2, '', 'Huỳnh Minh Tâm', '', '', 'Nam', '1981-03-18', 321234321, 'tam@gmail.com', 'Nhân viên ', '', 0),
(3, '', 'Nguyễn Anh Hoàng', '', '', 'Nam', '1989-02-14', 321210098, 'hoang@gmail.com', 'Nhân viên ', '', 0),
(4, '', 'Phạm Quỳnh Ngọc', '', '', 'Nữ', '1990-08-21', 987609098, 'ngoc@gmail.com', 'Nhân viên ', '', 0),
(5, '', 'Huỳnh Anh', '', '', 'Nữ', '1988-08-08', 987655678, 'anh@gmail.com', 'Y tá', '', 0),
(6, '', 'Nguyễn Hồng ', '', '', 'Nữ', '1986-04-28', 321200980, 'hong@gmail.com', 'Y tá', '', 0),
(7, '', 'Nguyễn Tiến Thành', '', '', 'Nam', '1987-09-15', 987890909, 'thanh@gmail.com', 'Kỹ thuật viên', '', 0),
(8, '', 'Lê Thanh Ngân', '', '', 'Nữ', '1975-08-08', 321234543, 'ngan@gmail.com', 'Dược sĩ', '', 0),
(9, '', 'Lê Hải Đăng', '', '', 'Nam', '1979-08-22', 324567890, 'dang@gmail.com', 'Y tá', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(255) unsigned NOT NULL auto_increment,
  `ten` varchar(255) collate utf8_unicode_ci NOT NULL,
  `username` varchar(255) collate utf8_unicode_ci NOT NULL,
  `password` varchar(100) collate utf8_unicode_ci NOT NULL,
  `phanquyen` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `usename` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Contenu de la table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `ten`, `username`, `password`, `phanquyen`) VALUES
(1, 'Admin', 'Admin', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(2, 'Nguyễn Phúc Hưng', 'hung', 'e10adc3949ba59abbe56e057f20f883e', 2),
(23, 'Hồng Phấn', 'phan', 'b59c67bf196a4758191e42f76670ceba', 2),
(26, 'phấn', 'ph@gmail.com', '12312', 0),
(27, 'phấn', 'phan@gmail.com', '123123', 0),
(29, 'Nguyễn Thị Hồng Phấn', 'phannguyen2246@gmail.com', '12123', 0),
(31, 'Phan', 'phan', 'd81cd1a6423a2f87442fccc14ca1991c', 3);

-- --------------------------------------------------------

--
-- Structure de la table `thuoc`
--

CREATE TABLE `thuoc` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `loaithuoc` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `thuoc`
--

INSERT INTO `thuoc` (`id`, `loaithuoc`) VALUES
(1, 'Gây mê, tê'),
(2, 'Giảm đau, chăm sóc giảm nhẹ'),
(3, 'Chống dị ứng'),
(4, 'Trị đau đầu'),
(5, 'Chống ung thư'),
(6, 'Tim mạch'),
(7, 'Trị tăng huyết áp');

-- --------------------------------------------------------

--
-- Structure de la table `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tentintuc` varchar(255) collate utf8_unicode_ci NOT NULL,
  `anh` varchar(255) collate utf8_unicode_ci NOT NULL,
  `noidung` varchar(255) collate utf8_unicode_ci NOT NULL,
  `tieude` varchar(255) collate utf8_unicode_ci NOT NULL,
  `nguoidang` varchar(255) collate utf8_unicode_ci NOT NULL,
  `ngaydang` date NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `nguoidang` (`nguoidang`),
  KEY `nguoidang_2` (`nguoidang`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Contenu de la table `tintuc`
--

INSERT INTO `tintuc` (`id`, `tentintuc`, `anh`, `noidung`, `tieude`, `nguoidang`, `ngaydang`) VALUES
(1, 'Bảo vệ sức khỏe trong mùa bệnh cùng fucoidan', '1669707932_Vien-uong-Kanehide-Bio-Okinawa-Fucoidan-xanh-ho-tro-dieu-tri-ung-thu.jpg', 'Khoảng thời gian chuyển giao mùa trong năm thay đổi thời tiết từ nắng nóng đến mùa mưa, khô lạnh là điều kiện thích hợp để các loại bệnh cúm theo mùa “hoành hành”', 'Không chủ quan với các bệnh theo mùa', 'Admin', '2022-11-28'),
(2, 'Những tổn thương thường gặp khi mắc bệnh Basedow', '1669707856_goi-y-cach-dieu-tri-buou-co-basedow-tai-nha-an-toan-va-hieu-qua-PrnHj-1656308208_medium.jpg', 'Hiện các nhà nghiên cứu cho rằng Basedow là bệnh tự miễn nhưng không rõ nguyên nhân. Các ghi nhận cho thấy nữ giới mắc bệnh nhiều gấp 5 - 10 lần so với nam giới. Bệnh có thể xảy ra ở bất kỳ lứa tuổi nào, nhưng gặp nhiều nhất là trong độ tuổi từ 20 - 40.', 'Lý do khiến nhiều người mắc bệnh Basedow', 'Admin', '2022-11-28'),
(3, 'Ăn bao nhiêu chất bột đường trong một bữa là đủ?', '1669707738_a-va-an-bao-nhieu-chat-bot-duong-1669631587875550713203.jpg', 'Cùng với protein và chất béo, carbohydrate là một trong ba chất dinh dưỡng chính cơ thể cần. Carbohydrate bao gồm: đường, tinh bột và chất xơ có trong ngũ cốc, rau quả và các sản phẩm từ sữa.', ' Vai trò của carbohydrate trong cơ thể', 'Huỳnh Anh', '2022-11-27');
