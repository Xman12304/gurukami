-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2018 at 01:21 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gurukami`
--

-- --------------------------------------------------------

--
-- Table structure for table `signup2`
--

CREATE TABLE `signup2` (
  `email` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `nomortlp` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `pelajaran` varchar(30) NOT NULL,
  `biaya` varchar(30) NOT NULL,
  `pendter` varchar(20) NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `photo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup2`
--

INSERT INTO `signup2` (`email`, `pass`, `nama`, `alamat`, `nomortlp`, `gender`, `pelajaran`, `biaya`, `pendter`, `lokasi`, `photo`) VALUES
('fauzan@mail.com', 'fauzannazi', 'fauzan hadi', 'kunciran', '089628621602', 'pria', 'B.Inggris', '850.000', 'S1', 'Jakarta', 'images/Penguins.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signup2`
--
ALTER TABLE `signup2`
  ADD PRIMARY KEY (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
