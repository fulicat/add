CREATE TABLE IF NOT EXISTS `{bbs_credits}` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `creditscode` varchar(45) default NULL,
  `creditsname` varchar(45) default NULL,
  `postvar` int(11) default '0',
  `replyvar` int(11) default '0',
  `goodvar` int(11) default '0',
  `uploadvar` int(11) default '0',
  `downvar` int(11) default '0',
  `votevar` int(11) default '0',
  `isuse` tinyint(1) unsigned default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  ;


CREATE TABLE IF NOT EXISTS `{bbs_dirtywords}` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `word` varchar(45) default NULL,
  `replaceto` varchar(45) default NULL,
  `type` tinyint(3) unsigned default '0',
  `doaction` tinyint(1) unsigned default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  ;


CREATE TABLE IF NOT EXISTS `{bbs_forums}` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned default NULL,
  `name` varchar(45) default NULL,
  `content` varchar(200) default NULL,
  `rules` varchar(1000) default NULL,
  `picurl` varchar(100) default NULL,
  `admins` varchar(255) default NULL,
  `today_num` int(10) unsigned default '0',
  `topics_num` int(10) unsigned default '0',
  `posts_num` int(10) unsigned default '0',
  `last_postname` varchar(45) default NULL,
  `last_postuser` varchar(45) default NULL,
  `last_postusername` varchar(30) default NULL,
  `last_posttime` int(10) unsigned default '0',
  `last_postid` int(10) unsigned default '0',
  `isverify` tinyint(1) unsigned default '0',
  `forumpass` varchar(45) default NULL,
  `forumusers` text,
  `forumgroups` varchar(1000) default NULL,
  `showtype` tinyint(1) unsigned default '0',
  `ishidden` tinyint(1) unsigned default '0',
  `order` int(10) unsigned default NULL,
  `keywords` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM   ;

CREATE TABLE IF NOT EXISTS `{bbs_posts}` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tid` int(10) unsigned default NULL,
  `istopic` tinyint(1) unsigned default '0',
  `fid` int(10) unsigned default '0',
  `user_id` int(10) unsigned default '0',
  `username` varchar(45) default NULL,
  `name` varchar(100) default NULL,
  `content` text,
  `edittime` int(10) unsigned default '0',
  `iscover` tinyint(1) unsigned default '0',
  `isverify` int(1) unsigned default '0',
  `verifydesc` varchar(255) default NULL,
  `addtime` varchar(11) default NULL,
  `addip` varchar(15) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM ;


CREATE TABLE IF NOT EXISTS `{bbs_reward}` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tid` int(10) unsigned default '0',
  `userid` int(10) unsigned default '0',
  `bestid` int(10) unsigned default '0',
  `reward` int(10) unsigned default '0',
  `rewardcredits` varchar(8) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM ;


CREATE TABLE IF NOT EXISTS `{bbs_settings}` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(30) default NULL,
  `nid` varchar(50) default NULL,
  `value` varchar(250) default NULL,
  `type` int(11) default '0',
  `style` int(2) default NULL,
  `status` varchar(30) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM   ;



CREATE TABLE IF NOT EXISTS `{bbs_topics}` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `fid` int(10) unsigned default '0',
  `user_id` int(10) unsigned default '0',
  `status` int(11) NOT NULL default '0',
  `username` varchar(45) default NULL,
  `name` varchar(45) default NULL,
  `content` text,
  `posttime` int(10) unsigned default '0',
  `edittime` int(10) unsigned default '0',
  `ordertime` int(10) unsigned default '0',
  `last_replytime` varchar(30) default NULL,
  `last_replyuser` int(11) default NULL,
  `last_replyusername` varchar(30) default NULL,
  `type` tinyint(1) unsigned default '0',
  `posts_num` int(10) unsigned default '0',
  `hits` int(10) unsigned default '0',
  `islock` tinyint(1) unsigned default '0',
  `isgood` tinyint(1) unsigned default '0',
  `istop` tinyint(1) unsigned default '0',
  `isalltop` tinyint(1) unsigned default '0',
  `stamp` tinyint(1) unsigned default '0',
  `isrecycle` tinyint(1) unsigned default '0',
  `credit` int(11) default NULL,
  `verifystate` tinyint(1) unsigned default '0',
  `verifydesc` varchar(255) default NULL,
  `isresolved` tinyint(1) unsigned default '0',
  `attachicon` varchar(45) default NULL,
  `highlight` varchar(20) default NULL,
  `addtime` varchar(50) default NULL,
  `addip` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  ;
INSERT INTO `{bbs_settings}` (`id`, `name`, `nid`, `value`, `type`, `style`, `status`) VALUES
(1, '论坛名称', 'webname', '', 0, 1, '1');
INSERT INTO `{bbs_credits}` VALUES
(1, 'credits1', '金钱', 5, 1, 10, 1, 0, 1, 1),
(2, 'credits2', '魅力', 3, 1, 10, 1, 2, 1, 1),
(3, 'credits3', '威望', 4, 1, 10, 1, 2, 1, 1),
(4, 'credits4', '', 0, 0, 0, 0, 0, 0, 0),
(5, 'credits5', '', 0, 0, 0, 0, 0, 0, 0),
(6, 'credits6', '', 0, 0, 0, 0, 0, 0, 0),
(7, 'credits7', '', 0, 0, 0, 0, 0, 0, 1),
(8, 'credits8', '', 0, 0, 0, 0, 0, 0, 0);