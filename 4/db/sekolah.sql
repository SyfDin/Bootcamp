-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jan 2021 pada 15.19
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `school_tb`
--

CREATE TABLE `school_tb` (
  `sid` int(11) NOT NULL,
  `NPSN` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name_school` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `logo_school` varchar(255) NOT NULL,
  `school_level` varchar(255) NOT NULL,
  `status_school` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `school_tb`
--

INSERT INTO `school_tb` (`sid`, `NPSN`, `user_id`, `name_school`, `address`, `logo_school`, `school_level`, `status_school`) VALUES
(8, 0, 1, 'd', 'd', '2017289233_kangen.jpg', 'd', 'd'),
(9, 0, 2, 'A', 'A', '600406985_Screenshot (10).png', 'S', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Udin', 'udindevart@gmail.com', 'Udin12345;'),
(2, 'Ayah', 'Udinjegell@gmail.com', 'Udin12345;');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `school_tb`
--
ALTER TABLE `school_tb`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `name_school` (`name_school`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `school_tb`
--
ALTER TABLE `school_tb`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `school_tb`
--
ALTER TABLE `school_tb`
  ADD CONSTRAINT `school_tb_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
