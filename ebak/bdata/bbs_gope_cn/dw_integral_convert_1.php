<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_integral_convert`;");
E_C("CREATE TABLE `dw_integral_convert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `integral_id` int(11) DEFAULT NULL COMMENT '兑换物品ID',
  `user_id` int(11) DEFAULT NULL COMMENT '会员ID',
  `number` int(11) DEFAULT NULL COMMENT '数量',
  `need` int(11) DEFAULT NULL COMMENT '所需要的积分',
  `integral` int(11) DEFAULT NULL COMMENT '总积分',
  `status` int(2) DEFAULT '0' COMMENT '状态',
  `remark` varchar(200) DEFAULT '' COMMENT '备注',
  `addtime` varchar(30) DEFAULT NULL COMMENT '添加时间',
  `addip` varchar(30) DEFAULT NULL COMMENT '添加ip',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk");
E_D("replace into `dw_integral_convert` values('1','1','1','1','12','12','1','奥德赛飞 温热爱上对方','','');");

require("../../inc/footer.php");
?>