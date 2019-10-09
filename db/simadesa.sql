-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Okt 2019 pada 09.24
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simadesa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` int(11) NOT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('admin','warga') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_akun`, `nik`, `username`, `password`, `level`) VALUES
(1, '2', 'admin1453', 'e74efde55f25bf547720a7add8b73b6b', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_alat`
--

CREATE TABLE `tbl_alat` (
  `id_alat` int(11) NOT NULL,
  `key_alat` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_info`
--

CREATE TABLE `tbl_info` (
  `id_info` int(6) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `created_at` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_investor`
--

CREATE TABLE `tbl_investor` (
  `id_investor` int(11) NOT NULL,
  `nama_investor` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `kontak` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori_layanan`
--

CREATE TABLE `tbl_kategori_layanan` (
  `id_kategori` int(11) NOT NULL,
  `nama_layanan` varchar(255) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_layanan`
--

CREATE TABLE `tbl_layanan` (
  `id_layanan` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `ket_layanan` text,
  `status` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mitigasi`
--

CREATE TABLE `tbl_mitigasi` (
  `id_mitigasi` int(11) NOT NULL,
  `nama_lokasi` varchar(100) DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penduduk`
--

CREATE TABLE `tbl_penduduk` (
  `nik` varchar(30) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text,
  `jk` varchar(20) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `status_kawin` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(80) DEFAULT NULL,
  `kontak` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penduduk`
--

INSERT INTO `tbl_penduduk` (`nik`, `nama`, `tempat_lahir`, `tgl_lahir`, `alamat`, `jk`, `agama`, `status_kawin`, `pekerjaan`, `kontak`) VALUES
('2', 'Admin Simadesa', 'Sumedang', '2019-10-23', 'Sumedang', 'Laki-Laki', 'Islam', 'Belum Kawin', 'Mahasiswa', '082316369078');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_perangkat_desa`
--

CREATE TABLE `tbl_perangkat_desa` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `kontak` varchar(12) DEFAULT NULL,
  `jabatan` varchar(80) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_potensi`
--

CREATE TABLE `tbl_potensi` (
  `id_potensi` int(11) NOT NULL,
  `jenis_potensi` varchar(80) DEFAULT NULL,
  `nama_potensi` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_regis_alat`
--

CREATE TABLE `tbl_regis_alat` (
  `id_registrasi` int(11) NOT NULL,
  `id_alat` int(11) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_umkm`
--

CREATE TABLE `tbl_umkm` (
  `id_umkm` int(11) NOT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `nama_usaha` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_usulan`
--

CREATE TABLE `tbl_usulan` (
  `id_usulan` int(11) NOT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `usulan` text,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `tbl_alat`
--
ALTER TABLE `tbl_alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indeks untuk tabel `tbl_info`
--
ALTER TABLE `tbl_info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indeks untuk tabel `tbl_investor`
--
ALTER TABLE `tbl_investor`
  ADD PRIMARY KEY (`id_investor`);

--
-- Indeks untuk tabel `tbl_kategori_layanan`
--
ALTER TABLE `tbl_kategori_layanan`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_layanan`
--
ALTER TABLE `tbl_layanan`
  ADD PRIMARY KEY (`id_layanan`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `tbl_mitigasi`
--
ALTER TABLE `tbl_mitigasi`
  ADD PRIMARY KEY (`id_mitigasi`);

--
-- Indeks untuk tabel `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `tbl_perangkat_desa`
--
ALTER TABLE `tbl_perangkat_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_potensi`
--
ALTER TABLE `tbl_potensi`
  ADD PRIMARY KEY (`id_potensi`);

--
-- Indeks untuk tabel `tbl_regis_alat`
--
ALTER TABLE `tbl_regis_alat`
  ADD PRIMARY KEY (`id_registrasi`),
  ADD KEY `id_alat` (`id_alat`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `tbl_umkm`
--
ALTER TABLE `tbl_umkm`
  ADD PRIMARY KEY (`id_umkm`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `tbl_usulan`
--
ALTER TABLE `tbl_usulan`
  ADD PRIMARY KEY (`id_usulan`),
  ADD KEY `nik` (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_alat`
--
ALTER TABLE `tbl_alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `id_info` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_investor`
--
ALTER TABLE `tbl_investor`
  MODIFY `id_investor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori_layanan`
--
ALTER TABLE `tbl_kategori_layanan`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_layanan`
--
ALTER TABLE `tbl_layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_mitigasi`
--
ALTER TABLE `tbl_mitigasi`
  MODIFY `id_mitigasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_perangkat_desa`
--
ALTER TABLE `tbl_perangkat_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_potensi`
--
ALTER TABLE `tbl_potensi`
  MODIFY `id_potensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_regis_alat`
--
ALTER TABLE `tbl_regis_alat`
  MODIFY `id_registrasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_umkm`
--
ALTER TABLE `tbl_umkm`
  MODIFY `id_umkm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_usulan`
--
ALTER TABLE `tbl_usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD CONSTRAINT `tbl_akun_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tbl_penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_layanan`
--
ALTER TABLE `tbl_layanan`
  ADD CONSTRAINT `tbl_layanan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tbl_kategori_layanan` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_layanan_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `tbl_penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_regis_alat`
--
ALTER TABLE `tbl_regis_alat`
  ADD CONSTRAINT `tbl_regis_alat_ibfk_1` FOREIGN KEY (`id_alat`) REFERENCES `tbl_alat` (`id_alat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_regis_alat_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `tbl_penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_umkm`
--
ALTER TABLE `tbl_umkm`
  ADD CONSTRAINT `tbl_umkm_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tbl_penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_usulan`
--
ALTER TABLE `tbl_usulan`
  ADD CONSTRAINT `tbl_usulan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tbl_penduduk` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
