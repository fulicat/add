<?

if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问

require_once(ROOT_PATH.'plugins/editor/ubbeditor/ubb.class.php');//Ubb编辑器

require_once 'dwbbs.class.php';

//论坛的设置
$_G['bbs_setting'] = dwbbsClass::ActionSettings(array("action"=>"lists"));

//论坛的缓存

$_G['bbs_cache_result'] = dwbbsClass::GetBbsCache();

if ($_G['system']['con_rewrite']==true){
	$html_t = "/bbs/index.html?";	
}else{
	$html_t = "?bbs&";
}

$q = isset($_REQUEST['q'])?$_REQUEST['q']:"";

//所有帖子处理
if ( $q == "postmanager"){
	$data['id'] = $_REQUEST['tid'];
	if(empty($_REQUEST['tid'])){
		$data['id'] = $_REQUEST['postid'];
		$_G['bbs_post_result'] = dwbbsClass::GetPostsOne($data);
	}else{
		$_G['bbs_post_result'] = dwbbsClass::GetTopicsOne($data);
	}
	if($_REQUEST['action'] == "movePost"){
		$result = dwbbsClass::ActionForum();
		if ($result !=false){
			$_result = "";
			foreach ($result as $key => $value){
				if ($value['pid']==0){
					$_result .= "<optgroup label='{$value['name']}'></optgroup>";
				}else{
					$_result .= "<option value='{$value['id']}'>{$value['aname']}</option>";
				}
			}
			$magic->assign("_result",$_result);
		}
	}
	
	
	$template  = "bbs_postmanager.html";
	$magic->assign("_G",$_G);
	$magic->display($template);
	exit;
}

//主题管理
elseif ( $q == "topicsmanager"){
	$data['reason'] = $_POST['reason'];
	$data['tid'] = $_POST['tid'] ;
	$data['postid'] = $_POST['postid'] ;
	$data['fid'] = $_POST['fid'] ;
	$data['action'] = $_REQUEST['action'] ;
	$data['value'] = isset($_POST['value'])?$_POST['value']:"";
	
	if(!empty($data['tid'])){
		$topic_result =  dwbbsClass::GetTopicsOne(array("id"=>$data['tid']));
		if($topic_result == false){
			exit("帖子不存在。");
		}
	}
	if ($data['action'] == "highlightPost"){
		$data['highlight']['fontC'] = isset($_POST['highlightfontC'])?$_POST['highlightfontC']:"";
		$data['highlight']['fontB'] =isset($_POST['highlightfontB'])?intval($_POST['highlightfontB']):"";
		$data['highlight']['fontI'] =isset($_POST['highlightfontI'])?intval($_POST['highlightfontI']):"";
		$data['highlight']['fontU'] =isset($_POST['highlightfontU'])?intval($_POST['highlightfontU']):"";
	}
	
	
	$result = dwbbsClass::ActionTopics($data);
	if ($result===true){
		exit('_Y_');
	}
	exit($result);

}

//版块添加和修改
elseif ( $q == "post" || $q == "edit"){
	
	$fid = isset($_REQUEST['fid'])?$_REQUEST['fid']:"";
	if ($q == "edit"){
		$tid = $_REQUEST['tid'];
		$data['id'] = $tid;
		$_G['bbs_topics_result'] = dwbbsClass::GetTopicsOne($data);
		$fid = $_G['bbs_topics_result']['fid'];
	}
	if ($_G['user_id']==""){
		echo "<script>location.href='/index.php?user'</script>";
	}
	if ($_G['user_result']['real_status']==0){
		$_G['bbs_msg_title'] = "您还没有经过实名认证,请先认证后再发帖或回复";
		$_G['bbs_msg_content'] = "<a href='/index.php?user&q=code/user/realname' >马上实名认证</a>";
		$template  = "bbs_msg.html";
	}elseif (isset($_POST['name']) && $_POST['name']!=""){
		$var = array("fid","name","content");
		$data = post_var($var);
		if ($q == "post" ){
			$data['username']  = $_G['user_result']['username'];
			$data['last_replytime'] = time();
			$data['last_replyuser'] =  $_G['user_id'];
			$data['last_replyusername'] =  $_G['user_result']['username'];
			$tid = dwbbsClass::AddTopics($data);
			$tname = "发布";
		}else{
			$tid = $_POST['tid'];
			$data['id'] =$tid;
			dwbbsClass::UpdateTopics($data);
			$tname = "编辑";
		}
		if ($tid>0){
			$_G['bbs_msg_title'] = "帖子{$tname}成功。";
			$_G['bbs_msg_content'] = '<img src="'.$_G['tpldir'].'/images/bbs_ico_msgp1.gif" border="0" align="absmiddle" alt="" /> <a href="'.$html_t.'q=forums&fid='.$data["fid"].'"><u>返回帖子列表</u></a><br /><img src="'.$_G['tpldir'].'/images/bbs_ico_msgp1.gif" border="0" align="absmiddle" alt="" /> <a href="'.$html_t.'q=view&tid='.$tid.'"><u>查看'.$tname.'成功的帖子</u></a>';
		}else{
			$_G['bbs_msg_title'] = "帖子{$tname}失败。";
			$_G['bbs_msg_content'] = "<a href='#' onclick='javascript:history.go(-1)'>返回</a>";
		}
		$template  = "bbs_msg.html";
	}else{
		//取得当前版块的信息
		$data['id'] = $fid;
		$data['action'] = "view";
		$_G['bbs_forum_result'] = dwbbsClass::ActionForum($data);
		$template  = "bbs_post.html";
	}
}


//主题查看和回复
elseif ($q == "view"){
	$tid =$_REQUEST['tid'];
	$result = dwbbsClass::GetTopicsOne(array("id"=>$tid));
	$fid = $result['fid'];
	$data['id'] = $result['fid'];
	$data['action'] = "view";
	$_G['bbs_forum_result'] = dwbbsClass::ActionForum($data);
	if($result['islock']==1 && !dwbbsClass::isForumAdmin(array("fid"=>$result['fid']))){
		$_G['msg'] = array("此帖子已关闭或者已经删除","<a href='/bbs/index.html'>返回论坛首页</a>");
	}else{
		if (isset($_POST['content']) && $_POST['content']!=""){
			if ($_G['user_id']==""){
				$_G['msg'] = array("你还没有登录，请先登录","<a href='/index.php?user&q=action/login'>返回登录页面</a>");
			}else{	
				$post['name'] = isset($_POST['name'])?$_POST['name']:"RE:{$result['name']}";
				$post['content'] = $_POST['content'];
				$post['istopic']=0;
				$post['user_id'] = $_G['user_id'];
				$post['username'] = $_G['user_result']['username'];
				$post['tid'] = $tid;
				$post['fid'] = $fid;
				$post['isverify'] = $_G['bbs_forum_result']['isverify']==1?1:0;
				$result = dwbbsClass::AddPosts($post);
				$_G['msg'] = array("您已成功回复了帖子",'<img src="'.$_G['tpldir'].'/images/bbs_ico_msgp1.gif" border="0" align="absmiddle" alt="" /> <a href="'.$html_t.'q=forums&fid='.$fid.'"><u>返回帖子列表</u></a><br /><img src="'.$_G['tpldir'].'/images/bbs_ico_msgp1.gif" border="0" align="absmiddle" alt="" /> <a href="'.$html_t.'q=view&tid='.$tid.'"><u>返回查看帖子</u></a>');
			}
		}else{
			$_G['bbs_topics_result'] = dwbbsClass::GetTopicsOne(array("id"=>$tid,"click"=>true));
			if (isset($_G['bbs_forum_result']) && $_G['bbs_forum_result']['pid']!=0){
				$data['id'] = $_G['bbs_forum_result']['pid'];
				$_G['bbs_forum_presult'] = dwbbsClass::ActionForum($data);
			}
			$template  = "bbs_view.html";
		}
	}
}

//主题回复
elseif ($q == "reply"){
	$tid = isset($_REQUEST['tid'])?$_REQUEST['tid']:"";
	if ($tid==""){
		$postid = isset($_REQUEST['postid'])?$_REQUEST['postid']:"";
		$_G['bbs_posts_result'] = dwbbsClass::GetPostsOne(array("id"=>$postid));
		$tid = $_G['bbs_posts_result']['tid'];
	}
	$_G['bbs_topics_result'] = dwbbsClass::GetTopicsOne(array("id"=>$tid));
	$fid = $_G['bbs_topics_result']['fid'];
	
	if (isset($_POST['pid']) && $_POST['pid']!=""){
		$var = array("name","content");
		$data = post_var($var);
		$data['id'] =$_POST['pid'];
		dwbbsClass::UpdatePosts($data);
		$_G['msg'] = array("您已成功修改了帖子",'<img src="'.$_G['tpldir'].'/images/bbs_ico_msgp1.gif" border="0" align="absmiddle" alt="" /> <a href="/bbs/index.html?q=forums&fid='.$fid.'"><u>返回帖子列表</u></a><br /><img src="'.$_G['tpldir'].'/images/bbs_ico_msgp1.gif" border="0" align="absmiddle" alt="" /> <a href="/bbs/index.html?q=view&tid='.$tid.'"><u>返回查看帖子</u></a>');
	
	}else{
		$data['id'] = $_G['bbs_topics_result']['fid'];
		$data['action'] = "view";
		$_G['bbs_forum_result'] = dwbbsClass::ActionForum($data);
		if (isset($_REQUEST['action'])){
			if ($_REQUEST['action'] == "quote"){
				$_G['reply_content'] = "[quote]{$_G['bbs_topics_result']['content']}
	[color=#999999]{$_G['bbs_topics_result']['username']} 发表于 ".date("Y-m-d",$_G['bbs_topics_result']['addtime'])." [/color][/quote]

";
			}elseif($_REQUEST['action'] == "reply"){
				$_G['reply_content'] = "[color=#333333][b]回复 #{$_REQUEST['f']} [i]{$_G['bbs_topics_result']['username']}[/i][/b][/color]\n\r\n\r";
			}
		
		}
		
		$template  = "bbs_reply.html";
	}

}

else{

	//版块列表页
	if (isset($_REQUEST['fid']) && $_REQUEST['fid']>0){
		$fid = $_REQUEST['fid'];
		$data['id'] = $fid;
		//取得当前版块的信息
		$data['action'] = "view";
		$_G['bbs_forum_result'] = dwbbsClass::ActionForum($data);
		if ($_G['bbs_forum_result']!=false){
			if ( $_G['bbs_forum_result']['pid']!=0){
				$data['id'] = $_G['bbs_forum_result']['pid'];
				$_G['bbs_forum_presult'] = dwbbsClass::ActionForum($data);
			}
		
			//获得子版块
			$_G['bbs_forum_sublist'] = dwbbsClass::GetForumSub(array("fid"=>$fid));
			
			$template  = "bbs_forum.html";
		}else{
			$_G['msg'] = array("请不要乱做操作","返回首页","/bbs/index.html");
		}
	}
	
	
	
	
	
	else{
		$_G['bbs_forum_list'] = dwbbsClass::ActionForum(array("action"=>"menu"));
		$template  = "bbs_list.html";
	}
}

if (!isset($template) ){
	$template = "bbs_msg.html";
}
?>