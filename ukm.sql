-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2015 at 10:27 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ukm`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `id_akun` int(11) NOT NULL AUTO_INCREMENT,
  `kd_ukm` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(11) NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id_akun`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `kd_ukm`, `username`, `password`, `level`, `last_login`) VALUES
(1, 3, 'himaproti', '21232f297a57a5a743894a0e4a801fc3', 2, '2015-04-18 08:26:04'),
(2, 2, 'agung', 'e59cd3ce33a68f536c19fedb82a7936f', 2, '2015-04-16 11:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `kd_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) NOT NULL,
  `kd_ukm` int(11) NOT NULL,
  PRIMARY KEY (`kd_anggota`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`kd_anggota`, `nim`, `kd_ukm`) VALUES
(4, 201151255, 3),
(5, 201151260, 3);

-- --------------------------------------------------------

--
-- Table structure for table `apbu`
--

CREATE TABLE IF NOT EXISTS `apbu` (
  `id_apbu` int(11) NOT NULL AUTO_INCREMENT,
  `kd_ukm` int(11) NOT NULL,
  `thn_pengambilan` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL DEFAULT '',
  `file` varchar(100) NOT NULL,
  PRIMARY KEY (`id_apbu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `apbu`
--

INSERT INTO `apbu` (`id_apbu`, `kd_ukm`, `thn_pengambilan`, `jumlah`, `keterangan`, `file`) VALUES
(1, 3, '2015-04-19', 4000000, 'Menunggu', 'apbu/proposal_Himapro TI_2015.docx');

-- --------------------------------------------------------

--
-- Table structure for table `bendahara`
--

CREATE TABLE IF NOT EXISTS `bendahara` (
  `id_bendahara` int(4) NOT NULL AUTO_INCREMENT,
  `id` varchar(7) NOT NULL,
  `kd_ukm` int(11) NOT NULL,
  `pemasukan` int(8) NOT NULL,
  `pengeluaran` int(8) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_bendahara`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `bendahara`
--

INSERT INTO `bendahara` (`id_bendahara`, `id`, `kd_ukm`, `pemasukan`, `pengeluaran`, `keterangan`, `date`) VALUES
(16, '2', 3, 0, 50000, 'konsumsi rapat', '2015-04-17 09:55:15'),
(15, '1', 3, 0, 2500000, 'konsumsi', '2015-04-17 09:52:18'),
(14, '1', 3, 1000000, 0, 'dana sponsor djarum', '2015-04-17 09:48:51'),
(13, '1', 3, 2000000, 0, 'apbu', '2015-04-17 09:46:02');

-- --------------------------------------------------------

--
-- Table structure for table `dokumentasi`
--

CREATE TABLE IF NOT EXISTS `dokumentasi` (
  `kd_dokumentasi` int(11) NOT NULL AUTO_INCREMENT,
  `kd_ukm` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `dokumentasi` varchar(100) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_dokumentasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dokumentasi`
--

INSERT INTO `dokumentasi` (`kd_dokumentasi`, `kd_ukm`, `id`, `dokumentasi`, `keterangan`) VALUES
(1, 3, 1, 'dokumentasi/imgkegiatan seminar nasional.jpg', 'kegiatan seminar nasional'),
(2, 3, 1, 'dokumentasi/imgkegiatan lomba.jpg', 'kegiatan lomba'),
(3, 3, 1, 'dokumentasi/imgkegiatan memasak.jpg', 'kegiatan memasak'),
(4, 3, 2, 'dokumentasi/imgrapat.jpg', 'rapat'),
(5, 3, 2, 'dokumentasi/imgtidur.jpg', 'tidur');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE IF NOT EXISTS `inventaris` (
  `kd_inventaris` int(8) NOT NULL AUTO_INCREMENT,
  `kd_ukm` int(11) NOT NULL,
  `nama_barang` varchar(20) NOT NULL,
  `jumlah_barang` int(3) NOT NULL,
  `kondisi` varchar(10) NOT NULL,
  `update_tgl` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`kd_inventaris`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`kd_inventaris`, `kd_ukm`, `nama_barang`, `jumlah_barang`, `kondisi`, `update_tgl`, `status`) VALUES
(1, 3, 'Sound', 2, 'Baik', '2015-04-18 00:00:00', 'kembali'),
(2, 3, 'MIC', 2, 'Baik', '2015-04-18 00:00:00', 'kembali'),
(3, 3, 'Proyektor', 1, 'Baik', '2015-04-18 08:39:55', 'kembali');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `kd_ukm` int(11) NOT NULL,
  `nama_kegiatan` varchar(30) NOT NULL,
  `ketua` varchar(30) NOT NULL,
  `tempat` varchar(30) NOT NULL,
  `tanggal_kegiatan` date NOT NULL DEFAULT '0000-00-00',
  `photo` varchar(200) NOT NULL,
  `status` varchar(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `kd_ukm`, `nama_kegiatan`, `ketua`, `tempat`, `tanggal_kegiatan`, `photo`, `status`) VALUES
(1, 3, 'IT FEST', '', 'Auditorium UMK', '2015-04-23', 'photo/23293-morphling-dota-2-1680x1050-game-wallpaper.jpg', ''),
(2, 3, 'harian', '', 'himaproti', '0000-00-00', 'photo/dota2void.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `kepanitiaan`
--

CREATE TABLE IF NOT EXISTS `kepanitiaan` (
  `kd_kepanitiaan` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `ketua` varchar(30) NOT NULL,
  `sekretaris` varchar(30) NOT NULL,
  `bendahara` varchar(30) NOT NULL,
  `koordinator1` varchar(30) NOT NULL,
  `koordinator2` varchar(30) NOT NULL,
  `koordinator3` varchar(30) NOT NULL,
  `koordinator4` varchar(30) NOT NULL,
  PRIMARY KEY (`kd_kepanitiaan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `kepanitiaan`
--


-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(9) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `telp` varchar(14) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jns_kelamin` varchar(1) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `fakultas` varchar(10) NOT NULL,
  `progdi` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `alamat`, `kota`, `telp`, `agama`, `email`, `tempat_lahir`, `tanggal_lahir`, `jns_kelamin`, `angkatan`, `fakultas`, `progdi`, `photo`) VALUES
('201151255', 'Agung Rifqi Hidayat', 'Prambatan Lor', 'Kudus', '085740661942', 'ISLAM', 'rayqiri@gmail.com', 'Kudus', '1993-05-11', 'L', 2011, 'teknik', 'Teknik Informatika', 'photo/23293-morphling-dota-2-1680x1050-game-wallpaper.jpg'),
('201151260', 'Arofik', 'Jepara', 'Jepara', '085740661942', 'ISLAM', 'slim-nia@yahoo.com', 'Kudus', '1993-01-05', 'L', 2011, 'teknik', 'Teknik Informatika', 'photo/ikhwan-itu-bernama.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `material_sponsor`
--

CREATE TABLE IF NOT EXISTS `material_sponsor` (
  `kd_material_sponsor` int(11) NOT NULL AUTO_INCREMENT,
  `id_sponsor` int(11) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`kd_material_sponsor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `material_sponsor`
--

INSERT INTO `material_sponsor` (`kd_material_sponsor`, `id_sponsor`, `jenis`, `jumlah`) VALUES
(5, 4, 'uang', 2000000),
(4, 4, 'barang', 20);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE IF NOT EXISTS `pinjam` (
  `id_pinjam` int(3) NOT NULL AUTO_INCREMENT,
  `kd_inventaris` varchar(8) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `prodi` varchar(20) NOT NULL,
  `jml_pinjam` int(3) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `update_date` date NOT NULL,
  PRIMARY KEY (`id_pinjam`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `kd_inventaris`, `nim`, `nama`, `prodi`, `jml_pinjam`, `tgl_pinjam`, `update_date`) VALUES
(1, 'hmj-001', '201151255', 'agung', 'TI', 1, '2013-04-17', '2013-04-17'),
(2, 'hmj-002', '201151255', 'agung', 'TI', 80, '2013-04-17', '2013-04-17'),
(3, 'hmj-001', '201151255', 'agung', 'TI', 1, '2013-04-18', '0000-00-00'),
(4, '3', '201151158', 'Ojan', '', 1, '2015-04-19', '0000-00-00'),
(5, '1', '201151260', 'Arofik', '', 1, '2015-04-20', '0000-00-00'),
(6, '2', '201151158', 'Ojan', '', 2, '2015-04-20', '0000-00-00'),
(7, '2', '201151158', 'Ojan', '', 1, '2015-04-19', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `preesensi_rapat`
--

CREATE TABLE IF NOT EXISTS `preesensi_rapat` (
  `kd_presensi` int(11) NOT NULL AUTO_INCREMENT,
  `id_rapat` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`kd_presensi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `preesensi_rapat`
--


-- --------------------------------------------------------

--
-- Table structure for table `progdi`
--

CREATE TABLE IF NOT EXISTS `progdi` (
  `kd_progdi` int(11) NOT NULL AUTO_INCREMENT,
  `nm_progdi` varchar(20) NOT NULL,
  PRIMARY KEY (`kd_progdi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `progdi`
--

INSERT INTO `progdi` (`kd_progdi`, `nm_progdi`) VALUES
(1, 'Teknik Informatika'),
(2, 'Teknik Mesin');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE IF NOT EXISTS `proposal` (
  `kd_proposal` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `jenis_proposal` varchar(30) NOT NULL,
  `file` varchar(50) NOT NULL,
  `tgl_proposal` date NOT NULL,
  PRIMARY KEY (`kd_proposal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`kd_proposal`, `id`, `jenis_proposal`, `file`, `tgl_proposal`) VALUES
(2, 1, 'proposal sponsor', 'proposal/proposal sponsor.docx', '2015-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `rapat`
--

CREATE TABLE IF NOT EXISTS `rapat` (
  `id_rapat` int(4) NOT NULL AUTO_INCREMENT,
  `kd_ukm` int(11) NOT NULL,
  `id` varchar(7) NOT NULL,
  `judul` varchar(20) NOT NULL,
  `tempat_rapat` varchar(20) NOT NULL,
  `jam` time NOT NULL,
  `tanggal_rapat` date NOT NULL,
  `jumlah_presensi` int(2) NOT NULL,
  `hasil_rapat` text NOT NULL,
  PRIMARY KEY (`id_rapat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rapat`
--

INSERT INTO `rapat` (`id_rapat`, `kd_ukm`, `id`, `judul`, `tempat_rapat`, `jam`, `tanggal_rapat`, `jumlah_presensi`, `hasil_rapat`) VALUES
(2, 0, 'hmj-001', 'Pembahasan Konsumsi', 'Bem ', '13:00:00', '2013-04-03', 0, 'rapat/Pembahasan Konsumsi.docx'),
(3, 3, '1', 'pengambilan sponsor', 'base himapro ti', '14:00:00', '2015-04-17', 20, 'rapat/pengambilan sponsor.docx');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE IF NOT EXISTS `sponsor` (
  `id_sponsor` int(4) NOT NULL AUTO_INCREMENT,
  `kd_ukm` int(11) NOT NULL,
  `id` varchar(7) NOT NULL,
  `nama_instansi` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_sponsor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`id_sponsor`, `kd_ukm`, `id`, `nama_instansi`, `tanggal`) VALUES
(4, 3, '1', 'Djarum', '2015-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `subkegiatan`
--

CREATE TABLE IF NOT EXISTS `subkegiatan` (
  `kd_subkegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `nm_subkegiatan` varchar(50) NOT NULL,
  `tempat_subkegiatan` varchar(30) NOT NULL,
  `tgl_subkegiatan` date NOT NULL,
  PRIMARY KEY (`kd_subkegiatan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `subkegiatan`
--

INSERT INTO `subkegiatan` (`kd_subkegiatan`, `id`, `nm_subkegiatan`, `tempat_subkegiatan`, `tgl_subkegiatan`) VALUES
(1, 1, 'Seminar Nasional', 'Auditorium UMK', '2015-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE IF NOT EXISTS `surat` (
  `id_surat` int(3) NOT NULL AUTO_INCREMENT,
  `kd_ukm` int(11) NOT NULL,
  `id` varchar(7) NOT NULL,
  `jns_surat` varchar(12) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `link` text NOT NULL,
  `tgl_surat` date NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `surat`
--

INSERT INTO `surat` (`id_surat`, `kd_ukm`, `id`, `jns_surat`, `no_surat`, `link`, `tgl_surat`) VALUES
(1, 0, 'hmj-001', 'surat keluar', '1/IV/13', 'http://www.mediafire.com', '2013-04-18'),
(2, 0, 'hmj-001', 'surat masuk', '1\\wae\\VI\\2014', 'surat/surat masuk.docx', '2014-06-09'),
(3, 3, '1', 'surat keluar', '12514', 'surat/surat keluar.docx', '2015-04-18');

-- --------------------------------------------------------

--
-- Table structure for table `tuser`
--

CREATE TABLE IF NOT EXISTS `tuser` (
  `IdUser` int(11) NOT NULL AUTO_INCREMENT,
  `NIP` varchar(8) NOT NULL,
  `NamaLengkap` varchar(100) NOT NULL,
  `Alamat` text NOT NULL,
  `Telepon` varchar(20) NOT NULL,
  `CellPhone` varchar(20) NOT NULL,
  `Agama` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Aktif` char(1) NOT NULL,
  `Level` char(1) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `IdPendidikanTerakhir` int(11) NOT NULL,
  `LastLogin` datetime NOT NULL,
  `LastUpdateDate` datetime NOT NULL,
  `LastUpdateUser` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `CreatedUser` int(11) NOT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tuser`
--

INSERT INTO `tuser` (`IdUser`, `NIP`, `NamaLengkap`, `Alamat`, `Telepon`, `CellPhone`, `Agama`, `Email`, `Aktif`, `Level`, `Username`, `Password`, `IdPendidikanTerakhir`, `LastLogin`, `LastUpdateDate`, `LastUpdateUser`, `CreatedDate`, `CreatedUser`) VALUES
(1, '', 'Administrator', '', '', '', '', '', 'Y', '1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, '2014-12-29 07:30:43', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, '65367537', 'Kristian', '', '', '', 'Islam', 'rayqiri@gmail.com', 'Y', '2', 'kristian', 'f82b3a3f2786107859afbe386cca8255', 0, '2014-12-29 07:29:27', '0000-00-00 00:00:00', 0, '2013-04-15 19:50:41', 1),
(7, '20115125', 'Agung Rifqi Hidayat', '', '', '', 'Islam', 'rayqiri@gmail.com', 'Y', '3', '201151255', 'e59cd3ce33a68f536c19fedb82a7936f', 0, '2014-12-29 07:29:19', '2013-04-20 11:22:22', 0, '2013-04-17 11:59:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ukm`
--

CREATE TABLE IF NOT EXISTS `ukm` (
  `kd_ukm` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ukm` varchar(50) NOT NULL,
  `logo` varchar(100) NOT NULL,
  PRIMARY KEY (`kd_ukm`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ukm`
--

INSERT INTO `ukm` (`kd_ukm`, `nama_ukm`, `logo`) VALUES
(1, 'BEM Universitas', ''),
(2, 'BEM Teknik', ''),
(3, 'Himapro TI', ''),
(4, 'Himapro SI', '');
