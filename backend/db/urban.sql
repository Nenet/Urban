-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 08 Septembre 2015 à 11:24
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `urban`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `Title`) VALUES
(1, 'Pour Elle'),
(2, 'Pour Lui'),
(3, 'Mèches'),
(4, 'Chignons'),
(5, 'Filles'),
(6, 'Garçons');

-- --------------------------------------------------------

--
-- Structure de la table `soins`
--

CREATE TABLE IF NOT EXISTS `soins` (
  `idSoins` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Price` decimal(3,0) NOT NULL,
  `Categories_id` int(11) NOT NULL,
  PRIMARY KEY (`idSoins`),
  KEY `Categories_id` (`Categories_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `soins`
--

INSERT INTO `soins` (`idSoins`, `Title`, `Price`, `Categories_id`) VALUES
(1, 'Coupe Cheveux Cours', '49', 1),
(2, 'Coupe Cheveux Longs', '59', 1),
(3, 'Brushing Cheuveux Courts', '24', 1),
(4, 'Brushing Cheveux Longs', '44', 1),
(5, 'Coupe Tondeuse', '15', 2),
(6, 'Coupe', '38', 2),
(7, 'Barbe', '10', 2),
(8, 'Couleur', '45', 1),
(9, 'Dessus ', '21', 3),
(10, 'Demi Tête', '29', 3),
(11, 'Tête Entière', '51', 3),
(12, 'Démaquillage', '51', 3),
(13, 'Chignon ', '65', 4),
(14, 'Chignon de Mariage avec Essai', '165', 4),
(15, 'Chignon de Mariage avec Essai à l''Infini', '180', 4),
(16, 'Jusqu''à 4 ans', '15', 5),
(17, 'Jusqu''à 4 ans', '15', 6),
(18, 'De 5 à 9 ans ', '28', 5),
(19, 'De 5 à 9 ans ', '21', 6),
(20, 'De 10 à 13 ans', '38', 5),
(21, 'De 10 à 13 ans ', '29', 6);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `soins`
--
ALTER TABLE `soins`
  ADD CONSTRAINT `categories_id` FOREIGN KEY (`Categories_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
