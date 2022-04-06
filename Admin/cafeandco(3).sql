-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 juil. 2021 à 13:42
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cafeandco`
--

-- --------------------------------------------------------

--
-- Structure de la table `acceder`
--

CREATE TABLE `acceder` (
  `fk_id_role` int(11) DEFAULT NULL,
  `fk_id_learn` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `acceder`
--

INSERT INTO `acceder` (`fk_id_role`, `fk_id_learn`) VALUES
(3, 3),
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom_client` varchar(50) NOT NULL,
  `cp_client` varchar(50) NOT NULL,
  `adr_client` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom_client`, `cp_client`, `adr_client`) VALUES
(1, 'CaféStreet', '39500', '2 avenue Pasteur'),
(2, 'Café de la gare', '75009', '17 rue Victor Hugo'),
(3, 'Café de la Plage', '01500', '35 rue des Fleurs'),
(4, 'Brasserie Salsifi', '75018', '96 Avenue Gabliel Peri'),
(5, 'Brasserie de Clichy', '92110', '54 rue de la Saucisse'),
(6, 'Café du Pipou', '75016', '82 rue du champs'),
(7, 'Coco Bongo Club', '89500', '45 Avenue du mask'),
(8, 'Hotel de la Gare', '65300', '2 rue Jean Jaurès'),
(9, 'Le Ragondin Doré', '35200', '35 rue Charles de Gaule'),
(10, 'Le Nagoya', '93400', '65 Avenue de la Paix');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_comm` int(11) NOT NULL,
  `num_comm` int(11) NOT NULL,
  `dte_comm` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_comm`, `num_comm`, `dte_comm`) VALUES
(1, 1, '2021-06-29'),
(6, 2, '2021-07-01'),
(7, 3, '2021-07-01');

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE `contenir` (
  `fk_id_produit` int(11) DEFAULT NULL,
  `fk_id_comm` int(11) DEFAULT NULL,
  `quantite` int(11) DEFAULT NULL,
  `prix_vente` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`fk_id_produit`, `fk_id_comm`, `quantite`, `prix_vente`) VALUES
(1, 1, 20, '400'),
(2, 1, 10, '190'),
(3, 6, 35, '800'),
(4, 7, 20, '1500');

-- --------------------------------------------------------

--
-- Structure de la table `elearning`
--

CREATE TABLE `elearning` (
  `id_learn` int(11) NOT NULL,
  `nom_doc_learn` varchar(50) NOT NULL,
  `duree_learn` time DEFAULT NULL,
  `note_learn` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `elearning`
--

INSERT INTO `elearning` (`id_learn`, `nom_doc_learn`, `duree_learn`, `note_learn`) VALUES
(1, 'Identifier les Arômes ', '00:20:00', 8),
(2, 'Vendre le Café', '01:00:00', 7),
(3, 'Manager son équipe', '02:30:00', 9);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_four` int(11) NOT NULL,
  `nom_four` varchar(50) NOT NULL,
  `adr_four` varchar(50) NOT NULL,
  `cp_four` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_four`, `nom_four`, `adr_four`, `cp_four`) VALUES
(1, 'Aguardante Tiquara', 'Esplanada dos Ministérios', 68900),
(2, 'Cafe Quidio', 'Cl. 127c #15-02, Bogotá', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `ref_produit` varchar(50) NOT NULL,
  `nom_produit` varchar(50) NOT NULL,
  `orig_produit` varchar(50) NOT NULL,
  `prix_kg` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `ref_produit`, `nom_produit`, `orig_produit`, `prix_kg`) VALUES
(1, '0001', 'Moka', 'Ethiopie', 17.7),
(2, '0002', 'Typica', 'Costa Rica', 16.99),
(3, '0003', 'Bourbon', 'Honduras', 21.6),
(4, '0004', 'Java', 'Indonésie', 71.84),
(5, '0005', 'Mondo Novo', 'Brésil', 24.8),
(6, '0006', 'Caturra', 'Panama', 33.2),
(7, '0007', 'Catuai', 'Brésil', 20.8),
(8, '0008', 'Maragogype', 'Brésil', 32),
(9, '0009', 'Pacas', 'Salvador', 20),
(10, '0010', 'Geisha', 'Panama', 2080);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `libelle`) VALUES
(1, 'Salarié'),
(3, 'Dirigeant');

-- --------------------------------------------------------

--
-- Structure de la table `salarie`
--

CREATE TABLE `salarie` (
  `id_salarie` int(11) NOT NULL,
  `nom_salarie` varchar(50) NOT NULL,
  `prenom_salarie` varchar(50) NOT NULL,
  `mail_salarie` varchar(50) NOT NULL,
  `mdp_salarie` varchar(50) NOT NULL,
  `fk_id_role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `salarie`
--

INSERT INTO `salarie` (`id_salarie`, `nom_salarie`, `prenom_salarie`, `mail_salarie`, `mdp_salarie`, `fk_id_role`) VALUES
(1, 'Picod', 'Camille', 'camillepicd@gmail.com', 'camille', 1),
(2, 'Bletrix', 'Kyllian', 'kbletrix@gmail.com', 'kyllian', 1),
(3, 'Ardouin', 'Arnold', 'ardouin.arnold@gmail.com', 'arnold', 3),
(4, 'Henry', 'Tom', 'thenry@gmail.com', 'Yrneht39', 1);

-- --------------------------------------------------------

--
-- Structure de la table `stocker`
--

CREATE TABLE `stocker` (
  `fk_id_produit` int(11) DEFAULT NULL,
  `fk_id_four` int(11) DEFAULT NULL,
  `stock_kg` int(11) DEFAULT NULL,
  `prix_achat` decimal(10,0) DEFAULT NULL,
  `dte_entree` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stocker`
--

INSERT INTO `stocker` (`fk_id_produit`, `fk_id_four`, `stock_kg`, `prix_achat`, `dte_entree`) VALUES
(1, 1, 100, '1770', '2021-05-02'),
(2, 1, 100, '1699', '2021-03-17'),
(3, 2, 100, '2160', '2021-03-16'),
(4, 2, 100, '7184', '2021-02-24'),
(5, 1, 100, '2480', '2021-01-19'),
(6, 1, 100, '3320', '2020-12-18'),
(7, 2, 100, '2080', '2021-05-12'),
(8, 2, 100, '3200', '2021-04-19'),
(9, 2, 100, '2000', '2021-04-11'),
(10, 2, 25, '52000', '2021-03-22');

-- --------------------------------------------------------

--
-- Structure de la table `vendre`
--

CREATE TABLE `vendre` (
  `fk_id_salarie` int(11) DEFAULT NULL,
  `fk_id_client` int(11) DEFAULT NULL,
  `fk_id_comm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vendre`
--

INSERT INTO `vendre` (`fk_id_salarie`, `fk_id_client`, `fk_id_comm`) VALUES
(1, 1, 1),
(4, 8, 6),
(2, 9, 7);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acceder`
--
ALTER TABLE `acceder`
  ADD KEY `fk_id_role` (`fk_id_role`),
  ADD KEY `fk_id_learn` (`fk_id_learn`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_comm`);

--
-- Index pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD KEY `fk_id_produit` (`fk_id_produit`),
  ADD KEY `fk_id_comm` (`fk_id_comm`);

--
-- Index pour la table `elearning`
--
ALTER TABLE `elearning`
  ADD PRIMARY KEY (`id_learn`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_four`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `salarie`
--
ALTER TABLE `salarie`
  ADD PRIMARY KEY (`id_salarie`),
  ADD KEY `fk_id_role` (`fk_id_role`);

--
-- Index pour la table `stocker`
--
ALTER TABLE `stocker`
  ADD KEY `fk_id_produit` (`fk_id_produit`),
  ADD KEY `fk_id_four` (`fk_id_four`);

--
-- Index pour la table `vendre`
--
ALTER TABLE `vendre`
  ADD KEY `fk_id_salarie` (`fk_id_salarie`),
  ADD KEY `fk_id_client` (`fk_id_client`),
  ADD KEY `fk_id_comm` (`fk_id_comm`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_comm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `elearning`
--
ALTER TABLE `elearning`
  MODIFY `id_learn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_four` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `salarie`
--
ALTER TABLE `salarie`
  MODIFY `id_salarie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `acceder`
--
ALTER TABLE `acceder`
  ADD CONSTRAINT `acceder_ibfk_1` FOREIGN KEY (`fk_id_role`) REFERENCES `role` (`id_role`),
  ADD CONSTRAINT `acceder_ibfk_2` FOREIGN KEY (`fk_id_learn`) REFERENCES `elearning` (`id_learn`);

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `contenir_ibfk_1` FOREIGN KEY (`fk_id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `contenir_ibfk_2` FOREIGN KEY (`fk_id_comm`) REFERENCES `commande` (`id_comm`);

--
-- Contraintes pour la table `salarie`
--
ALTER TABLE `salarie`
  ADD CONSTRAINT `salarie_ibfk_1` FOREIGN KEY (`fk_id_role`) REFERENCES `role` (`id_role`);

--
-- Contraintes pour la table `stocker`
--
ALTER TABLE `stocker`
  ADD CONSTRAINT `stocker_ibfk_1` FOREIGN KEY (`fk_id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `stocker_ibfk_2` FOREIGN KEY (`fk_id_four`) REFERENCES `fournisseur` (`id_four`);

--
-- Contraintes pour la table `vendre`
--
ALTER TABLE `vendre`
  ADD CONSTRAINT `vendre_ibfk_1` FOREIGN KEY (`fk_id_salarie`) REFERENCES `salarie` (`id_salarie`),
  ADD CONSTRAINT `vendre_ibfk_2` FOREIGN KEY (`fk_id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `vendre_ibfk_3` FOREIGN KEY (`fk_id_comm`) REFERENCES `commande` (`id_comm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
