/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.28-MariaDB : Database - pengaduan2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pengaduan2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `pengaduan2`;

/*Table structure for table `masyarakat` */

DROP TABLE IF EXISTS `masyarakat`;

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL,
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `masyarakat` */

insert  into `masyarakat`(`nik`,`nama`,`username`,`password`,`telp`) values 
('0987654321','gede','gede','13ad65cc032d4b04927943c33673a65d','0987654321'),
('123','sisna','sisna','sisna','08777772'),
('1234567','wayan','wayan','wayan','086667662'),
('12345678','putra','putra','5e0c5a0bf82decdd43b2150b622c66c5','087654321'),
('33','putri','ww','putri','0877'),
('34521','putu','putu','b9e40850e07d354ba4b1a8dbd8e1f2b6','0123432'),
('666666666','mega','mega','$2y$10$9aH9Ik2sj42H3/pSvr7vPuzxbBbzHUY1.hV/8AZCXjiEdCHK7vtxa','0879681213342'),
('70125683','dede','dede','$2y$10$kd0HaTs9ZXo1RncLBo5GC.355eRoCcpsJ/xPrPaioLN41Eazujerm','09898976576'),
('8888','Juli','Juli','$2y$10$GDofXNuBTu07T7C.vLsY0u4t5IJyL9fwO.4ykI09HX12.YTxromz.','08977777667'),
('92075634','deksis','deksis','$2y$10$GzB61i3TIcg0vef3tj4kQ.BfeWhnOsyeskj3q6N9uJVzAN4bZVIpy','089797564111');

/*Table structure for table `pengaduan` */

DROP TABLE IF EXISTS `pengaduan`;

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('0','proses','selesai','tolak') NOT NULL,
  PRIMARY KEY (`id_pengaduan`),
  KEY `nik` (`nik`),
  CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pengaduan` */

insert  into `pengaduan`(`id_pengaduan`,`tgl_pengaduan`,`nik`,`isi_laporan`,`foto`,`status`) values 
(5,'2023-03-31','33','eee55555','WhatsApp Image 2022-09-18 at 15.27.22.jpeg','proses'),
(23,'2023-03-31','123','wwwwww','WhatsApp Image 2022-09-18 at 14.45.22.jpeg','selesai'),
(24,'2023-03-08','123',' www','leslie-livingston.png','tolak'),
(25,'2023-03-31','123','qqqqq','WhatsApp Image 2022-09-18 at 14.46.53 (1).jpeg','proses'),
(26,'2023-03-08','123',' qqqqq bbbb ggggg bb tt eeeeeee uuu iiiiii lllll','','proses'),
(27,'2023-03-10','1234567','wayan','','0'),
(28,'2023-03-11','1234567','qqqq','WhatsApp Image 2022-09-18 at 14.45.19.jpeg','0'),
(29,'2023-03-15','1234567','pacar saya diambil teman, Tolong bantu saya untuk mencari pacar baru','WhatsApp Image 2022-09-18 at 14.47.54 (1).jpeg','0'),
(30,'2023-03-15','1234567','wwr vv cc','WhatsApp Image 2022-09-18 at 14.47.54.jpeg','0'),
(31,'2023-03-17','92075634','pacar saya hilang diambil teman !!!!! tolong saya, untuk mendapatkan pacar baru ....','WhatsApp Image 2022-09-18 at 14.46.52.jpeg','0'),
(32,'2023-03-19','666666666','hokage yang pensiun tapi masih memimpin desa. jadi lakukan kudeta sekarang juga !!!!!!!!!!','WhatsApp Image 2022-09-18 at 14.45.32.jpeg','tolak'),
(33,'2023-03-20','8888','temen saya hilang tolong bantu di carikan hilang di daerah gianyar bali  !!!','WhatsApp Image 2022-09-18 at 14.45.24.jpeg','0');

/*Table structure for table `petugas` */

DROP TABLE IF EXISTS `petugas`;

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `foto_petugas` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `petugas` */

insert  into `petugas`(`id_petugas`,`nama_petugas`,`username`,`password`,`telp`,`level`,`foto_petugas`) values 
(1,'budi','budi','00dfc53ee86af02e742515cdcf075ed3','083333333333','petugas',''),
(2,'wati','wati','wati','083333333333','admin',''),
(3,'111','111','698d51a19d8a121ce581499d7b701668','111','admin','large-vdiXAntEL-transformed.png'),
(7,'5','5','5','5','admin',NULL),
(8,'6','6','6','6','petugas',NULL),
(9,'7','7','7','7','admin',NULL),
(10,'8','8','8','8','admin',NULL),
(11,'9','9','9','9','admin',NULL),
(12,'sisna','sisna','e6af919be92774212f0e536d2077cf11','0899999999999','admin',''),
(13,'dede','dede','dede','09876567','admin',''),
(15,'Rama Dita','Marmut','Marmut','0820082888839','admin','Rama.jpg');

/*Table structure for table `tanggapan` */

DROP TABLE IF EXISTS `tanggapan`;

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL,
  PRIMARY KEY (`id_tanggapan`),
  KEY `id_pengaduan` (`id_pengaduan`),
  KEY `id_petugas` (`id_petugas`),
  CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tanggapan` */

insert  into `tanggapan`(`id_tanggapan`,`id_pengaduan`,`tgl_tanggapan`,`tanggapan`,`id_petugas`) values 
(14,5,'2023-03-18','uuuu',1),
(15,29,'2023-03-19','www',12),
(16,32,'2023-03-20','oke',12);

/*Table structure for table `viewpengaduan` */

DROP TABLE IF EXISTS `viewpengaduan`;

/*!50001 DROP VIEW IF EXISTS `viewpengaduan` */;
/*!50001 DROP TABLE IF EXISTS `viewpengaduan` */;

/*!50001 CREATE TABLE  `viewpengaduan`(
 `nik` char(16) ,
 `nama` varchar(35) ,
 `username` varchar(25) ,
 `password` varchar(255) ,
 `telp` varchar(13) ,
 `id_pengaduan` int(11) ,
 `tgl_pengaduan` date ,
 `isi_laporan` text ,
 `foto` varchar(255) ,
 `status` enum('0','proses','selesai','tolak') 
)*/;

/*Table structure for table `viewtanggapan` */

DROP TABLE IF EXISTS `viewtanggapan`;

/*!50001 DROP VIEW IF EXISTS `viewtanggapan` */;
/*!50001 DROP TABLE IF EXISTS `viewtanggapan` */;

/*!50001 CREATE TABLE  `viewtanggapan`(
 `id_tanggapan` int(11) ,
 `id_pengaduan` int(11) ,
 `tgl_pengaduan` date ,
 `tanggapan` text ,
 `tgl_tanggapan` date ,
 `id_petugas` int(11) ,
 `isi_laporan` date ,
 `foto` varchar(255) ,
 `status` enum('0','proses','selesai','tolak') ,
 `nama_petugas` varchar(35) ,
 `username` varchar(25) ,
 `password` varchar(32) ,
 `telp` varchar(13) ,
 `level` enum('admin','petugas') ,
 `foto_petugas` varchar(255) 
)*/;

/*View structure for view viewpengaduan */

/*!50001 DROP TABLE IF EXISTS `viewpengaduan` */;
/*!50001 DROP VIEW IF EXISTS `viewpengaduan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewpengaduan` AS select `masyarakat`.`nik` AS `nik`,`masyarakat`.`nama` AS `nama`,`masyarakat`.`username` AS `username`,`masyarakat`.`password` AS `password`,`masyarakat`.`telp` AS `telp`,`pengaduan`.`id_pengaduan` AS `id_pengaduan`,`pengaduan`.`tgl_pengaduan` AS `tgl_pengaduan`,`pengaduan`.`isi_laporan` AS `isi_laporan`,`pengaduan`.`foto` AS `foto`,`pengaduan`.`status` AS `status` from (`masyarakat` join `pengaduan`) where `pengaduan`.`nik` = `masyarakat`.`nik` */;

/*View structure for view viewtanggapan */

/*!50001 DROP TABLE IF EXISTS `viewtanggapan` */;
/*!50001 DROP VIEW IF EXISTS `viewtanggapan` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewtanggapan` AS select `tanggapan`.`id_tanggapan` AS `id_tanggapan`,`pengaduan`.`id_pengaduan` AS `id_pengaduan`,`pengaduan`.`tgl_pengaduan` AS `tgl_pengaduan`,`tanggapan`.`tanggapan` AS `tanggapan`,`tanggapan`.`tgl_tanggapan` AS `tgl_tanggapan`,`petugas`.`id_petugas` AS `id_petugas`,`tanggapan`.`tgl_tanggapan` AS `isi_laporan`,`pengaduan`.`foto` AS `foto`,`pengaduan`.`status` AS `status`,`petugas`.`nama_petugas` AS `nama_petugas`,`petugas`.`username` AS `username`,`petugas`.`password` AS `password`,`petugas`.`telp` AS `telp`,`petugas`.`level` AS `level`,`petugas`.`foto_petugas` AS `foto_petugas` from ((`tanggapan` join `pengaduan`) join `petugas`) where `tanggapan`.`id_pengaduan` = `pengaduan`.`id_pengaduan` and `tanggapan`.`id_petugas` = `petugas`.`id_petugas` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
