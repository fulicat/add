<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问

check_rank("discount_".$_A['query_type']);//检查权限

require_once 'discount.class.php';


$_A['list_purview'] = array("discount"=>array("折扣管理"=>array("discount_list"=>"折扣列表","discount_new"=>"添加折扣","discount_del"=>"删除折扣","discount_company"=>"折扣商家","discount_company_new"=>"添加折扣商家","discount_company_new"=>"编辑折扣商家","discount_company_del"=>"删除折扣商家")));//权限
$_A['list_name'] = $_A['module_result']['name'];
$_A['list_menu'] = "<a href='{$_A['query_url']}/new{$_A['site_url']}'>发布折扣信息</a> - <a href='{$_A['query_url']}{$_A['site_url']}'>折扣列表</a> - <a href='{$_A['query_url']}/company{$_A['site_url']}'>商家管理</a>  - <a href='{$_A['query_url']}/company_new{$_A['site_url']}'>添加商家</a> ";

	/**
	 * 如果类型为空的话则显示所有的文件列表
	**/
if ($_A['query_type'] == "list"){
	$_A['list_title'] = "列表";
	//修改状态
	if (isset($_REQUEST['id']) && isset($_REQUEST['status'])){
		$sql = "update {discount} set status='".$_REQUEST['status']."' where id = ".$_REQUEST['id'];
		$mysql->db_query($sql);	
	}
	
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$result = discountClass::GetList($data);
	
	if (is_array($result)){
		$pages->set_data($result);
		$_A['discount_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	
	}else{
		$msg = array($result);
	}
}


/**
 * 添加
**/
elseif ($_A['query_type'] == "new"  || $_A['query_type'] == "edit" || $_A['query_type'] == "view" ){
	
	$_A['list_title'] = "折扣管理";
	
	$_A['discount_company_list'] =  discountClass::GetCompanyList(array("limit"=>"all"));
	if (isset($_POST['name'])){
		$var = array(
			'type',
			'business_district',
			'company_id',
			'name',
			'litpic',
			'address',
			'tag',
			'address',
			'comment',
			'province',
			'city',
			'area',
			'post_user',
			'status'
        );
		$data = post_var($var);
		
		$data['start_date'] = maketime('start_date');
		$data['end_date'] = maketime('end_date');
		if ($_A['query_type'] == "new"){
			$result = discountClass::Add($data);
		}else{
			$data['id'] = $_REQUEST['id'];
			$result = discountClass::Update($data);
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
		$result = discountClass::GetOne($data);
		if (is_array($result)){
			$_A['discount_result'] = $result;
			
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
	$result = discountClass::Delete($data);
	if ($result !== true){
		$msg = array($result);
	}else{
		$msg = array("删除成功");
	}
	$user->add_log($_log,$result);//记录操作
}

/**
 * 公司列表
**/
elseif ($_A['query_type'] == "company"){
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$result = discountClass::GetCompanyList($data);
	if (is_array($result)){
		$pages->set_data($result);
		$_A['discount_company_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	
	}else{
		$msg = array($result);
	}
}


/**
 * 添加
**/
elseif ($_A['query_type'] == "company_new"  || $_A['query_type'] == "company_edit" || $_A['query_type'] == "company_view" ){
	
	$_A['list_title'] = "公司管理";
	
	if (isset($_POST['name'])){
		$var = array('name','goods','type','linkman','tel','content');
		$data = post_var($var);
		
		if ($_A['query_type'] == "new"){
			$result = discountClass::AddCompany($data);
		}else{
			$data['id'] = $_REQUEST['id'];
			$result = discountClass::UpdateCompany($data);
		}
		
		if ($result !== true){
			$msg = array($result);
		}else{
			$msg = array("操作成功");
		}
		$user->add_log($_log,$result);//记录操作
	}
	
	elseif ($_A['query_type'] == "company_edit" || $_A['query_type'] == "company_view" ){
		$data['id'] = $_REQUEST['id'];
		$result = discountClass::GetCompanyOne($data);
		if (is_array($result)){
			$_A['discount_company_result'] = $result;
		}else{
			$msg = array($result);
		}
	}
	
}		

/**
 * 删除
**/
elseif ($_A['query_type'] == "company_del"){
	$data['id'] = $_REQUEST['id'];
	$result = discountClass::DeleteCompany($data);
	if ($result !== true){
		$msg = array($result);
	}else{
		$msg = array("删除成功");
	}
	$user->add_log($_log,$result);//记录操作
}


?>