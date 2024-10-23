

CREATE TABLE `data_santri` (
  `id` int NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `penghasilan_ayah` decimal(15,2) NOT NULL,
  `status_ayah` enum('hidup','meninggal') NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `penghasilan_ibu` decimal(15,2) NOT NULL,
  `status_ibu` enum('hidup','meninggal') NOT NULL,
  `nama_wali` varchar(100) NOT NULL,
  `pekerjaan_wali` varchar(100) NOT NULL,
  `penghasilan_wali` decimal(15,2) NOT NULL,
  `alamat_wali` varchar(255) NOT NULL,
  `nomor_wa` varchar(15) NOT NULL,
  `pas_foto` varchar(255) NOT NULL,
  `scan_kk` varchar(255) NOT NULL,
  `scan_ktp_ortu` varchar(255) NOT NULL,
  `scan_akta` varchar(255) NOT NULL,
  `scan_skl` varchar(255) NOT NULL,
  `status` enum('pending','diterima','ditolak') NOT NULL,
  `no_pendaftaran` varchar(15) NOT NULL,
  `dibuat` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `di_perbarui` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `data_santri`
--

INSERT INTO `data_santri` (`id`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `asal_sekolah`, `nama_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `status_ayah`, `nama_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `status_ibu`, `nama_wali`, `pekerjaan_wali`, `penghasilan_wali`, `alamat_wali`, `nomor_wa`, `pas_foto`, `scan_kk`, `scan_ktp_ortu`, `scan_akta`, `scan_skl`, `status`, `no_pendaftaran`, `dibuat`, `di_perbarui`) VALUES
(1, 'FAHRI DWI HERMAWAN', 'Madiun', '2007-12-12', 'laki-laki', 'as', 'sdfsdf', 'dsfges', 11.00, 'meninggal', 'dfsfd', '11212', 11.00, 'hidup', 'dfsdf', '121', 12.00, '12', '12', 'uploads/pas_foto/pas_foto_PSB-6889.jpg', 'uploads/scan_kk/scan_kk_PSB-6889.png', 'uploads/scan_ktp_ortu/scan_ktp_ortu_PSB-6889.png', 'uploads/scan_akta/scan_akta_PSB-6889.png', 'uploads/scan_skl/scan_skl_PSB-6889.png', 'diterima', 'PSB-6889', '2024-10-20 05:08:04', '2024-10-20 05:42:26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_santri`
--
ALTER TABLE `akun_santri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `nomor_hp` (`nomor_hp`),
  ADD KEY `id_data_santri` (`id_data_santri`),
  ADD KEY `no_pendaftaran` (`no_pendaftaran`);

--
-- Indeks untuk tabel `data_santri`
--
ALTER TABLE `data_santri`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_pendaftaran` (`no_pendaftaran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun_santri`








--
ALTER TABLE `akun_santri`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_santri`
--
ALTER TABLE `data_santri`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akun_santri`
--
ALTER TABLE `akun_santri`
  ADD CONSTRAINT `akun_santri_ibfk_1` FOREIGN KEY (`id_data_santri`) REFERENCES `data_santri` (`id`),
  ADD CONSTRAINT `akun_santri_ibfk_2` FOREIGN KEY (`no_pendaftaran`) REFERENCES `data_santri` (`no_pendaftaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Okt 2024 pada 05.39
-- Versi server: 8.0.30
-- Versi PHP: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_santri`
--

CREATE TABLE `akun_santri` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `id_data_santri` int DEFAULT NULL,
  `no_pendaftaran` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `akun_santri`
--

INSERT INTO `akun_santri` (`id`, `username`, `password`, `nomor_hp`, `id_data_santri`, `no_pendaftaran`) VALUES
(1, 'fahri_dwi_hermawan', '$2y$10$U1nt5VwOEAm1UN9FfyRMzu1gxpQtz65c1ySxZqm2P4Md7YJsFv0m6', '12', 1, 'PSB-6889');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_santri`
--
