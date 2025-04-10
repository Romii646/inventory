-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2025 at 06:09 PM
-- Server version: 8.0.41-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `acc_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `component_totals`
-- (See below for the actual view)
--
CREATE TABLE `component_totals` (
`category` varchar(12)
,`total_cost` decimal(54,3)
,`total_count` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `disposed_parts`
-- (See below for the actual view)
--
CREATE TABLE `disposed_parts` (
`category` varchar(12)
,`cost` decimal(35,3)
,`location` varchar(30)
,`name` varchar(70)
,`type` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `graphicscards`
--

CREATE TABLE `graphicscards` (
  `gpu_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` enum('GOOD','BROKEN','','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `status` enum('IN_USE','STORAGE','DISPOSED','') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `graphicscards`
--

INSERT INTO `graphicscards` (`gpu_id`, `name`, `condition`, `cost`, `status`) VALUES
('gpu_0001', 'ASUS TUF RTX 4070 TI GAMING OC', 'GOOD', 849.99, 'IN_USE'),
('gpu_0002', 'EVGA 3070 Ti XC3 ULTRA GAMING', 'GOOD', 749.99, 'IN_USE'),
('gpu_0003', 'EVGA 3070 Ti XC3 ULTRA GAMING ', 'GOOD', 749.99, 'IN_USE'),
('gpu_0004', 'ASUS TUF RTX 4070 TI GAMING OC', 'GOOD', 849.99, 'IN_USE'),
('gpu_0005', 'EVGA 3070 Ti XC3 ULTRA GAMING', 'GOOD', 749.99, 'IN_USE'),
('gpu_0006', 'ASUS TUF RTX 4070 TI GAMING OC', 'GOOD', 849.99, 'IN_USE'),
('gpu_0007', 'ASUS TUF RTX 4070 TI GAMING OC', 'GOOD', 849.99, 'IN_USE'),
('gpu_0008', 'ASUS TUF RTX 4070 TI GAMING OC', 'GOOD', 949.99, 'IN_USE'),
('gpu_0009', 'ASUS TUF RTX 4070 TI GAMING OC', 'GOOD', 949.99, 'IN_USE'),
('gpu_0010', 'ASUS TUF RTX 4070 TI GAMING OC', 'GOOD', 849.99, 'IN_USE'),
('gpu_0011', 'NVIDIA GeForce RTX 3060', 'GOOD', 329.00, 'IN_USE'),
('gpu_0012', 'NVIDIA GeForce RTX 3060', 'GOOD', 329.00, 'IN_USE'),
('gpu_0013', 'EVGA 3070 Ti XC3 ULTRA GAMING', 'GOOD', 749.99, 'IN_USE'),
('gpu_0014', 'ASUS TUF RTX 4070 TI GAMING OC', 'GOOD', 949.99, 'IN_USE');

-- --------------------------------------------------------

--
-- Table structure for table `keyboards`
--

CREATE TABLE `keyboards` (
  `kb_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` enum('GOOD','BROKEN','','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(10,3) DEFAULT NULL,
  `status` enum('IN_USE','STORAGE','DISPOSED','') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keyboards`
--

INSERT INTO `keyboards` (`kb_id`, `name`, `condition`, `cost`, `status`) VALUES
('kb_0001', 'Drop SHIFT V1', 'GOOD', 200.000, 'IN_USE'),
('kb_0002', 'Cherry MX 3.0S', 'GOOD', 76.990, 'IN_USE'),
('kb_0003', 'Cherry MX 3.0S', 'GOOD', 99.990, 'IN_USE'),
('kb_0004', 'Cherry MX 3.0S', 'GOOD', 99.990, 'IN_USE'),
('kb_0005', 'Cherry MX 3.0S', 'GOOD', 99.990, 'IN_USE'),
('kb_0006', 'Cherry MX 3.0S', 'GOOD', 99.990, 'IN_USE'),
('kb_0007', 'Cherry MX 3.0S', 'GOOD', 120.000, 'IN_USE'),
('kb_0008', 'Dell (Generic)', 'GOOD', 25.400, 'IN_USE'),
('kb_0009', 'Cherry MX 3.0S', 'GOOD', 99.990, 'IN_USE'),
('kb_0010', 'Drop SHIFT V1', 'GOOD', 200.000, 'IN_USE'),
('kb_0011', 'Dell (Generic)', 'GOOD', 25.400, 'IN_USE'),
('kb_0012', 'Cherry MX 3.0S', 'GOOD', 99.990, 'IN_USE'),
('kb_0013', 'Dell (Generic)', 'GOOD', 25.400, 'IN_USE'),
('kb_0014', 'Dell (Generic)', 'GOOD', 25.400, 'IN_USE');

-- --------------------------------------------------------

--
-- Table structure for table `mice`
--

CREATE TABLE `mice` (
  `mouse_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` enum('GOOD','BROKEN') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `status` enum('IN_USE','STORAGE','BROKEN') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mice`
--

INSERT INTO `mice` (`mouse_id`, `name`, `condition`, `cost`, `status`) VALUES
('mouse_0001', 'Corsair SABRE RGB', 'GOOD', 109.99, 'IN_USE'),
('mouse_0002', 'Corsair SABRE RGB', 'GOOD', 109.99, 'IN_USE'),
('mouse_0003', 'Dell (Generic)', 'GOOD', 15.00, 'IN_USE'),
('mouse_0004', 'Dell (Generic)', 'GOOD', 15.00, 'IN_USE'),
('mouse_0005', 'Corsair SABRE RGB', 'GOOD', 109.99, 'IN_USE'),
('mouse_0006', 'Corsair SABRE RGB', 'GOOD', 109.99, 'IN_USE'),
('mouse_0007', 'Dell CN-09RRC7', 'GOOD', 10.00, 'IN_USE'),
('mouse_0008', 'Corsair SABRE RGB', 'GOOD', 59.99, 'IN_USE'),
('mouse_0009', 'Corsair SABRE RGB', 'GOOD', 80.00, 'IN_USE'),
('mouse_0010', 'Dell (Generic)', 'GOOD', 15.00, 'IN_USE'),
('mouse_0011', 'Dell (Generic)', 'GOOD', 15.00, 'IN_USE'),
('mouse_0012', 'Dell (Generic)', 'GOOD', 15.00, 'IN_USE'),
('mouse_0013', 'Dell (Generic)', 'GOOD', 15.00, 'IN_USE'),
('mouse_0014', 'Dell M-UVDEL1', 'GOOD', 25.99, 'IN_USE');

-- --------------------------------------------------------

--
-- Table structure for table `minipc`
--

CREATE TABLE `minipc` (
  `mipc_id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` enum('GOOD','BROKEN','','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('IN_USE','STORAGE','DISPOSED','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monitors`
--

CREATE TABLE `monitors` (
  `monitor_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `status` enum('IN_USE','STORAGE','DISPOSED','') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monitors`
--

INSERT INTO `monitors` (`monitor_id`, `name`, `width`, `condition`, `cost`, `status`) VALUES
('monitor_0001', 'LG ULTRAWIDE 35WN65C-B 34-inch FHD (3440x1440)', '25-32 inch', NULL, 340.00, 'IN_USE'),
('monitor_0002', 'LG ULTRAWIDE 35WN65C-B 34-inch FHD (3440x1440)', '25-32 inch', NULL, 340.00, 'IN_USE'),
('monitor_0003', 'LG ULTRAWIDE 35WN65C-B 34-inch FHD (3440x1440)', '25-32 inch', NULL, 340.00, 'IN_USE'),
('monitor_0004', 'LG ULTRAWIDE 35WN65C-B 34-inch FHD (3440x1440)', '25-32 inch', NULL, 340.00, 'IN_USE'),
('monitor_0005', 'LG ULTRAWIDE 35WN65C-B 34-inch FHD (3440x1440)', '25-32 inch', NULL, 340.00, 'IN_USE'),
('monitor_0006', 'LG ULTRAWIDE 35WN65C-B 34-inch FHD (3440x1440)', '25-32 inch', NULL, 340.00, 'IN_USE'),
('monitor_0007', 'LG ULTRAWIDE 35WN65C-B 34-inch FHD (3440x1440)', '25-32 inch', NULL, 340.00, 'IN_USE'),
('monitor_0008', 'LG ULTRAWIDE 35WN65C-B 34-inch FHD (3440x1440)', '25-32 inch', NULL, 340.00, 'IN_USE'),
('monitor_0009', 'LG ULTRAWIDE 35WN65C-B 34-inch FHD (3440x1440)', '25-32 inch', NULL, 340.00, 'IN_USE'),
('monitor_0010', 'LG ULTRAWIDE 35WN65C-B 34-inch FHD (3440x1440)', '25-32 inch', NULL, 340.00, 'IN_USE'),
('monitor_0011', 'Sceptre Curved 24-inch (1920x1080)', 'large', 'GOOD', 87.97, 'IN_USE'),
('monitor_0012', 'Dell P2422H 24-Inch FHD (1920x1080)', '19-24 inch', NULL, 199.99, 'IN_USE'),
('monitor_0013', 'Dell P2317H 23-Inch FHD (1920x1080)', '19-24 inch', NULL, 279.00, 'IN_USE'),
('monitor_0014', 'LG ULTRAWIDE 35WN65C-B 34-inch FHD (3440x1440)', 'large', 'GOOD', 340.00, 'IN_USE'),
('monitor_0016', 'Dell P2422H 24-Inch FHD (1920x1080)', '19-24 inch', NULL, NULL, 'STORAGE'),
('monitor_0017', 'Samsung S23A550H 23-Inch FHD (1920x1080)', '19-24 inch', NULL, NULL, 'STORAGE'),
('monitor_0018', 'Dell E190SB 19-Inch (1280x1024)', '19-24 inch', 'GOOD', 100.86, 'STORAGE'),
('monitor_0019', 'Samsung BX2231 21.5-Inch FHD(1920x1080)', '19-24 inch', NULL, NULL, 'STORAGE'),
('monitor_0021', 'Dell E190SB 19-Inch (1280x1024)', '19-24 inch', 'GOOD', 100.84, 'STORAGE');

-- --------------------------------------------------------

--
-- Table structure for table `motherboards`
--

CREATE TABLE `motherboards` (
  `mobo_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` enum('GOOD','BROKEN','','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `status` enum('IN_USE','STORAGE','BROKEN','') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `motherboards`
--

INSERT INTO `motherboards` (`mobo_id`, `name`, `size`, `condition`, `cost`, `status`) VALUES
('mobo_0001', 'ASUS ROG STRIX Z690-E GAMING WIFI', 'ATX', 'GOOD', 469.99, 'IN_USE'),
('mobo_0002', 'GIGABYTE Z790 UD AC', 'ATX', 'GOOD', 194.99, 'IN_USE'),
('mobo_0003', 'GIGABYTE Z790 UD AC', 'ATX', 'GOOD', 194.99, 'IN_USE'),
('mobo_0004', 'GIGABYTE Z790 UD AC', 'ATX', 'GOOD', 194.99, 'IN_USE'),
('mobo_0005', 'GIGABYTE Z790 UD AC', 'ATX', 'GOOD', 194.99, 'IN_USE'),
('mobo_0006', 'ASUS ROG STRIX Z690-E GAMING WIFI', 'ATX', 'GOOD', 469.99, 'IN_USE'),
('mobo_0007', 'ASUS ROG STRIX Z790-E GAMING WIFI', 'ATX', 'GOOD', 299.99, 'IN_USE'),
('mobo_0008', 'ASUS ROG STRIX Z790-E GAMING WIFI', 'ATX', 'GOOD', 299.99, 'IN_USE'),
('mobo_0009', 'GIGABYTE Z790 UD AC', 'ATX', 'GOOD', 194.99, 'IN_USE'),
('mobo_0010', 'ASUS ROG STRIX Z690-E GAMING WIFI', 'ATX', 'GOOD', 469.99, 'IN_USE'),
('mobo_0011', 'ASUSTek TUF GAMING X570-PLUS WIFI', 'ATX', 'GOOD', 260.99, 'IN_USE'),
('mobo_0014', 'ASUS PRIME Z790-A WIFI', 'ATX', 'GOOD', 298.99, 'IN_USE');

-- --------------------------------------------------------

--
-- Table structure for table `pcsetups`
--

CREATE TABLE `pcsetups` (
  `pc_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobo_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gpu_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ram_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `storage_slot_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `psu_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monitor_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kb_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mouse_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tableLocation` text COLLATE utf8mb4_unicode_ci,
  `PCcondition` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pcsetups`
--

INSERT INTO `pcsetups` (`pc_id`, `mobo_id`, `gpu_id`, `ram_id`, `storage_slot_id`, `psu_id`, `monitor_id`, `acc_id`, `kb_id`, `mouse_id`, `tableLocation`, `PCcondition`) VALUES
('pc00_01', 'mobo_0001', 'gpu_0001', 'ram_0001', NULL, 'psu_0001', 'monitor_0001', 'null', 'kb_0001', 'mouse_0001', 'Table 2 - 1', 'Windows 10. Working. Dylan\'s Computer'),
('pc00_02', 'mobo_0002', 'gpu_0002', 'ram_0002', NULL, 'psu_0002', 'monitor_0002', 'null', 'kb_0002', 'mouse_0002', 'Table 1 - 5', 'Windows 10. Working. John\'s Computer'),
('pc00_03', 'mobo_0003', 'gpu_0003', 'ram_0003', NULL, 'psu_0003', 'monitor_0003', 'null', 'kb_0003', 'mouse_0003', 'Table 1 - 4', 'Windows 10. Working'),
('pc00_04', 'mobo_0004', 'gpu_0004', 'ram_0004', NULL, 'psu_0004', 'monitor_0004', 'null', 'kb_0004', 'mouse_0004', 'Table 1 - 3', 'Windows 10. Working'),
('pc00_05', 'mobo_0005', 'gpu_0005', 'ram_0005', NULL, 'psu_0005', 'monitor_0005', 'null', 'kb_0005', 'mouse_0005', 'Table 1 - 2', 'Windows 10. Working'),
('pc00_06', 'mobo_0006', 'gpu_0006', 'ram_0006', NULL, 'psu_0006', 'monitor_0006', 'null', 'kb_0006', 'mouse_0006', 'Table 1 - 1', 'Windows 11. Working'),
('pc00_07', 'mobo_0007', 'gpu_0007', 'ram_0007', NULL, 'psu_0007', 'monitor_0007', 'null', 'kb_0007', 'mouse_0007', 'Table 2 - 5', 'Windows 10. Working'),
('pc00_08', 'mobo_0008', 'gpu_0008', 'ram_0008', NULL, 'psu_0008', 'monitor_0008', 'null', 'kb_0008', 'mouse_0008', 'Table 2 - 4', 'Windows 11. Working'),
('pc00_09', 'mobo_0009', 'gpu_0009', 'ram_0009', NULL, 'psu_0009', 'monitor_0009', 'null', 'kb_0009', 'mouse_0009', 'Table 2 - 3', 'Windows 10. Working'),
('pc00_10', 'mobo_0010', 'gpu_0010', 'ram_0010', NULL, 'psu_0010', 'monitor_0010', 'null', 'kb_0010', 'mouse_0010', 'Table 2 - 2', 'Windows 10. Working'),
('pc00_11', 'mobo_0011', 'gpu_0011', 'ram_0011', NULL, 'psu_0011', 'monitor_0011', 'null', 'kb_0011', 'mouse_0011', 'Table 4 - 1', 'Windows 10. Working'),
('pc00_14', 'mobo_0014', 'gpu_0014', 'ram_0014', NULL, 'psu_0014', 'monitor_0014', 'null', 'kb_0014', 'mouse_0014', 'NULL', 'Windows 10. Working');

-- --------------------------------------------------------

--
-- Table structure for table `powersupplies`
--

CREATE TABLE `powersupplies` (
  `psu_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wattage` int DEFAULT NULL,
  `modular` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` enum('GOOD','BROKEN','','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `status` enum('IN_USE','STORAGE','BROKEN','') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `powersupplies`
--

INSERT INTO `powersupplies` (`psu_id`, `name`, `wattage`, `modular`, `condition`, `cost`, `status`) VALUES
('psu_0001', 'EVGA', 1000, 'yes', 'GOOD', 189.99, 'IN_USE'),
('psu_0002', 'EVGA', 1000, 'yes', 'GOOD', 189.99, 'IN_USE'),
('psu_0003', 'EVGA', 1000, 'yes', 'GOOD', 189.99, 'IN_USE'),
('psu_0004', 'EVGA', 1000, 'yes', 'GOOD', 189.99, 'IN_USE'),
('psu_0005', 'EVGA', 1000, 'yes', 'GOOD', 189.99, 'IN_USE'),
('psu_0006', 'EVGA', 1000, 'yes', 'GOOD', 189.99, 'IN_USE'),
('psu_0007', 'EVGA', 1000, 'yes', 'GOOD', 189.99, 'IN_USE'),
('psu_0008', 'EVGA', 1000, 'yes', 'GOOD', 189.99, 'IN_USE'),
('psu_0009', 'EVGA', 1000, 'yes', 'GOOD', 189.99, 'IN_USE'),
('psu_0010', 'EVGA', 1000, 'yes', 'GOOD', 189.99, 'IN_USE'),
('psu_0011', 'EVGA', 1000, 'yes', 'GOOD', 189.99, 'IN_USE'),
('psu_0012', 'EVGA', 1000, 'yes', 'GOOD', 189.99, 'IN_USE'),
('psu_0013', 'EVGA', 1000, 'yes', 'GOOD', 189.99, 'IN_USE'),
('psu_0014', 'Corsair RM1000e', 1000, 'yes', 'GOOD', 179.99, 'IN_USE');

-- --------------------------------------------------------

--
-- Table structure for table `ramsticks`
--

CREATE TABLE `ramsticks` (
  `ram_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('DDR3','DDR4','DDR5','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `speed` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` enum('GOOD','BROKEN','','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` decimal(7,2) DEFAULT NULL,
  `status` enum('IN_USE','STORAGE','BROKEN','') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ramsticks`
--

INSERT INTO `ramsticks` (`ram_id`, `name`, `type`, `speed`, `condition`, `cost`, `status`) VALUES
('ram_0001', 'CORSAIR VENGANCE 128 GB (4 x 32GB)', 'DDR5', '6000', 'GOOD', 459.99, 'IN_USE'),
('ram_0002', 'CORSAIR VENGANCE 32 GB (2 x 16GB)', 'DDR5', '6000', 'GOOD', 98.99, 'IN_USE'),
('ram_0003', 'CORSAIR VENGANCE 64 GB (4 x 16GB)', 'DDR5', '5200', 'GOOD', 220.99, 'IN_USE'),
('ram_0004', 'CORSAIR VENGANCE 16 GB (2 x 8GB)', 'DDR5', '5200', 'GOOD', 62.99, 'IN_USE'),
('ram_0005', 'G.SKILL TridentZ RGB 64 GB (2 x 32GB)', 'DDR5', '6000', 'GOOD', 189.99, 'IN_USE'),
('ram_0006', 'CORSAIR VENGANCE 32 GB (2 x 16GB)', 'DDR5', '6000', 'GOOD', 98.99, 'IN_USE'),
('ram_0007', 'CORSAIR VENGANCE 64 GB (2 x 32GB)', 'DDR5', '6000', 'GOOD', 188.99, 'IN_USE'),
('ram_0008', 'G.SKILL TridentZ RGB 64 GB (2 x 32GB)', 'DDR5', '6000', 'GOOD', 189.99, 'IN_USE'),
('ram_0009', 'G.SKILL TridentZ RGB 64 GB (2 x 32GB)', 'DDR5', '6000', 'GOOD', 189.99, 'IN_USE'),
('ram_0010', 'G.SKILL TridentZ RGB 32 GB (2 x 16GB)', 'DDR5', '6000', 'GOOD', 82.99, 'IN_USE'),
('ram_0011', 'CORSAIR VENGANCE 32 GB (2 x 16GB)', 'DDR5', '6000', 'GOOD', 98.99, 'IN_USE'),
('ram_0012', 'CORSAIR VENGANCE LPX 64 GB (4 x 16GB)', 'DDR4', '3200', 'GOOD', 64.99, 'IN_USE'),
('ram_0013', 'CORSAIR VENGANCE 64 GB (2 x 32GB)', 'DDR5', '5200', 'GOOD', 220.99, 'IN_USE'),
('ram_0014', 'CORSAIR VENGANCE 64 GB (2 x 32GB)', 'DDR5', '6000', 'GOOD', 188.99, 'IN_USE');

-- --------------------------------------------------------

--
-- Table structure for table `storage_components`
--

CREATE TABLE `storage_components` (
  `storage_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `storage_slot_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('SSD','HDD','NVME','USB') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` int DEFAULT NULL,
  `status` enum('IN_USE','STORAGE','BROKEN','') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `storage_slots`
--

CREATE TABLE `storage_slots` (
  `storage_slot_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `stored_components_storage`
-- (See below for the actual view)
--
CREATE TABLE `stored_components_storage` (
`category` varchar(12)
,`component_id` varchar(25)
,`condition` varchar(20)
,`cost` decimal(32,3)
,`name` varchar(70)
,`status` varchar(30)
,`type` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `component_totals`
--
DROP TABLE IF EXISTS `component_totals`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `component_totals`  AS SELECT 'Accessory' AS `category`, count(0) AS `total_count`, sum(`accessories`.`cost`) AS `total_cost` FROM `accessories`union all select 'GPU' AS `category`,count(0) AS `total_count`,sum(`graphicscards`.`cost`) AS `total_cost` from `graphicscards` union all select 'Keyboard' AS `category`,count(0) AS `total_count`,sum(`keyboards`.`cost`) AS `total_cost` from `keyboards` union all select 'Mouse' AS `category`,count(0) AS `total_count`,sum(`mice`.`cost`) AS `total_cost` from `mice` union all select 'Monitor' AS `category`,count(0) AS `total_count`,sum(`monitors`.`cost`) AS `total_cost` from `monitors` union all select 'Motherboard' AS `category`,count(0) AS `total_count`,sum(`motherboards`.`cost`) AS `total_cost` from `motherboards` union all select 'Power Supply' AS `category`,count(0) AS `total_count`,sum(`powersupplies`.`cost`) AS `total_cost` from `powersupplies` union all select 'RAM' AS `category`,count(0) AS `total_count`,sum(`ramsticks`.`cost`) AS `total_cost` from `ramsticks` union all select 'TOTAL' AS `category`,sum(`all_totals`.`total_count`) AS `total_count`,sum(`all_totals`.`total_cost`) AS `total_cost` from (select count(0) AS `total_count`,sum(`accessories`.`cost`) AS `total_cost` from `accessories` union all select count(0) AS `total_count`,sum(`graphicscards`.`cost`) AS `total_cost` from `graphicscards` union all select count(0) AS `total_count`,sum(`keyboards`.`cost`) AS `total_cost` from `keyboards` union all select count(0) AS `total_count`,sum(`mice`.`cost`) AS `total_cost` from `mice` union all select count(0) AS `total_count`,sum(`monitors`.`cost`) AS `total_cost` from `monitors` union all select count(0) AS `total_count`,sum(`motherboards`.`cost`) AS `total_cost` from `motherboards` union all select count(0) AS `total_count`,sum(`powersupplies`.`cost`) AS `total_cost` from `powersupplies` union all select count(0) AS `total_count`,sum(`ramsticks`.`cost`) AS `total_cost` from `ramsticks`) `all_totals`  ;

-- --------------------------------------------------------

--
-- Structure for view `disposed_parts`
--
DROP TABLE IF EXISTS `disposed_parts`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `disposed_parts`  AS SELECT cast('Accessory' as char charset utf8mb4) AS `category`, cast(`accessories`.`name` as char charset utf8mb4) AS `name`, cast(`accessories`.`type` as char charset utf8mb4) AS `type`, `accessories`.`cost` AS `cost`, cast(`accessories`.`status` as char charset utf8mb4) AS `location` FROM `accessories` WHERE (`accessories`.`status` = 'DISPOSED')union all select cast('GPU' as char charset utf8mb4) AS `CAST('GPU' AS CHAR CHARACTER SET utf8mb4)`,cast(`graphicscards`.`name` as char charset utf8mb4) AS `CAST(name AS CHAR CHARACTER SET utf8mb4)`,NULL AS `NULL`,`graphicscards`.`cost` AS `cost`,cast(`graphicscards`.`status` as char charset utf8mb4) AS `CAST(status AS CHAR CHARACTER SET utf8mb4)` from `graphicscards` where (`graphicscards`.`status` = 'DISPOSED') union all select cast('Keyboard' as char charset utf8mb4) AS `CAST('Keyboard' AS CHAR CHARACTER SET utf8mb4)`,cast(`keyboards`.`name` as char charset utf8mb4) AS `CAST(name AS CHAR CHARACTER SET utf8mb4)`,NULL AS `NULL`,`keyboards`.`cost` AS `cost`,cast(`keyboards`.`status` as char charset utf8mb4) AS `CAST(status AS CHAR CHARACTER SET utf8mb4)` from `keyboards` where (`keyboards`.`status` = 'DISPOSED') union all select cast('Mouse' as char charset utf8mb4) AS `CAST('Mouse' AS CHAR CHARACTER SET utf8mb4)`,cast(`mice`.`name` as char charset utf8mb4) AS `CAST(name AS CHAR CHARACTER SET utf8mb4)`,NULL AS `NULL`,`mice`.`cost` AS `cost`,cast(`mice`.`status` as char charset utf8mb4) AS `CAST(status AS CHAR CHARACTER SET utf8mb4)` from `mice` where (`mice`.`status` = 'DISPOSED') union all select cast('Monitor' as char charset utf8mb4) AS `CAST('Monitor' AS CHAR CHARACTER SET utf8mb4)`,cast(`monitors`.`name` as char charset utf8mb4) AS `CAST(name AS CHAR CHARACTER SET utf8mb4)`,cast(`monitors`.`width` as char charset utf8mb4) AS `CAST(width AS CHAR CHARACTER SET utf8mb4)`,`monitors`.`cost` AS `cost`,cast(`monitors`.`status` as char charset utf8mb4) AS `CAST(status AS CHAR CHARACTER SET utf8mb4)` from `monitors` where (`monitors`.`status` = 'DISPOSED') union all select cast('Motherboard' as char charset utf8mb4) AS `CAST('Motherboard' AS CHAR CHARACTER SET utf8mb4)`,cast(`motherboards`.`name` as char charset utf8mb4) AS `CAST(name AS CHAR CHARACTER SET utf8mb4)`,cast(`motherboards`.`size` as char charset utf8mb4) AS `CAST(size AS CHAR CHARACTER SET utf8mb4)`,`motherboards`.`cost` AS `cost`,cast(`motherboards`.`status` as char charset utf8mb4) AS `CAST(status AS CHAR CHARACTER SET utf8mb4)` from `motherboards` where (`motherboards`.`status` = 'DISPOSED') union all select cast('Power Supply' as char charset utf8mb4) AS `CAST('Power Supply' AS CHAR CHARACTER SET utf8mb4)`,cast(`powersupplies`.`name` as char charset utf8mb4) AS `CAST(name AS CHAR CHARACTER SET utf8mb4)`,cast(`powersupplies`.`wattage` as char charset utf8mb4) AS `CAST(wattage AS CHAR CHARACTER SET utf8mb4)`,`powersupplies`.`cost` AS `cost`,cast(`powersupplies`.`status` as char charset utf8mb4) AS `CAST(status AS CHAR CHARACTER SET utf8mb4)` from `powersupplies` where (`powersupplies`.`status` = 'DISPOSED') union all select cast('RAM' as char charset utf8mb4) AS `CAST('RAM' AS CHAR CHARACTER SET utf8mb4)`,cast(`ramsticks`.`name` as char charset utf8mb4) AS `CAST(name AS CHAR CHARACTER SET utf8mb4)`,cast(`ramsticks`.`type` as char charset utf8mb4) AS `CAST(type AS CHAR CHARACTER SET utf8mb4)`,`ramsticks`.`cost` AS `cost`,cast(`ramsticks`.`status` as char charset utf8mb4) AS `CAST(status AS CHAR CHARACTER SET utf8mb4)` from `ramsticks` where (`ramsticks`.`status` = 'DISPOSED') union all select cast('Storage' as char charset utf8mb4) AS `CAST('Storage' AS CHAR CHARACTER SET utf8mb4)`,cast(`storage_components`.`name` as char charset utf8mb4) AS `CAST(name AS CHAR CHARACTER SET utf8mb4)`,cast(`storage_components`.`type` as char charset utf8mb4) AS `CAST(type AS CHAR CHARACTER SET utf8mb4)`,`storage_components`.`cost` AS `cost`,cast(`storage_components`.`status` as char charset utf8mb4) AS `CAST(status AS CHAR CHARACTER SET utf8mb4)` from `storage_components` where (`storage_components`.`status` = 'DISPOSED') union all select cast('TOTAL' as char charset utf8mb4) AS `CAST('TOTAL' AS CHAR CHARACTER SET utf8mb4)`,NULL AS `NULL`,NULL AS `NULL`,sum(`total_costs`.`cost`) AS `SUM(cost)`,NULL AS `NULL` from (select `accessories`.`cost` AS `cost` from `accessories` where (`accessories`.`status` = 'DISPOSED') union all select `graphicscards`.`cost` AS `cost` from `graphicscards` where (`graphicscards`.`status` = 'DISPOSED') union all select `keyboards`.`cost` AS `cost` from `keyboards` where (`keyboards`.`status` = 'DISPOSED') union all select `mice`.`cost` AS `cost` from `mice` where (`mice`.`status` = 'DISPOSED') union all select `monitors`.`cost` AS `cost` from `monitors` where (`monitors`.`status` = 'DISPOSED') union all select `motherboards`.`cost` AS `cost` from `motherboards` where (`motherboards`.`status` = 'DISPOSED') union all select `powersupplies`.`cost` AS `cost` from `powersupplies` where (`powersupplies`.`status` = 'DISPOSED') union all select `ramsticks`.`cost` AS `cost` from `ramsticks` where (`ramsticks`.`status` = 'DISPOSED') union all select `storage_components`.`cost` AS `cost` from `storage_components` where (`storage_components`.`status` = 'DISPOSED')) `total_costs`  ;

-- --------------------------------------------------------

--
-- Structure for view `stored_components_storage`
--
DROP TABLE IF EXISTS `stored_components_storage`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stored_components_storage`  AS SELECT 'Accessory' AS `category`, `accessories`.`acc_id` AS `component_id`, `accessories`.`name` AS `name`, `accessories`.`type` AS `type`, `accessories`.`condition` AS `condition`, `accessories`.`cost` AS `cost`, `accessories`.`status` AS `status` FROM `accessories` WHERE (`accessories`.`status` = 'STORAGE')union all select 'GPU' AS `category`,`graphicscards`.`gpu_id` AS `component_id`,`graphicscards`.`name` AS `name`,NULL AS `type`,`graphicscards`.`condition` AS `condition`,`graphicscards`.`cost` AS `cost`,`graphicscards`.`status` AS `status` from `graphicscards` where (`graphicscards`.`status` = 'STORAGE') union all select 'Keyboard' AS `category`,`keyboards`.`kb_id` AS `component_id`,`keyboards`.`name` AS `name`,NULL AS `type`,`keyboards`.`condition` AS `condition`,`keyboards`.`cost` AS `cost`,`keyboards`.`status` AS `status` from `keyboards` where (`keyboards`.`status` = 'STORAGE') union all select 'Mouse' AS `category`,`mice`.`mouse_id` AS `component_id`,`mice`.`name` AS `name`,NULL AS `type`,`mice`.`condition` AS `condition`,`mice`.`cost` AS `cost`,`mice`.`status` AS `status` from `mice` where (`mice`.`status` = 'STORAGE') union all select 'Monitor' AS `category`,`monitors`.`monitor_id` AS `component_id`,`monitors`.`name` AS `name`,`monitors`.`width` AS `type`,`monitors`.`condition` AS `condition`,`monitors`.`cost` AS `cost`,`monitors`.`status` AS `status` from `monitors` where (`monitors`.`status` = 'STORAGE') union all select 'Motherboard' AS `category`,`motherboards`.`mobo_id` AS `component_id`,`motherboards`.`name` AS `name`,`motherboards`.`size` AS `type`,`motherboards`.`condition` AS `condition`,`motherboards`.`cost` AS `cost`,`motherboards`.`status` AS `status` from `motherboards` where (`motherboards`.`status` = 'STORAGE') union all select 'Power Supply' AS `category`,`powersupplies`.`psu_id` AS `component_id`,`powersupplies`.`name` AS `name`,`powersupplies`.`wattage` AS `type`,`powersupplies`.`condition` AS `condition`,`powersupplies`.`cost` AS `cost`,`powersupplies`.`status` AS `status` from `powersupplies` where (`powersupplies`.`status` = 'STORAGE') union all select 'RAM' AS `category`,`ramsticks`.`ram_id` AS `component_id`,`ramsticks`.`name` AS `name`,`ramsticks`.`type` AS `type`,`ramsticks`.`condition` AS `condition`,`ramsticks`.`cost` AS `cost`,`ramsticks`.`status` AS `status` from `ramsticks` where (`ramsticks`.`status` = 'STORAGE') union all select 'TOTAL' AS `category`,NULL AS `component_id`,NULL AS `name`,NULL AS `type`,NULL AS `condition`,sum(`all_costs`.`cost`) AS `cost`,NULL AS `status` from (select `accessories`.`cost` AS `cost` from `accessories` where (`accessories`.`status` = 'STORAGE') union all select `graphicscards`.`cost` AS `cost` from `graphicscards` where (`graphicscards`.`status` = 'STORAGE') union all select `keyboards`.`cost` AS `cost` from `keyboards` where (`keyboards`.`status` = 'STORAGE') union all select `mice`.`cost` AS `cost` from `mice` where (`mice`.`status` = 'STORAGE') union all select `monitors`.`cost` AS `cost` from `monitors` where (`monitors`.`status` = 'STORAGE') union all select `motherboards`.`cost` AS `cost` from `motherboards` where (`motherboards`.`status` = 'STORAGE') union all select `powersupplies`.`cost` AS `cost` from `powersupplies` where (`powersupplies`.`status` = 'STORAGE') union all select `ramsticks`.`cost` AS `cost` from `ramsticks` where (`ramsticks`.`status` = 'STORAGE')) `all_costs`  ;

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
  ADD KEY `storageSlotID` (`storage_slot_id`);

--
-- Indexes for table `storage_slots`
--
ALTER TABLE `storage_slots`
  ADD PRIMARY KEY (`storage_slot_id`),
  ADD KEY `storage_slot_id` (`storage_slot_id`);

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
  ADD CONSTRAINT `pcsetups_ibfk_8` FOREIGN KEY (`storage_slot_id`) REFERENCES `storage_slots` (`storage_slot_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `storage_components`
--
ALTER TABLE `storage_components`
  ADD CONSTRAINT `storageSlotID` FOREIGN KEY (`storage_slot_id`) REFERENCES `storage_slots` (`storage_slot_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
