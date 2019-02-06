-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.2.3-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table bdrannaghar.activations
CREATE TABLE IF NOT EXISTS `activations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.activations: ~2 rows (approximately)
/*!40000 ALTER TABLE `activations` DISABLE KEYS */;
INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
	(1, 1, '5VDgvHfMdnFWJsUcCvwm3TrBiinu3vRd', 1, '2019-01-30 16:46:16', '2019-01-30 16:46:16', '2019-01-30 16:46:16'),
	(2, 2, 'PaxmCPAT7oYFS8C8gVZDk6CUhbZVkSTI', 1, '2019-01-30 17:43:12', '2019-01-30 17:43:12', '2019-01-30 17:43:12');
/*!40000 ALTER TABLE `activations` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.addresses
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) unsigned NOT NULL,
  `block` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `road_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `floor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.addresses: ~0 rows (approximately)
/*!40000 ALTER TABLE `addresses` DISABLE KEYS */;
/*!40000 ALTER TABLE `addresses` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.areas
CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `district_id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `areas_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.areas: ~0 rows (approximately)
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` (`id`, `district_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Mirpur 6', 'mirpur-6', '2019-01-30 17:09:48', '2019-01-30 17:09:48');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.branches
CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `area_id` int(10) unsigned NOT NULL,
  `address_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `branches_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.branches: ~0 rows (approximately)
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` (`id`, `area_id`, `address_id`, `name`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, 'Mirpur', 'mirpur', NULL, '2019-01-30 17:10:28', '2019-01-30 17:10:28');
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) unsigned DEFAULT NULL,
  `department_id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.categories: ~0 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `branch_id`, `department_id`, `name`, `bn_name`, `slug`, `thumbnail`, `created_at`, `updated_at`) VALUES
	(1, NULL, 1, 'Bread', 'রুটি', 'bread', 'images/Category/1549450865.jpg', '2019-02-06 17:01:05', '2019-02-06 17:01:05');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` int(10) unsigned NOT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.comments: ~0 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `departments_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.departments: ~0 rows (approximately)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` (`id`, `branch_id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Food', 'food', '2019-01-30 17:11:25', '2019-01-30 17:11:25');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.districts
CREATE TABLE IF NOT EXISTS `districts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `districts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.districts: ~2 rows (approximately)
/*!40000 ALTER TABLE `districts` DISABLE KEYS */;
INSERT INTO `districts` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'Dhaka', 'dhaka', '2019-01-30 17:04:34', '2019-01-30 17:04:34'),
	(2, 'Barisal', 'barisal', '2019-01-30 17:08:34', '2019-01-30 17:08:34');
/*!40000 ALTER TABLE `districts` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.expenses
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.expenses: ~0 rows (approximately)
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.gifts
CREATE TABLE IF NOT EXISTS `gifts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` decimal(6,0) NOT NULL,
  `thumbnail` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gifts_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.gifts: ~0 rows (approximately)
/*!40000 ALTER TABLE `gifts` DISABLE KEYS */;
INSERT INTO `gifts` (`id`, `name`, `slug`, `points`, `thumbnail`, `created_at`, `updated_at`) VALUES
	(1, 'School Bag', 'school-bag', 500, 'images/Gifts/1548847100.jpg', '2019-01-30 17:18:20', '2019-01-30 17:18:20');
/*!40000 ALTER TABLE `gifts` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.images
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imageable_id` int(10) unsigned DEFAULT NULL,
  `imageable_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `src` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `images_src_unique` (`src`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.images: ~3 rows (approximately)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`id`, `imageable_id`, `imageable_type`, `type`, `status`, `src`, `created_at`, `updated_at`) VALUES
	(3, NULL, NULL, 'main-slider', 1, 'images/site/1549436899.jpg', '2019-02-06 13:08:19', '2019-02-06 13:08:19'),
	(4, NULL, NULL, 'main-slider', 1, 'images/site/1549447675.jpg', '2019-02-06 16:07:55', '2019-02-06 16:07:55'),
	(5, 1, 'product', 'Thumbnail', 1, 'images/products/1549448303.jpg', '2019-02-06 16:18:23', '2019-02-06 16:18:23'),
	(7, 1, 'category', 'Thumbnail', 1, 'images/Category/1549450865.jpg', '2019-02-06 17:01:06', '2019-02-06 17:01:06');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.image_details
CREATE TABLE IF NOT EXISTS `image_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image_id` int(10) unsigned NOT NULL,
  `product_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.image_details: ~0 rows (approximately)
/*!40000 ALTER TABLE `image_details` DISABLE KEYS */;
INSERT INTO `image_details` (`id`, `image_id`, `product_slug`, `title`, `body`, `created_at`, `updated_at`) VALUES
	(1, 3, 'rice-bread', 'Prawn Malai Curry', 'It is made from prawn, coconut milk and flavored with spices.', '2019-02-06 13:12:19', '2019-02-06 17:38:17');
/*!40000 ALTER TABLE `image_details` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.inquiries
CREATE TABLE IF NOT EXISTS `inquiries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.inquiries: ~0 rows (approximately)
/*!40000 ALTER TABLE `inquiries` DISABLE KEYS */;
/*!40000 ALTER TABLE `inquiries` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.migrations: ~23 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_07_02_230147_migration_cartalyst_sentinel', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_02_18_072039_create_departments_table', 1),
	(5, '2018_02_18_072249_create_gifts_table', 1),
	(6, '2018_02_18_072303_create_branches_table', 1),
	(8, '2018_02_18_083024_create_images_table', 1),
	(10, '2018_02_18_083800_create_prices_table', 1),
	(11, '2018_02_18_084850_create_purchases_table', 1),
	(12, '2018_02_18_084909_create_trets_table', 1),
	(13, '2018_02_18_084921_create_stocks_table', 1),
	(14, '2018_02_18_085022_create_expences_table', 1),
	(15, '2018_02_18_085040_create_adderesses_table', 1),
	(16, '2018_02_20_060101_create_areas_table', 1),
	(17, '2018_02_20_060425_create_districts_table', 1),
	(18, '2018_10_27_072348_create_orders_table', 1),
	(19, '2018_10_27_072423_create_order_details_table', 1),
	(20, '2018_11_08_061952_create_inquiries_table', 1),
	(21, '2018_11_20_123221_create_image_details_table', 1),
	(22, '2019_01_23_175516_create_comments_table', 1),
	(23, '2018_02_18_072233_create_categories_table', 1),
	(25, '2018_02_18_083716_create_packages_table', 1),
	(26, '2019_02_01_210014_create_pages_table', 1),
	(27, '2018_02_18_072321_create_products_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `slug` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.orders: ~0 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `user_id`, `slug`, `s_address`, `notes`, `status`, `payment_status`, `created_at`, `updated_at`) VALUES
	(1, 2, '15488486072', 'House 22, Road-12, Mirpur 6', NULL, 0, 0, '2019-01-30 17:43:27', '2019-01-30 17:43:27');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.order_details
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `quantity` decimal(5,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.order_details: ~0 rows (approximately)
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `quantity`) VALUES
	(1, 1, 1, 10.00, 1);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.packages
CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `packageable_id` int(10) unsigned NOT NULL,
  `packageable_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `thumbnail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hit_count` decimal(10,0) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.packages: ~0 rows (approximately)
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.pages: ~0 rows (approximately)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.persistences
CREATE TABLE IF NOT EXISTS `persistences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `persistences_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.persistences: ~3 rows (approximately)
/*!40000 ALTER TABLE `persistences` DISABLE KEYS */;
INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
	(3, 2, '5SHFL52ffQDNmyltWdUPuoBqRZlAHvYQ', '2019-01-30 17:43:12', '2019-01-30 17:43:12'),
	(5, 1, '22n1RrE2YwF1td1PKiE7MLSLkUQ461vG', '2019-02-06 12:47:26', '2019-02-06 12:47:26'),
	(6, 1, 'N2ruptO21YquJZdKLnRdyC6a7Q0kZUD3', '2019-02-06 15:20:55', '2019-02-06 15:20:55');
/*!40000 ALTER TABLE `persistences` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.prices
CREATE TABLE IF NOT EXISTS `prices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `priceable_id` int(10) unsigned NOT NULL,
  `priceable_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.prices: ~0 rows (approximately)
/*!40000 ALTER TABLE `prices` DISABLE KEYS */;
/*!40000 ALTER TABLE `prices` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `branch_id` int(10) unsigned DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hit_count` decimal(10,0) NOT NULL DEFAULT 0,
  `price` decimal(6,2) NOT NULL,
  `old_price` decimal(6,2) DEFAULT NULL,
  `for_sale` tinyint(1) NOT NULL,
  `thumbnail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.products: ~1 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `category_id`, `branch_id`, `slug`, `name`, `bn_name`, `description`, `bn_description`, `unit`, `hit_count`, `price`, `old_price`, `for_sale`, `thumbnail`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, 'rice-bread', 'Rice bread', 'চালের রুটি', '<ol>\r\n	<li>It is made from fresh rice flour.</li>\r\n	<li>It is very soft and smooth.</li>\r\n	<li>It is healthy and oil free.</li>\r\n	<li>It is a good source of carbohydrates.</li>\r\n</ol>', NULL, 'PCS', 0, 10.00, 10.00, 1, 'images/products/1549448303.jpg', '2019-02-06 16:18:23', '2019-02-06 16:20:05');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.purchases
CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `buyer_id` int(10) unsigned NOT NULL,
  `merchant_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `branch_id` int(10) unsigned NOT NULL,
  `quantity` decimal(8,0) NOT NULL,
  `deposit` decimal(8,0) NOT NULL DEFAULT 0,
  `tret` decimal(8,0) NOT NULL DEFAULT 0,
  `price` decimal(8,0) NOT NULL,
  `update_stock` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.purchases: ~0 rows (approximately)
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.reminders
CREATE TABLE IF NOT EXISTS `reminders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.reminders: ~0 rows (approximately)
/*!40000 ALTER TABLE `reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `reminders` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` double NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.roles: ~3 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `slug`, `name`, `weight`, `permissions`, `created_at`, `updated_at`) VALUES
	(1, 'customer', 'Customer', 999, NULL, '2019-01-30 16:45:14', '2019-01-30 16:45:15'),
	(2, 'chairman', 'Chairman', 500, NULL, '2019-01-30 16:45:34', '2019-01-30 16:45:35'),
	(3, 'salesman', 'Salesman', 100, NULL, '2019-01-30 17:03:20', '2019-01-30 17:03:20');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.role_users
CREATE TABLE IF NOT EXISTS `role_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.role_users: ~2 rows (approximately)
/*!40000 ALTER TABLE `role_users` DISABLE KEYS */;
INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
	(1, 2, '2019-01-30 16:46:16', '2019-01-30 16:46:16'),
	(2, 1, '2019-01-30 17:43:12', '2019-01-30 17:43:12');
/*!40000 ALTER TABLE `role_users` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.stocks
CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `deposit` decimal(8,0) NOT NULL,
  `withdraw` decimal(8,0) NOT NULL DEFAULT 0,
  `balance` decimal(8,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.stocks: ~0 rows (approximately)
/*!40000 ALTER TABLE `stocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `stocks` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.throttle
CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.throttle: ~0 rows (approximately)
/*!40000 ALTER TABLE `throttle` DISABLE KEYS */;
/*!40000 ALTER TABLE `throttle` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.trets
CREATE TABLE IF NOT EXISTS `trets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stock_id` int(10) unsigned NOT NULL,
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` decimal(8,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.trets: ~0 rows (approximately)
/*!40000 ALTER TABLE `trets` DISABLE KEYS */;
/*!40000 ALTER TABLE `trets` ENABLE KEYS */;

-- Dumping structure for table bdrannaghar.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `branch_id` int(10) unsigned DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` decimal(6,0) NOT NULL DEFAULT 0,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interests` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`mobile`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bdrannaghar.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `branch_id`, `mobile`, `email`, `name`, `address`, `points`, `password`, `profile_image`, `permissions`, `interests`, `last_login`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'chairman@bdrannaghar.com', 'chairman@rannagharbd.com', 'Chairman', 'Dilu Road, Moghbazar, 1000', 0, '$2y$10$lZeqZqTJ2JzOmUxEuNjUf.vfI3BWhmE6pruQUl9U7V79n4AAt0/Da', NULL, NULL, 'Hello..\r\n\r\nI love food very much..', '2019-02-06 15:20:55', '2019-01-30 16:46:16', '2019-02-06 15:20:55'),
	(2, NULL, '01784255196', NULL, 'Customer', 'House 22, Road-12, Mirpur 6', 0, '$2y$10$vUnLokeRRPHoGAbOXsPl6utMY5asNM.DFhX1J10QF7r0FXD2aUIRK', NULL, NULL, NULL, '2019-01-30 17:43:12', '2019-01-30 17:43:12', '2019-01-30 17:43:12');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
