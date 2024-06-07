-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2023 at 07:28 AM
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
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `no` int(11) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`no`, `id_barang`, `nama_barang`, `jumlah`, `satuan`, `status`) VALUES
(0, 'N0001', 'liptint', 100, 'pcs', 'Disetujui'),
(2, 'N0002', 'mascara', 500, 'pcs', 'Ditolak'),
(3, 'N003', 'eyeliner', 250, 'pcs', 'Dipending'),
(4, 'N0004', 'bedak padat', 150, 'box', 'Dipending');

-- --------------------------------------------------------

--
-- Table structure for table `barang_vendor`
--

CREATE TABLE `barang_vendor` (
  `no` int(11) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga` int(225) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_vendor`
--

INSERT INTO `barang_vendor` (`no`, `id_barang`, `nama_barang`, `jumlah`, `satuan`, `harga`, `status`) VALUES
(5, 'N0005', 'mosturiezer', 50, 'box', 1500000, 'Dibeli'),
(6, 'N0006', 'lipstick', 200, 'lusin', 3000000, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`id`, `username`, `password`, `role`) VALUES
(1, 'Carmelita', '123', 'manager pengadaan'),
(2, 'Felaria', '123', 'vendor'),
(3, 'Michelle', '123', 'manajer proyek');

-- --------------------------------------------------------

--
-- Table structure for table `rfq`
--

CREATE TABLE `rfq` (
  `no` int(11) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `deadline` date NOT NULL,
  `harga` int(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rfq`
--

INSERT INTO `rfq` (`no`, `id_barang`, `nama_barang`, `jumlah`, `satuan`, `deadline`, `harga`, `status`) VALUES
(1, 'N0001', 'liptint', 250, 'pcs', '2024-12-01', 2000000, 'Diterima'),
(9, 'N0009', 'blush on ', 30, 'lusin', '2024-12-01', 1200000, 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_vendor`
--
ALTER TABLE `barang_vendor`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rfq`
--
ALTER TABLE `rfq`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_vendor`
--
ALTER TABLE `barang_vendor`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_user`
--
ALTER TABLE `data_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rfq`
--
ALTER TABLE `rfq`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
