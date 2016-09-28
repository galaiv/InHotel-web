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
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_master`
--

LOCK TABLES `access_master` WRITE;
/*!40000 ALTER TABLE `access_master` DISABLE KEYS */;
INSERT INTO `access_master` VALUES (1,1,10,1,'2',NULL,NULL,NULL,'2015-04-02 09:08:03','Y'),(2,1,0,1,'11',NULL,NULL,NULL,NULL,'Y'),(3,1,10,2,'4',NULL,NULL,NULL,'2015-04-02 09:13:11','Y'),(4,1,0,2,'24',NULL,NULL,NULL,NULL,'Y'),(5,1,0,2,'3',NULL,NULL,NULL,NULL,'Y'),(6,1,10,1,'52',NULL,NULL,NULL,NULL,'Y'),(7,1,10,3,'200',NULL,NULL,NULL,'2015-04-09 17:19:53','Y'),(8,1,10,4,'300',NULL,NULL,NULL,'2015-04-09 17:21:02','Y'),(9,2,14,5,'200',NULL,NULL,NULL,'2015-04-09 19:11:11','Y'),(10,2,14,5,'200',NULL,NULL,NULL,NULL,'Y'),(11,2,14,6,'300',NULL,NULL,NULL,'2015-04-10 16:29:41','Y'),(12,2,14,7,'300',NULL,NULL,NULL,'2015-04-10 17:57:23','Y'),(13,2,0,8,'400',NULL,'1970-01-01 00:00:00','1970-01-01 00:00:00','2015-04-14 18:37:42','Y'),(14,6,0,9,'100',NULL,NULL,NULL,'2015-04-17 16:54:42','Y'),(15,6,0,10,'100',NULL,NULL,NULL,'2015-04-17 20:39:13','Y'),(16,6,0,11,'200',NULL,NULL,NULL,'2015-04-17 20:45:35','Y'),(17,1,0,1,'2',NULL,NULL,NULL,NULL,'Y'),(18,1,10,3,'25',NULL,NULL,NULL,NULL,'Y'),(19,22,0,12,'23',NULL,NULL,NULL,'2015-04-20 12:42:35','Y'),(20,26,0,13,'100',NULL,NULL,NULL,'2015-04-23 12:18:26','Y'),(21,26,0,14,'101',NULL,NULL,NULL,'2015-04-23 12:32:28','Y'),(22,26,0,15,'201',NULL,NULL,NULL,'2015-04-23 12:38:15','Y'),(23,26,0,15,'102',NULL,NULL,NULL,NULL,'Y'),(24,26,0,16,'103',NULL,NULL,NULL,'2015-04-23 14:05:40','Y'),(25,26,0,16,'104',NULL,NULL,NULL,NULL,'Y'),(26,27,49,17,'200',NULL,NULL,NULL,'2015-04-23 16:28:44','Y'),(27,27,49,18,'101',NULL,NULL,NULL,'2015-04-23 16:43:31','Y'),(28,27,50,17,'199',NULL,NULL,NULL,NULL,'Y'),(29,27,0,19,'299',NULL,NULL,NULL,'2015-04-23 19:53:20','Y'),(30,27,48,20,'200',NULL,NULL,NULL,'2015-04-23 20:03:16','Y'),(31,1,0,1,'1',NULL,NULL,NULL,NULL,'Y'),(32,27,0,21,'300',NULL,NULL,NULL,'2015-04-24 12:57:46','Y'),(33,1,0,22,'203',NULL,NULL,NULL,'2015-04-25 21:38:31','Y'),(34,1,0,22,'205',NULL,NULL,NULL,NULL,'Y'),(35,1,0,1,'2',NULL,NULL,NULL,NULL,'Y'),(36,1,0,1,'3',NULL,NULL,NULL,NULL,'Y'),(37,27,0,23,'300',NULL,NULL,NULL,'2015-04-27 10:59:32','Y'),(38,27,0,24,'400',NULL,NULL,NULL,'2015-04-27 11:06:27','Y'),(39,1,0,2,'3',NULL,NULL,NULL,NULL,'Y'),(40,1,0,4,'2',NULL,NULL,NULL,NULL,'Y'),(41,27,0,25,'50',NULL,NULL,NULL,'2015-04-27 11:24:43','Y'),(42,27,0,25,'51',NULL,NULL,NULL,NULL,'Y'),(43,27,0,26,'99',NULL,NULL,NULL,'2015-04-27 12:56:15','Y'),(44,27,0,27,'20',NULL,NULL,NULL,'2015-04-27 16:14:46','Y'),(45,27,0,28,'999',NULL,NULL,NULL,'2015-04-27 16:28:22','Y'),(46,27,0,29,'999',NULL,NULL,NULL,'2015-04-28 06:43:06','Y'),(47,1,0,30,'100',NULL,NULL,NULL,'2015-04-28 06:50:25','Y'),(48,1,0,30,'200',NULL,NULL,NULL,NULL,'Y'),(49,27,0,26,'300',NULL,NULL,NULL,NULL,'Y'),(50,27,0,26,'400',NULL,NULL,NULL,NULL,'Y'),(51,27,0,20,'345',NULL,NULL,NULL,NULL,'Y'),(52,27,0,29,'2qwqw',NULL,NULL,NULL,NULL,'Y');
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_members`
--

LOCK TABLES `access_members` WRITE;
/*!40000 ALTER TABLE `access_members` DISABLE KEYS */;
INSERT INTO `access_members` VALUES (1,1,4,'guest1d@hotel1.com','Anu','Jose','anu',NULL,NULL,NULL,'2015-04-02 09:08:03','Y','2015-04-09 17:04:30'),(2,1,5,'guest2@hotel1.com','Ajay','santhosh','ajay',NULL,NULL,NULL,'2015-04-02 09:13:11','Y','2015-04-09 17:04:36'),(3,1,0,'test@mail.com','tester','test','tester',NULL,NULL,NULL,'2015-04-09 17:19:53','Y','2015-04-09 17:21:41'),(4,1,0,'asd@mail.com','tets','test','asdd',NULL,NULL,NULL,'2015-04-09 17:21:02','Y','2015-04-09 17:21:02'),(5,2,0,'test1@mail.com','Test1','Testing','Test1',NULL,NULL,NULL,'2015-04-09 19:11:11','Y','2015-04-09 19:11:11'),(6,2,0,'dfsfsd@mail.com','asdsa','sadas','asdad',NULL,NULL,NULL,'2015-04-10 16:29:41','Y','2015-04-10 16:29:41'),(7,2,0,'joel@newagesmb.com','Joel','Reji','Joel',NULL,NULL,NULL,'2015-04-10 17:57:23','Y','2015-04-10 17:57:23'),(8,2,NULL,'alexjoseph5367@gmail.com','alex','joseph','alex','M','d41d8cd98f00b204e9800998ecf8427e','1970-01-01 00:00:00','2015-04-14 18:37:42','Y',NULL),(9,6,0,'akhil@newagesmb.com','Akhil','PD','Akhil',NULL,NULL,NULL,'2015-04-17 16:54:42','Y','2015-04-17 16:54:42'),(10,6,0,'asas@newagesmb.com','Akhil','PD','Akhil',NULL,NULL,NULL,'2015-04-17 20:39:13','Y','2015-04-17 20:39:13'),(11,6,0,'czxczx@mail.com','tester','tester','tester',NULL,NULL,NULL,'2015-04-17 20:45:35','Y','2015-04-17 20:45:35'),(12,22,0,'anu@newagesmb.com','anu','jose','test',NULL,NULL,NULL,'2015-04-20 12:42:35','Y','2015-04-20 12:42:35'),(13,26,0,'alexjoseph@mail.com','Joseph','Alex','Alex',NULL,NULL,NULL,'2015-04-23 12:18:26','Y','2015-04-23 12:22:58'),(14,26,0,'test1212@mail.com','Newage','Test','Tester',NULL,NULL,NULL,'2015-04-23 12:32:28','Y','2015-04-23 12:36:38'),(15,26,0,'mahesh@newagesmb.com','mahesh','mohan','Mahesh',NULL,NULL,NULL,'2015-04-23 12:38:15','Y','2015-04-23 12:38:15'),(16,26,0,'anton@mail.com','anton','joseph','anton',NULL,NULL,NULL,'2015-04-23 14:05:40','Y','2015-04-23 14:05:40'),(17,27,0,'user1@mail.com','User','test','user',NULL,NULL,NULL,'2015-04-23 16:28:44','Y','2015-04-23 16:28:44'),(18,27,0,'user2@mail.com','user2','test','user',NULL,NULL,NULL,'2015-04-23 16:43:31','Y','2015-04-23 16:43:31'),(19,27,0,'george@mail.com','test','george','George',NULL,NULL,NULL,'2015-04-23 19:53:20','Y','2015-04-23 19:53:20'),(20,27,0,'edmond@mail.com','Edmond','Tester','Edmond',NULL,NULL,NULL,'2015-04-23 20:03:16','Y','2015-04-23 20:03:16'),(21,27,56,'mark@mail.com','Mark','Tester','Mark',NULL,NULL,NULL,'2015-04-24 12:57:46','Y','2015-04-27 11:18:08'),(22,1,63,'galena70@gmail.com','Galena','Ivanova','ksaviera',NULL,NULL,NULL,'2015-04-25 21:38:31','Y','2015-04-25 21:38:31'),(23,27,0,'testtstt@mail.com','testtttt','lastttt','testtttt',NULL,NULL,NULL,'2015-04-27 10:59:32','Y','2015-04-27 10:59:32'),(24,27,0,'dsad@mail.com','sdsd','sdsd','sdsd',NULL,NULL,NULL,'2015-04-27 11:06:27','Y','2015-04-27 11:06:27'),(25,27,65,'new@mail.com','new','test','new',NULL,NULL,NULL,'2015-04-27 11:24:43','Y','2015-04-27 12:01:57'),(26,27,78,'shijil@newagesmb.com','Shijil','tester','shijil',NULL,NULL,NULL,'2015-04-27 12:56:15','Y','2015-04-27 12:56:15'),(27,27,0,'test123@mail.com','test123','test123','test123',NULL,NULL,NULL,'2015-04-27 16:14:46','Y','2015-04-27 16:14:46'),(28,27,0,'newtest@mail.com','newtest','testing','newtest',NULL,NULL,NULL,'2015-04-27 16:28:22','Y','2015-04-27 16:28:22'),(29,27,0,'test555@mail.com','test555','test555','test555',NULL,NULL,NULL,'2015-04-28 06:43:06','Y','2015-04-28 06:43:06'),(30,1,0,'user@mail.com','user','testing','user',NULL,NULL,NULL,'2015-04-28 06:50:25','Y','2015-04-28 06:54:58');
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
  `zone_id` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activation_code_master`
--

LOCK TABLES `activation_code_master` WRITE;
/*!40000 ALTER TABLE `activation_code_master` DISABLE KEYS */;
INSERT INTO `activation_code_master` VALUES (3,1,0,4,1,1,'1380479981','2015-04-02 09:07:00','2015-04-03 09:07:00','2015-04-01 09:07:00','2015-04-24 09:07:00','2015-04-02 09:08:16','Y'),(4,1,0,4,1,2,'1128762749','2015-04-02 09:11:00','2015-04-02 09:11:00','2015-04-02 09:12:00','2015-04-29 09:12:00','2015-04-02 09:12:48','Y'),(5,1,0,5,1,3,'1404319388','2015-04-01 23:45:00','2015-04-04 23:45:00','2015-04-01 23:45:00','2015-04-04 23:45:00','2015-04-02 09:13:31','Y'),(6,1,0,5,1,0,'1301741729','2015-04-02 09:17:00','2015-04-04 09:17:00','2015-04-03 09:17:00','2015-04-25 09:17:00','2015-04-02 09:17:40','Y'),(7,1,0,5,1,5,'1276402078','2015-04-03 09:21:00','2015-04-04 09:21:00','2015-04-05 09:21:00','2015-04-08 09:21:00','2015-04-02 09:22:01','Y'),(8,1,2,4,1,6,'1369679549','2015-04-02 00:14:00','2015-04-02 00:14:00','2015-04-02 00:14:00','2015-04-24 00:30:00','2015-04-02 09:45:16','Y'),(9,2,14,0,1,10,'3294962582','2015-04-10 22:00:00','2015-04-10 22:00:00','2015-04-10 23:30:00','2015-04-11 23:00:00','2015-04-10 16:23:33','Y'),(10,2,14,0,1,12,'7969003746','2015-04-17 23:00:00','2015-04-24 23:00:00','2015-04-17 23:00:00','2015-04-24 23:00:00','2015-04-10 18:21:42','Y'),(11,1,0,0,1,10,'5642684164','2015-04-17 08:39:00','2015-04-24 08:39:00','2015-04-17 08:39:00','2015-04-17 08:39:00','2015-04-11 03:13:00','Y'),(12,1,0,0,1,10,'7699334650','2015-04-17 08:46:00','2015-04-18 08:46:00','2015-04-18 08:46:00','2015-04-25 08:46:00','2015-04-11 03:16:48','Y'),(13,6,0,0,NULL,14,'8199865159','2015-04-17 22:45:00','2015-04-18 23:30:00','2015-04-17 22:45:00','2015-04-18 23:30:00','2015-04-17 16:56:19','Y'),(14,6,0,0,NULL,15,'3158755612','2015-04-18 02:30:00','2015-04-21 03:00:00','2015-04-18 02:30:00','2015-04-22 02:08:00','2015-04-17 20:40:07','Y'),(15,1,0,4,1,17,'2685758214','2015-04-20 11:52:00','2015-04-21 11:52:00','2015-04-22 11:52:00','2015-04-24 11:52:00','2015-04-20 06:24:13','Y'),(16,1,10,0,1,18,'1738264895','2015-05-20 17:52:00','2015-05-21 17:52:00','2015-05-23 17:52:00','2015-05-24 17:52:00','2015-04-20 12:24:56','Y'),(17,22,0,0,1,19,'6878096970','2015-04-20 18:11:00','2015-04-21 18:11:00','2015-04-23 18:11:00','2015-04-25 18:11:00','2015-04-20 12:42:50','Y'),(18,26,0,0,1,20,'7565989523','2015-04-25 04:00:00','2015-04-27 11:00:00','2015-04-25 04:00:00','2015-04-27 11:00:00','2015-04-23 12:21:51','Y'),(19,26,0,0,1,0,'8720423099','2015-04-25 04:00:00','2015-04-27 15:00:00','2015-04-27 15:00:00','2015-04-27 15:00:00','2015-04-23 12:33:32','Y'),(20,26,0,0,1,0,'4922262098','2015-04-25 04:00:00','2015-04-25 04:00:00','2015-04-25 04:00:00','2015-04-25 04:00:00','2015-04-23 12:39:14','Y'),(21,26,0,0,1,0,'7312690238','2015-05-01 12:00:00','2015-05-01 12:00:00','2015-05-01 12:00:00','2015-05-01 12:00:00','2015-04-23 12:53:35','Y'),(22,26,0,0,2,0,'7263153609','2015-05-01 23:45:00','2015-05-01 23:45:00','2015-05-01 23:45:00','2015-05-01 23:45:00','2015-04-23 14:07:38','Y'),(23,26,0,0,2,25,'4486521142','2015-06-01 20:00:00','2015-06-30 21:00:00','2015-06-01 20:00:00','2015-06-30 20:00:00','2015-04-23 14:15:40','Y'),(24,27,49,0,1,0,'3933297681','2015-05-01 03:00:00','2015-05-01 03:00:00','2015-05-01 03:00:00','2015-05-01 03:00:00','2015-04-23 16:30:18','Y'),(25,27,49,0,1,27,'7402824829','2015-05-01 23:00:00','2015-05-31 23:00:00','2015-05-01 23:00:00','2015-05-31 23:00:00','2015-04-23 16:44:34','Y'),(26,27,50,0,1,28,'3473953617','2015-04-24 01:30:00','2015-04-25 02:00:00','2015-04-27 01:15:00','2015-04-30 01:15:00','2015-04-23 19:51:28','Y'),(27,27,0,0,1,29,'3902142660','2015-04-25 01:30:00','2015-04-28 01:15:00','2015-04-25 01:30:00','2015-04-30 01:30:00','2015-04-23 19:53:43','Y'),(28,27,48,0,1,30,'4144287394','2015-04-25 01:31:00','2015-04-29 01:31:00','2015-04-25 01:31:00','2015-04-30 01:31:00','2015-04-23 20:03:38','Y'),(29,1,0,4,1,31,'3976597839','2015-04-24 11:21:00','2015-04-24 11:21:00','2015-04-24 11:21:00','2015-04-24 11:21:00','2015-04-24 05:53:19','Y'),(30,1,0,4,1,31,'9114423510','2015-04-24 11:24:00','2015-04-24 11:30:00','2015-04-24 11:24:00','2015-04-24 11:30:00','2015-04-24 05:57:01','Y'),(31,1,0,4,1,31,'6656875908','2015-04-25 11:30:00','2015-04-25 11:45:00','2015-04-25 11:45:00','2015-04-25 12:00:00','2015-04-24 06:02:45','Y'),(32,27,0,56,1,32,'9654799107','2015-04-24 19:00:00','2015-04-25 19:00:00','2015-04-26 10:00:00','2015-04-30 10:00:00','2015-04-24 13:04:59','Y'),(33,1,0,63,2,33,'4324391157','2015-04-25 23:38:00','2015-04-25 23:45:00','2015-04-25 23:45:00','2015-04-27 23:45:00','2015-04-25 21:45:38','Y'),(34,1,0,63,1,34,'6722363303','2015-04-25 23:53:00','2015-04-27 23:53:00','2015-04-27 23:53:00','2015-04-28 23:53:00','2015-04-25 21:54:10','Y'),(35,1,0,63,1,34,'3351767758','2015-04-25 23:53:00','2015-04-27 23:53:00','2015-04-27 23:53:00','2015-04-28 23:53:00','2015-04-25 21:54:10','Y'),(36,1,0,4,1,36,'8063543770','2015-04-27 16:18:00','2015-04-28 16:30:00','2015-04-28 16:18:00','2015-04-30 16:18:00','2015-04-27 10:51:34','Y'),(37,27,0,65,1,42,'5304395101','2015-04-27 15:00:00','2015-04-30 15:00:00','2015-04-27 15:19:00','2015-04-30 15:00:00','2015-04-27 12:06:25','Y'),(38,27,0,78,1,43,'6006847197','2015-04-27 03:00:00','2015-04-28 03:00:00','2015-04-27 12:30:00','2015-04-27 23:00:00','2015-04-27 12:59:02','Y'),(39,27,0,0,1,45,'6981422495','2015-04-27 15:00:00','2015-04-29 23:45:00','2015-05-01 01:56:00','2015-05-05 01:57:00','2015-04-27 16:29:55','Y'),(40,27,0,0,1,46,'9190517428',NULL,NULL,'2015-04-28 16:11:00','2015-04-30 16:12:00','2015-04-28 06:44:18','Y'),(41,1,0,0,2,47,'4608189902',NULL,NULL,'2015-04-28 16:18:00','2015-05-31 16:18:00','2015-04-28 06:50:40','Y'),(42,1,0,0,2,48,'7392882299',NULL,NULL,'2015-04-28 07:00:00','2015-04-30 16:30:00','2015-04-28 06:57:22','Y'),(43,27,0,78,1,49,'8573635510',NULL,NULL,'2015-04-28 05:00:00','2015-04-30 18:15:00','2015-04-28 07:12:17','Y'),(44,27,0,78,1,50,'9848151707',NULL,NULL,'2015-04-28 05:00:00','2015-04-30 16:42:00','2015-04-28 07:14:07','Y');
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
  PRIMARY KEY (`id`),
  KEY `to` (`to`),
  KEY `from` (`from`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` VALUES (60,'4','2','hiihih','2015-04-07 08:01:32',1,'N','N',NULL,NULL,NULL),(61,'4','2','dfdgfd','2015-04-07 08:03:10',1,'N','N',NULL,NULL,NULL),(62,'2','4','hi','2015-04-07 06:46:25',0,'N','N',NULL,NULL,NULL),(63,'2','4','hello final check','2015-04-08 06:25:11',0,'N','N',NULL,NULL,NULL),(64,'4','2','ys final','2015-04-08 09:24:52',1,'N','N',NULL,NULL,NULL),(65,'2','4','hi','2015-04-13 01:23:19',0,'N','N',NULL,NULL,NULL),(66,'4','2','hihi','0000-00-00 00:00:00',1,'N','N',NULL,NULL,NULL),(67,'4','2','hello','2015-04-13 04:24:05',1,'N','N',NULL,NULL,NULL),(68,'2','4','hi','2015-04-13 01:39:40',0,'N','N',NULL,NULL,NULL),(69,'4','2','hhi','2015-04-13 04:39:01',1,'N','N',NULL,NULL,NULL),(70,'2','4','ii','2015-04-13 01:42:24',0,'N','N',NULL,NULL,NULL),(71,'2','4','hi','2015-04-13 01:44:02',0,'N','N',NULL,NULL,NULL),(72,'4','2','ffrfr','2015-04-13 04:44:47',1,'N','N',NULL,NULL,NULL),(73,'2','4','hi','2015-04-13 02:09:49',0,'N','N',NULL,NULL,NULL),(74,'2','4','hi','2015-04-23 07:22:44',0,'N','N',NULL,NULL,0),(75,'4','2','dfgfdgdfg','2015-04-24 07:33:12',1,'N','N',NULL,NULL,0),(76,'2','4','hi','2015-04-24 04:36:08',0,'N','N',NULL,NULL,0),(77,'2','4','hi','2015-04-24 04:37:26',0,'N','N',NULL,NULL,0),(78,'2','4','hi','2015-04-24 04:43:15',0,'N','N',NULL,NULL,0),(79,'2','4','ihi','2015-04-24 05:00:47',0,'N','N',NULL,NULL,0),(80,'4','2','fgdfgdfg','2015-04-24 07:59:17',1,'N','N',NULL,NULL,0),(81,'2','4','hi','2015-04-24 05:10:08',0,'N','N',NULL,NULL,0),(82,'2','4','liii','2015-04-24 05:15:34',0,'N','N',NULL,NULL,0),(83,'2','4','hi','2015-04-24 05:28:16',0,'N','N',NULL,NULL,0),(84,'2','4','hihhihih','2015-04-24 05:30:54',0,'N','N',NULL,NULL,0),(85,'2','4','hi','2015-04-24 05:37:11',0,'N','N',NULL,NULL,0),(86,'2','4','hi','2015-04-24 05:38:03',0,'N','N',NULL,NULL,0),(87,'56','65','Ffhhj','2015-04-27 16:40:23',0,'N','N',NULL,NULL,0),(88,'56','65','Vbnnn','2015-04-27 16:40:29',0,'N','N',NULL,NULL,0),(89,'56','78','  Bnnn','2015-04-27 16:40:48',0,'N','N',NULL,NULL,0),(90,'56','78','Send a drink ','2015-04-27 16:40:59',0,'N','N',NULL,NULL,1),(91,'56','78','Bbn','2015-04-27 16:41:07',0,'N','N',NULL,NULL,0);
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
INSERT INTO `config` VALUES ('PAYPAL_API_USERNAME','platfo_1255077030_biz_api1.gmail.com','Paypal API Username','Paypal API Username for payment processing','Y','N'),('PAYPAL_API_PASSWORD','1255077037','Paypal API Password','Paypal API Password for payment processing','Y','N'),('PAYPAL_API_SIGNATURE','Abg0gYcQyxQvnf2HDJkKtA-p6pqhA1k-KTYE0Gcy1diujFio4io5Vqjf','Paypal API Signature','Paypal API signature for payment processing','Y','N'),('TEST_MODE','Y','Payment Gateway Test mode','Y for payment test mode and N for live mode','Y','Y'),('email_from','aswathy@newagesmb.com','Admin From Email','Admin From Email','Y','Y'),('admin_email','manu@newagesmb.com','Admin Email','Admin Email','Y','Y'),('authorize_trans_key','8F5782C8B7x6Chdd','Authorize.net API Transaction Key','Authorize.net API Transaction Key','Y','Y'),('authorize_login','7s7chZ6V6m','Authorize.net API Login','Authorize.net API Login','Y','Y'),('MEMCACHED_PORT','11211','MEMCACHED_PORT','MEMCACHED_PORT','N','Y'),('MEMCACHED_HOST','192.168.1.254','MEMCACHED_HOST','MEMCACHED_HOST','N','Y'),('jw_player_key','z42Dd3IQQ8oldFjuqxQ5IUAVR9OZcxziWb/gEQ==','JWPlayer Key','JWPlayer Key','N','Y'),('authorize_test_mode','Y','Authorize.net  Test Mode?','Authorize.net  Test Mode?(Y/N)','N','Y'),('dop_to_usd_exchange_rate','0.02','DOP to USD Exchange rate','DOP to USD Exchange rate','N','Y'),('expire_notification_date_difference','7','Expire notification date difference','Membership expire notification difference in days','Y','Y'),('SITE_NAME','DUZZ.COM','Site Name','Name of Site','Y','Y'),('SITE_TAGLINE','Your Online Shipping Community','Site Tagline','Main Site Title','Y','Y'),('SITE_COPYRIGHT','Copyright © 2014 Duzz.com All rights are reserved','Site Copyright Text','Site Copyright Text','Y','Y'),('per_page','10','Pagination Per  Page Count','Pagination Per  Page Count','Y','Y'),('expiry_days','31','Membership Expiry Days','Membership Expiry Days','Y','Y'),('shipment_expiry_days','30','Shipment Expiry Days','Shipment Expiry Days','Y','Y'),('admin-name','Admin','Admin name','Admin name to be displyed in app','Y','Y');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drink_offerings`
--

LOCK TABLES `drink_offerings` WRITE;
/*!40000 ALTER TABLE `drink_offerings` DISABLE KEYS */;
INSERT INTO `drink_offerings` VALUES (1,27,56,104,78,1,'P','2015-04-27 16:40:59');
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
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drinks_master`
--

LOCK TABLES `drinks_master` WRITE;
/*!40000 ALTER TABLE `drinks_master` DISABLE KEYS */;
INSERT INTO `drinks_master` VALUES (1,1,NULL,'Drink 1','     Drink 1','1427945606.jpg',20.00,'2015-04-02 09:03:26','Y'),(2,1,NULL,'Drink2','Drink2','1427945634.jpg',25.00,'2015-04-02 09:03:54','Y'),(88,1,NULL,'pepsi','pepsi',NULL,11.00,'2015-04-02 09:24:55','Y'),(89,1,NULL,'pepsi','pepsi','1427946938.jpg',11.00,'2015-04-02 09:25:38','Y'),(90,1,NULL,'cocola','cocola','1427947161.jpg',34.00,'2015-04-02 09:26:26','Y'),(91,2,NULL,'Beer','     Testing purpose','1428607379.jpg',20.00,'2015-04-09 19:22:59','Y'),(98,6,NULL,'Pepsi','Test','1429289068.jpg',10.00,'2015-04-17 16:44:28','Y'),(99,6,NULL,'coca cola','Test Drink','1429289228.jpg',20.00,'2015-04-17 16:47:08','Y'),(101,26,NULL,'Pepsi','Test drink','1429792038.jpg',20.00,'2015-04-23 12:27:18','Y'),(102,26,NULL,'coca cola','Test coca cola',NULL,30.00,'2015-04-23 12:55:53','Y'),(103,27,NULL,'Cocktail','Test Drink','1429807013.jpg',20.00,'2015-04-23 16:36:53','Y'),(104,27,NULL,'Test Drink','Test Drink',NULL,30.00,'2015-04-27 08:46:31','Y'),(105,27,NULL,'Test Drink3','test',NULL,40.00,'2015-04-27 08:49:08','Y');
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_config`
--

LOCK TABLES `email_config` WRITE;
/*!40000 ALTER TABLE `email_config` DISABLE KEYS */;
INSERT INTO `email_config` VALUES (1,'member_signup_confirmation_user','Member Registration confirmation for Guest','<p>Hi #FULL_NAME# ,</p>\n<p>Congratulations! You have successfully signed up for InHotel.</p>\n<p>Your account Details</p>\n<p>&nbsp;Username :&nbsp; #USERNAME#</p>\n<p>Password :&nbsp;#PASSWORD#</p>\n<p>&nbsp;</p>\n<p>Thanks,</p>\n<p>InHotel Team.</p>\n<p>&nbsp;</p>',' Account Activation','Y'),(2,'forgot_password','Forgot Password','<p>Hi #FULL_NAME# ,</p>\n<p>Your new password:</p>\n<p>Password :&nbsp;#PASSWORD#</p>\n<p>&nbsp;</p>\n<p>Thanks,</p>\n<p>InHotel Team.</p>\n<p>&nbsp;</p>',' Forgot Password','Y'),(5,'member_signup_confirmation_hotel_admin','Member Registration confirmation for Hotel by admin','<p>Hi #FULL_NAME# ,</p>\n<p>Congratulations!&nbsp;Your hotel has been successfully signed up for InHotel.</p>\n<p>Your account Details</p>\n<p>&nbsp;Username :&nbsp; #USERNAME#</p>\n<p>Password :&nbsp;#PASSWORD#</p>\n<p>Please login your InHotel account by clicking on the link below.</p>\n<p>#LINK# &nbsp;</p>\n<p>&nbsp;</p>\n<p>Thanks,</p>\n<p>InHotel Team.</p>',' Account Activation for Hotel by Admin','Y'),(3,'member_signup_confirmation_hotel','Member Registration confirmation for Hotel','<p>Hi #FULL_NAME# ,</p>\n<p>Congratulations! Your hotel has been successfully signed up for InHotel.</p>\n<p>Email Confirmation</p>\n<p>Please login your InHotel account by clicking on the link below.</p>\n<p>#LINK# &nbsp;</p>\n<p>Thanks,</p>\n<p>InHotel Team.</p>\n<p>&nbsp;</p>',' Account Activation for Hotel','Y'),(4,'member_signup_confirmation_staff_admin','Member Registration confirmation for Staff by admin','<p>Hi #FULL_NAME# ,</p>\n<p>Congratulations! You have successfully signed up for InHotel.</p>\n<p>Your account Details</p>\n<p>&nbsp;Username :&nbsp; #USERNAME#</p>\n<p>Password :&nbsp;#PASSWORD#</p>\n<p>Please login your InHotel account by clicking on the link below.</p>\n<p>#LINK# &nbsp;</p>\n<p>&nbsp;</p>\n<p>Thanks,</p>\n<p>InHotel Team.</p>\n<p>&nbsp;</p>','Account Activation for Hotel Staff by Admin','Y'),(6,'member_signup_confirmation_staff','Member Registration confirmation for Staff','<p>Hi #FULL_NAME# ,</p>\r\n<p>Congratulations! You have successfully signed up for InHotel.</p>\r\n<p>Your account Details</p>\r\n<p>&nbsp;Username :&nbsp; #USERNAME#</p>\r\n<p>Password :&nbsp;#PASSWORD#</p>\r\n<p>Please activate your InHotel account by clicking on the activation link below.</p>\r\n<p>#LINK# &nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Thanks,</p>\r\n<p>InHotel Team.</p>\r\n<p>&nbsp;</p>','Account Activation for Hotel Staff','Y'),(7,'feedback_notification','Feedback Notification','<p>Hi,</p>\r\n<p>You have feedback from #USERNAME#</p>\r\n<p>Feedback :</p>\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; #FEEDBACK#</p>\r\n<p>Thanks,</p>\r\n<p>InHotel Team.</p>','Feedback Notification','Y');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel_experience`
--

LOCK TABLES `hotel_experience` WRITE;
/*!40000 ALTER TABLE `hotel_experience` DISABLE KEYS */;
INSERT INTO `hotel_experience` VALUES (27,'Gdfhi cbnkn c bnmk bnmkk nkk bcnmmj mbb mkkk llllll',56,'2015-04-27 16:36:36',1),(1,'test',4,'2015-04-29 02:16:59',2),(1,'test',4,'2015-04-29 05:34:05',3);
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel_profile`
--

LOCK TABLES `hotel_profile` WRITE;
/*!40000 ALTER TABLE `hotel_profile` DISABLE KEYS */;
INSERT INTO `hotel_profile` VALUES (1,1,'mereena hotel','mereena hotel','mereena hotel','ernakulam','ernakulam','12345678','1429255409.jpg','www.hotel1.com','test@test.com',NULL),(2,11,'Beachorchid','Test Hotel','Test Hotel','Princeton','231 Clarksville road','12332332333',NULL,'www.beachorchid.com','','2015-04-09 17:10:27'),(5,18,'vani','','','paadivattam','Kottayam','324345657678',NULL,'',NULL,NULL),(6,19,'Windsor','     Test Restaurant','  Test Hotel   ','Princeton','231 Clarksville road','123423342333','1429291835.jpg','www.windsor.com',NULL,'2015-04-17 16:38:58'),(7,20,'Windsor','     Test Restaurant','  Test Hotel   ','Princeton','231 Clarksville road','123423342333',NULL,'www.windsor.com',NULL,'2015-04-17 16:39:13'),(8,21,'sdsd','     ','     ','Princeton','231 Clarksville road','123423342333',NULL,'sdsd',NULL,'2015-04-17 16:40:40'),(9,22,'test','     ','     ','testreset1','testreset1','243254364',NULL,'',NULL,'2015-04-20 06:28:19'),(10,23,'Home ',NULL,NULL,NULL,NULL,'324345657678',NULL,NULL,NULL,NULL),(11,24,'holyangel hotel','     ernakulam','     ernakulam','ernakulam','ernakulam','4234324234234',NULL,'www.hotel1@inhotel.com',NULL,'2015-04-20 11:14:20'),(12,25,'holyangel hotel','     ernakulam','     ernakulam','ernakulam','ernakulam','4234324234234',NULL,'www.hotel1@inhotel.com',NULL,'2015-04-20 11:15:21'),(13,26,'holyangel hotel','     ernakulam','     ernakulam','ernakulam','ernakulam','4234324234234',NULL,'www.hotel1@inhotel.com',NULL,'2015-04-20 11:15:27'),(14,27,'holyangel hotel','     ernakulam','     ernakulam','ernakulam','ernakulam','4234324234234',NULL,'www.hotel1@inhotel.com',NULL,'2015-04-20 11:17:24'),(15,28,'holyangel hotel','     ernakulam','     ernakulam','ernakulam','ernakulam','4234324234234',NULL,'www.hotel1@inhotel.com',NULL,'2015-04-20 11:17:27'),(16,29,'holyangel hotel','     ernakulam','     ernakulam','ernakulam','ernakulam','4234324234234',NULL,'www.hotel1@inhotel.com',NULL,'2015-04-20 11:20:38'),(17,30,'mereena123 hotel','     ','     ','ernakulam','ernakulam','4234324234234',NULL,'www.hotel1234@inhotel.com',NULL,'2015-04-20 11:23:44'),(18,31,'mereena123 hotel','     ','     ','ernakulam','ernakulam','4234324234234',NULL,'www.hotel1234@inhotel.com',NULL,'2015-04-20 11:25:14'),(19,32,'mereena123 hotel','     ','     ','ernakulam','ernakulam','4234324234234',NULL,'www.hotel1234@inhotel.com',NULL,'2015-04-20 11:29:54'),(20,33,'fgdf','     ','     ','fdg','fgdfg','fg',NULL,'dfgdf',NULL,'2015-04-20 11:31:33'),(21,34,'mereena hotel123','     ','     ','ernakulam','ernakulam','4234324234234',NULL,'',NULL,'2015-04-20 11:36:16'),(22,35,'test','     ','     ','ernakulam','padivattom','123456789',NULL,'',NULL,'2015-04-20 12:35:04'),(23,38,'TajMalabar','Test\nTesting','Test\nTesting','Princeton','231 Clarksville roadPrinceton Junction NJ','1-233-233-2333','1429720643.jpg','www.taj.com',NULL,NULL),(24,39,'oberon','     Test \n      Testing','     ','NewYork','111 greensfield Town','1-333-233-2333','1429720967.jpg','www.oberon.com',NULL,'2015-04-22 16:42:46'),(25,40,'Newage','Test\nTesting','Test\nTesting','Princeton','231 Clarksville road Princeton Junction NewJersey','1-233-233-2333','1429734840.jpg','www.newage.com',NULL,NULL),(26,41,'Raviz','     Test\nTesting','     Test\nTesting','NY','100 Goldtown ville','1-233-233-4555','1429721666.jpg','www.raviz.com',NULL,'2015-04-22 16:54:26'),(27,47,'ParkCentral','    Test\nTesting','Nice place to dream and rest asdf dsf skdfj ksd fkjds jfksd jfksd jfkds jfks dfksd jfksd jf ksf sdk fksd jfks dfksd fksd fkjsd fksd jfksd fjksd fkd fkds fjksdf ksd fjks fsdkf kds fkds fksd fkds fksd fjks dfkjs dfkds fsjd fjks fks jfds dfks jdfksd jfjksd fk sdfks jfdksd fksd fkj sd fkjsdf ksdfk jsf ksdj fjs kfjsdf ksd fksfj','Princeton','231 Clarksville road Princeton Junction NewJersey','1-233-233-2333','1429801553.jpg','www.parkcentral.com',NULL,'2015-04-23 15:05:53'),(28,51,'Lucia','     aghsd dahd sad hsa dhsadj d as hdasjdjsad hsa jdsa hdjsad jasd jasdjas hdjasd asdh jsa djas d jsad jsa djas djsa djas dj asdj as sa dhsa dj sdja sdjasd jsad jsa djs hadjasd asjd jsa dj sa','     sadasd sadsabd sadnas dnbsa db sa dnas d sa das dbnas dnasdb asnbd sand nas dnas dnsab dnsa dbsa dnsa dnbsa dnbasd nsbad ansd nsad nad nas dnasdbsa dnbas dnsad nasd nsad ','Princeton','231 Clarksville road Princeton Junction NewJersey','1-233-233-2333','1429819667.jpg','www.lucia.com',NULL,'2015-04-23 20:07:47'),(29,58,'Marriot',NULL,NULL,NULL,NULL,'12332332333',NULL,NULL,NULL,NULL),(30,61,'Goldenpark','     ','     ','Princeton','231 clarksville road ','1232323232323',NULL,'www.gp.com',NULL,'2015-04-24 15:10:30'),(31,64,'lavender',NULL,NULL,NULL,NULL,'3423423423435',NULL,NULL,NULL,NULL),(32,69,'Nila',NULL,NULL,NULL,NULL,'1-332-332-2333',NULL,NULL,NULL,NULL),(33,71,'mazuri Japaneese cuisine',NULL,NULL,NULL,NULL,'1-233-233-2333',NULL,NULL,NULL,NULL),(34,72,'Sushi','     ','     ','Princeton','231 clarksville road','1-233-233-2333','1430148228.jpg','www.sushi.com',NULL,'2015-04-27 11:23:48'),(35,73,'Sushi','     ','     ','Princeton','231 clarksville road','1-233-233-2333','1430148368.jpg','www.sushi.com',NULL,'2015-04-27 11:26:08'),(36,74,'Sushi','     ','     ','Princeton','231 clarksville road','1-233-233-2333',NULL,'www.sushi.com',NULL,'2015-04-27 11:32:19'),(37,77,'Sushi','     ','     ','Princeton','231 clarksville road','1-233-233-2333','1430152321.jpg','www.sushi.com',NULL,'2015-04-27 12:32:01'),(38,80,'new',NULL,NULL,NULL,NULL,'3423423434',NULL,NULL,NULL,NULL);
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
INSERT INTO `hotel_zone_list` VALUES (1,'Restuarant','Y'),(2,'Room','Y'),(3,'Bar','Y'),(4,'Spa ','Y'),(5,'Swimming Pool','N');
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
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `in_member_master`
--

LOCK TABLES `in_member_master` WRITE;
/*!40000 ALTER TABLE `in_member_master` DISABLE KEYS */;
INSERT INTO `in_member_master` VALUES (1,'e10adc3949ba59abbe56e057f20f883e','hotel1@inhotel.com','Y','N','2015-04-02 08:56:40','aswathy','F','2015-04-02','aswathy','aswathy',NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y',NULL),(2,'e10adc3949ba59abbe56e057f20f883e','staff1@hotel1.com','Y','N','2015-04-02 08:59:35','P K','F','1991-09-19','haripriya','harry',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(3,'e10adc3949ba59abbe56e057f20f883e','staff2@hotel1.com','Y','N','2015-04-02 09:00:31','R','F','1988-06-05','reshma','resh',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(4,'e10adc3949ba59abbe56e057f20f883e','guest1@hotel1.com','Y','N','0000-00-00 00:00:00','','F','1988-06-05','Anu','Jose',NULL,1,0,'2015-04-27 12:25:07','',NULL,NULL,NULL,'N',0,0,'Y',NULL),(5,'e10adc3949ba59abbe56e057f20f883e','guest2@hotel1.com','Y','N','2015-04-02 09:07:53','santhosh','M','1991-01-01','ajay','ajay',NULL,1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(6,'e10adc3949ba59abbe56e057f20f883e','staff3@hotel1.com','Y','N','2015-04-02 12:34:39','k','M','2015-04-02','umesh','umesh',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(7,'e10adc3949ba59abbe56e057f20f883e','staff4@hotel1.com','Y','N','2015-04-02 12:35:49','v','M','2015-04-02','vivek','vicky',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(8,'e10adc3949ba59abbe56e057f20f883e','staff5@hotel1.com','Y','N','2015-04-02 12:36:55','twinkle','F','2015-04-02','twinkle','twinkle',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(9,'e10adc3949ba59abbe56e057f20f883e','anton@newagesmb.com','Y','Y','2015-04-09 04:28:02','Joseph','M','1990-12-01','anton','',NULL,1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(10,'d66dd121f1f99e4bc001bece1422895e','biju@newagesmb.com','Y','N','2015-04-09 16:32:46','george','M','1990-04-01','biju','biju',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(11,'d41d8cd98f00b204e9800998ecf8427e','beachorchid@mail.com','Y','N','2015-04-09 17:10:27','orchid','M','0000-00-00','Beach','beach orchid',NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y',NULL),(12,'e10adc3949ba59abbe56e057f20f883e','john@newagesmb.com','Y','N','2015-04-09 05:25:33','joseph','M','2000-04-02','john','john',NULL,1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(13,'601910eac41b7cc21e472cb13deede06','jibin@newagesmb.com','Y','N','2015-04-09 17:28:34','joy','M','2010-04-01','Jibin','jibin',NULL,3,2,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(14,'e10adc3949ba59abbe56e057f20f883e','mahesh@newagesmb.com','Y','N','2015-04-09 17:31:42','mohan','M','2008-01-01','mahesh','mahesh',NULL,3,2,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(15,'24ec58af6b967430cf20914cc7547c41','testanu@newagesmb.com','Y','N','2015-04-10 08:51:18','testanu','F','2015-04-10','testanu','testanu',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(19,'ec2da3ad44ecbd2e3909224ec40ce3a3','akhil@newagesmb.com','Y','N','2015-04-17 16:38:58','PD','M','0000-00-00','Akhil','Akhil',NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,0,'N',NULL),(20,'e10adc3949ba59abbe56e057f20f883e','akhil@newagesmb.com','Y','Y','2015-04-17 16:39:13','PD','M','0000-00-00','Akhil','Akhil',NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'N',NULL),(21,'e10adc3949ba59abbe56e057f20f883e','dfgd@mail.com','Y','N','2015-04-17 16:40:39','sdsd','M','0000-00-00','sdds','sdsd',NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,0,'N',NULL),(22,'e10adc3949ba59abbe56e057f20f883e','tesdedtreset1@jfgj.sad','Y','N','2015-04-20 06:28:19','testreset1','M','0000-00-00','testreset1','test',NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,0,'N',NULL),(30,'e10adc3949ba59abbe56e057f20f883e','hotel1234@inhotel.com','Y','N','2015-04-20 11:23:44','P K','M','0000-00-00','haripriya',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'N',NULL),(31,'e10adc3949ba59abbe56e057f20f883e','hotel1234@inhotel.com','Y','N','2015-04-20 11:25:14','P K','M','0000-00-00','haripriya',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'N',NULL),(32,'e10adc3949ba59abbe56e057f20f883e','hotel1234@inhotel.com','Y','N','2015-04-20 11:29:53','P K','M','0000-00-00','haripriya',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'N',NULL),(33,'e10adc3949ba59abbe56e057f20f883e','hotel45551@inhotel.com','Y','N','2015-04-20 11:31:33','gdfgdf','M','0000-00-00','fgdf',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'N',NULL),(34,'e10adc3949ba59abbe56e057f20f883e','anu@newagesmb.com','Y','N','2015-04-20 11:36:16','jose','M','0000-00-00','anu',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2388723'),(35,'e10adc3949ba59abbe56e057f20f883e','aswathy@newagesmb.com','Y','N','2015-04-20 12:35:04','N','M','0000-00-00','aswathy',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2388733'),(36,'e10adc3949ba59abbe56e057f20f883e','raju@mail.com','Y','N','2015-04-22 16:11:57','Tester','M','2000-01-01','Raju','Raju',NULL,3,2,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(37,'e10adc3949ba59abbe56e057f20f883e','aju@mail.com','Y','N','2015-04-22 04:28:19','Tester','M','2000-04-01','Aju','Aju',NULL,1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(38,'d41d8cd98f00b204e9800998ecf8427e','taj@mail.com','Y','N','2015-04-22 04:31:17','Hotels','M','0000-00-00','Taj',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2391003'),(39,'e10adc3949ba59abbe56e057f20f883e','oberon@mail.com','Y','N','2015-04-22 16:42:46','Hotel','M','0000-00-00','oberon',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2391012'),(40,'d41d8cd98f00b204e9800998ecf8427e','newage@mail.com','Y','N','2015-04-22 04:51:16','Test','M','0000-00-00','Newage',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,3,'Y','2391016'),(41,'e10adc3949ba59abbe56e057f20f883e','raviz@mail.com','Y','N','2015-04-22 16:54:26','test','M','0000-00-00','Raviz',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,3,'Y','2391017'),(42,'d41d8cd98f00b204e9800998ecf8427e','staff1@mail.com','Y','N','2015-04-23 13:00:19','Test','','2015-04-23','staff1','staff1',NULL,3,26,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(43,'e10adc3949ba59abbe56e057f20f883e','staff2@mail.com','Y','N','2015-04-23 13:03:38','test','','2015-04-23','staff','staff2',NULL,3,26,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(44,'e10adc3949ba59abbe56e057f20f883e','staff3@mail.com','Y','N','2015-04-23 13:58:59','test','M','2000-01-01','staff3','staff3',NULL,3,26,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(45,'e10adc3949ba59abbe56e057f20f883e','staff6@mail.com','Y','N','2015-04-23 02:32:58','test','M','2000-01-01','staff6','staff6',NULL,1,0,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(46,'e10adc3949ba59abbe56e057f20f883e','nithins@newagesmb.com','Y','N','2015-04-23 14:55:03','Test','M','2000-01-01','Nithin','Nithin',NULL,3,26,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(47,'e10adc3949ba59abbe56e057f20f883e','parkcentral@mail.com','Y','N','2015-04-23 15:05:53','Cole','M','0000-00-00','Sam',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2392021'),(48,'e10adc3949ba59abbe56e057f20f883e','john@mail.com','Y','N','2015-04-23 15:11:54','test','M','2015-04-01','john','john',NULL,3,27,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(49,'e10adc3949ba59abbe56e057f20f883e','livin@mail.com','Y','N','2015-04-23 16:26:59','Tester','M','2015-01-01','Livin','Livin',NULL,3,27,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(50,'e10adc3949ba59abbe56e057f20f883e','biju@mail.com','Y','N','2015-04-23 16:49:37','tester','M','2015-04-01','Biju','Biju',NULL,3,27,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(51,'e10adc3949ba59abbe56e057f20f883e','lucia@mail.com','Y','N','2015-04-23 20:07:47','Abraham','M','0000-00-00','Philip',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,3,'N',NULL),(53,'e10adc3949ba59abbe56e057f20f883e','haripriya12@newagesmb.com','Y','N','2015-04-24 07:17:46','christy','F','2015-04-14','dfsdf','dfdsf',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(54,'e10adc3949ba59abbe56e057f20f883e','ajay1213@newagesmb.com','N','N','2015-04-24 07:21:01','christy','F','2015-05-24','geet','ajay',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(55,'e10adc3949ba59abbe56e057f20f883e','ajay@newagesmb.com','Y','N','2015-04-24 07:31:32','christy','M','2015-04-16','ajay','ajay',NULL,3,1,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(56,'e10adc3949ba59abbe56e057f20f883e','mark@mail.com','Y','N','2015-04-24 12:44:50','','M','0000-00-00','mark',NULL,'145562367896',1,0,'2015-04-28 08:45:44','(null)','1430146122.jpg','Nice app for testing','Test testing testing testing testing testing testing testing testing testing testing new test test new test  testing testing testing testing testing testing testing testing testing testing testing testing testing','N',0,0,'Y',NULL),(57,'e10adc3949ba59abbe56e057f20f883e','dghhhj@mail.com','Y','N','2015-04-24 12:50:50','','M','0000-00-00','ccvb gg',NULL,'125666666',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL),(58,'bb1dfaf9772bc84c5c6a652e032a1bb8','anton@newagesmb.com','Y','N','2015-04-24 02:40:14','test','M','0000-00-00','anton',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2393000'),(59,'e10adc3949ba59abbe56e057f20f883e','alexjoseph5367@gmail.com','N','N','2015-04-24 14:52:32','Tester','M','2000-04-01','Alex','alex',NULL,3,29,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(60,'1bd7d6afc25f3b0fc038d017b224250e','johnjoseph536@gmail.com','Y','N','2015-04-24 14:55:47','Joseph','M','2015-04-03','John','john',NULL,3,29,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(61,'7ecde0d1765e26779f63df248ceba276','umesh@newagesmb.com','Y','Y','2015-04-24 15:10:30','test','M','0000-00-00','umesh',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2393017'),(62,'e10adc3949ba59abbe56e057f20f883e','jibin@newagesmb.com','Y','N','2015-04-24 15:14:04','test','M','2015-04-02','jibin','Jibin',NULL,3,30,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(63,'bdaa54d412182a856dc50961a0b57396','galena70@gmail.com','Y','N','2015-04-25 21:27:54','','M','0000-00-00','galena',NULL,'00393387835094',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL),(64,'e10adc3949ba59abbe56e057f20f883e','haripriya@newagesmb.com','Y','N','2015-04-27 10:15:28','M','M','0000-00-00','Reshma',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2394059'),(65,'e10adc3949ba59abbe56e057f20f883e','new@mail.com','Y','N','2015-04-27 11:23:54','','M','0000-00-00','new',NULL,'14567894563',1,0,'2015-04-27 12:01:23',NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(66,'d41d8cd98f00b204e9800998ecf8427e','jibin@mail.com','N','N','2015-04-27 11:01:27','Jibin','M','2015-04-27','Jibin','Jibin',NULL,3,27,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(67,'d41d8cd98f00b204e9800998ecf8427e','mahesh@mail.com','N','N','2015-04-27 11:02:10','test','M','2015-04-27','Mahesh','Mahesh',NULL,3,27,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(68,'d41d8cd98f00b204e9800998ecf8427e','hotel123@inhotel.com','N','N','2015-04-27 11:08:35','test','M','2015-04-16','Jilu','arun',NULL,3,27,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(69,'e10adc3949ba59abbe56e057f20f883e','nila@mail.com','Y','N','2015-04-27 11:12:22','tester','M','0000-00-00','Umesh@mail.com',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,3,'N',NULL),(70,'d41d8cd98f00b204e9800998ecf8427e','hotel13455@inhotel.com','N','N','2015-04-27 11:14:07','R','M','2015-04-02','Jilu','arun',NULL,3,27,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(71,'e10adc3949ba59abbe56e057f20f883e','22mahesh55@gmail.com','Y','N','2015-04-27 11:17:21','tester','M','0000-00-00','mahesh',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2394354'),(72,'e10adc3949ba59abbe56e057f20f883e','umesh@newaagesmb.com','Y','Y','2015-04-27 11:23:47','test','M','0000-00-00','Umesh',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y',NULL),(73,'e10adc3949ba59abbe56e057f20f883e','umesh@newagesmb.com','Y','Y','2015-04-27 11:26:08','test','M','0000-00-00','umesh',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,3,'Y',NULL),(74,'e10adc3949ba59abbe56e057f20f883e','umesh@newaagesmb.com','Y','Y','2015-04-27 11:32:19','test','M','0000-00-00','Umesh',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y',NULL),(75,'e10adc3949ba59abbe56e057f20f883e','test1@mail.com','N','N','2015-04-27 11:35:38','test2','M','2015-04-07','test1','test1',NULL,3,35,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(76,'e10adc3949ba59abbe56e057f20f883e','josephantonnewage@gmail.com','Y','N','2015-04-27 12:29:44','anton','M','2000-04-01','Joseph','joseph',NULL,3,27,NULL,NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(77,'e10adc3949ba59abbe56e057f20f883e','umesh@newagesmb.com','Y','N','2015-04-27 12:32:01','test','M','0000-00-00','Umesh',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y',NULL),(78,'e10adc3949ba59abbe56e057f20f883e','shijil@newagesmb.com','Y','N','2015-04-27 12:53:48','','M','0000-00-00','shijil',NULL,'14567894563',1,0,'2015-04-28 07:18:12',NULL,'1430154943.jpg','Testing for quality and efficiency','Testing in hotel for quality and efficient performance\nTesting for quality','N',0,0,'Y',NULL),(79,'e10adc3949ba59abbe56e057f20f883e','jim@mail.com','Y','N','2015-04-27 13:31:40','','M','0000-00-00','jim',NULL,'14562367896',1,0,'2015-04-27 16:30:43',NULL,'',NULL,NULL,'N',0,0,'Y',NULL),(80,'e10adc3949ba59abbe56e057f20f883e','hotelnew@inhotel.com','Y','N','2015-04-28 05:59:56','john','M','0000-00-00','johny',NULL,NULL,2,0,NULL,NULL,'',NULL,NULL,'N',0,1,'Y','2395314'),(81,'e10adc3949ba59abbe56e057f20f883e','user@mail.com','Y','Y','2015-04-28 06:51:25','','M','0000-00-00','user',NULL,'145678945',1,0,NULL,'','',NULL,NULL,'N',0,0,'Y',NULL),(82,'e10adc3949ba59abbe56e057f20f883e','user@mail.com','Y','N','2015-04-28 06:54:41','','M','0000-00-00','user',NULL,'14567894563',1,0,'2015-04-28 07:24:55',NULL,'1430221144.jpg','','Description','N',0,0,'Y',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `map_access_vecancy`
--

LOCK TABLES `map_access_vecancy` WRITE;
/*!40000 ALTER TABLE `map_access_vecancy` DISABLE KEYS */;
INSERT INTO `map_access_vecancy` VALUES (5,1,1,'2015-04-06 15:54:00'),(6,1,3,'2015-04-06 15:54:00'),(7,NULL,0,'2015-04-24 13:23:50'),(8,NULL,0,'2015-04-24 13:24:14'),(9,NULL,0,'2015-04-24 13:24:15'),(10,NULL,0,'2015-04-24 13:24:20'),(11,NULL,0,'2015-04-24 13:25:09'),(12,NULL,0,'2015-04-24 13:26:26'),(13,NULL,1,'2015-04-24 13:26:44'),(14,NULL,2,'2015-04-24 13:26:44'),(15,NULL,3,'2015-04-24 13:26:44'),(16,NULL,4,'2015-04-24 13:26:44'),(17,NULL,5,'2015-04-24 13:26:44'),(18,NULL,6,'2015-04-24 13:26:44'),(19,NULL,1,'2015-04-24 13:29:18'),(20,NULL,2,'2015-04-24 13:29:18'),(21,NULL,3,'2015-04-24 13:29:18'),(22,NULL,4,'2015-04-24 13:29:18'),(23,NULL,5,'2015-04-24 13:29:18'),(24,NULL,6,'2015-04-24 13:29:18'),(25,NULL,1,'2015-04-24 13:30:19'),(26,NULL,2,'2015-04-24 13:30:19'),(27,NULL,3,'2015-04-24 13:30:19'),(28,NULL,4,'2015-04-24 13:30:19'),(29,NULL,5,'2015-04-24 13:30:19'),(30,NULL,6,'2015-04-24 13:30:19'),(31,NULL,1,'2015-04-24 13:32:26'),(32,NULL,2,'2015-04-24 13:32:26'),(33,NULL,3,'2015-04-24 13:32:26'),(34,NULL,4,'2015-04-24 13:32:26'),(35,NULL,5,'2015-04-24 13:32:27'),(36,NULL,6,'2015-04-24 13:32:27'),(37,NULL,1,'2015-04-24 13:33:57'),(38,NULL,2,'2015-04-24 13:33:57'),(39,NULL,3,'2015-04-24 13:33:57'),(40,NULL,4,'2015-04-24 13:33:57'),(41,NULL,5,'2015-04-24 13:33:57'),(42,NULL,6,'2015-04-24 13:33:57'),(43,NULL,0,'2015-04-24 13:34:59'),(44,NULL,0,'2015-04-24 13:35:00'),(45,NULL,0,'2015-04-24 13:35:07'),(46,NULL,0,'2015-04-24 13:35:21'),(47,NULL,0,'2015-04-24 13:35:41'),(48,NULL,0,'2015-04-24 13:35:46'),(49,NULL,0,'2015-04-24 13:35:54'),(50,NULL,0,'2015-04-24 13:36:06'),(51,NULL,0,'2015-04-24 13:36:07'),(52,NULL,0,'2015-04-24 13:36:10'),(53,NULL,0,'2015-04-24 13:36:24'),(54,NULL,0,'2015-04-24 13:36:36'),(55,NULL,0,'2015-04-27 10:47:54'),(56,NULL,0,'2015-04-27 10:48:40'),(57,NULL,0,'2015-04-27 10:48:42'),(78,43,1,'2015-04-27 13:19:00'),(79,43,2,'2015-04-27 13:19:00'),(80,43,6,'2015-04-27 13:19:00'),(81,43,5,'2015-04-27 13:19:00'),(82,43,4,'2015-04-27 13:19:00'),(83,43,3,'2015-04-27 13:19:00'),(84,48,1,'2015-04-28 07:39:04');
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
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `map_hotel_zone`
--

LOCK TABLES `map_hotel_zone` WRITE;
/*!40000 ALTER TABLE `map_hotel_zone` DISABLE KEYS */;
INSERT INTO `map_hotel_zone` VALUES (2,2,1),(3,5,1),(6,10,1),(7,21,1),(9,22,1),(10,23,1),(11,24,1),(12,25,1),(17,26,1),(18,26,2),(19,26,3),(20,26,4),(21,26,5),(22,26,6),(38,1,1),(39,1,2),(40,1,3),(41,29,1),(42,30,1),(43,31,1),(44,33,1),(51,38,1),(52,38,4),(53,38,5),(54,38,6),(55,27,1),(56,27,2),(57,27,3),(58,27,4);
/*!40000 ALTER TABLE `map_hotel_zone` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membership_packages`
--

LOCK TABLES `membership_packages` WRITE;
/*!40000 ALTER TABLE `membership_packages` DISABLE KEYS */;
INSERT INTO `membership_packages` VALUES (1,'test package 2','fdgdsf',21.00,2,'M','Y'),(3,'test package 1','fgdh',34.00,4,'M','Y');
/*!40000 ALTER TABLE `membership_packages` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_master`
--

LOCK TABLES `order_master` WRITE;
/*!40000 ALTER TABLE `order_master` DISABLE KEYS */;
INSERT INTO `order_master` VALUES (1,1,4,1,5,'2',20.00,1,20.00,'2015-04-01 23:38:37','Y','Y'),(2,1,5,2,4,'4',25.00,3,75.00,'2015-03-31 23:39:13','N','Y');
/*!40000 ALTER TABLE `order_master` ENABLE KEYS */;
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
INSERT INTO `vecancy_reason_list` VALUES (1,'Nature','Y'),(2,'Culture','Y'),(3,'Business Fiera','Y'),(4,'Concert ','Y'),(5,'Sport ','Y'),(6,'Family Vacation. ','Y');
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

-- Dump completed on 2015-04-29  7:41:23
