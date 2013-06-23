<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_fee`;");
E_C("CREATE TABLE `dw_fee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL COMMENT 'Ãû³Æ',
  `nid` int(11) DEFAULT NULL COMMENT 'À¸Ä¿ID',
  `value` varchar(30) DEFAULT NULL COMMENT 'Öµ',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>