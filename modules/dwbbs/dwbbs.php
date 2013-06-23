<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
check_rank("dwbbs_".$_A['query_type']);//检查权限

include_once("dwbbs.class.php");

$_A['list_purview'] =  array("dwbbs"=>array("论坛管理"=>array("dwbbs_forumall"=>"超级版主","dwbbs_forum"=>"版主")));//权限
$_A['list_name'] = "论坛管理";
$_A['list_menu'] = " ";

if ($_A['query_class']== "list"){
	$_A['query_class'] = "info";
}

/**
 * 系统基本信息设置
**/
if ( $_A['query_class']== "info" ){
	check_rank("bbs_info");//检查权限
	
	$_A['list_menu'] = "<a href='{$_A['query_url']}/list'>论坛参数 </a> | <a href='{$_A['query_url']}/credits'>论坛积分</a>";
	
	//论坛参数
	if ($_A['query_type'] == "list"){
		$_A['list_title'] = "论坛参数";
		if (isset($_POST['value'])){
			$data['value'] = $_POST['value'];
			$data['action'] = "updates";
			$data['style'] = "1";
			$result = dwbbsClass::ActionSettings($data);
			if ($result==true){
				$msg = array("操作成功");
			}else{
				$msg = array($result);
			}
		}
	}
	
	//积分
	elseif ($_A['query_type'] == "credits"){
		$_A['list_title'] = "论坛积分";
		if (isset($_POST['credit'])){
			$data['credit'] = $_POST['credit'];
			$data['action'] = "updates";
			$result = dwbbsClass::ActionCredits($data);
			if ($result==true){
				$msg = array("操作成功");
			}else{
				$msg = array($result);
			}
		}
	}
	
}


/**
 * 系统基本信息设置
**/
elseif ( $_A['query_class']== "forum" ){
	check_rank("bbs_info");//检查权限
	
	$_A['list_menu'] = "<a href='{$_A['query_url']}/list'>版块设置</a> | <a href='{$_A['query_url']}/credits'>版块合并</a>";
	
	//论坛参数
	if ($_A['query_type'] == "list"){
		$_A['list_title'] = "版块设置 ";
		if (isset($_POST['name'])){       
			$data['name'] = $_POST['name'];
			$data['order'] = $_POST['order'];
			$data['id'] = $_POST['id'];
			$data['action'] = "updates";
			$result = dwbbsClass::ActionForum($data);
			if ($result==true){
				$msg = array("操作成功");
			}else{
				$msg = array($result);
			}
		}
	}
	
	//添加或者修改
	elseif ($_A['query_type'] == "new" || $_A['query_type'] == "edit"){
		$_A['user_type_list'] = userClass::GetTypeList();
		
		if (isset($_POST['name'])){        
			$var = array("pid","name","content","rules","picurl","admins","isverify","showtype","ishidden","order","keywords","forumpass","forumusers","forumgroups");
			$data = post_var($var);
			if ($_A['query_type'] == "new" ){
				$data['action'] = "add";
			}else{
				$data['action'] = "update";
				$data['id'] = $_POST['id'];
			}
			$result = dwbbsClass::ActionForum($data);
			if ($result==true){
				$msg = array("操作成功","返回列表页",$_A['query_url']."/list");
			}else{
				$msg = array($result);
			}
		}
		if ($_A['query_type'] == "edit"){
			$data['id'] = $_REQUEST['id'];
			$data['action'] = "view";
			$_A['bbs_forum_result'] = dwbbsClass::ActionForum($data);
		}
	}
	
	//删除版块
	elseif ($_A['query_type'] == "del"){
		$data['fid'] = $_REQUEST['fid'];
		$data['action'] = "del";
		$result = dwbbsClass::ActionForum($data);
		if ($result==false){
			$msg = array("该版块存在子版块，不能删除");
		}else{
			$msg = array("删除成功");
		}
	}
	
	//设定版主
	elseif ($_A['query_type'] == "admins"){
		$fid = isset($_REQUEST['fid'])?$_REQUEST['fid']:"";
		if (empty($fid)) {
			$msg = array("你的输入有误");
		}else{
			if (isset($_POST['admins'])){
				$result = dwbbsClass::ActionForum(array("fid"=>$fid,"admins"=>$_POST['admins'],"action"=>"admins_add"));
				
				if ($result==""){
					$msg = array("操作成功");
				}else{
					$msg = array("用户".join(",",$result)."不存在");
				}		
			}else{
				$result = dwbbsClass::ActionForum(array("fid"=>$fid,"action"=>"admins_list"));
				if (!is_array($result)){
					$msg = array("操作有误，请勿乱操作","返回列表页",$_A['query_url']."/list");
				}else{
					$_A['admins_list'] = $result;
				}
			}
		}
	}	
	
	//版块合并
	elseif ($_A['query_type'] == "merge"){
		if(isset($_POST['fromfid'])){
			if ($_POST['fromfid']==$_POST['tofid']){
				$msg = array("源版块和目标版块不能一样");
			}else{
				$result = dwbbsClass::ActionForum(array("fromfid"=>$_POST['fromfid'],"tofid"=>$_POST['tofid'],"action"=>"merge"));
				if ($result!==true){
					$msg = array($result);
				}else{
					$msg = array("版块合并成功");
				}
			}
		}
	
	}
}

/**
 * 系统基本信息设置
**/
elseif ( $_A['query_class']== "topics" ){
	check_rank("bbs_topic");//检查权限
	//论坛参数
	if ($_A['query_type'] == "list"){
		$_A['list_title'] = "主题列表 ";
	}
	elseif ($_A['query_type'] == "verify"){
		if (isset($_POST['status'])){
			$data['status'] = $_POST['status'];
			$data['tid'] = $_POST['tid'];
			$result = dwbbsClass::UpdateTopicsStatus($data);
			if ($result==false){
				$msg = array("审核错误，请跟管理员联系");
			}else{
				$msg = array("审核成功","",$_A['query_url']);
			}
		}else{
			$_A['list_title'] = "帖子审核 ";
		}
	}
	elseif ($_A['query_type'] == "recycle"){
		$_A['list_title'] = "主题回收站 ";
	}
	
	//删除版块
	elseif ($_A['query_type'] == "del"){
		$data['tid'] = $_REQUEST['id'];
		$result = dwbbsClass::DeleteTopics($data);
		if ($result==false){
			$msg = array("删除错误，请跟管理员联系");
		}else{
			$msg = array("删除成功","",$_A['query_url']);
		}
	}
}


/**
 * 如果是其他模块则读取其他模块的配置文件
**/
else{
	if ($_A['query_class'] == "dwbbs"){
		echo "<script>location.href='{$_A['admin_url']}&q=bbs';</script>";
		exit;
	}
	if (!isset($msg) || $msg =="")	$msg = array("您输入有误");
}

if ($_A['query_class']!=""){
$magic->assign("template","dwbbs_".(empty($_A['query_class'])?'user':$_A['query_class']).".tpl");
}
$template = "admin_bbs.html";
?>
