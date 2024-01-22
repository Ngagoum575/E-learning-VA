-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 22 jan. 2024 à 13:45
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
-- Base de données : `visionacademie`
--

-- --------------------------------------------------------

--
-- Structure de la table `auth_app`
--

DROP TABLE IF EXISTS `auth_app`;
CREATE TABLE IF NOT EXISTS `auth_app` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `pwdCpte` varchar(30) NOT NULL,
  `listformation` varchar(80) NOT NULL,
  `file` varchar(120) NOT NULL,
  `location` varchar(120) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auth_app`
--

INSERT INTO `auth_app` (`id`, `email`, `pwdCpte`, `listformation`, `file`, `location`, `status`) VALUES
(1, 'businessblondel247@gmail.com', 'nhbgvf3', 'react/Nodejs', 'Cv-Blondel-Camerounais-up.pdf', 'public/file/comptes/Cv-Blondel-Camerounais-up.pdf', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_reset`
--

DROP TABLE IF EXISTS `password_reset`;
CREATE TABLE IF NOT EXISTS `password_reset` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `emailCpte` varchar(80) NOT NULL,
  `token` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `useradmin`
--

DROP TABLE IF EXISTS `useradmin`;
CREATE TABLE IF NOT EXISTS `useradmin` (
  `idCpte` int(5) NOT NULL AUTO_INCREMENT,
  `loginCpte` varchar(30) NOT NULL,
  `pwdCpte` varchar(30) NOT NULL,
  `fctCpte` varchar(30) NOT NULL,
  `telCpte` varchar(30) DEFAULT NULL,
  `emailCpte` varchar(30) NOT NULL,
  `dateCreationCpte` varchar(30) NOT NULL,
  `file` varchar(80) NOT NULL,
  `location` varchar(80) NOT NULL,
  `etatCpte` varchar(20) NOT NULL DEFAULT 'ACTIF',
  PRIMARY KEY (`idCpte`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `useradmin`
--

INSERT INTO `useradmin` (`idCpte`, `loginCpte`, `pwdCpte`, `fctCpte`, `telCpte`, `emailCpte`, `dateCreationCpte`, `file`, `location`, `etatCpte`) VALUES
(1, 'wendygo', '0WLuqXJ4', 'Administrateur', '(+237) 675-235-234', 'angie@gmail.com', '15-01-2023', 'felicia.jpg', 'public/img/comptes/felicia.jpg', 'ACTIF'),
(7, 'c13a', 'yTO0QM8I', 'Administrateur', '693550293', 'businessblondel247@gmail.com', '21-01-2024', 'felicia.jpg', 'public/img/comptes/felicia.jpg', 'ACTIF'),
(8, '92as', 'FTs8x7IB', 'Enseignant', '699663269', 'abelleacaciane@gmail.com', '22-01-2024', 'profil_cambuse.png', 'public/img/comptes/profil_cambuse.png', 'ACTIF');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
