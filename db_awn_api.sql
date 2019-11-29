-- MySQL dump 10.13  Distrib 8.0.17, for Linux (x86_64)
--
-- Host: localhost    Database: db_awn_api
-- ------------------------------------------------------
-- Server version	8.0.17-0ubuntu2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_barang`
--

DROP TABLE IF EXISTS `tb_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_barang` (
  `no` int(100) NOT NULL AUTO_INCREMENT,
  `barang_id` varchar(255) NOT NULL,
  `barang_name` varchar(191) NOT NULL,
  `barang_desc` varchar(191) NOT NULL,
  `barang_cat` varchar(191) NOT NULL,
  `barang_price` int(20) NOT NULL,
  `barang_img` varchar(255) NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `barang_id` (`barang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_barang`
--

LOCK TABLES `tb_barang` WRITE;
/*!40000 ALTER TABLE `tb_barang` DISABLE KEYS */;
INSERT INTO `tb_barang` VALUES (1,'vP4BH1574961001683','Marlboro Merah','Marlboro merupakan merek rokok yang diproduksi oleh Philip Morris International, perusahaan rokok nomor satu dunia.','Rokok',26000,'../upload/marlboro_merah.jpeg'),(2,'znLpG1574961096334','Camel Kuning','Camel Yellow juga merupakan bentuk penegasan atas lini klasik Camel yang menggunakan warna dasar kuning.','Rokok',18000,'../upload/camel_yellow.jpg');
/*!40000 ALTER TABLE `tb_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_history`
--

DROP TABLE IF EXISTS `tb_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_history` (
  `no` int(100) NOT NULL AUTO_INCREMENT,
  `history_barangObject` varchar(255) NOT NULL,
  `history_totalPrice` int(255) NOT NULL,
  `history_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `history_outletId` varchar(255) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_history`
--

LOCK TABLES `tb_history` WRITE;
/*!40000 ALTER TABLE `tb_history` DISABLE KEYS */;
INSERT INTO `tb_history` VALUES (1,'[{\"id\":\"znLpG1574961096334\",\"qty\":\"1\"},{\"id\":\"vP4BH1574961001683\",\"qty\":\"1\"}]',44000,'2019-11-28 17:13:00','hHAXx4Ii0d64w3yFmCi31574953245893'),(2,'[{\"id\":\"vP4BH1574961001683\",\"qty\":\"3\"}]',78000,'2019-11-28 21:04:46','Boj0aBsuLz7iOjg3sYs91573734058799'),(3,'[{\"id\":\"vP4BH1574961001683\",\"qty\":\"1\"},{\"id\":\"znLpG1574961096334\",\"qty\":\"4\"}]',98000,'2019-11-28 21:13:48','Boj0aBsuLz7iOjg3sYs91573734058799'),(4,'[{\"id\":\"znLpG1574961096334\",\"qty\":\"3\"}]',54000,'2019-11-29 04:39:53','Boj0aBsuLz7iOjg3sYs91573734058799'),(5,'[{\"id\":\"znLpG1574961096334\",\"qty\":\"20\"},{\"id\":\"vP4BH1574961001683\",\"qty\":\"30\"}]',1140000,'2019-11-29 04:40:46','hHAXx4Ii0d64w3yFmCi31574953245893');
/*!40000 ALTER TABLE `tb_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_outlet`
--

DROP TABLE IF EXISTS `tb_outlet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_outlet` (
  `no` int(100) NOT NULL AUTO_INCREMENT,
  `outlet_id` varchar(255) NOT NULL,
  `outlet_role` varchar(191) NOT NULL,
  `outlet_name` varchar(255) NOT NULL,
  `outlet_desc` varchar(255) NOT NULL,
  `outlet_address` varchar(255) NOT NULL,
  `outlet_joindate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`no`),
  UNIQUE KEY `outlet_id` (`outlet_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_outlet`
--

LOCK TABLES `tb_outlet` WRITE;
/*!40000 ALTER TABLE `tb_outlet` DISABLE KEYS */;
INSERT INTO `tb_outlet` VALUES (1,'warehouse','warehouse','Gudang AWN','This outlet_id is reserved..','Telkom University','2019-11-28 01:57:15'),(2,'Boj0aBsuLz7iOjg3sYs91573734058799','store','Barokah Mart','Barokah Mart Point of Sale','Sukapura','2019-11-28 01:58:07'),(3,'hHAXx4Ii0d64w3yFmCi31574953245893','store','Indoapril','This is just a dummy data..','Sukapura','2019-11-28 15:00:45');
/*!40000 ALTER TABLE `tb_outlet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_request`
--

DROP TABLE IF EXISTS `tb_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_request` (
  `no` int(100) NOT NULL AUTO_INCREMENT,
  `req_outletID` varchar(255) NOT NULL,
  `req_barangID` varchar(255) NOT NULL,
  `req_barangQty` int(191) NOT NULL,
  `req_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `req_status` int(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_request`
--

LOCK TABLES `tb_request` WRITE;
/*!40000 ALTER TABLE `tb_request` DISABLE KEYS */;
INSERT INTO `tb_request` VALUES (1,'hHAXx4Ii0d64w3yFmCi31574953245893','vP4BH1574961001683',100,'2019-11-28 17:12:12',1),(2,'hHAXx4Ii0d64w3yFmCi31574953245893','znLpG1574961096334',50,'2019-11-28 17:12:25',1),(3,'Boj0aBsuLz7iOjg3sYs91573734058799','vP4BH1574961001683',5,'2019-11-28 21:03:43',1),(4,'Boj0aBsuLz7iOjg3sYs91573734058799','znLpG1574961096334',10,'2019-11-28 21:12:37',1),(5,'hHAXx4Ii0d64w3yFmCi31574953245893','znLpG1574961096334',40,'2019-11-29 04:48:20',0);
/*!40000 ALTER TABLE `tb_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_stock`
--

DROP TABLE IF EXISTS `tb_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_stock` (
  `no` int(100) NOT NULL AUTO_INCREMENT,
  `stock_outletID` varchar(255) NOT NULL,
  `stock_barangID` varchar(255) NOT NULL,
  `stock_barangQty` int(255) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_stock`
--

LOCK TABLES `tb_stock` WRITE;
/*!40000 ALTER TABLE `tb_stock` DISABLE KEYS */;
INSERT INTO `tb_stock` VALUES (1,'hHAXx4Ii0d64w3yFmCi31574953245893','vP4BH1574961001683',69),(2,'hHAXx4Ii0d64w3yFmCi31574953245893','znLpG1574961096334',29),(3,'Boj0aBsuLz7iOjg3sYs91573734058799','vP4BH1574961001683',1),(4,'Boj0aBsuLz7iOjg3sYs91573734058799','znLpG1574961096334',3);
/*!40000 ALTER TABLE `tb_stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_users`
--

DROP TABLE IF EXISTS `tb_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_users` (
  `no` int(100) NOT NULL AUTO_INCREMENT,
  `users_Uname` varchar(255) NOT NULL,
  `users_pass` varchar(191) NOT NULL,
  `users_email` varchar(255) NOT NULL,
  `users_role` varchar(255) NOT NULL,
  `users_outletID` varchar(255) NOT NULL,
  PRIMARY KEY (`no`),
  UNIQUE KEY `users_Uname` (`users_Uname`),
  UNIQUE KEY `users_email` (`users_email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_users`
--

LOCK TABLES `tb_users` WRITE;
/*!40000 ALTER TABLE `tb_users` DISABLE KEYS */;
INSERT INTO `tb_users` VALUES (1,'barokah','barokah','admin@barokah.mart','Cashier','Boj0aBsuLz7iOjg3sYs91573734058799'),(2,'warehouse','warehouse','admin@awnwarehouse.com','Logistic','warehouse'),(3,'dev','devdevdev','dev@awn.dev','Developer','warehouse'),(4,'indoapril','indoapril','hello@indoapril.com','Cashier','hHAXx4Ii0d64w3yFmCi31574953245893');
/*!40000 ALTER TABLE `tb_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-29 11:53:56
