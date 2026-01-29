-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2026 at 11:12 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pwd2025`
--
CREATE DATABASE IF NOT EXISTS `db_pwd2025` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_pwd2025`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_biodata_daftar_pengunjung`
--

CREATE TABLE `tbl_biodata_daftar_pengunjung` (
  `cid` int(11) NOT NULL,
  `zkode_pengunjung` varchar(100) DEFAULT NULL,
  `znama_pengunjung` varchar(100) DEFAULT NULL,
  `zalamat_rumah` varchar(100) DEFAULT NULL,
  `ztanggal_kunjungan` varchar(100) DEFAULT NULL,
  `zhobi` varchar(100) DEFAULT NULL,
  `zasal_SLTA` varchar(100) DEFAULT NULL,
  `zpekerjaan` varchar(100) DEFAULT NULL,
  `znama_orang_tua` varchar(100) DEFAULT NULL,
  `znama_pacar` varchar(100) DEFAULT NULL,
  `znama_mantan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_biodata_daftar_pengunjung`
--

INSERT INTO `tbl_biodata_daftar_pengunjung` (`cid`, `zkode_pengunjung`, `znama_pengunjung`, `zalamat_rumah`, `ztanggal_kunjungan`, `zhobi`, `zasal_SLTA`, `zpekerjaan`, `znama_orang_tua`, `znama_pacar`, `znama_mantan`) VALUES
(1, 'wqw', 'qw', 'qw', 'qw', 'qw', 'qw', 'qw', 'qw', 'qw', 'qw'),
(2, 'wqw', 'qwq', 'wq', 'wq', 'wq', 'w', 'qw', 'qw', 'qw', 'q');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa_amik`
--

CREATE TABLE `tbl_mahasiswa_amik` (
  `cid` int(11) NOT NULL,
  `cnim` varchar(100) DEFAULT NULL,
  `cnama_lengkap` varchar(100) DEFAULT NULL,
  `ctempat_lahir` varchar(100) DEFAULT NULL,
  `ctanggal_lahir` varchar(100) DEFAULT NULL,
  `chobi` varchar(100) DEFAULT NULL,
  `cpasangan` varchar(100) DEFAULT NULL,
  `cpekerjaan` varchar(100) DEFAULT NULL,
  `cnama_orang_tua` varchar(100) DEFAULT NULL,
  `cnama_kaka` varchar(100) DEFAULT NULL,
  `cnama_adik` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mahasiswa_amik`
--

INSERT INTO `tbl_mahasiswa_amik` (`cid`, `cnim`, `cnama_lengkap`, `ctempat_lahir`, `ctanggal_lahir`, `chobi`, `cpasangan`, `cpekerjaan`, `cnama_orang_tua`, `cnama_kaka`, `cnama_adik`) VALUES
(1, '2522500074', 'khairaan yamani', 'bekasi', '21 mei 2006', 'main game', 'adaaaa gak ya', 'mahasiswa', 'intan/abu', 'khairaan', 'lobowsann'),
(3, '11111111111111111', '11111111111', '1', '1', '1', '1', '1', '1', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tamu`
--

CREATE TABLE `tbl_tamu` (
  `cid` int(11) NOT NULL,
  `cnama` varchar(100) DEFAULT NULL,
  `cemail` varchar(100) DEFAULT NULL,
  `cpesan` text,
  `dcreated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tamu`
--

INSERT INTO `tbl_tamu` (`cid`, `cnama`, `cemail`, `cpesan`, `dcreated_at`) VALUES
(1, 'Yohanes Setiawan Japriadi', 'ysetiawanj@atmaluhur.ac.id', 'Ayo yang teliti belajar pemrograman web dasarnya, jangan membiasakan typo', '2025-12-16 11:00:25'),
(2, 'Gracella Edrea Japriadi', 'cellajapriadi@gmail.com', 'ayo kakak-kakak yang semangat belajarnya', '2025-12-16 11:00:25'),
(3, 'Wulan Dari Belinyu', 'wulanbly@gmail.com', 'aku pasti menang', '2025-12-16 11:00:25'),
(4, 'Melvyn Hadi Santo M.Kom.', 'hadi.melvyn@gmail.com', 'Maju tak gentar membela yang benar, pendaftaran selalu di awal, tetapi penyesalan selalu di akhir', '2025-12-16 11:00:25'),
(5, 'Nabila Saskia Gotik', 'nabila@gotik.com', 'Adit rambut bagus banget, dikuncir lagi', '2025-12-16 11:00:25'),
(6, 'Redia Cakep', 'redia@cakep.com', 'walau hujan aku tetap semangat', '2025-12-16 11:00:25'),
(7, 'Junaidi Hadiwijaya', 'juned@gmail.com', 'Saya mau jadi dosen di atma luhur', '2025-12-16 11:00:25'),
(9, 'Adit Ganteng Banget', 'adit@goku.com', 'Adit mirip son goku sebelum gunting rambut', '2025-12-16 11:00:25'),
(10, 'iyan', '2522500075@mahasiswa.atmaluhur.ac.id', 'asdfghjkllklm', '2026-01-29 13:28:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_biodata_daftar_pengunjung`
--
ALTER TABLE `tbl_biodata_daftar_pengunjung`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_mahasiswa_amik`
--
ALTER TABLE `tbl_mahasiswa_amik`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_biodata_daftar_pengunjung`
--
ALTER TABLE `tbl_biodata_daftar_pengunjung`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_mahasiswa_amik`
--
ALTER TABLE `tbl_mahasiswa_amik`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_tamu`
--
ALTER TABLE `tbl_tamu`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
