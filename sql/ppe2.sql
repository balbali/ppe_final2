-- phpMyAdmin SQL Dump
-- version 4.1.12deb2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 24 Avril 2014 à 17:13
-- Version du serveur :  5.6.17-1~dotdeb.1
-- Version de PHP :  5.4.27-1~dotdeb.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

--
-- Base de données :  `sejours`
--

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE IF NOT EXISTS `logement` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `type_log` varchar(255) NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `logement`
--

INSERT INTO `logement` (`id_log`, `type_log`) VALUES
(1, 'Logement A'),
(2, 'Logement B'),
(3, 'Logement C'),
(4, 'Logement D'),
(5, 'dcvbsffgsdg'),
(6, 'dsggqsd');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int(11) NOT NULL AUTO_INCREMENT,
  `semaine_reservation` int(11) NOT NULL,
  `user_reservation` int(11) NOT NULL,
  `date_reservation` datetime NOT NULL,
  `site_reservation` int(11) NOT NULL,
  `log_reservation` int(11) NOT NULL,
  `pension_reservation` tinyint(1) NOT NULL,
  `menage_reservation` tinyint(1) NOT NULL,
  `valide_reservation` tinyint(1) NOT NULL DEFAULT '0',
  `paye_reservation` tinyint(1) NOT NULL DEFAULT '0',
  KEY `id_reservation` (`id_reservation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `semaine_reservation`, `user_reservation`, `date_reservation`, `site_reservation`, `log_reservation`, `pension_reservation`, `menage_reservation`, `valide_reservation`, `paye_reservation`) VALUES
(1, 54, 1, '0000-00-00 00:00:00', 0, 1, 1, 1, 0, 0),
(2, 5, 1, '0000-00-00 00:00:00', 1, 2, 0, 0, 1, 0),
(3, 1, 1, '0000-00-00 00:00:00', 1, 4, 0, 1, 1, 0),
(4, 1, 1, '0000-00-00 00:00:00', 1, 1, 1, 1, 1, 0),
(5, 1, 2, '0000-00-00 00:00:00', 1, 1, 1, 1, 1, 0),
(6, 44, 2, '0000-00-00 00:00:00', 1, 1, 0, 0, 1, 0),
(7, 44, 2, '2013-11-18 14:13:03', 1, 1, 0, 0, 1, 0),
(8, 44, 2, '2013-11-18 14:14:57', 1, 1, 0, 0, 1, 0),
(9, 48, 1, '2013-11-25 14:27:42', 1, 2, 0, 0, 0, 0),
(10, 48, 1, '2013-11-25 14:48:09', 1, 1, 0, 0, 0, 0),
(11, 48, 1, '2013-11-25 14:48:32', 2, 1, 1, 0, 0, 0),
(12, 48, 1, '2013-11-25 14:49:40', 1, 1, 0, 0, 0, 0),
(13, 48, 1, '2013-11-25 14:49:57', 1, 1, 0, 0, 0, 0),
(14, 48, 1, '2013-11-25 14:51:55', 1, 1, 0, 0, 0, 0),
(15, 48, 1, '2013-11-25 14:52:13', 1, 1, 0, 0, 0, 0),
(16, 48, 1, '2013-11-25 14:52:35', 1, 1, 0, 0, 1, 1),
(17, 48, 1, '2013-11-25 14:54:47', 1, 1, 1, 0, 1, 1),
(18, 48, 1, '2013-11-25 15:05:42', 1, 2, 1, 0, 1, 1),
(19, 10, 7, '2014-03-24 01:06:34', 1, 4, 1, 1, 0, 1),
(20, 48, 2, '2014-04-23 11:46:49', 1, 2, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `semaine`
--

CREATE TABLE IF NOT EXISTS `semaine` (
  `id_semaine` int(11) NOT NULL AUTO_INCREMENT,
  `num_semaine` int(11) NOT NULL,
  `zone_semaine` int(11) NOT NULL,
  PRIMARY KEY (`id_semaine`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `semaine`
--

INSERT INTO `semaine` (`id_semaine`, `num_semaine`, `zone_semaine`) VALUES
(1, 9, 3),
(2, 10, 3),
(3, 9, 3),
(4, 10, 3),
(5, 0, 1),
(6, 0, 1),
(9, 0, 1),
(10, 0, 1),
(11, 0, 1),
(12, 0, 1),
(18, 0, 0),
(22, 48, 1),
(23, 49, 1),
(24, 16, 1),
(25, 17, 1),
(26, 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

CREATE TABLE IF NOT EXISTS `site` (
  `id_site` int(11) NOT NULL AUTO_INCREMENT,
  `nom_site` varchar(255) NOT NULL,
  KEY `id_site` (`id_site`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `site`
--

INSERT INTO `site` (`id_site`, `nom_site`) VALUES
(1, 'Jura'),
(2, 'Mexique'),
(3, 'Truc');

-- --------------------------------------------------------

--
-- Structure de la table `site_logement`
--

CREATE TABLE IF NOT EXISTS `site_logement` (
  `id_site` int(11) NOT NULL,
  `id_log` int(11) NOT NULL,
  `nb_log_sl` int(11) NOT NULL,
  `entree_sl` tinyint(1) NOT NULL,
  `nb_piece_sl` int(11) NOT NULL,
  `nb_lit_sl` int(11) NOT NULL,
  `wc_sl` tinyint(1) NOT NULL,
  `balcon_sl` tinyint(1) NOT NULL,
  `cloison_sl` tinyint(1) NOT NULL,
  `douche_sl` tinyint(1) NOT NULL,
  `cout_sl` int(11) NOT NULL,
  KEY `id_site` (`id_site`,`id_log`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `site_logement`
--

INSERT INTO `site_logement` (`id_site`, `id_log`, `nb_log_sl`, `entree_sl`, `nb_piece_sl`, `nb_lit_sl`, `wc_sl`, `balcon_sl`, `cloison_sl`, `douche_sl`, `cout_sl`) VALUES
(1, 1, 40, 1, 2, 2, 1, 1, 0, 1, 1),
(1, 2, 8, 0, 1, 3, 1, 0, 1, 1, 2),
(1, 3, 12, 0, 1, 4, 1, 1, 1, 1, 3),
(1, 4, 1, 0, 1, 1, 1, 0, 0, 1, 4),
(2, 1, 5, 1, 2, 3, 1, 1, 0, 1, 5);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(255) NOT NULL,
  `prenom_user` varchar(255) NOT NULL,
  `date_user` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email_user` varchar(255) NOT NULL,
  `mdp_user` varchar(255) NOT NULL,
  `rang_user` tinyint(1) NOT NULL DEFAULT '0',
  `argent_user` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `nom_user`, `prenom_user`, `date_user`, `email_user`, `mdp_user`, `rang_user`, `argent_user`) VALUES
(1, 'AdminNom', 'Admin', '2013-11-04 13:32:21', 'admin@admin.fr', 'admin', 1, 919),
(2, 'admin', 'admin', '2013-11-04 13:32:21', 'admin@mail.com', 'admin', 1, 4162),
(3, '', 'root', '2013-11-18 15:37:17', '', '2504', 0, 0),
(4, 'test2', 'test2', '2013-11-18 15:46:56', 'test2@mail.com', 'test2', 0, 0),
(5, 'test3', 'test3', '2013-11-18 15:49:03', 'test3@mail.com', 'test3', 0, 0),
(6, 'test4', 'test4', '2013-11-18 16:04:25', 'test4@mail.com', 'test4', 0, 0),
(7, 'test', 'test', '2014-03-19 12:29:13', 'test@test.fr', 'test', 0, 500529),
(8, 'Bibi', 'Bibi', '2014-04-23 09:54:42', 'bibi@gmail.com', 'bibi', 0, 1000000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
