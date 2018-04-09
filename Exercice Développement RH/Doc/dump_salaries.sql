
CREATE TABLE IF NOT EXISTS `conges` (
  `salaries_id` int(10) unsigned NOT NULL,
  `acquis` tinyint(4) NOT NULL COMMENT 'Nombre de jour de congés disponible pour l''année en cours',
  `pris` tinyint(4) NOT NULL COMMENT 'Nombre de jour de congés pris sur l''année en cours',
  UNIQUE KEY `salaries_id` (`salaries_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `conges`
--

INSERT INTO `conges` (`salaries_id`, `acquis`, `pris`) VALUES
(1, 25, 3),
(2, 25, 6),
(3, 10, 2),
(4, 8, 0);

-- --------------------------------------------------------

--
-- Structure de la table `salaries`
--

CREATE TABLE IF NOT EXISTS `salaries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `dateBegin` date NOT NULL,
  `dateEnd` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Contenu de la table `salaries`
--

INSERT INTO `salaries` (`id`, `firstName`, `lastName`, `address`, `dateBegin`, `dateEnd`) VALUES
(1, 'Anne', 'Dauvergne', '2 rue des lauriers 33000 Bordeaux', '2011-05-06', '0000-00-00'),
(2, 'Alexandre', 'Dujardin', '6 avenue Bossuet 33320 LE TAILLAN-MEDOC', '2008-06-14', '0000-00-00'),
(3, 'Jeanne', 'Lacombe', '138 avenue Général de Gaulle', '2013-01-06', '0000-00-00'),
(4, 'Patrick', 'Lemaire', '110 Bis avenue Ausone 33290 PESSAC', '2013-02-26', '0000-00-00');