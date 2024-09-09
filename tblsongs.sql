-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 09. Sep 2024 um 10:57
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cloudsound`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tblsongs`
--

CREATE TABLE `tblsongs` (
  `id` int(11) NOT NULL,
  `songLength` int(11) NOT NULL,
  `songName` varchar(50) NOT NULL,
  `songDescription` varchar(50) NOT NULL,
  `songGenre` varchar(50) NOT NULL,
  `songArtist` varchar(50) NOT NULL,
  `songReleaseDate` varchar(50) NOT NULL,
  `songFeatures` varchar(50) NOT NULL,
  `songProducer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tblsongs`
--
ALTER TABLE `tblsongs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tblsongs`
--
ALTER TABLE `tblsongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
