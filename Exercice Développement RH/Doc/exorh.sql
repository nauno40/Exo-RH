-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 11 avr. 2018 à 17:50
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `exorh`
--

-- --------------------------------------------------------

--
-- Structure de la table `conges`
--

CREATE TABLE `conges` (
  `salaries_id` int(10) UNSIGNED NOT NULL,
  `acquis` tinyint(4) NOT NULL COMMENT 'Nombre de jour de congés disponible pour l''année en cours',
  `pris` tinyint(4) NOT NULL COMMENT 'Nombre de jour de congés pris sur l''année en cours'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `conges`
--

INSERT INTO `conges` (`salaries_id`, `acquis`, `pris`) VALUES
(1, 25, 3),
(2, 25, 6),
(3, 10, 2),
(4, 8, 0),
(5, 8, 0),
(6, 10, 2),
(7, 25, 3),
(8, 25, 6),
(9, 25, 3),
(10, 25, 6),
(11, 10, 2),
(12, 8, 0),
(13, 8, 0),
(14, 10, 2),
(15, 25, 3),
(16, 25, 6);

-- --------------------------------------------------------

--
-- Structure de la table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `dateBegin` date NOT NULL,
  `dateEnd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salaries`
--

INSERT INTO `salaries` (`id`, `firstName`, `lastName`, `address`, `dateBegin`, `dateEnd`) VALUES
(1, 'Anne', 'Dauvergne', '2 rue des lauriers 33000 Bordeaux', '2011-05-06', '2014-04-22'),
(2, 'Alexandre', 'Dujardin', '6 avenue Bossuet 33320 LE TAILLAN-MEDOC', '2008-06-14', '0000-00-00'),
(3, 'Jeanne', 'Lacombe', '138 avenue Monsieur de Gaulle', '2013-01-06', '0000-00-00'),
(4, 'Patrick', 'Lemaire', '110 Bis avenue Ausone 33290 PESSAC', '2013-02-26', '0000-00-00'),
(5, 'Paul', 'Dauvergne', '2 rue des lauriers 33000 Bordeaux', '2011-05-06', '2014-04-22'),
(6, 'Francois', 'Dujardin', '6 avenue Bossuet 33320 LE TAILLAN-MEDOC', '2008-06-14', '2018-04-01'),
(7, 'Jeanne D\'arc', 'Lacombe', '138 avenue Monsieur de Gaulle', '2013-01-06', '2018-04-08'),
(8, 'Patrick Sebastien', 'Lemaire', '110 Bis avenue Ausone 33290 PESSAC', '2013-02-26', '2017-10-10'),
(9, 'Anne', 'Dauvergne', '2 rue des lauriers 33000 Bordeaux', '2011-05-06', '2014-04-22'),
(10, 'Alexandre', 'Dujardin', '6 avenue Bossuet 33320 LE TAILLAN-MEDOC', '2008-06-14', '0000-00-00'),
(11, 'Jeanne', 'Lacombe', '138 avenue Monsieur de Gaulle', '2013-01-06', '0000-00-00'),
(12, 'Patrick', 'Lemaire', '110 Bis avenue Ausone 33290 PESSAC', '2013-02-26', '0000-00-00'),
(13, 'Paul', 'Dauvergne', '2 rue des lauriers 33000 Bordeaux', '2011-05-06', '2014-04-22'),
(14, 'Francois', 'Dujardin', '6 avenue Bossuet 33320 LE TAILLAN-MEDOC', '2008-06-14', '2018-04-01'),
(15, 'Jeanne D\'arc', 'Lacombe', '138 avenue Monsieur de Gaulle', '2013-01-06', '2018-04-08'),
(16, 'Patrick Sebastien', 'Lemaire', '110 Bis avenue Ausone 33290 PESSAC', '2013-02-26', '2017-10-10');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `conges`
--
ALTER TABLE `conges`
  ADD UNIQUE KEY `salaries_id` (`salaries_id`);

--
-- Index pour la table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
