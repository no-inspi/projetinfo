-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 05 juin 2021 à 17:58
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
-- Base de données : `projetinfo1`
--

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
CREATE TABLE IF NOT EXISTS `evenements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prix` varchar(10) NOT NULL,
  `date` date DEFAULT NULL,
  `lien_image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`id`, `nom`, `prix`, `date`, `lien_image`) VALUES
(1, 'Uno nouvelle génération', '10', '2021-06-10', 'images/background_accueil.png'),
(2, 'Jeu de rôle', '5', '2021-06-08', 'images/background_accueil.png'),
(3, 'Jeu de rôle ', '8', '2021-06-24', 'images/background_accueil.png');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prix` int(10) NOT NULL,
  `stock` int(10) NOT NULL,
  `lien_image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `prix`, `stock`, `lien_image`) VALUES
(1, 'Mug La Guilde', 10, 150, 'images/background_accueil.png'),
(2, 'Tshirt La Guilde', 25, 68, 'images/background_accueil.png'),
(3, 'Pull La Guilde', 45, 85, 'images/background_accueil.png');

-- --------------------------------------------------------

--
-- Structure de la table `produitvendu`
--

DROP TABLE IF EXISTS `produitvendu`;
CREATE TABLE IF NOT EXISTS `produitvendu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idProduit` int(10) NOT NULL,
  `idUtilisateur` int(10) NOT NULL,
  `date_ajout` date NOT NULL,
  `montant` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUtilisateurs` (`idUtilisateur`),
  KEY `idProduit` (`idProduit`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produitvendu`
--

INSERT INTO `produitvendu` (`id`, `idProduit`, `idUtilisateur`, `date_ajout`, `montant`) VALUES
(1, 1, 5, '2021-06-05', 10),
(2, 3, 5, '2021-06-05', 45),
(3, 2, 5, '2021-06-05', 25),
(4, 2, 5, '2021-06-05', 25),
(5, 3, 5, '2021-06-05', 45),
(6, 3, 5, '2021-06-05', 45),
(7, 3, 5, '2021-06-05', 45);

-- --------------------------------------------------------

--
-- Structure de la table `typeutilisateurs`
--

DROP TABLE IF EXISTS `typeutilisateurs`;
CREATE TABLE IF NOT EXISTS `typeutilisateurs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typeutilisateurs`
--

INSERT INTO `typeutilisateurs` (`id`, `type`) VALUES
(1, 'admin'),
(2, 'membre');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `age` int(10) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `idtypeUtilisateurs` int(10) NOT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `codePostale` int(10) DEFAULT NULL,
  `telephone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`),
  KEY `idtypeutilisateurs` (`idtypeUtilisateurs`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `age`, `mail`, `mdp`, `pseudo`, `idtypeUtilisateurs`, `adresse`, `ville`, `codePostale`, `telephone`) VALUES
(1, 'ap', 'mathéo', 20, 'test@gmail.com', 'test', 'test', 1, '16 RUE DE LA FORGE', 'ST LEU LA FORET', 95320, '0672291212'),
(2, 'ap', 'charlie', 21, 'charlie.apcher@orange.fr', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'spartiaxy', 1, '16 RUE DE LA FORGE', 'ST LEU LA FORET', 95320, '0672291212'),
(3, 'ap', 'charlie', 21, 'charlie.apcher@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'spartiaxy', 1, '16 RUE DE LA FORGE', 'ST LEU LA FORET', 95320, '0672291212'),
(4, 'ap', 'charlie', 21, 'charlie.apcherorange@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'spartiaxy', 1, '16 RUE DE LA FORGE', 'ST LEU LA FORET', 95320, '0672291212'),
(5, 'apcher', 'charlie', 21, 'Spartiaxy@orange.fr', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'spartiaxy', 1, '16 RUE DE LA FORGE', 'ST LEU LA FORET', 95320, '+33 6 72 28 94 13');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produitvendu`
--
ALTER TABLE `produitvendu`
  ADD CONSTRAINT `idProduit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`id`),
  ADD CONSTRAINT `idUtilisateurs` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `idtypeutilisateurs` FOREIGN KEY (`idtypeUtilisateurs`) REFERENCES `typeutilisateurs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
