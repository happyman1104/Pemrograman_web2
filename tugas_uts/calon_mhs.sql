-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Okt 2026 pada 13.46
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calon_mhs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_mhs`
--

CREATE TABLE `calon_mhs` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode` varchar(30) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `asal_sekolah` varchar(150) NOT NULL,
  `pekerjaan_ortu` varchar(100) DEFAULT NULL,
  `matematika` decimal(5,2) NOT NULL,
  `inggris` decimal(5,2) NOT NULL,
  `umum` decimal(5,2) NOT NULL,
  `rata_rata` decimal(5,2) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `calon_mhs`
--

INSERT INTO `calon_mhs` (`id`, `kode`, `nama`, `jenis_kelamin`, `ttl`, `asal_sekolah`, `pekerjaan_ortu`, `matematika`, `inggris`, `umum`, `rata_rata`, `keterangan`, `created_at`) VALUES
(1, 'A1', 'ubaidillah', 'Laki-laki', 'TANGERANG , 2003-03-11', 'SMKN 1 TANGSEL', 'KARYAWAN SWASTA', 80.00, 80.00, 75.00, 78.33, 'Lulus', '2026-10-28 12:44:31');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `calon_mhs`
--
ALTER TABLE `calon_mhs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `calon_mhs`
--
ALTER TABLE `calon_mhs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
