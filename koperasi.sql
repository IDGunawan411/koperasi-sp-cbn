-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 09:33 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `ID_Anggota` varchar(20) NOT NULL,
  `ID_Tabungan` varchar(20) NOT NULL,
  `ID_User` varchar(20) NOT NULL,
  `Nama_Anggota` varchar(100) NOT NULL,
  `Jenis_Kelamin` varchar(20) NOT NULL,
  `Tempat_Lahir` varchar(20) NOT NULL,
  `Tanggal_Lahir` varchar(20) NOT NULL,
  `Pendidikan_Terakhir` varchar(20) NOT NULL,
  `Status_Perkawinan` varchar(20) NOT NULL,
  `Simpanan_Pokok` varchar(20) NOT NULL,
  `No_KTP` varchar(20) NOT NULL,
  `No_KK` varchar(20) NOT NULL,
  `No_Telp` varchar(20) NOT NULL,
  `No_Rek` varchar(20) NOT NULL,
  `Tanggal_Entri` varchar(20) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `Status_Aktif` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`ID_Anggota`, `ID_Tabungan`, `ID_User`, `Nama_Anggota`, `Jenis_Kelamin`, `Tempat_Lahir`, `Tanggal_Lahir`, `Pendidikan_Terakhir`, `Status_Perkawinan`, `Simpanan_Pokok`, `No_KTP`, `No_KK`, `No_Telp`, `No_Rek`, `Tanggal_Entri`, `Alamat`, `Status_Aktif`) VALUES
('KSA250001', 'KST200001', 'KSP200002', 'Bagas Widiyanto', 'Laki-Laki', 'Klaten', '2020-11-17', 'S1', 'Belum Menikah', '100000', '32010111099990009', '32010111099991111', '08965664652', '123123543534', '2020-11-17', 'Cibinong', 'Aktif'),
('KSA250002', 'KST200002', 'KSP200005', 'Gunawan Prasetyo', 'Laki-Laki', 'Sukoharjo', '11/24/2020 12:00 AM', 'D3', 'Belum Menikah', '100000', '180441180015', '180441180015', '082249495157', '1231958726', '2020-11-24', 'CIbinong', 'Aktif'),
('KSA250003', 'KST200003', 'KSP200006', 'Hanifah', 'Laki-Laki', 'Bogor', '2020-12-09', 'SD', 'Belum Menikah', '100000', '1', '1', '1', '1', '09 December 2020', '123', 'Aktif'),
('KSA250004', 'KST200004', 'KSP200007', 'Contoh', 'Laki-Laki', 'Bogot', '2020-12-09', 'SD', 'Belum Menikah', '100000', '1', '1', '1', '1', '09 December 2020', '1', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `ID_Angsuran` varchar(20) NOT NULL,
  `ID_Pinjaman` varchar(20) NOT NULL,
  `Angsuran` varchar(20) NOT NULL,
  `Besar_Angsuran` varchar(20) NOT NULL,
  `Denda` varchar(20) NOT NULL,
  `Telat_Denda` varchar(20) NOT NULL,
  `ID_Anggota` varchar(20) NOT NULL,
  `Tgl_Entri` varchar(20) NOT NULL,
  `Jatuh_Tempo` varchar(20) NOT NULL,
  `Status_Angsuran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`ID_Angsuran`, `ID_Pinjaman`, `Angsuran`, `Besar_Angsuran`, `Denda`, `Telat_Denda`, `ID_Anggota`, `Tgl_Entri`, `Jatuh_Tempo`, `Status_Angsuran`) VALUES
('AS0005', 'P210001', 'AS KE-01', '51000', '0', '', 'KSA250001', '2020-12-09', '2021-01-07', 'Lunas'),
('AS0006', 'P210001', 'AS KE-02', '51000', '0', '', 'KSA250001', '2020-12-09', '2021-02-07', 'Lunas'),
('AS0007', 'P210002', 'AS KE-01', '45900', '', '', 'KSA250002', '', '2021-01-08', 'Belum Lunas'),
('AS0008', 'P210002', 'AS KE-02', '45900', '', '', 'KSA250002', '', '2021-02-08', 'Belum Lunas'),
('AS0009', 'P210008', 'AS KE-01', '104000', '', '', 'KSA250004', '', '2021-01-09', 'Belum Lunas'),
('AS0010', 'P210008', 'AS KE-02', '104000', '', '', 'KSA250004', '', '2021-02-09', 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `ID_Gambar` int(11) NOT NULL,
  `Profil_Image` varchar(200) NOT NULL,
  `ID_User` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`ID_Gambar`, `Profil_Image`, `ID_User`) VALUES
(6, '1607504069_form-pinjaman.jpg', 'KSP200001'),
(7, '1607495049_form-simpanan.jpg', 'KSP200006'),
(9, '1607497147_form-anggota.jpg', 'KSP200007'),
(10, '1607508951_form-help2.PNG', 'KSP200002'),
(11, '1607508996_form-help.jpg', 'KSP200005');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `ID_History` int(11) NOT NULL,
  `ID_Tabungan` varchar(255) NOT NULL,
  `Jenis_History` varchar(255) NOT NULL,
  `Jumlah_History` varchar(255) NOT NULL,
  `Saldo_Terakhir` varchar(255) NOT NULL,
  `Waktu_History` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`ID_History`, `ID_Tabungan`, `Jenis_History`, `Jumlah_History`, `Saldo_Terakhir`, `Waktu_History`) VALUES
(77, 'KST200001', 'Simpanan Pokok', '100000', '100000', '2020-11-17'),
(78, 'KST200002', 'Simpanan Pokok', '100000', '100000', '2020-11-17'),
(79, 'KST200003', 'Simpanan Pokok', '100000', '100000', '2020-10-17'),
(81, 'KST200001', 'Simpanan Sukarela', '1000000000000', '1000000100000', '2020-11-17'),
(82, 'KST200002', 'Simpanan Wajib', '100000000', '100100000', '2020-11-17'),
(83, 'KST200003', 'Simpanan Pokok', '100000', '100000', '2020-11-17'),
(84, 'KST200001', 'Simpanan Wajib', '100000', '1000000180000', '2020-11-19'),
(85, 'KST200001', 'Simpanan Wajib', '99977', '299977', '2020-11-20'),
(86, 'KST200001', 'Simpanan Sukarela', '100000', '400000', '2020-11-20'),
(87, 'KST200001', 'Simpanan Sukarela', '100000', '400000', '2020-11-20'),
(88, 'KST200001', 'Simpanan Sukarela', '100000', '400000', '2020-11-20'),
(89, 'KST200002', 'Simpanan Pokok', '100000', '100000', '2020-11-24'),
(90, 'KST200002', 'Simpanan Wajib', '100000', '200000', '2020-11-24'),
(91, 'KST200002', 'Simpanan Wajib', '1000000', '1100000', '01-12-2020, 15:45:37 PM'),
(92, 'KST200002', 'Simpanan Sukarela', '100000', '150000', '05-12-2020, 20:26:36 PM'),
(93, 'KST200002', 'Simpanan Wajib', '100000', '150000', '05 December 2020, 20:41:58 PM'),
(94, 'KST200001', 'Simpanan Sukarela', '99991', '179991', '05-Dec-2020, 20:45:52 PM'),
(95, 'KST200002', 'Simpanan Sukarela', '1000000', '1050000', '05-Dec-2020, 20:47:12 PM'),
(96, 'KST200001', 'Simpanan Wajib', '10000000', '10080000', '05 December 2020, 20:48:19 PM'),
(97, 'KST200001', 'Simpanan Wajib', '1000000', '1080000', '05 December 2020, 20:50:56 PM'),
(98, 'KST200001', 'Simpanan Wajib', '30000', '120000', '07 December 2020, 21:46:21 PM'),
(99, 'KST200002', 'Simpanan Wajib', '30000', '130000', '07 December 2020, 22:27:42 PM'),
(100, 'KST200001', 'Simpanan Sukarela', '10000', '100000', '07 December 2020, 22:33:19 PM'),
(101, 'KST200001', 'Simpanan Sukarela', '10000', '100000', '07 December 2020, 23:30:21 PM'),
(102, 'KST200001', 'Simpanan Wajib', '30000', '170000', '08 December 2020, 13:33:08 PM'),
(103, 'KST200004', 'Simpanan Wajib', '29994', '129994', '09 December 2020, 15:14:52 PM'),
(104, 'KST200001', 'Simpanan Wajib', '30000', '140000', '09 December 2020, 15:48:39 PM');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pinjaman`
--

CREATE TABLE `jenis_pinjaman` (
  `ID_Jenis_Pinjaman` varchar(20) NOT NULL,
  `Nama_Pinjaman` varchar(100) NOT NULL,
  `Max_Pinjaman` varchar(20) NOT NULL,
  `Bunga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pinjaman`
--

INSERT INTO `jenis_pinjaman` (`ID_Jenis_Pinjaman`, `Nama_Pinjaman`, `Max_Pinjaman`, `Bunga`) VALUES
('JP001', 'Pinjaman Kesehatan', '200000', '1'),
('JP002', 'Pinjaman Haji', '10000000', '5'),
('JP003', 'Pinjaman Pendidikan', '300000', '2');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_simpanan`
--

CREATE TABLE `jenis_simpanan` (
  `ID_Jenis_Simpanan` varchar(20) NOT NULL,
  `Nama_Simpanan` varchar(100) NOT NULL,
  `Besar_Simpanan` varchar(20) NOT NULL,
  `Tgl_Entri` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_simpanan`
--

INSERT INTO `jenis_simpanan` (`ID_Jenis_Simpanan`, `Nama_Simpanan`, `Besar_Simpanan`, `Tgl_Entri`) VALUES
('JS001', 'Simpanan Wajib', '10000', '2020-10-10'),
('JS002', 'Simpanan Sukarela', '0', '2020-10-10');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `ID_Konfigurasi` int(11) NOT NULL,
  `Nama_Konfigurasi` varchar(50) NOT NULL,
  `Isi_Konfigurasi` longtext NOT NULL,
  `Jenis_Konfigurasi` varchar(50) NOT NULL,
  `Tanggal_Ubah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`ID_Konfigurasi`, `Nama_Konfigurasi`, `Isi_Konfigurasi`, `Jenis_Konfigurasi`, `Tanggal_Ubah`) VALUES
(1, 'Simpanan Wajib', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum mollitia amet cum rerum vitae ad officia molestias! Aliquam necessitatibus asperiores aspernatur mollitia quas nihil animi provident, dolore, harum alias omnis.', 'Simpanan', '12-11-2020'),
(2, 'Simpanan Sukarela', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet distinctio excepturi eos quia illum nobis pariatur minima neque autem aliquid, architecto optio dolore fugiat quam at cumque nam similique hic.', 'Simpanan', '12-11-2020'),
(12, 'Panduan Pinjaman (Guide)', 'Isi panduan pinjaman (Guide)', 'Panduan', '2020-12-08'),
(13, 'Pinjaman Kesehatan', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet distinctio excepturi eos quia illum nobis pariatur minima neque autem aliquid, architecto optio dolore fugiat quam at cumque nam similique hic.', 'Pinjaman', '2020-12-08'),
(14, 'Pinjaman Haji', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet distinctio excepturi eos quia illum nobis pariatur minima neque autem aliquid, architecto optio dolore fugiat quam at cumque nam similique hic', 'Pinjaman', '2020-12-08'),
(15, 'Pinjaman Pendidikan', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Amet distinctio excepturi eos quia illum nobis pariatur minima neque autem aliquid, architecto optio dolore fugiat quam at cumque nam similique hic.', 'Pinjaman', '2020-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `penarikan`
--

CREATE TABLE `penarikan` (
  `ID_Penarikan` varchar(20) NOT NULL,
  `ID_Tabungan` varchar(20) NOT NULL,
  `Besar_Penarikan` varchar(20) NOT NULL,
  `Tgl_Entri` varchar(50) NOT NULL,
  `Status_Penarikan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penarikan`
--

INSERT INTO `penarikan` (`ID_Penarikan`, `ID_Tabungan`, `Besar_Penarikan`, `Tgl_Entri`, `Status_Penarikan`) VALUES
('P190010', 'KST200001', '10000', '07 December 2020, 18:48:34 PM', 'Konfirmasi'),
('P190011', 'KST200002', '10000', '07 December 2020, 20:00:33 PM', 'Menunggu'),
('P190012', 'KST200001', '10000', '07 December 2020, 20:10:52 PM', 'Menunggu'),
('P190013', 'KST200004', '10000', '09 December 2020, 15:31:23 PM', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE `pinjaman` (
  `ID_Pinjaman` varchar(20) NOT NULL,
  `ID_Anggota` varchar(20) NOT NULL,
  `Nama_Pinjaman` varchar(50) NOT NULL,
  `Besar_Pinjaman` varchar(20) NOT NULL,
  `Besar_Angsuran` varchar(20) NOT NULL,
  `Lama_Angsuran` varchar(20) NOT NULL,
  `Bunga` varchar(20) NOT NULL,
  `Tgl_Entri` varchar(50) NOT NULL,
  `Jatuh_Tempo` varchar(20) NOT NULL,
  `Status_Pinjaman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`ID_Pinjaman`, `ID_Anggota`, `Nama_Pinjaman`, `Besar_Pinjaman`, `Besar_Angsuran`, `Lama_Angsuran`, `Bunga`, `Tgl_Entri`, `Jatuh_Tempo`, `Status_Pinjaman`) VALUES
('P210001', 'KSA250001', 'Pinjaman Kesehatan', '100000', '51000', '2', '1', '07 December 2020, 19:23:29 PM', '2020-12-07', 'Konfirmasi'),
('P210002', 'KSA250002', 'Pinjaman Kesehatan', '90000', '45900', '2', '1', '07 December 2020, 19:29:26 PM', '2020-12-07', 'Konfirmasi'),
('P210003', 'KSA250001', 'Pinjaman Kesehatan', '50000', '25500', '2', '1', '07 December 2020, 19:32:49 PM', '2020-12-07', 'Menunggu'),
('P210004', '0', 'Pinjaman Kesehatan', '100000', '101000', '1', '1', '08 December 2020, 16:28:24 PM', '2020-12-08', 'Menunggu'),
('P210005', 'KSA250001', 'Pinjaman Kesehatan', '100000', '51000', '2', '1', '08 December 2020, 16:33:11 PM', '2020-12-08', 'Menunggu'),
('P210006', 'KSA250002', 'Pinjaman Haji', '100000', '55000', '2', '5', '08 December 2020, 16:33:38 PM', '2020-12-08', 'Menunggu'),
('P210007', 'KSA250002', 'Pinjaman Haji', '100000', '55000', '2', '5', '09 December 2020, 14:43:45 PM', '2020-12-09', 'Menunggu'),
('P210008', 'KSA250004', 'Pinjaman Pendidikan', '100000', '52000', '2', '2', '09 December 2020, 15:34:31 PM', '2020-12-09', 'Konfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `ID_Simpanan` varchar(20) NOT NULL,
  `ID_Tabungan` varchar(20) NOT NULL,
  `Jenis_Simpanan` varchar(20) NOT NULL,
  `Tanggal_Transaksi` varchar(50) NOT NULL,
  `Saldo_Simpanan` varchar(20) NOT NULL,
  `Status_Simpanan` varchar(20) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`ID_Simpanan`, `ID_Tabungan`, `Jenis_Simpanan`, `Tanggal_Transaksi`, `Saldo_Simpanan`, `Status_Simpanan`, `gambar`) VALUES
('KSS290001', 'KST200001', 'Simpanan Wajib', '07 December 2020, 21:46:21 PM', '30000', 'Menunggu', '5fce404d82f27.jpg'),
('KSS290002', 'KST200002', 'Simpanan Wajib', '07 December 2020, 22:27:42 PM', '30000', 'Konfirmasi', '5fce4a1d73cb5.jpg'),
('KSS290003', 'KST200001', 'Simpanan Sukarela', '07 December 2020, 22:33:19 PM', '10000', 'Konfirmasi', '5fce4b5b3367f.jpg'),
('KSS290004', 'KST200001', 'Simpanan Sukarela', '07 December 2020, 23:30:21 PM', '10000', 'Konfirmasi', '5fce58d87b3ed.png'),
('KSS290005', 'KST200001', 'Simpanan Wajib', '08 December 2020, 13:33:08 PM', '30000', 'Menunggu', '5fcf1e3b14f7e.jpg'),
('KSS290006', 'KST200004', 'Simpanan Wajib', '09 December 2020, 15:14:52 PM', '29994', 'Menunggu', '5fd087a28385d.jpg'),
('KSS290007', 'KST200001', 'Simpanan Wajib', '09 December 2020, 15:48:39 PM', '30000', 'Menunggu', '5fd08f7781f3d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tabungan`
--

CREATE TABLE `tabungan` (
  `ID_Tabungan` varchar(20) NOT NULL,
  `ID_Anggota` varchar(20) NOT NULL,
  `Tgl_Mulai` varchar(20) NOT NULL,
  `Besar_Tabungan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabungan`
--

INSERT INTO `tabungan` (`ID_Tabungan`, `ID_Anggota`, `Tgl_Mulai`, `Besar_Tabungan`) VALUES
('KST200001', 'KSA250001', '2020-11-17', '110000'),
('KST200002', 'KSA250002', '2020-11-17', '130000'),
('KST200003', 'KSA250003', '09 December 2020', '100000'),
('KST200004', 'KSA250004', '09 December 2020', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_User` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Nama_Lengkap` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_User`, `Username`, `Password`, `Nama_Lengkap`, `Email`, `Level`) VALUES
('KSP200001', 'admin123', '123', 'admin', 'admin@gmail.com', 'Petugas'),
('KSP200002', 'bagas', '123', 'Bagas Widiyanto', 'bagaswidiyanto1@gmail.com', 'Anggota'),
('KSP200005', 'gunawan', '123', 'Gunawan Prasetyo', 'gunawanprasetyo313@gmail.com', 'Anggota'),
('KSP200006', 'hanifah', '123', 'Hanifah', 'han@gmail.com', 'Anggota'),
('KSP200007', 'contoh', '123', 'Contoh', 'g', 'Anggota');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`ID_Anggota`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`ID_Angsuran`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`ID_Gambar`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`ID_History`);

--
-- Indexes for table `jenis_pinjaman`
--
ALTER TABLE `jenis_pinjaman`
  ADD PRIMARY KEY (`ID_Jenis_Pinjaman`);

--
-- Indexes for table `jenis_simpanan`
--
ALTER TABLE `jenis_simpanan`
  ADD PRIMARY KEY (`ID_Jenis_Simpanan`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`ID_Konfigurasi`);

--
-- Indexes for table `penarikan`
--
ALTER TABLE `penarikan`
  ADD PRIMARY KEY (`ID_Penarikan`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`ID_Pinjaman`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`ID_Simpanan`);

--
-- Indexes for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`ID_Tabungan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `ID_Gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `ID_History` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `ID_Konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
