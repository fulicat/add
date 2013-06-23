<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_user_type`;");
E_C("CREATE TABLE `dw_user_type` (
  `type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `purview` text,
  `order` varchar(10) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `type` int(2) DEFAULT NULL,
  `summary` varchar(200) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `addtime` varchar(50) DEFAULT NULL,
  `addip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=gbk");
E_D("replace into `dw_user_type` values('1','超级管理员','other_all','10','1','1','超级管理员','超级管理员,此类型不能删除','1281739540','127.0.0.1');");
E_D("replace into `dw_user_type` values('2','普通用户','','10','1','2','','','1282288492','127.0.0.1');");
E_D("replace into `dw_user_type` values('3','客服','site_all,module_all,system_all,bbs_all,system_clearcache,user_list,user_view,article_list,attestation_list,attestation_new,attestation_edit,attestation_del,attestation_view,attestation_type_list,attestation_type_new,attestation_type_edit,attestation_type_del,attestation_realname,attestation_all,attestation_vip,attestation_vipview,attestation_viewall,attestation_audit,attestation_view_all,userinfo_list,userinfo_view,borrow_list,borrow_view,credit_list,credit_log,limitapp_list,limitapp_view,invest_list,invest_view,liuyan_list,liuyan_reply,comment_list,comment_new','10','1','1','客服','客服','1287456109','61.51.205.98');");
E_D("replace into `dw_user_type` values('7','兼职客服','system_all','10','1','1','','','1290228395','121.207.172.249');");
E_D("replace into `dw_user_type` values('9','信贷审核','site_all,module_all,system_all,bbs_all,system_clearcache,user_list,user_view,attestation_list,attestation_new,attestation_edit,attestation_del,attestation_view,attestation_type_list,attestation_type_new,attestation_type_edit,attestation_type_del,attestation_realname,attestation_all,attestation_vip,attestation_vipview,attestation_viewall,attestation_audit,attestation_view_all,userinfo_list,userinfo_view,borrow_list,borrow_view,invest_list,invest_view','10','1','1','信贷审核','信贷审核','1303314633','58.46.176.13');");

require("../../inc/footer.php");
?>