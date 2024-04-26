-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2024 at 11:39 PM
-- Server version: 10.6.16-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team08`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `post` varchar(1000) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `uploaderId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post`, `upload_time`, `uploaderId`) VALUES
(8, ' asd', '2024-03-06 07:47:39', 15),
(9, ' asd', '2024-03-06 07:48:26', 15),
(10, ' bb', '2024-03-06 07:49:10', 15),
(11, ' bb', '2024-03-06 07:49:11', 15),
(12, ' bb', '2024-03-06 07:49:12', 15),
(13, ' bb', '2024-03-06 07:49:13', 15),
(14, ' bb', '2024-03-06 07:49:14', 15),
(15, ' bb', '2024-03-06 07:49:14', 15),
(16, ' bb', '2024-03-06 07:49:15', 15),
(17, ' bb', '2024-03-06 07:49:16', 15),
(18, ' bb', '2024-03-06 07:49:17', 15),
(19, ' bb', '2024-03-06 07:49:18', 15),
(20, ' bb', '2024-03-06 07:49:33', 15),
(21, ' bb', '2024-03-06 07:49:44', 15),
(22, ' bb', '2024-03-06 07:50:15', 15),
(23, ' bb', '2024-03-06 07:51:02', 15),
(24, ' bb', '2024-03-06 07:51:54', 15),
(25, ' bb', '2024-03-06 07:52:43', 15),
(26, ' bb', '2024-03-06 07:53:17', 15),
(27, ' hello', '2024-04-02 17:00:56', 15),
(28, ' hello', '2024-04-02 17:01:04', 15),
(29, ' hello', '2024-04-02 17:03:25', 15),
(30, ' cc', '2024-04-04 10:10:23', 15),
(31, ' GG', '2024-04-09 10:50:09', 15),
(32, ' Asd', '2024-04-09 10:54:01', 15),
(33, ' ', '2024-04-09 12:53:51', 17),
(34, 'hmm', '2024-04-15 07:17:18', 15),
(35, ' I am username and I think everyone should check out \"HumanCode\" by \"asd\"!', '2024-04-15 07:31:05', 14);

-- --------------------------------------------------------

--
-- Table structure for table `reagentreactions`
--

CREATE TABLE `reagentreactions` (
  `ChemID` int(11) NOT NULL,
  `ReagentName` varchar(255) DEFAULT NULL,
  `ReagentChemicalName` varchar(255) DEFAULT NULL,
  `ReactionDesc` varchar(255) DEFAULT NULL,
  `ColorChange` varchar(255) DEFAULT NULL,
  `PrecipitatePresent` tinyint(1) DEFAULT NULL,
  `PrecipitateColor` varchar(255) DEFAULT NULL,
  `PredictionValue` int(11) DEFAULT NULL,
  `MaterialOne` varchar(255) DEFAULT NULL,
  `MaterialTwo` varchar(255) DEFAULT NULL,
  `ReactionEquation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reagentreactions`
--

INSERT INTO `reagentreactions` (`ChemID`, `ReagentName`, `ReagentChemicalName`, `ReactionDesc`, `ColorChange`, `PrecipitatePresent`, `PrecipitateColor`, `PredictionValue`, `MaterialOne`, `MaterialTwo`, `ReactionEquation`) VALUES
(1, 'Hydrochloric acid', 'HCl', 'White precipitate will be present', 'Colorless', 1, 'White', 50, 'Ag+', 'AgNO3', 'AgNO3 + HCl = AgCl + HNO3\r\n'),
(2, 'Ammonia', 'NH3', 'Solves', 'Colorless', 0, 'Colorless', 20, 'Ag+', 'AgCl ', 'AgCl + 2 NH3 = [Ag(NH3)2]Cl'),
(3, 'Nitric acid', 'HNO3', 'Formation of an opalescent solution (up to acidic pH)', 'Colorless', 1, 'White', 30, 'Ag+', '[Ag(NH3)2]Cl', '[Ag(NH3)2]Cl + 2 HNO3 = 2 NH4NO3 + AgCl'),
(4, 'Hydrochloric acid', 'HCl', 'White precipitate will be present', 'Colorless', 1, 'White', 50, 'Pb2+', 'Pb(NO3)2', 'Pb(NO3)2 + 2 HCl = PbCl2 + 2 HNO3'),
(5, 'Hot water', 'H2O', 'Solves', 'Colorless', 0, 'Colorless', 20, 'Pb2+', 'PbCl2', 'PbCl2 = Pb2+ + 2 Cl-'),
(6, 'Potassium Iodide', 'KI', 'Yellow precipitate will be present', 'Colorless', 1, 'Yellow', 30, 'Pb2+', 'Pb(NO3)2', 'Pb(NO3)2 + 2 KI = PbI2 + 2 KNO3'),
(7, 'Hydrochloric acid', 'HCl', 'White precipitate will be present', 'Colorless', 1, 'White', 50, 'Hg+', 'Hg2(NO3)2', 'Hg2(NO3)2 + 2 HCl = Hg2Cl2 + 2 HNO3'),
(8, 'Ammonia', 'NH3', 'Black precipitate will be present', 'Colorless', 1, 'Black', 30, 'Hg+', 'Hg2Cl2', 'Hg2Cl2 + 2 NH3 = Hg(NH2)Cl + Hg + NH4Cl'),
(9, 'Potassium Iodide', 'KI', 'Orange precipitate will be present', 'Colorless', 1, 'White', 20, 'Hg+', 'Hg2(NO3)2 ', 'Pb(NO3)2 + 2 KI = PbI2 + 2 KNO3'),
(10, 'Ammonia', 'NH3', 'Formation of blue precipitate', 'Blue', 1, 'Blue', 50, 'Co2+', 'Co(NO3)2', 'Co(NO3)2 + 2 NH3 + 2 H2O = Co(OH)2 + 2 NH4NO3'),
(11, 'Sodium Hydroxide', 'NaOH', 'Formation of pink precipitate, turning blue', 'Pink to Blue', 1, 'Pink, then Blue', 30, 'Co2+', 'Co(NO3)2', 'Co(NO3)2 + NaOH = Co(OH)NO3 + NaNO3'),
(12, 'Ammonium Thiocyanate', 'NH4SCN', 'Deepening of color in organic phase to blue', 'Color Deepens to Blue', 0, 'Blue', 20, 'Co2+', 'Co(NO3)2', 'Co(NO3)2 + 2 NH4SCN = Co(SCN)2 + 2 NH4NO3'),
(13, 'Ammonia', 'NH3', 'Formation of gel-like green precipitate, turning blue with excess ammonia', 'Green to Blue', 1, 'Green, then Blue', 50, 'Ni2+', 'Ni(NO3)2', 'Ni(NO3)2 + 2 NH3 + 2 H2O = Ni(OH)2 + 2 NH4NO3'),
(14, 'Dimethylglyoxime', 'CH3C(NOH)C(NOH)CH3', 'Strawberry color precipitate', 'Colorless', 1, 'Strawberry', 50, 'Ni2+', '[Ni(NH3)6](OH)2', '[Ni(NH3)6](OH)2 + CH3C(NOH)C(NOH)CH3 → [Ni(NH3)6]2+ + 2H2O + CH3C(NOH)C(NOH)CH3'),
(15, 'Ammonia', 'NH3', 'Formation of rust-brown precipitate, does not dissolve in excess ammonia', 'Rust-Brown', 1, 'Rust-Brown', 50, 'Fe3+', 'Fe(NO3)3', 'Fe(NO3)3 + 3 NH3 + 3 H2O = Fe(OH)3 + 3 NH4NO3'),
(16, 'Sodium Hydroxide', 'NaOH', 'Formation of rust-brown precipitate, does not dissolve in excess sodium hydroxide', 'Rust-Brown', 1, 'Rust-Brown', 10, 'Fe3+', 'Fe(NO3)3', 'Fe(NO3)3 + 3 NaOH = Fe(OH)3 + 3 NaNO3'),
(17, 'Ammonium Thiocyanate', 'NH4SCN', 'Formation of blood-red color', 'Red', 1, 'Blood-Red', 30, 'Fe3+', 'Fe(NO3)3', 'Fe(NO3)3 + 3 NH4SCN = Fe(SCN)3 + 3 NH4NO3'),
(18, 'Sodium Fluoride', 'NaF', 'Solution loses color (becomes colorless)', 'Colorless', 1, 'Colorless', 10, 'Fe3+', 'Fe(SCN)3', 'Fe(SCN)3 + 6 NaF = Na3[FeF6] + 3 NaSCN');

-- --------------------------------------------------------

--
-- Table structure for table `temp_usr`
--

CREATE TABLE `temp_usr` (
  `id` int(32) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `time` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp_usr`
--

INSERT INTO `temp_usr` (`id`, `username`, `password`, `email`, `code`, `time`) VALUES
(11, 'aaaaaaaa', '$2y$10$HrQ92DXzB8NzTdluiGbApOAUFm21uwf0j2NTp0OF0cuMGNFC1Qogm', 'a@a.a', 'a9721ad0b946d253752249b840924d569ce56d4b1bb97b24295e1ed4a5d6', 1707818203),
(13, 'Balázs0728', '$2y$10$gYzsPAn2SD8zqaOqgCBkp.ciIno5BCVK6hfNKfh6NyHPTQVIPCAoe', 'hujber.balazs28@gmail.com', '515c633f51bc6fe4681fe4d890f3acd648b7ca945cf6d72a0dd2370beacc', 1712586155),
(14, 'Humbi028', '$2y$10$qluFCcgChYHaDCc5pviCXObZqwhblqquLOPdJzry.82rhpNHRiZGG', 'asd@asd.com', '9bf404fe6669783b397f638160fc3aa733890332e418ba55e89969d69d4c', 1712586252),
(17, 'Mbzs15z.7', '$2y$10$sVublzLrd8xPD0Ecfvlq9O2/rI3pUf2rBKO.UyIlIWMdf6zql8xli', 'badopis832@evimzo.com', '80513f0ae96138322c791b5edd36ba54f63fe6ec0b12c5fbb0cb9bece5d0', 1712677194);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(32) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(12, 'tapsauce', '$2y$10$mK3ZLARxBdYsb08hEONLHO8HhsE/d2dBKcyg3lwkGow3sLFY4YWdK', 'asd@asd.asd'),
(14, 'username', '$2y$10$dwynWfsXAf3iMFB75SdIsuyxvffHwmdtJEiwMGh23uFK1/bCfSJmW', 'b@a.a'),
(15, 'asd', '$2y$10$x5Kf7ySCCO8Bkp82yqGOMeMId4x06o.inqHL07kn3q.jjk48Xl07y', 'a@a.a'),
(16, 'JosephAdmin', '$2y$10$H7l1p7ZjjRBA8KtPVNZme.Z8rs7VITDAYZbB/B1SIMxexdaFNRvaK', ''),
(18, 'Timothy1', '$2y$10$/8prEiDqkPSNWq4TJs1qsueFV3d1f73WSaK1BYtd/WlnXoZuFjVpi', 'elitsniper1@gmail.com'),
(22, 'asdasd', '$2y$10$jJ5Rbmne1kz.vR2/1./1p.WsCG9ZkiL0VuWG4WuX5JyVDwiDt54Gi', 'elitsniper1+2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` tinyint(4) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id`, `username`, `password`) VALUES
(1, 'JosephAdmin', 'JABelementor2024WebTapQA');

-- --------------------------------------------------------

--
-- Table structure for table `user_reaction_table`
--

CREATE TABLE `user_reaction_table` (
  `id` int(11) NOT NULL,
  `uploaderID` int(11) NOT NULL,
  `subscriberIDs` int(11) NOT NULL,
  `reactionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_reaction_table`
--

INSERT INTO `user_reaction_table` (`id`, `uploaderID`, `subscriberIDs`, `reactionID`) VALUES
(72, 15, 15, 27),
(73, 15, 14, 26),
(79, 15, 15, 28),
(84, 15, 15, 30),
(85, 15, 15, 31),
(86, 15, 15, 32),
(88, 15, 15, 29),
(97, 15, 15, 34),
(98, 15, 15, 35),
(99, 15, 15, 36),
(100, 15, 16, 25),
(101, 15, 16, 25),
(102, 15, 14, 29),
(103, 15, 14, 30),
(104, 15, 14, 31),
(105, 15, 14, 32),
(106, 15, 22, 29),
(107, 15, 22, 30),
(108, 15, 22, 31),
(109, 15, 22, 32);

-- --------------------------------------------------------

--
-- Table structure for table `user_reagentreactions`
--

CREATE TABLE `user_reagentreactions` (
  `ChemID` int(11) NOT NULL,
  `uploaderID` int(11) DEFAULT NULL,
  `reactionCode` varchar(1000) NOT NULL,
  `ReagentName` varchar(255) DEFAULT NULL,
  `ReagentChemicalName` varchar(255) DEFAULT NULL,
  `ReactionDesc` varchar(255) DEFAULT NULL,
  `ColorChange` varchar(255) DEFAULT NULL,
  `PrecipitatePresent` tinyint(1) DEFAULT NULL,
  `PrecipitateColor` varchar(255) DEFAULT NULL,
  `PredictionValue` int(11) DEFAULT NULL,
  `MaterialOne` varchar(255) DEFAULT NULL,
  `MaterialTwo` varchar(255) DEFAULT NULL,
  `ReactionEquation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_reagentreactions`
--

INSERT INTO `user_reagentreactions` (`ChemID`, `uploaderID`, `reactionCode`, `ReagentName`, `ReagentChemicalName`, `ReactionDesc`, `ColorChange`, `PrecipitatePresent`, `PrecipitateColor`, `PredictionValue`, `MaterialOne`, `MaterialTwo`, `ReactionEquation`) VALUES
(19, 4, '', 'wa mo', 'omae', 'baka', 'yellow', 0, 'bluze', 50, 'asd', 'asdda', 'adddasa'),
(20, 4, '', 'wa mo', 'omae', 'baka', 'yellow', 0, 'bluze', 50, 'asd', 'asdda', 'adddasa'),
(21, 4, '', 'Hydrochloric acid', 'asassaa', 'gzzzz', 'ruaaaaa', 1, 'ahkeeeee', 60, 'asd', 'das', 'dasasd'),
(23, 15, '', 'asd', 'asd', 'asd', 'asd', 0, 'asd', 100, 'asd', 'asd', 'asd'),
(24, 15, '', '1', '1', '1', '1', 1, '1', 1, '1', '1', '1'),
(25, 15, 'iii', 'aaa', 'bbb', 'ccc', 'ddd', 1, 'eee', 50, 'fff', 'ggg', 'hhh'),
(29, 15, 'HumanCode', 'Leg', '', 'Supports body weight and enables walking.', '', 0, '', 30, 'Human', 'Mammal', ''),
(30, 15, 'HumanCode', 'Arm', '', 'Used for reaching and lifting objects.', '', 0, '', 25, 'Human', 'Mammal', ''),
(31, 15, 'HumanCode', 'Foot', '', 'Provides stability and propulsion while walking.', '', 0, '', 25, 'Human', 'Mammal', ''),
(32, 15, 'HumanCode', 'Torso', '', 'Houses vital organs and supports the body structure.', '', 0, '', 20, 'Human', 'Mammal', ''),
(33, 15, '', '1', '1', '1', '1', 1, '1', 50, '1', '1', '1'),
(35, 15, 'sagfsga-', 'asd-', 'bsa-', 'asddas-', 'asgasg-', 1, 'gasgas-', 50, 'asgasf-', 'fasg-', 'sagasg-'),
(36, 15, 'asgasghawh|', 'asda|', 'basg|', 'äđ]äđ]|', 'asggasas|', 1, 'wgagw|', 50, 'gasa|', 'awgagw|', ']ä|]äw|'),
(37, 15, 'rherhe', 'asd☺', 'asfd', 'jrfj', 'rehrhe', 1, 'rehhre', 50, 'hrrhe', 'rrhe', 'ewhew'),
(39, 15, '999', '1', '2', '3', '4', 1, '5', 50, '6', '7', '8'),
(40, 15, '99', '1', '2', '3', '4', 0, '5', 50, '6', '7', '8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reagentreactions`
--
ALTER TABLE `reagentreactions`
  ADD PRIMARY KEY (`ChemID`);

--
-- Indexes for table `temp_usr`
--
ALTER TABLE `temp_usr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reaction_table`
--
ALTER TABLE `user_reaction_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reagentreactions`
--
ALTER TABLE `user_reagentreactions`
  ADD PRIMARY KEY (`ChemID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `temp_usr`
--
ALTER TABLE `temp_usr`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_reaction_table`
--
ALTER TABLE `user_reaction_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `user_reagentreactions`
--
ALTER TABLE `user_reagentreactions`
  MODIFY `ChemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
