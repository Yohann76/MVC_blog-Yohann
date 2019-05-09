-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 09 mai 2019 à 14:41
-- Version du serveur :  5.7.24
-- Version de PHP :  7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `anciennblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `createdAt` datetime NOT NULL,
  `chapo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `author`, `createdAt`,`chapo`) VALUES
(8, 'New artcicle a ', 'bonjour !  a', 'Yo a', '2019-04-29 03:05:06','chapo un'),
(25, 'nouvelle ', 'nouveau ', 'new abbbb', '2019-05-03 00:01:40','chapo deux'),
(52, 'Demonstrationaaa', 'bbnnnnaaa', 'ccnnnaaa', '2019-05-03 00:29:53','chapo trois');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `createdAt` datetime NOT NULL,
  `article_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `verified` varchar(45) DEFAULT 'false',
  PRIMARY KEY (`id`),
  KEY `fk_article_id` (`article_id`),
  KEY `fk_comment_users1_idx` (`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `role` varchar(300) DEFAULT 'membre',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `mail`, `password`, `role`) VALUES
(1, 'Yohann', 'Durand', 'yohanndurand76@gmail.com', '$2y$10$q8RjJklJ9e6uUCLoO0vtRe62m.U8reVLcDhECSZ4iFoGBa62nswcu', 'admin'),
(9, 'Louna', 'bozec', 'louna@gmail.com', '$2y$10$nCPCjfDqje5cY1UB46mYD.2FceNta/z1.KdPtfU109pUwhU/3kzj.', 'membre'),
(10, 'New', 'Bonjour', 'new@gmail.com', '$2y$10$sBZ6yPeOdPw9NBVZCb8LMOeTyXUISiYPVr/6vr4Isp3YCkgGo6GHW', 'membre'),
(11, 'a', 'b', 'ab@gmail.com', '$2y$10$QC36zrCU1shXUqY8EDxLz.7nV.2a4xH5raE/KxAN7aaj3aVwj4DTC', 'membre'),
(12, 'sacha', 'Durand', 'sachadurand6623@gmail.com', '$2y$10$XF3YNaV5IvtyGzC75MpqcehC3x9x4HiaMopxSmKBL6Lb0uBO0UacW', 'membre');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_article_id` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  ADD CONSTRAINT `fk_comment_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
