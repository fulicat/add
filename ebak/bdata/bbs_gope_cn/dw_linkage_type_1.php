<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_linkage_type`;");
E_C("CREATE TABLE `dw_linkage_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order` smallint(6) DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  `nid` varchar(50) DEFAULT NULL,
  `addtime` int(10) DEFAULT '0',
  `addip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nid` (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=gbk");
E_D("replace into `dw_linkage_type` values('1','10','婚姻状况','user_marry','0','');");
E_D("replace into `dw_linkage_type` values('2','10','用户-子女','user_child','0','');");
E_D("replace into `dw_linkage_type` values('3','10','用户-学历','user_education','0','');");
E_D("replace into `dw_linkage_type` values('4','10','用户-收入','user_income','0','');");
E_D("replace into `dw_linkage_type` values('5','10','用户-社保','user_shebao','0','');");
E_D("replace into `dw_linkage_type` values('6','10','用户-住房条件','user_housing','0','');");
E_D("replace into `dw_linkage_type` values('7','10','用户-是否有车','user_car','0','');");
E_D("replace into `dw_linkage_type` values('8','10','用户-是否逾期','user_late','0','');");
E_D("replace into `dw_linkage_type` values('9','10','用户-供款状况','user_status','0','');");
E_D("replace into `dw_linkage_type` values('10','10','用户-公司性质','user_company_type','0','');");
E_D("replace into `dw_linkage_type` values('11','10','用户-公司行业','user_company_industry','0','');");
E_D("replace into `dw_linkage_type` values('12','10','用户-工作级别','user_company_jibie','0','');");
E_D("replace into `dw_linkage_type` values('13','10','用户-职 位','user_company_office','0','');");
E_D("replace into `dw_linkage_type` values('14','10','用户-工作年限','user_company_workyear','0','');");
E_D("replace into `dw_linkage_type` values('15','10','用户-经营场所','user_private_place','0','');");
E_D("replace into `dw_linkage_type` values('16','10','用户-自有房产','user_finance_property','0','');");
E_D("replace into `dw_linkage_type` values('17','10','用户-自有汽车','user_finance_car','0','');");
E_D("replace into `dw_linkage_type` values('18','10','用户-联系人关系','user_relation','0','');");
E_D("replace into `dw_linkage_type` values('19','10','借款用途','borrow_use','0','');");
E_D("replace into `dw_linkage_type` values('20','10','借款期限','borrow_time_limit','0','');");
E_D("replace into `dw_linkage_type` values('21','10','还款方式','borrow_style','0','');");
E_D("replace into `dw_linkage_type` values('22','10','最低投标金额','borrow_lowest_account','0','');");
E_D("replace into `dw_linkage_type` values('23','10','最多投标总额','borrow_most_account','0','');");
E_D("replace into `dw_linkage_type` values('24','10','有效时间','borrow_valid_time','0','');");
E_D("replace into `dw_linkage_type` values('25','10','帐户银行','account_bank','0','');");
E_D("replace into `dw_linkage_type` values('26','10','短消息类型','message_type','0','');");
E_D("replace into `dw_linkage_type` values('27','10','隐私设置类型','yinsi','0','');");
E_D("replace into `dw_linkage_type` values('28','10','密码保护设置','pwd_protection','0','');");
E_D("replace into `dw_linkage_type` values('29','10','好友类型','friends_type','0','');");
E_D("replace into `dw_linkage_type` values('30','10','用户资金类别','account_type','0','');");
E_D("replace into `dw_linkage_type` values('31','10','56个民族','nation','0','');");
E_D("replace into `dw_linkage_type` values('32','10','证件类别','card_type','0','');");
E_D("replace into `dw_linkage_type` values('33','10','招标的状态','borrow_type','0','');");
E_D("replace into `dw_linkage_type` values('34','10','贷款用途','borrow_yongtu','0','');");
E_D("replace into `dw_linkage_type` values('35','10','贷款期限','borrow_qixian','0','');");
E_D("replace into `dw_linkage_type` values('36','10','金额范围','account_amange','0','');");

require("../../inc/footer.php");
?>