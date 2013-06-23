DROP TABLE IF EXISTS `{lianmeng}`;
CREATE TABLE `{lianmeng}` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL COMMENT '名称',
  `site_id` int(11) NOT NULL COMMENT '栏目ID',
  `flag` varchar(30) NOT NULL COMMENT '定义属性',
  `status` int(2)  NULL COMMENT '状态',
  `order` varchar(10) NOT NULL COMMENT '排序',
	
`litpic` varchar(250) default NULL COMMENT '照片',
  `school` varchar(50) NOT NULL COMMENT '工作职位',
 `intime` varchar(250) default NULL COMMENT '加入时间',
`xuanyan` varchar(250) default NULL COMMENT '加入时间',

  `province` varchar(20) default NULL COMMENT '省份',
  `city` varchar(20) default NULL COMMENT '城市',
  `area` varchar(20) default NULL COMMENT '区',
  `hits` int(11)  NULL default '0' COMMENT '点击次数',
  `addtime` varchar(30) default NULL COMMENT '添加时间',
  `addip` varchar(30) default NULL COMMENT '添加ip',
  `updatetime` varchar(30) default NULL COMMENT '修改时间',
  `updateip` varchar(30) default NULL COMMENT '修改ip',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM ;
