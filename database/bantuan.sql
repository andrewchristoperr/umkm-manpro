-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1


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
  `dokumen_pendukung` longblob NOT NULL,
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
--
-- Indexes for dumped tables
--
INSERT INTO `bantuan` (`id`, `id_umkm`, `tanggal`, `alasan`, `dokumen_pendukung`, `kebutuhan_dana_nominal`, `kebutuhan_dana_rincian`, `kebutuhan_tenda`, `kebutuhan_gerobak`, `kebutuhan_spanduk`, `kebutuhan_lainnya_ket`, `keterangan`, `status`) VALUES
(1, 1, '2023-11-26', '', '', 0, '', 0, NULL, NULL, '', '', 2),
(2, 1, '2023-11-26', '', '', 0, '', 0, NULL, NULL, '', '', 2),
(3, 2, '2023-11-26', '', '', 0, '', 0, NULL, NULL, '', '', 2),
(4, 2, '2023-11-26', '', '', 0, '', 0, NULL, NULL, '', '', 1),
(5, 1, '2023-11-26', 'sakdkalad', 0x433a5c66616b65706174685c6265726974612d312e6a7067, 0, '', 0, 0, 0, '', 'mamama', 0),
(6, 1, '2023-11-26', 'asdnaka', 0x433a5c66616b65706174685c6265726974612d312e6a7067, 0, '', 0, 0, 0, '', 'sss', 0),
(7, 1, '2023-11-26', 'skskks', 0x433a5c66616b65706174685c6265726974612d312e6a7067, 0, '', 1, 0, 1, '', '', 0),
(8, 1, '2023-11-26', 'adakkas', 0x433a5c66616b65706174685c6265726974612d312e6a7067, 24998, 'untuk makan makan', 0, 0, 0, 'tidur', '', 0),
(9, 1, '2023-11-30', 'Membutuhkan dana tambahan untuk membeli stok makanan serta memperbaiki gerobak bakso dalam rangka mengikuti bazzar 17 Agustus ', 0x433a5c66616b65706174685c6d657373616765496d6167655f313730303634353131363539362e6a7067, 500000, '1. Membeli Daging Sapi  10kg  Rp 350.000\n2. Membeli Kulit Siomay  10pack Rp 50.0000\n3. Membeli Tahu Sutra  10 pack Rp 100.000', 0, 1, 0, '', 'Membutuhkan 1 gerobak bakso tambahan untuk dapat berkeliling saat bazzar ', 0);
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
