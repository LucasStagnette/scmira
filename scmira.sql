-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2023 at 05:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scmira`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `nom` text NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `responsable` varchar(20) NOT NULL,
  `id_entreprise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id_client`, `nom`, `telephone`, `mail`, `responsable`, `id_entreprise`) VALUES
(1, 'lucas', '06792736293', 'lucasgrosliere@outlook.fr', 'maria', 1),
(2, 'andre2', '3456787654', 'andreparo@gmail.com', 'lucas', 2);

-- --------------------------------------------------------

--
-- Table structure for table `collaborateurs`
--

CREATE TABLE `collaborateurs` (
  `id_collab` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `visa` varchar(20) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `statut` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `entreprises`
--

CREATE TABLE `entreprises` (
  `id_entreprise` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `responsable` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entreprises`
--

INSERT INTO `entreprises` (`id_entreprise`, `nom`, `telephone`, `adresse`, `mail`, `responsable`) VALUES
(1, 'la capital', '3498569', 'rue de la capital', 'capital@jsp.com', 'marie'),
(2, 'les mouettes', '123456789', 'rue des mouettes', 'mouettes@mer.fr', 'pastis');

-- --------------------------------------------------------

--
-- Table structure for table `vannes`
--

CREATE TABLE `vannes` (
  `id_vanne` int(11) NOT NULL,
  `client` varchar(20) NOT NULL,
  `unite` varchar(20) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `repere` varchar(20) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `nserie` varchar(50) NOT NULL,
  `dnentreesortie` varchar(50) NOT NULL,
  `pnentreesortie` varchar(50) NOT NULL,
  `connexionentreesortie` varchar(50) NOT NULL,
  `produit` varchar(50) NOT NULL,
  `etatproduit` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `temperature` varchar(50) NOT NULL,
  `pressiontarage` varchar(50) NOT NULL,
  `ctrl1` varchar(50) NOT NULL,
  `ctrl2` varchar(50) NOT NULL,
  `ctrl3` varchar(50) NOT NULL,
  `obsavantdemo` varchar(50) NOT NULL,
  `hauteurvisreglage` varchar(50) NOT NULL,
  `posbagueinf` varchar(50) NOT NULL,
  `posbaguesup` varchar(50) NOT NULL,
  `nbentretoises` varchar(50) NOT NULL,
  `diametrepassagebuse` varchar(50) NOT NULL,
  `e_corpsexterne` varchar(50) NOT NULL,
  `e_corpsinterne` varchar(50) NOT NULL,
  `e_ressortpoidsrondelles` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
-- ajout du reste des infos des vannes
ALTER TABLE `vannes` 
  ADD `e_tige` varchar(50) NOT NULL,
  ADD `e_buse` varchar(50) NOT NULL,
  ADD `e_clapet` varchar(50) NOT NULL,
  ADD `e_soufflet` varchar(50) NOT NULL,
  ADD `e_goujons` varchar(50) NOT NULL,
  ADD `e_baguevisarret` varchar(50) NOT NULL,
  ADD `e_visreglage` varchar(50) NOT NULL,
  ADD `e_guide` varchar(50) NOT NULL,
  ADD `e_porteclapet` varchar(50) NOT NULL,
  ADD `e_pointal` varchar(50) NOT NULL,
  ADD `e_porteesjoint` varchar(50) NOT NULL,
  ADD `tr_corpsexterne` varchar(50) NOT NULL,
  ADD `tr_corpsinterne` varchar(50) NOT NULL,
  ADD `tr_ressortpoidsrondelles` varchar(50) NOT NULL,
  ADD `tr_tige` varchar(50) NOT NULL,
  ADD `tr_buse` varchar(50) NOT NULL,
  ADD `tr_clapet` varchar(50) NOT NULL,
  ADD `tr_soufflet` varchar(50) NOT NULL,
  ADD `tr_goujons` varchar(50) NOT NULL,
  ADD `tr_baguevisarret` varchar(50) NOT NULL,
  ADD `tr_visreglage` varchar(50) NOT NULL,
  ADD `tr_guide` varchar(50) NOT NULL,
  ADD `tr_porteclapet` varchar(50) NOT NULL,
  ADD `tr_pointal` varchar(50) NOT NULL,
  ADD `tr_porteesjoint` varchar(50) NOT NULL,
  ADD `obs` varchar(50) NOT NULL,
  ADD `essais_pt` varchar(50) NOT NULL,
  ADD `essais_pr` varchar(50) NOT NULL,
  ADD `essais_fluide` varchar(5) NOT NULL,
  ADD `essais_nbbullesgouttes` varchar(50) NOT NULL,
  ADD `essais_hauteurvisreglage` varchar(50) NOT NULL,
  ADD `essais_etancheitesouffelt` varchar(50) NOT NULL,
  ADD `essais_etancheiteexterne` varchar(50) NOT NULL,
  ADD `essais_peinturefinale` varchar(50) NOT NULL,
  ADD `remontage` varchar(50) NOT NULL;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `fk_entreprise_client` (`id_entreprise`);

--
-- Indexes for table `collaborateurs`
--
ALTER TABLE `collaborateurs`
  ADD PRIMARY KEY (`id_collab`);

--
-- Indexes for table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id_entreprise`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `collaborateurs`
--
ALTER TABLE `collaborateurs`
  MODIFY `id_collab` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id_entreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `fk_entreprise_client` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprises` (`id_entreprise`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
