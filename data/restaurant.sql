-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Vært: 127.0.0.1
-- Genereringstid: 24. 10 2016 kl. 20:04:50
-- Serverversion: 10.1.16-MariaDB
-- PHP-version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `article`
--

CREATE TABLE `article` (
  `Article_ID` int(11) NOT NULL,
  `Article_Title` varchar(64) NOT NULL,
  `Article_Created` date NOT NULL,
  `Article_Content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `article`
--

INSERT INTO `article` (`Article_ID`, `Article_Title`, `Article_Created`, `Article_Content`) VALUES
(1, 'Article One', '2016-10-01', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.'),
(2, 'Article 2', '2016-10-08', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `boards`
--

CREATE TABLE `boards` (
  `Boards_ID` int(11) NOT NULL,
  `Boards_Seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `boards`
--

INSERT INTO `boards` (`Boards_ID`, `Boards_Seats`) VALUES
(1, 2),
(2, 2),
(3, 4),
(4, 4),
(5, 6),
(6, 6),
(7, 8),
(8, 8),
(9, 10),
(10, 10);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `comments`
--

CREATE TABLE `comments` (
  `Comments_ID` int(11) NOT NULL,
  `Comments_Username` varchar(64) NOT NULL,
  `Comments_Rating` int(11) NOT NULL,
  `Comments_Comment` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `products`
--

CREATE TABLE `products` (
  `Product_ID` int(11) NOT NULL,
  `Product_Title` varchar(64) NOT NULL,
  `Product_Description` mediumtext NOT NULL,
  `Product_Price` float NOT NULL,
  `Product_Special` tinyint(4) NOT NULL,
  `Product_Restriction` enum('Vegetarian','Vegan','Pesketarian','Normal') NOT NULL,
  `Product_Category` enum('Food','Drink','Menue','') NOT NULL,
  `Product_Votes` int(11) NOT NULL,
  `Product_Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Data dump for tabellen `products`
--

INSERT INTO `products` (`Product_ID`, `Product_Title`, `Product_Description`, `Product_Price`, `Product_Special`, `Product_Restriction`, `Product_Category`, `Product_Votes`, `Product_Total`) VALUES
(1, 'The Trump', 'A classic Burger with 200g organic beef and whole grain patty.', 7.99, 0, 'Normal', 'Food', 0, 0),
(2, 'The grumpy old man', 'A very spicy burger with 200g organic beef and whole grain patty', 7.99, 0, 'Normal', 'Food', 0, 0),
(3, 'The liar', 'It looks like beef, it tastes like beef, but it is 100% vegan.', 9.99, 0, 'Vegan', 'Food', 0, 0),
(4, 'The Mexican', 'An empty plate for our little costumers - Just take some food from your parents', 0, 0, 'Normal', 'Menue', 0, 0),
(5, 'Small Softdrink', 'Choose between Cola, Fanta and Sprite, 0.5l', 2.99, 0, 'Vegetarian', 'Drink', 0, 0);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `reservations`
--

CREATE TABLE `reservations` (
  `Reservations_ID` int(11) NOT NULL,
  `Reservations_Name` varchar(64) NOT NULL,
  `Reservations_Phone` int(20) NOT NULL,
  `Reservations_Board_ID` int(11) NOT NULL,
  `Reservations_People` int(11) NOT NULL,
  `Reservations_Date` date NOT NULL,
  `Reservations_Time` int(11) NOT NULL,
  `Reservations_Notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`Article_ID`);

--
-- Indeks for tabel `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`Boards_ID`);

--
-- Indeks for tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comments_ID`);

--
-- Indeks for tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indeks for tabel `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`Reservations_ID`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `article`
--
ALTER TABLE `article`
  MODIFY `Article_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tilføj AUTO_INCREMENT i tabel `boards`
--
ALTER TABLE `boards`
  MODIFY `Boards_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Tilføj AUTO_INCREMENT i tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `Comments_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tilføj AUTO_INCREMENT i tabel `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tilføj AUTO_INCREMENT i tabel `reservations`
--
ALTER TABLE `reservations`
  MODIFY `Reservations_ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
