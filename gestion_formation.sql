-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 26 sep. 2022 à 16:59
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_formation`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `pseudo`, `mdp`) VALUES
(1, 'admin', 'admin1234\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `cycles`
--

CREATE TABLE `cycles` (
  `id_cycle` int(11) NOT NULL,
  `n_action` int(11) NOT NULL,
  `n_salle` int(11) NOT NULL,
  `theme_f` varchar(255) NOT NULL,
  `mode_f` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `gouvernorat` varchar(255) NOT NULL,
  `periode_de` date NOT NULL,
  `periode_a` date NOT NULL,
  `horaires` time NOT NULL,
  `formateur_id` int(11) NOT NULL,
  `entreprise` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cycles`
--

INSERT INTO `cycles` (`id_cycle`, `n_action`, `n_salle`, `theme_f`, `mode_f`, `lieu`, `gouvernorat`, `periode_de`, `periode_a`, `horaires`, `formateur_id`, `entreprise`) VALUES
(24, 31, 32, 'reactJs', 'Distinctio Ad exerc', 'Nostrud aute tempori', 'Suscipit blanditiis ', '1979-01-24', '1972-04-27', '03:07:00', 12, 'CNI'),
(25, 17, 74, 'Laboriosam qui in m', 'Ad odit inventore qu', 'Dolor facilis except', 'Eiusmod corrupti no', '1994-08-16', '1974-02-26', '18:28:00', 12, 'CNI'),
(26, 4410, 10, 'html', 'présentiel', 'beb l asaal', 'tunis', '2022-09-11', '2022-09-15', '10:00:00', 12, 'CNI'),
(27, 8874, 6, 'laravel', 'en ligne', 'beb l asaal', 'tunis', '2022-09-13', '2022-09-15', '10:00:00', 14, 'CNI');

-- --------------------------------------------------------

--
-- Structure de la table `formateurs`
--

CREATE TABLE `formateurs` (
  `id_formateur` int(11) NOT NULL,
  `nom_prenom_f` varchar(255) NOT NULL,
  `cin_f` varchar(8) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `direction` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formateurs`
--

INSERT INTO `formateurs` (`id_formateur`, `nom_prenom_f`, `cin_f`, `specialite`, `direction`) VALUES
(12, 'Dhia Eddinne Sbei', '07246368', 'réseau', 'Formateur'),
(14, 'younes sbei', '07252936', 'reactJs', 'Formateur');

-- --------------------------------------------------------

--
-- Structure de la table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `nom_prenom` varchar(255) NOT NULL,
  `cin` varchar(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `direction` varchar(255) NOT NULL,
  `cycle_id` int(11) NOT NULL,
  `entreprise` varchar(255) NOT NULL,
  `confirmer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `participants`
--

INSERT INTO `participants` (`id`, `nom_prenom`, `cin`, `email`, `direction`, `cycle_id`, `entreprise`, `confirmer`) VALUES
(34, 'Aperiam consectetur', '95899632', 'kykejilu@mailinator.com', 'Proident pariatursss', 24, 'Enim voluptate sed ussssssss', 1),
(36, 'Cupidatat quia beata', '72010203', 'lyxysohab@mailinator.com', 'Ipsum reprehenderit ', 26, 'Do eiusmod ut perspi', 0),
(37, 'Quisquam veritatis t', '01090603', 'wydogapa@mailinator.com', 'Sint quod iure solut', 27, 'Blanditiis doloremqu', 1),
(38, 'Assumenda perferendi', '65', 'dhiainfo1@gmail.com', 'Vero est quis dolore', 27, 'Rerum perferendis fu', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `cycles`
--
ALTER TABLE `cycles`
  ADD PRIMARY KEY (`id_cycle`),
  ADD KEY `formateur_id` (`formateur_id`);

--
-- Index pour la table `formateurs`
--
ALTER TABLE `formateurs`
  ADD PRIMARY KEY (`id_formateur`);

--
-- Index pour la table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cycle` (`cycle_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `cycles`
--
ALTER TABLE `cycles`
  MODIFY `id_cycle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `formateurs`
--
ALTER TABLE `formateurs`
  MODIFY `id_formateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cycles`
--
ALTER TABLE `cycles`
  ADD CONSTRAINT `cycles_ibfk_1` FOREIGN KEY (`formateur_id`) REFERENCES `formateurs` (`id_formateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`cycle_id`) REFERENCES `cycles` (`id_cycle`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
