-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 06:10 AM
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
-- Database: `dbfh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` enum('admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nama`, `alamat`, `username`, `password`, `level`) VALUES
(1, 'Dewa', 'Jl Karang Asem Utr 12, Dki Jakarta', 'adminDewa1', '1234', 'admin'),
(2, 'Agustina', 'Sampang Madura', 'admin2', 'admin2', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `idDokter` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tLahir` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` enum('dokter') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`idDokter`, `nama`, `alamat`, `tLahir`, `tgl`, `username`, `password`, `level`) VALUES
(16, ' Susilo B Y', 'Mojokerto', 'Aceh', '1882-01-31', 'Susilo', 'Susilo', 'dokter'),
(19, 'TirtaTirtaTirtaTirta', 'Mojokerto', 'Tuban', '2022-05-01', 'Tirta', 'Tirta', 'dokter'),
(21, 'Nada S.', 'Kediri', 'Aceh', '1967-10-16', 'Nada', 'Nada', 'dokter'),
(23, 'Arya', 'Sampang Madura', 'Gresik', '2022-10-30', 'Arya', 'Arya', 'dokter'),
(24, 'Ari', 'jalan A', 'Semarang', '2022-05-15', 'AriAri', 'AriAri', 'dokter');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `idPasien` int(11) NOT NULL,
  `nik` varchar(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` enum('pasien') NOT NULL,
  `dosis` varchar(13) NOT NULL,
  `vaksin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`idPasien`, `nik`, `nama`, `alamat`, `username`, `password`, `level`, `dosis`, `vaksin`) VALUES
(15, '0987650911', 'Yohanes', 'Mojokertoo', 'Yohanes', 'Yohanes', 'pasien', 'Dosis ke-3', 14),
(17, '09876549', 'Jaya I. SS', 'Mojoroto', 'Jaya I. S', 'Jaya I. S', 'pasien', 'Dosis ke-3', 14),
(23, '0989', 'Lila', 'Mojokerto', 'Lila', 'Lila', 'pasien', 'Dosis ke-2', 4),
(24, '0900650911', 'hadi', 'NewYork', 'hadi', 'hadi', 'pasien', 'Dosis ke-3', 14),
(25, '098765209', 'Sambo Killer', 'Mojokerto', 'Sambo', 'Sambo', 'pasien', 'Dosis ke-1', 5),
(26, '0987654144', 'Susi', 'Mojokerto', 'Susi', 'Susi', 'pasien', 'Dosis ke-3', 4),
(27, '0987611', 'Agustina', 'Kediri', 'Agustina', 'Agustina', 'pasien', 'Dosis ke-1', 4),
(28, '0987613509', 'Sipaling', 'Sipaling Kota', 'Sipaling', 'Sipaling', 'pasien', 'Dosis ke-1', 4),
(29, '09876109', 'userb', 'Mojokerto', 'userb', 'userb', 'pasien', 'Dosis ke-2', 4),
(31, '098', 'userbda', 'Mojoroto', 'userbda', 'userbda', 'pasien', 'Dosis ke-1', 5),
(32, '111111', 'userbdds', 'Sampang Madura', 'userbdds', 'userbdds', 'pasien', 'Dosis ke-1', 14),
(33, '1111112', 'Sriasih', 'jalanjalanjalan', 'Sriasih', 'Sriasih', 'pasien', 'Dosis ke-2', 5);

-- --------------------------------------------------------

--
-- Table structure for table `vaksin`
--

CREATE TABLE `vaksin` (
  `idVaksin` int(11) NOT NULL,
  `namaVaksin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaksin`
--

INSERT INTO `vaksin` (`idVaksin`, `namaVaksin`) VALUES
(3, 'Moderna'),
(4, 'Merah Putih'),
(5, 'Sinovak'),
(14, 'Astrazeneca');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`idDokter`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`idPasien`),
  ADD KEY `vaksin` (`vaksin`);

--
-- Indexes for table `vaksin`
--
ALTER TABLE `vaksin`
  ADD PRIMARY KEY (`idVaksin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `idDokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `idPasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `vaksin`
--
ALTER TABLE `vaksin`
  MODIFY `idVaksin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`vaksin`) REFERENCES `vaksin` (`idVaksin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
