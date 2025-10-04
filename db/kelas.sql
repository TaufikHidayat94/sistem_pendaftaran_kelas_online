-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2025 at 11:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelas`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(10) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `id_pengajar` varchar(10) NOT NULL,
  `kapasitas` int(5) NOT NULL,
  `id_ta` varchar(10) NOT NULL,
  `terdaftar` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `id_pengajar`, `kapasitas`, `id_ta`, `terdaftar`) VALUES
('KL-0001', 'Matematika', 'PG-000003', 40, 'TA-0009', 1),
('KL-0002', 'Bahasa Indonesia', 'PG-000004', 40, 'TA-0009', 0),
('KL-0003', 'IPA', 'PG-000005', 40, 'TA-0009', 0),
('KL-0004', 'IPS', 'PG-000006', 40, 'TA-0009', 1),
('KL-0005', 'PKN', 'PG-000007', 40, 'TA-0009', 0),
('KL-0006', 'Bahasa Inggris', 'PG-000008', 40, 'TA-0009', 0),
('KL-0007', 'Seni Budaya', 'PG-000009', 40, 'TA-0009', 0),
('KL-0008', 'Penjaskes', 'PG-000010', 40, 'TA-0009', 0),
('KL-0009', 'Fisika', 'PG-000011', 40, 'TA-0009', 0),
('KL-0010', 'Kimia', 'PG-000012', 40, 'TA-0009', 0),
('KL-0011', 'Biologi', 'PG-000013', 40, 'TA-0010', 0),
('KL-0012', 'Ekonomi', 'PG-000014', 40, 'TA-0010', 0),
('KL-0013', 'Geografi', 'PG-000015', 40, 'TA-0010', 0),
('KL-0014', 'Sosiologi', 'PG-000016', 40, 'TA-0010', 0),
('KL-0015', 'Sejarah', 'PG-000017', 40, 'TA-0010', 0),
('KL-0016', 'TIK', 'PG-000018', 40, 'TA-0010', 0),
('KL-0017', 'Bahasa Jawa', 'PG-000019', 40, 'TA-0010', 0),
('KL-0018', 'Bahasa Sunda', 'PG-000020', 40, 'TA-0010', 0),
('KL-0019', 'Bahasa Arab', 'PG-000021', 40, 'TA-0010', 0),
('KL-0020', 'Bahasa Jepang', 'PG-000022', 40, 'TA-0010', 0),
('KL-0021', 'Matematika', 'PG-000003', 40, 'TA-0011', 0),
('KL-0022', 'Bahasa Indonesia', 'PG-000004', 40, 'TA-0011', 2),
('KL-0023', 'IPA', 'PG-000005', 40, 'TA-0011', 2),
('KL-0024', 'IPS', 'PG-000006', 40, 'TA-0011', 2),
('KL-0025', 'PKN', 'PG-000007', 40, 'TA-0011', 2),
('KL-0026', 'Bahasa Inggris', 'PG-000008', 40, 'TA-0011', 0),
('KL-0027', 'Seni Budaya', 'PG-000009', 40, 'TA-0011', 2),
('KL-0028', 'Penjaskes', 'PG-000010', 40, 'TA-0011', 2),
('KL-0029', 'Fisika', 'PG-000011', 40, 'TA-0011', 2),
('KL-0030', 'Kimia', 'PG-000012', 40, 'TA-0011', 2),
('KL-0031', 'Biologi', 'PG-000013', 40, 'TA-0012', 7),
('KL-0032', 'Ekonomi', 'PG-000014', 40, 'TA-0012', 18),
('KL-0033', 'Geografi', 'PG-000015', 40, 'TA-0012', 7),
('KL-0034', 'Sosiologi', 'PG-000016', 40, 'TA-0012', 15),
('KL-0035', 'Sejarah', 'PG-000017', 40, 'TA-0012', 11),
('KL-0036', 'TIK', 'PG-000018', 40, 'TA-0012', 7),
('KL-0037', 'Bahasa Jawa', 'PG-000019', 40, 'TA-0012', 12),
('KL-0038', 'Bahasa Sunda', 'PG-000020', 40, 'TA-0012', 5),
('KL-0039', 'Bahasa Arab', 'PG-000021', 40, 'TA-0012', 13),
('KL-0040', 'Bahasa Jepang', 'PG-000022', 40, 'TA-0012', 12),
('KL-0041', 'Kewirausahaan', 'PG-000023', 40, 'TA-0012', 7),
('KL-0042', 'Kerajinan Tangan', 'PG-000024', 40, 'TA-0010', 0),
('KL-0043', 'Bahasa Mandarin', 'PG-000025', 40, 'TA-0011', 2),
('KL-0044', 'Desain Grafis', 'PG-000026', 40, 'TA-0012', 15),
('KL-0045', 'Fotografi', 'PG-000027', 40, 'TA-0009', 0),
('KL-0046', 'Musik', 'PG-000028', 40, 'TA-0010', 0),
('KL-0047', 'Tari', 'PG-000029', 40, 'TA-0011', 2),
('KL-0048', 'Teater', 'PG-000030', 40, 'TA-0012', 11),
('KL-0049', 'Multimedia', 'PG-000031', 40, 'TA-0009', 0),
('KL-0050', 'Desain Interior', 'PG-000032', 40, 'TA-0010', 0),
('KL-0051', 'Sastra Mesin', 'PG-000001', 50, 'TA-0003', 0),
('KL-0052', 'Sastra Komputer', 'PG-000003', 55, 'TA-0005', 0),
('KL-0053', 'Teknik Sipil', 'PG-000011', 35, 'TA-0012', 2);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1759500981);

-- --------------------------------------------------------

--
-- Table structure for table `order_kelas`
--

CREATE TABLE `order_kelas` (
  `id_trx` varchar(20) NOT NULL,
  `id_siswa` varchar(10) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `waktu_order` time NOT NULL,
  `tanggal_order` date DEFAULT NULL,
  `approval_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_kelas`
--

INSERT INTO `order_kelas` (`id_trx`, `id_siswa`, `id_kelas`, `status`, `waktu_order`, `tanggal_order`, `approval_date`) VALUES
('TX-000001', 'SI-000001', 'KL-0001', 'approved', '11:45:26', '2025-10-03', '2025-10-03 11:45:26'),
('TX-000002', 'SI-000007', 'KL-0004', 'approved', '15:42:43', '2025-09-29', '2025-09-29 15:42:43'),
('TX-000003', 'SI-000007', 'KL-0038', 'approved', '17:04:25', '2025-09-29', '2025-09-29 17:04:25'),
('TX-000004', 'SI-000007', 'KL-0040', 'approved', '19:37:06', '2025-09-30', '2025-09-30 19:37:06'),
('TX-000005', 'SI-000007', 'KL-0032', 'approved', '17:31:39', '2025-09-30', '2025-09-30 17:31:39'),
('TX-000006', 'SI-000007', 'KL-0036', 'approved', '18:02:24', '2025-09-30', '2025-09-30 18:02:24'),
('TX-000007', 'SI-000004', 'KL-0005', 'approved', '19:37:39', '2025-09-30', '2025-09-30 19:37:39'),
('TX-000008', 'SI-000010', 'KL-0034', 'approved', '15:46:19', '2025-10-01', '2025-10-01 15:46:19'),
('TX-000009', 'SI-000010', 'KL-0039', 'approved', '15:46:30', '2025-10-01', '2025-10-01 15:46:30'),
('TX-000010', 'SI-000010', 'KL-0044', 'approved', '15:46:39', '2025-10-01', '2025-10-01 15:46:39'),
('TX-000011', 'SI-000010', 'KL-0032', 'approved', '15:46:46', '2025-10-01', '2025-10-01 15:46:46'),
('TX-000012', 'SI-000010', 'KL-0037', 'approved', '15:46:57', '2025-10-01', '2025-10-01 15:46:57'),
('TX-000013', 'SI-000006', 'KL-0034', 'approved', '15:55:27', '2025-10-01', '2025-10-01 15:55:27'),
('TX-000014', 'SI-000006', 'KL-0039', 'approved', '15:55:33', '2025-10-01', '2025-10-01 15:55:33'),
('TX-000015', 'SI-000006', 'KL-0044', 'approved', '15:55:43', '2025-10-01', '2025-10-01 15:55:43'),
('TX-000016', 'SI-000006', 'KL-0032', 'approved', '15:55:54', '2025-10-01', '2025-10-01 15:55:54'),
('TX-000017', 'SI-000006', 'KL-0037', 'approved', '15:56:04', '2025-10-01', '2025-10-01 15:56:04'),
('TX-000018', 'SI-000006', 'KL-0035', 'approved', '15:56:13', '2025-10-01', '2025-10-01 15:56:13'),
('TX-000019', 'SI-000006', 'KL-0040', 'approved', '15:57:08', '2025-10-01', '2025-10-01 15:57:08'),
('TX-000020', 'SI-000014', 'KL-0034', 'approved', '15:58:51', '2025-10-01', '2025-10-01 15:58:51'),
('TX-000021', 'SI-000014', 'KL-0033', 'approved', '15:59:02', '2025-10-01', '2025-10-01 15:59:02'),
('TX-000022', 'SI-000014', 'KL-0039', 'approved', '15:59:11', '2025-10-01', '2025-10-01 15:59:11'),
('TX-000023', 'SI-000014', 'KL-0044', 'approved', '15:59:21', '2025-10-01', '2025-10-01 15:59:21'),
('TX-000024', 'SI-000014', 'KL-0032', 'approved', '15:59:30', '2025-10-01', '2025-10-01 15:59:30'),
('TX-000025', 'SI-000014', 'KL-0037', 'approved', '15:59:39', '2025-10-01', '2025-10-01 15:59:39'),
('TX-000026', 'SI-000014', 'KL-0035', 'approved', '15:59:49', '2025-10-01', '2025-10-01 15:59:49'),
('TX-000027', 'SI-000014', 'KL-0040', 'approved', '15:59:58', '2025-10-01', '2025-10-01 15:59:58'),
('TX-000028', 'SI-000014', 'KL-0038', 'approved', '16:00:09', '2025-10-01', '2025-10-01 16:00:09'),
('TX-000029', 'SI-000014', 'KL-0048', 'approved', '16:00:18', '2025-10-01', '2025-10-01 16:00:18'),
('TX-000030', 'SI-000005', 'KL-0034', 'approved', '16:03:45', '2025-10-01', '2025-10-01 16:03:45'),
('TX-000031', 'SI-000005', 'KL-0044', 'approved', '16:03:51', '2025-10-01', '2025-10-01 16:03:51'),
('TX-000032', 'SI-000005', 'KL-0032', 'approved', '16:03:53', '2025-10-01', '2025-10-01 16:03:53'),
('TX-000033', 'SI-000005', 'KL-0037', 'approved', '16:03:55', '2025-10-01', '2025-10-01 16:03:55'),
('TX-000034', 'SI-000005', 'KL-0035', 'approved', '16:03:57', '2025-10-01', '2025-10-01 16:03:57'),
('TX-000035', 'SI-000005', 'KL-0040', 'approved', '16:03:59', '2025-10-01', '2025-10-01 16:03:59'),
('TX-000036', 'SI-000005', 'KL-0033', 'approved', '16:04:02', '2025-10-01', '2025-10-01 16:04:02'),
('TX-000037', 'SI-000005', 'KL-0038', 'approved', '16:04:04', '2025-10-01', '2025-10-01 16:04:04'),
('TX-000038', 'SI-000005', 'KL-0039', 'approved', '16:04:17', '2025-10-01', '2025-10-01 16:04:17'),
('TX-000039', 'SI-000005', 'KL-0048', 'approved', '16:04:29', '2025-10-01', '2025-10-01 16:04:29'),
('TX-000040', 'SI-000005', 'KL-0031', 'approved', '16:04:39', '2025-10-01', '2025-10-01 16:04:39'),
('TX-000041', 'SI-000005', 'KL-0041', 'approved', '16:04:52', '2025-10-01', '2025-10-01 16:04:52'),
('TX-000042', 'SI-000005', 'KL-0036', 'approved', '16:05:02', '2025-10-01', '2025-10-01 16:05:02'),
('TX-000043', 'SI-000016', 'KL-0034', 'approved', '16:15:56', '2025-10-01', '2025-10-01 16:15:56'),
('TX-000044', 'SI-000016', 'KL-0039', 'approved', '16:16:06', '2025-10-01', '2025-10-01 16:16:06'),
('TX-000045', 'SI-000016', 'KL-0044', 'approved', '16:16:17', '2025-10-01', '2025-10-01 16:16:17'),
('TX-000046', 'SI-000016', 'KL-0032', 'approved', '16:16:21', '2025-10-01', '2025-10-01 16:16:21'),
('TX-000047', 'SI-000016', 'KL-0037', 'approved', '16:16:23', '2025-10-01', '2025-10-01 16:16:23'),
('TX-000048', 'SI-000016', 'KL-0035', 'approved', '16:16:34', '2025-10-01', '2025-10-01 16:16:34'),
('TX-000049', 'SI-000016', 'KL-0031', 'approved', '16:16:45', '2025-10-01', '2025-10-01 16:16:45'),
('TX-000050', 'SI-000016', 'KL-0041', 'approved', '16:16:57', '2025-10-01', '2025-10-01 16:16:57'),
('TX-000051', 'SI-000019', 'KL-0034', 'approved', '16:18:36', '2025-10-01', '2025-10-01 16:18:36'),
('TX-000052', 'SI-000019', 'KL-0039', 'approved', '16:18:46', '2025-10-01', '2025-10-01 16:18:46'),
('TX-000053', 'SI-000019', 'KL-0044', 'approved', '16:18:55', '2025-10-01', '2025-10-01 16:18:55'),
('TX-000054', 'SI-000019', 'KL-0032', 'approved', '16:19:05', '2025-10-01', '2025-10-01 16:19:05'),
('TX-000055', 'SI-000019', 'KL-0037', 'approved', '16:19:16', '2025-10-01', '2025-10-01 16:19:16'),
('TX-000056', 'SI-000019', 'KL-0035', 'approved', '16:19:26', '2025-10-01', '2025-10-01 16:19:26'),
('TX-000057', 'SI-000020', 'KL-0034', 'approved', '16:22:15', '2025-10-01', '2025-10-01 16:22:15'),
('TX-000058', 'SI-000020', 'KL-0039', 'approved', '16:22:25', '2025-10-01', '2025-10-01 16:22:25'),
('TX-000059', 'SI-000020', 'KL-0044', 'approved', '16:22:32', '2025-10-01', '2025-10-01 16:22:32'),
('TX-000060', 'SI-000020', 'KL-0032', 'approved', '16:22:34', '2025-10-01', '2025-10-01 16:22:34'),
('TX-000061', 'SI-000020', 'KL-0037', 'approved', '16:22:36', '2025-10-01', '2025-10-01 16:22:36'),
('TX-000062', 'SI-000020', 'KL-0035', 'approved', '16:22:38', '2025-10-01', '2025-10-01 16:22:38'),
('TX-000063', 'SI-000020', 'KL-0040', 'approved', '16:22:40', '2025-10-01', '2025-10-01 16:22:40'),
('TX-000064', 'SI-000021', 'KL-0034', 'approved', '16:24:28', '2025-10-01', '2025-10-01 16:24:28'),
('TX-000065', 'SI-000021', 'KL-0039', 'approved', '16:24:34', '2025-10-01', '2025-10-01 16:24:34'),
('TX-000066', 'SI-000021', 'KL-0044', 'approved', '16:24:46', '2025-10-01', '2025-10-01 16:24:46'),
('TX-000067', 'SI-000021', 'KL-0032', 'approved', '16:24:52', '2025-10-01', '2025-10-01 16:24:52'),
('TX-000068', 'SI-000021', 'KL-0037', 'approved', '16:25:02', '2025-10-01', '2025-10-01 16:25:02'),
('TX-000069', 'SI-000021', 'KL-0035', 'approved', '16:25:12', '2025-10-01', '2025-10-01 16:25:12'),
('TX-000070', 'SI-000022', 'KL-0034', 'approved', '16:25:50', '2025-10-01', '2025-10-01 16:25:50'),
('TX-000071', 'SI-000022', 'KL-0039', 'approved', '16:26:00', '2025-10-01', '2025-10-01 16:26:00'),
('TX-000072', 'SI-000022', 'KL-0044', 'approved', '16:26:10', '2025-10-01', '2025-10-01 16:26:10'),
('TX-000073', 'SI-000022', 'KL-0032', 'approved', '16:26:20', '2025-10-01', '2025-10-01 16:26:20'),
('TX-000074', 'SI-000022', 'KL-0037', 'approved', '16:26:33', '2025-10-01', '2025-10-01 16:26:33'),
('TX-000075', 'SI-000022', 'KL-0035', 'approved', '16:28:26', '2025-10-01', '2025-10-01 16:28:26'),
('TX-000076', 'SI-000022', 'KL-0040', 'approved', '16:29:20', '2025-10-01', '2025-10-01 16:29:20'),
('TX-000077', 'SI-000013', 'KL-0034', 'approved', '16:32:25', '2025-10-01', '2025-10-01 16:32:25'),
('TX-000078', 'SI-000013', 'KL-0039', 'approved', '16:32:34', '2025-10-01', '2025-10-01 16:32:34'),
('TX-000079', 'SI-000013', 'KL-0044', 'approved', '16:32:44', '2025-10-01', '2025-10-01 16:32:44'),
('TX-000080', 'SI-000013', 'KL-0032', 'approved', '16:32:53', '2025-10-01', '2025-10-01 16:32:53'),
('TX-000081', 'SI-000013', 'KL-0037', 'approved', '16:33:04', '2025-10-01', '2025-10-01 16:33:04'),
('TX-000082', 'SI-000013', 'KL-0035', 'approved', '16:33:14', '2025-10-01', '2025-10-01 16:33:14'),
('TX-000083', 'SI-000033', 'KL-0034', 'approved', '16:34:49', '2025-10-01', '2025-10-01 16:34:49'),
('TX-000084', 'SI-000033', 'KL-0039', 'approved', '16:34:59', '2025-10-01', '2025-10-01 16:34:59'),
('TX-000085', 'SI-000033', 'KL-0044', 'approved', '16:35:08', '2025-10-01', '2025-10-01 16:35:08'),
('TX-000086', 'SI-000033', 'KL-0032', 'approved', '16:35:18', '2025-10-01', '2025-10-01 16:35:18'),
('TX-000087', 'SI-000033', 'KL-0037', 'approved', '16:35:28', '2025-10-01', '2025-10-01 16:35:28'),
('TX-000088', 'SI-000033', 'KL-0035', 'approved', '16:35:37', '2025-10-01', '2025-10-01 16:35:37'),
('TX-000089', 'SI-000033', 'KL-0041', 'approved', '16:35:48', '2025-10-01', '2025-10-01 16:35:48'),
('TX-000090', 'SI-000033', 'KL-0040', 'approved', '16:35:57', '2025-10-01', '2025-10-01 16:35:57'),
('TX-000091', 'SI-000033', 'KL-0033', 'approved', '16:36:02', '2025-10-01', '2025-10-01 16:36:02'),
('TX-000092', 'SI-000033', 'KL-0038', 'approved', '16:36:04', '2025-10-01', '2025-10-01 16:36:04'),
('TX-000093', 'SI-000033', 'KL-0048', 'approved', '16:36:06', '2025-10-01', '2025-10-01 16:36:06'),
('TX-000094', 'SI-000033', 'KL-0031', 'approved', '16:36:08', '2025-10-01', '2025-10-01 16:36:08'),
('TX-000095', 'SI-000033', 'KL-0036', 'approved', '16:36:10', '2025-10-01', '2025-10-01 16:36:10'),
('TX-000096', 'SI-000018', 'KL-0040', 'approved', '17:17:32', '2025-10-01', '2025-10-01 17:17:32'),
('TX-000097', 'SI-000018', 'KL-0035', 'approved', '17:20:31', '2025-10-01', '2025-10-01 17:20:31'),
('TX-000098', 'SI-000018', 'KL-0033', 'approved', '17:22:01', '2025-10-01', '2025-10-01 17:22:01'),
('TX-000099', 'SI-000018', 'KL-0037', 'approved', '17:24:29', '2025-10-01', '2025-10-01 17:24:29'),
('TX-000100', 'SI-000018', 'KL-0032', 'approved', '17:37:44', '2025-10-01', '2025-10-01 17:37:44'),
('TX-000101', 'SI-000018', 'KL-0038', 'approved', '17:40:42', '2025-10-01', '2025-10-01 17:40:42'),
('TX-000102', 'SI-000018', 'KL-0048', 'approved', '17:48:22', '2025-10-01', '2025-10-01 17:48:22'),
('TX-000103', 'SI-000018', 'KL-0031', 'approved', '17:50:39', '2025-10-01', '2025-10-01 17:50:39'),
('TX-000104', 'SI-000018', 'KL-0036', 'approved', '17:51:51', '2025-10-01', '2025-10-01 17:51:51'),
('TX-000105', 'SI-000018', 'KL-0041', 'approved', '17:54:04', '2025-10-01', '2025-10-01 17:54:04'),
('TX-000106', 'SI-000018', 'KL-0024', 'approved', '17:56:17', '2025-10-01', '2025-10-01 17:56:17'),
('TX-000107', 'SI-000018', 'KL-0044', 'approved', '17:57:09', '2025-10-01', '2025-10-01 17:57:09'),
('TX-000108', 'SI-000018', 'KL-0039', 'approved', '18:00:57', '2025-10-01', '2025-10-01 18:00:57'),
('TX-000109', 'SI-000018', 'KL-0034', 'approved', '15:57:23', '2025-10-02', '2025-10-02 15:57:23'),
('TX-000110', 'SI-000018', 'KL-0029', 'approved', '16:03:02', '2025-10-02', '2025-10-02 16:03:02'),
('TX-000111', 'SI-000018', 'KL-0022', 'approved', '16:03:23', '2025-10-02', '2025-10-02 16:03:23'),
('TX-000112', 'SI-000018', 'KL-0027', 'approved', '16:03:53', '2025-10-02', '2025-10-02 16:03:53'),
('TX-000113', 'SI-000018', 'KL-0023', 'approved', '16:06:16', '2025-10-02', '2025-10-02 16:06:16'),
('TX-000114', 'SI-000018', 'KL-0047', 'approved', '16:10:21', '2025-10-02', '2025-10-02 16:10:21'),
('TX-000115', 'SI-000018', 'KL-0028', 'approved', '16:11:10', '2025-10-02', '2025-10-02 16:11:10'),
('TX-000116', 'SI-000018', 'KL-0025', 'approved', '16:33:47', '2025-10-02', '2025-10-02 16:33:47'),
('TX-000117', 'SI-000018', 'KL-0030', 'approved', '16:37:56', '2025-10-02', '2025-10-02 16:37:56'),
('TX-000118', 'SI-000018', 'KL-0043', 'approved', '16:41:49', '2025-10-02', '2025-10-02 16:41:49'),
('TX-000119', 'SI-000052', 'KL-0034', 'approved', '16:52:42', '2025-10-02', '2025-10-02 16:52:42'),
('TX-000120', 'SI-000052', 'KL-0040', 'approved', '20:01:28', '2025-10-02', '2025-10-02 20:01:28'),
('TX-000121', 'SI-000053', 'KL-0048', 'approved', '05:54:02', '2025-10-03', '2025-10-03 05:54:02'),
('TX-000122', 'SI-000053', 'KL-0033', 'approved', '06:06:30', '2025-10-03', '2025-10-03 06:06:30'),
('TX-000123', 'SI-000053', 'KL-0032', 'approved', '06:12:44', '2025-10-03', '2025-10-03 06:12:44'),
('TX-000125', 'SI-000054', 'KL-0044', 'approved', '10:26:51', '2025-10-03', '2025-10-03 10:26:51'),
('TX-000126', 'SI-000054', 'KL-0032', 'approved', '11:39:56', '2025-10-03', '2025-10-03 11:39:56'),
('TX-000127', 'SI-000056', 'KL-0031', 'approved', '15:01:06', '2025-10-03', '2025-10-03 15:01:06'),
('TX-000128', 'SI-000056', 'KL-0036', 'approved', '15:10:59', '2025-10-03', '2025-10-03 15:10:59'),
('TX-000129', 'SI-000056', 'KL-0048', 'approved', '15:18:05', '2025-10-03', '2025-10-03 15:18:05'),
('TX-000130', 'SI-000056', 'KL-0041', 'approved', '15:15:43', '2025-10-03', '2025-10-03 15:15:43'),
('TX-000131', 'SI-000058', 'KL-0040', 'batal', '09:19:57', '2025-10-04', '2025-10-04 09:19:57'),
('TX-000132', 'SI-000058', 'KL-0053', 'approved', '09:14:59', '2025-10-04', '2025-10-04 09:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` varchar(15) NOT NULL,
  `pendidikan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `pendidikan`) VALUES
('IP-000001', 'Sekolah Dasar (SD)'),
('IP-000002', 'Sekolah Menengah Pertama (SMP)'),
('IP-000003', 'Sekolah Menengah Atas (SMA)'),
('IP-000004', 'Diploma 1 (D1)'),
('IP-000005', 'Diploma 2 (D2)'),
('IP-000006', 'Diploma 3 (D3)'),
('IP-000007', 'Diploma 4 (D4)'),
('IP-000008', 'Sarjana (S1)'),
('IP-000009', 'Magister (S2)'),
('IP-000010', 'Doktor (S3)');

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id_pengajar` varchar(10) NOT NULL,
  `nama_pengajar` varchar(100) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id_pengajar`, `nama_pengajar`, `pendidikan`, `tanggal_terdaftar`, `kontak`, `username`, `email`) VALUES
('PG-000001', 'Roberto Pakpahan', 'IP-000008', '2025-09-21', '6285469874123', 'roberto.pakpahan', 'roberto.pakpahan@jimel.com'),
('PG-000002', 'Clarissa Rochefort', 'IP-000009', '2025-09-21', '6287789654123', 'clarissa.rochefort', 'clarissa.rochefort@gmail.com'),
('PG-000003', 'Budi Santoso', 'IP-000008', '2025-09-21', '6285743444546', 'budi.santoso', 'budi.santoso@jimail.com'),
('PG-000004', 'Siti Rahmawati', 'IP-000009', '2025-09-21', '6285743444547', 'siti.rahmawati', 'siti.rahmawati@jimail.com'),
('PG-000005', 'Andi Pratama', 'IP-000008', '2025-09-21', '6285743444548', 'andi.pratama', 'andi.pratama@jimail.com'),
('PG-000006', 'Rina Kartika', 'IP-000009', '2025-09-21', '6285743444549', 'rina.kartika', 'rina.kartika@jimail.com'),
('PG-000007', 'Agus Setiawan', 'IP-000008', '2025-09-21', '6285743444550', 'agus.setiawan', 'agus.setiawan@jimail.com'),
('PG-000008', 'Dewi Lestari', 'IP-000009', '2025-09-21', '6285743444551', 'dewi.lestari', 'dewi.lestari@jimail.com'),
('PG-000009', 'Hendra Wijaya', 'IP-000008', '2025-09-21', '6285743444552', 'hendra.wijaya', 'hendra.wijaya@jimail.com'),
('PG-000010', 'Nur Aisyah', 'IP-000009', '2025-09-21', '6285743444553', 'nur.aisyah', 'nur.aisyah@jimail.com'),
('PG-000011', 'Rahmat Hidayat', 'IP-000008', '2025-09-21', '6285743444554', 'rahmat.hidayat', 'rahmat.hidayat@jimail.com'),
('PG-000012', 'Mega Fitri', 'IP-000009', '2025-09-21', '6285743444555', 'mega.fitri', 'mega.fitri@jimail.com'),
('PG-000013', 'Joko Susanto', 'IP-000008', '2025-09-21', '6285743444556', 'joko.susanto', 'joko.susanto@jimail.com'),
('PG-000014', 'Indah Lestari', 'IP-000009', '2025-09-21', '6285743444557', 'indah.lestari', 'indah.lestari@jimail.com'),
('PG-000015', 'Fajar Sihombing', 'IP-000008', '2025-09-21', '6285743444558', 'fajar.sihombing', 'fajar.sihombing@jimail.com'),
('PG-000016', 'Lina Marlina', 'IP-000009', '2025-09-21', '6285743444559', 'lina.marlina', 'lina.marlina@jimail.com'),
('PG-000017', 'Dian Saputra', 'IP-000008', '2025-09-21', '6285743444560', 'dian.saputra', 'dian.saputra@jimail.com'),
('PG-000018', 'Maya Sari', 'IP-000009', '2025-09-21', '6285743444561', 'maya.sari', 'maya.sari@jimail.com'),
('PG-000019', 'Arif Budiman', 'IP-000008', '2025-09-21', '6285743444562', 'arif.budiman', 'arif.budiman@jimail.com'),
('PG-000020', 'Desi Ratnasari', 'IP-000009', '2025-09-21', '6285743444563', 'desi.ratnasari', 'desi.ratnasari@jimail.com'),
('PG-000021', 'Slamet Riyadi', 'IP-000008', '2025-09-21', '6285743444564', 'slamet.riyadi', 'slamet.riyadi@jimail.com'),
('PG-000022', 'Yuli Astuti', 'IP-000009', '2025-09-21', '6285743444565', 'yuli.astuti', 'yuli.astuti@jimail.com'),
('PG-000023', 'Bayu Saputra', 'IP-000008', '2025-09-21', '6285743444566', 'bayu.saputra', 'bayu.saputra@jimail.com'),
('PG-000024', 'Citra Dewi', 'IP-000009', '2025-09-21', '6285743444567', 'citra.dewi', 'citra.dewi@jimail.com'),
('PG-000025', 'Gilang Ramadhan', 'IP-000008', '2025-09-21', '6285743444568', 'gilang.ramadhan', 'gilang.ramadhan@jimail.com'),
('PG-000026', 'Melati Kusuma', 'IP-000009', '2025-09-21', '6285743444569', 'melati.kusuma', 'melati.kusuma@jimail.com'),
('PG-000027', 'Anwar Sadat', 'IP-000008', '2025-09-21', '6285743444570', 'anwar.sadat', 'anwar.sadat@jimail.com'),
('PG-000028', 'Sari Dewi', 'IP-000009', '2025-09-21', '6285743444571', 'sari.dewi', 'sari.dewi@jimail.com'),
('PG-000029', 'Hafiz Rahman', 'IP-000008', '2025-09-21', '6285743444572', 'hafiz.rahman', 'hafiz.rahman@jimail.com'),
('PG-000030', 'Kartika Sari', 'IP-000009', '2025-09-21', '6285743444573', 'kartika.sari', 'kartika.sari@jimail.com'),
('PG-000031', 'Syahrul Gunawan', 'IP-000008', '2025-09-21', '6285743444574', 'syahrul.gunawan', 'syahrul.gunawan@jimail.com'),
('PG-000032', 'Laila Amalia', 'IP-000009', '2025-09-21', '6285743444575', 'laila.amalia', 'laila.amalia@jimail.com');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `kontak` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_user`, `nama_siswa`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `tanggal_daftar`, `username`, `email`, `foto`, `kontak`) VALUES
('SI-000001', 'U-000003', 'Andi Pratama', 'Jl. Merdeka No. 10, Jakarta', 'Jakarta', '2005-01-15', '2025-09-21', 'andi.pratama', 'andi.pratama@imel.com', NULL, '6281234567890'),
('SI-000002', 'U-000004', 'Siti Nurhaliza', 'Jl. Mawar No. 5, Bandung', 'Bandung', '2004-03-22', '2023-07-11', 'siti.nurhaliza', 'siti.nurhaliza@imel.com', NULL, ''),
('SI-000003', 'U-000005', 'Budi Santoso', 'Jl. Melati No. 8, Surabaya', 'Surabaya', '2006-07-11', '2023-07-12', 'budi.santoso', 'budi.santoso@imel.com', NULL, ''),
('SI-000004', 'U-000006', 'Dewi Lestari', 'Jl. Kenanga No. 12, Yogyakarta', 'Yogyakarta', '2005-09-30', '2023-07-13', 'dewi.lestari', 'dewi.lestari@imel.com', NULL, ''),
('SI-000005', 'U-000007', 'Agus Setiawan', 'Jl. Anggrek No. 3, Semarang', 'Semarang', '2004-12-05', '2023-07-14', 'agus.setiawan', 'agus.setiawan@imel.com', NULL, ''),
('SI-000006', 'U-000008', 'Rina Kartika', 'Jl. Dahlia No. 6, Medan', 'Medan', '2005-06-18', '2023-07-15', 'rina.kartika', 'rina.kartika@imel.com', NULL, ''),
('SI-000007', 'U-000009', 'Fajar Nugroho', 'Jl. Flamboyan No. 9, Makassar', 'Makassar', '2006-02-25', '2023-07-16', 'fajar.nugroho', 'fajar.nugroho@imel.com', NULL, ''),
('SI-000008', 'U-000010', 'Lina Marlina', 'Jl. Cempaka No. 2, Bogor', 'Bogor', '2004-11-09', '2023-07-17', 'lina.marlina', 'lina.marlina@imel.com', NULL, ''),
('SI-000009', 'U-000011', 'Hendra Wijaya', 'Jl. Bougenville No. 14, Palembang', 'Palembang', '2005-04-13', '2023-07-18', 'hendra.wijaya', 'hendra.wijaya@imel.com', NULL, ''),
('SI-000010', 'U-000012', 'Nur Aisyah', 'Jl. Teratai No. 7, Malang', 'Malang', '2006-08-21', '2023-07-19', 'nur.aisyah', 'nur.aisyah@imel.com', NULL, ''),
('SI-000011', 'U-000013', 'Dian Saputra', 'Jl. Mangga No. 15, Jakarta', 'Jakarta', '2005-05-12', '2023-07-20', 'dian.saputra', 'dian.saputra@imel.com', NULL, ''),
('SI-000012', 'U-000014', 'Maya Sari', 'Jl. Jeruk No. 20, Bandung', 'Bandung', '2004-07-21', '2023-07-21', 'maya.sari', 'maya.sari@imel.com', NULL, ''),
('SI-000013', 'U-000015', 'Eko Prasetyo', 'Jl. Apel No. 8, Surabaya', 'Surabaya', '2006-03-19', '2023-07-22', 'eko.prasetyo', 'eko.prasetyo@imel.com', NULL, ''),
('SI-000014', 'U-000016', 'Putri Ayu', 'Jl. Pisang No. 25, Yogyakarta', 'Yogyakarta', '2005-09-08', '2023-07-23', 'putri.ayu', 'putri.ayu@imel.com', NULL, ''),
('SI-000015', 'U-000017', 'Joko Susanto', 'Jl. Durian No. 5, Semarang', 'Semarang', '2004-01-28', '2023-07-24', 'joko.susanto', 'joko.susanto@imel.com', NULL, ''),
('SI-000016', 'U-000018', 'Ayu Puspita', 'Jl. Nangka No. 18, Medan', 'Medan', '2005-02-14', '2023-07-25', 'ayu.puspita', 'ayu.puspita@imel.com', NULL, ''),
('SI-000017', 'U-000019', 'Rahmat Hidayat', 'Jl. Salak No. 6, Makassar', 'Makassar', '2006-10-10', '2023-07-26', 'rahmat.hidayat', 'rahmat.hidayat@imel.com', NULL, ''),
('SI-000018', 'U-000020', 'Mega Fitri', 'Jl. Rambutan No. 3, Bogor', 'Bogor', '2004-05-29', '2025-10-02', 'mega.fitri', 'mega.fitri@jimel.com', NULL, '081234567654'),
('SI-000019', 'U-000021', 'Tono Supriadi', 'Jl. Sawo No. 9, Palembang', 'Palembang', '2005-08-05', '2023-07-28', 'tono.supriadi', 'tono.supriadi@imel.com', NULL, ''),
('SI-000020', 'U-000022', 'Indah Lestari', 'Jl. Pepaya No. 7, Malang', 'Malang', '2006-06-17', '2023-07-29', 'indah.lestari', 'indah.lestari@imel.com', NULL, ''),
('SI-000021', 'U-000023', 'Rizky Maulana', 'Jl. Mawar No. 21, Jakarta', 'Jakarta', '2005-11-23', '2023-07-30', 'rizky.maulana', 'rizky.maulana@imel.com', NULL, ''),
('SI-000022', 'U-000024', 'Sulastri', 'Jl. Melati No. 11, Bandung', 'Bandung', '2004-02-11', '2023-07-31', 'sulastri', 'sulastri@imel.com', NULL, ''),
('SI-000023', 'U-000025', 'Arif Budiman', 'Jl. Kenanga No. 17, Surabaya', 'Surabaya', '2006-01-07', '2023-08-01', 'arif.budiman', 'arif.budiman@imel.com', NULL, ''),
('SI-000024', 'U-000026', 'Desi Ratnasari', 'Jl. Dahlia No. 30, Yogyakarta', 'Yogyakarta', '2005-04-04', '2023-08-02', 'desi.ratnasari', 'desi.ratnasari@imel.com', NULL, ''),
('SI-000025', 'U-000027', 'Slamet Riyadi', 'Jl. Anggrek No. 14, Semarang', 'Semarang', '2004-06-30', '2023-08-03', 'slamet.riyadi', 'slamet.riyadi@imel.com', NULL, ''),
('SI-000026', 'U-000028', 'Yuli Astuti', 'Jl. Flamboyan No. 8, Medan', 'Medan', '2005-03-20', '2023-08-04', 'yuli.astuti', 'yuli.astuti@imel.com', NULL, ''),
('SI-000027', 'U-000029', 'Bayu Saputra', 'Jl. Bougenville No. 16, Makassar', 'Makassar', '2006-12-01', '2023-08-05', 'bayu.saputra', 'bayu.saputra@imel.com', NULL, ''),
('SI-000028', 'U-000030', 'Citra Dewi', 'Jl. Teratai No. 4, Bogor', 'Bogor', '2004-08-09', '2023-08-06', 'citra.dewi', 'citra.dewi@imel.com', NULL, ''),
('SI-000029', 'U-000031', 'Gilang Ramadhan', 'Jl. Cendana No. 22, Palembang', 'Palembang', '2005-10-18', '2023-08-07', 'gilang.ramadhan', 'gilang.ramadhan@imel.com', NULL, ''),
('SI-000030', 'U-000032', 'Melati Kusuma', 'Jl. Angsana No. 12, Malang', 'Malang', '2006-09-25', '2023-08-08', 'melati.kusuma', 'melati.kusuma@imel.com', NULL, ''),
('SI-000031', 'U-000033', 'Anwar Sadat', 'Jl. Mawar No. 33, Jakarta', 'Jakarta', '2005-02-03', '2023-08-09', 'anwar.sadat', 'anwar.sadat@imel.com', NULL, ''),
('SI-000032', 'U-000034', 'Sari Dewi', 'Jl. Melati No. 19, Bandung', 'Bandung', '2004-03-12', '2023-08-10', 'sari.dewi', 'sari.dewi@imel.com', NULL, ''),
('SI-000033', 'U-000035', 'Hafiz Rahman', 'Jl. Kenanga No. 8, Surabaya', 'Surabaya', '2006-05-15', '2023-08-11', 'hafiz.rahman', 'hafiz.rahman@imel.com', NULL, ''),
('SI-000034', 'U-000036', 'Kartika Sari', 'Jl. Dahlia No. 21, Yogyakarta', 'Yogyakarta', '2005-07-19', '2023-08-12', 'kartika.sari', 'kartika.sari@imel.com', NULL, ''),
('SI-000035', 'U-000037', 'Syahrul Gunawan', 'Jl. Anggrek No. 17, Semarang', 'Semarang', '2004-11-28', '2023-08-13', 'syahrul.gunawan', 'syahrul.gunawan@imel.com', NULL, ''),
('SI-000036', 'U-000038', 'Laila Amalia', 'Jl. Flamboyan No. 5, Medan', 'Medan', '2005-01-09', '2023-08-14', 'laila.amalia', 'laila.amalia@imel.com', NULL, ''),
('SI-000037', 'U-000039', 'Yusuf Kurniawan', 'Jl. Bougenville No. 13, Makassar', 'Makassar', '2006-02-22', '2023-08-15', 'yusuf.kurniawan', 'yusuf.kurniawan@imel.com', NULL, ''),
('SI-000038', 'U-000040', 'Nadia Safitri', 'Jl. Teratai No. 15, Bogor', 'Bogor', '2004-09-02', '2023-08-16', 'nadia.safitri', 'nadia.safitri@imel.com', NULL, ''),
('SI-000039', 'U-000041', 'Rudi Hartono', 'Jl. Cendana No. 10, Palembang', 'Palembang', '2005-12-27', '2023-08-17', 'rudi.hartono', 'rudi.hartono@imel.com', NULL, ''),
('SI-000040', 'U-000042', 'Fitri Handayani', 'Jl. Angsana No. 9, Malang', 'Malang', '2006-06-06', '2023-08-18', 'fitri.handayani', 'fitri.handayani@imel.com', NULL, ''),
('SI-000041', 'U-000043', 'Darmawan Putra', 'Jl. Mawar No. 40, Jakarta', 'Jakarta', '2005-09-14', '2023-08-19', 'darmawan.putra', 'darmawan.putra@imel.com', NULL, ''),
('SI-000042', 'U-000044', 'Sri Wahyuni', 'Jl. Melati No. 25, Bandung', 'Bandung', '2004-10-07', '2023-08-20', 'sri.wahyuni', 'sri.wahyuni@imel.com', NULL, ''),
('SI-000043', 'U-000045', 'Fahmi Anwar', 'Jl. Kenanga No. 31, Surabaya', 'Surabaya', '2006-04-01', '2023-08-21', 'fahmi.anwar', 'fahmi.anwar@imel.com', NULL, ''),
('SI-000044', 'U-000046', 'Tari Puspa', 'Jl. Dahlia No. 28, Yogyakarta', 'Yogyakarta', '2005-08-12', '2023-08-22', 'tari.puspa', 'tari.puspa@imel.com', NULL, ''),
('SI-000045', 'U-000047', 'Imam Santoso', 'Jl. Anggrek No. 29, Semarang', 'Semarang', '2004-05-19', '2023-08-23', 'imam.santoso', 'imam.santoso@imel.com', NULL, ''),
('SI-000046', 'U-000048', 'Mila Anggraini', 'Jl. Flamboyan No. 11, Medan', 'Medan', '2005-03-25', '2023-08-24', 'mila.anggraini', 'mila.anggraini@imel.com', NULL, ''),
('SI-000047', 'U-000049', 'Adit Prakoso', 'Jl. Bougenville No. 20, Makassar', 'Makassar', '2006-07-30', '2023-08-25', 'adit.prakoso', 'adit.prakoso@imel.com', NULL, ''),
('SI-000048', 'U-000050', 'Vina Permata', 'Jl. Teratai No. 18, Bogor', 'Bogor', '2004-01-16', '2023-08-26', 'vina.permata', 'vina.permata@imel.com', NULL, ''),
('SI-000049', 'U-000051', 'Rangga Saputra', 'Jl. Cendana No. 7, Palembang', 'Palembang', '2005-10-03', '2023-08-27', 'rangga.saputra', 'rangga.saputra@imel.com', NULL, ''),
('SI-000050', 'U-000052', 'Clara Putri', 'Jl. Angsana No. 15, Malang', 'Malang', '2006-11-11', '2023-08-28', 'clara.putri', 'clara.putri@imel.com', NULL, ''),
('SI-000051', 'U-000053', 'Taufik Hidayat', 'Jalan Bima 6 No. 77', 'Semarang', '2002-07-23', '2025-10-02', 'taufik.hidayat', 'taufikhidayat.bzz@gmail.com', NULL, '085745687890'),
('SI-000052', 'U-000054', 'Jonathan Joestar', 'Jalan Pegangsaan Selatan No. 41', 'London', '1990-06-21', '2025-10-02', 'jonathan.joestar', 'jojomantab@gmail.com', NULL, '085632415625'),
('SI-000053', 'U-000055', 'Jotaro Kujo', 'Jalan Pegangsaan Utara No. 14', 'Kyoto', '2000-07-18', '2025-10-03', 'jotaro.kujo', 'jotarokujodis@gmail.com', NULL, '085741425356'),
('SI-000054', 'U-000056', 'Pejantan Tangguh', 'Jalan Jantan Banget', 'Kyoto', '2025-10-03', '2025-10-03', 'pejantan.tangguh', 'pejantantangguh@gmail.com', 'siswa_SI-000054.jpg', '085697456321'),
('SI-000055', 'U-000057', 'pak.kentin', '', '', '0000-00-00', '2025-10-03', 'pak.kentin', '123@jimel.com', NULL, ''),
('SI-000056', 'U-000058', 'Hayu Aruf', 'Jalan Bima I No. 44', 'Zurich', '1999-06-29', '2025-10-03', 'hayu.aruf', 'hayuaruf@gmail.com', 'siswa_SI-000056.png', '087897654123'),
('SI-000057', '1', 'demo', 'Alamat Saya', 'Tempat Lahir Saya', '2025-10-04', '2025-10-04', 'demo', 'demo@app.com', '', ''),
('SI-000058', 'U-000059', 'Taufik Hidayat', 'Jalan Kebanggaan Kita No. 1', 'Jakarta', '1995-07-19', '2025-10-04', 'taufikhidayat', 'taauufiik@gmail.com', 'siswa_SI-000058.png', '085749365487');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_ta` varchar(10) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `periode` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_ta`, `tahun`, `periode`) VALUES
('TA-0001', '2020', '1'),
('TA-0002', '2020', '2'),
('TA-0003', '2021', '1'),
('TA-0004', '2021', '2'),
('TA-0005', '2022', '1'),
('TA-0006', '2022', '2'),
('TA-0007', '2023', '1'),
('TA-0008', '2023', '2'),
('TA-0009', '2024', '1'),
('TA-0010', '2024', '2'),
('TA-0011', '2025', '1'),
('TA-0012', '2025', '2'),
('TA-0013', '2019', '1'),
('TA-0014', '2019', '2'),
('TA-0015', '2018', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` enum('admin','siswa') NOT NULL DEFAULT 'siswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password_hash`, `auth_key`, `access_token`, `email`, `role`) VALUES
('1', 'demo', '$2y$13$/lD9cPnNrSeiURo8H0xqmePsqFuguSQWVr/gqR.e0EHrrD6G6BXDy', 'testkey123', 'token123', NULL, 'siswa'),
('100', 'admin', '$2y$13$eB/8DtWm3hyU9sLBkCtvKec8pWGRpS/JGGX5ynsvpcJri8wL4PW3O', 'test100key', '100-token', NULL, 'admin'),
('U-000001', 'administrator', '$2y$13$QzzQa0cbc5G.fyAHDYP9zur5pNGTyjt9tHHeR22sH5r/eXup.d5B.', 'xb6MygEDUM3GoyeXAoDpvKPPPl3Wwa-4', NULL, 'admin@mantab.com', 'admin'),
('U-000003', 'andi.pratama', '$2y$13$LvwS2wTIGrwjz6Vv4adhX.7M1miZtx65v9S8yj5ApkIaQZ9/zCCaK', '3LH7V6pRjm33uWbvtnazuVC5tW-Mg02d', NULL, 'andi.pratama@email.com', 'siswa'),
('U-000004', 'siti.nurhaliza', '$2y$13$PkXtFLckTFeUHLd7KH.ybOMNWXS.uuUkzwEZiblJJMGOTod5vxPgq', 'igvbCA7ydU-qUw2bOQ6A7hVIEMdAfpmJ', NULL, 'siti.nurhaliza@email.com', 'siswa'),
('U-000005', 'budi.santoso', '$2y$13$Z.du544k0jLIaARjp8/6xujcr7ZhsnqUfJmlOP46aIKShx1HyNY0S', 'maxeCEv5ZYvxazYcqnDgWeWI7fhL7Fse', NULL, 'budi.santoso@imel.com', 'siswa'),
('U-000006', 'dewi.lestari', '$2y$13$Fc8cJ1IOBE9oZz0i7Hgkle2p2vSRHsneykzJaZFP2dGF8Mc4teHcW', 'W6m2vfuk-82B1A7sIVEEUCQBzf8q95af', NULL, 'dewi.lestari@imel.com', 'siswa'),
('U-000007', 'agus.setiawan', '$2y$13$79.uu9s5VYVX.CESI6acn.Xj1tpAh5OElmkvQyzOufFQFO0ZSFNe2', 'lZzqu-dSYdg080WLvDHIkzOgPecPwA3D', NULL, 'agus.setiawan@imel.com', 'siswa'),
('U-000008', 'rina.kartika', '$2y$13$RRIh77/NyvLhmFwvKjKf6ePVL72e.hJ2HZaMzsiR5kdA9UVwOLsOq', 'IEzrxpt6RHzdaWnJIX0tQNImNlJmFy5W', NULL, 'rina.kartika@imel.com', 'siswa'),
('U-000009', 'fajar.nugroho', '$2y$13$odTGEb49id8tK6r.e1acXeCcunUEe/IPXTmgXtM89uc0pOF3fSGeW', 'kxWk5qGNmAv4DXrO3SjxI1PtBmW9sLbN', NULL, 'fajar.nugroho@imel.com', 'siswa'),
('U-000010', 'lina.marlina', '$2y$13$k2d/zXaEAjrP1vPGF5.8Ze2qH9pWyyQIvm0igSpeQfl60jy4wc7TC', 'nwy7cBCdSW9wbra9_m9Vo0a9n3kwNREz', NULL, 'lina.marlina@imel.com', 'siswa'),
('U-000011', 'hendra.wijaya', '$2y$13$yR9Y3GJWcavgoWE.tQTKK.o2t1rsUw.PUhJTrSxD/uyD/raSREUNW', 'NVchwCoFRL3C2K396im8xA1WzSO06cGr', NULL, 'hendra.wijaya@imel.com', 'siswa'),
('U-000012', 'nur.aisyah', '$2y$13$FJTbqBP3XwG2dZG4iZjPLek7MTZR4IA3LpVD/k2soX8yqIjM3vHLK', 'bWKEQz2J5VvIaDt7NSUWtgd2yLAA0hn6', NULL, 'nur.aisyah@imel.com', 'siswa'),
('U-000013', 'dian.saputra', '$2y$13$c0NjWABO6QhnK.C8CvbVOecQIG9UHIkW2kmN2ovTUBoQV5sPcBlaG', 'gIUB5RQF3-YYQmS9b15LiBz87xdnbkCh', NULL, 'dian.saputra@imel.com', 'siswa'),
('U-000014', 'maya.sari', '$2y$13$c9zjolUGcg1Py3iTUqOTIufnIcsLmsxPS6Nin33LTxR5Vf5lrx1Qi', 'dgT0Bjrz6IjVeR9yEz-ki1iBH4Ge3GAA', NULL, 'maya.sari@imel.com', 'siswa'),
('U-000015', 'eko.prasetyo', '$2y$13$.HaTvTIXlmEJgRdrJfq9VeluGnORr2V9cpaykLJ2rTuHVBeTmCIvy', 'yWt8AY-H6lZ2fxrMBDi3lWX-8PMWI72g', NULL, 'eko.prasetyo@imel.com', 'siswa'),
('U-000016', 'putri.ayu', '$2y$13$SnU3zcLgw6TrrqmdFV1aQ.PurKle/TBtKrMII25X7O72wSeI.uMvS', 'iUHjksoCBlIvqKVm4NqPA4mCLTBE9ULb', NULL, 'putri.ayu@imel.com', 'siswa'),
('U-000017', 'joko.susanto', '$2y$13$ElD/.sBGQRwT/3Qi7xsn1OASwrxJRETYdij.Y0/MLccUvh1mGUpaC', 'UDt1xu4yoAscNhkk70Mnei75EOBx6jm6', NULL, 'joko.susanto@imel.com', 'siswa'),
('U-000018', 'ayu.puspita', '$2y$13$2JNSguYfo/90X4l1Y.YpiOf0b/QkHjj3nEs2NMtjnp7FzEDNwU8fC', 'nLUCxqVlHNIiIpg5V8FutvUANibUTJPf', NULL, 'ayu.puspita@imel.com', 'siswa'),
('U-000019', 'rahmat.hidayat', '$2y$13$Q.zSujuAVaTrFttjjx9x1uAwnZWkRakMTb47VWW3YMNlinU4n1o9W', 'dUGSPSIG64r6DrYYyItTGeOtg7GlyGQh', NULL, 'rahmat.hidayat@imel.com', 'siswa'),
('U-000020', 'mega.fitri', '$2y$13$.XJJru0OO4QD/STdrzTmEuOllx1GIcKaXwGGoHkzR6yqlgF4DCIvy', '86_QraP4HGhjEO_a1rTBaou7jvbUGBej', NULL, 'mega.fitri@jimel.com', 'siswa'),
('U-000021', 'tono.supriadi', '$2y$13$iWek/H553k.mXcEM8.hGXeQ6XrTRYemZDOwfxDERP2wvFmM4Vc2ui', 'czIacR8KvZutzE82U-8bKRpwapJ5ea6Q', NULL, 'tono.supriadi@imel.com', 'siswa'),
('U-000022', 'indah.lestari', '$2y$13$JHDns01F5k2nNPF75QFOuusxIcaT/a3IXAJnAYEmDSV7iw9/1RfTa', 'rFAHSTJd3bSwAUJlfIFP6H6cJCRBqinK', NULL, 'indah.lestari@imel.com', 'siswa'),
('U-000023', 'rizky.maulana', '$2y$13$nY7LFcfGNb/6gngX05mc1OiUW0VRHzNtbMCwiX2bZw1WmXmnLqMFi', 't8LmzWphIBLKOhLUzXcEkaqayaTYXykA', NULL, 'rizky.maulana@imel.com', 'siswa'),
('U-000024', 'sulastri', '$2y$13$sMJ3h/ZLByNXtAfIYyJIi.opbw5Jfnj6RX6tNbKBmpEUDsz5K57bC', 'bC97NNzycoeus-URw50QBa-1cCTTXlcU', NULL, 'sulastri@imel.com', 'siswa'),
('U-000025', 'arif.budiman', '$2y$13$hXSG5MIL7LQAy.Xu/4A8RuvMwfNGFuLciwEZNNcVxRwDjhVk0r4Vu', '55q0w-eA4iDvP_oQTMAfAoDDyajlJheU', NULL, 'arif.budiman@imel.com', 'siswa'),
('U-000026', 'desi.ratnasari', '$2y$13$aPH.QPcBGTFU620eKOqUz.ekWy.dq8/Kl46jPkW06mlb3fIp3yKdS', 'ZWqQF-Prt5slA6S9sxdelUktyB1GxMsk', NULL, 'desi.ratnasari@imel.com', 'siswa'),
('U-000027', 'slamet.riyadi', '$2y$13$BnJ.bPHiAL5kW2Fj2f2QZOmTPaGt7wu.vmEuFlA.FKs55O0jYKrDK', 'T8fOgUbnYpUjjTPOTGtY8mru4vtpSPlN', NULL, 'slamet.riyadi@imel.com', 'siswa'),
('U-000028', 'yuli.astuti', '$2y$13$cInQXHgqa62hJG4xNPithOrxeOu9HF.JntGDeshnLtzcOGMSOi/cS', 'KVpJcOoAkQuEj1_l4Bnu57J8DXuz1G0C', NULL, 'yuli.astuti@imel.com', 'siswa'),
('U-000029', 'bayu.saputra', '$2y$13$x.5lhD.dhlW5bGWSneQZsO0XedrXXSi5TqtqldNaaR6tZbjvjj/3q', '7QMZoIoQJpXc9IjHHB7eo9xspXhdobyZ', NULL, 'bayu.saputra@imel.com', 'siswa'),
('U-000030', 'citra.dewi', '$2y$13$xXqEcr7Dxy15GCL73XIMf.nS06H.mkZaF5fR82wnZWdZ0mIkDJaIq', 'YXLabw_KlEVSUhYFWo55JER1c90Jd6uE', NULL, 'citra.dewi@imel.com', 'siswa'),
('U-000031', 'gilang.ramadhan', '$2y$13$ATs4h6ePvAsopaqBvwBxaeGEpP/MGhQlX9LKdOnP51/5wWoB5d/vi', '7LZplGApt0t3V_xwvrKhvm2_vzYReSyL', NULL, 'gilang.ramadhan@imel.com', 'siswa'),
('U-000032', 'melati.kusuma', '$2y$13$RrIXWMXXBPlndojHN8SVH.ZHCxaMkYMjHj7lloFswLJ3Hr6fTrYKG', '2h2gAamgGejzY3A5nHE-02f4JCVCO-YV', NULL, 'melati.kusuma@imel.com', 'siswa'),
('U-000033', 'anwar.sadat', '$2y$13$OAx5hLPJlEU1z7MlRZYLZ.oVFCPsOk8vCM2VQCgU6W.aAHcjDqOXa', 'wAXSkk_wRRE3DBGzt4k-T8QKUWRMhTJ4', NULL, 'anwar.sadat@imel.com', 'siswa'),
('U-000034', 'sari.dewi', '$2y$13$UqVGHQfqdGK35sgqMn9WWuUjkjFVsbIt.LNA6b68p1pZr4ZwHQKuK', 'DFrdPKYzfR1X63uCcc7frb_l6uk230Fo', NULL, 'sari.dewi@imel.com', 'siswa'),
('U-000035', 'hafiz.rahman', '$2y$13$s/cslL26P56saRLnZiNJTewsfKAYV7vNFdoHAENrns8IpLIqtG5D2', 'ZYQgjwTpn7bhdrxmaVJ6YaJ2v8VaTZ84', NULL, 'hafiz.rahman@imel.com', 'siswa'),
('U-000036', 'kartika.sari', '$2y$13$rJXKMCbhm2/7k5VuEFYfHOUoJuy4WfuwTCERo.4bcDUx6ZE2TwYra', 'eZj5o5lGTqu0P68Hf-7osAZB7v8hKkXi', NULL, 'kartika.sari@imel.com', 'siswa'),
('U-000037', 'syahrul.gunawan', '$2y$13$CKRMOR2BXmO.5h7IYd2n4ePc30VRalFecAYNFCMVCEDLhpcGMzXIy', 'pAWFABZFzzC-9RsIBPzQtsQVgdRuMDfm', NULL, 'syahrul.gunawan@imel.com', 'siswa'),
('U-000038', 'laila.amalia', '$2y$13$RS9zDKU34rzTcXYfHieVXOxtTTZ1C7dDPsEDywIqVqhEWRL.r80jq', '0c0YeiGAytN0Y3ujpi-VjP5qUof6uDjy', NULL, 'laila.amalia@imel.com', 'siswa'),
('U-000039', 'yusuf.kurniawan', '$2y$13$BLfCbrNeg4gQh0oYDVgg3OURay7Gd9AG/7phhtetbcftOpdgWU492', 'yDEO4usGDZOMt1XyCYDB4wmwUN553f7-', NULL, 'yusuf.kurniawan@imel.com', 'siswa'),
('U-000040', 'nadia.safitri', '$2y$13$JqNKuBawxRXynNtukQdeL.yQ7Pg8v.TXeWCRUSa6B5THkwCRZ0N7y', 'hZs_jyimvxDc0wM2PCiSImR_Q5_khulm', NULL, 'nadia.safitri@imel.com', 'siswa'),
('U-000041', 'rudi.hartono', '$2y$13$UincaVI4LatJJGCt1wfOmevvIF/SyRqZhWIldkwQkKayjPZ.OctGa', 'cJD-8Gv3bkERTejX94HtFbFTQei0bjkU', NULL, 'rudi.hartono@imel.com', 'siswa'),
('U-000042', 'fitri.handayani', '$2y$13$qZ4cTZfUGAkZej.HxwFWd.FN2XYaS7lHrTHdqK/KeIWjtI/VbztAu', 'nZEgomhhm2Y8yVywiE1eiIJgee2WUyGY', NULL, 'fitri.handayani@imel.com', 'siswa'),
('U-000043', 'darmawan.putra', '$2y$13$C6NwqejQUOeYWKi21vRdpO8syT5V.Z829kVDf/47Duf.uxmLu6Hzy', 'RFtbulaunbL3OWHmEaVk7gqi_PBWRxfy', NULL, 'darmawan.putra@imel.com', 'siswa'),
('U-000044', 'sri.wahyuni', '$2y$13$djmhAD/ACRKEedeibDtkqur2yAln1WGTcEVuOCGHE.0ptWlcNKPDS', 'lBdp6WWqVUVF0XfMpOSSZZ-gldlj26uU', NULL, 'sri.wahyuni@imel.com', 'siswa'),
('U-000045', 'fahmi.anwar', '$2y$13$X17nPdHg3BvoxVMeo6Nt/utYlkHWlnHRG5Z/AcLIDz7pWcrAJaj1q', 'enUrMhzi_zLR8dGwTk-V9WV8SXC_NEHD', NULL, 'fahmi.anwar@imel.com', 'siswa'),
('U-000046', 'tari.puspa', '$2y$13$VSjrEYQxoYDOEJAWcEybHeyd1GLsH.oPAOoubZLsCQUwlfSLXDeDO', 'qTcgZNwl-rXvDDv6iRoF8AIMZpEQ4szD', NULL, 'tari.puspa@imel.com', 'siswa'),
('U-000047', 'imam.santoso', '$2y$13$kZGolwpCiobzD26mpoQYhOvN7.UzNjHjGiFXI9gjhq5XfstZZG9TC', 'my09b4ukyalxKPtPEin8qRq3tCN65Iao', NULL, 'imam.santoso@imel.com', 'siswa'),
('U-000048', 'mila.anggraini', '$2y$13$vUS5nGIIHeSOh/6jSEYl8O8K6F9m0zXusR7F2FHLj7xvcCnDcIUSG', 'SvFsR5WnB-sMxMTvab2Nox0cKHATLIfM', NULL, 'mila.anggraini@imel.com', 'siswa'),
('U-000049', 'adit.prakoso', '$2y$13$ybTIfasSidMGedzTRKJb0uxfy6QNZIhIKkzzJEEZi66eu7PUUzQCy', 'J_gCII3pHHjTzEljpNIeMoIssodXKLbJ', NULL, 'adit.prakoso@imel.com', 'siswa'),
('U-000050', 'vina.permata', '$2y$13$DfvG.1AlC/JQ.NwQADpJpuJPKN9R2w.Kcyel5eemIE3YxIkkPoxKS', 'EGlfIFkWYARKaoLgmWgfj2ufL6YkIP2v', NULL, 'vina.permata@imel.com', 'siswa'),
('U-000051', 'rangga.saputra', '$2y$13$/3jRzN0yEsEs3emwzTAAvO/bRC.wEqOWUyWyh/poovEZq7qTt7J9a', 'GwSXvKodM58xF5RC-cWEYkfYSOnwZlNq', NULL, 'rangga.saputra@imel.com', 'siswa'),
('U-000052', 'clara.putri', '$2y$13$z9oPVCG83p8BTmetpuiGLuuZDn7b8HAjnKJndD28rdgwOZL6qYQne', '4iID6KKQVqhbyLjUHYiR5G4u1gohG9PF', NULL, 'clara.putri@imel.com', 'siswa'),
('U-000053', 'taufik.hidayat', '$2y$13$GYcpYVOyEBbIflIWiIxjtugo8SP9qR2uyQhagbQT7QSOomMwJQMOy', 'aIZ0BReJbttsEii_7AAFONYgWlXolHH4', NULL, 'taufikhidayat.bzz@gmail.com', 'siswa'),
('U-000054', 'jonathan.joestar', '$2y$13$zeGACWXi7Fb6ULvAN26QSe9wYvUn6IOJeKZ3Dh/UqpoBYPqLemMUG', 'itFuOKgcma2guFKI2RvkAcBixwgSHYVM', NULL, 'jojo@jimail.com', 'siswa'),
('U-000055', 'jotaro.kujo', '$2y$13$cK4MhNCpBrrIKw8qE/8DaOT56SJNbjA2t3Y/ASIagPJGcuZ8GOn0C', 'W1fXITewFATME3PCGpBqb_GpLS8TXdzq', NULL, 'jotarokujodis@gmail.com', 'siswa'),
('U-000056', 'pejantan.tangguh', '$2y$13$.zks/koCAJssnKTJ.02wsODGbOWH38O.jJb8j5pkFZiCxLoeCCf3S', '7uljB1su9JqEBZ-ensVRhfii8JJOduWv', NULL, 'pejantantangguh@gmail.com', 'siswa'),
('U-000057', 'pak.kentin', '$2y$13$mz/ERXvqLf5WnHkHM9zMO.w5rlA6aw7kupzHuF4CBaDT8gG4YugdC', 'Z6yqfjmZzoN2XzFNfQ91udjSpwspWWLv', NULL, '123@jimel.com', 'siswa'),
('U-000058', 'hayu.aruf', '$2y$13$Jazinyazs2i9FOgBQmPZ4uxb9QfWpGTJ5ooa.2mWh7WJO98gxU/JW', 'UV9koIkXgKikBHUee62BH2Xt549pD0dF', NULL, 'hayuaruf@gmail.com', 'siswa'),
('U-000059', 'taufikhidayat', '$2y$13$YthnUIKgpvKu.baP8nCHS.sB3pizcFxTqxdjA0uzCuWjWeBbtul.S', 'JrGaZ4crhBFdNkZ8_DbUwbQ37Wj1mbuh', NULL, 'taauufiik@gmail.com', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `order_kelas`
--
ALTER TABLE `order_kelas`
  ADD PRIMARY KEY (`id_trx`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD KEY `username` (`username`),
  ADD KEY `fk_siswa_user` (`id_user`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_siswa_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
