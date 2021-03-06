-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 06 mars 2021 à 15:44
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
-- Base de données : `wazaaimmo`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

DROP TABLE IF EXISTS `annonces`;
CREATE TABLE IF NOT EXISTS `annonces` (
  `an_id` int NOT NULL AUTO_INCREMENT,
  `an_offre` char(1) NOT NULL COMMENT 'Type d''''offre. Lettres A, L ou V.',
  `an_type` tinyint NOT NULL COMMENT 'Type de bien',
  `an_pieces` tinyint DEFAULT NULL COMMENT 'Nombre de pièces (facultatif)',
  `an_ref` varchar(10) NOT NULL COMMENT 'Référence de l''''annonce',
  `an_titre` varchar(200) NOT NULL COMMENT 'Titre',
  `an_description` mediumtext NOT NULL COMMENT 'Description',
  `an_local` varchar(100) NOT NULL,
  `an_surf_hab` smallint DEFAULT NULL COMMENT 'Surface habitable (mètres carrés)',
  `an_surf_tot` int NOT NULL COMMENT 'Surface totale/terrain (mètres carrés)',
  `an_prix` int NOT NULL COMMENT 'Prix en euros',
  `an_diagnostic` char(1) NOT NULL COMMENT 'Lettre du diagnostic : A à G + V pour vierge',
  `an_d_ajout` date NOT NULL COMMENT 'Date d''''ajout',
  `an_d_modif` datetime DEFAULT NULL COMMENT 'Date de modification',
  PRIMARY KEY (`an_id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`an_id`, `an_offre`, `an_type`, `an_pieces`, `an_ref`, `an_titre`, `an_description`, `an_local`, `an_surf_hab`, `an_surf_tot`, `an_prix`, `an_diagnostic`, `an_d_ajout`, `an_d_modif`) VALUES
(1, 'A', 1, 5, '20A100', '100 km de Paris, maison 85m2 avec jardin', 'Exclusivité : dans bourg tous commerces avec écoles, maison d\'environ 85m2 habitables, mitoyenne, offrant en rez-de-chaussée, une cuisine aménagée, un salon-séjour, un WC et une loggia et à l\'étage, 3 chambres dont 2 avec placard, salle de bains et WC séparé. 2 garages. Le tout sur une parcelle de 225m2. Chauffage individuel clim réversible, DPE : F. ', 'Somme (80), 1h00 de Paris', 85, 225, 197000, 'F', '2020-11-13', NULL),
(2, 'A', 2, 1, '55A456', 'nibh lacinia orci, consectetuer euismod', 'ornare. Fusce mollis. Duis sit amet diam eu dolor egestas', 'ullamcorper, velit in aliquet', 63, 404, 0, 'F', '2021-01-08', '2021-11-01 00:00:00'),
(3, 'V', 2, 6, '99P471', 'adipiscing fringilla, porttitor vulputate, posuere vulputate, lacus. Cras interdum. Nunc', 'Ut tincidunt orci quis lectus. Nullam suscipit, est ac facilisis', 'eleifend. Cras sed leo.', 51, 291, 0, 'E', '2021-08-08', '2020-03-26 00:00:00'),
(4, 'V', 1, 4, '21L965', 'urna justo faucibus lectus, a sollicitudin orci', 'faucibus id, libero. Donec consectetuer mauris id sapien. Cras dolor', 'velit eu sem. Pellentesque', 444, 561, 0, 'C', '2022-01-26', '2020-05-29 00:00:00'),
(5, 'V', 3, 6, '86Z56', 'eu arcu. Morbi sit amet massa. Quisque', 'tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam.', 'vitae diam. Proin dolor.', 251, 719, 0, 'B', '2020-10-15', '2022-01-23 00:00:00'),
(6, 'L', 2, 1, '55A456', 'vel lectus. Cum sociis natoque penatibus et magnis', 'sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus', 'lacinia at, iaculis quis,', 207, 598, 0, 'A', '2020-06-19', '2021-07-03 00:00:00'),
(7, 'V', 3, 2, '99P471', 'nibh vulputate mauris sagittis placerat. Cras dictum ultricies ligula.', 'luctus felis purus ac tellus. Suspendisse sed dolor. Fusce mi', 'Aenean eget magna. Suspendisse', 267, 110, 0, 'D', '2020-07-06', '2020-10-26 00:00:00'),
(8, 'A', 1, 4, '21L965', 'vulputate, risus a ultricies adipiscing, enim mi tempor', 'ipsum. Suspendisse non leo. Vivamus nibh dolor, nonummy ac, feugiat', 'eu tempor erat neque', 563, 542, 0, 'B', '2021-08-23', '2021-03-19 00:00:00'),
(9, 'L', 3, 6, '86Z56', 'feugiat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'nisi nibh lacinia orci, consectetuer euismod est arcu ac orci.', 'malesuada fames ac turpis', 485, 701, 0, 'F', '2021-03-11', '2021-09-24 00:00:00'),
(10, 'A', 3, 3, '55A456', 'pede. Cum sociis natoque penatibus et magnis dis', 'magna et ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor', 'semper auctor. Mauris vel', 172, 199, 0, 'A', '2020-08-22', '2020-09-08 00:00:00'),
(11, 'V', 2, 2, '99P471', 'semper cursus. Integer mollis. Integer', 'nec, cursus a, enim. Suspendisse aliquet, sem ut cursus luctus,', 'sem mollis dui, in', 314, 769, 0, 'V', '2020-08-26', '2020-10-29 00:00:00'),
(12, 'A', 2, 3, '21L965', 'ut ipsum ac mi eleifend', 'a, facilisis non, bibendum sed, est. Nunc laoreet lectus quis', 'ornare lectus justo eu', 73, 775, 0, 'V', '2020-07-07', '2020-04-04 00:00:00'),
(13, 'V', 2, 5, '86Z56', 'Ut semper pretium neque. Morbi quis urna. Nunc', 'elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar arcu', 'mauris ut mi. Duis', 131, 546, 0, 'A', '2021-08-31', '2020-02-20 00:00:00'),
(14, 'L', 1, 6, '55A456', 'eu neque pellentesque massa lobortis', 'suscipit, est ac facilisis facilisis, magna tellus faucibus leo, in', 'rutrum, justo. Praesent luctus.', 564, 559, 0, 'B', '2020-10-06', '2020-11-21 00:00:00'),
(15, 'A', 1, 5, '99P471', 'ante dictum cursus. Nunc mauris elit, dictum eu, eleifend nec,', 'justo. Praesent luctus. Curabitur egestas nunc sed libero. Proin sed', 'felis, adipiscing fringilla, porttitor', 327, 637, 0, 'V', '2021-12-31', '2020-09-19 00:00:00'),
(16, 'L', 3, 6, '21L965', 'dignissim tempor arcu. Vestibulum ut eros non', 'augue eu tellus. Phasellus elit pede, malesuada vel, venenatis vel,', 'dolor sit amet, consectetuer', 102, 141, 0, 'V', '2020-09-04', '2020-08-01 00:00:00'),
(17, 'L', 2, 4, '86Z56', 'facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula.', 'posuere cubilia Curae; Phasellus ornare. Fusce mollis. Duis sit amet', 'Fusce mollis. Duis sit', 190, 613, 0, 'B', '2020-04-17', '2021-11-08 00:00:00'),
(18, 'V', 1, 3, '55A456', 'est tempor bibendum. Donec felis orci, adipiscing non, luctus', 'auctor velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis', 'tellus. Suspendisse sed dolor.', 296, 75, 0, 'D', '2022-01-19', '2022-01-16 00:00:00'),
(19, 'L', 1, 2, '99P471', 'ipsum primis in faucibus orci luctus et ultrices', 'dolor vitae dolor. Donec fringilla. Donec feugiat metus sit amet', 'nonummy. Fusce fermentum fermentum', 226, 155, 0, 'B', '2020-10-13', '2020-07-30 00:00:00'),
(20, 'A', 2, 1, '21L965', 'ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros', 'nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra.', 'Duis mi enim, condimentum', 468, 70, 0, 'F', '2021-11-05', '2021-04-13 00:00:00'),
(21, 'A', 2, 6, '86Z56', 'in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus', 'eu, euismod ac, fermentum vel, mauris. Integer sem elit, pharetra', 'risus. Donec egestas. Aliquam', 582, 653, 0, 'G', '2021-09-30', '2021-05-13 00:00:00'),
(22, 'L', 1, 4, '55A456', 'eget varius ultrices, mauris ipsum', 'commodo at, libero. Morbi accumsan laoreet ipsum. Curabitur consequat, lectus', 'ipsum primis in faucibus', 285, 121, 0, 'E', '2020-02-01', '2021-06-01 00:00:00'),
(23, 'V', 1, 2, '99P471', 'Duis sit amet diam eu dolor egestas rhoncus.', 'porttitor eros nec tellus. Nunc lectus pede, ultrices a, auctor', 'ante dictum cursus. Nunc', 475, 716, 0, 'V', '2020-07-16', '2020-04-29 00:00:00'),
(24, 'L', 3, 2, '21L965', 'turpis egestas. Fusce aliquet magna a neque. Nullam ut', 'Nam porttitor scelerisque neque. Nullam nisl. Maecenas malesuada fringilla est.', 'interdum libero dui nec', 467, 117, 0, 'V', '2020-05-30', '2021-02-12 00:00:00'),
(25, 'A', 2, 5, '86Z56', 'in felis. Nulla tempor augue ac', 'augue id ante dictum cursus. Nunc mauris elit, dictum eu,', 'lacus. Ut nec urna', 278, 590, 0, 'B', '2020-07-27', '2021-10-17 00:00:00'),
(26, 'A', 2, 1, '55A456', 'viverra. Donec tempus, lorem fringilla ornare placerat, orci lacus', 'dolor sit amet, consectetuer adipiscing elit. Curabitur sed tortor. Integer', 'et magnis dis parturient', 189, 722, 0, 'D', '2021-06-29', '2020-02-14 00:00:00'),
(27, 'L', 3, 4, '99P471', 'Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis', 'dignissim magna a tortor. Nunc commodo auctor velit. Aliquam nisl.', 'risus. Quisque libero lacus,', 51, 121, 0, 'F', '2022-01-22', '2020-10-21 00:00:00'),
(28, 'A', 3, 3, '21L965', 'Donec tempor, est ac mattis semper, dui lectus', 'faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse eleifend.', 'Cras interdum. Nunc sollicitudin', 489, 416, 0, 'D', '2021-02-17', '2020-08-25 00:00:00'),
(29, 'A', 2, 3, '86Z56', 'ut cursus luctus, ipsum leo elementum sem, vitae aliquam eros', 'Nunc mauris elit, dictum eu, eleifend nec, malesuada ut, sem.', 'Vestibulum ut eros non', 311, 740, 0, 'D', '2021-08-27', '2020-08-14 00:00:00'),
(30, 'V', 2, 4, '55A456', 'tortor. Integer aliquam adipiscing lacus. Ut nec', 'nec luctus felis purus ac tellus. Suspendisse sed dolor. Fusce', 'arcu ac orci. Ut', 108, 469, 0, 'G', '2021-05-03', '2020-08-15 00:00:00'),
(31, 'V', 1, 1, '99P471', 'vitae mauris sit amet lorem semper auctor.', 'sem molestie sodales. Mauris blandit enim consequat purus. Maecenas libero', 'sed consequat auctor, nunc', 513, 149, 0, 'C', '2020-07-04', '2020-04-24 00:00:00'),
(32, 'L', 3, 1, '21L965', 'odio tristique pharetra. Quisque ac libero', 'lobortis, nisi nibh lacinia orci, consectetuer euismod est arcu ac', 'viverra. Donec tempus, lorem', 454, 731, 0, 'C', '2021-11-28', '2021-08-05 00:00:00'),
(33, 'L', 2, 5, '86Z56', 'urna. Nunc quis arcu vel quam dignissim pharetra. Nam', 'eget lacus. Mauris non dui nec urna suscipit nonummy. Fusce', 'nec, leo. Morbi neque', 444, 201, 0, 'D', '2021-05-26', '2021-11-02 00:00:00'),
(34, 'V', 3, 3, '55A456', 'quam, elementum at, egestas a, scelerisque sed, sapien. Nunc pulvinar', 'sodales purus, in molestie tortor nibh sit amet orci. Ut', 'id, ante. Nunc mauris', 494, 189, 0, 'C', '2021-05-10', '2021-10-20 00:00:00'),
(35, 'A', 3, 3, '99P471', 'quam, elementum at, egestas a, scelerisque sed, sapien.', 'Duis at lacus. Quisque purus sapien, gravida non, sollicitudin a,', 'eu dui. Cum sociis', 496, 403, 0, 'E', '2021-01-31', '2020-02-21 00:00:00'),
(36, 'A', 2, 6, '21L965', 'sed dolor. Fusce mi lorem, vehicula', 'iaculis enim, sit amet ornare lectus justo eu arcu. Morbi', 'lacus. Quisque purus sapien,', 105, 131, 0, 'A', '2020-08-13', '2021-11-04 00:00:00'),
(37, 'V', 3, 2, '86Z56', 'vehicula aliquet libero. Integer in magna. Phasellus dolor', 'cursus vestibulum. Mauris magna. Duis dignissim tempor arcu. Vestibulum ut', 'Nunc ullamcorper, velit in', 481, 515, 0, 'B', '2020-03-13', '2020-01-10 00:00:00'),
(38, 'V', 3, 2, '55A456', 'egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem', 'sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus', 'dolor egestas rhoncus. Proin', 252, 128, 0, 'E', '2021-03-10', '2020-05-25 00:00:00'),
(39, 'L', 2, 2, '99P471', 'ac urna. Ut tincidunt vehicula risus. Nulla eget', 'tempor diam dictum sapien. Aenean massa. Integer vitae nibh. Donec', 'mattis velit justo nec', 223, 629, 0, 'E', '2021-06-05', '2020-05-30 00:00:00'),
(40, 'L', 2, 2, '21L965', 'amet ante. Vivamus non lorem vitae odio sagittis semper. Nam', 'nec quam. Curabitur vel lectus. Cum sociis natoque penatibus et', 'et, commodo at, libero.', 326, 384, 0, 'C', '2020-09-07', '2021-03-07 00:00:00'),
(41, 'A', 3, 6, '86Z56', 'adipiscing elit. Curabitur sed tortor. Integer aliquam adipiscing lacus.', 'orci, in consequat enim diam vel arcu. Curabitur ut odio', 'ipsum non arcu. Vivamus', 323, 77, 0, 'E', '2020-03-12', '2021-06-01 00:00:00'),
(42, 'L', 1, 1, '55A456', 'facilisi. Sed neque. Sed eget lacus. Mauris', 'rutrum non, hendrerit id, ante. Nunc mauris sapien, cursus in,', 'a neque. Nullam ut', 113, 464, 0, 'A', '2020-02-02', '2020-07-08 00:00:00'),
(43, 'A', 2, 5, '99P471', 'iaculis quis, pede. Praesent eu dui. Cum sociis', 'mus. Donec dignissim magna a tortor. Nunc commodo auctor velit.', 'ornare tortor at risus.', 348, 587, 0, 'V', '2020-07-01', '2020-11-26 00:00:00'),
(44, 'L', 2, 5, '21L965', 'feugiat nec, diam. Duis mi enim, condimentum eget,', 'vitae risus. Duis a mi fringilla mi lacinia mattis. Integer', 'egestas a, scelerisque sed,', 501, 62, 0, 'V', '2020-02-10', '2022-01-19 00:00:00'),
(45, 'A', 2, 3, '86Z56', 'lectus, a sollicitudin orci sem eget massa. Suspendisse', 'purus mauris a nunc. In at pede. Cras vulputate velit', 'enim consequat purus. Maecenas', 589, 509, 0, 'A', '2021-12-18', '2021-10-23 00:00:00'),
(46, 'A', 1, 5, '55A456', 'aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis', 'ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem', 'rutrum non, hendrerit id,', 202, 505, 0, 'V', '2020-12-22', '2021-09-28 00:00:00'),
(47, 'L', 1, 6, '99P471', 'nibh lacinia orci, consectetuer euismod', 'Praesent eu nulla at sem molestie sodales. Mauris blandit enim', 'pretium et, rutrum non,', 308, 556, 0, 'V', '2021-06-30', '2020-06-08 00:00:00'),
(48, 'A', 1, 4, '21L965', 'Proin velit. Sed malesuada augue ut', 'orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi tristique', 'Morbi accumsan laoreet ipsum.', 298, 427, 0, 'V', '2020-11-10', '2020-03-09 00:00:00'),
(49, 'V', 1, 3, '86Z56', 'iaculis, lacus pede sagittis augue,', 'euismod mauris eu elit. Nulla facilisi. Sed neque. Sed eget', 'lectus sit amet luctus', 207, 788, 0, 'V', '2020-07-31', '2021-05-26 00:00:00'),
(50, 'L', 3, 3, '55A456', 'Phasellus in felis. Nulla tempor augue ac ipsum.', 'Mauris eu turpis. Nulla aliquet. Proin velit. Sed malesuada augue', 'eget, ipsum. Donec sollicitudin', 584, 276, 0, 'B', '2020-01-06', '2020-12-20 00:00:00'),
(51, 'A', 2, 4, '99P471', 'Aliquam nec enim. Nunc ut erat. Sed nunc est, mollis', 'amet ultricies sem magna nec quam. Curabitur vel lectus. Cum', 'diam at pretium aliquet,', 42, 793, 0, 'A', '2021-01-20', '2021-08-20 00:00:00'),
(52, 'A', 1, 5, '21L965', 'nisl arcu iaculis enim, sit amet ornare lectus', 'Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer vulputate,', 'ipsum. Suspendisse non leo.', 359, 411, 0, 'A', '2021-02-08', '2021-05-09 00:00:00'),
(53, 'V', 1, 4, '86Z56', 'orci. Phasellus dapibus quam quis diam. Pellentesque habitant morbi tristique', 'id, libero. Donec consectetuer mauris id sapien. Cras dolor dolor,', 'sed orci lobortis augue', 355, 117, 0, 'F', '2021-01-07', '2021-03-18 00:00:00'),
(54, 'V', 1, 6, '55A456', 'erat vitae risus. Duis a mi fringilla mi lacinia', 'ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus.', 'Aenean eget magna. Suspendisse', 352, 636, 0, 'V', '2020-06-22', '2020-04-29 00:00:00'),
(55, 'A', 1, 5, '99P471', 'ornare, elit elit fermentum risus,', 'est, vitae sodales nisi magna sed dui. Fusce aliquam, enim', 'ornare, elit elit fermentum', 432, 546, 0, 'E', '2021-11-12', '2021-07-11 00:00:00'),
(56, 'V', 2, 6, '21L965', 'quis turpis vitae purus gravida', 'sem magna nec quam. Curabitur vel lectus. Cum sociis natoque', 'Maecenas mi felis, adipiscing', 566, 554, 0, 'E', '2020-04-24', '2020-05-27 00:00:00'),
(57, 'L', 1, 4, '86Z56', 'Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor. Quisque', 'sed, sapien. Nunc pulvinar arcu et pede. Nunc sed orci', 'sed tortor. Integer aliquam', 317, 159, 0, 'G', '2020-01-21', '2020-02-14 00:00:00'),
(58, 'L', 2, 6, '55A456', 'sed sem egestas blandit. Nam nulla magna, malesuada vel,', 'Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue.', 'interdum libero dui nec', 348, 741, 0, 'F', '2020-12-09', '2021-06-22 00:00:00'),
(59, 'A', 3, 4, '99P471', 'Nulla tincidunt, neque vitae semper egestas, urna justo', 'sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit', 'cursus purus. Nullam scelerisque', 468, 62, 0, 'B', '2020-08-25', '2020-05-15 00:00:00'),
(60, 'V', 1, 6, '21L965', 'urna convallis erat, eget tincidunt dui augue eu tellus.', 'Nullam velit dui, semper et, lacinia vitae, sodales at, velit.', 'in felis. Nulla tempor', 92, 759, 0, 'C', '2021-12-06', '2020-06-08 00:00:00'),
(61, 'L', 3, 6, '86Z56', 'ac facilisis facilisis, magna tellus faucibus leo,', 'sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus', 'pede. Cum sociis natoque', 591, 127, 0, 'F', '2020-10-01', '2021-04-30 00:00:00'),
(62, 'V', 1, 4, '55A456', 'ac metus vitae velit egestas lacinia. Sed congue, elit', 'ridiculus mus. Aenean eget magna. Suspendisse tristique neque venenatis lacus.', 'vestibulum nec, euismod', 559, 682, 0, 'F', '2020-09-27', '2021-12-03 00:00:00'),
(63, 'L', 2, 2, '99P471', 'in, dolor. Fusce feugiat. Lorem', 'sem. Nulla interdum. Curabitur dictum. Phasellus in felis. Nulla tempor', 'libero at auctor ullamcorper,', 319, 285, 0, 'V', '2020-09-18', '2020-06-30 00:00:00'),
(64, 'V', 2, 1, '21L965', 'Nulla semper tellus id nunc interdum feugiat. Sed nec metus', 'Morbi accumsan laoreet ipsum. Curabitur consequat, lectus sit amet luctus', 'gravida non, sollicitudin a,', 301, 405, 0, 'V', '2022-01-27', '2021-02-13 00:00:00'),
(65, 'A', 1, 2, '86Z56', 'molestie. Sed id risus quis diam luctus lobortis. Class aptent', 'magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices.', 'ac, fermentum vel, mauris.', 506, 317, 0, 'C', '2020-09-15', '2021-11-14 00:00:00'),
(66, 'A', 2, 2, '55A456', 'vel nisl. Quisque fringilla euismod', 'facilisi. Sed neque. Sed eget lacus. Mauris non dui nec', 'iaculis quis, pede. Praesent', 580, 150, 0, 'D', '2021-06-17', '2021-03-01 00:00:00'),
(67, 'V', 1, 6, '99P471', 'rhoncus. Nullam velit dui, semper et, lacinia', 'feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem', 'eget metus. In nec', 116, 72, 0, 'V', '2020-02-23', '2021-11-27 00:00:00'),
(68, 'L', 1, 5, '21L965', 'erat eget ipsum. Suspendisse sagittis.', 'Donec est. Nunc ullamcorper, velit in aliquet lobortis, nisi nibh', 'Phasellus ornare. Fusce mollis.', 42, 772, 0, 'E', '2020-03-01', '2020-05-24 00:00:00'),
(69, 'V', 1, 6, '86Z56', 'quis diam. Pellentesque habitant morbi tristique senectus et netus', 'molestie. Sed id risus quis diam luctus lobortis. Class aptent', 'quis lectus. Nullam suscipit,', 563, 628, 0, 'D', '2021-01-11', '2020-07-19 00:00:00'),
(70, 'A', 1, 5, '55A456', 'commodo hendrerit. Donec porttitor tellus non magna. Nam ligula elit,', 'nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque,', 'Nullam velit dui, semper', 523, 126, 0, 'A', '2021-09-11', '2020-12-20 00:00:00'),
(71, 'A', 3, 6, '99P471', 'congue a, aliquet vel, vulputate eu, odio. Phasellus at augue', 'Suspendisse eleifend. Cras sed leo. Cras vehicula aliquet libero. Integer', 'Aenean eget metus. In', 533, 328, 0, 'A', '2020-03-05', '2020-11-14 00:00:00'),
(72, 'L', 2, 4, '21L965', 'gravida. Aliquam tincidunt, nunc ac mattis ornare,', 'Nunc lectus pede, ultrices a, auctor non, feugiat nec, diam.', 'consectetuer adipiscing elit. Curabitur', 597, 419, 0, 'A', '2021-07-19', '2020-07-01 00:00:00'),
(73, 'L', 3, 3, '86Z56', 'eu odio tristique pharetra. Quisque ac libero nec ligula consectetuer', 'neque. Sed eget lacus. Mauris non dui nec urna suscipit', 'non, bibendum sed, est.', 529, 658, 0, 'B', '2021-09-19', '2022-02-04 00:00:00'),
(74, 'V', 2, 3, '55A456', 'ullamcorper eu, euismod ac, fermentum vel,', 'tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio.', 'fringilla mi lacinia mattis.', 555, 614, 0, 'D', '2021-04-22', '2021-01-31 00:00:00'),
(75, 'A', 2, 4, '99P471', 'tristique pharetra. Quisque ac libero nec', 'ullamcorper, velit in aliquet lobortis, nisi nibh lacinia orci, consectetuer', 'ultrices posuere cubilia Curae;', 475, 707, 0, 'V', '2020-02-25', '2021-12-07 00:00:00'),
(76, 'A', 2, 6, '21L965', 'velit eu sem. Pellentesque ut ipsum ac mi', 'risus varius orci, in consequat enim diam vel arcu. Curabitur', 'in felis. Nulla tempor', 207, 739, 0, 'A', '2021-03-17', '2020-08-10 00:00:00'),
(77, 'V', 2, 4, '86Z56', 'tempor augue ac ipsum. Phasellus vitae mauris sit amet lorem', 'Donec vitae erat vel pede blandit congue. In scelerisque scelerisque', 'aptent taciti sociosqu ad', 328, 555, 0, 'A', '2021-04-08', '2020-08-27 00:00:00'),
(78, 'V', 2, 1, '55A456', 'mi enim, condimentum eget, volutpat ornare, facilisis eget, ipsum.', 'erat volutpat. Nulla dignissim. Maecenas ornare egestas ligula. Nullam feugiat', 'Etiam ligula tortor, dictum', 541, 149, 0, 'D', '2021-12-29', '2021-07-05 00:00:00'),
(79, 'V', 2, 5, '99P471', 'nisi. Cum sociis natoque penatibus et magnis dis parturient', 'non leo. Vivamus nibh dolor, nonummy ac, feugiat non, lobortis', 'elit. Nulla facilisi. Sed', 283, 568, 0, 'D', '2021-01-03', '2020-12-14 00:00:00'),
(80, 'A', 3, 4, '21L965', 'sed pede nec ante blandit', 'nulla. Cras eu tellus eu augue porttitor interdum. Sed auctor', 'mauris erat eget ipsum.', 247, 691, 0, 'V', '2020-01-25', '2021-03-09 00:00:00'),
(81, 'L', 2, 1, '86Z56', 'Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat,', 'erat. Etiam vestibulum massa rutrum magna. Cras convallis convallis dolor.', 'fermentum vel, mauris. Integer', 315, 153, 0, 'D', '2020-11-28', '2021-08-17 00:00:00'),
(82, 'V', 1, 1, '55A456', 'non ante bibendum ullamcorper. Duis cursus, diam', 'molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris.', 'eu tempor erat neque', 478, 328, 0, 'E', '2022-01-24', '2021-02-28 00:00:00'),
(83, 'A', 3, 2, '99P471', 'Vivamus sit amet risus. Donec egestas. Aliquam nec', 'Vivamus non lorem vitae odio sagittis semper. Nam tempor diam', 'iaculis nec, eleifend non,', 390, 262, 0, 'D', '2021-04-14', '2021-08-25 00:00:00'),
(84, 'V', 1, 6, '21L965', 'Proin ultrices. Duis volutpat nunc sit amet metus. Aliquam', 'nibh. Donec est mauris, rhoncus id, mollis nec, cursus a,', 'est. Nunc ullamcorper, velit', 215, 447, 0, 'E', '2020-04-01', '2021-06-02 00:00:00'),
(85, 'L', 1, 5, '86Z56', 'fermentum fermentum arcu. Vestibulum ante ipsum', 'metus sit amet ante. Vivamus non lorem vitae odio sagittis', 'dis parturient montes, nascetur', 509, 593, 0, 'C', '2021-10-29', '2020-02-08 00:00:00'),
(86, 'V', 1, 6, '55A456', 'ante. Vivamus non lorem vitae odio sagittis semper. Nam tempor', 'euismod in, dolor. Fusce feugiat. Lorem ipsum dolor sit amet,', 'Mauris ut quam vel', 359, 588, 0, 'E', '2021-08-14', '2021-03-29 00:00:00'),
(87, 'L', 2, 5, '99P471', 'sem. Nulla interdum. Curabitur dictum. Phasellus', 'augue. Sed molestie. Sed id risus quis diam luctus lobortis.', 'nunc, ullamcorper eu, euismod', 450, 385, 0, 'G', '2020-06-17', '2020-06-13 00:00:00'),
(88, 'A', 3, 4, '21L965', 'sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus', 'feugiat non, lobortis quis, pede. Suspendisse dui. Fusce diam nunc,', 'urna et arcu imperdiet', 114, 270, 0, 'E', '2020-08-02', '2021-05-21 00:00:00'),
(89, 'A', 2, 5, '86Z56', 'justo faucibus lectus, a sollicitudin orci sem eget massa. Suspendisse', 'convallis in, cursus et, eros. Proin ultrices. Duis volutpat nunc', 'at, egestas a, scelerisque', 499, 234, 0, 'A', '2021-02-23', '2021-07-14 00:00:00'),
(90, 'A', 2, 1, '55A456', 'dictum magna. Ut tincidunt orci quis', 'Suspendisse non leo. Vivamus nibh dolor, nonummy ac, feugiat non,', 'volutpat. Nulla dignissim. Maecenas', 74, 134, 0, 'C', '2021-12-11', '2020-02-06 00:00:00'),
(91, 'A', 1, 2, '99P471', 'ipsum cursus vestibulum. Mauris magna. Duis dignissim tempor', 'Aliquam ultrices iaculis odio. Nam interdum enim non nisi. Aenean', 'Cras eget nisi dictum', 191, 655, 0, 'V', '2020-03-02', '2020-08-20 00:00:00'),
(92, 'A', 2, 2, '21L965', 'vulputate mauris sagittis placerat. Cras dictum', 'libero mauris, aliquam eu, accumsan sed, facilisis vitae, orci. Phasellus', 'id nunc interdum feugiat.', 337, 278, 0, 'A', '2020-08-01', '2021-06-30 00:00:00'),
(93, 'L', 3, 4, '86Z56', 'Integer id magna et ipsum cursus', 'orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec', 'adipiscing fringilla, porttitor vulputate,', 545, 534, 0, 'D', '2021-12-11', '2021-09-23 00:00:00'),
(94, 'A', 2, 3, '55A456', 'gravida nunc sed pede. Cum sociis natoque penatibus', 'Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus,', 'ac mattis ornare, lectus', 476, 164, 0, 'V', '2020-09-08', '2021-12-17 00:00:00'),
(95, 'A', 2, 4, '99P471', 'mauris blandit mattis. Cras eget', 'tincidunt pede ac urna. Ut tincidunt vehicula risus. Nulla eget', 'volutpat ornare, facilisis eget,', 224, 655, 0, 'C', '2022-02-26', '2021-12-20 00:00:00'),
(96, 'L', 1, 6, '21L965', 'ipsum porta elit, a feugiat tellus lorem eu metus.', 'adipiscing ligula. Aenean gravida nunc sed pede. Cum sociis natoque', 'dolor dolor, tempus non,', 508, 440, 0, 'E', '2021-08-25', '2021-07-08 00:00:00'),
(97, 'V', 1, 6, '86Z56', 'Nunc sollicitudin commodo ipsum. Suspendisse non leo.', 'quam. Curabitur vel lectus. Cum sociis natoque penatibus et magnis', 'mauris, aliquam eu, accumsan', 217, 370, 0, 'G', '2020-07-27', '2021-02-18 00:00:00'),
(98, 'A', 1, 3, '55A456', 'gravida. Praesent eu nulla at sem molestie sodales.', 'ultrices a, auctor non, feugiat nec, diam. Duis mi enim,', 'velit. Quisque varius. Nam', 149, 755, 0, 'B', '2022-01-29', '2020-06-11 00:00:00'),
(99, 'A', 2, 6, '99P471', 'arcu imperdiet ullamcorper. Duis at lacus. Quisque purus', 'gravida sagittis. Duis gravida. Praesent eu nulla at sem molestie', 'tempus mauris erat eget', 107, 628, 0, 'E', '2020-08-23', '2021-09-07 00:00:00'),
(100, 'L', 1, 6, '21L965', 'orci luctus et ultrices posuere', 'tristique senectus et netus et malesuada fames ac turpis egestas.', 'sed leo. Cras vehicula', 322, 437, 0, 'B', '2021-01-13', '2022-02-26 00:00:00'),
(101, 'A', 3, 5, '86Z56', 'tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante', 'nec tellus. Nunc lectus pede, ultrices a, auctor non, feugiat', 'Suspendisse aliquet molestie tellus.', 187, 436, 0, 'V', '2020-03-23', '2021-10-25 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `annonce_option`
--

DROP TABLE IF EXISTS `annonce_option`;
CREATE TABLE IF NOT EXISTS `annonce_option` (
  `an_id` int NOT NULL,
  `opt_id` int NOT NULL,
  PRIMARY KEY (`an_id`,`opt_id`),
  KEY `FK_annonce_option2` (`opt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `annonce_option`
--

INSERT INTO `annonce_option` (`an_id`, `opt_id`) VALUES
(62, 4),
(62, 5),
(62, 6),
(62, 7),
(62, 9);

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `adresse` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `code_postale` int NOT NULL,
  `ville` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telephone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `metier` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `commentaire` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `adresse`, `code_postale`, `ville`, `email`, `telephone`, `metier`, `commentaire`) VALUES
(1, 'Dupond', 'Valentin', '123 rue des reves', 80000, 'Amiens', 'dupond.valentin@email.com', '03 22 03 01 05', 'Routier', 'recherche appartement pour 5 personnes donc 3 enfants . '),
(4, 'Didule', 'rien', '453 avenue du rien', 45632, 'Loin', 'bidule@hotmail.com', '0562351586', 'routier', ''),
(5, 'Baba', 'Ali', '568 rue des nuages', 56230, 'Oisemont', 'baba@email.com', '0654897852', 'voleur', 'recherche planque'),
(7, 'tatin', 'triangle', '5 rue des lilas', 65326, 'Nullepart', 'tutu@email.com', '0356251446', 'danseur', 'ras'),
(9, 'Gonzalez', 'Vaughan', '', 65040, 'Buxton', 'laoreet.ipsum.Curabitur@Sed.edu', '09 02 45 58 23', 'primis in faucibus', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'),
(10, 'Shaw', 'Lucius', '', 74222, 'Loppem', 'non.justo@nuncQuisqueornare.com', '04 75 09 92 47', 'sed tortor. Integer', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur'),
(11, 'Merrill', 'Chava', '', 5944, 'Kurnool', 'Nulla.eu@Etiamlaoreetlibero.com', '02 22 60 60 68', 'est ac facilisis', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur'),
(12, 'Avila', 'Sarah', '', 721, 'Mysore', 'amet.massa@nislsem.co.uk', '07 42 04 28 42', 'Donec tincidunt. Donec', 'Lorem ipsum dolor'),
(13, 'Swanson', 'Ima', '', 50683, 'Archennes', 'Suspendisse@malesuadaaugue.ca', '03 46 59 18 56', 'sollicitudin commodo ipsum.', 'Lorem ipsum dolor sit amet, consectetuer'),
(14, 'Warner', 'Jocelyn', '', 2113, 'Opgrimbie', 'lacus@mollis.edu', '07 54 04 77 38', 'sociis natoque penatibus', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed'),
(15, 'Manning', 'Hoyt', '', 73850, 'Salice Salentino', 'Pellentesque.habitant@ametrisusDonec.edu', '04 15 42 13 95', 'dapibus gravida. Aliquam', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'),
(16, 'Logan', 'Shad', '', 13502, 'Kalisz', 'feugiat.placerat.velit@tincidunt.org', '02 12 08 73 43', 'sed, facilisis vitae,', 'Lorem ipsum dolor sit amet, consectetuer'),
(17, 'Dennis', 'Garrison', '', 7921, 'Cicagna', 'ornare.lectus.ante@tinciduntDonec.net', '02 91 27 08 27', 'purus. Maecenas libero', 'Lorem ipsum dolor sit'),
(18, 'Henry', 'Evan', '', 18298, 'Tirupati', 'a.neque@Praesentinterdumligula.net', '07 93 55 50 19', 'Sed eget lacus.', 'Lorem ipsum dolor sit'),
(19, 'Valentine', 'Adrian', '', 85179, 'Nizhny', 'non.bibendum@eteuismod.ca', '03 07 77 84 91', 'eu arcu. Morbi', 'Lorem ipsum dolor'),
(20, 'Blake', 'Serena', '', 21260, 'Rae-Edzo', 'placerat@NullainterdumCurabitur.com', '07 59 22 02 81', 'et ultrices posuere', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed'),
(21, 'Fernandez', 'Piper', '', 26538, 'Seevetal', 'ac.mattis.ornare@Sed.net', '04 77 00 56 26', 'sit amet, consectetuer', 'Lorem ipsum dolor sit'),
(22, 'Franco', 'Grace', '', 95282, 'Ramenskoye', 'lorem.vehicula@est.com', '01 84 76 78 73', 'varius ultrices, mauris', 'Lorem ipsum dolor'),
(23, 'Hess', 'Aaron', '', 170, 'Richmond Hill', 'Vestibulum.ante@tincidunt.co.uk', '09 56 15 05 73', 'tempor augue ac', 'Lorem ipsum dolor'),
(24, 'Bell', 'Tamekah', '', 69262, 'Muiden', 'dictum.cursus@Aeneansed.ca', '03 30 69 53 56', 'facilisis. Suspendisse commodo', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur'),
(25, 'Shepard', 'Forrest', '', 53412, 'Montenero Val Cocchiara', 'eget.odio.Aliquam@magnisdis.net', '08 81 09 94 97', 'Mauris nulla. Integer', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed'),
(26, 'Ochoa', 'Arden', '', 87840, 'Cumberland', 'sed.leo.Cras@felis.org', '05 49 99 64 53', 'Sed nulla ante,', 'Lorem ipsum dolor'),
(27, 'Turner', 'Brynne', '', 60747, 'Rockville', 'morbi.tristique.senectus@ipsumCurabiturconsequat.ca', '09 79 32 38 79', 'vitae risus. Duis', 'Lorem ipsum dolor'),
(28, 'Norris', 'Stone', '', 24055, 'Workington', 'Quisque@Phasellus.ca', '04 52 71 67 05', 'non, bibendum sed,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'),
(29, 'Brewer', 'Kylie', '', 24515, 'Bilbo', 'penatibus.et@fermentummetusAenean.com', '06 65 84 58 99', 'ridiculus mus. Proin', 'Lorem ipsum dolor'),
(30, 'Romero', 'Mona', '', 57027, 'Sale', 'mollis.vitae.posuere@fringilla.org', '02 44 24 29 68', 'turpis egestas. Fusce', 'Lorem ipsum dolor sit amet,'),
(31, 'Wilder', 'Astra', '', 4963, 'Vlissegem', 'aliquam.iaculis.lacus@nec.co.uk', '01 64 62 10 67', 'Aenean eget magna.', 'Lorem ipsum dolor sit amet,'),
(32, 'Sellers', 'Ruth', '', 22119, 'Tarsus', 'tempor.est@utaliquamiaculis.co.uk', '03 45 50 84 56', 'magna. Sed eu', 'Lorem ipsum dolor sit amet, consectetuer'),
(33, 'Terry', 'Zephania', '', 76187, 'Gimpo', 'suscipit.est@tortorNunc.com', '07 20 08 45 58', 'nulla. Integer vulputate,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur'),
(34, 'Tate', 'Conan', '', 53906, 'Ficarolo', 'porta.elit.a@pretiumetrutrum.net', '05 29 36 85 19', 'mus. Donec dignissim', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur'),
(35, 'Hart', 'Renee', '', 77751, 'Dedovsk', 'ullamcorper.velit@Suspendisse.ca', '03 26 33 35 22', 'velit. Aliquam nisl.', 'Lorem ipsum dolor sit amet, consectetuer'),
(36, 'Hodge', 'Mallory', '', 52235, 'Itzehoe', 'Donec.nibh@dignissimmagnaa.ca', '02 27 60 62 70', 'convallis ligula. Donec', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'),
(37, 'Malone', 'Tad', '', 49886, 'Leersum', 'nisi.sem@nonbibendumsed.com', '05 36 64 73 23', 'auctor, nunc nulla', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'),
(38, 'Castaneda', 'Cora', '', 31743, 'Ghlin', 'euismod.in@pretiumneque.ca', '02 18 58 59 82', 'pellentesque eget, dictum', 'Lorem ipsum dolor sit amet, consectetuer'),
(39, 'Emerson', 'Edward', '', 13567, 'Tourinnes-Saint-Lambert', 'vel@eunibhvulputate.co.uk', '04 70 87 84 40', 'ultrices posuere cubilia', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur'),
(40, 'Clements', 'Clinton', '', 2856, 'Carbonear', 'non.luctus.sit@ategestas.ca', '03 70 62 73 20', 'Phasellus in felis.', 'Lorem ipsum dolor'),
(41, 'Merritt', 'Zelda', '', 72941, 'Yegoryevsk', 'Suspendisse.non.leo@nascetur.edu', '02 51 28 56 48', 'purus, accumsan interdum', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'),
(42, 'Hensley', 'Stuart', '', 1400, 'Kawawachikamach', 'cursus@tinciduntcongue.org', '01 67 31 75 25', 'lacinia. Sed congue,', 'Lorem ipsum dolor sit amet, consectetuer'),
(43, 'Trujillo', 'Duncan', '', 50952, 'Kalken', 'Donec@dolorNullasemper.edu', '02 43 51 30 49', 'dui. Suspendisse ac', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'),
(44, 'Cervantes', 'Cameran', '', 34588, 'Balikpapan', 'accumsan.neque.et@pellentesqueSeddictum.net', '03 92 55 05 84', 'mauris eu elit.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing'),
(45, 'Cooke', 'Olympia', '', 6925, 'Ananindeua', 'euismod@aliquet.edu', '05 62 17 41 46', 'interdum. Curabitur dictum.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur'),
(46, 'Summers', 'Sean', '', 89901, 'Argyle', 'sem.mollis@gravidamolestie.com', '01 27 45 07 58', 'gravida molestie arcu.', 'Lorem ipsum dolor sit amet,'),
(47, 'William', 'Carlos', '', 11526, 'Tuscaloosa', 'senectus.et@Donecnibhenim.net', '03 10 06 22 35', 'Pellentesque ultricies dignissim', 'Lorem ipsum dolor sit'),
(48, 'Buck', 'Adria', '', 72203, 'Richmond', 'tincidunt@id.com', '01 67 67 04 73', 'habitant morbi tristique', 'Lorem ipsum dolor'),
(49, 'Becker', 'Lacota', '', 43515, 'Castlegar', 'sociis@a.net', '05 35 39 81 39', 'faucibus lectus, a', 'Lorem ipsum dolor'),
(50, 'Lane', 'Ivory', '', 3096, 'Heusden', 'id.enim@sodales.ca', '08 52 84 26 79', 'Phasellus libero mauris,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur'),
(51, 'Benton', 'Angela', '', 5264, 'Cardedu', 'pellentesque.a.facilisis@posuere.co.uk', '04 01 09 29 77', 'lorem ipsum sodales', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur'),
(52, 'Berger', 'Joan', '', 11052, 'Los Muermos', 'neque.tellus@dictum.com', '07 68 96 57 92', 'felis, adipiscing fringilla,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed'),
(53, 'Copeland', 'Zachery', '', 29801, 'La Granja', 'Cras@velit.edu', '06 57 81 87 40', 'Duis ac arcu.', 'Lorem ipsum dolor sit amet, consectetuer'),
(54, 'Ashley', 'Olivia', '', 7037, 'Great Falls', 'erat@porttitortellusnon.co.uk', '06 15 13 68 85', 'eu, ultrices sit', 'Lorem ipsum dolor sit'),
(55, 'Cruz', 'Dakota', '', 13814, 'Munger', 'ullamcorper.magna@iaculislacus.net', '09 57 20 73 09', 'eu nulla at', 'Lorem ipsum dolor sit amet, consectetuer'),
(56, 'Rush', 'Tara', '', 43365, 'Houdemont', 'interdum.libero@eueros.edu', '04 14 18 93 59', 'eget varius ultrices,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur'),
(57, 'Castaneda', 'Echo', '', 98845, 'Lakeshore', 'augue.porttitor.interdum@commodotincidunt.com', '07 87 42 86 84', 'aliquet magna a', 'Lorem ipsum dolor sit'),
(58, 'Munoz', 'Juliet', '', 18365, 'Chillán', 'dui@elitpede.com', '09 81 28 20 72', 'tincidunt orci quis', 'Lorem ipsum dolor'),
(59, 'Holmes', 'Allistair', '', 79124, 'Noragugume', 'Aenean.gravida.nunc@Curabitur.com', '08 89 59 92 91', 'ante lectus convallis', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur'),
(60, 'Dominguez', 'Grant', '', 13159, 'La Hulpe', 'amet.risus.Donec@orcilacus.ca', '06 08 49 00 54', 'egestas lacinia. Sed', 'Lorem ipsum dolor sit amet,'),
(61, 'Murray', 'Hedy', '', 27840, 'San Juan de Dios', 'nostra@amet.ca', '09 95 32 16 94', 'ante bibendum ullamcorper.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed'),
(62, 'Clarke', 'Asher', '', 52964, 'Caprauna', 'Curabitur.egestas@vel.edu', '08 51 07 98 01', 'nascetur ridiculus mus.', 'Lorem ipsum dolor sit'),
(63, 'Morton', 'Adria', '', 777, 'Caccamo', 'eget@Morbinon.net', '08 57 77 16 35', 'porttitor interdum. Sed', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'),
(64, 'Gaines', 'Bevis', '', 74057, 'Thurso', 'dictum.eu@ametfaucibusut.edu', '09 82 36 25 14', 'Aenean eget magna.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur'),
(65, 'Washington', 'Melanie', '', 91101, 'Paita', 'Pellentesque@feugiat.org', '01 91 66 10 33', 'vel est tempor', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed'),
(66, 'Bruce', 'Sara', '', 48176, 'Vaughan', 'varius@nonmagna.com', '06 51 11 85 04', 'semper auctor. Mauris', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed'),
(67, 'Glass', 'Myles', '', 48703, 'Elen', 'magna@imperdiet.com', '07 87 51 20 25', 'felis. Nulla tempor', 'Lorem ipsum dolor sit'),
(68, 'Gomez', 'Benedict', '', 71068, 'Khuzdar', 'orci.lobortis.augue@ligula.org', '09 85 65 60 91', 'vel sapien imperdiet', 'Lorem ipsum dolor sit amet, consectetuer'),
(69, 'Petty', 'Ursula', '', 73447, 'Cairns', 'malesuada.fringilla@fermentumrisus.com', '04 48 93 05 69', 'dui. Fusce aliquam,', 'Lorem ipsum dolor sit amet,'),
(70, 'Wolf', 'Dylan', '', 18192, 'Lowell', 'Duis@viverra.org', '07 85 93 02 05', 'in, tempus eu,', 'Lorem ipsum dolor'),
(71, 'Tillman', 'Nasim', '', 48012, 'Paderborn', 'Vestibulum.ante.ipsum@sollicitudinorci.org', '09 08 98 14 46', 'Suspendisse non leo.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing'),
(72, 'Pruitt', 'Moses', '', 51302, 'Daska', 'risus.Morbi@parturientmontesnascetur.edu', '08 42 86 73 56', 'erat, eget tincidunt', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur'),
(73, 'Harrington', 'Cody', '', 74816, 'Orange', 'faucibus.leo.in@nulla.edu', '05 74 71 29 00', 'libero mauris, aliquam', 'Lorem ipsum dolor sit'),
(74, 'Hurley', 'Damon', '', 76673, 'Diadema', 'in@ullamcorper.com', '07 17 12 17 28', 'nulla. Integer urna.', 'Lorem ipsum dolor sit amet,'),
(75, 'Dillard', 'Kuame', '', 16156, 'Holman', 'scelerisque@tristique.org', '06 06 71 08 46', 'nulla. Integer vulputate,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed'),
(76, 'Finch', 'Luke', '', 19324, 'Schönebeck', 'et.magnis@sociisnatoque.com', '09 59 91 11 12', 'rhoncus. Donec est.', 'Lorem ipsum dolor sit amet, consectetuer'),
(77, 'Burton', 'Quentin', '', 83959, 'Bionaz', 'tempor.augue.ac@cursusNunc.net', '04 86 28 24 32', 'Duis sit amet', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed'),
(78, 'Schneider', 'Hyacinth', '', 52019, 'Ettelgem', 'erat.vel@Aeneanegetmagna.co.uk', '04 11 81 80 70', 'sit amet orci.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing'),
(79, 'Hudson', 'Rebecca', '', 78550, 'Treppo Carnico', 'nisi@augue.edu', '06 94 71 86 53', 'sed tortor. Integer', 'Lorem ipsum dolor sit'),
(80, 'Erickson', 'Lance', '', 3114, 'Burnie', 'lectus.convallis@a.edu', '05 27 09 81 05', 'Sed et libero.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing'),
(81, 'Hancock', 'Hashim', '', 14484, 'Kacchi', 'Suspendisse@sagittis.net', '06 93 76 16 46', 'neque. In ornare', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed'),
(82, 'Nunez', 'Kelly', '', 18999, 'Chépica', 'a@necdiamDuis.co.uk', '03 52 74 29 89', 'ultricies dignissim lacus.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed'),
(83, 'Howe', 'Quinlan', '', 95949, 'Auckland', 'eu.lacus@eu.org', '05 71 37 58 51', 'Sed dictum. Proin', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'),
(84, 'Hess', 'Geraldine', '', 27989, 'Viersel', 'ac@quisturpis.co.uk', '07 51 20 75 31', 'purus mauris a', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur'),
(85, 'Dodson', 'Lois', '', 68720, 'Albiano', 'parturient@musDonec.edu', '03 58 76 54 33', 'nisl. Nulla eu', 'Lorem ipsum dolor sit amet, consectetuer'),
(86, 'Carney', 'Paki', '', 68268, 'North Las Vegas', 'rutrum@risusIn.ca', '09 66 87 87 33', 'facilisis non, bibendum', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.'),
(87, 'Jones', 'Nyssa', '', 99364, 'Grimbergen', 'rutrum@auctorvitaealiquet.edu', '01 64 06 65 90', 'arcu ac orci.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing'),
(88, 'Fitzgerald', 'Emmanuel', '', 66806, 'Essen', 'diam.at@Cras.co.uk', '06 61 67 23 09', 'ante bibendum ullamcorper.', 'Lorem ipsum dolor'),
(89, 'Mullins', 'Logan', '', 91181, 'Khimki', 'nisl.Quisque.fringilla@vulputate.com', '08 68 57 90 97', 'aliquet libero. Integer', 'Lorem ipsum dolor sit'),
(90, 'Ferrell', 'Audra', '', 56407, 'Mont-Saint-Guibert', 'Duis.elementum@Aliquam.edu', '04 29 42 60 71', 'at, iaculis quis,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing'),
(91, 'Schwartz', 'Caesar', '', 45791, 'Fort St. John', 'egestas@malesuadavel.com', '02 04 37 28 47', 'lectus. Cum sociis', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur sed'),
(92, 'Mccoy', 'Lillian', '', 28293, 'Baasrode', 'ac.arcu.Nunc@afacilisisnon.ca', '04 52 46 01 13', 'egestas. Duis ac', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur'),
(93, 'Graham', 'Dexter', '', 78750, 'Ottawa', 'hymenaeos.Mauris.ut@temporaugueac.com', '07 65 73 79 09', 'turpis egestas. Fusce', 'Lorem ipsum dolor sit amet, consectetuer adipiscing'),
(94, 'Rush', 'Shaeleigh', '', 23333, 'Ham-sur-Heure', 'Aenean@ipsumdolor.co.uk', '02 09 90 53 53', 'nec, imperdiet nec,', 'Lorem ipsum dolor sit amet,'),
(95, 'Heath', 'Brody', '', 1919, 'Barahanagar', 'ligula.consectetuer.rhoncus@amet.net', '07 15 05 00 67', 'magna a neque.', 'Lorem ipsum dolor sit amet, consectetuer'),
(96, 'Cruz', 'Xena', '', 66147, 'Bad Vilbel', 'ac@sociisnatoquepenatibus.com', '04 01 45 17 57', 'nec, diam. Duis', 'Lorem ipsum dolor sit amet, consectetuer'),
(97, 'Cox', 'Elaine', '', 40384, 'Cirencester', 'feugiat.nec.diam@mattissemper.com', '03 43 28 22 09', 'amet, consectetuer adipiscing', 'Lorem ipsum dolor sit amet, consectetuer adipiscing'),
(98, 'Fuller', 'Larissa', '', 82669, 'Arnesano', 'Suspendisse@nequetellusimperdiet.com', '09 46 82 81 20', 'dapibus rutrum, justo.', 'Lorem ipsum dolor sit amet,'),
(99, 'Prince', 'Drew', '', 62677, 'Acapulco', 'montes@dapibusrutrumjusto.edu', '06 19 35 88 71', 'bibendum. Donec felis', 'Lorem ipsum dolor sit amet, consectetuer adipiscing'),
(100, 'Beard', 'Aiko', '', 60213, 'Pariaman', 'elit.elit@leoCras.org', '04 05 23 29 60', 'sapien imperdiet ornare.', 'Lorem ipsum dolor sit amet,'),
(101, 'Everett', 'Ursula', '', 76281, 'Tramonti di Sopra', 'orci@pede.org', '03 84 00 63 54', 'eu arcu. Morbi', 'Lorem ipsum dolor sit amet,'),
(102, 'Quinn', 'Ezra', '', 32294, 'Tynda', 'scelerisque.dui@eros.net', '08 44 24 43 59', 'Quisque nonummy ipsum', 'Lorem ipsum dolor sit amet, consectetuer adipiscing'),
(103, 'Britt', 'Drake', '', 549, 'Bahawalnagar', 'accumsan.sed@sedtortorInteger.co.uk', '02 17 25 23 13', 'pede blandit congue.', 'Lorem ipsum dolor sit amet, consectetuer adipiscing'),
(104, 'Arnold', 'Savannah', '', 55089, 'Ife', 'feugiat@euduiCum.ca', '01 36 81 79 96', 'at, egestas a,', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur'),
(105, 'Gillespie', 'Carol', '', 92614, 'Brest', 'risus.odio.auctor@consequatauctor.co.uk', '07 97 70 02 79', 'id, libero. Donec', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Curabitur'),
(106, 'Carr', 'Iola', '', 17478, 'Casciana Terme', 'diam.Duis@iaculisodio.com', '09 66 74 36 75', 'pharetra sed, hendrerit', 'Lorem ipsum dolor sit'),
(107, 'Acevedo', 'Karleigh', '', 26042, 'Town of Yarmouth', 'Duis.elementum.dui@enimcommodohendrerit.com', '01 87 80 69 65', 'aliquet vel, vulputate', 'Lorem ipsum dolor sit amet, consectetuer adipiscing'),
(108, 'Goodwin', 'Austin', '', 11378, 'San Juan de Pasto', 'sit.amet@auctor.org', '08 31 71 64 86', 'amet, consectetuer adipiscing', 'Lorem ipsum dolor sit amet, consectetuer adipiscing');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `code_postale` int NOT NULL,
  `ville` varchar(250) NOT NULL,
  `telephone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `sujet` varchar(250) NOT NULL,
  `question` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `nom`, `prenom`, `adresse`, `code_postale`, `ville`, `telephone`, `email`, `sujet`, `question`) VALUES
(23, 'wilga', 'anne', '4 16 rue d\'artois appt 16', 80100, 'Abbeville', '0644811937', 'wilga.anne@neuf.fr', 'L\'achat d\'un bien', 'rgg'),
(24, 'test', 'test', '1 rue test', 59000, 'lille', '0254869954', 'tutu@gmail.com', 'Autres', 'ca va ?'),
(25, 'dd', 'eee', 'fff', 59890, 'lille', '0320030303', 'tutu@gmail.com', 'L\'achat d\'un bien', 'ddddd'),
(26, 'ddd', 'rue', '5 rue test', 80100, 'Abbeville', '0644811937', 'anne.wilga@orange.fr', 'L\'achat d\'un bien', 'ddddd'),
(27, 'ddd', 'rue', 'rue test', 80100, 'Abbeville', '0644811937', 'anne.wilga@orange.fr', 'La vente/l\'estimation d\'un bien', 'ddddd');

-- --------------------------------------------------------

--
-- Structure de la table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `opt_id` int NOT NULL AUTO_INCREMENT COMMENT 'Identifiant / Clé primaire',
  `opt_libelle` varchar(100) NOT NULL COMMENT 'Libellé de l''option',
  PRIMARY KEY (`opt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `options`
--

INSERT INTO `options` (`opt_id`, `opt_libelle`) VALUES
(1, 'Jardin'),
(2, 'Garage'),
(3, 'Parking'),
(4, 'Piscine'),
(5, 'Combles aménageables'),
(6, 'Cuisine ouverte'),
(7, 'Sans travaux'),
(8, 'Avec travaux'),
(9, 'Cave'),
(10, 'Plain-pied'),
(11, 'Ascenseur'),
(12, 'Terrasse/balcon'),
(13, 'Cheminée');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `pho_id` int NOT NULL AUTO_INCREMENT,
  `pho_nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `an_id` int NOT NULL,
  PRIMARY KEY (`pho_id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`pho_id`, `pho_nom`, `an_id`) VALUES
(1, '1-0.jpg', 1),
(2, '1-1.jpg', 1),
(3, '2-0.jpg', 2),
(4, '2-1.jpg', 2),
(5, '3-0.jpg', 3),
(6, '3-1.jpg', 3),
(7, '3-2.jpg', 3),
(8, '4-0.jpg', 4),
(9, '5-0.jpg', 5),
(10, '5-1.jpg', 5),
(11, '5-2.jpg', 5),
(12, '6-0.jpg', 6),
(13, '6-1.jpg', 6),
(14, '6-2.jpg', 6),
(15, '7-0.jpg', 7),
(16, '7-1.jpg', 7),
(17, '7-2.jpg', 7),
(18, '8-0.jpg', 8),
(19, '8-1.jpg', 8),
(20, '8-2.jpg', 8),
(21, '9-0.jpg', 9),
(22, '9-1.jpg', 9),
(23, '10-0.jpg', 10),
(24, '10-1.jpg', 10),
(25, '10-2.jpg', 10),
(78, '62-1', 62),
(83, '62-2', 62),
(84, '62-3', 62);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  `confirmation_token` varchar(60) DEFAULT NULL,
  `confirmation_date` datetime DEFAULT NULL,
  `role` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `motDePasse`, `date_inscription`, `confirmation_token`, `confirmation_date`, `role`) VALUES
(23, 'wilga', 'anne', 'wilga.anne@neuf.fr', '$2y$10$C4EvTEtqDIaAnNhSkxSQneZzS9PuS7nyxIuEo9EeTxm6AHfiE.Iou', '0000-00-00', 'QW9NuU7vCYgAh0cX41IInArxK8xi7GHEag9gaFKzdrM9lMP5K6e6Y5IFftgz', NULL, 0),
(24, 'rien', 'personne', 'per@email.com', '$2y$10$rei6vKmvK47dFNXcR/bKYOgFBOIu/d/0swKfG8VKUgOXXwtks7Nce', '0000-00-00', 'oHe6LOE0h2dfzHJnHimvAVLcPS6xVSeMeKU6J9s0cGtXWREAPBGaoyJqYWAI', NULL, 0),
(25, 'polux', 'lux', 'lux@email.com', '$2y$10$ECVSHiQ3dtnZHADz6wvpPezVrwP8zGMqXX67WrvluwUBqQe.Wzbz6', '0000-00-00', 'f8CohNBSYruHdldz6TvzAzrlvxLabVpoE6KSp9jkbcuw6gI6JnFlHHK3whou', NULL, 0),
(26, 'rahan', 'bibi', 'bibi@hotmail.com', '$2y$10$YnVm9c1j8j13eF.S37S3RuRnE2JhCADGGIMzVB/BEEaAo9v.bPYsu', '0000-00-00', '0LfgdbZcTbE3iU5iiEje7q4ammBdKUEx5UhX2PK4s99U6uyDzRhmxzrpUKV8', NULL, 0),
(39, 'utilisateur', 'lambda', 'utilisateur@mail.fr', '$2y$10$Ix2aY/MHzArjluRRj2Xh0uGpUmrFuWqEJbRCNC8GyqH5/a80yVhhK', '0000-00-00', '7nyVQDSTPm2203M91MrYwgszDUpBcO4RjOc6FmRMshqWj2dtQHOwaAd2BMhK', NULL, 0),
(40, 'utilisatrice', 'utilisatrices', 'utilisatrice@hotmail.fr', '$2y$10$uXSMXQkpYds45cnJzWsn3OqS4mRd9.VgRgvSnsod7kxcJK.05zTLq', '0000-00-00', 'dMNwnD5I65iVTYeHuohQBKpz9XtZlc01IeuOSt0XnegFFt2GAfjEujW23zia', NULL, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce_option`
--
ALTER TABLE `annonce_option`
  ADD CONSTRAINT `FK_annonce_option1` FOREIGN KEY (`an_id`) REFERENCES `annonces` (`an_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_annonce_option2` FOREIGN KEY (`opt_id`) REFERENCES `options` (`opt_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
