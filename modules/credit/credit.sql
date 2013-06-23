DROP TABLE IF EXISTS `{credit}`;
CREATE TABLE IF NOT EXISTS `{credit}` (
	`user_id` INT NOT NULL COMMENT '会员ID',
	`value` INT NULL DEFAULT 0 COMMENT '积分数值',
	`op_user` INT DEFAULT NULL COMMENT '操作者',
	`addtime` INT DEFAULT NULL COMMENT '添加时间',
	`addip` VARCHAR(30) DEFAULT NULL COMMENT '添加IP',
	`updatetime` INT DEFAULT NULL COMMENT '最后更新时间',
	`updateip` VARCHAR(30) DEFAULT NULL COMMENT '最后更新ID',
	PRIMARY KEY  (`user_id`)
)
ENGINE = MyISAM
COMMENT = '会员积分';

DROP TABLE IF EXISTS `{credit_type}`;
CREATE TABLE IF NOT EXISTS `{credit_type}` (
	`id` INT NOT NULL auto_increment,
	`name` VARCHAR(50) NULL NOT NULL COMMENT '积分名称',
	`nid` VARCHAR(50) NOT NULL COMMENT '积分代码',
	`value` INT NULL DEFAULT 0 COMMENT '积分数值',
	`cycle` TINYINT(1) NOT NULL DEFAULT 2 COMMENT '积分周期，1:一次,2:每天,3:间隔分钟,4:不限',
	`award_times` TINYINT DEFAULT 0 COMMENT '奖励次数,0:不限',
	`interval` INT DEFAULT 1 COMMENT '时间间隔，单位分钟',
	`remark` VARCHAR(256) DEFAULT NULL COMMENT '备注',
	`op_user` INT DEFAULT NULL COMMENT '操作者',
	`addtime` INT DEFAULT NULL COMMENT '添加时间',
	`addip` VARCHAR(30) DEFAULT NULL COMMENT '添加IP',
	`updatetime` INT DEFAULT NULL COMMENT '最后更新时间',
	`updateip` VARCHAR(30)  DEFAULT NULL COMMENT '最后更新ID',
	PRIMARY KEY  (`id`),
	UNIQUE KEY `idx_ct_nid` (`nid`)
)
ENGINE = MyISAM
COMMENT = '积分类型';



DROP TABLE IF EXISTS `{credit_log}`;
CREATE TABLE IF NOT EXISTS `{credit_log}` (
	`id` INT NOT NULL auto_increment,
	`user_id` INT NOT NULL COMMENT '会员ID',
	`type_id` INT DEFAULT 0 COMMENT '积分类型ID',
	`op` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '变动类型,1:增加,2:减少',
	`value` INT NULL DEFAULT 0 COMMENT '变动积分数值',
	`remark` VARCHAR(256) DEFAULT NULL COMMENT '备注',
	`op_user` INT DEFAULT NULL COMMENT '操作者',
	`addtime` INT DEFAULT NULL COMMENT '添加时间',
	`addip` VARCHAR(30) DEFAULT NULL COMMENT '添加IP',
	PRIMARY KEY  (`id`)
)
ENGINE = MyISAM
COMMENT = '会员积分日志';

DROP TABLE IF EXISTS `{credit_rank}`;
CREATE TABLE IF NOT EXISTS `{credit_rank}` (
	`id` INT NOT NULL auto_increment,
        `name` VARCHAR(50) NULL NOT NULL COMMENT '等级名称',
	`rank` INT DEFAULT 0 COMMENT '等级',
	`point1` INT DEFAULT 0 COMMENT '开始分值',
	`point2` INT  DEFAULT 0 COMMENT '最后分值',
        `pic` VARCHAR(100) DEFAULT NULL COMMENT '图片',
	`remark` VARCHAR(256) DEFAULT NULL COMMENT '备注',
	`addtime` INT DEFAULT NULL COMMENT '添加时间',
	`addip` VARCHAR(30) DEFAULT NULL COMMENT '添加IP',
	PRIMARY KEY  (`id`)
)
ENGINE = MyISAM
COMMENT = '会员积分日志';