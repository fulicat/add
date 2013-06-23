<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
check_rank("account_".$_A['query_type']);//检查权限

include_once("account.class.php");

$_A['list_purview'] =  array("account"=>array("账号资金管理"=>array("account_list"=>"信息列表","account_bank"=>"银行帐户","account_cash"=>"提现记录","account_recharge"=>"充值记录","account_log"=>"资金记录")));//权限
$_A['list_name'] = $_A['module_result']['name'];
$_A['list_menu'] = "<a href='{$_A['query_url']}{$_A['site_url']}'>帐户信息列表</a> - <a href='{$_A['query_url']}/cash&status=0{$_A['site_url']}'>申请提现</a> - <a href='{$_A['query_url']}/cash&status=1{$_A['site_url']}'>提现成功</a> -  - <a href='{$_A['query_url']}/cash&status=2{$_A['site_url']}'>提现失败</a> - <a href='{$_A['query_url']}/recharge{$_A['site_url']}'>充值记录</a>  - <a href='{$_A['query_url']}/log{$_A['site_url']}'>资金记录</a> - <a href='{$_A['query_url']}/recharge_new{$_A['site_url']}'>添加充值</a> - <a href='{$_A['query_url']}/deduct{$_A['site_url']}'>扣除费用</a>";


/**
 * 如果类型为空的话则显示所有的文件列表
**/
if ($_A['query_type'] == "list"){
	$_A['list_title'] = "帐户信息列表";
	
	if (isset($_REQUEST['user_id']) && $_REQUEST['user_id']!=""){
		$data['user_id'] = $_REQUEST['user_id'];
	}
	
	if (isset($_REQUEST['username']) && $_REQUEST['username']!=""){
		$data['username'] = $_REQUEST['username'];
	}
	
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$result = accountClass::GetList($data);
	
	if (is_array($result)){
		$pages->set_data($result);
		$_A['account_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	
	}else{
		$msg = array($result);
	}
}

	
/**
 * 提现记录
**/
elseif ($_A['query_type'] == "cash"){
	$_A['list_title'] = "提现记录";
	
	if (isset($_REQUEST['user_id'])){
		$data['user_id'] = $_REQUEST['user_id'];
	}
	
	if (isset($_REQUEST['username'])){
		$data['username'] = $_REQUEST['username'];
	}
	if (isset($_REQUEST['status']) && $_REQUEST['status']!=""){
		$data['status'] = $_REQUEST['status'];
	}
	if (isset($_REQUEST['type']) && $_REQUEST['type']=="excel"){
		$title = array("Id","用户名称","真实姓名","提现账号","提现银行","支行","提现总额","到账金额","手续费","提现时间","状态");
		$data['limit'] = "all";
		$result = accountClass::GetCashList($data);
		foreach ($result as $key => $value){
			 if ($value["status"]==1){
			 	$state  = "审核通过";
			 }elseif ($value["status"]==0){
			 	$state  = "申请中";
			 }elseif ($value["status"]==2){
			 	$state  = "申请拒绝";
			 }
			
			$_data[$key] = array($key+1,$value['username'],$value['realname'],"[".$value['account']."]",$value['bank_name'],$value['branch'],$value['total'],$value['credited'],$value['fee'],date("Y-m-d",$value['addtime']),$state);
		}
		exportData("提现列表",$title,$_data);
		exit;
	}
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$result = accountClass::GetCashList($data);
	
	if (is_array($result)){
		$pages->set_data($result);
		$_A['account_cash_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	
	}else{
		$msg = array($result);
	}
}
/**
 * 提现审核查看
**/
elseif ($_A['query_type'] == "cash_view"){
	$_A['list_title'] = "提现审核查看";
	if (isset($_POST['id'])){
		$var = array("id","status","credited","fee","verify_remark");
		$data = post_var($var);
		$result = accountClass::GetCashOne(array("id"=>$data['id'],"user_id"=>$_POST['user_id']));
		if ($data['status']==1){
			$account_result =  accountClass::GetOne(array("user_id"=>$_POST['user_id']));
			$log['user_id'] = $_POST['user_id'];
			$log['type'] = "recharge_success";
			$log['money'] = $result['total'];
			$log['total'] = $account_result['total'] - $log['money'];
			$log['use_money'] = $account_result['use_money'] ;
			$log['no_use_money'] = $account_result['no_use_money'] - $log['money'];
			$log['collection'] = $account_result['collection'];
			$log['to_user'] = "0";
			$log['remark'] = "提现成功";
			$result = accountClass::AddLog($log);
			
			//提醒设置
			$remind['nid'] = "cash_yes";
			$remind['sent_user'] = "0";
			$remind['receive_user'] = $_POST['user_id'];
			$remind['title'] = "提现{$log['total']}元已成功";
			$remind['content'] = "您已经于".date("Y-m-d",time())."成功提现了{$log['total']}元";
			$remind['type'] = "cash";
			remindClass::sendRemind($remind);
		}elseif ($data['status']==2){
			$account_result =  accountClass::GetOne(array("user_id"=>$_POST['user_id']));
			$log['user_id'] = $_POST['user_id'];
			$log['type'] = "recharge_false";
			$log['money'] = $result['total'];
			$log['total'] = $account_result['total'];
			$log['use_money'] = $account_result['use_money'] + $log['money'];
			$log['no_use_money'] = $account_result['no_use_money']- $log['money'];
			$log['collection'] = $account_result['collection'];
			$log['to_user'] = "0";
			$log['remark'] = "提现失败";
			$result = accountClass::AddLog($log);
			
			
			//提醒设置
			$remind['nid'] = "cash_no";
			$remind['sent_user'] = "0";
			$remind['receive_user'] = $_POST['user_id'];
			$remind['title'] = "提现{$log['total']}元失败";
			$remind['content'] = date("Y-m-d",time())."提现{$log['total']}元失败";
			$remind['type'] = "cash";
			remindClass::sendRemind($remind);
		}
		$data['verify_userid'] = $_G['user_id'];
		$data['verify_time'] = time();
		$data['user_id'] = $_POST['user_id'];
		$result = accountClass::UpdateCash($data);
		if ($result !== true){
			$msg = array($result);
		}else{
			$msg = array("操作成功","",$_A['query_url']."/cash".$_A['site_url']);
		}

		$user->add_log($_log,$result);//记录操作
	}else{
		$data['id'] = $_REQUEST['id'];
		$_A['account_cash_result'] = accountClass::GetCashOne($data);
	}
}

/**
 * 账号充值
**/
elseif ($_A['query_type'] == "recharge_view"){
	$_A['list_title'] = "充值查看";
	if (isset($_POST['id'])){
		$var = array("id","status","verify_remark");
		$data = post_var($var);
		$result = accountClass::GetRechargeOne(array("id"=>$_POST['id']));
		if ($result['status']!=0){
			$msg = array("此充值已经审核，请不要重复审核。");
		}else{
			if ($data['status']==1){
				
				$account_result =  accountClass::GetOne(array("user_id"=>$result['user_id']));
				$log['user_id'] = $result['user_id'];
				$log['type'] = "recharge";
				$log['money'] = $result['money'];
				$log['total'] = $account_result['total']+$result['money'];
				$log['use_money'] =  $account_result['use_money']+$result['money'];
				$log['no_use_money'] =  $account_result['no_use_money'];
				$log['collection'] = $account_result['collection'];
				$log['to_user'] = "0";
				$log['remark'] = "账号充值";
				accountClass::AddLog($log);
				
				if($result['fee']!=0){
					$account_result =  accountClass::GetOne(array("user_id"=>$result['user_id']));
					$log['user_id'] = $result['user_id'];
					$log['type'] = "fee";
					$log['money'] = $result['fee'];
					$log['total'] =$account_result['total']-$log['money'];
					$log['use_money'] = $account_result['use_money']-$log['money'];
					$log['no_use_money'] = $account_result['no_use_money'];
					$log['collection'] = $account_result['collection'];
					$log['to_user'] = "0";
					$log['remark'] = "充值手续费扣除";
					accountClass::AddLog($log);
				}
				
				//判断vip会员费是否扣除
				accountClass::AccountVip(array("user_id"=>$result['user_id']));
				
				
				//提醒设置
				$remind['nid'] = "recharge";
				$remind['sent_user'] = "0";
				$remind['receive_user'] = $result['user_id'];
				$remind['title'] = "充值{$result['money']}元已成功";
				$remind['content'] = "您已经于".date("Y-m-d",time())."成功充值{$result['money']}元";
				$remind['type'] = "recharge";
				remindClass::sendRemind($remind);
				
			}elseif ($data['status']==2){
				
				//提醒设置
				$remind['nid'] = "recharge";
				$remind['sent_user'] = "0";
				$remind['receive_user'] = $result['user_id'];
				$remind['title'] = "充值{$result['money']}元失败";
				$remind['content'] = date("Y-m-d",time())."充值{$result['money']}元审核失败";
				$remind['type'] = "recharge";
				remindClass::sendRemind($remind);
			
			}
			
			$data['verify_userid'] = $_G['user_id'];
			$data['verify_time'] = time();
			$result = accountClass::UpdateRecharge($data);
		
			if ($result !== true){
				$msg = array($result);
			}else{
				$msg = array("操作成功","",$_A['query_url']."/recharge".$_A['site_url']);
			}
		}
		$user->add_log($_log,$result);//记录操作
	}else{
		$data['id'] = $_REQUEST['id'];
		$_A['account_recharge_result'] = accountClass::GetRechargeOne($data);
	}
}
	
/**
 * 充值记录
**/
elseif ($_A['query_type'] == "recharge"){
	$_A['list_title'] = "充值记录";
	
	if (isset($_REQUEST['user_id'])){
		$data['user_id'] = $_REQUEST['user_id'];
	}
	
	if (isset($_REQUEST['username'])){
		$data['username'] = $_REQUEST['username'];
	}
	
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$result = accountClass::GetRechargeList($data);
	
	if (is_array($result)){
		$pages->set_data($result);
		$_A['account_recharge_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
		if (isset($_REQUEST['type']) && $_REQUEST['type']=="excel"){
			$title = array("序号","用户名称","类型","所属银行","充值金额","费用","到账金额","充值时间","状态");
			$data['limit'] = "all";
			$result = accountClass::GetRechargeList($data);
			foreach ($result as $key => $value){
				 if ($value['type']==1){ $type = "网上充值";}else{ $type = "线下充值";}
				 if ($value['payment']==0){ $payment = "手动充值";}else{ $payment_name = "线下充值";}
				 if ($value['status']==0){ $status = "审核";}elseif ($value['status']==1){ $status = "成功";}else{ $status = "失败";}
				
				$_data[$key] = array($key+1,$value['username'],$type,$payment,$value['money'],$value['fee'],$value['total'],date("Y-m-d H:i",$value['addtime']),$status);
			}
			exportData("充值列表",$title,$_data);
			exit;
		}
	}else{
		$msg = array($result);
	}
}

/**
 * 充值记录
**/
elseif ($_A['query_type'] == "recharge_new"){
	if(isset($_POST['username']) && $_POST['username']!=""){
		$_data['username'] = $_POST['username'];
		$result = userClass::GetOnes($_data);
		if ($result==false){
			$msg = array("用户名不存在");
		}else{
			$data['user_id'] = $result['user_id'];
			$data['status'] = 0;
			$data['money'] = $_POST['money'];
			$data['type']==2;
			$data['payment'] = 0;
			$data['fee'] = 0;
			$data['trade_no'] = time().$result['user_id'].rand(1,9);
			$result = accountClass::AddRecharge($data);
			if ($result !== true){
				$msg = array($result);
			}else{
				$msg = array("操作成功");
			}
		}
	}
}

/**
 * 扣除费用
**/
elseif ($_A['query_type'] == "deduct"){
	if(isset($_POST['username']) && $_POST['username']!=""){
		$_data['username'] = $_POST['username'];
		$result = userClass::GetOnes($_data);
		if ($result==false){
			$msg = array("用户名不存在");
		}elseif ($_POST['valicode']!=$_SESSION['valicode']){
			$msg = array("验证码不正确");
		}else{
			$data['user_id'] = $result['user_id'];
			$data['money'] = $_POST['money'];
			$data['type'] = $_POST['type'];
			$data['remark'] = $_POST['remark'];
			$result = accountClass::Deduct($data);
			if ($result !== true){
				$msg = array($result);
			}else{
				$msg = array("费用已成功扣除","",$_A['query_url']."/deduct");
				$_SESSION['valicode'] = "";
			}
		}
	}
}


/**
 * 资金使用记录
**/
elseif ($_A['query_type'] == "log"){
	$_A['list_title'] = "资金使用记录";
	
	if (isset($_REQUEST['user_id'])){
		$data['user_id'] = $_REQUEST['user_id'];
	}
	
	if (isset($_REQUEST['username'])){
		$data['username'] = $_REQUEST['username'];
	}
	
	if (isset($_REQUEST['type'])){
		$data['type'] = $_REQUEST['type'];
	}
	
	if (isset($_REQUEST['dotime1'])){
		$data['dotime1'] = $_REQUEST['dotime1'];
	}
	
	if (isset($_REQUEST['dotime2'])){
		$data['dotime2'] = $_REQUEST['dotime2'];
	}
	
	$data['page'] = $_A['page'];
	$data['epage'] = $_A['epage'];
	$result = accountClass::GetLogList($data);
	
	if (is_array($result)){
		$pages->set_data($result);
		$_A['account_log_list'] = $result['list'];
		$_A['showpage'] = $pages->show(3);
	
	}else{
		$msg = array($result);
	}
}


/**
 * 查看
**/
elseif ($_A['query_type'] == "view"){
	$_A['list_title'] = "查看认证";
	if (isset($_POST['id'])){
		$var = array("id","status","verify_remark","jifen");
		$data = post_var($var);
		$data['verify_user'] = $_SESSION['user_id'];
		$result = accountClass::Update($data);
		
		if ($result !== true){
			$msg = array($result);
		}else{
			$msg = array("操作成功");
		}
		$user->add_log($_log,$result);//记录操作
	}else{
		$data['id'] = $_REQUEST['id'];
		$_A['account_result'] = accountClass::GetOne($data);
	}
}



//防止乱操作
else{
	$msg = array("输入有误，请不要乱操作");
}
?>