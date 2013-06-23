<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
check_rank("invite_".$_A['query_type']);//检查权限

	

require_once 'invite.class.php';


$_A['list_purview'] = array("invite"=>array("人才招聘"=>array("invite_list"=>"招聘列表","invite_new"=>"添加招聘","invite_del"=>"删除招聘","invite_type"=>"招聘类型")));//权限
$_A['list_name'] = $_A['module_result']['name'];
$_A['list_menu'] = "<a href='{$_A['query_url']}/new{$_A['site_url']}'>添加招聘</a> - <a href='{$_A['query_url']}{$_A['site_url']}'>招聘列表</a>  - <a href='{$_A['query_url']}/type{$_A['site_url']}'>招聘部门</a> ";

/**
 * 如果类型为空的话则显示所有的文件列表
**/
if ($_A['query_type'] == "list"){
	$_A['list_title'] = "列表";
	//修改状态
	if (isset($_REQUEST['id']) && isset($_REQUEST['status'])){
		$sql = "update {invite} set status='".$_REQUEST['status']."' where id = ".$_REQUEST['id'];
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
	$result = inviteClass::GetList($data);
	
	if (is_array($result)){
		$pages->set_data($result);
		$_A['invite_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	
	}else{
		$msg = array($result);
	}
}

/**
 * 添加
**/
elseif ($_A['query_type'] == "new"  || $_A['query_type'] == "edit" || $_A['query_type'] == "view" ){	
	$_A['list_title'] = "招聘管理";
	
	$_A['invite_type_list'] = inviteClass::GetTypeList();
	
	if (isset($_POST['name'])){
		$var = array("type_id","status","order","flag","name","province","city","area","num","description","demand");
		$data = post_var($var);
		
		if ($_A['query_type'] == "new"){
			$result = inviteClass::Add($data);
		}else{
			$data['id'] = $_REQUEST['id'];
			$result = inviteClass::Update($data);
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
		$result = inviteClass::GetOne($data);
		if (is_array($result)){
			$_A['invite_result'] = $result;
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
	$result = inviteClass::Delete($data);
	if ($result !== true){
		$msg = array($result);
	}else{
		$msg = array("删除成功");
	}
	$user->add_log($_log,$result);//记录操作
}

/**
 * 类型
**/
elseif ($_A['query_type']  == "type"){
	if (isset($_REQUEST['del_id'])){
		if ($_REQUEST['del_id'] !=1){
			$mysql->db_delete("invite_type","id=".$_REQUEST['del_id']);
			$msg = array("删除成功");
		}else{
			$msg = array("类型ID1为系统类型，不能删除");
		}
	}elseif (!isset($_POST['submit'])){
		$result = $mysql->db_selects("invite_type");
		$magic->assign("result",$result);
		$_A['invite_list'] = inviteClass::GetTypeList();
	}else{
		if (isset($_POST['id'])){
			foreach ($_POST['id'] as $key => $val){
				$mysql->db_query("update {invite_type} set typename='".$_POST['typename'][$key]."' where id=".$val);
			}
		}
		if ($_POST['typename1']!=""){
			$index['typename'] = $_POST['typename1'];
			$mysql->db_add("invite_type",$index,"notime");
		}
		$msg = array("类型操作成功","",$_A['query_url']."/type");
	}
}
?>