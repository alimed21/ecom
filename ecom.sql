-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 08 août 2023 à 12:32
-- Version du serveur : 8.0.33-0ubuntu0.22.04.4
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecom`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `login_admin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `login_admin`, `password`, `email_admin`) VALUES
(1, 'ali', '6391cbd27b9551ecd5cc394efd6ca882', 'alimohamedaliahmed@outlook.fr');

-- --------------------------------------------------------

--
-- Structure de la table `boutiques`
--

CREATE TABLE `boutiques` (
  `id_boutique` int NOT NULL,
  `nom_boutique` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tele_boutique` int NOT NULL,
  `adr_boutique` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nom_gerant_boutique` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tele_gerant` int NOT NULL,
  `email_gerant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `patente_boutique` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `compte_bancaire` int NOT NULL,
  `nom_banque` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `page_facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `logo_boutique` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `code_boutique` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `premium` tinyint DEFAULT NULL,
  `id_admin_valid` int DEFAULT NULL,
  `date_valid` date DEFAULT NULL,
  `id_admin_delete` int DEFAULT NULL,
  `date_delete` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `boutiques`
--

INSERT INTO `boutiques` (`id_boutique`, `nom_boutique`, `tele_boutique`, `adr_boutique`, `nom_gerant_boutique`, `tele_gerant`, `email_gerant`, `patente_boutique`, `compte_bancaire`, `nom_banque`, `page_facebook`, `logo_boutique`, `code_boutique`, `premium`, `id_admin_valid`, `date_valid`, `id_admin_delete`, `date_delete`) VALUES
(1, 'MyExpress', 77580622, 'Quartier 4 Rue 09', 'Ali Mohamed Ali', 77632669, 'alimohamedaliahmed@outlook.fr', 'c83739135e2c57bc36a9d371f6b8c6bd.pdf', 1234545362, 'Salam', 'test', NULL, 'ILADyRa', 0, 1, '2023-03-01', NULL, NULL),
(2, 'Test', 12345656, 'djibouti', 'Ali Mohamed', 77632669, 'alimohamed@gmail.com', '2c7cb84a2c32180732826cb6ff11b6ec.pdf', 1234245245, 'East AFRICA', 'J\'ai pas.', NULL, 'PwLZvNr', 0, NULL, NULL, NULL, NULL),
(3, 'MyShop', 70000000, 'alimed@gmail.com', 'Ahmed', 77000000, 'test@gmail.com', '3cc58800909372673b3441fdfd264b6d.pdf', 12345322, 'East AFRICA', '', '1ae67be3e2d2f0845fdae2c9aad1316b.png', 'aRWEw6p', 0, 1, '2023-03-02', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categorieproduit`
--

CREATE TABLE `categorieproduit` (
  `id_cate` int NOT NULL,
  `cate` varchar(255) NOT NULL,
  `id_admin_add` int NOT NULL,
  `date_add` date NOT NULL,
  `id_admin_delete` int DEFAULT NULL,
  `date_delete` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `categorieproduit`
--

INSERT INTO `categorieproduit` (`id_cate`, `cate`, `id_admin_add`, `date_add`, `id_admin_delete`, `date_delete`) VALUES
(1, 'Hommes', 1, '2023-03-06', NULL, NULL),
(2, 'Femmes', 1, '2023-03-06', NULL, NULL),
(3, 'Enfants', 1, '2023-03-06', NULL, NULL),
(4, 'Autres', 1, '2023-03-06', NULL, NULL),
(5, 'Tst', 1, '2023-03-12', 1, '2023-03-12');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `genre` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_inscrit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `adresse`, `telephone`, `email`, `genre`, `username`, `password`, `date_inscrit`) VALUES
(1, 'Ali Mohamed Ali', 'Rue 09', 77632669, 'alimohamedaliahmed@outlook.fr', 'Homme', 'ali.med', '12345678', '2023-03-20 00:00:00'),
(2, 'SOULEIMAN HASSAN', 'balbala, t9', 77802014, 'eimannabe8@gmail.com', 'Homme', 'Souleiman', '802014', '2023-03-23 00:00:00'),
(3, 'Ahmed Farah', 'Quartier 7', 77880098, 'ahmed@gmail.com', 'Homme', 'ahmed', '12345678', '2023-04-10 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_cmd` int NOT NULL,
  `id_client` int NOT NULL,
  `code_cmd` varchar(255) NOT NULL,
  `id_prod` int NOT NULL,
  `id_four` int NOT NULL,
  `quantite` int DEFAULT NULL,
  `prix_unitaire` int NOT NULL,
  `totalPrix` int NOT NULL,
  `date_cmd` timestamp NOT NULL,
  `valid_client_cmd` int DEFAULT NULL,
  `date_valid_client` datetime DEFAULT NULL,
  `valid_four_cmd` int DEFAULT NULL,
  `date_valid_four` datetime DEFAULT NULL,
  `date_delete_cmd` datetime DEFAULT NULL,
  `id_four_delete_cmd` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_cmd`, `id_client`, `code_cmd`, `id_prod`, `id_four`, `quantite`, `prix_unitaire`, `totalPrix`, `date_cmd`, `valid_client_cmd`, `date_valid_client`, `valid_four_cmd`, `date_valid_four`, `date_delete_cmd`, `id_four_delete_cmd`) VALUES
(1, 1, '1IxOlF8RiG', 2, 3, 1, 2000, 2000, '2023-03-24 19:39:29', 1, '2023-03-27 21:03:13', NULL, NULL, '2023-05-09 22:52:03', 3),
(4, 1, 'F9JP3A0H2p', 2, 3, 3, 2000, 6000, '2023-03-27 10:25:57', 1, '2023-03-27 21:03:13', NULL, NULL, '2023-03-30 00:41:37', 3),
(6, 1, 'iXCu2gqZ1c', 6, 3, 5, 50000, 250000, '2023-03-27 21:35:28', 1, '2023-03-28 00:36:06', NULL, NULL, '2023-03-30 00:42:14', 3),
(8, 1, 'a5DgiAF1Zf', 2, 3, 3, 2000, 6000, '2023-03-29 22:08:50', 1, '2023-03-30 01:13:08', 3, '2023-04-10 00:26:58', NULL, NULL),
(9, 1, 'kBxEshDn56', 2, 3, 3, 2000, 6000, '2023-04-04 19:15:06', 1, '2023-04-04 22:16:36', 3, '2023-04-10 00:27:11', NULL, NULL),
(11, 3, 'gkvJW29FVj', 6, 3, 2, 50000, 100000, '2023-04-09 21:23:24', 3, '2023-04-10 00:26:18', 3, '2023-04-10 00:27:04', NULL, NULL),
(12, 3, 'P1oeIOtmlp', 6, 3, 1, 50000, 50000, '2023-04-09 21:23:30', 3, '2023-04-10 00:26:18', 3, '2023-04-10 00:27:22', NULL, NULL),
(13, 3, 'zDJ6PjTtnv', 3, 3, 2, 1000, 2000, '2023-06-13 21:23:43', 3, '2023-04-10 00:26:18', 3, '2023-04-10 00:27:27', NULL, NULL),
(14, 3, 'mszwK94xZX', 3, 3, 1, 1000, 1000, '2023-04-09 21:23:55', 3, '2023-04-10 00:26:18', NULL, NULL, NULL, NULL),
(15, 3, 'nRJrEm4ouH', 7, 1, 2, 10000, 20000, '2023-04-10 18:44:53', 3, '2023-04-10 21:45:00', 1, '2023-04-10 21:45:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `historique_emarcher`
--

CREATE TABLE `historique_emarcher` (
  `id_his` int NOT NULL,
  `id_user` int NOT NULL,
  `action` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `date_his` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `historique_emarcher`
--

INSERT INTO `historique_emarcher` (`id_his`, `id_user`, `action`, `date_his`) VALUES
(1, 1, 'L\'administrateur ali à débloquer le compte ahmed le 2023-03-02', '2023-03-02 23:43:23'),
(2, 1, 'L\'administrateur ali à débloquer le compte ahmed le 2023-03-03', '2023-03-03 00:27:48'),
(3, 2, 'Modification mot de passe 2', '2023-04-28 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `his_user`
--

CREATE TABLE `his_user` (
  `id_his` int NOT NULL,
  `id_user` int NOT NULL,
  `action_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `his_color` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `date_his` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `his_user`
--

INSERT INTO `his_user` (`id_his`, `id_user`, `action_user`, `his_color`, `date_his`) VALUES
(1, 2, 'Déconnexion', 'danger', '2023-05-08 16:27:01'),
(2, 2, 'Connexion avec succès', 'success', '2023-05-08 16:28:13'),
(3, 2, 'Produit n°Xo4rsLt a été ajouter avec succès', 'primary', '2023-05-08 18:00:00'),
(4, 2, 'Déconnexion', 'danger', '2023-05-08 19:26:08'),
(5, 2, 'Connexion avec succès', 'success', '2023-05-08 19:27:18'),
(6, 2, 'Déconnexion', 'danger', '2023-05-08 19:55:13'),
(7, 2, 'Connexion avec succès', 'success', '2023-05-08 19:57:28'),
(8, 2, 'Vous venez de modifier votre mot de passe.', 'warning', '2023-05-08 20:00:59'),
(9, 2, 'Déconnexion', 'danger', '2023-05-08 20:01:18'),
(10, 2, 'Connexion avec succès', 'success', '2023-05-08 20:02:01'),
(11, 2, 'Connexion avec succès', 'success', '2023-05-09 10:16:12'),
(12, 2, 'Connexion avec succès', 'success', '2023-05-09 11:58:51'),
(13, 2, 'Connexion avec succès', 'success', '2023-05-09 19:12:52'),
(14, 2, 'Vous venez d\'ajouter le logo de la boutique', 'primary', '2023-05-09 19:17:30'),
(15, 2, 'Connexion avec succès', 'success', '2023-05-09 22:44:54'),
(16, 2, 'Vous venez de valider la commande n°1IxOlF8RiG.', 'info', '2023-05-09 22:46:18'),
(17, 2, 'Vous venez de rejeter la commande n°1IxOlF8RiG.', 'danger', '2023-05-09 22:52:03'),
(18, 2, 'Connexion avec succès', 'success', '2023-05-10 10:51:28'),
(19, 2, 'Vous venez de modifier le produit n°Xo4rsLt.', 'warning', '2023-05-10 11:08:41'),
(20, 2, 'Vous venez de modifier le prix ou la quantité du produit n°3fjQkYs.', 'warning', '2023-05-10 11:28:31'),
(21, 2, 'Vous venez de supprimer le produit n°a5CxAsp.', 'danger', '2023-05-10 11:35:02'),
(22, 2, 'Vous venez de supprimer l\\\'utilisateur said.ali de votre boutique.', 'danger', '2023-05-10 13:08:22'),
(23, 2, 'Vous venez d\\\'ajouter un nouveau utilisateur qui est test.', 'primary', '2023-05-10 13:24:07'),
(24, 2, 'Connexion avec succès', 'success', '2023-05-11 10:18:25'),
(25, 2, 'Connexion avec succès', 'success', '2023-05-11 12:52:58'),
(26, 2, 'Connexion avec succès', 'success', '2023-05-12 10:33:03'),
(27, 2, 'Vous venez de créer votre profile le 2023-05-12 11:26:24.', 'primary', '2023-05-12 11:26:24'),
(28, 2, 'Connexion avec succès', 'success', '2023-05-18 10:07:05'),
(29, 2, 'Connexion avec succès', 'success', '2023-05-18 18:08:49'),
(30, 2, 'Connexion avec succès', 'success', '2023-05-21 21:32:56'),
(31, 2, 'Connexion avec succès', 'success', '2023-05-22 08:57:20'),
(32, 2, 'Connexion avec succès', 'success', '2023-05-25 18:10:42'),
(33, 2, 'Connexion avec succès', 'success', '2023-05-26 17:56:07'),
(34, 2, 'Connexion avec succès', 'success', '2023-05-29 19:24:10'),
(35, 2, 'Vous venez de modifier l\'image principale du produit n°.', 'warning', '2023-05-29 20:43:15'),
(36, 2, 'Vous venez de modifier l\'image principale du produit n°Xo4rsLt.', 'warning', '2023-05-29 20:51:57'),
(37, 2, 'Vous venez de modifier le logo de votre boutique', 'warning', '2023-05-29 22:31:50'),
(38, 2, 'Connexion avec succès', 'success', '2023-05-30 19:12:54'),
(39, 2, 'Connexion avec succès', 'success', '2023-06-18 18:44:28'),
(40, 2, 'Connexion avec succès', 'success', '2023-06-19 22:16:24'),
(41, 2, 'Connexion avec succès', 'success', '2023-06-21 00:20:39'),
(42, 2, 'Connexion avec succès', 'success', '2023-06-21 01:43:08'),
(43, 2, 'Connexion avec succès', 'success', '2023-06-21 23:43:05'),
(44, 2, 'Déconnexion', 'danger', '2023-06-22 00:08:49'),
(45, 2, 'Connexion avec succès', 'success', '2023-06-22 00:45:13'),
(46, 2, 'Connexion avec succès', 'success', '2023-06-22 13:18:35'),
(47, 2, 'Connexion avec succès', 'success', '2023-06-22 21:49:13'),
(48, 2, 'Vous venez de modifier le prix ou la quantité du produit n°3fjQkYs.', 'warning', '2023-06-22 23:37:11'),
(49, 2, 'Connexion avec succès', 'success', '2023-06-24 03:34:10'),
(50, 2, 'Connexion avec succès', 'success', '2023-06-25 13:17:49'),
(51, 2, 'Vous venez de modifier la photo de votre profile', 'warning', '2023-06-25 14:04:38'),
(52, 2, 'Connexion avec succès', 'success', '2023-06-25 19:13:27'),
(53, 2, 'Connexion avec succès', 'success', '2023-06-28 00:11:28'),
(54, 2, 'Connexion avec succès', 'success', '2023-06-28 03:17:05'),
(55, 2, 'Connexion avec succès', 'success', '2023-06-28 21:52:31'),
(56, 2, 'Connexion avec succès', 'success', '2023-06-30 04:38:45'),
(57, 1, 'Connexion avec succès', 'success', '2023-08-06 00:06:34'),
(58, 1, 'Déconnexion', 'danger', '2023-08-06 00:10:30');

-- --------------------------------------------------------

--
-- Structure de la table `photo_joint`
--

CREATE TABLE `photo_joint` (
  `id_photo` int NOT NULL,
  `token_post` varchar(100) NOT NULL,
  `photo_name` varchar(100) NOT NULL,
  `date_add` datetime NOT NULL,
  `user_delete` int DEFAULT NULL,
  `date_delete` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photo_joint`
--

INSERT INTO `photo_joint` (`id_photo`, `token_post`, `photo_name`, `date_add`, `user_delete`, `date_delete`) VALUES
(1, 'oR8pnQc', '52ca3fc5fa7ee5a9f6f85157834f8dbb.png', '2023-03-07 19:06:33', NULL, NULL),
(2, 'oR8pnQc', '4728b0e292996f6e20817e8e64389edc.png', '2023-03-07 19:06:33', NULL, NULL),
(3, 'oR8pnQc', 'b7ff7c6a5d26fa5ff2a4be9200a9a3aa.png', '2023-03-07 19:06:33', NULL, NULL),
(4, 'a5CxAsp', 'd02b78850017f05e5c2c056739fe3945.png', '2023-03-09 15:04:11', NULL, NULL),
(5, 'a5CxAsp', 'd81821a75bf2ea7a39964bdb12522374.png', '2023-03-09 15:04:11', NULL, NULL),
(6, 'a5CxAsp', '1083be1864a5a768945a260ea2f9ebee.png', '2023-03-09 15:04:11', NULL, NULL),
(7, 'fwHXuPB', '2b195ab0dc4d4942400d9bb1c529f589.png', '2023-03-09 17:39:27', NULL, NULL),
(8, 'fwHXuPB', '058729cd424525480603cdde63f1683b.png', '2023-03-09 17:39:27', NULL, NULL),
(9, 'fwHXuPB', '99dd4a5803a86d9cbf89d721035d7061.png', '2023-03-09 17:39:27', NULL, NULL),
(10, 'DQCIv5o', 'bb89e25d5fecd6ead790d844aa30bcad.png', '2023-03-09 18:25:46', NULL, NULL),
(11, 'DQCIv5o', 'ae9140b97c00e8e8f03f19383aec67cc.png', '2023-03-09 18:25:46', NULL, NULL),
(12, 'DQCIv5o', '2d38a33ff61bf31f279eb9b5506ca50d.png', '2023-03-09 18:25:46', NULL, NULL),
(13, '9oV0Jt6', 'c07b9624f89ed379e47e397d0314367c.png', '2023-03-12 16:59:23', NULL, NULL),
(14, '9oV0Jt6', '3c277352c00b7685b53e523de48a3e8d.png', '2023-03-12 16:59:23', NULL, NULL),
(15, '9oV0Jt6', '419858c6b181f72e71b83ad28b4ef0f2.png', '2023-03-12 16:59:23', NULL, NULL),
(16, '3fjQkYs', 'bd3c1fb82c23e34f150a4b9c21f870ab.png', '2023-03-23 20:19:18', NULL, NULL),
(17, '3fjQkYs', 'd44b2a4afb88323c50072334e08235fa.png', '2023-03-23 20:19:18', NULL, NULL),
(18, '3fjQkYs', '79b1e4822c523c58b633d3a0fffa71a8.png', '2023-03-23 20:19:18', NULL, NULL),
(19, 'LgtfMHz', '8958065496c56d3e8d590b6d2c2c2ede.png', '2023-04-10 18:42:59', NULL, NULL),
(20, 'LgtfMHz', 'b15fdac4c36d9df7825167842907d4fa.png', '2023-04-10 18:42:59', NULL, NULL),
(21, 'LgtfMHz', '457e4024f62890409cf28295d28811b6.png', '2023-04-10 18:42:59', NULL, NULL),
(22, 'Xo4rsLt', '330fad392321b605d095436f3bd2d20b.jpg', '2023-05-08 17:23:59', NULL, NULL),
(23, 'Xo4rsLt', '679a609a7e7cf1ffe0302b361c68cbd1.jpg', '2023-05-08 17:23:59', NULL, NULL),
(24, 'Xo4rsLt', 'bdbaaa4c898a86dc2a97a06cc1bf5e95.jpg', '2023-05-08 17:23:59', NULL, NULL),
(25, '3fjQkYs', 'f336f8283c67f403f8a3d2e385f91091.png', '2023-05-26 17:30:47', NULL, NULL),
(26, '3fjQkYs', '21078dfe7336fcb9c745756e684584cd.png', '2023-05-26 17:48:32', NULL, NULL),
(27, '3fjQkYs', 'c96ea06f4a89b64e204c8c87a8dc56e2.png', '2023-05-26 18:13:02', NULL, NULL),
(28, '3fjQkYs', '1a594c6b55dad30195a97997b1c6f059.png', '2023-05-26 18:13:02', NULL, NULL),
(29, '3fjQkYs', '99ff2fabe596c45099072a46fcbdef7f.png', '2023-05-26 18:21:07', NULL, NULL),
(30, '3fjQkYs', '82a2b1d0aa43f6b583f1f7bd5125e7a3.png', '2023-05-26 18:21:07', NULL, NULL),
(31, '3fjQkYs', 'ff2cae3012a75666ec12e1c358bb50ac.png', '2023-05-26 18:36:10', NULL, NULL),
(32, '3fjQkYs', '641e63f022c7f22fc2e39df9741415b4.png', '2023-05-26 18:36:10', NULL, NULL),
(33, '3fjQkYs', 'f0fb3149827c85afebd2989a841ba4e4.png', '2023-05-26 18:36:10', NULL, NULL),
(34, '3fjQkYs', 'b1df86b577e9447cb79668ec3a7cf115.png', '2023-05-26 18:49:07', NULL, NULL),
(35, 'Xo4rsLt', '7f79e3423670321fcb0caa49bd34f059.png', '2023-05-29 18:46:56', NULL, NULL),
(36, 'Xo4rsLt', '4cc0f0ef8b4e54f62c221b60ad3c6665.png', '2023-05-29 18:46:56', NULL, NULL),
(37, 'Xo4rsLt', '59ac4337452c2cdf31826687b35f406f.png', '2023-05-29 18:46:56', NULL, NULL),
(38, 'Xo4rsLt', 'd53fbad783c932d956a3538a56714038.png', '2023-05-29 18:50:17', NULL, NULL),
(39, 'Xo4rsLt', '50954e3870547cf976ff0d6038c531b9.png', '2023-05-29 18:52:12', NULL, NULL),
(40, 'Xo4rsLt', '66ec0e0e2307f872291ae697f59b747d.png', '2023-05-29 18:53:21', NULL, NULL),
(41, 'Xo4rsLt', '655d3fbfd3cda4f0ee361a97dee1c3e9.png', '2023-05-29 18:53:21', NULL, NULL),
(42, 'Xo4rsLt', '804feb5c3c8dd9fee60406bf39411431.png', '2023-05-29 18:53:21', NULL, NULL),
(43, 'Xo4rsLt', '2220130bb4b5defe09896b8b59e37aad.jpg', '2023-05-29 19:01:51', NULL, NULL),
(44, 'Xo4rsLt', 'a83c4346fb205bb57b6fc307c457f9ed.jpg', '2023-05-29 19:01:51', NULL, NULL),
(45, 'Xo4rsLt', '453fd2b2d27e402664c659127235c6e6.jpg', '2023-05-29 19:01:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_prod` int NOT NULL,
  `prod` varchar(255) NOT NULL,
  `prix` int NOT NULL,
  `description` text NOT NULL,
  `promo` varchar(10) NOT NULL,
  `prix_promo` int DEFAULT NULL,
  `quantite` int NOT NULL,
  `id_boutique` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `id_sscate` int NOT NULL,
  `genre` varchar(10) NOT NULL,
  `date_prod` date NOT NULL,
  `id_user_add` int NOT NULL,
  `id_admin_valid` int DEFAULT NULL,
  `date_valid` datetime DEFAULT NULL,
  `id_admin_delete` int DEFAULT NULL,
  `date_delete` date DEFAULT NULL,
  `id_user_delete` int DEFAULT NULL,
  `date_user_delete` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_prod`, `prod`, `prix`, `description`, `promo`, `prix_promo`, `quantite`, `id_boutique`, `image`, `token`, `id_sscate`, `genre`, `date_prod`, `id_user_add`, `id_admin_valid`, `date_valid`, `id_admin_delete`, `date_delete`, `id_user_delete`, `date_user_delete`) VALUES
(1, 'Costume 3 pièces complete', 2000, 'Costume composer de 3 pièces venu directement de France quantité limiter venez vite.', 'non', 500, 10, 3, '1a5838d7c5b467bdbeb60aaeb6102830.png', 'oR8pnQc', 3, '', '2023-03-07', 2, 1, '2023-03-19 00:00:00', NULL, NULL, NULL, NULL),
(2, 'Costume 3 pièces complete', 2000, 'Ceci est un test.', 'non', 1000, 94, 3, '767a65f01f272f56fd5b5987cc8702ca.png', 'a5CxAsp', 3, '', '2023-03-09', 2, 1, '2023-03-19 00:00:00', NULL, NULL, NULL, NULL),
(3, 'test', 123456, 'test', 'oui', 1000, 9, 3, 'e54cc8e9ade6a29d23bd45ab777c321c.png', 'fwHXuPB', 1, '', '2023-03-09', 2, 1, '2023-03-19 00:00:00', NULL, NULL, NULL, NULL),
(4, 'Tttttt', 12345, 'Description de test', 'non', 0, 12, 3, '82445585e55006712de9b8d30183371d.png', 'DQCIv5o', 1, '', '2023-03-09', 2, NULL, NULL, 1, '2023-03-12', 2, '2023-03-12 21:16:28'),
(6, 'Robes de mariage', 50000, 'Commander vos robes de mariage à partir de notre boutique.', 'non', 0, 7, 3, '089375ba46ed43bfce3999556e0051a6.png', '3fjQkYs', 7, '', '2023-03-23', 2, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Zara sliver', 10000, 'Venez commander les parfums zara pour les hommes avec un prix satisfaisant.', 'oui', 5000, 18, 1, 'e1fda62b2be94a13bf7c3de3d8db61d1.png', 'LgtfMHz', 8, '', '2023-04-10', 1, 1, '2023-04-10 00:00:00', NULL, NULL, NULL, NULL),
(8, 'Produit de test', 1000, 'Ceci est un test.', 'oui', 500, 10, 3, '33790dddb0404f76ada8c2fb0a9bf573.jpg', 'Xo4rsLt', 1, '', '2023-05-08', 2, 1, '2023-06-08 00:36:23', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `profil_user`
--

CREATE TABLE `profil_user` (
  `id` int NOT NULL,
  `nom_complet` varchar(200) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `telephone` int NOT NULL,
  `photo` varchar(200) NOT NULL,
  `id_user` int NOT NULL,
  `date_add` datetime NOT NULL,
  `date_update` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `profil_user`
--

INSERT INTO `profil_user` (`id`, `nom_complet`, `adresse`, `telephone`, `photo`, `id_user`, `date_add`, `date_update`) VALUES
(1, 'Ali Mohamed Ali', 'Quartier 4', 77000000, '8eb9195ef3d18c108652b2cc720c46db.png', 2, '2023-05-12 11:24:51', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id_role` int NOT NULL,
  `role` varchar(255) NOT NULL,
  `id_admin_add` int NOT NULL,
  `date_add` date NOT NULL,
  `id_admin_delete` int DEFAULT NULL,
  `date_delete` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

CREATE TABLE `slider` (
  `id_slide` int NOT NULL,
  `titre_slide` varchar(255) NOT NULL,
  `lien_image` varchar(255) NOT NULL,
  `text_image` longtext NOT NULL,
  `image_slide` varchar(255) NOT NULL,
  `token_slide` varchar(100) NOT NULL,
  `id_admin_add` int NOT NULL,
  `date_add` date NOT NULL,
  `id_admin_delete` int DEFAULT NULL,
  `date_delete` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `slider`
--

INSERT INTO `slider` (`id_slide`, `titre_slide`, `lien_image`, `text_image`, `image_slide`, `token_slide`, `id_admin_add`, `date_add`, `id_admin_delete`, `date_delete`) VALUES
(1, 'Titre de test', '#', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '6a9253fbc494e38e7ef80e8540e49c9b.png', 'AXUyVni', 1, '2023-04-02', NULL, NULL),
(2, 'Camon 19pro', '#', 'Camon 19pro est à la modèle venez acheter à notre boutique.', '1bf112e6de84231c11620c3ef6c9966b.png', 'CPTHN2f', 1, '2023-04-02', NULL, NULL),
(3, 'Robe de mariage', '#', 'Venez commander vos futures robe de mariage sans perde du temps.', '7b4d437e53861edcc260e54ff2f47587.png', 'xni9kDR', 1, '2023-04-02', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `sscategorie`
--

CREATE TABLE `sscategorie` (
  `id_ss_cate` int NOT NULL,
  `titre_ss_cate` varchar(255) NOT NULL,
  `id_cate` int NOT NULL,
  `id_admin_add` int NOT NULL,
  `date_add` date NOT NULL,
  `id_admin_delete` int DEFAULT NULL,
  `date_delete` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `sscategorie`
--

INSERT INTO `sscategorie` (`id_ss_cate`, `titre_ss_cate`, `id_cate`, `id_admin_add`, `date_add`, `id_admin_delete`, `date_delete`) VALUES
(1, 'Chemises', 1, 1, '2023-03-06', NULL, NULL),
(2, 'Pantalon & classique', 1, 1, '2023-03-06', NULL, NULL),
(3, 'Costumes', 1, 1, '2023-03-06', NULL, NULL),
(4, 'Vestes', 1, 1, '2023-03-06', NULL, NULL),
(5, 'T-shirt', 1, 1, '2023-03-06', NULL, NULL),
(6, 'Ceintures', 1, 1, '2023-03-06', NULL, NULL),
(7, 'robes', 2, 1, '2023-03-12', NULL, NULL),
(8, 'Parfum', 1, 1, '2023-04-10', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code_boutique` varchar(20) NOT NULL,
  `id_boutique` int NOT NULL,
  `date_inscrit` date NOT NULL,
  `id_admin_valid` int DEFAULT NULL,
  `date_valid` date DEFAULT NULL,
  `id_admin_delete` int DEFAULT NULL,
  `date_delete` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `username`, `password`, `email`, `code_boutique`, `id_boutique`, `date_inscrit`, `id_admin_valid`, `date_valid`, `id_admin_delete`, `date_delete`) VALUES
(1, 'ali.med', '$2y$10$HwFrSkA1OiRObZI81rGwGeyOKrlX9R/rIburNRyShXM//Syt4EHt2', 'alimohamedeali@gmail.com', 'ILADyRa', 1, '2023-03-01', 1, '2023-03-02', NULL, NULL),
(2, 'ahmed', '$2y$10$XPHaB1umZtNqk2UsFaBHyObPllIYUHbo1/gBvK0rdTuCgpWpaMjOO', 'ahmed@gmail.com', 'aRWEw6p', 3, '2023-03-02', 1, '2023-03-02', NULL, NULL),
(4, 'test', '$2y$10$pNpx0UYqUgTh6k9qxh4e4uqoJFrx8/9IDZK2XGja3JRsEJ4AgSwv.', 'test@email.fr', 'aRWEw6p', 3, '2023-05-10', NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `boutiques`
--
ALTER TABLE `boutiques`
  ADD PRIMARY KEY (`id_boutique`),
  ADD KEY `id_admin_valid` (`id_admin_valid`),
  ADD KEY `id_admin_delete` (`id_admin_delete`);

--
-- Index pour la table `categorieproduit`
--
ALTER TABLE `categorieproduit`
  ADD PRIMARY KEY (`id_cate`),
  ADD KEY `id_admin_delete` (`id_admin_delete`),
  ADD KEY `id_admin_add` (`id_admin_add`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_cmd`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_prod` (`id_prod`),
  ADD KEY `id_four` (`id_four`),
  ADD KEY `valid_client_cmd` (`valid_client_cmd`),
  ADD KEY `id_four_delete_cmd` (`id_four_delete_cmd`),
  ADD KEY `valid_four_cmd` (`valid_four_cmd`);

--
-- Index pour la table `historique_emarcher`
--
ALTER TABLE `historique_emarcher`
  ADD PRIMARY KEY (`id_his`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `his_user`
--
ALTER TABLE `his_user`
  ADD PRIMARY KEY (`id_his`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `photo_joint`
--
ALTER TABLE `photo_joint`
  ADD PRIMARY KEY (`id_photo`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `id_user_add` (`id_user_add`),
  ADD KEY `id_fournisseur` (`id_boutique`),
  ADD KEY `id_user_delete` (`id_user_delete`),
  ADD KEY `id_admin_delete` (`id_admin_delete`),
  ADD KEY `id_admin_valid` (`id_admin_valid`),
  ADD KEY `id_sscate` (`id_sscate`);

--
-- Index pour la table `profil_user`
--
ALTER TABLE `profil_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`),
  ADD KEY `id_admin_delete` (`id_admin_delete`),
  ADD KEY `id_admin_add` (`id_admin_add`);

--
-- Index pour la table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slide`);

--
-- Index pour la table `sscategorie`
--
ALTER TABLE `sscategorie`
  ADD PRIMARY KEY (`id_ss_cate`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_admin_delete` (`id_admin_delete`),
  ADD KEY `id_admin_valid` (`id_admin_valid`),
  ADD KEY `id_boutique` (`id_boutique`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `boutiques`
--
ALTER TABLE `boutiques`
  MODIFY `id_boutique` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `categorieproduit`
--
ALTER TABLE `categorieproduit`
  MODIFY `id_cate` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_cmd` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `historique_emarcher`
--
ALTER TABLE `historique_emarcher`
  MODIFY `id_his` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `his_user`
--
ALTER TABLE `his_user`
  MODIFY `id_his` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `photo_joint`
--
ALTER TABLE `photo_joint`
  MODIFY `id_photo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_prod` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `profil_user`
--
ALTER TABLE `profil_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slide` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `sscategorie`
--
ALTER TABLE `sscategorie`
  MODIFY `id_ss_cate` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `his_user`
--
ALTER TABLE `his_user`
  ADD CONSTRAINT `his_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_boutique`) REFERENCES `boutiques` (`id_boutique`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produit_ibfk_2` FOREIGN KEY (`id_user_delete`) REFERENCES `utilisateur` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produit_ibfk_3` FOREIGN KEY (`id_admin_valid`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produit_ibfk_4` FOREIGN KEY (`id_admin_delete`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produit_ibfk_5` FOREIGN KEY (`id_user_add`) REFERENCES `utilisateur` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produit_ibfk_6` FOREIGN KEY (`id_sscate`) REFERENCES `sscategorie` (`id_ss_cate`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `profil_user`
--
ALTER TABLE `profil_user`
  ADD CONSTRAINT `profil_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`id_boutique`) REFERENCES `boutiques` (`id_boutique`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`id_admin_valid`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateur_ibfk_3` FOREIGN KEY (`id_admin_delete`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
