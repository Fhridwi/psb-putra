-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2024 at 02:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `data_santri`
--

CREATE TABLE `data_santri` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `penghasilan_ayah` decimal(10,2) NOT NULL,
  `alamat_ayah` text NOT NULL,
  `status_ayah` enum('Hidup','Meninggal') NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `penghasilan_ibu` decimal(10,2) NOT NULL,
  `alamat_ibu` text NOT NULL,
  `status_ibu` enum('Hidup','Meninggal') NOT NULL,
  `wali_nama` varchar(100) NOT NULL,
  `wali_pekerjaan` varchar(100) NOT NULL,
  `wali_no_hp` varchar(15) NOT NULL,
  `wali_alamat` text NOT NULL,
  `program` enum('Intensif','Reguler') NOT NULL,
  `jenjang` varchar(50) NOT NULL,
  `sekolah` varchar(100) NOT NULL,
  `status_pendaftaran` enum('Pending','Diterima','Ditolak') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_santri`
--

INSERT INTO `data_santri` (`id`, `user_id`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `asal_sekolah`, `nama_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `alamat_ayah`, `status_ayah`, `nama_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `alamat_ibu`, `status_ibu`, `wali_nama`, `wali_pekerjaan`, `wali_no_hp`, `wali_alamat`, `program`, `jenjang`, `sekolah`, `status_pendaftaran`, `created_at`, `updated_at`) VALUES
(4, 1, 'Surya Kencana', 'Nganjuk', '1212-12-12', 'Perempuan', 'MI Balang', 'sasas', 'sasa', 121.00, 'asa', 'Hidup', 'Suparmi', 'rtytry', 12.00, 'sa', 'Hidup', 'sasas', 'asas', '121212', 'asasas', 'Intensif', 'mtsn', 'mts_bu', 'Pending', '2024-10-19 23:50:21', '2024-10-19 23:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_pendaftaran` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `nomor_hp`, `password`, `no_pendaftaran`, `created_at`) VALUES
(1, 'kamel', 'mrfahridwihermawan@gmail.com', '085792336956', '$2y$10$Y8LOApOUNYLgNbrE52kuquQcVQg1CWNu0doZQWjDVCIKcUL46lWnC', 'PSB-7569', '2024-10-19 19:05:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_santri`
--
ALTER TABLE `data_santri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `no_pendaftaran` (`no_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_santri`
--
ALTER TABLE `data_santri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_santri`
--
ALTER TABLE `data_santri`
  ADD CONSTRAINT `data_santri_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
