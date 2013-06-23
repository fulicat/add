<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_vip_card`;");
E_C("CREATE TABLE `dw_vip_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flag` varchar(30) DEFAULT NULL COMMENT '定义属性',
  `order` varchar(10) DEFAULT NULL COMMENT '排序',
  `city` varchar(50) DEFAULT NULL COMMENT '城市',
  `serial_number` varchar(15) DEFAULT NULL COMMENT 'VIP卡号',
  `batch` int(11) DEFAULT NULL COMMENT '生成批次',
  `password` varchar(50) DEFAULT NULL COMMENT '密码',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `start_date` int(11) DEFAULT NULL COMMENT '有效期开始日期',
  `end_date` int(11) DEFAULT NULL COMMENT '有效期结束日期',
  `is_up_end_date` tinyint(1) DEFAULT '0' COMMENT '是否延期',
  `vct_name` varchar(40) DEFAULT NULL COMMENT '充值卡类型',
  `month_num` tinyint(4) DEFAULT NULL COMMENT '有效月数',
  `open_time` int(11) DEFAULT NULL COMMENT '激活时间',
  `status` tinyint(1) DEFAULT '0' COMMENT '状态:0:未激活，1正常，2冻结，3停卡, 4封号',
  `freeze_time` int(11) DEFAULT NULL COMMENT '冻结时间',
  `freeze_day` int(11) DEFAULT NULL COMMENT '冻结天数',
  `freeze_times` tinyint(4) DEFAULT '0' COMMENT '冻结次数',
  `stop_time` int(11) DEFAULT NULL COMMENT '停卡时间',
  `stop_day` int(11) DEFAULT NULL COMMENT '停卡天数',
  `stop_times` tinyint(4) DEFAULT '0' COMMENT '停卡次数',
  `create_user` varchar(20) DEFAULT NULL COMMENT '生成者',
  `remark` text COMMENT '备注',
  `hits` int(11) DEFAULT NULL COMMENT '点击次数',
  `addtime` varchar(30) DEFAULT NULL COMMENT '添加时间',
  `addip` varchar(30) DEFAULT NULL COMMENT '添加ip',
  `updatetime` varchar(30) DEFAULT NULL COMMENT '修改时间',
  `updateip` varchar(30) DEFAULT NULL COMMENT '修改ip',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_vip_sn` (`serial_number`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk COMMENT='VIP卡'");

require("../../inc/footer.php");
?>