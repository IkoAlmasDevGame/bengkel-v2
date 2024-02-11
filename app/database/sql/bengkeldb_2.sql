-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 03:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkeldb_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_sistem`
--

CREATE TABLE `db_sistem` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(180) NOT NULL,
  `jenis` varchar(64) NOT NULL,
  `kepala_perusahaan` varchar(180) NOT NULL,
  `alamat` varchar(180) NOT NULL,
  `hari_operasional` varchar(32) NOT NULL,
  `jam_operasional` varchar(32) NOT NULL,
  `flags` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_sistem`
--

INSERT INTO `db_sistem` (`id`, `nama_perusahaan`, `jenis`, `kepala_perusahaan`, `alamat`, `hari_operasional`, `jam_operasional`, `flags`) VALUES
(1, 'Sahabat Motor Bengkel', 'service', '-', 'Jl. Pegangsaan Dua No.68, RT.8/RW.3, Pegangsaan Dua, Kec. Klp. Gading, Jkt Utara, Daerah Khusus Ibukota Jakarta 14250', 'senin s/d minggu', '08:00 s/d 21:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_sistem`
--
ALTER TABLE `db_sistem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_sistem`
--
ALTER TABLE `db_sistem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
