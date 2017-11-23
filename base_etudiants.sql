
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de donnÃ©es: `base_etudiants`
--

-- --------------------------------------------------------

--
-- Structure de la table `enseignants`
--

CREATE TABLE IF NOT EXISTS `enseignants` (
  `num_ens` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_ens` varchar(50) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `anciennete` int(10) DEFAULT NULL,
  PRIMARY KEY (`num_ens`),
  KEY `nom_ens` (`nom_ens`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `enseignants`
--

INSERT INTO `enseignants` (`num_ens`, `nom_ens`, `grade`, `anciennete`) VALUES
(10, 'Bertrand, Pierre', 'ASS', 2),
(11, 'Dupond, Auguste', 'MCF', 3),
(12, 'Aubois, Jean', 'MCF', 5),
(13, 'Boyer, Julie', 'ASS', 2),
(14, 'Vincent, Paul', 'PR ', 4),
(15, 'Simon, Etienne', 'ASS', 5),
(16, 'Rieux, Frank', 'MCF', 2);

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE IF NOT EXISTS `etudiants` (
  `num_etu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_etu` varchar(50) NOT NULL,
  `date_naiss` date NOT NULL DEFAULT '0000-00-00',
  `sexe` enum('M','F') NOT NULL,
  PRIMARY KEY (`num_etu`),
  UNIQUE KEY `nom_etu` (`nom_etu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `etudiants`
--

INSERT INTO `etudiants` (`num_etu`, `nom_etu`, `date_naiss`, `sexe`) VALUES
(1, 'Dupont, Charles', '1991-03-18', 'M'),
(2, 'Dubois, Jules', '1992-02-11', 'M'),
(3, 'Favier, Isabelle', '1989-02-02', 'F'),
(4, 'Gros, Sophie', '1990-06-21', 'F'),
(5, 'Henri, Pierre', '1993-01-08', 'M'),
(6, 'Humbert, Odile', '1990-03-19', 'F'),
(7, 'Bouziane, Mehdi', '1992-08-10', 'M'),
(8, 'Martin, Julie', '1990-04-25', 'F'),
(9, 'Paris, Jeanne', '1991-01-03', 'F'),
(10, 'Yang, Bing', '1988-09-25', 'M'),
(11, 'Romain, Georges', '1987-06-21', 'M');

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE IF NOT EXISTS `matieres` (
  `num_mat` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom_mat` varchar(50) NOT NULL DEFAULT '',
  `coef` int(10) NOT NULL DEFAULT '0',
  `_num_ens` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`num_mat`),
  UNIQUE KEY `nom_mat` (`nom_mat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `matieres`
--

INSERT INTO `matieres` (`num_mat`, `nom_mat`, `coef`, `_num_ens`) VALUES
(1, 'Programmation', 3, 11),
(2, 'Bases de donnÃ©es', 2, 13),
(3, 'G.P.A.O.', 2, 10),
(4, 'Logique', 1, 15),
(5, 'Statistiques', 1, 15);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `_num_etu` int(10) unsigned NOT NULL DEFAULT '0',
  `_num_mat` int(10) unsigned NOT NULL DEFAULT '0',
  `note` float DEFAULT NULL,
  PRIMARY KEY (`_num_etu`,`_num_mat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `notes`
--

INSERT INTO `notes` (`_num_etu`, `_num_mat`, `note`) VALUES
(1, 1, 10.5),
(1, 2, 9),
(1, 3, 12.5),
(1, 4, 13),
(1, 5, 7),
(2, 1, 11),
(2, 2, 14.5),
(2, 3, 8.5),
(2, 4, 10),
(2, 5, 13),
(3, 1, 14),
(3, 2, 9),
(3, 3, 5),
(3, 4, 7.5),
(3, 5, 12),
(4, 1, 11.5),
(4, 2, 10),
(4, 4, 13),
(4, 5, 10),
(5, 1, 7),
(5, 2, 13),
(5, 3, 10),
(5, 4, 16),
(5, 5, 6),
(6, 2, 13),
(6, 3, 10),
(6, 4, 11),
(7, 1, 12.5),
(7, 2, 11.5),
(7, 3, 9),
(7, 4, 8),
(7, 5, NULL),
(8, 1, 15),
(8, 2, 16),
(8, 3, 12),
(8, 4, 13),
(8, 5, 10),
(9, 1, 8),
(9, 2, 12),
(9, 4, 8),
(10, 1, NULL),
(10, 2, 16),
(10, 3, 11.5),
(10, 4, 9),
(10, 5, 9);
