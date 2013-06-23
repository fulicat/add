<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_userinfo`;");
E_C("CREATE TABLE `dw_userinfo` (
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
  `marry` varchar(50) DEFAULT NULL COMMENT '婚姻',
  `child` varchar(10) DEFAULT NULL COMMENT '子女',
  `education` varchar(10) DEFAULT NULL COMMENT '学历',
  `income` varchar(10) DEFAULT NULL COMMENT '收入',
  `shebao` varchar(10) DEFAULT NULL COMMENT '社保',
  `shebaoid` varchar(50) DEFAULT NULL COMMENT '社保号',
  `housing` varchar(10) DEFAULT NULL COMMENT '住房条件',
  `car` varchar(10) DEFAULT NULL COMMENT '车',
  `late` varchar(10) DEFAULT NULL COMMENT '逾期',
  `house_address` varchar(10) DEFAULT NULL COMMENT '房产地址',
  `house_area` varchar(10) DEFAULT NULL COMMENT '房产面积',
  `house_year` varchar(10) DEFAULT NULL COMMENT '建筑年份',
  `house_status` varchar(10) DEFAULT NULL COMMENT '供款',
  `house_holder1` varchar(10) DEFAULT NULL COMMENT '房子所有权1',
  `house_holder2` varchar(10) DEFAULT NULL COMMENT '房子所有权1',
  `house_right1` varchar(10) DEFAULT NULL COMMENT '房子份额1',
  `house_right2` varchar(10) DEFAULT NULL COMMENT '房子份额2',
  `house_loanyear` varchar(10) DEFAULT NULL COMMENT '贷款年限',
  `house_loanprice` varchar(10) DEFAULT NULL COMMENT '每月供款',
  `house_balance` varchar(10) DEFAULT NULL COMMENT '贷款余额',
  `house_bank` varchar(10) DEFAULT NULL COMMENT '银行',
  `company_name` varchar(10) DEFAULT NULL COMMENT '公司名称',
  `company_type` varchar(10) DEFAULT NULL COMMENT '公司性质',
  `company_industry` varchar(10) DEFAULT NULL COMMENT '公司行业',
  `company_office` varchar(10) DEFAULT NULL COMMENT '工作职位',
  `company_jibie` varchar(10) DEFAULT NULL COMMENT '工作级别',
  `company_worktime1` varchar(10) DEFAULT NULL COMMENT '工作时间1',
  `company_worktime2` varchar(10) DEFAULT NULL COMMENT '工作时间2',
  `company_workyear` varchar(10) DEFAULT NULL COMMENT '工作年限',
  `company_tel` varchar(50) DEFAULT NULL COMMENT '公司电话',
  `company_address` varchar(100) DEFAULT NULL COMMENT '公司地址',
  `company_weburl` varchar(100) DEFAULT NULL COMMENT '公司网站',
  `company_reamrk` varchar(250) DEFAULT NULL COMMENT '公司备注',
  `private_type` varchar(10) DEFAULT NULL COMMENT '类别',
  `private_date` varchar(10) DEFAULT NULL COMMENT '日期',
  `private_place` varchar(10) DEFAULT NULL COMMENT '场所',
  `private_rent` varchar(10) DEFAULT NULL COMMENT '租金',
  `private_term` varchar(10) DEFAULT NULL COMMENT '租期',
  `private_taxid` varchar(30) DEFAULT NULL COMMENT '工商税务',
  `private_commerceid` varchar(50) DEFAULT NULL COMMENT '工商登记号',
  `private_income` varchar(100) DEFAULT NULL COMMENT '收入',
  `private_employee` varchar(100) DEFAULT NULL COMMENT '雇员',
  `finance_repayment` varchar(100) DEFAULT NULL COMMENT '每月无抵押贷款还款额',
  `finance_property` varchar(100) DEFAULT NULL COMMENT '自有房产',
  `finance_amount` varchar(100) DEFAULT NULL COMMENT '每月房屋按揭金额',
  `finance_car` varchar(10) DEFAULT NULL COMMENT '自有汽车',
  `finance_caramount` varchar(100) DEFAULT NULL COMMENT '每月汽车按揭金额',
  `finance_creditcard` varchar(100) DEFAULT NULL COMMENT '信用卡金额',
  `mate_name` varchar(100) DEFAULT NULL COMMENT '配偶名字',
  `mate_salary` varchar(10) DEFAULT NULL COMMENT '薪资',
  `mate_phone` varchar(100) DEFAULT NULL COMMENT '手机',
  `mate_tel` varchar(100) DEFAULT NULL COMMENT '电话',
  `mate_type` varchar(10) DEFAULT NULL COMMENT '工作类型',
  `mate_office` varchar(10) DEFAULT NULL COMMENT '工作职位',
  `mate_address` varchar(250) DEFAULT NULL COMMENT '地址',
  `mate_income` varchar(100) DEFAULT NULL COMMENT '收入',
  `education_record` varchar(100) DEFAULT NULL COMMENT '学历',
  `education_school` varchar(200) DEFAULT NULL COMMENT '学校',
  `education_study` varchar(200) DEFAULT NULL COMMENT '专业',
  `education_time1` varchar(20) DEFAULT NULL COMMENT '时间1',
  `education_time2` varchar(20) DEFAULT NULL COMMENT '时间2',
  `tel` varchar(50) DEFAULT NULL COMMENT '电话',
  `phone` varchar(50) DEFAULT NULL COMMENT '手机',
  `post` varchar(50) DEFAULT NULL COMMENT '邮编',
  `address` varchar(50) DEFAULT NULL COMMENT '邮编',
  `province` varchar(20) DEFAULT NULL COMMENT '省份',
  `city` varchar(20) DEFAULT NULL COMMENT '城市',
  `area` varchar(20) DEFAULT NULL COMMENT '区',
  `linkman1` varchar(50) DEFAULT NULL COMMENT '联系人1',
  `relation1` varchar(50) DEFAULT NULL COMMENT '关系1',
  `tel1` varchar(50) DEFAULT NULL COMMENT '电话1',
  `phone1` varchar(50) DEFAULT NULL COMMENT '手机1',
  `linkman2` varchar(50) DEFAULT NULL COMMENT '联系人2',
  `relation2` varchar(50) DEFAULT NULL COMMENT '关系2',
  `tel2` varchar(50) DEFAULT NULL COMMENT '电话2',
  `phone2` varchar(50) DEFAULT NULL COMMENT '手机2',
  `linkman3` varchar(50) DEFAULT NULL COMMENT '联系人3',
  `relation3` varchar(50) DEFAULT NULL COMMENT '关系3',
  `tel3` varchar(50) DEFAULT NULL COMMENT '电话3',
  `phone3` varchar(50) DEFAULT NULL COMMENT '手机3',
  `msn` varchar(50) DEFAULT NULL COMMENT 'MSN',
  `qq` varchar(50) DEFAULT NULL COMMENT 'QQ',
  `wangwang` varchar(50) DEFAULT NULL COMMENT 'WANGWANG',
  `ability` varchar(250) DEFAULT NULL COMMENT '个人能力',
  `interest` varchar(250) DEFAULT NULL COMMENT '个人爱好',
  `others` varchar(250) DEFAULT NULL COMMENT '其他说明',
  `experience` text COMMENT '工作经历',
  `addtime` varchar(50) DEFAULT NULL,
  `addip` varchar(50) DEFAULT NULL,
  `updatetime` varchar(50) DEFAULT NULL,
  `updateip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=gbk");
E_D("replace into `dw_userinfo` values('1','0','28',NULL,'0','0','0',NULL,NULL,NULL,NULL,'1','5','14','24','31','','34','37','39','云南省水富县','64','2002-02-02','72000','王浪','杨金国','50%','50%','5','1310','56000','公积金','云南省水富县第一中学','53','68','221','73','2005-08-01','2011-08-25','230','0870-8635320','云南水富','暂无','学校搬迁','54','2011-09-10','无','0','0','0','0','0','0','0','237','1310','235','0','300','王浪','2500','13578099338','','69','219','云南水富','','15','云南玉溪师范学院','地理','2001-09-01','2005-07-01','0870-4571216','13638810629','657800','云南水富紫荆豪园','2892','2938','2950','王浪','239','0870-4571216','13578099338','','240','','','','240','','','','','','','','','','1314284133','123.87.181.158','1315627781','123.87.177.3');");
E_D("replace into `dw_userinfo` values('2','0','33',NULL,'0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'湖南省浏阳市社港镇淮','203.22','1992-01-01','无','唐先觉','唐绍进','无','无','无','无','无','无','湖南长沙榔梨建筑公程','48','57','224','74','2010-03-01','2013-03-03','227','073189788347','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'王招林','3000','18773192207','','54','77','','','11','','','','','073189788347','18774913439','410327','长沙县新安小区11栋2单元5楼右边','2034','2035','2042','唐文宾','242','13908452599','','王招林','239','18773192207','','','240','','','','','','','','','','1314680730','113.246.41.133','1314754186','118.249.159.199');");
E_D("replace into `dw_userinfo` values('3','0','38',NULL,'0','0','0',NULL,NULL,NULL,NULL,'1','6','12','26','32','','34','36','39','广东省揭阳市惠来地区','144','2018-09-15','','老公','','100','','','','','','商店','52','60','83','74','2008-08-09','','228','0663-6250188','','','','60','2018-09-02','自有房产','','','','445224','70000','2','0','237','0','235','0','0','斌','5500','13729329866','','60','77','','','12','葵潭中心学校','','','','0663-6251361','13502518630','515239','身份证地址','2184','','','斌斌','239','0663-6250188','13729329866','','242','','','','242','','','','','','比较笨，反应慢，见笑了','人民币~~~~~~~','','','1314682093','113.117.116.229','1314742050','113.117.119.136');");
E_D("replace into `dw_userinfo` values('4','0','53',NULL,'0','0','0',NULL,NULL,NULL,NULL,'3','5','13','23','31','D68944707','33','37','38','福鼎市','210','2010-09-30','0','杨应式','','','','0','0','0','0','东莞菲力制衣有限公司','52','55','222','74','2010-09-16','2013-09-10','227','076988786698','高步镇高龙大道','0','0','54','2005-04-21','衣服','20000','1','0','0','0','500','0','237','0','235','0','0','0','0','0','0','54','77','0','0','13','宁德技校','绘图','2006-08-08','2009-09-07','05937376535','15959230221','355213','广东省东莞市高步','1310','1403','1413','杨应式','240','0','13423209364','0','240','0','0','0','240','0','0','0','421831480','0','','','','','1315651784','125.93.183.3','1315652809','125.93.183.3');");
E_D("replace into `dw_userinfo` values('5','0','37',NULL,'0','0','0',NULL,NULL,NULL,NULL,'3','5','13','24','32','','33','37','39',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0358-4069606','15536471474','033000','','297','424','426','','240','','','','240','','','','240','','','','284638101','yun526419682',NULL,NULL,NULL,NULL,'1316331671','124.165.237.94','1316331738','124.165.237.94');");
E_D("replace into `dw_userinfo` values('6','0','52',NULL,'0','0','0',NULL,NULL,NULL,NULL,'1','5','11','21','31','','33','36','38','','','','','','','','','','','','','','47','54','165','73','','','227','','','','','60','2007-10-30','写字楼','600','12','','','','3','0','237','0','235','0','0','苏志群','2000','15155227312','0552-2040464','60','81','','2000','13','安徽省蚌埠市纺织中专','机械','1992-09-01','1995-09-01','0552-2040464','13955290732','233000','安徽省蚌埠市蚌山区红旗二路48号7幢一单元6号','1170','1189','1192','苏志群','239','0552-2040464','','','240','','','','240','','','','84245841','','','','','','1316335793','117.65.27.112','1317637180','123.8.24.23');");
E_D("replace into `dw_userinfo` values('7','0','86',NULL,'0','0','0',NULL,NULL,NULL,NULL,'1','5','14','28','32','','34','36','39',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'揭阳市金兰芬投资有限','475','61','91','74','2008-09-01','2011-11-03','227','0663-8277577','广东省揭阳市东山区新河南二区沿街八幢201','http://www.jinlanfen.com','自己测试一下。',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1500','237','','235','','20000',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'14','汕头职业技术学院','电子技术应用','2000-09-01','2003-09-01','0663-8575174','15914948451','522000','揭阳市东山区新阳路新河南二区B区104号','2184','2389','2392','庄瑞钰','239','8330989','15219636266','陈映秋','240','0663-8330989','15018226680','陈卫丰','242','0663-8822223','15915600271','lotaies@163.com','104749323','lotaies',NULL,NULL,NULL,NULL,'1320317291','127.0.0.1','1320320679','127.0.0.1');");
E_D("replace into `dw_userinfo` values('8','0','1',NULL,'0','0','0',NULL,NULL,NULL,NULL,'1','5','11','24','32','','34','36','38',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1320385534','127.0.0.1',NULL,NULL);");
E_D("replace into `dw_userinfo` values('9','0','90',NULL,'0','0','0',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','','','','','','240','','','','240','','','','240','','','','104548758','lotaies',NULL,NULL,NULL,NULL,'1320849539','27.47.118.133','1320849665','27.47.118.133');");
E_D("replace into `dw_userinfo` values('10','0','102',NULL,'0','0','0',NULL,NULL,NULL,NULL,'3','5','13','23','32','','33','37','39',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'新思维广告设计','52','59','103','76','2011-11-04','2011-11-11','225','0663-8684391','揭阳市榕城区榕东厚宅村6号店','','','59','2011-11-04','新思维广告设计','800','36','无','无','大约1-2万之间','游击队4人，设计人员2人（暂时没有）',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'13','中国计算机函授学院（揭西分校）','平面设计/室内设计','2003-11-06','2007-11-06','8684391','13380594091','522031','揭阳市榕城区榕东厚宅村6号店','2184','2389','2391','陈银华','242','15915657420','15915657420','陈春花','242','13539272245','13539272245','','240','','','','1056765934','','专业广告设计及市场策划，时常有承接室内装修设计。','处理事情都很干脆，说一就一，除非有难言之语。<br /><br />\r\n做什么都比较利索，不会畏畏缩缩。<br /><br />\r\n说起话来从不隐瞒，比较直接。<br /><br />\r\n喜欢广交朋友，礼上往来。','借钱用，不伤情，友情还在。','','1320993977','183.9.30.73','1320996260','183.9.30.73');");

require("../../inc/footer.php");
?>