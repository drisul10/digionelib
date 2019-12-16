-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2019 at 10:16 AM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.3.12-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_digionelib`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `_id` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `npm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` set('AKTIF','TIDAK_AKTIF','DITANGGUHKAN') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AKTIF',
  `no_hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` set('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `is_password_generated` set('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`_id`, `npm`, `email`, `nama_lengkap`, `password`, `alamat`, `status`, `no_hp`, `is_deleted`, `is_password_generated`, `created_at`, `updated_at`) VALUES
('5df6f609073da', '19.21.1371', 'andri@gmail.com', 'Andri Sulistyanto', 'HOymir', 'Trucuk, Klaten, Jawa Tengah', 'AKTIF', '082138886093', '0', '1', '2019-12-16 03:12:09', '2019-12-16 03:12:09');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kode_buku` int(11) NOT NULL,
  `judul_buku` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pengarang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` year(4) NOT NULL,
  `kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_rak` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ebook`
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ebook`
--

INSERT INTO `ebook` (`_id`, `kategori`, `kode_buku`, `judul_buku`, `deskripsi_buku`, `pengarang`, `tahun`, `penerbit`, `nama_file`, `nama_file_ori`, `nama_cover`, `nama_cover_ori`, `is_deleted`, `created_at`, `updated_at`) VALUES
('5df6f5a734c45', '5df6f5b4dd2bd', '123456789', 'Refactoring UI', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure laborum aspernatur esse culpa deserunt dolores facilis cupiditate, libero quibusdam magnam? Recusandae at eum accusantium quisquam corporis? Voluptatum consequatur ipsa quo.', 'Adam Wathan', 2018, 'UIStore', '123456789_Component Gallery.pdf', 'Component Gallery.pdf', '123456789_cover_refactoring_ui.png', 'cover_refactoring_ui.png', '0', '2019-12-16 03:10:31', '2019-12-16 03:11:03');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `_id` varchar(13) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `is_deleted` set('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`_id`, `nama`, `is_deleted`, `created_at`, `updated_at`) VALUES
('5df06acca7fa0', 'novel', '0', '2019-12-11 04:04:28', '2019-12-16 02:56:07'),
('5df0707d98492', 'sejarah', '0', '2019-12-11 04:28:45', '2019-12-16 02:59:37'),
('5df071497aba0', 'islam', '0', '2019-12-11 04:32:09', '2019-12-16 02:59:39'),
('5df6f5b4dd2bd', 'UX/UI', '0', '2019-12-16 03:10:44', '2019-12-16 03:10:44');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `npm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_buku` int(11) NOT NULL,
  `tanggal_peminjaman` datetime NOT NULL,
  `tanggal_pengembalian` datetime NOT NULL,
  `nama_petugas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `denda` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin','Petugas') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indexes for table `ebook`
--
ALTER TABLE `ebook`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `kode_buku` (`kode_buku`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD UNIQUE KEY `npm` (`npm`,`kode_buku`,`nama_petugas`),
  ADD KEY `t_buku` (`kode_buku`),
  ADD KEY `t_petugas` (`nama_petugas`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `kode_buku` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `t_buku` FOREIGN KEY (`kode_buku`) REFERENCES `buku` (`kode_buku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_petugas` FOREIGN KEY (`nama_petugas`) REFERENCES `pengguna` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
