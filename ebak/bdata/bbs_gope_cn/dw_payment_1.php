<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_payment`;");
E_C("CREATE TABLE `dw_payment` (
  `id` mediumint(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `nid` varchar(100) DEFAULT NULL,
  `status` smallint(3) unsigned DEFAULT '0',
  `style` int(2) DEFAULT NULL,
  `config` longtext,
  `fee_type` int(2) DEFAULT NULL,
  `max_money` int(10) DEFAULT NULL,
  `max_fee` int(10) DEFAULT NULL,
  `description` longtext,
  `order` smallint(3) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=gbk");
E_D("replace into `dw_payment` values('1','支付宝','alipay','1','0','a:4:{s:9:\"alipay_id\";s:16:\"2088002506667295\";s:10:\"alipay_key\";s:32:\"jd4tmmwnuzavag933i0n1qyblgkjs3jc\";s:12:\"alipay_email\";s:15:\"lotaies@163.com\";s:11:\"alipay_type\";s:1:\"2\";}','0','0','1','支付宝即时到帐，是国内先进的网上支付方式。','1');");
E_D("replace into `dw_payment` values('9','腾讯财付通[即时到账]','tenpay','1','0','a:3:{s:9:\"member_id\";s:10:\"1212153501\";s:10:\"PrivateKey\";s:32:\"324bb56c466d30a2a40a6e1593967139\";s:8:\"authtype\";s:1:\"1\";}','1','0','0','腾讯财付通即时到账','10');");
E_D("replace into `dw_payment` values('10','环讯IPS网上支付3.0','ips','0',NULL,'a:2:{s:9:\"member_id\";s:6:\"015312\";s:10:\"PrivateKey\";s:128:\"yXkD9pT4wfsBm08D9Ua3JPA05tXkNTmtz5ajV2T7QZyNbFkwxxH6w2Z8wJiqsJG2TYmH0yHga3DK0NyQiAM0mFXW51NmuCphsWTd33WZFA6SPpi8uriHXpqnaplYB5Mx\";}','0','0','0','<FONT face=宋体>支持30家银行在线支付</FONT>','10');");
E_D("replace into `dw_payment` values('32','线下支付','offline','1',NULL,'s:0:\"\";','1','0','0','<P>线下支付同样要收1%的管理费用.用于网站运营成本，请投资者谅解。</P><BR><br />\r\n<P>中国农业银行 开户行揭阳市分行东山支行; 卡号：6228 4113 9021 9721 114 </P><BR><br />\r\n<P>户名：陈晓丰</P><BR><br />\r\n<P>中国建设银行 开户行揭阳市分行榕城支行; 卡号：<FONT face=宋体>6222 8032 6307 1003 047</FONT></P><BR><br />\r\n<P>户名：陈晓丰</P><BR><br />\r\n<P>中国工商银行 开户行揭阳市分行晓翠支行; 卡号：<FONT face=宋体>6222 0220 1900 0944 205</FONT></P><BR><br />\r\n<P>户名：陈晓丰</P><BR><br />\r\n<P>中国人民银行 开户行揭阳市分行; 卡号：4563 5170 1500 9101 368</P><BR><br />\r\n<P>户名：陈晓丰</P><BR><br />\r\n<P>交通银行 开户行揭阳市分行; 卡号：6222 6007 4000 0715 655</P><BR><br />\r\n<P>户名：陈晓丰</P><BR><br />\r\n<P>广发银行 开户行揭阳市分行; 卡号：6225 6826 2100 0246 871</P><BR><br />\r\n<P>户名：陈晓丰</P><BR><br />\r\n<P>广东省农村信用卡(揭阳农村商业银行) 开户行揭阳磐东支行; </P><BR><br />\r\n<P>卡号：6210 1888 0000 4907 107&nbsp; 户名：陈晓丰</P><br />\r\n<P>同时揭阳本地投资者也可以直接到本公司代理充入.地址：东山区新河南二区沿街八幢201(揭阳市金兰芬投资有限公司)联系人：陈晓丰&nbsp; 联系电话：8277577</P>','10');");

require("../../inc/footer.php");
?>