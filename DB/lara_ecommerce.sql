-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2019 at 10:05 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Super Admin' COMMENT 'Admin|Super Admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone_no`, `avatar`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md. Nazimul Islam', 'nazimulnaeem@gmail.com', '$2y$10$Is5vQywr5iyo42uq8mn93O8QhuGmjR.vZHoxZZYA1rK2bmLnOhQIa', '01303579765', NULL, 'Super Admin', 'xTwi9mOmYOLhfGrv0OAzAkOQbPNiXtKqumMNkkglBxDIv6r8oeMElt75nzeC', '2019-09-30 08:54:48', '2019-09-30 21:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Samsung', 'Sony camera', '2019-09-15.5d7e4b008cd17.jpg', '2019-09-15 08:25:45', '2019-09-15 09:08:33'),
(4, 'Sonny Hd', 'sony', '2019-09-15.5d7e53da14a44.jpg', '2019-09-15 09:08:10', '2019-09-15 09:08:10'),
(5, 'Others', 'others', '2019-09-15.5d7e5470dbf06.jpg', '2019-09-15 09:10:40', '2019-09-15 09:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `order_id`, `ip_address`, `product_quantity`, `created_at`, `updated_at`) VALUES
(21, 17, NULL, NULL, '127.0.0.1', 3, '2019-10-03 23:58:34', '2019-10-04 02:47:33'),
(23, 20, NULL, NULL, '127.0.0.1', 3, '2019-10-04 03:33:02', '2019-10-06 00:10:17'),
(24, 20, NULL, NULL, '::1', 1, '2019-10-06 09:34:14', '2019-10-06 09:34:14'),
(25, 19, NULL, NULL, '::1', 1, '2019-10-06 11:21:40', '2019-10-06 11:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `parent_id`, `created_at`, `updated_at`) VALUES
(3, 'Electronics', 'Electronics product are available', '2019-10-06.5d9a4147a7149.jpg', NULL, '2019-09-14 09:10:50', '2019-10-06 13:32:23'),
(4, 'fashion', 'fashionable all collection are here', '2019-10-06.5d9a41fce4c2d.jpg', 3, '2019-09-14 09:15:22', '2019-10-06 13:35:24'),
(5, 'Household', 'Household Household Household', '2019-10-06.5d9a410415673.jpg', 5, '2019-09-14 09:19:03', '2019-10-06 13:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `created_at`, `updated_at`) VALUES
(3, 'Rangpur sador', 8, '2019-09-18 18:00:00', '2019-09-18 18:00:00'),
(4, 'Gazipur', 1, '2019-09-18 18:00:00', '2019-09-18 18:00:00'),
(5, 'Jamalpur', 2, '2019-09-18 18:00:00', '2019-09-18 18:00:00'),
(6, 'Dinajpur', 8, '2019-09-18 18:00:00', '2019-09-18 18:00:00'),
(7, 'Nilfamari', 8, '2019-09-18 18:00:00', '2019-09-18 18:00:00'),
(8, 'Narayangong', 1, '2019-10-01 18:00:00', '2019-10-01 18:00:00'),
(9, 'Munsigong', 1, '2019-10-02 08:01:05', '2019-10-02 08:01:05'),
(10, 'Setabgong', 8, '2019-10-02 08:02:45', '2019-10-02 08:02:45'),
(11, 'Lalmonirhat', 8, '2019-10-02 08:02:45', '2019-10-02 08:02:45'),
(12, 'Madaripur', 6, '2019-10-02 08:04:02', '2019-10-02 08:04:02'),
(13, 'Vola', 6, '2019-10-02 08:04:02', '2019-10-02 08:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 1, '2019-09-17 09:00:10', '2019-09-17 09:00:10'),
(3, 'Maymonsing', 2, '2019-09-18 06:27:49', '2019-09-18 06:27:49'),
(4, 'Rangpur', 8, '2019-09-19 00:04:15', '2019-09-19 00:04:15'),
(5, 'Rajshahi', 3, '2019-09-19 00:04:36', '2019-09-19 00:04:36'),
(6, 'Chitagong', 5, '2019-09-19 00:05:05', '2019-09-19 00:05:05'),
(7, 'Shyllet', 4, '2019-09-19 00:05:29', '2019-09-19 00:05:29'),
(8, 'Borisal', 6, '2019-09-19 00:05:48', '2019-09-19 00:05:48'),
(9, 'Khulna', 7, '2019-09-19 00:07:49', '2019-09-19 00:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_09_04_150320_create_categories_table', 1),
(4, '2019_09_04_150606_create_brands_table', 1),
(5, '2019_09_04_150628_create_products_table', 1),
(7, '2019_09_04_153555_create_product_images_table', 1),
(8, '2014_10_12_000000_create_users_table', 2),
(11, '2019_09_17_133355_create_divisions_table', 3),
(12, '2019_09_17_133659_create_districts_table', 3),
(14, '2019_09_24_165507_create_carts_table', 4),
(15, '2019_09_27_103601_create_settings_table', 5),
(16, '2019_09_27_123419_create_payments_table', 6),
(17, '2019_09_24_165340_create_orders_table', 7),
(18, '2019_09_04_151420_create_admins_table', 8),
(19, '2019_10_02_141546_create_sliders_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `shipping_charge` int(11) NOT NULL DEFAULT '60',
  `custom_discount` int(11) NOT NULL DEFAULT '0',
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `is_seen_by_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `transaction_id`, `ip_address`, `name`, `phone`, `shipping_address`, `email`, `message`, `shipping_charge`, `custom_discount`, `is_paid`, `is_completed`, `is_seen_by_admin`, `created_at`, `updated_at`) VALUES
(1, 5, 2, NULL, NULL, 'Md. Nazimul Islam Naeem', '013035797', 'Shaymoli, Dhaka', 'nazimulnaeem@gmail.com', NULL, 60, 0, 0, 0, 0, '2019-09-29 23:16:51', '2019-09-29 23:16:51'),
(2, 5, 1, NULL, '127.0.0.1', 'Md. Nazimul Islam Naeem', '013035797', 'Zahuree maholla , muhammadpure', 'nazimulnaeem@gmail.com', NULL, 60, 0, 0, 0, 0, '2019-09-29 23:36:21', '2019-09-29 23:36:21'),
(3, 5, 3, '12345678', '127.0.0.1', 'Md. Nazimul Islam Naeem', '013035797', 'Shaymoli , Dhaka', 'nazimulnaeem@gmail.com', 'Shopping', 60, 0, 0, 0, 0, '2019-09-29 23:50:57', '2019-09-29 23:50:57'),
(4, 5, 2, '12345', '127.0.0.1', 'Md. Nazimul Islam Naeem', '013035797', 'zahuree maholla', 'nazimulnaeem@gmail.com', NULL, 60, 0, 0, 0, 0, '2019-10-01 13:15:02', '2019-10-01 13:15:02'),
(5, 5, 2, '12345', '127.0.0.1', 'Md. Nazimul Islam Naeem', '013035797', 'abcd', 'nazimulnaeem@gmail.com', NULL, 70, 10, 1, 1, 1, '2019-10-02 00:16:24', '2019-10-04 23:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT '1',
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Payment No',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'agent | personal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `image`, `priority`, `short_name`, `no`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Cash in', 'cash_in.jpg', 1, 'cash_in', NULL, NULL, '2019-09-27 13:04:58', '2019-09-27 13:04:58'),
(2, 'Bkash', 'bkash.jpg', 2, 'bkash', '01303579765', 'personal', '2019-09-27 13:04:58', '2019-09-27 13:04:58'),
(3, 'Rocket', 'rocket.jpg', 3, 'rocket', '013035797655', 'personal', '2019-09-27 13:06:19', '2019-09-27 13:06:19');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `offer_price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `admin_id`, `title`, `description`, `slug`, `quantity`, `price`, `status`, `offer_price`, `created_at`, `updated_at`) VALUES
(17, 3, 3, 1, 'Samsung', 'Samsung Samsung Samsung', 'samsung', 3, 27000, 0, NULL, '2019-09-15 23:18:31', '2019-09-15 23:18:31'),
(18, 3, 3, 1, 'Samsung Galaxy 5', 'Samsung Galaxy 5 Samsung Galaxy 5 Samsung Galaxy 5 Samsung Galaxy 5 Samsung Galaxy 5 Samsung Galaxy 5', 'samsung-galaxy-5', 2, 45000, 0, NULL, '2019-09-15 23:19:56', '2019-09-15 23:19:56'),
(19, 5, 5, 1, 'Another Product', 'Another Product', 'another-product', 1, 15000, 0, NULL, '2019-09-15 23:20:46', '2019-09-15 23:20:46'),
(20, 4, 4, 1, 'Sony Camera', 'Sony Camera 4200D', 'sony-camera', 2, 50000, 0, NULL, '2019-09-15 23:36:10', '2019-09-16 01:44:34'),
(21, 4, 4, 1, 'Camera', 'Sonny new arrival', 'camera', 1, 250, 0, NULL, '2019-10-06 12:33:24', '2019-10-06 12:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(18, 14, '2019-09-13-5d7b6fd63710e.jpg', '2019-09-13 04:30:46', '2019-09-13 04:30:46'),
(19, 14, '2019-09-13-5d7b6fd6958da.jpg', '2019-09-13 04:30:46', '2019-09-13 04:30:46'),
(20, 14, '2019-09-13-5d7b6fd6b0c53.jpg', '2019-09-13 04:30:46', '2019-09-13 04:30:46'),
(21, 15, '2019-09-13-5d7b70925ddf7.jpg', '2019-09-13 04:33:54', '2019-09-13 04:33:54'),
(22, 15, '2019-09-13-5d7b7092900a7.jpg', '2019-09-13 04:33:54', '2019-09-13 04:33:54'),
(23, 15, '2019-09-13-5d7b7092a407f.jpg', '2019-09-13 04:33:54', '2019-09-13 04:33:54'),
(24, 16, 'another-product-2019-09-13-5d7b70f26f576.jpg', '2019-09-13 04:35:30', '2019-09-13 04:35:30'),
(25, 16, 'another-product-2019-09-13-5d7b70f29338d.jpg', '2019-09-13 04:35:30', '2019-09-13 04:35:30'),
(26, 16, 'another-product-2019-09-13-5d7b70f2bcec4.jpg', '2019-09-13 04:35:30', '2019-09-13 04:35:30'),
(27, 17, 'samsung-2019-09-16-5d7f1b278f806.jpg', '2019-09-15 23:18:31', '2019-09-15 23:18:31'),
(28, 17, 'samsung-2019-09-16-5d7f1b282f592.jpg', '2019-09-15 23:18:32', '2019-09-15 23:18:32'),
(29, 17, 'samsung-2019-09-16-5d7f1b28669fa.png', '2019-09-15 23:18:32', '2019-09-15 23:18:32'),
(30, 18, 'samsung-galaxy-5-2019-09-16-5d7f1b7cee98a.png', '2019-09-15 23:19:58', '2019-09-15 23:19:58'),
(31, 18, 'samsung-galaxy-5-2019-09-16-5d7f1b7e66ea7.jpg', '2019-09-15 23:19:58', '2019-09-15 23:19:58'),
(32, 19, 'another-product-2019-09-16-5d7f1bae7d086.jpg', '2019-09-15 23:20:46', '2019-09-15 23:20:46'),
(33, 19, 'another-product-2019-09-16-5d7f1bae9aa02.jpg', '2019-09-15 23:20:46', '2019-09-15 23:20:46'),
(34, 20, 'sony-camera-2019-09-16-5d7f1f4aea268.jpg', '2019-09-15 23:36:11', '2019-09-15 23:36:11'),
(35, 20, 'sony-camera-2019-09-16-5d7f1f4b16094.jpg', '2019-09-15 23:36:11', '2019-09-15 23:36:11'),
(36, 20, 'sony-camera-2019-09-16-5d7f1f4b2eaf8.jpg', '2019-09-15 23:36:11', '2019-09-15 23:36:11'),
(37, 21, 'camera-2019-10-06-5d9a3374abced.jpg', '2019-10-06 12:33:25', '2019-10-06 12:33:25'),
(38, 21, 'camera-2019-10-06-5d9a337516f87.jpg', '2019-10-06 12:33:25', '2019-10-06 12:33:25'),
(39, 21, 'camera-2019-10-06-5d9a33752c89f.jpg', '2019-10-06 12:33:25', '2019-10-06 12:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` int(10) UNSIGNED NOT NULL DEFAULT '100',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `email`, `phone`, `address`, `shipping_cost`, `created_at`, `updated_at`) VALUES
(1, 'test@gmail.com', '01303579765', 'shaymoli', 100, '2019-09-27 11:16:01', '2019-09-27 11:16:01');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT '10',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `button_text`, `button_link`, `priority`, `created_at`, `updated_at`) VALUES
(10, 'Big shop new addition', '2019-10-06.5d99bd908dc72.jpg', 'new addition', 'http://demo.harnishdesign.net/opencart/bigshop/v2/', 1, '2019-10-06 04:10:25', '2019-10-06 04:10:25'),
(11, 'iPhone 6', '2019-10-06.5d99bdc53c052.jpg', 'iPhone', NULL, 2, '2019-10-06 04:11:17', '2019-10-06 04:11:17'),
(12, 'MackBook air', '2019-10-06.5d99be1c67bbb.jpg', 'MackBook', NULL, 3, '2019-10-06 04:12:44', '2019-10-06 04:12:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL COMMENT 'Division Table ID',
  `district_id` int(10) UNSIGNED NOT NULL COMMENT 'District Table ID',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0=Inactive|1=active|2=Ban',
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `phone`, `email`, `password`, `street_address`, `division_id`, `district_id`, `status`, `ip_address`, `avatar`, `shipping_address`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Md. Nazimul Islam', 'Naeem', 'md-nazimul-islamnaeem', '013035797', 'nazimulnaeem@gmail.com', '$2y$10$SzL3HLub1XqsshlV2N6JL.IkJ8.TbX4HQ8m2lou9kUV.8.32sjED6', '1abc', 4, 6, 1, '127.0.0.1', NULL, 'abcd', NULL, '2019-09-21 02:22:20', '2019-09-24 09:13:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_order_id_foreign` (`order_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_short_name_unique` (`short_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
