<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_user_cache`;");
E_C("CREATE TABLE `dw_user_cache` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `kefu_userid` int(11) DEFAULT NULL,
  `kefu_username` int(11) DEFAULT NULL,
  `kefu_addtime` int(11) DEFAULT NULL,
  `vip_status` int(2) DEFAULT '0',
  `vip_remark` varchar(250) DEFAULT NULL,
  `vip_money` varchar(100) DEFAULT NULL,
  `vip_verify_remark` varchar(100) DEFAULT NULL,
  `vip_verify_time` varchar(100) DEFAULT NULL,
  `bbs_topics_num` int(11) DEFAULT '0',
  `bbs_posts_num` int(11) DEFAULT '0',
  `credit` int(11) DEFAULT '0' COMMENT '积分',
  `account` int(11) DEFAULT '0' COMMENT '帐户总额',
  `account_use` int(11) DEFAULT '0' COMMENT '可用金额',
  `account_nouse` int(11) DEFAULT '0' COMMENT '冻结金额',
  `account_waitin` int(11) DEFAULT '0' COMMENT '代收总额',
  `account_waitintrest` int(11) DEFAULT '0' COMMENT '代收利息',
  `account_intrest` int(11) DEFAULT '0' COMMENT '净赚利息',
  `account_award` int(11) DEFAULT '0' COMMENT '投标奖励',
  `account_payment` int(11) DEFAULT '0' COMMENT '待还总额',
  `account_expired` int(11) DEFAULT '0' COMMENT '逾期总额',
  `account_waitvip` int(11) DEFAULT '0' COMMENT 'vip会费',
  `borrow_amount` int(11) DEFAULT '3000' COMMENT '借款额度',
  `vouch_amount` int(11) NOT NULL DEFAULT '0' COMMENT '担保额度',
  `borrow_loan` int(11) DEFAULT '0' COMMENT '成功借出',
  `borrow_success` int(11) DEFAULT '0' COMMENT '成功借款',
  `borrow_wait` int(11) DEFAULT '0' COMMENT '等待满标',
  `borrow_paymeng` int(11) DEFAULT '0' COMMENT '待还借款',
  `friends_apply` int(11) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");
E_D("replace into `dw_user_cache` values('1',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','18','0','0','0','0','0','0','0','0','0','0','3000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('48',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','0','0','0','0','0','0','0','0','0','0','0','3000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('2',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','3000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('3',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','0','0','0','0','0','0','0','0','0','0','0','3000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('4','3',NULL,'1314060748','1','4','0','','1314060765','2','0','1843','0','0','0','0','0','0','0','0','0','0','3000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('5',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','189','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('6',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','149','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('7',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','90','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('8',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('9','2',NULL,'1314198960','1','',NULL,'通过','1314238492','0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('10','32',NULL,'1314418416','1','请多关照',NULL,'通过','1314422024','0','0','20','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('11',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','424','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('12','2',NULL,'1314249537','1','3','180','c','1314249565','0','0','666','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('13','3',NULL,'1314255065','1','2','180','w','1314255111','0','0','115','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('14',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','118','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('15','2',NULL,'1314256689','1','2','180','1','1314256727','0','0','40','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('16',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','108','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('17',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','0','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('18',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','71','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('19',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'2','0','58','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('20','2',NULL,'1314264612','1','2','180','5','1314268838','0','0','105','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('21',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','0','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('22',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','70','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('23',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','60','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('24',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','55','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('25','2',NULL,'1314270118','1','','180','通过','1314270161','0','0','57','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('26',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','55','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('27','2',NULL,'1314782336','1','VIP','180','通过','1314789355','0','0','230','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('28','32',NULL,'1314749066','1','','0','通过','1314754100','0','0','96','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('29',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('30',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','0','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('31',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','0','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('32',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','0','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('33','32',NULL,'1314680171','1','你好我可以申请吗','180','通过','1314680609','0','0','58','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('34','30',NULL,'1314542723','1','','180','w','1314543047','0','0','296','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('35',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('36','32',NULL,'1315472312','1','.....',NULL,'通过','1315484485','0','0','30','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('37',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','20','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('38','32',NULL,'1314682549','1','','0','通过','1314682582','0','0','49','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('39','31',NULL,'1314716618','1','','0','哦','1314716801','0','0','119','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('40',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','92','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('41',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','81','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('42',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','61','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('43',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','196','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('44','30',NULL,'1314758689','1','','0','6','1314758974','0','0','85','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('45','2',NULL,'1314783067','1','VIP','180','通过','1314789392','0','0','179','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('46','2',NULL,'1314783189','1','VIP','180','通过，','1314789424','0','0','164','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('47',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('49','2',NULL,'1314866959','1','w','0','d','1314867257','0','0','110','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('50','30',NULL,'1314866296','1','','0','e','1314867241','0','0','84','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('51',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('52','32',NULL,'1316335720','2','',NULL,NULL,NULL,'0','0','0','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('53','2',NULL,'1315651435','2','',NULL,NULL,NULL,'1','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('54',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('55',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('56',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('57',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','24','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('58',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('59',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','0','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('60',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','0','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('61','3',NULL,'1316001377','1','',NULL,'','1316751093','0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('62','31',NULL,'1316792124','1','万事大吉要求 可耕地非机动车',NULL,'','1316792240','1','0','100','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('63','32',NULL,'1317900805','0','得得得',NULL,'',NULL,'0','0','0','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('64',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','0','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('65',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('66','32',NULL,'1317907017','1','75',NULL,'','1317907410','0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('67',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','0','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('68','31',NULL,'1316925385','1','aaaaaaa','180','1185928198','1316926123','0','0','2030','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('69',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('70',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('71',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('72',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('73',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('74',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('75',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('76',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','0','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('77','32',NULL,'1317738393','2','',NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('78',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('79',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','0','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('80','31',NULL,'1317907377','1','我有害',NULL,'','1317907722','15','0','40','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('81',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('82',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','0','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('83',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','0','0','0','0','0','0','0','0','0','0','0','5000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('84',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','20','0','0','0','0','0','0','0','0','0','0','2000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('85','0',NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','2000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('86','0',NULL,'1320317202','1','676668697@qq.com','180','','1320317228','16','0','90','0','0','0','0','0','0','0','0','0','0','2000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('87',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','0','0','0','0','0','0','0','0','0','0','0','2000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('88','87',NULL,'1320331132','1','陈健锋','180','陈健锋','1320331169','1','0','204','0','0','0','0','0','0','0','0','0','0','1000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('89',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','1000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('90','87',NULL,'1320849479','1','陈勇88','180','11','1320923503','1','0','52','0','0','0','0','0','0','0','0','0','0','1000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('91','87',NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','210','0','0','0','0','0','0','0','0','0','0','1000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('92',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','30','0','0','0','0','0','0','0','0','0','0','1000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('93',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'3','0','30','0','0','0','0','0','0','0','0','0','0','1000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('94',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','30','0','0','0','0','0','0','0','0','0','0','1000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('95',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','60','0','0','0','0','0','0','0','0','0','0','1000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('96',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','30','0','0','0','0','0','0','0','0','0','0','2000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('97','87',NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','30','0','0','0','0','0','0','0','0','0','0','2000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('98','0',NULL,NULL,'0',NULL,NULL,NULL,NULL,'17','0','30','0','0','0','0','0','0','0','0','0','0','2000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('99','87',NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','35','0','0','0','0','0','0','0','0','0','0','2000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('100','0',NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','70','0','0','0','0','0','0','0','0','0','0','2000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('101',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','2000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('102',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','70','0','0','0','0','0','0','0','0','0','0','2000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('103',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','2000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('104',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','2000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('105','87',NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','10','0','0','0','0','0','0','0','0','0','0','2000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('106',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','0','0','0','0','0','0','0','0','0','0','0','2000','0','0','0','0','0','0');");
E_D("replace into `dw_user_cache` values('107',NULL,NULL,NULL,'0',NULL,NULL,NULL,NULL,'0','0','0','0','0','0','0','0','0','0','0','0','0','2000','0','0','0','0','0','0');");

require("../../inc/footer.php");
?>