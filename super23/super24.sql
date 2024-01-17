-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: banco
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

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
-- Table structure for table `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrinho` (
  `CodCarrinho` int(11) NOT NULL AUTO_INCREMENT,
  `CodCliente` int(11) DEFAULT NULL,
  `CodProduto` int(11) DEFAULT NULL,
  PRIMARY KEY (`CodCarrinho`),
  KEY `CodCliente` (`CodCliente`),
  KEY `CodProduto` (`CodProduto`),
  CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`CodCliente`) REFERENCES `clientes` (`CodCliente`),
  CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`CodProduto`) REFERENCES `produtos` (`CodProduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrinho`
--

LOCK TABLES `carrinho` WRITE;
/*!40000 ALTER TABLE `carrinho` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrinho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorias` (
  `CodCategoria` int(5) NOT NULL AUTO_INCREMENT,
  `Descricao` char(30) DEFAULT NULL,
  PRIMARY KEY (`CodCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Limpeza'),(2,'Vestuário'),(3,'Açougue'),(4,'Padaria'),(5,'Frios');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `CodCliente` int(5) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(50) DEFAULT NULL,
  `Cidade` varchar(50) DEFAULT NULL,
  `Estado` char(2) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Login` varchar(20) DEFAULT NULL,
  `Senha` varchar(20) DEFAULT NULL,
  `Validado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`CodCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Eric Ribeiro','Pato Branco','SP','ericribeirops1@gmail.com','admin','123456',0),(2,'Raysson Ribeiro','Pato Branco','PR','raysson@gmail.com','RayssonAdm','Rayssonadm',0),(4,'Thanity','Pato Branco','PR','thanity@gmail.com','thanity','thanity',1),(5,'Felipe','Pato Branco','PR','felipe@gmail.com','felipe','felipe',1),(9,'ronald','Pato Branco','PR','ronald29eduardo@gmail.com','ronald','ronald',0),(10,'kamille','Tijucas','SC','kamilleperes21@gmai.com','kami','amordamae',0),(11,'João Silva','São Paulo','SP','joao.silva@example.com','joaosilva','senha123',NULL),(12,'Maria Oliveira','Rio de Janeiro','RJ','maria.oliveira@example.com','maria123','abc456',NULL),(13,'Carlos Santos','Belo Horizonte','MG','carlos.santos@example.com','carlos456','qwerty789',NULL),(14,'Ana Souza','Porto Alegre','RS','ana.souza@example.com','ana789','pass123',NULL),(15,'Fernando Pereira','Curitiba','PR','fernando.pereira@example.com','fernando','mysecret',NULL),(16,'Amanda Lima','Salvador','BA','amanda.lima@example.com','amanda456','securepass',NULL),(17,'Roberto Almeida','Fortaleza','CE','roberto@example.com','roberto123','ilovecoding',NULL),(18,'Juliana Costa','Recife','PE','juliana@example.com','juliana789','webdev2023',NULL),(19,'Lucas Ferreira','Manaus','AM','lucas@example.com','lucas456','phprocks',NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compras` (
  `CodCompra` int(11) NOT NULL AUTO_INCREMENT,
  `DataCompra` date DEFAULT NULL,
  `ValorTotal` decimal(10,2) DEFAULT NULL,
  `CodCliente` int(11) NOT NULL,
  `CodCarrinho` int(11) DEFAULT NULL,
  `CodProduto` int(11) DEFAULT NULL,
  `Quantidade` int(11) DEFAULT NULL,
  `HoraCompra` time DEFAULT NULL,
  PRIMARY KEY (`CodCompra`),
  KEY `CodCliente` (`CodCliente`),
  CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`CodCliente`) REFERENCES `clientes` (`CodCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` VALUES (1,'2023-11-20',2.10,9,NULL,6,1,'07:57:59'),(2,'2023-11-20',29.40,9,NULL,6,14,'08:10:57');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtos` (
  `CodProduto` int(5) NOT NULL AUTO_INCREMENT,
  `Nome` char(50) DEFAULT NULL,
  `valor` float(4,2) DEFAULT NULL,
  `Categoria` int(5) DEFAULT NULL,
  `imagem` varchar(255) NOT NULL,
  PRIMARY KEY (`CodProduto`),
  KEY `FK_categoria` (`Categoria`),
  CONSTRAINT `FK_categoria` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`CodCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (6,'Leite',2.10,5,'../img/transferir.jpg'),(7,'Detergente',2.00,1,'../img/transferir (1).jpg'),(8,'Pão',1.60,4,'../img/transferir (2).jpg'),(22,'QBoa',4.00,1,'../img/transferir (3).jpg'),(27,'Café',15.50,4,'../img/Certificado_Ronald-Eduardo-Toledo-Gustmann.png');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'banco'
--

--
-- Dumping routines for database 'banco'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-17 13:44:19
