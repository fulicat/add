DROP TABLE IF EXISTS `{account}`;
CREATE TABLE IF NOT EXISTS `{account}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户名称',
  `total` varchar(11) NOT NULL COMMENT '资金总额',
  `use_money` varchar(11) NOT NULL,
  `no_use_money` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM   ;




CREATE TABLE IF NOT EXISTS `{account_bank}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `account` varchar(100) NOT NULL COMMENT '账号',
  `bank` varchar(10) NOT NULL COMMENT '所属银行',
  `branch` varchar(100) NOT NULL DEFAULT '' COMMENT '支行',
  `province` varchar(20) DEFAULT NULL COMMENT '省份',
  `city` varchar(20) DEFAULT NULL COMMENT '城市',
  `area` varchar(20) DEFAULT NULL COMMENT '区',
  `addtime` varchar(50) NOT NULL DEFAULT '',
  `addip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  COMMENT='银行帐户';



DROP TABLE IF EXISTS `{account_cash}`;
CREATE TABLE IF NOT EXISTS `{account_cash}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `account` varchar(100) NOT NULL COMMENT '账号',
  `bank` varchar(302) NOT NULL COMMENT '所属银行',
  `branch` varchar(100) NOT NULL DEFAULT '' COMMENT '支行',
  `total` varchar(20) DEFAULT '0' COMMENT '总额',
  `credited` varchar(20) DEFAULT '0' COMMENT '到账总额',
  `fee` varchar(20) DEFAULT '0' COMMENT '手续费',
  `verify_userid` int(11) NOT NULL,
  `verify_time` varchar(50) NOT NULL,
  `verify_remark` varchar(250) NOT NULL,
  `addtime` varchar(50) NOT NULL DEFAULT '',
  `addip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM   COMMENT='提现记录';



DROP TABLE IF EXISTS `{account_log}`;
CREATE TABLE IF NOT EXISTS `{account_log}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `type` varchar(100) NOT NULL COMMENT '类型',
  `money` varchar(100) NOT NULL DEFAULT '' COMMENT '金额',
  `use_money` varchar(100) NOT NULL DEFAULT '' COMMENT '可用金额',
  `no_use_money` varchar(100) NOT NULL DEFAULT '' COMMENT '冻结金额',
  `to_user` varchar(2) NOT NULL DEFAULT '' COMMENT '交易对方',
  `remark` varchar(250) DEFAULT '0' COMMENT '备注',
  `addtime` varchar(50) NOT NULL DEFAULT '',
  `addip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM   COMMENT='资金记录';



DROP TABLE IF EXISTS `{dw_account_payment}`;
CREATE TABLE IF NOT EXISTS `{account_payment}` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `nid` varchar(100) DEFAULT NULL,
  `status` smallint(3) unsigned NOT NULL DEFAULT '0',
  `style` int(2) NOT NULL,
  `config` longtext,
  `fee` int(10) NOT NULL DEFAULT '0',
  `fee_type` int(2) NOT NULL,
  `max_money` int(10) NOT NULL,
  `max_fee` int(10) NOT NULL,
  `description` longtext,
  `order` smallint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  ;


DROP TABLE IF EXISTS `{account_recharge}`;
CREATE TABLE IF NOT EXISTS `{account_recharge}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `money` varchar(100) NOT NULL DEFAULT '' COMMENT '金额',
  `payment` varchar(100) NOT NULL COMMENT '所属银行',
  `type` varchar(100) NOT NULL DEFAULT '' COMMENT '类型',
  `remark` varchar(250) DEFAULT '0' COMMENT '备注',
  `fee` varchar(10) NOT NULL,
  `verify_userid` int(11) DEFAULT '0' COMMENT '审核人',
  `verify_time` varchar(50) DEFAULT '' COMMENT '审核时间',
  `verify_remark` varchar(250) DEFAULT '' COMMENT '审核备注',
  `addtime` varchar(50) NOT NULL DEFAULT '',
  `addip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM COMMENT='充值记录';



ALTER TABLE {account} ADD INDEX user_id (user_id);
ALTER TABLE {account_bank} ADD INDEX user_id (user_id);
ALTER TABLE {account_log} ADD INDEX user_id (user_id);
ALTER TABLE {account_recharge} ADD INDEX user_id (user_id);
ALTER TABLE {account_recharge} ADD INDEX user_id (user_id,status);
ALTER TABLE {account_recharge} ADD INDEX user_id (user_id,payment);
ALTER TABLE {account_recharge} ADD INDEX user_id (user_id,payment,verify_userid);
ALTER TABLE {account_cash} ADD INDEX user_id (user_id);
ALTER TABLE {account_cash} ADD INDEX user_id (user_id,status);
ALTER TABLE {account_cash} ADD INDEX user_id (user_id,status,verify_userid);
