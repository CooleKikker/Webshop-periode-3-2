-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 07 mei 2020 om 09:06
-- Serverversie: 5.7.30-0ubuntu0.18.04.1
-- PHP-versie: 7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$AgGf7memcTkpMu9vmzNeIuhCTzMg7IggqKdBr83h5vpxnAJd20ipW');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `catogory`
--

CREATE TABLE `catogory` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `catogory`
--

INSERT INTO `catogory` (`id`, `name`, `description`) VALUES
(15, 'Bordspellen', 'Bordspellen, speel je op een bord!'),
(16, 'Kaartspellen', 'Kaarspellen waarmee je kan kaarten\r\n');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `sale` decimal(10,2) DEFAULT NULL,
  `weight` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `minage` int(11) NOT NULL,
  `maxage` int(11) NOT NULL,
  `playtime` int(11) NOT NULL,
  `players` int(11) NOT NULL,
  `catogory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `sale`, `weight`, `stock`, `minage`, `maxage`, `playtime`, `players`, `catogory_id`) VALUES
(14, 'Ganzenbord', 'Het oeroude spel ganzenbord! Ga als eerste naar het einde om te winnen!', '5.50', '4.95', 123, 2, 12, 99, 15, 4, 15),
(15, 'Pakje Kaarten', 'Een pakje kaarten.', '5.00', '0.00', 125, 7, 15, 99, 15, 4, 16),
(16, 'Ezelen', 'Het spel Ezelen. Pak als eerste een ezel, en zorg dat je zelf niet 2 oren krijgt!', '12.95', '9.99', 142, 3, 12, 99, 15, 5, 15),
(17, 'Testproduct', 'Dit is een testproduct', '123.00', '123.00', 123, 123, 123, 12, 123, 123, 15),
(18, 'Playbutton Ganzenbord', 'Een fake youtube Playbutton met een ganzenbord versi!', '15.00', '0.00', 450, 2, 12, 99, 252, 12, 15);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image`) VALUES
(6, 2, 'WIN_20190905_10_36_25_Pro.jpg'),
(7, 2, 'Cursor Default.png'),
(8, 5, 'ad.png'),
(9, 5, 'ao.png'),
(10, 6, 'ar.png'),
(11, 9, 'bd.png'),
(12, 11, 'al.png'),
(13, 12, 'am.png'),
(14, 11, 'au.png'),
(15, 11, 'be.png'),
(16, 11, 'bw.png'),
(17, 11, 'bh.png'),
(18, 11, 'at.png'),
(19, 14, 'ganzenbord1.jpg'),
(20, 14, 'ganzenbord2.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `voornaam` varchar(55) NOT NULL,
  `achternaam` varchar(55) NOT NULL,
  `gebruikersnaam` varchar(40) NOT NULL,
  `wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `voornaam`, `achternaam`, `gebruikersnaam`, `wachtwoord`) VALUES
(3, 'Thijs', 'Vink', 'ThijsVink', '$2y$10$hlg0RxBrIAAE9pJ5zIj4Rez65VWkeY7NdX4NMy0SXPz2UIdMjEdTy'),
(4, 'Jan', 'van Os', 'janvanos', '$2y$10$r5W4sItmrI2hSsqf9O8x9uwd43/btt9n.XR0wkogf851CKxL1WG9G');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `catogory`
--
ALTER TABLE `catogory`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `catogory`
--
ALTER TABLE `catogory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT voor een tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT voor een tabel `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
