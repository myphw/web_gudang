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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_ac: ~0 rows (approximately)
INSERT INTO `form_ac` (`id_ac`, `artcolor_name`) VALUES
	(10, 'EG 555 GUN METAL');

-- Dumping structure for table web_gudang.form_art
CREATE TABLE IF NOT EXISTS `form_art` (
  `id_art` int NOT NULL AUTO_INCREMENT,
  `art_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_art`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_art: ~0 rows (approximately)
INSERT INTO `form_art` (`id_art`, `art_name`) VALUES
	(10, 'EG 555');

-- Dumping structure for table web_gudang.form_artcolor
CREATE TABLE IF NOT EXISTS `form_artcolor` (
  `id_artcolor` int NOT NULL AUTO_INCREMENT,
  `art_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `color_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `artcolor_name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_artcolor`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.form_artcolor: ~12 rows (approximately)
INSERT INTO `form_artcolor` (`id_artcolor`, `art_name`, `color_name`, `artcolor_name`) VALUES
	(22, '0001', NULL, NULL),
	(23, '42312311 - 2', NULL, NULL),
	(24, '1987', NULL, NULL),
	(25, NULL, 'OLD YELLOW', NULL),
	(26, NULL, 'BLUE EARTH', NULL),
	(27, NULL, 'TAN', NULL),
	(28, NULL, NULL, '0001 OLD YELLOW'),
	(29, NULL, NULL, '42312311 - 2 BLUE EARTH'),
	(30, NULL, NULL, '1987 TAN'),
	(31, '11', NULL, NULL),
	(32, NULL, '11', NULL),
	(33, NULL, NULL, '11 11'),
	(34, 'GUN METAL', NULL, NULL),
	(35, 'EG 555', NULL, NULL),
	(36, NULL, 'GUN METAL', NULL),
	(37, NULL, NULL, 'EG 555 GUN METAL');

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
  `checkin_qty` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `checkout_qty` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `checkin_balance` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `checkout_balance` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `qty` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `cons_rate` decimal(20,4) NOT NULL DEFAULT '0.0000',
  `total_consrate` decimal(20,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id_spkitem`) USING BTREE,
  KEY `id_spk` (`id_spk`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_checkin_item: ~0 rows (approximately)

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
  PRIMARY KEY (`id_checkout`) USING BTREE,
  KEY `id_spk` (`id_spk`)
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
  KEY `id_spk` (`id_spk`) USING BTREE
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

-- Dumping data for table web_gudang.form_checkout_item: ~0 rows (approximately)

-- Dumping structure for table web_gudang.form_checkout_rossi
CREATE TABLE IF NOT EXISTS `form_checkout_rossi` (
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
  PRIMARY KEY (`id_checkout`) USING BTREE,
  KEY `id_spk` (`id_spk`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_checkout_rossi: ~0 rows (approximately)

-- Dumping structure for table web_gudang.form_color
CREATE TABLE IF NOT EXISTS `form_color` (
  `id_color` int NOT NULL AUTO_INCREMENT,
  `color_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_color`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_color: ~0 rows (approximately)
INSERT INTO `form_color` (`id_color`, `color_name`) VALUES
	(9, 'GUN METAL');

-- Dumping structure for table web_gudang.form_consrate
CREATE TABLE IF NOT EXISTS `form_consrate` (
  `id_consrate` int NOT NULL AUTO_INCREMENT,
  `artcolor_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `item_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `color_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `unit_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cons_rate` decimal(10,5) NOT NULL,
  PRIMARY KEY (`id_consrate`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_consrate: ~0 rows (approximately)

-- Dumping structure for table web_gudang.form_listitem
CREATE TABLE IF NOT EXISTS `form_listitem` (
  `id_listitem` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `unit_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `item_type` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_listitem`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_listitem: ~0 rows (approximately)
INSERT INTO `form_listitem` (`id_listitem`, `item_name`, `unit_name`, `item_type`) VALUES
	(18, 'MICROGRADE GREEN STICKER', 'PCE', NULL),
	(19, 'UNIDUR 1001', 'TIN', NULL),
	(20, 'BONDING AGENT 5100 AU', 'KGM', NULL);

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

-- Dumping data for table web_gudang.form_sj: ~0 rows (approximately)

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
  `created_at` datetime DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

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
  `created_at` datetime DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.form_sjitem_blackstone: ~0 rows (approximately)

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
  `size_16d` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`id_bsj`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_sjitem_checkout_ariat: ~0 rows (approximately)

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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_sjitem_checkout_blackstone: ~0 rows (approximately)

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
  `size_10t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_11` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_11t` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_12` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_13` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_14` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `size_15` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_bsj`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_sjitem_checkout_rossi: ~0 rows (approximately)

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
  `created_at` datetime DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_sj_checkout: ~0 rows (approximately)

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_spk: ~0 rows (approximately)

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_spk_checkin: ~0 rows (approximately)

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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.form_spk_checkout: ~0 rows (approximately)

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.form_spk_item: ~0 rows (approximately)

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

-- Dumping structure for table web_gudang.form_total_sizerun
CREATE TABLE IF NOT EXISTS `form_total_sizerun` (
  `id_totalsize` int NOT NULL AUTO_INCREMENT,
  `id_spk` int NOT NULL DEFAULT '0',
  `total_qty` varchar(128) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_totalsize`),
  KEY `id_spk` (`id_spk`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.form_total_sizerun: ~3 rows (approximately)
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
  `unit_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table web_gudang.form_unit: ~7 rows (approximately)
INSERT INTO `form_unit` (`id_unit`, `unit_name`) VALUES
	(3, 'LTR'),
	(4, 'PCE'),
	(5, 'FTK'),
	(6, 'MTR'),
	(7, 'SHT'),
	(8, 'NPR'),
	(9, 'SET'),
	(10, 'TIN'),
	(11, 'KGM');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.tb_ariat_size: ~0 rows (approximately)

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.tb_blackstone_size: ~0 rows (approximately)

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.tb_rossi_size: ~0 rows (approximately)

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.users: ~4 rows (approximately)
INSERT INTO `users` (`id_user`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
	(1, 'Syafiq Wisnu', 's.wisnu1106@gmail.com', 'default.jpg', '$2y$10$u5nt.lm9P1rH1wNMicQ4/uLN4G9FG52/4PKaQrkZoa9r259X9Jkdu', 1, 1, 1752225591),
	(2, 'bagas', 'bagas@mail.com', 'default.jpg', '$2y$10$0j1zRpHEh1tsQvgHQ9Y3X.uvhsrlyWbZcUixpsGKifPNYxdFfNcNa', 2, 1, 1752226175),
	(4, 'admin', 'admin@mail.com', 'default.jpg', '$2y$10$pkiqMNERvnwjI2Iwv3gG2eQgjH9X7rFDEz3mjz95.L8WcYVGr5/RS', 1, 1, 1752226340),
	(5, 'Nathan Tannady', 'tannady.nathan@gmail.com', 'default.jpg', '$2y$10$9mu9j/Rd1iChUhZKLkL/B.vf4oUIVAu1ETH3F122/InFK6bY8Uw.2', 1, 1, 1753771235);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table web_gudang.user_role: ~4 rows (approximately)
INSERT INTO `user_role` (`id_role`, `role`) VALUES
	(1, 'Admin'),
	(2, 'Reguler'),
	(3, 'Admin SPK'),
	(4, 'Admin Warehouse');

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
	(6, 4, 'Brand', 'form', 'fab fa-fw fa-bandcamp', 1),
	(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
	(8, 4, 'Art & Color', 'form/artcolor', 'fab fa-fw fa-artstation', 1),
	(9, 4, 'Unit', 'form/unit', 'fas fa-fw fa-balance-scale', 1),
	(10, 4, 'List Item', 'form/listitem', 'fas fa-fw fa-list-alt', 1),
	(11, 4, 'Material Consumption', 'form/consumption', 'fas fa-fw fa-weight-hanging', 1),
	(12, 4, 'Menu Size', 'form/size', 'fas fa-fw fa-shoe-prints', 0),
	(13, 4, 'PO SPK', 'form/spk', 'fas fa-fw fa-file-invoice', 1),
	(14, 5, 'Check IN', 'warehouse/index_checkin', 'fas fa-fw fa-download', 1),
	(15, 5, 'Check OUT', 'warehouse/index_checkout', 'fas fa-fw fa-truck', 1),
	(16, 5, 'Transaksi', 'warehouse/transaksii', 'fas fa-fw fa-clipboard', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
