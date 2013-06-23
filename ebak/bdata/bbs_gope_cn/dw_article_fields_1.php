<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_article_fields`;");
E_C("CREATE TABLE `dw_article_fields` (
  `aid` int(11) unsigned NOT NULL DEFAULT '0',
  `files` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `dw_article_fields` values('70','');");
E_D("replace into `dw_article_fields` values('71','');");
E_D("replace into `dw_article_fields` values('72','');");
E_D("replace into `dw_article_fields` values('73','');");
E_D("replace into `dw_article_fields` values('74','');");
E_D("replace into `dw_article_fields` values('75','');");
E_D("replace into `dw_article_fields` values('76','');");
E_D("replace into `dw_article_fields` values('77','');");
E_D("replace into `dw_article_fields` values('78','');");
E_D("replace into `dw_article_fields` values('79','');");
E_D("replace into `dw_article_fields` values('80','');");
E_D("replace into `dw_article_fields` values('81','');");
E_D("replace into `dw_article_fields` values('85','/data/upfiles/annexs/201108221314024190.doc');");
E_D("replace into `dw_article_fields` values('86','');");
E_D("replace into `dw_article_fields` values('87','');");
E_D("replace into `dw_article_fields` values('88','');");
E_D("replace into `dw_article_fields` values('89','');");
E_D("replace into `dw_article_fields` values('90','');");
E_D("replace into `dw_article_fields` values('93','');");
E_D("replace into `dw_article_fields` values('94','');");
E_D("replace into `dw_article_fields` values('95','');");
E_D("replace into `dw_article_fields` values('96','');");
E_D("replace into `dw_article_fields` values('97','');");
E_D("replace into `dw_article_fields` values('98','');");
E_D("replace into `dw_article_fields` values('99','');");
E_D("replace into `dw_article_fields` values('100','');");
E_D("replace into `dw_article_fields` values('101','');");
E_D("replace into `dw_article_fields` values('102','');");
E_D("replace into `dw_article_fields` values('103','');");
E_D("replace into `dw_article_fields` values('104','');");
E_D("replace into `dw_article_fields` values('107','/data/upfiles/annexs/201109011314853810.doc');");
E_D("replace into `dw_article_fields` values('108','');");
E_D("replace into `dw_article_fields` values('110','');");
E_D("replace into `dw_article_fields` values('109','');");
E_D("replace into `dw_article_fields` values('111','');");

require("../../inc/footer.php");
?>