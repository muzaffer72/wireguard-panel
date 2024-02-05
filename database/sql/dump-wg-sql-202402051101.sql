-- MySQL dump 10.13  Distrib 8.3.0, for macos14.2 (x86_64)
--
-- Host: localhost    Database: wg-sql
-- ------------------------------------------------------
-- Server version	8.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `access_tokens`
--

DROP TABLE IF EXISTS `access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_tokens`
--

LOCK TABLES `access_tokens` WRITE;
/*!40000 ALTER TABLE `access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_notifications`
--

DROP TABLE IF EXISTS `admin_notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 : Unread 1: Read',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_notifications`
--

LOCK TABLES `admin_notifications` WRITE;
/*!40000 ALTER TABLE `admin_notifications` DISABLE KEYS */;
INSERT INTO `admin_notifications` VALUES (2,'cakra budiman has registered','https://server.billiongroup.net/admin/users/2/edit','https://server.billiongroup.net/images/avatars/default.png',1,'2024-01-30 06:41:17','2024-01-30 07:02:22'),(4,'billion budiman has registered','https://server.billiongroup.net/admin/users/4/edit','https://server.billiongroup.net/images/avatars/default.png',1,'2024-01-30 07:18:52','2024-01-30 10:38:22'),(6,'mocil group has registered','http://127.0.0.1:8000/admin/users/16/edit','http://127.0.0.1:8000/images/avatars/default.png',1,'2024-02-04 12:15:20','2024-02-04 12:20:45'),(7,'Omba has registered','http://127.0.0.1:8000/admin/users/18/edit','http://127.0.0.1:8000/',1,'2024-02-04 12:20:50','2024-02-04 12:27:51');
/*!40000 ALTER TABLE `admin_notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_password_resets`
--

DROP TABLE IF EXISTS `admin_password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `admin_password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_password_resets`
--

LOCK TABLES `admin_password_resets` WRITE;
/*!40000 ALTER TABLE `admin_password_resets` DISABLE KEYS */;
INSERT INTO `admin_password_resets` VALUES ('ganggasungain@gmail.com','$2y$10$87v586A7VFZTbT.n21UOL.8xi6FHUkUfMXXaTur.EePK60aCiwvCK','2024-01-30 19:52:53');
/*!40000 ALTER TABLE `admin_password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Admin Admin','Admin','Admin','admin@wireguard.com','images/avatars/default.png','$2y$10$Y1jR.KZbe486V4LjNJsPKO3C3fmFnQAQLNLFpNEFwpehAjwuhw5F6','6DblNBW7dHNtschFfVxODsHCHPIFsE55Tmr0dDL6rAnggOAPReHqJXnJlZag','2024-01-30 00:53:46','2024-02-04 04:18:34'),(2,'Admin Admin','Admin','Admin','support@billiongroup.net','images/avatars/default.png','$2y$10$eNDpdKv9S05spyqifxx0TO2MgP5hA1BjZza1E500qRnNyCYYEWeXe',NULL,'2024-01-30 06:32:10','2024-01-30 06:32:10');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `advertisements`
--

DROP TABLE IF EXISTS `advertisements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `advertisements` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alias` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertisements`
--

LOCK TABLES `advertisements` WRITE;
/*!40000 ALTER TABLE `advertisements` DISABLE KEYS */;
/*!40000 ALTER TABLE `advertisements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_articles`
--

DROP TABLE IF EXISTS `blog_articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog_articles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint unsigned NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blog_articles_slug_unique` (`slug`),
  KEY `blog_articles_category_id_foreign` (`category_id`),
  KEY `blog_articles_admin_id_foreign` (`admin_id`),
  KEY `blog_articles_lang_foreign` (`lang`),
  CONSTRAINT `blog_articles_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `blog_articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `blog_articles_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_articles`
--

LOCK TABLES `blog_articles` WRITE;
/*!40000 ALTER TABLE `blog_articles` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_categories`
--

DROP TABLE IF EXISTS `blog_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog_categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blog_categories_slug_unique` (`slug`),
  KEY `blog_categories_lang_foreign` (`lang`),
  CONSTRAINT `blog_categories_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_categories`
--

LOCK TABLES `blog_categories` WRITE;
/*!40000 ALTER TABLE `blog_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_comments`
--

DROP TABLE IF EXISTS `blog_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog_comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `article_id` bigint unsigned NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_comments_user_id_foreign` (`user_id`),
  KEY `blog_comments_article_id_foreign` (`article_id`),
  CONSTRAINT `blog_comments_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `blog_articles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `blog_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_comments`
--

LOCK TABLES `blog_comments` WRITE;
/*!40000 ALTER TABLE `blog_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capital` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `continent` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `continent_code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alpha_3` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'AF','Afghanistan','Kabul','Asia','AS','+93','AFN','؋','AFG','2021-11-03 22:07:15','2021-11-04 15:59:30'),(2,'AX','Aland Islands','Mariehamn','Europe','EU','+358','EUR','€','ALA','2021-11-03 22:07:15','2021-11-04 15:59:30'),(3,'AL','Albania','Tirana','Europe','EU','+355','ALL','Lek','ALB','2021-11-03 22:07:15','2021-11-04 15:59:30'),(4,'DZ','Algeria','Algiers','Africa','AF','+213','DZD','دج','DZA','2021-11-03 22:07:15','2021-11-04 15:59:30'),(5,'AS','American Samoa','Pago Pago','Oceania','OC','+1684','USD','$','ASM','2021-11-03 22:07:15','2021-11-04 15:59:30'),(6,'AD','Andorra','Andorra la Vella','Europe','EU','+376','EUR','€','AND','2021-11-03 22:07:15','2021-11-04 15:59:30'),(7,'AO','Angola','Luanda','Africa','AF','+244','AOA','Kz','AGO','2021-11-03 22:07:15','2021-11-04 15:59:30'),(8,'AI','Anguilla','The Valley','North America','NA','+1264','XCD','$','AIA','2021-11-03 22:07:15','2021-11-04 15:59:30'),(9,'AQ','Antarctica','Antarctica','Antarctica','AN','+672','AAD','$','ATA','2021-11-03 22:07:15','2021-11-04 15:59:30'),(10,'AG','Antigua and Barbuda','St. John\'s','North America','NA','+1268','XCD','$','ATG','2021-11-03 22:07:15','2021-11-04 15:59:30'),(11,'AR','Argentina','Buenos Aires','South America','SA','+54','ARS','$','ARG','2021-11-03 22:07:15','2021-11-04 15:59:30'),(12,'AM','Armenia','Yerevan','Asia','AS','+374','AMD','֏','ARM','2021-11-03 22:07:15','2021-11-04 15:59:30'),(13,'AW','Aruba','Oranjestad','North America','NA','+297','AWG','ƒ','ABW','2021-11-03 22:07:15','2021-11-04 15:59:30'),(14,'AU','Australia','Canberra','Oceania','OC','+61','AUD','$','AUS','2021-11-03 22:07:15','2021-11-04 15:59:30'),(15,'AT','Austria','Vienna','Europe','EU','+43','EUR','€','AUT','2021-11-03 22:07:15','2021-11-04 15:59:30'),(16,'AZ','Azerbaijan','Baku','Asia','AS','+994','AZN','m','AZE','2021-11-03 22:07:15','2021-11-04 15:59:30'),(17,'BS','Bahamas','Nassau','North America','NA','+1242','BSD','B$','BHS','2021-11-03 22:07:15','2021-11-04 15:59:30'),(18,'BH','Bahrain','Manama','Asia','AS','+973','BHD','.د.ب','BHR','2021-11-03 22:07:15','2021-11-04 15:59:30'),(19,'BD','Bangladesh','Dhaka','Asia','AS','+880','BDT','৳','BGD','2021-11-03 22:07:15','2021-11-04 15:59:30'),(20,'BB','Barbados','Bridgetown','North America','NA','+1246','BBD','Bds$','BRB','2021-11-03 22:07:15','2021-11-04 15:59:30'),(21,'BY','Belarus','Minsk','Europe','EU','+375','BYN','Br','BLR','2021-11-03 22:07:15','2021-11-04 15:59:30'),(22,'BE','Belgium','Brussels','Europe','EU','+32','EUR','€','BEL','2021-11-03 22:07:15','2021-11-04 15:59:30'),(23,'BZ','Belize','Belmopan','North America','NA','+501','BZD','$','BLZ','2021-11-03 22:07:15','2021-11-04 15:59:30'),(24,'BJ','Benin','Porto-Novo','Africa','AF','+229','XOF','CFA','BEN','2021-11-03 22:07:15','2021-11-04 15:59:30'),(25,'BM','Bermuda','Hamilton','North America','NA','+1441','BMD','$','BMU','2021-11-03 22:07:15','2021-11-04 15:59:30'),(26,'BT','Bhutan','Thimphu','Asia','AS','+975','BTN','Nu.','BTN','2021-11-03 22:07:15','2021-11-04 15:59:30'),(27,'BO','Bolivia','Sucre','South America','SA','+591','BOB','Bs.','BOL','2021-11-03 22:07:15','2021-11-04 15:59:30'),(28,'BQ','Bonaire, Sint Eustatius and Saba','Kralendijk','North America','NA','+599','USD','$','BES','2021-11-03 22:07:15','2021-11-04 15:59:30'),(29,'BA','Bosnia and Herzegovina','Sarajevo','Europe','EU','+387','BAM','KM','BIH','2021-11-03 22:07:15','2021-11-04 15:59:30'),(30,'BW','Botswana','Gaborone','Africa','AF','+267','BWP','P','BWA','2021-11-03 22:07:15','2021-11-04 15:59:30'),(31,'BV','Bouvet Island',NULL,'Antarctica','AN','+55','NOK','kr','BVT','2021-11-03 22:07:15','2021-11-04 15:59:30'),(32,'BR','Brazil','Brasilia','South America','SA','+55','BRL','R$','BRA','2021-11-03 22:07:15','2021-11-04 15:59:30'),(33,'IO','British Indian Ocean Territory','Diego Garcia','Asia','AS','+246','USD','$','IOT','2021-11-03 22:07:15','2021-11-04 15:59:30'),(34,'BN','Brunei Darussalam','Bandar Seri Begawan','Asia','AS','+673','BND','B$','BRN','2021-11-03 22:07:15','2021-11-04 15:59:30'),(35,'BG','Bulgaria','Sofia','Europe','EU','+359','BGN','Лв.','BGR','2021-11-03 22:07:15','2021-11-04 15:59:30'),(36,'BF','Burkina Faso','Ouagadougou','Africa','AF','+226','XOF','CFA','BFA','2021-11-03 22:07:15','2021-11-04 15:59:30'),(37,'BI','Burundi','Bujumbura','Africa','AF','+257','BIF','FBu','BDI','2021-11-03 22:07:15','2021-11-04 15:59:30'),(38,'KH','Cambodia','Phnom Penh','Asia','AS','+855','KHR','KHR','KHM','2021-11-03 22:07:15','2021-11-04 15:59:30'),(39,'CM','Cameroon','Yaounde','Africa','AF','+237','XAF','FCFA','CMR','2021-11-03 22:07:15','2021-11-04 15:59:30'),(40,'CA','Canada','Ottawa','North America','NA','+1','CAD','$','CAN','2021-11-03 22:07:15','2021-11-04 15:59:30'),(41,'CV','Cape Verde','Praia','Africa','AF','+238','CVE','$','CPV','2021-11-03 22:07:15','2021-11-04 15:59:30'),(42,'KY','Cayman Islands','George Town','North America','NA','+1345','KYD','$','CYM','2021-11-03 22:07:15','2021-11-04 15:59:30'),(43,'CF','Central African Republic','Bangui','Africa','AF','+236','XAF','FCFA','CAF','2021-11-03 22:07:15','2021-11-04 15:59:30'),(44,'TD','Chad','N\'Djamena','Africa','AF','+235','XAF','FCFA','TCD','2021-11-03 22:07:15','2021-11-04 15:59:30'),(45,'CL','Chile','Santiago','South America','SA','+56','CLP','$','CHL','2021-11-03 22:07:15','2021-11-04 15:59:30'),(46,'CN','China','Beijing','Asia','AS','+86','CNY','¥','CHN','2021-11-03 22:07:15','2021-11-04 15:59:30'),(47,'CX','Christmas Island','Flying Fish Cove','Asia','AS','+61','AUD','$','CXR','2021-11-03 22:07:15','2021-11-04 15:59:30'),(48,'CC','Cocos (Keeling) Islands','West Island','Asia','AS','+672','AUD','$','CCK','2021-11-03 22:07:15','2021-11-04 15:59:30'),(49,'CO','Colombia','Bogota','South America','SA','+57','COP','$','COL','2021-11-03 22:07:15','2021-11-04 15:59:30'),(50,'KM','Comoros','Moroni','Africa','AF','+269','KMF','CF','COM','2021-11-03 22:07:15','2021-11-04 15:59:30'),(51,'CG','Congo','Brazzaville','Africa','AF','+242','XAF','FC','COG','2021-11-03 22:07:15','2021-11-04 15:59:30'),(52,'CD','Congo, Democratic Republic of the Congo','Kinshasa','Africa','AF','+242','CDF','FC','COD','2021-11-03 22:07:15','2021-11-04 15:59:30'),(53,'CK','Cook Islands','Avarua','Oceania','OC','+682','NZD','$','COK','2021-11-03 22:07:15','2021-11-04 15:59:30'),(54,'CR','Costa Rica','San Jose','North America','NA','+506','CRC','₡','CRI','2021-11-03 22:07:15','2021-11-04 15:59:30'),(55,'CI','Cote D\'Ivoire','Yamoussoukro','Africa','AF','+225','XOF','CFA','CIV','2021-11-03 22:07:15','2021-11-04 15:59:30'),(56,'HR','Croatia','Zagreb','Europe','EU','+385','HRK','kn','HRV','2021-11-03 22:07:15','2021-11-04 15:59:30'),(57,'CU','Cuba','Havana','North America','NA','+53','CUP','$','CUB','2021-11-03 22:07:15','2021-11-04 15:59:30'),(58,'CW','Curacao','Willemstad','North America','NA','+599','ANG','ƒ','CUW','2021-11-03 22:07:15','2021-11-04 15:59:30'),(59,'CY','Cyprus','Nicosia','Asia','AS','+357','EUR','€','CYP','2021-11-03 22:07:15','2021-11-04 15:59:30'),(60,'CZ','Czech Republic','Prague','Europe','EU','+420','CZK','Kč','CZE','2021-11-03 22:07:15','2021-11-04 15:59:30'),(61,'DK','Denmark','Copenhagen','Europe','EU','+45','DKK','Kr.','DNK','2021-11-03 22:07:15','2021-11-04 15:59:30'),(62,'DJ','Djibouti','Djibouti','Africa','AF','+253','DJF','Fdj','DJI','2021-11-03 22:07:15','2021-11-04 15:59:30'),(63,'DM','Dominica','Roseau','North America','NA','+1767','XCD','$','DMA','2021-11-03 22:07:15','2021-11-04 15:59:30'),(64,'DO','Dominican Republic','Santo Domingo','North America','NA','+1809','DOP','$','DOM','2021-11-03 22:07:15','2021-11-04 15:59:30'),(65,'EC','Ecuador','Quito','South America','SA','+593','USD','$','ECU','2021-11-03 22:07:15','2021-11-04 15:59:30'),(66,'EG','Egypt','Cairo','Africa','AF','+20','EGP','ج.م','EGY','2021-11-03 22:07:15','2021-11-04 15:59:30'),(67,'SV','El Salvador','San Salvador','North America','NA','+503','USD','$','SLV','2021-11-03 22:07:15','2021-11-04 15:59:30'),(68,'GQ','Equatorial Guinea','Malabo','Africa','AF','+240','XAF','FCFA','GNQ','2021-11-03 22:07:15','2021-11-04 15:59:30'),(69,'ER','Eritrea','Asmara','Africa','AF','+291','ERN','Nfk','ERI','2021-11-03 22:07:15','2021-11-04 15:59:30'),(70,'EE','Estonia','Tallinn','Europe','EU','+372','EUR','€','EST','2021-11-03 22:07:15','2021-11-04 15:59:30'),(71,'ET','Ethiopia','Addis Ababa','Africa','AF','+251','ETB','Nkf','ETH','2021-11-03 22:07:15','2021-11-04 15:59:30'),(72,'FK','Falkland Islands (Malvinas)','Stanley','South America','SA','+500','FKP','£','FLK','2021-11-03 22:07:15','2021-11-04 15:59:30'),(73,'FO','Faroe Islands','Torshavn','Europe','EU','+298','DKK','Kr.','FRO','2021-11-03 22:07:15','2021-11-04 15:59:30'),(74,'FJ','Fiji','Suva','Oceania','OC','+679','FJD','FJ$','FJI','2021-11-03 22:07:15','2021-11-04 15:59:30'),(75,'FI','Finland','Helsinki','Europe','EU','+358','EUR','€','FIN','2021-11-03 22:07:15','2021-11-04 15:59:30'),(76,'FR','France','Paris','Europe','EU','+33','EUR','€','FRA','2021-11-03 22:07:15','2021-11-04 15:59:30'),(77,'GF','French Guiana','Cayenne','South America','SA','+594','EUR','€','GUF','2021-11-03 22:07:15','2021-11-04 15:59:30'),(78,'PF','French Polynesia','Papeete','Oceania','OC','+689','XPF','₣','PYF','2021-11-03 22:07:15','2021-11-04 15:59:30'),(79,'TF','French Southern Territories','Port-aux-Francais','Antarctica','AN','+262','EUR','€','ATF','2021-11-03 22:07:15','2021-11-04 15:59:30'),(80,'GA','Gabon','Libreville','Africa','AF','+241','XAF','FCFA','GAB','2021-11-03 22:07:15','2021-11-04 15:59:30'),(81,'GM','Gambia','Banjul','Africa','AF','+220','GMD','D','GMB','2021-11-03 22:07:15','2021-11-04 15:59:30'),(82,'GE','Georgia','Tbilisi','Asia','AS','+995','GEL','ლ','GEO','2021-11-03 22:07:15','2021-11-04 15:59:30'),(83,'DE','Germany','Berlin','Europe','EU','+49','EUR','€','DEU','2021-11-03 22:07:15','2021-11-04 15:59:30'),(84,'GH','Ghana','Accra','Africa','AF','+233','GHS','GH₵','GHA','2021-11-03 22:07:15','2021-11-04 15:59:30'),(85,'GI','Gibraltar','Gibraltar','Europe','EU','+350','GIP','£','GIB','2021-11-03 22:07:15','2021-11-04 15:59:30'),(86,'GR','Greece','Athens','Europe','EU','+30','EUR','€','GRC','2021-11-03 22:07:15','2021-11-04 15:59:30'),(87,'GL','Greenland','Nuuk','North America','NA','+299','DKK','Kr.','GRL','2021-11-03 22:07:15','2021-11-04 15:59:30'),(88,'GD','Grenada','St. George\'s','North America','NA','+1473','XCD','$','GRD','2021-11-03 22:07:15','2021-11-04 15:59:30'),(89,'GP','Guadeloupe','Basse-Terre','North America','NA','+590','EUR','€','GLP','2021-11-03 22:07:15','2021-11-04 15:59:30'),(90,'GU','Guam','Hagatna','Oceania','OC','+1671','USD','$','GUM','2021-11-03 22:07:15','2021-11-04 15:59:30'),(91,'GT','Guatemala','Guatemala City','North America','NA','+502','GTQ','Q','GTM','2021-11-03 22:07:15','2021-11-04 15:59:30'),(92,'GG','Guernsey','St Peter Port','Europe','EU','+44','GBP','£','GGY','2021-11-03 22:07:15','2021-11-04 15:59:30'),(93,'GN','Guinea','Conakry','Africa','AF','+224','GNF','FG','GIN','2021-11-03 22:07:15','2021-11-04 15:59:30'),(94,'GW','Guinea-Bissau','Bissau','Africa','AF','+245','XOF','CFA','GNB','2021-11-03 22:07:15','2021-11-04 15:59:30'),(95,'GY','Guyana','Georgetown','South America','SA','+592','GYD','$','GUY','2021-11-03 22:07:15','2021-11-04 15:59:30'),(96,'HT','Haiti','Port-au-Prince','North America','NA','+509','HTG','G','HTI','2021-11-03 22:07:15','2021-11-04 15:59:30'),(97,'HM','Heard Island and Mcdonald Islands','','Antarctica','AN','+0','AUD','$','HMD','2021-11-03 22:07:15','2021-11-04 15:59:30'),(98,'VA','Holy See (Vatican City State)','Vatican City','Europe','EU','+39','EUR','€','VAT','2021-11-03 22:07:15','2021-11-04 15:59:30'),(99,'HN','Honduras','Tegucigalpa','North America','NA','+504','HNL','L','HND','2021-11-03 22:07:15','2021-11-04 15:59:30'),(100,'HK','Hong Kong','Hong Kong','Asia','AS','+852','HKD','$','HKG','2021-11-03 22:07:15','2021-11-04 15:59:30'),(101,'HU','Hungary','Budapest','Europe','EU','+36','HUF','Ft','HUN','2021-11-03 22:07:15','2021-11-04 15:59:30'),(102,'IS','Iceland','Reykjavik','Europe','EU','+354','ISK','kr','ISL','2021-11-03 22:07:15','2021-11-04 15:59:30'),(103,'IN','India','New Delhi','Asia','AS','+91','INR','₹','IND','2021-11-03 22:07:15','2021-11-04 15:59:30'),(104,'ID','Indonesia','Jakarta','Asia','AS','+62','IDR','Rp','IDN','2021-11-03 22:07:15','2021-11-04 15:59:30'),(105,'IR','Iran, Islamic Republic of','Tehran','Asia','AS','+98','IRR','﷼','IRN','2021-11-03 22:07:15','2021-11-04 15:59:30'),(106,'IQ','Iraq','Baghdad','Asia','AS','+964','IQD','د.ع','IRQ','2021-11-03 22:07:15','2021-11-04 15:59:30'),(107,'IE','Ireland','Dublin','Europe','EU','+353','EUR','€','IRL','2021-11-03 22:07:15','2021-11-04 15:59:30'),(108,'IM','Isle of Man','Douglas, Isle of Man','Europe','EU','+44','GBP','£','IMN','2021-11-03 22:07:15','2021-11-04 15:59:30'),(109,'IL','Israel','Jerusalem','Asia','AS','+972','ILS','₪','ISR','2021-11-03 22:07:15','2021-11-04 15:59:30'),(110,'IT','Italy','Rome','Europe','EU','+39','EUR','€','ITA','2021-11-03 22:07:15','2021-11-04 15:59:30'),(111,'JM','Jamaica','Kingston','North America','NA','+1876','JMD','J$','JAM','2021-11-03 22:07:15','2021-11-04 15:59:30'),(112,'JP','Japan','Tokyo','Asia','AS','+81','JPY','¥','JPN','2021-11-03 22:07:15','2021-11-04 15:59:30'),(113,'JE','Jersey','Saint Helier','Europe','EU','+44','GBP','£','JEY','2021-11-03 22:07:15','2021-11-04 15:59:30'),(114,'JO','Jordan','Amman','Asia','AS','+962','JOD','ا.د','JOR','2021-11-03 22:07:15','2021-11-04 15:59:30'),(115,'KZ','Kazakhstan','Astana','Asia','AS','+7','KZT','лв','KAZ','2021-11-03 22:07:15','2021-11-04 15:59:30'),(116,'KE','Kenya','Nairobi','Africa','AF','+254','KES','KSh','KEN','2021-11-03 22:07:16','2021-11-04 15:59:30'),(117,'KI','Kiribati','Tarawa','Oceania','OC','+686','AUD','$','KIR','2021-11-03 22:07:16','2021-11-04 15:59:30'),(118,'KP','Korea, Democratic People\'s Republic of','Pyongyang','Asia','AS','+850','KPW','₩','PRK','2021-11-03 22:07:16','2021-11-04 15:59:30'),(119,'KR','Korea, Republic of','Seoul','Asia','AS','+82','KRW','₩','KOR','2021-11-03 22:07:16','2021-11-04 15:59:30'),(120,'XK','Kosovo','Pristina','Europe','EU','+381','EUR','€','XKX','2021-11-03 22:07:16','2021-11-04 15:59:30'),(121,'KW','Kuwait','Kuwait City','Asia','AS','+965','KWD','ك.د','KWT','2021-11-03 22:07:16','2021-11-04 15:59:30'),(122,'KG','Kyrgyzstan','Bishkek','Asia','AS','+996','KGS','лв','KGZ','2021-11-03 22:07:16','2021-11-04 15:59:30'),(123,'LA','Lao People\'s Democratic Republic','Vientiane','Asia','AS','+856','LAK','₭','LAO','2021-11-03 22:07:16','2021-11-04 15:59:30'),(124,'LV','Latvia','Riga','Europe','EU','+371','EUR','€','LVA','2021-11-03 22:07:16','2021-11-04 15:59:30'),(125,'LB','Lebanon','Beirut','Asia','AS','+961','LBP','£','LBN','2021-11-03 22:07:16','2021-11-04 15:59:30'),(126,'LS','Lesotho','Maseru','Africa','AF','+266','LSL','L','LSO','2021-11-03 22:07:16','2021-11-04 15:59:30'),(127,'LR','Liberia','Monrovia','Africa','AF','+231','LRD','$','LBR','2021-11-03 22:07:16','2021-11-04 15:59:30'),(128,'LY','Libyan Arab Jamahiriya','Tripolis','Africa','AF','+218','LYD','د.ل','LBY','2021-11-03 22:07:16','2021-11-04 15:59:30'),(129,'LI','Liechtenstein','Vaduz','Europe','EU','+423','CHF','CHf','LIE','2021-11-03 22:07:16','2021-11-04 15:59:30'),(130,'LT','Lithuania','Vilnius','Europe','EU','+370','EUR','€','LTU','2021-11-03 22:07:16','2021-11-04 15:59:30'),(131,'LU','Luxembourg','Luxembourg','Europe','EU','+352','EUR','€','LUX','2021-11-03 22:07:16','2021-11-04 15:59:30'),(132,'MO','Macao','Macao','Asia','AS','+853','MOP','$','MAC','2021-11-03 22:07:16','2021-11-04 15:59:30'),(133,'MK','Macedonia, the Former Yugoslav Republic of','Skopje','Europe','EU','+389','MKD','ден','MKD','2021-11-03 22:07:16','2021-11-04 15:59:30'),(134,'MG','Madagascar','Antananarivo','Africa','AF','+261','MGA','Ar','MDG','2021-11-03 22:07:16','2021-11-04 15:59:30'),(135,'MW','Malawi','Lilongwe','Africa','AF','+265','MWK','MK','MWI','2021-11-03 22:07:16','2021-11-04 15:59:30'),(136,'MY','Malaysia','Kuala Lumpur','Asia','AS','+60','MYR','RM','MYS','2021-11-03 22:07:16','2021-11-04 15:59:30'),(137,'MV','Maldives','Male','Asia','AS','+960','MVR','Rf','MDV','2021-11-03 22:07:16','2021-11-04 15:59:30'),(138,'ML','Mali','Bamako','Africa','AF','+223','XOF','CFA','MLI','2021-11-03 22:07:16','2021-11-04 15:59:30'),(139,'MT','Malta','Valletta','Europe','EU','+356','EUR','€','MLT','2021-11-03 22:07:16','2021-11-04 15:59:30'),(140,'MH','Marshall Islands','Majuro','Oceania','OC','+692','USD','$','MHL','2021-11-03 22:07:16','2021-11-04 15:59:30'),(141,'MQ','Martinique','Fort-de-France','North America','NA','+596','EUR','€','MTQ','2021-11-03 22:07:16','2021-11-04 15:59:30'),(142,'MR','Mauritania','Nouakchott','Africa','AF','+222','MRO','MRU','MRT','2021-11-03 22:07:16','2021-11-04 15:59:30'),(143,'MU','Mauritius','Port Louis','Africa','AF','+230','MUR','₨','MUS','2021-11-03 22:07:16','2021-11-04 15:59:30'),(144,'YT','Mayotte','Mamoudzou','Africa','AF','+269','EUR','€','MYT','2021-11-03 22:07:16','2021-11-04 15:59:30'),(145,'MX','Mexico','Mexico City','North America','NA','+52','MXN','$','MEX','2021-11-03 22:07:16','2021-11-04 15:59:30'),(146,'FM','Micronesia, Federated States of','Palikir','Oceania','OC','+691','USD','$','FSM','2021-11-03 22:07:16','2021-11-04 15:59:30'),(147,'MD','Moldova, Republic of','Chisinau','Europe','EU','+373','MDL','L','MDA','2021-11-03 22:07:16','2021-11-04 15:59:30'),(148,'MC','Monaco','Monaco','Europe','EU','+377','EUR','€','MCO','2021-11-03 22:07:16','2021-11-04 15:59:30'),(149,'MN','Mongolia','Ulan Bator','Asia','AS','+976','MNT','₮','MNG','2021-11-03 22:07:16','2021-11-04 15:59:30'),(150,'ME','Montenegro','Podgorica','Europe','EU','+382','EUR','€','MNE','2021-11-03 22:07:16','2021-11-04 15:59:30'),(151,'MS','Montserrat','Plymouth','North America','NA','+1664','XCD','$','MSR','2021-11-03 22:07:16','2021-11-04 15:59:30'),(152,'MA','Morocco','Rabat','Africa','AF','+212','MAD','DH','MAR','2021-11-03 22:07:16','2021-11-04 15:59:30'),(153,'MZ','Mozambique','Maputo','Africa','AF','+258','MZN','MT','MOZ','2021-11-03 22:07:16','2021-11-04 15:59:30'),(154,'MM','Myanmar','Nay Pyi Taw','Asia','AS','+95','MMK','K','MMR','2021-11-03 22:07:16','2021-11-04 15:59:30'),(155,'NA','Namibia','Windhoek','Africa','AF','+264','NAD','$','NAM','2021-11-03 22:07:16','2021-11-04 15:59:30'),(156,'NR','Nauru','Yaren','Oceania','OC','+674','AUD','$','NRU','2021-11-03 22:07:16','2021-11-04 15:59:30'),(157,'NP','Nepal','Kathmandu','Asia','AS','+977','NPR','₨','NPL','2021-11-03 22:07:16','2021-11-04 15:59:30'),(158,'NL','Netherlands','Amsterdam','Europe','EU','+31','EUR','€','NLD','2021-11-03 22:07:16','2021-11-04 15:59:30'),(159,'AN','Netherlands Antilles','Willemstad','North America','NA','+599','ANG','NAf','ANT','2021-11-03 22:07:16','2021-11-04 15:59:30'),(160,'NC','New Caledonia','Noumea','Oceania','OC','+687','XPF','₣','NCL','2021-11-03 22:07:16','2021-11-04 15:59:30'),(161,'NZ','New Zealand','Wellington','Oceania','OC','+64','NZD','$','NZL','2021-11-03 22:07:16','2021-11-04 15:59:30'),(162,'NI','Nicaragua','Managua','North America','NA','+505','NIO','C$','NIC','2021-11-03 22:07:16','2021-11-04 15:59:30'),(163,'NE','Niger','Niamey','Africa','AF','+227','XOF','CFA','NER','2021-11-03 22:07:16','2021-11-04 15:59:30'),(164,'NG','Nigeria','Abuja','Africa','AF','+234','NGN','₦','NGA','2021-11-03 22:07:16','2021-11-04 15:59:30'),(165,'NU','Niue','Alofi','Oceania','OC','+683','NZD','$','NIU','2021-11-03 22:07:16','2021-11-04 15:59:30'),(166,'NF','Norfolk Island','Kingston','Oceania','OC','+672','AUD','$','NFK','2021-11-03 22:07:16','2021-11-04 15:59:30'),(167,'MP','Northern Mariana Islands','Saipan','Oceania','OC','+1670','USD','$','MNP','2021-11-03 22:07:16','2021-11-04 15:59:30'),(168,'NO','Norway','Oslo','Europe','EU','+47','NOK','kr','NOR','2021-11-03 22:07:16','2021-11-04 15:59:30'),(169,'OM','Oman','Muscat','Asia','AS','+968','OMR','.ع.ر','OMN','2021-11-03 22:07:16','2021-11-04 15:59:30'),(170,'PK','Pakistan','Islamabad','Asia','AS','+92','PKR','₨','PAK','2021-11-03 22:07:16','2021-11-04 15:59:30'),(171,'PW','Palau','Melekeok','Oceania','OC','+680','USD','$','PLW','2021-11-03 22:07:16','2021-11-04 15:59:30'),(172,'PS','Palestinian Territory, Occupied','East Jerusalem','Asia','AS','+970','ILS','₪','PSE','2021-11-03 22:07:16','2021-11-04 15:59:30'),(173,'PA','Panama','Panama City','North America','NA','+507','PAB','B/.','PAN','2021-11-03 22:07:16','2021-11-04 15:59:30'),(174,'PG','Papua New Guinea','Port Moresby','Oceania','OC','+675','PGK','K','PNG','2021-11-03 22:07:16','2021-11-04 15:59:30'),(175,'PY','Paraguay','Asuncion','South America','SA','+595','PYG','₲','PRY','2021-11-03 22:07:16','2021-11-04 15:59:30'),(176,'PE','Peru','Lima','South America','SA','+51','PEN','S/.','PER','2021-11-03 22:07:16','2021-11-04 15:59:30'),(177,'PH','Philippines','Manila','Asia','AS','+63','PHP','₱','PHL','2021-11-03 22:07:16','2021-11-04 15:59:30'),(178,'PN','Pitcairn','Adamstown','Oceania','OC','+64','NZD','$','PCN','2021-11-03 22:07:16','2021-11-04 15:59:30'),(179,'PL','Poland','Warsaw','Europe','EU','+48','PLN','zł','POL','2021-11-03 22:07:16','2021-11-04 15:59:30'),(180,'PT','Portugal','Lisbon','Europe','EU','+351','EUR','€','PRT','2021-11-03 22:07:16','2021-11-04 15:59:30'),(181,'PR','Puerto Rico','San Juan','North America','NA','+1787','USD','$','PRI','2021-11-03 22:07:16','2021-11-04 15:59:30'),(182,'QA','Qatar','Doha','Asia','AS','+974','QAR','ق.ر','QAT','2021-11-03 22:07:16','2021-11-04 15:59:30'),(183,'RE','Reunion','Saint-Denis','Africa','AF','+262','EUR','€','REU','2021-11-03 22:07:16','2021-11-04 15:59:30'),(184,'RO','Romania','Bucharest','Europe','EU','+40','RON','lei','ROM','2021-11-03 22:07:16','2021-11-04 15:59:30'),(185,'RU','Russian Federation','Moscow','Asia','AS','+70','RUB','₽','RUS','2021-11-03 22:07:16','2021-11-04 15:59:30'),(186,'RW','Rwanda','Kigali','Africa','AF','+250','RWF','FRw','RWA','2021-11-03 22:07:16','2021-11-04 15:59:30'),(187,'BL','Saint Barthelemy','Gustavia','North America','NA','+590','EUR','€','BLM','2021-11-03 22:07:16','2021-11-04 15:59:30'),(188,'SH','Saint Helena','Jamestown','Africa','AF','+290','SHP','£','SHN','2021-11-03 22:07:16','2021-11-04 15:59:30'),(189,'KN','Saint Kitts and Nevis','Basseterre','North America','NA','+1869','XCD','$','KNA','2021-11-03 22:07:16','2021-11-04 15:59:30'),(190,'LC','Saint Lucia','Castries','North America','NA','+1758','XCD','$','LCA','2021-11-03 22:07:16','2021-11-04 15:59:30'),(191,'MF','Saint Martin','Marigot','North America','NA','+590','EUR','€','MAF','2021-11-03 22:07:16','2021-11-04 15:59:30'),(192,'PM','Saint Pierre and Miquelon','Saint-Pierre','North America','NA','+508','EUR','€','SPM','2021-11-03 22:07:16','2021-11-04 15:59:30'),(193,'VC','Saint Vincent and the Grenadines','Kingstown','North America','NA','+1784','XCD','$','VCT','2021-11-03 22:07:16','2021-11-04 15:59:30'),(194,'WS','Samoa','Apia','Oceania','OC','+684','WST','SAT','WSM','2021-11-03 22:07:16','2021-11-04 15:59:30'),(195,'SM','San Marino','San Marino','Europe','EU','+378','EUR','€','SMR','2021-11-03 22:07:16','2021-11-04 15:59:30'),(196,'ST','Sao Tome and Principe','Sao Tome','Africa','AF','+239','STD','Db','STP','2021-11-03 22:07:16','2021-11-04 15:59:30'),(197,'SA','Saudi Arabia','Riyadh','Asia','AS','+966','SAR','﷼','SAU','2021-11-03 22:07:16','2021-11-04 15:59:30'),(198,'SN','Senegal','Dakar','Africa','AF','+221','XOF','CFA','SEN','2021-11-03 22:07:16','2021-11-04 15:59:30'),(199,'RS','Serbia','Belgrade','Europe','EU','+381','RSD','din','SRB','2021-11-03 22:07:16','2021-11-04 15:59:30'),(200,'CS','Serbia and Montenegro','Belgrade','Europe','EU','+381','RSD','din','SCG','2021-11-03 22:07:16','2021-11-04 15:59:30'),(201,'SC','Seychelles','Victoria','Africa','AF','+248','SCR','SRe','SYC','2021-11-03 22:07:16','2021-11-04 15:59:30'),(202,'SL','Sierra Leone','Freetown','Africa','AF','+232','SLL','Le','SLE','2021-11-03 22:07:16','2021-11-04 15:59:30'),(203,'SG','Singapore','Singapur','Asia','AS','+65','SGD','$','SGP','2021-11-03 22:07:16','2021-11-04 15:59:30'),(204,'SX','Sint Maarten','Philipsburg','North America','NA','+1','ANG','ƒ','SXM','2021-11-03 22:07:16','2021-11-04 15:59:30'),(205,'SK','Slovakia','Bratislava','Europe','EU','+421','EUR','€','SVK','2021-11-03 22:07:16','2021-11-04 15:59:30'),(206,'SI','Slovenia','Ljubljana','Europe','EU','+386','EUR','€','SVN','2021-11-03 22:07:16','2021-11-04 15:59:30'),(207,'SB','Solomon Islands','Honiara','Oceania','OC','+677','SBD','Si$','SLB','2021-11-03 22:07:16','2021-11-04 15:59:30'),(208,'SO','Somalia','Mogadishu','Africa','AF','+252','SOS','Sh.so.','SOM','2021-11-03 22:07:16','2021-11-04 15:59:30'),(209,'ZA','South Africa','Pretoria','Africa','AF','+27','ZAR','R','ZAF','2021-11-03 22:07:16','2021-11-04 15:59:30'),(210,'GS','South Georgia and the South Sandwich Islands','Grytviken','Antarctica','AN','+500','GBP','£','SGS','2021-11-03 22:07:16','2021-11-04 15:59:30'),(211,'SS','South Sudan','Juba','Africa','AF','+211','SSP','£','SSD','2021-11-03 22:07:16','2021-11-04 15:59:30'),(212,'ES','Spain','Madrid','Europe','EU','+34','EUR','€','ESP','2021-11-03 22:07:16','2021-11-04 15:59:30'),(213,'LK','Sri Lanka','Colombo','Asia','AS','+94','LKR','Rs','LKA','2021-11-03 22:07:16','2021-11-04 15:59:30'),(214,'SD','Sudan','Khartoum','Africa','AF','+249','SDG','.س.ج','SDN','2021-11-03 22:07:16','2021-11-04 15:59:30'),(215,'SR','Suriname','Paramaribo','South America','SA','+597','SRD','$','SUR','2021-11-03 22:07:16','2021-11-04 15:59:30'),(216,'SJ','Svalbard and Jan Mayen','Longyearbyen','Europe','EU','+47','NOK','kr','SJM','2021-11-03 22:07:16','2021-11-04 15:59:30'),(217,'SZ','Swaziland','Mbabane','Africa','AF','+268','SZL','E','SWZ','2021-11-03 22:07:16','2021-11-04 15:59:30'),(218,'SE','Sweden','Stockholm','Europe','EU','+46','SEK','kr','SWE','2021-11-03 22:07:16','2021-11-04 15:59:30'),(219,'CH','Switzerland','Berne','Europe','EU','+41','CHF','CHf','CHE','2021-11-03 22:07:16','2021-11-04 15:59:30'),(220,'SY','Syrian Arab Republic','Damascus','Asia','AS','+963','SYP','LS','SYR','2021-11-03 22:07:16','2021-11-04 15:59:30'),(221,'TW','Taiwan, Province of China','Taipei','Asia','AS','+886','TWD','$','TWN','2021-11-03 22:07:16','2021-11-04 15:59:30'),(222,'TJ','Tajikistan','Dushanbe','Asia','AS','+992','TJS','SM','TJK','2021-11-03 22:07:16','2021-11-04 15:59:30'),(223,'TZ','Tanzania, United Republic of','Dodoma','Africa','AF','+255','TZS','TSh','TZA','2021-11-03 22:07:16','2021-11-04 15:59:30'),(224,'TH','Thailand','Bangkok','Asia','AS','+66','THB','฿','THA','2021-11-03 22:07:16','2021-11-04 15:59:30'),(225,'TL','Timor-Leste','Dili','Asia','AS','+670','USD','$','TLS','2021-11-03 22:07:16','2021-11-04 15:59:30'),(226,'TG','Togo','Lome','Africa','AF','+228','XOF','CFA','TGO','2021-11-03 22:07:16','2021-11-04 15:59:30'),(227,'TK','Tokelau',NULL,'Oceania','OC','+690','NZD','$','TKL','2021-11-03 22:07:16','2021-11-04 15:59:30'),(228,'TO','Tonga','Nuku\'alofa','Oceania','OC','+676','TOP','$','TON','2021-11-03 22:07:16','2021-11-04 15:59:30'),(229,'TT','Trinidad and Tobago','Port of Spain','North America','NA','+1868','TTD','$','TTO','2021-11-03 22:07:16','2021-11-04 15:59:30'),(230,'TN','Tunisia','Tunis','Africa','AF','+216','TND','ت.د','TUN','2021-11-03 22:07:16','2021-11-04 15:59:30'),(231,'TR','Turkey','Ankara','Asia','AS','+90','TRY','₺','TUR','2021-11-03 22:07:16','2021-11-04 15:59:30'),(232,'TM','Turkmenistan','Ashgabat','Asia','AS','+7370','TMT','T','TKM','2021-11-03 22:07:16','2021-11-04 15:59:30'),(233,'TC','Turks and Caicos Islands','Cockburn Town','North America','NA','+1649','USD','$','TCA','2021-11-03 22:07:16','2021-11-04 15:59:30'),(234,'TV','Tuvalu','Funafuti','Oceania','OC','+688','AUD','$','TUV','2021-11-03 22:07:16','2021-11-04 15:59:30'),(235,'UG','Uganda','Kampala','Africa','AF','+256','UGX','USh','UGA','2021-11-03 22:07:16','2021-11-04 15:59:30'),(236,'UA','Ukraine','Kiev','Europe','EU','+380','UAH','₴','UKR','2021-11-03 22:07:16','2021-11-04 15:59:30'),(237,'AE','United Arab Emirates','Abu Dhabi','Asia','AS','+971','AED','إ.د','ARE','2021-11-03 22:07:16','2021-11-04 15:59:30'),(238,'GB','United Kingdom','London','Europe','EU','+44','GBP','£','GBR','2021-11-03 22:07:16','2021-11-04 15:59:30'),(239,'US','United States','Washington','North America','NA','+1','USD','$','USA','2021-11-03 22:07:16','2021-11-04 15:59:30'),(240,'UM','United States Minor Outlying Islands',NULL,'North America','NA','+1','USD','$','UMI','2021-11-03 22:07:16','2021-11-04 15:59:30'),(241,'UY','Uruguay','Montevideo','South America','SA','+598','UYU','$','URY','2021-11-03 22:07:16','2021-11-04 15:59:30'),(242,'UZ','Uzbekistan','Tashkent','Asia','AS','+998','UZS','лв','UZB','2021-11-03 22:07:16','2021-11-04 15:59:30'),(243,'VU','Vanuatu','Port Vila','Oceania','OC','+678','VUV','VT','VUT','2021-11-03 22:07:16','2021-11-04 15:59:30'),(244,'VE','Venezuela','Caracas','South America','SA','+58','VEF','Bs','VEN','2021-11-03 22:07:16','2021-11-04 15:59:30'),(245,'VN','Viet Nam','Hanoi','Asia','AS','+84','VND','₫','VNM','2021-11-03 22:07:16','2021-11-04 15:59:30'),(246,'VG','Virgin Islands, British','Road Town','North America','NA','+1284','USD','$','VGB','2021-11-03 22:07:16','2021-11-04 15:59:30'),(247,'VI','Virgin Islands, U.s.','Charlotte Amalie','North America','NA','+1340','USD','$','VIR','2021-11-03 22:07:16','2021-11-04 15:59:30'),(248,'WF','Wallis and Futuna','Mata Utu','Oceania','OC','+681','XPF','₣','WLF','2021-11-03 22:07:16','2021-11-04 15:59:30'),(249,'EH','Western Sahara','El-Aaiun','Africa','AF','+212','MAD','MAD','ESH','2021-11-03 22:07:16','2021-11-04 15:59:30'),(250,'YE','Yemen','Sanaa','Asia','AS','+967','YER','﷼','YEM','2021-11-03 22:07:16','2021-11-04 15:59:30'),(251,'ZM','Zambia','Lusaka','Africa','AF','+260','ZMW','ZK','ZMB','2021-11-03 22:07:16','2021-11-04 15:59:30'),(252,'ZW','Zimbabwe','Harare','Africa','AF','+263','ZWL','$','ZWE','2021-11-03 22:07:16','2021-11-04 15:59:30');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` bigint NOT NULL DEFAULT '1',
  `plan_id` bigint unsigned DEFAULT NULL,
  `action_type` tinyint NOT NULL,
  `limit` bigint NOT NULL DEFAULT '1',
  `expiry_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `coupons_code_unique` (`code`),
  KEY `coupons_plan_id_foreign` (`plan_id`),
  CONSTRAINT `coupons_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
INSERT INTO `coupons` VALUES (2,'E5UO9KAGQD8W',100,9,0,1,'2024-12-12 11:11:00','2024-01-30 06:35:22','2024-01-30 06:35:22');
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editor_files`
--

DROP TABLE IF EXISTS `editor_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `editor_files` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editor_files`
--

LOCK TABLES `editor_files` WRITE;
/*!40000 ALTER TABLE `editor_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `editor_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `extensions`
--

DROP TABLE IF EXISTS `extensions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `extensions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credentials` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructions` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:Disabled 1:Enabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `extensions`
--

LOCK TABLES `extensions` WRITE;
/*!40000 ALTER TABLE `extensions` DISABLE KEYS */;
INSERT INTO `extensions` VALUES (1,'Google reCAPTCHA','google_recaptcha','images/extensions/google-recaptcha.png','{\"site_key\":\"6LfeZ5sgAAAAAJwRlYneM5fzK5immQe5x4PL-UHA\",\"secret_key\":\"6LfeZ5sgAAAAAE0x9xIzNtUC6fsGVDcelJEt2w8D\"}',NULL,0,'2022-02-23 19:40:12','2024-02-01 05:17:48'),(2,'Google Analytics 4','google_analytics','images/extensions/google-analytics.png','{\"measurement_id\":null}','<ul class=\"mb-0\"> \n<li>Enter google analytics 4 measurement ID, like <strong>G-12345ABC</strong></li> \n</ul>',0,'2022-02-23 19:40:12','2022-11-22 16:14:14'),(3,'Tawk.to','tawk_to','images/extensions/tawk-to.png','{\"api_key\":null}','<ul class=\"mb-0\"> \r\n<li>https://tawk.to/chat/<strong>API-KEY</strong></li> \r\n</ul>',0,'2022-02-23 19:40:12','2022-02-23 21:17:33'),(4,'Facebook OAuth','facebook_oauth','images/extensions/facebook-oauth.png','{\"client_id\":null,\"client_secret\":null}','<ul class=\"mb-0\"> \n<li><strong>Redirect URL :</strong> [URL]/login/facebook/callback</li> \n</ul>',0,'2022-02-23 19:40:12','2023-02-11 13:20:02'),(5,'Trustip','trustip','images/extensions/trustip.png','{\"api_key\":null}','<p class=\"mb-2\">Trustip is used to prevent guests who use VPN and proxy from registering and from using the free service.</p>\r\n<p class=\"mb-0\">You can get you api key from <a href=\"https://trustip.io/user/subscriptions\" target=\"_blank\">https://trustip.io/user/subscriptions</a>.</p>',0,'2022-02-23 19:40:12','2023-09-29 09:25:45');
/*!40000 ALTER TABLE `extensions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faqs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `faqs_lang_foreign` (`lang`),
  CONSTRAINT `faqs_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (1,'en','What is Lorem Ipsum?','<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>','2022-07-17 00:58:31','2022-07-17 00:58:31'),(2,'en','Why do we use it?','<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>','2022-07-17 00:58:58','2022-07-17 00:58:58'),(3,'en','Where does it come from?','<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>','2022-07-17 00:59:17','2022-07-17 00:59:17'),(4,'en','Where can I get some?','<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>','2022-07-17 00:59:33','2023-02-15 15:04:17');
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `features` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `features_lang_foreign` (`lang`),
  CONSTRAINT `features_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `features`
--

LOCK TABLES `features` WRITE;
/*!40000 ALTER TABLE `features` DISABLE KEYS */;
INSERT INTO `features` VALUES (1,'en','High-Quality Image Generation','images/others/features/nfgvCiJrrvfafDV_1676569744.png','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat incidunt consectetur voluptates.','2023-02-05 19:19:05','2023-02-16 11:49:04'),(2,'en','Advanced AI Algorithms','images/others/features/9zSq2pAzVCmvOlP_1675646687.png','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat incidunt consectetur voluptates.','2023-02-05 19:24:11','2023-02-05 19:24:47'),(3,'en','Multiple Sizes Supported','images/others/features/iByyssENEt96mK7_1676570115.png','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat incidunt consectetur voluptates.','2023-02-05 19:26:31','2023-02-17 19:23:19'),(4,'en','User-Friendly Interface','images/others/features/dKLhhcflS5XZiJr_1675646883.png','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat incidunt consectetur voluptates.','2023-02-05 19:28:03','2023-02-05 19:28:03'),(5,'en','Image Saving','images/others/features/OAiLxsvv8DwoUPo_1676570018.png','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat incidunt consectetur voluptates.','2023-02-05 19:29:55','2023-02-16 11:53:38'),(6,'en','Flexible Pricing','images/others/features/9S61O7CWo6nWbPK_1675647227.png','Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat incidunt consectetur voluptates.','2023-02-05 19:32:51','2023-02-05 19:33:47');
/*!40000 ALTER TABLE `features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `footer_menu`
--

DROP TABLE IF EXISTS `footer_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `footer_menu` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `order` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `footer_menu_name_unique` (`name`),
  KEY `footer_menu_lang_foreign` (`lang`),
  KEY `footer_menu_parent_id_foreign` (`parent_id`),
  CONSTRAINT `footer_menu_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE,
  CONSTRAINT `footer_menu_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `footer_menu` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `footer_menu`
--

LOCK TABLES `footer_menu` WRITE;
/*!40000 ALTER TABLE `footer_menu` DISABLE KEYS */;
INSERT INTO `footer_menu` VALUES (1,'Company','/page-example','en',NULL,1,'2023-02-05 17:20:43','2023-02-05 17:32:39'),(2,'About Us','/page-example','en',1,1,'2023-02-05 17:21:04','2023-02-05 17:21:26'),(3,'Careers','/page-example','en',1,2,'2023-02-05 17:21:21','2023-02-05 17:32:58'),(4,'Legal','/page-example','en',NULL,2,'2023-02-05 17:21:53','2023-02-05 17:33:43'),(5,'Privacy policy','/privacy-policy','en',4,1,'2023-02-05 17:22:03','2023-02-10 20:47:39'),(6,'Terms of use','/terms-of-use','en',4,2,'2023-02-05 17:22:16','2023-02-10 20:47:48'),(7,'Copyright Policy','/page-example','en',4,4,'2023-02-05 17:22:27','2023-02-05 17:34:26'),(8,'Contact Us','/contact-us','en',1,3,'2023-02-05 17:22:53','2023-11-10 16:57:29'),(10,'Press Room','/page-example','en',1,4,'2023-02-05 17:33:25','2023-02-05 17:33:33'),(11,'Cookies Policy','/page-example','en',4,3,'2023-02-05 17:34:06','2023-02-05 17:34:11'),(12,'Support','/page-example','en',NULL,3,'2023-02-05 17:34:49','2023-02-05 17:35:22'),(13,'Help Center','/page-example','en',12,1,'2023-02-05 17:35:02','2023-02-05 17:35:22'),(14,'Customer Service','/page-example','en',12,2,'2023-02-05 17:35:12','2023-02-05 17:35:22'),(15,'Frequently Asked Questions','/page-example','en',12,3,'2023-02-05 17:35:28','2023-02-05 17:35:33'),(16,'Report a Problem','/page-example','en',12,4,'2023-02-05 17:35:49','2023-02-05 17:35:53'),(17,'Explore','/page-example','en',NULL,4,'2023-02-05 17:36:27','2023-02-05 17:38:22'),(18,'Features','/features','en',17,1,'2023-02-05 17:37:52','2023-02-10 20:12:43'),(19,'Pricing','/pricing','en',17,2,'2023-02-05 17:38:04','2023-02-10 20:12:34'),(20,'Blog','/blog','en',17,3,'2023-02-05 17:38:14','2023-02-10 20:12:26'),(21,'FAQs','/faqs','en',17,4,'2023-02-19 17:18:46','2023-02-19 17:18:52');
/*!40000 ALTER TABLE `footer_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `languages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction` tinyint NOT NULL COMMENT '1:LTR 2:RTL',
  `sort_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `languages_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES (1,'English','images/flags/en.png','en',1,0,'2021-12-11 14:35:51','2023-02-17 19:24:05');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_templates`
--

DROP TABLE IF EXISTS `mail_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mail_templates` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortcodes` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `mail_templates_lang_foreign` (`lang`),
  CONSTRAINT `mail_templates_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_templates`
--

LOCK TABLES `mail_templates` WRITE;
/*!40000 ALTER TABLE `mail_templates` DISABLE KEYS */;
INSERT INTO `mail_templates` VALUES (1,'en','password_reset','Reset Password','Reset Password Notification','<figure class=\"table\"><table><tbody><tr><td><figure class=\"table\"><table><tbody><tr><td><figure class=\"table\"><table><tbody><tr><td><img class=\"image_resized\" style=\"width:35%;\" src=\"https://assets.unlayer.com/stock-templates/1706687787287-480574.png\" alt=\"image\"></td></tr></tbody></table></figure></td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td><h2 style=\"text-align:center;\"><strong>Forget password ?</strong></h2></td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td><h2>If you\'ve lost your password or wish to reset it, use the link below to get started:</h2></td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td><strong>{{link}}</strong></td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td><h2><span style=\"background-color:rgb(255,255,255);color:rgb(69,80,86);\">We cannot simply send you your old password. A unique link to reset your password has been generated for you. To reset your password, click the following link and follow the instructions.</span></h2></td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td><a href=\"{{link}}\">Reset Your Password&nbsp;</a></td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td><figure class=\"table\"><table><tbody><tr><td><a href=\"https://www.facebook.com/unlayer\"><img src=\"images/image-3.png\" alt=\"Facebook\">&nbsp;</a></td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td><a href=\"https://twitter.com/unlayerapp\"><img src=\"images/image-1.png\" alt=\"Twitter\">&nbsp;</a></td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td><a href=\"https://www.linkedin.com/company/unlayer/mycompany/\"><img src=\"images/image-2.png\" alt=\"LinkedIn\">&nbsp;</a></td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td><a href=\"https://www.instagram.com/unlayer_official/\"><img src=\"images/image-4.png\" alt=\"Instagram\">&nbsp;</a></td></tr></tbody></table></figure></td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td>&nbsp;</td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td><figure class=\"table\"><table><tbody><tr><td>&nbsp;</td></tr></tbody></table></figure></td></tr></tbody></table></figure><figure class=\"table\"><table><tbody><tr><td><figure class=\"table\"><table><tbody><tr><td><img class=\"image_resized\" style=\"width:100%;\" src=\"images/image-5.png\" alt=\"image\"></td></tr></tbody></table></figure></td></tr></tbody></table></figure></td></tr></tbody></table></figure>','{\n\"link\":\"Password reset link\",\n\"expiry_time\":\"Link expiry time\",\n\"website_name\":\"Your website name\"\n}',1),(3,'en','email_verification','Email Verification','Verify Email Address','<h2>Hello!</h2><p>Please click on the link below to verify your email address.</p><p><a href=\"{{link}}\">{{link}}</a></p><p>If you did not create an account, no further action is required.</p><p>&nbsp;</p><p>Regards,<br><strong>{{website_name}}</strong></p>','{\"link\":\"Email verification link\",\"website_name\":\"Your website name\"}',1),(4,'en','subscription_about_expired','Subscription About To Expired Notification','Your subscription is about to expire','<h2>Hi, <strong>{{username}}</strong></h2><p>We hope you\'re enjoying using our service. Just a friendly reminder that your subscription on <strong>{{plan}}</strong> plan is about to expire on <strong>{{expiry_date}}</strong>.</p><p>To continue receiving the benefits of our service, please renew your subscription before the expiration date. Simply follow the link below to access your account and renew:</p><p><a href=\"{{link}}\">{{link}}</a></p><p>Our team is always here to assist you with any questions or concerns.</p><p>Thank you for being a valued customer.</p><p>Best regards,<br><strong>{{website_name}}</strong></p>','{\"username\":\"User name\",\"plan\":\"Subscription plan name\",\"expiry_date\":\"Subscription expiry date\",\"link\":\"User Subscription page\",\"website_name\":\"Your website name\"}',1),(5,'en','subscription_expired','Subscription Expired Notification','Your subscription has been expired','<h2>Hi, <strong>{{username}}</strong></h2><p>I hope this email finds you well. We wanted to let you know that your subscription on <strong>{{plan}}</strong> plan has expired on <strong>{{expiry_date}}</strong>.</p><p>We understand that life can get busy, but we would love the opportunity to continue serving you. If you renew your subscription now, you\'ll be able to take advantage of all the benefits and services we have to offer.</p><p>Renewing your subscription is easy, simply log into your account and select the plan that works best for you, or by clicking on the link below. If you have any questions or concerns, please don\'t hesitate to reach out to our customer support team.</p><p><a href=\"{{link}}\">{{link}}</a></p><p>Please note that if you do not renew your subscription soon, it will be deleted permanently. We would hate to see you go, but if you do decide to let your subscription expire, please know that it has been a pleasure serving you.</p><p>Thank you for choosing us, and we hope to have the opportunity to serve you again soon.</p><p>Best regards,<br><strong>{{website_name}}</strong></p>','{\"username\":\"User name\",\"plan\":\"Subscription plan name\",\"expiry_date\":\"Subscription expiry date\",\"link\":\"User Subscription page\",\"website_name\":\"Your website name\"}',1),(6,'en','subscription_deleted','Subscription Deleted Notification','Your subscription has been deleted','<h2>Hi, <strong>{{username}}</strong></h2><p>We regret to inform you that your subscription on <strong>{{plan}}</strong> plan has been deleted due to its expiration.</p><p>We understand that you might still be interested in using our services, and we would be more than happy to welcome you back as a subscriber. If you have any questions or concerns, please don\'t hesitate to reach out to us.</p><p>Thank you for choosing us as your service provider, and we hope to have the opportunity to serve you again in the future.</p><p>Best regards,<br><strong>{{website_name}}</strong></p>','{\"username\":\"User name\",\"plan\":\"Subscription plan name\",\"website_name\":\"Your website name\"}',1);
/*!40000 ALTER TABLE `mail_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (5,'2021_10_03_223916_create_admins_table',1),(6,'2021_10_03_224118_create_admin_password_resets',1),(12,'2021_10_07_221832_create_settings_table',4),(27,'2021_10_14_230536_create_languages_table',8),(54,'2021_10_04_213420_create_pages_table',14),(55,'2021_10_06_201713_create_blog_categories_table',14),(56,'2021_10_06_201752_create_blog_articles_table',14),(62,'2021_11_03_225531_create_countries_table',19),(73,'2021_12_01_100425_create_admin_notifications_table',24),(87,'2022_01_06_180145_create_blog_comments_table',32),(93,'2022_02_23_213634_create_extensions_table',37),(97,'2022_01_06_225055_create_features_table',41),(98,'2021_10_24_215104_create_seo_configurations_table',42),(101,'2022_04_03_220038_create_mail_templates_table',43),(104,'2014_10_12_000000_create_users_table',44),(105,'2014_10_12_100000_create_password_resets_table',44),(106,'2019_12_14_000001_create_personal_access_tokens_table',44),(107,'2021_11_01_162229_create_user_logs_table',44),(108,'2021_12_05_230539_create_social_providers_table',45),(109,'2021_12_14_233352_create_navbar_menu_table',46),(113,'2023_02_03_131610_create_plugins_table',48),(114,'2023_02_04_164717_create_editor_files_table',49),(116,'2021_12_15_215308_create_footer_menu_table',50),(123,'2022_03_07_231527_create_taxes_table',55),(124,'2022_01_08_213840_create_payment_gateways_table',56),(129,'2022_06_05_002924_create_coupons_table',60),(130,'2023_02_07_162343_create_transactions_table',61),(134,'2023_02_07_151751_create_subscriptions_table',62),(137,'2021_10_28_191044_create_storage_providers_table',64),(139,'2023_02_15_155209_create_faqs_table',65),(141,'2023_02_06_210846_create_plans_table',66),(144,'2023_02_17_213506_create_generated_images_table',67),(150,'2023_06_09_162152_create_api_providers_table',69),(151,'2024_02_01_114926_create_access_tokens_table',70),(152,'2024_02_01_115246_create_access_tokens_table',71);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `navbar_menu`
--

DROP TABLE IF EXISTS `navbar_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `navbar_menu` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint unsigned DEFAULT NULL,
  `order` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `navbar_menu_name_unique` (`name`),
  KEY `navbar_menu_lang_foreign` (`lang`),
  KEY `navbar_menu_parent_id_foreign` (`parent_id`),
  CONSTRAINT `navbar_menu_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE,
  CONSTRAINT `navbar_menu_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `navbar_menu` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `navbar_menu`
--

LOCK TABLES `navbar_menu` WRITE;
/*!40000 ALTER TABLE `navbar_menu` DISABLE KEYS */;
INSERT INTO `navbar_menu` VALUES (6,'Home','/','en',NULL,1,'2023-02-01 15:40:56','2023-02-01 15:59:00'),(7,'Features','/features','en',NULL,2,'2023-02-01 15:58:00','2023-02-10 20:11:38'),(8,'Pricing','/pricing','en',NULL,3,'2023-02-01 16:07:47','2023-02-10 20:11:58'),(9,'Blog','/blog','en',NULL,4,'2023-02-05 16:55:35','2023-02-05 16:57:11'),(11,'More','/','en',NULL,6,'2023-02-05 16:57:50','2023-02-10 20:50:33'),(12,'Terms of use','/terms-of-use','en',11,2,'2023-02-05 16:58:00','2023-02-10 20:51:29'),(13,'Privacy policy','/privacy-policy','en',11,1,'2023-02-05 16:58:21','2023-02-10 20:51:19');
/*!40000 ALTER TABLE `navbar_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_page_slug_unique` (`slug`),
  KEY `pages_lang_foreign` (`lang`),
  CONSTRAINT `pages_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (4,'en','Privacy Policy','privacy-policy','<p><strong>What is Lorem Ipsum?</strong></p><p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><strong>Where does it come from?</strong></p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p><strong>Why do we use it?</strong></p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p><strong>Where can I get some?</strong></p><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>','Lorem Ipsum is simply dummy text of the printing and typesetting industry',37,'2023-01-28 11:56:37','2024-01-31 20:44:40'),(5,'en','Terms of use','terms-of-use','<p><strong>What is Lorem Ipsum?</strong></p><p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><strong>Where does it come from?</strong></p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p><strong>Why do we use it?</strong></p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p><strong>Where can I get some?</strong></p><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>','Terms of use',4,'2023-01-28 11:57:10','2023-11-10 11:51:48'),(6,'en','Page Example','page-example','<p><strong>What is Lorem Ipsum?</strong></p><p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p><p><strong>Where does it come from?</strong></p><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p><p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p><p><strong>Why do we use it?</strong></p><p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p><p><strong>Where can I get some?</strong></p><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>','Page Example',7,'2023-02-10 20:48:45','2024-01-30 03:37:16');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('cakrabudiman@icloud.com','$2y$10$D5c.84gOQIE/PuUfawhHTODKMa7ZewvxvSS5jb3b8S0KWWSHpH9L.','2024-01-31 14:59:16'),('ganggasungain@gmail.com','$2y$10$Y5wQIXhHFMBeMNg7vRfeq.69KVEkgEx8ZtATvH6Hup17ofjwrmcci','2024-02-04 13:13:14');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_gateways`
--

DROP TABLE IF EXISTS `payment_gateways`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_gateways` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `handler` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supported_currencies` text COLLATE utf8mb4_unicode_ci,
  `fees` int NOT NULL,
  `min` double(10,2) NOT NULL,
  `test_mode` tinyint(1) DEFAULT NULL COMMENT 'null 0:Disbaled 1:Enabled',
  `credentials` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `instructions` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:Disabled 1:Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_gateways`
--

LOCK TABLES `payment_gateways` WRITE;
/*!40000 ALTER TABLE `payment_gateways` DISABLE KEYS */;
INSERT INTO `payment_gateways` VALUES (1,'Paypal','paypal_express','App\\Http\\Controllers\\Frontend\\Gateways\\PaypalExpressController','images/payments/l6yGIXyP6SbqTrA_1641691269.png','[\"AUD\",\"BRL\",\"CAD\",\"CZK\",\"DKK\",\"EUR\",\"HKD\",\"HUF\",\"INR\",\"ILS\",\"JPY\",\"MYR\",\"MXN\",\"TWD\",\"NZD\",\"NOK\",\"PHP\",\"PLN\",\"GBP\",\"RUB\",\"SGD\",\"SEK\",\"CHF\",\"THB\",\"USD\"]',0,0.00,1,'{\"client_id\":\"AWVG-PsbqJQbMVAe5pNXBljdyCbVprd4JjeFmRz74WgaVXMFVVU26CksKCVqH6R7bbVt-9qTmZXDplS8\",\"client_secret\":\"EGhODz2uuHKkQBR4_NomZUNKK3InA4t-00eURSmqi4EoXgWPwL0JWZHpkZxiboQFX8aQxc99QVGY8cE6\"}','<ul class=\"mb-0\"> \r\n<li>You can get the Api Keys from : <a target=\"__blank\" href=\"https://developer.paypal.com/developer/applications/create\">https://developer.paypal.com/developer/applications/create</a>&nbsp;</li> \r\n</ul>',1,'2022-01-08 20:05:29','2024-01-30 02:44:17'),(2,'Stripe','stripe_checkout','App\\Http\\Controllers\\Frontend\\Gateways\\StripeCheckoutController','images/payments/ufBAiDA1bT2sZ4O_1655769600.png','[\"USD\",\"AUD\",\"BRL\",\"CAD\",\"CHF\",\"DKK\",\"EUR\",\"GBP\",\"HKD\",\"INR\",\"JPY\",\"MXN\",\"MYR\",\"NOK\",\"NZD\",\"PLN\",\"SEK\",\"SGD\"]',0,0.50,NULL,'{\"publishable_key\":\"pk_test_IJqpwYB54HdbFAYT3ez9ulSG00kRLtQTkx\",\"secret_key\":\"sk_test_51FcAdpB0BecTjahxyEMfYbhpaf48f32EgrDH49KWXvL40F70T3asLG5BYSgfFfUTenR47RZGCwoIvyLT9mKoSHdm00qAxnb6TH\"}','<ul class=\"mb-0\"> <li>You can get the API keys from : <a target=\"__blank\" href=\"https://dashboard.stripe.com/apikeys\">https://dashboard.stripe.com/apikeys</a>&nbsp;</li>\r\n</ul>',1,'2022-01-08 20:05:29','2024-01-31 20:37:45'),(3,'Mollie','mollie','App\\Http\\Controllers\\Frontend\\Gateways\\MollieController','images/payments/mollie.png','[\"AED\",\"AUD\",\"BGN\",\"BRL\",\"CAD\",\"CHF\",\"CZK\",\"DKK\",\"EUR\",\"GBP\",\"HKD\",\"HRK\",\"HUF\",\"ILS\",\"ISK\",\"JPY\",\"MXN\",\"MYR\",\"NOK\",\"NZD\",\"PHP\",\"PLN\",\"RON\",\"RUB\",\"SEK\",\"SGD\",\"THB\",\"TWD\",\"USD\",\"ZAR\"]',0,0.00,NULL,'{\"api_key\":null}','<ul class=\"mb-0\"> <li>You can get the API key from : <a target=\"__blank\" href=\"https://www.mollie.com/dashboard\">https://www.mollie.com/dashboard</a>&nbsp;</li>\r\n</ul>',0,'2022-01-08 18:05:29','2023-06-10 14:50:06'),(4,'Razorpay','razorpay','App\\Http\\Controllers\\Frontend\\Gateways\\RazorpayController','images/payments/E9tyZzO5PqhB34H_1670195643.png','[\"AUD\",\"BRL\",\"CAD\",\"CZK\",\"DKK\",\"EUR\",\"GBP\",\"HKD\",\"HUF\",\"ILS\",\"INR\",\"JPY\",\"MXN\",\"MYR\",\"NOK\",\"NZD\",\"PHP\",\"PLN\",\"RUB\",\"SEK\",\"SGD\",\"THB\",\"TRY\",\"USD\",\"ZAR\"]',0,0.00,NULL,'{\"key_id\":\"\",\"key_secret\":\"\"}','<ul class=\"mb-0\"> <li>You can get the API keys from : <a target=\"__blank\" href=\"https://dashboard.razorpay.com/app/keys\">https://dashboard.razorpay.com/app/keys</a>&nbsp;</li>\r\n</ul>',0,'2022-01-08 18:05:29','2023-11-10 12:41:15');
/*!40000 ALTER TABLE `payment_gateways` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interval` tinyint NOT NULL COMMENT '1:Monthly 2:Yearly',
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `expiration` int DEFAULT NULL,
  `advertisements` tinyint(1) NOT NULL DEFAULT '0',
  `custom_features` longtext COLLATE utf8mb4_unicode_ci,
  `is_free` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:No 1:Yes',
  `login_require` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:No 1:Yes',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:No 1:Yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plans`
--

LOCK TABLES `plans` WRITE;
/*!40000 ALTER TABLE `plans` DISABLE KEYS */;
INSERT INTO `plans` VALUES (3,'Monthly Plan','Monthly Plan',1,12.99,1,0,NULL,0,1,1,'2023-02-15 17:19:46','2024-01-30 06:33:39'),(9,'Yearly Plan','Yearly Plan',2,69.99,NULL,0,NULL,0,1,1,'2024-01-30 03:16:20','2024-01-30 06:34:06'),(13,'Free Plan','Free Plan',2,0.00,NULL,1,NULL,1,0,0,'2024-02-04 12:12:26','2024-02-04 12:13:16');
/*!40000 ALTER TABLE `plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plugins`
--

DROP TABLE IF EXISTS `plugins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `plugins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `purchase_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plugins`
--

LOCK TABLES `plugins` WRITE;
/*!40000 ALTER TABLE `plugins` DISABLE KEYS */;
/*!40000 ALTER TABLE `plugins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seo_configurations`
--

DROP TABLE IF EXISTS `seo_configurations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seo_configurations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `robots_index` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `robots_follow_links` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `seo_configurations_lang_unique` (`lang`),
  CONSTRAINT `seo_configurations_lang_foreign` FOREIGN KEY (`lang`) REFERENCES `languages` (`code`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seo_configurations`
--

LOCK TABLES `seo_configurations` WRITE;
/*!40000 ALTER TABLE `seo_configurations` DISABLE KEYS */;
INSERT INTO `seo_configurations` VALUES (3,'en','AI-Powered Image Generator for Unique and Custom Images','Create unique and custom images effortlessly with Imgurai - the AI-powered image generator.','images generate, ai image generator, ai images, ai free images','index','follow','2023-02-06 18:01:59','2023-02-18 10:33:11');
/*!40000 ALTER TABLE `seo_configurations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'general','{\"site_name\":\"billiongroup\",\"site_url\":\"https:\\/\\/server.billiongroup.net\",\"contact_email\":\"support@billiongroup.net\",\"terms_of_service_link\":null,\"date_format\":\"10\",\"timezone\":\"America\\/New_York\"}'),(2,'media','{\"dark_logo\":\"images\\/dark-logo.jpg\",\"light_logo\":\"images\\/light-logo.jpg\",\"favicon\":\"images\\/favicon.jpg\",\"social_image\":\"images\\/social-image.jpg\"}'),(3,'colors','{\"primary_color\":\"#0276FF\",\"secondary_color\":\"#0064DB\",\"third_color\":\"#061324\",\"background_color\":\"#FAFBFF\",\"dark_mode_primary_color\":\"#13151E\",\"dark_mode_secondary_color\":\"#262E3E\",\"dark_mode_third_color\":\"#262E3E\",\"dark_mode_background_color\":\"#12151E\"}'),(4,'smtp','{\"status\":1,\"mailer\":\"smtp\",\"host\":\"mail.privateemail.com\",\"port\":\"587\",\"username\":\"support@billiongroup.net\",\"password\":\"Aqswde!123\",\"encryption\":\"tls\",\"from_email\":\"support@billiongroup.net\",\"from_name\":\"billiongroup\"}'),(5,'actions','{\"email_verification_status\":1,\"registration_status\":1,\"gdpr_cookie_status\":1,\"blog_status\":1,\"contact_page\":1,\"features_page\":1,\"faqs_status\":1,\"language_menu_status\":1,\"force_ssl_status\":0,\"language_type\":0}'),(6,'popup','{\"body\":\"<p style=\\\"text-align:center;\\\"><span style=\\\"color:#3498db;\\\"><strong><img><\\/strong><\\/span><\\/p><h2 style=\\\"text-align:center;\\\"><span style=\\\"color:#3498db;\\\"><strong>What is Lorem Ipsum?<\\/strong><\\/span><\\/h2><p style=\\\"text-align:center;\\\">Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<\\/p>\",\"status\":0}'),(7,'currency','{\"code\":\"USD\",\"symbol\":\"$\",\"position\":\"1\"}'),(8,'subscription','{\"about_to_expire_reminder\":\"3\",\"expired_reminder\":\"3\",\"delete_expired\":\"7\"}'),(9,'watermark','{\"position\":\"bottom-right\",\"width\":\"90\",\"height\":\"30\",\"status\":0,\"logo\":\"images\\/watermark\\/kwSZxEeT3BDwcTH_1699724550.png\"}'),(10,'theme','{\"mode_default\":\"auto\",\"mode_switcher\":0}');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_providers`
--

DROP TABLE IF EXISTS `social_providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `social_providers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `facebook` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `social_providers_user_id_foreign` (`user_id`),
  CONSTRAINT `social_providers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_providers`
--

LOCK TABLES `social_providers` WRITE;
/*!40000 ALTER TABLE `social_providers` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `plan_id` bigint unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1:Active 0:cancelled',
  `expiry_at` datetime NOT NULL,
  `about_to_expire_reminder` tinyint(1) NOT NULL DEFAULT '0',
  `expired_reminder` tinyint(1) NOT NULL DEFAULT '0',
  `is_viewed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subscriptions_user_id_foreign` (`user_id`),
  KEY `subscriptions_plan_id_foreign` (`plan_id`),
  CONSTRAINT `subscriptions_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
INSERT INTO `subscriptions` VALUES (14,16,3,1,'2024-03-04 22:21:59',0,0,1,'2024-02-04 12:15:26','2024-02-04 15:21:59'),(15,18,13,1,'2025-02-04 19:21:49',0,0,1,'2024-02-04 12:21:49','2024-02-04 12:21:49');
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxes`
--

DROP TABLE IF EXISTS `taxes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taxes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `country_id` bigint unsigned DEFAULT NULL,
  `percentage` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `taxes_country_id_unique` (`country_id`),
  CONSTRAINT `taxes_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxes`
--

LOCK TABLES `taxes` WRITE;
/*!40000 ALTER TABLE `taxes` DISABLE KEYS */;
/*!40000 ALTER TABLE `taxes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `checkout_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `plan_id` bigint unsigned NOT NULL,
  `coupon_id` bigint unsigned DEFAULT NULL,
  `details_before_discount` longtext COLLATE utf8mb4_unicode_ci,
  `details_after_discount` longtext COLLATE utf8mb4_unicode_ci,
  `price` double(10,2) NOT NULL,
  `tax` double(10,2) NOT NULL DEFAULT '0.00',
  `fees` double(10,2) NOT NULL DEFAULT '0.00',
  `total` double(10,2) NOT NULL,
  `payment_gateway_id` bigint unsigned DEFAULT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint NOT NULL COMMENT '1:Subscribing 2:Renewing 3:Upgrading 4:Downgrading',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0:Unpaid 1:Pending 2:Paid 3:Cancelled',
  `is_viewed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `transactions_checkout_id_unique` (`checkout_id`),
  KEY `transactions_user_id_foreign` (`user_id`),
  KEY `transactions_plan_id_foreign` (`plan_id`),
  KEY `transactions_coupon_id_foreign` (`coupon_id`),
  KEY `transactions_payment_gateway_id_foreign` (`payment_gateway_id`),
  CONSTRAINT `transactions_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE SET NULL,
  CONSTRAINT `transactions_payment_gateway_id_foreign` FOREIGN KEY (`payment_gateway_id`) REFERENCES `payment_gateways` (`id`),
  CONSTRAINT `transactions_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE,
  CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (9,'c00d7e202d819bb379be1473012657a4364c9d55',16,3,NULL,'{\"price\":\"12.99\",\"tax\":\"0.00\",\"total\":\"12.99\"}',NULL,12.99,0.00,0.00,12.99,2,'cs_test_a1looimtpSZ9DNUSQ3ge5MhInWyRwe1LE1XdFfpNn7RrY5WvXHapQ7Di71','cus_PVJNQl2nc9MOk2','cakrabudiman@icloud.com',3,2,1,'2024-02-04 15:21:13','2024-02-04 15:22:10');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_logs`
--

DROP TABLE IF EXISTS `user_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_logs_user_id_foreign` (`user_id`),
  CONSTRAINT `user_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_logs`
--

LOCK TABLES `user_logs` WRITE;
/*!40000 ALTER TABLE `user_logs` DISABLE KEYS */;
INSERT INTO `user_logs` VALUES (8,16,'127.0.0.1','Other','Other','Other','Other, Other','Unknown','Unknown','Chrome','Mac OS X','2024-02-04 12:15:20','2024-02-04 12:15:20'),(9,18,'127.0.0.1','Other','Other','Other','Other, Other','Unknown','Unknown','Other','Other','2024-02-04 12:27:15','2024-02-04 12:27:15');
/*!40000 ALTER TABLE `user_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `google2fa_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: Disabled, 1: Active',
  `google2fa_secret` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0: Banned, 1: Active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_viewed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (14,'tesd tesdt','tesd','tesdt','ganggasungain@gmail.com','{\"address_1\":null,\"address_2\":null,\"city\":null,\"state\":null,\"zip\":null,\"country\":null}','images/avatars/default.png','$2y$10$u/bu76clmIybwHFOoZc.su33tO/Y.6oLfVCkQ39SE5VO8sQsTHTFW',NULL,0,NULL,1,NULL,1,'2024-02-04 11:38:10','2024-02-04 11:46:27',NULL,NULL),(16,'mocil group','mocil','group','cakrabudiman@icloud.com','{\"address_1\":\"test\",\"address_2\":\"testes\",\"city\":\"pangkalpinang\",\"state\":\"Bangka Belitung\",\"zip\":\"33124\",\"country\":\"Indonesia\"}','images/avatars/default.png','$2y$10$tJ7OKP4AorkF2omFNJIogeZ83mBCOwTm8HuVd4.rpWGDrAt51cfki','2024-02-04 15:21:04',0,NULL,1,NULL,1,'2024-02-04 12:15:20','2024-02-04 15:21:44',NULL,NULL),(18,'Omba','','','coba@omba.com',NULL,'','$2y$10$DVRG6w634K0LbY5y6tB7OOPTgw9Xmb.pY5IAli17gatX2ZeAF/GnK',NULL,0,NULL,1,NULL,1,'2024-02-04 12:20:50','2024-02-04 12:20:54','EKQ1y8LYda','1df4a75db27e5355f1eec26d11bbd636fb592af117eb1d5ea41d99a07c2816bd');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'wg-sql'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-05 11:01:24
