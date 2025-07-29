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

-- Dumping data for table web_gudang.form_ac: ~4 rows (approximately)
INSERT INTO `form_ac` (`id_ac`, `artcolor_name`) VALUES
	(1, 'CG 104 BLACK COFFEE'),
	(2, 'EG 555 GUN METAL'),
	(3, 'CG177 BLACK'),
	(4, 'CG177 BLACK COFFEE');

-- Dumping data for table web_gudang.form_art: ~3 rows (approximately)
INSERT INTO `form_art` (`id_art`, `art_name`) VALUES
	(1, 'CG 104'),
	(2, 'EG 555'),
	(3, 'CG177');

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

-- Dumping data for table web_gudang.form_brand: ~3 rows (approximately)
INSERT INTO `form_brand` (`id_brand`, `brand_name`) VALUES
	(3, 'ROSSI'),
	(4, 'BLACK STONE'),
	(5, 'ARIAT');

-- Dumping data for table web_gudang.form_checkin_ariat: ~0 rows (approximately)

-- Dumping data for table web_gudang.form_checkin_blackstone: ~0 rows (approximately)

-- Dumping data for table web_gudang.form_checkin_item: ~3 rows (approximately)
INSERT INTO `form_checkin_item` (`id_spkitem`, `id_spk`, `po_number`, `xfd`, `artcolor_name`, `brand_name`, `part_name`, `item_name`, `color_name`, `mtrl_name`, `unit_name`, `checkin_qty`, `checkout_qty`, `checkin_balance`, `checkout_balance`, `qty`, `cons_rate`, `total_consrate`) VALUES
	(38, 21, 'IO24-0152', '2025-07-28', 'CG177 BLACK COFFEE', 'BLACK STONE', 'UPPER 1 (TC+E+COLLAR)', 'LATEX CAIR 60% @ 180 KG', 'BLACK COFFEE', '1.2 - 1.4', 'LTR', 150.0000, 50.0000, -259.0000, -359.0000, 100.0000, 2.6100, 409.77),
	(39, 21, 'IO24-0152', '2025-07-28', 'CG177 BLACK COFFEE', 'BLACK STONE', 'LINING (BS)', 'PLY MAKER', 'GRAPHITE', '1.6 - 1.8 ', 'FTK', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.3562, 55.92),
	(40, 21, 'IO24-0152', '2025-07-28', 'CG177 BLACK COFFEE', 'BLACK STONE', 'UPPER 2 (V+QTR+T+BT)', 'STICKER PITOGRAM / GOLD', 'GUN METAL', '0.7 - 0.9', 'PCE', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 2.6100, 409.77);

-- Dumping data for table web_gudang.form_checkin_rossi: ~0 rows (approximately)

-- Dumping data for table web_gudang.form_checkout_ariat: ~0 rows (approximately)

-- Dumping data for table web_gudang.form_checkout_blackstone: ~0 rows (approximately)

-- Dumping data for table web_gudang.form_checkout_item: ~0 rows (approximately)

-- Dumping data for table web_gudang.form_checkout_rossi: ~0 rows (approximately)

-- Dumping data for table web_gudang.form_color: ~3 rows (approximately)
INSERT INTO `form_color` (`id_color`, `color_name`) VALUES
	(1, 'BLACK COFFEE'),
	(2, 'GUN METAL'),
	(3, 'BLACK');

-- Dumping data for table web_gudang.form_consrate: ~11 rows (approximately)
INSERT INTO `form_consrate` (`id_consrate`, `artcolor_name`, `item_name`, `color_name`, `unit_name`, `cons_rate`) VALUES
	(6, 'CG 104 BLACK COFFEE', 'LATEX CAIR 60% @ 180 KG', '', 'LTR', 2.61000),
	(7, 'CG 104 BLACK COFFEE', 'STICKER PITOGRAM / GOLD', '', 'PCE', 1.81640),
	(8, 'EG 555 GUN METAL', 'LATEX CAIR 60% @ 180 KG', '', 'LTR', 1.60000),
	(9, 'EG 555 GUN METAL', 'STICKER PITOGRAM / GOLD', '', 'PCE', 2.61000),
	(10, 'CG 104 BLACK COFFEE', 'PLY MAKER', '', 'FTK', 0.35620),
	(11, 'CG177 BLACK COFFEE', 'MAINSAIL NUBUCK', '', 'FTK', 1.81640),
	(12, 'CG177 BLACK COFFEE', 'SUPER SUEDE', '', 'FTK', 1.24660),
	(13, 'CG177 BLACK COFFEE', 'PIG SKIN G', '', 'FTK', 1.79270),
	(14, 'CG177 BLACK COFFEE', 'PIG SKIN (DIBALIK)', '', 'FTK', 0.35620),
	(15, 'CG177 BLACK COFFEE', 'PIG SKIN T', '', 'FTK', 0.80000),
	(16, 'CG177 BLACK COFFEE', 'FOAM DENSITY 18 THICK 4MM', '', 'SHT', 0.07740);

-- Dumping data for table web_gudang.form_listitem: ~10 rows (approximately)
INSERT INTO `form_listitem` (`id_listitem`, `item_name`, `unit_name`, `item_type`) VALUES
	(1, 'LATEX CAIR 60% @ 180 KG', 'LTR', NULL),
	(3, 'STICKER PITOGRAM / GOLD', 'PCE', NULL),
	(4, 'PLY MAKER', 'FTK', NULL),
	(5, 'MAINSAIL NUBUCK', 'FTK', NULL),
	(6, 'SUPER SUEDE', 'FTK', NULL),
	(7, 'PIG SKIN G', 'FTK', NULL),
	(8, 'PIG SKIN (DIBALIK)', 'FTK', NULL),
	(9, 'PIG SKIN T', 'FTK', NULL),
	(10, 'FOAM DENSITY 18 THICK 4MM', 'SHT', NULL),
	(11, 'EMBOSS SIZE', 'NPR', NULL);

-- Dumping data for table web_gudang.form_size: ~3 rows (approximately)
INSERT INTO `form_size` (`id_size`, `size_name`) VALUES
	(2, '49'),
	(3, '50'),
	(4, '51');

-- Dumping data for table web_gudang.form_sj: ~1 rows (approximately)
INSERT INTO `form_sj` (`id_sj`, `id_spk`, `no_do`, `no_sj`, `po_number`, `xfd`, `artcolor_name`, `brand_name`, `total_qty`, `tgl_checkin`, `supplier_name`, `no_plat`, `created_at`) VALUES
	(11, 21, 'WH-AI-0002', '12313', 'IO24-0152', '2025-07-28', 'CG177 BLACK COFFEE', 'BLACK STONE', NULL, '2025-07-21', 'DEADAS', 'DWDADW', '2025-07-28 04:45:43'),
	(12, 21, 'WH-AI-0002', '12313', 'IO24-0152', '2025-07-28', 'CG177 BLACK COFFEE', 'BLACK STONE', NULL, '2025-07-08', 'DEADAS', 'DWDADW', '2025-07-28 07:24:23'),
	(13, 21, 'WH-AI-0002', '12313', 'IO24-0152', '2025-07-28', 'CG177 BLACK COFFEE', 'BLACK STONE', NULL, '2025-07-08', 'DEADAS', 'DWDADW', '2025-07-28 07:34:55');

-- Dumping data for table web_gudang.form_sjitem_ariat: ~0 rows (approximately)

-- Dumping data for table web_gudang.form_sjitem_blackstone: ~1 rows (approximately)
INSERT INTO `form_sjitem_blackstone` (`id_bsj`, `id_sj`, `id_spk`, `po_number`, `brand_name`, `artcolor_name`, `supplier_name`, `no_do`, `no_sj`, `no_plat`, `tgl_checkin`, `xfd`, `item_name`, `item_type`, `unit_name`, `created_at`, `qty`, `size_36`, `size_37`, `size_38`, `size_39`, `size_40`, `size_41`, `size_42`, `size_43`, `size_44`, `size_45`, `size_46`, `size_47`, `size_48`, `size_49`, `size_50`) VALUES
	(35, 11, 21, 'IO24-0152', 'BLACK STONE', 'CG177 BLACK COFFEE', 'DEADAS', 'WH-AI-0002', '12313', 'DWDADW', '2025-07-21', '2025-07-28', 'LATEX CAIR 60% @ 180 KG', 'GLOBAL', 'LTR', '2025-07-28 07:33:40', 50.000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(36, 12, 21, 'IO24-0152', 'BLACK STONE', 'CG177 BLACK COFFEE', 'DEADAS', 'WH-AI-0002', '12313', 'DWDADW', '2025-07-08', '2025-07-28', 'LATEX CAIR 60% @ 180 KG', 'GLOBAL', 'LTR', '2025-07-28 07:34:09', 50.000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(37, 13, 21, 'IO24-0152', 'BLACK STONE', 'CG177 BLACK COFFEE', 'DEADAS', 'WH-AI-0002', '12313', 'DWDADW', '2025-07-08', '2025-07-28', 'LATEX CAIR 60% @ 180 KG', 'GLOBAL', 'LTR', '2025-07-28 07:35:03', 50.000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Dumping data for table web_gudang.form_sjitem_checkout_ariat: ~0 rows (approximately)

-- Dumping data for table web_gudang.form_sjitem_checkout_blackstone: ~1 rows (approximately)
INSERT INTO `form_sjitem_checkout_blackstone` (`id_bsj`, `id_sj`, `id_spk`, `po_number`, `brand_name`, `artcolor_name`, `no_sj`, `from`, `to_dept`, `tgl_checkout`, `xfd`, `item_name`, `item_type`, `unit_name`, `qty`, `size_36`, `size_37`, `size_38`, `size_39`, `size_40`, `size_41`, `size_42`, `size_43`, `size_44`, `size_45`, `size_46`, `size_47`, `size_48`, `size_49`, `size_50`) VALUES
	(33, 36, 21, 'IO24-0152', 'BLACK STONE', 'CG177 BLACK COFFEE', 'WH-AI-0001', 'WAREHOUSE', 'CUTTING', '2025-07-30', '2025-07-28', 'LATEX CAIR 60% @ 180 KG', 'GLOBAL', 'LTR', 50.000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- Dumping data for table web_gudang.form_sjitem_checkout_rossi: ~0 rows (approximately)

-- Dumping data for table web_gudang.form_sjitem_rossi: ~0 rows (approximately)

-- Dumping data for table web_gudang.form_sj_checkout: ~0 rows (approximately)
INSERT INTO `form_sj_checkout` (`id_sj`, `id_spk`, `no_sj`, `po_number`, `xfd`, `artcolor_name`, `brand_name`, `total_qty`, `tgl_checkout`, `from`, `to_dept`, `created_at`) VALUES
	(36, 21, 'WH-AI-0001', 'IO24-0152', '2025-07-28', 'CG177 BLACK COFFEE', 'BLACK STONE', NULL, '2025-07-30', 'WAREHOUSE', 'CUTTING', '2025-07-27 20:46:20');

-- Dumping data for table web_gudang.form_sj_item: ~0 rows (approximately)

-- Dumping data for table web_gudang.form_spk: ~0 rows (approximately)
INSERT INTO `form_spk` (`id_spk`, `po_number`, `xfd`, `brand_name`, `artcolor_name`, `total_qty`, `created_at`) VALUES
	(21, 'IO24-0152', '2025-07-28', 'BLACK STONE', 'CG177 BLACK COFFEE', '157', '2025-07-28 02:30:29');

-- Dumping data for table web_gudang.form_spk_checkin: ~0 rows (approximately)
INSERT INTO `form_spk_checkin` (`id_spkcheckin`, `id_spk`, `po_number`, `xfd`, `brand_name`, `artcolor_name`, `total_qty`, `created_at`) VALUES
	(20, 21, 'IO24-0152', '2025-07-28', 'BLACK STONE', 'CG177 BLACK COFFEE', '157', '2025-07-28 02:30:29');

-- Dumping data for table web_gudang.form_spk_checkout: ~0 rows (approximately)
INSERT INTO `form_spk_checkout` (`id_spkcheckout`, `id_spk`, `po_number`, `xfd`, `brand_name`, `artcolor_name`, `total_qty`, `created_at`) VALUES
	(38, 21, 'IO24-0152', '2025-07-28', 'BLACK STONE', 'CG177 BLACK COFFEE', '157', '2025-07-28 02:30:29');

-- Dumping data for table web_gudang.form_spk_detail: ~0 rows (approximately)

-- Dumping data for table web_gudang.form_spk_item: ~3 rows (approximately)
INSERT INTO `form_spk_item` (`id_spkitem`, `id_spk`, `po_number`, `xfd`, `artcolor_name`, `brand_name`, `part_name`, `item_name`, `color_name`, `mtrl_name`, `unit_name`, `cons_rate`, `total_consrate`) VALUES
	(40, 21, 'IO24-0152', '2025-07-28', 'CG177 BLACK COFFEE', 'BLACK STONE', 'UPPER 1 (TC+E+COLLAR)', 'LATEX CAIR 60% @ 180 KG', 'BLACK COFFEE', '1.2 - 1.4', 'LTR', 2.6100, 409.77),
	(41, 21, 'IO24-0152', '2025-07-28', 'CG177 BLACK COFFEE', 'BLACK STONE', 'LINING (BS)', 'PLY MAKER', 'GRAPHITE', '1.6 - 1.8 ', 'FTK', 0.3562, 55.92),
	(42, 21, 'IO24-0152', '2025-07-28', 'CG177 BLACK COFFEE', 'BLACK STONE', 'UPPER 2 (V+QTR+T+BT)', 'STICKER PITOGRAM / GOLD', 'GUN METAL', '0.7 - 0.9', 'PCE', 2.6100, 409.77);

-- Dumping data for table web_gudang.form_spk_item_dump: ~0 rows (approximately)

-- Dumping data for table web_gudang.form_spk_sizerun: ~0 rows (approximately)
INSERT INTO `form_spk_sizerun` (`id_sizerun`, `id_spk`, `po_number`, `xfd`, `brand_name`, `artcolor_name`, `size_name`, `qty`, `total_qty`) VALUES
	(33, 4, 'IO25-0140', '2025-07-16', 'ROSSI', 'CG 104 BLACK COFFEE', '49', '20', '30');

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

-- Dumping data for table web_gudang.form_total_item: ~0 rows (approximately)
INSERT INTO `form_total_item` (`id_totalitem`, `id_spk`, `id_consrate`, `total_consrate`) VALUES
	(1, 4, 0, 544.92000);

-- Dumping data for table web_gudang.form_total_sizerun: ~3 rows (approximately)
INSERT INTO `form_total_sizerun` (`id_totalsize`, `id_spk`, `total_qty`) VALUES
	(4, 5, '0'),
	(5, 4, '20'),
	(6, 7, '0');

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

-- Dumping data for table web_gudang.form_unit: ~7 rows (approximately)
INSERT INTO `form_unit` (`id_unit`, `unit_name`) VALUES
	(3, 'LTR'),
	(4, 'PCE'),
	(5, 'FTK'),
	(6, 'MTR'),
	(7, 'SHT'),
	(8, 'NPR'),
	(9, 'SET');

-- Dumping data for table web_gudang.tb_ariat_size: ~2 rows (approximately)
INSERT INTO `tb_ariat_size` (`id_bs`, `id_spk`, `po_number`, `id_brand`, `brand_name`, `artcolor_name`, `xfd`, `total_qty`, `size_6_d`, `size_6_5_d`, `size_7_d`, `size_7_5_d`, `size_8_d`, `size_8_5_d`, `size_9_d`, `size_9_5_d`, `size_10_d`, `size_10_5_d`, `size_11_d`, `size_11_5_d`, `size_12_d`, `size_13_d`, `size_14_d`, `size_15_d`, `size_16_d`) VALUES
	(1, 11, 'IO24-0152', 0, 'ARIAT', 'EG 555 GUN METAL', '2025-07-18', '24', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2', '2', '2', '2', '2', '2', '2'),
	(2, 17, 'IO24-0152', 0, 'ARIAT', 'EG 555 GUN METAL', '2025-07-24', '101', '1', '2', '3', '5', '8', '9', '20', '21', '5', '12', '3', '6', '2', '1', '1', '1', '1');

-- Dumping data for table web_gudang.tb_blackstone_size: ~9 rows (approximately)
INSERT INTO `tb_blackstone_size` (`id_bs`, `id_spk`, `po_number`, `id_brand`, `brand_name`, `artcolor_name`, `xfd`, `total_qty`, `size_36`, `size_37`, `size_38`, `size_39`, `size_40`, `size_41`, `size_42`, `size_43`, `size_44`, `size_45`, `size_46`, `size_47`, `size_48`, `size_49`, `size_50`) VALUES
	(1, 8, 'IO24-0152', 0, 'BLACK STONE', 'CG 104 BLACK COFFEE', '2025-07-18', '247', '0', '0', '0', '0', '6', '26', '48', '62', '45', '32', '16', '8', '2', '0', '2'),
	(2, 10, 'IO24-0152', 0, 'BLACK STONE', 'CG 104 BLACK COFFEE', '2025-07-18', '15', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
	(3, 12, 'IO24-0152', 0, 'BLACK STONE', 'CG177 BLACK COFFEE', '2024-03-29', '247', '0', '0', '0', '0', '6', '26', '48', '62', '45', '32', '16', '8', '2', '0', '2'),
	(4, 13, 'IO24-0152', 0, 'BLACK STONE', 'CG 104 BLACK COFFEE', '2025-07-22', '214', '0', '0', '0', '0', '10', '12', '23', '25', '10', '25', '21', '22', '22', '22', '22'),
	(5, 15, 'IO25-0140', 0, 'BLACK STONE', 'CG 104 BLACK COFFEE', '2025-07-23', '150', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10', '10'),
	(6, 18, 'IO24-0152', 0, 'BLACK STONE', 'EG 555 GUN METAL', '2025-07-03', '154', '1', '2', '1', '3', '5', '8', '7', '9', '45', '20', '12', '23', '15', '1', '2'),
	(7, 19, 'IO24-0152', 0, 'BLACK STONE', 'CG 104 BLACK COFFEE', '2025-07-25', '301', '10', '10', '20', '31', '25', '25', '2', '10', '0', '52', '62', '20', '12', '20', '2'),
	(8, 20, 'IO24-0152', 0, 'BLACK STONE', 'CG177 BLACK COFFEE', '2024-03-29', '247', '0', '0', '0', '0', '6', '26', '48', '62', '45', '32', '16', '8', '2', '0', '2'),
	(9, 21, 'IO24-0152', 0, 'BLACK STONE', 'CG177 BLACK COFFEE', '2025-07-28', '157', '10', '10', '20', '30', '50', '2', '1', '6', '2', '2', '2', '8', '12', '0', '2');

-- Dumping data for table web_gudang.tb_rossi_size: ~0 rows (approximately)
INSERT INTO `tb_rossi_size` (`id_bs`, `id_spk`, `po_number`, `id_brand`, `brand_name`, `artcolor_name`, `xfd`, `total_qty`, `size_3`, `size_3t`, `size_4`, `size_4t`, `size_5`, `size_5t`, `size_6`, `size_6t`, `size_7`, `size_7t`, `size_8`, `size_8t`, `size_9`, `size_9t`, `size_10`, `size_10t`, `size_11`, `size_11t`, `size_12`, `size_13`, `size_14`, `size_15`) VALUES
	(1, 7, 'IO24-0152', 0, 'ROSSI', 'EG 555 GUN METAL', '2025-07-17', '44', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2'),
	(2, 4, 'IO25-0140', 0, 'ROSSI', 'CG 104 BLACK COFFEE', '2025-07-16', '22', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
	(3, 14, 'IO24-0152', 0, 'ROSSI', 'EG 555 GUN METAL', '2025-07-23', '25', '2', '2', '1', '1', '1', '1', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
	(4, 16, 'IO25-0140', 0, 'ROSSI', 'CG 104 BLACK COFFEE', '2025-07-23', '445', '10', '10', '10', '10', '20', '12', '32', '25', '12', '52', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21', '21');

-- Dumping data for table web_gudang.users: ~0 rows (approximately)
INSERT INTO `users` (`id_user`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
	(1, 'Syafiq Wisnu', 's.wisnu1106@gmail.com', 'default.jpg', '$2y$10$u5nt.lm9P1rH1wNMicQ4/uLN4G9FG52/4PKaQrkZoa9r259X9Jkdu', 1, 1, 1752225591),
	(2, 'bagas', 'bagas@mail.com', 'default.jpg', '$2y$10$0j1zRpHEh1tsQvgHQ9Y3X.uvhsrlyWbZcUixpsGKifPNYxdFfNcNa', 2, 1, 1752226175),
	(4, 'admin', 'admin@mail.com', 'default.jpg', '$2y$10$pkiqMNERvnwjI2Iwv3gG2eQgjH9X7rFDEz3mjz95.L8WcYVGr5/RS', 2, 1, 1752226340);

-- Dumping data for table web_gudang.user_access_menu: ~0 rows (approximately)
INSERT INTO `user_access_menu` (`id_access`, `role_id`, `menu_id`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 2, 2),
	(4, 1, 3),
	(5, 1, 4),
	(6, 2, 4),
	(7, 1, 5);

-- Dumping data for table web_gudang.user_menu: ~0 rows (approximately)
INSERT INTO `user_menu` (`id_menu`, `menu`) VALUES
	(1, 'Admin'),
	(2, 'User'),
	(3, 'Menu'),
	(4, 'Form'),
	(5, 'Warehouse');

-- Dumping data for table web_gudang.user_role: ~0 rows (approximately)
INSERT INTO `user_role` (`id_role`, `role`) VALUES
	(1, 'Admin'),
	(2, 'Reguler');

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
	(9, 4, 'Menu Unit', 'form/unit', 'fas fa-fw fa-balance-scale', 1),
	(10, 4, 'Menu List Item', 'form/listitem', 'fas fa-fw fa-list-alt', 1),
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
