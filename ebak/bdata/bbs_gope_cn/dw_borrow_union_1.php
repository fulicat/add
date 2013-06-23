<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_borrow_union`;");
E_C("CREATE TABLE `dw_borrow_union` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT '0' COMMENT '所属站点',
  `user_id` int(11) DEFAULT '0' COMMENT '用户名称',
  `name` varchar(255) DEFAULT NULL COMMENT '标题',
  `status` int(2) DEFAULT '0' COMMENT '状态',
  `order` int(11) DEFAULT '0' COMMENT '排序',
  `hits` int(11) DEFAULT '0' COMMENT '点击次数',
  `litpic` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `range` varchar(255) DEFAULT NULL COMMENT '经营范围',
  `content` text COMMENT '公司简介',
  `verify_remark` varchar(255) DEFAULT NULL,
  `verify_time` varchar(10) DEFAULT NULL,
  `addtime` varchar(50) DEFAULT NULL,
  `addip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>