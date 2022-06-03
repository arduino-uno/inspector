-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2022 at 09:54 AM
-- Server version: 10.4.25-MariaDB-1:10.4.25+maria~bionic
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
  `password` varchar(20) NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `nama_pemeriksa` varchar(50) NOT NULL,
  `tgl_periksa` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dokumen_arr` varchar(50) NOT NULL,
  `tgl_register` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota_tbl`
--

INSERT INTO `anggota_tbl` (`NO`, `no_urut`, `kode_auk`, `tipe_auk`, `NIP`, `nama_lengkap`, `email`, `no_telp`, `password`, `kelamin`, `tempat_lahir`, `tgl_lahir`, `nama_pemeriksa`, `tgl_periksa`, `dokumen_arr`, `tgl_register`) VALUES
(1, '0001', 'A20220001', 'A', 'ID1234567890', 'Agah Nata', 'hashcat80@gmail.com', '+628139999', 'admin', 'Laki-laki', 'Serang', '2022-05-31 20:11:12', 'Ibnu Muakhori', '2022-05-31 20:11:12', '', '2022-04-30 20:10:56'),
(2, '0002', 'A20220002', 'A', 'ID22221234', 'Ibnu Muakhori', 'muakhori@gmail.com', '+62888888', 'admin', 'Laki-laki', 'Jakarta', '2022-05-31 20:10:07', 'Pak Jokowi', '2022-05-31 20:10:07', '', '2022-05-31 20:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `ditolak_tbl`
--

CREATE TABLE `ditolak_tbl` (
  `NO` int(11) NOT NULL,
  `kode_auk` varchar(20) NOT NULL,
  `tgl_register` timestamp NULL DEFAULT NULL,
  `alasan` text NOT NULL,
  `tgl_penolakan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ditolak_tbl`
--

INSERT INTO `ditolak_tbl` (`NO`, `kode_auk`, `tgl_register`, `alasan`, `tgl_penolakan`) VALUES
(1, 'A20221234', '2022-06-02 02:51:50', 'Test', '2022-06-02 02:52:59'),
(2, 'A20221234', '2022-06-02 02:52:00', 'Test', '2022-06-02 02:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `NIK` varchar(50) NOT NULL,
  `user_login` varchar(50) DEFAULT NULL,
  `user_pass` varchar(50) DEFAULT NULL,
  `user_fullname` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_phone` varchar(50) DEFAULT NULL,
  `user_address` text NOT NULL,
  `user_registered` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_role` varchar(50) NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_avatar` mediumtext DEFAULT NULL,
  `f_link` varchar(100) NOT NULL,
  `t_link` varchar(100) NOT NULL,
  `y_link` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `NIK`, `user_login`, `user_pass`, `user_fullname`, `user_email`, `user_phone`, `user_address`, `user_registered`, `user_role`, `user_status`, `user_avatar`, `f_link`, `t_link`, `y_link`) VALUES
(1, 'C001', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Agha Nathan', 'hashcat80@gmail.com', '+62 852 1642 7652', '', '2018-04-28 13:51:27', 'Administrator', 1, 'thumb-1.jpg', 'https://www.facebook.com/okidant', 'https://twitter.com/0kidan', 'https://www.youtube.com/channel/UCbVRfgBn7F1-2D8EPwbBx6A'),
(2, 'C002', 'hayley', '21232f297a57a5a743894a0e4a801fc3', 'Hayley Williams', 'hayley@paramore.net', '+62 852 1642 7652', 'NYC, USA', '2018-01-19 07:19:33', 'Staff', 1, 'thumb-2.jpg', '', '', ''),
(75, 'C003', 'ujank', '21232f297a57a5a743894a0e4a801fc3', 'Ujank BlekoQ', 'ujank@bitdrope.com', '1234567890', 'Bandung', '2018-02-21 01:33:21', 'Staff', 1, 'male.png', '', '', '');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_tbl`
--
ALTER TABLE `anggota_tbl`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ditolak_tbl`
--
ALTER TABLE `ditolak_tbl`
  MODIFY `NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
