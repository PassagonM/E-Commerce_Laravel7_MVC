-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2021 at 11:35 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `baskets`
--

CREATE TABLE `baskets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `baskets`
--

INSERT INTO `baskets` (`id`, `user_id`, `product_id`, `number`, `created_at`, `updated_at`) VALUES
(192, 26, 19, 1, '2021-07-15 02:34:16', '2021-07-15 02:34:16');

-- --------------------------------------------------------

--
-- Table structure for table `category_productitems`
--

CREATE TABLE `category_productitems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderlists`
--

CREATE TABLE `orderlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `orderstatus` int(11) NOT NULL,
  `message_byCustomer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sendtoaddress` int(10) NOT NULL,
  `slip_image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basket_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderlists`
--

INSERT INTO `orderlists` (`id`, `user_id`, `orderstatus`, `message_byCustomer`, `sendtoaddress`, `slip_image_path`, `basket_id`, `created_at`, `updated_at`) VALUES
(110, 23, 522, 'ด่วนที่สุด', 28, NULL, 198, '2021-07-17 10:45:54', '2021-07-17 10:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `ordertransactions`
--

CREATE TABLE `ordertransactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ordertransactions`
--

INSERT INTO `ordertransactions` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(83, 110, 19, 1, 1000, '2021-07-17 10:45:54', '2021-07-17 10:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productitems`
--

CREATE TABLE `productitems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemquantity` int(10) NOT NULL,
  `price` int(20) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productitems`
--

INSERT INTO `productitems` (`id`, `product_name`, `detail`, `itemquantity`, `price`, `product_image`, `category_id`, `created_at`, `updated_at`) VALUES
(19, 'แว่นเลนส์บลูบล็อคออโต้ กรองแสงสีฟ้า ออกแดดเปลี่ยนสี K3121', 'แว่นตากรองแสงสีฟ้า ออกแดดเปลี่ยนสี รุ่น K3121  ขนาด 51-18-138 mm  - ผลิตจากวัสดุแข็งแรง  - เลนส์ป้องกันแสงสีฟ้าจากคอมพิวเตอร์ สมาร์ทโฟน  - เมื่อออกแดด เลนส์จะปรับสีเข้มขึ้น ตามระดับปริมาณแสง ช่วงถนอมดวงตาคุณ', 7, 1000, '/storage/product_images/Capture.JPG', NULL, '2021-06-01 09:01:42', '2021-07-15 02:23:55'),
(20, 'แว่นกันแดดกรอบอะคริลิค', 'ผลิตภัณฑ์นี้ไม่ใช่อุปกรณ์ทางการแพทย์หรืออุปกรณ์ป้องกันส่วนบุคคล (PPE) และเราไม่สามารถตรวจสอบสิทธิ์การเรียกร้องใด ๆ ของผลประโยชน์ทางการแพทย์หรือการป้องกันในการใช้งาน', 9, 800, '/storage/product_images/Capture1.JPG', NULL, '2021-06-01 09:06:19', '2021-06-03 10:13:54'),
(21, 'แว่นกันแดดเลนส์ย้อมสี', 'ตัวเลนส์เคลือบเลนส์มัลติโค๊ท+ออโต้ กรองแสง ช่วยตัดแสงสะท้อน ป้องกันคลื่นไมโครเวฟ รังสีจากแสงคอมและโทรศัพท์ เคลือบผิวเลนส์ ทำความสะอาดง่าย และออกแดดเปลี่ยนสี ความเข้มขึ้นอยู่แสงแดด แดดยิ่งแรง เลนส์ยิ่งเข้ม', 11, 900, '/storage/product_images/Capture2.JPG', NULL, '2021-06-01 09:08:40', '2021-06-01 09:08:40'),
(22, 'แว่นตากรอบเหลี่ยมไร้ขอบ', 'สินค้าจะปลอดภัยและไม่เป็นอันตรายในระหว่างการขนส่ง ด้วยการห่อซองกันกระแทก  หากมีคำถามใด ๆ โปรดปรึกษาฝ่ายบริการลูกค้าก่อนทำการสั่งซื้อ', 19, 1000, '/storage/product_images/Capture3.JPG', NULL, '2021-06-01 09:11:04', '2021-07-14 18:07:03'),
(23, 'แว่นตากันแสงสีฟ้า', 'แว่นตากันแสงสีฟ้า กรอบใส น้ำหนักเบาและแข็งแรงทนทาน', 8, 1000, '/storage/product_images/Capture4.JPG', NULL, '2021-06-01 09:13:22', '2021-06-01 09:13:22'),
(24, 'แว่นตาแฟชั่น กรอบทรงกลม ขนาดใหญ่ สำหรับผู้ชายและผู้หญิง', 'แว่นแฟชั่นทั่วไป กรอบอลูมิเนี่ยม', 8, 750, '/storage/product_images/Capture5.JPG', NULL, '2021-06-01 09:19:17', '2021-06-01 09:19:17'),
(25, 'แว่นตากันแสงสีฟ้ากรอบใสทรงสี่เหลี่ยม', 'ทำจากวัสดุที่มีคุณภาพแข็งแรงทนทาน', 5, 1500, '/storage/product_images/Capture6.JPG', NULL, '2021-06-01 09:22:31', '2021-06-01 09:22:31'),
(26, 'แว่นสายตาทรงเหลี่ยม รุ่น K3121', 'แว่นตา รุ่น K3121  ขนาด 51-18-138 mm  - ผลิตจากวัสดุแข็งแรง  - เลนส์ป้องกันแสงสีฟ้าจากคอมพิวเตอร์ สมาร์ทโฟน  - เมื่อออกแดด เลนส์จะปรับสีเข้มขึ้น ตามระดับปริมาณแสง ช่วงถนอมดวงตาคุณ', 10, 1500, '/storage/product_images/Capture7.JPG', NULL, '2021-06-01 09:27:07', '2021-06-01 09:31:16'),
(27, 'แว่นสายตา Bolon BJ7055 B91 Black Rose Gold / White', 'แว่นสายตา สี Rose Gold มีน้ำหนักเบากว่าแว่นตาอลูมิเนียมทั่วไป', 8, 1500, '/storage/product_images/Capture8.JPG', NULL, '2021-06-01 09:28:55', '2021-06-01 09:31:25'),
(28, 'แว่นสายตากันแสงสีฟ้ากรอบสี่เหลี่ยม', 'ผลิตภัณฑ์นี้ไม่ใช่อุปกรณ์ทางการแพทย์หรืออุปกรณ์ป้องกันส่วนบุคคล (PPE) และเราไม่สามารถตรวจสอบสิทธิ์การเรียกร้องใด ๆ ของผลประโยชน์ทางการแพทย์หรือการป้องกันในการใช้งาน', 5, 900, '/storage/product_images/Capture9.JPG', NULL, '2021-06-01 09:35:15', '2021-06-01 09:35:15'),
(29, 'แว่นตากรอบกลม', 'ตัวเลนส์เคลือบเลนส์มัลติโค๊ท+ออโต้ กรองแสง ช่วยตัดแสงสะท้อน ป้องกันคลื่นไมโครเวฟ รังสีจากแสงคอมและโทรศัพท์ เคลือบผิวเลนส์ ทำความสะอาดง่าย', 10, 1500, '/storage/product_images/Capture10.JPG', NULL, '2021-06-01 09:36:24', '2021-06-01 09:36:24'),
(30, 'แว่นตากันแสงสีฟ้ากรอบอะคริลิค', 'แว่นตากันแสงสีฟ้ากรอบอะคริลิค พร้อมกล่องใส่แว่นตา', 5, 1300, '/storage/product_images/Capture11.JPG', NULL, '2021-06-01 09:38:04', '2021-06-01 09:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `replyreviews`
--

CREATE TABLE `replyreviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reply_reviews_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reviews_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replyreviews`
--

INSERT INTO `replyreviews` (`id`, `user_id`, `reply_reviews_message`, `reviews_id`, `created_at`, `updated_at`) VALUES
(6, 1, 'ทางร้านต้องขอขอบพระคุณเป็นอย่างสูงค่ะ', 9, '2021-06-16 14:50:49', '2021-06-16 14:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `message_Reviews` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ansbyadmin` int(5) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `message_Reviews`, `ansbyadmin`, `created_at`, `updated_at`) VALUES
(9, 23, 19, 'ได้รับสินค้าแล้วชอบมากๆเลย', 10, '2021-06-16 14:38:45', '2021-06-16 14:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `status_orders`
--

CREATE TABLE `status_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status_users`
--

CREATE TABLE `status_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `useradds`
--

CREATE TABLE `useradds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `textaddress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `useradds`
--

INSERT INTO `useradds` (`id`, `user_id`, `textaddress`, `active`) VALUES
(32, 23, 'Thailand.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `address` int(10) DEFAULT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '/storage/images/Muangthai_default_profile.png',
  `status_user` bigint(20) NOT NULL DEFAULT 1042,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `lastname`, `sex`, `age`, `tel`, `email`, `email_verified_at`, `address`, `birthday`, `user_image`, `user_image_path`, `status_user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'adminmuangthai', '$2y$10$9wkFgwxWPDaJ74YQGWvtl.aNXEWH/qsM//N9qb6t81/ZUT5tjvr6W', 'Muangthai', 'Opticalshop', NULL, NULL, '0999999999', 'muangthai@gmail.com', NULL, 0, NULL, 'Muangthai_default_profile.png', '/storage/images/Muangthai_default_profile.png', 1041, NULL, '2021-05-15 08:36:20', '2021-05-27 13:00:58'),
(23, 'passagon12', '123456789', 'ภาสกร', 'เหมืองทองมูล', NULL, NULL, '0999999999', 'test2@mju.ac.th', NULL, 0, NULL, NULL, '/storage/images/Muangthai_default_profile.png', 1042, NULL, '2021-06-16 09:02:30', '2021-06-18 09:46:30'),
(26, 'passagon159', '123456789', 'ภาสกร', 'เหมืองทองมูล', NULL, NULL, '0999999999', 'test@gmail.com', NULL, 0, NULL, NULL, '/storage/images/Muangthai_default_profile.png', 1042, NULL, '2021-07-15 02:19:00', '2021-07-15 02:21:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_productitems`
--
ALTER TABLE `category_productitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderlists`
--
ALTER TABLE `orderlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertransactions`
--
ALTER TABLE `ordertransactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `productitems`
--
ALTER TABLE `productitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replyreviews`
--
ALTER TABLE `replyreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_orders`
--
ALTER TABLE `status_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_users`
--
ALTER TABLE `status_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useradds`
--
ALTER TABLE `useradds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baskets`
--
ALTER TABLE `baskets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `category_productitems`
--
ALTER TABLE `category_productitems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orderlists`
--
ALTER TABLE `orderlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `ordertransactions`
--
ALTER TABLE `ordertransactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `productitems`
--
ALTER TABLE `productitems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `replyreviews`
--
ALTER TABLE `replyreviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `status_orders`
--
ALTER TABLE `status_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status_users`
--
ALTER TABLE `status_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useradds`
--
ALTER TABLE `useradds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
