-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2015 at 03:54 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `appointmed`
--

-- --------------------------------------------------------

--
-- Table structure for table `notification_history`
--

CREATE TABLE IF NOT EXISTS `notification_history` (
  `history_id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_id` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`history_id`),
  KEY `notification_id` (`notification_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `notification_history`
--

INSERT INTO `notification_history` (`history_id`, `notification_id`, `description`) VALUES
(3, 61, 'You have been referred by doctor Abe Macion to doctor FionaMalam'),
(4, 101, 'Doctor Abe Macion has changed his/her status to Out'),
(5, 68, 'Your appointment is finished.'),
(6, 106, 'A patient has requested an appointment.'),
(7, 107, 'A patient has requested an appointment.'),
(8, 67, 'A patient has requested an appointment.'),
(9, 59, 'A patient has requested an appointment.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
