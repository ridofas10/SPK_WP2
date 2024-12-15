-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 10 Sep 2024 pada 06.48
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metode_wp2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` int(11) NOT NULL,
  `email` varchar(55) DEFAULT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_akun`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_alternatif`
--

CREATE TABLE `tbl_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama_alternatif` varchar(50) NOT NULL,
  `vektor_s` double NOT NULL,
  `vektor_v` double NOT NULL,
  `rangking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_alternatif`
--

INSERT INTO `tbl_alternatif` (`id_alternatif`, `nama_alternatif`, `vektor_s`, `vektor_v`, `rangking`) VALUES
(11, 'Access English School', 3.228699978287, 0.37928077951127, 1),
(12, 'Private English Pare', 2.4369294422956, 0.28627017211374, 3),
(20, 'Peace Kampung Inggris', 2.8470613159408, 0.33444904837499, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) NOT NULL,
  `bobot_kriteria` double NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `nama_kriteria`, `bobot_kriteria`, `status`) VALUES
(14, 'Kulaitas Pengajar', 5, 'BENEFIT'),
(15, 'Biaya', 5, 'COST'),
(16, 'Lokasi', 3, 'BENEFIT'),
(17, 'Fasilitas', 4, 'BENEFIT'),
(18, 'Program Pembelajaran', 5, 'BENEFIT'),
(19, 'Kualitas Layanan Lembaga', 3, 'BENEFIT'),
(20, 'Learning Objective', 4, 'BENEFIT'),
(24, 'Menyediakan Tes', 4, 'BENEFIT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_subkriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `id_alternatif`, `id_kriteria`, `id_subkriteria`) VALUES
(544, 11, 14, 40),
(545, 11, 15, 47),
(546, 11, 16, 50),
(547, 11, 17, 56),
(548, 11, 18, 60),
(549, 11, 19, 65),
(550, 11, 20, 70),
(551, 11, 24, 83),
(576, 20, 14, 40),
(577, 20, 15, 46),
(578, 20, 16, 50),
(579, 20, 17, 56),
(580, 20, 18, 60),
(581, 20, 19, 66),
(582, 20, 20, 70),
(583, 20, 24, 85),
(584, 12, 14, 40),
(585, 12, 15, 45),
(586, 12, 16, 52),
(587, 12, 17, 56),
(588, 12, 18, 60),
(589, 12, 19, 67),
(590, 12, 20, 70),
(591, 12, 24, 86);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_subkriteria`
--

CREATE TABLE `tbl_subkriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_subkriteria` varchar(50) NOT NULL,
  `nilai_subkriteria` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_subkriteria`
--

INSERT INTO `tbl_subkriteria` (`id_subkriteria`, `id_kriteria`, `nama_subkriteria`, `nilai_subkriteria`) VALUES
(40, 14, 'Baik Sekali', 5),
(41, 14, 'Baik', 4),
(42, 14, 'Cukup', 3),
(43, 14, 'Kurang Baik', 2),
(45, 15, 'Rp. 450.000 - Rp. 600.000', 5),
(46, 15, 'Rp. 600.000 - Rp. 800.000', 4),
(47, 15, 'Rp. 800.000 - Rp. 1.100.000', 3),
(48, 15, 'Rp. 1.100.000 - Rp. 1.500.000', 2),
(50, 16, 'Baik Sekali', 5),
(51, 16, 'Baik', 4),
(52, 16, 'Cukup', 3),
(53, 16, 'Kurang Baik', 2),
(54, 16, 'Tidak Baik', 1),
(55, 17, 'Baik Sekali', 5),
(56, 17, 'Baik', 4),
(57, 17, 'Cukup', 3),
(58, 17, 'Kurang Baik', 2),
(59, 17, 'Tidak Baik', 1),
(60, 18, 'Baik Sekali', 5),
(61, 18, 'Baik', 4),
(62, 18, 'Cukup', 3),
(63, 18, 'Kurang Baik', 2),
(64, 18, 'Tidak Baik', 1),
(65, 19, 'Baik Sekali', 5),
(66, 19, 'Baik', 4),
(67, 19, 'Cukup', 3),
(68, 19, 'Kurang Baik', 2),
(69, 19, 'Tidak Baik', 1),
(70, 20, 'Baik Sekali', 5),
(71, 20, 'Baik', 4),
(72, 20, 'Cukup', 3),
(73, 20, 'Kurang Baik', 2),
(74, 20, 'Tidak Baik', 1),
(78, 14, 'Tidak Baik', 1),
(79, 15, '> Rp. 1.500.000 ', 1),
(83, 24, 'Menyediakan TOEFL dan IELTS', 5),
(84, 24, 'Menyediakan IELTS', 4),
(85, 24, 'Menyediakan TOEFL', 3),
(86, 24, 'Tidak Menyediakan', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `tbl_subkriteria`
--
ALTER TABLE `tbl_subkriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_alternatif`
--
ALTER TABLE `tbl_alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=592;

--
-- AUTO_INCREMENT untuk tabel `tbl_subkriteria`
--
ALTER TABLE `tbl_subkriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
