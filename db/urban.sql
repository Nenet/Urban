-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 06 Septembre 2015 à 22:03
-- Version du serveur :  5.6.21
-- Version de PHP :  5.5.19

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
`id` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `Title`) VALUES
(1, 'Pour Elle'),
(2, 'Pour Lui '),
(3, 'Mèches'),
(4, 'Chignons'),
(5, 'Filles'),
(6, 'Garçons');

-- --------------------------------------------------------

--
-- Structure de la table `pricelist`
--

CREATE TABLE IF NOT EXISTS `pricelist` (
`idPriceList` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `entrepriseName` varchar(255) DEFAULT NULL,
  `Soins_idSoins` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `soins`
--

CREATE TABLE IF NOT EXISTS `soins` (
`idSoins` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Price` decimal(3,0) DEFAULT NULL,
  `Categories_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `soins`
--

INSERT INTO `soins` (`idSoins`, `Title`, `Price`, `Categories_id`) VALUES
(11, 'Coupe cheveux courts', '49', 1),
(13, 'Coupe cheveux longs', '59', 1),
(14, 'Brushing cheveux courts', '34', 1),
(15, 'Brushing cheveux longs', '44', 1),
(16, 'Coupe "tondeuse"', '15', 2),
(17, 'Coupe', '38', 2),
(18, 'Barbe ', '10', 2),
(19, 'Couleur', '45', 1),
(20, 'Dessus', '21', 3),
(21, 'Demi tête', '29', 3),
(22, 'Tête entière', '51', 3),
(23, 'Démaquillage', '51', 3),
(24, 'Chignon', '65', 4),
(25, 'Chignon de mariage avec essai', '165', 4),
(26, 'Chignon de mariage avec essai à l''infini', '180', 4),
(27, 'Jusqu''à 4 ans', '15', 5),
(28, 'Jusqu''à 4 ans', '15', 6),
(29, 'De 5 à 9 ans ', '28', 5),
(30, 'De 5 à 9 ans ', '21', 6),
(31, 'De 10 à 13 ans ', '38', 5),
(32, 'De 10 à 13 ans ', '29', 6);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pricelist`
--
ALTER TABLE `pricelist`
 ADD PRIMARY KEY (`idPriceList`), ADD KEY `fk_PriceList_Soins1_idx` (`Soins_idSoins`);

--
-- Index pour la table `soins`
--
ALTER TABLE `soins`
 ADD PRIMARY KEY (`idSoins`), ADD KEY `fk_Soins_Categories_idx` (`Categories_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `pricelist`
--
ALTER TABLE `pricelist`
MODIFY `idPriceList` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `soins`
--
ALTER TABLE `soins`
MODIFY `idSoins` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `pricelist`
--
ALTER TABLE `pricelist`
ADD CONSTRAINT `fk_PriceList_Soins1` FOREIGN KEY (`Soins_idSoins`) REFERENCES `soins` (`idSoins`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `soins`
--
ALTER TABLE `soins`
ADD CONSTRAINT `fk_Soins_Categories` FOREIGN KEY (`Categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
