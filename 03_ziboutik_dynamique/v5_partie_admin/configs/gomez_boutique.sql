-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mar. 14 mars 2023 à 09:16
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gomez_boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO categorie
VALUES (1, 'Smartphones'),
(2, 'Tablettes'),
(3, 'Ecouteurs'),
(4, 'Montres'),
(5, 'Coques');


-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `rue` varchar(255) NOT NULL,
  `codePostal` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `tel` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `rue`, `codePostal`, `ville`, `tel`, `email`) VALUES
(1, 'Kiara', '1827 Pede St.', 38656, 'Moulins', '06 37 23 7', 'imperdiet.erat.nonummy@google.'),
(2, 'Thane', 'Ap #578-6158 Ut St.', 88812, 'Hérouville-Saint-Clair', '04 02 81 7', 'pellentesque.habitant@google.c'),
(3, 'Christine', 'Ap #277-2384 Nullam Rd.', 13162, 'Lens', '02 36 36 6', 'curabitur.ut@hotmail.com'),
(4, 'Macy', 'Ap #579-8086 Ipsum Ave', 21463, 'Amiens', '06 84 01 8', 'libero.est@hotmail.edu'),
(5, 'Sade', '838-5335 Pharetra Ave', 85730, 'Saint-Dizier', '07 25 35 9', 'mauris.suspendisse@outlook.edu'),
(6, 'Lillian', '452-3380 At Rd.', 72048, 'Colmar', '01 85 45 6', 'ipsum.primis@outlook.net'),
(7, 'Rachel', '9669 Sodales Av.', 82807, 'Forbach', '04 49 68 1', 'condimentum.donec@aol.net'),
(8, 'Kennedy', 'P.O. Box 251, 6835 Ligula Av.', 19253, 'Vandoeuvre-lès-Nancy', '08 78 29 1', 'turpis.aliquam.adipiscing@aol.'),
(9, 'Herrod', '4506 Laoreet, Av.', 33827, 'Carcassonne', '06 34 71 2', 'curabitur@yahoo.net'),
(10, 'Pamela', '419-8181 Interdum St.', 21668, 'Cholet', '09 11 62 2', 'ac.nulla@aol.ca'),
(11, 'Lester', '164-877 Nascetur Street', 32483, 'Troyes', '05 03 47 6', 'ornare.libero.at@google.com'),
(12, 'Zelda', '525-3467 Nec Ave', 21401, 'La Rochelle', '05 59 87 8', 'non.ante@protonmail.couk'),
(13, 'Brynne', 'Ap #865-634 Sit Rd.', 86011, 'Dieppe', '06 14 72 2', 'tincidunt.congue.turpis@aol.or'),
(14, 'Keelie', '535-4805 Praesent St.', 85684, 'Alès', '06 26 38 4', 'diam.pellentesque.habitant@out'),
(15, 'Amethyst', '798-8699 Quam. Ave', 59438, 'Saint-Malo', '06 29 12 2', 'cursus@aol.edu'),
(16, 'Raphael', '753-8631 Ut St.', 67936, 'Montauban', '04 84 38 8', 'sed@google.net'),
(17, 'Marah', 'Ap #267-1418 Tincidunt Rd.', 3805, 'Perpignan', '06 44 41 2', 'vitae.aliquet@outlook.edu'),
(18, 'Fuller', '534-5082 Non, Rd.', 11570, 'Vichy', '07 40 06 5', 'enim.nec.tempus@hotmail.edu'),
(19, 'Iliana', 'Ap #852-5374 Lorem Ave', 61225, 'Clermont-Ferrand', '03 50 65 4', 'natoque@yahoo.org'),
(20, 'Eve', '5662 Magna. Ave', 38927, 'Limoges', '04 82 51 6', 'enim.curabitur@protonmail.com'),
(21, 'Haley', '168-3376 Dictum. Ave', 70520, 'Drancy', '06 65 74 8', 'dignissim.tempor@yahoo.com'),
(22, 'Akeem', '167-3987 Nascetur Street', 62287, 'Montbéliard', '03 61 73 8', 'donec.elementum@outlook.org'),
(23, 'Olympia', 'Ap #997-5312 Placerat Avenue', 42554, 'Châlons-en-Champagne', '01 96 15 2', 'blandit@aol.edu'),
(24, 'Jescie', '5341 Orci St.', 83067, 'Bastia', '02 48 75 5', 'consequat.purus.maecenas@outlo'),
(25, 'Sawyer', '3295 Purus, St.', 17642, 'Hérouville-Saint-Clair', '07 76 16 1', 'dui.nec@aol.org'),
(26, 'Garth', 'P.O. Box 362, 303 Cursus Rd.', 37088, 'Tours', '04 71 31 7', 'aliquet.lobortis.nisi@hotmail.'),
(27, 'Summer', '372-1905 A Rd.', 27885, 'Colmar', '02 72 62 7', 'eget@aol.ca'),
(28, 'Brendan', 'P.O. Box 677, 1112 Donec Road', 44143, 'Saint-Malo', '04 74 54 3', 'mauris.suspendisse@aol.ca'),
(29, 'Inga', '966-7068 Lectus, Rd.', 26484, 'Toulouse', '06 48 47 6', 'netus@icloud.couk'),
(30, 'Fitzgerald', '416-4925 Semper. Av.', 3123, 'Besançon', '01 27 44 5', 'neque@hotmail.net');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(50) DEFAULT NULL,
  `idClient` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idClient` (`idClient`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `rue` varchar(255) NOT NULL,
  `codePostal` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `tel` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id`, `nom`, `rue`, `codePostal`, `ville`, `tel`, `email`) VALUES
(1, 'Chaney', '9524 Ornare, Road', 57045, 'Tournefeuille', '07 17 21 89 20', 'vitae.erat@gmail.com'),
(2, 'Zachary', '425-9800 Lorem Av.', 28276, 'Nantes', '02 24 67 57 20', 'accumsan.interdum@orange.com'),
(3, 'Victor', '745-3517 Neque Av.', 27216, 'Nîmes', '07 14 96 49 50', 'aliquam.iaculis@gmail.fr'),
(4, 'Laith', '9148 Curabitur Av.', 94805, 'Montluçon', '04 87 25 67 89', 'orci.lacus@gmail.com'),
(5, 'Hector', '3439 Maecenas Rd.', 64985, 'Dijon', '05 28 61 13 65', 'nam@gmail.com'),
(6, 'Steel', '860-4355 Cum Road', 47457, 'Metz', '08 48 67 69 99', 'sed@orange.com'),
(7, 'Alden', '6544 Magna. Av.', 15153, 'Fréjus', '05 21 65 87 54', 'massa.suspendisse.eleifend@gma'),
(8, 'Tanek', '774-6804 Dolor Avenue', 79333, 'Lens', '04 02 75 56 14', 'elit.pharetra@orange.fr'),
(9, 'Murphy', '6068 Sed, Rd.', 45392, 'Rennes', '09 68 52 32 12', 'sit.amet@gmail.com'),
(10, 'Kai', '2282 Libero. Street', 64438, 'Haguenau', '06 65 92 67 45', 'non.sollicitudin@gmail.fr'),
(11, 'Zane', '757-4228 Mauris. Road', 36328, 'Caen', '06 19 25 69 89', 'tellus.lorem.eu@gmail.fr'),
(12, 'Marah', '2086 Amet St.', 75632, 'Beauvais', '06 43 91 39 89', 'fringilla.ornare.placerat@oran'),
(13, 'Orla', '4089 Metus Rd.', 66432, 'Narbonne', '03 16 79 39 89', 'ut.eros.non@orange.fr'),
(14, 'Phoebe', '321-3009 Enim. Avenue', 41922, 'Cherbourg-Octeville', '03 61 97 49 89', 'aliquet@orange.com'),
(15, 'Kyle', '3390 Vestibulum, Av.', 7288, 'Soissons', '02 91 58 69 89', 'proin.vel.nisl@gmail.com'),
(16, 'Aimee', '7668 Convallis Rd.', 84968, 'Pau', '04 93 14 19 89', 'arcu.vestibulum.ante@orange.co'),
(17, 'Dexter', '8605 Dapibus Av.', 66117, 'Le Petit-Quevilly', '01 28 45 39 89', 'sed@orange.fr'),
(18, 'Chelsea', '4214 Nec, Rd.', 54878, 'Laval', '06 63 31 69 89', 'enim.curabitur.massa@gmail.com'),
(19, 'Keaton', '4448 Lorem Av.', 74777, 'Vierzon', '04 48 21 69 89', 'sed.diam@gmail.fr'),
(20, 'Quentin', '326 Aliquam Avenue', 48244, 'Colomiers', '04 50 52 59 89', 'non@orange.fr'),
(21, 'Leonard', '3372 Nulla Road', 72150, 'Ajaccio', '05 87 46 69 89', 'integer.tincidunt@orange.fr'),
(22, 'Amity', 'P.O. Box 653, 3122 Dui, Road', 81363, 'Vandoeuvre-lès-Nancy', '04 88 61 29 89', 'eleifend.cras@gmail.com'),
(23, 'Jolene', '722-4276 Ut Rd.', 95282, 'Joué-lès-Tours', '05 58 06 89 89', 'enim.mi.tempor@gmail.com'),
(24, 'Samuel', '2 avenue rose', 11888, 'Villenave-d\'Ornon', '05 18 87 29 89', 'magna.a@gmail.com'),
(25, 'Anjolie', '5630 Faucibus Avenue', 67424, 'Joué-lès-Tours', '09 44 47 79 89', 'scelerisque.dui.suspendisse@or'),
(26, 'Bevis', 'Ap #824-6358 Vulputate Avenue', 72266, 'Laon', '06 64 23 0', 'magna.tellus.faucibus@gmail.co'),
(27, 'Omar', 'Ap #577-3900 Vel, St.', 12851, 'Alès', '08 56 67 8', 'nunc.lectus.pede@orange.com'),
(28, 'Eliana', '584-3806 Faucibus Av.', 42517, 'Angoulême', '02 27 13 9', 'lacus.vestibulum@orange.com'),
(29, 'Ruby', 'Ap #550-4577 Eget St.', 6364, 'Belfort', '07 74 87 8', 'suscipit.nonummy@orange.com'),
(30, 'Amos', 'Ap #428-7581 Eu Rd.', 66636, 'Montpellier', '07 46 71 1', 'eu.erat.semper@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `lignedecommande`
--

DROP TABLE IF EXISTS `lignedecommande`;
CREATE TABLE IF NOT EXISTS `lignedecommande` (
  `idCommande` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCommande`,`idProduit`),
  KEY `idProduit` (`idProduit`),
  KEY `idCommande` (`idCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `prix` decimal(6,2) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `idCategorie` int(11) DEFAULT NULL,
  `idFournisseur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idCategorie` (`idCategorie`),
  KEY `idFournisseur` (`idFournisseur`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO produit
VALUES (1, 'Samusung Galaxy M32', 'Le Samsung Galaxy M32 est un modèle moyen de gamme qui s équipe d un SoC Mediatek Helio G80 couplé à 6 Go de RAM et 128 Go de stockage, extensible via microSD.', '289.00', 'galaxy_M32.jpg', 1, 19),
(2, 'Samusung Galaxy A52', 'Le Samsung Galaxy A52 (SM-A525F/DS 128Go/6Go) est un bon portable Android avec processeur de 2.3GHz Octa-core qui permet d exécuter des jeux et les applications lourds. ', '300.00', 'galaxy_A52.jpg', 1, 20),
(3, 'Samusung Galaxy S21', 'Le Samsung Galaxy S21 est le porte-étendard de la marque, succédant à la gamme S20. Il est équipé d un SoC Exynos 2100 (gravé en 5 nm), d une batterie de 4000 mAh et de 3 capteurs photo : le principal à 12 mégapixels, un capteur de 12 mégapixels et un téléobjectif de 64 mégapixels.', '400.00', 'galaxy_S21.jpg', 1, 9),
(4, 'Samusung Galaxy note 20 ULTRA', 'Le Samsung Galaxy Note 20 Ultra est un smartphone haut de gamme annoncé le 5 aout 2020. Il est équipé d un SoC Exynos 990 épaulé par 12 Go de RAM, d un écran de 6,9 pouces Super AMOLED et d un triple capteur photo de 108+12+12 mégapixels.', '1 000.00', 'galaxy_note20_ultra.jpg', 1, 15);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `client` (`id`);

--
-- Contraintes pour la table `lignedecommande`
--
ALTER TABLE `lignedecommande`
  ADD CONSTRAINT `lignedecommande_ibfk_1` FOREIGN KEY (`idCommande`) REFERENCES `commande` (`id`),
  ADD CONSTRAINT `lignedecommande_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`id`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`idFournisseur`) REFERENCES `fournisseur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
