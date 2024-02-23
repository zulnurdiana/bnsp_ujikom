-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 03:40 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `IdBuku` varchar(6) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `IdPenerbit` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`IdBuku`, `kategori`, `nama_buku`, `harga`, `stok`, `IdPenerbit`) VALUES
('B1001', 'Bisnis', 'Bisnis Online', 75000, 9, 'SP01'),
('B1002', 'Bisnis', 'Etika Bisnis  dan Tanggung Jawab Sosial', 67500, 20, 'SP01'),
('K1001', 'Keilmuan', 'Analisis & Perancangan Sistem Informasi', 50000, 60, 'SP01'),
('K1002', 'Keilmuan', 'Artificial Intelegence', 45000, 60, 'SP01'),
('K2003', 'Keilmuan', 'Autocad 3 Dimensi', 40000, 25, 'SP01'),
('K3004', 'Keilmuan', 'Cloud Computing Technology', 85000, 15, 'SP01'),
('N1001', 'Novel', 'Cahaya Di Penjuru Hati', 68000, 10, 'SP02'),
('N1002', 'Pilih Kategori Buku', 'Aku Ingin Cerita', 48000, 12, 'SP03');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `IdPenerbit` varchar(6) NOT NULL,
  `nama_penerbit` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`IdPenerbit`, `nama_penerbit`, `alamat`, `kota`, `telepon`) VALUES
('SP01', 'Penerbit Informatika', 'jl. Buah Batu No. 121', 'Bandung', '0813-2220-1946'),
('SP02', 'Andi Offset', 'jl. Suryalana IX No. 3', 'Bandung', '0878-3903-0688'),
('SP03', 'Danendra', 'jl. Moch. Toha 44', 'Bandung', '022-5201215');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`IdBuku`),
  ADD KEY `IdPenerbit` (`IdPenerbit`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`IdPenerbit`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`IdPenerbit`) REFERENCES `penerbit` (`IdPenerbit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
