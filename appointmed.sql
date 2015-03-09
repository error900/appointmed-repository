-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2015 at 02:05 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `appointmed`
--
CREATE DATABASE IF NOT EXISTS `appointmed` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `appointmed`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `account_type` enum('Doctor','Patient','Secretary','Admin') NOT NULL,
  `account_status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`, `account_type`, `account_status`) VALUES
('AbeMacion', 'korniks', 'Doctor', 'active'),
('Admin', 'admin', 'Admin', 'active'),
('Alabama', 'b43cde468a03951d2e1ca4f15a703f93bf75ba479f48d7680f740f2ec3d583dc', 'Patient', 'active'),
('Alabama00', 'b43cde468a03951d2e1ca4f15a703f93bf75ba479f48d7680f740f2ec3d583dc', 'Patient', 'active'),
('Chara', 'b43cde468a03951d2e1ca4f15a703f93bf75ba479f48d7680f740f2ec3d583dc', 'Patient', 'active'),
('Charamanderaa', 'b43cde468a03951d2e1ca4f15a703f93bf75ba479f48d7680f740f2ec3d583dc', 'Patient', 'active'),
('Charmaine', '13f5f20cc67f6910674614b8a03a24622f74b2ca5cd1f11fb9f0ae7f28dc77b7', 'Patient', 'active'),
('CJTayab', 'secretlang', 'Patient', 'active'),
('ClaudineGutierrez', 'Anakngpating', 'Secretary', 'active'),
('DenmarkMacam', 'Adik4Abe', 'Patient', 'active'),
('DianneRagadio', 'mushrooms', 'Secretary', 'active'),
('FranxenPinzon', 'TheHype2015', 'Patient', 'active'),
('Jude', 'b43cde468a03951d2e1ca4f15a703f93bf75ba479f48d7680f740f2ec3d583dc', 'Patient', 'active'),
('Judelyn', 'b43cde468a03951d2e1ca4f15a703f93bf75ba479f48d7680f740f2ec3d583dc', 'Patient', 'active'),
('JudeVargas', 'bbb', 'Patient', 'active'),
('JunetQuinitip', 'sundaymorning', 'Doctor', 'active'),
('Jurmainer', '0853509b8c4d042252367fea7c1d16b94a466dab405944bc4a8c59ab99b69f8c', 'Patient', 'active'),
('KingCobra', 'kingcobra', 'Doctor', 'active'),
('Leviii', 'qwe', 'Patient', 'active'),
('MarCarey', 'b43cde468a03951d2e1ca4f15a703f93bf75ba479f48d7680f740f2ec3d583dc', 'Patient', 'active'),
('Mikasa22', '13f5f20cc67f6910674614b8a03a24622f74b2ca5cd1f11fb9f0ae7f28dc77b7', 'Patient', 'active'),
('Qwerty', '73d5b2f4ba82d59c723c16a909524559d8f31e33c5d8fdcfc57065dca5c9f189', 'Patient', 'active'),
('Qwertyasdas', '73d5b2f4ba82d59c723c16a909524559d8f31e33c5d8fdcfc57065dca5c9f189', 'Patient', 'active'),
('Ram', 'qwe', 'Doctor', 'active'),
('sadasas', '91a9795588a24c150b4f2417a7ece8539c65dd5c456d51bf4d3210fe2f4bd3bb', 'Patient', 'active'),
('SarahGeronimo', 'kilometro', 'Doctor', 'active'),
('tyuiop', '43c9b542b26db17f11605e97630e1799dce0cf79a1d7c00cdb0ad59e94e0bf2b', 'Patient', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `appointment_id` int(100) NOT NULL AUTO_INCREMENT,
  `remarks` text NOT NULL,
  `doctor_id` varchar(100) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `appoint_date` text NOT NULL,
  `appointment_status` enum('Cancelled','Completed','Referred','Inqueue') NOT NULL,
  `clinic_id` int(100) NOT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `doctor_id` (`doctor_id`,`patient_id`),
  KEY `doctor_id_2` (`doctor_id`),
  KEY `patient_id` (`patient_id`),
  KEY `clinic_id` (`clinic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `remarks`, `doctor_id`, `patient_id`, `appoint_date`, `appointment_status`, `clinic_id`) VALUES
(1, 'for mr. macion', '2015Macion', '2015Macam', '02/24/2015', 'Completed', 295),
(2, 'finished', '2015Quinitip', '2015Tayab', '', 'Completed', 294),
(3, 'for sarahg', '2015Geronimo', '2015Vargas', '02/25/2015', 'Inqueue', 293),
(7, 'sdadasd', '2015Macion', '2015Tayab', '12', 'Cancelled', 293),
(10, 'i love you', '2015Macion', '2015Tayab', '10/23/1015', 'Inqueue', 292),
(39, '', '2015Quinitip', '2015Macam', 's', 'Cancelled', 291),
(70, '', '2015Macion', '2015Vargas', '02/25/2015 10:52 AM', 'Cancelled', 295),
(71, '', '2015Quinitip', '2015Vargas', '', 'Cancelled', 293),
(72, '', '2015Geronimo', '2015Vargas', '02/25/2015 10:54 AM', 'Inqueue', 295),
(73, '', '2015Quinitip', '2015Vargas', '02/27/2015 10:55 AM', 'Inqueue', 293),
(74, '', '2015Macion', 'a376802', '03/06/2015 8:12 AM', 'Cancelled', 295),
(75, '', '2015Macion', 'a376802', '03/06/2015 8:28 AM', 'Cancelled', 295),
(76, '', '2015Macion', 'a376802', '03/13/2015 8:32 AM', 'Cancelled', 295),
(77, '', '2015Macion', 'a376802', '03/12/2015 8:34 AM', 'Cancelled', 295),
(78, '', '2015Geronimo', 'a376802', '03/12/2015 9:11 AM', 'Cancelled', 291),
(79, '', '2015Macion', 'a376802', '03/06/2015 9:21 AM', 'Cancelled', 295),
(80, '', '2015Quinitip', 'a376802', '03/04/2015 9:23 AM', 'Cancelled', 293),
(81, '', '2015Macion', 'a376802', '03/07/2015 9:26 AM', 'Cancelled', 295),
(82, '', '2015Geronimo', 'a376802', '03/12/2015 10:26 AM', 'Referred', 295),
(83, '', '2015Geronimo', '2015Macam', '03/07/2015 10:01 AM', 'Referred', 295),
(84, '', '2015Quinitip', '2015Macam', '03/20/2015 10:02 AM', 'Inqueue', 293),
(85, '', '2015Geronimo', '2015Macam', '03/10/2015 10:02 AM', 'Cancelled', 291),
(86, '', '2015Geronimo', '2015Macam', '03/11/2015 10:05 AM', 'Referred', 295),
(87, '', 'KingCobra', '2015Macam', '03/09/2015 10:10 AM', 'Referred', 295),
(88, '', '2015Macion', 'a376802', '03/14/2015 8:34 AM', 'Inqueue', 295);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_history`
--

CREATE TABLE IF NOT EXISTS `appointment_history` (
  `appointment_history_id` int(100) NOT NULL AUTO_INCREMENT,
  `appointment_status` enum('Cancelled','Completed') NOT NULL,
  `doctor_id` varchar(100) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `appointment_id` int(100) NOT NULL,
  PRIMARY KEY (`appointment_history_id`),
  KEY `doctor_id` (`doctor_id`,`patient_id`,`appointment_id`),
  KEY `patient_id` (`patient_id`),
  KEY `appointment_id` (`appointment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `appointment_history`
--

INSERT INTO `appointment_history` (`appointment_history_id`, `appointment_status`, `doctor_id`, `patient_id`, `appointment_id`) VALUES
(34, 'Cancelled', '2015Quinitip', '2015Macam', 39),
(36, 'Cancelled', '2015Quinitip', '2015Macam', 39),
(51, 'Cancelled', '2015Quinitip', '2015Vargas', 71),
(52, 'Cancelled', '2015Macion', 'a376802', 74),
(53, 'Cancelled', '2015Macion', 'a376802', 75),
(54, 'Cancelled', '2015Macion', 'a376802', 76),
(55, 'Cancelled', '2015Macion', 'a376802', 77),
(56, 'Cancelled', '2015Macion', '2015Vargas', 70),
(57, 'Cancelled', '2015Geronimo', 'a376802', 78),
(58, 'Cancelled', '2015Macion', 'a376802', 79),
(59, 'Cancelled', '2015Quinitip', 'a376802', 80),
(60, 'Cancelled', '2015Macion', 'a376802', 81),
(61, 'Cancelled', '2015Geronimo', '2015Macam', 85);

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE IF NOT EXISTS `clinic` (
  `clinic_id` int(100) NOT NULL AUTO_INCREMENT,
  `clinic_location` varchar(200) NOT NULL,
  `clinic_name` text NOT NULL,
  `clinic_contact` varchar(50) NOT NULL,
  `doctor_id` varchar(100) NOT NULL,
  PRIMARY KEY (`clinic_id`),
  KEY `doctor_id` (`doctor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=296 ;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`clinic_id`, `clinic_location`, `clinic_name`, `clinic_contact`, `doctor_id`) VALUES
(290, 'General Luna, Baguio City', '', '422-5467', '2015Geronimo'),
(291, 'Lower Session, Baguio City', '', '422-1239', '2015Geronimo'),
(292, 'Engineer''s Hill, Baguio City', 'MacionLovesYou', '421-3459', '2015Macion'),
(293, 'Benguet Labs, Baguio City', '', '422-1311', '2015Quinitip'),
(294, 'Tuba', 'Mancion', '876543', '2015Macion'),
(295, 'Gisad', 'The Macioninator', '76543', '2015Macion');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `doctor_id` varchar(100) NOT NULL,
  `doctor_name` text NOT NULL,
  `specialization` text NOT NULL,
  `doctor_status` enum('On Leave','Emergency','In','Out','Sick Leave') NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`doctor_id`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doctor_name`, `specialization`, `doctor_status`, `email`, `username`) VALUES
('2015Geronimo', 'Sarah Geronimo', 'Dentistry', 'In', 'sarahg@hotmail.com', 'SarahGeronimo'),
('2015Macion', 'Bernabe Macion', 'Dentistry', 'In', 'bernabe@gmail.com', 'AbeMacion'),
('2015Quinitip', 'Junet Quinitip', 'Cardiology', 'Out', 'jquin@yahoo.com', 'JunetQuinitip'),
('KingCobra', 'KingCobra', 'Dentistry', 'Sick Leave', 'kings@gmail.com', 'KingCobra');

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
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` varchar(100) NOT NULL,
  `patient_name` text NOT NULL,
  `patient_contact` varchar(100) NOT NULL,
  `birthdate` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `patient_category` enum('Adult','Child') NOT NULL,
  `age` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `appointment_id` int(100) DEFAULT NULL,
  `occupation` text,
  PRIMARY KEY (`patient_id`),
  KEY `username` (`username`,`appointment_id`),
  KEY `appointment_id` (`appointment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_name`, `patient_contact`, `birthdate`, `email`, `patient_category`, `age`, `username`, `appointment_id`, `occupation`) VALUES
('2015Macam', 'Denmark Macam', '09202324249', '05/11/95', 'adikforabe@yahoo.com', '', 0, 'DenmarkMacam', 1, NULL),
('2015Pinzon', 'Franxen Pinzon', '09221494297', '02/21/95', 'fxss@yahoo.com', '', 0, 'FranxenPinzon', NULL, NULL),
('2015Tayab', 'Christine Joy Tayab', '09090923021', '12/22/94', 'cj.tayab@gmail.com', '', 0, 'CJTayab', NULL, NULL),
('2015Vargas', 'Judelyn Vargas', '09213224590', '10/28/94', 'judefvargas@gmail.com', '', 0, 'JudeVargas', 3, 'student'),
('69ed348', 'Charamaine Lafina', '092123232321', '10/02/1990', 'judefvargas@gmail.com', 'Adult', 23, 'Charmaine', NULL, 'Student'),
('7ed0365', 'Mariah Carey', '09090131190', '02/21/1999', 'jabbamaxi@yahoo.com', 'Adult', 15, 'MarCarey', NULL, 'Singer'),
('93d74c5', 'tyuiop', '09876655432', 'None', 'tyuiop@gmail.com', 'Child', 1, 'tyuiop', NULL, 'None'),
('a376802', 'Levi Ackerman', '09342432424', '12/22/2001', 'levi@yahoo.com', 'Adult', 14, 'Leviii', NULL, 'Captain'),
('b28d7c6', 'Mikasa Ackerman', '092123434234', '09/22/1999', 'mika@gmail.com', 'Adult', 16, 'Mikasa22', NULL, 'Soldier'),
('d39270c', 'Alabama00', 'Alabama00', 'Alabama00', 'Alabama00', 'Adult', 19, 'Alabama00', NULL, 'Alabama00'),
('e547cd5', 'asdasd', 'sadasdasd', 'sadasdsa', 'asdsa', 'Adult', 37, 'sadasas', NULL, 'asdsadsa'),
('f8afa10', 'Qwerty', '0987654112', 'None', 'Qwerty@gmail.com', 'Adult', 17, 'Qwerty', NULL, 'None'),
('ff08728', 'q', '923298747', 'None', 'Qwerty@gmail.com', 'Child', 1, 'Qwertyasdas', NULL, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `referred`
--

CREATE TABLE IF NOT EXISTS `referred` (
  `referred_id` varchar(100) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `doctor_id` varchar(100) NOT NULL,
  KEY `patient_id` (`patient_id`),
  KEY `doctor_id` (`doctor_id`),
  KEY `referred_id` (`referred_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referred`
--

INSERT INTO `referred` (`referred_id`, `patient_id`, `doctor_id`) VALUES
('KingCobra', '2015Vargas', '2015Macion'),
('KingCobra', '2015Vargas', '2015Macion'),
('2015Geronimo', '2015Vargas', 'KingCobra'),
('2015Macion', '2015Vargas', 'KingCobra'),
('2015Macion', '2015Vargas', '2015Geronimo'),
('2015Geronimo', '2015Vargas', '2015Macion'),
('KingCobra', '2015Vargas', '2015Macion'),
('2015Macion', '2015Vargas', 'KingCobra'),
('2015Geronimo', 'a376802', '2015Macion'),
('2015Geronimo', '2015Macam', '2015Macion'),
('2015Geronimo', '2015Macam', '2015Macion'),
('KingCobra', '2015Macam', '2015Macion');

-- --------------------------------------------------------

--
-- Table structure for table `secretary`
--

CREATE TABLE IF NOT EXISTS `secretary` (
  `secretary_id` varchar(100) NOT NULL,
  `secretary_name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `doctor_id` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`secretary_id`),
  KEY `doctor_id` (`doctor_id`,`username`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secretary`
--

INSERT INTO `secretary` (`secretary_id`, `secretary_name`, `email`, `doctor_id`, `username`) VALUES
('2015Gutierrez', 'Claudine Gutierrez', 'clauds_22@hotmail.com', '2015Quinitip', 'ClaudineGutierrez'),
('2015Ragadio', 'Dianne Ragadio', 'ian.ragadio@gmail.com', '2015Macion', 'DianneRagadio');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE IF NOT EXISTS `subscribe` (
  `doctor_id` varchar(100) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  KEY `doctor_id` (`doctor_id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`doctor_id`, `patient_id`) VALUES
('2015Quinitip', '2015Vargas'),
('KingCobra', '2015Vargas');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`clinic_id`) ON UPDATE CASCADE;

--
-- Constraints for table `appointment_history`
--
ALTER TABLE `appointment_history`
  ADD CONSTRAINT `appointment_history_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`),
  ADD CONSTRAINT `appointment_history_ibfk_3` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `appointment_history_ibfk_4` FOREIGN KEY (`appointment_id`) REFERENCES `appointment` (`appointment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clinic`
--
ALTER TABLE `clinic`
  ADD CONSTRAINT `clinic_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`),
  ADD CONSTRAINT `patient_ibfk_2` FOREIGN KEY (`appointment_id`) REFERENCES `appointment` (`appointment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `referred`
--
ALTER TABLE `referred`
  ADD CONSTRAINT `referred_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `referred_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`),
  ADD CONSTRAINT `referred_ibfk_3` FOREIGN KEY (`referred_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `secretary`
--
ALTER TABLE `secretary`
  ADD CONSTRAINT `secretary_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `secretary_ibfk_2` FOREIGN KEY (`username`) REFERENCES `account` (`username`);

--
-- Constraints for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD CONSTRAINT `subscribe_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`),
  ADD CONSTRAINT `subscribe_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
