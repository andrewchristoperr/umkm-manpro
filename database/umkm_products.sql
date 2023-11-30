-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 07:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `umkm_products`
--

CREATE TABLE `umkm_products` (
  `id` varchar(100) NOT NULL,
  `tahun` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` bigint(20) NOT NULL,
  `jumlah_terjual` int(11) NOT NULL,
  `photo_url` text NOT NULL,
  `umkm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umkm_products`
--

INSERT INTO `umkm_products` (`id`, `tahun`, `name`, `description`, `price`, `jumlah_terjual`, `photo_url`, `umkm_id`) VALUES
('1', 2022, 'Keranjang Bambu', 'Keranjang bambu elegan ini merupakan solusi fungsional dan berkelanjutan untuk menyimpan dan mengorganisir barang-barang kecil di rumah Anda, sementara desain anyamannya memberikan sentuhan alami dan estetika yang menawan.', 65000, 7, 'assets/img/produk/produk4.jpg', 5),
('2', 2022, 'Piring Bambu', 'Piring bambu ini adalah alternatif ramah lingkungan untuk menyajikan hidangan Anda dengan gaya. Dibuat dengan kehalusan dan daya tahan, piring bambu memberikan nuansa alami pada meja makan Anda, sementara juga mendukung gaya hidup berkelanjutan.', 25000, 12, 'assets/img/produk/produk8.jpg', 5),
('3', 2022, 'Lampu Bambu', 'Lampu bambu unik ini tidak hanya memberikan pencahayaan lembut dan hangat, tetapi juga menjadi pernyataan artistik dengan detail anyaman yang indah, menciptakan atmosfer yang tenang dan penuh karakter di setiap ruangan.', 128000, 3, 'assets/img/produk/produk6.jpg', 5),
('4', 2022, 'Tas Slempang Bambu', 'Tas slempang bambu yang ringan dan stylish ini adalah aksesori fashion yang ramah lingkungan, cocok untuk segala kesempatan. Desainnya yang ergonomis dan tahan lama membuatnya menjadi pilihan sempurna untuk gaya sehari-hari dengan sentuhan alami yang khas.', 99000, 2, 'assets/img/produk/produk3.jpg', 5),
('6', 2023, 'Keranjang Bambu', 'Keranjang bambu elegan ini merupakan solusi fungsional dan berkelanjutan untuk menyimpan dan mengorganisir barang-barang kecil di rumah Anda, sementara desain anyamannya memberikan sentuhan alami dan estetika yang menawan.', 65000, 16, 'assets/img/produk/produk4.jpg', 5),
('6', 2023, 'Piring Bambu', 'Piring bambu ini adalah alternatif ramah lingkungan untuk menyajikan hidangan Anda dengan gaya. Dibuat dengan kehalusan dan daya tahan, piring bambu memberikan nuansa alami pada meja makan Anda, sementara juga mendukung gaya hidup berkelanjutan.', 25000, 21, 'assets/img/produk/produk8.jpg', 5),
('7', 2023, 'Lampu Bambu', 'Lampu bambu unik ini tidak hanya memberikan pencahayaan lembut dan hangat, tetapi juga menjadi pernyataan artistik dengan detail anyaman yang indah, menciptakan atmosfer yang tenang dan penuh karakter di setiap ruangan.', 128000, 9, 'assets/img/produk/produk6.jpg', 5),
('8', 2023, 'Tas Slempang Bambu', 'Tas slempang bambu yang ringan dan stylish ini adalah aksesori fashion yang ramah lingkungan, cocok untuk segala kesempatan. Desainnya yang ergonomis dan tahan lama membuatnya menjadi pilihan sempurna untuk gaya sehari-hari dengan sentuhan alami yang khas.', 99000, 15, 'assets/img/produk/produk3.jpg', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `umkm_products`
--
ALTER TABLE `umkm_products`
  ADD KEY `FK_UMKM_PRODUCTS_UMKM_ID` (`umkm_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
