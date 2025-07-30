-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table web_gudang.production_departement
CREATE TABLE IF NOT EXISTS `production_departement` (
  `id_dept` int NOT NULL AUTO_INCREMENT,
  `dept_name1` varchar(125) DEFAULT NULL,
  `dept_name2` varchar(125) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_dept`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.production_departement: ~0 rows (approximately)
INSERT INTO `production_departement` (`id_dept`, `dept_name1`, `dept_name2`, `created_at`) VALUES
	(1, 'CUTTING', 'SEWING', NULL),
	(2, 'SEWING', 'SEMI WAREHOUSE', NULL),
	(3, 'SEMI WAREHOUSE', 'LASTING', NULL),
	(4, 'LASTING', 'FINISHING', NULL),
	(5, 'FINISHING', 'PACKAGING', NULL),
	(6, 'PACKAGING', 'WAREHOUSE', NULL);

-- Dumping structure for table web_gudang.production_progress_ariat
CREATE TABLE IF NOT EXISTS `production_progress_ariat` (
  `id_pritem` int NOT NULL AUTO_INCREMENT,
  `id_pr` int NOT NULL DEFAULT '0',
  `id_spk` int DEFAULT NULL,
  `id_dept` int DEFAULT NULL,
  `po_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `brand_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `total_qty` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_pr` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgl_pr` datetime DEFAULT NULL,
  `dept_name1` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dept_name2` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `qty` varchar(125) DEFAULT NULL,
  `size_6d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_6_5d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_7d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_7_5d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_8d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_8_5d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_9d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_9_5d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_10d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_10_5d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_11d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_11_5d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_12d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_13d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_14d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_15d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_16d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_pritem`) USING BTREE,
  KEY `id_spk` (`id_spk`) USING BTREE,
  KEY `id_dept` (`id_dept`) USING BTREE,
  KEY `id_pr` (`id_pr`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.production_progress_ariat: ~0 rows (approximately)
INSERT INTO `production_progress_ariat` (`id_pritem`, `id_pr`, `id_spk`, `id_dept`, `po_number`, `brand_name`, `total_qty`, `no_pr`, `tgl_pr`, `dept_name1`, `dept_name2`, `qty`, `size_6d`, `size_6_5d`, `size_7d`, `size_7_5d`, `size_8d`, `size_8_5d`, `size_9d`, `size_9_5d`, `size_10d`, `size_10_5d`, `size_11d`, `size_11_5d`, `size_12d`, `size_13d`, `size_14d`, `size_15d`, `size_16d`) VALUES
	(1, 7, 27, 1, '5', 'ARIAT', '37', 'NEW-DO-AI-0002', '2025-07-30 09:09:30', 'CUTTING', 'SEWING', '37', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '11', '1', '1', '11', '1', '1'),
	(2, 8, 27, 1, '5', 'ARIAT', '37', 'NEW-DO-AI-0002', '2025-07-30 09:09:53', 'CUTTING', 'SEWING', '17', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');

-- Dumping structure for table web_gudang.production_progress_blackstone
CREATE TABLE IF NOT EXISTS `production_progress_blackstone` (
  `id_pritem` int NOT NULL AUTO_INCREMENT,
  `id_pr` int DEFAULT NULL,
  `id_spk` int DEFAULT NULL,
  `id_dept` int DEFAULT NULL,
  `po_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `brand_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `total_qty` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_pr` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgl_pr` datetime DEFAULT NULL,
  `dept_name1` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dept_name2` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `qty` varchar(125) DEFAULT NULL,
  `size_36` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_37` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_38` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_39` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_40` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_41` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_42` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_43` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_44` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_45` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_46` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_47` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_48` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_49` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_50` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_pritem`) USING BTREE,
  KEY `id_spk` (`id_spk`) USING BTREE,
  KEY `id_dept` (`id_dept`) USING BTREE,
  KEY `id_pr` (`id_pr`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.production_progress_blackstone: ~0 rows (approximately)

-- Dumping structure for table web_gudang.production_progress_report
CREATE TABLE IF NOT EXISTS `production_progress_report` (
  `id_pr` int NOT NULL AUTO_INCREMENT,
  `id_spk` int DEFAULT NULL,
  `id_dept` int DEFAULT NULL,
  `po_number` varchar(125) DEFAULT NULL,
  `brand_name` varchar(125) DEFAULT NULL,
  `total_qty` varchar(125) DEFAULT NULL,
  `no_pr` varchar(125) DEFAULT NULL,
  `dept_name1` varchar(125) DEFAULT NULL,
  `dept_name2` varchar(125) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pr`),
  KEY `id_spk` (`id_spk`),
  KEY `id_dept` (`id_dept`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.production_progress_report: ~0 rows (approximately)
INSERT INTO `production_progress_report` (`id_pr`, `id_spk`, `id_dept`, `po_number`, `brand_name`, `total_qty`, `no_pr`, `dept_name1`, `dept_name2`, `created_at`) VALUES
	(1, 25, 1, '2', 'BLACK STONE', '15', 'NEW-DO-AI-0002', 'CUTTING', 'SEWING', '2025-07-30 06:28:10'),
	(2, 25, 1, '2', 'BLACK STONE', '15', 'NEW-DO-AI-0002', 'CUTTING', 'SEWING', '2025-07-30 08:18:36'),
	(3, 25, 1, '2', 'BLACK STONE', '15', 'NEW-DO-AI-0002', 'CUTTING', 'SEWING', '2025-07-30 08:28:48'),
	(5, 26, 1, '4', 'ROSSI', '32', 'NEW-DO-AI-0002', 'CUTTING', 'SEWING', '2025-07-30 08:57:23'),
	(6, 26, 1, '4', 'ROSSI', '32', 'NEW-DO-AI-0002', 'CUTTING', 'SEWING', '2025-07-30 09:02:11'),
	(7, 27, 1, '5', 'ARIAT', '37', 'NEW-DO-AI-0002', 'CUTTING', 'SEWING', '2025-07-30 09:07:17'),
	(8, 27, 1, '5', 'ARIAT', '37', 'NEW-DO-AI-0002', 'CUTTING', 'SEWING', '2025-07-30 09:09:41');

-- Dumping structure for table web_gudang.production_progress_report_ariat
CREATE TABLE IF NOT EXISTS `production_progress_report_ariat` (
  `id_pritem` int NOT NULL AUTO_INCREMENT,
  `id_pr` int NOT NULL DEFAULT '0',
  `id_spk` int DEFAULT NULL,
  `id_dept` int DEFAULT NULL,
  `po_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `brand_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `total_qty` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_pr` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgl_pr` datetime DEFAULT NULL,
  `dept_name1` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dept_name2` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `qty` varchar(125) DEFAULT NULL,
  `size_6d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_6_5d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_7d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_7_5d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_8d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_8_5d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_9d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_9_5d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_10d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_10_5d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_11d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_11_5d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_12d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_13d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_14d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_15d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_16d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_pritem`) USING BTREE,
  KEY `id_spk` (`id_spk`) USING BTREE,
  KEY `id_dept` (`id_dept`) USING BTREE,
  KEY `id_pr` (`id_pr`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.production_progress_report_ariat: ~1 rows (approximately)
INSERT INTO `production_progress_report_ariat` (`id_pritem`, `id_pr`, `id_spk`, `id_dept`, `po_number`, `brand_name`, `total_qty`, `no_pr`, `tgl_pr`, `dept_name1`, `dept_name2`, `qty`, `size_6d`, `size_6_5d`, `size_7d`, `size_7_5d`, `size_8d`, `size_8_5d`, `size_9d`, `size_9_5d`, `size_10d`, `size_10_5d`, `size_11d`, `size_11_5d`, `size_12d`, `size_13d`, `size_14d`, `size_15d`, `size_16d`) VALUES
	(1, 7, 27, 1, '5', 'ARIAT', '37', 'NEW-DO-AI-0002', '2025-07-30 09:09:30', 'CUTTING', 'SEWING', '54', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '12', '2', '2', '12', '2', '2');

-- Dumping structure for table web_gudang.production_progress_report_blackstone
CREATE TABLE IF NOT EXISTS `production_progress_report_blackstone` (
  `id_pritem` int NOT NULL AUTO_INCREMENT,
  `id_pr` int DEFAULT NULL,
  `id_spk` int DEFAULT NULL,
  `id_dept` int DEFAULT NULL,
  `po_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `brand_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `total_qty` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_pr` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgl_pr` datetime DEFAULT NULL,
  `dept_name1` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dept_name2` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `qty` varchar(125) DEFAULT NULL,
  `size_36` varchar(125) DEFAULT NULL,
  `size_37` varchar(125) DEFAULT NULL,
  `size_38` varchar(125) DEFAULT NULL,
  `size_39` varchar(125) DEFAULT NULL,
  `size_40` varchar(125) DEFAULT NULL,
  `size_41` varchar(125) DEFAULT NULL,
  `size_42` varchar(125) DEFAULT NULL,
  `size_43` varchar(125) DEFAULT NULL,
  `size_44` varchar(125) DEFAULT NULL,
  `size_45` varchar(125) DEFAULT NULL,
  `size_46` varchar(125) DEFAULT NULL,
  `size_47` varchar(125) DEFAULT NULL,
  `size_48` varchar(125) DEFAULT NULL,
  `size_49` varchar(125) DEFAULT NULL,
  `size_50` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`id_pritem`) USING BTREE,
  KEY `id_spk` (`id_spk`) USING BTREE,
  KEY `id_dept` (`id_dept`) USING BTREE,
  KEY `id_pr` (`id_pr`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.production_progress_report_blackstone: ~0 rows (approximately)

-- Dumping structure for table web_gudang.production_progress_report_rossi
CREATE TABLE IF NOT EXISTS `production_progress_report_rossi` (
  `id_pritem` int NOT NULL AUTO_INCREMENT,
  `id_pr` int NOT NULL DEFAULT '0',
  `id_spk` int DEFAULT NULL,
  `id_dept` int DEFAULT NULL,
  `po_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `brand_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `total_qty` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_pr` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgl_pr` datetime DEFAULT NULL,
  `dept_name1` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dept_name2` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `qty` varchar(125) DEFAULT NULL,
  `size_3` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_3t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_4` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_4t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_5` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_5t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_6` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_6t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_7` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_7t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_8` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_8t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_9` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_9t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_10` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_10t` varchar(125) DEFAULT NULL,
  `size_11` varchar(125) DEFAULT NULL,
  `size_11t` varchar(125) DEFAULT NULL,
  `size_12` varchar(125) DEFAULT NULL,
  `size_13` varchar(125) DEFAULT NULL,
  `size_14` varchar(125) DEFAULT NULL,
  `size_15` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`id_pritem`) USING BTREE,
  KEY `id_spk` (`id_spk`) USING BTREE,
  KEY `id_dept` (`id_dept`) USING BTREE,
  KEY `id_pr` (`id_pr`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.production_progress_report_rossi: ~0 rows (approximately)
INSERT INTO `production_progress_report_rossi` (`id_pritem`, `id_pr`, `id_spk`, `id_dept`, `po_number`, `brand_name`, `total_qty`, `no_pr`, `tgl_pr`, `dept_name1`, `dept_name2`, `qty`, `size_3`, `size_3t`, `size_4`, `size_4t`, `size_5`, `size_5t`, `size_6`, `size_6t`, `size_7`, `size_7t`, `size_8`, `size_8t`, `size_9`, `size_9t`, `size_10`, `size_10t`, `size_11`, `size_11t`, `size_12`, `size_13`, `size_14`, `size_15`) VALUES
	(1, 5, 26, 1, '4', 'ROSSI', '32', 'NEW-DO-AI-0002', '2025-07-30 09:01:56', 'CUTTING', 'SEWING', '44', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2');

-- Dumping structure for table web_gudang.production_progress_rossi
CREATE TABLE IF NOT EXISTS `production_progress_rossi` (
  `id_pritem` int NOT NULL AUTO_INCREMENT,
  `id_pr` int NOT NULL DEFAULT '0',
  `id_spk` int DEFAULT NULL,
  `id_dept` int DEFAULT NULL,
  `po_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `brand_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `total_qty` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_pr` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgl_pr` datetime DEFAULT NULL,
  `dept_name1` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dept_name2` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `qty` varchar(125) DEFAULT NULL,
  `size_3` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_3t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_4` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_4t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_5` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_5t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_6` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_6t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_7` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_7t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_8` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_8t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_9` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_9t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_10` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_10t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_11` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_11t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_12` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_13` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_14` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_15` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_pritem`) USING BTREE,
  KEY `id_spk` (`id_spk`) USING BTREE,
  KEY `id_dept` (`id_dept`) USING BTREE,
  KEY `id_pr` (`id_pr`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.production_progress_rossi: ~0 rows (approximately)
INSERT INTO `production_progress_rossi` (`id_pritem`, `id_pr`, `id_spk`, `id_dept`, `po_number`, `brand_name`, `total_qty`, `no_pr`, `tgl_pr`, `dept_name1`, `dept_name2`, `qty`, `size_3`, `size_3t`, `size_4`, `size_4t`, `size_5`, `size_5t`, `size_6`, `size_6t`, `size_7`, `size_7t`, `size_8`, `size_8t`, `size_9`, `size_9t`, `size_10`, `size_10t`, `size_11`, `size_11t`, `size_12`, `size_13`, `size_14`, `size_15`) VALUES
	(1, 5, 26, 1, '4', 'ROSSI', '32', 'NEW-DO-AI-0002', '2025-07-30 09:01:56', 'CUTTING', 'SEWING', '22', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
	(2, 6, 26, 1, '4', 'ROSSI', '32', 'NEW-DO-AI-0002', '2025-07-30 09:02:32', 'CUTTING', 'SEWING', '22', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');

-- Dumping structure for table web_gudang.production_report
CREATE TABLE IF NOT EXISTS `production_report` (
  `id_pr` int NOT NULL AUTO_INCREMENT,
  `id_spk` int DEFAULT NULL,
  `id_dept` int DEFAULT NULL,
  `po_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `brand_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `total_qty` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_pr` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgl_pr` datetime DEFAULT NULL,
  `dept_name1` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dept_name2` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `total_qty_dept` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`id_pr`) USING BTREE,
  KEY `id_spk` (`id_spk`) USING BTREE,
  KEY `id_dept` (`id_dept`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.production_report: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
