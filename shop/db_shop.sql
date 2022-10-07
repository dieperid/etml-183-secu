-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 29 sep. 2022 à 22:24
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS db_shop;
CREATE DATABASE db_shop;
USE db_shop;

DROP USER IF EXISTS 'db150'@'localhost';
CREATE USER 'db150'@'localhost' IDENTIFIED BY 'Pa$$w0rd';
GRANT ALL PRIVILEGES ON db_shop.* TO 'db150'@'localhost' WITH GRANT OPTION;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_category`
--

CREATE TABLE `t_category` (
  `idCategory` int(11) NOT NULL,
  `catName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_category`
--

INSERT INTO `t_category` (`idCategory`, `catName`) VALUES
(1, 'Vêtement'),
(2, 'Sport'),
(3, 'Informatique');

-- --------------------------------------------------------

--
-- Structure de la table `t_order`
--

CREATE TABLE `t_order` (
  `idOrder` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `moyLiv` varchar(50) NOT NULL,
  `moyPay` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `t_ordered`
--

CREATE TABLE `t_ordered` (
  `fkOrder` int(11) NOT NULL,
  `fkProduct` int(11) NOT NULL,
  `itemQuantity` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `t_product`
--

CREATE TABLE `t_product` (
  `idProduct` int(11) NOT NULL,
  `proName` varchar(50) NOT NULL,
  `proDescription` text DEFAULT NULL,
  `proPrice` float DEFAULT NULL,
  `proQuantity` smallint(6) DEFAULT NULL,
  `proImage` text DEFAULT NULL,
  `proLike` int(11) NOT NULL DEFAULT 0,
  `fkCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_product`
--

INSERT INTO `t_product` (`idProduct`, `proName`, `proDescription`, `proPrice`, `proQuantity`, `proImage`, `proLike`, `fkCategory`) VALUES
(1, 'Pullover', 'Pullover synthétique', 20.9, 9, 'pull.png', 0, 1),
(2, 'Pantalon', 'Pantalon en Jean\'s véritable', 49.9, 15, 'pants.png', 0, 1),
(3, 'Clé Usb ', 'Clé Usb de 4 Go offrant une fiabilité inégalée.', 4.95, 3, 'usb.png', 10, 3),
(4, 'Disque dur externe', 'Disque dur externe de 1 To, idéal pour stocker et sauvegarder vos données de manière sécurisée.', 79.95, 2, 'harddisk.png', 0, 3),
(5, 'T-Shirt Fox', NULL, 14.9, 50, 'shirt1.png', 0, 2),
(6, 'T-Shirt Mignon', NULL, 14.9, 20, 'shirt2.png', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_user`
--

CREATE TABLE `t_user` (
  `idUser` int(11) NOT NULL,
  `useLogin` varchar(20) NOT NULL,
  `usePassword` text NOT NULL,
  `useRight` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_user`
--

INSERT INTO `t_user` (`idUser`, `useLogin`, `usePassword`, `useRight`) VALUES
(1, 'admin', '$2y$10$g9o.2Bm9Qg5vfl94wM3zGuJ5ST1.LuIpbJBXqPMQcP/abV7qNdJg.', 'admin'),
(2, 'customer', '$2y$10$.8sXz4/qH5sngNgdEnn8HesHO3qoDvUcYmslZyGIpCUz1He0OmOAS', 'customer');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_category`
--
ALTER TABLE `t_category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Index pour la table `t_order`
--
ALTER TABLE `t_order`
  ADD PRIMARY KEY (`idOrder`),
  ADD UNIQUE KEY `ID_t_order_IND` (`idOrder`),
  ADD KEY `FKddw_IND` (`idUser`);

--
-- Index pour la table `t_ordered`
--
ALTER TABLE `t_ordered`
  ADD PRIMARY KEY (`fkProduct`,`fkOrder`),
  ADD UNIQUE KEY `ID_t_ordered_IND` (`fkProduct`,`fkOrder`),
  ADD KEY `FKord_t_o_IND` (`fkOrder`);

--
-- Index pour la table `t_product`
--
ALTER TABLE `t_product`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `Index_Category` (`fkCategory`);

--
-- Index pour la table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_category`
--
ALTER TABLE `t_category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `t_order`
--
ALTER TABLE `t_order`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT pour la table `t_product`
--
ALTER TABLE `t_product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_order`
--
ALTER TABLE `t_order`
  ADD CONSTRAINT `FKddw_FK` FOREIGN KEY (`idUser`) REFERENCES `t_user` (`idUser`);

--
-- Contraintes pour la table `t_ordered`
--
ALTER TABLE `t_ordered`
  ADD CONSTRAINT `FKord_t_o_FK` FOREIGN KEY (`fkOrder`) REFERENCES `t_order` (`idOrder`),
  ADD CONSTRAINT `FKord_t_p` FOREIGN KEY (`fkProduct`) REFERENCES `t_product` (`idProduct`);

--
-- Contraintes pour la table `t_product`
--
ALTER TABLE `t_product`
  ADD CONSTRAINT `t_product_ibfk_1` FOREIGN KEY (`fkCategory`) REFERENCES `t_category` (`idCategory`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
