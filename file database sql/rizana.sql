-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk rizana
CREATE DATABASE IF NOT EXISTS `rizana` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `rizana`;

-- membuang struktur untuk table rizana.beasiswa
CREATE TABLE IF NOT EXISTS `beasiswa` (
  `idbeasiswa` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tanggalbataspendaftaran` date DEFAULT NULL,
  `foto` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`idbeasiswa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel rizana.beasiswa: ~3 rows (lebih kurang)
INSERT INTO `beasiswa` (`idbeasiswa`, `judul`, `deskripsi`, `tanggal`, `tanggalbataspendaftaran`, `foto`) VALUES
	(1, 'asds', 'asdasd', '2024-05-21', '2024-05-21', 'St2Ld96NBtVmEcCfmL862iRJ1MUff2AQYQXFMKFH.jpg'),
	(3, 'a', 'b', '2024-05-21', '2024-05-21', 'EehLOE0AIpdudZ4IR5WUf4wskpIIC9xZQ7GctKo1.jpg'),
	(4, 'beasiswa 1', 'deskripsi beasiswa 123', '2024-05-21', '2024-06-01', 'vHZj9ONju5rZIsv849RaiXV2oY4uh3acb1zzUScS.png');

-- membuang struktur untuk table rizana.loker
CREATE TABLE IF NOT EXISTS `loker` (
  `idloker` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tanggalbataspendaftaran` date DEFAULT NULL,
  `foto` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`idloker`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel rizana.loker: ~3 rows (lebih kurang)
INSERT INTO `loker` (`idloker`, `judul`, `deskripsi`, `tanggal`, `tanggalbataspendaftaran`, `foto`) VALUES
	(3, 'testing', 'halo', '2024-05-21', '2024-05-31', '9UmZcS36IUma1ZHpZsBIm9p2KFx4Y3gzI2SxW1wg.jpg'),
	(4, 'Mengajar', 'asdasd', '2024-05-21', '2024-06-01', 'M0Uqe74DnvueHygROOdAxX94Wlye5BkES9SNcdbA.jpg');

-- membuang struktur untuk table rizana.lomba
CREATE TABLE IF NOT EXISTS `lomba` (
  `idlomba` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tanggalbataspendaftaran` date DEFAULT NULL,
  `foto` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`idlomba`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel rizana.lomba: ~2 rows (lebih kurang)
INSERT INTO `lomba` (`idlomba`, `judul`, `deskripsi`, `tanggal`, `tanggalbataspendaftaran`, `foto`) VALUES
	(1, 'test', 'asd', '2024-05-21', '2024-05-21', 'eBbppAlW78o1MxSnEMeSDufGeI48cyTaaWyJOXPK.jpg'),
	(2, 'testingk', 'halo', '2024-05-21', '2024-05-25', 'sFD9M5ESCvy08FcFFrOpM4LVcECyUbhw8pFWDHBm.jpg');

-- membuang struktur untuk table rizana.users
CREATE TABLE IF NOT EXISTS `users` (
  `idusers` int NOT NULL AUTO_INCREMENT,
  `email` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`idusers`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel rizana.users: ~1 rows (lebih kurang)
INSERT INTO `users` (`idusers`, `email`, `nama`, `password`) VALUES
	(1, 'admin@gmail.com', 'Admin', 'admin');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
