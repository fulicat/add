<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_credit_rank`;");
E_C("CREATE TABLE `dw_credit_rank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '等级名称',
  `rank` int(11) DEFAULT '0' COMMENT '等级',
  `point1` int(11) DEFAULT '0' COMMENT '开始分值',
  `point2` int(11) DEFAULT '0' COMMENT '最后分值',
  `pic` varchar(100) DEFAULT NULL COMMENT '图片',
  `remark` text COMMENT '备注',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  `addip` varchar(30) DEFAULT NULL COMMENT '添加IP',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=gbk COMMENT='会员积分日志'");
E_D("replace into `dw_credit_rank` values('1','a','1','-999','4','credit_s11.gif','','1282352966','127.0.0.1');");
E_D("replace into `dw_credit_rank` values('3','b','2','5','10','credit_s12.gif','','1282354033','127.0.0.1');");
E_D("replace into `dw_credit_rank` values('4','c','3','11','20','credit_s13.gif','','1282354046','127.0.0.1');");
E_D("replace into `dw_credit_rank` values('5','d','4','21','40','credit_s14.gif','','1282354104','127.0.0.1');");
E_D("replace into `dw_credit_rank` values('6','e','5','41','100','credit_s15.gif','','1282354180','127.0.0.1');");
E_D("replace into `dw_credit_rank` values('7','f','6','101','200','credit_s21.gif','','1282354199','127.0.0.1');");
E_D("replace into `dw_credit_rank` values('8','g','7','201','400','credit_s22.gif','','1282354219','127.0.0.1');");
E_D("replace into `dw_credit_rank` values('9','h','8','401','600','credit_s23.gif','','1287677313','119.233.164.154');");
E_D("replace into `dw_credit_rank` values('16','j','10','801','1000','credit_s25.gif',NULL,'1291313450','123.89.40.166');");
E_D("replace into `dw_credit_rank` values('12','i','9','601','800','credit_s24.gif',NULL,'1291279773','113.83.201.226');");
E_D("replace into `dw_credit_rank` values('17','k','11','1001','2000','credit_s31.gif',NULL,'1291313497','123.89.40.166');");
E_D("replace into `dw_credit_rank` values('18','l','12','2001','3000','credit_s32.gif',NULL,'1291313521','123.89.40.166');");
E_D("replace into `dw_credit_rank` values('19','m','13','3001','4000','credit_s33.gif',NULL,'1291313548','123.89.40.166');");
E_D("replace into `dw_credit_rank` values('20','n','14','4001','5000','credit_s34.gif',NULL,'1291313572','123.89.40.166');");
E_D("replace into `dw_credit_rank` values('21','o','15','5001','6000','credit_s35.gif',NULL,'1291313599','123.89.40.166');");
E_D("replace into `dw_credit_rank` values('22','p','16','6001','8000','credit_s41.gif',NULL,'1291313654','123.89.40.166');");
E_D("replace into `dw_credit_rank` values('23','q','17','8001','10000','credit_s42.gif',NULL,'1291313686','123.89.40.166');");
E_D("replace into `dw_credit_rank` values('24','r','18','10001','20000','credit_s43.gif',NULL,'1291313721','123.89.40.166');");
E_D("replace into `dw_credit_rank` values('25','s','19','20001','30000','credit_s44.gif',NULL,'1291313752','123.89.40.166');");
E_D("replace into `dw_credit_rank` values('26','t','20','30001','1000000','credit_s45.gif',NULL,'1291313780','123.89.40.166');");

require("../../inc/footer.php");
?>