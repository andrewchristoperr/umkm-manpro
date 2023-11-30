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
-- Table structure for table `umkm_monthly_report`
--

CREATE TABLE `umkm_monthly_report` (
  `id` int(11) NOT NULL,
  `umkm_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `omzet` bigint(20) NOT NULL,
  `pendapatan` bigint(20) NOT NULL,
  `pengeluaran` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umkm_monthly_report`
--

INSERT INTO `umkm_monthly_report` (`id`, `umkm_id`, `date`, `omzet`, `pendapatan`, `pengeluaran`) VALUES
(1, 5, '2023-09-01', 3000000, 200000000, 20000),
(2, 5, '2023-01-01', 100000, 1500000, 1000000),
(3, 5, '2023-02-01', 7600000, 450000, 2310000),
(4, 5, '2023-03-01', 1550000, 1200000, 1100000),
(5, 5, '2023-04-01', 7600000, 450000, 110000),
(6, 5, '2023-05-01', 3050000, 1440000, 2300000),
(7, 5, '2023-06-01', 1400000, 245000000, 2100000),
(8, 5, '2023-07-01', 22000000, 18000000, 11000000),
(9, 5, '2023-08-01', 18000000, 15000000, 9000000),
(10, 5, '2022-06-01', 100000, 200000000, 1100000),
(11, 5, '2022-05-01', 5500000, 6550000, 404000),
(12, 5, '2022-01-01', 6500000, 8450000, 4200000),
(13, 5, '2022-02-01', 7850000, 9400000, 5320000),
(14, 5, '2022-03-01', 4300000, 4500000, 3900000),
(15, 5, '2023-04-01', 3420000, 4000000, 3850000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `umkm_monthly_report`
--
ALTER TABLE `umkm_monthly_report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `umkm_monthly_report`
--
ALTER TABLE `umkm_monthly_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
