-- phpMyAdmin SQL Dump
-- version 3.4.3.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Mer 17 Octobre 2012 à 16:02
-- Version du serveur: 5.5.15
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `thm`
--

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE IF NOT EXISTS `etablissement` (
  `CodeEt` int(50) NOT NULL,
  `AppellationCommerciale` varchar(100) NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `DateInstallation` date NOT NULL,
  `CodeP` int(50) NOT NULL,
  PRIMARY KEY (`CodeEt`),
  KEY `CodeP` (`CodeP`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `morale`
--

CREATE TABLE IF NOT EXISTS `morale` (
  `CodeP` int(50) NOT NULL,
  `RaisonSociale` varchar(50) NOT NULL,
  `FormeJuridique` varchar(50) NOT NULL,
  `CodeSIRET` int(50) NOT NULL,
  PRIMARY KEY (`CodeP`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `participeprojet`
--

CREATE TABLE IF NOT EXISTS `participeprojet` (
  `NumProjet` int(11) NOT NULL AUTO_INCREMENT,
  `Matricule` int(11) NOT NULL,
  `NbJours` int(11) DEFAULT NULL,
  PRIMARY KEY (`NumProjet`,`Matricule`),
  KEY `FK_ParticipeProjet_Matricule` (`Matricule`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `participeprojet`
--

INSERT INTO `participeprojet` (`NumProjet`, `Matricule`, `NbJours`) VALUES
(3, 1651, 5),
(3, 1819, 9);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE IF NOT EXISTS `personne` (
  `CodeP` int(50) NOT NULL,
  PRIMARY KEY (`CodeP`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE IF NOT EXISTS `personnel` (
  `Matricule` int(11) NOT NULL AUTO_INCREMENT,
  `NomPers` varchar(50) DEFAULT NULL,
  `PrenomPers` varchar(50) DEFAULT NULL,
  `CodeService` int(11) NOT NULL,
  PRIMARY KEY (`Matricule`),
  KEY `FK_Personnel_CodeService` (`CodeService`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1820 ;

--
-- Contenu de la table `personnel`
--

INSERT INTO `personnel` (`Matricule`, `NomPers`, `PrenomPers`, `CodeService`) VALUES
(1651, 'Mallet', 'Julien', 1),
(1819, 'Caboche', 'Maxime', 2);

-- --------------------------------------------------------

--
-- Structure de la table `physique`
--

CREATE TABLE IF NOT EXISTS `physique` (
  `CodeP` int(50) NOT NULL,
  `Nom` varchar(15) NOT NULL,
  `Prenom` varchar(15) NOT NULL,
  `Civilité` varchar(15) NOT NULL,
  PRIMARY KEY (`CodeP`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `projettermine`
--

CREATE TABLE IF NOT EXISTS `projettermine` (
  `NumProjet` int(11) NOT NULL AUTO_INCREMENT,
  `Designation` varchar(20) DEFAULT NULL,
  `ChargeEstimee` int(11) DEFAULT NULL,
  `ChargeReelle` int(11) DEFAULT NULL,
  `DateDebut` date DEFAULT NULL,
  `DateFin` date DEFAULT NULL,
  `CodeType` int(11) NOT NULL,
  PRIMARY KEY (`NumProjet`),
  KEY `FK_ProjetTermine_CodeType` (`CodeType`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `projettermine`
--

INSERT INTO `projettermine` (`NumProjet`, `Designation`, `ChargeEstimee`, `ChargeReelle`, `DateDebut`, `DateFin`, `CodeType`) VALUES
(3, 'Mettre en oeuvre une', 5, 4, '2012-10-10', '2012-10-10', 1),
(4, 'Mise en place d''un S', 8, 9, '2012-10-11', '2012-10-12', 2),
(5, 'Mettre en oeuvre deu', 10, 25, '2012-10-10', '2012-10-10', 1),
(6, 'Mise en place deux S', 8, 26, '2012-10-11', '2012-10-12', 2);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `CodeService` int(11) NOT NULL AUTO_INCREMENT,
  `LibServ` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CodeService`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`CodeService`, `LibServ`) VALUES
(1, 'Compte'),
(2, 'ServiceInterne');

-- --------------------------------------------------------

--
-- Structure de la table `terrasses`
--

CREATE TABLE IF NOT EXISTS `terrasses` (
  `Codeterrasse` int(5) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `SurfaceEnM²` int(10) NOT NULL,
  `DateInstallation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PrixTerrasse` decimal(20,3) NOT NULL,
  `Zone` varchar(5) NOT NULL,
  PRIMARY KEY (`Codeterrasse`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `terrasses`
--

INSERT INTO `terrasses` (`Codeterrasse`, `Type`, `SurfaceEnM²`, `DateInstallation`, `PrixTerrasse`, `Zone`) VALUES
(1, 'Été', 25, '2012-10-04 13:11:09', '153.890', 'A'),
(2, 'Été', 10, '2012-10-04 13:11:09', '92.450', 'B'),
(3, 'Été', 16, '2012-10-04 13:11:09', '163.630', 'C'),
(4, 'Été', 10, '2012-10-04 13:11:09', '56.230', 'C'),
(5, 'Été', 16, '2012-10-04 13:11:09', '85.650', 'B'),
(6, 'Hiver', 26, '2012-10-04 13:11:09', '645.210', 'A'),
(7, 'Hiver', 3, '2012-10-04 13:11:09', '84.250', 'B'),
(8, 'Été', 50, '2012-10-04 13:11:09', '268.125', 'C');

-- --------------------------------------------------------

--
-- Structure de la table `typeprojet`
--

CREATE TABLE IF NOT EXISTS `typeprojet` (
  `CodeType` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`CodeType`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `typeprojet`
--

INSERT INTO `typeprojet` (`CodeType`, `Libelle`) VALUES
(1, 'Base'),
(2, 'Serveur');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `participeprojet`
--
ALTER TABLE `participeprojet`
  ADD CONSTRAINT `FK_ParticipeProjet_Matricule` FOREIGN KEY (`Matricule`) REFERENCES `personnel` (`Matricule`),
  ADD CONSTRAINT `FK_ParticipeProjet_NumProjet` FOREIGN KEY (`NumProjet`) REFERENCES `projettermine` (`NumProjet`);

--
-- Contraintes pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `FK_Personnel_CodeService` FOREIGN KEY (`CodeService`) REFERENCES `service` (`CodeService`);

--
-- Contraintes pour la table `projettermine`
--
ALTER TABLE `projettermine`
  ADD CONSTRAINT `FK_ProjetTermine_CodeType` FOREIGN KEY (`CodeType`) REFERENCES `typeprojet` (`CodeType`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
