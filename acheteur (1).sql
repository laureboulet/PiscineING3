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
-- Structure de la table `acheteur`
--

DROP TABLE IF EXISTS `acheteur`;
CREATE TABLE IF NOT EXISTS `acheteur` (
  `Nomach` varchar(255) NOT NULL,
  `Prenomach` varchar(255) NOT NULL,
  `Mdpach` varchar(255) NOT NULL,
  `Emailach` varchar(255) NOT NULL,
  `Idach` int(255) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Idach`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`Nomach`, `Prenomach`, `Mdpach`, `Emailach`, `Idach`) VALUES
('Boulet', 'Laure', 'piscine', 'laure.boulet@edu.ece.fr', 1),
('Teixeira', 'Tiago', 'tiago', 'tiago.teixeira@edu.ece.fr', 2),
('Bourgat', 'Clemence', 'piscine', 'clemence.bourgat@edu.ece.fr', 6),
('Diallo', 'Nivine', 'piscine', 'nivine.diallo@edu.ece.fr', 12);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
