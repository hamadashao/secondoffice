-- MySQL dump 10.13  Distrib 5.5.29, for Win32 (x86)
--
-- Host: localhost    Database: secondoffice
-- ------------------------------------------------------
-- Server version	5.5.29

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
-- Table structure for table `tbl_department`
--

DROP TABLE IF EXISTS `tbl_department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_department` (
  `department_uid` varchar(32) NOT NULL,
  `department_parentuid` varchar(32) NOT NULL DEFAULT '',
  `department_name` varchar(32) NOT NULL,
  `department_location` varchar(32) NOT NULL DEFAULT '',
  `department_manageruid` varchar(32) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_department`
--

LOCK TABLES `tbl_department` WRITE;
/*!40000 ALTER TABLE `tbl_department` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_employee`
--

DROP TABLE IF EXISTS `tbl_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_employee` (
  `employee_uid` varchar(32) NOT NULL,
  `employee_staffuid` varchar(32) NOT NULL DEFAULT '',
  `employee_name` varchar(32) NOT NULL,
  `employee_nickname` varchar(32) DEFAULT NULL,
  `employee_phone` varchar(32) DEFAULT NULL,
  `employee_email` varchar(32) DEFAULT NULL,
  `employee_inwork` varchar(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`employee_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_employee`
--

LOCK TABLES `tbl_employee` WRITE;
/*!40000 ALTER TABLE `tbl_employee` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_employee_department_position`
--

DROP TABLE IF EXISTS `tbl_employee_department_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_employee_department_position` (
  `employee_uid` varchar(32) NOT NULL,
  `department_uid` varchar(32) NOT NULL,
  `position_uid` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_employee_department_position`
--

LOCK TABLES `tbl_employee_department_position` WRITE;
/*!40000 ALTER TABLE `tbl_employee_department_position` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_employee_department_position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_employee_work_history`
--

DROP TABLE IF EXISTS `tbl_employee_work_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_employee_work_history` (
  `employee_uid` varchar(32) NOT NULL,
  `department_uid` varchar(32) NOT NULL,
  `position_uid` varchar(32) NOT NULL,
  `event_type` varchar(1) NOT NULL,
  `event_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_employee_work_history`
--

LOCK TABLES `tbl_employee_work_history` WRITE;
/*!40000 ALTER TABLE `tbl_employee_work_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_employee_work_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_position`
--

DROP TABLE IF EXISTS `tbl_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_position` (
  `position_uid` varchar(32) NOT NULL,
  `position_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_position`
--

LOCK TABLES `tbl_position` WRITE;
/*!40000 ALTER TABLE `tbl_position` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_staff`
--

DROP TABLE IF EXISTS `tbl_staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_staff` (
  `staff_uid` varchar(32) NOT NULL,
  `staff_name` varchar(32) NOT NULL,
  `staff_photo` text NOT NULL,
  `staff_sex` varchar(4) NOT NULL,
  `staff_birthday` date NOT NULL,
  `staff_homtown` varchar(32) NOT NULL,
  `staff_height` int(11) NOT NULL,
  `staff_phone` varchar(32) NOT NULL,
  `staff_email` varchar(32) NOT NULL,
  `staff_remark` varchar(256) NOT NULL,
  PRIMARY KEY (`staff_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_staff`
--

LOCK TABLES `tbl_staff` WRITE;
/*!40000 ALTER TABLE `tbl_staff` DISABLE KEYS */;
INSERT INTO `tbl_staff` VALUES ('00000000000000001','测试人员','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','M','2013-06-01','广东广州',171,'1233211234567','abc@abc.com','这是一个测试人员的备注信息');
/*!40000 ALTER TABLE `tbl_staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_staff_experience`
--

DROP TABLE IF EXISTS `tbl_staff_experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_staff_experience` (
  `staffexp_staffuid` varchar(32) NOT NULL,
  `staffexp_type` varchar(1) NOT NULL,
  `staffexp_datefrom` date NOT NULL,
  `staffexp_dateto` date NOT NULL,
  `staffexp_location` varchar(32) NOT NULL,
  `staffexp_remark` varchar(128) NOT NULL,
  PRIMARY KEY (`staffexp_staffuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_staff_experience`
--

LOCK TABLES `tbl_staff_experience` WRITE;
/*!40000 ALTER TABLE `tbl_staff_experience` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_staff_experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `user_uid` varchar(32) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_employeeuid` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-07-16 16:22:45
