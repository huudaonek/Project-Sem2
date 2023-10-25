-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2023 lúc 03:17 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bancay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Cấu trúc bảng cho bảng `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--
-

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
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_08_31_041545_create_orders_table', 1),
(4, '2023_08_31_041802_create_feedbacks_table', 1),
(5, '2023_09_05_023732_create_products_table', 1),
(6, '2023_09_05_023823_create_order_details_table', 1),
(7, '2023_09_06_151602_create_images_table', 1),
(8, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(9, '2019_08_19_000000_create_failed_jobs_table', 2),
(10, '2023_10_04_061407_create_contacts_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Confirm','Delivering','Received') NOT NULL DEFAULT 'Confirm',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 'Confirm', '2023-10-25 05:32:35', '2023-10-25 05:32:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `payment` enum('Paypal','Cod') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `total`, `price`, `payment`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 92, 92, 'Paypal', '2023-10-25 05:32:35', '2023-10-25 05:32:35');

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
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `available` varchar(255) NOT NULL,
  `category` enum('bonsai','indoor-plants','outdoor-plants','tools') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `available`, `category`, `created_at`, `updated_at`) VALUES
(1, 'bonsai1', 72, 'Đây là sản phẩm của Bonsai 1', '49 có sẵn', 'bonsai', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(2, 'bonsai2', 92, 'Đây là sản phẩm của Bonsai 2', '77 có sẵn', 'bonsai', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(3, 'bonsai3', 92, 'Đây là sản phẩm của Bonsai 3', '29 có sẵn', 'bonsai', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(4, 'bonsai4', 99, 'Đây là sản phẩm của Bonsai 4', '82 có sẵn', 'bonsai', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(5, 'bonsai5', 67, 'Đây là sản phẩm của Bonsai 5', '93 có sẵn', 'bonsai', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(6, 'bonsai6', 80, 'Đây là sản phẩm của Bonsai 6', '41 có sẵn', 'bonsai', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(7, 'bonsai7', 96, 'Đây là sản phẩm của Bonsai 7', '94 có sẵn', 'bonsai', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(8, 'bonsai8', 71, 'Đây là sản phẩm của Bonsai 8', '42 có sẵn', 'bonsai', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(9, 'bonsai9', 57, 'Đây là sản phẩm của Bonsai 9', '49 có sẵn', 'bonsai', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(10, 'bonsai10', 85, 'Đây là sản phẩm của Bonsai 10', '28 có sẵn', 'bonsai', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(11, 'bonsai11', 61, 'Đây là sản phẩm của Bonsai 11', '96 có sẵn', 'bonsai', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(12, 'bonsai12', 52, 'Đây là sản phẩm của Bonsai 12', '30 có sẵn', 'bonsai', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(13, 'bonsai13', 85, 'Đây là sản phẩm của Bonsai 13', '99 có sẵn', 'bonsai', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(14, 'bonsai14', 82, 'Đây là sản phẩm của Bonsai 14', '47 có sẵn', 'bonsai', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(15, 'bonsai15', 57, 'Đây là sản phẩm của Bonsai 15', '28 có sẵn', 'bonsai', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(16, 'bonsai16', 50, 'Đây là sản phẩm của Bonsai 16', '32 có sẵn', 'bonsai', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(17, 'bonsai17', 94, 'Đây là sản phẩm của Bonsai 17', '90 có sẵn', 'bonsai', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(18, 'bonsai18', 98, 'Đây là sản phẩm của Bonsai 18', '86 có sẵn', 'bonsai', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(19, 'indoor-plants1', 71, 'Đây là sản phẩm của Bonsai 1', '20 có sẵn', 'indoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(20, 'indoor-plants2', 87, 'Đây là sản phẩm của Bonsai 2', '57 có sẵn', 'indoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(21, 'indoor-plants3', 68, 'Đây là sản phẩm của Bonsai 3', '77 có sẵn', 'indoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(22, 'indoor-plants4', 91, 'Đây là sản phẩm của Bonsai 4', '37 có sẵn', 'indoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(23, 'indoor-plants5', 77, 'Đây là sản phẩm của Bonsai 5', '68 có sẵn', 'indoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(24, 'indoor-plants6', 84, 'Đây là sản phẩm của Bonsai 6', '83 có sẵn', 'indoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(25, 'indoor-plants7', 95, 'Đây là sản phẩm của Bonsai 7', '44 có sẵn', 'indoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(26, 'indoor-plants8', 55, 'Đây là sản phẩm của Bonsai 8', '89 có sẵn', 'indoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(27, 'indoor-plants9', 72, 'Đây là sản phẩm của Bonsai 9', '71 có sẵn', 'indoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(28, 'indoor-plants10', 64, 'Đây là sản phẩm của Bonsai 10', '97 có sẵn', 'indoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(29, 'indoor-plants11', 84, 'Đây là sản phẩm của Bonsai 11', '94 có sẵn', 'indoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(30, 'indoor-plants12', 96, 'Đây là sản phẩm của Bonsai 12', '61 có sẵn', 'indoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(31, 'indoor-plants13', 87, 'Đây là sản phẩm của Bonsai 13', '24 có sẵn', 'indoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(32, 'indoor-plants14', 76, 'Đây là sản phẩm của Bonsai 14', '36 có sẵn', 'indoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(33, 'indoor-plants15', 87, 'Đây là sản phẩm của Bonsai 15', '86 có sẵn', 'indoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(34, 'indoor-plants16', 95, 'Đây là sản phẩm của Bonsai 16', '95 có sẵn', 'indoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(35, 'indoor-plants17', 70, 'Đây là sản phẩm của Bonsai 17', '30 có sẵn', 'indoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(36, 'indoor-plants18', 96, 'Đây là sản phẩm của Bonsai 18', '57 có sẵn', 'indoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(37, 'outdoor-plants1', 95, 'Đây là sản phẩm của Bonsai 1', '72 có sẵn', 'outdoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(38, 'outdoor-plants2', 71, 'Đây là sản phẩm của Bonsai 2', '61 có sẵn', 'outdoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(39, 'outdoor-plants3', 98, 'Đây là sản phẩm của Bonsai 3', '37 có sẵn', 'outdoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(40, 'outdoor-plants4', 82, 'Đây là sản phẩm của Bonsai 4', '99 có sẵn', 'outdoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(41, 'outdoor-plants5', 53, 'Đây là sản phẩm của Bonsai 5', '89 có sẵn', 'outdoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(42, 'outdoor-plants6', 67, 'Đây là sản phẩm của Bonsai 6', '50 có sẵn', 'outdoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(43, 'outdoor-plants7', 50, 'Đây là sản phẩm của Bonsai 7', '45 có sẵn', 'outdoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(44, 'outdoor-plants8', 77, 'Đây là sản phẩm của Bonsai 8', '95 có sẵn', 'outdoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(45, 'outdoor-plants9', 95, 'Đây là sản phẩm của Bonsai 9', '23 có sẵn', 'outdoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(46, 'outdoor-plants10', 98, 'Đây là sản phẩm của Bonsai 10', '100 có sẵn', 'outdoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(47, 'outdoor-plants11', 94, 'Đây là sản phẩm của Bonsai 11', '29 có sẵn', 'outdoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(48, 'outdoor-plants12', 87, 'Đây là sản phẩm của Bonsai 12', '25 có sẵn', 'outdoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(49, 'outdoor-plants13', 68, 'Đây là sản phẩm của Bonsai 13', '56 có sẵn', 'outdoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(50, 'outdoor-plants14', 87, 'Đây là sản phẩm của Bonsai 14', '40 có sẵn', 'outdoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(51, 'outdoor-plants15', 99, 'Đây là sản phẩm của Bonsai 15', '34 có sẵn', 'outdoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(52, 'outdoor-plants16', 98, 'Đây là sản phẩm của Bonsai 16', '58 có sẵn', 'outdoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(53, 'outdoor-plants17', 94, 'Đây là sản phẩm của Bonsai 17', '99 có sẵn', 'outdoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(54, 'outdoor-plants18', 83, 'Đây là sản phẩm của Bonsai 18', '53 có sẵn', 'outdoor-plants', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(55, 'tools1', 79, 'Đây là sản phẩm của Bonsai 1', '56 có sẵn', 'tools', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(56, 'tools2', 92, 'Đây là sản phẩm của Bonsai 2', '37 có sẵn', 'tools', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(57, 'tools3', 97, 'Đây là sản phẩm của Bonsai 3', '85 có sẵn', 'tools', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(58, 'tools4', 85, 'Đây là sản phẩm của Bonsai 4', '23 có sẵn', 'tools', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(59, 'tools5', 63, 'Đây là sản phẩm của Bonsai 5', '42 có sẵn', 'tools', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(60, 'tools6', 91, 'Đây là sản phẩm của Bonsai 6', '57 có sẵn', 'tools', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(61, 'tools7', 93, 'Đây là sản phẩm của Bonsai 7', '81 có sẵn', 'tools', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(62, 'tools8', 78, 'Đây là sản phẩm của Bonsai 8', '56 có sẵn', 'tools', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(63, 'tools9', 100, 'Đây là sản phẩm của Bonsai 9', '37 có sẵn', 'tools', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(64, 'tools10', 68, 'Đây là sản phẩm của Bonsai 10', '77 có sẵn', 'tools', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(65, 'tools11', 69, 'Đây là sản phẩm của Bonsai 11', '77 có sẵn', 'tools', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(66, 'tools12', 96, 'Đây là sản phẩm của Bonsai 12', '59 có sẵn', 'tools', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(67, 'tools13', 59, 'Đây là sản phẩm của Bonsai 13', '67 có sẵn', 'tools', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(68, 'tools14', 85, 'Đây là sản phẩm của Bonsai 14', '88 có sẵn', 'tools', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(69, 'tools15', 73, 'Đây là sản phẩm của Bonsai 15', '33 có sẵn', 'tools', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(70, 'tools16', 96, 'Đây là sản phẩm của Bonsai 16', '20 có sẵn', 'tools', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(71, 'tools17', 90, 'Đây là sản phẩm của Bonsai 17', '76 có sẵn', 'tools', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(72, 'tools18', 65, 'Đây là sản phẩm của Bonsai 18', '80 có sẵn', 'tools', '2023-10-16 09:22:52', '2023-10-16 09:22:52');

-- --------------------------------------------------------

--
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `name`, `product_id`, `url`, `created_at`, `updated_at`) VALUES
(1, '15.webp', 1, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474480/nnnwj64xk48yp1vuauzz.webp', '2023-10-16 09:41:19', '2023-10-16 09:41:19'),
(2, '14.webp', 2, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474482/kg3rbepbt5y7hmjtvgpe.webp', '2023-10-16 09:41:24', '2023-10-16 09:41:24'),
(3, '13.webp', 3, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474487/dt8axfjqjijo6ibjpb6s.webp', '2023-10-16 09:41:25', '2023-10-16 09:41:25'),
(4, '12.webp', 4, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474488/qarcdbdzkka7mmetwvnt.webp', '2023-10-16 09:41:27', '2023-10-16 09:41:27'),
(5, '11.webp', 5, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474490/ktlcbco22umx0xmrdfwl.webp', '2023-10-16 09:41:28', '2023-10-16 09:41:28'),
(6, '10.webp', 6, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474491/yb7wmod1osnpiz0mel41.webp', '2023-10-16 09:41:30', '2023-10-16 09:41:30'),
(7, '9.webp', 7, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474493/no2x3g1zlevle1mwwhcl.webp', '2023-10-16 09:41:32', '2023-10-16 09:41:32'),
(8, '16.webp', 8, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474495/egepaetjiptylwxpwa2i.webp', '2023-10-16 09:41:34', '2023-10-16 09:41:34'),
(9, '7.webp', 10, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474497/tfeasn3m32bh75n8gvme.webp', '2023-10-16 09:41:36', '2023-10-16 09:41:36'),
(10, '17.jpg', 9, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474499/du4ytmikpugtutmuabvs.jpg', '2023-10-16 09:41:38', '2023-10-16 09:41:38'),
(11, '6.webp', 11, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474501/vm7b81akvovomp6pm29m.webp', '2023-10-16 09:41:40', '2023-10-16 09:41:40'),
(12, 'product_19-270x270.jpg', 72, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474874/hljwt6nu9o11pgsbhe2n.jpg', '2023-10-16 09:47:52', '2023-10-16 09:47:52'),
(13, 'product_47-270x270.png', 71, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474876/bpvlktk6zggobo01nsh3.png', '2023-10-16 09:47:54', '2023-10-16 09:47:54'),
(14, 'product_08-270x270.jpg', 70, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474877/ymzqjwrijd4qvwlboci3.jpg', '2023-10-16 09:47:56', '2023-10-16 09:47:56'),
(15, 'product_48-270x270.png', 69, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474879/ef7ewmwbpxtbdo6f3nsx.png', '2023-10-16 09:47:58', '2023-10-16 09:47:58'),
(16, 'product_41-270x270.png', 68, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474881/etxhuwqkbquklyfushvg.png', '2023-10-16 09:48:00', '2023-10-16 09:48:00'),
(17, 'product_25-270x270.jpg', 66, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474883/sqots7xajde87kdkmjke.jpg', '2023-10-16 09:48:01', '2023-10-16 09:48:01'),
(18, 'product_15-270x270.jpg', 65, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474884/kygpgf2epqcpff234bsa.jpg', '2023-10-16 09:48:03', '2023-10-16 09:48:03'),
(19, 'product_27-270x270.jpg', 64, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474886/hc04aw12auduzphbmldn.jpg', '2023-10-16 09:48:04', '2023-10-16 09:48:04'),
(20, 'product_43-270x270.png', 67, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474888/jd88p4ei2mfjlv6whar0.png', '2023-10-16 09:48:06', '2023-10-16 09:48:06'),
(21, 'product_18-270x270.jpg', 63, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474889/hjhtlexnxgdg5z1lubui.jpg', '2023-10-16 09:48:08', '2023-10-16 09:48:08'),
(22, 'product_24-270x270.jpg', 61, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474890/eahgbmfocubcdk0v3tb4.jpg', '2023-10-16 09:48:09', '2023-10-16 09:48:09'),
(23, 'product_45-270x270.png', 62, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474892/sdnciqmnw2ciestwv1ls.png', '2023-10-16 09:48:11', '2023-10-16 09:48:11'),
(24, 'product_28-270x270.jpg', 60, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474894/pg0ownr7ggaetmcb9din.jpg', '2023-10-16 09:48:13', '2023-10-16 09:48:13'),
(25, 'product_26-270x270.jpg', 58, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474896/ikdd4rnnmgclurgpat4c.jpg', '2023-10-16 09:48:14', '2023-10-16 09:48:14'),
(26, 'product_45-270x270.png', 59, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474897/dywb6jt8j3b3q7j3xxsf.png', '2023-10-16 09:48:16', '2023-10-16 09:48:16'),
(27, 'product_31-270x270.jpg', 57, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474899/padpho53jqebqkfsrsoq.jpg', '2023-10-16 09:48:17', '2023-10-16 09:48:17'),
(28, 'product_20-270x270.jpg', 56, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474900/oq9tclqryguuxgjgvuif.jpg', '2023-10-16 09:48:19', '2023-10-16 09:48:19'),
(29, 'product_17-270x270.jpg', 55, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474902/zfngdg7oftx3mfm63yaw.jpg', '2023-10-16 09:48:21', '2023-10-16 09:48:21'),
(30, '2.webp', 54, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474904/lpdavnxu1afjgef7tosy.webp', '2023-10-16 09:48:22', '2023-10-16 09:48:22'),
(31, '4.webp', 53, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474906/m3auujaj32vhznhzb74w.webp', '2023-10-16 09:48:24', '2023-10-16 09:48:24'),
(32, '5.webp', 52, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474907/rcvalimmo0b9kedo6i84.webp', '2023-10-16 09:48:26', '2023-10-16 09:48:26'),
(33, '6.webp', 51, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474909/dsfq1vues7wb4hz3ruhh.webp', '2023-10-16 09:48:28', '2023-10-16 09:48:28'),
(34, '7.webp', 50, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474911/vztw3xk3ktmsrw0kyw30.webp', '2023-10-16 09:48:30', '2023-10-16 09:48:30'),
(35, '16.webp', 48, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474913/euqpyvadgk03ktmhvc8s.webp', '2023-10-16 09:48:32', '2023-10-16 09:48:32'),
(36, '9.webp', 47, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474915/ykburwcl6vk8nvsqlhkv.webp', '2023-10-16 09:48:33', '2023-10-16 09:48:33'),
(37, '10.webp', 46, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474916/cskexhfdqomuta7n4azg.webp', '2023-10-16 09:48:35', '2023-10-16 09:48:35'),
(38, '11.webp', 45, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474918/uqtawcyn01tqehfadvsv.webp', '2023-10-16 09:48:36', '2023-10-16 09:48:36'),
(39, 'product_26-270x270.jpg', 44, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474919/ptuimuc1yktbja0rk4gr.jpg', '2023-10-16 09:48:38', '2023-10-16 09:48:38'),
(40, '17.jpg', 49, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474922/rfjqt9q5strbplqezpif.jpg', '2023-10-16 09:48:40', '2023-10-16 09:48:40'),
(41, '13.webp', 43, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474923/jcq1lgflfkyebsvvt3z6.webp', '2023-10-16 09:48:42', '2023-10-16 09:48:42'),
(42, '15.webp', 44, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474925/uklfz3h6u5fterndcgfj.webp', '2023-10-16 09:48:44', '2023-10-16 09:48:44'),
(43, '13.webp', 43, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474926/shnotaox9aji2bf95qju.webp', '2023-10-16 09:48:45', '2023-10-16 09:48:45'),
(44, '14.webp', 42, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474928/b2ecpsjj7ceev0lfi3ab.webp', '2023-10-16 09:48:47', '2023-10-16 09:48:47'),
(45, '15.webp', 41, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474930/hvgbbqwnuypv9vp4mafn.webp', '2023-10-16 09:48:49', '2023-10-16 09:48:49'),
(46, '6.webp', 40, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474932/ezu1xqkjmsgl3g13hf4q.webp', '2023-10-16 09:48:50', '2023-10-16 09:48:50'),
(47, '11.webp', 39, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474933/w2qncrdaa3vzou7fazqa.webp', '2023-10-16 09:48:52', '2023-10-16 09:48:52'),
(48, '1.webp', 38, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474935/mpa63fh7hlepojdfxeiy.webp', '2023-10-16 09:48:54', '2023-10-16 09:48:54'),
(49, '16.webp', 37, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474937/xaznvwgei36tektrdpl5.webp', '2023-10-16 09:48:55', '2023-10-16 09:48:55'),
(50, '12.webp', 35, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474938/lxg2wbchtqduhfgmjmyj.webp', '2023-10-16 09:48:57', '2023-10-16 09:48:57'),
(51, '9.webp', 34, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474940/be5ieka4zd5ovpyj2lgf.webp', '2023-10-16 09:48:59', '2023-10-16 09:48:59'),
(52, '6.webp', 33, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474942/kduaxipfmbiox3fm9ymp.webp', '2023-10-16 09:49:00', '2023-10-16 09:49:00'),
(53, '14.webp', 32, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474943/yzipqagdq3zy3jqivsqs.webp', '2023-10-16 09:49:02', '2023-10-16 09:49:02'),
(54, '11.webp', 31, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474945/i8gz5uyzqm80pqycta5e.webp', '2023-10-16 09:49:05', '2023-10-16 09:49:05'),
(55, '17.jpg', 36, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474949/e1jrr9imwheoingisxc2.jpg', '2023-10-16 09:49:08', '2023-10-16 09:49:08'),
(56, '3.webp', 30, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474951/vcx3eeygbro2unhonft2.webp', '2023-10-16 09:49:09', '2023-10-16 09:49:09'),
(57, '12.webp', 29, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474952/loqphlnguvzd1fshwmp9.webp', '2023-10-16 09:49:11', '2023-10-16 09:49:11'),
(58, '12.webp', 26, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474954/ksri3eufgwbzbohlmfnl.webp', '2023-10-16 09:49:12', '2023-10-16 09:49:12'),
(59, '4.webp', 27, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474955/f0wkwsrdkpvz3umlom22.webp', '2023-10-16 09:49:14', '2023-10-16 09:49:14'),
(60, '13.webp', 24, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474957/kzzlywqzy3rvsc7hpndw.webp', '2023-10-16 09:49:16', '2023-10-16 09:49:16'),
(61, '4.webp', 25, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474959/jublj33yd9u8pp1bodo4.webp', '2023-10-16 09:49:17', '2023-10-16 09:49:17'),
(62, '17.jpg', 28, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474961/x7tnrjic2pd7uccvntku.jpg', '2023-10-16 09:49:20', '2023-10-16 09:49:20'),
(63, '1.webp', 23, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474963/hhsuffsqldscfc7upn3b.webp', '2023-10-16 09:49:21', '2023-10-16 09:49:21'),
(64, '15.webp', 22, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474964/xbucshr7iqedp5c6mrt6.webp', '2023-10-16 09:49:23', '2023-10-16 09:49:23'),
(65, '7.webp', 20, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474966/ny1elad2m5iuaqopeoqm.webp', '2023-10-16 09:49:25', '2023-10-16 09:49:25'),
(66, '3.webp', 19, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474968/rpbuynmfuapsvdpnjb6k.webp', '2023-10-16 09:49:26', '2023-10-16 09:49:26'),
(67, '16.webp', 18, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474970/xvfonbbbak5nq7z6yh6v.webp', '2023-10-16 09:49:28', '2023-10-16 09:49:28'),
(68, '14.webp', 17, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474971/lfqfacmlob7oojcla3lt.webp', '2023-10-16 09:49:30', '2023-10-16 09:49:30'),
(69, '1.webp', 16, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474973/fmi4bo2cxlx5ck7cqwfc.webp', '2023-10-16 09:49:32', '2023-10-16 09:49:32'),
(70, '2.webp', 15, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474975/jbof0ypj0qyni54qwpqk.webp', '2023-10-16 09:49:33', '2023-10-16 09:49:33'),
(71, '3.webp', 14, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474977/q99cagnni0npibv029ji.webp', '2023-10-16 09:49:35', '2023-10-16 09:49:35'),
(72, '4.webp', 13, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474978/gcxdomu1hpvq4mcchtsd.webp', '2023-10-16 09:49:37', '2023-10-16 09:49:37'),
(73, '5.webp', 12, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474981/fofhcdngxchkxizfuzbl.webp', '2023-10-16 09:49:40', '2023-10-16 09:49:40'),
(74, '13.webp', 21, 'https://res.cloudinary.com/dltwnzqy7/image/upload/v1697474992/u4lbydcultqgnvxb8pba.webp', '2023-10-16 09:49:50', '2023-10-16 09:49:50');

-- -------------------------------------------------------

-- Cấu trúc bảng cho bảng `users`


CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `FullName` varchar(100) DEFAULT '',
  `UserName` varchar(100) NOT NULL DEFAULT '',
  `Phone` varchar(20) DEFAULT NULL,
  `Address` varchar(20) DEFAULT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `FullName`, `UserName`, `Phone`, `Address`, `Email`, `Password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'User1', 'User1', '0312659982', 'Hà Nội', 'User1@gmail.com', '$2y$10$lfyc/ES2kQYsPhNG0Pb0K./nw/JTdUpsR23WQytV12XVk4PTT0bnu', 'user', '2023-10-16 09:22:51', '2023-10-16 09:22:51'),
(2, 'User2', 'User2', '0312659972', 'Hà Nội', 'User2@gmail.com', '$2y$10$77WCaWucBufDNBPcRxW2keIKnIkI.sqpiPzF/lWGItpVvQiq.PkTu', 'user', '2023-10-16 09:22:51', '2023-10-16 09:22:51'),
(3, 'User4', 'User4', '0312759972', 'Hà Nội', 'User4@gmail.com', '$2y$10$avgZsxEB4JFzs/.rsZ8rkePv/fu13d9vlmxFt2LtQUW7g5wVj4Br2', 'user', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(4, 'User5', 'User5', '0212659972', 'Hà Nội', 'User5@gmail.com', '$2y$10$G6MQBeLrCfDgO2witMlCBu9jLYcEey09mSwL44WJ0kbu1RnIzjLSS', 'user', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(5, 'User6', 'User6', '0912669972', 'Hà Nội', 'User6@gmail.com', '$2y$10$eo5t.n8fWKjltUdBYEVCaeM1CTX/I0ac5Uj1Dr7QkfPWYgy4Y0Zs.', 'user', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(6, 'User3', 'User3', '0712655872', 'Hà Tây', 'User3@gmail.com', '$2y$10$lTtkmY6Nj95YAIOd/YWmLepL45KUV60cINIAlumpjCGn0RzWqshiW', 'user', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(7, 'User7', 'User7', '0212674972', 'Hà Nội', 'User7@gmail.com', '$2y$10$PYgxUpuowi9QagJ4wpOZg.XxnrjRM.fNkn4lJvgTSdzXRQzCzAtxG', 'user', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(8, 'User8', 'User8', '0612656972', 'Hà Nội', 'User8@gmail.com', '$2y$10$C6LhnpdeN93krEvb2T7K7.0sASJ3jvrvFQorCxbL0xyR0aNOkwhV2', 'user', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(9, 'User9', 'User9', '0112659972', 'Hà Nội', 'User9@gmail.com', '$2y$10$4UpOYxeTYGGJ4TkOlVHOZO56eAMWNW4vbILKETLs46CQB.Zzss0ti', 'user', '2023-10-16 09:22:52', '2023-10-16 09:22:52'),
(10, 'admin1', 'admin1', '0372659972', 'Hà Nội', 'admin1@gmail.com', '$2y$10$M8guxXfMb1Q14kbJabgEu.VlAFJJXqg70iWeyX1ED1SIRIj1QayDS', 'admin', '2023-10-16 09:22:52', '2023-10-16 09:22:52');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

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
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);
--
-- Chỉ mục cho bảng `images`
--

ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_product_id_foreign` (`product_id`);
--
--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`UserName`),
  ADD UNIQUE KEY `users_email_unique` (`Email`),
  ADD UNIQUE KEY `users_phone_unique` (`Phone`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
