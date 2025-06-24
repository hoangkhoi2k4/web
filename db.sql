-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 24, 2025 lúc 01:49 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contract_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `amount` decimal(10,2) DEFAULT NULL,
  `paid_date` date NOT NULL,
  `vat` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `contract_id`, `name`, `description`, `quantity`, `amount`, `paid_date`, `vat`, `created_at`, `updated_at`) VALUES
(1, 1, ' bill_1', 'thanh toán cho nhà cung cấp 1', 1, 500000.00, '2025-05-30', 0.00, '2025-05-30 13:15:03', '2025-05-30 13:15:03'),
(2, 2, 'bill_2', 'bill cho nhà cung cấp số 2', 1, 600000.00, '2025-05-29', 0.00, '2025-05-29 13:16:07', '2025-05-29 13:16:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contract`
--

CREATE TABLE `contract` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(15,2) NOT NULL DEFAULT 0.00,
  `unit` varchar(255) NOT NULL,
  `signed_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `name_supplier` varchar(255) NOT NULL,
  `phone_supplier` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contract`
--

INSERT INTO `contract` (`id`, `provider_id`, `service_id`, `name`, `price`, `unit`, `signed_date`, `expire_date`, `name_supplier`, `phone_supplier`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'hợp đồng 1', 5000000.00, '1 tháng', '2025-05-01', '2025-05-31', 'nhà cung cấp a', '0123456789', '2015-05-06 06:44:14', '2025-05-07 06:44:14'),
(2, 1, 2, 'cung cấp bàn học', 400000.00, '1 đồ vật', '2017-05-01', '2025-05-31', 'nhà cung cấp a', '0123456789', '2015-05-01 06:51:10', '2025-05-01 06:51:10'),
(3, 1, 2, 'cung cấp bảng ', 1000000.00, '1 đồ vật', '2017-05-01', '2025-05-31', 'nhà cung cấp a', '0123456789', '2017-05-01 06:53:23', '2025-05-01 06:53:23'),
(4, 1, 7, 'thuê lao công phục vụ ', 30000.00, '1 giờ', '2015-05-01', '2025-05-31', 'nhà cung cấp a', '0123456789', '2015-05-01 06:54:47', '2025-05-01 06:54:47'),
(5, 2, 3, 'trông cho một xe', 3000.00, '1 xe', '2015-05-01', '2025-03-31', 'nhà cung cấp b', '012345876', '2025-05-01 06:56:35', '2025-05-01 06:56:35'),
(6, 2, 6, 'may áo đồng phục cho sinh viên', 300000.00, '1 áo', '2022-05-01', '2026-05-31', 'nhà cung cấp b', '0122345876', '2022-05-01 06:58:57', '2025-05-31 06:58:57'),
(7, 3, 4, 'cho sinh viên thực tập', 4000000.00, '1 sinh viên', '2025-05-01', '2026-05-01', 'nha cung cấp c', '012345987', '2015-05-02 07:00:25', '2025-05-30 10:04:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `progress`
--

CREATE TABLE `progress` (
  `id` int(20) UNSIGNED NOT NULL,
  `contract_id` int(20) UNSIGNED DEFAULT NULL,
  `progress` int(3) DEFAULT NULL,
  `avg` decimal(10,2) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `progress`
--

INSERT INTO `progress` (`id`, `contract_id`, `progress`, `avg`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 90, 9.00, NULL, '2025-05-30 10:55:49', NULL),
(2, 2, 75, 7.00, NULL, '2025-05-30 10:56:03', NULL),
(3, 3, 85, 8.00, NULL, '2025-05-30 10:56:07', NULL),
(4, 4, 95, 9.50, NULL, '2025-05-30 10:56:11', NULL),
(5, 5, 100, 10.00, NULL, '2025-05-30 10:56:16', NULL),
(6, 6, 70, 7.00, NULL, '2025-05-30 10:56:18', NULL),
(7, 7, 85, 8.00, 'bcs', '2025-05-30 10:56:21', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `provider`
--

CREATE TABLE `provider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `taxcode` varchar(255) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `provider`
--

INSERT INTO `provider` (`id`, `name`, `taxcode`, `description`, `status`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'nhà cung cấp a', '000001', 'nhà cung cấp hàng đầu khu vực với nhiều dịch vụ đẳng cấp', 'active', 'Hà Nội', '0123456789', 'phamthanhlong725@gmail.com', '2015-05-14 05:21:43', '2025-05-18 16:35:06'),
(2, 'nhà cung cấp b', '000002', 'nhà cung cấp hàng đầu khu vực miền trung', 'active', 'Nghệ An', '012345876', 'lapyen30@gmail.com', '2020-05-14 05:24:38', '2025-05-18 16:35:06'),
(3, 'nhà cung cấp c', '000003', 'nhà cung cấp hàng đầu khu vực miền Nam abc', 'active', 'Hồ Chí Minh', '012345987', 'nhacungcapC@gmail.com', '2022-05-25 05:26:02', '2025-05-31 09:28:37'),
(7, 'nhà cung cấp d', '000004', 'nhà cung cấp hàng dầu ', 'active', 'Tầng 4, TTTM Satra Phạm Hùng, C6/27', '0123456798', 'test@gmail.com', '2025-05-31 13:12:25', '2025-05-31 13:19:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `provide_service`
--

CREATE TABLE `provide_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `unit` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `provide_service`
--

INSERT INTO `provide_service` (`id`, `provider_id`, `service_id`, `unit`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1 tháng', '2024-08-29 13:30:04', '2025-05-30 05:31:01'),
(2, 1, 2, '1 đồ vật ', '2024-08-29 13:30:04', '2025-05-14 02:53:54'),
(3, 1, 7, '1 giờ', '2025-05-08 05:33:07', '2025-05-14 05:33:07'),
(4, 2, 3, '1 xe', '2017-05-09 05:35:59', '2025-05-18 02:53:54'),
(5, 2, 6, '1 sinh viên ', '2015-05-28 05:37:02', '2025-05-30 05:37:02'),
(6, 3, 4, '1 sinh viên ', '2024-05-22 05:38:32', '2025-05-18 16:35:06'),
(7, 3, 5, '1 tháng', '2015-05-20 05:39:01', '2025-05-18 16:35:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service`
--

CREATE TABLE `service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `service`
--

INSERT INTO `service` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dịch vụ về nước ', 'cung cấp nước', 'active', '2025-05-18 02:53:54', '2025-05-18 02:53:54'),
(2, 'dịch vụ cung cấp các vật dụng ', 'thêm bảo trì các cơ sở vật chất liên quan đến lớp học', 'active', '2025-05-18 16:35:06', '2025-05-18 16:35:06'),
(3, 'trông xe cho sinh viên ', 'thuê nhân viên giữ xe và quản lý xe', 'active', '2024-08-29 13:30:04', '2024-08-29 15:44:41'),
(4, 'dịch vụ liên kết với fpt', 'cung cấp cơ hội thực tập', 'active', '2025-05-18 16:35:06', '2025-05-18 02:53:54'),
(5, 'dịch vụ cung cấp cho sử dụng căng tin ', 'cho phép sử dụng căng tin để bán hàng', 'active', '2024-08-29 13:30:04', '2025-05-18 02:53:54'),
(6, 'dịch vụ hợp tác may áo đồng phục ', 'may các bộ áo cho sinh viên trưởng', 'active', '2025-05-30 05:19:23', '2024-08-30 13:30:04'),
(7, 'dịch vụ thuê nhân công', 'thuê người đi dọn vê sinh các phòng học, nhà vệ sinh và một số cơ sở khác', 'active', '2017-05-31 05:21:25', '2025-05-18 02:53:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Long', 'phamthanhlong725@gmail.com', '$2y$12$vHV5ti7HGaYtE2jQp5W2GOBz8LSkGQqvY4cuqlrkc.4TVpQCr7bgW', '2025-05-30 05:05:27', '2025-05-30 05:05:35'),
(2, 'Khởi', 'khoi@gmail.com', '$2y$12$vHV5ti7HGaYtE2jQp5W2GOBz8LSkGQqvY4cuqlrkc.4TVpQCr7bgW', '2024-08-29 13:30:04', '2024-08-29 13:30:04');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_contract_id_foreign` (`contract_id`);

--
-- Chỉ mục cho bảng `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contract_provider_id_foreign` (`provider_id`),
  ADD KEY `contract_service_id_foreign` (`service_id`);

--
-- Chỉ mục cho bảng `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `provider_taxcode_unique` (`taxcode`),
  ADD UNIQUE KEY `provider_phone_unique` (`phone`),
  ADD UNIQUE KEY `provider_email_unique` (`email`);

--
-- Chỉ mục cho bảng `provide_service`
--
ALTER TABLE `provide_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provide_service_provider_id_foreign` (`provider_id`),
  ADD KEY `provide_service_service_id_foreign` (`service_id`);

--
-- Chỉ mục cho bảng `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `contract`
--
ALTER TABLE `contract`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `provider`
--
ALTER TABLE `provider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `provide_service`
--
ALTER TABLE `provide_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `service`
--
ALTER TABLE `service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_contract_id_foreign` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contract_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `provide_service`
--
ALTER TABLE `provide_service`
  ADD CONSTRAINT `provide_service_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `provide_service_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
