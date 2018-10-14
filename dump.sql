-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: mande
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
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `output_id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status_id` int(11) NOT NULL,
  `activity_category_id` int(11) NOT NULL,
  `kebele_id` int(11) NOT NULL,
  `start_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `implementing_partners` text COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` VALUES (1,'1.Strengthened local Institutions (FTCS)',1,NULL,2,1,1,'2018-08-16T23:00:00.000Z','2018-08-30T23:00:00.000Z','[{id: 1, name: Vita},{id: 2, name: IDE}]',0,'2018-08-17 20:39:35','2018-08-17 20:39:35',NULL),(2,'1.1 xxxxxxxxxx',1,NULL,2,1,1,'2018-08-16T23:00:00.000Z','2018-08-30T23:00:00.000Z','[{id: 2, name: IDE}]',1,'2018-08-17 21:42:28','2018-08-17 21:42:28',NULL);
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activity_budgets`
--

DROP TABLE IF EXISTS `activity_budgets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_budgets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `activity_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_budgets`
--

LOCK TABLES `activity_budgets` WRITE;
/*!40000 ALTER TABLE `activity_budgets` DISABLE KEYS */;
INSERT INTO `activity_budgets` VALUES (1,1,20000,'2018-08-17 20:39:35','2018-08-17 20:39:35',NULL),(2,2,1000,'2018-08-17 21:42:28','2018-08-17 21:42:28',NULL);
/*!40000 ALTER TABLE `activity_budgets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activity_categories`
--

DROP TABLE IF EXISTS `activity_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_categories`
--

LOCK TABLES `activity_categories` WRITE;
/*!40000 ALTER TABLE `activity_categories` DISABLE KEYS */;
INSERT INTO `activity_categories` VALUES (1,'Training','2018-08-17 15:36:55','2018-08-17 15:36:58',NULL);
/*!40000 ALTER TABLE `activity_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activity_indicators`
--

DROP TABLE IF EXISTS `activity_indicators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_indicators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `activity_id` int(11) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_indicators`
--

LOCK TABLES `activity_indicators` WRITE;
/*!40000 ALTER TABLE `activity_indicators` DISABLE KEYS */;
/*!40000 ALTER TABLE `activity_indicators` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Table structure for table `budgets`
--

DROP TABLE IF EXISTS `budgets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `budgets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `currency_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `donor_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `budgets`
--

LOCK TABLES `budgets` WRITE;
/*!40000 ALTER TABLE `budgets` DISABLE KEYS */;
INSERT INTO `budgets` VALUES (2,'Eu Budget',120000,'USD',4,'2018-08-31 16:55:11','2018-08-31 16:55:11',NULL);
/*!40000 ALTER TABLE `budgets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calculation_methods`
--

DROP TABLE IF EXISTS `calculation_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calculation_methods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calculation_methods`
--

LOCK TABLES `calculation_methods` WRITE;
/*!40000 ALTER TABLE `calculation_methods` DISABLE KEYS */;
INSERT INTO `calculation_methods` VALUES (1,'Row Summation',NULL,NULL),(2,'Column Summation',NULL,NULL);
/*!40000 ALTER TABLE `calculation_methods` ENABLE KEYS */;
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
-- Table structure for table `currencies`
--

DROP TABLE IF EXISTS `currencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `currencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `abr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `currencies`
--

LOCK TABLES `currencies` WRITE;
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` VALUES (1,'United States Dollar','USD','$','2018-08-30 20:24:16','2018-08-30 20:24:20',NULL),(2,'Euro','EUR','€','2018-08-30 20:26:06','2018-08-30 20:26:11',NULL),(3,'British Pound','GBP','£','2018-08-30 20:27:51','2018-08-30 20:27:52',NULL),(4,'Ethiopian Birr','ETB',NULL,'2018-08-30 20:29:10','2018-08-30 20:29:12',NULL);
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_entries`
--

DROP TABLE IF EXISTS `data_entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_entries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `indicator_id` int(11) NOT NULL,
  `frequency_symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `actual_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_entries`
--

LOCK TABLES `data_entries` WRITE;
/*!40000 ALTER TABLE `data_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_entry_disaggregations`
--

DROP TABLE IF EXISTS `data_entry_disaggregations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_entry_disaggregations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_entry_id` int(11) NOT NULL,
  `disaggregation_attribute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_entry_disaggregations`
--

LOCK TABLES `data_entry_disaggregations` WRITE;
/*!40000 ALTER TABLE `data_entry_disaggregations` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_entry_disaggregations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_types`
--

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` VALUES (1,'Quantitative','2018-08-16 14:12:32','2018-08-16 14:12:34',NULL),(2,'Qualitative','2018-08-16 14:12:45','2018-08-16 14:12:47',NULL);
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `date_period_generators`
--

DROP TABLE IF EXISTS `date_period_generators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `date_period_generators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `date_period_generators`
--

LOCK TABLES `date_period_generators` WRITE;
/*!40000 ALTER TABLE `date_period_generators` DISABLE KEYS */;
/*!40000 ALTER TABLE `date_period_generators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disaggregation_methods`
--

DROP TABLE IF EXISTS `disaggregation_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disaggregation_methods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disaggregation_methods`
--

LOCK TABLES `disaggregation_methods` WRITE;
/*!40000 ALTER TABLE `disaggregation_methods` DISABLE KEYS */;
INSERT INTO `disaggregation_methods` VALUES (1,'Gender','2018-08-16 14:13:23','2018-08-16 14:13:27',NULL),(2,'Age','2018-08-16 14:28:46','2018-08-16 14:28:49',NULL),(3,'Disable','2018-08-16 14:28:47','2018-08-16 14:28:51',NULL);
/*!40000 ALTER TABLE `disaggregation_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donors`
--

DROP TABLE IF EXISTS `donors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donors`
--

LOCK TABLES `donors` WRITE;
/*!40000 ALTER TABLE `donors` DISABLE KEYS */;
INSERT INTO `donors` VALUES (4,'dfdafad','{\"dfafafa\": \"4241\"}','active','2018-08-30 13:46:45','2018-08-30 13:46:45',NULL),(5,'jhgvhjghj','{\"hjghjg\":\"231231231\",\"ghfghfrtyfty\":\"100.0744\"}','inactive','2018-08-30 14:00:48','2018-08-30 14:00:48',NULL);
/*!40000 ALTER TABLE `donors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenditure_categories`
--

DROP TABLE IF EXISTS `expenditure_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expenditure_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenditure_categories`
--

LOCK TABLES `expenditure_categories` WRITE;
/*!40000 ALTER TABLE `expenditure_categories` DISABLE KEYS */;
INSERT INTO `expenditure_categories` VALUES (1,'non-personnel expenses','2018-08-25 20:39:45','2018-08-25 20:39:47',NULL),(2,'personnel expenses','2018-08-25 20:40:04','2018-08-25 20:40:06',NULL),(3,'support expenses','2018-08-25 20:40:22','2018-08-25 20:40:25',NULL),(4,'Monthly expenditure','2018-10-08 13:45:09','2018-10-08 13:45:09',NULL);
/*!40000 ALTER TABLE `expenditure_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenditures`
--

DROP TABLE IF EXISTS `expenditures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expenditures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `finance_plan_id` int(11) NOT NULL,
  `expenditure_category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenditures`
--

LOCK TABLES `expenditures` WRITE;
/*!40000 ALTER TABLE `expenditures` DISABLE KEYS */;
INSERT INTO `expenditures` VALUES (8,21,16,1,'office equipment','2018-09-22 17:31:29','2018-09-22 17:31:29',NULL);
/*!40000 ALTER TABLE `expenditures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finance_plans`
--

DROP TABLE IF EXISTS `finance_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finance_plans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `finance_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` double NOT NULL,
  `start` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finance_plans`
--

LOCK TABLES `finance_plans` WRITE;
/*!40000 ALTER TABLE `finance_plans` DISABLE KEYS */;
INSERT INTO `finance_plans` VALUES (16,14,'Annual1',12000,8,'2018-09-22 17:15:55','2018-09-22 17:15:55',NULL),(17,14,'Annual2',12000,8,'2018-09-22 17:15:56','2018-09-22 17:15:56',NULL),(18,14,'Annual3',12000,8,'2018-09-22 17:15:56','2018-09-22 17:15:56',NULL),(19,14,'Annual4',12000,8,'2018-09-22 17:15:56','2018-09-22 17:15:56',NULL),(20,14,'Annual5',12000,8,'2018-09-22 17:15:56','2018-09-22 17:15:56',NULL);
/*!40000 ALTER TABLE `finance_plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finances`
--

DROP TABLE IF EXISTS `finances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `frequency_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finances`
--

LOCK TABLES `finances` WRITE;
/*!40000 ALTER TABLE `finances` DISABLE KEYS */;
INSERT INTO `finances` VALUES (14,21,4,'2018-09-22 17:15:55','2018-09-22 17:15:55',NULL);
/*!40000 ALTER TABLE `finances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_data_files`
--

DROP TABLE IF EXISTS `form_data_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form_data_files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `form_data_id` int(11) NOT NULL,
  `file_path` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_data_files`
--

LOCK TABLES `form_data_files` WRITE;
/*!40000 ALTER TABLE `form_data_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_data_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_sections`
--

DROP TABLE IF EXISTS `form_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form_sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visible_html` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `draggable_html` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_sections`
--

LOCK TABLES `form_sections` WRITE;
/*!40000 ALTER TABLE `form_sections` DISABLE KEYS */;
/*!40000 ALTER TABLE `form_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forms`
--

DROP TABLE IF EXISTS `forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forms`
--

LOCK TABLES `forms` WRITE;
/*!40000 ALTER TABLE `forms` DISABLE KEYS */;
INSERT INTO `forms` VALUES (17,'Pod development form','','2018-10-14 14:14:06','2018-10-14 14:14:06');
/*!40000 ALTER TABLE `forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forms_columns`
--

DROP TABLE IF EXISTS `forms_columns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forms_columns` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` int(11) NOT NULL,
  `columns` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forms_columns`
--

LOCK TABLES `forms_columns` WRITE;
/*!40000 ALTER TABLE `forms_columns` DISABLE KEYS */;
INSERT INTO `forms_columns` VALUES (16,17,'Pod name,Address,location','2018-10-14 14:14:54','2018-10-14 14:14:54');
/*!40000 ALTER TABLE `forms_columns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forms_datas`
--

DROP TABLE IF EXISTS `forms_datas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forms_datas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` int(11) NOT NULL,
  `data` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forms_datas`
--

LOCK TABLES `forms_datas` WRITE;
/*!40000 ALTER TABLE `forms_datas` DISABLE KEYS */;
INSERT INTO `forms_datas` VALUES (8,17,'[{\"Pod name\":\"Pod of the year\",\"Address\":\"Amhara region,South wollo\",\"Location\":\"123.45 134.56\"}]','2018-10-14 15:04:05','2018-10-14 15:04:05');
/*!40000 ALTER TABLE `forms_datas` ENABLE KEYS */;
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
-- Table structure for table `generated_forms`
--

DROP TABLE IF EXISTS `generated_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `generated_forms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `form_id` int(11) NOT NULL,
  `html_document` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `generated_forms`
--

LOCK TABLES `generated_forms` WRITE;
/*!40000 ALTER TABLE `generated_forms` DISABLE KEYS */;
INSERT INTO `generated_forms` VALUES (16,17,'<div _ngcontent-c34=\"\" id=\"dragCopy\" style=\"height: 720px; overflow: auto; margin: 10px; border: 1px solid gray;\" location=\"true\" location-label=\"Please give us the exact location of this pod development \"><div style=\"padding: 10px 35px 0px 15px; margin-bottom: 50px; width: 700px; border: none;\" id=\"holder\" class=\"input-holder\" draggable=\"true\">\n                  <div class=\"form-group\" id=\"form-group\">\n                    <label class=\"col-md-4 col-sm-4\" id=\"input-label\" style=\"font-size:20px;\">Pod name</label>\n                    <input class=\"form-control col-md-8 col-sm-8\" type=\"text\" formcontrolname=\"Podname\" placeholder=\"Pod name\" name=\"Pod name\">\n                  </div>\n                \n                </div><div style=\"padding: 10px 35px 0px 15px; margin-bottom: 50px; width: 700px; border: none;\" id=\"holder\" class=\"input-holder\" draggable=\"true\">\n                  <div class=\"form-group\" id=\"form-group\">\n                    <label class=\"col-md-4 col-sm-4\" id=\"input-label\" style=\"font-size:20px;\">Address</label>\n                    <input class=\"form-control col-md-8 col-sm-8\" type=\"text\" formcontrolname=\"Address\" placeholder=\"Address\" name=\"Address\">\n                  </div>\n                <p id=\"label-editor\" style=\"display: none;\"><span class=\"btn-link edit\">Edit</span> <span class=\"btn-link remove\" style=\"margin-left:15px;\">Remove</span></p>\n                </div><div id=\"holder\" style=\"padding: 10px 35px 0px 15px; margin-bottom: 50px; width: 700px; border: none;\">\n                  \n                \n                </div></div>','2018-10-14 14:14:54','2018-10-14 14:14:54');
/*!40000 ALTER TABLE `generated_forms` ENABLE KEYS */;
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
-- Table structure for table `indicator_calculation_methods`
--

DROP TABLE IF EXISTS `indicator_calculation_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicator_calculation_methods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `indicator_id` int(11) NOT NULL,
  `calculation_method_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicator_calculation_methods`
--

LOCK TABLES `indicator_calculation_methods` WRITE;
/*!40000 ALTER TABLE `indicator_calculation_methods` DISABLE KEYS */;
/*!40000 ALTER TABLE `indicator_calculation_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicator_disaggregation_methods`
--

DROP TABLE IF EXISTS `indicator_disaggregation_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicator_disaggregation_methods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `indicator_id` int(11) NOT NULL,
  `disaggregation_method_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicator_disaggregation_methods`
--

LOCK TABLES `indicator_disaggregation_methods` WRITE;
/*!40000 ALTER TABLE `indicator_disaggregation_methods` DISABLE KEYS */;
/*!40000 ALTER TABLE `indicator_disaggregation_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicator_fields_tobe_calculateds`
--

DROP TABLE IF EXISTS `indicator_fields_tobe_calculateds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicator_fields_tobe_calculateds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `indicator_form_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicator_fields_tobe_calculateds`
--

LOCK TABLES `indicator_fields_tobe_calculateds` WRITE;
/*!40000 ALTER TABLE `indicator_fields_tobe_calculateds` DISABLE KEYS */;
INSERT INTO `indicator_fields_tobe_calculateds` VALUES (60,5,'Male','2018-10-10 14:41:06','2018-10-10 14:41:06'),(61,5,'Female','2018-10-10 14:41:06','2018-10-10 14:41:06'),(62,6,'Female','2018-10-11 11:08:16','2018-10-11 11:08:16'),(63,6,'Male','2018-10-11 11:08:16','2018-10-11 11:08:16'),(64,7,'Female','2018-10-13 08:04:23','2018-10-13 08:04:23'),(65,7,'male','2018-10-13 08:04:23','2018-10-13 08:04:23');
/*!40000 ALTER TABLE `indicator_fields_tobe_calculateds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `indicator_forms`
--

DROP TABLE IF EXISTS `indicator_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indicator_forms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `indicator_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `calculation_method_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicator_forms`
--

LOCK TABLES `indicator_forms` WRITE;
/*!40000 ALTER TABLE `indicator_forms` DISABLE KEYS */;
INSERT INTO `indicator_forms` VALUES (5,3,12,1,'2018-10-10 14:41:06','2018-10-11 10:34:51','2018-10-11 10:34:51'),(6,3,13,1,'2018-10-11 11:08:16','2018-10-13 07:57:57','2018-10-13 07:57:57'),(7,3,14,1,'2018-10-13 08:04:23','2018-10-14 14:07:49','2018-10-14 14:07:49');
/*!40000 ALTER TABLE `indicator_forms` ENABLE KEYS */;
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
  `type_id` int(11) NOT NULL,
  `measuring_unit_id` int(11) NOT NULL,
  `frequency_id` int(11) NOT NULL,
  `baseline_value` double NOT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_value` double NOT NULL,
  `is_total` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indicators`
--

LOCK TABLES `indicators` WRITE;
/*!40000 ALTER TABLE `indicators` DISABLE KEYS */;
INSERT INTO `indicators` VALUES (3,'1.1 Quinteal of high value crops distributed',NULL,1,1,1,1,'fdsfafa',20,1,'2018-08-17 13:29:18','2018-08-17 13:29:18',NULL),(4,'1.1.1 Number of farmers with improved knowledge of agronomic practices',NULL,1,1,1,1,'dsada',20,1,'2018-08-17 13:47:40','2018-08-17 13:47:40',NULL);
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
-- Table structure for table `measuring_units`
--

DROP TABLE IF EXISTS `measuring_units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `measuring_units` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `measuring_units`
--

LOCK TABLES `measuring_units` WRITE;
/*!40000 ALTER TABLE `measuring_units` DISABLE KEYS */;
INSERT INTO `measuring_units` VALUES (1,'Percentage','2018-08-16 14:16:19','2018-08-16 14:16:20',NULL);
/*!40000 ALTER TABLE `measuring_units` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (23,'2014_10_12_000000_create_users_table',1),(24,'2014_10_12_100000_create_password_resets_table',1),(25,'2018_07_29_143820_create_program_categories_table',1),(26,'2018_07_29_150330_create_programs_table',1),(27,'2018_07_29_153504_create_project_categories_table',1),(28,'2018_07_29_154248_create_projects_table',1),(29,'2018_07_29_231032_create_program_details_table',1),(30,'2018_07_31_155403_create_project_details_table',1),(31,'2018_07_31_155648_create_implementers_table',1),(32,'2018_07_31_155855_create_beneficiaries_table',1),(33,'2018_07_31_160433_create_clusters_table',1),(34,'2018_07_31_160717_create_cluster_members_table',1),(35,'2018_07_31_162115_create_regions_table',1),(36,'2018_07_31_162152_create_zones_table',1),(37,'2018_07_31_162338_create_woredas_table',1),(38,'2018_08_01_183524_create_kebeles_table',1),(39,'2018_08_02_192122_create_frequencies_table',1),(40,'2018_08_03_084016_create_project_beneficiaries_table',1),(41,'2018_08_03_084130_create_project_implementers_table',1),(42,'2018_08_03_092952_create_outcomes_table',1),(43,'2018_08_03_123232_create_project_frequencies_table',1),(44,'2018_08_03_144511_create_statuses_table',1),(45,'2018_08_05_185602_create_outputs_table',2),(47,'2018_08_06_173627_create_outcome_indicators_table',4),(48,'2018_08_07_080827_create_output_indicators_table',5),(49,'2018_08_10_082327_create_time_plans_table',6),(50,'2018_08_15_132248_create_data_types_table',7),(51,'2018_08_15_132534_create_measuring_units_table',8),(52,'2018_08_15_185722_create_activities_table',9),(53,'2018_08_15_192046_create_activity_budgets_table',10),(54,'2018_08_15_192111_create_activity_categories_table',11),(55,'2018_08_16_100000_create_indicators_table',12),(56,'2018_08_16_142605_create_disaggregation_methods_table',13),(57,'2018_08_16_142729_create_indicator_disaggregation_methods_table',14),(59,'2018_08_17_223225_create_activity_indicators_table',16),(60,'2018_08_24_165018_create_budgets_table',17),(61,'2018_08_25_210056_create_expenditure_categories_table',18),(62,'2018_08_25_210241_create_expenditures_table',19),(68,'2018_08_28_153702_create_finance_plans_table',20),(69,'2018_08_28_154810_create_monthly_expenditures_table',20),(70,'2018_08_28_183516_create_finances_table',20),(71,'2018_08_28_191141_create_donors_table',21),(72,'2018_08_28_191243_create_currencies_table',22),(73,'2018_08_29_110942_create_calculation_methods_table',23),(74,'2018_08_29_111357_create_indicator_calculation_methods_table',23),(75,'2018_08_30_202816_create_data_entries_table',23),(76,'2018_08_31_125755_create_date_period_generators_table',23),(77,'2018_09_04_201025_create_forms_table',24),(78,'2018_09_05_095748_create_form_sections_table',24),(79,'2018_09_08_102117_create_generated_forms_table',24),(80,'2018_09_08_141507_create_forms_columns_table',24),(81,'2018_09_08_141520_create_forms_datas_table',24),(82,'2018_09_14_110317_create_form_data_files_table',24),(83,'2018_09_16_095628_create_roles_table',24),(85,'2018_09_16_154830_create_role_permissions_table',24),(86,'2018_09_18_092641_create_permissions_table',24),(87,'2018_09_20_114421_create_outer_documents_table',24),(88,'2018_09_24_134507_create_data_entry_disaggregations_table',25),(89,'2018_10_01_201739_create_shared_forms_table',26),(93,'2018_08_16_142946_create_indicator_forms_table',27),(94,'2018_10_02_144816_create_indicator_fields_tobe_calculateds_table',27);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monthly_expenditures`
--

DROP TABLE IF EXISTS `monthly_expenditures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monthly_expenditures` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `finance_plan_id` int(11) NOT NULL,
  `expenditure_id` int(11) NOT NULL,
  `values` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monthly_expenditures`
--

LOCK TABLES `monthly_expenditures` WRITE;
/*!40000 ALTER TABLE `monthly_expenditures` DISABLE KEYS */;
INSERT INTO `monthly_expenditures` VALUES (17,16,8,'{\"Sep\": \"100\",\"Oct\": \"100\",\"Nov\": \"0\",\"Dec\": \"0\",\"Jan\": \"0\",\"Feb\": \"0\",\"Mar\": \"0\",\"Apr\": \"0\",\"May\": \"0\",\"Jun\": \"0\",\"Jul\": \"0\",\"Aug\": \"0\"}','2018-09-22 17:31:30','2018-09-22 17:47:42',NULL);
/*!40000 ALTER TABLE `monthly_expenditures` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outcome_indicators`
--

LOCK TABLES `outcome_indicators` WRITE;
/*!40000 ALTER TABLE `outcome_indicators` DISABLE KEYS */;
INSERT INTO `outcome_indicators` VALUES (1,1,3,'2018-08-17 13:29:18','2018-08-17 13:29:18',NULL);
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
-- Table structure for table `outer_documents`
--

DROP TABLE IF EXISTS `outer_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outer_documents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `html` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outer_documents`
--

LOCK TABLES `outer_documents` WRITE;
/*!40000 ALTER TABLE `outer_documents` DISABLE KEYS */;
/*!40000 ALTER TABLE `outer_documents` ENABLE KEYS */;
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
INSERT INTO `output_indicators` VALUES (1,1,4,'2018-08-17 13:47:40','2018-08-17 13:47:40',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outputs`
--

LOCK TABLES `outputs` WRITE;
/*!40000 ALTER TABLE `outputs` DISABLE KEYS */;
INSERT INTO `outputs` VALUES (1,'1.1 Increased Adoption of Agricultural Technologies & Practices',NULL,1,1,0,'2018-08-05 19:05:56','2018-08-05 19:05:58',NULL),(2,'1.2 Increased Access to Agricultural Inputs & Services (research, extension, coop services)',NULL,1,1,1,'2018-08-05 20:19:23','2018-08-05 20:19:25',NULL),(3,' of HH with improved  knowledge, and practice in dietary diversification in target area',NULL,1,1,0,'2018-08-17 14:22:06','2018-08-17 14:22:06',NULL),(4,'1.2.1 xxxxxxxxxxxxxx',NULL,1,3,3,'2018-08-17 14:26:42','2018-08-17 14:26:42',NULL);
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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `models_id` int(11) NOT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
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
  `currency_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `budget` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
INSERT INTO `program_details` VALUES (1,2,'Ethiopia','USD','120000','2018-08-09T23:00:00.000Z','2018-08-29T23:00:00.000Z','2018-07-31 19:18:57','2018-07-31 19:18:57',NULL);
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
  `starting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ending_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
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
INSERT INTO `project_details` VALUES (8,21,8,60000.00,NULL,'To enhance the social and economic stability of the target rural poor households in 5 kebeles/ village clusters.',1,1,'2018-09-18 19:19:08','2023-08-31 23:00:00','2018-08-03 14:55:12','2018-08-03 14:55:12',NULL);
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
-- Table structure for table `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `permissions_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_allowed` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_permissions`
--

LOCK TABLES `role_permissions` WRITE;
/*!40000 ALTER TABLE `role_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shared_forms`
--

DROP TABLE IF EXISTS `shared_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shared_forms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shared_forms`
--

LOCK TABLES `shared_forms` WRITE;
/*!40000 ALTER TABLE `shared_forms` DISABLE KEYS */;
INSERT INTO `shared_forms` VALUES (34,2,2,'2018-10-07 09:59:29','2018-10-07 09:59:29'),(36,2,22,'2018-10-07 14:58:48','2018-10-07 14:58:48'),(38,2,27,'2018-10-07 19:18:26','2018-10-07 19:18:26'),(40,2,8,'2018-10-08 09:13:09','2018-10-08 09:13:09'),(41,1,13,'2018-10-11 11:13:28','2018-10-11 11:13:28'),(42,2,13,'2018-10-11 11:13:28','2018-10-11 11:13:28'),(43,1,14,'2018-10-13 08:00:44','2018-10-13 08:00:44'),(44,2,14,'2018-10-13 08:00:44','2018-10-13 08:00:44');
/*!40000 ALTER TABLE `shared_forms` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ezedin Fedlu','ezedin.fedlu@gmail.com','$2y$10$ATfZQIOXlenLj.Awcw0SU.9r1cf.bklaa5kv3osxEaNa9zoKIULEq',NULL,'2018-07-31 12:52:58','2018-07-31 12:53:00'),(2,'Meseret kassaye','meseret@gmail.com','agdaga',NULL,NULL,NULL);
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

-- Dump completed on 2018-10-14 21:16:17