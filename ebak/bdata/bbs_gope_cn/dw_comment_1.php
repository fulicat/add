<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_comment`;");
E_C("CREATE TABLE `dw_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `module_code` varchar(50) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `comment` text,
  `flag` varchar(30) DEFAULT NULL COMMENT '定义属性',
  `order` varchar(10) DEFAULT NULL COMMENT '排序',
  `status` int(2) DEFAULT NULL COMMENT '状态',
  `addtime` varchar(30) DEFAULT NULL COMMENT '添加时间',
  `addip` varchar(30) DEFAULT NULL COMMENT '添加ip',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=gbk");
E_D("replace into `dw_comment` values('24','0','86','borrow','48','pin lun chisi','1',NULL,'1','1320318650','127.0.0.1');");
E_D("replace into `dw_comment` values('25','0','90','borrow','62','兄弟看你一个月也存不了几个钱啊!官方要是审核合格我可以多放些的。对我们打工的我特别感兴趣。虽赚的钱少，但至少不会乱花钱；我支持你。','1',NULL,'1','1321005825','27.47.118.133');");
E_D("replace into `dw_comment` values('26','0','90','borrow','51','来总啊，再给你上50块啊。','1',NULL,'1','1321006251','27.47.118.133');");
E_D("replace into `dw_comment` values('27','0','102','borrow','62','勇哥，谢谢您伸出友谊之手。等我赚了，不会忘记你。','1',NULL,'1','1321014985','183.9.30.73');");
E_D("replace into `dw_comment` values('28','0','102','borrow','62','这样投下去，何年何月才能凑齐5000元呀。急死了。','1',NULL,'1','1321085888','119.140.37.79');");
E_D("replace into `dw_comment` values('29','0','86','borrow','58','哎，我直接给你满上吧。','1',NULL,'1','1321111442','120.84.98.127');");
E_D("replace into `dw_comment` values('30','0','86','article','111','呵呵，嗯。','1',NULL,'1','1321680815','120.84.100.162');");

require("../../inc/footer.php");
?>