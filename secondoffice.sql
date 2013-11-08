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
INSERT INTO `tbl_auth_assignment` VALUES ('52735acfb774e5.79444079','527356acf058d6.15004056',NULL,'N;'),('52735c387d7324.29162716','524400ac0b72a5.33689761',NULL,'N;'),('52735c387d7324.29162716','527356acf06300.02473373',NULL,'N;'),('52735cf0db7ce5.99731514','524400ac0b72a5.33689761',NULL,'N;'),('52735cf0db7ce5.99731514','527356acf06300.02473373',NULL,'N;'),('52735da83ba2b9.67708241','527356acf058d6.15004056',NULL,'N;'),('52735e87cdcca8.61591059','524400ac0b72a5.33689761',NULL,'N;'),('52735e87cdcca8.61591059','527356acf06300.02473373',NULL,'N;'),('52735e921ecdb2.45729104','527356acf058d6.15004056',NULL,'N;');
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
INSERT INTO `tbl_auth_item` VALUES ('524400ac0b7276.95094144',2,'系统管理员',NULL,'N;'),('5247fa2f8583e9.34371961',2,'业务一部',NULL,'N;'),('5255022e40da62.05679421',2,'五部',NULL,'N;'),('5255022e40da96.47466277',2,'六部',NULL,'N;'),('5255022e40daf2.78386430',2,'设计部',NULL,'N;'),('5255022e40db62.59719763',2,'内销部',NULL,'N;'),('52735a9900c553.00993133',2,'总经办',NULL,'N;'),('52735ab80c3702.66471346',2,'业务一部',NULL,'N;'),('52735acfb774e5.79444079',2,'业务二部',NULL,'N;'),('52735b13d48174.27613263',2,'Winmax',NULL,'N;'),('52735b2e2acfe5.51662511',2,'业务四部',NULL,'N;'),('52735b54419e13.68730333',2,'业务五部',NULL,'N;'),('52735b97958d18.06482026',2,'业务八部',NULL,'N;'),('52735bc008d6c9.14852155',2,'BHS',NULL,'N;'),('52735bd5dad818.62636374',2,'YD部',NULL,'N;'),('52735bef6e4f47.63778897',2,'北京分公司',NULL,'N;'),('52735c0b298648.17102224',2,'人事行政部',NULL,'N;'),('52735c2450ea42.82134382',2,'财务部',NULL,'N;'),('52735c387d7324.29162716',2,'信息部',NULL,'N;'),('52735c53129047.78601316',2,'船务部',NULL,'N;'),('52735c68034f83.95003890',2,'设计部',NULL,'N;'),('52735c75e0aad0.63684925',2,'外派人员',NULL,'N;'),('52735caedcb0a0.42923359',2,'设计助理',NULL,'N;'),('52735cb82237b5.90771579',2,'设计助理主办',NULL,'N;'),('52735cbf6ac6b5.51442508',2,'助理设计师',NULL,'N;'),('52735cc9a18d71.49042871',2,'泳装设计师',NULL,'N;'),('52735cd2b8c355.80072966',2,'部门主管',NULL,'N;'),('52735cddb48560.27394528',2,'船务',NULL,'N;'),('52735cea03eb04.73008637',2,'部门经理',NULL,'N;'),('52735cf0db7ce5.99731514',2,'网管员',NULL,'N;'),('52735cf8e5a2f9.47272982',2,'记账员',NULL,'N;'),('52735d0037c365.00138737',2,'出纳',NULL,'N;'),('52735d07738c36.01140327',2,'财务主管',NULL,'N;'),('52735d15368a48.06304028',2,'支出帐务',NULL,'N;'),('52735d1d0c19c8.97988399',2,'办税员',NULL,'N;'),('52735d289ab5a2.62519420',2,'Kis总帐',NULL,'N;'),('52735d2f6f36c7.62670547',2,'K3总帐',NULL,'N;'),('52735d3cb716b8.59721425',2,'经理',NULL,'N;'),('52735d476fbdf0.76781530',2,'司机',NULL,'N;'),('52735d4ee17128.80176250',2,'办事员',NULL,'N;'),('52735d56cb90c7.94358790',2,'保洁员',NULL,'N;'),('52735d60e1e0c9.37094029',2,'前台',NULL,'N;'),('52735d82c8c984.92754337',2,'助理',NULL,'N;'),('52735d894e7c46.70243994',2,'人事主办',NULL,'N;'),('52735d9f70ff13.25220751',2,'网络销售专员',NULL,'N;'),('52735da83ba2b9.67708241',2,'营销助理',NULL,'N;'),('52735db048e1e8.06626305',2,'BHS财务',NULL,'N;'),('52735db90bdaf5.69456111',2,'营销员',NULL,'N;'),('52735dc4915780.71855762',2,'办事员',NULL,'N;'),('52735df12e9ea2.83872325',2,'营销经理',NULL,'N;'),('52735e02863489.27537896',2,'QC',NULL,'N;'),('52735e11111999.28698067',2,'跟单员',NULL,'N;'),('52735e266b3ac8.77084965',2,'跟单操作经理',NULL,'N;'),('52735e33bcf9a3.27249805',2,'华东区销售总监',NULL,'N;'),('52735e3f878e23.95987035',2,'网络营销助理',NULL,'N;'),('52735e6d6856c5.16602147',2,'总经理秘书',NULL,'N;'),('52735e76e32cb2.83480795',2,'副总',NULL,'N;'),('52735e87cdcca8.61591059',2,'系统管理员',NULL,'N;'),('52735e921ecdb2.45729104',2,'普通用户',NULL,'N;'),('5273604cca9884.34865108',2,'内销',NULL,'N;'),('527360e38697d6.13904089',2,'实习生',NULL,'N;'),('527365d5c3f316.05087615',2,'采购跟单',NULL,'N;'),('527366005991f1.91506203',2,'采购员',NULL,'N;'),('527367a0990e28.25516803',2,'总经理',NULL,'N;'),('secondoffice-attendance',1,'Attendance Auth',NULL,'N;'),('secondoffice-attendance-data-management',0,'Data Management',NULL,'N;'),('secondoffice-attendance-experience-management',0,'Experience Management',NULL,'N;'),('secondoffice-attendance-module-access',0,'Module Access',NULL,'N;'),('secondoffice-profile',1,'Profile Auth',NULL,'N;'),('secondoffice-profile-data-management',0,'Data Management',NULL,'N;'),('secondoffice-profile-experience-management',0,'Experience Management',NULL,'N;'),('secondoffice-profile-module-access',0,'Module Access',NULL,'N;'),('secondoffice-sysytem',1,'系统模块权限',NULL,'N;'),('secondoffice-sysytem-config',0,'系统设置',NULL,'N;'),('secondoffice-sysytem-module-management',0,'模块管理',NULL,'N;'),('secondoffice-sysytem-user-management',0,'用户管理',NULL,'N;');
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
INSERT INTO `tbl_auth_item_child` VALUES ('secondoffice-attendance','secondoffice-attendance-data-management'),('secondoffice-attendance','secondoffice-attendance-experience-management'),('52735e87cdcca8.61591059','secondoffice-attendance-module-access'),('secondoffice-attendance','secondoffice-attendance-module-access'),('secondoffice-profile','secondoffice-profile-data-management'),('secondoffice-profile','secondoffice-profile-experience-management'),('52735e87cdcca8.61591059','secondoffice-profile-module-access'),('secondoffice-profile','secondoffice-profile-module-access'),('52735e87cdcca8.61591059','secondoffice-sysytem-config'),('secondoffice-sysytem','secondoffice-sysytem-config'),('52735e87cdcca8.61591059','secondoffice-sysytem-module-management'),('secondoffice-sysytem','secondoffice-sysytem-module-management'),('52735e87cdcca8.61591059','secondoffice-sysytem-user-management'),('secondoffice-sysytem','secondoffice-sysytem-user-management');
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
  `manageruid` varchar(32) NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_department`
--

LOCK TABLES `tbl_department` WRITE;
/*!40000 ALTER TABLE `tbl_department` DISABLE KEYS */;
INSERT INTO `tbl_department` VALUES ('52735a9900c553.00993133','','总经办','527356acf055c4.32843250',1),('52735ab80c3702.66471346','52735a9900c553.00993133','业务一部','527356acf056a0.27752008',1),('52735acfb774e5.79444079','52735a9900c553.00993133','业务二部','527356acf057b7.55559405',1),('52735b13d48174.27613263','52735a9900c553.00993133','Winmax','527356acf05942.04012305',1),('52735b2e2acfe5.51662511','52735a9900c553.00993133','业务四部','527356acf05b88.82513064',1),('52735b54419e13.68730333','52735a9900c553.00993133','业务五部','527356acf05df2.74037902',1),('52735b97958d18.06482026','52735a9900c553.00993133','业务八部','527356acf05e85.41455033',1),('52735bc008d6c9.14852155','52735a9900c553.00993133','BHS','527356acf055c4.32843250',1),('52735bd5dad818.62636374','52735a9900c553.00993133','YD部','527356acf055c4.32843250',1),('52735bef6e4f47.63778897','52735a9900c553.00993133','北京分公司','527356acf05f95.20271434',1),('52735c0b298648.17102224','52735a9900c553.00993133','人事行政部','527356acf05645.96171820',1),('52735c2450ea42.82134382','52735a9900c553.00993133','财务部','527356acf06109.85555145',1),('52735c387d7324.29162716','52735a9900c553.00993133','信息部','527356acf062e5.90802093',1),('52735c53129047.78601316','52735a9900c553.00993133','船务部','527356acf06346.32777457',1),('52735c68034f83.95003890','52735a9900c553.00993133','设计部','527356acf06407.57262525',1),('52735c75e0aad0.63684925','52735a9900c553.00993133','外派人员','527356acf055c4.32843250',1);
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
INSERT INTO `tbl_group` VALUES ('52735e87cdcca8.61591059','系统管理员',1),('52735e921ecdb2.45729104','普通用户',1);
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
  `version` varchar(32) NOT NULL DEFAULT '',
  `author` varchar(32) NOT NULL DEFAULT '',
  `params` text,
  `install` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_module`
--

LOCK TABLES `tbl_module` WRITE;
/*!40000 ALTER TABLE `tbl_module` DISABLE KEYS */;
INSERT INTO `tbl_module` VALUES ('5277502ba7d8d2.65759351','Profile Management','1.0.0','Ram',NULL,1,1);
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
INSERT INTO `tbl_position` VALUES ('52735caedcb0a0.42923359','设计助理',1),('52735cb82237b5.90771579','设计助理主办',1),('52735cbf6ac6b5.51442508','助理设计师',1),('52735cc9a18d71.49042871','泳装设计师',1),('52735cd2b8c355.80072966','部门主管',1),('52735cddb48560.27394528','船务',1),('52735cea03eb04.73008637','部门经理',1),('52735cf0db7ce5.99731514','网管员',1),('52735cf8e5a2f9.47272982','记账员',1),('52735d0037c365.00138737','出纳',1),('52735d07738c36.01140327','财务主管',1),('52735d15368a48.06304028','支出帐务',1),('52735d1d0c19c8.97988399','办税员',1),('52735d289ab5a2.62519420','Kis总帐',1),('52735d2f6f36c7.62670547','K3总帐',1),('52735d3cb716b8.59721425','经理',1),('52735d476fbdf0.76781530','司机',1),('52735d4ee17128.80176250','办事员',1),('52735d56cb90c7.94358790','保洁员',1),('52735d60e1e0c9.37094029','前台',1),('52735d82c8c984.92754337','助理',1),('52735d894e7c46.70243994','人事主办',1),('52735d9f70ff13.25220751','网络销售专员',1),('52735da83ba2b9.67708241','营销助理',1),('52735db048e1e8.06626305','BHS财务',1),('52735db90bdaf5.69456111','营销员',1),('52735df12e9ea2.83872325','营销经理',1),('52735e02863489.27537896','QC',1),('52735e11111999.28698067','跟单员',1),('52735e266b3ac8.77084965','跟单操作经理',1),('52735e33bcf9a3.27249805','华东区销售总监',1),('52735e3f878e23.95987035','网络营销助理',1),('52735e6d6856c5.16602147','总经理秘书',1),('52735e76e32cb2.83480795','副总',1),('5273604cca9884.34865108','内销',1),('527360e38697d6.13904089','实习生',1),('527365d5c3f316.05087615','采购跟单',1),('527366005991f1.91506203','采购员',1),('527367a0990e28.25516803','总经理',1);
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
  `user_uid` varchar(32) NOT NULL DEFAULT '',
  `name` varchar(32) NOT NULL,
  `photo` varchar(32) NOT NULL DEFAULT '',
  `sex` varchar(1) NOT NULL DEFAULT 'M',
  `birthday` date NOT NULL,
  `hometown` varchar(16) NOT NULL DEFAULT '',
  `education` varchar(32) NOT NULL DEFAULT '',
  `work_phone` varchar(32) NOT NULL DEFAULT '',
  `mobie_phone` varchar(32) NOT NULL DEFAULT '',
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
-- Table structure for table `tbl_profile_career`
--

DROP TABLE IF EXISTS `tbl_profile_career`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_profile_career` (
  `profile_uid` varchar(32) NOT NULL,
  `type` varchar(8) NOT NULL DEFAULT 'edu',
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `organization` varchar(64) NOT NULL,
  `remark` varchar(512) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_profile_career`
--

LOCK TABLES `tbl_profile_career` WRITE;
/*!40000 ALTER TABLE `tbl_profile_career` DISABLE KEYS */;
INSERT INTO `tbl_profile_career` VALUES ('ewrtert','1','2013-09-03','2013-09-06','sdfs','sdsdag');
/*!40000 ALTER TABLE `tbl_profile_career` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_profile_workhistory`
--

DROP TABLE IF EXISTS `tbl_profile_workhistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_profile_workhistory` (
  `profile_uid` varchar(32) NOT NULL,
  `eventtype_uid` varchar(32) NOT NULL,
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
INSERT INTO `tbl_user` VALUES ('524400ac0b72a5.33689761','系统管理员','admin','1f05e05bfd6acdaaaf78ee9f8c7a1777','5264f394a7d8e2.85689386',1),('527356acf055c4.32843250','李榕庆','Terry','cb03a2f721f287b0957b0d18f05a83e8','52735786ababc7.12454807',1),('527356acf055f1.12039072','谢赞华','Angel','60468b740224c31a770d0cfed2dac6be','52735786abac22.76583953',1),('527356acf05614.46018130','吴伟宁','Annie','637354cca7b431ecb134b09f2a27e264','52735786abac62.58713290',1),('527356acf05645.96171820','陈惠冰','Bing','89a53e6a53050bb8b34f1a752627773a','52735786abacb5.24827174',1),('527356acf05663.15980677','霍美琳','Cobie','ac317c69f9ae715aacf8d51b9277a2ee','52735786abacf0.75197013',1),('527356acf05682.97648558','黄雍','David','f1d30060b65fb6b8f38ffc0aa923d6f4','52735786abad34.46194985',1),('527356acf056a0.27752008','陈小慧','Ava','3ee8782fb8aadd334f1910e13fea196a','52735786abad76.90286411',1),('527356acf056d0.54134837','陈慧敏','Janice','5ed1b10555ee187bee8a8537a6a7120c','52735786abadc7.08142754',1),('527356acf056f4.99266084','余炎平','Stephen','d07595a9664492152b8fda17460b07e2','52735786abae08.18241344',1),('527356acf05718.92062220','罗淑贤','Susanna','283843e544eae83ad91fb1f6da944a90','52735786abae57.77490658',1),('527356acf05746.07369857','蔡泽桦','Cassie','64fbd141f44f22d0d4ec8b7d0c733361','52735786abae98.09686681',1),('527356acf05766.66823280','陈佳子','Tina','e2e8256c76d8780902f06cab352f97ac','52735786abaee4.51291847',1),('527356acf05787.46799992','朱丽娜','Julia','08b12f2e199da0621d5d93ef94d37729','52735786abaf32.72845465',1),('527356acf057b7.55559405','沈淑芳','Faye','86c551de66200e3f4ee1766202d81be5','52735786abaf79.21917381',1),('527356acf057d8.15662623','李国颖','Wing','01bdc07538ad54b5c6dba4810eb2049d','52735786abafc7.14191119',1),('527356acf057f6.50668183','陈雅岚','Anthea','1ee5afbe7352062271c626a24063530f','52735786abb014.28486274',1),('527356acf05825.20141754','钟肖英','Cecilia','29dfca16929554ff9076af9b0503f8c2','52735786abb057.12058789',1),('527356acf05842.11376649','陈绮君','Daisy','00c1e9845d60a077d509c6da8c3c8d52','52735786abb096.98139294',1),('527356acf05869.54342972','莫亚','Yaya','ddf821f7af5f9e1a2647691cc17ab47e','52735786abb0e4.22495180',1),('527356acf05889.96587900','朱小清','Iric','29038a64db934ad1798e845c40d882f8','52735786abb123.85667835',1),('527356acf058a0.80358034','张关凤','Macy','8b152a09074bb654d790f15c185af694','52735786abb178.03100809',1),('527356acf058d6.15004056','谢琼深','Samxie','d5900483e320e646b1d38a7bba64382e','52735786abb1c5.85228787',1),('527356acf058f5.34859039','林凯红','Kiki','5e0b3939dbaf63a86f9d68a9b7464fd9','52735786abb209.22397127',1),('527356acf05919.16258132','李国清','Aaron','5d3097722bc2d4cb572403bcf93027b8','52735786abb249.84939958',1),('527356acf05942.04012305','陈培雄','Robin','2e97b2e15a3cc09e2e9c257f67d55a23','52735786abb299.29295551',1),('527356acf05966.63047041','吕玉玲','Lilian','373b8a1db7f045f108c9e7a87eed23f0','52735786abb2e7.32935803',1),('527356acf05989.59745511','梁韵思','Season','60b8fa94cc756d45ec57128121c839a7','52735786abb328.07687650',1),('527356acf059b6.02968251','范翠微','Ellien','7f441f9b36488da1992ef20ed4689c53','52735786abb367.42402596',1),('527356acf059d8.32203749','吴冰霞','Murley','4f809e2f3246b1acecbb739c4459fa13','52735786abb3b8.85077742',1),('527356acf059f1.29865178','李广博','Brace','d3d3e7f339220dee8bf97fc47ae38d76','52735786abb3f9.94996187',1),('527356acf05a29.11432174','蔡艳','Yannet','e6071904878d6046f311d3c294b10a99','52735786abb462.12258621',1),('527356acf05a40.21755336','王东晓','Donna','2a6ae9915616f68866d3916acf072e61','52735786abb4b3.64566385',1),('527356acf05a69.38132214','潘伶','Penny','386f8cc7bb93647f87109eeb00e766d8','52735786abb4f2.42276863',1),('527356acf05a81.87866910','张婷婷','Tt','053f87b359cf3a80f43309db04f032f1','52735786abb542.07049674',1),('527356acf05ab4.26294644','陈文斌','Jack','c3ff9e0c09f3790bf32335804762e843','52735786abb588.93859647',1),('527356acf05ad2.23750913','苏凤娣','Cindy','b4e558d87f66f53d61b8283e73906d12','52735786abb5c8.59674309',1),('527356acf05af0.89156745','何嘉斌','Ben','5e9ff593d5e1468240223af86b0e1378','52735786abb610.45478651',1),('527356acf05b20.23922350','孙栋炜','孙栋炜','f434a6d98ddad821394c1cf9a607c169','52735786abb657.41924027',1),('527356acf05b48.33105583','阳厚勤','阳厚勤','3146062c63f55c6596599b6bb2ff57ed','52735786abb6a6.16546760',1),('527356acf05b64.60711631','李翠兰','Treem','69f32eaa5164ae7ab5c7226884b1cae9','52735786abb6f4.88243558',1),('527356acf05b88.82513064','朱远雄','Frankie','cd3763c61e81c53344049befe1a9aa99','52735786abb733.20394394',1),('527356acf05bb1.02304031','黎丽','Emily','42eacf3a8185ead06fb5443a317641fd','52735786abb788.77969830',1),('527356acf05bd2.18285690','杨冬生','Ansen','da3d6e20138c4b2061c5f394d3657db1','52735786abb7c4.13183483',1),('527356acf05bf9.82181290','陆凤霞','Alina','2860195e1b1b45650a7a829f3e08af21','52735786abb810.28592975',1),('527356acf05c12.59000532','陈文娉','Wendy','6d43cd5a845674e371f608f6d56a82da','52735786abb868.17297808',1),('527356acf05c43.80577096','林颖良','Henry','58765f68b00609eae6f4af1b1fa2a73a','52735786abb8c6.59453043',1),('527356acf05c64.17579461','何莎莎','Sylvia','4deadf17d1bc61df945a40d5b645dbfd','52735786abb914.82264271',1),('527356acf05c84.08353441','伍菲菲','Rita','39a798593dd4ff69677a3de358837357','52735786abb953.18866660',1),('527356acf05cb9.65056023','吴嫒欣','Joe','150b295b2eb616d004424e7b74c9e0fd','52735786abb9a2.09054402',1),('527356acf05cd2.66176181','李丽仪','Chary','838192426acd069aae3c506838d1079e','52735786abb9e8.08323644',1),('527356acf05cf9.18796337','罗爱兴','Irene','6d48a60ea549af3392ecd37938407c29','52735786abba33.21004307',1),('527356acf05d27.55846696','邓翠云','Emma','54aa9b3e6aa47b28f49bd13720f29ef6','52735786abba75.71632470',1),('527356acf05d46.91346337','古洁茹','Jessica','0663b8bb1124fc3c422dc1367802cde9','52735786abbac9.10786835',1),('527356acf05d68.30219239','林贤玲','Ling','c9f599782ad2787849cb3783e2bbdb17','52735786abbb08.34882967',1),('527356acf05d83.72986630','李平','Denise','2a367ef0a708364408db84f6ba26eef9','52735786abbb59.48604093',1),('527356acf05db7.42923329','陈良伟','Tony','af394874b74efea108c49a847638c3c3','52735786abbb99.98099068',1),('527356acf05dd0.44086396','冯祥锡','Sonic','97ad905fd58163d4f461d11bc87ea803','52735786abbbe2.82328204',1),('527356acf05df2.74037902','赖淑君','Sally','58a7715a8c2df8c03a86887c348a7c6c','52735786abbc28.20894079',1),('527356acf05e23.43229018','曾文宜','Echo','0191caf2c83cef368cbdf617a24b7823','52735786abbc78.08841142',1),('527356acf05e49.51587329','邹里华','Joey','d21845b5b01467b699f7f5d8dce2d3e1','52735786abbcb1.48586372',1),('527356acf05e65.04400484','赵必仰','Bill','891c4ffc7e1b67ca3e723f67964f47b5','52735786abbd09.86309777',1),('527356acf05e85.41455033','梁嘉键','Lucas','0f517d48850d3bb46a2f73e8f2f67440','52735786abbd51.67768913',1),('527356acf05eb0.04619374','周泳流','Gary','f49bd58bdf896b2832cb0e0f33b69ca2','52735786abbd99.03119459',1),('527356acf05ed2.59924736','陈颖怡','Lena','76c0f58baf2b1d89b24b7d1c16b6729c','52735786abbde3.65493030',1),('527356acf05ef9.25166779','韦丽雪','韦丽雪','e2db60b3cc3cd828da0d4a460cdbc09a','52735786abbe29.49084386',1),('527356acf05f24.25176645','黄艳华','Yan','730697cb684d66da23ff46dbe47d9262','52735786abbe78.66115923',1),('527356acf05f44.57255211','邹晓丹','Color','95364a4411d016fcaff7670c9aafb41e','52735786abbeb7.25150154',1),('527356acf05f67.04543178','陈健','Darren','c03a63e23deb98a7c6cae33aa1cb5131','52735786abbf06.93590417',1),('527356acf05f95.20271434','李伟','李伟','170e21e5fc21abef3dfd863001ae3972','52735786abbf48.10493570',1),('527356acf05fb5.55742432','王闰','王闰','7b7d7b803c63f06caeb61f6f0e56403c','52735786abbf92.84017798',1),('527356acf05fe3.24276823','唐敏','Tammy','98910d2a7591ed6823f73090e9988b73','52735786abbfd9.27698669',1),('527356acf06000.40114696','朱卉珊','Sariel','ccb07d31bfba83b46c09d6f6a0127866','52735786abc039.97729955',1),('527356acf06023.00335653','王紫礽','Kay','d09a88c613b339ed0669935de39f1561','52735786abc086.19619202',1),('527356acf06046.91314830','夏春梅','夏春梅','c9333356bd3ea57628283f2bbe6f3241','52735786abc0d9.81826545',1),('527356acf06074.91347209','简志雄','简志雄','ffe3502a9675e8dc4e7364548c9ba5bb','52735786abc114.16539882',1),('527356acf06092.34763043','姚树英','姚树英','7dc369ce54c755baaa1c762a8505542a','52735786abc168.08886653',1),('527356acf060b4.55724021','陶毅武','陶毅武','ab42333017554f6a66176d842de758ee','52735786abc1a7.07885691',1),('527356acf060d1.84222631','欧学勤','欧学勤','4f53f42c5bdda1a22217aa838aa72135','52735786abc1f2.25860658',1),('527356acf06109.85555145','罗慧','罗慧','ead06c0c817988b56351dc0b16b82787','52735786abc230.96525402',1),('527356acf06128.58527857','张梅','张梅','8fb23f5a33682186e446f24fe76de728','52735786abc280.16583696',1),('527356acf06149.53426626','洪芸','洪芸','419038c2e49d2493164caac2d6d02776','52735786abc2c1.89827761',1),('527356acf06174.93142842','李秀珠','李秀珠','0c7e9092f531d247f884f5fa119fb730','52735786abc311.73206230',1),('527356acf06195.31840262','廖灿芝','廖灿芝','afa21800045dfcf0270073da713ff37b','52735786abc357.34476818',1),('527356acf061b3.43823481','吴素静','吴素静','816436b109ecda97b33fcc581b80af6a','52735786abc3a1.24931209',1),('527356acf061e4.98674152','张晓霞','张晓霞','961a2d962f8dfdf309781b68bb358f08','52735786abc3e6.23934543',1),('527356acf06200.93904690','邱冬丽','Cathy','99bb0ad542092b81e2f61790191d97b0','52735786abc430.84118959',1),('527356acf06225.88717790','陈慧君','Kelly','0a379001c869385e4530c02854c92b23','52735786abc477.81698868',1),('527356acf06240.69328786','张云飞','张云飞','891ccd90c98e10fba985a35ccd1b3dfd','52735786abc4c8.29173404',1),('527356acf06273.36690583','凌春丽','Shelly','dc95a13d25d459d857fe3f4a43007439','52735786abc506.62845108',1),('527356acf06293.07683201','马健丽','Niki','0a87e987869a637b683c94f23d5ec0ed','52735786abc551.77685732',1),('527356acf062b2.65765935','符柳','Amy','c926d90997e2c283f59400ae857e3513','52735786abc5a1.98830628',1),('527356acf062e5.90802093','林菁','Jane','338edf8bdfd0167c0a7cfc043b4e5aa1','52735786abc5e5.46900136',1),('527356acf06300.02473373','冯毅豪','Ram','6294940d0311181014f00c78fd6f37cd','52735786abc631.06221835',1),('527356acf06329.69931773','邓嘉明','邓嘉明','3a4427c67365373d3a3b2c9938e4f240','52735786abc671.99456206',1),('527356acf06346.32777457','李雪灵','Sherry','465d2068665f141ca733d4711ed5bcff','52735786abc6b4.17400300',1),('527356acf06372.64674770','蓝秋香','Challor','033a07b6867a1ee8e4739af91ecc7f26','52735786abc709.68605530',1),('527356acf06396.90560712','陈欣然','Chris','d523a53276d277f7784f182f8d247db1','52735786abc757.73467709',1),('527356acf063b3.60569260','陆健婷','Justine','213446247d2acf20f1b93f4d8eff1c75','52735786abc792.74869529',1),('527356acf063e7.45617086','刘洁静','Pepsi','e881664e28c6cfb9711963e745455aaf','52735786abc7d0.61113230',1),('527356acf06407.57262525','曾少宝','Trouble','add403e2d08258de35bf5f837bc8c582','52735786abc826.29746185',1),('527356acf06426.12259023','卢柳娟','Fiona','3aec4ba4c9ca0e22b10fdff51d895806','52735786abc876.03229445',1),('527356acf06442.95190239','廖慧','Ivy','4c7e94d17e57b361ee82f3c07072cd29','52735786abc8b0.80707844',1),('527356acf06461.06340773','钟志强','Johnny','480cacaca2d6a3686351af38effe2d07','52735786abc900.44375274',1),('527356acf06495.91573363','黄嘉滢','Jaylyn','a13b915db02d440ec4759e0248bc4524','52735786abc951.18824309',1),('527356acf064b4.13622658','陈妃','Sarah','12ef7f46ece674ac462d46a7b5910eb2','52735786abc9a7.05639493',1),('527356acf064d9.88912423','陈伟萍','Sharon','3796883b0bcfc8e65fa31edd678fa485','52735786abc9e9.56071808',1),('527356acf06502.75390138','吴永成','Cyrus','38dac60a37bef4ce334ed63bcebf8fe9','52735786abca33.85202887',1),('527356acf06527.70027045','黄计苗','Jim','fd9b582f5899bcc205175d3af249ead0','52735786abca99.80807595',1),('527356acf06542.30774832','陈龙英','Abby','b533913c9e9bbc42a0374ff439b1015d','52735786abcae2.72806049',1),('527356acf06578.77331152','张治国','Sam','c7685ec410150915a09767adb0efa0c5','52735786abcb50.28519653',1),('527356acf06597.01424348','刘定清','Summer','dd2a445203f793ed6fec46bf576a2aa1','52735786abcb99.77360818',1),('527356acf065b5.22835228','李月瑜','Jenny','01e4072f4369380e6f251bd783f0e31b','52735786abcbe7.32341601',1);
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
INSERT INTO `tbl_user_department_position` VALUES ('524400ac0b72a5.33689761','52735c387d7324.29162716','52735cf0db7ce5.99731514'),('527356acf055c4.32843250','52735a9900c553.00993133','527367a0990e28.25516803'),('527356acf055f1.12039072','52735a9900c553.00993133','52735e76e32cb2.83480795'),('527356acf05614.46018130','52735a9900c553.00993133','52735e76e32cb2.83480795'),('527356acf05645.96171820','52735a9900c553.00993133','52735e76e32cb2.83480795'),('527356acf05663.15980677','52735a9900c553.00993133','52735e6d6856c5.16602147'),('527356acf05682.97648558','52735a9900c553.00993133','52735d4ee17128.80176250'),('527356acf056a0.27752008','52735ab80c3702.66471346','52735cea03eb04.73008637'),('527356acf056d0.54134837','52735ab80c3702.66471346','52735cea03eb04.73008637'),('527356acf056f4.99266084','52735ab80c3702.66471346','52735db90bdaf5.69456111'),('527356acf05718.92062220','52735ab80c3702.66471346','52735db90bdaf5.69456111'),('527356acf05746.07369857','52735ab80c3702.66471346','52735da83ba2b9.67708241'),('527356acf05766.66823280','52735ab80c3702.66471346','52735da83ba2b9.67708241'),('527356acf05787.46799992','52735ab80c3702.66471346','52735da83ba2b9.67708241'),('527356acf057b7.55559405','52735acfb774e5.79444079','52735cea03eb04.73008637'),('527356acf057d8.15662623','52735acfb774e5.79444079','52735df12e9ea2.83872325'),('527356acf057f6.50668183','52735acfb774e5.79444079','52735df12e9ea2.83872325'),('527356acf05825.20141754','52735acfb774e5.79444079','52735db90bdaf5.69456111'),('527356acf05842.11376649','52735acfb774e5.79444079','52735db90bdaf5.69456111'),('527356acf05869.54342972','52735acfb774e5.79444079','52735db90bdaf5.69456111'),('527356acf05889.96587900','52735acfb774e5.79444079','52735db90bdaf5.69456111'),('527356acf058a0.80358034','52735acfb774e5.79444079','52735db90bdaf5.69456111'),('527356acf058d6.15004056','52735acfb774e5.79444079','52735da83ba2b9.67708241'),('527356acf058f5.34859039','52735acfb774e5.79444079','52735da83ba2b9.67708241'),('527356acf05919.16258132','52735acfb774e5.79444079','52735e02863489.27537896'),('527356acf05942.04012305','52735b13d48174.27613263','52735cea03eb04.73008637'),('527356acf05966.63047041','52735b13d48174.27613263','52735da83ba2b9.67708241'),('527356acf05989.59745511','52735b13d48174.27613263','52735db90bdaf5.69456111'),('527356acf059b6.02968251','52735b13d48174.27613263','52735db90bdaf5.69456111'),('527356acf059d8.32203749','52735b13d48174.27613263','52735da83ba2b9.67708241'),('527356acf059f1.29865178','52735b13d48174.27613263','52735da83ba2b9.67708241'),('527356acf05a29.11432174','52735b13d48174.27613263','52735da83ba2b9.67708241'),('527356acf05a40.21755336','52735b13d48174.27613263','52735e3f878e23.95987035'),('527356acf05a69.38132214','52735b13d48174.27613263','527366005991f1.91506203'),('527356acf05a81.87866910','52735b13d48174.27613263','52735da83ba2b9.67708241'),('527356acf05ab4.26294644','52735b13d48174.27613263','527365d5c3f316.05087615'),('527356acf05ad2.23750913','52735b13d48174.27613263','527365d5c3f316.05087615'),('527356acf05af0.89156745','52735b13d48174.27613263','52735e02863489.27537896'),('527356acf05b20.23922350','52735b13d48174.27613263','52735e33bcf9a3.27249805'),('527356acf05b48.33105583','52735b13d48174.27613263','527360e38697d6.13904089'),('527356acf05b64.60711631','52735b13d48174.27613263','52735da83ba2b9.67708241'),('527356acf05b88.82513064','52735b2e2acfe5.51662511','52735cea03eb04.73008637'),('527356acf05bb1.02304031','52735b2e2acfe5.51662511','52735df12e9ea2.83872325'),('527356acf05bd2.18285690','52735b2e2acfe5.51662511','52735e266b3ac8.77084965'),('527356acf05bf9.82181290','52735b2e2acfe5.51662511','52735db90bdaf5.69456111'),('527356acf05c12.59000532','52735b2e2acfe5.51662511','52735df12e9ea2.83872325'),('527356acf05c43.80577096','52735b2e2acfe5.51662511','52735db90bdaf5.69456111'),('527356acf05c64.17579461','52735b2e2acfe5.51662511','52735db90bdaf5.69456111'),('527356acf05c84.08353441','52735b2e2acfe5.51662511','52735db90bdaf5.69456111'),('527356acf05cb9.65056023','52735b2e2acfe5.51662511','52735db90bdaf5.69456111'),('527356acf05cd2.66176181','52735b2e2acfe5.51662511','52735db90bdaf5.69456111'),('527356acf05cf9.18796337','52735b2e2acfe5.51662511','52735da83ba2b9.67708241'),('527356acf05d27.55846696','52735b2e2acfe5.51662511','52735da83ba2b9.67708241'),('527356acf05d46.91346337','52735b2e2acfe5.51662511','52735e11111999.28698067'),('527356acf05d68.30219239','52735b2e2acfe5.51662511','52735e11111999.28698067'),('527356acf05d83.72986630','52735b2e2acfe5.51662511','52735e11111999.28698067'),('527356acf05db7.42923329','52735b2e2acfe5.51662511','52735e02863489.27537896'),('527356acf05dd0.44086396','52735b2e2acfe5.51662511','52735e02863489.27537896'),('527356acf05df2.74037902','52735b54419e13.68730333','52735cea03eb04.73008637'),('527356acf05e23.43229018','52735b54419e13.68730333','52735db90bdaf5.69456111'),('527356acf05e49.51587329','52735b54419e13.68730333','52735db90bdaf5.69456111'),('527356acf05e65.04400484','52735b97958d18.06482026','52735df12e9ea2.83872325'),('527356acf05e85.41455033','52735b97958d18.06482026','52735df12e9ea2.83872325'),('527356acf05eb0.04619374','52735b97958d18.06482026','52735d4ee17128.80176250'),('527356acf05ed2.59924736','52735b97958d18.06482026','52735db90bdaf5.69456111'),('527356acf05ef9.25166779','52735bc008d6c9.14852155','52735da83ba2b9.67708241'),('527356acf05f24.25176645','52735bc008d6c9.14852155','52735db048e1e8.06626305'),('527356acf05f44.57255211','52735bd5dad818.62636374','52735da83ba2b9.67708241'),('527356acf05f67.04543178','52735bd5dad818.62636374','52735d9f70ff13.25220751'),('527356acf05f95.20271434','52735bef6e4f47.63778897','527360e38697d6.13904089'),('527356acf05fb5.55742432','52735bef6e4f47.63778897','527360e38697d6.13904089'),('527356acf05fe3.24276823','52735c0b298648.17102224','52735d894e7c46.70243994'),('527356acf06000.40114696','52735c0b298648.17102224','52735d82c8c984.92754337'),('527356acf06023.00335653','52735c0b298648.17102224','52735d60e1e0c9.37094029'),('527356acf06046.91314830','52735c0b298648.17102224','52735d56cb90c7.94358790'),('527356acf06074.91347209','52735c0b298648.17102224','52735d4ee17128.80176250'),('527356acf06092.34763043','52735c0b298648.17102224','52735d476fbdf0.76781530'),('527356acf060b4.55724021','52735c0b298648.17102224','52735d476fbdf0.76781530'),('527356acf060d1.84222631','52735c0b298648.17102224','52735d476fbdf0.76781530'),('527356acf06109.85555145','52735c2450ea42.82134382','52735d3cb716b8.59721425'),('527356acf06128.58527857','52735c2450ea42.82134382','52735d2f6f36c7.62670547'),('527356acf06149.53426626','52735c2450ea42.82134382','52735d289ab5a2.62519420'),('527356acf06174.93142842','52735c2450ea42.82134382','52735d0037c365.00138737'),('527356acf06195.31840262','52735c2450ea42.82134382','52735d1d0c19c8.97988399'),('527356acf061b3.43823481','52735c2450ea42.82134382','52735d15368a48.06304028'),('527356acf061e4.98674152','52735c2450ea42.82134382','5273604cca9884.34865108'),('527356acf06200.93904690','52735c2450ea42.82134382','527360e38697d6.13904089'),('527356acf06225.88717790','52735c2450ea42.82134382','527360e38697d6.13904089'),('527356acf06240.69328786','52735c2450ea42.82134382','527360e38697d6.13904089'),('527356acf06273.36690583','52735c2450ea42.82134382','52735d07738c36.01140327'),('527356acf06293.07683201','52735c2450ea42.82134382','52735d0037c365.00138737'),('527356acf062b2.65765935','52735c2450ea42.82134382','52735cf8e5a2f9.47272982'),('527356acf062e5.90802093','52735c387d7324.29162716','52735cea03eb04.73008637'),('527356acf06300.02473373','52735c387d7324.29162716','52735cf0db7ce5.99731514'),('527356acf06329.69931773','52735c387d7324.29162716','52735cf0db7ce5.99731514'),('527356acf06346.32777457','52735c53129047.78601316','52735cea03eb04.73008637'),('527356acf06372.64674770','52735c53129047.78601316','52735cddb48560.27394528'),('527356acf06396.90560712','52735c53129047.78601316','52735cddb48560.27394528'),('527356acf063b3.60569260','52735c53129047.78601316','52735cddb48560.27394528'),('527356acf063e7.45617086','52735c53129047.78601316','52735cddb48560.27394528'),('527356acf06407.57262525','52735c68034f83.95003890','52735cd2b8c355.80072966'),('527356acf06426.12259023','52735c68034f83.95003890','52735cc9a18d71.49042871'),('527356acf06442.95190239','52735c68034f83.95003890','52735cbf6ac6b5.51442508'),('527356acf06461.06340773','52735c68034f83.95003890','52735cbf6ac6b5.51442508'),('527356acf06495.91573363','52735c68034f83.95003890','52735cbf6ac6b5.51442508'),('527356acf064b4.13622658','52735c68034f83.95003890','52735cb82237b5.90771579'),('527356acf064d9.88912423','52735c68034f83.95003890','52735caedcb0a0.42923359'),('527356acf06502.75390138','52735c68034f83.95003890','52735caedcb0a0.42923359'),('527356acf06527.70027045','52735c68034f83.95003890','52735caedcb0a0.42923359'),('527356acf06542.30774832','52735c68034f83.95003890','52735caedcb0a0.42923359'),('527356acf06578.77331152','52735c75e0aad0.63684925','527360e38697d6.13904089'),('527356acf06597.01424348','52735c75e0aad0.63684925','527360e38697d6.13904089'),('527356acf065b5.22835228','52735c75e0aad0.63684925','527360e38697d6.13904089');
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
INSERT INTO `tbl_user_group` VALUES ('524400ac0b72a5.33689761','52735e87cdcca8.61591059'),('527356acf055c4.32843250','52735e921ecdb2.45729104'),('527356acf055f1.12039072','52735e921ecdb2.45729104'),('527356acf05614.46018130','52735e921ecdb2.45729104'),('527356acf05645.96171820','52735e921ecdb2.45729104'),('527356acf05663.15980677','52735e921ecdb2.45729104'),('527356acf05682.97648558','52735e921ecdb2.45729104'),('527356acf056a0.27752008','52735e921ecdb2.45729104'),('527356acf056d0.54134837','52735e921ecdb2.45729104'),('527356acf056f4.99266084','52735e921ecdb2.45729104'),('527356acf05718.92062220','52735e921ecdb2.45729104'),('527356acf05746.07369857','52735e921ecdb2.45729104'),('527356acf05766.66823280','52735e921ecdb2.45729104'),('527356acf05787.46799992','52735e921ecdb2.45729104'),('527356acf057b7.55559405','52735e921ecdb2.45729104'),('527356acf057d8.15662623','52735e921ecdb2.45729104'),('527356acf057f6.50668183','52735e921ecdb2.45729104'),('527356acf05825.20141754','52735e921ecdb2.45729104'),('527356acf05842.11376649','52735e921ecdb2.45729104'),('527356acf05869.54342972','52735e921ecdb2.45729104'),('527356acf05889.96587900','52735e921ecdb2.45729104'),('527356acf058a0.80358034','52735e921ecdb2.45729104'),('527356acf058d6.15004056','52735e921ecdb2.45729104'),('527356acf058f5.34859039','52735e921ecdb2.45729104'),('527356acf05919.16258132','52735e921ecdb2.45729104'),('527356acf05942.04012305','52735e921ecdb2.45729104'),('527356acf05966.63047041','52735e921ecdb2.45729104'),('527356acf05989.59745511','52735e921ecdb2.45729104'),('527356acf059b6.02968251','52735e921ecdb2.45729104'),('527356acf059d8.32203749','52735e921ecdb2.45729104'),('527356acf059f1.29865178','52735e921ecdb2.45729104'),('527356acf05a29.11432174','52735e921ecdb2.45729104'),('527356acf05a40.21755336','52735e921ecdb2.45729104'),('527356acf05a69.38132214','52735e921ecdb2.45729104'),('527356acf05a81.87866910','52735e921ecdb2.45729104'),('527356acf05ab4.26294644','52735e921ecdb2.45729104'),('527356acf05ad2.23750913','52735e921ecdb2.45729104'),('527356acf05af0.89156745','52735e921ecdb2.45729104'),('527356acf05b20.23922350','52735e921ecdb2.45729104'),('527356acf05b48.33105583','52735e921ecdb2.45729104'),('527356acf05b64.60711631','52735e921ecdb2.45729104'),('527356acf05b88.82513064','52735e921ecdb2.45729104'),('527356acf05bb1.02304031','52735e921ecdb2.45729104'),('527356acf05bd2.18285690','52735e921ecdb2.45729104'),('527356acf05bf9.82181290','52735e921ecdb2.45729104'),('527356acf05c12.59000532','52735e921ecdb2.45729104'),('527356acf05c43.80577096','52735e921ecdb2.45729104'),('527356acf05c64.17579461','52735e921ecdb2.45729104'),('527356acf05c84.08353441','52735e921ecdb2.45729104'),('527356acf05cb9.65056023','52735e921ecdb2.45729104'),('527356acf05cd2.66176181','52735e921ecdb2.45729104'),('527356acf05cf9.18796337','52735e921ecdb2.45729104'),('527356acf05d27.55846696','52735e921ecdb2.45729104'),('527356acf05d46.91346337','52735e921ecdb2.45729104'),('527356acf05d68.30219239','52735e921ecdb2.45729104'),('527356acf05d83.72986630','52735e921ecdb2.45729104'),('527356acf05db7.42923329','52735e921ecdb2.45729104'),('527356acf05dd0.44086396','52735e921ecdb2.45729104'),('527356acf05df2.74037902','52735e921ecdb2.45729104'),('527356acf05e23.43229018','52735e921ecdb2.45729104'),('527356acf05e49.51587329','52735e921ecdb2.45729104'),('527356acf05e65.04400484','52735e921ecdb2.45729104'),('527356acf05e85.41455033','52735e921ecdb2.45729104'),('527356acf05eb0.04619374','52735e921ecdb2.45729104'),('527356acf05ed2.59924736','52735e921ecdb2.45729104'),('527356acf05ef9.25166779','52735e921ecdb2.45729104'),('527356acf05f24.25176645','52735e921ecdb2.45729104'),('527356acf05f44.57255211','52735e921ecdb2.45729104'),('527356acf05f67.04543178','52735e921ecdb2.45729104'),('527356acf05f95.20271434','52735e921ecdb2.45729104'),('527356acf05fb5.55742432','52735e921ecdb2.45729104'),('527356acf05fe3.24276823','52735e921ecdb2.45729104'),('527356acf06000.40114696','52735e921ecdb2.45729104'),('527356acf06023.00335653','52735e921ecdb2.45729104'),('527356acf06046.91314830','52735e921ecdb2.45729104'),('527356acf06074.91347209','52735e921ecdb2.45729104'),('527356acf06092.34763043','52735e921ecdb2.45729104'),('527356acf060b4.55724021','52735e921ecdb2.45729104'),('527356acf060d1.84222631','52735e921ecdb2.45729104'),('527356acf06109.85555145','52735e921ecdb2.45729104'),('527356acf06128.58527857','52735e921ecdb2.45729104'),('527356acf06149.53426626','52735e921ecdb2.45729104'),('527356acf06174.93142842','52735e921ecdb2.45729104'),('527356acf06195.31840262','52735e921ecdb2.45729104'),('527356acf061b3.43823481','52735e921ecdb2.45729104'),('527356acf061e4.98674152','52735e921ecdb2.45729104'),('527356acf06200.93904690','52735e921ecdb2.45729104'),('527356acf06225.88717790','52735e921ecdb2.45729104'),('527356acf06240.69328786','52735e921ecdb2.45729104'),('527356acf06273.36690583','52735e921ecdb2.45729104'),('527356acf06293.07683201','52735e921ecdb2.45729104'),('527356acf062b2.65765935','52735e921ecdb2.45729104'),('527356acf062e5.90802093','52735e921ecdb2.45729104'),('527356acf06300.02473373','52735e87cdcca8.61591059'),('527356acf06329.69931773','52735e921ecdb2.45729104'),('527356acf06346.32777457','52735e921ecdb2.45729104'),('527356acf06372.64674770','52735e921ecdb2.45729104'),('527356acf06396.90560712','52735e921ecdb2.45729104'),('527356acf063b3.60569260','52735e921ecdb2.45729104'),('527356acf063e7.45617086','52735e921ecdb2.45729104'),('527356acf06407.57262525','52735e921ecdb2.45729104'),('527356acf06426.12259023','52735e921ecdb2.45729104'),('527356acf06442.95190239','52735e921ecdb2.45729104'),('527356acf06461.06340773','52735e921ecdb2.45729104'),('527356acf06495.91573363','52735e921ecdb2.45729104'),('527356acf064b4.13622658','52735e921ecdb2.45729104'),('527356acf064d9.88912423','52735e921ecdb2.45729104'),('527356acf06502.75390138','52735e921ecdb2.45729104'),('527356acf06527.70027045','52735e921ecdb2.45729104'),('527356acf06542.30774832','52735e921ecdb2.45729104'),('527356acf06578.77331152','52735e921ecdb2.45729104'),('527356acf06597.01424348','52735e921ecdb2.45729104'),('527356acf065b5.22835228','52735e921ecdb2.45729104');
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

-- Dump completed on 2013-11-08 19:39:36
