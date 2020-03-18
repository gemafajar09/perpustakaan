-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `buku`;
CREATE TABLE `buku` (
  `no_buku` varchar(191) NOT NULL,
  `judul_buku` varchar(191) NOT NULL,
  `pengarang` varchar(191) NOT NULL,
  `kategori` varchar(191) NOT NULL,
  PRIMARY KEY (`no_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `buku` (`no_buku`, `judul_buku`, `pengarang`, `kategori`) VALUES
('02587',	'program',	'ok',	'Buku Pelajaran Umum'),
('2567',	'IPS',	'hasvshdv',	'Buku Mata Pelajaran');

DROP TABLE IF EXISTS `kelas_siswa`;
CREATE TABLE `kelas_siswa` (
  `no_anggota` varchar(191) NOT NULL,
  `ta` varchar(191) NOT NULL,
  `kelas` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kelas_siswa` (`no_anggota`, `ta`, `kelas`) VALUES
('567',	'2019/2020',	'VII');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `kepsek`;
CREATE TABLE `kepsek` (
  `id_kepsek` varchar(191) NOT NULL,
  `nama_kepsek` varchar(191) NOT NULL,
  `jabatan` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `kepsek` (`id_kepsek`, `nama_kepsek`, `jabatan`, `username`, `password`) VALUES
('789456',	'kepsek',	'kepsek',	'kepsek',	'$2y$10$CtrEKQqX4OxirAjnbUWRAe8RmklbgMd.pXOTEfbODZxBoDA49ZXWm');

DROP TABLE IF EXISTS `kunjungan`;
CREATE TABLE `kunjungan` (
  `tgl_kunjungan` date NOT NULL,
  `no_anggota` varchar(191) NOT NULL,
  `kelas` varchar(191) NOT NULL,
  `id_pegawai` int(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kunjungan` (`tgl_kunjungan`, `no_anggota`, `kelas`, `id_pegawai`) VALUES
('2020-03-03',	'19.234',	'VII',	9999);

DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `id_pegawai` varchar(191) NOT NULL,
  `nama_pegawai` varchar(191) NOT NULL,
  `jabatan` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `jabatan`, `username`, `password`) VALUES
('123456789',	'admin',	'Pustakawan',	'admin',	'$2y$10$4/26b68nvpMGTNvnCh1Y/e/X3DQsxebZ654N/YlewZ4i5mhDWC64K'),
('123556',	'nia',	'pustakawan',	'123',	''),
('2659958',	'administrator',	'Pustakawan',	'pustaka',	'$2y$10$fSHSuPli/BjUjW2jzhqw1u9JUpdF/bwURJQi4lneoOfGExfybWlN6'),
('9898989898',	'bangke',	'pustakawan',	'sibangke',	'$2y$10$UJfIJLDwjT3rH.p.CFbxwOsvsPk72QIc7vwNPnlj4uGctT0oLA16O');

DROP TABLE IF EXISTS `sangsi`;
CREATE TABLE `sangsi` (
  `id_pelanggaran` varchar(3) NOT NULL,
  `sangsi` text NOT NULL,
  PRIMARY KEY (`id_pelanggaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `no_anggota` varchar(191) NOT NULL,
  `nama_siswa` varchar(191) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  PRIMARY KEY (`no_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `siswa` (`no_anggota`, `nama_siswa`, `no_hp`, `username`, `password`) VALUES
('1358989',	'gema',	'082122855458',	'fajar',	'$2y$10$GbOINlkkXId5hSome.C8Xe1L365hnq9IU5ljpcChkF2uN7CyYuljS');

DROP TABLE IF EXISTS `terlambat`;
CREATE TABLE `terlambat` (
  `id_terlambat` int(11) NOT NULL AUTO_INCREMENT,
  `no_anggota` varchar(191) NOT NULL,
  `tgl_pj` date NOT NULL,
  `no_buku` varchar(191) NOT NULL,
  `tgl_pg` date NOT NULL,
  `id_pelanggaran` varchar(191) NOT NULL,
  `id_pegawai` varchar(191) NOT NULL,
  PRIMARY KEY (`id_terlambat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `transaksi_peminjaman`;
CREATE TABLE `transaksi_peminjaman` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `ta` varchar(191) NOT NULL,
  `no_anggota` varchar(191) NOT NULL,
  `no_buku` varchar(191) NOT NULL,
  `tgl_pj` varchar(191) NOT NULL,
  `id_pegawai` varchar(191) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `transaksi_peminjaman` (`id_transaksi`, `ta`, `no_anggota`, `no_buku`, `tgl_pj`, `id_pegawai`) VALUES
(7,	'2019/2020',	'567',	'2567',	'2020-03-18',	'123456789');

DROP TABLE IF EXISTS `transaksi_pengembalian`;
CREATE TABLE `transaksi_pengembalian` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `ta` varchar(191) NOT NULL,
  `no_anggota` varchar(191) NOT NULL,
  `no_buku` varchar(191) NOT NULL,
  `tgl_pg` varchar(191) NOT NULL,
  `id_pegawai` varchar(191) NOT NULL,
  `denda` varchar(191) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `transaksi_pengembalian` (`id_transaksi`, `ta`, `no_anggota`, `no_buku`, `tgl_pg`, `id_pegawai`, `denda`) VALUES
(2,	'2019/2020',	'567',	'2567',	'2020-03-20',	'123456789',	'0'),
(4,	'2019/2020',	'567',	'2567',	'2020-10-03',	'123456789',	'24500'),
(5,	'2019/2020',	'567',	'02587',	'2020-03-31',	'123456789',	'6500');

-- 2020-03-18 08:24:39
