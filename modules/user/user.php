<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
check_rank("user_".$_A['query_type']);//检查权限

$_A['list_purview'] =  array("user"=>array("用户管理"=>array("user_list"=>"用户列表","user_view"=>"查看用户信息","user_new"=>"添加用户","user_edit"=>"修改用户","user_del"=>"删除用户","user_type"=>"用户类型","user_type_order"=>"用户类型排序","user_type_del"=>"删除用户类型","user_type_new"=>"添加用户类型","user_type_edit"=>"编辑用户类型")));//权限
$_A['list_name'] = "用户管理";
$_A['list_menu'] = "<a href='{$_A['query_url']}{$_A['site_url']}'>用户列表</a> - <a href='{$_A['query_url']}/new{$_A['site_url']}'>添加用户</a> - <a href='{$_A['query_url']}/type{$_A['site_url']}'>用户类型</a>  - <a href='{$_A['query_url']}/typechange{$_A['site_url']}'>改变类型</a>  ";
$_A['list_table'] = "";

/**
 * 用户列表
**/
if ($_A['query_type'] == "list"){
	$_A['list_title'] = "用户列表";
	
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$data['type'] = 2;
	$data['username'] = urldecode(isset($_REQUEST['keywords'])?$_REQUEST['keywords']:"");
	$data['email'] = isset($_REQUEST['email'])?$_REQUEST['email']:"";
	$data['realname'] = isset($_REQUEST['realname'])?$_REQUEST['realname']:"";
	$result = userClass::GetList($data);
	$pages->set_data($result);
	
	$_A['user_list'] = $result['list'];
	$_A['showpage'] = $pages->show(3);
}
/**
 * 用户列表
**/
if ($_A['query_type'] == "typechange"){
	$_A['list_title'] = "用户改变类型申请";
	if (isset($_REQUEST['id']) && $_REQUEST['id']!=""){
		$data['id'] = $_REQUEST['id'];
		$data['status'] = $_REQUEST['status'];
		$data['type'] = "update";
		$result = userClass::TypeChange($data);
		$msg = array("类型修改成功","",$_A['query_url']."/typechange");
	}else{
		$data['page'] = $_A['page'];
		$data['epage'] = $_A['epage'];
		$data['type'] = "list";
		//$data['type'] = 2;
		$result = userClass::TypeChange($data);
		$pages->set_data($result);
		
		$_A['user_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	}
}
	
	
	/**
	 * 添加和编辑用户
	**/
/**
 * 添加和编辑用户
**/
elseif ($_A['query_type'] == "new" || $_A['query_type'] == "edit" || $_A['query_type'] == "view"){
	if ($_A['query_type'] == "new" ){
		$_A['list_title'] = "添加用户";
	}else{
		$_A['list_title'] = "修改用户";
	}
	
	if (isset($_POST['realname'])){
		$var = array("username","email","realname","password","sex","qq","wangwang","tel","phone","address","status","province","city","area","card_type","card_id","islock");
		$data = post_var($var);
		$data['area'] = post_area();
		$data['birthday'] = get_mktime($_POST['birthday']);
		$purview_usertype = explode(",",$_SESSION['purview']);
		if (!in_array("manager_new_".$index['type_id'],$purview_usertype) && !in_array("other_all",$purview_usertype) ){
			$msg = array("您没有权限添加或管理此类的管理员");
		}else{
			if ($_A['query_type'] == "new"){
				$check_username = userClass::CheckUsername(array("username"=>$data['username']));
				$check_email = userClass::CheckEmail(array("email"=>$data['email']));
				if ($check_username) {
					$msg = array("用户名已经存在");
				}elseif ($check_email){
					$msg = array("邮箱已经存在");
				}else{
					$result = userClass::AddUser($data);
					if ($result>0){
						$msg = array("用户名添加成功","",$_A['query_url']);
					}else{
						$msg = array($result);
					}
				}	
				
			}else{
				if ($data['password']==""){
					unset($data['password']);
				}
				$data["user_id"] = $_POST['user_id'];
				$check_email = userClass::CheckEmail(array("email"=>$data['email'],"user_id"=>$data["user_id"]));
				if ($check_email==true){
					$msg = array("邮箱已经存在");
				}else{
					$result = $user->UpdateUser($data);
					if ($_POST['kefu_userid']!=""){
						$sql = "update `{user_cache}` set kefu_userid=".$_POST['kefu_userid']." where user_id='{$data['user_id']}'";
						$mysql->db_query($sql);
					}
					if ($result===false){
						$msg = array($result);
					}else{
						$msg = array("修改成功");
					}
				}
			}
		}
	}else{
		$user_type = userClass::GetTypeList(array("type"=>2));
		if ($user_type==false){
			$msg = array("还没有类型，请先添加","添加用户类型","{$_A['query_url']}/type_new");
		}else{
			foreach ($user_type as $key => $value){
				$purview_usertype = explode(",",$_SESSION['purview']);
				if (in_array("manager_new_".$value['type_id'],$purview_usertype) || in_array("other_all",$purview_usertype) ){
					$list_type[$value['type_id']] = $value['name']; 
				}
			}
			$magic->assign("list_type",$list_type);
		}
		if ($_A['query_type'] == "edit" || $_A['query_type'] == "view"){
			if ($_REQUEST['user_id']==1){
				$msg = array("此管理员不能编辑,如果要修改，请到修改个人信息");
			}else{
				$_A['user_result'] = userClass::GetOne(array("user_id"=>$_REQUEST['user_id']));
			}
			
			//用户的查看
			if ($_A['query_type'] == "view"){
				$magic->assign("_A",$_A);
				$magic->display("view.tpl","modules/user");exit;
			}
		}
	}
}

	
	
/**
 * 删除用户
**/
elseif ($_A['query_type'] == "del"){
	if ($_REQUEST['user_id']==1){
		$msg = array("此用户不能删除");
	}else{
		$result = userClass::DeleteUser(array("user_id"=>$_REQUEST['user_id'],"type"=>2));
		if ($result == false){
			$msg = array("输入有误，请跟管理员联系");
		}else{
			$msg = array("删除成功");
		}
	}
	$user->add_log($_log,$result);//记录操作
}


/**
 * 用户类型列表
**/
elseif ($_A['query_type'] == "type"){
	$_A['user_type_list'] = userClass::GetTypeList(array("type"=>2));//0表示用户组的类别，1表示管理组的类型
}

/**
 * 添加和编辑用户类型
**/
elseif ($_A['query_type'] == "type_new" || $_A['query_type'] == "type_edit"){
	if (isset($_POST['name'])){
		$var = array("name","order","remark","status","summary","purview");
		$data = post_var($var);
		$data['type'] = 2;
		if ($_A['query_type'] == "type_new"){
			$result = userClass::AddType($data);
		}else{
			$data['type_id'] = $_POST['type_id'];
			$result = userClass::UpdateType($data);
		}
		if ($result == false){
			$msg = array($result);
		}else{
			$msg = array("类型操作成功","","{$_A['query_url']}/type");
		}
		
		$user->add_log($_log,$result);//记录操作
	}else{
		if ($_A['query_type'] == "type_edit"){
			$result = userClass::GetTypeOne(array("type_id"=>$_REQUEST['type_id']));
			$magic->assign("result",$result);
		}
	}
}




/**
 * 修改用户类型排序
**/
elseif ($_A['query_type'] == "type_order"){
	$data['order'] = $_POST['order'];
	$data['type_id'] = $_POST['type_id'];
	$result = userClass::OrderType($data);
	if ($result == false){
		$msg = array("输入有误，请跟管理员联系");
	}else{
		$msg = array("排序修改成功");
	}
	$user->add_log($_log,$result);//记录操作
}


/**
 * 删除用户类型
**/
elseif ($_A['query_type'] == "type_del"){
	$data['type_id'] = $_REQUEST['type_id'];
	if ($data['type_id']==1){
		$msg = array("超级管理员类型禁止删除");
	}else{
		$result = userClass::DeleteType($data);
		if ($result){
			$msg = array("删除成功");
		}else{
			$msg = array($result);
		}
		$user->add_log($_log,$result);//记录操作
	}
}


/**
 * VIP用户
**/
elseif ($_A['query_type'] == "vip"){
	$type = isset($_REQUEST['type'])?$_REQUEST['type']:"-1";
	
	$result = userClass::GetList(array("isvip"=>$type));//0表示用户组的类别，1表示管理组的类型
	$pages->set_data($result);
	
	$_A['user_vip_list'] = $result['list'];
	$_A['showpage'] = $pages->show(3);
	
}
/**
 * VIP审核查看
**/
elseif ($_A['query_type'] == "vipview"){
	if (isset($_POST['isvip'])){
		$var = array("isvip","vip_veremark");
		$data = post_var($var);
		if ($data['isvip']==1){
			$data['vip_time'] = time();
		}
		$data['user_id'] = $_POST['user_id'];
		$result = userClass::UpdateUser($data);
		
		if ($result == false){
			$msg = array($result);
		}else{
			$msg = array("VIP用户审核成功","","{$_A['query_url']}/vip");
		}
		
		$user->add_log($_log,$result);//记录操作
	}else{
		$_A['user_result'] = userClass::GetOne(array("user_id"=>$_REQUEST['user_id']));
	}
}
?>