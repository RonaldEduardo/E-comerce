# Host: localhost  (Version 5.5.29)
# Date: 2022-10-11 08:52:08
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "categorias"
#

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `CodCategoria` int(5) NOT NULL AUTO_INCREMENT,
  `Descricao` char(30) DEFAULT NULL,
  PRIMARY KEY (`CodCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

#
# Data for table "categorias"
#

INSERT INTO `categorias` VALUES (1,'Limpeza'),(2,'Vestuário'),(3,'Açougue'),(4,'Padaria'),(5,'Frios');

#
# Structure for table "clientes"
#

DROP TABLE IF EXISTS `clientes`;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "clientes"
#

INSERT INTO `clientes` VALUES (1,'Eric Ribeiro','Pato Branco','PR','ericribeirops1@gmail.com','admin','123456',1),(2,'Raysson Ribeiro','Pato Branco','PR','raysson@gmail.com','RayssonAdm','Rayssonadm',1),(3,'Kayky Mendes','Pato Branco','PR','kayky@gmail.com','kayky','kayky',1),(4,'Thanity','Pato Branco','PR','thanity@gmail.com','thanity','thanity',1),(5,'Felipe','Pato Branco','PR','felipe@gmail.com','felipe','felipe',1),(6,'Kayky','Pato Branco','PR','kayky@gmail.com','kayky','kayky',1),(7,'Marcia','Porto Alegre','RS','marcia@gmail.com','marcia','marcia',1);

#
# Structure for table "produtos"
#

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `CodProduto` int(5) NOT NULL AUTO_INCREMENT,
  `Nome` char(50) DEFAULT NULL,
  `valor` float(4,2) DEFAULT NULL,
  `Categoria` int(5) DEFAULT NULL,
  PRIMARY KEY (`CodProduto`),
  KEY `FK_categoria` (`Categoria`),
  CONSTRAINT `FK_categoria` FOREIGN KEY (`Categoria`) REFERENCES `categorias` (`CodCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "produtos"
#

INSERT INTO `produtos` VALUES (1,'pão amarelinho',2.20,4),(2,'qBoa',8.65,1),(3,'Tilápia',30.00,5);
