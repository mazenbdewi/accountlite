-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2017 at 12:27 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `account`
--

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `id` int(10) UNSIGNED NOT NULL,
  `careerName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `carNumber` varchar(25) NOT NULL,
  `carName` varchar(30) NOT NULL,
  `carModel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cashboxes`
--

CREATE TABLE `cashboxes` (
  `id` int(11) NOT NULL,
  `cashAmount` double NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoryName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categoryName`, `created_at`, `updated_at`) VALUES
(6, 'بطاريات', '2017-02-05 08:58:47', '2017-02-05 08:58:47'),
(7, 'كفرات', '2017-02-05 08:58:54', '2017-02-05 08:58:54');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerFirstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customerMiddleName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customerLastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customerMobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customerPhoneJob` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customerPhoneHome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customerAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customerCity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customerNational` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customerDebt` double NOT NULL,
  `customerPaymentDate` date NOT NULL,
  `limit` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customerFirstName`, `customerMiddleName`, `customerLastName`, `customerMobile`, `customerPhoneJob`, `customerPhoneHome`, `customerAddress`, `customerCity`, `customerNational`, `customerDebt`, `customerPaymentDate`, `limit`, `created_at`, `updated_at`) VALUES
(8, 'مازن', '', 'بديوي', '4343433', '4343', '434343', '4343', '4343', '4343', 0, '0000-00-00', 12000, '2017-02-05 08:58:10', '2017-02-05 08:58:10');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `employeeFirstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employeeMiddleName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employeeLastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employeeBrithday` date NOT NULL,
  `employeeAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employeeMobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employeePhoneHome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employeePhoneJob` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employeeCity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employeeNational` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employeeSalary` decimal(8,2) NOT NULL,
  `employeeDiscount` decimal(8,2) NOT NULL,
  `employeeFrom` date NOT NULL,
  `employeeTo` date NOT NULL,
  `career_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `numberbuy`
--

CREATE TABLE `numberbuy` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `numberbuy`
--

INSERT INTO `numberbuy` (`id`, `order_id`) VALUES
(2, 403),
(3, 404);

-- --------------------------------------------------------

--
-- Table structure for table `numberrebuy`
--

CREATE TABLE `numberrebuy` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `numberresell`
--

CREATE TABLE `numberresell` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `numberresell`
--

INSERT INTO `numberresell` (`id`, `order_id`) VALUES
(2, 412),
(3, 413),
(4, 414),
(5, 415);

-- --------------------------------------------------------

--
-- Table structure for table `numbersandin`
--

CREATE TABLE `numbersandin` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `numbersandin`
--

INSERT INTO `numbersandin` (`id`, `order_id`) VALUES
(26, 410),
(27, 411);

-- --------------------------------------------------------

--
-- Table structure for table `numbersandout`
--

CREATE TABLE `numbersandout` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `numbersandout`
--

INSERT INTO `numbersandout` (`id`, `order_id`) VALUES
(7, 407),
(8, 408),
(9, 409);

-- --------------------------------------------------------

--
-- Table structure for table `numbersell`
--

CREATE TABLE `numbersell` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `numbersell`
--

INSERT INTO `numbersell` (`id`, `order_id`) VALUES
(240, 405),
(241, 406);

-- --------------------------------------------------------

--
-- Table structure for table `opens`
--

CREATE TABLE `opens` (
  `id` int(11) NOT NULL,
  `cash` double NOT NULL,
  `bank` double NOT NULL,
  `firstGoods` double NOT NULL,
  `lastGoods` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `productOrderPrice` int(11) NOT NULL,
  `productOrderQuantity` int(11) NOT NULL,
  `productOrderDis` int(11) NOT NULL,
  `productOrderAllPrice` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `productOrderPrice`, `productOrderQuantity`, `productOrderDis`, `productOrderAllPrice`, `created_at`, `updated_at`) VALUES
(377, 403, 45, 120, 50, 0, 6000, NULL, NULL),
(378, 404, 45, 125, 40, 0, 5000, NULL, NULL),
(379, 405, 45, 1500, 2, 0, 3000, NULL, NULL),
(380, 406, 45, 1500, 88, 0, 132000, NULL, NULL),
(381, 412, 45, 1500, 5, 0, 7500, NULL, NULL),
(382, 413, 45, 1500, 5, 0, 7500, NULL, NULL),
(383, 414, 45, 1500, 5, 0, 7500, NULL, NULL),
(384, 415, 45, 1500, 5, 0, 7500, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `orderType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orderDate` date NOT NULL,
  `orderPaymentType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orderBankName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `employee_id` int(11) NOT NULL,
  `fromto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orderCheckNO` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orderDueDate` date NOT NULL,
  `car_id` int(11) NOT NULL,
  `employeeName` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `kilo` double NOT NULL,
  `provider_id` int(11) NOT NULL,
  `getMoney` double NOT NULL,
  `backMoney` double NOT NULL,
  `orderPayment` double NOT NULL,
  `orderOutPayment` double NOT NULL,
  `disPrice` double NOT NULL,
  `orderNote` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `month` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `numberbill` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderType`, `orderDate`, `orderPaymentType`, `orderBankName`, `employee_id`, `fromto`, `orderCheckNO`, `orderDueDate`, `car_id`, `employeeName`, `customer_id`, `kilo`, `provider_id`, `getMoney`, `backMoney`, `orderPayment`, `orderOutPayment`, `disPrice`, `orderNote`, `month`, `numberbill`, `created_at`, `updated_at`) VALUES
(403, 'buy', '2017-02-05', 'cash', '', 0, '', '', '2017-02-05', 0, 'ربيع سيو', 0, 0, 2, 0, 6000, 0, 6000, 0, '', '', 0, NULL, NULL),
(404, 'buy', '2017-02-05', 'cash', '', 0, '', '', '2017-02-05', 0, 'ربيع سيو', 0, 0, 2, 0, 5000, 0, 5000, 0, '', '', 0, NULL, NULL),
(405, 'sell', '2017-02-05', 'cash', '', 0, '', '', '2017-02-05', 0, 'ربيع سيو', 8, 0, 0, 3000, 0, 3000, 0, 0, '', '02', 0, NULL, NULL),
(406, 'sell', '2017-02-05', 'cash', '', 0, '', '', '2017-02-05', 0, 'ربيع سيو', 8, 0, 0, 132000, 0, 132000, 0, 0, '', '02', 0, NULL, NULL),
(407, 'sandout', '2017-02-05', 'cash', '', 0, 'electric', '', '0000-00-00', 0, 'ربيع سيو', 0, 0, 0, 0, 0, 0, 5000, 0, '', '', 0, NULL, NULL),
(408, 'sandout', '2017-02-05', 'cash', '', 0, 'tranc', '', '0000-00-00', 0, 'ربيع سيو', 0, 0, 0, 0, 0, 0, 2000, 0, '', '', 0, NULL, NULL),
(409, 'sandout', '2017-02-05', 'cash', '', 0, 'water', '', '0000-00-00', 0, 'ربيع سيو', 0, 0, 0, 0, 0, 0, 2500, 0, '', '', 0, NULL, NULL),
(410, 'sandin', '2017-02-05', 'cash', '', 0, 'هدية', '', '0000-00-00', 0, 'ربيع سيو', 8, 0, 0, 5000, 0, 0, 0, 0, ' ', '', 0, NULL, NULL),
(411, 'sandin', '2017-02-05', 'cash', '', 0, 'هدية', '', '0000-00-00', 0, 'ربيع سيو', 8, 0, 0, 5000, 0, 0, 0, 0, ' ', '', 0, NULL, NULL),
(412, 'sell', '2017-02-05', 'cash', '', 0, '', '', '2017-02-05', 0, 'ربيع سيو', 8, 0, 0, 7500, 0, 0, 7500, 0, '', '', 0, NULL, NULL),
(413, 'sell', '2017-02-05', 'cash', '', 0, '', '', '2017-02-05', 0, 'ربيع سيو', 8, 0, 0, 7500, 0, 0, 7500, 0, '', '', 0, NULL, NULL),
(414, 'resell', '2017-02-05', 'cash', '', 0, '', '', '2017-02-05', 0, 'ربيع سيو', 8, 0, 0, 7500, 0, 0, 7500, 0, '', '', 0, NULL, NULL),
(415, 'resell', '2017-02-05', 'cash', '', 0, '', '', '2017-02-05', 0, 'ربيع سيو', 8, 0, 0, 7500, 0, 0, 7500, 0, '', '', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ordersell`
--

CREATE TABLE `ordersell` (
  `id` int(11) NOT NULL,
  `sellName` varchar(250) NOT NULL,
  `sellPrice` double NOT NULL,
  `sellQuantity` double NOT NULL,
  `sellDisc` int(11) NOT NULL,
  `sellAllprice` double NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `productCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `productNetPrice` double NOT NULL,
  `productQuntity` int(11) NOT NULL,
  `allQuantity` double NOT NULL,
  `productUnit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productSellPrice` double NOT NULL,
  `productTotalPrice` double NOT NULL,
  `productNetSell` double NOT NULL,
  `productLastPrice` double NOT NULL,
  `category_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productCode`, `productName`, `productDescription`, `productNetPrice`, `productQuntity`, `allQuantity`, `productUnit`, `productSellPrice`, `productTotalPrice`, `productNetSell`, `productLastPrice`, `category_id`, `order_id`, `created_at`, `updated_at`) VALUES
(45, '4343', 'نوكيا b55', '', 120, 20, 100, 'حبة', 1500, 6000, 1250, 125, 6, 0, '2017-02-05 09:00:14', '2017-02-05 09:05:05'),
(46, '464', 'سوني C7', '', 0, 0, 100, 'حبة', 0, 0, 0, 0, 7, 0, '2017-02-05 09:00:49', '2017-02-05 09:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `providerFirstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `providerMiddleName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `providerLastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `providerCompany` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `providerMobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `providerPhoneJob` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `providerPhoneHome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `providerAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `providerCity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `providerNational` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `providerCreditor` double NOT NULL,
  `providerPaymentDate` date NOT NULL,
  `providerDebt` double NOT NULL,
  `limit` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `providerFirstName`, `providerMiddleName`, `providerLastName`, `providerCompany`, `providerMobile`, `providerPhoneJob`, `providerPhoneHome`, `providerAddress`, `providerCity`, `providerNational`, `providerCreditor`, `providerPaymentDate`, `providerDebt`, `limit`, `created_at`, `updated_at`) VALUES
(2, 'لارا', '', 'حسن', '', '4343', '4343', '4343', '4343', '4343', '4343', 0, '0000-00-00', 0, 0, '2017-02-05 08:58:25', '2017-02-05 08:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userDisc` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `userDisc`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ربيع سيو', 'rabih@oil.com', 12, '$2y$10$2c4Ej0bsB5o0SWrY0xK4oerxdjk9/oMDr7fBWDbKTf7R/ZHKYtkNu', 1, 'kFUaPh2PIjdkqOuiiiHLI8A5MJN9Zr8wMz8iCdrMtNahCF9IYGXVUnwebgeE', '2016-08-13 18:14:11', '2017-02-05 09:57:05'),
(2, 'حازم شيخاني', 'hazem@oil.com', 20, '$2y$10$nI7oEE7e1fpuqAdZIxZw2ezeNEFil6vRncC1ieb.ehZUZGgHhRt16', 3, 'EJFtA99wlELTgVXkuI45VVmKcevx0qzQB6w0CnVwXspU2YsLiljYA3kG3A6p', '2016-09-14 12:23:35', '2016-12-02 15:20:03'),
(3, 'test7', 'test@test.mmm8', 0, '$2y$10$uEKNcW0KwnCzQokGfTQVvOzDDLGymSCfk245MkQpq0BELJcr3IL0a', 1, 'eSpVdAkEJvCzKJ5e6E3uAl67a9BoNwlTtdWSfrnL7nzn1n3sRI0ePlDjrNXp', '2016-09-15 12:06:35', '2016-09-16 17:36:37'),
(4, 'مازن بديوي', 'mazen@oil.com', 20, '$2y$10$S1ShJh/wh75dHyckR0RJ7eBZNz4v50WIV..gsVY65VE2NFAHN5m9S', 0, 'totKLv36P0VuybEHj7y1RL8vAsQ8aFzkfLdhma1CvGTeKUWlhwwFz4HOYGeI', '2016-09-15 17:44:41', '2016-11-19 16:58:48'),
(5, 'حسن اسمر', 'hasan@oil.com', 0, '$2y$10$9X93s3/5IwGAuo3VlvbsZ.5MEYNXqz4Qe6JtSnBomf481zrj0D2WG', 0, NULL, '2016-09-24 15:50:02', '2016-11-05 16:31:35'),
(6, 'test', 'test@4.n', 0, '$2y$10$ZCLDo7iLCJn20TSjh8m7kOioRHdTWOLCgHM1jphnXfbOEzgw7bgbK', 0, NULL, '2016-09-24 16:01:34', '2016-09-24 16:01:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `carNumber` (`carNumber`);

--
-- Indexes for table `cashboxes`
--
ALTER TABLE `cashboxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `numberbuy`
--
ALTER TABLE `numberbuy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `numberrebuy`
--
ALTER TABLE `numberrebuy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `numberresell`
--
ALTER TABLE `numberresell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `numbersandin`
--
ALTER TABLE `numbersandin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `numbersandout`
--
ALTER TABLE `numbersandout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `numbersell`
--
ALTER TABLE `numbersell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opens`
--
ALTER TABLE `opens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordersell`
--
ALTER TABLE `ordersell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
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
-- AUTO_INCREMENT for table `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cashboxes`
--
ALTER TABLE `cashboxes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `numberbuy`
--
ALTER TABLE `numberbuy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `numberrebuy`
--
ALTER TABLE `numberrebuy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `numberresell`
--
ALTER TABLE `numberresell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `numbersandin`
--
ALTER TABLE `numbersandin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `numbersandout`
--
ALTER TABLE `numbersandout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `numbersell`
--
ALTER TABLE `numbersell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
--
-- AUTO_INCREMENT for table `opens`
--
ALTER TABLE `opens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=416;
--
-- AUTO_INCREMENT for table `ordersell`
--
ALTER TABLE `ordersell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
