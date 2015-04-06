-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2015 at 08:16 AM
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
-- Table structure for table `status_izin`
--

CREATE TABLE IF NOT EXISTS `status_izin` (
  `izin_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
`id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_izin`
--

INSERT INTO `status_izin` (`izin_id`, `status_id`, `timestamp`, `id`) VALUES
(1, 12, '2015-04-06 00:00:00', 4),
(8, 7, '2015-04-05 00:00:00', 1),
(8, 7, '2015-04-05 00:00:00', 2),
(8, 8, '2015-04-05 00:00:00', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `status_izin`
--
ALTER TABLE `status_izin`
 ADD PRIMARY KEY (`izin_id`,`status_id`,`id`), ADD UNIQUE KEY `id` (`id`), ADD KEY `status_id` (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `status_izin`
--
ALTER TABLE `status_izin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `status_izin`
--
ALTER TABLE `status_izin`
ADD CONSTRAINT `status_izin_ibfk_1` FOREIGN KEY (`izin_id`) REFERENCES `izin` (`id`),
ADD CONSTRAINT `status_izin_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
