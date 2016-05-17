-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2016 at 02:25 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_tpphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `published` varchar(50) NOT NULL,
  `author` varchar(128) NOT NULL,
  `price` int(10) NOT NULL,
  `photo` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `category`, `published`, `author`, `price`, `photo`) VALUES
(1, 'Treasure Island', 'aventure', 'May 23, 1883', 'Robert Louis Stevenson', 20, 'img/aventures1.jpg'),
(2, 'Around the World in Eighty Days', 'aventure', 'January 30, 1873', 'Jules Verne', 19, 'img/aventures2.jpg'),
(3, 'Robinson Crusoe', 'aventure', 'April 25, 1719', 'Daniel Defoe', 21, 'img/aventures3.jpg'),
(4, 'The Lost World', 'aventure', '1912', 'Arthur Conan Doyle', 17, 'img/aventures4.jpg'),
(5, '1984', 'sciencefiction', 'June 8, 1949', 'George Orwell', 30, 'img/sciencefiction1.jpg'),
(6, 'Brave New World', 'sciencefiction', '1932', 'Aldous Huxley', 28, 'img/sciencefiction2.jpg'),
(7, 'Dune', 'sciencefiction', '1965', 'Frank Herbert', 27, 'img/sciencefiction3.jpg'),
(8, 'Foundation', 'sciencefiction', '1951', 'Isaac Asimov', 28, 'img/sciencefiction4.jpg'),
(9, 'Ravel', 'biographie', 'January 2006', 'Jean Echenoz', 31, 'img/biographie1.jpg'),
(10, 'The White Night of St. Petersburg', 'biographie', '2000', 'Prince Michael of Greece and Denmark', 29, 'img/biographie2.jpg'),
(11, 'One L', 'biographie', '1977', 'Scott Turow', 25, 'img/biographie3.jpg'),
(12, 'Green Hills of Africa', 'biographie', 'October 25, 1935', 'Ernest Hemingway', 26, 'img/biographie4.jpg'),
(13, 'This Night''s Foul Work', 'policier', '2006', 'Fred Vargas', 24, 'img/policier1.jpg'),
(14, 'And Then There Were None', 'policier', 'November 6, 1939', 'Agatha Christie', 29, 'img/policier2.jpg'),
(15, 'Murder on the Orient Express', 'policier', 'January 1, 1934', 'Agatha Christie', 31, 'img/policier3.jpg'),
(16, 'The Chalk Circle Man', 'policier', '1991', 'Fred Vargas', 25, 'img/policier4.jpg'),
(17, 'Le Seigneur des Anneaux', 'fantastique', '1955', 'J.R.R. Tolkien', 50, 'img/fantastique1.jpg'),
(18, 'Le Trône de fer', 'fantastique', '6 août 1996', 'George R. R. Martin', 41, 'img/fantastique2.jpg'),
(19, 'L''Apprenti assassin - L''Assassin royal', 'fantastique', '1995', 'Robin Hobb', 36, 'img/fantastique3.jpg'),
(20, 'Bilbo le Hobbit', 'fantastique', '21 septembre 1937', 'J.R.R. Tolkien', 69, 'img/fantastique4.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
