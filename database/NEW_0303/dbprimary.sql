-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Már 10. 12:39
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

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
(7, 'KurtaKocsma', 'kurtakocsma@gmail.com', 36205428797, 'Kozmetikus', '1114 Budapest Minta Tér 2', 1, 'Kurta Kocsma a világ legjobb helye, ahol be lehet baszni az ismerősökkel és talaj részegre inni magad ,hogy fetrengj a hányásodban holnap hajnalig.', '../img/ads/65d1a1c3997c2_IMG_20190717_001933.jpg'),
(8, 'KurtaKocsma', 'kurtakocsma@gmail.com', 36205428797, 'Kozmetikus', '1114 Budapest Minta Tér 2', 1, 'Kurta Kocsma a világ legjobb helye, ahol be lehet baszni az ismerősökkel és talaj részegre inni magad ,hogy fetrengj a hányásodban holnap hajnalig.', '../img/ads/65d1a2c7ba2c9_IMG_20190717_001933.jpg'),
(11, 'BekapodATököm', 'baszki@kaki.com', 5569821147, 'Szempillás', '5854Shaghaiiiiiii', 1, 'Ez egy kaka', '../img/ads/65d1b7cd6b7b5_Vilagito-magyar-nyelvu-billentyuzet-matrica-Fekete.jpg'),
(13, 'Hasbullah', 'hasbullahkijev@gmail.com', 698555471112, 'Fodrász', 'Kijev', 19, 'MMA figyhters only', '../img/ads/65ed5075a27e3_blackwidow.jpg'),
(14, 'Avengers', 'avengers@gmail.com', 36558874412214, 'Kozmetikus', '2455888 Brooklyn', 19, 'Avengers Assemble', '../img/ads/65ed511add5f5_amerika.jpg'),
(15, 'MMA', 'MMA@gmail.com', 6985552144785, 'Fodrász', 'MMA', 19, 'MMA ONY', '../img/ads/65ed5177b96f4_vasember.jpg'),
(16, 'MMA', 'MMAssss@gmail.com', 6985552144785, 'Fodrász', 'MMA', 19, 'MMA ONY', '../img/ads/65ed522a31050_karajos.png'),
(17, 'Torony fodrászat', 'toronyhaz@gmail.com', 658889711112, 'Fodrász', 'A végtelenbe és tovább', 20, 'Mentsetek meg nyomorultak.', '../img/ads/65ed69276838b_aranyads.jpg');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `services`
--

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
(3, 'Fodrász'),
(4, 'Kozmetikus'),
(11, 'Manikűr/Pedikűr'),
(6, 'Masszőr'),
(5, 'Műkörmös'),
(7, 'Smink tetováló'),
(8, 'Szempillás'),
(9, 'Szépségterapeuta');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

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
(1, 'Kurucz', '186332', 'kuruczjanos@gmail.com', 6303273051, 'Kurucz János', 1, '', ''),
(2, 'Meggyesi', '123456789', 'meggyesireka@gmail.com', 6222222222, 'Meggyesi Réka', 1, '', ''),
(16, 'amerika', 'amerika', 'amerika2@gmail.com', 6905554444, 'Amerika Kapitány', 0, '../img/users/65ed3b7847f51_amerika.jpg', '4x55XvTNcSqhXHZ'),
(17, 'vasember2018', 'vasember', 'vasember@gmail.com', 985544785222, 'Tony Stark', 0, '../img/users/65ed3c32bda21_vasember.jpg', '5B4x3aUJB3sR9Kj'),
(18, 'blackwidow', 'natasha', 'blackwidow@gmail.com', 5558745521122, 'Natasha Rommanov', 0, '../img/users/65ed3c600e29d_blackwidow.jpg', 'KGRRNaeMaDLhVJm'),
(19, 'hasbullah', 'hasbullah', 'hasbullah@gmail.com', 36555412528, 'Hasbullah ', 0, '../img/users/65ed71612df47_vasember.jpg', 'SnlsW6MmdOILvLf'),
(20, 'aranyhaj', 'aranyhaj', 'aranyhaj@gmail.com', 6985554, 'Aranyhaj', 0, '../img/users/65ed68e528c5e_aranyhaj.jpg', 'ZcAFdCHsSClf718');

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
  MODIFY `AdAz` int(15) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Hírdetés azonosító', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT a táblához `services`
--
ALTER TABLE `services`
  MODIFY `ServiceAz` int(15) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Szolgáltatás azonoítója', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `UserAz` smallint(15) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Felhasználó azonosítója', AUTO_INCREMENT=21;

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
