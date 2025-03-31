CREATE DATABASE  IF NOT EXISTS `proyecto_ldr` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */;
USE `proyecto_ldr`;
-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: proyecto_ldr
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
-- Table structure for table `archivos`
--

DROP TABLE IF EXISTS `archivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `archivos` (
  `id_archivo` int(11) NOT NULL AUTO_INCREMENT,
  `id_carpeta` int(11) DEFAULT NULL,
  `id_tipo_archivo` int(11) DEFAULT NULL,
  `archivo_nombre` varchar(50) DEFAULT NULL,
  `archivo_ruta` varchar(90) DEFAULT NULL,
  `archivo_fecha_creacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_archivo`),
  KEY `id_carpeta` (`id_carpeta`),
  KEY `id_tipo_archivo` (`id_tipo_archivo`),
  CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`id_carpeta`) REFERENCES `carpetas` (`id_carpeta`),
  CONSTRAINT `archivos_ibfk_2` FOREIGN KEY (`id_tipo_archivo`) REFERENCES `tipo_archivo` (`id_tipo_archivo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivos`
--

LOCK TABLES `archivos` WRITE;
/*!40000 ALTER TABLE `archivos` DISABLE KEYS */;
INSERT INTO `archivos` VALUES (7,10,1,'Bibliog000rafí___a.docx','recursos/1/2/8/prueba/Bibliografía.docx','2025-03-29 02:04:48');
/*!40000 ALTER TABLE `archivos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-03-31 14:55:17
