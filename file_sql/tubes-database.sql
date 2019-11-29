-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2019 at 04:15 PM
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
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `ASAM_BASA`
--

CREATE TABLE `ASAM_BASA` (
  `PH` float NOT NULL,
  `Keterangan_PH` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ASAM_BASA`
--

INSERT INTO `ASAM_BASA` (`PH`, `Keterangan_PH`) VALUES
(1, 'Strongly Acidic'),
(2, 'Strongly Acidic'),
(3, 'Strongly Acidic'),
(4, 'Weakly Acidic'),
(5, 'Weakly Acidic'),
(6, 'Weakly Acidic'),
(7, 'Netral'),
(8, 'Weakly Alkali'),
(9, 'Weakly Alkali'),
(10, 'Weakly Alkali'),
(11, 'Strongly Alkali'),
(12, 'Strongly Alkali'),
(13, 'Strongly Alkali'),
(14, 'Strongly Alkali');

-- --------------------------------------------------------

--
-- Table structure for table `LARUTAN`
--

CREATE TABLE `LARUTAN` (
  `ID_Larutan` int(11) NOT NULL,
  `Nama_Larutan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `LARUTAN`
--

INSERT INTO `LARUTAN` (`ID_Larutan`, `Nama_Larutan`) VALUES
(1, 'air asam kuat'),
(2, 'air asam lemah'),
(3, 'air netral'),
(4, 'air asam lemah'),
(5, 'air asam kuat');

-- --------------------------------------------------------

--
-- Table structure for table `RECORD_HISTORY`
--

CREATE TABLE `RECORD_HISTORY` (
  `ID_Record` int(11) NOT NULL,
  `ID_Larutan` int(11) DEFAULT NULL,
  `Nama_Larutan` varchar(20) DEFAULT NULL,
  `PH` float DEFAULT NULL,
  `Tanggal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RECORD_HISTORY`
--

INSERT INTO `RECORD_HISTORY` (`ID_Record`, `ID_Larutan`, `Nama_Larutan`, `PH`, `Tanggal`) VALUES
(7, 5, 'air basa kuat', 11, '2019-11-26 10:15:09'),
(8, 3, 'air netral', 7, '2019-11-26 10:15:18'),
(9, 1, 'air asam kuat', 2, '2019-11-26 10:51:52'),
(10, 2, 'air asam lemah', 6, '2019-11-26 10:53:46'),
(11, 4, 'air basa lemah', 9, '2019-11-26 10:54:03'),
(12, 1, 'air asam kuat', 2, '2019-11-28 11:20:17'),
(13, 5, 'air basa kuat', 12, '2019-11-26 12:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `TEXT_TAMPILAN`
--

CREATE TABLE `TEXT_TAMPILAN` (
  `PH` float NOT NULL,
  `Text_PH` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TEXT_TAMPILAN`
--

INSERT INTO `TEXT_TAMPILAN` (`PH`, `Text_PH`) VALUES
(1, 'air ini adalah air dengan kadar asam tinggi, tidak baik untuk diminum.'),
(2, 'air ini adalah air dengan kadar asam tinggi, tidak baik untuk diminum.'),
(3, 'air ini adalah air dengan kadar asam tinggi, tidak baik untuk diminum.'),
(4, 'air ini adalah air dengan kadar asam rendah, tidak baik untuk diminum.'),
(5, 'air ini adalah air dengan kadar asam rendah, tidak baik untuk diminum.'),
(6, 'air ini adalah air dengan kadar asam rendah, tidak baik untuk diminum.'),
(7, 'air ini adalah air netral, baik untuk diminum.'),
(8, 'air ini adalah air dengan kadar basa rendah,  baik untuk diminum.'),
(9, 'air ini adalah air dengan kadar basa rendah, baik untuk diminum.'),
(10, 'air ini adalah air dengan kadar basa rendah, baik untuk diminum.'),
(11, 'air ini adalah air dengan kadar basa tinggi, tidak baik untuk diminum.'),
(12, 'air ini adalah air dengan kadar basa tinggi, tidak baik untuk diminum.'),
(13, 'air ini adalah air dengan kadar basa tinggi, tidak baik untuk diminum.'),
(14, 'air ini adalah air dengan kadar basa tinggi, tidak baik untuk diminum.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ASAM_BASA`
--
ALTER TABLE `ASAM_BASA`
  ADD PRIMARY KEY (`PH`);

--
-- Indexes for table `LARUTAN`
--
ALTER TABLE `LARUTAN`
  ADD PRIMARY KEY (`ID_Larutan`);

--
-- Indexes for table `RECORD_HISTORY`
--
ALTER TABLE `RECORD_HISTORY`
  ADD PRIMARY KEY (`ID_Record`),
  ADD KEY `ID_Larutan` (`ID_Larutan`),
  ADD KEY `PH` (`PH`);

--
-- Indexes for table `TEXT_TAMPILAN`
--
ALTER TABLE `TEXT_TAMPILAN`
  ADD PRIMARY KEY (`PH`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `RECORD_HISTORY`
--
ALTER TABLE `RECORD_HISTORY`
  MODIFY `ID_Record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `RECORD_HISTORY`
--
ALTER TABLE `RECORD_HISTORY`
  ADD CONSTRAINT `record_history_ibfk_1` FOREIGN KEY (`ID_Larutan`) REFERENCES `LARUTAN` (`ID_Larutan`),
  ADD CONSTRAINT `record_history_ibfk_2` FOREIGN KEY (`PH`) REFERENCES `ASAM_BASA` (`PH`);

--
-- Constraints for table `TEXT_TAMPILAN`
--
ALTER TABLE `TEXT_TAMPILAN`
  ADD CONSTRAINT `text_tampilan_ibfk_1` FOREIGN KEY (`PH`) REFERENCES `ASAM_BASA` (`PH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
