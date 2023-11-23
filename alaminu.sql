-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2023 at 03:55 AM
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
  `id_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pengguna`
--

INSERT INTO `data_pengguna` (`id_pengguna`, `nama`, `email`, `username`, `password`, `no_wa`, `jenis_kelamin`, `status`, `id_program`, `id_pembayaran`) VALUES
(1, 'M fajar Dwi Putra', 'mfajardwip044@gmail.com', 'fajar', '123456', '089131242555', 'laki-laki', 'siswa', 'PR05', 4),
(2, 'Sholiudin', 'choll@gmail.com', 'choll', '123456', '083853964821', 'laki-laki', 'admin', 'PR01', 1);

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
  `id_mapel` char(10) NOT NULL,
  `id_mentor` char(10) NOT NULL,
  `id_module` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `jam`, `id_mapel`, `id_mentor`, `id_module`) VALUES
('JD001', 'senin', '09:05:54', '0001', '0001', 'RPS01');

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
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id_module` char(10) NOT NULL,
  `nama_module` varchar(20) NOT NULL,
  `materi` varchar(20) NOT NULL,
  `soal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id_module`, `nama_module`, `materi`, `soal`) VALUES
('RPS01', 'Matematic', 'Persamaan Linear', 'sdgdhtdgvre');

-- --------------------------------------------------------

--
-- Table structure for table `paket_program`
--

CREATE TABLE `paket_program` (
  `id_program` char(10) NOT NULL,
  `nama_program` varchar(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `id_mapel` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paket_program`
--

INSERT INTO `paket_program` (`id_program`, `nama_program`, `harga`, `deskripsi`, `id_mapel`) VALUES
('PR01', '9 SMP', 500000, 'ini adalah bimbingan anak kelas 3 smp', '0001'),
('PR02', '1 SMA', 550000, 'ini adalah bimbingan anak kelas 1 SMA', '0002'),
('PR03', '2 SMA', 550000, 'ini adalah bimbingan anak kelas 2 SMA\r\n', '0001'),
('PR04', '3 SMA', 600000, 'ini adalah bimbingan BELAJAR anak kelas 3 SMA', '0001'),
('PR05', 'Perguruan Tinggi', 650000, 'ini adalah bimbingan belajar siswa yang ingi masuk ke Perguruan Tinggi', '0001');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `bayar` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_program` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `bayar`, `status`, `id_program`) VALUES
(1, 500000, 'lunas', 'PR01'),
(2, 500000, 'lunas', 'PR01'),
(3, 600000, 'lunas', 'PR03'),
(4, 650000, 'lunas', 'PR05');

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
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `jadwal_ibfk_2` (`id_mentor`),
  ADD KEY `jadwal_ibfk_3` (`id_module`);

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
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`);

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
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_program` (`id_program`);

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
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `belajar_mandiri`
--
ALTER TABLE `belajar_mandiri`
  ADD CONSTRAINT `belajar_mandiri_ibfk_1` FOREIGN KEY (`id_rps`) REFERENCES `module` (`id_module`);

--
-- Constraints for table `data_pengguna`
--
ALTER TABLE `data_pengguna`
  ADD CONSTRAINT `data_pengguna_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `paket_program` (`id_program`),
  ADD CONSTRAINT `data_pengguna_ibfk_2` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`);

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
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_mentor`) REFERENCES `mentor` (`id_mentor`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);

--
-- Constraints for table `paket_program`
--
ALTER TABLE `paket_program`
  ADD CONSTRAINT `paket_program_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `paket_program` (`id_program`);

--
-- Constraints for table `tatap_muka`
--
ALTER TABLE `tatap_muka`
  ADD CONSTRAINT `tatap_muka_ibfk_1` FOREIGN KEY (`id_rps`) REFERENCES `module` (`id_module`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
