-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: donation_app
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `donationproof`
--

DROP TABLE IF EXISTS `donationproof`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donationproof` (
  `donorName` varchar(255) NOT NULL,
  `photoproof` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donationproof`
--

LOCK TABLES `donationproof` WRITE;
/*!40000 ALTER TABLE `donationproof` DISABLE KEYS */;
INSERT INTO `donationproof` VALUES ('John Doe','John Doe '),('John Doe','John Doe '),('John Doe','John Doe '),('John Doe','John Doe '),('John Doe','John Doe ');
/*!40000 ALTER TABLE `donationproof` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donors`
--

DROP TABLE IF EXISTS `donors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donors` (
  `donation_id` varchar(255) NOT NULL,
  `donorName` varchar(255) NOT NULL,
  `donorEmail` varchar(255) NOT NULL,
  `foodDesc` text NOT NULL,
  `foodQuantity` int(12) NOT NULL,
  `expiryDate` datetime(6) NOT NULL,
  `donation_date` datetime(6) NOT NULL,
  `receivername` varchar(255) NOT NULL DEFAULT 'None',
  `status` varchar(255) NOT NULL DEFAULT 'New',
  PRIMARY KEY (`donation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donors`
--

LOCK TABLES `donors` WRITE;
/*!40000 ALTER TABLE `donors` DISABLE KEYS */;
INSERT INTO `donors` VALUES ('1010243043','John Doe','chriskameni25@gmail.com','Pizza',125,'2023-05-07 14:19:00.000000','2027-04-23 02:19:00.000000','None','New'),('1158783135','John Doe','chriskameni25@gmail.com','Sphagettis',250,'2023-05-06 07:45:00.000000','2028-04-23 07:46:00.000000','None','New'),('1407799357','John Doe','chriskameni25@gmail.com','Tangerine',125,'2023-05-03 07:57:00.000000','2028-04-23 07:57:00.000000','None','New');
/*!40000 ALTER TABLE `donors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT 'receiver',
  `longitude` float DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Daniel','55197144','Ebene','ndabosed@gmail.com','$2y$10$Yj9G6hEY/OdQplGGyuJ1U.vdymF4AfAaRp./RriJtooM6ysI5Qmo6','donor',57.4877,-20.2425),(3,'Ange Sepdeu','55197145','Awae Escalier','chriskameni25@gmail.com','$2y$10$xAo4zt9Bqc3X9h5JgGz6penAq0DMNdl6AUIDFFxpOAiLE5jo5eQLq','donor',0,0);
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

-- Dump completed on 2023-04-28 23:20:09
