-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2024 at 03:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `ID_ADMIN` int(11) NOT NULL,
  `NAMA_ADMIN` varchar(150) NOT NULL,
  `EMAIL_ADMIN` varchar(150) NOT NULL,
  `USERNAME` varchar(150) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kehadiran`
--

CREATE TABLE `tb_kehadiran` (
  `ID_KEHADIRAN` int(11) NOT NULL,
  `ID_MAHASISWA` int(11) NOT NULL,
  `TANGGAL` date NOT NULL,
  `ID_KODE_KEHADIRAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kode_kehadiran`
--

CREATE TABLE `tb_kode_kehadiran` (
  `ID_KODE_KEHADIRAN` int(11) NOT NULL,
  `KODE_KEHADIRAN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_logbook`
--

CREATE TABLE `tb_logbook` (
  `ID_LOGBOOK` int(11) NOT NULL,
  `ID_MAHASISWA` int(11) NOT NULL,
  `TANGGAL` date NOT NULL,
  `KEGIATAN` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi_penempatan`
--

CREATE TABLE `tb_lokasi_penempatan` (
  `ID_LOKASI` int(11) NOT NULL,
  `NAMA_LOKASI` varchar(250) NOT NULL,
  `ALAMAT_LOKASI` varchar(350) NOT NULL,
  `KUOTA` int(11) NOT NULL,
  `KUOTA_TERISI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `ID_MAHASISWA` int(11) NOT NULL,
  `USERNAME` varchar(30) DEFAULT NULL,
  `PASSWORD` varchar(30) DEFAULT NULL,
  `ID_LOKASI` int(11) NOT NULL,
  `NAMA_MAHASISWA` varchar(150) NOT NULL,
  `NIS` varchar(30) NOT NULL,
  `ALAMAT_MAHASISWA` varchar(200) NOT NULL,
  `NO_TELP` varchar(15) NOT NULL,
  `ID_SEKOLAH_PT` int(150) NOT NULL,
  `JURUSAN` varchar(150) NOT NULL,
  `DOSEN_GURU_PEMBIMBING` varchar(100) DEFAULT NULL,
  `KONTAK_PEMBIMBING` varchar(17) DEFAULT NULL,
  `MULAI_MAGANG` date DEFAULT NULL,
  `SELESAI_MAGANG` date DEFAULT NULL,
  `ID_STATUS` int(200) NOT NULL,
  `ID_NILAI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `tb_mahasiswa`
--
DELIMITER $$
CREATE TRIGGER `after_delete_mahasiswa` AFTER DELETE ON `tb_mahasiswa` FOR EACH ROW BEGIN
	UPDATE tb_lokasi_penempatan
    SET KUOTA_TERISI = KUOTA_TERISI - 1
    WHERE ID_LOKASI = OLD.ID_LOKASI;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kurangi_kuota_terisi` AFTER UPDATE ON `tb_mahasiswa` FOR EACH ROW IF OLD.`ID_STATUS` <> NEW.`ID_STATUS` THEN
	IF NEW.`ID_STATUS` != 1 THEN
        UPDATE `tb_lokasi_penempatan`
        SET `KUOTA_TERISI` = `KUOTA_TERISI` - 1
		WHERE `ID_LOKASI` = NEW.`ID_LOKASI`;
	END IF;
END IF
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_kuota_Terisi` AFTER INSERT ON `tb_mahasiswa` FOR EACH ROW UPDATE `tb_lokasi_penempatan` 
SET `KUOTA_TERISI` = `KUOTA_TERISI` + 1 
WHERE `ID_LOKASI` = NEW.`ID_LOKASI`
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `ID_NILAI` int(11) NOT NULL,
  `NILAI` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `ID_PENDIDIKAN` int(11) NOT NULL,
  `TINGKAT_PENDIDIKAN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sekolah_pt`
--

CREATE TABLE `tb_sekolah_pt` (
  `ID_SEKOLAH_PT` int(11) NOT NULL,
  `NAMA_SEKOLAH_PT` varchar(225) NOT NULL,
  `ID_PENDIDIKAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `ID_STATUS` int(11) NOT NULL,
  `STATUS` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indexes for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  ADD PRIMARY KEY (`ID_KEHADIRAN`),
  ADD KEY `ID_KODE_KEHADIRAN` (`ID_KODE_KEHADIRAN`),
  ADD KEY `ID_MAHASISWA` (`ID_MAHASISWA`);

--
-- Indexes for table `tb_kode_kehadiran`
--
ALTER TABLE `tb_kode_kehadiran`
  ADD PRIMARY KEY (`ID_KODE_KEHADIRAN`);

--
-- Indexes for table `tb_logbook`
--
ALTER TABLE `tb_logbook`
  ADD PRIMARY KEY (`ID_LOGBOOK`),
  ADD KEY `ID_MAHASISWA` (`ID_MAHASISWA`);

--
-- Indexes for table `tb_lokasi_penempatan`
--
ALTER TABLE `tb_lokasi_penempatan`
  ADD PRIMARY KEY (`ID_LOKASI`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`ID_MAHASISWA`),
  ADD KEY `ID_LOKASI` (`ID_LOKASI`),
  ADD KEY `ID_STATUS` (`ID_STATUS`),
  ADD KEY `NILAI` (`ID_NILAI`),
  ADD KEY `ID_NILAI` (`ID_NILAI`),
  ADD KEY `ID_SEKOLAH_PT` (`ID_SEKOLAH_PT`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`ID_NILAI`);

--
-- Indexes for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`ID_PENDIDIKAN`);

--
-- Indexes for table `tb_sekolah_pt`
--
ALTER TABLE `tb_sekolah_pt`
  ADD PRIMARY KEY (`ID_SEKOLAH_PT`),
  ADD KEY `ID_PENDIDIKAN` (`ID_PENDIDIKAN`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`ID_STATUS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  MODIFY `ID_KEHADIRAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kode_kehadiran`
--
ALTER TABLE `tb_kode_kehadiran`
  MODIFY `ID_KODE_KEHADIRAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_logbook`
--
ALTER TABLE `tb_logbook`
  MODIFY `ID_LOGBOOK` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_lokasi_penempatan`
--
ALTER TABLE `tb_lokasi_penempatan`
  MODIFY `ID_LOKASI` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `ID_MAHASISWA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `ID_NILAI` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `ID_PENDIDIKAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_sekolah_pt`
--
ALTER TABLE `tb_sekolah_pt`
  MODIFY `ID_SEKOLAH_PT` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `ID_STATUS` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kehadiran`
--
ALTER TABLE `tb_kehadiran`
  ADD CONSTRAINT `tb_kehadiran_ibfk_2` FOREIGN KEY (`ID_KODE_KEHADIRAN`) REFERENCES `tb_kode_kehadiran` (`ID_KODE_KEHADIRAN`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_kehadiran_ibfk_3` FOREIGN KEY (`ID_MAHASISWA`) REFERENCES `tb_mahasiswa` (`ID_MAHASISWA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_logbook`
--
ALTER TABLE `tb_logbook`
  ADD CONSTRAINT `tb_logbook_ibfk_1` FOREIGN KEY (`ID_MAHASISWA`) REFERENCES `tb_mahasiswa` (`ID_MAHASISWA`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD CONSTRAINT `tb_mahasiswa_ibfk_1` FOREIGN KEY (`ID_LOKASI`) REFERENCES `tb_lokasi_penempatan` (`ID_LOKASI`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_mahasiswa_ibfk_2` FOREIGN KEY (`ID_STATUS`) REFERENCES `tb_status` (`ID_STATUS`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_mahasiswa_ibfk_4` FOREIGN KEY (`ID_NILAI`) REFERENCES `tb_nilai` (`ID_NILAI`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_mahasiswa_ibfk_5` FOREIGN KEY (`ID_SEKOLAH_PT`) REFERENCES `tb_sekolah_pt` (`ID_SEKOLAH_PT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_sekolah_pt`
--
ALTER TABLE `tb_sekolah_pt`
  ADD CONSTRAINT `tb_sekolah_pt_ibfk_1` FOREIGN KEY (`ID_PENDIDIKAN`) REFERENCES `tb_pendidikan` (`ID_PENDIDIKAN`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
