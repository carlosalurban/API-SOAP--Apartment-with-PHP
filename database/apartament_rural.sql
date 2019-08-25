-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: apartament_rural
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB

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
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `cognom1` varchar(20) NOT NULL,
  /*`cognom2` varchar(20) NOT NULL,*/
  `correu` varchar(70) DEFAULT NULL,
  `telefon` varchar(50) NOT NULL,
  PRIMARY KEY (`id_client`),
  UNIQUE KEY `telefon` (`telefon`),
  UNIQUE KEY `telefon_2` (`telefon`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (11,'Juan','Martinez','Lopez','juanmartinez@gmail.com','666666666'),(12,'Ingrid','Suarez','Garcia','ing@msn.com','111111111'),(13,'Daniel','Robles','Fuertes','fuertes@gmail.com','222222222'),(14,'Laura','Roques','Robusta','lau@gmail.com','123456789'),(15,'Perico','Palotes','Blandos','perico@gmail.com','987654321'),(16,'Carlos','Alvarez','Urbano','carlos@gmail.com','666999666'),(18,'Alberto','Fernandez','Fernandez','fernandez@gmail.com','192837465'),(25,'Julian','Mateo','Fernandez','fernandez@gmail.com','000000000');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserves`
--

DROP TABLE IF EXISTS `reserves`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserves` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `entrada` date NOT NULL,
  `sortida` date NOT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `fk_reserves_clients` (`id_client`),
  CONSTRAINT `fk_reserves_clients` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserves`
--

LOCK TABLES `reserves` WRITE;
/*!40000 ALTER TABLE `reserves` DISABLE KEYS */;
INSERT INTO `reserves` VALUES (1,11,'2019-08-14','2019-08-23'),(2,12,'2019-09-09','2019-09-10'),(3,13,'2019-07-01','2019-07-15'),(4,14,'2019-07-15','2019-07-19'),(5,15,'2019-11-12','2019-12-10'),(17,16,'2019-08-14','2019-08-18'),(18,16,'2019-08-14','2019-08-18'),(23,18,'2019-06-30','2019-07-11'),(24,18,'2019-06-30','2019-07-11'),(25,18,'2019-06-30','2019-07-11'),(26,25,'2019-06-12','2019-06-30'),(27,25,'2019-06-12','2019-06-30'),(28,25,'2019-06-12','2019-06-30'),(29,25,'2019-07-25','2019-08-28'),(30,25,'2019-09-21','2019-12-27'),(31,25,'2019-09-21','2019-12-27'),(32,25,'2019-09-21','2019-12-27'),(33,18,'2019-06-29','2019-07-14'),(34,11,'2019-11-22','2019-12-26');
/*!40000 ALTER TABLE `reserves` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-28 14:23:43
