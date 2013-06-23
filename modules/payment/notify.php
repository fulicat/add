<?php
include ("../../core/config.inc.php");
?>
<?php
$sta = $_REQUEST['trade_status'];//='TRADE_SUCCESS';
$trade_no = $_REQUEST['out_trade_no'];//='1318051954772';


if (is_success($sta)){
		global $mysql;
			$sql="select * from `{account_recharge}` where trade_no='$trade_no'";
			$result = $mysql->db_fetch_array($sql);
			
			$acsql="select * from `{account}` where user_id='".$result['user_id']."'";
			$account_result=$mysql->db_fetch_array($acsql);
			
			if ($result['status']==0){

				$log['user_id'] = $result['user_id'];
				$log['type'] = "recharge";
				$log['money'] = $result['money'];
				$log['total'] = $account_result['total']+$result['money'];
				$log['use_money'] =  $account_result['use_money']+$result['money'];
				$log['no_use_money'] =  $account_result['no_use_money'];
				$log['collection'] = $account_result['collection'];
				$log['to_user'] = "0";
				$log['remark'] = "账号充值";
				
				//sdf
				//$sqlup = "update `{account}` ";
				
				AddLog($log);

				if($result['fee']!=0){
					$acsql="select * from `{account}` where user_id='".$result['user_id']."'";
					$account_result=$mysql->db_fetch_array($acsql);
					
					//print_r();
					$log['user_id'] = $result['user_id'];
					$log['type'] = "fee";
					$log['money'] = $result['fee'];
					$log['total'] =$account_result['total']-$log['money'];
					$log['use_money'] = $account_result['use_money']-$log['money'];
					$log['no_use_money'] = $account_result['no_use_money'];
					$log['collection'] = $account_result['collection'];
					$log['to_user'] = "0";
					$log['remark'] = "充值手续费扣除";
					AddLog($log);
				}
				
				//判断vip会员费是否扣除
				//accountClass::AccountVip(array("user_id"=>$result['user_id']));
				
				
				//提醒设置
				$remind['nid'] = "recharge";
				$remind['sent_user'] = "0";
				$remind['receive_user'] = $result['user_id'];
				$remind['title'] = "充值{$result['money']}元已成功";
				$remind['content'] = "您已经于".date("Y-m-d",time())."成功充值{$result['money']}元";
				$remind['type'] = "recharge";
				sendRemind($remind);
				
			}elseif ($result['status']==2){
				
				//提醒设置
				$remind['nid'] = "recharge";
				$remind['sent_user'] = "0";
				$remind['receive_user'] = $result['user_id'];
				$remind['title'] = "充值{$result['money']}元失败";
				$remind['content'] = date("Y-m-d",time())."充值{$result['money']}元审核失败";
				$remind['type'] = "recharge";
				sendRemind($remind);
			
			}

			$rec['id'] = $result['id'];
			$rec['return'] = serialize($_REQUEST);
			$rec['status'] = 1;
			$rec['verify_userid'] = 0;
			$rec['verify_time'] = time();
			$rec['verify_remark'] = "成功充值";

			$result = UpdateRecharge($rec);
			if ($result !== true){
				$msg = array($result);
			}else{
				$msg = array("操作成功");
			}
}

function is_success($sta){
			$in['is_success']="T";
            switch($sta){
                case 'TRADE_FINISHED':
                    if($in['is_success']=='T'){                        
                        return true;
                    }else{                        
                        return false;
                    }
                    break;
                case 'TRADE_SUCCESS':
                    if($in['is_success']=='T'){                        
                        return true;
                    }else{                        
                        return false;
                    }
                    break;
                case 'WAIT_SELLER_SEND_GOODS':
                    if($in['is_success']=='T'){                        
                        return true;
                    }else{                        
                        return false;
                    }
                    break;
                case 'TRADE_SUCCES':    //高级用户
                    if($in['is_success']=='T'){
                        return true;
                    }else{                        
                        return false;
                    }
                    break;
            }
}


	function UpdateRecharge($data = array()){
		global $mysql;
		$id = $data['id'];
        if (empty($id)) return "";
		
		$_sql = "";
		$sql = "update `{account_recharge}` set ";
		foreach($data as $key => $value){
			$_sql[] .= "`$key` = '$value'";
		}
		$sql .= join(",",$_sql)." where id = '$id'";
        return $mysql->db_query($sql);
	}

	/**
	 * 添加资金使用记录
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function AddLog($data = array()){
		global $mysql;
        $user_id = isset($data['user_id'])?$data['user_id']:"";
		if (empty($user_id)) return "";
       	$total = $data['total'];
		$sql = "insert into `{account_log}` set `addtime` = '".time()."',`addip` = '".ip_address()."'";
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
		$result = $mysql->db_query($sql);
		$account['user_id'] = $user_id;
		$account['total'] = $total;
		if(isset($data['use_money'])){
			$account['use_money'] = $data['use_money'];
		}
		if(isset($data['no_use_money'])){
			$account['no_use_money'] = $data['no_use_money'];
		}
		if(isset($data['collection'])){
			$account['collection'] = $data['collection'];
		}
		$result = ActionAccount($account);
        return ;
	}

	
	function ActionAccount($data=array()){
		global $mysql;
		
		if (isset($data['user_id'])){
			$user_id = $data['user_id'];
			unset($data['user_id']);
			$sql = "select * from {account} where user_id=$user_id";
			$result = $mysql->db_fetch_array($sql);
			if ($result == false){
				$sql = "insert into `{account}` set `user_id` = '$user_id'";
				foreach($data as $key => $value){
					$sql .= ",`$key` = '$value'";
				}
			}else{
				$sql = "update `{account}` set `user_id` = '$user_id'";
				foreach($data as $key => $value){
					$sql .= ",`$key` = '$value'";
				}
				$sql .= " where user_id=$user_id";
			}
			return $mysql->db_query($sql);
		}else{
			return "";
		}
		
	}


	//nid,所要操作的标识名
	//title 标题
	//content 内容
	//phone，手机号码
	//email，邮箱
	//sent_user,发送用户id
	//receive_user,接收用户id
	//type,类型
	function SendRemind($data){
		global $mysql,$user;
		$sql = "select remind,email,phone from `{user}` where user_id={$data['receive_user']}";
		$result = $mysql->db_fetch_array($sql);
		$remind_user = unserialize ($result['remind']);
		
		$remind_result = GetNidOne(array("nid"=>$data['nid']));
		
		$message_status = isset($remind_user[$data['nid']]['message'])?$remind_user[$data['nid']]['message']:$remind_result['message'];	
		$email_status = isset($remind_user[$data['nid']]['email'])?$remind_user[$data['nid']]['email']:$remind_result['email'];	
		$phone_status = isset($remind_user[$data['nid']]['phone'])?$remind_user[$data['nid']]['phone']:$remind_result['phone'];		
				
		$email = isset($data['email'])?$data['email']:$result['email'];
		$phone = isset($data['phone'])?$data['phone']:$result['phone'];
		
		if ($message_status==1 || $message_status==3){
		require_once("modules/message/message.class.php");
		$message['sent_user'] = $data['sent_user'];
		$message['receive_user'] = $data['receive_user'];
		$message['name'] = $data['title'];
		$message['content'] = $data['content'];
		$message['type'] = $data['type'];
		$message['status'] = 0;
		Add($message);//发送短消息
		
		}
		
//		if ($email_status==1 || $email_status==3){
//			$remail['user_id'] = $data['receive_user'];
//			$remail['email'] = $email;
//			$remail['title'] = $data['title'];
//			$remail['msg'] =  $data['content'];
//			$remail['type'] =  $data['type'];
//			$result = $user->SendEmail($remail);
//		}
	
	}

	/**
	 * 查看
	 *
	 * @param Array $data
	 * @return Array
	 */
	function GetNidOne($data = array()){
		global $mysql;
		$nid = $data['nid'];
		if($nid == "") return "";
		$sql = "select * from {remind} where nid='$nid'";
		return $mysql->db_fetch_array($sql);
	}

	/**
	 * 添加
	 *
	 * @param Array $data
	 * @return Boolen
	 */
	function Add($data = array()){
		global $mysql;global $user;
       	$send_user = isset($data['sent_user'])?$data['sent_user']:"";
		$receive_user = isset($data['receive_user'])?$data['receive_user']:"";
		
		if ($send_user==$receive_user)  return "";
		
		if(!is_numeric($send_user)){
			if ($send_user=="admin"){
				$data['sent_user'] = 0;
			}else{
				$suresult =  $user->GetOne(array("username"=>$sent_user));
				if  (!$suresult){
					return "";
				}else{
					$data['sent_user'] = $suresult['user_id'];
				}
			}
		}
		
		if(!is_numeric($receive_user)){
			if ($receive_user=="admin"){
				$data['receive_user'] = 0;
			}else{
				$ruresult = $user->GetOne(array("username"=>$receive_user));
				if  (!$ruresult){
					return "";
				}else{
					$data['receive_user'] = $ruresult['user_id'];
				}
			}
		}
		
		$sql = "insert into `{message}` set `addtime` = '".time()."',`addip` = '".ip_address()."'";
		
		foreach($data as $key => $value){
			$sql .= ",`$key` = '$value'";
		}
		
		$result = $mysql->db_query($sql);
		if ($result==false){
			return "";
		}else{
			return true;
		}
		
		
	}
	
?>