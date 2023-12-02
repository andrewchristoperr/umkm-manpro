-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 08:14 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umkmm`
--

INSERT INTO `umkmm` (`id`, `tanggal_pendaftaran`, `username`, `email`, `password`, `nama_umkm`, `notelp_umkm`, `alamat_umkm`, `kecamatan`, `foto_umkm`, `kategori_umkm`, `deskripsi_umkm`, `formulir`, `surat_pengantar`, `ktp`, `npwp`, `verification_status`) VALUES
(1, '2023-11-30', 'admin1', 'c14210076@john.petra.ac.id', 'admin123', 'Pandan Wangi', '0817827886', 'Jln Siwalankerto', 'Wonocolo', '????\0JFIF\0\0\0\0\0\0??\0?\0\n\Z!\Z\Z\Z# #\Z\Z! !  ,# (##%5$(,.323!7<70;+12.1(#(91111111111111111111111111111111111111111111111111??\0\0?\"\0??\0\0\0\0\0\0\0\0\0\0\0\0\0??\0I\0	\0!\01AQ\"aq2B????#??Rbr??C?3????4?$cs??????S??\0\0\0\0\0\0\0\0\0\0\0\0\0\0??\0(\0\0\0\0\0\0\0\0!1\"2AQaqB?????\0\0\0?\0_3>??uz2~l1?L?h?)PzA???j)?k??|B??????\'n?#Ù???G捋??#\Z?*n?R?J@ݎ?A>?v??W^-??Ӧ??i???B??L?\0?Iż?	???Z??v*?L\0=?<?o˖U????v`[A??TU?of??o', 'pertanian dan peternakan', 'UMKM tentang pertanian dan peternakan', 'C:fakepathumkm1.jpg', 'C:fakepathumkm1.jpg', 'C:fakepathumkm1.jpg', 'C:fakepathumkm1.jpg', 0),
(2, '2023-11-30', 'admin2', 'c14210076@john.petra.ac.id', 'admin123', 'Batik Berkah', '0817827886', 'Jln Siwalankerto', 'Rungkut', '????\0JFIF\0\0\0\0\0\0??\0C\0\n\n\n\r\r??\0C		\r\r??\0&8\"\0??\0\0\0\0\0\0\0\0\0\0\0	\n??\0?\0\0\0}\0!1AQa\"q2???#B??R??$3br?	\n\Z%&\'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz???????????????????????????????????????????????????????????????????????????\0\0\0\0\0\0\0\0	\n??\0?\0\0w\0!1AQaq\"2?B????	#3R?br?\n$4?%?\Z&\'()*5', 'fashion dan pakaian', 'UMKM ini berjualan berbagai macam baju batik untuk pria dan wanita', 'C:fakepathumkm2.jpg', 'C:fakepathumkm2.jpg', 'C:fakepathumkm2.jpg', 'C:fakepathumkm2.jpg', 1),
(3, '2023-11-30', 'admin3', 'c14210076@john.petra.ac.id', 'admin123', 'Jasjus', '0817827886', 'Jln Siwalankerto', 'Asemrowo', '????\0JFIF\0\0\0\0\0\0??\0?\0\n\Z\Z\Z!\Z\Z\Z!!.%!+$\Z\'8&+/1555$;@;4?.4511\'$+64446=44444444444444446444444444444444444444444444??\0\0?\"\0??\0\0\0\0\0\0\0\0\0\0\0\0\0\0??\0H\0\0\0\0!1AQ\"aq2?????BRb?#r????$??Scs?34C⃣?????\0\0\0\0\0\0\0\0\0\0\0\0\0\0??\0)\0\0\0\0\0\0\0!1A\"Qaq?2B?????\0\0\0?\0?W?mq?Y???ʺ\'aL???{??:?b?j?DU??f<??\0?Z^???A?\0U?f?ؗf?TG?:?L)??2r??e֊(????y??jnn, ??Z?}q??\\????_ݡ??\r??????\\??[?i6/?\0ӹ?5?XRCb?>)?U^?m', 'makanan dan minuman', 'Kami berjualan berbagai macam jus buah-buahan yang segar', 'C:fakepathumkm3.jpg', 'C:fakepathumkm3.jpg', 'C:fakepathumkm3.jpg', 'C:fakepathumkm3.jpg', 1),
(4, '2023-11-30', 'admin4', 'c14210076@john.petra.ac.id', 'admin123', 'Kreatif Karya', '0817827886', 'Jln Siwalankerto', 'Dukuh Pakis', '????\0JFIF\0\0\0\0\0\0??\0;CREATOR: gd-jpeg v1.0 (using IJG JPEG v62), quality = 60\n??\0C\0\r	\n\n\r\n\r \' .)10.)-,3:J>36F7,-@WAFLNRSR2>ZaZP`JQRO??\0C&&O5-5OOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO??\0??\"\0??\0\0\0\0\0\0\0\0\0\0\0	\n??\0?\0\0\0}\0!1AQa\"q2???#B??R??$3br?	\n\Z%&\'()*456789:CDEFGHIJSTUVWXYZcdefghijstuvwxyz???????????????????????????????????????????????????????????????????????????\0\0\0\0\0\0\0\0	\n??\0?\0', 'kerajinan tangan', 'UMKM kami berjualan beraneka ragam kerajinan tangan yang unik dan menarik dengan harga yang murah meriah.', 'C:fakepathumkm5.jpg', 'C:fakepathumkm5.jpg', 'C:fakepathumkm5.jpg', 'C:fakepathumkm5.jpg', 1),
(5, '2023-11-30', 'admin5', 'c14210076@john.petra.ac.id', 'admin123', 'Maju Terus', '0812345678', 'Jln. Siwalankerto', 'Rungkut', '????\0Exif\0\0II*\0\0\0\0\0\0\0\0\0\0\0\0??\0Ducky\0\0\0\0\0<\0\0??ohttp://ns.adobe.com/xap/1.0/\0<?xpacket begin=\"﻿\" id=\"W5M0MpCehiHzreSzNTczkc9d\"?> <x:xmpmeta xmlns:x=\"adobe:ns:meta/\" x:xmptk=\"Adobe XMP Core 5.3-c011 66.145661, 2012/02/06-14:56:27        \"> <rdf:RDF xmlns:rdf=\"http://www.w3.org/1999/02/22-rdf-syntax-ns#\"> <rdf:Description rdf:about=\"\" xmlns:xmpMM=\"http://ns.adobe.com/xap/1.0/mm/\" xmlns:stRef=\"http://ns.adobe.com/xap/1.0/sType/ResourceRef#\" xmlns:xmp=\"http://ns.adobe.com/xap/1.0/\" xmpMM:Original', 'Makanan dan Minuman', '', '', '', '', '', 1),
(6, '2023-11-30', 'superadmin', '', 'admin123', '', '', '', '', '', '', '', '', '', '', '', 1),
(9, '2023-12-01', 'admingisel', 'gichelleaurelia5758@gmail.com', '1234abcde', 'aaaa', '0812345678', 'Jl. Siwalankerto 120', 'Sambikerep', 'C:fakepathMBTI_c14210039.png', 'makanan dan minuman', '', 'C:fakepathMBTI_c14210039 (2).png', 'C:fakepathMBTI_c14210039 (2).png', 'C:fakepathMBTI_c14210039 (2).png', 'C:fakepathMBTI_c14210039 (2).png', 0),
(16, '2023-12-02', 'c14210039', 'gichelleaurelia5758@gmail.com', 'qwer1234', 'manjalita', '0812345678', 'Jl. Siwalankerto 120', 'Asemrowo', 'register/foto_umkm/foto_umkm.png', 'makanan dan minuman', '', 'register/formulir/formulir.png', 'register/surat_pengantar/surat_pengantar.png', 'register/ktp/ktp.png', 'register/npwp/npwp.png', 0),
(17, '2023-12-02', 'user1', 'gichelleaurelia5758@gmail.com', '1234qwer', 'manjalita', '0812345678', 'Jl. Siwalankerto 120', 'Asemrowo', 'register/foto_umkm/foto_umkm.png', 'makanan dan minuman', '', 'register/formulir/formulir.png', 'register/surat_pengantar/surat_pengantar.png', 'register/ktp/ktp.png', 'register/npwp/npwp.png', 0),
(18, '2023-12-02', 'c14210039a', 'gichelleaurelia5758@gmail.com', '1234qwer', 'manjalita', '0812345678', 'Jl. Siwalankerto 120', 'Asemrowo', 'register/foto_umkm/foto_umkm.png', 'makanan dan minuman', 'asdw', 'register/formulir/formulir.png', 'register/surat_pengantar/surat_pengantar.png', 'register/ktp/ktp.png', 'register/npwp/npwp.png', 0),
(19, '2023-12-02', 'c14210039', 'gichelleaurelia5758@gmail.com', '1234qwer', 'manjalita', '0812345678', 'Jl. Siwalankerto 120', 'Asemrowo', 'register/foto_umkm/foto_umkm.png', 'makanan dan minuman', '', 'register/formulir/formulir.png', 'register/surat_pengantar/surat_pengantar.png', 'register/ktp/ktp.png', 'register/npwp/npwp.png', 0),
(21, '2023-12-02', 'c14210039', 'gichelleaurelia5758@gmail.com', '1234qwer', '12345', '0812345678', 'Jl. Siwalankerto 120', 'Asemrowo', 'register/foto_umkm/foto_umkm.png', 'makanan dan minuman', 'awd', 'register/formulir/formulir.png', 'register/surat_pengantar/surat_pengantar.png', 'register/ktp/ktp.png', 'register/npwp/npwp.png', 0),
(22, '2023-12-02', 'c14210039', 'gichelleaurelia5758@gmail.com', '12qw12qw', 'manjalita', '0812345678', 'Jl. Siwalankerto 120', 'Asemrowo', 'register/foto_umkm/foto_umkm.png', 'makanan dan minuman', '', 'register/formulir/formulir.png', 'register/surat_pengantar/surat_pengantar.png', 'register/ktp/ktp.png', 'register/npwp/npwp.png', 0),
(23, '2023-12-02', 'user1', 'gichelleaurelia5758@gmail.com', 'qaws1234', '12345', '0812345678', 'Jl. Siwalankerto 120', 'Mulyorejo', 'register/foto_umkm/foto_umkm.png', 'makanan dan minuman', '', 'register/formulir/formulir.png', 'register/surat_pengantar/surat_pengantar.png', 'register/ktp/ktp.png', 'register/npwp/npwp.png', 0),
(24, '2023-12-02', 'user11', 'gichelleaurelia5758@gmail.com', '1212qwqw', 'manjalita', '0812345678', 'Jl. Siwalankerto 120', 'Kenjeran', 'register/foto_umkm/foto_umkm.png', 'makanan dan minuman', '', 'register/formulir/formulir.png', 'register/surat_pengantar/surat_pengantar.png', 'register/ktp/ktp.png', 'register/npwp/npwp.png', 0),
(25, '2023-12-02', 'user11', 'gichelleaurelia5758@gmail.com', '1212qwqw', 'aa', '0812345678', 'Jl. Siwalankerto 120', 'Asemrowo', 'register/foto_umkm/foto_umkm.png', 'makanan dan minuman', '123', 'register/formulir/formulir.png', 'register/surat_pengantar/surat_pengantar.png', 'register/ktp/ktp.png', 'register/npwp/npwp.png', 0),
(26, '2023-12-02', 'c14210039', 'gichelleaurelia5758@gmail.com', '1212qwqw', 'manjalita', '0812345678', 'Jl. Siwalankerto 120', 'Asemrowo', 'register/foto_umkm/foto_umkm.png', 'makanan dan minuman', '', 'register/formulir/formulir.png', 'register/surat_pengantar/surat_pengantar.png', 'register/ktp/ktp.png', 'register/npwp/npwp.png', 0),
(27, '2023-12-02', 'user112', 'gichelleaurelia5758@gmail.com', '1212qwqw', 'manjalita', '0812345678', 'Jl. Siwalankerto 120', 'Asemrowo', 'register/foto_umkm/foto_umkm.png', 'makanan dan minuman', '', 'register/formulir/formulir.png', 'register/surat_pengantar/surat_pengantar.png', 'register/ktp/ktp.png', 'register/npwp/npwp.png', 0),
(28, '2023-12-02', 'userlast', 'gichelleaurelia5758@gmail.com', '1212qwqw', 'manjalita', '0812345678', 'Jl. Siwalankerto 120', 'Pakal', 'register/foto_umkm/userlast_foto_umkm.png', 'makanan dan minuman', '', 'register/formulir/userlast_formulir.png', 'register/surat_pengantar/userlast_surat_pengantar.png', 'register/ktp/userlast_ktp.png', 'register/npwp/userlast_npwp.png', 0),
(29, '2023-12-02', 'c14210039gisel', 'gichelleaurelia5758@gmail.com', '123advsw', '12345', '0812345678', 'Jl. Siwalankerto 120', 'Benowo', 'register/foto_umkm/c14210039gisel_foto_umkm.png', 'makanan dan minuman', '', 'register/formulir/c14210039gisel_formulir.png', 'register/surat_pengantar/c14210039gisel_surat_pengantar.png', 'register/ktp/c14210039gisel_ktp.png', 'register/npwp/c14210039gisel_npwp.png', 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
