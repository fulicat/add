CREATE TABLE if not  EXISTS `{albums}` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '名称',
  `site_id` int(11) NOT NULL COMMENT '栏目ID',
  `type_id` int(11) NOT NULL COMMENT '类型',
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `flag` varchar(30) NOT NULL COMMENT '定义属性',
  `status` int(2) DEFAULT NULL COMMENT '状态',
  `order` varchar(10) NOT NULL COMMENT '排序',
  `rank` int(11) NOT NULL COMMENT '权限',
  `code` varchar(10) DEFAULT NULL COMMENT '所属模块',
  `aid` int(11) NOT NULL COMMENT '所属模块ID',
  `content` text COMMENT '内容',
  `hits` int(11) DEFAULT NULL COMMENT '点击次数',
  `addtime` varchar(30) DEFAULT NULL COMMENT '添加时间',
  `addip` varchar(30) DEFAULT NULL COMMENT '添加ip',
  `updatetime` varchar(30) DEFAULT NULL COMMENT '修改时间',
  `updateip` varchar(30) DEFAULT NULL COMMENT '修改ip',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM ;

CREATE TABLE if not  EXISTS `{albums_type}` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '名称',
  `addtime` varchar(30) DEFAULT NULL COMMENT '添加时间',
  `addip` varchar(30) DEFAULT NULL COMMENT '添加ip',
  `updatetime` varchar(30) DEFAULT NULL COMMENT '修改时间',
  `updateip` varchar(30) DEFAULT NULL COMMENT '修改ip',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM ;

CREATE TABLE if not  EXISTS `{upfiles}` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL COMMENT '名称',
  `code` varchar(50) DEFAULT NULL COMMENT '模块',
  `aid` varchar(50) DEFAULT NULL COMMENT '所属模块id',
  `status` int(2) DEFAULT '0' COMMENT '状态',
  `user_id` int(11) NOT NULL,
  `filetype` varchar(50) DEFAULT NULL COMMENT '文件类型',
  `filename` varchar(100) DEFAULT NULL COMMENT '文件名称',
  `filesize` int(10) DEFAULT '0' COMMENT '文件大小',
  `fileurl` varchar(200) DEFAULT NULL COMMENT '文件地址',
  `if_cover` int(2) DEFAULT '0' COMMENT '是否封面',
  `order` int(10) DEFAULT '0' COMMENT '排序',
  `hits` int(11) DEFAULT '0' COMMENT '点击次数',
  `addtime` varchar(30) DEFAULT NULL COMMENT '添加时间',
  `addip` varchar(30) DEFAULT NULL COMMENT '添加ip',
  `updatetime` varchar(30) DEFAULT NULL COMMENT '修改时间',
  `updateip` varchar(30) DEFAULT NULL COMMENT '修改ip',

  PRIMARY KEY  (`id`)
) ENGINE=MyISAM ;
