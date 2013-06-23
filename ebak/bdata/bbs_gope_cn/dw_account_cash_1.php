<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_account_cash`;");
E_C("CREATE TABLE `dw_account_cash` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0' COMMENT '用户ID',
  `status` int(2) DEFAULT '0' COMMENT '状态',
  `account` varchar(50) DEFAULT '0' COMMENT '账号',
  `bank` text COMMENT '所属银行',
  `branch` varchar(100) DEFAULT NULL COMMENT '支行',
  `total` int(20) DEFAULT '0' COMMENT '总额',
  `credited` varchar(20) DEFAULT '0' COMMENT '到账总额',
  `fee` varchar(20) DEFAULT '0' COMMENT '手续费',
  `verify_userid` int(11) DEFAULT NULL,
  `verify_time` int(11) DEFAULT NULL,
  `verify_remark` varchar(250) DEFAULT NULL,
  `addtime` varchar(11) DEFAULT NULL,
  `addip` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_ids` (`user_id`,`status`),
  KEY `user_idv` (`user_id`,`status`,`verify_userid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=gbk COMMENT='提现记录'");
E_D("replace into `dw_account_cash` values('1','14','2','39660240941','468','兴业银行广州分行海珠支行','495','484.59','10','1','1314677086','请填写正确的银行卡信息','1314295580','113.65.152.212');");
E_D("replace into `dw_account_cash` values('2','22','3','622909396311227313','468','兴业银行广州分行海珠支行','1014','1003.5','10',NULL,NULL,NULL,'1314375663','113.65.175.155');");
E_D("replace into `dw_account_cash` values('3','24','3','6222022017005426723','300','工商银行广东肇庆城东支行','1014','1003.5','10',NULL,NULL,NULL,'1314614261','113.65.186.192');");
E_D("replace into `dw_account_cash` values('4','26','3','6222022017005426731','300','工商银行广东肇庆城东支行','1014','1003.5','10',NULL,NULL,NULL,'1314614425','113.65.186.192');");
E_D("replace into `dw_account_cash` values('5','25','2','6228480220326456815','303','咸阳市淳化县支行','700','690','10','63','1317874223','不通过！','1315652488','124.114.177.90');");
E_D("replace into `dw_account_cash` values('6','27','3','6226682000370791','473','南京分行江宁支行','11215','11204.81','10',NULL,NULL,NULL,'1315709576','183.209.42.217');");
E_D("replace into `dw_account_cash` values('7','26','3','6222022017005426731','300','工商银行广东肇庆城东支行','1057','1046.79','10',NULL,NULL,NULL,'1315709705','113.65.153.25');");
E_D("replace into `dw_account_cash` values('8','24','3','6222022017005426723','300','工商银行广东肇庆城东支行','1057','1047.14','10',NULL,NULL,NULL,'1315710712','113.65.173.135');");
E_D("replace into `dw_account_cash` values('9','19','3','622909396154454016','468','兴业银行广州分行五羊支行','1162','1152.22','10',NULL,NULL,NULL,'1315710760','113.65.154.216');");
E_D("replace into `dw_account_cash` values('10','23','3','622909396140686614','468','兴业银行广州分行海珠支行','1061','1051.18','10',NULL,NULL,NULL,'1315710806','113.65.185.77');");
E_D("replace into `dw_account_cash` values('11','16','3','622909336540185619','468','兴业银行深圳分行营业部','2368','2357.93','10',NULL,NULL,NULL,'1315710952','113.65.185.133');");
E_D("replace into `dw_account_cash` values('12','13','1','6222021914000106777','300','江西分行','44980','44970','10','1','1315715794','j','1315715718','113.218.4.79');");
E_D("replace into `dw_account_cash` values('13','46','1','6226622000816807','473','南京分行江宁支行','11058','11048.22','10','1','1315716014','转入卡卡西529861','1315715839','183.209.42.217');");
E_D("replace into `dw_account_cash` values('14','45','1','6226622001181102','473','南京分行江宁支行上元大街分理处','11218','11207.6','10','1','1315716089','转入卡卡西529861','1315715956','183.209.42.217');");
E_D("replace into `dw_account_cash` values('15','27','1','6226682000370791','473','南京分行江宁支行','33491','33481','10','1','1316751031','1','1315876658','180.111.28.225');");
E_D("replace into `dw_account_cash` values('16','28','1','13638810629','300','支付宝','320','310','10','63','1317785952','通过审核测试','1315978096','123.87.177.95');");
E_D("replace into `dw_account_cash` values('17','86','2','6228411390219721114','303','揭阳分行东山支行','300','290','10','86','1320321805','10','1320321703','127.0.0.1');");
E_D("replace into `dw_account_cash` values('18','86','1','6228411390219721114','303','揭阳分行东山支行','315','305','10','86','1320321863','305','1320321837','127.0.0.1');");
E_D("replace into `dw_account_cash` values('19','86','1','6228411390219721114','303','揭阳分行东山支行','917','907.76','10','86','1320503431','测试的。','1320503149','113.86.108.22');");
E_D("replace into `dw_account_cash` values('20','99','2','6222082019000107297','300','揭阳分行阳美支行','3400','3390','10','86','1321097505','财务出错。请见谅','1321082869','113.117.25.62');");

require("../../inc/footer.php");
?>