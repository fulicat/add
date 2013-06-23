INSERT INTO `dw_user` (`user_id`, `type_id`, `purview`, `username`, `password`, `paypassword`, `invite_userid`, `invite_money`, `real_status`, `card_type`, `card_id`, `card_pic1`, `card_pic2`, `nation`, `realname`, `integral`, `status`, `isvip`, `vip_time`, `avatar_status`, `email_status`, `phone_status`, `video_status`, `scene_status`, `email`, `sex`, `litpic`, `tel`, `phone`, `qq`, `question`, `answer`, `birthday`, `province`, `city`, `area`, `address`, `remind`, `privacy`, `logintime`, `addtime`, `addip`, `uptime`, `upip`, `lasttime`, `lastip`) VALUES
(1, 1, '', 'ahui', 'e10adc3949ba59abbe56e057f20f883e', '', 0, '0', 0, '', '', '', '', '', '阿辉', 0, 1, 0, '', 0, '0', '0', 0, 0, 'lingyun654@sina.com', '0', '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '1282310605', '127.0.0.1', '1282310605', '127.0.0.1', '1282310605', '127.0.0.1'),
(2, 1, '', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', 0, '0', 0, '', '', '', '', '', '管理员', 0, 1, 0, '', 0, '0', '0', 0, 0, 'admin@admin.com', '0', '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '1282310605', '127.0.0.1', '1282310605', '127.0.0.1', '1282310605', '127.0.0.1');



INSERT INTO `dw_user_type` (`type_id`, `name`, `purview`, `order`, `status`, `type`, `summary`, `remark`, `addtime`, `addip`) VALUES
(1, '超级管理员', 'other_all', '10', 1, 1, '超级管理员', '超级管理员,此类型不能删除', '1281739540', '127.0.0.1'),
(2, '普通用户', '', '10', 1, 2, '', '', '1282288492', '127.0.0.1');
