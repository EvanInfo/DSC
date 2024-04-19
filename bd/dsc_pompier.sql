-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dsc
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `pompier`
--

DROP TABLE IF EXISTS `pompier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pompier` (
  `Matricule` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prénom` varchar(255) DEFAULT NULL,
  `DateNaiss` date DEFAULT NULL,
  `Tel` varchar(20) DEFAULT NULL,
  `Sexe` varchar(10) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Matricule`),
  KEY `id` (`id`),
  CONSTRAINT `pompier_ibfk_1` FOREIGN KEY (`id`) REFERENCES `grade` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pompier`
--

LOCK TABLES `pompier` WRITE;
/*!40000 ALTER TABLE `pompier` DISABLE KEYS */;
INSERT INTO `pompier` VALUES (111111,'Zucchiatti','Evan','2000-02-25','0620063342','masculin',13),(123456,'SQZ','SZSZS','2022-10-08','2147483647','féminin',2),(456152,'Lennon','John','2005-01-19','0620063342','masculin',11),(459818,'Skywalker','Luke','1977-10-19','0458485144','masculin',12),(654352,'Clette','lara','1987-03-11','642786352','féminin',3),(782312,'Esur','janette','1982-02-11','627371273','féminin',3),(786572,'Abri','gauthier','1972-05-12','676542532','masculin',10),(789456,'Disney','Walt','2000-05-18','0620063342','masculin',3),(876543,'TEST','TEST','2022-10-18','872615253','masculin',2),(887769,'Etaitsur','syLVain','2022-09-30','676256352','masculin',11),(887799,'Inion','sébastien','2022-09-30','676256352','masculin',11),(898989,'Douard','JEAN','1986-09-15','676256352','masculin',9),(920372,'Lutin','Michel','2022-09-30','676256352','masculin',1),(920379,'Quenouille','Marc','2022-09-30','676256352','masculin',1),(982726,'Milou','Tintin','1970-10-10','99878998','masculin',10),(986995,'Dumontel','Robert','1969-10-10','298568542','masculin',11),(992312,'Balle','Jean','1982-07-12','678652354','masculin',2);
/*!40000 ALTER TABLE `pompier` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-19 17:08:29
