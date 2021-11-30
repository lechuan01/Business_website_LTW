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
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`account_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;


ALTER TABLE `product` ADD COLUMN `thumnail` VARCHAR(255) NOT NULL; 
ALTER TABLE `blog` ADD COLUMN `thumnail` VARCHAR(255) NOT NULL; 
select * from `product`;


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

AS A,`product_image` AS B WHERE A.id = B.product_id;

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

drop table blog_image;

CREATE TABLE blog_content (
	blog_id int(11) NOT NULL,
  id int AUTO_INCREMENT PRIMARY KEY,
  content longtext,
  type varchar(10) NOT NULL
)

INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('1111','Epic bắt đầu sự kiện game giảm giá Black Friday 2021, mời các bạn vào săn game sale cuối năm.','title');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('1111','Đến hẹn lại lên, lại một mùa sale Black Friday nữa của Epic Games Store diễn ra, mang lại nhiều giá giảm siêu hời cho các bạn game thủ có nhu cầu quẹo lựa mua game cuối năm. Đợt Black Friday lần này sẽ có mức giá giảm lên tới 75% tùy game, và kéo dài cho tới ngày 30/11 mới kết thúc, một khoảng thời gian dư dả cho các bạn tha hồ mà lựa game hoặc… tích lúa. ','text');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('1111','epic-games-store-black-friday-banner.jpg','img');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('1111','Các bạn có thể truy cập trang web Black Friday chính thức của Epic Games Store tại đây, hoặc tham khảo một số tựa game mà GVN 360 tụi mình cảm thấy là đáng mua nhất trong đợt giảm giá lần này.','text');

ALTER TABLE blog_content add COLUMN `link`varchar(255);
INSERT INTO `blog_content`(`blog_id`, `content`, `type`, `link`) VALUES ('1111','Back 4 Blood: Standard Edition (giảm 30% còn 693.000 VND)','link','https://www.epicgames.com/store/en-US/p/back-4-blood');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`, `link`) VALUES ('1111','Crysis Remastered Trilogy (giảm 20% còn 372.800 VND)','link','https://www.epicgames.com/store/en-US/p/back-4-blood');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`, `link`) VALUES ('1111','World War Z: Aftermath (giảm 25% còn 279.750 VND)','link','https://www.epicgames.com/store/en-US/p/back-4-blood');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`, `link`) VALUES ('1111','Conan Exiles (giảm 70% còn 95.999 VND)','link','https://www.epicgames.com/store/en-US/p/back-4-blood');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`, `link`) VALUES ('1111','Red Dead Redemption 2 (giảm 50% còn 500.000 VND)','link','https://www.epicgames.com/store/en-US/p/back-4-blood');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`, `link`) VALUES ('1111','HITMAN 3 (giảm 60% còn 222.000 VND)','link','https://www.epicgames.com/store/en-US/p/back-4-blood');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`, `link`) VALUES ('1111','Borderlands 3 (giảm 75% còn 247.500 VND)','link','https://www.epicgames.com/store/en-US/p/back-4-blood');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`, `link`) VALUES ('1111','Back 4 Blood: Standard Edition (giảm 30% còn 693.000 VND)','link','https://www.epicgames.com/store/en-US/p/back-4-blood');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`, `link`) VALUES ('1111','Crysis Remastered Trilogy (giảm 20% còn 372.800 VND)','link','https://www.epicgames.com/store/en-US/p/back-4-blood');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`, `link`) VALUES ('1111','World War Z: Aftermath (giảm 25% còn 279.750 VND)','link','https://www.epicgames.com/store/en-US/p/back-4-blood');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`, `link`) VALUES ('1111','Conan Exiles (giảm 70% còn 95.999 VND)','link','https://www.epicgames.com/store/en-US/p/back-4-blood');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`, `link`) VALUES ('1111','Red Dead Redemption 2 (giảm 50% còn 500.000 VND)','link','https://www.epicgames.com/store/en-US/p/back-4-blood');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`, `link`) VALUES ('1111','HITMAN 3 (giảm 60% còn 222.000 VND)','link','https://www.epicgames.com/store/en-US/p/back-4-blood');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`, `link`) VALUES ('1111','Borderlands 3 (giảm 75% còn 247.500 VND)','link','https://www.epicgames.com/store/en-US/p/back-4-blood');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('1111','Cảm ơn các bạn đã quan tâm theo dõi!','h4');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('1111','Tóm tắt:','h4');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('1111','Lại một mùa sale Black Friday nữa của Epic Games Store diễn ra','list');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('1111','Đợt Black Friday lần này sẽ có mức giá giảm lên tới 75% tùy game','list');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('1111','Black Friday sẽ kéo dài cho tới ngày 30/11 mới kết thúc, các bạn truy cập website Epic Games Store','list');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('1111','Mời các bạn theo dõi fanpage của chúng mình theo đường link dưới đây để cập nhật những tin tức về game, công nghệ và nhiều thông tin thú vị khác nữa nhé!','footer');

INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('2222','Vì chiến tranh thương mại Mỹ – Trung đang căng thẳng nên nhà máy sản xuất tại Trung Quốc phải mất vài năm nữa mới có được những trang thiết bị hiện đại hơn.','title');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('2222','CEO Lee Seok-Hee của hãng sản xuất RAM Hàn Quốc SK Hynix vừa mới cho biết công ty sẽ tùy cơ ứng biến dựa theo tình hình chiến tranh thương mại giữa Hoa Kỳ và Trung Quốc, nhất là về việc lắp đặt các trang thiết bị máy móc sản xuất chip tiên tiến ở các nhà máy tại Trung Quốc. SK Hynix là 1 trong những nhà máy sản xuất môđun RAM lớn nhất thế giới, và hiện họ đang có kế hoạch nâng cấp các nhà máy với công cụ EUV (extreme ultraviolet light) để tạo ra những sản phẩm xịn sò hơn.','text');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('2222','b4954fd7c730a136efc696c96edabd6d-scaled-1-1024x576.jpg','img');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('2222','Ngặt nỗi những chiếc máy máy đó được chính phủ Hoa Kỳ quản lý, và họ đã cấm hãng sản xuất những chiếc máy này xuất khẩu nó sang Trung Quốc do lo ngại là nước này sẽ dùng nó để tạo ra sản phẩm cho quân đội Trung Quốc.','text');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('2222','Lùm xùm liên quan đến các nhà mày ở Trung Quốc đã được Reuters tiết lộ cách đây ít lâu, cho biết các kế hoạch nâng cấp nhà máy sản xuất RAM của SK Hynix tại Vô Tích, Trung Quốc có nguy cơ bất thành do Mỹ không muốn các công cụ EUV cập bến Trung Quốc. CEO của SK Hynix nói rằng chip DRAM thế hệ thứ tư đã được sản xuất tại Hàn Quốc từ hồi tháng 7, và để áp dụng công nghệ tương tự cho nhà máy tại Trung Quốc thì vẫn sẽ còn một chặng đường dài phía trước.v','text');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('2222','Chip-with-flag-1024x576.jpg','img');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('2222','Những môđun RAM mà ông Lee Seok-Hee đề cập đến được sản xuất dựa trên tiến trình 10 nm bằng máy EUV. Máy này được sản xuất bởi công ty ASML ở Hà Lan, và đây cũng là công ty duy nhất trên thế giới có khả năng sản xuất ra chiếc máy này. Họ có dùng một số công nghệ của Mỹ, cho nên Mỹ có quyền ngăn họ bán cho các bên khác nếu thấy nó ảnh hưởng đến an ninh quốc gia.','text');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('2222','Roh Geun-chang – Trưởng bộ phận nghiên cứu công nghệ tại HMC Investment & Securities – cho rằng nhà máy của SK Hynix tại Trung Quốc sẽ phải mất một vài năm mới có thể nhập được máy móc tiên tiến của hãng ASML. Tuy nhiên, ông nghĩ vẫn có cách giải quyết vấn đề theo cách ngoại giao, do SK Hynix không phải là công ty Trung Quốc.','text');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('2222','https3A2F2Fs3-ap-northeast-1.amazonaws.com2Fpsh-ex-ftnikkei-3937bb42Fimages2F52F72F52F42F21384575-1-eng-GB2F0730569-1024x576.jpg','img');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('2222','Nhà máy của SK Hynix tại Vô Tích đóng vai trò sản xuất một nửa sản lượng môđun DRAM của công ty, và nó chiếm 15% tổng sản lượng trên toàn cầu.','text');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('2222','Tóm tắt ý chính:','h4');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('2222','Roh Geun-chang – Trưởng bộ phận nghiên cứu công nghệ tại HMC Investment & Securities – cho rằng nhà máy của SK Hynix tại Trung Quốc sẽ phải mất một vài năm mới có thể nhập được máy móc tiên tiến','list');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('2222','Lý do là vì những máy này đang bị Mỹ cấm xuất khẩu sang Trung Quốc do lo ngại nước này sẽ dùng nó để phục vụ cho quân đội','list');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('2222','CEO Lee Seok-Hee của SK Hynix cho biết công ty sẽ linh hoạt trong việc xử lý vấn đề này','list');
INSERT INTO `blog_content`(`blog_id`, `content`, `type`) VALUES ('2222','Mời các bạn theo dõi fanpage của chúng mình theo đường link dưới đây để cập nhật những tin tức về game, công nghệ và nhiều thông tin thú vị khác nữa nhé!','footer');

INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','Đồng hồ thông minh Huawei Watch GT 3 sở hữu thiết kế trẻ trung và hiện đại, cùng với đó là các tính năng hiện đại giúp nâng cao trải nghiệm người dùng.','title');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','Huawei Việt Nam vừa mới ra mắt dòng đồng hồ thông minh Watch GT 3 gồm 2 phiên bản 46mm, 42mm và Watch GT Runner trang bị nền tảng HarmonyOS 2.1. Huawei Watch GT 3 có thiết kế trẻ trung, giao diện hiện đại, giúp bạn dễ dàng thể hiện cá tính và phong cách cá nhân. Thời lượng pin lên đến 14 ngày kết hợp với các tính năng tiên tiến như định vị 5 vệ tinh giúp cải thiện trải nghiệm của người dùng.','text');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','Z6Z_8382-1-min.jpg','img');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','Huawei Watch GT 3 có thời lượng pin dài, thiết kế thời thượng phù hợp mọi phong cách thời trang','title');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','Điểm nhấn trong thiết kế của chiếc đồng hồ này là sự kết hợp hài hòa giữa vẻ đẹp cổ điển từ chiếc đồng hồ truyền thống với những công nghệ cao cấp và hiện đại đến từ Huawei. Tối giản và gọn nhẹ chính là những yếu tố nổi bật của chiếc đồng hồ thông minh này. Cụ thể, nếu không có dây đeo thì chiếc Huawei Watch GT 3 46mm chỉ nặng 42,6g với độ dày tổng thể là 11mm, và phiên bản 42mm nặng 35g với độ dày tổng thể là 10,2mm.','text');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','MKT_Jupiter_Milo_Creative-Lifestyle-Shot_HQ_MKT_Jupiter_Lifestyle-shot_Male_Oxygen-Blood_EN_JPG_20210916-min.jpg','img');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','Huawei Watch GT 3 46mm có thời lượng pin lên đến 14 ngày, còn Huawei Watch GT 3 42mm có thời lượng pin lên đến 7 ngày ở mức sử dụng thông thường, đảm bảo tối ưu hóa thời gian sử dụng và trải nghiệm cho người dùng trong cả ngày dài.','text');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','Nhằm mang đến trải nghiệm tương tác thông minh cho người dùng, chiếc đồng hồ này được trang bị núm xoay có phản hồi xúc giác, nhận dạng cử động ngón tay với độ chính xác cao. Giao diện được thiết kế mô phỏng như bàn cờ, giúp người dùng dễ dàng thao tác di chuyển và thu phóng. Mặt đồng hồ luôn hiển thị giúp truy cập dữ liệu vận động và ứng dụng chỉ bằng cách nhấc cổ tay.','text');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','Nhằm mang đến trải nghiệm tương tác thông minh cho người dùng, chiếc đồng hồ này được trang bị núm xoay có phản hồi xúc giác, nhận dạng cử động ngón tay với độ chính xác cao. Giao diện được thiết kế mô phỏng như bàn cờ, giúp người dùng dễ dàng thao tác di chuyển và thu phóng. Mặt đồng hồ luôn hiển thị giúp truy cập dữ liệu vận động và ứng dụng chỉ bằng cách nhấc cổ tay.','img');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','Hơn hết, đây là thế hệ đầu tiên của dòng GT được xây dựng trên nền tảng HarmonyOS 2.1, giúp duy trì thiết kế thống nhất với các sản phẩm HarmonyOS khác và cho phép người dùng trải nghiệm các tính năng tương tác như trên chiếc điện thoại thông minh.','text');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','Huawei Watch GT 3 được nâng cấp tính năng theo dõi sức khỏe và vận động một cách khoa học','title');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','MKT_Jupiter_Milo_Creative-Lifestyle-Shot_HQ_MKT_Jupiter_Lifestyle-shot_男_潜水_EN_JPG_20210910-min.jpg','img');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','Huawei Watch GT 3 sở hữu 5 hệ thống vệ tinh: GPS, Beidou, GLONASS, Galileo, QZSS. Trong đó, GPS, Beidou và GLONASS là hệ thống định vị vệ tinh toàn cầu, và QZSS là hệ thống định vị vệ tinh độc lập do Nhật Bản phát triển, chủ yếu bao phủ toàn bộ khu vực Đông Nam Á. Đồng thời, sản phẩm này còn được tích hợp chip định vị GNSS 5 hệ thống băng tần kép, có khả năng chống nhiễu tốt hơn. Nhờ vậy mà thiết bị có tốc độ tìm kiếm nhanh chính xác, giúp ghi lại mọi hoạt động của người dùng. Sau khi hoàn thành đường chạy, GPS sẽ tự động tạo lộ trình chạy, người dùng có thể chia sẻ ngay với bạn bè trên ứng dụng HUAWEI Health.','text');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','MKT_Jupiter_Milo_Creative-Lifestyle-Shot_HQ_MKT_Jupiter_Lifestyle-shot_男_骑行_EN_JPG_20210910-min.jpg','img');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','Thế hệ Huawei Watch GT 3 trở nên mạnh mẽ hơn nhờ sở hữu công nghệ theo dõi nhịp tim Huawei TruSeenTM 5.0+ và PPG 5.0 giúp tăng cường độ chính xác khi theo dõi nhịp tim và chỉ số SpO2. GT 3 còn có thể theo dõi sức khỏe ngay cả trong các tình huống nhịp tim thay đổi nhanh như chạy nước rút, bơi và nhảy dây. Thiết bị này còn có các tính năng theo dõi giấc ngủ, mức độ căng thẳng và chu kỳ kinh nguyệt theo thời gian thực để quản lý sức khỏe của người dùng một cách toàn diện.','text');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','MKT_Jupiter_Milo_Creative-Lifestyle-Shot_HQ_MKT_Milo_Lifestyle-shot_Female_Cycling_EN_JPG_20210916-min.jpg','img');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','Huawei Watch GT 3 có khả năng ghi lại và phân tích dữ liệu tập luyện của người dùng, xác định giai đoạn cơ bản, giai đoạn nâng cao, giai đoạn củng cố và giai đoạn giảm dần theo mức độ và mục tiêu thể thao hiện tại, sau đó điều chỉnh cường độ tập luyện và tăng dần khối lượng tập luyện để cải thiện thể lực. Chiếc đồng hồ này có hơn 100 chế độ tập luyện từ cơ bản đến chuyên nghiệp, cho phép người dùng tùy chọn và đạt đến mục tiêu sức khỏe trong những hoạt động tập luyện hàng ngày.','text');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','Huawei Watch GT 3 hỗ trợ cá nhân hóa các tính năng sức khỏe và kế hoạch luyện tập','title');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','Huawei Watch GT 3 được tích hợp và công nghệ AI Running Coach, dựa trên việc thực hiện kế hoạch vận động hàng tuần và phản hồi của cơ thể để tự động điều chỉnh trong tuần tiếp theo, đảm bảo kế hoạch tập luyện phù hợp và hiệu quả. Bên cạnh đó, thiết bị còn có khả năng phân tích hiệu quả chạy sau mỗi lần luyện tập, giúp người dùng hiểu được tiến trình luyện tập và thấy rõ được ​​sự cải thiện của bản thân.','text');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','MKT_Jupiter_Milo_Creative-Lifestyle-Shot_HQ_MKT_Jupiter_Lifestyle-shot_男_跑步_EN_JPG_20210910-min-1.jpg','img');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','Ngoài ra, Healthy Living Shamrock cũng được cải tiến, bổ sung nhiều tính năng để phù hợp với nhu cầu theo dõi sức khỏe hàng ngày. Thông qua các cài đặt được cá nhân hóa, người dùng có thể nhận được những lời nhắc thường xuyên như chạy bộ, lượng nước uống, thiền, nhắc nhở ngủ sớm, tập thể dục và giữ tinh thần lạc quan, vân vân.','text');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','Huawei Watch GT 3 tương thích với nhiều thiết bị','title');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','DSC_1102-min.jpg','img');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','Huawei Watch GT 3 có thể kết nối với điện thoại thông minh Android và iOS. Bên cạnh đó, người dùng có thể quản lý sức khỏe trên Ứng dụng HUAWEI Health, chẳng hạn như theo dõi dữ liệu tập luyện, theo dõi nhịp tim, theo dõi SpO2, vân vân. Thông tin thêm về sản phẩm mọi người có thể tham khảo theo đường link dưới đây nhé.','text');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`,`link`) VALUES ('3333','Huawei Watch GT 3: https://consumer.huawei.com/vn/wearables/watch-gt3/','link', 'https://consumer.huawei.com/vn/wearables/watch-gt3/');
INSERT INTO `blog_content`(`blog_id`,`content`, `type`) VALUES ('3333','Mời các bạn theo dõi fanpage của chúng mình theo đường link dưới đây để cập nhật những tin tức về game, công nghệ và nhiều thông tin thú vị khác nữa nhé!','footer');