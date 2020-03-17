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


DROP TABLE IF EXISTS `kelas_siswa`;
CREATE TABLE `kelas_siswa` (
  `no_anggota` varchar(191) NOT NULL,
  `ta` varchar(191) NOT NULL,
  `kelas` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `kunjungan`;
CREATE TABLE `kunjungan` (
  `tgl_kunjungan` date NOT NULL,
  `no_anggota` varchar(191) NOT NULL,
  `kelas` varchar(191) NOT NULL,
  `id_pegawai` int(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `pegawai`;
CREATE TABLE `pegawai` (
  `id_pegawai` varchar(191) NOT NULL,
  `nama_pegawai` varchar(191) NOT NULL,
  `jabatan` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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
('567',	'yulia',	'08342',	'',	'');

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


DROP TABLE IF EXISTS `transaksi_pengembalian`;
CREATE TABLE `transaksi_pengembalian` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `ta` varchar(191) NOT NULL,
  `no_anggota` varchar(191) NOT NULL,
  `no_buku` varchar(191) NOT NULL,
  `tgl_pg` varchar(191) NOT NULL,
  `id_pegawai` varchar(191) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2020-03-17 09:16:10
