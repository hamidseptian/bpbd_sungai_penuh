-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2026 at 03:59 AM
-- Server version: 8.0.30
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpbd_jambi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bantuan_bencana`
--

CREATE TABLE `bantuan_bencana` (
  `id_bantuan` int NOT NULL,
  `id_bencana` varchar(52) NOT NULL,
  `id_jenis_bantuan` varchar(25) NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bantuan_bencana`
--

INSERT INTO `bantuan_bencana` (`id_bantuan`, `id_bencana`, `id_jenis_bantuan`, `qty`) VALUES
(1, '6', '7', 3),
(3, '6', '10', 6),
(5, '6', '11', 3);

-- --------------------------------------------------------

--
-- Table structure for table `barang_diterima_bantuan`
--

CREATE TABLE `barang_diterima_bantuan` (
  `id_barang_diterima_bantuan` int NOT NULL,
  `id_penerima_bantuan` varchar(25) NOT NULL,
  `id_bencana` varchar(25) NOT NULL,
  `kategori` varchar(55) NOT NULL,
  `item` varchar(25) NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang_diterima_bantuan`
--

INSERT INTO `barang_diterima_bantuan` (`id_barang_diterima_bantuan`, `id_penerima_bantuan`, `id_bencana`, `kategori`, `item`, `qty`) VALUES
(10, '5', '2', '', 'Beras', 2),
(11, '5', '2', '', '', 4),
(12, '6', '2', '', 'Baju baju', 4),
(13, '7', '2', '', 'Beras', 5),
(14, '7', '2', '', '', 6),
(15, '8', '2', '', 'Beras', 1),
(16, '8', '2', '', 'Baju baju', 2),
(17, '8', '2', '', 'dsgbng', 3),
(18, '9', '2', 'bantuan Non Alam', 'Beras', 3),
(19, '9', '2', 'Pangan', 'dsffds', 2),
(20, '10', '2', 'bantuan Non Alam', 'Beras', 1),
(21, '11', '2', 'bantuan Non Alam', 'Beras', 0),
(22, '12', '2', 'bantuan Non Alam', 'Beras', 0),
(23, '13', '2', 'bantuan Non Alam', 'Beras', 0),
(24, '14', '2', 'bantuan Non Alam', 'Beras', 0),
(25, '15', '2', 'bantuan Non Alam', 'Beras', 0),
(26, '16', '2', 'bantuan Non Alam', 'Beras', 0),
(27, '17', '2', 'bantuan Non Alam', 'Beras', 0),
(28, '18', '2', 'bantuan Non Alam', 'Beras', 0),
(29, '19', '2', 'bantuan Non Alam', 'Beras', 0),
(30, '20', '2', 'bantuan Non Alam', 'Beras', 0),
(31, '21', '4', 'Pangan', 'Indomie', 3),
(32, '21', '4', 'Pangan', 'Sarden', 5),
(33, '22', '4', 'Pangan', 'Minyak', 2),
(34, '22', '4', 'Pangan', 'Beras', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bencana`
--

CREATE TABLE `bencana` (
  `id_bencana` int NOT NULL,
  `id_jenis_bencana` varchar(5) NOT NULL,
  `jenis_bencana` varchar(25) NOT NULL,
  `tgl_kejadian` varchar(25) NOT NULL,
  `lokasi` text NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(25) NOT NULL,
  `jam_kejadian` varchar(25) NOT NULL,
  `desa` text NOT NULL,
  `kepala_desa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bencana`
--

INSERT INTO `bencana` (`id_bencana`, `id_jenis_bencana`, `jenis_bencana`, `tgl_kejadian`, `lokasi`, `keterangan`, `status`, `jam_kejadian`, `desa`, `kepala_desa`) VALUES
(2, '3', '', '2025-12-12', 'Disana', 'dvnkdnkfdhbdfgdfbgdf', 'Penyaluran Bantuan', '12:00', 'Maransi citi', 'Pak Ambam'),
(4, '4', '', '2026-04-02', 'Maluku', 'Gempa Maluku 7.2 SE', 'Penyaluran Bantuan', '12:00', 'RESSR', 'TE'),
(5, '4', '', '2026-04-06', 'Padang', 'Telah terjadi gempa ', 'Penyaluran Bantuan', '12:53', 'Cubadak Air', 'Risky Efendy'),
(6, '4', '', '2026-04-07', 'Bali', 'Gempa bali 6 SR', '', '12:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `desa_terdampak`
--

CREATE TABLE `desa_terdampak` (
  `id_desa` int NOT NULL,
  `id_bencana` varchar(5) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `kepala_desa` varchar(50) NOT NULL,
  `id_petugas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `desa_terdampak`
--

INSERT INTO `desa_terdampak` (`id_desa`, `id_bencana`, `nama_desa`, `kepala_desa`, `id_petugas`) VALUES
(1, '6', 'Maransi', 'Ambam', '7'),
(2, '6', 'Ampang', 'Risky', '8'),
(5, '4', 'asg', 'sadg', '7');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_hak_akses` int NOT NULL,
  `nama_hak_akses` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_hak_akses`, `nama_hak_akses`) VALUES
(3, 'Admin'),
(4, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bantuan`
--

CREATE TABLE `jenis_bantuan` (
  `id_jenis_bantuan` int NOT NULL,
  `item` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kategori` text NOT NULL,
  `keterangan` text NOT NULL,
  `satuan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis_bantuan`
--

INSERT INTO `jenis_bantuan` (`id_jenis_bantuan`, `item`, `kategori`, `keterangan`, `satuan`) VALUES
(7, 'Indomie', 'Pangan', '-', ''),
(8, 'Sarden', 'Pangan', '-', ''),
(9, 'Beras', 'Pangan', '-', ''),
(10, 'Minyak', 'Pangan', '-', ''),
(11, 'Sarden', 'Pangan', '', 'KalengSDG');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bencana`
--

CREATE TABLE `jenis_bencana` (
  `id_jenis_bencana` int NOT NULL,
  `nama_bencana` text NOT NULL,
  `kategori` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis_bencana`
--

INSERT INTO `jenis_bencana` (`id_jenis_bencana`, `nama_bencana`, `kategori`, `keterangan`) VALUES
(1, 'Kebakaran', 'Bencana Non Alam', ''),
(3, 'Tsunami Aceh', 'Bencana Alam', ''),
(4, 'Gempa', 'Bencana Alam', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_bantuan`
--

CREATE TABLE `kategori_bantuan` (
  `id` int NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori_bantuan`
--

INSERT INTO `kategori_bantuan` (`id`, `kategori`) VALUES
(1, 'Pangan'),
(2, 'Sandang'),
(3, 'Papan');

-- --------------------------------------------------------

--
-- Table structure for table `penerima_bantuan`
--

CREATE TABLE `penerima_bantuan` (
  `id_penerima_bantuan` int NOT NULL,
  `id_bencana` varchar(5) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` text NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(25) NOT NULL,
  `id_petugas` varchar(5) NOT NULL,
  `id_desa` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penerima_bantuan`
--

INSERT INTO `penerima_bantuan` (`id_penerima_bantuan`, `id_bencana`, `nik`, `nama`, `alamat`, `nohp`, `id_petugas`, `id_desa`) VALUES
(5, '2', 'Junaidi', 'Junaidi Saja', 'disana', '0845', '7', ''),
(6, '2', '32', '324', '2323', '234234', '7', ''),
(7, '2', 'asfas', 'fasdf', 'sadf', 'sadf', '7', ''),
(8, '2', 'rew', 'wer', 'ewr', 'wer', '7', ''),
(9, '2', 'sadfsd', 'fsdf', 'sdffsgd', 'dsfgsdfg', '7', ''),
(10, '2', '', '', '', '', '7', ''),
(11, '2', '', '', '', '', '7', ''),
(12, '2', '', '', '', '', '7', ''),
(13, '2', '', '', '', '', '7', ''),
(14, '2', '', '', '', '', '7', ''),
(15, '2', '', '', '', '', '7', ''),
(16, '2', '', '', '', '', '7', ''),
(17, '2', '', '', '', '', '7', ''),
(18, '2', '', '', '', '', '7', ''),
(19, '2', '', '', '', '', '7', ''),
(20, '2', '', '', '', '', '7', ''),
(21, '4', '3523523', 'Nancy', 'Padang', '084342112', '8', ''),
(22, '4', '32895623', 'Rajab', 'Padang', '4935834', '7', ''),
(23, '6', 'dsffsgdg', 'dsfg', 'gdsf', 'dsfg', '', '1'),
(24, '6', '463', 'Yora', 'Jambi', '34534', '', '2'),
(25, '4', 'asfd', 'fds', 'fds', 'sadf', '', '5'),
(26, '4', 'r93456394', 'bfkjsdbvkj', 'bvkjdb', 'kbkjbvskjdb', '', '5');

-- --------------------------------------------------------

--
-- Table structure for table `penerima_bantuan_file`
--

CREATE TABLE `penerima_bantuan_file` (
  `id` int NOT NULL,
  `id_penerima_bantuan` varchar(25) DEFAULT NULL,
  `nama_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penerima_bantuan_file`
--

INSERT INTO `penerima_bantuan_file` (`id`, `id_penerima_bantuan`, `nama_file`) VALUES
(1, '25', '08f9413fdfb4f54787da79c444c51d29.jpg'),
(2, '25', 'd00af598b3a9e303be8e1a778ae04793.png'),
(3, '26', '32f69bc74b2b6a13d8d144bd12a88685.JPG'),
(4, '26', '722dae81e7f085ae2e6f9e237183e116.jpg'),
(5, '26', '21ce76dbcb26d7623a777ce62114dda7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int NOT NULL,
  `nama` varchar(55) NOT NULL,
  `nip` varchar(55) NOT NULL,
  `jabatan` varchar(55) NOT NULL,
  `pangkat` varchar(55) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `nip`, `jabatan`, `pangkat`, `alamat`, `no_hp`) VALUES
(7, 'Hamid Septian', '263464353', 'Kepala BPBD', 'IV/c', 'Ampang', '5234532'),
(8, 'ucok', '2141234', 'Kepala Penyalur', 'III/c', 'Jambi', '0942109312');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `id_hak_akses` varchar(55) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(25) NOT NULL,
  `email` text NOT NULL,
  `jabatan` text NOT NULL,
  `foto` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `status` varchar(25) NOT NULL,
  `status_akses` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_hak_akses`, `nama`, `alamat`, `nohp`, `email`, `jabatan`, `foto`, `username`, `password`, `status`, `status_akses`) VALUES
(87, '3', 'Noviora Afrian', 'Jambi', '-', '-', 'Staff', '202604060755.jpg', 'yora', '$2y$10$OYLk/xFbcOkmJTQBKLzhx.IO4dlC3QOMdn.wCd/hxe4YDExKH0wBi', '1', '1'),
(88, '4', 'Hamid', 'Padang', '0214124', '-', 'Staff', '202604060802.png', 'hamid', '$2y$10$oZ73ClX0/uVpGORM7klv/e1Ov.J78QYzKJPNWm3Y.s7T7aV5N6eii', '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bantuan_bencana`
--
ALTER TABLE `bantuan_bencana`
  ADD PRIMARY KEY (`id_bantuan`);

--
-- Indexes for table `barang_diterima_bantuan`
--
ALTER TABLE `barang_diterima_bantuan`
  ADD PRIMARY KEY (`id_barang_diterima_bantuan`);

--
-- Indexes for table `bencana`
--
ALTER TABLE `bencana`
  ADD PRIMARY KEY (`id_bencana`);

--
-- Indexes for table `desa_terdampak`
--
ALTER TABLE `desa_terdampak`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_hak_akses`);

--
-- Indexes for table `jenis_bantuan`
--
ALTER TABLE `jenis_bantuan`
  ADD PRIMARY KEY (`id_jenis_bantuan`);

--
-- Indexes for table `jenis_bencana`
--
ALTER TABLE `jenis_bencana`
  ADD PRIMARY KEY (`id_jenis_bencana`);

--
-- Indexes for table `kategori_bantuan`
--
ALTER TABLE `kategori_bantuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerima_bantuan`
--
ALTER TABLE `penerima_bantuan`
  ADD PRIMARY KEY (`id_penerima_bantuan`);

--
-- Indexes for table `penerima_bantuan_file`
--
ALTER TABLE `penerima_bantuan_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bantuan_bencana`
--
ALTER TABLE `bantuan_bencana`
  MODIFY `id_bantuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barang_diterima_bantuan`
--
ALTER TABLE `barang_diterima_bantuan`
  MODIFY `id_barang_diterima_bantuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `bencana`
--
ALTER TABLE `bencana`
  MODIFY `id_bencana` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `desa_terdampak`
--
ALTER TABLE `desa_terdampak`
  MODIFY `id_desa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_hak_akses` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_bantuan`
--
ALTER TABLE `jenis_bantuan`
  MODIFY `id_jenis_bantuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jenis_bencana`
--
ALTER TABLE `jenis_bencana`
  MODIFY `id_jenis_bencana` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori_bantuan`
--
ALTER TABLE `kategori_bantuan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penerima_bantuan`
--
ALTER TABLE `penerima_bantuan`
  MODIFY `id_penerima_bantuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `penerima_bantuan_file`
--
ALTER TABLE `penerima_bantuan_file`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
