-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Mar 2023 pada 04.13
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_masyarakat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('0987654321', 'gede', 'gede', '13ad65cc032d4b04927943c33673a65d', '0987654321'),
('123', 'sisna', 'sisna', 'sisna', '08777772'),
('1234567', 'wayan', 'wayan', 'wayan', '086667662'),
('12345678', 'putra', 'putra', '5e0c5a0bf82decdd43b2150b622c66c5', '087654321'),
('33', 'putri', 'ww', 'putri', '0877'),
('34521', 'putu', 'putu', 'b9e40850e07d354ba4b1a8dbd8e1f2b6', '0123432'),
('666666666', 'mega', 'mega', '$2y$10$9aH9Ik2sj42H3/pSvr7vPuzxbBbzHUY1.hV/8AZCXjiEdCHK7vtxa', '0879681213342'),
('70125683', 'dede', 'dede', '$2y$10$kd0HaTs9ZXo1RncLBo5GC.355eRoCcpsJ/xPrPaioLN41Eazujerm', '09898976576'),
('8888', 'Juli', 'Juli', '$2y$10$GDofXNuBTu07T7C.vLsY0u4t5IJyL9fwO.4ykI09HX12.YTxromz.', '08977777667'),
('92075634', 'deksis', 'deksis', '$2y$10$GzB61i3TIcg0vef3tj4kQ.BfeWhnOsyeskj3q6N9uJVzAN4bZVIpy', '089797564111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('0','proses','selesai','tolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(5, '2023-03-31', '33', 'eee55555', 'WhatsApp Image 2022-09-18 at 15.27.22.jpeg', 'proses'),
(23, '2023-03-31', '123', 'wwwwww', 'WhatsApp Image 2022-09-18 at 14.45.22.jpeg', 'selesai'),
(24, '2023-03-08', '123', 'www', 'WhatsApp Image 2022-09-18 at 14.45.25.jpeg', '0'),
(25, '2023-03-31', '123', 'qqqqq', 'WhatsApp Image 2022-09-18 at 14.46.53 (1).jpeg', 'proses'),
(26, '2023-03-08', '123', 'qqqqq bbbb ggggg bb tt eeeeeee uuu iiiiii lllll', '', 'tolak'),
(27, '2023-03-10', '1234567', 'wayan', '', '0'),
(28, '2023-03-11', '1234567', 'qqqq', 'WhatsApp Image 2022-09-18 at 14.45.19.jpeg', '0'),
(29, '2023-03-15', '1234567', 'pacar saya diambil teman, Tolong bantu saya untuk mencari pacar baru', 'WhatsApp Image 2022-09-18 at 14.47.54 (1).jpeg', '0'),
(30, '2023-03-15', '1234567', 'wwr vv cc', 'WhatsApp Image 2022-09-18 at 14.47.54.jpeg', '0'),
(31, '2023-03-17', '92075634', 'pacar saya hilang diambil teman !!!!! tolong saya, untuk mendapatkan pacar baru ....', 'WhatsApp Image 2022-09-18 at 14.46.52.jpeg', '0'),
(32, '2023-03-19', '666666666', 'hokage yang pensiun tapi masih memimpin desa. jadi lakukan kudeta sekarang juga !!!!!!!!!!', 'WhatsApp Image 2022-09-18 at 14.45.32.jpeg', '0'),
(33, '2023-03-20', '8888', 'temen saya hilang tolong bantu di carikan hilang di daerah gianyar bali  !!!', 'WhatsApp Image 2022-09-18 at 14.45.24.jpeg', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL,
  `foto_petugas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`, `foto_petugas`) VALUES
(1, 'budi', 'budi', '00dfc53ee86af02e742515cdcf075ed3', '083333333333', 'petugas', ''),
(2, 'wati', 'wati', 'wati', '083333333333', 'admin', ''),
(3, '111', '111', '698d51a19d8a121ce581499d7b701668', '111', 'admin', 'WhatsApp Image 2022-09-18 at 14.45.22 (1).jpeg'),
(7, '5', '5', '5', '5', 'admin', NULL),
(8, '6', '6', '6', '6', 'petugas', NULL),
(9, '7', '7', '7', '7', 'admin', NULL),
(10, '8', '8', '8', '8', 'admin', NULL),
(11, '9', '9', '9', '9', 'admin', NULL),
(12, 'sisna', 'sisna', 'e6af919be92774212f0e536d2077cf11', '0899999999999', 'admin', ''),
(13, 'dede', 'dede', 'dede', '09876567', 'admin', ''),
(14, 'ffff', 'ffff', 'ece926d8c0356205276a45266d361161', '08666766454', 'petugas', 'WhatsApp Image 2022-09-18 at 14.46.15 (1).jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(14, 5, '2023-03-18', 'uuuu', 1),
(15, 29, '2023-03-19', 'www', 12),
(16, 32, '2023-03-20', 'oke', 12);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `viewpengaduan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `viewpengaduan` (
`id_pengaduan` int(11)
,`tgl_pengaduan` date
,`nik` char(16)
,`isi_laporan` text
,`foto` varchar(255)
,`status` enum('0','proses','selesai','tolak')
,`nama` varchar(35)
,`username` varchar(25)
,`telp` varchar(13)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `viewtanggapan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `viewtanggapan` (
`id_tanggapan` int(11)
,`tgl_tanggapan` date
,`tanggapan` text
,`id_pengaduan` int(11)
,`tgl_pengaduan` date
,`nik` char(16)
,`isi_laporan` text
,`foto` varchar(255)
,`status` enum('0','proses','selesai','tolak')
,`id_petugas` int(11)
,`nama_petugas` varchar(35)
,`username` varchar(25)
,`password` varchar(32)
,`telp` varchar(13)
,`level` enum('admin','petugas')
);

-- --------------------------------------------------------

--
-- Struktur untuk view `viewpengaduan`
--
DROP TABLE IF EXISTS `viewpengaduan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewpengaduan`  AS SELECT `pengaduan`.`id_pengaduan` AS `id_pengaduan`, `pengaduan`.`tgl_pengaduan` AS `tgl_pengaduan`, `pengaduan`.`nik` AS `nik`, `pengaduan`.`isi_laporan` AS `isi_laporan`, `pengaduan`.`foto` AS `foto`, `pengaduan`.`status` AS `status`, `masyarakat`.`nama` AS `nama`, `masyarakat`.`username` AS `username`, `masyarakat`.`telp` AS `telp` FROM (`pengaduan` join `masyarakat`) WHERE `pengaduan`.`nik` = `masyarakat`.`nik``nik`  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `viewtanggapan`
--
DROP TABLE IF EXISTS `viewtanggapan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewtanggapan`  AS SELECT `tanggapan`.`id_tanggapan` AS `id_tanggapan`, `tanggapan`.`tgl_tanggapan` AS `tgl_tanggapan`, `tanggapan`.`tanggapan` AS `tanggapan`, `tanggapan`.`id_pengaduan` AS `id_pengaduan`, `pengaduan`.`tgl_pengaduan` AS `tgl_pengaduan`, `pengaduan`.`nik` AS `nik`, `pengaduan`.`isi_laporan` AS `isi_laporan`, `pengaduan`.`foto` AS `foto`, `pengaduan`.`status` AS `status`, `tanggapan`.`id_petugas` AS `id_petugas`, `petugas`.`nama_petugas` AS `nama_petugas`, `petugas`.`username` AS `username`, `petugas`.`password` AS `password`, `petugas`.`telp` AS `telp`, `petugas`.`level` AS `level` FROM ((`tanggapan` join `pengaduan`) join `petugas`) WHERE `tanggapan`.`id_pengaduan` = `pengaduan`.`id_pengaduan` AND `tanggapan`.`id_petugas` = `petugas`.`id_petugas``id_petugas`  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
