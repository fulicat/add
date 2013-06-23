<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_system`;");
E_C("CREATE TABLE `dw_system` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `nid` varchar(50) DEFAULT NULL,
  `value` varchar(250) DEFAULT NULL,
  `type` int(11) DEFAULT '0',
  `style` int(2) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=gbk");
E_D("replace into `dw_system` values('1','关闭站点（仅后台使用）','con_webopen','0','1','1','0');");
E_D("replace into `dw_system` values('2','网站关闭信息','con_closemsg','系统维护,维护期间给用户带来不便，请谅解，如有问题请拨打客服热线15018226680','2','1','0');");
E_D("replace into `dw_system` values('3','网站名称','con_webname','XX投资有限公司','0','1','0');");
E_D("replace into `dw_system` values('4','网站网址','con_weburl','http://bbs.gope.cn','0','1','0');");
E_D("replace into `dw_system` values('5','网站路径','con_webpath','','0','1','0');");
E_D("replace into `dw_system` values('6','网站logo','con_logo','','3','1','0');");
E_D("replace into `dw_system` values('7','网站关键词','con_keywords','XX市个人网络信用 无抵押贷款 无抵押 无担保 小额贷款 投资理财 企业融资','0','1','0');");
E_D("replace into `dw_system` values('8','网站描述','con_description','xx网贷是XX市xx投资有限公司投资建立的本土网上贷款平台，服务于揭阳市民的小额贷款需要。愿XX全市人人有钱贷，事业人人有成。','0','1','0');");
E_D("replace into `dw_system` values('9','网站位置分隔符','con_position',' ->','0','1','0');");
E_D("replace into `dw_system` values('10','网站备案号','con_beian','粤ICP备xxxxx号','0','1','0');");
E_D("replace into `dw_system` values('11','网站统计','con_tongji','网站统计','2','1','0');");
E_D("replace into `dw_system` values('12','网站静态保存目录','con_htmldir','html','0','1','0');");
E_D("replace into `dw_system` values('13','模板风格','con_template','ruizhict','0','1','0');");
E_D("replace into `dw_system` values('14','网站首页栏目ID','con_indexID','1','0','1','0');");
E_D("replace into `dw_system` values('15','系统过时时间(小时)','con_session_time','1','0','1','0');");
E_D("replace into `dw_system` values('16','是否使用数字地址（如?1_2.html）','con_rewrite','1','1','1','0');");
E_D("replace into `dw_system` values('17','默认是否生成html','con_autohtml','0','1','1','0');");
E_D("replace into `dw_system` values('18','上传的图片是否使用图片水印功能','con_watermark_pic','0','0','2','1');");
E_D("replace into `dw_system` values('19','采集的图片是否使用图片水印功能','con_watermark_caijipic','0','0','2','1');");
E_D("replace into `dw_system` values('20','选择水印的文件类型','con_watermark_type','0','0','2','1');");
E_D("replace into `dw_system` values('21','水印的字体','con_watermark_font','50','0','2','1');");
E_D("replace into `dw_system` values('22','水印图片文件名','con_watermark_file','/data/upfiles/litpics/201111031320335926.jpg','0','2','1');");
E_D("replace into `dw_system` values('23','水印图片文字字体大小','con_watermark_size','','0','2','1');");
E_D("replace into `dw_system` values('24','水印图片文字颜色','con_watermark_color','#FF0000','0','2','1');");
E_D("replace into `dw_system` values('25','水印文字','con_watermark_word','揭阳市金兰芬投资有限公司','0','2','1');");
E_D("replace into `dw_system` values('26','水印位置','con_watermark_position','4','0','2','1');");
E_D("replace into `dw_system` values('27','添加图片水印后质量参数','con_watermark_imgpct','0','0','2','1');");
E_D("replace into `dw_system` values('28','添加文字水印后质量参数','con_watermark_txtpct','0','0','2','1');");
E_D("replace into `dw_system` values('29','缩略图默认宽度','con_fujian_imgwidth','80','0','3','1');");
E_D("replace into `dw_system` values('30','缩略图默认高度','con_fujian_imgheight','80','0','3','1');");
E_D("replace into `dw_system` values('31','允许上传的图片类型','con_fujian_imgtype','gif|jpg|png','0','3','1');");
E_D("replace into `dw_system` values('32','允许上传的软件类型','con_fujian_annextype','','0','3','1');");
E_D("replace into `dw_system` values('33','允许的多媒体文件类型','con_fujian_mediatype','','0','3','1');");
E_D("replace into `dw_system` values('34','会员注册是否需要邮箱验证','con_member_reg_mail','','0','3','1');");
E_D("replace into `dw_system` values('35','评论是否需要审核','con_comment_verify','','0','3','0');");
E_D("replace into `dw_system` values('36','信用等级图片地址','con_credit_picurl','/data/images/credit/','0','1','1');");
E_D("replace into `dw_system` values('37','SMTP服务器','con_email_host','smtp.qq.com','0','4','0');");
E_D("replace into `dw_system` values('38','SMTP服务器是否需要验证','con_email_auth','1','1','4','0');");
E_D("replace into `dw_system` values('39','邮箱地址','con_email_email','xxxx@qq.com','0','4','0');");
E_D("replace into `dw_system` values('40','邮箱密码','con_email_pwd','xxxx','0','4','0');");
E_D("replace into `dw_system` values('41','发件人Email','con_email_from','xxxx@qq.com','0','4','0');");
E_D("replace into `dw_system` values('42','发件人昵称或姓名','con_email_from_name','xxxx投资借贷平台','0','4','0');");
E_D("replace into `dw_system` values('43','借款最高额度','con_borrow_maxaccount','500000','0','1','0');");
E_D("replace into `dw_system` values('44','客户服务热线','con_fuwutel','0663-8791118','0','1','1');");
E_D("replace into `dw_system` values('45','传真','con_fax','0663-8791119','0','1','1');");
E_D("replace into `dw_system` values('46','联系地址','con_address','广东省xx市xx区新河南二区沿街八幢xx号','0','1','1');");
E_D("replace into `dw_system` values('47','客服QQ1','con_qq1','<a target=\"_blank\" href=\"http://wpa.qq.com/msgrd?v=3&uin=676668697&site=qq&menu=yes\"><img border=\"0\" src=\"http://wpa.qq.com/pa?p=2:676668697:41\" alt=\"点击这里给我发消息\" title=\"点击这里给我发消息\"></a>','2','1','1');");
E_D("replace into `dw_system` values('48','客服QQ2','con_qq2','<a target=\"_blank\" href=\"http://wpa.qq.com/msgrd?v=3&uin=149296621&site=qq&menu=yes\"><img border=\"0\" src=\"http://wpa.qq.com/pa?p=2:149296621:41\" alt=\"点击这里给我发消息\" title=\"点击这里给我发消息\"></a>','2','1','1');");
E_D("replace into `dw_system` values('49','客服QQ3','con_qq3','<a target=\"_blank\" href=\"http://wpa.qq.com/msgrd?v=3&uin=104749323&site=qq&menu=yes\"><img border=\"0\" src=\"http://wpa.qq.com/pa?p=2:104749323:41\" alt=\"点击这里给我发消息\" title=\"点击这里给我发消息\"></a>','2','1','1');");
E_D("replace into `dw_system` values('50','客服QQ4','con_qq4','<a target=\"_blank\" href=\"http://wpa.qq.com/msgrd?v=3&uin=2454314662&site=qq&menu=yes\"><img border=\"0\" src=\"http://wpa.qq.com/pa?p=2:676664627:41\" alt=\"点击这里给我发消息\" title=\"点击这里给我发消息\"></a>','2','1','1');");
E_D("replace into `dw_system` values('51','客服QQ5','con_qq5','','2','1','1');");
E_D("replace into `dw_system` values('52','客服QQ6','con_qq6','','2','1','1');");
E_D("replace into `dw_system` values('53','业务支持热线','con_tel','0663-8791118','2','1','1');");
E_D("replace into `dw_system` values('54','客户中心文字','con_kefutext','欢迎光临xxx投资客服中心！<br />\r\n有任何疑问请联系你的专属客服!','2','1','1');");
E_D("replace into `dw_system` values('55','会员费','con_vip_money','180','0','1','1');");
E_D("replace into `dw_system` values('56','要请注册提成','con_vip_ticheng','30','0','1','1');");
E_D("replace into `dw_system` values('57','用户开始最低的额度','con_user_amount','2000','0','1','1');");
E_D("replace into `dw_system` values('58','借款利率','con_borrow_apr','28.2','0','1','1');");
E_D("replace into `dw_system` values('59','是否采用cookie登录','con_cookie','1','1','1','0');");
E_D("replace into `dw_system` values('60','逾期利率','con_late_rate','0.008','0','1','1');");
E_D("replace into `dw_system` values('61','还款方式信息','con_msg_repayment','0','2','1','1');");
E_D("replace into `dw_system` values('62','后台地址名称','con_houtai','gope','0','1','1');");
E_D("replace into `dw_system` values('63','是否启用邮箱发送信息','con_emailsend','1','1','1','1');");
E_D("replace into `dw_system` values('64','借款人借款的手续费','con_borrow_fee','0.03','0','1','1');");
E_D("replace into `dw_system` values('65','实名认证费用','con_realname_fee','5','0','1','1');");
E_D("replace into `dw_system` values('66','是否开启视频认证收费','con_video_feestatus','0','1','1','1');");

require("../../inc/footer.php");
?>