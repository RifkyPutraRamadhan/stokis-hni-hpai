-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 02, 2026 at 10:48 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stokis-hni-hpai`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int NOT NULL,
  `foto` varchar(50) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `produk` varchar(50) NOT NULL,
  `id_kategori` int NOT NULL,
  `dimensi_kualitas` varchar(20) NOT NULL,
  `berat_bersih` varchar(100) NOT NULL,
  `stok` int NOT NULL,
  `harga` int NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_proses` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `foto`, `kode`, `produk`, `id_kategori`, `dimensi_kualitas`, `berat_bersih`, `stok`, `harga`, `keterangan`, `tanggal_proses`) VALUES
(5, 'extrafood.jpg', '003152023', 'Extra Food HPAI', 2, 'Baik', '250 (ml)', 30, 68000, '-', '2023-03-23'),
(9, 'Hibis.png', '2023032023', 'Hibis', 3, 'Baik', '10 packs x 4 pads', 38, 235000, '-', '2023-03-23'),
(10, 'Andrographis.png', '2023032344', 'Andrographis Centella', 1, 'Baik', '250 (mg)', 0, 850000, 'Aturan Pakai : 3 x 2 Kapsul sebelum makan.', '2023-03-23'),
(11, 'CDM2.jpg', '2023032011', 'CD Album 2 Maidany', 4, 'Baik', '1 Keping CD', 97, 35000, '-', '2023-03-23');

-- --------------------------------------------------------

--
-- Stand-in structure for view `joinbarang`
-- (See below for the actual view)
--
CREATE TABLE `joinbarang` (
`id` int
,`foto` varchar(50)
,`kode` varchar(15)
,`produk` varchar(50)
,`id_kategori` int
,`kategori` varchar(40)
,`dimensi_kualitas` varchar(20)
,`berat_bersih` varchar(100)
,`stok` int
,`harga` int
,`keterangan` text
,`tanggal_proses` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `jointransaksi`
-- (See below for the actual view)
--
CREATE TABLE `jointransaksi` (
`id` int
,`foto` varchar(100)
,`id_member` varchar(8)
,`email` varchar(50)
,`no_hp` varchar(13)
,`nama` varchar(30)
,`alamat` text
,`id_kategori` int
,`kategori` varchar(40)
,`produk` varchar(50)
,`kuantitas` int
,`status` varchar(10)
,`harga` int
,`total` int
,`keterangan` text
,`tanggal_transaksi` date
);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `kategori` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Herbs Product'),
(2, 'Health Food & Beverage'),
(3, 'Cosmetic & Home Care'),
(4, 'Tools Marketing');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int NOT NULL,
  `foto` varchar(100) NOT NULL,
  `id_member` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `produk` varchar(50) NOT NULL,
  `id_kategori` int NOT NULL,
  `kuantitas` int NOT NULL,
  `status` varchar(10) NOT NULL,
  `harga` int NOT NULL,
  `total` int NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `foto`, `id_member`, `email`, `no_hp`, `nama`, `alamat`, `produk`, `id_kategori`, `kuantitas`, `status`, `harga`, `total`, `keterangan`, `tanggal_transaksi`) VALUES
(50, 'CDM2.jpg', '04553321', 'rifkyputraramadhan@gmail.com', '089683249052', 'Rifky Putra Ramadhan', '-', 'CD Album 2 Maidany', 4, 2, '2', 35000, 70000, '-', '2023-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `foto` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `foto`, `email`, `username`, `password`, `id_role`) VALUES
(1, 'default.jpg', 'admin@gmail.com', 'admin', '$2y$10$1leZXltehVcZih98LpQFKe0q6/MKgfJmfOMEqypVvVninwYYN1sd2', 1),
(2, 'default.jpg', 'yuda@gmail.com', 'yuda', '$2y$10$UtUwDHwpPwfljrGIVH1M/.EEJsObLd3boJUouNWg9EOXda2dUUSdm', 2),
(3, 'default.jpg', 'rifkyputraramadhan@gmail.com', 'rifky', '$2y$10$m.Yei9ngobw6Mu/v0Z0dj.R/i7hAX3KsPmmrlse.GgF6iJVlW17BK', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

-- --------------------------------------------------------

--
-- Structure for view `joinbarang`
--
DROP TABLE IF EXISTS `joinbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `joinbarang`  AS SELECT `a`.`id` AS `id`, `a`.`foto` AS `foto`, `a`.`kode` AS `kode`, `a`.`produk` AS `produk`, `a`.`id_kategori` AS `id_kategori`, `b`.`kategori` AS `kategori`, `a`.`dimensi_kualitas` AS `dimensi_kualitas`, `a`.`berat_bersih` AS `berat_bersih`, `a`.`stok` AS `stok`, `a`.`harga` AS `harga`, `a`.`keterangan` AS `keterangan`, `a`.`tanggal_proses` AS `tanggal_proses` FROM (`barang` `a` join `kategori` `b` on((`a`.`id_kategori` = `b`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `jointransaksi`
--
DROP TABLE IF EXISTS `jointransaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jointransaksi`  AS SELECT `a`.`id` AS `id`, `a`.`foto` AS `foto`, `a`.`id_member` AS `id_member`, `a`.`email` AS `email`, `a`.`no_hp` AS `no_hp`, `a`.`nama` AS `nama`, `a`.`alamat` AS `alamat`, `a`.`id_kategori` AS `id_kategori`, `b`.`kategori` AS `kategori`, `a`.`produk` AS `produk`, `a`.`kuantitas` AS `kuantitas`, `a`.`status` AS `status`, `a`.`harga` AS `harga`, `a`.`total` AS `total`, `a`.`keterangan` AS `keterangan`, `a`.`tanggal_transaksi` AS `tanggal_transaksi` FROM (`transaksi` `a` join `kategori` `b` on((`a`.`id_kategori` = `b`.`id`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
