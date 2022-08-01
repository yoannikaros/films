-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2022 pada 16.59
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `film`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `content`
--

CREATE TABLE `content` (
  `id` int(220) NOT NULL,
  `judul` varchar(220) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` text NOT NULL,
  `rilis` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sutradara` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `content`
--

INSERT INTO `content` (`id`, `judul`, `deskripsi`, `image`, `rilis`, `sutradara`) VALUES
(1, 'Ivana banget', 'Buat yang ngaku wibu sejati, wajib banget coba aplikasi ini! Tapi ingat ya, kamu harus cukup umur dulu sebelum mengaksesnya, geng. Selain itu, perlu diketahui juga kalau Linkpoi.me/app adalah aplikasi yang masih ilegal. Alhasil, ada risiko aplikasi tersebut membawa virus atau malware yang berpotensi menyerang perangkatmu dan menyebabkan kerusakan.', 'https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2022/07/28/65163463.jpeg', '2022-08-01 11:13:50', 'Maharani'),
(3, 'Titanic', 'Buat yang ngaku wibu sejati, wajib banget coba aplikasi ini! Tapi ingat ya, kamu harus cukup umur dulu sebelum mengaksesnya, geng. Selain itu, perlu diketahui juga kalau Linkpoi.me/app adalah aplikasi yang masih ilegal. Alhasil, ada risiko aplikasi tersebut membawa virus atau malware yang berpotensi menyerang perangkatmu dan menyebabkan kerusakan.', 'https://statics.indozone.news/content/2021/10/31/zosMLx4/10-film-terbaru-juli-2022-di-bioskop-dan-layanan-streaming12_700.jpg', '2022-08-01 14:25:33', 'leonardo de caprio'),
(4, 'Residen Evil', 'Buat yang ngaku wibu sejati, wajib banget coba aplikasi ini! Tapi ingat ya, kamu harus cukup umur dulu sebelum mengaksesnya, geng.\r\n\r\nSelain itu, perlu diketahui juga kalau Linkpoi.me/app adalah aplikasi yang masih ilegal. Alhasil, ada risiko aplikasi tersebut membawa virus atau malware yang berpotensi menyerang perangkatmu dan menyebabkan kerusakan.', 'https://assets.pikiran-rakyat.com/crop/0x0:0x0/x/photo/2021/12/28/3329991792.jpg', '2022-08-01 14:55:54', 'mira');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`) VALUES
(8, '', 'yoannikaros', 'yoannikaros29@gmail.com', '$2y$10$cwFN5fb6QSU2FY0M5piFbe3ohbXDWQyRvLaad14A5b.g1nkfYM2ii'),
(9, '', 'admin', 'admin@gmail.com', '$2y$10$o0L/fDvQx64wT5bgVC9LZOjfUnDyDMFk4DFyOhep3hh48oYXMyfoe');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `content`
--
ALTER TABLE `content`
  MODIFY `id` int(220) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
