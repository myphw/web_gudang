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

-- Dumping data for table web_gudang.form_ac: ~2 rows (approximately)
REPLACE INTO `form_ac` (`id_ac`, `artcolor_name`) VALUES
	(13, '301 BLACK'),
	(14, '4046 BLACK');

-- Dumping data for table web_gudang.form_art: ~0 rows (approximately)
REPLACE INTO `form_art` (`id_art`, `art_name`) VALUES
	(13, '301'),
	(14, '4046');

-- Dumping data for table web_gudang.form_color: ~1 rows (approximately)
REPLACE INTO `form_color` (`id_color`, `color_name`) VALUES
	(12, 'BLACK');

-- Dumping data for table web_gudang.form_consrate: ~2 rows (approximately)
REPLACE INTO `form_consrate` (`id_consrate`, `artcolor_name`, `item_name`, `color_name`, `unit_name`, `cons_rate`) VALUES
	(38, '301 BLACK', ' BLACK KIP (HARVEST GLORY) ', '', 'FTK', 2.90000),
	(39, '301 BLACK', ' TEXON T-480 2.7 MM ', '', 'MTK', 0.05400),
	(40, '301 BLACK', ' EVA 2 MM HD 35 - 40 MM ', '', 'MTR', 0.03500),
	(41, '301 BLACK', ' TEXON G 565 (N587) ', '', 'MTK', 0.02980),
	(42, '301 BLACK', ' TEXON RITE 1.5 MM ', '', 'MTK', 0.02720),
	(43, '301 BLACK', ' POLYURETHANE SYNTHETIC LEATHER 0.8 - 1.0 MM (H-8080)  ', '', 'MTR', 0.01940),
	(44, '301 BLACK', ' SATIN LABEL AS/NZS 2210.5.2019 EN ISO 20347:2012 BMP 714442, 714443 OCCUPATIONAL BOOT ', '', 'PCS', 2.00000),
	(45, '301 BLACK', ' SATIN SIZE + STYLE ', '', 'PCS', 2.00000),
	(46, '301 BLACK', ' WEBBING TAPE ROSSI HERRINGBONE 21 MM ', '', 'PCS', 2.00000),
	(47, '301 BLACK', ' ELASTIC 115MM  ', '', 'MTR', 0.39000),
	(48, '301 BLACK', ' TKT 20 ', '', 'CJ', 0.01200),
	(49, '301 BLACK', ' TKT 30 ', '', 'CJ', 0.00620),
	(50, '301 BLACK', ' TKT 40 ', '', 'CJ', 0.00200),
	(51, '301 BLACK', ' LEM 168 G/W ', '', 'KGM', 0.01500),
	(52, '301 BLACK', ' LEM 7300 TF ', '', 'KGM', 0.00200),
	(53, '301 BLACK', ' ENDURA CUPSOLE (SBR)', '', 'NPR', 1.00000),
	(54, '301 BLACK', ' BONDING AGENT 224 - 2 ', '', 'KGM', 0.01100),
	(55, '301 BLACK', ' LEM 5100 AB ', '', 'KGM', 0.06000),
	(56, '301 BLACK', ' PRIMER D-PLY 008 F ', '', 'KGM', 0.00500),
	(57, '301 BLACK', ' PRIMER D-PLY 1402 ', '', 'KGM', 0.00500),
	(59, '301 BLACK', ' PRIMER D-PLY 232 ', '', 'KGM', 0.01100),
	(60, '301 BLACK', ' D-TAC 7100 ', '', 'KGM', 0.02000),
	(61, '301 BLACK', ' UNIDUR 1001 ', '', 'TIN', 0.00390),
	(62, '301 BLACK', ' LATEX CAIR 60%  ', '', 'KGM', 0.03500),
	(63, '301 BLACK', ' MEK ', '', 'KGM', 0.00500),
	(64, '301 BLACK', ' HOTMELT ROD CEMENT ', '', 'KGM', 0.01330),
	(65, '301 BLACK', ' GLUE STICK ', '', 'KGM', 0.00180),
	(66, '301 BLACK', ' MASKING TAPE 1', '', 'ROLL', 0.00110),
	(67, '301 BLACK', ' PP BAG BENING/POLOS 0.03X40X45 ', '', 'KGM', 0.01670),
	(68, '301 BLACK', ' ANTISTATIC FOOTBED ', '', 'NPR', 1.00000),
	(69, '301 BLACK', ' KERTAS DOORSLAG ', '', 'PCS', 4.00000),
	(70, '301 BLACK', ' KERTAS DUPLEX 250 GR 21 X 29 CM ', '', 'SHT', 0.07690),
	(71, '301 BLACK', ' KERTAS DUPLEX 500 GR 8 X 30 CM ', '', 'SHT', 0.06250),
	(72, '301 BLACK', ' BARCODE STICKER ART. 301 (FROM TEKHAN) ', '', 'PCS', 1.00000),
	(73, '301 BLACK', ' SWING TAG ENDURA SOLE ART. 301 (MAN) (AVERY DENNISON) ', '', 'EA', 1.00000),
	(74, '301 BLACK', ' CARE CARD (NEW FROM AVERY DENNISON) ', '', 'PCS', 1.00000),
	(75, '301 BLACK', ' QUICK SNAP LOOP  ', '', 'PCS', 1.00000),
	(76, '301 BLACK', ' WRAPPING SHOE ', '', 'PCS', 1.00000),
	(77, '301 BLACK', ' MICROGARDE GREEN STICKER ', '', 'PCE', 2.00000),
	(79, '301 BLACK', ' ISI 5 UK. ', '', 'PCS', 0.20000),
	(80, '301 BLACK', ' POLYPROPELINE (PP) TAPE 3', '', 'RO', 0.00760),
	(81, '301 BLACK', ' DOUBLE TAPE 6 MM ', '', 'RO', 0.04300),
	(82, '301 BLACK', ' 6" INNER BOX (GOODBOX) ', '', 'PCS', 1.00000),
	(83, '4046 BLACK', ' 6', '', 'PCS', 1.00000);

-- Dumping data for table web_gudang.form_listitem: ~2 rows (approximately)
REPLACE INTO `form_listitem` (`id_listitem`, `item_name`, `unit_name`, `item_type`) VALUES
	(28, ' BLACK KIP (HARVEST GLORY) ', 'FTK', NULL),
	(29, ' TEXON T-480 2.7 MM ', 'MTK', NULL),
	(30, ' EVA 2 MM HD 35 - 40 MM ', 'MTR', NULL),
	(31, ' TEXON G 565 (N587) ', 'MTK', NULL),
	(32, ' TEXON RITE 1.5 MM ', 'MTK', NULL),
	(33, ' POLYURETHANE SYNTHETIC LEATHER 0.8 - 1.0 MM (H-8080)  ', 'MTR', NULL),
	(34, ' SATIN LABEL AS/NZS 2210.5.2019 EN ISO 20347:2012 BMP 714442, 714443 OCCUPATIONAL BOOT ', 'PCS', NULL),
	(35, ' SATIN SIZE + STYLE ', 'PCS', NULL),
	(36, ' WEBBING TAPE ROSSI HERRINGBONE 21 MM ', 'PCS', NULL),
	(37, ' ELASTIC 115MM  ', 'MTR', NULL),
	(38, ' TKT 20 ', 'CJ', NULL),
	(39, ' TKT 30 ', 'CJ', NULL),
	(40, ' TKT 40 ', 'CJ', NULL),
	(41, ' LEM 168 G/W ', 'KGM', NULL),
	(42, ' LEM 7300 TF ', 'KGM', NULL),
	(43, ' ENDURA CUPSOLE (SBR)', 'NPR', NULL),
	(44, ' BONDING AGENT 224 - 2 ', 'KGM', NULL),
	(45, ' LEM 5100 AB ', 'KGM', NULL),
	(46, ' PRIMER D-PLY 008 F ', 'KGM', NULL),
	(47, ' PRIMER D-PLY 1402 ', 'KGM', NULL),
	(48, ' PRIMER D-PLY 232 ', 'KGM', NULL),
	(49, ' D-TAC 7100 ', 'KGM', NULL),
	(50, ' UNIDUR 1001 ', 'TIN', NULL),
	(51, ' LATEX CAIR 60%  ', 'KGM', NULL),
	(52, ' MEK ', 'KGM', NULL),
	(53, ' HOTMELT ROD CEMENT ', 'KGM', NULL),
	(54, ' GLUE STICK ', 'KGM', NULL),
	(55, ' MASKING TAPE 1" ', 'ROLL', NULL),
	(56, ' PP BAG BENING/POLOS 0.03X40X45 ', 'KGM', NULL),
	(57, ' ANTISTATIC FOOTBED ', 'NPR', NULL),
	(58, ' KERTAS DOORSLAG ', 'PCS', NULL),
	(59, ' KERTAS DUPLEX 250 GR 21 X 29 CM ', 'SHT', NULL),
	(60, ' KERTAS DUPLEX 500 GR 8 X 30 CM ', 'SHT', NULL),
	(61, ' BARCODE STICKER ART. 301 (FROM TEKHAN) ', 'PCS', NULL),
	(62, ' SWING TAG ENDURA SOLE ART. 301 (MAN) (AVERY DENNISON) ', 'EA', NULL),
	(63, ' CARE CARD (NEW FROM AVERY DENNISON) ', 'PCS', NULL),
	(64, ' QUICK SNAP LOOP  ', 'PCS', NULL),
	(65, ' WRAPPING SHOE "ROSSI" PRINT 17 GR UK. 400 X 900 ', 'PCS', NULL),
	(66, ' MICROGARDE GREEN STICKER ', 'PCE', NULL),
	(67, ' 6" INNER BOX (GOODBOX) ', 'PCS', NULL),
	(68, ' ISI 5 UK. ', 'PCS', NULL),
	(69, ' POLYPROPELINE (PP) TAPE 3" ', 'RO', NULL),
	(70, ' DOUBLE TAPE 6 MM ', 'RO', NULL),
	(71, ' MOSS BACK SUEDE (DONG-YI) ', 'FTK', NULL),
	(72, ' POLYURETHANE SYNTHETIC LEATHER (NON WOVEN CLARINO) POT. 18 MM ', 'MTR', NULL),
	(73, ' TEXON T-90 2.5MM BLACK + MIDSOLE EVA 5MM HD 68 - 70 (EVA CHEMICAL) ', 'SHT', NULL),
	(74, ' EMBOSS QTR ROSSI BOOTS ', 'PCE', NULL),
	(75, ' HEAT TRANSPAPER HOTMELT PRINT ', 'PCS', NULL),
	(76, ' ROUND EYELET #350+WASHER ', 'PCE', NULL),
	(77, ' RIPPLE OUTSOLE+LOGO RED (ROSSI)', 'NPR', NULL),
	(78, ' POLYESTER BARDED WAXY 1.2 MM (TRANCILO)  ', 'CJ', NULL),
	(79, ' 4 PLY COTTON ', 'CJ', NULL),
	(80, ' STAPLES 406 J ', 'PAK', NULL),
	(81, ' PRIMER D-PLY 007 F ', 'KGM', NULL),
	(82, ' SWING TAG RIPPLE ', 'EA', NULL),
	(83, ' CARE CARD TAG ', 'EA', NULL);

-- Dumping data for table web_gudang.form_spk: ~0 rows (approximately)
REPLACE INTO `form_spk` (`id_spk`, `po_number`, `xfd`, `brand_name`, `artcolor_name`, `total_qty`, `created_at`) VALUES
	(34, 'PO-1690', '2025-07-02', 'ROSSI', '301 BLACK', '293', '2025-07-30 07:18:44'),
	(35, 'PO-1692', '2025-07-02', 'ROSSI', '4046 BLACK', '', '2025-07-30 08:35:07');

-- Dumping data for table web_gudang.form_spk_checkin: ~0 rows (approximately)
REPLACE INTO `form_spk_checkin` (`id_spkcheckin`, `id_spk`, `po_number`, `xfd`, `brand_name`, `artcolor_name`, `total_qty`, `created_at`) VALUES
	(33, 34, 'PO-1690', '2025-07-02', 'ROSSI', '301 BLACK', '293', '2025-07-30 07:18:44'),
	(34, 35, 'PO-1692', '2025-07-02', 'ROSSI', '4046 BLACK', '', '2025-07-30 08:35:07');

-- Dumping data for table web_gudang.form_spk_checkout: ~0 rows (approximately)
REPLACE INTO `form_spk_checkout` (`id_spkcheckout`, `id_spk`, `po_number`, `xfd`, `brand_name`, `artcolor_name`, `total_qty`, `created_at`) VALUES
	(51, 34, 'PO-1690', '2025-07-02', 'ROSSI', '301 BLACK', '293', '2025-07-30 07:18:44'),
	(52, 35, 'PO-1692', '2025-07-02', 'ROSSI', '4046 BLACK', '', '2025-07-30 08:35:07');

-- Dumping data for table web_gudang.form_spk_item: ~2 rows (approximately)
REPLACE INTO `form_spk_item` (`id_spkitem`, `id_spk`, `po_number`, `xfd`, `artcolor_name`, `brand_name`, `part_name`, `item_name`, `color_name`, `mtrl_name`, `unit_name`, `cons_rate`, `total_consrate`) VALUES
	(57, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'UPPER (V,BS,JV,TTL)', ' BLACK KIP (HARVEST GLORY) ', 'BLACK', '2.2 - 2.4', 'FTK', 2.9000, 849.70),
	(58, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'INSOLE', ' TEXON T-480 2.7 MM ', 'NATURAL', '100 X 150', 'MTK', 0.0540, 15.82),
	(59, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'FILLER', ' EVA 2 MM HD 35 - 40 MM ', 'BLACK', '44"', 'MTR', 0.0350, 10.26),
	(60, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'TOE BOX', ' TEXON G 565 (N587) ', 'NATURAL', '100 X 100', 'MTK', 0.0298, 8.73),
	(61, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'BACK COUNTER', ' TEXON RITE 1.5 MM ', 'NATURAL', '100 X 100', 'MTK', 0.0272, 7.97),
	(62, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'BACK COUNTER LINING', ' POLYURETHANE SYNTHETIC LEATHER 0.8 - 1.0 MM (H-8080)  ', 'BLACK', '56"', 'MTR', 0.0194, 5.68),
	(63, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'LABEL INSIDE', ' SATIN LABEL AS/NZS 2210.5.2019 EN ISO 20347:2012 BMP 714442, 714443 OCCUPATIONAL BOOT ', 'GREY', 'C3', 'PCS', 2.0000, 586.00),
	(64, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'SIZE LABEL', ' SATIN SIZE + STYLE ', 'WHITE/BLACK', '', 'PCS', 2.0000, 586.00),
	(65, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'FRONT LOOP', ' WEBBING TAPE ROSSI HERRINGBONE 21 MM ', 'BLACK/CREAM', '', 'PCS', 2.0000, 586.00),
	(66, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'QUARTER ELASTIC', ' ELASTIC 115MM  ', 'BLACK', '', 'MTR', 0.3900, 114.27),
	(67, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'UPPER THREAD ', ' TKT 20 ', 'BLACK', '', 'CJ', 0.0120, 3.52),
	(68, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'UPPER THREAD ', ' TKT 30 ', 'BLACK', '', 'CJ', 0.0062, 1.82),
	(69, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'UPPER THREAD ', ' TKT 40 ', 'BLACK', '', 'CJ', 0.0020, 0.59),
	(70, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH (STITCHING)', ' LEM 168 G/W ', '', '', 'KGM', 0.0150, 4.40),
	(71, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH (STITCHING)', ' LEM 7300 TF ', '', '', 'KGM', 0.0020, 0.59),
	(72, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'OUTSOLE', ' ENDURA CUPSOLE (SBR)', 'BLACK', '', 'NPR', 1.0000, 293.00),
	(73, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH ', ' BONDING AGENT 224 - 2 ', '', '', 'KGM', 0.0110, 3.22),
	(74, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH ', ' LEM 5100 AB ', '', '', 'KGM', 0.0600, 17.58),
	(75, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH ', ' PRIMER D-PLY 008 F ', '', '', 'KGM', 0.0050, 1.47),
	(76, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH GANTI MEK', ' PRIMER D-PLY 1402 ', '', '', 'KGM', 0.0050, 1.47),
	(77, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH PRIMER OUTSOLE SBR', ' PRIMER D-PLY 232 ', '', '', 'KGM', 0.0110, 3.22),
	(78, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH ', ' D-TAC 7100 ', '', '', 'KGM', 0.0200, 5.86),
	(79, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH', ' UNIDUR 1001 ', '', '', 'TIN', 0.0039, 1.14),
	(80, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH', ' LATEX CAIR 60%  ', '', '', 'KGM', 0.0350, 10.26),
	(81, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH', ' MEK ', '', '', 'KGM', 0.0050, 1.47),
	(82, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH TOE LASTER', ' HOTMELT ROD CEMENT ', 'E44', '', 'KGM', 0.0133, 3.90),
	(83, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH INSOLE', ' GLUE STICK ', 'WHITE', '1KGM=34BTG', 'KGM', 0.0018, 0.53),
	(84, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH (LASTING INSOLE)', ' MASKING TAPE 1', 'NATURAL', '1ROLL=20Y    ', 'ROLL', 0.0011, 0.32),
	(85, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'BAHAN PEMBANTU', ' PP BAG BENING/POLOS 0.03X40X45 ', 'CLEAR', '', 'KGM', 0.0167, 4.89),
	(86, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'FOOTBED', ' ANTISTATIC FOOTBED ', 'RED', '', 'NPR', 1.0000, 293.00),
	(87, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'KERTAS SUMPEL', ' KERTAS DOORSLAG ', '', '44 X 69    ', 'PCS', 4.0000, 1172.00),
	(88, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'KERTAS SEKAT', ' KERTAS DUPLEX 250 GR 21 X 29 CM ', '', '', 'SHT', 0.0769, 22.53),
	(89, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'SHOE HUNGER', ' KERTAS DUPLEX 500 GR 8 X 30 CM ', '', '', 'SHT', 0.0625, 18.31),
	(90, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'BARCODE LABEL', ' BARCODE STICKER ART. 301 (FROM TEKHAN) ', '', '', 'PCS', 1.0000, 293.00),
	(91, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'TAG', ' SWING TAG ENDURA SOLE ART. 301 (MAN) (AVERY DENNISON) ', '', '', 'EA', 1.0000, 293.00),
	(92, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'TAG', ' CARE CARD (NEW FROM AVERY DENNISON) ', '', '', 'PCS', 1.0000, 293.00),
	(93, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'HANG TAG HOLDER', ' QUICK SNAP LOOP  ', 'BLACK', '12 MM', 'PCS', 1.0000, 293.00),
	(94, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'PACKING PAPER', ' WRAPPING SHOE ', 'YELLOW/RED/BLACK', 'ALL SZZ', 'PCS', 1.0000, 293.00),
	(95, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ANTI FUNGUS', ' MICROGARDE GREEN STICKER ', '', '', 'PCE', 2.0000, 586.00),
	(96, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'INNER BOX ', ' 6', '', '', 'PCS', 1.0000, 293.00),
	(97, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'CTN BOX', ' ISI 5 UK. ', '', '', 'PCS', 0.2000, 58.60),
	(98, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH (PACKING)', ' POLYPROPELINE (PP) TAPE 3', 'CLEAR', '3"', 'RO', 0.0076, 2.23),
	(99, 34, 'PO-1690', '2025-07-02', '301 BLACK', 'ROSSI', 'ATTACH ', ' DOUBLE TAPE 6 MM ', '', '', 'RO', 0.0430, 12.60);

-- Dumping data for table web_gudang.form_unit: ~12 rows (approximately)
REPLACE INTO `form_unit` (`id_unit`, `unit_name`) VALUES
	(3, 'LTR'),
	(4, 'PCE'),
	(5, 'FTK'),
	(6, 'MTR'),
	(7, 'SHT'),
	(8, 'NPR'),
	(9, 'SET'),
	(10, 'TIN'),
	(11, 'KGM'),
	(12, 'YRD'),
	(13, 'MTK'),
	(14, 'CONE'),
	(15, 'ROLL'),
	(16, 'PCS'),
	(17, 'CJ'),
	(18, 'EA'),
	(19, 'RO'),
	(20, 'PAK');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
