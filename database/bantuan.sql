-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 04:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umkm_permits_licensing`
--

-- --------------------------------------------------------

--
-- Table structure for table `bantuan`
--

CREATE TABLE `bantuan` (
  `id` int(11) NOT NULL,
  `id_umkm` int(11) NOT NULL,
  `tanggal` date DEFAULT current_timestamp(),
  `alasan` varchar(255) NOT NULL,
  `dokumen_pendukung` varchar(100) NOT NULL,
  `kebutuhan_dana_nominal` int(11) DEFAULT NULL,
  `kebutuhan_dana_rincian` text DEFAULT NULL,
  `kebutuhan_tenda` tinyint(4) DEFAULT NULL,
  `kebutuhan_gerobak` tinyint(4) DEFAULT NULL,
  `kebutuhan_spanduk` tinyint(4) DEFAULT NULL,
  `kebutuhan_lainnya_ket` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bantuan`
--

INSERT INTO `bantuan` (`id`, `id_umkm`, `tanggal`, `alasan`, `dokumen_pendukung`, `kebutuhan_dana_nominal`, `kebutuhan_dana_rincian`, `kebutuhan_tenda`, `kebutuhan_gerobak`, `kebutuhan_spanduk`, `kebutuhan_lainnya_ket`, `keterangan`, `status`) VALUES
(33, 1, '2023-12-07', 'Saya mengajukan bantuan untuk memperbarui gerobak yang rusak', 'bantuan/dokumen_pendukung/admin1_dokumen_pendukung1272023040044.jpg', 100000, 'Membeli perlengkapan untuk berjualan', 0, 1, 0, '', 'Gerobak yang dibutuhkan adalah gerobak bakso', 2),
(34, 1, '2023-12-07', 'Usaha saya terkena bencana hujan angin hingga roboh', 'bantuan/dokumen_pendukung/admin1_dokumen_pendukung1272023040332.jpg', 1000000, 'Untuk memperbaiki bangunan rusak ', 0, 0, 0, '', '', 2),
(35, 1, '2023-12-07', 'Saya mengajukan bantuan karena baru terkena musibah kebakaran', 'bantuan/dokumen_pendukung/admin1_dokumen_pendukung1272023040539.jpg', 300000, 'Membeli kompor baru untuk berjualan', 0, 0, 0, '', '- ', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bantuan`
--
ALTER TABLE `bantuan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bantuan`
--
ALTER TABLE `bantuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
