<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_flag`;");
E_C("CREATE TABLE `dw_flag` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `nid` varchar(50) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=gbk");
E_D("replace into `dw_flag` values('1','อฦผ๖','t','10');");
E_D("replace into `dw_flag` values('2','อทฬ๕','h','10');");
E_D("replace into `dw_flag` values('3','ปรตฦฦฌ','f','10');");

require("../../inc/footer.php");
?>