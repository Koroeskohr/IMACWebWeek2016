-- Adminer 4.2.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `redbook`;

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
  `auteur` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `sujet` int(10) unsigned NOT NULL,
  `likes` int(10) unsigned NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` text NOT NULL,
  `texte` text NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `sujet` (`sujet`),
  CONSTRAINT `Post_ibfk_4` FOREIGN KEY (`sujet`) REFERENCES `Sujet` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Post` (`auteur`, `titre`, `sujet`, `likes`, `date`, `image`, `texte`, `id`) VALUES
('1',	'Pique',	4,	0,	'2016-05-23 13:37:04',	'http://www.chicagonow.com/wild-wisdom/files/2013/11/biddy-hedgehog-16.jpg',	'Bacon ipsum dolor amet swine corned beef ground round, pork chop turkey short ribs pig salami short loin. Bresaola shoulder picanha hamburger capicola shank. Hamburger ball tip kevin landjaeger ribeye ham hock alcatra. Beef ribs pork chop pork loin, kevin picanha swine tail doner porchetta brisket drumstick jowl pork belly tri-tip. Porchetta filet mignon picanha, ground round chicken short loin beef ribs ham turducken frankfurter pork loin',	1),
('1',	'Titre',	2,	0,	'2016-05-23 13:38:20',	'http://kids.nationalgeographic.com/content/dam/kids/photos/animals/Mammals/H-P/hedgehog-closeup.jpg',	'Heeeey ! I like hedgehogs ;-)',	2),
('1',	'Zbrrrra',	3,	0,	'2016-05-23 13:38:59',	'http://animals.sandiegozoo.org/sites/default/files/juicebox_slides/hedgehog_05.jpg',	'Je ne sais pas vraiment de quoi parler du coup je tape sans regarder mon clavier, mais bon, je garantis rien. ',	3),
('1',	'J\'aime les h',	1,	8000,	'2016-05-23 13:40:06',	'https://pixabay.com/static/uploads/photo/2014/10/01/10/44/hedgehog-468228_960_720.jpg',	'Trolololllllll',	4),
('1',	'Nous on aime encore plus les h',	1,	4294967295,	'2016-05-23 13:40:44',	'https://www.daysoftheyear.com/wp-content/images/hedgehog-day1-e1422787687319-804x382.jpg',	'Mouhahahahahahahahahahaha 3:D',	5);

DROP TABLE IF EXISTS `Sujet`;
CREATE TABLE `Sujet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `titre` (`titre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Sujet` (`id`, `titre`) VALUES
(5,	'Animals'),
(2,	'History'),
(4,	'Misc.'),
(1,	'Politics'),
(3,	'Sport');

DROP TABLE IF EXISTS `Tag`;
CREATE TABLE `Tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) CHARACTER SET utf32 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Tag` (`id`, `nom`) VALUES
(1,	'Taxidermy'),
(2,	'Food Porn'),
(3,	'Politics'),
(4,	'Games'),
(5,	'Aww'),
(6,	'Gif'),
(7,	'Kitten'),
(8,	'Sexy'),
(9,	'Soccer'),
(10,	'Taggle'),
(11,	'Graffiti'),
(12,	'No Filter'),
(13,	'Dogs'),
(14,	'Business'),
(15,	'Design'),
(16,	'History'),
(17,	'Sport'),
(18,	'Hedgehog'),
(19,	'jhjkhkhhk');

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

INSERT INTO `Tagge` (`idPost`, `idTag`) VALUES
(1,	1),
(2,	4),
(2,	19),
(4,	5),
(5,	7),
(5,	10);

-- 2016-05-26 13:32:55
