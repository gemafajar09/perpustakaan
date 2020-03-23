-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Mar 2020 pada 04.44
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

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
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `no_buku` varchar(191) NOT NULL,
  `judul_buku` varchar(191) NOT NULL,
  `pengarang` varchar(191) NOT NULL,
  `kategori` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`no_buku`, `judul_buku`, `pengarang`, `kategori`) VALUES
('02587', 'program', 'ok', 'Buku Pelajaran Umum'),
('2567', 'IPS', 'hasvshdv', 'Buku Mata Pelajaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `no_anggota` varchar(191) NOT NULL,
  `ta` varchar(191) NOT NULL,
  `kelas` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`no_anggota`, `ta`, `kelas`) VALUES
('567', '2019/2020', 'VII'),
('123', '2019/2020', 'VIII');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepsek`
--

CREATE TABLE `kepsek` (
  `id_kepsek` varchar(191) NOT NULL,
  `nama_kepsek` varchar(191) NOT NULL,
  `jabatan` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kepsek`
--

INSERT INTO `kepsek` (`id_kepsek`, `nama_kepsek`, `jabatan`, `username`, `password`) VALUES
('789456', 'kepsek', 'kepsek', 'kepsek', '$2y$10$CtrEKQqX4OxirAjnbUWRAe8RmklbgMd.pXOTEfbODZxBoDA49ZXWm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `tgl_kunjungan` date NOT NULL,
  `no_anggota` varchar(191) NOT NULL,
  `kelas` varchar(191) NOT NULL,
  `id_pegawai` int(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`tgl_kunjungan`, `no_anggota`, `kelas`, `id_pegawai`) VALUES
('2020-03-03', '19.234', 'VII', 9999);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(191) NOT NULL,
  `nama_pegawai` varchar(191) NOT NULL,
  `jabatan` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `jabatan`, `username`, `password`) VALUES
('123456789', 'admin', 'Pustakawan', 'admin', '$2y$10$4/26b68nvpMGTNvnCh1Y/e/X3DQsxebZ654N/YlewZ4i5mhDWC64K'),
('123556', 'nia', 'pustakawan', '123', ''),
('2659958', 'administrator', 'Pustakawan', 'pustaka', '$2y$10$fSHSuPli/BjUjW2jzhqw1u9JUpdF/bwURJQi4lneoOfGExfybWlN6'),
('9898989898', 'bangke', 'pustakawan', 'sibangke', '$2y$10$UJfIJLDwjT3rH.p.CFbxwOsvsPk72QIc7vwNPnlj4uGctT0oLA16O');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sangsi`
--

CREATE TABLE `sangsi` (
  `id_pelanggaran` varchar(3) NOT NULL,
  `sangsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `no_anggota` varchar(191) NOT NULL,
  `nama_siswa` varchar(191) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`no_anggota`, `nama_siswa`, `no_hp`, `username`, `password`) VALUES
('123', 'putra', '082285248130', 'putra', '$2y$10$zDE1IQBVqe3uovRKlVtvkeHZLm.9Vrn0et4Zhz74tDrfmYf3OF77i'),
('567', 'gema', '082122855458', 'fajar', '$2y$10$GbOINlkkXId5hSome.C8Xe1L365hnq9IU5ljpcChkF2uN7CyYuljS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `smsgateway`
--

CREATE TABLE `smsgateway` (
  `sms_id` int(11) NOT NULL,
  `sms_no` varchar(225) NOT NULL,
  `sms_isi` varchar(225) NOT NULL,
  `sms_tgl` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `smsgateway`
--

INSERT INTO `smsgateway` (`sms_id`, `sms_no`, `sms_isi`, `sms_tgl`) VALUES
(13, '082285248130', 'hai putra', '2020-03-20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `terlambat`
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_peminjaman`
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
-- Dumping data untuk tabel `transaksi_peminjaman`
--

INSERT INTO `transaksi_peminjaman` (`id_transaksi`, `ta`, `no_anggota`, `no_buku`, `tgl_pj`, `id_pegawai`) VALUES
(7, '2019/2020', '567', '2567', '2020-03-18', '123456789'),
(10, '2019/2020', '123', '2567', '2020-03-19', '123456789');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_pengembalian`
--

CREATE TABLE `transaksi_pengembalian` (
  `id_transaksi` int(11) NOT NULL,
  `ta` varchar(191) NOT NULL,
  `no_anggota` varchar(191) NOT NULL,
  `no_buku` varchar(191) NOT NULL,
  `tgl_pj` varchar(191) NOT NULL,
  `tgl_pg` varchar(191) NOT NULL,
  `id_pegawai` varchar(191) NOT NULL,
  `denda` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi_pengembalian`
--

INSERT INTO `transaksi_pengembalian` (`id_transaksi`, `ta`, `no_anggota`, `no_buku`, `tgl_pj`, `tgl_pg`, `id_pegawai`, `denda`) VALUES
(2, '2019/2020', '567', '2567', '2020-03-18', '2020-03-20', '123456789', '0'),
(4, '2019/2020', '567', '2567', '2020-03-18', '2020-10-03', '123456789', '24500'),
(5, '2019/2020', '567', '02587', '2020-03-18', '2020-03-31', '123456789', '6500'),
(6, '2019/2020', '123', '2567', '2020-03-19', '2021-04-07', '123456789', '117000'),
(7, '2019/2020', '123', '2567', '2020-03-19', '2020-11-20', '123456789', '48000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`no_buku`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `sangsi`
--
ALTER TABLE `sangsi`
  ADD PRIMARY KEY (`id_pelanggaran`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`no_anggota`);

--
-- Indeks untuk tabel `smsgateway`
--
ALTER TABLE `smsgateway`
  ADD PRIMARY KEY (`sms_id`);

--
-- Indeks untuk tabel `terlambat`
--
ALTER TABLE `terlambat`
  ADD PRIMARY KEY (`id_terlambat`);

--
-- Indeks untuk tabel `transaksi_peminjaman`
--
ALTER TABLE `transaksi_peminjaman`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `transaksi_pengembalian`
--
ALTER TABLE `transaksi_pengembalian`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `smsgateway`
--
ALTER TABLE `smsgateway`
  MODIFY `sms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `terlambat`
--
ALTER TABLE `terlambat`
  MODIFY `id_terlambat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi_peminjaman`
--
ALTER TABLE `transaksi_peminjaman`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `transaksi_pengembalian`
--
ALTER TABLE `transaksi_pengembalian`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
