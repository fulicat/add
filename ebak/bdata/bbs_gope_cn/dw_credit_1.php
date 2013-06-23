<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_credit`;");
E_C("CREATE TABLE `dw_credit` (
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '会员ID',
  `value` int(11) DEFAULT '0' COMMENT '积分数值',
  `op_user` int(11) DEFAULT NULL COMMENT '操作者',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  `addip` varchar(30) DEFAULT NULL COMMENT '添加IP',
  `updatetime` varchar(11) DEFAULT NULL COMMENT '最后更新时间',
  `updateip` varchar(30) DEFAULT NULL COMMENT '最后更新ID',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='会员积分'");
E_D("replace into `dw_credit` values('2','10','0','1313993334','58.46.172.103',NULL,NULL);");
E_D("replace into `dw_credit` values('4','1843','4','1314060246','58.46.172.103','1315657360','113.218.125.86');");
E_D("replace into `dw_credit` values('5','189','63','1314097255','118.253.4.77','1317891431','120.193.119.210');");
E_D("replace into `dw_credit` values('6','149','63','1314097547','118.253.4.77','1317891431','120.193.119.210');");
E_D("replace into `dw_credit` values('7','90','1','1314097705','118.253.4.77','1315629496','113.218.36.55');");
E_D("replace into `dw_credit` values('8','10','0','1314176347','122.77.43.203',NULL,NULL);");
E_D("replace into `dw_credit` values('9','10','0','1314196196','171.38.155.44',NULL,NULL);");
E_D("replace into `dw_credit` values('10','20','1','1314244267','59.49.158.45','1314515149','113.218.57.207');");
E_D("replace into `dw_credit` values('11','424','1','1314245099','58.46.193.18','1315651473','113.218.125.86');");
E_D("replace into `dw_credit` values('12','666','63','1314245324','58.46.182.14','1317891431','120.193.119.210');");
E_D("replace into `dw_credit` values('13','115','1','1314254844','58.46.193.18','1315631150','113.218.36.55');");
E_D("replace into `dw_credit` values('15','40','15','1314256511','58.46.193.18','1314596258','58.46.162.87');");
E_D("replace into `dw_credit` values('14','118','1','1314256566','113.65.175.144','1315629497','113.218.36.55');");
E_D("replace into `dw_credit` values('16','108','1','1314260321','113.65.155.250','1315629498','113.218.36.55');");
E_D("replace into `dw_credit` values('18','71','1','1314262151','113.65.155.250','1315629498','113.218.36.55');");
E_D("replace into `dw_credit` values('19','58','1','1314262831','113.65.155.250','1315629499','113.218.36.55');");
E_D("replace into `dw_credit` values('20','105','1','1314264476','58.46.193.18','1315613050','113.218.120.128');");
E_D("replace into `dw_credit` values('22','70','1','1314267302','113.65.155.250','1315629497','113.218.36.55');");
E_D("replace into `dw_credit` values('23','60','1','1314269080','113.65.155.250','1315629499','113.218.36.55');");
E_D("replace into `dw_credit` values('24','55','1','1314269849','113.65.155.250','1315629499','113.218.36.55');");
E_D("replace into `dw_credit` values('25','57','25','1314270080','113.142.216.204','1317892984','120.193.119.210');");
E_D("replace into `dw_credit` values('26','55','1','1314270462','113.65.155.250','1315629500','113.218.36.55');");
E_D("replace into `dw_credit` values('27','230','1','1314272903','112.3.235.81','1315629496','113.218.36.55');");
E_D("replace into `dw_credit` values('28','96','28','1314283972','123.87.181.158','1315703618','123.87.178.188');");
E_D("replace into `dw_credit` values('29','10','0','1314290140','113.68.193.46',NULL,NULL);");
E_D("replace into `dw_credit` values('33','58','33','1314523035','113.246.47.69','1314928141','118.250.168.196');");
E_D("replace into `dw_credit` values('34','296','63','1314542692','113.219.77.148','1317891431','120.193.119.210');");
E_D("replace into `dw_credit` values('35','10','0','1314598005','120.36.199.18',NULL,NULL);");
E_D("replace into `dw_credit` values('36','30','1','1314630514','180.110.202.37','1315631044','113.218.36.55');");
E_D("replace into `dw_credit` values('38','49','1','1314679913','113.117.116.229','1314855763','58.46.183.83');");
E_D("replace into `dw_credit` values('37','20','63','1314674814','124.165.226.198','1317355519','120.193.119.210');");
E_D("replace into `dw_credit` values('39','119','39','1314715138','113.219.166.91','1315651533','113.218.125.86');");
E_D("replace into `dw_credit` values('40','92','63','1314717871','113.219.166.91','1317891431','120.193.119.210');");
E_D("replace into `dw_credit` values('41','81','1','1314720674','113.219.166.91','1315629496','113.218.36.55');");
E_D("replace into `dw_credit` values('42','61','1','1314753123','58.46.178.119','1315611157','113.218.120.128');");
E_D("replace into `dw_credit` values('0','0','1','1314753885','58.46.178.119','1314855748','58.46.183.83');");
E_D("replace into `dw_credit` values('43','196','1','1314754452','58.46.178.119','1315629496','113.218.36.55');");
E_D("replace into `dw_credit` values('44','85','44','1314758449','58.46.178.119','1315611657','113.218.120.128');");
E_D("replace into `dw_credit` values('45','179','1','1314761355','180.110.4.119','1315629496','113.218.36.55');");
E_D("replace into `dw_credit` values('46','164','1','1314761917','180.110.4.119','1315629496','113.218.36.55');");
E_D("replace into `dw_credit` values('47','10','0','1314788873','183.62.126.193',NULL,NULL);");
E_D("replace into `dw_credit` values('49','110','1','1314865744','119.147.32.16','1315612523','113.218.120.128');");
E_D("replace into `dw_credit` values('50','84','50','1314865979','113.219.247.72','1315614386','113.218.120.128');");
E_D("replace into `dw_credit` values('52','10','0','1315287273','172.16.135.1',NULL,NULL);");
E_D("replace into `dw_credit` values('53','20','1','1315310613','172.16.135.1','1315630983','113.218.36.55');");
E_D("replace into `dw_credit` values('51','10','0','1315316889','117.136.22.78',NULL,NULL);");
E_D("replace into `dw_credit` values('55','10','0','1315717369','113.218.4.79',NULL,NULL);");
E_D("replace into `dw_credit` values('54','10','0','1315653661','123.68.11.26',NULL,NULL);");
E_D("replace into `dw_credit` values('60','10','0','1315720719','117.65.22.101',NULL,NULL);");
E_D("replace into `dw_credit` values('57','24','1','1315823163','113.218.198.239','1316750965','112.239.23.180');");
E_D("replace into `dw_credit` values('58','10','0','1315823685','113.218.198.239',NULL,NULL);");
E_D("replace into `dw_credit` values('56','10','0','1315825708','183.60.61.199',NULL,NULL);");
E_D("replace into `dw_credit` values('61','10','0','1316001134','183.210.195.90',NULL,NULL);");
E_D("replace into `dw_credit` values('62','100','63','1316583582','60.10.40.186','1316786960','60.10.40.188');");
E_D("replace into `dw_credit` values('65','10','0','1316780603','222.143.24.158',NULL,NULL);");
E_D("replace into `dw_credit` values('66','10','0','1316791794','60.10.40.188',NULL,NULL);");
E_D("replace into `dw_credit` values('68','2030','1','1316924982','222.240.155.4','1316926234','222.240.155.4');");
E_D("replace into `dw_credit` values('69','10','0','1316927238','222.240.155.4',NULL,NULL);");
E_D("replace into `dw_credit` values('70','10','0','1316940417','1.203.49.220',NULL,NULL);");
E_D("replace into `dw_credit` values('71','10','0','1316983182','222.211.38.86',NULL,NULL);");
E_D("replace into `dw_credit` values('72','10','0','1317182833','110.178.184.207',NULL,NULL);");
E_D("replace into `dw_credit` values('73','10','0','1317230088','183.62.126.36',NULL,NULL);");
E_D("replace into `dw_credit` values('74','10','0','1317361708','113.235.247.145',NULL,NULL);");
E_D("replace into `dw_credit` values('75','10','0','1317612192','115.48.14.85',NULL,NULL);");
E_D("replace into `dw_credit` values('77','10','0','1317738317','115.207.24.134',NULL,NULL);");
E_D("replace into `dw_credit` values('78','10','0','1317872250','60.176.174.66',NULL,NULL);");
E_D("replace into `dw_credit` values('80','40','63','1317907232','125.39.142.196','1317907460','125.39.142.196');");
E_D("replace into `dw_credit` values('81','10','0','1317914259','58.19.205.105',NULL,NULL);");
E_D("replace into `dw_credit` values('84','20','63','1320298450','127.0.0.1',NULL,NULL);");
E_D("replace into `dw_credit` values('85','10','0','1320299545','127.0.0.1',NULL,NULL);");
E_D("replace into `dw_credit` values('86','90','86','1320317979','127.0.0.1','1321006389','27.47.118.133');");
E_D("replace into `dw_credit` values('88','204','1','1320330303','127.0.0.1','1320387710','127.0.0.1');");
E_D("replace into `dw_credit` values('1','18','1','1320385777','127.0.0.1','1320387710','127.0.0.1');");
E_D("replace into `dw_credit` values('89','10','0','1320388139','127.0.0.1',NULL,NULL);");
E_D("replace into `dw_credit` values('91','210','86','1320480825','27.47.105.90','1320481131','27.47.105.90');");
E_D("replace into `dw_credit` values('90','52','86','1320554985','27.47.105.90','1321006389','27.47.118.133');");
E_D("replace into `dw_credit` values('92','30','86','1320555435','27.47.105.90','1320555605','27.47.105.90');");
E_D("replace into `dw_credit` values('93','30','86','1320639870','120.83.112.144','1320724679','27.47.118.133');");
E_D("replace into `dw_credit` values('94','30','86','1320810642','27.47.118.133','1320810713','27.47.118.133');");
E_D("replace into `dw_credit` values('95','60','86','1320811270','27.47.118.133','1320811358','27.47.118.133');");
E_D("replace into `dw_credit` values('96','30','86','1320811923','27.47.118.133','1320812043','27.47.118.133');");
E_D("replace into `dw_credit` values('97','30','86','1320812717','27.47.118.133','1320812870','27.47.118.133');");
E_D("replace into `dw_credit` values('98','30','86','1320813464','27.47.118.133','1320848373','27.47.118.133');");
E_D("replace into `dw_credit` values('99','35','86','1320817438','113.117.47.122','1321006389','27.47.118.133');");
E_D("replace into `dw_credit` values('100','70','86','1320914435','27.47.118.133','1320914801','27.47.118.133');");
E_D("replace into `dw_credit` values('101','10','0','1320924783','27.47.118.133',NULL,NULL);");
E_D("replace into `dw_credit` values('102','70','0','1320991442','27.47.118.133','1320993540','183.9.30.73');");
E_D("replace into `dw_credit` values('103','10','0','1321112205','120.84.98.127',NULL,NULL);");
E_D("replace into `dw_credit` values('104','10','0','1321427359','113.117.24.209',NULL,NULL);");
E_D("replace into `dw_credit` values('105','10','0','1321502112','121.11.108.47',NULL,NULL);");

require("../../inc/footer.php");
?>