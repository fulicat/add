<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_friends`;");
E_C("CREATE TABLE `dw_friends` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0' COMMENT '用户',
  `friends_userid` int(11) DEFAULT '0' COMMENT '朋友',
  `friends_username` varchar(50) DEFAULT NULL,
  `status` int(2) DEFAULT '0' COMMENT '状态',
  `type` int(2) DEFAULT '0' COMMENT '类型',
  `content` varchar(255) DEFAULT NULL COMMENT '内容',
  `addtime` varchar(50) DEFAULT NULL,
  `addip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk COMMENT='好友'");
E_D("replace into `dw_friends` values('1','9','4',NULL,'1','1','','1314198890','171.38.155.44');");
E_D("replace into `dw_friends` values('2','4','9',NULL,'1','1','','1314542963','113.219.77.148');");
E_D("replace into `dw_friends` values('3','28','4',NULL,'0','1','','1315631340','123.87.177.3');");
E_D("replace into `dw_friends` values('4','25','13',NULL,'0','1','','1315643622','124.114.177.90');");
E_D("replace into `dw_friends` values('5','99','92',NULL,'0','1','','1321083308','113.117.25.62');");

require("../../inc/footer.php");
?>