<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_invest`;");
E_C("CREATE TABLE `dw_invest` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT '0' COMMENT '所属站点',
  `user_id` int(11) DEFAULT '0' COMMENT '用户名称',
  `name` varchar(255) DEFAULT NULL COMMENT '标题',
  `status` int(2) DEFAULT '0' COMMENT '状态',
  `order` int(11) DEFAULT '0' COMMENT '排序',
  `hits` int(11) DEFAULT '0' COMMENT '点击次数',
  `litpic` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `flag` varchar(50) DEFAULT NULL COMMENT '属性',
  `source` varchar(50) DEFAULT NULL COMMENT '来源',
  `publish` varchar(50) DEFAULT NULL COMMENT '发布时间',
  `customer` int(11) DEFAULT NULL COMMENT '客服',
  `verify_userid` int(11) DEFAULT NULL COMMENT '审核人',
  `verify_time` varchar(50) DEFAULT NULL COMMENT '审核时间',
  `use` varchar(50) DEFAULT NULL COMMENT '用途',
  `time_limit` varchar(50) DEFAULT NULL COMMENT '借款期限',
  `style` varchar(50) DEFAULT NULL COMMENT '还款方式',
  `account` varchar(50) DEFAULT NULL COMMENT '借贷总金额',
  `apr` varchar(50) DEFAULT NULL COMMENT '年利率',
  `lowest_account` varchar(50) DEFAULT NULL COMMENT '最低投标金额',
  `most_account` varchar(50) DEFAULT NULL COMMENT '最多投标总额',
  `valid_time` varchar(50) DEFAULT NULL COMMENT '有效时间',
  `award` varchar(50) DEFAULT NULL COMMENT '投标奖励',
  `part_account` varchar(50) DEFAULT NULL COMMENT '分摊奖励金额',
  `funds` varchar(50) DEFAULT NULL COMMENT '比例奖励的比例',
  `is_false` varchar(50) DEFAULT NULL COMMENT '标的失败时也同样奖励 ',
  `open_account` varchar(50) DEFAULT NULL COMMENT '公开我的帐户资金情况',
  `open_borrow` varchar(50) DEFAULT NULL COMMENT '公开我的借款资金情况',
  `open_tender` varchar(50) DEFAULT NULL COMMENT '公开我的投标资金情况',
  `open_credit` varchar(50) DEFAULT NULL COMMENT '公开我的信用额度情况',
  `content` text COMMENT '详细说明',
  `addtime` varchar(50) DEFAULT NULL,
  `addip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>