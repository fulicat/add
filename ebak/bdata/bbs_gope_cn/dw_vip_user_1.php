<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_vip_user`;");
E_C("CREATE TABLE `dw_vip_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `card_number` varchar(15) DEFAULT NULL COMMENT 'VIP卡号',
  `flag` varchar(30) DEFAULT NULL COMMENT '定义属性',
  `order` varchar(10) DEFAULT NULL COMMENT '排序',
  `hits` int(11) DEFAULT NULL COMMENT '点击次数',
  `addtime` varchar(30) DEFAULT NULL COMMENT '添加时间',
  `addip` varchar(30) DEFAULT NULL COMMENT '添加ip',
  `updatetime` varchar(30) DEFAULT NULL COMMENT '修改时间',
  `updateip` varchar(30) DEFAULT NULL COMMENT '修改ip',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_vipu_u` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='VIP卡用户'");

require("../../inc/footer.php");
?>