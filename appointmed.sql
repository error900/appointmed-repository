CREATE DATABASE  IF NOT EXISTS `appointmed` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `appointmed`;
-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2015 at 12:39 AM
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
('Leviii', '1dd469f240b53c1ae2fd1518ec2ec5f58770bf51c6f16c592baf6f98f52447d5', 'Patient', 'active'),
('MarCarey', 'b43cde468a03951d2e1ca4f15a703f93bf75ba479f48d7680f740f2ec3d583dc', 'Patient', 'active'),
('Mikasa22', '13f5f20cc67f6910674614b8a03a24622f74b2ca5cd1f11fb9f0ae7f28dc77b7', 'Patient', 'active'),
('Qwerty', '73d5b2f4ba82d59c723c16a909524559d8f31e33c5d8fdcfc57065dca5c9f189', 'Patient', 'active'),
('Qwertyasdas', '73d5b2f4ba82d59c723c16a909524559d8f31e33c5d8fdcfc57065dca5c9f189', 'Patient', 'active'),
('Ram', '5eec0dc419aa8337bf725f026fda9c78c1cb1c642eeaff9d6e1112f37783e942', 'Patient', 'active'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

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
(70, '', '2015Macion', '2015Vargas', '02/25/2015 10:52 AM', 'Inqueue', 295),
(71, '', '2015Quinitip', '2015Vargas', '', 'Cancelled', 293),
(72, '', '2015Geronimo', '2015Vargas', '02/25/2015 10:54 AM', 'Inqueue', 295),
(73, '', '2015Quinitip', '2015Vargas', '02/27/2015 10:55 AM', 'Inqueue', 293);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `appointment_history`
--

INSERT INTO `appointment_history` (`appointment_history_id`, `appointment_status`, `doctor_id`, `patient_id`, `appointment_id`) VALUES
(34, 'Cancelled', '2015Quinitip', '2015Macam', 39),
(36, 'Cancelled', '2015Quinitip', '2015Macam', 39),
(51, 'Cancelled', '2015Quinitip', '2015Vargas', 71);

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
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` varchar(100) NOT NULL,
  `patient_name` text NOT NULL,
  `patient_contact` varchar(100) NOT NULL,
  `birthdate` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
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
('2015Geronimo', '2015Vargas', '2015Macion');

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
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`clinic_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`);

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
  ADD CONSTRAINT `referred_ibfk_3` FOREIGN KEY (`referred_id`) REFERENCES `doctor` (`doctor_id`),
  ADD CONSTRAINT `referred_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `referred_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`);

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
