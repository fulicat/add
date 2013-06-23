<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_remind`;");
E_C("CREATE TABLE `dw_remind` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `nid` varchar(50) DEFAULT NULL,
  `status` smallint(2) unsigned DEFAULT '0' COMMENT '状态',
  `order` smallint(6) DEFAULT '0' COMMENT '排序',
  `type_id` smallint(5) unsigned DEFAULT '0' COMMENT '类型',
  `message` smallint(2) unsigned DEFAULT '0' COMMENT '短消息',
  `email` smallint(2) unsigned DEFAULT '0' COMMENT '邮箱',
  `phone` smallint(2) unsigned DEFAULT '0' COMMENT '手机',
  `addtime` int(10) DEFAULT '0',
  `addip` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=gbk");
E_D("replace into `dw_remind` values('1','请求加为好友','friend_request','0','10','4','1','4','4','1284123091','127.0.0.1');");
E_D("replace into `dw_remind` values('2','成为好友关系','friend_yes','0','12','4','3','4','4','1284123281','127.0.0.1');");
E_D("replace into `dw_remind` values('3','提现审核通过','withdraw_yes','0','10','1','1','4','2','0','');");
E_D("replace into `dw_remind` values('4','提现审核不通过','withdraw_no','0','10','1','1','4','2','0','');");
E_D("replace into `dw_remind` values('5','网站充值','recharge','0','10','1','1','4','2','0','');");
E_D("replace into `dw_remind` values('6','保证金解冻','margin_thaw','0','10','1','1','4','2','0','');");
E_D("replace into `dw_remind` values('7','线下充值','recharge_down','0','10','1','1','4','2','0','');");
E_D("replace into `dw_remind` values('8','VIP审核通过','vip_yes','0','10','1','1','4','2','0','');");
E_D("replace into `dw_remind` values('9','VIP审核不通过','vip_no','0','10','1','1','4','2','0','');");
E_D("replace into `dw_remind` values('10','借款标初审通过','borrow_yes','0','10','2','1','4','2','0','');");
E_D("replace into `dw_remind` values('11','借款标初审不通过','borrow_no','0','10','2','1','4','2','0','');");
E_D("replace into `dw_remind` values('12','借款标有人投标时','borrow_join','0','10','2','1','4','2','0','');");
E_D("replace into `dw_remind` values('13','借款标复审通过','borrow_review_yes','0','10','2','1','4','2','0','');");
E_D("replace into `dw_remind` values('14','借款标复审不通过','borrow_review_no','0','10','2','1','4','2','0','');");
E_D("replace into `dw_remind` values('15','借款标流标','borrow_end','0','10','2','1','4','2','0','');");
E_D("replace into `dw_remind` values('16','借款标留言','borrow_msg','0','10','2','1','4','2','0','');");
E_D("replace into `dw_remind` values('17','投标的借款标修改内容','loan_update','0','10','3','1','4','2','0','');");
E_D("replace into `dw_remind` values('18','投标的借款标流标','loan_end','0','10','3','1','4','2','0','');");
E_D("replace into `dw_remind` values('19','借出成功，扣除冻结款','loan_yes_account','0','10','3','1','4','2','0','');");
E_D("replace into `dw_remind` values('20','借出失败，解冻冻结款','loan_no_account','0','10','3','1','4','2','0','');");
E_D("replace into `dw_remind` values('21','收到还款','loan_pay','0','10','3','1','4','2','0','');");
E_D("replace into `dw_remind` values('22','网站垫付','loan_advanced','0','10','3','1','4','2','0','');");
E_D("replace into `dw_remind` values('23','借款标评价','loan_assess','0','10','3','1','4','2','0','');");
E_D("replace into `dw_remind` values('24','拒绝好友请求','friend_pass','0','10','4','1','4','4','0','');");
E_D("replace into `dw_remind` values('25','解除好友关系','friend_end','0','10','4','1','4','4','0','');");
E_D("replace into `dw_remind` values('26','资料审核通过','info_yes','0','10','4','1','4','4','0','');");
E_D("replace into `dw_remind` values('27','资料审核不通过','info_no','0','10','4','1','4','4','0','');");

require("../../inc/footer.php");
?>