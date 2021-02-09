CREATE DATABASE  IF NOT EXISTS `heroku_02c9d0b90e9f65b` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `heroku_02c9d0b90e9f65b`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: eu-cdbr-west-03.cleardb.net    Database: heroku_02c9d0b90e9f65b
-- ------------------------------------------------------
-- Server version	5.6.49-log

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
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` varchar(250) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `obra` int(11) NOT NULL,
  `autor` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `com_obr_fk` (`obra`),
  CONSTRAINT `com_obr_fk` FOREIGN KEY (`obra`) REFERENCES `obras` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` VALUES (1,'Comentario para la publicación 1','2021-02-05',1,'lucia mercado'),(11,'hlkjkllk','2021-02-05',1,'lucia mercado');
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direcciones`
--

DROP TABLE IF EXISTS `direcciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `direcciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calle` varchar(60) NOT NULL,
  `numero` varchar(3) NOT NULL,
  `piso` varchar(50) DEFAULT NULL,
  `cod_postal` varchar(6) NOT NULL,
  `latitud` varchar(30) NOT NULL,
  `longitud` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=641 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direcciones`
--

LOCK TABLES `direcciones` WRITE;
/*!40000 ALTER TABLE `direcciones` DISABLE KEYS */;
INSERT INTO `direcciones` VALUES (444,'Calle Portal de Arriaga','60','1A','1010','42.86763','-2.67708'),(451,'Calle Voluntaria Entrega','3','5D','01010','42.865','-2.684'),(461,'Portal de Arriaga','7','5D','01013','42.8608','-2.6748'),(471,'Calle Castillo de Villamonte','2','1I','01007','42.8442','-2.6936'),(481,'Avenida de Zabalgana','5','1D','01015','42.8524','-2.694'),(491,'Avenida de Zabalgana','18','3C','01015','42.8524','-2.694'),(501,'Portal de Arriaga','2','1D','01013','42.8608','-2.6748'),(511,'Calle Pedro Asúa','96','1A','01008','42.8512','-2.6883'),(521,'Calle Valladolid','34','2A','01002','42.8524','-2.66135'),(531,'Calle Valladolid','8','2A','01002','42.8524','-2.66135'),(541,'Calle Francia','12','5a','28802','40.481','-3.38765'),(551,'Calle Madrid','12','8I','01003','42.8586','-2.6618'),(561,'Calle Vitoria','67','5g','02005','39.0008','-1.86851'),(571,'Portal de Arriaga','24','3D','01013','42.8608','-2.6748'),(581,'Calle Andalucía','67','5C','01003','42.8523','-2.65834'),(591,'Calle Duque de Wellington','6','7C','01010','42.86','-2.6926'),(601,'Avenida de Zabalgana','5','4D','01015','42.8524','-2.694'),(611,'Calle Santa María Josefa del Corazón de Jesús','30','12a','01008','42.8469','-2.6934'),(621,'Calle Santa María Josefa del Corazón de Jesús','45','2a','01008','42.8469','-2.6934'),(631,'Portal de Arriaga','3','4D','01013','42.8608','-2.6748');
/*!40000 ALTER TABLE `direcciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'Solicitada'),(2,'Aceptada'),(3,'En proceso'),(4,'Finalizada'),(5,'Denegada');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estructuras`
--

DROP TABLE IF EXISTS `estructuras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estructuras` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estructuras`
--

LOCK TABLES `estructuras` WRITE;
/*!40000 ALTER TABLE `estructuras` DISABLE KEYS */;
INSERT INTO `estructuras` VALUES (1,'piso'),(2,'casa'),(3,'local'),(4,'garaje'),(5,'trastero'),(6,'edificio');
/*!40000 ALTER TABLE `estructuras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obras`
--

DROP TABLE IF EXISTS `obras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `obras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_estructura` int(11) NOT NULL,
  `tipo_obra` int(11) NOT NULL,
  `direccion` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `plano` varchar(100) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `solicitante` varchar(9) NOT NULL,
  `tecnico` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `obr_sol_fk` (`solicitante`),
  KEY `obr_tec_fk` (`tecnico`),
  KEY `obr_est_fk` (`tipo_estructura`),
  KEY `obr_tipobr_fk` (`tipo_obra`),
  KEY `obr_estado_fk` (`estado`),
  CONSTRAINT `obr_est_fk` FOREIGN KEY (`tipo_estructura`) REFERENCES `estructuras` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `obr_estado_fk` FOREIGN KEY (`estado`) REFERENCES `estados` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `obr_sol_fk` FOREIGN KEY (`solicitante`) REFERENCES `personas` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `obr_tec_fk` FOREIGN KEY (`tecnico`) REFERENCES `personas` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `obr_tipobr_fk` FOREIGN KEY (`tipo_obra`) REFERENCES `tipos_obra` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obras`
--

LOCK TABLES `obras` WRITE;
/*!40000 ALTER TABLE `obras` DISABLE KEYS */;
INSERT INTO `obras` VALUES (1,1,2,491,'2021-02-05','2021-02-05','adaptación para persona con movilidad reducida',NULL,4,'12345678N','12345678L'),(31,4,3,531,NULL,NULL,'urgente','31.jpg',1,'78865708G','12345678L'),(41,1,2,541,NULL,NULL,'reforma plis','41.pdf',1,'78865708G','12345678L'),(51,1,1,551,NULL,NULL,'Reforma de la cocina','51.pdf',1,'78865708G','12345678L'),(61,6,3,561,'2021-02-05','2021-02-05','prueba',NULL,5,'78865708G','12345678L'),(71,1,2,571,'2021-02-05',NULL,'Reforma de la cocina',NULL,2,'12345678N','12345678L'),(81,1,1,581,NULL,NULL,'entero',NULL,1,'78865708G','12345678L'),(91,2,2,611,NULL,NULL,'reforma',NULL,1,'12345678F',NULL),(101,4,3,621,NULL,NULL,'demolicion','101.pdf',1,'12345678F',NULL);
/*!40000 ALTER TABLE `obras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (0,'Coordinador'),(1,'Tecnico'),(2,'Usuario');
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personas` (
  `id` varchar(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `pais_nacimiento` varchar(30) NOT NULL,
  `direccion` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `rol` int(11) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `per_dir_fk` (`direccion`),
  KEY `per_rol_fk` (`rol`),
  CONSTRAINT `per_dir_fk` FOREIGN KEY (`direccion`) REFERENCES `direcciones` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `per_rol_fk` FOREIGN KEY (`rol`) REFERENCES `permisos` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES ('12345678F','ivan','villagra','1994-09-12','España',601,'ivan.villagra@ikasle.egibide.org','673733192',2,'$2y$10$DLItX01RNIxwzmwaBugCSu/GnLOIIptjAdq5NJGMTXlxTPXeHvzuS'),('12345678L','lucia','mercado','2021-02-01','Bolivia',461,'luciasara.mercado@ikasle.egibide.org','991199119',1,'$2y$10$6GocXqfEpqk/9mDC.4kyReF.UGktK4Ongj2m5NAZgXTrZqJ6UFuSC'),('12345678M','Mario','Zaton','2001-08-05','España',591,'mario@gmail.com','987654321',1,'$2y$10$nrvTQ/fxVuxm0ZNffWyJ8uq/YAZvY5hmr7C/QxJeuvFtbsk.g2QP6'),('12345678N','nury','cortez','1977-04-25','Bolivia',481,'nury@gmail.com','674726831',2,'$2y$10$BfUAR0TaCjN9ICvrOW2xLOeiAHp45EFcdFtYEOK0bJAy9MeBBJhFS'),('12345678V','pedro','vadillo','2006-05-05','España',631,'pedro@gmail.com','987654321',1,'$2y$10$6TybNKdjuESQ6tW/HUFGGuE0evUsv7XaEyfFRb7U1PofJZB2bhqXe'),('78865708G','Julen','Villar','1996-02-22','España',521,'Jvillar@gmail.example','652483620',2,'$2y$10$w9V12OfLyRHEyw4edGKvF.gBBX0e6qeCDr.cWPGEPEDqkkdNTw6Vi'),('98765432F','juan','da silva','2021-02-01','venezuela',451,'juanfrancisco.dasilva@ikasle.egibide.org','618702971',0,'$2y$10$n7XzZcbiONH6iOXudk0rKedLdFEqenwWvUagyn5S1hFJj41D6QShu');
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipos_obra`
--

DROP TABLE IF EXISTS `tipos_obra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipos_obra` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipos_obra`
--

LOCK TABLES `tipos_obra` WRITE;
/*!40000 ALTER TABLE `tipos_obra` DISABLE KEYS */;
INSERT INTO `tipos_obra` VALUES (1,'construccion'),(2,'reforma'),(3,'demolicion');
/*!40000 ALTER TABLE `tipos_obra` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-09  8:39:20
