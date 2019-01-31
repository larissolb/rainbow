-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: rainbow
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.16.04.1

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
-- Table structure for table `Comments`
--

DROP TABLE IF EXISTS `Comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Comments` (
  `idComments` int(11) NOT NULL AUTO_INCREMENT COMMENT '	',
  `Comment` mediumtext NOT NULL,
  `Date` varchar(45) DEFAULT NULL,
  `Users_login` varchar(255) NOT NULL,
  `Pics_id` int(11) NOT NULL,
  PRIMARY KEY (`idComments`,`Users_login`,`Pics_id`),
  KEY `fk_Comments_Users1_idx` (`Users_login`),
  KEY `fk_Comments_Pics1_idx` (`Pics_id`),
  CONSTRAINT `fk_Comments_Pics1` FOREIGN KEY (`Pics_id`) REFERENCES `Pics` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comments_Users1` FOREIGN KEY (`Users_login`) REFERENCES `Users` (`login`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Comments`
--

LOCK TABLES `Comments` WRITE;
/*!40000 ALTER TABLE `Comments` DISABLE KEYS */;
INSERT INTO `Comments` VALUES (1,' test',NULL,'123',4),(2,' so cosmic',NULL,'123',2),(3,' test',NULL,'123',2),(6,' test',NULL,'123',3),(7,' dark..blue..',NULL,'123',4);
/*!40000 ALTER TABLE `Comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pics`
--

DROP TABLE IF EXISTS `Pics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nameBook` varchar(105) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `img_path` varchar(255) NOT NULL,
  `like` int(11) DEFAULT NULL,
  `Themes_id` int(11) NOT NULL,
  `Types_id` int(11) NOT NULL,
  `Users_login` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`Themes_id`,`Types_id`,`Users_login`),
  KEY `fk_Pics_Themes1_idx` (`Themes_id`),
  KEY `fk_Pics_Types1_idx` (`Types_id`),
  KEY `fk_Pics_Users1_idx` (`Users_login`),
  CONSTRAINT `fk_Pics_Themes1` FOREIGN KEY (`Themes_id`) REFERENCES `Themes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pics_Types1` FOREIGN KEY (`Types_id`) REFERENCES `Types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pics_Users1` FOREIGN KEY (`Users_login`) REFERENCES `Users` (`login`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pics`
--

LOCK TABLES `Pics` WRITE;
/*!40000 ALTER TABLE `Pics` DISABLE KEYS */;
INSERT INTO `Pics` VALUES (1,'',NULL,NULL,'default.png',NULL,6,6,'123'),(2,'A story in forest',15,'from my trip in Australia','slide1.jpeg',1,3,5,'123'),(3,'Village',100,'My summer time in village','slide2.jpg',2,6,2,'123'),(4,'Houses',17,'this is my first project','slide3.jpg',4,5,2,'123'),(5,'Birds in winter',14,'Last time I often ask myself where are the winter birds??','slide5.jpg',3,3,3,'123'),(6,'Funny bears',25,'Fantasy about bears','slide.jpg',2,3,3,'123'),(7,'Bridge and Moon',5,'Moon light scenery of bridge with oil pastels','slide4.png',1,1,3,'123');
/*!40000 ALTER TABLE `Pics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Themes`
--

DROP TABLE IF EXISTS `Themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(90) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Themes`
--

LOCK TABLES `Themes` WRITE;
/*!40000 ALTER TABLE `Themes` DISABLE KEYS */;
INSERT INTO `Themes` VALUES (1,'Nature'),(2,'Space'),(3,'Animals'),(4,'Cars'),(5,'Cities'),(6,'Other');
/*!40000 ALTER TABLE `Themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Types`
--

DROP TABLE IF EXISTS `Types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(90) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Types`
--

LOCK TABLES `Types` WRITE;
/*!40000 ALTER TABLE `Types` DISABLE KEYS */;
INSERT INTO `Types` VALUES (1,'colour pens'),(2,'colour pencils'),(3,'paints'),(4,'monochrome'),(5,'markers'),(6,'other');
/*!40000 ALTER TABLE `Types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `login` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `psw` varchar(255) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES ('123','123@123.ru','$2y$10$CJ84MDUuqRKAeRNpD4bT0OWok6cGB3ppYDu3/qjHYGRthilCib55W');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-01  0:35:11
