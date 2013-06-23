<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_liuyan_set`;");
E_C("CREATE TABLE `dw_liuyan_set` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `nid` varchar(100) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk");
E_D("replace into `dw_liuyan_set` values('1','内容标题','name','234');");
E_D("replace into `dw_liuyan_set` values('2','留言类型','type','建议|举报|投诉|反馈');");
E_D("replace into `dw_liuyan_set` values('3','留言状态','status','1');");
E_D("replace into `dw_liuyan_set` values('4','显示页数','page','10');");

require("../../inc/footer.php");
?>