<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('latin1');
E_D("DROP TABLE IF EXISTS `dw_ad`;");
E_C("CREATE TABLE `dw_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nid` varchar(20) NOT NULL DEFAULT '',
  `order` int(10) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '',
  `litpic` varchar(100) NOT NULL DEFAULT '',
  `timelimit` int(2) NOT NULL DEFAULT '0',
  `firsttime` varchar(20) NOT NULL DEFAULT '',
  `endtime` varchar(20) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `endcontent` text NOT NULL,
  `addtime` varchar(50) NOT NULL DEFAULT '',
  `addip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1");
E_D("replace into `dw_ad` values('1','dingbuguanggao','0','dingbuguanggao','','1','','','??????','','1316832832','60.10.40.188');");

require("../../inc/footer.php");
?>