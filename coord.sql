-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 14 avr. 2020 à 17:58
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
-- Structure de la table `coord`
--

DROP TABLE IF EXISTS `coord`;
CREATE TABLE IF NOT EXISTS `coord` (
  `Adresse` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `CP` int(11) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telephone` int(11) NOT NULL,
  PRIMARY KEY (`Telephone`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `coord`
--

INSERT INTO `coord` (`Adresse`, `Ville`, `CP`, `Pays`, `Email`, `Telephone`) VALUES
('4 rue ici', 'La Ville', 75028, 'France', 'nivine.diallo@edu.ece.fr', 600000000);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
