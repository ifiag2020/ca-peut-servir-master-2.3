-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 29 sep. 2020 à 12:58
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `servir`
--

-- --------------------------------------------------------

--
-- Structure de la table `activity_historiy`
--

CREATE TABLE `activity_historiy` (
  `id_activity_historiy` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `task` varchar(255) NOT NULL,
  `dellete` tinyint(1) NOT NULL,
  `date_add` date NOT NULL,
  `date_upd` date NOT NULL,
  `statuts` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `Sum` decimal(20,6) NOT NULL,
  `date_add` date NOT NULL DEFAULT current_timestamp(),
  `date_upd` date NOT NULL DEFAULT current_timestamp(),
  `delete` tinyint(4) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `Sum`, `date_add`, `date_upd`, `delete`, `status`) VALUES
(5, 67, '0.000000', '2020-09-27', '2020-09-27', 1, 0),
(6, 67, '0.000000', '2020-09-27', '2020-09-27', 1, 0),
(7, 67, '0.000000', '2020-09-27', '2020-09-27', 1, 0),
(8, 67, '0.000000', '2020-09-27', '2020-09-27', 1, 0),
(9, 67, '0.000000', '2020-09-27', '2020-09-27', 1, 0),
(10, 67, '0.000000', '2020-09-27', '2020-09-27', 1, 0),
(11, 67, '0.000000', '2020-09-27', '2020-09-27', 1, 0),
(12, 67, '0.000000', '2020-09-27', '2020-09-27', 1, 0),
(13, 67, '0.000000', '2020-09-27', '2020-09-27', 1, 0),
(14, 67, '0.000000', '2020-09-27', '2020-09-27', 1, 0),
(15, 67, '0.000000', '2020-09-28', '2020-09-28', 1, 0),
(16, 67, '0.000000', '2020-09-28', '2020-09-28', 1, 0),
(17, 67, '0.000000', '2020-09-28', '2020-09-28', 1, 0),
(18, 67, '0.000000', '2020-09-28', '2020-09-28', 1, 0),
(19, 67, '0.000000', '2020-09-28', '2020-09-28', 0, 2),
(20, 67, '0.000000', '2020-09-28', '2020-09-28', 0, 0),
(21, 67, '0.000000', '2020-09-28', '2020-09-28', 0, 2),
(22, 67, '0.000000', '2020-09-28', '2020-09-28', 0, 2),
(23, 67, '0.000000', '2020-09-28', '2020-09-28', 0, 0),
(24, 67, '0.000000', '2020-09-29', '2020-09-29', 0, 2),
(25, 67, '0.000000', '2020-09-29', '2020-09-29', 0, 2),
(26, 67, '0.000000', '2020-09-29', '2020-09-29', 0, 2),
(27, 67, '0.000000', '2020-09-29', '2020-09-29', 0, 2),
(28, 67, '0.000000', '2020-09-29', '2020-09-29', 0, 2),
(29, 67, '0.000000', '2020-09-29', '2020-09-29', 0, 2),
(30, 67, '0.000000', '2020-09-29', '2020-09-29', 0, 2),
(31, 67, '0.000000', '2020-09-29', '2020-09-29', 0, 0),
(32, 67, '0.000000', '2020-09-29', '2020-09-29', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cart_produit`
--

CREATE TABLE `cart_produit` (
  `id_cart_produit` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cart_produit`
--

INSERT INTO `cart_produit` (`id_cart_produit`, `id_cart`, `id_produit`, `qte`, `date_add`, `date_upd`, `delete`, `status`) VALUES
(3, 13, 9, 2, '2020-09-27 14:05:43', '0000-00-00 00:00:00', 1, 1),
(4, 13, 9, 3, '2020-09-27 14:06:12', '0000-00-00 00:00:00', 1, 1),
(5, 13, 14, 5, '2020-09-27 14:19:19', '0000-00-00 00:00:00', 0, 1),
(6, 13, 13, 3, '2020-09-27 14:21:17', '0000-00-00 00:00:00', 0, 1),
(7, 13, 12, 0, '2020-09-27 15:10:06', '0000-00-00 00:00:00', 0, 1),
(8, 14, 12, 0, '2020-09-27 20:40:26', '0000-00-00 00:00:00', 1, 1),
(9, 14, 15, 2, '2020-09-27 20:41:03', '0000-00-00 00:00:00', 1, 1),
(10, 14, 15, 1, '2020-09-27 20:42:25', '0000-00-00 00:00:00', 1, 1),
(11, 14, 12, 0, '2020-09-28 00:13:01', '0000-00-00 00:00:00', 1, 1),
(12, 14, 12, 1, '2020-09-28 00:13:07', '0000-00-00 00:00:00', 0, 1),
(13, 14, 13, 0, '2020-09-28 00:21:20', '0000-00-00 00:00:00', 1, 1),
(14, 14, 13, 0, '2020-09-28 00:21:27', '0000-00-00 00:00:00', 1, 1),
(15, 14, 14, 1, '2020-09-28 01:48:12', '0000-00-00 00:00:00', 0, 1),
(16, 15, 12, 1, '2020-09-28 16:23:46', '0000-00-00 00:00:00', 1, 1),
(17, 16, 12, 0, '2020-09-28 16:34:04', '0000-00-00 00:00:00', 1, 1),
(18, 16, 12, 6, '2020-09-28 16:34:28', '0000-00-00 00:00:00', 0, 1),
(19, 16, 12, 1, '2020-09-28 22:03:00', '0000-00-00 00:00:00', 0, 1),
(20, 17, 12, 2, '2020-09-28 22:06:59', '0000-00-00 00:00:00', 0, 1),
(21, 19, 13, 1, '2020-09-28 22:09:23', '0000-00-00 00:00:00', 0, 1),
(22, 19, 14, 1, '2020-09-28 22:09:55', '0000-00-00 00:00:00', 0, 1),
(23, 21, 14, 1, '2020-09-28 22:11:29', '0000-00-00 00:00:00', 0, 1),
(24, 22, 13, 1, '2020-09-28 22:12:00', '0000-00-00 00:00:00', 0, 1),
(25, 24, 13, 1, '2020-09-29 00:54:15', '0000-00-00 00:00:00', 0, 1),
(26, 25, 13, 1, '2020-09-29 00:58:54', '0000-00-00 00:00:00', 0, 1),
(27, 26, 12, 1, '2020-09-29 01:04:36', '0000-00-00 00:00:00', 0, 1),
(28, 27, 12, 1, '2020-09-29 01:11:01', '0000-00-00 00:00:00', 0, 1),
(29, 28, 12, 1, '2020-09-29 01:14:34', '0000-00-00 00:00:00', 0, 1),
(30, 29, 12, 1, '2020-09-29 01:15:22', '0000-00-00 00:00:00', 0, 1),
(31, 30, 14, 4, '2020-09-29 01:18:33', '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `dellete` tinyint(1) NOT NULL,
  `date_add` date NOT NULL,
  `date_upd` date NOT NULL,
  `statuts` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `id_parent`, `libelle`, `description`, `position`, `dellete`, `date_add`, `date_upd`, `statuts`) VALUES
(1, 0, 'Restaurant', 'Restaurant', 0, 0, '0000-00-00', '0000-00-00', 0),
(2, 0, 'Boulangerie', 'Boulangerie', 0, 0, '0000-00-00', '0000-00-00', 0),
(3, 0, 'Pâtisserie', 'Pâtisserie', 0, 0, '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `catrgorie_produit`
--

CREATE TABLE `catrgorie_produit` (
  `id_categorie_produit` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `ref_commande` varchar(50) NOT NULL,
  `date_commande` datetime NOT NULL,
  `montant_ht` decimal(20,6) NOT NULL,
  `montant_ttc` decimal(20,6) NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_cart`, `ref_commande`, `date_commande`, `montant_ht`, `montant_ttc`, `delete`, `date_add`, `date_upd`, `status`) VALUES
(15, 26, '30IDAO20200929013904', '2020-09-29 01:39:04', '125.000000', '150.000000', 0, '2020-09-29 01:39:04', '0000-00-00 00:00:00', 1),
(16, 27, '57IDAO20200929010411', '2020-09-29 01:04:11', '125.000000', '150.000000', 0, '2020-09-29 01:04:11', '0000-00-00 00:00:00', 1),
(17, 28, '62IDAO20200929013814', '2020-09-29 01:38:14', '125.000000', '150.000000', 0, '2020-09-29 01:38:14', '0000-00-00 00:00:00', 1),
(18, 29, '87IDAO20200929012515', '2020-09-29 01:25:15', '125.000000', '150.000000', 0, '2020-09-29 01:25:15', '0000-00-00 00:00:00', 1),
(19, 30, '98IDAO20200929013618', '2020-09-29 01:36:18', '111.000000', '133.200000', 0, '2020-09-29 01:36:18', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `depot`
--

CREATE TABLE `depot` (
  `id_depot` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `categorie` varchar(225) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `prix` decimal(20,6) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `depot`
--

INSERT INTO `depot` (`id_depot`, `id_user`, `categorie`, `libelle`, `prix`, `image`) VALUES
(19, 66, 'Restaurant', 'Riz', '2.000000', 'document-edit.png'),
(20, 65, 'Boulangerie', 'Pain', '23.000000', 'document-new.png'),
(21, 65, 'Boulangerie', 'boubou', '223.000000', 'document-encrypt.png'),
(22, 65, 'Restaurant', 'rfffff', '222222.000000', ''),
(23, 65, 'Boulangerie', 'zzzzzzz', '111111111.000000', ''),
(24, 65, 'Restaurant', 'foutou', '11111111111.000000', ''),
(25, 65, 'Boulangerie', 'aaaaaaaaaaaa', '99999999999999.999999', ''),
(26, 65, 'Boulangerie', 'Riz', '99999999999999.999999', ''),
(27, 65, 'Boulangerie', 'Riz', '2.000000', ''),
(28, 65, 'Pâtisserie', 'Pat', '9898.000000', ''),
(29, 65, 'Boulangerie', 'Riz', '4.000000', ''),
(30, 65, 'Boulangerie', 'Riz', '78.000000', 'application-exit.png'),
(31, 65, 'Restaurant', 'Riz', '3.000000', ''),
(32, 65, 'Boulangerie', 'Pain', '4.000000', ''),
(33, 65, 'Boulangerie', 'foutou2', '78.000000', ''),
(34, 65, 'Pâtisserie', 'aaaaaaaaaaaa', '5.000000', ''),
(35, 65, 'Pâtisserie', 'Riz', '31.000000', ''),
(36, 65, 'Boulangerie', 'Riz', '0.040000', ''),
(37, 67, 'Boulangerie', 'Abc', '22442.000000', ''),
(38, 67, 'Pâtisserie', 'YAHYA', '123.000000', '');

-- --------------------------------------------------------

--
-- Structure de la table `detail_commande`
--

CREATE TABLE `detail_commande` (
  `id_detail_commande` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `qte_commander` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id_favoris` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `date_add` datetime NOT NULL,
  `date_upd` datetime NOT NULL,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id_favoris`, `id_user`, `id_produit`, `date_add`, `date_upd`, `delete`, `status`) VALUES
(1, 67, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(2, 67, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(3, 67, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(4, 67, 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(5, 67, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(6, 67, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(7, 67, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(8, 67, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(9, 67, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(10, 67, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(11, 67, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(12, 67, 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(13, 67, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(14, 67, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1),
(15, 67, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(16, 67, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(17, 67, 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(18, 67, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(19, 67, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(20, 67, 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(21, 67, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(22, 67, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `mouvement`
--

CREATE TABLE `mouvement` (
  `id_mouvement` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `motif` varchar(100) NOT NULL,
  `date_mouvement` date NOT NULL,
  `nature` tinyint(1) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` decimal(20,6) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `dellete` tinyint(1) NOT NULL,
  `date_add` date NOT NULL,
  `date_upd` date NOT NULL,
  `statuts` tinyint(1) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `id_user`, `libelle`, `description`, `prix`, `id_categorie`, `dellete`, `date_add`, `date_upd`, `statuts`, `image`) VALUES
(9, 68, 'scd', 'substance qui peut être utilisée ou préparée pour fournir une nourriture. 2. Utiliser pour les documents qui recouvrent l\'ensemble des produits, sinon utiliser un descripteur plus spécifique.', '52.000000', 1, 0, '0000-00-00', '0000-00-00', 0, 'images/2926ac0b7ed45ed5706471e3f0905fcf.png'),
(12, 67, 'Pizza', 'substance qui peut être utilisée ou préparée pour fournir une nourriture. 2. Utiliser pour les documents qui recouvrent l\'ensemble des produits, sinon utiliser un descripteur plus spécifique.', '125.000000', 1, 0, '0000-00-00', '0000-00-00', 0, 'images/bf31ff047594eb923efe3a0f668e1d3c.png'),
(13, 67, 'Salade', 'substance qui peut être utilisée ou préparée pour fournir une nourriture. 2. Utiliser pour les documents qui recouvrent l\'ensemble des produits, sinon utiliser un descripteur plus spécifique.', '555.000000', 1, 0, '0000-00-00', '0000-00-00', 0, 'images/7663cb44d8238a6d61667978e0591edc.png'),
(14, 68, 'salade', 'substance qui peut être utilisée ou préparée pour fournir une nourriture. 2. Utiliser pour les documents qui recouvrent l\'ensemble des produits, sinon utiliser un descripteur plus spécifique.', '111.000000', 1, 0, '0000-00-00', '0000-00-00', 0, 'images/fa2a0a1130b0aab50d1e81e57dbd639d.png'),
(15, 67, 'cafe', 'substance qui peut être utilisée ou préparée pour fournir une nourriture. 2. Utiliser pour les documents qui recouvrent l\'ensemble des produits, sinon utiliser un descripteur plus spécifique.', '777.000000', 3, 0, '0000-00-00', '0000-00-00', 0, 'images/6abacd8a29a7818854ce409bf7238f87.png'),
(19, 76, 'test', 'substance qui peut être utilisée ou préparée pour fournir une nourriture. 2. Utiliser pour les documents qui recouvrent l\'ensemble des produits, sinon utiliser un descripteur plus spécifique.', '60.000000', 1, 0, '0000-00-00', '0000-00-00', 0, 'images/7e002bf417638079f5238d18a9991836.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `dellete` tinyint(1) NOT NULL,
  `date_add` date NOT NULL,
  `date_upd` date NOT NULL,
  `statuts` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profile`
--

INSERT INTO `profile` (`id_profile`, `libelle`, `dellete`, `date_add`, `date_upd`, `statuts`) VALUES
(1, 'admin', 0, '0000-00-00', '0000-00-00', 0),
(2, 'particulier ', 0, '0000-00-00', '0000-00-00', 0),
(3, 'professionnel', 0, '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `profile_role`
--

CREATE TABLE `profile_role` (
  `id_profile_role` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `access` tinyint(1) NOT NULL,
  `dellete` tinyint(1) NOT NULL,
  `date_add` date NOT NULL,
  `date_upd` date NOT NULL,
  `statuts` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `dellete` tinyint(1) NOT NULL,
  `date_add` date NOT NULL,
  `date_upd` date NOT NULL,
  `statuts` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `statut_commande`
--

CREATE TABLE `statut_commande` (
  `id_statuts_commande` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `couleur` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statut_commande`
--

INSERT INTO `statut_commande` (`id_statuts_commande`, `libelle`, `couleur`) VALUES
(1, 'En attente de validation', '#f00'),
(2, 'Validée', '#0f0');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `qte_innitial` int(11) NOT NULL,
  `qte_actuel` int(11) NOT NULL,
  `dellete` tinyint(1) NOT NULL,
  `date_add` date NOT NULL,
  `date_upd` date NOT NULL,
  `statuts` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `nom_commerce` varchar(100) NOT NULL,
  `specialite` varchar(100) NOT NULL,
  `dellete` tinyint(1) NOT NULL,
  `date_add` date NOT NULL,
  `date_upd` date NOT NULL,
  `statuts` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `id_profile`, `nom`, `prenom`, `email`, `pwd`, `adresse`, `telephone`, `nom_commerce`, `specialite`, `dellete`, `date_add`, `date_upd`, `statuts`) VALUES
(67, 2, 'YAHYA', 'Aymane', 'yahya.tdi202@gmail.com', '123456', 'Rue 2015', '0602611615', '', '', 0, '0000-00-00', '0000-00-00', 0),
(68, 3, 'BIM', '', 'super@bim.com', '123456', 'Casa', '024055555', '', 'BATBATA', 0, '0000-00-00', '0000-00-00', 0),
(76, 2, 'Test', 'Test', 'test.test@gmail.com', '123456', 'test', '0000000000', '', '', 0, '0000-00-00', '0000-00-00', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activity_historiy`
--
ALTER TABLE `activity_historiy`
  ADD PRIMARY KEY (`id_activity_historiy`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `cart_produit`
--
ALTER TABLE `cart_produit`
  ADD PRIMARY KEY (`id_cart_produit`),
  ADD KEY `id_cart` (`id_cart`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `catrgorie_produit`
--
ALTER TABLE `catrgorie_produit`
  ADD PRIMARY KEY (`id_categorie_produit`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_cart` (`id_cart`);

--
-- Index pour la table `depot`
--
ALTER TABLE `depot`
  ADD PRIMARY KEY (`id_depot`);

--
-- Index pour la table `detail_commande`
--
ALTER TABLE `detail_commande`
  ADD PRIMARY KEY (`id_detail_commande`),
  ADD KEY `id_commande` (`id_commande`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id_favoris`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `mouvement`
--
ALTER TABLE `mouvement`
  ADD PRIMARY KEY (`id_mouvement`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id_categorie` (`id_categorie`),
  ADD KEY `produit_ibfk_1` (`id_user`);

--
-- Index pour la table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Index pour la table `profile_role`
--
ALTER TABLE `profile_role`
  ADD PRIMARY KEY (`id_profile_role`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_profile` (`id_profile`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `statut_commande`
--
ALTER TABLE `statut_commande`
  ADD PRIMARY KEY (`id_statuts_commande`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_profile` (`id_profile`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activity_historiy`
--
ALTER TABLE `activity_historiy`
  MODIFY `id_activity_historiy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `cart_produit`
--
ALTER TABLE `cart_produit`
  MODIFY `id_cart_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `catrgorie_produit`
--
ALTER TABLE `catrgorie_produit`
  MODIFY `id_categorie_produit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `depot`
--
ALTER TABLE `depot`
  MODIFY `id_depot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `detail_commande`
--
ALTER TABLE `detail_commande`
  MODIFY `id_detail_commande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id_favoris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `mouvement`
--
ALTER TABLE `mouvement`
  MODIFY `id_mouvement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `profile_role`
--
ALTER TABLE `profile_role`
  MODIFY `id_profile_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `statut_commande`
--
ALTER TABLE `statut_commande`
  MODIFY `id_statuts_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activity_historiy`
--
ALTER TABLE `activity_historiy`
  ADD CONSTRAINT `activity_historiy_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `cart_produit`
--
ALTER TABLE `cart_produit`
  ADD CONSTRAINT `cart_produit_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`),
  ADD CONSTRAINT `cart_produit_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Contraintes pour la table `catrgorie_produit`
--
ALTER TABLE `catrgorie_produit`
  ADD CONSTRAINT `catrgorie_produit_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `catrgorie_produit_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `cart` (`id_cart`);

--
-- Contraintes pour la table `detail_commande`
--
ALTER TABLE `detail_commande`
  ADD CONSTRAINT `detail_commande_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_commande_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Contraintes pour la table `mouvement`
--
ALTER TABLE `mouvement`
  ADD CONSTRAINT `mouvement_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `profile_role`
--
ALTER TABLE `profile_role`
  ADD CONSTRAINT `profile_role_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profile_role_ibfk_2` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id_profile`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
