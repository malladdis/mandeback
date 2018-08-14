-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: mande
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.16.04.1

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
-- Table structure for table `beneficiaries`
--

DROP TABLE IF EXISTS `beneficiaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `beneficiaries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `beneficiaries`
--

LOCK TABLES `beneficiaries` WRITE;
/*!40000 ALTER TABLE `beneficiaries` DISABLE KEYS */;
INSERT INTO `beneficiaries` VALUES (1,'Male','','2018-08-02 05:40:55','2018-08-02 05:40:57',NULL),(2,'Female',NULL,'2018-08-02 05:41:06','2018-08-02 05:41:07',NULL),(3,'Children',NULL,'2018-08-02 05:41:15','2018-08-02 05:41:16',NULL);
/*!40000 ALTER TABLE `beneficiaries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cluster_members`
--

DROP TABLE IF EXISTS `cluster_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cluster_members` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kebele_id` int(11) NOT NULL,
  `cluster_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cluster_members`
--

LOCK TABLES `cluster_members` WRITE;
/*!40000 ALTER TABLE `cluster_members` DISABLE KEYS */;
INSERT INTO `cluster_members` VALUES (1,1,8,'2018-08-01 22:33:25','2018-08-01 22:33:25',NULL),(2,2,8,'2018-08-01 22:33:26','2018-08-01 22:33:26',NULL),(3,7,8,'2018-08-01 22:33:26','2018-08-01 22:33:26',NULL),(4,9,8,'2018-08-01 22:33:26','2018-08-01 22:33:26',NULL),(5,1,9,'2018-08-04 05:26:40','2018-08-04 05:26:40',NULL),(6,2,9,'2018-08-04 05:26:40','2018-08-04 05:26:40',NULL),(7,4,9,'2018-08-04 05:26:40','2018-08-04 05:26:40',NULL),(8,5,9,'2018-08-04 05:26:40','2018-08-04 05:26:40',NULL),(9,7,9,'2018-08-04 05:26:40','2018-08-04 05:26:40',NULL),(10,9,9,'2018-08-04 05:26:40','2018-08-04 05:26:40',NULL);
/*!40000 ALTER TABLE `cluster_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clusters`
--

DROP TABLE IF EXISTS `clusters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clusters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clusters`
--

LOCK TABLES `clusters` WRITE;
/*!40000 ALTER TABLE `clusters` DISABLE KEYS */;
INSERT INTO `clusters` VALUES (8,'South Omo',NULL,'2018-08-01 22:33:25','2018-08-01 22:33:25',NULL),(9,'hkjjjf',NULL,'2018-08-04 05:26:40','2018-08-04 05:26:40',NULL);
/*!40000 ALTER TABLE `clusters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `frequencies`
--

DROP TABLE IF EXISTS `frequencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `frequencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `frequencies`
--

LOCK TABLES `frequencies` WRITE;
/*!40000 ALTER TABLE `frequencies` DISABLE KEYS */;
INSERT INTO `frequencies` VALUES (1,'Monthly','2018-08-01 22:33:25','2018-08-01 22:33:25',NULL),(2,'Biannual','2018-08-01 22:33:25','2018-08-01 22:33:25',NULL),(3,'Quarterly','2018-08-01 22:33:25','2018-08-01 22:33:25',NULL),(4,'Annual','2018-08-01 22:33:25','2018-08-01 22:33:25',NULL),(5,'Final','2018-08-01 22:33:25','2018-08-01 22:33:25',NULL);
/*!40000 ALTER TABLE `frequencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `implementers`
--

DROP TABLE IF EXISTS `implementers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `implementers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `implementers`
--

LOCK TABLES `implementers` WRITE;
/*!40000 ALTER TABLE `implementers` DISABLE KEYS */;
INSERT INTO `implementers` VALUES (1,'Vita',NULL,'2018-08-02 05:38:52','2018-08-02 05:38:54',NULL),(2,'IDE','','2018-08-02 05:39:05','2018-08-02 05:39:07',NULL),(3,'Amref Health Africa',NULL,'2018-08-03 05:39:26','2018-08-02 05:39:29',NULL),(4,'ECC SADCO','','2018-08-02 05:39:49','2018-08-02 05:39:51',NULL),(5,'Carital Belgium',NULL,'2018-08-02 05:40:22','2018-08-02 05:40:24',NULL);
/*!40000 ALTER TABLE `implementers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicators`
--

DROP TABLE IF EXISTS `indicators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicators`
--

LOCK TABLES `indicators` WRITE;
/*!40000 ALTER TABLE `indicators` DISABLE KEYS */;
INSERT INTO `indicators` VALUES (1,'1.1 Number of farmers with improved knowledge of agronomic practices',NULL,'2018-08-06 17:33:50','2018-08-06 17:33:52',NULL),(2,'1.1.1 Kg of vegetable seed distributed',NULL,'2018-08-07 08:24:51','2018-08-07 08:24:52',NULL),(3,'1.2 xxxxxxxxxxxxxxx',NULL,'2018-08-11 08:11:53','2018-08-11 08:11:55',NULL);
/*!40000 ALTER TABLE `indicators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kebeles`
--

DROP TABLE IF EXISTS `kebeles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kebeles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `woreda_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kebeles`
--

LOCK TABLES `kebeles` WRITE;
/*!40000 ALTER TABLE `kebeles` DISABLE KEYS */;
INSERT INTO `kebeles` VALUES (1,4,'Ariyakayisa','2018-08-01 21:44:52','2018-08-01 21:44:54',NULL),(2,4,'Dembayete','2018-08-01 21:45:42','2018-08-01 21:45:45',NULL),(3,4,'Kolakeja','2018-08-01 21:45:44','2018-08-01 21:45:47',NULL),(4,4,'Gondoroba','2018-08-01 21:46:09','2018-08-01 21:46:12',NULL),(5,4,'Cherkeka','2018-08-01 21:46:37','2018-08-01 21:46:39',NULL),(6,4,'Zegerema','2018-08-01 21:47:03','2018-08-01 21:47:04',NULL),(7,21,'Lobet','2018-08-01 21:50:59','2018-08-01 21:51:02',NULL),(8,21,'Karewo','2018-08-01 21:51:29','2018-08-01 21:51:33',NULL),(9,21,'Arikol','2018-08-01 21:51:31','2018-08-01 21:51:37',NULL);
/*!40000 ALTER TABLE `kebeles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (23,'2014_10_12_000000_create_users_table',1),(24,'2014_10_12_100000_create_password_resets_table',1),(25,'2018_07_29_143820_create_program_categories_table',1),(26,'2018_07_29_150330_create_programs_table',1),(27,'2018_07_29_153504_create_project_categories_table',1),(28,'2018_07_29_154248_create_projects_table',1),(29,'2018_07_29_231032_create_program_details_table',1),(30,'2018_07_31_155403_create_project_details_table',1),(31,'2018_07_31_155648_create_implementers_table',1),(32,'2018_07_31_155855_create_beneficiaries_table',1),(33,'2018_07_31_160433_create_clusters_table',1),(34,'2018_07_31_160717_create_cluster_members_table',1),(35,'2018_07_31_162115_create_regions_table',1),(36,'2018_07_31_162152_create_zones_table',1),(37,'2018_07_31_162338_create_woredas_table',1),(38,'2018_08_01_183524_create_kebeles_table',1),(39,'2018_08_02_192122_create_frequencies_table',1),(40,'2018_08_03_084016_create_project_beneficiaries_table',1),(41,'2018_08_03_084130_create_project_implementers_table',1),(42,'2018_08_03_092952_create_outcomes_table',1),(43,'2018_08_03_123232_create_project_frequencies_table',1),(44,'2018_08_03_144511_create_statuses_table',1),(45,'2018_08_05_185602_create_outputs_table',2),(46,'2018_08_06_172823_create_indicators_table',3),(47,'2018_08_06_173627_create_outcome_indicators_table',4),(48,'2018_08_07_080827_create_output_indicators_table',5),(49,'2018_08_10_082327_create_time_plans_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outcome_indicators`
--

DROP TABLE IF EXISTS `outcome_indicators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outcome_indicators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `outcome_id` int(11) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outcome_indicators`
--

LOCK TABLES `outcome_indicators` WRITE;
/*!40000 ALTER TABLE `outcome_indicators` DISABLE KEYS */;
INSERT INTO `outcome_indicators` VALUES (1,1,1,'2018-08-06 17:37:10','2018-08-06 17:37:13',NULL),(2,1,3,'2018-08-11 08:12:23','2018-08-11 08:12:25',NULL);
/*!40000 ALTER TABLE `outcome_indicators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outcomes`
--

DROP TABLE IF EXISTS `outcomes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outcomes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outcomes`
--

LOCK TABLES `outcomes` WRITE;
/*!40000 ALTER TABLE `outcomes` DISABLE KEYS */;
INSERT INTO `outcomes` VALUES (1,21,2,'1. Improved Sanitation & Health (& Nutrition) for Rural Households',NULL,0,'2018-08-05 08:45:21','2018-08-05 08:45:25',NULL),(2,21,2,'1.1 Improved access to clean water',NULL,1,'2018-08-05 08:47:53','2018-08-05 08:47:56',NULL),(3,21,2,'1.2 Improved use of latrines & handwashing',NULL,1,'2018-08-05 08:48:29','2018-08-05 08:48:32',NULL),(5,21,1,'2. xxxxxxxxx',NULL,0,'2018-08-10 13:35:54','2018-08-10 13:35:54',NULL);
/*!40000 ALTER TABLE `outcomes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `output_indicators`
--

DROP TABLE IF EXISTS `output_indicators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `output_indicators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `output_id` int(11) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `output_indicators`
--

LOCK TABLES `output_indicators` WRITE;
/*!40000 ALTER TABLE `output_indicators` DISABLE KEYS */;
INSERT INTO `output_indicators` VALUES (1,1,2,'2018-08-07 08:26:09','2018-08-07 08:26:11',NULL);
/*!40000 ALTER TABLE `output_indicators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outputs`
--

DROP TABLE IF EXISTS `outputs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outputs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `type_id` int(11) NOT NULL,
  `outcome_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outputs`
--

LOCK TABLES `outputs` WRITE;
/*!40000 ALTER TABLE `outputs` DISABLE KEYS */;
INSERT INTO `outputs` VALUES (1,'1.1 Increased Adoption of Agricultural Technologies & Practices',NULL,1,1,0,'2018-08-05 19:05:56','2018-08-05 19:05:58',NULL),(2,'1.2 Increased Access to Agricultural Inputs & Services (research, extension, coop services)',NULL,1,1,1,'2018-08-05 20:19:23','2018-08-05 20:19:25',NULL);
/*!40000 ALTER TABLE `outputs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_categories`
--

DROP TABLE IF EXISTS `program_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `program_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_categories`
--

LOCK TABLES `program_categories` WRITE;
/*!40000 ALTER TABLE `program_categories` DISABLE KEYS */;
INSERT INTO `program_categories` VALUES (1,'Agriculture','Agriculture is the cultivation of land and breeding of animals and plants to provide food, fiber, medicinal plants and other products to sustain and enhance life.','2018-07-31 18:00:44','2018-07-31 18:00:47',NULL);
/*!40000 ALTER TABLE `program_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_details`
--

DROP TABLE IF EXISTS `program_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `program_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `budget` double(8,2) NOT NULL,
  `starting_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ending_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_details`
--

LOCK TABLES `program_details` WRITE;
/*!40000 ALTER TABLE `program_details` DISABLE KEYS */;
INSERT INTO `program_details` VALUES (1,2,'Ethiopia',5000.00,'2018-08-09T23:00:00.000Z','2018-08-29T23:00:00.000Z','2018-07-31 19:18:57','2018-07-31 19:18:57',NULL);
/*!40000 ALTER TABLE `program_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `program_category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programs`
--

LOCK TABLES `programs` WRITE;
/*!40000 ALTER TABLE `programs` DISABLE KEYS */;
INSERT INTO `programs` VALUES (2,1,'Building sustainable likelihood','To contribute to poverty alleviation and resilient, sustainable livelihoods in Arba Minch Zuria, Mirab Abaya and Bonke woredas of SNNPR through climate smart agricultural economic development.','2018-07-31 19:18:56','2018-07-31 19:18:56',NULL);
/*!40000 ALTER TABLE `programs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_beneficiaries`
--

DROP TABLE IF EXISTS `project_beneficiaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_beneficiaries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `beneficiary_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_beneficiaries`
--

LOCK TABLES `project_beneficiaries` WRITE;
/*!40000 ALTER TABLE `project_beneficiaries` DISABLE KEYS */;
INSERT INTO `project_beneficiaries` VALUES (3,'21',1,'2018-08-03 14:55:13','2018-08-03 14:55:13',NULL),(4,'21',2,'2018-08-03 14:55:13','2018-08-03 14:55:13',NULL);
/*!40000 ALTER TABLE `project_beneficiaries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_categories`
--

DROP TABLE IF EXISTS `project_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_categories`
--

LOCK TABLES `project_categories` WRITE;
/*!40000 ALTER TABLE `project_categories` DISABLE KEYS */;
INSERT INTO `project_categories` VALUES (1,'Irish Aid Programme','','2018-08-02 09:18:45','2018-08-02 09:18:45',NULL);
/*!40000 ALTER TABLE `project_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_details`
--

DROP TABLE IF EXISTS `project_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `cluster_id` int(11) NOT NULL,
  `budget` double(8,2) NOT NULL,
  `goal` text COLLATE utf8_unicode_ci,
  `objective` text COLLATE utf8_unicode_ci,
  `mng_1` int(11) NOT NULL,
  `mng_2` int(11) DEFAULT NULL,
  `starting_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ending_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_details`
--

LOCK TABLES `project_details` WRITE;
/*!40000 ALTER TABLE `project_details` DISABLE KEYS */;
INSERT INTO `project_details` VALUES (8,21,8,120000.00,NULL,'To enhance the social and economic stability of the target rural poor households in 5 kebeles/ village clusters.',1,1,'2018-08-02T21:00:00.000Z','2018-08-30T21:00:00.000Z','2018-08-03 14:55:12','2018-08-03 14:55:12',NULL);
/*!40000 ALTER TABLE `project_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_frequencies`
--

DROP TABLE IF EXISTS `project_frequencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_frequencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `frequency_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_frequencies`
--

LOCK TABLES `project_frequencies` WRITE;
/*!40000 ALTER TABLE `project_frequencies` DISABLE KEYS */;
INSERT INTO `project_frequencies` VALUES (7,21,1,'2018-08-03 14:55:12','2018-08-03 14:55:12',NULL),(8,21,2,'2018-08-03 14:55:12','2018-08-03 14:55:12',NULL),(9,21,3,'2018-08-03 14:55:12','2018-08-03 14:55:12',NULL);
/*!40000 ALTER TABLE `project_frequencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_implementers`
--

DROP TABLE IF EXISTS `project_implementers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_implementers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `implementer_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_implementers`
--

LOCK TABLES `project_implementers` WRITE;
/*!40000 ALTER TABLE `project_implementers` DISABLE KEYS */;
INSERT INTO `project_implementers` VALUES (7,21,1,'2018-08-03 14:55:12','2018-08-03 14:55:12',NULL),(8,21,2,'2018-08-03 14:55:12','2018-08-03 14:55:12',NULL),(9,21,4,'2018-08-03 14:55:12','2018-08-03 14:55:12',NULL);
/*!40000 ALTER TABLE `project_implementers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `project_category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (21,2,1,'EU KONSO Project','Konso Development Agency is the consortium lead & Vita is implementing partner in this 24 month project. The project is intended to support 9,000 people to become resilient to climate change (extreme drought) through mitigation and adaptation measures. Duration: 2017- 2019.',0,2,'2018-08-03 14:55:12','2018-08-04 12:18:04',NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` VALUES (1,'Southern Nations, Nationalities, and Peoples\' Region','2018-08-01 14:56:13','2018-08-01 14:56:15',NULL);
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statuses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statuses`
--

LOCK TABLES `statuses` WRITE;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` VALUES (1,'Pending','2018-08-01 22:33:25','2018-08-01 22:33:25',NULL),(2,'In Progress','2018-08-01 22:33:25','2018-08-01 22:33:25',NULL),(3,'Completed','2018-08-01 22:33:25','2018-08-01 22:33:25',NULL);
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `time_plans`
--

DROP TABLE IF EXISTS `time_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `time_plans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `time_plans`
--

LOCK TABLES `time_plans` WRITE;
/*!40000 ALTER TABLE `time_plans` DISABLE KEYS */;
INSERT INTO `time_plans` VALUES (1,'Immediate','2018-08-10 08:29:27','2018-08-10 08:29:30',NULL),(2,'Intermediate','2018-08-10 08:29:52','2018-08-10 08:29:54',NULL),(3,'Long Term','2018-08-10 08:30:18','2018-08-10 08:30:20',NULL);
/*!40000 ALTER TABLE `time_plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ezedin Fedlu','ezedin.fedlu@gmail.com','$2y$10$ATfZQIOXlenLj.Awcw0SU.9r1cf.bklaa5kv3osxEaNa9zoKIULEq',NULL,'2018-07-31 12:52:58','2018-07-31 12:53:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `woredas`
--

DROP TABLE IF EXISTS `woredas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `woredas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `zone_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `woredas`
--

LOCK TABLES `woredas` WRITE;
/*!40000 ALTER TABLE `woredas` DISABLE KEYS */;
INSERT INTO `woredas` VALUES (1,1,'Bako Gazer','2018-08-01 14:59:31','2018-08-01 14:59:34',NULL),(2,1,'Bena Tsemay','2018-08-01 15:00:32','2018-08-01 15:00:36',NULL),(3,1,'Gelila (woreda)','2018-08-01 15:00:26','2018-08-01 15:00:28',NULL),(4,1,'Hamer (woreda)','2018-08-01 15:00:53','2018-08-01 15:00:55',NULL),(5,1,'Kuraz','2018-08-01 15:01:13','2018-08-01 15:01:16',NULL),(6,1,'Male (woreda)','2018-08-01 15:01:44','2018-08-01 15:01:46',NULL),(7,1,'Nyangatom (woreda)','2018-08-01 15:02:08','2018-08-01 15:02:11',NULL),(8,1,'Selamago','2018-08-01 15:02:41','2018-08-01 15:02:43',NULL),(9,2,'Boloso Bombe','2018-08-01 15:04:17','2018-08-01 15:04:19',NULL),(10,2,'Boloso Sore','2018-08-01 15:05:09','2018-08-01 15:05:12',NULL),(11,2,'Damot Gale','2018-08-01 15:05:32','2018-08-01 15:05:35',NULL),(12,2,'Damot Pulasa','2018-08-01 15:06:03','2018-08-01 15:06:05',NULL),(13,2,'Damot Sore','2018-08-01 15:06:24','2018-08-01 15:06:26',NULL),(14,2,'Damot Weyde','2018-08-01 15:06:42','2018-08-01 15:06:44',NULL),(15,2,'Diguna Fango','2018-08-01 15:07:01','2018-08-01 15:07:03',NULL),(16,2,'Humbo','2018-08-01 15:07:17','2018-08-01 15:07:19',NULL),(17,2,'Kindo Didaye','2018-08-01 15:07:33','2018-08-01 15:07:35',NULL),(18,2,'Kindo Koysha','2018-08-01 15:07:55','2018-08-01 15:07:57',NULL),(19,2,'Offa (woreda)','2018-08-01 15:09:41','2018-08-01 15:09:43',NULL),(20,2,'Sodo (town)','2018-08-01 15:10:06','2018-08-01 15:10:09',NULL),(21,1,'Dassenech','2018-08-01 21:50:02','2018-08-01 21:50:04',NULL);
/*!40000 ALTER TABLE `woredas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zones`
--

DROP TABLE IF EXISTS `zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `region_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zones`
--

LOCK TABLES `zones` WRITE;
/*!40000 ALTER TABLE `zones` DISABLE KEYS */;
INSERT INTO `zones` VALUES (1,1,'South Omo Zone','2018-08-01 14:59:04','2018-08-01 14:59:06',NULL),(2,1,'Wolayita Zone','2018-08-01 15:03:22','2018-08-01 15:03:24',NULL);
/*!40000 ALTER TABLE `zones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-14 15:01:24
