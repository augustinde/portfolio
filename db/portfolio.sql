-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 02, 2021 at 12:42 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tokenAuth` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `password`, `tokenAuth`) VALUES
(1, 'AugustinD', '$2y$10$PGqURhiO0UT55/9AibeV2u/4wn3Kc8n2gFWemVx7Istjc0581tRWa', '268f0dece198d9c142466a5c00bce235');

-- --------------------------------------------------------

--
-- Table structure for table `competence`
--

DROP TABLE IF EXISTS `competence`;
CREATE TABLE IF NOT EXISTS `competence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `competence`
--

INSERT INTO `competence` (`id`, `libelle`) VALUES
(1, 'A1.1.1'),
(2, 'A1.1.2'),
(3, 'A1.1.3'),
(4, 'A1.2.1'),
(5, 'A1.2.2'),
(6, 'A1.2.3'),
(7, 'A1.2.4'),
(8, 'A1.2.5'),
(9, 'A1.3.1'),
(10, 'A1.3.2'),
(11, 'A1.3.3'),
(12, 'A1.3.4'),
(13, 'A1.4.2'),
(14, 'A1.4.3'),
(15, 'A2.1.1'),
(16, 'A2.1.2'),
(17, 'A2.2.1'),
(18, 'A2.2.2'),
(19, 'A2.2.3'),
(20, 'A2.3.1'),
(21, 'A2.3.2'),
(22, 'A3.2.1'),
(23, 'A3.2.2'),
(24, 'A4.1.1'),
(25, 'A4.1.2'),
(26, 'A4.1.3'),
(27, 'A4.1.4'),
(28, 'A4.1.5'),
(29, 'A4.1.6'),
(30, 'A4.1.7'),
(31, 'A4.1.8'),
(32, 'A4.1.9'),
(33, 'A4.1.10'),
(34, 'A4.2.1'),
(35, 'A4.2.2'),
(36, 'A4.2.3'),
(37, 'A4.2.4'),
(38, 'A5.1.1'),
(39, 'A5.1.2'),
(40, 'A5.1.3'),
(41, 'A5.1.4'),
(42, 'A5.1.5'),
(43, 'A5.1.6'),
(44, 'A5.2.1'),
(45, 'A5.2.2'),
(46, 'A5.2.3'),
(47, 'A5.2.4'),
(48, 'A1.4.1');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cheminImage` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `cheminImage`) VALUES
(27, 'images/Projets/Unity1-0.png'),
(28, 'images/Projets/Unity1-1.png'),
(29, 'images/Projets/Unity1111-0.png'),
(30, 'images/Projets/Unity1111-1.png'),
(31, 'images/Projets/Site Web Helicoptr-0.png'),
(32, 'images/Projets/Site Web Helicoptr-1.png');

-- --------------------------------------------------------

--
-- Table structure for table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `urlProjet` varchar(255) DEFAULT NULL,
  `urlDocFournit` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projet`
--

INSERT INTO `projet` (`id`, `nom`, `description`, `urlProjet`, `urlDocFournit`) VALUES
(3, 'Unity1111', 'Le Lorem Ipsum est simplement du faux texte employÃ© dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les annÃ©es 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour rÃ©aliser un livre spÃ©cimen de polices de texte. Il n\'a pas fait que survivre cinq siÃ¨cles, mais s\'est aussi adaptÃ© Ã  la bureautique informatique, sans que son contenu n\'en soit modifiÃ©. Il a Ã©tÃ© popularisÃ© dans les annÃ©es 1960 grÃ¢ce Ã  la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus rÃ©cemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'amazon.fr', 'google.com'),
(2, 'Unity1', 'lorem plus rÃ©cemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.', 'amazon.fr', 'google.com'),
(4, 'Site web helicoptr', 'pzdkzojdz jdmizn dzn djnzod nz dnzi dnz nzn d', 'https://www.amazon.fr', 'https://www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `projet_has_competence`
--

DROP TABLE IF EXISTS `projet_has_competence`;
CREATE TABLE IF NOT EXISTS `projet_has_competence` (
  `idProjetHasCompetence` int(11) NOT NULL AUTO_INCREMENT,
  `idProjet` int(11) NOT NULL,
  `idCompetence` int(11) NOT NULL,
  PRIMARY KEY (`idProjetHasCompetence`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projet_has_competence`
--

INSERT INTO `projet_has_competence` (`idProjetHasCompetence`, `idProjet`, `idCompetence`) VALUES
(1, 1, 1),
(2, 1, 5),
(3, 1, 9),
(4, 1, 13),
(5, 2, 1),
(6, 2, 5),
(7, 2, 9),
(8, 2, 13),
(9, 3, 1),
(10, 3, 5),
(11, 3, 9),
(12, 3, 13),
(13, 4, 1),
(14, 4, 2),
(15, 4, 5),
(16, 4, 6),
(17, 4, 9),
(18, 4, 10),
(19, 4, 13),
(20, 4, 14),
(21, 4, 17),
(22, 4, 21),
(23, 4, 22),
(24, 4, 25),
(25, 4, 26),
(26, 4, 29),
(27, 4, 30),
(28, 4, 33),
(29, 4, 34),
(30, 4, 37),
(31, 4, 38),
(32, 4, 41),
(33, 4, 42),
(34, 4, 45),
(35, 4, 46);

-- --------------------------------------------------------

--
-- Table structure for table `projet_has_image`
--

DROP TABLE IF EXISTS `projet_has_image`;
CREATE TABLE IF NOT EXISTS `projet_has_image` (
  `idProjetHasImage` int(11) NOT NULL AUTO_INCREMENT,
  `idProjet` int(11) NOT NULL,
  `idImage` int(11) NOT NULL,
  PRIMARY KEY (`idProjetHasImage`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projet_has_image`
--

INSERT INTO `projet_has_image` (`idProjetHasImage`, `idProjet`, `idImage`) VALUES
(1, 2, 27),
(2, 2, 28),
(3, 3, 29),
(4, 3, 30),
(5, 4, 31),
(6, 4, 32);

-- --------------------------------------------------------

--
-- Table structure for table `projet_has_technologie`
--

DROP TABLE IF EXISTS `projet_has_technologie`;
CREATE TABLE IF NOT EXISTS `projet_has_technologie` (
  `idProjetHasTechnologie` int(11) NOT NULL AUTO_INCREMENT,
  `idProjet` int(11) NOT NULL,
  `idTechnologie` int(11) NOT NULL,
  PRIMARY KEY (`idProjetHasTechnologie`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projet_has_technologie`
--

INSERT INTO `projet_has_technologie` (`idProjetHasTechnologie`, `idProjet`, `idTechnologie`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(7, 2, 3),
(8, 2, 4),
(9, 3, 1),
(10, 3, 2),
(11, 3, 3),
(12, 3, 4),
(13, 4, 1),
(14, 4, 2),
(15, 4, 3),
(16, 4, 4),
(17, 4, 5),
(18, 4, 6),
(19, 4, 7),
(20, 4, 8),
(21, 4, 9);

-- --------------------------------------------------------

--
-- Table structure for table `technologie`
--

DROP TABLE IF EXISTS `technologie`;
CREATE TABLE IF NOT EXISTS `technologie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `technologie`
--

INSERT INTO `technologie` (`id`, `libelle`) VALUES
(1, 'HTML/CSS'),
(2, 'PHP'),
(3, 'JS'),
(4, 'NodeJs'),
(5, 'Symfony'),
(6, 'Java'),
(7, 'C#'),
(8, 'Unity'),
(9, 'SQL');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

DROP TABLE IF EXISTS `todo`;
CREATE TABLE IF NOT EXISTS `todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `priorite` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `veuille_info`
--

DROP TABLE IF EXISTS `veuille_info`;
CREATE TABLE IF NOT EXISTS `veuille_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  `cheminImage` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `dateActu` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
