-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: ssad
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agreement_forms`
--

DROP TABLE IF EXISTS `agreement_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agreement_forms` (
  `client_id` int(11) NOT NULL,
  `client_forms_id` int(11) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` text COLLATE utf8mb4_unicode_ci,
  `default_value` text COLLATE utf8mb4_unicode_ci,
  `field_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validation` text COLLATE utf8mb4_unicode_ci,
  `order_of_field` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agreement_forms`
--

LOCK TABLES `agreement_forms` WRITE;
/*!40000 ALTER TABLE `agreement_forms` DISABLE KEYS */;
INSERT INTO `agreement_forms` VALUES (2,1,1,'Gender','gender',',Male,Female',NULL,'radio','required',1,'2018-09-20 07:48:08','2018-09-20 07:48:08'),(2,1,2,'gender','gender',',Male,Female',NULL,'checkbox','email',2,'2018-09-20 07:48:08','2018-09-20 07:48:08'),(2,3,3,'Gender','gender',',Male,Female',NULL,'radio','required',1,'2018-09-20 07:50:30','2018-09-20 07:50:30'),(2,3,4,'gender','gender',',Male,Female',NULL,'checkbox','email',2,'2018-09-20 07:50:30','2018-09-20 07:50:30');
/*!40000 ALTER TABLE `agreement_forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_forms`
--

DROP TABLE IF EXISTS `client_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_forms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Client_id` int(11) NOT NULL,
  `form_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_forms`
--

LOCK TABLES `client_forms` WRITE;
/*!40000 ALTER TABLE `client_forms` DISABLE KEYS */;
INSERT INTO `client_forms` VALUES (1,2,'My Third Form','Draft','2018-09-20 07:48:08','2018-09-20 07:48:08'),(2,1010,'Sai','Draft','2018-09-20 07:49:53','2018-09-20 07:49:53'),(3,2,'My Thirds Form','Draft','2018-09-20 07:50:30','2018-09-20 07:50:30'),(4,1010,'Dinesh','Draft','2018-09-20 07:51:46','2018-09-20 07:51:46'),(5,1010,'Dinesh','Draft','2018-09-20 07:51:47','2018-09-20 07:51:47'),(6,1010,'Dinesh','Draft','2018-09-20 07:52:41','2018-09-20 07:52:41'),(7,1010,'Dinesh','Draft','2018-09-20 07:54:57','2018-09-20 07:54:57'),(8,1010,'Dinesh','Draft','2018-09-20 07:55:06','2018-09-20 07:55:06'),(9,1010,'Dinesh','Draft','2018-09-20 07:55:46','2018-09-20 07:55:46'),(10,1010,'Dinesh','Draft','2018-09-20 07:57:09','2018-09-20 07:57:09'),(11,1010,'Dinesh','Draft','2018-09-20 07:57:50','2018-09-20 07:57:50'),(12,1010,'Dinesh','Draft','2018-09-20 07:58:03','2018-09-20 07:58:03'),(13,1010,'Dinesh','Draft','2018-09-20 07:58:42','2018-09-20 07:58:42'),(14,1010,'Dinesh','Draft','2018-09-20 07:59:37','2018-09-20 07:59:37'),(15,1010,'Dinesh','Draft','2018-09-20 08:03:28','2018-09-20 08:03:28'),(16,1010,'Dinesh','Draft','2018-09-20 08:05:25','2018-09-20 08:05:25'),(17,1010,'Dinesh','Draft','2018-09-20 08:06:29','2018-09-20 08:06:29'),(18,1010,'Dinesh','Draft','2018-09-20 08:07:18','2018-09-20 08:07:18'),(19,1010,'Dinesh','Draft','2018-09-20 08:07:27','2018-09-20 08:07:27'),(20,1010,'Dinesh','Draft','2018-09-20 08:07:47','2018-09-20 08:07:47');
/*!40000 ALTER TABLE `client_forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (11,'2018_09_18_064009_create_agreement_forms_table',1),(12,'2018_09_18_064027_create_client_forms_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-20 19:11:26
