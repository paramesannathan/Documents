-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 22. Dez 2015 um 21:18
-- Server-Version: 5.6.25
-- PHP-Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `online_shop`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `auftrag`
--

CREATE TABLE IF NOT EXISTS `auftrag` (
  `id` int(11) NOT NULL,
  `auftrag_id` int(11) NOT NULL,
  `produkt_id` int(11) NOT NULL,
  `menge` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `auftrag`
--

INSERT INTO `auftrag` (`id`, `auftrag_id`, `produkt_id`, `menge`) VALUES
(2, 1, 1, 10),
(3, 8, 2, 1),
(4, 8, 2, 10),
(6, 10, 2, 10),
(8, 9, 1, 43),
(9, 9, 2, 41),
(10, 11, 1, 8),
(11, 12, 2, 11),
(16, 13, 2, 35),
(17, 13, 2, 13),
(18, 14, 2, 9),
(19, 15, 2, 10),
(20, 16, 1, 12),
(21, 16, 1, 16),
(22, 17, 2, 14),
(23, 18, 2, 17),
(24, 18, 2, 38),
(25, 18, 2, 15),
(28, 20, 1, 60),
(29, 20, 1, 46),
(31, 19, 1, 20),
(32, 21, 2, 11),
(33, 22, 2, 15),
(34, 22, 2, 18),
(35, 23, 1, 17),
(36, 23, 2, 13),
(37, 23, 2, 17),
(38, 24, 2, 19),
(39, 24, 2, 18),
(44, 26, 1, 1),
(48, 26, 1, 1),
(49, 25, 1, 1),
(52, 25, 2, 1),
(53, 25, 1, 1),
(54, 25, 1, 1),
(55, 25, 1, 1),
(56, 25, 1, 3),
(57, 25, 1, 1),
(58, 25, 1, 1),
(60, 27, 1, 1),
(61, 25, 1, 1),
(62, 25, 2, 1),
(63, 27, 1, 1),
(64, 27, 1, 1),
(65, 27, 1, 1),
(66, 28, 1, 2),
(67, 28, 2, 1),
(68, 25, 1, 1),
(69, 27, 1, 1),
(70, 28, 2, 1),
(71, 28, 1, 1),
(72, 28, 1, 18),
(73, 29, 1, 1),
(77, 30, 1, 1),
(78, 31, 1, 5),
(79, 31, 2, 6),
(80, 32, 1, 1),
(81, 32, 1, 6),
(82, 32, 1, 1),
(83, 32, 2, 11),
(84, 32, 2, 1),
(85, 33, 1, 6),
(86, 33, 2, 1),
(87, 34, 1, 1),
(88, 34, 1, 1),
(89, 34, 2, 5),
(90, 35, 1, 1),
(91, 36, 1, 1),
(93, 38, 1, 1),
(94, 38, 3, 1),
(95, 38, 3, 7),
(96, 38, 3, 1),
(97, 38, 1, 1),
(98, 38, 2, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bestellungen`
--

CREATE TABLE IF NOT EXISTS `bestellungen` (
  `id` int(11) NOT NULL,
  `kunden_id` int(11) NOT NULL,
  `registered` int(11) NOT NULL,
  `lieferung_add_id` int(11) NOT NULL,
  `zahlung_type` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL,
  `session` varchar(100) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `bestellungen`
--

INSERT INTO `bestellungen` (`id`, `kunden_id`, `registered`, `lieferung_add_id`, `zahlung_type`, `date`, `status`, `session`, `total`) VALUES
(1, 0, 0, 0, 1, '2012-11-20 13:11:45', 10, '4pdpqm5grgdp8841301hr33db6', 29.9),
(2, 0, 0, 0, 0, '2013-05-06 18:59:47', 0, 'qcum4f3mivpb609j0j5hikano0', 0),
(3, 0, 0, 0, 0, '2013-05-06 19:00:16', 0, 'qcum4f3mivpb609j0j5hikano0', 0),
(4, 0, 0, 0, 0, '2013-05-06 19:00:30', 0, 'qcum4f3mivpb609j0j5hikano0', 0),
(5, 0, 0, 0, 0, '2013-05-06 19:00:53', 0, '3j317nd6e93cet9p4mma22beq3', 0),
(6, 0, 0, 0, 0, '2013-05-06 19:01:11', 0, '3j317nd6e93cet9p4mma22beq3', 0),
(7, 0, 0, 0, 0, '2013-05-06 19:02:13', 0, '3j317nd6e93cet9p4mma22beq3', 0),
(8, 0, 0, 0, 0, '2013-05-06 19:03:24', 0, '3j317nd6e93cet9p4mma22beq3', 9.9),
(9, 2, 1, 0, 1, '2013-05-06 19:04:39', 10, '', 165.47),
(10, 0, 0, 0, 0, '2013-05-06 19:05:25', 0, 'qcum4f3mivpb609j0j5hikano0', 9),
(11, 0, 0, 0, 0, '2013-05-06 19:23:24', 0, '3j317nd6e93cet9p4mma22beq3', 23.92),
(12, 0, 0, 0, 0, '2013-05-06 19:24:26', 0, '3j317nd6e93cet9p4mma22beq3', 9.9),
(13, 2, 1, 0, 1, '2013-05-06 19:24:47', 10, '', 43.2),
(14, 2, 1, 0, 1, '2013-05-06 20:23:03', 10, '', 8.1),
(15, 0, 0, 0, 0, '2013-05-06 20:39:53', 0, '3j317nd6e93cet9p4mma22beq3', 9),
(16, 0, 0, 0, 0, '2013-05-06 20:42:55', 0, '3j317nd6e93cet9p4mma22beq3', 83.72),
(17, 0, 0, 0, 0, '2013-05-06 20:44:02', 0, '3j317nd6e93cet9p4mma22beq3', 12.6),
(18, 2, 1, 0, 2, '2013-05-06 20:55:03', 10, '', 63),
(19, 2, 1, 0, 2, '2013-05-06 21:03:17', 10, '', 59.8),
(20, 0, 0, 0, 0, '2013-05-06 21:04:27', 0, '3j317nd6e93cet9p4mma22beq3', 316.94),
(21, 0, 0, 0, 0, '2013-05-06 21:12:05', 0, '3j317nd6e93cet9p4mma22beq3', 9.9),
(22, 2, 1, 0, 2, '2013-05-06 21:23:09', 10, '', 29.7),
(23, 0, 0, 0, 0, '2013-05-06 21:26:36', 0, '3j317nd6e93cet9p4mma22beq3', 77.83),
(24, 0, 0, 0, 0, '2013-05-06 21:30:59', 0, '3j317nd6e93cet9p4mma22beq3', 33.3),
(25, 0, 0, 1, 1, '2015-12-22 18:15:22', 2, 'u2uias8abko6bdhokq4k78v9n5', 2505.5),
(26, 0, 0, 0, 0, '2015-12-22 18:20:04', 0, 'ps905g36spf8c98bmf24fivtr4', 401),
(27, 0, 0, 2, 2, '2015-12-22 19:09:34', 2, 'rrntv2cgfk4dtve50p5hgqkar1', 1002.5),
(28, 0, 0, 3, 1, '2015-12-22 19:11:50', 2, 'tpqjpq8mipva5lj1j2g8lb6ov5', 4510.5),
(29, 0, 0, 5, 2, '2015-12-22 19:19:51', 1, 'gecaau9cie13fm1qkvr999tsu4', 751.5),
(30, 1, 1, 0, 2, '2015-12-22 19:40:44', 2, '', 200.5),
(31, 1, 1, 0, 1, '2015-12-22 19:43:14', 2, '', 1902.5),
(32, 0, 0, 5, 1, '2015-12-22 19:58:53', 2, 'gecaau9cie13fm1qkvr999tsu4', 751.5),
(33, 1, 1, 0, 1, '2015-12-22 20:19:33', 2, '', 1353),
(34, 0, 0, 0, 0, '2015-12-22 20:33:40', 0, 'gecaau9cie13fm1qkvr999tsu4', 200.5),
(35, 1, 1, 0, 2, '2015-12-22 20:40:51', 2, '', 200.5),
(36, 0, 0, 0, 0, '2015-12-22 20:43:03', 0, 'gecaau9cie13fm1qkvr999tsu4', 200.5),
(37, 1, 1, 0, 0, '2015-12-22 20:43:24', 1, '', 1200),
(38, 0, 0, 0, 0, '2015-12-22 21:10:38', 0, 'gecaau9cie13fm1qkvr999tsu4', 200.5);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kategorien`
--

CREATE TABLE IF NOT EXISTS `kategorien` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kategorien`
--

INSERT INTO `kategorien` (`id`, `name`) VALUES
(1, 'Felgen'),
(2, 'Auspuff');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kundschaft`
--

CREATE TABLE IF NOT EXISTS `kundschaft` (
  `id` int(11) NOT NULL,
  `vorname` varchar(50) NOT NULL,
  `nachname` varchar(50) NOT NULL,
  `strasse` varchar(50) NOT NULL,
  `hausnummer` varchar(10) NOT NULL,
  `plz` varchar(10) NOT NULL,
  `ort` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `registered` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `kundschaft`
--

INSERT INTO `kundschaft` (`id`, `vorname`, `nachname`, `strasse`, `hausnummer`, `plz`, `ort`, `tel`, `email`, `registered`) VALUES
(1, 'Swisson', 'Sathasivam', 'Sägemattstrasse', '21', '3097', 'Liebefeld', '079 270 77 28', 'Swisson@hotmail.com', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lieferungsadresse`
--

CREATE TABLE IF NOT EXISTS `lieferungsadresse` (
  `id` int(11) NOT NULL,
  `vorname` varchar(50) NOT NULL,
  `nachname` varchar(50) NOT NULL,
  `strasse` varchar(50) NOT NULL,
  `hausnummer` varchar(10) NOT NULL,
  `plz` varchar(10) NOT NULL,
  `ort` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `lieferungsadresse`
--

INSERT INTO `lieferungsadresse` (`id`, `vorname`, `nachname`, `strasse`, `hausnummer`, `plz`, `ort`, `tel`, `email`) VALUES
(1, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test'),
(2, 'muster', 'muster', 'muster', 'muster', 'muster', 'muster', 'muster', 'muster'),
(3, 'hoi', 'hoi', 'hoi', 'hoi', 'hoi', 'hoi', 'hoi', 'hoi'),
(4, 'hoi', 'hoi', 'hoi', 'hoi', 'hoi', 'hoi', 'hoi', 'hoi'),
(5, 'lol', 'lol', 'lol', 'lol', 'lol', 'lol', 'lol', 'lol');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
  `id` int(11) NOT NULL,
  `kunden_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `logins`
--

INSERT INTO `logins` (`id`, `kunden_id`, `username`, `password`) VALUES
(1, 1, 'test', 'test'),
(2, 2, 'muster', 'muster'),
(3, 0, 'h', 's'),
(4, 0, 's', 's'),
(5, 0, 'e', 'e'),
(6, 0, 'f', 'f');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `produkte`
--

CREATE TABLE IF NOT EXISTS `produkte` (
  `id` int(11) NOT NULL,
  `cat_id` tinyint(4) NOT NULL,
  `name` varchar(150) NOT NULL,
  `beschreibung` text NOT NULL,
  `image` varchar(30) NOT NULL,
  `preis` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `produkte`
--

INSERT INTO `produkte` (`id`, `cat_id`, `name`, `beschreibung`, `image`, `preis`) VALUES
(1, 1, 'JapanracingJR10', 'Japan Racing Wheels - JR-10 Matt Black (19x8.5 Zoll)', 'JapanracingJR10.jpg', 200.5),
(2, 1, 'JapanracingJR11', 'Japan Racing Wheels - JR-11 Matt Black (19x8.5 Zoll)', 'JapanracingJR11.jpg', 150),
(3, 2, 'invidia g200', 'Die Invidia G200 Sport-Auspuffanlage wurde speziell entwickelt, um den Rueckstau und die thermische Belastung Ihres Auto zu reduzieren.', 'invidiag200.jpg', 1200);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `auftrag`
--
ALTER TABLE `auftrag`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `kategorien`
--
ALTER TABLE `kategorien`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `kundschaft`
--
ALTER TABLE `kundschaft`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `lieferungsadresse`
--
ALTER TABLE `lieferungsadresse`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `produkte`
--
ALTER TABLE `produkte`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `auftrag`
--
ALTER TABLE `auftrag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT für Tabelle `bestellungen`
--
ALTER TABLE `bestellungen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT für Tabelle `kategorien`
--
ALTER TABLE `kategorien`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `kundschaft`
--
ALTER TABLE `kundschaft`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `lieferungsadresse`
--
ALTER TABLE `lieferungsadresse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT für Tabelle `produkte`
--
ALTER TABLE `produkte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
