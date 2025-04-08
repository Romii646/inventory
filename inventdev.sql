-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2025 at 09:25 PM
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
-- Stand-in structure for view `component_totals`
-- (See below for the actual view)
--
CREATE TABLE `component_totals` (
`category` varchar(12)
,`total_count` decimal(42,0)
,`total_cost` decimal(54,3)
);

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
('GP2PC3', 'NVIDIA GeForce RTX 3070 Ti', 'GOOD', 400.00, 'IN_USE'),
('gpu_0001', 'NVIDIA GeForce RTX 3070 Ti', 'GOOD', 400.00, 'IN_USE'),
('gpu_0002', 'NVIDIA GeForce RTX 3070 Ti', 'BROKEN', 400.00, 'STORAGE'),
('gpu_0003', 'NVIDIA GeForce RTX 3070 Ti', 'GOOD', 300.00, 'IN_USE'),
('gpu_0004', 'NVIDIA GeForce RTX 3070 Ti', 'GOOD', 400.00, 'STORAGE'),
('gpu_0005', 'NVIDIA GeForce RTX 3070 Ti', 'GOOD', 400.00, 'STORAGE');

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
('kb_0001', 'Cherry', 'GOOD', 500.000, 'IN_USE'),
('kb_0002', 'Cherry', 'BROKEN', 500.000, 'DISPOSED'),
('kb_0003', 'Cherry', 'GOOD', 320.630, 'STORAGE'),
('kb_0004', 'Cherry', 'BROKEN', 321.000, 'STORAGE'),
('kb_0005', 'Harry', 'GOOD', 400.000, 'IN_USE'),
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
('MO3PC2', 'Corsair ', 'GOOD', 60.00, 'Table 3-2'),
('mouse_0001', 'Cherry', 'GOOD', 500.00, NULL);

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
('monitor_0008', 'LG electronic', NULL, 'GOOD', 150.00, 'STORAGE');

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
('MB1PC2', 'SUT', 'ATX', 'GOOD', 1000.00, 'IN_USE'),
('MB2PC2', 'Gigabyte Z790 UD AC', 'ATX', 'GOOD', 188.00, 'IN_USE'),
('MB2PC3', 'Gigabyte Z790 UD AC', 'ATX', 'GOOD', 188.00, 'IN_USE'),
('mobo_0001', 'mickey', 'Extended ATX', 'GOOD', 150.00, 'IN_USE'),
('mobo_0002', 'mickey', 'ATX', 'GOOD', 400.00, 'STORAGE');

-- --------------------------------------------------------

--
-- Table structure for table `pcsetups`
--

CREATE TABLE `pcsetups` (
  `pc_id` varchar(8) NOT NULL,
  `mobo_id` varchar(8) DEFAULT NULL,
  `gpu_id` varchar(8) DEFAULT NULL,
  `ram_id` varchar(8) DEFAULT NULL,
  `storage_slot_id` varchar(20) DEFAULT NULL,
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

INSERT INTO `pcsetups` (`pc_id`, `mobo_id`, `gpu_id`, `ram_id`, `storage_slot_id`, `psu_id`, `monitor_id`, `acc_id`, `kb_id`, `mouse_id`, `tableLocation`, `PCcondition`) VALUES
('PC1ID1', 'MB2PC2', 'GP2PC2', 'ram_0005', 'stroageSlot_0001', 'PW2PC2', 'MN2PC1', 'null', 'KS2PC3', 'MO2PC3', 'table 2 -1', 'hi'),
('PC2ID2', 'MB2PC3', 'GP2PC3', 'RS2PC3', NULL, 'PW2PC3', 'MN2PC2', 'null', 'KS2PC2', 'MO3PC2', 'Table 2 - 2', 'Andrew hates AJAX');

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
('psu_0001', 'EVGA', 1000, 'yes', 'GOOD', 145.00, 'STORAGE'),
('psu_0002', 'Cherry', 1000, 'yes', 'GOOD', 320.63, 'STORAGE'),
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
('ram_0004', 'Corsair', 'DDR4', '6000', 'GOOD', 110.21, 'IN_USE'),
('ram_0005', 'Corsair Vengeance', 'DDR4', '5200', 'GOOD', 100.00, 'STORAGE'),
('ram_0006', 'Corsair Vengeance', 'DDR5', '2000', 'GOOD', 59.00, 'IN_USE'),
('RS2PC3', 'Corsair Vengeance', 'DDR5', '5200', 'GOOD', 110.99, 'IN_USE'),
('RS3PC3', 'Corsair Vengeance', 'DDR5', '2000', 'GOOD', 55.00, 'IN_USE');

-- --------------------------------------------------------

--
-- Table structure for table `storage_components`
--

CREATE TABLE `storage_components` (
  `storage_id` varchar(20) NOT NULL,
  `storage_slot_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('SSD','HDD') NOT NULL,
  `condition` enum('GOOD','BROKEN') DEFAULT NULL,
  `cost` mediumint(9) DEFAULT NULL,
  `status` enum('IN_USE','STORAGE','DISPOSED') DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `storage_components`
--

INSERT INTO `storage_components` (`storage_id`, `storage_slot_id`, `name`, `type`, `condition`, `cost`, `status`, `location`) VALUES
('storage_0001', 'stroageSlot_0001', 'mickey', 'SSD', 'GOOD', 112, 'IN_USE', 'myhouse'),
('storage_0002', 'stroageSlot_0001', 'mickey', 'SSD', 'GOOD', 112, 'IN_USE', 'myhouse');

-- --------------------------------------------------------

--
-- Table structure for table `storage_slots`
--

CREATE TABLE `storage_slots` (
  `storage_slot_id` varchar(20) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storage_slots`
--

INSERT INTO `storage_slots` (`storage_slot_id`, `description`) VALUES
('stroageSlot_0001', 'This pc holds three slots');

-- --------------------------------------------------------

--
-- Stand-in structure for view `stored_components_storage`
-- (See below for the actual view)
--
CREATE TABLE `stored_components_storage` (
`category` varchar(12)
,`component_id` varchar(25)
,`name` varchar(70)
,`type` varchar(20)
,`condition` varchar(15)
,`cost` decimal(32,3)
,`status` varchar(30)
);

-- --------------------------------------------------------

--
-- Structure for view `component_totals`
--
DROP TABLE IF EXISTS `component_totals`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `component_totals`  AS SELECT 'Accessory' AS `category`, count(0) AS `total_count`, sum(`accessories`.`cost`) AS `total_cost` FROM `accessories`union all select 'GPU' AS `category`,count(0) AS `total_count`,sum(`graphicscards`.`cost`) AS `total_cost` from `graphicscards` union all select 'Keyboard' AS `category`,count(0) AS `total_count`,sum(`keyboards`.`cost`) AS `total_cost` from `keyboards` union all select 'Mouse' AS `category`,count(0) AS `total_count`,sum(`mice`.`cost`) AS `total_cost` from `mice` union all select 'Monitor' AS `category`,count(0) AS `total_count`,sum(`monitors`.`cost`) AS `total_cost` from `monitors` union all select 'Motherboard' AS `category`,count(0) AS `total_count`,sum(`motherboards`.`cost`) AS `total_cost` from `motherboards` union all select 'Power Supply' AS `category`,count(0) AS `total_count`,sum(`powersupplies`.`cost`) AS `total_cost` from `powersupplies` union all select 'RAM' AS `category`,count(0) AS `total_count`,sum(`ramsticks`.`cost`) AS `total_cost` from `ramsticks` union all select 'TOTAL' AS `category`,sum(`all_totals`.`total_count`) AS `total_count`,sum(`all_totals`.`total_cost`) AS `total_cost` from (select count(0) AS `total_count`,sum(`accessories`.`cost`) AS `total_cost` from `accessories` union all select count(0) AS `total_count`,sum(`graphicscards`.`cost`) AS `total_cost` from `graphicscards` union all select count(0) AS `total_count`,sum(`keyboards`.`cost`) AS `total_cost` from `keyboards` union all select count(0) AS `total_count`,sum(`mice`.`cost`) AS `total_cost` from `mice` union all select count(0) AS `total_count`,sum(`monitors`.`cost`) AS `total_cost` from `monitors` union all select count(0) AS `total_count`,sum(`motherboards`.`cost`) AS `total_cost` from `motherboards` union all select count(0) AS `total_count`,sum(`powersupplies`.`cost`) AS `total_cost` from `powersupplies` union all select count(0) AS `total_count`,sum(`ramsticks`.`cost`) AS `total_cost` from `ramsticks`) `all_totals`  ;

-- --------------------------------------------------------

--
-- Structure for view `stored_components_storage`
--
DROP TABLE IF EXISTS `stored_components_storage`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stored_components_storage`  AS SELECT 'Accessory' AS `category`, `accessories`.`acc_id` AS `component_id`, `accessories`.`name` AS `name`, `accessories`.`type` AS `type`, `accessories`.`condition` AS `condition`, `accessories`.`cost` AS `cost`, `accessories`.`location` AS `status` FROM `accessories` WHERE `accessories`.`location` = 'STORAGE'union all select 'GPU' AS `category`,`graphicscards`.`gpu_id` AS `component_id`,`graphicscards`.`name` AS `name`,NULL AS `type`,`graphicscards`.`condition` AS `condition`,`graphicscards`.`cost` AS `cost`,`graphicscards`.`status` AS `status` from `graphicscards` where `graphicscards`.`status` = 'STORAGE' union all select 'Keyboard' AS `category`,`keyboards`.`kb_id` AS `component_id`,`keyboards`.`name` AS `name`,NULL AS `type`,`keyboards`.`condition` AS `condition`,`keyboards`.`cost` AS `cost`,`keyboards`.`status` AS `status` from `keyboards` where `keyboards`.`status` = 'STORAGE' union all select 'Mouse' AS `category`,`mice`.`mouse_id` AS `component_id`,`mice`.`name` AS `name`,NULL AS `type`,`mice`.`condition` AS `condition`,`mice`.`cost` AS `cost`,`mice`.`location` AS `status` from `mice` where `mice`.`location` = 'STORAGE' union all select 'Monitor' AS `category`,`monitors`.`monitor_id` AS `component_id`,`monitors`.`name` AS `name`,`monitors`.`width` AS `type`,`monitors`.`condition` AS `condition`,`monitors`.`cost` AS `cost`,`monitors`.`status` AS `status` from `monitors` where `monitors`.`status` = 'STORAGE' union all select 'Motherboard' AS `category`,`motherboards`.`mobo_id` AS `component_id`,`motherboards`.`name` AS `name`,`motherboards`.`size` AS `type`,`motherboards`.`condition` AS `condition`,`motherboards`.`cost` AS `cost`,`motherboards`.`status` AS `status` from `motherboards` where `motherboards`.`status` = 'STORAGE' union all select 'Power Supply' AS `category`,`powersupplies`.`psu_id` AS `component_id`,`powersupplies`.`name` AS `name`,`powersupplies`.`wattage` AS `type`,`powersupplies`.`condition` AS `condition`,`powersupplies`.`cost` AS `cost`,`powersupplies`.`status` AS `status` from `powersupplies` where `powersupplies`.`status` = 'STORAGE' union all select 'RAM' AS `category`,`ramsticks`.`ram_id` AS `component_id`,`ramsticks`.`name` AS `name`,`ramsticks`.`type` AS `type`,`ramsticks`.`condition` AS `condition`,`ramsticks`.`cost` AS `cost`,`ramsticks`.`status` AS `status` from `ramsticks` where `ramsticks`.`status` = 'STORAGE' union all select 'TOTAL' AS `category`,NULL AS `component_id`,NULL AS `name`,NULL AS `type`,NULL AS `condition`,sum(`all_costs`.`cost`) AS `cost`,NULL AS `status` from (select `accessories`.`cost` AS `cost` from `accessories` where `accessories`.`location` = 'STORAGE' union all select `graphicscards`.`cost` AS `cost` from `graphicscards` where `graphicscards`.`status` = 'STORAGE' union all select `keyboards`.`cost` AS `cost` from `keyboards` where `keyboards`.`status` = 'STORAGE' union all select `mice`.`cost` AS `cost` from `mice` where `mice`.`location` = 'STORAGE' union all select `monitors`.`cost` AS `cost` from `monitors` where `monitors`.`status` = 'STORAGE' union all select `motherboards`.`cost` AS `cost` from `motherboards` where `motherboards`.`status` = 'STORAGE' union all select `powersupplies`.`cost` AS `cost` from `powersupplies` where `powersupplies`.`status` = 'STORAGE' union all select `ramsticks`.`cost` AS `cost` from `ramsticks` where `ramsticks`.`status` = 'STORAGE') `all_costs`  ;

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
  ADD KEY `mouse_id` (`mouse_id`),
  ADD KEY `storage_slot_id` (`storage_slot_id`);

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
-- Indexes for table `storage_components`
--
ALTER TABLE `storage_components`
  ADD PRIMARY KEY (`storage_id`),
  ADD KEY `storage_slot_id` (`storage_slot_id`);

--
-- Indexes for table `storage_slots`
--
ALTER TABLE `storage_slots`
  ADD PRIMARY KEY (`storage_slot_id`);

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
  ADD CONSTRAINT `pcsetups_ibfk_7` FOREIGN KEY (`mouse_id`) REFERENCES `mice` (`mouse_id`),
  ADD CONSTRAINT `pcsetups_ibfk_8` FOREIGN KEY (`storage_slot_id`) REFERENCES `storage_slots` (`storage_slot_id`);

--
-- Constraints for table `storage_components`
--
ALTER TABLE `storage_components`
  ADD CONSTRAINT `storageSlotId` FOREIGN KEY (`storage_slot_id`) REFERENCES `storage_slots` (`storage_slot_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
