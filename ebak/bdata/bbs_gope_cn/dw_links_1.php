<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_links`;");
E_C("CREATE TABLE `dw_links` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `status` smallint(2) unsigned NOT NULL DEFAULT '0',
  `order` smallint(6) NOT NULL DEFAULT '0',
  `flag` smallint(6) DEFAULT NULL,
  `type_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `url` char(60) NOT NULL DEFAULT '',
  `webname` char(30) NOT NULL DEFAULT '',
  `summary` char(200) NOT NULL DEFAULT '',
  `linkman` char(50) NOT NULL DEFAULT '',
  `email` char(50) NOT NULL DEFAULT '',
  `logo` char(100) NOT NULL DEFAULT '',
  `logoimg` char(100) NOT NULL DEFAULT '',
  `province` char(10) NOT NULL DEFAULT '',
  `city` char(10) NOT NULL DEFAULT '',
  `area` char(10) NOT NULL DEFAULT '',
  `hits` int(10) NOT NULL DEFAULT '0',
  `addtime` int(10) NOT NULL DEFAULT '0',
  `addip` char(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=gbk");
E_D("replace into `dw_links` values('2','0','1','10','0','2','https://www.alipay.com/','支付宝','合作伙伴','支付宝','','','data/upfiles/images/2011-04/03/2_system_13018086674.gif','','','','0','1287700055','222.59.180.146');");
E_D("replace into `dw_links` values('6','0','1','13','0','2','http://www.id5.cn/','身份网','远离假身份','','','','data/upfiles/images/2011-04/03/2_system_13018084307.gif','','','','0','1289797452','113.83.206.128');");
E_D("replace into `dw_links` values('7','0','1','15','0','2','https://www.tenpay.com/','财付通','全作伙伴','','','','data/upfiles/images/2011-04/03/2_system_13018084115.gif','','','','0','1289797919','113.83.206.128');");
E_D("replace into `dw_links` values('10','0','1','10',NULL,'1','http://www.7rz.cn/','潮商贷款网','阿来','阿来','','','','','','','0','1320298544','127.0.0.1');");
E_D("replace into `dw_links` values('11','0','1','32767',NULL,'1','http://www.jinlanfen.com','欢迎站长做友链','联系QQ104749323','阿来','','','','','','','0','1320923611','27.47.118.133');");

require("../../inc/footer.php");
?>