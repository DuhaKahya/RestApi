-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Gegenereerd op: 28 apr 2024 om 12:37
-- Serverversie: 11.3.2-MariaDB-1:11.3.2+maria~ubu2204
-- PHP-versie: 8.2.17

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
-- Tabelstructuur voor tabel `Articles`
--

CREATE TABLE `Articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(9999) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Articles`
--

INSERT INTO `Articles` (`id`, `title`, `description`, `price`, `image`, `stock`, `category_id`) VALUES
(1, 'Galatasaray Soccer Ball', 'Elevate your game with the official Galatasaray football.', 29.99, 'ball.jpg', 93, 1),
(2, 'Galatasaray Home Kit', 'Elevate your football fandom with the Galatasaray Home Kit.', 60, 'home.jpg', 75, 1),
(3, 'Galatasaray Away Kit', 'Dress in style and showcase your allegiance with the Galatasaray Away Kit.', 60, 'away.jpg', 95, 1),
(4, 'Galatasaray Hoodie', 'Elevate your street-style game and exhibit your unwavering support with the Galatasaray Hoodie.', 50, 'hoodie.jpg', 108, 1),
(5, 'Galatasaray Shirt', 'Make a bold statement and represent your devotion to Galatasaray with the Galatasaray Shirt.', 35, 'shirt.jpg', 50, 1),
(6, 'Galatasaray Shoes', 'Step into the game with the Galatasaray Shoes.', 99.99, 'shoes.jpg', 50, 1),
(7, 'Galatasaray Limited Edition Watch', 'Capture every moment in time with the Galatasaray Limited Edition Watch.', 149.99, 'watch.jpg', 20, 1),
(8, 'Galatasaray Third Kit', 'Dress in style and showcase your allegiance with the Galatasaray Away Kit.', 60, 'third.jpg', 50, 1),
(9, 'Galatasaray - Fenerbahce', '29-12-2023 / 19:00', 99.99, 'galatasaraylogo.jpg - fenerbahcelogo.jpg', 19063, 2),
(10, ' Ajax - Galatasaray', '21-02-2024 / 21:00', 79.99, 'ajaxlogo.jpg - galatasaraylogo.jpg', 14735, 2),
(11, 'Galatasaray - RealMadrid', '09-04-2024 / 20:15', 199.99, 'galatasaraylogo.jpg - realmadridlogo.jpg', 29900, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Category`
--

CREATE TABLE `Category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Category`
--

INSERT INTO `Category` (`id`, `name`) VALUES
(1, 'Merchandise'),
(2, 'Tickets');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ContactPage`
--

CREATE TABLE `ContactPage` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(9999) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `ContactPage`
--

INSERT INTO `ContactPage` (`id`, `name`, `email`, `subject`, `message`, `date`) VALUES
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
(17, 'duha', 'euseu@byedsb.bl', 'sadadsdas', 'dsaadsads', '2024-01-20 15:00:57'),
(18, 'adsfg', 'sdfg', 'sfdgfhg', 'drgtfhyg', '2024-03-26 15:23:36'),
(19, 'wregt', 'efrgWdsf.de', 'adsf', 'efreeer', '2024-04-23 11:27:48');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Orders`
--

CREATE TABLE `Orders` (
  `id` int(11) NOT NULL,
  `shoppingcartid` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Orders`
--

INSERT INTO `Orders` (`id`, `shoppingcartid`, `date`) VALUES
(1, 42, '2024-04-28 12:33:35');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Roles`
--

CREATE TABLE `Roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Roles`
--

INSERT INTO `Roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Shoppingcart`
--

CREATE TABLE `Shoppingcart` (
  `id` int(100) NOT NULL,
  `userid` int(255) NOT NULL,
  `articleid` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` float NOT NULL,
  `totalprice` float NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Shoppingcart`
--

INSERT INTO `Shoppingcart` (`id`, `userid`, `articleid`, `quantity`, `price`, `totalprice`, `date`, `status`) VALUES
(30, 4, 1, 2, 29.99, 59.98, '2024-03-30 21:09:18', 'paid'),
(31, 4, 1, 44, 29.99, 1319.56, '2024-03-30 21:10:16', 'paid'),
(32, 4, 1, 2, 29.99, 59.98, '2024-03-30 21:11:19', 'unpaid'),
(33, 4, 11, 91, 199.99, 18199.1, '2024-03-30 21:12:18', 'paid'),
(34, 3, 5, 2, 35, 70, '2024-04-01 17:12:27', 'unpaid'),
(35, 4, 2, 2, 60, 120, '2024-04-01 17:30:25', 'unpaid'),
(36, 4, 1, 2, 29.99, 59.98, '2024-04-01 21:47:55', 'unpaid'),
(37, 3, 1, 3, 29.99, 89.97, '2024-04-01 21:48:12', 'paid'),
(38, 3, 1, 3, 29.99, 89.97, '2024-04-18 15:54:13', 'paid'),
(39, 5, 2, 2, 60, 120, '2024-04-23 11:27:15', 'paid'),
(40, 5, 1, 1, 29.99, 29.99, '2024-04-28 12:26:21', 'paid'),
(41, 5, 2, 2, 60, 120, '2024-04-28 12:31:52', 'paid'),
(42, 5, 3, 2, 60, 120, '2024-04-28 12:33:30', 'paid');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roleId` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adres` varchar(9999) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `registrationdate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `User`
--

INSERT INTO `User` (`id`, `username`, `password`, `roleId`, `email`, `name`, `adres`, `phonenumber`, `registrationdate`) VALUES
(1, 'username', '$2y$10$DQlV0u9mFmtOWsOdxXX9H.4kgzEB3E8o97s.S.Pdy4klUAdBvtVh.', 1, 'username@gmail.com', 'User Name', 'Spuistraat 99, 2000LX Amsterdam', '0616275261', '2024-03-26 15:36:09'),
(3, 'd.kahya', '$2y$10$ygX3hHLn6AYyWzeEnT.F6OITUVpe93lmWFqgTUAnjer/kH7Wimxv6', 2, 'duha@gmail.com', 'Duha', 'Duha', '0635241526', '2024-03-26 16:16:00'),
(4, 'mark', '$2y$10$FGQ7mJukZdO8BxI/c339Fu9AKDVnjqAI5GvGAImUucxQvs/BEMtAi', 2, 'mark@gmail.com', 'Mark', 'Mark', '0625362514', '2024-03-26 16:36:39'),
(5, 'hicham', '$2y$10$oJlW4eHwq3/E7u9wjdGQsek082M6CrlvyMPnZzMLo6ECXxeAlt0F.', 2, 'Hicham123@gmail.com', 'Hicham', 'Hichamstraat', '0611524651', '2024-04-23 11:26:42'),
(6, 'test', '$2y$10$CwB1cipqh585i2EROJmBA.yglsCutc3ORL3milqIKo8fj3IL6OtLW', 2, 'test', 'test', 'test', '062251', '2024-04-28 12:36:57');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- Indexen voor tabel `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `ContactPage`
--
ALTER TABLE `ContactPage`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shoppingcart_id` (`shoppingcartid`);

--
-- Indexen voor tabel `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `Shoppingcart`
--
ALTER TABLE `Shoppingcart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`userid`),
  ADD KEY `fk_article_id` (`articleid`);

--
-- Indexen voor tabel `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_User_Role` (`roleId`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Articles`
--
ALTER TABLE `Articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `Category`
--
ALTER TABLE `Category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `ContactPage`
--
ALTER TABLE `ContactPage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT voor een tabel `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `Roles`
--
ALTER TABLE `Roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `Shoppingcart`
--
ALTER TABLE `Shoppingcart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT voor een tabel `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `Articles`
--
ALTER TABLE `Articles`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `Category` (`id`);

--
-- Beperkingen voor tabel `Orders`
--
ALTER TABLE `Orders`
  ADD CONSTRAINT `fk_shoppingcart_id` FOREIGN KEY (`shoppingcartid`) REFERENCES `Shoppingcart` (`id`);

--
-- Beperkingen voor tabel `Shoppingcart`
--
ALTER TABLE `Shoppingcart`
  ADD CONSTRAINT `fk_article_id` FOREIGN KEY (`articleid`) REFERENCES `Articles` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`userid`) REFERENCES `User` (`id`);

--
-- Beperkingen voor tabel `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `FK_User_Role` FOREIGN KEY (`roleId`) REFERENCES `Roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
