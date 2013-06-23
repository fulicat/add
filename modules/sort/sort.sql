CREATE TABLE IF NOT EXISTS `{sort}` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL COMMENT '公司名称',
  `site_id` int(11) NOT NULL COMMENT '栏目ID',
  `flag` varchar(30) NOT NULL COMMENT '定义属性',
  `status` int(2)  NULL COMMENT '状态',
  `order` varchar(10) NOT NULL COMMENT '排序', 
  `litpic` varchar(255) NOT NULL DEFAULT '',

  `rank` int(11) default '0' COMMENT '等级',
  `pid` int(11) default '0' COMMENT '栏目ID',
  `summary` varchar(255) default NULL COMMENT '简介',
  `content` text  default NULL COMMENT '内容',

  `hits` int(11)   default '0' COMMENT '点击次数',
  `addtime` varchar(30) default NULL COMMENT '添加时间',
  `addip` varchar(30) default NULL COMMENT '添加ip',
  `updatetime` varchar(30) default NULL COMMENT '修改时间',
  `updateip` varchar(30) default NULL COMMENT '修改ip',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM ;

 
