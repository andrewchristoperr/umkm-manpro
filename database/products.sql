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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `nama_produk` varchar(300) NOT NULL,
  `deskripsi_produk` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(300) NOT NULL,
  `umkm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `nama_produk`, `deskripsi_produk`, `harga_produk`, `foto_produk`, `umkm_id`) VALUES
(1, 'bambu', 0, 212121, '0', 5),
(2, 'bibibi', 0, 12345, '0', 5),
(3, 'haleluya', 0, 100000, '0', 5),
(4, 'babi', 0, 12122, '0', 5),
(5, 'babi', 0, 111222, '0', 5),
(6, 'babi', 0, 111222, 'produk/5_babi_fotoProduk.png', 5),
(7, 'andrew', 0, 30000, 'produk/5_andrew_fotoProduk.png', 5),
(8, 'andrew', 0, 30000, 'produk/5_andrew_fotoProduk.png', 5),
(9, 'prisil', 0, 50000, 'produk/5_prisil_fotoProduk.png', 5),
(10, 'emly', 0, 20000, 'produk/5_emly_fotoProduk.png', 5),
(11, 'gisel', 0, 909090909, 'produk/5_gisel_fotoProduk.png', 5),
(12, 'gisel', 0, 909090909, 'produk/5_gisel_fotoProduk.png', 5),
(13, 'vincent', 0, 12345, 'produk/5_vincent_fotoProduk.png', 5),
(14, 'lalala', 0, 12345, 'produk/5_lalala_fotoProduk.png', 5),
(15, 'cahyadfi', 0, 12345, 'produk/5_cahyadfi_fotoProduk.png', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
