-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 04:02 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osudlagbe`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_pages`
--

CREATE TABLE `about_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bg_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_pages`
--

INSERT INTO `about_pages` (`id`, `bg_image`, `title_description`, `team_description`, `created_at`, `updated_at`) VALUES
(1, 'public/frontend/assets/images/about-page/1698574476293409.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore aperiam fugit consequuntur voluptatibus ex sint iure in, distinctio sed dolorem aspernatur veritatis repellendus dolorum voluptate, animi libero officiis eveniet accusamus recusandae. Temporibus amet ducimus sapiente voluptatibus autem dolorem magnam quas, porro suscipit. Quibusdam culpa asperiores exercitationem architecto quo, temporibus vel! porro suscipit. Quibusdam culpa asperiores exercitationem architecto quo, temporibus vel!\r\n\r\nSint voluptatum beatae necessitatibus quos mollitia vero, optio asperiores aut tempora iusto eum rerum, possimus, minus quidem ut saepe laboriosam. Praesentium aperiam accusantium minus repellendus accusamus neque iusto pariatur laudantium provident quod recusandae exercitationem natus dignissimos, molestias quibusdam doloremque eaque fugit molestiae modi quam unde. Error est dolor facere.', 'Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet conse ctetur adipisicing elit. \r\nLorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet conse ctetur adipisicing elit. \r\nLorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet conse ctetur adipisicing elit.', '2021-05-01 07:53:39', '2021-05-01 10:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role_id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `image`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 10, 'Mazharul Islam fd', 'admin@gmail.com', NULL, '$2y$10$zd3rcXY3E0iZEi049avoHexSOPNeOYyKC.tGC4lN4LeWtINIiwd6S', '01716448668', 'public/admin/images/user/Raihan_Khan.jpg', 'Sonargoan, Narayanganj', NULL, NULL, '2021-07-12 13:22:55'),
(4, 9, 'Meherin Islam Maisha', 'maisha@gmail.com', NULL, '$2y$10$8rqczMtbQOHkN/jGiTFksOE9uZkf5iX./My0fyf9m6ttaT180/SXK', '01883675858', 'public/admin/baby.jpg', 'Sonargoan, Narayanganj', NULL, NULL, '2021-06-13 08:02:39'),
(9, 8, 'Md Mazharul Islam', 'eng.mazharul2@gmail.com', NULL, '$2y$10$EIZvcii.dVQZEeY1DJw3VuRgnDu0e8h/Hy5vsyCibfugFLmG39gZC', '01883675857', NULL, NULL, NULL, '2021-06-13 07:36:50', '2021-06-13 07:36:50'),
(10, 9, 'permission', 'permission@gmail.com', NULL, '$2y$10$gm1J7SkgFchmH2w3os7Hne1VSL6WUUEE9eBd0rcdy8ph4bY03Jlme', '456465464', 'public/admin/images/user/1702469486614701.jpg', 'Sonar Goan', NULL, '2021-06-13 10:00:41', '2021-06-13 10:23:44'),
(11, 9, 'demo', 'demo@gmail.com', NULL, '$2y$10$C4rHuZJ/CuXb.ojAowFNp.MqirmAmxyIVCEQvrMLmOpVhF0BWWRBG', '454545465454', NULL, NULL, NULL, '2021-07-12 13:23:39', '2021-07-12 13:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name_en`, `brand_name_bn`, `brand_slug_en`, `brand_slug_bn`, `brand_image`, `created_at`, `updated_at`) VALUES
(5, 'samsung', 'সামস্যাং', 'samsung', 'সামস্যাং', 'public/frontend/assets/images/brand/1693730358831835.png', '2021-03-08 23:19:02', NULL),
(6, 'walton', 'ওয়ালটন', 'walton', 'ওয়ালটন', 'public/frontend/assets/images/brand/1693730658030981.png', '2021-03-08 23:22:26', '2021-03-08 23:23:47'),
(7, 'Iphone', 'আইফোন', 'iphone', 'আইফোন', 'public/frontend/assets/images/brand/1693854161695418.png', '2021-03-10 08:06:50', NULL),
(8, 'electronics', 'ইলেক্টনিকস', 'electronics', 'ইলেক্টনিকস', 'public/frontend/assets/images/brand/1693854240164430.jpg', '2021-03-10 08:08:04', NULL),
(9, 'natural', 'প্রাকৃতিক', 'natural', 'প্রাকৃতিক', 'public/frontend/assets/images/brand/1694127103316542.jpg', '2021-03-13 08:25:07', '2021-06-13 06:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_en`, `category_name_bn`, `category_slug_en`, `category_slug_bn`, `created_at`, `updated_at`) VALUES
(9, 'electronics', 'ইলেক্ট্রনিকস', 'electronics', 'ইলেক্ট্রনিকস', '2021-03-09 11:22:21', NULL),
(10, 'Watch', 'গড়ি', 'watch', 'গড়ি', '2021-03-09 11:22:43', '2021-03-09 11:23:03'),
(13, 'garments', 'গার্মেন্টস', 'garments', 'গার্মেন্টস', '2021-03-09 11:23:59', NULL),
(14, 'natural', 'প্রাকৃতিক', 'natural', 'প্রাকৃতিক', '2021-03-13 08:26:26', NULL),
(15, 'Foods', 'ফুডস', 'foods', 'ফুডস', '2021-03-16 10:04:14', NULL),
(16, 'vagetebles', 'শাকসবজি', 'vagetebles', 'শাকসবজি', '2021-03-16 10:05:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_validity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `coupon_discount`, `coupon_validity`, `status`, `created_at`, `updated_at`) VALUES
(5, 'RAMADAN', 20, '2021-4-20', 1, '2021-04-03 06:44:52', '2021-04-04 00:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_02_20_060706_create_admins_table', 1),
(5, '2021_03_07_163123_add_social_login_field', 1),
(6, '2021_03_08_180856_create_brands_table', 2),
(7, '2021_03_09_055628_create_categories_table', 3),
(8, '2021_03_09_071555_create_subcategories_table', 4),
(9, '2021_03_09_123016_create_subsubcategories_table', 5),
(19, '2021_03_09_192957_create_products_table', 6),
(20, '2021_03_09_195059_create_muli_imgs_table', 6),
(21, '2021_03_12_180323_create_sliders_table', 6),
(22, '2021_03_31_163439_create_wisthlishts_table', 7),
(23, '2021_04_03_052246_create_my_cart_pages_table', 8),
(24, '2021_04_03_111713_create_coupons_table', 8),
(25, '2021_04_04_064350_create_ship_divisions_table', 9),
(26, '2021_04_04_064420_create_ship_districts_table', 9),
(27, '2021_04_04_064431_create_ship_states_table', 9),
(28, '2021_04_05_163912_create_shippings_table', 10),
(29, '2021_04_20_082804_create_orders_table', 11),
(30, '2021_04_20_082815_create_order_items_table', 11),
(31, '2021_04_27_191945_create_roles_table', 12),
(32, '2021_05_01_114830_create_about_pages_table', 13),
(33, '2021_05_19_043446_create_product_reviews_table', 14),
(34, '2021_06_12_155527_create_roles_table', 15),
(35, '2021_06_12_172757_create_parmissions_table', 16),
(36, '2021_06_12_195052_create_permissions_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `muli_imgs`
--

CREATE TABLE `muli_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `muli_imgs`
--

INSERT INTO `muli_imgs` (`id`, `product_id`, `image_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'public/frontend/images/products/multi-img/1694203822145576.jpg', '2021-03-14 04:44:32', NULL),
(2, 1, 'public/frontend/images/products/multi-img/1694203822266867.jpg', '2021-03-14 04:44:32', NULL),
(3, 1, 'public/frontend/images/products/multi-img/1694203822360801.jpg', '2021-03-14 04:44:32', NULL),
(4, 2, 'public/frontend/images/products/multi-img/1694212875654263.png', '2021-03-14 07:08:26', NULL),
(5, 2, 'public/frontend/images/products/multi-img/1694212876001260.jpg', '2021-03-14 07:08:26', NULL),
(6, 2, 'public/frontend/images/products/multi-img/1694212876084924.jpg', '2021-03-14 07:08:27', NULL),
(7, 3, 'public/frontend/images/products/multi-img/1694213036716591.jpg', '2021-03-14 07:10:59', NULL),
(8, 3, 'public/frontend/images/products/multi-img/1694213036910065.jpg', '2021-03-14 07:10:59', NULL),
(9, 3, 'public/frontend/images/products/multi-img/1694213036997953.jpg', '2021-03-14 07:10:59', NULL),
(10, 4, 'public/frontend/images/products/multi-img/1694213197573618.jpg', '2021-03-14 07:13:34', NULL),
(11, 4, 'public/frontend/images/products/multi-img/1694213199203961.jpg', '2021-03-14 07:13:34', NULL),
(12, 4, 'public/frontend/images/products/multi-img/1694213199253701.jpg', '2021-03-14 07:13:34', NULL),
(13, 5, 'public/frontend/images/products/multi-img/1695726970509080.png', '2021-03-14 07:16:50', '2021-03-31 00:14:19'),
(14, 5, 'public/frontend/images/products/multi-img/1695726978506982.jpg', '2021-03-14 07:16:50', '2021-03-31 00:14:27'),
(18, 7, 'public/frontend/images/products/multi-img/1694213931002518.jpg', '2021-03-14 07:25:12', NULL),
(19, 7, 'public/frontend/images/products/multi-img/1694213931104306.jpg', '2021-03-14 07:25:12', NULL),
(20, 8, 'public/frontend/images/products/multi-img/1694230798873810.jpg', '2021-03-14 11:53:19', NULL),
(21, 8, 'public/frontend/images/products/multi-img/1694230799013834.jpg', '2021-03-14 11:53:19', NULL),
(22, 8, 'public/frontend/images/products/multi-img/1694230799064213.jpg', '2021-03-14 11:53:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `my_cart_pages`
--

CREATE TABLE `my_cart_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `processing_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picked_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipped_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivered_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `division_id`, `district_id`, `state_id`, `name`, `email`, `phone`, `post_code`, `notes`, `payment_type`, `payment_method`, `transaction_id`, `currency`, `amount`, `order_number`, `invoice_no`, `order_date`, `order_month`, `order_year`, `confirmed_date`, `processing_date`, `picked_date`, `shipped_date`, `delivered_date`, `cancel_date`, `return_date`, `return_reason`, `status`, `created_at`, `updated_at`) VALUES
(184, 4, 1, 4, 2, 'Emon Ahmed', 'user@gmail.com', '01716448668', '1442', 'nice', 'Stripe', 'card_1IjhK5LVjUl3jfbmEedNwmq7', 'txn_1IjhK7LVjUl3jfbm55ov9laP', 'bdt', 999.00, '6083ddc736f95', 'MR94762506', '24 April 2021', 'April', '2021', '29 April 2021', '29 April 2021', '29 April 2021', '29 April 2021', '29 April 2021', NULL, NULL, NULL, 'Delivered', '2021-04-24 02:58:48', '2021-04-28 23:55:21'),
(185, 4, 1, 4, 2, 'Emon Ahmed', 'user@gmail.com', '01716448668', '1442', 're', 'SSL', 'SSL Payment', '6083de908626f', 'BDT', 520.00, NULL, 'MR13513288', '24 April 2021', 'April', '2021', '29 April 2021', '29 April 2021', '29 April 2021', '29 April 2021', NULL, NULL, '26 April 2021', 'false Product', 'Shipping', '2021-04-24 03:02:08', '2021-04-28 23:55:49'),
(186, 4, 1, 4, 2, 'Emon Ahmed', 'user@gmail.com', '01716448668', '1442', 're', 'Stripe', 'card_1Ijk2ELVjUl3jfbmZmAl33Qy', 'txn_1Ijk2GLVjUl3jfbmCYljH0ig', 'bdt', 11879.00, '6084067fdf472', 'MR94200592', '24 April 2021', 'April', '2021', '29 April 2021', '29 April 2021', NULL, NULL, NULL, NULL, NULL, NULL, 'Processing', '2021-04-24 05:52:33', '2021-04-28 23:55:36'),
(187, 4, 1, 4, 2, 'Emon Ahmed', 'user@gmail.com', '01716448668', 'baradi', 'nice product', 'SSL', 'SSL Easy', '6085ce022a56c', 'BDT', 1160.00, NULL, 'MR45194610', '25 April 2021', 'April', '2021', '29 April 2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Confirm', '2021-04-25 14:16:02', '2021-04-28 23:54:42'),
(188, 4, 1, 4, 2, 'Emon Ahmed', 'user@gmail.com', '01716448668', 'baradi', 'nice product', 'SSL', 'SSL Easy', '6085ce023c07d', 'BDT', 1160.00, NULL, 'MR81623247', '25 April 2021', 'April', '2021', NULL, NULL, NULL, NULL, NULL, '29 April 2021', '26 April 2021', 'dublicate Product', 'Cancel', '2021-04-25 14:16:02', '2021-04-29 02:05:40'),
(189, 4, 1, 4, 2, 'Emon Ahmed', 'user@gmail.com', '01716448668', '1442', 'emon', 'SSL', 'SSL Payment', '6085ce9bb3d93', 'BDT', 140.00, NULL, 'MR96484106', '25 April 2021', 'April', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2021-04-25 14:18:35', '2021-04-26 02:29:18'),
(190, 4, 1, 5, 5, 'Emon Ahmed', 'user@gmail.com', '01716448668', '1442', 're', 'SSL', 'SSL Easy', '6085ceec1a512', 'BDT', 25520.00, NULL, 'MR39755051', '25 April 2021', 'April', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2021-04-25 14:19:56', '2021-04-26 02:26:00'),
(192, 4, 1, 4, 2, 'Emon Ahmed', 'user@gmail.com', '01716448668', '1442', 're', 'SSL', 'SSL Easy', '6085cf6842b97', 'BDT', 999.00, NULL, 'MR63365185', '25 April 2021', 'April', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2021-04-25 14:22:00', NULL),
(193, 4, 1, 4, 2, 'Emon Ahmed', 'user@gmail.com', '01716448668', '1442', 're', 'SSL', 'SSL Easy', '6085cf6846598', 'BDT', 999.00, NULL, 'MR22769381', '25 April 2021', 'April', '2021', NULL, NULL, '29 April 2021', '29 April 2021', '29 April 2021', NULL, '05 June 2021', NULL, 'Delivered', '2021-04-25 14:22:00', '2021-06-05 09:14:03'),
(194, 4, 1, 5, 5, 'Emon Ahmed', 'user@gmail.com', '01716448668', 're', 'fd', 'Stripe', 'card_1IkEV6LVjUl3jfbmHFXMts8O', 'txn_1IkEV7LVjUl3jfbmc8GW3QIl', 'bdt', 13850.00, '6085cff530951', 'MR95930473', '25 April 2021', 'April', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2021-04-25 14:24:22', NULL),
(195, 4, 1, 5, 5, 'Emon Ahmed', 'user@gmail.com', '01716448668', 're', 'fsdf', 'SSL', 'SSL Payment', '6085d02519710', 'BDT', 650.00, NULL, 'MR72554152', '25 April 2021', 'April', '2021', NULL, NULL, '29 April 2021', NULL, NULL, NULL, NULL, NULL, 'Picked', '2021-04-25 14:25:09', '2021-04-28 23:53:19'),
(196, 4, 1, 4, 2, 'Emon Ahmed', 'user@gmail.com', '01716448668', '1442', 'nice product', 'Stripe', 'card_1Iz5DELVjUl3jfbmUwyK6TM8', 'txn_1Iz5DGLVjUl3jfbmwUGlRiSN', 'bdt', 3250.00, '60bbd104b5b01', 'MR75656988', '05 June 2021', 'June', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', '2021-06-05 13:31:19', NULL),
(197, 4, 1, 4, 2, 'Emon Ahmed', 'user@gmail.com', '01716448668', '1442', NULL, 'SSL', 'SSL Payment', '60bbd1eea36a4', 'BDT', 4995.00, NULL, 'MR82034705', '05 June 2021', 'June', '2021', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Processing', '2021-06-05 13:35:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `color`, `size`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(201, 184, 7, NULL, NULL, '1', 999.00, '2021-04-24 02:58:53', NULL),
(202, 185, 8, NULL, NULL, '1', 650.00, '2021-04-24 03:02:08', NULL),
(203, 186, 7, NULL, NULL, '1', 999.00, '2021-04-24 05:52:37', NULL),
(204, 186, 5, 'red', 'meddium', '1', 13850.00, '2021-04-24 05:52:37', NULL),
(205, 187, 2, 'withe', NULL, '1', 1450.00, '2021-04-25 14:16:02', NULL),
(206, 188, 2, 'withe', NULL, '1', 1450.00, '2021-04-25 14:16:02', NULL),
(207, 189, 1, NULL, NULL, '1', 140.00, '2021-04-25 14:18:35', NULL),
(208, 190, 4, 'white', 'm', '1', 25520.00, '2021-04-25 14:19:56', NULL),
(210, 192, 7, NULL, NULL, '1', 999.00, '2021-04-25 14:22:00', NULL),
(211, 193, 7, NULL, NULL, '1', 999.00, '2021-04-25 14:22:00', NULL),
(212, 194, 5, 'red', 'meddium', '1', 13850.00, '2021-04-25 14:24:27', NULL),
(213, 195, 8, NULL, NULL, '1', 650.00, '2021-04-25 14:25:09', NULL),
(214, 196, 8, NULL, NULL, '5', 650.00, '2021-06-05 13:31:26', NULL),
(215, 197, 7, NULL, NULL, '5', 999.00, '2021-06-05 13:35:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('user@gmail.com', '$2y$10$eMTlrRHIKNXfnPf0hN4QiOkvO9dzVoKWEciU8albN9XY.R5gOojaq', '2021-03-24 09:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `role_id`, `permission`, `created_at`, `updated_at`) VALUES
(8, 10, '{\"brand\":{\"add\":\"1\",\"view\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"manage\":\"1\"},\"slider\":{\"add\":\"1\",\"view\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"manage\":\"1\"},\"cat\":{\"add\":\"1\",\"view\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"manage\":\"1\"},\"subcat\":{\"add\":\"1\",\"view\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"manage\":\"1\"},\"subsubcat\":{\"add\":\"1\",\"view\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"manage\":\"1\"},\"product\":{\"add\":\"1\",\"view\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"manage\":\"1\"},\"coupon\":{\"add\":\"1\",\"view\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"manage\":\"1\"},\"order\":{\"add\":\"1\",\"view\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"manage\":\"1\"},\"report\":{\"add\":\"1\",\"view\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"manage\":\"1\"},\"review\":{\"add\":\"1\",\"view\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"manage\":\"1\"},\"role_mgt\":{\"add\":\"1\",\"view\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"manage\":\"1\"},\"per_mgt\":{\"add\":\"1\",\"view\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"manage\":\"1\"},\"sub_mgt\":{\"add\":\"1\",\"view\":\"1\",\"edit\":\"1\",\"delete\":\"1\",\"manage\":\"1\"}}', '2021-06-12 15:50:00', '2021-06-13 10:13:45'),
(10, 9, '{\"brand\":{\"add\":\"1\",\"view\":\"1\"},\"product\":{\"manage\":\"1\"},\"report\":{\"delete\":\"1\"},\"review\":{\"manage\":\"1\"}}', '2021-06-12 16:18:00', '2021-06-12 16:18:00'),
(11, 8, '{\"brand\":{\"add\":\"1\",\"view\":\"1\",\"edit\":\"1\"},\"slider\":{\"add\":\"1\",\"view\":\"1\",\"edit\":\"1\"},\"cat\":{\"add\":\"1\",\"view\":\"1\",\"edit\":\"1\"}}', '2021-06-13 08:59:19', '2021-06-13 10:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_id` int(11) DEFAULT NULL,
  `product_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_descp_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_descp_bn` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp_en` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp_bn` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thambnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secound_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `best_seller` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `new_arrivals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name_en`, `product_name_bn`, `product_slug_en`, `product_slug_bn`, `product_code`, `product_qty`, `product_tags_en`, `product_tags_bn`, `product_size_en`, `product_size_bn`, `product_color_en`, `product_color_bn`, `selling_price`, `discount_price`, `short_descp_en`, `short_descp_bn`, `long_descp_en`, `long_descp_bn`, `product_thambnail`, `secound_image`, `best_seller`, `featured`, `hot_deals`, `new_arrivals`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 14, 24, NULL, 'Sweet', 'মিস্টি', 'sweet', 'মিস্টি', '141', '140', 'Sweet', 'মিস্টি', NULL, NULL, NULL, NULL, '180', '140', 'Sweet', 'মিস্টি', 'Sweet', 'মিস্টি', 'public/frontend/images/products/product-thambail/1694212435613344.jpg', 'public/frontend/images/products/product-thambail/1694212394630025.jpg', 1, NULL, NULL, NULL, 1, '2021-03-14 04:44:31', '2021-03-14 07:04:14'),
(2, 7, 9, 22, NULL, 'mans watch', 'পুরুষদের গড়ি', 'mans-watch', 'পুরুষদের-গড়ি', '140', '10', 'watch', 'পুরুষদের গড়ি', NULL, NULL, 'withe,blue', 'সাদা,নীল', '1450', NULL, 'mans watch', 'পুরুষদের গড়ি', 'mans watch', 'পুরুষদের গড়ি', 'public/frontend/images/products/product-thambail/1694212875082728.png', 'public/frontend/images/products/product-thambail/1694212875239460.png', NULL, 1, NULL, NULL, 1, '2021-03-14 07:08:25', '2021-06-13 07:25:23'),
(3, 9, 14, 23, NULL, 'natural Honey', 'প্রাকৃতিক মধু', 'natural-honey', 'প্রাকৃতিক-মধু', '145', '40', 'Sweet', 'মিস্টি', NULL, NULL, NULL, NULL, '850', NULL, 'natural Honey', 'প্রাকৃতিক মধু', 'natural Honey', 'প্রাকৃতিক মধু', 'public/frontend/images/products/product-thambail/1694213036545445.jpg', 'public/frontend/images/products/product-thambail/1694213036588139.jpg', NULL, NULL, 1, NULL, 1, '2021-03-14 07:10:59', '2021-03-14 07:20:05'),
(4, 8, 9, 22, NULL, 'Iphone 6', 'আইফোন-৬', 'iphone-6', 'আইফোন-৬', '123', '0', 'Iphone 6', 'আইফোন-৬', 'm,l', 'মিডিয়াম,বড়', 'white,black,blue', 'সাদা ,কালো,নীল', '25520', NULL, 'Search for: What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?', 'নো মাস্ক নো সার্ভিস। করোনাভাইরাসের বিস্তার রোধে এখনই ডাউনলোড করুন Corona Tracer BD অ্যাপ। ডাউনলোড করতে ক্লিক করুন https://bit.ly/coronatracerbd। নিজে সুরক্ষিত থাকুন অন্যকেও নিরাপদ রাখুন।', 'Search for: What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?', 'নো মাস্ক নো সার্ভিস। করোনাভাইরাসের বিস্তার রোধে এখনই ডাউনলোড করুন Corona Tracer BD অ্যাপ।ডাউনলোড করতে ক্লিক করুন https://bit.ly/coronatracerbd। নিজে সুরক্ষিত থাকুন অন্যকেও নিরাপদ রাখুন।', 'public/frontend/images/products/product-thambail/1694213195749835.png', 'public/frontend/images/products/product-thambail/1694213195815431.jpg', NULL, NULL, NULL, 1, 1, '2021-03-14 07:13:32', '2021-03-21 12:14:30'),
(5, 6, 13, 28, NULL, 'Samsung', 'সামসাং', 'samsung', 'সামসাং', '654', '50', 'hijab', 'হিজাব', 'meddium,large,small', 'মাঝারী,বড় ,ছোট', 'red,white,blue,green', 'লাল,সাদা,নীল,গ্রীন', '15000', '13850', 'hijab', 'হিজাব', 'hijab', 'হিজাব', 'public/frontend/images/products/product-thambail/1695726942970454.jpg', 'public/frontend/images/products/product-thambail/1695726956617280.jpg', 1, 1, NULL, NULL, 1, '2021-03-14 07:16:50', '2021-04-01 10:28:09'),
(7, 8, 14, 22, 20, 'Olive Oil', 'প্রাকৃতিক তৈল', 'olive-oil', 'প্রাকৃতিক-তৈল', '141', '47', 'Olive Oil', 'প্রাকৃতিক তৈল', NULL, NULL, NULL, NULL, '1130', '999', 'Olive Oil', 'প্রাকৃতিক তৈল', 'Olive Oil', 'প্রাকৃতিক তৈল', 'public/frontend/images/products/product-thambail/1694213930715537.jpg', 'public/frontend/images/products/product-thambail/1694213930764159.jpg', 1, 1, 1, NULL, 1, '2021-03-14 07:25:12', '2021-06-06 02:08:58'),
(8, 1, 10, 22, 20, 'natural Honey', 'প্রাকৃতিক মধু', 'natural-honey', 'প্রাকৃতিক-মধু', '101', '145', 'Honey', 'প্রাকৃতিক মধু', NULL, NULL, NULL, NULL, '852', '650', 'natural Honey', 'প্রাকৃতিক মধু', 'natural Honey', 'প্রাকৃতিক মধু', 'public/frontend/images/products/product-thambail/1700279584238136.jpg', 'public/frontend/images/products/product-thambail/1694230798811460.jpg', 1, 1, 1, 1, 1, '2021-06-05 13:20:01', '2021-06-06 02:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `status` enum('pending','approve') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `user_id`, `product_id`, `comment`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 7, 're', 5, 'approve', '2021-05-19 00:06:17', '2021-05-19 06:33:12'),
(3, 4, 7, 'nice products', 3, 'approve', '2021-05-19 00:31:24', NULL),
(5, 4, 7, 'ami product ta somoy moto hate paisi ai jonno managemant a onek donnobad', 4, 'approve', '2021-05-19 06:35:17', '2021-06-05 09:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(8, 'Author', '2021-06-12 14:35:55', '2021-06-12 14:35:55'),
(9, 'Editor', '2021-06-12 14:36:11', '2021-06-12 14:36:11'),
(10, 'Administrator', '2021-06-12 14:36:33', '2021-06-12 14:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `ship_districts`
--

CREATE TABLE `ship_districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_districts`
--

INSERT INTO `ship_districts` (`id`, `division_id`, `district_name_en`, `district_name_bn`, `created_at`, `updated_at`) VALUES
(1, 1, 'narayanganj', 'নারায়ন গঞ্জ', '2021-04-04 06:07:35', '2021-04-04 06:55:54'),
(4, 1, 'gazipur', 'গাজীপুর', '2021-04-04 07:53:26', NULL),
(5, 1, 'monshigonj', 'মন্সিগঞ্জ', '2021-04-04 07:54:08', NULL),
(6, 5, 'cox\'bazar', 'কক্সবাজার', '2021-04-04 11:10:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_divisions`
--

CREATE TABLE `ship_divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_divisions`
--

INSERT INTO `ship_divisions` (`id`, `division_name_en`, `division_name_bn`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', 'ঢাকা', '2021-04-04 05:16:34', NULL),
(3, 'sylet', 'সিলেট', '2021-04-04 05:42:32', NULL),
(4, 'rajshahi', 'রাজশাহী', '2021-04-04 05:43:41', NULL),
(5, 'Chittagang', 'চট্রগ্রাম', '2021-04-04 05:44:30', NULL),
(6, 'barishal', 'বরিশাল', '2021-04-04 05:44:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_states`
--

CREATE TABLE `ship_states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL,
  `state_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ship_states`
--

INSERT INTO `ship_states` (`id`, `division_id`, `district_id`, `state_name_en`, `state_name_bn`, `created_at`, `updated_at`) VALUES
(2, 1, 4, 'sreepur', 'শ্রীপুর', '2021-04-04 07:54:34', NULL),
(5, 1, 5, 'sodar', 'সদর', '2021-04-05 14:24:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_bn` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_image`, `title_en`, `title_bn`, `description_en`, `description_bn`, `status`, `created_at`, `updated_at`) VALUES
(1, 'public/frontend/images/slider/1694210772936843.jpg', '50 % offer', '৫০ % ছাড়', 'Fresh Vegetables', 'সতেজ শাকসবজি', '1', '2021-03-14 06:35:01', NULL),
(2, 'public/frontend/images/slider/1694234711377115.jpg', '40 % offer', '৪০ % ছাড়', 'Orange Juice', 'ওরেন্জ জুস', '1', '2021-03-14 12:55:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name_en`, `subcategory_name_bn`, `subcategory_slug_en`, `subcategory_slug_bn`, `created_at`, `updated_at`) VALUES
(21, 9, 'Mens Watch', 'পুরুষের গড়ি', 'mens-watch', 'পুরুষের-গড়ি', '2021-03-13 12:12:45', NULL),
(22, 9, 'laptop', 'ল্যাবটপ', 'laptop', 'ল্যাবটপ', '2021-03-13 12:14:03', NULL),
(23, 14, 'natural honey', 'প্রাকৃতিক মধু', 'natural-honey', 'প্রাকৃতিক-মধু', '2021-03-13 12:15:02', NULL),
(24, 14, 'natural oil', 'জলজাইয়ের তৈল', 'natural-oil', 'জলজাইয়ের-তৈল', '2021-03-13 12:15:38', NULL),
(25, 10, 'Mens Watch', 'পুরুষের গড়ি', 'mens-watch', 'পুরুষের-গড়ি', '2021-03-13 12:16:08', '2021-03-14 07:06:08'),
(26, 10, 'womens watch', 'মহিলা গড়ি', 'womens-watch', 'মহিলা-গড়ি', '2021-03-13 12:16:26', NULL),
(27, 13, 'pants', 'প্যান্টস', 'pants', 'প্যান্টস', '2021-03-13 12:16:51', NULL),
(28, 13, 'Kids Item', 'শিশুদের আইটেম', 'kids-item', 'শিশুদের-আইটেম', '2021-03-13 12:17:21', NULL),
(29, 15, 'Fast Food', 'ফাস্ট ফুড', 'fast-food', 'ফাস্ট-ফুড', '2021-03-17 23:33:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subsubcategories`
--

CREATE TABLE `subsubcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subsubcategory_slug_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subsubcategories`
--

INSERT INTO `subsubcategories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name_en`, `subsubcategory_name_bn`, `subsubcategory_slug_en`, `subsubcategory_slug_bn`, `created_at`, `updated_at`) VALUES
(14, 9, 21, 'Digital Watch', 'ডিজিটাল গড়ি', 'digital-watch', 'ডিজিটাল-গড়ি', '2021-03-13 12:17:50', NULL),
(15, 10, 25, 'smart watch', 'স্মার্ট গড়ি', 'smart-watch', 'স্মার্ট-গড়ি', '2021-03-13 12:18:46', NULL),
(16, 14, 23, 'natural Honey', 'প্রাকৃতিক মধু', 'natural-honey', 'প্রাকৃতিক-মধু', '2021-03-13 12:19:22', NULL),
(17, 13, 28, 'panjabi', 'পান্জাবী', 'panjabi', 'পান্জাবী', '2021-03-13 12:21:03', NULL),
(18, 13, 27, 'gins pants', 'জিন্স', 'gins-pants', 'জিন্স', '2021-03-13 12:21:33', NULL),
(19, 9, 22, 'mouse', 'মাউস', 'mouse', 'মাউস', '2021-03-13 12:22:30', NULL),
(20, 9, 22, 'keyboard', 'কিবোর্ড', 'keyboard', 'কিবোর্ড', '2021-03-13 12:22:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inban` tinyint(4) NOT NULL DEFAULT 0,
  `last_seen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `social_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `inban`, `last_seen`, `name`, `email`, `phone`, `image`, `email_verified_at`, `password`, `provider`, `provider_id`, `remember_token`, `created_at`, `updated_at`, `social_id`, `social_type`) VALUES
(1, 1, '2021-06-05 19:44:44', 'mazharul islam', 'eng.mazharul2@gmail.com', '+088*********', 'public/frontend/assets/images/user/1693675798385394.png', NULL, '$2y$10$UzJnOMdJXR.AQIFZzW8cOenjXOnZH7OZ4TOfHvaJQpehrf5Xi1iR6', 'google', '106191842067101463999', 'f9cDs7BFt7jlDvmfi41WEBBoBmNkJHUH8WyJakO3MNP1ibRvniJcNtOZKzVS', '2021-03-07 11:54:23', '2021-06-05 13:44:44', NULL, NULL),
(4, 0, '2021-08-05 16:53:41', 'Emon Ahmed', 'user@gmail.com', '01716448668', 'public/frontend/assets/images/user/1698136050825223.png', NULL, '$2y$10$qo2ah.yPSXOzZjkHKO.7ze.TWMnr0tYoA2le6BRknpuajisWhtp6e', NULL, NULL, 'sb7z9dgWVcoEQiJwKh2hI8Qf8eQoJ1mlnTOlsNGYgcX855OqjYo5MgT9zEhH', '2021-03-07 12:49:34', '2021-08-05 10:53:41', NULL, NULL),
(16, 0, NULL, 'Muhammad Mazharul Islam', 'eng.emonahmed123@gmail.com', '+088*********', 'public/frontend/pp.png', NULL, '$2y$10$QI.V3DfJo5wQ0B1JX7tgseyEqOcXh6ZQbeDoS/qvOQfDFSnoNdNGm', 'facebook', '3033245546999294', NULL, '2021-05-20 05:53:22', '2021-05-20 05:53:22', NULL, NULL),
(18, 0, NULL, 'Maisha', 'maisha@gmail.com', '01234567893', 'public/frontend/pp.png', NULL, '$2y$10$1x20zyBVTLdsrloMJwXfTuF3Sp.rHsS08YhqfohNhUiA/ntCmIdU.', NULL, NULL, NULL, '2021-05-20 06:01:29', '2021-05-20 06:01:29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wisthlishts`
--

CREATE TABLE `wisthlishts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wisthlishts`
--

INSERT INTO `wisthlishts` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(33, 1, 4, '2021-04-01 10:45:31', NULL),
(34, 1, 8, '2021-04-01 10:45:38', NULL),
(53, 4, 5, '2021-04-22 11:42:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_pages`
--
ALTER TABLE `about_pages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muli_imgs`
--
ALTER TABLE `muli_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_cart_pages`
--
ALTER TABLE `my_cart_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_reviews_user_id_foreign` (`user_id`),
  ADD KEY `product_reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_districts`
--
ALTER TABLE `ship_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_divisions`
--
ALTER TABLE `ship_divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_states`
--
ALTER TABLE `ship_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subsubcategories`
--
ALTER TABLE `subsubcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wisthlishts`
--
ALTER TABLE `wisthlishts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_pages`
--
ALTER TABLE `about_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `muli_imgs`
--
ALTER TABLE `muli_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `my_cart_pages`
--
ALTER TABLE `my_cart_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ship_districts`
--
ALTER TABLE `ship_districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ship_divisions`
--
ALTER TABLE `ship_divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ship_states`
--
ALTER TABLE `ship_states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `subsubcategories`
--
ALTER TABLE `subsubcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `wisthlishts`
--
ALTER TABLE `wisthlishts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD CONSTRAINT `product_reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
