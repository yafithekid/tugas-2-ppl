
-- Bikin user baru
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, FILE, INDEX, ALTER, CREATE TEMPORARY TABLES, EXECUTE, CREATE VIEW, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EVENT, TRIGGER ON *.* TO 'tugas2ppl'@'localhost' IDENTIFIED BY PASSWORD '*53E75DC754D0B216496EA1D2D5EFF2EB0F622379';
CREATE DATABASE `tugas_2_ppl`;
USE `tugas_2_ppl`;

-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2015 at 02:46 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tugas_2_ppl`
--

-- --------------------------------------------------------

--
-- Table structure for table `angkutan`
--

CREATE TABLE IF NOT EXISTS `angkutan` (
`id` int(11) NOT NULL,
  `no_kendaraan` int(11) NOT NULL,
  `izin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE IF NOT EXISTS `dokumen` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `izin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE IF NOT EXISTS `izin` (
`id` int(11) NOT NULL,
  `tanggal_pengaduan` date NOT NULL,
  `deskripsi` text NOT NULL,
  `status_pembayaran` tinyint(1) NOT NULL,
  `penguna_id` int(11) NOT NULL,
  `jenisizin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenisizin`
--

CREATE TABLE IF NOT EXISTS `jenisizin` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
`id` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status_izin`
--

CREATE TABLE IF NOT EXISTS `status_izin` (
  `izin_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE IF NOT EXISTS `template` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `template_izin`
--

CREATE TABLE IF NOT EXISTS `template_izin` (
  `jenisizin_id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `terminal`
--

CREATE TABLE IF NOT EXISTS `terminal` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `terminal_angkutan`
--

CREATE TABLE IF NOT EXISTS `terminal_angkutan` (
  `angkutan_id` int(11) NOT NULL,
  `terminal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `angkutan`
--
ALTER TABLE `angkutan`
 ADD PRIMARY KEY (`id`), ADD KEY `izinangkutan` (`izin_id`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
 ADD PRIMARY KEY (`id`), ADD KEY `dokumenizin` (`izin_id`);

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
 ADD PRIMARY KEY (`id`), ADD KEY `izinpengguna` (`penguna_id`), ADD KEY `izinjenisizin` (`jenisizin_id`);

--
-- Indexes for table `jenisizin`
--
ALTER TABLE `jenisizin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_izin`
--
ALTER TABLE `status_izin`
 ADD PRIMARY KEY (`izin_id`,`status_id`), ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_izin`
--
ALTER TABLE `template_izin`
 ADD PRIMARY KEY (`jenisizin_id`,`template_id`), ADD KEY `template_id` (`template_id`);

--
-- Indexes for table `terminal`
--
ALTER TABLE `terminal`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terminal_angkutan`
--
ALTER TABLE `terminal_angkutan`
 ADD PRIMARY KEY (`angkutan_id`,`terminal_id`), ADD KEY `terminal_id` (`terminal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `angkutan`
--
ALTER TABLE `angkutan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `izin`
--
ALTER TABLE `izin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jenisizin`
--
ALTER TABLE `jenisizin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `terminal`
--
ALTER TABLE `terminal`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `angkutan`
--
ALTER TABLE `angkutan`
ADD CONSTRAINT `angkutan_ibfk_1` FOREIGN KEY (`izin_id`) REFERENCES `izin` (`id`);

--
-- Constraints for table `dokumen`
--
ALTER TABLE `dokumen`
ADD CONSTRAINT `dokumen_ibfk_1` FOREIGN KEY (`izin_id`) REFERENCES `izin` (`id`);

--
-- Constraints for table `izin`
--
ALTER TABLE `izin`
ADD CONSTRAINT `izin_ibfk_1` FOREIGN KEY (`penguna_id`) REFERENCES `pengguna` (`id`),
ADD CONSTRAINT `izin_ibfk_2` FOREIGN KEY (`jenisizin_id`) REFERENCES `jenisizin` (`id`);

--
-- Constraints for table `status_izin`
--
ALTER TABLE `status_izin`
ADD CONSTRAINT `status_izin_ibfk_1` FOREIGN KEY (`izin_id`) REFERENCES `izin` (`id`),
ADD CONSTRAINT `status_izin_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `template_izin`
--
ALTER TABLE `template_izin`
ADD CONSTRAINT `template_izin_ibfk_1` FOREIGN KEY (`jenisizin_id`) REFERENCES `jenisizin` (`id`),
ADD CONSTRAINT `template_izin_ibfk_2` FOREIGN KEY (`template_id`) REFERENCES `template` (`id`);

--
-- Constraints for table `terminal_angkutan`
--
ALTER TABLE `terminal_angkutan`
ADD CONSTRAINT `terminal_angkutan_ibfk_1` FOREIGN KEY (`angkutan_id`) REFERENCES `angkutan` (`id`),
ADD CONSTRAINT `terminal_angkutan_ibfk_2` FOREIGN KEY (`terminal_id`) REFERENCES `terminal` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
