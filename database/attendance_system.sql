-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2026 at 11:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `2019_20`
--

CREATE TABLE `2019_20` (
  `student_id` char(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `batch_id` int(10) NOT NULL DEFAULT 1,
  `password` varchar(150) NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `2019_20`
--

INSERT INTO `2019_20` (`student_id`, `email`, `name`, `department_id`, `batch_id`, `password`, `reset_token_hash`, `reset_token_expires_at`) VALUES
('2019t01121', 'amalamal@gmail.com', 'amal', 1, 1, '', NULL, NULL),
('2019t01183', 'kamala@outlook.com', 'kamala', 1, 1, '', NULL, NULL),
('2019t01233', 'nimasha@outlook.com', 'nimasha', 1, 1, '', NULL, NULL),
('2019t01236', 'kusal123@gmail.com', 'kusal', 1, 1, '', NULL, NULL),
('2019t01347', 'ranil@g.com', 'ranil', 3, 1, '', NULL, NULL),
('2019t01387', 'kusuma@outlook.com', 'kusuma', 3, 1, '', NULL, NULL),
('2019t01388', 'kasuuu@gmail.com', 'kasun', 3, 1, '', NULL, NULL),
('2019t01399', 'dilshan@dil.com', 'dilshan', 3, 1, '', NULL, NULL),
('2019t01414', 'supun@supun.com', 'supun', 4, 1, '', NULL, NULL),
('2019t01423', 'k@gmail.com', 'kavindya', 4, 1, '', NULL, NULL),
('2019t01488', 'bbb@gmail.com', 'bimal', 4, 1, '', NULL, NULL),
('2019t01499', 'anura@gmail.com', 'anura', 4, 1, '', NULL, NULL),
('2019t01501', 'ranidu@gmail.com', 'raniduu', 2, 1, '', NULL, NULL),
('2019t01563', 'chamara@123.com', 'chamara', 2, 1, '$2y$10$EXyyjLPbE6su0LKsqxlA1eBTJt8AO.Cg.kD8L2S5MkmVtdl8jYK4y', NULL, NULL),
('2019t01565', 'dv@12.com', 'janith', 2, 1, 'dvx', NULL, NULL),
('2022t15480', 'kaveesha@d.com', 'kaveesha', 2, 1, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `2020_21`
--

CREATE TABLE `2020_21` (
  `student_id` char(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `batch_id` int(10) NOT NULL DEFAULT 2,
  `password` varchar(150) NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `2020_21`
--

INSERT INTO `2020_21` (`student_id`, `email`, `name`, `department_id`, `batch_id`, `password`, `reset_token_hash`, `reset_token_expires_at`) VALUES
('2020t01111', 'kumara@gmail.com', 'kumara', 1, 2, '', NULL, NULL),
('2020t01119', 'madawa@gmail.com', 'madawa', 1, 2, '', NULL, NULL),
('2020t01121', 'jagath@gmail.com', 'jagath', 1, 2, '', NULL, NULL),
('2020t01158', 'nisali@gmail.com', 'Nisali', 1, 2, '', NULL, NULL),
('2020t01201', 'mariya@gmail.com', 'Mariya', 3, 2, '', NULL, NULL),
('2020t01236', 'ishini@gmail.com', 'Ishini', 3, 2, '', NULL, NULL),
('2020t01276', 'perera@gmail.com', 'perera', 3, 2, '', NULL, NULL),
('2020t01296', 'kalindu@gmail.com', 'kalindu', 3, 2, '', NULL, NULL),
('2020t01422', 'yohani@gmail.com', 'Yohani', 4, 2, '', NULL, NULL),
('2020t01436', 'chamath@gmail.com', 'Chamath', 4, 2, '', NULL, NULL),
('2020t01485', 'chamathya@gmail.com', 'chamathya', 4, 2, '', NULL, NULL),
('2020t01491', 'chethiya@gmail.com', 'Chethiya', 4, 2, '', NULL, NULL),
('2020t01516', 'sitha@gmail.com', 'sitha', 2, 2, '', NULL, NULL),
('2020t01521', 'sudath@gmail.com', 'Sudath', 2, 2, '', NULL, NULL),
('2020t01564', 'kashmira@gmail.com', 'kashmira', 2, 2, '', NULL, NULL),
('2020t01594', 'yohan@gmail.com', 'yohan', 2, 2, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `2021_22`
--

CREATE TABLE `2021_22` (
  `student_id` char(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `batch_id` int(10) NOT NULL DEFAULT 3,
  `password` varchar(150) NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `2021_22`
--

INSERT INTO `2021_22` (`student_id`, `email`, `name`, `department_id`, `batch_id`, `password`, `reset_token_hash`, `reset_token_expires_at`) VALUES
('2021t01105', 'ayesh@gmail.com', 'Ayesh', 1, 3, '', NULL, NULL),
('2021t01110', 'kavindu@gmail.com', 'Kavindu', 1, 3, '', NULL, NULL),
('2021t01117', 'kavmini@gmail.com', 'Kavmini', 1, 3, '', NULL, NULL),
('2021t01148', 'nisal@gmail.com', 'Nisal', 1, 3, '', NULL, NULL),
('2021t01246', 'emasha@gmail.com', 'Emahsa', 3, 3, '', NULL, NULL),
('2021t01277', 'piyum@gmail.com', 'Piyum', 3, 3, '', NULL, NULL),
('2021t01281', 'miyuru@gmail.com', 'Miyuru', 3, 3, '', NULL, NULL),
('2021t01296', 'Sanduni@gmail.com', 'Sanduni', 3, 3, '', NULL, NULL),
('2021t01422', 'yomal@gmail.com', 'Yomal', 4, 3, '', NULL, NULL),
('2021t01441', 'apsara@gmail.com', 'Apsara', 4, 3, '', NULL, NULL),
('2021t01472', 'mashi@gmail.com', 'Mashi', 4, 3, '', NULL, NULL),
('2021t01476', 'piyumi@gmail.com', 'Piyumi', 4, 3, '', NULL, NULL),
('2021t01521', 'amali@gmail.com', 'Amali', 2, 3, '', NULL, NULL),
('2021t01526', 'prabath@gmail.com', 'Prabath', 2, 3, '', NULL, NULL),
('2021t01564', 'kavindi@gmail.com', 'Kavindi', 2, 3, '', NULL, NULL),
('2021t01594', 'sudewa@gmail.com', 'Sudewa', 2, 3, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `2022_23`
--

CREATE TABLE `2022_23` (
  `student_id` char(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `batch_id` int(10) NOT NULL DEFAULT 4,
  `password` varchar(150) NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `2022_23`
--

INSERT INTO `2022_23` (`student_id`, `email`, `name`, `department_id`, `batch_id`, `password`, `reset_token_hash`, `reset_token_expires_at`) VALUES
('2022t01115', 'lasantha@gmail.com', 'Lasantha', 1, 4, '', NULL, NULL),
('2022t01119', 'nirmani@gmail.com', 'Nirmani', 1, 4, '', NULL, NULL),
('2022t01149', 'prasanna@gmail.com', 'Prasanna', 1, 4, '', NULL, NULL),
('2022t01157', 'ovindu@gmail.com', 'Ovindu', 1, 4, '', NULL, NULL),
('2022t01250', 'kumudu@gmail.com', 'Kumudu', 3, 4, '', NULL, NULL),
('2022t01269', 'dilitgh@gmail.com', 'Dilith', 3, 4, '', NULL, NULL),
('2022t01271', 'sandali@gmail.com', 'Sandali', 3, 4, '', NULL, NULL),
('2022t01297', 'nuwan@gmail.com', 'Nuwan', 3, 4, '', NULL, NULL),
('2022t01423', 'nihidu@123', 'Nihidu', 4, 4, '', NULL, NULL),
('2022t01446', 'samadi@gmail.com', 'Samadi', 4, 4, '', NULL, NULL),
('2022t01452', 'sakuna@gmail.com', 'Sakuna', 4, 4, '', NULL, NULL),
('2022t01479', 'tharindu@gmail.com', 'Tharindu', 4, 4, '', NULL, NULL),
('2022t01516', 'prabodha@gmail.com', 'Prabodha', 2, 4, '', NULL, NULL),
('2022t01544', 'yovindu@gmail.com', 'Yovi', 2, 4, '', NULL, NULL),
('2022t01547', 'sama@gmail.com', 'saman', 2, 4, '', NULL, NULL),
('2022t01598', 'nima@gmail.com', 'Nimali', 2, 4, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `absences`
--

CREATE TABLE `absences` (
  `id` int(11) NOT NULL,
  `batch_year` varchar(8) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `date_of_absence` date NOT NULL,
  `reason` text NOT NULL,
  `proof_file_path` varchar(255) NOT NULL,
  `submission_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `ag_3101_attendance`
--

CREATE TABLE `ag_3101_attendance` (
  `ag_3101_attendance_id` int(11) NOT NULL,
  `scanned_Date` date NOT NULL,
  `scanned_Time` time NOT NULL,
  `Subject_id` int(11) NOT NULL DEFAULT 1,
  `Subject_Code` varchar(20) NOT NULL DEFAULT 'AG 3101',
  `student_id` char(10) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ag_3202_attendance`
--

CREATE TABLE `ag_3202_attendance` (
  `ag_3202_attendance_id` int(11) NOT NULL,
  `scanned_Date` date NOT NULL,
  `scanned_Time` time NOT NULL,
  `Subject_id` int(11) NOT NULL DEFAULT 2,
  `Subject_Code` varchar(20) NOT NULL DEFAULT 'AG 3202',
  `student_id` char(10) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(11) NOT NULL,
  `year` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `year`) VALUES
(1, '2019_20'),
(2, '2020_21'),
(3, '2021_22'),
(4, '2022_23');

-- --------------------------------------------------------

--
-- Table structure for table `batch_subject`
--

CREATE TABLE `batch_subject` (
  `batch_subject_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `Subject_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batch_subject`
--

INSERT INTO `batch_subject` (`batch_subject_id`, `batch_id`, `Subject_id`, `department_id`, `lecturer_id`) VALUES
(1, 1, 8, 2, 12),
(3, 3, 10, 4, 12),
(24, 1, 5, 4, 12),
(25, 1, 5, 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(1, 'IAT'),
(2, 'ICT'),
(3, 'AT'),
(4, 'ET');

-- --------------------------------------------------------

--
-- Table structure for table `et_1302_attendance`
--

CREATE TABLE `et_1302_attendance` (
  `et_1302_attendance_id` int(11) NOT NULL,
  `scanned_Date` date NOT NULL,
  `scanned_Time` time NOT NULL,
  `Subject_id` int(11) NOT NULL DEFAULT 3,
  `Subject_Code` varchar(20) NOT NULL DEFAULT 'ET 1302',
  `student_id` char(10) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `et_1303_attendance`
--

CREATE TABLE `et_1303_attendance` (
  `et_1303_attendance_id` int(11) NOT NULL,
  `scanned_Date` date NOT NULL,
  `scanned_Time` time NOT NULL,
  `Subject_id` int(11) NOT NULL DEFAULT 4,
  `Subject_Code` varchar(20) NOT NULL DEFAULT 'ET 1303',
  `student_id` char(10) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `Event_Number` int(5) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `venue` varchar(100) NOT NULL,
  `audience` varchar(100) NOT NULL,
  `document` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `Event_Number`, `topic`, `date`, `time`, `venue`, `audience`, `document`) VALUES
(18, 10, 'ewf', '2024-11-20', '13:20:00', 'werwr', 'ewrewr', 'uploads/67272abbcd0f0.jpg'),
(19, 12205, 'sefces', '2026-01-27', '21:01:00', 'sdc', 'sdc', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events_attendance`
--

CREATE TABLE `events_attendance` (
  `events_attendance_id` int(11) NOT NULL,
  `scanned_Date` date NOT NULL,
  `scanned_Time` time NOT NULL,
  `event_id` int(11) NOT NULL,
  `Event_Number` int(5) NOT NULL,
  `student_id` char(10) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events_attendance`
--

INSERT INTO `events_attendance` (`events_attendance_id`, `scanned_Date`, `scanned_Time`, `event_id`, `Event_Number`, `student_id`, `batch_id`, `department_id`) VALUES
(1, '2024-11-11', '13:25:52', 18, 10, '2019t01563', 1, 2),
(2, '2024-11-11', '00:00:00', 18, 10, '2021t01105', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ft_1101_attendance`
--

CREATE TABLE `ft_1101_attendance` (
  `ft_1101_attendance_id` int(11) NOT NULL,
  `scanned_Date` date NOT NULL,
  `scanned_Time` time NOT NULL,
  `Subject_id` int(11) NOT NULL DEFAULT 5,
  `Subject_Code` varchar(20) NOT NULL DEFAULT 'FT 1101',
  `student_id` char(10) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ft_1101_attendance`
--

INSERT INTO `ft_1101_attendance` (`ft_1101_attendance_id`, `scanned_Date`, `scanned_Time`, `Subject_id`, `Subject_Code`, `student_id`, `batch_id`, `department_id`) VALUES
(1, '2024-10-08', '07:44:00', 5, 'FT 1101', '2022t15480', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ia_4201_attendance`
--

CREATE TABLE `ia_4201_attendance` (
  `ia_4201_attendance_id` int(11) NOT NULL,
  `scanned_Date` date NOT NULL,
  `scanned_Time` time NOT NULL,
  `Subject_id` int(11) NOT NULL DEFAULT 6,
  `Subject_Code` varchar(20) NOT NULL DEFAULT 'IA 4201',
  `student_id` char(10) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ia_4202_attendance`
--

CREATE TABLE `ia_4202_attendance` (
  `ia_4202_attendance_id` int(11) NOT NULL,
  `scanned_Date` date NOT NULL,
  `scanned_Time` time NOT NULL,
  `Subject_id` int(11) NOT NULL DEFAULT 7,
  `Subject_Code` varchar(20) NOT NULL DEFAULT 'IA 4202',
  `student_id` char(10) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ic_2201_attendance`
--

CREATE TABLE `ic_2201_attendance` (
  `ic_2201_attendance` int(11) NOT NULL,
  `scanned_Date` date NOT NULL,
  `scanned_Time` time NOT NULL,
  `Subject_id` int(11) NOT NULL DEFAULT 8,
  `Subject_Code` varchar(20) NOT NULL DEFAULT 'IC 2201',
  `student_id` char(10) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ic_2201_attendance`
--

INSERT INTO `ic_2201_attendance` (`ic_2201_attendance`, `scanned_Date`, `scanned_Time`, `Subject_id`, `Subject_Code`, `student_id`, `batch_id`, `department_id`) VALUES
(1, '2024-10-02', '13:25:52', 8, 'IC 2201', '2019t01563', 1, 2),
(2, '2024-11-13', '14:31:38', 8, 'IC 2201', '2019t01565', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ic_2202_attendance`
--

CREATE TABLE `ic_2202_attendance` (
  `ic_2202_attendance_id` int(11) NOT NULL,
  `scanned_Date` date NOT NULL,
  `scanned_Time` time NOT NULL,
  `Subject_id` int(11) NOT NULL DEFAULT 9,
  `Subject_Code` varchar(20) NOT NULL DEFAULT 'IC 2202',
  `student_id` char(10) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ic_2203_attendance`
--

CREATE TABLE `ic_2203_attendance` (
  `ic_2203_attendance_id` int(11) NOT NULL,
  `scanned_Date` date NOT NULL,
  `scanned_Time` time NOT NULL,
  `Subject_id` int(11) NOT NULL DEFAULT 10,
  `Subject_Code` varchar(20) NOT NULL DEFAULT 'IC 2203',
  `student_id` char(10) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `lecturer_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `password` varchar(150) NOT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`lecturer_id`, `name`, `email`, `department_id`, `password`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(12, 'k_perera', 'vccp@gmail.com', 2, '$2y$10$hiXWN.DoiuBsc2PkKFItWuHY.M0Got2jf9w1g5on4G57XvWg077Bu', NULL, NULL),
(13, 'amal', 'amal@gmail.com', 1, '$2y$10$VEABA9deglPc95W1TLCOIO6Lm78lC2D7b7rc1fvVr6hQ4GB/pr6cG', NULL, NULL),
(14, 'Jayani', 'jayani@gmail.com', 1, '$2y$10$vTtxnc9pwg0dFMPujJTu4OPNMQPJRGxI6z1wFo4h.OQ19Fl94ZMmq', NULL, NULL),
(15, 'Pradeep', 'Pradeep@gmail.com', 1, '$2y$10$Uu9QjKmKI1dIof9QXxqlaemPT7rOte74XtPz2ClO1VGzWhkiMILKe', NULL, NULL),
(16, 'Rohan', 'rohann@gmail.com', 2, '$2y$10$ksaz047On1N4gNrGNmYw/ecO0BExxda0tWuziQEoGS284mzYp6kBq', NULL, NULL),
(17, 'Nethmini', 'nethmini@gmail.com', 2, '$2y$10$ugeFbZlzbPSeERE6jW5zSuo.zpiO4o1MCDUU6tQpVuvv24VtMOkwy', NULL, NULL),
(18, 'Chamindi', 'Chamindi@gmail.com', 2, '$2y$10$mD7NPEWzMCqDLIo8UsuaSuOe0IvWicYFT8CbQAVP.a6IgNbJtkrB6', NULL, NULL),
(19, 'Aruna', 'aruna@gmail.com', 3, '$2y$10$bkh7qV0iXPGBvPJg9q9.weWh1IsN4A4hSPdn.SAiQlc.yB3GuDbB2', NULL, NULL),
(20, 'Thilanka', 'thilanka@gmail.com', 3, '$2y$10$aHdNlxQ.tgzgrQB1YP7cE.xoKwOkmQoBfIDSsKn/RaNOV7wjzb8Q6', NULL, NULL),
(21, 'Lakmini', 'lakmini@gmail.com', 3, '$2y$10$W543JdWpn7Lij/csGQcSOe.ct0gukMIuTVmcAKRgay6fdPuTQVZZi', NULL, NULL),
(22, 'Piyadasa', 'piyadasa@gmail.com', 4, '$2y$10$LpJDzQUNUfL7hZS3s54P3uFDlWjvjISA5CpHEzZJLKJbl5QcPnEy2', NULL, NULL),
(23, 'Chamini', 'chamini@gmail.com', 4, '$2y$10$MIz7y0sOZhMyj5IqhK3lheb3NAbro9.KzVi71ltT1E.7Gy2eVOZrC', NULL, NULL),
(24, 'Young', 'young@gmail.com', 4, '$2y$10$AcqEynfQ.4vqOGbVDbNFwOKbyW5ItxXcwA1SBov6cGp1wtg8kN1Nq', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `lecture_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `subject_id` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `instructor` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `venue` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`lecture_id`, `batch_id`, `department_id`, `subject_id`, `title`, `instructor`, `date`, `time`, `venue`) VALUES
(11, 1, 2, '8', 'tt', 'ertert', '2024-11-20', '15:17:00', 'ertewt'),
(12, 0, 0, '', '', '', '0000-00-00', '00:00:00', ''),
(13, 1, 4, '5', 'fh', 'dfbdfb', '2026-01-21', '18:04:00', 'd1001'),
(14, 1, 2, '8', 'DBMS1', 'dr Rohan', '2026-01-29', '11:30:00', 'd201'),
(15, 1, 2, '8', 'DBMS1', 'dr Rohan', '2026-01-29', '11:30:00', 'd201'),
(16, 1, 2, '8', 'dfs', 'sdfs', '2026-02-06', '15:51:00', 'sadf');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `lecturer_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `status` enum('unread','read') DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `lecturer_id`, `student_id`, `subject_id`, `message`, `timestamp`, `status`) VALUES
(1, 12, 2019, 8, 'New Lecture: dfs on 2026-02-06 at 15:51 in sadf', '2026-01-08 16:01:22', 'read'),
(2, 12, 2019, 8, 'New Lecture: dfs on 2026-02-06 at 15:51 in sadf', '2026-01-08 16:01:22', 'read'),
(3, 12, 2019, 8, 'New Lecture: dfs on 2026-02-06 at 15:51 in sadf', '2026-01-08 16:01:22', 'read'),
(4, 12, 2019, 8, 'New Lecture: dfs on 2026-02-06 at 15:51 in sadf', '2026-01-08 16:01:22', 'read'),
(5, 12, 2019, 8, 'New Lecture: dfs on 2026-02-06 at 15:51 in sadf', '2026-01-08 16:01:22', 'read'),
(6, 12, 2019, 8, 'New Lecture: dfs on 2026-02-06 at 15:51 in sadf', '2026-01-08 16:01:22', 'read'),
(7, 12, 2019, 8, 'New Lecture: dfs on 2026-02-06 at 15:51 in sadf', '2026-01-08 16:01:22', 'read'),
(8, 12, 2022, 8, 'New Lecture: dfs on 2026-02-06 at 15:51 in sadf', '2026-01-08 16:01:22', 'unread'),
(9, 12, 2019, 8, 'New Lecture: dfs on 2026-02-06 at 15:51 in sadf', '2026-01-08 16:01:22', 'read'),
(10, 12, 2019, 8, 'New Lecture: dfs on 2026-02-06 at 15:51 in sadf', '2026-01-08 16:01:22', 'read'),
(11, 12, 2019, 8, 'New Lecture: dfs on 2026-02-06 at 15:51 in sadf', '2026-01-08 16:01:22', 'read'),
(12, 12, 2019, 8, 'New Lecture: dfs on 2026-02-06 at 15:51 in sadf', '2026-01-08 16:01:22', 'read'),
(13, 12, 2019, 8, 'New Lecture: dfs on 2026-02-06 at 15:51 in sadf', '2026-01-08 16:01:22', 'read'),
(14, 12, 2019, 8, 'New Lecture: dfs on 2026-02-06 at 15:51 in sadf', '2026-01-08 16:01:22', 'read'),
(15, 12, 2019, 8, 'New Lecture: dfs on 2026-02-06 at 15:51 in sadf', '2026-01-08 16:01:22', 'read'),
(16, 12, 2019, 8, 'New Lecture: dfs on 2026-02-06 at 15:51 in sadf', '2026-01-08 16:01:22', 'read'),
(17, 12, 2019, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'read'),
(18, 12, 2019, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'read'),
(19, 12, 2019, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'read'),
(20, 12, 2019, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'read'),
(21, 12, 2019, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'read'),
(22, 12, 2019, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'read'),
(23, 12, 2019, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'read'),
(24, 12, 2022, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(25, 12, 2019, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'read'),
(26, 12, 2019, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'read'),
(27, 12, 2019, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'read'),
(28, 12, 2019, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'read'),
(29, 12, 2019, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'read'),
(30, 12, 2019, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'read'),
(31, 12, 2019, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'read'),
(32, 12, 2019, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'read'),
(33, 12, 2020, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(34, 12, 2020, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(35, 12, 2020, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(36, 12, 2020, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(37, 12, 2020, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(38, 12, 2020, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(39, 12, 2020, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(40, 12, 2020, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(41, 12, 2020, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(42, 12, 2020, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(43, 12, 2020, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(44, 12, 2020, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(45, 12, 2020, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(46, 12, 2020, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(47, 12, 2020, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(48, 12, 2020, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(49, 12, 2021, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(50, 12, 2021, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(51, 12, 2021, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(52, 12, 2021, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(53, 12, 2021, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(54, 12, 2021, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(55, 12, 2021, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(56, 12, 2021, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(57, 12, 2021, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(58, 12, 2021, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(59, 12, 2021, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(60, 12, 2021, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(61, 12, 2021, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(62, 12, 2021, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(63, 12, 2021, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(64, 12, 2021, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(65, 12, 2022, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(66, 12, 2022, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(67, 12, 2022, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(68, 12, 2022, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(69, 12, 2022, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(70, 12, 2022, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(71, 12, 2022, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(72, 12, 2022, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(73, 12, 2022, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(74, 12, 2022, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(75, 12, 2022, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(76, 12, 2022, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(77, 12, 2022, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(78, 12, 2022, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(79, 12, 2022, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread'),
(80, 12, 2022, 11, 'New Event: sefces on 2026-01-27 at 21:01 in sdc for sdc', '2026-01-08 16:01:40', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `total_lectures` int(11) NOT NULL,
  `table_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_code`, `subject_name`, `total_lectures`, `table_name`) VALUES
(1, 'AG 3101 ', 'Biostatistics', 13, 'ag_3101_attendance'),
(2, 'AG 3202', 'Microbes and Agriculture\r\n\r\n', 12, 'ag_3202_attendance'),
(3, 'ET 1302', 'Basic Soil Science\r\n\r\n', 13, 'et_1302_attendance'),
(4, 'ET 1303', 'Chemicals in the Environment\r\n\r\n', 13, 'et_1303_attendance'),
(5, 'FT 1101', 'Workshop Practice\r\n\r\n', 10, 'ft_1101_attendance'),
(6, 'IA 4201', 'Power Electronics\r\n\r\n', 15, 'ia_4201_attendance'),
(7, 'IA 4202', 'Programmable Logic Controllers', 13, 'ia_4201_attendance'),
(8, 'IC 2201', 'Database Management Systems II\r\n\r\n', 13, 'ic_2201_attendance'),
(9, 'IC 2202', 'Discrete Mathematics\r\n\r\n', 14, 'ic_2202_attendance'),
(10, 'IC 2203', 'IT project Management\r\n\r\n', 14, 'ic_2203_attendance'),
(11, 'sub_Event', 'Event', 0, 'events_attendance');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `2019_20`
--
ALTER TABLE `2019_20`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `2020_21`
--
ALTER TABLE `2020_21`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `2021_22`
--
ALTER TABLE `2021_22`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `2022_23`
--
ALTER TABLE `2022_23`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `batch_id` (`batch_id`);

--
-- Indexes for table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ag_3101_attendance`
--
ALTER TABLE `ag_3101_attendance`
  ADD PRIMARY KEY (`ag_3101_attendance_id`),
  ADD KEY `Subject_id` (`Subject_id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `ag_3202_attendance`
--
ALTER TABLE `ag_3202_attendance`
  ADD PRIMARY KEY (`ag_3202_attendance_id`),
  ADD KEY `Subject_id` (`Subject_id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `batch_subject`
--
ALTER TABLE `batch_subject`
  ADD PRIMARY KEY (`batch_subject_id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `Subject_id` (`Subject_id`),
  ADD KEY `lecturer_id` (`lecturer_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `et_1302_attendance`
--
ALTER TABLE `et_1302_attendance`
  ADD PRIMARY KEY (`et_1302_attendance_id`),
  ADD KEY `Subject_id` (`Subject_id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `et_1303_attendance`
--
ALTER TABLE `et_1303_attendance`
  ADD PRIMARY KEY (`et_1303_attendance_id`),
  ADD KEY `Subject_id` (`Subject_id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `events_attendance`
--
ALTER TABLE `events_attendance`
  ADD PRIMARY KEY (`events_attendance_id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `ft_1101_attendance`
--
ALTER TABLE `ft_1101_attendance`
  ADD PRIMARY KEY (`ft_1101_attendance_id`),
  ADD KEY `Subject_id` (`Subject_id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `ia_4201_attendance`
--
ALTER TABLE `ia_4201_attendance`
  ADD PRIMARY KEY (`ia_4201_attendance_id`),
  ADD KEY `Subject_id` (`Subject_id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `ia_4202_attendance`
--
ALTER TABLE `ia_4202_attendance`
  ADD PRIMARY KEY (`ia_4202_attendance_id`),
  ADD KEY `Subject_id` (`Subject_id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `ic_2201_attendance`
--
ALTER TABLE `ic_2201_attendance`
  ADD PRIMARY KEY (`ic_2201_attendance`),
  ADD KEY `Subject_id` (`Subject_id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `ic_2202_attendance`
--
ALTER TABLE `ic_2202_attendance`
  ADD PRIMARY KEY (`ic_2202_attendance_id`),
  ADD KEY `Subject_id` (`Subject_id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `ic_2203_attendance`
--
ALTER TABLE `ic_2203_attendance`
  ADD PRIMARY KEY (`ic_2203_attendance_id`),
  ADD KEY `Subject_id` (`Subject_id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`lecturer_id`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`lecture_id`),
  ADD KEY `batch_id` (`batch_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absences`
--
ALTER TABLE `absences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ag_3101_attendance`
--
ALTER TABLE `ag_3101_attendance`
  MODIFY `ag_3101_attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ag_3202_attendance`
--
ALTER TABLE `ag_3202_attendance`
  MODIFY `ag_3202_attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `batch_subject`
--
ALTER TABLE `batch_subject`
  MODIFY `batch_subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `et_1302_attendance`
--
ALTER TABLE `et_1302_attendance`
  MODIFY `et_1302_attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `et_1303_attendance`
--
ALTER TABLE `et_1303_attendance`
  MODIFY `et_1303_attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `events_attendance`
--
ALTER TABLE `events_attendance`
  MODIFY `events_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ft_1101_attendance`
--
ALTER TABLE `ft_1101_attendance`
  MODIFY `ft_1101_attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ia_4201_attendance`
--
ALTER TABLE `ia_4201_attendance`
  MODIFY `ia_4201_attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ia_4202_attendance`
--
ALTER TABLE `ia_4202_attendance`
  MODIFY `ia_4202_attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ic_2201_attendance`
--
ALTER TABLE `ic_2201_attendance`
  MODIFY `ic_2201_attendance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ic_2202_attendance`
--
ALTER TABLE `ic_2202_attendance`
  MODIFY `ic_2202_attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ic_2203_attendance`
--
ALTER TABLE `ic_2203_attendance`
  MODIFY `ic_2203_attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `lecturer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `lecture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `2019_20`
--
ALTER TABLE `2019_20`
  ADD CONSTRAINT `2019_20_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `2019_20_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);

--
-- Constraints for table `2020_21`
--
ALTER TABLE `2020_21`
  ADD CONSTRAINT `2020_21_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `2020_21_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);

--
-- Constraints for table `2021_22`
--
ALTER TABLE `2021_22`
  ADD CONSTRAINT `2021_22_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `2021_22_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);

--
-- Constraints for table `2022_23`
--
ALTER TABLE `2022_23`
  ADD CONSTRAINT `2022_23_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `2022_23_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`);

--
-- Constraints for table `ag_3101_attendance`
--
ALTER TABLE `ag_3101_attendance`
  ADD CONSTRAINT `ag_3101_attendance_ibfk_1` FOREIGN KEY (`Subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `ag_3101_attendance_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`),
  ADD CONSTRAINT `ag_3101_attendance_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `ag_3202_attendance`
--
ALTER TABLE `ag_3202_attendance`
  ADD CONSTRAINT `ag_3202_attendance_ibfk_1` FOREIGN KEY (`Subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `ag_3202_attendance_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`),
  ADD CONSTRAINT `ag_3202_attendance_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `batch_subject`
--
ALTER TABLE `batch_subject`
  ADD CONSTRAINT `batch_subject_ibfk_1` FOREIGN KEY (`Subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `batch_subject_ibfk_2` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturer` (`lecturer_id`);

--
-- Constraints for table `et_1302_attendance`
--
ALTER TABLE `et_1302_attendance`
  ADD CONSTRAINT `et_1302_attendance_ibfk_1` FOREIGN KEY (`Subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `et_1302_attendance_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`),
  ADD CONSTRAINT `et_1302_attendance_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `et_1303_attendance`
--
ALTER TABLE `et_1303_attendance`
  ADD CONSTRAINT `et_1303_attendance_ibfk_1` FOREIGN KEY (`Subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `et_1303_attendance_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`),
  ADD CONSTRAINT `et_1303_attendance_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `events_attendance`
--
ALTER TABLE `events_attendance`
  ADD CONSTRAINT `events_attendance_ibfk_1` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`),
  ADD CONSTRAINT `events_attendance_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `ft_1101_attendance`
--
ALTER TABLE `ft_1101_attendance`
  ADD CONSTRAINT `ft_1101_attendance_ibfk_1` FOREIGN KEY (`Subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `ft_1101_attendance_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`),
  ADD CONSTRAINT `ft_1101_attendance_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `ia_4201_attendance`
--
ALTER TABLE `ia_4201_attendance`
  ADD CONSTRAINT `ia_4201_attendance_ibfk_1` FOREIGN KEY (`Subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `ia_4201_attendance_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`),
  ADD CONSTRAINT `ia_4201_attendance_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `ia_4202_attendance`
--
ALTER TABLE `ia_4202_attendance`
  ADD CONSTRAINT `ia_4202_attendance_ibfk_1` FOREIGN KEY (`Subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `ia_4202_attendance_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`),
  ADD CONSTRAINT `ia_4202_attendance_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `ic_2201_attendance`
--
ALTER TABLE `ic_2201_attendance`
  ADD CONSTRAINT `ic_2201_attendance_ibfk_1` FOREIGN KEY (`Subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `ic_2201_attendance_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`),
  ADD CONSTRAINT `ic_2201_attendance_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `ic_2202_attendance`
--
ALTER TABLE `ic_2202_attendance`
  ADD CONSTRAINT `ic_2202_attendance_ibfk_1` FOREIGN KEY (`Subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `ic_2202_attendance_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`),
  ADD CONSTRAINT `ic_2202_attendance_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `ic_2203_attendance`
--
ALTER TABLE `ic_2203_attendance`
  ADD CONSTRAINT `ic_2203_attendance_ibfk_1` FOREIGN KEY (`Subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `ic_2203_attendance_ibfk_2` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`),
  ADD CONSTRAINT `ic_2203_attendance_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
