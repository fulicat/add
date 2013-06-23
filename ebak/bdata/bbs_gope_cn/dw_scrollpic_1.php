<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_scrollpic`;");
E_C("CREATE TABLE `dw_scrollpic` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `status` smallint(2) unsigned NOT NULL DEFAULT '0',
  `order` smallint(6) NOT NULL DEFAULT '0',
  `flag` smallint(6) DEFAULT NULL,
  `type_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `url` char(60) NOT NULL DEFAULT '',
  `name` char(100) NOT NULL DEFAULT '',
  `pic` char(200) NOT NULL DEFAULT '',
  `summary` char(250) NOT NULL DEFAULT '',
  `hits` int(10) NOT NULL DEFAULT '0',
  `addtime` int(10) NOT NULL DEFAULT '0',
  `addip` char(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=gbk");
E_D("replace into `dw_scrollpic` values('17','0','1','10',NULL,'1','/','Аґ°Й','data/upfiles/images/2011-11/03/86_scrollpic_13203096108.jpg','','0','1314683971','58.46.184.119');");
E_D("replace into `dw_scrollpic` values('18','0','1','10',NULL,'1','/yuanli/','Ф­Ан1','data/upfiles/images/2011-11/04/86_scrollpic_13203378876.jpg','/yuanli/','0','1320337259','127.0.0.1');");

require("../../inc/footer.php");
?>