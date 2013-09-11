-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 09 月 11 日 17:55
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
  `valid` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tbl_department`
--

INSERT INTO `tbl_department` (`uid`, `parentuid`, `name`, `valid`) VALUES
('001-9', '001-9', '001-9', 1);

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
('522d90ea670561.40830554', 'event.data.create', '127.0.0.1', 'admin', '2013-09-09 09:12:10', 'user create\nin E:\\ram\\website\\application\\secondoffice\\protected\\models\\ActiveRecordLogableBehavior.php (45)\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\DepartmentController.php (72)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),
('522d92831bd644.59128063', 'event.data.update', '127.0.0.1', 'admin', '2013-09-09 09:18:59', 'user update\nin E:\\ram\\website\\application\\secondoffice\\protected\\models\\ActiveRecordLogableBehavior.php (12)\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\DepartmentController.php (96)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),
('522d92918cc783.73460477', 'event.data.delete', '127.0.0.1', 'admin', '2013-09-09 09:19:13', 'user delete\nin E:\\ram\\website\\application\\secondoffice\\protected\\models\\ActiveRecordLogableBehavior.php (65)\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\DepartmentController.php (115)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),
('522d985b54a131.23152049', 'event.signin', '127.0.0.1', 'admin', '2013-09-09 09:43:55', 'user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),
('523033cec98093.99076249', 'event.signin', '127.0.0.1', 'admin', '2013-09-11 09:11:43', 'user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),
('523033da7e6c81.81895578', 'event.signin', '127.0.0.1', 'admin', '2013-09-11 09:11:54', 'user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),
('52303b977dbbc1.75664419', 'event.signin', '127.0.0.1', 'admin', '2013-09-11 09:44:55', 'user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)'),
('52303bb2e6a882.90989345', 'event.signin', '127.0.0.1', 'admin', '2013-09-11 09:45:22', 'user signin\nin E:\\ram\\website\\application\\secondoffice\\protected\\controllers\\UserController.php (192)\nin E:\\ram\\website\\application\\secondoffice\\index.php (13)');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_log_detail`
--

CREATE TABLE IF NOT EXISTS `tbl_log_detail` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `tbl_log_detail`
--

INSERT INTO `tbl_log_detail` (`id`, `log_uid`, `model_name`, `model_primarykey`, `action`, `field`, `value_now`, `value_original`) VALUES
(1, '522d90ea670561.40830554', 'Department', '001', 'CREATE', '001', '001', NULL),
(2, '522d90ea670561.40830554', 'Department', '001', 'CREATE', 'Valid', '1', NULL),
(3, '522d90ea670561.40830554', 'Department', '001', 'CREATE', 'Uid', '001', NULL),
(4, '522d90ea670561.40830554', 'Department', '001', 'CREATE', '002', '001', NULL),
(5, '522d92831bd644.59128063', 'Department', '001-9', 'CHANGE', 'Uid', '001-9', '001'),
(6, '522d92831bd644.59128063', 'Department', '001-9', 'CHANGE', '001', '001-9', '001'),
(7, '522d92831bd644.59128063', 'Department', '001-9', 'CHANGE', '002', '001-9', '001'),
(8, '522d92918cc783.73460477', 'Department', '4356-0', 'DELETE', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_modules`
--

CREATE TABLE IF NOT EXISTS `tbl_modules` (
  `uid` varchar(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `params` text NOT NULL,
  `vaild` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `valid` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`uid`)
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
('324jasdf834', '冯毅豪', 'admin', 'e56419914765c6d22dc5018114d73a28', '123456', 'ram@welon-cn.com', '28350192', '13642713467', 1);

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

-- --------------------------------------------------------

--
-- 表的结构 `tbl_workflow`
--

CREATE TABLE IF NOT EXISTS `tbl_workflow` (
  `uid` varchar(32) NOT NULL,
  `module_uid` varchar(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `is_suspended` varchar(1) NOT NULL,
  `due_date` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_workflow_migrate`
--

CREATE TABLE IF NOT EXISTS `tbl_workflow_migrate` (
  `uid` varchar(32) NOT NULL,
  `workflow_uid` varchar(32) NOT NULL,
  `from_node_uid` varchar(32) NOT NULL,
  `to_node_uid` varchar(32) NOT NULL,
  `conditions` text NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_workflow_node`
--

CREATE TABLE IF NOT EXISTS `tbl_workflow_node` (
  `uid` varchar(32) NOT NULL,
  `workflow_uid` varchar(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `node_type` varchar(32) NOT NULL,
  `actions` text NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_workflow_process`
--

CREATE TABLE IF NOT EXISTS `tbl_workflow_process` (
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

-- --------------------------------------------------------

--
-- 表的结构 `tbl_workflow_process_task`
--

CREATE TABLE IF NOT EXISTS `tbl_workflow_process_task` (
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
