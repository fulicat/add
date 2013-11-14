<?
if (!defined('ROOT_PATH'))  die('不能访问');//防止直接访问

if (isset($_POST['password'])){
	$login_msg = "";
	if (isset($_POST['valicode']) && $_POST['valicode'] =="" ){
		$msg = array("验证码不能为空","","?user&&q=action/login");
	}elseif (isset($_POST['valicode']) && $_POST['valicode']!=$_SESSION['valicode']){
		$msg = array("验证码不正确","","?user&&q=action/login");
	}elseif ($_POST['keywords']==""){
		$msg = array("账号不能为空","","?user&&q=action/login");
	}elseif ($_POST['password']==""){
		$msg = array("密码不能为空","","?user&&q=action/login");
	}else{
		if(!isset($index['user_id']) || $index['user_id']==""){
			$index['user_id'] = $_POST['keywords'];
		}
		$index['email'] =$_POST['keywords'];
		$index['username'] = $_POST['keywords'];
		$index['password'] = $_POST['password'];
		$result = $user->Login($index);
		if (is_array($result)){
			$data['username'] = $result['username'];
			$data['user_id'] = $result['user_id'];
			$data['user_typeid'] = $result['type_id'];
			$data['reg_step'] = "";
			set_session($data);//注册session
			$_url = 'index.php?user';
			if (isset($_POST['cookietime']) && $_POST['cookietime']>0){
				$ctime = time()+$_POST['cookietime']*60;
			}else{
				$ctime = time()+60*60;
			}

			if ($_G['is_cookie'] ==1){
				setcookie(Key2Url("user_id","DWCMS"),authcode($data['user_id'].",".time(),"ENCODE"),$ctime);
			}else{
				$_SESSION[Key2Url("user_id","DWCMS")] = authcode($data['user_id'].",".time(),"ENCODE");
				$_SESSION['login_endtime'] = $ctime;
			}
			$msg = array("登录成功,系统将3秒后跳转","进入用户中心",$_url);
			//setcookie("useradsf",1,time()+60*60);
			//var_dump(Key2Url("user_id","DWCMS"));var_dump($_SESSION);exit;
			/*
			if ($result['email_status']!=1){
				$_SESSION['reg_step'] = "reg_email";
				header('location:index.php?user&q=action/reg_email');
				exit;
			}elseif ($result['avatar_status']!=1){
				$_SESSION['reg_step'] = "reg_avatar";
				header('location:index.php?user&q=action/reg_avatar');
			}else{
				$_url = 'index.php?user';
				$msg = array("登录成功,系统将3秒后跳转","进入用户中心"，$_url);
			}
			*/
		}else{
			$msg = array($result);
		}
	}
$_U['login_msg'] = $login_msg;
}
$title = '用户登录';
$template = 'user_login.html';
?>