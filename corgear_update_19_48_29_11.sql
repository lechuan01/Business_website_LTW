-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2021 at 01:48 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corgear`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `full_name`, `password`, `phone_number`, `email`, `address`, `role`) VALUES
('61a4c2465a3f1', 'Nguyễn Thiên Bảo', '$2y$10$NjTLaTFlUtWgYT4amZJIbes711IgE9QSIRE.SI1awnLwwF/Kpzfky', 936010095, 'baonguyen@gmail.com', '12, đường số 3, quận 4', 'MEM');

-- --------------------------------------------------------

--
-- Table structure for table `belong`
--

CREATE TABLE `belong` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `belong`
--

INSERT INTO `belong` (`order_id`, `product_id`, `quantity`, `price`) VALUES
(108556449, 10002, 2, 1600000);

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `post_time` datetime DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `thumnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `post_time`, `author`, `title`, `content`, `thumnail`) VALUES
(1111, '2021-11-24 00:00:00', 'Axium Fox', 'Sự kiện Epic Black Friday 2021 chính thức bắt đầu, mời các bạn quẹo lựa “loot” game', 'Epic bắt đầu sự kiện game giảm giá Black Friday 2021, mời các bạn vào săn game sale cuối năm.\r\n\r\n    Đến hẹn lại lên, lại một mùa sale Black Friday nữa của Epic Games Store diễn ra, mang lại nhiều giá giảm siêu hời cho các bạn game thủ có nhu cầu quẹo lựa mua game cuối năm. Đợt Black Friday lần này sẽ có mức giá giảm lên tới 75% tùy game, và kéo dài cho tới ngày 30/11 mới kết thúc, một khoảng thời gian dư dả cho các bạn tha hồ mà lựa game hoặc… tích lúa. ', 'xlarge-1068x580.jpg'),
(2222, '2021-11-24 00:00:00', 'Thúy Ngân', 'Trung Quốc sẽ khó nhập máy móc sản xuất chip tiên tiến trong nhiều năm', 'Vì chiến tranh thương mại Mỹ – Trung đang căng thẳng nên nhà máy sản xuất tại Trung Quốc phải mất vài năm nữa mới có được những trang thiết bị hiện đại hơn.\r\n\r\n    CEO Lee Seok-Hee của hãng sản xuất RAM Hàn Quốc SK Hynix vừa mới cho biết công ty sẽ tùy cơ ứng biến dựa theo tình hình chiến tranh thương mại giữa Hoa Kỳ và Trung Quốc, nhất là về việc lắp đặt các trang thiết bị máy móc sản xuất chip tiên tiến ở các nhà máy tại Trung Quốc. SK Hynix là 1 trong những nhà máy sản xuất môđun RAM lớn nhất thế giới, và hiện họ đang có kế hoạch nâng cấp các nhà máy với công cụ EUV (extreme ultraviolet light) để tạo ra những sản phẩm xịn sò hơn.', 'chip1068x580.jpg'),
(3333, '2021-11-24 00:00:00', 'Thiên Bảo', 'Huawei ra mắt đồng hồ thông minh Watch GT 3 tại Việt Nam', 'Đồng hồ thông minh Huawei Watch GT 3 sở hữu thiết kế trẻ trung và hiện đại, cùng với đó là các tính năng hiện đại giúp nâng cao trải nghiệm người dùng.\r\n\r\n  Huawei Việt Nam vừa mới ra mắt dòng đồng hồ thông minh Watch GT 3 gồm 2 phiên bản 46mm, 42mm và Watch GT Runner trang bị nền tảng HarmonyOS 2.1. Huawei Watch GT 3 có thiết kế trẻ trung, giao diện hiện đại, giúp bạn dễ dàng thể hiện cá tính và phong cách cá nhân. Thời lượng pin lên đến 14 ngày kết hợp với các tính năng tiên tiến như định vị 5 vệ tinh giúp cải thiện trải nghiệm của người dùng.', 'Watch.jpg'),
(4444, '2021-11-23 00:00:00', 'Hoài Nam', 'Top 8 tựa game nhập vai hay nhất theo phong cách Steampunk', 'Cái hay của game nhập vai là thế giới trong game có thể được lấy cảm hứng từ nhiều thứ khác nhau: từ vùng đất fantasy đầy huyền bí, cho đến những tòa nhà chọc trời công nghệ cao trong tương lai, đủ mọi thể loại cho bạn lựa chọn. Trong đó, phong cách steampunk thường không được nhắc đến nhiều cho lắm, nhưng một khi đã bước chân vào thế giới game đó rồi thì nhiều khi quên lối về luôn các bạn ạ.\r\n\r\n    Steampunk kết hợp các bối cảnh lịch sử với các máy móc công nghiệp, máy hơi nước thay vì những thiết bị công nghệ hiện đại như ngày nay. Đôi lúc, nó cũng pha lẫn một chút yếu tố fantasy trong đó để tăng thêm phần thú vị. Sau đây là top 8 tựa game nhập vai hay nhất theo phong cách Steampunk mà các bạn nên trải nghiệm thử nhé.', 'Game-nhap-vai-Steampunk-9-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog_image`
--

CREATE TABLE `blog_image` (
  `blog_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `account_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL DEFAULT 1,
  `status` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `cost` int(11) NOT NULL,
  `member_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `status`, `payment_type`, `create_date`, `cost`, `member_id`) VALUES
(108556449, 'Đang xử lý', 'cash', '2021-11-29 19:22:03', 3520000, '61a4c2465a3f1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `specs` varchar(1000) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `thumnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `price`, `specs`, `name`, `category`, `quantity`, `thumnail`) VALUES
(10001, 2000000, 'Bàn phím cơ Corsair K65 RGB MINI Cherry MX Speed/ Red kết hợp hiệu suất cấp cao với tính di động, nó có công nghệ siêu xử lý AXON, Switch cơ CHERRY MX và khả năng tùy chỉnh đặc biệt trong một thiết kế bàn phím cơ nhỏ gọn 60%.', 'CORSAIR K65 MINI BLACK', 'keyboard', 30, 'ban-phim-co-corsair-k65-mini.jpg'),
(10002, 1600000, 'Bề mặt của bàn phím có màu đen cuốn hút cùng với đèn nền đỏ cho thiết kế cá tính, thời thượng, tô điểm cho phòng game của bạn thêm sành điệu. Trọng lượng chỉ 500 gram, kích cỡ gọn gàng cất giữ hoặc mang theo khi đi du lịch đơn giản.', 'Bàn phím Corsair K63 có dây', 'keyboard', 24, 'K63_2.jpeg'),
(10003, 3300000, 'Tai nghe Corsair HS80 RGB Wireless là dòng tai nghe cao cấp không dây, chuyên dành để chơi game với âm thanh không gian - Carbon.     Tai nghe Corsair HS80 RGB Wireless  SKU CA-9011235-NA có kết nối SLIPSTREAM WIRELESS siêu nhanh. Nó mang đến âm thanh cực kỳ rõ nét thông qua trình điều khiển âm thanh neodymium 50mm. Được tuỳ chỉnh điều chỉnh bằng Dolby Atmos® đắm chìm.', 'Tai nghe Corsair HS80 RGB Wireless ', 'headphone', 14, 'HS80_1.jpg'),
(10004, 1900000, '', 'Case Corsiar 275R Airflow White ', 'case', 13, '275R_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`product_id`, `image`) VALUES
(10001, 'K65_1.jpg'),
(10001, 'K65_2.jpg'),
(10001, 'K65_3.jpg'),
(10001, 'K65_4.png'),
(10002, 'K63_1.jpg'),
(10002, 'K63_2.jpeg'),
(10002, 'K63_3.jpg'),
(10002, 'K63_4.jpg'),
(10003, 'HS80_1.jpg'),
(10003, 'HS80_2.jpg'),
(10003, 'HS80_3.jpg'),
(10003, 'HS80_4.jpg'),
(10004, '275R_1.jpg'),
(10004, '275R_2.jpg'),
(10004, '275R_3.jpg'),
(10004, '275R_4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `product_id` int(11) NOT NULL,
  `mark` int(11) DEFAULT NULL,
  `comments` longtext NOT NULL,
  `member_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `belong`
--
ALTER TABLE `belong`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_image`
--
ALTER TABLE `blog_image`
  ADD PRIMARY KEY (`blog_id`,`image`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`product_id`,`image`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`product_id`,`member_id`),
  ADD KEY `member_id` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10005;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `belong`
--
ALTER TABLE `belong`
  ADD CONSTRAINT `belong_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `belong_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blog_image`
--
ALTER TABLE `blog_image`
  ADD CONSTRAINT `blog_image_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
