-- Adminer 4.2.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `redbook`;
CREATE DATABASE `redbook` /*!40100 DEFAULT CHARACTER SET utf8 */;
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

INSERT INTO `Comments` (`reponse`, `id`, `texte`, `date`, `auteur`, `post`) VALUES
(NULL,	1,	'Oui c\'etait un dingue ! \r\nUne fois il est rentre dans un bar, s\'est fait tire dessus, a encore desarme le type et l\'a emmene lui meme en prison ! ',	'2016-05-26 15:42:27',	'Theodore',	7),
(1,	2,	'Rhooolala il etait fou ce Teddie ! ',	'2016-05-26 15:45:22',	'Benjamin',	7),
(NULL,	3,	'D\'ailleurs ce qui l\'a sauve lors de son speech c\'etait le papier ou il avait note son discours ! \r\nIl a ralentit la balle. Il l\'a meme montre lors de ses paroles et jete en disant qu\'il fallait plus que ca pour le tuer. ',	'2016-05-26 15:46:40',	'Abraham',	7),
(NULL,	4,	'WOW ca a l\'air tellement bon ! J\'ai faim.',	'2016-05-27 08:34:13',	'Hodoritos',	12),
(4,	5,	'Oui tu as raison. Je trouve que ce commentaire apporte beaucoup a cette discussion. Merci beaucoup de partager tes passions.',	'2016-05-27 08:35:55',	'Miley Sir Usain Bold',	12),
(NULL,	6,	'Ohlala miam miam. ',	'2016-05-27 08:39:30',	'Charlie Test Zteron',	12),
(NULL,	7,	'J\'adore les animaux, cet article est super interessant, j\'en parlerai a mes petits enfants !',	'2016-05-27 08:28:10',	'Mamie_gateau',	1),
(NULL,	8,	'Ouiiiii les herissons c\'est trop trop trop mignon !!!! Je veux plus d\'articles sur ce sujet !',	'2016-05-27 08:31:23',	'LoverDu77',	4),
(7,	9,	'Je suis d\'accord avec toi. Et ce site est trop bien, les gens qui l\'ont crees sont genials, il faudrait leur donner une medaille et des vacances au Bahamas',	'2016-05-27 08:33:11',	'Mouton',	4),
(7,	10,	'Personnellement je prefererais voir des articles sur d\'autres animaux que les herissons. Les baleines c\'est mieux :)',	'2016-05-27 08:34:41',	'Grincheux_pas_si_grincheux',	4),
(NULL,	11,	'Cet article correspond parfaitement a ma vision de la congolexicomatisation des lois du marche ! Et puis, y a un herisson dedans, donc c\'est encore mieux',	'2016-05-27 08:36:57',	'EddieMalou',	5),
(11,	12,	'OUAH JE SUIS VOTRE PLUS GRAND FAN love love coeur coeur xxx antoine daniel forever yaoi',	'2016-05-27 08:38:00',	'JB_LOVER',	5),
(11,	13,	'Oh la la, encore un kikoo, il y en a beaucoup trop sur ce site...',	'2016-05-27 08:38:35',	'Pfffff',	5),
(NULL,	14,	'J\'ai rien compris a l\'article, quelqu\'un peut m\'expliquer svp ?',	'2016-05-27 08:41:22',	'BakaMan',	5),
(11,	15,	'Non.',	'2016-05-27 08:41:46',	'Troll',	5),
(NULL,	16,	'Je ne sais pas comment j\'ai atteri ici, mais je suis content !\r\nEt quand je suis content je vomis :)',	'2016-05-27 08:48:42',	'Simon Jeremi ',	5),
(NULL,	17,	'Hey, my name is Bryan and I\'m reading this article in my kitchen, it\'s really fun !',	'2016-05-27 08:52:47',	'Bryan',	5),
(17,	18,	'Bryan get out of the kitchen !',	'2016-05-27 08:54:14',	'Jenny',	5),
(NULL,	19,	'Franchement, moi quand je tape au hasard sur le clavier, ca donne pas ca hein... :P',	'2016-05-27 08:50:27',	'Amazzzed',	3),
(19,	20,	'ndshgqdopge ... moi ca donne plutot des trucs comme ca!',	'2016-05-27 08:53:30',	'Nawwak',	3),
(NULL,	21,	'Hahaha I love those little cutties! ',	'2016-05-27 08:58:20',	'LoveHedg',	2),
(NULL,	22,	'Why is there always hedgehog pictures on this site? Is this a thing or what? ^^',	'2016-05-27 08:59:57',	'AlwaysQuestionning',	2),
(NULL,	23,	'j\'aime les posts comme ca!',	'2016-05-27 09:03:53',	'hklhviohk',	3),
(NULL,	24,	'I prefer pandas!!! they are much more fun! ',	'2016-05-27 09:06:55',	'Panda4Ever',	2),
(24,	25,	'Yes! The red one are the better ones!',	'2016-05-27 09:08:43',	'',	2),
(NULL,	26,	'Ouais c\'est mon amie !',	'2016-05-27 09:10:53',	'Valentin Michalak',	15),
(NULL,	27,	'Je suis pas fan, je trouve ca un peu trop fantastique... Mais bon, chacun ses gouts !',	'2016-05-27 09:11:54',	'Quelqu\'un',	15),
(27,	28,	'Mer tai twa ta ocun gout, elle fer des trucs de fou, tu sorais meme pas fer la meme chose toi donc ter twa',	'2016-05-27 09:13:05',	'KikooLol',	15),
(27,	29,	'Go acheter un Bescherelle ! T\'as pas ete a l\'ecole ou quoi ?',	'2016-05-27 09:15:13',	'GrammarNazi',	15),
(NULL,	30,	'Wow, it\'s so amazing, I feel like we\'re in the future ! ... Wait.... Marty get back here !!',	'2016-05-27 09:08:18',	'Hoverboard',	17),
(NULL,	31,	'Ca me deprime, je me dis que je ne pourrais jamais etre aussi doue qu\'eux... :\'(',	'2016-05-27 09:10:13',	'EmoGirl',	17),
(31,	32,	'Je parle pas anglais, mais l\'image est cool ! D\'ailleurs, la realite virtuelle devient un vecteur de la societe moderne, et aide les artistes a exprimer leur anxietes propres a leur spleen interieur',	'2016-05-27 09:12:58',	'MecCultive',	17),
(NULL,	33,	'C\'est trop nul, y a meme pas de debats ici, moi je veux donner un point Godwin !!',	'2016-05-27 09:15:17',	'GrammarNazi',	17),
(NULL,	34,	'J\'aime les festivals ! J\'espere qu\'il fera beau par contre, il y a plus de saisons!',	'2016-05-27 09:16:08',	'MissMeteo',	16),
(34,	35,	'C\'est la faute a la congolexicomatisation des lois du marche !!',	'2016-05-27 09:16:41',	'EddieMalou',	16),
(34,	36,	'Encore toi ?? JTM FOREVER',	'2016-05-27 09:17:11',	'JB_Lover',	16),
(NULL,	37,	'Claro que si ! J\'en bave d\'avance.',	'2016-05-27 08:58:57',	'Sarah qui rit',	13),
(37,	38,	'J\'irai au bu ritos du monde avec toi.',	'2016-05-27 09:00:17',	'Michel Michel Michel',	13),
(NULL,	39,	'Oh ca me rappelle les cookies de ma voisine. Fondant a l\'interieur, croquant a l\'exterieur. J\'ai le cou qui fremit. ',	'2016-05-27 09:03:46',	'Benjamin PREJEANT',	14),
(39,	40,	'Haha, je te trouve tres drole. Quand je trouve ca drole je rigole.',	'2016-05-27 09:10:12',	'Michel Michel Michel',	14),
(NULL,	41,	'first, ah non',	'2016-05-27 09:12:38',	'Team4everAlone',	14),
(NULL,	42,	'Bonjour, je trouve cette blague un peu facile. #JeSuisNourriture',	'2016-05-27 09:16:54',	'Paul Itik',	11),
(42,	43,	'Tu es ce que tu manges.',	'2016-05-27 09:19:57',	'Julia Roberts',	11),
(NULL,	44,	'Merci d\'avoir fait passe le message ! ',	'2016-05-27 09:14:10',	'JeanJean',	8),
(NULL,	45,	'Ah je me demandais justement ou etait passe mon article, merci de prevenir (meme si c\'est un peu tard..!)',	'2016-05-27 09:18:03',	'Pierre Boulay',	8),
(45,	46,	'Pas la peine de rager c\'est deja sympa de leur part d\'avoir prevenu',	'2016-05-27 09:21:53',	'Louis',	8),
(NULL,	47,	'Merci a vous ! Vous faites vraiment du super boulot !',	'2016-05-27 09:24:33',	'Petit Pierre',	8),
(45,	48,	'Je suis d\'accord, il n y a pas de raison de s\'offusquer surtout qu\'ils viennent de regler le probleme.',	'2016-05-27 09:26:35',	'Kevin',	8),
(NULL,	49,	'Ce type etait ouf! Vous avez vu le film que Spielberg a fait sur lui? Il est vraiment genial si vous aimez bien cette periode de l\'histoire!! :)',	'2016-05-27 09:17:22',	'LincolnTheMan',	9),
(49,	50,	'J\'ai vraiment adore le film effectivement! Daniel Day Lewis etait vraiment tres bon dedans!',	'2016-05-27 09:19:54',	'FilmHistory',	9),
(NULL,	51,	'C\'est pas lui qui etait chasseur de vampire? mouahahahahaha',	'2016-05-27 09:21:39',	'VampireAndLincoln',	9),
(51,	52,	'Retourne regarder Twilight si tu veux des vampires! ',	'2016-05-27 09:25:00',	'NotHate',	9),
(NULL,	53,	'Et dire que maintenant Trump risque d\'etre le prochain president... Tristesse absolue',	'2016-05-27 09:27:25',	'EurkPower',	9);

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
('Ouille ',	'Pique',	5,	0,	'2016-05-23 13:37:04',	'http://www.chicagonow.com/wild-wisdom/files/2013/11/biddy-hedgehog-16.jpg',	'Bacon ipsum dolor amet swine corned beef ground round, pork chop turkey short ribs pig salami short loin. Bresaola shoulder picanha hamburger capicola shank. Hamburger ball tip kevin landjaeger ribeye ham hock alcatra. Beef ribs pork chop pork loin, kevin picanha swine tail doner porchetta brisket drumstick jowl pork belly tri-tip. Porchetta filet mignon picanha, ground round chicken short loin beef ribs ham turducken frankfurter pork loin',	1),
('Lost sheep',	'Titre',	4,	0,	'2016-05-23 13:38:20',	'http://kids.nationalgeographic.com/content/dam/kids/photos/animals/Mammals/H-P/hedgehog-closeup.jpg',	'Heeeey ! I like hedgehogs ;-)',	2),
('Lost Lamb',	'Zbrrrra',	4,	0,	'2016-05-23 13:38:59',	'http://animals.sandiegozoo.org/sites/default/files/juicebox_slides/hedgehog_05.jpg',	'Je ne sais pas vraiment de quoi parler du coup je tape sans regarder mon clavier, mais bon, je garantis rien. ',	3),
('Hedgy',	'J\'aime les h',	5,	8000,	'2016-05-23 13:40:06',	'https://pixabay.com/static/uploads/photo/2014/10/01/10/44/hedgehog-468228_960_720.jpg',	'Trolololllllll',	4),
('Animal Passion',	'Nous on aime encore plus les h',	5,	4294967295,	'2016-05-23 13:40:44',	'https://www.daysoftheyear.com/wp-content/images/hedgehog-day1-e1422787687319-804x382.jpg',	'Mouhahahahahahahahahahaha 3:D',	5),
('Abraham',	'Roosevelt etait un homme badass ! ',	2,	15,	'2016-05-26 15:40:21',	'https://s-media-cache-ak0.pinimg.com/236x/b1/03/83/b103836e8c67bca9bafc832c7af798e0.jpg',	'Roosevelt etait quelqu\'un de trop cool ! Il s\'est deja fait tire dessus avant un speech, a desarme le type, puis a donne son speech pendant plus d\'une heure ! :D',	7),
('Admin',	'Si votre sujet ne correspond a aucun de Redbook, postez ici ! ',	4,	5,	'2016-05-27 08:02:54',	'http://static1.squarespace.com/static/544829d1e4b068e746ba1397/54510a13e4b04ee588b3e517/54ad8019e4b0fa9da401dccd/1421085599459/',	'Salut les amis ! \r\nComme vous pouvez le deviner par ce titre, de plus en plus d\'articles se trouvent postes sur les mauvais sujets du site. \r\nJe fais donc une piqure de rappel afin que ce \"forum\" gagne en consistance ! \r\nJe vais commencer a faire migrer les articles inadaptes par ici, donc ne vous inquietez pas si vous ne les trouvez plus la ou vous les avez pose.',	8),
('Freddie Roose',	'Abbie aussi etait doue ! ',	2,	3,	'2016-05-27 08:11:06',	'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Abraham_Lincoln_%281809-1865%29_-_Daguerr%C3%A9otype_de_Lincoln_par_Alexander_Gardner_en_1863_%28coloris%C3%A9%29.jpg/624px-Abraham_Lincoln_%281809-1865%29_-_Daguerr%C3%A9otype_de_Lincoln_par_Alexander_Gardner_en_1863_%28coloris%C3%A9%29.jpg',	'Abraham Lincoln, ne le 12 fevrier 1809 dans le comte de Hardin au Kentucky et mort assassine le 15 avril 1865 e Washington, est le seizieme president des Etats-Unis. Il est elu pour deux mandats de quatre ans, en 1860 et 1864, sans terminer ce dernier. Il est le premier president republicain de l\'histoire du pays. Il a dirige les Etats-Unis lors de la pire crise constitutionnelle, militaire et morale de son histoire -la Guerre de Secession , et reussit a preserver l\'Union. C\'est au cours de celle-ci qu\'il fait ratifier le XIIIe amendement de la Constitution des Etats-Unis et abolit l\'esclavage. Il sort victorieux de la guerre mais meurt assassine deux mois plus tard, a la suite d\'un complot emanant de partisans confederes au debut de son second mandat.\r\n\r\nLincoln nait dans une famille modeste. Apres une enfance et adolescence sans relief, il apprend le droit grace a ses seuls talents d\'autodidacte et devient avocat itinerant. Entraine peu a peu sur le terrain de la politique, il dirige un temps le parti Whig et est elu a la Chambre des representants de l\'Illinois dans les annees 1830, puis a celle des Etats-Unis pour un mandat dans les annees 1840.',	9),
('F. Hollande',	'M-Moi ',	2,	12,	'2016-05-27 08:15:51',	'http://www.recette-gateau.eu/wp-content/uploads/2014/03/Flan-au-Lait.jpg',	'Be courageous,be you, be fu.. be proud of you.\r\nBecause we can be do, what we want to do.',	11),
('OpenGLouton',	'La raclette, une histoire de vie',	1,	0,	'2016-05-27 08:10:00',	'http://img0.ndsstatic.com/cuisine/raclette-classique_179190_w620.jpg',	'Un plat qui n\'a guere de saison. Un plat qui est synonyme de partage, de bonheur, de discussion. Il repond a tous les problemes du monde. La raclette, un plat intemporel, qui represente a lui-meme la democratie. ',	12),
('GitPullOver',	'Le burritos dans toute sa splendeur',	1,	10,	'2016-05-27 08:12:17',	'http://images.marmitoncdn.org/recipephotos/multiphoto/31/31a16e4f-d422-4f84-9671-663b7c1aabf7_normal.jpg',	'Le burritos montre la diversite. Les legumes se melangent a la viande pour former un combo de saveur. Les vrais savent.',	13),
('Gordon Ramsey Bolton',	'Patrick, un petit cookie ?',	1,	4,	'2016-05-27 08:16:03',	'http://images.media-allrecipes.com/userphotos/720x405/1107530.jpg',	'Le cookie n\'est pas utilise seulement pour le web. Il est egalement tellement savoureux, qu\'on le savourerait. Une pepite !',	14),
('LaPhotographe',	'Photographie - Julie de Waroquier',	3,	24,	'2016-05-27 08:06:08',	'https://format-com-cld-res.cloudinary.com/image/private/s--H-c9jI-y--/c_limit,g_center,h_65535,w_1600/a_auto,fl_keep_iptc.progressive,q_95/4498-13213464-Vain_waves_jpg1.jpg',	'Hey les artistes !\r\n\r\nSi vous ne le connaissez pas encore, empressez vous de decouvrir l\'univers fantastique de Julie de Waroquier !\r\n\r\nC\'est une artiste francaise qui a deja remp\r\nrte pleins de prix, dont certains a l\'international !\r\n\r\nCes travaux sont vraiment magnifiques. Elle realise des montages tres poetique et fantastiques. Son travail est tres inspirant !\r\n\r\nAllez jeter un coup d\'oeil a sa page ici : <a href=\"http://www.juliedewaroquier.com/\">Julie de Waroquier</a>',	15),
('Juju',	'Rose Beton',	3,	7,	'2016-05-24 08:14:10',	'http://www.cultures.toulouse.fr/documents/10180/18200849/RoseBeton2016_ip.jpg?t=1461675862210',	'Salut tout le monde !\r\n\r\nEst-ce que vous avez ete au Festival Rose Beton ce printemps ? Vous en avez pense quoi ? J\'hesite encore a y aller...\r\n\r\nPour ceux qui ne connaissent pas, Rose Beton est un festival a Toulouse ! Ce festival met a l\'honneur le graffiti a travers plusieurs expositions !',	16),
('Google',	'Virtual reality and art',	3,	0,	'2016-05-27 08:59:16',	'http://www.bangkokpost.com/media/content/20160506/1724921.jpg',	'Tilt Brush is a new techno by Google.\r\n\r\nTilt Brush lets you paint in 3D space with virtual reality.\r\nYour room is your canvas. Your palette is your imagination. The possibilities are endless.\r\n\r\n\"Tilt Brush is Like Microsoft Paint For The Year 2020\" - Fast Company\r\n\r\n\"A Drawing Tool with Style.\r\nMost drawing apps are dull, but Tilt Brush has a user interface that looks like something out of a blockbuster sci-fi flick.\" - Wired\r\n\r\nDiscover it at : <a href=\"http://www.tiltbrush.com/\">http://www.tiltbrush.com/</a>\r\n',	17);

DROP TABLE IF EXISTS `Sujet`;
CREATE TABLE `Sujet` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `titre` (`titre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Sujet` (`id`, `titre`) VALUES
(5,	'Animals'),
(3,	'Art'),
(1,	'Food Porn'),
(2,	'History'),
(4,	'Misc.');

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

-- 2016-05-27 09:36:30
