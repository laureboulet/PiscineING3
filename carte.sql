-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 18 avr. 2020 à 15:38
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `piscineweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

DROP TABLE IF EXISTS `carte`;
CREATE TABLE IF NOT EXISTS `carte` (
  `Numero` varchar(255) NOT NULL,
  `Date_expiration` varchar(5) NOT NULL,
  `Cryptogramme` int(4) NOT NULL,
  `Nomtitulaire` varchar(255) NOT NULL,
  `Solde` int(11) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Ach` int(255) DEFAULT NULL,
  PRIMARY KEY (`Numero`),
  KEY `Ach` (`Ach`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `carte`
--

INSERT INTO `carte` (`Numero`, `Date_expiration`, `Cryptogramme`, `Nomtitulaire`, `Solde`, `Type`, `Ach`) VALUES
('3456798776543235', '65/43', 432, 'Laure Boulet', 3455, 'Visa', 1),
('5456876578789878', '88/90', 767, 'Tiago Teixeira', 7567, 'MasterCard', 2),
('5678909879098909', '76/76', 768, 'Bourgat ClÃ©mence', 600, 'MasterCard', 6);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `carte`
--
ALTER TABLE `carte`
  ADD CONSTRAINT `carte_ibfk_1` FOREIGN KEY (`Ach`) REFERENCES `acheteur` (`Idach`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
