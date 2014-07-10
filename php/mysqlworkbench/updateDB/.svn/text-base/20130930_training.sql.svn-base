CREATE DATABASE  IF NOT EXISTS `training` /*!40100 DEFAULT CHARACTER SET ujis */;
USE `training`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: training
-- ------------------------------------------------------
-- Server version	5.6.14

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `m0010`
--

DROP TABLE IF EXISTS `m0010`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m0010` (
  `UserId` varchar(30) CHARACTER SET utf8 NOT NULL,
  `UserName` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `Password` varchar(30) CHARACTER SET utf8 NOT NULL,
  `PermissionCode` smallint(6) DEFAULT NULL,
  `PcId` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `PcName` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Language` tinyint(4) DEFAULT NULL,
  `CreatedUserId` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `CreatedIp` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `UpdatedUserId` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `UpdatedIp` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `UpdatedDate` datetime DEFAULT NULL,
  `DeletedUserId` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `DeletedIp` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `Del_flag` bit(1) DEFAULT NULL,
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `UserId_UNIQUE` (`UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m0010`
--

LOCK TABLES `m0010` WRITE;
/*!40000 ALTER TABLE `m0010` DISABLE KEYS */;
INSERT INTO `m0010` VALUES ('admin','Nguyễn Trọng Hùng','12345678',99,'HOANGPHAM-PC','HOANGPHAM-PC',1,'admin','localhost','2013-09-26 00:00:00','admin','::1','2013-09-30 00:00:00',NULL,NULL,NULL,NULL),('canhnh',NULL,'32165487',90,'CANH-PC','CANH-PC',2,'admin','localhost','2013-09-30 00:00:00','admin','::1','2013-09-30 00:00:00',NULL,NULL,NULL,NULL),('dainx',NULL,'qwerty123',40,'PC','PC',1,'admin','localhost','2013-09-30 00:00:00','admin','::1','2013-09-30 00:00:00',NULL,NULL,NULL,NULL),('hoangpt',NULL,'qwerty123',99,'HOANGPHAM-PC','HOANGPHAM-PC',2,'admin','::1','2013-09-30 00:00:00','admin','::1','2013-09-30 00:00:00','admin','::1','2013-09-30 00:00:00',''),('quangnk','Nguyễn Khắc Quang','12345678',10,'QUANG-PC','QUANG-PC',1,'admin','localhost','2013-09-27 00:00:00','admin','::1','2013-09-30 00:00:00','admin','::1','2013-09-30 00:00:00','\0'),('viettd','Trần Đại Việt','12345678',10,'VIET-PC','VIET-PC',2,'admin','localhost','2013-09-28 00:00:00','admin','::1','2013-09-30 00:00:00','','','2013-09-30 00:00:00',NULL);
/*!40000 ALTER TABLE `m0010` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m0020`
--

DROP TABLE IF EXISTS `m0020`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m0020` (
  `CustomerId` smallint(6) NOT NULL,
  `CustomerName` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `CustomerNameKana` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `CustomerShortName` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `PostCode` varchar(8) CHARACTER SET utf8 DEFAULT NULL,
  `Address1` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Address2` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `Tel` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `Fax` varchar(40) CHARACTER SET utf8 DEFAULT NULL,
  `Note` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `CreatedUserId` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `CreatedIp` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `UpdatedUserId` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `UpdatedIp` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `UpdatedDate` datetime DEFAULT NULL,
  `DeletedUserId` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `DeletedIp` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `Del_flag` bit(1) DEFAULT NULL,
  PRIMARY KEY (`CustomerId`),
  UNIQUE KEY `CustomerId_UNIQUE` (`CustomerId`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m0020`
--

LOCK TABLES `m0020` WRITE;
/*!40000 ALTER TABLE `m0020` DISABLE KEYS */;
INSERT INTO `m0020` VALUES (1,'Trần Việt Hoàng','Trần Việt Hoàng','Hoàng Trần','10000','Đội Cấn - Ba Đình - Hà Nội',NULL,'0900000000',NULL,'','admin','localhost','2013-09-27 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `m0020` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m0021`
--

DROP TABLE IF EXISTS `m0021`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m0021` (
  `CustomerId` smallint(6) NOT NULL,
  `StaffId` smallint(6) NOT NULL AUTO_INCREMENT,
  `StaffName` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `StaffNameKana` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `StaffDepartment` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `StaffPosition` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `Email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Note` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `CreatedUserId` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `CreatedIp` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `UpdatedUserId` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `UpdatedIp` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `UpdatedDate` datetime DEFAULT NULL,
  `DeletedUserId` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `DeletedIp` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `DeletedDate` datetime DEFAULT NULL,
  `Del_flag` bit(1) DEFAULT NULL,
  PRIMARY KEY (`StaffId`,`CustomerId`),
  UNIQUE KEY `CustomerId_UNIQUE` (`CustomerId`),
  UNIQUE KEY `StaffId_UNIQUE` (`StaffId`)
) ENGINE=InnoDB DEFAULT CHARSET=ujis;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m0021`
--

LOCK TABLES `m0021` WRITE;
/*!40000 ALTER TABLE `m0021` DISABLE KEYS */;
/*!40000 ALTER TABLE `m0021` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'training'
--

--
-- Dumping routines for database 'training'
--
/*!50003 DROP PROCEDURE IF EXISTS `m0010_act100` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `m0010_act100`(
	p_UserId 			VARCHAR(21844)
,	p_Password			VARCHAR(21844)
,	p_PermissionCode	VARCHAR(21844)
,	p_PcId				VARCHAR(21844)
,	p_PcName			VARCHAR(21844)
,	p_Language			VARCHAR(21844)
,	p_Cnt				INT
,	p_UserEdit			VARCHAR(30)
,	p_Ip				VARCHAR(200)
)
BEGIN
	declare w_Time				DATETIME  						DEFAULT CURDATE();
	declare w_UserId			VARCHAR(30) 	DEFAULT '';
	declare w_Password			VARCHAR(30) 	DEFAULT '';
	declare w_PermissionCode	VARCHAR(30) 	DEFAULT '';
	declare w_PcId				VARCHAR(30) 	DEFAULT '';
	declare w_PcName			VARCHAR(30) 	DEFAULT '';
	declare w_Language			VARCHAR(30) 	DEFAULT '';
	declare	w_Cnt				INT 							DEFAULT 0;
	declare w_delimiter			VARCHAR(10)						DEFAULT CHAR(9);
DROP TABLE IF EXISTS tmp_m0010;
SET SQL_SAFE_UPDATES=0;
CREATE TEMPORARY TABLE tmp_m0010(
	UserId 			varchar(30),
	`Password` 		varchar(30),
	PermissionCode 	smallint(6),
	PcId 			varchar(30),
	PcName 			varchar(50),
	`Language` 		tinyint(4),
  PRIMARY KEY (UserId)
);
WHILE(w_Cnt < p_Cnt)DO
	SET w_UserId 			= SUBSTRING(p_UserId, 1, LOCATE(w_delimiter, p_UserId)-1);
	SET w_Password 			= SUBSTRING(p_Password, 1, LOCATE(w_delimiter, p_Password)-1);
	SET w_PermissionCode 	= FLOOR(SUBSTRING(p_PermissionCode, 1, LOCATE(w_delimiter, p_PermissionCode)-1));
	SET w_PcId 				= SUBSTRING(p_PcId, 1, LOCATE(w_delimiter, p_PcId)-1);
	SET w_PcName 			= SUBSTRING(p_PcName, 1, LOCATE(w_delimiter, p_PcName)-1);
	SET w_Language 			= FLOOR(SUBSTRING(p_Language, 1, LOCATE(w_delimiter, p_Language)-1));

	SET p_UserId			= SUBSTRING(p_UserId, LOCATE(w_delimiter, p_UserId)+1, CHAR_LENGTH(p_UserId));
	SET p_Password			= SUBSTRING(p_Password, LOCATE(w_delimiter, p_Password)+1, CHAR_LENGTH(p_Password));
	SET p_PermissionCode	= SUBSTRING(p_PermissionCode, LOCATE(w_delimiter, p_PermissionCode)+1, CHAR_LENGTH(p_PermissionCode));
	SET p_PcId				= SUBSTRING(p_PcId, LOCATE(w_delimiter, p_PcId)+1, CHAR_LENGTH(p_PcId));
	SET p_PcName			= SUBSTRING(p_PcName, LOCATE(w_delimiter, p_PcName)+1, CHAR_LENGTH(p_PcName));
	SET p_Language			= SUBSTRING(p_Language, LOCATE(w_delimiter, p_Language)+1, CHAR_LENGTH(p_Language));
	
	SET w_Cnt = w_Cnt+1;
	
	INSERT INTO tmp_m0010(
		UserId,
		`Password`,
		PermissionCode,
		PcId,
		PcName,
		`Language`
	)VALUES(
		w_UserId,
		w_Password,
		w_PermissionCode,
		w_PcId,
		w_PcName,
		w_Language
	);
END WHILE;

UPDATE m0010 x
	RIGHT JOIN tmp_m0010 y
	ON	y.UserId = x.UserId
	SET
		x.UserId 			:= y.UserId,
		x.`Password` 		:= y.Password,
		x.PermissionCode	:= y.PermissionCode,
		x.PcId 				:= y.PcId,
		x.PcName 			:= y.PcName,
		x.`Language` 		:= y.Language,
		x.UpdatedUserId 	:= p_UserEdit,
		x.UpdatedIp 		:= p_Ip,
		x.UpdatedDate 		:= w_Time
	where
		IFNULL(x.Del_flag, 0) = 0
	and	x.UserId IS NOT NULL;

INSERT INTO m0010(
		UserId,
		`Password`,
		PermissionCode,
		PcId,
		PcName,
		`Language`,
		CreatedUserId,
		CreatedIp,
		CreatedDate
	)
	SELECT
			x.*
		,	p_UserEdit
		,	p_Ip
		,	w_Time
		FROM tmp_m0010 x
		LEFT JOIN m0010 y
		ON	y.UserId = x.UserId
		where
			IFNULL(y.Del_flag, 0) = 1
		or	y.UserId IS NULL;

UPDATE m0010 x
	LEFT JOIN tmp_m0010 y
	ON	y.UserId = x.UserId
	SET
		Del_flag		= 1,
		DeletedUserId 	= p_UserEdit,
		DeletedIp 		= p_Ip,
		DeletedDate 	= w_Time
	where
		IFNULL(x.Del_flag, 0) = 0
	and	y.UserId IS NULL;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `m0010_inq100` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `m0010_inq100`()
BEGIN
	SELECT
		`m0010`.`UserId`,
		`m0010`.`UserName`,
		`m0010`.`Password`,
		`m0010`.`PermissionCode`,
		`m0010`.`PcId`,
		`m0010`.`PcName`,
		`m0010`.`Language`,
		`m0010`.`CreatedUserId`,
		`m0010`.`CreatedIp`,
		`m0010`.`CreatedDate`,
		`m0010`.`UpdatedUserId`,
		`m0010`.`UpdatedIp`,
		`m0010`.`UpdatedDate`,
		`m0010`.`DeletedUserId`
	FROM `training`.`m0010`
	where
		IFNULL(`m0010`.`Del_flag`, 0) = 0;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `m0020_inq100` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `m0020_inq100`()
BEGIN
	SELECT
		`m0020`.`CustomerId`,
		`m0020`.`CustomerName`,
		`m0020`.`CustomerNameKana`,
		`m0020`.`CustomerShortName`,
		`m0020`.`PostCode`,
		`m0020`.`Address1`,
		`m0020`.`Address2`,
		`m0020`.`Tel`,
		`m0020`.`Fax`,
		`m0020`.`Note`,
		`m0020`.`CreatedUserId`,
		`m0020`.`CreatedIp`,
		`m0020`.`CreatedDate`,
		`m0020`.`UpdatedUserId`,
		`m0020`.`UpdatedIp`,
		`m0020`.`UpdatedDate`
	FROM `training`.`m0020`
	where
		IFNULL(`m0020`.`Del_flag`, 0) = 0;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `m0020_inq101` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `m0020_inq101`(
	`p_CustomerId` int
)
BEGIN
	SELECT
		`m0020`.`CustomerId`,
		`m0020`.`CustomerName`,
		`m0020`.`CustomerNameKana`,
		`m0020`.`CustomerShortName`,
		`m0020`.`PostCode`,
		`m0020`.`Address1`,
		`m0020`.`Address2`,
		`m0020`.`Tel`,
		`m0020`.`Fax`,
		`m0020`.`Note`,
		`m0020`.`CreatedUserId`,
		`m0020`.`CreatedIp`,
		`m0020`.`CreatedDate`,
		`m0020`.`UpdatedUserId`,
		`m0020`.`UpdatedIp`,
		`m0020`.`UpdatedDate`
	FROM `training`.`m0020`
	where
		`p_CustomerId` = `m0020`.`CustomerId`
	AND	IFNULL(`m0020`.`Del_flag`, 0) = 0;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `m0021_inq100` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `m0021_inq100`(
	`p_CustomerId` int
)
BEGIN
	SELECT
		`m0021`.`CustomerId`,
		`m0021`.`StaffId`,
		`m0021`.`StaffName`,
		`m0021`.`StaffNameKana`,
		`m0021`.`StaffDepartment`,
		`m0021`.`StaffPosition`,
		`m0021`.`Email`,
		`m0021`.`Note`,
		`m0021`.`CreatedUserId`,
		`m0021`.`CreatedIp`,
		`m0021`.`CreatedDate`,
		`m0021`.`UpdatedUserId`,
		`m0021`.`UpdatedIp`,
		`m0021`.`UpdatedDate`
	FROM `training`.`m0021`
	where
		`m0021`.`CustomerId` = `p_CustomerId`
	AND	IFNULL(`m0021`.`Del_flag`, 0) = 0;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-30 10:28:27
