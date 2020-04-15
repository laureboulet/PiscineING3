-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 15 avr. 2020 à 15:22
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `coord` (
  `Adresse` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Ville` varchar(255) CHARACTER SET utf8 NOT NULL,
  `CP` int(11) NOT NULL,
  `Pays` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Telephone` int(11) NOT NULL,
  `Nomlivr` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Prenomlivr` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `coord`
--

INSERT INTO `coord` (`Adresse`, `Ville`, `CP`, `Pays`, `Telephone`, `Nomlivr`, `Prenomlivr`) VALUES
('4 rue ici', 'La Ville', 75028, 'France', 600000000, '', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `coord`
--
ALTER TABLE `coord`
  ADD PRIMARY KEY (`Telephone`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
