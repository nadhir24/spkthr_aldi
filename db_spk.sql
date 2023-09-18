-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 02:48 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `id_karyawan` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `username`, `nama_karyawan`, `password`, `role`) VALUES
('KRY001', 'fya', 'fy', 'fy', '1'),
('KRY002', 'di', 'dia', 'dia', '2'),
('KRY003', 'a', 'a', 'a', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
  `kdKriteria` int(11) NOT NULL,
  `kriteria` varchar(200) NOT NULL,
  `sifat` char(1) NOT NULL,
  `bobot` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kdKriteria`, `kriteria`, `sifat`, `bobot`) VALUES
(5, 'Kerutinan', 'B', 5),
(6, 'Jumlah', 'B', 5),
(7, 'Harga', 'B', 4),
(8, 'Beras', 'B', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `kdPelanggan` int(11) NOT NULL,
  `kdKriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`kdPelanggan`, `kdKriteria`, `nilai`) VALUES
(4, 5, 3),
(4, 6, 2),
(4, 7, 3),
(4, 8, 3),
(5, 5, 2),
(5, 6, 4),
(5, 7, 3),
(5, 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `kdPelanggan` int(11) NOT NULL,
  `pelanggan` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kdPelanggan`, `pelanggan`) VALUES
(4, 'Viona'),
(5, 'Meli');

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

CREATE TABLE IF NOT EXISTS `subkriteria` (
  `kdSubKriteria` int(11) NOT NULL,
  `subKriteria` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  `kdKriteria` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`kdSubKriteria`, `subKriteria`, `value`, `kdKriteria`) VALUES
(11, 'belanja 6 kali sebulan', 1, 5),
(12, 'belanja 7 hingga 12 kali sebulan', 2, 5),
(13, 'belanja 13 hingga 18 kali sebulan', 3, 5),
(14, 'belanja 19 hingga 24 kali sebulan', 4, 5),
(15, 'belanja lebih dari 24 kali sebulan', 5, 5),
(16, 'rata-rata sekali belanja kurang dari 8 item', 1, 6),
(17, 'rata-rata sekali belanja 8 hingga 16 item', 2, 6),
(18, 'rata-rata sekali belanja 17 hingga 24 item', 3, 6),
(19, 'rata-rata sekali belanja 25 hingga 32 item', 4, 6),
(20, 'rata-rata sekali belanja lebih dari 32 item', 5, 6),
(21, 'rata-rata barang yang dibeli sangat murah', 1, 7),
(22, 'rata-rata barang yang dibeli murah', 2, 7),
(23, 'rata-rata barang yang dibeli sedang', 3, 7),
(24, 'rata-rata barang yang dibeli mahal', 4, 7),
(25, 'rata-rata barang yang dibeli sangat mahal', 5, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kdKriteria`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD UNIQUE KEY `indexNilai` (`kdPelanggan`,`kdKriteria`) USING BTREE,
  ADD KEY `kdKriteria` (`kdKriteria`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`kdPelanggan`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`kdSubKriteria`),
  ADD KEY `kdKriteria` (`kdKriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kdKriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `kdPelanggan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `kdSubKriteria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`kdPelanggan`) REFERENCES `pelanggan` (`kdPelanggan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kdKriteria`) REFERENCES `kriteria` (`kdKriteria`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`kdKriteria`) REFERENCES `kriteria` (`kdKriteria`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
