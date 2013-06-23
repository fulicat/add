<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_attestation_type`;");
E_C("CREATE TABLE `dw_attestation_type` (
  `type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '类型名称',
  `order` varchar(10) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `jifen` int(20) DEFAULT '0' COMMENT '积分',
  `summary` varchar(200) DEFAULT NULL COMMENT '简介',
  `remark` varchar(200) DEFAULT NULL COMMENT '备注',
  `addtime` varchar(50) DEFAULT NULL,
  `addip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=gbk");
E_D("replace into `dw_attestation_type` values('1','其他能说明您收入、资产、职务或素质的有效资料（凡不属于以上内容的都放在此）','10','1','0','','','1290221365','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('2','其他借款说明','10','1','0','','','1290221472','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('3','信用报告','10','1','0','','','1290221481','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('4','借款承诺书','10','1','0','','','1290221508','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('5','手机通话记录清单（最近2个月）','10','1','0','','','1290221519','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('6','固定电话通话记录清单（最近2个月）','10','1','0','','','1290221528','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('7','家人身份证背面','10','1','0','','','1290221554','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('8','家人身份证正面','10','1','0','','','1290221611','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('9','结婚证','10','1','0','','','1290221625','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('10','户口本','10','1','0','','','1290221635','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('11','学位证书或毕业证书','10','1','0','','','1290221648','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('12','近3个月银行代发工资记录或个人转账存款记录','10','1','0','','','1290221670','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('13','劳动合同或单位证明或工作证','10','1','0','','','1290221680','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('14','公司银行流水（近三个月）','10','1','0','','','1290221692','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('15','机构代码证','10','1','0','','','1290221702','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('16','营业执照副本（需要彩色）','10','1','0','','','1290221717','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('17','水费发票或电费发票或煤气发票（最近2个月）','10','1','0','','','1290221765','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('18','居住地租赁合同','10','1','0','','','1290221780','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('19','房产证','10','1','25','','','1290221790','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('20','生活照','10','1','0','','','1290221809','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('21','国税证','10','1','0','','','1290224402','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('22','地税证','10','1','0','','','1290224413','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('23','驾驶证','10','1','0','','','1290224431','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('24','行驶证','10','1','20','','','1290224442','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('25','社保','10','1','0','','','1290247374','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('26','住房公积金','10','1','0','','','1290247387','113.83.212.28');");
E_D("replace into `dw_attestation_type` values('27','居住证(暂住证)','10','1','5','','','1291959716','113.83.210.89');");

require("../../inc/footer.php");
?>