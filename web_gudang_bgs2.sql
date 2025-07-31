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

-- Dumping structure for table web_gudang.form_checkin_item
CREATE TABLE IF NOT EXISTS `form_checkin_item` (
  `id_spkitem` int NOT NULL AUTO_INCREMENT,
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `xfd` date NOT NULL,
  `artcolor_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `brand_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `part_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '',
  `item_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `color_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mtrl_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `unit_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `checkin_qty` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `checkout_qty` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `checkin_balance` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `checkout_balance` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `qty` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `cons_rate` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `total_consrate` decimal(20,2) NOT NULL DEFAULT '0.00',
  `size_36` varchar(50) NOT NULL DEFAULT '0',
  `size_37` varchar(50) NOT NULL DEFAULT '0',
  `size_38` varchar(50) NOT NULL DEFAULT '0',
  `size_39` varchar(50) NOT NULL DEFAULT '0',
  `size_40` varchar(50) NOT NULL DEFAULT '0',
  `size_41` varchar(50) NOT NULL DEFAULT '0',
  `size_42` varchar(50) NOT NULL DEFAULT '0',
  `size_43` varchar(50) NOT NULL DEFAULT '0',
  `size_44` varchar(50) NOT NULL DEFAULT '0',
  `size_45` varchar(50) NOT NULL DEFAULT '0',
  `size_46` varchar(50) NOT NULL DEFAULT '0',
  `size_47` varchar(50) NOT NULL DEFAULT '0',
  `size_48` varchar(50) NOT NULL DEFAULT '0',
  `size_49` varchar(50) NOT NULL DEFAULT '0',
  `size_50` varchar(50) NOT NULL DEFAULT '0',
  `size_3` varchar(50) NOT NULL DEFAULT '0',
  `size_3t` varchar(50) NOT NULL DEFAULT '0',
  `size_4` varchar(50) NOT NULL DEFAULT '0',
  `size_4t` varchar(50) NOT NULL DEFAULT '0',
  `size_5` varchar(50) NOT NULL DEFAULT '0',
  `size_5t` varchar(50) NOT NULL DEFAULT '0',
  `size_6` varchar(50) NOT NULL DEFAULT '0',
  `size_6t` varchar(50) NOT NULL DEFAULT '0',
  `size_7` varchar(50) NOT NULL DEFAULT '0',
  `size_7t` varchar(50) NOT NULL DEFAULT '0',
  `size_8` varchar(50) NOT NULL DEFAULT '0',
  `size_8t` varchar(50) NOT NULL DEFAULT '0',
  `size_9` varchar(50) NOT NULL DEFAULT '0',
  `size_9t` varchar(50) NOT NULL DEFAULT '0',
  `size_10` varchar(50) NOT NULL DEFAULT '0',
  `size_10t` varchar(50) NOT NULL DEFAULT '0',
  `size_11` varchar(50) NOT NULL DEFAULT '0',
  `size_11t` varchar(50) NOT NULL DEFAULT '0',
  `size_12` varchar(50) NOT NULL DEFAULT '0',
  `size_13` varchar(50) NOT NULL DEFAULT '0',
  `size_14` varchar(50) NOT NULL DEFAULT '0',
  `size_15` varchar(50) NOT NULL DEFAULT '0',
  `size_6d` int DEFAULT NULL,
  `size_6_5d` int DEFAULT NULL,
  `size_7d` int DEFAULT NULL,
  `size_7_5d` int DEFAULT NULL,
  `size_8d` int DEFAULT NULL,
  `size_8_5d` int DEFAULT NULL,
  `size_9d` int DEFAULT NULL,
  `size_9_5d` int DEFAULT NULL,
  `size_10d` int DEFAULT NULL,
  `size_10_5d` int DEFAULT NULL,
  `size_11d` int DEFAULT NULL,
  `size_11_5d` int DEFAULT NULL,
  `size_12d` int DEFAULT NULL,
  `size_13d` int DEFAULT NULL,
  `size_14d` int DEFAULT NULL,
  `size_15d` int DEFAULT NULL,
  `size_16d` int DEFAULT NULL,
  PRIMARY KEY (`id_spkitem`) USING BTREE,
  KEY `id_spk` (`id_spk`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_checkin_item: ~43 rows (approximately)
INSERT INTO `form_checkin_item` (`id_spkitem`, `id_spk`, `po_number`, `xfd`, `artcolor_name`, `brand_name`, `part_name`, `item_name`, `color_name`, `mtrl_name`, `unit_name`, `checkin_qty`, `checkout_qty`, `checkin_balance`, `checkout_balance`, `qty`, `cons_rate`, `total_consrate`, `size_36`, `size_37`, `size_38`, `size_39`, `size_40`, `size_41`, `size_42`, `size_43`, `size_44`, `size_45`, `size_46`, `size_47`, `size_48`, `size_49`, `size_50`, `size_3`, `size_3t`, `size_4`, `size_4t`, `size_5`, `size_5t`, `size_6`, `size_6t`, `size_7`, `size_7t`, `size_8`, `size_8t`, `size_9`, `size_9t`, `size_10`, `size_10t`, `size_11`, `size_11t`, `size_12`, `size_13`, `size_14`, `size_15`, `size_6d`, `size_6_5d`, `size_7d`, `size_7_5d`, `size_8d`, `size_8_5d`, `size_9d`, `size_9_5d`, `size_10d`, `size_10_5d`, `size_11d`, `size_11_5d`, `size_12d`, `size_13d`, `size_14d`, `size_15d`, `size_16d`) VALUES
	(55, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'UPPER (V,BS,JV,TTL)', ' BLACK KIP (HARVEST GLORY) ', 'BLACK', '2.2 - 2.4', 'FTK', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 2.9000, 849.70, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(56, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'INSOLE', ' TEXON T-480 2.7 MM ', 'NATURAL', '100 X 150', 'MTK', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0540, 15.82, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(57, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'FILLER', ' EVA 2 MM HD 35 - 40 MM ', 'BLACK', '44"', 'MTR', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0350, 10.26, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(58, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'TOE BOX', ' TEXON G 565 (N587) ', 'NATURAL', '100 X 100', 'MTK', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0298, 8.73, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(59, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'BACK COUNTER', ' TEXON RITE 1.5 MM ', 'NATURAL', '100 X 100', 'MTK', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0272, 7.97, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(60, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'BACK COUNTER LINING', ' POLYURETHANE SYNTHETIC LEATHER 0.8 - 1.0 MM (H-8080)  ', 'BLACK', '56"', 'MTR', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0194, 5.68, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(61, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'LABEL INSIDE', ' SATIN LABEL AS/NZS 2210.5.2019 EN ISO 20347:2012 BMP 714442, 714443 OCCUPATIONAL BOOT ', 'GREY', 'C3', 'PCS', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 2.0000, 586.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(62, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'SIZE LABEL', ' SATIN SIZE + STYLE ', 'WHITE/BLACK', '', 'PCS', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 2.0000, 586.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(63, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'FRONT LOOP', ' WEBBING TAPE ROSSI HERRINGBONE 21 MM ', 'BLACK/CREAM', '', 'PCS', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 2.0000, 586.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(64, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'QUARTER ELASTIC', ' ELASTIC 115MM  ', 'BLACK', '', 'MTR', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.3900, 114.27, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(65, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'UPPER THREAD ', ' TKT 20 ', 'BLACK', '', 'CJ', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0120, 3.52, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(66, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'UPPER THREAD ', ' TKT 30 ', 'BLACK', '', 'CJ', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0062, 1.82, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(67, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'UPPER THREAD ', ' TKT 40 ', 'BLACK', '', 'CJ', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0020, 0.59, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(68, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH (STITCHING)', ' LEM 168 G/W ', '', '', 'KGM', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0150, 4.40, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(69, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH (STITCHING)', ' LEM 7300 TF ', '', '', 'KGM', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0020, 0.59, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(70, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'OUTSOLE', ' ENDURA CUPSOLE (SBR)', 'BLACK', '', 'NPR', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 1.0000, 293.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(71, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH ', ' BONDING AGENT 224 - 2 ', '', '', 'KGM', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0110, 3.22, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(72, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH ', ' LEM 5100 AB ', '', '', 'KGM', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0600, 17.58, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(73, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH ', ' PRIMER D-PLY 008 F ', '', '', 'KGM', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0050, 1.47, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(74, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH GANTI MEK', ' PRIMER D-PLY 1402 ', '', '', 'KGM', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0050, 1.47, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(75, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH PRIMER OUTSOLE SBR', ' PRIMER D-PLY 232 ', '', '', 'KGM', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0110, 3.22, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(76, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH ', ' D-TAC 7100 ', '', '', 'KGM', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0200, 5.86, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(77, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH', ' UNIDUR 1001 ', '', '', 'TIN', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0039, 1.14, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(78, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH', ' LATEX CAIR 60%  ', '', '', 'KGM', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0350, 10.26, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(79, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH', ' MEK ', '', '', 'KGM', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0050, 1.47, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(80, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH TOE LASTER', ' HOTMELT ROD CEMENT ', 'E44', '', 'KGM', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0133, 3.90, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(81, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH INSOLE', ' GLUE STICK ', 'WHITE', '1KGM=34BTG', 'KGM', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0018, 0.53, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(82, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH (LASTING INSOLE)', ' MASKING TAPE 1', 'NATURAL', '1ROLL=20Y    ', 'ROLL', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0011, 0.32, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(83, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'BAHAN PEMBANTU', ' PP BAG BENING/POLOS 0.03X40X45 ', 'CLEAR', '', 'KGM', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0167, 4.89, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(84, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'FOOTBED', ' ANTISTATIC FOOTBED ', 'RED', '', 'NPR', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 1.0000, 293.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(85, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'KERTAS SUMPEL', ' KERTAS DOORSLAG ', '', '44 X 69    ', 'PCS', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 4.0000, 1172.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(86, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'KERTAS SEKAT', ' KERTAS DUPLEX 250 GR 21 X 29 CM ', '', '', 'SHT', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0769, 22.53, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(87, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'SHOE HUNGER', ' KERTAS DUPLEX 500 GR 8 X 30 CM ', '', '', 'SHT', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0625, 18.31, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(88, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'BARCODE LABEL', ' BARCODE STICKER ART. 301 (FROM TEKHAN) ', '', '', 'PCS', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 1.0000, 293.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(89, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'TAG', ' SWING TAG ENDURA SOLE ART. 301 (MAN) (AVERY DENNISON) ', '', '', 'EA', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 1.0000, 293.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(90, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'TAG', ' CARE CARD (NEW FROM AVERY DENNISON) ', '', '', 'PCS', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 1.0000, 293.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(91, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'HANG TAG HOLDER', ' QUICK SNAP LOOP  ', 'BLACK', '12 MM', 'PCS', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 1.0000, 293.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(92, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'PACKING PAPER', ' WRAPPING SHOE ', 'YELLOW/RED/BLACK', 'ALL SZZ', 'PCS', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 1.0000, 293.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(93, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ANTI FUNGUS', ' MICROGARDE GREEN STICKER ', '', '', 'PCE', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 2.0000, 586.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(94, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'INNER BOX ', ' 6', '', '', 'PCS', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 1.0000, 293.00, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(95, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'CTN BOX', ' ISI 5 UK. ', '', '', 'PCS', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.2000, 58.60, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(96, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH (PACKING)', ' POLYPROPELINE (PP) TAPE 3', 'CLEAR', '3"', 'RO', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0076, 2.23, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(97, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH ', ' DOUBLE TAPE 6 MM ', '', '', 'RO', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0430, 12.60, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
