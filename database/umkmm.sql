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
-- Table structure for table `umkmm`
--

CREATE TABLE `umkmm` (
  `id` int(11) NOT NULL,
  `tanggal_pendaftaran` date NOT NULL DEFAULT current_timestamp(),
  `username` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `nama_umkm` varchar(300) NOT NULL,
  `notelp_umkm` varchar(12) NOT NULL,
  `alamat_umkm` varchar(300) NOT NULL,
  `kecamatan` varchar(300) NOT NULL,
  `foto_umkm` varchar(500) NOT NULL,
  `kategori_umkm` varchar(300) NOT NULL,
  `deskripsi_umkm` varchar(500) NOT NULL,
  `formulir` varchar(300) NOT NULL,
  `surat_pengantar` varchar(300) NOT NULL,
  `ktp` varchar(300) NOT NULL,
  `npwp` varchar(300) NOT NULL,
  `verification_status` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `umkmm`
--

INSERT INTO `umkmm` (`id`, `tanggal_pendaftaran`, `username`, `email`, `password`, `nama_umkm`, `notelp_umkm`, `alamat_umkm`, `kecamatan`, `foto_umkm`, `kategori_umkm`, `deskripsi_umkm`, `formulir`, `surat_pengantar`, `ktp`, `npwp`, `verification_status`) VALUES
(1, '2023-12-06', 'admin1', 'c14210076@john.petra.ac.id', '$2y$10$ETBLEWazy9aPM.wLkKMWO.u747zC2z7ly9g52QDpKm5/72apr0oO6', 'Pandan Wangi', '08123879732', 'Jln Siwalankerto', 'Wonocolo', 'register/foto_umkm/admin1_foto_umkm.jpg', 'Makanan dan Minuman', 'UMKM ini berjualan makanan dan minuman sehat', 'register/formulir/admin1_formulir.pdf', 'register/surat_pengantar/admin1_surat_pengantar.pdf', 'register/ktp/admin1_ktp.pdf', 'register/npwp/admin1_npwp.pdf', 1),
(2, '2023-12-06', 'admin2', 'c14210076@john.petra.ac.id', '$2y$10$PoUL.TSP/OqiWoW6iJ7umedp7XbcvSR6xoKf1Y3OA46lelW0eerce', 'Maju Terus', '0817827886', 'Jln Siwalankerto', 'Asemrowo', 'register/foto_umkm/admin2_foto_umkm.jpg', 'Fashion dan Pakaian', 'UMKM ini berjualan fashion dan pakaian unik', 'register/formulir/admin2_formulir.pdf', 'register/surat_pengantar/admin2_surat_pengantar.pdf', 'register/ktp/admin2_ktp.pdf', 'register/npwp/admin2_npwp.pdf', 1),
(3, '2023-12-06', 'admin3', 'c14210076@john.petra.ac.id', '$2y$10$qk0KFBNVBbViVirrJwkYSuFKaLys7/iFijYvQiVPJ/Qarkj5LgEWa', 'Maju Mundur', '08123879732', 'Jln Siwalankerto', 'Bulak', 'register/foto_umkm/admin3_foto_umkm.jpg', 'Kerajinan Tangan', 'UMKM ini berjualan berbagai macam kerajinan tangan', 'register/formulir/admin3_formulir.pdf', 'register/surat_pengantar/admin3_surat_pengantar.pdf', 'register/ktp/admin3_ktp.pdf', 'register/npwp/admin3_npwp.pdf', 1),
(4, '2023-12-06', 'superadmin', '', '$2y$10$WUzVrRR0F9HaF4K4R5rrc.OX7uIkIJMoaNPiYQhR.fL2XdToPVD8m', '', '', '', '', '', '', '', '', '', '', '', 3),
(5, '2023-12-06', 'admin4', 'c14210076@john.petra.ac.id', '$2y$10$dJzQk2IlVYyWlQb1EhTX.O7/L.2fEdsvNeqRk7SCenv1Sexjne8JK', 'IT 123', '08123879732', 'Jln Siwalankerto', 'Bubutan', 'register/foto_umkm/admin4_foto_umkm.jpg', 'Jasa', 'Jika anda membutuhkan jasa IT, UMKM kami menyediakan berbagai macam jasa.', 'register/formulir/jasa it_formulir.pdf', 'register/surat_pengantar/jasa it_surat_pengantar.pdf', 'register/ktp/jasa it_ktp.pdf', 'register/npwp/jasa it_npwp.pdf', 0),
(6, '2023-12-06', 'admin5', 'c14210076@john.petra.ac.id', '$2y$10$kVo.s1j9vz8KsHrTF3qc4eN.vOAGk9G4hgXFfDg3vc80u71EP/zu6', 'Otomotif', '0817827886', 'Jln Siwalankerto', 'Dukuh Pakis', 'register/foto_umkm/admin5_foto_umkm.jpg', 'Otomotif', 'Bengkel', 'register/formulir/admin5_formulir.pdf', 'register/surat_pengantar/admin5_surat_pengantar.pdf', 'register/ktp/admin5_ktp.pdf', 'register/npwp/admin5_npwp.pdf', 0),
(7, '2023-12-06', 'admin6', 'c14210076@john.petra.ac.id', '$2y$10$sMsR0XJ8fOr/FElUKNzcDOoPk5iYJ.vFRQPea9bVU7SzVm.soy27i', 'Semar Wangi', '08123879732', 'Jln Siwalankerto', 'Rungkut', 'register/foto_umkm/admin6_foto_umkm.jpg', 'Makanan dan Minuman', 'UMKM ini berjualan jus buah yang segar', 'register/formulir/admin6_formulir.pdf', 'register/surat_pengantar/admin6_surat_pengantar.pdf', 'register/ktp/admin6_ktp.pdf', 'register/npwp/admin6_npwp.pdf', 2),
(8, '2023-12-06', 'admin7', 'c14210076@john.petra.ac.id', '$2y$10$/zIgFPMjIX1gKQDv7vZrnOL//wbDjd/cRcqG2UjAIlXGR6ioRajC6', 'Tampak Jaya', '0817827886', 'Jln Siwalankerto', 'Lakarsantri', 'register/foto_umkm/admin7_foto_umkm.jpg', 'Makanan dan Minuman', 'UMKM ini berjualan berbagai macam snack dan minuman', 'register/formulir/admin7_formulir.pdf', 'register/surat_pengantar/admin7_surat_pengantar.pdf', 'register/ktp/admin7_ktp.pdf', 'register/npwp/admin7_npwp.pdf', 2),
(9, '2023-12-06', 'admin8', 'c14210076@john.petra.ac.id', '$2y$10$sBUvMJhaESumHHY/fre5ZuSDIPKfb.biDkC6mfk2yXOXhLxWONaMi', 'Top Markotop', '08123879732', 'Jln Siwalankerto', 'Gubeng', 'register/foto_umkm/admin8_foto_umkm.jpg', 'Makanan dan Minuman', 'Jual Keripik Kentang', 'register/formulir/admin8_formulir.pdf', 'register/surat_pengantar/admin8_surat_pengantar.pdf', 'register/ktp/admin8_ktp.pdf', 'register/npwp/admin8_npwp.pdf', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `umkmm`
--
ALTER TABLE `umkmm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `umkmm`
--
ALTER TABLE `umkmm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
