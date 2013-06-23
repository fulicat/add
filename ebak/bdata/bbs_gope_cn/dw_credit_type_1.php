<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_credit_type`;");
E_C("CREATE TABLE `dw_credit_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '积分名称',
  `nid` varchar(50) DEFAULT NULL COMMENT '积分代码',
  `value` int(11) DEFAULT '0' COMMENT '积分数值',
  `cycle` tinyint(1) DEFAULT '2' COMMENT '积分周期，1:一次,2:每天,3:间隔分钟,4:不限',
  `award_times` tinyint(4) DEFAULT NULL COMMENT '奖励次数,0:不限',
  `interval` int(11) DEFAULT '1' COMMENT '时间间隔，单位分钟',
  `remark` text COMMENT '备注',
  `op_user` int(11) DEFAULT NULL COMMENT '操作者',
  `addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  `addip` varchar(30) DEFAULT NULL COMMENT '添加IP',
  `updatetime` int(11) DEFAULT NULL COMMENT '最后更新时间',
  `updateip` varchar(30) DEFAULT NULL COMMENT '最后更新ID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_ct_nid` (`nid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=gbk COMMENT='积分类型'");
E_D("replace into `dw_credit_type` values('1','邮箱认证','email','10','1','1','0','','0','1282347586','127.0.0.1','0','');");
E_D("replace into `dw_credit_type` values('2','实名认证','realname','10','1','1','0','','0','1282347805','127.0.0.1','0','');");
E_D("replace into `dw_credit_type` values('3','手机认证','phone','10','1','1','0','','0','1285002118','127.0.0.1','0','');");
E_D("replace into `dw_credit_type` values('4','视频认证','video','5','1','0','0','','0','1285002132','127.0.0.1','0','');");
E_D("replace into `dw_credit_type` values('5','现场认证','scene','20','1','0','0','','0','1285002198','127.0.0.1','0','');");
E_D("replace into `dw_credit_type` values('6','证件积分','zhengjian','0','4','0','0','','0','1285002255','127.0.0.1','0','');");
E_D("replace into `dw_credit_type` values('7','投标成功','invest_success','2','4','0','0','','0','1287675813','119.233.164.154','0','');");
E_D("replace into `dw_credit_type` values('8','借款成功','borrow_success','1','4','0','0','','0','1287675904','119.233.164.154','0','');");
E_D("replace into `dw_credit_type` values('9','论坛发稿','bbs_topics','1','4','0','0','','0','1287676784','119.233.164.154','0','');");
E_D("replace into `dw_credit_type` values('10','提前或按时还款','borrow_paymengt','2','4','0','0','','0','1287676875','119.233.164.154','0','');");
E_D("replace into `dw_credit_type` values('11','逾期还款','borrow_paymentover','-5','4','0','0','','0','1287677063','119.233.164.154','0','');");
E_D("replace into `dw_credit_type` values('12','提前3天以上还款','advance_3day','5','4',NULL,NULL,NULL,NULL,'1291940289','221.175.17.200',NULL,NULL);");
E_D("replace into `dw_credit_type` values('13','提前1到3天还款','advance_1day','2','4',NULL,NULL,NULL,NULL,'1291940336','221.175.17.200',NULL,NULL);");
E_D("replace into `dw_credit_type` values('14','正常还款','advance_day','1','4',NULL,NULL,NULL,NULL,'1291940391','221.175.17.200',NULL,NULL);");

require("../../inc/footer.php");
?>