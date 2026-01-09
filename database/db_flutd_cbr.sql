-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2026 at 06:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_flutd_cbr`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(10) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
('1', 'Admin', 'admin', 'admin'),
('2', 'Milky', 'pasien', 'pasien');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` varchar(10) NOT NULL,
  `nama_gejala` varchar(255) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`, `bobot`) VALUES
('G01', 'Kesulitan kencing', 5),
('G02', 'Kencing berdarah', 3),
('G03', 'Gelisah dan nyeri saat urinasi(kencing)', 3),
('G04', 'Menunjukkan rasa sakit saat buang air kecil', 3),
('G05', 'Kucing menjadi pendiam', 1),
('G06', 'Susah mengeluarkan urin(kencing) disertai nyeri', 5),
('G07', 'Pembesaran kantung kemih(kencing)', 5),
('G08', 'Kelesuan secara menyeluruh/general malaise', 1),
('G09', 'Penebalan dinding vesika urinaria(kandung kemih)', 3),
('G10', 'Nafsu makan hilang', 3),
('G11', 'Merejan(ngeden)', 5),
('G12', 'Frekuensi buang air kecil yang sering, tetapi jumlah urin yang dikeluarkan sedikit', 5),
('G13', 'Muntah', 3),
('G14', 'Sering menjilati daerah genital (reproduksi)', 3),
('G15', 'Lemas', 3),
('G16', 'Peningkatan frekuensi minum', 1),
('G17', 'Demam', 1),
('G18', 'Pembengkakan di area genital (reproduksi)', 5),
('G19', 'Adanya sendimen (cairan tubuh yang mengendap)', 5),
('G20', 'Sensitif bila dipegang di area abdomen (perut)', 3),
('G21', 'Penis tersumbat', 5),
('G22', 'Radang pada penis', 3);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_diagnosa`
--

CREATE TABLE `hasil_diagnosa` (
  `id_hasil` varchar(10) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `id_penyakit` varchar(10) NOT NULL,
  `nilai` double NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_diagnosa`
--

INSERT INTO `hasil_diagnosa` (`id_hasil`, `nama_pengguna`, `id_penyakit`, `nilai`, `tanggal`) VALUES
('1', 'admin', 'P03', 62.79, '2025-12-27 00:30:17'),
('2', 'milky', 'P01', 42.86, '2025-12-29 12:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `kasus`
--

CREATE TABLE `kasus` (
  `id_kasus` varchar(10) NOT NULL,
  `id_gejala` varchar(10) NOT NULL,
  `id_penyakit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kasus`
--

INSERT INTO `kasus` (`id_kasus`, `id_gejala`, `id_penyakit`) VALUES
('K001', 'G01', 'P01'),
('K001', 'G02', 'P01'),
('K001', 'G03', 'P01'),
('K001', 'G09', 'P01'),
('K001', 'G10', 'P01'),
('K001', 'G11', 'P01'),
('K001', 'G13', 'P01'),
('K001', 'G15', 'P01'),
('K001', 'G16', 'P01'),
('K001', 'G17', 'P01'),
('K001', 'G18', 'P01'),
('K002', 'G02', 'P02'),
('K002', 'G05', 'P02'),
('K002', 'G06', 'P02'),
('K002', 'G07', 'P02'),
('K002', 'G10', 'P02'),
('K002', 'G11', 'P02'),
('K002', 'G12', 'P02'),
('K002', 'G13', 'P02'),
('K002', 'G14', 'P02'),
('K002', 'G19', 'P02'),
('K003', 'G01', 'P03'),
('K003', 'G04', 'P03'),
('K003', 'G10', 'P03'),
('K003', 'G11', 'P03'),
('K003', 'G12', 'P03'),
('K003', 'G13', 'P03'),
('K003', 'G15', 'P03'),
('K003', 'G18', 'P03'),
('K003', 'G20', 'P03'),
('K003', 'G21', 'P03'),
('K003', 'G22', 'P03');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` varchar(10) NOT NULL,
  `nama_penyakit` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `keterangan`) VALUES
('P01', 'Cystitis', 'Peradangan pada kandung kemih'),
('P02', 'Urolithiasis', 'Pembentukan sedimen dalam saluran kemih'),
('P03', 'Obstruksi Uretra', 'Penyumbatan saluran kandung kemih');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `kasus`
--
ALTER TABLE `kasus`
  ADD PRIMARY KEY (`id_kasus`,`id_gejala`),
  ADD KEY `fk_kasus_gejala` (`id_gejala`),
  ADD KEY `fk_kasus_penyakit` (`id_penyakit`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kasus`
--
ALTER TABLE `kasus`
  ADD CONSTRAINT `fk_kasus_gejala` FOREIGN KEY (`id_gejala`) REFERENCES `gejala` (`id_gejala`),
  ADD CONSTRAINT `fk_kasus_penyakit` FOREIGN KEY (`id_penyakit`) REFERENCES `penyakit` (`id_penyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
