-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2013 at 09:36 PM
-- Server version: 5.5.31
-- PHP Version: 5.4.4-14+deb7u5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kampacties`
--

-- --------------------------------------------------------

--
-- Table structure for table `explorer`
--

DROP TABLE IF EXISTS `explorer`;
CREATE TABLE `explorer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naam` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `kampactie_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kampactie_id` (`kampactie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kampactie`
--

DROP TABLE IF EXISTS `kampactie`;
CREATE TABLE `kampactie` (
  `naam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datum` date NOT NULL,
  `omschrijving` text COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `explorer`
--
ALTER TABLE `explorer`
  ADD CONSTRAINT `explorer_ibfk_1` FOREIGN KEY (`kampactie_id`) REFERENCES `kampactie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
