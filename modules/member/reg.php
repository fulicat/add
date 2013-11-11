<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问

		if ($_G['user_id']!="" && isset($_SESSION['step']) && $_SESSION['reg_step']=="") {
			header('location:index.php?user');
			exit;
		}elseif (isset( $_SESSION['reg_step']) && $_SESSION['reg_step']=="reg_email"){
			header('location:index.php?user&q=action/reg_email');
			exit;
		}
		if (isset($_POST['email'])){
			$var = array('email','username','sex','password','email','realname','invite_userid','type_id','phone','area','qq','card_type','card_id');
			$index = post_var($var);
			$index["type_id"] = 2;
			$user_id = $user->AddUser($index);

			if ($user_id>0){
				$data['user_id'] = $user_id;
				$data['username'] = $index['username'];
				$data['email'] = $index['email'];
				$data['webname'] = $_G['system']['con_webname'];
				$data['title'] = "注册邮件确认";
				$data['key'] = $_U['user_reg_key'];
				$data['msg'] = RegEmailMsg($data);
				$data['type'] = "reg";
				$result = $user->SendEmail($data);
				$data['reg_step'] = "reg_email";

				//set_session($data);//注册session
				//建议cookie
				//setcookie("user_id",$user_id,time()+60*60);
				//setcookie(Key2Url("user_id","DWCMS"),authcode($user_id.",".time(),"ENCODE"),time()+60*60);
				if (isset($_POST['cookietime']) && $_POST['cookietime']>0){
					$ctime = time()+$_POST['cookietime']*60;
				}else{
					$ctime = time()+60*60;
				}

				if ($_G['is_cookie'] ==1){
					setcookie(Key2Url("user_id","DWCMS"),authcode($user_id.",".time(),"ENCODE"),$ctime);
				}else{
					$_SESSION[Key2Url("user_id","DWCMS")] = authcode($user_id.",".time(),"ENCODE");
					$_SESSION['login_endtime'] = $ctime;
				}
				$_SESSION['reg_step']="reg_email";
				echo "<script>location.href='index.php?user&q=action/reg_email';</script>";
			}else{
				header('location:index.php?user&q=action/reg_info');
			}
		}
		else{
			$title = '用户注册';
			$template = 'flat/user_reg_info.html';

		}
?>