-- MySQL dump 10.13  Distrib 5.5.42, for Linux (x86_64)
--
-- Host: localhost    Database: newagesm_inhotel
-- ------------------------------------------------------
-- Server version	5.5.42-cll

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
-- Table structure for table `access_master`
--

DROP TABLE IF EXISTS `access_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `access_member_id` int(11) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  `room` varchar(100) DEFAULT NULL,
  `vecancy_reason` int(11) DEFAULT NULL,
  `access_start_date_time` datetime DEFAULT NULL,
  `access_end_date_time` datetime DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `hotel_id` (`hotel_id`),
  KEY `staff_id` (`staff_id`),
  KEY `access_member_id` (`access_member_id`),
  KEY `room` (`room`),
  KEY `access_start_date_time` (`access_start_date_time`),
  KEY `access_end_date_time` (`access_end_date_time`),
  KEY `date_time` (`date_time`),
  KEY `active` (`active`),
  KEY `vecancy_reason` (`vecancy_reason`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_master`
--

LOCK TABLES `access_master` WRITE;
/*!40000 ALTER TABLE `access_master` DISABLE KEYS */;
INSERT INTO `access_master` VALUES (1,1,0,1,1,'0',NULL,NULL,NULL,'2015-04-30 23:00:25','Y'),(2,1,0,1,2,'12',NULL,NULL,NULL,'2015-04-30 23:00:25','Y'),(3,1,0,2,2,'20',NULL,NULL,NULL,'2015-04-30 23:49:13','Y'),(4,1,0,3,2,'10',NULL,NULL,NULL,'2015-05-01 05:48:31','Y'),(5,27,0,4,1,'',NULL,NULL,NULL,'2015-05-04 08:34:15','Y'),(6,27,0,5,1,'',NULL,NULL,NULL,'2015-05-04 08:43:36','Y'),(7,27,0,5,1,'',NULL,NULL,NULL,NULL,'Y'),(8,27,48,6,2,'400',NULL,NULL,NULL,'2015-05-05 10:49:15','Y'),(9,27,0,7,2,'199',NULL,NULL,NULL,'2015-05-06 07:31:56','Y'),(10,27,0,8,1,'',NULL,NULL,NULL,'2015-05-06 16:09:42','Y'),(11,27,0,9,2,'399',NULL,NULL,NULL,'2015-05-07 08:44:09','Y'),(12,27,0,9,2,'499',NULL,NULL,NULL,NULL,'Y'),(13,27,0,10,1,'',NULL,NULL,NULL,'2015-05-11 09:04:47','Y'),(14,27,0,11,1,'',NULL,NULL,NULL,'2015-05-11 09:30:30','Y'),(15,27,0,12,1,'',NULL,NULL,NULL,'2015-05-11 12:43:33','Y'),(16,40,0,13,2,'100',NULL,NULL,NULL,'2015-05-12 10:14:56','Y'),(17,40,0,14,2,'200',NULL,NULL,NULL,'2015-05-12 10:17:11','Y'),(18,27,0,4,2,'400',NULL,NULL,NULL,NULL,'Y'),(19,27,0,15,2,'299',NULL,NULL,NULL,'2015-05-14 14:34:02','Y'),(20,27,0,4,2,'111',NULL,NULL,NULL,NULL,'Y'),(21,1,0,16,2,'113',NULL,NULL,NULL,'2015-05-15 01:29:56','Y'),(22,1,0,17,2,'114',NULL,NULL,NULL,'2015-05-15 01:31:06','Y'),(23,27,0,18,2,'300',NULL,NULL,NULL,'2015-05-15 13:31:05','Y'),(24,27,0,6,2,'112',NULL,NULL,NULL,NULL,'Y'),(25,27,0,7,2,'333',NULL,NULL,NULL,NULL,'Y'),(26,27,0,9,2,'090',NULL,NULL,NULL,NULL,'Y'),(27,27,0,19,2,'221',NULL,NULL,NULL,'2015-05-16 01:54:43','Y'),(28,27,0,8,2,'2',NULL,NULL,NULL,NULL,'Y'),(29,27,0,4,2,'301',NULL,NULL,NULL,NULL,'Y'),(30,27,0,5,2,'401',NULL,NULL,NULL,NULL,'Y'),(31,27,48,20,2,'123',NULL,NULL,NULL,'2015-05-22 03:59:45','Y'),(32,27,0,21,1,'',NULL,NULL,NULL,'2015-05-22 05:50:15','Y'),(33,27,0,22,2,'600',NULL,NULL,NULL,'2015-05-22 05:53:55','Y'),(34,27,0,23,2,'599',NULL,NULL,NULL,'2015-05-22 10:11:04','Y'),(35,27,0,24,2,'699',NULL,NULL,NULL,'2015-05-22 10:12:16','Y'),(36,27,0,25,2,'555',NULL,NULL,NULL,'2015-05-22 10:33:20','Y'),(37,27,0,26,2,'556',NULL,NULL,NULL,'2015-05-22 10:36:55','Y'),(38,27,0,27,2,'700',NULL,NULL,NULL,'2015-05-22 12:20:31','Y'),(39,27,0,28,2,'750',NULL,NULL,NULL,'2015-05-22 13:01:45','Y'),(40,27,0,28,2,'750',NULL,NULL,NULL,NULL,'Y'),(41,27,0,29,2,'233',NULL,NULL,NULL,'2015-05-22 13:20:48','Y'),(42,27,0,30,2,'99',NULL,NULL,NULL,'2015-05-22 13:52:49','Y'),(43,27,0,31,2,'199',NULL,NULL,NULL,'2015-05-22 13:57:48','Y'),(44,27,0,32,2,'299',NULL,NULL,NULL,'2015-05-22 14:50:35','Y'),(45,27,0,33,2,'55',NULL,NULL,NULL,'2015-05-22 15:47:12','Y'),(46,27,0,34,2,'45',NULL,NULL,NULL,'2015-05-22 15:48:26','Y'),(47,27,48,35,2,'1',NULL,NULL,NULL,'2015-05-25 06:54:12','Y'),(48,27,48,36,2,'66',NULL,NULL,NULL,'2015-05-25 10:24:58','Y'),(49,27,48,37,2,'166',NULL,NULL,NULL,'2015-05-25 10:49:52','Y'),(50,27,161,38,2,'111',NULL,NULL,NULL,'2015-05-25 15:37:19','Y'),(51,27,161,39,2,'222',NULL,NULL,NULL,'2015-05-25 15:39:06','Y'),(52,27,48,40,2,'299',NULL,NULL,NULL,'2015-05-26 07:15:39','Y'),(53,27,48,41,2,'399',NULL,NULL,NULL,'2015-05-26 07:17:35','Y'),(54,27,48,42,1,'',NULL,NULL,NULL,'2015-05-26 15:06:26','Y'),(55,27,48,43,1,'',NULL,NULL,NULL,'2015-05-26 15:13:09','Y'),(56,27,48,44,1,'',NULL,NULL,NULL,'2015-05-27 12:25:04','Y'),(57,27,48,45,1,'',NULL,NULL,NULL,'2015-05-27 12:29:56','Y'),(58,27,48,46,1,'',NULL,NULL,NULL,'2015-05-27 12:37:35','Y'),(59,27,48,47,1,'',NULL,NULL,NULL,'2015-05-27 12:40:43','Y'),(60,27,0,48,1,'',NULL,NULL,NULL,'2015-05-27 13:27:42','Y'),(61,27,48,49,1,'',NULL,NULL,NULL,'2015-05-28 11:00:10','Y'),(62,27,48,50,1,'',NULL,NULL,NULL,'2015-05-29 09:55:34','Y'),(63,1,2,51,1,'',NULL,NULL,NULL,'2015-06-02 13:58:36','Y'),(64,27,48,52,2,'788',NULL,NULL,NULL,'2015-06-03 09:47:46','Y'),(65,27,48,53,2,'880',NULL,NULL,NULL,'2015-06-03 10:12:39','Y'),(66,27,48,54,2,'680',NULL,NULL,NULL,'2015-06-03 10:58:12','Y'),(67,1,2,55,2,'399',NULL,NULL,NULL,'2015-06-03 12:29:55','Y'),(68,1,2,56,2,'499',NULL,NULL,NULL,'2015-06-03 12:33:23','Y'),(69,1,2,57,2,'66',NULL,NULL,NULL,'2015-06-03 13:13:05','Y'),(70,1,2,58,1,'',NULL,NULL,NULL,'2015-06-03 15:09:34','Y'),(71,1,2,59,2,'299',NULL,NULL,NULL,'2015-06-04 08:02:22','Y'),(72,1,2,60,2,'test',NULL,NULL,NULL,'2015-06-04 09:25:51','Y'),(73,1,2,61,2,'399',NULL,NULL,NULL,'2015-06-04 09:33:17','Y'),(74,1,0,62,2,'780',NULL,NULL,NULL,'2015-06-05 14:50:42','Y'),(75,1,2,63,2,'511',NULL,NULL,NULL,'2015-06-08 15:38:50','Y'),(76,1,0,64,2,'134',NULL,NULL,NULL,'2015-06-10 09:50:06','Y'),(77,1,2,65,2,'10',NULL,NULL,NULL,'2015-06-11 09:11:55','Y'),(78,1,2,66,2,'20',NULL,NULL,NULL,'2015-06-11 09:16:39','Y'),(79,1,2,67,2,'30',NULL,NULL,NULL,'2015-06-11 09:31:16','Y'),(80,1,2,68,2,'60',NULL,NULL,NULL,'2015-06-11 09:36:16','Y'),(81,1,2,69,2,'40',NULL,NULL,NULL,'2015-06-11 09:50:22','Y'),(82,49,214,70,2,'1',NULL,NULL,NULL,'2015-06-17 08:46:42','Y'),(83,49,0,71,2,'2',NULL,NULL,NULL,'2015-06-17 09:28:21','Y');
/*!40000 ALTER TABLE `access_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `access_members`
--

DROP TABLE IF EXISTS `access_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `nick_name` varchar(200) DEFAULT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'Y',
  `last_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hotel_id` (`hotel_id`),
  KEY `email` (`email`),
  KEY `first_name` (`first_name`),
  KEY `last_name` (`last_name`),
  KEY `nick_name` (`nick_name`),
  KEY `active` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_members`
--

LOCK TABLES `access_members` WRITE;
/*!40000 ALTER TABLE `access_members` DISABLE KEYS */;
INSERT INTO `access_members` VALUES (1,1,90,'inhotel@mail.com','inhotel','new',NULL,NULL,NULL,NULL,'2015-04-30 23:00:25','Y','2015-04-30 23:00:25'),(2,1,93,'joyal@newagesmb.com','joyal','varghese',NULL,NULL,NULL,NULL,'2015-04-30 23:49:13','Y','2015-04-30 23:49:13'),(3,1,63,'galena70@gmail.com','gale','iva',NULL,NULL,NULL,NULL,'2015-05-01 05:48:31','Y','2015-05-01 05:48:31'),(4,27,98,'crux@mail.com','crux','tester',NULL,NULL,NULL,NULL,'2015-05-04 08:34:15','Y','2015-05-04 08:34:15'),(5,27,99,'drux@mail.com','drux','tester',NULL,NULL,NULL,NULL,'2015-05-04 08:43:36','Y','2015-05-04 08:43:36'),(6,27,105,'matt@mail.com','matt','test',NULL,NULL,NULL,NULL,'2015-05-05 10:49:15','Y','2015-05-05 10:49:15'),(7,27,106,'miller@mail.com','miller','test',NULL,NULL,NULL,NULL,'2015-05-06 07:31:56','Y','2015-05-06 07:31:56'),(8,27,107,'jeremy@mail.com','jeremy','test',NULL,NULL,NULL,NULL,'2015-05-06 16:09:42','Y','2015-05-06 16:09:42'),(9,27,108,'jjj@mail.com','jjj','test',NULL,NULL,NULL,NULL,'2015-05-07 08:44:09','Y','2015-05-07 08:44:09'),(10,27,109,'pete@mail.com','pete','Tester',NULL,NULL,NULL,NULL,'2015-05-11 09:04:47','Y','2015-05-11 09:04:47'),(11,27,110,'san@mail.com','san','tester',NULL,NULL,NULL,NULL,'2015-05-11 09:30:30','Y','2015-05-11 09:30:30'),(12,27,113,'ben@mail.com','ben','test',NULL,NULL,NULL,NULL,'2015-05-11 12:43:33','Y','2015-05-11 12:43:33'),(13,40,116,'lyon@mail.com','Lyon','Tester',NULL,NULL,NULL,NULL,'2015-05-12 10:14:56','Y','2015-05-12 10:14:56'),(14,40,117,'jyon@mail.com','jyon','test',NULL,NULL,NULL,NULL,'2015-05-12 10:17:11','Y','2015-05-12 10:17:11'),(15,27,0,'demo@mail.com','demo','tester',NULL,NULL,NULL,NULL,'2015-05-14 14:34:02','Y','2015-05-14 14:34:02'),(16,1,4,'guest1@hotel.com','Anu','Jose',NULL,NULL,NULL,NULL,'2015-05-15 01:29:56','Y','2015-05-15 01:29:56'),(17,1,5,'guest2@hotel.com','ajay','santhosh',NULL,NULL,NULL,NULL,'2015-05-15 01:31:06','Y','2015-05-15 01:31:06'),(18,27,120,'jacob@mail.com','Jacob','Tester',NULL,NULL,NULL,NULL,'2015-05-15 13:31:05','Y','2015-05-15 13:31:05'),(19,27,0,'test@mail.com','test','ww',NULL,NULL,NULL,NULL,'2015-05-16 01:54:43','Y','2015-05-16 01:54:43'),(20,27,123,'aj213@newagesmb.com','anitha','santhosh',NULL,NULL,NULL,NULL,'2015-05-22 03:59:45','Y','2015-05-22 03:59:45'),(21,27,82,'user@mail.com','User','Test',NULL,NULL,NULL,NULL,'2015-05-22 05:50:15','Y','2015-05-22 05:50:15'),(22,27,124,'uat@mail.com','user','test',NULL,NULL,NULL,NULL,'2015-05-22 05:53:55','Y','2015-05-22 05:53:55'),(23,27,128,'demo1@mail.com','demo1','test',NULL,NULL,NULL,NULL,'2015-05-22 10:11:04','Y','2015-05-22 10:11:04'),(24,27,129,'demo2@mail.com','demo2','test',NULL,NULL,NULL,NULL,'2015-05-22 10:12:16','Y','2015-05-22 10:12:16'),(25,27,130,'demo3@mail.com','demo3','test',NULL,NULL,NULL,NULL,'2015-05-22 10:33:20','Y','2015-05-22 10:33:20'),(26,27,131,'demo4@mail.com','demo4','test',NULL,NULL,NULL,NULL,'2015-05-22 10:36:55','Y','2015-05-22 10:36:55'),(27,27,132,'demo5@mail.com','Demo5','t',NULL,NULL,NULL,NULL,'2015-05-22 12:20:31','Y','2015-05-22 12:20:31'),(28,27,133,'demo6@mail.com','Demo6','T',NULL,NULL,NULL,NULL,'2015-05-22 13:01:45','Y','2015-05-22 13:01:45'),(29,27,136,'ranjith@mail.com','Ranjith','R',NULL,NULL,NULL,NULL,'2015-05-22 13:20:48','Y','2015-05-22 13:20:48'),(30,27,137,'test111@mail.com','test111','test',NULL,NULL,NULL,NULL,'2015-05-22 13:52:49','Y','2015-05-22 13:52:49'),(31,27,138,'test222@mail.com','test222','test',NULL,NULL,NULL,NULL,'2015-05-22 13:57:48','Y','2015-05-22 13:57:48'),(32,27,139,'test333@mail.com','test333','test',NULL,NULL,NULL,NULL,'2015-05-22 14:50:35','Y','2015-05-22 14:50:35'),(33,27,141,'test555@mail.com','test555','test',NULL,NULL,NULL,NULL,'2015-05-22 15:47:12','Y','2015-05-22 15:47:12'),(34,27,142,'test666@mail.com','test666','test',NULL,NULL,NULL,NULL,'2015-05-22 15:48:26','Y','2015-05-22 15:48:26'),(35,27,146,'new111@mail.com','new111','test',NULL,NULL,NULL,NULL,'2015-05-25 06:54:12','Y','2015-05-25 06:54:12'),(36,27,156,'inhotel1@mail.com','inhotel1','test',NULL,NULL,NULL,NULL,'2015-05-25 10:24:58','Y','2015-05-25 10:24:58'),(37,27,157,'inhotel2@mail.com','inhotel2','test',NULL,NULL,NULL,NULL,'2015-05-25 10:49:52','Y','2015-05-25 10:49:52'),(38,27,162,'guest1@inhotel.com','Guest1','test',NULL,NULL,NULL,NULL,'2015-05-25 15:37:19','Y','2015-05-25 15:37:19'),(39,27,163,'guest2@inhotel.com','Guest2','test',NULL,NULL,NULL,NULL,'2015-05-25 15:39:06','Y','2015-05-25 15:39:06'),(40,27,164,'guest3@inhotel.com','guest','test',NULL,NULL,NULL,NULL,'2015-05-26 07:15:39','Y','2015-05-26 07:15:39'),(41,27,165,'guest4@inhotel.com','guest4','test',NULL,NULL,NULL,NULL,'2015-05-26 07:17:35','Y','2015-05-26 07:17:35'),(42,27,168,'guest5@mail.com','guest','test',NULL,NULL,NULL,NULL,'2015-05-26 15:06:26','Y','2015-05-26 15:06:26'),(43,27,0,'guest@mail.com','guest','test',NULL,NULL,NULL,NULL,'2015-05-26 15:13:09','Y','2015-05-26 15:13:09'),(44,27,65,'new@mail.com','New','test',NULL,NULL,NULL,NULL,'2015-05-27 12:25:04','Y','2015-05-27 12:25:04'),(45,27,171,'new@inhotel.com','new','test',NULL,NULL,NULL,NULL,'2015-05-27 12:29:56','Y','2015-05-27 12:29:56'),(46,27,172,'new1@inhotel.com','new1','test',NULL,NULL,NULL,NULL,'2015-05-27 12:37:35','Y','2015-05-27 12:37:35'),(47,27,0,'test100@mail.com','test100','test',NULL,NULL,NULL,NULL,'2015-05-27 12:40:43','Y','2015-05-27 12:40:43'),(48,27,173,'jack@mail.com','jack','test',NULL,NULL,NULL,NULL,'2015-05-27 13:27:42','Y','2015-05-27 13:27:42'),(49,27,175,'derek@mail.com','Derek','test',NULL,NULL,NULL,NULL,'2015-05-28 11:00:10','Y','2015-05-28 11:00:10'),(50,27,176,'dave@mail.com','dave','tester',NULL,NULL,NULL,NULL,'2015-05-29 09:55:34','Y','2015-05-29 09:55:34'),(51,1,178,'eric@mail.com','eric','test',NULL,NULL,NULL,NULL,'2015-06-02 13:58:36','Y','2015-06-02 13:58:36'),(52,27,179,'umesh@newagesmb.com','Umesh','test',NULL,NULL,NULL,NULL,'2015-06-03 09:47:46','Y','2015-06-03 09:47:46'),(53,27,180,'asker@newagesmb.com','asker','test',NULL,NULL,NULL,NULL,'2015-06-03 10:12:39','Y','2015-06-03 10:12:39'),(54,27,181,'rich@mail.com','richard','test',NULL,NULL,NULL,NULL,'2015-06-03 10:58:12','Y','2015-06-03 10:58:12'),(55,1,191,'testing1@mail.com','testing1','test',NULL,NULL,NULL,NULL,'2015-06-03 12:29:55','Y','2015-06-03 12:29:55'),(56,1,183,'testing2@mail.com','testing2','test',NULL,NULL,NULL,NULL,'2015-06-03 12:33:23','Y','2015-06-03 12:33:23'),(57,1,185,'testing3@mail.com','testing3','test',NULL,NULL,NULL,NULL,'2015-06-03 13:13:05','Y','2015-06-03 13:13:05'),(58,1,186,'nithins@newagesmb.com','nithin','test',NULL,NULL,NULL,NULL,'2015-06-03 15:09:34','Y','2015-06-03 15:09:34'),(59,1,188,'testing4@mail.com','testing3','test',NULL,NULL,NULL,NULL,'2015-06-04 08:02:22','Y','2015-06-04 08:02:22'),(60,1,189,'testing5@mail.com','testing5','testing5',NULL,NULL,NULL,NULL,'2015-06-04 09:25:51','Y','2015-06-04 09:25:51'),(61,1,190,'testing6@mail.com','testing6','test',NULL,NULL,NULL,NULL,'2015-06-04 09:33:17','Y','2015-06-04 09:33:17'),(62,1,192,'tim@mail.com','Tim','test',NULL,NULL,NULL,NULL,'2015-06-05 14:50:42','Y','2015-06-05 14:50:42'),(63,1,193,'testing11@mail.com','testing11','test',NULL,NULL,NULL,NULL,'2015-06-08 15:38:50','Y','2015-06-08 15:38:50'),(64,1,194,'metcy@newagesmb.com','metcy','metcy',NULL,NULL,NULL,NULL,'2015-06-10 09:50:06','Y','2015-06-10 09:50:06'),(65,1,195,'james@mail.com','james','test',NULL,NULL,NULL,NULL,'2015-06-11 09:11:55','Y','2015-06-11 09:11:55'),(66,1,196,'devin@mail.com','devin','test',NULL,NULL,NULL,NULL,'2015-06-11 09:16:39','Y','2015-06-11 09:16:39'),(67,1,198,'uuu@mail.com','uuu','test',NULL,NULL,NULL,NULL,'2015-06-11 09:31:16','Y','2015-06-11 09:31:16'),(68,1,199,'rrr@mail.com','rrr','test',NULL,NULL,NULL,NULL,'2015-06-11 09:36:16','Y','2015-06-11 09:36:16'),(69,1,200,'sachin@newagesmb.com','sachin','Tendulker',NULL,NULL,NULL,NULL,'2015-06-11 09:50:22','Y','2015-06-11 09:50:22'),(70,49,216,'tony@mail.com','tony','test',NULL,NULL,NULL,NULL,'2015-06-17 08:46:42','Y','2015-06-17 08:46:42'),(71,49,217,'gio@mail.com','gio','test',NULL,NULL,NULL,NULL,'2015-06-17 09:28:21','Y','2015-06-17 09:28:21');
/*!40000 ALTER TABLE `access_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activation_code_master`
--

DROP TABLE IF EXISTS `activation_code_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activation_code_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `access_id` int(11) DEFAULT NULL,
  `activation_code` varchar(50) DEFAULT NULL,
  `activation_start_time` datetime DEFAULT NULL,
  `activation_close_time` datetime DEFAULT NULL,
  `access_start_time` datetime DEFAULT NULL,
  `access_close_time` datetime DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `hotel_id` (`hotel_id`),
  KEY `staff_id` (`staff_id`),
  KEY `activation_code` (`activation_code`),
  KEY `active` (`active`),
  KEY `activation_start_time` (`activation_start_time`),
  KEY `activation_close_time` (`activation_close_time`),
  KEY `access_start_time` (`access_start_time`),
  KEY `access_close_time` (`access_close_time`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activation_code_master`
--

LOCK TABLES `activation_code_master` WRITE;
/*!40000 ALTER TABLE `activation_code_master` DISABLE KEYS */;
INSERT INTO `activation_code_master` VALUES (1,1,0,90,1,'3275410772',NULL,NULL,'2015-04-30 08:28:00','2015-07-31 08:28:00','2015-04-30 23:01:04','Y'),(2,1,0,90,2,'5153444864',NULL,NULL,'2015-05-01 08:49:00','2015-05-30 08:49:00','2015-04-30 23:21:51','Y'),(3,1,0,93,3,'2440990867',NULL,NULL,'2015-04-30 09:17:00','2015-06-26 09:17:00','2015-04-30 23:49:25','Y'),(4,1,0,63,4,'1496378133',NULL,NULL,'2015-05-01 11:45:00','2016-05-08 11:48:00','2015-05-01 05:48:49','Y'),(5,27,0,98,5,'4406981377',NULL,NULL,'2015-05-04 05:00:00','2015-05-31 18:00:00','2015-05-04 08:34:38','Y'),(6,27,0,99,6,'6244245382',NULL,NULL,'2015-05-04 05:00:00','2015-08-31 18:11:00','2015-05-04 08:43:47','Y'),(7,27,0,99,7,'8845107195',NULL,NULL,'2015-05-04 04:00:00','2015-05-31 18:30:00','2015-05-04 08:45:16','Y'),(8,27,0,105,0,'4838046356',NULL,NULL,'2015-05-16 11:11:00','2015-05-19 11:11:00','2015-05-05 10:49:32','Y'),(9,27,0,106,9,'9367921240',NULL,NULL,'2015-05-06 03:00:00','2015-05-31 00:00:00','2015-05-06 07:32:22','Y'),(10,27,0,107,10,'7119574795',NULL,NULL,'2015-05-07 00:00:00','2015-06-01 00:00:00','2015-05-06 16:10:05','Y'),(11,27,0,108,0,'4448818663',NULL,NULL,'2015-05-16 11:10:00','2015-05-17 13:15:00','2015-05-07 08:44:25','Y'),(12,27,0,108,12,'8585566042',NULL,NULL,'2015-05-07 05:00:00','2015-05-31 18:16:00','2015-05-07 08:45:59','Y'),(13,27,0,109,13,'8063693452',NULL,NULL,'2015-05-11 04:00:00','2015-08-31 05:00:00','2015-05-11 09:05:24','Y'),(14,27,0,110,14,'9082812141',NULL,NULL,'2015-05-11 05:00:00','2015-05-31 20:00:00','2015-05-11 09:30:48','Y'),(15,27,0,113,15,'8586199560',NULL,NULL,'2015-05-11 05:00:00','2016-05-31 18:00:00','2015-05-11 12:43:54','Y'),(16,40,0,116,16,'5008799644',NULL,NULL,'2015-05-12 05:00:00','2015-05-31 19:45:00','2015-05-12 10:15:11','Y'),(17,40,0,117,17,'1562862416',NULL,NULL,'2015-05-12 05:00:00','2015-05-31 19:00:00','2015-05-12 10:17:38','Y'),(18,27,0,98,18,'2907616524',NULL,NULL,'2015-05-13 05:00:00','2015-05-31 19:09:00','2015-05-13 09:39:44','Y'),(19,27,0,0,19,'4851942016',NULL,NULL,'2015-05-15 00:00:00','2015-05-31 00:04:00','2015-05-14 14:34:28','Y'),(20,27,0,98,20,'2753515549',NULL,NULL,'2015-05-15 00:00:00','2015-06-01 00:13:00','2015-05-14 14:43:52','Y'),(21,1,0,4,21,'1133175848',NULL,NULL,'2015-05-15 01:30:00','2016-05-06 01:30:00','2015-05-15 01:30:08','Y'),(22,1,0,5,22,'3622954115',NULL,NULL,'2015-05-15 01:31:00','2016-05-13 01:31:00','2015-05-15 01:31:19','Y'),(23,27,0,120,23,'6674169769',NULL,NULL,'2015-05-15 04:00:00','2015-05-31 23:01:00','2015-05-15 13:31:32','Y'),(24,27,0,105,24,'2157919212',NULL,NULL,'2015-05-16 11:13:00','2015-05-23 11:13:00','2015-05-16 01:43:47','Y'),(25,27,0,106,25,'4225074963',NULL,NULL,'2015-05-16 11:15:00','2015-05-23 11:16:00','2015-05-16 01:46:26','Y'),(26,27,0,108,26,'3534824492',NULL,NULL,'2015-05-16 11:30:00','2015-05-18 11:21:00','2015-05-16 01:51:27','Y'),(27,27,0,0,27,'8724261812',NULL,NULL,'2015-05-16 11:24:00','2015-05-17 11:24:00','2015-05-16 01:54:52','Y'),(28,27,0,107,28,'2688048171',NULL,NULL,'2015-05-18 18:15:00','2015-05-29 18:15:00','2015-05-18 08:46:02','Y'),(29,27,0,98,29,'1857989355',NULL,NULL,'2015-05-21 04:00:00','2015-06-30 19:42:00','2015-05-21 10:12:54','Y'),(30,27,0,99,30,'2339606653',NULL,NULL,'2015-05-21 04:00:00','2015-06-30 15:00:00','2015-05-21 10:14:22','Y'),(31,27,48,123,31,'9475300241',NULL,NULL,'2015-05-22 00:45:00','2016-05-22 00:00:00','2015-05-22 03:59:57','Y'),(32,27,0,82,32,'4213335174',NULL,NULL,'2015-05-22 04:00:00','2015-06-30 16:00:00','2015-05-22 05:50:43','Y'),(33,27,0,124,33,'6721256818',NULL,NULL,'2015-05-22 03:00:00','2015-06-30 15:24:00','2015-05-22 05:54:41','Y'),(34,27,0,128,34,'2329271837',NULL,NULL,'2015-05-22 03:00:00','2015-06-30 19:40:00','2015-05-22 10:11:22','Y'),(35,27,0,129,35,'8592796631',NULL,NULL,'2015-05-22 04:00:00','2015-06-30 19:45:00','2015-05-22 10:12:33','Y'),(36,27,0,130,36,'1472405720',NULL,NULL,'2015-05-22 03:00:00','2015-06-30 20:03:00','2015-05-22 10:33:36','Y'),(37,27,0,131,37,'6295297605',NULL,NULL,'2015-05-22 03:00:00','2015-06-30 20:06:00','2015-05-22 10:37:10','Y'),(38,27,0,132,38,'2579101067',NULL,NULL,'2015-05-22 04:00:00','2015-06-30 21:50:00','2015-05-22 12:20:52','Y'),(39,27,0,133,40,'7121169405',NULL,NULL,'2015-05-22 05:45:00','2015-06-30 22:33:00','2015-05-22 13:03:43','Y'),(40,27,0,133,40,'4534572627',NULL,NULL,'2015-05-22 05:45:00','2015-06-30 22:33:00','2015-05-22 13:03:50','Y'),(41,27,0,136,41,'2527069366',NULL,NULL,'2015-05-22 02:00:00','2015-07-31 22:50:00','2015-05-22 13:21:01','Y'),(42,27,0,137,42,'9844791471',NULL,NULL,'2015-05-22 04:00:00','2015-06-30 23:22:00','2015-05-22 13:53:09','Y'),(43,27,0,138,43,'1608271284',NULL,NULL,'2015-05-22 05:00:00','2015-06-30 23:27:00','2015-05-22 13:58:04','Y'),(44,27,0,139,44,'4650613756',NULL,NULL,'2015-05-22 04:20:00','2015-06-30 00:20:00','2015-05-22 14:51:00','Y'),(45,27,0,141,45,'4650124530',NULL,NULL,'2015-05-22 04:00:00','2015-06-30 01:16:00','2015-05-22 15:47:25','Y'),(46,27,0,142,46,'1393775289',NULL,NULL,'2015-05-22 04:15:00','2015-06-30 01:18:00','2015-05-22 15:48:37','Y'),(47,27,48,146,47,'4694960920',NULL,NULL,'2015-05-25 04:00:00','2015-06-30 23:45:00','2015-05-25 06:54:39','Y'),(48,27,48,156,48,'3073452094',NULL,NULL,'2015-05-25 04:00:00','2015-06-30 11:45:00','2015-05-25 10:25:27','Y'),(49,27,48,157,49,'3811247079',NULL,NULL,'2015-05-25 04:00:00','2015-06-30 23:15:00','2015-05-25 10:50:09','Y'),(50,27,161,162,50,'9582240043',NULL,NULL,'2015-05-25 01:06:00','2015-06-30 01:06:00','2015-05-25 15:37:28','Y'),(51,27,161,163,51,'8025224345',NULL,NULL,'2015-05-25 01:08:00','2015-06-30 01:08:00','2015-05-25 15:39:14','Y'),(52,27,48,164,52,'1268160972',NULL,NULL,'2015-05-26 02:00:00','2015-05-31 16:45:00','2015-05-26 07:15:55','Y'),(53,27,48,165,53,'7528418505',NULL,NULL,'2015-05-26 04:00:00','2015-06-30 16:47:00','2015-05-26 07:17:51','Y'),(54,27,48,168,54,'9851182988',NULL,NULL,'2015-05-26 00:35:00','2015-06-30 00:36:00','2015-05-26 15:06:49','Y'),(56,27,48,65,56,'6480295033',NULL,NULL,'2015-05-27 04:00:00','2015-07-30 21:54:00','2015-05-27 12:25:23','Y'),(57,27,48,171,57,'9165787084',NULL,NULL,'2015-05-27 04:00:00','2015-06-30 21:59:00','2015-05-27 12:30:16','Y'),(58,27,48,172,58,'1745572056',NULL,NULL,'2015-05-27 05:00:00','2015-05-31 22:07:00','2015-05-27 12:37:49','Y'),(59,27,48,0,59,'2786237191',NULL,NULL,'2015-05-27 02:00:00','2015-06-30 22:10:00','2015-05-27 12:40:59','Y'),(60,27,0,173,60,'5704638986',NULL,NULL,'2015-05-27 03:00:00','2015-06-30 22:57:00','2015-05-27 13:27:55','Y'),(61,27,48,175,61,'3434520487',NULL,NULL,'2015-05-28 03:00:00','2015-06-30 20:29:00','2015-05-28 11:00:37','Y'),(62,27,48,176,62,'1116239585',NULL,NULL,'2015-05-29 04:00:00','2015-06-30 19:25:00','2015-05-29 09:55:54','Y'),(63,1,2,178,63,'1974007603',NULL,NULL,'2015-06-02 04:00:00','2015-06-30 23:27:00','2015-06-02 13:58:53','Y'),(64,27,48,179,64,'3479155599',NULL,NULL,'2015-06-03 04:00:00','2015-06-30 21:00:00','2015-06-03 09:48:05','Y'),(65,27,48,180,65,'5637906371',NULL,NULL,'2015-06-03 04:00:00','2015-06-30 19:41:00','2015-06-03 10:12:51','Y'),(66,27,48,181,66,'3312577158',NULL,NULL,'2015-06-03 04:00:00','2015-06-30 20:27:00','2015-06-03 10:58:29','Y'),(67,1,2,191,67,'7594633768',NULL,NULL,'2015-06-03 04:00:00','2015-06-30 21:59:00','2015-06-03 12:30:11','Y'),(68,1,2,183,68,'5318633951',NULL,NULL,'2015-06-03 04:00:00','2015-06-30 22:02:00','2015-06-03 12:33:37','Y'),(69,1,2,185,69,'5219540430',NULL,NULL,'2015-06-03 03:00:00','2015-06-30 22:42:00','2015-06-03 13:13:22','Y'),(70,1,2,186,70,'9926736570',NULL,NULL,'2015-06-03 03:00:00','2015-06-30 00:38:00','2015-06-03 15:09:49','Y'),(71,1,2,188,71,'8476976789',NULL,NULL,'2015-06-04 04:00:00','2015-06-30 17:31:00','2015-06-04 08:02:40','Y'),(72,1,2,189,72,'3502934198',NULL,NULL,'2015-06-04 04:00:00','2015-06-30 18:54:00','2015-06-04 09:26:04','Y'),(73,1,2,190,73,'2363724919',NULL,NULL,'2015-06-04 02:00:00','2015-06-30 23:45:00','2015-06-04 09:33:41','Y'),(74,1,0,192,74,'9059653936',NULL,NULL,'2015-06-06 00:19:00','2015-06-30 00:19:00','2015-06-05 14:51:01','Y'),(75,1,2,193,75,'2628534237',NULL,NULL,'2015-06-09 02:00:00','2015-06-30 01:07:00','2015-06-08 15:39:08','Y'),(76,1,0,194,76,'8842753672',NULL,NULL,'2015-06-10 09:48:00','2016-06-02 09:48:00','2015-06-10 09:50:32','Y'),(77,1,2,195,77,'5292884541',NULL,NULL,'2015-06-11 02:00:00','2015-06-30 18:40:00','2015-06-11 09:12:17','Y'),(78,1,2,196,78,'7031571964',NULL,NULL,'2015-06-11 03:00:00','2015-06-30 18:45:00','2015-06-11 09:16:53','Y'),(79,1,2,198,79,'1308070491',NULL,NULL,'2015-06-11 02:00:00','2015-06-30 18:59:00','2015-06-11 09:31:26','Y'),(80,1,2,199,80,'7359243685',NULL,NULL,'2015-06-11 04:00:00','2015-06-30 19:04:00','2015-06-11 09:36:27','Y'),(81,1,2,200,81,'6072644193',NULL,NULL,'2015-06-11 05:00:00','2015-06-30 19:19:00','2015-06-11 09:50:35','Y'),(82,49,214,216,82,'5158662522',NULL,NULL,'2015-06-17 01:00:00','2015-07-31 18:15:00','2015-06-17 08:46:57','Y'),(83,49,0,217,83,'3120095613',NULL,NULL,'2015-06-17 02:00:00','2015-07-31 18:57:00','2015-06-17 09:28:47','Y');
/*!40000 ALTER TABLE `activation_code_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  `sen_removed` enum('N','Y') NOT NULL DEFAULT 'N',
  `rec_removed` enum('N','Y') NOT NULL DEFAULT 'N',
  `image` varchar(200) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `drink_offerings_id` int(10) DEFAULT '0',
  `message_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `to` (`to`),
  KEY `from` (`from`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` VALUES (1,'5','4','Send a drink ','2015-06-10 15:47:26',1,'N','N',NULL,NULL,245,'5578944e21a96aabebf266ea'),(2,'5','4','Send a drink ','2015-06-10 16:02:06',1,'N','N',NULL,NULL,246,'557897bb0d76433803d63af3'),(3,'196','195','Send a drink ','2015-06-11 10:07:53',1,'N','N',NULL,NULL,247,'5579963821a95bc6d1664527'),(4,'196','195','Send a drink ','2015-06-11 10:09:01',1,'N','N',NULL,NULL,248,'5579967c21a95bc6d166452e'),(5,'196','195','Send a drink ','2015-06-11 10:09:50',1,'N','N',NULL,NULL,249,'557996ae21a95bc6d166453d'),(6,'195','196','Send a drink ','2015-06-11 10:10:37',0,'N','N',NULL,NULL,250,'5579963da041a9c402d63af4'),(7,'195','196','Send a drink ','2015-06-11 10:11:39',0,'N','N',NULL,NULL,251,'5579967ba041a9c402d63af5'),(8,'196','195','Send a drink ','2015-06-11 12:09:20',1,'N','N',NULL,NULL,252,'5579b2af21a98cfc23461877'),(9,'4','195','Send a drink ','2015-06-11 12:31:58',1,'N','N',NULL,NULL,253,'5579b84268e1352b01b7acdb'),(10,'195','4','Send a drink ','2015-06-11 12:33:23',1,'N','N',NULL,NULL,254,'5579b7b3a041a97703d63af7'),(11,'5','4','Send a drink ','2015-06-11 12:42:33',1,'N','N',NULL,NULL,255,'5579ba780d7643ad01d63af4'),(12,'5','4','Send a drink ','2015-06-11 12:52:28',1,'N','N',NULL,NULL,256,'5579bae85108064a030041aa'),(13,'5','4','Send a drink ','2015-06-11 12:52:56',1,'N','N',NULL,NULL,257,'5579bb035108064a030041ab'),(14,'5','4','Send a drink ','2015-06-11 14:58:55',1,'N','N',NULL,NULL,258,'5579dab368e135bd01d63af8'),(15,'4','5','Send a drink ','2015-06-11 14:59:46',1,'N','N',NULL,NULL,259,'5579daa2754e440f05d63af7'),(16,'4','5','Send a drink ','2015-06-11 15:12:07',1,'N','N',NULL,NULL,260,'5579dd87754e440f05d63afc'),(17,'4','5','Send a drink ','2015-06-12 08:40:22',1,'N','N',NULL,NULL,261,'557ad37868e1352203d63afa'),(18,'5','4','Send a drink ','2015-06-12 08:40:44',1,'N','N',NULL,NULL,262,'557ad34a754e4457010041b7'),(19,'4','5','Send a drink ','2015-06-12 08:44:03',1,'N','N',NULL,NULL,263,'557ad45668e1352203d63afd'),(20,'5','4','Send a drink ','2015-06-12 09:17:58',1,'N','N',NULL,NULL,264,'557adc04754e447701d63af2'),(21,'195','196','Send a drink ','2015-06-12 12:37:42',0,'N','N',NULL,NULL,265,'557b0a38a041a9c900d63afa'),(22,'195','196','Send a drink ','2015-06-12 12:38:27',0,'N','N',NULL,NULL,266,'557b0a65a041a9c900d63afb'),(23,'196','195','Send a drink ','2015-06-12 13:43:09',1,'N','N',NULL,NULL,267,'557b1a2cc8b44d8c6b5ca767'),(24,'196','195','Send a drink ','2015-06-12 13:57:45',1,'N','N',NULL,NULL,268,'557b1d98c8b4dd34f382b376'),(25,'196','195','Send a drink ','2015-06-12 13:59:28',1,'N','N',NULL,NULL,269,'557b1e00c8b4dd34f382b3b0'),(26,'196','195','Send a drink ','2015-06-12 14:09:22',1,'N','N',NULL,NULL,270,'557b2051c8b4dd34f382b426'),(27,'196','195','Send a drink ','2015-06-12 14:11:57',1,'N','N',NULL,NULL,271,'557b20ecc8b4dd34f382b462'),(28,'196','195','Send a drink ','2015-06-12 14:20:50',1,'N','N',NULL,NULL,272,'557b2302c8b4dd34f382b4db'),(29,'196','195','Send a drink ','2015-06-12 14:22:22',1,'N','N',NULL,NULL,273,'557b235dc8b4dd34f382b519'),(30,'196','195','Send a drink ','2015-06-12 14:24:11',1,'N','N',NULL,NULL,274,'557b23cac8b4dd34f382b598'),(31,'195','196','Send a drink ','2015-06-12 14:24:44',0,'N','N',NULL,NULL,275,'557b242f68e1353f04d63af6'),(32,'196','195','Send a drink ','2015-06-12 14:35:25',1,'N','N',NULL,NULL,276,'557b266dc8b4dd34f382bbf1'),(33,'195','4','Send a drink ','2015-06-15 11:57:21',1,'N','N',NULL,NULL,277,'557ef5df0d7643ed03d63af2');
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_master`
--

DROP TABLE IF EXISTS `chat_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_1` int(11) DEFAULT NULL,
  `user_2` int(11) DEFAULT NULL,
  `message` text,
  `date_time` datetime DEFAULT NULL,
  `drink_offerings_id` int(11) DEFAULT '0',
  `read_status` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_1` (`user_1`),
  KEY `user_2` (`user_2`),
  KEY `date_time` (`date_time`),
  KEY `drink_offerings_id` (`drink_offerings_id`),
  KEY `read_status` (`read_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_master`
--

LOCK TABLES `chat_master` WRITE;
/*!40000 ALTER TABLE `chat_master` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms`
--

DROP TABLE IF EXISTS `cms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `page` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `page` (`page`),
  KEY `image` (`image`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms`
--

LOCK TABLES `cms` WRITE;
/*!40000 ALTER TABLE `cms` DISABLE KEYS */;
INSERT INTO `cms` VALUES (13,'How it works','<p>\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur mattis mauris non condimentum sagittis. sollicitudin tincidunt a ctus, non bibendum tellus vulputate ac. Donec oor iaculis tincidunt consequat, ibero, sit amet malesuavarius mi.</p>\n','work','1418987959.jpg'),(15,'How it works','<p>\n	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur mattis mauris non condimentum sagittis. sollicitudin tincidunt a ctus, non bibendum tellus vulputate ac. Donec oor iaculis tincidunt consequat, ibero, sit amet malesuavarius mi.</p>\n','how_it_works','1419006396.jpg'),(16,'About us','<p>\n	nominavi patrioque vituperata id vim, cu eam gloriatur philosophia deterruisset. Meliore perfecto repudiare ea nam, ne mea duis temporibus. Id quo accusam consequuntur, eum ea debitis urbanitas. Nibh reformidans vim ne.<br />\n	<br />\n	Iudico definiebas eos ea, dicat inermis hendrerit vel ei, legimus copiosae quo at. Per utinam corrumpit prodesset te, liber praesent eos an. An prodesset neglegentur qui, usu ancillae posidonium in, mea ex eros animal scribentur. Et simul fabellas sit. Populo inimicus ne est.<br />\n	<br />\n	Alii wisi phaedrum quo te, duo cu alia neglegentur. Quo nonumy detraxit cu, viderer reformidans ut eos, lopit prodesset te, liber praesent eos an. An prodesset neglegentur qui,<br />\n	<br />\n	&nbsp;usu ancillae posidonium in, mea ex eros animal scribentur. Et simul fabellas sit. Populo inimicus ne est.Alii wisi phaedrum</p>\n','about','1422540397.jpg'),(17,'Tagline','<p>\n	In the past year, Sunbeam supported programs that served<br />\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; over 700,000 children in 23 countries</p>\n','tagline','');
/*!40000 ALTER TABLE `cms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `field` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `editable` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  `active` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  KEY `field` (`field`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES ('TEST_MODE','Y','Payment Gateway Test mode','Y for payment test mode and N for live mode','Y','Y'),('email_from','aswathy@newagesmb.com','Admin From Email','Admin From Email','Y','Y'),('admin_email','manu@newagesmb.com','Admin Email','Admin Email','Y','Y'),('authorize_trans_key','8F5782C8B7x6Chdd','Authorize.net API Transaction Key','Authorize.net API Transaction Key','Y','Y'),('authorize_login','7s7chZ6V6m','Authorize.net API Login','Authorize.net API Login','Y','Y'),('MEMCACHED_PORT','11211','MEMCACHED_PORT','MEMCACHED_PORT','N','Y'),('MEMCACHED_HOST','192.168.1.254','MEMCACHED_HOST','MEMCACHED_HOST','N','Y'),('jw_player_key','z42Dd3IQQ8oldFjuqxQ5IUAVR9OZcxziWb/gEQ==','JWPlayer Key','JWPlayer Key','N','Y'),('authorize_test_mode','Y','Authorize.net  Test Mode?','Authorize.net  Test Mode?(Y/N)','N','Y'),('SITE_NAME','inhotel.com','Site Name','Name of Site','Y','Y'),('SITE_COPYRIGHT','Copyright © 2014 inhotel.com All rights are reserved','Site Copyright Text','Site Copyright Text','Y','Y'),('per_page','10','Pagination Per  Page Count','Pagination Per  Page Count','Y','Y'),('admin-name','Admin','Admin name','Admin name to be displyed in app','Y','Y');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drink_offerings`
--

DROP TABLE IF EXISTS `drink_offerings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drink_offerings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `drinks_id` int(11) DEFAULT NULL,
  `to_user_id` int(11) DEFAULT NULL,
  `quantity` int(5) DEFAULT NULL,
  `status_flag` enum('P','A','D') DEFAULT NULL COMMENT 'P- pending, A- Accept, D -deny',
  `date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hotel_id` (`hotel_id`),
  KEY `user_id` (`user_id`),
  KEY `drinks_id` (`drinks_id`),
  KEY `to_user_id` (`to_user_id`),
  KEY `quantity` (`quantity`),
  KEY `status_flag` (`status_flag`),
  KEY `date_time` (`date_time`)
) ENGINE=InnoDB AUTO_INCREMENT=278 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drink_offerings`
--

LOCK TABLES `drink_offerings` WRITE;
/*!40000 ALTER TABLE `drink_offerings` DISABLE KEYS */;
INSERT INTO `drink_offerings` VALUES (1,27,56,104,78,1,'A','2015-04-27 16:40:59'),(2,1,90,89,90,1,'P','2015-04-30 23:41:45'),(3,1,93,90,90,1,'A','2015-04-30 23:51:51'),(4,1,90,89,90,1,'A','2015-05-01 03:52:05'),(5,1,90,88,63,1,'D','2015-05-03 11:28:26'),(6,1,4,1,5,1,'P','2015-05-03 11:31:51'),(7,1,90,2,93,1,'P','2015-05-03 16:51:43'),(8,27,99,103,98,1,'P','2015-05-04 08:46:46'),(9,27,99,103,98,1,'P','2015-05-04 08:47:04'),(10,27,99,105,98,1,'P','2015-05-04 08:47:32'),(11,27,99,103,98,1,'P','2015-05-04 08:47:48'),(12,27,99,103,98,1,'P','2015-05-04 08:48:36'),(13,27,99,103,98,1,'P','2015-05-04 08:50:16'),(14,27,99,103,98,1,'P','2015-05-04 08:51:32'),(15,27,99,103,98,1,'P','2015-05-04 09:48:46'),(16,27,98,103,99,1,'P','2015-05-04 09:58:45'),(17,27,98,103,99,1,'D','2015-05-04 09:58:45'),(18,27,98,103,99,1,'P','2015-05-04 09:58:46'),(19,27,99,103,98,1,'P','2015-05-04 10:02:20'),(20,27,99,103,98,1,'P','2015-05-04 10:02:20'),(21,27,99,107,98,1,'P','2015-05-04 10:15:28'),(22,27,99,107,98,1,'D','2015-05-04 10:18:02'),(23,27,98,103,99,1,'A','2015-05-04 15:00:53'),(24,27,99,105,98,1,'P','2015-05-04 15:10:05'),(25,27,99,105,98,1,'P','2015-05-04 15:22:13'),(26,27,98,105,99,1,'P','2015-05-04 15:23:10'),(27,27,98,105,99,1,'P','2015-05-04 15:29:02'),(28,27,98,105,99,1,'A','2015-05-04 15:29:25'),(29,27,98,103,99,1,'P','2015-05-04 15:30:27'),(30,27,98,103,99,1,'P','2015-05-05 07:22:38'),(31,27,98,105,99,1,'P','2015-05-05 07:53:52'),(32,27,98,107,99,1,'A','2015-05-05 07:54:25'),(33,27,99,103,98,1,'P','2015-05-05 10:08:05'),(34,27,106,103,105,1,'P','2015-05-06 08:23:30'),(35,27,106,104,105,1,'P','2015-05-06 08:24:30'),(36,40,116,108,117,1,'A','2015-05-12 10:22:29'),(37,40,117,108,116,1,'A','2015-05-12 10:23:29'),(38,1,5,89,4,1,'D','2015-05-20 14:18:50'),(39,1,5,89,4,1,'D','2015-05-20 14:19:57'),(40,1,5,2,4,1,'P','2015-05-20 15:25:18'),(41,1,5,2,4,1,'P','2015-05-21 04:40:22'),(42,1,5,89,4,1,'P','2015-05-21 04:56:21'),(43,1,4,88,5,1,'A','2015-05-21 06:02:04'),(44,27,109,107,113,1,'P','2015-05-21 06:07:20'),(45,1,5,90,4,1,'D','2015-05-21 06:18:46'),(46,1,4,89,5,1,'A','2015-05-21 06:20:06'),(47,27,113,103,109,1,'P','2015-05-21 09:42:37'),(48,27,109,105,113,1,'P','2015-05-21 09:47:14'),(49,27,113,103,109,1,'A','2015-05-21 09:55:19'),(50,27,109,106,113,1,'P','2015-05-21 10:03:21'),(51,27,109,103,113,1,'P','2015-05-21 10:03:41'),(52,27,113,104,109,1,'D','2015-05-21 10:04:19'),(53,27,109,103,113,1,'P','2015-05-21 10:34:43'),(54,27,109,105,113,1,'P','2015-05-21 10:36:50'),(55,27,98,103,99,1,'A','2015-05-21 10:52:49'),(56,27,99,103,98,1,'A','2015-05-21 10:56:01'),(57,27,99,103,98,1,'A','2015-05-21 10:56:13'),(58,27,99,104,98,1,'A','2015-05-21 10:56:31'),(59,27,98,104,99,1,'P','2015-05-21 11:01:45'),(60,27,98,106,99,1,'A','2015-05-21 11:10:00'),(61,27,99,106,98,1,'A','2015-05-21 11:10:31'),(62,27,98,103,99,1,'D','2015-05-21 11:11:17'),(63,27,113,105,109,1,'A','2015-05-21 12:40:13'),(64,1,4,2,5,1,'P','2015-05-21 12:52:50'),(65,27,113,103,109,1,'P','2015-05-21 12:55:25'),(66,27,113,103,109,1,'P','2015-05-21 12:56:17'),(67,27,99,103,98,1,'P','2015-05-21 13:05:39'),(68,27,98,107,99,1,'P','2015-05-21 13:06:12'),(69,27,99,103,98,1,'P','2015-05-21 13:06:56'),(70,1,4,2,5,1,'P','2015-05-21 13:09:22'),(71,1,4,89,5,1,'P','2015-05-21 13:12:18'),(72,27,113,104,109,1,'P','2015-05-21 14:01:27'),(73,27,113,103,109,1,'D','2015-05-21 14:36:25'),(74,27,113,107,109,1,'A','2015-05-21 14:41:34'),(75,27,98,103,99,1,'D','2015-05-21 14:52:18'),(76,27,98,107,99,1,'A','2015-05-21 14:53:50'),(77,27,98,103,99,1,'P','2015-05-21 14:55:23'),(78,27,98,103,99,1,'P','2015-05-21 16:01:20'),(79,27,98,107,99,1,'P','2015-05-21 16:01:59'),(80,27,98,107,99,1,'P','2015-05-21 16:06:40'),(81,1,4,2,5,1,'P','2015-05-21 16:13:00'),(82,1,5,1,4,1,'P','2015-05-22 03:48:43'),(83,1,5,2,4,1,'P','2015-05-22 03:53:38'),(84,1,5,88,4,1,'P','2015-05-22 04:20:25'),(85,1,5,89,4,1,'A','2015-05-22 04:31:57'),(86,27,109,103,113,1,'P','2015-05-22 07:29:42'),(87,27,98,103,124,1,'P','2015-05-22 07:53:46'),(88,27,98,103,124,1,'P','2015-05-22 07:55:24'),(89,27,98,103,124,1,'P','2015-05-22 07:55:36'),(90,27,98,107,124,1,'P','2015-05-22 07:55:50'),(91,27,98,107,124,1,'P','2015-05-22 08:21:43'),(92,27,124,107,98,1,'P','2015-05-22 08:21:59'),(93,27,124,104,98,1,'P','2015-05-22 08:22:46'),(94,27,124,104,98,1,'P','2015-05-22 08:23:56'),(95,27,98,105,124,1,'P','2015-05-22 08:24:35'),(96,27,98,105,124,1,'P','2015-05-22 08:33:56'),(97,27,98,107,124,1,'A','2015-05-22 08:34:27'),(98,27,124,103,98,1,'P','2015-05-22 08:36:41'),(99,27,98,103,124,1,'P','2015-05-22 08:46:49'),(100,1,4,2,5,1,'D','2015-05-22 09:55:44'),(101,27,98,103,124,1,'P','2015-05-22 09:56:38'),(102,27,98,107,124,1,'P','2015-05-22 09:57:34'),(103,1,5,90,4,1,'A','2015-05-22 09:57:52'),(104,27,98,103,124,1,'P','2015-05-22 10:02:36'),(105,27,109,103,124,1,'P','2015-05-22 10:08:43'),(106,27,113,103,109,1,'P','2015-05-22 13:26:12'),(107,27,113,105,109,1,'P','2015-05-22 13:55:53'),(108,27,113,106,109,1,'P','2015-05-22 13:59:59'),(109,27,138,107,137,1,'P','2015-05-22 14:01:02'),(110,27,109,104,113,1,'P','2015-05-22 14:07:23'),(111,27,113,107,109,1,'D','2015-05-22 14:09:35'),(112,27,137,107,138,1,'P','2015-05-22 14:12:12'),(113,27,137,103,138,1,'P','2015-05-22 14:22:35'),(114,27,138,107,137,1,'P','2015-05-22 14:22:46'),(115,27,113,105,109,1,'D','2015-05-22 14:24:30'),(116,27,109,103,113,1,'D','2015-05-22 14:26:44'),(117,27,113,105,109,1,'P','2015-05-22 14:27:00'),(118,27,138,107,137,1,'D','2015-05-22 14:27:14'),(119,27,113,104,109,1,'D','2015-05-22 14:28:13'),(120,27,138,103,137,1,'A','2015-05-22 14:28:20'),(121,27,113,103,109,1,'D','2015-05-22 14:30:53'),(122,27,109,104,113,1,'D','2015-05-22 14:42:21'),(123,27,109,106,113,1,'A','2015-05-22 14:43:18'),(124,27,138,107,137,1,'A','2015-05-22 15:09:15'),(125,27,138,103,137,1,'D','2015-05-22 15:09:38'),(126,27,138,107,137,1,'P','2015-05-22 15:12:49'),(127,27,138,107,137,1,'P','2015-05-22 15:13:34'),(128,27,138,103,137,1,'P','2015-05-22 15:16:32'),(129,27,138,103,137,1,'P','2015-05-22 15:18:35'),(130,27,138,107,137,1,'P','2015-05-22 15:19:50'),(131,1,4,90,5,1,'P','2015-05-22 15:33:58'),(132,1,4,90,5,1,'P','2015-05-22 15:34:40'),(133,1,4,2,5,1,'P','2015-05-22 15:37:40'),(134,1,4,89,5,1,'P','2015-05-22 15:38:42'),(135,1,4,2,5,1,'P','2015-05-22 15:40:24'),(136,1,4,1,5,1,'P','2015-05-22 15:43:16'),(137,1,4,90,5,1,'P','2015-05-22 15:44:49'),(138,1,4,88,5,1,'A','2015-05-22 15:45:04'),(139,1,4,2,5,1,'D','2015-05-22 15:45:32'),(140,1,4,2,5,1,'A','2015-05-22 15:52:33'),(141,1,4,88,5,1,'A','2015-05-22 15:54:53'),(142,27,142,103,141,1,'D','2015-05-22 15:56:56'),(143,27,142,107,141,1,'A','2015-05-22 16:02:50'),(144,27,142,103,141,1,'P','2015-05-22 16:06:33'),(145,27,141,103,142,1,'P','2015-05-22 16:07:21'),(146,27,142,107,141,1,'P','2015-05-22 16:12:58'),(147,27,141,103,142,1,'P','2015-05-22 16:15:34'),(148,1,5,1,4,1,'A','2015-05-22 16:37:37'),(149,1,4,89,5,1,'D','2015-05-22 16:40:01'),(150,1,5,90,4,1,'P','2015-05-22 16:42:30'),(151,1,4,90,5,1,'P','2015-05-22 16:47:54'),(152,1,4,88,5,1,'P','2015-05-22 16:48:03'),(153,1,4,1,5,1,'P','2015-05-22 16:48:17'),(154,27,98,107,146,1,'P','2015-05-25 07:34:56'),(155,27,98,103,146,1,'P','2015-05-25 07:35:06'),(156,27,98,107,146,1,'P','2015-05-25 07:35:47'),(157,27,98,103,99,1,'D','2015-05-25 08:27:44'),(158,27,156,103,157,1,'P','2015-05-25 12:09:05'),(159,27,156,103,132,1,'P','2015-05-25 12:16:56'),(160,27,109,106,98,1,'P','2015-05-25 12:43:06'),(161,27,109,103,113,1,'P','2015-05-25 13:56:29'),(162,27,109,106,113,1,'D','2015-05-25 14:03:59'),(163,27,113,104,109,1,'D','2015-05-25 14:08:05'),(164,27,156,107,157,1,'D','2015-05-25 15:20:25'),(165,27,157,103,156,1,'A','2015-05-25 15:20:50'),(166,27,157,103,156,1,'P','2015-05-25 15:22:34'),(167,27,156,103,157,1,'P','2015-05-25 15:23:18'),(168,27,157,107,156,1,'D','2015-05-25 15:24:01'),(169,27,157,103,156,1,'P','2015-05-25 15:24:23'),(170,27,156,103,157,1,'D','2015-05-25 15:25:01'),(171,27,157,103,156,1,'P','2015-05-25 15:28:34'),(172,27,109,104,98,1,'P','2015-05-26 03:29:29'),(173,27,109,105,107,1,'P','2015-05-26 03:41:21'),(174,27,113,105,109,1,'P','2015-05-26 04:45:44'),(175,27,113,105,109,1,'P','2015-05-26 04:47:34'),(176,27,113,106,109,1,'P','2015-05-26 05:00:31'),(177,27,113,103,109,1,'P','2015-05-26 05:12:51'),(178,27,109,104,113,1,'D','2015-05-26 05:25:09'),(179,27,113,106,109,1,'A','2015-05-26 05:26:26'),(180,27,113,105,109,1,'D','2015-05-26 05:30:21'),(181,27,113,107,109,1,'D','2015-05-26 05:31:48'),(182,27,109,107,113,1,'D','2015-05-26 05:32:57'),(183,27,113,106,109,1,'P','2015-05-26 05:33:59'),(184,27,113,105,109,1,'P','2015-05-26 05:34:39'),(185,27,113,104,109,1,'P','2015-05-26 05:34:52'),(186,27,113,103,109,1,'P','2015-05-26 05:35:05'),(187,27,113,107,109,1,'A','2015-05-26 06:23:38'),(188,27,109,105,113,1,'D','2015-05-26 06:58:18'),(189,27,109,104,113,1,'A','2015-05-26 06:59:12'),(190,27,113,103,109,1,'D','2015-05-26 07:00:03'),(191,27,109,104,113,1,'A','2015-05-26 07:01:16'),(192,27,164,106,165,1,'A','2015-05-26 07:32:43'),(193,27,162,103,163,1,'P','2015-05-26 08:25:13'),(194,27,164,103,165,1,'D','2015-05-26 09:20:07'),(195,27,164,107,165,1,'A','2015-05-26 09:21:41'),(196,27,165,105,164,1,'D','2015-05-26 09:23:19'),(197,27,164,103,165,1,'A','2015-05-26 09:24:53'),(198,27,164,107,165,1,'P','2015-05-26 09:31:48'),(199,27,109,105,98,1,'P','2015-05-26 10:24:29'),(200,27,109,105,128,1,'P','2015-05-26 10:43:03'),(201,27,164,103,165,1,'D','2015-05-26 12:44:35'),(202,27,165,107,164,1,'A','2015-05-26 12:48:58'),(203,27,165,106,164,1,'A','2015-05-26 12:50:00'),(204,27,164,103,165,1,'A','2015-05-26 14:03:34'),(205,27,164,105,165,1,'D','2015-05-26 14:09:31'),(206,27,165,103,164,1,'P','2015-05-26 14:10:42'),(207,27,164,103,165,1,'A','2015-05-26 14:15:09'),(208,27,164,103,165,1,'P','2015-05-26 14:51:11'),(209,27,168,103,165,1,'P','2015-05-26 15:36:33'),(210,27,168,103,98,1,'P','2015-05-26 15:40:34'),(211,27,168,103,165,1,'P','2015-05-26 15:42:32'),(212,27,164,106,113,1,'P','2015-05-27 07:13:29'),(213,27,164,105,113,1,'P','2015-05-27 08:17:31'),(214,27,172,103,171,1,'P','2015-05-27 13:20:48'),(215,27,172,107,171,1,'P','2015-05-27 13:24:20'),(216,27,173,103,172,1,'P','2015-05-27 13:46:56'),(217,27,175,103,98,1,'D','2015-05-29 08:50:49'),(218,27,175,103,98,1,'P','2015-05-29 09:16:26'),(219,27,175,107,98,1,'P','2015-05-29 09:22:37'),(220,27,175,110,98,1,'P','2015-05-29 09:27:06'),(221,27,175,105,171,1,'P','2015-05-29 09:29:00'),(222,27,175,107,165,1,'P','2015-05-29 09:30:01'),(223,27,175,107,98,1,'P','2015-05-29 10:27:11'),(224,27,175,107,98,1,'P','2015-05-29 10:39:57'),(225,27,175,103,98,1,'P','2015-05-29 10:57:36'),(226,1,90,89,63,1,'P','2015-05-31 12:21:15'),(227,1,4,89,5,1,'P','2015-06-02 14:08:23'),(228,27,98,110,99,1,'D','2015-06-03 06:44:17'),(229,1,183,89,182,1,'D','2015-06-03 12:55:55'),(230,1,183,90,182,1,'A','2015-06-03 13:00:11'),(231,1,183,90,182,1,'D','2015-06-03 13:05:38'),(232,1,190,90,189,1,'D','2015-06-04 09:52:10'),(233,1,189,89,190,1,'A','2015-06-04 09:54:25'),(234,1,189,1,190,1,'P','2015-06-04 09:57:27'),(235,1,4,1,5,1,'P','2015-06-04 10:54:00'),(236,1,4,1,5,1,'P','2015-06-04 11:09:04'),(237,1,189,1,185,1,'P','2015-06-08 11:15:40'),(238,1,189,1,185,1,'P','2015-06-08 11:15:51'),(239,1,189,1,185,1,'P','2015-06-08 11:17:44'),(240,1,189,90,185,1,'P','2015-06-08 11:17:55'),(241,1,189,1,185,1,'P','2015-06-08 11:18:04'),(242,1,189,1,185,1,'P','2015-06-08 11:18:29'),(243,1,4,90,5,1,'D','2015-06-10 07:28:23'),(244,1,4,2,5,1,'P','2015-06-10 07:29:34'),(245,1,5,88,4,1,'P','2015-06-10 15:47:26'),(246,1,5,89,4,1,'P','2015-06-10 16:02:06'),(247,1,196,90,195,1,'A','2015-06-11 10:07:53'),(248,1,196,89,195,1,'A','2015-06-11 10:09:00'),(249,1,196,90,195,1,'A','2015-06-11 10:09:50'),(250,1,195,2,196,1,'A','2015-06-11 10:10:37'),(251,1,195,1,196,1,'A','2015-06-11 10:11:39'),(252,1,196,90,195,1,'A','2015-06-11 12:09:20'),(253,1,4,2,195,1,'P','2015-06-11 12:31:58'),(254,1,195,90,4,1,'P','2015-06-11 12:33:23'),(255,1,5,1,4,1,'P','2015-06-11 12:42:33'),(256,1,5,1,4,1,'P','2015-06-11 12:52:28'),(257,1,5,89,4,1,'P','2015-06-11 12:52:56'),(258,1,5,1,4,1,'P','2015-06-11 14:58:55'),(259,1,4,1,5,1,'P','2015-06-11 14:59:46'),(260,1,4,2,5,1,'P','2015-06-11 15:12:07'),(261,1,4,1,5,1,'A','2015-06-12 08:40:22'),(262,1,5,2,4,1,'A','2015-06-12 08:40:44'),(263,1,4,1,5,1,'A','2015-06-12 08:44:03'),(264,1,5,90,4,1,'A','2015-06-12 09:17:58'),(265,1,195,90,196,1,'A','2015-06-12 12:37:42'),(266,1,195,89,196,1,'D','2015-06-12 12:38:27'),(267,1,196,90,195,1,'P','2015-06-12 13:43:09'),(268,1,196,89,195,1,'A','2015-06-12 13:57:45'),(269,1,196,90,195,1,'A','2015-06-12 13:59:28'),(270,1,196,90,195,1,'A','2015-06-12 14:09:22'),(271,1,196,1,195,1,'A','2015-06-12 14:11:57'),(272,1,196,88,195,1,'A','2015-06-12 14:20:50'),(273,1,196,90,195,1,'A','2015-06-12 14:22:22'),(274,1,196,90,195,1,'A','2015-06-12 14:24:11'),(275,1,195,90,196,1,'A','2015-06-12 14:24:44'),(276,1,196,90,195,1,'A','2015-06-12 14:35:25'),(277,1,195,90,4,1,'A','2015-06-15 11:57:21');
/*!40000 ALTER TABLE `drink_offerings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `drinks_master`
--

DROP TABLE IF EXISTS `drinks_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `drinks_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `image` varchar(100) DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `hotel_id` (`hotel_id`),
  KEY `staff_id` (`staff_id`),
  KEY `title` (`title`),
  KEY `price` (`price`),
  KEY `active` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drinks_master`
--

LOCK TABLES `drinks_master` WRITE;
/*!40000 ALTER TABLE `drinks_master` DISABLE KEYS */;
INSERT INTO `drinks_master` VALUES (1,1,NULL,'Drink 1','     Drink 1','1427945606.jpg',20.00,'2015-04-02 09:03:26','Y'),(2,1,NULL,'Drink2','Drink2','1427945634.jpg',25.00,'2015-04-02 09:03:54','Y'),(88,1,NULL,'pepsi','pepsi',NULL,11.00,'2015-04-02 09:24:55','Y'),(89,1,NULL,'pepsi','pepsi','1427946938.jpg',11.00,'2015-04-02 09:25:38','Y'),(90,1,NULL,'cocola','cocola','1427947161.jpg',34.00,'2015-04-02 09:26:26','Y'),(91,2,NULL,'Beer','     Testing purpose','1428607379.jpg',20.00,'2015-04-09 19:22:59','Y'),(98,6,NULL,'Pepsi','Test','1429289068.jpg',10.00,'2015-04-17 16:44:28','Y'),(99,6,NULL,'coca cola','Test Drink','1429289228.jpg',20.00,'2015-04-17 16:47:08','Y'),(101,26,NULL,'Pepsi','Test drink','1429792038.jpg',20.00,'2015-04-23 12:27:18','Y'),(102,26,NULL,'coca cola','Test coca cola',NULL,30.00,'2015-04-23 12:55:53','Y'),(103,27,NULL,'Cocktail','Test Drink','1429807013.jpg',20.00,'2015-04-23 16:36:53','Y'),(104,27,NULL,'Test Drink','Test Drink',NULL,30.00,'2015-04-27 08:46:31','Y'),(105,27,NULL,'Test Drink3','test',NULL,40.00,'2015-04-27 08:49:08','Y'),(106,27,NULL,'Test Drink1','dsdsd',NULL,10.00,'2015-04-30 13:10:14','Y'),(107,27,NULL,'Nice Drink','sdsd',NULL,20.00,'2015-04-30 13:10:31','Y'),(108,40,NULL,'Drink1','Test drink','1431440522.jpg',10.00,'2015-05-12 10:22:02','Y'),(109,40,NULL,'Drink2','Test Drink',NULL,20.00,'2015-05-12 15:41:14','Y'),(110,27,NULL,'Pepsi','Peps1',NULL,30.00,'2015-05-28 06:56:04','Y'),(111,49,NULL,'Drink1','Test Drink',NULL,10.00,'2015-06-17 09:15:27','Y'),(112,49,NULL,'Test Drink2','test',NULL,20.00,'2015-06-17 09:16:30','Y');
/*!40000 ALTER TABLE `drinks_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_config`
--

DROP TABLE IF EXISTS `email_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `email_config` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `email_title` varchar(100) NOT NULL,
  `email_template` text NOT NULL,
  `email_subject` varchar(255) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`email_id`),
  KEY `name` (`name`),
  KEY `email_title` (`email_title`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_config`
--

LOCK TABLES `email_config` WRITE;
/*!40000 ALTER TABLE `email_config` DISABLE KEYS */;
INSERT INTO `email_config` VALUES (1,'member_signup_confirmation_user','Member Registration confirmation for Guest','<p>Hi #FULL_NAME# ,</p>\n<p>Congratulations! You have successfully signed up for InHotel.</p>\n<p>Your account Details</p>\n<p>&nbsp;Username :&nbsp; #USERNAME#</p>\n<p>Password :&nbsp;#PASSWORD#</p>\n<p>&nbsp;</p>\n<p>Thanks,</p>\n<p>InHotel Team.</p>\n<p>&nbsp;</p>',' Account Activation','Y'),(2,'forgot_password','Forgot Password','<p>Hi #FULL_NAME# ,</p>\n<p>Your new password:</p>\n<p>Password :&nbsp;#PASSWORD#</p>\n<p>&nbsp;</p>\n<p>Thanks,</p>\n<p>InHotel Team.</p>\n<p>&nbsp;</p>',' Forgot Password','Y'),(5,'member_signup_confirmation_hotel_admin','Member Registration confirmation for Hotel by admin','<p>Hi #FULL_NAME# ,</p>\n<p>Congratulations!&nbsp;Your hotel has been successfully signed up for InHotel.</p>\n<p>Your account Details</p>\n<p>&nbsp;Username :&nbsp; #USERNAME#</p>\n<p>Password :&nbsp;#PASSWORD#</p>\n<p>Please login your InHotel account by clicking on the link below.</p>\n<p>#LINK# &nbsp;</p>\n<p>&nbsp;</p>\n<p>Thanks,</p>\n<p>InHotel Team.</p>',' Account Activation for Hotel by Admin','Y'),(3,'member_signup_confirmation_hotel','Member Registration confirmation for Hotel','<p>Hi #FULL_NAME# ,</p>\r\n<p>Congratulations! Your hotel has been successfully signed up for InHotel.</p>\r\n<p>Your current subscription plan is 2 months free and can upgrade at any time from your settingsl.</p>\r\n<p>Email Confirmation</p>\r\n<p>Please login your InHotel account by clicking on the link below.</p>\r\n<p>#LINK# &nbsp;</p>\r\n<p>Thanks,</p>\r\n<p>InHotel Team.</p>\r\n<p>&nbsp;</p>',' Account Activation for Hotel','Y'),(4,'member_signup_confirmation_staff_admin','Member Registration confirmation for Staff by admin','<p>Hi #FULL_NAME# ,</p>\n<p>Congratulations! You have successfully signed up for InHotel.</p>\n<p>Your account Details</p>\n<p>&nbsp;Username :&nbsp; #USERNAME#</p>\n<p>Password :&nbsp;#PASSWORD#</p>\n<p>Please login your InHotel account by clicking on the link below.</p>\n<p>#LINK# &nbsp;</p>\n<p>&nbsp;</p>\n<p>Thanks,</p>\n<p>InHotel Team.</p>\n<p>&nbsp;</p>','Account Activation for Hotel Staff by Admin','Y'),(6,'member_signup_confirmation_staff','Member Registration confirmation for Staff','<p>Hi #FULL_NAME# ,</p>\r\n<p>Congratulations! You have successfully signed up for InHotel.</p>\r\n<p>Your account Details</p>\r\n<p>&nbsp;Username :&nbsp; #USERNAME#</p>\r\n<p>Password :&nbsp;#PASSWORD#</p>\r\n<p>Please activate your InHotel account by clicking on the activation link below.</p>\r\n<p>#LINK# &nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Thanks,</p>\r\n<p>InHotel Team.</p>\r\n<p>&nbsp;</p>','Account Activation for Hotel Staff','Y'),(7,'feedback_notification','Feedback Notification','<p>Hi,</p>\r\n<p>You have feedback from #USERNAME#</p>\r\n<p>Feedback :</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; #FEEDBACK#</p>\r\n<p>Thanks,</p>\r\n<p>InHotel Team.</p>','Feedback Notification','Y'),(8,'Membership Subscription Mail','Membership Subscription Mail','Hello #USER#<br />\r\n<p>You have Successfully Subscribed the Memebership</p>\r\n\r\n Please login to #LINK#  for more details.<br /><br /> Thanks<br /> Inhotel Team','Membership Subscription Mail','Y'),(9,'Membership expire notification','Membership expire notification','Hello #USER#,<br />\r\n<p>Your Membership will expire on #EXPIRY_DATE#.</p>\r\n<p>Please Renew your Membership by logging into the site.</p>\r\n<br />\r\n Please login to #LINK# for more details.<br /><br /> Thanks<br /> Inhotel.com','Membership expire notification','Y');
/*!40000 ALTER TABLE `email_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback_master`
--

DROP TABLE IF EXISTS `feedback_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comments` text,
  `date_time` datetime DEFAULT NULL,
  `read_status` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`id`),
  KEY `hotel_id` (`hotel_id`),
  KEY `user_id` (`user_id`),
  KEY `read_status` (`read_status`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback_master`
--

LOCK TABLES `feedback_master` WRITE;
/*!40000 ALTER TABLE `feedback_master` DISABLE KEYS */;
INSERT INTO `feedback_master` VALUES (1,1,156,'test comment','2015-03-12 11:00:00','N');
/*!40000 ALTER TABLE `feedback_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotel_experience`
--

DROP TABLE IF EXISTS `hotel_experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel_experience` (
  `hotel_id` int(11) DEFAULT NULL,
  `experiance` text,
  `user_id` int(11) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel_experience`
--

LOCK TABLES `hotel_experience` WRITE;
/*!40000 ALTER TABLE `hotel_experience` DISABLE KEYS */;
INSERT INTO `hotel_experience` VALUES (27,'Gdfhi cbnkn c bnmk bnmkk nkk bcnmmj mbb mkkk llllll',56,'2015-04-27 16:36:36',1),(1,'test',4,'2015-04-29 02:16:59',2),(1,'test',4,'2015-04-29 05:34:05',3),(1,'Xbx xbxfn',90,'2015-04-29 11:24:08',4),(1,'Write Your ghhhhj',90,'2015-04-29 11:24:17',5),(1,'Test',90,'2015-04-29 11:26:42',6),(1,'Fhj kid ffhj',90,'2015-04-29 11:27:19',7),(1,'Cicfif',90,'2015-04-29 11:28:25',8),(27,'Hi nice hotel to stay',98,'2015-05-04 14:40:20',9),(27,'Fhh chjkkl',99,'2015-05-04 14:41:39',10),(27,'Write Your  x sb',99,'2015-05-04 14:42:58',11),(27,'Write Your Experiance',99,'2015-05-04 14:44:59',12),(27,'Write Your Experiance',99,'2015-05-04 14:45:04',13),(27,'Write Your Experiance',99,'2015-05-04 14:45:17',14),(27,'',105,'2015-05-05 15:11:49',15),(27,'Write Your Experience',106,'2015-05-06 08:22:54',16),(27,'cfgh',113,'2015-05-11 16:44:04',17),(27,'Vhj',113,'2015-05-11 16:44:41',18),(27,'wcevv',113,'2015-05-11 16:50:39',19),(40,'Test',116,'2015-05-12 15:14:20',20),(40,'Sigh dhkj dhkj dhkj dhkj Chen dhkj Chloe CNBC comma ncmmk Bloch calf hjj bulk mm nb ll klick blklgbjhjk jk',116,'2015-05-12 15:15:31',21),(27,'hh',113,'2015-05-12 15:36:47',22),(27,'hello',113,'2015-05-12 15:38:50',23),(27,'testing',113,'2015-05-14 15:52:43',24),(27,'DDD',113,'2015-05-14 15:53:57',25),(27,'hhhh%0Ahjsjsj',113,'2015-05-14 15:57:45',26),(27,'testing%0Atesting%0A',120,'2015-05-15 13:32:25',27),(27,'ggsjss%0Abbxnnxc%0Avxnxkckc',120,'2015-05-15 13:33:01',28),(27,'test%0Atesting%0A',120,'2015-05-15 13:34:08',29),(27,'ggf%0Ahgg%0Ahhh%0Ahhh%0Ah+HB%0Ano%0Aj%0A%0A',109,'2015-05-19 10:31:43',30),(1,'test',4,'2015-05-20 03:47:29',32),(1,'tehgfhghst%0Adfsfdfdf%0A',4,'2015-05-20 03:51:46',33),(1,'tehgfhghst%0Adfsfdfdf%0A',4,'2015-05-20 03:53:43',34),(1,'hit%0Aits%0Aan%0Aexperience',4,'2015-05-20 03:56:18',35),(1,'hi%0Aits%0Aan%0Aexperience',4,'2015-05-20 04:06:28',36),(27,'Test',99,'2015-05-21 10:27:28',37),(27,'DWrite Your Experiance',98,'2015-05-21 13:34:14',38),(27,'Write Your fmckxkckc',99,'2015-05-21 13:34:21',39),(27,'Zhxhxcicof',98,'2015-05-21 13:34:31',40),(27,'Write Yourghjk',99,'2015-05-21 14:10:51',41),(27,'Dghjkk',99,'2015-05-21 14:11:04',42),(1,'Scgv',4,'2015-05-21 14:12:18',43),(1,'Gggg',4,'2015-05-21 14:17:07',44),(1,'Dfgggg%0ADgbdgv',4,'2015-05-21 14:26:14',45),(1,'Sffdcg',4,'2015-05-21 14:26:36',46),(1,'Dcg%0ADfgg%0AJhhh',4,'2015-05-21 14:26:59',47),(27,'dsfsdfsd%0Adfdsfsd',99,'2015-05-22 03:26:30',48),(27,'haii%20123',99,'2015-05-22 03:30:11',49),(27,'Bdndn%0AShsh%20she',138,'2015-05-22 15:33:40',50),(27,'Gg%20hjjj%20%0ACbnnk',138,'2015-05-22 15:33:50',51),(27,'',137,'2015-05-25 06:46:50',52),(27,'',137,'2015-05-25 06:46:56',53),(27,'Test%0ATesting',98,'2015-05-25 08:13:49',54),(27,'%0A',98,'2015-05-25 08:14:02',55),(27,'Test%0ATest',98,'2015-05-25 08:14:12',56),(27,'Vbjj%0ABbj',156,'2015-05-25 12:13:30',57),(27,'%0AJj',156,'2015-05-25 12:13:40',58),(27,'',156,'2015-05-25 12:13:46',59),(27,'Testing%20trst%20%0ALast%20test',157,'2015-05-25 13:06:02',60),(27,'Nice%20hotel%20to%20stay',157,'2015-05-25 13:07:04',61),(27,'test%0Afggh',164,'2015-05-26 10:18:50',62),(27,'nice+hotel',165,'2015-05-26 14:56:09',63),(27,'nice+%0Ahotel',165,'2015-05-26 14:56:28',64),(NULL,'experiance%0Aexperiance%0Aexperiance%20experiance%0Aexperiance%0Aexperiance',4,'2015-05-27 06:23:32',65),(NULL,'ys%0Aexperiance%0Aexperiance%20experiance%0Aexperiance%0Aexperiance',4,'2015-05-27 06:23:56',66),(NULL,'ys%0Aexperiance%0Aexperiance%20experiance%0Aexperiance%0Aexperiance',4,'2015-05-27 06:23:59',67),(NULL,'ys%0Aexperiance%0Aexperiance%20experiance%0Aexperiance%0Aexperiance',4,'2015-05-27 06:25:07',68),(1,'ys%0Aexperiance%0Aexperiance%20experiance%0Aexperiance%0Aexperiance',4,'2015-05-27 06:26:25',69),(27,'yuio',164,'2015-05-27 07:15:37',70),(27,'nice+hotel+to+stay%0Anice+place%0A',172,'2015-05-27 12:48:05',71),(27,'hi+haripriya...+space+space+next%0Anext%0A',172,'2015-05-27 12:50:00',72),(27,'hello',109,'2015-05-28 02:33:13',73),(27,'nice+hotel',109,'2015-05-28 02:33:41',74),(27,'hai%0Anice',109,'2015-05-28 02:34:04',75),(27,'hellosss+space%0Anext',109,'2015-05-28 02:52:05',76),(27,'yyyyyyhh+hhhj%0A',109,'2015-05-28 02:53:00',77),(27,'space+space%0Anext',109,'2015-05-28 02:54:49',78),(27,'space+space%0Ajjjjj',109,'2015-05-28 02:55:32',79),(27,'sap+space%0Abbbb',109,'2015-05-28 03:06:26',80),(27,'CCC+CCC%0Abbbb',109,'2015-05-28 03:11:10',81),(27,'xxxx+vvvv%0Akkkk',109,'2015-05-28 03:12:36',82),(27,'cccc+vvvv%0Annnnn',109,'2015-05-28 03:15:40',83),(27,'vvv+BBB%0Ammmm',109,'2015-05-28 03:18:35',84),(27,'fff+vvv%0Aggg',109,'2015-05-28 03:21:09',85),(27,'gg+hhh%0Avvvvv',109,'2015-05-28 03:23:07',86),(27,'GGG+CCC%0Ahhh',109,'2015-05-28 03:23:22',87),(27,'ff%0Ahhhh+ggg',109,'2015-05-28 03:24:24',88),(27,'GGG+GGG%0Abbbbb',109,'2015-05-28 03:37:50',89),(27,'gg+vvv%0Agggg',109,'2015-05-28 03:41:05',90),(27,'hh+hh%0Ann',109,'2015-05-28 03:56:33',91),(27,'gg+gg%0Ann',109,'2015-05-28 03:57:19',92),(27,'CCC+CCC%0Annnn',109,'2015-05-28 04:01:28',93),(27,'CCC+CCC%0Annnn',109,'2015-05-28 04:01:44',94),(27,'CCC+CCC%0Annnn',109,'2015-05-28 04:03:14',95),(27,'CCC+CCC%0Annnn',109,'2015-05-28 04:03:24',96),(27,'vvv+vvv%0Ahgggg',109,'2015-05-28 04:16:15',97),(27,'vvv+vvv%0Ahgggg',109,'2015-05-28 04:18:40',98),(27,'vvv+vvv%0Ahgggg',109,'2015-05-28 04:19:02',99),(27,'gshgs+dhdh%0Ahhh',109,'2015-05-28 04:24:13',100),(27,'gshgs+dhdh+LPP%0Ahhh',109,'2015-05-28 04:30:35',101),(1,'Yhsjdjfjkfkfkfoifkf',90,'2015-05-31 11:25:40',102),(1,'Ghzhxj',90,'2015-05-31 12:23:39',103),(27,'test%0Atesting%0Atestinggghh',98,'2015-06-02 10:12:55',104),(27,'xvvb+fjkk+fjkkkk+gjklll+fhkkk+djlhd+fsgjk+dhjkj+fnk+gbkl+gjkk+fjk+fjki+fnkll+cjkl+fjllj+cjj+cjjkv+vkkkk+tedyl+testing',98,'2015-06-02 10:14:49',105);
/*!40000 ALTER TABLE `hotel_experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotel_profile`
--

DROP TABLE IF EXISTS `hotel_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `short_description` text,
  `description` text,
  `city` varchar(200) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_number` varchar(100) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `feedback_email` varchar(200) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `city` (`city`),
  KEY `address` (`address`),
  KEY `contact_number` (`contact_number`),
  KEY `website` (`website`),
  KEY `feedback_email` (`feedback_email`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel_profile`
--

LOCK TABLES `hotel_profile` WRITE;
/*!40000 ALTER TABLE `hotel_profile` DISABLE KEYS */;
INSERT INTO `hotel_profile` VALUES (1,1,'mereena hotel','mereena hotel','mereena hotel','ernakulam','ernakulam','12345678','1429255409.jpg','www.hotel1.com','haripriya@newagesmb.com',NULL),(2,11,'Beachorchid','Test Hotel','Test Hotel','Princeton','231 Clarksville road','12332332333',NULL,'www.beachorchid.com','','2015-04-09 17:10:27'),(5,18,'vani','','','paadivattam','Kottayam','324345657678',NULL,'',NULL,NULL),(6,19,'Windsor','     Test Restaurant','  Test Hotel   ','Princeton','231 Clarksville road','123423342333','1429291835.jpg','www.windsor.com',NULL,'2015-04-17 16:38:58'),(7,20,'Windsor','     Test Restaurant','  Test Hotel   ','Princeton','231 Clarksville road','123423342333',NULL,'www.windsor.com',NULL,'2015-04-17 16:39:13'),(8,21,'sdsd','     ','     ','Princeton','231 Clarksville road','123423342333',NULL,'sdsd',NULL,'2015-04-17 16:40:40'),(9,22,'test','     ','     ','testreset1','testreset1','243254364',NULL,'',NULL,'2015-04-20 06:28:19'),(10,23,'Home ',NULL,NULL,NULL,NULL,'324345657678',NULL,NULL,NULL,NULL),(11,24,'holyangel hotel','     ernakulam','     ernakulam','ernakulam','ernakulam','4234324234234',NULL,'www.hotel1@inhotel.com',NULL,'2015-04-20 11:14:20'),(12,25,'holyangel hotel','     ernakulam','     ernakulam','ernakulam','ernakulam','4234324234234',NULL,'www.hotel1@inhotel.com',NULL,'2015-04-20 11:15:21'),(13,26,'holyangel hotel','     ernakulam','     ernakulam','ernakulam','ernakulam','4234324234234',NULL,'www.hotel1@inhotel.com',NULL,'2015-04-20 11:15:27'),(14,27,'holyangel hotel','     ernakulam','     ernakulam','ernakulam','ernakulam','4234324234234',NULL,'www.hotel1@inhotel.com',NULL,'2015-04-20 11:17:24'),(15,28,'holyangel hotel','     ernakulam','     ernakulam','ernakulam','ernakulam','4234324234234',NULL,'www.hotel1@inhotel.com',NULL,'2015-04-20 11:17:27'),(16,29,'holyangel hotel','     ernakulam','     ernakulam','ernakulam','ernakulam','4234324234234',NULL,'www.hotel1@inhotel.com',NULL,'2015-04-20 11:20:38'),(17,30,'mereena123 hotel','     ','     ','ernakulam','ernakulam','4234324234234',NULL,'www.hotel1234@inhotel.com',NULL,'2015-04-20 11:23:44'),(18,31,'mereena123 hotel','     ','     ','ernakulam','ernakulam','4234324234234',NULL,'www.hotel1234@inhotel.com',NULL,'2015-04-20 11:25:14'),(19,32,'mereena123 hotel','     ','     ','ernakulam','ernakulam','4234324234234',NULL,'www.hotel1234@inhotel.com',NULL,'2015-04-20 11:29:54'),(20,33,'fgdf','     ','     ','fdg','fgdfg','fg',NULL,'dfgdf',NULL,'2015-04-20 11:31:33'),(21,34,'mereena hotel123','     ','     ','ernakulam','ernakulam','4234324234234',NULL,'',NULL,'2015-04-20 11:36:16'),(22,35,'test','     ','     ','ernakulam','padivattom','123456789',NULL,'',NULL,'2015-04-20 12:35:04'),(23,38,'TajMalabar','Test\nTesting','Test\nTesting','Princeton','231 Clarksville roadPrinceton Junction NJ','1-233-233-2333','1429720643.jpg','www.taj.com',NULL,NULL),(24,39,'oberon','     Test \n      Testing','     ','NewYork','111 greensfield Town','1-333-233-2333','1429720967.jpg','www.oberon.com',NULL,'2015-04-22 16:42:46'),(25,40,'Newage','Test\nTesting','Test\nTesting','Princeton','231 Clarksville road Princeton Junction NewJersey','1-233-233-2333','1429734840.jpg','www.newage.com',NULL,NULL),(26,41,'Raviz','     Test\nTesting','     Test\nTesting','NY','100 Goldtown ville','1-233-233-4555','1429721666.jpg','www.raviz.com',NULL,'2015-04-22 16:54:26'),(27,47,'ParkCentral','    Test\nTesting','Nice place to dream and rest asdf dsf skdfj ksd fkjds jfksd jfksd jfkds jfks dfksd jfksd jf ksf sdk fksd jfks dfksd fksd fkjsd fksd jfksd fjksd fkd fkds fjksdf ksd fjks fsdkf kds fkds fksd fkds fksd fjks dfkjs dfkds fsjd fjks fks jfds dfks jdfksd jfjksd fk sdfks jfdksd fksd fkj sd fkjsdf ksdfk jsf ksdj fjs kfjsdf ksd fksf iojlkjkk nono o o oi  u i i iu i i i uikuj  ik i  ik ik    iuk ui testing','Princeton','231 Clarksville road Princeton Junction NewJersey','1-233-233-2333','1429801553.jpg','www.parkcentral.com','haripriya@newagesmb.com','2015-04-23 15:05:53'),(28,51,'Lucia','     aghsd dahd sad hsa dhsadj d as hdasjdjsad hsa jdsa hdjsad jasd jasdjas hdjasd asdh jsa djas d jsad jsa djas djsa djas dj asdj as sa dhsa dj sdja sdjasd jsad jsa djs hadjasd asjd jsa dj sa','     sadasd sadsabd sadnas dnbsa db sa dnas d sa das dbnas dnasdb asnbd sand nas dnas dnsab dnsa dbsa dnsa dnbsa dnbasd nsbad ansd nsad nad nas dnasdbsa dnbas dnsad nasd nsad ','Princeton','231 Clarksville road Princeton Junction NewJersey','1-233-233-2333','1429819667.jpg','www.lucia.com',NULL,'2015-04-23 20:07:47'),(29,58,'Marriot',NULL,NULL,NULL,NULL,'12332332333',NULL,NULL,NULL,NULL),(30,61,'Goldenpark','     ','     ','Princeton','231 clarksville road ','1232323232323',NULL,'www.gp.com',NULL,'2015-04-24 15:10:30'),(31,64,'lavender',NULL,NULL,NULL,NULL,'3423423423435',NULL,NULL,NULL,NULL),(32,69,'Nila',NULL,NULL,NULL,NULL,'1-332-332-2333',NULL,NULL,NULL,NULL),(33,71,'mazuri Japaneese cuisine',NULL,NULL,NULL,NULL,'1-233-233-2333',NULL,NULL,NULL,NULL),(34,72,'Sushi','     ','     ','Princeton','231 clarksville road','1-233-233-2333','1430148228.jpg','www.sushi.com',NULL,'2015-04-27 11:23:48'),(35,73,'Sushi','     ','     ','Princeton','231 clarksville road','1-233-233-2333','1430148368.jpg','www.sushi.com',NULL,'2015-04-27 11:26:08'),(36,74,'Sushi','     ','     ','Princeton','231 clarksville road','1-233-233-2333',NULL,'www.sushi.com',NULL,'2015-04-27 11:32:19'),(37,77,'Sushi','     ','     ','Princeton','231 clarksville road','1-233-233-2333','1430152321.jpg','www.sushi.com',NULL,'2015-04-27 12:32:01'),(38,80,'new',NULL,NULL,NULL,NULL,'3423423434',NULL,NULL,NULL,NULL),(39,97,'Pearl',NULL,NULL,NULL,NULL,'12332332333',NULL,NULL,NULL,NULL),(40,114,'Marrios','Nice place to take rest and dream and more','Overseas Chinese Friendship Hotel is located in Tianhe district,the new city center of Guangzhou. With easy access to main throughfares,it is 5 minutes drive from Guangzhou East Station,30 minutes from the new Baiyun International Airport,and 15 minutes from pazhou Exhibition Center and subway stations are with walking distance','Princeton','231 Clarksville road \nPrinceton Junction \nNewJersey','12333452345','1431428673.jpg','www.marrios.com','feedback@marrios.com',NULL),(41,202,'Eyelash',NULL,NULL,NULL,NULL,'34234',NULL,NULL,NULL,NULL),(42,203,'0',NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL),(43,204,'0',NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL),(44,205,'0',NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL),(45,206,'0',NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL),(46,207,'0',NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL),(47,208,'0',NULL,NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL),(48,209,'sun-shine',NULL,NULL,NULL,NULL,'324234234',NULL,NULL,NULL,NULL),(49,210,'Orchid',NULL,NULL,NULL,NULL,'1-233-233-2333',NULL,NULL,NULL,NULL),(50,211,'Facial List',NULL,NULL,NULL,NULL,'(111) 222-2222',NULL,NULL,NULL,NULL),(51,212,'Nail List',NULL,NULL,NULL,NULL,'4534545',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `hotel_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotel_zone_list`
--

DROP TABLE IF EXISTS `hotel_zone_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel_zone_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zone_name` varchar(100) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `zone_name` (`zone_name`),
  KEY `active` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel_zone_list`
--

LOCK TABLES `hotel_zone_list` WRITE;
/*!40000 ALTER TABLE `hotel_zone_list` DISABLE KEYS */;
INSERT INTO `hotel_zone_list` VALUES (1,'Restaurant','Y'),(2,'Room','Y'),(3,'Bar','Y'),(4,'Spa ','Y'),(5,'Swimming Pool','N');
/*!40000 ALTER TABLE `hotel_zone_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `in_admin_user`
--

DROP TABLE IF EXISTS `in_admin_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `in_admin_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `radius` float NOT NULL,
  `sandbox` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  `application_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `developer_account_email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `api_username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `api_password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `api_signature` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `password` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `in_admin_user`
--

LOCK TABLES `in_admin_user` WRITE;
/*!40000 ALTER TABLE `in_admin_user` DISABLE KEYS */;
INSERT INTO `in_admin_user` VALUES (1,'admin','admin','aswathy@newagesmb.com',0,'Y','','','','','','Admin');
/*!40000 ALTER TABLE `in_admin_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `in_email_config`
--

DROP TABLE IF EXISTS `in_email_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `in_email_config` (
  `email_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `email_title` varchar(100) NOT NULL,
  `email_template` text NOT NULL,
  `email_subject` varchar(255) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`email_id`),
  KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `in_email_config`
--

LOCK TABLES `in_email_config` WRITE;
/*!40000 ALTER TABLE `in_email_config` DISABLE KEYS */;
INSERT INTO `in_email_config` VALUES (1,'forgot_password','Forgot Password - Admin','<table style=\"border: 1px solid #6d92a0; border-radius: 3px 3px 3px 3px; width: 700px;\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#6D92A0\">\n<tbody>\n<tr>\n<td style=\"padding: 10px; font: normal 14px Arial, Helvetica, sans-serif; color: #0063df;\" colspan=\"2\">\n<p style=\"font-size: 18px; text-align: center;\"><a style=\"text-decoration: none;\" href=\"#URL#\"><img src=\"../../../public/images/logo.png\" alt=\"\" width=\"286\" height=\"130\" /><img style=\"background-color: green; outline: medium none; padding: 15px;\" src=\"#LOGO#\" alt=\"\" width=\"156\" /></a></p>\n</td>\n</tr>\n<tr>\n<td>\n<table style=\"background: none repeat scroll 0% 0% #f2f2f2; padding: 30px 10px; border-radius: 5px 5px 5px 5px; width: 630px;\" border=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td style=\"padding: 10px 25px; font: normal 14px Arial, Helvetica, sans-serif; color: #333;\">\n<p style=\"font-size: 22px; margin: 0;\">Hi Admin,</p>\n</td>\n</tr>\n<tr>\n<td style=\"padding: 10px 25px; font: normal 14px Arial, Helvetica, sans-serif; color: #333;\">\n<p style=\"font-size: 16px; margin-top: 05px; margin-bottom: 05px;\">Username : #USERNAME#</p>\n<p style=\"font-size: 16px; margin-top: 0px;\">Password : #PASSWORD#</p>\n</td>\n</tr>\n<tr>\n<td style=\"padding: 0px 25px; font: normal 14px Arial, Helvetica, sans-serif; color: #333;\">\n<p style=\"font-size: 14px; margin-top: 0px; margin-bottom: 0px;\"><a style=\"color: #1663cc; text-decoration: none;\" href=\"#URL#admin\">Click here to Login..</a></p>\n</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr>\n<td>\n<p style=\"color: #fff; font-size: 12px; padding-left: 38px;\">Webmaster<br /> inhotel</p>\n</td>\n</tr>\n<tr>\n<td style=\"color: #212121; font-size: 12px; height: 16px; background: #387489; padding: 10px 25px; font-family: Arial, Helvetica, sans-serif;\">Copyright &copy; 2015 <a style=\"color: #fff; text-decoration: none;\" href=\"#URL#\">inhotel.com</a></td>\n</tr>\n</tbody>\n</table>','Forgot Password - Admin','Y'),(2,'follower_mail','Follower Mail','<table style=\"border: 1px solid #6d92a0; border-radius: 3px 3px 3px 3px; width: 700px;\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#6D92A0\">\r\n<tbody>\r\n<tr>\r\n<td style=\"padding: 5px; font: normal 14px Arial, Helvetica, sans-serif; color: #0063df;\" colspan=\"2\">\r\n<p style=\"font-size: 18px; text-align: center;\"><a style=\"text-decoration: none;\" href=\"#URL#\"><img src=\"#LOGO#\" alt=\"\" width=\"156\" height=\"66\" /></a></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<table style=\"background: none repeat scroll 0% 0% #f2f2f2; padding: 30px 10px; border-radius: 5px 5px 5px 5px; width: 630px;\" border=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"padding: 10px 25px; font: normal 14px Arial, Helvetica, sans-serif; color: #333;\">\r\n<p style=\"font-size: 22px; margin: 0;\" align=\"center\">Hai <a style=\"text-decoration: none;\" href=\"#URL#user/profile/#USERID#\">#USERNAME#</a> ,</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style=\"padding: 10px 25px; font: normal 14px Arial, Helvetica, sans-serif; color: #333;\">\r\n<p style=\"font-size: 22px; margin: 0;\" align=\"center\"><a style=\"text-decoration: none;\" href=\"#URL#user/profile/#FOLLOWERID#\">#FOLLOWERNAME#</a> just followed you on <a style=\"text-decoration: none;\" href=\"#URL#\">DUZZ</a>.</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style=\"padding: 10px 25px; font: normal 14px Arial, Helvetica, sans-serif; color: #333;\" align=\"center\"><a style=\"text-decoration: none;\" href=\"#URL#user/profile/#FOLLOWERID#\"><img style=\"border-radius: 50%;\" src=\"#FOLLOWER_IMAGE#\" alt=\"\" width=\"100\" height=\"100\" /></a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p style=\"color: #fff; font-size: 12px; padding-left: 38px;\">Webmaster<br /> duzz</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style=\"color: #212121; font-size: 12px; height: 16px; background: #387489; padding: 10px 25px; font-family: Arial, Helvetica, sans-serif;\">Copyright &copy; 2014 <a style=\"text-decoration: none;\" href=\"#URL#\">duzz.com</a></td>\r\n</tr>\r\n</tbody>\r\n</table>','Follower Mail','N'),(3,'review_comment','Review Comment','<table style=\"border: 1px solid #6d92a0; border-radius: 3px 3px 3px 3px; width: 700px;\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#6D92A0\">\r\n<tbody>\r\n<tr>\r\n<td style=\"padding: 20px; font: normal 14px Arial, Helvetica, sans-serif; color: #0063df;\" colspan=\"2\">\r\n<p style=\"font-size: 18px; text-align: center;\"><a style=\"text-decoration: none;\" href=\"#URL#\"><img src=\"#LOGO#\" alt=\"\" width=\"156\" height=\"66\" /></a></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<table style=\"background: none repeat scroll 0% 0% #f2f2f2; padding: 30px 10px; border-radius: 5px 5px 5px 5px; width: 630px;\" border=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"padding: 10px 25px; font: normal 14px Arial, Helvetica, sans-serif; color: #333;\">\r\n<p style=\"font-size: 22px; margin: 0;\" align=\"center\">Hai <a style=\"text-decoration: none;\" href=\"#URL#user/profile/#MYUSERID#\">#USERNAME#</a>,</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style=\"padding: 10px 25px; font: normal 14px Arial, Helvetica, sans-serif; color: #333;\">\r\n<p style=\"font-size: 22px; margin: 0;\" align=\"center\"><a style=\"text-decoration: none;\" href=\"#URL#user/profile/#USERID#\">#NAME#</a> commented your review of <a style=\"text-decoration: none;\" href=\"#URL#restaurant/details/#RESTID#\">#RESTNAME#</a> on <a style=\"text-decoration: none;\" href=\"#URL#\">DUZZ</a>.</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style=\"padding: 10px 25px; font: normal 14px Arial, Helvetica, sans-serif; color: #333;\" align=\"center\"><a style=\"text-decoration: none;\" href=\"#URL#user/profile/#USERID#\"><img style=\"border-radius: 50%;\" src=\"#IMAGE#\" alt=\"\" width=\"100\" height=\"100\" /></a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p style=\"color: #fff; font-size: 12px; padding-left: 38px;\">Webmaster<br /> duzz</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style=\"color: #212121; font-size: 12px; height: 16px; background: #387489; padding: 10px 25px; font-family: Arial, Helvetica, sans-serif;\">Copyright &copy; 2014 <a style=\"text-decoration: none;\" href=\"#URL#\">duzz.com</a></td>\r\n</tr>\r\n</tbody>\r\n</table>','Review Comment','N'),(4,'review_like','Review Like','<table style=\"border: 1px solid #6d92a0; border-radius: 3px 3px 3px 3px; width: 700px;\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#6D92A0\">\r\n<tbody>\r\n<tr>\r\n<td style=\"padding: 20px; font: normal 14px Arial, Helvetica, sans-serif; color: #0063df;\" colspan=\"2\">\r\n<p style=\"font-size: 18px; text-align: center;\"><a style=\"text-decoration: none;\" href=\"#URL#\"><img src=\"#LOGO#\" alt=\"\" width=\"156\" height=\"66\" /></a></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<table style=\"background: none repeat scroll 0% 0% #f2f2f2; padding: 30px 10px; border-radius: 5px 5px 5px 5px; width: 630px;\" border=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"padding: 10px 25px; font: normal 14px Arial, Helvetica, sans-serif; color: #333;\">\r\n<p style=\"font-size: 22px; margin: 0;\" align=\"center\">Hai <a style=\"text-decoration: none;\" href=\"#URL#user/profile/#MYUSERID#\">#USERNAME#</a>,</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style=\"padding: 10px 25px; font: normal 14px Arial, Helvetica, sans-serif; color: #333;\">\r\n<p style=\"font-size: 22px; margin: 0;\" align=\"center\"><a style=\"text-decoration: none;\" href=\"#URL#user/profile/#USERID#\">#NAME#</a> liked your review of <a style=\"text-decoration: none;\" href=\"#URL#restaurant/details/#RESTID#\">#RESTNAME#</a> on <a style=\"text-decoration: none;\" href=\"#URL#\">DUZZ</a>.</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style=\"padding: 10px 25px; font: normal 14px Arial, Helvetica, sans-serif; color: #333;\" align=\"center\"><a style=\"text-decoration: none;\" href=\"#URL#user/profile/#USERID#\"><img style=\"border-radius: 50%;\" src=\"#IMAGE#\" alt=\"\" width=\"100\" height=\"100\" /></a></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p style=\"color: #fff; font-size: 12px; padding-left: 38px;\">Webmaster<br /> duzz</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style=\"color: #212121; font-size: 12px; height: 16px; background: #387489; padding: 10px 25px; font-family: Arial, Helvetica, sans-serif;\">Copyright &copy; 2014 <a style=\"text-decoration: none;\" href=\"#URL#\">duzz.com</a></td>\r\n</tr>\r\n</tbody>\r\n</table>','Review Like','N'),(5,'user_forgot_password','Forgot Password - User','<table style=\"border: 1px solid #6d92a0; border-radius: 3px 3px 3px 3px; width: 700px;\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#6D92A0\">\n<tbody>\n<tr>\n<td style=\"padding: 20px; font: normal 14px Arial, Helvetica, sans-serif; color: #0063df;\" colspan=\"2\">\n<p style=\"font-size: 18px; text-align: center;\"><a style=\"text-decoration: none;\" href=\"#URL#\"><img src=\"#LOGO#\" alt=\"\" width=\"156\" height=\"66\" /></a></p>\n</td>\n</tr>\n<tr>\n<td>\n<table style=\"background: none repeat scroll 0% 0% #f2f2f2; padding: 30px 10px; border-radius: 5px 5px 5px 5px; width: 630px;\" border=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td style=\"padding: 10px 25px; font: normal 14px Arial, Helvetica, sans-serif; color: #333;\">\n<p style=\"font-size: 22px; margin: 0;\">Hi #USERNAME#,</p>\n</td>\n</tr>\n<tr>\n<td style=\"padding: 10px 25px; font: normal 14px Arial, Helvetica, sans-serif; color: #333;\">\n<p style=\"font-size: 16px; margin-top: 05px; margin-bottom: 05px;\">Username : #USERNAME#</p>\n<p style=\"font-size: 16px; margin-top: 0px;\">Password : #PASSWORD#</p>\n</td>\n</tr>\n<tr>\n<td style=\"padding: 0px 25px; font: normal 14px Arial, Helvetica, sans-serif; color: #333;\">\n<p style=\"font-size: 14px; margin-top: 0px; margin-bottom: 0px;\"><a style=\"color: #1663cc; text-decoration: none;\" href=\"#URL#\">Click here to Login..</a></p>\n</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr>\n<td>\n<p style=\"color: #fff; font-size: 12px; padding-left: 38px;\">Webmaster<br /> duzz</p>\n</td>\n</tr>\n<tr>\n<td style=\"color: #212121; font-size: 12px; height: 16px; background: #387489; padding: 10px 25px; font-family: Arial, Helvetica, sans-serif;\">Copyright &copy; 2014 <a style=\"color: #fff; text-decoration: none;\" href=\"#URL#\">duzz.com</a></td>\n</tr>\n</tbody>\n</table>','Forgot Password - User','N'),(6,'registration','Registration','<table style=\"border: 1px solid #6d92a0; border-radius: 3px 3px 3px 3px; width: 700px;\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#6D92A0\">\n<tbody>\n<tr>\n<td style=\"padding: 10px; font: normal 14px Arial, Helvetica, sans-serif; color: #0063df;\" colspan=\"2\">\n<p style=\"font-size: 18px; text-align: center;\"><img src=\"../../../public/images/logo.png\" alt=\"\" width=\"286\" height=\"130\" />&nbsp;</p>\n</td>\n</tr>\n<tr>\n<td>\n<table style=\"background: none repeat scroll 0% 0% #f2f2f2; padding: 30px 10px; border-radius: 5px 5px 5px 5px; width: 630px;\" border=\"0\" align=\"center\">\n<tbody>\n<tr>\n<td style=\"padding: 10px 25px; font: normal 14px Arial, Helvetica, sans-serif; color: #333;\">\n<p style=\"font-size: 22px; margin: 0;\">Hi #E_NAME#,</p>\n</td>\n</tr>\n<tr>\n<td style=\"padding: 10px 25px; font: normal 14px Arial, Helvetica, sans-serif; color: #333;\">\n<p style=\"font-size: 16px; margin-top: 05px; margin-bottom: 05px;\">You have been successfully registered with InHotel.&nbsp;</p>\n<p style=\"font-size: 16px; margin-top: 0px;\">Your account details are :</p>\n<p style=\"font-size: 16px; margin-top: 0px; margin-bottom: 05px;\">Username : #USERNAME#</p>\n<p style=\"font-size: 16px; margin-top: 0px;\">Password : #PASSWORD#</p>\n<p style=\"font-size: 16px; margin-top: 0px;\">Thank you for registering with us.</p>\n</td>\n</tr>\n<tr>\n<td style=\"padding: 0px 25px; font: normal 14px Arial, Helvetica, sans-serif; color: #333;\"><!--<p style=\"font-size: 14px; margin-top: 0px; margin-bottom: 0px;\"><a style=\"color: #1663cc; text-decoration: none;\" href=\"#URL#admin\">Click here to Login..</a></p>--></td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n<tr>\n<td>\n<p style=\"color: #fff; font-size: 12px; padding-left: 38px;\">Webmaster<br /> inhotel</p>\n</td>\n</tr>\n<tr>\n<td style=\"color: #212121; font-size: 12px; height: 16px; background: #387489; padding: 10px 25px; font-family: Arial, Helvetica, sans-serif;\">Copyright &copy; 2015 inhotel<a style=\"color: #fff; text-decoration: none;\" href=\"#URL#\">.com</a></td>\n</tr>\n</tbody>\n</table>','Registration','Y'),(64,'New Password','New Password','<table style=\"border: 1px solid #6d92a0; border-radius: 3px 3px 3px 3px; width: 700px;\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#6D92A0\">\r\n<tbody>\r\n<tr>\r\n<td style=\"padding: 10px; font: normal 14px Arial, Helvetica, sans-serif; color: #0063df;\" colspan=\"2\">\r\n<p style=\"font-size: 18px; text-align: center;\"><a style=\"text-decoration: none;\" href=\"#URL#\"><img style=\"background-color: green; outline: medium none; padding: 15px;\" src=\"#LOGO#\" alt=\"\" width=\"156\" /></a></p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<table style=\"background: none repeat scroll 0% 0% #f2f2f2; padding: 30px 10px; border-radius: 5px 5px 5px 5px; width: 630px;\" border=\"0\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td style=\"padding: 10px 25px; font: normal 14px Arial, Helvetica, sans-serif; color: #333;\">\r\n<p style=\"font-size: 22px; margin: 0;\">Hi #USERNAME#,</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style=\"padding: 10px 25px; font: normal 14px Arial, Helvetica, sans-serif; color: #333;\">\r\n<p style=\"font-size: 16px; margin-top: 05px; margin-bottom: 05px;\">New Password : #PASSWORD#</p>\r\n<p style=\"font-size: 16px; margin-top: 0px;\">&nbsp;</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>\r\n<p style=\"color: #fff; font-size: 12px; padding-left: 38px;\">rotolegends</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td style=\"color: #212121; font-size: 12px; height: 16px; background: #387489; padding: 10px 25px; font-family: Arial, Helvetica, sans-serif;\">Copyright &copy; 2015 <a style=\"color: #fff; text-decoration: none;\" href=\"#URL#\">rotolegends.com</a></td>\r\n</tr>\r\n</tbody>\r\n</table>','New Password','N'),(65,'test','test','<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<table style=\"width: 650px;\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#FFFFFF\">\r\n<tbody>\r\n<tr>\r\n<td style=\"padding: 15px;\" bgcolor=\"#FFFFF\"><img src=\"../../../../sinflip/images/logo1.png\" alt=\"logo\" /></td>\r\n</tr>\r\n<tr>\r\n<td><br /> <br />\r\n<table style=\"margin: 15px; width: 650px;\" border=\"0\" cellspacing=\"0\" cellpadding=\"\">\r\n<tbody>\r\n<tr>\r\n<td style=\"padding: 15px 0px; font-size: 14px;\"><strong>Weekly Mail content<br /></strong></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>&nbsp;</p>','test','N');
/*!40000 ALTER TABLE `in_email_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `in_member_master`
--

DROP TABLE IF EXISTS `in_member_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `in_member_master` (
  `user_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  `deleted` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `join_date` datetime NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('M','F') COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nick_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_type` int(10) NOT NULL,
  `hotel_id` int(10) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `device_token` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `status` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profile_description` text COLLATE utf8_unicode_ci,
  `chat_status` enum('Y','N') COLLATE utf8_unicode_ci DEFAULT 'N' COMMENT 'online/offline',
  `enter_to_send` tinyint(1) DEFAULT '0' COMMENT 'press enter to send message',
  `package_id` int(11) DEFAULT '0',
  `amount_paid` enum('N','Y') COLLATE utf8_unicode_ci DEFAULT 'Y',
  `transaction_id` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_modified` datetime DEFAULT NULL,
  `activation_id` int(11) DEFAULT NULL,
  `quickblox_id` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iphone_noti_count` int(11) DEFAULT '0',
  `room_enable` enum('N','Y') COLLATE utf8_unicode_ci DEFAULT 'N',
  `gcm_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subscription_status` enum('N','Y') COLLATE utf8_unicode_ci DEFAULT 'N',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `in_member_master`
--

LOCK TABLES `in_member_master` WRITE;
/*!40000 ALTER TABLE `in_member_master` DISABLE KEYS */;
INSERT INTO `in_member_master` VALUES (1,'e10adc3949ba59abbe56e057f20f883e','hotel1@inhotel.com','Y','N','2015-06-17 00:00:00','aswathy','F','2015-04-02','aswathy','aswathy',NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2588694',NULL,NULL,'',0,'Y',NULL,'Y'),(2,'e10adc3949ba59abbe56e057f20f883e','staff1@hotel1.com','Y','N','2015-04-02 08:59:35','P K','F','1991-09-19','haripriya','harry',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'3597880',8,'Y',NULL,'N'),(3,'e10adc3949ba59abbe56e057f20f883e','staff2@hotel1.com','Y','N','2015-04-02 09:00:31','R','F','1988-06-05','reshma','resh',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(4,'e10adc3949ba59abbe56e057f20f883e','guest1@hotel.com','Y','N','0000-00-00 00:00:00','','F','1988-06-05','Anu','Jose',NULL,1,0,'2015-06-17 07:06:00','',NULL,'','Description','Y',1,0,'Y',NULL,'2015-06-12 07:31:15',21,'3464273',2,'Y',NULL,'N'),(5,'e10adc3949ba59abbe56e057f20f883e','guest2@hotel.com','Y','N','2015-04-02 09:07:53','','M','1991-01-01','ajay','ajay',NULL,1,0,'2015-06-15 11:25:37','','','','Description','Y',1,0,'Y',NULL,'2015-06-09 10:50:07',22,'3464280',4,'Y',NULL,'N'),(6,'e10adc3949ba59abbe56e057f20f883e','staff3@hotel1.com','Y','N','2015-04-02 12:34:39','k','M','2015-04-02','umesh','umesh',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'3484369',0,'Y',NULL,'N'),(7,'e10adc3949ba59abbe56e057f20f883e','staff4@hotel1.com','Y','N','2015-04-02 12:35:49','v','M','2015-04-02','vivek','vicky',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'3484386',0,'Y',NULL,'N'),(8,'e10adc3949ba59abbe56e057f20f883e','staff5@hotel1.com','Y','N','2015-04-02 12:36:55','twinkle','F','2015-04-02','twinkle','twinkle',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(9,'e10adc3949ba59abbe56e057f20f883e','anton@newagesmb.com','Y','Y','2015-04-09 04:28:02','Joseph','M','1990-12-01','anton','',NULL,1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(10,'e10adc3949ba59abbe56e057f20f883e','biju@newagesmb.com','Y','N','2015-04-09 16:32:46','george','M','1990-04-01','biju','biju',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(11,'d41d8cd98f00b204e9800998ecf8427e','beachorchid@mail.com','Y','N','2015-06-17 00:00:00','orchid','M','0000-00-00','Beach','beach orchid',NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(12,'e10adc3949ba59abbe56e057f20f883e','john@newagesmb.com','Y','N','2015-04-09 05:25:33','joseph','M','2000-04-02','john','john',NULL,1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(13,'601910eac41b7cc21e472cb13deede06','jibin@newagesmb.com','Y','N','2015-04-09 17:28:34','joy','M','2010-04-01','Jibin','jibin',NULL,3,2,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(14,'e10adc3949ba59abbe56e057f20f883e','mahesh@newagesmb.com','Y','N','2015-04-09 17:31:42','mohan','M','2008-01-01','mahesh','mahesh',NULL,3,2,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'3484069',0,'Y',NULL,'N'),(15,'24ec58af6b967430cf20914cc7547c41','testanu@newagesmb.com','Y','N','2015-04-10 08:51:18','testanu','F','2015-04-10','testanu','testanu',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(19,'ec2da3ad44ecbd2e3909224ec40ce3a3','akhil@newagesmb.com','Y','N','2015-06-17 00:00:00','PD','M','0000-00-00','Akhil','Akhil',NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,0,'N',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(20,'e10adc3949ba59abbe56e057f20f883e','akhil@newagesmb.com','Y','Y','2015-06-17 00:00:00','PD','M','0000-00-00','Akhil','Akhil',NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'N',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(21,'e10adc3949ba59abbe56e057f20f883e','dfgd@mail.com','Y','N','2015-06-17 00:00:00','sdsd','M','0000-00-00','sdds','sdsd',NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,0,'N',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(22,'e10adc3949ba59abbe56e057f20f883e','tesdedtreset1@jfgj.sad','Y','N','2015-06-17 00:00:00','testreset1','M','0000-00-00','testreset1','test',NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,0,'N',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(30,'e10adc3949ba59abbe56e057f20f883e','hotel1234@inhotel.com','Y','N','2015-06-17 00:00:00','P K','M','0000-00-00','haripriya',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'N',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(31,'e10adc3949ba59abbe56e057f20f883e','hotel1234@inhotel.com','Y','N','2015-06-17 00:00:00','P K','M','0000-00-00','haripriya',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'N',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(32,'e10adc3949ba59abbe56e057f20f883e','hotel1234@inhotel.com','Y','N','2015-06-17 00:00:00','P K','M','0000-00-00','haripriya',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'N',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(33,'e10adc3949ba59abbe56e057f20f883e','hotel45551@inhotel.com','Y','N','2015-06-17 00:00:00','gdfgdf','M','0000-00-00','fgdf',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'N',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(34,'e10adc3949ba59abbe56e057f20f883e','anu@newagesmb.com','Y','N','2015-06-17 00:00:00','jose','M','0000-00-00','anu',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2388723',NULL,NULL,'',0,'Y',NULL,'N'),(35,'e10adc3949ba59abbe56e057f20f883e','aswathy@newagesmb.com','Y','N','2015-06-17 00:00:00','N','M','0000-00-00','aswathy',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2388733',NULL,NULL,'',0,'Y',NULL,'N'),(36,'e10adc3949ba59abbe56e057f20f883e','raju@mail.com','Y','N','2015-04-22 16:11:57','Tester','M','2000-01-01','Raju','Raju',NULL,3,2,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(37,'e10adc3949ba59abbe56e057f20f883e','aju@mail.com','Y','N','2015-04-22 04:28:19','Tester','M','2000-04-01','Aju','Aju',NULL,1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(38,'d41d8cd98f00b204e9800998ecf8427e','taj@mail.com','Y','N','2015-06-17 00:00:00','Hotels','M','0000-00-00','Taj',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2391003',NULL,NULL,'',0,'Y',NULL,'N'),(39,'e10adc3949ba59abbe56e057f20f883e','oberon@mail.com','Y','N','2015-06-17 00:00:00','Hotel','M','0000-00-00','oberon',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2391012',NULL,NULL,'',0,'Y',NULL,'N'),(40,'d41d8cd98f00b204e9800998ecf8427e','newage@mail.com','Y','N','2015-06-17 00:00:00','Test','M','0000-00-00','Newage',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,3,'Y','2391016',NULL,NULL,'',0,'Y',NULL,'N'),(41,'e10adc3949ba59abbe56e057f20f883e','raviz@mail.com','Y','N','2015-06-17 00:00:00','test','M','0000-00-00','Raviz',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,3,'Y','2391017',NULL,NULL,'',0,'Y',NULL,'N'),(42,'d41d8cd98f00b204e9800998ecf8427e','staff1@mail.com','Y','N','2015-04-23 13:00:19','Test','','2015-04-23','staff1','staff1',NULL,3,26,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(43,'e10adc3949ba59abbe56e057f20f883e','staff2@mail.com','Y','N','2015-04-23 13:03:38','test','','2015-04-23','staff','staff2',NULL,3,26,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(44,'e10adc3949ba59abbe56e057f20f883e','staff3@mail.com','Y','N','2015-04-23 13:58:59','test','M','2000-01-01','staff3','staff3',NULL,3,26,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(45,'e10adc3949ba59abbe56e057f20f883e','staff6@mail.com','Y','N','2015-04-23 02:32:58','test','M','2000-01-01','staff6','staff6',NULL,1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(46,'e10adc3949ba59abbe56e057f20f883e','nithins@newagesmb.com','Y','Y','2015-04-23 14:55:03','Test','M','2000-01-01','Nithin','Nithin',NULL,3,26,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(47,'e10adc3949ba59abbe56e057f20f883e','parkcentral@mail.com','Y','N','2015-06-17 00:00:00','Cole','M','0000-00-00','Sam',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2588693',NULL,NULL,'',0,'Y',NULL,'N'),(48,'e10adc3949ba59abbe56e057f20f883e','john@mail.com','Y','N','2015-04-23 15:11:54','test','M','2015-04-01','john','john',NULL,3,27,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'3480221',12,'Y',NULL,'N'),(49,'e10adc3949ba59abbe56e057f20f883e','livin@mail.com','Y','N','2015-04-23 16:26:59','Tester','M','2015-01-01','Livin','Livin',NULL,3,27,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(50,'e10adc3949ba59abbe56e057f20f883e','biju@mail.com','Y','N','2015-04-23 16:49:37','tester','M','2015-04-01','Biju','Biju',NULL,3,27,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(51,'e10adc3949ba59abbe56e057f20f883e','lucia@mail.com','Y','N','2015-06-17 00:00:00','Abraham','M','0000-00-00','Philip',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,3,'N',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(53,'e10adc3949ba59abbe56e057f20f883e','haripriya12@newagesmb.com','Y','N','2015-04-24 07:17:46','christy','F','2015-04-14','dfsdf','dfdsf',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(54,'e10adc3949ba59abbe56e057f20f883e','ajay1213@newagesmb.com','N','N','2015-04-24 07:21:01','christy','F','2015-05-24','geet','ajay',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(55,'e10adc3949ba59abbe56e057f20f883e','ajay@newagesmb.com','Y','N','2015-04-24 07:31:32','christy','M','2015-04-16','ajay','ajay',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(56,'e10adc3949ba59abbe56e057f20f883e','mark@mail.com','Y','N','2015-04-24 12:44:50','','M','0000-00-00','mark',NULL,'145562367896',1,0,'2015-04-28 08:45:44','','1430146122.jpg','Nice app for testing','Test testing testing testing testing testing testing testing testing testing testing new test test new test  testing testing testing testing testing testing testing testing testing testing testing testing testing','N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(57,'e10adc3949ba59abbe56e057f20f883e','dghhhj@mail.com','Y','N','2015-04-24 12:50:50','','M','0000-00-00','ccvb gg',NULL,'125666666',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(58,'bb1dfaf9772bc84c5c6a652e032a1bb8','anton@newagesmb.com','Y','Y','2015-06-17 00:00:00','test','M','0000-00-00','anton',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2393000',NULL,NULL,'',0,'Y',NULL,'N'),(59,'e10adc3949ba59abbe56e057f20f883e','alexjoseph5367@gmail.com','N','N','2015-04-24 14:52:32','Tester','M','2000-04-01','Alex','alex',NULL,3,29,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(60,'1bd7d6afc25f3b0fc038d017b224250e','johnjoseph536@gmail.com','Y','N','2015-04-24 14:55:47','Joseph','M','2015-04-03','John','john',NULL,3,29,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(61,'7ecde0d1765e26779f63df248ceba276','umesh@newagesmb.com','Y','Y','2015-06-17 00:00:00','test','M','0000-00-00','umesh',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2393017',NULL,NULL,'',0,'Y',NULL,'N'),(62,'e10adc3949ba59abbe56e057f20f883e','jibin@newagesmb.com','Y','N','2015-04-24 15:14:04','test','M','2015-04-02','jibin','Jibin',NULL,3,30,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(63,'bdaa54d412182a856dc50961a0b57396','galena70@gmail.com','Y','N','2015-04-25 21:27:54','','M','0000-00-00','galena',NULL,'00393387835094',1,0,'2015-05-31 11:43:58','','',NULL,NULL,'N',0,0,'Y',NULL,'2015-05-02 13:11:04',NULL,'',0,'Y',NULL,'N'),(64,'e10adc3949ba59abbe56e057f20f883e','haripriya122@newagesmb.com','Y','N','2015-06-17 00:00:00','M','M','0000-00-00','Reshma',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2394059',NULL,NULL,'',0,'Y',NULL,'N'),(65,'e10adc3949ba59abbe56e057f20f883e','new@mail.com','Y','N','2015-04-27 11:23:54','','M','0000-00-00','new',NULL,'14567894563',1,0,'2015-06-02 09:33:39',NULL,'1433252362.png','','','N',0,0,'Y',NULL,'2015-06-02 09:39:26',56,'',0,'Y',NULL,'N'),(66,'d41d8cd98f00b204e9800998ecf8427e','jibin@mail.com','N','N','2015-04-27 11:01:27','Jibin','M','2015-04-27','Jibin','Jibin',NULL,3,27,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(67,'d41d8cd98f00b204e9800998ecf8427e','mahesh@mail.com','N','N','2015-04-27 11:02:10','test','M','2015-04-27','Mahesh','Mahesh',NULL,3,27,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(68,'d41d8cd98f00b204e9800998ecf8427e','hotel123@inhotel.com','N','N','2015-04-27 11:08:35','test','M','2015-04-16','Jilu','arun',NULL,3,27,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(69,'e10adc3949ba59abbe56e057f20f883e','nila@mail.com','Y','Y','2015-06-17 00:00:00','tester','M','0000-00-00','Umesh@mail.com',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,3,'N',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(70,'d41d8cd98f00b204e9800998ecf8427e','hotel13455@inhotel.com','N','N','2015-04-27 11:14:07','R','M','2015-04-02','Jilu','arun',NULL,3,27,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(71,'e10adc3949ba59abbe56e057f20f883e','22mahesh55@gmail.com','Y','N','2015-06-17 00:00:00','tester','M','0000-00-00','mahesh',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2394354',NULL,NULL,'',0,'Y',NULL,'N'),(72,'e10adc3949ba59abbe56e057f20f883e','umesh@newaagesmb.com','Y','Y','2015-06-17 00:00:00','test','M','0000-00-00','Umesh',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(73,'e10adc3949ba59abbe56e057f20f883e','umesh@newagesmb.com','Y','Y','2015-06-17 00:00:00','test','M','0000-00-00','umesh',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,3,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(74,'e10adc3949ba59abbe56e057f20f883e','umesh@newaagesmb.com','Y','Y','2015-06-17 00:00:00','test','M','0000-00-00','Umesh',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(75,'e10adc3949ba59abbe56e057f20f883e','test1@mail.com','N','N','2015-04-27 11:35:38','test2','M','2015-04-07','test1','test1',NULL,3,35,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(76,'e10adc3949ba59abbe56e057f20f883e','josephantonnewage@gmail.com','Y','N','2015-04-27 12:29:44','anton','M','2000-04-01','Joseph','joseph',NULL,3,27,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(77,'e10adc3949ba59abbe56e057f20f883e','umesh@newagesmb.com','Y','Y','2015-06-17 00:00:00','test','M','0000-00-00','Umesh',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(78,'e10adc3949ba59abbe56e057f20f883e','shijil@newagesmb.com','Y','N','2015-04-27 12:53:48','','M','0000-00-00','shijil',NULL,'14567894563',1,0,'2015-04-28 07:18:12',NULL,'1430154943.jpg','Testing for quality and efficiency','Testing in hotel for quality and efficient performance\nTesting for quality','N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(79,'e10adc3949ba59abbe56e057f20f883e','jim@mail.com','Y','N','2015-04-27 13:31:40','','M','0000-00-00','jim',NULL,'14562367896',1,0,'2015-04-27 16:30:43',NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(80,'e10adc3949ba59abbe56e057f20f883e','hotelnew@inhotel.com','Y','N','2015-06-17 00:00:00','john','M','0000-00-00','johny',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2395314',NULL,NULL,'',0,'Y',NULL,'N'),(83,'e10adc3949ba59abbe56e057f20f883e','jim@mailme.com','Y','N','2015-04-29 10:08:44','','M','0000-00-00','jim',NULL,'12233333',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(84,'e10adc3949ba59abbe56e057f20f883e','dfghjhj@mail.com','Y','N','2015-04-29 10:09:13','','M','0000-00-00','jim',NULL,'12233333',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(85,'e10adc3949ba59abbe56e057f20f883e','fgjjjjj@mail.com','Y','N','2015-04-29 10:11:00','','M','0000-00-00','jim',NULL,'12233333',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(86,'e10adc3949ba59abbe56e057f20f883e','potter@mail.com','Y','N','2015-04-29 10:14:42','','M','0000-00-00','potter',NULL,'14567894563',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(87,'e10adc3949ba59abbe56e057f20f883e','test@gm.com','Y','N','2015-04-29 10:15:09','','M','0000-00-00','test',NULL,'12323345',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(88,'e10adc3949ba59abbe56e057f20f883e','potter1@mail.com','Y','N','2015-04-29 10:17:07','','M','0000-00-00','potter',NULL,'14567894563',1,0,'2015-04-29 10:22:00',NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(89,'e10adc3949ba59abbe56e057f20f883e','tes@gm.com','Y','N','2015-04-29 10:17:10','','M','0000-00-00','trete',NULL,'1232143',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(90,'e10adc3949ba59abbe56e057f20f883e','inhotel@mail.com','Y','N','2015-04-29 10:23:33','','M','0000-00-00','inhotel',NULL,'14567894563',1,0,'2015-06-12 16:28:04','','1433090142.jpg','Nice app to use','golf player\n\n','Y',1,0,'Y',NULL,'2015-05-31 11:01:46',1,'3484158',0,'Y',NULL,'N'),(91,'e10adc3949ba59abbe56e057f20f883e','yr.bogdan@gmail.com','Y','Y','2015-04-30 16:18:39','','M','0000-00-00','Yurii',NULL,'123456789',1,0,'2015-04-30 19:47:22',NULL,'',NULL,NULL,'N',1,0,'Y',NULL,'2015-04-30 19:53:57',NULL,'',0,'Y',NULL,'N'),(92,'e10adc3949ba59abbe56e057f20f883e','yr.bogdan@gmail.com','Y','N','2015-04-30 20:00:45','','M','0000-00-00','Yurii',NULL,'359877666272',1,0,'2015-05-02 11:19:47','','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(93,'a0a2fdc3cd6edd833503699cf22a7be7','joyal@newagesmb.com','Y','N','2015-04-30 23:47:40','','M','0000-00-00','joyal',NULL,'24334224',1,0,'2015-05-21 07:41:37',NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(94,'e10adc3949ba59abbe56e057f20f883e','das@mail.com','Y','N','2015-05-04 07:06:05','tester','M','2014-10-04','das','das',NULL,1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(95,'e10adc3949ba59abbe56e057f20f883e','geo@mail.com','Y','N','2015-05-04 07:10:01','tester','M','2015-01-01','geo','geo',NULL,1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(96,'e10adc3949ba59abbe56e057f20f883e','sthjkkf@mail.com','Y','N','2015-05-04 07:24:32','','M','0000-00-00','sghjhh',NULL,'14567894563',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(97,'e10adc3949ba59abbe56e057f20f883e','jim@mail.com','Y','N','2015-06-17 00:00:00','tester','M','0000-00-00','Jim',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2398895',NULL,NULL,'',0,'Y',NULL,'N'),(98,'e10adc3949ba59abbe56e057f20f883e','crux@mail.com','Y','N','2015-05-04 07:35:10','','M','0000-00-00','crux',NULL,'14567894563',1,0,'2015-06-17 09:53:19','','1433417604.png','','\n','Y',1,0,'Y',NULL,'2015-06-10 05:53:55',29,'3464168',1,'Y','APA91bE98nxCs1q0cJ9oMQ2Fjeqf-H0J4cmTNcYkKpC5W2Opd-vgQ3X78BdLAjpjUtjzhQOW9cr7qFfQupkyXZmSQOw8NavvCAV_AmefO2H5msTzBfSkw4hzVIcS7ZW0aGYs3NJ3sizybhYVPzcoqlPST-vM0wqueQ','N'),(99,'e10adc3949ba59abbe56e057f20f883e','drux@mail.com','Y','N','2015-05-04 08:43:09','','M','0000-00-00','drux',NULL,'12457894563',1,0,'2015-06-03 06:40:25','','1433254228.png','nice hotel to stay cool and calm','Description','N',0,0,'Y',NULL,'2015-06-02 10:02:55',30,'',0,'N',NULL,'N'),(100,'e10adc3949ba59abbe56e057f20f883e','clark@mail.com','Y','N','2015-05-04 10:30:47','','M','0000-00-00','clark',NULL,'14567894563',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(101,'e10adc3949ba59abbe56e057f20f883e','hh@hj.n','Y','N','2015-05-04 10:33:27','','M','0000-00-00','jou',NULL,'22646',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(102,'e10adc3949ba59abbe56e057f20f883e','ysg@uu.bb','Y','N','2015-05-04 10:36:20','','M','0000-00-00','ggz',NULL,'1224558',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(103,'e10adc3949ba59abbe56e057f20f883e','ham@mail.com','Y','N','2015-05-04 10:41:10','','M','0000-00-00','ham',NULL,'14567894563',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(104,'e10adc3949ba59abbe56e057f20f883e','gregg@mail.com','Y','N','2015-05-05 07:35:02','','M','0000-00-00','gregg',NULL,'14567892665',1,0,'2015-05-05 07:39:45',NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(105,'e10adc3949ba59abbe56e057f20f883e','matt@mail.com','Y','N','2015-05-05 07:43:17','','M','0000-00-00','matt',NULL,'14567894563',1,0,'2015-05-18 08:21:20',NULL,'1430851936.jpg','ggghg','Testing \n\nTest\nTesting\n','N',0,0,'Y',NULL,NULL,8,'',0,'Y',NULL,'N'),(106,'e10adc3949ba59abbe56e057f20f883e','miller@mail.com','Y','N','2015-05-06 06:55:25','','M','0000-00-00','miller',NULL,'14567894563',1,0,'2015-05-25 12:45:23',NULL,'1430914109.jpg','Eating  cvjfg dgvgdvdv xhgcbjkjg bfbjfnudh fhj ghh hhh bj gggg ghh hhh bhj test','Testing in hotel app.\nTesting results in quality\ndfg hhjjjj jhggjjfg jfghjfg GGG\nfvhjsgh yyuuvgujj fggg vjgggh\nfhhj hgjjhjgggvhfh hhjjjcffhk\nghhhhjcsgk ghkjhh bjjjnjdghk\nghhjjsg iugggh ghjkkg jghkkk\nghhjj hjj bjkjvhjjj ggjkjfkoufhiihijhjggkkkffgjjvghh gjjk vjkkjc vvbhjj hjjj vjkj njfj hfhkl jjk mgfj jhdg hrgi bkchj hjjjj hgjkgvjjg jjjfvhfgbithvjhghvhgg jgggb bhghjvhjjkvbbj bjjjh test','N',0,0,'Y',NULL,'2015-05-06 08:12:08',9,'',0,'Y',NULL,'N'),(107,'e10adc3949ba59abbe56e057f20f883e','jeremy@mail.com','Y','N','2015-05-06 15:52:25','','M','0000-00-00','jeremy',NULL,'1456789563',1,0,'2015-05-18 08:48:33',NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(108,'e10adc3949ba59abbe56e057f20f883e','jjj@mail.com','Y','N','2015-05-07 08:43:38','','M','0000-00-00','jjj',NULL,'14567894563  ',1,0,'2015-05-16 01:52:48',NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(109,'e10adc3949ba59abbe56e057f20f883e','pete@mail.com','Y','N','2015-05-11 08:59:48','','M','0000-00-00','pete',NULL,'14567894563',1,0,'2015-06-11 13:52:15',NULL,'1434037754.png','','','Y',0,0,'Y',NULL,'2015-06-01 15:17:38',13,'3464115',8,'Y','APA91bEMoH1EV2wF2u05kCEGSC-6EMRSH5fb2R3nIPL07yD15Yi7fK5BjdjWX65_ffyW8Sn_4HTZkuyfnD97itaw1HVFIYDBE6TpujOOuCPwjAWooR2pENA8etqdpW3AdkmsYKkCmGqtRD54ZRIVmrs4UUZ1ngLbZA','N'),(110,'e10adc3949ba59abbe56e057f20f883e','san@mail.com','Y','N','2015-05-11 09:30:04','','M','0000-00-00','san',NULL,'14567894563',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(111,'ed2b1f468c5f915f3f1cf75d7068baae','gg@g.com','Y','N','2015-05-11 09:50:00','','M','0000-00-00','gg',NULL,'123',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(112,'ed2b1f468c5f915f3f1cf75d7068baae','ken@mail.com','Y','N','2015-05-11 10:14:25','','M','0000-00-00','ken',NULL,'123456',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(113,'e10adc3949ba59abbe56e057f20f883e','ben@mail.com','Y','N','2015-05-11 12:42:48','','M','0000-00-00',' Been',NULL,'14567894563',1,0,'2015-06-10 12:46:40',NULL,'1432658857.jpg','drftdhhggbhjjbhvhhhjjjmmnljjbnhbbk9bbubbubihkufupgupiphibibbibkbinibbhihoj8 jojojhininknojihiduffuuhb joyal','bbzbx hhx bhx. bxjxjz hhbxxd bhhdbhhhhdbbhhhdbbnkxbvhhdbbc. hdhhjhvs bnnj bhhhjd hjkjjxjdhdbbdd bbdbd s no fg dhjj dhj dhjhvfgkk dhjggh dhhdtdvvfhbcfjhz gjjx fh cgkmb hyg kog dhgfcffv cvjv cjff ccbxhk vnvcv ujdvvfjk djkd h SG h HD sf bbhffjhcg SG h Hi h sf j UV CNN DJ h in SD h I CV j TTF HB gkhd FCK d UK TTC I sf kjhfkyv v.  Testing','Y',1,0,'Y',NULL,'2015-06-02 10:02:09',15,'3464141',0,'Y','APA91bGI2DWDRmDC4h_vbmi6cJO5t9xX7SDhl8XdpQRf8-fAEAxaGD-KQgTMXKCgozFREv53NaEbqeDFJqkvwT8RdAPY8t18Xra2XX8Q7tQQiXatMTz0cDJg7r5N3ufRZAhlSUN4Dv5ibb5GQyt5rn9y8uGDXA28jw','N'),(114,'e10adc3949ba59abbe56e057f20f883e','biju@newagesmb.com','Y','N','2015-06-17 00:00:00','dev','M','0000-00-00','biju',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,3,'Y','2483231',NULL,NULL,'',0,'Y',NULL,'N'),(115,'fcea920f7412b5da7be0cf42b8c93759','golwin@newagesmb.com','Y','N','2015-05-12 07:09:43','dev','M','1985-05-01','golwin','golwin',NULL,3,40,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(116,'e10adc3949ba59abbe56e057f20f883e','lyon@mail.com','Y','N','2015-05-12 10:16:07','','M','0000-00-00','Lyon',NULL,'14567894563',1,0,'2015-05-12 15:12:55','','',NULL,NULL,'N',0,0,'Y',NULL,NULL,16,'',0,'Y',NULL,'N'),(117,'e10adc3949ba59abbe56e057f20f883e','jyon@mail.com','Y','N','2015-05-12 10:18:27','','M','0000-00-00','Jyon',NULL,'12347894563',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,17,'',0,'Y',NULL,'N'),(118,'e10adc3949ba59abbe56e057f20f883e','demo@mail.con','Y','N','2015-05-14 14:31:46','','M','0000-00-00','demo',NULL,'1234567896',1,0,NULL,NULL,'1431628742.jpg','gg xhjj dgjk dhkk dhjkk fjkk xhkkl dhjkk dgjkkk fjkkk fhkjvdhjjbfhkk fjkjjchjkbfbmkbfvjk gji9 hjkkvjkk vihvvhjkjvgjkihvbhkl bhgh gfjhcbyufvk cnggh bx FM kg do jcnkfjihvgfjkfg ggkcnhfjkcnfm vhgxgfhjhgggjkfhjkdjk vhjkghl jlkkkchkk','','N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(119,'e10adc3949ba59abbe56e057f20f883e','andre@mail.com','Y','N','2015-05-15 12:14:14','','M','0000-00-00','andre',NULL,'1234567894',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(120,'e10adc3949ba59abbe56e057f20f883e','jacob@mail.com','Y','N','2015-05-15 13:24:44','','M','0000-00-00','jacob',NULL,'1234567896',1,0,NULL,'','','nice place to dream','test\ntesting\ntet\nghk\nvbjmk\nghkk\ngjjk\nresults','N',0,0,'Y',NULL,NULL,23,'',0,'Y',NULL,'N'),(121,'e10adc3949ba59abbe56e057f20f883e','haripriy1a@newagesmb.com','Y','N','2015-05-20 03:11:16','hari','F','2015-05-07','hari','hari',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'3484649',0,'Y',NULL,'N'),(122,'e10adc3949ba59abbe56e057f20f883e','dghj@mail.com','Y','N','2015-05-20 16:52:47','','M','0000-00-00','xghj',NULL,'445566666',1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(123,'e10adc3949ba59abbe56e057f20f883e','aj213@newagesmb.com','Y','N','2015-05-22 03:58:23','santhosh','F','2015-08-12','anitha','christy',NULL,1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(125,'fcea920f7412b5da7be0cf42b8c93759','inhotel@email.com','Y','N','2015-05-22 07:10:48','','M','0000-00-00','inhotel',NULL,'123456',1,0,NULL,'','1432293068.jpg','','','N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(126,'fcea920f7412b5da7be0cf42b8c93759','jj@c.com','Y','N','2015-05-22 08:41:17','','M','0000-00-00','jj',NULL,'22365',1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(127,'e10adc3949ba59abbe56e057f20f883e','cc@c.com','Y','N','2015-05-22 08:52:53','','M','0000-00-00','vv',NULL,'123589',1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(128,'e10adc3949ba59abbe56e057f20f883e','demo1@mail.com','Y','N','2015-05-22 10:14:02','','M','0000-00-00','demo1',NULL,'14567894563',1,0,'2015-05-25 07:03:36',NULL,'','','','N',0,0,'Y',NULL,NULL,34,'',0,'Y',NULL,'N'),(129,'e10adc3949ba59abbe56e057f20f883e','demo2@mail.com','Y','N','2015-05-22 10:15:26','','M','0000-00-00','demo2',NULL,'1234567896',1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,35,'',0,'Y',NULL,'N'),(130,'e10adc3949ba59abbe56e057f20f883e','demo3@mail.com','Y','N','2015-05-22 10:32:34','','M','0000-00-00','demo3',NULL,'14567894563',1,0,'2015-05-22 12:29:26','','',NULL,NULL,'N',0,0,'Y',NULL,'2015-05-22 10:41:01',36,'',0,'Y',NULL,'N'),(131,'e10adc3949ba59abbe56e057f20f883e','demo4@mail.com','Y','N','2015-05-22 10:36:09','','M','0000-00-00','demo4',NULL,'14567894563',1,0,'2015-05-22 11:25:45',NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,37,'',0,'Y',NULL,'N'),(132,'e10adc3949ba59abbe56e057f20f883e','demo5@mail.com','Y','N','2015-05-22 12:18:36','','M','0000-00-00','demo5',NULL,'456231',1,0,'2015-05-25 12:48:53',NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,38,'',0,'Y',NULL,'N'),(133,'e10adc3949ba59abbe56e057f20f883e','demo6@mail.com','Y','N','2015-05-22 13:00:51','','M','0000-00-00','demo6',NULL,'23432452345',1,0,'2015-05-22 13:39:17','','',NULL,NULL,'N',0,0,'Y',NULL,NULL,40,'',0,'Y',NULL,'N'),(134,'e10adc3949ba59abbe56e057f20f883e','demo7@mail.com','Y','N','2015-05-22 13:08:17','','M','0000-00-00','demo7',NULL,'23432',1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(135,'e10adc3949ba59abbe56e057f20f883e','hh@hh.com','Y','N','2015-05-22 13:10:32','','M','0000-00-00','test',NULL,'3423',1,0,'2015-05-22 13:16:17',NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(136,'e10adc3949ba59abbe56e057f20f883e','ranjith@mail.com','Y','N','2015-05-22 13:18:08','','M','0000-00-00','ranjith',NULL,'32432423',1,0,'2015-05-22 13:33:28',NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,41,'',0,'Y',NULL,'N'),(137,'e10adc3949ba59abbe56e057f20f883e','test111@mail.com','Y','N','2015-05-22 13:51:32','','M','0000-00-00','test111',NULL,'14567894563',1,0,'2015-05-25 06:39:11',NULL,'1432318725.jpg','welcome','Description','N',0,0,'Y',NULL,NULL,42,'',0,'Y',NULL,'N'),(138,'e10adc3949ba59abbe56e057f20f883e','test222@mail.com','Y','N','2015-05-22 13:56:58','','M','0000-00-00','test222',NULL,'14567894563',1,0,'2015-05-22 15:51:42',NULL,'1432318772.jpg','Nice and beautiful app','Description','N',0,0,'Y',NULL,NULL,43,'',0,'Y',NULL,'N'),(139,'e10adc3949ba59abbe56e057f20f883e','test333@mail.com','Y','N','2015-05-22 14:49:45','','M','0000-00-00','test333',NULL,'14567894563',1,0,'2015-05-22 14:57:47','','',NULL,NULL,'N',0,0,'Y',NULL,NULL,44,'',0,'Y',NULL,'N'),(140,'e10adc3949ba59abbe56e057f20f883e','umesh@mailme.com','N','Y','2015-05-22 15:40:49','tester','M','2008-11-01','umesh','umesh',NULL,3,27,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(141,'e10adc3949ba59abbe56e057f20f883e','test555@mail.com','Y','N','2015-05-22 15:44:44','','M','0000-00-00','test555',NULL,'1234567896',1,0,'2015-05-22 16:36:31','','','','','N',0,0,'Y',NULL,NULL,45,'',0,'Y',NULL,'N'),(142,'e10adc3949ba59abbe56e057f20f883e','test666@mail.com','Y','N','2015-05-22 15:45:47','','M','0000-00-00','test666',NULL,'1234567896',1,0,'2015-05-22 16:35:21','','',NULL,NULL,'N',0,0,'Y',NULL,NULL,46,'',0,'Y',NULL,'N'),(143,'e10adc3949ba59abbe56e057f20f883e','hh@h.com','Y','N','2015-05-22 15:46:50','','M','0000-00-00','jj',NULL,'255665',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(144,'e10adc3949ba59abbe56e057f20f883e','gg@gg.cm','Y','N','2015-05-22 15:55:54','','M','0000-00-00','lgg',NULL,'664664646',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(145,'e10adc3949ba59abbe56e057f20f883e','asdas@mail.com','N','N','2015-05-22 16:17:57','asdasd','M','2015-03-12','asdasd','asdasd',NULL,3,27,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(146,'e10adc3949ba59abbe56e057f20f883e','new111@mail.com','Y','N','2015-05-25 06:51:27','','M','0000-00-00','new111',NULL,'14567894563',1,0,'2015-05-25 07:05:40','','',NULL,NULL,'N',0,0,'Y',NULL,NULL,47,'',0,'Y',NULL,'N'),(147,'fcea920f7412b5da7be0cf42b8c93759','joj@mIl.in','Y','N','2015-05-25 07:05:27','','M','0000-00-00','joj',NULL,'1223355',1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(148,'ed2b1f468c5f915f3f1cf75d7068baae','vv@c.n','Y','N','2015-05-25 07:25:00','','M','0000-00-00','bb',NULL,'122355',1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(149,'e10adc3949ba59abbe56e057f20f883e','ggc@gg.b','Y','N','2015-05-25 07:31:57','','M','0000-00-00','vv',NULL,'25464664',1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(150,'e10adc3949ba59abbe56e057f20f883e','bb@d.nn','Y','N','2015-05-25 08:18:22','','M','0000-00-00','bb@d.nn',NULL,'123554786',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(151,'e10adc3949ba59abbe56e057f20f883e','hh@ff.cm','Y','N','2015-05-25 08:32:51','','M','0000-00-00','hh',NULL,'2575646',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(152,'e10adc3949ba59abbe56e057f20f883e','bbb@b.n','Y','N','2015-05-25 08:38:14','','M','0000-00-00','bbb',NULL,'12354786',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(153,'e10adc3949ba59abbe56e057f20f883e','bb@vc.n','Y','N','2015-05-25 08:52:51','','M','0000-00-00','bb@vc.n',NULL,'123545',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(154,'fcea920f7412b5da7be0cf42b8c93759','joyal@mail.in','Y','N','2015-05-25 08:58:03','','M','0000-00-00','testjoyal',NULL,'1235647',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(155,'fcea920f7412b5da7be0cf42b8c93759','xx@c.n','Y','N','2015-05-25 09:04:37','','M','0000-00-00','xx',NULL,'256584433',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(156,'e10adc3949ba59abbe56e057f20f883e','inhotel1@mail.com','Y','N','2015-05-25 10:24:08','','M','0000-00-00','inhotel1',NULL,'14567894563',1,0,'2015-05-25 15:33:56',NULL,'1432565056.jpg','','Description','N',1,0,'Y',NULL,'2015-05-25 12:13:01',48,'',0,'Y',NULL,'N'),(157,'e10adc3949ba59abbe56e057f20f883e','inhotel2@mail.com','Y','N','2015-05-25 10:49:10','','M','0000-00-00','inhotel2',NULL,'123456789',1,0,'2015-05-25 15:23:06',NULL,'1432569024.jpg','','Description','N',0,0,'Y',NULL,NULL,49,'',0,'Y',NULL,'N'),(158,'e10adc3949ba59abbe56e057f20f883e','cxz@n.n','Y','N','2015-05-25 12:24:31','','M','0000-00-00','jj',NULL,'222232',1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(159,'e10adc3949ba59abbe56e057f20f883e','gg@bbg.n','Y','N','2015-05-25 12:26:23','','M','0000-00-00','gg',NULL,'12255',1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(160,'e10adc3949ba59abbe56e057f20f883e','vv@vv.n','Y','N','2015-05-25 12:31:36','','M','0000-00-00','xsss',NULL,'15553680',1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(162,'e10adc3949ba59abbe56e057f20f883e','guest1@inhotel.com','Y','N','2015-05-25 15:36:35','','M','0000-00-00','guest1',NULL,'14567894563',1,0,'2015-06-01 10:42:18',NULL,'',NULL,NULL,'N',0,0,'Y',NULL,'2015-06-01 10:42:50',50,'',0,'Y',NULL,'N'),(163,'e10adc3949ba59abbe56e057f20f883e','guest2@inhotel.com','Y','N','2015-05-25 15:38:37','','M','0000-00-00','guest2',NULL,'14567894563',1,0,'2015-06-01 06:41:48',NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,51,'',0,'Y',NULL,'N'),(164,'e10adc3949ba59abbe56e057f20f883e','guest3@inhotel.com','Y','N','2015-05-26 07:12:28','','M','0000-00-00','guest3',NULL,'14567897896',1,0,'2015-06-02 09:31:13',NULL,'1432730543.png','','','N',0,0,'Y',NULL,'2015-05-26 15:02:03',52,'',0,'Y',NULL,'N'),(165,'e10adc3949ba59abbe56e057f20f883e','guest4@inhotel.com','Y','N','2015-05-26 07:14:26','','M','0000-00-00','guest4',NULL,'1234567896',1,0,'2015-05-27 08:51:10','','1432664389.jpg','','','N',1,0,'Y',NULL,'2015-05-26 13:08:44',53,'',0,'Y',NULL,'N'),(166,'e10adc3949ba59abbe56e057f20f883e','haripriya@newagesmb.com','Y','N','2015-05-26 11:14:03','P K','F','2015-05-14','haripriya','hari',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'3484578',0,'Y',NULL,'N'),(167,'e10adc3949ba59abbe56e057f20f883e','bibinv@newagesmb.com','Y','N','2015-05-26 11:21:46','Test','M','2015-09-26','Bibin','Bibin',NULL,3,27,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(168,'e10adc3949ba59abbe56e057f20f883e','guest5@mail.com','Y','N','2015-05-26 15:04:24','','M','0000-00-00','guest5',NULL,'14567894563',1,0,'2015-05-26 15:25:41',NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,54,'',0,'Y',NULL,'N'),(169,'e10adc3949ba59abbe56e057f20f883e','guest6@mail.com','Y','N','2015-05-26 15:11:24','','M','0000-00-00','guest',NULL,'14567894563',1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(170,'e10adc3949ba59abbe56e057f20f883e','testernewagesmb@gmail.com','Y','N','2015-05-27 09:31:11','test','M','1985-12-01','tester','tester',NULL,3,27,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'3484543',0,'Y',NULL,'N'),(171,'e10adc3949ba59abbe56e057f20f883e','new@inhotel.com','Y','N','2015-05-27 12:23:58','','M','0000-00-00','new',NULL,'1234567896',1,0,'2015-05-27 12:31:40',NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,57,'',0,'Y',NULL,'N'),(172,'e10adc3949ba59abbe56e057f20f883e','new1@inhotel.com','Y','Y','2015-05-27 12:36:49','','M','0000-00-00','new1',NULL,'14567894563',1,0,NULL,NULL,'',NULL,NULL,'N',1,0,'Y',NULL,'2015-05-27 13:13:03',58,'',0,'Y',NULL,'N'),(173,'e10adc3949ba59abbe56e057f20f883e','jack@mail.com','Y','N','2015-05-27 13:27:00','','M','0000-00-00','jack',NULL,'14567894563',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,60,'',0,'Y',NULL,'N'),(175,'8d9b2d4e61a903b1b6216bd3d0df6fc2','derek@mail.com','Y','N','2015-05-28 10:57:42','','M','0000-00-00','derek',NULL,'14567894563',1,0,'2015-05-29 13:45:07','','1432921677.png','','','Y',0,0,'Y',NULL,'2015-05-29 14:28:19',61,'',1,'Y',NULL,'N'),(176,'e10adc3949ba59abbe56e057f20f883e','dave@mail.com','Y','N','2015-05-29 09:53:46','','M','0000-00-00','dave',NULL,'14567894563',1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,62,'',0,'Y',NULL,'N'),(177,'e10adc3949ba59abbe56e057f20f883e','abhijith@newagesmb.com','Y','N','2015-06-01 14:36:31','','M','0000-00-00','Abhi',NULL,'',1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,'Y',NULL,'N'),(178,'e10adc3949ba59abbe56e057f20f883e','eric@mail.com','Y','N','2015-06-02 13:57:09','','M','0000-00-00','eric',NULL,'',1,0,'2015-06-02 14:35:12','','',NULL,NULL,'N',0,0,'Y',NULL,NULL,63,'',0,NULL,NULL,'N'),(179,'01da401da739f6c8aa29104ec2b73340','umesh@newagesmb.com','Y','N','2015-06-03 09:46:15','','M','0000-00-00','umesh',NULL,'',1,0,'2015-06-03 10:05:16','','','','Description','N',0,0,'Y',NULL,NULL,64,'',0,NULL,NULL,'N'),(180,'ba40760f3cbd50c449207be8a85c6422','asker@newagesmb.com','Y','N','2015-06-03 10:07:00','','M','0000-00-00','asker',NULL,'',1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,65,'',0,NULL,NULL,'N'),(181,'e10adc3949ba59abbe56e057f20f883e','rich@mail.com','Y','N','2015-06-03 10:53:36','','M','0000-00-00','richard',NULL,'',1,0,'2015-06-03 10:57:37','','',NULL,NULL,'N',0,0,'Y',NULL,NULL,66,'',0,NULL,NULL,'N'),(182,'e10adc3949ba59abbe56e057f20f883e','testing1@mail.com','Y','Y','2015-06-03 12:29:21','','M','0000-00-00','testing1',NULL,'',1,0,NULL,NULL,'1433351333.png','','','N',0,0,'Y',NULL,'2015-06-03 13:10:20',67,'',0,'N',NULL,'N'),(183,'e10adc3949ba59abbe56e057f20f883e','testing2@mail.com','Y','Y','2015-06-03 12:31:28','','M','0000-00-00','testing2',NULL,'',1,0,'2015-06-03 12:41:34','','1433350215.png','','','N',0,0,'Y',NULL,NULL,68,'',0,NULL,NULL,'N'),(184,'e10adc3949ba59abbe56e057f20f883e','kevin@mail.com','Y','N','2015-06-03 12:37:23','','M','0000-00-00','kevin',NULL,'',1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,NULL,NULL,'N'),(185,'e10adc3949ba59abbe56e057f20f883e','testing3@mail.com','Y','N','2015-06-03 13:11:36','','M','0000-00-00','testing3',NULL,'',1,0,'2015-06-08 12:28:36',NULL,'1433359702.png','','','N',0,0,'Y',NULL,'2015-06-03 15:47:43',69,'',0,'N',NULL,'N'),(186,'e10adc3949ba59abbe56e057f20f883e','nithins@newagesmb.com','Y','N','2015-06-03 15:08:55','','M','0000-00-00','nithin',NULL,'',1,0,'2015-06-03 15:32:50','','',NULL,NULL,'N',0,0,'Y',NULL,NULL,70,'',0,NULL,NULL,'N'),(187,'e10adc3949ba59abbe56e057f20f883e','ddd@mail.com','Y','N','2015-06-03 15:33:32','','M','0000-00-00','did',NULL,'',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,NULL,NULL,'N'),(188,'e10adc3949ba59abbe56e057f20f883e','testing4@mail.com','Y','N','2015-06-04 07:32:36','','M','0000-00-00','testing4',NULL,'',1,0,'2015-06-11 12:48:14','','',NULL,NULL,'Y',0,0,'Y',NULL,'2015-06-04 08:21:14',71,'3487985',0,'Y','','N'),(189,'e10adc3949ba59abbe56e057f20f883e','testing5@mail.com','Y','N','2015-06-04 09:19:50','','M','0000-00-00','testing5',NULL,'',1,0,'2015-06-16 15:27:07','814b405451cf81232348c552ec459eb6e6ecdbc8bea70a1941f61fbd6ade3468','1433435124.jpg','','Description','Y',0,0,'Y',NULL,'2015-06-09 11:03:36',72,'3464126',0,'Y',NULL,'N'),(190,'e10adc3949ba59abbe56e057f20f883e','testing6@mail.com','Y','N','2015-06-04 09:30:42','','M','0000-00-00','testing6',NULL,'',1,0,'2015-06-04 10:53:05',NULL,'1433425518.png','','','N',0,0,'Y',NULL,NULL,73,'',1,NULL,NULL,'N'),(191,'e10adc3949ba59abbe56e057f20f883e','testing1@mail.com','Y','N','2015-06-04 13:44:20','','M','0000-00-00','testing1',NULL,'',1,0,'2015-06-09 10:55:14',NULL,'1433440019.jpg','','Description','N',0,0,'Y',NULL,'2015-06-09 10:55:53',67,'',0,'Y',NULL,'N'),(192,'e10adc3949ba59abbe56e057f20f883e','tim@mail.com','Y','N','2015-06-05 13:58:23','','M','0000-00-00','Tim',NULL,'',1,0,'2015-06-08 15:49:33',NULL,'1433793049.jpg','','Description','N',0,0,'Y',NULL,NULL,74,'',0,NULL,NULL,'N'),(193,'e10adc3949ba59abbe56e057f20f883e','testing11@mail.com','Y','N','2015-06-08 15:32:13','','M','0000-00-00','testing11',NULL,'',1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'',0,NULL,NULL,'N'),(194,'e10adc3949ba59abbe56e057f20f883e','metcy@newagesmb.com','Y','N','2015-06-10 09:48:12','','M','0000-00-00','metcy',NULL,'',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,NULL,0,NULL,NULL,'N'),(195,'e10adc3949ba59abbe56e057f20f883e','james@mail.com','Y','N','2015-06-11 09:11:23','','M','0000-00-00','James',NULL,'',1,0,'2015-06-17 07:09:39','','1434028730.jpg','','Description','Y',0,0,'Y',NULL,'2015-06-15 11:08:18',77,'3487420',1,'N','','N'),(196,'e10adc3949ba59abbe56e057f20f883e','devin@mail.com','Y','N','2015-06-11 09:15:59','','M','0000-00-00','devin',NULL,'',1,0,'2015-06-15 11:37:53','','1434038817.png','','Nice hotel to stay good','Y',0,0,'Y',NULL,'2015-06-11 12:16:39',78,'3484331',12,'N','','N'),(197,'e10adc3949ba59abbe56e057f20f883e','test1@hoyel1.com','Y','N','2015-06-11 09:21:46','christy','M','2015-06-11','hari','test',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'3484437',0,NULL,NULL,'N'),(198,'e10adc3949ba59abbe56e057f20f883e','uuu@mail.com','Y','N','2015-06-11 09:30:51','','M','0000-00-00','uuu ',NULL,'',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,'2015-06-11 09:33:19',79,'3484636',0,'N','','N'),(199,'e10adc3949ba59abbe56e057f20f883e','rrr@mail.com','Y','N','2015-06-11 09:35:36','','M','0000-00-00','rrr',NULL,'',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,80,'3484707',0,NULL,'','N'),(200,'e10adc3949ba59abbe56e057f20f883e','sachin@newagesmb.com','Y','N','2015-06-11 09:48:31','','M','0000-00-00','sachin',NULL,'',1,0,'2015-06-11 09:59:29','','',NULL,NULL,'N',0,0,'Y',NULL,NULL,81,'3484925',0,'N','','N'),(201,'e10adc3949ba59abbe56e057f20f883e','nithin@gm.com','Y','N','2015-06-11 10:03:08','','M','0000-00-00','nithin',NULL,'',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'3485152',0,'N','','N'),(202,'e10adc3949ba59abbe56e057f20f883e','soumya@neagesmb.com','Y','N','2015-06-17 00:00:00','soumya','M','0000-00-00','soumya',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'N',NULL,NULL,NULL,NULL,0,'N',NULL,'N'),(209,'e10adc3949ba59abbe56e057f20f883e','soumya@newagesmb.com','Y','N','2015-06-17 06:47:37','soumya','M','0000-00-00','soumya',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2588760',NULL,NULL,NULL,0,'N',NULL,'Y'),(210,'e10adc3949ba59abbe56e057f20f883e','anton@newagesmb.com','Y','N','2015-06-17 07:32:01','Joseph','M','0000-00-00','anton',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2588756',NULL,NULL,NULL,0,'N',NULL,'N'),(212,'e10adc3949ba59abbe56e057f20f883e','anton1@newagesmb.com','Y','N','2015-06-17 08:34:08','rte','M','0000-00-00','re',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,NULL,0,'N',NULL,'N'),(213,'e10adc3949ba59abbe56e057f20f883e','adharsh@newagesmb.com','N','N','2015-06-17 08:34:25','test','M','1985-12-01','Adharsh','adarsh',NULL,3,49,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'3619561',0,'N',NULL,'N'),(214,'e10adc3949ba59abbe56e057f20f883e','fred@mail.com','Y','N','2015-06-17 08:35:44','test','M','1992-03-26','Fred','fred',NULL,3,49,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'3619588',0,'N',NULL,'N'),(215,'e10adc3949ba59abbe56e057f20f883e','sdfsdf@mail.com','N','N','2015-06-17 08:36:21','asdsa','M','2015-06-01','asdas','asd',NULL,3,49,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL,NULL,NULL,'3619615',0,'N',NULL,'N'),(216,'e10adc3949ba59abbe56e057f20f883e','tony@mail.com','Y','N','2015-06-17 08:45:31','','M','0000-00-00','tony',NULL,'',1,0,'2015-06-17 10:06:42','982b65a0e6a9d6effbcf20892b0e34819477e42d5a4624a3b0ba0b90166bd132','',NULL,NULL,'N',0,0,'Y',NULL,NULL,82,'3619822',0,'N',NULL,'N'),(217,'e10adc3949ba59abbe56e057f20f883e','gio@mail.com','Y','N','2015-06-17 09:27:55','','M','0000-00-00','gio',NULL,'',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL,NULL,83,'3620713',0,'N','','N');
/*!40000 ALTER TABLE `in_member_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `in_member_type`
--

DROP TABLE IF EXISTS `in_member_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `in_member_type` (
  `type_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `member_types` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`),
  KEY `member_types` (`member_types`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `in_member_type`
--

LOCK TABLES `in_member_type` WRITE;
/*!40000 ALTER TABLE `in_member_type` DISABLE KEYS */;
INSERT INTO `in_member_type` VALUES (2,'Hotel'),(3,'Hotel Staff'),(1,'Normal User');
/*!40000 ALTER TABLE `in_member_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `map_access_vecancy`
--

DROP TABLE IF EXISTS `map_access_vecancy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `map_access_vecancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access_id` int(11) DEFAULT NULL,
  `vecancy_id` int(11) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `access_id` (`access_id`),
  KEY `vecancy_id` (`vecancy_id`),
  KEY `date_time` (`date_time`)
) ENGINE=InnoDB AUTO_INCREMENT=458 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `map_access_vecancy`
--

LOCK TABLES `map_access_vecancy` WRITE;
/*!40000 ALTER TABLE `map_access_vecancy` DISABLE KEYS */;
INSERT INTO `map_access_vecancy` VALUES (325,23,1,'2015-05-15 13:40:51'),(326,23,2,'2015-05-15 13:40:51'),(350,42,0,'2015-05-22 15:14:40'),(352,43,0,'2015-05-22 15:15:03'),(353,43,0,'2015-05-22 15:15:03'),(354,43,1,'2015-05-22 15:15:03'),(355,43,2,'2015-05-22 15:15:03'),(356,48,0,'2015-05-25 10:44:16'),(357,49,0,'2015-05-25 11:50:24'),(365,15,1,'2015-05-26 12:47:37'),(366,15,2,'2015-05-26 12:47:37'),(367,15,3,'2015-05-26 12:47:37'),(368,15,4,'2015-05-26 12:47:37'),(374,1,5,'2015-05-31 12:35:42'),(375,1,6,'2015-05-31 12:35:42'),(376,22,3,'2015-06-01 13:00:38'),(377,21,2,'2015-06-01 13:02:24'),(378,21,1,'2015-06-01 13:02:24'),(379,21,6,'2015-06-01 13:02:24'),(380,21,5,'2015-06-01 13:02:24'),(383,56,1,'2015-06-02 09:39:22'),(384,56,2,'2015-06-02 09:39:22'),(401,64,1,'2015-06-03 11:08:56'),(402,64,2,'2015-06-03 11:08:56'),(405,68,1,'2015-06-03 12:50:15'),(406,68,2,'2015-06-03 12:50:15'),(407,68,3,'2015-06-03 12:50:15'),(414,69,1,'2015-06-03 15:28:22'),(415,69,2,'2015-06-03 15:28:22'),(416,69,3,'2015-06-03 15:28:22'),(441,29,1,'2015-06-04 07:33:24'),(442,29,2,'2015-06-04 07:33:25'),(443,29,3,'2015-06-04 07:33:25'),(445,72,0,'2015-06-04 12:25:24'),(446,67,0,'2015-06-04 13:46:59'),(448,74,0,'2015-06-08 15:51:25'),(449,74,1,'2015-06-08 15:51:25'),(450,74,2,'2015-06-08 15:51:25'),(451,74,6,'2015-06-08 15:51:25'),(452,74,5,'2015-06-08 15:51:25'),(453,77,0,'2015-06-11 09:18:50'),(454,78,1,'2015-06-11 12:06:57'),(455,78,2,'2015-06-11 12:06:57'),(456,78,5,'2015-06-11 12:06:57'),(457,78,6,'2015-06-11 12:06:57');
/*!40000 ALTER TABLE `map_access_vecancy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `map_hotel_zone`
--

DROP TABLE IF EXISTS `map_hotel_zone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `map_hotel_zone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) DEFAULT NULL,
  `zone_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hotel_id` (`hotel_id`),
  KEY `zone_id` (`zone_id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `map_hotel_zone`
--

LOCK TABLES `map_hotel_zone` WRITE;
/*!40000 ALTER TABLE `map_hotel_zone` DISABLE KEYS */;
INSERT INTO `map_hotel_zone` VALUES (2,2,1),(3,5,1),(6,10,1),(7,21,1),(9,22,1),(10,23,1),(11,24,1),(12,25,1),(17,26,1),(18,26,2),(19,26,3),(20,26,4),(21,26,5),(22,26,6),(41,29,1),(42,30,1),(43,31,1),(44,33,1),(51,38,1),(52,38,4),(53,38,5),(54,38,6),(72,27,1),(73,27,2),(82,39,1),(83,39,2),(84,39,3),(85,39,4),(101,40,1),(102,40,2),(103,40,3),(104,40,4),(105,1,1),(106,1,2),(107,1,3),(108,1,4),(109,48,1),(110,48,2),(111,48,3),(112,48,4),(113,27,1),(114,27,2),(115,27,3),(116,27,4),(117,1,1),(118,1,2),(119,1,3),(120,1,4),(121,49,1),(122,49,2),(123,49,3),(124,49,4),(125,49,1),(126,49,2),(127,49,3),(128,49,4),(129,48,1),(130,48,2),(131,48,3),(132,48,4);
/*!40000 ALTER TABLE `map_hotel_zone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_blocked_list`
--

DROP TABLE IF EXISTS `member_blocked_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member_blocked_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `blocked_profile_id` int(11) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `blocked_profile_id` (`blocked_profile_id`),
  KEY `date_time` (`date_time`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_blocked_list`
--

LOCK TABLES `member_blocked_list` WRITE;
/*!40000 ALTER TABLE `member_blocked_list` DISABLE KEYS */;
INSERT INTO `member_blocked_list` VALUES (1,90,93,NULL),(2,113,99,'2015-05-12 06:55:53'),(7,99,108,'2015-05-21 12:19:47'),(11,131,124,'2015-05-22 11:03:01'),(19,109,99,'2015-05-26 12:17:22'),(23,165,99,'2015-05-27 08:53:27'),(36,191,192,'2015-06-08 16:00:10'),(37,191,4,'2015-06-08 16:00:30'),(38,191,190,'2015-06-08 16:00:49'),(39,191,185,'2015-06-08 16:01:04'),(40,191,189,'2015-06-08 16:01:28');
/*!40000 ALTER TABLE `member_blocked_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membership_packages`
--

DROP TABLE IF EXISTS `membership_packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membership_packages` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `price` float(10,2) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `duration_type` enum('D','M','Y') DEFAULT 'D',
  `active` enum('Y','N') DEFAULT 'Y',
  PRIMARY KEY (`package_id`),
  KEY `active` (`active`),
  KEY `price` (`price`),
  KEY `duration` (`duration`),
  KEY `duration_type` (`duration_type`),
  KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membership_packages`
--

LOCK TABLES `membership_packages` WRITE;
/*!40000 ALTER TABLE `membership_packages` DISABLE KEYS */;
INSERT INTO `membership_packages` VALUES (1,'package','package',100.00,1,'M','Y');
/*!40000 ALTER TABLE `membership_packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notify_order`
--

DROP TABLE IF EXISTS `notify_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notify_order` (
  `from_user` int(11) DEFAULT NULL,
  `to_user` int(11) DEFAULT NULL,
  `from_room` varchar(50) DEFAULT NULL,
  `to_room` varchar(50) DEFAULT NULL,
  `total_price` float(10,0) DEFAULT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` datetime DEFAULT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `drinks_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notify_order`
--

LOCK TABLES `notify_order` WRITE;
/*!40000 ALTER TABLE `notify_order` DISABLE KEYS */;
INSERT INTO `notify_order` VALUES (93,90,NULL,NULL,34,'1',2,'2015-04-30 23:53:25',NULL,NULL),(90,90,NULL,NULL,11,'1',3,'2015-05-02 10:51:27',1,89),(90,90,NULL,NULL,11,'1',4,'2015-05-02 10:51:30',1,89),(90,90,NULL,NULL,11,'1',5,'2015-05-02 10:51:33',1,89),(90,63,NULL,NULL,11,'1',6,'2015-05-03 11:28:53',1,88),(90,63,NULL,NULL,20,'1',7,'2015-05-03 11:46:07',1,1),(90,63,NULL,NULL,20,'1',8,'2015-05-03 11:46:08',1,1),(99,98,NULL,NULL,20,'1',9,'2015-05-04 10:35:40',27,107),(99,98,NULL,NULL,20,'1',10,'2015-05-04 10:35:44',27,107),(99,98,NULL,NULL,20,'1',11,'2015-05-04 10:35:45',27,107),(99,98,NULL,NULL,20,'1',12,'2015-05-04 10:35:45',27,107),(99,98,NULL,NULL,20,'1',13,'2015-05-04 10:36:43',27,107),(99,98,NULL,NULL,20,'1',14,'2015-05-04 10:36:46',27,107),(99,98,NULL,NULL,20,'1',15,'2015-05-04 10:36:48',27,107),(99,98,NULL,NULL,20,'1',16,'2015-05-04 10:36:49',27,107),(99,98,NULL,NULL,20,'1',17,'2015-05-04 10:37:39',27,107),(99,98,NULL,NULL,20,'1',18,'2015-05-04 10:37:39',27,107),(98,99,NULL,NULL,20,'1',19,'2015-05-04 10:37:45',27,103),(98,99,NULL,NULL,20,'1',20,'2015-05-04 10:37:46',27,103),(98,99,NULL,NULL,20,'1',21,'2015-05-04 10:37:46',27,103),(98,99,NULL,NULL,20,'1',22,'2015-05-04 10:37:46',27,103),(98,99,NULL,NULL,20,'1',23,'2015-05-04 10:37:49',27,103),(98,99,NULL,NULL,20,'1',24,'2015-05-04 10:37:50',27,103),(98,99,NULL,NULL,20,'1',25,'2015-05-04 10:37:50',27,103),(98,99,'','',20,'1',26,'2015-05-04 15:01:08',27,103),(98,99,'','',20,'1',27,'2015-05-04 15:01:09',27,103),(98,99,'','',40,'1',28,'2015-05-05 07:52:16',27,105),(98,99,'','',40,'1',29,'2015-05-05 07:52:17',27,105),(98,99,'','',40,'1',30,'2015-05-05 07:52:18',27,105),(98,99,'','',40,'1',31,'2015-05-05 07:52:22',27,105),(98,99,'','',40,'1',32,'2015-05-05 07:52:26',27,105),(98,99,'','',40,'1',33,'2015-05-05 07:52:27',27,105),(98,99,'','',40,'1',34,'2015-05-05 07:52:28',27,105),(98,99,'','',20,'1',35,'2015-05-05 07:56:35',27,107),(116,117,'100','200',10,'1',36,'2015-05-12 10:22:38',40,108),(117,116,'200','100',10,'1',37,'2015-05-12 10:23:45',40,108),(117,116,'200','100',10,'1',38,'2015-05-12 10:23:50',40,108),(56,78,NULL,NULL,30,'1',39,'2015-05-20 15:21:17',27,104),(5,4,'114','113',11,'1',40,'2015-05-20 16:02:11',1,89),(4,5,'113','114',11,'1',41,'2015-05-21 06:23:49',1,89),(4,5,'113','114',11,'1',42,'2015-05-21 06:24:11',1,89),(4,5,'113','114',11,'1',43,'2015-05-21 06:25:12',1,89),(5,4,'114','113',34,'1',44,'2015-05-21 06:30:11',1,90),(4,5,'113','114',11,'1',45,'2015-05-21 06:36:06',1,88),(98,99,'301','401',20,'1',46,'2015-05-21 10:55:41',27,103),(99,98,'401','301',20,'1',47,'2015-05-21 11:08:43',27,103),(99,98,'401','301',20,'1',48,'2015-05-21 11:08:44',27,103),(99,98,'401','301',30,'1',49,'2015-05-21 11:08:48',27,104),(98,99,'301','401',10,'1',50,'2015-05-21 11:10:12',27,106),(99,98,'401','301',10,'1',51,'2015-05-21 11:11:00',27,106),(98,99,'301','401',20,'1',52,'2015-05-21 11:11:25',27,103),(113,109,'','',20,'1',53,'2015-05-21 12:26:06',27,103),(113,109,'','',20,'1',54,'2015-05-21 12:38:27',27,103),(113,109,'','',30,'1',55,'2015-05-21 12:38:52',27,104),(113,109,'','',40,'1',56,'2015-05-21 13:05:12',27,105),(113,109,'','',40,'1',57,'2015-05-21 13:42:00',27,105),(NULL,NULL,NULL,NULL,0,NULL,58,'2015-05-21 14:17:23',NULL,NULL),(NULL,NULL,NULL,NULL,0,NULL,59,'2015-05-21 14:17:31',NULL,NULL),(NULL,NULL,NULL,NULL,0,NULL,60,'2015-05-21 14:24:58',NULL,NULL),(NULL,NULL,NULL,NULL,0,NULL,61,'2015-05-21 14:40:13',NULL,NULL),(113,109,'','',20,'1',62,'2015-05-21 14:41:51',27,107),(113,109,'','',20,'1',63,'2015-05-21 14:41:54',27,103),(98,99,'301','401',20,'1',64,'2015-05-21 14:53:04',27,103),(98,99,'301','401',20,'1',65,'2015-05-21 14:53:05',27,103),(98,99,'301','401',20,'1',66,'2015-05-21 14:54:27',27,107),(98,124,'301','600',20,'1',67,'2015-05-22 08:36:23',27,107),(5,4,'114','113',34,'1',68,'2015-05-22 09:58:32',1,90),(5,4,'114','113',11,'1',69,'2015-05-22 10:03:09',1,89),(138,137,'199','99',20,'1',70,'2015-05-22 14:28:32',27,103),(109,113,'','',10,'1',71,'2015-05-22 14:43:27',27,106),(138,137,'199','99',20,'1',72,'2015-05-22 15:09:20',27,107),(142,141,'45','55',20,'1',73,'2015-05-22 16:03:16',27,107),(4,5,'113','114',11,'1',74,'2015-05-22 16:12:36',1,88),(4,5,'113','114',11,'1',75,'2015-05-22 16:20:29',1,88),(4,5,'113','114',11,'1',76,'2015-05-22 16:20:31',1,88),(4,5,'113','114',25,'1',77,'2015-05-22 16:21:41',1,2),(5,4,'114','113',20,'1',78,'2015-05-22 16:37:50',1,1),(157,156,'166','66',20,'1',79,'2015-05-25 15:21:00',27,103),(113,109,'','',10,'1',80,'2015-05-26 05:26:38',27,106),(113,109,'','',10,'1',81,'2015-05-26 06:40:43',27,106),(113,109,'','',10,'1',82,'2015-05-26 06:42:38',27,106),(113,109,'','',10,'1',83,'2015-05-26 06:42:38',27,106),(113,109,'','',10,'1',84,'2015-05-26 06:48:17',27,106),(113,109,'','',10,'1',85,'2015-05-26 06:50:27',27,106),(113,109,'','',10,'1',86,'2015-05-26 06:51:09',27,106),(113,109,'','',10,'1',87,'2015-05-26 06:52:47',27,106),(113,109,'','',10,'1',88,'2015-05-26 06:53:11',27,106),(113,109,'','',10,'1',89,'2015-05-26 06:53:13',27,106),(113,109,'','',10,'1',90,'2015-05-26 06:53:14',27,106),(113,109,'','',10,'1',91,'2015-05-26 06:53:16',27,106),(113,109,'','',20,'1',92,'2015-05-26 06:55:07',27,107),(109,113,'','',30,'1',93,'2015-05-26 06:59:22',27,104),(109,113,'','',30,'1',94,'2015-05-26 07:01:38',27,104),(164,165,'299','399',10,'1',95,'2015-05-26 07:32:50',27,106),(164,165,'299','399',20,'1',96,'2015-05-26 09:22:08',27,107),(164,165,'299','399',20,'1',97,'2015-05-26 09:25:16',27,103),(165,164,'399','299',20,'1',98,'2015-05-26 12:49:25',27,107),(165,164,'399','299',10,'1',99,'2015-05-26 12:50:20',27,106),(165,164,'399','299',10,'1',100,'2015-05-26 12:50:24',27,106),(164,165,'299','399',20,'1',101,'2015-05-26 14:03:45',27,103),(164,165,'299','399',20,'1',102,'2015-05-26 14:16:11',27,103),(183,182,'499','399',34,'1',103,'2015-06-03 13:00:21',1,90),(189,190,'test','399',11,'1',104,'2015-06-04 09:55:14',1,89),(196,195,'20','10',34,'1',105,'2015-06-11 10:08:06',1,90),(196,195,'20','10',11,'1',106,'2015-06-11 10:09:12',1,89),(196,195,'20','10',34,'1',107,'2015-06-11 10:10:02',1,90),(195,196,'10','20',25,'1',108,'2015-06-11 10:10:57',1,2),(195,196,'10','20',20,'1',109,'2015-06-11 10:11:58',1,1),(196,195,'20','10',34,'1',110,'2015-06-11 12:09:27',1,90),(4,5,'113','114',20,'1',111,'2015-06-12 09:09:52',1,1),(4,5,'113','114',20,'1',112,'2015-06-12 09:12:22',1,1),(5,4,'114','113',25,'1',113,'2015-06-12 09:12:27',1,2),(5,4,'114','113',25,'1',114,'2015-06-12 09:12:28',1,2),(5,4,'114','113',25,'1',115,'2015-06-12 09:12:28',1,2),(5,4,'114','113',34,'1',116,'2015-06-12 10:00:21',1,90),(195,196,'10','20',34,'1',117,'2015-06-12 12:38:05',1,90),(196,195,'20','10',11,'1',118,'2015-06-12 13:58:42',1,89),(196,195,'20','10',34,'1',119,'2015-06-12 13:59:35',1,90),(196,195,'20','10',34,'1',120,'2015-06-12 14:11:32',1,90),(196,195,'20','10',20,'1',121,'2015-06-12 14:15:57',1,1),(196,195,'20','10',11,'1',122,'2015-06-12 14:21:02',1,88),(196,195,'20','10',34,'1',123,'2015-06-12 14:22:50',1,90),(196,195,'20','10',34,'1',124,'2015-06-12 14:24:21',1,90),(195,196,'10','20',34,'1',125,'2015-06-12 14:35:15',1,90),(196,195,'20','10',34,'1',126,'2015-06-12 14:36:19',1,90),(195,4,'10','113',34,'1',127,'2015-06-15 11:57:43',1,90);
/*!40000 ALTER TABLE `notify_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_master`
--

DROP TABLE IF EXISTS `order_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `drinks_id` int(11) DEFAULT NULL,
  `recipient_id` int(11) DEFAULT NULL,
  `room_number` varchar(50) DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  `quantity` int(5) DEFAULT NULL,
  `total_price` float(10,2) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `charged` enum('Y','N') DEFAULT 'N',
  `active` enum('Y','N') DEFAULT 'Y',
  `from_room` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hotel_id` (`hotel_id`),
  KEY `user_id` (`user_id`),
  KEY `drinks_id` (`drinks_id`),
  KEY `price` (`price`),
  KEY `quantity` (`quantity`),
  KEY `total_price` (`total_price`),
  KEY `active` (`active`),
  KEY `charged` (`charged`),
  KEY `recipient_id` (`recipient_id`),
  KEY `room_number` (`room_number`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_master`
--

LOCK TABLES `order_master` WRITE;
/*!40000 ALTER TABLE `order_master` DISABLE KEYS */;
INSERT INTO `order_master` VALUES (1,1,4,1,5,'2',20.00,1,20.00,'2015-04-01 23:38:37','Y','Y','4'),(2,1,5,2,4,'4',25.00,3,75.00,'2015-03-31 23:39:13','Y','Y','2'),(4,1,93,90,90,NULL,34.00,1,34.00,'2015-04-30 23:53:25','N','Y',NULL),(5,1,90,89,90,NULL,11.00,1,11.00,'2015-05-02 10:51:27','N','Y',NULL),(6,1,90,89,90,NULL,11.00,1,11.00,'2015-05-02 10:51:30','N','Y',NULL),(7,1,90,89,90,NULL,11.00,1,11.00,'2015-05-02 10:51:33','N','Y',NULL),(8,1,90,88,63,NULL,11.00,1,11.00,'2015-05-03 11:28:53','N','Y',NULL),(9,1,90,1,63,NULL,20.00,1,20.00,'2015-05-03 11:46:07','N','Y',NULL),(10,1,90,1,63,NULL,20.00,1,20.00,'2015-05-03 11:46:07','N','Y',NULL),(11,27,99,107,98,NULL,20.00,1,20.00,'2015-05-04 10:35:40','N','Y',NULL),(12,27,99,107,98,NULL,20.00,1,20.00,'2015-05-04 10:35:44','N','Y',NULL),(13,27,99,107,98,NULL,20.00,1,20.00,'2015-05-04 10:35:45','N','Y',NULL),(14,27,99,107,98,NULL,20.00,1,20.00,'2015-05-04 10:35:45','N','Y',NULL),(15,27,99,107,98,NULL,20.00,1,20.00,'2015-05-04 10:36:43','N','Y',NULL),(16,27,99,107,98,NULL,20.00,1,20.00,'2015-05-04 10:36:45','N','Y',NULL),(17,27,99,107,98,NULL,20.00,1,20.00,'2015-05-04 10:36:48','N','Y',NULL),(18,27,99,107,98,NULL,20.00,1,20.00,'2015-05-04 10:36:49','N','Y',NULL),(19,27,99,107,98,NULL,20.00,1,20.00,'2015-05-04 10:37:39','N','Y',NULL),(20,27,99,107,98,NULL,20.00,1,20.00,'2015-05-04 10:37:39','N','Y',NULL),(21,27,98,103,99,NULL,20.00,1,20.00,'2015-05-04 10:37:45','N','Y',NULL),(22,27,98,103,99,NULL,20.00,1,20.00,'2015-05-04 10:37:45','N','Y',NULL),(23,27,98,103,99,NULL,20.00,1,20.00,'2015-05-04 10:37:46','N','Y',NULL),(24,27,98,103,99,NULL,20.00,1,20.00,'2015-05-04 10:37:46','N','Y',NULL),(25,27,98,103,99,NULL,20.00,1,20.00,'2015-05-04 10:37:49','N','Y',NULL),(26,27,98,103,99,NULL,20.00,1,20.00,'2015-05-04 10:37:49','N','Y',NULL),(27,27,98,103,99,NULL,20.00,1,20.00,'2015-05-04 10:37:49','N','Y',NULL),(28,27,98,103,99,'',20.00,1,20.00,'2015-05-04 15:01:08','N','Y',''),(29,27,98,103,99,'',20.00,1,20.00,'2015-05-04 15:01:09','N','Y',''),(30,27,98,105,99,'',40.00,1,40.00,'2015-05-05 07:52:16','N','Y',''),(31,27,98,105,99,'',40.00,1,40.00,'2015-05-05 07:52:17','N','Y',''),(32,27,98,105,99,'',40.00,1,40.00,'2015-05-05 07:52:18','N','Y',''),(33,27,98,105,99,'',40.00,1,40.00,'2015-05-05 07:52:22','N','Y',''),(34,27,98,105,99,'',40.00,1,40.00,'2015-05-05 07:52:26','N','Y',''),(35,27,98,105,99,'',40.00,1,40.00,'2015-05-05 07:52:27','N','Y',''),(36,27,98,105,99,'',40.00,1,40.00,'2015-05-05 07:52:27','N','Y',''),(37,27,98,107,99,'',20.00,1,20.00,'2015-05-05 07:56:35','N','Y',''),(38,40,116,108,117,'200',10.00,1,10.00,'2015-05-12 10:22:38','N','Y','100'),(39,40,117,108,116,'100',10.00,1,10.00,'2015-05-12 10:23:45','Y','Y','200'),(40,40,117,108,116,'100',10.00,1,10.00,'2015-05-12 10:23:50','Y','Y','200'),(41,27,56,104,78,NULL,30.00,1,30.00,'2015-05-20 15:21:17','Y','Y',NULL),(42,1,5,89,4,'113',11.00,1,11.00,'2015-05-20 16:02:11','N','Y','114'),(43,1,4,89,5,'114',11.00,1,11.00,'2015-05-21 06:23:49','N','Y','113'),(44,1,4,89,5,'114',11.00,1,11.00,'2015-05-21 06:24:11','N','Y','113'),(45,1,4,89,5,'114',11.00,1,11.00,'2015-05-21 06:25:12','N','Y','113'),(46,1,5,90,4,'113',34.00,1,34.00,'2015-05-21 06:30:11','N','Y','114'),(47,1,4,88,5,'114',11.00,1,11.00,'2015-05-21 06:36:06','N','Y','113'),(48,27,98,103,99,'401',20.00,1,20.00,'2015-05-21 10:55:41','N','Y','301'),(49,27,99,103,98,'301',20.00,1,20.00,'2015-05-21 11:08:43','N','Y','401'),(50,27,99,103,98,'301',20.00,1,20.00,'2015-05-21 11:08:44','N','Y','401'),(51,27,99,104,98,'301',30.00,1,30.00,'2015-05-21 11:08:48','N','Y','401'),(52,27,98,106,99,'401',10.00,1,10.00,'2015-05-21 11:10:12','N','Y','301'),(53,27,99,106,98,'301',10.00,1,10.00,'2015-05-21 11:11:00','N','Y','401'),(54,27,98,103,99,'401',20.00,1,20.00,'2015-05-21 11:11:25','N','Y','301'),(55,27,113,103,109,'',20.00,1,20.00,'2015-05-21 12:26:06','N','Y',''),(56,27,113,103,109,'',20.00,1,20.00,'2015-05-21 12:38:27','N','Y',''),(57,27,113,104,109,'',30.00,1,30.00,'2015-05-21 12:38:52','N','Y',''),(58,27,113,105,109,'',40.00,1,40.00,'2015-05-21 13:05:12','N','Y',''),(59,27,113,105,109,'',40.00,1,40.00,'2015-05-21 13:42:00','N','Y',''),(60,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00,'2015-05-21 14:17:23','N','Y',NULL),(61,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00,'2015-05-21 14:17:31','N','Y',NULL),(62,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00,'2015-05-21 14:24:58','N','Y',NULL),(63,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0.00,'2015-05-21 14:40:13','N','Y',NULL),(64,27,113,107,109,'',20.00,1,20.00,'2015-05-21 14:41:51','N','Y',''),(65,27,113,103,109,'',20.00,1,20.00,'2015-05-21 14:41:54','N','Y',''),(66,27,98,103,99,'401',20.00,1,20.00,'2015-05-21 14:53:03','N','Y','301'),(67,27,98,103,99,'401',20.00,1,20.00,'2015-05-21 14:53:05','N','Y','301'),(68,27,98,107,99,'401',20.00,1,20.00,'2015-05-21 14:54:27','N','Y','301'),(69,27,98,107,124,'600',20.00,1,20.00,'2015-05-22 08:36:23','N','Y','301'),(70,1,5,90,4,'113',34.00,1,34.00,'2015-05-22 09:58:32','N','Y','114'),(71,1,5,89,4,'113',11.00,1,11.00,'2015-05-22 10:03:09','N','Y','114'),(72,27,138,103,137,'99',20.00,1,20.00,'2015-05-22 14:28:32','N','Y','199'),(73,27,109,106,113,'',10.00,1,10.00,'2015-05-22 14:43:27','N','Y',''),(74,27,138,107,137,'99',20.00,1,20.00,'2015-05-22 15:09:20','Y','Y','199'),(75,27,142,107,141,'55',20.00,1,20.00,'2015-05-22 16:03:16','N','Y','45'),(76,1,4,88,5,'114',11.00,1,11.00,'2015-05-22 16:12:36','N','Y','113'),(77,1,4,88,5,'114',11.00,1,11.00,'2015-05-22 16:20:29','N','Y','113'),(78,1,4,88,5,'114',11.00,1,11.00,'2015-05-22 16:20:31','N','Y','113'),(79,1,4,2,5,'114',25.00,1,25.00,'2015-05-22 16:21:41','N','Y','113'),(80,1,5,1,4,'113',20.00,1,20.00,'2015-05-22 16:37:50','N','Y','114'),(81,27,157,103,156,'66',20.00,1,20.00,'2015-05-25 15:21:00','N','Y','166'),(82,27,113,106,109,'',10.00,1,10.00,'2015-05-26 05:26:38','N','Y',''),(83,27,113,106,109,'',10.00,1,10.00,'2015-05-26 06:40:43','N','Y',''),(84,27,113,106,109,'',10.00,1,10.00,'2015-05-26 06:42:38','N','Y',''),(85,27,113,106,109,'',10.00,1,10.00,'2015-05-26 06:42:38','N','Y',''),(86,27,113,106,109,'',10.00,1,10.00,'2015-05-26 06:48:17','N','Y',''),(87,27,113,106,109,'',10.00,1,10.00,'2015-05-26 06:50:27','N','Y',''),(88,27,113,106,109,'',10.00,1,10.00,'2015-05-26 06:51:09','N','Y',''),(89,27,113,106,109,'',10.00,1,10.00,'2015-05-26 06:52:47','N','Y',''),(90,27,113,106,109,'',10.00,1,10.00,'2015-05-26 06:53:11','N','Y',''),(91,27,113,106,109,'',10.00,1,10.00,'2015-05-26 06:53:13','N','Y',''),(92,27,113,106,109,'',10.00,1,10.00,'2015-05-26 06:53:14','N','Y',''),(93,27,113,106,109,'',10.00,1,10.00,'2015-05-26 06:53:16','N','Y',''),(94,27,113,107,109,'',20.00,1,20.00,'2015-05-26 06:55:07','N','Y',''),(95,27,109,104,113,'',30.00,1,30.00,'2015-05-26 06:59:21','N','Y',''),(96,27,109,104,113,'',30.00,1,30.00,'2015-05-26 07:01:37','N','Y',''),(97,27,164,106,165,'399',10.00,1,10.00,'2015-05-26 07:32:50','N','Y','299'),(98,27,164,107,165,'399',20.00,1,20.00,'2015-05-26 09:22:08','N','Y','299'),(99,27,164,103,165,'399',20.00,1,20.00,'2015-05-26 09:25:16','N','Y','299'),(100,27,165,107,164,'299',20.00,1,20.00,'2015-05-26 12:49:25','N','Y','399'),(101,27,165,106,164,'299',10.00,1,10.00,'2015-05-26 12:50:19','N','Y','399'),(102,27,165,106,164,'299',10.00,1,10.00,'2015-05-26 12:50:23','N','Y','399'),(103,27,164,103,165,'399',20.00,1,20.00,'2015-05-26 14:03:45','N','Y','299'),(104,27,164,103,165,'399',20.00,1,20.00,'2015-05-26 14:16:11','N','Y','299'),(105,1,183,90,182,'399',34.00,1,34.00,'2015-06-03 13:00:21','N','Y','499'),(106,1,189,89,190,'399',11.00,1,11.00,'2015-06-04 09:55:14','N','Y','test'),(107,1,196,90,195,'10',34.00,1,34.00,'2015-06-11 10:08:06','N','Y','20'),(108,1,196,89,195,'10',11.00,1,11.00,'2015-06-11 10:09:12','N','Y','20'),(109,1,196,90,195,'10',34.00,1,34.00,'2015-06-11 10:10:02','N','Y','20'),(110,1,195,2,196,'20',25.00,1,25.00,'2015-06-11 10:10:57','N','Y','10'),(111,1,195,1,196,'20',20.00,1,20.00,'2015-06-11 10:11:58','N','Y','10'),(112,1,196,90,195,'10',34.00,1,34.00,'2015-06-11 12:09:27','N','Y','20'),(113,1,4,1,5,'114',20.00,1,20.00,'2015-06-12 09:09:52','N','Y','113'),(114,1,4,1,5,'114',20.00,1,20.00,'2015-06-12 09:12:22','N','Y','113'),(115,1,5,2,4,'113',25.00,1,25.00,'2015-06-12 09:12:27','N','Y','114'),(116,1,5,2,4,'113',25.00,1,25.00,'2015-06-12 09:12:28','N','Y','114'),(117,1,5,2,4,'113',25.00,1,25.00,'2015-06-12 09:12:28','N','Y','114'),(118,1,5,90,4,'113',34.00,1,34.00,'2015-06-12 10:00:21','N','Y','114'),(119,1,195,90,196,'20',34.00,1,34.00,'2015-06-12 12:38:05','N','Y','10'),(120,1,196,89,195,'10',11.00,1,11.00,'2015-06-12 13:58:42','N','Y','20'),(121,1,196,90,195,'10',34.00,1,34.00,'2015-06-12 13:59:35','N','Y','20'),(122,1,196,90,195,'10',34.00,1,34.00,'2015-06-12 14:11:32','N','Y','20'),(123,1,196,1,195,'10',20.00,1,20.00,'2015-06-12 14:15:57','N','Y','20'),(124,1,196,88,195,'10',11.00,1,11.00,'2015-06-12 14:21:02','N','Y','20'),(125,1,196,90,195,'10',34.00,1,34.00,'2015-06-12 14:22:50','N','Y','20'),(126,1,196,90,195,'10',34.00,1,34.00,'2015-06-12 14:24:21','N','Y','20'),(127,1,195,90,196,'20',34.00,1,34.00,'2015-06-12 14:35:15','N','Y','10'),(128,1,196,90,195,'10',34.00,1,34.00,'2015-06-12 14:36:19','N','Y','20'),(129,1,195,90,4,'113',34.00,1,34.00,'2015-06-15 11:57:43','N','Y','10');
/*!40000 ALTER TABLE `order_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `renew_membership_details`
--

DROP TABLE IF EXISTS `renew_membership_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `renew_membership_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `renew_membership_package_id` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `deleted` enum('Y','N') DEFAULT 'N',
  `tnx_date` datetime DEFAULT NULL,
  `tnx_text` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `renew_membership_details`
--

LOCK TABLES `renew_membership_details` WRITE;
/*!40000 ALTER TABLE `renew_membership_details` DISABLE KEYS */;
INSERT INTO `renew_membership_details` VALUES (1,1,1,'2588694',1,100.00,'2015-07-17 00:00:00','N','2015-06-17 07:25:44','Tnx Code: I00001, Tnx Text:Successful.'),(2,0,11,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(3,0,19,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(4,0,20,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(5,0,21,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(6,0,22,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(7,0,30,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(8,0,31,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(9,0,32,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(10,0,33,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(11,0,34,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(12,0,35,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(13,0,38,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(14,0,39,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(15,0,40,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(16,0,41,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(17,1,47,'2588693',1,100.00,'2015-01-17 00:00:00','N','2015-06-17 07:25:19','Tnx Code: I00001, Tnx Text:Successful.'),(18,0,51,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(19,0,58,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(20,0,61,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(21,0,64,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(22,0,69,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(23,0,71,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(24,0,72,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(25,0,73,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(26,0,74,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(27,0,77,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(28,0,80,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(29,0,97,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(30,0,114,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(31,0,202,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(32,0,203,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(33,0,204,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(34,0,205,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(35,0,206,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(36,0,207,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(37,0,208,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL),(64,1,209,'2588760',1,100.00,'2015-07-17 00:00:00','N','2015-06-17 09:13:57','Tnx Code: I00001, Tnx Text:Successful.'),(65,1,210,'2588756',1,100.00,'2015-06-10 00:00:00','N','2015-06-17 09:13:38','Tnx Code: I00001, Tnx Text:Successful.'),(67,0,212,NULL,NULL,NULL,'2015-08-17 00:00:00','N',NULL,NULL);
/*!40000 ALTER TABLE `renew_membership_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vecancy_reason_list`
--

DROP TABLE IF EXISTS `vecancy_reason_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vecancy_reason_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `active` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `active` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vecancy_reason_list`
--

LOCK TABLES `vecancy_reason_list` WRITE;
/*!40000 ALTER TABLE `vecancy_reason_list` DISABLE KEYS */;
INSERT INTO `vecancy_reason_list` VALUES (1,'Nature','Y'),(2,'Culture','Y'),(3,'Business Fiera','Y'),(4,'Concert','Y'),(5,'Sport','Y'),(6,'Family Vacation','Y');
/*!40000 ALTER TABLE `vecancy_reason_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webservice`
--

DROP TABLE IF EXISTS `webservice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `webservice` (
  `id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `category` text,
  `json` text,
  `desc` text,
  `type` enum('JSON','POST') DEFAULT 'JSON',
  `controller` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webservice`
--

LOCK TABLES `webservice` WRITE;
/*!40000 ALTER TABLE `webservice` DISABLE KEYS */;
INSERT INTO `webservice` VALUES (1,'register','Login & Registration','first_name,last_name,email, password,phone,city,address,image, username,device_token,activation_code,vacancy_list,desc,status',NULL,'POST','client/register'),(2,'Login','Login & Registration','username,password,device_token',NULL,'POST','client/login'),(3,'shareExperiance','Hotel','{\"function\":\"shareExperiance\",\"parameters\":{\"activation_code\":\"1380479981\",\"experiance\":\"test\",\"user_id\":\"4\"}}',NULL,'JSON','client'),(4,'Hotel Details','Hotel','{\"function\":\"hotel_details\", \"parameters\": {\"activation_code\": \"1380479981\"},\"token\":\"\"}',NULL,'JSON','client'),(5,'Vacancy Reson List','Guest','{\"function\":\"vacancy_reason_list\", \"parameters\": {},\"token\":\"\"}',NULL,'JSON','client'),(6,'Guest Details','Guest','{\"function\":\"get_user_details\", \"parameters\": {\"user_id\": \"4\",\"activation_code\":\"1380479981\"},\"token\":\"\"}',NULL,'JSON','client'),(7,'Forget Password','Login & Registration','{\"function\":\"forgotPassword\",\"parameters\":{\"email_address\":\"guest1@hotel1.com\"},\"token\":\"\"}',NULL,'JSON','client'),(8,'Activation Code Expires Check','Guest','{\"function\":\"checkActivationCodeExpires\", \"parameters\": {\"activation_code\":\"1380479981\"},\"token\":\"\"}',NULL,'JSON','client'),(9,'Guest List','Guest','{\"function\":\"GetAllGuestUsers\", \"parameters\": {\"activation_code\":\"1380479981\",\"page\":\"0\"},\"token\":\"\"}',NULL,'JSON','client'),(10,'Logout','Login & Registration','{\"function\":\"logout\", \"parameters\": {\"user_id\": \"4\",\"device_token\":\"\"},\"token\":\"\"}',NULL,'JSON','client');
/*!40000 ALTER TABLE `webservice` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-17  9:09:17
