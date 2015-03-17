-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2015 at 12:31 PM
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
('', 'd9e1b51ac9805a3979ca7c91a3c612b2d5875949c994c5c0bc07947886b76eed', 'Doctor', 'active'),
('AbeMacion', 'korniks', 'Doctor', 'active'),
('Admin', 'admin', 'Admin', 'active'),
('agaton', '014a84c91500d9e40f3388b13ff8ec7ef6398911c720ef8852c5f7b8c9ef4325', 'Doctor', 'active'),
('Alabama00', 'b43cde468a03951d2e1ca4f15a703f93bf75ba479f48d7680f740f2ec3d583dc', 'Patient', 'active'),
('ana', '24d4b96f58da6d4a8512313bbd02a28ebf0ca95dec6e4c86ef78ce7f01e788ac', 'Doctor', 'active'),
('annie', '71be92cbdfe91357146afad81827a981ec58f5a3e69e9bd4527acd74b1927938', 'Doctor', 'active'),
('antonio', '4ee3679892e6ac5a5b513eba7fd529d363d7a96508421c5dbd44b01b349cf514', 'Doctor', 'active'),
('arlene', '382b34d681fca561eea04996874976b654ca18fbd502aad5f84de38ddf79b456', 'Doctor', 'active'),
('ASDASASD', 'b43cde468a03951d2e1ca4f15a703f93bf75ba479f48d7680f740f2ec3d583dc', 'Patient', 'active'),
('asdasdasd', '02a21e16756fdf05c57d3c5c1a12beef0e6afd05a1d842d94347e524530b74c9', 'Doctor', 'active'),
('aurora', '9b89025ce7a6d932b28f6e15132a70d402f723874a425e9b4c7cc3b179fa66ce', 'Doctor', 'active'),
('baby', 'a3ca38ef0e8554b39ce6fd34b011f9aa197cda1f17e2b08b1816142c4bc67199', 'Doctor', 'active'),
('bernadette', 'bbe7a727217b335afc5aa51084477fb693269a2a09e7c2e6d009594c8820baaa', 'Doctor', 'active'),
('Charmaine', '13f5f20cc67f6910674614b8a03a24622f74b2ca5cd1f11fb9f0ae7f28dc77b7', 'Patient', 'active'),
('cherrie', '58b644a5d21d950e877b4aaecf36a7f6ad6c934f695d063b8991759e6e93e70d', 'Doctor', 'active'),
('CJTayab', 'secretlang', 'Patient', 'inactive'),
('ClaudineGutierrez', 'Anakngpating', 'Secretary', 'active'),
('damaso', 'bd19408422fea7f08db51acb869712d92917c5ad55f1a959a1411d2b04179090', 'Doctor', 'active'),
('DenmarkMacam', 'Adik4Abe', 'Patient', 'active'),
('DianneRagadio', 'mushrooms', 'Secretary', 'active'),
('donnabel', 'a2d76681cb51a513827e8557824099cfc3f27b0089af7f9984b3d0b654050a80', 'Doctor', 'active'),
('efren', 'cf0fff483ff377cb577616bc9e7a191138bb3fc8c811fd09a9a8c71e2542436a', 'Doctor', 'active'),
('erickson', 'c56f14104d177a2e57cd0b223a83fddedd46cfeb772db7c33df502bedab43307', 'Doctor', 'active'),
('eva', '02b15ef87562676a8a42f33af9a0ca6aa11e491abda98cec24e4eded61ffa78d', 'Doctor', 'active'),
('faith', '2b93b177b55445f513d73ff1f0f30376d6ec181bcc1bd5cd19cccb970f4ee0d2', 'Doctor', 'active'),
('fedelina', '0d2e40050fd723ffffec4f725d8ed0e3b99bb99166d2a15fef24d29e752a4ea6', 'Doctor', 'active'),
('florence', 'f902def4855ca65edd49983167186a7d9e9ea3386078ef59ce92970d291b2b8e', 'Doctor', 'active'),
('francis', 'fe384adb7e67d54e973c65b0174e3de5d8288e483958da561d39c98ddb1cc5d4', 'Doctor', 'active'),
('FranxenPinzon', 'TheHype2015', 'Patient', 'active'),
('gemma', '3fb22a5597fb91ee4f9abbf30ea69d318be150e0fcf3ca1db8ca334b520d2894', 'Doctor', 'active'),
('gene', '5ac52c67c10a6cea6daa62876e90a9dcf62523352f0876dad99c55788392849a', 'Doctor', 'active'),
('genuino', '47ebbbdcbedd88878c503abf49c2c331e301732bc4600773251f791416528b92', 'Doctor', 'active'),
('grace', 'e010fd1ce1acc173e3b4835b7635f8d4600d774869102adb5cb7b5d7895649ba', 'Doctor', 'active'),
('hosanna', 'bfff9525aacb6b9226129a28afc1c6d68b3a3a990c8fd761d2ea9c6be04a1d7a', 'Doctor', 'active'),
('james', '119c9ae6f9ca741bd0a76f87fba0b22cab5413187afb2906aa2875c38e213603', 'Doctor', 'active'),
('jean', '4ff17bc8ee5f240c792b8a41bfa2c58af726d83b925cf696af0c811627714c85', 'Doctor', 'active'),
('jeane', '04e8a9695736d4ba268b099b921f56e48739821b485267b81688f5f4218badb1', 'Doctor', 'active'),
('jeanette', '853dbc39c711e07347cfb240f4dd4905f3d2d83e5a14397030449f3737face9f', 'Doctor', 'inactive'),
('josie', 'd118e41faea4e000917a87021e4945508af18168985cb7d9dce1bba3ba390e43', 'Doctor', 'active'),
('JudeVargas', 'bbb', 'Patient', 'active'),
('julieta', 'f7e49508125cdd4865a9336abbb85e855bb50373a14ca6dbf31b9a725ea89b6b', 'Doctor', 'active'),
('julio', '901be86d450c504e8555ffeeeab1e06b926c8785fd99ef382c1310b7c66bc167', 'Doctor', 'active'),
('JunetQuinitip', 'sundaymorning', 'Doctor', 'active'),
('Jurmainer', '0853509b8c4d042252367fea7c1d16b94a466dab405944bc4a8c59ab99b69f8c', 'Patient', 'active'),
('Justiniano', '94bcdcb5093e0fe1fc0e711b525098ebcc9f7c5a38c731477b4a78004b129cdf', 'Doctor', 'active'),
('karla', '1cfcffbd0d0536e2b354a0bbe9a0df8f7c15b26293e99ce5bd468e1716154295', 'Doctor', 'active'),
('KingCobra', 'kingcobra', 'Doctor', 'active'),
('Leviii', '1dd469f240b53c1ae2fd1518ec2ec5f58770bf51c6f16c592baf6f98f52447d5', 'Patient', 'active'),
('lizada', '1e19535438153d57d829b8ee88bfffe04d7adedc58c4face9c0393f52066ea11', 'Doctor', 'active'),
('mapalo', '5515fab1be482bbd7c50a150ca69e51deb1904b86272d14c8488b521b72b1b99', 'Doctor', 'active'),
('MarCarey', 'b43cde468a03951d2e1ca4f15a703f93bf75ba479f48d7680f740f2ec3d583dc', 'Patient', 'active'),
('margaret', '522ce7057fd0523adcd6672db24bb671d09d1ffa2f1e7c97c13e6c68ae6fcb13', 'Doctor', 'active'),
('marie', 'c6d17a3613b9914e68707fcfac8410f097643bc5840681bb533030d73cbb18f8', 'Doctor', 'active'),
('mark', '6201eb4dccc956cc4fa3a78dca0c2888177ec52efd48f125df214f046eb43138', 'Doctor', 'active'),
('mary', '6915771be1c5aa0c886870b6951b03d7eafc121fea0e80a5ea83beb7c449f4ec', 'Doctor', 'active'),
('matthew', '68be7550846ecd878947b4eb0ac13d3cca3cf6c4940c94d90163e0a15e947203', 'Doctor', 'active'),
('melanie', 'dfef5e53f9848472560a3e680a310d097ecc75919740646df38d31cab7aa07ac', 'Doctor', 'active'),
('melissa', '8def3bf5d78abb247b4829e87b52b10d79b1cd0e2aec529930ed692ee8d1cd2c', 'Doctor', 'active'),
('Mikasa22', '13f5f20cc67f6910674614b8a03a24622f74b2ca5cd1f11fb9f0ae7f28dc77b7', 'Patient', 'active'),
('nadine', '3af8e4b69bdc2acdabfabc682417cc1d53b84d0437aeb3787a054bfc68d9b2d4', 'Doctor', 'active'),
('neil', '4bbfa1f1b0462b4844b74c34fdd297aba2a82ac2355e64308578f5acf1f5e8bf', 'Doctor', 'active'),
('orlando', '05ef130c628dac6868d8ab9a08049009d414ceaae8b90e2b0ebb3c5d4c80da6f', 'Doctor', 'active'),
('pakoy', '64023c9da41b8ef288d5d907350586a2741914cc2fed1577d56cafcfdceb8c6d', 'Doctor', 'active'),
('Palmen', '3f8e72dc3b29137c9c29f715fb7f39bed57b6043c8b2f0d57bdbae20331ec850', 'Patient', 'inactive'),
('pamela', 'cbbcacaf0d582e760874a68b44c572218102a1d24fa262b00dc7f090c7257302', 'Doctor', 'active'),
('Qwerty', '73d5b2f4ba82d59c723c16a909524559d8f31e33c5d8fdcfc57065dca5c9f189', 'Patient', 'active'),
('Qwertyasdas', '73d5b2f4ba82d59c723c16a909524559d8f31e33c5d8fdcfc57065dca5c9f189', 'Patient', 'active'),
('Ram', '5eec0dc419aa8337bf725f026fda9c78c1cb1c642eeaff9d6e1112f37783e942', 'Patient', 'active'),
('ranelyn', '579a5959c740f72f662e68419f5ba68ce4dad72e07e727d3d9338f11766eec83', 'Doctor', 'active'),
('rosario', 'db26ce04fc0e235ae037a334d7e939ea6dedc4ff234fc5e5578fda274d578550', 'Doctor', 'active'),
('rosemarie', '457ad6a394a743ca81ec1a72b159016bc86094b14925e349799fbbcb166940a1', 'Doctor', 'active'),
('sadasas', '91a9795588a24c150b4f2417a7ece8539c65dd5c456d51bf4d3210fe2f4bd3bb', 'Patient', 'active'),
('SarahGeronimo', 'kilometro', 'Doctor', 'active'),
('sheila', '8d20e19b8fc57df7cf425bb96337dd498403f13124ffc22bcd1cba5d9e8445d2', 'Doctor', 'active'),
('sylva', 'c0d294b7085be2e8cdce3894934b38b65eec19eff2a2c032f0f3c9d31447e461', 'Doctor', 'active'),
('tyuiop', '43c9b542b26db17f11605e97630e1799dce0cf79a1d7c00cdb0ad59e94e0bf2b', 'Patient', 'active'),
('vanadero', '4a54d8018198dc4a80d0f0f7adf6d3d5aeafc4153ff090e3be79bb453b7de12f', 'Doctor', 'active'),
('victoria', 'ab1cb712f2dca756105160805501f4d6d8657d93d40b16eee4ecb5fd048d26eb', 'Doctor', 'active'),
('virginia', '0a4992ea442b53e3dca861deac09a8d4987004a8483079b12861080ea4aa1b52', 'Doctor', 'active'),
('wilma', '40badc66889cd2b74037c3731ecbc21073b924a8f1678a02ea59f0766dcd73d2', 'Doctor', 'active');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `remarks`, `doctor_id`, `patient_id`, `appoint_date`, `appointment_status`, `clinic_id`) VALUES
(1, 'for mr. macion', '2015Macion', '2015Macam', '02/24/2015', 'Completed', 295),
(2, 'finished', '2015Quinitip', '2015Tayab', '', 'Completed', 294),
(3, 'for sarahg', '2015Geronimo', '2015Vargas', '03/11/2015', 'Inqueue', 293),
(7, 'sdadasd', '2015Macion', '2015Tayab', '12', 'Cancelled', 293),
(10, 'i love you', '2015Macion', '2015Tayab', '10/23/1015', 'Cancelled', 292),
(39, '', '2015Quinitip', '2015Macam', 's', 'Cancelled', 291),
(70, '', '2015Geronimo', '2015Vargas', '03/12/2015', 'Cancelled', 295),
(71, '', '2015Quinitip', '2015Vargas', '', 'Cancelled', 293),
(72, '', 'KingCobra', '2015Vargas', '03/18/2015', 'Referred', 295),
(73, '', '2015Quinitip', '2015Vargas', '02/27/2015 10:55 AM', 'Inqueue', 293),
(74, '', '2015Quinitip', '2015Tayab', '12/22/2015', 'Cancelled', 293),
(75, '', '2015Geronimo', '2015Tayab', '05/14/2015', 'Inqueue', 291),
(76, '', '2015Macion', '2015Vargas', '03/10/2015', 'Cancelled', 295),
(77, '', '2015Macion', '2015Vargas', '2015-03-11', 'Cancelled', 295),
(78, '', '2015Macion', '2015Vargas', '2015-03-12', 'Cancelled', 292),
(79, '', '2015Macion', '2015Vargas', '2015-03-14', 'Cancelled', 294),
(80, '', '2015Geronimo', '2015Vargas', '03/29/2015', 'Referred', 295),
(81, '', '2015Macion', '2015Vargas', '03/12/2015', 'Cancelled', 295),
(82, '', '2015Quinitip', '2015Vargas', '03/12/2015', 'Inqueue', 293),
(83, '', '2015Macion', '2015Vargas', '03/11/2015', 'Cancelled', 295),
(84, '', '2015Macion', '2015Vargas', '04/02/2015', 'Cancelled', 295),
(85, '', '2015Geronimo', '2015Vargas', '03/18/2015', 'Inqueue', 291),
(86, '', '2015Macion', '2015Macam', '03/13/2015', 'Inqueue', 295),
(87, '', '2015Macion', '2015Vargas', '03/12/2015', 'Inqueue', 292),
(88, '', '2015Macion', '2015Vargas', '03/21/2015', 'Inqueue', 292),
(89, '', '2015Quinitip', '2015Vargas', '03/18/2015', 'Inqueue', 293),
(90, '', '2015Macion', '2015Vargas', '03/25/2015', 'Cancelled', 292),
(91, '', '2015Macion', '2015Vargas', '2015-03-17', 'Cancelled', 294),
(92, '', '2015Geronimo', '2015Vargas', '2015-03-17', 'Cancelled', 291);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `appointment_history`
--

INSERT INTO `appointment_history` (`appointment_history_id`, `appointment_status`, `doctor_id`, `patient_id`, `appointment_id`) VALUES
(34, 'Cancelled', '2015Quinitip', '2015Macam', 39),
(36, 'Cancelled', '2015Quinitip', '2015Macam', 39),
(51, 'Cancelled', '2015Quinitip', '2015Vargas', 71),
(52, 'Cancelled', '2015Macion', '2015Tayab', 10),
(53, 'Cancelled', '2015Macion', '2015Tayab', 10),
(54, 'Cancelled', '2015Quinitip', '2015Tayab', 74),
(55, 'Cancelled', '2015Macion', '2015Vargas', 76),
(56, 'Cancelled', '2015Macion', '2015Vargas', 77),
(57, 'Cancelled', '2015Macion', '2015Vargas', 79),
(58, 'Cancelled', '2015Macion', '2015Vargas', 78),
(59, 'Cancelled', '2015Macion', '2015Vargas', 81),
(60, 'Cancelled', '2015Geronimo', '2015Vargas', 70),
(61, 'Cancelled', '2015Macion', '2015Vargas', 83),
(62, 'Cancelled', '2015Macion', '2015Vargas', 84),
(63, 'Cancelled', '2015Macion', '2015Vargas', 90),
(64, 'Cancelled', '2015Macion', '2015Vargas', 91),
(65, 'Cancelled', '2015Geronimo', '2015Vargas', 92);

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
('05fc9cf', 'Justiniano Bai', 'Orthopedics', 'In', 'null', 'Justiniano'),
('06240c1', 'Gene Estandian', 'Constructive Surgery', 'In', 'null', 'gene'),
('062a78c', 'Nadine Tello', 'Opthalmology', 'Out', 'null', 'nadine'),
('070f07e', 'Ana Asdasd', 'asd', 'In', 'asdasad', 'asdasdasd'),
('099b2aa', 'Arlene Baguilat', 'Pediatrician', 'In', 'null', 'arlene'),
('0a8acd3', 'Mary Gay Buliyat', 'Oncology', 'In', 'null', 'mary'),
('0e4f4ea', 'Marie Ellaine Velasquez', 'Gastroeneterology', 'In', 'null', 'marie'),
('0ec3553', 'Marcelo Gomez', 'Dentistry', '', '', ''),
('1070dad', 'Ana Claire Pagnas', 'FM/GP/PCOM', 'Out', 'null', 'ana'),
('12b62e2', 'Genuino', 'Cardiology', 'Out', 'null', 'genuino'),
('1ba74a2', 'Pamela Chu', 'OB Gyne', 'Out', 'null', 'pamela'),
('2015Geronimo', 'Sarah Geronimo', 'Dentistry', 'In', 'null', 'SarahGeronimo'),
('2015Macion', 'Bernabe Macion', 'Dentistry', 'In', '', 'AbeMacion'),
('2015Quinitip', 'Junet Quinitip', 'Cardiology', 'Out', 'null', 'JunetQuinitip'),
('2b0cfe3', 'null Pakoy', 'GP/Animal Bite', 'In', 'null', 'pakoy'),
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
('9d638cb', 'null Vanadero', 'ENT', 'In', 'null', 'vanadero'),
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
('fd312ea', 'James Luz', 'Opthalmology', 'In', 'null', 'james'),
('KingCobra', 'KingCobra', 'Dentistry', 'Sick Leave', 'kings@gmail.com', 'KingCobra');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `indicator`, `doctor_id`, `patient_id`, `legend_id`, `notification_date`, `notification`) VALUES
(19, 'patient', '2015Macion', '2015Vargas', 'n1004', '2015-03-17', 'A patient has requested an appointment.'),
(20, 'patient', '2015Geronimo', '2015Vargas', 'n1004', '2015-03-17', 'A patient has requested an appointment.'),
(21, 'patient', '2015Macion', '2015Vargas', 'n1004', '2015-03-16', 'A patient has cancelled his appointment.'),
(22, 'patient', '2015Macion', '2015Vargas', 'n1004', '2015-03-16', 'A patient has cancelled his appointment.'),
(23, 'doctor', '2015Macion', '2015Vargas', 'n1002', '2015-03-16', 'You have been referred by doctor Bernabe Macion to doctor Sarah Geronimo'),
(24, 'patient', '2015Geronimo', '2015Vargas', 'n1004', '2015-03-17', 'A patient has cancelled his appointment.');

-- --------------------------------------------------------

--
-- Table structure for table `notification_legend`
--

CREATE TABLE IF NOT EXISTS `notification_legend` (
  `legend_id` varchar(100) NOT NULL,
  `color` text NOT NULL,
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
  `patient_id` varchar(100) NOT NULL,
  `patient_name` text NOT NULL,
  `patient_contact` varchar(100) NOT NULL,
  `birthdate` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `occupation` text,
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
('2015Vargas', 'Judelyn Vargas', '09213224590', '10/28/94', 'judefvargas@gmail.com', 'JudeVargas', 'student'),
('69ed348', 'Charamaine Lafina', '092123232321', '10/02/1990', 'judefvargas@gmail.com', 'Charmaine', 'Student'),
('7eb5444', 'Asdada Asdasda', 'sadasdasd', '1/1/1914', 'asdASDAS@GMAIL.COM', 'ASDASASD', 'ASDADSDAS'),
('7ed0365', 'Mariah Carey', '09090131190', '02/21/1999', 'jabbamaxi@yahoo.com', 'MarCarey', 'Singer'),
('8f4934c', 'Pal Men', '09212312390', '7/24/1999', 'palmen@gmail.com', 'Palmen', 'Student'),
('93d74c5', 'tyuiop', '09876655432', 'None', 'tyuiop@gmail.com', 'tyuiop', 'None'),
('a376802', 'Levi Ackerman', '09342432424', '12/22/2001', 'levi@yahoo.com', 'Leviii', 'Captain'),
('b28d7c6', 'Mikasa Ackerman', '092123434234', '09/22/1999', 'mika@gmail.com', 'Mikasa22', 'Soldier'),
('d39270c', 'Alabama00', 'Alabama00', 'Alabama00', 'Alabama00', 'Alabama00', 'Alabama00'),
('e547cd5', 'asdasd', 'sadasdasd', 'sadasdsa', 'asdsa', 'sadasas', 'asdsadsa'),
('f8afa10', 'Qwerty', '0987654112', 'None', 'Qwerty@gmail.com', 'Qwerty', 'None'),
('ff08728', 'q', '923298747', 'None', 'Qwerty@gmail.com', 'Qwertyasdas', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `queue_number`
--

CREATE TABLE IF NOT EXISTS `queue_number` (
  `queue_id` varchar(100) NOT NULL,
  `appointmed_id` varchar(100) NOT NULL,
  PRIMARY KEY (`queue_id`),
  KEY `queue_id` (`queue_id`,`appointmed_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('2015Geronimo', '2015Vargas', '2015Macion'),
('2015Geronimo', '2015Vargas', '2015Macion'),
('2015Macion', '2015Vargas', '2015Geronimo'),
('2015Geronimo', '2015Vargas', '2015Macion'),
('KingCobra', '2015Vargas', '2015Macion'),
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
('KingCobra', '2015Vargas'),
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
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`);

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
