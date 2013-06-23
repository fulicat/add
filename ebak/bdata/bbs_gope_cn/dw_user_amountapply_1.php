<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_user_amountapply`;");
E_C("CREATE TABLE `dw_user_amountapply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(50) NOT NULL DEFAULT '',
  `account` decimal(11,2) NOT NULL DEFAULT '0.00',
  `account_new` decimal(11,2) DEFAULT '0.00',
  `account_old` decimal(11,2) NOT NULL DEFAULT '0.00',
  `status` int(11) DEFAULT '0',
  `addtime` varchar(30) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `remark` text NOT NULL,
  `verify_remark` varchar(255) DEFAULT NULL,
  `verify_time` varchar(10) DEFAULT NULL,
  `verify_user` int(11) DEFAULT NULL,
  `addip` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=gbk");
E_D("replace into `dw_user_amountapply` values('1','4','credit','50000.00','500000.00','3000.00','1','1314262737','','4','a','1315700642','1','58.46.193.18');");
E_D("replace into `dw_user_amountapply` values('2','25','credit','10000.00','0.00','5000.00','2','1314354002','','',NULL,NULL,NULL,'219.144.103.236');");
E_D("replace into `dw_user_amountapply` values('3','13','credit','10000.00','100000.00','5000.00','1','1314680963','','d','e','1315612704','1','58.46.184.119');");
E_D("replace into `dw_user_amountapply` values('4','20','credit','20000.00','20000.00','5000.00','1','1314717565','','e','e','1314717578','1','113.219.166.91');");
E_D("replace into `dw_user_amountapply` values('5','12','credit','20000.00','20000.00','5000.00','1','1314872636','','d','x','1314872649','1','113.219.247.72');");
E_D("replace into `dw_user_amountapply` values('6','38','credit','15000.00','10000.00','5000.00','1','1315354616','请提高额度，谢谢','','通过','1315630743','1','113.117.119.47');");
E_D("replace into `dw_user_amountapply` values('7','44','credit','20000.00','15000.00','5000.00','1','1315612249','','s','w','1315612476','1','113.218.120.128');");
E_D("replace into `dw_user_amountapply` values('8','49','credit','30000.00','50000.00','5000.00','1','1315612308','','','e','1315612495','1','113.218.120.128');");
E_D("replace into `dw_user_amountapply` values('9','13','borrow_vouch','100000.00','100000.00','0.00','1','1315612674','','s','r','1315612712','1','113.218.120.128');");
E_D("replace into `dw_user_amountapply` values('10','50','credit','18000.00','8000.00','5000.00','1','1315614408','','e','r','1315614446','1','113.218.120.128');");
E_D("replace into `dw_user_amountapply` values('11','28','credit','10000.00','0.00','5000.00','2','1315618430','已经还清1次，再秒还，希望能提升额度，谢谢','',NULL,NULL,NULL,'123.87.177.3');");
E_D("replace into `dw_user_amountapply` values('12','4','borrow_vouch','100000.00','100000.00','0.00','1','1315630080','','f','d','1315630109','1','113.218.36.55');");
E_D("replace into `dw_user_amountapply` values('13','12','tender_vouch','30000.00','100000.00','0.00','1','1315630619','','','s','1315657611','1','113.218.36.55');");
E_D("replace into `dw_user_amountapply` values('14','46','tender_vouch','10000.00','0.00','0.00','2','1315631095','','',NULL,NULL,NULL,'112.21.58.168');");
E_D("replace into `dw_user_amountapply` values('15','39','credit','10000.00','10000.00','5000.00','1','1315651558','','','ws','1315651578','1','113.218.125.86');");
E_D("replace into `dw_user_amountapply` values('16','38','borrow_vouch','15000.00','15000000.00','0.00','1','1315828818','请给予担保额度，谢谢','','','1316750984','1','113.117.63.145');");
E_D("replace into `dw_user_amountapply` values('17','68','tender_vouch','50000.00','50000.00','0.00','0','1316927037','aaaaaaa','aaaaaaa','','1320307102','63','222.240.155.4');");
E_D("replace into `dw_user_amountapply` values('18','86','credit','10000.00','10000.00','2000.00','1','1320331824','10000','10000','1111','1320898034','86','127.0.0.1');");
E_D("replace into `dw_user_amountapply` values('19','91','credit','100000.00','0.00','1000.00','2','1320481217','20000','20000',NULL,NULL,NULL,'27.47.105.90');");
E_D("replace into `dw_user_amountapply` values('20','102','credit','5000.00','5000.00','2000.00','1','1320998556','生意周转。','','长华','1320998655','86','183.9.30.73');");
E_D("replace into `dw_user_amountapply` values('21','99','tender_vouch','10000.00','0.00','0.00','2','1321082313','需购机器，可按月付利息。','',NULL,NULL,NULL,'113.117.25.62');");

require("../../inc/footer.php");
?>