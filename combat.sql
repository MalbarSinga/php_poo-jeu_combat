-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 30 jan. 2018 à 14:58
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `combat`
--
CREATE DATABASE IF NOT EXISTS `combat` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `combat`;

-- --------------------------------------------------------

--
-- Structure de la table `attack`
--

CREATE TABLE `attack` (
  `id` smallint(10) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `puissance` smallint(3) NOT NULL,
  `categorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `attack`
--

INSERT INTO `attack` (`id`, `nom`, `puissance`, `categorie`) VALUES
(1, 'High kick', 5, 'Persodefaut'),
(2, 'Attaque bélier', 10, 'Persodefaut'),
(3, 'Lance flamme', 20, 'Persofeu'),
(4, 'Tempête tourbillonnate', 45, 'Persoair'),
(5, 'Seed Attack', 32, 'Persoterre'),
(6, 'Coup du jet d\'eau', 15, 'Persoeau'),
(7, 'Mort subite', 100, 'Persoair');

-- --------------------------------------------------------

--
-- Structure de la table `personnages`
--

CREATE TABLE `personnages` (
  `id` smallint(5) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `degats` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `categorie` varchar(50) NOT NULL DEFAULT 'Persodefaut'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnages`
--

INSERT INTO `personnages` (`id`, `nom`, `degats`, `image`, `categorie`) VALUES
(17, 'Salameche', 20, 'salameche.png', 'PersoFeu'),
(18, 'Mewtwo', 40, 'mewtwo.png', 'Persoair'),
(20, 'Rondoudou', 5, 'rondoudou.png', 'Persodefaut'),
(21, 'Bulbizare', 10, 'bulbizzare.png', 'Persoterre');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attack`
--
ALTER TABLE `attack`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personnages`
--
ALTER TABLE `personnages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `attack`
--
ALTER TABLE `attack`
  MODIFY `id` smallint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `personnages`
--
ALTER TABLE `personnages`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
