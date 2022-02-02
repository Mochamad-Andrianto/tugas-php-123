-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2022 at 05:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dt_guru`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_alumni`
--

CREATE TABLE `db_alumni` (
  `id_al` int(10) NOT NULL,
  `nm_al` varchar(20) NOT NULL,
  `desk_al` text NOT NULL,
  `foto_al` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_alumni`
--

INSERT INTO `db_alumni` (`id_al`, `nm_al`, `desk_al`, `foto_al`) VALUES
(7, 'MOCHAMAD ANDRIANTO', 'Alumni SMA YAYASAN PANDAAN yang sekarang telah bekerja sebagai Pramugara di salah satu maskapai swasta Di indonesia sejak Tahun 2020', 'foto-1640779360.png'),
(8, 'MOCHAMAD ANDRIANTO', 'Alumni SMA YAYASAN PANDAAN yang sekarang telah bekerja sebagai Pramugara di salah satu maskapai negeri Di indonesia yaitu PT. GARUDA INDONESIA Persero sejak Tahun 2020', 'foto-1640779529.png');

-- --------------------------------------------------------

--
-- Table structure for table `db_guru`
--

CREATE TABLE `db_guru` (
  `id_gr` int(10) NOT NULL,
  `nm_gr` varchar(50) NOT NULL,
  `jb_gr` varchar(20) NOT NULL,
  `mp_gr` varchar(10) NOT NULL,
  `kls_gr` varchar(20) NOT NULL,
  `foto_gr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_guru`
--

INSERT INTO `db_guru` (`id_gr`, `nm_gr`, `jb_gr`, `mp_gr`, `kls_gr`, `foto_gr`) VALUES
(1, 'MACHMUD HUDA,M.Pd', 'KEPALA SEKOLAH', '-', '-', 'foto-1640588473.jpg'),
(2, 'Drs. MAHFUT ', 'GURU', 'MATEMATIKA', 'XI, XII IPS', 'foto-1640589166.jpg'),
(3, 'ANDRIATI, S.Si', 'GURU', 'BIOLOGI', 'X, XI, XII IPA', 'foto-1640589324.jpg'),
(4, 'RINA SETYOWAHYUNI, S.Pd', 'GURU', 'FISIKA', 'X, XI, XII IPA & IPS', 'foto-1640589417.jpg'),
(5, 'RITA AFRIANI, S.Pd', 'GURU', 'PKN', 'X, XI, XII IPA & IPS', 'foto-1640589915.jpg'),
(6, 'SUBYANTORO,S.Pd', 'GURU', 'BP / BK ', '-', 'foto-1640590503.jpg'),
(7, 'AKHMADI,S.Pd', 'GURU', 'BIG', 'XI, XII IPA & IPS', 'foto-1640590567.jpg'),
(8, 'STEFFANUS ROPA, SE', 'GURU', 'PENJASKES', 'XII IPA & IPS', 'foto-1640590633.jpg'),
(9, 'HARMINTO, S.Pd', 'GURU', 'MATEMATIKA', 'XI, XII IPA ', 'foto-1640590697.jpg'),
(10, 'Dra. MULYANI DEWI', 'GURU', 'KIMIA', 'XII IPA', 'foto-1640590788.jpg'),
(11, 'SURYATI, S.Pd', 'GURU', 'MATEMATIKA', 'X, XI, XII IPA & IPS', 'foto-1640590893.jpg'),
(12, 'H. EDY SUTRISNO, S.Ag', 'GURU', 'BTQ', 'X, XI, XII IPA & IPS', 'foto-1640591482.jpg'),
(13, 'ANANG FACHRIZAL,S.Pd', 'GURU', 'SEJARAH', 'X IPA & IPS, XI IPA', 'foto-1640591578.jpg'),
(14, 'KHUSNUL KHOTIMAH,S.Pd', 'GURU', 'BIN', 'X, XII IPA & IPS', 'foto-1640591653.jpg'),
(15, 'Drs. H. AKH. ALI, M.Pd.I', 'GURU', 'PAI', 'X, XI, XII IPA & IPS', 'foto-1640741273.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `db_siswa`
--

CREATE TABLE `db_siswa` (
  `induk` int(10) NOT NULL,
  `nm_sw` varchar(20) NOT NULL,
  `jk_sw` varchar(10) NOT NULL,
  `jur_sw` varchar(5) NOT NULL,
  `kls_sw` varchar(10) NOT NULL,
  `th_sw` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_siswa`
--

INSERT INTO `db_siswa` (`induk`, `nm_sw`, `jk_sw`, `jur_sw`, `kls_sw`, `th_sw`) VALUES
(3997, 'ARIS DWI CAHYONO', 'LAKI-LAKI', 'MIA', 'XII', '2020'),
(3998, 'DENI SANDRA', 'LAKI-LAKI', 'MIA', 'XII', '2020'),
(3999, 'FIRGI PRAYOGA S.W', 'LAKI-LAKI', 'MIA', 'XII', '2020'),
(4000, 'IMELDA PRAMESTI Y.P', 'PEREMPUAN', 'MIA', 'XII', '2020'),
(4001, 'KHAMARUL YAMAN', 'LAKI-LAKI', 'MIA', 'XII', '2020'),
(4002, 'MOCHAMAD ANDRIANTO', 'LAKI-LAKI', 'MIA', 'XII', '2020'),
(4003, 'MARIA EVANGELINA S.A', 'PEREMPUAN', 'MIA', 'XII', '2020'),
(4004, 'MOH. HANDIKA', 'LAKI-LAKI', 'MIA', 'XII', '2020'),
(4005, 'NIKEN TUGAS WILUJENG', 'PEREMPUAN', 'MIA', 'XII', '2020'),
(4006, 'NOVA NOVERINA', 'PEREMPUAN', 'MIA', 'XII', '2020'),
(4007, 'WISMA HADI P.', 'PEREMPUAN', 'MIA', 'XII', '2020'),
(4008, 'ANISA MEGA SAPUTRI', 'PEREMPUAN', 'IIS', 'XII', '2020'),
(4009, 'GATHAN SYAH P.J', 'LAKI-LAKI', 'IIS', 'XII', '2020'),
(4010, 'MECHKELL ANDRE S.', 'LAKI-LAKI', 'IIS', 'XII', '2020'),
(4011, 'NADILLAH SYILVANY', 'PEREMPUAN', 'IIS', 'XII', '2020'),
(4012, 'RESYA MAULUDINA', 'PEREMPUAN', 'IIS', 'XII', '2020'),
(4013, 'ROCHMAD SALIM', 'LAKI-LAKI', 'IIS', 'XII', '2020'),
(4014, 'SISCA NATHANIA P.CH.', 'PEREMPUAN', 'IIS', 'XII', '2020'),
(4015, 'SITI RACHMAWATI', 'PEREMPUAN', 'IIS', 'XII', '2020'),
(4016, 'INDRAWATI', 'PEREMPUAN', 'IIS', 'XII', '2020'),
(4017, 'M. FERRY FERDIAN', 'LAKI-LAKI', 'IIS', 'XII', '2020'),
(4018, 'M. GALIH ADIN NUGROH', 'LAKI-LAKI', 'IIS', 'XII', '2020'),
(4019, 'SALSABIL AVINCA S.B', 'PEREMPUAN', 'IIS', 'XII', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `db_siswa1`
--

CREATE TABLE `db_siswa1` (
  `ket_sw` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_siswa1`
--

INSERT INTO `db_siswa1` (`ket_sw`) VALUES
('AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(11) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `password`, `nama`) VALUES
(1, 'chinthiawina@gmail.com', '123456', 'mochamad andrianto');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_alumni`
--
ALTER TABLE `db_alumni`
  ADD PRIMARY KEY (`id_al`);

--
-- Indexes for table `db_guru`
--
ALTER TABLE `db_guru`
  ADD PRIMARY KEY (`id_gr`);

--
-- Indexes for table `db_siswa`
--
ALTER TABLE `db_siswa`
  ADD PRIMARY KEY (`induk`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_alumni`
--
ALTER TABLE `db_alumni`
  MODIFY `id_al` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `db_guru`
--
ALTER TABLE `db_guru`
  MODIFY `id_gr` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `db_siswa`
--
ALTER TABLE `db_siswa`
  MODIFY `induk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4026;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
