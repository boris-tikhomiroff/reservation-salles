-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 01 fév. 2022 à 08:04
-- Version du serveur : 8.0.27
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reservationsalles`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `id_utilisateur` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `titre`, `description`, `debut`, `fin`, `id_utilisateur`) VALUES
(32, 'pinao', 'cours de piano', '2022-02-03 09:00:00', '2022-02-03 10:00:00', 72);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(69, 'alexa', '$2y$10$N73QZFkhzJLQEssNWQC4u.fKgN1UFQRsGLxnjb0xZFJzU6MJVJaO6'),
(70, 'test', '$2y$10$whv4ekdWDS98gj4KmfLvAe7QarCrd.wt5oQS6u4Ly7QpJieb5gbYa'),
(71, 'tata', '$2y$10$xjkxoLlrIsNxkYxDxWhypuRlaS5cQSopoNYI4kBgltC5ocs6RgIDC'),
(72, 'vbn', '$2y$10$3h4KoDijj/e9EWvrZ2rI1OriPholLgcrPaNuo8SKzFVBpVfOKxwrq'),
(68, 'hoho', '$2y$10$iJVwQOkuBmorqG5SlkbN3OZx4PxW8p5QXDvz16O901msd7Ks2UTv.'),
(67, 'bobi', '$2y$10$w31uqSwz7DZ2oN/1hvQ0suKxOhcp/CIGDyHoUnfSzKdayyWX0WlPi'),
(65, 'bnv', '$2y$10$YDZR4OX6e3xFQ5B4DKGFSupZdYYf278mDNlHCpjAiZwGVJOBHhyWG'),
(58, 'boba', '$2y$10$LjvT0W2ebpm6sJgfWkNzKOB2pzDjjFLkFlOUJ6VeUy2GIfISkHEIm');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
