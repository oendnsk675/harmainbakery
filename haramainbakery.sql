-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jul 2022 pada 03.12
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `haramainbakery`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username_admin` varchar(100) NOT NULL,
  `password_admin` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `foto_admin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`, `nama_lengkap`, `foto_admin`) VALUES
(1, 'mayaristinmaeni', 'maya11', 'Maya Ristin Maeni', 'maya.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` int(5) NOT NULL,
  `nama_kurir` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nama_kurir`, `tarif`) VALUES
(1, 'JNT', 15000),
(6, 'GrabFood', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(150) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`) VALUES
(2, 'alwy@gmail.com', 'alwy123', 'Alwy', '081000111222'),
(3, 'mayaristinmaeni@gmail.com', 'maya11', 'maya', '087863685773'),
(4, 'zuhrianti@gmail.com', 'ria123', 'ria', '087863666000'),
(5, 'zuhria@gmail.com', 'ria123', 'zuhria', '087865777123'),
(6, 'raehanun@gmail.com', 'raehanun123', 'raehanun', '087888543261'),
(9, 'bendahara885@gmail.com', 'bendahara885', 'osi', '081917320977');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_kurir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `status_pembelian` varchar(25) NOT NULL DEFAULT 'Pending',
  `alamat` text NOT NULL,
  `bukti` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_kurir`, `tanggal_pembelian`, `total_pembelian`, `status_pembelian`, `alamat`, `bukti`) VALUES
(38, 9, 3, '2022-07-26', 31000, 'Pending', '', NULL),
(39, 9, 2, '2022-07-27', 26000, 'Pending', '', NULL),
(40, 9, 3, '2022-07-27', 31000, 'Pending', '', NULL),
(41, 9, 2, '2022-07-27', 39000, 'Pending', '', NULL),
(42, 9, 2, '2022-07-27', 39000, 'Pending', 'latar mu dan latarku', NULL),
(43, 9, 1, '2022-07-27', 36000, 'Dikonfirmasi', 'sadsd', '20220727090347dst.png'),
(44, 9, 6, '2022-07-27', 31000, 'Dikonfirmasi', 'desan mamben', '20220727104715dst.png'),
(45, 9, 1, '2022-07-27', 15000, 'Pending', 'xczx', NULL),
(46, 9, 1, '2022-07-27', 15000, 'Pending', 'xczx', NULL),
(47, 9, 6, '2022-07-27', 31000, 'Pending', 'zdsdad', NULL),
(48, 9, 1, '2022-07-28', 36000, 'Dikonfirmasi', 'dsfsdfsdfd', '20220728030725dashboard pnb.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`) VALUES
(1, 1, 2, ''),
(2, 2, 3, ''),
(3, 0, 2, '1'),
(4, 0, 7, '1'),
(5, 0, 1, '1'),
(6, 0, 1, '1'),
(7, 0, 12, '1'),
(8, 0, 1, '1'),
(9, 0, 1, '1'),
(10, 0, 1, '1'),
(11, 0, 2, '1'),
(12, 0, 1, '1'),
(13, 0, 10, '1'),
(14, 0, 2, '2'),
(15, 23, 1, '1'),
(16, 24, 2, '1'),
(17, 25, 2, '1'),
(18, 26, 2, '1'),
(19, 27, 2, '1'),
(20, 28, 2, '1'),
(21, 29, 1, '1'),
(22, 30, 2, '1'),
(23, 32, 4, '1'),
(24, 33, 10, '1'),
(25, 33, 1, '1'),
(26, 34, 2, '1'),
(27, 35, 2, '1'),
(28, 36, 2, '1'),
(29, 37, 3, '1'),
(30, 38, 2, '1'),
(31, 39, 1, '1'),
(32, 40, 2, '1'),
(33, 41, 2, '1'),
(34, 0, 1, '1'),
(35, 0, 1, '1'),
(36, 42, 2, '1'),
(37, 43, 2, '1'),
(38, 44, 1, '1'),
(39, 47, 1, '1'),
(40, 48, 1, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `foto_produk`, `deskripsi_produk`) VALUES
(1, 'Roti Gembul', 21000, 'foto_4.png', '                '),
(2, 'Roti Mokoh', 21000, 'foto_5.png', ''),
(3, 'Roti Sosis', 12000, 'foto_7.png', ''),
(4, 'Roti Abon', 12000, 'Untitled-20.png', '        '),
(5, 'Roti Manis Oreo', 6000, 'Untitled-25.png', ''),
(6, 'Roti Pisang Santri', 6000, 'Untitled-17.png', ''),
(7, 'Roti Coklat Kacang', 6000, 'Untitled-27.png', ''),
(8, 'Kue Keju', 21000, 'Untitled-10.png', ''),
(9, 'Roll Cake', 12000, 'Untitled-21.png', ''),
(10, 'Roll Abon', 12000, 'Untitled-22.png', ''),
(11, 'Roll Keju', 12000, 'Untitled-19.png', ''),
(12, 'Donat Haramain', 4000, 'Untitled-15.png', ''),
(13, 'Roti Kopi', 6000, 'foto_6.png', ''),
(14, 'Roti Mini Santri', 30000, 'foto_3.png', ''),
(15, 'Bolu Pandan Keju', 35000, 'Untitled-11.png', ''),
(16, 'Brownies Santri', 45000, 'foto_1.png', ''),
(17, 'Brownies Kacang', 35000, 'Untitled-23.png', ''),
(18, 'Banana Choco Pie', 35000, 'foto_2.png', ''),
(19, 'Blueder Haramain', 6000, 'Untitled-26.png', ''),
(20, 'Roti Keju', 6000, 'Untitled-18.png', ''),
(21, 'Mini Pizza', 12000, 'Untitled-16.png', ''),
(22, 'Pie Susu', 2500, 'Untitled-24.png', ''),
(23, 'Roti Sus', 6000, 'Untitled-12.png', '                '),
(24, '', 0, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_recommended`
--

CREATE TABLE `produk_recommended` (
  `id_produk_recommended` int(11) NOT NULL,
  `nama_produk_recommended` varchar(100) NOT NULL,
  `harga_produk_recommended` int(11) NOT NULL,
  `deskripsi_produk_recommended` text NOT NULL,
  `foto_produk_recommended` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk_recommended`
--

INSERT INTO `produk_recommended` (`id_produk_recommended`, `nama_produk_recommended`, `harga_produk_recommended`, `deskripsi_produk_recommended`, `foto_produk_recommended`) VALUES
(2, 'Roti Mokoh', 21000, '', 'foto_5.png'),
(5, 'Roti Coklat Kacang', 6000, '', 'Untitled-27.png'),
(6, 'Roti Pisang Santri', 6000, '', 'Untitled-17.png'),
(7, 'Blueder Haramain', 6000, '', 'Untitled-26.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `produk_recommended`
--
ALTER TABLE `produk_recommended`
  ADD PRIMARY KEY (`id_produk_recommended`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `produk_recommended`
--
ALTER TABLE `produk_recommended`
  MODIFY `id_produk_recommended` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
