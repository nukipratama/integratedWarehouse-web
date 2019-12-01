-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2019 at 04:57 AM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

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
  `barang_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_cat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_price` int(20) NOT NULL,
  `barang_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`no`, `barang_id`, `barang_name`, `barang_desc`, `barang_cat`, `barang_price`, `barang_img`) VALUES
(1, 'vP4BH1574961001683', 'Marlboro Merah', 'Marlboro merupakan merek rokok yang diproduksi oleh Philip Morris International, perusahaan rokok nomor satu dunia.', 'Rokok', 26000, '../upload/marlboro_merah.jpeg'),
(2, 'znLpG1574961096334', 'Camel Kuning', 'Camel Yellow juga merupakan bentuk penegasan atas lini klasik Camel yang menggunakan warna dasar kuning.', 'Rokok', 18000, '../upload/camel_yellow.jpg'),
(3, 'EaKtO1575165399584', 'Beng Beng Reguler 22gr x 20pcs', 'Cream yang lezat, wafer yang lembut dan krispi dilapisi dengan karamel dan milk chocolate. Nikamti chocolate caramel bar favoritmu, Beng Beng the real taste.', 'Snack', 28000, '../upload/beng beng.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_history`
--

CREATE TABLE `tb_history` (
  `no` int(100) NOT NULL,
  `history_barangObject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `history_totalPrice` int(255) NOT NULL,
  `history_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `history_outletId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_history`
--

INSERT INTO `tb_history` (`no`, `history_barangObject`, `history_totalPrice`, `history_date`, `history_outletId`) VALUES
(1, '[{\"id\":\"znLpG1574961096334\",\"qty\":\"1\"},{\"id\":\"vP4BH1574961001683\",\"qty\":\"1\"}]', 44000, '2019-11-28 17:13:00', 'hHAXx4Ii0d64w3yFmCi31574953245893'),
(2, '[{\"id\":\"vP4BH1574961001683\",\"qty\":\"3\"}]', 78000, '2019-11-28 21:04:46', 'Boj0aBsuLz7iOjg3sYs91573734058799'),
(3, '[{\"id\":\"vP4BH1574961001683\",\"qty\":\"1\"},{\"id\":\"znLpG1574961096334\",\"qty\":\"4\"}]', 98000, '2019-11-28 21:13:48', 'Boj0aBsuLz7iOjg3sYs91573734058799'),
(4, '[{\"id\":\"znLpG1574961096334\",\"qty\":\"3\"}]', 54000, '2019-11-29 04:39:53', 'Boj0aBsuLz7iOjg3sYs91573734058799'),
(5, '[{\"id\":\"znLpG1574961096334\",\"qty\":\"20\"},{\"id\":\"vP4BH1574961001683\",\"qty\":\"30\"}]', 1140000, '2019-11-29 04:40:46', 'hHAXx4Ii0d64w3yFmCi31574953245893'),
(6, '[{\"id\":\"znLpG1574961096334\",\"qty\":\"2\"},{\"id\":\"vP4BH1574961001683\",\"qty\":\"5\"}]', 166000, '2019-11-29 20:10:53', 'Boj0aBsuLz7iOjg3sYs91573734058799');

-- --------------------------------------------------------

--
-- Table structure for table `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `no` int(100) NOT NULL,
  `outlet_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outlet_role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outlet_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outlet_desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outlet_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outlet_joindate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_outlet`
--

INSERT INTO `tb_outlet` (`no`, `outlet_id`, `outlet_role`, `outlet_name`, `outlet_desc`, `outlet_address`, `outlet_joindate`) VALUES
(1, 'warehouse', 'warehouse', 'Gudang AWN', 'This outlet_id is reserved..', 'Telkom University', '2019-11-28 01:57:15'),
(2, 'Boj0aBsuLz7iOjg3sYs91573734058799', 'store', 'Barokah Mart', 'Barokah Mart Point of Sale', 'Sukapura', '2019-11-28 01:58:07'),
(3, 'hHAXx4Ii0d64w3yFmCi31574953245893', 'store', 'Indoapril', 'This is just a dummy data..', 'Sukapura', '2019-11-28 15:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `tb_request`
--

CREATE TABLE `tb_request` (
  `no` int(100) NOT NULL,
  `req_outletID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `req_barangID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `req_barangQty` int(191) NOT NULL,
  `req_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `req_status` int(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_request`
--

INSERT INTO `tb_request` (`no`, `req_outletID`, `req_barangID`, `req_barangQty`, `req_date`, `req_status`) VALUES
(1, 'hHAXx4Ii0d64w3yFmCi31574953245893', 'vP4BH1574961001683', 100, '2019-11-28 17:12:12', 1),
(2, 'hHAXx4Ii0d64w3yFmCi31574953245893', 'znLpG1574961096334', 50, '2019-11-28 17:12:25', 1),
(3, 'Boj0aBsuLz7iOjg3sYs91573734058799', 'vP4BH1574961001683', 5, '2019-11-28 21:03:43', 1),
(4, 'Boj0aBsuLz7iOjg3sYs91573734058799', 'znLpG1574961096334', 10, '2019-11-28 21:12:37', 1),
(5, 'hHAXx4Ii0d64w3yFmCi31574953245893', 'znLpG1574961096334', 40, '2019-11-29 04:48:20', 0),
(6, 'Boj0aBsuLz7iOjg3sYs91573734058799', 'znLpG1574961096334', 100, '2019-11-29 20:07:45', 0),
(7, 'Boj0aBsuLz7iOjg3sYs91573734058799', 'vP4BH1574961001683', 100, '2019-11-29 20:08:24', 0),
(8, 'Boj0aBsuLz7iOjg3sYs91573734058799', 'vP4BH1574961001683', 50, '2019-11-29 20:08:32', 1),
(9, 'Boj0aBsuLz7iOjg3sYs91573734058799', 'znLpG1574961096334', 50, '2019-11-29 20:08:38', 1),
(10, 'Boj0aBsuLz7iOjg3sYs91573734058799', 'EaKtO1575165399584', 100, '2019-12-01 01:57:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_stock`
--

CREATE TABLE `tb_stock` (
  `no` int(100) NOT NULL,
  `stock_outletID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_barangID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_barangQty` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_stock`
--

INSERT INTO `tb_stock` (`no`, `stock_outletID`, `stock_barangID`, `stock_barangQty`) VALUES
(1, 'hHAXx4Ii0d64w3yFmCi31574953245893', 'vP4BH1574961001683', 69),
(2, 'hHAXx4Ii0d64w3yFmCi31574953245893', 'znLpG1574961096334', 29),
(3, 'Boj0aBsuLz7iOjg3sYs91573734058799', 'vP4BH1574961001683', 46),
(4, 'Boj0aBsuLz7iOjg3sYs91573734058799', 'znLpG1574961096334', 51),
(5, 'Boj0aBsuLz7iOjg3sYs91573734058799', 'EaKtO1575165399584', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `no` int(100) NOT NULL,
  `users_Uname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_pass` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_outletID` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`no`, `users_Uname`, `users_pass`, `users_email`, `users_role`, `users_outletID`) VALUES
(1, 'barokah', 'barokah', 'admin@barokah.mart', 'Cashier', 'Boj0aBsuLz7iOjg3sYs91573734058799'),
(2, 'warehouse', 'warehouse', 'admin@awnwarehouse.com', 'Logistic', 'warehouse'),
(3, 'dev', 'devdevdev', 'dev@awn.dev', 'Developer', 'warehouse'),
(4, 'indoapril', 'indoapril', 'hello@indoapril.com', 'Cashier', 'hHAXx4Ii0d64w3yFmCi31574953245893');

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
  ADD PRIMARY KEY (`no`);

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
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_request`
--
ALTER TABLE `tb_request`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_stock`
--
ALTER TABLE `tb_stock`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
