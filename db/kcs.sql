-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Feb 2021 pada 20.04
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kcs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya`
--

CREATE TABLE `biaya` (
  `id_biaya` int(5) NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `biaya`
--

INSERT INTO `biaya` (`id_biaya`, `jenis_kendaraan`, `harga`) VALUES
(1, 'Motor Kecil', 20000),
(2, 'Motor Besar', 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_nota` varchar(7) NOT NULL,
  `id_biaya` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `nama_plg` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_nota`, `id_biaya`, `bayar`, `kembali`, `total`, `nama_plg`, `tanggal`, `id_user`) VALUES
(1, '111.001', 1, 20000, 0, 20000, 'PAK A', '2021-02-20', 2),
(2, '111.002', 2, 30000, 5000, 25000, 'PAK B', '2021-02-20', 2),
(3, '111.003', 1, 20000, 0, 20000, 'PAK C', '2021-02-20', 2),
(4, '111.004', 2, 50000, 25000, 25000, 'PAK D', '2021-02-20', 2),
(5, '111.005', 1, 20000, 0, 20000, 'PAK E', '2021-02-20', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','kasir') NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `jabatan`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin'),
(2, 'kasir', '21232f297a57a5a743894a0e4a801fc3', 'kasir', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biaya`
--
ALTER TABLE `biaya`
  MODIFY `id_biaya` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
