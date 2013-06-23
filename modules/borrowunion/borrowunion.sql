CREATE TABLE IF NOT EXISTS `{borrow_union}` (
   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL DEFAULT '0' COMMENT '所属站点',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户名称',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `hits` int(11) NOT NULL DEFAULT '0' COMMENT '点击次数',
  `litpic` varchar(255) NOT NULL DEFAULT '' COMMENT '企业图片',
  `type` varchar(255) NOT NULL DEFAULT '' COMMENT '企业类型',
  `range` varchar(255) NOT NULL DEFAULT '' COMMENT '经营范围',
 `province` int(10) NOT NULL DEFAULT '0' COMMENT '省份',
  `city` int(10) NOT NULL DEFAULT '0' COMMENT '城市',
  `area` int(10) NOT NULL DEFAULT '0' COMMENT '地区',
  `content` text COMMENT '公司简介',

  `linkman` varchar(50) NOT NULL DEFAULT ' COMMENT '联系人',
  `tel` varchar(50) NOT NULL DEFAULT '' COMMENT '联系电话',
  `realname` varchar(50) NOT NULL DEFAULT '' COMMENT '联系电话',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  
  `addtime` varchar(50) NOT NULL DEFAULT '',
  `addip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

