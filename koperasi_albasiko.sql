-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 12, 2020 at 02:04 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi_albasiko`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nohp` varchar(30) NOT NULL,
  `alamat` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `nohp`, `alamat`, `password`, `email`, `level`) VALUES
(1, 'Sukarno', '085363229539', 'Padang', '25d55ad283aa400af464c76d713c07ad', 'pimpinan@pimpinan.com', '2'),
(2, 'Mia lestari', '08129029293', 'Padang', '25d55ad283aa400af464c76d713c07ad', 'admin@admin.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `tempat_lahir` varchar(191) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pekerjaan` varchar(191) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `tgl_registrasi` date NOT NULL,
  `jenis_kelamin` varchar(191) NOT NULL,
  `nohp` varchar(30) NOT NULL,
  `alamat` varchar(191) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nik`, `tempat_lahir`, `tgl_lahir`, `pekerjaan`, `nama_lengkap`, `agama`, `tgl_registrasi`, `jenis_kelamin`, `nohp`, `alamat`, `email`, `level`) VALUES
(1, '1310111526106', 'Padang', '1996-06-15', 'Petani', 'Rian Wahyudi', 'Islam', '2020-03-12', 'laki-laki', '085677567568', 'padang candu, kinali raya', 'wahyudi@gmail.com', 3),
(2, '1368698686090', 'Bukit Gading', '2020-02-26', 'Petani', 'Rafi Sehendra', 'Islam', '2020-03-12', 'laki-laki', '085677567568', 'padang  barat', 'rafisahendra07@gmail.com', 3),
(3, '1310676767676', 'padang', '1990-10-06', 'Programer', 'Gema Fajar', 'Islam', '2020-03-12', 'laki-laki', '085345445454', 'Padang Timur', 'gema@mailinator.com', 3),
(5, '13106767676760', 'Padang candu', '1995-03-28', 'Petani', 'Juli Eka saputra', 'Kristen', '0000-00-00', 'laki-laki', '085677567568', ' jalan lima purut', 'Juli@mailinator.net', 3);

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `id_angsuran` int(11) NOT NULL,
  `id_peminjaman` varchar(191) NOT NULL,
  `angsuran_ke` int(11) NOT NULL,
  `batas_bayar` date NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `id_peminjaman`, `angsuran_ke`, `batas_bayar`, `jumlah_bayar`, `status`) VALUES
(1, '5e6a0b758f622', 1, '2020-04-12', 262500, 1),
(2, '5e6a0b758f622', 2, '2020-05-12', 262500, 1),
(3, '5e6a0b758f622', 3, '2020-06-12', 262500, 1),
(4, '5e6a0b758f622', 4, '2020-07-12', 262500, 0),
(5, '5e6a0b758f622', 5, '2020-08-12', 262500, 0),
(6, '5e6a0b758f622', 6, '2020-09-12', 262500, 0),
(7, '5e6a0b758f622', 7, '2020-10-12', 262500, 0),
(8, '5e6a0b758f622', 8, '2020-11-12', 262500, 0),
(9, '5e6a0b758f622', 9, '2020-12-12', 262500, 0),
(10, '5e6a0b758f622', 10, '2021-01-12', 262500, 0),
(11, '5e6a0b758f622', 11, '2021-02-12', 262500, 0),
(12, '5e6a0b758f622', 12, '2021-03-12', 262500, 0),
(13, '5e6a0be7c4d7b', 1, '2020-04-12', 210000, 1),
(14, '5e6a0be7c4d7b', 2, '2020-05-12', 210000, 1),
(15, '5e6a0be7c4d7b', 3, '2020-06-12', 210000, 1),
(16, '5e6a0be7c4d7b', 4, '2020-07-12', 210000, 1),
(17, '5e6a0be7c4d7b', 5, '2020-08-12', 210000, 1),
(18, '5e6a0be7c4d7b', 6, '2020-09-12', 210000, 1),
(19, '5e6a0be7c4d7b', 7, '2020-10-12', 210000, 1),
(20, '5e6a0be7c4d7b', 8, '2020-11-12', 210000, 1),
(21, '5e6a0be7c4d7b', 9, '2020-12-12', 210000, 1),
(22, '5e6a0be7c4d7b', 10, '2021-01-12', 210000, 1),
(23, '5e6a12f4e70d7', 1, '2020-04-12', 700000, 1),
(24, '5e6a12f4e70d7', 2, '2020-05-12', 700000, 1),
(25, '5e6a12f4e70d7', 3, '2020-06-12', 700000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_withdraw`
--

CREATE TABLE `detail_withdraw` (
  `id_penarikan` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `Jumlah_penarikan` int(11) NOT NULL,
  `tanggal_penarikan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_withdraw`
--

INSERT INTO `detail_withdraw` (`id_penarikan`, `id_anggota`, `id_kategori`, `Jumlah_penarikan`, `tanggal_penarikan`) VALUES
(1, 1, 5, 100000, '2020-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kode_layanan` varchar(25) NOT NULL,
  `nama_kategori` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kode_layanan`, `nama_kategori`) VALUES
(3, 'K001', 'Simpanan Wajib'),
(5, 'K002', 'Simpanan Pokok');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan_perusahaan`
--

CREATE TABLE `keuangan_perusahaan` (
  `id_keuangan` int(11) NOT NULL,
  `debit` bigint(11) NOT NULL,
  `kredit` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keuangan_perusahaan`
--

INSERT INTO `keuangan_perusahaan` (`id_keuangan`, `debit`, `kredit`) VALUES
(1, 49997987500, 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_transaksi`
--

CREATE TABLE `master_transaksi` (
  `id_master_transaksi` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `debit_simwajib` int(11) NOT NULL,
  `debit_simpokok` int(11) NOT NULL,
  `kredit_peminjaman` int(11) NOT NULL,
  `bunga_peminjaman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_transaksi`
--

INSERT INTO `master_transaksi` (`id_master_transaksi`, `id_anggota`, `debit_simwajib`, `debit_simpokok`, `kredit_peminjaman`, `bunga_peminjaman`) VALUES
(1, 1, 200000, 220000, 0, 0),
(2, 2, 100000, 150000, 2000000, 0),
(3, 3, 0, 0, 5000000, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_angsuran`
--

CREATE TABLE `pembayaran_angsuran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_angsuran` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `status_pembayaran` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran_angsuran`
--

INSERT INTO `pembayaran_angsuran` (`id_pembayaran`, `id_angsuran`, `tanggal_bayar`, `jumlah_bayar`, `status_pembayaran`) VALUES
(1, 13, '2020-03-12', 210000, 'Sudah Dibayar'),
(2, 14, '2020-03-12', 210000, 'Sudah Dibayar'),
(3, 15, '2020-03-12', 210000, 'Sudah Dibayar'),
(4, 16, '2020-03-12', 210000, 'Sudah Dibayar'),
(5, 17, '2020-03-12', 210000, 'Sudah Dibayar'),
(6, 18, '2020-03-12', 210000, 'Sudah Dibayar'),
(7, 19, '2020-03-12', 210000, 'Sudah Dibayar'),
(8, 20, '2020-03-12', 210000, 'Sudah Dibayar'),
(9, 21, '2020-03-12', 210000, 'Sudah Dibayar'),
(10, 22, '2020-03-12', 210000, 'Sudah Dibayar'),
(11, 1, '2020-03-12', 262500, 'Sudah Dibayar'),
(12, 2, '2020-03-12', 262500, 'Sudah Dibayar'),
(13, 23, '2020-03-12', 700000, 'Sudah Dibayar'),
(14, 24, '2020-03-12', 700000, 'Sudah Dibayar'),
(15, 25, '2020-03-12', 700000, 'Sudah Dibayar'),
(16, 3, '2020-03-12', 262500, 'Sudah Dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(191) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `jumlah_pinjaman` int(11) NOT NULL,
  `lama_pinjaman` int(11) NOT NULL,
  `bunga_pinjaman` int(11) NOT NULL,
  `besar_angsuran` int(11) NOT NULL,
  `biaya_administrasi` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_anggota`, `jumlah_pinjaman`, `lama_pinjaman`, `bunga_pinjaman`, `besar_angsuran`, `biaya_administrasi`, `keterangan`, `tanggal_pinjam`, `status`) VALUES
('5e6a0b758f622', 3, 3000000, 12, 5, 262500, 10000, 'Untuk Keperluan Biaya Petanian', '2020-03-12', 0),
('5e6a0be7c4d7b', 3, 2000000, 10, 5, 210000, 10000, 'Untuk pupuk Pertanian', '2020-03-12', 1),
('5e6a12f4e70d7', 2, 2000000, 3, 5, 700000, 10000, 'Untuk pupuk Pertanian', '2020-03-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penyimpanan`
--

CREATE TABLE `penyimpanan` (
  `id_penyimpanan` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `jumlah_simpanan` int(11) NOT NULL,
  `tanggal_simpanan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyimpanan`
--

INSERT INTO `penyimpanan` (`id_penyimpanan`, `id_anggota`, `id_kategori`, `jumlah_simpanan`, `tanggal_simpanan`) VALUES
(1, 1, 3, 100000, '2020-03-12'),
(2, 2, 3, 100000, '2020-03-12'),
(3, 1, 5, 250000, '2020-03-12'),
(4, 1, 3, 100000, '2020-03-12'),
(5, 2, 5, 150000, '2020-03-12'),
(6, 1, 5, 70000, '2020-03-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`id_angsuran`);

--
-- Indexes for table `detail_withdraw`
--
ALTER TABLE `detail_withdraw`
  ADD PRIMARY KEY (`id_penarikan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keuangan_perusahaan`
--
ALTER TABLE `keuangan_perusahaan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indexes for table `master_transaksi`
--
ALTER TABLE `master_transaksi`
  ADD PRIMARY KEY (`id_master_transaksi`);

--
-- Indexes for table `pembayaran_angsuran`
--
ALTER TABLE `pembayaran_angsuran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `penyimpanan`
--
ALTER TABLE `penyimpanan`
  ADD PRIMARY KEY (`id_penyimpanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id_angsuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `detail_withdraw`
--
ALTER TABLE `detail_withdraw`
  MODIFY `id_penarikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keuangan_perusahaan`
--
ALTER TABLE `keuangan_perusahaan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_transaksi`
--
ALTER TABLE `master_transaksi`
  MODIFY `id_master_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran_angsuran`
--
ALTER TABLE `pembayaran_angsuran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `penyimpanan`
--
ALTER TABLE `penyimpanan`
  MODIFY `id_penyimpanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
