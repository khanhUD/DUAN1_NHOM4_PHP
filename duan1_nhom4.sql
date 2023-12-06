-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 06, 2023 lúc 07:27 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1_nhom4`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` enum('on','off','delete') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `title`, `link`, `image`, `status`) VALUES
(21, 'Những món ngon đang chờ đón bạn', 'Trang-Chu', 'anhdalat.JPG', 'on');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `full_name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('responded','not_responded') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'not_responded'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `full_name`, `phone`, `email`, `note`, `create_at`, `status`) VALUES
(6, 'John àdgsdfg', '123-456-7890', 'john.doe@example.com', 'Some notes about John Doe', '2023-11-30 13:36:28', 'not_responded'),
(10, 'Lâm Chí Khanh', '0326925595', 'khanhlam.110218@gmail.com', 'Tôi muốn liên hệ trực tiếp với chủ nhà hàng này', '2023-12-04 02:26:21', 'responded'),
(11, 'Lâm Chí Khanh', '0326925595', 'khanhlam.110218@gmail.com', 'hello ní', '2023-12-04 02:26:21', 'not_responded'),
(12, 'sapn', '0326925595', 'abc@gmail.com', 'sdfs', '2023-12-04 02:26:21', 'not_responded'),
(13, 'téd', '0326925595', 'vinhlhpc06526@fpt.edu.vn', 'sdf', '2023-12-04 02:26:21', 'not_responded'),
(14, 'sd', '0326925595', 'vinhlhpc06526@fpt.edu.vn', 'sf', '2023-12-04 02:26:21', 'not_responded'),
(15, 'Lâm Chí Khanh', '0326925595', 'abc@gmail.com', 'hello', '2023-12-04 02:26:21', 'not_responded'),
(16, 'Lâm Chí Khanh', '0326925595', 'abc@gmail.com', 'dfsf', '2023-12-04 02:26:21', 'not_responded'),
(17, 'Lâm Chí Khanh', '0326925595', 'abc@gmail.com', 'sff', '2023-12-04 02:26:21', 'not_responded'),
(18, 'Lâm Chí Khanh', '0774567890', 'khanhlam.110218@gmail.com', 'sdf', '2023-12-04 02:26:21', 'not_responded'),
(19, 'Lâm Chí Khanh', '0326925595', 'abc@gmail.com', 'sfd', '2023-12-04 02:26:21', 'not_responded'),
(20, 'Lâm Chí Khanh', '0356789765', 'vinhlhpc06526@fpt.edu.vn', 'sdf', '2023-12-04 02:26:21', 'not_responded'),
(21, 'Lâm Chí Khanh', '0356789755', 'khanhlam.110218@gmail.com', 'dfs', '2023-12-04 03:20:44', 'not_responded'),
(22, 'Lâm Chí Khanh', '0356789765', 'khanh@gmail.com', 'sfsfs', '2023-12-04 21:22:22', 'not_responded');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` enum('pending','accepted','cancel','delate') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'pending',
  `total_money` decimal(10,2) NOT NULL,
  `voucher_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `total_money`, `voucher_id`, `created_at`, `full_name`, `address`, `note`, `phone`) VALUES
(1, 1, 'accepted', 100.00, 1, '2023-11-30 08:15:15', 'John Doe', '123 Main St', 'First invoice', '0234567890'),
(2, 2, 'cancel', 200.00, 1, '2023-11-30 08:15:48', 'Khanh', 'Cần thơ', 'Hihihihih', '0234567890'),
(3, 3, 'accepted', 150.00, 2, '2023-11-30 18:41:37', 'Nguyễn Trung Hiếu', '456 XYZ St', 'Second invoice', '0123456789'),
(4, 4, 'accepted', 80.00, 1, '2023-11-30 18:41:37', 'Lý Công Thành', '789 ABC St', 'Third invoice', '0123456780');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_table`
--

CREATE TABLE `orders_table` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `status` enum('pending','accepted','cancel','delate') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `phone` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `number_people` int DEFAULT NULL,
  `arrival_date` date DEFAULT NULL,
  `arrival_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_table`
--

INSERT INTO `orders_table` (`id`, `user_id`, `status`, `phone`, `full_name`, `number_people`, `arrival_date`, `arrival_time`) VALUES
(1, 1, 'accepted', '123456789', 'John Doe', 4, '2023-12-15', '18:30:00'),
(2, 2, 'pending', '987654321', 'Jane Smith', 2, '2023-12-16', '19:00:00'),
(3, 3, 'delate', '555555555', 'Bob Johnson', 6, '2023-12-17', '20:00:00'),
(4, 4, 'delate', '111222333', 'Alice Brown', 3, '2023-12-18', '21:00:00'),
(5, 5, 'pending', '999888777', 'Charlie Wilson', 5, '2023-12-19', '22:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_money` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `total_money`) VALUES
(1, 3, 1, 2, 10.99, 21.98),
(2, 3, 3, 1, 12.49, 12.49),
(3, 4, 2, 3, 8.99, 26.97),
(4, 4, 4, 1, 9.99, 9.99),
(5, 4, 5, 2, 15.99, 31.98),
(6, 1, 1, 2, 10.99, 21.98),
(7, 1, 3, 1, 12.49, 12.49),
(8, 2, 2, 3, 8.99, 26.97),
(9, 2, 4, 1, 9.99, 9.99),
(10, 2, 5, 2, 15.99, 31.98);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_category_id` int NOT NULL,
  `status` enum('on','off','delete') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `content`, `create_at`, `post_category_id`, `status`) VALUES
(5, 'Tiêu đề 1', '', 'Nội dung bài viết 1', '2023-11-27 17:26:13', 1, 'off'),
(6, 'Tiêu đề 2', '', 'Nội dung bài viết 2', '2023-11-27 17:26:13', 2, 'off'),
(7, 'Mách bạn công thức làm canh cá nấu mẻ thơm ngon đậm vị', 'machvi.jpg', 'Canh cá nấu mẻ là món ăn dân dã, quen thuộc trong mỗi mâm cơm gia đình Việt. Mùa hè nắng nóng mà có bát canh cá chua chua, ngọt ngọt thì còn gì bằng. Có rất nhiều cách để chế biến theo công thức này như: canh cá trắm nấu mẻ, canh cá basa nấu mẻ, canh cá lóc nấu mẻ, canh cá dọc mùng nấu mẻ,…', '2023-12-04 05:41:55', 1, 'on'),
(8, 'Tuyển tập 8 món xào đơn giản, tiết kiệm thời gian cho chị em', 'dua-xao-long-me-ga-3b27.jpg', 'Súp lơ xào thịt bò\r\nĐây là món ăn được nhiều người lựa chọn không chỉ vì cách chế biến đơn giản, nhanh gọn, không phải chuẩn bị nhiều mà còn vô cùng dinh dưỡng cho bữa cơm hàng ngày.\r\n\r\nNguyên liệu:\r\nMột cây súp lơ (400g).\r\nThịt bò (300g).\r\nCà chua 2 trái.\r\nTỏi 1 củ.\r\nHành lá.\r\nGia vị đi kèm: nước mắm, tiêu, muối.\r\nCách làm:\r\nThịt bò rửa sạch, thái mỏng. Ướp nước mắm, tỏi, tiêu, dầu ăn cho thịt mềm.\r\nSúp lơ rửa sạch, ngâm qua nước muối, cà chua gọt vỏ, tỏi băm nhuyễn, hành thái khúc.\r\nChế biến:\r\nPhi tỏi thơm cho thịt bò đã ướp vào xào chín, cho cà chua, bông súp lơ vào xào 3 phút. Tắt bếp cho hành lá vào đảo qua rồi bày ra đĩa. Vậy là bạn đã thực hiện xong công thức nấu ăn ngon mà Bếp TASTY hướng dẫn rồi.\r\nLòng mề gà xào dứa\r\nĐể có được món mề gà xào dứa xào ngon, TASTY Kitchen mách nhỏ bạn cách làm lòng không bị tanh, dứa xào sẽ không bị chua, ra nhiều nước nhé.\r\n\r\nDứa thường góp mặt trong danh sách các món xào đơn giản. Với vị ngọt, chua nhẹ, và giòn sật của mề, tất cả tạo ra một món ăn rất vào cơm mà không bị ngán.\r\n\r\nNguyên liệu tạo ra món ăn:\r\nLòng mề gà (4 bộ).\r\nDứa 1 quả (nhỏ).\r\nTỏi, gừng, hành tím.\r\nMùi tàu, mỡ lợn, muối, nước mắm, tiêu, hạt nêm.\r\nCách làm:\r\nLòng, mề gà (ngâm nước gừng khử tanh) xát muối rửa sạch, thái miếng, ướp gia vị đầy đủ.\r\nDứa gọt vỏ, thái miếng.\r\nTỏi, gừng, ớt, hành tím băm nhuyễn.\r\nChế biến:\r\nPhi hành, tỏi thơm, cho lòng vào xào, dứa xào to lửa không chín quá dứa sẽ chua và ra nhiều nước nhé.', '2023-12-05 11:40:06', 3, 'on'),
(9, 'Tuyển tập 8 món xào đơn giản, tiết kiệm thời gian cho chị em', 'dua-xao-long-me-ga-3b27.jpg', 'Súp lơ xào thịt bò\r\nĐây là món ăn được nhiều người lựa chọn không chỉ vì cách chế biến đơn giản, nhanh gọn, không phải chuẩn bị nhiều mà còn vô cùng dinh dưỡng cho bữa cơm hàng ngày.\r\n\r\nNguyên liệu:\r\nMột cây súp lơ (400g).\r\nThịt bò (300g).\r\nCà chua 2 trái.\r\nTỏi 1 củ.\r\nHành lá.\r\nGia vị đi kèm: nước mắm, tiêu, muối.\r\nCách làm:\r\nThịt bò rửa sạch, thái mỏng. Ướp nước mắm, tỏi, tiêu, dầu ăn cho thịt mềm.\r\nSúp lơ rửa sạch, ngâm qua nước muối, cà chua gọt vỏ, tỏi băm nhuyễn, hành thái khúc.\r\nChế biến:\r\nPhi tỏi thơm cho thịt bò đã ướp vào xào chín, cho cà chua, bông súp lơ vào xào 3 phút. Tắt bếp cho hành lá vào đảo qua rồi bày ra đĩa. Vậy là bạn đã thực hiện xong công thức nấu ăn ngon mà Bếp TASTY hướng dẫn rồi.\r\nLòng mề gà xào dứa\r\nĐể có được món mề gà xào dứa xào ngon, TASTY Kitchen mách nhỏ bạn cách làm lòng không bị tanh, dứa xào sẽ không bị chua, ra nhiều nước nhé.\r\n\r\nDứa thường góp mặt trong danh sách các món xào đơn giản. Với vị ngọt, chua nhẹ, và giòn sật của mề, tất cả tạo ra một món ăn rất vào cơm mà không bị ngán.\r\n\r\nNguyên liệu tạo ra món ăn:\r\nLòng mề gà (4 bộ).\r\nDứa 1 quả (nhỏ).\r\nTỏi, gừng, hành tím.\r\nMùi tàu, mỡ lợn, muối, nước mắm, tiêu, hạt nêm.\r\nCách làm:\r\nLòng, mề gà (ngâm nước gừng khử tanh) xát muối rửa sạch, thái miếng, ướp gia vị đầy đủ.\r\nDứa gọt vỏ, thái miếng.\r\nTỏi, gừng, ớt, hành tím băm nhuyễn.\r\nChế biến:\r\nPhi hành, tỏi thơm, cho lòng vào xào, dứa xào to lửa không chín quá dứa sẽ chua và ra nhiều nước nhé.', '2023-12-05 11:40:06', 3, 'on'),
(10, 'hello', 'untitled1-1.webp', '&#60;h2&#62;helllo&#38;nbsp;&#60;/h2&#62;&#60;ul&#62;&#60;li&#62;123sfdsf&#60;/li&#62;&#60;/ul&#62;', '2023-12-05 13:20:08', 3, 'on'),
(11, 'Tiêu đề nè ní', 'untitled1-1.webp', '&#60;h3&#62;Hello&#38;nbsp;&#60;/h3&#62;&#60;p&#62;Tôi là tôi&#60;/p&#62;&#60;p&#62;&#60;i&#62;tôi đây&#60;/i&#62;&#60;/p&#62;', '2023-12-05 13:30:25', 3, 'on'),
(12, '1', 'Biểu đồ không có tiêu đề.drawio.png', '&#60;p&#62;Xin chào&#60;/p&#62;&#60;h2&#62;adXin chào&#60;/h2&#62;&#60;h2&#62;adXin chào&#60;/h2&#62;&#60;h2&#62;ad&#60;/h2&#62;', '2023-12-05 13:36:51', 1, 'on'),
(13, '22', 'bo-thiet-ke.png', '&#60;p&#62;123&#60;/p&#62;&#60;h2&#62;123&#60;/h2&#62;&#60;p&#62;123&#60;/p&#62;&#60;p&#62;12&#60;/p&#62;&#60;h2&#62;312123&#60;/h2&#62;&#60;h2&#62;123&#60;/h2&#62;&#60;p&#62;123&#60;/p&#62;&#60;p&#62;12&#60;/p&#62;&#60;h2&#62;312123&#60;/h2&#62;&#60;h2&#62;123&#60;/h2&#62;&#60;p&#62;123&#60;/p&#62;&#60;p&#62;12&#60;/p&#62;&#60;h2&#62;312123&#60;/h2&#62;&#60;h2&#62;123&#60;/h2&#62;&#60;p&#62;123&#60;/p&#62;&#60;p&#62;12&#60;/p&#62;&#60;h2&#62;312&#60;/h2&#62;&#60;p&#62;s&#60;/p&#62;', '2023-12-05 13:40:02', 1, 'on'),
(14, '1212313', 'bo-thiet-ke.png', '&#60;p&#62;123&#60;/p&#62;&#60;h2&#62;123&#60;/h2&#62;&#60;p&#62;123&#60;/p&#62;&#60;p&#62;12&#60;/p&#62;&#60;h2&#62;312123&#60;/h2&#62;&#60;h2&#62;123&#60;/h2&#62;&#60;p&#62;123&#60;/p&#62;&#60;p&#62;12&#60;/p&#62;&#60;h2&#62;312123&#60;/h2&#62;&#60;h2&#62;123&#60;/h2&#62;&#60;p&#62;123&#60;/p&#62;&#60;p&#62;12&#60;/p&#62;&#60;h2&#62;312123&#60;/h2&#62;&#60;h2&#62;123&#60;/h2&#62;&#60;p&#62;123&#60;/p&#62;&#60;p&#62;12&#60;/p&#62;&#60;h2&#62;312s&#60;/h2&#62;', '2023-12-05 13:41:14', 1, 'on'),
(15, '123123', 'ERD.png', '&#60;p&#62;123&#60;/p&#62;&#60;p&#62;123&#60;/p&#62;&#60;h2&#62;122&#60;/h2&#62;', '2023-12-05 13:41:55', 1, 'on'),
(16, '123', 'ERD.png', '&#60;p&#62;&#60;br&#62;Ở đây, mình sẽ hướng dẫn các bạn cách tạo bài viết đơn giản, viết bài đúng cách. 6 cách đơn giản sau sẽ giúp bạn biết bắt đầu như thế nào và làm thế nào để được cả publisher lẫn người đọc tin cậy.&#60;/p&#62;&#60;p&#62;&#38;nbsp;&#60;/p&#62;&#60;p&#62;&#38;nbsp;&#60;a href=&#34;https://hostingviet.vn/6-cach-don-gian-de-viet-bai-viet-hieu-qua-va-chat-luong&#34;&#62;&#60;img src=&#34;https://cdn.hostingviet.vn/upload/2023/08/6-cach-don-gian-de-viet-bai.png&#34; alt=&#34;Các cách viết bài hiệu quả&#34; width=&#34;650&#34; height=&#34;400&#34;&#62;&#60;/a&#62;&#60;/p&#62;&#60;h2&#62;&#60;strong&#62;Bài viết phải đạt được hai tiêu chuẩn&#60;/strong&#62;&#60;/h2&#62;&#60;p&#62;- Thứ nhất, bài viết phải mang tính hợp pháp 100%, không được thổi phồng sự thật hay gian lận.&#60;/p&#62;&#60;p&#62;- Thứ hai, nó tuyệt đối phải đem lại giá trị thực cho người đọc và publisher. Đừng bao giờ viết một bài viết chỉ để phục vụ cho mục đích của riêng mình, một bài viết ích kỷ như vậy sẽ ngay lập tức bị các publisher và người đọc “tẩy chay”. Đa số mọi người đều biết bạn muốn nhận được cái gì đó khi chia sẻ kiến thức của mình và họ rất vui mừng đáp lại sự chia sẻ của bạn, ví dụ như họ sẽ viết một bài viết hay có backlink tới site c&#60;/p&#62;', '2023-12-05 13:45:51', 1, 'on');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('on','off','delete') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `post_categories`
--

INSERT INTO `post_categories` (`id`, `name`, `status`) VALUES
(1, 'Loại 1', 'on'),
(2, 'Loại 2', 'on'),
(3, 'Ẩm thực', 'on');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_comments`
--

CREATE TABLE `post_comments` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('on','off','delete') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `post_comments`
--

INSERT INTO `post_comments` (`id`, `user_id`, `post_id`, `create_at`, `note`, `status`) VALUES
(1, 1, 5, '2023-11-29 12:28:00', 'Bình luận cho bài viết 101', 'on'),
(3, 2, 6, '2023-11-30 09:45:00', 'Bình luận cho bài viết 102', 'on'),
(4, 3, 5, '2023-11-30 14:10:00', 'Bình luận cho bài viết 103', 'off');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `count_view` int NOT NULL DEFAULT '0',
  `status` enum('on','off','delete') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'on',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_categories_id` int NOT NULL,
  `short_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `title`, `description`, `count_view`, `status`, `create_at`, `product_categories_id`, `short_description`) VALUES
(1, 'Food Item 1', 10.99, '', 'Title 1', 'Description 1', 0, 'off', '2023-11-30 14:36:13', 3, 'Short description 1'),
(2, 'Food Item 2', 8.99, 'image2.jpg', 'Title 2', 'Description 2', 0, 'off', '2023-11-30 14:36:13', 4, 'Short description 2'),
(3, 'Food Item 3', 12.49, 'image3.jpg', 'Title 3', 'Description 3', 0, 'off', '2023-11-30 14:36:13', 5, 'Short description 3'),
(4, 'Food Item 4', 9.99, 'image4.jpg', 'Title 4', 'Description 4', 0, 'off', '2023-11-30 14:36:13', 4, 'Short description 4'),
(5, 'Food Item 5', 15.99, 'image5.jpg', 'Title 5', 'Description 5', 0, 'off', '2023-11-30 14:36:13', 3, 'Short description 5'),
(6, 'Ba rọi nướng riềng mẻ', 155000.00, '1240f05c5ee174bcdaf47d5ec33197.png', 'Ba rọi nướng riềng mẻ là món ăn đặc trưng của người miền Bắc.', 'Ba rọi nướng riềng mẻ là món ăn đặc trưng của người miền Bắc. Với những miếng thịt ba rọi rút sườn tẩm ướp cẩn thận trong nhiều giờ cùng riềng, mẻ và các gia vị đặc biệt được nướng lên thơm lừng. Vị chua, cay nhẹ đầy hấp dẫn của từng miếng thịt khi thưởng thức kèm cơm nóng sẽ mang đến trải nghiệm vị giác ấn tượng không thể bỏ qua.', 0, 'on', '2023-12-05 11:01:07', 4, 'Ba rọi nướng riềng mẻ là món ăn đặc trưng của người miền Bắc.'),
(7, 'Gà cuốn lá dứa', 168000.00, '2-2.png', 'Gà cuốn lá dứa là món ăn mang phong vị ẩm thực Thái Lan', 'Gà cuốn lá dứa là món ăn mang phong vị ẩm thực Thái Lan, đã được các đầu bếp TASTY Kitchen biến tấu mang đầy mới mẻ và phù hợp với khẩu vị người Việt. Thịt gà lóc xương, giữ nguyên da cắt miếng vừa ăn tẩm ướp suốt hơn 3 tiếng cùng các gia vị đặc trưng của Việt Nam như tỏi, dầu hào, điều,...cân chỉnh với tỷ lệ thích hợp. Thêm điểm nhấn khi kết hợp mùi thơm tự nhiên của lá dứa được trồng tại Đà Lạt cuốn cẩn thận với gà và chiên giòn hấp dẫn. Không chỉ dễ dàng chiêu đãi vị giác món ăn còn mang lại giá trị dinh dưỡng cao, rất tốt cho tim mạch.', 0, 'on', '2023-12-05 11:01:07', 4, 'Gà cuốn lá dứa là món ăn mang phong vị ẩm thực Thái Lan, đã được các đầu bếp TASTY Kitchen biến tấu mang đầy mới mẻ và phù hợp với khẩu vị người Việt'),
(8, 'Gỏi tai heo hoa chuối', 125000.00, 'untitled114148eed72724d16a9d2c.png', 'Gỏi tai heo hoa chuối', 'Sử dụng nguyên liệu chuối tây cùng tai heo quen thuộc, các đầu bếp tạo nên sự khác biệt bằng phương pháp luộc hoa chuối để lọc bỏ hết nhựa, tạo cảm giác dễ chịu và an toàn khi ăn. Kết hợp cùng cà rốt, dưa leo, hành tây, củ kiệu, món gỏi chuối tai heo mang màu sắc bắt mắt và những nét chấm phá đặc biệt trong hương vị. Hoàn thiện tất cả là nước mắm chua ngọt dung hòa, tổng thể làm nên món ăn thơm ngon, giàu chất dinh dưỡng và thanh mát ngày hè.', 0, 'on', '2023-12-05 11:06:26', 4, 'Sử dụng nguyên liệu chuối tây cùng tai heo quen thuộc, các đầu bếp tạo nên sự khác biệt bằng phương pháp luộc hoa chuối để lọc bỏ hết nhựa, tạo cảm giác dễ chịu và an toàn khi ăn.'),
(9, 'Ức gà đút lò phủ lá chanh', 185000.00, '1-2.png', 'Ức gà đút lò phủ lá chanh', 'Sử dụng phương pháp nướng cách thủy đặc biệt mang đến hương vị mới mẻ cho món Ức gà đút lò phủ lá chanh vừa giữ được sự mềm dai vừa thấm đều nước sốt hấp dẫn. Với thành phần ức gà giàu đạm, ít béo, kết hợp cùng lá chanh, lá dứa, thịt heo và các loại nấm tạo nên một món ăn đậm đà từ hương đến vị khi dùng kèm cơm trắng. Không chỉ thơm ngon, món ăn còn cung cấp dinh dưỡng phù hợp, là lựa chọn không thể bỏ qua của người ăn kiêng', 0, 'on', '2023-12-05 11:06:26', 4, 'Sử dụng phương pháp nướng cách thủy đặc biệt mang đến hương vị mới mẻ cho món Ức gà đút lò phủ lá chanh vừa giữ được sự mềm dai vừa thấm đều nước sốt hấp dẫn.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('on','off','delete') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `status`) VALUES
(3, 'Khai Vị ', 'on'),
(4, 'Món Chính', 'on'),
(5, 'Tráng Miệng', 'on'),
(6, 'Nước Uống', 'off');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comments`
--

CREATE TABLE `product_comments` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('on','off','delete') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_comments`
--

INSERT INTO `product_comments` (`id`, `user_id`, `product_id`, `create_at`, `note`, `status`) VALUES
(1, 1, 1, '2023-12-01 10:00:00', 'Bình luận số 1 cho sản phẩm 1', 'on'),
(2, 2, 2, '2023-12-01 10:15:00', 'Bình luận số 1 cho sản phẩm 2', 'on'),
(3, 3, 3, '2023-12-01 10:30:00', 'Bình luận số 1 cho sản phẩm 3', 'on'),
(4, 4, 4, '2023-12-01 10:45:00', 'Bình luận số 1 cho sản phẩm 4', 'on'),
(5, 5, 5, '2023-12-01 11:00:00', 'Bình luận số 1 cho sản phẩm 5', 'on');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `full_name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('on','off','delete') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'on',
  `role` enum('admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `status`, `role`, `create_at`, `image`) VALUES
(1, 'Lê HùngVĩnh', 'lehungvinh210621@gmail.com', 'vinh123', '0348965777', 'off', 'admin', '2023-11-29 12:23:22', 'IMG_4758.jpg'),
(2, 'Nguyễn Quốc Khanh', 'kn095878910@gmail.com', 'khanh123', '0348965778', 'on', 'admin', '2023-11-29 12:23:22', 'IMG_0989.jpg'),
(3, 'Nguyễn Trung Hiếu', 'hieu123@gmail.com', 'hieu123', '0348965779', 'on', 'admin', '2023-11-29 12:23:22', 'avatar3.png'),
(4, 'Lý Công Thành', 'thanh123@gmail.com', 'thanh123', '0348965780', 'on', 'user', '2023-11-29 12:23:22', 'avatar4.png'),
(5, 'Lê Châu Khả Hi', 'hi123@gmail.com', 'hi123', '0348965781', 'on', 'user', '2023-11-29 12:23:22', 'avatar5.png'),
(6, 'Trần Văn Chí Linh', 'linh123@gmail.com', 'linh123', '0348965782', 'on', 'user', '2023-11-29 12:23:22', 'avatar6.png'),
(7, 'Huỳnh Trần Thanh Tú', 'tu123@gmail.com', 'tu123', '0348965783', 'on', 'user', '2023-11-29 12:23:22', 'avatar7.png'),
(8, 'Cao Kỳ Nam', 'nam123@gmail.com', 'nam123', '0348965784', 'on', 'user', '2023-11-29 12:23:22', 'avatar8.png'),
(9, 'Phan Đan Huy', 'huy123@gmail.com', 'huy123', '0348965785', 'on', 'user', '2023-11-29 12:23:22', 'avatar9.png'),
(10, 'Nguyễn Anh Thương', 'thuong123@gmail.com', 'thuong123', '0348965786', 'on', 'user', '2023-11-29 12:23:22', 'avatar10.png'),
(11, 'Phan Văn Phúc', 'phuc123@gmail.com', 'phuc123', '0348965787', 'on', 'user', '2023-11-29 12:23:22', 'avatar11.png'),
(12, 'Nguyễn Thanh Lý', 'ly123@gmail.com', 'ly123', '0348965788', 'on', 'user', '2023-11-29 12:23:22', 'avatar12.png'),
(13, 'Thái Văn Toàn', 'toan123@gmail.com', 'toan123', '0348965789', 'on', 'user', '2023-11-29 12:23:22', 'avatar13.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int NOT NULL,
  `code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `number_limit` int NOT NULL,
  `discount_percentage` int NOT NULL,
  `used_count` int NOT NULL DEFAULT '0',
  `status` enum('on','off','delete') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vouchers`
--

INSERT INTO `vouchers` (`id`, `code`, `number_limit`, `discount_percentage`, `used_count`, `status`) VALUES
(1, 'voucher', 10000, 0, 0, 'on'),
(2, 'VOUCHER2', 50, 15, 0, 'on'),
(3, 'VOUCHER3', 200, 20, 0, 'on');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `voucher_id` (`voucher_id`);

--
-- Chỉ mục cho bảng `orders_table`
--
ALTER TABLE `orders_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_category_id` (`post_category_id`);

--
-- Chỉ mục cho bảng `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `product_category_id` (`product_categories_id`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders_table`
--
ALTER TABLE `orders_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`);

--
-- Các ràng buộc cho bảng `orders_table`
--
ALTER TABLE `orders_table`
  ADD CONSTRAINT `orders_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_category_id`) REFERENCES `post_categories` (`id`);

--
-- Các ràng buộc cho bảng `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_categories_id`) REFERENCES `product_categories` (`id`);

--
-- Các ràng buộc cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  ADD CONSTRAINT `product_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_comments_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
