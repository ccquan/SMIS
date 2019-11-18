-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2019-11-10 14:50:42
-- 服务器版本： 5.7.26
-- PHP 版本： 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `student`
--

-- --------------------------------------------------------

--
-- 表的结构 `bj_info`
--

DROP TABLE IF EXISTS `bj_info`;
CREATE TABLE IF NOT EXISTS `bj_info` (
  `bj_id` int(10) NOT NULL COMMENT '班级号',
  `bj_name` varchar(30) NOT NULL COMMENT '名称',
  `bj_teacher` varchar(30) NOT NULL COMMENT '班主任',
  PRIMARY KEY (`bj_id`),
  UNIQUE KEY `bj_id` (`bj_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bj_info`
--

INSERT INTO `bj_info` (`bj_id`, `bj_name`, `bj_teacher`) VALUES
(100, '高一一班', '任静静'),
(101, '高二一班', '郑辛'),
(102, '高三一班', '孙阳广'),
(103, '高三二班', '戚紫薇');

-- --------------------------------------------------------

--
-- 表的结构 `cj_info`
--

DROP TABLE IF EXISTS `cj_info`;
CREATE TABLE IF NOT EXISTS `cj_info` (
  `xj_id` int(10) NOT NULL COMMENT '学号',
  `kc_id` int(10) NOT NULL COMMENT '课程号',
  `cj_score` int(4) NOT NULL COMMENT '成绩',
  KEY `fk_xj_id` (`xj_id`),
  KEY `fk_kc_id` (`kc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cj_info`
--

INSERT INTO `cj_info` (`xj_id`, `kc_id`, `cj_score`) VALUES
(2019413200, 336403, 76),
(2019413200, 336405, 87),
(2019413200, 336400, 89),
(2019413200, 336404, 68),
(2019413200, 336402, 85),
(2019413200, 336401, 80),
(2019413201, 336405, 89),
(2019413201, 336404, 89),
(2019413201, 336403, 69),
(2019413201, 336402, 79),
(2019413201, 336401, 90),
(2019413201, 336400, 100),
(2019413202, 336400, 67),
(2019413202, 336401, 79),
(2019413202, 336402, 79),
(2019413202, 336403, 90),
(2019413202, 336404, 98),
(2019413202, 336405, 99),
(2019413204, 336401, 89),
(2019413204, 336405, 89),
(2019413204, 336404, 57),
(2019413204, 336403, 58),
(2019413204, 336402, 97),
(2019413204, 336400, 100);

-- --------------------------------------------------------

--
-- 表的结构 `kc_info`
--

DROP TABLE IF EXISTS `kc_info`;
CREATE TABLE IF NOT EXISTS `kc_info` (
  `kc_id` int(10) NOT NULL COMMENT '课程号',
  `kc_name` varchar(30) NOT NULL COMMENT '名称',
  `kc_time` int(3) NOT NULL COMMENT '课时',
  PRIMARY KEY (`kc_id`),
  UNIQUE KEY `kc_id` (`kc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `kc_info`
--

INSERT INTO `kc_info` (`kc_id`, `kc_name`, `kc_time`) VALUES
(336400, '语文', 12),
(336401, '数学', 18),
(336402, '英语', 18),
(336403, '物理', 17),
(336404, '化学', 18),
(336405, '生物', 9);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- 表的结构 `xj_info`
--

DROP TABLE IF EXISTS `xj_info`;
CREATE TABLE IF NOT EXISTS `xj_info` (
  `xj_id` int(10) NOT NULL COMMENT '学号',
  `xj_name` varchar(30) NOT NULL COMMENT '姓名',
  `xj_sex` varchar(2) NOT NULL COMMENT '性别',
  `bj_id` int(10) NOT NULL COMMENT '班级',
  PRIMARY KEY (`xj_id`),
  UNIQUE KEY `xj_id` (`xj_id`),
  KEY `fk_bj_id` (`bj_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `xj_info`
--

INSERT INTO `xj_info` (`xj_id`, `xj_name`, `xj_sex`, `bj_id`) VALUES
(2019413200, '王芳', '女', 100),
(2019413201, '刘磊', '男', 100),
(2019413202, '杨氏心', '女', 100),
(2019413203, '杨金金', '女', 100),
(2019413204, '唐堂', '男', 100),
(2019413205, '于屈副', '男', 101),
(2019413206, '王石同', '男', 101),
(2019413207, '冯拾柒', '男', 101),
(2019413208, '宾阿彪', '男', 101),
(2019413210, '屈仁诗', '男', 101),
(2019413211, '郭双双', '女', 102),
(2019413212, '郭唐睿', '男', 102),
(2019413213, '江长江', '男', 102),
(2019413214, '居处于', '男', 102),
(2019413216, '阿宝方', '男', 103),
(2019413215, '王紫气', '女', 102),
(2019413217, '山峰', '男', 103),
(2019413218, '艾薇', '女', 103),
(2019413219, '沙尘', '男', 103),
(2019413220, '金发成', '男', 103);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
