-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Gegenereerd op: 16 mrt 2024 om 14:32
-- Serverversie: 11.1.3-MariaDB-1:11.1.3+maria~ubu2204
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developmentdb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(9999) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `price`, `image`, `stock`, `category_id`) VALUES
(1, 'Galatasaray Soccer Ball', 'Elevate your game with the official Galatasaray football.', 29.99, 'ball.jpg', 26, 1),
(2, 'Galatasaray Home Kit', 'Elevate your football fandom with the Galatasaray Home Kit.', 60, 'home.jpg', 79, 1),
(3, 'Galatasaray Away Kit', 'Dress in style and showcase your allegiance with the Galatasaray Away Kit.', 60, 'away.jpg', 97, 1),
(4, 'Galatasaray Hoodie', 'Elevate your street-style game and exhibit your unwavering support with the Galatasaray Hoodie.', 50, 'hoodie.jpg', 108, 1),
(5, 'Galatasaray Shirt', 'Make a bold statement and represent your devotion to Galatasaray with the Galatasaray Shirt.', 35, 'shirt.jpg', 50, 1),
(6, 'Galatasaray Shoes', 'Step into the game with the Galatasaray Shoes.', 99.99, 'shoes.jpg', 50, 1),
(7, 'Galatasaray Limited Edition Watch', 'Capture every moment in time with the Galatasaray Limited Edition Watch.', 149.99, 'watch.jpg', 20, 1),
(8, 'Galatasaray Third Kit', 'Dress in style and showcase your allegiance with the Galatasaray Away Kit.', 60, 'third.jpg', 50, 1),
(9, 'Galatasaray - Fenerbahce', '29-12-2023 / 19:00', 99.99, 'galatasaraylogo.jpg - fenerbahcelogo.jpg', 19063, 2),
(10, ' Ajax - Galatasaray', '21-02-2024 / 21:00', 79.99, 'ajaxlogo.jpg - galatasaraylogo.jpg', 14735, 2),
(11, 'Galatasaray - RealMadrid', '09-04-2024 / 20:15', 199.99, 'galatasaraylogo.jpg - realmadridlogo.jpg', 29990, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Merchandise'),
(2, 'Tickets');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contactPage`
--

CREATE TABLE `contactPage` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(9999) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `contactPage`
--

INSERT INTO `contactPage` (`id`, `name`, `email`, `subject`, `message`, `date`) VALUES
(1, 'duha', 'dhudwhuds@dsbdu.nl', 'dhuduhd', 'cudubd', '2023-12-26 13:39:25'),
(2, 'Duha', 'duhakxbuwud@nuacuna.nl', 'huufeu', 'enesnusu', '2023-12-31 11:34:51'),
(3, 'Duha', 'duhakxbuwud@nuacuna.nl', 'huufeu', 'enesnusu', '2023-12-31 11:35:23'),
(4, 'Duha', 'duha122@yaehed.esbyes', 'csundsuds', 'esee', '2023-12-31 11:35:41'),
(5, 'test', 'test@ne.nl', 'test', 'test', '2023-12-31 11:39:23'),
(6, 'dsds', 'dssdds@axsbyads.bl', 'sfdsf', 'sfdsf', '2023-12-31 11:42:57'),
(7, 'test', 'test@test.nl', 'test', 'tesssss', '2024-01-02 17:32:43'),
(8, 'duha', 'testduha@ayabyas.nl', 'sacundanu', 'ndsdsvn', '2024-01-02 18:08:57'),
(9, 'adsds', 'esed@cssd.sddsf', 'dsasd', 'dsaasd', '2024-01-09 18:19:35'),
(10, 'sbysdbu', 'test5@gmail.com', 'dsaads', 'dsaads', '2024-01-09 18:19:44'),
(11, 'Test1', 'test5@gmail.com', 'sdfdf', 'dfssdf', '2024-01-09 18:21:48'),
(12, 'duha', 'euseu@byedsb.bl', 'esuedu', 'esfuesfuefs', '2024-01-09 20:54:43'),
(13, 'duha', 'euseu@byedsb.bl', 'asdsdads', 'asdsdads', '2024-01-10 11:18:37'),
(14, 'duha', 'euseu@byedsb.bl', 'ds', 'sd', '2024-01-10 16:04:17'),
(15, 'duha', 'euseu@byedsb.bl', 'ds', 'sd', '2024-01-10 16:04:31'),
(16, 'duha', 'euseu@byedsb.bl', 'dsd', 'dsd', '2024-01-11 10:44:21'),
(17, 'duha', 'euseu@byedsb.bl', 'sadadsdas', 'dsaadsads', '2024-01-20 15:00:57');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `shoppingcartid` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `id` int(100) NOT NULL,
  `userid` int(255) NOT NULL,
  `articleid` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` float NOT NULL,
  `totalprice` float NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adres` varchar(9999) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `registrationdate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `name`, `adres`, `phonenumber`, `registrationdate`) VALUES
(1, 'username', '$2y$10$DQlV0u9mFmtOWsOdxXX9H.4kgzEB3E8o97s.S.Pdy4klUAdBvtVh.', 'username@gmail.com', 'User Name', 'Spuistraat 99, 2000LX Amsterdam', '0616275261', '2023-12-24 20:15:26'),
(2, 'd.kahya', '$2y$10$MTaXUIdfsejgifrLyXhkjeWtNhi85yA2RhCtDITbkHbQoN8pOkmKy', 'duhakahya@gmail.com', 'Duha Kahya', 'Lange Begijnestraat 24, 2011HH Haarlem', '0615263458', '2023-12-24 20:20:38');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- Indexen voor tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `contactPage`
--
ALTER TABLE `contactPage`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shoppingcart_id` (`shoppingcartid`);

--
-- Indexen voor tabel `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`userid`),
  ADD KEY `fk_article_id` (`articleid`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `contactPage`
--
ALTER TABLE `contactPage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT voor een tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Beperkingen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_shoppingcart_id` FOREIGN KEY (`shoppingcartid`) REFERENCES `shoppingcart` (`id`);

--
-- Beperkingen voor tabel `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD CONSTRAINT `fk_article_id` FOREIGN KEY (`articleid`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
