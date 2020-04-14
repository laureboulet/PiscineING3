{\rtf1\ansi\ansicpg1252\cocoartf1671\cocoasubrtf600
{\fonttbl\f0\fswiss\fcharset0 Helvetica;}
{\colortbl;\red255\green255\blue255;}
{\*\expandedcolortbl;;}
\paperw11900\paperh16840\margl1440\margr1440\vieww10800\viewh8400\viewkind0
\pard\tx566\tx1133\tx1700\tx2267\tx2834\tx3401\tx3968\tx4535\tx5102\tx5669\tx6236\tx6803\pardirnatural\partightenfactor0

\f0\fs24 \cf0 -- phpMyAdmin SQL Dump\
-- version 4.9.3\
-- https://www.phpmyadmin.net/\
--\
-- Host: localhost:8889\
-- Generation Time: Apr 14, 2020 at 04:02 PM\
-- Server version: 5.7.26\
-- PHP Version: 7.4.2\
\
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";\
SET time_zone = "+00:00";\
\
--\
-- Database: `piscineweb`\
--\
\
-- --------------------------------------------------------\
\
--\
-- Table structure for table `vendeur`\
--\
\
CREATE TABLE `vendeur` (\
  `Nom` varchar(255) NOT NULL,\
  `Prenom` varchar(255) NOT NULL,\
  `Pseudo` varchar(255) NOT NULL,\
  `Email` varchar(255) NOT NULL,\
  `Mdp` varchar(255) NOT NULL\
) ENGINE=InnoDB DEFAULT CHARSET=utf8;\
\
--\
-- Dumping data for table `vendeur`\
--\
\
INSERT INTO `vendeur` (`Nom`, `Prenom`, `Pseudo`, `Email`, `Mdp`) VALUES\
('NOM2', 'salut', 'coco', 'mais@edu.fr', 'zaerty'),\
('exnom', 'exprenom', 'expseudo', 'mail@ece.fr', 'toto123'),\
('DODO', 'VAR', 'fgh', 'aze@rty.fr', 'juju'),\
('qsd', '', 'fre', 'mail@a.com', 'frate'),\
('nom', 'prenom', 'pseudo', 'e@mail.com', 'test123');\
\
--\
-- Indexes for dumped tables\
--\
\
--\
-- Indexes for table `vendeur`\
--\
ALTER TABLE `vendeur`\
  ADD PRIMARY KEY (`Pseudo`);\
}