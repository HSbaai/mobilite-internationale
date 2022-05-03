-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 03 mai 2022 à 11:35
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mobilite_international`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `apogee` varchar(20) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `nom` varchar(20) NOT NULL,
  `filiere` varchar(10) NOT NULL,
  PRIMARY KEY (`apogee`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`apogee`, `password`, `date_naissance`, `nom`, `filiere`) VALUES
('L234546', '1122', '1999-12-09', 'youssef', 'IID2'),
('L131341', '1234', '1999-12-01', 'kamal', 'IID2'),
('L146011', '1122', '2001-09-14', 'haytham', 'GI2'),
('L123454', 'L123454', '2000-01-05', 'Kamal', 'GI2'),
('L34567', '1111', '2000-03-16', 'Rabi', 'IRIC2'),
('L45678', '2222', '2000-06-09', 'Amine', 'GE2');

-- --------------------------------------------------------

--
-- Structure de la table `candidatures`
--

DROP TABLE IF EXISTS `candidatures`;
CREATE TABLE IF NOT EXISTS `candidatures` (
  `idCandidature` int(200) NOT NULL AUTO_INCREMENT,
  `apogeeEtudiant` varchar(20) NOT NULL,
  `nomEtudiant` varchar(40) NOT NULL,
  `nomConcours` varchar(100) NOT NULL,
  `filiereEtudiant` varchar(20) NOT NULL,
  `etat` varchar(20) NOT NULL DEFAULT 'non encore traiter',
  PRIMARY KEY (`idCandidature`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `concours`
--

DROP TABLE IF EXISTS `concours`;
CREATE TABLE IF NOT EXISTS `concours` (
  `nom_concours` varchar(50) NOT NULL,
  `date_debut` date NOT NULL,
  `etat` varchar(15) NOT NULL,
  `cond_admission` text NOT NULL,
  `proc_admission` text NOT NULL,
  `proc_candidature` text NOT NULL,
  `calend_concours` date NOT NULL,
  `ID_concours` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_concours`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `concours`
--

INSERT INTO `concours` (`nom_concours`, `date_debut`, `etat`, `cond_admission`, `proc_admission`, `proc_candidature`, `calend_concours`, `ID_concours`) VALUES
('Concours PFA insa TOULOUSE', '2022-01-19', 'ouvert', '        OS: Windows 7 â€“ Service Pack 1.\r\n Processor: Intel Core i5-2500K / AMD FX-6300.\r\nMemory: 8GB.\r\nGraphics Card: Nvidia GeForce GTX 770 2GB / AMD Radeon R9 280 3GB.\r\nHDD Space: 150GB. ', 'OS: Windows 7 â€“ Service Pack 1.\r\n Processor: Intel Core i5-2500K / AMD FX-6300.\r\nMemory: 8GB.\r\nGraphics Card: Nvidia GeForce GTX 770 2GB / AMD Radeon R9 280 3GB.\r\nHDD Space: 150GB.', '        OS: Windows 7 â€“ Service Pack 1.\r\n Processor: Intel Core i5-2500K / AMD FX-6300.\r\nMemory: 8GB.\r\nGraphics Card: Nvidia GeForce GTX 770 2GB / AMD Radeon R9 280 3GB.\r\nHDD Space: 150GB.', '2022-01-28', 7),
('Concours PFE INSA Val de loire', '2021-12-01', 'ouvert', '                                                Operating System: Windows 8.\r\n1 64 Bit, Windows 8 64 Bit, Windows 7 64 Bit Service Pack 1Processor: Intel Core 2 Quad CPU Q6600 @ 2.\r\n40GHz (4 CPUs) / AMD Phenom 9850 Quad-Core Processor (4 CPUs) @ 2.\r\n5GHzMemory: 4GBVideo Card: NVIDIA 9800 GT 1GB / AMD HD 4870 1GB (DX 10, 10.\r\n1, 11)Sound Card: 100% DirectX 10 compatibleHDD Space: 65GB.', 'Operating System: Windows 8.\r\n1 64 Bit, Windows 8 64 Bit, Windows 7 64 Bit Service Pack 1Processor: Intel Core i5 3470 @ 3.\r\n2GHZ (4 CPUs) / AMD X8 FX-8350 @ 4GHZ (8 CPUs)Memory: 8GBVideo Card: NVIDIA GTX 660 2GB / AMD HD7870 2GBSound Card: 100% DirectX 10 compatibleHDD Space: 65GB.', '                                                Operating System: Windows 10Processor: Intel Core i7 10th Gen chipset / AMD AMD Ryzen 7 3700X 8 Cores up to 4.\r\n4GHz 36MB Cache AM4 SocketMemory: 16GB DDR4 RAMVideo Card: Zotac GeForce GTX 1050 Ti 4GBSound Card: 100% DirectX 10 compatibleSSD: 128GB.', '2022-01-02', 4),
('Concours PFA ENSA Kouribga', '2022-01-19', 'ferme', '        Requires a 64-bit processor and operating system.\r\nOS: Windows 7, Windows 8.\r\n1, Windows 10 64-bit.\r\nProcessor: Intel Core 2 Duo @ 2.\r\n4GHz or AMD Athlon Phenom X2 @ 2.\r\n8Ghz AMD.', 'Memory: 4 GB RAM.\r\nGraphics: GeForce 450GT or Radeon HD 5750 or better, with 512Mb or greater.\r\nDirectX: Version 11.', '        Memory: 4 GB RAM.\r\nGraphics: GeForce 450GT or Radeon HD 5750 or better, with 512Mb or greater.\r\nDirectX: Version 11.', '2022-01-15', 5);

-- --------------------------------------------------------

--
-- Structure de la table `partenaires`
--

DROP TABLE IF EXISTS `partenaires`;
CREATE TABLE IF NOT EXISTS `partenaires` (
  `ID_partenaire` int(11) NOT NULL AUTO_INCREMENT,
  `nom_partenaire` varchar(50) NOT NULL,
  `site_web` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_partenaire`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `partenaires`
--

INSERT INTO `partenaires` (`ID_partenaire`, `nom_partenaire`, `site_web`) VALUES
(9, 'INSA centre VAL DE LOIRE', 'https://www.insa-centrevaldeloire.fr/fr/'),
(10, 'POLYTECH Angers', 'http://www.polytech-angers.fr/fr/index.html'),
(14, 'INSA DE Toulouse', 'https://international.insa-toulouse.fr/'),
(15, 'EIL CÃ´te dâ€™Opale ', 'https://www.eilco-ulco.fr/');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
