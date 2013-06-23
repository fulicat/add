<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_invite_type`;");
E_C("CREATE TABLE `dw_invite_type` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `typename` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=gbk");
E_D("replace into `dw_invite_type` values('1','财务部');");
E_D("replace into `dw_invite_type` values('2','管理部');");
E_D("replace into `dw_invite_type` values('3','销售部');");

require("../../inc/footer.php");
?>