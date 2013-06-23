CREATE TABLE IF NOT EXISTS `{account}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户名称',
  `total` varchar(20) NOT NULL DEFAULT '' COMMENT '资金总额',
  `use_money` int(11) NOT NULL DEFAULT '0' COMMENT '可要余额',
  `no_use_money` int(11) NOT NULL DEFAULT '' COMMENT '资金总额',
  PRIMARY KEY (`id`)
) ;


CREATE TABLE IF NOT EXISTS `{account_bank}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `account` varchar(100) NOT NULL DEFAULT '' COMMENT '账号',
  `bank` varchar(10) NOT NULL DEFAULT '' COMMENT '所属银行',
  `branch` varchar(100) NOT NULL DEFAULT '' COMMENT '支行',
  `province` varchar(20) default NULL COMMENT '省份',
  `city` varchar(20) default NULL COMMENT '城市',
  `area` varchar(20) default NULL COMMENT '区',
  `addtime` varchar(50) NOT NULL DEFAULT '',
  `addip` varchar(50) NOT NULL DEFAULT '',
   PRIMARY KEY (`id`)
) COMMENT='银行帐户';


CREATE TABLE IF NOT EXISTS `{account_cash}`  (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `account` varchar(100) NOT NULL DEFAULT '' COMMENT '账号',
  `bank` varchar(2) NOT NULL DEFAULT '' COMMENT '所属银行',
  `branch` varchar(100) NOT NULL DEFAULT '' COMMENT '支行',
  `total` varchar(20) default '0' COMMENT '总额',
  `credited` varchar(20) default  '0' COMMENT '到账总额',
  `fee` varchar(20) default  '0' COMMENT '手续费',
  `verify_userid` int(11) default  '' COMMENT '审核人',
  `verify_time` varchar(50) default  '' COMMENT '审核时间',
  `verify_remark` varchar(250) default  '' COMMENT '审核备注',
  `addtime` varchar(50) NOT NULL DEFAULT '',
  `addip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
)COMMENT='提现记录';


CREATE TABLE IF NOT EXISTS `{account_recharge}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `money` varchar(100) NOT NULL DEFAULT '' COMMENT '金额',
  `fee` varchar(100) NOT NULL DEFAULT '' COMMENT '费用',
  `payment` varchar(100) NOT NULL DEFAULT '' COMMENT '所属银行',
  `type` varchar(100) NOT NULL DEFAULT '' COMMENT '类型',
  `remark` varchar(250) default '0' COMMENT '备注',
  `verify_userid` int(11) default  '' COMMENT '审核人',
  `verify_time` varchar(50) default  '' COMMENT '审核时间',
  `verify_remark` varchar(250) default  '' COMMENT '审核备注',
  `addtime` varchar(50) NOT NULL DEFAULT '',
  `addip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
)COMMENT='充值记录';




CREATE TABLE IF NOT EXISTS `{account_log}` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
  `type` varchar(100) NOT NULL DEFAULT '' COMMENT '类型',
  `money` varchar(100) NOT NULL DEFAULT '' COMMENT '金额',
  `use_money` varchar(100) NOT NULL DEFAULT '' COMMENT '可用金额',
  `no_use_money` varchar(100) NOT NULL DEFAULT '' COMMENT '冻结金额',
  `to_user` varchar(2) NOT NULL DEFAULT '' COMMENT '交易对方',
  `remark` varchar(250) default '0' COMMENT '备注',
  `addtime` varchar(50) NOT NULL DEFAULT '',
  `addip` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
)COMMENT='资金记录';


CREATE TABLE IF NOT EXISTS `{account_payment}` (
  `id` mediumint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `nid` varchar(100) DEFAULT NULL,
  `status` smallint(3) unsigned NOT NULL DEFAULT '0',
  `style` int(100) NOT NULL,
  `config` longtext,
  `fee` int(10) NOT NULL DEFAULT '0',
  `fee_type` int(2) NOT NULL,
  `max_money` int(10) NOT NULL,
  `max_fee` int(10) NOT NULL,
  `description` longtext,
  `order` smallint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM   ;
