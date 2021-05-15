-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: alumni_tracker
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

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
-- Table structure for table `contact_details`
--

DROP TABLE IF EXISTS `contact_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_details` (
  `user_id` int NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email_id` varchar(64) DEFAULT NULL,
  `github` varchar(64) DEFAULT NULL,
  `linkedin` varchar(64) DEFAULT NULL,
  KEY `contact_details_ibfk_1` (`user_id`),
  CONSTRAINT `contact_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_details`
--

LOCK TABLES `contact_details` WRITE;
/*!40000 ALTER TABLE `contact_details` DISABLE KEYS */;
INSERT INTO `contact_details` VALUES (635241,'7584112654','hafna@gmail.com',NULL,NULL),(784563,'7845632375','hemanth@gmail.com','https://github.com/hemanth-07-11','https://www.linkedin.com/in/hemanth-n-2001/'),(152452,'9056234586','mithesh@gmail.com','https://github.com/Mithesh14',NULL),(789621,'9080446325','yogee@gmail.com','https://github.com/yogeeswar2001',NULL),(123036,'9585111654','abcd@gmail.com','https://github.com/abcd','http://linkedin.com/in/abcd'),(352563,'9632558425','rubakpreyan@gmail.com','https://github.com/Rubakpreyan',NULL);
/*!40000 ALTER TABLE `contact_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interest`
--

DROP TABLE IF EXISTS `interest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `interest` (
  `user_id` int NOT NULL,
  `interest` varchar(32) NOT NULL,
  PRIMARY KEY (`user_id`,`interest`),
  CONSTRAINT `interest_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interest`
--

LOCK TABLES `interest` WRITE;
/*!40000 ALTER TABLE `interest` DISABLE KEYS */;
INSERT INTO `interest` VALUES (123036,'Database Design'),(123036,'Java'),(152452,'CSS'),(152452,'Data Mining'),(352563,'MERN'),(352563,'Tailwind'),(635241,'Javascript'),(635241,'Web Development'),(784563,'Competitive coding'),(784563,'Database Design'),(784563,'MERN'),(789621,'Automation'),(789621,'Competitive coding'),(789621,'Java');
/*!40000 ALTER TABLE `interest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `sender_id` int NOT NULL,
  `reciver_id` int NOT NULL,
  `msg` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sender_flag` int DEFAULT '1',
  `reciver_flag` int DEFAULT '1',
  PRIMARY KEY (`sender_id`,`reciver_id`,`time`,`msg`),
  KEY `reciver_id` (`reciver_id`),
  CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`reciver_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (152452,635241,'Hi hafna','2021-05-13 19:55:07',1,1),(352563,784563,'Hi Hemanth','2021-05-13 19:53:39',1,1),(352563,784563,'Bye Hemanth','2021-05-13 21:54:48',1,1),(352563,784563,'ok','2021-05-14 00:07:15',1,1),(635241,152452,'Bye Mithesh','2021-05-13 21:55:41',1,1),(784563,152452,'Hi Sample text testing','2021-05-13 21:07:30',1,1),(784563,352563,'Hi rubak','2021-05-13 18:58:40',1,1),(784563,352563,'Bye rubak','2021-05-13 20:54:28',1,1),(784563,352563,'Okay','2021-05-13 23:04:54',1,1),(784563,789621,'Good Morning ','2021-05-13 22:56:22',1,1),(789621,784563,'Hi Hemanth','2021-05-13 20:55:58',1,1);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `post` varchar(2048) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16213 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (10761,784563,'This is Hemanth.','Name'),(12925,789621,'Loading...','Status'),(13245,352563,'The future belongs to those who prepare for it today','Quote'),(13562,152452,'Stupid is as stupid does.','Joke'),(15625,635241,'Meh','Jobs'),(16212,789621,'Follow me on Github: https://github.com/yogeeswar2001','Follow');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `username` varchar(32) NOT NULL,
  `roll_no` int DEFAULT NULL,
  `pwd` varchar(32) NOT NULL,
  `yop` int DEFAULT NULL,
  `company` varchar(64) DEFAULT NULL,
  `designation` varchar(32) DEFAULT NULL,
  `location` varchar(64) DEFAULT NULL,
  `is_active` int NOT NULL DEFAULT '0',
  `Department` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (123036,'ABCD',101,'ABCD',2018,'Amazon','Jnr SDE','Banglore',0,'CSE','1996-06-01'),(152452,'mithesh',100,'mithesh',2016,'Facebook','Software Engineer','Mumbai',1,'IT','1994-01-27'),(173417,'Hemanth',144,'Hemanth',2021,'SELF','SDE','Chennai',0,'CSE','1996-06-01'),(352563,'rubak',123,'rubak',2017,'Google','SDE','Chennai',0,'ECE','1995-08-23'),(635241,'hafna',105,'hafna',2016,'Facebook','Interface Designer','Chennai',0,'CSE','1994-04-11'),(784563,'hems',107,'hems',2023,NULL,NULL,NULL,1,'IT','2001-11-07'),(789621,'yogee',110,'yogee',2019,'Amazon','Database Admin','Mumbai',0,'CSE','1997-05-10');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `delete_account` BEFORE DELETE ON `users` FOR EACH ROW BEGIN
delete from contact_details where user_id = OLD.user_id;
delete from post where user_id = OLD.user_id;
delete from interest where user_id = OLD.user_id;
delete from messages where sender_id = OLD.user_id or reciver_id = OLD.user_id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping routines for database 'alumni_tracker'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-16  2:27:00
