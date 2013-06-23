<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
check_rank("attestation_".$_A['query_type']);//检查权限

include_once("attestation.class.php");

$_A['list_purview'] =  array("attestation"=>array("证件管理"=>array("attestation_list"=>"证件列表",
"attestation_new"=>"添加证件",
"attestation_edit"=>"编辑证件",
"attestation_del"=>"删除证件",
"attestation_view"=>"审核证件",
"attestation_type_list"=>"类型列表",
"attestation_type_new"=>"添加类型",
"attestation_type_edit"=>"编辑类型",
"attestation_type_del"=>"删除类型",
"attestation_realname"=>"实名认证",
"attestation_all"=>"用户认证信息",
"attestation_vip"=>"vip认证",
"attestation_vipview"=>"vip审核",
"attestation_viewall"=>"用户认证列表",
"attestation_audit"=>"用户认证操作",
"attestation_view_all"=>"用户认证查看")));//权限
$_A['list_name'] = $_A['module_result']['name'];
if($_G['user_result']['type_id']==3){
	$_A['list_menu'] = " <a href='{$_A['query_url']}/viewall{$_A['site_url']}'>查看所有的用户</a>  - <a href='{$_A['query_url']}/vip{$_A['site_url']}'>vip审核</a>";
}elseif($_G['user_result']['type_id']==4){
	$_A['list_menu'] = " <a href='{$_A['query_url']}/viewall{$_A['site_url']}'>查看所有的用户</a> -  <a href='{$_A['query_url']}/vip{$_A['site_url']}'>vip审核</a>   - <a href='{$_A['query_url']}/vip{$_A['site_url']}&type=1'>vip认证</a>  - <a href='{$_A['query_url']}/all{$_A['site_url']}'>用户认证信息</a> - <a href='{$_A['query_url']}/viewall{$_A['site_url']}'>查看所有的用户</a>";
}else{
$_A['list_menu'] = "<a href='{$_A['query_url']}{$_A['site_url']}'>证件列表</a> - <a href='{$_A['query_url']}/new{$_A['site_url']}'>添加证件</a> - <a href='{$_A['query_url']}/type_list{$_A['site_url']}'>类型列表</a> - <a href='{$_A['query_url']}/type_new{$_A['site_url']}'>添加类型</a> - <a href='{$_A['query_url']}/realname{$_A['site_url']}'>实名认证</a>  - <a href='{$_A['query_url']}/vip{$_A['site_url']}'>vip审核</a>  - <a href='{$_A['query_url']}/vip{$_A['site_url']}&type=1'>vip认证</a>  - <a href='{$_A['query_url']}/all{$_A['site_url']}'>用户认证信息</a> - <a href='{$_A['query_url']}/viewall{$_A['site_url']}'>查看所有的用户</a> ";
}

/**
 * 如果类型为空的话则显示所有的文件列表
**/
if ($_A['query_type'] == "list"){
	$_A['list_title'] = "证件列表";
	
	if (isset($_REQUEST['user_id']) && $_REQUEST['user_id']!=""){
		$data['user_id'] = $_REQUEST['user_id'];
	}
	if (isset($_REQUEST['type_id'])  && $_REQUEST['type_id']!=""){
		$data['type_id'] = $_REQUEST['type_id'];
	}
	if (isset($_REQUEST['username']) && $_REQUEST['username']!=""){
		$data['username'] = $_REQUEST['username'];
	}
	if (isset($_REQUEST['realname']) && $_REQUEST['realname']!=""){
		$data['realname'] = $_REQUEST['realname'];
	}
	if (isset($_REQUEST['status']) && $_REQUEST['status']!=""){
		$data['status'] = $_REQUEST['status'];
	}
	
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$result = attestationClass::GetList($data);
	
	if (is_array($result)){
		$pages->set_data($result);
		$_A['attestation_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	
	}else{
		$msg = array($result);
	}
}

/**
 * 如果类型为空的话则显示所有的文件列表
**/
elseif ($_A['query_type'] == "viewall"){
	$_A['list_title'] = "查看所有的信息";
	
	if($_G['user_result']['type_id']==3){
		$data['kefu_userid'] = $_G['user_id'];
	}
	if (isset($_REQUEST['username']) && $_REQUEST['username']!=""){
		$data['username'] = $_REQUEST['username'];
	}
	if (isset($_REQUEST['realname']) && $_REQUEST['realname']!=""){
		$data['realname'] = $_REQUEST['realname'];
	}
	if (isset($_REQUEST['keywords']) && $_REQUEST['keywords']!=""){
		$data['username'] = $_REQUEST['keywords'];
	}
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$result = userClass::GetList($data);
	
	if (is_array($result)){
		$pages->set_data($result);
		$_A['viewall_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	
	}else{
		$msg = array($result);
	}
}
	/**
 * VIP审核查看
**/
elseif ($_A['query_type'] == "view_all"){
	if (isset($_POST['vip_status'])){
		
	}else{
		$_A['user_result'] = userClass::GetOne(array("user_id"=>$_REQUEST['user_id']));
		if ($_A['user_result']['kefu_userid']!=$_G['user_id'] && $_G['user_result']['type_id']==3){
			$msg = array("请不要乱操作");
		}
		include_once(ROOT_PATH."modules/userinfo/userinfo.class.php");
		$_A['userinfo_result'] = userinfoClass::GetOne(array("user_id"=>$_REQUEST['user_id']));
	}
}
/**
 * 添加
**/
elseif ($_A['query_type'] == "new" || $_A['query_type'] == "edit" ){
	if ($_A['query_type'] == "new"){
		$_A['list_title'] = "添加证件";
	}else{
		$_A['list_title'] = "修改证件";
	}
	if (isset($_POST['type_id'])){
		$var = array("type_id","content","litpic","user_id","litpic","status","jifen");
		$data = post_var($var);
		
		
		if ($_A['query_type'] == "new"){
			$result = attestationClass::Add($data);
		}else{
			$data['id'] = $_POST['id'];
			$result = attestationClass::Update($data);
		}
		
		if ($result !== true){
			$msg = array($result);
		}else{
			$msg = array("操作成功");
		}
		$user->add_log($_log,$result);//记录操作
	}elseif ($_A['query_type'] == "edit" ){
		
		$_A['attestation_type_list'] = attestationClass::GetTypeList(array("limit"=>"all"));
		
		$data['id'] = $_REQUEST['id'];
		$result = attestationClass::GetOne($data);
		if (is_array($result)){
			$_A['attestation_result'] = $result;
		}else{
			$msg = array($result);
		}
		
		
	}else{
		$_A['attestation_type_list'] = attestationClass::GetTypeList(array("limit"=>"all"));
	}
}

/**
 * 查看
**/
elseif ($_A['query_type'] == "view"){
	require_once("modules/credit/credit.class.php");
	require_once("modules/message/message.class.php");
	$_A['list_title'] = "查看认证";
	$result = creditClass::GetTypeOne(array("nid"=>"zhengjian"));
	$_A['arrestation_value'] = $result['value'];
	$_A['credit_type_id'] = $result['id'];
	$_A['credit_type_name'] = $result['name'];
	if (isset($_POST['id'])){
		if($_SESSION['valicode']!=$_POST['valicode']){
			$msg = array("验证码不正确");
		}else{
			$var = array("id","status","verify_remark","jifen");
			$data = post_var($var);
			$data['verify_user'] = $_G['user_id'];
			$data['verify_time'] = time();
			if ($data['status']!=1){
				$data['jifen'] = 0;
			}
			$attestation_result = attestationClass::GetOne(array("id"=>$data['id']));
			if ($attestation_result['status']==1){
				$msg = array("此证件已经审核通过，请不要重复审核。");
			}elseif ($data['status']==1){
				$result = attestationClass::Update($data);//更新类型状态
				$credit['nid'] = "zhengjian";
				$credit['user_id'] = $_POST['user_id'];
				$credit['value'] = $data['jifen'];
				$credit['op_user'] = $_G['user_id'];
				$credit['op'] = 1;//增加
				$credit['type_id'] = $_A['credit_type_id'];
				$credit['remark'] = $data['verify_remark'];
				creditClass::UpdateCredit($credit);//更新积分
				
				$message['sent_user'] = $_G['user_id'];
				$message['receive_user'] = $_POST['user_id'];
				$message['name'] = "{$_POST['type_name']}审核通过，加{$data['jifen']}分";
				$message['content'] = $data['verify_remark'];
				$message['type'] = "system";
				$message['status'] = 0;
				messageClass::Add($message);//发送短消息
				$msg = array("操作成功","",$_A['query_url'].$_A['query_site']);
			}elseif ($data['status']==2){
				$message['sent_user'] = $_G['user_id'];
				$message['receive_user'] = $_POST['user_id'];
				$message['name'] = "{$_POST['type_name']}审核未通过";
				$message['content'] = $data['verify_remark'];
				$message['type'] = "system";
				$message['status'] = 0;
				messageClass::Add($message);//发送短消息
				$result = attestationClass::Update($data);//更新类型状态
				$msg = array("操作成功","",$_A['query_url'].$_A['query_site']);
			}
			$_SESSION['valicode'] = "";
		}
		$user->add_log($_log,$result);//记录操作
	}else{
		$data['id'] = $_REQUEST['id'];
		$_A['attestation_result'] = attestationClass::GetOne($data);
		if ($_A['attestation_result']['status']==1){
			$msg = array("此信息已通过认证，请不要重新认证");
		}
	}
}


/**
 * 删除
**/
elseif ($_A['query_type'] == "del"){
	$data['id'] = $_REQUEST['id'];
	$result = attestationClass::Delete($data);
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
elseif ($_A['query_type'] == "type_list"){
	$_A['list_title'] = "证件列表";
	
	if (isset($_REQUEST['user_id'])){
		$data['user_id'] = $_REQUEST['user_id'];
	}
	if (isset($_REQUEST['type_id'])){
		$data['type_id'] = $_REQUEST['type_id'];
	}
	if (isset($_REQUEST['username'])){
		$data['username'] = $_REQUEST['username'];
	}
	
	$data['limit'] = "all";
	$result = attestationClass::GetTypeList($data);
	if (is_array($result)){
		$_A['attestation_type_list'] = $result;
	}else{
		$msg = array($result);
	}
}

	
/**
 * 添加
**/
elseif ($_A['query_type'] == "type_new" || $_A['query_type'] == "type_edit" ){
	if ($_A['query_type'] == "type_new"){
		$_A['list_title'] = "添加证件";
	}else{
		$_A['list_title'] = "修改证件";
	}
	if (isset($_POST['name'])){
		$var = array("name","order","summary","remark","status","jifen");
		$data = post_var($var);
		
		if ($_A['query_type'] == "type_new"){
			$result = attestationClass::AddType($data);
		}else{
			$data['type_id'] = $_POST['type_id'];
			$result = attestationClass::UpdateType($data);
		}
		
		if ($result !== true){
			$msg = array($result);
		}else{
			$msg = array("操作成功");
		}
		$user->add_log($_log,$result);//记录操作
	}elseif ($_A['query_type'] == "type_edit" ){
		$data['type_id'] = $_REQUEST['type_id'];
		$result = attestationClass::GetTypeOne($data);
		if (is_array($result)){
			$_A['attestation_type_result'] = $result;
		}else{
			$msg = array($result);
		}
	}
}



/**
 * 删除
**/
elseif ($_A['query_type'] == "type_del"){
	$data['type_id'] = $_REQUEST['type_id'];
	$result = attestationClass::DeleteType($data);
	if ($result !== true){
		$msg = array($result);
	}else{
		$msg = array("删除成功");
	}
	$user->add_log($_log,$result);//记录操作
}

/**
 * 修改用户类型排序
**/
elseif ($_A['query_type'] == "type_order"){
	$data['order'] = $_POST['order'];
	$data['type_id'] = $_POST['type_id'];
	$result = attestationClass::OrderType($data);
	if ($result == false){
		$msg = array("输入有误，请跟管理员联系");
	}else{
		$msg = array("排序修改成功");
	}
	$user->add_log($_log,$result);//记录操作
}

/**
 * 如果类型为空的话则显示所有的文件列表
**/
elseif ($_A['query_type'] == "realname"){
	$_A['list_title'] = "实名认证";
	
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	if (isset($_REQUEST['real_status'])){
		if ($_REQUEST['real_status']==1){
			$data['real_status'] = "1";
		}else{
			$data['real_status'] = "2";
		}
	}else{
		$data['real_status'] = "1,2";
	}
	if (isset($_REQUEST['username'])){
		$data['username'] = $_REQUEST['username'];
	}
	$data['order'] = "real_status";
	$result = userClass::GetList($data);
	
	if (is_array($result)){
		
		$pages->set_data($result);
		$_A['user_real_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	
	}else{
		$msg = array($result);
	}
}

/**
 * 用户所有的相关信息
**/
elseif ($_A['query_type'] == "all"){
	$_A['list_title'] = "用户相关的认证信息";
	
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	if (isset($_REQUEST['username'])){
		$data['username'] = $_REQUEST['username'];
	}
	if (isset($_REQUEST['realname'])){
		$data['realname'] = $_REQUEST['realname'];
	}
	if (isset($_REQUEST['type'])){
		if ($_REQUEST['type']=="phone"){
			$data['phone_status'] = 1;
		}elseif ($_REQUEST['type']=="video"){
			$data['video_status'] = 1;
		}elseif ($_REQUEST['type']=="email"){
			$data['email_status'] = 1;
		}elseif ($_REQUEST['type']=="scene"){
			$data['scene_status'] = 1;
		}elseif ($_REQUEST['type']=="realname"){
			$data['real_status'] = 1;
		}
	}
	$result = userClass::GetList($data);
	
	if (is_array($result)){
		$pages->set_data($result);
		$_A['user_all_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	
	}else{
		$msg = array($result);
	}
}


/**
 * 审核
**/
elseif ($_A['query_type'] == "audit"){
	require_once("modules/credit/credit.class.php");
	require_once("modules/message/message.class.php");
	
	if (isset($_POST['status'])){
		if($_SESSION['valicode']!=$_POST['valicode']){
				$msg = array("验证码不正确");
		}else{
			$_name = array("realname"=>"实名认证","email"=>"邮箱认证","phone"=>"手机认证","video"=>"视频认证","scene"=>"现场认证");
			if ($_POST['status']==2){
				$data['name'] = $_name[$_POST['nid']]."审核没通过";
				$user->UpdateUser(array("user_id"=>$_POST['user_id'],"real_status"=>0));//用户的认证状态归为0
			}elseif ($_POST['status']==1){
				$_res = true;
				$_data['user_id'] = $_POST['user_id'];
				$user_result = userClass::GetOne($_data);
				if ($_POST['nid']=="realname"){
					if ($user_result['real_status']!=1){
						include_once(ROOT_PATH."/modules/account/account.class.php");
						$account_result =  accountClass::GetOne($_data);
						$log['user_id'] = $_data['user_id'];
						$log['type'] = "realname";
						$realname_money = (isset($_G["system"]["con_realname_fee"])  && $_G["system"]["con_realname_fee"] >0 )?$_G["system"]["con_realname_fee"]:5;
						$log['money'] = $realname_money;
						$log['total'] = $account_result['total']-$log['money'];
						$log['use_money'] = $account_result['use_money']-$log['money'];
						$log['no_use_money'] = $account_result['no_use_money'];
						$log['collection'] = $account_result['collection'];
						$log['to_user'] = 0;
						$log['remark'] = "实名认证扣除费用";
						accountClass::AddLog($log);
						$user->UpdateUser(array("user_id"=>$_POST['user_id'],"real_status"=>1));//用户的真实姓名状态
					}else{
						$_res = false;
					}
				}elseif($_POST['nid']=="phone"){
					if ($user_result['phone_status']==1){
						$_res = false;
					}else{
						if ($user_result['phone_status']>1){
							$phone = $user_result['phone_status'];
							$user->UpdateUser(array("user_id"=>$_POST['user_id'],"phone"=>$phone,"phone_status"=>1));
						}else{
							$user->UpdateUser(array("user_id"=>$_POST['user_id'],"phone_status"=>1));
						}
					}
				}elseif ($_POST['nid']=="video"){
					if ($user_result['video_status']==1){
						
						$_res = false;
					}else{
						if ($_G['system']["con_video_feestatus"]==1){
							include_once(ROOT_PATH."/modules/account/account.class.php");
							$account_result =  accountClass::GetOne($_data);
							$log['user_id'] = $_data['user_id'];
							$log['type'] = "video";
							$log['money'] = 10;
							$log['total'] = $account_result['total']-$log['money'];
							$log['use_money'] = $account_result['use_money']-$log['money'];
							$log['no_use_money'] = $account_result['no_use_money'];
							$log['collection'] = $account_result['collection'];
							$log['to_user'] = 0;
							$log['remark'] = "视频认证扣除费用";
							accountClass::AddLog($log);
						}
						$user->UpdateUser(array("user_id"=>$_POST['user_id'],"video_status"=>1));//视频认证
					}
				}elseif ($_POST['nid']=="scene"){
					if ($user_result['scene_status']==1){
						$_res = false;
					}else{
						$user->UpdateUser(array("user_id"=>$_POST['user_id'],"scene_status"=>1));//视频认证
					}
				}
				if ($_res==true){
					$credit['nid'] = $_POST['nid'];
					$credit['user_id'] = $_POST['user_id'];
					$credit['value'] = $_POST['jifen'];
					$credit['op_user'] = $_G['user_id'];
					$credit['op'] = 1;//增加
					$credit['remark'] = nl2br($_POST['content']);
					creditClass::UpdateCredit($credit);//更新积分
					$data['name'] = $_name[$_POST['nid']]."审核通过，加信用积分{$_POST['jifen']}分。";
				}
				$_SESSION['valicode'] = "";
			}
		}
		if ($_res==true){
			$data['sent_user'] = "admin";
			$data['receive_user'] = $_POST['user_id'];
			$data['content'] = nl2br($_POST['content']);
			$data['type'] = "system";
			$data['status'] = 0;
			messageClass::Add($data);//发送短消息
			$msg = array("修改成功","",$_A['query_url']."/all".$_A['site_url']);
		}else{
			$msg = array("此信息已经审核过，请不要重复审核。");
		}
	}else{
		$type = $_REQUEST['type'];
		$result = creditClass::GetTypeOne(array("nid"=>$type));
		$_A['arrestation_value'] = $result['value'];
		$_A['credit_type_id'] = $result['id'];
		$magic->assign("_A",$_A);
		$magic->display("audit.tpl","modules/attestation");exit;
	}
	
	
}


/**
 * VIP用户
**/
elseif ($_A['query_type'] == "vip"){
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$data['vip_status'] = isset($_REQUEST['type'])?$_REQUEST['type']:"2";
	if($_G['user_result']['type_id']==3){
		$data['kefu_userid'] = $_G['user_id'];
	}
	if (isset($_REQUEST['username']) && $_REQUEST['username']!=""){
		$data['username'] = $_REQUEST['username'];
	}
	if (isset($_REQUEST['realname']) && $_REQUEST['realname']!=""){
		$data['realname'] = $_REQUEST['realname'];
	}
	if (isset($_REQUEST['keywords']) && $_REQUEST['keywords']!=""){
		$data['username'] = $_REQUEST['keywords'];
	}
	if (isset($_REQUEST['kefu']) && $_REQUEST['kefu']!=""){
		$data['kefu_username'] = $_REQUEST['kefu'];
	}
	$result = userClass::GetList($data);//0表示用户组的类别，1表示管理组的类型
	$pages->set_data($result);
	
	$_A['user_vip_list'] = $result['list'];
	$_A['showpage'] = $pages->show(3);
	
}



/**
 * VIP用户
**/
elseif ($_A['query_type'] == "jifen"){
	if ($_POST['id']!=""){
		$_val = 0;
		foreach ($_POST['id'] as $key => $_value){
			$sql = "update `{credit_log}` set value='{$_POST['val'][$key]}' where id='{$_value}'";
			$mysql->db_query($sql);
			$_val +=$_POST['val'][$key];
		}
		$sql = "update  `{credit}` set value = {$_val}  where user_id='{$_POST['user_id']}'";
		$mysql->db_query($sql);
		$sql = "update  `{user_cache}` set credit = {$_val}  where user_id='{$_POST['user_id']}'";
		$mysql->db_query($sql);
		$msg = array("修改成功");
	}else{
		$sql = "select p1.*,p2.username,p2.realname,p3.name as typename from `{credit_log}` as p1 
		left join `{user}` as p2 on p1.user_id=p2.user_id 
		left join `{credit_type}` as p3 on p1.type_id=p3.id
		where p1.user_id='{$_REQUEST['user_id']}'";
		$result = $mysql->db_fetch_arrays($sql);
		$_A['jifen_result'] = $result;
	}
	
}

/**
 * VIP审核查看
**/
elseif ($_A['query_type'] == "vipview"){
	if (isset($_POST['vip_status'])){
		$var = array("vip_status","vip_verify_remark","user_id");
		$data = post_var($var);
		if ($data['vip_status']==1){
			$data['vip_verify_time'] = time();
		}
		$user_id=$_REQUEST['user_id'];
		$data['user_id'] = $user_id;
		$result = userClass::GetOne($data);
		if($result['vip_status']==1){
			$msg = array("vip已经审核通过，请不要重复审核");
		}else{
			$result = userClass::UpdateUserCache($data);//更新
			include_once(ROOT_PATH."/modules/account/account.class.php");
			include_once(ROOT_PATH."/modules/message/message.class.php");
			if ($data['vip_status']==1){
				//ulk
				$sqls="update `{user_amount}` set credit=credit+50000,credit_use=credit_use+50000,borrow_vouch=borrow_vouch+50000,borrow_vouch_use=borrow_vouch_use+50000 where user_id='$user_id'";
				attestationClass::Updatesql($sqls);
				
				//扣除vip的会员费。
				accountClass::AccountVip(array("user_id"=>$user_id));
				
				$message['sent_user'] = 0;
				$message['receive_user'] = $user_id;
				$message['name'] = "VIP审核通过";
				$message['content'] = "您的vip在".date("Y-m-d",time())."通过审核。";
				$message['type'] = "system";
				$message['status'] = 0;
				messageClass::Add($message);//发送短消息
				$msg = array("VIP用户审核成功","","{$_A['query_url']}/vip");
				
				//提醒设置
				$remind['nid'] = "vip_yes";
				$remind['sent_user'] = "0";
				$remind['receive_user'] = $user_id;
				$remind['title'] = "VIP审核通过";
				$remind['content'] = "您的vip在".date("Y-m-d",time())."通过审核。";
				$remind['type'] = "system";
				remindClass::sendRemind($remind);
			}else{
				$msg = array("VIP用户审核成功","","{$_A['query_url']}/vip");
				
				//提醒设置
				$remind['nid'] = "vip_no";
				$remind['sent_user'] = "0";
				$remind['receive_user'] = $user_id;
				$remind['title'] = "VIP审核不通过";
				$remind['content'] = "您的vip在".date("Y-m-d",time())."没有通过审核。";
				$remind['type'] = "system";
				remindClass::sendRemind($remind);
			}
		}
		
		$user->add_log($_log,$result);//记录操作
	}else{
		$_A['user_result'] = userClass::GetOne(array("user_id"=>$_REQUEST['user_id']));
	}
}

//防止乱操作
else{
	$msg = array("输入有误，请不要乱操作","",$url);
}
?>