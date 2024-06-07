-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 07:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spfc_jantung`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `aturan`
--

CREATE TABLE `aturan` (
  `id` int(11) NOT NULL,
  `penyakit_id` int(11) NOT NULL,
  `gejala_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aturan`
--

INSERT INTO `aturan` (`id`, `penyakit_id`, `gejala_id`) VALUES
(1, 1, 25),
(2, 1, 26),
(3, 1, 27),
(4, 1, 28),
(5, 1, 29),
(6, 1, 30),
(7, 1, 31),
(8, 1, 47),
(9, 2, 28),
(10, 2, 31),
(11, 2, 32),
(12, 2, 33),
(13, 2, 34),
(14, 2, 35),
(15, 4, 36),
(16, 4, 37),
(17, 4, 38),
(18, 4, 46),
(19, 6, 28),
(20, 6, 39),
(21, 6, 40),
(22, 7, 32),
(23, 7, 35),
(24, 7, 41),
(25, 7, 42),
(26, 7, 48),
(27, 8, 25),
(28, 8, 28),
(29, 8, 33),
(30, 8, 34),
(31, 8, 35),
(32, 8, 43),
(33, 9, 25),
(34, 9, 31),
(35, 9, 44),
(36, 9, 45);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id`, `kode`, `nama`) VALUES
(25, 'P001', 'Nyeri dada'),
(26, 'P002', 'Bahu kiri terasa tidak enak'),
(27, 'P003', 'Keringat dingin'),
(28, 'P004', 'Sesak nafas'),
(29, 'P005', 'Gangguan pencernaan'),
(30, 'P006', 'Mual'),
(31, 'P007', 'Detak jantung tidak teratur'),
(32, 'P008', 'Pusing'),
(33, 'P009', 'Kaki bengkak'),
(34, 'P010', 'Jantung berdebar-debar'),
(35, 'P011', 'Mudah lelah'),
(36, 'P012', 'Nyeri didaerah dada tengah'),
(37, 'P013', 'Mudah berkeringat'),
(38, 'P014', 'Dada mengencang'),
(39, 'P015', 'Pembengkakan pada jantung'),
(40, 'P016', 'Kelainan fungsi hati'),
(41, 'P017', 'Pendarahan dari hidung'),
(42, 'P018', 'Wajah kemerahan'),
(43, 'P019', 'Batuk'),
(44, 'P020', 'Sakit perut'),
(45, 'P021', 'Detak jantung cepat'),
(46, 'P022', 'Nyeri didaerah lengan kiri'),
(47, 'P023', 'Punggung terasa tidak enak'),
(48, 'P024', 'Sakit kepala');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id`, `kode`, `nama`) VALUES
(1, 'R01', 'Penyakit jantung koroner'),
(2, 'R02', 'Penyakit otot jantung'),
(4, 'R03', 'Penyakit jantung iskemik'),
(6, 'R04', 'Gagal jantung'),
(7, 'R05', 'Penyakit jantung hipertensi'),
(8, 'R06', 'Penyakit katup jantung'),
(9, 'R07', 'Kardiomegali atau Jantung hipertrofik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gejala_id` (`gejala_id`),
  ADD KEY `penyakit_id` (`penyakit_id`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aturan`
--
ALTER TABLE `aturan`
  ADD CONSTRAINT `aturan_ibfk_1` FOREIGN KEY (`gejala_id`) REFERENCES `gejala` (`id`),
  ADD CONSTRAINT `aturan_ibfk_2` FOREIGN KEY (`penyakit_id`) REFERENCES `penyakit` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
