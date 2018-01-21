-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 21, 2018 at 10:20 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votingapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `itemName` varchar(255) NOT NULL,
  `noOfVotes` int(11) NOT NULL DEFAULT '0',
  `itemId` int(11) NOT NULL AUTO_INCREMENT,
  `ImgSrc` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  PRIMARY KEY (`itemId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemName`, `noOfVotes`, `itemId`, `ImgSrc`, `Description`) VALUES
('Apple', 42, 1, 'https://dailyasianage.com/library/small_1507892697_4.jpg', 'Apples are extremely rich in important antioxidants, flavanoids, and dietary fiber.'),
('Orange', 11, 2, 'http://blog.saude.mg.gov.br/wp-content/uploads/2016/11/laranja_agrotoxicos_2016.jpg', 'One orange provides a range of vitamins and minerals; a staggering 130 percent of your vitamin C needs for the day.'),
('Banana', 25, 3, 'http://www.publicdomainpictures.net/pictures/60000/velka/bulk-of-bananas.jpg', 'It is loaded with essential vitamins and minerals such as potassium, calcium, manganese, magnesium, iron, folate, niacin, riboflavin, and B6.'),
('Pineapple', 14, 4, 'http://oliviajuice.com.ng/wp-content/uploads/2017/07/pineapple-day.jpg', 'It has nutrients, vitamins, and minerals, including copper, potassium, calcium, magnesium, manganese, vitamin C, thiamin, B6, beta-carotene, and folate as well as soluble and insoluble fiber and bromelain');

-- --------------------------------------------------------

--
-- Table structure for table `logtable`
--

DROP TABLE IF EXISTS `logtable`;
CREATE TABLE IF NOT EXISTS `logtable` (
  `itemId` int(50) DEFAULT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `voted` int(10) DEFAULT NULL,
  KEY `itemId` (`itemId`),
  KEY `userName` (`userName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logtable`
--

INSERT INTO `logtable` (`itemId`, `userName`, `voted`) VALUES
(1, 'Jane', 0),
(1, 'John', 0),
(2, 'John', 0),
(3, 'John', 0),
(4, 'John', 1),
(2, 'Jane', 0),
(3, 'Jane', 0),
(4, 'Jane', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userName`) VALUES
('John'),
('Jane'),
('prince');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
