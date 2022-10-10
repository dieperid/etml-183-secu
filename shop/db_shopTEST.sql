-- Adminer 4.8.1 MySQL 5.7.11 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `t_category`;
CREATE TABLE `t_category` (
  `idCategory` int(11) NOT NULL AUTO_INCREMENT,
  `catName` varchar(30) NOT NULL,
  PRIMARY KEY (`idCategory`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `t_category` (`idCategory`, `catName`) VALUES
(1,	'Vêtement'),
(2,	'Sport'),
(3,	'Informatique');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `t_order`;
CREATE TABLE `t_order` (
  `idOrder` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `moyLiv` varchar(50) NOT NULL,
  `moyPay` varchar(50) NOT NULL,
  `ordPaid` varchar(20) NOT NULL,
  PRIMARY KEY (`idOrder`),
  UNIQUE KEY `ID_t_order_IND` (`idOrder`),
  KEY `FKddw_IND` (`idUser`),
  CONSTRAINT `FKddw_FK` FOREIGN KEY (`idUser`) REFERENCES `t_user` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `t_order` (`idOrder`, `idUser`, `moyLiv`, `moyPay`, `ordPaid`) VALUES
(1,	1,	'SHOP',	'FACTURE',	''),
(2,	1,	'POSTE',	'FACTURE',	''),
(3,	1,	'POSTE',	'CARD',	''),
(4,	1,	'POSTE',	'CARD',	''),
(5,	1,	'POSTE',	'CARD',	''),
(6,	1,	'POSTE',	'FACTURE',	'No'),
(7,	1,	'POSTE',	'CARD',	'Yes'),
(8,	1,	'POSTE',	'FACTURE',	'No');

DROP TABLE IF EXISTS `t_ordered`;
CREATE TABLE `t_ordered` (
  `fkOrder` int(11) NOT NULL,
  `fkProduct` int(11) NOT NULL,
  `itemQuantity` int(3) NOT NULL,
  PRIMARY KEY (`fkProduct`,`fkOrder`),
  UNIQUE KEY `ID_t_ordered_IND` (`fkProduct`,`fkOrder`),
  KEY `FKord_t_o_IND` (`fkOrder`),
  CONSTRAINT `FKord_t_o_FK` FOREIGN KEY (`fkOrder`) REFERENCES `t_order` (`idOrder`),
  CONSTRAINT `FKord_t_p` FOREIGN KEY (`fkProduct`) REFERENCES `t_product` (`idProduct`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `t_ordered` (`fkOrder`, `fkProduct`, `itemQuantity`) VALUES
(1,	1,	3),
(8,	1,	1),
(2,	2,	3),
(4,	2,	1),
(5,	2,	1),
(6,	2,	1),
(7,	2,	1),
(3,	3,	1);

DROP TABLE IF EXISTS `t_product`;
CREATE TABLE `t_product` (
  `idProduct` int(11) NOT NULL AUTO_INCREMENT,
  `proName` varchar(50) NOT NULL,
  `proDescription` text,
  `proPrice` float DEFAULT NULL,
  `proQuantity` smallint(6) DEFAULT NULL,
  `proImage` text,
  `proLike` int(11) NOT NULL DEFAULT '0',
  `proRabChf` int(4) NOT NULL,
  `proRabPourcent` int(3) NOT NULL,
  `fkCategory` int(11) NOT NULL,
  PRIMARY KEY (`idProduct`),
  KEY `Index_Category` (`fkCategory`),
  CONSTRAINT `t_product_ibfk_1` FOREIGN KEY (`fkCategory`) REFERENCES `t_category` (`idCategory`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `t_product` (`idProduct`, `proName`, `proDescription`, `proPrice`, `proQuantity`, `proImage`, `proLike`, `proRabChf`, `proRabPourcent`, `fkCategory`) VALUES
(1,	'Pullover',	'Pullover synthétique',	20.9,	29,	'pull.png',	0,	5,	0,	1),
(2,	'Pantalon',	'Pantalon en Jean\'s véritable',	49.9,	15,	'pants.png',	0,	0,	5,	1),
(3,	'Clé Usb ',	'Clé Usb de 4 Go offrant une fiabilité inégalée.',	4.95,	2,	'usb.png',	10,	0,	0,	3),
(4,	'Disque dur externe',	'Disque dur externe de 1 To, idéal pour stocker et sauvegarder vos données de manière sécurisée.',	79.95,	2,	'harddisk.png',	0,	0,	0,	3),
(5,	'T-Shirt Fox',	NULL,	14.9,	50,	'shirt1.png',	0,	0,	0,	2),
(6,	'T-Shirt Mignon',	NULL,	14.9,	20,	'shirt2.png',	0,	0,	0,	2);

DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `useLogin` varchar(20) NOT NULL,
  `usePassword` text NOT NULL,
  `useRight` varchar(10) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `t_user` (`idUser`, `useLogin`, `usePassword`, `useRight`) VALUES
(1,	'admin',	'$2y$10$g9o.2Bm9Qg5vfl94wM3zGuJ5ST1.LuIpbJBXqPMQcP/abV7qNdJg.',	'admin'),
(2,	'customer',	'$2y$10$.8sXz4/qH5sngNgdEnn8HesHO3qoDvUcYmslZyGIpCUz1He0OmOAS',	'customer');

-- 2022-10-10 14:13:42
