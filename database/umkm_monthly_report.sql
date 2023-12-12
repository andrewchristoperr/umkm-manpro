-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 03:27 AM
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
(21, 1, '2023-01-01', 500000, 675000, 430000),
(22, 1, '2023-02-01', 550000, 720000, 450000),
(23, 1, '2023-03-01', 600000, 700000, 480000),
(24, 1, '2023-04-01', 500000, 690000, 500000),
(25, 1, '2023-05-01', 750000, 900000, 520000),
(26, 1, '2023-06-01', 750000, 650000, 410000),
(27, 1, '2023-07-01', 800000, 500000, 580000),
(28, 1, '2023-08-01', 850000, 950000, 600000),
(29, 1, '2023-09-01', 900000, 830000, 450000),
(30, 1, '2023-10-01', 700000, 500000, 450000),
(31, 1, '2023-11-01', 950000, 950000, 650000),
(32, 1, '2023-12-01', 980000, 1000000, 700000),
(33, 1, '2022-01-01', 400000, 300000, 230000),
(34, 1, '2022-02-01', 500000, 240000, 200000),
(35, 1, '2022-03-01', 300000, 150000, 300000),
(36, 1, '2022-04-01', 400000, 410000, 350000),
(37, 1, '2022-05-01', 450000, 400000, 300000),
(38, 1, '2022-06-01', 550000, 550000, 290000),
(39, 1, '2022-07-01', 590000, 500000, 480000),
(40, 1, '2022-08-01', 500000, 400000, 200000),
(41, 1, '2022-09-01', 480000, 330000, 350000),
(42, 1, '2022-10-01', 450000, 300000, 360000),
(43, 1, '2022-11-01', 400000, 350000, 300000),
(44, 1, '2022-12-01', 470000, 500000, 310000);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
