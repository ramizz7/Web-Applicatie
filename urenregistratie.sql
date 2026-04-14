-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 14, 2026 at 07:25 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urenregistratie`
--

-- --------------------------------------------------------

--
-- Table structure for table `klanten`
--

DROP TABLE IF EXISTS `klanten`;
CREATE TABLE IF NOT EXISTS `klanten` (
  `id` int NOT NULL AUTO_INCREMENT,
  `naam` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefoon` varchar(20) DEFAULT NULL,
  `adres` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `klanten`
--

INSERT INTO `klanten` (`id`, `naam`, `email`, `telefoon`, `adres`) VALUES
(3, 'Mark', 'Mark@test.com', '068154467', 'zratsstraat24 7978ED Rotterdam');

-- --------------------------------------------------------

--
-- Table structure for table `planning`
--

DROP TABLE IF EXISTS `planning`;
CREATE TABLE IF NOT EXISTS `planning` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titel` varchar(100) NOT NULL,
  `beschrijving` text,
  `datum` date NOT NULL,
  `tijd` time DEFAULT NULL,
  `status` varchar(50) DEFAULT 'open',
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `planning`
--

INSERT INTO `planning` (`id`, `titel`, `beschrijving`, `datum`, `tijd`, `status`, `user_id`) VALUES
(1, 'User', '10 tot 6', '2026-03-09', '00:00:00', 'Afgerond', 1),
(3, 'Klanten', '10 tot 6', '2026-03-10', '00:00:00', 'Afgerond', 2),
(6, 'Uren', '', '2026-03-10', NULL, 'Afgerond', 10),
(7, 'Projecten', '', '2026-03-10', NULL, 'Afgerond', 11),
(8, 'Planning', '', '2026-03-09', NULL, 'Afgerond', 12);

-- --------------------------------------------------------

--
-- Table structure for table `projecten`
--

DROP TABLE IF EXISTS `projecten`;
CREATE TABLE IF NOT EXISTS `projecten` (
  `id` int NOT NULL AUTO_INCREMENT,
  `naam` varchar(255) NOT NULL,
  `beschrijving` text NOT NULL,
  `startdatum` date NOT NULL,
  `einddatum` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projecten`
--

INSERT INTO `projecten` (`id`, `naam`, `beschrijving`, `startdatum`, `einddatum`) VALUES
(1, 'Milan Reinders', 'klanten', '2026-03-10', '2026-04-10'),
(2, 'Umar Yuusuf', 'Users', '2026-03-09', '2026-04-10'),
(3, 'Jarno Meijer', 'Uren', '2026-03-10', '2026-04-10'),
(4, 'Ties Parren', 'Projecten', '2026-03-10', '2026-04-10'),
(5, 'Timurhan Avci', 'Planning', '2026-03-09', '2026-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `uren`
--

DROP TABLE IF EXISTS `uren`;
CREATE TABLE IF NOT EXISTS `uren` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `aantal_uren` decimal(5,2) DEFAULT NULL,
  `beschrijving` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `uren`
--

INSERT INTO `uren` (`id`, `user_id`, `datum`, `aantal_uren`, `beschrijving`) VALUES
(2, 1, '2026-03-09', 45.00, ''),
(4, 2, '2026-03-10', 46.00, ''),
(5, 10, '2026-03-10', 45.00, ''),
(6, 11, '2026-03-10', 46.00, ''),
(7, 12, '2026-03-09', 45.50, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Naam` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Rol` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Naam`, `Email`, `Rol`) VALUES
(1, 'Umar Yuusuf', 'Umar@test.com', 'Manager'),
(2, 'Milan Reinders', 'Milan@test.com', 'Medewerker'),
(10, 'Jarno Meijer', 'Jarno@test.com', 'Medewerker'),
(11, 'Ties Parren', 'Ties@test.com', 'Medewerker'),
(12, 'Timurhan Avici', 'Timurhan@test.com', 'Medewerker');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
