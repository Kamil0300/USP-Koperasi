-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 09:31 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arthamukti`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `akses` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `nama`, `email`, `password`, `akses`, `status`) VALUES
(1, 'usp', 'usp@arthamukti.koperasi', '63e7c67d0c2b074414df98070183decf', 1, 1),
(2, 'pegawai', 'pegawai@arthamukti.koperasi', 'b69706c80477d3d04ecc1d8f62cdb35a', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `NIK` bigint(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `JK` char(2) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `dana_kematian` double NOT NULL,
  `simpanan_wajib` double NOT NULL,
  `simpanan_pokok` double NOT NULL,
  `nak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `NIK`, `nama`, `tgl_lahir`, `JK`, `alamat`, `jabatan`, `dana_kematian`, `simpanan_wajib`, `simpanan_pokok`, `nak`) VALUES
(13, 3278030309000009, 'Kamil', '2000-09-03', 'L', 'Jl.PGRI barat No.15, RT.005/RW.010 Kel.Lengokongsari, Kec.Tawang, Kota Bandung', 'Biasa', 50000, 200000, 50000, 'NAK-003'),
(16, 3278030305000005, 'Roland Rahastian', '2001-06-07', 'L', 'Jl.cendrawasih No.13, Rt.010/Rw.020 Kec.Tawang, Kel.Lengkongsari, Kota Tasikmalaya', 'Luar Biasa', 50000, 100000, 50000, 'NAK-004'),
(17, 3278030303000003, 'Wahyu Setiyanto', '1999-11-16', 'L', 'Jl.Bebedahan No.09, Rt.02/Rw.015 Kel.Lengkongsari, Kec.Tawang, Kota Tasikmalaya', 'Luar Biasa', 50000, 100000, 50000, 'NAK-005'),
(18, 3278030310000010, 'Lora Septa Minda', '2000-09-18', 'P', 'Jl.PGRI timur No.44, Rt.011/Rw.004, Kel.Lengkongsari, Kec.Tawang Kota Tasikmalaya', 'Biasa', 50000, 50000, 50000, 'NAK-006'),
(19, 3278030308000008, 'Ujang Adi', '1996-01-17', 'L', 'Jl.Indihiang No.20, Rt.09/Rw.02, Kel.Parakan, Kec.Indihiang, Kota Tasikmalaya', 'Luar Biasa', 50000, 150000, 50000, 'NAK-007'),
(20, 3278030306000006, 'Yayat Ruhiyat', '1994-05-20', 'L', 'Jl.Hz Mustofa No.100, Rt.05/Rw.010 Kec.Cihideung, Kel.Nagarawangi Kota Tasikmalaya', 'Biasa', 50000, 50000, 50000, 'NAK-008'),
(21, 3278030311000011, 'Yanti Nuryanti', '1995-10-17', 'P', 'Jl.Hz Mustofa No.99, Rt.01/Rw.05, Kec.Cihideung, Kel.Argasari, Kota Tasikmalaya', 'Luar Biasa', 50000, 50000, 50000, 'NAK-009'),
(22, 3278030302000002, 'Ferdi Satria', '2000-05-10', 'L', 'Jl.Padasuka No.11, Rt.010/Rw.001, Kec.Tawang, Kel.Lengkongsari, Kota Tasikmalaya', 'Luar Biasa', 50000, 50000, 50000, 'NAK-010'),
(23, 3278030344000044, 'Leni Agustini', '1996-05-16', 'P', 'Jl.PGRI timur No.08, Rw.15/Rw.01, Kec.Tawang, Kel.Lengkongsari, Kota Tasikmalya', 'Biasa', 50000, 100000, 50000, 'NAK-011'),
(24, 3278030300000000, 'Kokom Markokom', '1996-05-16', 'P', 'Jl.Padasuka No.44, Rt.10/Rw.6, Kec.Tawang, Kel.Lengkongsari, Kota Tasikmalaya', 'Biasa', 50000, 50000, 50000, 'NAK-012'),
(25, 3278034305000044, 'Salma', '2014-06-18', 'P', 'dsad', 'Luar Biasa', 50000, 100000, 50000, 'NAK-013');

-- --------------------------------------------------------

--
-- Stand-in structure for view `jumlah_dana`
-- (See below for the actual view)
--
CREATE TABLE `jumlah_dana` (
`SUM(simpanan_wjb)` double
);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pinjaman` int(11) NOT NULL,
  `jumlah_bayar` double NOT NULL,
  `tenggang_wkt` varchar(5) NOT NULL,
  `nak` varchar(50) NOT NULL,
  `tgl_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `pembayaran`
--
DELIMITER $$
CREATE TRIGGER `pembayaran` AFTER INSERT ON `pembayaran` FOR EACH ROW BEGIN
UPDATE total_peminjaman SET jumlah_pinjaman = jumlah_pinjaman - new.jumlah_bayar
WHERE id_pinjaman = new.id_pinjaman;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjaman` int(50) NOT NULL,
  `jumlah_pinjaman` int(11) NOT NULL,
  `nak` varchar(50) NOT NULL,
  `tgl_pinjaman` datetime NOT NULL DEFAULT current_timestamp(),
  `tenggang_wkt` int(11) NOT NULL,
  `total_pinjam` int(25) NOT NULL,
  `bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjaman`, `jumlah_pinjaman`, `nak`, `tgl_pinjaman`, `tenggang_wkt`, `total_pinjam`, `bayar`) VALUES
(37, 4950000, 'NAK-010', '2022-06-21 15:06:00', 10, 5024250, 502425),
(38, 4950000, 'NAK-006', '2022-06-27 12:51:00', 7, 5024250, 717750),
(39, 2475000, 'NAK-007', '2022-06-27 12:52:00', 5, 2512125, 502425);

--
-- Triggers `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `total pinjaman` AFTER INSERT ON `peminjaman` FOR EACH ROW BEGIN
INSERT INTO total_peminjaman(jumlah_pinjaman, nak, id_pinjaman) VALUES(new.total_pinjam, new.nak, new.id_pinjaman);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `simpanan_wjb`
--

CREATE TABLE `simpanan_wjb` (
  `id_wjb` int(50) NOT NULL,
  `nak` varchar(50) NOT NULL,
  `simpanan_wjb` double NOT NULL,
  `tgl_pembayaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `simpanan_wjb`
--

INSERT INTO `simpanan_wjb` (`id_wjb`, `nak`, `simpanan_wjb`, `tgl_pembayaran`) VALUES
(6, 'NAK-003', 50000, '2022-06-13'),
(7, 'NAK-004', 50000, '2022-06-13'),
(8, 'NAK-005', 50000, '2022-06-13'),
(9, 'NAK-007', 50000, '2022-06-13'),
(10, 'NAK-007', 50000, '2022-06-13'),
(11, 'NAK-013', 50000, '2022-06-13'),
(13, 'NAK-003', 50000, '2022-06-20'),
(14, 'NAK-011', 50000, '2022-06-20');

--
-- Triggers `simpanan_wjb`
--
DELIMITER $$
CREATE TRIGGER `penjumlahan simpanan wajib` AFTER INSERT ON `simpanan_wjb` FOR EACH ROW BEGIN
UPDATE anggota SET simpanan_wajib = simpanan_wajib + NEW.simpanan_wjb 
WHERE nak = NEW.nak;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `total_peminjaman`
--

CREATE TABLE `total_peminjaman` (
  `id_tot_peminjaman` int(50) NOT NULL,
  `id_pinjaman` int(11) DEFAULT NULL,
  `jumlah_pinjaman` int(11) NOT NULL,
  `nak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `total_peminjaman`
--

INSERT INTO `total_peminjaman` (`id_tot_peminjaman`, `id_pinjaman`, `jumlah_pinjaman`, `nak`) VALUES
(27, 27, 12811836, 'NAK-003'),
(28, 28, 0, 'NAK-012'),
(29, 29, 10048500, 'NAK-010'),
(30, 30, 0, 'NAK-013'),
(31, 31, 1004850, 'NAK-008'),
(32, 33, -502425, 'NAK-011'),
(33, 34, 1507275, 'NAK-011'),
(34, 35, 0, 'NAK-011'),
(37, 36, 669900, 'NAK-009'),
(38, 37, 5024250, 'NAK-010'),
(39, 38, 5024250, 'NAK-006'),
(40, 39, 2512125, 'NAK-007');

-- --------------------------------------------------------

--
-- Structure for view `jumlah_dana`
--
DROP TABLE IF EXISTS `jumlah_dana`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jumlah_dana`  AS SELECT sum(`simpanan_wjb`.`simpanan_wjb`) AS `SUM(simpanan_wjb)` FROM `simpanan_wjb` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `NIK` (`NIK`),
  ADD KEY `nak` (`nak`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pinjaman` (`id_pinjaman`),
  ADD KEY `nak` (`nak`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `nak` (`nak`);

--
-- Indexes for table `simpanan_wjb`
--
ALTER TABLE `simpanan_wjb`
  ADD PRIMARY KEY (`id_wjb`),
  ADD KEY `nak` (`nak`);

--
-- Indexes for table `total_peminjaman`
--
ALTER TABLE `total_peminjaman`
  ADD PRIMARY KEY (`id_tot_peminjaman`),
  ADD KEY `id_pinjaman` (`id_pinjaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjaman` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `simpanan_wjb`
--
ALTER TABLE `simpanan_wjb`
  MODIFY `id_wjb` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `total_peminjaman`
--
ALTER TABLE `total_peminjaman`
  MODIFY `id_tot_peminjaman` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
