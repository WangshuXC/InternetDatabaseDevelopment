CREATE DATABASE  IF NOT EXISTS `internetdatabasedevelopment` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `internetdatabasedevelopment`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: internetdatabasedevelopment
-- ------------------------------------------------------
-- Server version	8.0.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `AdminID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`AdminID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `articles` (
  `ArticleID` int NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `PublicationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ArticleID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'222','3','2023-12-19 14:18:30');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clicks`
--

DROP TABLE IF EXISTS `clicks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clicks` (
  `ClickID` int NOT NULL AUTO_INCREMENT,
  `ContentID` int NOT NULL,
  `ContentType` enum('Article','Video') NOT NULL,
  `ClickCount` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`ClickID`),
  UNIQUE KEY `ContentID_ContentType` (`ContentID`,`ContentType`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clicks`
--

LOCK TABLES `clicks` WRITE;
/*!40000 ALTER TABLE `clicks` DISABLE KEYS */;
/*!40000 ALTER TABLE `clicks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `CommentID` int NOT NULL AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `VideoID` int NOT NULL,
  `Comment` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `CommentDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`CommentID`) USING BTREE,
  KEY `UserID` (`UserID`) USING BTREE,
  KEY `VideoID` (`VideoID`) USING BTREE,
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`VideoID`) REFERENCES `videos` (`VideoID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`UserID`) USING BTREE,
  UNIQUE KEY `Username` (`Username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'1','1'),(2,'2','2'),(3,'3','3');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videos` (
  `VideoID` int NOT NULL AUTO_INCREMENT,
  `Title` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `PictureURL` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `UploadDate` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `VideoURL` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`VideoID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30006869 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (29579868,'CCTV-13新闻频道','多方反对日本强推核污染水排海 核污染水排放入海危害不容忽视','https://p3.img.cctvpic.com/fmspic/2023/07/04/be3a74657f674e5490a818be60fd257f-1.jpg','2023-07-04 15:36:01','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/04/be3a74657f674e5490a818be60fd257f_h2642000000nero_aac16-1.mp4'),(29584776,'CCTV-7国防军事频道','多方反对日本强推核污染水排海 日本民众集会反对核污染水排海','https://p5.img.cctvpic.com/fmspic/2023/07/06/4d323b38365941e2ba21bc6afbaf569a-1.jpg','2023-07-06 12:22:04','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/06/4d323b38365941e2ba21bc6afbaf569a_h2642000000nero_aac16.mp4'),(29622704,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本民众再次举行抗议 反对核污染水排海','https://p3.img.cctvpic.com/fmspic/2023/07/21/9bec14d3d8ca425b8a1923b439ec46f4-1.jpg','2023-07-21 07:04:29','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/21/9bec14d3d8ca425b8a1923b439ec46f4_h2642000000nero_aac16.mp4'),(29643297,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本民众再次集会 坚决反对核污染水排海','https://p5.img.cctvpic.com/fmspic/2023/07/29/5de8c43ebcab4fa4a773da25d569b40b-1.jpg','2023-07-29 07:42:44','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/29/5de8c43ebcab4fa4a773da25d569b40b_h2642000000nero_aac16.mp4'),(29643480,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本民众再次集会 坚决反对核污染水排海','https://p1.img.cctvpic.com/fmspic/2023/07/29/e6fd007ad0a8491a9cc4da8a509aec30-1.jpg','2023-07-29 08:44:42','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/29/e6fd007ad0a8491a9cc4da8a509aec30_h2642000000nero_aac16.mp4'),(29655652,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本民众再次集会 坚决反对核污染水排海','https://p5.img.cctvpic.com/fmspic/2023/08/03/a60c4d9856f8497cb3239995b964d075-1.jpg','2023-08-03 07:00:54','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/03/a60c4d9856f8497cb3239995b964d075_h2642000000nero_aac16-1.mp4'),(29702931,'CCTV-4中文国际频道','多方反对日本强推核污染水排海 日本全渔联重申坚决反对核污染水排海','https://p2.img.cctvpic.com/fmspic/2023/08/21/645f9e0dc2e2433ba7615b9ffb02aafd-1.jpg','2023-08-21 18:15:23','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/21/645f9e0dc2e2433ba7615b9ffb02aafd_h2642000000nero_aac16.mp4'),(29703728,'CCTV-13新闻频道','多方反对日本强推核污染水排海 福岛各界举行圆桌会 反对核污染水排海','https://p2.img.cctvpic.com/fmspic/2023/08/22/1d9856071d9e4da2bf53285d4881e79f-1.jpg','2023-08-22 00:33:22','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/22/1d9856071d9e4da2bf53285d4881e79f_h2642000000nero_aac16.mp4'),(29706235,'CCTV-13新闻频道','多方反对日本强推核污染水排海 首相官邸前 民众集会反对核污染水排海','https://p3.img.cctvpic.com/fmspic/2023/08/22/95723ea577514a60ae5b41318cee199f-1.jpg','2023-08-22 22:19:24','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/22/95723ea577514a60ae5b41318cee199f_h2642000000nero_aac16.mp4'),(29706733,'CCTV-13新闻频道','多方反对日本强推核污染水排海 韩国多个团体抗议日本强推核污染水排海','https://p3.img.cctvpic.com/fmspic/2023/08/23/c5a1d67c8f73496097b588435ffa0880-1.jpg','2023-08-23 07:39:26','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/c5a1d67c8f73496097b588435ffa0880_h2642000000nero_aac16.mp4'),(29707044,'CCTV-13新闻频道','多方反对日本强推核污染水排海 专家：福岛核污染水排海后患无穷','https://p4.img.cctvpic.com/fmspic/2023/08/23/5f54f119b7f3486289122d7588f41732-1.jpg','2023-08-23 09:37:25','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/5f54f119b7f3486289122d7588f41732_h2642000000nero_aac16-1.mp4'),(29707168,'CCTV-13新闻频道','多方反对日本强推核污染水排海 专家：福岛核污染水排海后患无穷','https://p3.img.cctvpic.com/fmspic/2023/08/23/f2c0175b2e6c4caa8724e87395c6c87d-1.jpg','2023-08-23 10:37:27','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/f2c0175b2e6c4caa8724e87395c6c87d_h2642000000nero_aac16-1.mp4'),(29707426,'CCTV-4中文国际频道','日本强推福岛核污染水排海 东电公布第一批核污染水排放计划','https://p2.img.cctvpic.com/fmspic/2023/08/23/1fdaeb99279843b885602cb528e2b728-1.jpg','2023-08-23 12:31:26','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/1fdaeb99279843b885602cb528e2b728_h2642000000nero_aac16.mp4'),(29708000,'CCTV-13新闻频道','多方反对日本强推核污染水排海 专家：福岛核污染水排海后患无穷','https://p3.img.cctvpic.com/fmspic/2023/08/23/a24cd51e029a4f4ea8c23e9a46435771-1.jpg','2023-08-23 16:43:27','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/a24cd51e029a4f4ea8c23e9a46435771_h2642000000nero_aac16-1.mp4'),(29710273,'CCTV-13新闻频道','多方反对日本强推核污染水排海 多国人士：核污染水排海威胁全球海洋','https://p1.img.cctvpic.com/fmspic/2023/08/24/171dad940d3348b9be3931d0b892f6ec-1.jpg','2023-08-24 14:43:27','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/24/171dad940d3348b9be3931d0b892f6ec_h2642000000nero_aac16-1.mp4'),(29711374,'CCTV-13新闻频道','无视多方反对 日本今日启动核污染水排海 日本各界反对核污染水排海','https://p4.img.cctvpic.com/fmspic/2023/08/24/62471935a1f34dfeb74f85b2f2a6f442-1.jpg','2023-08-24 23:29:27','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/24/62471935a1f34dfeb74f85b2f2a6f442_h2642000000nero_aac16.mp4'),(29713651,'CCTV-13新闻频道','日本政府强行启动福岛核污染水排海 民众首相官邸前集会 反对核污染水排海','https://p5.img.cctvpic.com/fmspic/2023/08/25/ba32e0b9a31f464181fb512eb24781c5-1.jpg','2023-08-25 21:31:30','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/25/ba32e0b9a31f464181fb512eb24781c5_h2642000000nero_aac16.mp4'),(29714397,'CCTV-4中文国际频道','日本强行启动核污染水排海 日本东电：排海首日共排放核污染水183吨','https://p1.img.cctvpic.com/fmspic/2023/08/26/5403d4f5b2ea4fb792a1d20182bd928b-1.jpg','2023-08-26 08:19:32','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/26/5403d4f5b2ea4fb792a1d20182bd928b_h2642000000nero_aac16-1.mp4'),(29715989,'CCTV-2财经频道','关注日本核污染水排海 韩国釜山民众走上街头 抗议核污染水排海','https://p5.img.cctvpic.com/fmspic/2023/08/26/26652d5fb96f408d867f8cf614475d73-1.jpg','2023-08-26 20:51:32','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/26/26652d5fb96f408d867f8cf614475d73_h2642000000nero_aac16-1.mp4'),(29716725,'CCTV-4中文国际频道','多方反对日本强推核污染水排海 韩国举行大规模集会抗议福岛核污染水排海','https://p2.img.cctvpic.com/fmspic/2023/08/27/f6aaee7fbadf49ba8a4dca04fb354dbe-1.jpg','2023-08-27 08:15:32','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/27/f6aaee7fbadf49ba8a4dca04fb354dbe_h2642000000nero_aac16-1.mp4');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-20 21:09:24
