-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 31 Des 2019 pada 12.55
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digionelib`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `kode_buku` int(11) NOT NULL,
  `judul_buku` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_cover` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengarang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year(4) NOT NULL,
  `kategori` int(11) NOT NULL,
  `penerbit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_rak` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul_buku`, `nama_cover`, `pengarang`, `tahun`, `kategori`, `penerbit`, `lokasi_rak`) VALUES
(123, 'Era Baru Pelabuhan Indonesia', 'Era-Baru-Pelabuhan-Indonesia.png', 'Hendra Wibawa, Sri Mas Sari, Rio Sandy Pradana', 2019, 1, 'IPC LEARNING & CONSULTING', 'A3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail_peminjaman` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `kode_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail_peminjaman`, `id_peminjaman`, `kode_buku`) VALUES
(13, 25, 123),
(14, 26, 123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ebook`
--

CREATE TABLE `ebook` (
  `_id` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_buku` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_buku` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_buku` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengarang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year(4) NOT NULL,
  `penerbit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_file` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_file_ori` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_cover` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_cover_ori` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` set('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ebook`
--

INSERT INTO `ebook` (`_id`, `kategori`, `kode_buku`, `judul_buku`, `deskripsi_buku`, `pengarang`, `tahun`, `penerbit`, `nama_file`, `nama_file_ori`, `nama_cover`, `nama_cover_ori`, `is_deleted`, `created_at`, `updated_at`) VALUES
('5df6f5a734c45', '5df6f5b4dd2bd', '123456789', 'Refactoring UI', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure laborum aspernatur esse culpa deserunt dolores facilis cupiditate, libero quibusdam magnam? Recusandae at eum accusantium quisquam corporis? Voluptatum consequatur ipsa quo.', 'Adam Wathan', 2018, 'UIStore', '123456789_Component Gallery.pdf', 'Component Gallery.pdf', '123456789_cover_refactoring_ui.png', 'cover_refactoring_ui.png', '0', '2019-12-15 20:10:31', '2019-12-15 20:11:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Manajemen'),
(2, 'Klasik'),
(3, 'Kesehatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tanggal_registrasi` datetime NOT NULL,
  `status` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama_lengkap`, `password`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `tanggal_registrasi`, `status`) VALUES
('19.21.1370', 'Muhammad Faisal Qomarudin', '202cb962ac59075b964b07152d234b70', 'Surakarta', 'Surakarta', '1998-02-08', '2019-12-14 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `npm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_peminjaman` datetime NOT NULL,
  `tanggal_pengembalian` datetime NOT NULL,
  `pengembalian` datetime DEFAULT NULL,
  `nama_petugas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `denda` int(20) NOT NULL DEFAULT 0,
  `status_pengembalian` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `npm`, `tanggal_peminjaman`, `tanggal_pengembalian`, `pengembalian`, `nama_petugas`, `denda`, `status_pengembalian`) VALUES
(25, '19.21.1370', '2019-12-30 07:01:47', '2020-01-06 07:01:47', NULL, 'petugas', 0, 0),
(26, '19.21.1370', '2019-12-30 07:32:24', '2020-01-02 07:32:24', '2019-12-30 07:32:50', 'petugas', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`nama`, `data`) VALUES
('denda', '10000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin','Petugas') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`, `nama_lengkap`, `role`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Admin'),
('admin2', 'c84258e9c39059a89ab77d846ddab909', 'admin', 'Admin'),
('budi', '00dfc53ee86af02e742515cdcf075ed3', 'budi', 'Admin'),
('petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'Petugas', 'Petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`),
  ADD KEY `kategori` (`kategori`);

--
-- Indeks untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail_peminjaman`),
  ADD KEY `id_peminjaman` (`id_peminjaman`),
  ADD KEY `t_buku` (`kode_buku`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `t_petugas` (`nama_petugas`),
  ADD KEY `npm` (`npm`) USING BTREE;

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`nama`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `kode_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123113;

--
-- AUTO_INCREMENT untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `t_kategori_` FOREIGN KEY (`kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `t_buku` FOREIGN KEY (`kode_buku`) REFERENCES `buku` (`kode_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_peminjaman` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `t_mahasiswa` FOREIGN KEY (`npm`) REFERENCES `mahasiswa` (`npm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_petugas` FOREIGN KEY (`nama_petugas`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
