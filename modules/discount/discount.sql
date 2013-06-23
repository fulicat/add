  DROP TABLE IF EXISTS `{discount}`;
  CREATE TABLE IF NOT EXISTS `{discount}` (
  `id` int(11) NOT NULL auto_increment,
`site_id` int(11) NULL COMMENT '商家',
  `litpic` varchar(255) default NULL  COMMENT '上传图片',
  `type` VARCHAR(50) NOT NULL COMMENT '分类:如，休闲，美食，购物...',
  `business_district` VARCHAR(30) NULL COMMENT '商圈',
  `company_id` int(11) NULL COMMENT '商家',
  `name` VARCHAR(100) NULL COMMENT '标题',
  `province` INT NULL COMMENT '省份',
  `city` INT NULL COMMENT '城市',
  `area` INT NULL COMMENT '区',
  `address` VARCHAR(50) NULL COMMENT '地址',
  `tag` VARCHAR(100) NULL COMMENT '标签',
  `start_date` VARCHAR(30) NULL COMMENT '开始时间',
  `end_date` VARCHAR(30) NULL COMMENT '结束时间',
  `comment` TEXT NULL COMMENT '内容',
  `hit` INT NULL DEFAULT 0 COMMENT '点击次数',
  `top` INT NULL DEFAULT 0 COMMENT '顶次数',
  `remark` TEXT NULL COMMENT '备注',
  `post_user` VARCHAR(50) NULL COMMENT '发布者',
  `flag` varchar(30) NULL COMMENT '定义属性',
  `order` varchar(10) NULL COMMENT '排序',
  `status` int(2)  NULL COMMENT '状态',
  `addtime` varchar(30) default NULL COMMENT '添加时间',
  `addip` varchar(30) default NULL COMMENT '添加ip',
  `updatetime` varchar(30) default NULL COMMENT '更新时间',
  `updateip` varchar(30) default NULL COMMENT '更新ip',
  PRIMARY KEY (`id`) )
ENGINE = MyISAM;

DROP TABLE IF EXISTS `{discount_company}`;
CREATE TABLE IF NOT EXISTS `{discount_company}` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL COMMENT '商家名称',
  `flag` varchar(30) default NULL  COMMENT '定义属性',
  `status` int(2)  default NULL  COMMENT '状态',
  `order` varchar(10) default NULL  COMMENT '排序', 
  `litpic` varchar(255) default NULL  COMMENT '上传图片',
  `goods` varchar(255) default NULL  COMMENT '活动产品',
  `type` varchar(50) default NULL COMMENT '优惠类型',
 `linkman` varchar(20) default NULL COMMENT '联系人',
  `tel` varchar(20) default NULL COMMENT '联系电话',
  `content` text NOT NULL COMMENT '公司简介',
  `hits` int(11)   default '0' COMMENT '点击次数',
  `addtime` varchar(30) default NULL COMMENT '添加时间',
  `addip` varchar(30) default NULL COMMENT '添加ip',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM ;
