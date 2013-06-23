<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_account_bank`;");
E_C("CREATE TABLE `dw_account_bank` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0' COMMENT '用户ID',
  `account` varchar(100) DEFAULT NULL COMMENT '账号',
  `bank` varchar(50) DEFAULT NULL COMMENT '所属银行',
  `branch` varchar(100) DEFAULT NULL COMMENT '支行',
  `province` int(5) DEFAULT '0' COMMENT '省份',
  `city` int(5) DEFAULT '0' COMMENT '城市',
  `area` int(5) DEFAULT '0' COMMENT '区',
  `addtime` varchar(11) DEFAULT NULL,
  `addip` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=gbk COMMENT='银行帐户'");
E_D("replace into `dw_account_bank` values('1','4','6222021914000106774','300','江西分行','0','0','0','1314065321','58.46.172.103');");
E_D("replace into `dw_account_bank` values('2','22','622909396311227313','468','兴业银行广州分行海珠支行','0','0','0','1314294687','113.65.152.212');");
E_D("replace into `dw_account_bank` values('3','14','39660240941','468','兴业银行广州分行海珠支行','0','0','0','1314294789','113.65.152.212');");
E_D("replace into `dw_account_bank` values('4','18','622909396560735412','468','兴业银行广州分行东风支行','0','0','0','1314294969','113.65.152.212');");
E_D("replace into `dw_account_bank` values('5','16','622909336540185619','468','兴业银行深圳分行营业部','0','0','0','1314295055','113.65.152.212');");
E_D("replace into `dw_account_bank` values('6','23','622909396140686614','468','兴业银行广州分行海珠支行','0','0','0','1314295116','113.65.152.212');");
E_D("replace into `dw_account_bank` values('7','19','622909396154454016','468','兴业银行广州分行五羊支行','0','0','0','1314295207','113.65.152.212');");
E_D("replace into `dw_account_bank` values('8','26','6222022017005426731','300','工商银行广东肇庆城东支行','0','0','0','1314295391','113.65.152.212');");
E_D("replace into `dw_account_bank` values('9','24','6222022017005426723','300','工商银行广东肇庆城东支行','0','0','0','1314295438','113.65.152.212');");
E_D("replace into `dw_account_bank` values('10','25','6228480220326456815','303','咸阳市淳化县支行','0','0','0','1314676439','219.144.108.192');");
E_D("replace into `dw_account_bank` values('11','45','6226622001181102','473','南京分行江宁支行上元大街分理处','0','0','0','1315715931','183.209.42.217');");
E_D("replace into `dw_account_bank` values('12','46','6226622000816807','473','南京分行江宁支行','0','0','0','1314793431','112.4.63.146');");
E_D("replace into `dw_account_bank` values('13','27','6226682000370791','473','南京分行江宁支行','0','0','0','1314793477','112.4.63.146');");
E_D("replace into `dw_account_bank` values('14','53','6228480070069830712','303','福建省厦门市湖里区金尚路中孚支行','0','0','0','1315651507','125.93.183.3');");
E_D("replace into `dw_account_bank` values('15','13','6222021914000106777','300','江西分行','0','0','0','1315715638','113.218.4.79');");
E_D("replace into `dw_account_bank` values('16','28','13638810629','300','支付宝','0','0','0','1315978021','123.87.177.95');");
E_D("replace into `dw_account_bank` values('17','86','6228411390219721114','303','揭阳分行东山支行','0','0','0','1320317669','127.0.0.1');");
E_D("replace into `dw_account_bank` values('18','102','6228481394163129212','303','揭阳分行埔上支行步行街分理处','0','0','0','1320992459','183.9.30.73');");
E_D("replace into `dw_account_bank` values('19','99','6222082019000107297','300','揭阳分行阳美支行','0','0','0','1321082598','113.117.25.62');");

require("../../inc/footer.php");
?>