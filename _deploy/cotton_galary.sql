-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: cotton_galary
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `about_sections`
--

DROP TABLE IF EXISTS `about_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `about_sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `eyebrow` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `paragraph_1` text DEFAULT NULL,
  `paragraph_2` text DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `progress_title` varchar(255) DEFAULT NULL,
  `progress_stats` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`progress_stats`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about_sections`
--

LOCK TABLES `about_sections` WRITE;
/*!40000 ALTER TABLE `about_sections` DISABLE KEYS */;
INSERT INTO `about_sections` VALUES (1,'About Cotton Galary','Your Trusted Partner in Premium Cotton Apparel','Cotton Galary is a global apparel development and sourcing partner, delivering sustainable, high-quality garments to leading brands across 25 countries. From concept to delivery, we bring newness, innovation and compliance excellence to every thread.','With 800+ skilled team members and a network of 120+ fully compliant partner factories, we combine expert craftsmanship with responsible manufacturing — helping our clients grow with confidence and care.','About Us','/about-us','uploads/about/about_6a64a24604d5a.png','Our Progress So Far','[{\"value\":\"120+\",\"label\":\"Partner Factories\"},{\"value\":\"25+\",\"label\":\"Countries Served\"},{\"value\":\"800+\",\"label\":\"Skilled Team Members\"},{\"value\":\"15\",\"label\":\"Years of Excellence\"},{\"value\":\"100%\",\"label\":\"Compliant Factories\"},{\"value\":\"40%\",\"label\":\"Sustainable Materials\"}]','2026-07-25 05:45:19','2026-07-25 07:27:06');
/*!40000 ALTER TABLE `about_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `badge_text` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `highlight_text` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sub_description` text DEFAULT NULL,
  `primary_button_text` varchar(255) DEFAULT NULL,
  `primary_button_link` varchar(255) DEFAULT NULL,
  `secondary_button_text` varchar(255) DEFAULT NULL,
  `secondary_button_link` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `stats` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`stats`)),
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES (1,'Sustainable Apparel','Your Global Partner for Premium Cotton Apparel','Premium Cotton','We offer sustainable garment product development and specialised global sourcing, combined with compliance excellence and intuitive customer service.','We bring newness and innovation to every thread — an extensive multi-category range, manufactured in over 100 fully compliant partner factories.','Explore Collections','#','Contact Sales','#','uploads/banners/banner_6a64bc61b39b9.jpg','[{\"number\":\"120\",\"suffix\":\"+\",\"label\":\"Partner Factories\"},{\"number\":\"25\",\"suffix\":\"\",\"label\":\"Countries Served\"},{\"number\":\"800\",\"suffix\":\"+\",\"label\":\"Team Members\"},{\"number\":\"15\",\"suffix\":\"\",\"label\":\"Years of Excellence\"}]',1,0,'2026-07-25 03:28:25','2026-07-25 07:38:41');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Chefwear','chefwear',0,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(2,'Dresses / Jumpsuits','dresses-jumpsuits',1,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(3,'Footwear','footwear',2,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(4,'Innerwear','innerwear',3,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(5,'Jackets / Coats','jackets-coats',4,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(6,'Knit Bottoms','knit-bottoms',5,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(7,'Knit Tops','knit-tops',6,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(8,'Knitwear (Flat Knit)','knitwear-flat-knit',7,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(9,'Nightwear','nightwear',8,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(10,'Outerwear','outerwear',9,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(11,'Shirts','shirts',10,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(12,'Sportswear','sportswear',11,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(13,'Sweaters','sweaters',12,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(14,'Swimwear','swimwear',13,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(15,'T-Shirts','t-shirts',14,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(16,'Trousers','trousers',15,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(17,'Woven Bottoms','woven-bottoms',16,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(18,'Woven Tops','woven-tops',17,1,'2026-07-25 05:04:51','2026-07-25 05:04:51');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `certifications`
--

DROP TABLE IF EXISTS `certifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `certifications` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certifications`
--

LOCK TABLES `certifications` WRITE;
/*!40000 ALTER TABLE `certifications` DISABLE KEYS */;
INSERT INTO `certifications` VALUES (1,'ISO 9001:2015','An internationally recognised quality management standard, reflecting our commitment to consistent processes and continual improvement.','uploads/marque image/1_1.png',NULL,0,1,'2026-07-25 07:26:49','2026-07-25 07:26:49'),(2,'GOTS','The Global Organic Textile Standard — a leading benchmark for textiles made from organic fibres, covering both ecological and social criteria.','uploads/marque image/3_1.png',NULL,1,1,'2026-07-25 07:26:49','2026-07-25 07:26:49'),(3,'Global Recycled Standard','Independently verifies recycled content in our products, together with responsible environmental, social and chemical practices.','uploads/marque image/4_3.png',NULL,2,1,'2026-07-25 07:26:49','2026-07-25 07:26:49'),(4,'EcoVadis','A trusted sustainability rating that assesses environmental, social and ethical performance across the supply chain.','uploads/marque image/8_2.png',NULL,3,1,'2026-07-25 07:26:49','2026-07-25 07:26:49'),(5,'Higg Index','A set of tools used to measure and improve the environmental and social impact of products and facilities.','uploads/marque image/9_1.png',NULL,4,1,'2026-07-25 07:26:49','2026-07-25 07:26:49'),(6,'Friend of ZDHC','Supporting the Zero Discharge of Hazardous Chemicals programme for safer chemical management in manufacturing.','uploads/marque image/Friend of ZDHC.png',NULL,5,1,'2026-07-25 07:26:49','2026-07-25 07:26:49'),(7,'OEKO-TEX Standard 100','Confirms that our textiles have been tested for harmful substances and are safe for everyday use.','uploads/marque image/OEKO-TEX-Standard-100.png',NULL,6,1,'2026-07-25 07:26:49','2026-07-25 07:26:49'),(8,'Textile Exchange','A global non-profit we work with to accelerate the shift towards more sustainable fibres and materials.','uploads/marque image/TE_New_0.png',NULL,7,1,'2026-07-25 07:26:49','2026-07-25 07:26:49');
/*!40000 ALTER TABLE `certifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_messages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_messages`
--

LOCK TABLES `contact_messages` WRITE;
/*!40000 ALTER TABLE `contact_messages` DISABLE KEYS */;
INSERT INTO `contact_messages` VALUES (1,'Md Abu Taleb Khan','dev.mdabutaleb@gmail.com','+880 1700-000000',NULL,'sss',1,'2026-07-26 06:02:54','2026-07-26 06:03:01');
/*!40000 ALTER TABLE `contact_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `intro` text DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `hours` varchar(255) DEFAULT NULL,
  `map_embed` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (1,'Have a question or a project in mind? We would love to hear from you — reach out and our team will get back to you shortly.','Dhaka, Bangladesh','+880 1772-500055','belal@cottonglary.com','Saturday - Thursday: 10:00 AM - 10:00 PM, Friday: Closed','https://maps.google.com/maps?q=QC7V%2B4HP%2C%20Dhaka&z=15&output=embed','2026-07-25 06:47:52','2026-07-26 05:58:03');
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_07_25_000001_add_role_to_users_table',2),(5,'2026_07_25_000002_create_banners_table',3),(6,'2026_07_25_000003_create_categories_table',4),(7,'2026_07_25_000004_create_products_table',4),(8,'2026_07_25_000005_create_about_sections_table',5),(9,'2026_07_25_000006_create_owners_table',6),(10,'2026_07_25_000007_create_promises_table',7),(11,'2026_07_25_000008_create_contacts_table',8),(12,'2026_07_25_000009_create_contact_messages_table',8),(13,'2026_07_25_000010_create_certifications_table',9),(14,'2026_07_25_000011_add_progress_to_about_sections',9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `owners`
--

DROP TABLE IF EXISTS `owners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `owners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `eyebrow` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `paragraph_1` text DEFAULT NULL,
  `paragraph_2` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `owners`
--

LOCK TABLES `owners` WRITE;
/*!40000 ALTER TABLE `owners` DISABLE KEYS */;
INSERT INTO `owners` VALUES (1,'Meet the Owner','Sarder Md Belal','Proprietor & CEO, Cotton Galary','Md. Abdul Karim leads Cotton Galary with a clear vision — to deliver premium, sustainable cotton apparel that global brands can trust. His hands-on approach and deep industry knowledge shape every partnership the company builds.','From a single workshop to a network of fully compliant partner factories serving clients across 25 countries, his commitment to craftsmanship, fair manufacturing and lasting relationships continues to move the company forward.','+880 1700-000000','info@cottongalary.com','uploads/owner/owner_6a65f70814bd0.jpg','2026-07-25 05:59:42','2026-07-26 06:01:12');
/*!40000 ALTER TABLE `owners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
INSERT INTO `password_reset_tokens` VALUES ('smbelal77@gmail.com','$2y$12$XTksGmiT0tqMg7S1VuYURe7JCNzJl0U.Zf7mgi7Ti1gfXH7m.TJ7u','2026-07-26 08:46:34');
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `design_code` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort_order` int(10) unsigned NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,'Chef Shirt','CG_DESIGN_00001',NULL,1,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(2,1,'Chef Jacket','CG_DESIGN_00002',NULL,2,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(3,1,'Bib Apron','CG_DESIGN_00003',NULL,3,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(4,1,'Chef Trousers','CG_DESIGN_00004',NULL,4,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(5,1,'Skull Cap','CG_DESIGN_00005',NULL,5,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(6,1,'Kitchen Coat','CG_DESIGN_00006',NULL,6,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(7,1,'Waist Apron','CG_DESIGN_00007',NULL,7,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(8,1,'Server Vest','CG_DESIGN_00008',NULL,8,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(9,2,'Wrap Dress','CG_DESIGN_00009',NULL,1,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(10,2,'Maxi Dress','CG_DESIGN_00010',NULL,2,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(11,2,'Denim Jumpsuit','CG_DESIGN_00011',NULL,3,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(12,2,'Shirt Dress','CG_DESIGN_00012',NULL,4,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(13,2,'Slip Dress','CG_DESIGN_00013',NULL,5,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(14,2,'Cargo Jumpsuit','CG_DESIGN_00014',NULL,6,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(15,2,'Midi Dress','CG_DESIGN_00015',NULL,7,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(16,2,'Playsuit','CG_DESIGN_00016',NULL,8,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(17,3,'Canvas Sneaker','CG_DESIGN_00017',NULL,1,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(18,3,'Leather Loafer','CG_DESIGN_00018',NULL,2,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(19,3,'Slip-On Shoe','CG_DESIGN_00019',NULL,3,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(20,3,'Espadrille','CG_DESIGN_00020',NULL,4,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(21,3,'Ankle Boot','CG_DESIGN_00021',NULL,5,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(22,3,'Strap Sandal','CG_DESIGN_00022',NULL,6,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(23,3,'Running Shoe','CG_DESIGN_00023',NULL,7,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(24,3,'Derby Shoe','CG_DESIGN_00024',NULL,8,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(25,4,'Cotton Brief','CG_DESIGN_00025',NULL,1,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(26,4,'Boxer Shorts','CG_DESIGN_00026',NULL,2,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(27,4,'Camisole','CG_DESIGN_00027',NULL,3,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(28,4,'Bralette','CG_DESIGN_00028',NULL,4,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(29,4,'Thermal Vest','CG_DESIGN_00029',NULL,5,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(30,4,'Seamless Panty','CG_DESIGN_00030',NULL,6,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(31,4,'Sports Bra','CG_DESIGN_00031',NULL,7,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(32,4,'Cotton Trunk','CG_DESIGN_00032',NULL,8,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(33,5,'Denim Jacket','CG_DESIGN_00033',NULL,1,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(34,5,'Bomber Jacket','CG_DESIGN_00034',NULL,2,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(35,5,'Trench Coat','CG_DESIGN_00035',NULL,3,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(36,5,'Puffer Jacket','CG_DESIGN_00036',NULL,4,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(37,5,'Tailored Blazer','CG_DESIGN_00037',NULL,5,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(38,5,'Hooded Parka','CG_DESIGN_00038',NULL,6,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(39,5,'Windbreaker','CG_DESIGN_00039',NULL,7,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(40,5,'Wool Overcoat','CG_DESIGN_00040',NULL,8,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(41,6,'Jogger Pants','CG_DESIGN_00041',NULL,1,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(42,6,'Knit Shorts','CG_DESIGN_00042',NULL,2,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(43,6,'Track Pants','CG_DESIGN_00043',NULL,3,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(44,6,'Leggings','CG_DESIGN_00044',NULL,4,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(45,6,'Knit Culottes','CG_DESIGN_00045',NULL,5,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(46,6,'Lounge Pants','CG_DESIGN_00046',NULL,6,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(47,6,'Ribbed Trousers','CG_DESIGN_00047',NULL,7,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(48,6,'Sweat Shorts','CG_DESIGN_00048',NULL,8,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(49,7,'Crew Tee','CG_DESIGN_00049',NULL,1,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(50,7,'Polo Shirt','CG_DESIGN_00050',NULL,2,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(51,7,'Henley Top','CG_DESIGN_00051',NULL,3,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(52,7,'Tank Top','CG_DESIGN_00052',NULL,4,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(53,7,'Long Sleeve Tee','CG_DESIGN_00053',NULL,5,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(54,7,'Raglan Tee','CG_DESIGN_00054',NULL,6,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(55,7,'V-Neck Tee','CG_DESIGN_00055',NULL,7,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(56,7,'Pocket Tee','CG_DESIGN_00056',NULL,8,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(57,8,'Cable Sweater','CG_DESIGN_00057',NULL,1,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(58,8,'Crew Pullover','CG_DESIGN_00058',NULL,2,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(59,8,'Turtleneck','CG_DESIGN_00059',NULL,3,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(60,8,'Button Cardigan','CG_DESIGN_00060',NULL,4,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(61,8,'V-Neck Sweater','CG_DESIGN_00061',NULL,5,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(62,8,'Knit Vest','CG_DESIGN_00062',NULL,6,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(63,8,'Zip Sweater','CG_DESIGN_00063',NULL,7,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(64,8,'Roll Neck','CG_DESIGN_00064',NULL,8,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(65,9,'Pajama Set','CG_DESIGN_00065',NULL,1,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(66,9,'Night Dress','CG_DESIGN_00066',NULL,2,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(67,9,'Sleep Shorts','CG_DESIGN_00067',NULL,3,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(68,9,'Cotton Robe','CG_DESIGN_00068',NULL,4,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(69,9,'Lounge Set','CG_DESIGN_00069',NULL,5,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(70,9,'Sleep Tee','CG_DESIGN_00070',NULL,6,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(71,9,'Kimono Robe','CG_DESIGN_00071',NULL,7,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(72,9,'Knit Onesie','CG_DESIGN_00072',NULL,8,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(73,10,'Raincoat','CG_DESIGN_00073',NULL,1,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(74,10,'Quilted Gilet','CG_DESIGN_00074',NULL,2,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(75,10,'Fleece Jacket','CG_DESIGN_00075',NULL,3,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(76,10,'Softshell Jacket','CG_DESIGN_00076',NULL,4,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(77,10,'Anorak','CG_DESIGN_00077',NULL,5,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(78,10,'Field Jacket','CG_DESIGN_00078',NULL,6,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(79,10,'Rain Poncho','CG_DESIGN_00079',NULL,7,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(80,10,'Wool Cape','CG_DESIGN_00080',NULL,8,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(81,11,'Oxford Shirt','CG_DESIGN_00081',NULL,1,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(82,11,'Flannel Shirt','CG_DESIGN_00082',NULL,2,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(83,11,'Linen Shirt','CG_DESIGN_00083',NULL,3,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(84,11,'Denim Shirt','CG_DESIGN_00084',NULL,4,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(85,11,'Formal Shirt','CG_DESIGN_00085',NULL,5,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(86,11,'Check Shirt','CG_DESIGN_00086',NULL,6,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(87,11,'Grandad Shirt','CG_DESIGN_00087',NULL,7,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(88,11,'Camp Collar Shirt','CG_DESIGN_00088',NULL,8,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(89,12,'Training Tee','CG_DESIGN_00089',NULL,1,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(90,12,'Compression Top','CG_DESIGN_00090',NULL,2,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(91,12,'Track Jacket','CG_DESIGN_00091',NULL,3,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(92,12,'Running Shorts','CG_DESIGN_00092',NULL,4,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(93,12,'Sports Legging','CG_DESIGN_00093',NULL,5,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(94,12,'Gym Tank','CG_DESIGN_00094',NULL,6,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(95,12,'Windbreaker Pant','CG_DESIGN_00095',NULL,7,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(96,12,'Base Layer','CG_DESIGN_00096',NULL,8,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(97,13,'Marl Jumper','CG_DESIGN_00097',NULL,1,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(98,13,'Chunky Knit','CG_DESIGN_00098',NULL,2,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(99,13,'Fair Isle Sweater','CG_DESIGN_00099',NULL,3,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(100,13,'Crewneck Jumper','CG_DESIGN_00100',NULL,4,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(101,13,'Waffle Knit','CG_DESIGN_00101',NULL,5,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(102,13,'Mohair Sweater','CG_DESIGN_00102',NULL,6,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(103,13,'Ribbed Jumper','CG_DESIGN_00103',NULL,7,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(104,13,'Colourblock Knit','CG_DESIGN_00104',NULL,8,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(105,14,'Swim Shorts','CG_DESIGN_00105',NULL,1,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(106,14,'Bikini Set','CG_DESIGN_00106',NULL,2,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(107,14,'One-Piece Swimsuit','CG_DESIGN_00107',NULL,3,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(108,14,'Rash Guard','CG_DESIGN_00108',NULL,4,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(109,14,'Board Shorts','CG_DESIGN_00109',NULL,5,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(110,14,'Swim Brief','CG_DESIGN_00110',NULL,6,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(111,14,'Tankini','CG_DESIGN_00111',NULL,7,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(112,14,'Swim Dress','CG_DESIGN_00112',NULL,8,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(113,15,'Basic Tee','CG_DESIGN_00113',NULL,1,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(114,15,'Oversized Tee','CG_DESIGN_00114',NULL,2,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(115,15,'Graphic Tee','CG_DESIGN_00115',NULL,3,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(116,15,'Striped Tee','CG_DESIGN_00116',NULL,4,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(117,15,'Ringer Tee','CG_DESIGN_00117',NULL,5,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(118,15,'Slim Fit Tee','CG_DESIGN_00118',NULL,6,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(119,15,'Boxy Tee','CG_DESIGN_00119',NULL,7,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(120,15,'Heavyweight Tee','CG_DESIGN_00120',NULL,8,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(121,16,'Chino Trouser','CG_DESIGN_00121',NULL,1,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(122,16,'Cargo Pant','CG_DESIGN_00122',NULL,2,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(123,16,'Formal Trouser','CG_DESIGN_00123',NULL,3,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(124,16,'Wide-Leg Pant','CG_DESIGN_00124',NULL,4,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(125,16,'Slim Trouser','CG_DESIGN_00125',NULL,5,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(126,16,'Pleated Pant','CG_DESIGN_00126',NULL,6,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(127,16,'Corduroy Pant','CG_DESIGN_00127',NULL,7,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(128,16,'Tapered Trouser','CG_DESIGN_00128',NULL,8,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(129,17,'Woven Short','CG_DESIGN_00129',NULL,1,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(130,17,'Culotte','CG_DESIGN_00130',NULL,2,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(131,17,'Palazzo Pant','CG_DESIGN_00131',NULL,3,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(132,17,'Utility Pant','CG_DESIGN_00132',NULL,4,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(133,17,'Bermuda Short','CG_DESIGN_00133',NULL,5,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(134,17,'Paperbag Trouser','CG_DESIGN_00134',NULL,6,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(135,17,'Woven Jogger','CG_DESIGN_00135',NULL,7,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(136,17,'Skort','CG_DESIGN_00136',NULL,8,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(137,18,'Classic Blouse','CG_DESIGN_00137',NULL,1,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(138,18,'Peplum Top','CG_DESIGN_00138',NULL,2,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(139,18,'Tunic Top','CG_DESIGN_00139',NULL,3,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(140,18,'Wrap Top','CG_DESIGN_00140',NULL,4,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(141,18,'Halter Top','CG_DESIGN_00141',NULL,5,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(142,18,'Kaftan Top','CG_DESIGN_00142',NULL,6,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(143,18,'Smock Top','CG_DESIGN_00143',NULL,7,1,'2026-07-25 05:04:51','2026-07-25 05:04:51'),(144,18,'Off-Shoulder Top','CG_DESIGN_00144',NULL,8,1,'2026-07-25 05:04:51','2026-07-25 05:04:51');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promises`
--

DROP TABLE IF EXISTS `promises`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promises` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `values_intro` text DEFAULT NULL,
  `vision_intro` text DEFAULT NULL,
  `pillars` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`pillars`)),
  `milestones` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`milestones`)),
  `stats` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`stats`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promises`
--

LOCK TABLES `promises` WRITE;
/*!40000 ALTER TABLE `promises` DISABLE KEYS */;
INSERT INTO `promises` VALUES (1,'Creating a positive impact has always been at the heart of Cotton Galary. From ethical sourcing to responsible manufacturing, our promise is simple — to deliver premium cotton apparel while caring for the people and the planet behind every garment.','Our vision is built on three commitments that guide everything we do.','[{\"icon\":\"fa-award\",\"title\":\"Quality\",\"subtitle\":\"Product Promise\",\"description\":\"We take pride in every stitch. Our design and innovation teams work closely with clients to develop durable, comfortable and beautifully finished garments built to last.\"},{\"icon\":\"fa-leaf\",\"title\":\"Responsibility\",\"subtitle\":\"Planet Promise\",\"description\":\"We are committed to reducing our environmental footprint \\u2014 from preferred sustainable fibres to responsible water, chemical and waste management across our partner factories.\"},{\"icon\":\"fa-handshake\",\"title\":\"Partnership\",\"subtitle\":\"People Promise\",\"description\":\"We invest in the people behind our products, championing fair, safe and ethical workplaces hand in hand with our compliant partner factories.\"}]','[{\"year\":\"2010\",\"description\":\"Cotton Galary is founded in Bangladesh with a commitment to quality cotton apparel.\"},{\"year\":\"2014\",\"description\":\"Onboarded our first fully compliant partner factories.\"},{\"year\":\"2017\",\"description\":\"Expanded exports across international markets including the USA, Singapore and Malaysia.\"},{\"year\":\"2020\",\"description\":\"Achieved key quality and sustainability certifications.\"},{\"year\":\"2023\",\"description\":\"Grew to a network of 120+ partner factories serving clients in 25 countries.\"}]','[{\"value\":\"100%\",\"label\":\"Compliant Partner Factories\"},{\"value\":\"25+\",\"label\":\"Countries Served\"},{\"value\":\"120+\",\"label\":\"Partner Factories\"},{\"value\":\"15\",\"label\":\"Years of Excellence\"}]','2026-07-25 06:38:39','2026-07-25 06:38:39');
/*!40000 ALTER TABLE `promises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('1XgAJr2zyJRmQaeXNUCKPMSINCmQxVRtXwtes4sB',NULL,'127.0.0.1','curl/8.14.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNnFETFhEWWJKaldQZGlHYndFbENFTnRpQjBLbEkzeG5CaTF1TmNsSiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1785072509),('4IXw3gXJtEvtQ0AQz2Iz3yOhQXFywmqzqZjntfO4',NULL,'127.0.0.1','curl/8.14.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiU3RqTm9rYjJRQ0ZqVkNiN1JoUFVJbmx5cm1hWXB3MWY3MWVsaUl5cyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Nzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZXNldC1wYXNzd29yZC90ZXN0dG9rZW4xMjM/ZW1haWw9c21iZWxhbDc3JTQwZ21haWwuY29tIjtzOjU6InJvdXRlIjtzOjE0OiJwYXNzd29yZC5yZXNldCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1785077259),('4nQXIfp6CXmarTf6nqys7QxrktCMxiVUfNdXg2MX',NULL,'127.0.0.1','curl/8.14.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiY1ZFZ3ZXWmEwWTV1VlFJWDJyaHRIZHdaZ1BOS2dhcGtIQUdtN1Z0QiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1785069819),('5c52Zhiy3cE40TTZgpYarXBo59N1g2C3M9HY9ju5',NULL,'127.0.0.1','curl/8.14.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiN0xLejV3cGZDcXVyM04waHlsWFZmSmFiQThIU2tnMDI0YmxJNTVPUyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1785070397),('6xBITjmMbl7IgRCcD4uVT7QEV4XM8Sb3AOxg4EFs',NULL,'127.0.0.1','curl/8.14.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoibmlRZkY5UkxZZ3ZKM1VCeENyTUFVWVRXNGtzTTBKcDFINzREMTBiRiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1785071219),('71W60zropE6vKoKvSGigSs5tfHVMSZFhQUofP8Ey',NULL,'127.0.0.1','curl/8.14.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiZVJZbEpZdGIzcVRobEQwSG14VWdUcG96ZDI4NmkxZXlkQmtsMEVCTCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1785077258),('BePJ6u7B11N1YqDR4KpLFImYCQr2KLw9s6fQDkui',NULL,'127.0.0.1','curl/8.14.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOXhLNnFhRGZXS204V05YU1NwbnRMdHlGSHFMSjB1N1pOTTlhQlE1aSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1785069203),('cv3y7NSAZ2kwSXAyiQiZJ5E0OOTmf91Wbltxdh6m',NULL,'127.0.0.1','curl/8.14.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiTlY3REdpRjVlN0xYUGNZY0JzemZIdmtQZVpVaE9OTTN5dkhTV0NaNyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1785071380),('IBTskGdFDB9M744VWtUk2oG4Ue4WMdEUApzX5GI4',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOGZTb01lSGpDaGFycVBmZ1c1b2FmV0lIRDEwTG16dnl2cllxc0RzUSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1785066374),('LDhjCPJMAPdC3woQGMnegEDEQJQt2v3iSOPILi08',NULL,'127.0.0.1','curl/8.14.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiUjh0UjBZejBHOElaOTlRc0NJSUtteFVYMVZPVVZZRm1NcExXQnRkUiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mb3Jnb3QtcGFzc3dvcmQiO3M6NToicm91dGUiO3M6MTY6InBhc3N3b3JkLnJlcXVlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1785077259),('NRGQySJqUOQLDYKhCcfz7mCpQsxFzlErnyyQw9OR',NULL,'127.0.0.1','curl/8.14.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNFdQcU45dFY2VUxkTzEyYVJrQzBHNUphQUoybkF4alhpbFdsRkxhcCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1785071844),('Qm89MaW1uN6VRPQPAuElc4cY29O6vcMojAC7LqNe',NULL,'127.0.0.1','curl/8.14.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ2Z2WXhHdTg5RGRPeEh3Rk9GWFRFVUNSQTBBbXE3ZURSVnlxSzFNMiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1785069226),('QRsd0Q3lhP7dVpMrl4ghnyb4M6sFvPaVOxuG65NP',NULL,'127.0.0.1','curl/8.14.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiYms3VTJWOG95VTllWVh5M0FNSnJ6THZDTlRPOUZMVXd2RDl5bVNEVyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1785071540),('rim7ixA6PBWHER6aol33Ez0o6qpnIoU1ZLESy51x',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoibUtLT0pMWEhpYUFXb1c5MXk5eTN1aHdHQWw3bHlzMWFUejBqeGJlQiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9tZXNzYWdlcyI7czo1OiJyb3V0ZSI7czoyMDoiYWRtaW4ubWVzc2FnZXMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1785074428),('S3pvZNZlrCzkJBDfsf7K9YZmJjwBTaeCyMdYIPsI',NULL,'127.0.0.1','curl/8.14.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiNXlDRjMxSjBFc1pHYzFBWmtWMzFVR0kzYUxKeU5XZmNIZllVb2pzaCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1785070882),('S6CyeI0xb443IokM2YPkBcEWNjxn9Hk86EtPguYv',NULL,'127.0.0.1','curl/8.14.1','YTo0OntzOjY6Il90b2tlbiI7czo0MDoib1FLYldxOUVTWjVPTktBUXJWbmVKMXBhUmhUTm5Gd3NPajdyMGhMQiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluL3Bhc3N3b3JkIjt9czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wYXNzd29yZCI7czo1OiJyb3V0ZSI7czoxOToiYWRtaW4ucGFzc3dvcmQuZWRpdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1785077260),('SN3J3LMMVrGjiVtptJ3M52jBAGQO7RBDLK8oP25l',NULL,'127.0.0.1','curl/8.14.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoiMkJESThTRURPbWJnUUdxVDU2dzhsQUJublFHNHVpN21tdHI3YUN5eSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mb3Jnb3QtcGFzc3dvcmQiO3M6NToicm91dGUiO3M6MTY6InBhc3N3b3JkLnJlcXVlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',1785077259),('v1jlEXXaObiaBXGgUUJIZIy72lPxUsdas3ewpyi6',NULL,'127.0.0.1','curl/8.14.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoibFkxZUNvZUxmYkVkdWFTSDZJbTAycjE4THg2R3FqbkpRWGdYMnd0dyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1785072611),('vlXTKUxjBB71dqBwOhONLSmDkvAjTq88x22SaOJY',NULL,'127.0.0.1','curl/8.14.1','YTozOntzOjY6Il90b2tlbiI7czo0MDoidzFEeUl3OE9uTDlVeDV1NmdzZHAxdVRwY25YQWtyUldROWRpTTdIQyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1785072487);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','smbelal77@gmail.com','admin',NULL,'$2y$12$aBAPw1/BEuIu7py6kcMdV.2TTYTqKQoDTNBjBfstQ3dz3YVf8cGj6',NULL,'2026-07-25 01:13:14','2026-07-25 01:13:14'),(2,'Rahim Uddin','user@cotton.test','user',NULL,'$2y$12$u8obfF2pHtbpeTZ74YzCAuTA7jbdfK5rGqo0z3eXpjeg8Ou/VSxB6',NULL,'2026-07-25 01:13:14','2026-07-25 01:13:14');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-07-26 20:48:25
