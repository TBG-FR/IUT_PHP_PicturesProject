-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 26 Mars 2010 à 13:57
-- Version du serveur: 5.1.36
-- Version de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `auteur`, `commentaire`, `date_commentaire`) VALUES
(1, 'M@teo21', 'Un peu court ce billet !', '2010-03-25 16:49:53'),
(2, 'Maxime', 'Oui, ca commence pas tres fort ce blog...', '2010-03-25 16:57:16'),
(3, 'MultiKiller', '+1 !', '2010-03-25 17:12:52'),
(4, 'John', 'Preum''s !', '2010-03-27 18:59:49'),
(5, 'Maxime', 'Excellente analyse de la situation !\r\nIl y arrivera plus tot qu''on ne le pense !', '2010-03-27 22:02:13');
