<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_friends_request`;");
E_C("CREATE TABLE `dw_friends_request` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0' COMMENT '用户',
  `friends_userid` int(11) DEFAULT '0' COMMENT '朋友',
  `status` int(2) DEFAULT '0' COMMENT '状态',
  `type` int(2) DEFAULT '0',
  `content` varchar(250) DEFAULT NULL,
  `addtime` varchar(50) DEFAULT NULL,
  `addip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk COMMENT='好友记录'");
E_D("replace into `dw_friends_request` values('2','4','28','0','0','','1315631340','123.87.177.3');");
E_D("replace into `dw_friends_request` values('3','13','25','0','0','','1315643622','124.114.177.90');");
E_D("replace into `dw_friends_request` values('4','92','99','0','0','','1321083308','113.117.25.62');");

require("../../inc/footer.php");
?>