-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 09 月 06 日 18:19
-- 服务器版本: 5.5.29
-- PHP 版本: 5.4.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `secondoffice`
--

-- --------------------------------------------------------

--
-- 表的结构 `tbl_department`
--

CREATE TABLE IF NOT EXISTS `tbl_department` (
  `uid` varchar(32) NOT NULL,
  `parentuid` varchar(32) NOT NULL DEFAULT '',
  `name` varchar(32) NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_log`
--

CREATE TABLE IF NOT EXISTS `tbl_log` (
  `uid` varchar(32) NOT NULL,
  `category` varchar(128) DEFAULT NULL,
  `ip` varchar(32) DEFAULT NULL,
  `user` varchar(32) DEFAULT NULL,
  `logtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` text,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_log`
--

INSERT INTO `tbl_log` (`uid`, `category`, `ip`, `user`, `logtime`, `message`) VALUES
('5229a28d007964.24228226', 'event.signin', '127.0.0.1', 'admin', '2013-09-06 09:38:21', 'user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_person_experience`
--

CREATE TABLE IF NOT EXISTS `tbl_person_experience` (
  `profile_uid` varchar(32) NOT NULL,
  `type` varchar(1) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `organization` varchar(32) NOT NULL,
  `remark` varchar(128) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_person_experience`
--

INSERT INTO `tbl_person_experience` (`profile_uid`, `type`, `date_from`, `date_to`, `organization`, `remark`) VALUES
('ewrtert', '1', '2013-09-03', '2013-09-06', 'sdfs', 'sdsdag');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_person_profiles`
--

CREATE TABLE IF NOT EXISTS `tbl_person_profiles` (
  `name` varchar(32) NOT NULL,
  `photo` varchar(32) NOT NULL DEFAULT '',
  `sex` varchar(1) NOT NULL DEFAULT 'M',
  `birthday` date NOT NULL,
  `hometown` varchar(16) NOT NULL DEFAULT '',
  `height` int(11) NOT NULL DEFAULT '0',
  `phone` varchar(32) NOT NULL DEFAULT '',
  `email` varchar(32) NOT NULL DEFAULT '',
  `remark` varchar(256) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_person_workhistory`
--

CREATE TABLE IF NOT EXISTS `tbl_person_workhistory` (
  `profile_uid` varchar(32) NOT NULL,
  `department_uid` varchar(32) NOT NULL,
  `position_uid` varchar(32) NOT NULL,
  `event_type` varchar(1) NOT NULL,
  `event_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_position`
--

CREATE TABLE IF NOT EXISTS `tbl_position` (
  `uid` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
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

--
-- 转存表中的数据 `tbl_user`
--

INSERT INTO `tbl_user` (`uid`, `name`, `user_name`, `password`, `password_salt`, `email`, `work_phone`, `mobie_phone`, `valid`) VALUES
('324jasdf834', 'Ram', 'admin', 'e56419914765c6d22dc5018114d73a28', '123456', 'ram@welon-cn.com', '28350192', '13642713467', 1);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_user_department_position`
--

CREATE TABLE IF NOT EXISTS `tbl_user_department_position` (
  `user_uid` varchar(32) NOT NULL,
  `department_uid` varchar(32) NOT NULL,
  `position_uid` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_user_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_user_profile` (
  `user_uid` varchar(32) NOT NULL,
  `profile_uid` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
