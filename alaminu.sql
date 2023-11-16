-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 03:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alaminu`
--

-- --------------------------------------------------------

--
-- Table structure for table `belajar_mandiri`
--

CREATE TABLE `belajar_mandiri` (
  `id_belajarmandiri` char(10) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` time NOT NULL,
  `guru` varchar(20) NOT NULL,
  `id_rps` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_pengguna`
--

CREATE TABLE `data_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `no_wa` char(13) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_program` char(10) NOT NULL,
  `id_pembayaran` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pengguna`
--

INSERT INTO `data_pengguna` (`id_pengguna`, `nama`, `email`, `username`, `password`, `no_wa`, `jenis_kelamin`, `status`, `id_program`, `id_pembayaran`) VALUES
(1, 'admin fajar', 'fajargans@gmail.com', 'fajri', '123456', '083853964821', 'Laki-laki', 'admin', 'PR01', 'P001'),
(2, 'ari al ayubi', 'ayubikuari@gmail.com', 'ayub', '12345', '085232736651', 'Laki-laki', 'siswa', 'PR02', 'P002'),
(4, 'sholi', 'sholi@gmail.com', 'choll', '12', '083853964821', 'laki-laki', 'siswa', 'PR05', 'P002');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `bayar` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pembayaran` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_program`
--

CREATE TABLE `detail_program` (
  `id_mapel` char(10) NOT NULL,
  `id_program` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` char(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` time NOT NULL,
  `id_mapel` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` char(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `soal` varchar(20) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama`, `soal`, `image`) VALUES
('0001', 'Matematika', 'math.pdf', ''),
('0002', 'IPA', 'ipa.pdf', ''),
('0003', 'Bahasa Inggris', 'inggris.pdf', ''),
('0004', 'Bahasa Indonesia', 'bahasa.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `id_mentor` char(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_wa` char(13) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentor`
--

INSERT INTO `mentor` (`id_mentor`, `nama`, `jenis_kelamin`, `no_wa`, `image`) VALUES
('0001', 'Mis Maya', 'wanita', '080111222333', ''),
('0002', 'Mr Fajar', 'pria', '081234567890', ''),
('0003', 'Mr Sholi', 'pria', '081234567890', ''),
('0004', 'Mr Bagus', 'pria', '087654000433', ''),
('0005', 'Mr Firman', 'pria', '088765777981', '');

-- --------------------------------------------------------

--
-- Table structure for table `paket_program`
--

CREATE TABLE `paket_program` (
  `id_program` char(10) NOT NULL,
  `nama_program` varchar(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `id_mapel` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paket_program`
--

INSERT INTO `paket_program` (`id_program`, `nama_program`, `harga`, `id_mapel`) VALUES
('PR01', '9 SMP', 500000, '0001'),
('PR02', '1 SMA', 550000, '0002'),
('PR03', '2 SMA', 550000, '0001'),
('PR04', '3 SMA', 600000, '0001'),
('PR05', 'Perguruan Tinggi', 650000, '0001');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` char(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `status`) VALUES
('P001', 'Lunas'),
('P002', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `rps`
--

CREATE TABLE `rps` (
  `id_rps` char(10) NOT NULL,
  `materi` varchar(20) NOT NULL,
  `soal` varchar(20) NOT NULL,
  `link_youtube` varchar(20) NOT NULL,
  `id_jadwal` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tatap_muka`
--

CREATE TABLE `tatap_muka` (
  `id_tatapmuka` char(10) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` time NOT NULL,
  `guru` varchar(20) NOT NULL,
  `id_rps` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `belajar_mandiri`
--
ALTER TABLE `belajar_mandiri`
  ADD PRIMARY KEY (`id_belajarmandiri`),
  ADD KEY `id_rps` (`id_rps`);

--
-- Indexes for table `data_pengguna`
--
ALTER TABLE `data_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_program` (`id_program`),
  ADD KEY `id_pembayaran` (`id_pembayaran`);

--
-- Indexes for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD KEY `id_pembayaran` (`id_pembayaran`);

--
-- Indexes for table `detail_program`
--
ALTER TABLE `detail_program`
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_program` (`id_program`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`id_mentor`);

--
-- Indexes for table `paket_program`
--
ALTER TABLE `paket_program`
  ADD PRIMARY KEY (`id_program`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `rps`
--
ALTER TABLE `rps`
  ADD PRIMARY KEY (`id_rps`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `tatap_muka`
--
ALTER TABLE `tatap_muka`
  ADD PRIMARY KEY (`id_tatapmuka`),
  ADD KEY `id_rps` (`id_rps`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pengguna`
--
ALTER TABLE `data_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `belajar_mandiri`
--
ALTER TABLE `belajar_mandiri`
  ADD CONSTRAINT `belajar_mandiri_ibfk_1` FOREIGN KEY (`id_rps`) REFERENCES `rps` (`id_rps`);

--
-- Constraints for table `data_pengguna`
--
ALTER TABLE `data_pengguna`
  ADD CONSTRAINT `data_pengguna_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `paket_program` (`id_program`),
  ADD CONSTRAINT `data_pengguna_ibfk_2` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`);

--
-- Constraints for table `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD CONSTRAINT `detail_pembayaran_ibfk_1` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`);

--
-- Constraints for table `detail_program`
--
ALTER TABLE `detail_program`
  ADD CONSTRAINT `detail_program_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`),
  ADD CONSTRAINT `detail_program_ibfk_2` FOREIGN KEY (`id_program`) REFERENCES `paket_program` (`id_program`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`);

--
-- Constraints for table `paket_program`
--
ALTER TABLE `paket_program`
  ADD CONSTRAINT `paket_program_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`);

--
-- Constraints for table `rps`
--
ALTER TABLE `rps`
  ADD CONSTRAINT `rps_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`);

--
-- Constraints for table `tatap_muka`
--
ALTER TABLE `tatap_muka`
  ADD CONSTRAINT `tatap_muka_ibfk_1` FOREIGN KEY (`id_rps`) REFERENCES `rps` (`id_rps`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
