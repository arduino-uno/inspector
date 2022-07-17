-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 13, 2022 at 07:46 PM
-- Server version: 10.4.25-MariaDB-1:10.4.25+maria~focal
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inspector_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota_tbl`
--

CREATE TABLE `anggota_tbl` (
  `NO` int(11) NOT NULL,
  `no_urut` varchar(20) NOT NULL,
  `kode_auk` varchar(20) DEFAULT NULL,
  `tipe_auk` varchar(20) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `nama_pemeriksa` varchar(50) NOT NULL,
  `tgl_periksa` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `dokumen_arr` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tgl_register` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_tbl`
--

INSERT INTO `anggota_tbl` (`NO`, `no_urut`, `kode_auk`, `tipe_auk`, `NIP`, `nama_lengkap`, `email`, `no_telp`, `password`, `kelamin`, `tempat_lahir`, `tgl_lahir`, `nama_pemeriksa`, `tgl_periksa`, `dokumen_arr`, `status`, `tgl_register`) VALUES
(1, '0001', '120220001', '1', 'ID1234567890', 'Agah Nata', 'hashcat80@gmail.com', '+628139999', '5F4DCC3B5AA765D61D8327DEB882CF99', 'Laki-laki', 'Serang', '2022-06-12 06:55:39', 'Ibnu Muakhori', '2022-06-12 06:55:39', '', 0, '2022-06-12 06:55:39'),
(2, '0002', '220220002', '2', 'ID22221234', 'Ibnu Muakhori', 'muakhori@gmail.com', '+62888888', '5F4DCC3B5AA765D61D8327DEB882CF99', 'Laki-laki', 'Jakarta', '2022-06-12 06:55:42', 'Pak Jokowi', '2022-06-12 06:55:42', '', 0, '2022-06-12 06:55:42'),
(3, '0003', '120220003', '1', 'ID12345678', 'Agah Nathan', 'admin@sintara.co.id', '+62-9999999___', '5F4DCC3B5AA765D61D8327DEB882CF99', 'Laki-laki', 'Bandung', '2022-06-12 07:10:53', 'Pak Bambang', '2022-06-12 07:10:53', 'a:5:{i:0;s:13:\"slip_gaji.png\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";i:4;s:0:\"\";}', 1, '2022-06-12 07:10:53'),
(4, '0004', '120220004', '1', 'ID12345678', 'Irfan Jaya', 'irfan_jaya@sintara.co.id', '+62-9999999000', '5F4DCC3B5AA765D61D8327DEB882CF99', 'Laki-laki', 'Bandung', '2022-06-12 07:10:59', 'Pak Bambang', '2022-06-12 07:10:59', 'a:5:{i:0;s:18:\"street-black-3.jpg\";i:1;s:13:\"slip_gaji.png\";i:2;s:0:\"\";i:3;s:0:\"\";i:4;s:0:\"\";}', 0, '2022-06-12 07:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `ditolak_tbl`
--

CREATE TABLE `ditolak_tbl` (
  `NO` int(11) NOT NULL,
  `kode_auk` varchar(20) NOT NULL,
  `alasan` text NOT NULL,
  `tgl_penolakan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ditolak_tbl`
--

INSERT INTO `ditolak_tbl` (`NO`, `kode_auk`, `alasan`, `tgl_penolakan`) VALUES
(22, '220220002', 'Kurang lengkap\n', '2022-06-13 05:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_tbl`
--

CREATE TABLE `pengguna_tbl` (
  `NO` int(11) NOT NULL,
  `kode_auk` varchar(20) NOT NULL,
  `NIP` varchar(50) NOT NULL,
  `user_login` varchar(50) DEFAULT NULL,
  `user_pass` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tgl_register` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `role` varchar(50) NOT NULL DEFAULT 'member',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `image` mediumtext DEFAULT NULL,
  `f_link` varchar(100) DEFAULT NULL,
  `t_link` varchar(100) DEFAULT NULL,
  `y_link` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengguna_tbl`
--

INSERT INTO `pengguna_tbl` (`NO`, `kode_auk`, `NIP`, `user_login`, `user_pass`, `nama_lengkap`, `email`, `no_telp`, `alamat`, `tgl_register`, `role`, `status`, `image`, `f_link`, `t_link`, `y_link`) VALUES
(1, '#ADMIN-01', '999999999', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Agha Nathan', 'hashcat80@gmail.com', '+62 852 1642 7652', '', '2022-06-12 10:36:21', 'administrator', 1, 'thumb-1.jpg', 'https://www.facebook.com/okidant', 'https://twitter.com/0kidan', 'https://www.youtube.com/channel/UCbVRfgBn7F1-2D8EPwbBx6A'),
(2, '120220004', 'ID12345678', '120220004', '5f4dcc3b5aa765d61d8327deb882cf99', 'Irfan Jaya', 'irfan_jaya@sintara.co.id', '+62 852 1642 7652', 'NYC, USA', '2022-06-13 00:43:54', 'member', 1, 'thumb-2.jpg', '', '', ''),
(14, '120220003', 'ID12345678', '120220003', '5F4DCC3B5AA765D61D8327DEB882CF99', 'Agah Nathan', 'admin@sintara.co.id', '+62-9999999___', NULL, '2022-06-13 10:48:16', 'member', 1, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_tbl`
--
ALTER TABLE `anggota_tbl`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `ditolak_tbl`
--
ALTER TABLE `ditolak_tbl`
  ADD PRIMARY KEY (`NO`);

--
-- Indexes for table `pengguna_tbl`
--
ALTER TABLE `pengguna_tbl`
  ADD PRIMARY KEY (`NO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_tbl`
--
ALTER TABLE `anggota_tbl`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `ditolak_tbl`
--
ALTER TABLE `ditolak_tbl`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pengguna_tbl`
--
ALTER TABLE `pengguna_tbl`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
