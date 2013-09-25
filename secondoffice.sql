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
-- Table structure for table `tbl_auth_assignment`
--

DROP TABLE IF EXISTS `tbl_auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_auth_assignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `tbl_auth_assignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `tbl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_auth_assignment`
--

LOCK TABLES `tbl_auth_assignment` WRITE;
/*!40000 ALTER TABLE `tbl_auth_assignment` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_auth_item`
--

DROP TABLE IF EXISTS `tbl_auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_auth_item`
--

LOCK TABLES `tbl_auth_item` WRITE;
/*!40000 ALTER TABLE `tbl_auth_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_auth_item_child`
--

DROP TABLE IF EXISTS `tbl_auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `tbl_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `tbl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `tbl_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_auth_item_child`
--

LOCK TABLES `tbl_auth_item_child` WRITE;
/*!40000 ALTER TABLE `tbl_auth_item_child` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_department`
--

DROP TABLE IF EXISTS `tbl_department`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_department` (
  `uid` varchar(32) NOT NULL,
  `parentuid` varchar(32) NOT NULL DEFAULT '',
  `name` varchar(32) NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_department`
--

LOCK TABLES `tbl_department` WRITE;
/*!40000 ALTER TABLE `tbl_department` DISABLE KEYS */;
INSERT INTO `tbl_department` VALUES ('001-9','001-9','001-9',1);
/*!40000 ALTER TABLE `tbl_department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_log`
--

DROP TABLE IF EXISTS `tbl_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_log` (
  `uid` varchar(32) NOT NULL,
  `category` varchar(128) DEFAULT NULL,
  `ip` varchar(32) DEFAULT NULL,
  `user` varchar(32) DEFAULT NULL,
  `logtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` text,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_log`
--

LOCK TABLES `tbl_log` WRITE;
/*!40000 ALTER TABLE `tbl_log` DISABLE KEYS */;
INSERT INTO `tbl_log` VALUES ('523e5b144520a9.44265106','event.signin','127.0.0.1','admin','2013-09-22 02:51:00','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),('523ea7bd672c01.69783261','event.signin','127.0.0.1','admin','2013-09-22 08:18:05','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),('523ea7eb0ee176.23252745','event.signin','127.0.0.1','admin','2013-09-22 08:18:51','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),('523ea80f29fbe6.37059908','event.signin','127.0.0.1','admin','2013-09-22 08:19:27','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),('523ea82fd60214.35915741','event.signin','127.0.0.1','admin','2013-09-22 08:19:59','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),('523ea842591ef9.23279454','event.signin','127.0.0.1','admin','2013-09-22 08:20:18','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),('523ea8c6859766.71271264','event.signin','127.0.0.1','admin','2013-09-22 08:22:30','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),('523eb94dd6e0a1.34006602','event.signin','127.0.0.1','admin','2013-09-22 09:33:01','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),('523ebb87f00402.00773865','event.signin','127.0.0.1','admin','2013-09-22 09:42:32','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),('523ebc1554bb02.60703288','event.signin','127.0.0.1','admin','2013-09-22 09:44:53','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),('523ebd936e7fe6.13676950','event.signin','127.0.0.1','admin','2013-09-22 09:51:15','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),('523ebec9da3174.71765939','event.signin','127.0.0.1','admin','2013-09-22 09:56:25','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),('523f9b9a3dec35.48010779','event.signin','127.0.0.1','admin','2013-09-23 01:38:34','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),('523fe457cde6c9.61146709','event.signin','127.0.0.1','admin','2013-09-23 06:48:56','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),('523ffdafa0a8e2.37149598','event.signin','127.0.0.1','admin','2013-09-23 08:37:03','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),('52410a6cb30392.60782426','event.signin','127.0.0.1','admin','2013-09-24 03:43:41','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),('52410da7d68511.07745447','event.signin','127.0.0.1','admin','2013-09-24 03:57:27','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),('52415642edf3f0.25457031','event.signin','127.0.0.1','admin','2013-09-24 09:07:15','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),('524164873798b7.00406065','event.signin','127.0.0.1','admin','2013-09-24 10:08:07','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),('524241cf694600.82973613','event.signin','127.0.0.1','admin','2013-09-25 01:52:16','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),('52424d6228e0f2.95652038','event.signin','127.0.0.1','admin','2013-09-25 02:41:38','user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)');
/*!40000 ALTER TABLE `tbl_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_log_detail`
--

DROP TABLE IF EXISTS `tbl_log_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_log_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `log_uid` varchar(32) NOT NULL,
  `model_name` varchar(32) NOT NULL,
  `model_primarykey` varchar(32) NOT NULL,
  `action` varchar(16) NOT NULL,
  `field` varchar(64) DEFAULT NULL,
  `value_now` text,
  `value_original` text,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_log_detail`
--

LOCK TABLES `tbl_log_detail` WRITE;
/*!40000 ALTER TABLE `tbl_log_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_log_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_modules`
--

DROP TABLE IF EXISTS `tbl_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_modules` (
  `uid` varchar(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `params` text NOT NULL,
  `vaild` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_modules`
--

LOCK TABLES `tbl_modules` WRITE;
/*!40000 ALTER TABLE `tbl_modules` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_person_experience`
--

DROP TABLE IF EXISTS `tbl_person_experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_person_experience` (
  `profile_uid` varchar(32) NOT NULL,
  `type` varchar(1) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `organization` varchar(32) NOT NULL,
  `remark` varchar(128) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_person_experience`
--

LOCK TABLES `tbl_person_experience` WRITE;
/*!40000 ALTER TABLE `tbl_person_experience` DISABLE KEYS */;
INSERT INTO `tbl_person_experience` VALUES ('ewrtert','1','2013-09-03','2013-09-06','sdfs','sdsdag');
/*!40000 ALTER TABLE `tbl_person_experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_person_profiles`
--

DROP TABLE IF EXISTS `tbl_person_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_person_profiles` (
  `uid` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `photo` varchar(32) NOT NULL DEFAULT '',
  `sex` varchar(1) NOT NULL DEFAULT 'M',
  `birthday` date NOT NULL,
  `hometown` varchar(16) NOT NULL DEFAULT '',
  `height` int(11) NOT NULL DEFAULT '0',
  `phone` varchar(32) NOT NULL DEFAULT '',
  `email` varchar(32) NOT NULL DEFAULT '',
  `remark` varchar(256) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_person_profiles`
--

LOCK TABLES `tbl_person_profiles` WRITE;
/*!40000 ALTER TABLE `tbl_person_profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_person_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_person_workhistory`
--

DROP TABLE IF EXISTS `tbl_person_workhistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_person_workhistory` (
  `profile_uid` varchar(32) NOT NULL,
  `department_uid` varchar(32) NOT NULL,
  `position_uid` varchar(32) NOT NULL,
  `event_type` varchar(1) NOT NULL,
  `event_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_person_workhistory`
--

LOCK TABLES `tbl_person_workhistory` WRITE;
/*!40000 ALTER TABLE `tbl_person_workhistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_person_workhistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_position`
--

DROP TABLE IF EXISTS `tbl_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_position` (
  `uid` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`)
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
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `uid` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `password_salt` varchar(8) NOT NULL,
  `email` varchar(32) NOT NULL DEFAULT '',
  `work_phone` varchar(32) NOT NULL DEFAULT '',
  `mobie_phone` varchar(32) NOT NULL DEFAULT '',
  `valid` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES ('324jasdf834','冯毅豪','admin','e56419914765c6d22dc5018114d73a28','123456','ram@welon-cn.com','28350192','13642713467',1);
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_department_position`
--

DROP TABLE IF EXISTS `tbl_user_department_position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_department_position` (
  `user_uid` varchar(32) NOT NULL,
  `department_uid` varchar(32) NOT NULL,
  `position_uid` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_department_position`
--

LOCK TABLES `tbl_user_department_position` WRITE;
/*!40000 ALTER TABLE `tbl_user_department_position` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user_department_position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_profile`
--

DROP TABLE IF EXISTS `tbl_user_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_profile` (
  `user_uid` varchar(32) NOT NULL,
  `profile_uid` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_profile`
--

LOCK TABLES `tbl_user_profile` WRITE;
/*!40000 ALTER TABLE `tbl_user_profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_user_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_workflow`
--

DROP TABLE IF EXISTS `tbl_workflow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_workflow` (
  `uid` varchar(32) NOT NULL,
  `module_uid` varchar(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `is_suspended` varchar(1) NOT NULL,
  `due_date` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_workflow`
--

LOCK TABLES `tbl_workflow` WRITE;
/*!40000 ALTER TABLE `tbl_workflow` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_workflow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_workflow_migrate`
--

DROP TABLE IF EXISTS `tbl_workflow_migrate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_workflow_migrate` (
  `uid` varchar(32) NOT NULL,
  `workflow_uid` varchar(32) NOT NULL,
  `from_node_uid` varchar(32) NOT NULL,
  `to_node_uid` varchar(32) NOT NULL,
  `conditions` text NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_workflow_migrate`
--

LOCK TABLES `tbl_workflow_migrate` WRITE;
/*!40000 ALTER TABLE `tbl_workflow_migrate` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_workflow_migrate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_workflow_node`
--

DROP TABLE IF EXISTS `tbl_workflow_node`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_workflow_node` (
  `uid` varchar(32) NOT NULL,
  `workflow_uid` varchar(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `node_type` varchar(32) NOT NULL,
  `actions` text NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_workflow_node`
--

LOCK TABLES `tbl_workflow_node` WRITE;
/*!40000 ALTER TABLE `tbl_workflow_node` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_workflow_node` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_workflow_process`
--

DROP TABLE IF EXISTS `tbl_workflow_process`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_workflow_process` (
  `uid` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `workflow_uid` varchar(32) NOT NULL,
  `current_node_uid` varchar(32) NOT NULL,
  `initiator_uid` varchar(32) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` timestamp NULL DEFAULT NULL,
  `status` varchar(32) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_workflow_process`
--

LOCK TABLES `tbl_workflow_process` WRITE;
/*!40000 ALTER TABLE `tbl_workflow_process` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_workflow_process` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_workflow_process_task`
--

DROP TABLE IF EXISTS `tbl_workflow_process_task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_workflow_process_task` (
  `uid` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `process_uid` varchar(32) NOT NULL,
  `node_uid` varchar(32) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_time` timestamp NULL DEFAULT NULL,
  `executor_uid` varchar(32) NOT NULL,
  `status` varchar(32) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_workflow_process_task`
--

LOCK TABLES `tbl_workflow_process_task` WRITE;
/*!40000 ALTER TABLE `tbl_workflow_process_task` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_workflow_process_task` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-25 18:41:00
