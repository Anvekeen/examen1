-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 09 juin 2020 à 20:11
-- Version du serveur :  5.7.24
-- Version de PHP : 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `examen`
--
CREATE DATABASE IF NOT EXISTS `examen` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `examen`;

-- --------------------------------------------------------

--
-- Structure de la table `buildings`
--

DROP TABLE IF EXISTS `buildings`;
CREATE TABLE IF NOT EXISTS `buildings` (
                                           `buildingID` int(11) NOT NULL AUTO_INCREMENT,
                                           `buildingname` varchar(100) NOT NULL,
                                           `buildingaddress` varchar(100) NOT NULL,
                                           `buildingcityID` int(11) NOT NULL,
                                           PRIMARY KEY (`buildingID`),
                                           KEY `buildingcityID` (`buildingcityID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `buildings`
--

INSERT INTO `buildings` (`buildingID`, `buildingname`, `buildingaddress`, `buildingcityID`) VALUES
(1, 'Syndic', 'Chaussée de Waterloo 172', 2),
(2, 'Les mésanges', 'Route de Mons, 21', 2),
(3, 'La Fraisière', 'Chaussée de Huy, 102', 1);

-- --------------------------------------------------------

--
-- Structure de la table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
                                        `cityID` int(11) NOT NULL AUTO_INCREMENT,
                                        `cityname` varchar(100) NOT NULL,
                                        `cityZIP` int(11) NOT NULL,
                                        `valide` int(11) DEFAULT NULL,
                                        PRIMARY KEY (`cityID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cities`
--

INSERT INTO `cities` (`cityID`, `cityname`, `cityZIP`, `valide`) VALUES
(1, 'Wavre', 1300, 1),
(2, 'Louvain-la-Neuve', 1348, 1);

-- --------------------------------------------------------

--
-- Structure de la table `communications`
--

DROP TABLE IF EXISTS `communications`;
CREATE TABLE IF NOT EXISTS `communications` (
                                                `commID` int(11) NOT NULL AUTO_INCREMENT,
                                                `commtitle` varchar(100) NOT NULL,
                                                `commdescription` varchar(255) NOT NULL,
                                                `commdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                                `commbuildingID` int(11) NOT NULL,
                                                `commuserID` int(11) NOT NULL,
                                                `commstateID` int(11) NOT NULL,
                                                PRIMARY KEY (`commID`),
                                                KEY `commuserID` (`commuserID`),
                                                KEY `commbuildingID` (`commbuildingID`),
                                                KEY `commstateID` (`commstateID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `communications`
--

INSERT INTO `communications` (`commID`, `commtitle`, `commdescription`, `commdate`, `commbuildingID`, `commuserID`, `commstateID`) VALUES
(1, 'Ascenseurs bloqués', 'L\'ascenseur du batiment des fraisieres est bloqué, porte 2', '2020-06-03 15:32:41', 2, 1, 1),
(2, 'WC bouché', 'WC bouché au 32', '2020-06-09 15:39:35', 3, 2, 2),
(3, 'Nettoyage commu', 'Nettoyage des commu du 3e étage le 11/02 à 15h00', '2020-06-09 15:39:35', 2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `comm_state`
--

DROP TABLE IF EXISTS `comm_state`;
CREATE TABLE IF NOT EXISTS `comm_state` (
                                            `stateID` int(11) NOT NULL AUTO_INCREMENT,
                                            `statename` varchar(100) NOT NULL,
                                            PRIMARY KEY (`stateID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comm_state`
--

INSERT INTO `comm_state` (`stateID`, `statename`) VALUES
(1, 'N/A'),
(2, 'non traité'),
(3, 'en attente'),
(4, 'traité');

-- --------------------------------------------------------

--
-- Structure de la table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
                                     `logID` int(11) NOT NULL AUTO_INCREMENT,
                                     `action` varchar(255) NOT NULL,
                                     `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                                     PRIMARY KEY (`logID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
                                       `userID` int(11) NOT NULL AUTO_INCREMENT,
                                       `usertypeID` int(11) NOT NULL,
                                       `username` varchar(100) NOT NULL,
                                       `password` varchar(255) NOT NULL,
                                       `userbuildingID` int(11) NOT NULL,
                                       `apartment_number` int(11) NOT NULL,
                                       `session_token` varchar(255) NOT NULL,
                                       `session_time` timestamp NOT NULL,
                                       PRIMARY KEY (`userID`),
                                       UNIQUE KEY `username` (`username`),
                                       UNIQUE KEY `session_token` (`session_token`),
                                       KEY `usertypeID` (`usertypeID`),
                                       KEY `userbuildingID` (`userbuildingID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userID`, `usertypeID`, `username`, `password`, `userbuildingID`, `apartment_number`, `session_token`, `session_time`) VALUES
(1, 1, 'syndic@immovm.be', '$2y$10$zjw7AnUAWT.GPsT3McecROUD8oDilicOTo0CmFLt9.WiEnWxSrVdm', 1, 0, '0d3710932ba41854.1591780115', '2020-06-10 07:08:35'),
(2, 2, 'louis@hotmail.com', '$2y$10$GdG.MWwvJRXJS2yMCVAV2ugO6mDwjokK84rWxz2msTGtHVhWly1QC', 2, 14, '08821be1be48ef39.1591780269', '2020-06-10 07:11:09'),
(3, 3, 'Lewis@protonmail.com', '$2y$10$dyFXBsak7cMixGl2BR98p.dOVE0l6DPlXRwELiaeI6kd8O5vB8h5W', 3, 44, '9355cc0076301fdf.1591780300', '2020-06-10 07:11:40');

-- --------------------------------------------------------

--
-- Structure de la table `users_type`
--

DROP TABLE IF EXISTS `users_type`;
CREATE TABLE IF NOT EXISTS `users_type` (
                                            `typeID` int(11) NOT NULL AUTO_INCREMENT,
                                            `typename` varchar(100) NOT NULL,
                                            PRIMARY KEY (`typeID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users_type`
--

INSERT INTO `users_type` (`typeID`, `typename`) VALUES
(1, 'syndic'),
(2, 'locataire (résident)'),
(3, 'propriétaire (résident)'),
(4, 'propriétaire (non-résident)');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `buildings`
--
ALTER TABLE `buildings`
    ADD CONSTRAINT `buildings_ibfk_1` FOREIGN KEY (`buildingcityID`) REFERENCES `cities` (`cityID`);

--
-- Contraintes pour la table `communications`
--
ALTER TABLE `communications`
    ADD CONSTRAINT `communications_ibfk_1` FOREIGN KEY (`commuserID`) REFERENCES `users` (`userID`) ON DELETE CASCADE,
    ADD CONSTRAINT `communications_ibfk_2` FOREIGN KEY (`commbuildingID`) REFERENCES `buildings` (`buildingID`) ON DELETE CASCADE,
    ADD CONSTRAINT `communications_ibfk_3` FOREIGN KEY (`commstateID`) REFERENCES `comm_state` (`stateID`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
    ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`usertypeID`) REFERENCES `users_type` (`typeID`),
    ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`userbuildingID`) REFERENCES `buildings` (`buildingID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
