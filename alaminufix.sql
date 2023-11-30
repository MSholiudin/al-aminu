-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Nov 2023 pada 01.12
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alaminufix`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cicilan`
--

CREATE TABLE `cicilan` (
  `id_pengguna` int(11) NOT NULL,
  `id_pembayaran` int(10) NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `tanggal_nyicil` datetime NOT NULL DEFAULT current_timestamp(),
  `nyicil` int(20) NOT NULL,
  `status` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cicilan`
--

INSERT INTO `cicilan` (`id_pengguna`, `id_pembayaran`, `bulan`, `tanggal_nyicil`, `nyicil`, `status`) VALUES
(1, 1, 'januari', '2023-11-29 16:07:20', 100000, 'done'),
(1, 1, 'februari', '2023-11-29 20:40:26', 100000, 'done'),
(1, 1, 'januari', '2023-11-29 20:44:55', 100000, 'done'),
(1, 1, 'maret', '2023-11-29 20:46:07', 100000, 'done'),
(1, 1, 'januari', '2023-11-30 06:23:11', 0, 'done'),
(1, 1, 'januari', '2023-11-30 06:24:40', 0, 'done'),
(1, 1, 'januari', '2023-11-30 06:25:22', 0, 'done'),
(1, 1, 'januari', '2023-11-30 06:28:54', 100000, 'done');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pengguna`
--

CREATE TABLE `data_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `no_wa` char(13) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_program` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pengguna`
--

INSERT INTO `data_pengguna` (`id_pengguna`, `nama`, `email`, `username`, `password`, `no_wa`, `jenis_kelamin`, `status`, `id_program`) VALUES
(1, 'M fajar Dwi Putra', 'mfajardwip044@gmail.com', 'fajar', '123456', '089131242555', 'laki-laki', 'siswa', 'PR05'),
(2, 'Sholiudin', 'choll@gmail.com', 'choll', '123456', '083853964821', 'laki-laki', 'admin', 'PR01'),
(3, 'M fajar Dwi Putra', 'fajardwiputra1212@gmail.com', 'choll', '123', '089131242555', 'laki-laki', 'siswa', 'PR01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_program`
--

CREATE TABLE `detail_program` (
  `id_mapel` char(10) NOT NULL,
  `id_program` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` char(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` time NOT NULL,
  `id_module` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `jam`, `id_module`) VALUES
('001', 'Senin', '13:00:00', 'MD01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` char(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `image` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama`, `image`) VALUES
('MP01', 'Matematika', 0x89504e470d0a1a0a0000000d4948445200000040000000400806000000aa6971de000000097048597300002c4b00002c4b01a53d96a9000000017352474200aece1ce90000000467414d410000b18f0bfc6105000002df494441547801ed9a81719b301486bf74826c90b741bd41e9044d3760837803bb13381bd011da099c4ee074029309d20da85e800bf6d99640088bc077f75fee224be83d494fd2831b86e3d6e8dee88bd1c248aaff29ff8c72a367a33f46bfaaff7d08c46863f46a54b45056d51d2d3aba6a78e1a91523448cf6f81b5f6bcf886683aeef3e8d6f3a6141e408618c1fcd4c08697cd309b744c88af0c6d7da1019827be7b7464b0ea7b2aeed9476334888880c7b87f51cb074686b89db99e19148d0f5e8627c9b08bec0ee8457228905297607b88cfc314b8776532220c31eb5bbb2b5b49de1c927fcb14ded1f74e7377ecf1e04db5af5e9a4608f035edce04f41d867046dbf8f25306afa70802d717147776ccbc73b69d28703724bf977ba6373408e277d38e0afa5fc1bdd5959ca9f8980943007a10787765322408fa32ec7d6be8fc205115d8bf562e2721f7099090fb8199f111182bdc3cda371cae18cd0faea9c6d8b7684c87099057d694d84e87ad4d10d6dfc9e8811269e1455269d16af1126fc62a4c91a7fe335b846990677458c7ed2ce683d073c32c0a8f7910f70a57e3d9e187d6642afc7676666e22574105cf0fe3dd05df557aa3239fa6d4e19f8ea80f84219147302263efa74401de535c227f47f6a53273c51ee12b563ae4e42f9aa5a4f6ac5c0da55cf4e1898846e5f7d85d49e324112f4ae90d22e61712dede83957e89aa28a4d7b5f47245c676d8770c4fd39234fed021acd57744b65dbc81b3af55c9510e612a4972b7d537d70c738768050ae73c10f7dc813e59695d36ddbd280a60e4978df5a7dafc5b9d157cef445f09bf2eab8256123f182f6d9e3534b428e1b16ba195f1b7d8d8485d07d67525b0ffa9cb5a85c272b12e241689f74d9342bbb565a13777a4a68e788442bb98cfe9671252585f24064b3ebed5bc39dcb8f46ca1a7b2cb08efcd8511bceda68fb402267fcbc5c2a9c3f9262e24cde017a17282e94e79467fa319370610bb739e0c333c70026ceec0026ceec0026ce7f0d408dd5f7de3ef20000000049454e44ae426082);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mentor`
--

CREATE TABLE `mentor` (
  `id_mentor` char(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_wa` char(13) NOT NULL,
  `id_mapel` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mentor`
--

INSERT INTO `mentor` (`id_mentor`, `nama`, `jenis_kelamin`, `no_wa`, `id_mapel`) VALUES
('01', 'Miss Maya', 'perempuan', '081234567891', 'MP01'),
('02', 'Mr Fajar', 'Laki-laki', '083853964713', 'MP01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `module`
--

CREATE TABLE `module` (
  `id_module` char(10) NOT NULL,
  `nama_module` varchar(20) NOT NULL,
  `materi` varchar(50) NOT NULL,
  `id_mapel` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `module`
--

INSERT INTO `module` (`id_module`, `nama_module`, `materi`, `id_mapel`) VALUES
('MD01', 'Aljabar Linier', 'kasdnidjoqjdqh', 'MP01'),
('MD02', 'Matematika Diskrit', 'mddlsfmlw', 'MP01'),
('MD03', 'Matematika Terapan', 'kasdnidjoqjdqh', 'MP01'),
('MD04', 'Himpunan Fuzi', 'ghkhjldjlkjajoie', 'MP01'),
('MD05', 'Himpunan Fuzi', 'ghkhjldjlkjajoie', 'MP01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_program`
--

CREATE TABLE `paket_program` (
  `id_program` char(10) NOT NULL,
  `nama_program` varchar(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `deskripsi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket_program`
--

INSERT INTO `paket_program` (`id_program`, `nama_program`, `harga`, `deskripsi`) VALUES
('PR01', '9 SMP', 500000, 'ini adalah bimbingan anak kelas 3 smp'),
('PR02', '1 SMA', 550000, 'ini adalah bimbingan anak kelas 1 SMA'),
('PR03', '2 SMA', 550000, 'ini adalah bimbingan anak kelas 2 SMA\r\n'),
('PR04', '3 SMA', 600000, 'ini adalah bimbingan BELAJAR anak kelas 3 SMA'),
('PR05', 'Perguruan Tinggi', 650000, 'ini adalah bimbingan belajar siswa yang ingi masuk ke Perguruan Tinggi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `bayar` int(20) NOT NULL,
  `status` int(15) NOT NULL,
  `id_program` char(10) NOT NULL,
  `tgl_pembayaran` datetime DEFAULT current_timestamp(),
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `bayar`, `status`, `id_program`, `tgl_pembayaran`, `id_pengguna`) VALUES
(1, 100000, 400000, 'PR05', '2023-11-29 12:48:47', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cicilan`
--
ALTER TABLE `cicilan`
  ADD KEY `id_pembayaran` (`id_pembayaran`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `data_pengguna`
--
ALTER TABLE `data_pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_program` (`id_program`);

--
-- Indeks untuk tabel `detail_program`
--
ALTER TABLE `detail_program`
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_program` (`id_program`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `jadwal_ibfk_3` (`id_module`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`id_mentor`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indeks untuk tabel `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`),
  ADD KEY `fk_id_mapel` (`id_mapel`);

--
-- Indeks untuk tabel `paket_program`
--
ALTER TABLE `paket_program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_program` (`id_program`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_pengguna`
--
ALTER TABLE `data_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cicilan`
--
ALTER TABLE `cicilan`
  ADD CONSTRAINT `cicilan_ibfk_1` FOREIGN KEY (`id_pembayaran`) REFERENCES `pembayaran` (`id_pembayaran`),
  ADD CONSTRAINT `cicilan_ibfk_2` FOREIGN KEY (`id_pengguna`) REFERENCES `data_pengguna` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `data_pengguna`
--
ALTER TABLE `data_pengguna`
  ADD CONSTRAINT `data_pengguna_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `paket_program` (`id_program`);

--
-- Ketidakleluasaan untuk tabel `detail_program`
--
ALTER TABLE `detail_program`
  ADD CONSTRAINT `detail_program_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`),
  ADD CONSTRAINT `detail_program_ibfk_2` FOREIGN KEY (`id_program`) REFERENCES `paket_program` (`id_program`);

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);

--
-- Ketidakleluasaan untuk tabel `mentor`
--
ALTER TABLE `mentor`
  ADD CONSTRAINT `mentor_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`);

--
-- Ketidakleluasaan untuk tabel `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_id_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `data_pengguna` (`id_pengguna`),
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `paket_program` (`id_program`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
