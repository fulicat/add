<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_borrow_repayment`;");
E_C("CREATE TABLE `dw_borrow_repayment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT '0' COMMENT '所属站点',
  `status` int(2) DEFAULT '0',
  `webstatus` int(2) NOT NULL DEFAULT '0' COMMENT '网站代还',
  `order` int(2) DEFAULT NULL,
  `borrow_id` int(11) DEFAULT '0' COMMENT '借款id',
  `repayment_time` varchar(50) DEFAULT NULL COMMENT '估计还款时间',
  `repayment_yestime` varchar(50) DEFAULT NULL COMMENT '已经还款时间',
  `repayment_account` varchar(50) DEFAULT '0' COMMENT '预还金额',
  `repayment_yesaccount` varchar(50) DEFAULT '0' COMMENT '实还金额',
  `late_days` int(11) NOT NULL DEFAULT '0',
  `late_interest` varchar(11) NOT NULL DEFAULT '0',
  `interest` varchar(50) DEFAULT '0',
  `capital` varchar(50) DEFAULT '0',
  `forfeit` varchar(50) DEFAULT '0' COMMENT '滞纳金',
  `reminder_fee` varchar(50) DEFAULT '0' COMMENT '崔收费',
  `addtime` varchar(50) DEFAULT NULL,
  `addip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_idb` (`borrow_id`),
  KEY `user_idubs` (`borrow_id`,`status`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=gbk");
E_D("replace into `dw_borrow_repayment` values('51','0','0','0','11','53','1352628789',NULL,'93.11','0','0','0','1.6','91.51','0','0','1321006389','27.47.118.133');");
E_D("replace into `dw_borrow_repayment` values('50','0','0','0','10','53','1349950389',NULL,'93.11','0','0','0','3.18','89.93','0','0','1321006389','27.47.118.133');");
E_D("replace into `dw_borrow_repayment` values('49','0','0','0','9','53','1347358389',NULL,'93.11','0','0','0','4.72','88.39','0','0','1321006389','27.47.118.133');");
E_D("replace into `dw_borrow_repayment` values('48','0','0','0','8','53','1344679989',NULL,'93.11','0','0','0','6.24','86.87','0','0','1321006389','27.47.118.133');");
E_D("replace into `dw_borrow_repayment` values('47','0','0','0','7','53','1342001589',NULL,'93.11','0','0','0','7.74','85.37','0','0','1321006389','27.47.118.133');");
E_D("replace into `dw_borrow_repayment` values('46','0','0','0','6','53','1339409589',NULL,'93.11','0','0','0','9.21','83.9','0','0','1321006389','27.47.118.133');");
E_D("replace into `dw_borrow_repayment` values('45','0','0','0','5','53','1336731189',NULL,'93.11','0','0','0','10.65','82.46','0','0','1321006389','27.47.118.133');");
E_D("replace into `dw_borrow_repayment` values('44','0','0','0','4','53','1334139189',NULL,'93.11','0','0','0','12.07','81.04','0','0','1321006389','27.47.118.133');");
E_D("replace into `dw_borrow_repayment` values('43','0','0','0','3','53','1331460789',NULL,'93.11','0','0','0','13.46','79.65','0','0','1321006389','27.47.118.133');");
E_D("replace into `dw_borrow_repayment` values('42','0','0','0','2','53','1328955189',NULL,'93.11','0','0','0','14.83','78.28','0','0','1321006389','27.47.118.133');");
E_D("replace into `dw_borrow_repayment` values('41','0','0','0','1','53','1326276789',NULL,'93.11','0','0','0','16.18','76.93','0','0','1321006389','27.47.118.133');");
E_D("replace into `dw_borrow_repayment` values('40','0','0','0','0','53','1323598389',NULL,'93.11','0','0','0','17.5','75.61','0','0','1321006389','27.47.118.133');");
E_D("replace into `dw_borrow_repayment` values('38','0','1','0','0','49','1322977777','1320386397','1015','1015','0','0','15','1000','0','0','1320385777','127.0.0.1');");
E_D("replace into `dw_borrow_repayment` values('39','0','1','0','0','50','1322979710','1320478687','1223.24','1223.24','0','0','23.24','1200','0','0','1320387710','127.0.0.1');");

require("../../inc/footer.php");
?>