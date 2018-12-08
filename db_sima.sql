-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Nov 2015 pada 16.12
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sima`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `qw_barang`
--
CREATE TABLE IF NOT EXISTS `qw_barang` (
`kode_barang` int(5)
,`nama_barang` varchar(50)
,`id_berat` int(2)
,`id_kategori` int(2)
,`id_satuan` int(2)
,`jumlah_stok` int(5)
,`harga` int(7)
,`kadaluarsa` date
,`photo_url` varchar(150)
,`id_supplier` int(3)
,`nama_kategori` varchar(25)
,`nama_satuan` varchar(20)
,`berat` varchar(30)
,`nama_supplier` varchar(30)
,`sisa_kadaluarsa` int(7)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `qw_logs`
--
CREATE TABLE IF NOT EXISTS `qw_logs` (
`id_logs` int(3)
,`id_user` int(3)
,`aktifitas` text
,`tanggal` date
,`waktu` varchar(10)
,`username` varchar(30)
,`nama` varchar(50)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `qw_penukaran_stok`
--
CREATE TABLE IF NOT EXISTS `qw_penukaran_stok` (
`id_penukaran` int(7)
,`kode_barang` varchar(5)
,`stok_awal` int(5)
,`stok_baru` int(5)
,`kadaluarsa_awal` date
,`kadaluarsa_baru` date
,`id_supplier` varchar(3)
,`tanggal` date
,`nama_barang` varchar(50)
,`nama_supplier` varchar(30)
);
-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE IF NOT EXISTS `tb_barang` (
`kode_barang` int(5) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `id_berat` int(2) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `id_satuan` int(2) NOT NULL,
  `jumlah_stok` int(5) NOT NULL,
  `harga` int(7) NOT NULL,
  `kadaluarsa` date NOT NULL,
  `photo_url` varchar(150) NOT NULL,
  `id_supplier` int(3) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barang`, `nama_barang`, `id_berat`, `id_kategori`, `id_satuan`, `jumlah_stok`, `harga`, `kadaluarsa`, `photo_url`, `id_supplier`) VALUES
(20, 'Acer Aspire One AO722', 3, 5, 2, 25, 4500000, '0000-00-00', 'Acer_Aspire_One_AO722-0473.jpg', 4),
(21, 'Apple MacBook Air 13-inch', 1, 3, 2, 0, 8900000, '0000-00-00', 'Apple_MacBook_Air_13-inch.jpg', 7),
(24, 'HP Elite 7000', 1, 6, 2, 10, 3500000, '0000-00-00', 'HP_Elite_7000.jpg', 6),
(25, 'EPSON V370', 1, 8, 2, 20, 2000000, '0000-00-00', 'EPSON_V370.jpg', 3),
(26, 'HP Elite 7000', 1, 6, 2, 35, 3500000, '0000-00-00', 'HP_Elite_70001.jpg', 9),
(27, 'HP LaserJet Pro P1102w', 1, 7, 2, 49, 200000, '0000-00-00', 'HP_LaserJet_Pro_P1102w.jpg', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berat`
--

CREATE TABLE IF NOT EXISTS `tb_berat` (
`id_berat` int(2) NOT NULL,
  `berat` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tb_berat`
--

INSERT INTO `tb_berat` (`id_berat`, `berat`) VALUES
(0, '-'),
(1, '< 5 kg'),
(2, '>= 5 kg < 10 kg'),
(3, '>= 10 kg < 15 kg'),
(4, '>= 15 kg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cart_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_cart_transaksi` (
  `id_transaksi` int(12) NOT NULL,
  `kode_barang` int(7) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(5) NOT NULL,
  `harga_barang` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_cart_transaksi`
--

INSERT INTO `tb_cart_transaksi` (`id_transaksi`, `kode_barang`, `nama_barang`, `jumlah_barang`, `harga_barang`) VALUES
(515101807, 6, 'Paracetamol syr 125mg/5ml', 8, 5000),
(515102525, 7, 'Vitamin B Complex', 9, 4000),
(515102525, 6, 'Paracetamol syr 125mg/5ml', 3, 5000),
(515102726, 5, 'Oralit', 292, 2000),
(515140917, 6, 'Paracetamol syr 125mg/5ml', 9, 5000),
(515141029, 8, 'Antalgin tab 500mg', 12, 4300),
(515163601, 6, 'Paracetamol syr 125mg/5ml', 3, 5000),
(518082854, 13, 'Vitamin B12 tab', 4, 50),
(518082854, 0, 'Vitamin B Complex', 4, 4000),
(916105819, 5, 'Oralit', 8, 2000),
(928095304, 4, 'Woods', 12, 3000),
(2147483647, 27, 'HP LaserJet Pro P1102w', 1, 200000);

--
-- Trigger `tb_cart_transaksi`
--
DELIMITER //
CREATE TRIGGER `pengurang_stok` AFTER INSERT ON `tb_cart_transaksi`
 FOR EACH ROW BEGIN
UPDATE tb_barang SET jumlah_stok = jumlah_stok - NEW.jumlah_barang
WHERE kode_barang = NEW.kode_barang;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_barang`
--

CREATE TABLE IF NOT EXISTS `tb_kategori_barang` (
`id_kategori` int(2) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `tb_kategori_barang`
--

INSERT INTO `tb_kategori_barang` (`id_kategori`, `nama_kategori`) VALUES
(0, '-'),
(3, 'Macbook'),
(5, 'Laptop'),
(6, 'PC Dekstop'),
(7, 'Printer'),
(8, 'Scanner'),
(9, 'Speaker');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_logs`
--

CREATE TABLE IF NOT EXISTS `tb_logs` (
`id_logs` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `aktifitas` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `tb_logs`
--

INSERT INTO `tb_logs` (`id_logs`, `id_user`, `aktifitas`, `tanggal`, `waktu`) VALUES
(1, 1, 'Admin Menghapus Data Barang', '2015-10-20', '19:00:00'),
(2, 10, 'Menambah User', '2015-10-29', '15:50:16'),
(3, 12, 'Menambah User', '2015-10-30', '10:12:58'),
(4, 12, 'Memperbarui Data Supplier', '2015-10-30', '10:28:39'),
(5, 10, 'Melakukan Tranksaksi Penjualan Barang', '2015-11-03', '13:49:42'),
(6, 12, 'Memperbarui Data Barang', '2015-11-03', '14:13:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesan`
--

CREATE TABLE IF NOT EXISTS `tb_pesan` (
`id_pesan` int(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `pengirim` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data untuk tabel `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `nama`, `email`, `pesan`, `tanggal`, `waktu`, `pengirim`) VALUES
(34, ' sdf', '', '', '2015-10-01', '10:47:36', 'Pengunjung'),
(35, 'Owner', 'Pemilik', 'Saya sebagai Owner', '0000-00-00', '10:16:29', 'User'),
(36, 'Admin', 'Admin', 'Tes', '2015-10-19', '10:23:10', 'User'),
(37, 'Ilham saputra', 'milhamsaputra11@gmail.com', 'Terimakasig', '2015-11-03', '17:11:33', 'Pengunjung'),
(38, 'shella aulia', 'auliashella@gmail.com', 'Haiiiiii', '2015-11-03', '17:11:59', 'Pengunjung'),
(39, 'Ayu SHifa', 'ayuuuuu@gmail.com', 'Hallloooooo', '2015-11-03', '17:12:34', 'Pengunjung'),
(40, 'Admin', 'Admin', 'halooooo', '2015-11-03', '17:14:11', 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_satuan_barang`
--

CREATE TABLE IF NOT EXISTS `tb_satuan_barang` (
`id_satuan` int(2) NOT NULL,
  `nama_satuan` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data untuk tabel `tb_satuan_barang`
--

INSERT INTO `tb_satuan_barang` (`id_satuan`, `nama_satuan`) VALUES
(0, '-'),
(2, 'Pcs'),
(3, 'Lusin'),
(4, 'Sachet'),
(5, 'Tablet'),
(6, 'Botol'),
(7, 'Vial'),
(8, 'Ampul'),
(9, 'Tube'),
(10, 'Suppositoria'),
(11, 'Btl/150'),
(12, 'Kapsul'),
(13, 'Kolf'),
(15, 'Zack'),
(16, 'Soft Bag'),
(17, 'Rectal'),
(18, 'Box/10'),
(19, 'mililiter'),
(20, 'Flexpen'),
(21, 'Btl/100'),
(22, 'Kilogram'),
(23, 'Box/5'),
(24, 'Roll'),
(25, 'Box/36'),
(26, 'Box/24'),
(27, 'Box/12'),
(28, 'Box'),
(29, 'Pasang'),
(30, 'Box/100'),
(31, 'Lusin'),
(32, 'Mini Dose'),
(33, 'Eye drop'),
(34, 'Tabung'),
(35, 'Fls'),
(36, 'Buah'),
(37, 'KIt'),
(38, 'Jerigen/20L'),
(39, 'Set'),
(40, 'Box/25'),
(41, 'Box/10L'),
(42, 'Pack/1000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE IF NOT EXISTS `tb_supplier` (
`id_supplier` int(3) NOT NULL,
  `nama_supplier` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `alamat`, `telepon`) VALUES
(1, ' PT. Arena Teknik', 'Jl. Raya Tajur no.2 Bogor', '0251-85858289'),
(3, 'PT. Autorindo', 'Jl. Patimura No.11 Jakarta Selatan', '085811984912'),
(4, 'PT JPM', 'Jl. Raya Tajur no.89 Bogor', '0251-89288122'),
(6, ' CV. Neo Teknik Prima', 'Jl. Bung Hatta no.7 Jakarta Timur', '0852-178721847'),
(7, ' CV. Adhitya Pratama', 'Jl. Puncak no.21 Bogor Selatan', '0251-38383853'),
(8, 'PT Mirah Jaya', 'Jl. Raya Puncak no.90 Bogor', '0251-9821984378'),
(9, 'PT. CIPTA DINAMIKA EXCELINDO', 'Jl. Ancol no.3 Jakarta Utara', '0251-721831222'),
(10, 'CV. Quick Fast', 'Jl. Keong Racun No. 16', '0251-23455432');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi_jual`
--

CREATE TABLE IF NOT EXISTS `tb_transaksi_jual` (
  `id_transaksi` varchar(12) NOT NULL,
  `nama_pembeli` varchar(30) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `total_harga` int(9) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi_jual`
--

INSERT INTO `tb_transaksi_jual` (`id_transaksi`, `nama_pembeli`, `kontak`, `total_harga`, `tanggal`, `jam`) VALUES
('0515101807', 'Bpk. Purnomo', '086627817271', 40000, '2015-05-15', '10:18:24'),
('0515102525', 'Ramdan Nurul', 'ramdannurul77@gmail.', 51000, '2015-05-15', '10:26:03'),
('0515102726', 'Umar', 'umar.sahab82@gmail.c', 584000, '2015-05-15', '10:28:27'),
('0515140917', 'Raka Priyo', '085198239823', 45000, '2015-05-15', '14:10:10'),
('0515141029', 'Lina', '085638438934', 51600, '2015-05-15', '14:11:10'),
('0515163601', 'ilham', '0856123909', 15000, '2015-05-15', '16:38:29'),
('0518082854', 'M. Ilham S.', '085638893241', 16200, '2015-05-18', '08:30:34'),
('0916105819', 'Dudi', 'duididadma@gmail.com', 16000, '2015-09-16', '10:58:54'),
('0928095304', 'Eko', 'ekooke@gmail.com', 36000, '2015-09-28', '09:53:26'),
('110315134904', 'Siswan', '08978877865', 200000, '2015-11-03', '13:49:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tukar_stok`
--

CREATE TABLE IF NOT EXISTS `tb_tukar_stok` (
`id_penukaran` int(7) NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `stok_awal` int(5) NOT NULL,
  `stok_baru` int(5) NOT NULL,
  `kadaluarsa_awal` date NOT NULL,
  `kadaluarsa_baru` date NOT NULL,
  `id_supplier` varchar(3) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data untuk tabel `tb_tukar_stok`
--

INSERT INTO `tb_tukar_stok` (`id_penukaran`, `kode_barang`, `stok_awal`, `stok_baru`, `kadaluarsa_awal`, `kadaluarsa_baru`, `id_supplier`, `tanggal`) VALUES
(2, '5', 430, 300, '2015-05-30', '2015-06-26', '6', '2015-05-14'),
(3, '6', 300, 380, '2015-05-31', '2015-06-28', '9', '2015-05-14'),
(4, '7', 1, 475, '2015-05-22', '2015-05-31', '7', '2015-05-15'),
(5, '8', 288, 365, '2015-05-31', '2015-05-23', '9', '2015-05-15'),
(6, '4', 0, 150, '2015-04-28', '2015-09-30', '7', '2015-09-23'),
(7, '5', 0, 10, '2015-06-26', '2015-09-30', '6', '2015-09-28'),
(8, '5', 10, 9, '2015-09-30', '2015-10-04', '6', '2015-10-02'),
(9, '5', 9, 15, '2015-10-04', '2015-10-06', '6', '2015-10-02'),
(10, '15', 540, 2147483647, '0000-00-00', '0000-00-00', '3', '2015-10-05'),
(11, '15', 2147483647, 90, '0000-00-00', '0000-00-00', '3', '2015-10-05'),
(12, '5', 15, 100, '0000-00-00', '0000-00-00', '8', '2015-10-09'),
(13, '5', 100, 0, '0000-00-00', '0000-00-00', '8', '2015-10-22'),
(14, '5', 0, 0, '0000-00-00', '0000-00-00', '8', '2015-10-22'),
(15, '5', 0, 150, '0000-00-00', '0000-00-00', '8', '2015-10-22'),
(16, '5', 150, 0, '0000-00-00', '0000-00-00', '8', '2015-10-22'),
(17, '5', 0, 200, '0000-00-00', '0000-00-00', '8', '2015-10-22'),
(18, '27', 0, 50, '0000-00-00', '0000-00-00', '7', '2015-10-27'),
(19, '21', 25, 0, '0000-00-00', '0000-00-00', '7', '2015-10-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
`id_user` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `akses`, `status`) VALUES
(1, 'Admin', 'Admin', '4e7afebcfbae000b22c7c85e5560f89a2a0280b4', 'Admin', 'Aktif'),
(6, 'Official Ilham', 'pemilik', '1f86485ac9c8b00fb355bd1eb1c86d937f6d457c', 'Pemilik', 'Aktif'),
(10, 'Mochamad Ilham Saputra', 'IAM', 'd677e7933c6096aff7078724da268899d8fca27f', 'Admin', 'Aktif'),
(11, 'Shifa Ayu Zahrani', 'ayu', 'b947eeb0fcd641c87b7d90e28d159cb1a0cf84de', 'Kasir', 'Aktif'),
(12, 'Shella Aulia Nurliani', 'shella', 'bb7f652eb4ecc0e61626c53aed8f22b38e417b63', 'Gudang', 'Aktif'),
(15, 'sdf', 'ad', '3da541559918a808c2402bba5012f6c60b27661c', 'Admin', 'Aktif'),
(16, 'asdfd', 'fadf', '8f628c09dc2d3130792e6d4ae86a5aa8906d501d', 'Admin', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur untuk view `qw_barang`
--
DROP TABLE IF EXISTS `qw_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qw_barang` AS select `tb_barang`.`kode_barang` AS `kode_barang`,`tb_barang`.`nama_barang` AS `nama_barang`,`tb_barang`.`id_berat` AS `id_berat`,`tb_barang`.`id_kategori` AS `id_kategori`,`tb_barang`.`id_satuan` AS `id_satuan`,`tb_barang`.`jumlah_stok` AS `jumlah_stok`,`tb_barang`.`harga` AS `harga`,`tb_barang`.`kadaluarsa` AS `kadaluarsa`,`tb_barang`.`photo_url` AS `photo_url`,`tb_barang`.`id_supplier` AS `id_supplier`,`tb_kategori_barang`.`nama_kategori` AS `nama_kategori`,`tb_satuan_barang`.`nama_satuan` AS `nama_satuan`,`tb_berat`.`berat` AS `berat`,`tb_supplier`.`nama_supplier` AS `nama_supplier`,(to_days(`tb_barang`.`kadaluarsa`) - to_days(curdate())) AS `sisa_kadaluarsa` from ((((`tb_barang` join `tb_kategori_barang` on((`tb_kategori_barang`.`id_kategori` = `tb_barang`.`id_kategori`))) join `tb_satuan_barang` on((`tb_satuan_barang`.`id_satuan` = `tb_barang`.`id_satuan`))) join `tb_berat` on((`tb_berat`.`id_berat` = `tb_barang`.`id_berat`))) join `tb_supplier` on((`tb_supplier`.`id_supplier` = `tb_barang`.`id_supplier`)));

-- --------------------------------------------------------

--
-- Struktur untuk view `qw_logs`
--
DROP TABLE IF EXISTS `qw_logs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qw_logs` AS select `tb_logs`.`id_logs` AS `id_logs`,`tb_logs`.`id_user` AS `id_user`,`tb_logs`.`aktifitas` AS `aktifitas`,`tb_logs`.`tanggal` AS `tanggal`,`tb_logs`.`waktu` AS `waktu`,`tb_user`.`username` AS `username`,`tb_user`.`nama` AS `nama` from (`tb_logs` join `tb_user` on((`tb_user`.`id_user` = `tb_logs`.`id_user`)));

-- --------------------------------------------------------

--
-- Struktur untuk view `qw_penukaran_stok`
--
DROP TABLE IF EXISTS `qw_penukaran_stok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qw_penukaran_stok` AS select `tb_tukar_stok`.`id_penukaran` AS `id_penukaran`,`tb_tukar_stok`.`kode_barang` AS `kode_barang`,`tb_tukar_stok`.`stok_awal` AS `stok_awal`,`tb_tukar_stok`.`stok_baru` AS `stok_baru`,`tb_tukar_stok`.`kadaluarsa_awal` AS `kadaluarsa_awal`,`tb_tukar_stok`.`kadaluarsa_baru` AS `kadaluarsa_baru`,`tb_tukar_stok`.`id_supplier` AS `id_supplier`,`tb_tukar_stok`.`tanggal` AS `tanggal`,`tb_barang`.`nama_barang` AS `nama_barang`,`tb_supplier`.`nama_supplier` AS `nama_supplier` from ((`tb_tukar_stok` join `tb_barang` on((`tb_barang`.`kode_barang` = `tb_tukar_stok`.`kode_barang`))) join `tb_supplier` on((`tb_supplier`.`id_supplier` = `tb_tukar_stok`.`id_supplier`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
 ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tb_berat`
--
ALTER TABLE `tb_berat`
 ADD PRIMARY KEY (`id_berat`);

--
-- Indexes for table `tb_kategori_barang`
--
ALTER TABLE `tb_kategori_barang`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_logs`
--
ALTER TABLE `tb_logs`
 ADD PRIMARY KEY (`id_logs`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
 ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `tb_satuan_barang`
--
ALTER TABLE `tb_satuan_barang`
 ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
 ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tb_tukar_stok`
--
ALTER TABLE `tb_tukar_stok`
 ADD PRIMARY KEY (`id_penukaran`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
MODIFY `kode_barang` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tb_berat`
--
ALTER TABLE `tb_berat`
MODIFY `id_berat` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_kategori_barang`
--
ALTER TABLE `tb_kategori_barang`
MODIFY `id_kategori` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tb_logs`
--
ALTER TABLE `tb_logs`
MODIFY `id_logs` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
MODIFY `id_pesan` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tb_satuan_barang`
--
ALTER TABLE `tb_satuan_barang`
MODIFY `id_satuan` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
MODIFY `id_supplier` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_tukar_stok`
--
ALTER TABLE `tb_tukar_stok`
MODIFY `id_penukaran` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
