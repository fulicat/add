CREATE TABLE IF NOT EXISTS `{limitapp}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户名称',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `order` int(11) NOT NULL DEFAULT '0' COMMENT '排序',

  `account` varchar(255) NOT NULL DEFAULT '' COMMENT '要增加的额度',
  `recommend_userid` varchar(255) NOT NULL DEFAULT '' COMMENT '推荐人',
 `content` text default NULL COMMENT '详细说明',
  `other_content` text default NULL COMMENT '其他地方详细说明',

  `verify_userid` int(11)  NULL  COMMENT '审核人',
  `verify_time` varchar(50) NOT NULL DEFAULT '' COMMENT '审核时间',
  `verify_remark` varchar(50) NOT NULL DEFAULT '' COMMENT '备注',

  `addtime` varchar(50) NOT NULL DEFAULT '',
  `addip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

