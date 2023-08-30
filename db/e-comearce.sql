-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 09:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-comearce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(5) UNSIGNED NOT NULL,
  `address1` varchar(128) NOT NULL,
  `address2` varchar(128) NOT NULL,
  `city` varchar(60) NOT NULL,
  `state` varchar(60) NOT NULL,
  `postcode` varchar(60) NOT NULL,
  `country` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`) VALUES
(11, 'Furniture', '1687113327_6ceee62e1d3c5817bb20.jpg', '2023-06-18 18:35:27'),
(12, 'Mens Shoes', '1687113346_f87747ee467ed6446db5.jpg', '2023-06-18 18:35:46'),
(13, 'Baby Diapers', '1687113364_5e985683b4cb64d08d3e.jpg', '2023-06-18 18:36:04'),
(14, 'Muslim wear', '1687113383_0ec29c2dd48f2938c0c2.jpg', '2023-06-18 18:36:23'),
(15, 'Televisions', '1687113409_8d911e90bc0c8abe1994.jpg', '2023-06-18 18:36:49'),
(16, 'Skin Care', '1687113590_55d489e5b26752622d38.jpg', '2023-06-18 18:39:50'),
(17, 'Smartphone', '1687113624_d6983ba8d70b3b4fb396.png', '2023-06-18 18:40:24'),
(19, 'Bodyspray', '1687113685_ab4a9db51e92105bba3b.jpg', '2023-06-18 18:41:25'),
(20, 'Headphone', '1687113724_529c7beeefbaf95cdd6a.jpg', '2023-06-18 18:42:04'),
(21, 'Watch', '1687113753_643c2e74dd86777f76ff.jpg', '2023-06-18 18:42:33'),
(22, 'Groceries', '1687114203_83ea47c3e9b98b7b96fb.jpg', '2023-06-18 18:50:03'),
(23, 'Refrigerator', '1687114287_4478bb725910f28c8696.png', '2023-06-18 18:51:27'),
(24, 'Camera', '1687114390_39add0aa53a79e684264.jpg', '2023-06-18 18:53:10'),
(25, 'Bags', '1687114469_5cd797db6754a121bfbc.jpg', '2023-06-18 18:54:29'),
(26, 'Women\'s & Girls\' Fashion', '1687114646_652e376e07fed5fa6a3a.jpg', '2023-06-18 18:57:26'),
(27, 'Men\'s & Boys\' Fashion', '1687114729_f958a7ee806848114c27.jpg', '2023-06-18 18:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(45, '2023-06-05-095826', 'App\\Database\\Migrations\\Users', 'default', 'App', 1687103848, 1),
(46, '2023-06-05-101503', 'App\\Database\\Migrations\\Categories', 'default', 'App', 1687103848, 1),
(47, '2023-06-05-101804', 'App\\Database\\Migrations\\Subcategories', 'default', 'App', 1687103849, 1),
(48, '2023-06-10-094226', 'App\\Database\\Migrations\\Products', 'default', 'App', 1687103849, 1),
(49, '2023-06-10-095351', 'App\\Database\\Migrations\\Images', 'default', 'App', 1687103850, 1),
(50, '2023-06-15-121007', 'App\\Database\\Migrations\\Profile', 'default', 'App', 1687103850, 1),
(51, '2023-06-17-123229', 'App\\Database\\Migrations\\AddImageToCategory', 'default', 'App', 1687103850, 1),
(52, '2023-06-18-114513', 'App\\Database\\Migrations\\CustomerAddressTable', 'default', 'App', 1687103850, 1),
(53, '2023-06-18-114552', 'App\\Database\\Migrations\\OrdersTable', 'default', 'App', 1687103851, 1),
(54, '2023-06-18-114608', 'App\\Database\\Migrations\\OrderItems', 'default', 'App', 1687103851, 1),
(55, '2023-06-18-114621', 'App\\Database\\Migrations\\Payments', 'default', 'App', 1687103851, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(5) UNSIGNED NOT NULL,
  `address_id` int(5) UNSIGNED NOT NULL,
  `total` float(10,2) NOT NULL,
  `discount` float(10,2) NOT NULL,
  `comment` varchar(128) NOT NULL,
  `status` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `quantity` int(5) UNSIGNED NOT NULL,
  `price` float(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `amount` float(10,2) NOT NULL,
  `pmethod` varchar(128) NOT NULL,
  `trxid` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_id` int(5) UNSIGNED NOT NULL,
  `subcategory_id` int(5) UNSIGNED NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `sku` varchar(128) NOT NULL,
  `price` float(10,2) NOT NULL,
  `price2` float(10,2) NOT NULL,
  `quantity` int(5) NOT NULL,
  `discount` int(3) NOT NULL DEFAULT 0,
  `hot` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(5) UNSIGNED NOT NULL,
  `user_id` int(5) UNSIGNED NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `in` varchar(20) DEFAULT NULL,
  `fb` varchar(80) DEFAULT NULL,
  `tw` varchar(80) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(5) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category_id`, `created_at`) VALUES
(1, 'dfszzzgv', 17, '2023-06-19 03:06:11'),
(2, 'Table', 11, '2023-06-19 03:06:34'),
(3, 'Chair', 11, '2023-06-19 03:10:52'),
(4, 'Lotto', 12, '2023-06-19 03:11:33'),
(5, 'Cloth Diapers', 13, '2023-06-19 03:12:50'),
(6, 'Wipes & Refills', 13, '2023-06-19 03:13:43'),
(7, 'Disposable Diapers', 13, '2023-06-19 03:14:33'),
(8, 'Slider', 12, '2023-06-19 03:15:13'),
(9, 'Formal Shoes', 12, '2023-06-19 03:15:55'),
(10, 'Hijab', 14, '2023-06-19 03:16:36'),
(11, 'Borkha', 14, '2023-06-19 03:16:51'),
(12, 'Abaya', 14, '2023-06-19 03:17:30'),
(13, 'LED TV', 15, '2023-06-19 03:17:53'),
(14, 'Smart TV', 15, '2023-06-19 03:18:12'),
(15, 'Samsung TV', 15, '2023-06-19 03:18:39'),
(16, 'Face Wash', 16, '2023-06-19 03:19:39'),
(17, 'Cream', 16, '2023-06-19 03:20:28'),
(18, 'Skin Shiner', 16, '2023-06-19 03:21:53'),
(19, 'IPhone ', 17, '2023-06-19 03:22:10'),
(20, 'Samsung ', 17, '2023-06-19 03:22:29'),
(21, 'Nokia', 17, '2023-06-19 03:22:41'),
(22, 'Sony ', 17, '2023-06-19 03:23:11'),
(23, 'Fogg', 19, '2023-06-19 03:23:52'),
(24, 'Lafz', 19, '2023-06-19 03:24:17'),
(25, 'Blue Bird', 19, '2023-06-19 03:25:33'),
(26, 'One plus ', 20, '2023-06-19 03:25:57'),
(27, 'Bids', 20, '2023-06-19 03:26:22'),
(28, 'Mi', 20, '2023-06-19 03:26:45'),
(29, 'Apple ', 20, '2023-06-19 03:26:59'),
(30, 'Smartwatch ', 21, '2023-06-19 03:28:11'),
(31, 'Formal Watch', 21, '2023-06-19 03:28:39'),
(32, 'Analog', 21, '2023-06-19 03:29:21'),
(33, 'Chinigura Rice', 22, '2023-06-19 03:30:12'),
(34, 'Sugar', 22, '2023-06-19 03:30:38'),
(35, 'Biscuits', 22, '2023-06-19 03:31:27'),
(36, 'Samsung ', 23, '2023-06-19 03:31:47'),
(37, 'Walton', 23, '2023-06-19 03:32:05'),
(38, 'Hitachi ', 23, '2023-06-19 03:32:24'),
(39, 'Canon', 24, '2023-06-19 03:32:43'),
(40, 'BenQ', 24, '2023-06-19 03:33:00'),
(41, 'Travel Bag', 25, '2023-06-19 03:35:30'),
(42, 'School Bag', 25, '2023-06-19 03:36:02'),
(43, 'Tree Piece ', 26, '2023-06-19 03:36:26'),
(44, 'Ladies Shirt', 26, '2023-06-19 03:37:40'),
(45, 'Casual Tops', 26, '2023-06-19 03:38:23'),
(46, 'Sharee', 26, '2023-06-19 03:38:37'),
(47, 'T-Shirt', 27, '2023-06-19 03:38:53'),
(48, 'Pant', 27, '2023-06-19 03:39:08'),
(49, 'Wallet', 27, '2023-06-19 03:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 1,
  `token` varchar(256) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `token`, `created_at`) VALUES
(1, 'Mohim', 'mohim@gmail.com', '$2y$10$vQIwk3awiXTexr334hLH0eAaPWPOuvnOi/SfLET7bKMkIaValZgYa', 1, NULL, '2023-06-18 15:57:48'),
(3, 'Mohim Molla', 'mohim1@gmail.com', '$2y$10$EJkRYnJesWXUVnPSxu1k2uQCk5itWj1O/VirzDOakLtfQtu2FLZIO', 1, NULL, '2023-06-18 15:58:47'),
(4, 'ismail', 'ismail@gmail.com', '$2y$10$i.ao1FaZMkJtF2TDhxgX/ueBK.B0P6y5f3d9lLFHADtTvwZKIPiNS', 1, NULL, '2023-06-18 18:16:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_product_id_foreign` (`product_id`);

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
  ADD KEY `orders_address_id_foreign` (`address_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sku` (`sku`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
