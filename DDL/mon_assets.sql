-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2014 at 09:35 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mon_assets`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesses`
--

CREATE TABLE IF NOT EXISTS `accesses` (
  `id_access` varchar(5) NOT NULL,
  `nama_id` varchar(10) NOT NULL,
  `access_right` int(11) NOT NULL,
  PRIMARY KEY (`id_access`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE IF NOT EXISTS `assets` (
  `id_assets` varchar(5) NOT NULL,
  `nama_assets` varchar(50) NOT NULL,
  `jumlah_assets` int(11) NOT NULL,
  `note_assets` text,
  PRIMARY KEY (`id_assets`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assets_standard`
--

CREATE TABLE IF NOT EXISTS `assets_standard` (
  `id_assets_standard` varchar(5) NOT NULL,
  `nama_assets_standard` varchar(20) NOT NULL,
  `jumlah_assets_standard` int(11) DEFAULT NULL,
  `id_assets` varchar(5) NOT NULL,
  `id_tier` varchar(3) NOT NULL,
  PRIMARY KEY (`id_assets_standard`),
  KEY `id_assets` (`id_assets`),
  KEY `fk_id_tierx` (`id_tier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE IF NOT EXISTS `cabang` (
  `id_cabang` varchar(10) NOT NULL,
  `kota_cabang` varchar(50) NOT NULL,
  `alamat_cabang` varchar(200) NOT NULL,
  `jumlah_karyawan` int(3) DEFAULT NULL,
  `id_kontrak_info` varchar(25) NOT NULL,
  `id_rental` varchar(5) NOT NULL,
  `id_assets` varchar(5) NOT NULL,
  `id_tier` varchar(3) NOT NULL,
  PRIMARY KEY (`id_cabang`),
  KEY `fk_kontrak_info` (`id_kontrak_info`),
  KEY `fk_id_tier` (`id_tier`),
  KEY `fk_id_rentalx` (`id_rental`),
  KEY `fk_id_assetsx` (`id_assets`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `date_contract`
--

CREATE TABLE IF NOT EXISTS `date_contract` (
  `id_date_contract` varchar(5) NOT NULL,
  `start_date` date NOT NULL,
  `periode` int(2) DEFAULT NULL,
  `date_payment` date DEFAULT NULL,
  `note_payment` text,
  `status_payment` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_date_contract`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE IF NOT EXISTS `fee` (
  `id_fee` varchar(5) NOT NULL,
  `cleaningSecure_fee` int(11) DEFAULT NULL,
  `rental_monthly` int(11) DEFAULT NULL,
  `notaris_fee` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_fee`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kontrak_info`
--

CREATE TABLE IF NOT EXISTS `kontrak_info` (
  `id_kontrak_info` varchar(25) NOT NULL,
  `renewal_notif` varchar(2) NOT NULL,
  `id_date_contract` varchar(5) NOT NULL,
  `id_fee` varchar(5) NOT NULL,
  `id_pic_owner` varchar(6) NOT NULL,
  `id_pic_kartuku` varchar(6) NOT NULL,
  `id_payment_record` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kontrak_info`),
  KEY `id_fee` (`id_fee`),
  KEY `id_pic_kartuku` (`id_pic_kartuku`),
  KEY `id_pic_owner` (`id_pic_owner`),
  KEY `id_payment_record` (`id_payment_record`),
  KEY `id_date_contract` (`id_date_contract`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` varchar(5) NOT NULL,
  `nama_menu` varchar(15) NOT NULL,
  `id_access` varchar(5) NOT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `fk_id_access` (`id_access`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_record`
--

CREATE TABLE IF NOT EXISTS `payment_record` (
  `id_payment_record` varchar(50) NOT NULL,
  `paid_payment` int(11) DEFAULT NULL,
  `last_payment` int(11) DEFAULT NULL,
  `date_payment` date DEFAULT NULL,
  `id_fee` varchar(5) NOT NULL,
  PRIMARY KEY (`id_payment_record`),
  KEY `id_fee` (`id_fee`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pic_kartuku`
--

CREATE TABLE IF NOT EXISTS `pic_kartuku` (
  `id_pic_kartuku` varchar(6) NOT NULL,
  `nama_pic_kartuku` varchar(100) NOT NULL,
  `kontak_pic_kartuku` varchar(15) NOT NULL,
  PRIMARY KEY (`id_pic_kartuku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pic_owner`
--

CREATE TABLE IF NOT EXISTS `pic_owner` (
  `id_pic_owner` varchar(6) NOT NULL,
  `nama_pic_owner` varchar(100) NOT NULL,
  `kontak_pic_owner` varchar(15) NOT NULL,
  PRIMARY KEY (`id_pic_owner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE IF NOT EXISTS `records` (
  `id_records` varchar(5) NOT NULL,
  `id_rental` varchar(5) NOT NULL,
  `id_cabang` varchar(10) NOT NULL,
  PRIMARY KEY (`id_records`),
  KEY `fk_id_cabang` (`id_cabang`),
  KEY `fk_id_rental` (`id_rental`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE IF NOT EXISTS `rental` (
  `id_rental` varchar(5) NOT NULL,
  `jenis_rental` varchar(10) NOT NULL,
  `size_rental` int(11) NOT NULL,
  `note_rental` text,
  PRIMARY KEY (`id_rental`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `id_request` varchar(3) NOT NULL,
  `id_assets` varchar(5) NOT NULL,
  `id_users` varchar(6) NOT NULL,
  `timestamp_request` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_request`),
  KEY `fk_id_assets` (`id_assets`),
  KEY `fk_id_users` (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tier`
--

CREATE TABLE IF NOT EXISTS `tier` (
  `id_tier` varchar(3) NOT NULL,
  `nama_tier` varchar(10) NOT NULL,
  `id_assets_standard` varchar(5) NOT NULL,
  PRIMARY KEY (`id_tier`),
  KEY `fk_id_assets_standard` (`id_assets_standard`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` varchar(6) NOT NULL,
  `jenis_users` varchar(15) NOT NULL,
  `nama_users` varchar(25) NOT NULL,
  `pass_users` varchar(8) NOT NULL,
  `id_request` varchar(3) NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `jenis_users`, `nama_users`, `pass_users`, `id_request`) VALUES
('12', 'DE', 'Ayyuuu', '1231', ''),
('123', 'De', 'Ayyu', '123', ''),
('P123', 'Programmer', 'Dhysa', '123456', ''),
('P124', 'Programmner', 'Ayyyu', '123456', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets_standard`
--
ALTER TABLE `assets_standard`
  ADD CONSTRAINT `fk_id_tierx` FOREIGN KEY (`id_tier`) REFERENCES `tier` (`id_tier`),
  ADD CONSTRAINT `assets_standard_ibfk_1` FOREIGN KEY (`id_assets`) REFERENCES `assets` (`id_assets`);

--
-- Constraints for table `cabang`
--
ALTER TABLE `cabang`
  ADD CONSTRAINT `fk_id_assetsx` FOREIGN KEY (`id_assets`) REFERENCES `assets` (`id_assets`),
  ADD CONSTRAINT `fk_id_rentalx` FOREIGN KEY (`id_rental`) REFERENCES `rental` (`id_rental`),
  ADD CONSTRAINT `fk_id_tier` FOREIGN KEY (`id_tier`) REFERENCES `tier` (`id_tier`),
  ADD CONSTRAINT `fk_kontrak_info` FOREIGN KEY (`id_kontrak_info`) REFERENCES `kontrak_info` (`id_kontrak_info`);

--
-- Constraints for table `kontrak_info`
--
ALTER TABLE `kontrak_info`
  ADD CONSTRAINT `kontrak_info_ibfk_1` FOREIGN KEY (`id_fee`) REFERENCES `fee` (`id_fee`),
  ADD CONSTRAINT `kontrak_info_ibfk_2` FOREIGN KEY (`id_pic_kartuku`) REFERENCES `pic_kartuku` (`id_pic_kartuku`),
  ADD CONSTRAINT `kontrak_info_ibfk_3` FOREIGN KEY (`id_pic_owner`) REFERENCES `pic_owner` (`id_pic_owner`),
  ADD CONSTRAINT `kontrak_info_ibfk_4` FOREIGN KEY (`id_payment_record`) REFERENCES `payment_record` (`id_payment_record`),
  ADD CONSTRAINT `kontrak_info_ibfk_5` FOREIGN KEY (`id_date_contract`) REFERENCES `date_contract` (`id_date_contract`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_id_access` FOREIGN KEY (`id_access`) REFERENCES `accesses` (`id_access`);

--
-- Constraints for table `payment_record`
--
ALTER TABLE `payment_record`
  ADD CONSTRAINT `payment_record_ibfk_1` FOREIGN KEY (`id_fee`) REFERENCES `fee` (`id_fee`);

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `fk_id_cabang` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`id_cabang`),
  ADD CONSTRAINT `fk_id_rental` FOREIGN KEY (`id_rental`) REFERENCES `rental` (`id_rental`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `fk_id_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_assets` FOREIGN KEY (`id_assets`) REFERENCES `assets` (`id_assets`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tier`
--
ALTER TABLE `tier`
  ADD CONSTRAINT `fk_id_assets_standard` FOREIGN KEY (`id_assets_standard`) REFERENCES `assets_standard` (`id_assets_standard`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
