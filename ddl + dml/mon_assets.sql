-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2014 at 11:03 AM
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
-- Table structure for table `agreements`
--

CREATE TABLE IF NOT EXISTS `agreements` (
  `id_agreement` varchar(5) NOT NULL,
  `deed_no` varchar(10) DEFAULT NULL,
  `date_agreements` date DEFAULT NULL,
  `remarks` text,
  `fee_remarks` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_agreement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agreements`
--

INSERT INTO `agreements` (`id_agreement`, `deed_no`, `date_agreements`, `remarks`, `fee_remarks`) VALUES
('AG001', NULL, '2012-06-11', 'Perjanjian bawah tangan-original w/ Titin', NULL),
('AG002', '06', '2012-10-06', 'Agreement received (Notary fee 50%)', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE IF NOT EXISTS `assets` (
  `id_assets` varchar(5) NOT NULL,
  `nama_assets` varchar(50) NOT NULL,
  `jumlah_assets` int(11) NOT NULL,
  `note_assets` text,
  `id_assets_standard` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_assets`),
  KEY `fk_id_assets_standard` (`id_assets_standard`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id_assets`, `nama_assets`, `jumlah_assets`, `note_assets`, `id_assets_standard`) VALUES
('L0001', 'Laptop axio', 1, 'laptop indo punya', 'L0001'),
('L0002', 'Laptop HP core 2', 1, 'Jadul punya', 'L0001');

-- --------------------------------------------------------

--
-- Table structure for table `assets_standard`
--

CREATE TABLE IF NOT EXISTS `assets_standard` (
  `id_assets_standard` varchar(5) NOT NULL,
  `nama_assets_standard` varchar(20) NOT NULL,
  `jumlah_assets_standard` int(11) DEFAULT NULL,
  `id_assets` varchar(5) NOT NULL,
  `id_tier` int(3) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_assets_standard`),
  KEY `assets_standard_ibfk_1` (`id_assets`),
  KEY `fk_id_tierx` (`id_tier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `assets_standard`
--

INSERT INTO `assets_standard` (`id_assets_standard`, `nama_assets_standard`, `jumlah_assets_standard`, `id_assets`, `id_tier`) VALUES
('L0001', 'Laptop axio', 2, 'L0001', 1),
('L0002', 'Laptop HP', 2, 'L0002', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE IF NOT EXISTS `cabang` (
  `id_cabang` varchar(10) NOT NULL,
  `nama_cabang` varchar(50) NOT NULL,
  `alamat_cabang` varchar(200) NOT NULL,
  `jumlah_karyawan` int(3) DEFAULT NULL,
  `id_kontrak_info` varchar(25) NOT NULL,
  `id_rental` varchar(5) NOT NULL,
  `id_assets` varchar(5) NOT NULL,
  `id_tier` int(3) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_cabang`),
  KEY `fk_kontrak_info` (`id_kontrak_info`),
  KEY `fk_id_rentalx` (`id_rental`),
  KEY `fk_id_assetsx` (`id_assets`),
  KEY `fk_id_tier` (`id_tier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id_cabang`, `nama_cabang`, `alamat_cabang`, `jumlah_karyawan`, `id_kontrak_info`, `id_rental`, `id_assets`, `id_tier`) VALUES
('BLI001', 'Bali', 'Simpang Siur Square Blok D/5. Jl.Setiabudi, Kuta-80361, Kecamatan Kuta, Kabupaten DT II Badung', 9, 'KI001', 'RT001', 'L0001', 1),
('BPP001', 'Balikpapan', 'Jl. RE Martadinata 55.RT022. Kel Mekar Sari. Kec. Balikpapan Tengah ', 3, 'KI002', 'RT002', 'L0002', 2);

-- --------------------------------------------------------

--
-- Table structure for table `date_contract`
--

CREATE TABLE IF NOT EXISTS `date_contract` (
  `id_date_contract` varchar(5) NOT NULL,
  `start_date` date NOT NULL,
  `periode` int(2) DEFAULT NULL,
  PRIMARY KEY (`id_date_contract`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `date_contract`
--

INSERT INTO `date_contract` (`id_date_contract`, `start_date`, `periode`) VALUES
('DC001', '2014-08-20', 2),
('DC002', '2012-09-20', 2);

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE IF NOT EXISTS `fee` (
  `id_fee` varchar(5) NOT NULL,
  `cleaningSecure_fee` int(11) DEFAULT NULL,
  `rental_monthly` int(11) DEFAULT NULL,
  `notes_fee` text,
  `rental_annual` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_fee`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`id_fee`, `cleaningSecure_fee`, `rental_monthly`, `notes_fee`, `rental_annual`) VALUES
('FE001', 145000, 3166667, NULL, 38000000),
('FE002', NULL, 1500000, '', 18000000),
('FE003', 115000, 4750000, NULL, 57000000),
('FE004', 50000, 1250000, NULL, 15000000),
('FE005', NULL, 1715175, NULL, 20582000),
('FE006', 75000, 1150000, NULL, 13800000),
('FE007', 125000, 2250000, NULL, 27000000),
('FE008', 50000, 2166667, NULL, 26000000),
('FE009', NULL, 833333, 'Waamerking-Notaris: Cindy Punuh. SH, MH.\nTelp:0431-8881149(Ruko Smart 9 no. 10. Kawasan Mega Mas)', 10000000),
('FE010', NULL, 2333333, NULL, 28000000);

-- --------------------------------------------------------

--
-- Table structure for table `kontrak_info`
--

CREATE TABLE IF NOT EXISTS `kontrak_info` (
  `id_kontrak_info` varchar(25) NOT NULL,
  `renewal_notif` varchar(10) NOT NULL,
  `id_date_contract` varchar(5) NOT NULL,
  `id_fee` varchar(5) NOT NULL,
  `id_pic_owner` varchar(6) NOT NULL,
  `id_pic_kartuku` varchar(6) NOT NULL,
  `id_payment_record` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kontrak_info`),
  KEY `kontrak_info_ibfk_5` (`id_date_contract`),
  KEY `kontrak_info_ibfk_1` (`id_fee`),
  KEY `kontrak_info_ibfk_3` (`id_pic_owner`),
  KEY `kontrak_info_ibfk_2` (`id_pic_kartuku`),
  KEY `kontrak_info_ibfk_4` (`id_payment_record`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontrak_info`
--

INSERT INTO `kontrak_info` (`id_kontrak_info`, `renewal_notif`, `id_date_contract`, `id_fee`, `id_pic_owner`, `id_pic_kartuku`, `id_payment_record`) VALUES
('KI001', '3 mos', 'DC001', 'FE001', 'PW0001', 'PK0001', 'PR001'),
('KI002', '60 days', 'DC002', 'FE002', 'PW0002', 'PK0002', 'PR002');

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
  `note_payment` text NOT NULL,
  `status_payment` varchar(10) NOT NULL,
  PRIMARY KEY (`id_payment_record`),
  KEY `payment_record_ibfk_1` (`id_fee`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_record`
--

INSERT INTO `payment_record` (`id_payment_record`, `paid_payment`, `last_payment`, `date_payment`, `id_fee`, `note_payment`, `status_payment`) VALUES
('PR001', 76000000, NULL, NULL, 'FE001', '', 'Lunas'),
('PR002', 36000000, NULL, NULL, 'FE002', '', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `pic_kartuku`
--

CREATE TABLE IF NOT EXISTS `pic_kartuku` (
  `id_pic_kartuku` varchar(6) NOT NULL,
  `nama_pic_kartuku` varchar(100) NOT NULL,
  `kontak_pic_kartuku` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_pic_kartuku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pic_kartuku`
--

INSERT INTO `pic_kartuku` (`id_pic_kartuku`, `nama_pic_kartuku`, `kontak_pic_kartuku`) VALUES
('PK0001', 'Suhendi / Henny', NULL),
('PK0002', 'Riswanti', NULL),
('PK0003', 'Dedi Junaedi', NULL),
('PK0004', 'Heriedi', NULL),
('PK0005', 'Yesismal Kiswan', NULL),
('PK0006', 'Heru Susilo', NULL),
('PK0007', 'Dwi Purwanti', NULL),
('PK0008', 'Wahyuni Masdar', NULL),
('PK0009', 'Demaks Paraisu', NULL),
('PK0010', 'Guntur', NULL),
('PK0011', 'Komaia Sari', NULL),
('PK0012', 'Noor Cholis', NULL),
('PK0013', 'Tissia Puti Andriane', NULL),
('PK0014', 'I Made Sudarma Putra', NULL),
('PK0015', 'Herismanto', NULL),
('PK0016', 'Ahmad Rochman', NULL),
('PK0017', 'Rendra Ramadhoni', NULL),
('PK0018', 'Lalu Widi Kurniawan', NULL),
('PK0019', 'Ade Saputra', NULL),
('PK0020', 'Admi Rahmadi', NULL),
('PK0021', 'Hironimus Gardi', NULL),
('PK0022', 'Afini', NULL),
('PK0023', 'Sugianto', NULL),
('PK0024', 'Deden Iskandar', NULL),
('PK0025', 'Mulyadi Mustamin', NULL),
('PK0026', 'Parwis Susanto', NULL),
('PK0027', 'Tarman', NULL),
('PK0028', 'Andi Hadinato', NULL),
('PK0029', 'Hamzah', NULL),
('PK0030', 'Muhammad Muntohar', NULL),
('PK0031', 'Taufik Hidayat', NULL),
('PK0032', 'Maulidin Mukhlis', NULL),
('PK0033', 'Ikhsan Pramono', '082220222078'),
('PK0034', 'Syaharuddin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pic_owner`
--

CREATE TABLE IF NOT EXISTS `pic_owner` (
  `id_pic_owner` varchar(6) NOT NULL,
  `nama_pic_owner` varchar(100) NOT NULL,
  `kontak_pic_owner` varchar(15) DEFAULT NULL,
  `rekening_owner` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id_pic_owner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pic_owner`
--

INSERT INTO `pic_owner` (`id_pic_owner`, `nama_pic_owner`, `kontak_pic_owner`, `rekening_owner`) VALUES
('PW0001', 'I Gusti Ayu Widiastuti', NULL, NULL),
('PW0002', 'Hj. Sunarti', NULL, NULL),
('PW0003', 'Rudy Kurniawan Sutedjo', NULL, NULL),
('PW0004', 'Fathurrahman', '087816044933', NULL),
('PW0005', 'R. Otje Affajanto', NULL, NULL),
('PW0006', 'Bpk. Bambang Setiyanto', '085888949405', NULL),
('PW0007', 'Agus Hendratno', NULL, NULL),
('PW0008', 'Ibu Rupiah Lago', NULL, NULL),
('PW0009', 'Pdt. Ventje Mongdong', '081340306006', NULL),
('PW0010', 'Ny.Mariani / Bpk.Dinar Agung', '081370058095', NULL),
('PW0011', 'Bpk. Iskandar Bastari', NULL, NULL),
('PW0012', 'Bpk. Slamet Budi Prayitno', NULL, NULL),
('PW0013', 'Patris Joko Suwarno', NULL, NULL),
('PW0014', 'I Wayan Gursi', NULL, 'BRI Unit Payangan Cab. Ubud: 46580100514532'),
('PW0015', 'Adison', NULL, 'BRI: 027501023223509'),
('PW0016', 'Diah Hertuti Ningsih', NULL, 'BNI: Tanjung Karang: 0071271659'),
('PW0017', 'Priyadi', NULL, 'BRI Unit Wungu Madiun: 388901000973505'),
('PW0018', 'Irwan Afandi', NULL, 'BRI Mataram: 001701036265502'),
('PW0019', 'H.Syaiful Abbas', NULL, 'Bank Nagari Cab. Utama Padang: 21000210134803'),
('PW0020', 'Ir. Gusmawartati', NULL, 'BNI Pekanbaru: 0195977152'),
('PW0021', 'Sri Sumarmiyati', NULL, 'BNI Cab. Cilacap: 221886508'),
('PW0022', 'Farida', NULL, 'BRI: 385501004575532'),
('PW0023', 'Angela Maria Sri Sulistiati', NULL, 'BCA: 0790255208'),
('PW0024', 'Neulis Sinsin Suryati ', NULL, 'Mandiri Syariah Cab.Garut: 7041546756'),
('PW0025', 'Mustamin Mukalla', NULL, 'BRI Unit Sentral Pasar Kota: 305501027327532'),
('PW0026', 'Mamat Rahmat', NULL, 'BCA: 0384380448'),
('PW0027', 'Yulianti', NULL, 'Bank BJB Cab.Karawang: 0011598341100'),
('PW0028', 'Eni Nuraeni', NULL, 'Mandiri Cab. Cirebon Siliwangi: 1340004380811'),
('PW0029', 'Miroe Mauludion', NULL, 'Mandiri: 1460004353459'),
('PW0030', 'Muntiah', NULL, 'Bank Sinarmas Kc. Samarinda: 0022569098'),
('PW0031', 'Dwi Astutik', NULL, 'BRI: 312301019412530'),
('PW0032', 'Laili Hafni', NULL, 'Mandiri: 1580001462027'),
('PW0033', 'Tika Oktavia Maharani', NULL, 'BRI: 623801000254507'),
('PW0034', 'Murtadlo Makmur', NULL, 'BCA: 2380460443');

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
  `id_agreement` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_rental`),
  KEY `fk_agreement` (`id_agreement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`id_rental`, `jenis_rental`, `size_rental`, `note_rental`, `id_agreement`) VALUES
('RT001', 'Ruko', 54, '-20 Mei 2014 batas pemberitahuan perpanjang/tidak, awal Maret 2014 prepare', 'AG001'),
('RT002', 'Rumah', 44, '-20 Juli 2014 batas pemberitahuan perpanjang/tidak, awal Juni 2014 prepare', 'AG002');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `id_request` int(4) NOT NULL AUTO_INCREMENT,
  `id_assets` varchar(5) NOT NULL,
  `id_users` varchar(6) NOT NULL,
  `timestamp_request` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_request`),
  KEY `fk_id_assets` (`id_assets`),
  KEY `fk_id_users` (`id_users`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id_request`, `id_assets`, `id_users`, `timestamp_request`) VALUES
(1, 'L0001', 'admin1', '2014-07-11 02:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `tier`
--

CREATE TABLE IF NOT EXISTS `tier` (
  `id_tier` int(3) NOT NULL AUTO_INCREMENT,
  `nama_tier` varchar(10) NOT NULL,
  PRIMARY KEY (`id_tier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tier`
--

INSERT INTO `tier` (`id_tier`, `nama_tier`) VALUES
(1, 'Tier 1'),
(2, 'Tier 2'),
(3, 'Tier 3'),
(4, 'Tier 4A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` varchar(6) NOT NULL,
  `jenis_users` varchar(15) NOT NULL,
  `nama_users` varchar(25) NOT NULL,
  `pass_users` varchar(8) NOT NULL,
  `flag_users` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `jenis_users`, `nama_users`, `pass_users`, `flag_users`) VALUES
('admin1', 'admin', 'Ayyu Andhysa', '12345', 0),
('admin2', 'admin', 'Andhysa', '12345', 0),
('de1', 'data entry', 'dhysa', '09876', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `fk_id_assets_standard` FOREIGN KEY (`id_assets_standard`) REFERENCES `assets_standard` (`id_assets_standard`);

--
-- Constraints for table `assets_standard`
--
ALTER TABLE `assets_standard`
  ADD CONSTRAINT `assets_standard_ibfk_1` FOREIGN KEY (`id_assets`) REFERENCES `assets` (`id_assets`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_tierx` FOREIGN KEY (`id_tier`) REFERENCES `tier` (`id_tier`);

--
-- Constraints for table `cabang`
--
ALTER TABLE `cabang`
  ADD CONSTRAINT `fk_id_assetsx` FOREIGN KEY (`id_assets`) REFERENCES `assets` (`id_assets`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_rentalx` FOREIGN KEY (`id_rental`) REFERENCES `rental` (`id_rental`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_tier` FOREIGN KEY (`id_tier`) REFERENCES `tier` (`id_tier`),
  ADD CONSTRAINT `fk_kontrak_info` FOREIGN KEY (`id_kontrak_info`) REFERENCES `kontrak_info` (`id_kontrak_info`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kontrak_info`
--
ALTER TABLE `kontrak_info`
  ADD CONSTRAINT `kontrak_info_ibfk_1` FOREIGN KEY (`id_fee`) REFERENCES `fee` (`id_fee`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kontrak_info_ibfk_2` FOREIGN KEY (`id_pic_kartuku`) REFERENCES `pic_kartuku` (`id_pic_kartuku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kontrak_info_ibfk_3` FOREIGN KEY (`id_pic_owner`) REFERENCES `pic_owner` (`id_pic_owner`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kontrak_info_ibfk_4` FOREIGN KEY (`id_payment_record`) REFERENCES `payment_record` (`id_payment_record`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kontrak_info_ibfk_5` FOREIGN KEY (`id_date_contract`) REFERENCES `date_contract` (`id_date_contract`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_id_access` FOREIGN KEY (`id_access`) REFERENCES `accesses` (`id_access`);

--
-- Constraints for table `payment_record`
--
ALTER TABLE `payment_record`
  ADD CONSTRAINT `payment_record_ibfk_1` FOREIGN KEY (`id_fee`) REFERENCES `fee` (`id_fee`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `fk_id_cabang` FOREIGN KEY (`id_cabang`) REFERENCES `cabang` (`id_cabang`),
  ADD CONSTRAINT `fk_id_rental` FOREIGN KEY (`id_rental`) REFERENCES `rental` (`id_rental`);

--
-- Constraints for table `rental`
--
ALTER TABLE `rental`
  ADD CONSTRAINT `fk_agreement` FOREIGN KEY (`id_agreement`) REFERENCES `agreements` (`id_agreement`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `fk_id_assets` FOREIGN KEY (`id_assets`) REFERENCES `assets` (`id_assets`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
