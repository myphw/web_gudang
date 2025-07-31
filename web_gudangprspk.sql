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

-- Dumping structure for table web_gudang.production_spk_report
CREATE TABLE IF NOT EXISTS `production_spk_report` (
  `id_spkcheckin` int NOT NULL AUTO_INCREMENT,
  `id_spk` int NOT NULL DEFAULT '0',
  `po_number` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `xfd` date NOT NULL,
  `brand_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `artcolor_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total_qty` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_spkcheckin`) USING BTREE,
  KEY `id_spk` (`id_spk`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table web_gudang.production_spk_report: ~8 rows (approximately)
INSERT INTO `production_spk_report` (`id_spkcheckin`, `id_spk`, `po_number`, `xfd`, `brand_name`, `artcolor_name`, `total_qty`, `created_at`) VALUES
	(24, 25, '2', '2025-07-30', 'BLACK STONE', 'CG 104 BLACK COFFEE', '15', '2025-07-29 09:30:08'),
	(25, 26, '4', '2025-07-23', 'ROSSI', 'CG 104 BLACK COFFEE', '32', '2025-07-30 08:39:01'),
	(26, 27, '5', '2025-07-31', 'ARIAT', 'CG177 BLACK COFFEE', '37', '2025-07-30 08:39:14'),
	(27, 28, '4', '2025-07-31', 'BLACK STONE', 'EG 555 GUN METAL', '', '2025-07-30 10:27:21'),
	(33, 34, 'PO-1690', '2025-07-02', 'ROSSI', '301 BLACK', '120', '2025-07-30 07:18:44'),
	(34, 35, 'PO-1692', '2025-07-02', 'ROSSI', '4046 BLACK', '', '2025-07-30 08:35:07'),
	(35, 37, '12', '2025-07-16', 'BLACK STONE', '301 BLACK', '50', '2025-07-31 02:47:15'),
	(36, 38, '123', '2025-07-25', 'ARIAT', '303 CLARET', '102', '2025-07-31 08:04:29');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
