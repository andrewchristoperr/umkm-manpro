-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 07:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbumkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id` int(11) NOT NULL,
  `formulir` blob NOT NULL,
  `surat_pengantar` blob NOT NULL,
  `ktp` blob NOT NULL,
  `npwp` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id`, `formulir`, `surat_pengantar`, `ktp`, `npwp`) VALUES
(1, 0x4b65637572616e67616e2e706e67, '', '', ''),
(2, 0x4b65637572616e67616e2e706e67, 0x4b65637572616e67616e2e706e67, 0x4b65637572616e67616e2e706e67, 0x4b65637572616e67616e2e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `umkm`
--

CREATE TABLE `umkm` (
  `id` int(11) NOT NULL,
  `nama_owner` varchar(255) NOT NULL,
  `nama_umkm` varchar(255) NOT NULL,
  `notelp_umkm` int(11) NOT NULL,
  `kategori_umkm` varchar(255) NOT NULL,
  `alamat_umkm` varchar(255) NOT NULL,
  `foto_umkm` blob NOT NULL,
  `foto_produk` blob NOT NULL,
  `deskripsi_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `umkm`
--

INSERT INTO `umkm` (`id`, `nama_owner`, `nama_umkm`, `notelp_umkm`, `kategori_umkm`, `alamat_umkm`, `foto_umkm`, `foto_produk`, `deskripsi_produk`) VALUES
(1, 'aa', 'aa', 0, '', 'aa', 0x4b65637572616e67616e2e706e67, 0x4b65637572616e67616e2e706e67, 'aa'),
(2, 'aa', 'aa', 0, '', 'aa', 0x4b65637572616e67616e2e706e67, 0x4b65637572616e67616e2e706e67, 'aa'),
(3, 'aa', 'aa', 0, '', 'aa', 0x4b65637572616e67616e2e706e67, 0x4b65637572616e67616e2e706e67, 'aa'),
(4, 'aa', 'aa', 0, 'makanan dan minuman', 'aa', 0x4b65637572616e67616e2e706e67, 0x4b65637572616e67616e2e706e67, 'aa'),
(5, 'aa', 'aa', 0, 'makanan dan minuman', 'aa', 0x4b65637572616e67616e2e706e67, 0x4b65637572616e67616e2e706e67, 'aa'),
(6, 'aa', 'aa', 0, 'Pilih Kategori', 'aa', 0x4b65637572616e67616e2e706e67, '', ''),
(7, 'aa', 'aa', 0, 'Pilih Kategori', 'aa', 0x4b65637572616e67616e2e706e67, '', ''),
(8, 'aa', 'aa', 0, 'Pilih Kategori', 'aaaaa', 0x4b65637572616e67616e2e706e67, '', ''),
(9, 'aa', 'aa', 0, 'Pilih Kategori', 'aaaaa', 0x4b65637572616e67616e2e706e67, '', ''),
(10, 'aa', 'aa', 0, 'Pilih Kategori', 'aaaaa', 0x4b65637572616e67616e2e706e67, '', ''),
(11, 'aa', 'aa', 0, 'Pilih Kategori', 'aaaaa', 0x4b65637572616e67616e2e706e67, '', ''),
(12, 'bbbb', 'bb', 0, 'makanan dan minuman', 'b', 0x4b65637572616e67616e2e706e67, 0x4b65637572616e67616e2e706e67, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
