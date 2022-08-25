-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 25 août 2022 à 15:26
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `stagecoiffure`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `firstname` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_de_naissance` date NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promotions` tinyint(1) NOT NULL,
  `alerte_sms` tinyint(1) NOT NULL,
  `is_pro` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `firstname`, `roles`, `password`, `lastname`, `email`, `date_de_naissance`, `genre`, `adresse`, `code_postal`, `ville`, `promotions`, `alerte_sms`, `is_pro`) VALUES
(1, 'Alex', '[\"ROLE_USER\",\"ROLE_ADMIN\",\"ROLE_PRO\"]', 'lolmdr', 'blablacar', 'alex@alex.alex', '2022-07-06', 'Homme', '2 tadukumonvieu', 6000, 'diablo', 0, 0, 1),
(2, 'davy', '[\"ROLE_USER\",\"ROLE_PRO\"]', '$2y$13$Zl0WESVVVVF.Xjyc6rjmT.ELL/GdcFSVn8aoGMF5EZp1awXqwc8/2', 'dd', 'davydd@mail.fr', '2022-06-29', 'Femme', 'fdgvfgfdg', 87000, 'htghf', 0, 0, 1),
(3, 'jfivodfj', '[]', '$2y$13$7.e2oYehJ0BuQFUcINdLweb6ym.QfkyuMWeIaizj4qOm6kc6zckne', 'vjkfdosvj', 'vfjkdovd@fhdjks.fr', '1976-06-27', 'femme', 'gfhgfdhfd', 2020, 'trhytrhtr', 0, 0, 0),
(4, 'greg', '[\"ROLE_USER\",\"ROLE_ADMIN\"]', '$2y$13$zRfX/IFYdTKU0OQl5pOgeOJOT3rt0Le1fwfgEm5VR9iGQS4VeWpum', 'greg', 'greg@greg.greg', '2022-07-06', 'Femme', 'greg', 87000, 'greg', 0, 0, 0),
(5, 'david', '[]', '$2y$13$FX1gUzVEsCmAfFzXb/mhuOFJ.XFdBWXk5dF5LDZFySYmQPw7TdBlG', 'david', 'david@david.david', '2015-09-28', 'HOMME', 'david', 87, 'david', 0, 0, 0),
(6, 'bl', '[]', '$2y$13$EjvjfWYxEqsPgKfSRzfTwOxax6bqm/VP7AJnIvl6Qbk2X91q3gzYa', 'vl', 'vlv@fgkf.fr', '2022-07-16', 'Homme', 'gfgffdg', 6060, 'gfdgd', 0, 0, 0),
(7, 'mokoko', '[\"ROLE_USER\",\"ROLE_ADMIN\"]', '$2y$13$k0rmxa.fqj6luu6LvLnOEe7dRPlSIySm6d4EBlpUl84xPsOA2mB4.', 'baker', 'baker@gmail.com', '1990-06-28', 'Homme', 'fdfdsfmnb', 87000, 'Limoges', 0, 0, 0),
(8, 'dd', '[\"ROLE_USER\",\"ROLE_ADMIN\"]', '123456', 'dd', 'dd@ff.fr', '2022-06-30', 'Homme', 'dsds', 6, 'ds', 1, 1, 0),
(9, 'cfdsdsv', '[]', '$2y$13$Iaib1Uk2jrRzvE7fwdaOFeOLkajXzC/Tu2wvCG61ed4s/0SkWZ6l.', 'vdsdsv', 'vdsds@gmail.com', '2022-07-06', 'Homme', 'fdgdfhg', 6, 'gfgf', 0, 0, 0),
(10, 'bgfnbgf', '[]', '$2y$13$2FXCguThmu50Wq9CBdrJs.YOdlW4CzTEnIyG4.A5JfBn4xgOzpcV6', 'ngfdnd', 'azerty@azerty.fr', '2022-07-13', 'Homme', 'azerty', 6, 'azerty', 0, 0, 0),
(11, 'kkk', '[]', '$2y$13$H.cFdJ7S0iU/b6/567F51OuqxLaDBKIezwi6Pik41aZhlNf0mDr7e', 'kkk', 'kkk.ggg@gmail.com', '2022-08-11', 'Homme', 'bgbgfbgf', 87000, 'limoges', 1, 1, 0),
(12, 'julien', '[\"ROLE_USER\",\"ROLE_PRO\"]', '$2y$13$18x4CP8dZsvivubnO48AAOwtb3pGAS6WC4WcGycFGguHjMzXaAy7G', 'petroskey', 'juju.juju@juju.juju', '1954-08-03', 'Homme', 'ghhfdhgfd', 87000, 'Limoges', 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220719121200', '2022-07-19 14:12:07', 224),
('DoctrineMigrations\\Version20220719123528', '2022-07-19 14:35:34', 115),
('DoctrineMigrations\\Version20220726144541', '2022-07-26 16:45:50', 226),
('DoctrineMigrations\\Version20220728061035', '2022-07-28 08:10:44', 624),
('DoctrineMigrations\\Version20220728063228', '2022-07-28 08:32:33', 42),
('DoctrineMigrations\\Version20220817082023', '2022-08-22 09:31:57', 277),
('DoctrineMigrations\\Version20220822073149', '2022-08-22 09:31:57', 31),
('DoctrineMigrations\\Version20220822113711', '2022-08-22 13:38:29', 195),
('DoctrineMigrations\\Version20220822124639', '2022-08-22 14:46:45', 93),
('DoctrineMigrations\\Version20220822125131', '2022-08-22 14:51:35', 91),
('DoctrineMigrations\\Version20220822145559', '2022-08-22 16:56:05', 156),
('DoctrineMigrations\\Version20220823073101', '2022-08-23 09:31:08', 630),
('DoctrineMigrations\\Version20220824113737', '2022-08-24 13:37:46', 293);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `prestation`
--

CREATE TABLE `prestation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `duree` time NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `prestation`
--

INSERT INTO `prestation` (`id`, `name`, `prix`, `duree`, `genre`) VALUES
(2, 'un petit peu de cheveux', 1000, '01:00:00', 'unisex');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_client_id` int(11) NOT NULL,
  `heure_de_rendez_vous` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_id` int(11) NOT NULL,
  `prestation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `id_client_id`, `heure_de_rendez_vous`, `status`, `pro_id`, `prestation_id`) VALUES
(1, 11, '2022-08-23 08:00:00', 'En cours', 2, 2),
(2, 11, '2022-08-24 14:00:00', 'En cours', 2, 2),
(3, 11, '2022-08-25 10:00:00', 'En cours', 12, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_C7440455E7927C74` (`email`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `prestation`
--
ALTER TABLE `prestation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_42C8495599DED506` (`id_client_id`),
  ADD KEY `IDX_42C84955C3B7E4BA` (`pro_id`),
  ADD KEY `IDX_42C849559E45C554` (`prestation_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prestation`
--
ALTER TABLE `prestation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_42C8495599DED506` FOREIGN KEY (`id_client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_42C849559E45C554` FOREIGN KEY (`prestation_id`) REFERENCES `prestation` (`id`),
  ADD CONSTRAINT `FK_42C84955C3B7E4BA` FOREIGN KEY (`pro_id`) REFERENCES `client` (`id`);
COMMIT;
