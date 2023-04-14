-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 14 avr. 2023 à 12:04
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `scmira`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `nom` text NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `responsable` varchar(20) NOT NULL,
  `id_entreprise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `collaborateurs`
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
-- Structure de la table `entreprises`
--

CREATE TABLE `entreprises` (
  `id_entreprise` int(11) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `responsable` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vannes`
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
  `e_ressortpoidsrondelles` varchar(50) NOT NULL,
  `e_tige` varchar(50) NOT NULL,
  `e_buse` varchar(50) NOT NULL,
  `e_clapet` varchar(50) NOT NULL,
  `e_soufflet` varchar(50) NOT NULL,
  `e_goujons` varchar(50) NOT NULL,
  `e_baguevisarret` varchar(50) NOT NULL,
  `e_visreglage` varchar(50) NOT NULL,
  `e_guide` varchar(50) NOT NULL,
  `e_porteclapet` varchar(50) NOT NULL,
  `e_pointal` varchar(50) NOT NULL,
  `e_porteesjoint` varchar(50) NOT NULL,
  `tr_corpsexterne` varchar(50) NOT NULL,
  `tr_corpsinterne` varchar(50) NOT NULL,
  `tr_ressortpoidsrondelles` varchar(50) NOT NULL,
  `tr_tige` varchar(50) NOT NULL,
  `tr_buse` varchar(50) NOT NULL,
  `tr_clapet` varchar(50) NOT NULL,
  `tr_soufflet` varchar(50) NOT NULL,
  `tr_goujons` varchar(50) NOT NULL,
  `tr_baguevisarret` varchar(50) NOT NULL,
  `tr_visreglage` varchar(50) NOT NULL,
  `tr_guide` varchar(50) NOT NULL,
  `tr_porteclapet` varchar(50) NOT NULL,
  `tr_pointal` varchar(50) NOT NULL,
  `tr_porteesjoint` varchar(50) NOT NULL,
  `obs` varchar(50) NOT NULL,
  `essais_pt` varchar(50) NOT NULL,
  `essais_pr` varchar(50) NOT NULL,
  `essais_fluide` varchar(5) NOT NULL,
  `essais_nbbullesgouttes` varchar(50) NOT NULL,
  `essais_hauteurvisreglage` varchar(50) NOT NULL,
  `essais_etancheitesouffelt` varchar(50) NOT NULL,
  `essais_etancheiteexterne` varchar(50) NOT NULL,
  `essais_peinturefinale` varchar(50) NOT NULL,
  `remontage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `collaborateurs`
--
ALTER TABLE `collaborateurs`
  ADD PRIMARY KEY (`id_collab`);

--
-- Index pour la table `entreprises`
--
ALTER TABLE `entreprises`
  ADD PRIMARY KEY (`id_entreprise`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `collaborateurs`
--
ALTER TABLE `collaborateurs`
  MODIFY `id_collab` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `entreprises`
--
ALTER TABLE `entreprises`
  MODIFY `id_entreprise` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
