DROP TABLE IF EXISTS `{linkage}`;
CREATE TABLE IF NOT EXISTS `{linkage}` (
 `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `status` smallint(2) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `order` smallint(6) NOT NULL DEFAULT '0' COMMENT '排序',

  `type_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '类型',
  `pid` char(30) NOT NULL DEFAULT '' COMMENT '所属联动',
  `name` varchar(250) NOT NULL DEFAULT '' COMMENT '联动名称',
  `value` varchar(250) NOT NULL DEFAULT '' COMMENT '联动的值',

  `addtime` int(10)  NOT NULL DEFAULT '0',
  `addip` char(20)  NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `{linkage_type}`;
CREATE TABLE IF NOT EXISTS `{linkage_type}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order` smallint(6) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `nid` varchar(50) NOT NULL,
  `addtime` int(10)  NOT NULL DEFAULT '0',
  `addip` char(20)  NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM ;