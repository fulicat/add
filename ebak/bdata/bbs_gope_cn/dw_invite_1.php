<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_invite`;");
E_C("CREATE TABLE `dw_invite` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` smallint(5) unsigned DEFAULT '0',
  `status` smallint(2) unsigned DEFAULT '0',
  `order` smallint(6) DEFAULT '0',
  `flag` varchar(30) DEFAULT '0',
  `type_id` smallint(5) unsigned DEFAULT '0',
  `name` varchar(250) DEFAULT NULL,
  `province` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `area` varchar(10) DEFAULT NULL,
  `num` varchar(50) DEFAULT NULL,
  `description` text,
  `demand` text,
  `hits` int(10) DEFAULT '0',
  `addtime` int(10) DEFAULT '0',
  `addip` varchar(20) DEFAULT NULL,
  `uptime` int(10) DEFAULT '0',
  `upip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk");
E_D("replace into `dw_invite` values('5','0','1','10','','1','本公司现招聘业务人员如下','','','','','本公司现招聘业务人员如下','本公司现招聘业务人员如下','15','1320306031','127.0.0.1','0',NULL);");

require("../../inc/footer.php");
?>