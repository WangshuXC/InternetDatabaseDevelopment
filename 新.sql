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
  `Username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`AdminID`) USING BTREE,
  KEY `admins_ibfk_1` (`Username`),
  CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `users` (`Username`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article comments`
--

DROP TABLE IF EXISTS `article comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `article comments` (
  `CommentID` int NOT NULL AUTO_INCREMENT,
  `ArticleID` int NOT NULL,
  `Comment` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `CommentDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`CommentID`) USING BTREE,
  KEY `ArticleID` (`ArticleID`) USING BTREE,
  KEY `fk_article_comments_username` (`Username`) USING BTREE,
  CONSTRAINT `article_comments_ibfk_2` FOREIGN KEY (`ArticleID`) REFERENCES `articles` (`ArticleID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_article_comments_username` FOREIGN KEY (`Username`) REFERENCES `users` (`Username`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article comments`
--

LOCK TABLES `article comments` WRITE;
/*!40000 ALTER TABLE `article comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `article comments` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;
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
  `ContentType` enum('Article','Video') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ClickCount` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`ClickID`) USING BTREE,
  UNIQUE KEY `ContentID_ContentType` (`ContentID`,`ContentType`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clicks`
--

LOCK TABLES `clicks` WRITE;
/*!40000 ALTER TABLE `clicks` DISABLE KEYS */;
/*!40000 ALTER TABLE `clicks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personalinfo`
--

DROP TABLE IF EXISTS `personalinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personalinfo` (
  `Name` varchar(100) NOT NULL,
  `AvatarURL` varchar(255) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `GitHubAccount` varchar(100) DEFAULT NULL,
  `WeChatID` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personalinfo`
--

LOCK TABLES `personalinfo` WRITE;
/*!40000 ALTER TABLE `personalinfo` DISABLE KEYS */;
/*!40000 ALTER TABLE `personalinfo` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;
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
-- Table structure for table `video comments`
--

DROP TABLE IF EXISTS `video comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `video comments` (
  `CommentID` int NOT NULL AUTO_INCREMENT,
  `VideoID` int NOT NULL,
  `Comment` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `CommentDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`CommentID`) USING BTREE,
  KEY `VideoID` (`VideoID`) USING BTREE,
  KEY `fk_video_comments_username` (`Username`) USING BTREE,
  CONSTRAINT `fk_video_comments_username` FOREIGN KEY (`Username`) REFERENCES `users` (`Username`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `video_comments_ibfk_2` FOREIGN KEY (`VideoID`) REFERENCES `videos` (`VideoID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video comments`
--

LOCK TABLES `video comments` WRITE;
/*!40000 ALTER TABLE `video comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `video comments` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=30013609 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (29571494,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本民众集会反对核污染水排海','https://p3.img.cctvpic.com/fmspic/2023/07/01/0c8ee031451e4a06bf612f55b8761a98-1.jpg','2023-07-01 06:09:55','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/01/0c8ee031451e4a06bf612f55b8761a98_h2642000000nero_aac16.mp4'),(29571835,'CCTV-4中文国际频道','多方反对日本强推核污染水排海 日本民众集会反对核污染水排海','https://p3.img.cctvpic.com/fmspic/2023/07/01/477c912aa2454358868138bb79b9b95b-1.jpg','2023-07-01 08:33:57','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/01/477c912aa2454358868138bb79b9b95b_h2642000000nero_aac16.mp4'),(29572313,'CCTV-4中文国际频道','多方反对日本强推核污染水排海 日本民众集会反对核污染水排海','https://p5.img.cctvpic.com/fmspic/2023/07/01/dc8d082f6c7c4d9aa93550c059e13c9c-1.jpg','2023-07-01 12:41:57','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/01/dc8d082f6c7c4d9aa93550c059e13c9c_h2642000000nero_aac16.mp4'),(29579868,'CCTV-13新闻频道','多方反对日本强推核污染水排海 核污染水排放入海危害不容忽视','https://p3.img.cctvpic.com/fmspic/2023/07/04/be3a74657f674e5490a818be60fd257f-1.jpg','2023-07-04 15:36:01','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/04/be3a74657f674e5490a818be60fd257f_h2642000000nero_aac16-1.mp4'),(29583530,'CCTV-1综合频道','多方反对日本强推核污染水排海 中方就日本强推核污染水排海阐明严正立场','https://p5.img.cctvpic.com/fmspic/2023/07/05/fedcb63ec6c84a1abe14eb2197259043-1.jpg','2023-07-05 22:36:45','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/05/fedcb63ec6c84a1abe14eb2197259043_2000_h264_1872_aac_128.mp4'),(29583809,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本民众集会反对核污染水排海','https://p1.img.cctvpic.com/fmspic/2023/07/06/221d3a8f387d4ae5a92b587e89cbde55-1.jpg','2023-07-06 05:46:05','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/06/221d3a8f387d4ae5a92b587e89cbde55_h2642000000nero_aac16.mp4'),(29584370,'CCTV-2财经频道','关注日本核污染水排海 日本民众集会反对核污染水排海','https://p3.img.cctvpic.com/fmspic/2023/07/06/8ac3e3d2e4464d1e8f6d354209be4649-1.jpg','2023-07-06 09:42:05','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/06/8ac3e3d2e4464d1e8f6d354209be4649_h2642000000nero_aac16.mp4'),(29584776,'CCTV-7国防军事频道','多方反对日本强推核污染水排海 日本民众集会反对核污染水排海','https://p5.img.cctvpic.com/fmspic/2023/07/06/4d323b38365941e2ba21bc6afbaf569a-1.jpg','2023-07-06 12:22:04','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/06/4d323b38365941e2ba21bc6afbaf569a_h2642000000nero_aac16.mp4'),(29585263,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本民众集会反对核污染水排海','https://p2.img.cctvpic.com/fmspic/2023/07/06/9b55625ad1a34e0591a4244706cd15d1-1.jpg','2023-07-06 15:54:05','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/06/9b55625ad1a34e0591a4244706cd15d1_h2642000000nero_aac16.mp4'),(29586850,'CCTV-13新闻频道','多方反对日本强推核污染水排海 韩国最大在野党抗议日本核污染水排海','https://p4.img.cctvpic.com/fmspic/2023/07/07/1284544105124217bbab5a490ad12fc0-1.jpg','2023-07-07 08:20:07','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/07/1284544105124217bbab5a490ad12fc0_h2642000000nero_aac16-1.mp4'),(29586988,'CCTV-13新闻频道','多方反对日本强推核污染水排海 韩国最大在野党抗议日本核污染水排海','https://p3.img.cctvpic.com/fmspic/2023/07/07/13091d1562864bdb8761e59f1085a336-1.jpg','2023-07-07 09:02:05','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/07/13091d1562864bdb8761e59f1085a336_h2642000000nero_aac16-1.mp4'),(29592013,'CCTV-13新闻频道','多方反对日本强推核污染水排海 韩国 多党派团体集会 反对日本核污染水排海','https://p5.img.cctvpic.com/fmspic/2023/07/09/c08fdb5b3a564017866adbb2f5029437-1.jpg','2023-07-09 09:04:10','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/09/c08fdb5b3a564017866adbb2f5029437_h2642000000nero_aac16-1.mp4'),(29592335,'CCTV-13新闻频道','多方反对日本强推核污染水排海 韩国 多党派团体集会 反对日本核污染水排海','https://p1.img.cctvpic.com/fmspic/2023/07/09/c891e5399d5b426ca3d19595c6e04ff7-1.jpg','2023-07-09 12:28:09','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/09/c891e5399d5b426ca3d19595c6e04ff7_h2642000000nero_aac16-1.mp4'),(29592409,'CCTV-4中文国际频道','德国之声 日本核污染水排海计划正当性备受质疑 向全人类转嫁核污染风险','https://p3.img.cctvpic.com/fmspic/2023/07/09/7043d6ff8a094cc3a964cac146410ffc-1.jpg','2023-07-09 13:02:09','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/09/7043d6ff8a094cc3a964cac146410ffc_h2642000000nero_aac16.mp4'),(29607832,'CCTV-13新闻频道','多方反对日本强推核污染水排海 塞尔维亚学者：核污染水排海贻害久远','https://p2.img.cctvpic.com/fmspic/2023/07/15/f26dc699483b462d85d3962538838b9a-1.jpg','2023-07-15 09:02:19','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/15/f26dc699483b462d85d3962538838b9a_h2642000000nero_aac16.mp4'),(29614264,'CCTV-13新闻频道','多方反对日本强推核污染水排海 福岛环保人士：核污染水不能一排了之','https://p3.img.cctvpic.com/fmspic/2023/07/17/88e075e6f8484fefbcf628e78b556b5b-1.jpg','2023-07-17 22:44:24','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/17/88e075e6f8484fefbcf628e78b556b5b_h2642000000nero_aac16-1.mp4'),(29619859,'CCTV-13新闻频道','多方反对日本强推核污染水排海 菲律宾民众抗议日本核污染水排海方案','https://p4.img.cctvpic.com/fmspic/2023/07/20/bb65573a43ef4fe8ae48778bebd75c0f-1.jpg','2023-07-20 01:00:26','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/20/bb65573a43ef4fe8ae48778bebd75c0f_h2642000000nero_aac16.mp4'),(29622704,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本民众再次举行抗议 反对核污染水排海','https://p3.img.cctvpic.com/fmspic/2023/07/21/9bec14d3d8ca425b8a1923b439ec46f4-1.jpg','2023-07-21 07:04:29','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/21/9bec14d3d8ca425b8a1923b439ec46f4_h2642000000nero_aac16.mp4'),(29624053,'CCTV-13新闻频道','多方反对日本强推核污染水排海 福岛县渔业协会称反对核污染水排海','https://p2.img.cctvpic.com/fmspic/2023/07/21/54c513bdf2e8411c8074899efbe91062-1.jpg','2023-07-21 16:52:31','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/21/54c513bdf2e8411c8074899efbe91062_h2642000000nero_aac16.mp4'),(29625019,'CCTV-13新闻频道','多方反对日本强推核污染水排海 福岛县渔业协会称反对核污染水排海','https://p2.img.cctvpic.com/fmspic/2023/07/21/9a2651293cfc4be7b8335fc1ab657b53-1.jpg','2023-07-21 23:58:29','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/21/9a2651293cfc4be7b8335fc1ab657b53_h2642000000nero_aac16.mp4'),(29625244,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本民众再次集会 坚决反对核污染水排海','https://p2.img.cctvpic.com/fmspic/2023/07/22/58e28e47cf534077a65c1e3c569e777c-1.jpg','2023-07-22 06:12:31','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/22/58e28e47cf534077a65c1e3c569e777c_h2642000000nero_aac16.mp4'),(29643181,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本民众再次集会 坚决反对核污染水排海','https://p4.img.cctvpic.com/fmspic/2023/07/29/29176c43ccad43f79b92397b45cab4f7-1.jpg','2023-07-29 06:10:43','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/29/29176c43ccad43f79b92397b45cab4f7_h2642000000nero_aac16.mp4'),(29643480,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本民众再次集会 坚决反对核污染水排海','https://p1.img.cctvpic.com/fmspic/2023/07/29/e6fd007ad0a8491a9cc4da8a509aec30-1.jpg','2023-07-29 08:44:42','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/29/e6fd007ad0a8491a9cc4da8a509aec30_h2642000000nero_aac16.mp4'),(29643848,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本民众再次集会 坚决反对核污染水排海','https://p3.img.cctvpic.com/fmspic/2023/07/29/8590bea8cf7e42c4af45d36fcf312dee-1.jpg','2023-07-29 11:40:42','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/29/8590bea8cf7e42c4af45d36fcf312dee_h2642000000nero_aac16.mp4'),(29649179,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日韩市民团体举行集会反对核污染水排海','https://p2.img.cctvpic.com/fmspic/2023/07/31/500622a7e2bb4ae2964f68c88d55081b-1.jpg','2023-07-31 17:46:48','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/07/31/500622a7e2bb4ae2964f68c88d55081b_h2642000000nero_aac16-1.mp4'),(29655652,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本民众再次集会 坚决反对核污染水排海','https://p5.img.cctvpic.com/fmspic/2023/08/03/a60c4d9856f8497cb3239995b964d075-1.jpg','2023-08-03 07:00:54','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/03/a60c4d9856f8497cb3239995b964d075_h2642000000nero_aac16-1.mp4'),(29657005,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本民众再次集会 坚决反对核污染水排海','https://p5.img.cctvpic.com/fmspic/2023/08/03/7683fe65f208401fa9e2a331b66ee837-1.jpg','2023-08-03 16:06:52','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/03/7683fe65f208401fa9e2a331b66ee837_h2642000000nero_aac16-1.mp4'),(29702931,'CCTV-4中文国际频道','多方反对日本强推核污染水排海 日本全渔联重申坚决反对核污染水排海','https://p2.img.cctvpic.com/fmspic/2023/08/21/645f9e0dc2e2433ba7615b9ffb02aafd-1.jpg','2023-08-21 18:15:23','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/21/645f9e0dc2e2433ba7615b9ffb02aafd_h2642000000nero_aac16.mp4'),(29703540,'CCTV-1综合频道','【多方反对日本强推核污染水排海】福岛各界举行圆桌会 反对核污染水排海','https://p1.img.cctvpic.com/fmspic/2023/08/21/ff915da8c7014ed18447a83faf1869ba-1.jpg','2023-08-21 22:30:29','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/21/ff915da8c7014ed18447a83faf1869ba_2000_h264_1872_aac_128.mp4'),(29703728,'CCTV-13新闻频道','多方反对日本强推核污染水排海 福岛各界举行圆桌会 反对核污染水排海','https://p2.img.cctvpic.com/fmspic/2023/08/22/1d9856071d9e4da2bf53285d4881e79f-1.jpg','2023-08-22 00:33:22','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/22/1d9856071d9e4da2bf53285d4881e79f_h2642000000nero_aac16.mp4'),(29704575,'CCTV-2财经频道','日本强推核污染水排海 日本政府宣布本月24日启动核污染水排海','https://p4.img.cctvpic.com/fmspic/2023/08/22/7a9495db42d34afb8a110ea09afd05b6-1.jpg','2023-08-22 11:09:24','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/22/7a9495db42d34afb8a110ea09afd05b6_h2642000000nero_aac16-1.mp4'),(29704915,'CCTV-2财经频道','日本核污染水排海倒计时 日本核污染水排海日期公布 韩国社会不安情绪高涨','https://p5.img.cctvpic.com/fmspic/2023/08/22/ab0b8a1d75bb4b238338c49438b60353-1.jpg','2023-08-22 13:11:24','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/22/ab0b8a1d75bb4b238338c49438b60353_h2642000000nero_aac16-1.mp4'),(29706086,'CCTV-2财经频道','关注日本核污染水排海 日本核污染水排海日期公布 韩国社会不安情绪高涨','https://p3.img.cctvpic.com/fmspic/2023/08/22/d115616e3907491e98731f9ee3893fe0-1.jpg','2023-08-22 21:27:26','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/22/d115616e3907491e98731f9ee3893fe0_h2642000000nero_aac16-1.mp4'),(29706235,'CCTV-13新闻频道','多方反对日本强推核污染水排海 首相官邸前 民众集会反对核污染水排海','https://p3.img.cctvpic.com/fmspic/2023/08/22/95723ea577514a60ae5b41318cee199f-1.jpg','2023-08-22 22:19:24','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/22/95723ea577514a60ae5b41318cee199f_h2642000000nero_aac16.mp4'),(29706498,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本政府宣布8月24日起排放核污染水','https://p4.img.cctvpic.com/fmspic/2023/08/23/0d63a72522554fee88e4ec6e9c8d566f-1.jpg','2023-08-23 01:09:24','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/0d63a72522554fee88e4ec6e9c8d566f_h2642000000nero_aac16-1.mp4'),(29706585,'CCTV-13新闻频道','多方反对日本强推核污染水排海 首相官邸前 民众集会反对核污染水排海','https://p4.img.cctvpic.com/fmspic/2023/08/23/e7bb43c924da42ff9bbeb78fa277c11d-1.jpg','2023-08-23 04:33:23','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/e7bb43c924da42ff9bbeb78fa277c11d_h2642000000nero_aac16.mp4'),(29707038,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本在野党批评政府核污染水排海决定','https://p1.img.cctvpic.com/fmspic/2023/08/23/8d5b5a3270c44e19b8c67b7f3ea4a024-1.jpg','2023-08-23 09:35:25','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/8d5b5a3270c44e19b8c67b7f3ea4a024_h2642000000nero_aac16.mp4'),(29707168,'CCTV-13新闻频道','多方反对日本强推核污染水排海 专家：福岛核污染水排海后患无穷','https://p3.img.cctvpic.com/fmspic/2023/08/23/f2c0175b2e6c4caa8724e87395c6c87d-1.jpg','2023-08-23 10:37:27','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/f2c0175b2e6c4caa8724e87395c6c87d_h2642000000nero_aac16-1.mp4'),(29707365,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本学者：核污染水排海长期影响不可忽视','https://p1.img.cctvpic.com/fmspic/2023/08/23/9edd44f255ac4c7286c932a797ea86dd-1.jpg','2023-08-23 12:07:25','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/9edd44f255ac4c7286c932a797ea86dd_h2642000000nero_aac16.mp4'),(29707426,'CCTV-4中文国际频道','日本强推福岛核污染水排海 东电公布第一批核污染水排放计划','https://p2.img.cctvpic.com/fmspic/2023/08/23/1fdaeb99279843b885602cb528e2b728-1.jpg','2023-08-23 12:31:26','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/1fdaeb99279843b885602cb528e2b728_h2642000000nero_aac16.mp4'),(29707716,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本学者：核污染水排海长期影响不可忽视','https://p2.img.cctvpic.com/fmspic/2023/08/23/0daf701e0275448a883d10f067eec1b7-1.jpg','2023-08-23 14:47:26','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/0daf701e0275448a883d10f067eec1b7_h2642000000nero_aac16.mp4'),(29708000,'CCTV-13新闻频道','多方反对日本强推核污染水排海 专家：福岛核污染水排海后患无穷','https://p3.img.cctvpic.com/fmspic/2023/08/23/a24cd51e029a4f4ea8c23e9a46435771-1.jpg','2023-08-23 16:43:27','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/a24cd51e029a4f4ea8c23e9a46435771_h2642000000nero_aac16-1.mp4'),(29708215,'CCTV-13新闻频道','多方反对日本强推核污染水排海 福岛民众抗议核污染水排海决定','https://p3.img.cctvpic.com/fmspic/2023/08/23/d3529e822da8450caabf2b6537f371ff-1.jpg','2023-08-23 18:29:27','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/d3529e822da8450caabf2b6537f371ff_h2642000000nero_aac16.mp4'),(29708335,'CCTV-13新闻频道','多方反对日本强推核污染水排海 韩国民众强烈抗议日本核污染水排海','https://p4.img.cctvpic.com/fmspic/2023/08/23/34c9f5e7f26e4cdabecd17bebaca9ffd-1.jpg','2023-08-23 19:21:25','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/34c9f5e7f26e4cdabecd17bebaca9ffd_h2642000000nero_aac16-1.mp4'),(29708532,'CCTV-13新闻频道','核污染风险笼罩全球 日本为何强推排海？韩国多个团体抗议日本强推核污染水排海','https://p2.img.cctvpic.com/fmspic/2023/08/23/3dd56b03621246acbd778477ab93fe52-1.jpg','2023-08-23 21:01:26','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/3dd56b03621246acbd778477ab93fe52_h2642000000nero_aac16.mp4'),(29708533,'CCTV-13新闻频道','核污染风险笼罩全球 日本为何强推排海？为何多方强烈反对核污染水排海？','https://p2.img.cctvpic.com/fmspic/2023/08/23/b8026afbf9b544208f2e3fc9d46f0861-1.jpg','2023-08-23 21:01:26','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/b8026afbf9b544208f2e3fc9d46f0861_h2642000000nero_aac16-1.mp4'),(29708537,'CCTV-2财经频道','关注日本核污染水排海 韩国民众强烈抗议日本核污染水排海','https://p5.img.cctvpic.com/fmspic/2023/08/23/7deb70b63ac04673b595fc8684441501-1.jpg','2023-08-23 21:03:26','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/7deb70b63ac04673b595fc8684441501_h2642000000nero_aac16-1.mp4'),(29708540,'CCTV-13新闻频道','核污染风险笼罩全球 日本为何强推排海？17天排放7800吨核污染水','https://p1.img.cctvpic.com/fmspic/2023/08/23/6f29a560f9584cfbb60a8267200d7a9e-1.jpg','2023-08-23 21:05:26','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/6f29a560f9584cfbb60a8267200d7a9e_h2642000000nero_aac16.mp4'),(29708560,'CCTV-13新闻频道','核污染风险笼罩全球 日本为何强推排海？核污染水五种处理方案 排海成本最低','https://p5.img.cctvpic.com/fmspic/2023/08/23/aab26810f22f4fcea7c7152fc5eb42bd-1.jpg','2023-08-23 21:11:26','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/aab26810f22f4fcea7c7152fc5eb42bd_h2642000000nero_aac16.mp4'),(29708740,'CCTV-13新闻频道','多方反对日本强推核污染水排海 福岛民众抗议核污染水排海决定','https://p5.img.cctvpic.com/fmspic/2023/08/23/97ba39c451aa4e78b76efee099791281-1.jpg','2023-08-23 22:17:25','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/23/97ba39c451aa4e78b76efee099791281_h2642000000nero_aac16.mp4'),(29708971,'CCTV-13新闻频道','多方反对日本强推核污染水排海 福岛民众抗议核污染水排海决定','https://p3.img.cctvpic.com/fmspic/2023/08/24/0e6e40062b594ad4b00c46ee4a49851e-1.jpg','2023-08-24 00:51:25','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/24/0e6e40062b594ad4b00c46ee4a49851e_h2642000000nero_aac16.mp4'),(29709097,'CCTV-13新闻频道','多方反对日本强推核污染水排海 福岛民众抗议核污染水排海决定','https://p2.img.cctvpic.com/fmspic/2023/08/24/70ca86ee4145448eb09b590892efb054-1.jpg','2023-08-24 05:05:27','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/24/70ca86ee4145448eb09b590892efb054_h2642000000nero_aac16.mp4'),(29709106,'CCTV-13新闻频道','多方反对日本强推核污染水排海 福岛民众抗议核污染水排海决定','https://p5.img.cctvpic.com/fmspic/2023/08/24/b2e2d9e6b141426cac7004b676220f25-1.jpg','2023-08-24 05:15:27','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/24/b2e2d9e6b141426cac7004b676220f25_h2642000000nero_aac16.mp4'),(29709871,'CCTV-13新闻频道','多方反对日本强推核污染水排海 东电决定今天开始将核污染水排海','https://p4.img.cctvpic.com/fmspic/2023/08/24/2f477dcae8eb420d91f13dadd5618e20-1.jpg','2023-08-24 11:49:27','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/24/2f477dcae8eb420d91f13dadd5618e20_h2642000000nero_aac16.mp4'),(29710273,'CCTV-13新闻频道','多方反对日本强推核污染水排海 多国人士：核污染水排海威胁全球海洋','https://p1.img.cctvpic.com/fmspic/2023/08/24/171dad940d3348b9be3931d0b892f6ec-1.jpg','2023-08-24 14:43:27','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/24/171dad940d3348b9be3931d0b892f6ec_h2642000000nero_aac16-1.mp4'),(29710275,'CCTV-2财经频道','日本启动核污染水排海 不顾多方反对 日本今日启动核污染水排海','https://p3.img.cctvpic.com/fmspic/2023/08/24/8cb00939a50141508800d520c6c070c1-1.jpg','2023-08-24 14:45:27','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/24/8cb00939a50141508800d520c6c070c1_h2642000000nero_aac16.mp4'),(29710313,'CCTV-2财经频道','日本启动核污染水排海 日本福岛超市店主：没有科学依据 坚决反对核污染水排海','https://p4.img.cctvpic.com/fmspic/2023/08/24/502ab9943ccc411c91b28fbdde9ee595-1.jpg','2023-08-24 15:07:27','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/24/502ab9943ccc411c91b28fbdde9ee595_h2642000000nero_aac16-1.mp4'),(29710319,'CCTV-2财经频道','日本启动核污染水排海 无视多方反对 日本今日启动核污染水排海','https://p4.img.cctvpic.com/fmspic/2023/08/24/59224a1eb0a7404797acc399c5e7ba97-1.jpg','2023-08-24 15:13:27','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/24/59224a1eb0a7404797acc399c5e7ba97_h2642000000nero_aac16.mp4'),(29710487,'CCTV-2财经频道','日本启动核污染水排海 专家：日本偷换概念 为核污染水排海洗白','https://p1.img.cctvpic.com/fmspic/2023/08/24/a378d960c1124c5bbf77623fc5ea3131-1.jpg','2023-08-24 16:25:28','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/24/a378d960c1124c5bbf77623fc5ea3131_h2642000000nero_aac16-1.mp4'),(29710501,'CCTV-2财经频道','日本启动核污染水排海 日本启动核污染水排海 韩国社会强烈反对','https://p2.img.cctvpic.com/fmspic/2023/08/24/3cfc9d07b79743ef89e4887096c8b446-1.jpg','2023-08-24 16:31:32','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/24/3cfc9d07b79743ef89e4887096c8b446_h2642000000nero_aac16-1.mp4'),(29710628,'CCTV-13新闻频道','多方反对日本强推核污染水排海 专家：日本偷换概念 为核污染水排海洗白','https://p3.img.cctvpic.com/fmspic/2023/08/24/16fc0fff85e9452fa50e646a98a47c63-1.jpg','2023-08-24 17:45:27','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/24/16fc0fff85e9452fa50e646a98a47c63_h2642000000nero_aac16-1.mp4'),(29710636,'CCTV-2财经频道','日本启动核污染水排海 韩国社会强烈反对日本核污染水排海','https://p1.img.cctvpic.com/fmspic/2023/08/24/82d984ebeaa64149b8cf2d0cb6738af6-1.jpg','2023-08-24 17:51:27','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/24/82d984ebeaa64149b8cf2d0cb6738af6_h2642000000nero_aac16-1.mp4'),(29711033,'CCTV-2财经频道','关注日本核污染水排海 无视多方反对 日本今日启动核污染水排海','https://p2.img.cctvpic.com/fmspic/2023/08/24/84e684126ecd4b11a7957787eabda671-1.jpg','2023-08-24 20:57:28','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/24/84e684126ecd4b11a7957787eabda671_h2642000000nero_aac16.mp4'),(29711374,'CCTV-13新闻频道','无视多方反对 日本今日启动核污染水排海 日本各界反对核污染水排海','https://p4.img.cctvpic.com/fmspic/2023/08/24/62471935a1f34dfeb74f85b2f2a6f442-1.jpg','2023-08-24 23:29:27','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/24/62471935a1f34dfeb74f85b2f2a6f442_h2642000000nero_aac16.mp4'),(29711380,'CCTV-13新闻频道','无视多方反对 日本今日启动核污染水排海 多国民众反对日本核污染水排海','https://p2.img.cctvpic.com/fmspic/2023/08/24/33f97090ba554eec9984fbd21f3a444a-1.jpg','2023-08-24 23:33:28','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/24/33f97090ba554eec9984fbd21f3a444a_h2642000000nero_aac16-1.mp4'),(29712191,'CCTV-2财经频道','关注日本核污染水排海 无视多方反对 日本昨日强行启动核污染水排海','https://p5.img.cctvpic.com/fmspic/2023/08/25/ef6a60db217a4a05a9aeab86958dcf9e-1.jpg','2023-08-25 10:15:33','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/25/ef6a60db217a4a05a9aeab86958dcf9e_h2642000000nero_aac16.mp4'),(29712447,'CCTV-2财经频道','关注日本核污染水排海 日本民众在福岛县政府大楼外抗议核污染水排海','https://p1.img.cctvpic.com/fmspic/2023/08/25/b0d4466604004578ab0f8bcd95a638ed-1.jpg','2023-08-25 12:13:29','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/25/b0d4466604004578ab0f8bcd95a638ed_h2642000000nero_aac16-1.mp4'),(29712472,'CCTV-2财经频道','关注日本核污染水排海 日本政府强推核污染水排海 韩国国内不安情绪蔓延','https://p1.img.cctvpic.com/fmspic/2023/08/25/f8a243ee6abb49c5a6066f26a441dab8-1.jpg','2023-08-25 12:19:30','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/25/f8a243ee6abb49c5a6066f26a441dab8_h2642000000nero_aac16-1.mp4'),(29712736,'CCTV-2财经频道','日本核污染水排海 日本民众在福岛县政府大楼外抗议核污染水排海','https://p5.img.cctvpic.com/fmspic/2023/08/25/f0f0519d81e94823ab0408cad8435bc7-1.jpg','2023-08-25 14:13:29','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/25/f0f0519d81e94823ab0408cad8435bc7_h2642000000nero_aac16-1.mp4'),(29712852,'CCTV-2财经频道','日本核污染水排海 日本民众在福岛县政府大楼外抗议核污染水排海','https://p1.img.cctvpic.com/fmspic/2023/08/25/a3c9579c1d644e4e8bcf5c8796428cf4-1.jpg','2023-08-25 15:29:34','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/25/a3c9579c1d644e4e8bcf5c8796428cf4_h2642000000nero_aac16-1.mp4'),(29713010,'CCTV-13新闻频道','日本政府强行启动福岛核污染水排海 民众首相官邸前集会 反对核污染水排海','https://p1.img.cctvpic.com/fmspic/2023/08/25/329596b6ab944f95b9126f0666ffe496-1.jpg','2023-08-25 16:47:29','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/25/329596b6ab944f95b9126f0666ffe496_h2642000000nero_aac16.mp4'),(29713072,'CCTV-2财经频道','日本核污染水排海 日本民众首相官邸前集会 反对核污染水排海','https://p3.img.cctvpic.com/fmspic/2023/08/25/b14541ad6fc14b3da5aceb6fd6bf3777-1.jpg','2023-08-25 17:33:29','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/25/b14541ad6fc14b3da5aceb6fd6bf3777_h2642000000nero_aac16.mp4'),(29713951,'CCTV-13新闻频道','日本政府强行启动福岛核污染水排海 德国环境部长批日本排放核污染水','https://p3.img.cctvpic.com/fmspic/2023/08/25/af25c5483c8a4c569864c27e27c90340-1.jpg','2023-08-25 23:55:30','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/25/af25c5483c8a4c569864c27e27c90340_h2642000000nero_aac16.mp4'),(29714946,'CCTV-4中文国际频道','日本强行启动核污染水排海 日本东电：排海首日共排放核污染水183吨','https://p2.img.cctvpic.com/fmspic/2023/08/26/9350f6734ed74c62879be22d5737af55-1.jpg','2023-08-26 12:11:32','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/26/9350f6734ed74c62879be22d5737af55_h2642000000nero_aac16-1.mp4'),(29715034,'CCTV-2财经频道','关注日本核污染水排海 斐济民众抗议日本核污染水排海','https://p1.img.cctvpic.com/fmspic/2023/08/26/9a6db7c97fa942cba1b9943e8114602a-1.jpg','2023-08-26 12:45:32','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/26/9a6db7c97fa942cba1b9943e8114602a_h2642000000nero_aac16-1.mp4'),(29715035,'CCTV-2财经频道','关注日本核污染水排海 核污染水排海致韩国水产业遭受巨大损失','https://p1.img.cctvpic.com/fmspic/2023/08/26/23ac1e0a845048508f5b202021f45b17-1.jpg','2023-08-26 12:45:31','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/26/23ac1e0a845048508f5b202021f45b17_h2642000000nero_aac16-1.mp4'),(29715991,'CCTV-2财经频道','关注日本核污染水排海 斐济民众抗议日本核污染水排海','https://p4.img.cctvpic.com/fmspic/2023/08/26/097253fac2f644a68ed75e1eeed05158-1.jpg','2023-08-26 20:51:32','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/26/097253fac2f644a68ed75e1eeed05158_h2642000000nero_aac16.mp4'),(29716616,'CCTV-4中文国际频道','多方反对日本强推核污染水排海 韩国举行大规模集会抗议福岛核污染水排海','https://p1.img.cctvpic.com/fmspic/2023/08/27/a2071bfedf254706952a446f51811472-1.jpg','2023-08-27 07:23:33','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/27/a2071bfedf254706952a446f51811472_h2642000000nero_aac16-1.mp4'),(29717231,'CCTV-2财经频道','关注日本核污染水排海 韩国：数万民众集会 谴责日本核污染水排海','https://p4.img.cctvpic.com/fmspic/2023/08/27/cecf366b0f5a47c480f6131d8b51064f-1.jpg','2023-08-27 12:11:33','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/27/cecf366b0f5a47c480f6131d8b51064f_h2642000000nero_aac16-1.mp4'),(29717250,'CCTV-4中文国际频道','多方反对日本强推核污染水排海 韩国举行大规模集会抗议福岛核污染水排海','https://p5.img.cctvpic.com/fmspic/2023/08/27/9a49fe84a1b04a17b90dc7eaf6de3056-1.jpg','2023-08-27 12:17:33','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/27/9a49fe84a1b04a17b90dc7eaf6de3056_h2642000000nero_aac16-1.mp4'),(29718042,'CCTV-4中文国际频道','多方反对日本强推核污染水排海 韩国：数万民众集会 谴责日本核污染水排海','https://p5.img.cctvpic.com/fmspic/2023/08/27/b9543c1c14e64f22bc59605ac3e954c9-1.jpg','2023-08-27 19:19:33','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/27/b9543c1c14e64f22bc59605ac3e954c9_h2642000000nero_aac16-1.mp4'),(29718143,'CCTV-7国防军事频道','多方反对日本强推核污染水排海 日本民众在福岛集会 抗议核污染水排海','https://p5.img.cctvpic.com/fmspic/2023/08/27/678cbf5cd03d4ac989b50bd08634d62a-1.jpg','2023-08-27 20:13:36','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/27/678cbf5cd03d4ac989b50bd08634d62a_h2642000000nero_aac16.mp4'),(29718239,'CCTV-2财经频道','关注日本核污染水排海 日本多地民众齐聚福岛港口抗议核污染水排海','https://p3.img.cctvpic.com/fmspic/2023/08/27/245e20463d63431e872336cffe9e6d32-1.jpg','2023-08-27 20:55:33','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/27/245e20463d63431e872336cffe9e6d32_h2642000000nero_aac16-1.mp4'),(29718244,'CCTV-2财经频道','关注日本核污染水排海 韩国：数万民众集会 谴责日本核污染水排海','https://p1.img.cctvpic.com/fmspic/2023/08/27/9690fbab05b64a85a05d0dc5b2bd72bf-1.jpg','2023-08-27 20:57:33','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/27/9690fbab05b64a85a05d0dc5b2bd72bf_h2642000000nero_aac16-1.mp4'),(29719636,'CCTV-7国防军事频道','日本强行启动核污染水排海 日本民众举行集会 要求立刻停止核污染水排海','https://p4.img.cctvpic.com/fmspic/2023/08/28/e82dd40bf52543c2a2169b5ad5dbd891-1.jpg','2023-08-28 12:23:34','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/28/e82dd40bf52543c2a2169b5ad5dbd891_h2642000000nero_aac16.mp4'),(29725597,'CCTV-2财经频道','关注日本核污染水排海 韩国民众举行集会 反对日本核污染水排海','https://p3.img.cctvpic.com/fmspic/2023/08/30/5ea29000ab6a4a4594015b3e3fe2f330-1.jpg','2023-08-30 12:59:38','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/08/30/5ea29000ab6a4a4594015b3e3fe2f330_h2642000000nero_aac16.mp4'),(29730117,'CCTV-13新闻频道','多方反对日本强推核污染水排海 水俣病受害者团体要求停止核污染水排海','https://p3.img.cctvpic.com/fmspic/2023/09/01/6086f01ec7594f739c4f37234974e60a-1.jpg','2023-09-01 08:45:41','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/09/01/6086f01ec7594f739c4f37234974e60a_h2642000000nero_aac16.mp4'),(29731296,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本水俣病受害团体呼吁停止核污染水排海','https://p3.img.cctvpic.com/fmspic/2023/09/01/88e88ac68461487d94a17273a258a1e9-1.jpg','2023-09-01 14:35:41','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/09/01/88e88ac68461487d94a17273a258a1e9_h2642000000nero_aac16.mp4'),(29731468,'CCTV-13新闻频道','多方反对日本强推核污染水排海 水俣病受害者团体呼吁停止核污染水排海','https://p1.img.cctvpic.com/fmspic/2023/09/01/5485d75cf146435a92b2eefe4f83ce1d-1.jpg','2023-09-01 16:05:41','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/09/01/5485d75cf146435a92b2eefe4f83ce1d_h2642000000nero_aac16.mp4'),(29735291,'CCTV-13新闻频道','多方反对日本强推核污染水排海 上万韩国民众集会 谴责日本排放核污染水','https://p4.img.cctvpic.com/fmspic/2023/09/03/1ae7e3374ef243f8b5dc138d2ce40b6f-1.jpg','2023-09-03 00:51:42','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/09/03/1ae7e3374ef243f8b5dc138d2ce40b6f_h2642000000nero_aac16.mp4'),(29750926,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本 市民团体提起诉讼 要求停止核污染水排海','https://p2.img.cctvpic.com/fmspic/2023/09/08/f3f38e54d32e41bca78b90e86775358d-1.jpg','2023-09-08 22:47:53','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/09/08/f3f38e54d32e41bca78b90e86775358d_h2642000000nero_aac16-1.mp4'),(29751072,'CCTV-13新闻频道','多方反对日本强推核污染水排海 市民团体提起诉讼 要求停止核污染水排海','https://p3.img.cctvpic.com/fmspic/2023/09/08/a8080e03f7874fe0b91a85edf4534ec7-1.jpg','2023-09-08 23:59:52','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/09/08/a8080e03f7874fe0b91a85edf4534ec7_h2642000000nero_aac16-1.mp4'),(29751252,'CCTV-4中文国际频道','多方反对日本强推核污染水排海 市民团体提起诉讼 要求停止核污染水排海','https://p2.img.cctvpic.com/fmspic/2023/09/09/e449e3da463a40d1979c443e1c1f71d6-1.jpg','2023-09-09 07:13:54','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/09/09/e449e3da463a40d1979c443e1c1f71d6_h2642000000nero_aac16-1.mp4'),(29751523,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本 市民团体提起诉讼 要求停止核污染水排海','https://p5.img.cctvpic.com/fmspic/2023/09/09/882b188fef4b48939a302b34d4d285ae-1.jpg','2023-09-09 08:59:54','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/09/09/882b188fef4b48939a302b34d4d285ae_h2642000000nero_aac16-1.mp4'),(29752242,'CCTV-13新闻频道','多方反对日本强推核污染水排海 日本 市民团体提起诉讼 要求停止核污染水排海','https://p1.img.cctvpic.com/fmspic/2023/09/09/970bedbe5c524cde8831ec5ae0dce2b1-1.jpg','2023-09-09 15:05:55','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/09/09/970bedbe5c524cde8831ec5ae0dce2b1_h2642000000nero_aac16-1.mp4'),(29941836,'CCTV-4中文国际频道','中国外交部：日方应全面配合建立核污染水排海国际监测安排','https://p2.img.cctvpic.com/fmspic/2023/11/23/db0222c58284486e8b43fdb8cb68c486-1.jpg','2023-11-23 18:10:01','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/11/23/db0222c58284486e8b43fdb8cb68c486_h2642000000nero_aac16.mp4'),(29954474,'CCTV-13新闻频道','福岛核污染水排海事关全人类健康 日方应认真对待利益攸关方的正当诉求','https://p2.img.cctvpic.com/fmspic/2023/11/28/d98a561eac3641a58ce099d5ace436f3-1.jpg','2023-11-28 16:36:09','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/11/28/d98a561eac3641a58ce099d5ace436f3_h2642000000nero_aac16.mp4'),(29992492,'CCTV-13新闻频道','日本福岛第一核电站工作人员遭核污染 外交部：再次证明妥处核污染水极端重要','https://p5.img.cctvpic.com/fmspic/2023/12/13/ff3be23f0891410f9cc4303fbf39f2dc-1.jpg','2023-12-13 16:52:34','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/12/13/ff3be23f0891410f9cc4303fbf39f2dc_h2642000000nero_aac16.mp4'),(30006169,'CCTV-4中文国际频道','日本将于2024年2月启动第四轮核污染水排海','https://p3.img.cctvpic.com/fmspic/2023/12/19/59032fd8785e4fadbb42c3dbfdeefb1e-1.jpg','2023-12-19 09:02:43','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/12/19/59032fd8785e4fadbb42c3dbfdeefb1e_h2642000000nero_aac16.mp4'),(30013608,'新闻','国际速览 日本明年2月下旬启动第四轮福岛核污染水排海','https://p4.img.cctvpic.com/fmspic/2023/12/22/25eb0a27727543c597215858de428964-46976517-1.jpg','2023-12-22 00:04:47','https://vod.cntv.myhwcdn.cn/flash/mp4video63/TMS/2023/12/22/25eb0a27727543c597215858de428964_h2642000000nero_aac16.mp4');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `webviews`
--

DROP TABLE IF EXISTS `webviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `webviews` (
  `Views` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`Views`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `webviews`
--

LOCK TABLES `webviews` WRITE;
/*!40000 ALTER TABLE `webviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `webviews` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-22 19:36:04
