-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2025 at 07:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angkatan1_porto`
--

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(3) NOT NULL,
  `photo` varchar(60) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `photo`, `nama`, `jabatan`, `deskripsi`, `status`) VALUES
(1, '67c91873c33d3_download__1_-removebg-preview.png', 'wowo', 'Ketua Partai', '\"Halo, nama saya wowo. Saya sangat senang dapat memperkenalkan diri. Saya memiliki minat yang besar dalam makan bergizi gratis dan selalu berusaha untuk belajar serta berkembang dalam setiap kesempatan. Saya berharap bisa berbagi pengalaman dan bertumbuh bersama di sini.\"	 \r\n  ', 1),
(13, '67c91eaf7dfc2_Gibran-Rakabuming.webp', 'MULYONO JUNIOR', 'Wakil KELUARGA', ' \"Halo, nama saya fufufafa. Saya sangat senang dapat\r\n                memperkenalkan diri. Saya memiliki minat yang besar dalam mengkonsumsi asaq, dan selalu berusaha untuk belajar serta\r\n                berkembang dalam setiap kesempatan. Saya berharap bisa berbagi\r\n                pengalaman dan bertumbuh bersama di sini.\"  ', 0),
(14, '67c946649e34f_20190808RAD35-scaled.jpg', 'MEGACAN', 'Ketua Bumi', 'Hayo!!! Jangan macam macam sama saya', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
