-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 01, 2019 at 12:21 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet`
--

-- --------------------------------------------------------

--
-- Table structure for table `masters`
--

CREATE TABLE `masters` (
  `Annee` int(11) NOT NULL,
  `Diplome` varchar(10) NOT NULL,
  `Numero_de_letablissement` varchar(8) NOT NULL,
  `etablissement` varchar(48) NOT NULL,
  `Code_de_lacademie` varchar(3) DEFAULT NULL,
  `Academie` varchar(16) DEFAULT NULL,
  `Code_du_domaine` varchar(4) NOT NULL,
  `Domaine` varchar(31) NOT NULL,
  `Code_de_la_discipline` varchar(6) NOT NULL,
  `Discipline` varchar(57) NOT NULL,
  `situation` varchar(24) NOT NULL,
  `Remarque` varchar(123) DEFAULT NULL,
  `Nombre_de_reponses` int(11) NOT NULL,
  `Taux_de_reponse` varchar(3) DEFAULT NULL,
  `Poids_de_la_discipline` varchar(3) DEFAULT NULL,
  `Taux_d’insertion` varchar(3) DEFAULT NULL,
  `_emplois_cadre_ou_professions_intermediaires` varchar(3) DEFAULT NULL,
  `_emplois_stables` varchar(3) DEFAULT NULL,
  `_emplois_a_temps_plein` varchar(3) DEFAULT NULL,
  `Salaire_net_median_des_emplois_a_temps_plein` varchar(4) DEFAULT NULL,
  `Salaire_brut_annuel_estime` varchar(5) DEFAULT NULL,
  `_de_diplomes_boursiers` decimal(6,2) NOT NULL,
  `Taux_de_chomage_regional` varchar(4) NOT NULL,
  `Salaire_net_mensuel_median_regional` varchar(4) NOT NULL,
  `_emplois_cadre` varchar(3) DEFAULT NULL,
  `_emplois_exterieurs_a_la_region_de_l’universite` varchar(3) DEFAULT NULL,
  `Salaire_net_mensuel_regional_1er_quartile` varchar(4) NOT NULL,
  `Salaire_net_mensuel_regional_3eme_quartile` varchar(4) NOT NULL,
  `cle_ETAB` varchar(51) NOT NULL,
  `cle_DISC` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masters`
--

INSERT INTO `masters` (`Annee`, `Diplome`, `Numero_de_letablissement`, `etablissement`, `Code_de_lacademie`, `Academie`, `Code_du_domaine`, `Domaine`, `Code_de_la_discipline`, `Discipline`, `situation`, `Remarque`, `Nombre_de_reponses`, `Taux_de_reponse`, `Poids_de_la_discipline`, `Taux_d’insertion`, `_emplois_cadre_ou_professions_intermediaires`, `_emplois_stables`, `_emplois_a_temps_plein`, `Salaire_net_median_des_emplois_a_temps_plein`, `Salaire_brut_annuel_estime`, `_de_diplomes_boursiers`, `Taux_de_chomage_regional`, `Salaire_net_mensuel_median_regional`, `_emplois_cadre`, `_emplois_exterieurs_a_la_region_de_l’universite`, `Salaire_net_mensuel_regional_1er_quartile`, `Salaire_net_mensuel_regional_3eme_quartile`, `cle_ETAB`, `cle_DISC`) VALUES
(2015, 'MASTER LMD', '0720916E', 'Le Mans', 'A17', 'Nantes', 'DEG', 'Droit, economie et gestion', 'disc01', 'Ensemble formations juridiques, economiques et de gestion', '18 mois apres le diplome', NULL, 82, '84', '47', '90', '54', '54', '91', '1560', '24300', 39.00, '7.3', '1760', '22', '43', '1430', '2070', 'Le Mans_18', 'disc01_18'),
(2015, 'MASTER LMD', '0751717J', 'Paris 1 - Pantheon Sorbonne', 'A01', 'Paris', 'DEG', 'Droit, economie et gestion', 'disc01', 'Ensemble formations juridiques, economiques et de gestion', '30 mois apres le diplome', NULL, 578, '70', '63', '94', '96', '84', '99', '2470', '38600', 23.00, '7.8', '2060', '83', '18', '1600', '2570', 'Paris 1 - Pantheon Sorbonne_30', 'disc01_30'),
(2015, 'MASTER LMD', '0692437Z', 'Lyon 3 - Jean Moulin', 'A10', 'Lyon', 'DEG', 'Droit, economie et gestion', 'disc02', 'Droit', '18 mois apres le diplome', NULL, 101, '67', '13', '85', '79', '57', '96', '1780', '27800', 25.00, '7.6', '1825', '54', '37', '1460', '2180', 'Lyon 3 - Jean Moulin_18', 'disc02_18'),
(2015, 'MASTER LMD', '0691775E', 'Lyon 2 - Lumiere', 'A10', 'Lyon', 'DEG', 'Droit, economie et gestion', 'disc04', 'Gestion', '18 mois apres le diplome', NULL, 51, '60', '9', '94', '89', '82', '97', '2300', '35900', 33.00, '7.6', '1825', '69', '48', '1460', '2180', 'Lyon 2 - Lumiere_18', 'disc04_18'),
(2015, 'MASTER LMD', '0692437Z', 'Lyon 3 - Jean Moulin', 'A10', 'Lyon', 'DEG', 'Droit, economie et gestion', 'disc04', 'Gestion', '30 mois apres le diplome', NULL, 454, '75', '54', '95', '99', '87', '98', '2170', '33800', 25.00, '7.6', '1825', '86', '44', '1460', '2180', 'Lyon 3 - Jean Moulin_30', 'disc04_30'),
(2015, 'MASTER LMD', '0691775E', 'Lyon 2 - Lumiere', 'A10', 'Lyon', 'DEG', 'Droit, economie et gestion', 'disc05', 'Autres formations juridiques, economiques et de gestion', '18 mois apres le diplome', NULL, 4, '50', '1', 'ns', 'ns', 'ns', 'ns', 'ns', 'ns', 33.00, '7.6', '1825', 'ns', 'ns', '1460', '2180', 'Lyon 2 - Lumiere_18', 'disc05_18'),
(2015, 'MASTER LMD', '0720916E', 'Le Mans', 'A17', 'Nantes', 'DEG', 'Droit, economie et gestion', 'disc05', 'Autres formations juridiques, economiques et de gestion', '30 mois apres le diplome', NULL, 17, '89', '10', 'ns', 'ns', 'ns', 'ns', 'ns', 'ns', 39.00, '7.3', '1760', 'ns', 'ns', '1430', '2070', 'Le Mans_30', 'disc05_30'),
(2015, 'MASTER LMD', '0691775E', 'Lyon 2 - Lumiere', 'A10', 'Lyon', 'LLA', 'Lettres, langues, arts', 'disc06', 'Lettres, langues, arts', '18 mois apres le diplome', NULL, 57, '63', '10', '87', 'ns', '54', '65', 'ns', 'ns', 33.00, '7.6', '1825', 'ns', '40', '1460', '2180', 'Lyon 2 - Lumiere_18', 'disc06_18'),
(2015, 'MASTER LMD', '0692437Z', 'Lyon 3 - Jean Moulin', 'A10', 'Lyon', 'LLA', 'Lettres, langues, arts', 'disc06', 'Lettres, langues, arts', '30 mois apres le diplome', NULL, 97, '69', '12', '89', '88', '79', '95', '1700', '26500', 25.00, '7.6', '1825', '48', '58', '1460', '2180', 'Lyon 3 - Jean Moulin_30', 'disc06_30'),
(2015, 'MASTER LMD', '0691774D', 'Lyon 1 - Claude Bernard', 'A10', 'Lyon', 'SHS', 'Sciences humaines et sociales', 'disc07', 'Ensemble sciences humaines et sociales', '18 mois apres le diplome', NULL, 11, '81', '2', 'ns', 'ns', 'ns', 'ns', 'ns', 'ns', 27.00, '7.6', '1825', 'ns', 'ns', '1460', '2180', 'Lyon 1 - Claude Bernard_18', 'disc07_18'),
(2015, 'MASTER LMD', '0691775E', 'Lyon 2 - Lumiere', 'A10', 'Lyon', 'SHS', 'Sciences humaines et sociales', 'disc07', 'Ensemble sciences humaines et sociales', '30 mois apres le diplome', NULL, 305, '74', '47', '90', '76', '55', '80', '1650', '25700', 33.00, '7.6', '1825', '48', '42', '1460', '2180', 'Lyon 2 - Lumiere_30', 'disc07_30'),
(2015, 'MASTER LMD', '0691775E', 'Lyon 2 - Lumiere', 'A10', 'Lyon', 'SHS', 'Sciences humaines et sociales', 'disc08', 'Histoire-geographie', '18 mois apres le diplome', NULL, 48, '69', '7', '91', 'ns', '31', '71', 'ns', 'ns', 33.00, '7.6', '1825', 'ns', '51', '1460', '2180', 'Lyon 2 - Lumiere_18', 'disc08_18'),
(2015, 'MASTER LMD', '0691775E', 'Lyon 2 - Lumiere', 'A10', 'Lyon', 'SHS', 'Sciences humaines et sociales', 'disc09', 'Psychologie', '18 mois apres le diplome', NULL, 73, '80', '11', '95', '91', '49', '44', 'ns', 'ns', 33.00, '7.6', '1825', '81', '26', '1460', '2180', 'Lyon 2 - Lumiere_18', 'disc09_18'),
(2015, 'MASTER LMD', '0751721N', 'Paris Rene Descartes', 'A01', 'Paris', 'SHS', 'Sciences humaines et sociales', 'disc09', 'Psychologie', '30 mois apres le diplome', NULL, 98, '64', '30', '95', '96', '67', '77', '1790', '27800', 21.00, '7.8', '2060', '87', '29', '1600', '2570', 'Paris Rene Descartes_30', 'disc09_30'),
(2015, 'MASTER LMD', '0751717J', 'Paris 1 - Pantheon Sorbonne', 'A01', 'Paris', 'SHS', 'Sciences humaines et sociales', 'disc10', 'Information communication', '30 mois apres le diplome', NULL, 9, '63', '1', 'ns', 'ns', 'ns', 'ns', 'ns', 'ns', 23.00, '7.8', '2060', 'ns', 'ns', '1600', '2570', 'Paris 1 - Pantheon Sorbonne_30', 'disc10_30'),
(2015, 'MASTER LMD', '0751717J', 'Paris 1 - Pantheon Sorbonne', 'A01', 'Paris', 'SHS', 'Sciences humaines et sociales', 'disc11', 'Autres sciences humaines et sociales', '18 mois apres le diplome', NULL, 142, '77', '14', '87', '83', '45', '90', '1800', '28100', 23.00, '7.8', '2060', '63', '32', '1600', '2570', 'Paris 1 - Pantheon Sorbonne_18', 'disc11_18'),
(2015, 'MASTER LMD', '0692437Z', 'Lyon 3 - Jean Moulin', 'A10', 'Lyon', 'SHS', 'Sciences humaines et sociales', 'disc11', 'Autres sciences humaines et sociales', '30 mois apres le diplome', NULL, 55, '84', '6', '93', '96', '65', '90', '1830', '28500', 25.00, '7.6', '1825', '60', '25', '1460', '2180', 'Lyon 3 - Jean Moulin_30', 'disc11_30'),
(2015, 'MASTER LMD', '0691774D', 'Lyon 1 - Claude Bernard', 'A10', 'Lyon', 'STS', 'Sciences, technologies et sante', 'disc12', 'Ensemble sciences, technologies et sante', '18 mois apres le diplome', NULL, 433, '76', '96', '87', '94', '69', '95', '1900', '29600', 27.00, '7.6', '1825', '72', '40', '1460', '2180', 'Lyon 1 - Claude Bernard_18', 'disc12_18'),
(2015, 'MASTER LMD', '0681166Y', 'Mulhouse - Haute Alsace', 'A15', 'Strasbourg', 'STS', 'Sciences, technologies et sante', 'disc12', 'Ensemble sciences, technologies et sante', '30 mois apres le diplome', NULL, 80, '70', '39', '95', '93', '83', '100', '2040', '31800', 23.00, '8.6', '1800', '71', '63', '1430', '2120', 'Mulhouse - Haute Alsace_30', 'disc12_30'),
(2015, 'MASTER LMD', '0691774D', 'Lyon 1 - Claude Bernard', 'A10', 'Lyon', 'STS', 'Sciences, technologies et sante', 'disc13', 'Sciences de la vie et de la terre', '18 mois apres le diplome', NULL, 172, '77', '38', '82', '90', '53', '96', '1800', '28100', 27.00, '7.6', '1825', '63', '40', '1460', '2180', 'Lyon 1 - Claude Bernard_18', 'disc13_18'),
(2015, 'MASTER LMD', '0751717J', 'Paris 1 - Pantheon Sorbonne', 'A01', 'Paris', 'STS', 'Sciences, technologies et sante', 'disc14', 'Sciences fondamentales', '18 mois apres le diplome', NULL, 3, '25', '1', 'ns', 'ns', 'ns', 'ns', 'ns', 'ns', 23.00, '7.8', '2060', 'ns', 'ns', '1600', '2570', 'Paris 1 - Pantheon Sorbonne_18', 'disc14_18'),
(2015, 'MASTER LMD', '0720916E', 'Le Mans', 'A17', 'Nantes', 'STS', 'Sciences, technologies et sante', 'disc14', 'Sciences fondamentales', '30 mois apres le diplome', NULL, 7, '75', '4', 'ns', 'ns', 'ns', 'ns', 'ns', 'ns', 39.00, '7.3', '1760', 'ns', 'ns', '1430', '2070', 'Le Mans_30', 'disc14_30'),
(2015, 'MASTER LMD', '0681166Y', 'Mulhouse - Haute Alsace', 'A15', 'Strasbourg', 'STS', 'Sciences, technologies et sante', 'disc15', 'Sciences de l\'ingenieur', '18 mois apres le diplome', NULL, 9, '69', '4', 'ns', 'ns', 'ns', 'ns', 'ns', 'ns', 23.00, '8.6', '1800', 'ns', 'ns', '1430', '2120', 'Mulhouse - Haute Alsace_18', 'disc15_18'),
(2015, 'MASTER LMD', '0691774D', 'Lyon 1 - Claude Bernard', 'A10', 'Lyon', 'STS', 'Sciences, technologies et sante', 'disc15', 'Sciences de l\'ingenieur', '30 mois apres le diplome', NULL, 104, '75', '23', '97', '100', '93', '97', '2170', '33800', 27.00, '7.6', '1825', '93', '40', '1460', '2180', 'Lyon 1 - Claude Bernard_30', 'disc15_30'),
(2015, 'MASTER ENS', '0730858L', 'Savoie Mont Blanc', 'A08', 'Grenoble', 'MEEF', 'Masters enseignement', 'disc18', 'Masters enseignement', '30 mois apres le diplome', NULL, 63, '78', '100', '100', '97', '94', '97', '1790', '27900', 8.00, '7.6', '1825', '68', '16', '1460', '2180', 'Savoie Mont Blanc_30', 'disc18_30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masters`
--
ALTER TABLE `masters`
  ADD PRIMARY KEY (`cle_DISC`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
