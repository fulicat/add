<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_integral`;");
E_C("CREATE TABLE `dw_integral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL COMMENT '物品名称',
  `need` double DEFAULT NULL COMMENT '所需积分',
  `number` int(11) DEFAULT NULL COMMENT '数量',
  `ex_number` int(11) DEFAULT '0' COMMENT '已兑换数量',
  `province` int(11) DEFAULT NULL COMMENT '可兑换省份',
  `city` int(11) DEFAULT NULL COMMENT '可兑换城市',
  `area` int(11) DEFAULT NULL COMMENT '区',
  `litpic` varchar(100) DEFAULT NULL COMMENT '图片',
  `content` text COMMENT '详细信息',
  `hits` int(11) DEFAULT '0' COMMENT '点击次数',
  `top` int(11) DEFAULT '0' COMMENT '顶次数',
  `flag` varchar(30) DEFAULT NULL COMMENT '定义属性',
  `order` varchar(10) DEFAULT NULL COMMENT '排序',
  `status` int(2) DEFAULT NULL COMMENT '状态',
  `addtime` varchar(30) DEFAULT NULL COMMENT '添加时间',
  `addip` varchar(30) DEFAULT NULL COMMENT '添加ip',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>