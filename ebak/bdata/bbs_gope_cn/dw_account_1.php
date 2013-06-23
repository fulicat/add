<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_account`;");
E_C("CREATE TABLE `dw_account` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0' COMMENT '用户名称',
  `total` decimal(11,2) DEFAULT '0.00' COMMENT '资金总额',
  `use_money` decimal(11,2) DEFAULT '0.00',
  `no_use_money` decimal(11,2) DEFAULT '0.00',
  `collection` decimal(11,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=gbk");
E_D("replace into `dw_account` values('1','4','104711.21','79498.58','0.00','25212.63');");
E_D("replace into `dw_account` values('2','5','60370.03','58303.60','0.00','2066.43');");
E_D("replace into `dw_account` values('3','6','10258.61','9220.04','0.00','1038.57');");
E_D("replace into `dw_account` values('4','7','60140.12','60140.12','0.00','0.00');");
E_D("replace into `dw_account` values('5','11','61709.80','25872.43','0.00','35837.37');");
E_D("replace into `dw_account` values('6','12','61167.92','28741.31','0.00','32426.61');");
E_D("replace into `dw_account` values('7','13','50390.00','40390.00','10000.00','0.00');");
E_D("replace into `dw_account` values('8','15','4905.00','4405.00','500.00','0.00');");
E_D("replace into `dw_account` values('9','14','2561.39','2561.80','-0.41','0.00');");
E_D("replace into `dw_account` values('10','16','2367.93','2368.00','-0.07','0.00');");
E_D("replace into `dw_account` values('11','18','1184.62','1184.62','0.00','0.00');");
E_D("replace into `dw_account` values('12','19','1162.22','1162.00','0.22','0.00');");
E_D("replace into `dw_account` values('13','20','873.00','873.00','0.00','0.00');");
E_D("replace into `dw_account` values('14','22','1075.57','1076.07','-0.50','0.00');");
E_D("replace into `dw_account` values('15','23','1061.18','1061.00','0.18','0.00');");
E_D("replace into `dw_account` values('16','24','1056.64','1057.00','-0.36','0.00');");
E_D("replace into `dw_account` values('17','25','10751.57','10751.57','0.00','0.00');");
E_D("replace into `dw_account` values('18','26','1056.29','1057.00','-0.71','0.00');");
E_D("replace into `dw_account` values('19','10','0.89','0.89','0.00','0.00');");
E_D("replace into `dw_account` values('20','34','35555.64','31681.23','0.00','3874.41');");
E_D("replace into `dw_account` values('21','35','10.89','10.89','0.00','0.00');");
E_D("replace into `dw_account` values('22','28','6.10','6.10','0.00','0.00');");
E_D("replace into `dw_account` values('23','33','102.56','102.56','0.00','0.00');");
E_D("replace into `dw_account` values('24','38','3603.59','3214.79','388.80','0.00');");
E_D("replace into `dw_account` values('25','39','516.32','516.32','0.00','0.00');");
E_D("replace into `dw_account` values('26','40','40356.93','37001.10','0.00','3355.83');");
E_D("replace into `dw_account` values('27','41','10157.58','10157.58','0.00','0.00');");
E_D("replace into `dw_account` values('28','42','10118.17','10118.17','0.00','0.00');");
E_D("replace into `dw_account` values('29','43','60750.96','54530.52','0.00','6220.44');");
E_D("replace into `dw_account` values('30','44','870.00','870.00','0.00','0.00');");
E_D("replace into `dw_account` values('31','27','-0.18','0.01','-0.19','0.00');");
E_D("replace into `dw_account` values('32','45','-0.40','0.00','-0.40','0.00');");
E_D("replace into `dw_account` values('33','46','0.22','0.00','0.22','0.00');");
E_D("replace into `dw_account` values('34','50','956.07','956.07','0.00','0.00');");
E_D("replace into `dw_account` values('35','49','880.00','880.00','0.00','0.00');");
E_D("replace into `dw_account` values('36','36','-5.00','-5.00','0.00','0.00');");
E_D("replace into `dw_account` values('37','53','-5.00','-5.00','0.00','0.00');");
E_D("replace into `dw_account` values('38','30','10000.00','10000.00','0.00','0.00');");
E_D("replace into `dw_account` values('39','55','20000.00','20000.00','0.00','0.00');");
E_D("replace into `dw_account` values('40','57','50027.82','48609.36','0.00','1418.46');");
E_D("replace into `dw_account` values('41','58','50000.00','50000.00','0.00','0.00');");
E_D("replace into `dw_account` values('42','62','-10.00','-10.00','0.00','0.00');");
E_D("replace into `dw_account` values('43','63','12.00','12.00','0.00','0.00');");
E_D("replace into `dw_account` values('44','1','100028.23','100028.23','0.00','0.00');");
E_D("replace into `dw_account` values('45','68','99815.00','99815.00','0.00','0.00');");
E_D("replace into `dw_account` values('46','37','-5.00','-5.00','0.00','0.00');");
E_D("replace into `dw_account` values('47','75','99.00','99.00','0.00','0.00');");
E_D("replace into `dw_account` values('48','80','-5.00','-5.00','0.00','0.00');");
E_D("replace into `dw_account` values('49','84','4.95','4.95','0.00','0.00');");
E_D("replace into `dw_account` values('50','86','50036.21','46400.29','3300.76','335.16');");
E_D("replace into `dw_account` values('51','88','4816.18','4816.18','0.00','0.00');");
E_D("replace into `dw_account` values('52','91','-5.00','-5.00','0.00','0.00');");
E_D("replace into `dw_account` values('53','90','838.44','215.00','400.00','223.44');");
E_D("replace into `dw_account` values('54','92','955.00','855.00','100.00','0.00');");
E_D("replace into `dw_account` values('55','93','-5.00','-5.00','0.00','0.00');");
E_D("replace into `dw_account` values('56','94','-5.00','-5.00','0.00','0.00');");
E_D("replace into `dw_account` values('57','95','-5.00','-5.00','0.00','0.00');");
E_D("replace into `dw_account` values('58','96','-5.00','-5.00','0.00','0.00');");
E_D("replace into `dw_account` values('59','97','-5.00','-5.00','0.00','0.00');");
E_D("replace into `dw_account` values('60','99','0.72','-1558.00','1000.00','558.72');");
E_D("replace into `dw_account` values('61','98','-5.00','-5.00','0.00','0.00');");
E_D("replace into `dw_account` values('62','100','-5.00','-5.00','0.00','0.00');");
E_D("replace into `dw_account` values('63','102','-5.00','-5.00','0.00','0.00');");

require("../../inc/footer.php");
?>