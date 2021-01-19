-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2020 at 02:56 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bangao`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `TaiKhoan` varchar(30) NOT NULL,
  `MatKhau` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`TaiKhoan`, `MatKhau`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `chitietnhap`
--

CREATE TABLE `chitietnhap` (
  `ID` int(11) NOT NULL,
  `IDHoaDon` int(11) NOT NULL,
  `IDSP` int(11) NOT NULL,
  `KhoiLuong` int(11) NOT NULL DEFAULT 0,
  `DonGia` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitietnhap`
--

INSERT INTO `chitietnhap` (`ID`, `IDHoaDon`, `IDSP`, `KhoiLuong`, `DonGia`) VALUES
(1, 1, 17, 500, 0),
(2, 1, 16, 500, 0),
(5, 1, 17, 1000, 20000),
(7, 3, 17, 100, 100),
(8, 5, 5, 400, 20000),
(9, 6, 1, 200, 10000),
(10, 6, 2, 300, 20000),
(11, 6, 4, 500, 15000);

--
-- Triggers `chitietnhap`
--
DELIMITER $$
CREATE TRIGGER `in_nhap` BEFORE INSERT ON `chitietnhap` FOR EACH ROW BEGIN
update sanpham
set TonKho=TonKho + NEW.KhoiLuong
where ID=new.IDSP;
update hoadonnhap
SET TongTien=TongTien+new.KhoiLuong*new.DonGia
where ID=new.IDHoaDon;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `chitietxuat`
--

CREATE TABLE `chitietxuat` (
  `ID` int(11) NOT NULL,
  `IDHoaDon` int(11) NOT NULL,
  `IDSP` int(11) NOT NULL,
  `KhoiLuong` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chitietxuat`
--

INSERT INTO `chitietxuat` (`ID`, `IDHoaDon`, `IDSP`, `KhoiLuong`) VALUES
(3, 1, 17, 300),
(4, 1, 16, 100),
(16, 2, 1, 100),
(17, 4, 1, 300),
(18, 6, 15, 50),
(19, 6, 15, 100),
(20, 7, 2, 100),
(21, 7, 17, 50),
(22, 7, 17, 50),
(23, 9, 1, 30),
(24, 9, 2, 10),
(25, 2, 17, 200);

--
-- Triggers `chitietxuat`
--
DELIMITER $$
CREATE TRIGGER `in_xuat` AFTER INSERT ON `chitietxuat` FOR EACH ROW BEGIN
UPDATE hoadonxuat JOIN chitietxuat on hoadonxuat.ID=chitietxuat.IDHoaDon JOIN sanpham ON sanpham.ID=chitietxuat.IDSP
SET Tien=Tien+KhoiLuong*Gia
WHERE hoadonxuat.ID=NEW.IDHoaDon
and chitietxuat.ID=new.ID;
UPDATE sanpham
SET TonKho=TonKho-new.KhoiLuong
where new.IDSP=sanpham.ID;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hoadonnhap`
--

CREATE TABLE `hoadonnhap` (
  `ID` int(11) NOT NULL,
  `TongTien` int(11) NOT NULL DEFAULT 0,
  `ThoiGian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoadonnhap`
--

INSERT INTO `hoadonnhap` (`ID`, `TongTien`, `ThoiGian`) VALUES
(1, 20300000, '2020-12-27 05:44:08'),
(2, 0, '2020-12-28 18:48:04'),
(3, 10000, '2020-12-28 19:02:30'),
(4, 0, '2020-12-28 19:05:12'),
(5, 8000000, '2020-12-28 19:11:48'),
(6, 15500000, '2020-12-28 19:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `hoadonxuat`
--

CREATE TABLE `hoadonxuat` (
  `ID` int(11) NOT NULL,
  `TaiKhoan` varchar(30) NOT NULL,
  `Tien` int(11) NOT NULL DEFAULT 0,
  `ThoiGian` datetime NOT NULL DEFAULT current_timestamp(),
  `TrangThai` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hoadonxuat`
--

INSERT INTO `hoadonxuat` (`ID`, `TaiKhoan`, `Tien`, `ThoiGian`, `TrangThai`) VALUES
(1, 'huy', 14400000, '2020-12-27 06:43:59', 1),
(2, 'huy', 4800000, '2020-12-28 06:41:24', 2),
(4, 'huy', 0, '2020-12-28 08:25:03', 1),
(5, 'huy', 0, '2020-12-28 08:27:14', -1),
(6, 'huy', 600000, '2020-12-28 08:30:39', 0),
(7, 'huy', 4800000, '2020-12-28 08:32:24', -1),
(8, 'huy', 0, '2020-12-28 08:32:52', -1),
(9, 'huy', 690000, '2020-12-28 09:59:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `TaiKhoan` varchar(30) NOT NULL,
  `MatKhau` varchar(32) NOT NULL,
  `Ten` varchar(30) NOT NULL,
  `SDT` varchar(10) NOT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `DiaChi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`TaiKhoan`, `MatKhau`, `Ten`, `SDT`, `Email`, `DiaChi`) VALUES
('abc', 'd41d8cd98f00b204e9800998ecf8427e', '', '0913193923', 'huy@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e'),
('abc2', 'd41d8cd98f00b204e9800998ecf8427e', '', '0913193923', 'huy@gmail.com', ''),
('admin', '3321387a11541dbb5e4d5349bbba6165', '46786786', '0124676875', 'adnn@gmail.com', '3321387a11541dbb5e4d5349bbba6165'),
('huy', '827ccb0eea8a706c4c34a16891f84e7b', 'Đoàn Quang Huy            ', '0987654320', 'huyhalo@gmail.com', 'Hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `loaigao`
--

CREATE TABLE `loaigao` (
  `ID` int(11) NOT NULL,
  `Ten` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaigao`
--

INSERT INTO `loaigao` (`ID`, `Ten`) VALUES
(1, 'Gạo tẻ'),
(2, 'Gạo dẻo'),
(3, 'Gạo khô');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `ID` int(11) NOT NULL,
  `TenSP` varchar(30) NOT NULL,
  `TonKho` int(11) NOT NULL DEFAULT 0,
  `Gia` int(11) NOT NULL,
  `Loai` int(11) DEFAULT NULL,
  `Img` varchar(30) DEFAULT NULL,
  `MoTa` varchar(1000) DEFAULT NULL,
  `ChiTiet` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`ID`, `TenSP`, `TonKho`, `Gia`, `Loai`, `Img`, `MoTa`, `ChiTiet`) VALUES
(1, 'Gạo Miên Nhập Khẩu', 370, 15000, 2, 'gao-mien-nhap-khau.png', 'Bạn đang tìm sản phẩm gạo sạch có tính dẻo, thơm, giàu dinh dưỡng thì gạo miên nhập đây chính là sự số 01 dành cho bạn. Mua ngay tại đây để nhận giá ưu đãi nhất. Miễn phí giao hàng tận nơi với số lượng khủng.\r#Gạo miên nhập khẩu ngày càng được ưa chuộng và đang dần chiếm lĩnh thị trường gạo VIệt Nam. So với nhiều loại gạo khác thì đây là sản phẩm bán chạy nhất hiện nay. Được phần lớn các hộ gia đình khi nấu cơm hoặc cháo dinh dưỡng cho người già và trẻ nhỏ.', 'Đặc tính: Dẻo thơm ngọt cơm - gạo ngon nhất thế giới\r#Độ thơm: Thơm tự nhiên\r#Độ nở: Ít nở\r#Giống lúa: ST25\r#Thời gian thu hoạch: 6 tháng\r#Nơi canh tác: Đồng bằng sông Cửu Long\r#Cách nấu: Canh từ mặt gạo trong nồi lên 1/2 lóng tay (tăng giảm tuỳ khẩu vị)\r#Khuyên dùng: Dành cho gia đình thích ăn cơm dẻo\r#Bảo quản: Nơi thoáng mát\r#Thời gian bảo quản: 6 tháng'),
(2, 'Gạo ST25 Sóc Trăng', 590, 24000, 1, 'gaost25.png', 'Gạo sạch hữu cơ sản phẩm hoàn hảo dành cho sức khỏe của mọi nhà” Vì sức khỏe vàng hãy chọn gạo ngon ST25 của chúng tôi#Gạo ST25 mặt hàng đang được tìm kiếm nhiều nhất hiện nay bởi danh hiệu “gạo ngon nhất thế giới”. Để hiểu rõ hơn về nguồn gốc xuất xứ, đặc tính và điểm bán uy tín hiện nay. Mời quý khách hàng xem chi tiết dưới đây nhé. ', 'Đặc tính:Dẻo thơm ngọt cơm - gạo ngon nhất thế giới#Độ thơm:Thơm tự nhiên#Độ nở:Ít nở#Giống lúa:ST25#Thời gian thu hoạch:6 tháng#Nơi canh tác:Đồng bằng sông Cửu Long#Cách nấu: Canh từ mặt gạo trong nồi lên 1/2 lóng tay (tăng giảm tuỳ khẩu vị)#Khuyên dùng Dành cho gia đình thích ăn cơm dẻo#Bảo quản:Nơi thoáng mát#Thời gian bảo quản:6 tháng'),
(3, 'Gạo Sạch Đóng Túi Tứ Quý', 500, 30000, 1, 'gao-tu-quy.png', 'Gạo sạch đóng túi Tứ Quý loại gạo ngon của vùng Đồng Bằng Sông Cửu Long. Với chất lượng cơm ngon là sản phẩm được người tiêu dùng sử dụng nhiều nhất trong dịp tết cổ truyền, làm quà biếu …', 'Đặc tính:Dẻo thơm ngọt cơm\r#Độ thơm Thơm tự nhiên\r#Độ nở Ít nở\r#Giống lúa: ST24\r#Thời gian thu hoạch: Lúa mùa 6 tháng\r#Nơi canh tác: Đồng bằng sông Cửu Long\r#Cách nấu:Canh từ mặt gạo trong nồi lên 1/2 lóng tay (tăng giảm tuỳ khẩu vị)\r#Khuyên dùng:Dành cho gia đình thích ăn cơm dẻo\r#Bảo quản: Nơi thoáng mát\r#Thời gian bảo quản:6 tháng'),
(4, 'Gạo Séng Cù', 640, 20000, 1, 'gao-seng-cu.png', 'Bạn đã bao giờ thưởng thức gạo séng cù– một loại gạo thơm ngon của vùng Tây Bắc nước ta. Với những đặc tính cùng với giá thành hợp lý trên thị trường hiện nay gạo séng cù luôn là một trong những loại gạo được người tiêu dùng lựa chọn và tin dùng hiện nay.', 'Đặc tính: Dẻo thơm ngọt cơm\r#Độ thơm: Thơm tự nhiên\r#Độ nở: Ít nở\r#Giống lúa: Tây Bắc\r#Thời gian thu hoạch: Lúa mùa 6 tháng\r#Nơi canh tác: Vùng núi Tây Bắc\r#Cách nấu: Canh từ mặt gạo trong nồi lên 1/2 lóng tay (tăng giảm tuỳ khẩu vị)\r#Khuyên dùng: Dành cho gia đình thích ăn cơm dẻo\r#Bảo quản: Nơi thoáng mát\r#Thời gian bảo quản: 6 tháng'),
(5, 'Gạo Bắc Hương Thượng Hạng', 200, 27000, 1, 'gao-bac-huong-dong-tui.png', 'Gạo Bắc Hương sản phẩm được yêu thích của mọi gia đình Việt. Bảo vệ sức khỏe, bổ sung di dưỡng, kích thích vị giác giúp người già và trẻ nhỏ ăn ngon miệng hơn\r#Gạo bắc Hương là sự lựa chọn của đông đảo người tiêu dùng có cùng sở thích dùng cơm dẻo – thơm. Còn bạn thì sao gạo bắc hương có là sản phẩm mà bạn đang tìm kiếm? Hay gạo bắc hương có đang là sản phẩm mà bạn đang cần để làm quà biếu cho người thân? Để hiểu rõ hơn về gạo bắc hương hãy cùng gaosachonline khám phá ngay nhé:', 'Đặc tính: Dẻo thơm ngọt cơm\r#Độ thơm: Thơm tự nhiên\r#Độ nở: Ít nở\r#Giống lúa: Tám\r#Thời gian thu hoạch: Lúa mùa 6 tháng\r#Nơi canh tác: Vùng núi Tây Bắc\r#Cách nấu: Canh từ mặt gạo trong nồi lên 1/2 lóng tay (tăng giảm tuỳ khẩu vị)\r#Khuyên dùng: Dành cho gia đình thích ăn cơm dẻo\r#Bảo quản: Nơi thoáng mát\r#Thời gian bảo quản: 6 tháng'),
(6, 'Gạo Bắc Thơm Hải Hậu', 604, 33000, 1, 'gao-bac-huong-dong-tui.png', 'Cơm mềm mặc dù để nguội, dẻo, mềm, vị ngọt đậm hơn những nhóm gạo thường, hương thơm tự nhiên\r#Gạo Bắc Thơm – Loại gạo đặc sản Nam Định sản phẩm bán chạy nhất hiện nay. Gạo trồng nhiều tại các vùng miền Bắc như: Thái Bình, Hưng Yên, Hải Hậu, Giao Thủy,… Gạo bắc hay gạo bắc thơm đều là những cái tên phổ biến để người tiêu dùng tìm mua sản phẩm. Để có tạo ra những bữa cơm thơm ngon cho gia đình thì đây chính là sự lựa chọn tuyệt hảo nhất dành cho bạn. ', 'Đặc tính: Dẻo thơm ngọt cơm\r#Độ thơm: Thơm tự nhiên\r#Độ nở: Ít nở\r#Giống lúa: Tám\r#Thời gian thu hoạch: Lúa mùa 6 tháng\r#Nơi canh tác: Vùng núi Tây Bắc\r#Cách nấu: Canh từ mặt gạo trong nồi lên 1/2 lóng tay (tăng giảm tuỳ khẩu vị)\r#Khuyên dùng: Dành cho gia đình thích ăn cơm dẻo\r#Bảo quản: Nơi thoáng mát\r#Thời gian bảo quản: 6 tháng'),
(7, 'Gạo Tám Xoan Hải Hậu', 265, 25000, 1, 'gao-tam-xoan-hai-hau.png', 'Gạo Tám Xoan Hải Hậu Nam Định cũng gần giống loại gạo Tám tuy nhiên chất lượng cao hơn. Vì đây là những hạt gạo được tuyển chọn rất công phu từ những hạt lúa cho đến những hạt gạo. Chính vì vậy mà sản phẩm luôn được người dùng đánh giá cao về chất lượng. Đây cũng là 1 trong những loại gạo đặc sản miền Bắc đạt tiêu chuẩn xuất khẩu với sản lượng nhiều nhất hiện nay tại Việt Nam. Vậy “gạo tám xoan” có gì đặc biệt mà khiến người dùng lại yêu thích đến vậy? Hãy cùng gaosachonline chúng tôi tìm hiểu đôi nét về chúng nhé', 'Đặc tính: Dẻo thơm ngọt cơm\r#Độ thơm: Thơm tự nhiên\r#Độ nở: Ít nở\r#Giống lúa: Tám\r#Thời gian thu hoạch: Lúa mùa 6 tháng\r#Nơi canh tác: Vùng núi Tây Bắc\r#Cách nấu: Canh từ mặt gạo trong nồi lên 1/2 lóng tay (tăng giảm tuỳ khẩu vị)\r#Khuyên dùng: Dành cho gia đình thích ăn cơm dẻo\r#Bảo quản: Nơi thoáng mát\r#Thời gian bảo quản: 6 tháng'),
(8, 'Gạo Sa Ri – Sơ Ri – Sa mơ', 215, 21000, 1, 'gao-sa-ri-768x768.png', 'Gạo sa ri đặc sản vùng đồng bằng sông Cửu Long chỉ cần nhắc đến tên thì hầu hết người dùng ai cũng biết. Bởi dù cho bạn thích ăn gạo dẻo hay nở thì cũng sẽ có dịp dùng đến. Gạo sơ ri nguyên liệu được ưa chuộng bởi các hộ gia đình thích ăn cơm nở và là sự lựa chọn số 1 của các quán cơm chiên, nhà hàng cao cấp,…\r#Gạo sa ri thuộc nhóm gạo nở được lựa chọn nhiều nhất hiện nay của các khách hàng thích dùng cơm nở xốp. Và đây cũng chính là nguyên liệu được ưa chuộng để tạo ra những phần cơm chiên thơm ngon chất lượng . Bạn cũng có thể tìm kiếm sản phẩm này bằng cái tên thông dụng như sa mơ hoặc sơ ri tại các cơ sở kinh doanh gạo chuyên nghiệp tại HCM.', 'Đặc tính: Nở xốp mềm cơm\r#Độ thơm: Không\r#Độ nở: Nở nhiều\r#Giống lúa: Sa mơ\r#Thời gian thu hoạch: Lúa vụ 6 tháng\r#Nơi canh tác: Đồng bằng sông Cửu Long\r#Cách nấu: Canh từ mặt gạo trong nồi lên 1 lóng tay (tăng giảm tuỳ khẩu vị)\r#Khuyên dùng: Dành cho gia đình thích ăn cơm nở xốp\r#Bảo quản: Nơi thoáng mát\r#Thời gian bảo quản: 6 tháng'),
(9, 'Gạo Đài Loan Sữa', 314, 43000, 1, 'gao-dai-loan-dong-tui.png', 'Gạo thơm đài loan hạt gạo nhỏ, màu trắng trong, cho cơm dẻo mềm, ngọt cơm, mùi thơm đặc trưng. Sản phẩm gạo dẻo cao cấp được yêu thích của người tiêu dùng tại TpHCM.\r#Gạo Đài Loan Sữa hạt gạo nhỏ, màu trắng trong, cho cơm dẻo mềm, ngọt cơm, mùi thơm đặc trưng. Sản phẩm gạo dẻo cao cấp được yêu thích của người tiêu dùng tại TpHCM. ', 'Đặc tính: Dẻo thơm ngọt cơm\r#Độ thơm: Thơm tự nhiên\r#Độ nở: Ít nở\r#Giống lúa: Lài\r#Thời gian thu hoạch: Lúa mùa 6 tháng\r#Nơi canh tác: Đồng bằng sông Cửu Long\r#Cách nấu: Canh từ mặt gạo trong nồi lên 1/2 lóng tay (tăng giảm tuỳ khẩu vị)\r#Khuyên dùng: Dành cho gia đình thích ăn cơm dẻo\r#Bảo quản: Nơi thoáng mát\r#Thời gian bảo quản: 6 tháng'),
(11, 'Gạo Sóc Miên Campuchia', 765, 28000, 1, 'gao-soc-mien-768x768.png', 'Gạo sóc miên là loại gạo có nguồn gốc từ Campuchia, đây là giống lúa thuần chủng nên rất ít sâu bệnh. Lúa Sóc được gieo trồng ở vùng đất cao, ít nước, hạt lúa màu vàng nâu, trắng, dài thon rất thơm.\r#Đây là loại gạo thân quen mà người Campuchia thường gọi. Chẳng hạn gạo Móng Chim người Campuchia gọi là “Gum”, gạo sa mơ có tên campuchia là Sóc Ka- đôn còn gạo sóc miên thì chỉ gọi là sóc. Thật ra tên Sóc miên bắt nguồn từ việc các thương lái quen gọi để phân biệt và dễ dàng nhận biết vì gạo có xuất xứ từ Camphuchia', 'Đặc tính: Nở xốp mềm cơm\r#Độ thơm: Không\r#Độ nở: Nở nhiều\r#Giống lúa: Sóc Miên\r#Thời gian thu hoạch: Lúa vụ 6 tháng\r#Nơi canh tác: Đồng bằng sông Cửu Long - Biên giới\r#Cách nấu: Canh từ mặt gạo trong nồi lên 1 lóng tay (tăng giảm tuỳ khẩu vị)\r#Khuyên dùng: Dành cho gia đình thích ăn cơm nở xốp\r#Bảo quản: Nơi thoáng mát\r#Thời gian bảo quản: 6 tháng'),
(14, 'Gạo Nàng Thơm Chợ Đào', 321, 123, 3, 'gao-nang-thom-cho-dao.png', 'Gạo nàng thơm chợ đào nổi tiếng với những điểm nổi bật như cơm dẻo thơm vị ngọt thanh . Đặc biệt cơm sôi với hương thơm lan tỏa, giữ mùi lâu và ít bị ôi thiu cả trong những ngày hè nóng bức. Đây vẫn luôn là sự lựa chọn hàng đầu của các hộ gia đình và các cửa hàng chuyên cung cấp gạo. Còn bạn thì sao nên muốn thưởng thức hương vị đặc trưng của gạo nàng thơm thì hãy bấm ngay số lượng cần mua cho vào giỏ hàng chúng tôi.\r#Như đã chia sẻ thì gạo nàng thơm chợ đào chính là một trong những sản phẩm được yêu thích nhất hiện nay của các khách hàng thích dùng gạo dẻo. Gạo nàng thơm hợp khẩu vị của đa số người tiêu dùng. Gạo không chỉ ngon mà còn giàu dinh dưỡng, giá thành vừa nên cũng phù hợp túi tiền nhiều các hộ gia đình. ', 'Đặc tính: Nở xốp mềm cơm thơm ngọt\r#Độ thơm: Thơm\r#Độ nở: Nở ít\r#Giống lúa: Nàng Thơm\r#Thời gian thu hoạch: Lúa mùa 6 tháng\r#Nơi canh tác: Đồng bằng sông Cửu Long\r#Cách nấu: Canh từ mặt gạo trong nồi lên 1/2 lóng tay (tăng giảm tuỳ khẩu vị)\r#Khuyên dùng: Dành cho gia đình thích ăn cơm nở xốp\r#Bảo quản: Nơi thoáng mát\r#Thời gian bảo quản: 6 tháng'),
(15, 'Gạo Nở 404', 72, 12000, 1, 'gao-no-mem-404.png', '', 'Đặc tính: Nở xốp mềm cứng cơm\r#Độ thơm: Không\r#Độ nở: Nở vừa\r#Giống lúa: Bụi Sữa\r#Thời gian thu hoạch: Lúa vụ 3 tháng\r#Nơi canh tác: Đồng bằng sông Cửu Long\r#Cách nấu: Canh từ mặt gạo trong nồi lên 1 lóng tay (tăng giảm tuỳ khẩu vị)\r#Khuyên dùng: Dành cho gia đình thích ăn cơm nở xốp\r#Bảo quản: Nơi thoáng mát\r#Thời gian bảo quản: 6 tháng'),
(16, 'Gạo Bụi Sữa Mùa', 400, 14000, 2, 'gao-bui-sua-mua-768x768.png', 'Gạo bụi sữa giá rẻ nhưng vẫn được rất nhiều hộ gia đình chọn lựa khi có nhu cầu tìm kiếm gạo nở xốp. Có thể chế biến cơm trắng cho quán ăn, cơm văn phòng. Hoặc làm nguyên liệu chế biến các loại cơm: cơm chiên dương châu, cơm chiên hải sản, cơm gà xối mỡ,… Gạo bụi sữa giá thành rẻ phù hợp túi tiền đa số người tiêu dùng Việt. Nếu bạn đang tìm mua bụi sữa chất lượng giá rẻ. Bấm ngay nút bên dưới và chọn số lượng để nhận ngay những túi gạo thơm ngon nhất.\r#Gạo bụi sữa thường được các hộ gia đình thích ăn cơm nở sở quan tâm và sử dụng. Bên cạnh đó đây còn là nguyên liệu chế biến cơm chiên ngon được các quán ăn, nhà hàng tin tưởng sử dụng. Vậy làm sao để mua gạo đạt chất lượng và làm thế nào để phân biệt gạo bụi nguyên chất không bị pha trộn. Hãy cùng tìm hiểu chi tiết về đặc điểm, tính chất và cách nhận biết bụi sữa ngon được chia sẻ bởi Gạo Sạch Online của chúng tôi nhé! ', 'Đặc tính: Nở xốp mềm cơm\r#Độ thơm: Không\r#Độ nở: Nở nhiều\r#Giống lúa: Bụi Sữa\r#Thời gian thu hoạch: Lúa vụ 3 tháng\r#Nơi canh tác: Đồng bằng sông Cửu Long\r#Cách nấu: Canh từ mặt gạo trong nồi lên 1 lóng tay (tăng giảm tuỳ khẩu vị)\r#Khuyên dùng: Dành cho gia đình thích ăn cơm nở xốp\r#Bảo quản: Nơi thoáng mát\r#Thời gian bảo quản: 6 tháng'),
(17, 'Gạo Thơm Lài Nhật', 200, 24000, 1, 'gao-thom-nhat-dong-tui.png', 'Gạo thơm lài nhật đặc biệt túi 10kg giải pháp tuyệt vời cho các hộ gia đình. Thơm lài đặc biệt sản phẩm thu hút nhất hiện nay dẻo thơm, cơm ngọt, vị đậm đà, càng ăn càng thích.\r#Gạo Nhật Bản hay gạo thơm lài nhật là một trong những loại gạo được ưa chuộng hiện nay. Đặc điểm nổi bật sản phẩm là gạo gạo đều thơm cho cơm dẻo ngọt và vị đậm đà. Gạo thơm lài có nhiều loại mỗi loại có độ dẻo và hương vị đặc trưng riêng. Tùy sở thích người mà có thể lựa chọn sao cho hợp khẩu vị nhất.', 'Đặc tính: Dẻo vừa\r#Độ thơm: Thơm nhẹ\r#Độ nở: Nở vừa\r#Giống lúa: Lài\r#Thời gian thu hoạch: Lúa vụ 3 tháng\r#Nơi canh tác: Đồng bằng sông Cửu Long\r#Cách nấu: Canh từ mặt gạo trong nồi lên 1/2 lóng tay (tăng giảm tuỳ khẩu vị)\r#Khuyên dùng: Dành cho gia đình thích ăn cơm dẻo vừa\r#Bảo quản: Nơi thoáng mát\r#Thời gian bảo quản: 6 tháng');

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `ID` int(11) NOT NULL,
  `Ten` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`ID`, `Ten`) VALUES
(1, 'GẠO TỪ THIỆN'),
(2, 'GẠO NGON'),
(3, 'CHẾ BIẾN MÓN ĂN'),
(4, 'DÀNH CHO ĐẠI LÝ'),
(5, 'BẢNG GIÁ GẠO HÔM NAY');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `ID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Content` varchar(1000) NOT NULL,
  `Loai` int(11) NOT NULL,
  `Img` varchar(50) DEFAULT NULL,
  `Note` varchar(200) DEFAULT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`ID`, `Title`, `Content`, `Loai`, `Img`, `Note`, `ThoiGian`) VALUES
(1, 'Gạo nếp hoa cải vàng', 'Gạo nếp Cái Hoa Vàng xuất xứ và đặc điểm của gạo nếp. Mua gạo nếp Bắc Cái Hoa Vàng ở đâu giá rẻ, tìm mua gạo nếp bắc cái hoa vàng giá sỉ tại TP.HCM. Công dụng của gạo nếp này như thế nào. Có nên mua gạo nếp bắc cái hoa vàng làm […]', 2, 'gaongon1.jpg', NULL, '2020-12-15 04:30:31'),
(2, 'Công ty TNHH VIO – Gạo Sạch Online', 'Chuyên cung cấp các loại gạo tấm nếp và các loại gạo đóng túi cho các mạnh thường quân để đi làm từ thiện. Gạo từ thiện từ công ty chúng tôi cam kết bán giá sỉ nhưng gạo đúng chất lượng để có thể đảm bảo có bữa cơm ngon cho người được trao tặng.', 1, 'anh1.jpg', 'Chúng tôi bao đóng túi 5kg-10kg và vận chuyển cho các cá nhân tổ chức đi làm từ thiện. Hotline:0909584707', '2020-12-15 09:45:18'),
(3, 'Tránh Mua Nhầm Gạo Kém Chất Lượng', 'Hiện nay có rất nhiều của hàng bán gạo trôi nổi trên mạng mà không có giấy phép rõ ràng cũng như nguồn gốc xuất xứ. Vì thế, nếu bạn muốn có loại gạo đi từ thiện phù hợp với túi tiền mà đảm bảo chất lượng cho người nhận thì hãy nhất máy gọi để chúng tôi tư vấn. Tránh trường hợp chỉ so đo về giá mà lại mua nhầm loại không chất lượng ẩm mốc làm mất giá trị của món quà. Chúng tôi với kinh nghiệm hơn 8 năm tự tin là một trong những công ty phân phối gạo chất lượng tại Tp.HCM và các khu vực lân cận.\r\n\r\n', 1, 'ac2.jpg', NULL, '2020-12-15 09:55:57'),
(4, 'SÉNG CÙ GẠO SÉNG CÙ ĐIỆN BIÊN LOẠI 1 GIÁ ƯU ĐÃI 35.000 Đ/KG\r\n', 'Chuyên cung cấp các loại gạo tấm nếp và các loại gạo đóng túi cho các mạnh thường quân để đi làm từ thiện. Gạo từ thiện từ công ty chúng tôi cam kết bán giá sỉ nhưng gạo đúng chất lượng để có thể đảm bảo có bữa cơm ngon cho người được trao tặng.', 1, 'gao-1.jpg', 'Chúng tôi bao đóng túi 5kg-10kg và vận chuyển cho các cá nhân tổ chức đi làm từ thiện.', '2020-12-15 09:55:57'),
(5, 'Cung cấp gạo nếp ngon nấu xôi tại Gò Vấp và Thành Phồ Hồ Chí Minh', 'Xôi là món ăn quen thuộc của chúng ta.Bạn có thể thấy là\r\n\r\n', 3, 'tintuc4.jpg', NULL, '2020-12-15 13:24:08'),
(6, 'Cách nấu rượu gạo ngon nhất, cách tốt nhất tại nhà\r\n', 'Nguồn sâu lai láng vơi đầy ,giải phiền họa có này thêm vui\r\n\r\n', 3, 'tintuc5.jpg', NULL, '2020-12-15 13:24:08'),
(7, 'Cách làm xôi nếp cẩm thơm ngon\r\n', 'Xôi nếp cẩm là một trong những món ăn được yêu thích nhất\r\n\r\n', 3, 'tintuc6.png', NULL, '2020-12-15 13:25:12'),
(8, 'Cách nấu xôi vò ngon hấp dẫn và đơn giản tại nhà\r\n', 'Xôi vò được xem là một trong những món ăn quen thuộc đối với...\r\n\r\n', 3, 'tintuc7.jpg', NULL, '2020-12-15 13:25:12'),
(9, 'Giao Gạo Nếp Sáp Túi 10kg\r\n', 'Giao Gạo Nếp Sáp Túi 10kg ở đâu tại Thành phố Hồ Chí Minh ?\r\n\r\n', 4, 'tintuc.jpg', NULL, '2020-12-15 13:28:42'),
(10, 'Tuyển đại lý gạo Bình Dương\r\n', 'Từ lâu gạo được xem là lương thực thiết yếu của tất cả mọi người việt\r\n\r\n', 4, 'tintuc1.jpg', NULL, '2020-12-15 13:28:42'),
(11, 'Cung cấp gạo cho suất ăn công nghiệp\r\n', 'Nắm bắt được nhu cầu thiết yếu của thị trường hiện nay , cung cấp\r\n\r\n', 4, 'tintuc2.jpg', NULL, '2020-12-15 13:28:42'),
(12, 'Đại lý gạo Tân Phú giá rẻ\r\n', 'Nhu cầu gạo hiện nay tại thành phố Hồ Chí Minh ngày càng gia tăng bởi dân cư\r\n\r\n', 4, 'tintuc3.jpg', NULL, '2020-12-15 13:28:42'),
(13, 'Cung cấp gạo ngon biếu ngày tết\r\n', 'Cung cấp gạo ngon biếu ngày Tết năm 2021? Gạo ngon rẻ tại TPHCM .Xuân về là những ngày đoàn tụ cùng gia đình, người thân với việc đó nhiều người trước khi về nhà luôn chọn mua gạo ngon để làm quà ý nghĩa tỏ lòng biết ơn những cấp bậc tiền bối và bạn bè với ý nghĩa thiêng liêng và sự sum vầy\r\n\r\n', 2, 'tintuc11.jpg', NULL, '2020-12-15 13:55:25'),
(14, 'Mua gạo từ thiện ở đâu tại Thành Phố Hồ Chí Minh\r\n', 'Mua gạo từ thiện ở đâu tại TPHCM? Bảng giá gạo từ thiện mới nhất? các doanh nghiệp và Tổ chức, công ty phát gạo từ thiện vào dịp Rằm tháng Giêng và Rằm tháng 7 đến là mùa dành cho khách hàng phát gạo từ thiện nhằm hỗ trợ phần nào cho người khó khăn được bữa cơm no, cũng làm ấm lòng người nhận, vậy\r\n\r\n', 2, 'tintuc12.jpg', NULL, '2020-12-15 13:55:25'),
(15, 'Mua Gạo Campuchia giá rẻ tại Thành Phố Hồ Chí Minh\r\n', 'Mua gạo campuchia giá rẻ chất lượng TPHCM ở đâu? Đại lý giao gạo uy tín nhất hiện nay? Giá gạo Campuchia tháng 12/2019? Cung cấp gạo Campuchia ở đâu TPHCM rẻ nhất? Dịch vụ đóng gói túi gạo Campuchia biếu Tết làm quà tặng ý nghĩa? Một vài ý dưới đây sẽ giúp bạn chọn đúng nơi bán gạo nhé.\r\n\r\n', 2, 'tintuc13.jpg', NULL, '2020-12-15 13:55:25'),
(16, 'Cung cấp gạo ST25 giá rẻ tại Thành phố Hồ Chí Minh\r\n', 'Cung cấp gạo st25 tại TPHCM ở đâu? Khách hàng đã biết về gạo st25 có nguồn gốc từ đâu chưa? Giao gạo st25 túi 5kg, 10kg biếu quà tặng tết tận nơi miễn phí tại TPHCM?? Những điều cần lưu ý cho người muốn mở đại lý gạo thượng hạng – gạo đặc sản – gạo ngon nhất thế giới – Khách hàng hãy cùng Gạo Sạch Online tham khảo những gợi ý dưới đây nhé..\r\n\r\n', 2, 'tintuc14.jpg', NULL, '2020-12-15 13:55:25'),
(17, 'Mua gạo thơm lài biếu tết 2021\r\n', 'Mua gạo thơm lài biếu tết 2021 về làm quà ở đâu tại TPHCM? Giá gạo thơm lài ngày tết có ổn định không? Mua gạo gì để làm quà biếu tết cho người thân hoặc bạn bè phù hợp ngày xuân 2021? Đại lý cung cấp gạo tết đóng gói túi 5kg , 10kg miễn phí? Đặc tính và xuất xứ của gạo thơm lài như thế nào? Cùng Gạo Sạch Online đi trả lời các câu hỏi nhé..\r\n\r\n', 2, 'tintuc15.jpg', NULL, '2020-12-15 13:55:25'),
(18, 'Gạo Thái lan nhập khẩu\r\n', 'Gạo thơm thái lan là sản phẩm cực tốt cho sức khỏe người tiêu dùng hiện nay. Đặc biệt là những đối tượng người cao tuổi. Dùng ít cơm nhưng có thể bổ sung đầy đủ dưỡng chất cần thiết cho cơ thể . Hoặc thay vì dùng cơm thì có thể chế biến thì những bát cháo dinh dưỡng thơm ngon theo từng khẩu vị.\r\n\r\n', 2, 'tintuc10.jpg', NULL, '2020-12-15 13:55:25'),
(19, 'MUA GẠO THƠM LÀI BIẾU TẾT 2020\r\n', 'Mua gạo thơm lài biếu tết 2020 về làm quà ở đâu tại TPHCM? Giá gạo thơm lài ngày tết có ổn định không? Mua gạo gì để làm quà biếu tết cho người thân hoặc bạn bè phù hợp ngày xuân 2020? Đại lý cung cấp gạo tết đóng gói túi 5kg , 10kg […]', 2, 'gaongon10.jpg', NULL, '2020-12-17 11:09:39'),
(21, 'ĐẠI LÝ GẠO Ở HẢI PHÒNG\r\n', 'Hải Phòng thành phố cảng lớn nhất Việt Nam có nhiều khu công nghiệp tập trung về đây ngày càng nhiều. Nơi đây được xem là vùng đất có nhiều tiềm năng phát triển đặc biệt là ngành nông nghiệp. Bạn đang có ý định muốn mở đại lý gạo tại Hải Phòng thì hãy […]\r\n\r\n', 4, 'daily4.jpg', NULL, '2020-12-17 12:57:49'),
(22, 'ĐẠI LÝ GẠO SẠCH\r\n', 'Việt Nam hiện nay sản xuất rất nhiều loại gạo thơm ngon bổ dưỡng như: gạo thơm các loại, gạo thơm hạt dài, gạo thêm nở mềm, gạo thơm xốp,…Là một trong những nước xuất khẩu gạo hàng đầu thế giới, thị trường gạo Việt Nam luôn nhận được nhiều sự quan tâm của khách […]\r\n\r\n', 4, 'daily10.jpg', NULL, '2020-12-17 12:57:49'),
(23, 'TỔNG ĐẠI LÝ GẠO MIỀN TÂY – ĐẠI LÝ GẠO GIÁ CHẤT LƯỢNG TẠI TPHCM\r\n', 'Miền tây-mang vẻ đẹp tràn đầy của cả con người lẫn thiên nhiên, với cánh đồng thẳng cánh cò bay được biết đến là vựa lúa lớn nhất nước ta. Tổng đại lý gạo miền tây– nơi cung cấp gạo cho rất nhiều đại lý gạo hiện nay với quy mô lớn. Các bạn tham khảo […]\r\n\r\n', 4, 'dai-ly-gao-mien-tay-2.jpg', NULL, '2020-12-17 12:57:49'),
(24, 'GIÁ GẠO NẾP HÔM NAY TẠI TPHCM\r\n', 'Giá gạo nếp hôm nay tại TPHCM bao nhiêu một kg? Giá các loại gạo nếp được tính chênh lệch có cao không. Gạo nếp được người tiêu dùng sử dụng rất đa dạng, có nhiều loại gạo nếp là đặc sản với mùi thơm tự nhiên rất được săn đón tại Việt Nam, nên […]\r\n\r\n', 5, 'gia.jpg', NULL, '2020-12-17 13:30:00'),
(25, 'MUA GẠO ST25 XUẤT KHẨU Ở ĐÂU TẠI TPHCM?\r\n', 'Mua gạo st25 xuất khẩu ở đâu tại TPHCM? Đại lý giao gạo st25 uy tín, chất lượng? Khách hàng có thể hiểu gạo st25 đang dần phát triển mạnh trong nước và ngoài nước. Vậy giá gạo st25 vào dịp Tết là bao nhiêu? Tại sao nên mua gạo st25 tại Gạo Sạch Online? Hãy […]\r\n\r\n', 5, 'gia1.jpg', NULL, '2020-12-17 13:30:00'),
(26, 'BẢNG GIÁ GẠO HÔM NAY THÁNG 9/2018 TẠI TPHCM\r\n', 'Lúa gạo là nhu cầu thiết yếu của mỗi người. Nền văn minh lúa nước đã và vẫn phát triển mạnh mẽ ở Việt Nam ta, bằng chứng là sản lượng lúa tăng và xuất khẩu cũng tăng theo. Bằng những kỹ thuật tiên tiến cùng với công chăm sóc của những người nông dân, […]\r\n\r\n', 5, 'gia2.jpg', NULL, '2020-12-17 13:30:00'),
(27, 'GIÁ GẠO THƠM HIỆN NAY TẠI THỊ TRƯỜNG TPHCM VÀ VIỆT NAM\r\n', 'Gạo rất quan trọng trong các bữa ăn của người Việt. Mua gạo nhưng không biết giá gạo ra sao thì rất khó khăn để quyết định loại gạo. Vì vậy cần cập nhật giá gạo thường xuyên. Trong các loại gạo, gạo thơm hiện đang rất được ưa chuộng. GaoSachOnline xin nói sơ lược […]\r\n\r\n', 5, 'gia5.jpg', NULL, '2020-12-17 13:30:00'),
(28, 'GIÁ GẠO 5451 HÔM NAY TẠI THỊ TRƯỜNG LÚA GẠO TRONG NƯỚC\r\n', 'Hiện nay bên cạnh việc lựa chọn những loại gạo sạch, gạo có thương hiệu, thì gạo giá trung bình vẫn là sự lựa chọn của nhiều người. Đặc biệt là gạo 5451, với đặc tính dễ nấu, cơm ngon không khô khi để nguội, gạo này phù hợp với nhiều người. Gạo 5451 cũng […]\r\n\r\n', 5, 'gia4.jpg', NULL, '2020-12-17 13:30:00'),
(29, 'TÌNH HÌNH GIÁ GẠO HIỆN NAY THÁNG 8/2018\r\n', 'Chúng ta đã bước qua 6 tháng đầu năm 2018 với đầy biến động của thị trường, sự tăng trưởng và thay đổi giữa cung và cầu cả Lam cho nền kinh tế Việt Nam có nhiều biến động. trong đó gạo được xem là một trong những vấn đề mà các nhà đầu tư […]\r\n\r\n', 5, 'gia5.jpg', NULL, '2020-12-17 13:30:00'),
(30, 'GIÁ GẠO XUẤT KHẨU CỦA VIỆT NAM HIỆN NAY THÁNG 7/2018\r\n', 'Việt Nam được xem là một trong những nước có nền nông nghiệp phát triển đặc biệt là ngành lương thực thực phẩm có tỷ trọng khá cao trong những năm gần. Giá gạo xuất khẩu của Việt Nam hiện nay tháng 7/2018 như thế nào hãy cùng chúng tôi khám phá và tìm hiểu […]\r\n\r\n', 5, 'gia7.jpg', NULL, '2020-12-17 13:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `trangthai`
--

CREATE TABLE `trangthai` (
  `ID` tinyint(4) NOT NULL,
  `Ten` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trangthai`
--

INSERT INTO `trangthai` (`ID`, `Ten`) VALUES
(-1, 'Hủy'),
(0, 'Chờ'),
(1, 'Đang giao'),
(2, 'Hoàn thành');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`TaiKhoan`);

--
-- Indexes for table `chitietnhap`
--
ALTER TABLE `chitietnhap`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDHoaDon` (`IDHoaDon`),
  ADD KEY `IDSP` (`IDSP`);

--
-- Indexes for table `chitietxuat`
--
ALTER TABLE `chitietxuat`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDSP` (`IDSP`),
  ADD KEY `IDHoaDon` (`IDHoaDon`);

--
-- Indexes for table `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hoadonxuat`
--
ALTER TABLE `hoadonxuat`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TaiKhoan` (`TaiKhoan`),
  ADD KEY `id_trangthai` (`TrangThai`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`TaiKhoan`);

--
-- Indexes for table `loaigao`
--
ALTER TABLE `loaigao`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Loai` (`Loai`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IndexLoai` (`Loai`);

--
-- Indexes for table `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietnhap`
--
ALTER TABLE `chitietnhap`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `chitietxuat`
--
ALTER TABLE `chitietxuat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `hoadonnhap`
--
ALTER TABLE `hoadonnhap`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hoadonxuat`
--
ALTER TABLE `hoadonxuat`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `loaigao`
--
ALTER TABLE `loaigao`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietnhap`
--
ALTER TABLE `chitietnhap`
  ADD CONSTRAINT `chitietnhap_ibfk_1` FOREIGN KEY (`IDHoaDon`) REFERENCES `hoadonnhap` (`ID`),
  ADD CONSTRAINT `chitietnhap_ibfk_2` FOREIGN KEY (`IDSP`) REFERENCES `sanpham` (`ID`) ON DELETE NO ACTION;

--
-- Constraints for table `chitietxuat`
--
ALTER TABLE `chitietxuat`
  ADD CONSTRAINT `chitietxuat_ibfk_2` FOREIGN KEY (`IDHoaDon`) REFERENCES `hoadonxuat` (`ID`),
  ADD CONSTRAINT `chitietxuat_ibfk_3` FOREIGN KEY (`IDSP`) REFERENCES `sanpham` (`ID`) ON DELETE NO ACTION;

--
-- Constraints for table `hoadonxuat`
--
ALTER TABLE `hoadonxuat`
  ADD CONSTRAINT `hoadonxuat_ibfk_1` FOREIGN KEY (`TaiKhoan`) REFERENCES `khachhang` (`TaiKhoan`),
  ADD CONSTRAINT `hoadonxuat_ibfk_2` FOREIGN KEY (`TrangThai`) REFERENCES `trangthai` (`ID`) ON DELETE NO ACTION;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`Loai`) REFERENCES `loaigao` (`ID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_ibfk_1` FOREIGN KEY (`Loai`) REFERENCES `theloai` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
