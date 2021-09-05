-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Sep 2021 pada 03.26
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendataan_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_keluhan_warga`
--

CREATE TABLE `data_keluhan_warga` (
  `id_keluhan` int(11) NOT NULL,
  `judul_keluhan` varchar(255) NOT NULL,
  `deskripsi_keluhan` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_keluhan_warga`
--

INSERT INTO `data_keluhan_warga` (`id_keluhan`, `judul_keluhan`, `deskripsi_keluhan`, `id_user`, `date_created`, `date_updated`) VALUES
(1, 'Keluhan Suara Berisik', 'Saya memiliki keluhan atas suara berisik yang dihasilkan oleh anak-anak yang sering nongkrong di pinggir jalan', 7, '2021-08-13', '2021-08-13'),
(2, 'Keluhan Jalan Banjir', 'Jalan gang dekat rumah saya selalu banjir, apakah bisa bantu proses untuk memperbaiki nya?', 8, '2021-08-14', '2021-08-14'),
(3, 'Data Sulit Didapatkan', 'Untuk saat ini data yang kami cari sulit untuk didapatkan, untuk itu perlu sistem yang bisa mengatasi kesulitan mengambil data', 10, '2021-08-19', '2021-08-19'),
(4, 'Sulitnya Mendapatkan Data untuk RT 07', 'Data RT 07 susah untuk di dapatkan karena petugas pemerintahan yang bersangkutan sulit untuk dihubungi.', 10, '2021-08-21', '2021-08-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_petugas`
--

CREATE TABLE `data_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_petugas`
--

INSERT INTO `data_petugas` (`id_petugas`, `nama_petugas`, `jabatan`, `id_user`, `date_created`, `date_updated`) VALUES
(1, 'Administrator', 'Administrator', 1, '2021-08-11', '2021-08-11'),
(2, 'Tisna Kelana', 'RW', 2, '2021-08-11', '2021-08-11'),
(3, 'Popi Puspawida', 'Kader', 10, '2021-08-19', '2021-08-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_training`
--

CREATE TABLE `data_training` (
  `id` int(11) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `status_kelayakan` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_training`
--

INSERT INTO `data_training` (`id`, `no_kk`, `status_kelayakan`, `id_user`, `date_created`, `date_updated`) VALUES
(1, '3204322111070110', 'Layak', 10, '2021-08-21', '2021-08-21'),
(2, '3204322910080009', 'Layak', 10, '2021-08-21', '2021-08-21'),
(3, '3204321912180024', 'Layak', 10, '2021-08-21', '2021-08-21'),
(4, '3204321702100043', 'Layak', 10, '2021-08-21', '2021-08-21'),
(5, '3204320411150024', 'Layak', 10, '2021-08-21', '2021-08-21'),
(6, '3204322012060026', 'Layak', 10, '2021-08-21', '2021-08-21'),
(7, '2304320204051729', 'Layak', 10, '2021-08-21', '2021-08-21'),
(8, '3204324603500001', 'Layak', 10, '2021-08-21', '2021-08-21'),
(9, '3204321406110090', 'Layak', 10, '2021-08-21', '2021-08-21'),
(10, '3204320204051672', 'Layak', 10, '2021-08-21', '2021-08-21'),
(11, '3204321711160026', 'Tidak Layak', 10, '2021-08-21', '2021-08-21'),
(12, '3204322502060188', 'Tidak Layak', 10, '2021-08-21', '2021-08-21'),
(13, '3204322110130020', 'Tidak Layak', 10, '2021-08-21', '2021-08-21'),
(14, '3204322711120162', 'Tidak Layak', 10, '2021-08-21', '2021-08-21'),
(15, '3204320104058149', 'Tidak Layak', 10, '2021-08-21', '2021-08-21'),
(16, '3204321210120038', 'Tidak Layak', 10, '2021-08-21', '2021-08-21'),
(17, '3204321802130012', 'Tidak Layak', 10, '2021-08-21', '2021-08-21'),
(18, '3207361812140002', 'Layak', 10, '2021-08-21', '2021-08-21'),
(19, '3204323103057784', 'Layak', 10, '2021-08-21', '2021-08-21'),
(20, '3204322607680003', 'Tidak Layak', 10, '2021-08-22', '2021-08-22'),
(21, '3204323010130021', 'Layak', 10, '2021-08-24', '2021-08-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_warga`
--

CREATE TABLE `data_warga` (
  `id_data_warga` int(11) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jenis_kelamin` char(2) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` int(11) NOT NULL,
  `status_perkawinan` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `warganegara` varchar(10) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `kondisi_pekerjaan` varchar(255) NOT NULL,
  `pekerjaan_utama` varchar(255) NOT NULL,
  `jamsostek` varchar(50) NOT NULL,
  `penghasilan` varchar(100) NOT NULL,
  `jamsoskes` varchar(50) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `status_keluarga` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_warga`
--

INSERT INTO `data_warga` (`id_data_warga`, `no_kk`, `nik`, `nama_lengkap`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `usia`, `status_perkawinan`, `agama`, `warganegara`, `pendidikan`, `kondisi_pekerjaan`, `pekerjaan_utama`, `jamsostek`, `penghasilan`, `jamsoskes`, `rt`, `status_keluarga`, `date_created`, `date_updated`, `id_user`, `id_petugas`) VALUES
(12, '3204322111070110', '3204320503470006', 'Yayat Sutaryat', 'L', 'Bandung', '1947-05-03', 74, 'Kawin', 'Islam', 'WNI', 'SMP dan Sederajat', 'Tidak Bekerja', 'Lainnya', 'Peserta', '0', 'Peserta', '4', 'Kepala Keluarga', '2021-08-19', '2021-08-19', 10, 0),
(13, '3204322111070110', '3204325508560012', 'O. Kurniati', 'P', 'Bandung', '1956-12-08', 65, 'Kawin', 'Islam', 'WNI', 'SMA dan Sederajat', 'Ibu Rumah Tangga', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '4', 'Istri', '2021-08-19', '2021-08-19', 10, 0),
(14, '3204322910080009', '3204326311720015', 'Kokom Komariah', 'P', 'Bandung', '1972-11-23', 49, 'Cerai Mati', 'Islam', 'WNI', 'SMP dan Sederajat', 'Bekerja', 'Lainnya', 'Peserta', '3200000', 'Peserta', '4', 'Kepala Keluarga', '2021-08-20', '2021-08-20', 0, 0),
(15, '3204322910080009', '3204322910080009', 'Gugum Gumilar', 'L', 'Bandung', '1996-03-10', 25, 'Belum Kawin', 'Islam', 'WNI', 'SMA dan Sederajat', 'Sedang Mencari Pekerjaan', 'Lainnya', 'Bukan Peserta', '0', 'Bukan Peserta', '4', 'Anak', '2021-08-20', '2021-08-20', 0, 0),
(16, '3204322910080009', '3204322203040010', 'Pebri Galih Permana', 'L', 'Bandung', '2006-03-22', 15, 'Belum Kawin', 'Islam', 'WNI', 'SD dan Sederajat', 'Bersekolah', 'Lainnya', 'Bukan Peserta', '0', 'Bukan Peserta', '4', 'Anak', '2021-08-20', '2021-08-20', 0, 0),
(17, '3204321912180024', '3204321501490002', 'Ondo', 'L', 'Bandung', '1949-01-15', 72, 'Cerai Mati', 'Islam', 'WNI', 'SD dan Sederajat', 'Tidak Bekerja', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '4', 'Kepala Keluarga', '2021-08-20', '2021-08-20', 10, 0),
(20, '3204321702100043', '3204320507500014', 'Apo Sujana', 'L', 'Bandung', '1950-07-05', 71, 'Kawin', 'Islam', 'WNI', 'SMP dan Sederajat', 'Tidak Bekerja', 'Lainnya', 'Bukan Peserta', '800000', 'Peserta', '4', 'Kepala Keluarga', '2021-08-21', '2021-08-21', 10, 0),
(21, '3204321702100043', '3204326003530008', 'Cucu Rodiah', 'L', 'Bandung', '1953-03-20', 68, 'Kawin', 'Islam', 'WNI', 'SMP dan Sederajat', 'Ibu Rumah Tangga', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '4', 'Istri', '2021-08-21', '2021-08-21', 10, 0),
(22, '3204320411150024', '3206302703910004', 'Dudi Supriadi', 'L', 'Tasikmalaya', '1991-03-27', 30, 'Kawin', 'Islam', 'WNI', 'SMP dan Sederajat', 'Sedang Mencari Pekerjaan', 'Lainnya', 'Bukan Peserta', '1000000', 'Bukan Peserta', '4', 'Kepala Keluarga', '2021-08-21', '2021-08-21', 10, 0),
(23, '3204320411150024', '3204326007930005', 'Tita Septiawati', 'P', 'Bandung', '1993-07-20', 28, 'Kawin', 'Islam', 'WNI', 'SMA dan Sederajat', 'Ibu Rumah Tangga', 'Lainnya', 'Bukan Peserta', '0', 'Bukan Peserta', '4', 'Istri', '2021-08-21', '2021-08-21', 10, 0),
(24, '3204320411150024', '3204324301140004', 'Nayra Vanesa Anjani', 'P', 'Bandung', '2014-01-03', 7, 'Belum Kawin', 'Islam', 'WNI', 'SD dan Sederajat', 'Bersekolah', 'Lainnya', 'Bukan Peserta', '0', 'Bukan Peserta', '4', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(25, '3204322012060026', '3204321512800017', 'Ato Saepudin', 'L', 'Bandung', '1980-12-15', 41, 'Kawin', 'Islam', 'WNI', 'SD dan Sederajat', 'Bekerja', 'Lainnya', 'Bukan Peserta', '1200000', 'Bukan Peserta', '4', 'Kepala Keluarga', '2021-08-21', '2021-08-21', 10, 0),
(26, '3204322012060026', '3204324809810015', 'Yati Suryati', 'P', 'Bandung', '1981-09-08', 40, 'Kawin', 'Islam', 'WNI', 'SD dan Sederajat', 'Bekerja', 'Lainnya', 'Bukan Peserta', '1000000', 'Bukan Peserta', '4', 'Istri', '2021-08-21', '2021-08-21', 10, 0),
(27, '3204322012060026', '3204326606110009', 'Sari Nur Padilah', 'P', 'Bandung', '2011-06-26', 10, 'Belum Kawin', 'Islam', 'WNI', 'Lainnya', 'Bersekolah', 'Lainnya', 'Bukan Peserta', '0', 'Bukan Peserta', '4', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(28, '2304320204051729', '3204322612430001', 'Suparman', 'L', 'Bandung', '1946-12-26', 75, 'Kawin', 'Islam', 'WNI', 'SD dan Sederajat', 'Tidak Bekerja', 'Lainnya', 'Bukan Peserta', '500000', 'Peserta', '4', 'Kepala Keluarga', '2021-08-21', '2021-08-21', 10, 0),
(29, '2304320204051729', '3204326004700016', 'Siti Sumiati', 'P', 'Bandung', '1970-04-20', 51, 'Kawin', 'Islam', 'WNI', 'SD dan Sederajat', 'Ibu Rumah Tangga', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '4', 'Istri', '2021-08-21', '2021-08-21', 10, 0),
(30, '2304320204051729', '3204322507020024', 'Kurnia Kuswandi P', 'L', 'Bandung', '2002-07-25', 19, 'Belum Kawin', 'Islam', 'WNI', 'SMP dan Sederajat', 'Sedang Mencari Pekerjaan', 'Lainnya', 'Bukan Peserta', '0', 'Bukan Peserta', '4', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(31, '3204324603500001', '3204324603500001', 'Titing', 'P', 'Bandung', '1950-03-06', 71, 'Cerai Mati', 'Islam', 'WNI', 'SD dan Sederajat', 'Tidak Bekerja', 'Lainnya', 'Bukan Peserta', '750000', 'Peserta', '4', 'Kepala Keluarga', '2021-08-21', '2021-08-21', 10, 0),
(32, '3204321406110090', '3204320101540205', 'Ade Adam', 'L', 'Bandung', '1954-01-01', 67, 'Kawin', 'Islam', 'WNI', 'SD dan Sederajat', 'Sedang Mencari Pekerjaan', 'Lainnya', 'Bukan Peserta', '750000', 'Peserta', '4', 'Kepala Keluarga', '2021-08-21', '2021-08-21', 10, 0),
(33, '3204321406110090', '3204324101550148', 'Rohana', 'P', 'Bandung', '1955-01-01', 66, 'Kawin', 'Islam', 'WNI', 'SD dan Sederajat', 'Ibu Rumah Tangga', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '4', 'Istri', '2021-08-21', '2021-08-21', 10, 0),
(34, '3204320204051672', '3204321508410001', 'Lili Suparli', 'L', 'Bandung', '1941-08-15', 80, 'Cerai Mati', 'Islam', 'WNI', 'SD dan Sederajat', 'Tidak Bekerja', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '4', 'Kepala Keluarga', '2021-08-21', '2021-08-21', 10, 0),
(35, '3204320204051672', '3204322809820003', 'Ari Ismail Saleh', 'L', 'Bandung', '1982-09-22', 39, 'Cerai Hidup', 'Islam', 'WNI', 'SMA dan Sederajat', 'Sedang Mencari Pekerjaan', 'Lainnya', 'Bukan Peserta', '0', 'Bukan Peserta', '4', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(36, '3204321711160026', '3204320509750007', 'Yayan Sopian', 'L', 'Bandung', '1975-09-05', 46, 'Kawin', 'Islam', 'WNI', 'SMA dan Sederajat', 'Bekerja', 'Lainnya', 'Peserta', '3500000', 'Peserta', '1', 'Kepala Keluarga', '2021-08-21', '2021-08-21', 10, 0),
(37, '3204321711160026', '3204324702830020', 'Ririn Royani', 'P', 'Tasikmalaya', '1983-02-07', 38, 'Kawin', 'Islam', 'WNI', 'SMP dan Sederajat', 'Ibu Rumah Tangga', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Istri', '2021-08-21', '2021-08-21', 10, 0),
(38, '3204321711160026', '3204326010030006', 'Dinda Octaviani Sofyan', 'P', 'Bandung', '2003-10-20', 18, 'Belum Kawin', 'Islam', 'WNI', 'Lainnya', 'Bersekolah', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(39, '3204321711160026', '3204321703110001', 'Razka Bayhaqi Sofyan', 'L', 'Bandung', '2011-03-17', 10, 'Belum Kawin', 'Islam', 'WNI', 'Lainnya', 'Bersekolah', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(40, '3204322502060188', '3204322109600006', 'H. Dude Satari', 'L', 'Bandung', '1960-09-21', 61, 'Kawin', 'Islam', 'WNI', 'Diploma 1-3', 'Tidak Bekerja', 'Pensiunan', 'Bukan Peserta', '3500000', 'Peserta', '1', 'Kepala Keluarga', '2021-08-21', '2021-08-21', 10, 0),
(41, '3204322502060188', '3204326303670010', 'Hj. Awang', 'P', 'Bandung', '1967-03-23', 54, 'Kawin', 'Islam', 'WNI', 'SMA dan Sederajat', 'Ibu Rumah Tangga', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Istri', '2021-08-21', '2021-08-21', 10, 0),
(42, '3204322502060188', '3204322101960008', 'Azmi Luqman', 'L', 'Bandung', '1996-01-21', 25, 'Belum Kawin', 'Islam', 'WNI', 'S1 dan Sederajat', 'Sedang Mencari Pekerjaan', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(43, '3204322502060188', '3204321111970010', 'Syahrul Firdaus', 'L', 'Bandung', '1997-11-11', 24, 'Belum Kawin', 'Islam', 'WNI', 'Lainnya', 'Bersekolah', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(44, '3204322110130020', '3204321101920002', 'Hanhan Burhanudin', 'L', 'Bandung', '1992-01-11', 29, 'Kawin', 'Islam', 'WNI', 'Diploma 1-3', 'Bekerja', 'Lainnya', 'Bukan Peserta', '4000000', 'Bukan Peserta', '1', 'Kepala Keluarga', '2021-08-21', '2021-08-21', 10, 0),
(45, '3204322110130020', '3204325205920002', 'Wiwin Diniyati', 'P', 'Bandung', '1992-05-12', 29, 'Kawin', 'Islam', 'WNI', 'SMA dan Sederajat', 'Ibu Rumah Tangga', 'Lainnya', 'Bukan Peserta', '0', 'Bukan Peserta', '1', 'Istri', '2021-08-21', '2021-08-21', 10, 0),
(46, '3204322110130020', '3204320510130003', 'Azka Almair Jamil', 'L', 'Bandung', '2013-10-05', 8, 'Belum Kawin', 'Islam', 'WNI', 'Lainnya', 'Bersekolah', 'Lainnya', 'Bukan Peserta', '0', 'Bukan Peserta', '1', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(47, '3204322110130020', '3204321111180006', 'Habibi Alsaki', 'L', 'Bandung', '2018-11-11', 3, 'Belum Kawin', 'Islam', 'WNI', 'Lainnya', 'Tidak Bekerja', 'Lainnya', 'Bukan Peserta', '0', 'Bukan Peserta', '1', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(48, '3204322711120162', '3204080603520002', 'Ade Ruspandi', 'L', 'Bandung', '1952-03-06', 69, 'Kawin', 'Islam', 'WNI', 'SMP dan Sederajat', 'Bekerja', 'Lainnya', 'Bukan Peserta', '2500000', 'Peserta', '1', 'Kepala Keluarga', '2021-08-21', '2021-08-21', 10, 0),
(49, '3204322711120162', '3204084505580008', 'Aisyah', 'P', 'Bandung', '1958-05-05', 63, 'Kawin', 'Islam', 'WNI', 'SMP dan Sederajat', 'Ibu Rumah Tangga', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Istri', '2021-08-21', '2021-08-21', 10, 0),
(50, '3204322711120162', '3204321411150006', 'Rezha Aulia Santana', 'L', 'Bandung', '2015-11-14', 6, 'Belum Kawin', 'Islam', 'WNI', 'Lainnya', 'Bersekolah', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(51, '3204322711120162', '3204327011090016', 'Merlin Nur Kumala', 'P', 'Bandung', '2009-11-30', 12, 'Belum Kawin', 'Islam', 'WNI', 'Lainnya', 'Bersekolah', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(52, '3204320104058149', '3204322707680007', 'Ayi Hidir Kosasih', 'L', 'Bandung', '1968-07-27', 53, 'Kawin', 'Islam', 'WNI', 'SMA dan Sederajat', 'Bekerja', 'Lainnya', 'Bukan Peserta', '3000000', 'Peserta', '1', 'Kepala Keluarga', '2021-08-21', '2021-08-21', 10, 0),
(53, '3204320104058149', '3204324107740210', 'Tiktik Atikah', 'P', 'Bandung', '1974-07-01', 47, 'Kawin', 'Islam', 'WNI', 'SMP dan Sederajat', 'Ibu Rumah Tangga', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Istri', '2021-08-21', '2021-08-21', 10, 0),
(54, '3204320104058149', '3204326811050002', 'Novianti Ashani', 'P', 'Bandung', '2005-11-26', 16, 'Belum Kawin', 'Islam', 'WNI', 'Lainnya', 'Bersekolah', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(55, '3204320104058149', '3204325507070013', 'Ria Amelia', 'P', 'Bandung', '2007-07-15', 14, 'Belum Kawin', 'Islam', 'WNI', 'Lainnya', 'Bersekolah', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(56, '3204321210120038', '3204321111770006', 'Deni Andriyanto', 'L', 'Bandung', '1977-11-11', 44, 'Kawin', 'Islam', 'WNI', 'SMA dan Sederajat', 'Bekerja', 'Lainnya', 'Peserta', '3500000', 'Peserta', '1', 'Kepala Keluarga', '2021-08-21', '2021-08-21', 10, 0),
(57, '3204321210120038', '3204325507770002', 'Yuli Yulianti', 'P', 'Bandung', '1977-07-15', 44, 'Kawin', 'Islam', 'WNI', 'SMA dan Sederajat', 'Ibu Rumah Tangga', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Istri', '2021-08-21', '2021-08-21', 10, 0),
(58, '3204321210120038', '3204325008010004', 'Agnes Fadilah Damayanti', 'P', 'Bandung', '2001-08-10', 20, 'Belum Kawin', 'Islam', 'WNI', 'Lainnya', 'Bersekolah', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(59, '3204321210120038', '3204325208080007', 'Anggia Nur Fatimah Damayanti', 'P', 'Bandung', '2008-08-12', 13, 'Belum Kawin', 'Islam', 'WNI', 'Lainnya', 'Bersekolah', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(60, '3204321802130012', '3204321602840004', 'Rudiyono', 'L', 'Brebes', '1984-02-16', 37, 'Kawin', 'Islam', 'WNI', 'SMA dan Sederajat', 'Bekerja', 'Lainnya', 'Bukan Peserta', '2000000', 'Peserta', '1', 'Kepala Keluarga', '2021-08-21', '2021-08-21', 10, 0),
(61, '3204321802130012', '3204324404800066', 'Dianingsih', 'P', 'Bandung', '1980-04-04', 41, 'Kawin', 'Islam', 'WNI', 'SMA dan Sederajat', 'Ibu Rumah Tangga', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Istri', '2021-08-21', '2021-08-21', 10, 0),
(62, '3204321802130012', '3204323004130001', 'Daffa Rudiansyah', 'L', 'Bandung', '2013-04-30', 8, 'Belum Kawin', 'Islam', 'WNI', 'SD dan Sederajat', 'Bersekolah', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(63, '3204321802130012', '3204320903170002', 'Raffa Rudiansyah', 'L', 'Bandung', '2017-03-09', 4, 'Belum Kawin', 'Islam', 'WNI', 'Tidak Sekolah', 'Tidak Bekerja', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(64, '3207361812140002', '3204321612790003', 'Dede Yuliana', 'L', 'Bandung', '1979-12-16', 42, 'Kawin', 'Islam', 'WNI', 'SMA dan Sederajat', 'Bekerja', 'Lainnya', 'Bukan Peserta', '3500000', 'Peserta', '1', 'Kepala Keluarga', '2021-08-21', '2021-08-21', 10, 0),
(65, '3207361812140002', '3204327103910005', 'Kiki Ayu Lestari', 'P', 'Bandung', '1991-03-31', 30, 'Kawin', 'Islam', 'WNI', 'SMA dan Sederajat', 'Ibu Rumah Tangga', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Istri', '2021-08-21', '2021-08-21', 10, 0),
(66, '3207361812140002', '3204321907120005', 'Deris Ramdani', 'L', 'Bandung', '2012-07-19', 9, 'Belum Kawin', 'Islam', 'WNI', 'SD dan Sederajat', 'Bersekolah', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(67, '3207361812140002', '3218064701160001', 'Mahaulida Intan Kirana', 'P', 'Pangandaran', '2016-01-07', 5, 'Belum Kawin', 'Islam', 'WNI', 'Lainnya', 'Bersekolah', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(68, '3204323103057784', '3204323107690004', 'Achmad Hidayat', 'L', 'Bandung', '1969-07-31', 52, 'Kawin', 'Islam', 'WNI', 'SMA dan Sederajat', 'Bekerja', 'Lainnya', 'Bukan Peserta', '2500000', 'Peserta', '1', 'Kepala Keluarga', '2021-08-21', '2021-08-21', 10, 0),
(69, '3204323103057784', '3204327107720005', 'Sumiati', 'P', 'Bandung', '1972-07-31', 49, 'Kawin', 'Islam', 'WNI', 'SMA dan Sederajat', 'Ibu Rumah Tangga', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Istri', '2021-08-21', '2021-08-21', 10, 0),
(70, '3204323103057784', '3204321805940002', 'Achdi Panji Sakti', 'L', 'Bandung', '1994-05-18', 27, 'Belum Kawin', 'Islam', 'WNI', 'SMA dan Sederajat', 'Bekerja', 'Lainnya', 'Bukan Peserta', '2000000', 'Peserta', '1', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(71, '3204323103057784', '3204324403040014', 'Puteri Komala Sari', 'P', 'Bandung', '2004-03-04', 17, 'Belum Kawin', 'Islam', 'WNI', 'SMA dan Sederajat', 'Bersekolah', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(72, '3204322607680003', '3204326105690017', 'Atin Rohayatin', 'P', 'Bandung', '1969-05-21', 52, 'Cerai Mati', 'Islam', 'WNI', 'SMA dan Sederajat', 'Tidak Bekerja', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Kepala Keluarga', '2021-08-21', '2021-08-21', 10, 0),
(73, '3204322607680003', '3204320808910004', 'Reggy Ferdian Ryana', 'L', 'Bandung', '1991-08-08', 30, 'Belum Kawin', 'Islam', 'WNI', 'SMA dan Sederajat', 'Bekerja', 'Lainnya', 'Peserta', '3000000', 'Peserta', '1', 'Anak', '2021-08-21', '2021-08-21', 10, 0),
(83, '3204323010130021', '3204320702840018', 'Yadi Rusyadi', 'L', 'Bandung', '1984-02-07', 37, 'Kawin', 'Islam', 'WNI', 'SMA dan Sederajat', 'Sedang Mencari Pekerjaan', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Kepala Keluarga', '2021-09-04', '2021-09-04', 10, 0),
(84, '3204323010130021', '3204325004890014', 'Hasanah Munawaroh', 'P', 'Tasikmalaya', '1989-04-10', 32, 'Kawin', 'Islam', 'WNI', 'SMA dan Sederajat', 'Ibu Rumah Tangga', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Istri', '2021-09-04', '2021-09-04', 10, 0),
(85, '3204323010130021', '3204322310150002', 'Yusril Fardan Fairus', 'L', 'Bandung', '2015-10-23', 5, 'Belum Kawin', 'Islam', 'WNI', 'Lainnya', 'Bersekolah', 'Lainnya', 'Bukan Peserta', '0', 'Peserta', '1', 'Anak', '2021-09-04', '2021-09-04', 10, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `desk_keluarga`
--

CREATE TABLE `desk_keluarga` (
  `id_desk` int(11) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `tempat_tinggal` varchar(255) NOT NULL,
  `status_lahan` varchar(255) NOT NULL,
  `luas_lantai` varchar(100) DEFAULT NULL,
  `luas_lahan` varchar(100) DEFAULT NULL,
  `jenis_lantai` varchar(100) NOT NULL,
  `dinding` varchar(100) NOT NULL,
  `jendela` varchar(100) NOT NULL,
  `genteng` varchar(100) NOT NULL,
  `penerangan` varchar(100) NOT NULL,
  `energi_memasak` varchar(100) NOT NULL,
  `tps` varchar(100) NOT NULL,
  `mck` varchar(100) NOT NULL,
  `sumber_airmandi` varchar(100) NOT NULL,
  `fasilitas_bab` varchar(100) NOT NULL,
  `sumber_airminum` varchar(100) NOT NULL,
  `pembuangan_limbah` varchar(100) NOT NULL,
  `bawah_sutet` varchar(100) NOT NULL,
  `bantaran_sungai` varchar(100) NOT NULL,
  `lerang` varchar(100) NOT NULL,
  `kondisi_rumah` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `desk_keluarga`
--

INSERT INTO `desk_keluarga` (`id_desk`, `no_kk`, `tempat_tinggal`, `status_lahan`, `luas_lantai`, `luas_lahan`, `jenis_lantai`, `dinding`, `jendela`, `genteng`, `penerangan`, `energi_memasak`, `tps`, `mck`, `sumber_airmandi`, `fasilitas_bab`, `sumber_airminum`, `pembuangan_limbah`, `bawah_sutet`, `bantaran_sungai`, `lerang`, `kondisi_rumah`, `date_created`, `date_updated`, `id_user`, `id_petugas`) VALUES
(4, '3204322111070110', 'Milik Sendiri', 'Milik Sendiri', '140', '147', 'Keramik', 'Semen/Beton/Kayu berkualitas tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas kota/LPG/biogas', 'Dibakar', 'Sendiri', 'Ledeng/perpipaan berbayar/air isi ulang/kemasan', 'Jamban Sendiri', 'Ledeng/perpipaan berbayar/air isi ulang/kemasan', 'Tangki/instalasi pengelolaan limbah', 'Tidak', 'Tidak', 'Tidak', 'Tidak Kumuh', '2021-08-19', '2021-08-19', 10, 0),
(5, '3204322910080009', 'Milik Sendiri', 'Milik Sendiri', '52', '52', 'Keramik', 'Semen/Beton/Kayu berkualitas tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas kota/LPG/biogas', 'Dibakar', 'Sendiri', 'Ledeng/perpipaan berbayar/air isi ulang/kemasan', 'Jamban Sendiri', 'Ledeng/perpipaan berbayar/air isi ulang/kemasan', 'Sawah/kolam/sungai/drainase/laut', 'Tidak', 'Tidak', 'Tidak', 'Tidak Kumuh', '2021-08-20', '2021-08-20', 10, 0),
(6, '3204321912180024', 'Milik Sendiri', 'Milik Sendiri', '28', '28', 'Semen/Bata Merah', 'Semen/Beton/Kayu Berkualitas Tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas Kota/LPG/Biogas', 'Dibakar', 'Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Jamban Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Sawah/Kolam/Sungai/Drainase/Laut', 'Tidak', 'Tidak', 'Tidak', 'Tidak Kumuh', '2021-08-20', '2021-08-20', 10, 0),
(7, '3204321702100043', 'Milik Sendiri', 'Milik Sendiri', '70', '70', 'Keramik', 'Semen/Beton/Kayu Berkualitas Tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas Kota/LPG/Biogas', 'Dibakar', 'Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Jamban Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Sawah/Kolam/Sungai/Drainase/Laut', 'Tidak', 'Ya', 'Tidak', 'Tidak Kumuh', '2021-08-20', '2021-08-20', 10, 0),
(8, '3204320411150024', 'Lainnya', 'Lainnya', '60', '70', 'Keramik', 'Semen/Beton/Kayu Berkualitas Tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas Kota/LPG/Biogas', 'Dibakar', 'Berkelompok/Tetangga', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Jamban Bersama/Tetangga', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Sawah/Kolam/Sungai/Drainase/Laut', 'Tidak', 'Tidak', 'Tidak', 'Tidak Kumuh', '2021-08-21', '2021-08-21', 10, 0),
(9, '3204322012060026', 'Milik Sendiri', 'Milik Sendiri', '36', '42', 'Keramik', 'Semen/Beton/Kayu Berkualitas Tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas Kota/LPG/Biogas', 'Dibakar', 'Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Jamban Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Tangki/Instalasi Pengelolaan Limbah', 'Tidak', 'Tidak', 'Tidak', 'Tidak Kumuh', '2021-08-21', '2021-08-21', 10, 0),
(10, '2304320204051729', 'Lainnya', 'Lainnya', '24', '24', 'Semen/Bata Merah', 'Semen/Beton/Kayu Berkualitas Tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas Kota/LPG/Biogas', 'Dibakar', 'MCK Umum', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Jamban Bersama/Tetangga', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Sawah/Kolam/Sungai/Drainase/Laut', 'Tidak', 'Ya', 'Tidak', 'Kumuh', '2021-08-21', '2021-08-21', 10, 0),
(11, '3204324603500001', 'Milik Sendiri', 'Milik Sendiri', '70', '70', 'Keramik', 'Semen/Beton/Kayu Berkualitas Tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas Kota/LPG/Biogas', 'Dibakar', 'Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Jamban Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Sawah/Kolam/Sungai/Drainase/Laut', 'Tidak', 'Tidak', 'Tidak', 'Tidak Kumuh', '2021-08-21', '2021-08-21', 10, 0),
(12, '3204321406110090', 'Milik Sendiri', 'Milik Sendiri', '50', '56', 'Keramik', 'Semen/Beton/Kayu Berkualitas Tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas Kota/LPG/Biogas', 'Dibakar', 'Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Jamban Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Sawah/Kolam/Sungai/Drainase/Laut', 'Tidak', 'Tidak', 'Tidak', 'Tidak Kumuh', '2021-08-21', '2021-08-21', 10, 0),
(13, '3204320204051672', 'Milik Sendiri', 'Milik Sendiri', '40', '56', 'Keramik', 'Semen/Beton/Kayu Berkualitas Tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas Kota/LPG/Biogas', 'Dibakar', 'Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Jamban Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Sawah/Kolam/Sungai/Drainase/Laut', 'Tidak', 'Ya', 'Tidak', 'Tidak Kumuh', '2021-08-21', '2021-08-21', 10, 0),
(14, '3204321711160026', 'Milik Sendiri', 'Milik Sendiri', '', '', 'Keramik', 'Semen/Beton/Kayu Berkualitas Tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas Kota/LPG/Biogas', 'Dibakar', 'Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Jamban Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Sawah/Kolam/Sungai/Drainase/Laut', 'Tidak', 'Tidak', 'Tidak', 'Tidak Kumuh', '2021-08-21', '2021-08-21', 10, 0),
(15, '3204322502060188', 'Milik Sendiri', 'Milik Sendiri', '', '', 'Keramik', 'Semen/Beton/Kayu Berkualitas Tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas Kota/LPG/Biogas', 'Dibakar', 'Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Jamban Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Sawah/Kolam/Sungai/Drainase/Laut', 'Tidak', 'Tidak', 'Tidak', 'Tidak Kumuh', '2021-08-21', '2021-08-21', 10, 0),
(16, '3204322110130020', 'Milik Sendiri', 'Milik Sendiri', '', '', 'Keramik', 'Semen/Beton/Kayu Berkualitas Tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas Kota/LPG/Biogas', 'Dibakar', 'Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Jamban Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Sawah/Kolam/Sungai/Drainase/Laut', 'Tidak', 'Tidak', 'Tidak', 'Tidak Kumuh', '2021-08-21', '2021-08-21', 10, 0),
(17, '3204322711120162', 'Milik Sendiri', 'Milik Sendiri', '', '', 'Keramik', 'Semen/Beton/Kayu Berkualitas Tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas Kota/LPG/Biogas', 'Dibakar', 'Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Jamban Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Tangki/Instalasi Pengelolaan Limbah', 'Tidak', 'Tidak', 'Tidak', 'Tidak Kumuh', '2021-08-21', '2021-08-21', 10, 0),
(18, '3204320104058149', 'Milik Sendiri', 'Milik Sendiri', '', '', 'Keramik', 'Semen/Beton/Kayu Berkualitas Tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas Kota/LPG/Biogas', 'Dibakar', 'Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Jamban Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Sawah/Kolam/Sungai/Drainase/Laut', 'Tidak', 'Tidak', 'Tidak', 'Tidak Kumuh', '2021-08-21', '2021-08-21', 10, 0),
(19, '3204321210120038', 'Milik Sendiri', 'Milik Sendiri', '', '', 'Keramik', 'Semen/Beton/Kayu Berkualitas Tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas Kota/LPG/Biogas', 'Dibakar', 'Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Jamban Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Sawah/Kolam/Sungai/Drainase/Laut', 'Tidak', 'Tidak', 'Tidak', 'Tidak Kumuh', '2021-08-21', '2021-08-21', 10, 0),
(20, '3204321802130012', 'Milik Sendiri', 'Milik Sendiri', '', '', 'Keramik', 'Semen/Beton/Kayu Berkualitas Tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas Kota/LPG/Biogas', 'Dibakar', 'Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Jamban Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Sawah/Kolam/Sungai/Drainase/Laut', 'Tidak', 'Tidak', 'Tidak', 'Tidak Kumuh', '2021-08-21', '2021-08-21', 10, 0),
(21, '3207361812140002', 'Milik Sendiri', 'Milik Sendiri', '50', '50', 'Keramik', 'Semen/Beton/Kayu Berkualitas Tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas Kota/LPG/Biogas', 'Dibakar', 'Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Jamban Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Tangki/Instalasi Pengelolaan Limbah', 'Tidak', 'Tidak', 'Tidak', 'Tidak Kumuh', '2021-08-21', '2021-08-21', 10, 0),
(22, '3204323103057784', 'Milik Sendiri', 'Milik Sendiri', '56', '56', 'Keramik', 'Semen/Beton/Kayu Berkualitas Tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas Kota/LPG/Biogas', 'Dibakar', 'Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Jamban Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Tangki/Instalasi Pengelolaan Limbah', 'Tidak', 'Tidak', 'Tidak', 'Tidak Kumuh', '2021-08-21', '2021-08-21', 10, 0),
(23, '3204322607680003', 'Milik Sendiri', 'Milik Sendiri', '98', '98', 'Keramik', 'Semen/Beton/Kayu Berkualitas Tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas Kota/LPG/Biogas', 'Dibakar', 'Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Jamban Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Sawah/Kolam/Sungai/Drainase/Laut', 'Tidak', 'Tidak', 'Ya', 'Tidak Kumuh', '2021-08-21', '2021-08-21', 10, 0),
(26, '3204323010130021', 'Milik Sendiri', 'Milik Sendiri', '', '98', 'Keramik', 'Semen/Beton/Kayu Berkualitas Tinggi', 'Ada, Berfungsi', 'Genteng', 'Listrik PLN', 'Gas Kota/LPG/Biogas', 'Dibakar', 'Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Jamban Sendiri', 'Ledeng/Perpipaan Berbayar/Air Isi Ulang/Kemasan', 'Tangki/Instalasi Pengelolaan Limbah', 'Tidak', 'Tidak', 'Tidak', 'Tidak Kumuh', '2021-09-04', '2021-09-04', 10, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_data_warga`
--

CREATE TABLE `laporan_data_warga` (
  `id_laporandata_warga` int(11) NOT NULL,
  `rt_satu` varchar(100) NOT NULL,
  `rt_dua` varchar(100) NOT NULL,
  `rt_tiga` varchar(100) NOT NULL,
  `rt_empat` varchar(100) NOT NULL,
  `rt_lima` varchar(100) NOT NULL,
  `rt_enam` varchar(100) NOT NULL,
  `rt_tujuh` varchar(100) NOT NULL,
  `rt_delapan` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `status_lapor` varchar(100) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan_data_warga`
--

INSERT INTO `laporan_data_warga` (`id_laporandata_warga`, `rt_satu`, `rt_dua`, `rt_tiga`, `rt_empat`, `rt_lima`, `rt_enam`, `rt_tujuh`, `rt_delapan`, `jumlah`, `status_lapor`, `date_created`, `date_updated`, `id_user`) VALUES
(1, '0', '0', '0', '1', '0', '0', '0', '0', '1', 'Dilaporkan', '2021-08-20', '2021-08-20', 10),
(4, '10', '0', '0', '10', '0', '0', '0', '0', '20', 'Dilaporkan', '2021-08-21', '2021-08-21', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerima_bantuan`
--

CREATE TABLE `penerima_bantuan` (
  `id_penerima` int(11) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nama_penerima` varchar(255) NOT NULL,
  `rt` varchar(10) NOT NULL,
  `jenis_bantuan` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tanggal_generate_penerima` date NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_surat`
--

CREATE TABLE `pengajuan_surat` (
  `id_pengajuan` int(11) NOT NULL,
  `jenis_surat` varchar(255) NOT NULL,
  `nama_pembuat_pengajuan` varchar(255) NOT NULL,
  `nama_yang_meninggal` varchar(255) NOT NULL,
  `tanggal_kematian` date NOT NULL,
  `faktor_kematian` varchar(255) NOT NULL,
  `tanggal_dispensasi` date NOT NULL,
  `sampai_tanggal_dispensasi` date NOT NULL,
  `jumlah_hari` varchar(10) NOT NULL,
  `alasan_dispen` text NOT NULL,
  `rt_domisili` varchar(5) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajuan_surat`
--

INSERT INTO `pengajuan_surat` (`id_pengajuan`, `jenis_surat`, `nama_pembuat_pengajuan`, `nama_yang_meninggal`, `tanggal_kematian`, `faktor_kematian`, `tanggal_dispensasi`, `sampai_tanggal_dispensasi`, `jumlah_hari`, `alasan_dispen`, `rt_domisili`, `date_created`, `date_updated`, `id_user`) VALUES
(1, 'surat kematian', 'nama', 'nama', '2021-08-12', 'sakit', '0000-00-00', '0000-00-00', '-', '-', '1', '2021-08-13', '2021-08-13', 7),
(2, 'surat kematian', 'nama', 'nama', '2021-08-13', 'sakit', '0000-00-00', '0000-00-00', '-', '-', '1', '2021-08-13', '2021-08-13', 7),
(3, 'surat domisili', 'nama', '-', '0000-00-00', '-', '0000-00-00', '0000-00-00', '-', '-', '1', '2021-08-13', '2021-08-13', 7),
(4, 'surat dispensasi', 'nama', '-', '0000-00-00', '-', '2021-08-12', '2021-08-13', '2', 'Sakit', '1', '2021-08-13', '2021-08-13', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `token`
--

INSERT INTO `token` (`id`, `token`, `id_user`, `date_created`) VALUES
(19, '8896f194e81c375bf8db40c20a7a8c', 8, '2021-08-14'),
(20, 'b5805601fa01ef60ae04f12adc1049', 8, '2021-08-14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `role` varchar(50) NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `no_hp`, `no_kk`, `role`, `date_created`, `date_updated`) VALUES
(1, 'administrator', '10c1212f8f6fe32a840633a140bf5088262e491d', 'admin@pendataankader.id', '089664303980', '2147483647', 'administrator', '2021-08-11', '2021-08-11'),
(7, 'tisnakelana', 'eff388efdd844ff4d4628fdd5283065d2459a65d', 'tisna@pendataankader.id', '089664303980', '320432999999999', 'rw', '2021-08-12', '2021-08-12'),
(8, 'rofiq', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'rioagungfirmansyah@gmail.com', '089659086915', '3204320301200007', 'warga', '2021-08-13', '2021-08-13'),
(10, 'kaderpopi', 'b5316ba4a6ccef4075192c2d38fec57da801afc8', 'popi@gmail.com', '0891234567890', '3204320301200007', 'kader', '2021-08-13', '2021-08-13'),
(11, 'dudesatari', 'a9e2d1b99462ae535cf0271c48fb57ee1926d377', 'dudesatari@gmail.com', '0891234567890', '3204322502060188', 'warga', '2021-08-21', '2021-08-21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_keluhan_warga`
--
ALTER TABLE `data_keluhan_warga`
  ADD PRIMARY KEY (`id_keluhan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `data_petugas`
--
ALTER TABLE `data_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `data_training`
--
ALTER TABLE `data_training`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `data_warga`
--
ALTER TABLE `data_warga`
  ADD PRIMARY KEY (`id_data_warga`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indeks untuk tabel `desk_keluarga`
--
ALTER TABLE `desk_keluarga`
  ADD PRIMARY KEY (`id_desk`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indeks untuk tabel `laporan_data_warga`
--
ALTER TABLE `laporan_data_warga`
  ADD PRIMARY KEY (`id_laporandata_warga`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `penerima_bantuan`
--
ALTER TABLE `penerima_bantuan`
  ADD PRIMARY KEY (`id_penerima`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_keluhan_warga`
--
ALTER TABLE `data_keluhan_warga`
  MODIFY `id_keluhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `data_petugas`
--
ALTER TABLE `data_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_training`
--
ALTER TABLE `data_training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `data_warga`
--
ALTER TABLE `data_warga`
  MODIFY `id_data_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `desk_keluarga`
--
ALTER TABLE `desk_keluarga`
  MODIFY `id_desk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `laporan_data_warga`
--
ALTER TABLE `laporan_data_warga`
  MODIFY `id_laporandata_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penerima_bantuan`
--
ALTER TABLE `penerima_bantuan`
  MODIFY `id_penerima` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_surat`
--
ALTER TABLE `pengajuan_surat`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
