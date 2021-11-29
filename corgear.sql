-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2021 at 04:50 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
-- drop database corgear;
create database corgear;
use corgear;
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
select * from `accounts`;
CREATE TABLE `accounts` (
  `id` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `belong`
--
#SELECT * FROM `accounts` WHERE id = '61a24ca06ca6f';
CREATE TABLE `belong` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------
--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `post_time` datetime DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL,
  `specs` varchar(1000) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
INSERT INTO `review` VALUE(10002,1,"gất tuyệt dời","61a24ca06ca6f");

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
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `orders` DROP FOREIGN KEY `orders_ibfk_1`; 
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
ALTER TABLE `review` DROP FOREIGN KEY `review_ibfk_2`; 
ALTER TABLE `review` ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `accounts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `product` ADD COLUMN `thumnail` VARCHAR(255) NOT NULL; 
ALTER TABLE `blog` ADD COLUMN `thumnail` VARCHAR(255) NOT NULL; 
select * from `product`;
use corgear;
INSERT INTO `orders` VALUES(554924326,'Đang xử lý','cash',NOW(),275000,'61a24ca06ca6f');
INSERT INTO `belong` VALUES(554924326,10001,5,30000);INSERT INTO `belong` VALUES(554924326,10002,2,50000);
#delete from `product` where id >0;
insert into `product` values(10001,30000,'','CORSAIR K65 MINI BLACK','keyboard',30,'ban-phim-co-corsair-k65-mini.jpg');
insert into `product` values(10002,50000,'','CORSAIR K63 CÓ DÂY','keyboard',30,'corsair-k63-wire.jpg');
insert into `product` values(10003,60000,'','Apple Headphones','headphone',60,'headphones-apple-beats-studio-red-headphones.png');

insert into `product_image` values(10001,'QeAPsgjcEeKO2v8u.jpg');
insert into `product_image` values(10001,'corsair-k65-rgb-mini-07.jpg');
insert into `product_image` values(10001,'5510059_194111351_4354441971253318_4592268824123829596_n.jpg');
insert into `product_image` values(10001,'switch-cua-ban-phim-corsair-k65-mini-red-sw-usb-rgb-red-switch.jpg');

#insert into `product_image` values(10003,'headphones-apple-beats-studio-red-headphones.png');


SELECT * FROM `product` WHERE id = 10001;
SELECT image FROM `product_image` WHERE product_id = 10001;


INSERT INTO `blog` VALUES ('1111','2021-11-24','Axium Fox',
  'Sự kiện Epic Black Friday 2021 chính thức bắt đầu, mời các bạn quẹo lựa “loot” game',
  'Epic bắt đầu sự kiện game giảm giá Black Friday 2021, mời các bạn vào săn game sale cuối năm.

    Đến hẹn lại lên, lại một mùa sale Black Friday nữa của Epic Games Store diễn ra, mang lại nhiều giá giảm siêu hời cho các bạn game thủ có nhu cầu quẹo lựa mua game cuối năm. Đợt Black Friday lần này sẽ có mức giá giảm lên tới 75% tùy game, và kéo dài cho tới ngày 30/11 mới kết thúc, một khoảng thời gian dư dả cho các bạn tha hồ mà lựa game hoặc… tích lúa. ',
  'xlarge-1068x580.jpg');
INSERT INTO `blog` VALUES ('2222','2021-11-24','Thúy Ngân',
  'Trung Quốc sẽ khó nhập máy móc sản xuất chip tiên tiến trong nhiều năm',
  'Vì chiến tranh thương mại Mỹ – Trung đang căng thẳng nên nhà máy sản xuất tại Trung Quốc phải mất vài năm nữa mới có được những trang thiết bị hiện đại hơn.

    CEO Lee Seok-Hee của hãng sản xuất RAM Hàn Quốc SK Hynix vừa mới cho biết công ty sẽ tùy cơ ứng biến dựa theo tình hình chiến tranh thương mại giữa Hoa Kỳ và Trung Quốc, nhất là về việc lắp đặt các trang thiết bị máy móc sản xuất chip tiên tiến ở các nhà máy tại Trung Quốc. SK Hynix là 1 trong những nhà máy sản xuất môđun RAM lớn nhất thế giới, và hiện họ đang có kế hoạch nâng cấp các nhà máy với công cụ EUV (extreme ultraviolet light) để tạo ra những sản phẩm xịn sò hơn.',
  'chip1068x580.jpg');
INSERT INTO `blog` VALUES ('3333','2021-11-24','Thiên Bảo',
  'Huawei ra mắt đồng hồ thông minh Watch GT 3 tại Việt Nam',
  'Đồng hồ thông minh Huawei Watch GT 3 sở hữu thiết kế trẻ trung và hiện đại, cùng với đó là các tính năng hiện đại giúp nâng cao trải nghiệm người dùng.

  Huawei Việt Nam vừa mới ra mắt dòng đồng hồ thông minh Watch GT 3 gồm 2 phiên bản 46mm, 42mm và Watch GT Runner trang bị nền tảng HarmonyOS 2.1. Huawei Watch GT 3 có thiết kế trẻ trung, giao diện hiện đại, giúp bạn dễ dàng thể hiện cá tính và phong cách cá nhân. Thời lượng pin lên đến 14 ngày kết hợp với các tính năng tiên tiến như định vị 5 vệ tinh giúp cải thiện trải nghiệm của người dùng.',
  'Watch.jpg');
INSERT INTO `blog` VALUES ('4444','2021-11-23','Hoài Nam',
  'Top 8 tựa game nhập vai hay nhất theo phong cách Steampunk',
  'Cái hay của game nhập vai là thế giới trong game có thể được lấy cảm hứng từ nhiều thứ khác nhau: từ vùng đất fantasy đầy huyền bí, cho đến những tòa nhà chọc trời công nghệ cao trong tương lai, đủ mọi thể loại cho bạn lựa chọn. Trong đó, phong cách steampunk thường không được nhắc đến nhiều cho lắm, nhưng một khi đã bước chân vào thế giới game đó rồi thì nhiều khi quên lối về luôn các bạn ạ.

    Steampunk kết hợp các bối cảnh lịch sử với các máy móc công nghiệp, máy hơi nước thay vì những thiết bị công nghệ hiện đại như ngày nay. Đôi lúc, nó cũng pha lẫn một chút yếu tố fantasy trong đó để tăng thêm phần thú vị. Sau đây là top 8 tựa game nhập vai hay nhất theo phong cách Steampunk mà các bạn nên trải nghiệm thử nhé.',
  'Game-nhap-vai-Steampunk-9-1.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
