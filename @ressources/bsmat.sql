-- phpMyAdmin SQL Dump
-- version 5.1.4-dev+20220420.d842c89d5c
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 08 juil. 2022 à 07:12
-- Version du serveur : 5.7.26
-- Version de PHP : 8.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bsmat`
--

-- --------------------------------------------------------

--
-- Structure de la table `b12npx_action`
--

DROP TABLE IF EXISTS `b12npx_action`;
CREATE TABLE IF NOT EXISTS `b12npx_action` (
  `idAction` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idTypeRep` int(11) NOT NULL,
  `idFiche` int(11) NOT NULL,
  PRIMARY KEY (`idAction`),
  KEY `idTypeRep` (`idTypeRep`),
  KEY `idFiche` (`idFiche`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `b12npx_action`
--

INSERT INTO `b12npx_action` (`idAction`, `intitule`, `idTypeRep`, `idFiche`) VALUES
(1, 'Changer le pneu AVD', 3, 1),
(2, 'Réparation siège ARG', 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `b12npx_employe`
--

DROP TABLE IF EXISTS `b12npx_employe`;
CREATE TABLE IF NOT EXISTS `b12npx_employe` (
  `idEmploye` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idRole` int(11) NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motDePasse` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idEmploye`),
  KEY `idRole` (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `b12npx_employe`
--

INSERT INTO `b12npx_employe` (`idEmploye`, `nom`, `prenom`, `idRole`, `login`, `motDePasse`) VALUES
(1, 'Invité', 'Mode', 1, 'm.invite', 'm.invite');

-- --------------------------------------------------------

--
-- Structure de la table `b12npx_fiche`
--

DROP TABLE IF EXISTS `b12npx_fiche`;
CREATE TABLE IF NOT EXISTS `b12npx_fiche` (
  `idFiche` int(11) NOT NULL AUTO_INCREMENT,
  `idDiag` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idRep` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idCarrosserie` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idCamGrue` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateCreation` date NOT NULL,
  `vehicule` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `immatriculation` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kilometrage` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeVehicule` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idTypeFiche` int(11) NOT NULL,
  `idEmploye` int(11) NOT NULL,
  PRIMARY KEY (`idFiche`),
  KEY `idTypeFiche` (`idTypeFiche`),
  KEY `idEmploye` (`idEmploye`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `b12npx_fiche`
--

INSERT INTO `b12npx_fiche` (`idFiche`, `idDiag`, `idRep`, `idCarrosserie`, `idCamGrue`, `dateCreation`, `vehicule`, `immatriculation`, `kilometrage`, `typeVehicule`, `idTypeFiche`, `idEmploye`) VALUES
(1, '', '', '', '', '2022-07-08', 'Ford', 'AB-123-CD', '120000', 'Focus', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `b12npx_identification_fiche`
--

DROP TABLE IF EXISTS `b12npx_identification_fiche`;
CREATE TABLE IF NOT EXISTS `b12npx_identification_fiche` (
  `idIdentificationFiche` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idIdentificationFiche`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `b12npx_identification_fiche`
--

INSERT INTO `b12npx_identification_fiche` (`idIdentificationFiche`, `intitule`) VALUES
(1, 'REP-FICHE-1'),
(2, 'RET-FICHE-2'),
(3, 'STA-FICHE-3');

-- --------------------------------------------------------

--
-- Structure de la table `b12npx_role`
--

DROP TABLE IF EXISTS `b12npx_role`;
CREATE TABLE IF NOT EXISTS `b12npx_role` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `b12npx_role`
--

INSERT INTO `b12npx_role` (`idRole`, `intitule`) VALUES
(1, 'Administrateur'),
(2, 'Employé');

-- --------------------------------------------------------

--
-- Structure de la table `b12npx_type_fiche`
--

DROP TABLE IF EXISTS `b12npx_type_fiche`;
CREATE TABLE IF NOT EXISTS `b12npx_type_fiche` (
  `idTypeFiche` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idIdentificationFiche` int(11) NOT NULL,
  PRIMARY KEY (`idTypeFiche`),
  KEY `idIdentificationFiche` (`idIdentificationFiche`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `b12npx_type_fiche`
--

INSERT INTO `b12npx_type_fiche` (`idTypeFiche`, `intitule`, `idIdentificationFiche`) VALUES
(1, 'Réparation', 1),
(2, 'Retouche', 2),
(3, 'Station', 3);

-- --------------------------------------------------------

--
-- Structure de la table `b12npx_type_reparation`
--

DROP TABLE IF EXISTS `b12npx_type_reparation`;
CREATE TABLE IF NOT EXISTS `b12npx_type_reparation` (
  `idTypeRep` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idTypeRep`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `b12npx_type_reparation`
--

INSERT INTO `b12npx_type_reparation` (`idTypeRep`, `intitule`) VALUES
(1, 'Banc freinage'),
(2, 'Éléctricité'),
(3, 'Mécanique'),
(4, 'Peinture'),
(5, 'Tôlerie'),
(6, 'Sellerie');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `b12npx_action`
--
ALTER TABLE `b12npx_action`
  ADD CONSTRAINT `b12npx_action_ibfk_1` FOREIGN KEY (`idTypeRep`) REFERENCES `b12npx_type_reparation` (`idTypeRep`),
  ADD CONSTRAINT `b12npx_action_ibfk_2` FOREIGN KEY (`idFiche`) REFERENCES `b12npx_fiche` (`idFiche`);

--
-- Contraintes pour la table `b12npx_employe`
--
ALTER TABLE `b12npx_employe`
  ADD CONSTRAINT `b12npx_employe_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `b12npx_role` (`idRole`);

--
-- Contraintes pour la table `b12npx_fiche`
--
ALTER TABLE `b12npx_fiche`
  ADD CONSTRAINT `b12npx_fiche_ibfk_1` FOREIGN KEY (`idTypeFiche`) REFERENCES `b12npx_type_fiche` (`idTypeFiche`),
  ADD CONSTRAINT `b12npx_fiche_ibfk_2` FOREIGN KEY (`idEmploye`) REFERENCES `b12npx_employe` (`idEmploye`);

--
-- Contraintes pour la table `b12npx_type_fiche`
--
ALTER TABLE `b12npx_type_fiche`
  ADD CONSTRAINT `b12npx_type_fiche_ibfk_1` FOREIGN KEY (`idIdentificationFiche`) REFERENCES `b12npx_identification_fiche` (`idIdentificationFiche`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
