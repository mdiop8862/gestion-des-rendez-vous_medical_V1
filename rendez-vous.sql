-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 25 oct. 2021 à 14:48
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rendez-vous`
--

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

DROP TABLE IF EXISTS `medecin`;
CREATE TABLE IF NOT EXISTS `medecin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `addresse_domicile` varchar(50) NOT NULL,
  `addresse_email` varchar(50) NOT NULL,
  `tel` int NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_specialite` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`id`, `nom`, `prenom`, `addresse_domicile`, `addresse_email`, `tel`, `password`, `id_specialite`) VALUES
(1, 'gning', 'ahmed', 'hersent', 'gnignahmed@gmail.com', 776864472, 'thiane', 1),
(2, 'diop', 'idy', 'patte doie', 'gningdof@gmail.com', 785236547, 'tass', 2),
(3, 'sarr', 'moussa', '335896478', 'sarrm@gmail.com', 776593214, 'ras', 5),
(4, 'faye', 'moussa', 'mariste', 'fayemoussa@gmail.com', 775896541, 'tall', 6),
(7, 'ly', 'baba', 'pikine', 'lybaba@gmail.com', 774568987, 'yl', 9);

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `age` int NOT NULL,
  `addresse` varchar(50) NOT NULL,
  `tel_mobile` int NOT NULL,
  `tel_fixe` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id`, `nom`, `prenom`, `age`, `addresse`, `tel_mobile`, `tel_fixe`) VALUES
(2, 'diop', 'astou', 26, 'bargny', 769514235, 339874561),
(3, 'fall', 'moussa', 25, 'pout', 776589878, 332565487),
(4, 'dieng', 'modou', 25, 'yoff', 785632569, 335968741),
(5, 'sarr', 'malick', 15, 'hersent', 775963256, 337854631);

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

DROP TABLE IF EXISTS `rendez_vous`;
CREATE TABLE IF NOT EXISTS `rendez_vous` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date_dispo` date NOT NULL,
  `heure_dispo` time NOT NULL,
  `id_medecin` int NOT NULL,
  `id_patient` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `rendez_vous`
--

INSERT INTO `rendez_vous` (`id`, `date_dispo`, `heure_dispo`, `id_medecin`, `id_patient`) VALUES
(1, '2021-03-10', '12:00:00', 2, 2),
(2, '2021-05-10', '12:00:00', 2, 3),
(3, '2021-11-24', '11:30:00', 2, 4),
(4, '2021-02-25', '10:00:00', 3, 5);

-- --------------------------------------------------------

--
-- Structure de la table `secretaire`
--

DROP TABLE IF EXISTS `secretaire`;
CREATE TABLE IF NOT EXISTS `secretaire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `age` int NOT NULL,
  `password` varchar(50) NOT NULL,
  `tel_mobile` int NOT NULL,
  `tel_fix` int NOT NULL,
  `addresse_domicile` varchar(50) NOT NULL,
  `addresse_email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `secretaire`
--

INSERT INTO `secretaire` (`id`, `nom`, `prenom`, `age`, `password`, `tel_mobile`, `tel_fix`, `addresse_domicile`, `addresse_email`) VALUES
(1, 'sarr', 'adji', 25, 'sonko', 785963214, 338356987, 'malika', 'sarradji@gmail.com'),
(2, 'sarr', 'adji', 25, 'sonko', 785963214, 338356987, 'malika', 'sarradji@gmail.com'),
(3, 'sarr', 'adji', 25, 'dfezf', 785963214, 338356987, 'malika', 'sarradji@gmail.com'),
(4, 'sarr', 'adji', 25, 'dcsdcd', 785963214, 338356987, 'yoff', 'sarradji@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

DROP TABLE IF EXISTS `specialite`;
CREATE TABLE IF NOT EXISTS `specialite` (
  `nom` varchar(50) NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`nom`, `id`) VALUES
('ophtalmologue', 1),
('dentiste', 2),
('chirurgien', 5),
('chirurgien', 6),
('chirurgien', 7),
('chirurgien', 8),
('ophtalmologue', 9),
('ophtalmologue', 10),
('ophtalmologue', 11),
('ophtalmologue', 12);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
