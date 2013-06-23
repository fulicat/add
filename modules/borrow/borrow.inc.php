<?php
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
include_once("borrow.class.php");

if ($_U['query_type'] == "add" || $_U['query_type'] == "update"){	
	if (!isset($_POST['name'])){
		$msg = array("请不要乱操作","","/publish/index.html");
	}elseif ($_POST['valicode']!=$_SESSION['valicode']){
		$msg = array("验证码不正确");
	}elseif($_POST['style']==1 && $_POST['time_limit']%3!=0){
		$msg = array("您选择的是按季还款，借款期限请填写3的倍数");
	}else{	
		
		$var = array("name","use","time_limit","style","account","apr","lowest_account","most_account","valid_time","award","part_account","funds","is_false","open_account","open_borrow","open_tender","open_credit","content","is_vouch","vouch_award","vouch_user");
		$data = post_var($var);
		$data['open_account'] = 1;
		$data['open_borrow'] = 1;
		$data['open_credit'] = 1;
		if ($_POST['submit']=="保存草稿"){
			$data['status'] = -1;
		}else{
			$data['status'] =0;
		}
		$data['user_id'] = $_G['user_id'];
		if ($_U['query_type'] == "add"){
			$result = borrowClass::Add($data);
			//借款标的审核额度的
		}else{
			$data['id'] = $_POST['id'];
			$data['user_id'] = $_G['user_id'];
			$result = borrowClass::Update($data);
		}
		if ($result===true){
			$msg = array("借款操作成功,请等待审核。","","/index.php?user&q=code/borrow/publish");
		}else{
			$msg = array($result);
		}
		
	}
	
}elseif ($_U['query_type'] == "cancel"){
	$data['id'] = $_REQUEST['id'];
	$data['user_id'] = $_G['user_id'];
	$result = borrowClass::Cancel($data);
	if ($result==false){
		$msg = array($result);
	}else{
		
		$msg = array("撤销成功","","index.php?user&q=code/borrow/publish");
	}
}

//删除
elseif ($_U['query_type'] == "del"){
	$data['id'] = $_REQUEST['id'];
	$data['user_id'] = $_G['user_id'];
	$data['status'] = -1;
	$result = borrowClass::Delete($data);
	if ($result==false){
		$msg = array($result);
	}else{
		$msg = array("招标删除成功!");
	}
}

//用户投标
elseif ($_U['query_type'] == "tender"){
	if ($_SESSION['valicode']!=$_POST['valicode']){
		$msg = array("验证码错误");
	}else{
		include_once(ROOT_PATH."modules/account/account.class.php");
		$borrow_result = borrowClass::GetOne(array("id"=>$_POST['id'],"tender_userid"=>$_G['user_id']));//获取借款标的单独信息
		$account_money = $_POST['money'];
		if ($_G['user_result']['islock']==1){
			$msg = array("您账号已经被锁定，不能进行投标，请跟管理员联系");
		}elseif (!is_array($borrow_result)){
			$msg = array($borrow_result);
		}elseif ($borrow_result['account_yes']>=$borrow_result['account']){
			$msg = array("此标已满，请勿再投");
		}elseif ($borrow_result['verify_time'] == "" || $borrow_result['status'] != 1){
			$msg = array("此标尚未通过审核");
		}elseif ($borrow_result['verify_time'] + $borrow_result['valid_time']>time()){
			$msg = array("此标已过期");
		}elseif(!is_numeric($account_money)){
			$msg = array("请输入正确的金额");
		}elseif ($borrow_result['most_account']>0 && ($borrow_result['tender_yes'] > $borrow_result['most_account'] || $borrow_result['tender_yes']+$account_money>$borrow_result['most_account'])){
			$msg = array("你的总投标金额".($borrow_result['tender_yes']+$account_money)."已经超过最高金额{$borrow_result['most_account']}");
		}elseif (md5($_POST['paypassword'])!=$_G['user_result']['paypassword']){
			$msg = array("支付交易密码不正确");
		}else{
			$account_result =  accountClass::GetOne(array("user_id"=>$_G['user_id']));//获取当前用户的余额
			
			if (($borrow_result['account']-$borrow_result['account_yes'])<$account_money){
				$account_money = $borrow_result['account']-$borrow_result['account_yes'];
			}
			if ($account_result['use_money']<$account_money){
				$msg = array("您的余额不足");
			}else{
				$data['borrow_id'] = $_POST['id'];
				$data['money'] = $_POST['money'];
				
				$data['account'] = $account_money;
				$data['user_id'] = $_G['user_id'];
				$data['status'] = 1;
				
				$result = borrowClass::AddTender($data);//添加借款标
				
				//投标金额冻结
				
				$log['user_id'] = $_G['user_id'];
				$log['type'] = "tender";
				$log['money'] = $account_money;
				$log['total'] = $account_result['total'];
				$log['use_money'] =  $account_result['use_money']-$log['money'];
				$log['no_use_money'] =  $account_result['no_use_money']+$log['money'];
				$log['collection'] =  $account_result['collection'];
				$log['to_user'] = $borrow_result['user_id'];
				$log['remark'] = "投标冻结资金";
				accountClass::AddLog($log);//添加记录
				
				if ($result==false){
					$msg = array($result);
				}else{
					$msg = array("投标成功","","/index.php?user&q=code/borrow/bid");
				}
			}
		}
	}
}



//担保标投标
elseif ($_U['query_type'] == "vouch"){
	$msg = "";
	if ($_SESSION['valicode']!=$_POST['valicode']){
		$msg = array("验证码错误");
	}else{
		include_once(ROOT_PATH."modules/account/account.class.php");
		$borrow_result = borrowClass::GetOne(array("id"=>$_POST['id'],"tender_userid"=>$_G['user_id']));//获取借款标的单独信息
		
		$vouch_account = $_POST['money'];
		if (($borrow_result['account']-$borrow_result['vouch_account'])<$vouch_account){
			$account_money = $borrow_result['account']-$borrow_result['vouch_account'];
		}else{
			$account_money = $vouch_account;
		}
		if ($_G['user_result']['islock']==1){
			$msg = array("您账号已经被锁定，不能进行担保，请跟管理员联系");
		}elseif (!is_array($borrow_result)){
			$msg = array($borrow_result);
		}elseif ($borrow_result['vouch_account']>=$borrow_result['account']){
			$msg = array("此担保标担保金额已满，请勿再担保");
		}elseif ($borrow_result['verify_time'] == "" || $borrow_result['status'] != 1){
			$msg = array("此标尚未通过审核");
		}elseif ($borrow_result['verify_time'] + $borrow_result['valid_time']>time()){
			$msg = array("此标已过期");
		}elseif (md5($_POST['paypassword'])!=$_G['user_result']['paypassword']){
			$msg = array("支付交易密码不正确");
		}else{
			//获取投资的担保额度
			$vouch_amount =  borrowClass::GetAmountOne($_G['user_id'],"tender_vouch");
			
			if ($vouch_amount['account_use']<$account_money){
				$msg = array("您的担保金额不足");
			}else{
				$data['borrow_id'] = $_POST['id'];
				$data['vouch_account'] = $vouch_account;
				$data['account'] = $account_money;
				$data['user_id'] = $_G['user_id'];
				$data['content'] = $_POST['content'];
				$data['status'] = 0;
				
				//判断是否是担保人
				if ($borrow_result['vouch_user']!=""){
					$_vouch_user = explode("|",$borrow_result['vouch_user']);
					if (!in_array($_G['user_result']['username'],$_vouch_user)){
						$msg = array("此担保标已经指定了担保人，你不是此担保人，不能进行担保");
					}
				}
				if ($msg==""){
					$result = borrowClass::AddVouch($data);//添加担保标
					if ($result==false){
						$msg = array($result);
					}else{
						$msg = array("担保成功","","/index.php?user&q=code/borrow/bid");
						$_SESSION['valicode'] = "";
						
					}
				}
			}
		}
	}
}


//查看投标
elseif ($_U['query_type'] == "repayment_view"){
	$data['id'] = $_REQUEST['id'];
	if ($data['id']==""){
		$msg = array("您的输入有误");
	}
	$data['user_id'] = $_G['user_id'];
	$result =  borrowClass::GetOne($data);//获取当前用户的余额
	if ($result==false){
		$msg = array("您的操作有误");
	}else{
		$_U['borrow_result'] = $result;
	}
}

//还款
elseif ($_U['query_type'] == "repay"){
	$data['id'] = $_REQUEST['id'];
	if ($data['id']==""){
		$msg = array("您的输入有误");
	}
	$data['user_id'] = $_G['user_id'];
	$result =  borrowClass::Repay($data);//获取当前用户的余额
	if ($result!==true){
		$msg = array($result);
	}else{
		$msg = array("还款成功","","/index.php?user&q=code/borrow/repayment");
	}
}
//还款
elseif ($_U['query_type'] == "limitapp"){
	if (isset($_POST['account']) && $_POST['account']>0){
		$var = array("account","content","type","remark");
		$data = post_var($var);
		$data['user_id'] = $_G['user_id'];
		$result = borrowClass::GetAmountApplyOne(array("user_id"=>$data['user_id'],"type"=>$data['type']));
		if ($result!=false && $result['verify_time']+60*60*24*30 >time()){
			$msg = array("请一个月后再申请");
		}elseif ($result!=false && $result['addtime']+60*60*24*30 >time() && $result['status']==2){
			$msg = array("您已经提交了申请，请等待审核");
		}else{
			$data['status'] = 2;
			$result =  borrowClass::AddAmountApply($data);//获取当前用户的余额
			if ($result!==true){
				$msg = array($result);
			}else{
				$msg = array("额度申请成功，请等待管理员审核","","/index.php?user&q=code/borrow/limitapp");
			}
		}
	}else{
	
	
	}


}

$template = "user_borrow.html";
?>
