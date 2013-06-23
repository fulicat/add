DROP TABLE IF EXISTS `{company}`;
CREATE TABLE IF NOT EXISTS `{company}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '公司名称',
  `user_id` int(11) NOT NULL COMMENT '栏目ID',
  `flag` varchar(30) NOT NULL COMMENT '定义属性',
  `status` int(2) DEFAULT NULL COMMENT '状态',
  `order` varchar(10) NOT NULL COMMENT '排序',
  `litpic` varchar(255) NOT NULL DEFAULT '',
  `type` varchar(50) DEFAULT NULL COMMENT '商务类型',
  `percentage` varchar(50) NOT NULL COMMENT '出口百分比',
  `capital` varchar(50) NOT NULL COMMENT '资本',
  `ascendent` varchar(50) NOT NULL COMMENT '主要竞争优势',
  `quality` varchar(50) DEFAULT NULL COMMENT '质量责任',
  `sales` varchar(50) NOT NULL COMMENT '全年销售',
  `staff` varchar(50) NOT NULL COMMENT '员工',
  `foundyear` varchar(50) NOT NULL COMMENT '成立年份',
  `payment` varchar(50) DEFAULT NULL COMMENT '付款方式',
  `markets_main` varchar(50) DEFAULT NULL COMMENT '主要销售市场',
  `markets_other` varchar(50) DEFAULT NULL COMMENT '其他销售市场',
  `replace_work` varchar(50) DEFAULT NULL COMMENT '代工市场',
  `weburl` varchar(200) NOT NULL COMMENT '网址',
  `rdman` varchar(50) NOT NULL COMMENT '研发人员总数',
  `engineer` varchar(50) NOT NULL COMMENT '工程师总数',
  `summary` varchar(255) DEFAULT NULL COMMENT '简介',
  `content` text COMMENT '内容',
  `province` varchar(20) DEFAULT NULL COMMENT '省份',
  `city` varchar(20) DEFAULT NULL COMMENT '城市',
  `area` varchar(20) DEFAULT NULL COMMENT '区',
  `address` varchar(200) DEFAULT NULL COMMENT '地址',
  `postcode` varchar(100) DEFAULT NULL COMMENT '邮编',
  `linkman` varchar(20) DEFAULT NULL COMMENT '联系人',
  `email` varchar(100) DEFAULT NULL COMMENT 'email',
  `tel` varchar(200) DEFAULT NULL COMMENT '电话',
  `fax` varchar(100) DEFAULT NULL COMMENT '传真',
  `msn` varchar(100) DEFAULT NULL COMMENT 'msn',
  `qq` varchar(100) DEFAULT NULL COMMENT 'QQ',
  `hits` int(11) DEFAULT '0' COMMENT '点击次数',
  `addtime` varchar(30) DEFAULT NULL COMMENT '添加时间',
  `addip` varchar(30) DEFAULT NULL COMMENT '添加ip',
  `updatetime` varchar(30) DEFAULT NULL COMMENT '修改时间',
  `updateip` varchar(30) DEFAULT NULL COMMENT '修改ip',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM ;


DROP TABLE IF EXISTS `{company_goods}`;
CREATE TABLE IF NOT EXISTS `{company_goods}` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` smallint(2) unsigned DEFAULT '0',
  `order` smallint(6) DEFAULT '0',
  `flag` char(30) DEFAULT '0',
  `name` char(250) DEFAULT NULL,
  `province` char(10) DEFAULT NULL,
  `city` char(10) DEFAULT NULL,
  `area` char(10) DEFAULT NULL,
  `num` char(50) DEFAULT NULL,
  `content` text,
  `hits` int(10) DEFAULT '0',
  `addtime` int(10) DEFAULT '0',
  `addip` char(20) DEFAULT NULL,
  `uptime` int(10) DEFAULT '0',
  `upip` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM   ;


DROP TABLE IF EXISTS `{company_job}`;
CREATE TABLE IF NOT EXISTS `{company_job}` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` smallint(2) unsigned DEFAULT '0',
  `order` smallint(6) DEFAULT '0',
  `flag` char(30) DEFAULT '0',
  `name` char(250) DEFAULT NULL,
  `province` char(10) DEFAULT NULL,
  `city` char(10) DEFAULT NULL,
  `area` char(10) DEFAULT NULL,
  `num` char(50) DEFAULT NULL,
  `description` char(250) DEFAULT NULL,
  `demand` char(250) DEFAULT NULL,
  `hits` int(10) DEFAULT '0',
  `addtime` int(10) DEFAULT '0',
  `addip` char(20) DEFAULT NULL,
  `uptime` int(10) DEFAULT '0',
  `upip` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  ;


DROP TABLE IF EXISTS `{company_news}`;
CREATE TABLE IF NOT EXISTS `{dcompany_news}` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` smallint(2) unsigned DEFAULT '0',
  `order` smallint(6) DEFAULT '0',
  `flag` char(30) DEFAULT '0',
  `name` char(250) DEFAULT NULL,
  `province` char(10) DEFAULT NULL,
  `city` char(10) DEFAULT NULL,
  `area` char(10) DEFAULT NULL,
  `num` char(50) DEFAULT NULL,
  `content` text,
  `hits` int(10) DEFAULT '0',
  `addtime` int(10) DEFAULT '0',
  `addip` char(20) DEFAULT NULL,
  `uptime` int(10) DEFAULT '0',
  `upip` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  ;