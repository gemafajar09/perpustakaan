-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2020 at 03:07 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `no_buku` varchar(191) NOT NULL,
  `judul_buku` varchar(191) NOT NULL,
  `pengarang` varchar(191) NOT NULL,
  `kategori` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`no_buku`, `judul_buku`, `pengarang`, `kategori`) VALUES
('2567', 'IPS', 'hasvshdv', 'Buku Mata Pelajaran');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `no_anggota` varchar(191) NOT NULL,
  `ta` varchar(191) NOT NULL,
  `kelas` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`no_anggota`, `ta`, `kelas`) VALUES
('567', '2019/2020', 'VII');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `tgl_kunjungan` date NOT NULL,
  `no_anggota` varchar(191) NOT NULL,
  `kelas` varchar(191) NOT NULL,
  `id_pegawai` int(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`tgl_kunjungan`, `no_anggota`, `kelas`, `id_pegawai`) VALUES
('2020-03-03', '19.234', 'VII', 9999);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(191) NOT NULL,
  `nama_pegawai` varchar(191) NOT NULL,
  `jabatan` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `jabatan`, `username`, `password`) VALUES
('123556', 'nia', 'pustakawan', '123', ''),
('9898989898', 'bangke', 'pustakawan', 'sibangke', '$2y$10$UJfIJLDwjT3rH.p.CFbxwOsvsPk72QIc7vwNPnlj4uGctT0oLA16O');

-- --------------------------------------------------------

--
-- Table structure for table `sangsi`
--

CREATE TABLE `sangsi` (
  `id_pelanggaran` varchar(3) NOT NULL,
  `sangsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `no_anggota` varchar(191) NOT NULL,
  `nama_siswa` varchar(191) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`no_anggota`, `nama_siswa`, `no_hp`, `password`) VALUES
('567', 'yulia', '08342', '');

-- --------------------------------------------------------

--
-- Table structure for table `terlambat`
--

CREATE TABLE `terlambat` (
  `id_terlambat` int(11) NOT NULL,
  `no_anggota` varchar(191) NOT NULL,
  `tgl_pj` date NOT NULL,
  `no_buku` varchar(191) NOT NULL,
  `tgl_pg` date NOT NULL,
  `id_pelanggaran` varchar(191) NOT NULL,
  `id_pegawai` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terlambat`
--

INSERT INTO `terlambat` (`id_terlambat`, `no_anggota`, `tgl_pj`, `no_buku`, `tgl_pg`, `id_pelanggaran`, `id_pegawai`) VALUES
(1, '19.123', '2020-03-03', '9999', '2020-03-09', '01', '9999999');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_peminjaman`
--

CREATE TABLE `transaksi_peminjaman` (
  `id_transaksi` int(11) NOT NULL,
  `ta` varchar(191) NOT NULL,
  `no_anggota` varchar(191) NOT NULL,
  `no_buku` varchar(191) NOT NULL,
  `tgl_pj` varchar(191) NOT NULL,
  `id_pegawai` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_peminjaman`
--

INSERT INTO `transaksi_peminjaman` (`id_transaksi`, `ta`, `no_anggota`, `no_buku`, `tgl_pj`, `id_pegawai`) VALUES
(1, '2019/2020', '19.234', '1234', '2020-03-04', '555555');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pengembalian`
--

CREATE TABLE `transaksi_pengembalian` (
  `id_transaksi` int(11) NOT NULL,
  `ta` varchar(191) NOT NULL,
  `no_anggota` varchar(191) NOT NULL,
  `no_buku` varchar(191) NOT NULL,
  `tgl_pg` varchar(191) NOT NULL,
  `id_pegawai` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_pengembalian`
--

INSERT INTO `transaksi_pengembalian` (`id_transaksi`, `ta`, `no_anggota`, `no_buku`, `tgl_pg`, `id_pegawai`) VALUES
(1, '2019/2020', '19.342', '567', '2020-03-02', '1223');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`no_buku`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `sangsi`
--
ALTER TABLE `sangsi`
  ADD PRIMARY KEY (`id_pelanggaran`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`no_anggota`);

--
-- Indexes for table `terlambat`
--
ALTER TABLE `terlambat`
  ADD PRIMARY KEY (`id_terlambat`);

--
-- Indexes for table `transaksi_peminjaman`
--
ALTER TABLE `transaksi_peminjaman`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_pengembalian`
--
ALTER TABLE `transaksi_pengembalian`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `terlambat`
--
ALTER TABLE `terlambat`
  MODIFY `id_terlambat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi_peminjaman`
--
ALTER TABLE `transaksi_peminjaman`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi_pengembalian`
--
ALTER TABLE `transaksi_pengembalian`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
