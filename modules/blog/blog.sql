DROP TABLE IF EXISTS `{blog}`;
CREATE TABLE IF NOT EXISTS `{blog}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '标题',
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `flag` varchar(30) NOT NULL COMMENT '定义属性',
  `status` int(2) DEFAULT NULL COMMENT '状态',
  `is_comment` int(2) DEFAULT NULL COMMENT '是否允许评论',
  `is_self` int(2) DEFAULT NULL COMMENT '是否自己可见',
  `order` int(10) DEFAULT 0 COMMENT '排序',
  `litpic` varchar(255) NOT NULL DEFAULT '',
  `tags` varchar(255) NOT NULL DEFAULT '' COMMENT '标签',
  `type_id` varchar(50) DEFAULT NULL COMMENT '类型',
  `content` text COMMENT '内容',
 
  `hits` int(11) DEFAULT '0' COMMENT '点击次数',
  `addtime` varchar(30) DEFAULT NULL COMMENT '添加时间',
  `addip` varchar(30) DEFAULT NULL COMMENT '添加ip',
  `updatetime` varchar(30) DEFAULT NULL COMMENT '修改时间',
  `updateip` varchar(30) DEFAULT NULL COMMENT '修改ip',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM ;

DROP TABLE IF EXISTS `{blog_type}`;
CREATE TABLE IF NOT EXISTS `{blog_type}` (
	`id` INT NOT NULL auto_increment,
        `name` varchar(30) NOT NULL COMMENT '标题',
        `order` int(10) DEFAULT 0 COMMENT '排序',
        `user_id` int(11) NOT NULL COMMENT '用户ID',
	`addtime` INT DEFAULT NULL COMMENT '添加时间',
	`addip` VARCHAR(30) DEFAULT NULL COMMENT '添加IP',
	PRIMARY KEY  (`id`)
) ENGINE = MyISAM COMMENT = '博客类型';