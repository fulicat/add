<?php
require("../../inc/header.php");

/*
		SoftName : EmpireBak Version 2010
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

DoSetDbChar('gbk');
E_D("DROP TABLE IF EXISTS `dw_user_trend`;");
E_C("CREATE TABLE `dw_user_trend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `content` text,
  `addtime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=gbk COMMENT='用户操作记录'");
E_D("replace into `dw_user_trend` values('1','4',NULL,'成功发布了\"<a href=''/invest/a1.html'' target=''_blank''>秒换  测试下功能</a>\"借款标','1314064098');");
E_D("replace into `dw_user_trend` values('2','4',NULL,'成功发布了\"<a href=''/invest/a2.html'' target=''_blank''>继续测试</a>\"借款标','1314099000');");
E_D("replace into `dw_user_trend` values('3','12',NULL,'成功发布了\"<a href=''/invest/a3.html'' target=''_blank''>秒还  试下人气</a>\"借款标','1314249713');");
E_D("replace into `dw_user_trend` values('4','13',NULL,'成功发布了\"<a href=''/invest/a4.html'' target=''_blank''>试下人气  秒还</a>\"借款标','1314255213');");
E_D("replace into `dw_user_trend` values('5','15',NULL,'成功发布了\"<a href=''/invest/a5.html'' target=''_blank''>体验下 流程  满标通过 就还</a>\"借款标','1314256814');");
E_D("replace into `dw_user_trend` values('6','4',NULL,'成功发布了\"<a href=''/invest/a6.html'' target=''_blank''>感谢各界朋友对网站的支持 继续秒下</a>\"借款标','1314262926');");
E_D("replace into `dw_user_trend` values('7','13',NULL,'成功发布了\"<a href=''/invest/a7.html'' target=''_blank''>网站满标的速度快啊  继续秒下 好申请提额</a>\"借款标','1314268585');");
E_D("replace into `dw_user_trend` values('8','20',NULL,'成功发布了\"<a href=''/invest/a8.html'' target=''_blank''>测试网站满标速度。审核通过就还</a>\"借款标','1314269005');");
E_D("replace into `dw_user_trend` values('9','12',NULL,'成功发布了\"<a href=''/invest/a9.html'' target=''_blank''>看到这么多的投资人给力，继续秒</a>\"借款标','1314272540');");
E_D("replace into `dw_user_trend` values('10','4',NULL,'成功发布了\"<a href=''/invest/a10.html'' target=''_blank''>感谢各界投资朋友的支持 本月最后一秒</a>\"借款标','1314325961');");
E_D("replace into `dw_user_trend` values('11','15',NULL,'成功发布了\"<a href=''/invest/a13.html'' target=''_blank''>奖励2 跟投我秒标的投资人说声对不起</a>\"借款标','1314596378');");
E_D("replace into `dw_user_trend` values('12','25',NULL,'成功发布了\"<a href=''/invest/a14.html'' target=''_blank''>第一次借款，提高信用额度，谢谢支持</a>\"借款标','1314596604');");
E_D("replace into `dw_user_trend` values('13','13',NULL,'成功发布了\"<a href=''/invest/a15.html'' target=''_blank''>短期资金周转 奖励2</a>\"借款标','1314681190');");
E_D("replace into `dw_user_trend` values('14','38',NULL,'成功发布了\"<a href=''/invest/a16.html'' target=''_blank''>体验标，流程熟悉熟悉</a>\"借款标','1314684710');");
E_D("replace into `dw_user_trend` values('15','39',NULL,'成功发布了\"<a href=''/invest/a17.html'' target=''_blank''>秒下，看下网站实力</a>\"借款标','1314717039');");
E_D("replace into `dw_user_trend` values('16','20',NULL,'成功发布了\"<a href=''/invest/a18.html'' target=''_blank''>短期资金周转，望朋友们支持</a>\"借款标','1314717687');");
E_D("replace into `dw_user_trend` values('17','33',NULL,'成功发布了\"<a href=''/invest/a20.html'' target=''_blank''>秒一下 谢谢 </a>\"借款标','1314758135');");
E_D("replace into `dw_user_trend` values('18','44',NULL,'成功发布了\"<a href=''/invest/a21.html'' target=''_blank''>秒还 第一次来这个平台 看下网站实力 </a>\"借款标','1314759095');");
E_D("replace into `dw_user_trend` values('19','38',NULL,'成功发布了\"<a href=''/invest/a22.html'' target=''_blank''>第2标~~~~再次体验！！</a>\"借款标','1314839992');");
E_D("replace into `dw_user_trend` values('20','4',NULL,'成功发布了\"<a href=''/invest/a24.html'' target=''_blank''>网站都没有人气 发个小红包</a>\"借款标','1314867685');");
E_D("replace into `dw_user_trend` values('21','49',NULL,'成功发布了\"<a href=''/invest/a23.html'' target=''_blank''>露个脸  秒下</a>\"借款标','1314867718');");
E_D("replace into `dw_user_trend` values('22','50',NULL,'成功发布了\"<a href=''/invest/a25.html'' target=''_blank''>给点力 秒下 愿网站人气冲上来</a>\"借款标','1314868055');");
E_D("replace into `dw_user_trend` values('23','39',NULL,'成功发布了\"<a href=''/invest/a27.html'' target=''_blank''>为提额度做准备  谢谢支持 通过即还</a>\"借款标','1314872767');");
E_D("replace into `dw_user_trend` values('24','12',NULL,'成功发布了\"<a href=''/invest/a28.html'' target=''_blank''>感谢网站的奖励  特意申请额度秒下</a>\"借款标','1314872777');");
E_D("replace into `dw_user_trend` values('25','28',NULL,'成功发布了\"<a href=''/invest/a26.html'' target=''_blank''>非提现</a>\"借款标','1314872787');");
E_D("replace into `dw_user_trend` values('26','33',NULL,'成功发布了\"<a href=''/invest/a29.html'' target=''_blank''>奖励3标多支持</a>\"借款标','1314942602');");
E_D("replace into `dw_user_trend` values('27','38',NULL,'成功发布了\"<a href=''/invest/a30.html'' target=''_blank''>第2标接上，给力~来个好彩头</a>\"借款标','1315441729');");
E_D("replace into `dw_user_trend` values('28','25',NULL,'成功发布了\"<a href=''/invest/a31.html'' target=''_blank''>讲信用，二次借款，陕西咸阳有实体店</a>\"借款标','1315469184');");
E_D("replace into `dw_user_trend` values('29','4',NULL,'成功发布了\"<a href=''/invest/a32.html'' target=''_blank''>弥补网站失误 投资损失 秒</a>\"借款标','1315487030');");
E_D("replace into `dw_user_trend` values('30','49',NULL,'成功发布了\"<a href=''/invest/a33.html'' target=''_blank''>现场认证用户  奖励2</a>\"借款标','1315613061');");
E_D("replace into `dw_user_trend` values('31','13',NULL,'成功发布了\"<a href=''/invest/a34.html'' target=''_blank''>和投资者约标</a>\"借款标','1315613085');");
E_D("replace into `dw_user_trend` values('32','44',NULL,'成功发布了\"<a href=''/invest/a35.html'' target=''_blank''>周期有点长 6奖励</a>\"借款标','1315614559');");
E_D("replace into `dw_user_trend` values('33','50',NULL,'成功发布了\"<a href=''/invest/a36.html'' target=''_blank''>希望投资者支持</a>\"借款标','1315614572');");
E_D("replace into `dw_user_trend` values('34','28',NULL,'成功发布了\"<a href=''/invest/a37.html'' target=''_blank''>为提升额度，再秒还</a>\"借款标','1315620090');");
E_D("replace into `dw_user_trend` values('35','28',NULL,'成功发布了\"<a href=''/invest/a38.html'' target=''_blank''>非提现，支持网站，给投资者留印象</a>\"借款标','1315629134');");
E_D("replace into `dw_user_trend` values('36','4',NULL,'成功发布了\"<a href=''/invest/a39.html'' target=''_blank''>测试担保标</a>\"借款标','1315630256');");
E_D("replace into `dw_user_trend` values('37','39',NULL,'成功发布了\"<a href=''/invest/a40.html'' target=''_blank''>资料审核中  3奖励</a>\"借款标','1315651652');");
E_D("replace into `dw_user_trend` values('38','4',NULL,'成功发布了\"<a href=''/invest/a41.html'' target=''_blank''>提前祝福汇通会员中秋节快乐！</a>\"借款标','1315701402');");
E_D("replace into `dw_user_trend` values('39','28',NULL,'成功发布了\"<a href=''/invest/a43.html'' target=''_blank''>短期周转借款</a>\"借款标','1316585273');");
E_D("replace into `dw_user_trend` values('40','25',NULL,'成功发布了\"<a href=''/invest/a42.html'' target=''_blank''>信用借款，在次发标</a>\"借款标','1316585291');");
E_D("replace into `dw_user_trend` values('41','68',NULL,'成功发布了\"<a href=''/invest/a44.html'' target=''_blank''>帮助他人</a>\"借款标','1316926695');");
E_D("replace into `dw_user_trend` values('42','62',NULL,'成功发布了\"<a href=''/invest/a45.html'' target=''_blank''>撒旦法发生的撒旦法撒旦法 </a>\"借款标','1317631450');");
E_D("replace into `dw_user_trend` values('43','25',NULL,'成功发布了\"<a href=''/invest/a46.html'' target=''_blank''>我要借钱</a>\"借款标','1317906518');");
E_D("replace into `dw_user_trend` values('44','80',NULL,'成功发布了\"<a href=''/invest/a47.html'' target=''_blank''>我们都有一个家</a>\"借款标','1317907896');");
E_D("replace into `dw_user_trend` values('45','86',NULL,'成功发布了\"<a href=''/invest/a48.html'' target=''_blank''>阿来测试贷款。试贷</a>\"借款标','1320318426');");
E_D("replace into `dw_user_trend` values('46','86',NULL,'成功发布了\"<a href=''/invest/a49.html'' target=''_blank''>试试贷款一千块</a>\"借款标','1320328947');");
E_D("replace into `dw_user_trend` values('47','86',NULL,'成功发布了\"<a href=''/invest/a50.html'' target=''_blank''>再跟大家借一千二百块。刚刚考驾驶证差一点钱。</a>\"借款标','1320386606');");
E_D("replace into `dw_user_trend` values('48','86',NULL,'成功发布了\"<a href=''/invest/a51.html'' target=''_blank''>老婆要生了，借点钱准备奶粉先。</a>\"借款标','1320502991');");
E_D("replace into `dw_user_trend` values('49','90',NULL,'成功发布了\"<a href=''/invest/a52.html'' target=''_blank''>谢谢来总给我这个机会。我会按时还大家的。</a>\"借款标','1320555145');");
E_D("replace into `dw_user_trend` values('50','92',NULL,'成功发布了\"<a href=''/invest/a53.html'' target=''_blank''>秒还。有借有还上等人</a>\"借款标','1320555722');");
E_D("replace into `dw_user_trend` values('51','94',NULL,'成功发布了\"<a href=''/invest/a55.html'' target=''_blank''>额度只有一千块，只借一千块。</a>\"借款标','1320811013');");
E_D("replace into `dw_user_trend` values('52','95',NULL,'成功发布了\"<a href=''/invest/a56.html'' target=''_blank''>站内借款不提现，信得过单位</a>\"借款标','1320811519');");
E_D("replace into `dw_user_trend` values('53','96',NULL,'成功发布了\"<a href=''/invest/a57.html'' target=''_blank''>网店急速发展，需资金支持</a>\"借款标','1320812180');");
E_D("replace into `dw_user_trend` values('54','97',NULL,'成功发布了\"<a href=''/invest/a58.html'' target=''_blank''>最后工厂需要进点货，差几千块，只有二千的额度</a>\"借款标','1320813022');");
E_D("replace into `dw_user_trend` values('55','98',NULL,'成功发布了\"<a href=''/invest/a59.html'' target=''_blank''>初来,请大家多多指教.</a>\"借款标','1320896503');");
E_D("replace into `dw_user_trend` values('56','99',NULL,'成功发布了\"<a href=''/invest/a60.html'' target=''_blank''>额度太低，刷一刷吧。不秒还！</a>\"借款标','1320897344');");
E_D("replace into `dw_user_trend` values('57','88',NULL,'成功发布了\"<a href=''/invest/a61.html'' target=''_blank''>秒还,试贷标.大家多多支持啊.</a>\"借款标','1320897601');");
E_D("replace into `dw_user_trend` values('58','102',NULL,'成功发布了\"<a href=''/invest/a62.html'' target=''_blank''>生意上资金周转，借点钱来用用</a>\"借款标','1321003476');");
E_D("replace into `dw_user_trend` values('59','99',NULL,'成功发布了\"<a href=''/invest/a63.html'' target=''_blank''>短期周转</a>\"借款标','1321108410');");
E_D("replace into `dw_user_trend` values('60','100',NULL,'成功发布了\"<a href=''/invest/a64.html'' target=''_blank''>欠阿来千外银，得了</a>\"借款标','1321435650');");

require("../../inc/footer.php");
?>