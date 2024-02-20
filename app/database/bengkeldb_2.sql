-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 10:21 AM
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
-- Table structure for table `db_account`
--

CREATE TABLE `db_account` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `user_level` varchar(64) NOT NULL DEFAULT 'konsumen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_account`
--

INSERT INTO `db_account` (`id`, `username`, `email`, `password`, `nama`, `user_level`) VALUES
(1, 'fitri_safira', 'fitri@gmail.com', 'Fitri1234', 'Fitri Safira', 'konsumen');

-- --------------------------------------------------------

--
-- Table structure for table `db_barang`
--

CREATE TABLE `db_barang` (
  `id_barang` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `merk_barang` varchar(200) NOT NULL,
  `harga_beli` float NOT NULL,
  `harga_jual` float NOT NULL,
  `stok` int(11) NOT NULL,
  `stok_sisa` int(11) NOT NULL,
  `restok` int(11) NOT NULL,
  `satuan_barang` varchar(32) NOT NULL,
  `image` varchar(200) NOT NULL,
  `tanggal_input` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_barang`
--

INSERT INTO `db_barang` (`id_barang`, `id_kategori`, `nama_barang`, `merk_barang`, `harga_beli`, `harga_jual`, `stok`, `stok_sisa`, `restok`, `satuan_barang`, `image`, `tanggal_input`) VALUES
(1, 1, 'Full Service', 'Mekanik Service', 100000, 100000, 500, 400, 100, 'per-orangan', 'servis-2.jpg', '2024-02-11'),
(2, 3, 'Turun Mesin', 'Mekanik Service', 100000, 100000, 500, 400, 100, 'per-orangan', 'servis-2.jpg', '2024-02-11'),
(3, 2, 'Tune Up', 'Mekanik Service', 100000, 100000, 500, 400, 100, 'per-orangan', 'servis-1.jpg', '11/02/2024'),
(4, 15, 'Motul MULTIGRADE D-TURBO 10W30 4L', 'Oli Motul', 95000, 125000, 500, 300, 100, 'Pcs', 'motul.jpg', '13/02/2024'),
(5, 15, 'Oli Top One HP Plus 10W - 40 Synthetic', 'Oli Top One', 67000, 82500, 500, 300, 97, 'Pcs', 'oli_top_1.jpg', '12/02/2024');

-- --------------------------------------------------------

--
-- Table structure for table `db_kategori`
--

CREATE TABLE `db_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_kategori`
--

INSERT INTO `db_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Service'),
(2, 'Tune Up'),
(3, 'Turun Mesin'),
(4, 'Service Filter'),
(5, 'Service Suspension'),
(6, 'Service Break'),
(7, 'Service Oli'),
(8, 'Service Tyre'),
(9, 'Service Engine'),
(10, 'Service Aki'),
(11, 'Service Clutch'),
(12, 'Filter'),
(13, 'Suspension'),
(14, 'Break'),
(15, 'Oli'),
(16, 'Tyre'),
(17, 'Engine'),
(18, 'Aki'),
(19, 'clutch');

-- --------------------------------------------------------

--
-- Table structure for table `db_kendaraan`
--

CREATE TABLE `db_kendaraan` (
  `id` int(11) NOT NULL,
  `merk_kendaraan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_kendaraan`
--

INSERT INTO `db_kendaraan` (`id`, `merk_kendaraan`) VALUES
(1, 'Acura'),
(2, 'Alfa Romeo'),
(3, 'Aston Martin'),
(4, 'Audi'),
(5, 'Austin'),
(6, 'Apollo Automobil'),
(7, 'Bantley'),
(8, 'BMW'),
(9, 'Buggati'),
(10, 'Chervolet'),
(11, 'Daihatsu'),
(12, 'Datsun'),
(13, 'Esemka'),
(14, 'Ferarri'),
(15, 'Fiat'),
(16, 'Ford'),
(17, 'Volkswagen AG'),
(18, 'Hino'),
(19, 'Hyundai'),
(20, 'Hummer'),
(21, 'Honda'),
(22, 'Hennessey'),
(23, 'Isuzu'),
(24, 'Inova'),
(25, 'Jaguar'),
(26, 'Jeep'),
(27, 'Kia Motors'),
(28, 'Koenigsegg'),
(29, 'Lamborghini'),
(30, 'Land Rover'),
(31, 'Lexus'),
(32, 'Lotus'),
(33, 'Mitsuhbisi'),
(34, 'Maserati'),
(35, 'Nissan'),
(36, 'Pontiac'),
(37, 'Porsche'),
(38, 'Pagani'),
(39, 'Plymouth'),
(40, 'Peugoet'),
(41, 'Proton'),
(42, 'Renault'),
(43, 'Rolls-Royce'),
(44, 'Suzuki'),
(45, 'Saleen'),
(46, 'Shelby'),
(47, 'Subaru'),
(48, 'Tesla'),
(49, 'Timor'),
(50, 'Toyota'),
(51, 'Volkswagen'),
(52, 'Wulling Motors');

-- --------------------------------------------------------

--
-- Table structure for table `db_nota`
--

CREATE TABLE `db_nota` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga_jual` float NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` float NOT NULL,
  `tanggal_input` varchar(32) NOT NULL,
  `periode` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_nota_backup`
--

CREATE TABLE `db_nota_backup` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga_jual` float NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` float NOT NULL,
  `tanggal_input` varchar(32) NOT NULL,
  `periode` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_pengguna`
--

CREATE TABLE `db_pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `user_level` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_pengguna`
--

INSERT INTO `db_pengguna` (`id`, `username`, `email`, `password`, `nama`, `user_level`) VALUES
(1, 'nanda', 'nanda@gmail.com', 'ananda1234', 'nanda', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `db_penjualan`
--

CREATE TABLE `db_penjualan` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga_jual` float NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` float NOT NULL,
  `tanggal_input` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_penjualan_backup`
--

CREATE TABLE `db_penjualan_backup` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga_jual` float NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` float NOT NULL,
  `tanggal_input` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `db_profile`
--

CREATE TABLE `db_profile` (
  `id` int(11) NOT NULL,
  `nama` varchar(180) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `telepon` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_profile`
--

INSERT INTO `db_profile` (`id`, `nama`, `alamat`, `tanggal_lahir`, `telepon`) VALUES
(1, 'Fitri Safira', 'Jl. Kamp Bojong Gede No.12', '2000-02-01', 123456789);

-- --------------------------------------------------------

--
-- Table structure for table `db_reservasi`
--

CREATE TABLE `db_reservasi` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `plat_kendaraan` varchar(64) NOT NULL,
  `merk_kendaraan` varchar(100) NOT NULL,
  `tanggal_input` date NOT NULL,
  `waktu_input` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_reservasi`
--

INSERT INTO `db_reservasi` (`id`, `email`, `plat_kendaraan`, `merk_kendaraan`, `tanggal_input`, `waktu_input`) VALUES
(1, 'fitri@gmail.com', 'B 1254 COW', 'Daihatsu', '2024-02-20', '14:35:00');

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
-- Indexes for table `db_account`
--
ALTER TABLE `db_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_barang`
--
ALTER TABLE `db_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `db_kategori`
--
ALTER TABLE `db_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `db_kendaraan`
--
ALTER TABLE `db_kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_nota`
--
ALTER TABLE `db_nota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `db_nota_backup`
--
ALTER TABLE `db_nota_backup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `db_pengguna`
--
ALTER TABLE `db_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_penjualan`
--
ALTER TABLE `db_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `db_penjualan_backup`
--
ALTER TABLE `db_penjualan_backup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `db_profile`
--
ALTER TABLE `db_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_reservasi`
--
ALTER TABLE `db_reservasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `db_sistem`
--
ALTER TABLE `db_sistem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_account`
--
ALTER TABLE `db_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_barang`
--
ALTER TABLE `db_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `db_kategori`
--
ALTER TABLE `db_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `db_kendaraan`
--
ALTER TABLE `db_kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `db_nota`
--
ALTER TABLE `db_nota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `db_nota_backup`
--
ALTER TABLE `db_nota_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `db_pengguna`
--
ALTER TABLE `db_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_penjualan`
--
ALTER TABLE `db_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `db_penjualan_backup`
--
ALTER TABLE `db_penjualan_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `db_profile`
--
ALTER TABLE `db_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_reservasi`
--
ALTER TABLE `db_reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_sistem`
--
ALTER TABLE `db_sistem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
