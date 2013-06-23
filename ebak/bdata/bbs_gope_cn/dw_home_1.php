<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_home`;");
E_C("CREATE TABLE `dw_home` (
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
  `xiaoqu` varchar(50) DEFAULT NULL COMMENT '小区',
  `shi` varchar(10) DEFAULT NULL COMMENT '室',
  `ting` varchar(10) DEFAULT NULL COMMENT '厅',
  `wei` varchar(10) DEFAULT NULL COMMENT '卫',
  `louceng` varchar(10) DEFAULT NULL COMMENT '楼层',
  `zonglouceng` varchar(10) DEFAULT NULL COMMENT '总楼层',
  `loupan` varchar(10) DEFAULT NULL COMMENT '楼盘',
  `zhucegongsi` varchar(10) DEFAULT NULL COMMENT '是否注册公司',
  `mianji` varchar(10) DEFAULT NULL COMMENT '面积',
  `mianji1` varchar(10) DEFAULT NULL COMMENT '期望面积1',
  `mianji2` varchar(10) DEFAULT NULL COMMENT '期望面积2',
  `fangshi` varchar(10) DEFAULT NULL COMMENT '出租方式',
  `leixing` varchar(10) DEFAULT NULL COMMENT '类型',
  `zhuangxiu` varchar(10) DEFAULT NULL COMMENT '装修',
  `chaoxiang` varchar(10) DEFAULT NULL COMMENT '朝向',
  `zujin` varchar(10) DEFAULT NULL COMMENT '租金',
  `jiage` varchar(10) DEFAULT NULL COMMENT '售价',
  `jiage1` varchar(10) DEFAULT NULL COMMENT '期望售价1',
  `jiage2` varchar(10) DEFAULT NULL COMMENT '期望售价2',
  `jiageleixing` varchar(10) DEFAULT NULL COMMENT '价格类型',
  `lishijingying` varchar(10) DEFAULT NULL COMMENT '历史经营',
  `jibenqingkuang` varchar(10) DEFAULT NULL COMMENT '基本情况',
  `diduan` varchar(10) DEFAULT NULL COMMENT '地段',
  `diduan1` varchar(10) DEFAULT NULL COMMENT '地段1',
  `diduan2` varchar(10) DEFAULT NULL COMMENT '地段2',
  `fukuan` varchar(10) DEFAULT NULL COMMENT '付款方式',
  `linjin` varchar(10) DEFAULT NULL COMMENT '临近',
  `peizhi` varchar(50) DEFAULT NULL COMMENT '配置',
  `tupian` varchar(250) DEFAULT NULL COMMENT '图片',
  `xianxingbie` varchar(250) DEFAULT NULL COMMENT '限制性别',
  `chuzufangjian` varchar(250) DEFAULT NULL COMMENT '出租房间',
  `chuzuleixing` varchar(250) DEFAULT NULL COMMENT '出租类型',
  `content` varchar(255) DEFAULT NULL COMMENT '补充说明',
  `lianxiren` varchar(50) DEFAULT NULL COMMENT '联系人',
  `dianhua` varchar(50) DEFAULT NULL COMMENT '电话',
  `qq` varchar(50) DEFAULT NULL COMMENT 'qq',
  `province` varchar(20) DEFAULT NULL COMMENT '省份',
  `city` varchar(20) DEFAULT NULL COMMENT '城市',
  `area` varchar(20) DEFAULT NULL COMMENT '区',
  `addtime` varchar(50) DEFAULT NULL,
  `addip` varchar(50) DEFAULT NULL,
  `updatetime` varchar(50) DEFAULT NULL,
  `updateip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk");

require("../../inc/footer.php");
?>