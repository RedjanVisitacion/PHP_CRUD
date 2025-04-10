-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2025 at 12:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vpr`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL DEFAULT 'none',
  `date` varchar(255) NOT NULL DEFAULT 'none',
  `status` varchar(255) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `message`, `date`, `status`) VALUES
(1250, 'ADMIN: UPDATED OFFICIAL POSITION -  0401202511295839347 |  FROM CHAIRMANS TO CHAIRMAN', '1-4-2025 1:05 PM', 'update'),
(1251, 'ADMIN: DELETED POSITION -  77311317124789201092022180612765 | chairmans', '1-4-2025 7:05 AM', 'delete'),
(1252, 'ADMIN: ADDED RESIDENT - 23388956417195 |  Alexandra Kane Non commodi saepe se', '1-4-2025 1:06 PM', 'create'),
(1253, 'ADMIN: ADDED RESIDENT - 3188696235402 |  Alexandra Mooney In rem voluptatem E', '1-4-2025 1:06 PM', 'create'),
(1254, 'ADMIN: Admin Admin | LOGOUT', '1-4-2025 7:07 AM', 'logout'),
(1255, 'ADMIN: Admin Admin | LOGIN', '1-4-2025 1:09 PM', 'login'),
(1256, 'ADMIN: ADDED BLOTTER RECORD  -  3647560271426891 | Complainant - Alexandra Kane | Incident - Incident | Date Incident 2025-04-19T13:10 | Location Incident Location of Incident | Complainant Statement - Complainant Statement | Respondent - Respondent', '1-4-2025 1:10 PM', 'delete'),
(1257, 'ADMIN: ADDED BLOTTER RECORD  -  3647560271426891 | Person Involved - Alexandra Kane | Incident - Incident | Date Incident 2025-04-19T13:10 | Location Incident Location of Incident | Complainant Statement - Complainant Statement | Respondent - Respondent', '1-4-2025 1:10 PM', 'delete'),
(1258, 'ADMIN: ADDED BLOTTER RECORD  -  3647560271426891 | Person Not Resident - wq | Incident - Incident | Date Incident 2025-04-19T13:10 | Location Incident Location of Incident | Complainant Statement - ewqewq | Respondent - Respondent', '1-4-2025 1:10 PM', 'delete'),
(1259, 'ADMIN: ADDED BLOTTER RECORD  -  3647560271426891 | Complainant Not Resident - Complainant Not Resident | Incident - Incident | Date Incident 2025-04-19T13:10 | Location Incident Location of Incident | Complainant Statement - Complainant Statement | Respon', '1-4-2025 1:10 PM', 'delete'),
(1260, 'ADMIN: ADDED RESIDENT - 37404238492438 |  Miriam Frost Harum sit ut provide', '1-4-2025 1:10 PM', 'create'),
(1261, 'ADMIN: ADDED RESIDENT - 1086692484891 |  Jelani Ellison Dolorum qui qui id v', '1-4-2025 1:11 PM', 'create'),
(1262, 'ADMIN: ADDED RESIDENT - 12435095932673 |  Darrel Kline Quas perferendis aut', '1-4-2025 1:11 PM', 'create'),
(1263, 'ADMIN: ADDED RESIDENT - 34151365970057 |  Moana Burt Dolorum fugiat nisi', '1-4-2025 1:11 PM', 'create'),
(1264, 'ADMIN: ADDED OFFICIAL - 0401202513120186625 | KAGAWAD Branden Whitney Minim dolores velit | START 2021-12-17 END 1971-04-06', '1-4-2025 1:12 PM', 'create'),
(1265, 'ADMIN: Admin Admin | LOGOUT', '1-4-2025 7:12 AM', 'logout'),
(1266, 'ADMIN: Admin Admin | LOGIN', '1-4-2025 1:15 PM', 'login');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `a_i` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL DEFAULT 'none',
  `middle_name` varchar(255) NOT NULL DEFAULT 'none',
  `last_name` varchar(255) NOT NULL DEFAULT 'none',
  `username` varchar(255) NOT NULL DEFAULT 'none',
  `password` varchar(255) NOT NULL DEFAULT 'none',
  `user_type` varchar(255) NOT NULL DEFAULT 'none',
  `contact_number` varchar(255) NOT NULL DEFAULT 'none',
  `image` varchar(255) NOT NULL DEFAULT 'none',
  `image_path` varchar(255) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`a_i`, `id`, `first_name`, `middle_name`, `last_name`, `username`, `password`, `user_type`, `contact_number`, `image`, `image_path`) VALUES
(52, '1506135735699', 'Admin', 'Admin', 'Admin', 'admin123', 'admin123', 'admin', '11111111111', '182708071361a0f053c94fb.png', '../assets/dist/img/182708071361a0f053c94fb.png'),
(195, '174668789044820710152022021619941', 'Secretary', 'Secretary', 'Secretary', 'secretary123', 'secretary123', 'secretary', '99999999999', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `a_i` (`a_i`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
