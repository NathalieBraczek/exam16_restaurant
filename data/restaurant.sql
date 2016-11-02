-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2016 at 05:08 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

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
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `Article_ID` int(11) NOT NULL,
  `Article_Title` varchar(64) NOT NULL,
  `Article_Created` date NOT NULL,
  `Article_Content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`Article_ID`, `Article_Title`, `Article_Created`, `Article_Content`) VALUES
(1, 'Oldest Article', '2016-10-01', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.'),
(2, 'Newest Article', '2016-10-08', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.');

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `Boards_ID` int(11) NOT NULL,
  `Boards_Seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `boards`
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Comments_ID` int(11) NOT NULL,
  `Comments_Username` varchar(64) NOT NULL,
  `Comments_Rating` int(11) NOT NULL,
  `Comments_Comment` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `Information_ID` int(11) NOT NULL,
  `Information_Name` varchar(16) NOT NULL,
  `Information_Content` mediumtext NOT NULL,
  `Information_Hint` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`Information_ID`, `Information_Name`, `Information_Content`, `Information_Hint`) VALUES
(1, 'Slogan', 'The Perfectly Sexist and Mexican-hating American Diner - Make Burgers Great Again!', ''),
(2, 'Description', 'In this american Diner we serve delicious burgers to Americans - Note ONLY Americans - If you are Mexican we unkindly ask you to fuck off behind a wall!\r\nEven though it is not Trump-like all our burgers are biological and we know the name of every cow that sacrificied their life to our enjoyment. - Their name was Hillary', ''),
(3, 'Opening Hours', 'Mon-Fri| 4pm-4am\r\nSat| 2pm-6am', 'Separate columns with the pipe-symbol ( | )'),
(4, 'Phone', '+12 34567891', ''),
(5, 'Email', 'nathalie.braczek@gmx.de', 'This email-address is used for the contactform');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_ID` int(11) NOT NULL,
  `Product_Title` varchar(64) NOT NULL,
  `Product_Description` mediumtext NOT NULL,
  `Product_Price` float NOT NULL,
  `Product_Special` tinyint(1) NOT NULL,
  `Product_Restriction` enum('Vegetarian','Vegan','Pesketarian','Normal') NOT NULL,
  `Product_Category` enum('Food','Drink','Menue','') NOT NULL,
  `Product_Votes` int(11) NOT NULL,
  `Product_Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_ID`, `Product_Title`, `Product_Description`, `Product_Price`, `Product_Special`, `Product_Restriction`, `Product_Category`, `Product_Votes`, `Product_Total`) VALUES
(1, 'The Trump', 'A classic Burger with 200g organic beef and whole grain patty.', 7.99, 0, 'Normal', 'Food', 0, 0),
(2, 'The grumpy old man', 'A very spicy burger with 200g organic beef and whole grain patty', 7.99, 0, 'Normal', 'Food', 0, 0),
(3, 'The liar', 'It looks like beef, it tastes like beef, but it is 100% vegan.', 9.99, 1, 'Vegan', 'Food', 0, 0),
(4, 'The Mexican', 'An empty plate for our little costumers - Just take some food from your parents', 0, 0, 'Normal', 'Menue', 0, 0),
(5, 'Small Softdrink', 'Choose between Cola, Fanta and Sprite, 0.5l', 2.99, 0, 'Vegetarian', 'Drink', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `Reservations_ID` int(11) NOT NULL,
  `Reservations_Name` varchar(64) NOT NULL,
  `Reservations_Phone` varchar(20) NOT NULL,
  `Reservations_Board_ID` int(11) NOT NULL,
  `Reservations_People` int(11) NOT NULL,
  `Reservations_Date` date NOT NULL,
  `Reservations_Time` time NOT NULL,
  `Reservations_Notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`Reservations_ID`, `Reservations_Name`, `Reservations_Phone`, `Reservations_Board_ID`, `Reservations_People`, `Reservations_Date`, `Reservations_Time`, `Reservations_Notes`) VALUES
(1, 'Max Mustermann', '12345678', 2, 2, '2016-10-31', '19:00:00', 'Wheelchair');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`Article_ID`);

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`Boards_ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comments_ID`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`Information_ID`),
  ADD UNIQUE KEY `Information_Name` (`Information_Name`),
  ADD KEY `Information_Name_2` (`Information_Name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`Reservations_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `Article_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `Boards_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comments_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `Information_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `Reservations_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
