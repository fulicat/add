<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_borrow_amount`;");
E_C("CREATE TABLE `dw_borrow_amount` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(20) NOT NULL DEFAULT '',
  `account` int(11) NOT NULL DEFAULT '0',
  `newaccount` decimal(11,0) DEFAULT '0',
  `oldaccount` int(11) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT '0',
  `addtime` varchar(30) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `remark` text NOT NULL,
  `verify_remark` varchar(255) DEFAULT NULL,
  `verify_time` varchar(10) DEFAULT NULL,
  `verify_user` int(11) DEFAULT NULL,
  `addip` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>