<?php
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问

include_once("company.class.php");

$data['user_id'] = $_G['user_id'];
$_U['company_result'] = companyClass::GetOne($data);

//企业简介
if ($_U['query_type']=="intro"){
	if (isset($_POST['name']) && $_POST['name']!=""){
		$var = array("name","type","foundyear","weburl","summary","content");
		$data = post_var($var);
		$data['status'] = 2;
		$data['user_id'] = $_G['user_id'];
		$result = companyClass::ActionCompany($data);
		$msg = array("公司信息操作改成功");
	}
	
//联系方式
}elseif ($_U['query_type']=="contact"){
	if (isset($_POST['tel']) ){
		$var = array("tel","fax","province","city","area","postcode","address",);
		$data = post_var($var);
		$data['user_id'] = $_G['user_id'];
		$result = companyClass::ActionCompany($data);
		$msg = array("信息修改成功");
	}else{
		$data['user_id'] = $_G['user_id'];
		$_U['company_result'] = companyClass::GetOne($data);
	}


}elseif ($_U['query_type']=="job_new"){
	if (isset($_POST['name']) && $_POST['name']!=""){
		$var = array("name","area","num","description","demand","order");
		$data = post_var($var);
		$data['user_id'] = $_G['user_id'];
		if (isset($_REQUEST['id']) && $_REQUEST['id']!=""){
			$data['id'] = $_REQUEST['id'];
			$result = companyClass::UpdateJob($data);
			
		}else{
			$result = companyClass::AddJob($data);
		}
		if ($result!=false){
			$msg = array("招聘信息添加成功","",$_U['query_url']."/job");
		}else{
			$msg = array($result);
		}
	}elseif (isset($_REQUEST['id']) && $_REQUEST['id']!=""){
		$data['id'] = $_REQUEST['id'];
		$data['user_id'] = $_G['user_id'];
 		$_U['job_result'] =  companyClass::GetJobOne($data);
		if($_U['job_result']==false){
			$msg = array("请不要乱操作","",$_U['query_url']."/job");
		}
	}
}elseif ($_U['query_type']=="job_del"){
	$data['id'] = $_REQUEST['id'];
	$data['user_id'] = $_G['user_id'];
	$result = companyClass::DeleteJob($data);
	if ($result!=false){
		$msg = array("删除招聘信息成功","",$_U['query_url']."/job");
	}else{
		$msg = array($result);
	}
}elseif ($_U['query_type']=="goods_new"){
	if (isset($_POST['name']) && $_POST['name']!=""){
		$var = array("name","order","content");
		$data = post_var($var);
		$data['user_id'] = $_G['user_id'];
		if (isset($_REQUEST['id']) && $_REQUEST['id']!=""){
			$data['id'] = $_REQUEST['id'];
			$result = companyClass::UpdateGoods($data);
			
		}else{
			$data['status'] = 1;
			$result = companyClass::AddGoods($data);
		}
		if ($result!=false){
			$msg = array("产品信息添加成功","",$_U['query_url']."/goods");
		}else{
			$msg = array($result);
		}
	}elseif (isset($_REQUEST['id']) && $_REQUEST['id']!=""){
		$data['id'] = $_REQUEST['id'];
		$data['user_id'] = $_G['user_id'];
 		$_U['goods_result'] =  companyClass::GetGoodsOne($data);
		if($_U['goods_result']==false){
			$msg = array("请不要乱操作","",$_U['query_url']."/goods");
		}
	}
}elseif ($_U['query_type']=="goods_del"){
	$data['id'] = $_REQUEST['id'];
	$data['user_id'] = $_G['user_id'];
	$result = companyClass::DeleteGoods($data);
	if ($result!=false){
		$msg = array("删除产品信息成功","",$_U['query_url']."/goods");
	}else{
		$msg = array($result);
	}
}elseif ($_U['query_type']=="news_new"){
	if (isset($_POST['name']) && $_POST['name']!=""){
		$var = array("name","order","content");
		$data = post_var($var);
		$data['user_id'] = $_G['user_id'];
		if (isset($_REQUEST['id']) && $_REQUEST['id']!=""){
			$data['id'] = $_REQUEST['id'];
			$result = companyClass::UpdateNews($data);
			
		}else{
			$data['status'] = 1;
			$result = companyClass::AddNews($data);
		}
		if ($result!=false){
			$msg = array("企业信息操作成功","",$_U['query_url']."/news");
		}else{
			$msg = array($result);
		}
	}elseif (isset($_REQUEST['id']) && $_REQUEST['id']!=""){
		$data['id'] = $_REQUEST['id'];
		$data['user_id'] = $_G['user_id'];
 		$_U['goods_result'] =  companyClass::GetNewsOne($data);
		if($_U['goods_result']==false){
			$msg = array("请不要乱操作","",$_U['query_url']."/news");
		}
	}
}elseif ($_U['query_type']=="news_del"){
	$data['id'] = $_REQUEST['id'];
	$data['user_id'] = $_G['user_id'];
	$result = companyClass::DeleteNews($data);
	if ($result!=false){
		$msg = array("删除产品信息成功","",$_U['query_url']."/news");
	}else{
		$msg = array($result);
	}
}
$template = "user_company.html";
?>
