-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 年 06 月 01 日 08:27
-- 服务器版本: 5.5.36
-- PHP 版本: 5.3.28

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `ebaoming`
--

-- --------------------------------------------------------

--
-- 表的结构 `ebm_alp1`
--

CREATE TABLE IF NOT EXISTS `ebm_alp1` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ctime` int(10) unsigned NOT NULL,
  `proid` int(10) unsigned NOT NULL,
  `tel` varchar(255) NOT NULL,
  `qq` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `ebm_alp1`
--

INSERT INTO `ebm_alp1` (`id`, `ctime`, `proid`, `tel`, `qq`) VALUES
(1, 1432628520, 3, '15152116961', '1113484046'),
(2, 1432713191, 3, '18766034151', '1113484046');

-- --------------------------------------------------------

--
-- 表的结构 `ebm_etuan`
--

CREATE TABLE IF NOT EXISTS `ebm_etuan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ctime` int(10) unsigned NOT NULL,
  `proid` int(10) unsigned NOT NULL,
  `qq` varchar(255) NOT NULL,
  `glink` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `storetype` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `usertypes` varchar(255) NOT NULL,
  `etime` int(10) unsigned NOT NULL,
  `intro` text NOT NULL,
  `attachment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `ebm_etuan`
--

INSERT INTO `ebm_etuan` (`id`, `ctime`, `proid`, `qq`, `glink`, `tel`, `storetype`, `sex`, `usertypes`, `etime`, `intro`, `attachment`) VALUES
(1, 0, 0, '1113484046', 'http://www.etuan.com/deal/4334  8折\r\nhttp://www.etuan.com/deal/2756  9折\r\nhttp://www.etuan.com/deal/5321  7折', '18766034151', '一团', '保密', '个体单位', 5, '&lt;p&gt;一团这种活动很好，很赞&lt;/p&gt;&lt;p&gt;不错，继续保持&lt;/p&gt;', './Public/Uploads/infosubmit/20150526/55641d3755abb.png'),
(2, 1432624730, 0, '1113484046', 'adada', '18766034151', '天猫', '男', '政府单位', 1432569600, '&lt;p&gt;adadadadad&lt;/p&gt;', './Public/Uploads/infosubmit/20150526/55641e5bbf41c.png'),
(3, 1432710465, 0, '123456', '111111111111111\r\n22222\r\n3333333333333333333&lt;b&gt;44444&lt;/b&gt;', '18766034151', '淘宝', '女', '个体单位', 1433433600, '', './Public/Uploads/infosubmit/20150527/55656d414ffbf.png'),
(4, 1432710637, 0, '111111', '111111111111111', '18888888888', '天猫', '女', '个体单位', 1432656000, '', './Public/Uploads/infosubmit/20150527/55656ded8c1d1.png'),
(5, 1432711056, 0, '123123', '12222222', '18888888888', '天猫', '保密', '个体单位', 1433433600, '<p>121212121</p><p>aaaaaaaaaaaaaaaaaaaaaaaaaa</p><p><span style="color: rgb(255, 0, 0);"><em><strong>dfdfdfdfd</strong></em></span></p>', './Public/Uploads/infosubmit/20150527/55656f906c1ea.png'),
(6, 1432711571, 0, '1113484046', 'aaaaa', '18888888888', '淘宝', '女', '', 1432828800, '<p>aaaaa</p>', './Public/Uploads/infosubmit/20150527/556571936665d.png'),
(7, 1432711902, 0, '1113484046', 'aaaa', '18888888888', '天猫', '女', '政府单位-企业单位-个体单位', 1432742400, '<p>aaaa</p>', './Public/Uploads/infosubmit/20150527/556572de9d595.png'),
(8, 1432713078, 0, '1113484046', 'aaaa', '15152116961', '天猫', '女', '政府单位-企业单位-个体单位', 1432742400, '<p>aaaa</p>', './Public/Uploads/infosubmit/20150527/5565777672998.png'),
(9, 1432713311, 0, '01010101', '10101010', '15888888888', '天猫', '保密', '政府单位-个体单位', 1433520000, '<h1 label="标题居中" style="font-size: 32px; font-weight: bold; border-bottom-color: rgb(204, 204, 204); border-bottom-width: 2px; border-bottom-style: solid; padding: 0px 4px 0px 0px; text-align: center; margin: 0px 0px 20px;">自我介绍</h1><p>哈哈，你好啊：</p><p>&nbsp;这是测试的，哈哈哈</p><p><span style="color: rgb(255, 0, 0);"><strong><em>哈哈</em></strong></span></p><p>敬礼</p><p style="text-align: right;"><span style="color: rgb(0, 0, 0);">2015.05.28</span></p>', './Public/Uploads/infosubmit/20150527/5565785f73afa.jpg'),
(10, 1432896323, 4, '147258', 'http://etuan.com', '15152116961', '淘宝', '男', '企业单位-个体单位', 1432310400, '<p>这是报名test4的项目</p>', './Public/Uploads/infosubmit/20150529/5568434342880.png');

-- --------------------------------------------------------

--
-- 表的结构 `ebm_fields`
--

CREATE TABLE IF NOT EXISTS `ebm_fields` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `mid` int(10) unsigned NOT NULL COMMENT '模型id',
  `name` varchar(50) NOT NULL COMMENT '字段名称',
  `cname` varchar(50) NOT NULL COMMENT '字段',
  `type` tinyint(3) unsigned NOT NULL COMMENT '字段类型',
  `pattern` varchar(255) NOT NULL COMMENT '正则模式',
  `errormsg` varchar(255) NOT NULL COMMENT '匹配失败的错误提示',
  `setting` mediumtext NOT NULL COMMENT '设置参数',
  `placeholder` varchar(255) NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否必填',
  `issys` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否是系统预设',
  `default` varchar(255) NOT NULL COMMENT '默认信息',
  `listorder` smallint(5) unsigned NOT NULL COMMENT '排序',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `ebm_fields`
--

INSERT INTO `ebm_fields` (`id`, `mid`, `name`, `cname`, `type`, `pattern`, `errormsg`, `setting`, `placeholder`, `required`, `issys`, `default`, `listorder`, `state`) VALUES
(6, 4, 'QQ', 'qq', 1, '/^[0-9]{5,20}$/', 'QQ号格式错误', '15', '', 1, 0, '', 0, 1),
(7, 4, '商品链接', 'glink', 2, '', '', '255', '填写商品链接，例如：http://www.etuan.com/detail/2222 8折', 1, 0, '', 0, 1),
(8, 4, '联系电话', 'tel', 1, '/^(1)[0-9]{10}$/', '手机号格式错误', '60', '填写你的手机号', 1, 0, '', 0, 1),
(9, 4, '店铺类型', 'storetype', 3, '', '', '淘宝|天猫|一团', '', 1, 0, '', 0, 1),
(10, 4, '性别', 'sex', 4, '', '', '男|女|保密', '', 1, 0, '', 0, 1),
(11, 4, '用户群体', 'usertypes', 5, '', '', '政府单位|企业单位|个体单位', '', 1, 0, '', 0, 1),
(12, 4, '截止时间', 'etime', 6, '', '', '', '', 1, 0, '', 0, 1),
(13, 4, '自我介绍', 'intro', 8, '', '', '', '', 1, 0, '', 0, 1),
(14, 4, '作品附件', 'attachment', 7, '', '', 'jpg-png-jpeg-png-gif-rar-zip-ppt-doc|5000', '', 1, 0, '', 0, 1),
(15, 5, 'QQ', 'qq', 1, '/^[0-9]{5,20}$/', '', '60', '', 1, 0, '', 0, 1),
(16, 6, '电话', 'tel', 1, '/^(1)[0-9]{10}$/', '', '60', '填写手机号', 1, 0, '', 0, 1),
(17, 6, 'QQ', 'qq', 1, '/^[0-9]{5,20}$/', '', '60', 'QQ号', 1, 0, '', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ebm_manager`
--

CREATE TABLE IF NOT EXISTS `ebm_manager` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `etime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `ebm_manager`
--

INSERT INTO `ebm_manager` (`id`, `uid`, `etime`) VALUES
(1, 2, 6),
(2, 3, 0),
(3, 4, 1432915200),
(4, 5, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ebm_member`
--

CREATE TABLE IF NOT EXISTS `ebm_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `mobile` char(11) NOT NULL,
  `level` tinyint(3) NOT NULL,
  `salt` char(6) NOT NULL,
  `ctime` int(10) unsigned NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `ebm_member`
--

INSERT INTO `ebm_member` (`id`, `name`, `password`, `mobile`, `level`, `salt`, `ctime`, `state`) VALUES
(1, 'admin', '08f98c90df92d7d87109dcbf77ee5ad8', '15152116961', 1, '123qwe', 1420905600, 1),
(2, 'test', 'ebf3223c82a893dacccf6425fad72b5d', '15152116961', 2, 'x9z1ut', 1432890002, 1),
(3, 'test2', '5eb97235211dd54f7fefe56a837b3977', '', 2, 'jcbxoi', 1432890136, 1),
(4, 'test3', '172c14c3becc395a653970b7e4f67da0', '18766034151', 2, 'fvum83', 1432890442, 1),
(5, 'test4', '5d59d9e342c88987c6bd0f27db7aa8e1', '', 2, 'bm7p08', 1432890599, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ebm_model`
--

CREATE TABLE IF NOT EXISTS `ebm_model` (
  `mid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '模型名称',
  `cname` varchar(20) NOT NULL COMMENT '表名称',
  `records` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '数据量',
  `ctime` int(10) unsigned NOT NULL COMMENT '创建时间',
  `utime` int(10) unsigned NOT NULL COMMENT '最后修改时间',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  `state` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `ebm_model`
--

INSERT INTO `ebm_model` (`mid`, `name`, `cname`, `records`, `ctime`, `utime`, `remark`, `state`) VALUES
(4, '一团', 'etuan', 0, 1432283734, 1432283734, '', 1),
(5, 'test2', 'test2', 0, 1432520148, 1432520148, '', 1),
(6, '内测版1', 'alp1', 0, 1432628177, 1432628177, '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ebm_project`
--

CREATE TABLE IF NOT EXISTS `ebm_project` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `model` smallint(10) unsigned NOT NULL COMMENT '所属模型',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `cname` varchar(50) NOT NULL COMMENT '别名',
  `description` varchar(255) NOT NULL COMMENT '简介',
  `img` varchar(255) NOT NULL COMMENT '缩略图',
  `stime` int(10) unsigned NOT NULL COMMENT '开始时间',
  `etime` int(10) unsigned NOT NULL COMMENT '结束时间',
  `ctime` int(11) NOT NULL COMMENT '创建时间',
  `remarks` varchar(255) NOT NULL COMMENT '备注',
  `detail` text NOT NULL COMMENT '项目详情',
  `records` int(10) unsigned NOT NULL DEFAULT '0',
  `listorder` mediumint(9) NOT NULL DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `ebm_project`
--

INSERT INTO `ebm_project` (`id`, `uid`, `model`, `title`, `cname`, `description`, `img`, `stime`, `etime`, `ctime`, `remarks`, `detail`, `records`, `listorder`) VALUES
(1, 0, 4, '一团网5周年商家报名12222', 'etuan5', '一团网商家报名，商家报名信息，一团5周年，大礼回馈用户122222', './Public/Uploads/project_img/20150525/5562ce8f4bc26.png', 1432569600, 1433001600, 1432520766, 'aaaaaaa22222', '<p>这是项目详细介绍1111222222</p>', 7, 0),
(3, 0, 6, '内测版1', 'alp1', '这是内测版1这是内测版1这是内测版1这是内测版1这是内测版1', './Public/Uploads/project_img/20150526/55642c6b9e3b9.jpg', 0, 0, 1432628296, '', '', 2, 0),
(4, 5, 4, 'test4的项目', 'test4', '这是test4的项目', './Public/Uploads/project_img/20150529/5568400e14a56.png', 0, 0, 1432895502, 'test4', '<p>这是test4的个人项目<br/></p>', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ebm_test2`
--

CREATE TABLE IF NOT EXISTS `ebm_test2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ctime` int(10) unsigned NOT NULL,
  `qq` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
