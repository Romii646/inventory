-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2025 at 11:03 PM
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
-- Database: `inventdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `acc_id` varchar(25) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `condition` varchar(15) DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `graphicscards`
--

CREATE TABLE `graphicscards` (
  `gpu_id` varchar(25) NOT NULL,
  `name` varchar(70) DEFAULT NULL,
  `condition` enum('GOOD','BROKEN','','') DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `status` enum('IN_USE','STORAGE','DISPOSED','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `graphicscards`
--

INSERT INTO `graphicscards` (`gpu_id`, `name`, `condition`, `cost`, `status`) VALUES
('GP2PC2', 'NVIDIA GeForce RTX 3070 Ti', 'GOOD', 400.00, 'IN_USE'),
('GP2PC3', 'NVIDIA GeForce RTX 3070 Ti', 'GOOD', 400.00, 'IN_USE');

-- --------------------------------------------------------

--
-- Table structure for table `keyboards`
--

CREATE TABLE `keyboards` (
  `kb_id` varchar(25) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `condition` enum('GOOD','BROKEN','','') DEFAULT NULL,
  `cost` decimal(10,3) DEFAULT NULL,
  `status` enum('IN_USE','STORAGE','DISPOSED','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keyboards`
--

INSERT INTO `keyboards` (`kb_id`, `name`, `condition`, `cost`, `status`) VALUES
('kb_0010', 'cherry', 'GOOD', 180.000, 'IN_USE'),
('KS2PC2', 'Berry', 'GOOD', 140.000, 'IN_USE'),
('KS2PC3', 'Cherry', 'GOOD', 140.000, 'IN_USE');

-- --------------------------------------------------------

--
-- Table structure for table `mice`
--

CREATE TABLE `mice` (
  `mouse_id` varchar(25) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `condition` enum('GOOD','BROKEN','','') DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mice`
--

INSERT INTO `mice` (`mouse_id`, `name`, `condition`, `cost`, `location`) VALUES
('MO2PC2', 'Dell (Generic)', 'GOOD', 14.99, 'Table 2-2'),
('MO2PC3', 'Dell (Generic)', 'GOOD', 14.99, 'Table 2-3'),
('MO3PC2', 'Corsair ', 'GOOD', 60.00, 'Table 3-2');

-- --------------------------------------------------------

--
-- Table structure for table `minipc`
--

CREATE TABLE `minipc` (
  `mipc_id` varchar(30) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `condition` enum('GOOD','BROKEN','','') DEFAULT NULL,
  `status` enum('IN_USE','STORAGE','DISPOSED','') DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monitors`
--

CREATE TABLE `monitors` (
  `monitor_id` varchar(25) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `width` enum('small','medium','large','') DEFAULT NULL,
  `condition` enum('GOOD','BROKEN','','') DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `status` enum('IN_USE','STORAGE','DISPOSED','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monitors`
--

INSERT INTO `monitors` (`monitor_id`, `name`, `width`, `condition`, `cost`, `status`) VALUES
('MN2PC1', 'LG electronics', 'large', 'GOOD', 180.00, 'IN_USE'),
('MN2PC2', 'LG electronics', 'large', 'GOOD', 180.00, 'IN_USE'),
('monitor_0001', 'LG electronic', 'large', 'GOOD', 180.00, 'IN_USE'),
('monitor_0003', 'LG electronic', NULL, 'GOOD', 152.02, 'IN_USE'),
('monitor_0004', 'LG electronic', NULL, 'GOOD', 150.63, 'IN_USE'),
('monitor_0005', 'LG electronic', NULL, 'GOOD', 180.00, 'STORAGE'),
('monitor_0006', 'LG electronic', NULL, 'GOOD', 160.00, 'STORAGE'),
('monitor_0008', 'LG electronic', NULL, 'GOOD', 150.00, 'STORAGE'),
('monitor_0009', 'LG electronic', NULL, 'GOOD', 140.00, 'STORAGE'),
('monitor_0011', 'LG electronic', 'large', 'GOOD', 144.00, 'STORAGE'),
('monitor_002', 'LG electronic', NULL, 'GOOD', 100.00, 'IN_USE');

-- --------------------------------------------------------

--
-- Table structure for table `motherboards`
--

CREATE TABLE `motherboards` (
  `mobo_id` varchar(25) NOT NULL,
  `name` varchar(70) DEFAULT NULL,
  `size` varchar(15) DEFAULT NULL,
  `condition` enum('GOOD','BROKEN','','') DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `status` enum('IN_USE','STORAGE','BROKEN','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `motherboards`
--

INSERT INTO `motherboards` (`mobo_id`, `name`, `size`, `condition`, `cost`, `status`) VALUES
('MB1PC2', 'SUT', 'ATX', '', 1000.00, 'IN_USE'),
('MB2PC2', 'Gigabyte Z790 UD AC', 'ATX', 'GOOD', 188.00, 'IN_USE'),
('MB2PC3', 'Gigabyte Z790 UD AC', 'ATX', 'GOOD', 188.00, 'IN_USE'),
('mobo_0001', 'mickey', 'Extended ATX', 'GOOD', 150.00, 'IN_USE');

-- --------------------------------------------------------

--
-- Table structure for table `pcsetups`
--

CREATE TABLE `pcsetups` (
  `pc_id` varchar(8) NOT NULL,
  `mobo_id` varchar(8) DEFAULT NULL,
  `gpu_id` varchar(8) DEFAULT NULL,
  `ram_id` varchar(8) DEFAULT NULL,
  `psu_id` varchar(8) DEFAULT NULL,
  `monitor_id` varchar(8) DEFAULT NULL,
  `acc_id` varchar(8) DEFAULT NULL,
  `kb_id` varchar(8) DEFAULT NULL,
  `mouse_id` varchar(8) DEFAULT NULL,
  `tableLocation` text DEFAULT NULL,
  `PCcondition` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pcsetups`
--

INSERT INTO `pcsetups` (`pc_id`, `mobo_id`, `gpu_id`, `ram_id`, `psu_id`, `monitor_id`, `acc_id`, `kb_id`, `mouse_id`, `tableLocation`, `PCcondition`) VALUES
('PC1LC1', 'MB2PC2', 'GP2PC2', 'ram_0005', 'PW2PC3', 'MN2PC1', 'null', 'KS2PC2', 'MO2PC3', 'Table 2 - 1', 'Qui hates php'),
('PC2ID2', 'MB2PC3', 'GP2PC3', 'RS2PC3', 'PW2PC3', 'MN2PC2', 'null', 'KS2PC2', 'MO3PC2', 'Table 2 - 2', 'Andrew hates AJAX');

-- --------------------------------------------------------

--
-- Table structure for table `powersupplies`
--

CREATE TABLE `powersupplies` (
  `psu_id` varchar(25) NOT NULL,
  `name` varchar(70) DEFAULT NULL,
  `wattage` int(11) DEFAULT NULL,
  `modular` varchar(15) DEFAULT NULL,
  `condition` enum('GOOD','BROKEN','','') DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `status` enum('IN_USE','STORAGE','BROKEN','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `powersupplies`
--

INSERT INTO `powersupplies` (`psu_id`, `name`, `wattage`, `modular`, `condition`, `cost`, `status`) VALUES
('PW2PC2', 'EVGA', 1000, 'yes', 'GOOD', 189.99, 'IN_USE'),
('PW2PC3', 'EVGA', 1000, 'yes', 'GOOD', 188.99, 'IN_USE');

-- --------------------------------------------------------

--
-- Table structure for table `ramsticks`
--

CREATE TABLE `ramsticks` (
  `ram_id` varchar(25) NOT NULL,
  `name` varchar(70) DEFAULT NULL,
  `type` enum('DDR3','DDR4','DDR5','') DEFAULT NULL,
  `speed` varchar(4) DEFAULT NULL,
  `condition` enum('GOOD','BROKEN','','') DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `status` enum('IN_USE','STORAGE','BROKEN','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ramsticks`
--

INSERT INTO `ramsticks` (`ram_id`, `name`, `type`, `speed`, `condition`, `cost`, `status`) VALUES
('ram_0005', 'Corsair Vengeance', 'DDR4', '5200', 'GOOD', 100.00, 'IN_USE'),
('ram_0006', 'Corsair Vengeance', 'DDR5', '2000', 'GOOD', 59.00, 'IN_USE'),
('RS2PC3', 'Corsair Vengeance', 'DDR5', '5200', 'GOOD', 110.99, 'IN_USE'),
('RS3PC3', 'Corsair Vengeance', '', '2000', 'GOOD', 55.00, 'IN_USE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `graphicscards`
--
ALTER TABLE `graphicscards`
  ADD PRIMARY KEY (`gpu_id`);

--
-- Indexes for table `keyboards`
--
ALTER TABLE `keyboards`
  ADD PRIMARY KEY (`kb_id`);

--
-- Indexes for table `mice`
--
ALTER TABLE `mice`
  ADD PRIMARY KEY (`mouse_id`);

--
-- Indexes for table `minipc`
--
ALTER TABLE `minipc`
  ADD PRIMARY KEY (`mipc_id`);

--
-- Indexes for table `monitors`
--
ALTER TABLE `monitors`
  ADD PRIMARY KEY (`monitor_id`);

--
-- Indexes for table `motherboards`
--
ALTER TABLE `motherboards`
  ADD PRIMARY KEY (`mobo_id`);

--
-- Indexes for table `pcsetups`
--
ALTER TABLE `pcsetups`
  ADD PRIMARY KEY (`pc_id`),
  ADD KEY `mobo_id` (`mobo_id`),
  ADD KEY `gpu_id` (`gpu_id`),
  ADD KEY `ram_id` (`ram_id`),
  ADD KEY `psu_id` (`psu_id`),
  ADD KEY `monitor_id` (`monitor_id`),
  ADD KEY `acc_id` (`acc_id`),
  ADD KEY `kb_id` (`kb_id`),
  ADD KEY `mouse_id` (`mouse_id`);

--
-- Indexes for table `powersupplies`
--
ALTER TABLE `powersupplies`
  ADD PRIMARY KEY (`psu_id`);

--
-- Indexes for table `ramsticks`
--
ALTER TABLE `ramsticks`
  ADD PRIMARY KEY (`ram_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pcsetups`
--
ALTER TABLE `pcsetups`
  ADD CONSTRAINT `pcsetups_ibfk_1` FOREIGN KEY (`mobo_id`) REFERENCES `motherboards` (`mobo_id`),
  ADD CONSTRAINT `pcsetups_ibfk_2` FOREIGN KEY (`gpu_id`) REFERENCES `graphicscards` (`gpu_id`),
  ADD CONSTRAINT `pcsetups_ibfk_3` FOREIGN KEY (`ram_id`) REFERENCES `ramsticks` (`ram_id`),
  ADD CONSTRAINT `pcsetups_ibfk_4` FOREIGN KEY (`psu_id`) REFERENCES `powersupplies` (`psu_id`),
  ADD CONSTRAINT `pcsetups_ibfk_5` FOREIGN KEY (`monitor_id`) REFERENCES `monitors` (`monitor_id`),
  ADD CONSTRAINT `pcsetups_ibfk_6` FOREIGN KEY (`kb_id`) REFERENCES `keyboards` (`kb_id`),
  ADD CONSTRAINT `pcsetups_ibfk_7` FOREIGN KEY (`mouse_id`) REFERENCES `mice` (`mouse_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
