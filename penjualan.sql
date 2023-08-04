-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 07:50 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_produk`
--

CREATE TABLE `tbl_jenis_produk` (
  `id` int(11) NOT NULL,
  `jns_produk` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_produk`
--

INSERT INTO `tbl_jenis_produk` (`id`, `jns_produk`, `deskripsi`, `tgl_input`, `tgl_edit`) VALUES
(1, 'ATK', 'Alat Tulis Kantor', '2018-09-17 00:00:00', '2018-09-19 00:00:00'),
(2, 'Alkes', 'Alat - alat Kesehatan', '2018-09-19 00:00:00', '2018-09-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `no_wa` varchar(20) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id`, `id_user`, `fullname`, `tmp_lahir`, `tgl_lahir`, `alamat`, `no_hp`, `no_wa`, `tgl_input`, `tgl_edit`) VALUES
(8, 1, 'alfi', 'jakarta', '1983-02-06', 'bogor', '0813141866862', '081314866862', '2018-10-28 10:36:41', '2018-10-28 10:36:41'),
(10, 2, 'ridwan', 'jakarta', '1900-02-02', 'karedenan', '0855', '08997', '2018-10-29 05:57:56', '2018-10-29 05:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id` int(11) NOT NULL,
  `tgl_pembayaran` datetime NOT NULL,
  `pembelian` int(11) NOT NULL,
  `total_bayar` double NOT NULL,
  `status_pembayaran` int(1) NOT NULL,
  `jns_pembayaran` varchar(50) NOT NULL,
  `rek_pengirim` varchar(50) NOT NULL,
  `bank_pengirim` varchar(50) NOT NULL,
  `rek_tujuan` varchar(50) NOT NULL,
  `bank_tujuan` varchar(50) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `tgl_pembelian` datetime NOT NULL,
  `pembeli` int(11) NOT NULL,
  `produk` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `total_harga` double NOT NULL,
  `diskon` double NOT NULL,
  `kurir` int(11) NOT NULL,
  `ongkos_kirim` double NOT NULL,
  `total_bayar` double NOT NULL,
  `status_pembelian` int(1) NOT NULL,
  `catatan_pembelian` text NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`id`, `invoice`, `tgl_pembelian`, `pembeli`, `produk`, `banyak`, `total_harga`, `diskon`, `kurir`, `ongkos_kirim`, `total_bayar`, `status_pembelian`, `catatan_pembelian`, `tgl_input`, `tgl_edit`) VALUES
(3, 'INV2810181', '2018-10-28 11:04:42', 0, 2, 1, 100, 0, 0, 18000, 18100, 1, '', '2018-10-28 11:04:42', '2018-10-28 11:04:42'),
(4, 'INV2810182', '2018-10-28 11:16:33', 0, 6, 1, 1000, 0, 0, 18000, 19000, 1, '', '2018-10-28 11:16:33', '2018-10-28 11:16:33'),
(5, 'INV2810183', '2018-10-28 11:17:56', 8, 5, 1, 200000, 0, 0, 18000, 218000, 1, '', '2018-10-28 11:17:56', '2018-10-28 11:17:56'),
(6, 'INV2810184', '2018-10-28 11:18:28', 8, 5, 12, 2400000, 0, 0, 18000, 2418000, 1, '', '2018-10-28 11:18:28', '2018-10-28 11:18:28'),
(7, 'INV2810185', '2018-10-28 11:37:52', 8, 5, 1, 200000, 0, 0, 18000, 218000, 1, '', '2018-10-28 11:37:52', '2018-10-28 11:37:52'),
(8, 'INV2810186', '2018-10-28 11:40:07', 8, 5, 1, 200000, 0, 0, 18000, 218000, 1, '', '2018-10-28 11:40:07', '2018-10-28 11:40:07'),
(9, 'INV2910181', '2018-10-29 03:55:46', 8, 7, 2, 180000, 0, 0, 9000, 189000, 1, '', '2018-10-29 03:55:46', '2018-10-29 03:55:46'),
(10, 'INV2910182', '2018-10-29 05:57:56', 10, 6, 1, 1000, 0, 0, 18000, 19000, 1, '', '2018-10-29 05:57:56', '2018-10-29 05:57:56'),
(11, 'INV2910183', '2018-10-29 06:09:05', 10, 6, 1, 1000, 0, 0, 9000, 10000, 1, '', '2018-10-29 06:09:05', '2018-10-29 06:09:05'),
(12, 'INV2910183', '2018-10-29 06:09:05', 10, 7, 1, 90000, 0, 0, 9000, 100000, 1, '', '2018-10-29 06:09:05', '2018-10-29 06:09:05'),
(13, 'INV2910183', '2018-10-29 06:09:05', 10, 5, 100, 20000000, 0, 0, 9000, 20100000, 1, '', '2018-10-29 06:09:05', '2018-10-29 06:09:05'),
(14, 'INV2910184', '2018-10-29 06:11:35', 10, 6, 5, 5000, 0, 0, 18000, 23000, 1, '', '2018-10-29 06:11:35', '2018-10-29 06:11:35'),
(15, 'INV2910184', '2018-10-29 06:11:35', 10, 7, 9, 810000, 0, 0, 18000, 833000, 1, '', '2018-10-29 06:11:35', '2018-10-29 06:11:35'),
(16, 'INV2910185', '2018-10-29 06:12:17', 10, 6, 6, 6000, 0, 0, 9000, 15000, 1, '', '2018-10-29 06:12:17', '2018-10-29 06:12:17'),
(17, 'INV2910185', '2018-10-29 06:12:17', 10, 7, 9, 810000, 0, 0, 9000, 825000, 1, '', '2018-10-29 06:12:17', '2018-10-29 06:12:17'),
(18, 'INV2910186', '2018-10-29 06:52:24', 10, 7, 4, 360000, 0, 0, 9000, 369000, 1, '', '2018-10-29 06:52:24', '2018-10-29 06:52:24'),
(19, 'INV2910186', '2018-10-29 06:52:24', 10, 6, 9, 9000, 0, 0, 9000, 378000, 1, '', '2018-10-29 06:52:24', '2018-10-29 06:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaduan`
--

CREATE TABLE `tbl_pengaduan` (
  `id` int(11) NOT NULL,
  `pelanggan` int(11) NOT NULL,
  `pembelian` int(11) NOT NULL,
  `pengaduan` text NOT NULL,
  `tanggapan` text NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengiriman`
--

CREATE TABLE `tbl_pengiriman` (
  `id` int(11) NOT NULL,
  `tgl_kirim` datetime NOT NULL,
  `kurir` varchar(50) NOT NULL,
  `no_resi` varchar(50) NOT NULL,
  `alamat_tujuan` text NOT NULL,
  `alamat_pengirim` text NOT NULL,
  `status_pengiriman` int(1) NOT NULL,
  `pembeli` int(11) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id` int(11) NOT NULL,
  `kode_produk` varchar(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jns_produk` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` double NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id`, `kode_produk`, `nama_produk`, `jns_produk`, `deskripsi`, `harga`, `gambar`, `tgl_input`, `tgl_edit`) VALUES
(1, 'bk01', 'buku tulis', 1, 'ini adalah buku tulis', 30000, '', '2018-09-10 00:00:00', '2018-09-19 00:00:00'),
(2, '009', 'pensil', 1, 'pensil', 100, '009.jpg', '2018-09-22 09:11:35', '2018-10-29 06:02:16'),
(5, '0010', 'kasur', 2, 'ini adalah kasur', 200000, '', '2018-09-23 08:11:16', '2018-09-23 08:11:16'),
(6, '900', 'penggaris', 1, 'penggaris', 1000, '', '2018-09-23 08:12:54', '2018-09-23 08:12:54'),
(7, '00100', 'bobo', 1, 'bagus', 90000, '00100.jpg', '2018-10-28 11:52:04', '2018-10-28 12:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stok`
--

CREATE TABLE `tbl_stok` (
  `id` int(11) NOT NULL,
  `produk` int(10) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `level` varchar(20) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `fullname`, `email`, `username`, `password`, `status`, `level`, `tgl_input`, `tgl_edit`) VALUES
(1, 'alfi rahman hakim', 'arah.1983@gmail.com', 'alfi', '12345', 0, 'member', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'ridwan', 'a@gmail', 'ridwan', '12345', 0, 'member', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usulan`
--

CREATE TABLE `tbl_usulan` (
  `id` int(11) NOT NULL,
  `pelanggan` int(11) NOT NULL,
  `produk` int(11) NOT NULL,
  `ulasan` text NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_whislist`
--

CREATE TABLE `tbl_whislist` (
  `id` int(11) NOT NULL,
  `tgl_whislist` datetime NOT NULL,
  `produk` int(11) NOT NULL,
  `pelanggan` int(11) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `tgl_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jenis_produk`
--
ALTER TABLE `tbl_jenis_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stok`
--
ALTER TABLE `tbl_stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_usulan`
--
ALTER TABLE `tbl_usulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_whislist`
--
ALTER TABLE `tbl_whislist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jenis_produk`
--
ALTER TABLE `tbl_jenis_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_pengaduan`
--
ALTER TABLE `tbl_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_stok`
--
ALTER TABLE `tbl_stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_usulan`
--
ALTER TABLE `tbl_usulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_whislist`
--
ALTER TABLE `tbl_whislist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
