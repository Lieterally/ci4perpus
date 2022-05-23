-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Bulan Mei 2022 pada 00.49
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `pengarang_buku` varchar(255) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `sampul_buku` varchar(255) NOT NULL,
  `id_rak` int(11) DEFAULT NULL,
  `id_penerbit` int(11) DEFAULT NULL,
  `isbn_buku` varchar(255) NOT NULL,
  `stok_buku` int(11) NOT NULL,
  `created_date` date DEFAULT NULL,
  `updated_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `judul_buku`, `pengarang_buku`, `id_kategori`, `sampul_buku`, `id_rak`, `id_penerbit`, `isbn_buku`, `stok_buku`, `created_date`, `updated_date`) VALUES
(4, 'SMP/MTS Kelas VIII Ilmu Pengetahuan Alam Kurikulum 2013 Revisi', 'Resty Wijayanti, Sunyo Adji Purnomo, Paramitha Retno, Meta Juniastri', 48, '9786023745432_SMP-MTS-Kelas.jpg', 1, 7, '9786023745432', 5, NULL, '2022-05-21'),
(17, 'Home Sweet Loan', ' Almira Bastari', 52, 'Home_Sweet_Loan_cov__w150_hauto.jpg', 7, 4, '9786020658049', 4, NULL, '2022-05-21'),
(18, 'Jujutsu Kaisen 06', 'Gege Akutami', 51, 'Jujutsukaisen_6__w150_hauto.jpg', 4, 6, '9786230031274', 5, NULL, '2022-05-22'),
(22, 'Sagaras', 'Tere Liye', 52, 'sagaras.jpeg', 7, 11, '9786239726256', 5, '2022-05-22', '2022-05-22'),
(23, 'Kesetiaan Mr. X (Devotion of Suspect X)', 'Keigo Higashino', 51, '9786020330525_THE_DEVOTION_1.jpg', 6, 4, '9786020330525', 7, '2022-05-22', '2022-05-22'),
(24, 'Pemrograman Web Berbasis HTML 5, PHP, Dan JavaScript', 'Pemrograman Web Berbasis HTML 5, PHP, Dan JavaScript Edy Winarno ST, M.Eng, Ali Zaki & SmitDev Community', 53, 'ID_WHP2018MTH10WHP.jpg', 8, 6, '9786020243627', 5, '2022-05-22', '2022-05-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(43, 'IPS'),
(48, 'IPA'),
(49, 'SciFi'),
(50, 'Sejarah'),
(51, 'Anime'),
(52, 'Drama'),
(53, 'Pemrograman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `no_peminjaman` varchar(255) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `tanggal_dikembalikan` date DEFAULT NULL,
  `durasi_peminjaman` int(11) NOT NULL,
  `status_peminjaman` enum('Dipinjam','Dikembalikan') NOT NULL,
  `denda_peminjaman` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id_peminjaman`, `no_peminjaman`, `id_buku`, `id_siswa`, `tanggal_peminjaman`, `tanggal_pengembalian`, `tanggal_dikembalikan`, `durasi_peminjaman`, `status_peminjaman`, `denda_peminjaman`) VALUES
(20, 'PJ001', 18, 11, '2022-05-22', '2022-05-25', '2022-05-22', 3, 'Dikembalikan', 0),
(21, 'PJ001', 18, 11, '2022-05-22', '2022-05-27', '2022-05-22', 5, 'Dikembalikan', 0),
(22, 'PJ003', 24, 11, '2022-05-22', '2022-05-25', '2022-05-22', 3, 'Dikembalikan', 0),
(23, 'PJ003', 23, 11, '2022-05-23', '2022-05-27', '2022-05-22', 4, 'Dikembalikan', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penerbit`
--

CREATE TABLE `tbl_penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_penerbit`
--

INSERT INTO `tbl_penerbit` (`id_penerbit`, `nama_penerbit`) VALUES
(4, 'Gramedia'),
(5, 'Pustaka'),
(6, 'Elex Media Computindo'),
(7, 'Yrama Widya'),
(9, 'Litter'),
(11, 'PENERBIT SABAK GRIP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rak`
--

CREATE TABLE `tbl_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rak`
--

INSERT INTO `tbl_rak` (`id_rak`, `nama_rak`) VALUES
(1, 'IP_01'),
(4, 'SF_01'),
(6, 'ANM_01'),
(7, 'DR_01'),
(8, 'PR_01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `nisn_siswa` varchar(10) NOT NULL,
  `kelas_siswa` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nama_siswa`, `nisn_siswa`, `kelas_siswa`, `tgl_lahir`) VALUES
(1, 'Ahmad Dani', '0006748212', '8A', '2008-05-15'),
(5, 'Aliet', '10201010', '9A', '2002-04-17'),
(7, 'Junaidi', '4834838490', '9A', '2019-06-11'),
(11, 'Arif', '10201016', '9A', '2022-05-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `telp_user` varchar(13) NOT NULL,
  `foto_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username_user`, `password_user`, `email_user`, `telp_user`, `foto_user`) VALUES
(1, 'Aliet', 'alit123', '3eade543411e68ecb5e721a805122cae', 'alitfirdaus@gmail.com', '087840272518', 'alit.png'),
(25, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '093341237756', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `tbl_buku_ibfk_1` (`id_kategori`),
  ADD KEY `tbl_buku_ibfk_2` (`id_penerbit`),
  ADD KEY `tbl_buku_ibfk_3` (`id_rak`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `tbl_peminjaman_ibfk_1` (`id_siswa`);

--
-- Indeks untuk tabel `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indeks untuk tabel `tbl_rak`
--
ALTER TABLE `tbl_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbl_penerbit`
--
ALTER TABLE `tbl_penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_rak`
--
ALTER TABLE `tbl_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD CONSTRAINT `tbl_buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori` (`id_kategori`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_buku_ibfk_2` FOREIGN KEY (`id_penerbit`) REFERENCES `tbl_penerbit` (`id_penerbit`) ON DELETE SET NULL,
  ADD CONSTRAINT `tbl_buku_ibfk_3` FOREIGN KEY (`id_rak`) REFERENCES `tbl_rak` (`id_rak`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD CONSTRAINT `tbl_peminjaman_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`),
  ADD CONSTRAINT `tbl_peminjaman_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tbl_buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
