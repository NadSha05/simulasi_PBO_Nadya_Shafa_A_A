-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2026 at 03:00 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_trpl1a_nadya_shafa_a_a`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(50) DEFAULT NULL,
  `lokasi_kampus` varchar(50) DEFAULT NULL,
  `jenis_prestasi` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` varchar(50) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Andi Pratama', 'SMA Negeri 1 Jakarta', 85.50, 200000.00, 'Reguler', 'Informatika', 'Kampus A', NULL, NULL, NULL, NULL),
(2, 'Siti Aminah', 'SMA Negeri 2 Bandung', 78.00, 200000.00, 'Reguler', 'Sistem Informasi', 'Kampus B', NULL, NULL, NULL, NULL),
(3, 'Budi Santoso', 'SMA Negeri 3 Surabaya', 90.00, 200000.00, 'Reguler', 'Teknik Sipil', 'Kampus A', NULL, NULL, NULL, NULL),
(4, 'Dewi Lestari', 'SMA Swasta 1 Medan', 82.20, 200000.00, 'Reguler', 'Akuntansi', 'Kampus C', NULL, NULL, NULL, NULL),
(5, 'Eko Prasetyo', 'SMA Negeri 5 Semarang', 75.50, 200000.00, 'Reguler', 'Manajemen', 'Kampus B', NULL, NULL, NULL, NULL),
(6, 'Fajar Nugraha', 'SMA Negeri 4 Yogyakarta', 88.00, 200000.00, 'Reguler', 'Ilmu Komunikasi', 'Kampus A', NULL, NULL, NULL, NULL),
(7, 'Gita Permata', 'SMA Negeri 1 Malang', 79.50, 200000.00, 'Reguler', 'Hukum', 'Kampus C', NULL, NULL, NULL, NULL),
(8, 'Hadi Wijaya', 'SMA Negeri 2 Solo', 81.00, 200000.00, 'Reguler', 'Psikologi', 'Kampus B', NULL, NULL, NULL, NULL),
(9, 'Indah Sari', 'SMA Negeri 1 Denpasar', 84.00, 200000.00, 'Reguler', 'Kedokteran', 'Kampus A', NULL, NULL, NULL, NULL),
(10, 'Joko Anwar', 'SMA Negeri 1 Palu', 77.50, 200000.00, 'Reguler', 'Arsitektur', 'Kampus C', NULL, NULL, NULL, NULL),
(11, 'Hana Wulandari', 'SMA Kesatuan Bogor', 92.00, 200000.00, 'Prestasi', NULL, NULL, 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(12, 'Irfan Hakim', 'SMA Taruna Nusantara', 95.50, 200000.00, 'Prestasi', NULL, NULL, 'Olimpiade Fisika', 'Internasional', NULL, NULL),
(13, 'Julia Perez', 'SMA Muhammadiyah 1', 88.50, 200000.00, 'Prestasi', NULL, NULL, 'Kejuaraan Pencak Silat', 'Provinsi', NULL, NULL),
(14, 'Kevin Sanjaya', 'SMA Negeri 70 Jakarta', 91.00, 200000.00, 'Prestasi', NULL, NULL, 'Lomba Karya Tulis', 'Nasional', NULL, NULL),
(15, 'Lestari Ningrum', 'SMA Negeri 8 Jakarta', 96.00, 200000.00, 'Prestasi', NULL, NULL, 'Olimpiade Kimia', 'Internasional', NULL, NULL),
(16, 'Muhammad Ridwan', 'SMA Negeri 2 Makassar', 89.00, 200000.00, 'Prestasi', NULL, NULL, 'Debat Bahasa Inggris', 'Nasional', NULL, NULL),
(17, 'Nadia Salsabila', 'SMA Negeri 1 Palembang', 93.50, 200000.00, 'Prestasi', NULL, NULL, 'Olimpiade Biologi', 'Nasional', NULL, NULL),
(18, 'Omar Dani', 'SMA Negeri 1 Balikpapan', 90.00, 200000.00, 'Prestasi', NULL, NULL, 'Kejuaraan Renang', 'Provinsi', NULL, NULL),
(19, 'Putu Wijaya', 'SMA Negeri 4 Denpasar', 94.00, 200000.00, 'Prestasi', NULL, NULL, 'Lomba Robotik', 'Nasional', NULL, NULL),
(20, 'Qania Aulia', 'SMA Negeri 1 Padang', 92.50, 200000.00, 'Prestasi', NULL, NULL, 'Olimpiade Ekonomi', 'Nasional', NULL, NULL),
(21, 'Oscar Septian', 'SMA Angkasa 1', 84.00, 250000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-2026-001', 'Kemenhub'),
(22, 'Putri Patricia', 'SMA Negeri 6 Surabaya', 90.50, 250000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-2026-002', 'Kemenkeu'),
(23, 'Qori Maulana', 'SMA Plus Riau', 87.00, 250000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-2026-003', 'Kemendagri'),
(24, 'Rizki Ramadhan', 'SMA Negeri 1 Padang', 91.20, 250000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-2026-004', 'BIN'),
(25, 'Sonia Isabella', 'SMA BPK Penabur', 88.00, 250000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-2026-005', 'Kemenkumham'),
(26, 'Tomi Gunawan', 'SMA Negeri 2 Bandung', 85.00, 250000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-2026-006', 'Kemenkes'),
(27, 'Umar Faruq', 'SMA Negeri 1 Medan', 89.50, 250000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-2026-007', 'Kemenlu'),
(28, 'Vina Amelia', 'SMA Negeri 3 Malang', 92.00, 250000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-2026-008', 'Kemenhan'),
(29, 'Wawan Setiawan', 'SMA Negeri 1 Semarang', 86.00, 250000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-2026-009', 'Kemendikbud'),
(30, 'Xenia Putri', 'SMA Negeri 2 Yogyakarta', 91.00, 250000.00, 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-2026-010', 'BPS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
