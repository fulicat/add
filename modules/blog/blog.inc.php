<?php
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问

include_once("blog.class.php");



//企业简介
if ($_U['query_type']=="type"){
	if ((isset($_POST['aname']) && $_POST['aname']!="") || (isset($_POST['name']) && $_POST['name']!="")){
		$data['user_id'] = $_G['user_id'];
		$data['name'] = $_POST['name'];
		$result = blogClass::AddType($data);
		
		$_data['name'] = $_POST['aname'];
		$_data['order'] = $_POST['order'];
		$_data['id'] = $_POST['id'];
		$result = blogClass::ActionType($_data);
		$msg = array("信息修改成功","",$_U['query_url']."/type");
		
	}else{
		$data['user_id'] = $_G['user_id'];
		$_U['blog_result'] = blogClass::GetOne($data);
	}
	

}

elseif ($_U['query_type']=="type_del"){
	$data['id'] = $_REQUEST['id'];
	$data['user_id'] = $_G['user_id'];
	$result = blogClass::DeleteType($data);
	if ($result===true){
		$msg = array("删除类型成功","",$_U['query_url']."/type");
	}else{
		$msg = array($result);
	}



}elseif ($_U['query_type']=="new" || $_U['query_type']=="edit"){
	if (isset($_POST['name']) && $_POST['name']!=""){
		$var = array("name","type_id","content");
		$data = post_var($var);
		$data['user_id'] = $_G['user_id'];
		if (isset($_REQUEST['id']) && $_REQUEST['id']!=""){
			$data['id'] = $_REQUEST['id'];
			$result = blogClass::Update($data);
			
		}else{
			$result = blogClass::Add($data);
		}
		if ($result!=false){
			$msg = array("操作成功","",$_U['query_url']);
		}else{
			$msg = array($result);
		}
	}elseif (isset($_REQUEST['id']) && $_REQUEST['id']!=""){
		$data['id'] = $_REQUEST['id'];
		$data['user_id'] = $_G['user_id'];
 		$_U['blog_result'] =  blogClass::GetOne($data);
		if($_U['blog_result']==false){
			$msg = array("请不要乱操作","",$_U['query_url']."/goods");
		}
	}
}

elseif ($_U['query_type']=="del"){
	$data['id'] = $_REQUEST['id'];
	$data['user_id'] = $_G['user_id'];
	$result = blogClass::Delete($data);
	if ($result!=false){
		$msg = array("删除博客成功","",$_U['query_url']);
	}else{
		$msg = array($result);
	}
}
$template = "user_blog.html";
?>
