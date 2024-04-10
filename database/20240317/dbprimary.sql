-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Már 17. 19:05
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
  `StoreImageURL` varchar(100) DEFAULT NULL,
  `LastModifyDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `ads`
--

INSERT INTO `ads` (`AdAz`, `StoreName`, `StoreEmail`, `StoreMobile`, `ServiceType`, `StoreAddress`, `UserAz`, `StoreDescription`, `StoreImageURL`, `LastModifyDate`) VALUES
(14, 'Avengers', 'avengers@gmail.com', 36558874412214, 'Kozmetikus', '2455888 Brooklyn', 19, 'Avengers Assemble', '../img/ads/65ed511add5f5_amerika.jpg', NULL),
(19, 'Barber Budapest', 'kuruczjanoshivatalos@gmail.com', 36205428797, 'Kozmetikus', '1181, Bp Parazs utca 26', 19, 'Budapest legmodernebb barber shopja várja szépülni vágyó vendégeit a belváros szivében.  ', '../img/ads/65ef230fb16d2_borbely.jpg', NULL),
(20, 'Pókember hűlója', 'pokember@gmail.com', 3698855412255, 'Szempillás', '1181 Budapest Háló utca 15', 19, 'Pókember legerősebb haloja', '../img/ads/65f460f429a05_pokember.jpg', NULL),
(21, 'DateADD', 'hasbullahDATEADD@gmail.com', 369805554444, 'Kozmetikus', '1181, Bp Parazs utca 26', 19, 'LASTMODIFYDATE ADD OK', '../img/ads/65f53ee6b47d2_pokember.jpg', '0000-00-00 00:00:00'),
(22, 'DateADDOK', 'kuruczjanoshivatalos@gmail.com', 5569821147, 'Szempillás', '1114 Budapest Minta Tér 2', 19, 'LASTMODIFYDATE ADD OK', '../img/ads/65f54003d094b_borbely.jpg', '2024-03-16 07:45:23');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `ServiceAz` int(15) UNSIGNED NOT NULL COMMENT 'Szolgáltatás azonoítója',
  `ServiceName` varchar(30) DEFAULT NULL COMMENT 'Szolgáltatás neve',
  `ServiceImgURL` varchar(1000) NOT NULL COMMENT 'Szolgáltatás Content Kép'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `services`
--

INSERT INTO `services` (`ServiceAz`, `ServiceName`, `ServiceImgURL`) VALUES
(2, 'Fodrász', '../img/content/fodrasz.jpg'),
(4, 'Kozmetikus', '../img/content/kozmetikus.jpg'),
(5, 'Műkörmös', '../img/content/korom.jpg'),
(6, 'Masszőr', '../img/content/masszor.png'),
(7, 'Smink tetováló', '../img/content/smink.jpg'),
(8, 'Szempillás', '../img/content/szempilla.jpg'),
(9, 'Szépségterapeuta', '../img/content/szalon.jpg'),
(10, 'Barber', '../img/content/barber.jpg'),
(11, 'Manikűr/Pedikűr', '../img/content/manikur.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `subscribes`
--

DROP TABLE IF EXISTS `subscribes`;
CREATE TABLE `subscribes` (
  `subAz` int(255) NOT NULL,
  `subEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Feliratkozások emailre';

--
-- A tábla adatainak kiíratása `subscribes`
--

INSERT INTO `subscribes` (`subAz`, `subEmail`) VALUES
(1, 'kuruczjanoshivatalos@gmail.com'),
(3, 'gggg@gggg.com'),
(4, 'hasbullah@gmail.com'),
(5, 'janika@gmail.com');

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
  `UserPhoto` varchar(255) DEFAULT NULL,
  `ResetCode` varchar(15) NOT NULL COMMENT 'Jelszó változtatás kódja'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`UserAz`, `UserName`, `UserPassword`, `UserEmail`, `UserMobile`, `UserFullName`, `Type`, `UserPhoto`, `ResetCode`) VALUES
(1, 'Kurucz', '186332', 'kuruczjanos@gmail.com', 6303273051, 'Kurucz János', 1, '../img/users/65ed3b7847f51_amerika.jpg', ''),
(2, 'Meggyesi', '123456789', 'meggyesireka@gmail.com', 6222222222, 'Meggyesi Réka', 1, '', ''),
(16, 'amerika', 'amerika', 'amerika2@gmail.com', 6905554444, 'Amerika Kapitány', 0, '../img/users/65ed3b7847f51_amerika.jpg', '4x55XvTNcSqhXHZ'),
(17, 'vasember2018', 'vasember', 'vasember@gmail.com', 985544785222, 'Tony Stark', 0, '../img/users/65ed3c32bda21_vasember.jpg', '5B4x3aUJB3sR9Kj'),
(18, 'blackwidow', 'natasha', 'blackwidow@gmail.com', 5558745521122, 'Natasha Rommanov', 0, '../img/users/65ed3c600e29d_blackwidow.jpg', 'KGRRNaeMaDLhVJm'),
(19, 'hasbullah', 'hasbullah3', 'hasbullah@gmail.com', 369055555555, 'Hasbullah ', 0, '../img/users/65f4613a3c214_karajoslaszlo.png', 'SnlsW6MmdOILvLf'),
(20, 'aranyhaj', 'aranyhaj', 'aranyhaj@gmail.com', 6985554, 'Aranyhaj', 0, '../img/users/65ed68e528c5e_aranyhaj.jpg', 'ZcAFdCHsSClf718'),
(21, 'proba2', 'proba2', 'proba@gmail.com', 69999888888, 'Proba2', 0, '../img/users/65ede5b308683_vityaproba2.jpg', 'DTLZSlUkT1gbjEH'),
(22, 'lajos2', 'lajos', 'lajos@gmail.com', 36205245552, 'Proba Lajos', 0, '../img/users/65f4a6105dd37_vityaproba2.jpg', 'B2qNy5lv0TblsOy');

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
-- A tábla indexei `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`subAz`);

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
  MODIFY `AdAz` int(15) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Hírdetés azonosító', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT a táblához `services`
--
ALTER TABLE `services`
  MODIFY `ServiceAz` int(15) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Szolgáltatás azonoítója', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `subAz` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `UserAz` smallint(15) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Felhasználó azonosítója', AUTO_INCREMENT=23;

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
