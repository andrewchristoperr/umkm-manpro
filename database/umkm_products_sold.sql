-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 03:35 AM
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
-- Table structure for table `umkm_products_sold`
--

CREATE TABLE `umkm_products_sold` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `jumlah_terjual` int(11) NOT NULL,
  `umkm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umkm_products_sold`
--

INSERT INTO `umkm_products_sold` (`id`, `date`, `product_id`, `product_name`, `jumlah_terjual`, `umkm_id`) VALUES
(17, '2023-12-07', 0, 'Sinom', 10, 1),
(18, '2023-12-07', 0, 'Sari Dele', 12, 1),
(19, '2023-12-07', 0, 'Kue Putu Ayu', 3, 1),
(20, '2023-12-07', 0, 'Klepon', 6, 1),
(21, '2023-12-07', 0, 'Sari Dele', 10, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `umkm_products_sold`
--
ALTER TABLE `umkm_products_sold`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `umkm_products_sold`
--
ALTER TABLE `umkm_products_sold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
