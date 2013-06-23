<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
check_rank("company_".$_A['query_type']);//检查权限

include_once("company.class.php");

$_A['list_purview'] =  array("company"=>array("公司管理"=>array("company_list"=>"公司列表","company_new"=>"添加公司","company_del"=>"删除公司")));//权限
$_A['list_name'] = $_A['module_result']['name'];
$_A['list_menu'] = "<a href='{$_A['query_url']}{$_A['site_url']}'>企业会员审核审核</a> - <a href='{$_A['query_url']}{$_A['site_url']}'>公司列表</a> - <a href='{$_A['query_url']}/zhaopin{$_A['site_url']}'>招聘管理</a> - <a href='{$_A['query_url']}/news{$_A['site_url']}'>新闻管理</a>  ";
$_A['list_table'] = "";

/**
 * 如果类型为空的话则显示所有的文件列表
**/
if ($_A['query_type'] == "list"){
	$_A['list_title'] = "公司列表";
	//修改状态
	if (isset($_REQUEST['keywords']) && $_REQUEST['keywords']!=""){
		$data['name'] = $_REQUEST['keywords'];
	}
		
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$data['flag_list'] = $_A['flag_list'];
	
	$result = companyClass::GetList($data);
	if (is_array($result)){
		$pages->set_data($result);
		$_A['company_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	}else{
		$msg = array($result);
	}
}

//查看并审核是否是企业会员
elseif ($_A['query_type'] == "view" ){
	if (isset($_POST['status']) && $_POST['status']!=""){
		$var = array("id","status","verify_remark");
		$data = post_var($var);
		$date['verify_time'] = time();
		$result = companyClass::Update($data);
		$msg = array("审核操作成功");
	}else{
		$data['id'] = $_REQUEST['id'];
		$_A['company_result'] = companyClass::GetOne($data);
	}
}


/**
 * 添加
**/
elseif ($_A['query_type'] == "new" || $_A['query_type'] == "edit" ){
	if ($_A['query_type'] == "new"){
		$_A['list_title'] = "添加公司";
	}else{
		$_A['list_title'] = "修改公司";
	}
	if (isset($_POST['name'])){
		//模块字段的表单
		$var = array("name","flag","status","weburl","summary","content","province","city","area","address","address","linkman","email","postcode","tel","fax","msn","qq","updatetime","updateip");
		$data = post_var($var);
		
		//自定义字段的表单
		$fields = "";
		if ($_A['module_result']['fields']==1){
			$fields = post_fields(moduleClass::GetFieldsList(array("code"=>"company")));
			
		}
		
		//添加表单的处理
		if ($_A['query_type'] == "new"){
			$result = companyClass::Add($data);
			if ($result>0){
				if ($_A['module_result']['fields']==1){
					$fields['id'] = $result;
					$fields['code'] = $code;
					moduleClass::AddFieldsTable($fields);//更新字段
				}
				$msg = array("添加成功");
			}else{
				$msg = array($result);
			}
		}
		//修改表单的处理
		else{
			$data['id'] = $_POST['id'];
			$result = companyClass::Update($data);
			if ($result){
				if ($_A['module_result']['fields']==1){
					$fields['id'] = $data['id'];
					$fields['code'] = $code;
					moduleClass::UpdateFieldsTable($fields);//更新字段
				}
				$msg = array("修改成功");
			}else{
				$msg = array($result);
			}
		}
		
		$user->add_log($_log,$result);//记录操作
	}else{
		//认证机构模块的栏目
		$_A['site_list'] = siteClass::GetList(array("code"=>"company"));
		
		
		//获取编辑的信息
		if ($_A['query_type'] == "edit"){
			$data['id'] = $_REQUEST['id'];
			$data['fields'] = $_A['module_result']['fields'];
			$result = companyClass::GetOne($data);
			if (is_array($result)){
				$_A['company_result'] = $result;
			}else{
				$msg = array($result);
			}
			
		}
		
		//自定义字段
		if ($_A['module_result']['fields']==1){
			$result_fields = "";
			$data['code'] = $code;
			$data['result'] = $_A['company_result'];
			$_A['show_input']  = moduleClass::GetFieldsInput($data);
		}
	}
}

/**
 * 查看
**/
elseif ($_A['query_type'] == "view"){
	$_A['company_result'] = companyClass::GetOne(array("id"=>$_REQUEST['id']));
}
	
	
/**
 * 删除
**/
elseif ($_A['query_type'] == "del"){
	$id = $_REQUEST['id'];
	$result = companyClass::Delete(array("id"=>$id));
	if ($result !== true){
		$msg = array($result);
	}else{
		//自定义字段
		
		$data['id'] = $id;
		$data['code'] = "company";
		moduleClass::DeleteFieldsTable($data);
		
		$msg = array("删除成功");
	}
	$user->add_log($_log,$result);//记录操作
}


/**
 * 新闻管理
**/
elseif ($_A['query_type'] == "news"){
	$_A['list_title'] = "公司新闻列表";
	//修改状态
	if (isset($_REQUEST['keywords']) && $_REQUEST['keywords']!=""){
		$data['name'] = $_REQUEST['keywords'];
	}
		
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$data['flag_list'] = $_A['flag_list'];
	
	$result = companyClass::GetNewsList($data);
	if (is_array($result)){
		$pages->set_data($result);
		$_A['company_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	}else{
		$msg = array($result);
	}
}


/**
 * 招聘信息
**/
elseif ($_A['query_type'] == "zhaopin"){
	$_A['list_title'] = "公司新闻列表";
	//修改状态
	if (isset($_REQUEST['keywords']) && $_REQUEST['keywords']!=""){
		$data['name'] = $_REQUEST['keywords'];
	}
		
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$data['flag_list'] = $_A['flag_list'];
	
	$result = companyClass::GetJobList($data);
	if (is_array($result)){
		$pages->set_data($result);
		$_A['company_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	}else{
		$msg = array($result);
	}
}

/**
 * 查看
**/
elseif ($_A['query_type'] == "zhaopin_edit"){
	if (isset($_POST['name']) && $_POST['name']!=""){
		$var = array("id","status","name","description","demand","num","province","city","area");
		$data = post_var($var);
		$result = companyClass::UpdateJob($data);
		$msg = array("审核操作成功");
	}else{
		$data['id'] = $_REQUEST['id'];
		$_A['company_result'] = companyClass::GetJobOne($data);
	}
}
/**
 * 查看
**/
elseif ($_A['query_type'] == "news_edit"){
	if (isset($_POST['name']) && $_POST['name']!=""){
		$var = array("id","status","name","content");
		$data = post_var($var);
		$result = companyClass::UpdateNews($data);
		$msg = array("审核操作成功");
	}else{
		$data['id'] = $_REQUEST['id'];
		$_A['company_result'] = companyClass::GetNewsOne($data);
	}
}
	

//防止乱操作
else{
	$msg = array("输入有误，请不要乱操作","",$url);
}

?>