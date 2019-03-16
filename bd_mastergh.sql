-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 07 Mars 2019 à 12:04
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bd_mastergh`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_abonne`
--

CREATE TABLE `t_abonne` (
  `id` int(11) NOT NULL,
  `dateCreation` date NOT NULL,
  `nombreAbonne` int(11) NOT NULL,
  `mode_paiem` varchar(255) NOT NULL,
  `taux_reduc` varchar(255) NOT NULL,
  `id_entrep` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `etat` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_agent`
--

CREATE TABLE `t_agent` (
  `id` int(11) NOT NULL,
  `dateCreation` date NOT NULL,
  `noms` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `etatcivil` varchar(255) NOT NULL,
  `nombreEnfant` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_agent`
--

INSERT INTO `t_agent` (`id`, `dateCreation`, `noms`, `telephone`, `adresse`, `categorie`, `qualification`, `etatcivil`, `nombreEnfant`, `id_user`) VALUES
(1, '2019-03-01', 'Mwelwa ilunga zeph', '0907210701', 'il faut le cherher cest un fantome', 'caissier', 'comptable', 'celibataire', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_chambre`
--

CREATE TABLE `t_chambre` (
  `id` int(11) NOT NULL,
  `localisation` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `capacite` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `etat` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_commande`
--

CREATE TABLE `t_commande` (
  `id` int(11) NOT NULL,
  `num_cmd` varchar(10) NOT NULL,
  `date_creation` date NOT NULL,
  `num_produit` varchar(255) NOT NULL,
  `nom_produit` varchar(25) NOT NULL,
  `prix_unit` int(11) NOT NULL,
  `qte` varchar(11) NOT NULL,
  `unite_mesure` varchar(25) NOT NULL,
  `prix_total` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_commande`
--

INSERT INTO `t_commande` (`id`, `num_cmd`, `date_creation`, `num_produit`, `nom_produit`, `prix_unit`, `qte`, `unite_mesure`, `prix_total`, `id_user`) VALUES
(1, 'BC00000001', '2019-02-28', 'P001', 'loloo', 7, '45', 'kg', '315', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_consultation`
--

CREATE TABLE `t_consultation` (
  `id` int(11) NOT NULL,
  `numF` varchar(11) NOT NULL,
  `dateCreation` date NOT NULL,
  `nomComplet` varchar(35) NOT NULL,
  `age` int(11) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `poids` varchar(11) NOT NULL,
  `temperature` varchar(11) NOT NULL,
  `taille` float NOT NULL,
  `observation` varchar(255) NOT NULL,
  `dateProchaine` datetime NOT NULL,
  `numP` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_corp_medical`
--

CREATE TABLE `t_corp_medical` (
  `id` int(11) NOT NULL,
  `noms` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_corp_medical`
--

INSERT INTO `t_corp_medical` (`id`, `noms`, `telephone`, `adresse`, `categorie`, `qualification`, `id_user`) VALUES
(1, 'Mwelwa ilunga zeph', '0907210701', 'il faut le cherher cest un faaaaaaaaaaaaantome', 'caissier', 'comptable', 2);

-- --------------------------------------------------------

--
-- Structure de la table `t_entetecmd`
--

CREATE TABLE `t_entetecmd` (
  `num_cmd` varchar(10) NOT NULL,
  `date_creation` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `nom_fournisseur` varchar(255) NOT NULL,
  `valid_caisse` bit(1) NOT NULL DEFAULT b'0',
  `valid_med_dir` bit(1) NOT NULL DEFAULT b'0',
  `devise` varchar(255) NOT NULL,
  `fproforma_url` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_entetecmd`
--

INSERT INTO `t_entetecmd` (`num_cmd`, `date_creation`, `description`, `nom_fournisseur`, `valid_caisse`, `valid_med_dir`, `devise`, `fproforma_url`, `id_user`) VALUES
('BC00000001', '2019-02-28', 'lksdjfslfjalskfjslka', '1', b'0', b'0', 'fc', 'contents/Tkinter.pdf', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_entetercp`
--

CREATE TABLE `t_entetercp` (
  `num_reception` varchar(255) NOT NULL,
  `numcmd` varchar(255) NOT NULL,
  `datecommande` date NOT NULL,
  `nomfss` varchar(255) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_entreprise`
--

CREATE TABLE `t_entreprise` (
  `id` int(11) NOT NULL,
  `nom_entrep` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_fiche`
--

CREATE TABLE `t_fiche` (
  `numF` varchar(11) NOT NULL,
  `dateCreation` date NOT NULL,
  `nomComplet` varchar(35) NOT NULL,
  `age` int(11) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `poids` double NOT NULL,
  `temperature` double NOT NULL,
  `taille` float NOT NULL,
  `numP` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_fournisseur`
--

CREATE TABLE `t_fournisseur` (
  `id_fourn` int(11) NOT NULL,
  `dateCreation` date NOT NULL,
  `nom_four` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_fournisseur`
--

INSERT INTO `t_fournisseur` (`id_fourn`, `dateCreation`, `nom_four`, `adresse`, `telephone`, `id_user`) VALUES
(1, '2019-02-27', 'kikoyola', 'chez lui labas lasbas', '0997210701', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_hebergement`
--

CREATE TABLE `t_hebergement` (
  `id` int(11) NOT NULL,
  `dateCreation` date NOT NULL,
  `numF` varchar(255) NOT NULL,
  `nomComplet` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `localisation` varchar(255) NOT NULL,
  `motif` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_notifheberg`
--

CREATE TABLE `t_notifheberg` (
  `id` int(11) NOT NULL,
  `numF` varchar(255) NOT NULL,
  `nomComplet` varchar(255) NOT NULL,
  `motif` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `etat` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_ordonnance`
--

CREATE TABLE `t_ordonnance` (
  `num_ordonnance` varchar(10) NOT NULL,
  `nom_malade` varchar(25) NOT NULL,
  `age` int(11) NOT NULL,
  `sexe` varchar(10) NOT NULL,
  `poids` int(11) NOT NULL,
  `datedes` varchar(10) NOT NULL,
  `nom_medecin` varchar(25) NOT NULL,
  `medicaments` varchar(255) NOT NULL,
  `prix_tot` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_patients`
--

CREATE TABLE `t_patients` (
  `id_pat` int(11) NOT NULL,
  `nom_pat` text NOT NULL,
  `age_pat` text NOT NULL,
  `adresse_pat` text NOT NULL,
  `tel_pat` text NOT NULL,
  `type_pat` varchar(255) NOT NULL,
  `entreprise` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_planning`
--

CREATE TABLE `t_planning` (
  `id` int(11) NOT NULL,
  `numF` varchar(11) NOT NULL,
  `nomComplet` varchar(35) NOT NULL,
  `dateC` date NOT NULL,
  `heure` varchar(7) NOT NULL,
  `id_user` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_produit`
--

CREATE TABLE `t_produit` (
  `id_prod` varchar(10) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `unite_mesure` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_produit`
--

INSERT INTO `t_produit` (`id_prod`, `designation`, `unite_mesure`, `id_user`) VALUES
('P000000001', 'polo', 'kg', 1),
('P000000002', 'lol', 'loolpo', 1),
('P000000003', 'jojo', 'comprime', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_produits`
--

CREATE TABLE `t_produits` (
  `id_prod` varchar(10) NOT NULL,
  `designation_prod` varchar(50) NOT NULL,
  `unite_mesure` varchar(15) NOT NULL,
  `prix_unitaire` varchar(10) NOT NULL,
  `quantite` varchar(10) NOT NULL,
  `date_expiration` varchar(10) NOT NULL,
  `nom_fournisseur` varchar(25) NOT NULL,
  `localisation` varchar(25) NOT NULL,
  `seuil_min` varchar(25) NOT NULL,
  `seuil_max` varchar(25) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_produits`
--

INSERT INTO `t_produits` (`id_prod`, `designation_prod`, `unite_mesure`, `prix_unitaire`, `quantite`, `date_expiration`, `nom_fournisseur`, `localisation`, `seuil_min`, `seuil_max`, `id_user`) VALUES
('P001', 'loloo', 'kg', '8', '7', '2020/02/19', 'pereper', 'jjklhkljgkgjk', '4', '9', 0),
('P002', 'aspirine', 'plaquettes', '23', '1', '2020/02/19', 'MR LUSA', 'range 6', '7', '23', 0),
('P005', 'quinine', 'plaquettes', '7', '6', '2020/02/19', 'perepere', 'range 6', '7', '23', 0);

-- --------------------------------------------------------

--
-- Structure de la table `t_proprietaite`
--

CREATE TABLE `t_proprietaite` (
  `id` int(11) NOT NULL,
  `dateCreation` date NOT NULL,
  `nom_firme` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_proprietaite`
--

INSERT INTO `t_proprietaite` (`id`, `dateCreation`, `nom_firme`, `adresse`, `telephone`, `logo`) VALUES
(1, '2019-02-25', 'Congo software', '3è avenue/dilungu/biashara ', '0994571713', 'images/logo.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `t_reception`
--

CREATE TABLE `t_reception` (
  `id` int(11) NOT NULL,
  `num_reception` int(11) NOT NULL,
  `num_produit` varchar(50) NOT NULL,
  `nom_produit` varchar(50) NOT NULL,
  `qte_commande` varchar(10) NOT NULL,
  `qte_receptionne` varchar(10) NOT NULL,
  `unite_mesure` varchar(10) NOT NULL,
  `prix_total` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur`
--

CREATE TABLE `t_utilisateur` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(25) NOT NULL,
  `code` text NOT NULL,
  `type_` varchar(25) NOT NULL,
  `heure_connect` datetime NOT NULL,
  `etat` bit(1) NOT NULL DEFAULT b'0',
  `etat_autorisation` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`id`, `pseudo`, `code`, `type_`, `heure_connect`, `etat`, `etat_autorisation`) VALUES
(1, 'admin', 'b94c59c5700f0b574ee7794d3db818758fbda41d', 'admin', '2019-03-05 14:13:59', b'0', b'1'),
(2, 'zedd', '7c222fb2927d828af22f592134e8932480637c0d', 'medecin directeur', '2019-03-02 17:04:12', b'0', b'1'),
(3, 'zeddkamungu', '01b307acba4f54f55aafc33bb06bbbf6ca803e9a', 'caissier', '2019-03-01 18:34:55', b'0', b'1');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_abonne`
--
ALTER TABLE `t_abonne`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_agent`
--
ALTER TABLE `t_agent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_chambre`
--
ALTER TABLE `t_chambre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_commande`
--
ALTER TABLE `t_commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_consultation`
--
ALTER TABLE `t_consultation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_corp_medical`
--
ALTER TABLE `t_corp_medical`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_entetecmd`
--
ALTER TABLE `t_entetecmd`
  ADD PRIMARY KEY (`num_cmd`);

--
-- Index pour la table `t_entetercp`
--
ALTER TABLE `t_entetercp`
  ADD PRIMARY KEY (`num_reception`);

--
-- Index pour la table `t_entreprise`
--
ALTER TABLE `t_entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_fiche`
--
ALTER TABLE `t_fiche`
  ADD PRIMARY KEY (`numF`);

--
-- Index pour la table `t_fournisseur`
--
ALTER TABLE `t_fournisseur`
  ADD PRIMARY KEY (`id_fourn`);

--
-- Index pour la table `t_hebergement`
--
ALTER TABLE `t_hebergement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_notifheberg`
--
ALTER TABLE `t_notifheberg`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_ordonnance`
--
ALTER TABLE `t_ordonnance`
  ADD PRIMARY KEY (`num_ordonnance`);

--
-- Index pour la table `t_patients`
--
ALTER TABLE `t_patients`
  ADD PRIMARY KEY (`id_pat`);

--
-- Index pour la table `t_planning`
--
ALTER TABLE `t_planning`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_produit`
--
ALTER TABLE `t_produit`
  ADD PRIMARY KEY (`id_prod`);

--
-- Index pour la table `t_produits`
--
ALTER TABLE `t_produits`
  ADD PRIMARY KEY (`id_prod`);

--
-- Index pour la table `t_proprietaite`
--
ALTER TABLE `t_proprietaite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_reception`
--
ALTER TABLE `t_reception`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_agent`
--
ALTER TABLE `t_agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_chambre`
--
ALTER TABLE `t_chambre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_commande`
--
ALTER TABLE `t_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_consultation`
--
ALTER TABLE `t_consultation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_corp_medical`
--
ALTER TABLE `t_corp_medical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_entreprise`
--
ALTER TABLE `t_entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_fournisseur`
--
ALTER TABLE `t_fournisseur`
  MODIFY `id_fourn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_hebergement`
--
ALTER TABLE `t_hebergement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_notifheberg`
--
ALTER TABLE `t_notifheberg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_patients`
--
ALTER TABLE `t_patients`
  MODIFY `id_pat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_planning`
--
ALTER TABLE `t_planning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_proprietaite`
--
ALTER TABLE `t_proprietaite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `t_reception`
--
ALTER TABLE `t_reception`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
