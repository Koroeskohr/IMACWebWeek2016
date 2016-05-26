-- Adminer 4.2.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `Comments`;
CREATE TABLE `Comments` (
  `reponse` int(10) unsigned DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `texte` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `auteur` varchar(255) NOT NULL,
  `post` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post` (`post`),
  KEY `reponse` (`reponse`),
  CONSTRAINT `Comments_ibfk_3` FOREIGN KEY (`post`) REFERENCES `Post` (`id`) ON DELETE CASCADE,
  CONSTRAINT `Comments_ibfk_4` FOREIGN KEY (`reponse`) REFERENCES `Comments` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Post`;
CREATE TABLE `Post` (
  `titre` varchar(255) NOT NULL,
  `sujet` int(10) unsigned NOT NULL,
  `likes` int(10) unsigned NOT NULL DEFAULT '0',
  `auteur` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` text NOT NULL,
  `texte` text NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `sujet` (`sujet`),
  CONSTRAINT `Post_ibfk_2` FOREIGN KEY (`sujet`) REFERENCES `Sujet` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Sujet`;
CREATE TABLE `Sujet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `titre` (`titre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tag`;
CREATE TABLE `Tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) CHARACTER SET utf32 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Tagge`;
CREATE TABLE `Tagge` (
  `idPost` int(10) unsigned NOT NULL DEFAULT '0',
  `idTag` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idPost`,`idTag`),
  KEY `idPost` (`idPost`),
  KEY `idTag` (`idTag`),
  CONSTRAINT `Tagge_ibfk_3` FOREIGN KEY (`idPost`) REFERENCES `Post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Tagge_ibfk_4` FOREIGN KEY (`idTag`) REFERENCES `Tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2016-05-26 09:08:11
