-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2015 at 03:03 AM
-- Server version: 5.6.17-log
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
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
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
('agaton', '014a84c91500d9e40f3388b13ff8ec', 'Doctor', 'active'),
('ana', '24d4b96f58da6d4a8512313bbd02a2', 'Doctor', 'active'),
('annie', '71be92cbdfe91357146afad81827a9', 'Doctor', 'active'),
('antonio', '4ee3679892e6ac5a5b513eba7fd529', 'Doctor', 'active'),
('arlene', '382b34d681fca561eea04996874976', 'Doctor', 'active'),
('aurora', '9b89025ce7a6d932b28f6e15132a70', 'Doctor', 'active'),
('baby', 'a3ca38ef0e8554b39ce6fd34b011f9', 'Doctor', 'active'),
('bernadette', 'bbe7a727217b335afc5aa51084477f', 'Doctor', 'active'),
('cherrie', '58b644a5d21d950e877b4aaecf36a7', 'Doctor', 'active'),
('CJTayab', 'secretlang', 'Patient', 'active'),
('ClaudineGutierrez', 'Anakngpating', 'Secretary', 'active'),
('damaso', 'bd19408422fea7f08db51acb869712', 'Doctor', 'active'),
('DenmarkMacam', 'Adik4Abe', 'Patient', 'active'),
('DianneRagadio', 'mushrooms', 'Secretary', 'active'),
('donnabel', 'a2d76681cb51a513827e8557824099', 'Doctor', 'active'),
('efren', 'cf0fff483ff377cb577616bc9e7a19', 'Doctor', 'active'),
('erickson', 'c56f14104d177a2e57cd0b223a83fd', 'Doctor', 'active'),
('eva', '02b15ef87562676a8a42f33af9a0ca', 'Doctor', 'active'),
('faith', '2b93b177b55445f513d73ff1f0f303', 'Doctor', 'active'),
('fedelina', '0d2e40050fd723ffffec4f725d8ed0', 'Doctor', 'active'),
('florence', 'f902def4855ca65edd49983167186a', 'Doctor', 'active'),
('francis', 'fe384adb7e67d54e973c65b0174e3d', 'Doctor', 'active'),
('FranxenPinzon', 'TheHype2015', 'Patient', 'active'),
('gemma', '3fb22a5597fb91ee4f9abbf30ea69d', 'Doctor', 'active'),
('gene', '5ac52c67c10a6cea6daa62876e90a9', 'Doctor', 'active'),
('genuino', '47ebbbdcbedd88878c503abf49c2c3', 'Doctor', 'active'),
('grace', 'e010fd1ce1acc173e3b4835b7635f8', 'Doctor', 'active'),
('hosanna', 'bfff9525aacb6b9226129a28afc1c6', 'Doctor', 'active'),
('james', '119c9ae6f9ca741bd0a76f87fba0b2', 'Doctor', 'active'),
('jean', '4ff17bc8ee5f240c792b8a41bfa2c5', 'Doctor', 'active'),
('jeane', '04e8a9695736d4ba268b099b921f56', 'Doctor', 'active'),
('jeanette', '853dbc39c711e07347cfb240f4dd49', 'Doctor', 'active'),
('josie', 'd118e41faea4e000917a87021e4945', 'Doctor', 'active'),
('Jude', 'b43cde468a03951d2e1ca4f15a703f', 'Patient', 'active'),
('Judelyn', 'b43cde468a03951d2e1ca4f15a703f', 'Patient', 'active'),
('JudeVargas', 'bbb', 'Patient', 'active'),
('julieta', 'f7e49508125cdd4865a9336abbb85e', 'Doctor', 'active'),
('julio', '901be86d450c504e8555ffeeeab1e0', 'Doctor', 'active'),
('JunetQuinitip', 'sundaymorning', 'Doctor', 'active'),
('Justiniano', '94bcdcb5093e0fe1fc0e711b525098', 'Doctor', 'active'),
('karla', '1cfcffbd0d0536e2b354a0bbe9a0df', 'Doctor', 'active'),
('lizada', '1e19535438153d57d829b8ee88bfff', 'Doctor', 'active'),
('mapalo', '5515fab1be482bbd7c50a150ca69e5', 'Doctor', 'active'),
('margaret', '522ce7057fd0523adcd6672db24bb6', 'Doctor', 'active'),
('marie', 'c6d17a3613b9914e68707fcfac8410', 'Doctor', 'active'),
('mark', '6201eb4dccc956cc4fa3a78dca0c28', 'Doctor', 'active'),
('mary', '6915771be1c5aa0c886870b6951b03', 'Doctor', 'active'),
('matthew', '68be7550846ecd878947b4eb0ac13d', 'Doctor', 'active'),
('melanie', 'dfef5e53f9848472560a3e680a310d', 'Doctor', 'active'),
('melissa', '8def3bf5d78abb247b4829e87b52b1', 'Doctor', 'active'),
('nadine', '3af8e4b69bdc2acdabfabc682417cc', 'Doctor', 'active'),
('neil', '4bbfa1f1b0462b4844b74c34fdd297', 'Doctor', 'active'),
('orlando', '05ef130c628dac6868d8ab9a080490', 'Doctor', 'active'),
('pakoy', '64023c9da41b8ef288d5d907350586', 'Doctor', 'active'),
('pamela', 'cbbcacaf0d582e760874a68b44c572', 'Doctor', 'active'),
('Ram', '5eec0dc419aa8337bf725f026fda9c', 'Patient', 'active'),
('ranelyn', '579a5959c740f72f662e68419f5ba6', 'Doctor', 'active'),
('rosario', 'db26ce04fc0e235ae037a334d7e939', 'Doctor', 'active'),
('rosemarie', '457ad6a394a743ca81ec1a72b15901', 'Doctor', 'active'),
('sheila', '8d20e19b8fc57df7cf425bb96337dd', 'Doctor', 'active'),
('sylva', 'c0d294b7085be2e8cdce3894934b38', 'Doctor', 'active'),
('vanadero', '4a54d8018198dc4a80d0f0f7adf6d3', 'Doctor', 'active'),
('victoria', 'ab1cb712f2dca756105160805501f4', 'Doctor', 'active'),
('virginia', '0a4992ea442b53e3dca861deac09a8', 'Doctor', 'active'),
('wilma', '40badc66889cd2b74037c3731ecbc2', 'Doctor', 'active');

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
  `clinic_id` varchar(30) NOT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `doctor_id_2` (`doctor_id`),
  KEY `patient_id` (`patient_id`),
  KEY `clinic_id` (`clinic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `remarks`, `doctor_id`, `patient_id`, `appoint_date`, `appointment_status`, `clinic_id`) VALUES
(2, 'finished', '2015Quinitip', '2015Tayab', '0000-00-00', 'Completed', '294'),
(7, 'sdadasd', '2015Macion', '2015Tayab', '0000-00-00', 'Cancelled', '293'),
(70, '', '2015Macion', '2015Vargas', '0000-00-00', 'Inqueue', '295'),
(71, '', '2015Quinitip', '2015Vargas', '0000-00-00', 'Cancelled', '293'),
(72, '', '2015Macion', '2015Vargas', '0000-00-00', 'Referred', '295'),
(73, '', '2015Quinitip', '2015Vargas', '0000-00-00', 'Inqueue', '293'),
(74, '', '2015Quinitip', '2015Tayab', '0000-00-00', 'Cancelled', '293'),
(76, '', '2015Macion', '2015Vargas', '0000-00-00', 'Inqueue', '295'),
(77, '', '2015Macion', '2015Tayab', '2015-03-21', 'Inqueue', '292'),
(78, '', '2015Quinitip', '2015Tayab', '2015-03-22', 'Cancelled', '293'),
(79, '', '2015Quinitip', '2015Tayab', '2015-03-22', 'Inqueue', '293');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_history`
--

CREATE TABLE IF NOT EXISTS `appointment_history` (
  `appointment_history_id` int(30) NOT NULL AUTO_INCREMENT,
  `appointment_status` enum('Cancelled','Completed','Referred','Unattended') NOT NULL,
  `doctor_id` varchar(30) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `appointment_id` int(30) NOT NULL,
  PRIMARY KEY (`appointment_history_id`),
  KEY `appointment_id` (`appointment_id`),
  KEY `doctor_id` (`doctor_id`,`patient_id`,`appointment_id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `appointment_history`
--

INSERT INTO `appointment_history` (`appointment_history_id`, `appointment_status`, `doctor_id`, `patient_id`, `appointment_id`) VALUES
(34, 'Cancelled', '2015Quinitip', '2015Macam', 39),
(36, 'Cancelled', '2015Quinitip', '2015Macam', 39),
(51, 'Cancelled', '2015Quinitip', '2015Vargas', 71),
(52, 'Cancelled', '2015Macion', '2015Tayab', 10),
(53, 'Cancelled', '2015Macion', '2015Tayab', 10),
(54, 'Cancelled', '2015Quinitip', '2015Tayab', 74);

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE IF NOT EXISTS `clinic` (
  `clinic_id` varchar(30) NOT NULL,
  `clinic_location` varchar(200) NOT NULL,
  `clinic_name` varchar(50) NOT NULL,
  `clinic_contact` varchar(50) NOT NULL,
  `doctor_id` varchar(30) NOT NULL,
  PRIMARY KEY (`clinic_id`),
  KEY `doctor_id` (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`clinic_id`, `clinic_location`, `clinic_name`, `clinic_contact`, `doctor_id`) VALUES
('292', 'Engineer''s Hill, Baguio City', 'MacionLovesYou', '421-3459', '2015Macion'),
('293', 'Benguet Labs, Baguio City', '', '422-1311', '2015Quinitip'),
('294', 'Tuba', 'Mancion', '876543', '2015Macion'),
('295', 'Gisad', 'The Macioninator', '76543', '2015Macion');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `doctor_id` varchar(30) NOT NULL,
  `doctor_name` varchar(30) NOT NULL,
  `specialization` varchar(30) NOT NULL,
  `doctor_status` enum('On Leave','Emergency','In','Out','Sick Leave') NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  PRIMARY KEY (`doctor_id`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `doctor_name`, `specialization`, `doctor_status`, `email`, `username`) VALUES
('05fc9cf', 'Justiniano Bai', 'Orthopedics', 'In', 'null', 'Justiniano'),
('06240c1', 'Gene Estandian', 'Constructive Surgery', 'In', 'null', 'gene'),
('062a78c', 'Nadine Tello', 'Opthalmology', 'Out', 'null', 'nadine'),
('099b2aa', 'Arlene Baguilat', 'Pediatrician', 'In', 'null', 'arlene'),
('0a8acd3', 'Mary Gay Buliyat', 'Oncology', 'In', 'null', 'mary'),
('0e4f4ea', 'Marie Ellaine Velasquez', 'Gastroeneterology', 'In', 'null', 'marie'),
('1070dad', 'Ana Claire Pagnas', 'FM/GP/PCOM', 'Out', 'null', 'ana'),
('12b62e2', 'Genuino', 'Cardiology', 'Out', 'null', 'genuino'),
('1ba74a2', 'Pamela Chu', 'OB Gyne', 'Out', 'null', 'pamela'),
('2015Macion', 'Bernabe Macion', 'Dentistry', 'In', '', 'AbeMacion'),
('2015Quinitip', 'Junet Quinitip', 'Cardiology', 'Out', 'null', 'JunetQuinitip'),
('2b0cfe3', 'Pakoy', 'GP/Animal Bite', 'In', 'null', 'pakoy'),
('2d55d42', 'Bernadette Lizada', 'OB Gyne', 'Out', 'null', 'lizada'),
('39bc1d7', 'Eva Quiano', 'FM/GP/IM', 'In', 'null', 'eva'),
('3c40f3f', 'Ma. Victoria Palor', 'Orthopedics/GP', 'Out', 'null', 'victoria'),
('3effdde', 'Jean Jeanette Sibayan', 'Psychology', 'In', 'null', 'jeanette'),
('4105baa', 'Jean Pierre Leung', 'Orthopedics', 'Out', 'null', 'jean'),
('41277b3', 'Rosario Larang', 'OB Gyne', 'Out', 'null', 'rosario'),
('4b2a97a', 'Gemma Pinlac', 'Nephrology', 'Out', 'null', 'gemma'),
('50a889c', 'Ranelyn Lozanes', 'OB Gyne', 'In', 'null', 'ranelyn'),
('528a433', 'Aurora Hidalgo', 'Dermatology', 'In', 'null', 'aurora'),
('53afc1c', 'Cherrie Ann Moreno', 'OB Gyne', 'Out', 'null', 'cherrie'),
('5f4edf4', 'Antonio Suero', 'Orthopedics', 'Out', 'null', 'antonio'),
('6168510', 'Sheila Villanueva', 'FM/GP/PCOM', 'In', 'null', 'sheila'),
('6195417', 'Rosemarie Raper', 'Pediatrician', 'Out', 'null', 'rosemarie'),
('61b8301', 'Mark Valdez', 'GP', 'In', 'null', 'mark'),
('61d4e33', 'Bernadette Arzadon', 'FM/GP/PCOM', 'Out', 'null', 'bernadette'),
('6a14471', 'Melanie Clemente', 'FM/GP/PCOM', 'Out', 'null', 'melanie'),
('6b38136', 'Mari Grace Yabut', 'Pediatrician', 'Out', 'null', 'grace'),
('777fb0c', 'Orlando Aragon', 'UTZ', 'In', 'null', 'orlando'),
('7780484', 'Fedelina Suanding', 'OB Gyne', 'Out', 'null', 'fedelina'),
('7b6cc9b', 'Wilma Lee', 'OB Gyne', 'Out', 'null', 'wilma'),
('7d5062a', 'Sheila Mapalo', 'FM/GP/PCOM', 'Out', 'null', 'mapalo'),
('7da008f', 'Neil Ambasing', 'Neurology', 'In', 'null', 'neil'),
('86b6fe8', 'Julio Eming', 'ENT', 'Out', 'null', 'julio'),
('8c1f890', 'Matthew Bawayan', 'Surgery', 'In', 'null', 'matthew'),
('90b71b7', 'Donnabel Tubera', 'Epidemiology', 'In', 'null', 'donnabel'),
('93305e4', 'Baby Ria Requiero', 'Nephrology', 'In', 'null', 'baby'),
('959bcfd', 'Karla Posadas', 'Cardiology', 'Out', 'null', 'karla'),
('95dc35f', 'Erickson Madronio', 'Endocrinology', 'In', 'null', 'erickson'),
('9d638cb', 'Vanadero', 'ENT', 'In', 'null', 'vanadero'),
('a288466', 'Francis Yabut', 'Urology', 'In', 'null', 'francis'),
('a3d1f76', 'Annie Rita Del Rosario', 'Surgery', 'Out', 'null', 'annie'),
('b005965', 'Damaso Bangaoet', 'Surgery/Pulmunology', 'In', 'null', 'damaso'),
('c4b8c7e', 'Melissa Ompico', 'Pediatrician', 'Out', 'nul', 'melissa'),
('c7399c6', 'Hosanna Mae Pajela', 'FM/GP/PCOM', 'Out', 'null', 'hosanna'),
('c95aa98', 'Julieta Calaycay', 'Opthalmology', 'In', 'null', 'julieta'),
('ccf908b', 'Agaton Yaranon', 'Pulmunology', 'Out', 'null', 'agaton'),
('ce2656d', 'Efren Balanag', 'Pediatrician', 'In', 'null', 'efren'),
('ce40785', 'Jeane Quibin', 'Internal Medicine', 'In', 'null', 'jeane'),
('e17fe8b', 'Virginia De Joya', 'Clinical Pathology', 'In', 'null', 'virginia'),
('e50c730', 'Faith Kishi Generao', 'Dermatology', 'Out', 'null', 'faith'),
('eb28a8a', 'Josie Rivera', 'FM/GP/PCOM', 'Out', 'null', 'josie'),
('eb8c770', 'Margaret Apolinar', 'Infectious Disease', 'In', 'null', 'margaret'),
('f1a7b69', 'Sylva Tsuchiya', 'Neuro-Psychiatry', 'In', 'null', 'sylva'),
('f39e62a', 'Florence Dela Pena', 'CFP/PCOM', 'Out', 'null', 'florence'),
('fd312ea', 'James Luz', 'Opthalmology', 'In', 'null', 'james');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `indicator` varchar(100) NOT NULL,
  `doctor_id` varchar(100) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `legend_id` varchar(100) NOT NULL,
  `notification_date` date NOT NULL,
  `notification` text NOT NULL,
  PRIMARY KEY (`notification_id`),
  KEY `patient_id` (`patient_id`),
  KEY `notif_id` (`legend_id`),
  FULLTEXT KEY `doctor_id` (`doctor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `indicator`, `doctor_id`, `patient_id`, `legend_id`, `notification_date`, `notification`) VALUES
(19, 'patient', '2015Macion', '2015Vargas', 'n1004', '2015-03-17', 'A patient has requested an appointment.'),
(21, 'patient', '2015Macion', '2015Vargas', 'n1004', '2015-03-16', 'A patient has cancelled his appointment.'),
(22, 'patient', '2015Macion', '2015Vargas', 'n1004', '2015-03-16', 'A patient has cancelled his appointment.'),
(23, 'doctor', '2015Macion', '2015Vargas', 'n1002', '2015-03-16', 'You have been referred by doctor Bernabe Macion to doctor Sarah Geronimo'),
(26, 'patient', '2015Macion', '2015Tayab', 'n1004', '2016-12-22', 'A patient has requested an appointment.'),
(27, 'patient', '2015Macion', '2015Vargas', 'n1004', '2015-03-20', 'A patient has requested an appointment.'),
(28, 'patient', '2015Macion', '2015Vargas', 'n1004', '2015-03-27', 'A patient has requested an appointment.'),
(29, 'patient', '2015Macion', '2015Vargas', 'n1004', '2015-03-20', 'A patient has requested an appointment.'),
(30, 'patient', '2015Macion', '2015Vargas', 'n1004', '2015-03-21', 'A patient has requested an appointment.'),
(31, 'patient', '2015Macion', '2015Vargas', 'n1004', '2015-03-24', 'A patient has requested an appointment.'),
(32, 'patient', '2015Macion', '2015Vargas', 'n1004', '2015-03-19', 'A patient has cancelled his appointment.'),
(33, 'patient', '2015Macion', '2015Vargas', 'n1004', '2015-03-19', 'A patient has cancelled his appointment.'),
(34, 'patient', '2015Macion', '2015Vargas', 'n1004', '2015-03-22', 'A patient has requested an appointment.'),
(35, 'patient', '2015Macion', '2015Vargas', 'n1004', '2015-03-26', 'A patient has requested an appointment.'),
(37, 'patient', '2015Quinitip', '2015Vargas', 'n1004', '2015-03-19', 'A patient has cancelled his appointment.'),
(38, 'patient', '2015Macion', '2015Tayab', 'n1004', '2015-03-20', 'A patient has cancelled his appointment.'),
(39, 'patient', '2015Macion', '2015Tayab', 'n1004', '2015-03-21', 'A patient has requested an appointment.'),
(40, 'patient', '2015Macion', '2015Tayab', 'n1004', '2015-03-21', 'A patient has requested an appointment.'),
(41, 'patient', '2015Macion', '2015Tayab', 'n1004', '2015-03-21', 'A patient has requested an appointment.'),
(42, 'patient', '2015Macion', '2015Tayab', 'n1004', '2015-03-21', 'A patient has requested an appointment.'),
(43, 'patient', '2015Quinitip', '2015Tayab', 'n1004', '2015-03-21', 'A patient has requested an appointment.'),
(44, 'patient', '2015Quinitip', '2015Tayab', 'n1004', '2015-03-21', 'A patient has requested an appointment.'),
(45, 'patient', '2015Quinitip', '2015Tayab', 'n1002', '2015-03-21', 'A patient has rescheduled his appointment to you.'),
(46, 'patient', '2015Quinitip', '2015Tayab', 'n1004', '2015-03-21', 'A patient has cancelled his appointment.');

-- --------------------------------------------------------

--
-- Table structure for table `notif_legend`
--

CREATE TABLE IF NOT EXISTS `notif_legend` (
  `notif_id` varchar(10) NOT NULL,
  `color` enum('red','orange','green','blue') NOT NULL,
  `explanation` text NOT NULL,
  PRIMARY KEY (`notif_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notif_legend`
--

INSERT INTO `notif_legend` (`notif_id`, `color`, `explanation`) VALUES
('n1001', 'red', 'warning'),
('n1002', 'orange', 'semi-warning'),
('n1003', 'green', 'completed'),
('n1004', 'blue', 'information');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` varchar(30) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `patient_contact` varchar(20) NOT NULL,
  `birthdate` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `occupation` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`patient_id`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `patient_name`, `patient_contact`, `birthdate`, `email`, `username`, `occupation`) VALUES
('2015Macam', 'Denmark Macam', '09202324249', '05/11/95', 'adikforabe@yahoo.com', 'DenmarkMacam', NULL),
('2015Pinzon', 'Franxen Pinzon', '09221494297', '02/21/95', 'fxss@yahoo.com', 'FranxenPinzon', NULL),
('2015Tayab', 'Christine Joy Tayab', '09090923021', '12/22/94', 'cj.tayab@gmail.com', 'CJTayab', NULL),
('2015Vargas', 'Judelyn Vargas', '09213224590', '10/28/94', 'judefvargas@gmail.com', 'JudeVargas', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `queue_number`
--

CREATE TABLE IF NOT EXISTS `queue_number` (
  `queue_id` varchar(100) NOT NULL,
  `appointmed_id` varchar(100) NOT NULL,
  `doctor_id` varchar(100) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  PRIMARY KEY (`queue_id`),
  KEY `queue_id` (`queue_id`,`appointmed_id`),
  KEY `doctor_id` (`doctor_id`,`patient_id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `referred`
--

CREATE TABLE IF NOT EXISTS `referred` (
  `referred_id` varchar(30) NOT NULL,
  `patient_id` varchar(30) NOT NULL,
  `doctor_id` varchar(30) NOT NULL,
  KEY `patient_id` (`patient_id`),
  KEY `doctor_id` (`doctor_id`),
  KEY `referred_id` (`referred_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('2015Gutierrez', 'Claudine Gutierrez', 'clauds_22@hotmail.com', '2015Quinitip', 'ClaudineGutierrez'),
('2015Ragadio', 'Dianne Ragadio', 'ian.ragadio@gmail.com', '2015Macion', 'DianneRagadio');

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

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`doctor_id`, `patient_id`) VALUES
('2015Quinitip', '2015Vargas'),
('1070dad', '2015Vargas'),
('ccf908b', '2015Vargas'),
('a3d1f76', '2015Vargas');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`clinic_id`) REFERENCES `clinic` (`clinic_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_4` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_5` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON UPDATE CASCADE;

--
-- Constraints for table `appointment_history`
--
ALTER TABLE `appointment_history`
  ADD CONSTRAINT `appointment_history_ibfk_3` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`),
  ADD CONSTRAINT `appointment_history_ibfk_4` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`);

--
-- Constraints for table `referred`
--
ALTER TABLE `referred`
  ADD CONSTRAINT `referred_ibfk_5` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `referred_ibfk_3` FOREIGN KEY (`referred_id`) REFERENCES `doctor` (`doctor_id`),
  ADD CONSTRAINT `referred_ibfk_4` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `secretary`
--
ALTER TABLE `secretary`
  ADD CONSTRAINT `secretary_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `secretary_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD CONSTRAINT `subscribe_ibfk_4` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`),
  ADD CONSTRAINT `subscribe_ibfk_3` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
