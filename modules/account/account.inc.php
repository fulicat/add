<?php
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问
include_once("account.class.php");

if (isset($_POST['valicode']) && $_POST['valicode']!=$_SESSION['valicode']){
//if (1!=1){
		$msg = array("验证码错误","",$_U['query_url']."/".$_U['query_type']);
}else{
	$_SESSION['valicode'] = "";
	if ($_U['query_type'] == "list"){	
		
	}
	
	elseif ($_U['query_type'] == "log"){	
		$data['user_id'] = $_G['user_id'];
		$data['page'] = $_U['page'];
		$data['epage'] = 20;
		$data['dotime1'] = isset($_REQUEST['dotime1'])?$_REQUEST['dotime1']:"";
		$data['dotime2'] = isset($_REQUEST['dotime2'])?$_REQUEST['dotime2']:"";
		$data['type'] = isset($_REQUEST['type'])?$_REQUEST['type']:"";
		$result = accountClass::GetLogList($data);
		if (is_array($result)){
			$pages->set_data($result);
			$_U['account_log_list'] = $result['list'];
			$_U['show_page'] = $pages->show(3);
			$_U['account_num'] = $result['account'];
		}else{
			$msg = array($result);
		}
	}
	
	elseif ($_U['query_type'] == "cash"){	
		$data['user_id'] = $_G['user_id'];
		$result = accountClass::GetUserLog($data);
		$_U['cash_log'] = $result;
		$data['page'] = $_U['page'];
		$data['epage'] = $_U['epage'];
		$result = accountClass::GetCashList($data);
		if (is_array($result)){
			$pages->set_data($result);
			$_U['account_cash_list'] = $result['list'];
			$_U['show_page'] = $pages->show(3);;
		}else{
			$msg = array($result);
		}
	}
	
	elseif ($_U['query_type'] == "recharge"){	
		$result = accountClass::GetUserLog(array("user_id"=>$_G['user_id']));
		$_U['account_log'] = $result;
	}
	
	elseif ($_U['query_type'] == "recharge_new"){
		include_once(ROOT_PATH."modules/payment/payment.class.php");
		if (isset($_POST['money'])){
			$data['user_id'] = $_G['user_id'];
			$data['status'] = 0;
			$data['money'] = $_POST['money'];
			if (is_numeric($data['money'])){
				$data['remark'] = $_POST['remark'];
				$data['type'] = $_POST['type'];
				$url = "";
				if ($data['type']==1){
					$data['payment'] = $_POST['payment1'];
					$data['remark'] = $_POST['payname'.$_POST['payment1']]."在线充值";
					if ($data['money'] >= 5000){
						$data['fee'] = 50;
					}else{
						$data['fee'] = $data['money']*0.01;
					}
				}else{
					$data['payment'] = $_POST['payment2'];
					$data['fee'] = 0;
				}
				
				
				$data['trade_no'] = time().$_G['user_id'].rand(1,9);
				$result = accountClass::AddRecharge($data);
				
				if ($data['type']==1){
					$data['subject'] = "账号充值";
					//$data['subject'] = $_G['system']['con_webname']."账号充值";
					$data['body'] = "账号充值";
					$url = paymentClass::ToSubmit($data);
				}
				
				if ($result!==true){
					$msg = array($result,"",$_U['query_url']."/".$_U['query_type']);
				}else{
					if ($url!=""){
						header("Location: {$url}");
						exit;
					$msg = array("网站正在转向支付网站<br>如果没反应，请点击下面的支付网站接口","支付网站",$url);
					}else{
					$msg = array("你已经成功提交了充值，请等待管理员的审核。","",$_U['query_url']."/".$_U['query_type']);
					}
				}
			}else{
				$msg = array("金额填写有误","",$_U['query_url']."/".$_U['query_type']);
			
			}
		}else{
			$_U['account_payment_list'] = paymentClass::GetList(array("status"=>1));
			
		}
	}
	elseif ($_U['query_type'] == "bank"){	
		if (isset($_POST['account'])){
			$var = array("user_id","account","bank","branch");
			$data = post_var($var);
			$result = accountClass::ActionBank($data);
			if ($result!==true){
				$msg = array($result);
			}else{
				$msg = array("操作成功");
			}
		}else{
			$data['user_id'] = $_G["user_id"];
			$result = accountClass::GetBankOne($data);
			$_U['account_bank_result'] = $result;
		}
	}
	
	elseif ($_U['query_type'] == "bank"){	
		if (isset($_POST['account'])){
			$var = array("user_id","account","bank","branch");
			$data = post_var($var);
			$result = accountClass::ActionBank($data);
			if ($result!==true){
				$msg = array($result);
			}else{
				$msg = array("操作成功");
			}
		}else{
			$data['user_id'] = $_G["user_id"];
			$result = accountClass::GetBankOne($data);
			$_U['account_bank_result'] = $result;
		}
	}
	
	
	elseif ($_U['query_type'] == "cash_new"){	
		
		$data['user_id'] = $_G["user_id"];
		$result = accountClass::GetBankOne($data);
		$_U['account_bank_result'] = $result;
		if ($result['bank']==""){
			$msg = array("您的银行账号还没填写，请先填写","","{$_U['query_url']}/bank");
		}else{
			if(isset($_POST['money'])){
				if ($result['paypassword']==md5($_POST['paypassword'])){
					$data['status'] = 0;
					$data['total'] = $_POST['money'];
					if (is_numeric($data['total'])){
						$data['account'] = $result['account'];
						$data['bank'] = $result['bank'];
						$data['branch'] = $result['branch'];
						
						if (isset($_U["account_cash_status"]) && $_U["account_cash_status"]==1){
							$data["fee"] = GetCashFee($data['total']);
						}else{
						
							if ($data['total'] <= 10000){
								$data['fee'] = 6;
							}elseif ($data['total'] > 10000 && $data['total']<=20000){
								$data['fee'] = 8;
							}else{
								$data['fee'] = 10;
							}
						}
						/*
						if ($data['total'] >= 5000){
							$data['fee'] = 50;
						}else{
							$data['fee'] = $data['total']*0.01;
						}
						*/
						$data['credited']=$data['total']-$data['fee'];
						if ($data['total'] <= $result['use_money']){
							$_result = accountClass::AddCash($data);
							if ($_result!==true){
								$msg = array($_result);
							}else{
								$account_result =  accountClass::GetOne(array("user_id"=>$_G['user_id']));
								$log['user_id'] = $_G['user_id'];
								$log['type'] = "cash_frost";
								$log['money'] = $data['total'];
								$log['total'] = $account_result['total'];
								$log['use_money'] =  $account_result['use_money']-$log['money'];
								$log['no_use_money'] =  $account_result['no_use_money']+$log['money'];
								$log['collection'] =  $account_result['collection'];
								$log['to_user'] = "0";
								$log['remark'] = "用户提现申请";
								accountClass::AddLog($log);
								$msg = array("您的提现已经提交，我们将在两个工作日内为你审核");
							}
						}else{
							$msg = array("您的提现金额大于你所有的可用余额");
						}
					}else{
						$msg = array("金额填写有误");
					
					}
				}else{
					$msg = array("交易密码填写有误");
				}
			}
		}
	}
	
	//取消提现申请
	elseif ($_U['query_type'] == "cash_cancel"){
		$data['user_id'] =  $_G['user_id'];
		$data['id'] =  $_REQUEST['id'];
		$cash_result = accountClass::GetCashOne($data);
		
		if($cash_result!=false && $cash_result['status']==0){
			$data['status'] = 3;
			$_result = accountClass::UpdateCash($data);
			if ($_result!==true){
				$msg = array($_result);
			}else{
				$account_result = accountClass::GetOne($data);
				$log['user_id'] = $data['user_id'];
				$log['type'] = "cash_cancel";
				$log['money'] = $cash_result['total'];
				$log['total'] = $account_result['total'];
				$log['use_money'] = $account_result['use_money']+$cash_result['total'];
				$log['no_use_money'] = $account_result['no_use_money']-$cash_result['total'];
				$log['collection'] =  $account_result['collection'];
				$log['to_user'] = "0";
				$log['remark'] = "取消提现解冻";
				accountClass::AddLog($log);
				$msg = array("成功取消提现");
			}
		}else{
			$msg = array("请不要乱操作");
		}
	
	}
}
	
$template = "user_account.html";
?>
