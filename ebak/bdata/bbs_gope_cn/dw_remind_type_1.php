<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_remind_type`;");
E_C("CREATE TABLE `dw_remind_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order` smallint(6) DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `nid` varchar(50) DEFAULT NULL,
  `addtime` int(10) DEFAULT '0',
  `addip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=gbk");
E_D("replace into `dw_remind_type` values('1','10','资金站内信设置','account','0',NULL);");
E_D("replace into `dw_remind_type` values('2','10','贷款者站内信设置','borrow','0',NULL);");
E_D("replace into `dw_remind_type` values('3','10','投资者站内信设置','invest','0',NULL);");

require("../../inc/footer.php");
?>