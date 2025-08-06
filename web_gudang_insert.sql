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

-- Dumping structure for table web_gudang.return_sj
CREATE TABLE IF NOT EXISTS `return_sj` (
  `id_ir` int NOT NULL AUTO_INCREMENT,
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `brand_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_qty` varchar(125) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dept_name1` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `to` varchar(125) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `item_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `unit_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `qty_return` varchar(125) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_ir` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `keterangan` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_ir`) USING BTREE,
  KEY `id_spk` (`id_spk`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.return_sj: ~1 rows (approximately)
REPLACE INTO `return_sj` (`id_ir`, `id_spk`, `po_number`, `brand_name`, `total_qty`, `dept_name1`, `to`, `item_name`, `unit_name`, `qty_return`, `no_ir`, `created_at`, `keterangan`) VALUES
	(11, 34, 'PO-1690', 'ROSSI', '293', 'WAREHOUSE', 'MANGUL JAYA', NULL, NULL, NULL, 'RETUR-AI-0001', '2025-08-06 05:48:05', 'kita kembalikan item berikut inni dikarenakan lebih\r\n'),
	(12, 40, '0001', 'BLACK STONE', '30', 'WAREHOUSE', 'MANGUL JAYA', NULL, NULL, NULL, 'RETUR-AI-0002', '2025-08-06 07:09:57', NULL),
	(13, 41, '343424223 - 2', 'ARIAT', '', 'WAREHOUSE', 'MANGUL JAYA', NULL, NULL, NULL, 'RETUR-AI-0003', '2025-08-06 07:30:14', 'back to mj sekian\r\n'),
	(14, 42, '0002', 'BLACK STONE', '15', 'WAREHOUSE', 'MANGUL JAYA', NULL, NULL, NULL, 'RETUR-AI-0004', '2025-08-06 07:40:01', 'kembali karna rusak\r\n');

-- Dumping structure for table web_gudang.return_sj_item_ariat
CREATE TABLE IF NOT EXISTS `return_sj_item_ariat` (
  `id_iritem` int NOT NULL AUTO_INCREMENT,
  `id_ir` int NOT NULL DEFAULT '0',
  `id_spk` int DEFAULT NULL,
  `po_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `brand_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_qty` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `item_name` varchar(125) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `unit_name` varchar(125) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_ir` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_ir` datetime DEFAULT NULL,
  `dept_name1` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `to` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `qty_return` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_6d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_6_5d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_7d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_7_5d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_8d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_8_5d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_9d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_9_5d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_10d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_10_5d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_11d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_11_5d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_12d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_13d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_14d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_15d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_16d` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_iritem`) USING BTREE,
  KEY `id_spk` (`id_spk`) USING BTREE,
  KEY `id_pr` (`id_ir`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.return_sj_item_ariat: ~0 rows (approximately)
REPLACE INTO `return_sj_item_ariat` (`id_iritem`, `id_ir`, `id_spk`, `po_number`, `brand_name`, `total_qty`, `item_name`, `unit_name`, `no_ir`, `tgl_ir`, `dept_name1`, `to`, `qty_return`, `size_6d`, `size_6_5d`, `size_7d`, `size_7_5d`, `size_8d`, `size_8_5d`, `size_9d`, `size_9_5d`, `size_10d`, `size_10_5d`, `size_11d`, `size_11_5d`, `size_12d`, `size_13d`, `size_14d`, `size_15d`, `size_16d`) VALUES
	(1, 13, 41, '343424223 - 2', 'ARIAT', '1', ' TEXON T-480 2.7 MM ', 'MTK', 'RETUR-AI-0003', '2025-08-06 08:09:13', 'WAREHOUSE', 'MANGUL JAYA', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Dumping structure for table web_gudang.return_sj_item_blackstone
CREATE TABLE IF NOT EXISTS `return_sj_item_blackstone` (
  `id_iritem` int NOT NULL AUTO_INCREMENT,
  `id_ir` int DEFAULT NULL,
  `id_spk` int DEFAULT NULL,
  `po_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `brand_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_qty` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `item_name` varchar(125) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `unit_name` varchar(125) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_ir` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_ir` datetime DEFAULT NULL,
  `dept_name1` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `to` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `qty_return` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_36` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_37` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_38` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_39` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_40` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_41` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_42` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_43` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_44` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_45` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_46` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_47` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_48` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_49` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_50` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_iritem`) USING BTREE,
  KEY `id_spk` (`id_spk`) USING BTREE,
  KEY `id_pr` (`id_ir`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.return_sj_item_blackstone: ~5 rows (approximately)
REPLACE INTO `return_sj_item_blackstone` (`id_iritem`, `id_ir`, `id_spk`, `po_number`, `brand_name`, `total_qty`, `item_name`, `unit_name`, `no_ir`, `tgl_ir`, `dept_name1`, `to`, `qty_return`, `size_36`, `size_37`, `size_38`, `size_39`, `size_40`, `size_41`, `size_42`, `size_43`, `size_44`, `size_45`, `size_46`, `size_47`, `size_48`, `size_49`, `size_50`) VALUES
	(1, 12, 40, '0001', 'BLACK STONE', '2', ' BLACK KIP (HARVEST GLORY) ', 'FTK', 'RETUR-AI-0002', '2025-08-06 07:26:38', 'WAREHOUSE', 'MANGUL JAYA', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 12, 40, '0001', 'BLACK STONE', '333', ' BLACK KIP (HARVEST GLORY) ', 'FTK', 'RETUR-AI-0002', '2025-08-06 07:27:23', 'WAREHOUSE', 'MANGUL JAYA', '333', '', '', '', '333', '', '', '', '', '', '', '', '', '', '', ''),
	(3, 12, 40, '0001', 'BLACK STONE', '1', ' BLACK KIP (HARVEST GLORY) ', 'FTK', 'RETUR-AI-0002', '2025-08-06 07:27:45', 'WAREHOUSE', 'MANGUL JAYA', '1', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
	(4, 12, 40, '0001', 'BLACK STONE', '11', ' BLACK KIP (HARVEST GLORY) ', 'FTK', 'RETUR-AI-0002', '2025-08-06 07:28:57', 'WAREHOUSE', 'MANGUL JAYA', '11', '11', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
	(5, 14, 42, '0002', 'BLACK STONE', '2', ' BLACK KIP (HARVEST GLORY) ', 'FTK', 'RETUR-AI-0004', '2025-08-06 08:11:17', 'WAREHOUSE', 'MANGUL JAYA', '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Dumping structure for table web_gudang.return_sj_item_rossi
CREATE TABLE IF NOT EXISTS `return_sj_item_rossi` (
  `id_iritem` int NOT NULL AUTO_INCREMENT,
  `id_ir` int NOT NULL DEFAULT '0',
  `id_spk` int DEFAULT NULL,
  `po_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `brand_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_qty` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `item_name` varchar(125) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `unit_name` varchar(125) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_ir` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_ir` datetime DEFAULT NULL,
  `dept_name1` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `to` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `qty_return` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_3` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_3t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_4` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_4t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_5` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_5t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_6` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_6t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_7` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_7t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_8` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_8t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_9` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_9t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_10` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_10t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_11` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_11t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_12` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_13` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_14` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_15` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan` varchar(300) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_iritem`) USING BTREE,
  KEY `id_spk` (`id_spk`) USING BTREE,
  KEY `id_pr` (`id_ir`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.return_sj_item_rossi: ~2 rows (approximately)
REPLACE INTO `return_sj_item_rossi` (`id_iritem`, `id_ir`, `id_spk`, `po_number`, `brand_name`, `total_qty`, `item_name`, `unit_name`, `no_ir`, `tgl_ir`, `dept_name1`, `to`, `qty_return`, `size_3`, `size_3t`, `size_4`, `size_4t`, `size_5`, `size_5t`, `size_6`, `size_6t`, `size_7`, `size_7t`, `size_8`, `size_8t`, `size_9`, `size_9t`, `size_10`, `size_10t`, `size_11`, `size_11t`, `size_12`, `size_13`, `size_14`, `size_15`, `keterangan`) VALUES
	(23, 11, 34, 'PO-1690', 'ROSSI', '3', ' WEBBING TAPE ROSSI HERRINGBONE 21 MM ', 'PCS', 'RETUR-AI-0001', '2025-08-06 09:19:33', 'WAREHOUSE', 'MANGUL JAYA', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(24, 11, 34, 'PO-1690', 'ROSSI', '11', ' ENDURA CUPSOLE (SBR)', 'NPR', 'RETUR-AI-0001', '2025-08-06 09:45:01', 'WAREHOUSE', 'MANGUL JAYA', '11', '11', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
