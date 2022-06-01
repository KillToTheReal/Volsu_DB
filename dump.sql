CREATE DATABASE  IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mydb`;
-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `idclients` int NOT NULL AUTO_INCREMENT,
  `clientname` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `client_mail` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`idclients`),
  UNIQUE KEY `idclients_UNIQUE` (`idclients`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'KillToTheReal','123@mail.com'),(2,'zcxzx','123zxc@gmail.com'),(3,'Name','Mail.mail@mail.ru'),(12,'123z','123@mail.ru'),(13,'xczc','123@gmail.com'),(14,'1233','zxc@zxc.com');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `income`
--

DROP TABLE IF EXISTS `income`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `income` (
  `invoice_id` int NOT NULL AUTO_INCREMENT,
  `item_id` int NOT NULL,
  `amount` int DEFAULT NULL,
  `supplier_id` int NOT NULL,
  `date_sup` date DEFAULT NULL,
  `price_sup` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`invoice_id`),
  UNIQUE KEY `invoice_id_UNIQUE` (`invoice_id`),
  KEY `item_id_in_idx` (`item_id`),
  KEY `sup_id_idx` (`supplier_id`),
  CONSTRAINT `income_FK` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`idsuppliers`),
  CONSTRAINT `item_id_in` FOREIGN KEY (`item_id`) REFERENCES `storage` (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `income`
--

LOCK TABLES `income` WRITE;
/*!40000 ALTER TABLE `income` DISABLE KEYS */;
INSERT INTO `income` VALUES (1,2,100,2,'2010-10-05','200'),(2,3,200,3,'2016-05-26','200');
/*!40000 ALTER TABLE `income` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outcome`
--

DROP TABLE IF EXISTS `outcome`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `outcome` (
  `check_id` int NOT NULL AUTO_INCREMENT,
  `item_id` int NOT NULL,
  `amount` int NOT NULL,
  `client_id` int DEFAULT NULL,
  `price_out` varchar(45) DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  PRIMARY KEY (`check_id`),
  UNIQUE KEY `check_id_UNIQUE` (`check_id`),
  KEY `item_id_out_idx` (`item_id`),
  KEY `client_id_idx` (`client_id`),
  CONSTRAINT `item_id_out` FOREIGN KEY (`item_id`) REFERENCES `storage` (`item_id`),
  CONSTRAINT `outcome_FK` FOREIGN KEY (`client_id`) REFERENCES `clients` (`idclients`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outcome`
--

LOCK TABLES `outcome` WRITE;
/*!40000 ALTER TABLE `outcome` DISABLE KEYS */;
INSERT INTO `outcome` VALUES (1,1,200,1,'15000','2012-05-20'),(2,3,100,13,'2000','2024-03-12'),(3,5,200,3,'200','2013-05-15'),(4,4,12,13,'123','2012-12-23');
/*!40000 ALTER TABLE `outcome` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `storage`
--

DROP TABLE IF EXISTS `storage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `storage` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(45) NOT NULL,
  `amount` int NOT NULL,
  `current_price` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`item_id`),
  UNIQUE KEY `item_id_UNIQUE` (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `storage`
--

LOCK TABLES `storage` WRITE;
/*!40000 ALTER TABLE `storage` DISABLE KEYS */;
INSERT INTO `storage` VALUES (1,'Pencilsz',1123,'9632'),(2,'Paper',200,'600'),(3,'Boxes',123,'123'),(4,'Name',20,'200'),(5,'Inflatable Dicks',12,'500');
/*!40000 ALTER TABLE `storage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suppliers` (
  `idsuppliers` int NOT NULL AUTO_INCREMENT,
  `suppliername` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `suppliermail` varchar(100) NOT NULL,
  PRIMARY KEY (`idsuppliers`),
  UNIQUE KEY `idsuppliers_UNIQUE` (`idsuppliers`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,'zxc','zxczxc'),(2,'123','123@mail.ru'),(3,'123vzxc','123zxc@gmail.com'),(5,'Supplierzxc','mail@gmail.com');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@mail.ru','202cb962ac59075b964b07152d234b70',1),(2,'newuser@mail.com','ecb97ffafc1798cd2f67fcbc37226761',0),(4,'user@user.com','d41d8cd98f00b204e9800998ecf8427e',0),(5,'12123@gmail.com','202cb962ac59075b964b07152d234b70',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'mydb'
--

--
-- Dumping routines for database 'mydb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-01 20:20:24
