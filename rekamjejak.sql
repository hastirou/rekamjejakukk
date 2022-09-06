-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Mar 2022 pada 13.02
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekamjejak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `eventlogs`
--

CREATE TABLE `eventlogs` (
  `id` bigint(20) NOT NULL,
  `KodeUser` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` date NOT NULL,
  `Jam` time NOT NULL,
  `Keterangan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tipe` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `eventlogs`
--

INSERT INTO `eventlogs` (`id`, `KodeUser`, `Tanggal`, `Jam`, `Keterangan`, `Tipe`, `created_at`, `updated_at`) VALUES
(1, '1', '2021-09-25', '13:15:39', 'Tambah klasifikasi KLA-003', 'OPN', '2021-09-25 06:15:39', '2021-09-25 06:15:39'),
(2, '1', '2021-09-25', '13:16:04', 'Tambah klasifikasi KLA-004', 'OPN', '2021-09-25 06:16:04', '2021-09-25 06:16:04'),
(3, '1', '2021-09-25', '14:55:33', 'Tambah klasifikasi KLA-001', 'OPN', '2021-09-25 07:55:33', '2021-09-25 07:55:33'),
(4, '2', '2021-09-26', '08:59:36', 'Tambah klasifikasi KLA-001', 'OPN', '2021-09-26 01:59:36', '2021-09-26 01:59:36'),
(5, '2', '2021-09-26', '10:19:04', 'Tambah klasifikasi KLA-001', 'OPN', '2021-09-26 03:19:04', '2021-09-26 03:19:04'),
(6, '1', '2021-09-26', '16:10:06', 'Tambah klasifikasi KLA-001', 'OPN', '2021-09-26 09:10:06', '2021-09-26 09:10:06'),
(7, '1', '2021-09-26', '16:16:19', 'Tambah klasifikasi KLA-001', 'OPN', '2021-09-26 09:16:19', '2021-09-26 09:16:19'),
(8, '1', '2021-09-26', '16:32:28', 'Tambah klasifikasi KLA-002', 'OPN', '2021-09-26 09:32:28', '2021-09-26 09:32:28'),
(9, '1', '2021-09-26', '16:32:41', 'Tambah klasifikasi KLA-003', 'OPN', '2021-09-26 09:32:41', '2021-09-26 09:32:41'),
(10, '1', '2021-09-28', '11:40:36', 'Update klasifikasi KLA-001', 'OPN', '2021-09-28 04:40:36', '2021-09-28 04:40:36'),
(11, '1', '2021-09-28', '11:53:03', 'Update klasifikasi KLA-001', 'OPN', '2021-09-28 04:53:03', '2021-09-28 04:53:03'),
(12, '1', '2021-09-28', '14:26:43', 'Tambah klasifikasi KLA-003', 'OPN', '2021-09-28 07:26:43', '2021-09-28 07:26:43'),
(13, '1', '2021-09-28', '14:27:07', 'Update klasifikasi KLA-002', 'OPN', '2021-09-28 07:27:07', '2021-09-28 07:27:07'),
(14, '1', '2021-09-29', '05:31:22', 'Tambah klasifikasi KLA-003', 'OPN', '2021-09-28 22:31:22', '2021-09-28 22:31:22'),
(15, '1', '2021-09-29', '05:31:29', 'Update klasifikasi KLA-003', 'OPN', '2021-09-28 22:31:29', '2021-09-28 22:31:29'),
(16, '1', '2021-09-29', '05:31:36', 'Update klasifikasi KLA-002', 'OPN', '2021-09-28 22:31:36', '2021-09-28 22:31:36'),
(17, '1', '2021-09-29', '12:13:46', 'Tambah klasifikasi KLA-001', 'OPN', '2021-09-29 05:13:46', '2021-09-29 05:13:46'),
(18, '1', '2021-09-29', '12:18:50', 'Tambah kategori KAT-001', 'OPN', '2021-09-29 05:18:50', '2021-09-29 05:18:50'),
(19, '1', '2021-09-30', '06:37:51', 'Tambah kategori KAT-002', 'OPN', '2021-09-29 23:37:51', '2021-09-29 23:37:51'),
(20, '1', '2021-09-30', '11:14:55', 'Tambah klasifikasi KLA-001', 'OPN', '2021-09-30 04:14:55', '2021-09-30 04:14:55'),
(21, '1', '2021-09-30', '11:15:15', 'Tambah klasifikasi KLA-001', 'OPN', '2021-09-30 04:15:15', '2021-09-30 04:15:15'),
(22, '1', '2021-09-30', '11:15:24', 'Update klasifikasi KLA-001', 'OPN', '2021-09-30 04:15:24', '2021-09-30 04:15:24'),
(23, '1', '2021-09-30', '11:17:51', 'Tambah klasifikasi KLA-001', 'OPN', '2021-09-30 04:17:51', '2021-09-30 04:17:51'),
(24, '1', '2021-09-30', '11:18:35', 'Tambah klasifikasi KLA-001', 'OPN', '2021-09-30 04:18:35', '2021-09-30 04:18:35'),
(25, '1', '2021-09-30', '11:19:28', 'Tambah klasifikasi KLA-001', 'OPN', '2021-09-30 04:19:28', '2021-09-30 04:19:28'),
(26, '1', '2021-09-30', '11:19:36', 'Update klasifikasi KLA-001', 'OPN', '2021-09-30 04:19:36', '2021-09-30 04:19:36'),
(27, '1', '2021-09-30', '11:22:34', 'Tambah klasifikasi KLA-001', 'OPN', '2021-09-30 04:22:34', '2021-09-30 04:22:34'),
(28, '1', '2021-09-30', '11:22:42', 'Update klasifikasi KLA-001', 'OPN', '2021-09-30 04:22:42', '2021-09-30 04:22:42'),
(29, '1', '2021-09-30', '11:24:16', 'Tambah klasifikasi KLA-001', 'OPN', '2021-09-30 04:24:16', '2021-09-30 04:24:16'),
(30, '1', '2021-09-30', '11:26:10', 'Tambah klasifikasi KLA-002', 'OPN', '2021-09-30 04:26:10', '2021-09-30 04:26:10'),
(31, '1', '2021-09-30', '11:26:40', 'Update klasifikasi KLA-001', 'OPN', '2021-09-30 04:26:40', '2021-09-30 04:26:40'),
(32, '1', '2021-09-30', '11:31:20', 'Tambah klasifikasi KLA-001', 'OPN', '2021-09-30 04:31:20', '2021-09-30 04:31:20'),
(33, '1', '2021-09-30', '11:34:58', 'Tambah klasifikasi KLA-001', 'OPN', '2021-09-30 04:34:58', '2021-09-30 04:34:58'),
(34, '1', '2021-09-30', '11:35:17', 'Tambah kategori KAT-001', 'OPN', '2021-09-30 04:35:17', '2021-09-30 04:35:17'),
(35, '1', '2021-09-30', '11:35:44', 'Tambah klasifikasi KLA-001', 'OPN', '2021-09-30 04:35:44', '2021-09-30 04:35:44'),
(36, '1', '2021-09-30', '11:37:43', 'Tambah klasifikasi KLA-001', 'OPN', '2021-09-30 04:37:43', '2021-09-30 04:37:43'),
(37, '1', '2021-09-30', '11:37:57', 'Tambah klasifikasi KLA-001', 'OPN', '2021-09-30 04:37:57', '2021-09-30 04:37:57'),
(38, '1', '2021-09-30', '11:38:23', 'Tambah kategori KAT-001', 'OPN', '2021-09-30 04:38:23', '2021-09-30 04:38:23'),
(39, '1', '2021-09-30', '14:35:36', 'Tambah klasifikasi KLA-002', 'OPN', '2021-09-30 07:35:36', '2021-09-30 07:35:36'),
(40, '1', '2021-09-30', '14:38:52', 'Update kategori ', 'OPN', '2021-09-30 07:38:52', '2021-09-30 07:38:52'),
(41, '1', '2021-09-30', '15:35:46', 'Update kategori ', 'OPN', '2021-09-30 08:35:46', '2021-09-30 08:35:46'),
(42, '1', '2021-10-01', '01:16:03', 'Update kategori ', 'OPN', '2021-09-30 18:16:03', '2021-09-30 18:16:03'),
(43, '1', '2021-10-01', '01:16:41', 'Tambah klasifikasi KLA-002', 'OPN', '2021-09-30 18:16:41', '2021-09-30 18:16:41'),
(44, '1', '2021-10-01', '01:17:00', 'Update kategori ', 'OPN', '2021-09-30 18:17:00', '2021-09-30 18:17:00'),
(45, '1', '2021-10-01', '01:17:32', 'Update kategori ', 'OPN', '2021-09-30 18:17:32', '2021-09-30 18:17:32'),
(46, '1', '2021-10-01', '01:19:29', 'Tambah kategori KAT-001', 'OPN', '2021-09-30 18:19:29', '2021-09-30 18:19:29'),
(47, '1', '2021-10-01', '01:19:45', 'Tambah kategori KAT-001', 'OPN', '2021-09-30 18:19:45', '2021-09-30 18:19:45'),
(48, '1', '2021-10-01', '01:20:09', 'Update kategori ', 'OPN', '2021-09-30 18:20:09', '2021-09-30 18:20:09'),
(49, '1', '2021-10-01', '01:26:04', 'Tambah kategori KAT-002', 'OPN', '2021-09-30 18:26:04', '2021-09-30 18:26:04'),
(50, '1', '2021-10-01', '01:26:38', 'Tambah kategori KAT-003', 'OPN', '2021-09-30 18:26:38', '2021-09-30 18:26:38'),
(51, '1', '2021-10-01', '01:36:49', 'Update kategori ', 'OPN', '2021-09-30 18:36:49', '2021-09-30 18:36:49'),
(52, '1', '2021-10-01', '02:34:53', 'Update kategori ', 'OPN', '2021-09-30 19:34:53', '2021-09-30 19:34:53'),
(53, '1', '2021-10-01', '03:01:28', 'Tambah kategori KAT-002', 'OPN', '2021-09-30 20:01:28', '2021-09-30 20:01:28'),
(54, '1', '2022-03-15', '12:09:45', 'Hapus Data hapusDAT-001', 'OPN', '2022-03-15 05:09:45', '2022-03-15 05:09:45'),
(55, '1', '2022-03-15', '12:10:43', 'Hapus Data hapusDAT-001', 'OPN', '2022-03-15 05:10:43', '2022-03-15 05:10:43'),
(56, '1', '2022-03-15', '12:13:27', 'Hapus Data hapusDAT-001', 'OPN', '2022-03-15 05:13:27', '2022-03-15 05:13:27'),
(57, '1', '2022-03-15', '12:15:02', 'Hapus Data hapusDAT-001', 'OPN', '2022-03-15 05:15:02', '2022-03-15 05:15:02'),
(58, '1', '2022-03-15', '12:15:51', 'Hapus Data hapusDAT-001', 'OPN', '2022-03-15 05:15:51', '2022-03-15 05:15:51'),
(59, '1', '2022-03-15', '12:18:04', 'Hapus Data hapusDAT-001', 'OPN', '2022-03-15 05:18:04', '2022-03-15 05:18:04'),
(60, '1', '2022-03-15', '12:18:40', 'Hapus Data DAT-001', 'OPN', '2022-03-15 05:18:40', '2022-03-15 05:18:40'),
(61, '1', '2022-03-15', '13:18:25', 'Update data ', 'OPN', '2022-03-15 06:18:25', '2022-03-15 06:18:25'),
(62, '1', '2022-03-15', '13:19:04', 'Update data ', 'OPN', '2022-03-15 06:19:04', '2022-03-15 06:19:04'),
(63, '1', '2022-03-15', '13:20:36', 'Update data ', 'OPN', '2022-03-15 06:20:36', '2022-03-15 06:20:36'),
(64, '1', '2022-03-15', '13:27:38', 'Update data ', 'OPN', '2022-03-15 06:27:38', '2022-03-15 06:27:38'),
(65, '1', '2022-03-15', '13:30:10', 'Update data ', 'OPN', '2022-03-15 06:30:10', '2022-03-15 06:30:10'),
(66, '1', '2022-03-15', '13:36:15', 'Update data ', 'OPN', '2022-03-15 06:36:15', '2022-03-15 06:36:15'),
(67, '1', '2022-03-15', '13:38:28', 'Update data ', 'OPN', '2022-03-15 06:38:28', '2022-03-15 06:38:28'),
(68, '1', '2022-03-15', '13:40:46', 'Update data ', 'OPN', '2022-03-15 06:40:46', '2022-03-15 06:40:46'),
(69, '1', '2022-03-15', '13:41:48', 'Update data ', 'OPN', '2022-03-15 06:41:48', '2022-03-15 06:41:48'),
(70, '1', '2022-03-17', '07:48:57', 'Ubah data 5', 'OPN', '2022-03-17 00:48:57', '2022-03-17 00:48:57'),
(71, '1', '2022-03-17', '07:49:25', 'Ubah data 5', 'OPN', '2022-03-17 00:49:25', '2022-03-17 00:49:25'),
(72, '1', '2022-03-17', '07:49:42', 'Ubah data 5', 'OPN', '2022-03-17 00:49:42', '2022-03-17 00:49:42'),
(73, '1', '2022-03-17', '07:53:51', 'Hapus User 7', 'OPN', '2022-03-17 00:53:51', '2022-03-17 00:53:51'),
(74, '1', '2022-03-17', '08:24:14', 'Ubah data 6', 'OPN', '2022-03-17 01:24:14', '2022-03-17 01:24:14'),
(75, '1', '2022-03-17', '08:35:31', 'Ubah data 6', 'OPN', '2022-03-17 01:35:31', '2022-03-17 01:35:31'),
(76, '1', '2022-03-17', '08:36:50', 'Ubah data 5', 'OPN', '2022-03-17 01:36:50', '2022-03-17 01:36:50'),
(77, '1', '2022-03-18', '09:50:40', 'Hapus Data DAT-002', 'OPN', '2022-03-18 02:50:40', '2022-03-18 02:50:40'),
(78, '1', '2022-03-18', '10:12:16', 'Hapus Data User DAT-004', 'OPN', '2022-03-18 03:12:16', '2022-03-18 03:12:16'),
(79, '1', '2022-03-18', '10:28:52', 'Hapus Data User DAT-004', 'OPN', '2022-03-18 03:28:52', '2022-03-18 03:28:52'),
(80, '1', '2022-03-18', '10:30:00', 'Hapus Data User DAT-004', 'OPN', '2022-03-18 03:30:00', '2022-03-18 03:30:00'),
(81, '1', '2022-03-18', '10:30:06', 'Hapus Data User DAT-004', 'OPN', '2022-03-18 03:30:06', '2022-03-18 03:30:06'),
(82, '1', '2022-03-18', '10:30:15', 'Hapus Data User DAT-004', 'OPN', '2022-03-18 03:30:15', '2022-03-18 03:30:15'),
(83, '5', '2022-03-20', '07:32:09', 'Ubah Data User 5', 'OPN', '2022-03-20 00:32:09', '2022-03-20 00:32:09'),
(84, '1', '2022-03-20', '08:12:31', 'Ubah Data User 1', 'OPN', '2022-03-20 01:12:31', '2022-03-20 01:12:31'),
(85, '1', '2022-03-21', '07:18:16', 'Hapus Data DAT-002', 'OPN', '2022-03-21 00:18:16', '2022-03-21 00:18:16'),
(86, '1', '2022-03-21', '07:18:17', 'Hapus Data DAT-003', 'OPN', '2022-03-21 00:18:17', '2022-03-21 00:18:17'),
(87, '1', '2022-03-21', '07:18:21', 'Hapus Data DAT-004', 'OPN', '2022-03-21 00:18:21', '2022-03-21 00:18:21'),
(88, '1', '2022-03-24', '10:04:48', 'Hapus User 9', 'OPN', '2022-03-24 03:04:48', '2022-03-24 03:04:48'),
(89, '1', '2022-03-24', '10:05:21', 'Hapus User 8', 'OPN', '2022-03-24 03:05:21', '2022-03-24 03:05:21'),
(90, '1', '2022-03-25', '08:15:54', 'Hapus Data DAT-001', 'OPN', '2022-03-25 01:15:54', '2022-03-25 01:15:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekamjejaks`
--

CREATE TABLE `rekamjejaks` (
  `KodeData` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `KodeUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tanggal` date DEFAULT NULL,
  `Waktu` time DEFAULT NULL,
  `SuhuTubuh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaTempat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `JenisTempat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekamjejaks`
--

INSERT INTO `rekamjejaks` (`KodeData`, `KodeUser`, `Tanggal`, `Waktu`, `SuhuTubuh`, `Lokasi`, `NamaTempat`, `JenisTempat`, `Status`, `created_at`, `updated_at`) VALUES
('DAT-001', '1', '2022-03-25', '15:13:00', '30', 'jl.test', 'smknmc', 'sekolah', 'DEL', '2022-03-25 01:14:05', '2022-03-25 01:15:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) NOT NULL,
  `name` varchar(19) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'user'),
(2, 'pegawai'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'OPN',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roleid` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `Username`, `fullname`, `nik`, `password`, `status`, `remember_token`, `created_at`, `updated_at`, `roleid`) VALUES
(1, 'admin', 'cumaadmindoang', '223311', '$2y$10$ZH3mXYxsAalBOOrYagrbluTcVub41pGoRapN0QP4uwcky73vjuluu', 'OPN', NULL, '2022-03-20 01:12:31', '2022-03-24 02:58:52', 3),
(5, 'tiro', 'tirotiroo', '12345', '$2y$10$wllc/bjBNZdk3ESsvzDbN.ymGlHe2JoQWtU.GsNOYhwo9nkrUFc6G', 'OPN', NULL, '2022-03-20 00:32:09', '2022-03-20 00:32:09', 1),
(6, 'backend', 'backend', '001122', '$2y$10$y8PfeGrAuKQ5U3Jaum33q.dWg/GwkEsLQr.bqoahxbDX02p29mo5S', 'OPN', NULL, '2022-03-17 01:35:30', '2022-03-17 01:35:30', 2),
(8, 'userbiasa', 'biasauser', '112233', '$2y$10$Bi2HnVB4Z0hzL5GL/FtfGublcp/CYwoKZYC6uUohm70Btvj43JIlG', 'DEL', NULL, '2022-03-18 02:23:23', '2022-03-24 03:05:21', 1),
(9, 'user1', 'usersatu', '88773', '$2y$10$1Gn7YIQEhYy3fKTAAqbmK./zStoTGZmiBR/pk7Si4CGMRHQhPmTMy', 'DEL', NULL, '2022-03-20 05:01:06', '2022-03-24 03:04:48', 1),
(10, 'tirouser', 'tirouser', '523523', '$2y$10$FrSwO.q45EzhH26gpBb.vOUVOUm/iZgzr3UK7/ZrDNH8Pz3D.jJ3.', 'OPN', NULL, '2022-03-25 02:41:07', '2022-03-25 02:41:07', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `eventlogs`
--
ALTER TABLE `eventlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `rekamjejaks`
--
ALTER TABLE `rekamjejaks`
  ADD PRIMARY KEY (`KodeData`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `eventlogs`
--
ALTER TABLE `eventlogs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
