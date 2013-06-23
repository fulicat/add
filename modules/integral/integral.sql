  DROP TABLE IF EXISTS `{integral}`;
  CREATE TABLE IF NOT EXISTS `{integral}` (
  `id` int(11) NOT NULL auto_increment,
  `site_id` int(11) NOT NULL ,
  `name` VARCHAR(100) NOT NULL COMMENT '物品名称',
  `need` DOUBLE NOT NULL COMMENT '所需积分',
  `number` INT  NOT NULL COMMENT '数量',
  `ex_number` INT  NOT NULL DEFAULT 0 COMMENT '已兑换数量',
  `province` INT NULL COMMENT '可兑换省份',
  `city` INT NULL COMMENT '可兑换城市',
  `area` INT NULL COMMENT '区',
  `litpic` VARCHAR(100) NULL COMMENT '图片',
  `content` TEXT NULL COMMENT '详细信息',
  `hits` INT NULL DEFAULT 0 COMMENT '点击次数',
  `top` INT NULL DEFAULT 0 COMMENT '顶次数',
  `flag` varchar(30) NULL COMMENT '定义属性',
  `order` varchar(10) NULL COMMENT '排序',
  `status` int(2)  NULL COMMENT '状态',
  `addtime` varchar(30) default NULL COMMENT '添加时间',
  `addip` varchar(30) default NULL COMMENT '添加ip',
  PRIMARY KEY (`id`) )
ENGINE = MyISAM;

  DROP TABLE IF EXISTS `{integral_convert}`;
  CREATE TABLE IF NOT EXISTS `{integral_convert}` (
  `id` int(11) NOT NULL auto_increment,
  `integral_id` int(11) NOT NULL COMMENT '兑换物品ID',
  `user_id` int(11) NOT NULL COMMENT '会员ID',
  `number` INT(11) NOT NULL COMMENT '数量',
  `need` INT(11) NOT NULL COMMENT '所需要的积分',
  `integral` INT(11) NOT NULL COMMENT '总积分',
  `status` int(2)  NULL DEFAULT 0 COMMENT '状态',
`remark` varchar(200) NULL DEFAULT '' COMMENT '备注',
  `addtime` varchar(30) default NULL COMMENT '添加时间',
  `addip` varchar(30) default NULL COMMENT '添加ip',
  PRIMARY KEY (`id`) )
 ENGINE = MyISAM;