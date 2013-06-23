<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
check_rank("manager_".$_A['query_type']);//检查权限

$list_purview =  array("manager"=>array("管 理 员"=>array("manager_list"=>"管理员列表","manager_new"=>"添加管理员","manager_edit"=>"修改管理员","manager_type"=>"管理员类型","manager_type_order"=>"修改类型排序","manager_type_del"=>"删除类型","manager_type_new"=>"添加类型","manager_type_edit"=>"编辑类型")));//权限
$_A['list_name'] = "管理员管理";
$_A['list_menu'] = "<a href='{$_A['query_url']}{$_A['site_url']}'>管理员列表</a> - <a href='{$_A['query_url']}/new{$_A['site_url']}'>添加管理员</a> - <a href='{$_A['query_url']}/type{$_A['site_url']}'>管理员类型</a> ";
$list_table ="";


/**
 * 管理员列表
**/
if ($_A['query_type'] == "list"){
	$_A['list_title'] = "列表";
	if (isset($_POST['user_id']) && $_POST['user_id']!=""){
		userClass::ActionUser(array("user_id"=>$_POST['user_id'],"order"=>$_POST['order']));
		$msg = array("修改成功","",$_A['query_url'].$_A['query_site']);
	
	}else{
		$data['page'] = $_A['page'];
		$data['epage'] = $_A['epage'];
		$data['type'] = 1;
		
		$result = $user->GetList($data);
		$pages->set_data($result);
		
		$_A['user_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	}
}

/**
 * 添加和编辑用户
**/
elseif ($_A['query_type'] == "new" || $_A['query_type'] == "edit"){
	if ($_A['query_type'] == "new" ){
		$_A['list_title'] = "添加管理员";
	}else{
		$_A['list_title'] = "修改管理员";
	}
	
	if (isset($_POST['realname'])){
		$var = array("username","email","type_id","realname","birthday","password","sex","qq","wangwang","tel","phone","address","status","province","city","area");
		$data = post_var($var);
		$data['area'] = post_area();
		$purview_usertype = explode(",",$_SESSION['purview']);
		if (!in_array("manager_new_".$data['type_id'],$purview_usertype) && !in_array("other_all",$purview_usertype) ){
			$msg = array("您没有权限添加或管理此类的管理员");
		}else{
			if ($_A['query_type'] == "new"){
				
				$check_username = $user->CheckUsername(array("username"=>$data['username']));
				$check_email = $user->CheckEmail(array("email"=>$data['email']));
				if ($check_username) {
					$msg = array("用户名已经存在");
				}elseif ($check_email){
					$msg = array("邮箱已经存在");
				}else{
					$result = $user->AddUser($data);
					if ($result>0){
						$msg = array("管理员成功");
					}else{
						$msg = array($result);
					}
				}	
				
			}else{
				if ($data['password']==""){
					unset($data['password']);
				}
				$data["user_id"] = $_POST['user_id'];
				$check_email = $user->CheckEmail(array("email"=>$data['email'],"user_id"=>$data["user_id"]));
				if ($check_email){
					$msg = array("邮箱已经存在");
				}else{
					$result = $user->UpdateUser($data);
					if ($result===false){
						$msg = array($result);
					}else{
						$msg = array("修改成功");
					}
				}
			}
		}
	}else{
		$user_type = $user->GetTypeList(array("type"=>1));
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
		if ($_A['query_type'] == "edit"){
			if ($_REQUEST['user_id']==1){
				$msg = array("此管理员不能编辑,如果要修改，请到修改个人信息");
			}else{
				$_A['user_result'] = $user->GetOne(array("user_id"=>$_REQUEST['user_id']));
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
		$result = $user->DeleteUser(array("user_id"=>$_REQUEST['user_id'],"type"=>1));
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
	$_A['user_type_list'] = $user->GetTypeList(array("type"=>1));//0表示用户组的类别，1表示管理组的类型
}

/**
 * 添加和编辑用户类型
**/
elseif ($_A['query_type'] == "type_new" || $_A['query_type'] == "type_edit"){
	if (isset($_POST['name'])){
		$var = array("name","order","remark","status","summary","purview");
		$data = post_var($var);
		if ($data['purview']!=""){
			$data['type'] = 1;
			if ($_A['query_type'] == "type_new"){
				$result = $user->AddType($data);
			}else{
				$data['type_id'] = $_POST['type_id'];
				$result = $user->UpdateType($data);
			}
			if ($result == false){
				$msg = array($result);
			}else{
				$msg = array("类型操作成功","","{$_A['query_url']}/type");
			}
		}else{
			$msg = array("请选择权限");
		}
		$user->add_log($_log,$result);//记录操作
	}else{
		if ($_A['query_type'] == "type_edit"){
			$result = $user->GetTypeOne(array("type_id"=>$_REQUEST['type_id']));
			$magic->assign("result",$result);
		}
		$_A['user_type_list'] = $user->GetTypeList(array("type"=>1));
		$_user_type = "";
		foreach ($_A['user_type_list'] as $key => $value){
			$_user_type['manager_new_'.$value['type_id']] = $value['name']; 
		}
		$_purview = array("other"=>array("特殊权限"=>array("other_all"=>"所有权限","site_all"=>"站点管理","module_all"=>"模块管理","system_all"=>"系统管理","bbs_all"=>"论坛管理")),
		"site"=>array("站点管理"=>array("site_list"=>"站点管理","site_new"=>"添加站点","site_edit"=>"修改站点","site_move"=>"移动站点","site_del"=>"删除站点")),
		"module"=>array("模块管理"=>array("module_list"=>"模块列表","module_new"=>"添加模块","site_edit"=>"修改模块")),
		"system"=>array("系统管理"=>array("system_info"=>"系统设置","system_dbbackup"=>"数据库备份","system_watermark"=>"图片水印","system_email"=>"邮件设置","system_clearcache"=>"清空缓存","system_flag"=>"自定义文档","system_makehtml"=>"生成网站","system_fujian"=>"附件设置")),
		"manager_new"=>array("添加管理员"=>$_user_type)
		);
		$result = moduleClass::GetList(array("type"=>"install"));
		foreach($result as $key => $value){
			if ($value['purview']!=""){
				$_purview = array_merge($_purview,unserialize(html_entity_decode($value['purview'])));
			}
		}
		$_A['user_purview'] = $_purview;
	}
}




/**
 * 修改用户类型排序
**/
elseif ($_A['query_type'] == "type_order"){
	$data['order'] = $_POST['order'];
	$data['type_id'] = $_POST['type_id'];
	$result = $user->OrderType($data);
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
		$result = $user->DeleteType($data);
		if ($result){
			$msg = array("删除成功");
		}else{
			$msg = array($result);
		}
		$user->add_log($_log,$result);//记录操作
	}
}

?>