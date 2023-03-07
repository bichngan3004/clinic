-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2022 at 09:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doan2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `tenadmin` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `tenadmin`, `email`) VALUES
(1, 'admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bacsi`
--

CREATE TABLE `bacsi` (
  `id_bacsi` int(10) UNSIGNED NOT NULL,
  `tenbacsi` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `namsinh` year(4) NOT NULL,
  `diachi` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_khoa` int(11) NOT NULL,
  `id_chinhanh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bacsi`
--

INSERT INTO `bacsi` (`id_bacsi`, `tenbacsi`, `gioitinh`, `namsinh`, `diachi`, `sdt`, `hinhanh`, `mota`, `id_khoa`, `id_chinhanh`) VALUES
(1, 'Trần Tuệ Linh', 'Nữ', 1985, '11 Nguyễn Văn Nghi, Phường 7, Quận Gò Vấp,Tp.HCM', '0567891368', '6bs.jpg', 'Bác sĩ nhi khoa Trần Tuệ Linh: Được biết đến như một  bác sĩ thương yêu trẻ em , vui tính và luôn tận tâm trong công tác khám chữa bệnh. Bác sĩ cũng là gương mặt quen thuộc trên các diễn đàn xã hội, Như là 1 chuyên gia chia sẻ các kiến thức y khoa được quý phụ huynh rất yêu thích.', 1, 1),
(2, 'Vũ Quốc Trung', 'Nam', 1986, '11 Lê Lợi', '0536489722', '3bs.jpg', 'Bác sĩ nhi khoa Vũ Quốc Trung: Được biết đến như một  bác sĩ thương yêu trẻ em , vui tính và luôn tận tâm trong công tác khám chữa bệnh. Bác sĩ cũng là gương mặt quen thuộc trên các diễn đàn xã hội, Như là 1 chuyên gia chia sẻ các kiến thức y khoa được quý phụ huynh rất yêu thích.', 4, 2),
(3, 'Lê Quỳnh Thư', 'Nữ', 1996, '07 Nguyễn Văn Nghi', '025638946', '17bs.png', 'Bác sĩ nhi khoa Lê Quỳnh Thư: Được biết đến như một  bác sĩ thương yêu trẻ em , vui tính và luôn tận tâm trong công tác khám chữa bệnh. Bác sĩ cũng là gương mặt quen thuộc trên các diễn đàn xã hội, Như là 1 chuyên gia chia sẻ các kiến thức y khoa được quý phụ huynh rất yêu thích.', 3, 1),
(4, 'Đỗ Đình Trung', 'Nam', 1986, '11 Lê Lai', '02356645689', '2bs.jpg', 'Bác sĩ nhi khoa Đỗ Đình Trung: Được biết đến như một  bác sĩ thương yêu trẻ em , vui tính và luôn tận tâm trong công tác khám chữa bệnh. Bác sĩ cũng là gương mặt quen thuộc trên các diễn đàn xã hội, Như là 1 chuyên gia chia sẻ các kiến thức y khoa được quý phụ huynh rất yêu thích.', 2, 1),
(5, 'Phạm Bích Vân', 'Nữ', 1995, '03 Phạm Văn Đồng', '0567891332', '9bs.png', 'Bác sĩ nhi khoa Phạm Bích Vân: Được biết đến như một  bác sĩ thương yêu trẻ em , vui tính và luôn tận tâm trong công tác khám chữa bệnh. Bác sĩ cũng là gương mặt quen thuộc trên các diễn đàn xã hội, Như là 1 chuyên gia chia sẻ các kiến thức y khoa được quý phụ huynh rất yêu thích.', 5, 2),
(6, 'Nguyễn Kiến Văn', 'Nam', 1989, '44 Nguyễn Văn Nghi', '0567891643', '1bs.jpg', 'Bác sĩ nhi khoa Nguyễn Kiến Văn: Được biết đến như một  bác sĩ thương yêu trẻ em , vui tính và luôn tận tâm trong công tác khám chữa bệnh. Bác sĩ cũng là gương mặt quen thuộc trên các diễn đàn xã hội, Như là 1 chuyên gia chia sẻ các kiến thức y khoa được quý phụ huynh rất yêu thích.', 6, 3),
(7, 'Trần Hữu Tâm', 'Nam', 1994, '33 Huỳnh Khương An', '045983126', '13bs.png', 'Bác sĩ nhi khoa Trần Hữu Tâm: Được biết đến như một  bác sĩ thương yêu trẻ em , vui tính và luôn tận tâm trong công tác khám chữa bệnh. Bác sĩ cũng là gương mặt quen thuộc trên các diễn đàn xã hội, Như là 1 chuyên gia chia sẻ các kiến thức y khoa được quý phụ huynh rất yêu thích.', 7, 3),
(8, 'Nguyễn Ngọc Diệp', 'Nữ', 1992, '22 Phạm Ngũ Lão', '0568943612', '15bs.jpg', 'Bác sĩ nhi khoa Nguyễn Ngọc Diệp: Được biết đến như một  bác sĩ thương yêu trẻ em , vui tính và luôn tận tâm trong công tác khám chữa bệnh. Bác sĩ cũng là gương mặt quen thuộc trên các diễn đàn xã hội, Như là 1 chuyên gia chia sẻ các kiến thức y khoa được quý phụ huynh rất yêu thích.', 8, 3),
(9, 'Nguyễn Minh Triết', 'Nam', 1996, '89 Nguyễn Du', '056489123', '10bs.jpg', 'Bác sĩ nhi khoa Nguyễn Minh Triết: Được biết đến như một  bác sĩ thương yêu trẻ em , vui tính và luôn tận tâm trong công tác khám chữa bệnh. Bác sĩ cũng là gương mặt quen thuộc trên các diễn đàn xã hội, Như là 1 chuyên gia chia sẻ các kiến thức y khoa được quý phụ huynh rất yêu thích.', 1, 1),
(10, 'Võ Anh Thảo', 'Nữ', 1987, '45 Phan Văn Trị', '078915324', '7bs.jpg', 'Bác sĩ nhi khoa Võ Anh Thảo: Được biết đến như một  bác sĩ thương yêu trẻ em , vui tính và luôn tận tâm trong công tác khám chữa bệnh. Bác sĩ cũng là gương mặt quen thuộc trên các diễn đàn xã hội, Như là 1 chuyên gia chia sẻ các kiến thức y khoa được quý phụ huynh rất yêu thích.', 6, 3),
(11, 'Thẩm Vũ', 'Nữ', 1985, '32 Lê Đức Thọ', '0568912346', 'bsd4.jpg', 'Bác sĩ nhi khoa Thẩm Vũ: Được biết đến như một  bác sĩ thương yêu trẻ em , vui tính và luôn tận tâm trong công tác khám chữa bệnh. Bác sĩ cũng là gương mặt quen thuộc trên các diễn đàn xã hội, Như là 1 chuyên gia chia sẻ các kiến thức y khoa được quý phụ huynh rất yêu thích.', 8, 3),
(12, 'Vương Khôi Nguyên', 'Nam', 1991, '66 Nguyễn Kiệm', '056781234', '5bs.jpg', 'Bác sĩ nhi khoa Vương Khôi Nguyên: Được biết đến như một  bác sĩ thương yêu trẻ em , vui tính và luôn tận tâm trong công tác khám chữa bệnh. Bác sĩ cũng là gương mặt quen thuộc trên các diễn đàn xã hội, Như là 1 chuyên gia chia sẻ các kiến thức y khoa được quý phụ huynh rất yêu thích.', 5, 2),
(20, 'Lê Tô Tô', 'Nữ', 1999, '15 Lê Trọng Tấn', '0789969632', 'bsl1.jpg', 'Bác sĩ nhi khoa Lê Tô Tô: Được biết đến như một  bác sĩ thương yêu trẻ em , vui tính và luôn tận tâm trong công tác khám chữa bệnh. Bác sĩ cũng là gương mặt quen thuộc trên các diễn đàn xã hội, Như là 1 chuyên gia chia sẻ các kiến thức y khoa được quý phụ huynh rất yêu thích.', 1, 2),
(22, 'Thẩm Ly', 'Nữ', 1991, '15 Lê Lợi', '0798525415', '1667234182_bsd3.jpg', 'Bác sĩ nhi khoa Thẩm Ly: Được biết đến như một  bác sĩ thương yêu trẻ em , vui tính và luôn tận tâm trong công tác khám chữa bệnh. Bác sĩ cũng là gương mặt quen thuộc trên các diễn đàn xã hội, Như là 1 chuyên gia chia sẻ các kiến thức y khoa được quý phụ huynh rất yêu thích.', 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `benhnhan`
--

CREATE TABLE `benhnhan` (
  `id_benhnhan` int(10) UNSIGNED NOT NULL,
  `tenbenhnhan` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `namsinh` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `benhnhan`
--

INSERT INTO `benhnhan` (`id_benhnhan`, `tenbenhnhan`, `gioitinh`, `namsinh`, `diachi`, `sdt`, `hinhanh`, `token`) VALUES
(1, 'Nguyễn Thị Ngân', 'Nữ', '2020', '08 nguyễn văn nghi', '0234658942', 'bn1.jfif', ''),
(13, 'Phạm Thị Bích Ngân', 'Nữ', '2021', '31 le lai, gò vấp', '02356567889', '1665904146_1f599a0e10f4d842d9ab0ef01a39d7f7.gif', ''),
(61, 'Phạm Ngân', 'Nữ', '2018', '48 nguyen van nghi', '023568897', '1665897956_bn1.jfif', '107889580209434812128'),
(71, 'Nguyễn Bảo Hân', 'Nữ', '2018', '08 Nguyễn Văn Bảo', '0234567894', 'benhnhi1.jpg', ''),
(72, 'Võ Minh Ngọc', 'Nữ', '2021', '20 Nguyễn Oanh', '0456897541', 'benhnhi2.jpg', ''),
(73, 'Lê An Tâm', 'Nam', '2019', '14 Phan Văn Trị', '0567894123', 'benhnhi3.jpg', ''),
(74, 'Nguyễn Gia Phúc', 'Nam', '2020', '141 Lê Quang Định', '0789456123', 'bn2.jfif', ''),
(78, 'Nguyen Hoang Cam Thi', 'Nữ', '2011', '107 Nguyễn Văn Nghi', '0567891564', '1667282290_bn2.jfif', '107961308934918345908');

-- --------------------------------------------------------

--
-- Table structure for table `chinhanh`
--

CREATE TABLE `chinhanh` (
  `id_chinhanh` int(10) UNSIGNED NOT NULL,
  `tenchinhanh` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chinhanh`
--

INSERT INTO `chinhanh` (`id_chinhanh`, `tenchinhanh`) VALUES
(1, '12 Nguyễn Văn Bảo, Phường 4, Gò Vấp, Tp.HCM'),
(2, '466 Cao Thắng, P.12, Quận 10, Tp.HCM'),
(3, '93 Nguyễn Trãi, Tp.HCM');

-- --------------------------------------------------------

--
-- Table structure for table `google_user`
--

CREATE TABLE `google_user` (
  `id` int(10) NOT NULL,
  `f_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `session` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `google_user`
--

INSERT INTO `google_user` (`id`, `f_name`, `l_name`, `avatar`, `email`, `password`, `session`) VALUES
(15, 'Phạm', 'Ngân', 'https://lh3.googleusercontent.com/a-/ACNPEu_IpE6Kn7mElntyYJeCNcrfJL6K2mTaDf3gUt2s=s96-c', 'bichngan12a11@gmail.com', '7w72A', '8ACxx2w08x');

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `id_khoa` int(10) UNSIGNED NOT NULL,
  `tenkhoa` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mota1` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mota2` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_chinhanh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`id_khoa`, `tenkhoa`, `hinhanh`, `mota1`, `mota2`, `id_chinhanh`) VALUES
(1, 'Khoa dinh dưỡng', 'dd.jpg', 'Khoa dinh dưỡng của bệnh viện có nhiệm vụ tổ chức thực hiện phục vụ ăn uống cho người bệnh, trường hợp thực hiện chế độ đồng phục vụ ăn uống cho người bệnh phải bảo đảm về số lượng, chất lượng, an toàn vệ sinh thực phẩm và quản lí chặt chẽ chế độ ăn uống theo bệnh lí chịu sự chỉ đạo trực tiếp của Giám đốc bệnh viện.', 'Xây dựng các chế độ ăn uống bệnh lí phù hợp tuỳ theo chức năng nhiệm vụ của bệnh viện, chỉ đạo việc thực hiện các chế độ ăn uống bệnh lí của người bệnh, kiểm tra giám sát việc thực hiện chất lượng ăn uống của người bệnh, không để người bệnh tự ăn theo thực đơn không đúng chế độ ăn uống bệnh, kiểm tra vệ sinh, an toàn thực phẩm, bảo đảm chất lượng ăn uống của người bệnh, thường xuyên trao đổi với bác sĩ điều trị, rút kinh nghiệm trong việc thực hiện chế độ ăn uống bệnh lí của người bệnh, để góp phần nâng cao chất lượng chữa bệnh, kiểm tra vệ sinh nơi làm việc của khoa và các thành viên trong khoa hoặc cơ sở hợp đồng, nhân viên khoa dinh dưỡng mua thực phẩm phải đảm bảo số lượng, có giá trị dinh dưỡng được tính ra calo theo thực đơn, chất lượng tươi ngon, không có thực phẩm ôi thiu.', 1),
(2, 'Khoa nội tổng quát', 'ntq.jpg', 'Khoa Nội tổng quát khám và điều trị gần như mọi bệnh lý nội khoa như tim mạch, hô hấp, tiêu hóa, nội tiết, nội thần kinh, xương khớp, da liễu… Những bệnh lý này có thể điều trị bằng thuốc và thay đổi lối sống mà chưa cần can thiệp sâu.', 'Trong khám sức khỏe tổng quát, khoa Nội tổng quát đóng vai trò rất quan trọng. Bởi vì khi khám tổng quát, người bệnh sẽ làm rất nhiều cận lâm sàng để đánh giá chức năng đa cơ quan và tầm soát ung thư. Kết quả được tổng hợp tại khoa Nội tổng quát. Tại đó, bệnh nhân được chẩn đoán, điều trị, tư vấn các phương pháp chăm sóc và bảo vệ sức khỏe. Những trường hợp cần điều trị chuyên sâu, bệnh nhân sẽ được chuyển đến chuyên khoa cụ thể. Nhìn chung, khoa Nội tổng quát có các chức năng sau: Khám và điều trị các bệnh lý nội khoa: Nội tim mạch, Nội phổi - hô hấp, Nội tiêu hóa gan mật, Nội tiết, Nội thần kinh, Nội cơ – xương – khớp, bệnh da liễu, bệnh nhiễm trùng… Thực hiện khám và tư vấn sức khỏe tổng quát, thực hiện tầm soát ung thư, khám và điều trị các bệnh nền mạn tính, tầm soát nguy cơ đột quỵ, tim mạch, hô hấp, chuyển hóa, tư vấn phòng bệnh và phục hồi chức năng, phối hợp với các chuyên khoa khác để chẩn đoán, điều trị bệnh.', 1),
(3, 'Khoa ngoại', 'nk.jpg', 'Khoa Ngoại là một trong những chuyên khoa quan trọng, thực hiện phẫu thuật từ tổng quát đến chuyên sâu, áp dụng các biện pháp tiên tiến, từ xâm lấn đến ít xâm lấn để điều trị các bệnh về tiêu hóa, tổng quát, bệnh vùng bụng, hậu môn – trực tràng – sàn chậu và điều trị nhiều bệnh lý khác. Các các sĩ ngoại khoa được đào tạo chuyên nghiệp để phẫu thuật điều trị những căn bệnh nguy hiểm, đe dọa đến sinh mạng và sức khỏe của người bệnh.', 'Chức năng cơ bản của khoa là: gây tê, gây mê, hồi sức sau mổ, thực hiện giảm đau sản khoa, tiền mê trong nội soi tiêu hóa không đau, hồi sức cấp cứu đối với các bệnh nhân nội khoa không mổ...Bên cạnh đó, khoa còn phải phối hợp hội chẩn với các bác sĩ chuyên khoa theo yêu cầu, ung cấp dịch vụ chuyên nghiệp và toàn diện trong lĩnh vực điều trị ngoại khoa cho người lớn và trẻ em. Với đội ngũ bác sĩ, phẫu thuật viên, gây mê hồi sức cùng điều dưỡng, Kỹ thuật viên giàu kinh nghiệm chuyên môn, tận tâm và hệ thống phòng mổ hiện đại, bệnh viện đáp ứng đầy đủ các nhu cầu phẫu thuật từ đơn giản đến phức tạp.\r\n\r\nBên cạnh đó, kỹ thuật nội soi là phẫu thuật ít xâm lấn cũng được bệnh viện đưa vào quy trình mổ thường quy tại bệnh viện. Việc áp dụng kỹ thuật cao trong điều trị ngoại khoa không những giúp bệnh nhân dễ dàng tiếp cận được các dịch vụ phẫu thuật cao với chi phí hợp lý mà còn giúp hạn chế tối đa thương tổn đồng thời rút ngằn thời gian phục hồi. Khoa được đầu tư với hệ thống máy móc hiện đại, đồng bộ, có thể thực hiện được nhiều kỹ thuật phẫu thuật phức tạp nhất hiện nay như: Máy gây mê kèm thở, hệ thống máy nội soi hiện đại, kính hiển vi phẫu thuật, máy theo dõi nhịp tim, nhịp thở, hệ thống bàn mổ và đèn mổ hiện đại, giường hồi sức….', 1),
(4, 'Khoa tim mạch', 'tm.jpg', 'Hoạt động dựa trên sự hợp tác giữa các bác sĩ với nhóm chuyên gia hàng đầu của Viện tim mạch Quốc gia, Khoa Tim mạch có khả năng thực hiện được những ca phẫu thuật khó như can thiệp qua đường mạch máu thông qua hệ thống Carm, chụp mạch, đặt van tim và stent mạch vành…', '- Tầm soát phát hiện sớm các bệnh lý về tim mạch, thăm khám, chẩn đoán và điều trị nội trú các bệnh liên quan đến tim và mạch máu cho bệnh nhân như: rối loạn nhịp tim, bệnh mạch vành, suy tim… khám, tư vấn và điều trị ngoại trú các bệnh tim mạch, cấp cứu rối loạn nhịp nhanh, rối loạn nhịp chậm và nhồi máu cơ tim, siêu âm chẩn đoán các bệnh lý về tim – mạch máu cho các khoa trong toàn bệnh viện, theo dõi Holter ECG và Holter huyết áp cho bệnh nhân điều trị nội trú, ngoại trú, đặt máy tạo nhịp tim tạm thời để chuyển tuyến trên.', 2),
(5, 'Khoa hô hấp', 'hh.jpg', 'Khoa hô hấp là chuyên khoa chẩn đoán và điều trị và dự phòng các bệnh lý về phổi và đường hô hấp, gồm cả lao phổi. Dù được xem là một chuyên khoa thuộc khoa nội, khoa phổi liên hệ chặt chẽ với khoa Săn sóc đặc biệt trong những trường hợp bệnh nhân được điều trị bằng kỹ thuật thông khí cơ học. Khi cần thiết phải phẫu thuật, các phẫu thuật sẽ do các bác sĩ phẫu thuật lồng ngực tiến hành.', 'Viêm hô hấp trên, viêm phế quản, viêm phổi, áp xe phổi, lao phổi…Do có Hệ thống Nội soi phế quản chúng tôi có thể súc rửa phổi lấy dịch rửa làm xét nghiệm xác định được chính xác tác nhân gây bệnh như: ung thư, nhiễm nấm, lao, viêm phổi thông thường, ký sinh trùng…', 2),
(6, 'Khoa tai mũi họng', 'hh2.jpg', 'Khoa Tai mũi họng với đội ngũ thầy thuốc có trình độ chuyên môn giỏi, giàu kinh nghiệm, nhiệt tình và tận tâm, phối hợp chặt chẽ với các chuyên khoa khác trong và ngoài bệnh viện để thực hiện điều trị toàn diện và triệt để. Khoa hiện nay đã và đang được trang bị thêm nhiều trang thiết bị hiện đại phục vụ cho công tác khám chữa bệnh.', ' Cấp cứu, khám bệnh, chữa bệnh: tiếp nhận tất cả các trường hợp bệnh nhân có bệnh về Tai Mũi Họng thuộc tuyến của bệnh viện hoặc từ các bệnh viện, trung tâm y tế huyện chuyển đến; thực hiện khám và chứng nhận sức khỏe theo quy định của Nhà nước. Khám, nội soi chẩn đoán, điều trị nội khoa và phẫu thuật các bệnh Tai Mũi Họng. Ngoài hoạt động chuyên môn khám và phẫu thuật điều trị tại Bệnh viện còn tham gia hội chẩn với các khoa trong bệnh viện và ngoài viện. Đào tạo, bồi dưỡng chuyên môn về lĩnh vực Tai Mũi Họng cho các thành viên trong bệnh viện và tuyến dưới để nâng cao trình độ thực hành. Nghiên cứu khoa học về lĩnh vực Tai Mũi Họng, kết hợp với Bệnh viện tuyến trên và các Bệnh viện chuyên khoa đầu ngành để phát triển các kỹ thuật mới. Thực hiện công tác chỉ đạo tuyến theo phân công của Bệnh viện, kết hợp với Bệnh viện tuyến dưới thực hiện các chương trình về chăm sóc sức khỏe các bệnh về Tai Mũi Họng. Tổ chức tuyên truyền giáo dục sức khỏe cho người bệnh và người nhà bệnh nhân dưới hình thức truyền thông.', 3),
(7, 'Khoa răng hàm mặt', 'rhm.jpg', 'Khoa Răng hàm mặt là khoa lâm sàng thực hiện khám bệnh, chữa bệnh về răng hàm mặt bằng phương pháp nội khoa và ngoại khoa.', 'Khám chữa bệnh về chuyên khoa Răng hàm mặt. Phát triển phẫu thuật Hàm mặt- Tạo hình, cấy ghép  nha  khoa (Implant), điều  trị  tuỷ  răng, phục hình răng cố định: Răng sứ thường, răng sứ TiaTan, Sứ thẩm mỹ không kim loại… phục hình răng giả tháo lắp: Nhựa cứng, nhựa mềm, hàm khung', 3),
(8, 'Khoa tâm lý', 'tl2.jpg', 'Ứng dụng các kỹ thuật liệu pháp tâm lý hiện đại trong điều trị bệnh tâm thần. Ứng dụng các kỹ thuật Test, các thang đo tâm lý trong đánh giá, khảo sát các rối loạn tâm thần để hổ trợ thêm trong chẩn đoán bệnh và giám định pháp y tâm thần. Nghiên cứu và ứng dụng các liệu pháp tâm lý mới, các vấn đề về tâm lý lâm sàng. Tham gia đào tạo và nghiên cứu khoa học trong lĩnh vực tâm lý lâm sàng.', 'Khám và điều trị ngoại trú và nội trú ban ngày, hẹn điều trị tâm lý theo giờ hoặc theo buổi. Thực hiện công tác tuyên truyền giáo dục sức khỏe về tâm thần trẻ em. Tổ chức tư vấn tâm lý cho gia đình trẻ tự kỷ, rối loạn tăng động- giảm chú ý, chậm phát triển tâm thần...Tổ chức điều trị tâm lý nhóm cho trẻ tăng động. Triển khai áp dụng phương pháp chẩn đoán, trị liệu sớm cho trẻ tự kỷ. Xây dựng đơn nguyên tâm lý trẻ em trở thành đơn vị khám chữa bệnh về các vấn đề sức khỏe tâm thần trẻ em có chất lượng.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lichnghi`
--

CREATE TABLE `lichnghi` (
  `id_lichnghi` int(10) UNSIGNED NOT NULL,
  `ngaynghi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bacsi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lichnghi`
--

INSERT INTO `lichnghi` (`id_lichnghi`, `ngaynghi`, `id_bacsi`) VALUES
(10, '1_2022-10-09', 8),
(11, '3_2022-10-16', 8),
(12, '09:00 - 11:00_2022-10-23', 8),
(13, '07:00 - 09:00_2022-10-16', 8),
(14, '09:00 - 11:00_2022-10-16', 8),
(15, '15:00 - 17:00_2022-10-16', 8),
(16, '17:00 - 19:00_2022-10-16', 8),
(17, '07:00 - 09:00_2022-10-23', 8),
(18, '1_2022-10-09', 19),
(19, '09:00 - 11:00_2022-10-16', 19),
(20, '09:00 - 11:00_2022-10-23', 19),
(21, '07:00 - 09:00_2022-10-20', 1),
(22, '07:00 - 09:00_2022-11-06', 22),
(23, '09:00 - 11:00_2022-11-06', 22),
(24, '15:00 - 17:00_2022-11-06', 22),
(25, '17:00 - 19:00_2022-11-06', 22),
(26, '17:00 - 19:00_2022-11-06', 1),
(27, '07:00 - 09:00_2022-11-05', 1),
(28, '09:00 - 11:00_2022-11-05', 1),
(29, '15:00 - 17:00_2022-11-05', 1),
(30, '17:00 - 19:00_2022-11-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `id_lienhe` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tieude` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`id_lienhe`, `email`, `tieude`, `noidung`) VALUES
(2, 'camthi0308@gmail.com', 'tư vấn', ' aaa'),
(3, 'bichngan12a11@gmail.com', 'dddd', ' hhh'),
(4, 'camthi0308@gmail.com', 'dddd', ' kkk'),
(5, 'bichngan12@gmail.com', 'dddd', ' dau'),
(6, 'bichngan12a11@gmail.com', 'dddd', ' gggg'),
(7, 'bichngan12@gmail.com', 'dddd', ' tu van'),
(8, 'bichngan12@gmail.com', 'tư vấn', ' kkkk'),
(9, 'bichngan12@gmail.com', 'dddd', ' tuvanllll'),
(10, 'bichngan12@gmail.com', 'tư vấn', ' llll'),
(11, 'bichngan12@gmail.com', 'kkk', ' yyyy'),
(12, 'camthi12@gmail.com', 'dđ', ' eee'),
(13, 'bichngan12@gmail.com', 'tư vấn', ' ddd'),
(14, 'camthi0308@gmail.com', 'tư vấn', 'kkkkk'),
(16, 'nhct1703@gmail.com', 'ssss', ' wwwww'),
(17, 'nhct1703@gmail.com', 'tư vấn', ' giờ khám'),
(18, 'nhct1703@gmail.com', 'tư vânbs', ' tahcws mac');

-- --------------------------------------------------------

--
-- Table structure for table `phieudkkham`
--

CREATE TABLE `phieudkkham` (
  `id_phieudkkham` int(10) UNSIGNED NOT NULL,
  `ngayhen` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaydatlich` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trieuchung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phikham` int(11) NOT NULL,
  `code_phieu` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `id_benhnhan` int(11) NOT NULL,
  `id_bacsi` int(11) NOT NULL,
  `token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phieudkkham`
--

INSERT INTO `phieudkkham` (`id_phieudkkham`, `ngayhen`, `ngaydatlich`, `trieuchung`, `phikham`, `code_phieu`, `status`, `id_benhnhan`, `id_bacsi`, `token`) VALUES
(14, '1_2022-09-30', '2022-10-05 22:12:22', 'đau bụng, thấp bé', 150000, '', 1, 1, 1, ''),
(15, '1_2022-09-28', '2022-10-05 22:12:22', 'tức ngực', 150000, '', 0, 72, 2, ''),
(161, '4_2022-10-27', '2022-10-14 12:51:27', 'da xanh xao', 150000, '', 0, 73, 1, ''),
(174, '4_2022-10-27', '2022-10-17 13:23:43', 'chán ăn, đau bụng bất thường', 150000, '', 0, 74, 3, ''),
(178, '3_2022-10-26', '2022-10-21 15:40:05', 'đau răng', 150000, '', 0, 61, 7, '107889580209434812128'),
(179, '4_2022-10-27', '2022-10-26 15:18:29', 'khó thở', 150000, '', 0, 73, 2, ''),
(183, '1_2022-11-9', '2022-11-01 12:32:41', 'đau lưng', 150000, '', 0, 72, 4, ''),
(184, '1_2022-11-2', '2022-11-01 12:37:01', 'nhịp tim nhanh', 150000, '', 0, 78, 2, '107961308934918345908'),
(187, '2_2022-11-9', '2022-11-03 14:31:59', 'cơ thể gầy guộc', 150000, 'yes', 0, 13, 1, ''),
(198, '3_2022-12-21', '2022-12-11 14:29:44', 'dau bung', 150000, 'yes', 0, 13, 1, ''),
(233, '1_2022-12-29', '2022-12-13 21:07:54', 'tl', 150000, 'no', 0, 61, 11, '107889580209434812128'),
(234, '1_2022-12-29', '2022-12-13 21:12:01', 'ggg', 150000, 'no', 0, 13, 2, ''),
(239, '1_2022-12-28', '2022-12-13 22:03:56', 'ăn không tiêu', 150000, 'yes', 0, 61, 1, '107889580209434812128'),
(240, '1_2022-12-26', '2022-12-13 22:14:45', 'khó thở', 150000, 'yes', 0, 61, 2, '107889580209434812128'),
(241, '2_2022-12-31', '2022-12-13 22:20:02', 'sau rang', 150000, 'yes', 0, 61, 7, '107889580209434812128'),
(243, '1_2022-12-14', '2022-12-13 22:35:18', 'ho', 150000, 'no', 0, 13, 5, ''),
(244, '4_2022-12-21', '2022-12-14 19:26:26', 'nghet mui', 150000, 'no', 0, 61, 5, '107889580209434812128'),
(245, '1_2022-12-22', '2022-12-15 10:41:43', 'hhh', 150000, 'no', 0, 61, 4, '107889580209434812128'),
(246, '1_2022-12-24', '2022-12-24 15:52:36', 'kkk', 150000, 'no', 0, 13, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `phieukhambenh`
--

CREATE TABLE `phieukhambenh` (
  `id_phieukham` int(10) UNSIGNED NOT NULL,
  `giokham` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phikham` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ketqua` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `chidan` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_bacsi` int(11) NOT NULL,
  `id_benhnhan` int(11) NOT NULL,
  `id_phieudkkham` int(11) NOT NULL,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phieukhambenh`
--

INSERT INTO `phieukhambenh` (`id_phieukham`, `giokham`, `phikham`, `ketqua`, `chidan`, `id_bacsi`, `id_benhnhan`, `id_phieudkkham`, `token`) VALUES
(17, '20:28', '150000', 'ho', 'không ăn đồ ăn chứa nhiều dầu mỡ', 1, 1, 14, ''),
(19, '21:32', '150000', 'ho', 'không uống đá', 1, 13, 187, '');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tentaikhoan` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phanquyen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `email`, `password`, `tentaikhoan`, `phanquyen`, `id_user`, `token`) VALUES
(2, 'nndiep@gmail.com', '202cb962ac59075b964b07152d234b70', 'Nguyễn Ngọc Diệp', 2, 8, ''),
(5, 'tuelinh@gmail.com', '202cb962ac59075b964b07152d234b70', 'Trần Tuệ Linh', 2, 1, ''),
(8, 'vuquoctrung@gmail.com', '780c994d8133cb34de7350cba5bf3549', 'Vũ Quốc Trung', 2, 2, ''),
(22, 'bichngan12@gmail.com', '68686ccabb6c0d3ae4a000fdb2c44a1c', 'Bích Ngân', 1, 13, ''),
(67, 'bichngan12a11@gmail.com', '', 'Phạm Ngân', 1, 61, '107889580209434812128'),
(68, 'tranngochoa772001@gmail.com', '', 'Trần Ngọc Hoa', 1, 62, '106779110891578951595'),
(72, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin', 3, 1, ''),
(76, 'thamly@gmail.com', '8d1548d68cfec63d5bf1711f4eeeed12', 'Thẩm Ly', 2, 22, ''),
(80, 'camthi0308@gmail.com', '', 'Nguyen Hoang Cam Thi', 1, 78, '107961308934918345908');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `id_tintuc` int(10) UNSIGNED NOT NULL,
  `tieude` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ngaydang` datetime NOT NULL DEFAULT current_timestamp(),
  `tacgia` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`id_tintuc`, `tieude`, `noidung`, `hinhanh`, `ngaydang`, `tacgia`, `id_admin`) VALUES
(5, 'Trẻ nôn ói ba mẹ nên làm gì?', '            Nôn ói là triệu chứng rất thường gặp ở trẻ em, nhất là trẻ nhỏ khi hệ tiêu hoá của trẻ còn yếu và các van ở dạ dày hoạt động chưa đồng bộ. Thông thường trẻ sẽ có triệu chứng này khi gặp những vấn đề tại đường tiêu hóa nhưng cũng có thể do nguyên nhân ngoài đường tiêu hoá; có thể là dấu hiệu của một bệnh lý thông thường hoặc nhưng cũng báo động một bệnh lý nguy hiểm. Xử trí như thế nào khi trẻ bị nôn ói không phải là điều ba mẹ nào cũng biết. Vấn đề là khi nào có thể cho trẻ ở nhà theo dõi và xử trí ra sao cho phù hợp và khi nào phải đưa trẻ đến cơ sở y tế.\r\n\r\n* Cần làm gì khi trẻ nôn ói?\r\n\r\n- Xử trí khi nôn ói:\r\n\r\nKhi trẻ nhỏ bị nôn trớ, cần nghiêng đầu trẻ sang một bên để tránh hít sặc chất nôn. Nhanh chóng làm sạch chất nôn trong miệng mũi trẻ bằng cách hút mũi, quấn gạc ngón tay thấm hết chất nôn trong miệng trẻ. Nếu trẻ trớ khi đang ngủ, nên để trẻ nằm yên, kê đầu cao và nghiêng qua bên để tránh trào ngược và hít sặc. Vệ sinh thân thể sạch sẽ\r\nTránh bế xốc trẻ lên khi đang nôn trớ vì tăng nguy cơ trào dịch ói vào phổi.\r\nCho trẻ uống thuốc gì khi nôn ói?\r\n\r\nVì nôn ói là một phản ứng có lợi, giúp cơ thể loại bỏ yếu tố gây bệnh, các chất có hại. Do đó, chỉ nên dùng các thuốc chống nôn khi trẻ nôn ói quá nhiều gây nguy cơ mất nước hoặc dùng để giảm say tàu xe. Tuy nhiên những loại thuốc này cần được bác sĩ chỉ định, không nên tự ý dùng cho trẻ.                   ', 'be non oi.jpg', '2022-10-19 21:48:11', 'TS.BS Lê Bích Liên', 0),
(6, 'Sổ giun cho trẻ như thế nào?', '        Ở Việt Nam thường gặp các loại giun đường ruột như: giun đũa (Ascaris lumbricoides), giun tóc (Trichuris trichiura) và giun móc (Ancylostoma duodenale/Necator americanus). Đối tượng thường hay bị nhiễm giun là học sinh tiểu học, trẻ em lứa tuổi mầm non, đặc biệt ở một số nơi trẻ em từ 12 đến 24 tháng tuổi đã có thể bị nhiễm giun.\r\nNgười bị nhiễm giun là do ăn phải trứng giun có trong thức ăn, nước uống bị ô nhiễm hoặc qua bàn tay bẩn, hoặc ấu trùng giun xâm nhập qua da.\r\n\r\n	Tác hại do nhiễm giun: rối loạn tiêu hóa, đau bụng, thiếu máu, suy dinh dưỡng, gầy yếu, chậm lớn, ảnh hưởng đến sự phát triển cả về trí tuệ và tinh thần, làm giảm khả năng lao động, gây ra các biến chứng tắc ruột, giun chui vào ruột thừa gây viêm, giun chui ống mật, có thể gây tử vong.\r\n\r\n	Cách sử dụng thuốc sổ giun: 2 loại thuốc sổ thường được dùng là FUGACAR  (Mebendazole) và ZENTEL(Albendazole)\r\n\r\n1. Liều lượng:\r\n\r\nTrẻ em từ 12 tháng-<24 tháng tuổi: Albendazole 200mg hoặc Mebendazole 500mg 1 liều duy nhất.\r\nTừ 24 tháng tuổi trở lên: Albendazole 400mg hoặc Mebendazole  500mg1  liều duy nhất.\r\nVới một số loại giun, với bệnh nhân cụ thể, bác sĩ có thể cho dùng nhắc lại sau 1 tháng.\r\n2. Cách dùng:\r\n\r\n- Thuốc uống vào bất kỳ thời gian nào trong ngày,  sau khi ăn\r\n\r\n- Trẻ nhỏ phải nghiền thuốc pha với nước uống\r\n\r\n- Nên nhai thuốc tẩy giun và uống với nước                          ', 'tg.jfif', '2022-10-19 22:08:32', 'TS.BS Lê Bích LiênNguồn tin: dựa theo Quyết định 6437/QĐ-BYT, ngày 15/ 10/2018 của Bộ Y tế', 0),
(7, 'Những điều cần biết về bệnh Thiếu men G6PD', 'Thiếu men G6PD là bệnh lý có tính di truyền. Nhiều phụ huynh khi có con mắc bệnh thường băn khoăn, lo lắng. Để giúp cho người chăm sóc trẻ hiểu và an tâm khi chăm sóc trẻ bị bệnh nầy, Khoa Sốt xuất huyết – Bệnh viện Nhi Đồng 1 có xây dựng tờ bướm hướng dẫn với nội dung ngắn gọn, dễ hiểu dưới đây. Người chăm sóc trẻ và các cơ sở y tế tuyến phường xã có thể sử dụng các nội dung hướng dẫn nầy để thực hành chăm sóc trẻ bệnh.1. Thiếu men G6PD là gì?\r\n\r\nThiếu men G6PD (glucose-6 phosphate dehydrogenase) là một bệnh di truyền lặn trên nhiễm sắc thể  giới tính X nên trẻ nam thường bị bệnh hơn trẻ gái. Trẻ có thể bị  thiếu  máu tán  huyết khi tiếp xúc với các chất oxy hóa.\r\n\r\n2.Triệu chứng của trẻ thiếu men G6PD\r\n\r\n- Hầu hết trẻ không có triệu chứng gì. Một số có triệu chứng thiếu máu tán huyết  như:\r\n\r\n+ Da xanh nhạt, mệt mỏi, chóng mặt\r\n\r\n+ Nhịp tim nhanh, khó thở\r\n\r\n+ Vàng da\r\n\r\n+ Tiểu màu trà đậm', '1666192484_tmg.png', '2022-10-19 22:14:44', 'Bùi Thị Bích Phượng khoa Sốt Xuất Huyết', 0),
(8, 'Tăng trưởng của trẻ em', ' Ngày nay, với sự phát triển vượt bậc về kinh tế, trẻ em trong thời đại này không chỉ được cha mẹ lo cho “ăn chắc, mặc bền” mà còn là “ăn ngon, mặc đẹp”. Nói như vậy để các bạn có thể hình dung vấn đề sức khỏe hiện nay mà các bậc cha mẹ quan tâm đã không đơn thuần là “con tôi có bệnh hay không” mà phải là “con tôi có phát triển toàn diện hay không”.\r\nThế nào là phát triển bình thường?\r\n\r\nTrẻ con có những thời kỳ phát triển khác nhau. Ví dụ: bé trai phát triển nhanh hơn bé gái cho đến 7 tháng tuổi, sau thời kỳ này bé gái sẽ phát triển nhanh hơn cho đến khi bé được 4 tuổi. Từ sau 4 tuổi cho đến lúc dậy thì, bé trai và bé gái sẽ có tốc độ phát triển tương tự nhau.\r\n\r\nKích thước của trẻ phụ thuộc rất lớn vào cha mẹ. Cha mẹ cao lớn sẽ có con cao lớn và như một quy luật, cha mẹ “nhỏ con” sẽ sinh ra những đứa trẻ “nhỏ con”. Nếu cả cha và mẹ đều không cao, thì việc đứa trẻ “thiếu thước tấc” một chút sẽ không là vấn đề, chúng vẫn sẽ phát triển và bước vào thời kỳ dậy thì một cách bình thường.\r\n\r\nYếu tố nào ảnh hưởng đến sự tăng trưởng của trẻ?\r\n\r\nChế độ dinh dưỡng, yếu tố di truyền và các hóc môn đều có ảnh hưởng đến quá trình tăng trưởng của trẻ. Nguyên nhân làm cho trẻ phát triển chậm có thể là do chế độ dinh dưỡng không hợp lý hay trẻ có một rối loạn nào đó.\r\n\r\nVậy đâu là nguyên nhân?\r\n\r\nTrẻ có vấn đề về tăng trưởng có thể do rất nhiều nguyên nhân, sau đây là một số lý do thường gặp:\r\n\r\nNếu trẻ phát triển theo tốc độ bình thường nhưng vẫn nhỏ hơn so với tuổi thì gọi là chậm phát triển thể chất. Nguyên nhân có thể do trẻ có “tuổi xương” phát triển chậm hơn so với “tuổi đời”. Trong trường hợp này, thời kỳ dậy thì có thể sẽ bị lùi lại cho đến khi bộ xương phát triển kịp. Thường thì những trẻ này sẽ có người thân hay họ hàng gặp phải tình trạng tương tự\r\nNếu con bạn có cân nặng và chiều cao thấp hơn so với tuổi thì trẻ có thể bị suy dinh dưỡng. Nguyên do thường gặp là trẻ có vấn đề về nuôi dưỡng hoặc do chế độ ăn không đủ chất. Ngoài ra đây có thể là dấu hiệu của một số vấn đề khác như nhiễm trùng, có bất thường về đường tiêu hóa, hoặc trẻ có thể bị bỏ bê hay ngược đãi.\r\nVấn đề về hormon: tình trạng tăng hay giảm đáng kể một loại hormon nào đó cũng là nguyên nhân gây nên các rối loạn tăng trưởng trong 10 năm đầu. Ví dụ như trẻ bị suy tuyến giáp sẽ không sản xuất đủ hormon cần thiết cho xương phát triển.\r\nBệnh lý mạn tính: đây cũng là một trong những nguyên nhân gây nên tình trạng chậm tăng trưởng ở trẻ. Một số bệnh mạn tính thường gặp là: suyễn, bệnh tim bẩm sinh, suy thận mạn. Trẻ có bệnh lý thần kinh cơ, hở hàm ếch, hoặc một số vấn đề về tâm thần kinh cũng sẽ dẫn đến ăn kém. Một số bệnh như suy tim, tiểu đường, xơ nang, nhiễm HIV cũng gây cản trở sự hấp thu dưỡng chất của cơ thể.\r\nNhững nguyên nhân khác: bao gồm rối loạn di truyền (ví dụ như hội chứng Turner), nhiễm trùng trong thai kỳ, dùng thuốc lá và rượu trong thai kỳ…\r\nLàm thế nào để biết trẻ có chậm tăng trưởng hay không?\r\n\r\nNếu nghi ngờ con bạn có vấn đề về tăng trưởng, bạn có thể đưa trẻ đến khám ở các cơ sở y tế có chuyên khoa nhi. Bạn cũng nên thường xuyên ghi nhận cân nặng và chiều cao của trẻ để kiểm tra tốc độ tăng trưởng.\r\n\r\nNếu cần thiết, có thể cho bé làm một số xét nghiệm máu để kiểm tra chức năng của một vài cơ quan cũng như làm một số test đặc biệt nhằm kiểm tra nồng độ hóc môn, chụp X quang vùng cổ tay để đo lường sự phát triển xương theo tuổi.\r\n\r\nĐiều trị như thế nào?\r\n\r\nViệc điều trị phụ thuộc rất nhiều vào nguyên nhân. Trẻ suy dinh dưỡng cần chế độ ăn giàu calori, trẻ thiếu hormon cần dùng thêm hormon dưới sự hướng dẫn của bác sĩ.\r\n\r\nTrẻ con rất hay so sánh bản thân với bạn bè chung quanh về việc lớn lên của mình. Điều này sẽ làm tăng mối lo lắng cho trẻ nếu chẳng may bé “khác” những đứa bé khác về kích thước và hình thể. Điều quan trọng là các bậc phụ huynh nên để ý đến sự lo lắng này của trẻ để có thể phát hiện và điều chỉnh kịp thời           ', '1666192709_tang truong.png', '2022-10-19 22:18:29', 'BSCK2 Phạm Văn Hoàng', 0),
(9, 'Nhận diện những phản ứng tiêu cực ở trẻ', 'Trong cuộc sống hàng ngày, trẻ em thường biểu lộ những mong muốn cá nhân để được cha mẹ đáp ứng. Tuy nhiên không phải bất cứ mong muốn nào của trẻ cũng được chấp thuận. Khi bị cha mẹ từ chối hay không thực hiện ước muốn của mình, một số trẻ đồng tình ngoan ngoãn, chấp nhận sự thất vọng khi yêu cầu của mình không được đáp ứng, nhưng một số trẻ khác lại có những phản ứng tiêu cực với cha mẹ chỉ nhằm mục đích thỏa mãn nhu cầu đòi hỏi của bản thân, điều này khiến cho số đông người lớn cảm thấy rối loạn về mặt cảm xúc và cuối cùng là bị thiếu kiểm soát và mất phương hướng khi phải đối phó với đứa trẻ, gây nhiều ảnh hưởng đến sức khỏe và chất lượng cuộc sống gia đình.\r\nSáu cách phản ứng tiêu cực thường gặp ở trẻ\r\n\r\n1. Năn nỉ: Đứa trẻ sẽ cứ đi theo bạn và liên tục năn nỉ, làm bạn mềm lòng với những lời lặp đi lặp lại của chúng – mục đích cuối cùng của chúng chính là \"Hãy đưa tôi cái tôi muốn, và tôi sẽ im ngay lập tức\", đại loại như \"đi mà mẹ, đi mà, đi mà, đi mà …\" hay \"tại sao, tại sao, tại sao?\", \"lần này thôi!, lần này thôi!, lần này thôi!...\".\r\n\r\n2. Tức giận: Đứa bé sẽ thể hiện sự tức giận bằng những hình thức khác nhau. Với những trẻ nhỏ chưa biết sử dụng nhiều từ vựng, chúng sẽ lăn ra sàn, đập đầu, la hét hết sức có thể. Với những trẻ lớn hơn, khi ngôn ngữ đã dần hoàn thiện, sẽ cãi vã, buộc tội bạn rằng bạn không công bằng, vô lý, hay trách bạn là một người cha, người mẹ tồi tệ.\r\n\r\n3. Đe dọa: Những đứa trẻ bị thất vọng khi không đạt được điều chúng muốn có thể sẽ đe dọa bố mẹ chúng với một số câu đại loại như: \"Con sẽ đi khỏi nhà cho ba mẹ xem!\", \"Con sẽ không nói chuyện với ba mẹ nữa!\", \"Con đi chết đây!\", \"Con không ăn tối đâu và cũng sẽ không làm bài tập luôn\"…\r\n\r\nThông điệp ở đây khá rõ ràng, sẽ có điều gì đó tồi tệ xảy ra nếu như ông, bà không đưa cái tôi muốn ngay lập tức.\r\n\r\n4. Khổ nhục kế: Chiến thuật này là chiến thuật được ưa thích của khá nhiều bạn nhỏ. Khi dùng khổ nhục kế, đứa trẻ có thể chỉ ra rằng mọi thứ thật bất công với chúng: \"Không ai thương con cả\", \"Con chả được cho gì cả\" hoặc \"Mẹ thích bạn đó hơn con\". Một số trẻ thì làm một cái gì đó như một dạng tự trừng phạt bản thân như nhịn không ăn tối, ngồi thu lu một góc trong tủ đồ hàng giờ hoặc nhìn ngoài cửa sổ và im lặng. Việc trẻ khóc, tỏ vẻ mặt buồn rầu hay thút thít cũng là một số công cụ khá hữu hiệu để đứa trẻ có thể điều khiển phụ huynh một cách hiệu quả.\r\n\r\n5. Dỗ ngọt: Chiến thuật thứ 5 là một cách tiếp cận hoàn toàn khác của đứa trẻ so với 4 cách trước. Thay vì làm cho bạn cảm thấy khó chịu, chúng sử dụng cách dỗ ngọt để làm chúng ta cảm thấy thoải mái: \"Này, mẹ ơi, mẹ thật sự có một đôi mắt đẹp tuyệt trần\" hay \"Con nghĩ rằng con sẽ đi dọn dẹp phòng của con đây. Phòng con có vẻ khá bừa bộn trong 3 tuần vừa rồi và sau đó con cũng sẽ dọn dẹp chổ để xe nữa\", \"Mẹ ơi, con sẽ ăn bữa tối và con hứa con sẽ không đòi hỏi đồ ăn vặt nữa\".\r\n\r\n6. Chiến thuật hành động: Dạng cuối cùng này thật sự là dạng tệ nhất trong 6 loại. Với dạng này, đứa trẻ có thể tấn công phụ huynh, đập phá cái gì đó hay chạy đi khỏi nhà. Chiến thuật này thường xảy ra ở những  trẻ nhỏ khi khả năng ngôn ngữ của chúng chưa thật sự tốt, chính vì thế nếu như đứa trẻ đã lớn mà vẫn sử dụng cách này là một điều mà cha mẹ cần lưu ý hơn.            ', '1666192796_pu tieu cuc.png', '2022-10-19 22:19:56', 'BS. Thái Ngọc Thành Đạt – Khoa Tâm lý', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `bacsi`
--
ALTER TABLE `bacsi`
  ADD PRIMARY KEY (`id_bacsi`),
  ADD KEY `id_khoa` (`id_khoa`),
  ADD KEY `id_chinhanh` (`id_chinhanh`);

--
-- Indexes for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD PRIMARY KEY (`id_benhnhan`);

--
-- Indexes for table `chinhanh`
--
ALTER TABLE `chinhanh`
  ADD PRIMARY KEY (`id_chinhanh`);

--
-- Indexes for table `google_user`
--
ALTER TABLE `google_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id_khoa`);

--
-- Indexes for table `lichnghi`
--
ALTER TABLE `lichnghi`
  ADD PRIMARY KEY (`id_lichnghi`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id_lienhe`);

--
-- Indexes for table `phieudkkham`
--
ALTER TABLE `phieudkkham`
  ADD PRIMARY KEY (`id_phieudkkham`);

--
-- Indexes for table `phieukhambenh`
--
ALTER TABLE `phieukhambenh`
  ADD PRIMARY KEY (`id_phieukham`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `tentaikhoan` (`tentaikhoan`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id_tintuc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bacsi`
--
ALTER TABLE `bacsi`
  MODIFY `id_bacsi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `benhnhan`
--
ALTER TABLE `benhnhan`
  MODIFY `id_benhnhan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `chinhanh`
--
ALTER TABLE `chinhanh`
  MODIFY `id_chinhanh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `google_user`
--
ALTER TABLE `google_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id_khoa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lichnghi`
--
ALTER TABLE `lichnghi`
  MODIFY `id_lichnghi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id_lienhe` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `phieudkkham`
--
ALTER TABLE `phieudkkham`
  MODIFY `id_phieudkkham` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `phieukhambenh`
--
ALTER TABLE `phieukhambenh`
  MODIFY `id_phieukham` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id_tintuc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
