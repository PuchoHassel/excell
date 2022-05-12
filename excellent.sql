-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 mei 2022 om 14:59
-- Serverversie: 10.4.21-MariaDB
-- PHP-versie: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `excellent`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestellingen`
--

CREATE TABLE `bestellingen` (
  `ID` int(11) NOT NULL,
  `Reservering_ID` int(11) NOT NULL,
  `Menuitem_ID` int(11) NOT NULL,
  `Aantal` int(11) NOT NULL,
  `Geserveerd` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `dranken`
--

CREATE TABLE `dranken` (
  `ID` int(11) NOT NULL,
  `Code` varchar(3) NOT NULL,
  `Omschrijving` varchar(255) NOT NULL,
  `Prijs` float NOT NULL,
  `Valt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `dranken`
--

INSERT INTO `dranken` (`ID`, `Code`, `Omschrijving`, `Prijs`, `Valt`) VALUES
(1, 'bi1', 'Pilsner', 2.95, 'bik->Bieren->Dranken'),
(2, 'bi2', 'Weizen', 3.95, 'bik->Bieren->Dranken'),
(3, 'bi3', 'Stender', 2.95, 'bik->Bieren->Dranken'),
(4, 'bi4', 'Paim', 3.6, 'bik->Bieren->Dranken'),
(5, 'bi5', 'Kasteel donker', 4.85, 'bik->Bieren->Dranken');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gerechtcategorien`
--

CREATE TABLE `gerechtcategorien` (
  `ID` int(11) NOT NULL,
  `Code` varchar(3) NOT NULL,
  `Naam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `gerechtcategorien`
--

INSERT INTO `gerechtcategorien` (`ID`, `Code`, `Naam`) VALUES
(1, 'DRK', 'Dranken'),
(2, 'HAP', 'Hapjes'),
(3, 'HOG', 'Hoofdgerechten'),
(4, 'NAG', 'Nagerechten'),
(5, 'VOG', 'Voorgerechten');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gerechtsoorten`
--

CREATE TABLE `gerechtsoorten` (
  `ID` int(11) NOT NULL,
  `Code` varchar(3) NOT NULL,
  `Naam` varchar(20) NOT NULL,
  `gerechtcategorie_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `gerechtsoorten`
--

INSERT INTO `gerechtsoorten` (`ID`, `Code`, `Naam`, `gerechtcategorie_ID`) VALUES
(1, 'KO1', 'Portie kaas met most', 2),
(2, 'KO2', 'Brood met kruidenbot', 2),
(3, 'WA1', 'Bitterballtjes met m', 2),
(4, 'BI1', 'Pilsner', 1),
(5, 'BI2', 'Weizen', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `ID` int(11) NOT NULL,
  `naam` varchar(20) NOT NULL,
  `telefoon` varchar(11) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`ID`, `naam`, `telefoon`, `email`) VALUES
(1, 'Anton Geesink', '062764588', 'a.geesink@gmail.com'),
(17, 'test', '000000000', 'ww@ww.nl');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `menuitems`
--

CREATE TABLE `menuitems` (
  `ID` int(11) NOT NULL,
  `Code` varchar(3) NOT NULL,
  `Naam` varchar(255) NOT NULL,
  `Prijs` double NOT NULL,
  `gerechtsoort_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `menuitems`
--

INSERT INTO `menuitems` (`ID`, `Code`, `Naam`, `Prijs`, `gerechtsoort_ID`) VALUES
(1, 'ko1', 'Portie kaas met most', 4, 0),
(2, 'ko2', 'Brood met kruidenbot', 5, 0),
(3, 'ko3', 'Portie salami worst', 4, 0),
(4, 'wa1', 'Bitterballetjes met ', 4.25, 0),
(5, 've1', 'Bonengerecht met diverse groen', 11.95, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ober`
--

CREATE TABLE `ober` (
  `ID` int(11) NOT NULL,
  `Tafel` int(11) NOT NULL,
  `Aantal` int(11) NOT NULL,
  `Gerecht` varchar(255) NOT NULL,
  `Geserveerd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `ober`
--

INSERT INTO `ober` (`ID`, `Tafel`, `Aantal`, `Gerecht`, `Geserveerd`) VALUES
(1, 6, 3, 'Portie kaas met mosterd', '✔'),
(2, 6, 1, 'Bonengerecht met diverse groen', '✔'),
(3, 6, 5, 'Beefstuk in champignonsaus', '✔'),
(4, 7, 3, 'Wienerschnitzel', '✔');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reserveringen`
--

CREATE TABLE `reserveringen` (
  `ID` int(11) NOT NULL,
  `Tafel` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Tijd` time NOT NULL,
  `Klantnaam` varchar(30) NOT NULL,
  `Aantal` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `Datum_toegevoegd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Aantal_k` int(11) NOT NULL,
  `Allergieen` text NOT NULL,
  `Opmerkingen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `reserveringen`
--

INSERT INTO `reserveringen` (`ID`, `Tafel`, `Datum`, `Tijd`, `Klantnaam`, `Aantal`, `Status`, `Datum_toegevoegd`, `Aantal_k`, `Allergieen`, `Opmerkingen`) VALUES
(1, 4, '2020-07-11', '13:30:00', 'Mata Han', 4, 0, '2022-05-11 13:33:13', 0, '', ''),
(2, 6, '2020-07-11', '15:00:00', 'Piet Hein', 6, 0, '2022-05-11 13:33:13', 0, '', ''),
(3, 6, '2020-07-11', '15:00:00', 'Jeroen Krabbe', 5, 0, '2022-05-11 13:33:13', 0, '', ''),
(4, 8, '2020-07-11', '17:00:00', 'Piet Hein', 15, 0, '2022-05-11 13:33:13', 0, '', ''),
(5, 2, '2020-07-11', '17:30:00', 'Piet Hein', 3, 0, '2022-05-11 13:33:13', 0, '', ''),
(12, 8, '2020-11-29', '17:00:00', 'Jeroen Krabbe', 4, 0, '2022-05-12 10:13:51', 0, '', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `subgerechten`
--

CREATE TABLE `subgerechten` (
  `ID` int(11) NOT NULL,
  `Code` varchar(3) NOT NULL,
  `Omschrijving` varchar(255) NOT NULL,
  `Valt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `subgerechten`
--

INSERT INTO `subgerechten` (`ID`, `Code`, `Omschrijving`, `Valt`) VALUES
(1, ' fl', 'Frisdranken', 'Dranken'),
(3, 'mon', 'Mousse', 'Nagerecht');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `reserveringen.ID` (`Reservering_ID`),
  ADD KEY `Menuitems.ID` (`Menuitem_ID`),
  ADD KEY `Reservering_ID` (`Reservering_ID`);

--
-- Indexen voor tabel `dranken`
--
ALTER TABLE `dranken`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `gerechtcategorien`
--
ALTER TABLE `gerechtcategorien`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `gerechtsoorten`
--
ALTER TABLE `gerechtsoorten`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `gerechtcategorien_ID` (`gerechtcategorie_ID`),
  ADD KEY `gerechtcategorie_ID` (`gerechtcategorie_ID`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexen voor tabel `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `gerechtsoorten.ID` (`gerechtsoort_ID`),
  ADD KEY `gerechtsoort_ID` (`gerechtsoort_ID`);

--
-- Indexen voor tabel `ober`
--
ALTER TABLE `ober`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `klanten.ID` (`Klantnaam`);

--
-- Indexen voor tabel `subgerechten`
--
ALTER TABLE `subgerechten`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bestellingen`
--
ALTER TABLE `bestellingen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `dranken`
--
ALTER TABLE `dranken`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `gerechtcategorien`
--
ALTER TABLE `gerechtcategorien`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `gerechtsoorten`
--
ALTER TABLE `gerechtsoorten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `klanten`
--
ALTER TABLE `klanten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT voor een tabel `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `ober`
--
ALTER TABLE `ober`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `subgerechten`
--
ALTER TABLE `subgerechten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
