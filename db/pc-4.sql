-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Agu 2023 pada 13.48
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pc-4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud`
--

CREATE TABLE `crud` (
  `no_ujian` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kejuruan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `crud`
--

INSERT INTO `crud` (`no_ujian`, `nama_siswa`, `tempat`, `tanggal_lahir`, `kejuruan`) VALUES
(1, 'Muhamad Luthfi Sadlii', 'Tangerang', '2022-03-31', 'XII RPL 1'),
(4, 'Muhamad Luthfi Sadli', 'Tangerang', '2022-03-24', 'XII RPL 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_fas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail`
--

INSERT INTO `detail` (`id`, `id_kamar`, `id_fas`) VALUES
(1, 1, 1),
(2, 1, 2),
(5, 1, 4),
(8, 2, 1),
(9, 2, 2),
(10, 2, 4),
(19, 1, 8),
(20, 1, 9),
(21, 1, 10),
(22, 1, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_hotel`
--

CREATE TABLE `fasilitas_hotel` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fasilitas_hotel`
--

INSERT INTO `fasilitas_hotel` (`id`, `foto`, `nama`) VALUES
(1, '1923096661_hotel (12).jpg', 'Kolam renang'),
(2, 'hotel (3).png', 'Ruang Makan'),
(4, '2028311349_hotel (9).jpg', 'Ruang Meeting');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `id_fas` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`id_fas`, `nama`) VALUES
(1, 'A'),
(2, 'B'),
(4, 'C'),
(8, 'D'),
(9, 'E'),
(10, 'F'),
(11, 'G');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `foto`, `tipe`, `ukuran`, `jumlah`, `harga`) VALUES
(1, 'hotel (11).jpg', 'Superior', '20x20', 85, 500000),
(2, 'hotel (13).jpg', 'Deluxe', '50x50', 115, 750000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telp` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `cekin` date NOT NULL,
  `cekout` date NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id`, `nama`, `email`, `telp`, `id_kamar`, `jumlah`, `cekin`, `cekout`, `total`, `status`) VALUES
(48, 'Muhamad Luthfi Sadli', 'super-admin@email.com', 123, 1, 5, '2022-03-29', '2022-03-30', 5000000, '4'),
(49, 'Muhamad Luthfi Sadli', 'super-admin@email.com', 0, 1, 1, '2022-04-06', '2022-04-07', 1000000, '4'),
(50, 'roti unibi', 'super-admin@email.com', 0, 2, 2, '2022-04-22', '2022-04-22', 4500000, '4'),
(51, 'Muhamad Luthfi Sadli', 'super-admin@email.com', 123, 1, 3, '2022-04-23', '2022-04-24', 3000000, '3'),
(52, 'Muhamad Luthfi Sadli', 'super-admin@email.com', 0, 1, 4, '2022-04-23', '2022-04-30', 16000000, '3'),
(53, 'Muhamad Luthfi Sadli', 'super-admin@email.com', 0, 2, 1, '2022-04-30', '2022-05-31', 24000000, '3'),
(54, 'Arif Iskandar', 'super-admin@email.com', 0, 1, 5, '2022-04-23', '2022-04-28', 15000000, '3'),
(55, 'admin', 'super-admin@email.com', 0, 1, 3, '2022-04-30', '2022-04-30', 1500000, '3'),
(56, 'Sandi Arba Putra', 'super-admin@email.com', 0, 1, 5, '2022-04-26', '2022-04-30', 12500000, '3'),
(57, 'Arif Iskandar', 'super-admin@email.com', 0, 2, 4, '2022-04-30', '2022-05-14', 45000000, '3'),
(58, 'Muhamad Luthfi Sadli', 'super-admin@email.com', 0, 1, 5, '2022-04-23', '2022-04-24', 5000000, '3'),
(59, 'Dyo Ramanda Restyanto', 'super-admin@email.com', 0, 1, 5, '2022-04-27', '2022-04-27', 2500000, '3'),
(60, 'Muhamad Luthfi Sadli', '012@gmail.com', 0, 1, 5, '2022-04-23', '2022-04-23', 2500000, '3'),
(61, 'Sandi Arba Putra', 'admin@admin.com', 0, 2, 1, '2022-06-23', '2022-08-30', 51750000, '3'),
(62, 'Muhamad Luthfi Sadli', 'super-admin@email.com', 0, 1, 5, '2022-10-23', '2022-10-23', 22500000, '4');

--
-- Trigger `reservasi`
--
DELIMITER $$
CREATE TRIGGER `kurang` AFTER INSERT ON `reservasi` FOR EACH ROW UPDATE kamar set jumlah=jumlah-new.jumlah where id_kamar=new.id_kamar
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah1` AFTER UPDATE ON `reservasi` FOR EACH ROW UPDATE kamar, reservasi set kamar.jumlah=kamar.jumlah+new.jumlah where new.status=3 and kamar.id_kamar=new.id_kamar
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah2` AFTER UPDATE ON `reservasi` FOR EACH ROW UPDATE kamar, reservasi set kamar.jumlah=kamar.jumlah+new.jumlah where new.status=4 and kamar.id_kamar=new.id_kamar
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `level` enum('Admin','Resep') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `foto`, `user`, `pass`, `nama`, `level`) VALUES
(1, 'login1.jpg', 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'Luthfi', 'Admin'),
(2, 'login2.jpg', 'resep', 'c0908de9ce9bbdb8eb1d2e719f35c49d62cb4919', 'Sadli', 'Resep');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`no_ujian`);

--
-- Indeks untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fas` (`id_fas`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indeks untuk tabel `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`id_fas`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `id_fas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_2` FOREIGN KEY (`id_fas`) REFERENCES `fasilitas_kamar` (`id_fas`),
  ADD CONSTRAINT `detail_ibfk_3` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`);

--
-- Ketidakleluasaan untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
