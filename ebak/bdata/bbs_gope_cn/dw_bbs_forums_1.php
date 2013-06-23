<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_bbs_forums`;");
E_C("CREATE TABLE `dw_bbs_forums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `content` varchar(200) DEFAULT NULL,
  `rules` text,
  `picurl` varchar(100) DEFAULT NULL,
  `admins` varchar(255) DEFAULT NULL,
  `today_num` int(10) unsigned DEFAULT '0',
  `topics_num` int(10) unsigned DEFAULT '0',
  `posts_num` int(10) unsigned DEFAULT '0',
  `last_postname` varchar(45) DEFAULT NULL,
  `last_postuser` varchar(45) DEFAULT NULL,
  `last_postusername` varchar(30) DEFAULT NULL,
  `last_posttime` int(10) unsigned DEFAULT '0',
  `last_postid` int(10) unsigned DEFAULT '0',
  `isverify` tinyint(1) unsigned DEFAULT '0',
  `forumpass` varchar(45) DEFAULT NULL,
  `forumusers` text,
  `forumgroups` text,
  `showtype` tinyint(1) unsigned DEFAULT '0',
  `ishidden` tinyint(1) unsigned DEFAULT '0',
  `order` int(10) unsigned DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=gbk ROW_FORMAT=FIXED");
E_D("replace into `dw_bbs_forums` values('1','0','论坛精华',NULL,NULL,NULL,NULL,'0','0','0',NULL,NULL,NULL,'0','0',NULL,NULL,NULL,NULL,'1','0','1',NULL);");
E_D("replace into `dw_bbs_forums` values('2','1','论坛精华文章',NULL,NULL,NULL,'|lotaies','0','32','5','借款不还担保人如何担责','98','lotaies','1321515513','83','0',NULL,NULL,'0','1','0','1',NULL);");
E_D("replace into `dw_bbs_forums` values('3','0','借款交流区',NULL,NULL,NULL,NULL,'0','0','0',NULL,NULL,NULL,'0','0',NULL,NULL,NULL,NULL,'0','0','3',NULL);");
E_D("replace into `dw_bbs_forums` values('4','3','借款人约标交流区',NULL,NULL,NULL,NULL,'0','0','0','我们都江堰市有关','80','jiedai','1317908011','12','0',NULL,NULL,'0','0','0','1',NULL);");
E_D("replace into `dw_bbs_forums` values('5','0','会员邀请推广跟帖区',NULL,NULL,NULL,NULL,'0','0','0',NULL,NULL,NULL,'0','0',NULL,NULL,NULL,NULL,'0','0','4',NULL);");
E_D("replace into `dw_bbs_forums` values('6','5','会员邀请注册跟帖',NULL,NULL,NULL,NULL,'0','0','0','我们都江堰市有关','80','666666','1317908118','21','0',NULL,NULL,NULL,'0','0','1',NULL);");
E_D("replace into `dw_bbs_forums` values('7','3','经验分享',NULL,NULL,NULL,NULL,'0','1','1','RE:央行：民间借贷有合法性 利率不得高于银行4倍','86','lotaies','1320933809','54',NULL,NULL,NULL,NULL,'0','0','2','经验分享');");
E_D("replace into `dw_bbs_forums` values('8','3','信用审核',NULL,NULL,NULL,NULL,'0','0','0',NULL,NULL,NULL,'0','0',NULL,NULL,NULL,NULL,'0','0','3','信用审核');");
E_D("replace into `dw_bbs_forums` values('9','0','公司业务',NULL,NULL,NULL,NULL,'0','0','0',NULL,NULL,NULL,'0','0',NULL,NULL,NULL,NULL,'1','0','1','金兰芬公司业务,揭阳市注册公司，公司注册，揭阳金融');");
E_D("replace into `dw_bbs_forums` values('10','9','公司注册',NULL,NULL,NULL,NULL,'0','5','11','RE:公司 公司法 公司法全文','86','lotaies','1321109648','76',NULL,NULL,NULL,NULL,'0','0','1','揭阳市公司注册，揭阳市注册公司，揭阳代注册公司，揭阳垫资，揭阳增资，揭阳验资。');");
E_D("replace into `dw_bbs_forums` values('11','9','承兑汇票',NULL,NULL,NULL,NULL,'0','0','0',NULL,NULL,NULL,'0','0',NULL,NULL,NULL,NULL,'0','0','2','揭阳市承兑汇票贴现，揭阳市收购承兑汇票，揭阳市承兑汇票套现。');");
E_D("replace into `dw_bbs_forums` values('12','9','抵押贷款',NULL,NULL,NULL,NULL,'0','0','0',NULL,NULL,NULL,'0','0',NULL,NULL,NULL,NULL,'0','0','3','揭阳市抵押贷款,揭阳市二手车贷款，揭阳市小额贷款，揭阳市融资，揭阳市快速贷款，揭阳市民间贷款，揭阳市私人贷款。');");

require("../../inc/footer.php");
?>