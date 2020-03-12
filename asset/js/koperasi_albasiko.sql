-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 04, 2020 at 06:51 AM
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
(1, 'Rusman Kasim', '085363229539', 'Padang', '25d55ad283aa400af464c76d713c07ad', 'pemilik@pemilik.com', '2'),
(2, 'Jakimin', '08129029293', 'Padang', '25d55ad283aa400af464c76d713c07ad', 'admin@admin.com', '1');

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
  `jenis_kelamin` varchar(191) NOT NULL,
  `nohp` varchar(30) NOT NULL,
  `alamat` varchar(191) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nik`, `tempat_lahir`, `tgl_lahir`, `pekerjaan`, `nama_lengkap`, `agama`, `jenis_kelamin`, `nohp`, `alamat`, `email`, `level`) VALUES
(1, '1310111526106', 'Padang', '1996-06-15', 'Petani', 'Rian Wahyudi', '', 'laki-laki', '085677567568', 'paddang candu, kinali', 'wahyudi@gmail.com', 3),
(2, '1368698686090', 'Bukit Gading', '2020-02-26', 'Petani', 'Rafi Sehendra', 'Islam', 'laki-laki', '085677567568', 'padang  barat', 'rafisahendra07@gmail.com', 3),
(3, '1310676767676', 'padang', '1990-10-06', 'Programer', 'Gema Fajar', '', 'laki-laki', '085345445454', 'Padang Timur', 'gema@mailinator.com', 3),
(4, '13101152610730', 'Jambi', '1996-02-24', 'Programmer', 'Dani Andesva', '', 'laki-laki', '081290292932', 'Padang Candu Pasaman', 'daniandesva@gmail.com', 3);

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
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keuangan_perusahaan`
--

INSERT INTO `keuangan_perusahaan` (`id_keuangan`, `debit`, `kredit`) VALUES
(1, 50000000, 0);

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
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `id_angsuran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_withdraw`
--
ALTER TABLE `detail_withdraw`
  MODIFY `id_penarikan` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_master_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran_angsuran`
--
ALTER TABLE `pembayaran_angsuran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penyimpanan`
--
ALTER TABLE `penyimpanan`
  MODIFY `id_penyimpanan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
