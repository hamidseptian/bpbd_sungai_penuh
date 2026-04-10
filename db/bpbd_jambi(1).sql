-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2026 at 11:59 PM
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
(19, '9', '2', 'Pangan', 'dsffds', 2);

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
  `jam_kejadian` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bencana`
--

INSERT INTO `bencana` (`id_bencana`, `id_jenis_bencana`, `jenis_bencana`, `tgl_kejadian`, `lokasi`, `keterangan`, `status`, `jam_kejadian`) VALUES
(2, '3', '', '2025-12-12', 'Disana', 'dvnkdnkfdhbdfgdfbgdf', 'Penyaluran Bantuan', '12:00');

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
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis_bantuan`
--

INSERT INTO `jenis_bantuan` (`id_jenis_bantuan`, `item`, `kategori`, `keterangan`) VALUES
(1, 'Beras', 'bantuan Non Alam', 'sd hdfh dfgh dfgh dfh '),
(4, 'Baju baju', 'Sandang', 'Thrift'),
(5, 'dsffds', 'Pangan', 'asFV WD'),
(6, 'dsgbng', 'Pangan', 'ndbdfbdaf<br />\r\ngvbdfngdbndaf<br />\r\nbndafvba');

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
(1, 'Kebakaran', 'Bencana Non Alam', 'sd hdfh dfgh dfgh dfh '),
(3, 'Tsunami Aceh', 'Bencana Alam', '');

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
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
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
  `status` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status_akses` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`id_user`, `id_hak_akses`, `nama`, `alamat`, `nohp`, `email`, `jabatan`, `foto`, `username`, `password`, `status`, `status_akses`) VALUES
(86, '2', 'Hamid Septian', 'Maransi', '085161202256', 'hamidseptian@gmail.com', 'Programmer', '20250511111729.jpeg', 'hamid', '$2y$10$WmJwqEoPqDZC0FT3QJajDOGTolzK86.RUmAit.5MILZiDYARCYC8y', '1', '1'),
(87, '3', 'Risma Sri Diana', 'Tabing', '085377260385', 'rsd971020@gmail.com', 'Accounting', '20250310030937.jpg', 'Rsd', '$2y$10$NBN3zFGYkD7wBuQ5CKyuJeMIzr.5gIJooDFzq0JNUM387ICSrTNSy', '1', '1'),
(89, '5', 'Harianto Mustafa', '-', '-', '-', 'General Affair', '', 'hari', '$2y$10$U/OOOS0oWMyogmdMZmfKZ.VqbFW2pypvCjRWSzNvA.GTMSDsz5bMe', 'delete', '1'),
(90, '3', 'Asraf Afandi', 'Limau Manis', '085383432424', 'asraf.afandi96@gmail.com', 'Design Grafis', '', 'asraf', '$2y$10$/RgiH7k1GczI6KkcaFk9Luq3fuwkSQYcaCkX3CDF9nERZJAaKKmYC', '1', '1'),
(91, '3', 'Ade', '', '', '', '', '', 'ade', '$2y$10$h15N065bl6uZGuzQNsGa9umFtXUJOaI4BG2O7r.oYIUfMyc1JXSOO', 'delete', '1'),
(92, '5', 'Risma Sri Diana', 'Tabing', '085377260385', 'rsd971020@gmail.com', 'Accounting', '20250428112137.jpg', 'Risma Sri Diana', '$2y$10$Jlic7meTtCQoTesLVCYByuOXU12Y8KiOYdzZvkCguiNmUWDIJQub.', 'delete', '0'),
(94, '3', 'VALDA KHATAMI INAYYAH', 'BELIMBING JALAN SIRSAK RAYA NO 31', '089643099027', 'valdainaya@gmail.com', 'KASIR', '20250428015954.jpeg', 'valda', '$2y$10$xK0exW6dBB7vZ0TwREDtWOKhb34B/aBlnIsvoeNYiO50mgaVPgXSe', '1', '1'),
(95, '4', 'VALDA KHATAMI INAYYAH', 'BELIMBING JALAN SIRSAK RAYA NO 31', '089643099027', 'valdainaya@gmail.com', 'KASIR', '20250428113654.jpeg', 'valdacomel', '$2y$10$zdP2hxoKoTWWE8TO1l4Z/u3k7j2gATGZ5HJahomqsN19x7s0dxXwS', '1', '0'),
(96, '3', 'Russida Birrasyid', 'JL. GAJAH MADA RT001/RW008', '083838068848', 'russidabirrayid15@gmail,com', 'KASIR', '20250428020518.jpeg', 'RAA', '$2y$10$0AVQLYkVR85SuJT/XMOwCe6T3TLOZcmXRwBPznE6a587n/wuaWslK', '1', '1'),
(97, '4', 'Russida Birrasyid', 'JL. GAJAH MADA RT001/RW008', '083838068848', 'russidabirrayid15@gmail,com', 'KASIR', '20250428020918.jpeg', 'RARA', '$2y$10$e6QwgMsvjmzF671560gJJeVfNkbG.gAEdPqltvuh0jE3obJfBH2U2', '1', '0'),
(98, '3', 'YULIANDA MELYSA', 'JL. TARANTANG ANDALAS', '083823232099', 'yuliandamelysa12@gmail.com', 'KASIR', '20250429025322.jpeg', 'MELI', '$2y$10$RlHQDyZDA2nCGPYBLTCXdOOldr05ZM.x/NCxHCkmgarRHTO4qi1K.', '1', '1'),
(99, '4', 'YULIANDA MELYSA', 'JL. TARANTANG ANDALAS', '083823232099', 'yuliandamelysa12@gmail.com', 'KASIR', '20250429025342.jpeg', 'MELIGYM', '$2y$10$T.5kH5FOQ9uGcMbrdYo/1.N1QAD.y4fYTriFYQufUQo8yrHWfbtW6', '1', '0'),
(100, '3', 'Novira Diana', 'Gunung Pangilun', '089516055289', 'diananofira@gmail.com', 'Kasir', '20250429032935.jpeg', 'Diana', '$2y$10$1uI2QwvXgnK7usd4yMjlc.rPF71Gh8Ham3H2WpdXp1N4rWH9EmJEK', '1', '1'),
(101, '4', 'Novira Diana', 'Gunung Pangilun', '089516055289', 'diananofira@gmail.com', 'Kasir', '20250429032952.jpeg', 'Novira', '$2y$10$vcGsY08DSudkAZ7MwpZ.Yeo8FJPmnltGjC0Jlgy0/dn7/nQBnb1v2', '1', '0'),
(102, '4', 'Risma Sri Diana', 'Tabing', '085377260385', 'rsd971020@gmail.com', 'Accounting', '20250503120029.jpg', 'Risma', '$2y$10$QiSW7caKWIhP/.uWGZXwB.rbR3D5SWBWUnsfSSwndkl3ha40.Uc..', 'delete', '1'),
(103, '3', 'Ade Maha Astuti', 'Gunung Pangilun', '085211326112', 'ademahaastuti@gmail.com', 'Kasir', '20250509075440.jpg', 'AdeGro', '$2y$10$ybq3vH.CCaXWJqpaLwPDYO1x/8un5x9xpgN5EjVfRw0R1nniJHEcy', '1', '1'),
(104, '4', 'Ade Maha Astuti', 'Gunung Pangilun', '085211326112', 'ademahaastuti@gmail.com', 'Kasir', '20250509075451.jpg', 'AdeGym', '$2y$10$uTPjpByzObXhrl2rsA57BuSCAJh1blFVphR8Hsn9lz7UQ4zAWBBHa', '1', '0'),
(105, '3', 'Hamid Septian', 'Maransi', '-', '-', 'Programmer', '20250511111744.jpeg', 'hs', '$2y$10$sPlUTyTXXmQpMsp9u6r57e7yCObfiod2LnXhAMhzDB/fmyQgu/2TW', 'delete', '1'),
(106, '4', 'Hamid Septian', '', '', '', 'Programmer', '20250511111715.jpeg', 'hs_e', '$2y$10$9rxdxZxyjbxcoi6icIKxLu5uTI5sw59yQWZ6tlHG8yDElfXeJPeHW', 'delete', '1'),
(107, '5', 'Hamid Septian', '', '', '', '', '20250514093027.jpeg', 'hs_o', '$2y$10$2ofk.w5EKSqzSq0.1yCGd.FNyW1V0LjFqSBNd.TddDJ.lgV3jYhae', 'delete', '1'),
(108, '3', 'Harianto Mustafa', 'Tunggul Hitam', '081266794410', '-', 'General Affair', '', 'harianto', '$2y$10$znpvq7xfPjid9hbVflRNAOosgoc1pTULvKsMjOjdrX1HTDdcmR8ZW', 'delete', '1'),
(109, '6', 'Ilfan', '-', '-', '-', '-', '', 'ilfan', '$2y$10$90DNAVE86kRYEcfGsJjlvuvCuHStsxBiFQQJwnvrl/NNRWBeSeKGu', '1', '1'),
(110, '6', 'Fadhil', '-', '-', '-', '-', '', 'fadhil', '$2y$10$XLyF9k95TeBnxG9isiAII.qTYYuiFI7TuEZv7Uaq1UDHt1C7cresW', '1', '1'),
(111, '6', 'Rahmat', '-', '-', '-', '-', '', 'rahmat', '$2y$10$F/kD/89Al/U5g/0hP5jm6.uXKddB0bkrTOWN.XbqvqvxsDopfBnbO', '1', '1'),
(112, '6', 'Akgra Efirman', '-', '-', '-', '-', '', 'akgra', '$2y$10$Bbi9SvSRkyZqYaaeVlFEhuFkn2cDdFUxmf.An1iJ2a3wQzNL5hhWO', '1', '1'),
(113, '6', 'Edo', '-', '-', '-', '-', '', 'edo', '$2y$10$oa139Ne/G4rAh5QNjvX.4usAOdd8cxV91vYzviFt/NQdymfNPcX0i', '1', '1'),
(114, '6', 'Syarif', '-', '-', '-', '-', '', 'syarif', '$2y$10$kiLmLJpH3WRCXx7onzXvkO42Ca9vDTJz0FSWm9m3qClB5ygyn2fpG', '1', '1'),
(115, '5', 'Harianto Mustafa', 'Tunggul Hitam', '081266794410', '-', 'General Affair', '', 'Mustafa', '$2y$10$uqF18Ubk2FLu5Y.6n.Utk.fRjcxxl.LZalI8bIzEyNFwa5919IiTW', '1', '1'),
(116, '5', 'Asraf Afandi', 'Padang', '085383432424', '-', 'Desaign Grafis', '', 'Gdragon', '$2y$10$VQS7K5NRYLbvstTbrlLOFuWt3qe72Svrj8nrPxjZIRed.lYrJM1Im', 'delete', '0'),
(117, '3', 'Asraf Afandi', 'Limau  Manis', '-', '-', 'Desaign Grafis', '', 'Bigbang', '$2y$10$x7H780rkD5JaTtDD2gmnlOuVH0PrKy0dNiYwhAfY9air69lEbVz4u', 'delete', '1'),
(118, '', 'Randi', 'Lubuk Minturun', '081365411496', '-', 'Staff Marketing', '', 'Randi', '$2y$10$dejwQMIGGopJaFyBhdb6kuT2SmDzYuuLTeoXoTSwLF1U9aaHwPN.W', '1', '1');

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
  `id_petugas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penerima_bantuan`
--

INSERT INTO `penerima_bantuan` (`id_penerima_bantuan`, `id_bencana`, `nik`, `nama`, `alamat`, `nohp`, `id_petugas`) VALUES
(5, '2', 'Junaidi', 'Junaidi Saja', 'disana', '0845', '5'),
(6, '2', '32', '324', '2323', '234234', '2'),
(7, '2', 'asfas', 'fasdf', 'sadf', 'sadf', '2'),
(8, '2', 'rew', 'wer', 'ewr', 'wer', '2'),
(9, '2', 'sadfsd', 'fsdf', 'sdffsgd', 'dsfgsdfg', '5');

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
(2, 'Faisal', '', '', '', '', ''),
(3, 'Dio', '', '', '', '', ''),
(4, 'sadasdsd', 'aasd', 'asd', 'Pengatur Muda', 'asd', 'asd'),
(5, 'DSTEE', '11243', 'IT', 'Pengatur Muda', 'disana', '5343720'),
(6, 'DSTEE', '11243', 'IT', 'III/a', 'disana', '436235');

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
(81, '3', 'Nando', 'Tabing', '976', '3534@gmail.com', 'Sespri', '', '11', '$2y$10$WXvPEvV18qZDiMexyHm0/eWB7cpFckPF/GScHcKv3zBIC18F5z0V6', '1', '1'),
(83, '4', 'Iftitah Muslimah', '-', '-', '-', 'Admin', '', 'ss', '$2y$10$JJAEbe.XKgBSdO6HwvvR6OxSlJasjM4hts2zuXkXyI.nflQiG0gX2', '1', '1'),
(84, '3', 'sadasdasd', 'adas', 's', 'isug', 'isuh', '202512080110.jpeg', 'rsd', '$2y$10$CzQw0yymuenDltTdUmCAgODDO7eQt/MmyWrKe3sGYHrOELpWHCtMy', '1', '1'),
(85, '3', 'Hamid S', 'Padang', '463634', 'amin@gmail.com', 'IT', '202512080119.JPG', '', '', 'delete', 'delete');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `penerima_bantuan`
--
ALTER TABLE `penerima_bantuan`
  ADD PRIMARY KEY (`id_penerima_bantuan`);

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
-- AUTO_INCREMENT for table `barang_diterima_bantuan`
--
ALTER TABLE `barang_diterima_bantuan`
  MODIFY `id_barang_diterima_bantuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `bencana`
--
ALTER TABLE `bencana`
  MODIFY `id_bencana` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_hak_akses` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_bantuan`
--
ALTER TABLE `jenis_bantuan`
  MODIFY `id_jenis_bantuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_bencana`
--
ALTER TABLE `jenis_bencana`
  MODIFY `id_jenis_bencana` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_bantuan`
--
ALTER TABLE `kategori_bantuan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `penerima_bantuan`
--
ALTER TABLE `penerima_bantuan`
  MODIFY `id_penerima_bantuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
