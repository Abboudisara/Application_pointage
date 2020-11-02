-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 30 oct. 2020 à 15:09
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `caissier`
--

CREATE TABLE `caissier` (
  `c_id` int(11) NOT NULL,
  `c_fulname` varchar(40) NOT NULL,
  `c_pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `caissier`
--

INSERT INTO `caissier` (`c_id`, `c_fulname`, `c_pass`) VALUES
(1, 'admin', 123);

-- --------------------------------------------------------

--
-- Structure de la table `entrer`
--

CREATE TABLE `entrer` (
  `e_id` int(11) NOT NULL,
  `fn_id` int(11) NOT NULL,
  `e_date` date NOT NULL,
  `e_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entrer`
--

INSERT INTO `entrer` (`e_id`, `fn_id`, `e_date`, `e_time`) VALUES
(1, 1, '2020-10-01', '07:30:49'),
(2, 2, '2020-10-01', '12:30:49'),
(3, 1, '2020-10-02', '07:04:24'),
(4, 2, '2020-10-02', '12:04:24'),
(5, 1, '2020-10-30', '15:04:09');

-- --------------------------------------------------------

--
-- Structure de la table `fonctionnaire`
--

CREATE TABLE `fonctionnaire` (
  `fn_id` int(11) NOT NULL,
  `fn_name` varchar(40) NOT NULL,
  `fn_lastName` varchar(40) NOT NULL,
  `fn_mat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fonctionnaire`
--

INSERT INTO `fonctionnaire` (`fn_id`, `fn_name`, `fn_lastName`, `fn_mat`) VALUES
(1, 'Mohammed', 'Najjar', 'A132567'),
(2, 'Ahmed', 'Bencharqi', 'A345698');

-- --------------------------------------------------------

--
-- Structure de la table `pause`
--

CREATE TABLE `pause` (
  `p_id` int(11) NOT NULL,
  `fn_id` int(11) NOT NULL,
  `p_pause` time NOT NULL,
  `p_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pause`
--

INSERT INTO `pause` (`p_id`, `fn_id`, `p_pause`, `p_date`) VALUES
(1, 1, '00:30:40', '2020-10-01'),
(2, 2, '00:40:40', '2020-10-01'),
(3, 1, '00:20:11', '2020-10-02'),
(4, 2, '00:54:11', '2020-10-02'),
(5, 1, '00:00:00', '2020-10-30');

-- --------------------------------------------------------

--
-- Structure de la table `sortie`
--

CREATE TABLE `sortie` (
  `s_id` int(11) NOT NULL,
  `fn_id` int(11) NOT NULL,
  `s_date` date NOT NULL,
  `s_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `sortie`
--

INSERT INTO `sortie` (`s_id`, `fn_id`, `s_date`, `s_time`) VALUES
(1, 1, '2020-10-01', '15:32:58'),
(2, 2, '2020-10-01', '00:32:58'),
(3, 1, '2020-10-02', '15:05:40'),
(4, 2, '2020-10-02', '23:05:40'),
(5, 1, '2020-10-30', '15:05:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `caissier`
--
ALTER TABLE `caissier`
  ADD PRIMARY KEY (`c_id`);

--
-- Index pour la table `entrer`
--
ALTER TABLE `entrer`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `fn_id` (`fn_id`);

--
-- Index pour la table `fonctionnaire`
--
ALTER TABLE `fonctionnaire`
  ADD PRIMARY KEY (`fn_id`);

--
-- Index pour la table `pause`
--
ALTER TABLE `pause`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `fn_id` (`fn_id`);

--
-- Index pour la table `sortie`
--
ALTER TABLE `sortie`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `fn_id` (`fn_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `caissier`
--
ALTER TABLE `caissier`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `entrer`
--
ALTER TABLE `entrer`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `fonctionnaire`
--
ALTER TABLE `fonctionnaire`
  MODIFY `fn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `pause`
--
ALTER TABLE `pause`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `sortie`
--
ALTER TABLE `sortie`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `entrer`
--
ALTER TABLE `entrer`
  ADD CONSTRAINT `entrer_ibfk_1` FOREIGN KEY (`fn_id`) REFERENCES `fonctionnaire` (`fn_id`);

--
-- Contraintes pour la table `pause`
--
ALTER TABLE `pause`
  ADD CONSTRAINT `pause_ibfk_1` FOREIGN KEY (`fn_id`) REFERENCES `fonctionnaire` (`fn_id`);

--
-- Contraintes pour la table `sortie`
--
ALTER TABLE `sortie`
  ADD CONSTRAINT `sortie_ibfk_1` FOREIGN KEY (`fn_id`) REFERENCES `fonctionnaire` (`fn_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
