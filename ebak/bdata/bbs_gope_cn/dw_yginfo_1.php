<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_yginfo`;");
E_C("CREATE TABLE `dw_yginfo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT '0' COMMENT '用户ID',
  `status` int(2) DEFAULT '0' COMMENT '状态',
  `height` varchar(255) DEFAULT NULL COMMENT '身高',
  `minzu` varchar(255) DEFAULT NULL COMMENT '民族',
  `jiguan` varchar(255) DEFAULT NULL COMMENT '籍贯',
  `zhengzhi` varchar(255) DEFAULT NULL COMMENT '政治面貌',
  `techang` varchar(255) DEFAULT NULL COMMENT '特长',
  `marray` varchar(255) DEFAULT NULL COMMENT '婚否',
  `zhuanye` varchar(255) DEFAULT NULL COMMENT '专业',
  `xueli` varchar(255) DEFAULT NULL COMMENT '学历',
  `idcard` varchar(255) DEFAULT NULL COMMENT '身份证号码',
  `zhiye` varchar(255) DEFAULT NULL COMMENT '职业',
  `school` varchar(255) DEFAULT NULL COMMENT '学校',
  `danwei` varchar(255) DEFAULT NULL COMMENT '单位',
  `dizhi` varchar(255) DEFAULT NULL COMMENT '地址',
  `linkman` varchar(255) DEFAULT NULL COMMENT '联系人',
  `linktel` varchar(255) DEFAULT NULL COMMENT '联系电话',
  `fuwu` text,
  `jianli` text,
  `liyou` varchar(255) DEFAULT NULL COMMENT '申请理由',
  `verify_userid` int(11) DEFAULT NULL COMMENT '审核人',
  `verify_time` varchar(50) DEFAULT NULL COMMENT '审核时间',
  `verify_remark` varchar(250) DEFAULT NULL COMMENT '审核备注',
  `addtime` varchar(50) DEFAULT NULL,
  `addip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='义工信息'");

require("../../inc/footer.php");
?>