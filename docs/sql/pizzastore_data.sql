-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 26 oct. 2018 à 17:23
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pizzastore`
--

--
-- Déchargement des données de la table `address`
--

INSERT INTO `address` (`id`, `name`, `address`, `zip`, `city`, `phone`, `user_id`) VALUES
(1, 'Domicile', '26, rue de la Hulotais', '59430', 'SAINT-POL-SUR-MER', '03.64.96.48.15', 1),
(2, 'Maison', '80, avenue de l\'Amandier', '33000', 'BORDEAUX', '05.40.88.00.57', 2),
(3, 'Bureau', '55, rue Léon Dierx', '14100', 'LISIEUX', '02.10.91.36.62', 3),
(4, 'Bureau', '8, Rue St Ferréol', '69330', 'MEYZIEU', '04.45.02.60.80', 4),
(5, 'Maison', '31, Rue Joseph Vernet', '92220', 'BAGNEUX', '01.23.88.22.16', 5),
(6, 'Bureau', '55, rue Léon Dierx', '14100', 'LISIEUX', '02.10.91.36.62', 2);

--
-- Déchargement des données de la table `pizza`
--

INSERT INTO `pizza` (`id`, `name`, `price`, `image`, `category`, `description`) VALUES
(1, 'Reine', '8.00', 'assets/img/pizzas/reine.png', NULL, NULL),
(2, 'Texan', '10.00', 'assets/img/pizzas/texan.png', NULL, NULL),
(3, '4 fromages', '9.99', 'assets/img/pizzas/4-fromages.png', NULL, NULL),
(4, 'Végétarienne', '11.00', 'assets/img/pizzas/vegetarienne.png', NULL, NULL),
(5, 'Savoyarde', '13.00', 'assets/img/pizzas/savoyarde.png', NULL, NULL),
(6, 'Bolognaise', '10.00', 'assets/img/pizzas/bolognaise.png', NULL, NULL),
(7, 'Cannibale', '11.00', 'assets/img/pizzas/cannibale.png', NULL, NULL),
(26, 'Margarita', '17.98', 'assets/img/pizzas/margarita.png', 'Classique', 'C\'est la plus succulente des pizzas !');

--
-- Déchargement des données de la table `pizza_has_size`
--

INSERT INTO `pizza_has_size` (`pizza_id`, `size_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(3, 3),
(4, 3),
(4, 4);

--
-- Déchargement des données de la table `size`
--

INSERT INTO `size` (`id`, `name`, `price`) VALUES
(1, 'S', '0.00'),
(2, 'M', '0.99'),
(3, 'L', '1.99'),
(4, 'XL', '2.99');

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `firstname`) VALUES
(1, 'Veilleux', 'Marie'),
(2, 'Rivard', 'Babette'),
(3, 'Barjavel', 'Grégoire'),
(4, 'De La Ronde', 'Brice'),
(5, 'Crête', 'Fabrice'),
(6, 'Christophe', 'Deguillage');

-- --------------------------------------------------------

--
-- Structure de la vue `expansivepizza`
--
DROP TABLE IF EXISTS `expansivepizza`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `expansivepizza`  AS  select `p`.`name` AS `pizza`,`s`.`name` AS `size`,`p`.`price` AS `price_pizza`,`s`.`price` AS `price_size`,(`p`.`price` + `s`.`price`) AS `price_final`,`p`.`image` AS `image` from ((`pizza_has_size` `phs` join `pizza` `p` on((`phs`.`pizza_id` = `p`.`id`))) join `size` `s` on((`phs`.`size_id` = `s`.`id`))) order by 5 desc ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
