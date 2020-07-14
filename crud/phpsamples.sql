-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2020 pada 12.20
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpsamples`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `toy`
--

CREATE TABLE `toy` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(20) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `stock_count` bigint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `toy`
--

INSERT INTO `toy` (`id`, `name`, `code`, `category`, `price`, `stock_count`) VALUES
(20, 'oppo', 'A1', 'handphone', 1000000, 3),
(21, 'realme 5', 'A2', 'handphone', 2000000, 2),
(22, 'redmi 4', 'A3', 'handphone', 4000000, 5),
(23, 'redmi 5', 'A3', 'handphone', 2000000, 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `toy`
--
ALTER TABLE `toy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `toy`
--
ALTER TABLE `toy`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
