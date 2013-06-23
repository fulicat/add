


DROP TABLE IF EXISTS `{user}`;
CREATE TABLE IF NOT EXISTS `{user}` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `purview` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `paypassword` varchar(50) DEFAULT NULL,
  `invite_userid` int(11) NOT NULL COMMENT '邀请好友',
  `invite_money` varchar(10) NOT NULL DEFAULT '0' COMMENT '邀请注册提成',
  `real_status` int(2) NOT NULL,
  `card_type` varchar(10) NOT NULL,
  `card_id` varchar(50) NOT NULL,
  `card_pic1` varchar(150) NOT NULL,
  `card_pic2` varchar(150) NOT NULL,
  `nation` varchar(10) NOT NULL,
  `realname` varchar(20) NOT NULL DEFAULT '',
  `integral` int(10) DEFAULT NULL,
  `status` int(2) NOT NULL,
  `isvip` int(11) NOT NULL,
  `vip_time` varchar(15) NOT NULL,
  `avatar_status` int(2) NOT NULL DEFAULT '0',
  `email_status` varchar(50) NOT NULL DEFAULT '0',
  `phone_status` varchar(50) NOT NULL DEFAULT '0',
  `video_status` int(2) NOT NULL DEFAULT '0' COMMENT '视频认证',
  `scene_status` int(2) NOT NULL DEFAULT '0' COMMENT '现场认证',
  `email` varchar(30) NOT NULL DEFAULT '',
  `sex` varchar(10) NOT NULL,
  `litpic` varchar(250) NOT NULL DEFAULT '',
  `tel` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(50) NOT NULL DEFAULT '',
  `qq` varchar(50) NOT NULL DEFAULT '',
  `wangwang` varchar(100) NOT NULL DEFAULT '',
  `question` varchar(10) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `birthday` int(11) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `postid` varchar(10) DEFAULT NULL COMMENT '邮编',
  `remind` text NOT NULL COMMENT '提醒设置',
  `privacy` text NOT NULL COMMENT '隐私设置',
  `logintime` int(11) NOT NULL DEFAULT '0',
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  `uptime` varchar(50) NOT NULL,
  `upip` varchar(50) NOT NULL,
  `lasttime` varchar(50) NOT NULL,
  `lastip` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`),
  FULLTEXT KEY `purview` (`purview`)
) ENGINE=MyISAM  ;

-
DROP TABLE IF EXISTS `{user_cache}`;
CREATE TABLE IF NOT EXISTS `{user_cache}` (
  `user_id` int(11) NOT NULL,
  `bbs_topics_num` int(11) NOT NULL DEFAULT '0',
  `bbs_posts_num` int(11) NOT NULL DEFAULT '0',
  `credit` int(11) NOT NULL DEFAULT '0' COMMENT '积分',
  `account` int(11) NOT NULL DEFAULT '0' COMMENT '帐户总额',
  `account_use` int(11) NOT NULL DEFAULT '0' COMMENT '可用金额',
  `account_nouse` int(11) NOT NULL DEFAULT '0' COMMENT '冻结金额',
  `account_waitin` int(11) NOT NULL DEFAULT '0' COMMENT '代收总额',
  `account_waitintrest` int(11) NOT NULL DEFAULT '0' COMMENT '代收利息',
  `account_intrest` int(11) NOT NULL DEFAULT '0' COMMENT '净赚利息',
  `account_award` int(11) NOT NULL DEFAULT '0' COMMENT '投标奖励',
  `account_payment` int(11) NOT NULL DEFAULT '0' COMMENT '待还总额',
  `account_expired` int(11) NOT NULL DEFAULT '0' COMMENT '逾期总额',
  `account_waitvip` int(11) NOT NULL DEFAULT '0' COMMENT 'vip会费',
  `borrow_amount` int(11) NOT NULL DEFAULT '3000' COMMENT '借款额度',
  `borrow_loan` int(11) NOT NULL DEFAULT '0' COMMENT '成功借出',
  `borrow_success` int(11) NOT NULL DEFAULT '0' COMMENT '成功借款',
  `borrow_wait` int(11) NOT NULL DEFAULT '0' COMMENT '等待满标',
  `borrow_paymeng` int(11) NOT NULL DEFAULT '0' COMMENT '待还借款',
  `friends_apply` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM ;


DROP TABLE IF EXISTS `{user_log}`;
CREATE TABLE IF NOT EXISTS `{user_log}` (
  `log_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `query` varchar(50) NOT NULL,
  `url` varchar(200) NOT NULL,
  `result` varchar(100) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM   ;



DROP TABLE IF EXISTS `{user_sendemail_log}`;
CREATE TABLE IF NOT EXISTS `{user_sendemail_log}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `status` int(2) NOT NULL,
  `title` varchar(250) NOT NULL,
  `type` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  ;



DROP TABLE IF EXISTS `{user_trend}`;
CREATE TABLE IF NOT EXISTS `{user_trend}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `addtime` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  COMMENT = '用户操作记录'  ;


DROP TABLE IF EXISTS `{user_type}`;
CREATE TABLE IF NOT EXISTS `{user_type}` (
  `type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `purview` text NOT NULL,
  `order` varchar(10) NOT NULL,
  `status` int(2) NOT NULL,
  `type` int(2) NOT NULL,
  `summary` varchar(200) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `addtime` varchar(50) NOT NULL,
  `addip` varchar(50) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM   ;


CREATE TABLE IF NOT EXISTS `{user_visit}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `visit_userid` int(11) DEFAULT NULL,
  `addip` varchar(30) DEFAULT NULL,
  `addtime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM;

CREATE TABLE IF NOT EXISTS `{user_typechange}` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `status` int(2) NOT NULL,
  `old_type` varchar(10) NOT NULL,
  `new_type` varchar(10) NOT NULL,
  `content` varchar(255) NOT NULL,
  `addtime` varchar(20) NOT NULL,
  `addip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM