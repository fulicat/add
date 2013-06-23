<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
check_rank("borrowunion_".$_A['query_type']);//检查权限

include_once("borrowunion.class.php");

$_A['list_purview'] =  array("borrowunion"=>array("融贷联盟"=>array("borrowunion_list"=>"联盟列表","borrowunion_new"=>"添加机构","borrowunion_edit"=>"编辑机构","borrowunion_del"=>"删除机构","borrowunion_view"=>"审核机构")));//权限
$_A['list_name'] = $_A['module_result']['name'];
$_A['list_menu'] = "<a href='{$_A['query_url']}{$_A['site_url']}'>联盟列表</a>";


/**
 * 如果类型为空的话则显示所有的文件列表
**/
if ($_A['query_type'] == "list"){
	$_A['list_title'] = "联盟列表";
	
	if (isset($_REQUEST['user_id'])){
		$data['user_id'] = $_REQUEST['user_id'];
	}
	
	if (isset($_REQUEST['username'])){
		$data['username'] = $_REQUEST['username'];
	}
	
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$result = borrowunionClass::GetList($data);
	
	if (is_array($result)){
		$pages->set_data($result);
		$_A['borrowunion_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	
	}else{
		$msg = array($result);
	}
}



/**
 * 添加
**/
elseif ($_A['query_type'] == "edit" ){
	
	$_A['list_title'] = "管理信息";
	
	if (isset($_POST['name'])){
		$var = array("user_id","name","status","range","content");
		$data = post_var($var);
		if (isset($_POST['status'])){
			$data['verify_time'] = time();
			$data['status'] = $_POST['status'];
			$data['verify_remark'] = nl2br($_POST['verify_remark']);
		}
		$result = borrowunionClass::Action($data);
		
		
		if ($result !== true){
			$msg = array($result);
		}else{
			$msg = array("操作成功","",$_A['query_url']);
		}
		$user->add_log($_log,$result);//记录操作
	}
	
	elseif ($_A['query_type'] == "edit" ){
		$data['user_id'] = $_REQUEST['user_id'];
		$data['id'] = $_REQUEST['id'];
		$result = borrowunionClass::GetOne($data);
		
		if (is_array($result)){
			$_A['borrowunion_result'] = $result;
		}else{
			$msg = array($result);
		}
		
	}

	
	elseif(isset($_REQUEST['user_id']) && !isset($_POST['username'])){
		$data['user_id'] = $_REQUEST['user_id'];
		$result = userClass::GetOne($data);
		if ($result==false){
			$msg = array("您的输入有误","",$_A['query_url']);
		}else{
			$_A['user_result'] = $result;
			//$result = borrowunionClass::GetOne($data);
			//$_A['borrowunion_result'] = $result;
		}
		
	}
	
}	

/**
 * 查看
**/
elseif ($_A['query_type'] == "view"){
	$_A['list_title'] = "查看认证";
	if (isset($_POST['id'])){
		$var = array("id","status","verify_remark");
		$data = post_var($var);
		
		$data['verify_user'] = $_G['user_id'];
		$data['verify_time'] = time();
		$result = borrowunionClass::Verify($data);
		
		if ($result ==false){
			$msg = array($result);
		}else{
			$msg = array("操作成功");
		}
		$user->add_log($_log,$result);//记录操作
	}else{
		$data['id'] = $_REQUEST['id'];
		$data['user_id'] = $_REQUEST['user_id'];
		$_A['borrowunion_result'] = borrowunionClass::GetOne($data);
	}
}


/**
 * 删除
**/
elseif ($_A['query_type'] == "del"){
	$data['id'] = $_REQUEST['id'];
	$result = borrowunionClass::Delete($data);
	if ($result !== true){
		$msg = array($result);
	}else{
		$msg = array("删除成功");
	}
	$user->add_log($_log,$result);//记录操作
}




//防止乱操作
else{
	$msg = array("输入有误，请不要乱操作");
}
?>