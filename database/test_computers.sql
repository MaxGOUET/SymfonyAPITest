-- MySQL dump 10.13  Distrib 8.0.44, for Win64 (x86_64)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `computers`
--

DROP TABLE IF EXISTS `computers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `computers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpu_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_241951713917014` (`cpu_id`),
  CONSTRAINT `FK_241951713917014` FOREIGN KEY (`cpu_id`) REFERENCES `cpu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `computers`
--

LOCK TABLES `computers` WRITE;
/*!40000 ALTER TABLE `computers` DISABLE KEYS */;
INSERT INTO `computers` VALUES (1,'HP','EliteBook',5),(2,'Dell','XPS 13',9),(3,'Lenovo','ThinkPad X1 Carbon',2),(4,'Acer','Nitro 5',6),(5,'Dell','Inspiron 16',6),(6,'Lenovo','IdeaPad 3',7),(7,'HP','OMEN 15',4),(8,'HP','Spectre x360',2),(9,'HP','Spectre x360',2),(10,'Dell','Inspiron 16',1),(11,'HP','EliteBook',9),(12,'Acer','Nitro 5',6),(13,'HP','Spectre x360',2),(14,'Dell','XPS 15',1),(15,'HP','Pavilion 17',6),(16,'Lenovo','IdeaPad 3',6),(17,'Lenovo','ThinkPad E14',8),(18,'HP','Pavilion 15',6),(19,'HP','Pavilion 15',1),(20,'HP','Spectre x360',6),(21,'Acer','Aspire 5',1),(22,'Lenovo','IdeaPad 3',4),(23,'HP','Spectre x360',4),(24,'HP','OMEN 15',9),(25,'Lenovo','ThinkPad E14',8),(26,'Dell','Inspiron 15',2),(27,'Dell','XPS 13',2),(28,'Lenovo','ThinkPad E14',9),(29,'Dell','Precision 5680',8),(30,'HP','Pavilion 17',10),(31,'HP','Pavilion 15',8),(32,'Acer','Nitro 5',3),(33,'Acer','Aspire 5',9),(34,'Acer','Predator Triton',4),(35,'HP','Pavilion 17',1),(36,'Dell','Precision 5680',8),(37,'Dell','XPS 13',6),(38,'HP','OMEN 15',10),(39,'HP','Pavilion 15',8),(40,'Dell','Inspiron 15',10),(41,'Dell','Precision 5680',10),(42,'Dell','XPS 13',8),(43,'Lenovo','ThinkPad E14',3),(44,'HP','OMEN 15',1),(45,'HP','Spectre x360',3),(46,'Lenovo','Yoga 9',8),(47,'HP','OMEN 15',6),(48,'Dell','XPS 15',7),(49,'HP','Pavilion 17',1),(50,'Lenovo','ThinkPad X1 Carbon',8),(51,'Acer','Swift 3',7),(52,'Dell','Precision 5680',2),(53,'HP','Spectre x360',1),(54,'Dell','XPS 15',3),(55,'Lenovo','IdeaPad 5 Pro',5),(56,'Acer','TravelMate B114',1),(57,'Dell','Inspiron 15',9),(58,'HP','Pavilion 17',5),(59,'Lenovo','ThinkPad X1 Carbon',7),(60,'HP','OMEN 15',4),(61,'Lenovo','Yoga 9',6),(62,'Acer','Predator Triton',7),(63,'Lenovo','ThinkPad X1 Carbon',1),(64,'Dell','XPS 13',10),(65,'Lenovo','IdeaPad 5 Pro',1),(66,'Acer','Aspire 5',9),(67,'HP','Spectre x360',10),(68,'Dell','Inspiron 15',9),(69,'Dell','XPS 15',2),(70,'Acer','Aspire 5',10),(71,'Acer','Nitro 5',3),(72,'Acer','Aspire 5',9),(73,'Lenovo','ThinkPad E14',9),(74,'Acer','Swift 3',4),(75,'Dell','XPS 13',7),(76,'Acer','TravelMate B114',10),(77,'Dell','Precision 5680',6),(78,'HP','Spectre x360',7),(79,'HP','Spectre x360',7),(80,'HP','OMEN 15',7),(81,'Acer','Nitro 5',10),(82,'Lenovo','ThinkPad X1 Carbon',3),(83,'Dell','Inspiron 16',7),(84,'HP','Pavilion 17',7),(85,'Lenovo','IdeaPad 3',4),(86,'Dell','Inspiron 15',8),(87,'Lenovo','ThinkPad X1 Carbon',5),(88,'Dell','XPS 13',3),(89,'HP','OMEN 15',4),(90,'HP','OMEN 15',8),(91,'Dell','Inspiron 15',2),(92,'Dell','XPS 13',6),(93,'HP','EliteBook',6),(94,'Lenovo','ThinkPad E14',9),(95,'Dell','Inspiron 15',9),(96,'Acer','TravelMate B114',10),(97,'HP','Pavilion 15',6),(98,'Acer','Aspire 5',8),(99,'HP','OMEN 15',3),(100,'Dell','Inspiron 15',1),(101,'dell','xperion',5);
/*!40000 ALTER TABLE `computers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-02-17 14:45:27
