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