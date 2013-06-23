<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
check_rank("lianmeng_".$_t);//检查权限

require_once 'lianmeng.class.php';


$_A['list_purview'] = array("lianmeng"=>array("联盟成员"=>array("lianmeng_list"=>"成员列表","lianmeng_new"=>"添加成员","lianmeng_del"=>"删除成员")));//权限
$_A['list_name'] = $_A['module_result']['name'];
$_A['list_menu'] = "<a href='{$_A['query_url']}/new{$_A['site_url']}'>添加成员</a> - <a href='{$_A['query_url']}{$_A['site_url']}'>联盟成员列表</a> ";


/**
 * 如果类型为空的话则显示所有的文件列表
**/
if ($_A['query_type'] == "list"){
	$_A['list_title'] = "列表";
	//修改状态
	if (isset($_REQUEST['id']) && isset($_REQUEST['status'])){
		$sql = "update {lianmeng} set status='".$_REQUEST['status']."' where id = ".$_REQUEST['id'];
		$mysql->db_query($sql);	
	}
	
	if (isset($_REQUEST['user_id'])){
		$data['user_id'] = $_REQUEST['user_id'];
	}
	
	if (isset($_REQUEST['keywords'])){
		$data['keywords'] = $_REQUEST['keywords'];
	}
	if(isset($_REQUEST['site_id'])){
		$data['site_id'] = $_REQUEST['site_id'];
	}
	
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$result = lianmengClass::GetList($data);
	
	if (is_array($result)){
		$pages->set_data($result);
		$_A['lianmeng_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	
	}else{
		$msg = array($result);
	}
}

/**
 * 添加
**/
elseif ($_A['query_type'] == "new"  || $_A['query_type'] == "edit" || $_A['query_type'] == "view" ){
	
	$_A['list_title'] = "联盟管理";
	
	if (isset($_POST['name'])){
		$var = array("name","order","status","flag","litpic","clearlitpic","school","xuanyan","intime","province","city","area");
		$data = post_var($var);
		
		if ($_A['query_type'] == "new"){
			$result = lianmengClass::Add($data);
		}else{
			$data['id'] = $_REQUEST['id'];
			$result = lianmengClass::Update($data);
		}
		
		if ($result !== true){
			$msg = array($result);
		}else{
			$msg = array("操作成功");
		}
		$user->add_log($_log,$result);//记录操作
	}
	
	elseif ($_A['query_type'] == "edit" || $_A['query_type'] == "view" ){
		$data['id'] = $_REQUEST['id'];
		$result = lianmengClass::GetOne($data);
		if (is_array($result)){
			$_A['lianmeng_result'] = $result;
			
		}else{
			$msg = array($result);
		}
		
	}
	
}			

	
/**
 * 删除
**/
elseif ($_A['query_type'] == "del"){
	$data['id'] = $_REQUEST['id'];
	$result = lianmengClass::Delete($data);
	if ($result !== true){
		$msg = array($result);
	}else{
		$msg = array("删除成功");
	}
	$user->add_log($_log,$result);//记录操作
}


/**
 * 如果类型为空的话则显示所有的文件列表
**/
elseif ($_A['query_type'] == "lian"){
	$_A['list_title'] = "联盟列表";
	
	
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$result = lianmengClass::GetUnioList($data);
	
	if (is_array($result)){
		$pages->set_data($result);
		$_A['lianmeng_unio_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	
	}else{
		$msg = array($result);
	}
}	
?>