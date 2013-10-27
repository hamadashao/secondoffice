-- MySQL dump 10.13  Distrib 5.5.29, for Win32 (x86)
--
-- Host: localhost    Database: secondoffice
-- ------------------------------------------------------
-- Server version	5.1.44-community

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
INSERT INTO `tbl_department` VALUES ('524400ac0b71c6.60975257','','信息部',1),('5247fa2f8583e9.34371961','','业务一部',1),('5247fa2f858474.92636787','','业务二部',1),('5255022e40d9b0.61137398','','三部',1),('5255022e40da40.79869270','','四部',1),('5255022e40da62.05679421','','五部',1),('5255022e40da96.47466277','','六部',1),('5255022e40dab1.33384508','','财务部',1),('5255022e40dad7.88061285','','行政部',1),('5255022e40daf2.78386430','','设计部',1),('5255022e40db25.52704262','','QC部',1),('5255022e40db44.30478580','','船务部',1),('5255022e40db62.59719763','','内销部',1);
/*!40000 ALTER TABLE `tbl_department` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_group`
--

DROP TABLE IF EXISTS `tbl_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_group` (
  `uid` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `valid` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_group`
--

LOCK TABLES `tbl_group` WRITE;
/*!40000 ALTER TABLE `tbl_group` DISABLE KEYS */;
INSERT INTO `tbl_group` VALUES ('524400ac0b7276.95094144','系统管理员',1),('5247fa5e90f634.48352751','用户',1),('5247fa5e90f661.58057565','资料录入员',1);
/*!40000 ALTER TABLE `tbl_group` ENABLE KEYS */;
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
-- Table structure for table `tbl_module`
--

DROP TABLE IF EXISTS `tbl_module`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_module` (
  `uid` varchar(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `params` text NOT NULL,
  `vaild` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_module`
--

LOCK TABLES `tbl_module` WRITE;
/*!40000 ALTER TABLE `tbl_module` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_module` ENABLE KEYS */;
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
INSERT INTO `tbl_position` VALUES ('524400ac0b7251.61057412','网络管理员',1),('5247fa5e90f587.06548277','营销员',1),('5247fa5e90f618.14935915','营销助理',1);
/*!40000 ALTER TABLE `tbl_position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_profile`
--

DROP TABLE IF EXISTS `tbl_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_profile` (
  `uid` varchar(32) NOT NULL,
  `user_uid` varchar(32) DEFAULT NULL,
  `name` varchar(32) NOT NULL,
  `photo` varchar(32) NOT NULL DEFAULT '',
  `sex` varchar(1) NOT NULL DEFAULT 'M',
  `birthday` date NOT NULL,
  `hometown` varchar(16) NOT NULL DEFAULT '',
  `height` int(11) NOT NULL DEFAULT '0',
  `work_phone` varchar(32) DEFAULT NULL,
  `mobie_phone` varchar(32) DEFAULT NULL,
  `email` varchar(32) NOT NULL DEFAULT '',
  `remark` varchar(256) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_profile`
--

LOCK TABLES `tbl_profile` WRITE;
/*!40000 ALTER TABLE `tbl_profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_profile_experience`
--

DROP TABLE IF EXISTS `tbl_profile_experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_profile_experience` (
  `profile_uid` varchar(32) NOT NULL,
  `type` varchar(1) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `organization` varchar(32) NOT NULL,
  `remark` varchar(128) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_profile_experience`
--

LOCK TABLES `tbl_profile_experience` WRITE;
/*!40000 ALTER TABLE `tbl_profile_experience` DISABLE KEYS */;
INSERT INTO `tbl_profile_experience` VALUES ('ewrtert','1','2013-09-03','2013-09-06','sdfs','sdsdag');
/*!40000 ALTER TABLE `tbl_profile_experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_profile_workhistory`
--

DROP TABLE IF EXISTS `tbl_profile_workhistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_profile_workhistory` (
  `profile_uid` varchar(32) NOT NULL,
  `department_uid` varchar(32) NOT NULL,
  `position_uid` varchar(32) NOT NULL,
  `event_type` varchar(1) NOT NULL,
  `event_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_profile_workhistory`
--

LOCK TABLES `tbl_profile_workhistory` WRITE;
/*!40000 ALTER TABLE `tbl_profile_workhistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_profile_workhistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `uid` varchar(32) NOT NULL,
  `real_name` varchar(32) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `password_salt` varchar(32) NOT NULL,
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
INSERT INTO `tbl_user` VALUES ('524400ac0b72a5.33689761','冯毅豪','Ram','5f1d7a84db00d2fce00b31a7fc73224f','123456',1),('5264f0ea3938a8.14939456','rw55','23563','ecc848eba61302cacd53747dae144bfe','123456',1),('5264f0ea3939a7.96294742','78','13','ec76afa56fcd9df32bab9a6303aa608b','123456',1),('5264f0ea3939c8.33097950','7655467','abcdefg','483082099c0cd88d44923829b527ae05','123456',1),('5264f394a7d8e2.85689386','tuityui','56788777','85eed6a4ad356916d15ac09f58aacee6','657',1),('5264f394a7d951.81184490','45867','576867','657867','47568765',1),('5264f394a7d982.18314233','itui','8765','678','8hjkg',1),('5264f394a7d9a0.58936584','9623','dgh435','eryterty','3456',1),('5264f394a7d9d4.83036269','gf56','y435324','erty','rty',1),('5264f394a7d9f1.11563085','g7645','dfg','sfdgs','dfhgdfhg',1),('526a4e836b9679.05409811','455555','456','b5c5264b50ef87e6bb2bdda7afcf1e06','526a4e83708691.22509127',1),('526a4ef435b556.80421788','测试帐号','test','062bf941998d728db61c24efe153e1bb','526a4ef43a9926.27745168',1),('526b7d4c207f21.11091361','546456007','007001','f21036661273118f993ac019a9a58fa5','123456',1),('526b7d9dedf781.32721436','111111','111111','94aa2d0f7b093f3f764f01f58fc328cb','526b7d9dedf5d5.16105727',1),('526bf68a7591f5.71701803','23563','eryteryt','dghfdhgfg','123456',1),('526bf7ee596aa7.65429467','3645fghfdh','645yhfd45','ghjfghj','123456',1);
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
  `position_uid` varchar(32) NOT NULL,
  PRIMARY KEY (`user_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_department_position`
--

LOCK TABLES `tbl_user_department_position` WRITE;
/*!40000 ALTER TABLE `tbl_user_department_position` DISABLE KEYS */;
INSERT INTO `tbl_user_department_position` VALUES ('524400ac0b72a5.33689761','524400ac0b71c6.60975257','524400ac0b7251.61057412'),('5264f0ea3938a8.14939456','5247fa2f858474.92636787','5247fa5e90f587.06548277'),('5264f0ea393937.29653220','5255022e40db25.52704262','5247fa5e90f587.06548277'),('5264f0ea393950.90650984','5255022e40da40.79869270','524400ac0b7251.61057412'),('5264f0ea393980.14416922','5255022e40dab1.33384508','5247fa5e90f618.14935915'),('5264f0ea3939a7.96294742','5255022e40da96.47466277','5247fa5e90f618.14935915'),('5264f0ea3939c8.33097950','5255022e40daf2.78386430','5247fa5e90f587.06548277'),('5264f394a7d8e2.85689386','5255022e40da62.05679421','5247fa5e90f618.14935915'),('5264f394a7d951.81184490','5247fa2f8583e9.34371961','5247fa5e90f618.14935915'),('5264f394a7d982.18314233','5255022e40dad7.88061285','5247fa5e90f618.14935915'),('5264f394a7d9a0.58936584','524400ac0b71c6.60975257','5247fa5e90f587.06548277'),('5264f394a7d9d4.83036269','5255022e40da40.79869270','5247fa5e90f587.06548277'),('5264f394a7d9f1.11563085','5255022e40da96.47466277','5247fa5e90f618.14935915'),('526a4e836b9679.05409811','5247fa2f8583e9.34371961','5247fa5e90f587.06548277'),('526a4ef435b556.80421788','5255022e40db62.59719763','5247fa5e90f587.06548277'),('526b7d4c207f21.11091361','5247fa2f8583e9.34371961','5247fa5e90f587.06548277'),('526b7d9dedf781.32721436','5255022e40da40.79869270','5247fa5e90f618.14935915'),('526bf666279cb7.79100699','5255022e40da40.79869270','524400ac0b7251.61057412'),('526bf66c044552.88736464','5255022e40dab1.33384508','5247fa5e90f618.14935915'),('526bf68a7591f5.71701803','5255022e40da40.79869270','524400ac0b7251.61057412'),('526bf7ee596aa7.65429467','5255022e40daf2.78386430','5247fa5e90f587.06548277');
/*!40000 ALTER TABLE `tbl_user_department_position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_group`
--

DROP TABLE IF EXISTS `tbl_user_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_group` (
  `user_uid` varchar(32) NOT NULL,
  `group_uid` varchar(32) NOT NULL,
  PRIMARY KEY (`user_uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_group`
--

LOCK TABLES `tbl_user_group` WRITE;
/*!40000 ALTER TABLE `tbl_user_group` DISABLE KEYS */;
INSERT INTO `tbl_user_group` VALUES ('524400ac0b72a5.33689761','524400ac0b7276.95094144'),('5264f0ea3938a8.14939456','5247fa5e90f634.48352751'),('5264f0ea393937.29653220','5247fa5e90f661.58057565'),('5264f0ea393950.90650984','5247fa5e90f634.48352751'),('5264f0ea393980.14416922','5247fa5e90f634.48352751'),('5264f0ea3939a7.96294742','5247fa5e90f661.58057565'),('5264f0ea3939c8.33097950','5247fa5e90f661.58057565'),('5264f394a7d8e2.85689386','5247fa5e90f634.48352751'),('5264f394a7d951.81184490','5247fa5e90f634.48352751'),('5264f394a7d982.18314233','5247fa5e90f661.58057565'),('5264f394a7d9a0.58936584','5247fa5e90f634.48352751'),('5264f394a7d9d4.83036269','5247fa5e90f634.48352751'),('5264f394a7d9f1.11563085','524400ac0b7276.95094144'),('526a4e836b9679.05409811','5247fa5e90f661.58057565'),('526a4ef435b556.80421788','5247fa5e90f634.48352751'),('526b7d4c207f21.11091361','5247fa5e90f634.48352751'),('526b7d9dedf781.32721436','5247fa5e90f661.58057565'),('526bf666279cb7.79100699','5247fa5e90f634.48352751'),('526bf66c044552.88736464','5247fa5e90f634.48352751'),('526bf68a7591f5.71701803','5247fa5e90f634.48352751'),('526bf7ee596aa7.65429467','5247fa5e90f661.58057565');
/*!40000 ALTER TABLE `tbl_user_group` ENABLE KEYS */;
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

-- Dump completed on 2013-10-27 23:07:18
