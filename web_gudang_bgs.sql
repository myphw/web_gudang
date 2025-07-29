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
  `artcolor_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_ac`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_ac: ~2 rows (approximately)
INSERT INTO `form_ac` (`id_ac`, `artcolor_name`) VALUES
	(10, '0101 DARK NAVY'),
	(11, '10016292 BLACK DEERTAN'),
	(12, '1992 TAN');

-- Dumping structure for table web_gudang.form_art
CREATE TABLE IF NOT EXISTS `form_art` (
  `id_art` int NOT NULL AUTO_INCREMENT,
  `art_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_art`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_art: ~2 rows (approximately)
INSERT INTO `form_art` (`id_art`, `art_name`) VALUES
	(9, '0101'),
	(10, '10016292'),
	(11, '1992');

-- Dumping structure for table web_gudang.form_artcolor
CREATE TABLE IF NOT EXISTS `form_artcolor` (
  `id_artcolor` int NOT NULL AUTO_INCREMENT,
  `art_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `color_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `artcolor_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_artcolor`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.form_artcolor: ~8 rows (approximately)
INSERT INTO `form_artcolor` (`id_artcolor`, `art_name`, `color_name`, `artcolor_name`) VALUES
	(34, '0101', NULL, NULL),
	(35, NULL, 'DARK NAVY', NULL),
	(36, NULL, NULL, '0101 DARK NAVY'),
	(37, '10016292', NULL, NULL),
	(38, NULL, 'BLACK DEERTAN', NULL),
	(39, NULL, NULL, '10016292 BLACK DEERTAN'),
	(40, '1992', NULL, NULL),
	(41, NULL, 'TAN', NULL),
	(42, NULL, NULL, '1992 TAN');

-- Dumping structure for table web_gudang.form_brand
CREATE TABLE IF NOT EXISTS `form_brand` (
  `id_brand` int NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(128) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_brand`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.form_brand: ~3 rows (approximately)
INSERT INTO `form_brand` (`id_brand`, `brand_name`) VALUES
	(3, 'ROSSI'),
	(4, 'BLACKSTONE'),
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

-- Dumping data for table web_gudang.form_checkin_ariat: ~0 rows (approximately)

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
  `item_type` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_checkin_item: ~2 rows (approximately)
INSERT INTO `form_checkin_item` (`id_spkitem`, `id_spk`, `po_number`, `xfd`, `artcolor_name`, `brand_name`, `part_name`, `item_name`, `color_name`, `mtrl_name`, `unit_name`, `qty`, `cons_rate`, `total_consrate`) VALUES
	(47, 40, 'IO25 0001', '2025-07-25', '0101 DARK NAVY', 'BLACKSTONE', 'LEATHER MAINSAIOL NUBUCK', 'LEATHER', 'BLACK', '2.2 - 2.4', 'FTK', 0.0000, 2.0000, 30.00),
	(48, 41, '1346', '0222-02-22', '1992 TAN', 'ROSSI', 'CHEMICAL UNIDUR', 'CHEMICAL', '', '', 'KGM', -3.0000, 3.0000, 0.00),
	(49, 42, '4500170327 - 3', '2025-07-25', '10016292 BLACK DEERTAN', 'ARIAT', 'BENANG WOL', 'BENANG', 'WHITE', '1', 'CONE', -4.0000, 12.0000, 204.00);

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

-- Dumping data for table web_gudang.form_checkout_ariat: ~0 rows (approximately)

-- Dumping structure for table web_gudang.form_checkout_blackstone
CREATE TABLE IF NOT EXISTS `form_checkout_blackstone` (
  `id_checkout` int NOT NULL AUTO_INCREMENT,
  `id_spk` int NOT NULL DEFAULT '0',
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
  PRIMARY KEY (`id_checkout`) USING BTREE,
  KEY `id_spk` (`id_spk`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_checkout_blackstone: ~0 rows (approximately)

-- Dumping structure for table web_gudang.form_checkout_item
CREATE TABLE IF NOT EXISTS `form_checkout_item` (
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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_checkout_item: ~2 rows (approximately)
INSERT INTO `form_checkout_item` (`id_spkitem`, `id_spk`, `po_number`, `xfd`, `artcolor_name`, `brand_name`, `part_name`, `item_name`, `color_name`, `mtrl_name`, `unit_name`, `qty`, `cons_rate`, `total_consrate`) VALUES
	(44, 40, 'IO25 0001', '2025-07-25', '0101 DARK NAVY', 'BLACKSTONE', 'LEATHER MAINSAIOL NUBUCK', 'LEATHER', 'BLACK', '2.2 - 2.4', 'FTK', 0.0000, 2.0000, 30.00),
	(45, 41, '1346', '0222-02-22', '1992 TAN', 'ROSSI', 'CHEMICAL UNIDUR', 'CHEMICAL', '', '', 'KGM', 0.0000, 3.0000, 0.00),
	(46, 42, '4500170327 - 3', '2025-07-25', '10016292 BLACK DEERTAN', 'ARIAT', 'BENANG WOL', 'BENANG', 'WHITE', '1', 'CONE', 0.0000, 12.0000, 204.00);

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

-- Dumping data for table web_gudang.form_checkout_rossi: ~0 rows (approximately)

-- Dumping structure for table web_gudang.form_color
CREATE TABLE IF NOT EXISTS `form_color` (
  `id_color` int NOT NULL AUTO_INCREMENT,
  `color_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_color`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_color: ~2 rows (approximately)
INSERT INTO `form_color` (`id_color`, `color_name`) VALUES
	(9, 'DARK NAVY'),
	(10, 'BLACK DEERTAN'),
	(11, 'TAN');

-- Dumping structure for table web_gudang.form_consrate
CREATE TABLE IF NOT EXISTS `form_consrate` (
  `id_consrate` int NOT NULL AUTO_INCREMENT,
  `artcolor_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `color_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `unit_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cons_rate` decimal(10,5) NOT NULL,
  PRIMARY KEY (`id_consrate`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_consrate: ~3 rows (approximately)
INSERT INTO `form_consrate` (`id_consrate`, `artcolor_name`, `item_name`, `color_name`, `unit_name`, `cons_rate`) VALUES
	(7, '0101 DARK NAVY', 'LEATHER', '', 'FTK', 2.00000),
	(9, '1992 TAN', 'CHEMICAL', '', 'KGM', 3.00000),
	(10, '10016292 BLACK DEERTAN', 'BENANG', '', 'CONE', 12.00000);

-- Dumping structure for table web_gudang.form_listitem
CREATE TABLE IF NOT EXISTS `form_listitem` (
  `id_listitem` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `unit_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `item_type` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_listitem`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_listitem: ~2 rows (approximately)
INSERT INTO `form_listitem` (`id_listitem`, `item_name`, `unit_name`, `item_type`) VALUES
	(1, 'LATEX CAIR 60% @ 180 KG', 'LTR', NULL),
	(2, 'STICKER PITOGRAM / GOLD', 'LTR', NULL);

-- Dumping structure for table web_gudang.form_size
CREATE TABLE IF NOT EXISTS `form_size` (
  `id_size` int NOT NULL AUTO_INCREMENT,
  `size_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.form_sj: ~2 rows (approximately)
INSERT INTO `form_sj` (`id_sj`, `id_spk`, `no_do`, `no_sj`, `po_number`, `xfd`, `artcolor_name`, `brand_name`, `total_qty`, `tgl_checkin`, `supplier_name`, `no_plat`, `created_at`) VALUES
	(19, 40, '0101', 'SJ 01', 'IO25 0001', '2025-07-25', '0101 DARK NAVY', 'BLACKSTONE', NULL, '2025-07-25', 'MANGUL JAYA', 'B 0001 KMD', '2025-07-25 07:14:17'),
	(20, 41, '901', '2', '1346', '0222-02-22', '1992 TAN', 'ROSSI', NULL, '0222-02-02', '2', '22', '2025-07-25 07:59:22'),
	(21, 42, '1', '1', '4500170327 - 3', '2025-07-25', '10016292 BLACK DEERTAN', 'ARIAT', NULL, '0001-01-01', '1', '1', '2025-07-25 09:45:19');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_sjitem_ariat: ~0 rows (approximately)

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.form_sjitem_blackstone: ~0 rows (approximately)
INSERT INTO `form_sjitem_blackstone` (`id_bsj`, `id_sj`, `id_spk`, `po_number`, `brand_name`, `artcolor_name`, `supplier_name`, `no_do`, `no_sj`, `no_plat`, `tgl_checkin`, `xfd`, `item_name`, `item_type`, `unit_name`, `qty`, `size_36`, `size_37`, `size_38`, `size_39`, `size_40`, `size_41`, `size_42`, `size_43`, `size_44`, `size_45`, `size_46`, `size_47`, `size_48`, `size_49`, `size_50`) VALUES
	(28, 19, 40, 'IO25 0001', 'BLACKSTONE', '0101 DARK NAVY', 'MANGUL JAYA', '0101', 'SJ 01', 'B 0001 KMD', '2025-07-25', '2025-07-25', 'LEATHER', 'GLOBAL', 'FTK', 40.000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Dumping structure for table web_gudang.form_sjitem_checkout_ariat
CREATE TABLE IF NOT EXISTS `form_sjitem_checkout_ariat` (
  `id_bsj` int NOT NULL AUTO_INCREMENT,
  `id_sj` int NOT NULL DEFAULT '0',
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `brand_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `artcolor_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `no_sj` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `from` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `to_dept` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgl_checkout` date DEFAULT NULL,
  `xfd` date DEFAULT NULL,
  `item_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `item_type` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
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
  PRIMARY KEY (`id_bsj`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_sjitem_checkout_ariat: ~0 rows (approximately)
INSERT INTO `form_sjitem_checkout_ariat` (`id_bsj`, `id_sj`, `id_spk`, `po_number`, `brand_name`, `artcolor_name`, `no_sj`, `from`, `to_dept`, `tgl_checkout`, `xfd`, `item_name`, `item_type`, `unit_name`, `qty`, `size_6d`, `size_6_5d`, `size_7d`, `size_7_5d`, `size_8d`, `size_8_5d`, `size_9d`, `size_9_5d`, `size_10d`, `size_10_5d`, `size_11d`, `size_11_5d`, `size_12d`, `size_13d`, `size_14d`, `size_15d`) VALUES
	(18, 33, 42, '4500170327 - 3', 'ARIAT', '10016292 BLACK DEERTAN', 'WH-AI-0005', 'WAREHOUSE', 'FINISHING', '0022-02-22', '2025-07-25', 'BENANG', 'GLOBAL', 'CONE', 2.000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Dumping structure for table web_gudang.form_sjitem_checkout_blackstone
CREATE TABLE IF NOT EXISTS `form_sjitem_checkout_blackstone` (
  `id_bsj` int NOT NULL AUTO_INCREMENT,
  `id_sj` int NOT NULL DEFAULT '0',
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `brand_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `artcolor_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `no_sj` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `from` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `to_dept` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgl_checkout` date DEFAULT NULL,
  `xfd` date DEFAULT NULL,
  `item_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `item_type` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `unit_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `qty` decimal(20,6) DEFAULT NULL,
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
  PRIMARY KEY (`id_bsj`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_sjitem_checkout_blackstone: ~2 rows (approximately)
INSERT INTO `form_sjitem_checkout_blackstone` (`id_bsj`, `id_sj`, `id_spk`, `po_number`, `brand_name`, `artcolor_name`, `no_sj`, `from`, `to_dept`, `tgl_checkout`, `xfd`, `item_name`, `item_type`, `unit_name`, `qty`, `size_36`, `size_37`, `size_38`, `size_39`, `size_40`, `size_41`, `size_42`, `size_43`, `size_44`, `size_45`, `size_46`, `size_47`, `size_48`, `size_49`, `size_50`) VALUES
	(27, 29, 40, 'IO25 0001', 'BLACKSTONE', '0101 DARK NAVY', 'WH-AI-0001', 'WAREHOUSE', 'CUTTING', '2025-07-26', '2025-07-25', 'LEATHER', 'GLOBAL', 'FTK', 20.000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(28, 30, 40, 'IO25 0001', 'BLACKSTONE', '0101 DARK NAVY', 'WH-AI-0002', 'WAREHOUSE', 'CUTTING', '2025-07-28', '2025-07-25', 'LEATHER', 'GLOBAL', 'FTK', 20.000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Dumping structure for table web_gudang.form_sjitem_checkout_rossi
CREATE TABLE IF NOT EXISTS `form_sjitem_checkout_rossi` (
  `id_bsj` int NOT NULL AUTO_INCREMENT,
  `id_sj` int NOT NULL DEFAULT '0',
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `brand_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `artcolor_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `no_sj` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `from` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `to_dept` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgl_checkout` date DEFAULT NULL,
  `xfd` date DEFAULT NULL,
  `item_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `item_type` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_sjitem_checkout_rossi: ~2 rows (approximately)
INSERT INTO `form_sjitem_checkout_rossi` (`id_bsj`, `id_sj`, `id_spk`, `po_number`, `brand_name`, `artcolor_name`, `no_sj`, `from`, `to_dept`, `tgl_checkout`, `xfd`, `item_name`, `item_type`, `unit_name`, `qty`, `size_3`, `size_3t`, `size_4`, `size_4t`, `size_5`, `size_5t`, `size_6`, `size_6t`, `size_7`, `size_7t`, `size_8`, `size_8t`, `size_9`, `size_9t`, `size_10`, `size_10t`, `size_11`, `size_11t`, `size_12`, `size_13`, `size_14`, `size_15`) VALUES
	(18, 31, 41, '1346', 'ROSSI', '1992 TAN', 'WH-AI-0003', 'WAREHOUSE', 'LASTING', '2025-07-25', '0222-02-22', 'CHEMICAL', 'GLOBAL', 'KGM', 1.000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(19, 32, 41, '1346', 'ROSSI', '1992 TAN', 'WH-AI-0004', 'WAREHOUSE', 'PACKING', '0111-11-11', '0222-02-22', 'CHEMICAL', 'GLOBAL', 'KGM', 1.000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(20, 33, 42, '4500170327 - 3', 'ARIAT', '10016292 BLACK DEERTAN', 'WH-AI-0005', 'WAREHOUSE', 'FINISHING', '0022-02-22', '2025-07-25', 'BENANG', 'GLOBAL', 'CONE', 2.000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(21, 35, 41, '1346', 'ROSSI', '1992 TAN', 'WH-AI-0007', 'WAREHOUSE', 'SEMI WH', '2025-07-27', '0222-02-22', 'CHEMICAL', 'GLOBAL', 'KGM', 1.000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_sjitem_rossi: ~0 rows (approximately)

-- Dumping structure for table web_gudang.form_sj_checkout
CREATE TABLE IF NOT EXISTS `form_sj_checkout` (
  `id_sj` int NOT NULL AUTO_INCREMENT,
  `id_spk` int DEFAULT NULL,
  `no_sj` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `po_number` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `xfd` date DEFAULT NULL,
  `artcolor_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `brand_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `total_qty` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tgl_checkout` date DEFAULT NULL,
  `from` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `to_dept` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_sj`) USING BTREE,
  KEY `id_spk` (`id_spk`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_sj_checkout: ~4 rows (approximately)
INSERT INTO `form_sj_checkout` (`id_sj`, `id_spk`, `no_sj`, `po_number`, `xfd`, `artcolor_name`, `brand_name`, `total_qty`, `tgl_checkout`, `from`, `to_dept`, `created_at`) VALUES
	(29, 40, 'WH-AI-0001', 'IO25 0001', '2025-07-25', '0101 DARK NAVY', 'BLACKSTONE', NULL, '2025-07-26', 'WAREHOUSE', 'CUTTING', '2025-07-25 07:17:17'),
	(30, 40, 'WH-AI-0002', 'IO25 0001', '2025-07-25', '0101 DARK NAVY', 'BLACKSTONE', NULL, '2025-07-28', 'WAREHOUSE', 'CUTTING', '2025-07-25 07:18:04'),
	(31, 41, 'WH-AI-0003', '1346', '0222-02-22', '1992 TAN', 'ROSSI', NULL, '2025-07-25', 'WAREHOUSE', 'LASTING', '2025-07-25 07:57:35'),
	(32, 41, 'WH-AI-0004', '1346', '0222-02-22', '1992 TAN', 'ROSSI', NULL, '0111-11-11', 'WAREHOUSE', 'PACKING', '2025-07-25 08:56:06'),
	(33, 42, 'WH-AI-0005', '4500170327 - 3', '2025-07-25', '10016292 BLACK DEERTAN', 'ARIAT', NULL, '0022-02-22', 'WAREHOUSE', 'FINISHING', '2025-07-25 09:21:00'),
	(34, 42, 'WH-AI-0006', '4500170327 - 3', '2025-07-25', '10016292 BLACK DEERTAN', 'ARIAT', NULL, '0222-02-22', 'WAREHOUSE', 'PACKING', '2025-07-28 01:49:45'),
	(35, 41, 'WH-AI-0007', '1346', '0222-02-22', '1992 TAN', 'ROSSI', NULL, '2025-07-27', 'WAREHOUSE', 'SEMI WH', '2025-07-28 01:52:18');

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
  `po_number` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `xfd` date NOT NULL,
  `brand_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `artcolor_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_qty` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_spk`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_spk: ~2 rows (approximately)
INSERT INTO `form_spk` (`id_spk`, `po_number`, `xfd`, `brand_name`, `artcolor_name`, `total_qty`, `created_at`) VALUES
	(40, 'IO25 0001', '2025-07-25', 'BLACKSTONE', '0101 DARK NAVY', '15', '2025-07-25 07:12:15'),
	(41, '1346', '0222-02-22', 'ROSSI', '1992 TAN', '22', '2025-07-25 07:56:32'),
	(42, '4500170327 - 3', '2025-07-25', 'ARIAT', '10016292 BLACK DEERTAN', '17', '2025-07-25 09:15:08');

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_spk_checkin: ~2 rows (approximately)
INSERT INTO `form_spk_checkin` (`id_spkcheckin`, `id_spk`, `po_number`, `xfd`, `brand_name`, `artcolor_name`, `total_qty`, `created_at`) VALUES
	(39, 40, 'IO25 0001', '2025-07-25', 'BLACKSTONE', '0101 DARK NAVY', '15', '2025-07-25 07:12:15'),
	(40, 41, '1346', '0222-02-22', 'ROSSI', '1992 TAN', '22', '2025-07-25 07:56:32'),
	(41, 42, '4500170327 - 3', '2025-07-25', 'ARIAT', '10016292 BLACK DEERTAN', '17', '2025-07-25 09:15:08');

-- Dumping structure for table web_gudang.form_spk_checkout
CREATE TABLE IF NOT EXISTS `form_spk_checkout` (
  `id_spkcheckout` int NOT NULL AUTO_INCREMENT,
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `xfd` date NOT NULL,
  `brand_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `artcolor_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_qty` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_spkcheckout`) USING BTREE,
  KEY `id_spk` (`id_spk`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_spk_checkout: ~2 rows (approximately)
INSERT INTO `form_spk_checkout` (`id_spkcheckout`, `id_spk`, `po_number`, `xfd`, `brand_name`, `artcolor_name`, `total_qty`, `created_at`) VALUES
	(35, 40, 'IO25 0001', '2025-07-25', 'BLACKSTONE', '0101 DARK NAVY', '15', '2025-07-25 07:12:15'),
	(36, 41, '1346', '0222-02-22', 'ROSSI', '1992 TAN', '22', '2025-07-25 07:56:32'),
	(37, 42, '4500170327 - 3', '2025-07-25', 'ARIAT', '10016292 BLACK DEERTAN', '17', '2025-07-25 09:15:08');

-- Dumping structure for table web_gudang.form_spk_detail
CREATE TABLE IF NOT EXISTS `form_spk_detail` (
  `id_spkall` int NOT NULL AUTO_INCREMENT,
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `xfd` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `brand_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `artcolor_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `size_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `qty` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `total_qty` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `item_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `color_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `unit_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.form_spk_item: ~2 rows (approximately)
INSERT INTO `form_spk_item` (`id_spkitem`, `id_spk`, `po_number`, `xfd`, `artcolor_name`, `brand_name`, `part_name`, `item_name`, `color_name`, `mtrl_name`, `unit_name`, `cons_rate`, `total_consrate`) VALUES
	(49, 40, 'IO25 0001', '2025-07-25', '0101 DARK NAVY', 'BLACKSTONE', 'LEATHER MAINSAIOL NUBUCK', 'LEATHER', 'BLACK', '2.2 - 2.4', 'FTK', 2.0000, 30.00),
	(50, 41, '1346', '0222-02-22', '1992 TAN', 'ROSSI', 'CHEMICAL UNIDUR', 'CHEMICAL', '', '', 'KGM', 3.0000, 0.00),
	(51, 42, '4500170327 - 3', '2025-07-25', '10016292 BLACK DEERTAN', 'ARIAT', 'BENANG WOL', 'BENANG', 'WHITE', '1', 'CONE', 12.0000, 204.00);

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

-- Dumping data for table web_gudang.form_spk_sizerun: ~0 rows (approximately)

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

-- Dumping data for table web_gudang.form_spk_sizerun_dump: ~0 rows (approximately)

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

-- Dumping structure for table web_gudang.form_total_sizerun
CREATE TABLE IF NOT EXISTS `form_total_sizerun` (
  `id_totalsize` int NOT NULL AUTO_INCREMENT,
  `id_spk` int NOT NULL DEFAULT '0',
  `total_qty` varchar(128) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_totalsize`),
  KEY `id_spk` (`id_spk`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.form_total_sizerun: ~1 rows (approximately)

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
  `unit_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.tb_ariat_size: ~0 rows (approximately)
INSERT INTO `tb_ariat_size` (`id_bs`, `id_spk`, `po_number`, `id_brand`, `brand_name`, `artcolor_name`, `xfd`, `total_qty`, `size_6_d`, `size_6_5_d`, `size_7_d`, `size_7_5_d`, `size_8_d`, `size_8_5_d`, `size_9_d`, `size_9_5_d`, `size_10_d`, `size_10_5_d`, `size_11_d`, `size_11_5_d`, `size_12_d`, `size_13_d`, `size_14_d`, `size_15_d`, `size_16_d`) VALUES
	(4, 42, '4500170327 - 3', 0, 'ARIAT', '10016292 BLACK DEERTAN', '2025-07-25', '17', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.tb_blackstone_size: ~0 rows (approximately)
INSERT INTO `tb_blackstone_size` (`id_bs`, `id_spk`, `po_number`, `id_brand`, `brand_name`, `artcolor_name`, `xfd`, `total_qty`, `size_36`, `size_37`, `size_38`, `size_39`, `size_40`, `size_41`, `size_42`, `size_43`, `size_44`, `size_45`, `size_46`, `size_47`, `size_48`, `size_49`, `size_50`) VALUES
	(17, 40, 'IO25 0001', 0, 'BLACKSTONE', '0101 DARK NAVY', '2025-07-25', '15', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.tb_rossi_size: ~0 rows (approximately)
INSERT INTO `tb_rossi_size` (`id_bs`, `id_spk`, `po_number`, `id_brand`, `brand_name`, `artcolor_name`, `xfd`, `total_qty`, `size_3`, `size_3t`, `size_4`, `size_4t`, `size_5`, `size_5t`, `size_6`, `size_6t`, `size_7`, `size_7t`, `size_8`, `size_8t`, `size_9`, `size_9t`, `size_10`, `size_10t`, `size_11`, `size_11t`, `size_12`, `size_13`, `size_14`, `size_15`) VALUES
	(9, 41, '1346', 0, 'ROSSI', '1992 TAN', '0222-02-22', '22', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');

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

-- Dumping data for table web_gudang.users: ~3 rows (approximately)
INSERT INTO `users` (`id_user`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
	(1, 'Syafiq Wisnu', 's.wisnu1106@gmail.com', 'default.jpg', '$2y$10$u5nt.lm9P1rH1wNMicQ4/uLN4G9FG52/4PKaQrkZoa9r259X9Jkdu', 1, 1, 1752225591),
	(2, 'bagas', 'bagas@mail.com', 'default.jpg', '$2y$10$0j1zRpHEh1tsQvgHQ9Y3X.uvhsrlyWbZcUixpsGKifPNYxdFfNcNa', 2, 1, 1752226175),
	(4, 'admin', 'admin@mail.com', 'default.jpg', '$2y$10$pkiqMNERvnwjI2Iwv3gG2eQgjH9X7rFDEz3mjz95.L8WcYVGr5/RS', 1, 1, 1752226340);

-- Dumping structure for table web_gudang.user_access_menu
CREATE TABLE IF NOT EXISTS `user_access_menu` (
  `id_access` int NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL DEFAULT '0',
  `menu_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_access`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.user_access_menu: ~7 rows (approximately)
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

-- Dumping data for table web_gudang.user_menu: ~5 rows (approximately)
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
web_gudang