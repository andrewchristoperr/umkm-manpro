-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 04:14 PM
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
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `umkm`
--

CREATE TABLE `umkm` (
  `id` int(11) NOT NULL,
  `nama_umkm` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `alamat_umkm` text NOT NULL,
  `kategori_umkm` varchar(255) NOT NULL,
  `notelp_umkm` varchar(20) NOT NULL,
  `foto_umkm` text NOT NULL,
  `formulir` text NOT NULL,
  `surat_pengantar` text NOT NULL,
  `ktp` text NOT NULL,
  `npwp` text NOT NULL,
  `file_pbb_path` text NOT NULL,
  `verification_status` int(11) NOT NULL,
  `owner_user_id` int(11) NOT NULL,
  `verified_by_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `umkmm`
--

CREATE TABLE `umkmm` (
  `id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `nama_umkm` varchar(300) NOT NULL,
  `notelp_umkm` varchar(12) NOT NULL,
  `alamat_umkm` varchar(300) NOT NULL,
  `kecamatan` varchar(300) NOT NULL,
  `foto_umkm` varchar(300) NOT NULL,
  `kategori_umkm` varchar(300) NOT NULL,
  `deskripsi_umkm` varchar(500) NOT NULL,
  `formulir` varchar(300) NOT NULL,
  `surat_pengantar` varchar(300) NOT NULL,
  `ktp` varchar(300) NOT NULL,
  `npwp` varchar(300) NOT NULL,
  `verification_status` varchar(300) NOT NULL,
  `verification_by_admin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umkmm`
--

INSERT INTO `umkmm` (`id`, `username`, `email`, `password`, `nama_umkm`, `notelp_umkm`, `alamat_umkm`, `kecamatan`, `foto_umkm`, `kategori_umkm`, `deskripsi_umkm`, `formulir`, `surat_pengantar`, `ktp`, `npwp`, `verification_status`, `verification_by_admin`) VALUES
(1, 'root', '', '', '', '', '', '', '', '', '', 'C:fakepathpasar.jpg', 'C:fakepathpasar.jpg', 'C:fakepathpasar.jpg', 'C:fakepathpasar.jpg', '', 0),
(2, '', '', '', '', '', '', '', '', '', '', 'C:fakepathpasar.jpg', 'C:fakepathpasar.jpg', 'C:fakepathpasar.jpg', 'C:fakepathpasar.jpg', '', 0),
(3, 'admin', '', '', 'manjalita', '0812345678', 'Jl. Siwalankerto 120', '', 'C:fakepathpasar.jpg', 'fashion dan pakaian', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'C:fakepathpasar.jpg', 'C:fakepathpasar2.jpg', 'C:fakepathpasar.jpg', 'C:fakepathpasar2.jpg', '', 0),
(4, '', '', '', '', '', '', '', '', '', '', 'C:fakepathpasar.jpg', 'C:fakepathpasar.jpg', 'C:fakepathpasar.jpg', 'C:fakepathpasar2.jpg', '', 0),
(5, 'c14210039', '', '', 'manjalita', '0812345678', 'Jl. Siwalankerto 120', '', 'C:fakepathpasar.jpg', 'fashion dan pakaian', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'C:fakepathpasar.jpg', 'C:fakepathpasar2.jpg', 'C:fakepathpasar.jpg', 'C:fakepathpasar2.jpg', '', 0),
(6, 'c14210039a', '', '', 'aa', '0812345678', 'Jl. Siwalankerto 120', '', 'C:fakepathsection-title-bg.png', 'fashion dan pakaian', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'C:fakepathpasar.jpg', 'C:fakepathpasar2.jpg', 'C:fakepathpasar.jpg', 'C:fakepathpasar.jpg', '', 0),
(7, 'c14210039assss', '', '', 'manjalita', '0812345678', 'aa', '', 'C:fakepathsection-title-bg.png', 'fashion dan pakaian', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'C:fakepathpasar.jpg', 'C:fakepathpasar2.jpg', 'C:fakepathpasar.jpg', 'C:fakepathpasar2.jpg', '', 0),
(8, 'c14210039ass', '', '', 'manjalita', '000000000', 'Jl. Siwalankerto 120', '', 'C:fakepathpasar2.jpg', 'jasa', 'dddddddddddddd', 'C:fakepathpasar.jpg', 'C:fakepathpasar2.jpg', 'C:fakepathpasar.jpg', 'C:fakepathsection-title-bg.png', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `umkm_monthly_income`
--

CREATE TABLE `umkm_monthly_income` (
  `id` int(50) NOT NULL,
  `income` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `umkm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `umkm_products`
--

CREATE TABLE `umkm_products` (
  `id` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` bigint(20) NOT NULL,
  `photo_url` text NOT NULL,
  `umkm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `umkm_ratings`
--

CREATE TABLE `umkm_ratings` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `timestamp` datetime NOT NULL,
  `umkm_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo_url` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_umkm_favorites`
--

CREATE TABLE `user_umkm_favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `umkm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_UMKM_OWNER_USER_ID` (`owner_user_id`),
  ADD KEY `FK_UMKM_VERIFIED_BY_USER_ID` (`verified_by_user_id`);

--
-- Indexes for table `umkmm`
--
ALTER TABLE `umkmm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `umkm_monthly_income`
--
ALTER TABLE `umkm_monthly_income`
  ADD PRIMARY KEY (`id`),
  ADD KEY `umkm_id` (`umkm_id`);

--
-- Indexes for table `umkm_products`
--
ALTER TABLE `umkm_products`
  ADD KEY `FK_UMKM_PRODUCTS_UMKM_ID` (`umkm_id`);

--
-- Indexes for table `umkm_ratings`
--
ALTER TABLE `umkm_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_RATINGS_UMKM_ID` (`umkm_id`),
  ADD KEY `FK_RATINGS_USER_ID` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_umkm_favorites`
--
ALTER TABLE `user_umkm_favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_FAVORITES_USER_ID` (`user_id`),
  ADD KEY `FK_FAVORITES_UMKM_ID` (`umkm_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `umkmm`
--
ALTER TABLE `umkmm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `umkm_monthly_income`
--
ALTER TABLE `umkm_monthly_income`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `umkm_ratings`
--
ALTER TABLE `umkm_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_umkm_favorites`
--
ALTER TABLE `user_umkm_favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `umkm`
--
ALTER TABLE `umkm`
  ADD CONSTRAINT `FK_UMKM_OWNER_USER_ID` FOREIGN KEY (`owner_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_UMKM_VERIFIED_BY_USER_ID` FOREIGN KEY (`verified_by_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `umkm_monthly_income`
--
ALTER TABLE `umkm_monthly_income`
  ADD CONSTRAINT `umkm_monthly_income_ibfk_1` FOREIGN KEY (`umkm_id`) REFERENCES `umkm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `umkm_products`
--
ALTER TABLE `umkm_products`
  ADD CONSTRAINT `FK_UMKM_PRODUCTS_UMKM_ID` FOREIGN KEY (`umkm_id`) REFERENCES `umkm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `umkm_ratings`
--
ALTER TABLE `umkm_ratings`
  ADD CONSTRAINT `FK_RATINGS_UMKM_ID` FOREIGN KEY (`umkm_id`) REFERENCES `umkm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RATINGS_USER_ID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_umkm_favorites`
--
ALTER TABLE `user_umkm_favorites`
  ADD CONSTRAINT `FK_FAVORITES_UMKM_ID` FOREIGN KEY (`umkm_id`) REFERENCES `umkm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_FAVORITES_USER_ID` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
