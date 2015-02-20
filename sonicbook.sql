-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2015 at 01:22 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sonicbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
`id_booking` int(255) NOT NULL,
  `tanggal_booking` datetime DEFAULT NULL,
  `tanggal_kadaluarsa` datetime DEFAULT NULL,
  `id_buku` int(255) DEFAULT NULL,
  `id_member` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
`id_buku` int(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `halaman` varchar(20) DEFAULT NULL,
  `tahun_terbit` varchar(10) DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL,
  `status` int(2) DEFAULT '0',
  `sumber_buku` varchar(255) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `deskripsi` mediumtext,
  `images` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `kode`, `judul`, `pengarang`, `penerbit`, `halaman`, `tahun_terbit`, `jenis`, `status`, `sumber_buku`, `tanggal_masuk`, `deskripsi`, `images`, `link`, `keterangan`) VALUES
(1, '522', 'Kepada Dikau sang Bidadari Syurga', 'Nabil Ftd', 'Bintang Media', '78', '2013', 'Novel', 0, 'PT. Gramedia', '2015-01-01', NULL, '', 'kepada-dikau-sang-bidadari-syurga', ''),
(2, '134', 'Gelombang Elektromagnetik', 'Adhitya Rachman', 'Elektromedia', '125', '2013', 'Buku', 0, 'TIF', '2014-09-15', NULL, '', 'gelombang-elektromagnetik', ''),
(3, '111', 'KPCI : Amazing Dream', 'Aufa Alya Hanifah', 'DAR! Mizan', '124', '2014', 'Buku', 0, 'Gudang Penerbit', '2014-02-14', NULL, '', 'kpci-amazing-dream', '');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE IF NOT EXISTS `denda` (
  `id_denda` int(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
`id_member` int(255) NOT NULL,
  `no_identitas` varchar(50) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `no_identitas`, `nama`, `username`, `password`, `alamat`, `no_hp`, `created`) VALUES
(0, '951014500095', 'Nab', 'nabilftd', '530386ec8f730e66fa049f0c6c64558078f1c2d6', 'Kedundang 1, RT/RW 26/11, Kedundang, Temon, Kulonprogo, Yogyakarta', '081328733696', '2015-01-11 12:55:58'),
(13, '950614500095', 'Yunika Nisa Afifa', 'yunika', 'c102f45cf8a86613aa539dcaa97e7e92e7335a98', 'Klayonan, Wates, Kulonprogo', '081804312899', '2015-01-04 00:53:51'),
(16, '13523197', 'Nindita Lian', 'Didit97', '8cb2237d0679ca88db6464eac60da96345513964', 'Jl. Kaliurang Km. 15', '085713342560', '2015-01-05 00:34:56');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
`id_peminjaman` int(5) NOT NULL,
  `tanggal_pinjam` datetime DEFAULT NULL,
  `tanggal_kembali` datetime DEFAULT NULL,
  `id_buku` int(255) DEFAULT NULL,
  `id_member` int(255) DEFAULT NULL,
  `id_booking` int(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tanggal_pinjam`, `tanggal_kembali`, `id_buku`, `id_member`, `id_booking`) VALUES
(1, '2015-01-05 06:49:24', '2015-01-15 06:49:24', 1, 0, 0),
(2, '2015-01-05 07:30:21', '2015-01-15 07:30:21', 2, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
 ADD PRIMARY KEY (`id_booking`), ADD KEY `fk_bku` (`id_buku`), ADD KEY `fk_mbr` (`id_member`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
 ADD PRIMARY KEY (`id_buku`), ADD UNIQUE KEY `kode` (`kode`), ADD UNIQUE KEY `link` (`link`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`id_member`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
 ADD PRIMARY KEY (`id_peminjaman`), ADD KEY `fk_bke` (`id_buku`), ADD KEY `fk_mbe` (`id_member`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
MODIFY `id_booking` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
MODIFY `id_buku` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
MODIFY `id_member` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
MODIFY `id_peminjaman` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
ADD CONSTRAINT `fk_bku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
ADD CONSTRAINT `fk_mbr` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
ADD CONSTRAINT `fk_bke` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
ADD CONSTRAINT `fk_mbe` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
