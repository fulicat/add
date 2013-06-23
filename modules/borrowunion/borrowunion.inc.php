<?php
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
include_once("borrow.class.php");

if ($_U['query_type'] == "add" || $_U['query_type'] == "update"){	
	if (!isset($_POST['name'])){
		$msg = array("请不要乱操作","","/publish/index.html");
	}elseif ($_POST['valicode']!=$_SESSION['valicode']){
		$msg = array("验证码不正确");
	}else{	
		
		$var = array("name","use","time_limit","style","account","apr","lowest_account","most_account","valid_time","award","part_account","funds","is_false","open_account","open_borrow","open_tender","open_credit","content");
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
		}else{
			$data['id'] = $_POST['id'];
			$data['user_id'] = $_G['user_id'];
			$result = borrowClass::Update($data);
		}
		if ($result===true){
			$msg = array("借款操作成功","","/index.php?user&q=code/borrow/publish");
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
		$msg = array("撤销成功");
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
		$borrow_result = borrowClass::GetOne(array("id"=>$_POST['id']));//获取借款标的单独信息
		if (!is_array($borrow_result)){
			$msg = array($borrow_result);
		}elseif ($borrow_result['account_yes']>=$borrow_result['account']){
			$msg = array("此标已满，请勿再投");
		}elseif ($borrow_result['verify_time'] == "" || $borrow_result['status'] != 1){
			$msg = array("此标尚未通过审核");
		}elseif ($borrow_result['verify_time'] + $borrow_result['valid_time']>time()){
			$msg = array("此标已过期");
		}else{
			$account_money = $_POST['money'];
			if (($borrow_result['account']-$borrow_result['account_yes'])<$account_money){
				$account_money = $borrow_result['account']-$borrow_result['account_yes'];
			}else{
				
			}
			$data['borrow_id'] = $_POST['id'];
			$data['money'] = $_POST['money'];
			
			$data['account'] = $account_money;
			$data['user_id'] = $_G['user_id'];
			$data['status'] = 1;
			
			$result = borrowClass::AddTender($data);//添加借款标
			
			$account_result =  accountClass::GetOne(array("user_id"=>$_G['user_id']));//获取当前用户的余额
			
			$log['user_id'] = $_G['user_id'];
			$log['type'] = "tender";
			$log['money'] = $account_money;
			$log['total'] = $account_result['total'];
			$log['use_money'] =  $account_result['use_money']-$log['money'];
			$log['no_use_money'] =  $account_result['no_use_money']+$log['money'];
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
$template = "user_borrow.html";
?>
