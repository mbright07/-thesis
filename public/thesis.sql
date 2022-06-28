-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 22, 2022 lúc 11:48 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thesis`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `activity_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `activities`
--

INSERT INTO `activities` (`id`, `user_id`, `activity_name`, `description`, `created_at`, `updated_at`) VALUES
(3, 3, 'hhhh', 'nnnn', '2022-06-19 03:54:40', '2022-06-19 04:00:28'),
(4, 3, 'jjjjj', 'hhhhh', '2022-06-19 04:00:05', '2022-06-19 04:00:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(17, 'Hà Nội', 'ha-noi', '2022-05-25 20:20:08', '2022-06-04 08:25:25'),
(18, 'Hồ Chí Minh', 'ho-chi-minh', '2022-05-25 20:20:45', '2022-06-13 08:22:21'),
(19, 'Vĩnh Phúc', 'vinh-phuc', '2022-06-04 08:42:21', '2022-06-04 08:42:21'),
(20, 'Đồng Nai', 'dong-nai', '2022-06-04 08:42:57', '2022-06-04 08:42:57'),
(21, 'Bắc Giang', 'bac-giang', '2022-06-07 08:07:24', '2022-06-07 08:07:24'),
(22, 'Hà Giang', 'ha-giang', '2022-06-07 08:08:53', '2022-06-07 08:08:53'),
(23, 'Ninh Bình', 'ninh-binh', '2022-06-07 08:10:06', '2022-06-07 08:10:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `certifications`
--

CREATE TABLE `certifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `certification_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `certifications`
--

INSERT INTO `certifications` (`id`, `user_id`, `certification_name`, `description`, `created_at`, `updated_at`) VALUES
(2, 3, 'tin học văn phòng', 'chứng chỉ tin học văn phòng', '2022-06-19 07:17:19', '2022-06-19 07:17:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'Hoàng Thị Thu Trang', 'user@gmail.com', '0366465928', 'Test message', '2022-05-23 09:50:41', '2022-05-23 09:50:41'),
(2, 'trang hoang', 'wanko@prog-8.com', '0366465929', 'Another message', '2022-05-23 09:53:16', '2022-05-23 09:53:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualifications` enum('high_school','associate_degree','college','bachelors','masters','doctorate','others') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_month` date DEFAULT NULL,
  `to_month` date DEFAULT NULL,
  `achievements` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `education`
--

INSERT INTO `education` (`id`, `user_id`, `subject`, `school`, `qualifications`, `from_month`, `to_month`, `achievements`, `created_at`, `updated_at`) VALUES
(2, 3, 'Điều dưỡng', 'Đại Học Y Hà Nội', 'college', '2022-06-10', '2022-06-23', 'hahaha', '2022-06-19 02:33:26', '2022-06-19 03:28:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `home_categories`
--

CREATE TABLE `home_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sel_categories` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_jobs` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `home_categories`
--

INSERT INTO `home_categories` (`id`, `sel_categories`, `no_of_jobs`, `created_at`, `updated_at`) VALUES
(1, '17,18,19,20', 8, '2022-05-25 09:34:33', '2022-06-10 08:04:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `title`, `subtitle`, `salary`, `link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'First Slide Title 1', 'First Slide Subtitle', '300', 'https://www.chatwork.com/', '1650538250.jpg', 1, '2022-04-21 03:50:50', '2022-04-21 04:03:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_salary` decimal(8,2) NOT NULL,
  `fix_salary` decimal(8,2) DEFAULT NULL,
  `SKU` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_status` enum('instock','outofstock') COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 10,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `totalviews` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `slug`, `short_description`, `description`, `regular_salary`, `fix_salary`, `SKU`, `stock_status`, `featured`, `quantity`, `image`, `images`, `category_id`, `created_at`, `updated_at`, `sub_category_id`, `totalviews`, `user_id`) VALUES
(32, 'Kỹ Thuật Viên/ Nhân Viên Phụ Mổ (Nursing)', 'ky-thuat-vien-nhan-vien-phu-mo- nursing', '<div class=\"col-sm-12 company-name\">C&Ocirc;NG TY CỔ PHẦN THIẾT BỊ Y TẾ KINDAKARE</div>\n<div class=\"col-sm-12 company-name\">Địa Điểm L&agrave;m Việc: H&agrave; Nội</div>', '<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\n<div class=\"benefits\">\n<div class=\"benefit row\">\n<div class=\"benefit-name col-xs-11\">- Được đảm bảo c&aacute;c chế độ về BHXH, BHYT, BHTN v&agrave; c&aacute;c quyền kh&aacute;c theo quy định của ph&aacute;p luật</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-name col-xs-11\">- Được đ&agrave;o tạo định kỳ về c&aacute;c kỹ năng l&agrave;m việc.</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-name col-xs-11\">- Được l&agrave;m việc trong m&ocirc;i trường chuy&ecirc;n nghiệp, ổn định v&agrave; ph&aacute;t triển</div>\n<div class=\"benefit-name col-xs-11\">\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\n<div class=\"description\"><br>- Chuẩn bị dụng cụ cho c&aacute;c b&aacute;c sỹ ngoại khoa<br>- Hấp đồ, v&ocirc; trung v&agrave; bảo quản dụng cụ v&agrave; vật tư y tế<br>- Phối hợp với c&aacute;c ph&ograve;ng/ ban li&ecirc;n quan trong bệnh viện để giải quyết thủ tục/ giấy tờ li&ecirc;n quan đến cuộc phẫu thuật<br>- Nghi&ecirc;n cứu, thu thập th&ocirc;ng tin về thị trường<br>- Duy tr&igrave;, hỗ trợ ph&aacute;t triển mạng lưới kh&aacute;ch h&agrave;ng<br>- Tiếp nhận c&aacute;c c&acirc;u hỏi của kh&aacute;ch h&agrave;ng, tư vấn sản phẩm/ kỹ thuật<br>- Thực hiện c&aacute;c c&ocirc;ng việc li&ecirc;n quan kh&aacute;c theo y&ecirc;u cầu của Ban gi&aacute;m đốc</div>\n<div class=\"description\">&nbsp;</div>\n<div class=\"description\">\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\n<div class=\"requirements\">- Tốt nghiệp Cao đẳng trở l&ecirc;n, ưu ti&ecirc;n chuy&ecirc;n ng&agrave;nh về y tế,...<br>- Kỹ năng giao tiếp tốt<br>- Năng động, nhiệt t&igrave;nh, chăm chỉ<br>- Khả năng l&agrave;m việc độc lập v&agrave; l&agrave;m việc theo nh&oacute;m<br>- Tiếng Anh giao tiếp cơ bản l&agrave; lợi thế<br>- Kỹ năng tin học văn ph&ograve;ng<br>- Đi c&ocirc;ng t&aacute;c<br>- Ưu ti&ecirc;n: Kinh nghiệm 2-3 năm ở vị tr&iacute; tương tự<br>- Địa điểm l&agrave;m việc: H&agrave; Nội</div>\n<div class=\"requirements\">&nbsp;</div>\n<div class=\"requirements\">*** QUYỀN LỢI ĐƯỢC HƯỞNG<br>- Thời gian thử việc: 2 th&aacute;ng<br>- Lương thử việc: 85% lương ch&iacute;nh thức<br>- Mức lương ch&iacute;nh: Thỏa thuận<br>- Được l&agrave;m việc trong m&ocirc;i trường chuy&ecirc;n nghiệp, ổn định v&agrave; ph&aacute;t triển<br>- Được đảm bảo c&aacute;c chế độ về BHXH, BHYT, BHTN v&agrave; c&aacute;c quyền kh&aacute;c theo quy định của ph&aacute;p luật v&agrave; quy chế c&ocirc;ng ty.<br>- Được đ&agrave;o tạo định kỳ về c&aacute;c kỹ năng l&agrave;m việc.<br><br>*** Hồ sơ bao gồm (C&oacute; thể bổ sung sau khi đ&atilde; qua v&ograve;ng phỏng vấn)<br>- Đơn xin việc.<br>- Sơ yếu l&yacute; lịch.<br>- Giấy khai sinh<br>- Giấy kh&aacute;m sức khoẻ.<br>- Bản sao chứng minh thư nh&acirc;n d&acirc;n.<br>- Bản sao sổ hộ khẩu.<br>- C&aacute;c văn bằng chứng chỉ li&ecirc;n quan.<br>- 02 ảnh 4x6<br>- Kh&ocirc;ng ho&agrave;n lại hồ sơ khi ứng vi&ecirc;n kh&ocirc;ng đạt y&ecirc;u cầu.<br><br><br>*** Địa chỉ nộp hồ sơ:<br>- Qua website Vietnamworks.com hoặc trực tiếp tại<br>- Chi nh&aacute;nh H&agrave; Nội - C&ocirc;ng ty Cổ phần Trang Thiết bị Y tế Cổng V&agrave;ng: P401, t&ograve;a nh&agrave; GP Invest 170 La Th&agrave;nh, phường &Ocirc; Chợ Dừa, Quận Đống Đa, H&agrave; Nội</div>\n</div>\n</div>\n</div>\n</div>', '1000.00', NULL, 'SKU', 'instock', 1, 2, '1654574349.jpg', NULL, 17, '2022-06-04 07:54:40', '2022-06-18 07:03:54', 1, 43, 1),
(33, 'Nurse - Điều Dưỡng Viên', 'nurse-dieu-duong-vien', '<p><br>Nurse - Điều Dưỡng Vi&ecirc;n<br>FAMILY MEDICAL PRACTICE</p>\n<p>Địa Điểm L&agrave;m Việc: H&agrave; Nội</p>', '<div class=\"what-we-offer mobile-box\">\n<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\n<div class=\"benefits\">\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">- Health care for family</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">- 14 annual leave/ year</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">- Internal/ external training</div>\n</div>\n</div>\n</div>\n<div class=\"job-description mobile-box\">\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\n<div class=\"description\">Thực hiện c&aacute;c c&ocirc;ng việc kh&aacute;m chữa bệnh dưới sự chỉ đạo v&agrave; gi&aacute;m s&aacute;t của c&aacute;c b&aacute;c sĩ v&agrave; Trưởng bộ phận điều dưỡng.<br>- Thực hiện c&aacute;c c&ocirc;ng việc kh&aacute;m chữa bệnh cho người bệnh với chất lượng cao nhất theo đ&uacute;ng ti&ecirc;u<br>chuẩn chuy&ecirc;n m&ocirc;n v&agrave; quy định của ph&ograve;ng kh&aacute;m.<br>- Trau dồi, n&acirc;ng cao nghiệp vụ điều dưỡng th&ocirc;ng qua việc tham dự c&aacute;c kho&aacute; đ&agrave;o tạo li&ecirc;n tục.<br>- Hướng dẫn, hỗ trợ bệnh nh&acirc;n v&agrave; th&acirc;n nh&acirc;n của họ thực hiện c&aacute;c chỉ dẫn của b&aacute;c sĩ.<br>- Hỗ trợ b&aacute;c sĩ chăm s&oacute;c bệnh nh&acirc;n trong qu&aacute; tr&igrave;nh kh&aacute;m chữa bệnh.<br>- Thực hiện c&aacute;c kỹ thuật cơ bản của Điều dưỡng vi&ecirc;n như c&acirc;n nặng, đo chiều cao, lấy mẫu x&eacute;t nghiệm&hellip;.</div>\n</div>\n<div class=\"job-requirements mobile-box\">\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\n<div class=\"requirements\">Y&ecirc;u cầu:<br>- Tốt nghiệp Đại học/Cao đẳng/Trung cấp điều dưỡng<br>- Chứng chỉ kh&aacute;m chữa bệnh do Sở Y tế TP. H&agrave; Nội cấp<br>- Tối thiểu 1 năm kinh nghiệm<br>- Ưu ti&ecirc;n c&aacute;c ứng vi&ecirc;n đ&atilde; c&oacute; kinh nghiệm l&agrave;m việc trong c&aacute;c bệnh viện c&ocirc;ng.<br>Kỹ năng chăm s&oacute;c kh&aacute;ch h&agrave;ng, chăm s&oacute;c bệnh nh&acirc;n:<br>- Đ&atilde; c&oacute; chứng chỉ h&agrave;nh nghề l&agrave; một lợi thế.<br>- Giao tiếp tốt cả tiếng Anh v&agrave; tiếng Việt<br>- Khả năng l&agrave;m việc nh&oacute;m tốt<br>- Tu&acirc;n thủ c&aacute;c quy định về y đức, t&ocirc;n trọng, lễ ph&eacute;p với bệnh nh&acirc;n v&agrave; nghi&ecirc;m chỉnh c&aacute;c quy định của ph&ograve;ng kh&aacute;m.<br>- Khả năng chịu &aacute;p lực c&ocirc;ng việc cao, ứng biến nhanh với c&aacute;c t&igrave;nh huống khẩn cấp.<br><br>C&aacute;c kỹ năng kh&aacute;c:<br>- Ưu ti&ecirc;n c&aacute;c ứng vi&ecirc;n th&agrave;nh thạo tiếng Anh (Nghe &ndash; N&oacute;i )<br>- Kinh nghiệm l&agrave;m việc ở vị tr&iacute; tương đương</div>\n</div>', '800.00', NULL, 'SKU', 'instock', 1, 4, '1654355267.jpg', NULL, 17, '2022-06-04 08:07:47', '2022-06-16 19:12:54', 2, 15, 1),
(34, 'Nhân Viên Hỗ Trợ Nghiên Cứu (Study Coordinator – SC)', 'nhan-vien-ho-tro-nghien-cuu-study-coordinator-sc', '<h5 class=\"job-title\">&Iacute;t Nhất 1 Năm Kinh Nghiệm L&agrave;m Việc Trong Lĩnh Vực Nghi&ecirc;n Cứu Thử Nghiệm L&acirc;m S&agrave;ng</h5>\n<p>C&Ocirc;NG TY TNHH TƯ VẤN V&Agrave; Đ&Agrave;O TẠO KỸ NĂNG NGHI&Ecirc;N CỨU L&Acirc;M S&Agrave;NG VIỆT NAM</p>\n<p>Địa Điểm L&agrave;m Việc: Hồ Ch&iacute; Minh | H&agrave; Nội</p>', '<div class=\"what-we-offer mobile-box\">\n<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\n<div class=\"benefits\">\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">- Đảm bảo nh&acirc;n vi&ecirc;n được hưởng chế độ phụ cấp theo đ&uacute;ng năng lực l&agrave;m việc, đ&oacute;ng g&oacute;p cho c&ocirc;ng ty</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">- Đảm bảo quyền lợi, ph&uacute;c lợi của người lao động theo quy định của nh&agrave; nước</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">- Tham gia v&agrave;o c&aacute;c kh&oacute;a đ&agrave;o tạo n&acirc;ng cao năng lực chuy&ecirc;n m&ocirc;n, nghiệp vụ</div>\n</div>\n</div>\n</div>\n<div class=\"job-description mobile-box\">\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\n<div class=\"description\">Hỗ trợ h&agrave;nh ch&iacute;nh trong nghi&ecirc;n cứu l&acirc;m s&agrave;ng, bao gồm c&aacute;c hoạt động hỗ trợ trong:<br>1. S&agrave;ng lọc v&agrave; tuyển chọn đối tượng tham gia nghi&ecirc;n cứu; lấy phiếu t&igrave;nh nguyện tham gia nghi&ecirc;n cứu.<br>2. Nhập dữ liệu v&agrave;o Phiếu thu thập th&ocirc;ng tin (CRF) v&agrave; eCRF; đăng nhập, k&iacute;ch hoạt, cập nhật v&agrave;o c&aacute;c hệ thống nghi&ecirc;n cứu trực tuyến (nếu c&oacute;).<br>3. Lưu trữ, quản l&yacute; c&aacute;c t&agrave;i liệu nguồn, t&agrave;i liệu thiết yếu v&agrave; hồ sơ li&ecirc;n quan; hỗ trợ c&ocirc;ng t&aacute;c chuẩn bị phục vụ c&aacute;c đợt gi&aacute;m s&aacute;t, kiểm tra của nh&agrave; t&agrave;i trợ; c&ocirc;ng t&aacute;c chuẩn bị phục vụ c&aacute;c đợt thanh tra của c&aacute;c cơ quan c&oacute; thẩm quyền.<br>4. Thực hiện nghi&ecirc;n cứu đ&uacute;ng theo đề cương, SOP v&agrave; GCP (theo d&otilde;i, hướng dẫn c&aacute;c quy tr&igrave;nh để bảo đảm việc thực hiện đ&uacute;ng).<br>5. Theo d&otilde;i đối tượng t&igrave;nh nguyện tham gia nghi&ecirc;n cứu<br>6. Kiểm tra v&agrave; chuẩn bị labkit trong c&aacute;c x&eacute;t nghiệm của nghi&ecirc;n cứu; quản l&yacute; sản phẩm nghi&ecirc;n cứu.<br>7. Tạo lập hồ sơ đối tượng tham gia nghi&ecirc;n cứu (nếu c&oacute;); kiểm tra v&agrave; cập nhật c&aacute;c hồ sơ y&ecirc;u cầu.<br>8. Thực hiện c&aacute;c b&aacute;o c&aacute;o theo y&ecirc;u cầu<br>9. Nghiệp vụ hỗ trợ c&aacute;c y&ecirc;u cầu kh&aacute;c từ nghi&ecirc;n cứu vi&ecirc;n ch&iacute;nh.<br><br>PH&Uacute;C LỢI:<br>- Bảo hiểm v&agrave; c&aacute;c chế độ kh&aacute;c theo quy định của Luật Lao động.<br>- Được đ&agrave;o tạo đầu v&agrave;o trước khi thực hiện c&ocirc;ng việc v&agrave; đ&agrave;o tạo li&ecirc;n tục trong suốt qu&aacute; tr&igrave;nh l&agrave;m việc. Tham gia v&agrave;o c&aacute;c kh&oacute;a đ&agrave;o tạo n&acirc;ng cao năng lực chuy&ecirc;n m&ocirc;n, nghiệp vụ<br>- Đảm bảo quyền lợi, ph&uacute;c lợi của người lao động theo quy định của nh&agrave; nước<br>- Hưởng chế độ phụ cấp theo đ&uacute;ng năng lực l&agrave;m việc, đ&oacute;ng g&oacute;p cho c&ocirc;ng ty, lương th&aacute;ng 13, thưởng hiệu quả c&ocirc;ng việc<br>- L&agrave;m việc trong m&ocirc;i trường năng động, chuy&ecirc;n nghiệp</div>\n<a class=\"view-more clickable\">Xem to&agrave;n bộ M&ocirc; Tả C&ocirc;ng Việc</a></div>\n<div class=\"job-requirements mobile-box\">\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\n<div class=\"requirements\">* Y&ecirc;u cầu bắt buộc:<br>- Tốt nghiệp Cao đẳng trở l&ecirc;n trong khối ng&agrave;nh Y Dược v&agrave; khối ng&agrave;nh sức khỏe (Y tế c&ocirc;ng cộng, Dược, C&ocirc;ng nghệ sinh học, Điều dưỡng, Kỹ thuật y sinh, Kỹ thuật vi&ecirc;n x&eacute;t nghiệm, Nữ hộ sinh &hellip;)<br>- Ứng vi&ecirc;n c&oacute; &iacute;t nhất 1 năm kinh nghiệm l&agrave;m việc trong lĩnh vực nghi&ecirc;n cứu thử nghiệm l&acirc;m s&agrave;ng/ nghi&ecirc;n cứu khoa học li&ecirc;n quan đến con người/ nghi&ecirc;n cứu y sinh học<br>* Y&ecirc;u cầu kh&aacute;c:<br>- Tr&igrave;nh độ tin học văn ph&ograve;ng; Tiếng Anh: c&oacute; chứng chỉ anh văn B hoặc tương đương B<br>- C&oacute; khả năng l&agrave;m việc độc lập, hoạt động nh&oacute;m.<br>- Nghi&ecirc;m t&uacute;c v&agrave; cẩn thận, tỉ mỉ trong c&ocirc;ng việc, c&oacute; mong muốn học hỏi, t&iacute;nh t&igrave;nh trung thực, coi trọng uy t&iacute;n.<br>- C&oacute; khả năng đi c&ocirc;ng t&aacute;c.</div>\n</div>', '950.00', NULL, 'SKU', 'instock', 0, 2, '1654355526.jpg', NULL, 18, '2022-06-04 08:12:06', '2022-06-16 19:05:29', 3, 50, 1),
(35, 'Nhân Viên Kỹ Thuật, Điều Dưỡng Phụ Mổ', 'nhan-vien-ky-thuat-dieu-duong-phu-mo', '<p>C&Ocirc;NG TY CỔ PHẦN THIẾT BỊ Y TẾ VIỆT SING</p>\n<p>Địa Điểm L&agrave;m Việc: Hồ Ch&iacute; Minh</p>', '<div class=\"what-we-offer mobile-box\">\n<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\n<div class=\"benefits\">\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">Thu nhập theo thoả thuận ph&ugrave; hợp với năng lực</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">Được hưởng đầy đủ c&aacute;c chế độ ph&uacute;c lợi, lương, thưởng theo doanh số, nghỉ lễ tết &hellip; theo quy định.</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">M&ocirc;i trường l&agrave;m việc trẻ trung, năng động</div>\n</div>\n</div>\n</div>\n<div class=\"job-description mobile-box\">\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\n<div class=\"description\">Số lượng: 03 người<br><br>M&ocirc; tả c&ocirc;ng việc:<br>- Nhận th&ocirc;ng tin ca mổ<br>- Chuẩn bị dụng cụ cho ca mổ v&agrave; v&ocirc; tr&ugrave;ng trong ph&ograve;ng mổ<br>- Hỗ trợ phẫu thuật vi&ecirc;n/ b&aacute;c sĩ trong ph&ograve;ng mổ<br>- Ho&agrave;n tất c&aacute;c thủ tục sau mổ với c&aacute;c ph&ograve;ng ban li&ecirc;n quan.<br>- L&agrave;m việc từ thứ 2 &ndash; thứ 6. L&agrave;m th&ecirc;m ngo&agrave;i giờ khi c&oacute; ca mổ cấp cứu</div>\n</div>\n<div class=\"job-requirements mobile-box\">\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\n<div class=\"requirements\">Y&ecirc;u cầu c&ocirc;ng việc<br>- Nam giới, c&oacute; sức khỏe, nhanh nhẹn, kh&ocirc;ng ngại kh&oacute;<br>- Độ tuổi: 20-35 tuổi<br>- Tốt nghiệp c&aacute;c trường trung cấp, cao đẳng y, điều dưỡng, y sĩ, kỹ thuật &hellip;<br>- C&oacute; kinh nghiệm &iacute;t nhất 2 năm ở vị tr&iacute; li&ecirc;n quan đến điều dưỡng, y sĩ, phụ mổ...<br>(Nếu chưa c&oacute; kinh nghiệp sẽ được đ&agrave;o tạo)<br><br>Quyền lợi<br>- Thu nhập: cạnh tranh trong c&ugrave;ng lĩnh vực - sẽ được theo thỏa thuận th&ecirc;m trong qu&aacute; tr&igrave;nh phỏng vấn<br>- Lương th&aacute;ng 13<br>- Được đ&agrave;o tạo b&agrave;i bản khi nhận việc<br>- Thưởng Lễ, Tết hấp dẫn<br>- M&ocirc;i trường chuy&ecirc;n nghiệp, th&acirc;n thiện, gi&uacute;p đỡ lẫn nhau<br>- Tham gia đầy đủ BHXH, BHYT, BHTN,<br>- Hỗ trợ cơm trưa, c&ocirc;ng t&aacute;c ph&iacute;, ...<br>- Ph&eacute;p năm đầy đủ theo quy định của c&ocirc;ng ty, của nh&agrave; nước<br>- Hỗ trợ kh&aacute;m sức khỏe định kỳ</div>\n</div>\n<div class=\"job-locations mobile-box\">\n<h2>ĐỊA ĐIỂM L&Agrave;M VIỆC</h2>\n<div class=\"location row\">\n<div class=\"location-icon col-xs-1\">&nbsp;</div>\n<div class=\"location-name col-xs-11\">Số 854 Sư Vạn Hạnh, Quận 10, Th&agrave;nh phố HCM</div>\n</div>\n</div>', '600.00', NULL, 'SKU', 'instock', 0, 5, '1654355632.jpg', NULL, 18, '2022-06-04 08:13:52', '2022-06-13 03:09:42', NULL, 2, 1),
(36, 'Kỹ Thuật Viên Gây Mê', 'ky-thuat-vien-gay-me', '<p>BỆNH VIỆN THẨM MỸ &Aacute; &Acirc;U</p>\n<p>Địa Điểm L&agrave;m Việc: Hồ Ch&iacute; Minh</p>', '<div class=\"what-we-offer mobile-box\">\n<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\n<div class=\"benefits\">\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">Thu nhập tương xứng với năng lực chuy&ecirc;n m&ocirc;n, đ&oacute;ng g&oacute;p (thỏa thuận khi trao đổi).</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">Được tham gia BHXH, BHYT, BHTN theo quy định của Nh&agrave; nước v&agrave; ch&iacute;nh s&aacute;ch C&ocirc;ng ty ở cấp bậc quản l&yacute;.</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">Được chủ động trong kế hoạch l&agrave;m việc. Được l&agrave;m việc trong m&ocirc;i trường năng động v&agrave; chuy&ecirc;n nghiệp</div>\n</div>\n</div>\n</div>\n<div class=\"job-description mobile-box\">\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\n<div class=\"description\">I. TR&Aacute;CH NHIỆM:<br>- Thực hiện g&acirc;y m&ecirc; v&agrave; theo d&otilde;i dấu hiệu sinh tồn của kh&aacute;ch h&agrave;ng.<br>- Ti&ecirc;n lượng t&igrave;nh h&igrave;nh sức khỏe kh&aacute;ch h&agrave;ng trước khi phẫu thuật để chọn phương ph&aacute;p g&acirc;y m&ecirc; đảm bảo an to&agrave;n nhất .<br>- Cho thuốc m&ecirc; v&agrave; li&ecirc;n lạc c&ugrave;ng phẫu thuật vi&ecirc;n trong suốt qu&aacute; tr&igrave;nh phẫu thuật.<br>- Cho dịch truyền, thuốc, điện giải , m&aacute;u trong qu&aacute; tr&igrave;nh phẫu thuật.<br>- Di chuyển kh&aacute;ch h&agrave;ng c&ugrave;ng điều dưỡng v&ograve;ng ngo&agrave;i sang ph&ograve;ng hồi sức hậu phẫu .<br>- Theo d&otilde;i sự hồi tỉnh của kh&aacute;ch h&agrave;ng tại ph&ograve;ng hồi sức trong 24h sau phẫu thuật v&agrave; ghi hồ sơ.<br>- Kiểm tra b&igrave;nh &ocirc; xy v&agrave; c&aacute;c c&ocirc;ng cụ dụng cụ li&ecirc;n quan trước v&agrave; sau qu&aacute; tr&igrave;nh phẫu thuật.<br>- Thực hiện c&aacute;c quy định về y đức, c&aacute;c quy chế chuy&ecirc;n m&ocirc;n, c&aacute;c quy tr&igrave;nh kỹ thuật của ng&agrave;nh y tế v&agrave; c&aacute;c quy định của ph&aacute;p luật li&ecirc;n quan đến lĩnh vực g&acirc;y m&ecirc; hồi sức.</div>\n</div>\n<div class=\"job-requirements mobile-box\">\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\n<div class=\"requirements\">II. Y&Ecirc;U CẦU:<br>- Tốt nghiệp Cao đẳng chuy&ecirc;n khoa g&acirc;y m&ecirc; hồi sức.<br>- Kinh nghiệm thực tế từ 2 năm trở l&ecirc;n<br>- Th&agrave;nh thạo c&aacute;c kỹ thuật về g&acirc;y m&ecirc; hồi sức. Sử dụng tốt c&aacute;c dụng cụ phục vụ cho c&ocirc;ng t&aacute;c chuy&ecirc;n m&ocirc;n.<br>- Ưu ti&ecirc;n ứng vi&ecirc;n c&oacute; chứng chỉ h&agrave;nh nghề g&acirc;y m&ecirc; hồi sức.<br>III. QUYỀN LỢI:<br>- Lương thưởng xứng đ&aacute;ng theo năng lực v&agrave; theo sự cống hiến.<br>- Được tham gia BHXH, BHYT, BHTN theo quy định của Nh&agrave; nước.<br>- Được l&agrave;m việc trong m&ocirc;i trường năng động v&agrave; chuy&ecirc;n nghiệp.<br>IV. TH&Ocirc;NG TIN KH&Aacute;C:<br>- Thời gian thử việc: 2 th&aacute;ng<br>- Lương thử việc: 85% lương ch&iacute;nh thức<br>- Thời gian l&agrave;m việc: (8:00 &ndash; 11:30; 13:30 &ndash; 18:00). Th&aacute;ng nghỉ 04 ng&agrave;y.<br>- Địa điểm l&agrave;m việc: 32D Thủ Khoa Hu&acirc;n, Phường Bến Th&agrave;nh, Quận 1</div>\n</div>\n<div class=\"job-locations mobile-box\">\n<h2>ĐỊA ĐIỂM L&Agrave;M VIỆC</h2>\n<div class=\"location row\">\n<div class=\"location-icon col-xs-1\">&nbsp;</div>\n<div class=\"location-name col-xs-11\">32D Thủ Khoa Hu&acirc;n, P.Bến Th&agrave;nh, Q.1. TP. HCM</div>\n</div>\n</div>', '700.00', NULL, 'SKU', 'instock', 0, 3, '1654355685.jpg', NULL, 18, '2022-06-04 08:14:45', '2022-06-04 08:14:45', 3, 0, 1),
(37, ' Điều Dưỡng Trưởng', 'dieu-duong-truong', '<p>C&Ocirc;NG TY CỔ PHẦN BỆNH VIỆN ĐA KHOA QUỐC TẾ DNA</p>\n<p>Địa Điểm L&agrave;m Việc: Hồ Ch&iacute; Minh</p>', '<div class=\"what-we-offer mobile-box\">\n<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\n<div class=\"benefits\">\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">According to the company policy</div>\n</div>\n</div>\n</div>\n<div class=\"job-description mobile-box\">\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\n<div class=\"description\">&bull; Thực hiện c&ocirc;ng việc của 1 điều dưỡng trưởng<br>&bull; Tổ chức sắp xếp về nh&acirc;n lực tại khoa<br>&bull; Gi&aacute;m s&aacute;t kỹ thuật của điều dưỡng tại khoa<br>&bull; Ho&agrave;n tất hồ sơ v&agrave; sổ s&aacute;ch của khoa<br>&bull; Quản l&yacute; về vật tư - trang thiết bị tại khoa<br>&bull; Tham gia v&agrave;o c&ocirc;ng t&aacute;c điều dưỡng của khoa</div>\n</div>\n<div class=\"job-requirements mobile-box\">\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\n<div class=\"requirements\">&bull; Trung thực, Nhanh nhẹn<br>&bull; Chủ động trong c&ocirc;ng việc<br>&bull; Biết sắp xếp v&agrave; quản l&yacute; thời gian.<br>&bull; C&oacute; kỹ năng quản l&yacute;.<br>&bull; Ưu ti&ecirc;n c&oacute; bằng điều dưỡng trưởng, CCHN<br><br>Lương: thỏa thuận</div>\n</div>\n<div class=\"job-locations mobile-box\">\n<h2>ĐỊA ĐIỂM L&Agrave;M VIỆC</h2>\n<div class=\"location row\">\n<div class=\"location-icon col-xs-1\">&nbsp;</div>\n<div class=\"location-name col-xs-11\">1015 Đường Trần Hưng Đạo - Phường 5 - Quận 5</div>\n</div>\n</div>', '15000.00', NULL, 'SKU', 'instock', 0, 1, '1654355783.jpg', NULL, 18, '2022-06-04 08:16:23', '2022-06-04 08:16:23', NULL, 0, 1),
(38, ' Điều Dưỡng', 'dieu-duong', '<p>C&Ocirc;NG TY CỔ PHẦN BỆNH VIỆN ĐA KHOA QUỐC TẾ DNA</p>\n<p>Địa Điểm L&agrave;m Việc: Hồ Ch&iacute; Minh</p>', '<div class=\"what-we-offer mobile-box\">\n<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\n<div class=\"benefits\">\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">Chi tiết trao đổi trong buổi phỏng vấn.</div>\n</div>\n</div>\n</div>\n<div class=\"job-description mobile-box\">\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\n<div class=\"description\">- Tiếp đ&oacute;n người bệnh đến kh&aacute;m bệnh<br>- Trực tiếp thực hiện chăm s&oacute;c to&agrave;n diện cho người bệnh theo đ&uacute;ng quy chế chuy&ecirc;n m&ocirc;n v&agrave; quy định của cơ sở y tế<br>- Thực hiện y lệnh, c&aacute;c qui tr&igrave;nh kỹ thuật về theo d&otilde;i v&agrave; chăm s&oacute;c những diễn biến bất thường của người bệnh trong khoa.<br>- Thực hiện đ&uacute;ng y lệnh của B&aacute;c sĩ điều trị<br>- Thực hiện c&aacute;c kỹ thuật chuy&ecirc;n m&ocirc;n của Nh&acirc;n vi&ecirc;n Điều dưỡng</div>\n</div>\n<div class=\"job-requirements mobile-box\">\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\n<div class=\"requirements\">- SL: 10 người<br>- C&oacute; kinh nghiệm thực tế tại vị tr&iacute; tuyển dụng tối thiểu 1 năm.<br>- C&oacute; bằng cấp, chứng chỉ h&agrave;nh nghề<br>- Nhanh nhẹn, nắm bắt c&ocirc;ng việc tốt.<br>-Tốt nghiệp chuy&ecirc;n ng&agrave;nh điều dưỡng<br>- Chịu được &aacute;p lực c&ocirc;ng việc.<br>- H&ograve;a đồng, th&acirc;n thiện...</div>\n</div>\n<div class=\"job-locations mobile-box\">\n<h2>ĐỊA ĐIỂM L&Agrave;M VIỆC</h2>\n<div class=\"location row\">\n<div class=\"location-icon col-xs-1\">&nbsp;</div>\n<div class=\"location-name col-xs-11\">1015 Đường Trần Hưng Đạo - Phường 5 - Quận 5</div>\n</div>\n</div>', '700.00', NULL, 'SKU', 'instock', 0, 6, '1654356618.jpg', NULL, 18, '2022-06-04 08:30:18', '2022-06-04 08:30:18', 8, 0, 1),
(39, 'Y Tá Nhà Máy', 'y-ta-nha-may', '<p>INSEE VIET NAM</p>\n<p>Địa Điểm L&agrave;m Việc: Hồ Ch&iacute; Minh | Hồ Ch&iacute; Minh</p>', '<div class=\"what-we-offer mobile-box\">\n<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\n<div class=\"benefits\">\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">Yearly Bonus</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">Health Insurance</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">14 day annual leave</div>\n</div>\n</div>\n</div>\n<div class=\"job-description mobile-box\">\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\n<div class=\"description\">VỊ TR&Iacute;: Y T&Aacute; NH&Agrave; M&Aacute;Y (4 NH&Acirc;N VI&Ecirc;N)<br>- Nơi l&agrave;m việc:<br><br>+ KCN Hiệp Phước - Nh&agrave; B&egrave; - TP.HCM<br><br>+ KCN &Ocirc;ng K&egrave;o - Nhơn Trạch - Đồng Nai<br><br>NHIỆM VỤ CH&Iacute;NH:<br>Tiến h&agrave;nh sơ cứu cho tất cả nh&acirc;n vi&ecirc;n tại c&ocirc;ng trường khi c&oacute; sự cố xảy ra<br>Gi&aacute;m s&aacute;t việc kiểm tra mẫu thực phẩm<br>Lưu trữ hồ sơ, t&agrave;i liệu v&agrave; b&aacute;o c&aacute;o bao gồm hồ sơ sức khỏe của nh&acirc;n vi&ecirc;n &amp; c&aacute;c vấn đề y tế kh&aacute;c<br>C&aacute;c c&ocirc;ng việc h&agrave;nh ch&iacute;nh li&ecirc;n quan y tế</div>\n</div>\n<div class=\"job-requirements mobile-box\">\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\n<div class=\"requirements\">1. Tr&igrave;nh độ học vấn / bằng cấp:<br>Chứng chỉ điều dưỡng vi&ecirc;n (ưu ti&ecirc;n người tốt nghiệp Đại học Y Dược hoặc Đại học Y Phạm Ngọc Thạch)<br>Chứng chỉ h&agrave;nh nghề y t&aacute;<br><br>2. Kinh nghiệm l&agrave;m việc cụ thể:<br>Tối thiểu 1 năm kinh nghiệm trong c&ocirc;ng việc y t&aacute; tại bệnh viện / ph&ograve;ng kh&aacute;m<br><br>3. Kỹ năng kỹ thuật / chức năng:<br>Khả năng đưa ra c&aacute;c ph&aacute;n đo&aacute;n điều dưỡng độc lập<br>Kỹ năng giao tiếp tốt<br><br>4. Năng lực h&agrave;nh vi / Năng lực l&atilde;nh đạo v&agrave; quản l&yacute;:<br>Sử dụng th&agrave;nh thạo vi t&iacute;nh văn ph&ograve;ng (ưu ti&ecirc;n)<br>Hoạt b&aacute;t<br>Khả năng l&agrave;m việc dưới &aacute;p lực</div>\n</div>\n<div class=\"job-locations mobile-box\">\n<h2>ĐỊA ĐIỂM L&Agrave;M VIỆC</h2>\n<div class=\"location row\">\n<div class=\"location-icon col-xs-1\">&nbsp;</div>\n<div class=\"location-name col-xs-11\">HIEP PHUOC IZ - NHA BE - HCMC</div>\n</div>\n</div>', '1000.00', NULL, 'SKU', 'instock', 0, 4, '1654356690.jpg', NULL, 18, '2022-06-04 08:31:30', '2022-06-10 22:17:19', 14, 3, 1),
(40, 'Nhân Viên Y Tế Học Đường', 'nhan-vien-y-te-hoc-duong', '<p>TRƯỜNG THCS V&Agrave; THPT ĐINH THIỆN L&Yacute; ( LAWRENCE S.TING SCHOOL )</p>\n<p>Địa Điểm L&agrave;m Việc: Hồ Ch&iacute; Minh</p>', '<div class=\"what-we-offer mobile-box\">\n<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\n<div class=\"benefits\">\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">Mức lương cạnh tranh, thưởng c&aacute;c kỳ lễ; thưởng th&aacute;ng 13; thưởng thi đua, thưởng đột xuất</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">Tham quan du lịch trong v&agrave; ngo&agrave;i nước, Bảo hiểm sức khỏe, tai nạn 24/24</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">Cơ hội đ&agrave;o tạo n&acirc;ng cao tr&igrave;nh độ chuy&ecirc;n m&ocirc;n, học tập ở nước ngo&agrave;i</div>\n</div>\n</div>\n</div>\n<div class=\"job-description mobile-box\">\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\n<div class=\"description\">1. Phụ tr&aacute;ch c&ocirc;ng t&aacute;c chăm s&oacute;c sức khỏe cho học sinh<br> Thực hiện c&ocirc;ng t&aacute;c chăm s&oacute;c sức khỏe cho học sinh khối THCS, GV-NV: chịu tr&aacute;ch<br>nhiệm sơ cấp cứu v&agrave; xử l&yacute; c&aacute;c vấn đề li&ecirc;n quan đến sức khỏe cho học sinh khối THCS,<br>gi&aacute;o vi&ecirc;n, nh&acirc;n vi&ecirc;n; thực hiện c&aacute;c c&ocirc;ng t&aacute;c y tế theo y&ecirc;u cầu của c&aacute;c cơ quan chức<br>năng (bao gồm to&agrave;n bộ vấn đề bảo hiểm y tế, : lập kế hoạch, truyền th&ocirc;ng, thực hiện,<br>b&aacute;o c&aacute;o); thực hiện b&aacute;o c&aacute;o theo y&ecirc;u cầu của trường v&agrave; cơ quan chức năng.<br> Thực hiện c&aacute;c hoạt động gi&aacute;o dục v&agrave; truyền th&ocirc;ng sức khỏe cho học sinh cũng như tổ<br>chức tập huấn c&aacute;n sự y tế đầu năm học v&agrave; phụ tr&aacute;ch quản l&yacute; c&aacute;n sự y tế trong năm học<br> Thực hiện c&ocirc;ng t&aacute;c sự vụ h&agrave;nh ch&iacute;nh về gi&aacute;o dục sức khỏe như thực hiện hồ sơ, sổ<br>s&aacute;ch b&aacute;o c&aacute;o trong v&agrave; ngo&agrave;i trường, tiếp c&aacute;c đo&agrave;n kiểm tra y tế<br>2. Phụ tr&aacute;ch quản l&yacute; suất ăn<br> Quản l&yacute; việc đăng k&iacute;, thanh to&aacute;n suất ăn th&ocirc;ng qua việc lập danh s&aacute;ch v&agrave; theo d&otilde;i<br> Gi&aacute;m s&aacute;t, xử l&yacute; c&aacute;c vấn đề li&ecirc;n quan tới suất ăn.<br>3. Phụ tr&aacute;ch gi&aacute;m s&aacute;t về an to&agrave;n trường học<br> Thực hiện gi&aacute;m s&aacute;t an to&agrave;n vệ sinh thực phẩm của bếp ăn v&agrave; căn-tin như: Thực hiện<br>theo hướng dẫn, y&ecirc;u cầu của c&aacute;c cơ quan chức năng; Kiểm tra định kỳ v&agrave; đột xuất việc<br>nhập nguy&ecirc;n liệu thức ăn h&agrave;ng ng&agrave;y; Duyệt thực đơn h&agrave;ng th&aacute;ng của học sinh ; Gi&aacute;m<br>s&aacute;t, quản l&yacute; việc thực hiện vệ sinh an to&agrave;n thực phẩm của bếp ăn v&agrave; căn-tin; Phối hợp<br>với Ban đại diện CMHS, BGH thực hiện họp kiểm tra v&agrave; định k&igrave; h&agrave;ng th&aacute;ng với bếp ăn<br>để n&acirc;ng cao chất lượng suất ăn cho học sinh<br>4. C&ocirc;ng t&aacute;c phối hợp<br> Phối hợp c&ocirc;ng t&aacute;c chăm s&oacute;c sức khỏe v&agrave; truyền th&ocirc;ng cho học sinh THPT<br> Thực hiện c&aacute;c c&ocirc;ng t&aacute;c sự vụ theo ph&acirc;n c&ocirc;ng<br> Thực hiện c&aacute;c c&ocirc;ng t&aacute;c li&ecirc;n quan kh&aacute;c</div>\n</div>\n<div class=\"job-requirements mobile-box\">\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\n<div class=\"requirements\"> - Tốt nghiệp Trung cấp&nbsp;trở l&ecirc;n chuy&ecirc;n ng&agrave;nh Điều dưỡng/ y sĩ<br> - Nhanh nhẹn, c&oacute; khả năng tổ chức v&agrave; quản l&yacute;.<br> - Ngoại ngữ: kh&ocirc;ng y&ecirc;u cầu<br> - Tin học: C&oacute; khả năng xử l&yacute; số liệu qua excel<br> - Y&ecirc;u cầu kh&aacute;c:&nbsp;<br>+ &Iacute;t nhất 1 năm kinh nghiệm vị t&iacute; tương tự ở trường học hoặc vị tr&iacute; tương đương<br>+ Ưu ti&ecirc;n c&oacute; chứng chỉ h&agrave;nh nghề theo quy định của cơ quan chức năng<br>+ Kỹ năng cứng:&nbsp;<br>a. Kỹ năng xử tr&iacute; t&igrave;nh huống chuy&ecirc;n nghiệp<br>b. Kỹ năng tổ chức, quản l&yacute; c&ocirc;ng việc tốt<br>c.Kỹ năng giao tiếp tốt.<br>+Kỹ năng mềm:&nbsp;<br>a. Kỹ năng kết nối, l&agrave;m việc nh&oacute;m.<br>b. Kỹ năng lắng nghe<br>c. Kỹ năng tư duy (t&iacute;ch cực, phản biện, logic, s&aacute;ng tạo)<br>d. Kỹ năng quản l&yacute; thời gian, định hướng chi tiết trong c&ocirc;ng việc<br>+ Th&aacute;i độ l&agrave;m việc v&agrave; t&iacute;nh c&aacute;ch:&nbsp;<br>a. Trung thực, thẳng thắn, tạo được niềm tin của mọi người.<br>b. Tinh thần cầu tiến, ham học hỏi.<br>c. Nhiệt t&igrave;nh, tận t&acirc;m, y&ecirc;u thương học sinh.</div>\n</div>\n<div class=\"job-locations mobile-box\">\n<h2>ĐỊA ĐIỂM L&Agrave;M VIỆC</h2>\n<div class=\"location row\">\n<div class=\"location-icon col-xs-1\">&nbsp;</div>\n<div class=\"location-name col-xs-11\">80 Nguyễn Đức Cảnh, T&acirc;n Phong, Quận 7, Th&agrave;nh phố Hồ Ch&iacute; Minh, Việt Nam</div>\n</div>\n</div>', '800.00', NULL, 'SKU', 'instock', 0, 1, '1654356761.jpg', NULL, 18, '2022-06-04 08:32:41', '2022-06-10 22:15:53', 6, 1, 1),
(41, 'Nhân Viên Y Tế Cơ Quan - Thời Vụ 7 Tháng', 'nhan-vien-y-te-co-quan-thoi-vu-7-thang', '<p>C&Ocirc;NG TY TNHH ABBOTT HEALTHCARE VIỆT NAM</p>\n<p>Địa Điểm L&agrave;m Việc: H&agrave; Nội</p>', '<div class=\"what-we-offer mobile-box\">\n<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\n<div class=\"benefits\">\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">ăn trưa tại c&ocirc;ng ty</div>\n</div>\n</div>\n</div>\n<div class=\"job-description mobile-box\">\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\n<div class=\"description\">1. Tổ chức đ&agrave;o tạo sơ cấp cứu, đ&agrave;o tạo quy định an to&agrave;n, đ&agrave;o tạo, diễn tập PCCC, ngộ độc thực phẩm theo quy định.<br>2. Tham gia v&agrave;o việc điều tra sự cố, tai nạn lao động v&agrave; quản l&yacute; hồ sơ tai nạn.<br>3. Quản l&yacute; thuốc (hạn d&ugrave;ng, tủ sơ cấp cứu, t&uacute;i sơ cấp cứu, lập phiếu mua thuốc, trang thiết bị y tế)<br>4. Cập nhật ốm đau, tai nạn lao động v&agrave; bệnh nghề nghiệp<br>5. Nhận diện c&aacute;c h&agrave;nh vi, điều kiện kh&ocirc;ng an to&agrave;n của nh&acirc;n vi&ecirc;n, b&aacute;o c&aacute;o cho phụ tr&aacute;ch EHS<br>6. Thực hiện c&aacute;c cập nhật văn bản ph&aacute;p luật để bảo đảm lu&ocirc;n tu&acirc;n thủ quy định ph&aacute;p luật (lưu trữ hồ sơ, giấy ph&eacute;p, giấy kiểm định, b&aacute;o c&aacute;o&hellip;) đảm bảo phục vụ cho việc quản l&yacute;, kiểm tra v&agrave; thanh tra<br>7. Chịu tr&aacute;ch nhiệm quản l&yacute; hệ thống t&agrave;i liệu nh&agrave; m&aacute;y bằng việc hỗ trợ c&aacute;c y&ecirc;u cầu tạo hoặc thay đổi cho t&agrave;i liệu, xử l&yacute; c&aacute;c y&ecirc;u cầu thay đổi trong hệ thống quản l&yacute; t&agrave;i liệu điện tử<br>8. Theo d&otilde;i v&agrave; l&agrave;m b&aacute;o c&aacute;o định kỳ về y tế<br>9. Theo d&otilde;i v&agrave; bảo đảm c&aacute;c bộ phận tu&acirc;n thủ c&aacute;c quy tr&igrave;nh về EHS. B&aacute;o c&aacute;o cho phụ tr&aacute;ch EHS c&aacute;c điểm kh&ocirc;ng ph&ugrave; hợp.<br>10. Quản l&yacute; v&agrave; kiểm tra hệ thống c&ocirc;n tr&ugrave;ng định kỳ, cập nhật b&aacute;o c&aacute;o định kỳ<br>11. Thực hiện c&aacute;c y&ecirc;u cầu kh&aacute;c theo y&ecirc;u cầu của quản l&iacute;</div>\n</div>\n<div class=\"job-requirements mobile-box\">\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\n<div class=\"requirements\">- Về học vấn: Trung cấp y (y sĩ hoặc y t&aacute;) trở l&ecirc;n<br>- Về kinh nghiệm: &Iacute;t nhất 1 năm<br>- Địa điểm l&agrave;m việc: Nh&agrave; m&aacute;y Abbott Healthcare Việt Nam (Glomed 2 tại B&igrave;nh Dương)<br>- Kỹ năng cần thiết: C&oacute; kỹ năng truyền đạt, tinh thần đồng đội, Kỹ năng m&aacute;y t&iacute;nh (Cơ bản), c&oacute; kiến thức về GMP, EHS, y tế/ C&oacute; kiến thức tốt về luật ph&aacute;p Việt Nam quy định y tế v&agrave; quản l&yacute; an to&agrave;n</div>\n</div>', '800.00', NULL, 'SKU', 'instock', 1, 4, '1654357018.jpg', NULL, 17, '2022-06-04 08:36:58', '2022-06-13 20:18:05', 15, 1, 1),
(42, 'Professional Nurse cum Receptionist/ Y Tá Chuyên Nghiệp kiêm Lễ Tân', 'professional-nurse-cum-receptionist-y-ta-chuyen-nghiep-kiem-le-tan', '<p><br>Professional Nurse cum Receptionist/ Y T&aacute; Chuy&ecirc;n Nghiệp ki&ecirc;m Lễ T&acirc;n<br>VILLA AESTHETICA COSMEDI SPA - CLINIC</p>\n<p>Địa Điểm L&agrave;m Việc: Hồ Ch&iacute; Minh</p>', '<div class=\"what-we-offer mobile-box\">\n<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\n<div class=\"benefits\">\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">Lương + hoa hồng: Thoả Thuận</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">Tham gia BHXH đầy đủ</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">Nghỉ m&aacute;t, du lịch h&agrave;ng năm</div>\n</div>\n</div>\n</div>\n<div class=\"job-description mobile-box\">\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\n<div class=\"description\">Bạn Sẽ L&agrave;m G&igrave;<br>*5 years experienced<br>Typical duties of the job include:<br>- Assessing and planning nursing care requirements<br>- Providing pre- and post-operation care<br>- Monitoring and administering medication and intravenous infusions<br>- Taking patient samples, pulses, temperatures and blood pressures<br>- Writing records<br>- Supervising junior staff<br>- Organising workloads<br>- Providing emotional support to patients and relatives<br>- Tutoring student nurses<br>* Will discuss in interview.<br>- Incharge of Receptionist duties ( Will be trained)<br>- Tasks assigned by Spa Manager (Discuss in the interview)</div>\n</div>\n<div class=\"job-requirements mobile-box\">\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\n<div class=\"requirements\">Chuy&ecirc;n M&ocirc;n Của Bạn<br>- Fluent in English/ Tiếng anh th&ocirc;ng thạo.<br>- At least 5 years experience working in Hospital or Polyclinics/ &Iacute;t nhất 5 năm kinh nghiệm l&agrave;m việc tại bệnh viện hoặc c&aacute;c ph&ograve;ng kh&aacute;m đa khoa.<br>- Honest; careful at work./ Trung thực, cẩn thận trong c&ocirc;ng việc.<br>- Qualifications are required/ C&aacute;c bằng cấp/ chứng chỉ y&ecirc;u cầu:<br>+ Nurse Certificate./ Bằng Y t&aacute;, Điều dưỡng<br>+ Certificate of Medical Practice/ Chứng chỉ h&agrave;nh nghề kh&aacute;m chữa bệnh.<br>+ Medical Translator License./ Chứng nhận đủ tr&igrave;nh độ tiếng anh trong kh&aacute;m chữa bệnh.</div>\n<div class=\"requirements\">\n<h2>ĐỊA ĐIỂM L&Agrave;M VIỆC</h2>\n<div class=\"location row\">\n<div class=\"location-icon col-xs-1\">&nbsp;</div>\n<div class=\"location-name col-xs-11\">55 Ng&ocirc; Quang Huy, Phường Thảo Điền, TP. Thủ Đức, TP Hồ Ch&iacute; Minh</div>\n</div>\n</div>\n</div>', '500.00', NULL, 'SKU', 'instock', 0, 2, '1654357149.jpg', NULL, 18, '2022-06-04 08:39:09', '2022-06-04 08:39:09', 5, 0, 1),
(43, 'Nhân Viên Y Tế', 'nhan-vien-y-te', '<p>C&Ocirc;NG TY TNHH HỆ THỐNG D&Acirc;Y SUMI-HANEL</p>\n<p>Địa Điểm L&agrave;m Việc: H&agrave; Nội</p>', '<div class=\"what-we-offer mobile-box\">\n<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\n<div class=\"benefits\">\n<div class=\"benefit row\">\n<div class=\"benefit-name col-xs-11\">- Được x&eacute;t tăng lương v&agrave; phụ cấp theo định kỳ h&agrave;ng năm</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-name col-xs-11\">- C&aacute;c chế độ kh&aacute;c theo quy định của luật lao động.</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-name col-xs-11\">- Được nhận tiền thưởng chuy&ecirc;n cần h&agrave;ng th&aacute;ng, được nhận qu&agrave; nh&acirc;n dịp sinh nhật, được thưởng nh&acirc;n dịp</div>\n</div>\n</div>\n</div>\n<div class=\"job-description mobile-box\">\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\n<div class=\"description\">* C&aacute;c c&ocirc;ng việc sẽ đảm nhiệm tại Bộ phận:<br>- Kh&aacute;m chữa bệnh BHYT<br>- Xử tr&iacute; c&aacute;c t&igrave;nh huống cấp cứu<br>- C&aacute;c c&ocirc;ng việc kh&aacute;c theo sự ph&acirc;n c&ocirc;ng</div>\n</div>\n<div class=\"job-requirements mobile-box\">\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\n<div class=\"requirements\">- Nam, nữ tuổi từ 24~35<br>- Tốt nghiệp Đại học chuy&ecirc;n ng&agrave;nh b&aacute;c sỹ đa khoa<br>- Tr&igrave;nh độ m&aacute;y t&iacute;nh: sử dụng th&agrave;nh thạo Word, Excel<br>- Ưu ti&ecirc;n c&oacute; chứng chỉ h&agrave;nh nghề<br><br>Quyền lợi:<br>- Mức lương thỏa thuận khi phỏng vấn. Được x&eacute;t tăng lương v&agrave; phụ cấp theo định kỳ h&agrave;ng năm<br>- Phụ cấp tiếng Anh, tiếng Nhật ( Toeic: 400 điểm ~ 40 USD &hellip;)<br>- Căn cứ v&agrave;o kết quả kinh doanh, được thưởng 4 lần trong năm v&agrave;o c&aacute;c dịp: Tết dương lịch, 30/4 v&agrave; 01/5, 02/9, Tết &acirc;m lịch. Mức thưởng mỗi lần khoảng 1 th&aacute;ng lương cơ bản.<br>- Chế độ ph&uacute;c lợi: Được nhận tiền thưởng chuy&ecirc;n cần h&agrave;ng th&aacute;ng, được nhận qu&agrave; nh&acirc;n dịp sinh nhật, được thưởng nh&acirc;n dịp kỷ niệm ng&agrave;y th&agrave;nh lập c&ocirc;ng ty, được hỗ trợ tiền nghỉ m&aacute;t h&agrave;ng năm, được ăn trưa tại c&ocirc;ng ty&hellip;<br>- C&aacute;c chế độ kh&aacute;c theo quy định của luật lao động.<br>- C&ocirc;ng ty c&oacute; xe đưa đ&oacute;n từ H&agrave; Nội sang c&ocirc;ng ty v&agrave; ngược lại.<br>- Số ng&agrave;y l&agrave;m việc cho một năm khoảng 270 ng&agrave;y (Ngo&agrave;i c&aacute;c ng&agrave;y chủ nhật, mỗi th&aacute;ng được nghỉ tối thiểu l&agrave; 2 ng&agrave;y thứ 7)<br><br>Hồ sơ y&ecirc;u cầu:<br>- Sơ yếu l&yacute; lịch c&oacute; x&aacute;c nhận của ch&iacute;nh quyền địa phương.<br>- Bản x&aacute;c nhận d&acirc;n sự của c&ocirc;ng an x&atilde;, phường.<br>- Bản sao bằng tốt nghiệp.<br>- 1 bản sao giấy khai sinh.<br>- 1 bản ph&ocirc; t&ocirc; hộ khẩu<br>- 2 bản ph&ocirc; t&ocirc; chứng minh thư c&oacute; c&ocirc;ng chứng.<br>- 4 ảnh 3 X 4 ( chụp trong thời hạn dưới 6 th&aacute;ng ).<br><br>* Hạn nộp CV: 30/6/2022</div>\n</div>\n<div class=\"job-locations mobile-box\">\n<h2>ĐỊA ĐIỂM L&Agrave;M VIỆC</h2>\n<div class=\"location row\">\n<div class=\"location-name col-xs-11\">- Hai B&agrave; Trưng, H&agrave; Nội</div>\n</div>\n</div>', '600.00', NULL, 'SKU', 'instock', 0, 2, '1654357305.png', NULL, 17, '2022-06-04 08:41:45', '2022-06-13 02:13:38', 19, 1, 1),
(44, 'Bác Sĩ', 'bac-si', '<p>C&Ocirc;NG TY TNHH Đ&Oacute;NG T&Agrave;U HYUNDAI - VIỆT NAM (HVS)</p>\n<p>Địa Điểm L&agrave;m Việc: Đồng Nai</p>', '<div class=\"what-we-offer mobile-box\">\n<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\n<div class=\"benefits\">\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">M&ocirc;i trường l&agrave;m việc tốt, năng động, cơ hội được đ&agrave;o tạo, định hướng ph&aacute;t triển v&agrave; thăng tiến</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">Lương hấp dẫn theo năng lực, thưởng lễ, thưởng cuối năm, thưởng hiệu quả dự &aacute;n</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">C&aacute;c chế độ Bảo hiểm theo luật, kh&aacute;m sức khỏe định kỳ; Du lịch h&agrave;ng năm,....</div>\n</div>\n</div>\n</div>\n<div class=\"job-description mobile-box\">\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\n<div class=\"description\">M&Ocirc; TẢ C&Ocirc;NG VIỆC<br>&ndash; Sơ cấp cứu ban đầu, quyết định điều trị tại chỗ hoặc chuyển tuyến cho người lao động trong c&aacute;c trường hợp khẩn hoặc tai nạn lao động.<br>&ndash; Kh&aacute;m v&agrave; k&ecirc; đơn thuốc, điều trị một số bệnh th&ocirc;ng thường (cảm, sốt, ho, &hellip;), tư vấn sức khỏe cho người lao động.<br>&ndash; Đo huyết &aacute;p định kỳ cho người lao động, kh&aacute;m sức khỏe cho người lao động mới được c&ocirc;ng ty tuyển dụng hoặc trường hợp người lao động trở lại c&ocirc;ng ty l&agrave;m việc sau khi điều trị bệnh.<br>&ndash; Quản l&yacute;, chỉ đạo y t&aacute; sử dụng thuốc, c&aacute;c thiết bị y tế một c&aacute;ch an to&agrave;n v&agrave; hiệu quả, kiểm so&aacute;t &amp; lập kế hoạch mua v&agrave; dự tr&ugrave; c&aacute;c loại thuốc, thiết bị y tế cần thiết phục vụ cho c&ocirc;ng t&aacute;c kh&aacute;m chữa bệnh tại c&ocirc;ng ty.<br>&ndash; X&acirc;y dựng kế hoạch ph&ograve;ng chống dịch bệnh trong c&ocirc;ng ty, huấn luyện sơ cấp cứu, diễn tập sơ cấp cứu khi c&oacute; chỉ đạo từ cấp tr&ecirc;n. Hỗ trợ chỉ đạo c&ocirc;ng t&aacute;c an to&agrave;n vệ sinh lao động theo đ&uacute;ng quy định hiện h&agrave;nh.</div>\n</div>\n<div class=\"job-requirements mobile-box\">\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\n<div class=\"requirements\">Y&Ecirc;U CẦU C&Ocirc;NG VIỆC<br>&ndash; B&aacute;c sĩ đa khoa, chuy&ecirc;n khoa<br>&ndash; L&agrave;m việc tại ph&ograve;ng An To&agrave;n, Sức Khỏe c&ocirc;ng ty<br>&ndash; Đang trong độ tuổi lao động hoặc đ&atilde; nghỉ hưu<br>&ndash; Tiền lương theo sự thỏa thuận của 2 b&ecirc;n.<br><br>C&Aacute;C PH&Uacute;C LỢI<br>&ndash; BHXH theo luật, Bảo hiểm tai nạn 24/24<br>&ndash; Thưởng th&aacute;ng lương 13 &amp; 14, c&aacute;c ng&agrave;y lễ, thưởng năng suất theo kết quả kinh doanh<br>&ndash; Ph&eacute;p năm: 12 ng&agrave;y/ năm, chế độ nghỉ h&egrave;: 5 ng&agrave;y/năm, &hellip;<br>&ndash; K&yacute; t&uacute;c x&aacute; c&oacute; m&aacute;y lạnh, m&aacute;y giặt, s&acirc;n thể thao, đầy đủ tiện nghi cho nh&acirc;n vi&ecirc;n ở xa.<br>- C&oacute; xe bu&yacute;t đưa đ&oacute;n theo điểm<br>- Hỗ trợ ăn trưa tại nh&agrave; h&agrave;ng c&ocirc;ng ty</div>\n<div class=\"requirements\">\n<h2>ĐỊA ĐIỂM L&Agrave;M VIỆC</h2>\n<div class=\"location row\">\n<div class=\"location-name col-xs-11\">Đồng Nai, Việt Nam</div>\n</div>\n</div>\n</div>', '1000.00', NULL, 'SKU', 'instock', 0, 2, '1654357662.jpg', NULL, 20, '2022-06-04 08:47:42', '2022-06-04 08:47:42', NULL, 0, 1),
(45, 'Occupational Health Nurse (Y Tá)', 'occupational-health-nurse-y-ta', '<div class=\"col-sm-12 company-name\">INTEL PRODUCTS VIETNAM</div>\n<div class=\"col-sm-12 company-name\">Địa Điểm L&agrave;m Việc: Hồ Ch&iacute; Minh</div>', '<div class=\"what-we-offer mobile-box\">\n<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\n<div class=\"benefits\">\n<div class=\"benefit row\">\n<div class=\"benefit-name col-xs-11\">Competitive Compensation &amp; Benefit (13th month salary, attractive bonuses,..)</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-name col-xs-11\">Premium Health Care Package for you and your family</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-name col-xs-11\">Attractive Training Programs &amp; Exciting team activities</div>\n</div>\n</div>\n</div>\n<div class=\"job-description mobile-box\">\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\n<div class=\"description\">Provides health services to employees or other persons on the company premises who become ill or suffer an accident. May work with Corporate Safety to recognize environmental factors and stresses in or from the workplace that may cause sickness, impaired health, or discomfort among the employees. Responds to customer and client requests or events as they occur. Develops solutions to problems utilizing formal education and judgment.<br><br>The Occupational Health (OH) Professional Nurse in Vietnam will be responsible for working with the Vietnam Occupational Health Program owner to provide support and consultation to Vietnam employees, outsourced Health service provider, vendors, and stakeholders.<br><br>OH Job Responsibilities will include but not limited to:<br>&bull; Compliance to OH business processes, programs, standards, guidelines, medical directives and training.<br>&bull; Collaborating with OH and EHS stakeholders to ensure the right care at the right time for employees including business group, HR, Occupational Health Physician and Suppliers.<br>&bull; Comprehensive management of cases involving employees with either occupational or non-occupational conditions, including disability cases, affecting their ability to work.<br>&bull; Help drive continuous improvement aimed at enhancing the Intel OH program and experience.<br>&bull; Assist in managing OH clinic or manage contractors who operate OH clinics<br>&bull; Oversee OSHA record keeping compliance by suppliers. Validate work related injury and illness escalation or de-escalation cases.<br>&bull; Assures accurate documentation and strict privacy controls of medical data in compliance with all laws, regulations and appropriate standards<br>&bull; Ensure compliance to regulations and Intel Standards: OSHA audits of records.<br>&bull; Perform quarterly OH program Self Assessment and MMP audit in partnership with the OH nurse lead to ensure compliance to the OH programs and ensure timely closure of AR if any.<br>&bull; Maintain up to date knowledge of local laws and regulations pertaining to Occupational Health, accommodations, and local Workers Compensation Laws where applicable.<br>&bull; Collaborate on COVID 19 and other communicable disease cases with site OH lead and Corporate OH and local Department of Public Health.<br>&bull; Encourage a positive environment and experience for injured or ill employees.<br>&bull; Communicate to management regarding specific health and safety issues; escalation to Corporate and Senior Management as needed<br>&bull; Maintain strong working knowledge of pertinent EHS OH systems, e.g. database, e-mail accounts, VPN, encryption, etc.<br>&bull; Maintain current status for all required licensure and certifications.<br>&bull; Build and Maintain contacts with local and national resources to remain current on latest OH practices.<br>&bull; Assist in managing OH supplier working with the OH supplier\'s management to ensure smooth running of the occupational health clinics<br>&bull; Drive continuous improvement practices with all OH processes.</div>\n</div>\n<div class=\"job-requirements mobile-box\">\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\n<div class=\"requirements\">Minimum qualifications are required to be initially considered for this position. Preferred qualifications are in addition to the minimum requirements and are considered a plus factor in identifying top candidates.<br>&bull; Minimum Qualifications: Diploma/ Bachelor\'s Degree in Nursing and be a Registered Nurse under Vietnamese Nursing council.<br>&bull; Min of 2-3 years work experience in a Hospital and/or 5 years of Occupational Health experience<br>&bull; Previous Medical Case Management or work experience in multi-national companies under OH department is a plus.<br>&bull; Excellent communication skills in both Vietnamese and English (written and spoken) to a high standard<br><br>Preferred Qualifications:<br>&bull; Capability to communicate in English, both oral and written<br>&bull; Customer service oriented<br>&bull; Attention to detail<br>&bull; Ability to work in a dynamic environment<br>&bull; Team Player<br>&bull; Highly Organized Results Driven.<br>&bull; Self-Motivated<br>&bull; Positive Attitude</div>\n</div>\n<div class=\"job-locations mobile-box\">\n<h2>ĐỊA ĐIỂM L&Agrave;M VIỆC</h2>\n<div class=\"location row\">\n<div class=\"location-icon col-xs-1\">&nbsp;</div>\n<div class=\"location-name col-xs-11\">L&ocirc; I2, đường D1, Khu C&ocirc;ng Nghệ Cao TP.HCM</div>\n</div>\n</div>', '3000.00', NULL, 'SKU', 'instock', 0, 4, '1654873300.jpg', NULL, 18, '2022-06-10 08:01:40', '2022-06-10 08:01:40', 11, 0, 7);
INSERT INTO `jobs` (`id`, `name`, `slug`, `short_description`, `description`, `regular_salary`, `fix_salary`, `SKU`, `stock_status`, `featured`, `quantity`, `image`, `images`, `category_id`, `created_at`, `updated_at`, `sub_category_id`, `totalviews`, `user_id`) VALUES
(47, 'Seafreight Export Operation Specialist (Nhân Viên Điều Hành Hàng Xuất Đường Biển)', 'seafreight-export-operation-specialist-nhan-vien-dieu-hanh-hang-xuat-duong-bien', '<p>LOGWIN AIR + OCEAN VIETNAM CO., LTD</p>\n<p>Job Locations: Hai Phong</p>', '<div class=\"what-we-offer mobile-box\">\n<h2>WHAT WE CAN OFFER</h2>\n<div class=\"benefits\">\n<div class=\"benefit row\">\n<div class=\"benefit-name col-xs-11\">- 13th month salary, variable Bonus based on the company achievements and individual performance</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-name col-xs-11\">- Healthcare programe</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-name col-xs-11\">- People-oriented</div>\n</div>\n</div>\n</div>\n<div class=\"job-description mobile-box\">\n<h2>JOB DESCRIPTION</h2>\n<div class=\"description\">&bull; To comply with Logwin regulation about Compliance/ Code of Conduct<br>&bull; To follow up with overseas offices to obtain the approval to uplift FOB shipments<br>&bull; To follow up with sales/customer service or the local customer to obtain the approval to uplift sale&rsquo;s control shipments<br>&bull; To place the booking with shipping lines or co-loader<br>&bull; To send the booking confirmation to the shipper<br>&bull; To update the shipping details to the overseas office<br>&bull; To issue the Bill of Lading and related shipment documents after the cargo was uplifted<br>&bull; To issue the invoice to the shipper or the overseas office<br>&bull; To check and book all relevant costs of the shipment into the Operating System<br>&bull; To perform above and other tasks with the goal of operational excellence and always in compliance with the company rules and regulations<br>&bull; To maintain a pro-active follow up of all shipments (especially information updates towards the customer/overseas office)<br>&bull; To have a clear focus on profitability<br>&bull; To avoid or reduce cost whenever possible<br>&bull; To establish and maintain a close cooperation with local and overseas colleagues and partners<br>&bull; To closely focus on the achievement of targets (KPI&rsquo;s) as set by the organization (continuous improvement)<br>&bull; To inform the superior immediately in case of problems, concerns or any potential risks<br>&bull; To handle all claims (first steps of the claim process) as per company claim procedure / guidelines<br>&bull; Make sure internal reporting follow deadlines, do annual assessment with your team.</div>\n<a class=\"view-more clickable\">Read full Job Descriptions</a></div>\n<div class=\"job-requirements mobile-box\">\n<h2>JOB REQUIREMENTS</h2>\n<div class=\"requirements\">&bull; Bachelor Degree &ndash; Preferably Foreign Trade or Maritime University<br>&bull; Fluency in English<br>&bull; Experience with at least 04 years working for Global Forwarder in Sea Export Department.<br>&bull; Self-motivated, dedicated and hard working<br>&bull; Good sense of customer service and team work<br>&bull; Sense of urgency, able to prioritize<br>&bull; Ability to deal with high pressure situation<br>&bull; Nationality: Vietnamese<br><br>What\'s On Offer<br><br>&bull; Chance to work for a professional &amp; global environment<br>&bull; Very attractive monthly base salary and incentive bonus<br>&bull; A promising career path and opportunity to cross-function learning<br>&bull; Health care program<br>&bull; People-oriented</div>\n</div>\n<div class=\"job-locations mobile-box\">\n<h2>JOB LOCATIONS</h2>\n<div class=\"location row\">\n<div class=\"location-icon col-xs-1\">&nbsp;</div>\n<div class=\"location-name col-xs-11\">TD Business Center-TD Plaza, No 4-5, Lot 20A, Le Hong Phong Street, Ngo Quyen District, Hai Phong</div>\n</div>\n</div>', '700.00', NULL, 'SKU', 'instock', 0, 10, '1655783149.jpg', NULL, 21, '2022-06-20 20:45:49', '2022-06-20 20:45:49', NULL, 0, 7),
(48, 'Relationship Manager (Salary Up to 20 Millions)', 'relationship-manager-salary-up-to-20-millions', '<p>DOCTOR ANYWHERE VIỆT NAM</p>\n<p>Địa Điểm L&agrave;m Việc: H&agrave; Nội</p>', '<div class=\"what-we-offer mobile-box\">\n<h2>C&Aacute;C PH&Uacute;C LỢI D&Agrave;NH CHO BẠN</h2>\n<div class=\"benefits\">\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">Bảo hiểm sức khỏe cho nh&acirc;n vi&ecirc;n ch&iacute;nh thức</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">16 ng&agrave;y nghỉ ph&eacute;p c&oacute; lương/năm</div>\n</div>\n<div class=\"benefit row\">\n<div class=\"benefit-icon col-xs-1\">&nbsp;</div>\n<div class=\"benefit-name col-xs-11\">Thử việc 100% lương</div>\n</div>\n</div>\n</div>\n<div class=\"job-description mobile-box\">\n<h2>M&Ocirc; TẢ C&Ocirc;NG VIỆC</h2>\n<div class=\"description\">- Take care of Customer (most of the customers are VIP);<br>- Contact potential clients to establish rapport and arrange meetings;<br>- Research organizations and individuals to find new opportunities;<br>- Increase the value of current customers while attracting new ones;<br>- Find and develop new markets and improve sales;<br>- Attend conferences, meetings, and industry events;<br>- Develop quotes and proposals for clients;<br>- Assist Business Development Director.</div>\n</div>\n<div class=\"job-requirements mobile-box\">\n<h2>Y&Ecirc;U CẦU C&Ocirc;NG VIỆC</h2>\n<div class=\"requirements\">- Bachelor&rsquo;s degree in business, insurance, banking or related field;<br>- Experience in sales, banking, insurance, customer service or health care field at least 1 years;<br>- Strong communication skills and good looking;<br>- Proficient in Word, Excel, Outlook, and PowerPoint;<br>- Comfortable using a computer for various tasks;<br>- Have English is an advantage.<br><br>BENEFITS:<br>- Working in a dynamic, professional environment with many opportunities for advancement;<br>- Working time: 8:30 - 17:30, Monday - Friday;<br>- 100% salary in probation time, 16 days of leave / year;<br>- Provide full equipment to serve the job;<br>- Social insurance, health insurance and unemployment insurance according to the Labor Law. Personal health insurance package;<br>- Enjoy the welfare policies according to the company\'s regulations;<br>- Regular training and professional improvement;<br>- Friendly, comfortable and safe working environment.</div>\n</div>\n<div class=\"job-locations mobile-box\">\n<h2>ĐỊA ĐIỂM L&Agrave;M VIỆC</h2>\n<div class=\"location row\">\n<div class=\"location-icon col-xs-1\">&nbsp;</div>\n<div class=\"location-name col-xs-11\">H&agrave; Nội, Việt Nam</div>\n</div>\n</div>', '850.00', NULL, 'SKU', 'instock', 0, 2, '1655801352.jpg', NULL, 20, '2022-06-21 01:49:12', '2022-06-21 01:49:12', NULL, 0, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proficiency` enum('beginner','intermediate','advanced','native') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `languages`
--

INSERT INTO `languages` (`id`, `user_id`, `language`, `proficiency`, `created_at`, `updated_at`) VALUES
(1, 3, 'English', 'beginner', '2022-06-19 03:27:10', '2022-06-19 03:30:39'),
(2, 3, 'eee', 'advanced', '2022-06-19 03:35:09', '2022-06-19 03:35:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(41, '2014_10_12_000000_create_users_table', 1),
(42, '2014_10_12_100000_create_password_resets_table', 1),
(43, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(44, '2019_08_19_000000_create_failed_jobs_table', 1),
(45, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(46, '2022_01_15_050659_create_sessions_table', 1),
(47, '2022_03_01_064103_create_categories_table', 1),
(48, '2022_03_01_064158_create_jobs_table', 1),
(49, '2022_04_21_091038_create_home_sliders_table', 2),
(50, '2022_05_06_093022_create_home_categories_table', 3),
(51, '2022_05_17_070649_create_orders_table', 4),
(52, '2022_05_17_070909_create_order_jobs_table', 4),
(53, '2022_05_17_070941_create_shippings_table', 4),
(54, '2022_05_17_071032_create_transactions_table', 4),
(55, '2022_05_18_165625_create_recruitments_table', 5),
(56, '2022_05_18_165859_create_recruitment_jobs_table', 5),
(57, '2022_05_22_035114_add_processed_canceled_date_to_recruitments_table', 6),
(58, '2022_05_22_055053_create_reviews_table', 7),
(59, '2022_05_22_055628_add_rstatus_to_recruitment_jobs_table', 7),
(60, '2022_05_23_081624_edit_recruitments_table', 8),
(61, '2022_05_23_093855_change_recruitment_job_id_in_reviews_table', 9),
(62, '2022_05_23_094651_change_recruitment_job_id_in_reviews_table', 10),
(63, '2022_05_23_100512_create_reviews_table', 11),
(64, '2022_05_23_162449_create_contacts_table', 12),
(65, '2022_05_24_081421_create_settings_table', 13),
(66, '2022_05_24_110256_edit_column_map_settings_table', 14),
(67, '2018_12_23_120000_create_shoppingcart_table', 15),
(68, '2022_05_25_130701_create_subcategories_table', 15),
(69, '2022_05_26_032827_add_sub_category_id_to_jobs_table', 16),
(71, '2022_06_07_154635_add_totalviews_to_jobs_table', 18),
(72, '2022_05_26_062344_create_profiles_table', 19),
(73, '2022_06_15_085922_create_posts_table', 20),
(74, '2022_06_15_102000_add_status_to_posts_table', 21),
(75, '2022_06_15_153601_add_totalviews_post_to_posts_table', 22),
(76, '2022_06_15_162555_create_posts_table', 23),
(77, '2022_06_16_040915_add_short_description_to_posts_table', 24),
(78, '2022_06_16_074154_alter_table_users_change_utype', 25),
(79, '2022_06_16_082652_create_roles_table', 26),
(80, '2022_06_16_083207_add_role_id_to_users_table', 27),
(81, '2022_06_18_025136_create_work_histories_table', 28),
(83, '2022_06_18_030925_create_skills_table', 28),
(84, '2022_06_18_031245_create_languages_table', 28),
(85, '2022_06_18_031453_create_work_preferences_table', 28),
(86, '2022_06_18_031812_create_activities_table', 28),
(87, '2022_06_18_032006_create_certifications_table', 28),
(88, '2022_06_19_092111_create_education_table', 29),
(89, '2022_06_20_072933_create_references_table', 30),
(90, '2022_06_21_022028_add_user_id_to_jobs_table', 31);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('minhanhhoang812@gmail.com', '$2y$10$pNJhoKYw.2iDi3PhRYxQfuGGYSuzNOBkbsmUzSvxDT.N4hydVz9CW', '2022-06-20 20:09:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `totalviews_post` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `image`, `description`, `status`, `totalviews_post`, `created_at`, `updated_at`, `short_description`) VALUES
(1, 'Quyết toán thuế thu nhập cá nhân 2022: Thời hạn và thủ tục thực hiện', 'quyet-toan-thue-thu-nhap-ca-nhan-2022-thoi-han-va-thu-tuc-thuc-hien', '1655310936.jpg', '<p>Quyết to&aacute;n thuế thu nhập c&aacute; nh&acirc;n l&agrave; việc người nộp thuế k&ecirc; khai để x&aacute;c định số tiền thuế phải nộp của năm liền trước, từ đ&oacute; x&aacute;c định số tiền thuế c&ograve;n thiếu hoặc nộp thừa để l&agrave;m căn cứ ho&agrave;n thuế.</p>\n<h2><span id=\"demuc636220\" class=\"demuc4\"><strong>1. Thời hạn quyết to&aacute;n thuế thu nhập c&aacute; nh&acirc;n</strong></span></h2>\n<p>Khoản 2 Điều 44 Luật Quản l&yacute; thuế 2019 quy định thời hạn quyết to&aacute;n thuế thu nhập c&aacute; nh&acirc;n (TNCN) cho kỳ t&iacute;nh thuế 2021 như sau:</p>\n<p>&ndash; Thời hạn quyết to&aacute;n thuế đối với tổ chức, c&aacute; nh&acirc;n trả thu nhập từ tiền lương, tiền c&ocirc;ng&nbsp;<strong><em>chậm nhất l&agrave; ng&agrave;y 31/3/2022</em></strong>.</p>\n<p>&ndash; Thời hạn quyết to&aacute;n thuế đối với c&aacute; nh&acirc;n c&oacute; thu nhập từ tiền lương, tiền c&ocirc;ng&nbsp;trực tiếp quyết to&aacute;n thuế với cơ quan thuế&nbsp;<strong><em>chậm nhất l&agrave; ng&agrave;y 30/4/2022</em></strong>.</p>\n<p>Căn cứ C&ocirc;ng văn 636/TCT-DNNCN th&igrave;&nbsp;<strong><em>thời hạn chậm nhất phải quyết to&aacute;n thuế cho thu nhập nhận được trong năm 2021 l&agrave; ng&agrave;y 02/5/2022</em></strong>. Tuy nhi&ecirc;n, vẫn n&ecirc;n thực hiện trước ng&agrave;y 30/4/2022&nbsp;để tr&aacute;nh trường hợp kh&ocirc;ng kịp quyết to&aacute;n do bị dồn hồ sơ.</p>\n<h2><span id=\"demuc636221\" class=\"demuc4\"><strong>2. Đối tượng phải quyết to&aacute;n thuế thu nhập c&aacute; nh&acirc;n</strong></span></h2>\n<p>Căn cứ điểm d khoản 6 Điều 8 Nghị định 126/2020/NĐ-CP v&agrave; C&ocirc;ng văn 636/TCT-DNNCN, những đối tượng sau phải quyết to&aacute;n thuế TNCN:</p>\n<p>(1) Tổ chức, c&aacute; nh&acirc;n trả tiền lương, tiền c&ocirc;ng;</p>\n<p>(2) Ủy quyền quyết to&aacute;n thuế TNCN;</p>\n<p>(3) C&aacute; nh&acirc;n trực tiếp quyết to&aacute;n với cơ quan thuế.</p>\n<h2><span id=\"demuc636222\" class=\"demuc4\"><strong>3. 5 trường hợp kh&ocirc;ng phải quyết to&aacute;n thuế thu nhập c&aacute; nh&acirc;n</strong></span></h2>\n<p>Theo tiết d.3 điểm d khoản 6 Điều 8 Nghị định 126/2020/NĐ-CP v&agrave; C&ocirc;ng văn 636/TCT-DNNCN, nếu thuộc một trong những trường hợp sau đ&acirc;y sẽ kh&ocirc;ng phải quyết thuế TNCN.</p>\n<p>(1) Tổ chức, c&aacute; nh&acirc;n trả thu nhập từ tiền lương, tiền c&ocirc;ng kh&ocirc;ng ph&aacute;t sinh trả thu nhập th&igrave; kh&ocirc;ng phải khai quyết to&aacute;n thuế TNCN.</p>\n<p>(2) C&aacute; nh&acirc;n c&oacute; số thuế TNCN phải nộp th&ecirc;m sau quyết to&aacute;n của từng năm từ 50.000 đồng trở xuống. C&aacute; nh&acirc;n được miễn thuế trong trường hợp n&agrave;y tự x&aacute;c định số tiền thuế được miễn, kh&ocirc;ng bắt buộc phải nộp hồ sơ quyết to&aacute;n thuế TNCN v&agrave; kh&ocirc;ng phải nộp hồ sơ miễn thuế.</p>\n<p><img class=\"alignnone wp-image-33074 size-full\" src=\"https://hrinsider-v2.vietnamworks.com//wp-content/uploads/2022/03/shutterstock_759220960.jpg\" sizes=\"(max-width: 1200px) 100vw, 1200px\" srcset=\"https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/03/shutterstock_759220960.jpg 1200w, https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/03/shutterstock_759220960-300x225.jpg 300w, https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/03/shutterstock_759220960-1024x768.jpg 1024w, https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/03/shutterstock_759220960-768x576.jpg 768w, https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/03/shutterstock_759220960-510x382.jpg 510w, https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/03/shutterstock_759220960-1080x810.jpg 1080w\" alt=\"\" width=\"1200\" height=\"900\" loading=\"lazy\"></p>\n<h2><span id=\"demuc636223\" class=\"demuc4\"><strong>4. Ủy quyền quyết to&aacute;n thuế thu nhập c&aacute; nh&acirc;n</strong></span></h2>\n<p>Theo tiết d.2 điểm d khoản 6 Điều 8 Nghị định 126/2020/NĐ-CP v&agrave; C&ocirc;ng văn 636/TCT-DNNCN, c&aacute; nh&acirc;n cư tr&uacute; c&oacute; thu nhập từ tiền lương, tiền c&ocirc;ng được ủy quyền quyết to&aacute;n thuế cho tổ chức, c&aacute; nh&acirc;n trả thu nhập nếu thuộc c&aacute;c trường hợp được ủy quyền.</p>\n<p>Để ủy quyền quyết to&aacute;n thuế th&igrave; c&aacute; nh&acirc;n cần thực hiện theo 02 bước sau:</p>\n<p><strong>Bước 1</strong>: Chuẩn bị mẫu ủy quyền quyết to&aacute;n thuế</p>\n<p>Tải v&agrave; điền th&ocirc;ng tin theo mẫu số&nbsp;08/UQ-QTT-TNCN&nbsp;ban h&agrave;nh k&egrave;m theo Th&ocirc;ng tư 80/2021/TT-BTC.</p>\n<p><strong>Bước 2</strong>: Gửi giấy ủy quyền cho tổ chức, c&aacute; nh&acirc;n trả thu nhập.</p>\n<h2><span id=\"demuc636224\" class=\"demuc4\"><strong>5. Hồ sơ quyết to&aacute;n thuế thu nhập c&aacute; nh&acirc;n</strong></span></h2>\n<p>Căn cứ phụ lục ban h&agrave;nh k&egrave;m theo Nghị định 126/2020/NĐ-CP v&agrave; mẫu tờ khai ban h&agrave;nh k&egrave;m theo Th&ocirc;ng tư 80/2021/TT-BTC, hồ sơ quyết to&aacute;n thuế TNCN được quy định như sau:</p>\n<p><em>* Đối với tổ chức, c&aacute; nh&acirc;n trả tiền lương, tiền c&ocirc;ng</em></p>\n<p>(1) Tờ khai thuyết to&aacute;n thuế TNCN theo mẫu&nbsp;05/QTT-TNCN.</p>\n<p>(2) Phụ lục bảng k&ecirc; chi tiết c&aacute; nh&acirc;n thuộc diện t&iacute;nh thuế theo biểu lũy tiến từng phần theo mẫu số&nbsp;05-1/BK-QTT-TNCN.</p>\n<p>(3) Phụ lục bảng k&ecirc; chi tiết c&aacute; nh&acirc;n thuộc diện t&iacute;nh thuế theo thuế suất to&agrave;n phần theo mẫu số&nbsp;05-2/BK-QTT-TNCN.</p>\n<p>(4) Phụ lục bảng k&ecirc; chi tiết người phụ thuộc giảm trừ gia cảnh theo mẫu số&nbsp;05-3/BK-QTT-TNCN.</p>\n<p><em>* C&aacute; nh&acirc;n c&oacute; thu nhập từ tiền lương, tiền c&ocirc;ng trực tiếp khai thuế với cơ quan thuế</em></p>\n<h2><span id=\"demuc636225\" class=\"demuc4\"><strong>6. Thủ tục quyết to&aacute;n thuế thu nhập c&aacute; nh&acirc;n</strong></span></h2>\n<p><strong><em>6.1. Thủ tục đối với c&aacute; nh&acirc;n tự quyết to&aacute;n thuế</em></strong></p>\n<p><em>* C&aacute; nh&acirc;n trực tiếp quyết to&aacute;n thuế tại cơ quan thuế</em></p>\n<p>Gồm 02 bước:</p>\n<p><strong>Bước 1</strong>: Nộp hồ sơ</p>\n<p>C&aacute; nh&acirc;n cư tr&uacute; c&oacute; thu nhập tiền lương, tiền c&ocirc;ng tại 01 nơi v&agrave; thuộc diện tự khai thuế trong năm th&igrave; nộp hồ sơ khai quyết to&aacute;n thuế tại cơ quan thuế nơi c&aacute; nh&acirc;n trực tiếp khai thuế trong năm theo quy định sau:</p>\n<p>&ndash; C&aacute; nh&acirc;n cư tr&uacute; do tổ chức, c&aacute; nh&acirc;n tại Việt Nam trả thu nhập thuộc diện chịu thuế TNCN nhưng chưa khấu trừ thuế th&igrave; c&aacute; nh&acirc;n nộp hồ sơ khai thuế đến cơ quan thuế trực tiếp quản l&yacute; tổ chức, c&aacute; nh&acirc;n trả thu nhập.</p>\n<p>&ndash; C&aacute; nh&acirc;n cư tr&uacute; c&oacute; thu nhập từ tiền lương, tiền c&ocirc;ng trả từ nước ngo&agrave;i th&igrave; c&aacute; nh&acirc;n nộp hồ sơ khai thuế đến cơ quan thuế quản l&yacute; nơi c&aacute; nh&acirc;n ph&aacute;t sinh c&ocirc;ng việc tại Việt Nam. Trường hợp nơi ph&aacute;t sinh c&ocirc;ng việc của c&aacute; nh&acirc;n kh&ocirc;ng ở tại Việt Nam th&igrave; c&aacute; nh&acirc;n nộp hồ sơ khai thuế đến cơ quan thuế nơi c&aacute; nh&acirc;n cư tr&uacute;.</p>\n<p><strong>Bước 2</strong>: Tiếp nhận v&agrave; xử l&yacute; hồ sơ</p>\n<p><em>* Quyết to&aacute;n thuế TNCN qua mạng.</em></p>\n<p><em>Xem chi tiết tại</em>:&nbsp;Hướng dẫn c&aacute; nh&acirc;n tự quyết to&aacute;n thuế TNCN online</p>\n<p><strong><em>6.2. Thủ tục quyết to&aacute;n thuế đối với tổ chức, c&aacute; nh&acirc;n trả thu nhập</em></strong></p>\n<p>Kế to&aacute;n thực hiện quyết to&aacute;n thuế TNCN qua phần mềm kế to&aacute;n của đơn vị hoặc th&ocirc;ng qua phần mềm hỗ trợ k&ecirc; khai của Tổng cục Thuế.</p>\n<h2><span id=\"demuc636226\" class=\"demuc4\"><strong>7. Mức phạt khi chậm quyết to&aacute;n thuế thu nhập</strong></span></h2>\n<p>Căn cứ Điều 13 Nghị định 125/2020/NĐ-CP, t&ugrave;y theo thời gian chậm quyết to&aacute;n m&agrave; c&oacute; thể bị phạt cảnh c&aacute;o hoặc phạt tiền (mức&nbsp;<strong><em>thấp nhất l&agrave; 02 triệu đồng v&agrave; mức cao nhất l&agrave; 25 triệu đồng</em></strong>).</p>\n<p>Lưu &yacute;: Trường hợp c&aacute; nh&acirc;n c&oacute; ph&aacute;t sinh ho&agrave;n thuế thu nhập c&aacute; nh&acirc;n nhưng chậm nộp tờ khai quyết to&aacute;n thuế theo quy định th&igrave; kh&ocirc;ng &aacute;p dụng phạt đối với vi phạm h&agrave;nh ch&iacute;nh khai quyết to&aacute;n thuế qu&aacute; thời hạn.</p>', 0, 0, '2022-06-15 09:35:36', '2022-06-20 08:11:00', '<p>Quyết to&aacute;n thuế thu nhập c&aacute; nh&acirc;n l&agrave; việc người nộp thuế k&ecirc; khai để x&aacute;c định số tiền thuế phải nộp của năm liền trước, từ đ&oacute; x&aacute;c định số tiền thuế c&ograve;n thiếu hoặc nộp thừa để l&agrave;m căn cứ ho&agrave;n thuế.</p>'),
(2, '11 quy định mới về tiền lương, BHXH có lợi cho người lao động', '11-quy-dinh-moi-ve-tien-luong-bhxh-co-loi-cho-nguoi-lao-dong', '1655311002.jpg', '<p>Vừa qua, Ch&iacute;nh phủ đ&atilde; ban h&agrave;nh loạt Nghị định xử phạt vi phạm h&agrave;nh ch&iacute;nh ở nhiều lĩnh vực, trong đ&oacute; c&oacute; lĩnh vực lao động, bảo hiểm x&atilde; hội (BHXH). C&ugrave;ng điểm lại 11 quy định mới về c&aacute;c lĩnh vực n&agrave;y tại Nghị định 12/2022/NĐ-CP.</p>\n<p>Nghị định 12 quy định nhiều mức phạt mới đối với c&aacute;c vi phạm li&ecirc;n quan đến tiền lương, bảo hiểm x&atilde; hội của người sử dụng lao động (sau đ&acirc;y gọi l&agrave; doanh nghiệp). Qua đ&oacute;, nhằm hạn chế t&igrave;nh trạng vi phạm của doanh nghiệp, gi&uacute;p quyền lợi của người lao động được đảm bảo hơn.</p>\n<h2><strong>1. VỀ TIỀN LƯƠNG</strong></h2>\n<p><strong>1</strong>. Doanh nghiệp phải trả cho người lao động một khoản tiền tương ứng với tiền lương theo hợp đồng lao động nếu cho người lao động th&ocirc;i việc do thay đổi cơ cấu, c&ocirc;ng nghệ hoặc v&igrave; l&yacute; do kinh tế m&agrave; kh&ocirc;ng trao đổi trước với người lao động hoặc tổ chức đại diện người lao động hoặc kh&ocirc;ng th&ocirc;ng b&aacute;o trước 30 ng&agrave;y cho UBND cấp tỉnh (theo điểm c khoản 4 Điều 12)</p>\n<p><em>Trước đ&acirc;y:</em>&nbsp;Doanh nghiệp chỉ bị phạt tiền từ 05 &ndash; 10 triệu đồng m&agrave; kh&ocirc;ng phải trả tiền cho người lao động nếu vi phạm trong trường hợp n&ecirc;u tr&ecirc;n.</p>\n<p><strong>2.&nbsp;</strong>Kh&ocirc;ng c&ocirc;ng khai thang lương, bảng lương, mức lao động, quy chế thưởng tại nơi l&agrave;m việc trước khi thực hiện, doanh nghiệp bị phạt từ 05 &ndash; 10 triệu đồng (điểm a khoản 1 Điều 17)</p>\n<p><em>Trước đ&acirc;y</em>: Doanh nghiệp chỉ bị phạt từ 02 &ndash; 05 triệu đồng</p>\n<p><strong>3.</strong>&nbsp;Kh&ocirc;ng x&acirc;y dựng thang lương, bảng lương, định mức lao động, doanh nghiệp bị phạt từ 05 &ndash; 10 trệu đồng (điểm b khoản 1 Điều 17)</p>\n<p><em>Trước đ&acirc;y:</em>&nbsp;Doanh nghiệp chỉ bị phạt từ 02 &ndash; 05 triệu đồng.</p>\n<p><strong>4.</strong>&nbsp;Kh&ocirc;ng th&ocirc;ng b&aacute;o bảng k&ecirc; trả lương hoặc c&oacute; th&ocirc;ng b&aacute;o bảng k&ecirc; trả lương cho người lao động nhưng kh&ocirc;ng đ&uacute;ng quy định, doanh nghiệp bị phạt từ 05 &ndash; 10 triệu đồng (điểm d khoản 1 Điều 17).</p>\n<p><em>Trước đ&acirc;y:</em>&nbsp;Kh&ocirc;ng c&oacute; quy định xử phạt đối với h&agrave;nh vi n&agrave;y.</p>\n<p>Quy định xử phạt n&agrave;y được bổ sung nhằm ph&ugrave; hợp với quy định tại khoản 3 Điều 95 của Bộ luật Lao động 2019, trong đ&oacute; y&ecirc;u cầu mỗi lần trả lương, doanh nghiệp phải th&ocirc;ng b&aacute;o bảng k&ecirc; trả lương cho người lao động, trong đ&oacute; ghi r&otilde; tiền lương, tiền lương l&agrave;m th&ecirc;m giờ, tiền lương l&agrave;m việc v&agrave;o ban đ&ecirc;m, nội dung v&agrave; số tiền bị khấu trừ (nếu c&oacute;).</p>\n<p><strong>&nbsp;5.&nbsp;</strong>Doanh nghiệp kh&ocirc;ng trả lương b&igrave;nh đẳng hoặc ph&acirc;n biệt giới t&iacute;nh đối với người lao động l&agrave;m c&ocirc;ng việc c&oacute; gi&aacute; trị như nhau sẽ bị phạt từ 05 &ndash; 10 triệu đồng (điểm đ khoản 1 Điều 12).</p>\n<p><em>Trước đ&acirc;y:</em>&nbsp;Kh&ocirc;ng quy định xử phạt đối với h&agrave;nh vi n&agrave;y.</p>\n<p>Quy định n&agrave;y cũng được nhấn mạnh tại khoản 3 Điều 90 của Bộ luật Lao động 2019: Doanh nghiệp phải bảo đảm trả lương b&igrave;nh đẳng, kh&ocirc;ng ph&acirc;n biệt giới t&iacute;nh đối với người lao động l&agrave;m c&ocirc;ng việc c&oacute; gi&aacute; trị như nhau.</p>\n<p><strong>6.&nbsp;</strong>Trong trường hợp doanh nghiệp kh&ocirc;ng trả hoặc trả kh&ocirc;ng đủ c&ugrave;ng l&uacute;c với kỳ trả lương một khoản tiền cho người lao động tương đương với mức người sử dụng lao động đ&oacute;ng bảo hiểm x&atilde; hội bắt buộc, bảo hiểm y tế, bảo hiểm thất nghiệp cho người lao động kh&ocirc;ng thuộc đối tượng tham gia bảo hiểm x&atilde; hội bắt buộc, bảo hiểm y tế, bảo hiểm thất nghiệp theo quy định, th&igrave; người lao động c&ograve;n được hưởng th&ecirc;m một khoản tiền l&atilde;i của số tiền đ&oacute; t&iacute;nh theo mức l&atilde;i suất tiền gửi kh&ocirc;ng kỳ hạn cao nhất của c&aacute;c ng&acirc;n h&agrave;ng thương mại nh&agrave; nước c&ocirc;ng bố tại thời điểm xử phạt (điểm b khoản 5 Điều 17).</p>\n<p><em>Trước đ&acirc;y</em>: Người lao động chỉ được trả đủ khoản tiền tương đương với mức đ&oacute;ng bảo hiểm x&atilde; hội bắt buộc, bảo hiểm y tế, bảo hiểm thất nghiệp.</p>\n<p><strong>7.</strong>&nbsp;Kh&ocirc;ng cho lao động nữ trong thời gian nu&ocirc;i con dưới 12 th&aacute;ng tuổi nghỉ 60 ph&uacute;t mỗi ng&agrave;y (trừ trường hợp hai b&ecirc;n c&oacute; thỏa thuận kh&aacute;c), ngo&agrave;i bị xử phạt tiền, doanh nghiệp buộc phải trả tiền lương cho người lao động nữ tương ứng với thời gian m&agrave; người lao động kh&ocirc;ng được nghỉ trong thời gian nu&ocirc;i con dưới 12 th&aacute;ng tuổi (điểm b khoản 3 Điều 28).</p>\n<p><em>Trước đ&acirc;y:</em>&nbsp;Vi phạm quy định n&agrave;y, doanh nghiệp chỉ bị phạt tiền.&nbsp;</p>\n<p><img class=\"alignnone wp-image-32494 size-full\" src=\"https://hrinsider-v2.vietnamworks.com//wp-content/uploads/2022/04/shutterstock_1886682682-1.jpg\" sizes=\"(max-width: 1200px) 100vw, 1200px\" srcset=\"https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/04/shutterstock_1886682682-1.jpg 1200w, https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/04/shutterstock_1886682682-1-300x157.jpg 300w, https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/04/shutterstock_1886682682-1-1024x535.jpg 1024w, https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/04/shutterstock_1886682682-1-768x401.jpg 768w, https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/04/shutterstock_1886682682-1-1080x564.jpg 1080w\" alt=\"C&aacute;ch đặt ng&acirc;n s&aacute;ch v&agrave; tu&acirc;n thủ ng&acirc;n s&aacute;ch bạn cần phải biết\" width=\"1200\" height=\"627\" loading=\"lazy\"></p>\n<h2><strong>II. VỀ BẢO HIỂM X&Atilde; HỘI &nbsp;</strong></h2>\n<p><strong>1.&nbsp;</strong>Doanh nghiệp kh&ocirc;ng ni&ecirc;m yết c&ocirc;ng khai hằng năm th&ocirc;ng tin đ&oacute;ng BHXH của người lao động do cơ quan BHXH cung cấp sẽ bị phạt từ 01 &ndash; 03 triệu đồng (điểm a khoản 2 Điều 39).</p>\n<p><em>Trước đ&acirc;y:</em>&nbsp;Trường hợp n&agrave;y chỉ bị xử phạt từ 500.000 đồng &ndash; 01 triệu đồng.</p>\n<p><strong>2.&nbsp;</strong>Doanh nghiệp kh&ocirc;ng cung cấp hoặc cung cấp kh&ocirc;ng đầy đủ th&ocirc;ng tin về đ&oacute;ng BHXH bắt buộc, bảo hiểm thất nghiệp của người lao động khi người lao động y&ecirc;u cầu th&igrave; bị xử phạt 01 &ndash; 03 triệu đồng (điểm b khoản 2 Điều 39).</p>\n<p><em>Trước đ&acirc;y</em>: Trường hợp n&agrave;y chỉ bị phạt từ 500.000 đồng &ndash; 01 triệu đồng.</p>\n<p><strong>3.&nbsp;</strong>Doanh nghiệp kh&ocirc;ng l&agrave;m thủ tục x&aacute;c nhận về việc đ&oacute;ng bảo hiểm thất nghiệp cho người lao động để người lao động ho&agrave;n thiện hồ sơ hưởng bảo hiểm thất nghiệp bị phạt từ 01 &ndash; 03 triệu đồng khi vi phạm với mỗi người lao động nhưng tối đa 75 triệu đồng (khoản 3 Điều 39).</p>\n<p><em>Trước đ&acirc;y:</em>&nbsp;Doanh nghiệp chỉ bị phạt từ 500.000 đồng &ndash; 01 triệu đồng.</p>\n<p><strong>4.</strong>&nbsp;Doanh nghiệp chiếm dụng tiền đ&oacute;ng BHXH, bảo hiểm thất nghiệp của người lao động bị phạt từ 12 &ndash; 15% tổng số tiền phải đ&oacute;ng BHXH bắt buộc, bảo hiểm thất nghiệp tại thời điểm lập bi&ecirc;n bản vi phạm h&agrave;nh ch&iacute;nh, nhưng tối đa kh&ocirc;ng qu&aacute; 75 triệu đồng (điểm d khoản 5 Điều 39).</p>\n<p><em>Trước đ&acirc;y:</em>&nbsp;Kh&ocirc;ng c&oacute; quy định xử phạt đối với h&agrave;nh vi n&agrave;y.</p>\n<p>Nghị định 12/2022/NĐ-CP c&oacute; hiệu lực từ ng&agrave;y 17/01/2022. 11<strong>&nbsp;quy định mới về tiền lương, BHXH c&oacute; lợi cho người lao động&nbsp;</strong>n&ecirc;u tr&ecirc;n được so s&aacute;nh với quy định tại&nbsp;Nghị định 28/2020/NĐ-CP&nbsp;(hết hiệu lực từ ng&agrave;y 17/02/2022).</p>', 1, 0, '2022-06-15 09:36:42', '2022-06-15 09:36:42', '<p>Vừa qua, Ch&iacute;nh phủ đ&atilde; ban h&agrave;nh loạt Nghị định xử phạt vi phạm h&agrave;nh ch&iacute;nh ở nhiều lĩnh vực, trong đ&oacute; c&oacute; lĩnh vực lao động, bảo hiểm x&atilde; hội (BHXH). C&ugrave;ng điểm lại 11 quy định mới về c&aacute;c lĩnh vực n&agrave;y tại Nghị định 12/2022/NĐ-CP.</p>\r\n<p>Nghị định 12 quy định nhiều mức phạt mới đối với c&aacute;c vi phạm li&ecirc;n quan đến tiền lương, bảo hiểm x&atilde; hội của người sử dụng lao động (sau đ&acirc;y gọi l&agrave; doanh nghiệp). Qua đ&oacute;, nhằm hạn chế t&igrave;nh trạng vi phạm của doanh nghiệp, gi&uacute;p quyền lợi của người lao động được đảm bảo hơn.</p>'),
(3, 'Chính sách mới về lao động, tiền lương có hiệu lực tháng 3/2022', 'chinh-sach-moi-ve-lao-dong-tien-luong-co-hieu-luc-thang-32022', '1655311080.jpg', '<p>Th&aacute;ng 3 tới l&agrave; thời điểm c&oacute; hiệu lực của h&agrave;ng loạt c&aacute;c Th&ocirc;ng tư li&ecirc;n quan đến ch&iacute;nh s&aacute;ch về lao động, tiền lương. Dưới đ&acirc;y l&agrave; tổng hợp những quy định mới đ&aacute;ng ch&uacute; &yacute; nhất.</p>\n<h2><span id=\"demuc355280\" class=\"demuc4\"><strong>1. Quy định cụ thể c&aacute;ch t&iacute;nh tần suất tai nạn để giảm mức đ&oacute;ng BHXH</strong></span></h2>\n<p>Ng&agrave;y 28/12/2021, Bộ Lao động &ndash; Thương binh v&agrave; X&atilde; hội đ&atilde; ban h&agrave;nh Th&ocirc;ng tư&nbsp;27/2021/TT-BLĐTBXH, trong đ&oacute; hướng dẫn c&aacute;ch t&iacute;nh tần suất tai nạn lao động l&agrave;m căn cứ để được &aacute;p dụng mức đ&oacute;ng thấp hơn mức đ&oacute;ng b&igrave;nh thường v&agrave;o quỹ bảo hiểm tai nạn lao động, bệnh nghề nghiệp.</p>\n<p>Cụ thể, theo Điều 8 Th&ocirc;ng tư 27, tần suất tai nạn lao động được t&iacute;nh theo c&ocirc;ng thức sau:</p>\n<div>Trong đ&oacute;:</div>\n<p>&ndash; Ki l&agrave; tần suất tai nạn lao động của năm i;</p>\n<p>&ndash; Ni l&agrave; số lượt người bị tai nạn lao động v&agrave; số người chết v&igrave; tai nạn lao động được hưởng chế độ bảo hiểm tai nạn lao động từ Quỹ bảo hiểm tai nạn lao động, bệnh nghề nghiệp t&iacute;nh từ 01/01 đến hết 31/12 trong năm thứ i;</p>\n<p>&ndash; Pi l&agrave; số người lao động tham gia bảo hiểm x&atilde; hội (BHXH) bắt buộc t&iacute;nh từ 01/01 đến hết 31/12 trong năm thứ i.</p>\n<p>Tần suất tai nạn lao động trung b&igrave;nh của 03 năm liền kề trước năm đề xuất được t&iacute;nh như sau:</p>\n<p>Trong đ&oacute;:</p>\n<div id=\"uk-content-player-1649831284070\" class=\"uk-player\"></div>\n<p>&ndash; Ktb l&agrave; tần suất tai nạn lao động trung b&igrave;nh của 03 năm liền kề trước năm đề xuất;</p>\n<p>&ndash; K1 l&agrave; tần suất tai nạn lao động của năm liền kề trước năm đề xuất (năm thứ 1);</p>\n<p>&ndash; K2 l&agrave; tần suất tai nạn lao động của năm liền kề trước năm thứ nhất (năm thứ 2);</p>\n<p>&ndash; K3 l&agrave; tần suất tai nạn lao động của năm liền kề trước năm thứ hai (năm thứ 3).</p>\n<p>C&aacute;ch t&iacute;nh n&agrave;y được &aacute;p dụng kể từ từ ng&agrave;y 01/3/2022.</p>\n<p>Nếu tần suất tai nạn lao động của năm liền kề trước năm đề xuất giảm từ 15% trở l&ecirc;n so với tần suất tai nạn lao động trung b&igrave;nh của 03 năm liền kề trước năm đề xuất hoặc kh&ocirc;ng để xảy ra tai nạn lao động trong 03 năm liền kề trước năm đề xuất th&igrave; doanh nghiệp sẽ c&oacute; cơ hội được&nbsp;<em><strong>xem x&eacute;t giảm mức đ&oacute;ng BHXH v&agrave;o quỹ tai nạn lao động, bệnh nghề nghiệp từ 0,5% xuống c&ograve;n 0,3%</strong></em>.</p>\n<h2><span id=\"demuc355281\" class=\"demuc4\"><strong>2. Hướng dẫn mới về chi trả trợ cấp tai nạn lao động, bệnh nghề nghiệp</strong></span></h2>\n<p>Ng&agrave;y 01/3/2022 cũng l&agrave; thời điểm c&oacute; hiệu lực của Th&ocirc;ng tư&nbsp;28/2021/TT-BLĐTBXH&nbsp;hướng dẫn thi h&agrave;nh Luật An to&agrave;n, vệ sinh lao động, thay thế cho Th&ocirc;ng tư&nbsp;04/2015/TT-BLĐTBXH&nbsp;v&agrave; Th&ocirc;ng tư&nbsp;26/2017/TT-BLĐTBXH.</p>\n<p>Theo Th&ocirc;ng tư mới, c&aacute;ch thức chi trả chế độ tai nạn lao động trong trường hợp đặc th&ugrave; đ&atilde; c&oacute; sự điều chỉnh.</p>\n<p>Căn cứ khoản 2 Điều 8 Th&ocirc;ng tư 28/2021, trường hợp người lao động thuộc đối tượng tham gia BHXH bắt buộc nhưng doanh nghiệp kh&ocirc;ng đ&oacute;ng BHXH cho họ th&igrave; phải trả cho người lao động bị tai nạn lao động, bệnh nghề nghiệp số tiền tương ứng với chế độ trợ cấp m&agrave; đ&aacute;ng lẽ do cơ quan BHXH thanh to&aacute;n.</p>\n<p>Trước đ&acirc;y, việc chi trả số tiền tr&ecirc;n c&oacute; thể thực hiện một lần hoặc h&agrave;ng th&aacute;ng theo thỏa thuận của c&aacute;c b&ecirc;n.</p>\n<p>Tuy nhi&ecirc;n, để đảm bảo quyền lợi cho người lao động, Th&ocirc;ng tư mới đ&atilde;&nbsp;<strong><em>bổ sung th&ecirc;m quy định về trường hợp c&aacute;c b&ecirc;n kh&ocirc;ng thống nhất h&igrave;nh thức chi trả th&igrave; thực hiện theo y&ecirc;u cầu của người lao động.</em></strong></p>\n<h2><span id=\"demuc355282\" class=\"demuc4\"><strong>3. C&aacute;n bộ x&atilde; gi&agrave; yếu đ&atilde; nghỉ việc được trợ cấp đến 2.473.000&nbsp;đồng/th&aacute;ng</strong></span></h2>\n<p>Theo hướng dẫn tại Th&ocirc;ng tư&nbsp;02/2022/TT-BNV, c&aacute;n bộ x&atilde;, phường, thị trấn đ&atilde; nghỉ việc hưởng trợ cấp hằng th&aacute;ng theo&nbsp;Quyết định số 130-CP&nbsp;năm 1975 v&agrave;&nbsp;Quyết định số 111-HĐBT&nbsp;năm 1981 sẽ được điều chỉnh&nbsp;<em><strong>tăng 7,4% mức trợ cấp hằng th&aacute;ng</strong></em>.</p>\n<p>Theo khoản 2 Điều 2 Th&ocirc;ng tư 02/2022, sau khi đ&atilde; l&agrave;m tr&ograve;n số, c&aacute;n bộ x&atilde; gi&agrave; yếu đ&atilde; nghỉ việc sẽ được nhận mức trợ cấp hằng th&aacute;ng như sau:</p>\n<p>&ndash; C&aacute;n bộ nguy&ecirc;n l&agrave; B&iacute; thư Đảng ủy, Chủ tịch Ủy&nbsp;ban&nbsp;nh&acirc;n d&acirc;n x&atilde;:&nbsp;<em><strong>2.473.000&nbsp;đồng/th&aacute;ng</strong></em>.</p>\n<p>&ndash; C&aacute;n bộ nguy&ecirc;n l&agrave; Ph&oacute; B&iacute; thư, Ph&oacute; Chủ tịch, Thường trực Đảng ủy, Ủy vi&ecirc;n thư k&yacute; Ủy&nbsp;ban&nbsp;nh&acirc;n d&acirc;n, Thư k&yacute; Hội đồng nh&acirc;n d&acirc;n x&atilde;, X&atilde; đội trưởng, Trưởng c&ocirc;ng&nbsp;an&nbsp;x&atilde;:&nbsp;<em><strong>2.400.000&nbsp;đồng/th&aacute;ng</strong></em>.</p>\n<p>&ndash; C&aacute;c chức&nbsp;danh&nbsp;c&ograve;n lại:&nbsp;<em><strong>2.237.000&nbsp;đồng/th&aacute;ng</strong></em>.</p>\n<p>Mặc d&ugrave; Th&ocirc;ng tư n&agrave;y c&oacute; hiệu lực&nbsp;thi&nbsp;h&agrave;nh kể từ ng&agrave;y&nbsp;15/3/2022 nhưng chế độ trợ cấp tr&ecirc;n được thực hiện ngay từ ng&agrave;y 01/01/2022.</p>\n<h2><span id=\"demuc355283\" class=\"demuc4\"><strong>4. Y&ecirc;u cầu thu thập th&ecirc;m nhiều th&ocirc;ng tin về thị trường lao động</strong></span></h2>\n<p>Đ&acirc;y l&agrave; nội dung đ&aacute;ng ch&uacute; &yacute; tại Th&ocirc;ng tư&nbsp;01/2022/TT-BLĐTBXH, c&oacute; hiệu lực từ ng&agrave;y 10/3/2022.</p>\n<p>Theo đ&oacute;, Bộ Lao động &ndash; Thương Binh v&agrave; X&atilde; hội&nbsp;<em><strong>y&ecirc;u cầu thu thập th&ecirc;m nhiều th&ocirc;ng tin về thị trường lao động</strong></em>. Cụ thể:</p>\n<p>&ndash; Thu thập th&ocirc;ng tin về cung lao động: Ngo&agrave;i th&ocirc;ng tin về họ t&ecirc;n, ng&agrave;y sinh, giới t&iacute;nh, tr&igrave;nh độ gi&aacute;o dục phổ th&ocirc;ng, c&ocirc;ng việc hiện tại, t&igrave;nh trạng thất nghiệp,&hellip; Th&ocirc;ng tư mới y&ecirc;u cầu bổ sung th&ecirc;m th&ocirc;ng tin về nhu cầu đ&agrave;o tạo, việc l&agrave;m (<em>Điều 7 Th&ocirc;ng tư 01/2022</em>).</p>\n<p>&ndash; Thu thập th&ocirc;ng tin về người lao động nước ngo&agrave;i l&agrave;m việc tại Việt Nam: Ngo&agrave;i th&ocirc;ng c&aacute; nh&acirc;n, giấy ph&eacute;p lao động, vị tr&iacute; c&ocirc;ng việc đang l&agrave;m, quy định mới y&ecirc;u cầu thu thập th&ecirc;m th&ocirc;ng tin về tr&igrave;nh độ chuy&ecirc;n m&ocirc;n đ&agrave;o tạo v&agrave; chuy&ecirc;n ng&agrave;nh đ&agrave;o tạo; h&igrave;nh thức l&agrave;m việc; loại h&igrave;nh doanh nghiệp, tổ chức l&agrave;m việc; kinh nghiệm l&agrave;m việc; chứng chỉ h&agrave;nh nghề; địa điểm v&agrave; thời gian l&agrave;m việc (<em>Điều 13 Th&ocirc;ng tư 01/2022</em>).</p>\n<p>C&aacute;c trung t&acirc;m dịch vụ việc l&agrave;m sẽ l&agrave; đơn vị thực hiện nhiệm vụ thu thập c&aacute;c th&ocirc;ng tin về thị trường lao động n&oacute;i tr&ecirc;n v&agrave; b&aacute;o c&aacute;o cho Sở Lao động &ndash; Thương binh v&agrave; X&atilde; hội.</p>', 1, 0, '2022-06-15 09:38:00', '2022-06-15 09:38:00', '<p>Th&aacute;ng 3 tới l&agrave; thời điểm c&oacute; hiệu lực của h&agrave;ng loạt c&aacute;c Th&ocirc;ng tư li&ecirc;n quan đến ch&iacute;nh s&aacute;ch về lao động, tiền lương. Dưới đ&acirc;y l&agrave; tổng hợp những quy định mới đ&aacute;ng ch&uacute; &yacute; nhất.</p>'),
(4, '5 từ giúp nhà lãnh đạo giỏi lên mỗi ngày', '5-tu-giup-nha-lanh-dao-gioi-len-moi-ngay', '1655311135.jpg', '<p>Khi bạn th&agrave;nh ni&ecirc;n, ch&iacute;nh thức bước v&agrave;o thị trường lao động, đối diện với những thử th&aacute;ch tr&ecirc;n đường đời ắt hẳn kh&ocirc;ng &iacute;t lần ta tự hỏi liệu sứ mệnh của ta ở cuộc đời l&agrave; g&igrave;, niềm đam m&ecirc; lớn nhất của ta l&agrave; g&igrave;? C&oacute; v&ocirc; v&agrave;n những c&acirc;u hỏi, những ước mơ lớn lao, nhưng d&aacute;m chắc kh&aacute;t vọng trở n&ecirc;n th&agrave;nh c&ocirc;ng, trở th&agrave;nh một người l&atilde;nh đạo t&agrave;i giỏi lu&ocirc;n l&agrave; một phần trong ch&uacute;ng ta.Trở th&agrave;nh nh&agrave; l&atilde;nh đạo đ&atilde; kh&oacute;, nhưng việc bạn c&oacute; thể trở th&agrave;nh một nh&agrave; l&atilde;nh đạo to&agrave;n diện lại c&agrave;ng kh&oacute; khăn hơn rất nhiều lần. Nếu bạn kh&ocirc;ng l&agrave;m tốt trọng tr&aacute;ch n&agrave;y, to&agrave;n bộ quy tr&igrave;nh vận h&agrave;nh của tổ chức, qu&aacute; tr&igrave;nh đ&oacute;ng g&oacute;p của nh&acirc;n vi&ecirc;n sẽ trở n&ecirc;n độc quyền, t&acirc;m l&yacute; l&agrave;m việc của nh&acirc;n vi&ecirc;n cũng sẽ trở n&ecirc;n sao nh&atilde;ng, mất tập trung. T&aacute;c động của điều đ&oacute; kh&ocirc;ng chỉ dừng lại ở l&agrave;m giảm năng suất l&agrave;m việc, hiệu suất kinh doanh m&agrave; c&ograve;n tạo n&ecirc;n những tiền lệ về lối quản l&yacute; nh&acirc;n sự sai lầm. Vậy l&agrave;m thế n&agrave;o để trở th&agrave;nh một nh&agrave; l&atilde;nh đạo to&agrave;n diện? Sau đ&acirc;y ch&iacute;nh l&agrave; năm từ bạn c&oacute; thể khắc ghi, ứng dụng để tự ho&agrave;n thiện bản th&acirc;n mỗi ng&agrave;y.</p>\n<p><strong>Nhận thức</strong></p>\n<p>L&atilde;nh đạo hiệu quả thể hiện qua khả năng nhận thức được tiềm năng của bản th&acirc;n, của tổ chức cũng như cơ hội ph&aacute;t triển của lĩnh vực hoạt động, kinh doanh, từ đ&oacute; x&acirc;y dựng n&ecirc;n chiến lược, mục ti&ecirc;u ph&aacute;t triển ho&agrave;n chỉnh. Nhận thức ch&iacute;nh l&agrave; nhận định r&otilde; về khả năng của bản th&acirc;n v&agrave; đ&aacute;nh gi&aacute; ch&iacute;nh x&aacute;c về những đối thủ cạnh tranh. Hầu hết những nh&agrave; l&atilde;nh đạo khi đ&atilde; đạt được một mức độ th&agrave;nh c&ocirc;ng nhất định sẽ mắc phải sự tự m&atilde;n hoặc ki&ecirc;u ngạo. Khi bạn c&oacute; được những th&agrave;nh tựu trong một v&agrave;i qu&yacute;, một giai đoạn kinh doanh, bạn sẽ được tiếp th&ecirc;m sự tự tin, nhưng đ&ocirc;i l&uacute;c sự tự tin ấy l&agrave;m giảm khả năng ph&aacute;n đo&aacute;n của bạn về t&igrave;nh h&igrave;nh hiện tại, dễ đưa ra những quyết định vượt ngo&agrave;i tiềm lực c&oacute; thể đạt được. Một nh&agrave; l&atilde;nh đạo cần phải học c&aacute;ch chấp nhận rằng c&oacute; những điều m&igrave;nh vẫn chưa học được, hay l&agrave;m chưa tốt. Nhận ra điều đ&oacute;, bạn c&oacute; tr&aacute;ch nhiệm học hỏi để khắc phục điểm yếu bản th&acirc;n, đ&oacute;ng g&oacute;p cho tổ chức, hay li&ecirc;n kết, phối hợp với những nh&acirc;n tố kh&aacute;c để tạo n&ecirc;n sức mạnh lớn cho doanh nghiệp.</p>\n<p>Biết ch&iacute;nh m&igrave;nh, cải thiện ch&iacute;nh m&igrave;nh kh&ocirc;ng chỉ l&agrave; học hỏi cho bản th&acirc;n, nh&agrave; l&atilde;nh đạo cần nh&igrave;n v&agrave;o tổng thể của tổ chức. Tư c&aacute;ch l&agrave; người đứng đầu, bạn c&oacute; tr&aacute;ch nhiệm dẫn dắt những nh&oacute;m với c&aacute;c c&aacute; nh&acirc;n kh&aacute;c nhau, sở hữu những điểm mạnh c&oacute; thể bổ sung cho nhau. Nh&agrave; l&atilde;nh đạo khi đ&oacute; cần c&ocirc;ng bằng, thận trọng nhận thức được gi&aacute; trị m&agrave; mỗi người trong nh&oacute;m của bạn c&oacute; thể mang lại để đạt được mục ti&ecirc;u tối ưu nhất cho tổ chức. Ngo&agrave;i ra, yếu tố th&ocirc;ng tin lu&ocirc;n rất quan trọng nếu bạn muốn th&agrave;nh c&ocirc;ng. Biết địch, biết ta trăm trận trăm thắng l&agrave; một nhận định qu&aacute; quen thuộc về &yacute; thức n&agrave;y. Lu&ocirc;n cập nhật th&ocirc;ng tin những đối thủ cạnh tranh l&agrave; c&aacute;ch để bạn so s&aacute;nh, ho&agrave;n thiện tổ chức cũng như định lượng được cơ hội cạnh tranh, hoạch định chiến lược ch&iacute;nh x&aacute;c.</p>\n<p><strong>Ki&ecirc;n tr&igrave;</strong></p>\n<p>Nh&agrave; l&atilde;nh đạo phải ki&ecirc;n tr&igrave; trong mọi quyết định của m&igrave;nh, ki&ecirc;n tr&igrave; trong qu&aacute; tr&igrave;nh học hỏi của bản th&acirc;n. Điều đ&oacute; thể hiện qua ba điều, học hỏi từ kinh nghiệm của người kh&aacute;c, học hỏi từ trải nghiệm của bản th&acirc;n, v&agrave; cuối c&ugrave;ng l&agrave; kết hợp từ những quan s&aacute;t c&ugrave;ng kiến thức để đưa ra quyết định tối ưu. Ba điều đ&oacute; đ&ograve;i hỏi một đức t&iacute;nh m&agrave; nh&agrave; l&atilde;nh đạo n&agrave;o cũng cần sỡ hữu, họ nhất định phải thực sự ki&ecirc;n tr&igrave;, cầu tiến. Tinh thần học hỏi mọi l&uacute;c, mọi nơi sẽ ho&agrave;n thiện cho bạn từ những điều nhỏ nhất. Trong thực tế, lu&ocirc;n ph&aacute;t sinh rất nhiều những t&igrave;nh huống linh hoạt m&agrave; s&aacute;ch vở kh&ocirc;ng thể định hướng cho bạn, khi ấy bạn cần linh hoạt t&igrave;m kiếm giải ph&aacute;p từ trải nghiệm bản th&acirc;n, những người xung quanh để t&iacute;ch lũy những kiến thức qu&yacute; gi&aacute;. Đặc biệt, ở vị tr&iacute; người dẫn đầu, bạn l&agrave; người chịu tr&aacute;ch nhiệm cao nhất, ảnh hưởng c&agrave;ng cao, &aacute;p lực lại c&agrave;ng lớn. Nếu bạn kh&ocirc;ng thể ki&ecirc;n tr&igrave; theo đuổi những mục ti&ecirc;u, định hướng đ&atilde; vạch ra, bạn rất dễ mắc phải những sai lầm.</p>\n<p><img class=\"alignnone wp-image-32848 size-full\" src=\"https://hrinsider-v2.vietnamworks.com//wp-content/uploads/2022/05/shutterstock_1810504159-2.jpg\" sizes=\"(max-width: 1200px) 100vw, 1200px\" srcset=\"https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/05/shutterstock_1810504159-2.jpg 1200w, https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/05/shutterstock_1810504159-2-300x157.jpg 300w, https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/05/shutterstock_1810504159-2-1024x535.jpg 1024w, https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/05/shutterstock_1810504159-2-768x401.jpg 768w, https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/05/shutterstock_1810504159-2-1080x564.jpg 1080w\" alt=\"&quot;Trao quyền&quot; - tố chất v&agrave;ng nhưng kh&oacute; &aacute;p dụng\" width=\"1200\" height=\"627\" loading=\"lazy\"></p>\n<p><strong>Tự đ&aacute;nh gi&aacute;</strong></p>\n<p>Kh&aacute;c với nhận thức, việc tự đ&aacute;nh gi&aacute; l&agrave; việc bạn cần phải lặp lại thường xuy&ecirc;n, h&agrave;ng ng&agrave;y. Khi bạn duy tr&igrave; một th&oacute;i quen li&ecirc;n tục tự đ&aacute;nh gi&aacute; bản th&acirc;n như vậy bạn sẽ c&oacute; thể theo d&otilde;i được hiệu quả l&agrave;m việc của m&igrave;nh. Thứ hai, nh&agrave; l&atilde;nh đạo c&oacute; thể kiểm so&aacute;t được sự tự tin qu&aacute; đ&agrave; của bản th&acirc;n th&ocirc;ng qua những nh&igrave;n nhận thường xuy&ecirc;n, giữ cho m&igrave;nh c&aacute;i đầu lạnh v&agrave; đ&ocirc;i ch&acirc;n lu&ocirc;n ở tr&ecirc;n mặt đất. Khi c&oacute; bất kỳ sự trục trặc hoặc dấu hiệu sa s&uacute;t n&agrave;o xảy đến, bạn ho&agrave;n to&agrave;n c&oacute; thể nhận ra kịp thời v&agrave; c&oacute; những điều chỉnh ph&ugrave; hợp để giữ cho bản th&acirc;n c&acirc;n đối giữa c&ocirc;ng việc v&agrave; đời sống.</p>\n<p><strong>Thấu hiểu</strong></p>\n<p>Bất kỳ một nh&agrave; l&atilde;nh đạo n&agrave;o cũng cần phải biết c&aacute;ch thấu hiểu, đắc nh&acirc;n t&acirc;m. Bạn l&agrave; nh&agrave; l&atilde;nh đạo khi bạn dẫn dắt một tổ chức, nơi với những c&aacute; nh&acirc;n với những c&aacute; t&iacute;nh ri&ecirc;ng biệt. Bạn sẽ kh&ocirc;ng thể thấu hiểu họ ngay ng&agrave;y một ng&agrave;y hai, hay chỉ qua v&agrave;i ba c&acirc;u chuyện tr&ograve;. Tầm v&oacute;c của nh&agrave; l&atilde;nh đạo tỷ lệ thuận với khả năng thấu hiểu nh&acirc;n vi&ecirc;n của họ. Mức độ thấu hiểu n&agrave;y sẽ tăng dần qua thời gian theo những tương t&aacute;c, mở l&ograve;ng của bạn với nh&acirc;n vi&ecirc;n. Chỉ khi c&oacute; thể nắm bắt được t&acirc;m tư, kh&aacute;t khao của những c&aacute; nh&acirc;n trong tập thể, bạn mới c&oacute; thể đưa ra những nhiệm vụ chuẩn x&aacute;c, dẫn dắt tổ chức đến những th&agrave;nh tựu.</p>\n<p><strong>Hợp t&aacute;c</strong></p>\n<p>Tinh thần hợp t&aacute;c lu&ocirc;n l&agrave; điều m&agrave; mỗi nh&agrave; l&atilde;nh đạo cần phải khắc ghi nếu muốn ho&agrave;n thiện vai tr&ograve; của bản th&acirc;n. Hợp t&aacute;c kh&ocirc;ng chỉ l&agrave; với những đối t&aacute;c m&agrave; c&ograve;n l&agrave; cả trong tập thể, suy cho c&ugrave;ng những c&aacute; nh&acirc;n chỉ c&oacute; thể c&ugrave;ng hướng về mục ti&ecirc;u chung khi được đảm bảo về mặt lợi &iacute;ch c&aacute; nh&acirc;n. Nắm vững tinh thần, cũng như những nguy&ecirc;n tắc trong hợp t&aacute;c, bạn sẽ kh&ocirc;ng chỉ cải thiện khả năng l&agrave;m việc của bản th&acirc;n m&agrave; c&ograve;n cả về năng lực ngoại giao, giao tiếp. Từ những nguồn lực xung quanh, nếu bạn biết kết nối tốt, bạn sẽ kh&ocirc;ng ngừng ph&aacute;t triển v&agrave; tiến gần hơn đến những th&agrave;nh tựu vượt trội.</p>', 1, 0, '2022-06-15 09:38:55', '2022-06-15 09:38:55', '<p>Khi bạn th&agrave;nh ni&ecirc;n, ch&iacute;nh thức bước v&agrave;o thị trường lao động, đối diện với những thử th&aacute;ch tr&ecirc;n đường đời ắt hẳn kh&ocirc;ng &iacute;t lần ta tự hỏi liệu sứ mệnh của ta ở cuộc đời l&agrave; g&igrave;, niềm đam m&ecirc; lớn nhất của ta l&agrave; g&igrave;? C&oacute; v&ocirc; v&agrave;n những c&acirc;u hỏi, những ước mơ lớn lao, nhưng d&aacute;m chắc kh&aacute;t vọng trở n&ecirc;n th&agrave;nh c&ocirc;ng, trở th&agrave;nh một người l&atilde;nh đạo t&agrave;i giỏi lu&ocirc;n l&agrave; một phần trong ch&uacute;ng ta.Trở th&agrave;nh nh&agrave; l&atilde;nh đạo đ&atilde; kh&oacute;, nhưng việc bạn c&oacute; thể trở th&agrave;nh một nh&agrave; l&atilde;nh đạo to&agrave;n diện lại c&agrave;ng kh&oacute; khăn hơn rất nhiều lần. Nếu bạn kh&ocirc;ng l&agrave;m tốt trọng tr&aacute;ch n&agrave;y, to&agrave;n bộ quy tr&igrave;nh vận h&agrave;nh của tổ chức, qu&aacute; tr&igrave;nh đ&oacute;ng g&oacute;p của nh&acirc;n vi&ecirc;n sẽ trở n&ecirc;n độc quyền, t&acirc;m l&yacute; l&agrave;m việc của nh&acirc;n vi&ecirc;n cũng sẽ trở n&ecirc;n sao nh&atilde;ng, mất tập trung. T&aacute;c động của điều đ&oacute; kh&ocirc;ng chỉ dừng lại ở l&agrave;m giảm năng suất l&agrave;m việc, hiệu suất kinh doanh m&agrave; c&ograve;n tạo n&ecirc;n những tiền lệ về lối quản l&yacute; nh&acirc;n sự sai lầm. Vậy l&agrave;m thế n&agrave;o để trở th&agrave;nh một nh&agrave; l&atilde;nh đạo to&agrave;n diện? Sau đ&acirc;y ch&iacute;nh l&agrave; năm từ bạn c&oacute; thể khắc ghi, ứng dụng để tự ho&agrave;n thiện bản th&acirc;n mỗi ng&agrave;y.</p>'),
(5, '3 việc giúp bạn khám phá năng lực bản thân trong công việc', '3-viec-giup-ban-kham-pha-nang-luc-ban-than-trong-cong-viec', '1655354337.jpg', '<p>Sau đ&acirc;y l&agrave; 3 việc bạn cần l&agrave;m để c&oacute; thể kh&aacute;m ph&aacute; năng lực của bản th&acirc;n, bạn ho&agrave;n to&agrave;n c&oacute; thể &aacute;p dụng n&oacute; để gia tăng hiệu suất c&ocirc;ng việc của m&igrave;nh.</p>\n<p><strong>X&aacute;c định điều bạn th&iacute;ch ở c&ocirc;ng việc hiện tại</strong></p>\n<p>Đầu ti&ecirc;n, bạn h&atilde;y ngồi lại c&ugrave;ng hồ sơ của bản th&acirc;n, nh&igrave;n v&agrave;o đ&oacute; bạn dễ d&agrave;ng nhận thấy những c&ocirc;ng việc bạn từng đảm nhận, những kh&oacute;a học, kiến thức bạn từng học qua. Từ đ&oacute;, đối với từng c&ocirc;ng việc, từng vị tr&iacute; bạn h&atilde;y liệt k&ecirc; ra những vai tr&ograve; m&agrave; m&igrave;nh đ&atilde; thực hiện. Tiếp theo đ&oacute; tiếp tục khoanh tr&ograve;n những điểm m&agrave; bạn cảm thấy y&ecirc;u th&iacute;ch nhất ở mỗi vị tr&iacute;, đ&oacute; kh&ocirc;ng nhất thiết phải l&agrave; c&ocirc;ng việc m&agrave; c&oacute; thể từ những hoạt động ngoại kh&oacute;a, những cuộc thi. Trong c&aacute;c cuộc thi nh&oacute;m, ngoại kh&oacute;a bạn thường đảm nhận vai tr&ograve; g&igrave;, bạn đ&atilde; đ&oacute;ng g&oacute;p những g&igrave;, bạn c&oacute; thực sự h&agrave;i l&ograve;ng với ch&uacute;ng hay kh&ocirc;ng? Bạn h&atilde;y cẩn thận liệt k&ecirc; tất cả bằng nh&igrave;n nhận kh&aacute;ch quan nhất v&agrave; ghi ch&uacute;ng ra.</p>\n<p>Tất cả những hoạt động v&agrave; nhiệm vụ bạn th&iacute;ch đều đ&aacute;ng để c&acirc;n nhắc bởi ch&uacute;ng gắn với một trong những điểm mạnh nhất của bạn. Từ vị tr&iacute; nhỏ nhất cho đến những cấp độ lớn hơn đều c&oacute; &yacute; nghĩa, bởi khi bạn chọn bắt đầu v&agrave; đặt tr&aacute;ch nhiệm v&agrave;o c&ocirc;ng việc bạn sẽ nhận lại những kiến thức v&agrave; kỹ năng tương ứng. Bạn đừng vội bỏ qua những chuyện đơn giản, việc hướng dẫn một nh&acirc;n vi&ecirc;n mới c&oacute; li&ecirc;n quan đến năng lực l&atilde;nh đạo, truyền đạt kiến thức, hay việc tổ chức những buổi đi chơi, tiệc sinh nhật cũng c&oacute; thể cho thấy khả năng kết nối, tổ chức sự kiện của bạn. Hoặc cả c&aacute;ch bạn đưa ra &yacute; kiến, đối đ&aacute;p với cấp tr&ecirc;n trong c&ocirc;ng việc cũng sẽ l&agrave; những điểm đ&aacute;nh gi&aacute; phẩm chất l&atilde;nh đạo của bạn. D&agrave;nh thời gian để nghĩ về những kh&aacute;t khao, niềm đam m&ecirc; của bạn trong c&ocirc;ng việc l&agrave; bước đầu ti&ecirc;n cũng l&agrave; quan trọng nhất để x&aacute;c định lộ tr&igrave;nh kh&aacute;m ph&aacute; năng lực tiềm ẩn trong c&ocirc;ng việc của bạn.</p>\n<p><img class=\"alignnone wp-image-33236 size-full\" src=\"https://hrinsider-v2.vietnamworks.com//wp-content/uploads/2022/05/shutterstock_1463769134-2.jpg\" sizes=\"(max-width: 1200px) 100vw, 1200px\" srcset=\"https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/05/shutterstock_1463769134-2.jpg 1200w, https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/05/shutterstock_1463769134-2-300x157.jpg 300w, https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/05/shutterstock_1463769134-2-1024x535.jpg 1024w, https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/05/shutterstock_1463769134-2-768x401.jpg 768w, https://www.vietnamworks.com//hrinsider//wp-content/uploads/2022/05/shutterstock_1463769134-2-1080x564.jpg 1080w\" alt=\"\" width=\"1200\" height=\"627\" loading=\"lazy\"></p>\n<p><strong>X&aacute;c định quỹ thời gian của bản th&acirc;n</strong></p>\n<p>Tất cả những c&ocirc;ng việc, thời gian, giải tr&iacute;, hay học tập, bạn cần thống k&ecirc; một c&aacute;ch chi tiết nhất. Bạn thường d&agrave;nh nhiều thời gian cho việc g&igrave;, định hướng học thuật chuy&ecirc;n s&acirc;u hay l&agrave; ph&aacute;t triển những kỹ năng mềm, qua c&aacute;ch ph&acirc;n bổ thời gian bạn ho&agrave;n to&agrave;n c&oacute; thể t&igrave;m thấy c&acirc;u trả lời. Hơn nữa, qua c&aacute;ch x&aacute;c định n&agrave;y bạn c&oacute; thể x&aacute;c định được bản th&acirc;n đang ưu ti&ecirc;n cho việc g&igrave; hơn để đưa ra những điều chỉnh. Đ&ocirc;i l&uacute;c việc d&agrave;nh qu&aacute; nhiều thời gian cho giải tr&iacute;, hay l&agrave;m những c&ocirc;ng việc kh&ocirc;ng mang t&iacute;nh hiệu quả cho qu&aacute; tr&igrave;nh ph&aacute;t triển kiến thức sẽ l&agrave;m ảnh hưởng đến lộ tr&igrave;nh c&ocirc;ng việc của bạn.</p>\n<p>Tất nhi&ecirc;n khi thực hiện sắp xếp ph&acirc;n bổ thời gian bạn cần đảm bảo sự c&acirc;n bằng giữa c&ocirc;ng việc v&agrave; đời sống. Bạn c&oacute; thể ph&aacute;t triển to&agrave;n t&acirc;m cho c&ocirc;ng việc nhưng cũng kh&ocirc;ng thể v&igrave; thế m&agrave; bỏ qu&ecirc;n đi những yếu tố kh&aacute;c trong cuộc sống. Tr&ecirc;n h&agrave;nh tr&igrave;nh của bạn, kh&ocirc;ng chỉ bản th&acirc;n, bạn rất cần những yếu tố kh&aacute;c đồng h&agrave;nh nếu muốn đi đ&uacute;ng đường, điều h&ograve;a tốt những mối quan hệ x&atilde; hội, c&ocirc;ng việc, c&acirc;n bằng trong việc chăm s&oacute;c gia đ&igrave;nh sẽ tr&aacute;nh bạn ph&acirc;n t&acirc;m. Ngo&agrave;i ra, việc điều h&ograve;a tốt gi&uacute;p bạn nạp lại năng lượng sau khi l&agrave;m việc chăm chỉ, mệt mỏi, khi đủ sức khỏe bạn mới c&oacute; thể đạt được hiệu quả cao hơn trong c&ocirc;ng việc.</p>\n<p>Đối với những khoảng thời gian trống giữa c&ocirc;ng việc v&agrave; đời sống, bạn c&oacute; thể c&acirc;n nhắc học th&ecirc;m những kỹ năng kh&aacute;c, thể thao, &acirc;m nhạc hay nghệ thuật đều l&agrave; những điều tốt, vừa l&agrave;m phong ph&uacute; thế giới quan của bạn, vừa gi&uacute;p cuộc sống của bạn th&ecirc;m th&uacute; vị. B&ecirc;n cạnh đ&oacute;, những điều n&agrave;y sẽ gi&uacute;p bạn tăng th&ecirc;m t&iacute;nh kết nối x&atilde; hội, mở rộng những mối quan hệ kh&aacute;c hoặc đơn thuần l&agrave; giải tỏa những căng thẳng.</p>\n<p><strong>X&aacute;c định ưu nhược điểm của bản th&acirc;n</strong></p>\n<p>Cuối c&ugrave;ng ch&iacute;nh l&agrave; nghi&ecirc;m t&uacute;c đ&aacute;nh gi&aacute; bản th&acirc;n bạn, thay v&igrave; những điều người kh&aacute;c thường hay n&oacute;i hoặc bạn hay tự h&agrave;o, h&atilde;y nghĩ về những điều kh&aacute;c m&agrave; ng&agrave;y thường bạn kh&ocirc;ng nghĩ đến. Đ&oacute; c&oacute; thể l&agrave; c&aacute;ch bạn xử l&yacute; một t&igrave;nh huống phức tạp trong c&ocirc;ng việc, hay c&aacute;ch bạn giải quyết những tranh c&atilde;i trong c&ocirc;ng việc, đưa ra những luận điểm mang t&iacute;nh đột ph&aacute;. C&oacute; rất nhiều những chi tiết nhỏ trong qu&aacute; tr&igrave;nh l&agrave;m việc m&agrave; bạn c&oacute; thể c&acirc;n nhắc, đừng vội bỏ qua m&agrave; h&atilde;y ngẫm nghĩ s&acirc;u về ch&uacute;ng. Khi ấy, đặt giả sử quay lại trường hợp đ&oacute; bạn liệu c&oacute; c&aacute;ch xử l&yacute; kh&aacute;c hay kh&ocirc;ng, liệu rằng khi ấy c&oacute; thể đưa ra một quyết định kh&aacute;c đ&uacute;ng đắn hơn kh&ocirc;ng. Kh&ocirc;ng ngừng đặt c&aacute;c c&acirc;u hỏi sẽ l&agrave;m bộc lộ những điểm yếu c&ugrave;ng điểm mạnh của bạn. Những điểm yếu sẽ lu&ocirc;n bộc lộ những n&eacute;t tương đồng qua từng c&acirc;u chuyện, t&iacute;nh c&aacute;ch, c&aacute;ch xử l&yacute; hay phong c&aacute;ch l&agrave;m việc. Điểm mạnh cũng tương tự khi ch&uacute;ng được h&igrave;nh th&agrave;nh từ những xử l&yacute; đột ph&aacute; của bạn.</p>\n<p>Khi đ&atilde; x&aacute;c định r&otilde; điểm mạnh c&ugrave;ng điểm yếu, bạn sẽ biết cần phải sắp xếp thời gian như thế n&agrave;o để ph&aacute;t huy điểm mạnh cũng như khắc phục những khiếm khuyết. D&agrave;nh thời gian hợp l&yacute; cho từng bước như vậy sẽ đảm bảo bạn kh&ocirc;ng đi qu&aacute; vội v&agrave;ng hay đi nhầm đường, cẩn thận từng bước, bạn sẽ dần dần đạt được những th&agrave;nh tựu tương ứng, ng&agrave;y một ho&agrave;n thiện, ph&aacute;t triển hơn trong c&ocirc;ng việc y&ecirc;u th&iacute;ch của m&igrave;nh. Ba bước kể tr&ecirc;n tuy đơn giản nhưng y&ecirc;u cầu bạn cần phải c&oacute; sự ki&ecirc;n tr&igrave; c&ugrave;ng &yacute; ch&iacute; quyết t&acirc;m, kh&ocirc;ng từ bỏ con đường khai ph&aacute; năng lực bản th&acirc;n của m&igrave;nh.</p>', 1, 0, '2022-06-15 21:38:57', '2022-06-15 21:38:57', '<p>Đ&atilde; bao giờ bạn tự đặt c&acirc;u hỏi tại sao những người kh&aacute;c c&oacute; c&ugrave;ng xuất ph&aacute;t điểm, khởi đầu tương tự lại c&oacute; thể ph&aacute;t triển tốt hơn, đạt được những th&agrave;nh c&ocirc;ng lớn hơn bạn hay chưa? T&iacute;nh cạnh tranh cũng như &yacute; thức đ&aacute;nh gi&aacute;, so s&aacute;nh bản th&acirc;n lu&ocirc;n tồn tại ch&uacute;ng ta, đ&oacute; cũng l&agrave; một phần tạo n&ecirc;n động lực th&uacute;c đẩy ch&uacute;ng ta phấn đấu, ph&aacute;t triển. Tuy nhi&ecirc;n, phấn đấu th&ocirc;i th&igrave; kh&ocirc;ng bao giờ c&oacute; thể gi&uacute;p bạn đạt được th&agrave;nh tựu đột ph&aacute; trong c&ocirc;ng việc, bạn chỉ c&oacute; thể ho&agrave;n th&agrave;nh mọi c&ocirc;ng việc ở mức tr&ograve;n vai. Hầu hết những người th&agrave;nh c&ocirc;ng đều phải trải qua qu&aacute; tr&igrave;nh nỗ lực r&egrave;n luyện, họ d&agrave;nh nhiều thời gian cho việc nghi&ecirc;n cứu phương hướng ph&aacute;t triển bản th&acirc;n thay v&igrave; việc chỉ ch&uacute; t&acirc;m v&agrave;o l&agrave;m việc một c&aacute;ch chăm chỉ nhất.</p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female','Other') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` enum('Single','Married') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `image`, `mobile`, `date_of_birth`, `intro`, `gender`, `marital_status`, `city`, `province`, `country`, `address`, `created_at`, `updated_at`) VALUES
(1, 2, '1655115724.png', '', '2022-06-11', '', 'Female', 'Married', 'Ha Noi', '', 'Việt Nam', 'Ha Noi', '2022-06-10 20:47:29', '2022-06-13 03:22:04'),
(2, 3, NULL, '0978011679', '2022-06-04', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam molestias facilis ullam\n                        dolorum, reprehenderit dolorem accusantium sit quo\n                        dolore nostrum assumenda obcaecati animi commodi nobis labore exercitationem corporis esse\n                        eveniet optio laudantium molestiae maiores pariatur nisi cumque.\n                        Distinctio et, totam, dicta autem nostrum doloribus ipsam vel rerum, molestiae soluta\n                        laboriosam.', 'Other', 'Married', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'Ha Noi', '2022-06-19 09:06:26', '2022-06-21 03:31:02'),
(4, 7, NULL, '0978011679', NULL, 'gggg', NULL, NULL, 'Ha Noi', 'Hà Nội', 'Việt Nam', 'Ha Noi', '2022-06-20 20:06:12', '2022-06-20 20:06:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recruitments`
--

CREATE TABLE `recruitments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','Processing','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `processed_date` date DEFAULT NULL,
  `canceled_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `recruitments`
--

INSERT INTO `recruitments` (`id`, `user_id`, `firstname`, `lastname`, `mobile`, `email`, `intro`, `city`, `province`, `country`, `file`, `status`, `created_at`, `updated_at`, `processed_date`, `canceled_date`) VALUES
(1, 2, 'hoang', 'trang', '0366465928', 'user@gmail.com', 'Ha Noi, Ho Chi Minh', 'Ha Noi', 'ha noi', 'Việt Nam', '1652931150.docx', 'canceled', '2022-05-18 20:32:30', '2022-05-21 22:39:42', NULL, '2022-05-22'),
(2, 2, 'hoang', 'trang', '0366465928', 'user@gmail.com', 'Ha Noi, Ho Chi Minh', 'Ha Noi', 'ha noi', 'Việt Nam', '1652931912.docx', 'canceled', '2022-05-18 20:45:12', '2022-05-21 22:42:54', NULL, '2022-05-22'),
(3, 2, 'hoang', 'trang', '0366465928', 'user@gmail.com', 'Ha Noi, Ho Chi Minh', 'Ha Noi', 'ha noi', 'Việt Nam', '1652931916.docx', 'canceled', '2022-05-18 20:45:16', '2022-05-21 22:44:56', NULL, '2022-05-22'),
(4, 2, 'hoang', 'trang', '0366465928', 'user@gmail.com', 'Ha Noi, Ho Chi Minh', 'Ha Noi', 'ha noi', 'Việt Nam', '1652931921.docx', 'pending', '2022-05-18 20:45:21', '2022-05-18 20:45:21', NULL, NULL),
(5, 2, 'hoang', 'trang', '0366465928', 'user@gmail.com', 'Ha Noi, Ho Chi Minh', 'Ha Noi', 'ha noi', 'Việt Nam', '1652931932.docx', 'Processing', '2022-05-18 20:45:32', '2022-05-21 22:02:52', '2022-05-22', NULL),
(6, 1, 'ggg', 'hhh', '0366466928', 'admin@gmail.com', 'HCM', 'HCM', 'HCM', 'Việt Nam', 'BTVN Buổi 22.docx', 'canceled', '2022-05-21 07:00:21', '2022-05-21 22:01:47', '2022-05-22', '2022-05-22'),
(7, 1, 'gggg', 'họaoskh', '0366465938', 'admin@gmail.com', 'dshkzkhkklvasdsvbuHzSKVZJXUHIKjndansnbcvzhjkM<, ncvjdhksjaszmxmZM<mxnczjnmzxcmnvfgjwkjsdnnmcnxhsaskjnmcxnbcxcznxxm cnmz,', 'Ha Noi', 'HCM', 'Việt Nam', 'BTVN Buổi 19.docx', 'Processing', '2022-05-21 07:40:52', '2022-05-21 22:02:12', '2022-05-22', NULL),
(8, 2, 'Minh anh', 'Hoang', '0366465929', 'user@gmail.com', '- Bạn đam mê và tập luyện thể thao thường xuyên - Bạn là người năng động, yêu thích chia sẻ niềm đam mê thể thao cùng với khách hàng - Bạn mang đến những trải nghiệm tuyệt vời cho khách hàng, góp phần thúc đẩy Doanh số và Lợi nhuận của cửa hàng - Bạn có tinh thần đồng đội xuất sắc - Bạn sẵn sàng làm việc vào cuối tuần và nghỉ ngày khác thay thế (làm việc 5 ngày/tuần) - Khả năng đọc hiểu tài liệu tiếng Anh và trao đổi với người nước ngoài, sử dụng tiếng Anh là một lợi thế', 'Ha Noi', 'ha noi', 'Việt Nam', 'BTVN Buổi 24.docx', 'pending', '2022-05-23 01:27:03', '2022-05-23 01:27:03', NULL, NULL),
(9, 2, 'hoang', 'Hoang', '0366465928', 'user@gmail.com', '- Fresh graduate student or less than 1 year experience - University degree relates to logistics/ import-export field. - Having strong communication and negotiation skills (both in Vietnamese and English) - Good knowledge of Incoterm - MS Office skill (especially Excel), careful, attention to detail and accuracy.', 'Ha Noi', 'HCM', 'Việt Nam', '5課スクリプト①.pdf', 'pending', '2022-05-23 04:09:54', '2022-05-23 04:09:54', NULL, NULL),
(10, 2, 'Minh anh', 'trang', '0366465928', 'user@gmail.com', 'Có lẽ trên thế giới này hiếm có một dân tộc nào lại yêu quý lá Quốc Kỳ của dân tộc mình hơn người dân Việt Nam.', 'Ha Noi', 'ha noi', 'Việt Nam', '4課スクリプト①.pdf', 'Processing', '2022-05-23 04:21:43', '2022-05-25 20:25:55', '2022-05-26', NULL),
(11, 2, 'user', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'ham học học, nhiệt tình, năng động', 'Ha Noi', 'Hà Nội', 'Việt Nam', '5課スクリプト①.pdf', 'canceled', '2022-06-07 10:15:27', '2022-06-10 08:04:49', NULL, '2022-06-10'),
(12, 2, 'user', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'ham học học, nhiệt tình, năng động', 'Ha Noi', 'Hà Nội', 'Việt Nam', '5課スクリプト①.pdf', 'Processing', '2022-06-07 10:17:07', '2022-06-10 08:04:46', '2022-06-10', NULL),
(13, 3, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'hello', 'Ha Noi', 'Hà Nội', 'Việt Nam', '5課スクリプト①.pdf', 'pending', '2022-06-11 02:00:48', '2022-06-11 02:00:48', NULL, NULL),
(14, 3, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'hello', 'Ha Noi', 'Hà Nội', 'Việt Nam', '4課スクリプト①.pdf', 'pending', '2022-06-11 02:11:47', '2022-06-11 02:11:47', NULL, NULL),
(15, 3, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'hi123', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'BTVN Buổi 22 (1).docx', 'pending', '2022-06-11 02:13:13', '2022-06-11 02:13:13', NULL, NULL),
(16, 3, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'wow', 'Ha Noi', 'Hà Nội', 'Việt Nam', '5課スクリプト①.pdf', 'pending', '2022-06-11 02:16:01', '2022-06-11 02:16:01', NULL, NULL),
(17, 3, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'hello', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'tổng-hợp.pdf', 'pending', '2022-06-11 02:21:32', '2022-06-11 02:21:32', NULL, NULL),
(18, 3, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'hehe', 'Ha Noi', 'Hà Nội', 'Việt Nam', '4課スクリプト①.pdf', 'pending', '2022-06-11 02:23:27', '2022-06-11 02:23:27', NULL, NULL),
(19, 3, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'hello', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'Toán 5 - Kim Giang.pdf', 'pending', '2022-06-11 02:25:44', '2022-06-11 02:25:44', NULL, NULL),
(20, 3, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'hello', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'Toán 5 - Kim Giang.pdf', 'pending', '2022-06-11 02:26:28', '2022-06-11 02:26:28', NULL, NULL),
(21, 3, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'hello', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'Toán 7 - Tân Mai.pdf', 'pending', '2022-06-11 02:27:20', '2022-06-11 02:27:20', NULL, NULL),
(22, 3, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'hello', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'Toán 5 - Kim Giang.pdf', 'pending', '2022-06-11 02:28:42', '2022-06-11 02:28:42', NULL, NULL),
(23, 3, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'hello123', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'Toán 3,4 - Thái Hà.pdf', 'pending', '2022-06-11 02:33:50', '2022-06-11 02:33:50', NULL, NULL),
(24, 3, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'hello', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'Toán 7 - Tân Mai.pdf', 'pending', '2022-06-11 02:37:37', '2022-06-11 02:37:37', NULL, NULL),
(25, 3, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'hello', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'Toán 7 - Tân Mai.pdf', 'pending', '2022-06-11 02:44:18', '2022-06-11 02:44:18', NULL, NULL),
(26, 3, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'hello', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'Toán 7 - Tân Mai.pdf', 'pending', '2022-06-11 02:50:32', '2022-06-11 02:50:32', NULL, NULL),
(27, 2, 'user', 'trang', '0366465928', 'user@gmail.com', 'Ha Noi, Ho Chi Minh', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'セミナーのスケジュール - 出席.pdf', 'pending', '2022-06-13 00:47:02', '2022-06-13 00:47:02', NULL, NULL),
(28, 2, 'user', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'Ha Noi, Ho Chi Minh', 'Ha Noi', 'Hà Nội', 'Việt Nam', '5課スクリプト①.pdf', 'pending', '2022-06-13 00:56:44', '2022-06-13 00:56:44', NULL, NULL),
(29, 2, 'hoang', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'Ha Noi, Ho Chi Minh', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'Toán 3,4 - Thái Hà.pdf', 'pending', '2022-06-13 00:59:53', '2022-06-13 00:59:53', NULL, NULL),
(30, 2, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'Ha Noi, Ho Chi Minh', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'Toán 5 - Kim Giang.pdf', 'pending', '2022-06-13 01:10:28', '2022-06-13 01:10:28', NULL, NULL),
(31, 2, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'Ha Noi, Ho Chi Minh', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'Toán 5 - Kim Giang.pdf', 'pending', '2022-06-13 01:19:14', '2022-06-13 01:19:14', NULL, NULL),
(32, 2, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'Ha Noi, Ho Chi Minh', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'Toán 7 - Tân Mai.pdf', 'pending', '2022-06-13 01:26:12', '2022-06-13 01:26:12', NULL, NULL),
(33, 2, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'Ha Noi, Ho Chi Minh', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'Toán 3,4 - Thái Hà.pdf', 'pending', '2022-06-13 01:28:35', '2022-06-13 01:28:35', NULL, NULL),
(34, 2, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'Ha Noi, Ho Chi Minh', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'Toán 3,4 - Thái Hà.pdf', 'pending', '2022-06-13 01:29:37', '2022-06-13 01:29:37', NULL, NULL),
(35, 2, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'Ha Noi, Ho Chi Minh', 'Ha Noi', 'ha noi', 'Việt Nam', 'Toán 3,4 - Thái Hà.pdf', 'pending', '2022-06-13 01:34:32', '2022-06-13 01:34:32', NULL, NULL),
(36, 2, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'Ha Noi, Ho Chi Minh', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'Toán 3,4 - Thái Hà.pdf', 'pending', '2022-06-13 01:39:35', '2022-06-13 01:39:35', NULL, NULL),
(37, 2, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'Ha Noi, Ho Chi Minh', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'Toán 3,4 - Thái Hà.pdf', 'pending', '2022-06-13 01:40:55', '2022-06-13 01:40:55', NULL, NULL),
(38, 2, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'Ha Noi, Ho Chi Minh', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'Toán 5 - Kim Giang.pdf', 'Processing', '2022-06-13 01:41:45', '2022-06-20 02:42:42', '2022-06-20', NULL),
(39, 2, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'Ha Noi, Ho Chi Minh', 'Ha Noi', 'ha noi', 'Việt Nam', 'Toán 5 - Kim Giang.pdf', 'pending', '2022-06-13 01:48:58', '2022-06-13 01:48:58', NULL, NULL),
(40, 2, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'Ha Noi, Ho Chi Minh', 'Ha Noi', 'Hà Nội', 'Việt Nam', 'Toán 3,4 - Thái Hà.pdf', 'pending', '2022-06-13 01:49:37', '2022-06-13 01:49:37', NULL, NULL),
(41, 3, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'sss', 'Ha Noi', 'ssss', 'Việt Nam', '32-de-thi-hoc-ki-1-mon-toan-lop-5.pdf', 'pending', '2022-06-18 07:04:27', '2022-06-18 07:04:27', NULL, NULL),
(42, 3, 'Minh anh', 'Hoang', '0366465928', 'minhanhhoang812@gmail.com', 'sss', 'Ha Noi', 'Hà Nội', 'Việt Nam', '32-de-thi-hoc-ki-1-mon-toan-lop-5.pdf', 'pending', '2022-06-18 07:09:41', '2022-06-18 07:09:41', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recruitment_jobs`
--

CREATE TABLE `recruitment_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `recruitment_id` bigint(20) UNSIGNED NOT NULL,
  `salary` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rstatus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `recruitment_jobs`
--

INSERT INTO `recruitment_jobs` (`id`, `job_id`, `recruitment_id`, `salary`, `created_at`, `updated_at`, `rstatus`) VALUES
(7, 33, 15, '800.00', '2022-06-11 02:13:13', '2022-06-11 02:13:13', 0),
(8, 39, 15, '1000.00', '2022-06-11 02:13:13', '2022-06-11 02:13:13', 0),
(9, 32, 15, '1000.00', '2022-06-11 02:13:13', '2022-06-11 02:13:13', 0),
(10, 33, 16, '800.00', '2022-06-11 02:16:01', '2022-06-11 02:16:01', 0),
(11, 39, 16, '1000.00', '2022-06-11 02:16:01', '2022-06-11 02:16:01', 0),
(12, 32, 16, '1000.00', '2022-06-11 02:16:01', '2022-06-11 02:16:01', 0),
(13, 33, 17, '800.00', '2022-06-11 02:21:32', '2022-06-11 02:21:32', 0),
(14, 39, 17, '1000.00', '2022-06-11 02:21:32', '2022-06-11 02:21:32', 0),
(15, 32, 17, '1000.00', '2022-06-11 02:21:32', '2022-06-11 02:21:32', 0),
(16, 33, 18, '800.00', '2022-06-11 02:23:27', '2022-06-11 02:23:27', 0),
(17, 39, 18, '1000.00', '2022-06-11 02:23:27', '2022-06-11 02:23:27', 0),
(18, 32, 18, '1000.00', '2022-06-11 02:23:27', '2022-06-11 02:23:27', 0),
(19, 33, 19, '800.00', '2022-06-11 02:25:44', '2022-06-11 02:25:44', 0),
(20, 39, 19, '1000.00', '2022-06-11 02:25:44', '2022-06-11 02:25:44', 0),
(21, 32, 19, '1000.00', '2022-06-11 02:25:44', '2022-06-11 02:25:44', 0),
(22, 33, 20, '800.00', '2022-06-11 02:26:28', '2022-06-11 02:26:28', 0),
(23, 39, 20, '1000.00', '2022-06-11 02:26:28', '2022-06-11 02:26:28', 0),
(24, 32, 20, '1000.00', '2022-06-11 02:26:28', '2022-06-11 02:26:28', 0),
(25, 33, 21, '800.00', '2022-06-11 02:27:20', '2022-06-11 02:27:20', 0),
(26, 39, 21, '1000.00', '2022-06-11 02:27:20', '2022-06-11 02:27:20', 0),
(27, 32, 21, '1000.00', '2022-06-11 02:27:20', '2022-06-11 02:27:20', 0),
(28, 33, 22, '800.00', '2022-06-11 02:28:42', '2022-06-11 02:28:42', 0),
(29, 39, 22, '1000.00', '2022-06-11 02:28:42', '2022-06-11 02:28:42', 0),
(30, 32, 22, '1000.00', '2022-06-11 02:28:42', '2022-06-11 02:28:42', 0),
(31, 33, 23, '800.00', '2022-06-11 02:33:50', '2022-06-11 02:33:50', 0),
(32, 39, 23, '1000.00', '2022-06-11 02:33:50', '2022-06-11 02:33:50', 0),
(33, 32, 23, '1000.00', '2022-06-11 02:33:50', '2022-06-11 02:33:50', 0),
(34, 33, 24, '800.00', '2022-06-11 02:37:37', '2022-06-11 02:37:37', 0),
(35, 39, 24, '1000.00', '2022-06-11 02:37:37', '2022-06-11 02:37:37', 0),
(36, 32, 24, '1000.00', '2022-06-11 02:37:37', '2022-06-11 02:37:37', 0),
(37, 33, 25, '800.00', '2022-06-11 02:44:18', '2022-06-11 02:44:18', 0),
(38, 39, 25, '1000.00', '2022-06-11 02:44:18', '2022-06-11 02:44:18', 0),
(39, 32, 25, '1000.00', '2022-06-11 02:44:18', '2022-06-11 02:44:18', 0),
(40, 33, 26, '800.00', '2022-06-11 02:50:32', '2022-06-11 02:50:32', 0),
(41, 39, 26, '1000.00', '2022-06-11 02:50:32', '2022-06-11 02:50:32', 0),
(42, 32, 26, '1000.00', '2022-06-11 02:50:32', '2022-06-11 02:50:32', 0),
(43, 32, 27, '1000.00', '2022-06-13 00:47:02', '2022-06-13 00:47:02', 0),
(44, 34, 27, '950.00', '2022-06-13 00:47:02', '2022-06-13 00:47:02', 0),
(45, 32, 40, '1000.00', '2022-06-13 01:49:37', '2022-06-13 01:49:37', 0),
(46, 34, 40, '950.00', '2022-06-13 01:49:37', '2022-06-13 01:49:37', 0),
(47, 36, 42, '700.00', '2022-06-18 07:09:41', '2022-06-18 07:09:41', 0),
(48, 32, 42, '1000.00', '2022-06-18 07:09:41', '2022-06-18 07:09:41', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `references`
--

CREATE TABLE `references` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `references`
--

INSERT INTO `references` (`id`, `user_id`, `name`, `position`, `company`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 3, 'Hoang Trang', 'Truong Phong', 'Benh vien bach mai', 'trang@gmail.com', '097819672', '2022-06-20 01:00:13', '2022-06-20 01:00:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `recruitment_job_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `comment`, `recruitment_job_id`, `created_at`, `updated_at`) VALUES
(4, 4, 'goodjob', NULL, '2022-05-23 04:07:14', '2022-05-23 04:07:14'),
(5, 4, 'amazing', NULL, '2022-05-23 04:10:55', '2022-05-23 04:10:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7yjNFQ8tSbrl8n2Me98gRTndxXOLtZDW0h3V0R3P', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiakFRUUVzNUR5U3lsZDIxZHhVZmZucDkxSWRmMHNRZ2p2d3hSeXZ6aSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkV2EyUTJFQmpINzZzLzExMXRkYUsvT2J3eW5wek02V2UueS8xVVRLZXAxSWJ2blptN2dUSi4iO3M6ODoibGFuZ3VhZ2UiO3M6MjoidmkiO3M6NDoiY2FydCI7YToyOntzOjg6ImJvb2ttYXJrIjtPOjI5OiJJbGx1bWluYXRlXFN1cHBvcnRcQ29sbGVjdGlvbiI6Mjp7czo4OiIAKgBpdGVtcyI7YTowOnt9czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO31zOjg6Indpc2hsaXN0IjtPOjI5OiJJbGx1bWluYXRlXFN1cHBvcnRcQ29sbGVjdGlvbiI6Mjp7czo4OiIAKgBpdGVtcyI7YTowOnt9czoyODoiACoAZXNjYXBlV2hlbkNhc3RpbmdUb1N0cmluZyI7YjowO319fQ==', 1655814190);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinterest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `phone2`, `address`, `map`, `twitter`, `facebook`, `pinterest`, `instagram`, `created_at`, `updated_at`) VALUES
(1, 'hello@gmail.com', '0123456891', '02345679', 'Ha Noi', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.640819290252!2d105.84094731440703!3d21.007030293896815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac76ccab6dd7%3A0x55e92a5b07a97d03!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBCw6FjaCBraG9hIEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1653384457092!5m2!1svi!2s', '#', 'https://www.facebook.com/', '#', '#', '2022-05-24 02:08:03', '2022-06-10 19:08:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shoppingcart`
--

INSERT INTO `shoppingcart` (`identifier`, `instance`, `content`, `created_at`, `updated_at`) VALUES
('2', 'bookmark', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-06-13 00:41:44', NULL),
('2', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:2:{s:32:\"c1db1025126b9d1b9a0ca862b0a51f07\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"c1db1025126b9d1b9a0ca862b0a51f07\";s:2:\"id\";i:33;s:3:\"qty\";i:1;s:4:\"name\";s:30:\"Nurse - Điều Dưỡng Viên\";s:5:\"price\";d:800;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:14:\"App\\Models\\Job\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}s:32:\"1d3bf986c109d443f161bb3962491282\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"1d3bf986c109d443f161bb3962491282\";s:2:\"id\";i:34;s:3:\"qty\";i:1;s:4:\"name\";s:63:\"Nhân Viên Hỗ Trợ Nghiên Cứu (Study Coordinator – SC)\";s:5:\"price\";d:950;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:14:\"App\\Models\\Job\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-06-13 00:41:44', NULL),
('admin@gmail.com', 'bookmark', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-06-21 04:48:04', NULL),
('admin@gmail.com', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-06-21 04:48:04', NULL),
('minh@gmail.com', 'bookmark', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-06-21 01:49:43', NULL),
('minh@gmail.com', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-06-21 01:49:43', NULL),
('minhanhhoang812@gmail.com', 'bookmark', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"e983534e9a49dd8b65a80ad8b3c452fc\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"e983534e9a49dd8b65a80ad8b3c452fc\";s:2:\"id\";i:36;s:3:\"qty\";i:1;s:4:\"name\";s:27:\"Kỹ Thuật Viên Gây Mê\";s:5:\"price\";d:700;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:14:\"App\\Models\\Job\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-06-18 07:24:56', NULL),
('minhanhhoang812@gmail.com', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"1d05d1221ec305a061c2fde8297ad8c2\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"1d05d1221ec305a061c2fde8297ad8c2\";s:2:\"id\";i:32;s:3:\"qty\";i:1;s:4:\"name\";s:52:\"Kỹ Thuật Viên/ Nhân Viên Phụ Mổ (Nursing)\";s:5:\"price\";d:1000;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:14:\"App\\Models\\Job\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-06-18 07:24:51', NULL),
('user@gmail.com', 'bookmark', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:1:{s:32:\"c1db1025126b9d1b9a0ca862b0a51f07\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":9:{s:5:\"rowId\";s:32:\"c1db1025126b9d1b9a0ca862b0a51f07\";s:2:\"id\";i:33;s:3:\"qty\";i:1;s:4:\"name\";s:30:\"Nurse - Điều Dưỡng Viên\";s:5:\"price\";d:800;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";s:14:\"App\\Models\\Job\";s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:21;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0isSaved\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-06-13 04:38:16', NULL),
('user@gmail.com', 'wishlist', 'O:29:\"Illuminate\\Support\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-06-13 04:38:16', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `skill_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proficiency` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `skills`
--

INSERT INTO `skills` (`id`, `user_id`, `skill_name`, `proficiency`, `created_at`, `updated_at`) VALUES
(2, 3, 'English', '3', '2022-06-19 03:04:40', '2022-06-19 03:07:44'),
(3, 3, 'English', '1', '2022-06-19 03:56:10', '2022-06-19 03:56:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `slug`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Thành Phố Hà Nội', 'thanh-pho-ha-noi', 17, '2022-05-25 20:20:23', '2022-06-13 09:42:05'),
(2, 'Thủ Đô Hà Nội', 'thu-do-ha-noi', 17, '2022-05-25 20:20:34', '2022-06-13 09:42:25'),
(3, 'Quận 1', 'quan-1', 18, '2022-05-25 20:21:00', '2022-06-04 08:23:09'),
(5, 'Thành Phố Thủ Đức', 'thanh-pho-thu-duc', 18, '2022-06-04 08:21:34', '2022-06-04 08:21:34'),
(6, 'Quận 3', 'quan-3', 18, '2022-06-04 08:22:41', '2022-06-04 08:22:41'),
(7, 'Quận 4', 'quan-4', 18, '2022-06-04 08:22:52', '2022-06-04 08:22:52'),
(8, 'Quận 5', 'quan-5', 18, '2022-06-04 08:23:00', '2022-06-04 08:23:00'),
(9, 'Quận 6', 'quan-6', 18, '2022-06-04 08:23:23', '2022-06-04 08:23:23'),
(10, 'Quận Bình Tân', 'quan-binh-tan', 18, '2022-06-04 08:23:34', '2022-06-04 08:23:34'),
(11, 'Quận Bình Thạnh', 'quan-binh-thanh', 18, '2022-06-04 08:23:45', '2022-06-04 08:23:45'),
(12, 'Quận Gò Vấp', 'quan-go-vap', 18, '2022-06-04 08:23:58', '2022-06-04 08:23:58'),
(13, 'Quận Phú Nhuận', 'quan-phu-nhuan', 18, '2022-06-04 08:24:14', '2022-06-04 08:24:14'),
(14, 'Quận Nhà Bè', 'quan-nha-be', 18, '2022-06-04 08:24:23', '2022-06-04 08:24:23'),
(15, 'Quận Hà Đông', 'quan-ha-dong', 17, '2022-06-04 08:24:52', '2022-06-04 08:24:52'),
(16, 'Quận Thanh Xuân', 'quan-thanh-xuan', 17, '2022-06-04 08:26:01', '2022-06-04 08:26:01'),
(18, 'Quận Hoàng Mai', 'quan-hoang-mai', 17, '2022-06-04 08:26:51', '2022-06-04 08:26:51'),
(19, 'Quận Hai Bà Trưng', 'quan-hai-ba-trung', 17, '2022-06-04 08:27:01', '2022-06-04 08:27:01'),
(20, 'Quận Đống Đa', 'quan-dong-da', 17, '2022-06-04 08:27:17', '2022-06-04 08:27:17'),
(21, 'Quận Hoàn Kiếm', 'quan-hoan-kiem', 17, '2022-06-04 08:27:26', '2022-06-04 08:27:26'),
(22, 'Quận Tây Hồ', 'quan-tay-ho', 17, '2022-06-04 08:27:40', '2022-06-04 08:27:40'),
(23, 'Quận Long Biên', 'quan-long-bien', 17, '2022-06-04 08:42:35', '2022-06-04 08:42:35'),
(24, 'Quận Long Biên', 'quan-long-bien', 17, '2022-06-10 07:59:01', '2022-06-10 07:59:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$Wa2Q2EBjH76s/111tdaK/ObwynpzM6We.y/1UTKep1IbvnZm7gTJ.', NULL, NULL, NULL, NULL, NULL, '2022-03-03 07:45:47', '2022-03-03 07:45:47', 1),
(2, 'user', 'user@gmail.com', NULL, '$2y$10$7eFLGh7rPyNfMsM1RjsXJ.q33B1QazlvYpEb1e64cGDhqVrglnhoe', NULL, NULL, NULL, NULL, NULL, '2022-05-18 09:24:28', '2022-05-23 08:34:06', 2),
(3, 'Minh Anh Hoang', 'minhanhhoang812@gmail.com', NULL, '$2y$10$UD.7zLUe1yePAkRMRyPBMen1940aXvnXoi1zE7a.IvLnuUImXIGJ2', NULL, NULL, NULL, NULL, NULL, '2022-05-25 20:23:51', '2022-05-25 20:23:51', 2),
(4, 'user2', 'user2@gmail.com', NULL, '$2y$10$OFNkIvjxTHvH7fRq2A.L0u.LQomlZKbcQgsaIb6L5fEweq4DXgH2a', NULL, NULL, NULL, NULL, NULL, '2022-06-13 05:06:38', '2022-06-13 05:06:38', 2),
(5, 'trang hoang', 'employer@gmail.com', NULL, '$2y$10$RmPZLxMckHI/lwkVW6LvJu/SCaQ9Us7xMdwACisQXu/ZC/x79D85S', NULL, NULL, NULL, NULL, NULL, '2022-06-16 01:20:01', '2022-06-16 01:20:01', 2),
(6, 'trang hoang', 'tranghoang@gmail.com', NULL, '$2y$10$9OVB3FOOE.pkkJjRrCvkD.xKqXbQj80AXo6Xa6rCwaUgOzrZHK2yW', NULL, NULL, NULL, NULL, NULL, '2022-06-16 02:00:41', '2022-06-16 02:00:41', 2),
(7, 'minh', 'minh@gmail.com', NULL, '$2y$10$wNuKNUONCxX1PPa6P2rpUO6wHA2OgvzpKNEPCszb6eug4/2khs6Pm', NULL, NULL, NULL, NULL, NULL, '2022-06-16 02:01:40', '2022-06-20 20:12:31', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `work_histories`
--

CREATE TABLE `work_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_month` date DEFAULT NULL,
  `to_month` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `work_histories`
--

INSERT INTO `work_histories` (`id`, `user_id`, `position`, `company`, `from_month`, `to_month`, `description`, `created_at`, `updated_at`) VALUES
(9, 2, 'abc', 'abc', '2022-06-01', '2022-06-25', 'aaa', '2022-06-18 02:05:34', '2022-06-18 02:05:34'),
(10, 3, 'Điều dưỡng', 'abc', '2022-06-02', '2022-06-30', '1111', '2022-06-18 02:10:21', '2022-06-19 01:06:29'),
(11, 3, 'Điều dưỡng', 'Bệnh viện Thanh Nhàn', '2022-06-01', '2022-06-23', 'làm điều dưỡng tại bệnh viện Thanh Nhàn', '2022-06-18 09:03:52', '2022-06-18 09:03:52'),
(12, 3, 'Điều dưỡng', 'Bệnh viên hoa lư', '2022-06-23', '2022-06-25', 'làm bác sĩ tại bệnh viện hoa lư', '2022-06-18 23:57:16', '2022-06-18 23:57:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `work_preferences`
--

CREATE TABLE `work_preferences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `expected_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expected_salary` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `work_preferences`
--

INSERT INTO `work_preferences` (`id`, `user_id`, `category_id`, `expected_location`, `expected_salary`, `created_at`, `updated_at`) VALUES
(4, 3, NULL, 'Vĩnh_Phúc', '1000.00', '2022-06-19 07:55:33', '2022-06-19 07:55:33'),
(5, 3, NULL, 'Bắc_Giang', '1000.00', '2022-06-19 07:56:53', '2022-06-19 07:56:53');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certifications_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `education_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `home_categories`
--
ALTER TABLE `home_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jobs_slug_unique` (`slug`),
  ADD KEY `jobs_category_id_foreign` (`category_id`),
  ADD KEY `jobs_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `jobs_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `languages_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `recruitments`
--
ALTER TABLE `recruitments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recruitments_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `recruitment_jobs`
--
ALTER TABLE `recruitment_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recruitment_jobs_job_id_foreign` (`job_id`),
  ADD KEY `recruitment_jobs_recruitment_id_foreign` (`recruitment_id`);

--
-- Chỉ mục cho bảng `references`
--
ALTER TABLE `references`
  ADD PRIMARY KEY (`id`),
  ADD KEY `references_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_recruitment_job_id_foreign` (`recruitment_job_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Chỉ mục cho bảng `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skills_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `work_histories`
--
ALTER TABLE `work_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_histories_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `work_preferences`
--
ALTER TABLE `work_preferences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_preferences_user_id_foreign` (`user_id`),
  ADD KEY `work_preferences_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `home_categories`
--
ALTER TABLE `home_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `recruitments`
--
ALTER TABLE `recruitments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `recruitment_jobs`
--
ALTER TABLE `recruitment_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `references`
--
ALTER TABLE `references`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `work_histories`
--
ALTER TABLE `work_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `work_preferences`
--
ALTER TABLE `work_preferences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `certifications`
--
ALTER TABLE `certifications`
  ADD CONSTRAINT `certifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `recruitments`
--
ALTER TABLE `recruitments`
  ADD CONSTRAINT `recruitments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `recruitment_jobs`
--
ALTER TABLE `recruitment_jobs`
  ADD CONSTRAINT `recruitment_jobs_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `recruitment_jobs_recruitment_id_foreign` FOREIGN KEY (`recruitment_id`) REFERENCES `recruitments` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `references`
--
ALTER TABLE `references`
  ADD CONSTRAINT `references_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_recruitment_job_id_foreign` FOREIGN KEY (`recruitment_job_id`) REFERENCES `recruitment_jobs` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `work_histories`
--
ALTER TABLE `work_histories`
  ADD CONSTRAINT `work_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `work_preferences`
--
ALTER TABLE `work_preferences`
  ADD CONSTRAINT `work_preferences_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `work_preferences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
