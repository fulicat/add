<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
check_rank("blog_".$_A['query_type']);//检查权限

include_once("blog.class.php");

$_A['list_purview'] =  array("blog"=>array("博客管理"=>array("blog_list"=>"博客列表","blog_view"=>"博客查看","blog_del"=>"删除博客","blog_type"=>"博客类型管理","blog_type_del"=>"博客类型删除")));//权限
$_A['list_name'] = $_A['module_result']['name'];
$_A['list_menu'] = "<a href='{$_A['query_url']}/{$_A['site_url']}'>博客列表</a> - <a href='{$_A['query_url']}{$_A['site_url']}'>博客所有类型</a> ";
$_A['list_table'] = "";

/**
 * 如果类型为空的话则显示所有的列表
**/
if ($_A['query_type'] == "list"){
	$_A['list_title'] = "博客列表";
	//修改状态
	if (isset($_REQUEST['id']) && isset($_REQUEST['status'])){
		$sql = "update {blog} set status='".$_REQUEST['status']."' where id = ".$_REQUEST['id'];
		$mysql->db_query($sql);	
	}
	
	if (isset($_REQUEST['keywords']) && $_REQUEST['keywords']!=""){
		$data['name'] = $_REQUEST['keywords'];
	}
		
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$data['flag_list'] = $_A['flag_list'];
	
	$result = blogClass::GetList($data);
	if (is_array($result)){
		$pages->set_data($result);
		$_A['blog_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	}else{
		$msg = array($result);
	}
}

/**
 * 查看
**/
elseif ($_A['query_type'] == "view"){
	$_A['blog_result'] = blogClass::GetOne(array("id"=>$_REQUEST['id']));
}
	
	
/**
 * 删除
**/
elseif ($_A['query_type'] == "del"){
	$id = $_REQUEST['id'];
	$result = blogClass::Delete(array("id"=>$id));
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



/**
 * 如果类型为空的话则显示所有的列表
**/
if ($_A['query_type'] == "type"){
	$_A['list_title'] = "博客类型列表";
	
	if (isset($_REQUEST['keywords']) && $_REQUEST['keywords']!=""){
		$data['name'] = $_REQUEST['keywords'];
	}
		
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$data['flag_list'] = $_A['flag_list'];
	
	$result = blogClass::GetTypeList($data);
	if (is_array($result)){
		$pages->set_data($result);
		$_A['blog_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	}else{
		$msg = array($result);
	}
}

?>