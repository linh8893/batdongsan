-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2016 at 03:48 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_bds`
--

-- --------------------------------------------------------

--
-- Table structure for table `acreages`
--

CREATE TABLE IF NOT EXISTS `acreages` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `min_value` int(11) NOT NULL,
  `max_value` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `order_index` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `acreages`
--

INSERT INTO `acreages` (`id`, `name`, `min_value`, `max_value`, `code`, `order_index`, `status`) VALUES
(1, 'Không xác định', 0, 99999999, 1, 0, 1),
(2, '<=30 m2', 0, 30, 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `acreage_lever`
--

CREATE TABLE IF NOT EXISTS `acreage_lever` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order_index` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `keywords`, `thumbnail`, `status`, `create_time`, `update_time`, `group`) VALUES
(3, 'Lời khuyên', 'loi-khuyen', 'Lời khuyên', 'Lời khuyên', 'http://localhost/batdongsanflan.com.vn/asset/public/images/thumb-default.gif', 1, 1475727927, 1475728775, 'cam-nang-tu-van'),
(4, 'Tin tức dự án', 'tin-tuc-du-an', 'Tin tức dự án', 'Tin tức dự án', 'http://localhost/batdongsanflan.com.vn/asset/public/images/thumb-default.gif', 1, 1475731992, 1475731992, ''),
(5, 'Tư vấn sổ đỏ', 'tu-van-so-do', 'Tư vấn sổ đỏ', 'Tư vấn sổ đỏ', 'http://localhost/batdongsanflan.com.vn/asset/public/images/thumb-default.gif', 1, 1475747959, 1475747959, 'chu-de'),
(6, 'Tư vấn luật', 'tu-van-luat', 'Tư vấn luật', 'Tư vấn luật', 'http://localhost/batdongsanflan.com.vn/asset/public/images/thumb-default.gif', 1, 1475764791, 1475764791, 'cam-nang-tu-van'),
(7, 'Tổng hợp', 'tong-hop', '', '', 'http://localhost/batdongsanflan.com.vn/asset/public/images/thumb-default.gif', 1, 1475802218, 1475802218, ''),
(8, 'Hướng dẫn', 'huong-dan', 'Hướng dẫn mo ta', 'huongdan', 'http://localhost/batdongsanflan.com.vn/asset/public/images/thumb-default.gif', 1, 1475803626, 1476979275, '');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `order_index` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `type`, `status`, `order_index`, `slug`, `code`) VALUES
(7, 'Hà Nội', 'Thành phố', -1, 2, 'ha-noi', '04'),
(8, 'Hồ Chí Minh', 'Thành phố', 1, 1, 'ho-chi-minh', '08'),
(9, 'Hải Phòng', 'Thành phố', -1, 3, 'hai-phong', '31');

-- --------------------------------------------------------

--
-- Table structure for table `directions`
--

CREATE TABLE IF NOT EXISTS `directions` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order_index` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `directions`
--

INSERT INTO `directions` (`id`, `name`, `code`, `status`, `order_index`) VALUES
(1, 'Không xác định', 1, 1, 0),
(2, 'Đông', 2, 1, 0),
(3, 'Tây', 3, 1, 0),
(4, 'Nam', 4, 1, 0),
(5, 'Bắc', 5, 1, 0),
(6, 'Đông Bắc', 6, 1, 0),
(7, 'Tây Bắc', 7, 1, 0),
(8, 'Tây Nam', 8, 1, 0),
(9, 'Đông Nam', 9, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE IF NOT EXISTS `districts` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `order_index` int(11) NOT NULL,
  `cities_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=42 ;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `type`, `status`, `order_index`, `cities_code`, `slug`, `code`, `view`) VALUES
(18, 'Quận 1', 'Quận', 1, 1, '08', 'quan-1', '760', 0),
(19, 'Quận 2', 'Quận', 1, 2, '08', 'quan-2', '769', 0),
(20, 'Quận 3', 'Quận', 1, 3, '08', 'quan-3', '770', 0),
(21, 'Quận 4', 'Quận', 1, 4, '08', 'quan-4', '773', 0),
(22, 'Quận 5', 'Quận', 1, 5, '08', 'quan-5', '774', 0),
(23, 'Quận 6', 'Quận', 1, 6, '08', 'quan-6', '775', 0),
(24, 'Quận 7', 'Quận', 1, 7, '08', 'quan-7', '778', 0),
(25, 'Quận 8', 'Quận', 1, 8, '08', 'quan-8', '776', 0),
(26, 'Quận 9', 'Quận', 1, 9, '08', 'quan-9', '763', 0),
(27, 'Quận 10', 'Quận', 1, 10, '08', 'quan-10', '771', 0),
(28, 'Quận 11', 'Quận', 1, 11, '08', 'quan-11', '772', 0),
(29, 'Quận 12', 'Quận', 1, 12, '08', 'quan-12', '761', 0),
(30, 'Quận Thủ Đức', 'Quận', 1, 13, '08', 'quan-thu-duc', '762', 0),
(31, 'Quận Gò Vấp', 'Quận', 1, 14, '08', 'quan-go-vap', '764', 0),
(32, 'Quận Bình Thạch', 'Quận', 1, 15, '08', 'quan-binh-thach', '765', 0),
(33, 'Quận Tân Bình', 'Quận', 1, 16, '08', 'quan-tan-binh', '766', 0),
(34, 'Quận Tân Phú', 'Quận', 1, 17, '08', 'quan-tan-phu', '767', 0),
(35, 'Quận Phú Nhuận', 'Quận', 1, 18, '08', 'quan-phu-nhuan', '768', 0),
(36, 'Quận Bình Tân', 'Quận', 1, 19, '08', 'quan-binh-tan', '777', 0),
(37, 'Huyện Củ Chi', 'Huyện', 1, 20, '08', 'huyen-cu-chi', '783', 0),
(38, 'Huyện Hóc Môn', 'Huyện', 1, 21, '08', 'huyen-hoc-mon', '784', 0),
(39, 'Huyện Bình Chánh', 'Huyện', 1, 22, '08', 'huyen-binh-chanh', '785', 0),
(40, 'Huyện Nhà Bè', 'Huyện', 1, 23, '08', 'huyen-nha-be', '786', 0),
(41, 'Huyện Cần Giờ', 'Huyện', 1, 24, '08', 'huyen-can-gio', '787', 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_index` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `title`, `slug`, `order_index`, `status`, `type`, `keywords`, `description`) VALUES
(2, 'Bán căn hộ chung cư', 'ban-can-ho-chung-cu', 0, 1, 1, 'Bán căn hộ chung cư', 'Bán căn hộ chung cư'),
(3, 'Bán nhà riêng', 'ban-nha-rieng', 0, 1, 1, 'Bán nhà riêng', 'Bán nhà riêng'),
(4, 'Bán nhà biệt thự, liền kề', 'ban-nha-biet-thu-lien-ke', 0, 1, 1, 'Bán nhà biệt thự, liền kề', 'Bán nhà biệt thự, liền kề'),
(5, 'Bán nhà mặt phố', 'ban-nha-mat-pho', 0, 1, 1, 'Bán nhà mặt phố', 'Bán nhà mặt phố'),
(6, 'Bán đất nền dự án', 'ban-dat-nen-du-an', 0, 1, 1, 'Bán đất nền dự án', 'Bán đất nền dự án'),
(7, 'Bán đất ở', 'ban-dat-o', 0, 1, 1, 'Bán đất', 'Bán đất'),
(8, 'Bán trang trại, khu nghỉ dưỡng', 'ban-trang-trai-khu-nghi-duong', 0, 1, 1, 'Bán trang trại, khu nghỉ dưỡng', 'Bán trang trại, khu nghỉ dưỡng'),
(9, 'Bán kho, nhà xưởng', 'ban-kho-nha-xuong', 0, 1, 1, 'Bán kho, nhà xưởng', 'Bán kho, nhà xưởng'),
(10, 'Bán loại bất động sản khác', 'ban-loai-bat-dong-san-khac', 0, 1, 1, 'Bán loại bất động sản khác', 'Bán loại bất động sản khác'),
(11, 'Cho thuê căn hộ chưng cư', 'cho-thue-can-ho-chung-cu', 0, 1, 2, 'Cho thuê căn hộ chưng cư', 'Cho thuê căn hộ chưng cư'),
(12, 'Cho thuê nhà riêng', 'cho-thue-nha-rieng', 0, 1, 2, 'Cho thuê nhà riêng', 'Cho thuê nhà riêng'),
(13, 'Cho thuê nhà mặt phố', 'cho-thue-nha-mat-pho', 0, 1, 2, 'Cho thuê nhà mặt phố', 'Cho thuê nhà mặt phố'),
(14, 'Cho thuê nhà trọ, xóm trọ', 'cho-thue-nha-tro-xom-tro', 0, 1, 2, 'Cho thuê nhà trọ, xóm trọ', 'Cho thuê nhà trọ, xóm trọ'),
(15, 'Cho thuê văn phòng', 'cho-thue-van-phong', 0, 1, 2, 'Cho thuê văn phòng', 'Cho thuê văn phòng'),
(16, 'Cho thuê cửa hàng, ki ốt', 'cho-thue-cua-hang-ki-ot', 0, 1, 2, 'Cho thuê cửa hàng, ki ốt', 'Cho thuê cửa hàng, ki ốt'),
(17, 'Cho thuê kho, nhà xưởng, đất', 'cho-thue-kho-nha-xuong-dat', 0, 1, 2, 'Cho thuê kho, nhà xưởng, đất', 'Cho thuê kho, nhà xưởng, đất'),
(18, 'Cho thuê bất động sản khác', 'cho-thue-bat-dong-san-khac', 0, 1, 2, 'Cho thuê bất động sản khác', 'Cho thuê bất động sản khác');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `production_id` int(11) NOT NULL,
  `vi_tri` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `create_time`, `size`, `production_id`, `vi_tri`) VALUES
(1, 'anh_bat_dong_san_1_1477897808.jpeg', 1477897808, 43768, 2, 1),
(2, 'anh_bat_dong_san_1_1477897913.jpeg', 1477897913, 43768, 3, 1),
(3, 'anh_bat_dong_san_2_1477897913.jpeg', 1477897913, 79750, 3, 2),
(4, 'anh_bat_dong_san_3_1477897913.jpeg', 1477897913, 21713, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
`id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `description`, `keywords`, `content`, `status`, `author`, `thumbnail`, `create_time`, `update_time`, `categories_id`) VALUES
(6, 'Lời khuyên về việc thuê nhà', 'loi-khuyen-ve-viec-thue-nha', 'Xét dưới góc độ tài chính, mỗi phương thức vay tiền để mua nhà hoặc thuê nhà để ở đều có những ưu, nhược điểm riêng. Do đó, trước khi đưa ra quyết định thuê hoặc mua nhà, bạn cần phải xem xét kỹ lưỡng mọi mặt của vấn đề. Việc sở hữu một ngôi nhà có thể đe', 'Lời khuyên', '<h3>Xét dưới góc độ tài chính, mỗi phương thức vay tiền để mua nhà hoặc thuê nhà để ở đều có những ưu, nhược điểm riêng. Do đó, trước khi đưa ra quyết định thuê hoặc mua nhà, bạn cần phải xem xét kỹ lưỡng mọi mặt của vấn đề. Việc sở hữu một ngôi nhà có thể đem đến nhiều ích lợi nhưng đôi khi lựa chọn thuê nhà sẽ tốt hơn.</h3>\r\n\r\n<h2><strong>1. Không tốn chi phí sửa chữa, bảo trì </strong></h2>\r\n\r\n<p>Trong các hợp đồng thuê nhà, nếu hệ thống đường ống nước hoặc hệ thống điện gặp vấn đề của căn nhà bị rò rỉ, người thuê nhà sẽ không chịu bất kỳ trách nhiệm tài chính nào trong việc sửa chữa. Người chịu trách nhiệm cho việc bảo trì sẽ là chủ nhà và cũng tùy vào mức độ sửa chữa, chi phí này có thể khá cao.</p>\r\n\r\n<p>Bởi vậy, nếu không phải do lỗi của mình, người thuê sẽ không cần phải chi trả bất cứ chi phí bảo trì hay hóa đơn sửa chữa nào phát sinh.</p>\r\n\r\n<p>Các chi phí này được chính chủ nhà bỏ ra để bảo dưỡng ngôi nhà của mình, đảm bảo cho người sinh sống luôn thuận tiện trong quãng thời gian thuê nhà. Còn trong trường hợp thỏa thuận giữa chủ nhà và người thuê có các điều khoản mà mọi chi phí cho việc bảo trì sửa chữa căn nhà do người thuê chịu trong thời gian thuê thì người thuê sẽ có ưu thế hơn trong việc đàm phán lại giá thuê với chủ nhà. Đó là một yếu tố quan trọng để người thuê có thể thương lượng cho mình một giá thuê tốt.</p>\r\n\r\n<h2><strong>2. Tiếp cận tiện nghi tốt, không lo ngân sách đầu tư</strong></h2>\r\n\r\n<p>Muốn sở hữu một hồ bơi riêng cho gia đình hay một phòng tập gym trong nhà đồng nghĩa với việc bạn phải bỏ ra chi phí khá lớn cho công tác xây dựng và trang bị. Những chi phí lớn này, bây giờ bạn không còn phải bận tâm hay lo lắng vì bạn là người thuê nhà. Việc của bạn là chỉ cần tìm ra những căn nhà đáp ứng nhu cầu cho bạn với một mức giá hợp lý, phù hợp với ngân sách đề ra.</p>\r\n\r\n<h2><strong>3. Tránh chi phí thanh toán cao ban đầu</strong></h2>\r\n\r\n<p>Trong giao dịch BĐS hiện nay, phải có trong tay 30 – 50% giá trị căn nhà thì bạn mới có thể sở hữu 1 căn nhà phố, số tiền còn lại có thể “xoay” bằng cách áp dụng hình thức vay ngân hàng với thế chấp là chính căn nhà đó. Còn đối với hình thức thanh toán đối với căn hộ tại các dự án, các chủ đầu tư đã áp dụng phương thức trả góp không lãi suất khá hiệu quả và phổ biến. Khoảng 30% giá trị căn hộ là chi phí ban đầu mà người mua phải trả, số tiền còn lại sẽ được trả dần theo tiến độ dự án hoặc phương thức thanh toán mà chủ đầu tư và người mua thỏa thuận trong hợp đồng.</p>\r\n\r\n<p>Người mua có thể sử dụng thu nhập hàng tháng hoặc vay ngân hàng để thanh toán cho chủ đầu tư, nhờ đó, áp lực tài chính cũng giảm đi đáng kể.</p>\r\n\r\n<p>Dù vậy, so sánh giữa việc thuê nhà và mua nhà, áp lực tài chính phải trả ban đầu cho việc thuê nhà sẽ nhẹ hơn rất nhiều, người thuê chỉ chịu một khoản tiền “chôn chân” duy nhất là tiền đặt cọc từ 1 - 2 tháng tiền thuê nhà. Xét riêng về mặt tài chính, số tiền này không thấm vào đâu so với khoản chi phí ban đầu phải bỏ ra để mua một căn nhà hay căn hộ.</p>\r\n\r\n<p>Vậy nên, thuê nhà là lựa chọn hợp lý nếu bạn có thể sử dụng số tiền từ 30 – 50% giá trị căn nhà muốn mua để đầu tư với mục đích “tiền đẻ ra tiền”.</p>\r\n\r\n<table border="0" cellpadding="1" cellspacing="1">\r\n <tbody>\r\n  <tr>\r\n   <td>\r\n   <p><img alt="thuê nhà" src="http://img.thongtinnhadat.com.vn/2016/10/05/Z9BcC3fq/thuenha-16fa.jpg"></p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td> </td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<h2><strong>4. Không phải trả thuế BĐS</strong></h2>\r\n\r\n<p>Người đi thuê sẽ không cần chịu khoản thuế này, mà chi phí ấy được “đẩy” sang cho người sở hữu, là chủ nhà. Khoản thuế BĐS được xác định dựa trên giá trị của BĐS, tùy theo tỉnh thành, quận huyện mà có những mức thuế khác nhau.</p>\r\n\r\n<p>Với những BĐS có giá trị lớn, khoản thuế này cũng không hề nhỏ.</p>\r\n\r\n<h2><strong>5. Tính linh hoạt</strong></h2>\r\n\r\n<p>Khi công việc của bạn cần di chuyển nhiều, sẽ chẳng có gì hợp lý hơn việc thuê ngắn hạn một căn nhà hay căn hộ cho gia đình. Điều đó đồng nghĩa với việc bạn không cần quá bận tâm đến các vấn đề liên quan đến căn nhà bạn đang ở hay cũng không có gì khi sắp phải đi xa. Trong khi nếu sở hữu một ngôi nhà, bạn sẽ phải lo lắng việc bán nhà hay thuê người trông nhà khi có những chuyến công tác dài ngày…</p>\r\n\r\n<h2><strong>6. Giá thuê nhà không bị ảnh hưởng nhiều</strong></h2>\r\n\r\n<p>Nhiều nhà đầu tư lo ngại trước sự biến động của thị trường bởi giá trị BĐS mà họ đang sở hữu sẽ bị ảnh hưởng. Nếu có một thời kỳ vỡ bong bóng BĐS trong tương lai thì giá bất động sản sẽ “rớt” mạn và hầu hết tất cả giao dịch trên thị trường đều tê liệt, khiến chủ sở hữu cũng như nhà đầu tư “chôn chân tại chỗ”.</p>\r\n\r\n<p>Trong khi đó, người thuê nhà không cần để ý những điều này, nếu không muốn nói là có thể họ còn vui hơn vì giá BĐS trên thị trường giảm khiến giá cho thuê nhà giảm theo.</p>\r\n\r\n<p>Thông thường, trong hợp đồng sẽ quy định, giá thuê nhà được cố định trong thời gian thuê và tồn tại điều khoản đền bù hợp đồng nếu một trong hai bên (thuê hoặc cho thuê) đơn phương chấm dứt hợp đồng, vì thế trong thời gian đó, việc BĐS tăng hay giảm giá không ảnh hưởng lớn đến giá thuê, vì hai bên đã đặt bút ký hợp đồng trước thời điểm đó.</p>', 1, 3, 'http://localhost/batdongsanflan.com.vn/asset/public/images/thumb-default.gif', 1475727990, 1475727990, 3),
(7, 'LỜI KHUYÊN  Tiềm ẩn nhiều rủi ro khi mua chung cư mini', 'loi-khuyen-tiem-an-nhieu-rui-ro-khi-mua-chung-cu-mini', 'Chỉ cần có trong tay từ 600 đến 900 triệu đồng, khách hàng đã có thể sở hữu ngay một căn hộ chung cư mini ở vị trí trung tâm, kèm theo lời hứa sẽ được làm sổ đỏ. Dù vậy, có nhiều rủi ro khi lựa chọn chung cư mini mà không phải người mua nào cũng lường trư', 'Tiềm ẩn nhiều rủi ro khi mua chung cư mini', '<h2><strong>Lũ lượt mua chung cư mini vì lợi thế vị trí</strong></h2>\r\n\r\n<p>Thị trường chung cư mini tại Hà Nội đã sôi động trở lại từ đầu năm 2015. Đa số chung cư mini đều tọa lạc ở các vị trí “vàng” tại các quận trung tâm như Cầu Giấy, Thanh Xuân, Bắc Từ Liêm, Nam Từ Liêm, Long Biên, Tây Hồ, thuận tiện cho việc đi lại. Thêm vào đó, chung cư mini còn biết hút khách hàng bằng cách chia căn hộ thành nhiều loại diện tích từ 30 - 45m2 để khách hàng dễ dàng lựa chọn. Mức giá hiện nay được chủ đầu tư rao bán dao động từ 19 - 23 triệu đồng/m2 nhưng vẫn hút khách nhờ sở hữu lợi thế về vị trí.</p>\r\n\r\n<p>Khi mua chung cư mini, chủ đầu tư luôn cam kết sẽ làm sổ đỏ cho khách theo như các chung cư ở các khu đô thị theo Nghị định 71 Thông tư 16. Và cũng để lấy lòng tin của khách hàng, chủ đầu tư sẵn sàng cho khách giữ lại từ 10 - 20 triệu đồng cho tới khi nào làm được sổ đỏ. Thế nhưng, thực tế lại hoàn toàn ngược lại khi nhiều gia đình đã chuyển về ở chung cư mini đã 4 năm nhưng vẫn chưa được tách sổ, nếu hỏi thì cũng chỉ được giải thích “đang chờ cơ quan chức năng xem xét”.</p>\r\n\r\n<p>Anh Hoàng Văn Dũng, chủ 1 căn hộ chung cư mini ở phường Nhân Chính (quận Thanh Xuân) bức xúc: “Tôi mua nhà năm 2012, lúc làm hợp đồng mua bán, chủ đầu tư cam kết sẽ hoàn thành thủ tục cấp sổ đỏ xong trong năm 2012. Thế nhưng, sau gần 4 năm chờ đợi, đến nay gia đình tôi chưa nhìn thấy sổ đỏ đâu. Sau nhiều lần hỏi, chúng tôi được chủ đầu tư cho biết, họ đang làm thủ tục hợp pháp hóa 2 tầng xây vượt giấy phép nên chưa thể làm thủ tục tách sổ đỏ theo cam kết…”. </p>\r\n\r\n<p><img alt="chung cư mini" src="http://img.thongtinnhadat.com.vn/2016/10/03/Z9BcC3fq/chungcumini-54ad.jpg"></p>\r\n\r\n<p>Bên cạnh đo, cũng có không ít khách hàng dù lường trước được rủi ro nhưng vẫn chấp thuận, bởi những hấp dẫn về giá cũng như vị trí mà chung cư mini mang lại. Chị Minh Anh, chủ căn hộ chung cư mini ở phường Bồ Đề (quận Long Biên) tiết lộ lý do lựa chọn chung cư mini: “Trước khi mua căn hộ chung cư mini , tôi lên mạng tìm hiểu và được biết sẽ có những khó khăn khi làm sổ đỏ. Tuy nhiên, với 680 triệu đồng không đủ để mua căn hộ rộng, lại dễ dàng đi sang trung tâm nên cứ ở tạm rồi tính tiếp…”.</p>\r\n\r\n<h2><strong>Mua chung cư mini: nắm dao đằng lưỡi</strong></h2>\r\n\r\n<p>Đại diện Sở Tài nguyên và Môi trường Hà Nội cho biết, Nghị định số 71/2010/NĐ-CP ngày 27/6/2010 của Chính phủ đã có đề cập việc cấp sổ đỏ đối với chung cư mini. Để được cấp sổ đỏ cũng như chia tách sổ đỏ, chủ đầu tư chung cư mini buộc phải đảm bảo đầy đủ những quy định chặt chẽ về pháp lý như: Bản vẽ mặt bằng xây dựng ngôi nhà chung cư phù hợp với hiện trạng sử dụng đất; Bản sao chứng thực GPXD (kèm theo bản vẽ được duyệt); Những quy định về nộp sổ đỏ gốc, biên lai đã hoàn thành nghĩa vụ tài chính; Bản vẽ mặt bằng của tầng có căn hộ;… Tuy nhiên, khi đối chiếu theo quy định thì phần lớn các chung cư mini trên địa bàn Hà Nội không đảm bảo những điều kiện để được làm, hoặc chia tách sổ đỏ.</p>\r\n\r\n<p>Theo vị đại diện này, do mải chạy theo lợi nhuận, chủ đầu tư chung cư mini đã không xây dựng đúng GPXD, xây vượt mật độ, không đảm bảo các tiêu chuẩn phòng cháy, chữa cháy. Không những vậy, nhiều chung cư mini xây dựng trên lô đất xen kẹt, đất nông nghiệp chưa được chuyển đổi mục đích sử dụng. Cá biệt, có các chủ chung cư mini còn lách nghĩa vụ tài chính trong xây dựng chung cư mini . Với những trường hợp vi phạm phổ biến như trên, các chung cư mini sẽ chỉ có đủ điều kiện cấp một sổ đỏ chung và không thể chia tách sổ đỏ với từng căn hộ.</p>\r\n\r\n<p>Đại diện Sở TN&MT Hà Nội cũng khẳng định, nếu chủ đầu tư chung cư mini vi phạm GPXD, xây sai chiều cao,  sai mật độ thì sẽ không đủ điều kiện cấp sổ đỏ cho khách hàng theo Nghị định 71 và Thông tư 16.</p>\r\n\r\n<p>Trong khi đó, theo phân tích của Luật sư Lê Văn Thiệp (Trưởng Văn phòng luật sư Toàn Cầu), chung cư mini là loại hình nhà ở đã được công nhận hợp pháp. Thế nhưng, chủ đầu tư các chung cư mini trên địa bàn Hà Nội hầu hết lại không tuân thủ đúng GPXD nên sẽ rất khó để được cấp sổ đỏ. Nếu xảy ra tranh chấp, phần rủi ro sẽ thuộc về khách hàng. Cả toà chung cư mini chỉ có một sổ đỏ cấp cho chủ đầu tư, việc chủ đầu tư quản lý sổ đỏ thế nào khách hàng rất khó kiểm soát.</p>', 1, 3, 'http://localhost//template/asset/public/images/20161005145013-2d9b.jpg', 1475729680, 1475729680, 3),
(8, 'TIN TỨC DỰ ÁN  Đánh giá thực của người dân về dự án Sunshine Center 16 Phạm Hùng', 'tin-tuc-du-an-danh-gia-thuc-cua-nguoi-dan-ve-du-an-sunshine-center-16-pham-hung', 'Theo những đánh giá mới nhất của người dân về dự án Sunshine Center tại số 16 đường Phạm Hùng, dự án mang tới những trải nghiệm mới lạ qua những đường nét thiết kế độc đáo và phù hợp với mức chi trả của người mua nhà.', 'tin tức dự án', '<h2><strong>Sunshine Center - Vị trí đắt giá</strong></h2>\r\n\r\n<p>Nằm ngay mặt đường Phạm Hùng, <a href="http://batdongsan.com.vn/khu-can-ho-nam-tu-liem/sunshine-center-pj2633" target="_blank" title="Dự án Sunshine Center"><strong>Sunshine Center</strong></a> là điểm kết nối giao thông tuyệt vời đến mọi nơi trong thành phố. Từ đây, chủ nhân có thể dễ dàng đi tới bất cứ đâu.</p>\r\n\r\n<p>&lt;iframe frameborder="0" height="315" src="https://www.youtube.com/embed/KaUNaPGEL3k" width="560"&gt;&lt;/iframe&gt;</p>\r\n\r\n<p>Còn gì tuyệt vời hơn khi chỉ cần bước ra khỏi nhà là bạn đã dễ dàng bắt được 1 chiếc taxi uy tín có tiếng tăm tại đất Hà Nội, nhanh chóng leo lên 1 chuyến xe bus đi vòng quanh thành phố, hay đơn giản là bước sang bến xe Mỹ Đình du ngoạn sang các tỉnh lân cận và băng qua tuyến Phạm Hùng – Nhật Tân đến sân bay Nội Bài và du lịch khắp mọi nơi trên thế giới.</p>\r\n\r\n<p><img alt="Sunshine Center - Vị trí tốt" src="http://img.thongtinnhadat.com.vn/2016/10/01/IMTCYxsf/vitrisunshinecenter-760a.jpg"></p>\r\n\r\n<p>Hiện nay, chỉ một số dự án hiếm hoi của những chủ đầu tư giàu có mới được xây dựng tại mặt đường Phạm Hùng như: Landmark 72, Mễ Trì Hạ, FLC, IPH…</p>\r\n\r\n<p>Sunshine Center được người dân đánh giá là có vị trí “ngọc ngà” trung tâm Quận Nam Từ Liêm.</p>\r\n\r\n<p><img alt="Căn hộ Sunshine Center" src="http://img.thongtinnhadat.com.vn/2016/10/01/IMTCYxsf/canhosunshinecenter-42bc.jpg"></p>\r\n\r\n<h2><strong>Tiện ích xa xỉ</strong></h2>\r\n\r\n<p>Với hàng loạt tiện ích “khủng” tại <a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-sunshine-center" target="_blank" title="Chung cư Sunshine Center"><strong>chung cư Sunshine Center</strong></a> như: Vườn thượng uyển trên tầng cao nhất, bể bơi chân mây, thác nước từ những cột đá được điêu khắc tinh xảo, cửa ra vào với những cột chống to mạnh mẽ mang phong thái hoàng gia. Dự án thực sự là nơi chào đón một cuộc sống thượng lưu viên mãn.</p>\r\n\r\n<p><img alt="Tiện ích xa xỉ tại Sunshine Center" src="http://img.thongtinnhadat.com.vn/2016/10/01/IMTCYxsf/ecenter-a2b7.jpg"></p>\r\n\r\n<p>Với những người mua nhà, sống tại nơi đây họ sẽ chẳng còn cần phải đi đến bất cứ đâu nữa, vì đã có đầy đủ mọi tiện ích phục vụ cho cuộc sống. Từ không gian xanh yên bình cho tới những trung tâm mua sắm lớn đều được hình thành ngay trong tòa tháp.</p>\r\n\r\n<p><img alt="Căn hộ Penthouse tại Sunshine Center" src="http://img.thongtinnhadat.com.vn/2016/10/01/IMTCYxsf/ecenter-4cf8.jpg"></p>\r\n\r\n<h2><strong>Chủ đầu tư kín tiếng</strong></h2>\r\n\r\n<p>Với cái tên lạ nhưng không mới trong “làng” bất động sản, Sunshine Group nhanh chóng được người dân biết đến với những dự án được ra mắt trong tháng 10 này như: Sunshine Garden, Sunshine Riverside… Những dự án ấy có đặc điểm chung là vị trí thuận lợi, tiện ích nội khu toàn diện và mức giá phù hợp với mức chi trả của khách hàng. Tất cả đều nhờ vào công sức nghiên cứu dày dặn của chủ đầu tư trên thị trường.</p>\r\n\r\n<p><img alt="Dự án Sunshine Center" src="http://img.thongtinnhadat.com.vn/2016/10/01/IMTCYxsf/sunshinecenter-5838.jpg"></p>\r\n\r\n<h2><strong>Tính thanh khoản cao</strong></h2>\r\n\r\n<p>Với miếng đất “vàng” nơi mặt đường Phạm Hùng – tuyến đường có mật độ giao thông dày đặc mỗi ngày. Dự án không chỉ lẫy lừng về tiếng tăm mà còn là nơi có tính thanh khoản cao, xứng đáng để đầu tư và mua để ở.</p>\r\n\r\n<p>Quý khách hàng quan tâm dự án vui lòng <a href="http://batdongsan.com.vn/ban-can-ho-chung-cu-sunshine-center" target="_blank" title="Bán chung cư Sunshine Center"><strong>vào đây</strong></a> để biết thêm thông tin chi tiết.</p>', 1, 3, 'http://localhost/batdongsanflan.com.vn/asset/public/images/thumb-default.gif', 1475732479, 1475732479, 4),
(9, 'Trình tự thủ tục tách sổ đỏ', 'trinh-tu-thu-tuc-tach-so-do', 'Hỏi: Ngày 8/7/2003 tôi được cấp đỏ với diện tích 354 m2 (tự khai, không đo đạc). Đến 1/6/2007, Sở Tài nguyên và môi trường có đo đạc lại và cấp quyền sử dụng đất với diện tích 555 m2.', 'Trình tự thủ tục tách sổ đỏ', '<p>Cách đây 1 năm tôi có làm đơn xin trích sao hồ sơ đề cấp lại Giấy chứng nhận quyền sử dụng đất mới vào ngày 16/7/2015 nhưng được trả lời là đang nằm trong diện cấp đồng loạt, khi nào có sẽ gọi nhưng đến nay chưa thấy thông tin gì.<br>\r\nHiện tôi muốn tách sổ và chuyển quyền sử dụng đất ra làm 2 mảnh nhưng không được. Vậy tôi cần làm thủ tục, hồ sơ như thế nào, và chi phí ra sao? </p>\r\n\r\n<p>(thuong.nguyenthi@hcmuaf)</p>\r\n\r\n<h3><strong>Trả lời:</strong></h3>\r\n\r\n<h3><strong>1. Thành phần hồ sơ tách sổ đỏ </strong></h3>\r\n\r\n<p>- Giấy chứng nhận hoặc một trong các loại giấy tờ về quyền sử dụng đất.</p>\r\n\r\n<p>- Đơn xin đăng ký biến động với trường hợp tách sổ đỏ trong trường hợp phân chia tài sản chung.</p>\r\n\r\n<p>- Văn bản thỏa thuận phân chia tài sản đã được công chứng hoặc chứng thực trong trường hợp tách sổ đỏ trong trường hợp phân chia tài sản chung, chia tài sản thừa kế.</p>\r\n\r\n<p>- Hộ khẩu và chứng minh thư của những người liên quan.</p>\r\n\r\n<table border="0" cellpadding="1" cellspacing="1">\r\n <tbody>\r\n  <tr>\r\n   <td>\r\n   <p><img src="http://img.thongtinnhadat.com.vn/2016/08/18/Z9BcC3fq/57-594d.jpg"></p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td><em>Phải có đầy đủ giấy tờ về quyền sử dụng đất thì mới được làm thủ tục tách sổ đỏ </em></td>\r\n  </tr>\r\n </tbody>\r\n</table>\r\n\r\n<h3><strong>2. Trình tự thực hiện tách sổ đỏ </strong></h3>\r\n\r\n<p><em>Thứ nhất</em>, người sử dụng đất có nhu cầu xin tách sổ đỏ lập một bộ hồ sơ nộp tại Phòng Tài nguyên và môi trường.</p>\r\n\r\n<p><em>Thứ hai</em>, ngay trong ngày nhận đủ hồ sơ hợp lệ hoặc chậm nhất là ngày làm việc tiếp theo phòng Tài nguyên và môi trường có trách nhiệm gửi hồ sơ cho Văn phòng đăng ký quyền sử dụng đất trực thuộc để chuẩn bị hồ sơ địa chính.</p>\r\n\r\n<p><em>Thứ ba</em>, trong thời hạn không quá 7 ngày làm việc, kể từ ngày nhận được hồ sơ, văn phòng đăng ký quyền sử dụng đất có trách nhiệm làm trích đo địa chính thửa đất mới tách, làm trích lục bản đồ địa chính, trích sao hồ sơ địa chính và gửi đến cơ quan Tài nguyên và môi trường cùng cấp.</p>\r\n\r\n<p><em>Thứ tư</em>, trong thời hạn không quá 3 ngày làm việc, kể từ ngày nhận được trích lục bản đồ địa chính, trích sao hồ sơ địa chính, phòng Tài nguyên và môi trường có trách nhiệm trình UBND cấp huyện xem xét, ký giấy chứng nhận quyền sử dụng đất, quyền sở hữu nhà ở và tài sản khác gắn liền với đất cho thửa đất mới.</p>\r\n\r\n<p><em>Thứ năm</em>, trong thời hạn không quá 3 ngày làm việc, kể từ ngày nhận được tờ trình, UBND cấp có thẩm quyền xem xét, ký và gửi giấy chứng nhận quyền sử dụng đất, quyền sở hữu nhà ở và tài sản khác gắn liền với đất cho cơ quan Tài nguyên và môi trường trực thuộc.</p>\r\n\r\n<p><em>Thứ sáu</em>, ngay trong ngày nhận được sổ đỏ đã ký hoặc chậm nhất là ngày làm việc tiếp theo, cơ quan Tài nguyên và môi trường có trách nhiệm trao bản chính sổ đỏ đối thửa đất mới cho người sử dụng đất; gửi bản lưu sổ đỏ đã ký, bản chính sổ đỏ đã thu hồi hoặc một trong các loại giấy tờ về quyền sử dụng đất quy định của Luật Đất đai đã thu hồi cho văn phòng đăng ký quyền sử dụng đất trực thuộc; gửi thông báo biến động về sử dụng đất cho văn phòng đăng ký quyền sử dụng đất thuộc Sở Tài nguyên và môi trường để chỉnh lý hồ sơ địa chính gốc.</p>', 1, 3, 'http://localhost/batdongsanflan.com.vn/asset/public/images/thumb-default.gif', 1475748623, 1475748623, 5),
(10, 'Chuyển hộ khẩu, cấm yêu cầu giấy đồng ý tiếp nhận?', 'chuyen-ho-khau-cam-yeu-cau-giay-dong-y-tiep-nhan', 'Tôi muốn chuyển hộ khẩu về nhà anh trai (ở khác tỉnh) để tiện công việc làm ăn. Tôi nghe nói cần có giấy đồng ý tiếp nhận của công an nơi chuyển đến thì công an nơi tôi đang thường trú mới cho cắt hộ khẩu chuyển đi, như vậy có đúng vậy không? Vừa qua, tôi', '', '<p><strong><em>Trả lời</em></strong></p>\r\n\r\n<p>Khoản 4 Điều 8 Thông tư 35 có quy định nghiêm cấm việc yêu cầu công dân phải có giấy đồng ý cho đăng ký thường trú của cơ quan công an nơi chuyển tới mới cấp giấy chuyển hộ khẩu.</p>\r\n\r\n<p>Căn cứ theo luật này, công an (nơi mà bạn đang thường trú) sẽ không được yêu cầu có giấy đồng ý tiếp nhận của công an (nơi bạn chuyển đến) mới cấp giấy chuyển hộ khẩu cho bạn chuyển đi.</p>\r\n\r\n<p>Mà thực tế bạn chỉ cần nộp đầy đủ hồ sơ theo quy định là công an nơi này giải quyết hồ sơ, còn việc tiếp nhận được hay không sẽ phụ thuộc vào công an nơi bạn chuyển đến.</p>\r\n\r\n<p>Cùng với đó, hãy lưu ý khi nộp hồ sơ cấp giấy chuyển hộ khẩu bạn cần chuẩn bị các loại giấy tờ sau:</p>\r\n\r\n<p>- Sổ hộ khẩu (hoặc giấy chứng nhận nhân khẩu tập thể, sổ hộ khẩu gia đình đã được cấp trước đây).</p>\r\n\r\n<p>- Phiếu báo thay đổi hộ khẩu, nhân khẩu</p>\r\n\r\n<h2><strong>Luật sư Trần Công Ly Tao, </strong><strong>Trưởng Văn phòng luật sư Trần Công Ly Tao</strong></h2>', 1, 3, 'http://localhost//template/asset/public/images/184039153808tvpl.jpg', 1475764896, 1475764896, 6),
(11, 'Hướng dẫn đăng ký thành viên', 'huong-dan-dang-ky-thanh-vien', 'Hướng dẫn sử dụng', 'Hướng dẫn sử dụng', '<p> </p>\r\n\r\n<p>HƯỚNG DẪN <br>\r\nĐĂNG KÝ THÀNH VIÊN</p>\r\n\r\n<p><strong>Lợi ích khi là thành viên của tinbatdongsan.com</strong></p>\r\n\r\n<p>Đăng tin rao bán/cho thuê trên tinbatdongsan.com miễn phí và không giới hạn về số lượng.</p>\r\n\r\n<p>Quản lý các tin đã đăng: dễ dàng làm mới, up tin, sửa tin hay xóa tin đăng ở trang cá nhân.</p>\r\n\r\n<p><img src="http://tinbatdongsan.com/Images/guide/guide_register4.jpeg"></p>\r\n\r\n<p>Chú ý: Để đảm bảo quyền lợi của mình, Quý vị nên điền đầy đủ và chính xác thông tin cá nhân. Tên liên hệ, số điện thoại, địa chỉ mà quý vị nhập khi đăng ký  thành viên sẽ xuất hiện khi Quý vị đăng tin rao. Nếu muốn thay đổi thông tin liên hệ, Quý vị có thể xóa đi và điền thông tin liên hệ khác</p>', 1, 3, 'http://localhost//template/asset/public/images/sign-up-icon.png', 1475802280, 1475808825, 8),
(12, 'Hướng dẫn đăng tin', 'huong-dan-dang-tin', '', '', '<p><strong>Quý Vị được đăng tin miễn phí không giới hạn trên tinbatdongsan.com bằng cả tài khoản thành viên và tài khoản vãng lai, tuy nhiên, để có thể quản lý được tin đăng của mình, Quý Vị nên đăng tin bằng tài khoản thành viên trên tinbatdongsan.com</strong></p>\r\n\r\n<p>1. Quy định đăng tin quảng cáo</p>\r\n\r\n<p>Người đứng tên đăng ký tài khoản (Khách hàng) sẽ phải hoàn toàn chịu trách nhiệm về các thông tin của mình. Ban quản trị website không chịu trách nhiệm về tính chính xác và trung thực của các tin do Khách hàng đăng lên.</p>\r\n\r\n<p>Gõ Tiếng Việt có dấu, viết hoa đầu dòng, không viết tắt và dùng những ký tự đặc biệt</p>\r\n\r\n<p>Không gộp nhiều bất động sản trong một tin rao</p>\r\n\r\n<p>Không đăng lại tin vẫn còn thời gian hiển thị trên website tinbatdongsan.com</p>\r\n\r\n<p>Tin đăng có đầy đủ thông tin cần thiết: địa chỉ, giá, diện tích, thông tin liên hệ của người bán</p>\r\n\r\n<p>Tin đăng phải chính xác, đặc biệt là về phân loại bất động sản, địa chỉ</p>\r\n\r\n<p>2. Hướng dẫn đăng tin</p>\r\n\r\n<p>Tiêu đề</p>\r\n\r\n<p>Tiêu đề tối thiểu là 30 ký tự và tối đa là 99 ký tự.</p>\r\n\r\n<p>Tiêu đề là yếu tố rất quan trọng vì nó là cái đầu tiên người đọc chú ý.</p>\r\n\r\n<p>Tiêu đề ngoài việc thể hiện hấp dẫn cần đủ ý bao quát được toàn bộ nội dung của tin đăng để người đọc có thể dễ dàng tìm thấy thông tin mà họ cần.</p>\r\n\r\n<p>Ví dụ: Cần bán nhà chính chủ số 100 Hàng Hành, DT 53m2, giá bán 1 tỷ</p>\r\n\r\n<p>Nội dung tin đăng</p>\r\n\r\n<p>Đây là phần để giới thiệu chi tiết bất động sản của Quý vị. Phần này phải bao gồm đầy đủ các thông tin về đặc điểm bất động sản, giá bán hoặc cho thuê, địa chỉ và thông tin liên hệ.</p>\r\n\r\n<p>Phần nội dung không cần thiết quá dài nhưng hãy tập trung vào những quan tâm của Khách hàng: địa điểm, giá, diện tích, các công trình tiện ích xung quanh và thông tin người liên hệ.</p>\r\n\r\n<p>Tiêu đề là yếu tố rất quan trọng vì nó là cái đầu tiên người đọc chú ý.</p>\r\n\r\n<p><strong>Ví dụ:</strong> DT: 4.2x16m, 1 trệt 2 lầu, 3PN 4WC hướng Đông. Nhà cho thuê mới đẹp, có nội thất tiện nghi, phù hợp cho gia đình ở, văn phòng công ty.<br>\r\nNhà thuê đẹp ở mặt tiền đường nội bộ, rộng 8m, hai xe hơi tránh nhau được, đường nhựa thông thoáng.<br>\r\nNhà thuê đối diện tòa nhà Etown, Mekong Town. Nhà cho thuê trong khu vực yên tĩnh, an ninh, có nhiều văn phòng, công ty.<br>\r\nNhà mới đẹp, rộng rãi thoáng mát phù hợp cho mở văn phòng, công ty kết hợp với ở.<br>\r\nGiá: 14 triệu/tháng<br>\r\nLiên hệ: Ms Hoa 0913 760 140</p>\r\n\r\n<p>Hình ảnh</p>\r\n\r\n<p>Một bất động sản không có hình ảnh sẽ kém hấp dẫn hơn một bất động sản có hình ảnh sinh động.</p>\r\n\r\n<p>Một trong những chú ý khi chèn hình ảnh vào tin đăng là:</p>\r\n\r\n<p>- Hình ảnh phải có chất lượng để đảm bảo người xem có thể hình dung rõ bất động sản</p>\r\n\r\n<p>- Hình ảnh phải liên quan đến bất động sản: toàn cảnh ngôi nhà, nội thất, ngoại thất, đường vào…</p>\r\n\r\n<p>- Không sử dụng hình ảnh tượng trưng từ internet, luôn sử dụng hình ảnh thật của bất động sản.</p>\r\n\r\n<p><img src="http://tinbatdongsan.com/Images/guide/guide_post.jpeg"></p>\r\n\r\n<p><strong>CHÚC QUÝ VỊ SỚM GIAO DỊCH THÀNH CÔNG !</strong></p>', 1, 3, 'http://localhost//template/asset/public/images/register_icon.png', 1475805949, 1475809713, 8),
(13, 'Hướng dẫn quản lý tin', 'huong-dan-quan-ly-tin', 'Hướng dẫn quản lý tin', 'Hướng dẫn quản lý tin', '<p><strong>Chỉ khi đăng tin bằng tài khoản thành viên, Quý vị mới có thể sử dụng được các tính năng dưới đây</strong></p>\r\n\r\n<p><img src="http://tinbatdongsan.com/Images/guide/guide_manager.jpeg"></p>\r\n\r\n<p><strong>CHÚC QUÝ VỊ SỚM GIAO DỊCH THÀNH CÔNG !</strong></p>', 1, 3, 'http://localhost//template/asset/public/images/icon-sign-up.png', 1475809082, 1476977873, 8);

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE IF NOT EXISTS `prices` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `min_value` int(11) NOT NULL,
  `max_value` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order_index` int(11) NOT NULL,
  `groups_type` int(11) NOT NULL,
  `units_code_1` int(11) NOT NULL,
  `units_code_2` int(11) NOT NULL,
  `min_price` float NOT NULL,
  `max_price` float NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `name`, `code`, `min_value`, `max_value`, `status`, `order_index`, `groups_type`, `units_code_1`, `units_code_2`, `min_price`, `max_price`) VALUES
(2, 'Thỏa thuận', 1, 0, 0, 1, 0, 1, 0, 0, 0, 0),
(3, 'Dưới 500 triệu', 2, 0, 500, 1, 0, 1, 2, 2, 0, 500),
(4, 'Từ 500 triệu đến 1 tỷ', 3, 500, 1, 1, 0, 1, 2, 3, 500, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `productions`
--

CREATE TABLE IF NOT EXISTS `productions` (
`id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `public_time` int(11) NOT NULL,
  `exp_time` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `author_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `groups_type` int(11) NOT NULL,
  `groups_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `cities_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `districts_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wards_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `projects_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `streets_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `units_code` int(11) NOT NULL,
  `acreage` float NOT NULL,
  `directions_code` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `frontside` float NOT NULL,
  `backside` float NOT NULL,
  `toilet` int(11) NOT NULL,
  `floor` float NOT NULL,
  `view` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gia_tri` float NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `productions`
--

INSERT INTO `productions` (`id`, `title`, `slug`, `content`, `create_time`, `update_time`, `public_time`, `exp_time`, `author_id`, `author_name`, `author_email`, `author_phone`, `author_address`, `thumbnail`, `groups_type`, `groups_code`, `status`, `cities_code`, `districts_code`, `wards_code`, `projects_code`, `streets_code`, `price`, `units_code`, `acreage`, `directions_code`, `room`, `frontside`, `backside`, `toilet`, `floor`, `view`, `address`, `address_slug`, `address_title`, `gia_tri`) VALUES
(1, 'Chuyển nhượng lại căn hộ Copac, MT Tôn Đản, Quận 4. Diện tích: 128m2, 3 phòng ngủ', 'chuyen-nhuong-lai-can-ho-copac-mt-ton-dan-quan-4-dien-tich-128m2-3-phong-ngu', 'Chuyển nhượng lại căn hộ Copac, MT Tôn Đản, Quận 4. Diện tích: 128m2, 3 phòng ngủ', 1477649098, 1477649098, 1477587600, 1478883600, 3, 'Phạm Văn Lỉnh', 'admin@gmail.com', '0961119105', 'Hai Phong 1', 'thumbnail.gif', 1, 'ban-kho-nha-xuong', 1, '08', '769', '', '', '', 0, 1, 0, 3, 2, 2, 2, 2, 2, 1, 'Quận 2, Hồ Chí Minh', 'ban-kho-nha-xuong-quan-2', 'Bán kho, nhà xưởng  tại Quận Quận 2', 0),
(2, 'Chuyển nhượng lại căn hộ Copac, MT Tôn Đản, Quận 4. Diện tích: 128m2, 3 phòng ngủ', 'chuyen-nhuong-lai-can-ho-copac-mt-ton-dan-quan-4-dien-tich-128m2-3-phong-ngu', 'Chuyển nhượng lại căn hộ Copac, MT Tôn Đản, Quận 4. Diện tích: 128m2, 3 phòng ngủ', 1477897807, 1477897807, 1477846800, 1479142800, 3, 'Phạm Văn Lỉnh', 'admin@gmail.com', '0961119105', 'Hai Phong 1', 'anh_bat_dong_san_1_1477897808.jpeg', 1, 'ban-loai-bat-dong-san-khac', 1, '08', '760', '26737', '', '', 20, 5, 2, 0, 2, 2, 2, 2, 2, 5, 'Phường Đa Cao, Quận 1, Hồ Chí Minh', 'ban-loai-bat-dong-san-khac-phuong-phuong-da-cao', 'Bán loại bất động sản khác  tại Phường Phường Đa Cao', 40),
(3, 'Căn hộ cầu Nguyễn Khoái Quận 4, kết nối Q1 chỉ 5 phút. LH: 0902645369', 'can-ho-cau-nguyen-khoai-quan-4-ket-noi-q1-chi-5-phut-lh-0902645369', 'Căn hộ cầu Nguyễn Khoái Quận 4, kết nối Q1 chỉ 5 phút. LH: 0902645369', 1477897913, 1477897913, 1477846800, 1479142800, 3, 'Phạm Văn Lỉnh', 'admin@gmail.com', '0961119105', 'Hai Phong 1', 'anh_bat_dong_san_1_1477897913.jpeg', 1, 'ban-loai-bat-dong-san-khac', 1, '08', '769', '', '', '', 2, 3, 20, 0, 2, 2, 2, 2, 2, 2, 'Quận 2, Hồ Chí Minh', 'ban-loai-bat-dong-san-khac-quan-2', 'Bán loại bất động sản khác  tại Quận Quận 2', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cities_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `districts_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_index` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `role`, `status`) VALUES
(1, 'Quản trị viên', 'admin', 1),
(2, 'Thành viên', 'member', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE IF NOT EXISTS `seo` (
`id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `slug`, `keywords`, `description`, `image`, `title`) VALUES
(1, 'trang-chu', 'Bất động sản ,Mua bán nhà đất, Cho thuê nhà đất', 'www.batdongsanflan.com.vn  website đăng tin mua bán rao vặt cho thuê bất động sản, nhà đất tại Việt Nam', 'http://localhost//batdongsanflan.com.vn/asset/public/images/banner.png', 'Bất động sản | Mua bán nhà đất | Cho thuê nhà đất'),
(2, 'dang-tin', 'Đăng tin rao vặt mua bán bất động sản , Tin cho thuê bất động sản,  Đăng thông tin mua bán nhà đất', 'Đăng tin rao vặt mua bán bất động sản | Tin cho thuê bất động sản | Đăng thông tin mua bán nhà đất', 'http://localhost//batdongsanflan.com.vn/asset/public/images/Banner_BDS.png', 'Đăng tin rao vặt mua bán bất động sản | Tin cho thuê bất động sản | Đăng thông tin mua bán nhà đất'),
(3, 'cam-nang-tu-van', 'Cẩm nang tư vấn', 'Cẩm nang tư vấn chuyên tư vấn các vấn đề về nhà đất, bất động sản, các hướng dẫn thủ tục pháp lý về bất động sản', 'http://localhost//batdongsanflan.com.vn/asset/public/images/item-bds-6.jpg', 'Cẩm nang tư vấn'),
(4, 'tin-tuc-du-an', 'Tin tức dự án,  Thông tin dự án bất động sản nổi bật', 'Tin tức dự án | Thông tin dự án bất động sản nổi bật', 'http://localhost//batdongsanflan.com.vn/asset/public/images/banner-bat-dong-san-landviet.jpg', 'Tin tức dự án | Thông tin dự án bất động sản nổi bật'),
(7, 'site-map', 'Site map', 'Site map - Sơ đồ tìm kiếm thông tin bất động sản trên website http://batdongsanflan.com.vn', 'http://localhost/batdongsanflan.com.vn/asset/public/images/thumb-default.gif', 'Site map - Sơ đồ tìm kiếm thông tin bất động sản trên website http://batdongsanflan.com.vn');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
`id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zalo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `slug`, `email`, `zalo`, `facebook`, `phone`, `banner`, `banner_link`, `skype`, `address`) VALUES
(1, 'setting', 'phamvanlinh.tlhp@gmail.com', '', '', '0961119105', 'http://localhost//batdongsanflan.com.vn/asset/public/images/banner.png', '', '', '322B Lý Thường Kiệt, Phường 14, Quận 10, TP. Hồ Chí Minh.');

-- --------------------------------------------------------

--
-- Table structure for table `streets`
--

CREATE TABLE IF NOT EXISTS `streets` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_index` int(11) NOT NULL,
  `cities_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `districts_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `order_index` int(11) NOT NULL,
  `groups_type` int(11) NOT NULL,
  `he_so` float NOT NULL,
  `he_nhan` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `code`, `status`, `order_index`, `groups_type`, `he_so`, `he_nhan`) VALUES
(1, 'Thỏa thuận', 1, 1, 0, 1, 0, 0),
(2, 'Triệu', 2, 1, 0, 1, 1, 0),
(3, 'Tỷ', 3, 1, 0, 1, 1000, 0),
(4, 'Trăm nghìn / m2', 4, 1, 0, 1, 0.001, 0),
(5, 'Triệu/m2', 5, 1, 0, 1, 1, 1),
(6, 'Thỏa thuận', 6, 1, 0, 2, 0, 0),
(7, 'Trăm nghìn / tháng', 7, 1, 0, 2, 0.001, 0),
(8, 'Triệu/tháng', 8, 1, 0, 2, 1, 0),
(9, 'Trăm nghìn/m2/tháng', 9, 1, 0, 2, 0.001, 0),
(10, 'Triệu/m2/tháng', 10, 1, 0, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `birthday` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `zalo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `full_name`, `status`, `birthday`, `create_time`, `update_time`, `address`, `phone`, `email`, `role`, `avatar`, `facebook`, `zalo`, `skype`) VALUES
(3, 'e10adc3949ba59abbe56e057f20f883e', 'Phạm Văn Lỉnh', 1, 0, 1472959081, 1472959081, 'Hai Phong 1', '0961119105', 'admin@gmail.com', 'admin', 'http://localhost//template/asset/public/images/pham-van-linh.png', 'phamvanlinh', 'linh', '123456'),
(4, '79c98f7e40447d7f7683e414bc5d58ea', 'linh', 1, 0, 1472912513, 1472912513, 'Hai Phong 1', '09611191051', 'phamvanlinh.tlhp@gmail.com', 'member', 'http://localhost/batdongsanflan.com.vn/asset/public/images/avatar-default.png', 'phamvanlinh', 'linh', '123456'),
(5, 'e10adc3949ba59abbe56e057f20f883e', 'Người dùng', 1, 0, 1475650335, 0, 'Hà Nội Một trăm mười hai', '0961119106', 'user@gmail.com', 'member', 'http://localhost/batdongsanflan.com.vn/asset/public/images/avatar-default.png', '', '', ''),
(6, 'e10adc3949ba59abbe56e057f20f883e', 'Phạm', 1, 0, 1476196250, 0, 'Hà Nội Một trăm mười hai', '12345678901', 'phamvanlinh.tlhp@gmail.com1', 'member', '', '', '', ''),
(7, 'e10adc3949ba59abbe56e057f20f883e', 'Phạm Văn', 1, 0, 1476886274, 0, 'Hà Nội Một trăm mười hai', '012961119106', 'phamvanlinh12.tlhp@gmail.com', 'member', '', '', '', ''),
(8, 'e4ef81499df0371c8bbb0c2a43d17a75', 'Dũng Phạm', 1, 0, 1476958993, 0, 'Hải Phòng', '09612345667', 'linh.pham@point.com.vn', 'member', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE IF NOT EXISTS `wards` (
`id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_index` int(11) NOT NULL,
  `districts_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cities_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `name`, `type`, `status`, `slug`, `code`, `order_index`, `districts_code`, `cities_code`, `view`) VALUES
(11, 'Phường Tân Định', 'Phường', 1, 'phuong-phuong-tan-dinh', '26734', 1, '760', '08', 0),
(12, 'Phường Đa Cao', 'Phường', 1, 'phuong-phuong-da-cao', '26737', 2, '760', '08', 0),
(13, 'Phường Bến Nghé', 'Phường', 1, 'phuong-phuong-ben-nghe', '26740', 3, '760', '08', 0),
(14, 'Phường Bến Thành', 'Phường', 1, 'phuong-phuong-ben-thanh', '26743', 4, '760', '08', 0),
(15, 'Phường Nguyễn Thái Bình', 'Phường', 1, 'phuong-phuong-nguyen-thai-binh', '26746', 5, '760', '08', 0),
(16, 'Phường Phạm Ngũ Lão', 'Phường', 1, 'phuong-phuong-pham-ngu-lao', '26749', 6, '760', '08', 0),
(17, 'Phường Cầu Ông Lãnh', 'Phường', 1, 'phuong-phuong-cau-ong-lanh', '26752', 7, '760', '08', 0),
(18, 'Phường Cô Giang', 'Phường', 1, 'phuong-phuong-co-giang', '26755', 8, '760', '08', 0),
(19, 'Phường Nguyễn Cư Trinh', 'Phường', 1, 'phuong-phuong-nguyen-cu-trinh', '26758', 9, '760', '08', 0),
(20, 'Phường Cầu Kho', 'Phường', 1, 'phuong-phuong-cau-kho', '26761', 10, '760', '08', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acreages`
--
ALTER TABLE `acreages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acreage_lever`
--
ALTER TABLE `acreage_lever`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `directions`
--
ALTER TABLE `directions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productions`
--
ALTER TABLE `productions`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streets`
--
ALTER TABLE `streets`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acreages`
--
ALTER TABLE `acreages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `acreage_lever`
--
ALTER TABLE `acreage_lever`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `directions`
--
ALTER TABLE `directions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `productions`
--
ALTER TABLE `productions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `streets`
--
ALTER TABLE `streets`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
