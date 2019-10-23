-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2019 pada 04.12
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pemilu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hakpilih`
--

CREATE TABLE `hakpilih` (
  `id_hakpilih` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `waktu` time NOT NULL,
  `status` enum('dpt','dptb','dpk') NOT NULL,
  `surat_suara` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilih`
--

CREATE TABLE `pemilih` (
  `id_pemilih` int(11) NOT NULL,
  `status` enum('dpt','dptb','dpk') NOT NULL,
  `jumlah_l` int(11) NOT NULL,
  `jumlah_p` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemilih`
--

INSERT INTO `pemilih` (`id_pemilih`, `status`, `jumlah_l`, `jumlah_p`, `total`, `keterangan`) VALUES
(1, 'dpt', 0, 0, 0, 'full'),
(2, 'dptb', 0, 0, 0, '1=0|2=0|3=0 4=0|5=0'),
(3, 'dpk', 0, 0, 0, 'full');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratsuara`
--

CREATE TABLE `suratsuara` (
  `id_suratsuara` int(11) NOT NULL,
  `surat` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `rusak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suratsuara`
--

INSERT INTO `suratsuara` (`id_suratsuara`, `surat`, `total`, `rusak`) VALUES
(1, 1, 0, 0),
(2, 2, 0, 0),
(3, 3, 0, 0),
(4, 4, 0, 0),
(5, 5, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hakpilih`
--
ALTER TABLE `hakpilih`
  ADD PRIMARY KEY (`id_hakpilih`);

--
-- Indeks untuk tabel `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`id_pemilih`);

--
-- Indeks untuk tabel `suratsuara`
--
ALTER TABLE `suratsuara`
  ADD PRIMARY KEY (`id_suratsuara`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hakpilih`
--
ALTER TABLE `hakpilih`
  MODIFY `id_hakpilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `pemilih`
--
ALTER TABLE `pemilih`
  MODIFY `id_pemilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `suratsuara`
--
ALTER TABLE `suratsuara`
  MODIFY `id_suratsuara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
