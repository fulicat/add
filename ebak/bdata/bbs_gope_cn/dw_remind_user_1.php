<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_remind_user`;");
E_C("CREATE TABLE `dw_remind_user` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` smallint(11) unsigned DEFAULT NULL,
  `remind_id` smallint(5) unsigned DEFAULT NULL,
  `message` smallint(2) unsigned DEFAULT '0' COMMENT '短消息',
  `email` smallint(2) unsigned DEFAULT '0' COMMENT '邮箱',
  `phone` smallint(2) unsigned DEFAULT '0' COMMENT '手机',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>