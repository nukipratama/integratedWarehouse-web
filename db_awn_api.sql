-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 15, 2019 at 02:26 PM
-- Server version: 8.0.17-0ubuntu2
-- PHP Version: 7.3.8-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_awn_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `no` int(100) NOT NULL,
  `barang_id` varchar(255) NOT NULL,
  `barang_name` varchar(191) NOT NULL,
  `barang_desc` varchar(191) NOT NULL,
  `barang_cat` varchar(191) NOT NULL,
  `barang_price` int(20) NOT NULL,
  `barang_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`no`, `barang_id`, `barang_name`, `barang_desc`, `barang_cat`, `barang_price`, `barang_img`) VALUES
(1, '83mxf1573396962169', 'Indomie Goreng', 'Mi Instan Favorit anak kos', 'Instant', 50000, 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png'),
(2, 'QmxRE1573397234863', 'Indomie Rebus', 'Mi Instan Favorit anak kos', 'Instant', 47000, 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png'),
(3, 'pBI2r1573734016477', 'Malkist Abon', 'Mi Instan Favorit anak kos', 'Instant', 50000, 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_history`
--

CREATE TABLE `tb_history` (
  `no` int(100) NOT NULL,
  `history_transactionId` varchar(255) NOT NULL,
  `history_barangObject` varchar(255) NOT NULL,
  `history_totalPrice` int(255) NOT NULL,
  `history_date` timestamp NOT NULL,
  `history_outletId` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `no` int(100) NOT NULL,
  `outlet_id` varchar(255) NOT NULL,
  `outlet_role` varchar(191) NOT NULL,
  `outlet_name` varchar(255) NOT NULL,
  `outlet_desc` varchar(255) NOT NULL,
  `outlet_address` varchar(255) NOT NULL,
  `outlet_joindate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_outlet`
--

INSERT INTO `tb_outlet` (`no`, `outlet_id`, `outlet_role`, `outlet_name`, `outlet_desc`, `outlet_address`) VALUES
(1, 'asdfghjkl', 'warehouse', 'Gudang Pusat', 'Ini adalah deskripsi singkat tentang gudang pusat', 'Bandung'),
(2, 'gEmquOybu1gD0D1sL2DT1573397130053', 'store', 'Alfamart Sukabirus', 'Alfamart tempat anak tel-u narik atm bca', 'Sukabirus'),
(3, 'Boj0aBsuLz7iOjg3sYs91573734058799', 'store', 'Barokah Mart', 'Barokah Mart POS', 'Telyu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_request`
--

CREATE TABLE `tb_request` (
  `no` int(100) NOT NULL,
  `req_id` varchar(255) NOT NULL,
  `req_outletID` varchar(255) NOT NULL,
  `req_barangID` varchar(255) NOT NULL,
  `req_barangQty` int(191) NOT NULL,
  `req_date` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_stock`
--

CREATE TABLE `tb_stock` (
  `no` int(100) NOT NULL,
  `stock_outletID` varchar(255) NOT NULL,
  `stock_barangID` varchar(255) NOT NULL,
  `stock_barangQty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `no` int(100) NOT NULL,
  `users_Uname` varchar(255) NOT NULL,
  `users_pass` varchar(191) NOT NULL,
  `users_email` varchar(255) NOT NULL,
  `users_role` varchar(255) NOT NULL,
  `users_outletID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`no`, `users_Uname`, `users_pass`, `users_email`, `users_role`, `users_outletID`) VALUES
(30, 'nuki', 'nuki', 'nukipratamaa@gmail.com', 'Cashier', 'Boj0aBsuLz7iOjg3sYs91573734058799');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `barang_id` (`barang_id`);

--
-- Indexes for table `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `outlet_id` (`outlet_id`);

--
-- Indexes for table `tb_request`
--
ALTER TABLE `tb_request`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `req_id` (`req_id`);

--
-- Indexes for table `tb_stock`
--
ALTER TABLE `tb_stock`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`no`),
  ADD UNIQUE KEY `users_Uname` (`users_Uname`),
  ADD UNIQUE KEY `users_email` (`users_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_history`
--
ALTER TABLE `tb_history`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_request`
--
ALTER TABLE `tb_request`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_stock`
--
ALTER TABLE `tb_stock`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
