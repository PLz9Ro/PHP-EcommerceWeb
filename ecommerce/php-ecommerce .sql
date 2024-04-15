-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 14, 2024 lúc 05:33 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php-ecommerce`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 : Active | 0 : block',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keys` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `name`, `slug`, `status`, `meta_title`, `meta_description`, `meta_keys`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Nike', 'Nike', 1, 'Nike', 'Nike', 'Nike', 1, '2024-03-20 23:54:59', '2024-03-20 23:54:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 : Active | 0 : block',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keys` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `status`, `meta_title`, `meta_description`, `meta_keys`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Sport', 'Sport', 1, 'Sport', 'Sport', 'Sport', 1, '2024-03-20 23:48:41', '2024-03-20 23:48:41'),
(3, 'Nike', 'Nike', 1, 'Nike', 'Nike', 'Nike', 2, '2024-04-14 03:37:55', '2024-04-14 03:37:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 : Active | 0 : block',
  `code` varchar(255) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id`, `name`, `status`, `code`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Black', 1, '#000000', 1, '2024-03-20 23:54:20', '2024-03-20 23:54:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_12_064805_add_categoryid_to_subcategory_table', 2),
(6, '2024_03_20_083109_create_categories_table', 2),
(7, '2024_03_20_083502_create_brands_table', 3),
(8, '2024_03_20_083730_create_colors_table', 3),
(9, '2024_03_20_083835_create_sizes_table', 3),
(10, '2024_03_20_084549_rename_categories_table_to_category', 3),
(11, '2024_03_20_092858_rename_sizes_table_to_size', 4),
(12, '2024_03_20_092921_rename_brands_table_to_brand', 4),
(13, '2024_03_20_092924_rename_colors_table_to_color', 4),
(14, '2024_03_20_093322_rename_sizes_table_to_size', 5),
(15, '2024_03_20_093327_rename_brands_table_to_brand', 5),
(16, '2024_03_20_105003_create_subcategory_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1: Active | 0: Blocked',
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  `old_price` float(10,2) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `shippingreturns` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `title`, `slug`, `sku`, `status`, `category_id`, `sub_category_id`, `brand_id`, `price`, `old_price`, `short_description`, `description`, `shippingreturns`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Nike Pada Dunk', NULL, '22', 1, 3, 3, 1, 2000000.00, 2200000.00, 'Nike Pada Dunk', 'Nike Pada Dunk', 'asdasd', 2, '2024-03-20 23:58:19', '2024-04-14 03:39:18'),
(2, 'adidas', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2024-04-12 22:58:23', '2024-04-12 22:58:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productcolor`
--

CREATE TABLE `productcolor` (
  `id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `productcolor`
--

INSERT INTO `productcolor` (`id`, `color_id`, `product_id`, `updated_at`, `created_at`) VALUES
(3, 1, 1, '2024-04-14 10:39:18', '2024-04-14 10:39:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productsize`
--

CREATE TABLE `productsize` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quatity` int(11) NOT NULL,
  `price` float NOT NULL,
  `product_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_extension` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`id`, `image_name`, `product_id`, `image_extension`, `created_at`, `updated_at`) VALUES
(2, '1bxgfkjxqhkfpdi7kwnjw.jpg', 1, 'jpg', '2024-03-21 00:06:37', '2024-03-21 07:06:37'),
(3, '1tveof3ijet5jgbqo7otx.jpg', 1, 'jpg', '2024-03-21 00:06:37', '2024-03-21 07:06:37'),
(4, '1ebxxopdy1xs4bjaczira.jpg', 1, 'jpg', '2024-03-21 00:06:37', '2024-03-21 07:06:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 : active | 0 : block',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `name`, `slug`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '36', '36', 1, 1, '2024-03-20 23:55:13', '2024-03-20 23:55:13'),
(2, '37', '37', 1, 1, '2024-03-20 23:55:24', '2024-03-20 23:55:24'),
(3, '39', '39', 1, 1, '2024-03-20 23:55:31', '2024-03-20 23:55:42'),
(4, '40', '40', 1, 1, '2024-03-20 23:55:51', '2024-03-20 23:55:51'),
(5, '41', '41', 1, 1, '2024-03-20 23:55:59', '2024-03-20 23:55:59'),
(6, '42', '42', 1, 1, '2024-03-20 23:56:06', '2024-03-20 23:56:06'),
(7, '43', '43', 1, 1, '2024-03-20 23:56:13', '2024-03-20 23:56:13'),
(8, '44', '44', 1, 1, '2024-03-20 23:56:24', '2024-03-20 23:56:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subcategory`
--

CREATE TABLE `subcategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1: Active | 0: Inactive',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keys` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subcategory`
--

INSERT INTO `subcategory` (`id`, `category_id`, `name`, `slug`, `status`, `meta_title`, `meta_description`, `meta_keys`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Run', 'Run', 1, 'Run', 'Run', 'Run', 1, '2024-03-20 23:50:46', '2024-03-20 23:50:46'),
(3, 3, 'Jordan', 'Jordan', 1, 'Jordan', 'Jordan', 'Jordan', 2, '2024-04-14 03:38:21', '2024-04-14 03:38:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL COMMENT '1 : admin ; 0 : customer\r\n',
  `status` int(11) NOT NULL COMMENT '1 : active : 0 block',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2024-03-21 06:34:09', '$2y$12$TCMcT8pSYDFSY2q.Oy4VwO4GcIQKEbRXgfuOLxvJPRX1MXL.0VMh2', 1, 1, NULL, '2024-03-21 06:32:15', '2024-03-21 06:32:15'),
(2, 'xoi', 'xoi@gmail.com', NULL, '$2y$12$dicKy25dUyB8OglA70DEuu8GhSEUBP93PnbKombbn3K9A8ij08HXK', 1, 1, NULL, '2024-04-12 22:51:59', '2024-04-12 22:51:59'),
(3, 'PhucLam', 'phuclam@gmail.com', NULL, '$2y$12$Dr8l3xXnqt/IbdpRI5LEhuOjHj.khZyfvKozSvylFmsG49xHJDUc.', 0, 1, NULL, '2024-04-13 02:31:47', '2024-04-13 02:31:47'),
(4, 'Lam', 'lam@gmail.com', NULL, '$2y$12$D37.An3EbaVGCjvGV7N9QuE/JlQ5xxYCtYpOe.DQT7xT7Ux0FSLPe', 0, 1, NULL, '2024-04-13 21:39:20', '2024-04-13 21:39:20'),
(8, 'Lâm Thanh Phúc', 'lamthanhphucit@gmail.com', NULL, '$2y$12$1lemd7lFd7/r5JxQDj7JwezSWGFQ3O/PDOxES3l0v4dpAqjWXvLvu', 0, 1, NULL, '2024-04-13 22:56:29', '2024-04-13 22:56:29'),
(10, 'Lâm Thanh Phúc', 'phuclpst09495@gmail.com', NULL, '$2y$12$jgQlEBD0d2Wg6gODJmGCde/xjW0v5T3yfgm8r3GSTXIsnzCwGY1SG', 0, 1, NULL, '2024-04-13 23:10:21', '2024-04-13 23:10:21'),
(11, 'Lâm Thanh Phúc', 'test@gmail.com', '2024-04-13 23:26:07', '$2y$12$q4MPoj3IC.AyRfsT02Bpw.KDRl.2W9fhfeYV7FhD4XMCVqJIY5fQG', 0, 1, NULL, '2024-04-13 23:20:25', '2024-04-13 23:26:07'),
(12, 'Lam Thanh Phuc', 'test2@gmail.com', '2024-04-13 23:30:34', '$2y$12$CtYkZ0KhZpo0c1UQLoqGre6ftUw6tY2t0j.l0Bu3gTq8d.C7EUBQq', 0, 1, NULL, '2024-04-13 23:28:57', '2024-04-13 23:30:34'),
(13, 'phucla', 'phuctest@gmail.com', '2024-04-14 01:14:25', '$2y$12$wZcfDMa5W8FCdEqzco5OmeQs/0n.8UvPnxCrb61BbchsDaTAtj51i', 0, 1, NULL, '2024-04-14 01:10:24', '2024-04-14 01:14:25');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `productcolor`
--
ALTER TABLE `productcolor`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `productsize`
--
ALTER TABLE `productsize`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sizes_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategory_slug_unique` (`slug`),
  ADD KEY `subcategory_category_id_foreign` (`category_id`),
  ADD KEY `subcategory_created_by_foreign` (`created_by`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `productcolor`
--
ALTER TABLE `productcolor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `productsize`
--
ALTER TABLE `productsize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `subcategory_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subcategory_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
