-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2018 at 05:42 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `viswappn_viswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `answer_id` varchar(25) NOT NULL,
  `mobile_number` varchar(25) NOT NULL,
  `question_id` int(11) UNSIGNED NOT NULL,
  `answer` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer_id`, `mobile_number`, `question_id`, `answer`, `created_at`, `updated_at`) VALUES
(1, '1', '9789108964', 1, 'Excellent', '2018-10-04 04:07:29', '2018-10-04 04:07:29'),
(2, '1', '9789108964', 2, 'Good', '2018-10-04 04:07:29', '2018-10-04 04:07:29'),
(3, '1', '9789108964', 3, 'Not So Good', '2018-10-04 04:07:29', '2018-10-04 04:07:29'),
(4, '1', '9789108964', 4, 'Excellent', '2018-10-04 04:07:29', '2018-10-04 04:07:29'),
(5, '1', '9789108964', 5, 'Good', '2018-10-04 04:07:29', '2018-10-04 04:07:29'),
(6, '1', '9789108964', 6, 'Not So Good', '2018-10-04 04:07:29', '2018-10-04 04:07:29'),
(7, '1', '9789108964', 7, 'Service', '2018-10-04 04:07:29', '2018-10-04 04:07:29'),
(8, '1', '9789108964', 8, 'This is test process ranga', '2018-10-04 04:07:29', '2018-10-04 04:07:29'),
(9, '2', '9789108964', 1, 'Excellent', '2018-10-30 03:37:33', '2018-10-30 03:37:33'),
(10, '2', '9789108964', 2, 'Good', '2018-10-30 03:37:33', '2018-10-30 03:37:33'),
(11, '2', '9789108964', 3, 'Not So Good', '2018-10-30 03:37:33', '2018-10-30 03:37:33'),
(12, '2', '9789108964', 4, 'Excellent', '2018-10-30 03:37:33', '2018-10-30 03:37:33'),
(13, '2', '9789108964', 5, 'Good', '2018-10-30 03:37:33', '2018-10-30 03:37:33'),
(14, '2', '9789108964', 6, 'Not So Good', '2018-10-30 03:37:33', '2018-10-30 03:37:33'),
(15, '2', '9789108964', 7, 'Service', '2018-10-30 03:37:33', '2018-10-30 03:37:33'),
(16, '2', '9789108964', 8, 'This is test process ranga', '2018-10-30 03:37:33', '2018-10-30 03:37:33'),
(17, '3', '9789108964', 1, 'Excellent', '2018-10-30 03:38:12', '2018-10-30 03:38:12'),
(18, '3', '9789108964', 2, 'Good', '2018-10-30 03:38:12', '2018-10-30 03:38:12'),
(19, '3', '9789108964', 3, 'Not So Good', '2018-10-30 03:38:13', '2018-10-30 03:38:13'),
(20, '3', '9789108964', 4, 'Excellent', '2018-10-30 03:38:13', '2018-10-30 03:38:13'),
(21, '3', '9789108964', 5, 'Good', '2018-10-30 03:38:13', '2018-10-30 03:38:13'),
(22, '3', '9789108964', 6, 'Not So Good', '2018-10-30 03:38:13', '2018-10-30 03:38:13'),
(23, '3', '9789108964', 7, 'Service', '2018-10-30 03:38:13', '2018-10-30 03:38:13'),
(24, '3', '9789108964', 8, 'This is test process ranga', '2018-10-30 03:38:13', '2018-10-30 03:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rings', '1507715415.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2017-08-31 13:00:00', '2017-10-11 04:20:15'),
(2, 'Earrings', '1507803113.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2017-09-20 13:00:00', '2017-10-12 04:41:53'),
(3, 'Bangles', '1507715547.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2017-09-13 13:00:00', '2017-10-11 04:22:27'),
(4, 'Necklaces', '1507803095.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2017-09-19 13:00:00', '2017-10-12 04:41:35'),
(5, 'Bracelets', '1507725715.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2017-09-20 23:06:13', '2017-10-11 07:11:55'),
(6, 'Hip Chain', '1507725394.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2017-09-21 01:04:25', '2017-10-11 07:06:34'),
(7, 'Pendants', '1507803067.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2017-10-12 00:14:57', '2017-10-12 04:41:07'),
(8, 'Ranga', '1538637589.png', 'This is test process', 1, '2018-10-04 01:28:59', '2018-10-04 01:49:49');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city_name` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `created_at`, `updated_at`) VALUES
(1, 'Coimbatore', '2018-05-02 12:35:50', '2018-05-22 18:30:00'),
(2, 'Chennai', '2018-05-02 12:35:56', '2018-05-23 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_number` varchar(12) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `password`, `mobile_number`, `email_id`, `created_at`, `updated_at`) VALUES
(1, 'rangasamy', '$2y$10$QkE2mD1YiLVPMg/t8Bg/W.dyTVI4RizLUB.up6X3u6I/ZojdQmthm', '9566309844', 'rangasamy.456@gmail.com', '2018-01-02 04:36:23', '2018-01-03 01:42:39'),
(2, 'Happy labs', '$2y$10$XeFFcSm3dhfcna4LY6.svuzmonYeY8nrlVBntDJI1FmzgBsKhkuDe', '9789108964', 'ben@gmail.com', '2018-01-02 07:38:44', '2018-01-02 07:38:44'),
(3, 'gen', '$2y$10$6oWU2P/XlD82AfZP2FgKeO/9SRsPX1qXM2RdTHQZ3x9YNjtuL0Dka', '9894567890', 'email@gmail.com', '2018-01-02 07:53:32', '2018-01-02 07:53:32'),
(4, 'Ben', '$2y$10$3uGEjeaUG1fJnXJ4ut/YNONvWtvsvM6tj6uLCSfOlisBMEVxkswPO', '9894460030', 'sen@gmail.com', '2018-01-02 07:59:30', '2018-01-02 07:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `expo_customers`
--

CREATE TABLE `expo_customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(250) DEFAULT NULL,
  `mobile_number` varchar(10) DEFAULT NULL,
  `email_id` varchar(250) NOT NULL,
  `city` varchar(250) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `comments` text,
  `know_about` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `expo_customers`
--

INSERT INTO `expo_customers` (`id`, `customer_name`, `mobile_number`, `email_id`, `city`, `status`, `comments`, `know_about`, `created_at`, `updated_at`) VALUES
(1, 'rangasamy', '9789108964', 'rangasamy@thegang.in', 'coimbatore', 'yes', 'this is test', 'facebook', '2018-10-25 02:23:00', '2018-10-25 02:23:00'),
(2, 'rangasamy', '9789108965', 'rangasamy@thegan1g.in', 'coimbatore', 'yes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'news papper', '2018-10-29 06:29:46', '2018-10-29 06:29:46'),
(3, 'rangasamy', '9789108966', 'rangasamy@thegang1.in', 'coimbatore', 'yes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'twiiter', '2018-10-30 00:00:00', '2018-10-30 00:00:00'),
(4, 'rangasamy', '9789108967', 'rangasamy@thegang2.in', 'coimbatore', 'yes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'internet', '2018-10-30 00:02:34', '2018-10-30 00:02:34');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_ratings`
--

CREATE TABLE `feedback_ratings` (
  `id` int(11) UNSIGNED NOT NULL,
  `answer_id` int(11) UNSIGNED NOT NULL,
  `customer_name` varchar(250) DEFAULT NULL,
  `mobile_number` varchar(12) DEFAULT NULL,
  `staff_name` varchar(250) DEFAULT NULL,
  `city_id` tinyint(4) UNSIGNED DEFAULT NULL,
  `ratings` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `feedback_ratings`
--

INSERT INTO `feedback_ratings` (`id`, `answer_id`, `customer_name`, `mobile_number`, `staff_name`, `city_id`, `ratings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Vimal', '9789108964', 'Rangasamy', 1, 5, '2018-10-04 04:07:29', '2018-10-04 04:07:29'),
(2, 2, 'Vimal', '9789108964', 'Rangasamy', 1, 5, '2018-10-30 03:37:33', '2018-10-30 03:37:33'),
(3, 3, 'Vimal', '9789108964', 'Rangasamy', 2, 3, '2018-10-30 03:38:13', '2018-10-30 03:38:13');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(35, '2014_10_12_000000_create_users_table', 1),
(36, '2014_10_12_100000_create_password_resets_table', 1),
(37, '2017_09_21_073846_create_categories_table', 1),
(38, '2017_09_21_074130_create_products_table', 1),
(39, '2018_04_30_052514_create_sales_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) UNSIGNED NOT NULL,
  `question_id` int(11) UNSIGNED NOT NULL,
  `option` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `option`, `created_at`, `updated_at`) VALUES
(1, 1, 'Already Existing Customer', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(2, 1, 'Referred by Friends', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(3, 1, 'Media Advertisement', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(4, 1, 'Facebook/Website', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(5, 1, 'Any Other', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(6, 2, 'Excellent', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(7, 2, 'Good', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(8, 2, 'Not So Good', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(9, 3, 'Excellent', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(10, 3, 'Good', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(11, 3, 'Not So Good', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(12, 4, 'Excellent', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(13, 4, 'Good', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(14, 4, 'Not So Good', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(15, 5, 'Excellent', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(16, 5, 'Good', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(17, 5, 'Not So Good', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(18, 6, 'Excellent', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(19, 6, 'Good', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(20, 6, 'Not So Good', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(21, 7, 'Excellent', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(22, 7, 'Good', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(23, 7, 'Not So Good', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(24, 8, 'Collection & Quality of jewels', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(25, 8, 'Service', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(26, 8, 'Both', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(27, 8, 'Any Others', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(28, 9, 'Yes', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(29, 9, 'No', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(30, 10, 'Yes', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(31, 10, 'No', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(32, 11, 'Yes', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(33, 11, 'No', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(34, 12, 'Yes', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(35, 12, 'No', '2018-07-27 07:30:00', '2018-07-27 07:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `city_id` int(11) UNSIGNED NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_ios_img_small` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_ios_img_large` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diamond_wt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `diamond_pcs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `carat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stone_wt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stone_pcs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gross_wt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_code`, `category_id`, `city_id`, `description`, `product_ios_img_small`, `product_ios_img_large`, `diamond_wt`, `diamond_pcs`, `carat`, `kt`, `weight`, `stone_wt`, `stone_pcs`, `gross_wt`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ring3', 'VDFB - 1301', 1, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507783971.jpg', 'lg_1507783971.jpg', NULL, NULL, '45', '95', '28', NULL, NULL, NULL, 'ring3', 1, '2017-10-02 23:34:50', '2018-10-09 23:41:57'),
(2, 'Ring2', 'VDFB - 1302', 1, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507730577.jpg', 'lg_1507730577.jpg', NULL, NULL, '36', '48', '75', NULL, NULL, NULL, 'ring2', 1, '2017-10-02 23:34:00', '2018-08-31 01:53:53'),
(3, 'Ring1', 'VDFB - 1303', 1, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507784037.jpg', 'lg_1507784037.jpg', NULL, NULL, '36', '48', '75', NULL, NULL, NULL, 'ring1', 1, '2017-10-02 23:33:06', '2017-10-11 17:53:57'),
(4, 'Bracelet3', 'VDFB - 1304', 5, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507784082.jpg', 'lg_1507784082.jpg', NULL, NULL, '30', '48', '190', NULL, NULL, NULL, 'bracelet3', 1, '2017-10-02 23:32:09', '2017-10-11 17:54:42'),
(5, 'Bracelet2', 'VDFB - 1305', 5, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507784121.jpg', 'lg_1507784121.jpg', NULL, NULL, '36', '25', '39', NULL, NULL, NULL, 'bracelet2', 1, '2017-10-02 23:31:41', '2017-10-11 17:55:21'),
(6, 'Bracelet1', 'VDFB - 1306', 5, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507784777.jpg', 'lg_1507784777.jpg', NULL, NULL, '30', '24', '60', NULL, NULL, NULL, 'bracelet1', 1, '2017-10-02 23:31:12', '2017-10-11 18:06:17'),
(7, 'Bangle3', 'VDFB - 1307', 3, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507784315.jpg', 'lg_1507784315.jpg', NULL, NULL, '36', '74', '40', NULL, NULL, NULL, 'bangle3', 1, '2017-10-02 23:30:32', '2017-10-11 17:58:35'),
(8, 'Bangle2', 'VDFB - 1308', 3, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507785029.jpg', 'lg_1507785029.jpg', NULL, NULL, '36', '25', '69', NULL, NULL, NULL, 'bangle2', 1, '2017-10-02 23:30:06', '2017-10-11 18:10:29'),
(9, 'Bangle1', 'VDFB - 1309', 3, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507785058.jpg', 'lg_1507785058.jpg', NULL, NULL, '23', '62', '25', NULL, NULL, NULL, 'bangle1', 1, '2017-10-02 23:29:37', '2017-10-11 18:10:58'),
(10, 'Pendants1', 'VDFB- 1199', 7, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507788515.jpg', 'lg_1507788515.jpg', NULL, NULL, '25', '15', '98', NULL, NULL, NULL, 'pendants1', 1, '2017-10-11 19:08:36', '2017-10-11 19:09:02'),
(11, 'Pendants2', 'VDFB- 1200', 7, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507788678.jpg', 'lg_1507788678.jpg', NULL, NULL, '42', '26', '35', NULL, NULL, NULL, 'pendants2', 1, '2017-10-11 19:11:18', '2017-10-11 19:11:29'),
(12, 'Pendants3', 'VDFB- 1201', 7, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507788765.jpg', 'lg_1507788765.jpg', NULL, NULL, '25', '36', '48', NULL, NULL, NULL, 'pendants3', 1, '2017-10-11 19:12:45', '2017-10-11 23:23:51'),
(13, 'Hipchain1', 'VDFB- 1202', 6, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507788859.jpg', 'lg_1507788859.jpg', NULL, NULL, '45', '74', '68', NULL, NULL, NULL, 'hipchain1', 1, '2017-10-11 19:14:19', '2017-10-11 23:24:19'),
(14, 'Necklaces1', 'VDFB- 1203', 4, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507789082.jpg', 'lg_1507789082.jpg', NULL, NULL, '45', '85', '56', NULL, NULL, NULL, 'necklaces1', 1, '2017-10-11 19:18:02', '2017-10-11 19:18:02'),
(15, 'Necklaces2', 'VDFB- 1204', 4, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507789145.jpg', 'lg_1507789145.jpg', NULL, NULL, '45', '25', '62', NULL, NULL, NULL, 'necklaces2', 1, '2017-10-11 19:19:05', '2017-10-11 19:19:05'),
(16, 'Necklaces3', 'VDFB- 1205', 4, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507789258.jpg', 'lg_1507789258.jpg', NULL, NULL, '45', '52', '62', NULL, NULL, NULL, 'necklaces3', 1, '2017-10-11 19:20:58', '2017-10-11 23:24:42'),
(17, 'Earrings1', 'VDFB- 1206', 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507789458.jpg', 'lg_1507789458.jpg', NULL, NULL, '15', '47', '25', NULL, NULL, NULL, 'earrings1', 1, '2017-10-11 19:24:18', '2017-10-11 19:24:18'),
(18, 'Earrings2', 'VDFB- 1207', 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507789515.jpg', 'lg_1507789515.jpg', NULL, NULL, '45', '25', '63', NULL, NULL, NULL, 'earrings2', 1, '2017-10-11 19:25:15', '2017-10-11 19:25:37'),
(19, 'Earrings3', 'VDFB- 1208', 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507789599.jpg', 'lg_1507789599.jpg', NULL, NULL, '25', '36', '24', NULL, NULL, NULL, 'earrings3', 1, '2017-10-11 19:26:39', '2017-10-11 23:25:04'),
(20, 'Ring4', 'VDFB - 1301', 1, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507730579.jpg', 'lg_1507730579.jpg', NULL, NULL, '45', '95', '28', NULL, NULL, NULL, 'ring3', 1, '2018-09-11 18:04:50', '2018-09-11 18:04:50'),
(21, 'Ring5', 'VDFB - 1301', 1, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507730580.jpg', 'lg_1507730580.jpg', NULL, NULL, '50', '95', '75', NULL, NULL, NULL, 'ring3', 1, '2018-09-11 18:04:50', '2018-09-11 18:04:50'),
(22, 'Bangle5', 'VDFB - 1306', 3, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507784778.jpg', 'lg_1507784778.jpg', NULL, NULL, '30', '24', '60', NULL, NULL, NULL, 'bangle5', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Bangle6', 'VDFB - 1307', 3, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507784779.jpg', 'lg_1507784779.jpg', NULL, NULL, '36', '74', '40', NULL, NULL, NULL, 'bangle6', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Bangle7', 'VDFB - 1308', 3, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507784780.jpg', 'lg_1507784780.jpg', NULL, NULL, '36', '25', '69', NULL, NULL, NULL, 'bangle7', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 'Bangle8', 'VDFB - 1309', 3, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507784781.jpg', 'lg_1507784781.jpg', NULL, NULL, '23', '62', '25', NULL, NULL, NULL, 'bangle8', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Bangle9', 'VDFB- 1199', 3, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507784782.jpg', 'lg_1507784782.jpg', NULL, NULL, '25', '15', '98', NULL, NULL, NULL, 'bangle9', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 'Bangle10', 'VDFB- 1200', 3, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507784783.jpg', 'lg_1507784783.jpg', NULL, NULL, '42', '26', '35', NULL, NULL, NULL, 'bangle10', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'Earrings5', 'VDFB - 1306', 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1508730580.jpg', 'lg_1508730580.jpg', NULL, NULL, '30', '24', '60', NULL, NULL, NULL, 'earrings5', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 'Earrings6', 'VDFB - 1307', 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1508730581.jpg', 'lg_1508730581.jpg', NULL, NULL, '36', '74', '40', NULL, NULL, NULL, 'earrings6', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 'Earrings7', 'VDFB - 1308', 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1508730582.jpg', 'lg_1508730582.jpg', NULL, NULL, '36', '25', '69', NULL, NULL, NULL, 'earrings7', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 'Earrings8', 'VDFB - 1309', 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1508730583.jpg', 'lg_1508730583.jpg', NULL, NULL, '23', '62', '25', NULL, NULL, NULL, 'earrings8', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'Earrings9', 'VDFB- 1199', 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1508730584.jpg', 'lg_1508730584.jpg', NULL, NULL, '25', '15', '98', NULL, NULL, NULL, 'earrings9', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'Earrings10', 'VDFB- 1200', 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1508730585.jpg', 'lg_1508730585.jpg', NULL, NULL, '42', '26', '35', NULL, NULL, NULL, 'earrings10', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'Earrings11', 'VDFB- 1201', 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1508730586.jpg', 'lg_1508730586.jpg', NULL, NULL, '25', '36', '48', NULL, NULL, NULL, 'earrings11', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 'Earrings12', 'VDFB - 1301', 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1508730587.jpg', 'lg_1508730587.jpg', NULL, NULL, '23', '62', '25', NULL, NULL, NULL, 'earrings12', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 'Earrings13', 'VDFB - 1302', 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1508730588.jpg', 'lg_1508730588.jpg', NULL, NULL, '25', '15', '98', NULL, NULL, NULL, 'earrings13', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 'Earrings14', 'VDFB - 1303', 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1508730589.jpg', 'lg_1508730589.jpg', NULL, NULL, '42', '26', '35', NULL, NULL, NULL, 'earrings14', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 'Earrings15', 'VDFB - 1304', 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1508730590.jpg', 'lg_1508730590.jpg', NULL, NULL, '25', '36', '48', NULL, NULL, NULL, 'earrings15', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 'Earrings16', 'VDFB - 1305', 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1508730591.jpg', 'lg_1508730591.jpg', NULL, NULL, '30', '24', '60', NULL, NULL, NULL, 'earrings16', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'Earrings17', 'VDFB - 1306', 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1508730592.jpg', 'lg_1508730592.jpg', NULL, NULL, '36', '74', '40', NULL, NULL, NULL, 'earrings17', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 'Necklaces4', 'VDFB - 1307', 4, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1508730593.jpg', 'lg_1508730593.jpg', NULL, NULL, '36', '25', '69', NULL, NULL, NULL, 'necklaces4', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'Necklaces5', 'VDFB - 1308', 4, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1508730594.jpg', 'lg_1508730594.jpg', NULL, NULL, '23', '62', '25', NULL, NULL, NULL, 'necklaces5', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'Necklaces6', 'VDFB - 1309', 4, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1508730595.jpg', 'lg_1508730595.jpg', NULL, NULL, '23', '62', '25', NULL, NULL, NULL, 'necklaces6', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'Ring3333', 'VDFB - 1301', 1, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'sm_1507783971.jpg', 'lg_1507783971.jpg', '50', '25', '45', '95', '28', '20', '25', '35', 'ring3333', 0, '2018-09-18 07:09:21', '2018-09-18 07:09:21'),
(46, 'ring-123', 'ring-456', 8, 1, 'This is test process', 'sm_1538636538.jpg', 'lg_1538636538.jpg', NULL, NULL, '32', '45', '78', NULL, NULL, NULL, 'ring-123', 1, '2018-10-04 01:32:18', '2018-10-15 22:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `text`, `created_at`, `updated_at`) VALUES
(1, 'How did you come to know About Viswa & Devji?', '2018-07-26 19:58:53', '2018-07-26 19:58:53'),
(2, 'How would you rate the Ambience of our Store?', '2018-07-23 15:31:43', '2018-07-23 15:31:43'),
(3, 'How would you rate the Collection and Desings @ our Store?', '2018-07-23 15:31:43', '2018-07-23 15:31:43'),
(4, 'What do you feel about the Quality of our Products?', '2018-07-23 15:31:43', '2018-07-23 15:31:43'),
(5, 'How do you feel about the Quality of services of our Staff?', '2018-07-23 15:31:43', '2018-07-23 15:31:43'),
(6, 'How do you rate our Staffs knowledge of the products?', '2018-07-23 15:31:43', '2018-07-23 15:31:43'),
(7, 'How do you feel the Overall Shopping Experience @ our store?', '2018-07-23 15:31:43', '2018-07-23 15:31:43'),
(8, 'If you are a Regular Customer, what makes you comeback again & again to Viswa & Devji Diamonds? ', '2018-07-23 15:31:43', '2018-07-23 15:31:43'),
(9, 'Would you Suggest our Brand to your Friends & Relations? If any, why?', '2018-07-23 15:31:43', '2018-07-23 15:31:43'),
(10, 'Do you want us to invite you for Movie nights?', '2018-07-23 15:31:43', '2018-07-23 15:31:43'),
(11, 'Do you want us to invite you for Instore events?', '2018-07-23 15:31:43', '2018-07-23 15:31:43'),
(12, 'Do you want us to invite you for Outdoor events?', '2018-07-23 15:31:43', '2018-07-23 15:31:43'),
(13, 'Valuable Suggestions to Improve Us?', '2018-07-23 15:31:43', '2018-07-23 15:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sale_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sales_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_service` date NOT NULL,
  `return_of_service` date NOT NULL,
  `username` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_number` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `purchase_id`, `sale_image`, `sales_id`, `date_of_service`, `return_of_service`, `username`, `mobile_number`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PUR001', NULL, 'SAL001', '1998-06-17', '1990-06-13', 'Rangasamy', '9789108964', 'This is test process', 'Pending', '2018-06-13 23:56:44', '2018-06-13 23:56:44'),
(2, 'PUR004', NULL, 'SAL002', '2018-05-21', '2018-07-17', 'sasfd', '9698450115', 'fdsafdsf', 'Pending', '2018-06-13 23:59:03', '2018-07-10 02:01:42'),
(3, 'PUR004', NULL, 'SAL003', '2018-05-21', '2018-07-17', 'Yuvraj', '9698450115', 'This is test', 'Completed', '2018-06-14 00:02:54', '2018-07-10 02:01:11'),
(4, 'PUR011', NULL, 'SAL004', '2018-07-10', '2018-07-10', 'rangasamy', '7010179652', 'this is test', 'Pending', '2018-07-10 02:07:38', '2018-07-10 02:07:38'),
(5, 'PUR011', '1531805660.jpg', 'SAL004', '2018-07-10', '2018-07-10', 'rangasamy', '7010179652', 'this is test', 'Completed', '2018-07-10 02:07:38', '2018-07-17 00:04:20'),
(6, 'pur008', '1531553900.jpg', 'SAL006', '2018-07-13', '2018-07-20', 'rangasamy', '9874511231321', NULL, 'Pending', '2018-07-14 01:12:04', '2018-07-14 02:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `staff_name` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `profile_image` varchar(250) DEFAULT NULL,
  `staff_id` varchar(250) NOT NULL,
  `city_id` tinyint(4) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `staff_name`, `position`, `profile_image`, `staff_id`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'Rangasamy', 'Senior Associative', '1507715415.png', 'CB001', 1, '2018-09-10 18:30:00', '2018-09-22 04:10:05'),
(2, 'Pragadeesh', 'Senior Associative', '1507715416.png', 'CB002', 1, '2018-09-10 18:30:00', '2018-09-11 18:30:00'),
(3, 'Tendulkar', 'Senior Associative', '1507715417.png', 'CH001', 1, '2018-09-22 00:50:02', '2018-09-22 00:50:02'),
(4, 'vimal', 'Senior Associative', '1507715418.png', 'CB003', 1, '2018-09-22 01:06:53', '2018-09-22 01:16:43'),
(8, 'Yuvraj', 'Senior Associative', '1507715419.png', 'CH002', 1, '2018-09-22 01:23:41', '2018-09-22 01:23:41'),
(9, 'Ranga', 'Senior Associative', '1507715415.png', 'CB001', 2, '2018-09-10 13:00:00', '2018-09-21 22:40:05'),
(10, 'sathish', 'Senior Associative', '1507715416.png', 'CB002', 2, '2018-09-10 13:00:00', '2018-09-11 13:00:00'),
(11, 'Murali', 'Senior Associative', '1507715417.png', 'CH001', 2, '2018-09-21 19:20:02', '2018-09-21 19:20:02'),
(12, 'tamil', 'Senior Associative', '1507715418.png', 'CB003', 1, '2018-09-21 19:36:53', '2018-09-21 19:46:43'),
(13, 'john', 'Senior Associative', '1538549028.png', 'CH002', 1, '2018-09-21 19:53:41', '2018-10-03 01:13:48'),
(14, 'siddarth', 'Senior Associative', '1538204792.jpg', 'CH005', 2, '2018-09-29 01:34:01', '2018-09-29 01:36:32'),
(15, 'Praveen', 'Senior Associative', '1538639268.png', 'cb010', 1, '2018-10-04 02:15:53', '2018-10-04 02:17:48'),
(16, 'Praveen.M', 'serinor associative', '1540808813.png', 'CB019', 1, '2018-10-29 04:56:53', '2018-10-29 04:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `staff_answers`
--

CREATE TABLE `staff_answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `answer_id` varchar(25) NOT NULL,
  `mobile_number` varchar(25) NOT NULL,
  `question_id` int(11) UNSIGNED NOT NULL,
  `answer` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `staff_answers`
--

INSERT INTO `staff_answers` (`id`, `answer_id`, `mobile_number`, `question_id`, `answer`, `created_at`, `updated_at`) VALUES
(1, '1', '9789108964', 1, 'Platinum', '2018-10-04 03:59:24', '2018-10-04 03:59:24'),
(2, '1', '9789108964', 2, 'No', '2018-10-04 03:59:24', '2018-10-04 03:59:24'),
(3, '1', '9789108964', 3, 'Three', '2018-10-04 03:59:24', '2018-10-04 03:59:24'),
(4, '1', '9789108964', 4, '10-15', '2018-10-04 03:59:24', '2018-10-04 03:59:24'),
(5, '1', '9789108964', 5, 'Tea', '2018-10-04 03:59:24', '2018-10-04 03:59:24'),
(6, '1', '9789108964', 6, 'Birthday', '2018-10-04 03:59:24', '2018-10-04 03:59:24'),
(7, '1', '9789108964', 7, 'Malayalam', '2018-10-04 03:59:24', '2018-10-04 03:59:24'),
(8, '1', '9789108964', 8, 'News paper', '2018-10-04 03:59:24', '2018-10-04 03:59:24'),
(9, '1', '9789108964', 9, 'ganga', '2018-10-04 03:59:25', '2018-10-04 03:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `staff_options`
--

CREATE TABLE `staff_options` (
  `id` int(11) UNSIGNED NOT NULL,
  `question_id` int(11) UNSIGNED NOT NULL,
  `option` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_options`
--

INSERT INTO `staff_options` (`id`, `question_id`, `option`, `created_at`, `updated_at`) VALUES
(1, 1, 'Diamond', '2018-07-27 13:00:00', '2018-07-27 13:00:00'),
(2, 1, 'Platinum', '2018-07-27 13:00:00', '2018-07-27 13:00:00'),
(3, 1, 'Gold', '2018-07-27 13:00:00', '2018-07-27 13:00:00'),
(4, 1, 'Silver', '2018-07-27 13:00:00', '2018-07-27 13:00:00'),
(5, 2, 'Yes', '2018-07-27 13:00:00', '2018-07-27 13:00:00'),
(6, 2, 'No', '2018-07-27 13:00:00', '2018-07-27 13:00:00'),
(7, 3, 'One', '2018-07-27 13:00:00', '2018-07-27 13:00:00'),
(8, 3, 'Two', '2018-07-27 13:00:00', '2018-07-27 13:00:00'),
(9, 3, 'Three', '2018-07-27 13:00:00', '2018-07-27 13:00:00'),
(10, 3, 'Four', '2018-07-27 13:00:00', '2018-07-27 13:00:00'),
(11, 3, 'Five and above', '2018-07-27 13:00:00', '2018-07-27 13:00:00'),
(12, 4, '1-5', '2018-07-27 13:00:00', '2018-07-27 13:00:00'),
(13, 4, '5-10', '2018-07-27 13:00:00', '2018-07-27 13:00:00'),
(14, 4, '10-15', '2018-07-27 13:00:00', '2018-07-27 13:00:00'),
(15, 5, 'Coffee', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(16, 5, 'Tea', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(17, 5, 'Cool drinks', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(18, 6, 'Wedding day', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(19, 6, 'Birthday', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(20, 7, 'English', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(21, 7, 'Tamil', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(22, 7, 'Malayalam', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(23, 7, 'Hindi', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(24, 8, 'Internet', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(25, 8, 'News paper', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(26, 8, 'TV', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(27, 8, 'Radio', '2018-07-27 07:30:00', '2018-07-27 07:30:00'),
(28, 9, 'Ranga', '2018-10-04 02:20:30', '2018-10-04 02:20:30'),
(29, 9, 'samy', '2018-10-04 02:20:30', '2018-10-04 02:20:30'),
(30, 9, 'ganga', '2018-10-04 02:20:30', '2018-10-04 02:20:30'),
(31, 9, 'Rangasamy', '2018-10-04 02:20:30', '2018-10-04 02:20:30');

-- --------------------------------------------------------

--
-- Table structure for table `staff_questions`
--

CREATE TABLE `staff_questions` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `staff_questions`
--

INSERT INTO `staff_questions` (`id`, `text`, `created_at`, `updated_at`) VALUES
(1, 'What Products did they use?', '2018-07-23 21:01:43', '2018-07-23 21:01:43'),
(2, 'were they happy with the collection?', '2018-07-23 21:01:43', '2018-07-23 21:01:43'),
(3, 'How many kids did they have?', '2018-07-23 21:01:43', '2018-07-23 21:01:43'),
(4, 'Age of kids?', '2018-07-23 21:01:43', '2018-07-23 21:01:43'),
(5, 'What did they drink?', '2018-07-23 21:01:43', '2018-07-23 21:01:43'),
(6, 'Did they come for an occasion?', '2018-07-23 21:01:43', '2018-07-23 21:01:43'),
(7, 'Language?', '2018-07-23 21:01:43', '2018-07-23 21:01:43'),
(8, 'How did they come to know us?', '2018-07-23 21:01:43', '2018-07-23 21:01:43'),
(9, 'What is you name?', '2018-10-04 02:20:29', '2018-10-04 02:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `staff_ratings`
--

CREATE TABLE `staff_ratings` (
  `id` int(11) UNSIGNED NOT NULL,
  `answer_id` int(11) UNSIGNED NOT NULL,
  `customer_name` varchar(250) DEFAULT NULL,
  `mobile_number` varchar(12) DEFAULT NULL,
  `staff_name` varchar(250) DEFAULT NULL,
  `city_id` varchar(250) DEFAULT NULL,
  `ratings` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `staff_ratings`
--

INSERT INTO `staff_ratings` (`id`, `answer_id`, `customer_name`, `mobile_number`, `staff_name`, `city_id`, `ratings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rangasamy', '9789108964', 'john', '1', 4, '2018-10-04 03:59:25', '2018-10-04 03:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `api_token` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_name`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$n/JaW.Fjz5dyK/IqtF9AW.cNB75NflmzU2RAHryUABsByan/Vglbi', 'Admin', NULL, 'cEeCChqlhPryOiV60KdFetjyBAl5uKE0Zew8JC4BL8kvFZ9miY3RQUONKTEA', '2017-09-29 04:39:39', '2017-09-29 04:39:39'),
(3, 'Super Admin', 'superadmin@gmail.com', '$2y$10$n/JaW.Fjz5dyK/IqtF9AW.cNB75NflmzU2RAHryUABsByan/Vglbi', 'superAdmin', NULL, 'qPSmJUYoJUfcTPFbTit4HmFDkIyx0z0cidty7oM3pgaMgkULNu6YWMvNMSk8', '2017-09-28 23:09:39', '2017-09-28 23:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` tinyint(4) NOT NULL,
  `state` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wedding` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `mobile_number`, `address`, `city_id`, `state`, `email`, `dob`, `wedding`, `created_at`, `updated_at`) VALUES
(1, 'Ranga', '9789108964', 'pappa naicken palayam', 1, 'Tamilnadu', 'ranga@thegang.in', '1985-10-04', '--', '2018-07-09 01:58:53', '2018-07-09 01:58:53'),
(2, 'Rangasamy', '9789108967', 'sdaf', 1, 'Tamilnadu', 'ranga2@thegang.in', '2018-07-20', '--', '2018-07-09 02:02:10', '2018-07-09 02:04:17'),
(3, 'Ranga', '8098454492', 'test', 1, 'Tamilnadu', 'ranga33@thegang.in', '2018-10-04', '2018-07-17', '2018-07-09 02:07:06', '2018-07-09 02:07:23'),
(4, 'Rangasamy', '7010179652', 'pappanaiken palayam', 1, 'tamilnadu', 'ranga1@thegang.in', '1998-12-05', '2017-10-25', '2018-07-23 04:44:55', '2018-07-23 04:44:55'),
(5, 'Ran', '978910852', 'pn palayam, coimbatore', 1, 'Tamilnadu', 'rabga@gmail.com', '1985-06-13', '2018-10-15', '2018-10-30 00:10:54', '2018-10-30 00:11:32'),
(6, 'Rangasamy', '9789108965', 'pappanaiken palayam', 1, 'tamilnadu', 'ranga12@thegang.in', '1998-10-25', '2017-10-25', '2018-10-30 00:54:16', '2018-10-30 00:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_histories`
--

CREATE TABLE `voucher_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voucher_histories`
--

INSERT INTO `voucher_histories` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '8', '0', '2018-10-12 19:33:37', '2018-10-12 19:33:37'),
(2, '8', '1', '2018-10-12 19:35:01', '2018-10-12 19:35:01'),
(3, '4', '1', '2018-10-12 19:38:21', '2018-10-12 19:38:21'),
(4, '6', '1', '2018-10-12 20:38:04', '2018-10-12 20:38:04'),
(5, '7', '1', '2018-10-14 17:28:16', '2018-10-14 17:28:16'),
(6, '8', '1', '2018-10-14 17:28:41', '2018-10-14 17:28:41'),
(7, '9', '0', '2018-10-14 17:36:50', '2018-10-14 17:36:50'),
(8, '9', '1', '2018-10-14 17:38:28', '2018-10-14 17:38:28'),
(9, '9', '1', '2018-10-14 17:39:15', '2018-10-14 17:39:15'),
(10, '1', '1', '2018-10-16 01:04:40', '2018-10-16 01:04:40'),
(11, '1', '1', '2018-10-16 01:47:59', '2018-10-16 01:47:59'),
(12, '1', '1', '2018-10-16 01:50:02', '2018-10-16 01:50:02'),
(13, '1', '1', '2018-10-16 01:52:57', '2018-10-16 01:52:57'),
(14, '1', '1', '2018-10-16 01:53:37', '2018-10-16 01:53:37'),
(15, '1', '1', '2018-10-17 05:10:13', '2018-10-17 05:10:13'),
(16, '1', '1', '2018-10-17 05:35:18', '2018-10-17 05:35:18'),
(17, '1', '1', '2018-10-17 05:38:11', '2018-10-17 05:38:11'),
(18, '1', '1', '2018-10-17 05:38:42', '2018-10-17 05:38:42'),
(19, '1', '1', '2018-10-17 05:39:23', '2018-10-17 05:39:23'),
(20, '1', '1', '2018-10-20 06:29:16', '2018-10-20 06:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_registers`
--

CREATE TABLE `voucher_registers` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` int(11) NOT NULL,
  `voucher` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voucher_count` int(11) NOT NULL,
  `redeem_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voucher_registers`
--

INSERT INTO `voucher_registers` (`id`, `firstname`, `lastname`, `email`, `mobile_number`, `check_in`, `gender`, `address`, `country`, `zipcode`, `voucher`, `voucher_count`, `redeem_count`, `created_at`, `updated_at`) VALUES
(1, 'Asdsad', 'Asdasd', 'pragadeesh@thegang.in', '3232432422', '2018-10-02', 'Male', 'qweewqqwe', 'Coimbatore', 232343, '79952959', 5, 13, '2018-10-11 22:46:08', '2018-10-20 06:29:16'),
(2, 'Asd', 'Asd', 'yuvaraj@thegang.in', '9876546514', '2018-10-05', 'Male', 'adasdsad', 'Coimbatore', 232343, '21054511', 0, 2, '2018-10-11 22:49:45', '2018-10-12 00:39:05'),
(3, 'Sasd', 'Asd', 'asdaWdzs@dsd.sd', '9875641654', '2018-10-12', 'Male', 'asdsa', 'Coimbatore', 234232, '25905508', 0, 1, '2018-10-12 02:17:09', '2018-10-12 19:37:59'),
(4, 'Asdsad', 'Asdsadas', 'dsadsads@fggf.ff', '3244242342', '2018-10-03', 'Male', 'dwasdasd', 'Coimbatore', 232343, '76962288', 0, 1, '2018-10-12 19:27:53', '2018-10-12 19:38:21'),
(6, 'Asdasd', 'Asdsada', 'pragadeesh@thegang.in', '1324234233', '2018-10-02', 'Male', '2343rewr43224', 'Coimbatore', 234234, '33640251', 0, 1, '2018-10-12 19:29:27', '2018-10-12 20:38:04'),
(7, 'Asdasd', 'Asdsada', 'pragadeeshssa@thegang.in', '1324333333', '2018-10-02', 'Male', '2343rewr43224', 'Coimbatore', 234234, '32622999', 1, 1, '2018-10-12 19:31:56', '2018-10-14 17:28:16'),
(8, 'Asdasd', 'Asdasdas', 'pragadeesweqwh@thegang.in', '9876555555', '2018-10-03', 'Male', 'asdasdas', 'Coimbatore', 232343, '81994830', 2, 1, '2018-10-12 19:33:37', '2018-10-14 17:28:41'),
(9, 'Ranga', 'Samy', 'ranga@thegang.in', '9789108964', '1985-05-14', 'Male', 'sample address', 'Coimbatore', 641444, '69674527', 0, 2, '2018-10-14 17:36:50', '2018-10-14 17:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `voucher_users`
--

CREATE TABLE `voucher_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voucher_users`
--

INSERT INTO `voucher_users` (`id`, `name`, `email`, `mobile_number`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pragadeesh', 'pragadeesh@thegang.in', '7548872319', '$2y$10$ognF9Rj86SBmwY/f9RZ.3.ZhzMU5LKaYY.jEB2cxuHj7BRQo2r8RC', 'wouPDOlh7FCRHJrOkbOXofKEhAHzv8LxS8MmJvvjOFqUuh59hvJWYNZ0wDVa', NULL, NULL),
(2, 'Asd', 'passionpraga@sadadaa.asd', '43242342423424', '23432ersfds', NULL, '2018-10-12 01:37:30', '2018-10-12 01:37:30'),
(4, 'Asd', 'passionpraga@sadadaa.asdas', '43242342423424', '23432ersfds', NULL, '2018-10-12 01:38:35', '2018-10-12 01:38:35'),
(5, 'Asdasd', 'asasdas', 'asdsadd', 'asdsadasd', NULL, '2018-10-12 01:40:06', '2018-10-12 01:40:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expo_customers`
--
ALTER TABLE `expo_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_ratings`
--
ALTER TABLE `feedback_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_answers`
--
ALTER TABLE `staff_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_options`
--
ALTER TABLE `staff_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_questions`
--
ALTER TABLE `staff_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_ratings`
--
ALTER TABLE `staff_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_token_unique` (`api_token`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher_histories`
--
ALTER TABLE `voucher_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher_registers`
--
ALTER TABLE `voucher_registers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voucher_registers_mobile_number_unique` (`mobile_number`);

--
-- Indexes for table `voucher_users`
--
ALTER TABLE `voucher_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `voucher_users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `expo_customers`
--
ALTER TABLE `expo_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `feedback_ratings`
--
ALTER TABLE `feedback_ratings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `staff_answers`
--
ALTER TABLE `staff_answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `staff_options`
--
ALTER TABLE `staff_options`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `staff_questions`
--
ALTER TABLE `staff_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `staff_ratings`
--
ALTER TABLE `staff_ratings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `voucher_histories`
--
ALTER TABLE `voucher_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `voucher_registers`
--
ALTER TABLE `voucher_registers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `voucher_users`
--
ALTER TABLE `voucher_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
