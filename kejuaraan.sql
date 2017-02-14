-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2017 at 01:06 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kejuaraan`
--

-- --------------------------------------------------------

--
-- Table structure for table `atlet`
--

CREATE TABLE IF NOT EXISTS `atlet` (
  `id_atlet` int(3) NOT NULL AUTO_INCREMENT,
  `nama_atlet` varchar(120) NOT NULL,
  `status_atlet` tinyint(1) NOT NULL,
  `id_kejuaraan_dojang` int(3) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `berat` int(3) NOT NULL,
  `tinggi` int(3) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `alamat_atlet` text NOT NULL,
  `tgl_daftar` date NOT NULL,
  `foto_atlet` varchar(25) NOT NULL,
  PRIMARY KEY (`id_atlet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `atlet`
--

INSERT INTO `atlet` (`id_atlet`, `nama_atlet`, `status_atlet`, `id_kejuaraan_dojang`, `id_kategori`, `berat`, `tinggi`, `jk`, `tgl_lahir`, `gol_darah`, `alamat_atlet`, `tgl_daftar`, `foto_atlet`) VALUES
(1, 'Muwahhid', 1, 1, 1, 50, 165, 'Laki Laki', '1994-05-06', 'B', 'Yogyakarta', '2017-01-12', '1.png'),
(2, 'Al Walid', 1, 1, 1, 65, 170, 'laki laki', '1994-05-11', 'A', 'Yogyakarta', '2017-01-12', ''),
(3, 'Joko Susanto', 1, 3, 3, 45, 160, 'Laki Laki', '1995-05-03', 'A', 'Solo Raya', '2017-01-12', ''),
(18, 'Al Muwahhid', 1, 1, 1, 56, 167, 'Laki Laki', '1994-01-09', 'B', 'Solo Raya', '2017-01-26', '18.png'),
(19, 'Janto Suprapto', 0, 20, 6, 56, 170, 'Laki Laki', '1997-01-01', 'AB', 'Rembang', '2017-01-27', '19.png'),
(20, 'Susilo Bambang', 0, 1, 2, 68, 176, 'Laki Laki', '1994-01-01', 'B', 'Sulawesi Tenggara', '2017-01-28', '20.png');

-- --------------------------------------------------------

--
-- Table structure for table `cp_panitia`
--

CREATE TABLE IF NOT EXISTS `cp_panitia` (
  `id_cp` int(3) NOT NULL AUTO_INCREMENT,
  `id_kejuaraan` int(3) NOT NULL,
  `nama_cp` varchar(120) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cp_panitia`
--

INSERT INTO `cp_panitia` (`id_cp`, `id_kejuaraan`, `nama_cp`, `no_telp`) VALUES
(1, 33, 'Syaifuddin', '085728508901'),
(2, 33, 'Syafrudin', '08786658849'),
(3, 32, 'Muwahhid', '0877289819'),
(4, 32, 'Shinta Sapta', '0814583929');

-- --------------------------------------------------------

--
-- Table structure for table `dojang`
--

CREATE TABLE IF NOT EXISTS `dojang` (
  `id_dojang` int(3) NOT NULL AUTO_INCREMENT,
  `nama_dojang` varchar(200) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `alamat_dojang` text NOT NULL,
  `no_telp` varchar(150) NOT NULL,
  PRIMARY KEY (`id_dojang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dojang`
--

INSERT INTO `dojang` (`id_dojang`, `nama_dojang`, `tgl_daftar`, `username`, `password`, `alamat_dojang`, `no_telp`) VALUES
(1, 'STMIK AKAKOM Yogyakarta', '2017-01-06', 'admin_akakom', '21232f297a57a5a743894a0e4a801fc3', 'Jl. Janti Yogyakarta', '085463728'),
(2, 'AMIKOM Yogyakarta', '2017-01-12', 'amikomYogya', '21232f297a57a5a743894a0e4a801fc3', 'Yogyakarta', '0878123453'),
(5, 'AKAKOM YK', '2017-01-21', 'adminku', '5136850b6c8f3ebc66122188347efda0', 'Yooogya', '085866558665');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_kejuaraan`
--

CREATE TABLE IF NOT EXISTS `kategori_kejuaraan` (
  `id_kategori` int(3) NOT NULL AUTO_INCREMENT,
  `id_kejuaraan` int(3) NOT NULL,
  `nama_kategori` varchar(120) NOT NULL,
  `biaya` int(7) NOT NULL,
  `status_kelompok` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `kategori_kejuaraan`
--

INSERT INTO `kategori_kejuaraan` (`id_kategori`, `id_kejuaraan`, `nama_kategori`, `biaya`, `status_kelompok`) VALUES
(1, 33, 'Kyourugi', 120000, 0),
(2, 33, 'Poomsae', 150000, 0),
(3, 32, 'Kyourugi', 150000, 0),
(4, 33, 'Poomsae', 210000, 0),
(5, 33, 'asd', 120000, 0),
(6, 36, 'Poomsae', 150000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kejuaraan`
--

CREATE TABLE IF NOT EXISTS `kejuaraan` (
  `id_kejuaraan` int(3) NOT NULL AUTO_INCREMENT,
  `id_pengda` int(3) NOT NULL,
  `nama_kejuaraan` varchar(200) NOT NULL,
  `tempat` varchar(300) NOT NULL,
  `tgl_pelaksanaan` date NOT NULL,
  `tgl_berakhir` date NOT NULL,
  `tgl_buka_daftar` date NOT NULL,
  `tgl_tutup_daftar` date NOT NULL,
  `id_panitia` int(3) NOT NULL,
  `status` int(1) NOT NULL,
  `detail` text NOT NULL,
  `nama_cp` varchar(120) NOT NULL,
  `telp_cp` varchar(120) NOT NULL,
  `foto` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kejuaraan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `kejuaraan`
--

INSERT INTO `kejuaraan` (`id_kejuaraan`, `id_pengda`, `nama_kejuaraan`, `tempat`, `tgl_pelaksanaan`, `tgl_berakhir`, `tgl_buka_daftar`, `tgl_tutup_daftar`, `id_panitia`, `status`, `detail`, `nama_cp`, `telp_cp`, `foto`) VALUES
(30, 1, 'AKAKOM CUP 2016', 'Bale Lantip STMIK AKAKOM Yogyakarta', '2016-09-12', '2016-09-13', '2016-08-01', '2016-09-12', 31, 1, '', '', '', ''),
(31, 1, 'UIN CUP Yogyakarta', 'GOR UIN Yogyakarta', '2016-10-10', '2016-10-10', '2016-09-05', '2016-10-03', 32, 1, '', '', '', ''),
(32, 1, 'Kejuaraan Daerah 2016', 'GOR KONI Bantul', '2016-12-20', '2016-12-21', '2016-11-07', '2016-12-12', 33, 1, '', '', '', ''),
(33, 1, 'AMIKOM CUP Yogyakarta', 'STMIK AMIKOM Yogyakarta', '2017-02-02', '2017-02-02', '2017-01-02', '2017-01-15', 34, 1, 'good sekali bgt good huhu hehehe<br>', 'Arief', '087866775', '33.png'),
(36, 1, 'AKAKOM Terbaru CUP', 'Bale Lantip', '2017-02-02', '2017-02-02', '2017-01-01', '2017-01-30', 39, 1, 'Syarat Terbaur<br>', '', '', '36.png'),
(37, 1, 'UGM CUP', 'GOR UGM Condong Catur', '2017-03-03', '2017-03-03', '2017-02-01', '2017-02-21', 40, 1, 'Untuk Melakukan bla bla bla<br>', 'Fulanah', '0878699504', '37.png');

-- --------------------------------------------------------

--
-- Table structure for table `kejuaraan_dojang`
--

CREATE TABLE IF NOT EXISTS `kejuaraan_dojang` (
  `id_kejuaraan_dojang` int(3) NOT NULL AUTO_INCREMENT,
  `id_kejuaraan` int(3) NOT NULL,
  `id_dojang` int(3) NOT NULL,
  PRIMARY KEY (`id_kejuaraan_dojang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `kejuaraan_dojang`
--

INSERT INTO `kejuaraan_dojang` (`id_kejuaraan_dojang`, `id_kejuaraan`, `id_dojang`) VALUES
(1, 33, 1),
(2, 32, 2),
(21, 37, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_kejuaraan`
--

CREATE TABLE IF NOT EXISTS `kelas_kejuaraan` (
  `id_kelas` int(3) NOT NULL AUTO_INCREMENT,
  `id_kejuaraan` int(3) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL,
  `min_berat` int(3) NOT NULL,
  `max_berat` int(3) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `kelas_kejuaraan`
--

INSERT INTO `kelas_kejuaraan` (`id_kelas`, `id_kejuaraan`, `nama_kelas`, `min_berat`, `max_berat`) VALUES
(1, 33, 'Under 50', 42, 49),
(3, 33, 'Under 70', 55, 69),
(17, 33, 'Under 39', 21, 38),
(22, 37, 'Under 50', 45, 50);

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pendaftaran`
--

CREATE TABLE IF NOT EXISTS `konfirmasi_pendaftaran` (
  `id_konfirmasi` int(3) NOT NULL AUTO_INCREMENT,
  `id_panitia` int(3) NOT NULL,
  `id_atlet` int(3) NOT NULL,
  `id_kejuaraan` int(3) NOT NULL,
  `tgl_konfirmasi` date NOT NULL,
  PRIMARY KEY (`id_konfirmasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `panitia`
--

CREATE TABLE IF NOT EXISTS `panitia` (
  `id_panitia` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `penyelenggara` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`id_panitia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `panitia`
--

INSERT INTO `panitia` (`id_panitia`, `username`, `password`, `penyelenggara`, `alamat`) VALUES
(31, 'kejuaraan_110117', 'e2061d89eecdbca1a57f598a75d9e460', 'STMIK AKAKOM Yogyakarta', 'Jl. Janti, Yogyakarta\r\n'),
(32, 'kejuaraan_110117', '20d15dbafc9d307b8e39ef545fa1e834', 'UIN Yogyakarta', 'Universitas Islam Negeri Yogyakarta'),
(33, 'kejuaraan_110117', 'f6e75b67732d8796459d79192fe3d613', 'Dojang Bantul', 'Bantul'),
(34, 'amikom', '21232f297a57a5a743894a0e4a801fc3', 'AMIKOM Yogyakarta', 'Yogyakarta'),
(35, 'kejuaraan_130117', '2045cc18d92d57e9f022083603b08077', 'AKAKOM ', 'Yogyakarta'),
(36, 'admin_AKAKOM', '', '', ''),
(37, 'adminku', '', '', ''),
(38, 'kejuaraan_230117', '7a0605d5257eac9670bd526c2ea8a07a', 'AKAKOM ', 'Janti fleover'),
(39, 'kejuaraan_250117', '21232f297a57a5a743894a0e4a801fc3', 'AKAKOM Yogyakarta', 'Yogyakarta, Jalan Janti pojok\r\n'),
(40, 'kejuaraan_270117', '800069aff022a8931a8e983f556e6dfc', 'UGM', 'Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `pelatih`
--

CREATE TABLE IF NOT EXISTS `pelatih` (
  `id_pelatih` int(3) NOT NULL AUTO_INCREMENT,
  `id_kejuaraan_dojang` int(3) NOT NULL,
  `nama_pelatih` varchar(120) NOT NULL,
  `sertifikat` varchar(120) NOT NULL,
  `sabuk` varchar(10) NOT NULL,
  `telp_pelatih` varchar(20) NOT NULL,
  `alamat_pelatih` text NOT NULL,
  `foto_pelatih` varchar(120) NOT NULL,
  PRIMARY KEY (`id_pelatih`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `pelatih`
--

INSERT INTO `pelatih` (`id_pelatih`, `id_kejuaraan_dojang`, `nama_pelatih`, `sertifikat`, `sabuk`, `telp_pelatih`, `alamat_pelatih`, `foto_pelatih`) VALUES
(1, 1, 'Joko', '2123100', 'Merah', '09812093', 'Yogyakarta', '1.png'),
(14, 21, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int(3) NOT NULL AUTO_INCREMENT,
  `kode_bayar` varchar(20) NOT NULL,
  `id_kejuaraan_dojang` int(3) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jumlah_bayar` int(7) NOT NULL,
  `nama_pembayar` varchar(120) NOT NULL,
  `no_rekening` varchar(80) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `kode_bayar`, `id_kejuaraan_dojang`, `tgl_bayar`, `jumlah_bayar`, `nama_pembayar`, `no_rekening`, `nama_bank`, `pesan`) VALUES
(1, '180117', 1, '2017-01-17', 540000, 'Muhammad Abdullah Al Muwahhid', '091882881', 'BRI', 'Mas, ini sudah saya bayar sebanyak blablabla'),
(3, '220117', 1, '2017-01-22', 540000, 'Muwahhid', '098278191', 'BRI', 'Hei ini sudah ta bayar pret'),
(4, '220117', 1, '2017-01-22', 120000, 'Muhammad Abdullah Al Muwahhid', '098817871', 'BRI', 'Sudah bayarr gann'),
(5, '240117', 1, '2017-01-24', 540000, 'Al Muwahhid', '029919', 'BRI', 'Hwi ini '),
(6, '270117', 20, '2017-01-27', 1000000, 'Wahid', '1203981023', 'BRI', 'Sudah saya kirim nih');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus_daerah`
--

CREATE TABLE IF NOT EXISTS `pengurus_daerah` (
  `id_pengda` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) NOT NULL,
  `jk` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`id_pengda`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pengurus_daerah`
--

INSERT INTO `pengurus_daerah` (`id_pengda`, `nama`, `jk`, `alamat`, `telp`, `username`, `password`) VALUES
(1, 'Muhammad Abdullah Al Muwahhid', 'Laki - Laki', 'Yogyakarta', '085728508901', 'admin', '21232f297a57a5a743894a0e4a801fc3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
