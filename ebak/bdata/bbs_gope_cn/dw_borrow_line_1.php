<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_borrow_line`;");
E_C("CREATE TABLE `dw_borrow_line` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT '0' COMMENT '所属站点',
  `user_id` int(11) DEFAULT '0' COMMENT '用户名称',
  `name` varchar(255) DEFAULT NULL COMMENT '标题',
  `status` int(2) DEFAULT '0' COMMENT '状态',
  `order` int(11) DEFAULT '0' COMMENT '排序',
  `hits` int(11) DEFAULT '0' COMMENT '点击次数',
  `litpic` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `flag` varchar(50) DEFAULT NULL COMMENT '属性',
  `type` int(2) DEFAULT '0' COMMENT '借款类型',
  `borrow_use` int(10) DEFAULT '0' COMMENT '贷款用途',
  `borrow_qixian` int(10) DEFAULT '0' COMMENT '贷款期限',
  `province` int(10) DEFAULT '0' COMMENT '省份',
  `city` int(10) DEFAULT '0' COMMENT '城市',
  `area` int(10) DEFAULT '0' COMMENT '地区',
  `account` varchar(11) DEFAULT NULL COMMENT '贷款金额',
  `content` text COMMENT '详细说明',
  `pawn` varchar(2) DEFAULT NULL COMMENT '有无抵押',
  `tel` varchar(15) DEFAULT NULL COMMENT '电话',
  `sex` varchar(2) DEFAULT NULL COMMENT '性别',
  `xing` varchar(11) DEFAULT NULL COMMENT '姓',
  `verify_user` int(11) DEFAULT NULL COMMENT '审核人',
  `verify_time` varchar(50) DEFAULT NULL COMMENT '审核时间',
  `verify_remark` varchar(255) DEFAULT NULL,
  `addtime` varchar(50) DEFAULT NULL,
  `addip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>