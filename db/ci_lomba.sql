-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2021 pada 17.09
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_lomba`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lomba`
--

CREATE TABLE `lomba` (
  `kode_lomba` varchar(10) NOT NULL,
  `nama_lomba` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lomba`
--

INSERT INTO `lomba` (`kode_lomba`, `nama_lomba`, `harga`) VALUES
('FG', 'Fotogenic', 35000),
('OBI', 'Olimpiade Bahasa Inggris', 45000),
('OBIN', 'Olimpiade Bahasa Indonesia', 45000),
('OM', 'Olimpiade Matematika', 45000),
('OS', 'Olimpiade Sains', 45000),
('TC', 'Talent Competition', 40000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `kode_pendaftaran` int(10) NOT NULL,
  `kode_peserta` int(10) NOT NULL,
  `kode_lomba` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`kode_pendaftaran`, `kode_peserta`, `kode_lomba`) VALUES
(1, 1, 'TC'),
(2, 2, 'OBI'),
(5, 3, 'FG'),
(7, 4, 'OBIN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `kode_peserta` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `sekolah` varchar(30) NOT NULL,
  `asal_kota` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`kode_peserta`, `nama`, `kelas`, `sekolah`, `asal_kota`) VALUES
(1, 'Ayu Indraswari', '12', 'SMKN 5 Malang', 'Malang'),
(2, 'Talitha Widya', '10', 'SMKN 4 Malang', 'Bondowoso'),
(3, 'Dian Novita Sari', '12', 'SMK Adi Husada Malang', 'Malang'),
(4, 'Dina', '9', 'SMPN 21 MALANG', 'Kediri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `kode_user` varchar(10) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username_user` varchar(30) NOT NULL,
  `password_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`kode_user`, `nama_user`, `username_user`, `password_user`) VALUES
('ADM1', 'Ayu Indraswari', 'ayu', 'ayu'),
('ADM2', 'Nadiah Ratnaduhita', 'nad', 'nad'),
('ADM3', 'Reni Ika Sari Oktavianty', 're', 're');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `lomba`
--
ALTER TABLE `lomba`
  ADD PRIMARY KEY (`kode_lomba`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`kode_pendaftaran`),
  ADD KEY `kode_lomba` (`kode_lomba`),
  ADD KEY `kode_peserta` (`kode_peserta`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`kode_peserta`),
  ADD KEY `kode_sekolah` (`sekolah`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `kode_pendaftaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `kode_peserta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
