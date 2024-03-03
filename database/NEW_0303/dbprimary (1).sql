-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Már 03. 17:42
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `dbprimary`
--
CREATE DATABASE IF NOT EXISTS `dbprimary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbprimary`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ads`
--

DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads` (
  `AdAz` int(15) UNSIGNED NOT NULL COMMENT 'Hírdetés azonosító',
  `StoreName` varchar(50) DEFAULT NULL COMMENT 'Felhasználó teljes neve',
  `StoreEmail` varchar(80) DEFAULT NULL COMMENT 'Felhasználó email címe',
  `StoreMobile` bigint(11) UNSIGNED DEFAULT NULL COMMENT 'Felhasználó telefonszáma',
  `ServiceType` varchar(30) DEFAULT NULL COMMENT 'Szolgáltatás neve',
  `StoreAddress` varchar(50) DEFAULT NULL COMMENT 'Szolgáltatás helye',
  `UserAz` smallint(15) UNSIGNED NOT NULL COMMENT 'Felhasználó azonosító',
  `StoreDescription` varchar(1000) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `StoreImageURL` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `ads`
--

INSERT INTO `ads` (`AdAz`, `StoreName`, `StoreEmail`, `StoreMobile`, `ServiceType`, `StoreAddress`, `UserAz`, `StoreDescription`, `StoreImageURL`) VALUES
(13, 'FodrászBT2006', 'kuruczjanoshivatalos@gmail.com', 36705554477, 'Szempillás', '1114 Budapest Minta Tér 2', 1, 'Budapest legmodernebb barber shopja várja szépülni vágyó vendégeit a belváros szivében.  ', '../img/ads/65e364db18382_borbely.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `ServiceAz` int(15) UNSIGNED NOT NULL COMMENT 'Szolgáltatás azonoítója',
  `ServiceName` varchar(30) DEFAULT NULL COMMENT 'Szolgáltatás neve'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `services`
--

INSERT INTO `services` (`ServiceAz`, `ServiceName`) VALUES
(10, 'Barber'),
(2, 'Fodrász'),
(18, 'Jóga'),
(16, 'Körmös'),
(4, 'Kozmetikus'),
(14, 'Manikűr'),
(11, 'Manikűr/Pedikűr'),
(6, 'Masszőr'),
(5, 'Műkörmös'),
(15, 'Pedikűr'),
(7, 'Smink tetováló'),
(8, 'Szempillás'),
(9, 'Szépségterapeuta');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `UserAz` smallint(15) UNSIGNED NOT NULL COMMENT 'Felhasználó azonosítója',
  `UserName` varchar(20) DEFAULT NULL COMMENT 'Belépési felhasználónév',
  `UserPassword` varchar(25) DEFAULT NULL COMMENT 'Belépési jelszó',
  `UserEmail` varchar(80) DEFAULT NULL COMMENT 'Felhasználó email címe',
  `UserMobile` bigint(11) UNSIGNED DEFAULT NULL COMMENT 'Felhasználó telefonszáma',
  `UserFullName` varchar(50) DEFAULT NULL COMMENT 'Felhasználó teljes neve',
  `Type` int(1) DEFAULT NULL COMMENT 'Felhasználó 0, Admin 1',
  `UserPhoto` varchar(200) NOT NULL COMMENT 'Felhasználó profilképe',
  `ResetCode` varchar(15) NOT NULL COMMENT 'Jelszó változtatás kódja'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`UserAz`, `UserName`, `UserPassword`, `UserEmail`, `UserMobile`, `UserFullName`, `Type`, `UserPhoto`, `ResetCode`) VALUES
(1, 'Kurucz', '186332', 'kuruczjanos@gmail.com', 6303273051, 'Kurucz János', 1, '', ''),
(2, 'Meggyesi', '123456789', 'meggyesireka@gmail.com', 6222222222, 'Meggyesi Réka', 1, '', ''),
(5, 'Kuruczka', '', 'kuruczjanoshivatalos@gmail.com', 36303273051, 'Kurucz János', 0, 'NULL', 'iDOcJGyWwOK6PoO'),
(10, 'hajas13', 'hajas13', 'hajas13@gmail.com', 123456789, 'Hajas Barnabás', 0, 'hajasbarnabas.jpg', 'resetcode1'),
(11, 'fodrasz11', 'fodrasz11', 'fodrasz11@example.com', 987654321, 'Fodrász Hajnalka', 0, 'fodraszhajnalka.jpg', 'resetcode2'),
(12, 'peldabela', 'peldabela', 'peldabela@example.com', 555666777, 'Példa Béla', 0, 'peldabela.jpg', 'resetcode3');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`AdAz`),
  ADD KEY `UserFullName` (`StoreName`),
  ADD KEY `UserEmail` (`StoreEmail`),
  ADD KEY `UserMobile` (`StoreMobile`),
  ADD KEY `ServiceName` (`ServiceType`),
  ADD KEY `UserAz` (`UserAz`);

--
-- A tábla indexei `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`ServiceAz`),
  ADD KEY `ServiceName` (`ServiceName`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserAz`),
  ADD KEY `UserEmail` (`UserEmail`,`UserMobile`,`UserFullName`),
  ADD KEY `UserMobile` (`UserMobile`,`UserFullName`),
  ADD KEY `UserFullName` (`UserFullName`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `ads`
--
ALTER TABLE `ads`
  MODIFY `AdAz` int(15) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Hírdetés azonosító', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `services`
--
ALTER TABLE `services`
  MODIFY `ServiceAz` int(15) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Szolgáltatás azonoítója', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `UserAz` smallint(15) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Felhasználó azonosítója', AUTO_INCREMENT=13;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_ibfk_1` FOREIGN KEY (`ServiceType`) REFERENCES `services` (`ServiceName`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ads_ibfk_5` FOREIGN KEY (`UserAz`) REFERENCES `users` (`UserAz`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
