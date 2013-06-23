<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
check_rank("home_".$_A['query_type']);//检查权限

include_once("home.class.php");

$_A['list_purview'] =  array("home"=>array("房租管理"=>array("home_list"=>"列表","home_new"=>"添加","home_edit"=>"编辑","home_del"=>"删除")));//权限
$_A['list_name'] = $_A['module_result']['name'];
$_A['list_menu'] = "<a href='{$_A['query_url']}{$_A['site_url']}'>列表</a> - <a href='{$_A['query_url']}/new{$_A['site_url']}'>添加</a>";


/**
 * 如果类型为空的话则显示所有的文件列表
**/
if ($_A['query_type'] == "list"){
	$_A['list_title'] = "列表";
	
	if (isset($_REQUEST['user_id'])){
		$data['user_id'] = $_REQUEST['user_id'];
	}
	if (isset($_REQUEST['username'])){
		$data['username'] = $_REQUEST['username'];
	}
	if (isset($_REQUEST['site_id'])){
		$data['site_id'] = $_REQUEST['site_id'];
	}
	if (isset($_REQUEST['status'])){
		$data['status'] = $_REQUEST['status'];
	}
	
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$result = homeClass::GetList($data);
	
	if (is_array($result)){
		$pages->set_data($result);
		$_A['home_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	
	}else{
		$msg = array($result);
	}
}

	
/**
 * 添加
**/
elseif ($_A['query_type'] == "new" || $_A['query_type'] == "edit" ){
	if ($_A['query_type'] == "new"){
		$_A['list_title'] = "添加";
	}else{
		$_A['list_title'] = "修改";
	}
	$_A['site_list'] = siteClass::GetList(array("code"=>"home"));
	if (isset($_POST['type_id'])){
		$var = array("name","user_id","site_id","name","status","order","hits","litpic","flag","source","publish","xiaoqu","shi","ting","wei","louceng","zonglouceng","loupan","zhucegongsi","mianji","mianji1","mianji2","leixing","zhuangxiu","chaoxiang","zujin","jiage","jiage1","jiage2","jiageleixing","lishijingying","jibenqingkuang","diduan","diduan","diduan1","diduan2","fukuan","linjin","peizhi","tupian","content","lianxiren","dianhua","qq","province","city","area");
		$data = post_var($var);

	
		if ($_A['query_type'] == "new"){
			$result = homeClass::Add($data);
		}else{
			$data['id'] = $_POST['id'];
			$result = homeClass::Update($data);
		}
		
		if ($result !== true){
			$msg = array($result);
		}else{
			$msg = array("操作成功");
		}
		$user->add_log($_log,$result);//记录操作
	}elseif ($_A['query_type'] == "edit" ){
		
		$_A['home_type_list'] = homeClass::GetTypeList(array("limit"=>"all"));
		
		$data['id'] = $_REQUEST['id'];
		$result = homeClass::GetOne($data);
		if (is_array($result)){
			$_A['home_result'] = $result;
		}else{
			$msg = array($result);
		}
		
		
	}
}

/**
 * 查看
**/
elseif ($_A['query_type'] == "view"){
	$_A['list_title'] = "查看";
	$data['id'] = $_REQUEST['id'];
	$_A['home_result'] = homeClass::GetOne($data);
	
}


/**
 * 删除
**/
elseif ($_A['query_type'] == "del"){
	$data['id'] = $_REQUEST['id'];
	$result = homeClass::Delete($data);
	if ($result !== true){
		$msg = array($result);
	}else{
		$msg = array("删除成功");
	}
	$user->add_log($_log,$result);//记录操作
}

//防止乱操作
else{
	$msg = array("输入有误，请不要乱操作","",$url);
}
?>