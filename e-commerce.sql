-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 04 avr. 2024 à 13:15
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e-commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `address_table`
--

DROP TABLE IF EXISTS `address_table`;
CREATE TABLE IF NOT EXISTS `address_table` (
  `AddressId` int NOT NULL AUTO_INCREMENT,
  `UserId` int NOT NULL,
  `FirstName` varchar(80) NOT NULL,
  `LastName` varchar(80) NOT NULL,
  `StreetAddress` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `PostalCode` varchar(30) NOT NULL,
  `Country` varchar(50) NOT NULL,
  PRIMARY KEY (`AddressId`),
  KEY `FK_address_user` (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `address_table`
--

INSERT INTO `address_table` (`AddressId`, `UserId`, `FirstName`, `LastName`, `StreetAddress`, `City`, `State`, `PostalCode`, `Country`) VALUES
(2, 10, 'Admin', '', '', '', '', '', ''),
(4, 11, 'yvenlee', 'vk', '28 rue du nivernais', 'chevilly-larue', 'Val de Marne', '94550', 'France'),
(5, 12, 'nesrine', 'test1', '28 rue du nivernais', 'chevilly-larue', 'Val de Marne', '94550', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `cart_table`
--

DROP TABLE IF EXISTS `cart_table`;
CREATE TABLE IF NOT EXISTS `cart_table` (
  `CartId` int NOT NULL AUTO_INCREMENT,
  `UserId` int NOT NULL,
  `ProductId` int NOT NULL,
  `Quantity` int NOT NULL,
  `Statut` varchar(30) NOT NULL,
  PRIMARY KEY (`CartId`),
  KEY `FK_cart_user` (`UserId`),
  KEY `FK_cart_product` (`ProductId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cart_table`
--

INSERT INTO `cart_table` (`CartId`, `UserId`, `ProductId`, `Quantity`, `Statut`) VALUES
(12, 11, 7, 1, 'reserved');

-- --------------------------------------------------------

--
-- Structure de la table `categorie_table`
--

DROP TABLE IF EXISTS `categorie_table`;
CREATE TABLE IF NOT EXISTS `categorie_table` (
  `CategorieId` int NOT NULL AUTO_INCREMENT,
  `Category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`CategorieId`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie_table`
--

INSERT INTO `categorie_table` (`CategorieId`, `Category`) VALUES
(1, ''),
(2, 'Categorie1'),
(3, 'Categorie'),
(4, 'nklshghugpyueizhu'),
(5, ''),
(6, 'test'),
(7, 'test'),
(8, 'test'),
(9, ''),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, ''),
(15, ''),
(17, 'Souris'),
(19, 'Ordinateur'),
(20, 'Animal'),
(21, 'Animal'),
(23, 'Plante'),
(25, 'Vehicule'),
(26, 'Service'),
(27, 'Objet');

-- --------------------------------------------------------

--
-- Structure de la table `command_table`
--

DROP TABLE IF EXISTS `command_table`;
CREATE TABLE IF NOT EXISTS `command_table` (
  `CommandId` int NOT NULL AUTO_INCREMENT,
  `UserId` int NOT NULL,
  `Quantity` int NOT NULL,
  `CommandDate` date NOT NULL,
  `CommandStatut` varchar(30) NOT NULL,
  `TotalPrice` int NOT NULL,
  PRIMARY KEY (`CommandId`),
  KEY `FK_command_user` (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `command_table`
--

INSERT INTO `command_table` (`CommandId`, `UserId`, `Quantity`, `CommandDate`, `CommandStatut`, `TotalPrice`) VALUES
(10, 11, 2, '2024-02-26', 'commanded', 60000),
(11, 11, 4, '2024-02-26', 'commanded', 160),
(12, 12, 4, '2024-02-26', 'commanded', 160);

-- --------------------------------------------------------

--
-- Structure de la table `invoices_table`
--

DROP TABLE IF EXISTS `invoices_table`;
CREATE TABLE IF NOT EXISTS `invoices_table` (
  `InvoiceId` int NOT NULL AUTO_INCREMENT,
  `CommandId` int NOT NULL,
  `UserId` int NOT NULL,
  `Total` double NOT NULL,
  `InvoiceDate` date NOT NULL,
  PRIMARY KEY (`InvoiceId`),
  KEY `FK_invoice_user` (`UserId`),
  KEY `FK_invoice_command` (`CommandId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `invoices_table`
--

INSERT INTO `invoices_table` (`InvoiceId`, `CommandId`, `UserId`, `Total`, `InvoiceDate`) VALUES
(2, 11, 11, 160, '2024-02-26'),
(3, 11, 11, 160, '2024-02-26'),
(4, 12, 12, 160, '2024-02-26');

-- --------------------------------------------------------

--
-- Structure de la table `jointure_table`
--

DROP TABLE IF EXISTS `jointure_table`;
CREATE TABLE IF NOT EXISTS `jointure_table` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `UserId` int NOT NULL,
  `AddressId` int NOT NULL,
  `CartId` int NOT NULL,
  `ProductId` int NOT NULL,
  `InvoiceId` int NOT NULL,
  `CommandId` int NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_jointure_user` (`UserId`),
  KEY `Fk_jointure_cart` (`CartId`),
  KEY `Fk_jointure_command` (`CommandId`),
  KEY `Fk_jointure_invoice` (`InvoiceId`),
  KEY `Fk_jointure_product` (`ProductId`),
  KEY `Fk_jointure_address` (`AddressId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product_table`
--

DROP TABLE IF EXISTS `product_table`;
CREATE TABLE IF NOT EXISTS `product_table` (
  `ProductId` int NOT NULL AUTO_INCREMENT,
  `CategorieId` int NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Image` text NOT NULL,
  `Description` text NOT NULL,
  `Price` int NOT NULL,
  `Stock_Quantity` int NOT NULL,
  PRIMARY KEY (`ProductId`),
  KEY `FK_product_category` (`CategorieId`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `product_table`
--

INSERT INTO `product_table` (`ProductId`, `CategorieId`, `Name`, `Image`, `Description`, `Price`, `Stock_Quantity`) VALUES
(7, 17, 'Souris Verte', 'https://fr.shopping.rakuten.com/photo/5090379226_L.jpg', 'Elle ne court pas dans l\'herbe !', 40, 10),
(9, 19, 'Asus', 'https://www.laptopspirit.fr/wp-content/uploads/new/2023/03/Asus-VivoBook-R710EA-BX860W-1.jpg', 'Un ordinateur tres portatif', 300, 13),
(10, 20, 'Poulpe', 'https://www.contrepoints.org/wp-content/uploads/2023/08/Contrepoints_octopus_in_water_Bright_c2192c59-4c6c-4cef-b0f6-ac28200c7cc8-1200x800.png', 'Un poulpe quoi', 15000, 1),
(11, 21, 'Chevre', 'https://lemagdesanimaux.ouest-france.fr/images/dossiers/2021-05/mini/elever-chevre-063237-310-160.jpg', 'Le goat', 1000, 3),
(13, 23, 'Grand Arbre', 'https://www.leparisien.fr/resizer/mmB1QGNCEP7hEP6A5kZMbuHINkg=/932x582/cloudfront-eu-central-1.images.arcpublishing.com/lpguideshopping/UFKOZJ7RJZF5NILFY5FTEYRBXM.jpg', 'Des feuilles, un tronc...Ecologique', 300, 1),
(15, 25, 'Renault R5', 'https://www.parismatch.com/lmnr/var/pm/public/media/image/2022/03/01/03/Renault-devoile-sa-strategie-et-une-nouvelle-R5-electrique.jpg?VersionId=6kKxXLi1st.gnuPrGkm8dSU5vtEA9UtB', 'Célèbre véhicule du groupe Renault revisité à la sauce 2024 ! Electrique', 30000, 1),
(16, 26, 'Tueur à gage', 'https://i.ytimg.com/vi/8A0Rwl2gL0I/maxresdefault.jpg', 'Bienveillant serviable et professionnel.\r\n(prix par service)', 10000, 3),
(17, 27, 'Boite a bijoux', 'https://img.kwcdn.com/product/1e13cb9759c/1df2c3ea-4a43-4398-8baa-04e75a9931cb_800x800.jpeg?imageView2/2/w/800/q/70', 'Petit compartiments a bijoux ', 50, 3);

-- --------------------------------------------------------

--
-- Structure de la table `user_table`
--

DROP TABLE IF EXISTS `user_table`;
CREATE TABLE IF NOT EXISTS `user_table` (
  `UserId` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user_table`
--

INSERT INTO `user_table` (`UserId`, `Email`, `Password`) VALUES
(1, '', ''),
(2, '', ''),
(3, '', ''),
(4, '', ''),
(5, 'unmail@gmail.com', 'Siunmotdepasse'),
(6, '', ''),
(7, '', ''),
(8, 'unmail@gmail.com', 'jiffhjkfy'),
(9, 'unmail@gmail.com', 'Siunmotdepasse'),
(10, 'admin', 'admin'),
(11, 'yvenlycee@gmail.Com', 'yven'),
(12, 'test@gmail.com', 'test');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `address_table`
--
ALTER TABLE `address_table`
  ADD CONSTRAINT `FK_address_user` FOREIGN KEY (`UserId`) REFERENCES `user_table` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cart_table`
--
ALTER TABLE `cart_table`
  ADD CONSTRAINT `FK_cart_product` FOREIGN KEY (`ProductId`) REFERENCES `product_table` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_cart_user` FOREIGN KEY (`UserId`) REFERENCES `user_table` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `command_table`
--
ALTER TABLE `command_table`
  ADD CONSTRAINT `FK_command_user` FOREIGN KEY (`UserId`) REFERENCES `user_table` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `invoices_table`
--
ALTER TABLE `invoices_table`
  ADD CONSTRAINT `FK_invoice_command` FOREIGN KEY (`CommandId`) REFERENCES `command_table` (`CommandId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_invoice_user` FOREIGN KEY (`UserId`) REFERENCES `user_table` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `jointure_table`
--
ALTER TABLE `jointure_table`
  ADD CONSTRAINT `Fk_jointure_address` FOREIGN KEY (`AddressId`) REFERENCES `address_table` (`AddressId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_jointure_cart` FOREIGN KEY (`CartId`) REFERENCES `cart_table` (`CartId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_jointure_command` FOREIGN KEY (`CommandId`) REFERENCES `command_table` (`CommandId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_jointure_invoice` FOREIGN KEY (`InvoiceId`) REFERENCES `invoices_table` (`InvoiceId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_jointure_product` FOREIGN KEY (`ProductId`) REFERENCES `product_table` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_jointure_user` FOREIGN KEY (`UserId`) REFERENCES `user_table` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `product_table`
--
ALTER TABLE `product_table`
  ADD CONSTRAINT `FK_product_category` FOREIGN KEY (`CategorieId`) REFERENCES `categorie_table` (`CategorieId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
