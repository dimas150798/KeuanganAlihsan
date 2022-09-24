-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2022 at 04:25 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_alihsan`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_akses`
--

CREATE TABLE `db_akses` (
  `akses` int(1) NOT NULL,
  `nama_akses` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_akses`
--

INSERT INTO `db_akses` (`akses`, `nama_akses`) VALUES
(1, 'Admin'),
(2, 'KB - TK Al - Ihsan'),
(3, 'KB Integral'),
(4, 'SD Integral'),
(5, 'SMP Integral'),
(6, 'Pesantren Tahfidz DH'),
(7, 'Mitra Zakat'),
(8, 'Mitra BMH');

-- --------------------------------------------------------

--
-- Table structure for table `db_bank`
--

CREATE TABLE `db_bank` (
  `id_bank` int(25) NOT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `no_rekening` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_bank`
--

INSERT INTO `db_bank` (`id_bank`, `nama_bank`, `no_rekening`) VALUES
(1, 'BSI (Bank Syariah Indonesia)', '7181972763');

-- --------------------------------------------------------

--
-- Table structure for table `db_bulan`
--

CREATE TABLE `db_bulan` (
  `id_bulan` int(25) NOT NULL,
  `kd_nama_bulan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_bulan`
--

INSERT INTO `db_bulan` (`id_bulan`, `kd_nama_bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `db_data_input`
--

CREATE TABLE `db_data_input` (
  `id_data_input` varchar(25) NOT NULL,
  `id_usaha` varchar(25) NOT NULL,
  `id_kategori` varchar(25) NOT NULL,
  `id_pp` int(25) NOT NULL,
  `id_bulan` int(25) DEFAULT NULL,
  `kd_jumlah` int(25) NOT NULL,
  `kd_keterangan` varchar(50) NOT NULL,
  `gambar` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_data_input`
--

INSERT INTO `db_data_input` (`id_data_input`, `id_usaha`, `id_kategori`, `id_pp`, `id_bulan`, `kd_jumlah`, `kd_keterangan`, `gambar`) VALUES
('DA1001', 'DTU003', 'KAT018', 1, 1, 100000, 'Dana SPP Bulan 1', '61d509807eac6.'),
('DB1001', 'DTU004', 'KAT022', 1, 1, 100000, 'SPP Bulan 1', '61d530bc67e36.'),
('DC1001', 'DTU001', 'KAT006', 1, 1, 100000, 'SPP Bulan 1', '61cd27a502131.'),
('DD1001', 'DTU002', 'KAT001', 1, 1, 100000, 'SPP Bulan 1', '61bfeb296a354.'),
('DD1002', 'DTU002', 'KAT001', 1, 1, 100000, 'SPP Bulan 1', '61bfebcb8d893.'),
('DD1003', 'DTU002', 'KAT001', 1, 2, 100000, 'Pembayaran SPP', '61bff02aa58bc.'),
('DD1004', 'DTU002', 'KAT001', 1, 3, 100000, 'Pembayaran SPP', '61bff088cbf2a.'),
('DD1005', 'DTU002', 'KAT001', 1, 4, 100000, 'Dana SPP Bulan April', '61c01e6025980.'),
('DD1006', 'DTU002', 'KAT001', 1, 1, 100000, 'SPP Bulan 1', '61cd183652034.'),
('DE1001', 'DTU005', 'KAT032', 1, 1, 100000, 'Kotak Infaq Bulan 1', '61d3c8243661b.'),
('DE1002', 'DTU005', 'KAT034', 1, 1, 100000, 'Dana Zakat Bulan 1', '61d5007741691.'),
('DF1001', 'DTU006', 'KAT035', 1, 1, 100000, 'Dana Zakat', '61d29570abc12.'),
('DF1002', 'DTU006', 'KAT035', 1, 1, 100000, 'Dana Zakat Bulan 1', '61d3be844ec6b.'),
('DG1001', 'DTU007', 'KAT039', 1, 1, 100000, 'Kontribusi Bulan 1', '61d519d90e8c8.'),
('MA1001', 'DTU008', 'KAP076', 1, 1, 25000, 'Sisa saldo bulan 1', '61d539c6350f1.'),
('PA1002', 'DTU008', 'KAP083', 1, 1, 25000, 'INFAQ ANGGOTA BULAN 1', '61d4fbe375a86.');

-- --------------------------------------------------------

--
-- Table structure for table `db_data_output`
--

CREATE TABLE `db_data_output` (
  `id_data_output` varchar(25) NOT NULL,
  `id_usaha` varchar(25) DEFAULT NULL,
  `id_kategori` varchar(25) DEFAULT NULL,
  `id_pp` int(25) DEFAULT NULL,
  `id_bulan` int(25) DEFAULT NULL,
  `kd_jumlah` int(25) DEFAULT NULL,
  `kd_keterangan` varchar(50) DEFAULT NULL,
  `gambar` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_data_output`
--

INSERT INTO `db_data_output` (`id_data_output`, `id_usaha`, `id_kategori`, `id_pp`, `id_bulan`, `kd_jumlah`, `kd_keterangan`, `gambar`) VALUES
('HA1001', 'DTU007', 'KAP057', 2, 1, 100000, 'Angsuran 1', '61d51be7132af.'),
('KA1003', 'DTU002', 'KAP001', 2, 1, 250000, 'Honor Guru Bulan 1', '61cd129e657ea.'),
('MA1001', 'DTU004', 'KAP076', 2, 1, 25000, 'Sisa saldo bulan 1', '61d539c6350f1.'),
('MA1002', 'DTU004', 'KAP037', 2, 1, 25000, 'Gaji Bulan 1', '61d53dcb40b15.'),
('NA1001', 'DTU008', 'KAP058', 2, 1, 25000, 'Pesd', '61d51d5071d2a.'),
('PA1002', 'DTU005', 'KAP083', 2, 1, 25000, 'INFAQ ANGGOTA BULAN 1', '61d4fbe375a86.'),
('PA1003', 'DTU005', 'KAP043', 2, 1, 25000, 'NATURA Bulan 1', '61d506f140c72.'),
('PA1004', 'DTU003', 'KAP032', 2, 1, 25000, 'Bendahara Bulan 1', '61d50ae345dae.'),
('ZA1001', 'DTU006', 'KAP051', 2, 1, 50000, 'Operasional MZ', '61d296b80ce5d.');

-- --------------------------------------------------------

--
-- Table structure for table `db_kategori`
--

CREATE TABLE `db_kategori` (
  `id_kategori` varchar(25) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `id_usaha` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_kategori`
--

INSERT INTO `db_kategori` (`id_kategori`, `nama_kategori`, `id_usaha`) VALUES
('KAP075', 'INFAQ ANGGOTA (SMP INTEGRAL)', 'DTU008'),
('KAP076', 'SISA SALDO (SMP INTEGRAL)', 'DTU008'),
('KAP077', 'INFAQ ANGGOTA (SD INTEGRAL)', 'DTU008'),
('KAP078', 'SISA SALDO (SD INTEGRAL)', 'DTU008'),
('KAP079', 'INFAQ ANGGOTA (KB - TK)', 'DTU008'),
('KAP080', 'SISA SALDO (KB -TK)', 'DTU008'),
('KAP081', 'INFAQ ANGGOTA (KB - INTEGRAL)', 'DTU008'),
('KAP082', 'SISA SALDO (KB - INTEGRAL)', 'DTU008'),
('KAP083', 'INFAQ ANGGOTA (DH)', 'DTU008'),
('KAP084', 'SISA SALDO (DH)', 'DTU008'),
('KAP086', 'INFAQ ANGGOTA (MITRA ZAKAT)', 'DTU008'),
('KAP087', 'SISA SALDO (MITRA ZAKAT)', 'DTU008'),
('KAT001', 'DANA SPP', 'DTU002'),
('KAT002', 'BOPDA', 'DTU002'),
('KAT003', 'BOPDA DAK', 'DTU002'),
('KAT004', 'DANA KEGIATAN', 'DTU002'),
('KAT005', 'INFAQ GEDUNG', 'DTU002'),
('KAT006', 'DANA SPP', 'DTU001'),
('KAT007', 'BOPDA', 'DTU001'),
('KAT008', 'BOPDA DAK', 'DTU001'),
('KAT009', 'DANA KEGIATAN', 'DTU001'),
('KAT010', 'INFAQ GEDUNG', 'DTU001'),
('KAT011', 'DANA BOS', 'DTU003'),
('KAT012', 'DANA BOSDA', 'DTU003'),
('KAT013', 'DANA KEGIATAN', 'DTU003'),
('KAT014', 'INFAQ GEDUNG', 'DTU003'),
('KAT015', 'DANA KEGIATAN', 'DTU003'),
('KAT016', 'DANA BUKU / LKS', 'DTU003'),
('KAT017', 'DANA SERAGAM', 'DTU003'),
('KAT018', 'DANA SPP', 'DTU003'),
('KAT019', 'DANA KONSUMSI', 'DTU003'),
('KAT020', 'DANA KOMITE', 'DTU003'),
('KAT021', 'DANA TABUNGAN SISWA', 'DTU003'),
('KAT022', 'DANA SPP', 'DTU004'),
('KAT023', 'DANA BOS', 'DTU004'),
('KAT024', 'DANA BOSDA', 'DTU004'),
('KAT025', 'DANA KOMITE', 'DTU004'),
('KAT026', 'DANA KEGIATAN', 'DTU004'),
('KAT027', 'INFAQ GEDUNG', 'DTU004'),
('KAT028', 'DANA KELENGKAPAN', 'DTU004'),
('KAT029', 'DANA KONSUMSI', 'DTU004'),
('KAT030', 'DANA BUKU / LKS', 'DTU004'),
('KAT031', 'DANA SERAGAM', 'DTU004'),
('KAT032', 'KOTAK INFAQ', 'DTU005'),
('KAT033', 'DANA INFAQ', 'DTU005'),
('KAT034', 'DANA ZAKAT', 'DTU005'),
('KAT035', 'DANA ZAKAT', 'DTU006'),
('KAT036', 'DANA INFAQ', 'DTU006'),
('KAT037', 'DANA WAKAF', 'DTU006'),
('KAT038', 'KOTAK INFAQ', 'DTU006'),
('KAT039', 'KONTRIBUSI BMH', 'DTU007'),
('KAT040', 'DANA SUBSIDI BMH', 'DTU007'),
('KAT041', 'ANGSURAN PEMBANGUNAN', 'DTU007'),
('KAT043', 'PROGRAM KHUSUS', 'DTU006');

-- --------------------------------------------------------

--
-- Table structure for table `db_kategori_pengeluaran`
--

CREATE TABLE `db_kategori_pengeluaran` (
  `id_kategori` varchar(25) NOT NULL,
  `nama_pengeluaran` varchar(50) DEFAULT NULL,
  `id_usaha` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_kategori_pengeluaran`
--

INSERT INTO `db_kategori_pengeluaran` (`id_kategori`, `nama_pengeluaran`, `id_usaha`) VALUES
('KAP001', 'HONOR GURU', 'DTU002'),
('KAP002', 'KUE ANAK', 'DTU002'),
('KAP003', 'AKSES INTERNET', 'DTU002'),
('KAP004', 'AIR GALON', 'DTU002'),
('KAP005', 'IURAN HIMPAUDI, GUGUS, PKG', 'DTU002'),
('KAP006', 'INSENTIF GURU', 'DTU002'),
('KAP007', 'BELANJA OPERASIONAL', 'DTU002'),
('KAP008', 'BELANJA DAK', 'DTU002'),
('KAP009', 'KEGIATAN ANAK', 'DTU002'),
('KAP010', 'THR, SERAGAM & KONSUMSI GURU', 'DTU002'),
('KAP011', 'KEBERSIHAN', 'DTU002'),
('KAP012', 'PERBAIKAN DAN PENGECATAN', 'DTU002'),
('KAP013', 'HONOR USTADAZH', 'DTU001'),
('KAP014', 'CATERING NASI', 'DTU001'),
('KAP015', 'CATERING KUE', 'DTU001'),
('KAP016', 'AKSES INTERNET', 'DTU001'),
('KAP017', 'TAGIHAN LISTRIK', 'DTU001'),
('KAP018', 'MAJALAH', 'DTU001'),
('KAP019', 'IURAN IGTKI, GUGUS, PKG', 'DTU001'),
('KAP020', 'BELANJA OPERASIONAL HARIA', 'DTU001'),
('KAP021', 'INSENTIF USTADZAH', 'DTU001'),
('KAP022', 'BELANJA OPERASIONAL BOPDA', 'DTU001'),
('KAP023', 'BELANJA DAK', 'DTU001'),
('KAP024', 'BEASISWA ANAK DHUAFA', 'DTU001'),
('KAP025', 'KEGIATAN ANAK', 'DTU001'),
('KAP026', 'PENINGKATAN KAPASITAS GURU', 'DTU001'),
('KAP027', 'PENGADAAN GASEBO', 'DTU001'),
('KAP028', 'PARSEL, RIHLAH & SERAGAM', 'DTU001'),
('KAP029', 'KAMERA DIGITAL', 'DTU001'),
('KAP030', 'KURSI GURU', 'DTU001'),
('KAP031', 'REHAB KM & PAVING, PENGECATAN', 'DTU001'),
('KAP032', 'BENDAHARA', 'DTU003'),
('KAP033', 'BID. KURIKULUM', 'DTU003'),
('KAP034', 'BID. KESISWAAN', 'DTU003'),
('KAP035', 'BID. SARPRAS', 'DTU003'),
('KAP036', 'BID. TAS', 'DTU003'),
('KAP037', 'GAJI', 'DTU004'),
('KAP038', 'KURIKULUM', 'DTU004'),
('KAP039', 'KESISWAAN', 'DTU004'),
('KAP040', 'SARPRAS', 'DTU004'),
('KAP041', 'TATA USAHA', 'DTU004'),
('KAP042', 'DINIYAH', 'DTU004'),
('KAP043', 'NATURA', 'DTU005'),
('KAP044', 'KESEKRETARIATAN', 'DTU005'),
('KAP045', 'KEPESANTERANAN', 'DTU005'),
('KAP046', 'KERUMAH TANGGAAN', 'DTU005'),
('KAP047', 'SEKOLAH', 'DTU005'),
('KAP048', 'SARPRAS', 'DTU005'),
('KAP049', 'DKM', 'DTU005'),
('KAP050', 'PROYEK', 'DTU005'),
('KAP051', 'OPERASIONAL MZ', 'DTU006'),
('KAP052', 'UJROH PENGURUS', 'DTU006'),
('KAP053', 'PENYALURAN PROGRAM YAYASAN', 'DTU006'),
('KAP054', 'PENYALURAN PROGRAM KHUSUS', 'DTU006'),
('KAP055', 'PENYALURAN PROGRAM WAKAF ', 'DTU006'),
('KAP056', 'TUNJANGAN INSENTIF PEGAWAI', 'DTU006'),
('KAP057', 'ANGSURAN PEMBANGUNAN GEDUNG', 'DTU007'),
('KAP058', 'PENYALURAN MAYSAH NATURA DA\'I', 'DTU008'),
('KAP059', 'PENYALURAN PESANTREN TAHFIDZ', 'DTU008'),
('KAP061', 'PENYALURAN SUBSIDI PENDIDIKAN', 'DTU008'),
('KAP062', 'PENYALURAN DAKWAH', 'DTU008'),
('KAP063', 'PENYALURAN SOSIAL', 'DTU008'),
('KAP064', 'PENYALURAN EKONOMI', 'DTU008'),
('KAP065', 'TUNJANGAN INSENTIF PENGURUS YAYASAN', 'DTU008'),
('KAP066', 'OPERASIONAL UNIT USAHA', 'DTU008'),
('KAP067', 'GAJI GURU DAN KARYAWAN', 'DTU008'),
('KAP068', 'PENYALURAN SARPRAS', 'DTU008'),
('KAP069', 'PENGEMBANGAN SDM', 'DTU008'),
('KAP071', 'ANGSURAN ', 'DTU008'),
('KAP072', 'KONSUMSI RAPAT', 'DTU008'),
('KAP073', 'TRANSPORT ', 'DTU008'),
('KAP074', 'PROGRAM KHUSUS', 'DTU008'),
('KAP075', 'INFAQ ANGGOTA (SMP INTEGRAL)', 'DTU004'),
('KAP076', 'SISA SALDO (SMP INTEGRAL)', 'DTU004'),
('KAP077', 'INFAQ ANGGOTA (SD INTEGRAL)', 'DTU003'),
('KAP078', 'SISA SALDO (SD INTEGRAL)', 'DTU003'),
('KAP079', 'INFAQ ANGGOTA (KB - TK)', 'DTU001'),
('KAP080', 'SISA SALDO (KB - TK)', 'DTU001'),
('KAP081', 'INFAQ ANGGOTA (KB - INTEGRAL)', 'DTU002'),
('KAP082', 'SISA SALDO (KB - INTEGRAL)', 'DTU002'),
('KAP083', 'INFAQ ANGGOTA (DH)', 'DTU005'),
('KAP084', 'SISA SALDO (DH)', 'DTU005'),
('KAP086', 'INFAQ ANGGOTA (MITRA ZAKAT)', 'DTU006'),
('KAP087', 'SISA SALDO (MITRA ZAKAT)', 'DTU006');

-- --------------------------------------------------------

--
-- Table structure for table `db_pp`
--

CREATE TABLE `db_pp` (
  `id_pp` int(25) NOT NULL,
  `kd_pp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_pp`
--

INSERT INTO `db_pp` (`id_pp`, `kd_pp`) VALUES
(1, 'Pemasukan'),
(2, 'Pengeluaran');

-- --------------------------------------------------------

--
-- Table structure for table `db_status`
--

CREATE TABLE `db_status` (
  `id_status` int(25) NOT NULL,
  `nama_status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_status`
--

INSERT INTO `db_status` (`id_status`, `nama_status`) VALUES
(1, 'Menunggu'),
(2, 'Terkonfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `db_subtotal`
--

CREATE TABLE `db_subtotal` (
  `id_subtotal` varchar(25) NOT NULL,
  `id_data_input` varchar(25) DEFAULT NULL,
  `jumlah_subtotal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_transfer`
--

CREATE TABLE `db_transfer` (
  `id_transfer` varchar(25) NOT NULL,
  `id_usaha` varchar(25) DEFAULT NULL,
  `id_bulan` int(25) DEFAULT NULL,
  `id_status` int(25) DEFAULT NULL,
  `id_bank` int(25) DEFAULT NULL,
  `nominal` int(50) DEFAULT NULL,
  `gambar` varchar(256) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_transfer`
--

INSERT INTO `db_transfer` (`id_transfer`, `id_usaha`, `id_bulan`, `id_status`, `id_bank`, `nominal`, `gambar`, `keterangan`) VALUES
('DT1001', 'DTU002', 3, 2, 1, 100000, '61c01e2c75c92.jpg', 'Bukti Transfer Maret'),
('DT1002', 'DTU006', 1, 2, 1, 25000, '61d29f293ed62.jpg', 'Setor Bulan Januari'),
('DT1003', 'DTU005', 1, 1, 1, 25000, '61d50021b7f68.jpg', 'Bukti Transfer Bulan 1');

-- --------------------------------------------------------

--
-- Table structure for table `db_usaha`
--

CREATE TABLE `db_usaha` (
  `id_usaha` varchar(25) NOT NULL,
  `kd_nama_usaha` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_usaha`
--

INSERT INTO `db_usaha` (`id_usaha`, `kd_nama_usaha`) VALUES
('DTU001', 'KB - TK Al - Ihsan'),
('DTU002', 'KB Integral'),
('DTU003', 'SD Integral'),
('DTU004', 'SMP Integral'),
('DTU005', 'Pesantren Tahfidz DH'),
('DTU006', 'Mitra Zakat'),
('DTU007', 'Mitra BMH'),
('DTU008', 'Yayasan Al - Ihsan');

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
  `id_user` varchar(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(256) NOT NULL,
  `akses` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`id_user`, `nama`, `tgl_lahir`, `alamat`, `username`, `password`, `akses`) VALUES
('US001', 'Musleh', '2021-09-01', 'Jl. Porong No.20, Sumber ', 'musleh', '$2y$10$PHp1Gk1Z4iLeagymaQF33.89JKHA.55jqzY1nVDRFcvcJIJLATpYa', 1),
('US002', 'Mislahi Homsatun', '1988-04-24', 'Jl. Porong No.20, Sumber ', 'admintk', '$2y$10$5XQluyGdZ4Ut7AJFH9fUXOVRTczk9hNYD95NOpfZBW6Flh31331kO', 2),
('US003', 'KB Integral', '2021-09-12', 'Jl. Porong No.20, Sumber ', 'adminkb', '$2y$10$kS7if.YTCfiPwQmIQ.OPgOT/IkM95vm3BaCge4UL5llklFBnfZjDy', 3),
('US004', 'SD Integral', '2021-09-12', 'Jl. Porong No.20, Sumber ', 'adminsd', '$2y$10$CLovFXWxtMQ81q.cQTvUzeI/F9thHGgEOGPNuAuKp6XXUaxFme5qq', 4),
('US005', 'SMP Intergal', '2021-09-12', 'Jl. Porong No.20, Sumber ', 'adminsmp', '$2y$10$sfONNkqsA.wJ.Ax.hTJAu.Gp1QwqlE85RyXu5BpYawclihfbS32bi', 5),
('US006', 'Pesantren Tahfidz DH', '2002-08-07', 'Jl. Porong No.20, Sumber ', 'dh7', '$2y$10$B4WfErs0WDY1IzuUOqZyb.daCcvGvCFbu15UwpXijISchvxtePzNm', 6),
('US007', 'Mitra Zakat', '2021-09-12', 'Jl. Porong No.20, Sumber ', 'adminmz', '$2y$10$/MaVGBGxMa6LNTd1p7Qf1.JSwPhOZV0JRgRCXh05z9D3mWW7K.us2', 7),
('US008', 'Mitra BMH', '2021-09-12', 'Jl. Porong No.20, Sumber ', 'adminbmh', '$2y$10$DfwB/pzyPGZdYGHxDpw0Hu/4yND1U8YXuHz9EimgHJV3w63nq9ADe', 8);

-- --------------------------------------------------------

--
-- Table structure for table `db_validasi`
--

CREATE TABLE `db_validasi` (
  `id_validasi` varchar(25) NOT NULL,
  `id_usaha` varchar(25) DEFAULT NULL,
  `sub_total` int(50) DEFAULT NULL,
  `anggaran` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_validasi`
--

INSERT INTO `db_validasi` (`id_validasi`, `id_usaha`, `sub_total`, `anggaran`) VALUES
('VAH001', 'DTU007', 0, 0),
('VAK001', 'DTU002', 75000, 75000),
('VAL001', 'DTU003', 50000, 50000),
('VAM001', 'DTU004', 25000, 25000),
('VAN001', 'DTU008', 350000, NULL),
('VAP001', 'DTU005', 100000, 100000),
('VAT001', 'DTU001', 75000, 75000),
('VAZ001', 'DTU006', 100000, 100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_akses`
--
ALTER TABLE `db_akses`
  ADD PRIMARY KEY (`akses`);

--
-- Indexes for table `db_bank`
--
ALTER TABLE `db_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `db_bulan`
--
ALTER TABLE `db_bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indexes for table `db_data_input`
--
ALTER TABLE `db_data_input`
  ADD PRIMARY KEY (`id_data_input`),
  ADD KEY `id_data_usaha` (`id_usaha`),
  ADD KEY `id_data_kategori` (`id_kategori`),
  ADD KEY `id_data_bulan` (`id_bulan`),
  ADD KEY `id_data_pp` (`id_pp`);

--
-- Indexes for table `db_data_output`
--
ALTER TABLE `db_data_output`
  ADD PRIMARY KEY (`id_data_output`),
  ADD KEY `kd_usaha` (`id_usaha`),
  ADD KEY `kd_pp` (`id_pp`),
  ADD KEY `kd_bulan` (`id_bulan`),
  ADD KEY `kd_KP` (`id_kategori`);

--
-- Indexes for table `db_kategori`
--
ALTER TABLE `db_kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `id_usaha_kategori` (`id_usaha`);

--
-- Indexes for table `db_kategori_pengeluaran`
--
ALTER TABLE `db_kategori_pengeluaran`
  ADD PRIMARY KEY (`id_kategori`),
  ADD KEY `kd_usaha_kategori` (`id_usaha`);

--
-- Indexes for table `db_pp`
--
ALTER TABLE `db_pp`
  ADD PRIMARY KEY (`id_pp`);

--
-- Indexes for table `db_status`
--
ALTER TABLE `db_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `db_subtotal`
--
ALTER TABLE `db_subtotal`
  ADD PRIMARY KEY (`id_subtotal`);

--
-- Indexes for table `db_transfer`
--
ALTER TABLE `db_transfer`
  ADD PRIMARY KEY (`id_transfer`),
  ADD KEY `db_usaha_tranfers` (`id_usaha`),
  ADD KEY `kd_bulan_transfer` (`id_bulan`),
  ADD KEY `kd_status_transfer` (`id_status`),
  ADD KEY `kd_bank` (`id_bank`);

--
-- Indexes for table `db_usaha`
--
ALTER TABLE `db_usaha`
  ADD PRIMARY KEY (`id_usaha`);

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `kd_akses` (`akses`);

--
-- Indexes for table `db_validasi`
--
ALTER TABLE `db_validasi`
  ADD PRIMARY KEY (`id_validasi`),
  ADD UNIQUE KEY `id_usaha` (`id_usaha`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_bank`
--
ALTER TABLE `db_bank`
  MODIFY `id_bank` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_bulan`
--
ALTER TABLE `db_bulan`
  MODIFY `id_bulan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `db_pp`
--
ALTER TABLE `db_pp`
  MODIFY `id_pp` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `db_data_input`
--
ALTER TABLE `db_data_input`
  ADD CONSTRAINT `id_data_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `db_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_data_pp` FOREIGN KEY (`id_pp`) REFERENCES `db_pp` (`id_pp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_data_usaha` FOREIGN KEY (`id_usaha`) REFERENCES `db_usaha` (`id_usaha`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_data_output`
--
ALTER TABLE `db_data_output`
  ADD CONSTRAINT `kd_KP` FOREIGN KEY (`id_kategori`) REFERENCES `db_kategori_pengeluaran` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kd_bulan` FOREIGN KEY (`id_bulan`) REFERENCES `db_bulan` (`id_bulan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kd_pp` FOREIGN KEY (`id_pp`) REFERENCES `db_pp` (`id_pp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kd_usaha` FOREIGN KEY (`id_usaha`) REFERENCES `db_usaha` (`id_usaha`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_kategori`
--
ALTER TABLE `db_kategori`
  ADD CONSTRAINT `id_usaha_kategori` FOREIGN KEY (`id_usaha`) REFERENCES `db_usaha` (`id_usaha`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_kategori_pengeluaran`
--
ALTER TABLE `db_kategori_pengeluaran`
  ADD CONSTRAINT `kd_usaha_kategori` FOREIGN KEY (`id_usaha`) REFERENCES `db_usaha` (`id_usaha`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_transfer`
--
ALTER TABLE `db_transfer`
  ADD CONSTRAINT `db_usaha_tranfers` FOREIGN KEY (`id_usaha`) REFERENCES `db_usaha` (`id_usaha`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kd_bank` FOREIGN KEY (`id_bank`) REFERENCES `db_bank` (`id_bank`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kd_bulan_transfer` FOREIGN KEY (`id_bulan`) REFERENCES `db_bulan` (`id_bulan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kd_status_transfer` FOREIGN KEY (`id_status`) REFERENCES `db_status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_user`
--
ALTER TABLE `db_user`
  ADD CONSTRAINT `kd_akses` FOREIGN KEY (`akses`) REFERENCES `db_akses` (`akses`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `db_validasi`
--
ALTER TABLE `db_validasi`
  ADD CONSTRAINT `kd_usaha_validasi` FOREIGN KEY (`id_usaha`) REFERENCES `db_usaha` (`id_usaha`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
