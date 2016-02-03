-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 03 Février 2016 à 15:26
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projettut`
--
CREATE DATABASE IF NOT EXISTS `projettut` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projettut`;

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `idActivite` int(11) NOT NULL AUTO_INCREMENT,
  `nomActivite` varchar(200) DEFAULT NULL,
  `descriptionActivite` text,
  `idTheme` int(11) NOT NULL,
  PRIMARY KEY (`idActivite`,`idTheme`),
  KEY `fk_Activite_Theme?1_idx` (`idTheme`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `activite`
--

INSERT INTO `activite` (`idActivite`, `nomActivite`, `descriptionActivite`, `idTheme`) VALUES
(1, 'Diabolo', 'Apprentisage du diabolo', 1),
(2, 'Coloriage', 'Coloriage', 2);

-- --------------------------------------------------------

--
-- Structure de la table `adulte`
--

DROP TABLE IF EXISTS `adulte`;
CREATE TABLE IF NOT EXISTS `adulte` (
  `idAdulte` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `idVille` int(11) NOT NULL,
  `login` varchar(45) DEFAULT NULL,
  `motDePasse` varchar(45) DEFAULT NULL,
  `adresseMail` varchar(50) DEFAULT NULL,
  `rang` int(11) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAdulte`),
  KEY `fk_AdulteResponsable_Ville1_idx` (`idVille`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `adulte`
--

INSERT INTO `adulte` (`idAdulte`, `nom`, `prenom`, `idVille`, `login`, `motDePasse`, `adresseMail`, `rang`, `telephone`) VALUES
(1, 'admin', 'admin', 1, 'admin', 'admin', 'adresse@hotmail.fr', 0, 0),
(2, 'nomParent1', 'prenomParent1', 1, 'user1', 'user1', 'user1@hotmail.fr', NULL, 306298546),
(3, 'nomParent2', 'prenomParent2', 1, 'user2', 'user2', 'user2@gmail.com', 0, 632154695);

-- --------------------------------------------------------

--
-- Structure de la table `agenda`
--

DROP TABLE IF EXISTS `agenda`;
CREATE TABLE IF NOT EXISTS `agenda` (
  `idAgenda` int(11) NOT NULL AUTO_INCREMENT,
  `idActivite` int(11) NOT NULL,
  `dateDebutActivite` datetime DEFAULT NULL,
  `dateFinActivite` datetime DEFAULT NULL,
  `jour` int(11) DEFAULT NULL,
  `horaireDebutActivite` time DEFAULT NULL,
  `horaireFinActivite` time DEFAULT NULL,
  PRIMARY KEY (`idAgenda`),
  KEY `fk_Agenda_Activite1_idx` (`idActivite`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `agenda`
--

INSERT INTO `agenda` (`idAgenda`, `idActivite`, `dateDebutActivite`, `dateFinActivite`, `jour`, `horaireDebutActivite`, `horaireFinActivite`) VALUES
(1, 1, '2015-11-23 00:00:01', '2015-12-23 23:59:59', 1, '17:00:00', '18:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `autorisemodif`
--

DROP TABLE IF EXISTS `autorisemodif`;
CREATE TABLE IF NOT EXISTS `autorisemodif` (
  `idAdulteResponsable` int(11) NOT NULL,
  `idEnfant` int(11) NOT NULL,
  KEY `fk_Enfant_has_AdulteResponsable_AdulteResponsable1_idx` (`idAdulteResponsable`),
  KEY `fk_Enfant_has_AdulteResponsable_Enfant1_idx` (`idEnfant`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `autorisemodif`
--

INSERT INTO `autorisemodif` (`idAdulteResponsable`, `idEnfant`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `idClasse` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `professeur` varchar(45) DEFAULT NULL,
  `idNiveau` int(11) NOT NULL,
  PRIMARY KEY (`idClasse`,`idNiveau`),
  KEY `fk_classe_niveau1_idx` (`idNiveau`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `classe`
--

INSERT INTO `classe` (`idClasse`, `nom`, `professeur`, `idNiveau`) VALUES
(1, 'CP1', 'Deshinkel', 1);

-- --------------------------------------------------------

--
-- Structure de la table `enfant`
--

DROP TABLE IF EXISTS `enfant`;
CREATE TABLE IF NOT EXISTS `enfant` (
  `idEnfant` int(11) NOT NULL AUTO_INCREMENT,
  `nomEnfant` varchar(200) DEFAULT NULL,
  `prenomEnfant` varchar(200) DEFAULT NULL,
  `dateDeNaissance` date DEFAULT NULL,
  `idClasse` int(11) NOT NULL,
  PRIMARY KEY (`idEnfant`),
  KEY `fk_enfant_classe1_idx` (`idClasse`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `enfant`
--

INSERT INTO `enfant` (`idEnfant`, `nomEnfant`, `prenomEnfant`, `dateDeNaissance`, `idClasse`) VALUES
(1, 'nomEnfant', 'prenomEnfant', '1995-06-19', 1),
(2, 'nomEnfant2', 'PrenomEnfant2', '0000-00-00', 1),
(3, 'nomEnfant2', 'prenomEnfant2', '2000-05-26', 1);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `idEnfant` int(11) NOT NULL,
  `idActivite` int(11) NOT NULL,
  `dateDebutInscription` datetime DEFAULT NULL,
  `dateFinInscription` datetime DEFAULT NULL,
  `valideInscription` tinyint(1) DEFAULT NULL,
  KEY `fk_Enfant_has_Activite_Enfant1_idx` (`idEnfant`),
  KEY `fk_Inscription_Activite1_idx` (`idActivite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `inscription`
--

INSERT INTO `inscription` (`idEnfant`, `idActivite`, `dateDebutInscription`, `dateFinInscription`, `valideInscription`) VALUES
(1, 1, '2015-11-23 08:00:00', '0215-11-23 09:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `idNiveau` int(11) NOT NULL AUTO_INCREMENT,
  `niveau` varchar(45) DEFAULT NULL,
  `Enseignant` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idNiveau`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `niveau`
--

INSERT INTO `niveau` (`idNiveau`, `niveau`, `Enseignant`) VALUES
(1, 'CP', 'Mme Martin'),
(2, 'CE1', 'M Bernard');

-- --------------------------------------------------------

--
-- Structure de la table `tarifs`
--

DROP TABLE IF EXISTS `tarifs`;
CREATE TABLE IF NOT EXISTS `tarifs` (
  `idTarif` int(11) NOT NULL AUTO_INCREMENT,
  `idActivite` int(11) NOT NULL,
  `tarifs` int(11) NOT NULL,
  PRIMARY KEY (`idTarif`),
  KEY `fk_Tarifs_Activite1_idx` (`idActivite`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `tarifs`
--

INSERT INTO `tarifs` (`idTarif`, `idActivite`, `tarifs`) VALUES
(1, 1, 15),
(2, 2, 10);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `idTheme` int(11) NOT NULL AUTO_INCREMENT,
  `nomTheme` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idTheme`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `theme`
--

INSERT INTO `theme` (`idTheme`, `nomTheme`) VALUES
(1, 'Cirque'),
(2, 'Expression artistique');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `idVille` int(11) NOT NULL AUTO_INCREMENT,
  `nomVille` varchar(45) DEFAULT NULL,
  `codePostal` int(5) DEFAULT NULL,
  PRIMARY KEY (`idVille`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `ville`
--

INSERT INTO `ville` (`idVille`, `nomVille`, `codePostal`) VALUES
(1, 'Belfort', 90000);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `fk_Activite_Theme?1` FOREIGN KEY (`idTheme`) REFERENCES `theme` (`idTheme`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `adulte`
--
ALTER TABLE `adulte`
  ADD CONSTRAINT `fk_AdulteResponsable_Ville1` FOREIGN KEY (`idVille`) REFERENCES `ville` (`idVille`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `fk_Agenda_Activite1` FOREIGN KEY (`idActivite`) REFERENCES `activite` (`idActivite`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `autorisemodif`
--
ALTER TABLE `autorisemodif`
  ADD CONSTRAINT `fk_Enfant_has_AdulteResponsable_AdulteResponsable1` FOREIGN KEY (`idAdulteResponsable`) REFERENCES `adulte` (`idAdulte`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Enfant_has_AdulteResponsable_Enfant1` FOREIGN KEY (`idEnfant`) REFERENCES `enfant` (`idEnfant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `fk_classe_niveau1` FOREIGN KEY (`idNiveau`) REFERENCES `niveau` (`idNiveau`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `enfant`
--
ALTER TABLE `enfant`
  ADD CONSTRAINT `fk_enfant_classe1` FOREIGN KEY (`idClasse`) REFERENCES `classe` (`idClasse`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `fk_Enfant_has_Activite_Enfant1` FOREIGN KEY (`idEnfant`) REFERENCES `enfant` (`idEnfant`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Inscription_Activite1` FOREIGN KEY (`idActivite`) REFERENCES `activite` (`idActivite`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tarifs`
--
ALTER TABLE `tarifs`
  ADD CONSTRAINT `fk_Tarifs_Activite1` FOREIGN KEY (`idActivite`) REFERENCES `activite` (`idActivite`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
