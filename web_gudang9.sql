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

-- Dumping structure for table web_gudang.form_ac
CREATE TABLE IF NOT EXISTS `form_ac` (
  `id_ac` int NOT NULL AUTO_INCREMENT,
  `artcolor_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_ac`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_ac: ~3 rows (approximately)
INSERT INTO `form_ac` (`id_ac`, `artcolor_name`) VALUES
	(1, 'CG 104 BLACK COFFEE'),
	(2, 'EG 555 GUN METAL'),
	(3, 'CG177 BLACK'),
	(4, 'CG177 BLACK COFFEE');

-- Dumping structure for table web_gudang.form_art
CREATE TABLE IF NOT EXISTS `form_art` (
  `id_art` int NOT NULL AUTO_INCREMENT,
  `art_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_art`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_art: ~3 rows (approximately)
INSERT INTO `form_art` (`id_art`, `art_name`) VALUES
	(1, 'CG 104'),
	(2, 'EG 555'),
	(3, 'CG177');

-- Dumping structure for table web_gudang.form_artcolor
CREATE TABLE IF NOT EXISTS `form_artcolor` (
  `id_artcolor` int NOT NULL AUTO_INCREMENT,
  `art_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `color_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `artcolor_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_artcolor`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.form_artcolor: ~14 rows (approximately)
INSERT INTO `form_artcolor` (`id_artcolor`, `art_name`, `color_name`, `artcolor_name`) VALUES
	(1, 'CG 104', '', ''),
	(4, 'EG 555', NULL, NULL),
	(5, NULL, 'BLACK COFFEE', NULL),
	(6, NULL, 'GUN METAL', NULL),
	(9, 'CG 104', NULL, NULL),
	(10, NULL, 'BLACK COFFEE', NULL),
	(11, NULL, NULL, 'CG 104 BLACK COFFEE'),
	(12, 'EG 555', NULL, NULL),
	(13, NULL, 'GUN METAL', NULL),
	(14, NULL, NULL, 'EG 555 GUN METAL'),
	(15, 'CG177', NULL, NULL),
	(16, NULL, 'BLACK', NULL),
	(17, NULL, NULL, 'CG177 BLACK'),
	(18, NULL, NULL, 'CG177 BLACK COFFEE');

-- Dumping structure for table web_gudang.form_brand
CREATE TABLE IF NOT EXISTS `form_brand` (
  `id_brand` int NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(128) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_brand`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.form_brand: ~3 rows (approximately)
INSERT INTO `form_brand` (`id_brand`, `brand_name`) VALUES
	(3, 'ROSSI'),
	(4, 'BLACK STONE'),
	(5, 'ARIAT');

-- Dumping structure for table web_gudang.form_checkin_ariat
CREATE TABLE IF NOT EXISTS `form_checkin_ariat` (
  `id_checkin` int NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `no_sj` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `supplier` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `art` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_material` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_material` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `qty` int NOT NULL DEFAULT '0',
  `unit` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ket` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `s6d` int DEFAULT '0',
  `s6td` int DEFAULT '0',
  `s7d` int DEFAULT '0',
  `s7td` int DEFAULT '0',
  `s8d` int DEFAULT '0',
  `s8td` int DEFAULT '0',
  `s9d` int DEFAULT '0',
  `s9td` int DEFAULT '0',
  `s10d` int DEFAULT '0',
  `s10td` int DEFAULT '0',
  `s11d` int DEFAULT '0',
  `s11td` int DEFAULT '0',
  `s12d` int DEFAULT '0',
  `s13d` int DEFAULT '0',
  `s14d` int DEFAULT '0',
  `s15d` int DEFAULT '0',
  `s16d` int DEFAULT '0',
  PRIMARY KEY (`id_checkin`) USING BTREE,
  KEY `id_spk` (`id_spk`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_checkin_ariat: ~2 rows (approximately)
INSERT INTO `form_checkin_ariat` (`id_checkin`, `id_transaksi`, `brand`, `keterangan`, `tanggal_masuk`, `no_sj`, `supplier`, `id_spk`, `po_number`, `art`, `jenis_material`, `item_type`, `nama_material`, `qty`, `unit`, `ket`, `s6d`, `s6td`, `s7d`, `s7td`, `s8d`, `s8td`, `s9d`, `s9td`, `s10d`, `s10td`, `s11d`, `s11td`, `s12d`, `s13d`, `s14d`, `s15d`, `s16d`) VALUES
	(18, 'WG-202575046231', 'ARIAT', 'CHECK IN', '2025-07-18', 'A1', 'A1', 0, 'A1', 'A1', 'A1', 'A1', 'A1', 50, 'FTK', '11 JULY', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(19, 'WG-202546095238', 'ARIAT', 'CHECK IN', '2025-07-18', 'A2', 'A2', 0, 'A2', 'A2', 'A2', 'A2', 'A2', 100, 'KGM', '20 JULY', 3, 3, 3, 4, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 0);

-- Dumping structure for table web_gudang.form_checkin_blackstone
CREATE TABLE IF NOT EXISTS `form_checkin_blackstone` (
  `id_checkin` int NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `no_sj` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `supplier` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `artcolor_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_material` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_type` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_material` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `qty` int NOT NULL DEFAULT '0',
  `unit` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `xfd` date NOT NULL,
  `s36` int DEFAULT NULL,
  `s37` int DEFAULT NULL,
  `s38` int DEFAULT NULL,
  `s39` int DEFAULT NULL,
  `s40` int DEFAULT NULL,
  `s41` int DEFAULT NULL,
  `s42` int DEFAULT NULL,
  `s43` int DEFAULT NULL,
  `s44` int DEFAULT NULL,
  `s45` int DEFAULT NULL,
  `s46` int DEFAULT NULL,
  `s47` int DEFAULT NULL,
  `s48` int DEFAULT NULL,
  `s49` int DEFAULT NULL,
  `s50` int DEFAULT NULL,
  PRIMARY KEY (`id_checkin`) USING BTREE,
  KEY `id_spk` (`id_spk`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_checkin_blackstone: ~0 rows (approximately)

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
  `qty` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `cons_rate` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `total_consrate` decimal(20,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id_spkitem`) USING BTREE,
  KEY `id_spk` (`id_spk`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_checkin_item: ~19 rows (approximately)
INSERT INTO `form_checkin_item` (`id_spkitem`, `id_spk`, `po_number`, `xfd`, `artcolor_name`, `brand_name`, `part_name`, `item_name`, `color_name`, `mtrl_name`, `unit_name`, `qty`, `cons_rate`, `total_consrate`) VALUES
	(8, 15, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'BLACK STONE', 'UPPER 1 (TC+E+COLLAR)', 'LATEX CAIR 60% @ 180 KG', 'BLACK COFFEE', '1.6 - 1.8 ', 'PCE', 0.0000, 2.6100, 391.50),
	(9, 15, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'BLACK STONE', 'LINING (QT)', 'PIG SKIN', 'GRAPHITE', '0.7 - 0.9', 'FTK', 0.0000, 1.7927, 391.50),
	(14, 15, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'BLACK STONE', 'LINING (BS)', 'PIG SKIN (DIBALIK)', 'GRAPHITE', '0.7 - 0.9', 'FTK', 0.0000, 0.3562, 391.50),
	(15, 15, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'BLACK STONE', 'LINING (BS)', 'PIG SKIN (DIBALIK)', 'BLACK', '0.7 - 0.9', 'FTK', 0.0000, 0.3562, 391.50),
	(16, 15, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'BLACK STONE', 'LINING (BS)', 'PLY MAKER', 'GUN METAL', '0.7 - 0.9', 'LTR', 0.0000, 2.6100, 391.50),
	(17, 15, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'BLACK STONE', 'LINING (BS)', 'STICKER PITOGRAM / GOLD', 'GRAPHITE', '1.6 - 1.8 ', 'LTR', 0.0000, 0.3562, 0.00),
	(18, 15, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'BLACK STONE', 'LINING (BS)', 'LATEX CAIR 60% @ 180 KG', 'GUN METAL', '1.6 - 1.8 ', 'FTK', 0.0000, 2.6100, 391.50),
	(19, 15, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'BLACK STONE', 'LINING (BS)', 'MAINSAIL NUBUCK', 'BLACK COFFEE', '1.6 - 1.8 ', 'PCE', 0.0000, 0.3562, 53.43),
	(20, 15, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'BLACK STONE', 'LINING (BS)', 'PIG SKIN (DIBALIK)', 'GUN METAL', '0.7 - 0.9', 'LTR', 0.0000, 2.6100, 391.50),
	(21, 16, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'ROSSI', 'LINING (BS)', 'LATEX CAIR 60% @ 180 KG', 'GRAPHITE', '0.7 - 0.9', 'LTR', 30.0000, 2.6100, 11.13),
	(22, 16, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'ROSSI', 'UPPER 1 (TC+E+COLLAR)', 'LATEX CAIR 60% @ 180 KG', 'BLACK COFFEE', '0.7 - 0.9', 'LTR', 30.0000, 0.3562, 11.13),
	(23, 17, 'IO24-0152', '2025-07-24', 'EG 555 GUN METAL', 'ARIAT', 'UPPER 1 (TC+E+COLLAR)', 'PIG SKIN (DIBALIK)', 'BLACK COFFEE', '1.6 - 1.8 ', 'PCE', 0.0000, 2.6100, 448.92),
	(24, 17, 'IO24-0152', '2025-07-24', 'EG 555 GUN METAL', 'ARIAT', 'UPPER 1 (TC+E+COLLAR)', 'MAINSAIL NUBUCK', 'GUN METAL', '1.6 - 1.8 ', 'LTR', 20.0000, 2.6100, 448.92),
	(25, 17, 'IO24-0152', '2025-07-24', 'EG 555 GUN METAL', 'ARIAT', 'LINING (BS)', 'PIG SKIN', 'BLACK COFFEE', '0.7 - 0.9', 'FTK', 47.0000, 0.0250, 4.30),
	(26, 18, 'IO24-0152', '2025-07-03', 'EG 555 GUN METAL', 'BLACK STONE', 'LINING (BS)', 'PIG SKIN (DIBALIK)', 'BLACK COFFEE', '1.6 - 1.8 ', 'LTR', 45.0000, 2.6100, 401.94),
	(27, 18, 'IO24-0152', '2025-07-03', 'EG 555 GUN METAL', 'BLACK STONE', 'UPPER 1 (TC+E+COLLAR)', 'STICKER PITOGRAM / GOLD', 'GUN METAL', '0.7 - 0.9', 'PCE', 0.0000, 0.3562, 54.85),
	(28, 18, 'IO24-0152', '2025-07-03', 'EG 555 GUN METAL', 'BLACK STONE', 'UPPER 1 (TC+E+COLLAR)', 'PLY MAKER', 'BLACK COFFEE', '1.6 - 1.8 ', 'LTR', 115.0000, 1.8164, 279.73),
	(29, 16, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'ROSSI', 'UPPER 1 (TC+E+COLLAR)', 'STICKER PITOGRAM / GOLD', 'BLACK COFFEE', '1.6 - 1.8 ', 'FTK', 75.0000, 2.6100, 1161.45),
	(30, 16, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'ROSSI', 'UPPER 1 (TC+E+COLLAR)', 'LATEX CAIR 60% @ 180 KG', 'BLACK COFFEE', '1.6 - 1.8 ', 'LTR', 30.0000, 0.0250, 11.13);

-- Dumping structure for table web_gudang.form_checkin_rossi
CREATE TABLE IF NOT EXISTS `form_checkin_rossi` (
  `id_checkin` int NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `no_sj` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `supplier` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `artcolor_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_material` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_material` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `qty` int NOT NULL DEFAULT '0',
  `unit` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ket` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `s3` int DEFAULT '0',
  `s3t` int DEFAULT '0',
  `s4` int DEFAULT '0',
  `s4t` int DEFAULT '0',
  `s5` int DEFAULT '0',
  `s5t` int DEFAULT '0',
  `s6` int DEFAULT '0',
  `s6t` int DEFAULT '0',
  `s7` int DEFAULT '0',
  `s7t` int DEFAULT '0',
  `s8` int DEFAULT '0',
  `s8t` int DEFAULT '0',
  `s9` int DEFAULT '0',
  `s9t` int DEFAULT '0',
  `s10` int DEFAULT '0',
  `s10t` int DEFAULT '0',
  `s11` int DEFAULT '0',
  `s11t` int DEFAULT '0',
  `s12` int DEFAULT '0',
  `s13` int DEFAULT '0',
  `s14` int DEFAULT '0',
  `s15` int DEFAULT '0',
  PRIMARY KEY (`id_checkin`) USING BTREE,
  KEY `id_spk` (`id_spk`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_checkin_rossi: ~0 rows (approximately)

-- Dumping structure for table web_gudang.form_checkout_ariat
CREATE TABLE IF NOT EXISTS `form_checkout_ariat` (
  `id_checkout` int NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_sj` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `dept_tujuan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `supplier` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `po_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `art` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_material` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_material` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_material` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `qty` int NOT NULL DEFAULT '0',
  `unit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ket` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `s6d` int DEFAULT '0',
  `s6td` int DEFAULT '0',
  `s7d` int DEFAULT '0',
  `s7td` int DEFAULT '0',
  `s8d` int DEFAULT '0',
  `s8td` int DEFAULT '0',
  `s9d` int DEFAULT '0',
  `s9td` int DEFAULT '0',
  `s10d` int DEFAULT '0',
  `s10td` int DEFAULT '0',
  `s11d` int DEFAULT '0',
  `s11td` int DEFAULT '0',
  `s12d` int DEFAULT '0',
  `s13d` int DEFAULT '0',
  `s14d` int DEFAULT '0',
  `s15d` int DEFAULT '0',
  PRIMARY KEY (`id_checkout`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_checkout_ariat: ~2 rows (approximately)
INSERT INTO `form_checkout_ariat` (`id_checkout`, `id_transaksi`, `brand`, `keterangan`, `no_sj`, `tanggal_masuk`, `tanggal_keluar`, `dept_tujuan`, `supplier`, `po_number`, `art`, `jenis_material`, `kode_material`, `nama_material`, `qty`, `unit`, `ket`, `s6d`, `s6td`, `s7d`, `s7td`, `s8d`, `s8td`, `s9d`, `s9td`, `s10d`, `s10td`, `s11d`, `s11td`, `s12d`, `s13d`, `s14d`, `s15d`) VALUES
	(25, 'WG-202575046231', 'ARIAT', 'CHECK OUT', 'A1', '2025-07-18', '2025-08-03', 'SEMI WH', 'A1', 'A1', 'A1', 'A1', 'A1', 'A1', 50, 'FTK', '11 JULY', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(26, 'WG-202546095238', 'ARIAT', 'CHECK OUT', 'A2', '2025-07-18', '2025-08-03', 'LASTING', 'A2', 'A2', 'A2', 'A2', 'A2', 'A2', 50, 'KGM', '20 JULY', 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- Dumping structure for table web_gudang.form_checkout_blackstone
CREATE TABLE IF NOT EXISTS `form_checkout_blackstone` (
  `id_checkout` int NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_sj` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `dept_tujuan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `supplier` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `po_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `art` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_material` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_material` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_material` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `qty` int NOT NULL DEFAULT '0',
  `unit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ket` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `s36` int DEFAULT '0',
  `s37` int DEFAULT '0',
  `s38` int DEFAULT '0',
  `s39` int DEFAULT '0',
  `s40` int DEFAULT '0',
  `s41` int DEFAULT '0',
  `s42` int DEFAULT '0',
  `s43` int DEFAULT '0',
  `s44` int DEFAULT '0',
  `s45` int DEFAULT '0',
  `s46` int DEFAULT '0',
  `s47` int DEFAULT '0',
  `s48` int DEFAULT '0',
  `s49` int DEFAULT '0',
  `s50` int DEFAULT '0',
  PRIMARY KEY (`id_checkout`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_checkout_blackstone: ~2 rows (approximately)
INSERT INTO `form_checkout_blackstone` (`id_checkout`, `id_transaksi`, `brand`, `keterangan`, `no_sj`, `tanggal_masuk`, `tanggal_keluar`, `dept_tujuan`, `supplier`, `po_number`, `art`, `jenis_material`, `kode_material`, `nama_material`, `qty`, `unit`, `ket`, `s36`, `s37`, `s38`, `s39`, `s40`, `s41`, `s42`, `s43`, `s44`, `s45`, `s46`, `s47`, `s48`, `s49`, `s50`) VALUES
	(31, 'WG-202554302791', 'BLACKSTONE', 'CHECK OUT', 'B1', '2025-07-18', '2025-08-01', 'CUTTING', 'MANGUL JAYA', 'B1', 'B1', 'B1', 'B1', 'B1', 5, 'KGM', '11 JULY', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(32, 'WG-202534186095', 'BLACKSTONE', 'CHECK OUT', 'B2', '2025-07-18', '2025-08-01', 'LASTING', 'MANGUL JAYA', 'B2', 'B2', 'B2', 'B2', 'B2', 50, 'FTK', '11 JULY', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- Dumping structure for table web_gudang.form_checkout_rossi
CREATE TABLE IF NOT EXISTS `form_checkout_rossi` (
  `id_checkout` int NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `brand` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_sj` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `dept_tujuan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `supplier` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `po_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `art` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_material` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_material` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_material` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `qty` int NOT NULL DEFAULT '0',
  `unit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ket` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `s3` int DEFAULT '0',
  `s3t` int DEFAULT '0',
  `s4` int DEFAULT '0',
  `s4t` int DEFAULT '0',
  `s5` int DEFAULT '0',
  `s5t` int DEFAULT '0',
  `s6` int DEFAULT '0',
  `s6t` int DEFAULT '0',
  `s7` int DEFAULT '0',
  `s7t` int DEFAULT '0',
  `s8` int DEFAULT '0',
  `s8t` int DEFAULT '0',
  `s9` int DEFAULT '0',
  `s9t` int DEFAULT '0',
  `s10` int DEFAULT '0',
  `s10t` int DEFAULT '0',
  `s11` int DEFAULT '0',
  `s11t` int DEFAULT '0',
  `s12` int DEFAULT '0',
  `s13` int DEFAULT '0',
  `s14` int DEFAULT '0',
  `s15` int DEFAULT '0',
  PRIMARY KEY (`id_checkout`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_checkout_rossi: ~2 rows (approximately)
INSERT INTO `form_checkout_rossi` (`id_checkout`, `id_transaksi`, `brand`, `keterangan`, `no_sj`, `tanggal_masuk`, `tanggal_keluar`, `dept_tujuan`, `supplier`, `po_number`, `art`, `jenis_material`, `kode_material`, `nama_material`, `qty`, `unit`, `ket`, `s3`, `s3t`, `s4`, `s4t`, `s5`, `s5t`, `s6`, `s6t`, `s7`, `s7t`, `s8`, `s8t`, `s9`, `s9t`, `s10`, `s10t`, `s11`, `s11t`, `s12`, `s13`, `s14`, `s15`) VALUES
	(24, 'WG-202517523869', 'ROSSI', 'CHECK OUT', 'R1', '2025-07-18', '2025-08-02', 'SEMI WH', 'MANGUL JAYA', 'R1', 'R1', 'R1', 'R1', 'R1', 5, 'FTK', '11 JULY', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(25, 'WG-202525048369', 'ROSSI', 'CHECK OUT', 'R2', '2025-07-18', '2025-08-02', 'PACKING', 'MANGUL JAYA', 'R2', 'R2', 'R2', 'R2', 'R2', 50, 'KGM', '11 JULY', 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2);

-- Dumping structure for table web_gudang.form_color
CREATE TABLE IF NOT EXISTS `form_color` (
  `id_color` int NOT NULL AUTO_INCREMENT,
  `color_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_color`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_color: ~3 rows (approximately)
INSERT INTO `form_color` (`id_color`, `color_name`) VALUES
	(1, 'BLACK COFFEE'),
	(2, 'GUN METAL'),
	(3, 'BLACK');

-- Dumping structure for table web_gudang.form_consrate
CREATE TABLE IF NOT EXISTS `form_consrate` (
  `id_consrate` int NOT NULL AUTO_INCREMENT,
  `artcolor_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `item_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `color_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `unit_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `cons_rate` decimal(10,5) NOT NULL,
  PRIMARY KEY (`id_consrate`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_consrate: ~3 rows (approximately)
INSERT INTO `form_consrate` (`id_consrate`, `artcolor_name`, `item_name`, `color_name`, `unit_name`, `cons_rate`) VALUES
	(1, 'CG 104 BLACK COFFEE', 'LATEX CAIR 60% @ 180 KG', 'BLACK COFFEE', 'LTR', 0.02500),
	(3, 'EG 555 GUN METAL', 'LATEX CAIR 60% @ 180 KG', 'GUN METAL', 'LTR', 2.61000),
	(4, 'EG 555 GUN METAL', 'STICKER PITOGRAM / GOLD', 'BLACK', 'LTR', 2.61000),
	(5, 'CG 104 BLACK COFFEE', 'LATEX CAIR 60% @ 180 KG', '', 'LTR', 2.61000);

-- Dumping structure for table web_gudang.form_listitem
CREATE TABLE IF NOT EXISTS `form_listitem` (
  `id_listitem` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(128) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `unit_name` varchar(128) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `item_type` varchar(128) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_listitem`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_listitem: ~2 rows (approximately)
INSERT INTO `form_listitem` (`id_listitem`, `item_name`, `unit_name`, `item_type`) VALUES
	(1, 'LATEX CAIR 60% @ 180 KG', 'LTR', NULL),
	(2, 'STICKER PITOGRAM / GOLD', 'LTR', NULL);

-- Dumping structure for table web_gudang.form_size
CREATE TABLE IF NOT EXISTS `form_size` (
  `id_size` int NOT NULL AUTO_INCREMENT,
  `size_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_size`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_size: ~3 rows (approximately)
INSERT INTO `form_size` (`id_size`, `size_name`) VALUES
	(2, '49'),
	(3, '50'),
	(4, '51');

-- Dumping structure for table web_gudang.form_sj
CREATE TABLE IF NOT EXISTS `form_sj` (
  `id_sj` int NOT NULL AUTO_INCREMENT,
  `id_spk` int DEFAULT NULL,
  `no_do` varchar(125) DEFAULT NULL,
  `no_sj` varchar(125) DEFAULT NULL,
  `po_number` varchar(125) DEFAULT NULL,
  `xfd` date DEFAULT NULL,
  `artcolor_name` varchar(125) DEFAULT NULL,
  `brand_name` varchar(125) DEFAULT NULL,
  `total_qty` varchar(125) DEFAULT NULL,
  `tgl_checkin` date DEFAULT NULL,
  `supplier_name` varchar(125) DEFAULT NULL,
  `no_plat` varchar(125) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_sj`),
  KEY `id_spk` (`id_spk`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.form_sj: ~6 rows (approximately)
INSERT INTO `form_sj` (`id_sj`, `id_spk`, `no_do`, `no_sj`, `po_number`, `xfd`, `artcolor_name`, `brand_name`, `total_qty`, `tgl_checkin`, `supplier_name`, `no_plat`, `created_at`) VALUES
	(1, 18, '12', '', 'IO24-0152', '2025-07-03', 'EG 555 GUN METAL', 'BLACK STONE', NULL, '2025-07-23', '13', '123', '2025-07-22 05:45:23'),
	(2, 17, '11', '', 'IO24-0152', '2025-07-24', 'EG 555 GUN METAL', 'ARIAT', NULL, '2025-07-24', '13', 'WEQ', '2025-07-23 03:08:23'),
	(3, 16, '13', '', 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'ROSSI', NULL, '2025-07-17', '13', 'WEQ', '2025-07-23 06:55:16'),
	(4, 16, '14', '', 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'ROSSI', NULL, '2025-07-16', '213132', '132132', '2025-07-23 08:06:55'),
	(5, 18, '15', '', 'IO24-0152', '2025-07-03', 'EG 555 GUN METAL', 'BLACK STONE', NULL, '2025-07-25', '13', 'WEQ', '2025-07-24 01:27:33'),
	(6, 17, '17', '', 'IO24-0152', '2025-07-24', 'EG 555 GUN METAL', 'ARIAT', NULL, '2025-07-07', '213132', 'WEQ', '2025-07-24 05:32:01'),
	(7, 18, '13', '', 'IO24-0152', '2025-07-03', 'EG 555 GUN METAL', 'BLACK STONE', NULL, '2025-07-25', 'MJ', '132132', '2025-07-24 07:43:49');

-- Dumping structure for table web_gudang.form_sjitem_ariat
CREATE TABLE IF NOT EXISTS `form_sjitem_ariat` (
  `id_bsj` int NOT NULL AUTO_INCREMENT,
  `id_sj` int NOT NULL DEFAULT '0',
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `brand_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `artcolor_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `supplier_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `no_do` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_sj` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_plat` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgl_checkin` date DEFAULT NULL,
  `xfd` date DEFAULT NULL,
  `item_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `item_type` varchar(125) DEFAULT NULL,
  `unit_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `qty` decimal(20,6) DEFAULT NULL,
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
  PRIMARY KEY (`id_bsj`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_sjitem_ariat: ~3 rows (approximately)
INSERT INTO `form_sjitem_ariat` (`id_bsj`, `id_sj`, `id_spk`, `po_number`, `brand_name`, `artcolor_name`, `supplier_name`, `no_do`, `no_sj`, `no_plat`, `tgl_checkin`, `xfd`, `item_name`, `item_type`, `unit_name`, `qty`, `size_6d`, `size_6_5d`, `size_7d`, `size_7_5d`, `size_8d`, `size_8_5d`, `size_9d`, `size_9_5d`, `size_10d`, `size_10_5d`, `size_11d`, `size_11_5d`, `size_12d`, `size_13d`, `size_14d`, `size_15d`, `size_16d`) VALUES
	(1, 2, 17, 'IO24-0152', 'ARIAT', 'EG 555 GUN METAL', '13', '11', '', 'WEQ', '2025-07-24', '2025-07-24', 'MAINSAIL NUBUCK', 'GLOBAL', 'LTR', 20.000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(2, 2, 17, 'IO24-0152', 'ARIAT', 'EG 555 GUN METAL', '13', '11', '', 'WEQ', '2025-07-24', '2025-07-24', 'PIG SKIN', 'SIZERUN', 'FTK', 17.000000, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
	(6, 6, 17, 'IO24-0152', 'ARIAT', 'EG 555 GUN METAL', '213132', '17', '', 'WEQ', '2025-07-07', '2025-07-24', 'PIG SKIN', 'GLOBAL', 'FTK', 30.000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Dumping structure for table web_gudang.form_sjitem_blackstone
CREATE TABLE IF NOT EXISTS `form_sjitem_blackstone` (
  `id_bsj` int NOT NULL AUTO_INCREMENT,
  `id_sj` int NOT NULL DEFAULT '0',
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(125) NOT NULL DEFAULT '0',
  `brand_name` varchar(125) NOT NULL DEFAULT '0',
  `artcolor_name` varchar(125) NOT NULL DEFAULT '0',
  `supplier_name` varchar(125) NOT NULL DEFAULT '0',
  `no_do` varchar(125) DEFAULT NULL,
  `no_sj` varchar(125) DEFAULT NULL,
  `no_plat` varchar(125) DEFAULT NULL,
  `tgl_checkin` date DEFAULT NULL,
  `xfd` date DEFAULT NULL,
  `item_name` varchar(125) DEFAULT NULL,
  `item_type` varchar(125) DEFAULT NULL,
  `unit_name` varchar(125) DEFAULT NULL,
  `qty` decimal(20,6) DEFAULT NULL,
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
  PRIMARY KEY (`id_bsj`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.form_sjitem_blackstone: ~2 rows (approximately)
INSERT INTO `form_sjitem_blackstone` (`id_bsj`, `id_sj`, `id_spk`, `po_number`, `brand_name`, `artcolor_name`, `supplier_name`, `no_do`, `no_sj`, `no_plat`, `tgl_checkin`, `xfd`, `item_name`, `item_type`, `unit_name`, `qty`, `size_36`, `size_37`, `size_38`, `size_39`, `size_40`, `size_41`, `size_42`, `size_43`, `size_44`, `size_45`, `size_46`, `size_47`, `size_48`, `size_49`, `size_50`) VALUES
	(19, 5, 18, 'IO24-0152', 'BLACK STONE', 'EG 555 GUN METAL', '13', '15', '', 'WEQ', '2025-07-25', '2025-07-03', 'PIG SKIN (DIBALIK)', 'GLOBAL', 'LTR', 20.000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(20, 7, 18, 'IO24-0152', 'BLACK STONE', 'EG 555 GUN METAL', 'MJ', '13', '', '132132', '2025-07-25', '2025-07-03', 'PIG SKIN (DIBALIK)', 'SIZERUN', 'LTR', 25.000000, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '11', '1', '1', '1');

-- Dumping structure for table web_gudang.form_sjitem_rossi
CREATE TABLE IF NOT EXISTS `form_sjitem_rossi` (
  `id_bsj` int NOT NULL AUTO_INCREMENT,
  `id_sj` int NOT NULL DEFAULT '0',
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `brand_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `artcolor_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `supplier_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `no_do` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_sj` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `no_plat` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgl_checkin` date DEFAULT NULL,
  `xfd` date DEFAULT NULL,
  `item_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `item_type` varchar(125) DEFAULT NULL,
  `unit_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `qty` decimal(20,6) DEFAULT NULL,
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
  PRIMARY KEY (`id_bsj`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_sjitem_rossi: ~3 rows (approximately)
INSERT INTO `form_sjitem_rossi` (`id_bsj`, `id_sj`, `id_spk`, `po_number`, `brand_name`, `artcolor_name`, `supplier_name`, `no_do`, `no_sj`, `no_plat`, `tgl_checkin`, `xfd`, `item_name`, `item_type`, `unit_name`, `qty`, `size_3`, `size_3t`, `size_4`, `size_4t`, `size_5`, `size_5t`, `size_6`, `size_6t`, `size_7`, `size_7t`, `size_8`, `size_8t`, `size_9`, `size_9t`, `size_10`, `size_10t`, `size_11`, `size_11t`, `size_12`, `size_13`, `size_14`, `size_15`) VALUES
	(4, 4, 16, 'IO25-0140', 'ROSSI', 'CG 104 BLACK COFFEE', '213132', '14', '', '132132', '2025-07-16', '2025-07-23', 'LATEX CAIR 60% @ 180 KG', 'GLOBAL', 'LTR', 10.000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(16, 3, 16, 'IO25-0140', 'ROSSI', 'CG 104 BLACK COFFEE', '13', '13', '', 'WEQ', '2025-07-17', '2025-07-23', 'LATEX CAIR 60% @ 180 KG', 'GLOBAL', 'LTR', 20.000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(17, 3, 16, 'IO25-0140', 'ROSSI', 'CG 104 BLACK COFFEE', '13', '13', '', 'WEQ', '2025-07-17', '2025-07-23', 'STICKER PITOGRAM / GOLD', 'GLOBAL', 'FTK', 30.000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Dumping structure for table web_gudang.form_sj_item
CREATE TABLE IF NOT EXISTS `form_sj_item` (
  `id_sjitem` int NOT NULL,
  `id_spk` int DEFAULT NULL,
  `id_sj` int DEFAULT NULL,
  `no_sj` varchar(125) DEFAULT NULL,
  `no_do` varchar(125) DEFAULT NULL,
  `item_name` varchar(125) DEFAULT NULL,
  `unit_name` varchar(125) DEFAULT NULL,
  `qty` varchar(125) DEFAULT NULL,
  `keterangan` varchar(125) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_sjitem`),
  KEY `id_spk` (`id_spk`),
  KEY `id_sj` (`id_sj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.form_sj_item: ~0 rows (approximately)

-- Dumping structure for table web_gudang.form_spk
CREATE TABLE IF NOT EXISTS `form_spk` (
  `id_spk` int NOT NULL AUTO_INCREMENT,
  `po_number` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `xfd` date NOT NULL,
  `brand_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `artcolor_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `total_qty` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_spk`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_spk: ~15 rows (approximately)
INSERT INTO `form_spk` (`id_spk`, `po_number`, `xfd`, `brand_name`, `artcolor_name`, `total_qty`, `created_at`) VALUES
	(4, 'IO25-0140', '2025-07-16', 'ROSSI', 'CG 104 BLACK COFFEE', '22', NULL),
	(5, 'IO24-0152', '2025-07-17', 'ROSSI', 'CG 104 BLACK COFFEE', '247', NULL),
	(6, 'IO24-0152', '2025-07-17', 'ROSSI', 'EG 555 GUN METAL', '247', NULL),
	(7, 'IO24-0152', '2025-07-17', 'ROSSI', 'EG 555 GUN METAL', '44', NULL),
	(8, 'IO24-0152', '2025-07-18', 'BLACK STONE', 'CG 104 BLACK COFFEE', '250', NULL),
	(9, 'IO24-0152', '2025-07-18', 'BLACK STONE', 'CG 104 BLACK COFFEE', '250', NULL),
	(10, 'IO24-0152', '2025-07-18', 'BLACK STONE', 'CG 104 BLACK COFFEE', '15', NULL),
	(11, 'IO24-0152', '2025-07-18', 'ARIAT', 'EG 555 GUN METAL', '24', NULL),
	(12, 'IO24-0152', '2024-03-29', 'BLACK STONE', 'CG177 BLACK COFFEE', '247', NULL),
	(13, 'IO24-0152', '2025-07-22', 'BLACK STONE', 'CG 104 BLACK COFFEE', '214', NULL),
	(14, 'IO24-0152', '2025-07-23', 'ROSSI', 'EG 555 GUN METAL', '25', '2025-07-21 02:09:19'),
	(15, 'IO25-0140', '2025-07-23', 'BLACK STONE', 'CG 104 BLACK COFFEE', '150', '2025-07-21 07:53:07'),
	(16, 'IO25-0140', '2025-07-23', 'ROSSI', 'CG 104 BLACK COFFEE', '445', '2025-07-22 01:24:23'),
	(17, 'IO24-0152', '2025-07-24', 'ARIAT', 'EG 555 GUN METAL', '101', '2025-07-22 01:24:38'),
	(18, 'IO24-0152', '2025-07-03', 'BLACK STONE', 'EG 555 GUN METAL', '154', '2025-07-22 01:57:45');

-- Dumping structure for table web_gudang.form_spk_checkin
CREATE TABLE IF NOT EXISTS `form_spk_checkin` (
  `id_spkcheckin` int NOT NULL AUTO_INCREMENT,
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `xfd` date NOT NULL,
  `brand_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `artcolor_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_qty` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_spkcheckin`) USING BTREE,
  KEY `id_spk` (`id_spk`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_spk_checkin: ~3 rows (approximately)
INSERT INTO `form_spk_checkin` (`id_spkcheckin`, `id_spk`, `po_number`, `xfd`, `brand_name`, `artcolor_name`, `total_qty`, `created_at`) VALUES
	(14, 15, 'IO25-0140', '2025-07-23', 'BLACK STONE', 'CG 104 BLACK COFFEE', '', '2025-07-21 07:53:07'),
	(15, 16, 'IO25-0140', '2025-07-23', 'ROSSI', 'CG 104 BLACK COFFEE', '445', '2025-07-22 01:24:23'),
	(16, 17, 'IO24-0152', '2025-07-24', 'ARIAT', 'EG 555 GUN METAL', '101', '2025-07-22 01:24:38'),
	(17, 18, 'IO24-0152', '2025-07-03', 'BLACK STONE', 'EG 555 GUN METAL', '154', '2025-07-22 01:57:45');

-- Dumping structure for table web_gudang.form_spk_detail
CREATE TABLE IF NOT EXISTS `form_spk_detail` (
  `id_spkall` int NOT NULL AUTO_INCREMENT,
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(128) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `xfd` varchar(128) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `brand_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `artcolor_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `size_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `qty` varchar(128) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `total_qty` varchar(128) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `item_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `color_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `unit_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `consrate` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `total_consrate` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `inv_cons` decimal(20,6) NOT NULL DEFAULT '0.000000',
  PRIMARY KEY (`id_spkall`),
  KEY `id_spk` (`id_spk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_spk_detail: ~0 rows (approximately)

-- Dumping structure for table web_gudang.form_spk_item
CREATE TABLE IF NOT EXISTS `form_spk_item` (
  `id_spkitem` int NOT NULL AUTO_INCREMENT,
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(128) NOT NULL DEFAULT '0',
  `xfd` date NOT NULL,
  `artcolor_name` varchar(128) NOT NULL DEFAULT '',
  `brand_name` varchar(128) NOT NULL DEFAULT '',
  `part_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '',
  `item_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `color_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mtrl_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `unit_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cons_rate` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `total_consrate` decimal(20,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id_spkitem`),
  KEY `id_spk` (`id_spk`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.form_spk_item: ~17 rows (approximately)
INSERT INTO `form_spk_item` (`id_spkitem`, `id_spk`, `po_number`, `xfd`, `artcolor_name`, `brand_name`, `part_name`, `item_name`, `color_name`, `mtrl_name`, `unit_name`, `cons_rate`, `total_consrate`) VALUES
	(6, 4, 'IO25-0140', '2025-07-16', 'CG 104 BLACK COFFEE', 'ROSSI', 'UPPER 1 (TC+E+COLLAR)', 'MAINSAIL NUBUCK', 'BLACK', '1.6 - 1.8 ', 'FTK', 1.8164, 544.92),
	(7, 12, 'IO24-0152', '2024-03-29', 'CG177 BLACK COFFEE', 'BLACK STONE', 'UPPER 1 (TC+E+COLLAR)', 'MAINSAIL NUBUCK', 'BLACK', '1.6 - 1.8 ', 'FTK', 1.8164, 448.65),
	(8, 11, 'IO24-0152', '2025-07-18', 'EG 555 GUN METAL', 'ARIAT', 'UPPER 1 (TC+E+COLLAR)', 'MAINSAIL NUBUCK', 'BLACK COFFEE', '1.6 - 1.8 ', 'PCE', 2.6100, 62.64),
	(9, 15, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'BLACK STONE', 'UPPER 1 (TC+E+COLLAR)', 'LATEX CAIR 60% @ 180 KG', 'BLACK COFFEE', '1.6 - 1.8 ', 'PCE', 2.6100, 391.50),
	(11, 15, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'BLACK STONE', 'LINING (QT)', 'PIG SKIN', 'GRAPHITE', '0.7 - 0.9', 'FTK', 1.7927, 391.50),
	(16, 15, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'BLACK STONE', 'LINING (BS)', 'PIG SKIN (DIBALIK)', 'GRAPHITE', '0.7 - 0.9', 'FTK', 0.3562, 391.50),
	(17, 15, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'BLACK STONE', 'LINING (BS)', 'PIG SKIN (DIBALIK)', 'BLACK', '0.7 - 0.9', 'FTK', 0.3562, 391.50),
	(18, 15, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'BLACK STONE', 'LINING (BS)', 'PLY MAKER', 'GUN METAL', '0.7 - 0.9', 'LTR', 2.6100, 391.50),
	(19, 15, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'BLACK STONE', 'LINING (BS)', 'STICKER PITOGRAM / GOLD', 'GRAPHITE', '1.6 - 1.8 ', 'LTR', 0.3562, 0.00),
	(20, 15, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'BLACK STONE', 'LINING (BS)', 'LATEX CAIR 60% @ 180 KG', 'GUN METAL', '1.6 - 1.8 ', 'FTK', 2.6100, 391.50),
	(21, 15, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'BLACK STONE', 'LINING (BS)', 'MAINSAIL NUBUCK', 'BLACK COFFEE', '1.6 - 1.8 ', 'PCE', 0.3562, 53.43),
	(22, 15, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'BLACK STONE', 'LINING (BS)', 'PIG SKIN (DIBALIK)', 'GUN METAL', '0.7 - 0.9', 'LTR', 2.6100, 391.50),
	(23, 16, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'ROSSI', 'LINING (BS)', 'LATEX CAIR 60% @ 180 KG', 'GRAPHITE', '0.7 - 0.9', 'LTR', 2.6100, 11.13),
	(24, 16, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'ROSSI', 'UPPER 1 (TC+E+COLLAR)', 'LATEX CAIR 60% @ 180 KG', 'BLACK COFFEE', '0.7 - 0.9', 'LTR', 0.3562, 11.13),
	(25, 17, 'IO24-0152', '2025-07-24', 'EG 555 GUN METAL', 'ARIAT', 'UPPER 1 (TC+E+COLLAR)', 'PIG SKIN (DIBALIK)', 'BLACK COFFEE', '1.6 - 1.8 ', 'PCE', 2.6100, 448.92),
	(26, 17, 'IO24-0152', '2025-07-24', 'EG 555 GUN METAL', 'ARIAT', 'UPPER 1 (TC+E+COLLAR)', 'MAINSAIL NUBUCK', 'GUN METAL', '1.6 - 1.8 ', 'LTR', 2.6100, 448.92),
	(27, 17, 'IO24-0152', '2025-07-24', 'EG 555 GUN METAL', 'ARIAT', 'LINING (BS)', 'PIG SKIN', 'BLACK COFFEE', '0.7 - 0.9', 'FTK', 0.0250, 4.30),
	(28, 18, 'IO24-0152', '2025-07-03', 'EG 555 GUN METAL', 'BLACK STONE', 'LINING (BS)', 'PIG SKIN (DIBALIK)', 'BLACK COFFEE', '1.6 - 1.8 ', 'LTR', 2.6100, 401.94),
	(29, 18, 'IO24-0152', '2025-07-03', 'EG 555 GUN METAL', 'BLACK STONE', 'UPPER 1 (TC+E+COLLAR)', 'STICKER PITOGRAM / GOLD', 'GUN METAL', '0.7 - 0.9', 'PCE', 0.3562, 54.85),
	(30, 18, 'IO24-0152', '2025-07-03', 'EG 555 GUN METAL', 'BLACK STONE', 'UPPER 1 (TC+E+COLLAR)', 'PLY MAKER', 'BLACK COFFEE', '1.6 - 1.8 ', 'LTR', 1.8164, 279.73),
	(31, 16, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'ROSSI', 'UPPER 1 (TC+E+COLLAR)', 'STICKER PITOGRAM / GOLD', 'BLACK COFFEE', '1.6 - 1.8 ', 'FTK', 2.6100, 1161.45),
	(32, 16, 'IO25-0140', '2025-07-23', 'CG 104 BLACK COFFEE', 'ROSSI', 'UPPER 1 (TC+E+COLLAR)', 'LATEX CAIR 60% @ 180 KG', 'BLACK COFFEE', '1.6 - 1.8 ', 'LTR', 0.0250, 11.13);

-- Dumping structure for table web_gudang.form_spk_item_dump
CREATE TABLE IF NOT EXISTS `form_spk_item_dump` (
  `id_spkitem` int NOT NULL AUTO_INCREMENT,
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `xfd` date NOT NULL,
  `artcolor_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `brand_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `item_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `color_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `unit_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `cons_rate` decimal(20,5) NOT NULL DEFAULT '0.00000',
  `total_consrate` decimal(20,5) NOT NULL DEFAULT '0.00000',
  PRIMARY KEY (`id_spkitem`) USING BTREE,
  KEY `id_spk` (`id_spk`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_spk_item_dump: ~0 rows (approximately)

-- Dumping structure for table web_gudang.form_spk_sizerun
CREATE TABLE IF NOT EXISTS `form_spk_sizerun` (
  `id_sizerun` int NOT NULL AUTO_INCREMENT,
  `id_spk` int DEFAULT NULL,
  `po_number` varchar(128) DEFAULT NULL,
  `xfd` date DEFAULT NULL,
  `brand_name` varchar(128) DEFAULT NULL,
  `artcolor_name` varchar(128) DEFAULT NULL,
  `size_name` varchar(128) DEFAULT NULL,
  `qty` varchar(128) DEFAULT NULL,
  `total_qty` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id_sizerun`),
  KEY `id_spk` (`id_spk`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.form_spk_sizerun: ~2 rows (approximately)
INSERT INTO `form_spk_sizerun` (`id_sizerun`, `id_spk`, `po_number`, `xfd`, `brand_name`, `artcolor_name`, `size_name`, `qty`, `total_qty`) VALUES
	(33, 4, 'IO25-0140', '2025-07-16', 'ROSSI', 'CG 104 BLACK COFFEE', '49', '20', '30');

-- Dumping structure for table web_gudang.form_spk_sizerun_dump
CREATE TABLE IF NOT EXISTS `form_spk_sizerun_dump` (
  `id_sizerun` int NOT NULL AUTO_INCREMENT,
  `id_spk` int DEFAULT NULL,
  `po_number` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `xfd` date DEFAULT NULL,
  `brand_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `artcolor_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `qty` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `total_qty` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_sizerun`) USING BTREE,
  KEY `id_spk` (`id_spk`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_spk_sizerun_dump: ~17 rows (approximately)
INSERT INTO `form_spk_sizerun_dump` (`id_sizerun`, `id_spk`, `po_number`, `xfd`, `brand_name`, `artcolor_name`, `size_name`, `qty`, `total_qty`) VALUES
	(17, 5, 'IO24-0152', '2025-07-17', 'ROSSI', 'CG 104 BLACK COFFEE', '49', '20', '20'),
	(18, 5, 'IO24-0152', '2025-07-17', 'ROSSI', 'CG 104 BLACK COFFEE', '49', '20', '20'),
	(19, 4, 'IO25-0140', '2025-07-16', 'ROSSI', 'CG 104 BLACK COFFEE', '49', '20', '65'),
	(20, 4, 'IO25-0140', '2025-07-16', 'ROSSI', 'CG 104 BLACK COFFEE', '50', '15', '20'),
	(21, 4, 'IO25-0140', '2025-07-16', 'ROSSI', 'CG 104 BLACK COFFEE', '51', '30', '65'),
	(22, 7, 'IO24-0152', '2025-07-17', 'ROSSI', 'EG 555 GUN METAL', '50', '20', '50'),
	(23, 7, 'IO24-0152', '2025-07-17', 'ROSSI', 'EG 555 GUN METAL', '49', '30', '40'),
	(24, 7, 'IO24-0152', '2025-07-17', 'ROSSI', 'EG 555 GUN METAL', '50', '10', '10'),
	(25, 7, 'IO24-0152', '2025-07-17', 'ROSSI', 'EG 555 GUN METAL', '50', '10', '40'),
	(26, 7, 'IO24-0152', '2025-07-17', 'ROSSI', 'EG 555 GUN METAL', '49', '30', '40'),
	(27, 4, 'IO25-0140', '2025-07-16', 'ROSSI', 'CG 104 BLACK COFFEE', '49', '20', '20'),
	(28, 4, 'IO25-0140', '2025-07-16', 'ROSSI', 'CG 104 BLACK COFFEE', '49', '20', '50'),
	(29, 4, 'IO25-0140', '2025-07-16', 'ROSSI', 'CG 104 BLACK COFFEE', '50', '30', '50'),
	(30, 4, 'IO25-0140', '2025-07-16', 'ROSSI', 'CG 104 BLACK COFFEE', '49', '20', '20'),
	(31, 4, 'IO25-0140', '2025-07-16', 'ROSSI', 'CG 104 BLACK COFFEE', '49', '20', '30'),
	(32, 4, 'IO25-0140', '2025-07-16', 'ROSSI', 'CG 104 BLACK COFFEE', '50', '10', '30'),
	(34, 4, 'IO25-0140', '2025-07-16', 'ROSSI', 'CG 104 BLACK COFFEE', '50', '10', '30');

-- Dumping structure for table web_gudang.form_total_item
CREATE TABLE IF NOT EXISTS `form_total_item` (
  `id_totalitem` int NOT NULL AUTO_INCREMENT,
  `id_spk` int NOT NULL DEFAULT '0',
  `id_consrate` int NOT NULL DEFAULT '0',
  `total_consrate` decimal(20,5) NOT NULL DEFAULT '0.00000',
  PRIMARY KEY (`id_totalitem`),
  KEY `id_spk` (`id_spk`),
  KEY `id_consrate` (`id_consrate`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.form_total_item: ~0 rows (approximately)
INSERT INTO `form_total_item` (`id_totalitem`, `id_spk`, `id_consrate`, `total_consrate`) VALUES
	(1, 4, 0, 544.92000);

-- Dumping structure for table web_gudang.form_total_sizerun
CREATE TABLE IF NOT EXISTS `form_total_sizerun` (
  `id_totalsize` int NOT NULL AUTO_INCREMENT,
  `id_spk` int NOT NULL DEFAULT '0',
  `total_qty` varchar(128) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_totalsize`),
  KEY `id_spk` (`id_spk`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.form_total_sizerun: ~2 rows (approximately)
INSERT INTO `form_total_sizerun` (`id_totalsize`, `id_spk`, `total_qty`) VALUES
	(4, 5, '0'),
	(5, 4, '20'),
	(6, 7, '0');

-- Dumping structure for table web_gudang.form_transaksi
CREATE TABLE IF NOT EXISTS `form_transaksi` (
  `id_trans` int NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_transaksi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_sj` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `supplier` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `po_number` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `art` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_material` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_material` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_material` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `qty` int NOT NULL,
  `unit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ket` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dept_tujuan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `s36` int DEFAULT '0',
  `s37` int DEFAULT '0',
  `s38` int DEFAULT '0',
  `s39` int DEFAULT '0',
  `s40` int DEFAULT '0',
  `s41` int DEFAULT '0',
  `s42` int DEFAULT '0',
  `s43` int DEFAULT '0',
  `s44` int DEFAULT '0',
  `s45` int DEFAULT '0',
  `s46` int DEFAULT '0',
  `s47` int DEFAULT '0',
  `s48` int DEFAULT '0',
  `s49` int DEFAULT '0',
  `s50` int DEFAULT '0',
  `s3` int DEFAULT '0',
  `s3t` int DEFAULT '0',
  `s4` int DEFAULT '0',
  `s4t` int DEFAULT '0',
  `s5` int DEFAULT '0',
  `s5t` int DEFAULT '0',
  `s6` int DEFAULT '0',
  `s6t` int DEFAULT '0',
  `s7` int DEFAULT '0',
  `s7t` int DEFAULT '0',
  `s8` int DEFAULT '0',
  `s8t` int DEFAULT '0',
  `s9` int DEFAULT '0',
  `s9t` int DEFAULT '0',
  `s10` int DEFAULT '0',
  `s10t` int DEFAULT '0',
  `s11` int DEFAULT '0',
  `s11t` int DEFAULT '0',
  `s12` int DEFAULT '0',
  `s13` int DEFAULT '0',
  `s14` int DEFAULT '0',
  `s15` int DEFAULT '0',
  `s6d` int DEFAULT '0',
  `s6td` int DEFAULT '0',
  `s7d` int DEFAULT '0',
  `s7td` int DEFAULT '0',
  `s8d` int DEFAULT '0',
  `s8td` int DEFAULT '0',
  `s9d` int DEFAULT '0',
  `s9td` int DEFAULT '0',
  `s10d` int DEFAULT '0',
  `s10td` int DEFAULT '0',
  `s11d` int DEFAULT '0',
  `s11td` int DEFAULT '0',
  `s12d` int DEFAULT '0',
  `s13d` int DEFAULT '0',
  `s14d` int DEFAULT '0',
  `s15d` int DEFAULT '0',
  PRIMARY KEY (`id_trans`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_transaksi: ~12 rows (approximately)
INSERT INTO `form_transaksi` (`id_trans`, `brand`, `keterangan`, `id_transaksi`, `no_sj`, `tanggal_masuk`, `tanggal_keluar`, `supplier`, `po_number`, `art`, `jenis_material`, `kode_material`, `nama_material`, `qty`, `unit`, `ket`, `dept_tujuan`, `s36`, `s37`, `s38`, `s39`, `s40`, `s41`, `s42`, `s43`, `s44`, `s45`, `s46`, `s47`, `s48`, `s49`, `s50`, `s3`, `s3t`, `s4`, `s4t`, `s5`, `s5t`, `s6`, `s6t`, `s7`, `s7t`, `s8`, `s8t`, `s9`, `s9t`, `s10`, `s10t`, `s11`, `s11t`, `s12`, `s13`, `s14`, `s15`, `s6d`, `s6td`, `s7d`, `s7td`, `s8d`, `s8td`, `s9d`, `s9td`, `s10d`, `s10td`, `s11d`, `s11td`, `s12d`, `s13d`, `s14d`, `s15d`) VALUES
	(20, 'BLACKSTONE', 'CHECK IN', 'WG-202554302791', 'B1', '2025-07-18', NULL, 'MANGUL JAYA', 'B1', 'B1', 'B1', 'B1', 'B1', 10, 'KGM', '11 JULY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(21, 'BLACKSTONE', 'CHECK IN', 'WG-202534186095', 'B2', '2025-07-18', NULL, 'MANGUL JAYA', 'B2', 'B2', 'B2', 'B2', 'B2', 100, 'FTK', '11 JULY', NULL, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(22, 'ROSSI', 'CHECK IN', 'WG-202517523869', 'R1', '2025-07-18', NULL, 'MANGUL JAYA', 'R1', 'R1', 'R1', 'R1', 'R1', 10, 'FTK', '11 JULY', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(23, 'ROSSI', 'CHECK IN', 'WG-202525048369', 'R2', '2025-07-18', NULL, 'MANGUL JAYA', 'R2', 'R2', 'R2', 'R2', 'R2', 100, 'KGM', '11 JULY', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(26, 'BLACKSTONE', 'CHECK OUT', 'WG-202554302791', 'B1', '2025-07-18', '2025-08-01', 'MANGUL JAYA', 'B1', 'B1', 'B1', 'B1', 'B1', 5, 'KGM', '11 JULY', 'CUTTING', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(27, 'BLACKSTONE', 'CHECK OUT', 'WG-202534186095', 'B2', '2025-07-18', '2025-08-01', 'MANGUL JAYA', 'B2', 'B2', 'B2', 'B2', 'B2', 50, 'FTK', '11 JULY', 'LASTING', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(28, 'ROSSI', 'CHECK OUT', 'WG-202517523869', 'R1', '2025-07-18', '2025-08-02', 'MANGUL JAYA', 'R1', 'R1', 'R1', 'R1', 'R1', 5, 'FTK', '11 JULY', 'SEMI WH', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(29, 'ROSSI', 'CHECK OUT', 'WG-202525048369', 'R2', '2025-07-18', '2025-08-02', 'MANGUL JAYA', 'R2', 'R2', 'R2', 'R2', 'R2', 50, 'KGM', '11 JULY', 'PACKING', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(37, 'ARIAT', 'CHECK IN', 'WG-202575046231', 'A1', '2025-07-18', NULL, 'A1', 'A1', 'A1', 'A1', 'A1', 'A1', 100, 'FTK', '11 JULY', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(38, 'ARIAT', 'CHECK IN', 'WG-202546095238', 'A2', '2025-07-18', NULL, 'A2', 'A2', 'A2', 'A2', 'A2', 'A2', 150, 'KGM', '20 JULY', NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4),
	(39, 'ARIAT', 'CHECK OUT', 'WG-202575046231', 'A1', '2025-07-18', '2025-08-03', 'A1', 'A1', 'A1', 'A1', 'A1', 'A1', 50, 'FTK', '11 JULY', 'SEMI WH', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
	(40, 'ARIAT', 'CHECK OUT', 'WG-202546095238', 'A2', '2025-07-18', '2025-08-03', 'A2', 'A2', 'A2', 'A2', 'A2', 'A2', 50, 'KGM', '20 JULY', 'LASTING', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- Dumping structure for table web_gudang.form_unit
CREATE TABLE IF NOT EXISTS `form_unit` (
  `id_unit` int NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(128) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_unit: ~0 rows (approximately)
INSERT INTO `form_unit` (`id_unit`, `unit_name`) VALUES
	(3, 'LTR');

-- Dumping structure for table web_gudang.tb_ariat_size
CREATE TABLE IF NOT EXISTS `tb_ariat_size` (
  `id_bs` int NOT NULL AUTO_INCREMENT,
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `id_brand` int NOT NULL DEFAULT '0',
  `brand_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `artcolor_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `xfd` date NOT NULL,
  `total_qty` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_6_d` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_6_5_d` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_7_d` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_7_5_d` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_8_d` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_8_5_d` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_9_d` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_9_5_d` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_10_d` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_10_5_d` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_11_d` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_11_5_d` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_12_d` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_13_d` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_14_d` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_15_d` varchar(128) NOT NULL DEFAULT '',
  `size_16_d` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_bs`) USING BTREE,
  KEY `id_spk` (`id_spk`) USING BTREE,
  KEY `id_brand` (`id_brand`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.tb_ariat_size: ~0 rows (approximately)
INSERT INTO `tb_ariat_size` (`id_bs`, `id_spk`, `po_number`, `id_brand`, `brand_name`, `artcolor_name`, `xfd`, `total_qty`, `size_6_d`, `size_6_5_d`, `size_7_d`, `size_7_5_d`, `size_8_d`, `size_8_5_d`, `size_9_d`, `size_9_5_d`, `size_10_d`, `size_10_5_d`, `size_11_d`, `size_11_5_d`, `size_12_d`, `size_13_d`, `size_14_d`, `size_15_d`, `size_16_d`) VALUES
	(1, 11, 'IO24-0152', 0, 'ARIAT', 'EG 555 GUN METAL', '2025-07-18', '24', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2'),
	(2, 17, 'IO24-0152', 0, 'ARIAT', 'EG 555 GUN METAL', '2025-07-24', '101', '1', '2', '3', '5', '8', '9', '20', '21', '5', '12', '3', '6', '2', '1', '1', '1', '1');

-- Dumping structure for table web_gudang.tb_blackstone_size
CREATE TABLE IF NOT EXISTS `tb_blackstone_size` (
  `id_bs` int NOT NULL AUTO_INCREMENT,
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(128) NOT NULL DEFAULT '0',
  `id_brand` int NOT NULL DEFAULT '0',
  `brand_name` varchar(128) NOT NULL DEFAULT '0',
  `artcolor_name` varchar(128) NOT NULL DEFAULT '0',
  `xfd` date NOT NULL,
  `total_qty` varchar(128) NOT NULL DEFAULT '',
  `size_36` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `size_37` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `size_38` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `size_39` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `size_40` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `size_41` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `size_42` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `size_43` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `size_44` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `size_45` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `size_46` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `size_47` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `size_48` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `size_49` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `size_50` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_bs`),
  KEY `id_spk` (`id_spk`),
  KEY `id_brand` (`id_brand`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.tb_blackstone_size: ~5 rows (approximately)
INSERT INTO `tb_blackstone_size` (`id_bs`, `id_spk`, `po_number`, `id_brand`, `brand_name`, `artcolor_name`, `xfd`, `total_qty`, `size_36`, `size_37`, `size_38`, `size_39`, `size_40`, `size_41`, `size_42`, `size_43`, `size_44`, `size_45`, `size_46`, `size_47`, `size_48`, `size_49`, `size_50`) VALUES
	(1, 8, 'IO24-0152', 0, 'BLACK STONE', 'CG 104 BLACK COFFEE', '2025-07-18', '247', '0', '0', '0', '0', '6', '26', '48', '62', '45', '32', '16', '8', '2', '0', '2'),
	(2, 10, 'IO24-0152', 0, 'BLACK STONE', 'CG 104 BLACK COFFEE', '2025-07-18', '15', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
	(3, 12, 'IO24-0152', 0, 'BLACK STONE', 'CG177 BLACK COFFEE', '2024-03-29', '247', '0', '0', '0', '0', '6', '26', '48', '62', '45', '32', '16', '8', '2', '0', '2'),
	(4, 13, 'IO24-0152', 0, 'BLACK STONE', 'CG 104 BLACK COFFEE', '2025-07-22', '214', '0', '0', '0', '0', '10', '12', '23', '25', '10', '25', '21', '22', '22', '22', '22'),
	(5, 15, 'IO25-0140', 0, 'BLACK STONE', 'CG 104 BLACK COFFEE', '2025-07-23', '150', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10'),
	(6, 18, 'IO24-0152', 0, 'BLACK STONE', 'EG 555 GUN METAL', '2025-07-03', '154', '1', '2', '1', '3', '5', '8', '7', '9', '45', '20', '12', '23', '15', '1', '2');

-- Dumping structure for table web_gudang.tb_rossi_size
CREATE TABLE IF NOT EXISTS `tb_rossi_size` (
  `id_bs` int NOT NULL AUTO_INCREMENT,
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `id_brand` int NOT NULL DEFAULT '0',
  `brand_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `artcolor_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `xfd` date NOT NULL,
  `total_qty` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_3` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_3t` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_4` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_4t` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_5` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_5t` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_6` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_6t` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_7` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_7t` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_8` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_8t` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_9` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_9t` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_10` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `size_10t` varchar(128) NOT NULL DEFAULT '',
  `size_11` varchar(128) NOT NULL DEFAULT '',
  `size_11t` varchar(128) NOT NULL DEFAULT '',
  `size_12` varchar(128) NOT NULL DEFAULT '',
  `size_13` varchar(128) NOT NULL DEFAULT '',
  `size_14` varchar(128) NOT NULL DEFAULT '',
  `size_15` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_bs`) USING BTREE,
  KEY `id_spk` (`id_spk`) USING BTREE,
  KEY `id_brand` (`id_brand`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.tb_rossi_size: ~0 rows (approximately)
INSERT INTO `tb_rossi_size` (`id_bs`, `id_spk`, `po_number`, `id_brand`, `brand_name`, `artcolor_name`, `xfd`, `total_qty`, `size_3`, `size_3t`, `size_4`, `size_4t`, `size_5`, `size_5t`, `size_6`, `size_6t`, `size_7`, `size_7t`, `size_8`, `size_8t`, `size_9`, `size_9t`, `size_10`, `size_10t`, `size_11`, `size_11t`, `size_12`, `size_13`, `size_14`, `size_15`) VALUES
	(1, 7, 'IO24-0152', 0, 'ROSSI', 'EG 555 GUN METAL', '2025-07-17', '44', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2'),
	(2, 4, 'IO25-0140', 0, 'ROSSI', 'CG 104 BLACK COFFEE', '2025-07-16', '22', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
	(3, 14, 'IO24-0152', 0, 'ROSSI', 'EG 555 GUN METAL', '2025-07-23', '25', '2', '2', '1', '1', '1', '1', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
	(4, 16, 'IO25-0140', 0, 'ROSSI', 'CG 104 BLACK COFFEE', '2025-07-23', '445', '10', '10', '10', '10', '20', '12', '32', '25', '12', '52', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21');

-- Dumping structure for table web_gudang.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL DEFAULT '0',
  `email` varchar(128) NOT NULL DEFAULT '0',
  `image` varchar(128) NOT NULL DEFAULT '0',
  `password` varchar(256) NOT NULL DEFAULT '0',
  `role_id` int NOT NULL DEFAULT '0',
  `is_active` int NOT NULL DEFAULT '0',
  `date_created` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.users: ~2 rows (approximately)
INSERT INTO `users` (`id_user`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
	(1, 'Syafiq Wisnu', 's.wisnu1106@gmail.com', 'default.jpg', '$2y$10$u5nt.lm9P1rH1wNMicQ4/uLN4G9FG52/4PKaQrkZoa9r259X9Jkdu', 1, 1, 1752225591),
	(2, 'bagas', 'bagas@mail.com', 'default.jpg', '$2y$10$0j1zRpHEh1tsQvgHQ9Y3X.uvhsrlyWbZcUixpsGKifPNYxdFfNcNa', 2, 1, 1752226175),
	(4, 'admin', 'admin@mail.com', 'default.jpg', '$2y$10$pkiqMNERvnwjI2Iwv3gG2eQgjH9X7rFDEz3mjz95.L8WcYVGr5/RS', 2, 1, 1752226340);

-- Dumping structure for table web_gudang.user_access_menu
CREATE TABLE IF NOT EXISTS `user_access_menu` (
  `id_access` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL DEFAULT '0',
  `menu_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_access`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.user_access_menu: ~6 rows (approximately)
INSERT INTO `user_access_menu` (`id_access`, `role_id`, `menu_id`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 2, 2),
	(4, 1, 3),
	(5, 1, 4),
	(6, 2, 4),
	(7, 1, 5);

-- Dumping structure for table web_gudang.user_menu
CREATE TABLE IF NOT EXISTS `user_menu` (
  `id_menu` int NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.user_menu: ~2 rows (approximately)
INSERT INTO `user_menu` (`id_menu`, `menu`) VALUES
	(1, 'Admin'),
	(2, 'User'),
	(3, 'Menu'),
	(4, 'Form'),
	(5, 'Warehouse');

-- Dumping structure for table web_gudang.user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.user_role: ~2 rows (approximately)
INSERT INTO `user_role` (`id_role`, `role`) VALUES
	(1, 'Admin'),
	(2, 'Reguler');

-- Dumping structure for table web_gudang.user_sub_menu
CREATE TABLE IF NOT EXISTS `user_sub_menu` (
  `id_submenu` int NOT NULL AUTO_INCREMENT,
  `menu_id` int DEFAULT NULL,
  `menu_name` varchar(128) DEFAULT NULL,
  `url` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `is_active` int DEFAULT NULL,
  PRIMARY KEY (`id_submenu`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.user_sub_menu: ~16 rows (approximately)
INSERT INTO `user_sub_menu` (`id_submenu`, `menu_id`, `menu_name`, `url`, `icon`, `is_active`) VALUES
	(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
	(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
	(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
	(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
	(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
	(6, 4, 'Menu Brand', 'form', 'fab fa-fw fa-bandcamp', 1),
	(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
	(8, 4, 'Menu Art&Color', 'form/artcolor', 'fab fa-fw fa-artstation', 1),
	(9, 4, 'Menu Unit', 'form/unit', 'fas fa-fw fa-balance-scale', 0),
	(10, 4, 'Menu List Item', 'form/listitem', 'fas fa-fw fa-list-alt', 0),
	(11, 4, 'Menu Consumption', 'form/consumption', 'fas fa-fw fa-weight-hanging', 1),
	(12, 4, 'Menu Size', 'form/size', 'fas fa-fw fa-shoe-prints', 0),
	(13, 4, 'Menu SPK', 'form/spk', 'fas fa-fw fa-file-invoice', 1),
	(14, 5, 'Check IN', 'warehouse/index_checkin', 'fas fa-fw fa-download', 1),
	(15, 5, 'Check OUT', 'warehouse/index_checkout', 'fas fa-fw fa-truck', 1),
	(16, 5, 'Transaksi', 'warehouse/transaksi', 'fas fa-fw fa-clipboard', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
