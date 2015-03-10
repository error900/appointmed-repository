-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2015 at 02:31 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

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
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `indicator` varchar(100) NOT NULL,
  `doctor_id` varchar(100) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `notif_id` varchar(100) NOT NULL,
  `notification` text NOT NULL,
  KEY `patient_id` (`patient_id`),
  KEY `notif_id` (`notif_id`),
  FULLTEXT KEY `doctor_id` (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`indicator`, `doctor_id`, `patient_id`, `notif_id`, `notification`) VALUES
('patient', '2015Macion', 'a376802', 'n1004', 'A patient has cancelled his appointment.'),
('patient', '2015Macion', 'a376802', 'n1004', 'A patient has requested an appointment.'),
('patient', '2015Macion', 'a376802', 'n1004', 'A patient has requested an appointment.'),
('patient', '2015Macion', 'a376802', 'n1004', 'A patient has requested an appointment.'),
('doctor', '2015Macion', 'a376802', 'n1002', 'You have been referred by Bernabe Macion to doctor Sarah Geronimo'),
('patient', '2015Macion', '2015Macam', 'n1004', 'A patient has requested an appointment.'),
('patient', '2015Quinitip', '2015Macam', 'n1004', 'A patient has requested an appointment.'),
('patient', '2015Geronimo', '2015Macam', 'n1004', 'A patient has requested an appointment.'),
('doctor', '2015Macion', '2015Macam', 'n1002', 'You have been referred by Bernabe Macion to doctor Sarah Geronimo'),
('patient', '2015Geronimo', '2015Macam', 'n1004', 'A patient has cancelled his appointment.'),
('patient', '2015Macion', '2015Macam', 'n1004', 'A patient has requested an appointment.'),
('doctor', '2015Macion', '2015Macam', 'n1002', 'You have been referred by Bernabe Macion to doctor Sarah Geronimo'),
('patient', '2015Macion', '2015Macam', 'n1004', 'A patient has requested an appointment.'),
('doctor', '2015Macion', '2015Macam', 'n1002', 'You have been referred by Bernabe Macion to doctor KingCobra'),
('patient', '2015Macion', 'a376802', 'n1004', 'A patient has requested an appointment.');

-- --------------------------------------------------------

--
-- Table structure for table `notif_legend`
--

CREATE TABLE IF NOT EXISTS `notif_legend` (
  `notif_id` varchar(100) NOT NULL,
  `color` text NOT NULL,
  `explaination` text NOT NULL,
  PRIMARY KEY (`notif_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notif_legend`
--

INSERT INTO `notif_legend` (`notif_id`, `color`, `explaination`) VALUES
('n1001', 'red', ''),
('n1002', 'orange', ''),
('n1003', 'green', ''),
('n1004', 'blue', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
