-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 28 Feb 2020 pada 15.32
-- Versi server: 10.3.22-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jqbwases_jasima`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_imam`
--

CREATE TABLE `jadwal_imam` (
  `jadwalimam_id` int(11) NOT NULL,
  `jadwalimam_hari` varchar(255) DEFAULT NULL,
  `jadwalimam_subuh` int(11) DEFAULT NULL,
  `jadwalimam_dzuhur` int(11) DEFAULT NULL,
  `jadwalimam_ashar` int(11) DEFAULT NULL,
  `jadwalimam_maghrib` int(11) DEFAULT NULL,
  `jadwalimam_isya` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `jadwal_imam`
--

INSERT INTO `jadwal_imam` (`jadwalimam_id`, `jadwalimam_hari`, `jadwalimam_subuh`, `jadwalimam_dzuhur`, `jadwalimam_ashar`, `jadwalimam_maghrib`, `jadwalimam_isya`) VALUES
(1, 'minggu', 2, 2, 2, 2, 2),
(2, 'senin', 2, 2, 2, 2, 2),
(3, 'selasa', 2, 2, 2, 2, 2),
(4, 'rabu', 2, 2, 2, 2, 2),
(5, 'kamis', 2, 2, 2, 2, 2),
(6, 'jumat', 2, 2, 2, 2, 2),
(7, 'sabtu', 2, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_kajian`
--

CREATE TABLE `jadwal_kajian` (
  `kajian_id` int(11) NOT NULL,
  `kajian_userid` int(11) DEFAULT NULL,
  `kajian_materi` varchar(255) DEFAULT NULL,
  `kajian_tanggal` date DEFAULT NULL,
  `kajian_waktu` varchar(255) DEFAULT NULL,
  `kajian_isdelete` enum('0','1') DEFAULT '0',
  `kajian_createdate` datetime DEFAULT NULL,
  `kajian_lastupdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `jadwal_kajian`
--

INSERT INTO `jadwal_kajian` (`kajian_id`, `kajian_userid`, `kajian_materi`, `kajian_tanggal`, `kajian_waktu`, `kajian_isdelete`, `kajian_createdate`, `kajian_lastupdate`) VALUES
(1, 2, 'Adab Menuntut Ilmu', '2019-10-07', 'Ba\'da Maghrib - Selesai', '0', '2019-03-06 08:04:03', '2019-10-01 10:26:47'),
(2, 2, 'Menjauhi Sikap Sombong', '2019-10-09', 'Ba\'da Maghib - Selesai', '0', '2019-03-06 08:05:21', '2019-10-01 10:27:05'),
(3, 2, 'Bedah Kitab Tauhid', '2019-10-12', 'Ba\'da Maghrib - Selesai', '0', '2019-03-06 13:25:34', '2019-10-01 10:27:42'),
(4, 2, 'Penuntut Ilmu Harus Rendah Hati', '2019-10-16', '18:30 - 19:10', '0', '2019-03-06 13:29:06', '2019-10-01 10:28:04'),
(5, 2, 'Mengenal Dakwah Ahlussunah Wal Jamaah', '2019-10-20', '08:30 - 11:15', '0', '2019-03-06 13:29:54', '2019-10-01 10:28:29'),
(6, 2, 'Adab Menuntut Ilmu (Lanjutan)', '2019-10-22', 'Ba\'da Maghrib - Selesai', '0', '2019-03-06 13:30:20', '2019-10-01 10:28:43'),
(7, 2, 'Pembahasan Kitab Fiqih', '2019-10-26', 'Ba\'da Maghrib - Selesai', '0', '2019-03-06 13:30:47', '2019-10-01 10:29:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konten`
--

CREATE TABLE `konten` (
  `konten_id` int(11) NOT NULL,
  `konten_posisi` enum('1','2') DEFAULT NULL,
  `konten_arab` text DEFAULT NULL,
  `konten_teks` text DEFAULT NULL,
  `konten_masa_tayang` enum('0','1') DEFAULT '0',
  `konten_tglmulai` datetime DEFAULT NULL,
  `konten_tglselesai` datetime DEFAULT NULL,
  `konten_interval` tinyint(11) DEFAULT NULL,
  `konten_status` enum('0','1') DEFAULT '1',
  `konten_isdelete` enum('0','1') DEFAULT '0',
  `konten_createby` int(11) DEFAULT NULL,
  `konten_editedby` int(11) DEFAULT NULL,
  `konten_createdate` datetime DEFAULT NULL,
  `konten_lastupdate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `konten`
--

INSERT INTO `konten` (`konten_id`, `konten_posisi`, `konten_arab`, `konten_teks`, `konten_masa_tayang`, `konten_tglmulai`, `konten_tglselesai`, `konten_interval`, `konten_status`, `konten_isdelete`, `konten_createby`, `konten_editedby`, `konten_createdate`, `konten_lastupdate`) VALUES
(1, '1', NULL, '“Sebaik-baik manusia adalah yang paling bermanfaat bagi manusia.” (HR. Ahmad).', '0', NULL, NULL, 10, '1', '0', 1, 2, '2018-11-27 07:32:37', '2019-09-30 02:16:59'),
(2, '1', NULL, '\"Dan mohonlah pertolongan (kepada Allah) dengan sabar dan sholat. Dan (sholat) itu sungguh berat kecuali bagi orang-orang yang khusyuk,\"\n(QS. Al-Baqarah 2: Ayat 45)', '0', NULL, NULL, 10, '1', '0', 1, 1, '2018-11-27 07:32:37', '2018-12-10 06:45:23'),
(3, '2', NULL, 'Source Code Jadwal Sholat Menggunakan PHP by :\'XbX Team\'', '0', NULL, NULL, NULL, '1', '0', 1, 2, '2018-11-22 10:10:34', '2019-10-11 07:52:26'),
(4, '1', 'بِسْمِ اللَّهِ الرَّحْمٰنِ الرَّحِيمِ', 'Awali setiap aktivitas dengan Basmalah', '0', NULL, NULL, NULL, '1', '0', 1, 1, '2018-11-22 10:06:07', '2018-12-10 06:43:49'),
(5, '2', NULL, 'Jumlah Infaq bulan November pekan ke-2 sebesar Rpxxx.xxx, Jazaakumullahu Khairan', '0', NULL, NULL, NULL, '0', '0', 1, NULL, '2018-11-22 10:08:30', '2018-11-28 07:16:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_user`
--

CREATE TABLE `master_user` (
  `user_id` int(11) NOT NULL,
  `user_foto` varchar(255) DEFAULT NULL,
  `user_uid` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_nama` varchar(255) DEFAULT NULL,
  `user_jk` enum('L','P') DEFAULT NULL,
  `user_level` enum('1','2','3','4') DEFAULT '4',
  `user_isdelete` enum('0','1') DEFAULT '0',
  `user_createdate` datetime DEFAULT NULL,
  `user_lastupdate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `master_user`
--

INSERT INTO `master_user` (`user_id`, `user_foto`, `user_uid`, `user_password`, `user_nama`, `user_jk`, `user_level`, `user_isdelete`, `user_createdate`, `user_lastupdate`) VALUES
(1, NULL, 'system', 'cd14821dab219ea06e2fd1a2df2e3582', 'XbX Team', 'L', '1', '0', '2018-11-22 16:38:29', '2019-11-19 00:50:17'),
(2, NULL, '1801', 'cd14821dab219ea06e2fd1a2df2e3582', 'Ust. Gus', 'L', '2', '0', '2018-12-12 16:22:21', '2019-10-11 07:41:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas_shalat_jumat`
--

CREATE TABLE `petugas_shalat_jumat` (
  `petugasshalatjumat_id` int(11) NOT NULL,
  `petugasshalatjumat_tanggal` date DEFAULT NULL,
  `petugasshalatjumat_khatib` int(11) DEFAULT NULL,
  `petugasshalatjumat_imam` int(11) DEFAULT NULL,
  `petugasshalatjumat_muadzin_1` int(11) DEFAULT NULL,
  `petugasshalatjumat_muadzin_2` int(11) DEFAULT NULL,
  `petugasshalatjumat_isdelete` enum('0','1') DEFAULT '0',
  `petugasshalatjumat_createby` int(11) DEFAULT NULL,
  `petugasshalatjumat_createdate` datetime DEFAULT NULL,
  `petugasshalatjumat_lastupdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `petugas_shalat_jumat`
--

INSERT INTO `petugas_shalat_jumat` (`petugasshalatjumat_id`, `petugasshalatjumat_tanggal`, `petugasshalatjumat_khatib`, `petugasshalatjumat_imam`, `petugasshalatjumat_muadzin_1`, `petugasshalatjumat_muadzin_2`, `petugasshalatjumat_isdelete`, `petugasshalatjumat_createby`, `petugasshalatjumat_createdate`, `petugasshalatjumat_lastupdate`) VALUES
(1, '2019-10-25', 2, 2, 2, 2, '0', 2, '2019-03-05 20:57:57', '2019-10-03 11:03:46'),
(2, '2019-10-18', 2, 2, 2, 2, '0', NULL, '2019-03-06 18:47:45', '2019-10-01 10:25:43'),
(7, '2019-10-04', 2, 2, 2, 2, '0', 2, '2019-09-29 11:33:43', '2019-10-01 10:24:51'),
(8, '2019-10-11', 2, 2, 2, 2, '0', 2, '2019-09-29 11:34:45', '2019-10-01 10:25:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_background`
--

CREATE TABLE `set_background` (
  `background_id` int(11) NOT NULL,
  `background_tipe` enum('picture','video') DEFAULT NULL,
  `background_file` text DEFAULT NULL,
  `background_createby` int(11) DEFAULT NULL,
  `background_status` enum('0','1') DEFAULT '1',
  `background_isdelete` enum('0','1') DEFAULT '0',
  `background_createdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `set_background`
--

INSERT INTO `set_background` (`background_id`, `background_tipe`, `background_file`, `background_createby`, `background_status`, `background_isdelete`, `background_createdate`) VALUES
(1, 'video', '1.mp4', 1, '0', '0', '2018-12-12 10:29:12'),
(2, 'picture', 'macos-catalina-cb-1280x800.jpg', 2, '0', '1', '2019-10-01 21:59:59'),
(3, 'picture', 'Material-design-background-514054880_2126x1416.jpg', 2, '0', '0', '2019-10-01 22:00:24'),
(4, 'picture', 'f954ec4554769ef1e46da46d1e5255ff.jpg', 2, '0', '0', '2019-10-01 22:00:35'),
(5, 'picture', '394563_PCGX8G_338__1570025961_98335.jpg', 2, '0', '1', '2019-10-02 21:21:36'),
(6, 'picture', '5788__1570026299_71858.jpg', 2, '1', '1', '2019-10-02 21:25:14'),
(7, 'video', '2.mp4', 2, '1', '0', '2019-10-02 21:53:18'),
(8, 'video', '3.mp4', 2, '0', '0', '2019-10-02 21:53:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_font`
--

CREATE TABLE `set_font` (
  `font_id` int(11) NOT NULL,
  `font_src` varchar(255) DEFAULT NULL,
  `font_nama` varchar(255) DEFAULT NULL,
  `font_family` varchar(255) DEFAULT NULL,
  `font_style` varchar(255) DEFAULT NULL,
  `font_weight` double DEFAULT NULL,
  `font_status` enum('0','1') DEFAULT '1',
  `font_isdelete` enum('0','1') DEFAULT '0',
  `font_createdate` datetime DEFAULT NULL,
  `font_lastupdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `set_font`
--

INSERT INTO `set_font` (`font_id`, `font_src`, `font_nama`, `font_family`, `font_style`, `font_weight`, `font_status`, `font_isdelete`, `font_createdate`, `font_lastupdate`) VALUES
(2, 'Product_Sans_Bold.ttf', 'Product Sans Bold.ttf', 'Products Sans', 'Bold', 400, '0', '1', '2019-03-06 22:27:19', '2019-03-06 23:10:33'),
(3, 'ShadowsIntoLight.ttf', 'ShadowsIntoLight.ttf', 'Shadows Into Light', 'Bold', 400, '0', '0', '2019-03-06 22:48:22', '2019-03-06 23:10:44'),
(5, NULL, 'Ubuntu', 'Ubuntu', 'Bold', 400, '1', '0', '2019-03-07 05:58:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_general`
--

CREATE TABLE `set_general` (
  `general_id` int(11) NOT NULL,
  `general_nama` varchar(255) DEFAULT NULL,
  `general_status` enum('0','1') DEFAULT '0',
  `general_keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `set_general`
--

INSERT INTO `set_general` (`general_id`, `general_nama`, `general_status`, `general_keterangan`) VALUES
(1, 'Background', '1', 'Mengaktifkan jenis background, Foto atau Video'),
(2, 'Black Screen', '0', 'Menjadikan layar TV Gelap'),
(3, 'Reload Page', '0', 'Segarkan halaman jadwal shalat, agar data dapat dimuat ulang'),
(4, 'Restart', '0', 'Mulai ulang komputer'),
(5, 'Shut Down', '0', 'Matikan komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_masjid`
--

CREATE TABLE `set_masjid` (
  `masjid_id` int(11) NOT NULL,
  `masjid_licence` varchar(255) DEFAULT NULL,
  `masjid_nama` varchar(255) DEFAULT NULL,
  `masjid_alamat` text DEFAULT NULL,
  `masjid_updateby` int(11) DEFAULT NULL,
  `masjid_createdate` datetime DEFAULT NULL,
  `masjid_lastupdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `set_masjid`
--

INSERT INTO `set_masjid` (`masjid_id`, `masjid_licence`, `masjid_nama`, `masjid_alamat`, `masjid_updateby`, `masjid_createdate`, `masjid_lastupdate`) VALUES
(1, '{\"e\":\"UmVraEt0TmFKYnI2TzJFYmE4alNFRmsrNm9LcEZYY1prLzJYdUxtUkFkcz0=\",\"s\":\"MS9jK04wNStxRUpaZTV4K2IwblRMMTBtY1RpRktNZjE=\"}', 'XBX-TEAM', 'PONDOK LABU', 1, '2018-11-22 09:15:08', '2018-11-22 09:15:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_perhitungan_waktu_shalat`
--

CREATE TABLE `set_perhitungan_waktu_shalat` (
  `waktushalat_id` int(11) NOT NULL,
  `waktushalat_timezone_set` varchar(255) DEFAULT 'Asia/Jakarta',
  `waktushalat_latitude` varchar(255) DEFAULT NULL,
  `waktushalat_longitude` varchar(255) DEFAULT NULL,
  `waktushalat_ketinggian_laut` varchar(255) DEFAULT NULL,
  `waktushalat_sudut_fajar_senja` varchar(255) DEFAULT NULL,
  `waktushalat_sudut_malam_senja` varchar(255) DEFAULT NULL,
  `waktushalat_time_zone` int(11) DEFAULT NULL,
  `waktushalat_mazhab` enum('1','2') DEFAULT NULL,
  `waktushalat_updateby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `set_perhitungan_waktu_shalat`
--

INSERT INTO `set_perhitungan_waktu_shalat` (`waktushalat_id`, `waktushalat_timezone_set`, `waktushalat_latitude`, `waktushalat_longitude`, `waktushalat_ketinggian_laut`, `waktushalat_sudut_fajar_senja`, `waktushalat_sudut_malam_senja`, `waktushalat_time_zone`, `waktushalat_mazhab`, `waktushalat_updateby`) VALUES
(1, 'Asia/Jakarta', '1.44758', '109.2383', '0', '19.5', '18.5', 7, '1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_perwaktu_shalat`
--

CREATE TABLE `set_perwaktu_shalat` (
  `perwaktushalat_id` int(11) NOT NULL,
  `perwaktushalat_nama` varchar(255) DEFAULT NULL,
  `perwaktushalat_jeda_iqomah` int(11) DEFAULT NULL COMMENT 'menit',
  `perwaktushalat_jeda_layar_mati` int(11) DEFAULT NULL,
  `perwaktushalat_penyesuaian` varchar(255) DEFAULT NULL,
  `perwaktushalat_konten` text DEFAULT NULL COMMENT 'konten setelah adzan (array json)',
  `perwaktushalat_kontenid` int(11) DEFAULT NULL COMMENT 'konten setelah adzan (ambil dari konten)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `set_perwaktu_shalat`
--

INSERT INTO `set_perwaktu_shalat` (`perwaktushalat_id`, `perwaktushalat_nama`, `perwaktushalat_jeda_iqomah`, `perwaktushalat_jeda_layar_mati`, `perwaktushalat_penyesuaian`, `perwaktushalat_konten`, `perwaktushalat_kontenid`) VALUES
(1, 'Subuh', 8, 10, '0', NULL, NULL),
(2, 'Dzuhur', 10, 1, '0', NULL, NULL),
(3, 'Ashar', 8, 10, '0', NULL, NULL),
(4, 'Maghrib', 8, 2, '0', NULL, NULL),
(5, 'Isya', 8, 10, '0', NULL, NULL),
(6, 'Jumat', NULL, 30, '0', NULL, NULL),
(7, 'Terbit', NULL, NULL, '0', NULL, NULL),
(8, 'Hijriah', NULL, NULL, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `set_reload`
--

CREATE TABLE `set_reload` (
  `reload_id` int(11) NOT NULL,
  `reload_status` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `set_reload`
--

INSERT INTO `set_reload` (`reload_id`, `reload_status`) VALUES
(1, '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal_imam`
--
ALTER TABLE `jadwal_imam`
  ADD PRIMARY KEY (`jadwalimam_id`) USING BTREE;

--
-- Indeks untuk tabel `jadwal_kajian`
--
ALTER TABLE `jadwal_kajian`
  ADD PRIMARY KEY (`kajian_id`) USING BTREE;

--
-- Indeks untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`konten_id`) USING BTREE;

--
-- Indeks untuk tabel `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`user_id`) USING BTREE;

--
-- Indeks untuk tabel `petugas_shalat_jumat`
--
ALTER TABLE `petugas_shalat_jumat`
  ADD PRIMARY KEY (`petugasshalatjumat_id`) USING BTREE;

--
-- Indeks untuk tabel `set_background`
--
ALTER TABLE `set_background`
  ADD PRIMARY KEY (`background_id`) USING BTREE;

--
-- Indeks untuk tabel `set_font`
--
ALTER TABLE `set_font`
  ADD PRIMARY KEY (`font_id`) USING BTREE;

--
-- Indeks untuk tabel `set_general`
--
ALTER TABLE `set_general`
  ADD PRIMARY KEY (`general_id`) USING BTREE;

--
-- Indeks untuk tabel `set_masjid`
--
ALTER TABLE `set_masjid`
  ADD PRIMARY KEY (`masjid_id`) USING BTREE;

--
-- Indeks untuk tabel `set_perhitungan_waktu_shalat`
--
ALTER TABLE `set_perhitungan_waktu_shalat`
  ADD PRIMARY KEY (`waktushalat_id`) USING BTREE;

--
-- Indeks untuk tabel `set_perwaktu_shalat`
--
ALTER TABLE `set_perwaktu_shalat`
  ADD PRIMARY KEY (`perwaktushalat_id`) USING BTREE;

--
-- Indeks untuk tabel `set_reload`
--
ALTER TABLE `set_reload`
  ADD PRIMARY KEY (`reload_id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal_imam`
--
ALTER TABLE `jadwal_imam`
  MODIFY `jadwalimam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jadwal_kajian`
--
ALTER TABLE `jadwal_kajian`
  MODIFY `kajian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `konten`
--
ALTER TABLE `konten`
  MODIFY `konten_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `master_user`
--
ALTER TABLE `master_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `petugas_shalat_jumat`
--
ALTER TABLE `petugas_shalat_jumat`
  MODIFY `petugasshalatjumat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `set_background`
--
ALTER TABLE `set_background`
  MODIFY `background_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `set_font`
--
ALTER TABLE `set_font`
  MODIFY `font_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `set_general`
--
ALTER TABLE `set_general`
  MODIFY `general_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `set_masjid`
--
ALTER TABLE `set_masjid`
  MODIFY `masjid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `set_perhitungan_waktu_shalat`
--
ALTER TABLE `set_perhitungan_waktu_shalat`
  MODIFY `waktushalat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `set_perwaktu_shalat`
--
ALTER TABLE `set_perwaktu_shalat`
  MODIFY `perwaktushalat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `set_reload`
--
ALTER TABLE `set_reload`
  MODIFY `reload_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
