-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 13 jan. 2022 à 07:36
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

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
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(53, 'test', '$2y$10$lOVBl6dGpEzwHwsAm3J0juDaUWHQQwACji1NWpIqL16YvJKsZgvwe'),
(47, 'bn', '$2y$10$CRfbP8lgOGFoU56cPjg6qOpnShE3RIYDJbzhq7nKlwohvnp5D/RZW'),
(48, 'bv', '$2y$10$KRCn5rycDNUS7U9Y0WfPJORy7AjH7sdfQduGEFZU3rmiZ9qc8q3gC'),
(42, 'login', '$2y$10$V8xg2l8rSV9RWv31A1e2BuxVJH9ozv2eZdiwKicFJZX3RiVig9cPi'),
(49, 'tt', '$2y$10$V7ysBKlky4jD5M4h5GRIYuSP3/ZWFAmcsBTP3jDGXrouG5RCyfKBq'),
(50, 'last', '$2y$10$VajoBL.OqTESm5O4UfP2euKk4Auuz/y2oHdsqPPInmrFflU6YN1Ui'),
(51, 'christ', '$2y$10$YmWHb/JPhu/0PDw5d5amFOK9jzzUtmXng7MEnMhKyt6PkfQ/pKfFq'),
(52, 'laplateforme', '$2y$10$T8DoON/WVMA11IPhxqIsm.U64V4DiLSa99DGkvYxIUjkna7czDS3S'),
(46, 'jb', '$2y$10$oCdQGizpoIRf.ciyDlaBlu7ZxNEPOhVdL39tKkpmHb6pwhYnky8/e'),
(54, 'aa', '$2y$10$40Vw05ztkRksYMpyxc8kMOG47QpmCtbqDfSpUnOcKZly.MyYd48IG');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
