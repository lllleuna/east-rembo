-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 02:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `east_rembo_citizen_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `First_name` varchar(45) NOT NULL,
  `Middle_name` varchar(45) DEFAULT NULL,
  `Last_name` varchar(45) NOT NULL,
  `Birthday` date NOT NULL,
  `National_ID_no` varchar(191) NOT NULL,
  `Sex` char(1) NOT NULL,
  `Home_Address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `First_name`, `Middle_name`, `Last_name`, `Birthday`, `National_ID_no`, `Sex`, `Home_Address`) VALUES
(5, 'leunamme', '', 'atutubo', '2002-12-08', '12341', 'F', '83 Block 4 Extension West Rembo East Rembo');

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `idAdmin_Account` int(11) NOT NULL,
  `Email_Add` varchar(45) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `National_ID_no` varchar(191) NOT NULL,
  `verify_token` varchar(191) NOT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`idAdmin_Account`, `Email_Add`, `Name`, `Password`, `National_ID_no`, `verify_token`, `verify_status`, `created_at`) VALUES
(11, 'hmaroto.k11939940@umak.edu.ph', 'leunamme atutubo', '$2y$10$R8TwJZlygdNCknH/o8lupey2iOec9rDDjwgqHPOZo1xG5wSM1qfKy', '12341', 'b6a5a161bea701532818218629d40203', 1, '2024-01-09 02:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `admin_post`
--

CREATE TABLE `admin_post` (
  `idAdmin_Post` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `page_name` varchar(45) NOT NULL,
  `remarks` varchar(191) NOT NULL,
  `event_name` varchar(191) NOT NULL,
  `event_limit` int(191) NOT NULL,
  `filename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin_post`
--

INSERT INTO `admin_post` (`idAdmin_Post`, `idAdmin`, `DateTime`, `page_name`, `remarks`, `event_name`, `event_limit`, `filename`) VALUES
(61, 8, '2023-12-10 17:00:10', 'CITIZEN-DASH', 'PWD', '', 0, 'event_poster6575ee9a87b458.10210572.png'),
(68, 10, '2024-01-08 08:20:59', 'CITIZEN-DASH', 'PWD', '', 0, 'event_poster659bb06b5743d0.65851972.png'),
(69, 10, '2024-01-08 08:22:47', 'PROGRAMS', 'PWD', '', 0, 'event_poster659bb0d788c260.06395416.png');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `idapply` int(191) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `idSeeker` int(191) NOT NULL,
  `Bday` date NOT NULL,
  `Phone_no` varchar(12) NOT NULL,
  `Email` varchar(191) NOT NULL,
  `Address` varchar(191) NOT NULL,
  `Role` varchar(191) NOT NULL,
  `Filename` varchar(200) NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_of_application` varchar(20) NOT NULL,
  `hiring_status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`idapply`, `Name`, `idSeeker`, `Bday`, `Phone_no`, `Email`, `Address`, `Role`, `Filename`, `submitted_at`, `status_of_application`, `hiring_status`) VALUES
(20, 'Catherine Perez', 3, '2024-12-12', '09054278144', 'bernardothea678@gmail.com', '83 Block 4 Extension West Rembo', 'Yaya', 'Perez_Catherine1704976422.docx', '2024-01-11 14:48:29', 'ACCEPTED', 'REJECTED'),
(21, 'leunamme atutubo', 3, '2024-12-12', '09054278144', 'leunammerosev.atutubo@gmail.com', '83 Block 4 Extension West Rembo', 'Taga-laba', 'atutubo_leunamme1704985788.docx', '2024-01-11 15:10:21', 'ACCEPTED', ''),
(22, 'leunamme atutubo', 3, '2025-12-12', '09054278144', 'leunammerosev.atutubo@gmail.com', '83 Block 4 Extension West Rembo', 'All-arround', 'atutubo_leunamme1704986343.docx', '2024-01-12 05:12:11', 'ACCEPTED', ''),
(23, 'Micolle Sagun', 4, '2002-12-10', '09054632685', 'mzsagun03@gmail.com', '83 Block 4 Extension West Rembo', 'All-arround', 'Sagun_Micolle1705038093.docx', '2024-01-12 05:44:11', 'ACCEPTED', 'ACCEPTED'),
(24, 'Micolle Sagun', 4, '2000-01-12', '095646666432', 'mzsagun03@gmail.com', '83 Block 4 Extension West Rembo', 'Hardinero', 'Sagun_Micolle1705039725.docx', '2024-01-12 06:10:52', 'ACCEPTED', 'ACCEPTED'),
(26, 'Micolle Sagun', 4, '2000-02-12', '09545689744', 'mzsagun03@gmail.com', '83 Block 4 West Rembo', 'Taga-luto', 'Sagun_Micolle1705106654.docx', '2024-01-13 00:46:07', 'ACCEPTED', 'ACCEPTED'),
(27, 'Micolle Sagun', 4, '2000-02-12', '02659854999', 'mzsagun03@gmail.com', '83 block 4 east rembo', 'Taga-laba', 'Sagun_Micolle1705107047.docx', '2024-01-13 00:53:11', 'ACCEPTED', 'ACCEPTED');

-- --------------------------------------------------------

--
-- Table structure for table `citizen`
--

CREATE TABLE `citizen` (
  `idCitizen` int(11) NOT NULL,
  `NATIONAL_ID_NO` varchar(15) DEFAULT NULL,
  `SURNAME` varchar(12) DEFAULT NULL,
  `FIRSTNAME` varchar(18) DEFAULT NULL,
  `MIDDLENAME` varchar(15) DEFAULT NULL,
  `DISABILITY_TYPE` varchar(28) DEFAULT NULL,
  `HOUSE_NO` varchar(6) DEFAULT NULL,
  `STREET` varchar(11) DEFAULT NULL,
  `BARANGAY` varchar(10) DEFAULT NULL,
  `BIRTHDAY` date DEFAULT NULL,
  `SEX` varchar(1) DEFAULT NULL,
  `REMARKS` varchar(8) DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `citizen`
--

INSERT INTO `citizen` (`idCitizen`, `NATIONAL_ID_NO`, `SURNAME`, `FIRSTNAME`, `MIDDLENAME`, `DISABILITY_TYPE`, `HOUSE_NO`, `STREET`, `BARANGAY`, `BIRTHDAY`, `SEX`, `REMARKS`, `age`) VALUES
(1, '137602007-0140', 'Abad', 'Mark Niño', 'J.', 'Chronis Illness', '182-B', '19TH AVENUE', 'EAST REMBO', '1976-01-02', 'M', NULL, 47),
(2, '137602007-0178', 'Abalajen', 'Aquilino Jr', 'Sablayan', 'Chronis Illness', '139-H', '15TH AVENUE', 'EAST REMBO', '1961-11-07', 'M', NULL, 62),
(3, '137602007-0629', 'Abao', 'Sheryl Laksmi', 'Santillan', '', '113-A', '8TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(4, '137602007-0497', 'Abaroa', 'Alexis', 'Nido', '', '187-A', '27TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(5, '137602007-0626', 'Abellera', 'Rodolfo', 'Rillon', '', '189-I', '28TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(6, NULL, 'Abines', 'Desiree Ann', 'T.', 'Mental Disability', 'B-125', '29TH AVENUE', 'EAST REMBO', '1988-08-29', 'F', NULL, 35),
(7, '137602007-0358', 'Abonales', 'Walter', 'Garcia', '', '165-C', '21ST AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(8, '137602007-0532', 'Abuan', 'Annabel', 'Tumala', '', '161-R', '19TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(9, '137602007-0280', 'Adan', 'Dahlia', 'Timbal', '', '181-O', '25TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(10, '137602007-0472', 'Adriatico', 'Henry', 'Buitizon', '', '111-N', '8TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(11, '137602007-0197', 'Agamao', 'Edmar', 'Ocenada', 'Mental Disability', '88', '29TH AVENUE', 'EAST REMBO', '1988-05-04', 'M', NULL, 35),
(12, '137602007-0569', 'Agne', 'Francisco', 'Laungayan', '', '167-H', '22ND AVENE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(13, '137602007-0236', 'Agpalo', 'Lucia', 'Sacay', 'Orthopedic Disability', '111-O', '8TH AVENUE', 'EAST REMBO', '1978-09-01', 'F', NULL, 45),
(14, NULL, 'Agtalao', 'Marinel', 'Ulap', 'Hearing Disability', '141-B', '15TH AVENUE', 'EAST REMBO', '1956-08-27', 'M', NULL, 67),
(15, '137602007-0382', 'Agub', 'Eriza', 'Dela Cruz', '', '193-C', '29TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(16, '137602007-0541', 'Aguila Jr.', 'Francisco', 'Relingado', 'Psychosocial Disability', '140-B', '8TH AVENUE', 'EAST REMBO', '1983-04-18', 'M', NULL, 40),
(17, '137602007-0002', 'Aguilar', 'John Carlo', 'Egonia', 'Psychosocial Disability', '111-C', '8TH AVENUE', 'EAST REMBO', '1994-08-04', 'M', NULL, 29),
(18, NULL, 'Aguilar', 'John Paul', 'Egonia', 'Learning Disability', '131-L', '13TH AVENUE', 'EAST REMBO', '1997-05-15', 'M', NULL, 26),
(19, '137602007-0515', 'Aguinaldo', 'Erlinda', 'Jaluage', '', '165-U', '22ND AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(20, '137602007-0163', 'Agustin', 'Ronald', 'Sajor', 'Visual Disability', '111-L', '8TH AVENUE', 'EAST REMBO', '1978-04-02', 'M', NULL, 45),
(21, '137602007-0544', 'Albino', 'Eric', 'Purificacion', '', '149-H', '18TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(22, '137602007-0583', 'Alcuaz', 'Oscar', 'De Guzman', '', '130-A', '5TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(23, '137602007-0404', 'Alcudia', 'Angelo', 'Bacale', '', '153-C', '18TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(24, '137602007-0328', 'Alcudia', 'Mary Ann', 'Payadan', '', '153-C', '18TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(25, '137602007-0134', 'Alinsangan', 'Samantha Claire', 'Cotoner', 'Hearing Disability', '193-4', '29TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(26, '137602007-0453', 'Aloba', 'Zyra', 'Benitez', '', '119-H', '10TH AVENUE', 'EAST REMBO', NULL, NULL, 'DECEASED', NULL),
(27, '137602007-0575', 'Alonzo', 'Freahha Joy', '', '', '163-G', '20TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(28, '137602007-0147', 'Amen', 'Alvin', 'Paraiso', 'Orthopedic Disability', '152-G', '13TH AVENUE', 'EAST REMBO', '1993-05-29', 'M', NULL, 30),
(29, NULL, 'Amores', 'Myrna', 'Bulatao', 'Chronic Illness', '157-R', '13TH AVENUE', 'EAST REMBO', '1954-01-04', 'F', NULL, 69),
(30, '137602007-0564', 'Anaviso', 'Henrietta Anne', 'Jimeno', '', '187-G', '27TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(31, '137602007-0394', 'Andrion', 'Jett Marius', 'Bragado', '', '22', '29TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(32, '137602007-0381', 'Anido', 'Raizen', 'Belitor', '', '171-Z', '22ND AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(33, '137602007-0470', 'Antonio', 'Jerome Ian', 'Escueta', '', '115-D', '8TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(34, '137602007-0202', 'Apuya', 'Antonia Emily', 'Macabecha', 'Multiple Disability', '129-G', '12TH AVENUE', 'EAST REMBO', '2003-09-03', 'F', NULL, 20),
(35, '137602007-0638', 'Aquino', 'Agnes', 'Ricatcho', '', '109-O', '7TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(36, '137602007-0003', 'Ariaga', 'Ma. Angelica', 'Claudio', 'Speech Impairement', '127-L', '12TH AVENUE', 'EAST REMBO', '2001-06-16', 'F', NULL, 22),
(37, '137602007-0566', 'Arvesu', 'Josephine', 'Tan', '', '192-B', '11TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(38, '137602007-0001', 'Asenita', 'Ralito', 'Ortiz', 'Mental Disability', '179-ZB', '2ND AVENUE', 'EAST REMBO', '1965-02-04', 'M', NULL, 58),
(39, '137602007-0301', 'Aseo', 'Adonis', 'Rato', '', '191-U', '28TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(40, NULL, 'Aseo', 'Joana Liza', 'Agnes', '', '191-U', '28TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(41, '137602007-0500', 'Asopra', 'Maria Cristina', 'Orido', '', '115-C', '9TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(42, NULL, 'Atiles', 'Geremy Bianca', 'Botor', 'Learning Disability', '169-J', '22ND AVENUE', 'EAST REMBO', '2005-09-19', 'F', NULL, 18),
(43, '137602007-0238', 'Austria', 'Alfonso Cyrus', 'Cabilogan', 'Visual Disability', '151-P', '18TH AVENUE', 'EAST REMBO', '2014-09-29', 'M', NULL, 9),
(44, '137602007-0165', 'Averia', 'Joselito', 'Yaguel', 'Psychosocial Disability', '178-D', '18TH AVENUE', 'EAST REMBO', '1975-07-30', 'F', NULL, 48),
(45, '137602007-0119', 'Babaran', 'Jocelyn', 'Mondala', 'Chronic Illness', '179-ZA', '24TH AVENUE', 'EAST REMBO', '1978-04-22', 'F', NULL, 45),
(46, '137602007-0226', 'Bacani', 'Joseph', 'Ponciano', 'Psychosocial Disability', '169-U', '22ND AVENUE', 'EAST REMBO', '1976-06-19', 'M', NULL, 47),
(47, '137602007-0154', 'Bacongan', 'Jasmine', 'Elejida', 'Visual Disability', '78', '29TH AVENUE', 'EAST REMBO', '1987-04-27', 'F', NULL, 36),
(48, '137602007-0559', 'Bagul', 'Aidal Rajeeb', 'Gargalicana', '', '193-F', '29TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(49, NULL, 'Baisa', 'Chenille Joyce', '', 'Speech Impairement', '171-VI', '22ND AVENUE', 'EAST REMBO', '2001-07-01', 'F', NULL, 22),
(50, NULL, 'Bajar', 'Jessica Michelle', 'Fegarido', '', '111-O', '8TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(51, '137602007-0317', 'Balancio', 'Flora', 'Parajas', '', '111-Q', '8TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(52, NULL, 'Balao Jr.', 'Ernesto', 'Quider', 'Multiple Disability', '167-I', '2ND AVENUE', NULL, '1988-10-21', 'M', NULL, 35),
(53, '137602007-0557', 'Balbin', 'Junniño', 'Santiago', '', '117-K', '9TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(54, '137602007-0157', 'Baldeo', 'Darwin', 'Bergunio', 'Speech Impairement', '165-U', '22ND AVENUE', 'EAST REMBO', '1993-08-22', 'M', NULL, 30),
(55, '137602007-0083', 'Baldon', 'Jon Roule', 'Hipolito', 'Learning Disability', '173-B', '23RD AVENUE', 'EAST REMBO', '2002-03-07', 'M', NULL, 21),
(56, '137602007-0612', 'Bañaga', 'Kyle Accel', 'Villanueva', '', '111-O', '8TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(57, '137602007-0468', 'Bandin', 'Evelina', 'Laid', '', '151-I', '18TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(58, '137602007-0249', 'Bañez', 'Eduardo Jr.', 'Salut', 'Orthopedic Disability', '193-E', '30TH AVENUE', 'EAST REMBO', '1999-03-26', 'M', NULL, 24),
(59, '137602007-0603', 'Baniqued', 'Mario', 'Alcantara', '', '185-S2', '27TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(60, '137602007-0496', 'Barcelo', 'Marilou', 'Pama', '', '180-C', '19TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(61, '137602007-0607', 'Barrentos', 'Maria Christina', 'Bacani', '', '169-U', '22ND AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(62, '137602007-0250', 'Barroza', 'Salvacion', 'Gaspi', 'Orthopedic Disability', '147-I', '17TH AVENUE', 'EAST REMBO', '1953-01-11', 'M', NULL, 70),
(63, '137602007-0449', 'Bartolome', 'Ferdinand', 'Domingo', '', '95-B', '4TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(64, '137602007-0464', 'Basa', 'Mary Grace', '', '', '165-I', '20TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(65, NULL, 'Batang', 'Jhon Mark', 'D.', 'Mental Disability', '149', '17TH AVENUE', 'EAST REMBO', '2006-01-06', 'M', NULL, 17),
(66, '137602007-0342', 'Bathan', 'King Josef', 'Ramirez', '', '133-H', '13TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(67, NULL, 'Battad', 'Mark Albert', 'O.', 'Learning Disability', '147-S', '17TH AVENUE', 'EAST REMBO', '1999-10-15', 'M', NULL, 24),
(68, '137602007-0614', 'Batucan', 'Maria Jocelyn', 'De Leon', '', '177-F', '23RD AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(69, '137602007-0004', 'Bautista', 'Jarald', 'Balicad', '', '189-U', '28TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(70, '137602007-0516', 'Bautista', 'Rosalinda', 'Laurente', '', '189-U', '28TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(71, '137602007-0005', 'Bautista Jr.', 'Virgilio', 'Rasos', 'Speech Impairement', '101', '28TH AVENUE', 'EAST REMBO', '1990-05-18', 'M', NULL, 33),
(72, '137602007-0570', 'Bauzon', 'Marilyn', 'Gonzaga', '', '141-T', '16TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(73, '137602007-0127', 'Bearis', 'Angustia', 'Pontanal', 'Psychosocial Disability', '171-B', '22ND AVENUE', 'EAST REMBO', '1964-05-04', 'F', NULL, 59),
(74, '137602007-0395', 'Belleza', 'Catriona Adeen', 'Solis', '', '85-C', '1ST AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(75, '137602007-0267', 'Benitez', 'Ronald', 'Sabio', '', '119-H', '10TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(76, '137602007-0260', 'Berhay', 'Aljone', 'Dosado', '', '127-L', '12TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(77, '137602007-0114', 'Bermas', 'Mary Grace', 'Batalla', 'Visual Disability', '181-Y', '24TH AVENUE', 'EAST REMBO', '1988-12-06', 'F', NULL, 34),
(78, '137602007-0405', 'Bernal', 'Noel', 'Villar', '', '145-D', '16TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(79, '137602007-0241', 'Beseril', 'Felix Iii', 'Taway', 'Learning Disability', '187-Q', '27TH AVENUE', 'EAST REMBO', '2014-04-08', 'M', NULL, 9),
(80, '137602007-0211', 'Beseril', 'John Paul', 'Taway', 'Orthopedic Disability', '147-Q', '17TH AVENUE', 'EAST REMBO', '2003-06-18', 'M', NULL, 20),
(81, '137602007-0293', 'Bioncio', 'Davis Apollo', 'Milan', '', '143-Q', '16TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(82, '137602007-0234', 'Bisoñia', 'Linda', 'Calampiano', 'Orthopedic Disability', '165-U', '22ND AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(83, '137602007-0120', 'Bomediano', 'Luz', 'Denzo', 'Mental Disability', '181-L', '25TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(84, '137602007-0359', 'Bondoc', 'Avelina', 'Marquez', '', '151-F', '18TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(85, '137602007-0581', 'Buena', 'Christian', 'Pardilla', '', '147-P', '17TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(86, NULL, 'Briz', 'Jim', 'Bautista', 'Orthopedic Disability', '147-Q', '17TH AVENUE', 'EAST REMBO', '1957-07-17', 'M', NULL, 66),
(87, '137602007-0084', 'Bulauan', 'Criselda', 'Atayde', 'Orthopedic Disability', '151-A', '18TH AVENUE', 'EAST REMBO', '1972-01-15', 'F', NULL, 51),
(88, '137602007-0006', 'Bumanglag', 'Arlene', 'Alera', 'Orthopedic Disability', '177-C', '24TH AVENUE', 'EAST REMBO', '1962-09-15', 'F', NULL, 61),
(89, '137602007-0458', 'Bumanglag', 'Mary Jane', 'Cabatoan', '', '177-C', '24TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(90, '137602007-0362', 'Burgos', 'Jason', 'Burcer', '', '165-H', '21ST AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(91, '137602007-0363', 'Burgos', 'Joseph Bryan', 'Burcer', '', '165-H', '21ST AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(92, '137602007-0525', 'Bustria', 'Noel', 'Raymundo', '', '169-K', '22ND AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(93, '137602007-0219', 'Cabactulan', 'Meraloth', 'Sabellina', 'Mental Disability', '169-J', '22ND AVENUE', 'EAST REMBO', '1984-07-02', 'F', NULL, 39),
(94, NULL, 'Caballero', 'Rolando', 'D.', 'Chronic Illness', '199-A', '10TH AVENUE', 'EAST REMBO', '1962-02-26', 'M', NULL, 61),
(95, '137602007-0007', 'Cabugwang', 'Christopher Jr.', 'Taguinod', 'Hearing & Speech Impairement', '145', '17TH AVENUE', 'EAST REMBO', '1997-11-18', 'M', NULL, 26),
(96, '137602007-0105', 'Cachola', 'Sharon Lowelyn', 'Soliven', 'Learning Disability', '185-F', '27TH AVENUE', 'EAST REMBO', '1978-01-12', 'F', NULL, 45),
(97, '137602007-0243', 'Calderon', 'Margarita', 'Untivero', 'Orthopedic Disability', '161-B', '20TH AVENUE', 'EAST REMBO', '1964-05-26', 'F', NULL, 59),
(98, '137602007-0537', 'Calderon', 'Marijo', 'Rivera', '', '139-S', '14TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(99, '137602007-0283', 'Calixterio', 'Miacah', 'Saclote', '', '157-C', '19TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(100, '137602007-0459', 'Callao', 'Zander Yuan', 'Jaynario', '', '179-J', '24TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(101, '137602007-0335', 'Callueng', 'Zeny', 'Velasquez', '', '179-R', '24TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(102, '137602007-0534', 'Callueng', 'Christopher', 'Velasquez', '', '179-R', '24TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(103, '137602007-0281', 'Calvo', 'Joel', 'Transfiguracion', '', '159-P', '19TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(104, '137602007-0008', 'Camacho', 'Mark David', 'Umayam', 'Learning Disability', '147-U', '17TH AVENUE', 'EAST REMBO', '1996-01-22', 'M', NULL, 27),
(105, '137602007-0295', 'Camacho', 'Mary Ann', 'Umayam', '', '147-U', '17TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(106, '137602007-0492', 'Camacho', 'Marilou', 'Magana', '', '147-U', '17TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(107, '137602007-0606', 'Camacho Jr.', 'Oscar', 'Lopena', '', '147-U', '17TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(108, '137602007-0009', 'Cambaling', 'Lea', 'Laplano', 'Learning Disability', '139-S', '14TH AVENUE', 'EAST REMBO', '1992-07-22', 'F', NULL, 31),
(109, '137602007-0327', 'Candelario', 'Ma. Fermina', 'Jimenez', '', '153-P', '19TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(110, NULL, 'Candilanza', 'Anita', 'G.', 'Orthopedic Disability', '161-I', '20TH AVENUE', 'EAST REMBO', '1956-01-27', 'F', NULL, 67),
(111, '137602007-0373', 'Canta', 'Carlito Kristopher', 'Lanuza', '', '129-H', '12TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(112, '137602007-0086', 'Cantano', 'Rizaldy', 'Perez', 'Mental Disability', '171-G', '22ND AVENUE', 'EAST REMBO', '1971-12-30', 'M', NULL, 51),
(113, '137602007-0482', 'Capio', 'Lucia', 'Calcaben', '', '141-F', '15TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(114, '137602007-0440', 'Carascon', 'Ramon', 'Mabbagu', '', '193-C', '20TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(115, '137602007-0465', 'Cardona', 'Maricel', 'Paraiso', '', '183-O', '25TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(116, '137602007-0196', 'Carido', 'Roi', 'Ordoñez', 'Orthopedic Disability', '179-Q', '24TH AVENUE', 'EAST REMBO', '2004-07-19', 'M', NULL, 19),
(117, '137602007-0010', 'Cariño', 'Jasper John', 'Royol', 'Learning Disability', '93-H', '4TH AVENUE', 'EAST REMBO', '1992-02-02', 'M', NULL, 31),
(118, '137602007-0067', 'Cariño', 'Jesus Noel', 'Laynesa', 'Mental Disability', '97-C', '4TH AVENUE', 'EAST REMBO', '1966-04-23', 'M', NULL, 57),
(119, '137602007-0348', 'Caritativo', 'Chelsea Ericka', 'Aguilar', '', '97-E', '4TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(120, '137602007-0450', 'Carrasal', 'Ayatollah Hamza', 'Dugayo', '', '189-H', '28TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(121, '137602007-0409', 'Casa', 'Jennifer', 'Paris', '', '189-A', '28TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(122, '137602007-0641', 'Casinao', 'Roy Leuan', 'Dinson', '', '149-Y', '18TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(123, '137602007-0421', 'Castillo', 'Rafael', 'Brioso', '', '165-G', '21ST AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(124, '137602007-0339', 'Castillo', 'Lhanz Joshua', 'Licudine', '', '139-E', '15TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(125, '137602007-0128', 'Castro', 'Mary Joy', 'Grumba', '', '163-R', '20TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(126, NULL, 'Castro', 'Lance Riley', 'Cabanban', '', '171-N', '23RD AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(127, '137602007-0291', 'Catalan', 'John Zyryz', 'Maranan', '', '183-F', '25TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(128, '137602007-0374', 'Catalan', 'Yiennah Zhien', 'Villar', '', '183-F', '25TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(129, '137602007-0479', 'Catausan', 'Cecilia', 'Diosay', '', '159-A', '20TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(130, '137602007-0160', 'Cejalvo', 'Marck Justice', 'Matuguina', 'Hearing Disability', '179-I', '24TH AVENUE', 'EAST REMBO', '1998-06-22', 'M', NULL, 25),
(131, '137602007-0064', 'Centeno', 'Samantha Kayla', 'Sunga', 'Learning Disability', '157-N', '19TH AVENUE', 'EAST REMBO', '1997-09-04', 'F', NULL, 26),
(132, '137602007-0402', 'Cercado', 'Myralene', 'Medina', '', '135-C', '14TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(133, '137602007-0599', 'Ceredon', 'Joan', 'Vidal', '', '29', '29TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(134, '137602007-0522', 'Chavez', 'Catalino', 'Bituin', '', '187-N', '27TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(135, '137602007-0393', 'Chunaco', 'Shean Bernadette', 'Q.', '', '161-A', '20TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(136, '137602007-0206', 'Clarito', 'Corazon', 'Anadase', 'Orthopedic Disability', '150-B', '11TH AVENUE', 'EAST REMBO', '1959-01-16', 'F', NULL, 64),
(137, '137602007-0408', 'Claveria', 'Atalia Bernice', '-', '', '157-P', '19TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(138, NULL, 'Condalor', 'Gabriel Josh', 'T.', 'Orthopedic Disability', '144-A', '10TH AVENUE', 'EAST REMBO', '2004-12-19', 'M', NULL, 18),
(139, '137602007-0199', 'Condes', 'Rolando Jr.', 'Bringas', 'Multiple Disability', '143-D', '16TH AVENUE', 'EAST REMBO', '2010-09-03', 'M', NULL, 13),
(140, '137602007-02552', 'Constantino', 'Reynaldo', 'Francisco', 'Orthopedic Disability', '147-V', '17TH AVENUE', 'EAST REMBO', '1969-09-11', 'M', NULL, 54),
(141, NULL, 'Corda', 'Giselle Mae', 'P.', 'Visual Disability', '111-V', '8TH AVENUE', 'EAST REMBO', '1999-08-05', 'F', NULL, 24),
(142, '137602007-0554', 'Cordova', 'Nikki', 'Iremedio', '', '155-N', '19TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(143, '137602007-0012', 'Cornelio', 'John Kenaniah', 'Santiago', 'Learning Disability', '89-C', '2ND AVENUE', 'EAST REMBO', '1996-03-21', 'M', NULL, 27),
(144, NULL, 'Cornelio', 'Grazhiela Kaye', 'Santiago', 'Multiple Disability', '89-C', '2ND AVENUE', 'EAST REMBO', '1999-11-10', 'F', NULL, 24),
(145, '137602007-0172', 'Cornelio', 'Mary Ann', 'Santiago', 'Hearing Disability', '89-C', '2ND AVENUE', 'EAST REMBO', '1959-09-05', 'F', NULL, 64),
(146, NULL, 'Cornelio', 'Dante', 'Aldea', '', '89-C', '2ND AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(147, '137602007-0013', 'Corpuz', 'Francis', 'Mallari', 'Visual Disability', '155-C', '19TH AVENUE', 'EAST REMBO', '1964-02-21', 'M', NULL, 59),
(148, '137602007-0063', 'Cortel', 'Danilo', 'M.', 'Orthopedic Disability', '97-C', '4TH AVENUE', 'EAST REMBO', '1967-12-20', 'M', NULL, 55),
(149, '137602007-0176', 'Crisostomo', 'Emmmanuel', 'Colina', 'Multiple Disability', '141-N', '16TH AVENUE', 'EAST REMBO', '1995-04-26', 'M', NULL, 28),
(150, '137602007-0571', 'Cruz', 'Rosalie', 'De Guzman', '', '177-E', '24TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(151, '137602007-0235', 'Cuaresma', 'Mattea Miah', 'Flores', 'Hearing & Speech Impairement', '167-S', '20TH AVENUE', 'EAST REMBO', '2012-12-14', 'F', NULL, 10),
(152, '137602007-0507', 'Cualang', 'Jerome', 'Ramos', '', '1-A', 'LANCER ST.', 'EAST REMBO', NULL, NULL, NULL, NULL),
(153, '137602007-0168', 'Cunanan', 'Axel Gian', 'Benitez', 'Speech Impairement', '109-J', '7TH AVENUE', 'EAST REMBO', '2006-09-02', 'M', NULL, 17),
(154, '137602007-0623', 'Cunanan', 'Gloria', 'Benitez', '', '109-J', '7TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(155, '137602007-0415', 'Cupa', 'Sandra Mae', 'Cruz', '', '165-U', '22ND AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(156, '137602007-0129', 'Custodio', 'Mercedita', 'Ovejera', 'Chronic Illness', '163-E', '21ST AVENUE', 'EAST REMBO', '1965-07-27', 'F', NULL, 58),
(157, NULL, 'Dacian', 'Marilyn', 'Moreno', 'Speech Impairement', '109-J', '7TH AVENUE', 'EAST REMBO', '1958-06-12', 'F', NULL, 65),
(158, '137602007-0478', 'Dacoycoy', 'Arthur Ii', 'Sinchioco', '', '191-L', '28TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(159, '137602007-0224', 'Dacut', 'Lourdes', 'Pagarao', 'Orthopedic Disability', '149-J', '18TH AVENUE', 'EAST REMBO', '1962-12-31', 'F', NULL, 60),
(160, '137602007-0014', 'Dag-O', 'Reigner Jarev', 'Naval', 'Learning Disability', '193-C', '29TH AVENUE', 'EAST REMBO', '2004-03-20', 'M', NULL, 19),
(161, '137602007-0082', 'Dalan', 'Adrian Mark', 'Agravante', 'Speech Impairement', '155-Z', '19TH AVENUE', 'EAST REMBO', '1999-08-14', 'M', NULL, 24),
(162, '137602007-0475', 'Dangcalan', 'Joseph', 'Galza', '', '144-B', '10TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(163, '137602007-0354', 'Daquioag', 'Brianna Bryce', 'Gonzales', '', '159-Q', '19TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(164, '137602007-0015', 'David', 'Aimee Benielyn', 'Mantez', 'Speech Impairement', '165-U', '22ND AVENUE', 'EAST REMBO', '2003-04-16', 'F', NULL, 20),
(165, '137602007-0376', 'David', 'Yolanda', 'Medina', '', '155-F', '19TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(166, '137602007-0174', 'Dayacap', 'Melvin', 'Soliman', 'Multiple Disability', '135-E', '14TH AVENUE', 'EAST REMBO', '1971-10-19', 'M', NULL, 52),
(167, NULL, 'Dayandante', 'Elijah Joy', 'D.', 'Learning Disability', '157-K', '19TH AVENUE', 'EAST REMBO', '1996-12-11', 'F', NULL, 26),
(168, '137602007-0191', 'De Guzman', 'Bernardo', 'Rivera', 'Visual Disability', '181-O', '25TH AVENUE', 'EAST REMBO', '1975-04-07', 'F', NULL, 48),
(169, '137602007-0543', 'De Jose', 'Ma.Theresa', 'Japson', '', '177-N', '24TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(170, '137602007-0277', 'De Las Alas', 'Janice', 'Senupe', '', '177-D', '24TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(171, '137602007-0068', 'De Leon', 'Jenny Roselyn', 'I.', 'Speech Impairement', '193-C', '29TH AVENUE', 'EAST REMBO', '2004-02-16', 'F', NULL, 19),
(172, '137602007-0297', 'De Leon', 'Mark Allan', 'Alcaraz', '', '191-U', '28TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(173, '137602007-0132', 'De Lumban', 'Alberto', 'Favor', 'Chronic Illness', '151-B', '18TH AVENUE', 'EAST REMBO', '1966-10-18', 'M', NULL, 57),
(174, '137602007-0578', 'Decena', 'Leilani', 'Villaflor', '', '129-H', '12TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(175, '137602007-0313', 'Dela Cruz', 'Edmundo', 'Ibabao', '', '193-C', '29TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(176, '137602007-0284', 'Dela Cruz', 'Les Duvet', 'Manaoat', '', '181-I', '25TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(177, '137602007-0017', 'Dela Cruz', 'Loreto Jr.', 'Asuncion', 'Orthopedic Disability', '193-C', '29TH AVENUE', 'EAST REMBO', '1996-01-25', 'M', NULL, 27),
(178, '137602007-0489', 'Dela Cruz', 'Rizalino', 'Manaois', '', '119-E', '10TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(179, NULL, 'Dela Cruz', 'Rolando', 'Eden', 'Hearing & Speech Impairement', '183-H', '25TH AVENUE', 'EAST REMBO', '1958-06-13', 'M', NULL, 65),
(180, '137602007-0177', 'Dela Cuesta', 'Napoleon Jr.', 'Lorenzo', 'Chronic Illness', '158-C', '14TH AVENUE', 'EAST REMBO', '1963-03-16', 'M', NULL, 60),
(181, '137602007-0099', 'Dela Rosa', 'Earl John', 'Montalban', 'Chronic Illness', '57', '29TH AVENUE', 'EAST REMBO', '1982-11-15', 'M', NULL, 41),
(182, '137602007-0496', 'Delamota', 'Donne Elijah', 'Solis', '', '155-R', '19TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(183, NULL, 'Delerio', 'Jefer Son', 'O.', '', '189-S', '28TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(184, '137602007-0021', 'Delmendo', 'Eric', 'Aguilar', 'Hearing & Speech Impairement', '193-R', '29TH AVENUE', 'EAST REMBO', '1976-06-23', 'M', NULL, 47),
(185, '137602007-0491', 'Deloeste', 'Eduardo', 'T.', '', '165-V', '21ST AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(186, '137602007-0533', 'Delovino', 'Renato', 'Abilil', '', '171-P', '22ND AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(187, '137602007-0535', 'Delovino', 'Leonardo', 'Abilil', '', '171-P', '22ND AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(188, '137602007-0477', 'Diaz', 'Krista Matel', 'Marquez', '', '103-C', '6TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(189, '137602007-0639', 'Dimalanta', 'Lucy', 'M.', '', '193-R', '29TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(190, '137602007-0018', 'Dimayuga', 'Stella Franz', 'Cerdeña', 'Speech Impairement', '165-V', '21ST AVENUE', 'EAST REMBO', '1999-09-17', 'F', NULL, 24),
(191, '137602007-0481', 'Dionio', 'Jean Dominique', 'D.', '', '171-P', '22ND AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(192, '137602007-0601', 'Dizon', 'Christopher Ivan', 'Guiling', '', '171-P', '22ND AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(193, '137602007-0624', 'Dizon', 'Gabriel Jacob', 'Ferber', '', '103-C', '6TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(194, '137602007-0463', 'Domingo', 'Jessica', 'Junio', '', '193-R', '29TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(195, '137602007-0407', 'Dulin', 'Mac Vince', 'Palattao', '', '165-V', '21ST AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(196, '137602007-0207', 'Dungaran', 'Enzo Ezekiel', 'Yat', 'Multiple Disability', '171-P', '22ND AVENUE', 'EAST REMBO', '2009-12-29', 'M', NULL, 13),
(197, '137602007-0330', 'Elep', 'Alexander', 'Molina', '', '171-P', '22ND AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(198, NULL, 'Ellazar', 'Ma. Chrystyla', 'S.', '', '103-C', '6TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(199, '137602007-0019', 'Elpedes', 'Marvin Angelo', 'Fabiana', 'Hearing Disability', '193-R', '29TH AVENUE', 'EAST REMBO', '1996-11-09', 'M', NULL, 27),
(200, '137602007-0439', 'Enclona', 'Perscila', 'Labiano', '', '165-V', '21ST AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(201, '137602007-0020', 'Ereño', 'John Renz', 'Valebia', 'Mental Disability', '171-P', '22ND AVENUE', 'EAST REMBO', '1996-06-13', 'M', NULL, 27),
(202, NULL, 'Erosa', 'Marlene', 'Cambar U', '', '171-P', '22ND AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(203, '137602007-0221', 'Escaros', 'Hanna Mae', 'Hamor', 'Mental Disability', '103-C', '6TH AVENUE', 'EAST REMBO', '1998-04-14', 'F', NULL, 25),
(204, '137602007-0451', 'Esconde', 'Ailen', 'Bangayan', '', '193-R', '29TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(205, '137602007-0319', 'Esguerra', 'Mateo Hurley', 'Camoy', '', '165-V', '21ST AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(206, '137602007-0021', 'Espela', 'Carlo', 'Delgado', 'Learning Disability', '171-P', '22ND AVENUE', 'EAST REMBO', '1998-05-24', 'M', NULL, 25),
(207, '137602007-0487', 'Espina', 'Myla Corazon', 'Lat', 'Orthopedic Disability', '171-P', '22ND AVENUE', 'EAST REMBO', '1959-09-09', 'F', NULL, 64),
(208, '137602007-0166', 'Espina', 'Wilfredo', 'Maranan', '', '185-E', '27TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL),
(209, '137602007-0117', 'Esposo', 'King Marvin', 'Arce', 'Mental Disability', '513-N', '19TH AVENUE', 'EAST REMBO', '1989-01-24', 'M', NULL, 34),
(210, '137602007-0089', 'Esteban', 'Carlos', 'Fabian', 'Hearing & Speech Impairement', '179-Z', '24TH AVENUE', 'EAST REMBO', '1989-10-17', 'M', NULL, 34),
(211, '137602007-0264', 'Estrada', 'Wilfredo', 'Patoltol', '', '149-P', '18TH AVENUE', 'EAST REMBO', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `citizen_account`
--

CREATE TABLE `citizen_account` (
  `idCitizen_Account` int(11) NOT NULL,
  `Email_Add` varchar(45) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `National_ID_no` varchar(191) NOT NULL,
  `verify_token` varchar(191) NOT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=no,1=yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `citizen_account`
--

INSERT INTO `citizen_account` (`idCitizen_Account`, `Email_Add`, `Name`, `Password`, `National_ID_no`, `verify_token`, `verify_status`, `created_at`) VALUES
(56, 'leuna.atutubo@gmail.com', 'Catherine Perez', '$2y$10$U9Lpq1qcOPmYK8Ikr0jA1uSnILAKH938IwoevxqRyobB646lIniz.', '135984635-6598', 'de0cadbafaee6949fb8eff96957161b9', 1, '2023-12-08 15:54:21'),
(58, 'leuna.sag@gmail.com', 'Lourence Villaceran', '$2y$10$Z94qmPVtGnIU19/nW/jMXuW9nUIHMnrvGvNL5uz01U5jeCQQhK7jO', '12564365987456', 'c9410a05f8b10717c6a4609f8735c12b', 0, '2024-01-05 06:18:12'),
(59, 'latutubo.k11935624@umak.edu.ph', 'rose  atutubo', '$2y$10$RXo4AOh6FCMihwEig0l/eOZULMd9PxL/YXfwdVl2RUSfEu5q8DTW6', '11122233366566', '015b718e478d1a47535e0ab2aeee8207', 1, '2024-01-05 06:47:41'),
(61, 'leuna@gmail.com', 'leunamme atutubo', '$2y$10$rWSbJD7HNJeF15mOoHG3QOTnr9FL2uxUWOa7CUj7QL.KrxxOIooF6', '1', 'a94b4bf61b96377f8257d8d9c84f4f29', 0, '2024-01-05 07:33:59'),
(64, 'leunammerosev.atutubo@gmail.com', 'Maria Althea Villaroya Bernardo', '$2y$10$0F0XEZz977cIvOSbIKW6uuKxyXH841XkJik2Wx6p.9C//DA//31Wq', '137602007-8144', '932a7710873a911c850c11f054c9cc49', 1, '2024-01-09 02:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `event_participants`
--

CREATE TABLE `event_participants` (
  `idevent_participants` int(200) NOT NULL,
  `name` varchar(191) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `address` varchar(200) NOT NULL,
  `remarks` varchar(20) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `joined_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `event_participants`
--

INSERT INTO `event_participants` (`idevent_participants`, `name`, `contact`, `address`, `remarks`, `event_name`, `joined_at`) VALUES
(22, 'thea', '123', '83 Block 4 Extension West Rembo', 'PWD', 'EDUKASYON', '2024-01-11 16:10:13'),
(23, 'Micolle', '06468', '83 Block 4 Extension West Rembo', 'Senior Citizen', 'EDUKASYON', '2024-01-11 16:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `job_details`
--

CREATE TABLE `job_details` (
  `idjob_details` int(191) NOT NULL,
  `seeker_name` varchar(191) NOT NULL,
  `idSeeker` int(191) NOT NULL,
  `idapply` int(191) NOT NULL,
  `Role` varchar(191) NOT NULL,
  `employer_name` varchar(191) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `place` varchar(191) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `hiring_status` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `job_details`
--

INSERT INTO `job_details` (`idjob_details`, `seeker_name`, `idSeeker`, `idapply`, `Role`, `employer_name`, `contact`, `place`, `date`, `time`, `hiring_status`) VALUES
(16, 'leunamme atutubo', 0, 4, 'Taga-laba', 'Micolle Sagun', '12346665', 'Sa bahay mo', '2002-12-12', '00:12:00', 'PENDING'),
(17, 'leunamme atutubo', 0, 4, 'Taga-laba', 'Micolle Sagun', '12346665', 'Sa bahay mo', '2002-12-12', '00:12:00', 'PENDING'),
(18, 'leunamme atutubo', 0, 4, 'Taga-laba', 'Micolle Sagun', '12346665', 'Sa bahay mo', '2002-12-12', '00:12:00', 'PENDING'),
(19, 'Rose Atutubo', 0, 0, '8', 'Taga-luto', '12346665', 'Sa bahay mo', '2002-12-12', '00:12:00', 'ACCEPTED'),
(20, 'Rose Atutubo', 0, 2, '8', 'Taga-luto', '12346665', 'Sa bahay mo', '2002-12-12', '00:12:00', 'PENDING'),
(21, 'Rose Atutubo', 2, 8, 'Taga-luto', 'Micolle Sagun', '12346665', 'Sa bahay mo', '2002-12-12', '00:12:00', 'ACCEPTED'),
(22, 'Catherine Perez', 3, 19, 'Hardinero', 'Maria Bernardo', '09054278144', 'sa kanto', '2024-01-12', '12:00:00', 'ACCEPTED'),
(23, 'Catherine Perez', 3, 20, 'Yaya', 'Maria', '09054278144', 'Sa bahay mo', '2024-12-12', '12:12:00', 'REJECTED'),
(24, 'Micolle Sagun', 4, 23, 'All-arround', 'Maria Althea', '09054278144', 'Brgy East Rembo Hall', '2024-01-13', '10:00:00', 'ACCEPTED'),
(25, 'Micolle Sagun', 4, 24, 'Hardinero', 'Honey Maroto', '12346665', 'west', '2024-02-12', '00:00:00', 'ACCEPTED'),
(26, 'Micolle Sagun', 4, 26, 'Taga-luto', 'Maria Bernardo', '09548978966', 'Brgy East Rembo Hall', '2024-01-14', '12:00:00', 'ACCEPTED'),
(27, 'Micolle Sagun', 4, 27, 'Taga-laba', 'Maria Bernardo', '09054278144', 'Brgy East Rembo Hall', '2024-01-14', '12:00:00', 'ACCEPTED');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `idProfile` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`idProfile`, `userid`, `status`, `filename`) VALUES
(15, 58, 1, ''),
(16, 59, 0, 'profile59.png'),
(17, 60, 0, 'profile60.png'),
(18, 61, 1, ''),
(19, 62, 1, ''),
(20, 63, 0, 'profile63.png'),
(21, 10, 1, ''),
(22, 64, 0, 'profile64.png'),
(23, 11, 0, 'profile11.jpg'),
(24, 1, 1, ''),
(25, 2, 1, ''),
(26, 3, 1, ''),
(27, 4, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `pwd_senior`
--

CREATE TABLE `pwd_senior` (
  `idPWD_SENIOR` int(254) NOT NULL,
  `VALID_ID_NO` varchar(45) NOT NULL,
  `SURNAME` varchar(254) NOT NULL,
  `FIRSTNAME` varchar(254) NOT NULL,
  `MIDDLENAME` varchar(254) DEFAULT NULL,
  `DISABILITY_TYPE` varchar(254) DEFAULT NULL,
  `PWD_ID_NO` varchar(45) DEFAULT NULL,
  `SENIOR_ID_NO` varchar(45) DEFAULT NULL,
  `HOUSE_NO` varchar(45) DEFAULT NULL,
  `STREET` varchar(45) DEFAULT NULL,
  `BARANGAY` varchar(45) DEFAULT NULL,
  `BIRTHDAY` date NOT NULL,
  `SEX` char(1) NOT NULL,
  `REMARK` varchar(10) NOT NULL,
  `AGE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pwd_senior`
--

INSERT INTO `pwd_senior` (`idPWD_SENIOR`, `VALID_ID_NO`, `SURNAME`, `FIRSTNAME`, `MIDDLENAME`, `DISABILITY_TYPE`, `PWD_ID_NO`, `SENIOR_ID_NO`, `HOUSE_NO`, `STREET`, `BARANGAY`, `BIRTHDAY`, `SEX`, `REMARK`, `AGE`) VALUES
(10, '137607007-0140', 'Maroto', 'Honey Babe', '', '', '', '12312323123', '83', 'Block 4 Extension', 'West Rembo', '1998-10-06', 'F', '', NULL),
(13, '137602007-8144', 'Bernardo', 'Maria Althea', 'Villaroya', 'Chronis Illness', '12459654113342', '13213541341235', '83', 'Block 4', 'East Rembo', '2013-11-27', 'F', '', NULL),
(14, '137602007-8144', 'Bernardo', 'Maria Althea', 'Villaroya', 'Chronis Illness', '12459654113342', '13213541341235', '83', 'Block 4', 'East Rembo', '2013-11-27', 'F', '', NULL),
(15, '137602007-8144', 'Bernardo', 'Maria Althea', 'Villaroya', 'Chronis Illness', '12459654113342', '13213541341235', '83', 'Block 4', 'East Rembo', '2013-11-27', 'M', '', NULL),
(16, '137602007-8144', 'Bernardo', 'Maria Althea', 'Villaroya', 'Chronis Illness', '12459654113342', '13213541341235', '83', 'Block 4', 'East Rembo', '2013-11-27', 'F', '', NULL),
(17, '135984635-6598', 'Perez', 'Catherine', '', 'Vision Impairment', '12459654113342', '', '83', 'Block 4 Extension', 'East Rembo', '2002-12-09', 'F', '', NULL),
(18, '123569874-6892', 'Atutubo', 'Leunamme Rose', 'Villaroya', 'Vision Impairment', '12344677', '', '83', 'Block 4', 'East Rembo', '2002-07-16', 'F', '', NULL),
(19, '12564365987456', 'Villaceran', 'Lourence', '', '', '', '', '12', '31st Ave', 'East Rembo', '2001-12-12', 'M', '', NULL),
(20, '11122233366566', 'atutubo', 'rose', '', '', '', '', '83', 'Block 4 Extension', 'West Rembo', '2002-12-09', 'F', '', NULL),
(21, '12365489756666', 'Bernardo', 'Althea', '', '', '', '', '3', '31st Ave', 'East Rembo', '2001-01-01', 'F', '', NULL),
(22, '1', 'atutubo', 'leunamme', '', '', '', '', '83', 'Block 4 Extension West Rembo', 'jiugbio', '2001-12-12', 'F', '', NULL),
(23, '124855585323', 'Evasco', 'Thea', 'Villanueva', 'visual imparement', '1487566233', '', '458', 'dito lang st.', 'East Rembo', '2002-12-09', 'F', '', NULL),
(24, '1485596252', 'Evasco', 'Thea', 'V.', 'Vision Impairment', '4859325', '', '121', 'Doon st.', 'East Rembo', '2002-12-09', 'F', '', NULL),
(25, '137602007-8144', 'Bernardo', 'Maria Althea', 'Villaroya', 'Chronis Illness', '12459654113342', '13213541341235', '83', 'Block 4', 'East Rembo', '2013-11-27', 'F', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seeker_account`
--

CREATE TABLE `seeker_account` (
  `idSeeker` int(191) NOT NULL,
  `Email_add` varchar(191) NOT NULL,
  `Name` varchar(191) NOT NULL,
  `Password` varchar(191) NOT NULL,
  `verify_token` varchar(191) NOT NULL,
  `verify_status` tinyint(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `seeker_account`
--

INSERT INTO `seeker_account` (`idSeeker`, `Email_add`, `Name`, `Password`, `verify_token`, `verify_status`, `created_at`) VALUES
(2, 'leunammerosev.mnbn@gmail.com', 'Leunamme', '$2y$10$cdnUb8/CblQcUwi99v60Euqi8ao9o2L1VQMyNqtqH1FkC9VSzNDI2', '6296e1e597415039fae1096ba41be931', 1, '2024-01-09 16:34:35'),
(3, 'bernardothea678@gmail.com', 'Catherine Perez', '$2y$10$nTD3XANrFd41Swr7ylFRYekoXj7PAr4Qzu9uufXa/TuPEiv1BMEcy', 'd77d716778f3989466ffe7c996bb0b13', 1, '2024-01-11 12:28:20'),
(4, 'mzsagun03@gmail.com', 'Micolle Sagun', '$2y$10$JstGC9ieTS9KhIhbfRtpbuzQPZDfNCcSZF6SRObH30anvPiq50dxK', '41b95597d5ee12f35770e024e9f86414', 1, '2024-01-12 05:40:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`,`National_ID_no`);

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`idAdmin_Account`,`Email_Add`,`National_ID_no`);

--
-- Indexes for table `admin_post`
--
ALTER TABLE `admin_post`
  ADD PRIMARY KEY (`idAdmin_Post`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`idapply`);

--
-- Indexes for table `citizen`
--
ALTER TABLE `citizen`
  ADD PRIMARY KEY (`idCitizen`);

--
-- Indexes for table `citizen_account`
--
ALTER TABLE `citizen_account`
  ADD PRIMARY KEY (`idCitizen_Account`,`National_ID_no`,`Email_Add`);

--
-- Indexes for table `event_participants`
--
ALTER TABLE `event_participants`
  ADD PRIMARY KEY (`idevent_participants`);

--
-- Indexes for table `job_details`
--
ALTER TABLE `job_details`
  ADD PRIMARY KEY (`idjob_details`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`idProfile`);

--
-- Indexes for table `pwd_senior`
--
ALTER TABLE `pwd_senior`
  ADD PRIMARY KEY (`idPWD_SENIOR`);

--
-- Indexes for table `seeker_account`
--
ALTER TABLE `seeker_account`
  ADD PRIMARY KEY (`idSeeker`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `idAdmin_Account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin_post`
--
ALTER TABLE `admin_post`
  MODIFY `idAdmin_Post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `idapply` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `citizen`
--
ALTER TABLE `citizen`
  MODIFY `idCitizen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `citizen_account`
--
ALTER TABLE `citizen_account`
  MODIFY `idCitizen_Account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `event_participants`
--
ALTER TABLE `event_participants`
  MODIFY `idevent_participants` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `job_details`
--
ALTER TABLE `job_details`
  MODIFY `idjob_details` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `idProfile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pwd_senior`
--
ALTER TABLE `pwd_senior`
  MODIFY `idPWD_SENIOR` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `seeker_account`
--
ALTER TABLE `seeker_account`
  MODIFY `idSeeker` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
