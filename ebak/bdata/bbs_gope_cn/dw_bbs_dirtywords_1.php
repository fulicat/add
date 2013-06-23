<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_bbs_dirtywords`;");
E_C("CREATE TABLE `dw_bbs_dirtywords` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `word` char(45) DEFAULT NULL,
  `replaceto` char(45) DEFAULT NULL,
  `type` tinyint(3) unsigned DEFAULT '0',
  `doaction` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk ROW_FORMAT=FIXED");

require("../../inc/footer.php");
?>