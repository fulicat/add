<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_user_amountlog`;");
E_C("CREATE TABLE `dw_user_amountlog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `type` varchar(50) NOT NULL DEFAULT '',
  `amount_type` varchar(50) NOT NULL DEFAULT '',
  `account` decimal(11,2) NOT NULL DEFAULT '0.00',
  `account_all` decimal(11,2) NOT NULL DEFAULT '0.00',
  `account_use` decimal(11,2) NOT NULL DEFAULT '0.00',
  `account_nouse` decimal(11,2) NOT NULL DEFAULT '0.00',
  `remark` text NOT NULL,
  `addtime` varchar(50) NOT NULL DEFAULT '',
  `addip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=80 DEFAULT CHARSET=gbk");
E_D("replace into `dw_user_amountlog` values('1','4','borrow_success','credit','3000.00','3000.00','0.00','3000.00','借款标满标审核通过，借款信用额度减少','1314098801','118.253.4.77');");
E_D("replace into `dw_user_amountlog` values('2','4','borrrow_repay','credit','3045.00','3000.00','3045.00','-45.00','成功还款，额度增加','1314098900','118.253.4.77');");
E_D("replace into `dw_user_amountlog` values('3','4','borrow_success','credit','3045.00','3000.00','0.00','3000.00','借款标满标审核通过，借款信用额度减少','1314262691','58.46.193.18');");
E_D("replace into `dw_user_amountlog` values('4','4','apply_add','credit','50000.00','50000.00','47000.00','3000.00','申请额度审核通过','1314262759','58.46.193.18');");
E_D("replace into `dw_user_amountlog` values('5','4','borrrow_repay','credit','3067.53','50000.00','50067.53','-67.53','成功还款，额度增加','1314262797','58.46.193.18');");
E_D("replace into `dw_user_amountlog` values('6','13','borrow_success','credit','2000.00','5000.00','3000.00','2000.00','借款标满标审核通过，借款信用额度减少','1314262953','58.46.193.18');");
E_D("replace into `dw_user_amountlog` values('7','12','borrow_success','credit','888.00','5000.00','4112.00','888.00','借款标满标审核通过，借款信用额度减少','1314272139','118.253.11.171');");
E_D("replace into `dw_user_amountlog` values('8','12','borrrow_repay','credit','901.32','5000.00','5013.32','-13.32','成功还款，额度增加','1314272399','118.253.11.171');");
E_D("replace into `dw_user_amountlog` values('9','15','borrow_success','credit','500.00','5000.00','4500.00','500.00','借款标满标审核通过，借款信用额度减少','1314325747','58.46.179.32');");
E_D("replace into `dw_user_amountlog` values('10','4','borrow_success','credit','8888.00','50000.00','41179.53','8820.47','借款标满标审核通过，借款信用额度减少','1314325769','58.46.179.32');");
E_D("replace into `dw_user_amountlog` values('11','4','borrrow_repay','credit','9021.32','50000.00','50200.85','-200.85','成功还款，额度增加','1314325819','58.46.179.32');");
E_D("replace into `dw_user_amountlog` values('12','13','borrrow_repay','credit','2020.00','5000.00','5020.00','-20.00','成功还款，额度增加','1314326175','58.46.179.32');");
E_D("replace into `dw_user_amountlog` values('13','15','borrrow_repay','credit','505.00','5000.00','5005.00','-5.00','成功还款，额度增加','1314596258','58.46.162.87');");
E_D("replace into `dw_user_amountlog` values('14','13','borrow_success','credit','3000.00','5000.00','2020.00','2980.00','借款标满标审核通过，借款信用额度减少','1314665243','113.219.225.103');");
E_D("replace into `dw_user_amountlog` values('15','12','borrow_success','credit','5000.00','5000.00','13.32','4986.68','借款标满标审核通过，借款信用额度减少','1314665273','113.219.225.103');");
E_D("replace into `dw_user_amountlog` values('16','20','borrow_success','credit','5000.00','5000.00','0.00','5000.00','借款标满标审核通过，借款信用额度减少','1314665294','113.219.225.103');");
E_D("replace into `dw_user_amountlog` values('17','25','borrow_success','credit','1000.00','5000.00','4000.00','1000.00','借款标满标审核通过，借款信用额度减少','1314665320','113.219.225.103');");
E_D("replace into `dw_user_amountlog` values('18','12','borrrow_repay','credit','5075.00','5000.00','5088.32','-88.32','成功还款，额度增加','1314677262','58.46.184.119');");
E_D("replace into `dw_user_amountlog` values('19','13','borrrow_repay','credit','3040.00','5000.00','5060.00','-60.00','成功还款，额度增加','1314680942','58.46.184.119');");
E_D("replace into `dw_user_amountlog` values('20','13','apply_add','credit','10000.00','10000.00','10060.00','-60.00','申请额度审核通过','1314680985','58.46.184.119');");
E_D("replace into `dw_user_amountlog` values('21','20','borrrow_repay','credit','5037.00','5000.00','5037.00','-37.00','成功还款，额度增加','1314717525','113.219.166.91');");
E_D("replace into `dw_user_amountlog` values('22','20','apply_add','credit','20000.00','20000.00','20037.00','-37.00','申请额度审核通过','1314717578','113.219.166.91');");
E_D("replace into `dw_user_amountlog` values('23','38','borrow_success','credit','500.00','5000.00','4500.00','500.00','借款标满标审核通过，借款信用额度减少','1314753325','58.46.178.119');");
E_D("replace into `dw_user_amountlog` values('24','33','borrow_success','credit','1000.00','5000.00','4000.00','1000.00','借款标满标审核通过，借款信用额度减少','1314789582','113.219.34.69');");
E_D("replace into `dw_user_amountlog` values('25','4','borrow_success','credit','50000.00','50000.00','200.85','49799.15','借款标满标审核通过，借款信用额度减少','1314789683','113.219.34.69');");
E_D("replace into `dw_user_amountlog` values('26','4','borrrow_repay','credit','50750.00','50000.00','50950.85','-950.85','成功还款，额度增加','1314798827','113.219.199.111');");
E_D("replace into `dw_user_amountlog` values('27','38','borrrow_repay','credit','506.25','5000.00','5006.25','-6.25','成功还款，额度增加','1314826284','113.117.117.22');");
E_D("replace into `dw_user_amountlog` values('28','39','borrow_success','credit','2888.00','5000.00','2112.00','2888.00','借款标满标审核通过，借款信用额度减少','1314849367','58.46.183.83');");
E_D("replace into `dw_user_amountlog` values('29','4','apply_add','credit','100000.00','100000.00','100950.85','-950.85','申请额度审核通过','1314867550','113.219.247.72');");
E_D("replace into `dw_user_amountlog` values('30','39','borrrow_repay','credit','2916.88','5000.00','5028.88','-28.88','成功还款，额度增加','1314872500','113.219.247.72');");
E_D("replace into `dw_user_amountlog` values('31','12','apply_add','credit','20000.00','20000.00','20088.32','-88.32','申请额度审核通过','1314872649','113.219.247.72');");
E_D("replace into `dw_user_amountlog` values('32','33','borrrow_repay','credit','1018.33','5000.00','5018.33','-18.33','成功还款，额度增加','1314928141','118.250.168.196');");
E_D("replace into `dw_user_amountlog` values('33','12','borrow_success','credit','8888.00','20000.00','11200.32','8799.68','借款标满标审核通过，借款信用额度减少','1315441757','113.218.152.110');");
E_D("replace into `dw_user_amountlog` values('34','28','borrow_success','credit','500.00','5000.00','4500.00','500.00','借款标满标审核通过，借款信用额度减少','1315441770','113.218.152.110');");
E_D("replace into `dw_user_amountlog` values('35','49','borrow_success','credit','5000.00','5000.00','0.00','5000.00','借款标满标审核通过，借款信用额度减少','1315441821','113.218.152.110');");
E_D("replace into `dw_user_amountlog` values('36','44','borrow_success','credit','5000.00','5000.00','0.00','5000.00','借款标满标审核通过，借款信用额度减少','1315441854','113.218.152.110');");
E_D("replace into `dw_user_amountlog` values('37','12','borrrow_repay','credit','8976.88','20000.00','20177.20','-177.20','成功还款，额度增加','1315442653','113.218.152.110');");
E_D("replace into `dw_user_amountlog` values('38','50','borrow_success','credit','4888.00','5000.00','112.00','4888.00','借款标满标审核通过，借款信用额度减少','1315611158','113.218.120.128');");
E_D("replace into `dw_user_amountlog` values('39','13','borrow_success','credit','10000.00','10000.00','60.00','9940.00','借款标满标审核通过，借款信用额度减少','1315611209','113.218.120.128');");
E_D("replace into `dw_user_amountlog` values('40','44','borrrow_repay','credit','5050.00','5000.00','5050.00','-50.00','成功还款，额度增加','1315611657','113.218.120.128');");
E_D("replace into `dw_user_amountlog` values('41','49','borrrow_repay','credit','5050.00','5000.00','5050.00','-50.00','成功还款，额度增加','1315612283','113.218.120.128');");
E_D("replace into `dw_user_amountlog` values('42','44','apply_add','credit','15000.00','15000.00','15050.00','-50.00','申请额度审核通过','1315612476','113.218.120.128');");
E_D("replace into `dw_user_amountlog` values('43','49','apply_add','credit','50000.00','50000.00','50050.00','-50.00','申请额度审核通过','1315612495','113.218.120.128');");
E_D("replace into `dw_user_amountlog` values('44','13','apply_add','credit','100000.00','100000.00','90060.00','9940.00','申请额度审核通过','1315612704','113.218.120.128');");
E_D("replace into `dw_user_amountlog` values('45','13','apply_add','borrow_vouch','100000.00','100000.00','100000.00','0.00','申请额度审核通过','1315612712','113.218.120.128');");
E_D("replace into `dw_user_amountlog` values('46','39','borrow_success','credit','5000.00','5000.00','28.88','4971.12','借款标满标审核通过，借款信用额度减少','1315614184','113.218.120.128');");
E_D("replace into `dw_user_amountlog` values('47','50','borrrow_repay','credit','4924.17','5000.00','5036.17','-36.17','成功还款，额度增加','1315614386','113.218.120.128');");
E_D("replace into `dw_user_amountlog` values('48','50','apply_add','credit','8000.00','8000.00','8036.17','-36.17','申请额度审核通过','1315614446','113.218.120.128');");
E_D("replace into `dw_user_amountlog` values('49','28','borrrow_repay','credit','503.33','5000.00','5003.33','-3.33','成功还款，额度增加','1315616967','123.87.177.3');");
E_D("replace into `dw_user_amountlog` values('50','28','borrow_success','credit','3000.00','5000.00','2003.33','2996.67','借款标满标审核通过，借款信用额度减少','1315627021','113.218.36.55');");
E_D("replace into `dw_user_amountlog` values('51','28','borrrow_repay','credit','1020.07','5000.00','3023.40','1976.60','成功还款，额度增加','1315627325','123.87.177.3');");
E_D("replace into `dw_user_amountlog` values('52','28','borrrow_repay','credit','1020.07','5000.00','4043.47','956.53','成功还款，额度增加','1315627345','123.87.177.3');");
E_D("replace into `dw_user_amountlog` values('53','4','borrow_success','credit','88888.00','100000.00','12062.85','87937.15','借款标满标审核通过，借款信用额度减少','1315629500','113.218.36.55');");
E_D("replace into `dw_user_amountlog` values('54','4','apply_add','borrow_vouch','100000.00','100000.00','100000.00','0.00','申请额度审核通过','1315630109','113.218.36.55');");
E_D("replace into `dw_user_amountlog` values('55','12','apply_add','tender_vouch','30000.00','30000.00','30000.00','0.00','申请额度审核通过','1315630651','113.218.36.55');");
E_D("replace into `dw_user_amountlog` values('56','12','tender_vouch_sucess','tender_vouch','30000.00','30000.00','0.00','30000.00','担保成功','1315630698','113.218.36.55');");
E_D("replace into `dw_user_amountlog` values('57','38','apply_add','credit','10000.00','10000.00','10006.25','-6.25','申请额度审核通过','1315630743','113.218.36.55');");
E_D("replace into `dw_user_amountlog` values('58','13','borrow_success','credit','90000.00','100000.00','60.00','99940.00','借款标满标审核通过，借款信用额度减少','1315651473','113.218.125.86');");
E_D("replace into `dw_user_amountlog` values('59','39','borrrow_repay','credit','5037.04','5000.00','5065.92','-65.92','成功还款，额度增加','1315651533','113.218.125.86');");
E_D("replace into `dw_user_amountlog` values('60','39','apply_add','credit','10000.00','10000.00','10065.92','-65.92','申请额度审核通过','1315651578','113.218.125.86');");
E_D("replace into `dw_user_amountlog` values('61','4','borrrow_repay','credit','90757.61','100000.00','102820.46','-2820.46','成功还款，额度增加','1315657360','113.218.125.86');");
E_D("replace into `dw_user_amountlog` values('62','12','apply_add','tender_vouch','100000.00','100000.00','70000.00','30000.00','申请额度审核通过','1315657611','113.218.125.86');");
E_D("replace into `dw_user_amountlog` values('63','12','tender_vouch_sucess','tender_vouch','20000.00','100000.00','50000.00','50000.00','担保成功','1315657670','113.218.125.86');");
E_D("replace into `dw_user_amountlog` values('64','12','tender_vouch_false','tender_vouch','20000.00','100000.00','70000.00','30000.00','担保标失败，投资担保额度返还','1315700557','113.218.92.0');");
E_D("replace into `dw_user_amountlog` values('65','12','tender_vouch_false','tender_vouch','30000.00','100000.00','100000.00','0.00','担保标失败，投资担保额度返还','1315700557','113.218.92.0');");
E_D("replace into `dw_user_amountlog` values('66','4','apply_add','credit','500000.00','500000.00','502820.46','-2820.46','申请额度审核通过','1315700642','113.218.92.0');");
E_D("replace into `dw_user_amountlog` values('67','28','borrrow_repay','credit','1020.07','5000.00','5063.54','-63.54','成功还款，额度增加','1315703618','123.87.178.188');");
E_D("replace into `dw_user_amountlog` values('68','38','borrow_success','credit','3888.00','10000.00','6118.25','3881.75','借款标满标审核通过，借款信用额度减少','1316750965','112.239.23.180');");
E_D("replace into `dw_user_amountlog` values('69','38','apply_add','borrow_vouch','15000000.00','15000000.00','15000000.00','0.00','申请额度审核通过','1316750984','112.239.23.180');");
E_D("replace into `dw_user_amountlog` values('70','68','apply_add','tender_vouch','50000.00','50000.00','50000.00','0.00','申请额度审核通过','1317690785','112.240.167.139');");
E_D("replace into `dw_user_amountlog` values('71','15','borrow_success','credit','5000.00','5000.00','5.00','4995.00','借款标满标审核通过，借款信用额度减少','1317891431','120.193.119.210');");
E_D("replace into `dw_user_amountlog` values('72','25','borrrow_repay','credit','1015.18','5000.00','5015.18','-15.18','成功还款，额度增加','1317892984','120.193.119.210');");
E_D("replace into `dw_user_amountlog` values('73','86','borrow_success','credit','1000.00','2000.00','1000.00','1000.00','借款标满标审核通过，借款信用额度减少','1320385777','127.0.0.1');");
E_D("replace into `dw_user_amountlog` values('74','86','borrrow_repay','credit','1015.00','2000.00','2015.00','-15.00','成功还款，额度增加','1320386397','127.0.0.1');");
E_D("replace into `dw_user_amountlog` values('75','86','borrow_success','credit','1200.00','2000.00','815.00','1185.00','借款标满标审核通过，借款信用额度减少','1320387710','127.0.0.1');");
E_D("replace into `dw_user_amountlog` values('76','86','borrrow_repay','credit','1223.24','2000.00','2038.24','-38.24','成功还款，额度增加','1320478687','27.47.105.90');");
E_D("replace into `dw_user_amountlog` values('77','86','apply_add','credit','10000.00','10000.00','10038.24','-38.24','申请额度审核通过','1320898034','27.47.118.133');");
E_D("replace into `dw_user_amountlog` values('78','102','apply_add','credit','5000.00','5000.00','5000.00','0.00','申请额度审核通过','1320998655','27.47.118.133');");
E_D("replace into `dw_user_amountlog` values('79','92','borrow_success','credit','1000.00','1000.00','0.00','1000.00','借款标满标审核通过，借款信用额度减少','1321006389','27.47.118.133');");

require("../../inc/footer.php");
?>