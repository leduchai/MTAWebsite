-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 25, 2018 lúc 05:17 PM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mta`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `title`, `seo_title`, `parent_id`) VALUES
(1, 'Tin Tức', NULL, 0),
(6, 'Tin đào tạo', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet`
--

CREATE TABLE `chitiet` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `index` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `page_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `title`, `url`, `index`, `parent_id`, `category_id`, `post_id`, `page_id`, `created_at`, `updated_at`) VALUES
(3, 'Trang chủ', '/', 1, 0, NULL, NULL, NULL, NULL, NULL),
(4, 'Giới thiệu', '#', 2, 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_04_17_073432_create_post_table', 1),
(2, '2018_04_17_073445_create_category_table', 1),
(3, '2018_04_17_073544_create_page_table', 1),
(4, '2018_04_17_073552_create_menu_table', 1),
(5, '2018_04_17_075251_create_chitiet_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page`
--

CREATE TABLE `page` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `view` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `index` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `page`
--

INSERT INTO `page` (`id`, `title`, `content`, `seo_title`, `seo_content`, `images`, `parent_id`, `view`, `index`, `created_at`, `updated_at`) VALUES
(1, 'Đào tạo', NULL, 'Đào tạo', NULL, 'image-5ad70b7c7713a.jpg', 0, 'client.page.template1', 0, '2018-04-18 02:10:22', '2018-04-18 02:27:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `seo_content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slogan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer` text COLLATE utf8_unicode_ci,
  `map` text COLLATE utf8_unicode_ci,
  `text_gt` text COLLATE utf8_unicode_ci,
  `link_youtube` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `setting`
--

INSERT INTO `setting` (`id`, `description`, `slogan`, `phone`, `email`, `address`, `facebook`, `skype`, `footer`, `map`, `text_gt`, `link_youtube`) VALUES
(1, 'a', 'Phòng khám đa khoa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<p><span style=\"font-family: arial,helvetica,sans-serif;\">Được x&acirc;y dựng theo m&ocirc; h&igrave;nh Bệnh viện &ndash; Kh&aacute;ch sạn cao cấp đầu ti&ecirc;n ở Hải Ph&ograve;ng v&agrave; khu vực v&ugrave;ng duy&ecirc;n hải Bắc bộ, quy m&ocirc; 500 giường bệnh nội tr&uacute; v&agrave; hệ thống kh&aacute;m chữa bệnh ngoại tr&uacute; đồng bộ với đầy đủ c&aacute;c chuy&ecirc;n khoa, hệ thống trang thiết bị tối t&acirc;n, tiện nghi sang trọng v&agrave; chất lượng phục vụ ho&agrave;n hảo&nbsp;</span><br /> <br /> <span style=\"font-family: arial,helvetica,sans-serif;\">Bệnh viện l&agrave; nơi tập trung nguồn nh&acirc;n lực chất lượng cao với đội ngũ b&aacute;c sỹ, kỹ thuật vi&ecirc;n, điều dư&otilde;ng vi&ecirc;n được đ&agrave;o tạo b&agrave;i bản trong v&agrave; ngo&agrave;i nước; l&agrave; nơi thực nghiệm v&agrave; chuyển giao kỹ thuật ng&agrave;nh y hiện đại của c&aacute;c gi&aacute;o sư, tiến sỹ nhiều kinh nghiệm của c&aacute;c bệnh viện tuyến Trung ương như BV Bạch Mai, Việt Đức, BV phụ sản TW, BV tim mạch</span></p>\r\n<p><span style=\"font-family: arial,helvetica,sans-serif;\">C&aacute;c dịch vụ m&agrave; c&ocirc;ng ty với website cung cấp cho bạn</span></p>\r\n<p>- C&aacute;c b&agrave;i viết về c&aacute;c loại bệnh&nbsp;</p>', 'https://www.youtube.com/embed/wgI3q4qcQ24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slugs`
--

CREATE TABLE `slugs` (
  `entity_id` int(11) NOT NULL,
  `entity_type` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slugs`
--

INSERT INTO `slugs` (`entity_id`, `entity_type`, `slug`) VALUES
(1, 300, 'dao-tao.html'),
(6, 500, '/chuyen-muc/tin-dao-tao.html'),
(1, 500, '/chuyen-muc/tin-tuc.html');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `images`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vũ Đồng', 'manager@gmail.com', 900, 'uploads/5ad9a91946d89.png', '$2y$10$WcgZFR8uG0.XUfIceEzJBeKoMi.I//aSfR3mzkLjb66Cn6l7WyKba', 'xY6dbSJn4IoyCyBhL2JuN15IRoRUki5nRjYWqdzPtYFoKqB2yqKcCAQ9HI7Y', NULL, '2018-04-20 01:47:21'),
(2, 'Đồng', 'vdong75@yahoo.com', 100, NULL, '$2y$10$RFSiRTNDvGnrT05iDfcU0uYf4sYIc7X679bLGLUd7omHXUqIjayTG', 'll5rEldqi1iJHoxWlifqdcBfxnl2dhXpE8j9Lsnu1DLBNyYk92NY14yxVTH4', '2017-11-05 20:05:26', '2017-11-05 20:05:26'),
(3, 'Huy', 'vdong71@yahoo.com', 500, NULL, '$2y$10$PibeLaKmiz8CTYVo5HQW.uKjD3x4qhYktwoF9xFBIEZC1FHKj1jZW', '4AipYoZuBiRVVrFhLjJzHr3q3YYKBHIYDdovExQXcaRw4xdxk2KdTURNkUMG', '2017-11-05 20:35:20', '2017-11-05 20:35:20'),
(4, 'Đồng', 'vdongxx@gmail.com', 100, NULL, '$2y$10$z22y2I2tqp81pi.iSlUlwuABCE2ng.39snz.ZjuePU/rxCDXvUnrm', NULL, '2018-03-10 02:52:49', '2018-03-10 02:52:49'),
(6, 'vu dong', 'vdongxxxx@gmail.com', 100, NULL, '$2y$10$/mDkkAcBTj3d.HQF8toaFO0gPWeQYYnVs9veUaNkyfLaeVCs6Cfti', NULL, '2018-03-10 02:54:11', '2018-03-10 02:54:11'),
(8, 'vu dong', 'aaaaaaaaaaaaa@gmail.com', 100, NULL, '$2y$10$xpa8vhiN34lB6J5m6WnCYuppeJEEUZbHvmx0mUqUQZPfnzk7xAmOe', NULL, '2018-03-10 02:55:36', '2018-03-10 02:55:36'),
(10, 'Đồng', 'aaaaaaa@gmail.com', 100, NULL, '$2y$10$WSnM0Zwq8myeMSHy4apdleR56vzoNZG.hwlMv/X/mmbHPQRlJ0vmy', NULL, '2018-03-10 02:56:44', '2018-03-10 02:56:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_role`
--

INSERT INTO `user_role` (`id`, `role`, `created_at`, `updated_at`) VALUES
(900, 'Administrator', NULL, NULL),
(100, 'Subcriber', NULL, NULL),
(500, 'Contributor', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chitiet`
--
ALTER TABLE `chitiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitiet_category_id_foreign` (`category_id`),
  ADD KEY `chitiet_post_id_foreign` (`post_id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `page_id` (`page_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `chitiet`
--
ALTER TABLE `chitiet`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `page`
--
ALTER TABLE `page`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiet`
--
ALTER TABLE `chitiet`
  ADD CONSTRAINT `chitiet_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitiet_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_ibfk_3` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
