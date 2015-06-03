-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2015 at 02:31 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `account_type` enum('Doctor','Patient','Secretary','Admin','FrontDesk') NOT NULL,
  `account_status` enum('active','inactive') NOT NULL,
  `last_logged_in` date NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`username`, `password`, `account_type`, `account_status`, `last_logged_in`) VALUES
('Admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'Admin', 'active', '0000-00-00'),
('agaton', '014a84c91500d9e40f3388b13ff8ec7ef6398911c720ef8852c5f7b8c9ef4325', 'Doctor', 'active', '0000-00-00'),
('ana', '24d4b96f58da6d4a8512313bbd02a28ebf0ca95dec6e4c86ef78ce7f01e788ac', 'Doctor', 'active', '2015-04-24'),
('anthony', '502913bfdd49eab564282dff101e6d167321237eeec66eedb2a438ed80fdeaa0', 'Doctor', 'active', '0000-00-00'),
('antonio', '4ee3679892e6ac5a5b513eba7fd529d363d7a96508421c5dbd44b01b349cf514', 'Doctor', 'active', '0000-00-00'),
('arlene', '382b34d681fca561eea04996874976b654ca18fbd502aad5f84de38ddf79b456', 'Doctor', 'active', '0000-00-00'),
('aurora', '9b89025ce7a6d932b28f6e15132a70d402f723874a425e9b4c7cc3b179fa66ce', 'Doctor', 'active', '0000-00-00'),
('bai', '4b2bb5736001eba2175cbaa5994e1e54a9b8803fa7ac6b5df931346f0ac8428b', 'Doctor', 'active', '0000-00-00'),
('bernadette', 'bbe7a727217b335afc5aa51084477fb693269a2a09e7c2e6d009594c8820baaa', 'Doctor', 'active', '0000-00-00'),
('cherrie', '58b644a5d21d950e877b4aaecf36a7f6ad6c934f695d063b8991759e6e93e70d', 'Doctor', 'active', '0000-00-00'),
('cj', '582e2c101742dcb179a712c1dc5fb4f7e30c796254b3739751a263db171b27f1', 'Patient', 'active', '2015-06-03'),
('damaso', 'bd19408422fea7f08db51acb869712d92917c5ad55f1a959a1411d2b04179090', 'Doctor', 'active', '0000-00-00'),
('dianski', 'd075b908d3afed217e2dbfc065c6ae825433df3487fc3a866f72a15dc3733964', 'Patient', 'active', '2015-06-03'),
('donnabel', 'a2d76681cb51a513827e8557824099cfc3f27b0089af7f9984b3d0b654050a80', 'Doctor', 'active', '0000-00-00'),
('DoReyes', '666f6e373b6b2cd09831a69365151a81048b02e6b52881c225da0badd93e963e', 'Secretary', 'active', '2015-06-02'),
('efren', 'cf0fff483ff377cb577616bc9e7a191138bb3fc8c811fd09a9a8c71e2542436a', 'Doctor', 'active', '0000-00-00'),
('erickson', 'c56f14104d177a2e57cd0b223a83fddedd46cfeb772db7c33df502bedab43307', 'Doctor', 'active', '0000-00-00'),
('eva', '02b15ef87562676a8a42f33af9a0ca6aa11e491abda98cec24e4eded61ffa78d', 'Doctor', 'active', '0000-00-00'),
('faith', '2b93b177b55445f513d73ff1f0f30376d6ec181bcc1bd5cd19cccb970f4ee0d2', 'Doctor', 'active', '0000-00-00'),
('fedelina', '0d2e40050fd723ffffec4f725d8ed0e3b99bb99166d2a15fef24d29e752a4ea6', 'Doctor', 'active', '0000-00-00'),
('florence', 'f902def4855ca65edd49983167186a7d9e9ea3386078ef59ce92970d291b2b8e', 'Doctor', 'active', '0000-00-00'),
('francis', 'fe384adb7e67d54e973c65b0174e3de5d8288e483958da561d39c98ddb1cc5d4', 'Doctor', 'active', '0000-00-00'),
('Frontdesk', 'a300100818c74032b2bbcc4ef172702df27540fe737e49743a39ec2fba02c0a4', 'FrontDesk', 'active', '0000-00-00'),
('gay', '586acb3c6bac489308c0938f762da702573a714dfdf3a729dcb40758b4c363ae', 'Doctor', 'active', '0000-00-00'),
('gemma', '3fb22a5597fb91ee4f9abbf30ea69d318be150e0fcf3ca1db8ca334b520d2894', 'Doctor', 'active', '0000-00-00'),
('gene', '5ac52c67c10a6cea6daa62876e90a9dcf62523352f0876dad99c55788392849a', 'Doctor', 'active', '2015-06-03'),
('hosanna', 'bfff9525aacb6b9226129a28afc1c6d68b3a3a990c8fd761d2ea9c6be04a1d7a', 'Doctor', 'active', '0000-00-00'),
('james', '119c9ae6f9ca741bd0a76f87fba0b22cab5413187afb2906aa2875c38e213603', 'Doctor', 'active', '0000-00-00'),
('jc', '36a560e1409d01df8587517706d5fc6f5fade8c6fec7d0ff71e4ae56534986e2', 'Patient', 'active', '2015-04-23'),
('jean', '4ff17bc8ee5f240c792b8a41bfa2c58af726d83b925cf696af0c811627714c85', 'Doctor', 'active', '0000-00-00'),
('jeanette', '853dbc39c711e07347cfb240f4dd4905f3d2d83e5a14397030449f3737face9f', 'Doctor', 'active', '0000-00-00'),
('jeanne', '397b0066107f06a1f9025849f51e5e9d13075bddd40945bbaf011bbe94e6b524', 'Doctor', 'active', '0000-00-00'),
('josie', 'd118e41faea4e000917a87021e4945508af18168985cb7d9dce1bba3ba390e43', 'Doctor', 'active', '0000-00-00'),
('julieta', 'f7e49508125cdd4865a9336abbb85e855bb50373a14ca6dbf31b9a725ea89b6b', 'Doctor', 'active', '0000-00-00'),
('julio', '901be86d450c504e8555ffeeeab1e06b926c8785fd99ef382c1310b7c66bc167', 'Doctor', 'active', '0000-00-00'),
('karla', '1cfcffbd0d0536e2b354a0bbe9a0df8f7c15b26293e99ce5bd468e1716154295', 'Doctor', 'active', '0000-00-00'),
('lee', '1508b697895abf03d55c3841f59236ab92c9ba6ba89795c8337fcf392fdee8b4', 'Doctor', 'active', '0000-00-00'),
('mari', 'fbc835d2c63c85a2af298286581b9b77e8f1d5436a7ccbe391fceecce2a4729e', 'Doctor', 'active', '0000-00-00'),
('maria', '94aec9fbed989ece189a7e172c9cf41669050495152bc4c1dbf2a38d7fd85627', 'Doctor', 'active', '0000-00-00'),
('marie', 'c6d17a3613b9914e68707fcfac8410f097643bc5840681bb533030d73cbb18f8', 'Doctor', 'active', '0000-00-00'),
('mark', '6201eb4dccc956cc4fa3a78dca0c2888177ec52efd48f125df214f046eb43138', 'Doctor', 'active', '0000-00-00'),
('mary', '6915771be1c5aa0c886870b6951b03d7eafc121fea0e80a5ea83beb7c449f4ec', 'Doctor', 'active', '0000-00-00'),
('matthew', '68be7550846ecd878947b4eb0ac13d3cca3cf6c4940c94d90163e0a15e947203', 'Doctor', 'active', '0000-00-00'),
('melanie', 'dfef5e53f9848472560a3e680a310d097ecc75919740646df38d31cab7aa07ac', 'Doctor', 'active', '0000-00-00'),
('melissa', '8def3bf5d78abb247b4829e87b52b10d79b1cd0e2aec529930ed692ee8d1cd2c', 'Doctor', 'active', '0000-00-00'),
('mylene', '56079de81f26ad3e35d6fd8923462f9114bd448315fb980cdd4799245c0a0923', 'Doctor', 'active', '0000-00-00'),
('nadette', '1ff4c6afdbe4cb9abb3bfd266060a87d0522035545ffe054346e5f445d73a5d0', 'Doctor', 'active', '0000-00-00'),
('nadine', '3af8e4b69bdc2acdabfabc682417cc1d53b84d0437aeb3787a054bfc68d9b2d4', 'Doctor', 'active', '0000-00-00'),
('neil', '4bbfa1f1b0462b4844b74c34fdd297aba2a82ac2355e64308578f5acf1f5e8bf', 'Doctor', 'active', '0000-00-00'),
('orlando', '05ef130c628dac6868d8ab9a08049009d414ceaae8b90e2b0ebb3c5d4c80da6f', 'Doctor', 'active', '0000-00-00'),
('pamela', 'cbbcacaf0d582e760874a68b44c572218102a1d24fa262b00dc7f090c7257302', 'Doctor', 'active', '0000-00-00'),
('ranelyn', '579a5959c740f72f662e68419f5ba68ce4dad72e07e727d3d9338f11766eec83', 'Doctor', 'active', '0000-00-00'),
('ria', '543a37820bd6021085abf00b6ca801c9ec9bb025acdf7afb34de50d9988c12a4', 'Doctor', 'active', '0000-00-00'),
('rita', 'c5420b43786b20f6cd116002a483b128e9d24020852c5e1c53731e25f40217f0', 'Doctor', 'active', '0000-00-00'),
('rosario', 'db26ce04fc0e235ae037a334d7e939ea6dedc4ff234fc5e5578fda274d578550', 'Doctor', 'active', '0000-00-00'),
('rose', '618d663af0f1ec88a5a19defa65a2f80d06582a832510b12f475d80870bdb3ab', 'Doctor', 'active', '0000-00-00'),
('sheila', '8d20e19b8fc57df7cf425bb96337dd498403f13124ffc22bcd1cba5d9e8445d2', 'Doctor', 'active', '0000-00-00'),
('silva', 'd24e913a4107af875dc2ac3d419798f3794d00434e5059fbb68ac8d33626eaee', 'Doctor', 'active', '0000-00-00'),
('via', '4d327af41f96c23c6b13c8c80e1591babd241b29e61fb64f1c0ea480f3d666bc', 'Doctor', 'active', '0000-00-00'),
('victoria', 'ab1cb712f2dca756105160805501f4d6d8657d93d40b16eee4ecb5fd048d26eb', 'Doctor', 'active', '0000-00-00'),
('wilma', '40badc66889cd2b74037c3731ecbc21073b924a8f1678a02ea59f0766dcd73d2', 'Doctor', 'active', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `announcement_id` int(30) NOT NULL AUTO_INCREMENT,
  `subject` text NOT NULL,
  `announcement_details` text NOT NULL,
  `start_publish` date NOT NULL,
  `end_publish` date NOT NULL,
  `send_to` varchar(30) NOT NULL,
  `date_created` date NOT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `appointment_id` int(30) NOT NULL AUTO_INCREMENT,
  `remarks` text NOT NULL,
  `doctor_id` varchar(30) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `appoint_date` date NOT NULL,
  `appointment_status` enum('Cancelled','Completed','Referred','Inqueue') NOT NULL,
  `clinic_id` int(30) NOT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `doctor_id_2` (`doctor_id`),
  KEY `patient_id` (`patient_id`),
  KEY `clinic_id` (`clinic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `remarks`, `doctor_id`, `patient_id`, `appoint_date`, `appointment_status`, `clinic_id`) VALUES
(8, '', 'e9c7556', 'e9ab3eb', '2015-06-03', 'Cancelled', 50),
(9, '', 'e9c7556', '07033ef', '2015-06-03', 'Cancelled', 50),
(10, '', 'e9c7556', 'e9ab3eb', '2015-06-03', 'Inqueue', 50),
(11, '', '021137d', 'e9ab3eb', '2015-06-03', 'Cancelled', 32),
(12, '', '6ec6e9a', 'e9ab3eb', '2015-06-03', 'Inqueue', 12),
(13, '', '021137d', 'e9ab3eb', '2015-07-01', 'Cancelled', 32);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_history`
--

CREATE TABLE IF NOT EXISTS `appointment_history` (
  `appointment_history_id` int(30) NOT NULL AUTO_INCREMENT,
  `description` enum('Cancelled','Completed','Referred','Unattended') NOT NULL,
  `appointment_id` int(30) NOT NULL,
  PRIMARY KEY (`appointment_history_id`),
  KEY `appointment_id` (`appointment_id`),
  KEY `doctor_id` (`appointment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `appointment_history`
--

INSERT INTO `appointment_history` (`appointment_history_id`, `description`, `appointment_id`) VALUES
(1, 'Cancelled', 8),
(2, 'Cancelled', 9),
(3, 'Cancelled', 11),
(4, 'Cancelled', 13);

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE IF NOT EXISTS `clinic` (
  `clinic_id` int(30) NOT NULL AUTO_INCREMENT,
  `clinic_location` varchar(200) NOT NULL,
  `clinic_name` varchar(50) NOT NULL,
  `clinic_contact` text NOT NULL,
  `doctor_id` varchar(30) NOT NULL,
  `cut_off_no` int(30) NOT NULL,
  PRIMARY KEY (`clinic_id`),
  KEY `doctor_id` (`doctor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`clinic_id`, `clinic_location`, `clinic_name`, `clinic_contact`, `doctor_id`, `cut_off_no`) VALUES
(1, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '0b8f49e', 50),
(2, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '0ce4592', 50),
(3, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '0e8ed04', 50),
(4, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '0ebedfb', 50),
(5, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '2b4c9d3', 50),
(6, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '2c434b6', 50),
(7, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '3e2aafa', 50),
(8, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '4be5a10', 50),
(9, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '4d6a95f', 50),
(10, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '5e40673', 50),
(11, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '6aa29f6', 50),
(12, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '6ec6e9a', 50),
(13, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '22cb835', 50),
(14, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '31c6ed6', 50),
(15, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '45b556c', 50),
(16, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '48fc5bb', 50),
(17, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '65c029f', 50),
(18, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '71f7abe', 50),
(19, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '338afc3', 50),
(20, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '461ccb1', 50),
(21, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '550bc3c', 50),
(22, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '600d345', 50),
(23, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '797b87b', 50),
(24, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '891eaac', 50),
(25, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '2606b83', 50),
(26, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '6944d8c', 50),
(27, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '6976c35', 50),
(28, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '7326a8d', 50),
(29, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '7727bfa', 50),
(30, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '9981f20', 50),
(31, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '10746be', 50),
(32, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', '021137d', 50),
(33, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'a5a3b47', 50),
(34, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'a905fd7', 50),
(35, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'aa4aff0', 50),
(36, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'abfb6f8', 50),
(37, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'b925d54', 50),
(38, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'baabb4d', 50),
(39, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'bf3b892', 50),
(40, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'bfb378d', 50),
(41, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'c319fab', 50),
(42, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'caf2be4', 50),
(43, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'd6c83be', 50),
(44, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'd8d431d', 50),
(45, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'd26c6b1', 50),
(46, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'd8555f9', 50),
(47, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'daa1155', 50),
(48, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'dffd433', 50),
(49, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'e5ea554', 50),
(50, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'e9c7556', 50),
(51, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'e384c60', 50),
(52, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'f2ef4af', 50),
(53, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'f7f70aa', 50),
(54, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'fa8a029', 50),
(55, 'Sm Luneta Hill, Baguio City', 'Benguet Laboratories', '124345', 'fa81b3d', 50),
(57, 'Baguio', 'Happy Homes', '329423-323', 'c319fab', 50);

-- --------------------------------------------------------

--
-- Table structure for table `clinic_schedule`
--

CREATE TABLE IF NOT EXISTS `clinic_schedule` (
  `clinic_id` int(30) NOT NULL,
  `doctor_id` varchar(30) NOT NULL,
  `time` varchar(40) NOT NULL,
  `days` varchar(30) NOT NULL,
  `room_number` varchar(30) NOT NULL,
  PRIMARY KEY (`clinic_id`,`doctor_id`),
  KEY `doctor_id` (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinic_schedule`
--

INSERT INTO `clinic_schedule` (`clinic_id`, `doctor_id`, `time`, `days`, `room_number`) VALUES
(1, '0b8f49e', '10:00-12:00/10:00-12:00', 'Tue/Fri', 'Room 4/Room 3'),
(2, '0ce4592', '5:00-7:00', 'Mon/Sat', 'Room 3'),
(3, '0e8ed04', '5:00-7:00', 'Mon/Fri/Sat', 'Room 4'),
(4, '0ebedfb', '10:00-1:00', 'Fri', 'Room 1'),
(5, '2b4c9d3', '10:00-12:00', 'Sun', 'Room 10'),
(6, '2c434b6', '2:00-4:00', 'Mon/Sat', 'Room 3'),
(7, '3e2aafa', '10:00-12:00/5:00-7:00', 'Tue/Thu/Wed', 'Room 3/Room 4'),
(8, '4be5a10', '12:00-2:00', 'Mon/Fri', 'Room 6'),
(9, '4d6a95f', '11:00-2:00/4:00-6:00', 'Mon/Sat', 'Room 4'),
(10, '5e40673', '6:00-8:00', 'Tue/Thu/Sun', 'Room 7'),
(11, '6aa29f6', '10:00-5:00/10:00-1:00', 'Mon/Fri/Sat', 'Room 7'),
(12, '6ec6e9a', '5:00-7:00/4:00-6:00', 'Mon/Wed/Sat', 'Room 2'),
(13, '22cb835', '10:00-12:00', 'Sat', 'Room 10'),
(14, '31c6ed6', '8:00-10:00', 'Mon/Sat', 'Room 6'),
(15, '45b556c', '12:00-2:00', 'Mon/Tue/Thu', 'Room 3'),
(16, '48fc5bb', '10:00-1:00', 'Mon/Wed/Sat', 'Room 1'),
(17, '65c029f', '5:00-7:00', 'Tue', 'Room 10'),
(18, '71f7abe', '10:00-12:00', 'Sat', 'Room 10'),
(19, '338afc3', '4:00-6:00', 'Tue/Thu', 'Room 1'),
(20, '461ccb1', '10:00-1:00', 'Mon/Tue/Fri/Sat', 'Room 11'),
(21, '550bc3c', '2:00-4:00', 'Sun', 'Room 10'),
(22, '600d345', '10:00-12:00', 'Mon/Sat', 'Room 8'),
(23, '797b87b', '10:00-12:00', 'Wed-Sat', 'Room 2'),
(24, '891eaac', '2:00-5:00', 'Sat', 'Room 10'),
(25, '2606b83', '1:00-4:00', 'Tue/Thu', 'Room 1'),
(26, '6944d8c', '5:00-7:00', 'Tue/Thu/Fri', 'Room 2'),
(27, '6976c35', '10:00-12:00', 'Wed/Thu', 'Room 11'),
(28, '7326a8d', '10:00-12:00/12:00-2:00/10:00-12:00', 'Mon/Wed/Sun', 'Room 2/Room 3/Room 3'),
(29, '7727bfa', '2:00-5:00', 'Mon/Thu', 'Room 10'),
(30, '9981f20', '10:00-12:00', 'Mon/Wed/Thu/Fri/Sat', 'Room 4'),
(31, '10746be', '10:00-12:00/2:00-4:00', 'Tue/Fri', 'Room 2/Room 10 '),
(32, '021137d', '2:00-4:00/2:00-4:00', 'Wed/Sat', 'Room 1/Room 4'),
(33, 'a5a3b47', '10:00-2:00/(GP) 10:00-4:00', 'Mon/Sun', 'Room 3/Room 4'),
(34, 'a905fd7', '1:00-4:00', 'Sun', 'Room 1'),
(35, 'aa4aff0', '5:00-7:00', 'Mon/Wed/Fri', 'Room 10'),
(36, 'abfb6f8', '2:00-4:00', 'Mon/Fri', 'Room 4'),
(37, 'b925d54', '10:00-4:00', 'Sun', 'Room 2'),
(38, 'baabb4d', '2:00-4:00', 'Mon/Tue/Thu/Fri/Sat', 'Room 1'),
(39, 'bf3b892', '8:00-7:00', 'Mon', 'Room 5'),
(40, 'bfb378d', '10:00-2:00', 'Mon/Fri', 'Room 10'),
(41, 'c319fab', '4:00-5:00', 'Mon/Wed/Fri', 'Room 1'),
(42, 'caf2be4', '3:00-5:00', 'Tue', 'Room 10'),
(43, 'd6c83be', '2:00-4:00', 'Sun', 'Room 3'),
(44, 'd8d431d', '2:00-5:00', 'Mon/Sat', 'Room 1'),
(45, 'd26c6b1', '2:00-5:00', 'Mon', 'Room 10'),
(46, 'd8555f9', '2:00-5:00', 'Mon/Sat', 'Room 8'),
(47, 'daa1155', '5:00-7:00', 'Tue/Thu', 'Room 4'),
(48, 'dffd433', '8:00-10:00', 'Mon', 'Room 1'),
(49, 'e5ea554', '12:00-2:00/4:00-6:00', 'Sat/Sun', 'Room 4'),
(50, 'e9c7556', '10:00-12:00', 'Wed/Sat', 'Room 3'),
(51, 'e384c60', '9:00-12:00', 'Sat', 'Room 4'),
(52, 'f2ef4af', '9:00-10:00', 'Mon/Sat', 'Room 4'),
(53, 'f7f70aa', '4:00-6:00', 'Sun', 'Room 1'),
(54, 'fa8a029', '10:00-12:00', 'Sun', 'Room 10'),
(55, 'fa81b3d', '6:30-7:00/10:00-12:00', 'Tue/Thu/Sun', 'Room 11/Room 11'),
(57, 'c319fab', '4-5', 'Wed/Thu', 'S433');

-- --------------------------------------------------------

--
-- Table structure for table `clinic_sec`
--

CREATE TABLE IF NOT EXISTS `clinic_sec` (
  `clinic_id` int(30) NOT NULL,
  `secretary_id` varchar(30) NOT NULL,
  KEY `clinic_id` (`clinic_id`),
  KEY `secretary_id` (`secretary_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinic_sec`
--

INSERT INTO `clinic_sec` (`clinic_id`, `secretary_id`) VALUES
(41, 'e022a5e');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `doctor_id` varchar(30) NOT NULL,
  `doctor_name` varchar(30) NOT NULL,
  `specialization` text NOT NULL,
  `doctor_status` enum('In','Out','Break') NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  PRIMARY KEY (`doctor_id`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doctor_name`, `specialization`, `doctor_status`, `email`, `username`) VALUES
('021137d', 'Anthony Vanadero', 'ENT', 'Out', 'avanaderomd@yahoo.com', 'anthony'),
('0b8f49e', 'Hosanna Mae Pajela', 'FM/GP/PCOM', 'Out', 'maepajela@yahoo.com', 'hosanna'),
('0ce4592', 'Cherrie Ann Moreno', 'OB Gyne', 'In', 'almostfully@gmail.com', 'cherrie'),
('0e8ed04', 'Sheila Via Marie Mapalo', 'FM/GP/PCOM', 'Out', 'svmpmmd@gmail.com', 'via'),
('0ebedfb', 'Ria Baby Requiero', 'Nephrology', 'In', 'riarequiero@yahoo.com', 'ria'),
('10746be', 'Erickson Madronio', 'Endocrinology', 'Out', 'doc_eric79@yahoo.com', 'erickson'),
('22cb835', 'Neil Lee Ambasing', 'Neurology', 'In', 'NEWLOSANGELES2001@yahoo.com', 'lee'),
('2606b83', 'Annie Rita Del Rosario', 'Surgery', 'In', 'annieacmor@yahoo.com', 'rita'),
('2b4c9d3', 'Donnabel Tubera', 'Epidemiology', 'In', 'donnabel_md@yahoo.com', 'donnabel'),
('2c434b6', 'Rosemarie Raper', 'Pediatrician', 'In', 'rj_raper@yahoo.com', 'rose'),
('31c6ed6', 'Melissa Ompico', 'Pediatrician', 'In', 'ompico@yahoo.com', 'melissa'),
('338afc3', 'Francis Yabut', 'Urology', 'Break', 'francisyabut@yahoo.com', 'francis'),
('3e2aafa', 'Melanie Clemente', 'FM/GP/PCOM', 'In', 'melclemente1980@yahoo.com', 'melanie'),
('45b556c', 'Fedelina Suanding', 'OB Gyne', 'Out', 'fedepengs@yahoo.com', 'fedelina'),
('461ccb1', 'Julio Eming', 'ENT', 'Out', 'emingjulio@yahoo.com', 'julio'),
('48fc5bb', 'Justiniano Bai', 'Orthopedics', 'In', 'baiyuis@yahoo.com', 'bai'),
('4be5a10', 'Rosario Laranang', 'OB Gyne', 'In', 'none', 'rosario'),
('4d6a95f', 'Efren Balanag', 'Pediatrician', 'In', 'efrenbalanag1@yahoo.com', 'efren'),
('550bc3c', 'Ma. Victoria Palor', 'Orthopedics/GP', 'In', 'mvspalor26@yahoo.com', 'victoria'),
('5e40673', 'Florence Dela Pena', 'CFP/PCOM', 'Out', 'floy.rhenz@yahoo.com', 'florence'),
('600d345', 'Karla Rhea Posadas', 'Cardiology', 'In', 'karlarilleramd@yahoo.com', 'karla'),
('65c029f', 'Marie Ellaine Velasquez', 'Gastroenterology', 'In', 'pruellaine2005@yahoo.com', 'marie'),
('6944d8c', 'Jean Pierre Leung', 'Orthopedics', 'Out', 'jpleung@hotmail.com', 'jean'),
('6976c35', 'Silva Tsuchiya', 'Neuro-Psychiatry', 'Out', 'iamsilv@gmail.com', 'silva'),
('6aa29f6', 'Eva Gregoria Quiano', 'FM/GP/IM', 'Out', 'none', 'eva'),
('6ec6e9a', 'Antonio Nicanor B. Suero', 'Orthopedics', 'In', 'nicsuero@gmail.com', 'antonio'),
('71f7abe', 'Neil Ambasing', 'Neurology', 'Out', 'NEWLOSANGELES2001@yahoo.com', 'neil'),
('7326a8d', 'Ranelyn Lozanes', 'OB Gyne', 'In', 'ranelynlozanes@yahoo.com', 'ranelyn'),
('7727bfa', 'Gemma Pinlac', 'Nephrology', 'In', 'Gemma_pin@yahoo.com.ph', 'gemma'),
('797b87b', 'Bernadette Lizada', 'OB Gyne', 'Out', 'bernadettelizada@yahoo.com', 'nadette'),
('891eaac', 'Mark Anthony Valdez', 'GP', 'Out', 'Markanthonyvaldez@yahoo.com', 'mark'),
('9981f20', 'Josie Rivera', 'FM/GP/PCOM', 'Out', 'jorivera419@yahoo.com', 'josie'),
('a5a3b47', 'Sheila Marie Esther Villanueva', 'FM/GP/PCOM', 'Out', 'smevillanueva@yahoo.com', 'sheila'),
('a905fd7', 'James Luz', 'Opthalmology', 'Out', 'none', 'james'),
('aa4aff0', 'Aurora Hidalgo', 'Dermatology', 'In', 'none', 'aurora'),
('abfb6f8', 'Agaton Yaranon', 'Pulmunology', 'In', 'agayarn@gmail.com', 'agaton'),
('b925d54', 'Mari Grace Judith Yabut', 'Pediatrician', 'Out', 'marigracey@yahoo.com', 'mari'),
('baabb4d', 'Mary Margaret Apolinar', 'Infectious Disease', 'Out', 'none', 'mary'),
('bf3b892', 'Orlando Aragon', 'UTZ', 'Break', 'none', 'orlando'),
('bfb378d', 'Nadine Tello', 'Opthalmology', 'Out', 'npadsoyan@yahoo.com', 'nadine'),
('c319fab', 'Gene Estandian', 'Constructive Surgery', 'In', 'gestandianmd@yahoo.com', 'gene'),
('caf2be4', 'Matthew Bawayan', 'Surgery', 'Out', 'drmath_2006@yahoo.com', 'matthew'),
('d26c6b1', 'Mary Gay Buliyat', 'Oncology', 'In', 'none', 'gay'),
('d6c83be', 'Wilma Lee', 'OB Gyne', 'In', 'wilmamia@yahoo.com', 'wilma'),
('d8555f9', 'Julieta Calaycay', 'Opthalmology', 'In', 'julietacalaycay@yahoo.com', 'julieta'),
('d8d431d', 'Faith Kishi Generao', 'Dermatology', 'In', 'none', 'faith'),
('daa1155', 'Bernadette Arzadon', 'FM/GP/PCOM', 'Out', 'badette_fc@yahoo.com', 'bernadette'),
('dffd433', 'Damaso Bangaoet', 'Pulmunology', 'In', 'none', 'damaso'),
('e384c60', 'Maria Lourdes Pakoy', 'GP/Animal Bite', 'Out', 'maloumpakoy@yahoo.com', 'maria'),
('e5ea554', 'Jeanne Quibin', 'Internal Medicine', 'In', 'jdquibin@gmail.com', 'jeanne'),
('e9c7556', 'Ana Claire Pagnas', 'FM/GP/PCOM', 'In', 'anaclairepagnas@gmail.com', 'ana'),
('f2ef4af', 'Pamela Chu', 'OB Gyne', 'In', 'pamchu2008@yahoo.com', 'pamela'),
('f7f70aa', 'Arlene Baguilat', 'Pediatrician', 'Out', 'aft_baguilat@yahoo.com', 'arlene'),
('fa81b3d', 'Jean Jeanette Sibayan', 'Psychology', 'In', 'jjdj_sibayan@yahoo.com', 'jeanette'),
('fa8a029', 'Mylene  Genuino', 'Cardiology', 'In', 'mysnavarro@yahoo.com', 'mylene');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `indicator` varchar(30) NOT NULL,
  `doctor_id` varchar(30) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `legend_id` varchar(30) NOT NULL,
  `notification_date` date NOT NULL,
  `notification` text NOT NULL,
  PRIMARY KEY (`notification_id`),
  KEY `notif_id` (`legend_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `indicator`, `doctor_id`, `patient_id`, `legend_id`, `notification_date`, `notification`) VALUES
(2, 'patient', '2606b83', 'e9ab3eb', 'n1004', '2015-06-02', 'A patient has requested an appointment.'),
(3, 'patient', '021137d', '07033ef', 'n1004', '2015-06-03', 'A patient has requested an appointment.'),
(4, 'patient', '021137d', '07033ef', 'n1004', '2015-06-03', 'A patient has cancelled his appointment.'),
(5, 'patient', '021137d', '07033ef', 'n1004', '2015-06-03', 'A patient has requested an appointment.'),
(6, 'patient', '021137d', '07033ef', 'n1004', '2015-06-03', 'A patient has cancelled his appointment.'),
(7, 'patient', 'e9c7556', '07033ef', 'n1004', '2015-06-03', 'A patient has requested an appointment.'),
(8, 'patient', 'e9c7556', '07033ef', 'n1004', '2015-06-03', 'A patient has cancelled his appointment.'),
(9, 'patient', 'e9c7556', '07033ef', 'n1004', '2015-06-03', 'A patient has requested an appointment.'),
(10, 'patient', 'e9c7556', '07033ef', 'n1004', '2015-06-03', 'A patient has cancelled his appointment.'),
(11, 'patient', 'e9c7556', '07033ef', 'n1004', '2015-06-03', 'A patient has requested an appointment.'),
(12, 'patient', 'e9c7556', '07033ef', 'n1004', '2015-06-03', 'A patient has cancelled his appointment.'),
(13, 'patient', '021137d', '07033ef', 'n1004', '2015-06-03', 'A patient has requested an appointment.'),
(14, 'patient', '021137d', '07033ef', 'n1004', '2015-06-03', 'A patient has cancelled his appointment.'),
(15, 'patient', 'e9c7556', 'e9ab3eb', 'n1004', '2015-06-03', 'A patient has requested an appointment.'),
(16, 'patient', 'e9c7556', 'e9ab3eb', 'n1004', '2015-06-03', 'A patient has requested an appointment.'),
(17, 'patient', 'e9c7556', '07033ef', 'n1004', '2015-06-03', 'A patient has requested an appointment.'),
(18, 'patient', 'e9c7556', 'e9ab3eb', 'n1004', '2015-06-03', 'A patient has cancelled his appointment.'),
(19, 'patient', 'e9c7556', '07033ef', 'n1004', '2015-06-03', 'A patient has cancelled his appointment.'),
(20, 'patient', 'e9c7556', 'e9ab3eb', 'n1004', '2015-06-03', 'A patient has requested an appointment.'),
(21, 'patient', '021137d', 'e9ab3eb', 'n1004', '2015-06-03', 'A patient has requested an appointment.'),
(22, 'patient', '6ec6e9a', 'e9ab3eb', 'n1004', '2015-06-03', 'A patient has requested an appointment.'),
(23, 'patient', '021137d', 'e9ab3eb', 'n1004', '2015-06-03', 'A patient has cancelled his appointment.'),
(24, 'patient', '021137d', 'e9ab3eb', 'n1004', '2015-06-03', 'A patient has requested an appointment.'),
(25, 'patient', '021137d', 'e9ab3eb', 'n1004', '2015-06-03', 'A patient has cancelled his appointment.');

-- --------------------------------------------------------

--
-- Table structure for table `notification_legend`
--

CREATE TABLE IF NOT EXISTS `notification_legend` (
  `legend_id` varchar(100) NOT NULL,
  `color` enum('red','orange','green','blue') NOT NULL,
  `explanation` text NOT NULL,
  PRIMARY KEY (`legend_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_legend`
--

INSERT INTO `notification_legend` (`legend_id`, `color`, `explanation`) VALUES
('n1001', 'red', ''),
('n1002', 'orange', ''),
('n1003', 'green', ''),
('n1004', 'blue', '');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` varchar(30) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `patient_contact` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `occupation` text,
  PRIMARY KEY (`patient_id`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_name`, `patient_contact`, `birthdate`, `email`, `username`, `occupation`) VALUES
('07033ef', 'Dianne Ragadio', '0942342431', '2005-11-13', 'diansk@gmail.com', 'dianski', 'Student'),
('d4e5996', 'Jhennie Prado', '982334454', '1985-08-12', 'prado@hotmail.com', 'jc', 'teacher'),
('e9ab3eb', 'Cj Tayab', '1234567891', '1916-09-17', 'asd@gmail.com', 'cj', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `queue_notif`
--

CREATE TABLE IF NOT EXISTS `queue_notif` (
  `queue_id` int(100) NOT NULL,
  `clinic_id` int(30) NOT NULL,
  `appointment_id` int(30) NOT NULL,
  `appoint_date` date NOT NULL,
  KEY `appointment_id` (`appointment_id`),
  KEY `clinic_id` (`clinic_id`),
  KEY `queue_id` (`queue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queue_notif`
--

INSERT INTO `queue_notif` (`queue_id`, `clinic_id`, `appointment_id`, `appoint_date`) VALUES
(4, 50, 8, '2015-06-03'),
(1, 12, 12, '2015-06-03');

-- --------------------------------------------------------

--
-- Table structure for table `refer_patient`
--

CREATE TABLE IF NOT EXISTS `refer_patient` (
  `referral_id` int(30) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(30) NOT NULL,
  `original_doctor` varchar(30) NOT NULL,
  `substitute_doctor` varchar(30) NOT NULL,
  PRIMARY KEY (`referral_id`),
  KEY `patient_id` (`patient_id`),
  KEY `substitute_doctor` (`substitute_doctor`),
  KEY `original_doctor` (`original_doctor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `secretary`
--

CREATE TABLE IF NOT EXISTS `secretary` (
  `secretary_id` varchar(30) NOT NULL,
  `secretary_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `doctor_id` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  PRIMARY KEY (`secretary_id`),
  KEY `doctor_id` (`doctor_id`,`username`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `secretary`
--

INSERT INTO `secretary` (`secretary_id`, `secretary_name`, `email`, `doctor_id`, `username`) VALUES
('e022a5e', 'Donna Reyes', '', 'c319fab', 'DoReyes');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE IF NOT EXISTS `subscribe` (
  `doctor_id` varchar(30) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  KEY `doctor_id` (`doctor_id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `walk_in`
--

CREATE TABLE IF NOT EXISTS `walk_in` (
  `walk_in_id` int(30) NOT NULL,
  `clinic_id` int(30) NOT NULL,
  `appointW_date` date NOT NULL,
  `doctor_id` varchar(30) NOT NULL,
  `walk_in` int(30) NOT NULL AUTO_INCREMENT,
  `appointmentW_status` enum('Inqueue','Completed','Cancelled') NOT NULL,
  `walk_in_name` text NOT NULL,
  PRIMARY KEY (`walk_in`),
  KEY `doctor_id` (`doctor_id`),
  KEY `clinic_id` (`clinic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `walk_in`
--

INSERT INTO `walk_in` (`walk_in_id`, `clinic_id`, `appointW_date`, `doctor_id`, `walk_in`, `appointmentW_status`, `walk_in_name`) VALUES
(1, 50, '2015-06-03', 'e9c7556', 1, 'Cancelled', 'Dsf Sdfs'),
(2, 50, '2015-06-03', 'e9c7556', 3, 'Inqueue', 'Sdfsd Fsdfs'),
(3, 50, '2015-06-03', 'e9c7556', 4, 'Inqueue', 'Dfs Sdfds'),
(1, 44, '2015-06-03', 'd8d431d', 5, 'Inqueue', 'Fdg Dg'),
(5, 50, '2015-06-03', 'e9c7556', 6, 'Inqueue', 'Dfds Gfd');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_4` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`),
  ADD CONSTRAINT `appointment_ibfk_5` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `appointment_ibfk_6` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`clinic_id`) ON UPDATE CASCADE;

--
-- Constraints for table `appointment_history`
--
ALTER TABLE `appointment_history`
  ADD CONSTRAINT `appointment_history_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointment` (`appointment_id`);

--
-- Constraints for table `clinic`
--
ALTER TABLE `clinic`
  ADD CONSTRAINT `clinic_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clinic_schedule`
--
ALTER TABLE `clinic_schedule`
  ADD CONSTRAINT `clinic_schedule_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `clinic_schedule_ibfk_2` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`clinic_id`) ON UPDATE CASCADE;

--
-- Constraints for table `clinic_sec`
--
ALTER TABLE `clinic_sec`
  ADD CONSTRAINT `clinic_sec_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`clinic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clinic_sec_ibfk_2` FOREIGN KEY (`secretary_id`) REFERENCES `secretary` (`secretary_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`legend_id`) REFERENCES `notification_legend` (`legend_id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `queue_notif`
--
ALTER TABLE `queue_notif`
  ADD CONSTRAINT `queue_notif_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`clinic_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `queue_notif_ibfk_2` FOREIGN KEY (`appointment_id`) REFERENCES `appointment` (`appointment_id`) ON DELETE CASCADE;

--
-- Constraints for table `refer_patient`
--
ALTER TABLE `refer_patient`
  ADD CONSTRAINT `refer_patient_ibfk_5` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `refer_patient_ibfk_6` FOREIGN KEY (`original_doctor`) REFERENCES `doctor` (`doctor_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `refer_patient_ibfk_7` FOREIGN KEY (`substitute_doctor`) REFERENCES `doctor` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `secretary`
--
ALTER TABLE `secretary`
  ADD CONSTRAINT `secretary_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `secretary_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON UPDATE CASCADE;

--
-- Constraints for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD CONSTRAINT `subscribe_ibfk_3` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`),
  ADD CONSTRAINT `subscribe_ibfk_4` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `walk_in`
--
ALTER TABLE `walk_in`
  ADD CONSTRAINT `walk_in_ibfk_1` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`clinic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `walk_in_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
