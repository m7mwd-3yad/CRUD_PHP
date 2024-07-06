-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2024 at 09:35 PM
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
-- Database: `crud_php`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `depart`
-- (See below for the actual view)
--
CREATE TABLE `depart` (
`id` int(11)
,`employee_name` varchar(255)
,`phone` int(11)
,`image` varchar(255)
,`description` varchar(255)
,`department_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(21, 'Sandra Reeves'),
(22, 'Cade Velez'),
(23, 'Leroy Wiley'),
(24, 'Daryl Livingston'),
(25, 'Brittany Burgess'),
(26, 'Alika Sykes'),
(27, 'Regan Bradford');

-- --------------------------------------------------------

--
-- Stand-in structure for view `departmentname`
-- (See below for the actual view)
--
CREATE TABLE `departmentname` (
`name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone`, `image`, `department_id`, `description`) VALUES
(17, '[[[Gillian Hodges ] ] ]', 1, '6526WhatsApp Image 2021-11-12 at 1.26.06 PM.jpeg', 22, '[[[Iste incidunt repre]]]'),
(18, 'Dacey Moran', 1, '181153WhatsApp Image 2021-11-12 at 1.26.06 PM.jpeg', 24, 'Accusantium amet re'),
(21, 'Elton Grimes', 1, '222217WhatsApp Image 2021-11-12 at 1.26.06 PM.jpeg', 25, 'Laborum nihil volupt'),
(22, 'Shellie Curry', 1, '20180WhatsApp Image 2021-11-12 at 1.26.06 PM.jpeg', 26, 'Veniam voluptatem m'),
(23, 'Kibo Andrews', 1, '152113WhatsApp Image 2021-11-12 at 1.26.06 PM.jpeg', 21, 'Eu mollitia incididu'),
(24, 'Dennis Schneider', 1, '34164WhatsApp Image 2021-11-12 at 1.26.06 PM.jpeg', 23, 'Vel pariatur Impedi'),
(25, 'Dawn Nelson', 1, '150166WhatsApp Image 2021-11-12 at 1.26.06 PM.jpeg', 21, 'Quia iusto animi qu');

-- --------------------------------------------------------

--
-- Structure for view `depart`
--
DROP TABLE IF EXISTS `depart`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `depart`  AS SELECT `e`.`id` AS `id`, `e`.`name` AS `employee_name`, `e`.`phone` AS `phone`, `e`.`image` AS `image`, `e`.`description` AS `description`, `d`.`name` AS `department_name` FROM (`department` `d` join `employees` `e` on(`d`.`id` = `e`.`department_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `departmentname`
--
DROP TABLE IF EXISTS `departmentname`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `departmentname`  AS SELECT `d`.`name` AS `name` FROM (`department` `d` join `employees` `e` on(`d`.`id` = `e`.`department_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `department_id_2` (`department_id`),
  ADD KEY `department_id_3` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
