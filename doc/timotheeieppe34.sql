-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Client :  timotheeieppe34.mysql.db
-- Généré le :  Ven 12 Mai 2017 à 01:58
-- Version du serveur :  5.6.34-log
-- Version de PHP :  7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `timotheeieppe34`
--

-- --------------------------------------------------------

--
-- Structure de la table `ability`
--

CREATE TABLE IF NOT EXISTS `ability` (
  `id` int(10) unsigned NOT NULL,
  `descriptiton` text COLLATE utf8_unicode_ci NOT NULL,
  `categorie` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_freelancer` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `created_at`, `updated_at`, `user_id`) VALUES
(3, '2017-02-16 12:11:03', '2017-02-16 12:11:03', 27);

-- --------------------------------------------------------

--
-- Structure de la table `cdc`
--

CREATE TABLE IF NOT EXISTS `cdc` (
  `deadline` date NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url_cdc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cdc`
--

INSERT INTO `cdc` (`deadline`, `company_id`, `created_at`, `updated_at`, `url_cdc`, `id`) VALUES
('2017-04-26', 4, '2017-04-10 08:46:02', '2017-04-10 08:46:02', 'cdc/zhhaqlXrS5.pdf', 9);

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(10) unsigned NOT NULL,
  `pic_url` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `siret` bigint(255) NOT NULL,
  `denomination` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `company`
--

INSERT INTO `company` (`id`, `pic_url`, `siret`, `denomination`, `created_at`, `updated_at`, `user_id`) VALUES
(4, 'uploads/ZNLNPdexCg.jpg', 12345678912345, 'SAS', '2017-02-16 12:10:17', '2017-02-16 12:10:17', 26);

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE IF NOT EXISTS `contrat` (
  `id` int(10) unsigned NOT NULL,
  `url_contrat` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `freelancer_id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `offre_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `contrat`
--

INSERT INTO `contrat` (`id`, `url_contrat`, `created_at`, `updated_at`, `freelancer_id`, `company_id`, `offre_id`, `project_id`) VALUES
(1, 'contrat/U6j2NlBZYS.pdf', '2017-04-12 08:12:43', '2017-04-12 08:12:43', 6, 4, 7, 8);

-- --------------------------------------------------------

--
-- Structure de la table `freelancer`
--

CREATE TABLE IF NOT EXISTS `freelancer` (
  `id` int(10) unsigned NOT NULL,
  `photo_url` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `cv_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `freelancer`
--

INSERT INTO `freelancer` (`id`, `photo_url`, `cv_url`, `created_at`, `updated_at`, `user_id`) VALUES
(6, 'uploads/XC06TzjIlw.png', 'cv/ek5dkAgpQF.docx', '2017-02-16 12:09:00', '2017-02-16 12:09:00', 25),
(7, 'uploads/sRXPeaL5l4.PNG', 'cv/HudQbKee8y.docx', '2017-04-06 07:07:19', '2017-04-06 07:07:19', 28);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) unsigned NOT NULL,
  `firstname` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `freelancer_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `comp_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `firstname`, `name`, `mail`, `type`, `content`, `created_at`, `updated_at`, `freelancer_id`, `project_id`, `comp_id`, `user_id`) VALUES
(1, 'Emma', 'Karena', 'emma@karena.fr', 'private', 'Bonjour,\r\nJe pourrais produire la solution demandée dans le temps impartis pour 900 euros.\r\nCordialement\r\nEmma Karena', '2017-04-02 09:25:37', '2017-04-02 13:36:42', 6, 8, 4, 25),
(3, 'Jean-Claude', 'Duss', 'jean-claude@duce.fr', 'private', 'je ne suis pas interessé par votre profile désolé\r\nBien cordialement', '2017-04-11 14:30:50', '2017-04-11 14:30:50', 6, 8, 4, 26),
(4, 'Jean-Claude', 'Duss', 'jean-claude@duce.fr', 'private', 'Finalement j’accepte votre offre et vous valide un contrat', '2017-04-12 06:23:50', '2017-04-12 06:23:50', 6, 8, 4, 26);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2016_12_16_145640_create_ability_table', 1),
(2, '2016_12_16_145640_create_admin_table', 1),
(3, '2016_12_16_145640_create_cdc_table', 1),
(4, '2016_12_16_145640_create_company_table', 1),
(5, '2016_12_16_145640_create_contrat_table', 1),
(6, '2016_12_16_145640_create_freelancer_table', 1),
(7, '2016_12_16_145640_create_message_table', 1),
(8, '2016_12_16_145640_create_offre_table', 1),
(9, '2016_12_16_145640_create_project_table', 1),
(10, '2016_12_16_145640_create_result_table', 1),
(11, '2016_12_16_145640_create_test_table', 1),
(12, '2016_12_16_145640_create_user_table', 1),
(13, '2016_12_16_145650_create_foreign_keys', 1);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE IF NOT EXISTS `offre` (
  `id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `freelancer_id` int(10) unsigned NOT NULL,
  `project_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `offre`
--

INSERT INTO `offre` (`id`, `created_at`, `updated_at`, `message`, `freelancer_id`, `project_id`) VALUES
(7, '2017-04-10 13:23:42', '2017-04-10 13:23:42', 'Bonjour,\r\nJe pourrais produire la solution demandée dans le temps impartis pour 900 euros.\r\nCordialement', 6, 8),
(8, '2017-04-12 07:47:34', '2017-04-12 07:47:34', 'Bonjour je peux faire une offre avantageuse.\r\nJe peux réaliser le projet en une semaine pour 1200 euros\r\n', 7, 8);

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `cdc_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `project`
--

INSERT INTO `project` (`id`, `title`, `price`, `description`, `created_at`, `updated_at`, `company_id`, `cdc_id`) VALUES
(8, 'Plateforme de Freelance', 1500.00, 'Création d''une plateforme de freelance.\r\nSur cette plateforme des entreprises pourront déposer des projets.\r\nCes projet seront consultable par n''importe qui mais uniquement des freelancers pourront y postuler.\r\nIl y aura un système d''authentification et un back-office pour un administrateur.\r\nPlus de détail dans le cahier des charges', '2017-04-10 08:46:02', '2017-04-10 08:46:02', 4, 9);

-- --------------------------------------------------------

--
-- Structure de la table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `id` int(10) unsigned NOT NULL,
  `grade` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `test_id` int(10) unsigned NOT NULL,
  `freelancer_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(10) unsigned NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ability_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `firstname`, `username`, `mail`, `password`, `address`, `phone`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(25, 'Karena', 'Emma', 'freelance', 'emma@karena.fr', '$2y$10$Uk7vm7iV4ccMobTXgvmNgeW31nPcNmg46Rz.tgsvg28wMqjrNM2ZK', '5 allée des chataignes 15480 L''Envale', 622708556, 'freelancer', 'FBfFwnM8vzZXo1vsqYzgB4tFTFo8eVfuSuyXyIsj4pJhA1lYelZaSaEKpie2', '2017-02-16 12:09:00', '2017-04-25 12:41:16'),
(26, 'Duss', 'Jean-Claude', 'company', 'jean-claude@duss.fr', '$2y$10$gI6dlK2cN0HpLpBPY4RcqOHBjW.rhlXEIj1ZzRgQzmN.C2Io.0Cd.', '4 allée du robinet 75200 Paris', 615264524, 'company', '52Q8KLPeutLM28ijVCXDPkUwNu78HYLTt7ouYj6m6TzPM2ysgtAgMW1gvgVC', '2017-02-16 12:10:17', '2017-04-22 13:20:17'),
(27, 'Montias', 'Timothée', 'admin', 'timontias@gmail.com', '$2y$10$KpN4miujmsREs0NSw0rC8eP59sqxk.4Dt8F4YRfnOWg8r83g3l1Aq', '5 rue du docteur Dalbera 06390 Contes', 622708555, 'admin', 'g1qxLvG6jqfBUKVtt2yY0Ww0G5EXkbDXAQ4ofMVA2vsBXr8fRVrr7Zmco74f', '2017-02-16 12:11:03', '2017-04-26 13:05:05'),
(28, 'Testundeux', 'Undeuxtest', 'untest', 'test@test.test', '$2y$10$a7QDtwdlRSgws2/WX0utUOqCAjqDiZPEaOBlESyNtAr1GVKld7CmS', '56 allée des platanes 12520 La manche', 622708555, 'freelancer', 'RUgbcCR5hKu5ymRbQiANJgfP9TNfoVddVwWyrHehHUiUymMIE69yRJEhwo80', '2017-04-06 07:07:19', '2017-04-12 08:22:41');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ability`
--
ALTER TABLE `ability`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ability_id_freelancer_foreign` (`id_freelancer`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_user_id_foreign` (`user_id`);

--
-- Index pour la table `cdc`
--
ALTER TABLE `cdc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cdc_company_id_foreign` (`company_id`);

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_user_id_foreign` (`user_id`);

--
-- Index pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `project_id` (`project_id`),
  ADD KEY `contrat_company_id_foreign` (`company_id`),
  ADD KEY `contrat_freelancer_id_foreign` (`freelancer_id`),
  ADD KEY `contrat_offre_id_foreign` (`offre_id`);

--
-- Index pour la table `freelancer`
--
ALTER TABLE `freelancer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `freelancer_user_id_foreign` (`user_id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `company_id` (`comp_id`),
  ADD KEY `freelancer_id` (`freelancer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offre_freelancer_id_foreign` (`freelancer_id`),
  ADD KEY `offre_project_id_foreign` (`project_id`);

--
-- Index pour la table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_cdc_id_foreign` (`cdc_id`),
  ADD KEY `project_compagny_id_foreign` (`company_id`);

--
-- Index pour la table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `result_test_id_foreign` (`test_id`),
  ADD KEY `result_freelancer_id_foreign` (`freelancer_id`);

--
-- Index pour la table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_ability_id_foreign` (`ability_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ability`
--
ALTER TABLE `ability`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `cdc`
--
ALTER TABLE `cdc`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `freelancer`
--
ALTER TABLE `freelancer`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ability`
--
ALTER TABLE `ability`
  ADD CONSTRAINT `ability_id_freelancer_foreign` FOREIGN KEY (`id_freelancer`) REFERENCES `freelancer` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `cdc`
--
ALTER TABLE `cdc`
  ADD CONSTRAINT `cdc_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `contrat_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contrat_freelancer_id_foreign` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancer` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `contrat_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contrat_offre_id_foreign` FOREIGN KEY (`offre_id`) REFERENCES `offre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `freelancer`
--
ALTER TABLE `freelancer`
  ADD CONSTRAINT `freelancer_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_company_id_foreign_key` FOREIGN KEY (`comp_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_freelancer_id_foreign_key` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_project_id_foreign_key` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `offre_freelancer_id_foreign` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offre_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_cdc_id_foreign` FOREIGN KEY (`cdc_id`) REFERENCES `cdc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `project_compagny_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_freelancer_id_foreign` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancer` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `result_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ability_id_foreign` FOREIGN KEY (`ability_id`) REFERENCES `ability` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
