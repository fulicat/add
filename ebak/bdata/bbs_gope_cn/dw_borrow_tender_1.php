<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_borrow_tender`;");
E_C("CREATE TABLE `dw_borrow_tender` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT '0' COMMENT '所属站点',
  `user_id` int(11) DEFAULT '0' COMMENT '用户名称',
  `status` int(2) DEFAULT '0' COMMENT '状态',
  `borrow_id` int(11) DEFAULT '0',
  `money` varchar(50) DEFAULT NULL,
  `account` varchar(10) DEFAULT '0',
  `repayment_account` varchar(50) DEFAULT '0' COMMENT '总额',
  `interest` varchar(11) NOT NULL DEFAULT '0',
  `repayment_yesaccount` varchar(50) DEFAULT '0' COMMENT '已还总额',
  `wait_account` varchar(11) DEFAULT '0' COMMENT '待还总额',
  `wait_interest` varchar(11) DEFAULT '0' COMMENT '待还利息',
  `repayment_yesinterest` varchar(50) DEFAULT '0' COMMENT '已还利息',
  `addtime` varchar(50) DEFAULT NULL,
  `addip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_idb` (`borrow_id`),
  KEY `user_idub` (`user_id`,`borrow_id`),
  KEY `user_idubs` (`user_id`,`borrow_id`,`status`)
) ENGINE=MyISAM AUTO_INCREMENT=241 DEFAULT CHARSET=gbk COMMENT='招标'");
E_D("replace into `dw_borrow_tender` values('238','0','86','1','53','300','300','335.16','35.16','0','335.16','35.16','0','1321006302','27.47.118.133');");
E_D("replace into `dw_borrow_tender` values('237','0','90','1','62','100','100','113.52','13.52','0','113.52','13.52','0','1321005685','27.47.118.133');");
E_D("replace into `dw_borrow_tender` values('236','0','86','1','62','50','50','56.76','6.76','0','56.76','6.76','0','1321005644','27.47.118.133');");
E_D("replace into `dw_borrow_tender` values('216','0','88','1','49','200','200','203','3','203','0','0','3','1320335794','127.0.0.1');");
E_D("replace into `dw_borrow_tender` values('217','0','1','1','49','800','800','812','12','812','0','0','12','1320385738','127.0.0.1');");
E_D("replace into `dw_borrow_tender` values('218','0','88','1','50','200','200','203.87','3.87','203.87','0','0','3.87','1320387567','127.0.0.1');");
E_D("replace into `dw_borrow_tender` values('219','0','1','1','50','1000','1000','1019.37','19.37','1019.37','0','0','19.37','1320387629','127.0.0.1');");
E_D("replace into `dw_borrow_tender` values('220','0','86','1','52','200','200','203','3','0','203','3','0','1320850043','27.47.118.133');");
E_D("replace into `dw_borrow_tender` values('221','0','86','1','58','500','500','507.5','7.5','0','507.5','7.5','0','1320850172','27.47.118.133');");
E_D("replace into `dw_borrow_tender` values('222','0','90','1','58','50','50','50.75','0.75','0','50.75','0.75','0','1320851589','27.47.118.133');");
E_D("replace into `dw_borrow_tender` values('223','0','90','1','57','150','150','152.37','2.37','0','152.37','2.37','0','1320851609','27.47.118.133');");
E_D("replace into `dw_borrow_tender` values('224','0','90','1','56','100','100','101.67','1.67','0','101.67','1.67','0','1320851638','27.47.118.133');");
E_D("replace into `dw_borrow_tender` values('225','0','90','1','53','200','200','223.44','23.44','0','223.44','23.44','0','1320851673','27.47.118.133');");
E_D("replace into `dw_borrow_tender` values('226','0','99','1','51','200','200','221.16','21.16','0','221.16','21.16','0','1320897184','27.47.118.133');");
E_D("replace into `dw_borrow_tender` values('227','0','99','1','59','50','50','50.67','0.67','0','50.67','0.67','0','1320897199','27.47.118.133');");
E_D("replace into `dw_borrow_tender` values('228','0','99','1','53','500','500','558.72','58.72','0','558.72','58.72','0','1320897221','27.47.118.133');");
E_D("replace into `dw_borrow_tender` values('229','0','99','1','52','150','150','152.25','2.25','0','152.25','2.25','0','1320897239','27.47.118.133');");
E_D("replace into `dw_borrow_tender` values('230','0','99','1','58','450','450','456.75','6.75','0','456.75','6.75','0','1320897261','27.47.118.133');");
E_D("replace into `dw_borrow_tender` values('231','0','99','1','57','50','50','50.79','0.79','0','50.79','0.79','0','1320897278','27.47.118.133');");
E_D("replace into `dw_borrow_tender` values('232','0','99','1','55','100','100','101.75','1.75','0','101.75','1.75','0','1320897297','27.47.118.133');");
E_D("replace into `dw_borrow_tender` values('233','0','86','2','60','50','50','51.69','1.69','0','51.69','1.69','0','1320897408','27.47.118.133');");
E_D("replace into `dw_borrow_tender` values('234','0','86','1','59','500','500','506.67','6.67','0','506.67','6.67','0','1320897434','27.47.118.133');");
E_D("replace into `dw_borrow_tender` values('235','0','86','1','62','1000','1000','1134.72','134.72','0','1134.72','134.72','0','1321003692','27.47.118.133');");
E_D("replace into `dw_borrow_tender` values('239','0','86','1','58','1000','1000','1015','15','0','1015','15','0','1321111486','120.84.98.127');");
E_D("replace into `dw_borrow_tender` values('240','0','86','1','56','50','50','50.83','0.83','0','50.83','0.83','0','1321422262','120.84.100.162');");

require("../../inc/footer.php");
?>